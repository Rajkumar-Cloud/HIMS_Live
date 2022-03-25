<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfSemenanalysisreportEdit extends IvfSemenanalysisreport
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_semenanalysisreport';

    // Page object name
    public $PageObjName = "IvfSemenanalysisreportEdit";

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

        // Table object (ivf_semenanalysisreport)
        if (!isset($GLOBALS["ivf_semenanalysisreport"]) || get_class($GLOBALS["ivf_semenanalysisreport"]) == PROJECT_NAMESPACE . "ivf_semenanalysisreport") {
            $GLOBALS["ivf_semenanalysisreport"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_semenanalysisreport');
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
                $doc = new $class(Container("ivf_semenanalysisreport"));
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
                    if ($pageName == "IvfSemenanalysisreportView") {
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
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->HusbandName->setVisibility();
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->setVisibility();
        $this->CollectionMethod->setVisibility();
        $this->Medicationused->setVisibility();
        $this->DifficultiesinCollection->setVisibility();
        $this->pH->setVisibility();
        $this->Timeofcollection->setVisibility();
        $this->Timeofexamination->setVisibility();
        $this->Volume->setVisibility();
        $this->Concentration->setVisibility();
        $this->Total->setVisibility();
        $this->ProgressiveMotility->setVisibility();
        $this->NonProgrssiveMotile->setVisibility();
        $this->Immotile->setVisibility();
        $this->TotalProgrssiveMotile->setVisibility();
        $this->Appearance->setVisibility();
        $this->Homogenosity->setVisibility();
        $this->CompleteSample->setVisibility();
        $this->Liquefactiontime->setVisibility();
        $this->Normal->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Headdefects->setVisibility();
        $this->MidpieceDefects->setVisibility();
        $this->TailDefects->setVisibility();
        $this->NormalProgMotile->setVisibility();
        $this->ImmatureForms->setVisibility();
        $this->Leucocytes->setVisibility();
        $this->Agglutination->setVisibility();
        $this->Debris->setVisibility();
        $this->Diagnosis->setVisibility();
        $this->Observations->setVisibility();
        $this->Signature->setVisibility();
        $this->SemenOrgin->setVisibility();
        $this->Donor->setVisibility();
        $this->DonorBloodgroup->setVisibility();
        $this->Tank->setVisibility();
        $this->Location->setVisibility();
        $this->Volume1->setVisibility();
        $this->Concentration1->setVisibility();
        $this->Total1->setVisibility();
        $this->ProgressiveMotility1->setVisibility();
        $this->NonProgrssiveMotile1->setVisibility();
        $this->Immotile1->setVisibility();
        $this->TotalProgrssiveMotile1->setVisibility();
        $this->TidNo->setVisibility();
        $this->Color->setVisibility();
        $this->DoneBy->setVisibility();
        $this->Method->setVisibility();
        $this->Abstinence->setVisibility();
        $this->ProcessedBy->setVisibility();
        $this->InseminationTime->setVisibility();
        $this->InseminationBy->setVisibility();
        $this->Big->setVisibility();
        $this->Medium->setVisibility();
        $this->Small->setVisibility();
        $this->NoHalo->setVisibility();
        $this->Fragmented->setVisibility();
        $this->NonFragmented->setVisibility();
        $this->DFI->setVisibility();
        $this->IsueBy->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total2->setVisibility();
        $this->ProgressiveMotility2->setVisibility();
        $this->NonProgrssiveMotile2->setVisibility();
        $this->Immotile2->setVisibility();
        $this->TotalProgrssiveMotile2->setVisibility();
        $this->MACS->setVisibility();
        $this->IssuedBy->setVisibility();
        $this->IssuedTo->setVisibility();
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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
        $this->setupLookupOptions($this->Donor);

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
                    $this->terminate("IvfSemenanalysisreportList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfSemenanalysisreportList") {
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

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
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

        // Check field name 'HusbandName' first before field var 'x_HusbandName'
        $val = $CurrentForm->hasValue("HusbandName") ? $CurrentForm->getValue("HusbandName") : $CurrentForm->getValue("x_HusbandName");
        if (!$this->HusbandName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandName->Visible = false; // Disable update for API request
            } else {
                $this->HusbandName->setFormValue($val);
            }
        }

        // Check field name 'RequestDr' first before field var 'x_RequestDr'
        $val = $CurrentForm->hasValue("RequestDr") ? $CurrentForm->getValue("RequestDr") : $CurrentForm->getValue("x_RequestDr");
        if (!$this->RequestDr->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestDr->Visible = false; // Disable update for API request
            } else {
                $this->RequestDr->setFormValue($val);
            }
        }

        // Check field name 'CollectionDate' first before field var 'x_CollectionDate'
        $val = $CurrentForm->hasValue("CollectionDate") ? $CurrentForm->getValue("CollectionDate") : $CurrentForm->getValue("x_CollectionDate");
        if (!$this->CollectionDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionDate->Visible = false; // Disable update for API request
            } else {
                $this->CollectionDate->setFormValue($val);
            }
            $this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
        }

        // Check field name 'ResultDate' first before field var 'x_ResultDate'
        $val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
        if (!$this->ResultDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultDate->setFormValue($val);
            }
            $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        }

        // Check field name 'RequestSample' first before field var 'x_RequestSample'
        $val = $CurrentForm->hasValue("RequestSample") ? $CurrentForm->getValue("RequestSample") : $CurrentForm->getValue("x_RequestSample");
        if (!$this->RequestSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestSample->Visible = false; // Disable update for API request
            } else {
                $this->RequestSample->setFormValue($val);
            }
        }

        // Check field name 'CollectionType' first before field var 'x_CollectionType'
        $val = $CurrentForm->hasValue("CollectionType") ? $CurrentForm->getValue("CollectionType") : $CurrentForm->getValue("x_CollectionType");
        if (!$this->CollectionType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionType->Visible = false; // Disable update for API request
            } else {
                $this->CollectionType->setFormValue($val);
            }
        }

        // Check field name 'CollectionMethod' first before field var 'x_CollectionMethod'
        $val = $CurrentForm->hasValue("CollectionMethod") ? $CurrentForm->getValue("CollectionMethod") : $CurrentForm->getValue("x_CollectionMethod");
        if (!$this->CollectionMethod->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionMethod->Visible = false; // Disable update for API request
            } else {
                $this->CollectionMethod->setFormValue($val);
            }
        }

        // Check field name 'Medicationused' first before field var 'x_Medicationused'
        $val = $CurrentForm->hasValue("Medicationused") ? $CurrentForm->getValue("Medicationused") : $CurrentForm->getValue("x_Medicationused");
        if (!$this->Medicationused->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicationused->Visible = false; // Disable update for API request
            } else {
                $this->Medicationused->setFormValue($val);
            }
        }

        // Check field name 'DifficultiesinCollection' first before field var 'x_DifficultiesinCollection'
        $val = $CurrentForm->hasValue("DifficultiesinCollection") ? $CurrentForm->getValue("DifficultiesinCollection") : $CurrentForm->getValue("x_DifficultiesinCollection");
        if (!$this->DifficultiesinCollection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DifficultiesinCollection->Visible = false; // Disable update for API request
            } else {
                $this->DifficultiesinCollection->setFormValue($val);
            }
        }

        // Check field name 'pH' first before field var 'x_pH'
        $val = $CurrentForm->hasValue("pH") ? $CurrentForm->getValue("pH") : $CurrentForm->getValue("x_pH");
        if (!$this->pH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pH->Visible = false; // Disable update for API request
            } else {
                $this->pH->setFormValue($val);
            }
        }

        // Check field name 'Timeofcollection' first before field var 'x_Timeofcollection'
        $val = $CurrentForm->hasValue("Timeofcollection") ? $CurrentForm->getValue("Timeofcollection") : $CurrentForm->getValue("x_Timeofcollection");
        if (!$this->Timeofcollection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Timeofcollection->Visible = false; // Disable update for API request
            } else {
                $this->Timeofcollection->setFormValue($val);
            }
        }

        // Check field name 'Timeofexamination' first before field var 'x_Timeofexamination'
        $val = $CurrentForm->hasValue("Timeofexamination") ? $CurrentForm->getValue("Timeofexamination") : $CurrentForm->getValue("x_Timeofexamination");
        if (!$this->Timeofexamination->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Timeofexamination->Visible = false; // Disable update for API request
            } else {
                $this->Timeofexamination->setFormValue($val);
            }
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }

        // Check field name 'Concentration' first before field var 'x_Concentration'
        $val = $CurrentForm->hasValue("Concentration") ? $CurrentForm->getValue("Concentration") : $CurrentForm->getValue("x_Concentration");
        if (!$this->Concentration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration->Visible = false; // Disable update for API request
            } else {
                $this->Concentration->setFormValue($val);
            }
        }

        // Check field name 'Total' first before field var 'x_Total'
        $val = $CurrentForm->hasValue("Total") ? $CurrentForm->getValue("Total") : $CurrentForm->getValue("x_Total");
        if (!$this->Total->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total->Visible = false; // Disable update for API request
            } else {
                $this->Total->setFormValue($val);
            }
        }

        // Check field name 'ProgressiveMotility' first before field var 'x_ProgressiveMotility'
        $val = $CurrentForm->hasValue("ProgressiveMotility") ? $CurrentForm->getValue("ProgressiveMotility") : $CurrentForm->getValue("x_ProgressiveMotility");
        if (!$this->ProgressiveMotility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility->setFormValue($val);
            }
        }

        // Check field name 'NonProgrssiveMotile' first before field var 'x_NonProgrssiveMotile'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile") ? $CurrentForm->getValue("NonProgrssiveMotile") : $CurrentForm->getValue("x_NonProgrssiveMotile");
        if (!$this->NonProgrssiveMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile->setFormValue($val);
            }
        }

        // Check field name 'Immotile' first before field var 'x_Immotile'
        $val = $CurrentForm->hasValue("Immotile") ? $CurrentForm->getValue("Immotile") : $CurrentForm->getValue("x_Immotile");
        if (!$this->Immotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile->Visible = false; // Disable update for API request
            } else {
                $this->Immotile->setFormValue($val);
            }
        }

        // Check field name 'TotalProgrssiveMotile' first before field var 'x_TotalProgrssiveMotile'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile") ? $CurrentForm->getValue("TotalProgrssiveMotile") : $CurrentForm->getValue("x_TotalProgrssiveMotile");
        if (!$this->TotalProgrssiveMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile->setFormValue($val);
            }
        }

        // Check field name 'Appearance' first before field var 'x_Appearance'
        $val = $CurrentForm->hasValue("Appearance") ? $CurrentForm->getValue("Appearance") : $CurrentForm->getValue("x_Appearance");
        if (!$this->Appearance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Appearance->Visible = false; // Disable update for API request
            } else {
                $this->Appearance->setFormValue($val);
            }
        }

        // Check field name 'Homogenosity' first before field var 'x_Homogenosity'
        $val = $CurrentForm->hasValue("Homogenosity") ? $CurrentForm->getValue("Homogenosity") : $CurrentForm->getValue("x_Homogenosity");
        if (!$this->Homogenosity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Homogenosity->Visible = false; // Disable update for API request
            } else {
                $this->Homogenosity->setFormValue($val);
            }
        }

        // Check field name 'CompleteSample' first before field var 'x_CompleteSample'
        $val = $CurrentForm->hasValue("CompleteSample") ? $CurrentForm->getValue("CompleteSample") : $CurrentForm->getValue("x_CompleteSample");
        if (!$this->CompleteSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CompleteSample->Visible = false; // Disable update for API request
            } else {
                $this->CompleteSample->setFormValue($val);
            }
        }

        // Check field name 'Liquefactiontime' first before field var 'x_Liquefactiontime'
        $val = $CurrentForm->hasValue("Liquefactiontime") ? $CurrentForm->getValue("Liquefactiontime") : $CurrentForm->getValue("x_Liquefactiontime");
        if (!$this->Liquefactiontime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Liquefactiontime->Visible = false; // Disable update for API request
            } else {
                $this->Liquefactiontime->setFormValue($val);
            }
        }

        // Check field name 'Normal' first before field var 'x_Normal'
        $val = $CurrentForm->hasValue("Normal") ? $CurrentForm->getValue("Normal") : $CurrentForm->getValue("x_Normal");
        if (!$this->Normal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Normal->Visible = false; // Disable update for API request
            } else {
                $this->Normal->setFormValue($val);
            }
        }

        // Check field name 'Abnormal' first before field var 'x_Abnormal'
        $val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
        if (!$this->Abnormal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormal->Visible = false; // Disable update for API request
            } else {
                $this->Abnormal->setFormValue($val);
            }
        }

        // Check field name 'Headdefects' first before field var 'x_Headdefects'
        $val = $CurrentForm->hasValue("Headdefects") ? $CurrentForm->getValue("Headdefects") : $CurrentForm->getValue("x_Headdefects");
        if (!$this->Headdefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Headdefects->Visible = false; // Disable update for API request
            } else {
                $this->Headdefects->setFormValue($val);
            }
        }

        // Check field name 'MidpieceDefects' first before field var 'x_MidpieceDefects'
        $val = $CurrentForm->hasValue("MidpieceDefects") ? $CurrentForm->getValue("MidpieceDefects") : $CurrentForm->getValue("x_MidpieceDefects");
        if (!$this->MidpieceDefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MidpieceDefects->Visible = false; // Disable update for API request
            } else {
                $this->MidpieceDefects->setFormValue($val);
            }
        }

        // Check field name 'TailDefects' first before field var 'x_TailDefects'
        $val = $CurrentForm->hasValue("TailDefects") ? $CurrentForm->getValue("TailDefects") : $CurrentForm->getValue("x_TailDefects");
        if (!$this->TailDefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TailDefects->Visible = false; // Disable update for API request
            } else {
                $this->TailDefects->setFormValue($val);
            }
        }

        // Check field name 'NormalProgMotile' first before field var 'x_NormalProgMotile'
        $val = $CurrentForm->hasValue("NormalProgMotile") ? $CurrentForm->getValue("NormalProgMotile") : $CurrentForm->getValue("x_NormalProgMotile");
        if (!$this->NormalProgMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NormalProgMotile->Visible = false; // Disable update for API request
            } else {
                $this->NormalProgMotile->setFormValue($val);
            }
        }

        // Check field name 'ImmatureForms' first before field var 'x_ImmatureForms'
        $val = $CurrentForm->hasValue("ImmatureForms") ? $CurrentForm->getValue("ImmatureForms") : $CurrentForm->getValue("x_ImmatureForms");
        if (!$this->ImmatureForms->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ImmatureForms->Visible = false; // Disable update for API request
            } else {
                $this->ImmatureForms->setFormValue($val);
            }
        }

        // Check field name 'Leucocytes' first before field var 'x_Leucocytes'
        $val = $CurrentForm->hasValue("Leucocytes") ? $CurrentForm->getValue("Leucocytes") : $CurrentForm->getValue("x_Leucocytes");
        if (!$this->Leucocytes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Leucocytes->Visible = false; // Disable update for API request
            } else {
                $this->Leucocytes->setFormValue($val);
            }
        }

        // Check field name 'Agglutination' first before field var 'x_Agglutination'
        $val = $CurrentForm->hasValue("Agglutination") ? $CurrentForm->getValue("Agglutination") : $CurrentForm->getValue("x_Agglutination");
        if (!$this->Agglutination->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Agglutination->Visible = false; // Disable update for API request
            } else {
                $this->Agglutination->setFormValue($val);
            }
        }

        // Check field name 'Debris' first before field var 'x_Debris'
        $val = $CurrentForm->hasValue("Debris") ? $CurrentForm->getValue("Debris") : $CurrentForm->getValue("x_Debris");
        if (!$this->Debris->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Debris->Visible = false; // Disable update for API request
            } else {
                $this->Debris->setFormValue($val);
            }
        }

        // Check field name 'Diagnosis' first before field var 'x_Diagnosis'
        $val = $CurrentForm->hasValue("Diagnosis") ? $CurrentForm->getValue("Diagnosis") : $CurrentForm->getValue("x_Diagnosis");
        if (!$this->Diagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Diagnosis->Visible = false; // Disable update for API request
            } else {
                $this->Diagnosis->setFormValue($val);
            }
        }

        // Check field name 'Observations' first before field var 'x_Observations'
        $val = $CurrentForm->hasValue("Observations") ? $CurrentForm->getValue("Observations") : $CurrentForm->getValue("x_Observations");
        if (!$this->Observations->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Observations->Visible = false; // Disable update for API request
            } else {
                $this->Observations->setFormValue($val);
            }
        }

        // Check field name 'Signature' first before field var 'x_Signature'
        $val = $CurrentForm->hasValue("Signature") ? $CurrentForm->getValue("Signature") : $CurrentForm->getValue("x_Signature");
        if (!$this->Signature->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Signature->Visible = false; // Disable update for API request
            } else {
                $this->Signature->setFormValue($val);
            }
        }

        // Check field name 'SemenOrgin' first before field var 'x_SemenOrgin'
        $val = $CurrentForm->hasValue("SemenOrgin") ? $CurrentForm->getValue("SemenOrgin") : $CurrentForm->getValue("x_SemenOrgin");
        if (!$this->SemenOrgin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SemenOrgin->Visible = false; // Disable update for API request
            } else {
                $this->SemenOrgin->setFormValue($val);
            }
        }

        // Check field name 'Donor' first before field var 'x_Donor'
        $val = $CurrentForm->hasValue("Donor") ? $CurrentForm->getValue("Donor") : $CurrentForm->getValue("x_Donor");
        if (!$this->Donor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Donor->Visible = false; // Disable update for API request
            } else {
                $this->Donor->setFormValue($val);
            }
        }

        // Check field name 'DonorBloodgroup' first before field var 'x_DonorBloodgroup'
        $val = $CurrentForm->hasValue("DonorBloodgroup") ? $CurrentForm->getValue("DonorBloodgroup") : $CurrentForm->getValue("x_DonorBloodgroup");
        if (!$this->DonorBloodgroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DonorBloodgroup->Visible = false; // Disable update for API request
            } else {
                $this->DonorBloodgroup->setFormValue($val);
            }
        }

        // Check field name 'Tank' first before field var 'x_Tank'
        $val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
        if (!$this->Tank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tank->Visible = false; // Disable update for API request
            } else {
                $this->Tank->setFormValue($val);
            }
        }

        // Check field name 'Location' first before field var 'x_Location'
        $val = $CurrentForm->hasValue("Location") ? $CurrentForm->getValue("Location") : $CurrentForm->getValue("x_Location");
        if (!$this->Location->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Location->Visible = false; // Disable update for API request
            } else {
                $this->Location->setFormValue($val);
            }
        }

        // Check field name 'Volume1' first before field var 'x_Volume1'
        $val = $CurrentForm->hasValue("Volume1") ? $CurrentForm->getValue("Volume1") : $CurrentForm->getValue("x_Volume1");
        if (!$this->Volume1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume1->Visible = false; // Disable update for API request
            } else {
                $this->Volume1->setFormValue($val);
            }
        }

        // Check field name 'Concentration1' first before field var 'x_Concentration1'
        $val = $CurrentForm->hasValue("Concentration1") ? $CurrentForm->getValue("Concentration1") : $CurrentForm->getValue("x_Concentration1");
        if (!$this->Concentration1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration1->Visible = false; // Disable update for API request
            } else {
                $this->Concentration1->setFormValue($val);
            }
        }

        // Check field name 'Total1' first before field var 'x_Total1'
        $val = $CurrentForm->hasValue("Total1") ? $CurrentForm->getValue("Total1") : $CurrentForm->getValue("x_Total1");
        if (!$this->Total1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total1->Visible = false; // Disable update for API request
            } else {
                $this->Total1->setFormValue($val);
            }
        }

        // Check field name 'ProgressiveMotility1' first before field var 'x_ProgressiveMotility1'
        $val = $CurrentForm->hasValue("ProgressiveMotility1") ? $CurrentForm->getValue("ProgressiveMotility1") : $CurrentForm->getValue("x_ProgressiveMotility1");
        if (!$this->ProgressiveMotility1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility1->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility1->setFormValue($val);
            }
        }

        // Check field name 'NonProgrssiveMotile1' first before field var 'x_NonProgrssiveMotile1'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile1") ? $CurrentForm->getValue("NonProgrssiveMotile1") : $CurrentForm->getValue("x_NonProgrssiveMotile1");
        if (!$this->NonProgrssiveMotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile1->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile1->setFormValue($val);
            }
        }

        // Check field name 'Immotile1' first before field var 'x_Immotile1'
        $val = $CurrentForm->hasValue("Immotile1") ? $CurrentForm->getValue("Immotile1") : $CurrentForm->getValue("x_Immotile1");
        if (!$this->Immotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile1->Visible = false; // Disable update for API request
            } else {
                $this->Immotile1->setFormValue($val);
            }
        }

        // Check field name 'TotalProgrssiveMotile1' first before field var 'x_TotalProgrssiveMotile1'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile1") ? $CurrentForm->getValue("TotalProgrssiveMotile1") : $CurrentForm->getValue("x_TotalProgrssiveMotile1");
        if (!$this->TotalProgrssiveMotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile1->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile1->setFormValue($val);
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

        // Check field name 'Color' first before field var 'x_Color'
        $val = $CurrentForm->hasValue("Color") ? $CurrentForm->getValue("Color") : $CurrentForm->getValue("x_Color");
        if (!$this->Color->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Color->Visible = false; // Disable update for API request
            } else {
                $this->Color->setFormValue($val);
            }
        }

        // Check field name 'DoneBy' first before field var 'x_DoneBy'
        $val = $CurrentForm->hasValue("DoneBy") ? $CurrentForm->getValue("DoneBy") : $CurrentForm->getValue("x_DoneBy");
        if (!$this->DoneBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoneBy->Visible = false; // Disable update for API request
            } else {
                $this->DoneBy->setFormValue($val);
            }
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
            }
        }

        // Check field name 'Abstinence' first before field var 'x_Abstinence'
        $val = $CurrentForm->hasValue("Abstinence") ? $CurrentForm->getValue("Abstinence") : $CurrentForm->getValue("x_Abstinence");
        if (!$this->Abstinence->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abstinence->Visible = false; // Disable update for API request
            } else {
                $this->Abstinence->setFormValue($val);
            }
        }

        // Check field name 'ProcessedBy' first before field var 'x_ProcessedBy'
        $val = $CurrentForm->hasValue("ProcessedBy") ? $CurrentForm->getValue("ProcessedBy") : $CurrentForm->getValue("x_ProcessedBy");
        if (!$this->ProcessedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcessedBy->Visible = false; // Disable update for API request
            } else {
                $this->ProcessedBy->setFormValue($val);
            }
        }

        // Check field name 'InseminationTime' first before field var 'x_InseminationTime'
        $val = $CurrentForm->hasValue("InseminationTime") ? $CurrentForm->getValue("InseminationTime") : $CurrentForm->getValue("x_InseminationTime");
        if (!$this->InseminationTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminationTime->Visible = false; // Disable update for API request
            } else {
                $this->InseminationTime->setFormValue($val);
            }
        }

        // Check field name 'InseminationBy' first before field var 'x_InseminationBy'
        $val = $CurrentForm->hasValue("InseminationBy") ? $CurrentForm->getValue("InseminationBy") : $CurrentForm->getValue("x_InseminationBy");
        if (!$this->InseminationBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminationBy->Visible = false; // Disable update for API request
            } else {
                $this->InseminationBy->setFormValue($val);
            }
        }

        // Check field name 'Big' first before field var 'x_Big'
        $val = $CurrentForm->hasValue("Big") ? $CurrentForm->getValue("Big") : $CurrentForm->getValue("x_Big");
        if (!$this->Big->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Big->Visible = false; // Disable update for API request
            } else {
                $this->Big->setFormValue($val);
            }
        }

        // Check field name 'Medium' first before field var 'x_Medium'
        $val = $CurrentForm->hasValue("Medium") ? $CurrentForm->getValue("Medium") : $CurrentForm->getValue("x_Medium");
        if (!$this->Medium->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medium->Visible = false; // Disable update for API request
            } else {
                $this->Medium->setFormValue($val);
            }
        }

        // Check field name 'Small' first before field var 'x_Small'
        $val = $CurrentForm->hasValue("Small") ? $CurrentForm->getValue("Small") : $CurrentForm->getValue("x_Small");
        if (!$this->Small->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Small->Visible = false; // Disable update for API request
            } else {
                $this->Small->setFormValue($val);
            }
        }

        // Check field name 'NoHalo' first before field var 'x_NoHalo'
        $val = $CurrentForm->hasValue("NoHalo") ? $CurrentForm->getValue("NoHalo") : $CurrentForm->getValue("x_NoHalo");
        if (!$this->NoHalo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoHalo->Visible = false; // Disable update for API request
            } else {
                $this->NoHalo->setFormValue($val);
            }
        }

        // Check field name 'Fragmented' first before field var 'x_Fragmented'
        $val = $CurrentForm->hasValue("Fragmented") ? $CurrentForm->getValue("Fragmented") : $CurrentForm->getValue("x_Fragmented");
        if (!$this->Fragmented->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fragmented->Visible = false; // Disable update for API request
            } else {
                $this->Fragmented->setFormValue($val);
            }
        }

        // Check field name 'NonFragmented' first before field var 'x_NonFragmented'
        $val = $CurrentForm->hasValue("NonFragmented") ? $CurrentForm->getValue("NonFragmented") : $CurrentForm->getValue("x_NonFragmented");
        if (!$this->NonFragmented->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonFragmented->Visible = false; // Disable update for API request
            } else {
                $this->NonFragmented->setFormValue($val);
            }
        }

        // Check field name 'DFI' first before field var 'x_DFI'
        $val = $CurrentForm->hasValue("DFI") ? $CurrentForm->getValue("DFI") : $CurrentForm->getValue("x_DFI");
        if (!$this->DFI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DFI->Visible = false; // Disable update for API request
            } else {
                $this->DFI->setFormValue($val);
            }
        }

        // Check field name 'IsueBy' first before field var 'x_IsueBy'
        $val = $CurrentForm->hasValue("IsueBy") ? $CurrentForm->getValue("IsueBy") : $CurrentForm->getValue("x_IsueBy");
        if (!$this->IsueBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsueBy->Visible = false; // Disable update for API request
            } else {
                $this->IsueBy->setFormValue($val);
            }
        }

        // Check field name 'Volume2' first before field var 'x_Volume2'
        $val = $CurrentForm->hasValue("Volume2") ? $CurrentForm->getValue("Volume2") : $CurrentForm->getValue("x_Volume2");
        if (!$this->Volume2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume2->Visible = false; // Disable update for API request
            } else {
                $this->Volume2->setFormValue($val);
            }
        }

        // Check field name 'Concentration2' first before field var 'x_Concentration2'
        $val = $CurrentForm->hasValue("Concentration2") ? $CurrentForm->getValue("Concentration2") : $CurrentForm->getValue("x_Concentration2");
        if (!$this->Concentration2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration2->Visible = false; // Disable update for API request
            } else {
                $this->Concentration2->setFormValue($val);
            }
        }

        // Check field name 'Total2' first before field var 'x_Total2'
        $val = $CurrentForm->hasValue("Total2") ? $CurrentForm->getValue("Total2") : $CurrentForm->getValue("x_Total2");
        if (!$this->Total2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total2->Visible = false; // Disable update for API request
            } else {
                $this->Total2->setFormValue($val);
            }
        }

        // Check field name 'ProgressiveMotility2' first before field var 'x_ProgressiveMotility2'
        $val = $CurrentForm->hasValue("ProgressiveMotility2") ? $CurrentForm->getValue("ProgressiveMotility2") : $CurrentForm->getValue("x_ProgressiveMotility2");
        if (!$this->ProgressiveMotility2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility2->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility2->setFormValue($val);
            }
        }

        // Check field name 'NonProgrssiveMotile2' first before field var 'x_NonProgrssiveMotile2'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile2") ? $CurrentForm->getValue("NonProgrssiveMotile2") : $CurrentForm->getValue("x_NonProgrssiveMotile2");
        if (!$this->NonProgrssiveMotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile2->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile2->setFormValue($val);
            }
        }

        // Check field name 'Immotile2' first before field var 'x_Immotile2'
        $val = $CurrentForm->hasValue("Immotile2") ? $CurrentForm->getValue("Immotile2") : $CurrentForm->getValue("x_Immotile2");
        if (!$this->Immotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile2->Visible = false; // Disable update for API request
            } else {
                $this->Immotile2->setFormValue($val);
            }
        }

        // Check field name 'TotalProgrssiveMotile2' first before field var 'x_TotalProgrssiveMotile2'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile2") ? $CurrentForm->getValue("TotalProgrssiveMotile2") : $CurrentForm->getValue("x_TotalProgrssiveMotile2");
        if (!$this->TotalProgrssiveMotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile2->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile2->setFormValue($val);
            }
        }

        // Check field name 'MACS' first before field var 'x_MACS'
        $val = $CurrentForm->hasValue("MACS") ? $CurrentForm->getValue("MACS") : $CurrentForm->getValue("x_MACS");
        if (!$this->MACS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MACS->Visible = false; // Disable update for API request
            } else {
                $this->MACS->setFormValue($val);
            }
        }

        // Check field name 'IssuedBy' first before field var 'x_IssuedBy'
        $val = $CurrentForm->hasValue("IssuedBy") ? $CurrentForm->getValue("IssuedBy") : $CurrentForm->getValue("x_IssuedBy");
        if (!$this->IssuedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IssuedBy->Visible = false; // Disable update for API request
            } else {
                $this->IssuedBy->setFormValue($val);
            }
        }

        // Check field name 'IssuedTo' first before field var 'x_IssuedTo'
        $val = $CurrentForm->hasValue("IssuedTo") ? $CurrentForm->getValue("IssuedTo") : $CurrentForm->getValue("x_IssuedTo");
        if (!$this->IssuedTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IssuedTo->Visible = false; // Disable update for API request
            } else {
                $this->IssuedTo->setFormValue($val);
            }
        }

        // Check field name 'PaID' first before field var 'x_PaID'
        $val = $CurrentForm->hasValue("PaID") ? $CurrentForm->getValue("PaID") : $CurrentForm->getValue("x_PaID");
        if (!$this->PaID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaID->Visible = false; // Disable update for API request
            } else {
                $this->PaID->setFormValue($val);
            }
        }

        // Check field name 'PaName' first before field var 'x_PaName'
        $val = $CurrentForm->hasValue("PaName") ? $CurrentForm->getValue("PaName") : $CurrentForm->getValue("x_PaName");
        if (!$this->PaName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaName->Visible = false; // Disable update for API request
            } else {
                $this->PaName->setFormValue($val);
            }
        }

        // Check field name 'PaMobile' first before field var 'x_PaMobile'
        $val = $CurrentForm->hasValue("PaMobile") ? $CurrentForm->getValue("PaMobile") : $CurrentForm->getValue("x_PaMobile");
        if (!$this->PaMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaMobile->Visible = false; // Disable update for API request
            } else {
                $this->PaMobile->setFormValue($val);
            }
        }

        // Check field name 'PartnerID' first before field var 'x_PartnerID'
        $val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
        if (!$this->PartnerID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerID->Visible = false; // Disable update for API request
            } else {
                $this->PartnerID->setFormValue($val);
            }
        }

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }

        // Check field name 'PartnerMobile' first before field var 'x_PartnerMobile'
        $val = $CurrentForm->hasValue("PartnerMobile") ? $CurrentForm->getValue("PartnerMobile") : $CurrentForm->getValue("x_PartnerMobile");
        if (!$this->PartnerMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerMobile->Visible = false; // Disable update for API request
            } else {
                $this->PartnerMobile->setFormValue($val);
            }
        }

        // Check field name 'PREG_TEST_DATE' first before field var 'x_PREG_TEST_DATE'
        $val = $CurrentForm->hasValue("PREG_TEST_DATE") ? $CurrentForm->getValue("PREG_TEST_DATE") : $CurrentForm->getValue("x_PREG_TEST_DATE");
        if (!$this->PREG_TEST_DATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PREG_TEST_DATE->Visible = false; // Disable update for API request
            } else {
                $this->PREG_TEST_DATE->setFormValue($val);
            }
            $this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
        }

        // Check field name 'SPECIFIC_PROBLEMS' first before field var 'x_SPECIFIC_PROBLEMS'
        $val = $CurrentForm->hasValue("SPECIFIC_PROBLEMS") ? $CurrentForm->getValue("SPECIFIC_PROBLEMS") : $CurrentForm->getValue("x_SPECIFIC_PROBLEMS");
        if (!$this->SPECIFIC_PROBLEMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SPECIFIC_PROBLEMS->Visible = false; // Disable update for API request
            } else {
                $this->SPECIFIC_PROBLEMS->setFormValue($val);
            }
        }

        // Check field name 'IMSC_1' first before field var 'x_IMSC_1'
        $val = $CurrentForm->hasValue("IMSC_1") ? $CurrentForm->getValue("IMSC_1") : $CurrentForm->getValue("x_IMSC_1");
        if (!$this->IMSC_1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IMSC_1->Visible = false; // Disable update for API request
            } else {
                $this->IMSC_1->setFormValue($val);
            }
        }

        // Check field name 'IMSC_2' first before field var 'x_IMSC_2'
        $val = $CurrentForm->hasValue("IMSC_2") ? $CurrentForm->getValue("IMSC_2") : $CurrentForm->getValue("x_IMSC_2");
        if (!$this->IMSC_2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IMSC_2->Visible = false; // Disable update for API request
            } else {
                $this->IMSC_2->setFormValue($val);
            }
        }

        // Check field name 'LIQUIFACTION_STORAGE' first before field var 'x_LIQUIFACTION_STORAGE'
        $val = $CurrentForm->hasValue("LIQUIFACTION_STORAGE") ? $CurrentForm->getValue("LIQUIFACTION_STORAGE") : $CurrentForm->getValue("x_LIQUIFACTION_STORAGE");
        if (!$this->LIQUIFACTION_STORAGE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LIQUIFACTION_STORAGE->Visible = false; // Disable update for API request
            } else {
                $this->LIQUIFACTION_STORAGE->setFormValue($val);
            }
        }

        // Check field name 'IUI_PREP_METHOD' first before field var 'x_IUI_PREP_METHOD'
        $val = $CurrentForm->hasValue("IUI_PREP_METHOD") ? $CurrentForm->getValue("IUI_PREP_METHOD") : $CurrentForm->getValue("x_IUI_PREP_METHOD");
        if (!$this->IUI_PREP_METHOD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUI_PREP_METHOD->Visible = false; // Disable update for API request
            } else {
                $this->IUI_PREP_METHOD->setFormValue($val);
            }
        }

        // Check field name 'TIME_FROM_TRIGGER' first before field var 'x_TIME_FROM_TRIGGER'
        $val = $CurrentForm->hasValue("TIME_FROM_TRIGGER") ? $CurrentForm->getValue("TIME_FROM_TRIGGER") : $CurrentForm->getValue("x_TIME_FROM_TRIGGER");
        if (!$this->TIME_FROM_TRIGGER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TIME_FROM_TRIGGER->Visible = false; // Disable update for API request
            } else {
                $this->TIME_FROM_TRIGGER->setFormValue($val);
            }
        }

        // Check field name 'COLLECTION_TO_PREPARATION' first before field var 'x_COLLECTION_TO_PREPARATION'
        $val = $CurrentForm->hasValue("COLLECTION_TO_PREPARATION") ? $CurrentForm->getValue("COLLECTION_TO_PREPARATION") : $CurrentForm->getValue("x_COLLECTION_TO_PREPARATION");
        if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->COLLECTION_TO_PREPARATION->Visible = false; // Disable update for API request
            } else {
                $this->COLLECTION_TO_PREPARATION->setFormValue($val);
            }
        }

        // Check field name 'TIME_FROM_PREP_TO_INSEM' first before field var 'x_TIME_FROM_PREP_TO_INSEM'
        $val = $CurrentForm->hasValue("TIME_FROM_PREP_TO_INSEM") ? $CurrentForm->getValue("TIME_FROM_PREP_TO_INSEM") : $CurrentForm->getValue("x_TIME_FROM_PREP_TO_INSEM");
        if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TIME_FROM_PREP_TO_INSEM->Visible = false; // Disable update for API request
            } else {
                $this->TIME_FROM_PREP_TO_INSEM->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->HusbandName->CurrentValue = $this->HusbandName->FormValue;
        $this->RequestDr->CurrentValue = $this->RequestDr->FormValue;
        $this->CollectionDate->CurrentValue = $this->CollectionDate->FormValue;
        $this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->RequestSample->CurrentValue = $this->RequestSample->FormValue;
        $this->CollectionType->CurrentValue = $this->CollectionType->FormValue;
        $this->CollectionMethod->CurrentValue = $this->CollectionMethod->FormValue;
        $this->Medicationused->CurrentValue = $this->Medicationused->FormValue;
        $this->DifficultiesinCollection->CurrentValue = $this->DifficultiesinCollection->FormValue;
        $this->pH->CurrentValue = $this->pH->FormValue;
        $this->Timeofcollection->CurrentValue = $this->Timeofcollection->FormValue;
        $this->Timeofexamination->CurrentValue = $this->Timeofexamination->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->Concentration->CurrentValue = $this->Concentration->FormValue;
        $this->Total->CurrentValue = $this->Total->FormValue;
        $this->ProgressiveMotility->CurrentValue = $this->ProgressiveMotility->FormValue;
        $this->NonProgrssiveMotile->CurrentValue = $this->NonProgrssiveMotile->FormValue;
        $this->Immotile->CurrentValue = $this->Immotile->FormValue;
        $this->TotalProgrssiveMotile->CurrentValue = $this->TotalProgrssiveMotile->FormValue;
        $this->Appearance->CurrentValue = $this->Appearance->FormValue;
        $this->Homogenosity->CurrentValue = $this->Homogenosity->FormValue;
        $this->CompleteSample->CurrentValue = $this->CompleteSample->FormValue;
        $this->Liquefactiontime->CurrentValue = $this->Liquefactiontime->FormValue;
        $this->Normal->CurrentValue = $this->Normal->FormValue;
        $this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
        $this->Headdefects->CurrentValue = $this->Headdefects->FormValue;
        $this->MidpieceDefects->CurrentValue = $this->MidpieceDefects->FormValue;
        $this->TailDefects->CurrentValue = $this->TailDefects->FormValue;
        $this->NormalProgMotile->CurrentValue = $this->NormalProgMotile->FormValue;
        $this->ImmatureForms->CurrentValue = $this->ImmatureForms->FormValue;
        $this->Leucocytes->CurrentValue = $this->Leucocytes->FormValue;
        $this->Agglutination->CurrentValue = $this->Agglutination->FormValue;
        $this->Debris->CurrentValue = $this->Debris->FormValue;
        $this->Diagnosis->CurrentValue = $this->Diagnosis->FormValue;
        $this->Observations->CurrentValue = $this->Observations->FormValue;
        $this->Signature->CurrentValue = $this->Signature->FormValue;
        $this->SemenOrgin->CurrentValue = $this->SemenOrgin->FormValue;
        $this->Donor->CurrentValue = $this->Donor->FormValue;
        $this->DonorBloodgroup->CurrentValue = $this->DonorBloodgroup->FormValue;
        $this->Tank->CurrentValue = $this->Tank->FormValue;
        $this->Location->CurrentValue = $this->Location->FormValue;
        $this->Volume1->CurrentValue = $this->Volume1->FormValue;
        $this->Concentration1->CurrentValue = $this->Concentration1->FormValue;
        $this->Total1->CurrentValue = $this->Total1->FormValue;
        $this->ProgressiveMotility1->CurrentValue = $this->ProgressiveMotility1->FormValue;
        $this->NonProgrssiveMotile1->CurrentValue = $this->NonProgrssiveMotile1->FormValue;
        $this->Immotile1->CurrentValue = $this->Immotile1->FormValue;
        $this->TotalProgrssiveMotile1->CurrentValue = $this->TotalProgrssiveMotile1->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Color->CurrentValue = $this->Color->FormValue;
        $this->DoneBy->CurrentValue = $this->DoneBy->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->Abstinence->CurrentValue = $this->Abstinence->FormValue;
        $this->ProcessedBy->CurrentValue = $this->ProcessedBy->FormValue;
        $this->InseminationTime->CurrentValue = $this->InseminationTime->FormValue;
        $this->InseminationBy->CurrentValue = $this->InseminationBy->FormValue;
        $this->Big->CurrentValue = $this->Big->FormValue;
        $this->Medium->CurrentValue = $this->Medium->FormValue;
        $this->Small->CurrentValue = $this->Small->FormValue;
        $this->NoHalo->CurrentValue = $this->NoHalo->FormValue;
        $this->Fragmented->CurrentValue = $this->Fragmented->FormValue;
        $this->NonFragmented->CurrentValue = $this->NonFragmented->FormValue;
        $this->DFI->CurrentValue = $this->DFI->FormValue;
        $this->IsueBy->CurrentValue = $this->IsueBy->FormValue;
        $this->Volume2->CurrentValue = $this->Volume2->FormValue;
        $this->Concentration2->CurrentValue = $this->Concentration2->FormValue;
        $this->Total2->CurrentValue = $this->Total2->FormValue;
        $this->ProgressiveMotility2->CurrentValue = $this->ProgressiveMotility2->FormValue;
        $this->NonProgrssiveMotile2->CurrentValue = $this->NonProgrssiveMotile2->FormValue;
        $this->Immotile2->CurrentValue = $this->Immotile2->FormValue;
        $this->TotalProgrssiveMotile2->CurrentValue = $this->TotalProgrssiveMotile2->FormValue;
        $this->MACS->CurrentValue = $this->MACS->FormValue;
        $this->IssuedBy->CurrentValue = $this->IssuedBy->FormValue;
        $this->IssuedTo->CurrentValue = $this->IssuedTo->FormValue;
        $this->PaID->CurrentValue = $this->PaID->FormValue;
        $this->PaName->CurrentValue = $this->PaName->FormValue;
        $this->PaMobile->CurrentValue = $this->PaMobile->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
        $this->PREG_TEST_DATE->CurrentValue = $this->PREG_TEST_DATE->FormValue;
        $this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
        $this->SPECIFIC_PROBLEMS->CurrentValue = $this->SPECIFIC_PROBLEMS->FormValue;
        $this->IMSC_1->CurrentValue = $this->IMSC_1->FormValue;
        $this->IMSC_2->CurrentValue = $this->IMSC_2->FormValue;
        $this->LIQUIFACTION_STORAGE->CurrentValue = $this->LIQUIFACTION_STORAGE->FormValue;
        $this->IUI_PREP_METHOD->CurrentValue = $this->IUI_PREP_METHOD->FormValue;
        $this->TIME_FROM_TRIGGER->CurrentValue = $this->TIME_FROM_TRIGGER->FormValue;
        $this->COLLECTION_TO_PREPARATION->CurrentValue = $this->COLLECTION_TO_PREPARATION->FormValue;
        $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = $this->TIME_FROM_PREP_TO_INSEM->FormValue;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->HusbandName->setDbValue($row['HusbandName']);
        $this->RequestDr->setDbValue($row['RequestDr']);
        $this->CollectionDate->setDbValue($row['CollectionDate']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->RequestSample->setDbValue($row['RequestSample']);
        $this->CollectionType->setDbValue($row['CollectionType']);
        $this->CollectionMethod->setDbValue($row['CollectionMethod']);
        $this->Medicationused->setDbValue($row['Medicationused']);
        $this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
        $this->pH->setDbValue($row['pH']);
        $this->Timeofcollection->setDbValue($row['Timeofcollection']);
        $this->Timeofexamination->setDbValue($row['Timeofexamination']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Concentration->setDbValue($row['Concentration']);
        $this->Total->setDbValue($row['Total']);
        $this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
        $this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
        $this->Immotile->setDbValue($row['Immotile']);
        $this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
        $this->Appearance->setDbValue($row['Appearance']);
        $this->Homogenosity->setDbValue($row['Homogenosity']);
        $this->CompleteSample->setDbValue($row['CompleteSample']);
        $this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
        $this->Normal->setDbValue($row['Normal']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Headdefects->setDbValue($row['Headdefects']);
        $this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
        $this->TailDefects->setDbValue($row['TailDefects']);
        $this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
        $this->ImmatureForms->setDbValue($row['ImmatureForms']);
        $this->Leucocytes->setDbValue($row['Leucocytes']);
        $this->Agglutination->setDbValue($row['Agglutination']);
        $this->Debris->setDbValue($row['Debris']);
        $this->Diagnosis->setDbValue($row['Diagnosis']);
        $this->Observations->setDbValue($row['Observations']);
        $this->Signature->setDbValue($row['Signature']);
        $this->SemenOrgin->setDbValue($row['SemenOrgin']);
        $this->Donor->setDbValue($row['Donor']);
        $this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Location->setDbValue($row['Location']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Concentration1->setDbValue($row['Concentration1']);
        $this->Total1->setDbValue($row['Total1']);
        $this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
        $this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
        $this->Immotile1->setDbValue($row['Immotile1']);
        $this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Color->setDbValue($row['Color']);
        $this->DoneBy->setDbValue($row['DoneBy']);
        $this->Method->setDbValue($row['Method']);
        $this->Abstinence->setDbValue($row['Abstinence']);
        $this->ProcessedBy->setDbValue($row['ProcessedBy']);
        $this->InseminationTime->setDbValue($row['InseminationTime']);
        $this->InseminationBy->setDbValue($row['InseminationBy']);
        $this->Big->setDbValue($row['Big']);
        $this->Medium->setDbValue($row['Medium']);
        $this->Small->setDbValue($row['Small']);
        $this->NoHalo->setDbValue($row['NoHalo']);
        $this->Fragmented->setDbValue($row['Fragmented']);
        $this->NonFragmented->setDbValue($row['NonFragmented']);
        $this->DFI->setDbValue($row['DFI']);
        $this->IsueBy->setDbValue($row['IsueBy']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total2->setDbValue($row['Total2']);
        $this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
        $this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
        $this->Immotile2->setDbValue($row['Immotile2']);
        $this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
        $this->MACS->setDbValue($row['MACS']);
        $this->IssuedBy->setDbValue($row['IssuedBy']);
        $this->IssuedTo->setDbValue($row['IssuedTo']);
        $this->PaID->setDbValue($row['PaID']);
        $this->PaName->setDbValue($row['PaName']);
        $this->PaMobile->setDbValue($row['PaMobile']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['HusbandName'] = null;
        $row['RequestDr'] = null;
        $row['CollectionDate'] = null;
        $row['ResultDate'] = null;
        $row['RequestSample'] = null;
        $row['CollectionType'] = null;
        $row['CollectionMethod'] = null;
        $row['Medicationused'] = null;
        $row['DifficultiesinCollection'] = null;
        $row['pH'] = null;
        $row['Timeofcollection'] = null;
        $row['Timeofexamination'] = null;
        $row['Volume'] = null;
        $row['Concentration'] = null;
        $row['Total'] = null;
        $row['ProgressiveMotility'] = null;
        $row['NonProgrssiveMotile'] = null;
        $row['Immotile'] = null;
        $row['TotalProgrssiveMotile'] = null;
        $row['Appearance'] = null;
        $row['Homogenosity'] = null;
        $row['CompleteSample'] = null;
        $row['Liquefactiontime'] = null;
        $row['Normal'] = null;
        $row['Abnormal'] = null;
        $row['Headdefects'] = null;
        $row['MidpieceDefects'] = null;
        $row['TailDefects'] = null;
        $row['NormalProgMotile'] = null;
        $row['ImmatureForms'] = null;
        $row['Leucocytes'] = null;
        $row['Agglutination'] = null;
        $row['Debris'] = null;
        $row['Diagnosis'] = null;
        $row['Observations'] = null;
        $row['Signature'] = null;
        $row['SemenOrgin'] = null;
        $row['Donor'] = null;
        $row['DonorBloodgroup'] = null;
        $row['Tank'] = null;
        $row['Location'] = null;
        $row['Volume1'] = null;
        $row['Concentration1'] = null;
        $row['Total1'] = null;
        $row['ProgressiveMotility1'] = null;
        $row['NonProgrssiveMotile1'] = null;
        $row['Immotile1'] = null;
        $row['TotalProgrssiveMotile1'] = null;
        $row['TidNo'] = null;
        $row['Color'] = null;
        $row['DoneBy'] = null;
        $row['Method'] = null;
        $row['Abstinence'] = null;
        $row['ProcessedBy'] = null;
        $row['InseminationTime'] = null;
        $row['InseminationBy'] = null;
        $row['Big'] = null;
        $row['Medium'] = null;
        $row['Small'] = null;
        $row['NoHalo'] = null;
        $row['Fragmented'] = null;
        $row['NonFragmented'] = null;
        $row['DFI'] = null;
        $row['IsueBy'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total2'] = null;
        $row['ProgressiveMotility2'] = null;
        $row['NonProgrssiveMotile2'] = null;
        $row['Immotile2'] = null;
        $row['TotalProgrssiveMotile2'] = null;
        $row['MACS'] = null;
        $row['IssuedBy'] = null;
        $row['IssuedTo'] = null;
        $row['PaID'] = null;
        $row['PaName'] = null;
        $row['PaMobile'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
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

        // RIDNo

        // PatientName

        // HusbandName

        // RequestDr

        // CollectionDate

        // ResultDate

        // RequestSample

        // CollectionType

        // CollectionMethod

        // Medicationused

        // DifficultiesinCollection

        // pH

        // Timeofcollection

        // Timeofexamination

        // Volume

        // Concentration

        // Total

        // ProgressiveMotility

        // NonProgrssiveMotile

        // Immotile

        // TotalProgrssiveMotile

        // Appearance

        // Homogenosity

        // CompleteSample

        // Liquefactiontime

        // Normal

        // Abnormal

        // Headdefects

        // MidpieceDefects

        // TailDefects

        // NormalProgMotile

        // ImmatureForms

        // Leucocytes

        // Agglutination

        // Debris

        // Diagnosis

        // Observations

        // Signature

        // SemenOrgin

        // Donor

        // DonorBloodgroup

        // Tank

        // Location

        // Volume1

        // Concentration1

        // Total1

        // ProgressiveMotility1

        // NonProgrssiveMotile1

        // Immotile1

        // TotalProgrssiveMotile1

        // TidNo

        // Color

        // DoneBy

        // Method

        // Abstinence

        // ProcessedBy

        // InseminationTime

        // InseminationBy

        // Big

        // Medium

        // Small

        // NoHalo

        // Fragmented

        // NonFragmented

        // DFI

        // IsueBy

        // Volume2

        // Concentration2

        // Total2

        // ProgressiveMotility2

        // NonProgrssiveMotile2

        // Immotile2

        // TotalProgrssiveMotile2

        // MACS

        // IssuedBy

        // IssuedTo

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

        // PREG_TEST_DATE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // HusbandName
            $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            if (strval($this->RequestSample->CurrentValue) != "") {
                $this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
            } else {
                $this->RequestSample->ViewValue = null;
            }
            $this->RequestSample->ViewCustomAttributes = "";

            // CollectionType
            if (strval($this->CollectionType->CurrentValue) != "") {
                $this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
            } else {
                $this->CollectionType->ViewValue = null;
            }
            $this->CollectionType->ViewCustomAttributes = "";

            // CollectionMethod
            if (strval($this->CollectionMethod->CurrentValue) != "") {
                $this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
            } else {
                $this->CollectionMethod->ViewValue = null;
            }
            $this->CollectionMethod->ViewCustomAttributes = "";

            // Medicationused
            if (strval($this->Medicationused->CurrentValue) != "") {
                $this->Medicationused->ViewValue = $this->Medicationused->optionCaption($this->Medicationused->CurrentValue);
            } else {
                $this->Medicationused->ViewValue = null;
            }
            $this->Medicationused->ViewCustomAttributes = "";

            // DifficultiesinCollection
            if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
                $this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
            } else {
                $this->DifficultiesinCollection->ViewValue = null;
            }
            $this->DifficultiesinCollection->ViewCustomAttributes = "";

            // pH
            $this->pH->ViewValue = $this->pH->CurrentValue;
            $this->pH->ViewCustomAttributes = "";

            // Timeofcollection
            $this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
            $this->Timeofcollection->ViewCustomAttributes = "";

            // Timeofexamination
            $this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
            $this->Timeofexamination->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Concentration
            $this->Concentration->ViewValue = $this->Concentration->CurrentValue;
            $this->Concentration->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
            $this->ProgressiveMotility->ViewCustomAttributes = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
            $this->NonProgrssiveMotile->ViewCustomAttributes = "";

            // Immotile
            $this->Immotile->ViewValue = $this->Immotile->CurrentValue;
            $this->Immotile->ViewCustomAttributes = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
            $this->TotalProgrssiveMotile->ViewCustomAttributes = "";

            // Appearance
            $this->Appearance->ViewValue = $this->Appearance->CurrentValue;
            $this->Appearance->ViewCustomAttributes = "";

            // Homogenosity
            if (strval($this->Homogenosity->CurrentValue) != "") {
                $this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
            } else {
                $this->Homogenosity->ViewValue = null;
            }
            $this->Homogenosity->ViewCustomAttributes = "";

            // CompleteSample
            if (strval($this->CompleteSample->CurrentValue) != "") {
                $this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
            } else {
                $this->CompleteSample->ViewValue = null;
            }
            $this->CompleteSample->ViewCustomAttributes = "";

            // Liquefactiontime
            $this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
            $this->Liquefactiontime->ViewCustomAttributes = "";

            // Normal
            $this->Normal->ViewValue = $this->Normal->CurrentValue;
            $this->Normal->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Headdefects
            $this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
            $this->Headdefects->ViewCustomAttributes = "";

            // MidpieceDefects
            $this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
            $this->MidpieceDefects->ViewCustomAttributes = "";

            // TailDefects
            $this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
            $this->TailDefects->ViewCustomAttributes = "";

            // NormalProgMotile
            $this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
            $this->NormalProgMotile->ViewCustomAttributes = "";

            // ImmatureForms
            $this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
            $this->ImmatureForms->ViewCustomAttributes = "";

            // Leucocytes
            $this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
            $this->Leucocytes->ViewCustomAttributes = "";

            // Agglutination
            $this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
            $this->Agglutination->ViewCustomAttributes = "";

            // Debris
            $this->Debris->ViewValue = $this->Debris->CurrentValue;
            $this->Debris->ViewCustomAttributes = "";

            // Diagnosis
            $this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
            $this->Diagnosis->ViewCustomAttributes = "";

            // Observations
            $this->Observations->ViewValue = $this->Observations->CurrentValue;
            $this->Observations->ViewCustomAttributes = "";

            // Signature
            $this->Signature->ViewValue = $this->Signature->CurrentValue;
            $this->Signature->ViewCustomAttributes = "";

            // SemenOrgin
            if (strval($this->SemenOrgin->CurrentValue) != "") {
                $this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
            } else {
                $this->SemenOrgin->ViewValue = null;
            }
            $this->SemenOrgin->ViewCustomAttributes = "";

            // Donor
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
                if ($this->Donor->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Donor->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                        $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                    } else {
                        $this->Donor->ViewValue = $this->Donor->CurrentValue;
                    }
                }
            } else {
                $this->Donor->ViewValue = null;
            }
            $this->Donor->ViewCustomAttributes = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
            $this->DonorBloodgroup->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Location
            $this->Location->ViewValue = $this->Location->CurrentValue;
            $this->Location->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Concentration1
            $this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
            $this->Concentration1->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
            $this->ProgressiveMotility1->ViewCustomAttributes = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
            $this->NonProgrssiveMotile1->ViewCustomAttributes = "";

            // Immotile1
            $this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
            $this->Immotile1->ViewCustomAttributes = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
            $this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Color
            $this->Color->ViewValue = $this->Color->CurrentValue;
            $this->Color->ViewCustomAttributes = "";

            // DoneBy
            $this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
            $this->DoneBy->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Abstinence
            $this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
            $this->Abstinence->ViewCustomAttributes = "";

            // ProcessedBy
            $this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
            $this->ProcessedBy->ViewCustomAttributes = "";

            // InseminationTime
            $this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
            $this->InseminationTime->ViewCustomAttributes = "";

            // InseminationBy
            $this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
            $this->InseminationBy->ViewCustomAttributes = "";

            // Big
            $this->Big->ViewValue = $this->Big->CurrentValue;
            $this->Big->ViewCustomAttributes = "";

            // Medium
            $this->Medium->ViewValue = $this->Medium->CurrentValue;
            $this->Medium->ViewCustomAttributes = "";

            // Small
            $this->Small->ViewValue = $this->Small->CurrentValue;
            $this->Small->ViewCustomAttributes = "";

            // NoHalo
            $this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
            $this->NoHalo->ViewCustomAttributes = "";

            // Fragmented
            $this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
            $this->Fragmented->ViewCustomAttributes = "";

            // NonFragmented
            $this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
            $this->NonFragmented->ViewCustomAttributes = "";

            // DFI
            $this->DFI->ViewValue = $this->DFI->CurrentValue;
            $this->DFI->ViewCustomAttributes = "";

            // IsueBy
            $this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
            $this->IsueBy->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
            $this->ProgressiveMotility2->ViewCustomAttributes = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
            $this->NonProgrssiveMotile2->ViewCustomAttributes = "";

            // Immotile2
            $this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
            $this->Immotile2->ViewCustomAttributes = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
            $this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

            // MACS
            if (strval($this->MACS->CurrentValue) != "") {
                $this->MACS->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->MACS->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->MACS->ViewValue->add($this->MACS->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->MACS->ViewValue = null;
            }
            $this->MACS->ViewCustomAttributes = "";

            // IssuedBy
            $this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
            $this->IssuedBy->ViewCustomAttributes = "";

            // IssuedTo
            $this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
            $this->IssuedTo->ViewCustomAttributes = "";

            // PaID
            $this->PaID->ViewValue = $this->PaID->CurrentValue;
            $this->PaID->ViewCustomAttributes = "";

            // PaName
            $this->PaName->ViewValue = $this->PaName->CurrentValue;
            $this->PaName->ViewCustomAttributes = "";

            // PaMobile
            $this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
            $this->PaMobile->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
                $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
            } else {
                $this->SPECIFIC_PROBLEMS->ViewValue = null;
            }
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
                $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
            } else {
                $this->LIQUIFACTION_STORAGE->ViewValue = null;
            }
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
                $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
            } else {
                $this->IUI_PREP_METHOD->ViewValue = null;
            }
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
                $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
            } else {
                $this->TIME_FROM_TRIGGER->ViewValue = null;
            }
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
                $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
            } else {
                $this->COLLECTION_TO_PREPARATION->ViewValue = null;
            }
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";
            $this->HusbandName->TooltipValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";
            $this->CollectionDate->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";
            $this->RequestSample->TooltipValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";
            $this->CollectionType->TooltipValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";
            $this->CollectionMethod->TooltipValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";
            $this->Medicationused->TooltipValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";
            $this->DifficultiesinCollection->TooltipValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";
            $this->pH->TooltipValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";
            $this->Timeofcollection->TooltipValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";
            $this->Timeofexamination->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";
            $this->Concentration->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";
            $this->ProgressiveMotility->TooltipValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";
            $this->NonProgrssiveMotile->TooltipValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";
            $this->Immotile->TooltipValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";
            $this->TotalProgrssiveMotile->TooltipValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";
            $this->Appearance->TooltipValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";
            $this->Homogenosity->TooltipValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";
            $this->CompleteSample->TooltipValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";
            $this->Liquefactiontime->TooltipValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";
            $this->Normal->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";
            $this->Headdefects->TooltipValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";
            $this->MidpieceDefects->TooltipValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";
            $this->TailDefects->TooltipValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";
            $this->NormalProgMotile->TooltipValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";
            $this->ImmatureForms->TooltipValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";
            $this->Leucocytes->TooltipValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";
            $this->Agglutination->TooltipValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";
            $this->Debris->TooltipValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";
            $this->Diagnosis->TooltipValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";
            $this->Observations->TooltipValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";
            $this->Signature->TooltipValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";
            $this->SemenOrgin->TooltipValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";
            $this->Donor->TooltipValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";
            $this->DonorBloodgroup->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";
            $this->Location->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";
            $this->Concentration1->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";
            $this->ProgressiveMotility1->TooltipValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";
            $this->NonProgrssiveMotile1->TooltipValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";
            $this->Immotile1->TooltipValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";
            $this->TotalProgrssiveMotile1->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";
            $this->Color->TooltipValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";
            $this->DoneBy->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";
            $this->Abstinence->TooltipValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";
            $this->ProcessedBy->TooltipValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";
            $this->InseminationTime->TooltipValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";
            $this->InseminationBy->TooltipValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";
            $this->Big->TooltipValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";
            $this->Medium->TooltipValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";
            $this->Small->TooltipValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";
            $this->NoHalo->TooltipValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";
            $this->Fragmented->TooltipValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";
            $this->NonFragmented->TooltipValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";
            $this->DFI->TooltipValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";
            $this->IsueBy->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";
            $this->ProgressiveMotility2->TooltipValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";
            $this->NonProgrssiveMotile2->TooltipValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";
            $this->Immotile2->TooltipValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";
            $this->TotalProgrssiveMotile2->TooltipValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";
            $this->MACS->TooltipValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";
            $this->IssuedBy->TooltipValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";
            $this->IssuedTo->TooltipValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            if ($this->RIDNo->getSessionValue() != "") {
                $this->RIDNo->CurrentValue = GetForeignKeyValue($this->RIDNo->getSessionValue());
                $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
                $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
                $this->RIDNo->ViewCustomAttributes = "";
            } else {
                $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
                $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
            }

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if ($this->PatientName->getSessionValue() != "") {
                $this->PatientName->CurrentValue = GetForeignKeyValue($this->PatientName->getSessionValue());
                $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                $this->PatientName->ViewCustomAttributes = "";
            } else {
                if (!$this->PatientName->Raw) {
                    $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
                }
                $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
                $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());
            }

            // HusbandName
            $this->HusbandName->EditAttrs["class"] = "form-control";
            $this->HusbandName->EditCustomAttributes = "";
            if (!$this->HusbandName->Raw) {
                $this->HusbandName->CurrentValue = HtmlDecode($this->HusbandName->CurrentValue);
            }
            $this->HusbandName->EditValue = HtmlEncode($this->HusbandName->CurrentValue);
            $this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

            // RequestDr
            $this->RequestDr->EditAttrs["class"] = "form-control";
            $this->RequestDr->EditCustomAttributes = "";
            if (!$this->RequestDr->Raw) {
                $this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
            }
            $this->RequestDr->EditValue = HtmlEncode($this->RequestDr->CurrentValue);
            $this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

            // CollectionDate
            $this->CollectionDate->EditAttrs["class"] = "form-control";
            $this->CollectionDate->EditCustomAttributes = "";
            $this->CollectionDate->EditValue = HtmlEncode(FormatDateTime($this->CollectionDate->CurrentValue, 8));
            $this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // RequestSample
            $this->RequestSample->EditAttrs["class"] = "form-control";
            $this->RequestSample->EditCustomAttributes = "";
            $this->RequestSample->EditValue = $this->RequestSample->options(true);
            $this->RequestSample->PlaceHolder = RemoveHtml($this->RequestSample->caption());

            // CollectionType
            $this->CollectionType->EditAttrs["class"] = "form-control";
            $this->CollectionType->EditCustomAttributes = "";
            $this->CollectionType->EditValue = $this->CollectionType->options(true);
            $this->CollectionType->PlaceHolder = RemoveHtml($this->CollectionType->caption());

            // CollectionMethod
            $this->CollectionMethod->EditAttrs["class"] = "form-control";
            $this->CollectionMethod->EditCustomAttributes = "";
            $this->CollectionMethod->EditValue = $this->CollectionMethod->options(true);
            $this->CollectionMethod->PlaceHolder = RemoveHtml($this->CollectionMethod->caption());

            // Medicationused
            $this->Medicationused->EditAttrs["class"] = "form-control";
            $this->Medicationused->EditCustomAttributes = "";
            $this->Medicationused->EditValue = $this->Medicationused->options(true);
            $this->Medicationused->PlaceHolder = RemoveHtml($this->Medicationused->caption());

            // DifficultiesinCollection
            $this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
            $this->DifficultiesinCollection->EditCustomAttributes = "";
            $this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(true);
            $this->DifficultiesinCollection->PlaceHolder = RemoveHtml($this->DifficultiesinCollection->caption());

            // pH
            $this->pH->EditAttrs["class"] = "form-control";
            $this->pH->EditCustomAttributes = "";
            if (!$this->pH->Raw) {
                $this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
            }
            $this->pH->EditValue = HtmlEncode($this->pH->CurrentValue);
            $this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

            // Timeofcollection
            $this->Timeofcollection->EditAttrs["class"] = "form-control";
            $this->Timeofcollection->EditCustomAttributes = "";
            if (!$this->Timeofcollection->Raw) {
                $this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
            }
            $this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->CurrentValue);
            $this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

            // Timeofexamination
            $this->Timeofexamination->EditAttrs["class"] = "form-control";
            $this->Timeofexamination->EditCustomAttributes = "";
            if (!$this->Timeofexamination->Raw) {
                $this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
            }
            $this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->CurrentValue);
            $this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            if (!$this->Volume->Raw) {
                $this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
            }
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

            // Concentration
            $this->Concentration->EditAttrs["class"] = "form-control";
            $this->Concentration->EditCustomAttributes = "";
            if (!$this->Concentration->Raw) {
                $this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
            }
            $this->Concentration->EditValue = HtmlEncode($this->Concentration->CurrentValue);
            $this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

            // Total
            $this->Total->EditAttrs["class"] = "form-control";
            $this->Total->EditCustomAttributes = "";
            if (!$this->Total->Raw) {
                $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
            }
            $this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
            $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

            // ProgressiveMotility
            $this->ProgressiveMotility->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility->Raw) {
                $this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
            }
            $this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->CurrentValue);
            $this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile->Raw) {
                $this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
            }
            $this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->CurrentValue);
            $this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

            // Immotile
            $this->Immotile->EditAttrs["class"] = "form-control";
            $this->Immotile->EditCustomAttributes = "";
            if (!$this->Immotile->Raw) {
                $this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
            }
            $this->Immotile->EditValue = HtmlEncode($this->Immotile->CurrentValue);
            $this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile->Raw) {
                $this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
            }
            $this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->CurrentValue);
            $this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

            // Appearance
            $this->Appearance->EditAttrs["class"] = "form-control";
            $this->Appearance->EditCustomAttributes = "";
            if (!$this->Appearance->Raw) {
                $this->Appearance->CurrentValue = HtmlDecode($this->Appearance->CurrentValue);
            }
            $this->Appearance->EditValue = HtmlEncode($this->Appearance->CurrentValue);
            $this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

            // Homogenosity
            $this->Homogenosity->EditAttrs["class"] = "form-control";
            $this->Homogenosity->EditCustomAttributes = "";
            $this->Homogenosity->EditValue = $this->Homogenosity->options(true);
            $this->Homogenosity->PlaceHolder = RemoveHtml($this->Homogenosity->caption());

            // CompleteSample
            $this->CompleteSample->EditAttrs["class"] = "form-control";
            $this->CompleteSample->EditCustomAttributes = "";
            $this->CompleteSample->EditValue = $this->CompleteSample->options(true);
            $this->CompleteSample->PlaceHolder = RemoveHtml($this->CompleteSample->caption());

            // Liquefactiontime
            $this->Liquefactiontime->EditAttrs["class"] = "form-control";
            $this->Liquefactiontime->EditCustomAttributes = "";
            if (!$this->Liquefactiontime->Raw) {
                $this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
            }
            $this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->CurrentValue);
            $this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

            // Normal
            $this->Normal->EditAttrs["class"] = "form-control";
            $this->Normal->EditCustomAttributes = "";
            if (!$this->Normal->Raw) {
                $this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
            }
            $this->Normal->EditValue = HtmlEncode($this->Normal->CurrentValue);
            $this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // Headdefects
            $this->Headdefects->EditAttrs["class"] = "form-control";
            $this->Headdefects->EditCustomAttributes = "";
            if (!$this->Headdefects->Raw) {
                $this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
            }
            $this->Headdefects->EditValue = HtmlEncode($this->Headdefects->CurrentValue);
            $this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

            // MidpieceDefects
            $this->MidpieceDefects->EditAttrs["class"] = "form-control";
            $this->MidpieceDefects->EditCustomAttributes = "";
            if (!$this->MidpieceDefects->Raw) {
                $this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
            }
            $this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->CurrentValue);
            $this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

            // TailDefects
            $this->TailDefects->EditAttrs["class"] = "form-control";
            $this->TailDefects->EditCustomAttributes = "";
            if (!$this->TailDefects->Raw) {
                $this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
            }
            $this->TailDefects->EditValue = HtmlEncode($this->TailDefects->CurrentValue);
            $this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

            // NormalProgMotile
            $this->NormalProgMotile->EditAttrs["class"] = "form-control";
            $this->NormalProgMotile->EditCustomAttributes = "";
            if (!$this->NormalProgMotile->Raw) {
                $this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
            }
            $this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->CurrentValue);
            $this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

            // ImmatureForms
            $this->ImmatureForms->EditAttrs["class"] = "form-control";
            $this->ImmatureForms->EditCustomAttributes = "";
            if (!$this->ImmatureForms->Raw) {
                $this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
            }
            $this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->CurrentValue);
            $this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

            // Leucocytes
            $this->Leucocytes->EditAttrs["class"] = "form-control";
            $this->Leucocytes->EditCustomAttributes = "";
            if (!$this->Leucocytes->Raw) {
                $this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
            }
            $this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->CurrentValue);
            $this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

            // Agglutination
            $this->Agglutination->EditAttrs["class"] = "form-control";
            $this->Agglutination->EditCustomAttributes = "";
            if (!$this->Agglutination->Raw) {
                $this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
            }
            $this->Agglutination->EditValue = HtmlEncode($this->Agglutination->CurrentValue);
            $this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

            // Debris
            $this->Debris->EditAttrs["class"] = "form-control";
            $this->Debris->EditCustomAttributes = "";
            if (!$this->Debris->Raw) {
                $this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
            }
            $this->Debris->EditValue = HtmlEncode($this->Debris->CurrentValue);
            $this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

            // Diagnosis
            $this->Diagnosis->EditAttrs["class"] = "form-control";
            $this->Diagnosis->EditCustomAttributes = "";
            $this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->CurrentValue);
            $this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

            // Observations
            $this->Observations->EditAttrs["class"] = "form-control";
            $this->Observations->EditCustomAttributes = "";
            $this->Observations->EditValue = HtmlEncode($this->Observations->CurrentValue);
            $this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

            // Signature
            $this->Signature->EditAttrs["class"] = "form-control";
            $this->Signature->EditCustomAttributes = "";
            if (!$this->Signature->Raw) {
                $this->Signature->CurrentValue = HtmlDecode($this->Signature->CurrentValue);
            }
            $this->Signature->EditValue = HtmlEncode($this->Signature->CurrentValue);
            $this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

            // SemenOrgin
            $this->SemenOrgin->EditAttrs["class"] = "form-control";
            $this->SemenOrgin->EditCustomAttributes = "";
            $this->SemenOrgin->EditValue = $this->SemenOrgin->options(true);
            $this->SemenOrgin->PlaceHolder = RemoveHtml($this->SemenOrgin->caption());

            // Donor
            $this->Donor->EditCustomAttributes = "";
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
            } else {
                $this->Donor->ViewValue = $this->Donor->Lookup !== null && is_array($this->Donor->Lookup->Options) ? $curVal : null;
            }
            if ($this->Donor->ViewValue !== null) { // Load from cache
                $this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
                if ($this->Donor->ViewValue == "") {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Donor->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Donor->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                    $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                } else {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Donor->EditValue = $arwrk;
            }
            $this->Donor->PlaceHolder = RemoveHtml($this->Donor->caption());

            // DonorBloodgroup
            $this->DonorBloodgroup->EditAttrs["class"] = "form-control";
            $this->DonorBloodgroup->EditCustomAttributes = "";
            if (!$this->DonorBloodgroup->Raw) {
                $this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
            }
            $this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->CurrentValue);
            $this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Location
            $this->Location->EditAttrs["class"] = "form-control";
            $this->Location->EditCustomAttributes = "";
            if (!$this->Location->Raw) {
                $this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
            }
            $this->Location->EditValue = HtmlEncode($this->Location->CurrentValue);
            $this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

            // Volume1
            $this->Volume1->EditAttrs["class"] = "form-control";
            $this->Volume1->EditCustomAttributes = "";
            if (!$this->Volume1->Raw) {
                $this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
            }
            $this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
            $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

            // Concentration1
            $this->Concentration1->EditAttrs["class"] = "form-control";
            $this->Concentration1->EditCustomAttributes = "";
            if (!$this->Concentration1->Raw) {
                $this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
            }
            $this->Concentration1->EditValue = HtmlEncode($this->Concentration1->CurrentValue);
            $this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

            // Total1
            $this->Total1->EditAttrs["class"] = "form-control";
            $this->Total1->EditCustomAttributes = "";
            if (!$this->Total1->Raw) {
                $this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
            }
            $this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
            $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

            // ProgressiveMotility1
            $this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility1->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility1->Raw) {
                $this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
            }
            $this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->CurrentValue);
            $this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile1->Raw) {
                $this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
            }
            $this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->CurrentValue);
            $this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

            // Immotile1
            $this->Immotile1->EditAttrs["class"] = "form-control";
            $this->Immotile1->EditCustomAttributes = "";
            if (!$this->Immotile1->Raw) {
                $this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
            }
            $this->Immotile1->EditValue = HtmlEncode($this->Immotile1->CurrentValue);
            $this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile1->Raw) {
                $this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
            }
            $this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->CurrentValue);
            $this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

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

            // Color
            $this->Color->EditAttrs["class"] = "form-control";
            $this->Color->EditCustomAttributes = "";
            if (!$this->Color->Raw) {
                $this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
            }
            $this->Color->EditValue = HtmlEncode($this->Color->CurrentValue);
            $this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

            // DoneBy
            $this->DoneBy->EditAttrs["class"] = "form-control";
            $this->DoneBy->EditCustomAttributes = "";
            if (!$this->DoneBy->Raw) {
                $this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
            }
            $this->DoneBy->EditValue = HtmlEncode($this->DoneBy->CurrentValue);
            $this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Abstinence
            $this->Abstinence->EditAttrs["class"] = "form-control";
            $this->Abstinence->EditCustomAttributes = "";
            if (!$this->Abstinence->Raw) {
                $this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
            }
            $this->Abstinence->EditValue = HtmlEncode($this->Abstinence->CurrentValue);
            $this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

            // ProcessedBy
            $this->ProcessedBy->EditAttrs["class"] = "form-control";
            $this->ProcessedBy->EditCustomAttributes = "";
            if (!$this->ProcessedBy->Raw) {
                $this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
            }
            $this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->CurrentValue);
            $this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

            // InseminationTime
            $this->InseminationTime->EditAttrs["class"] = "form-control";
            $this->InseminationTime->EditCustomAttributes = "";
            if (!$this->InseminationTime->Raw) {
                $this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
            }
            $this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->CurrentValue);
            $this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

            // InseminationBy
            $this->InseminationBy->EditAttrs["class"] = "form-control";
            $this->InseminationBy->EditCustomAttributes = "";
            if (!$this->InseminationBy->Raw) {
                $this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
            }
            $this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->CurrentValue);
            $this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

            // Big
            $this->Big->EditAttrs["class"] = "form-control";
            $this->Big->EditCustomAttributes = "";
            if (!$this->Big->Raw) {
                $this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
            }
            $this->Big->EditValue = HtmlEncode($this->Big->CurrentValue);
            $this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

            // Medium
            $this->Medium->EditAttrs["class"] = "form-control";
            $this->Medium->EditCustomAttributes = "";
            if (!$this->Medium->Raw) {
                $this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
            }
            $this->Medium->EditValue = HtmlEncode($this->Medium->CurrentValue);
            $this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

            // Small
            $this->Small->EditAttrs["class"] = "form-control";
            $this->Small->EditCustomAttributes = "";
            if (!$this->Small->Raw) {
                $this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
            }
            $this->Small->EditValue = HtmlEncode($this->Small->CurrentValue);
            $this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

            // NoHalo
            $this->NoHalo->EditAttrs["class"] = "form-control";
            $this->NoHalo->EditCustomAttributes = "";
            if (!$this->NoHalo->Raw) {
                $this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
            }
            $this->NoHalo->EditValue = HtmlEncode($this->NoHalo->CurrentValue);
            $this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

            // Fragmented
            $this->Fragmented->EditAttrs["class"] = "form-control";
            $this->Fragmented->EditCustomAttributes = "";
            if (!$this->Fragmented->Raw) {
                $this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
            }
            $this->Fragmented->EditValue = HtmlEncode($this->Fragmented->CurrentValue);
            $this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

            // NonFragmented
            $this->NonFragmented->EditAttrs["class"] = "form-control";
            $this->NonFragmented->EditCustomAttributes = "";
            if (!$this->NonFragmented->Raw) {
                $this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
            }
            $this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->CurrentValue);
            $this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

            // DFI
            $this->DFI->EditAttrs["class"] = "form-control";
            $this->DFI->EditCustomAttributes = "";
            if (!$this->DFI->Raw) {
                $this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
            }
            $this->DFI->EditValue = HtmlEncode($this->DFI->CurrentValue);
            $this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

            // IsueBy
            $this->IsueBy->EditAttrs["class"] = "form-control";
            $this->IsueBy->EditCustomAttributes = "";
            if (!$this->IsueBy->Raw) {
                $this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
            }
            $this->IsueBy->EditValue = HtmlEncode($this->IsueBy->CurrentValue);
            $this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

            // Volume2
            $this->Volume2->EditAttrs["class"] = "form-control";
            $this->Volume2->EditCustomAttributes = "";
            if (!$this->Volume2->Raw) {
                $this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
            }
            $this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
            $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

            // Concentration2
            $this->Concentration2->EditAttrs["class"] = "form-control";
            $this->Concentration2->EditCustomAttributes = "";
            if (!$this->Concentration2->Raw) {
                $this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
            }
            $this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
            $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

            // Total2
            $this->Total2->EditAttrs["class"] = "form-control";
            $this->Total2->EditCustomAttributes = "";
            if (!$this->Total2->Raw) {
                $this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
            }
            $this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
            $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

            // ProgressiveMotility2
            $this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility2->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility2->Raw) {
                $this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
            }
            $this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->CurrentValue);
            $this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile2->Raw) {
                $this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
            }
            $this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->CurrentValue);
            $this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

            // Immotile2
            $this->Immotile2->EditAttrs["class"] = "form-control";
            $this->Immotile2->EditCustomAttributes = "";
            if (!$this->Immotile2->Raw) {
                $this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
            }
            $this->Immotile2->EditValue = HtmlEncode($this->Immotile2->CurrentValue);
            $this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile2->Raw) {
                $this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
            }
            $this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->CurrentValue);
            $this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

            // MACS
            $this->MACS->EditCustomAttributes = "";
            $this->MACS->EditValue = $this->MACS->options(false);
            $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

            // IssuedBy
            $this->IssuedBy->EditAttrs["class"] = "form-control";
            $this->IssuedBy->EditCustomAttributes = "";
            if (!$this->IssuedBy->Raw) {
                $this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
            }
            $this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->CurrentValue);
            $this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

            // IssuedTo
            $this->IssuedTo->EditAttrs["class"] = "form-control";
            $this->IssuedTo->EditCustomAttributes = "";
            if (!$this->IssuedTo->Raw) {
                $this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
            }
            $this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->CurrentValue);
            $this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

            // PaID
            $this->PaID->EditAttrs["class"] = "form-control";
            $this->PaID->EditCustomAttributes = "";
            if (!$this->PaID->Raw) {
                $this->PaID->CurrentValue = HtmlDecode($this->PaID->CurrentValue);
            }
            $this->PaID->EditValue = HtmlEncode($this->PaID->CurrentValue);
            $this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

            // PaName
            $this->PaName->EditAttrs["class"] = "form-control";
            $this->PaName->EditCustomAttributes = "";
            if (!$this->PaName->Raw) {
                $this->PaName->CurrentValue = HtmlDecode($this->PaName->CurrentValue);
            }
            $this->PaName->EditValue = HtmlEncode($this->PaName->CurrentValue);
            $this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

            // PaMobile
            $this->PaMobile->EditAttrs["class"] = "form-control";
            $this->PaMobile->EditCustomAttributes = "";
            if (!$this->PaMobile->Raw) {
                $this->PaMobile->CurrentValue = HtmlDecode($this->PaMobile->CurrentValue);
            }
            $this->PaMobile->EditValue = HtmlEncode($this->PaMobile->CurrentValue);
            $this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(true);
            $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

            // IMSC_1
            $this->IMSC_1->EditAttrs["class"] = "form-control";
            $this->IMSC_1->EditCustomAttributes = "";
            if (!$this->IMSC_1->Raw) {
                $this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
            }
            $this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->CurrentValue);
            $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

            // IMSC_2
            $this->IMSC_2->EditAttrs["class"] = "form-control";
            $this->IMSC_2->EditCustomAttributes = "";
            if (!$this->IMSC_2->Raw) {
                $this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
            }
            $this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->CurrentValue);
            $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
            $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(true);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            $this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(true);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(true);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(true);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
                $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            }
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
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
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->HusbandName->Required) {
            if (!$this->HusbandName->IsDetailKey && EmptyValue($this->HusbandName->FormValue)) {
                $this->HusbandName->addErrorMessage(str_replace("%s", $this->HusbandName->caption(), $this->HusbandName->RequiredErrorMessage));
            }
        }
        if ($this->RequestDr->Required) {
            if (!$this->RequestDr->IsDetailKey && EmptyValue($this->RequestDr->FormValue)) {
                $this->RequestDr->addErrorMessage(str_replace("%s", $this->RequestDr->caption(), $this->RequestDr->RequiredErrorMessage));
            }
        }
        if ($this->CollectionDate->Required) {
            if (!$this->CollectionDate->IsDetailKey && EmptyValue($this->CollectionDate->FormValue)) {
                $this->CollectionDate->addErrorMessage(str_replace("%s", $this->CollectionDate->caption(), $this->CollectionDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CollectionDate->FormValue)) {
            $this->CollectionDate->addErrorMessage($this->CollectionDate->getErrorMessage(false));
        }
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultDate->FormValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if ($this->RequestSample->Required) {
            if (!$this->RequestSample->IsDetailKey && EmptyValue($this->RequestSample->FormValue)) {
                $this->RequestSample->addErrorMessage(str_replace("%s", $this->RequestSample->caption(), $this->RequestSample->RequiredErrorMessage));
            }
        }
        if ($this->CollectionType->Required) {
            if (!$this->CollectionType->IsDetailKey && EmptyValue($this->CollectionType->FormValue)) {
                $this->CollectionType->addErrorMessage(str_replace("%s", $this->CollectionType->caption(), $this->CollectionType->RequiredErrorMessage));
            }
        }
        if ($this->CollectionMethod->Required) {
            if (!$this->CollectionMethod->IsDetailKey && EmptyValue($this->CollectionMethod->FormValue)) {
                $this->CollectionMethod->addErrorMessage(str_replace("%s", $this->CollectionMethod->caption(), $this->CollectionMethod->RequiredErrorMessage));
            }
        }
        if ($this->Medicationused->Required) {
            if (!$this->Medicationused->IsDetailKey && EmptyValue($this->Medicationused->FormValue)) {
                $this->Medicationused->addErrorMessage(str_replace("%s", $this->Medicationused->caption(), $this->Medicationused->RequiredErrorMessage));
            }
        }
        if ($this->DifficultiesinCollection->Required) {
            if (!$this->DifficultiesinCollection->IsDetailKey && EmptyValue($this->DifficultiesinCollection->FormValue)) {
                $this->DifficultiesinCollection->addErrorMessage(str_replace("%s", $this->DifficultiesinCollection->caption(), $this->DifficultiesinCollection->RequiredErrorMessage));
            }
        }
        if ($this->pH->Required) {
            if (!$this->pH->IsDetailKey && EmptyValue($this->pH->FormValue)) {
                $this->pH->addErrorMessage(str_replace("%s", $this->pH->caption(), $this->pH->RequiredErrorMessage));
            }
        }
        if ($this->Timeofcollection->Required) {
            if (!$this->Timeofcollection->IsDetailKey && EmptyValue($this->Timeofcollection->FormValue)) {
                $this->Timeofcollection->addErrorMessage(str_replace("%s", $this->Timeofcollection->caption(), $this->Timeofcollection->RequiredErrorMessage));
            }
        }
        if ($this->Timeofexamination->Required) {
            if (!$this->Timeofexamination->IsDetailKey && EmptyValue($this->Timeofexamination->FormValue)) {
                $this->Timeofexamination->addErrorMessage(str_replace("%s", $this->Timeofexamination->caption(), $this->Timeofexamination->RequiredErrorMessage));
            }
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if ($this->Concentration->Required) {
            if (!$this->Concentration->IsDetailKey && EmptyValue($this->Concentration->FormValue)) {
                $this->Concentration->addErrorMessage(str_replace("%s", $this->Concentration->caption(), $this->Concentration->RequiredErrorMessage));
            }
        }
        if ($this->Total->Required) {
            if (!$this->Total->IsDetailKey && EmptyValue($this->Total->FormValue)) {
                $this->Total->addErrorMessage(str_replace("%s", $this->Total->caption(), $this->Total->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility->Required) {
            if (!$this->ProgressiveMotility->IsDetailKey && EmptyValue($this->ProgressiveMotility->FormValue)) {
                $this->ProgressiveMotility->addErrorMessage(str_replace("%s", $this->ProgressiveMotility->caption(), $this->ProgressiveMotility->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile->Required) {
            if (!$this->NonProgrssiveMotile->IsDetailKey && EmptyValue($this->NonProgrssiveMotile->FormValue)) {
                $this->NonProgrssiveMotile->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile->caption(), $this->NonProgrssiveMotile->RequiredErrorMessage));
            }
        }
        if ($this->Immotile->Required) {
            if (!$this->Immotile->IsDetailKey && EmptyValue($this->Immotile->FormValue)) {
                $this->Immotile->addErrorMessage(str_replace("%s", $this->Immotile->caption(), $this->Immotile->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile->Required) {
            if (!$this->TotalProgrssiveMotile->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile->FormValue)) {
                $this->TotalProgrssiveMotile->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile->caption(), $this->TotalProgrssiveMotile->RequiredErrorMessage));
            }
        }
        if ($this->Appearance->Required) {
            if (!$this->Appearance->IsDetailKey && EmptyValue($this->Appearance->FormValue)) {
                $this->Appearance->addErrorMessage(str_replace("%s", $this->Appearance->caption(), $this->Appearance->RequiredErrorMessage));
            }
        }
        if ($this->Homogenosity->Required) {
            if (!$this->Homogenosity->IsDetailKey && EmptyValue($this->Homogenosity->FormValue)) {
                $this->Homogenosity->addErrorMessage(str_replace("%s", $this->Homogenosity->caption(), $this->Homogenosity->RequiredErrorMessage));
            }
        }
        if ($this->CompleteSample->Required) {
            if (!$this->CompleteSample->IsDetailKey && EmptyValue($this->CompleteSample->FormValue)) {
                $this->CompleteSample->addErrorMessage(str_replace("%s", $this->CompleteSample->caption(), $this->CompleteSample->RequiredErrorMessage));
            }
        }
        if ($this->Liquefactiontime->Required) {
            if (!$this->Liquefactiontime->IsDetailKey && EmptyValue($this->Liquefactiontime->FormValue)) {
                $this->Liquefactiontime->addErrorMessage(str_replace("%s", $this->Liquefactiontime->caption(), $this->Liquefactiontime->RequiredErrorMessage));
            }
        }
        if ($this->Normal->Required) {
            if (!$this->Normal->IsDetailKey && EmptyValue($this->Normal->FormValue)) {
                $this->Normal->addErrorMessage(str_replace("%s", $this->Normal->caption(), $this->Normal->RequiredErrorMessage));
            }
        }
        if ($this->Abnormal->Required) {
            if (!$this->Abnormal->IsDetailKey && EmptyValue($this->Abnormal->FormValue)) {
                $this->Abnormal->addErrorMessage(str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
            }
        }
        if ($this->Headdefects->Required) {
            if (!$this->Headdefects->IsDetailKey && EmptyValue($this->Headdefects->FormValue)) {
                $this->Headdefects->addErrorMessage(str_replace("%s", $this->Headdefects->caption(), $this->Headdefects->RequiredErrorMessage));
            }
        }
        if ($this->MidpieceDefects->Required) {
            if (!$this->MidpieceDefects->IsDetailKey && EmptyValue($this->MidpieceDefects->FormValue)) {
                $this->MidpieceDefects->addErrorMessage(str_replace("%s", $this->MidpieceDefects->caption(), $this->MidpieceDefects->RequiredErrorMessage));
            }
        }
        if ($this->TailDefects->Required) {
            if (!$this->TailDefects->IsDetailKey && EmptyValue($this->TailDefects->FormValue)) {
                $this->TailDefects->addErrorMessage(str_replace("%s", $this->TailDefects->caption(), $this->TailDefects->RequiredErrorMessage));
            }
        }
        if ($this->NormalProgMotile->Required) {
            if (!$this->NormalProgMotile->IsDetailKey && EmptyValue($this->NormalProgMotile->FormValue)) {
                $this->NormalProgMotile->addErrorMessage(str_replace("%s", $this->NormalProgMotile->caption(), $this->NormalProgMotile->RequiredErrorMessage));
            }
        }
        if ($this->ImmatureForms->Required) {
            if (!$this->ImmatureForms->IsDetailKey && EmptyValue($this->ImmatureForms->FormValue)) {
                $this->ImmatureForms->addErrorMessage(str_replace("%s", $this->ImmatureForms->caption(), $this->ImmatureForms->RequiredErrorMessage));
            }
        }
        if ($this->Leucocytes->Required) {
            if (!$this->Leucocytes->IsDetailKey && EmptyValue($this->Leucocytes->FormValue)) {
                $this->Leucocytes->addErrorMessage(str_replace("%s", $this->Leucocytes->caption(), $this->Leucocytes->RequiredErrorMessage));
            }
        }
        if ($this->Agglutination->Required) {
            if (!$this->Agglutination->IsDetailKey && EmptyValue($this->Agglutination->FormValue)) {
                $this->Agglutination->addErrorMessage(str_replace("%s", $this->Agglutination->caption(), $this->Agglutination->RequiredErrorMessage));
            }
        }
        if ($this->Debris->Required) {
            if (!$this->Debris->IsDetailKey && EmptyValue($this->Debris->FormValue)) {
                $this->Debris->addErrorMessage(str_replace("%s", $this->Debris->caption(), $this->Debris->RequiredErrorMessage));
            }
        }
        if ($this->Diagnosis->Required) {
            if (!$this->Diagnosis->IsDetailKey && EmptyValue($this->Diagnosis->FormValue)) {
                $this->Diagnosis->addErrorMessage(str_replace("%s", $this->Diagnosis->caption(), $this->Diagnosis->RequiredErrorMessage));
            }
        }
        if ($this->Observations->Required) {
            if (!$this->Observations->IsDetailKey && EmptyValue($this->Observations->FormValue)) {
                $this->Observations->addErrorMessage(str_replace("%s", $this->Observations->caption(), $this->Observations->RequiredErrorMessage));
            }
        }
        if ($this->Signature->Required) {
            if (!$this->Signature->IsDetailKey && EmptyValue($this->Signature->FormValue)) {
                $this->Signature->addErrorMessage(str_replace("%s", $this->Signature->caption(), $this->Signature->RequiredErrorMessage));
            }
        }
        if ($this->SemenOrgin->Required) {
            if (!$this->SemenOrgin->IsDetailKey && EmptyValue($this->SemenOrgin->FormValue)) {
                $this->SemenOrgin->addErrorMessage(str_replace("%s", $this->SemenOrgin->caption(), $this->SemenOrgin->RequiredErrorMessage));
            }
        }
        if ($this->Donor->Required) {
            if (!$this->Donor->IsDetailKey && EmptyValue($this->Donor->FormValue)) {
                $this->Donor->addErrorMessage(str_replace("%s", $this->Donor->caption(), $this->Donor->RequiredErrorMessage));
            }
        }
        if ($this->DonorBloodgroup->Required) {
            if (!$this->DonorBloodgroup->IsDetailKey && EmptyValue($this->DonorBloodgroup->FormValue)) {
                $this->DonorBloodgroup->addErrorMessage(str_replace("%s", $this->DonorBloodgroup->caption(), $this->DonorBloodgroup->RequiredErrorMessage));
            }
        }
        if ($this->Tank->Required) {
            if (!$this->Tank->IsDetailKey && EmptyValue($this->Tank->FormValue)) {
                $this->Tank->addErrorMessage(str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
            }
        }
        if ($this->Location->Required) {
            if (!$this->Location->IsDetailKey && EmptyValue($this->Location->FormValue)) {
                $this->Location->addErrorMessage(str_replace("%s", $this->Location->caption(), $this->Location->RequiredErrorMessage));
            }
        }
        if ($this->Volume1->Required) {
            if (!$this->Volume1->IsDetailKey && EmptyValue($this->Volume1->FormValue)) {
                $this->Volume1->addErrorMessage(str_replace("%s", $this->Volume1->caption(), $this->Volume1->RequiredErrorMessage));
            }
        }
        if ($this->Concentration1->Required) {
            if (!$this->Concentration1->IsDetailKey && EmptyValue($this->Concentration1->FormValue)) {
                $this->Concentration1->addErrorMessage(str_replace("%s", $this->Concentration1->caption(), $this->Concentration1->RequiredErrorMessage));
            }
        }
        if ($this->Total1->Required) {
            if (!$this->Total1->IsDetailKey && EmptyValue($this->Total1->FormValue)) {
                $this->Total1->addErrorMessage(str_replace("%s", $this->Total1->caption(), $this->Total1->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility1->Required) {
            if (!$this->ProgressiveMotility1->IsDetailKey && EmptyValue($this->ProgressiveMotility1->FormValue)) {
                $this->ProgressiveMotility1->addErrorMessage(str_replace("%s", $this->ProgressiveMotility1->caption(), $this->ProgressiveMotility1->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile1->Required) {
            if (!$this->NonProgrssiveMotile1->IsDetailKey && EmptyValue($this->NonProgrssiveMotile1->FormValue)) {
                $this->NonProgrssiveMotile1->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile1->caption(), $this->NonProgrssiveMotile1->RequiredErrorMessage));
            }
        }
        if ($this->Immotile1->Required) {
            if (!$this->Immotile1->IsDetailKey && EmptyValue($this->Immotile1->FormValue)) {
                $this->Immotile1->addErrorMessage(str_replace("%s", $this->Immotile1->caption(), $this->Immotile1->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile1->Required) {
            if (!$this->TotalProgrssiveMotile1->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile1->FormValue)) {
                $this->TotalProgrssiveMotile1->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile1->caption(), $this->TotalProgrssiveMotile1->RequiredErrorMessage));
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
        if ($this->Color->Required) {
            if (!$this->Color->IsDetailKey && EmptyValue($this->Color->FormValue)) {
                $this->Color->addErrorMessage(str_replace("%s", $this->Color->caption(), $this->Color->RequiredErrorMessage));
            }
        }
        if ($this->DoneBy->Required) {
            if (!$this->DoneBy->IsDetailKey && EmptyValue($this->DoneBy->FormValue)) {
                $this->DoneBy->addErrorMessage(str_replace("%s", $this->DoneBy->caption(), $this->DoneBy->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
            }
        }
        if ($this->Abstinence->Required) {
            if (!$this->Abstinence->IsDetailKey && EmptyValue($this->Abstinence->FormValue)) {
                $this->Abstinence->addErrorMessage(str_replace("%s", $this->Abstinence->caption(), $this->Abstinence->RequiredErrorMessage));
            }
        }
        if ($this->ProcessedBy->Required) {
            if (!$this->ProcessedBy->IsDetailKey && EmptyValue($this->ProcessedBy->FormValue)) {
                $this->ProcessedBy->addErrorMessage(str_replace("%s", $this->ProcessedBy->caption(), $this->ProcessedBy->RequiredErrorMessage));
            }
        }
        if ($this->InseminationTime->Required) {
            if (!$this->InseminationTime->IsDetailKey && EmptyValue($this->InseminationTime->FormValue)) {
                $this->InseminationTime->addErrorMessage(str_replace("%s", $this->InseminationTime->caption(), $this->InseminationTime->RequiredErrorMessage));
            }
        }
        if ($this->InseminationBy->Required) {
            if (!$this->InseminationBy->IsDetailKey && EmptyValue($this->InseminationBy->FormValue)) {
                $this->InseminationBy->addErrorMessage(str_replace("%s", $this->InseminationBy->caption(), $this->InseminationBy->RequiredErrorMessage));
            }
        }
        if ($this->Big->Required) {
            if (!$this->Big->IsDetailKey && EmptyValue($this->Big->FormValue)) {
                $this->Big->addErrorMessage(str_replace("%s", $this->Big->caption(), $this->Big->RequiredErrorMessage));
            }
        }
        if ($this->Medium->Required) {
            if (!$this->Medium->IsDetailKey && EmptyValue($this->Medium->FormValue)) {
                $this->Medium->addErrorMessage(str_replace("%s", $this->Medium->caption(), $this->Medium->RequiredErrorMessage));
            }
        }
        if ($this->Small->Required) {
            if (!$this->Small->IsDetailKey && EmptyValue($this->Small->FormValue)) {
                $this->Small->addErrorMessage(str_replace("%s", $this->Small->caption(), $this->Small->RequiredErrorMessage));
            }
        }
        if ($this->NoHalo->Required) {
            if (!$this->NoHalo->IsDetailKey && EmptyValue($this->NoHalo->FormValue)) {
                $this->NoHalo->addErrorMessage(str_replace("%s", $this->NoHalo->caption(), $this->NoHalo->RequiredErrorMessage));
            }
        }
        if ($this->Fragmented->Required) {
            if (!$this->Fragmented->IsDetailKey && EmptyValue($this->Fragmented->FormValue)) {
                $this->Fragmented->addErrorMessage(str_replace("%s", $this->Fragmented->caption(), $this->Fragmented->RequiredErrorMessage));
            }
        }
        if ($this->NonFragmented->Required) {
            if (!$this->NonFragmented->IsDetailKey && EmptyValue($this->NonFragmented->FormValue)) {
                $this->NonFragmented->addErrorMessage(str_replace("%s", $this->NonFragmented->caption(), $this->NonFragmented->RequiredErrorMessage));
            }
        }
        if ($this->DFI->Required) {
            if (!$this->DFI->IsDetailKey && EmptyValue($this->DFI->FormValue)) {
                $this->DFI->addErrorMessage(str_replace("%s", $this->DFI->caption(), $this->DFI->RequiredErrorMessage));
            }
        }
        if ($this->IsueBy->Required) {
            if (!$this->IsueBy->IsDetailKey && EmptyValue($this->IsueBy->FormValue)) {
                $this->IsueBy->addErrorMessage(str_replace("%s", $this->IsueBy->caption(), $this->IsueBy->RequiredErrorMessage));
            }
        }
        if ($this->Volume2->Required) {
            if (!$this->Volume2->IsDetailKey && EmptyValue($this->Volume2->FormValue)) {
                $this->Volume2->addErrorMessage(str_replace("%s", $this->Volume2->caption(), $this->Volume2->RequiredErrorMessage));
            }
        }
        if ($this->Concentration2->Required) {
            if (!$this->Concentration2->IsDetailKey && EmptyValue($this->Concentration2->FormValue)) {
                $this->Concentration2->addErrorMessage(str_replace("%s", $this->Concentration2->caption(), $this->Concentration2->RequiredErrorMessage));
            }
        }
        if ($this->Total2->Required) {
            if (!$this->Total2->IsDetailKey && EmptyValue($this->Total2->FormValue)) {
                $this->Total2->addErrorMessage(str_replace("%s", $this->Total2->caption(), $this->Total2->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility2->Required) {
            if (!$this->ProgressiveMotility2->IsDetailKey && EmptyValue($this->ProgressiveMotility2->FormValue)) {
                $this->ProgressiveMotility2->addErrorMessage(str_replace("%s", $this->ProgressiveMotility2->caption(), $this->ProgressiveMotility2->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile2->Required) {
            if (!$this->NonProgrssiveMotile2->IsDetailKey && EmptyValue($this->NonProgrssiveMotile2->FormValue)) {
                $this->NonProgrssiveMotile2->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile2->caption(), $this->NonProgrssiveMotile2->RequiredErrorMessage));
            }
        }
        if ($this->Immotile2->Required) {
            if (!$this->Immotile2->IsDetailKey && EmptyValue($this->Immotile2->FormValue)) {
                $this->Immotile2->addErrorMessage(str_replace("%s", $this->Immotile2->caption(), $this->Immotile2->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile2->Required) {
            if (!$this->TotalProgrssiveMotile2->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile2->FormValue)) {
                $this->TotalProgrssiveMotile2->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile2->caption(), $this->TotalProgrssiveMotile2->RequiredErrorMessage));
            }
        }
        if ($this->MACS->Required) {
            if ($this->MACS->FormValue == "") {
                $this->MACS->addErrorMessage(str_replace("%s", $this->MACS->caption(), $this->MACS->RequiredErrorMessage));
            }
        }
        if ($this->IssuedBy->Required) {
            if (!$this->IssuedBy->IsDetailKey && EmptyValue($this->IssuedBy->FormValue)) {
                $this->IssuedBy->addErrorMessage(str_replace("%s", $this->IssuedBy->caption(), $this->IssuedBy->RequiredErrorMessage));
            }
        }
        if ($this->IssuedTo->Required) {
            if (!$this->IssuedTo->IsDetailKey && EmptyValue($this->IssuedTo->FormValue)) {
                $this->IssuedTo->addErrorMessage(str_replace("%s", $this->IssuedTo->caption(), $this->IssuedTo->RequiredErrorMessage));
            }
        }
        if ($this->PaID->Required) {
            if (!$this->PaID->IsDetailKey && EmptyValue($this->PaID->FormValue)) {
                $this->PaID->addErrorMessage(str_replace("%s", $this->PaID->caption(), $this->PaID->RequiredErrorMessage));
            }
        }
        if ($this->PaName->Required) {
            if (!$this->PaName->IsDetailKey && EmptyValue($this->PaName->FormValue)) {
                $this->PaName->addErrorMessage(str_replace("%s", $this->PaName->caption(), $this->PaName->RequiredErrorMessage));
            }
        }
        if ($this->PaMobile->Required) {
            if (!$this->PaMobile->IsDetailKey && EmptyValue($this->PaMobile->FormValue)) {
                $this->PaMobile->addErrorMessage(str_replace("%s", $this->PaMobile->caption(), $this->PaMobile->RequiredErrorMessage));
            }
        }
        if ($this->PartnerID->Required) {
            if (!$this->PartnerID->IsDetailKey && EmptyValue($this->PartnerID->FormValue)) {
                $this->PartnerID->addErrorMessage(str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PartnerMobile->Required) {
            if (!$this->PartnerMobile->IsDetailKey && EmptyValue($this->PartnerMobile->FormValue)) {
                $this->PartnerMobile->addErrorMessage(str_replace("%s", $this->PartnerMobile->caption(), $this->PartnerMobile->RequiredErrorMessage));
            }
        }
        if ($this->PREG_TEST_DATE->Required) {
            if (!$this->PREG_TEST_DATE->IsDetailKey && EmptyValue($this->PREG_TEST_DATE->FormValue)) {
                $this->PREG_TEST_DATE->addErrorMessage(str_replace("%s", $this->PREG_TEST_DATE->caption(), $this->PREG_TEST_DATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->PREG_TEST_DATE->FormValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if ($this->SPECIFIC_PROBLEMS->Required) {
            if (!$this->SPECIFIC_PROBLEMS->IsDetailKey && EmptyValue($this->SPECIFIC_PROBLEMS->FormValue)) {
                $this->SPECIFIC_PROBLEMS->addErrorMessage(str_replace("%s", $this->SPECIFIC_PROBLEMS->caption(), $this->SPECIFIC_PROBLEMS->RequiredErrorMessage));
            }
        }
        if ($this->IMSC_1->Required) {
            if (!$this->IMSC_1->IsDetailKey && EmptyValue($this->IMSC_1->FormValue)) {
                $this->IMSC_1->addErrorMessage(str_replace("%s", $this->IMSC_1->caption(), $this->IMSC_1->RequiredErrorMessage));
            }
        }
        if ($this->IMSC_2->Required) {
            if (!$this->IMSC_2->IsDetailKey && EmptyValue($this->IMSC_2->FormValue)) {
                $this->IMSC_2->addErrorMessage(str_replace("%s", $this->IMSC_2->caption(), $this->IMSC_2->RequiredErrorMessage));
            }
        }
        if ($this->LIQUIFACTION_STORAGE->Required) {
            if (!$this->LIQUIFACTION_STORAGE->IsDetailKey && EmptyValue($this->LIQUIFACTION_STORAGE->FormValue)) {
                $this->LIQUIFACTION_STORAGE->addErrorMessage(str_replace("%s", $this->LIQUIFACTION_STORAGE->caption(), $this->LIQUIFACTION_STORAGE->RequiredErrorMessage));
            }
        }
        if ($this->IUI_PREP_METHOD->Required) {
            if (!$this->IUI_PREP_METHOD->IsDetailKey && EmptyValue($this->IUI_PREP_METHOD->FormValue)) {
                $this->IUI_PREP_METHOD->addErrorMessage(str_replace("%s", $this->IUI_PREP_METHOD->caption(), $this->IUI_PREP_METHOD->RequiredErrorMessage));
            }
        }
        if ($this->TIME_FROM_TRIGGER->Required) {
            if (!$this->TIME_FROM_TRIGGER->IsDetailKey && EmptyValue($this->TIME_FROM_TRIGGER->FormValue)) {
                $this->TIME_FROM_TRIGGER->addErrorMessage(str_replace("%s", $this->TIME_FROM_TRIGGER->caption(), $this->TIME_FROM_TRIGGER->RequiredErrorMessage));
            }
        }
        if ($this->COLLECTION_TO_PREPARATION->Required) {
            if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey && EmptyValue($this->COLLECTION_TO_PREPARATION->FormValue)) {
                $this->COLLECTION_TO_PREPARATION->addErrorMessage(str_replace("%s", $this->COLLECTION_TO_PREPARATION->caption(), $this->COLLECTION_TO_PREPARATION->RequiredErrorMessage));
            }
        }
        if ($this->TIME_FROM_PREP_TO_INSEM->Required) {
            if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey && EmptyValue($this->TIME_FROM_PREP_TO_INSEM->FormValue)) {
                $this->TIME_FROM_PREP_TO_INSEM->addErrorMessage(str_replace("%s", $this->TIME_FROM_PREP_TO_INSEM->caption(), $this->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage));
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

            // RIDNo
            if ($this->RIDNo->getSessionValue() != "") {
                $this->RIDNo->ReadOnly = true;
            }
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, $this->RIDNo->ReadOnly);

            // PatientName
            if ($this->PatientName->getSessionValue() != "") {
                $this->PatientName->ReadOnly = true;
            }
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // HusbandName
            $this->HusbandName->setDbValueDef($rsnew, $this->HusbandName->CurrentValue, null, $this->HusbandName->ReadOnly);

            // RequestDr
            $this->RequestDr->setDbValueDef($rsnew, $this->RequestDr->CurrentValue, null, $this->RequestDr->ReadOnly);

            // CollectionDate
            $this->CollectionDate->setDbValueDef($rsnew, UnFormatDateTime($this->CollectionDate->CurrentValue, 0), null, $this->CollectionDate->ReadOnly);

            // ResultDate
            $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, $this->ResultDate->ReadOnly);

            // RequestSample
            $this->RequestSample->setDbValueDef($rsnew, $this->RequestSample->CurrentValue, null, $this->RequestSample->ReadOnly);

            // CollectionType
            $this->CollectionType->setDbValueDef($rsnew, $this->CollectionType->CurrentValue, null, $this->CollectionType->ReadOnly);

            // CollectionMethod
            $this->CollectionMethod->setDbValueDef($rsnew, $this->CollectionMethod->CurrentValue, null, $this->CollectionMethod->ReadOnly);

            // Medicationused
            $this->Medicationused->setDbValueDef($rsnew, $this->Medicationused->CurrentValue, null, $this->Medicationused->ReadOnly);

            // DifficultiesinCollection
            $this->DifficultiesinCollection->setDbValueDef($rsnew, $this->DifficultiesinCollection->CurrentValue, null, $this->DifficultiesinCollection->ReadOnly);

            // pH
            $this->pH->setDbValueDef($rsnew, $this->pH->CurrentValue, null, $this->pH->ReadOnly);

            // Timeofcollection
            $this->Timeofcollection->setDbValueDef($rsnew, $this->Timeofcollection->CurrentValue, null, $this->Timeofcollection->ReadOnly);

            // Timeofexamination
            $this->Timeofexamination->setDbValueDef($rsnew, $this->Timeofexamination->CurrentValue, null, $this->Timeofexamination->ReadOnly);

            // Volume
            $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, $this->Volume->ReadOnly);

            // Concentration
            $this->Concentration->setDbValueDef($rsnew, $this->Concentration->CurrentValue, null, $this->Concentration->ReadOnly);

            // Total
            $this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, null, $this->Total->ReadOnly);

            // ProgressiveMotility
            $this->ProgressiveMotility->setDbValueDef($rsnew, $this->ProgressiveMotility->CurrentValue, null, $this->ProgressiveMotility->ReadOnly);

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->setDbValueDef($rsnew, $this->NonProgrssiveMotile->CurrentValue, null, $this->NonProgrssiveMotile->ReadOnly);

            // Immotile
            $this->Immotile->setDbValueDef($rsnew, $this->Immotile->CurrentValue, null, $this->Immotile->ReadOnly);

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->setDbValueDef($rsnew, $this->TotalProgrssiveMotile->CurrentValue, null, $this->TotalProgrssiveMotile->ReadOnly);

            // Appearance
            $this->Appearance->setDbValueDef($rsnew, $this->Appearance->CurrentValue, null, $this->Appearance->ReadOnly);

            // Homogenosity
            $this->Homogenosity->setDbValueDef($rsnew, $this->Homogenosity->CurrentValue, null, $this->Homogenosity->ReadOnly);

            // CompleteSample
            $this->CompleteSample->setDbValueDef($rsnew, $this->CompleteSample->CurrentValue, null, $this->CompleteSample->ReadOnly);

            // Liquefactiontime
            $this->Liquefactiontime->setDbValueDef($rsnew, $this->Liquefactiontime->CurrentValue, null, $this->Liquefactiontime->ReadOnly);

            // Normal
            $this->Normal->setDbValueDef($rsnew, $this->Normal->CurrentValue, null, $this->Normal->ReadOnly);

            // Abnormal
            $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, $this->Abnormal->ReadOnly);

            // Headdefects
            $this->Headdefects->setDbValueDef($rsnew, $this->Headdefects->CurrentValue, null, $this->Headdefects->ReadOnly);

            // MidpieceDefects
            $this->MidpieceDefects->setDbValueDef($rsnew, $this->MidpieceDefects->CurrentValue, null, $this->MidpieceDefects->ReadOnly);

            // TailDefects
            $this->TailDefects->setDbValueDef($rsnew, $this->TailDefects->CurrentValue, null, $this->TailDefects->ReadOnly);

            // NormalProgMotile
            $this->NormalProgMotile->setDbValueDef($rsnew, $this->NormalProgMotile->CurrentValue, null, $this->NormalProgMotile->ReadOnly);

            // ImmatureForms
            $this->ImmatureForms->setDbValueDef($rsnew, $this->ImmatureForms->CurrentValue, null, $this->ImmatureForms->ReadOnly);

            // Leucocytes
            $this->Leucocytes->setDbValueDef($rsnew, $this->Leucocytes->CurrentValue, null, $this->Leucocytes->ReadOnly);

            // Agglutination
            $this->Agglutination->setDbValueDef($rsnew, $this->Agglutination->CurrentValue, null, $this->Agglutination->ReadOnly);

            // Debris
            $this->Debris->setDbValueDef($rsnew, $this->Debris->CurrentValue, null, $this->Debris->ReadOnly);

            // Diagnosis
            $this->Diagnosis->setDbValueDef($rsnew, $this->Diagnosis->CurrentValue, null, $this->Diagnosis->ReadOnly);

            // Observations
            $this->Observations->setDbValueDef($rsnew, $this->Observations->CurrentValue, null, $this->Observations->ReadOnly);

            // Signature
            $this->Signature->setDbValueDef($rsnew, $this->Signature->CurrentValue, null, $this->Signature->ReadOnly);

            // SemenOrgin
            $this->SemenOrgin->setDbValueDef($rsnew, $this->SemenOrgin->CurrentValue, null, $this->SemenOrgin->ReadOnly);

            // Donor
            $this->Donor->setDbValueDef($rsnew, $this->Donor->CurrentValue, null, $this->Donor->ReadOnly);

            // DonorBloodgroup
            $this->DonorBloodgroup->setDbValueDef($rsnew, $this->DonorBloodgroup->CurrentValue, null, $this->DonorBloodgroup->ReadOnly);

            // Tank
            $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, $this->Tank->ReadOnly);

            // Location
            $this->Location->setDbValueDef($rsnew, $this->Location->CurrentValue, null, $this->Location->ReadOnly);

            // Volume1
            $this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, null, $this->Volume1->ReadOnly);

            // Concentration1
            $this->Concentration1->setDbValueDef($rsnew, $this->Concentration1->CurrentValue, null, $this->Concentration1->ReadOnly);

            // Total1
            $this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, null, $this->Total1->ReadOnly);

            // ProgressiveMotility1
            $this->ProgressiveMotility1->setDbValueDef($rsnew, $this->ProgressiveMotility1->CurrentValue, null, $this->ProgressiveMotility1->ReadOnly);

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->setDbValueDef($rsnew, $this->NonProgrssiveMotile1->CurrentValue, null, $this->NonProgrssiveMotile1->ReadOnly);

            // Immotile1
            $this->Immotile1->setDbValueDef($rsnew, $this->Immotile1->CurrentValue, null, $this->Immotile1->ReadOnly);

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->setDbValueDef($rsnew, $this->TotalProgrssiveMotile1->CurrentValue, null, $this->TotalProgrssiveMotile1->ReadOnly);

            // TidNo
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->ReadOnly = true;
            }
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // Color
            $this->Color->setDbValueDef($rsnew, $this->Color->CurrentValue, null, $this->Color->ReadOnly);

            // DoneBy
            $this->DoneBy->setDbValueDef($rsnew, $this->DoneBy->CurrentValue, null, $this->DoneBy->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // Abstinence
            $this->Abstinence->setDbValueDef($rsnew, $this->Abstinence->CurrentValue, null, $this->Abstinence->ReadOnly);

            // ProcessedBy
            $this->ProcessedBy->setDbValueDef($rsnew, $this->ProcessedBy->CurrentValue, null, $this->ProcessedBy->ReadOnly);

            // InseminationTime
            $this->InseminationTime->setDbValueDef($rsnew, $this->InseminationTime->CurrentValue, null, $this->InseminationTime->ReadOnly);

            // InseminationBy
            $this->InseminationBy->setDbValueDef($rsnew, $this->InseminationBy->CurrentValue, null, $this->InseminationBy->ReadOnly);

            // Big
            $this->Big->setDbValueDef($rsnew, $this->Big->CurrentValue, null, $this->Big->ReadOnly);

            // Medium
            $this->Medium->setDbValueDef($rsnew, $this->Medium->CurrentValue, null, $this->Medium->ReadOnly);

            // Small
            $this->Small->setDbValueDef($rsnew, $this->Small->CurrentValue, null, $this->Small->ReadOnly);

            // NoHalo
            $this->NoHalo->setDbValueDef($rsnew, $this->NoHalo->CurrentValue, null, $this->NoHalo->ReadOnly);

            // Fragmented
            $this->Fragmented->setDbValueDef($rsnew, $this->Fragmented->CurrentValue, null, $this->Fragmented->ReadOnly);

            // NonFragmented
            $this->NonFragmented->setDbValueDef($rsnew, $this->NonFragmented->CurrentValue, null, $this->NonFragmented->ReadOnly);

            // DFI
            $this->DFI->setDbValueDef($rsnew, $this->DFI->CurrentValue, null, $this->DFI->ReadOnly);

            // IsueBy
            $this->IsueBy->setDbValueDef($rsnew, $this->IsueBy->CurrentValue, null, $this->IsueBy->ReadOnly);

            // Volume2
            $this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, null, $this->Volume2->ReadOnly);

            // Concentration2
            $this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, null, $this->Concentration2->ReadOnly);

            // Total2
            $this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, null, $this->Total2->ReadOnly);

            // ProgressiveMotility2
            $this->ProgressiveMotility2->setDbValueDef($rsnew, $this->ProgressiveMotility2->CurrentValue, null, $this->ProgressiveMotility2->ReadOnly);

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->setDbValueDef($rsnew, $this->NonProgrssiveMotile2->CurrentValue, null, $this->NonProgrssiveMotile2->ReadOnly);

            // Immotile2
            $this->Immotile2->setDbValueDef($rsnew, $this->Immotile2->CurrentValue, null, $this->Immotile2->ReadOnly);

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->setDbValueDef($rsnew, $this->TotalProgrssiveMotile2->CurrentValue, null, $this->TotalProgrssiveMotile2->ReadOnly);

            // MACS
            $this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, null, $this->MACS->ReadOnly);

            // IssuedBy
            $this->IssuedBy->setDbValueDef($rsnew, $this->IssuedBy->CurrentValue, null, $this->IssuedBy->ReadOnly);

            // IssuedTo
            $this->IssuedTo->setDbValueDef($rsnew, $this->IssuedTo->CurrentValue, null, $this->IssuedTo->ReadOnly);

            // PaID
            $this->PaID->setDbValueDef($rsnew, $this->PaID->CurrentValue, null, $this->PaID->ReadOnly);

            // PaName
            $this->PaName->setDbValueDef($rsnew, $this->PaName->CurrentValue, null, $this->PaName->ReadOnly);

            // PaMobile
            $this->PaMobile->setDbValueDef($rsnew, $this->PaMobile->CurrentValue, null, $this->PaMobile->ReadOnly);

            // PartnerID
            $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, $this->PartnerID->ReadOnly);

            // PartnerName
            $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, $this->PartnerName->ReadOnly);

            // PartnerMobile
            $this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, null, $this->PartnerMobile->ReadOnly);

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->setDbValueDef($rsnew, UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0), null, $this->PREG_TEST_DATE->ReadOnly);

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->setDbValueDef($rsnew, $this->SPECIFIC_PROBLEMS->CurrentValue, null, $this->SPECIFIC_PROBLEMS->ReadOnly);

            // IMSC_1
            $this->IMSC_1->setDbValueDef($rsnew, $this->IMSC_1->CurrentValue, null, $this->IMSC_1->ReadOnly);

            // IMSC_2
            $this->IMSC_2->setDbValueDef($rsnew, $this->IMSC_2->CurrentValue, null, $this->IMSC_2->ReadOnly);

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->setDbValueDef($rsnew, $this->LIQUIFACTION_STORAGE->CurrentValue, null, $this->LIQUIFACTION_STORAGE->ReadOnly);

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->setDbValueDef($rsnew, $this->IUI_PREP_METHOD->CurrentValue, null, $this->IUI_PREP_METHOD->ReadOnly);

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->setDbValueDef($rsnew, $this->TIME_FROM_TRIGGER->CurrentValue, null, $this->TIME_FROM_TRIGGER->ReadOnly);

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->setDbValueDef($rsnew, $this->COLLECTION_TO_PREPARATION->CurrentValue, null, $this->COLLECTION_TO_PREPARATION->ReadOnly);

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->setDbValueDef($rsnew, $this->TIME_FROM_PREP_TO_INSEM->CurrentValue, null, $this->TIME_FROM_PREP_TO_INSEM->ReadOnly);

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
            if ($masterTblVar == "view_ivf_treatment") {
                $validMaster = true;
                $masterTbl = Container("view_ivf_treatment");
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
                if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setQueryStringValue($parm);
                    $this->RIDNo->setQueryStringValue($masterTbl->RIDNO->QueryStringValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
                    if (!is_numeric($masterTbl->RIDNO->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_Name", Get("PatientName"))) !== null) {
                    $masterTbl->Name->setQueryStringValue($parm);
                    $this->PatientName->setQueryStringValue($masterTbl->Name->QueryStringValue);
                    $this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setQueryStringValue($parm);
                    $this->RIDNo->setQueryStringValue($masterTbl->RIDNO->QueryStringValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
                    if (!is_numeric($masterTbl->RIDNO->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_Name", Get("PatientName"))) !== null) {
                    $masterTbl->Name->setQueryStringValue($parm);
                    $this->PatientName->setQueryStringValue($masterTbl->Name->QueryStringValue);
                    $this->PatientName->setSessionValue($this->PatientName->QueryStringValue);
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
            if ($masterTblVar == "view_ivf_treatment") {
                $validMaster = true;
                $masterTbl = Container("view_ivf_treatment");
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
                if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setFormValue($parm);
                    $this->RIDNo->setFormValue($masterTbl->RIDNO->FormValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->FormValue);
                    if (!is_numeric($masterTbl->RIDNO->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_Name", Post("PatientName"))) !== null) {
                    $masterTbl->Name->setFormValue($parm);
                    $this->PatientName->setFormValue($masterTbl->Name->FormValue);
                    $this->PatientName->setSessionValue($this->PatientName->FormValue);
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setFormValue($parm);
                    $this->RIDNo->setFormValue($masterTbl->RIDNO->FormValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->FormValue);
                    if (!is_numeric($masterTbl->RIDNO->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_Name", Post("PatientName"))) !== null) {
                    $masterTbl->Name->setFormValue($parm);
                    $this->PatientName->setFormValue($masterTbl->Name->FormValue);
                    $this->PatientName->setSessionValue($this->PatientName->FormValue);
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
            if ($masterTblVar != "view_ivf_treatment") {
                if ($this->TidNo->CurrentValue == "") {
                    $this->TidNo->setSessionValue("");
                }
                if ($this->RIDNo->CurrentValue == "") {
                    $this->RIDNo->setSessionValue("");
                }
                if ($this->PatientName->CurrentValue == "") {
                    $this->PatientName->setSessionValue("");
                }
            }
            if ($masterTblVar != "ivf_treatment_plan") {
                if ($this->RIDNo->CurrentValue == "") {
                    $this->RIDNo->setSessionValue("");
                }
                if ($this->PatientName->CurrentValue == "") {
                    $this->PatientName->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfSemenanalysisreportList"), "", $this->TableVar, true);
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
                case "x_RequestSample":
                    break;
                case "x_CollectionType":
                    break;
                case "x_CollectionMethod":
                    break;
                case "x_Medicationused":
                    break;
                case "x_DifficultiesinCollection":
                    break;
                case "x_Homogenosity":
                    break;
                case "x_CompleteSample":
                    break;
                case "x_SemenOrgin":
                    break;
                case "x_Donor":
                    break;
                case "x_MACS":
                    break;
                case "x_SPECIFIC_PROBLEMS":
                    break;
                case "x_LIQUIFACTION_STORAGE":
                    break;
                case "x_IUI_PREP_METHOD":
                    break;
                case "x_TIME_FROM_TRIGGER":
                    break;
                case "x_COLLECTION_TO_PREPARATION":
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
