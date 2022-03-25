<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOutcomeEdit extends IvfOutcome
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_outcome';

    // Page object name
    public $PageObjName = "IvfOutcomeEdit";

    // Rendering View
    public $RenderingView = false;

    // Page headings
    public $Heading = "";
    public $Subheading = "";
    public $PageHeader;
    public $PageFooter;

    // Page terminated
    private $terminated = false;

    // Page heading
    public function pageHeading()
    {
        global $Language;
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading()
    {
        global $Language;
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return $Language->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName()
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl()
    {
        $url = ScriptName() . "?";
        if ($this->UseTokenInUrl) {
            $url .= "t=" . $this->TableVar . "&"; // Add page token
        }
        return $url;
    }

    // Show Page Header
    public function showPageHeader()
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<p id="ew-page-header">' . $header . '</p>';
        }
    }

    // Show Page Footer
    public function showPageFooter()
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<p id="ew-page-footer">' . $footer . '</p>';
        }
    }

    // Validate page request
    protected function isPageRequest()
    {
        global $CurrentForm;
        if ($this->UseTokenInUrl) {
            if ($CurrentForm) {
                return ($this->TableVar == $CurrentForm->getValue("t"));
            }
            if (Get("t") !== null) {
                return ($this->TableVar == Get("t"));
            }
        }
        return true;
    }

    // Constructor
    public function __construct()
    {
        global $Language, $DashboardReport, $DebugTimer;
        global $UserTable;

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ivf_outcome)
        if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
            $GLOBALS["ivf_outcome"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated()
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string $url URL for direction
     * @return void
     */
    public function terminate($url = "")
    {
        if ($this->terminated) {
            return;
        }
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("ivf_outcome"));
                $doc->Text = @$content;
                if ($this->isExport("email")) {
                    echo $this->exportEmail($doc->Text);
                } else {
                    $doc->export();
                }
                DeleteTempImages(); // Delete temp images
                return;
            }
        }
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
            }
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Close connection
        CloseConnections();

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show error
                WriteJson(array_merge(["success" => false], $this->getMessages()));
            }
            return;
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!Config("DEBUG") && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "IvfOutcomeView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from recordset
    protected function getRecordsFromRecordset($rs, $current = false)
    {
        $rows = [];
        if (is_object($rs)) { // Recordset
            while ($rs && !$rs->EOF) {
                $this->loadRowValues($rs); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($rs->fields);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
                $rs->moveNext();
            }
        } elseif (is_array($rs)) {
            foreach ($rs as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray($ar)
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (array_key_exists($fldname, $this->Fields) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (EmptyValue($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DATATYPE_BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->physicalUploadPath() . $file)));
                                    if (!EmptyValue($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue($ar)
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['id'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit()
    {
    }

    // Lookup data
    public function lookup()
    {
        global $Language, $Security;

        // Get lookup object
        $fieldName = Post("field");
        $lookup = $this->Fields[$fieldName]->Lookup;

        // Get lookup parameters
        $lookupType = Post("ajax", "unknown");
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal")) {
            $searchValue = Post("sv", "");
            $pageSize = Post("recperpage", 10);
            $offset = Post("start", 0);
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = Param("q", "");
            $pageSize = Param("n", -1);
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
            $start = Param("start", -1);
            $start = is_numeric($start) ? (int)$start : -1;
            $page = Param("page", -1);
            $page = is_numeric($page) ? (int)$page : -1;
            $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        }
        $userSelect = Decrypt(Post("s", ""));
        $userFilter = Decrypt(Post("f", ""));
        $userOrderBy = Decrypt(Post("o", ""));
        $keys = Post("keys");
        $lookup->LookupType = $lookupType; // Lookup type
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = Post("v" . $i, "");
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        $lookup->toJson($this); // Use settings from current page
    }
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $HashValue; // Hash Value
    public $DisplayRecords = 1;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecordCount;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
        $this->id->setVisibility();
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->outcomeDate->setVisibility();
        $this->outcomeDay->setVisibility();
        $this->OPResult->setVisibility();
        $this->Gestation->setVisibility();
        $this->TransferdEmbryos->setVisibility();
        $this->InitalOfSacs->setVisibility();
        $this->ImplimentationRate->setVisibility();
        $this->EmbryoNo->setVisibility();
        $this->ExtrauterineSac->setVisibility();
        $this->PregnancyMonozygotic->setVisibility();
        $this->TypeGestation->setVisibility();
        $this->Urine->setVisibility();
        $this->PTdate->setVisibility();
        $this->Reduced->setVisibility();
        $this->INduced->setVisibility();
        $this->INducedDate->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->Induced1->setVisibility();
        $this->Type->setVisibility();
        $this->IfClinical->setVisibility();
        $this->GADate->setVisibility();
        $this->GA->setVisibility();
        $this->FoetalDeath->setVisibility();
        $this->FerinatalDeath->setVisibility();
        $this->TidNo->setVisibility();
        $this->Ectopic->setVisibility();
        $this->Extra->setVisibility();
        $this->Implantation->setVisibility();
        $this->DeliveryDate->setVisibility();
        $this->BabyDetails->setVisibility();
        $this->LSCSNormal->setVisibility();
        $this->Notes->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey(Post($this->OldKeyName), $this->isShow());
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Set up master detail parameters
            $this->setupMasterParms();

            // Load recordset
            if ($this->isShow()) {
                // Load current record
                $loaded = $this->loadRow();
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("IvfOutcomeList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfOutcomeList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }
        }
    }

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'RIDNO' first before field var 'x_RIDNO'
        $val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
        if (!$this->RIDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNO->Visible = false; // Disable update for API request
            } else {
                $this->RIDNO->setFormValue($val);
            }
        }

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
        }

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }

        // Check field name 'treatment_status' first before field var 'x_treatment_status'
        $val = $CurrentForm->hasValue("treatment_status") ? $CurrentForm->getValue("treatment_status") : $CurrentForm->getValue("x_treatment_status");
        if (!$this->treatment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->treatment_status->Visible = false; // Disable update for API request
            } else {
                $this->treatment_status->setFormValue($val);
            }
        }

        // Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
        $val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
        if (!$this->ARTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->ARTCYCLE->setFormValue($val);
            }
        }

        // Check field name 'RESULT' first before field var 'x_RESULT'
        $val = $CurrentForm->hasValue("RESULT") ? $CurrentForm->getValue("RESULT") : $CurrentForm->getValue("x_RESULT");
        if (!$this->RESULT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RESULT->Visible = false; // Disable update for API request
            } else {
                $this->RESULT->setFormValue($val);
            }
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        }

        // Check field name 'outcomeDate' first before field var 'x_outcomeDate'
        $val = $CurrentForm->hasValue("outcomeDate") ? $CurrentForm->getValue("outcomeDate") : $CurrentForm->getValue("x_outcomeDate");
        if (!$this->outcomeDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->outcomeDate->Visible = false; // Disable update for API request
            } else {
                $this->outcomeDate->setFormValue($val);
            }
            $this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
        }

        // Check field name 'outcomeDay' first before field var 'x_outcomeDay'
        $val = $CurrentForm->hasValue("outcomeDay") ? $CurrentForm->getValue("outcomeDay") : $CurrentForm->getValue("x_outcomeDay");
        if (!$this->outcomeDay->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->outcomeDay->Visible = false; // Disable update for API request
            } else {
                $this->outcomeDay->setFormValue($val);
            }
            $this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
        }

        // Check field name 'OPResult' first before field var 'x_OPResult'
        $val = $CurrentForm->hasValue("OPResult") ? $CurrentForm->getValue("OPResult") : $CurrentForm->getValue("x_OPResult");
        if (!$this->OPResult->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPResult->Visible = false; // Disable update for API request
            } else {
                $this->OPResult->setFormValue($val);
            }
        }

        // Check field name 'Gestation' first before field var 'x_Gestation'
        $val = $CurrentForm->hasValue("Gestation") ? $CurrentForm->getValue("Gestation") : $CurrentForm->getValue("x_Gestation");
        if (!$this->Gestation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gestation->Visible = false; // Disable update for API request
            } else {
                $this->Gestation->setFormValue($val);
            }
        }

        // Check field name 'TransferdEmbryos' first before field var 'x_TransferdEmbryos'
        $val = $CurrentForm->hasValue("TransferdEmbryos") ? $CurrentForm->getValue("TransferdEmbryos") : $CurrentForm->getValue("x_TransferdEmbryos");
        if (!$this->TransferdEmbryos->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferdEmbryos->Visible = false; // Disable update for API request
            } else {
                $this->TransferdEmbryos->setFormValue($val);
            }
        }

        // Check field name 'InitalOfSacs' first before field var 'x_InitalOfSacs'
        $val = $CurrentForm->hasValue("InitalOfSacs") ? $CurrentForm->getValue("InitalOfSacs") : $CurrentForm->getValue("x_InitalOfSacs");
        if (!$this->InitalOfSacs->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InitalOfSacs->Visible = false; // Disable update for API request
            } else {
                $this->InitalOfSacs->setFormValue($val);
            }
        }

        // Check field name 'ImplimentationRate' first before field var 'x_ImplimentationRate'
        $val = $CurrentForm->hasValue("ImplimentationRate") ? $CurrentForm->getValue("ImplimentationRate") : $CurrentForm->getValue("x_ImplimentationRate");
        if (!$this->ImplimentationRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ImplimentationRate->Visible = false; // Disable update for API request
            } else {
                $this->ImplimentationRate->setFormValue($val);
            }
        }

        // Check field name 'EmbryoNo' first before field var 'x_EmbryoNo'
        $val = $CurrentForm->hasValue("EmbryoNo") ? $CurrentForm->getValue("EmbryoNo") : $CurrentForm->getValue("x_EmbryoNo");
        if (!$this->EmbryoNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EmbryoNo->Visible = false; // Disable update for API request
            } else {
                $this->EmbryoNo->setFormValue($val);
            }
        }

        // Check field name 'ExtrauterineSac' first before field var 'x_ExtrauterineSac'
        $val = $CurrentForm->hasValue("ExtrauterineSac") ? $CurrentForm->getValue("ExtrauterineSac") : $CurrentForm->getValue("x_ExtrauterineSac");
        if (!$this->ExtrauterineSac->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExtrauterineSac->Visible = false; // Disable update for API request
            } else {
                $this->ExtrauterineSac->setFormValue($val);
            }
        }

        // Check field name 'PregnancyMonozygotic' first before field var 'x_PregnancyMonozygotic'
        $val = $CurrentForm->hasValue("PregnancyMonozygotic") ? $CurrentForm->getValue("PregnancyMonozygotic") : $CurrentForm->getValue("x_PregnancyMonozygotic");
        if (!$this->PregnancyMonozygotic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PregnancyMonozygotic->Visible = false; // Disable update for API request
            } else {
                $this->PregnancyMonozygotic->setFormValue($val);
            }
        }

        // Check field name 'TypeGestation' first before field var 'x_TypeGestation'
        $val = $CurrentForm->hasValue("TypeGestation") ? $CurrentForm->getValue("TypeGestation") : $CurrentForm->getValue("x_TypeGestation");
        if (!$this->TypeGestation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeGestation->Visible = false; // Disable update for API request
            } else {
                $this->TypeGestation->setFormValue($val);
            }
        }

        // Check field name 'Urine' first before field var 'x_Urine'
        $val = $CurrentForm->hasValue("Urine") ? $CurrentForm->getValue("Urine") : $CurrentForm->getValue("x_Urine");
        if (!$this->Urine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Urine->Visible = false; // Disable update for API request
            } else {
                $this->Urine->setFormValue($val);
            }
        }

        // Check field name 'PTdate' first before field var 'x_PTdate'
        $val = $CurrentForm->hasValue("PTdate") ? $CurrentForm->getValue("PTdate") : $CurrentForm->getValue("x_PTdate");
        if (!$this->PTdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PTdate->Visible = false; // Disable update for API request
            } else {
                $this->PTdate->setFormValue($val);
            }
        }

        // Check field name 'Reduced' first before field var 'x_Reduced'
        $val = $CurrentForm->hasValue("Reduced") ? $CurrentForm->getValue("Reduced") : $CurrentForm->getValue("x_Reduced");
        if (!$this->Reduced->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reduced->Visible = false; // Disable update for API request
            } else {
                $this->Reduced->setFormValue($val);
            }
        }

        // Check field name 'INduced' first before field var 'x_INduced'
        $val = $CurrentForm->hasValue("INduced") ? $CurrentForm->getValue("INduced") : $CurrentForm->getValue("x_INduced");
        if (!$this->INduced->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INduced->Visible = false; // Disable update for API request
            } else {
                $this->INduced->setFormValue($val);
            }
        }

        // Check field name 'INducedDate' first before field var 'x_INducedDate'
        $val = $CurrentForm->hasValue("INducedDate") ? $CurrentForm->getValue("INducedDate") : $CurrentForm->getValue("x_INducedDate");
        if (!$this->INducedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->INducedDate->Visible = false; // Disable update for API request
            } else {
                $this->INducedDate->setFormValue($val);
            }
        }

        // Check field name 'Miscarriage' first before field var 'x_Miscarriage'
        $val = $CurrentForm->hasValue("Miscarriage") ? $CurrentForm->getValue("Miscarriage") : $CurrentForm->getValue("x_Miscarriage");
        if (!$this->Miscarriage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Miscarriage->Visible = false; // Disable update for API request
            } else {
                $this->Miscarriage->setFormValue($val);
            }
        }

        // Check field name 'Induced1' first before field var 'x_Induced1'
        $val = $CurrentForm->hasValue("Induced1") ? $CurrentForm->getValue("Induced1") : $CurrentForm->getValue("x_Induced1");
        if (!$this->Induced1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Induced1->Visible = false; // Disable update for API request
            } else {
                $this->Induced1->setFormValue($val);
            }
        }

        // Check field name 'Type' first before field var 'x_Type'
        $val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
        if (!$this->Type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Type->Visible = false; // Disable update for API request
            } else {
                $this->Type->setFormValue($val);
            }
        }

        // Check field name 'IfClinical' first before field var 'x_IfClinical'
        $val = $CurrentForm->hasValue("IfClinical") ? $CurrentForm->getValue("IfClinical") : $CurrentForm->getValue("x_IfClinical");
        if (!$this->IfClinical->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IfClinical->Visible = false; // Disable update for API request
            } else {
                $this->IfClinical->setFormValue($val);
            }
        }

        // Check field name 'GADate' first before field var 'x_GADate'
        $val = $CurrentForm->hasValue("GADate") ? $CurrentForm->getValue("GADate") : $CurrentForm->getValue("x_GADate");
        if (!$this->GADate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GADate->Visible = false; // Disable update for API request
            } else {
                $this->GADate->setFormValue($val);
            }
        }

        // Check field name 'GA' first before field var 'x_GA'
        $val = $CurrentForm->hasValue("GA") ? $CurrentForm->getValue("GA") : $CurrentForm->getValue("x_GA");
        if (!$this->GA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GA->Visible = false; // Disable update for API request
            } else {
                $this->GA->setFormValue($val);
            }
        }

        // Check field name 'FoetalDeath' first before field var 'x_FoetalDeath'
        $val = $CurrentForm->hasValue("FoetalDeath") ? $CurrentForm->getValue("FoetalDeath") : $CurrentForm->getValue("x_FoetalDeath");
        if (!$this->FoetalDeath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FoetalDeath->Visible = false; // Disable update for API request
            } else {
                $this->FoetalDeath->setFormValue($val);
            }
        }

        // Check field name 'FerinatalDeath' first before field var 'x_FerinatalDeath'
        $val = $CurrentForm->hasValue("FerinatalDeath") ? $CurrentForm->getValue("FerinatalDeath") : $CurrentForm->getValue("x_FerinatalDeath");
        if (!$this->FerinatalDeath->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FerinatalDeath->Visible = false; // Disable update for API request
            } else {
                $this->FerinatalDeath->setFormValue($val);
            }
        }

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }

        // Check field name 'Ectopic' first before field var 'x_Ectopic'
        $val = $CurrentForm->hasValue("Ectopic") ? $CurrentForm->getValue("Ectopic") : $CurrentForm->getValue("x_Ectopic");
        if (!$this->Ectopic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Ectopic->Visible = false; // Disable update for API request
            } else {
                $this->Ectopic->setFormValue($val);
            }
        }

        // Check field name 'Extra' first before field var 'x_Extra'
        $val = $CurrentForm->hasValue("Extra") ? $CurrentForm->getValue("Extra") : $CurrentForm->getValue("x_Extra");
        if (!$this->Extra->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Extra->Visible = false; // Disable update for API request
            } else {
                $this->Extra->setFormValue($val);
            }
        }

        // Check field name 'Implantation' first before field var 'x_Implantation'
        $val = $CurrentForm->hasValue("Implantation") ? $CurrentForm->getValue("Implantation") : $CurrentForm->getValue("x_Implantation");
        if (!$this->Implantation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Implantation->Visible = false; // Disable update for API request
            } else {
                $this->Implantation->setFormValue($val);
            }
        }

        // Check field name 'DeliveryDate' first before field var 'x_DeliveryDate'
        $val = $CurrentForm->hasValue("DeliveryDate") ? $CurrentForm->getValue("DeliveryDate") : $CurrentForm->getValue("x_DeliveryDate");
        if (!$this->DeliveryDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DeliveryDate->Visible = false; // Disable update for API request
            } else {
                $this->DeliveryDate->setFormValue($val);
            }
            $this->DeliveryDate->CurrentValue = UnFormatDateTime($this->DeliveryDate->CurrentValue, 7);
        }

        // Check field name 'BabyDetails' first before field var 'x_BabyDetails'
        $val = $CurrentForm->hasValue("BabyDetails") ? $CurrentForm->getValue("BabyDetails") : $CurrentForm->getValue("x_BabyDetails");
        if (!$this->BabyDetails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BabyDetails->Visible = false; // Disable update for API request
            } else {
                $this->BabyDetails->setFormValue($val);
            }
        }

        // Check field name 'LSCSNormal' first before field var 'x_LSCSNormal'
        $val = $CurrentForm->hasValue("LSCSNormal") ? $CurrentForm->getValue("LSCSNormal") : $CurrentForm->getValue("x_LSCSNormal");
        if (!$this->LSCSNormal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LSCSNormal->Visible = false; // Disable update for API request
            } else {
                $this->LSCSNormal->setFormValue($val);
            }
        }

        // Check field name 'Notes' first before field var 'x_Notes'
        $val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
        if (!$this->Notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notes->Visible = false; // Disable update for API request
            } else {
                $this->Notes->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
        $this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
        $this->RESULT->CurrentValue = $this->RESULT->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->outcomeDate->CurrentValue = $this->outcomeDate->FormValue;
        $this->outcomeDate->CurrentValue = UnFormatDateTime($this->outcomeDate->CurrentValue, 0);
        $this->outcomeDay->CurrentValue = $this->outcomeDay->FormValue;
        $this->outcomeDay->CurrentValue = UnFormatDateTime($this->outcomeDay->CurrentValue, 0);
        $this->OPResult->CurrentValue = $this->OPResult->FormValue;
        $this->Gestation->CurrentValue = $this->Gestation->FormValue;
        $this->TransferdEmbryos->CurrentValue = $this->TransferdEmbryos->FormValue;
        $this->InitalOfSacs->CurrentValue = $this->InitalOfSacs->FormValue;
        $this->ImplimentationRate->CurrentValue = $this->ImplimentationRate->FormValue;
        $this->EmbryoNo->CurrentValue = $this->EmbryoNo->FormValue;
        $this->ExtrauterineSac->CurrentValue = $this->ExtrauterineSac->FormValue;
        $this->PregnancyMonozygotic->CurrentValue = $this->PregnancyMonozygotic->FormValue;
        $this->TypeGestation->CurrentValue = $this->TypeGestation->FormValue;
        $this->Urine->CurrentValue = $this->Urine->FormValue;
        $this->PTdate->CurrentValue = $this->PTdate->FormValue;
        $this->Reduced->CurrentValue = $this->Reduced->FormValue;
        $this->INduced->CurrentValue = $this->INduced->FormValue;
        $this->INducedDate->CurrentValue = $this->INducedDate->FormValue;
        $this->Miscarriage->CurrentValue = $this->Miscarriage->FormValue;
        $this->Induced1->CurrentValue = $this->Induced1->FormValue;
        $this->Type->CurrentValue = $this->Type->FormValue;
        $this->IfClinical->CurrentValue = $this->IfClinical->FormValue;
        $this->GADate->CurrentValue = $this->GADate->FormValue;
        $this->GA->CurrentValue = $this->GA->FormValue;
        $this->FoetalDeath->CurrentValue = $this->FoetalDeath->FormValue;
        $this->FerinatalDeath->CurrentValue = $this->FerinatalDeath->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Ectopic->CurrentValue = $this->Ectopic->FormValue;
        $this->Extra->CurrentValue = $this->Extra->FormValue;
        $this->Implantation->CurrentValue = $this->Implantation->FormValue;
        $this->DeliveryDate->CurrentValue = $this->DeliveryDate->FormValue;
        $this->DeliveryDate->CurrentValue = UnFormatDateTime($this->DeliveryDate->CurrentValue, 7);
        $this->BabyDetails->CurrentValue = $this->BabyDetails->FormValue;
        $this->LSCSNormal->CurrentValue = $this->LSCSNormal->FormValue;
        $this->Notes->CurrentValue = $this->Notes->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return void
     */
    public function loadRow()
    {
        global $Security, $Language;
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssoc($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from recordset or record
     *
     * @param Recordset|array $rs Record
     * @return void
     */
    public function loadRowValues($rs = null)
    {
        if (is_array($rs)) {
            $row = $rs;
        } elseif ($rs && property_exists($rs, "fields")) { // Recordset
            $row = $rs->fields;
        } else {
            $row = $this->newRow();
        }

        // Call Row Selected event
        $this->rowSelected($row);
        if (!$rs) {
            return;
        }
        $this->id->setDbValue($row['id']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->outcomeDate->setDbValue($row['outcomeDate']);
        $this->outcomeDay->setDbValue($row['outcomeDay']);
        $this->OPResult->setDbValue($row['OPResult']);
        $this->Gestation->setDbValue($row['Gestation']);
        $this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
        $this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
        $this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
        $this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
        $this->TypeGestation->setDbValue($row['TypeGestation']);
        $this->Urine->setDbValue($row['Urine']);
        $this->PTdate->setDbValue($row['PTdate']);
        $this->Reduced->setDbValue($row['Reduced']);
        $this->INduced->setDbValue($row['INduced']);
        $this->INducedDate->setDbValue($row['INducedDate']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->Induced1->setDbValue($row['Induced1']);
        $this->Type->setDbValue($row['Type']);
        $this->IfClinical->setDbValue($row['IfClinical']);
        $this->GADate->setDbValue($row['GADate']);
        $this->GA->setDbValue($row['GA']);
        $this->FoetalDeath->setDbValue($row['FoetalDeath']);
        $this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Extra->setDbValue($row['Extra']);
        $this->Implantation->setDbValue($row['Implantation']);
        $this->DeliveryDate->setDbValue($row['DeliveryDate']);
        $this->BabyDetails->setDbValue($row['BabyDetails']);
        $this->LSCSNormal->setDbValue($row['LSCSNormal']);
        $this->Notes->setDbValue($row['Notes']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['treatment_status'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['outcomeDate'] = null;
        $row['outcomeDay'] = null;
        $row['OPResult'] = null;
        $row['Gestation'] = null;
        $row['TransferdEmbryos'] = null;
        $row['InitalOfSacs'] = null;
        $row['ImplimentationRate'] = null;
        $row['EmbryoNo'] = null;
        $row['ExtrauterineSac'] = null;
        $row['PregnancyMonozygotic'] = null;
        $row['TypeGestation'] = null;
        $row['Urine'] = null;
        $row['PTdate'] = null;
        $row['Reduced'] = null;
        $row['INduced'] = null;
        $row['INducedDate'] = null;
        $row['Miscarriage'] = null;
        $row['Induced1'] = null;
        $row['Type'] = null;
        $row['IfClinical'] = null;
        $row['GADate'] = null;
        $row['GA'] = null;
        $row['FoetalDeath'] = null;
        $row['FerinatalDeath'] = null;
        $row['TidNo'] = null;
        $row['Ectopic'] = null;
        $row['Extra'] = null;
        $row['Implantation'] = null;
        $row['DeliveryDate'] = null;
        $row['BabyDetails'] = null;
        $row['LSCSNormal'] = null;
        $row['Notes'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        $this->OldRecordset = null;
        $validKey = $this->OldKey != "";
        if ($validKey) {
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $this->OldRecordset = LoadRecordset($sql, $conn);
        }
        $this->loadRowValues($this->OldRecordset); // Load row values
        return $validKey;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // outcomeDate

        // outcomeDay

        // OPResult

        // Gestation

        // TransferdEmbryos

        // InitalOfSacs

        // ImplimentationRate

        // EmbryoNo

        // ExtrauterineSac

        // PregnancyMonozygotic

        // TypeGestation

        // Urine

        // PTdate

        // Reduced

        // INduced

        // INducedDate

        // Miscarriage

        // Induced1

        // Type

        // IfClinical

        // GADate

        // GA

        // FoetalDeath

        // FerinatalDeath

        // TidNo

        // Ectopic

        // Extra

        // Implantation

        // DeliveryDate

        // BabyDetails

        // LSCSNormal

        // Notes
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // treatment_status
            $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // outcomeDate
            $this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
            $this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
            $this->outcomeDate->ViewCustomAttributes = "";

            // outcomeDay
            $this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
            $this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
            $this->outcomeDay->ViewCustomAttributes = "";

            // OPResult
            $this->OPResult->ViewValue = $this->OPResult->CurrentValue;
            $this->OPResult->ViewCustomAttributes = "";

            // Gestation
            if (strval($this->Gestation->CurrentValue) != "") {
                $this->Gestation->ViewValue = $this->Gestation->optionCaption($this->Gestation->CurrentValue);
            } else {
                $this->Gestation->ViewValue = null;
            }
            $this->Gestation->ViewCustomAttributes = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
            $this->TransferdEmbryos->ViewCustomAttributes = "";

            // InitalOfSacs
            $this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
            $this->InitalOfSacs->ViewCustomAttributes = "";

            // ImplimentationRate
            $this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
            $this->ImplimentationRate->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
            $this->ExtrauterineSac->ViewCustomAttributes = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
            $this->PregnancyMonozygotic->ViewCustomAttributes = "";

            // TypeGestation
            $this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
            $this->TypeGestation->ViewCustomAttributes = "";

            // Urine
            if (strval($this->Urine->CurrentValue) != "") {
                $this->Urine->ViewValue = $this->Urine->optionCaption($this->Urine->CurrentValue);
            } else {
                $this->Urine->ViewValue = null;
            }
            $this->Urine->ViewCustomAttributes = "";

            // PTdate
            $this->PTdate->ViewValue = $this->PTdate->CurrentValue;
            $this->PTdate->ViewCustomAttributes = "";

            // Reduced
            $this->Reduced->ViewValue = $this->Reduced->CurrentValue;
            $this->Reduced->ViewCustomAttributes = "";

            // INduced
            $this->INduced->ViewValue = $this->INduced->CurrentValue;
            $this->INduced->ViewCustomAttributes = "";

            // INducedDate
            $this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
            $this->INducedDate->ViewCustomAttributes = "";

            // Miscarriage
            if (strval($this->Miscarriage->CurrentValue) != "") {
                $this->Miscarriage->ViewValue = $this->Miscarriage->optionCaption($this->Miscarriage->CurrentValue);
            } else {
                $this->Miscarriage->ViewValue = null;
            }
            $this->Miscarriage->ViewCustomAttributes = "";

            // Induced1
            if (strval($this->Induced1->CurrentValue) != "") {
                $this->Induced1->ViewValue = $this->Induced1->optionCaption($this->Induced1->CurrentValue);
            } else {
                $this->Induced1->ViewValue = null;
            }
            $this->Induced1->ViewCustomAttributes = "";

            // Type
            if (strval($this->Type->CurrentValue) != "") {
                $this->Type->ViewValue = $this->Type->optionCaption($this->Type->CurrentValue);
            } else {
                $this->Type->ViewValue = null;
            }
            $this->Type->ViewCustomAttributes = "";

            // IfClinical
            $this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
            $this->IfClinical->ViewCustomAttributes = "";

            // GADate
            $this->GADate->ViewValue = $this->GADate->CurrentValue;
            $this->GADate->ViewCustomAttributes = "";

            // GA
            $this->GA->ViewValue = $this->GA->CurrentValue;
            $this->GA->ViewCustomAttributes = "";

            // FoetalDeath
            if (strval($this->FoetalDeath->CurrentValue) != "") {
                $this->FoetalDeath->ViewValue = $this->FoetalDeath->optionCaption($this->FoetalDeath->CurrentValue);
            } else {
                $this->FoetalDeath->ViewValue = null;
            }
            $this->FoetalDeath->ViewCustomAttributes = "";

            // FerinatalDeath
            if (strval($this->FerinatalDeath->CurrentValue) != "") {
                $this->FerinatalDeath->ViewValue = $this->FerinatalDeath->optionCaption($this->FerinatalDeath->CurrentValue);
            } else {
                $this->FerinatalDeath->ViewValue = null;
            }
            $this->FerinatalDeath->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Ectopic
            if (strval($this->Ectopic->CurrentValue) != "") {
                $this->Ectopic->ViewValue = $this->Ectopic->optionCaption($this->Ectopic->CurrentValue);
            } else {
                $this->Ectopic->ViewValue = null;
            }
            $this->Ectopic->ViewCustomAttributes = "";

            // Extra
            if (strval($this->Extra->CurrentValue) != "") {
                $this->Extra->ViewValue = $this->Extra->optionCaption($this->Extra->CurrentValue);
            } else {
                $this->Extra->ViewValue = null;
            }
            $this->Extra->ViewCustomAttributes = "";

            // Implantation
            $this->Implantation->ViewValue = $this->Implantation->CurrentValue;
            $this->Implantation->ViewCustomAttributes = "";

            // DeliveryDate
            $this->DeliveryDate->ViewValue = $this->DeliveryDate->CurrentValue;
            $this->DeliveryDate->ViewValue = FormatDateTime($this->DeliveryDate->ViewValue, 7);
            $this->DeliveryDate->ViewCustomAttributes = "";

            // BabyDetails
            $this->BabyDetails->ViewValue = $this->BabyDetails->CurrentValue;
            $this->BabyDetails->ViewCustomAttributes = "";

            // LSCSNormal
            $this->LSCSNormal->ViewValue = $this->LSCSNormal->CurrentValue;
            $this->LSCSNormal->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";
            $this->outcomeDate->TooltipValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";
            $this->outcomeDay->TooltipValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";
            $this->OPResult->TooltipValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";
            $this->Gestation->TooltipValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";
            $this->TransferdEmbryos->TooltipValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";
            $this->InitalOfSacs->TooltipValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";
            $this->ImplimentationRate->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";
            $this->ExtrauterineSac->TooltipValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";
            $this->PregnancyMonozygotic->TooltipValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";
            $this->TypeGestation->TooltipValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";
            $this->Urine->TooltipValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";
            $this->PTdate->TooltipValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";
            $this->Reduced->TooltipValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";
            $this->INduced->TooltipValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";
            $this->INducedDate->TooltipValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";
            $this->Miscarriage->TooltipValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";
            $this->Induced1->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";
            $this->IfClinical->TooltipValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";
            $this->GADate->TooltipValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";
            $this->GA->TooltipValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";
            $this->FoetalDeath->TooltipValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";
            $this->FerinatalDeath->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";
            $this->Ectopic->TooltipValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";
            $this->Extra->TooltipValue = "";

            // Implantation
            $this->Implantation->LinkCustomAttributes = "";
            $this->Implantation->HrefValue = "";
            $this->Implantation->TooltipValue = "";

            // DeliveryDate
            $this->DeliveryDate->LinkCustomAttributes = "";
            $this->DeliveryDate->HrefValue = "";
            $this->DeliveryDate->TooltipValue = "";

            // BabyDetails
            $this->BabyDetails->LinkCustomAttributes = "";
            $this->BabyDetails->HrefValue = "";
            $this->BabyDetails->TooltipValue = "";

            // LSCSNormal
            $this->LSCSNormal->LinkCustomAttributes = "";
            $this->LSCSNormal->HrefValue = "";
            $this->LSCSNormal->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            if ($this->RIDNO->getSessionValue() != "") {
                $this->RIDNO->CurrentValue = GetForeignKeyValue($this->RIDNO->getSessionValue());
                $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
                $this->RIDNO->ViewCustomAttributes = "";
            } else {
                $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
                $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());
            }

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if ($this->Name->getSessionValue() != "") {
                $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
                $this->Name->ViewValue = $this->Name->CurrentValue;
                $this->Name->ViewCustomAttributes = "";
            } else {
                if (!$this->Name->Raw) {
                    $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
                }
                $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
                $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
            }

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            if (!$this->treatment_status->Raw) {
                $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
            }
            $this->treatment_status->EditValue = HtmlEncode($this->treatment_status->CurrentValue);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE->EditCustomAttributes = "";
            if (!$this->ARTCYCLE->Raw) {
                $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
            }
            $this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->CurrentValue);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            if (!$this->RESULT->Raw) {
                $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
            }
            $this->RESULT->EditValue = HtmlEncode($this->RESULT->CurrentValue);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // outcomeDate
            $this->outcomeDate->EditAttrs["class"] = "form-control";
            $this->outcomeDate->EditCustomAttributes = "";
            $this->outcomeDate->EditValue = HtmlEncode(FormatDateTime($this->outcomeDate->CurrentValue, 8));
            $this->outcomeDate->PlaceHolder = RemoveHtml($this->outcomeDate->caption());

            // outcomeDay
            $this->outcomeDay->EditAttrs["class"] = "form-control";
            $this->outcomeDay->EditCustomAttributes = "";
            $this->outcomeDay->EditValue = HtmlEncode(FormatDateTime($this->outcomeDay->CurrentValue, 8));
            $this->outcomeDay->PlaceHolder = RemoveHtml($this->outcomeDay->caption());

            // OPResult
            $this->OPResult->EditAttrs["class"] = "form-control";
            $this->OPResult->EditCustomAttributes = "";
            if (!$this->OPResult->Raw) {
                $this->OPResult->CurrentValue = HtmlDecode($this->OPResult->CurrentValue);
            }
            $this->OPResult->EditValue = HtmlEncode($this->OPResult->CurrentValue);
            $this->OPResult->PlaceHolder = RemoveHtml($this->OPResult->caption());

            // Gestation
            $this->Gestation->EditCustomAttributes = "";
            $this->Gestation->EditValue = $this->Gestation->options(false);
            $this->Gestation->PlaceHolder = RemoveHtml($this->Gestation->caption());

            // TransferdEmbryos
            $this->TransferdEmbryos->EditAttrs["class"] = "form-control";
            $this->TransferdEmbryos->EditCustomAttributes = "";
            if (!$this->TransferdEmbryos->Raw) {
                $this->TransferdEmbryos->CurrentValue = HtmlDecode($this->TransferdEmbryos->CurrentValue);
            }
            $this->TransferdEmbryos->EditValue = HtmlEncode($this->TransferdEmbryos->CurrentValue);
            $this->TransferdEmbryos->PlaceHolder = RemoveHtml($this->TransferdEmbryos->caption());

            // InitalOfSacs
            $this->InitalOfSacs->EditAttrs["class"] = "form-control";
            $this->InitalOfSacs->EditCustomAttributes = "";
            if (!$this->InitalOfSacs->Raw) {
                $this->InitalOfSacs->CurrentValue = HtmlDecode($this->InitalOfSacs->CurrentValue);
            }
            $this->InitalOfSacs->EditValue = HtmlEncode($this->InitalOfSacs->CurrentValue);
            $this->InitalOfSacs->PlaceHolder = RemoveHtml($this->InitalOfSacs->caption());

            // ImplimentationRate
            $this->ImplimentationRate->EditAttrs["class"] = "form-control";
            $this->ImplimentationRate->EditCustomAttributes = "";
            if (!$this->ImplimentationRate->Raw) {
                $this->ImplimentationRate->CurrentValue = HtmlDecode($this->ImplimentationRate->CurrentValue);
            }
            $this->ImplimentationRate->EditValue = HtmlEncode($this->ImplimentationRate->CurrentValue);
            $this->ImplimentationRate->PlaceHolder = RemoveHtml($this->ImplimentationRate->caption());

            // EmbryoNo
            $this->EmbryoNo->EditAttrs["class"] = "form-control";
            $this->EmbryoNo->EditCustomAttributes = "";
            if (!$this->EmbryoNo->Raw) {
                $this->EmbryoNo->CurrentValue = HtmlDecode($this->EmbryoNo->CurrentValue);
            }
            $this->EmbryoNo->EditValue = HtmlEncode($this->EmbryoNo->CurrentValue);
            $this->EmbryoNo->PlaceHolder = RemoveHtml($this->EmbryoNo->caption());

            // ExtrauterineSac
            $this->ExtrauterineSac->EditAttrs["class"] = "form-control";
            $this->ExtrauterineSac->EditCustomAttributes = "";
            if (!$this->ExtrauterineSac->Raw) {
                $this->ExtrauterineSac->CurrentValue = HtmlDecode($this->ExtrauterineSac->CurrentValue);
            }
            $this->ExtrauterineSac->EditValue = HtmlEncode($this->ExtrauterineSac->CurrentValue);
            $this->ExtrauterineSac->PlaceHolder = RemoveHtml($this->ExtrauterineSac->caption());

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->EditAttrs["class"] = "form-control";
            $this->PregnancyMonozygotic->EditCustomAttributes = "";
            if (!$this->PregnancyMonozygotic->Raw) {
                $this->PregnancyMonozygotic->CurrentValue = HtmlDecode($this->PregnancyMonozygotic->CurrentValue);
            }
            $this->PregnancyMonozygotic->EditValue = HtmlEncode($this->PregnancyMonozygotic->CurrentValue);
            $this->PregnancyMonozygotic->PlaceHolder = RemoveHtml($this->PregnancyMonozygotic->caption());

            // TypeGestation
            $this->TypeGestation->EditAttrs["class"] = "form-control";
            $this->TypeGestation->EditCustomAttributes = "";
            if (!$this->TypeGestation->Raw) {
                $this->TypeGestation->CurrentValue = HtmlDecode($this->TypeGestation->CurrentValue);
            }
            $this->TypeGestation->EditValue = HtmlEncode($this->TypeGestation->CurrentValue);
            $this->TypeGestation->PlaceHolder = RemoveHtml($this->TypeGestation->caption());

            // Urine
            $this->Urine->EditAttrs["class"] = "form-control";
            $this->Urine->EditCustomAttributes = "";
            $this->Urine->EditValue = $this->Urine->options(true);
            $this->Urine->PlaceHolder = RemoveHtml($this->Urine->caption());

            // PTdate
            $this->PTdate->EditAttrs["class"] = "form-control";
            $this->PTdate->EditCustomAttributes = "";
            if (!$this->PTdate->Raw) {
                $this->PTdate->CurrentValue = HtmlDecode($this->PTdate->CurrentValue);
            }
            $this->PTdate->EditValue = HtmlEncode($this->PTdate->CurrentValue);
            $this->PTdate->PlaceHolder = RemoveHtml($this->PTdate->caption());

            // Reduced
            $this->Reduced->EditAttrs["class"] = "form-control";
            $this->Reduced->EditCustomAttributes = "";
            if (!$this->Reduced->Raw) {
                $this->Reduced->CurrentValue = HtmlDecode($this->Reduced->CurrentValue);
            }
            $this->Reduced->EditValue = HtmlEncode($this->Reduced->CurrentValue);
            $this->Reduced->PlaceHolder = RemoveHtml($this->Reduced->caption());

            // INduced
            $this->INduced->EditAttrs["class"] = "form-control";
            $this->INduced->EditCustomAttributes = "";
            if (!$this->INduced->Raw) {
                $this->INduced->CurrentValue = HtmlDecode($this->INduced->CurrentValue);
            }
            $this->INduced->EditValue = HtmlEncode($this->INduced->CurrentValue);
            $this->INduced->PlaceHolder = RemoveHtml($this->INduced->caption());

            // INducedDate
            $this->INducedDate->EditAttrs["class"] = "form-control";
            $this->INducedDate->EditCustomAttributes = "";
            if (!$this->INducedDate->Raw) {
                $this->INducedDate->CurrentValue = HtmlDecode($this->INducedDate->CurrentValue);
            }
            $this->INducedDate->EditValue = HtmlEncode($this->INducedDate->CurrentValue);
            $this->INducedDate->PlaceHolder = RemoveHtml($this->INducedDate->caption());

            // Miscarriage
            $this->Miscarriage->EditCustomAttributes = "";
            $this->Miscarriage->EditValue = $this->Miscarriage->options(false);
            $this->Miscarriage->PlaceHolder = RemoveHtml($this->Miscarriage->caption());

            // Induced1
            $this->Induced1->EditCustomAttributes = "";
            $this->Induced1->EditValue = $this->Induced1->options(false);
            $this->Induced1->PlaceHolder = RemoveHtml($this->Induced1->caption());

            // Type
            $this->Type->EditCustomAttributes = "";
            $this->Type->EditValue = $this->Type->options(false);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // IfClinical
            $this->IfClinical->EditAttrs["class"] = "form-control";
            $this->IfClinical->EditCustomAttributes = "";
            if (!$this->IfClinical->Raw) {
                $this->IfClinical->CurrentValue = HtmlDecode($this->IfClinical->CurrentValue);
            }
            $this->IfClinical->EditValue = HtmlEncode($this->IfClinical->CurrentValue);
            $this->IfClinical->PlaceHolder = RemoveHtml($this->IfClinical->caption());

            // GADate
            $this->GADate->EditAttrs["class"] = "form-control";
            $this->GADate->EditCustomAttributes = "";
            if (!$this->GADate->Raw) {
                $this->GADate->CurrentValue = HtmlDecode($this->GADate->CurrentValue);
            }
            $this->GADate->EditValue = HtmlEncode($this->GADate->CurrentValue);
            $this->GADate->PlaceHolder = RemoveHtml($this->GADate->caption());

            // GA
            $this->GA->EditAttrs["class"] = "form-control";
            $this->GA->EditCustomAttributes = "";
            if (!$this->GA->Raw) {
                $this->GA->CurrentValue = HtmlDecode($this->GA->CurrentValue);
            }
            $this->GA->EditValue = HtmlEncode($this->GA->CurrentValue);
            $this->GA->PlaceHolder = RemoveHtml($this->GA->caption());

            // FoetalDeath
            $this->FoetalDeath->EditAttrs["class"] = "form-control";
            $this->FoetalDeath->EditCustomAttributes = "";
            $this->FoetalDeath->EditValue = $this->FoetalDeath->options(true);
            $this->FoetalDeath->PlaceHolder = RemoveHtml($this->FoetalDeath->caption());

            // FerinatalDeath
            $this->FerinatalDeath->EditAttrs["class"] = "form-control";
            $this->FerinatalDeath->EditCustomAttributes = "";
            $this->FerinatalDeath->EditValue = $this->FerinatalDeath->options(true);
            $this->FerinatalDeath->PlaceHolder = RemoveHtml($this->FerinatalDeath->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->CurrentValue = GetForeignKeyValue($this->TidNo->getSessionValue());
                $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
                $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
                $this->TidNo->ViewCustomAttributes = "";
            } else {
                $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
                $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
            }

            // Ectopic
            $this->Ectopic->EditCustomAttributes = "";
            $this->Ectopic->EditValue = $this->Ectopic->options(false);
            $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

            // Extra
            $this->Extra->EditCustomAttributes = "";
            $this->Extra->EditValue = $this->Extra->options(false);
            $this->Extra->PlaceHolder = RemoveHtml($this->Extra->caption());

            // Implantation
            $this->Implantation->EditAttrs["class"] = "form-control";
            $this->Implantation->EditCustomAttributes = "";
            if (!$this->Implantation->Raw) {
                $this->Implantation->CurrentValue = HtmlDecode($this->Implantation->CurrentValue);
            }
            $this->Implantation->EditValue = HtmlEncode($this->Implantation->CurrentValue);
            $this->Implantation->PlaceHolder = RemoveHtml($this->Implantation->caption());

            // DeliveryDate
            $this->DeliveryDate->EditAttrs["class"] = "form-control";
            $this->DeliveryDate->EditCustomAttributes = "";
            $this->DeliveryDate->EditValue = HtmlEncode(FormatDateTime($this->DeliveryDate->CurrentValue, 7));
            $this->DeliveryDate->PlaceHolder = RemoveHtml($this->DeliveryDate->caption());

            // BabyDetails
            $this->BabyDetails->EditAttrs["class"] = "form-control";
            $this->BabyDetails->EditCustomAttributes = "";
            if (!$this->BabyDetails->Raw) {
                $this->BabyDetails->CurrentValue = HtmlDecode($this->BabyDetails->CurrentValue);
            }
            $this->BabyDetails->EditValue = HtmlEncode($this->BabyDetails->CurrentValue);
            $this->BabyDetails->PlaceHolder = RemoveHtml($this->BabyDetails->caption());

            // LSCSNormal
            $this->LSCSNormal->EditAttrs["class"] = "form-control";
            $this->LSCSNormal->EditCustomAttributes = "";
            if (!$this->LSCSNormal->Raw) {
                $this->LSCSNormal->CurrentValue = HtmlDecode($this->LSCSNormal->CurrentValue);
            }
            $this->LSCSNormal->EditValue = HtmlEncode($this->LSCSNormal->CurrentValue);
            $this->LSCSNormal->PlaceHolder = RemoveHtml($this->LSCSNormal->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            $this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";

            // Implantation
            $this->Implantation->LinkCustomAttributes = "";
            $this->Implantation->HrefValue = "";

            // DeliveryDate
            $this->DeliveryDate->LinkCustomAttributes = "";
            $this->DeliveryDate->HrefValue = "";

            // BabyDetails
            $this->BabyDetails->LinkCustomAttributes = "";
            $this->BabyDetails->HrefValue = "";

            // LSCSNormal
            $this->LSCSNormal->LinkCustomAttributes = "";
            $this->LSCSNormal->HrefValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->treatment_status->Required) {
            if (!$this->treatment_status->IsDetailKey && EmptyValue($this->treatment_status->FormValue)) {
                $this->treatment_status->addErrorMessage(str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
            }
        }
        if ($this->ARTCYCLE->Required) {
            if (!$this->ARTCYCLE->IsDetailKey && EmptyValue($this->ARTCYCLE->FormValue)) {
                $this->ARTCYCLE->addErrorMessage(str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->RESULT->Required) {
            if (!$this->RESULT->IsDetailKey && EmptyValue($this->RESULT->FormValue)) {
                $this->RESULT->addErrorMessage(str_replace("%s", $this->RESULT->caption(), $this->RESULT->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->createdby->FormValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->outcomeDate->Required) {
            if (!$this->outcomeDate->IsDetailKey && EmptyValue($this->outcomeDate->FormValue)) {
                $this->outcomeDate->addErrorMessage(str_replace("%s", $this->outcomeDate->caption(), $this->outcomeDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->outcomeDate->FormValue)) {
            $this->outcomeDate->addErrorMessage($this->outcomeDate->getErrorMessage(false));
        }
        if ($this->outcomeDay->Required) {
            if (!$this->outcomeDay->IsDetailKey && EmptyValue($this->outcomeDay->FormValue)) {
                $this->outcomeDay->addErrorMessage(str_replace("%s", $this->outcomeDay->caption(), $this->outcomeDay->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->outcomeDay->FormValue)) {
            $this->outcomeDay->addErrorMessage($this->outcomeDay->getErrorMessage(false));
        }
        if ($this->OPResult->Required) {
            if (!$this->OPResult->IsDetailKey && EmptyValue($this->OPResult->FormValue)) {
                $this->OPResult->addErrorMessage(str_replace("%s", $this->OPResult->caption(), $this->OPResult->RequiredErrorMessage));
            }
        }
        if ($this->Gestation->Required) {
            if ($this->Gestation->FormValue == "") {
                $this->Gestation->addErrorMessage(str_replace("%s", $this->Gestation->caption(), $this->Gestation->RequiredErrorMessage));
            }
        }
        if ($this->TransferdEmbryos->Required) {
            if (!$this->TransferdEmbryos->IsDetailKey && EmptyValue($this->TransferdEmbryos->FormValue)) {
                $this->TransferdEmbryos->addErrorMessage(str_replace("%s", $this->TransferdEmbryos->caption(), $this->TransferdEmbryos->RequiredErrorMessage));
            }
        }
        if ($this->InitalOfSacs->Required) {
            if (!$this->InitalOfSacs->IsDetailKey && EmptyValue($this->InitalOfSacs->FormValue)) {
                $this->InitalOfSacs->addErrorMessage(str_replace("%s", $this->InitalOfSacs->caption(), $this->InitalOfSacs->RequiredErrorMessage));
            }
        }
        if ($this->ImplimentationRate->Required) {
            if (!$this->ImplimentationRate->IsDetailKey && EmptyValue($this->ImplimentationRate->FormValue)) {
                $this->ImplimentationRate->addErrorMessage(str_replace("%s", $this->ImplimentationRate->caption(), $this->ImplimentationRate->RequiredErrorMessage));
            }
        }
        if ($this->EmbryoNo->Required) {
            if (!$this->EmbryoNo->IsDetailKey && EmptyValue($this->EmbryoNo->FormValue)) {
                $this->EmbryoNo->addErrorMessage(str_replace("%s", $this->EmbryoNo->caption(), $this->EmbryoNo->RequiredErrorMessage));
            }
        }
        if ($this->ExtrauterineSac->Required) {
            if (!$this->ExtrauterineSac->IsDetailKey && EmptyValue($this->ExtrauterineSac->FormValue)) {
                $this->ExtrauterineSac->addErrorMessage(str_replace("%s", $this->ExtrauterineSac->caption(), $this->ExtrauterineSac->RequiredErrorMessage));
            }
        }
        if ($this->PregnancyMonozygotic->Required) {
            if (!$this->PregnancyMonozygotic->IsDetailKey && EmptyValue($this->PregnancyMonozygotic->FormValue)) {
                $this->PregnancyMonozygotic->addErrorMessage(str_replace("%s", $this->PregnancyMonozygotic->caption(), $this->PregnancyMonozygotic->RequiredErrorMessage));
            }
        }
        if ($this->TypeGestation->Required) {
            if (!$this->TypeGestation->IsDetailKey && EmptyValue($this->TypeGestation->FormValue)) {
                $this->TypeGestation->addErrorMessage(str_replace("%s", $this->TypeGestation->caption(), $this->TypeGestation->RequiredErrorMessage));
            }
        }
        if ($this->Urine->Required) {
            if (!$this->Urine->IsDetailKey && EmptyValue($this->Urine->FormValue)) {
                $this->Urine->addErrorMessage(str_replace("%s", $this->Urine->caption(), $this->Urine->RequiredErrorMessage));
            }
        }
        if ($this->PTdate->Required) {
            if (!$this->PTdate->IsDetailKey && EmptyValue($this->PTdate->FormValue)) {
                $this->PTdate->addErrorMessage(str_replace("%s", $this->PTdate->caption(), $this->PTdate->RequiredErrorMessage));
            }
        }
        if ($this->Reduced->Required) {
            if (!$this->Reduced->IsDetailKey && EmptyValue($this->Reduced->FormValue)) {
                $this->Reduced->addErrorMessage(str_replace("%s", $this->Reduced->caption(), $this->Reduced->RequiredErrorMessage));
            }
        }
        if ($this->INduced->Required) {
            if (!$this->INduced->IsDetailKey && EmptyValue($this->INduced->FormValue)) {
                $this->INduced->addErrorMessage(str_replace("%s", $this->INduced->caption(), $this->INduced->RequiredErrorMessage));
            }
        }
        if ($this->INducedDate->Required) {
            if (!$this->INducedDate->IsDetailKey && EmptyValue($this->INducedDate->FormValue)) {
                $this->INducedDate->addErrorMessage(str_replace("%s", $this->INducedDate->caption(), $this->INducedDate->RequiredErrorMessage));
            }
        }
        if ($this->Miscarriage->Required) {
            if ($this->Miscarriage->FormValue == "") {
                $this->Miscarriage->addErrorMessage(str_replace("%s", $this->Miscarriage->caption(), $this->Miscarriage->RequiredErrorMessage));
            }
        }
        if ($this->Induced1->Required) {
            if ($this->Induced1->FormValue == "") {
                $this->Induced1->addErrorMessage(str_replace("%s", $this->Induced1->caption(), $this->Induced1->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if ($this->Type->FormValue == "") {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
            }
        }
        if ($this->IfClinical->Required) {
            if (!$this->IfClinical->IsDetailKey && EmptyValue($this->IfClinical->FormValue)) {
                $this->IfClinical->addErrorMessage(str_replace("%s", $this->IfClinical->caption(), $this->IfClinical->RequiredErrorMessage));
            }
        }
        if ($this->GADate->Required) {
            if (!$this->GADate->IsDetailKey && EmptyValue($this->GADate->FormValue)) {
                $this->GADate->addErrorMessage(str_replace("%s", $this->GADate->caption(), $this->GADate->RequiredErrorMessage));
            }
        }
        if ($this->GA->Required) {
            if (!$this->GA->IsDetailKey && EmptyValue($this->GA->FormValue)) {
                $this->GA->addErrorMessage(str_replace("%s", $this->GA->caption(), $this->GA->RequiredErrorMessage));
            }
        }
        if ($this->FoetalDeath->Required) {
            if (!$this->FoetalDeath->IsDetailKey && EmptyValue($this->FoetalDeath->FormValue)) {
                $this->FoetalDeath->addErrorMessage(str_replace("%s", $this->FoetalDeath->caption(), $this->FoetalDeath->RequiredErrorMessage));
            }
        }
        if ($this->FerinatalDeath->Required) {
            if (!$this->FerinatalDeath->IsDetailKey && EmptyValue($this->FerinatalDeath->FormValue)) {
                $this->FerinatalDeath->addErrorMessage(str_replace("%s", $this->FerinatalDeath->caption(), $this->FerinatalDeath->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->Ectopic->Required) {
            if ($this->Ectopic->FormValue == "") {
                $this->Ectopic->addErrorMessage(str_replace("%s", $this->Ectopic->caption(), $this->Ectopic->RequiredErrorMessage));
            }
        }
        if ($this->Extra->Required) {
            if ($this->Extra->FormValue == "") {
                $this->Extra->addErrorMessage(str_replace("%s", $this->Extra->caption(), $this->Extra->RequiredErrorMessage));
            }
        }
        if ($this->Implantation->Required) {
            if (!$this->Implantation->IsDetailKey && EmptyValue($this->Implantation->FormValue)) {
                $this->Implantation->addErrorMessage(str_replace("%s", $this->Implantation->caption(), $this->Implantation->RequiredErrorMessage));
            }
        }
        if ($this->DeliveryDate->Required) {
            if (!$this->DeliveryDate->IsDetailKey && EmptyValue($this->DeliveryDate->FormValue)) {
                $this->DeliveryDate->addErrorMessage(str_replace("%s", $this->DeliveryDate->caption(), $this->DeliveryDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DeliveryDate->FormValue)) {
            $this->DeliveryDate->addErrorMessage($this->DeliveryDate->getErrorMessage(false));
        }
        if ($this->BabyDetails->Required) {
            if (!$this->BabyDetails->IsDetailKey && EmptyValue($this->BabyDetails->FormValue)) {
                $this->BabyDetails->addErrorMessage(str_replace("%s", $this->BabyDetails->caption(), $this->BabyDetails->RequiredErrorMessage));
            }
        }
        if ($this->LSCSNormal->Required) {
            if (!$this->LSCSNormal->IsDetailKey && EmptyValue($this->LSCSNormal->FormValue)) {
                $this->LSCSNormal->addErrorMessage(str_replace("%s", $this->LSCSNormal->caption(), $this->LSCSNormal->RequiredErrorMessage));
            }
        }
        if ($this->Notes->Required) {
            if (!$this->Notes->IsDetailKey && EmptyValue($this->Notes->FormValue)) {
                $this->Notes->addErrorMessage(str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // RIDNO
            if ($this->RIDNO->getSessionValue() != "") {
                $this->RIDNO->ReadOnly = true;
            }
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // Name
            if ($this->Name->getSessionValue() != "") {
                $this->Name->ReadOnly = true;
            }
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // treatment_status
            $this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, null, $this->treatment_status->ReadOnly);

            // ARTCYCLE
            $this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, null, $this->ARTCYCLE->ReadOnly);

            // RESULT
            $this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, null, $this->RESULT->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // outcomeDate
            $this->outcomeDate->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDate->CurrentValue, 0), null, $this->outcomeDate->ReadOnly);

            // outcomeDay
            $this->outcomeDay->setDbValueDef($rsnew, UnFormatDateTime($this->outcomeDay->CurrentValue, 0), null, $this->outcomeDay->ReadOnly);

            // OPResult
            $this->OPResult->setDbValueDef($rsnew, $this->OPResult->CurrentValue, null, $this->OPResult->ReadOnly);

            // Gestation
            $this->Gestation->setDbValueDef($rsnew, $this->Gestation->CurrentValue, null, $this->Gestation->ReadOnly);

            // TransferdEmbryos
            $this->TransferdEmbryos->setDbValueDef($rsnew, $this->TransferdEmbryos->CurrentValue, null, $this->TransferdEmbryos->ReadOnly);

            // InitalOfSacs
            $this->InitalOfSacs->setDbValueDef($rsnew, $this->InitalOfSacs->CurrentValue, null, $this->InitalOfSacs->ReadOnly);

            // ImplimentationRate
            $this->ImplimentationRate->setDbValueDef($rsnew, $this->ImplimentationRate->CurrentValue, null, $this->ImplimentationRate->ReadOnly);

            // EmbryoNo
            $this->EmbryoNo->setDbValueDef($rsnew, $this->EmbryoNo->CurrentValue, null, $this->EmbryoNo->ReadOnly);

            // ExtrauterineSac
            $this->ExtrauterineSac->setDbValueDef($rsnew, $this->ExtrauterineSac->CurrentValue, null, $this->ExtrauterineSac->ReadOnly);

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->setDbValueDef($rsnew, $this->PregnancyMonozygotic->CurrentValue, null, $this->PregnancyMonozygotic->ReadOnly);

            // TypeGestation
            $this->TypeGestation->setDbValueDef($rsnew, $this->TypeGestation->CurrentValue, null, $this->TypeGestation->ReadOnly);

            // Urine
            $this->Urine->setDbValueDef($rsnew, $this->Urine->CurrentValue, null, $this->Urine->ReadOnly);

            // PTdate
            $this->PTdate->setDbValueDef($rsnew, $this->PTdate->CurrentValue, null, $this->PTdate->ReadOnly);

            // Reduced
            $this->Reduced->setDbValueDef($rsnew, $this->Reduced->CurrentValue, null, $this->Reduced->ReadOnly);

            // INduced
            $this->INduced->setDbValueDef($rsnew, $this->INduced->CurrentValue, null, $this->INduced->ReadOnly);

            // INducedDate
            $this->INducedDate->setDbValueDef($rsnew, $this->INducedDate->CurrentValue, null, $this->INducedDate->ReadOnly);

            // Miscarriage
            $this->Miscarriage->setDbValueDef($rsnew, $this->Miscarriage->CurrentValue, null, $this->Miscarriage->ReadOnly);

            // Induced1
            $this->Induced1->setDbValueDef($rsnew, $this->Induced1->CurrentValue, null, $this->Induced1->ReadOnly);

            // Type
            $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, $this->Type->ReadOnly);

            // IfClinical
            $this->IfClinical->setDbValueDef($rsnew, $this->IfClinical->CurrentValue, null, $this->IfClinical->ReadOnly);

            // GADate
            $this->GADate->setDbValueDef($rsnew, $this->GADate->CurrentValue, null, $this->GADate->ReadOnly);

            // GA
            $this->GA->setDbValueDef($rsnew, $this->GA->CurrentValue, null, $this->GA->ReadOnly);

            // FoetalDeath
            $this->FoetalDeath->setDbValueDef($rsnew, $this->FoetalDeath->CurrentValue, null, $this->FoetalDeath->ReadOnly);

            // FerinatalDeath
            $this->FerinatalDeath->setDbValueDef($rsnew, $this->FerinatalDeath->CurrentValue, null, $this->FerinatalDeath->ReadOnly);

            // TidNo
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->ReadOnly = true;
            }
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // Ectopic
            $this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, null, $this->Ectopic->ReadOnly);

            // Extra
            $this->Extra->setDbValueDef($rsnew, $this->Extra->CurrentValue, null, $this->Extra->ReadOnly);

            // Implantation
            $this->Implantation->setDbValueDef($rsnew, $this->Implantation->CurrentValue, null, $this->Implantation->ReadOnly);

            // DeliveryDate
            $this->DeliveryDate->setDbValueDef($rsnew, UnFormatDateTime($this->DeliveryDate->CurrentValue, 7), null, $this->DeliveryDate->ReadOnly);

            // BabyDetails
            $this->BabyDetails->setDbValueDef($rsnew, $this->BabyDetails->CurrentValue, null, $this->BabyDetails->ReadOnly);

            // LSCSNormal
            $this->LSCSNormal->setDbValueDef($rsnew, $this->LSCSNormal->CurrentValue, null, $this->LSCSNormal->ReadOnly);

            // Notes
            $this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, null, $this->Notes->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Get("fk_RIDNO", Get("RIDNO"))) !== null) {
                    $masterTbl->RIDNO->setQueryStringValue($parm);
                    $this->RIDNO->setQueryStringValue($masterTbl->RIDNO->QueryStringValue);
                    $this->RIDNO->setSessionValue($this->RIDNO->QueryStringValue);
                    if (!is_numeric($masterTbl->RIDNO->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_Name", Get("Name"))) !== null) {
                    $masterTbl->Name->setQueryStringValue($parm);
                    $this->Name->setQueryStringValue($masterTbl->Name->QueryStringValue);
                    $this->Name->setSessionValue($this->Name->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_id", Get("TidNo"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->TidNo->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Post("fk_RIDNO", Post("RIDNO"))) !== null) {
                    $masterTbl->RIDNO->setFormValue($parm);
                    $this->RIDNO->setFormValue($masterTbl->RIDNO->FormValue);
                    $this->RIDNO->setSessionValue($this->RIDNO->FormValue);
                    if (!is_numeric($masterTbl->RIDNO->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_Name", Post("Name"))) !== null) {
                    $masterTbl->Name->setFormValue($parm);
                    $this->Name->setFormValue($masterTbl->Name->FormValue);
                    $this->Name->setSessionValue($this->Name->FormValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_id", Post("TidNo"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->TidNo->setFormValue($masterTbl->id->FormValue);
                    $this->TidNo->setSessionValue($this->TidNo->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);
            $this->setSessionWhere($this->getDetailFilter());

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "ivf_treatment_plan") {
                if ($this->RIDNO->CurrentValue == "") {
                    $this->RIDNO->setSessionValue("");
                }
                if ($this->Name->CurrentValue == "") {
                    $this->Name->setSessionValue("");
                }
                if ($this->TidNo->CurrentValue == "") {
                    $this->TidNo->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOutcomeList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions($fld)
    {
        if ($fld->Lookup !== null && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                case "x_Gestation":
                    break;
                case "x_Urine":
                    break;
                case "x_Miscarriage":
                    break;
                case "x_Induced1":
                    break;
                case "x_Type":
                    break;
                case "x_FoetalDeath":
                    break;
                case "x_FerinatalDeath":
                    break;
                case "x_Ectopic":
                    break;
                case "x_Extra":
                    break;
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $sql = $fld->Lookup->getSql(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
                $totalCnt = $this->getRecordCount($sql, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                $rows = $conn->executeQuery($sql)->fetchAll(\PDO::FETCH_BOTH);
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $ar[strval($row[0])] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Set up starting record parameters
    public function setupStartRecord()
    {
        if ($this->DisplayRecords == 0) {
            return;
        }
        if ($this->isPageRequest()) { // Validate request
            $startRec = Get(Config("TABLE_START_REC"));
            $pageNo = Get(Config("TABLE_PAGE_NO"));
            if ($pageNo !== null) { // Check for "pageno" parameter first
                if (is_numeric($pageNo)) {
                    $this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
                    if ($this->StartRecord <= 0) {
                        $this->StartRecord = 1;
                    } elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1) {
                        $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1;
                    }
                    $this->setStartRecordNumber($this->StartRecord);
                }
            } elseif ($startRec !== null) { // Check for "start" parameter
                $this->StartRecord = $startRec;
                $this->setStartRecordNumber($this->StartRecord);
            }
        }
        $this->StartRecord = $this->getStartRecordNumber();

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
            $this->setStartRecordNumber($this->StartRecord);
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Page Load event
    public function pageLoad()
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url)
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(&$msg, $type)
    {
        if ($type == 'success') {
            //$msg = "your success message";
        } elseif ($type == 'failure') {
            //$msg = "your failure message";
        } elseif ($type == 'warning') {
            //$msg = "your warning message";
        } else {
            //$msg = "your message";
        }
    }

    // Page Render event
    public function pageRender()
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(&$header)
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(&$footer)
    {
        // Example:
        //$footer = "your footer";
    }

    // Form Custom Validate event
    public function formCustomValidate(&$customError)
    {
        // Return error message in CustomError
        return true;
    }
}
