<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientInvestigationsEdit extends PatientInvestigations
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_investigations';

    // Page object name
    public $PageObjName = "PatientInvestigationsEdit";

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

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (patient_investigations)
        if (!isset($GLOBALS["patient_investigations"]) || get_class($GLOBALS["patient_investigations"]) == PROJECT_NAMESPACE . "patient_investigations") {
            $GLOBALS["patient_investigations"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_investigations');
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

         // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }

        // Global Page Unloaded event (in userfn*.php)
        Page_Unloaded();

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("patient_investigations"));
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
                    if ($pageName == "PatientInvestigationsView") {
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
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
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
        $this->Reception->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Investigation->setVisibility();
        $this->Value->setVisibility();
        $this->NormalRange->setVisibility();
        $this->mrnno->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->SampleCollected->setVisibility();
        $this->SampleCollectedBy->setVisibility();
        $this->ResultedDate->setVisibility();
        $this->ResultedBy->setVisibility();
        $this->Modified->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->Created->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->GroupHead->setVisibility();
        $this->Cost->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->PayMode->setVisibility();
        $this->VoucherNo->setVisibility();
        $this->InvestigationMultiselect->setVisibility();
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
                    $this->terminate("PatientInvestigationsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientInvestigationsList") {
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'Investigation' first before field var 'x_Investigation'
        $val = $CurrentForm->hasValue("Investigation") ? $CurrentForm->getValue("Investigation") : $CurrentForm->getValue("x_Investigation");
        if (!$this->Investigation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Investigation->Visible = false; // Disable update for API request
            } else {
                $this->Investigation->setFormValue($val);
            }
        }

        // Check field name 'Value' first before field var 'x_Value'
        $val = $CurrentForm->hasValue("Value") ? $CurrentForm->getValue("Value") : $CurrentForm->getValue("x_Value");
        if (!$this->Value->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Value->Visible = false; // Disable update for API request
            } else {
                $this->Value->setFormValue($val);
            }
        }

        // Check field name 'NormalRange' first before field var 'x_NormalRange'
        $val = $CurrentForm->hasValue("NormalRange") ? $CurrentForm->getValue("NormalRange") : $CurrentForm->getValue("x_NormalRange");
        if (!$this->NormalRange->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NormalRange->Visible = false; // Disable update for API request
            } else {
                $this->NormalRange->setFormValue($val);
            }
        }

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
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

        // Check field name 'Gender' first before field var 'x_Gender'
        $val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
        if (!$this->Gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gender->Visible = false; // Disable update for API request
            } else {
                $this->Gender->setFormValue($val);
            }
        }

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }

        // Check field name 'SampleCollected' first before field var 'x_SampleCollected'
        $val = $CurrentForm->hasValue("SampleCollected") ? $CurrentForm->getValue("SampleCollected") : $CurrentForm->getValue("x_SampleCollected");
        if (!$this->SampleCollected->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleCollected->Visible = false; // Disable update for API request
            } else {
                $this->SampleCollected->setFormValue($val);
            }
            $this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
        }

        // Check field name 'SampleCollectedBy' first before field var 'x_SampleCollectedBy'
        $val = $CurrentForm->hasValue("SampleCollectedBy") ? $CurrentForm->getValue("SampleCollectedBy") : $CurrentForm->getValue("x_SampleCollectedBy");
        if (!$this->SampleCollectedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SampleCollectedBy->Visible = false; // Disable update for API request
            } else {
                $this->SampleCollectedBy->setFormValue($val);
            }
        }

        // Check field name 'ResultedDate' first before field var 'x_ResultedDate'
        $val = $CurrentForm->hasValue("ResultedDate") ? $CurrentForm->getValue("ResultedDate") : $CurrentForm->getValue("x_ResultedDate");
        if (!$this->ResultedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultedDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultedDate->setFormValue($val);
            }
            $this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
        }

        // Check field name 'ResultedBy' first before field var 'x_ResultedBy'
        $val = $CurrentForm->hasValue("ResultedBy") ? $CurrentForm->getValue("ResultedBy") : $CurrentForm->getValue("x_ResultedBy");
        if (!$this->ResultedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultedBy->Visible = false; // Disable update for API request
            } else {
                $this->ResultedBy->setFormValue($val);
            }
        }

        // Check field name 'Modified' first before field var 'x_Modified'
        $val = $CurrentForm->hasValue("Modified") ? $CurrentForm->getValue("Modified") : $CurrentForm->getValue("x_Modified");
        if (!$this->Modified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Modified->Visible = false; // Disable update for API request
            } else {
                $this->Modified->setFormValue($val);
            }
            $this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
        }

        // Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
        $val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
        if (!$this->ModifiedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedBy->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedBy->setFormValue($val);
            }
        }

        // Check field name 'Created' first before field var 'x_Created'
        $val = $CurrentForm->hasValue("Created") ? $CurrentForm->getValue("Created") : $CurrentForm->getValue("x_Created");
        if (!$this->Created->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Created->Visible = false; // Disable update for API request
            } else {
                $this->Created->setFormValue($val);
            }
            $this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
        }

        // Check field name 'CreatedBy' first before field var 'x_CreatedBy'
        $val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
        if (!$this->CreatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedBy->Visible = false; // Disable update for API request
            } else {
                $this->CreatedBy->setFormValue($val);
            }
        }

        // Check field name 'GroupHead' first before field var 'x_GroupHead'
        $val = $CurrentForm->hasValue("GroupHead") ? $CurrentForm->getValue("GroupHead") : $CurrentForm->getValue("x_GroupHead");
        if (!$this->GroupHead->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupHead->Visible = false; // Disable update for API request
            } else {
                $this->GroupHead->setFormValue($val);
            }
        }

        // Check field name 'Cost' first before field var 'x_Cost'
        $val = $CurrentForm->hasValue("Cost") ? $CurrentForm->getValue("Cost") : $CurrentForm->getValue("x_Cost");
        if (!$this->Cost->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cost->Visible = false; // Disable update for API request
            } else {
                $this->Cost->setFormValue($val);
            }
        }

        // Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
        $val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
        if (!$this->PaymentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentStatus->Visible = false; // Disable update for API request
            } else {
                $this->PaymentStatus->setFormValue($val);
            }
        }

        // Check field name 'PayMode' first before field var 'x_PayMode'
        $val = $CurrentForm->hasValue("PayMode") ? $CurrentForm->getValue("PayMode") : $CurrentForm->getValue("x_PayMode");
        if (!$this->PayMode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PayMode->Visible = false; // Disable update for API request
            } else {
                $this->PayMode->setFormValue($val);
            }
        }

        // Check field name 'VoucherNo' first before field var 'x_VoucherNo'
        $val = $CurrentForm->hasValue("VoucherNo") ? $CurrentForm->getValue("VoucherNo") : $CurrentForm->getValue("x_VoucherNo");
        if (!$this->VoucherNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VoucherNo->Visible = false; // Disable update for API request
            } else {
                $this->VoucherNo->setFormValue($val);
            }
        }

        // Check field name 'InvestigationMultiselect' first before field var 'x_InvestigationMultiselect'
        $val = $CurrentForm->hasValue("InvestigationMultiselect") ? $CurrentForm->getValue("InvestigationMultiselect") : $CurrentForm->getValue("x_InvestigationMultiselect");
        if (!$this->InvestigationMultiselect->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InvestigationMultiselect->Visible = false; // Disable update for API request
            } else {
                $this->InvestigationMultiselect->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Investigation->CurrentValue = $this->Investigation->FormValue;
        $this->Value->CurrentValue = $this->Value->FormValue;
        $this->NormalRange->CurrentValue = $this->NormalRange->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->SampleCollected->CurrentValue = $this->SampleCollected->FormValue;
        $this->SampleCollected->CurrentValue = UnFormatDateTime($this->SampleCollected->CurrentValue, 0);
        $this->SampleCollectedBy->CurrentValue = $this->SampleCollectedBy->FormValue;
        $this->ResultedDate->CurrentValue = $this->ResultedDate->FormValue;
        $this->ResultedDate->CurrentValue = UnFormatDateTime($this->ResultedDate->CurrentValue, 0);
        $this->ResultedBy->CurrentValue = $this->ResultedBy->FormValue;
        $this->Modified->CurrentValue = $this->Modified->FormValue;
        $this->Modified->CurrentValue = UnFormatDateTime($this->Modified->CurrentValue, 0);
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->Created->CurrentValue = $this->Created->FormValue;
        $this->Created->CurrentValue = UnFormatDateTime($this->Created->CurrentValue, 0);
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->GroupHead->CurrentValue = $this->GroupHead->FormValue;
        $this->Cost->CurrentValue = $this->Cost->FormValue;
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->PayMode->CurrentValue = $this->PayMode->FormValue;
        $this->VoucherNo->CurrentValue = $this->VoucherNo->FormValue;
        $this->InvestigationMultiselect->CurrentValue = $this->InvestigationMultiselect->FormValue;
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Investigation->setDbValue($row['Investigation']);
        $this->Value->setDbValue($row['Value']);
        $this->NormalRange->setDbValue($row['NormalRange']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->SampleCollected->setDbValue($row['SampleCollected']);
        $this->SampleCollectedBy->setDbValue($row['SampleCollectedBy']);
        $this->ResultedDate->setDbValue($row['ResultedDate']);
        $this->ResultedBy->setDbValue($row['ResultedBy']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->GroupHead->setDbValue($row['GroupHead']);
        $this->Cost->setDbValue($row['Cost']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PayMode->setDbValue($row['PayMode']);
        $this->VoucherNo->setDbValue($row['VoucherNo']);
        $this->InvestigationMultiselect->setDbValue($row['InvestigationMultiselect']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Investigation'] = null;
        $row['Value'] = null;
        $row['NormalRange'] = null;
        $row['mrnno'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['SampleCollected'] = null;
        $row['SampleCollectedBy'] = null;
        $row['ResultedDate'] = null;
        $row['ResultedBy'] = null;
        $row['Modified'] = null;
        $row['ModifiedBy'] = null;
        $row['Created'] = null;
        $row['CreatedBy'] = null;
        $row['GroupHead'] = null;
        $row['Cost'] = null;
        $row['PaymentStatus'] = null;
        $row['PayMode'] = null;
        $row['VoucherNo'] = null;
        $row['InvestigationMultiselect'] = null;
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

        // Convert decimal values if posted back
        if ($this->Cost->FormValue == $this->Cost->CurrentValue && is_numeric(ConvertToFloatString($this->Cost->CurrentValue))) {
            $this->Cost->CurrentValue = ConvertToFloatString($this->Cost->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // PatientId

        // PatientName

        // Investigation

        // Value

        // NormalRange

        // mrnno

        // Age

        // Gender

        // profilePic

        // SampleCollected

        // SampleCollectedBy

        // ResultedDate

        // ResultedBy

        // Modified

        // ModifiedBy

        // Created

        // CreatedBy

        // GroupHead

        // Cost

        // PaymentStatus

        // PayMode

        // VoucherNo

        // InvestigationMultiselect
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Investigation
            $this->Investigation->ViewValue = $this->Investigation->CurrentValue;
            $this->Investigation->ViewCustomAttributes = "";

            // Value
            $this->Value->ViewValue = $this->Value->CurrentValue;
            $this->Value->ViewCustomAttributes = "";

            // NormalRange
            $this->NormalRange->ViewValue = $this->NormalRange->CurrentValue;
            $this->NormalRange->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // SampleCollected
            $this->SampleCollected->ViewValue = $this->SampleCollected->CurrentValue;
            $this->SampleCollected->ViewValue = FormatDateTime($this->SampleCollected->ViewValue, 0);
            $this->SampleCollected->ViewCustomAttributes = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->ViewValue = $this->SampleCollectedBy->CurrentValue;
            $this->SampleCollectedBy->ViewCustomAttributes = "";

            // ResultedDate
            $this->ResultedDate->ViewValue = $this->ResultedDate->CurrentValue;
            $this->ResultedDate->ViewValue = FormatDateTime($this->ResultedDate->ViewValue, 0);
            $this->ResultedDate->ViewCustomAttributes = "";

            // ResultedBy
            $this->ResultedBy->ViewValue = $this->ResultedBy->CurrentValue;
            $this->ResultedBy->ViewCustomAttributes = "";

            // Modified
            $this->Modified->ViewValue = $this->Modified->CurrentValue;
            $this->Modified->ViewValue = FormatDateTime($this->Modified->ViewValue, 0);
            $this->Modified->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // Created
            $this->Created->ViewValue = $this->Created->CurrentValue;
            $this->Created->ViewValue = FormatDateTime($this->Created->ViewValue, 0);
            $this->Created->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // GroupHead
            $this->GroupHead->ViewValue = $this->GroupHead->CurrentValue;
            $this->GroupHead->ViewCustomAttributes = "";

            // Cost
            $this->Cost->ViewValue = $this->Cost->CurrentValue;
            $this->Cost->ViewValue = FormatNumber($this->Cost->ViewValue, 2, -2, -2, -2);
            $this->Cost->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewCustomAttributes = "";

            // PayMode
            $this->PayMode->ViewValue = $this->PayMode->CurrentValue;
            $this->PayMode->ViewCustomAttributes = "";

            // VoucherNo
            $this->VoucherNo->ViewValue = $this->VoucherNo->CurrentValue;
            $this->VoucherNo->ViewCustomAttributes = "";

            // InvestigationMultiselect
            $this->InvestigationMultiselect->ViewValue = $this->InvestigationMultiselect->CurrentValue;
            $this->InvestigationMultiselect->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Investigation
            $this->Investigation->LinkCustomAttributes = "";
            $this->Investigation->HrefValue = "";
            $this->Investigation->TooltipValue = "";

            // Value
            $this->Value->LinkCustomAttributes = "";
            $this->Value->HrefValue = "";
            $this->Value->TooltipValue = "";

            // NormalRange
            $this->NormalRange->LinkCustomAttributes = "";
            $this->NormalRange->HrefValue = "";
            $this->NormalRange->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // SampleCollected
            $this->SampleCollected->LinkCustomAttributes = "";
            $this->SampleCollected->HrefValue = "";
            $this->SampleCollected->TooltipValue = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->LinkCustomAttributes = "";
            $this->SampleCollectedBy->HrefValue = "";
            $this->SampleCollectedBy->TooltipValue = "";

            // ResultedDate
            $this->ResultedDate->LinkCustomAttributes = "";
            $this->ResultedDate->HrefValue = "";
            $this->ResultedDate->TooltipValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";
            $this->ResultedBy->TooltipValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";
            $this->Modified->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";
            $this->Created->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // GroupHead
            $this->GroupHead->LinkCustomAttributes = "";
            $this->GroupHead->HrefValue = "";
            $this->GroupHead->TooltipValue = "";

            // Cost
            $this->Cost->LinkCustomAttributes = "";
            $this->Cost->HrefValue = "";
            $this->Cost->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // PayMode
            $this->PayMode->LinkCustomAttributes = "";
            $this->PayMode->HrefValue = "";
            $this->PayMode->TooltipValue = "";

            // VoucherNo
            $this->VoucherNo->LinkCustomAttributes = "";
            $this->VoucherNo->HrefValue = "";
            $this->VoucherNo->TooltipValue = "";

            // InvestigationMultiselect
            $this->InvestigationMultiselect->LinkCustomAttributes = "";
            $this->InvestigationMultiselect->HrefValue = "";
            $this->InvestigationMultiselect->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Investigation
            $this->Investigation->EditAttrs["class"] = "form-control";
            $this->Investigation->EditCustomAttributes = "";
            if (!$this->Investigation->Raw) {
                $this->Investigation->CurrentValue = HtmlDecode($this->Investigation->CurrentValue);
            }
            $this->Investigation->EditValue = HtmlEncode($this->Investigation->CurrentValue);
            $this->Investigation->PlaceHolder = RemoveHtml($this->Investigation->caption());

            // Value
            $this->Value->EditAttrs["class"] = "form-control";
            $this->Value->EditCustomAttributes = "";
            if (!$this->Value->Raw) {
                $this->Value->CurrentValue = HtmlDecode($this->Value->CurrentValue);
            }
            $this->Value->EditValue = HtmlEncode($this->Value->CurrentValue);
            $this->Value->PlaceHolder = RemoveHtml($this->Value->caption());

            // NormalRange
            $this->NormalRange->EditAttrs["class"] = "form-control";
            $this->NormalRange->EditCustomAttributes = "";
            if (!$this->NormalRange->Raw) {
                $this->NormalRange->CurrentValue = HtmlDecode($this->NormalRange->CurrentValue);
            }
            $this->NormalRange->EditValue = HtmlEncode($this->NormalRange->CurrentValue);
            $this->NormalRange->PlaceHolder = RemoveHtml($this->NormalRange->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // SampleCollected
            $this->SampleCollected->EditAttrs["class"] = "form-control";
            $this->SampleCollected->EditCustomAttributes = "";
            $this->SampleCollected->EditValue = HtmlEncode(FormatDateTime($this->SampleCollected->CurrentValue, 8));
            $this->SampleCollected->PlaceHolder = RemoveHtml($this->SampleCollected->caption());

            // SampleCollectedBy
            $this->SampleCollectedBy->EditAttrs["class"] = "form-control";
            $this->SampleCollectedBy->EditCustomAttributes = "";
            if (!$this->SampleCollectedBy->Raw) {
                $this->SampleCollectedBy->CurrentValue = HtmlDecode($this->SampleCollectedBy->CurrentValue);
            }
            $this->SampleCollectedBy->EditValue = HtmlEncode($this->SampleCollectedBy->CurrentValue);
            $this->SampleCollectedBy->PlaceHolder = RemoveHtml($this->SampleCollectedBy->caption());

            // ResultedDate
            $this->ResultedDate->EditAttrs["class"] = "form-control";
            $this->ResultedDate->EditCustomAttributes = "";
            $this->ResultedDate->EditValue = HtmlEncode(FormatDateTime($this->ResultedDate->CurrentValue, 8));
            $this->ResultedDate->PlaceHolder = RemoveHtml($this->ResultedDate->caption());

            // ResultedBy
            $this->ResultedBy->EditAttrs["class"] = "form-control";
            $this->ResultedBy->EditCustomAttributes = "";
            if (!$this->ResultedBy->Raw) {
                $this->ResultedBy->CurrentValue = HtmlDecode($this->ResultedBy->CurrentValue);
            }
            $this->ResultedBy->EditValue = HtmlEncode($this->ResultedBy->CurrentValue);
            $this->ResultedBy->PlaceHolder = RemoveHtml($this->ResultedBy->caption());

            // Modified
            $this->Modified->EditAttrs["class"] = "form-control";
            $this->Modified->EditCustomAttributes = "";
            $this->Modified->EditValue = HtmlEncode(FormatDateTime($this->Modified->CurrentValue, 8));
            $this->Modified->PlaceHolder = RemoveHtml($this->Modified->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // Created
            $this->Created->EditAttrs["class"] = "form-control";
            $this->Created->EditCustomAttributes = "";
            $this->Created->EditValue = HtmlEncode(FormatDateTime($this->Created->CurrentValue, 8));
            $this->Created->PlaceHolder = RemoveHtml($this->Created->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // GroupHead
            $this->GroupHead->EditAttrs["class"] = "form-control";
            $this->GroupHead->EditCustomAttributes = "";
            if (!$this->GroupHead->Raw) {
                $this->GroupHead->CurrentValue = HtmlDecode($this->GroupHead->CurrentValue);
            }
            $this->GroupHead->EditValue = HtmlEncode($this->GroupHead->CurrentValue);
            $this->GroupHead->PlaceHolder = RemoveHtml($this->GroupHead->caption());

            // Cost
            $this->Cost->EditAttrs["class"] = "form-control";
            $this->Cost->EditCustomAttributes = "";
            $this->Cost->EditValue = HtmlEncode($this->Cost->CurrentValue);
            $this->Cost->PlaceHolder = RemoveHtml($this->Cost->caption());
            if (strval($this->Cost->EditValue) != "" && is_numeric($this->Cost->EditValue)) {
                $this->Cost->EditValue = FormatNumber($this->Cost->EditValue, -2, -2, -2, -2);
            }

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            if (!$this->PaymentStatus->Raw) {
                $this->PaymentStatus->CurrentValue = HtmlDecode($this->PaymentStatus->CurrentValue);
            }
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

            // PayMode
            $this->PayMode->EditAttrs["class"] = "form-control";
            $this->PayMode->EditCustomAttributes = "";
            if (!$this->PayMode->Raw) {
                $this->PayMode->CurrentValue = HtmlDecode($this->PayMode->CurrentValue);
            }
            $this->PayMode->EditValue = HtmlEncode($this->PayMode->CurrentValue);
            $this->PayMode->PlaceHolder = RemoveHtml($this->PayMode->caption());

            // VoucherNo
            $this->VoucherNo->EditAttrs["class"] = "form-control";
            $this->VoucherNo->EditCustomAttributes = "";
            if (!$this->VoucherNo->Raw) {
                $this->VoucherNo->CurrentValue = HtmlDecode($this->VoucherNo->CurrentValue);
            }
            $this->VoucherNo->EditValue = HtmlEncode($this->VoucherNo->CurrentValue);
            $this->VoucherNo->PlaceHolder = RemoveHtml($this->VoucherNo->caption());

            // InvestigationMultiselect
            $this->InvestigationMultiselect->EditAttrs["class"] = "form-control";
            $this->InvestigationMultiselect->EditCustomAttributes = "";
            if (!$this->InvestigationMultiselect->Raw) {
                $this->InvestigationMultiselect->CurrentValue = HtmlDecode($this->InvestigationMultiselect->CurrentValue);
            }
            $this->InvestigationMultiselect->EditValue = HtmlEncode($this->InvestigationMultiselect->CurrentValue);
            $this->InvestigationMultiselect->PlaceHolder = RemoveHtml($this->InvestigationMultiselect->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Investigation
            $this->Investigation->LinkCustomAttributes = "";
            $this->Investigation->HrefValue = "";

            // Value
            $this->Value->LinkCustomAttributes = "";
            $this->Value->HrefValue = "";

            // NormalRange
            $this->NormalRange->LinkCustomAttributes = "";
            $this->NormalRange->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // SampleCollected
            $this->SampleCollected->LinkCustomAttributes = "";
            $this->SampleCollected->HrefValue = "";

            // SampleCollectedBy
            $this->SampleCollectedBy->LinkCustomAttributes = "";
            $this->SampleCollectedBy->HrefValue = "";

            // ResultedDate
            $this->ResultedDate->LinkCustomAttributes = "";
            $this->ResultedDate->HrefValue = "";

            // ResultedBy
            $this->ResultedBy->LinkCustomAttributes = "";
            $this->ResultedBy->HrefValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // GroupHead
            $this->GroupHead->LinkCustomAttributes = "";
            $this->GroupHead->HrefValue = "";

            // Cost
            $this->Cost->LinkCustomAttributes = "";
            $this->Cost->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

            // PayMode
            $this->PayMode->LinkCustomAttributes = "";
            $this->PayMode->HrefValue = "";

            // VoucherNo
            $this->VoucherNo->LinkCustomAttributes = "";
            $this->VoucherNo->HrefValue = "";

            // InvestigationMultiselect
            $this->InvestigationMultiselect->LinkCustomAttributes = "";
            $this->InvestigationMultiselect->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Investigation->Required) {
            if (!$this->Investigation->IsDetailKey && EmptyValue($this->Investigation->FormValue)) {
                $this->Investigation->addErrorMessage(str_replace("%s", $this->Investigation->caption(), $this->Investigation->RequiredErrorMessage));
            }
        }
        if ($this->Value->Required) {
            if (!$this->Value->IsDetailKey && EmptyValue($this->Value->FormValue)) {
                $this->Value->addErrorMessage(str_replace("%s", $this->Value->caption(), $this->Value->RequiredErrorMessage));
            }
        }
        if ($this->NormalRange->Required) {
            if (!$this->NormalRange->IsDetailKey && EmptyValue($this->NormalRange->FormValue)) {
                $this->NormalRange->addErrorMessage(str_replace("%s", $this->NormalRange->caption(), $this->NormalRange->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->Gender->Required) {
            if (!$this->Gender->IsDetailKey && EmptyValue($this->Gender->FormValue)) {
                $this->Gender->addErrorMessage(str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->SampleCollected->Required) {
            if (!$this->SampleCollected->IsDetailKey && EmptyValue($this->SampleCollected->FormValue)) {
                $this->SampleCollected->addErrorMessage(str_replace("%s", $this->SampleCollected->caption(), $this->SampleCollected->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->SampleCollected->FormValue)) {
            $this->SampleCollected->addErrorMessage($this->SampleCollected->getErrorMessage(false));
        }
        if ($this->SampleCollectedBy->Required) {
            if (!$this->SampleCollectedBy->IsDetailKey && EmptyValue($this->SampleCollectedBy->FormValue)) {
                $this->SampleCollectedBy->addErrorMessage(str_replace("%s", $this->SampleCollectedBy->caption(), $this->SampleCollectedBy->RequiredErrorMessage));
            }
        }
        if ($this->ResultedDate->Required) {
            if (!$this->ResultedDate->IsDetailKey && EmptyValue($this->ResultedDate->FormValue)) {
                $this->ResultedDate->addErrorMessage(str_replace("%s", $this->ResultedDate->caption(), $this->ResultedDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultedDate->FormValue)) {
            $this->ResultedDate->addErrorMessage($this->ResultedDate->getErrorMessage(false));
        }
        if ($this->ResultedBy->Required) {
            if (!$this->ResultedBy->IsDetailKey && EmptyValue($this->ResultedBy->FormValue)) {
                $this->ResultedBy->addErrorMessage(str_replace("%s", $this->ResultedBy->caption(), $this->ResultedBy->RequiredErrorMessage));
            }
        }
        if ($this->Modified->Required) {
            if (!$this->Modified->IsDetailKey && EmptyValue($this->Modified->FormValue)) {
                $this->Modified->addErrorMessage(str_replace("%s", $this->Modified->caption(), $this->Modified->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Modified->FormValue)) {
            $this->Modified->addErrorMessage($this->Modified->getErrorMessage(false));
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->Created->Required) {
            if (!$this->Created->IsDetailKey && EmptyValue($this->Created->FormValue)) {
                $this->Created->addErrorMessage(str_replace("%s", $this->Created->caption(), $this->Created->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Created->FormValue)) {
            $this->Created->addErrorMessage($this->Created->getErrorMessage(false));
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if ($this->GroupHead->Required) {
            if (!$this->GroupHead->IsDetailKey && EmptyValue($this->GroupHead->FormValue)) {
                $this->GroupHead->addErrorMessage(str_replace("%s", $this->GroupHead->caption(), $this->GroupHead->RequiredErrorMessage));
            }
        }
        if ($this->Cost->Required) {
            if (!$this->Cost->IsDetailKey && EmptyValue($this->Cost->FormValue)) {
                $this->Cost->addErrorMessage(str_replace("%s", $this->Cost->caption(), $this->Cost->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Cost->FormValue)) {
            $this->Cost->addErrorMessage($this->Cost->getErrorMessage(false));
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if ($this->PayMode->Required) {
            if (!$this->PayMode->IsDetailKey && EmptyValue($this->PayMode->FormValue)) {
                $this->PayMode->addErrorMessage(str_replace("%s", $this->PayMode->caption(), $this->PayMode->RequiredErrorMessage));
            }
        }
        if ($this->VoucherNo->Required) {
            if (!$this->VoucherNo->IsDetailKey && EmptyValue($this->VoucherNo->FormValue)) {
                $this->VoucherNo->addErrorMessage(str_replace("%s", $this->VoucherNo->caption(), $this->VoucherNo->RequiredErrorMessage));
            }
        }
        if ($this->InvestigationMultiselect->Required) {
            if (!$this->InvestigationMultiselect->IsDetailKey && EmptyValue($this->InvestigationMultiselect->FormValue)) {
                $this->InvestigationMultiselect->addErrorMessage(str_replace("%s", $this->InvestigationMultiselect->caption(), $this->InvestigationMultiselect->RequiredErrorMessage));
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

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Investigation
            $this->Investigation->setDbValueDef($rsnew, $this->Investigation->CurrentValue, null, $this->Investigation->ReadOnly);

            // Value
            $this->Value->setDbValueDef($rsnew, $this->Value->CurrentValue, null, $this->Value->ReadOnly);

            // NormalRange
            $this->NormalRange->setDbValueDef($rsnew, $this->NormalRange->CurrentValue, null, $this->NormalRange->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // SampleCollected
            $this->SampleCollected->setDbValueDef($rsnew, UnFormatDateTime($this->SampleCollected->CurrentValue, 0), null, $this->SampleCollected->ReadOnly);

            // SampleCollectedBy
            $this->SampleCollectedBy->setDbValueDef($rsnew, $this->SampleCollectedBy->CurrentValue, null, $this->SampleCollectedBy->ReadOnly);

            // ResultedDate
            $this->ResultedDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultedDate->CurrentValue, 0), null, $this->ResultedDate->ReadOnly);

            // ResultedBy
            $this->ResultedBy->setDbValueDef($rsnew, $this->ResultedBy->CurrentValue, null, $this->ResultedBy->ReadOnly);

            // Modified
            $this->Modified->setDbValueDef($rsnew, UnFormatDateTime($this->Modified->CurrentValue, 0), null, $this->Modified->ReadOnly);

            // ModifiedBy
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, $this->ModifiedBy->ReadOnly);

            // Created
            $this->Created->setDbValueDef($rsnew, UnFormatDateTime($this->Created->CurrentValue, 0), null, $this->Created->ReadOnly);

            // CreatedBy
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, $this->CreatedBy->ReadOnly);

            // GroupHead
            $this->GroupHead->setDbValueDef($rsnew, $this->GroupHead->CurrentValue, null, $this->GroupHead->ReadOnly);

            // Cost
            $this->Cost->setDbValueDef($rsnew, $this->Cost->CurrentValue, null, $this->Cost->ReadOnly);

            // PaymentStatus
            $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, $this->PaymentStatus->ReadOnly);

            // PayMode
            $this->PayMode->setDbValueDef($rsnew, $this->PayMode->CurrentValue, null, $this->PayMode->ReadOnly);

            // VoucherNo
            $this->VoucherNo->setDbValueDef($rsnew, $this->VoucherNo->CurrentValue, null, $this->VoucherNo->ReadOnly);

            // InvestigationMultiselect
            $this->InvestigationMultiselect->setDbValueDef($rsnew, $this->InvestigationMultiselect->CurrentValue, "", $this->InvestigationMultiselect->ReadOnly);

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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Get("fk_id", Get("Reception"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Reception->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Reception->setSessionValue($this->Reception->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PatientId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PatientId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Post("fk_id", Post("Reception"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Reception->setFormValue($masterTbl->id->FormValue);
                    $this->Reception->setSessionValue($this->Reception->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_patient_id", Post("PatientId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PatientId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PatientId->setSessionValue($this->PatientId->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setFormValue($parm);
                    $this->mrnno->setFormValue($masterTbl->mrnNo->FormValue);
                    $this->mrnno->setSessionValue($this->mrnno->FormValue);
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
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->PatientId->CurrentValue == "") {
                    $this->PatientId->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientInvestigationsList"), "", $this->TableVar, true);
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
