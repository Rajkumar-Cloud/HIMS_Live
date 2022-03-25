<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientFollowUpAdd extends PatientFollowUp
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_follow_up';

    // Page object name
    public $PageObjName = "PatientFollowUpAdd";

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

        // Table object (patient_follow_up)
        if (!isset($GLOBALS["patient_follow_up"]) || get_class($GLOBALS["patient_follow_up"]) == PROJECT_NAMESPACE . "patient_follow_up") {
            $GLOBALS["patient_follow_up"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_follow_up');
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
                $doc = new $class(Container("patient_follow_up"));
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
                    if ($pageName == "PatientFollowUpView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

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
        $this->id->Visible = false;
        $this->PatID->setVisibility();
        $this->PatientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->mrnno->setVisibility();
        $this->BP->setVisibility();
        $this->Pulse->setVisibility();
        $this->Resp->setVisibility();
        $this->SPO2->setVisibility();
        $this->FollowupAdvice->setVisibility();
        $this->NextReviewDate->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->_Template->setVisibility();
        $this->courseinhospital->setVisibility();
        $this->procedurenotes->setVisibility();
        $this->conditionatdischarge->setVisibility();
        $this->Template1->setVisibility();
        $this->Template2->setVisibility();
        $this->Template3->setVisibility();
        $this->HospID->setVisibility();
        $this->Reception->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->DischargeAdviceMedicine->setVisibility();
        $this->DischargeAdviceMedicineTemplate->setVisibility();
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
        $this->setupLookupOptions($this->_Template);
        $this->setupLookupOptions($this->Template1);
        $this->setupLookupOptions($this->Template2);
        $this->setupLookupOptions($this->Template3);
        $this->setupLookupOptions($this->PatientSearch);
        $this->setupLookupOptions($this->DischargeAdviceMedicineTemplate);

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $this->setKey(Post($this->OldKeyName));
            $postBack = true;
        } else {
            // Load key values from QueryString
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $this->CopyRecord = !EmptyValue($this->OldKey);
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Set up master/detail parameters
        // NOTE: must be after loadOldRecord to prevent master key values overwritten
        $this->setupMasterParms();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("PatientFollowUpList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "PatientFollowUpList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PatientFollowUpView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->BP->CurrentValue = null;
        $this->BP->OldValue = $this->BP->CurrentValue;
        $this->Pulse->CurrentValue = null;
        $this->Pulse->OldValue = $this->Pulse->CurrentValue;
        $this->Resp->CurrentValue = null;
        $this->Resp->OldValue = $this->Resp->CurrentValue;
        $this->SPO2->CurrentValue = null;
        $this->SPO2->OldValue = $this->SPO2->CurrentValue;
        $this->FollowupAdvice->CurrentValue = null;
        $this->FollowupAdvice->OldValue = $this->FollowupAdvice->CurrentValue;
        $this->NextReviewDate->CurrentValue = null;
        $this->NextReviewDate->OldValue = $this->NextReviewDate->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->_Template->CurrentValue = null;
        $this->_Template->OldValue = $this->_Template->CurrentValue;
        $this->courseinhospital->CurrentValue = null;
        $this->courseinhospital->OldValue = $this->courseinhospital->CurrentValue;
        $this->procedurenotes->CurrentValue = null;
        $this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
        $this->conditionatdischarge->CurrentValue = null;
        $this->conditionatdischarge->OldValue = $this->conditionatdischarge->CurrentValue;
        $this->Template1->CurrentValue = null;
        $this->Template1->OldValue = $this->Template1->CurrentValue;
        $this->Template2->CurrentValue = null;
        $this->Template2->OldValue = $this->Template2->CurrentValue;
        $this->Template3->CurrentValue = null;
        $this->Template3->OldValue = $this->Template3->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->PatientSearch->CurrentValue = null;
        $this->PatientSearch->OldValue = $this->PatientSearch->CurrentValue;
        $this->DischargeAdviceMedicine->CurrentValue = null;
        $this->DischargeAdviceMedicine->OldValue = $this->DischargeAdviceMedicine->CurrentValue;
        $this->DischargeAdviceMedicineTemplate->CurrentValue = null;
        $this->DischargeAdviceMedicineTemplate->OldValue = $this->DischargeAdviceMedicineTemplate->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
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

        // Check field name 'MobileNumber' first before field var 'x_MobileNumber'
        $val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
        if (!$this->MobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->MobileNumber->setFormValue($val);
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

        // Check field name 'BP' first before field var 'x_BP'
        $val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
        if (!$this->BP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BP->Visible = false; // Disable update for API request
            } else {
                $this->BP->setFormValue($val);
            }
        }

        // Check field name 'Pulse' first before field var 'x_Pulse'
        $val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
        if (!$this->Pulse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pulse->Visible = false; // Disable update for API request
            } else {
                $this->Pulse->setFormValue($val);
            }
        }

        // Check field name 'Resp' first before field var 'x_Resp'
        $val = $CurrentForm->hasValue("Resp") ? $CurrentForm->getValue("Resp") : $CurrentForm->getValue("x_Resp");
        if (!$this->Resp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Resp->Visible = false; // Disable update for API request
            } else {
                $this->Resp->setFormValue($val);
            }
        }

        // Check field name 'SPO2' first before field var 'x_SPO2'
        $val = $CurrentForm->hasValue("SPO2") ? $CurrentForm->getValue("SPO2") : $CurrentForm->getValue("x_SPO2");
        if (!$this->SPO2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SPO2->Visible = false; // Disable update for API request
            } else {
                $this->SPO2->setFormValue($val);
            }
        }

        // Check field name 'FollowupAdvice' first before field var 'x_FollowupAdvice'
        $val = $CurrentForm->hasValue("FollowupAdvice") ? $CurrentForm->getValue("FollowupAdvice") : $CurrentForm->getValue("x_FollowupAdvice");
        if (!$this->FollowupAdvice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowupAdvice->Visible = false; // Disable update for API request
            } else {
                $this->FollowupAdvice->setFormValue($val);
            }
        }

        // Check field name 'NextReviewDate' first before field var 'x_NextReviewDate'
        $val = $CurrentForm->hasValue("NextReviewDate") ? $CurrentForm->getValue("NextReviewDate") : $CurrentForm->getValue("x_NextReviewDate");
        if (!$this->NextReviewDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NextReviewDate->Visible = false; // Disable update for API request
            } else {
                $this->NextReviewDate->setFormValue($val);
            }
            $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
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

        // Check field name 'Template' first before field var 'x__Template'
        $val = $CurrentForm->hasValue("Template") ? $CurrentForm->getValue("Template") : $CurrentForm->getValue("x__Template");
        if (!$this->_Template->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Template->Visible = false; // Disable update for API request
            } else {
                $this->_Template->setFormValue($val);
            }
        }

        // Check field name 'courseinhospital' first before field var 'x_courseinhospital'
        $val = $CurrentForm->hasValue("courseinhospital") ? $CurrentForm->getValue("courseinhospital") : $CurrentForm->getValue("x_courseinhospital");
        if (!$this->courseinhospital->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->courseinhospital->Visible = false; // Disable update for API request
            } else {
                $this->courseinhospital->setFormValue($val);
            }
        }

        // Check field name 'procedurenotes' first before field var 'x_procedurenotes'
        $val = $CurrentForm->hasValue("procedurenotes") ? $CurrentForm->getValue("procedurenotes") : $CurrentForm->getValue("x_procedurenotes");
        if (!$this->procedurenotes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->procedurenotes->Visible = false; // Disable update for API request
            } else {
                $this->procedurenotes->setFormValue($val);
            }
        }

        // Check field name 'conditionatdischarge' first before field var 'x_conditionatdischarge'
        $val = $CurrentForm->hasValue("conditionatdischarge") ? $CurrentForm->getValue("conditionatdischarge") : $CurrentForm->getValue("x_conditionatdischarge");
        if (!$this->conditionatdischarge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->conditionatdischarge->Visible = false; // Disable update for API request
            } else {
                $this->conditionatdischarge->setFormValue($val);
            }
        }

        // Check field name 'Template1' first before field var 'x_Template1'
        $val = $CurrentForm->hasValue("Template1") ? $CurrentForm->getValue("Template1") : $CurrentForm->getValue("x_Template1");
        if (!$this->Template1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Template1->Visible = false; // Disable update for API request
            } else {
                $this->Template1->setFormValue($val);
            }
        }

        // Check field name 'Template2' first before field var 'x_Template2'
        $val = $CurrentForm->hasValue("Template2") ? $CurrentForm->getValue("Template2") : $CurrentForm->getValue("x_Template2");
        if (!$this->Template2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Template2->Visible = false; // Disable update for API request
            } else {
                $this->Template2->setFormValue($val);
            }
        }

        // Check field name 'Template3' first before field var 'x_Template3'
        $val = $CurrentForm->hasValue("Template3") ? $CurrentForm->getValue("Template3") : $CurrentForm->getValue("x_Template3");
        if (!$this->Template3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Template3->Visible = false; // Disable update for API request
            } else {
                $this->Template3->setFormValue($val);
            }
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
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

        // Check field name 'PatientSearch' first before field var 'x_PatientSearch'
        $val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
        if (!$this->PatientSearch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientSearch->Visible = false; // Disable update for API request
            } else {
                $this->PatientSearch->setFormValue($val);
            }
        }

        // Check field name 'DischargeAdviceMedicine' first before field var 'x_DischargeAdviceMedicine'
        $val = $CurrentForm->hasValue("DischargeAdviceMedicine") ? $CurrentForm->getValue("DischargeAdviceMedicine") : $CurrentForm->getValue("x_DischargeAdviceMedicine");
        if (!$this->DischargeAdviceMedicine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DischargeAdviceMedicine->Visible = false; // Disable update for API request
            } else {
                $this->DischargeAdviceMedicine->setFormValue($val);
            }
        }

        // Check field name 'DischargeAdviceMedicineTemplate' first before field var 'x_DischargeAdviceMedicineTemplate'
        $val = $CurrentForm->hasValue("DischargeAdviceMedicineTemplate") ? $CurrentForm->getValue("DischargeAdviceMedicineTemplate") : $CurrentForm->getValue("x_DischargeAdviceMedicineTemplate");
        if (!$this->DischargeAdviceMedicineTemplate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DischargeAdviceMedicineTemplate->Visible = false; // Disable update for API request
            } else {
                $this->DischargeAdviceMedicineTemplate->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->Resp->CurrentValue = $this->Resp->FormValue;
        $this->SPO2->CurrentValue = $this->SPO2->FormValue;
        $this->FollowupAdvice->CurrentValue = $this->FollowupAdvice->FormValue;
        $this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
        $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 7);
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->_Template->CurrentValue = $this->_Template->FormValue;
        $this->courseinhospital->CurrentValue = $this->courseinhospital->FormValue;
        $this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
        $this->conditionatdischarge->CurrentValue = $this->conditionatdischarge->FormValue;
        $this->Template1->CurrentValue = $this->Template1->FormValue;
        $this->Template2->CurrentValue = $this->Template2->FormValue;
        $this->Template3->CurrentValue = $this->Template3->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
        $this->DischargeAdviceMedicine->CurrentValue = $this->DischargeAdviceMedicine->FormValue;
        $this->DischargeAdviceMedicineTemplate->CurrentValue = $this->DischargeAdviceMedicineTemplate->FormValue;
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
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BP->setDbValue($row['BP']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->Resp->setDbValue($row['Resp']);
        $this->SPO2->setDbValue($row['SPO2']);
        $this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->_Template->setDbValue($row['Template']);
        $this->courseinhospital->setDbValue($row['courseinhospital']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
        $this->Template1->setDbValue($row['Template1']);
        $this->Template2->setDbValue($row['Template2']);
        $this->Template3->setDbValue($row['Template3']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->DischargeAdviceMedicine->setDbValue($row['DischargeAdviceMedicine']);
        $this->DischargeAdviceMedicineTemplate->setDbValue($row['DischargeAdviceMedicineTemplate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['BP'] = $this->BP->CurrentValue;
        $row['Pulse'] = $this->Pulse->CurrentValue;
        $row['Resp'] = $this->Resp->CurrentValue;
        $row['SPO2'] = $this->SPO2->CurrentValue;
        $row['FollowupAdvice'] = $this->FollowupAdvice->CurrentValue;
        $row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Template'] = $this->_Template->CurrentValue;
        $row['courseinhospital'] = $this->courseinhospital->CurrentValue;
        $row['procedurenotes'] = $this->procedurenotes->CurrentValue;
        $row['conditionatdischarge'] = $this->conditionatdischarge->CurrentValue;
        $row['Template1'] = $this->Template1->CurrentValue;
        $row['Template2'] = $this->Template2->CurrentValue;
        $row['Template3'] = $this->Template3->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['PatientSearch'] = $this->PatientSearch->CurrentValue;
        $row['DischargeAdviceMedicine'] = $this->DischargeAdviceMedicine->CurrentValue;
        $row['DischargeAdviceMedicineTemplate'] = $this->DischargeAdviceMedicineTemplate->CurrentValue;
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

        // PatID

        // PatientName

        // MobileNumber

        // mrnno

        // BP

        // Pulse

        // Resp

        // SPO2

        // FollowupAdvice

        // NextReviewDate

        // Age

        // Gender

        // profilePic

        // Template

        // courseinhospital

        // procedurenotes

        // conditionatdischarge

        // Template1

        // Template2

        // Template3

        // HospID

        // Reception

        // PatientId

        // PatientSearch

        // DischargeAdviceMedicine

        // DischargeAdviceMedicineTemplate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // Resp
            $this->Resp->ViewValue = $this->Resp->CurrentValue;
            $this->Resp->ViewCustomAttributes = "";

            // SPO2
            $this->SPO2->ViewValue = $this->SPO2->CurrentValue;
            $this->SPO2->ViewCustomAttributes = "";

            // FollowupAdvice
            $this->FollowupAdvice->ViewValue = $this->FollowupAdvice->CurrentValue;
            $this->FollowupAdvice->ViewCustomAttributes = "";

            // NextReviewDate
            $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
            $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
            $this->NextReviewDate->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Template
            $curVal = trim(strval($this->_Template->CurrentValue));
            if ($curVal != "") {
                $this->_Template->ViewValue = $this->_Template->lookupCacheOption($curVal);
                if ($this->_Template->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Follow up Advice'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->_Template->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->_Template->Lookup->renderViewRow($rswrk[0]);
                        $this->_Template->ViewValue = $this->_Template->displayValue($arwrk);
                    } else {
                        $this->_Template->ViewValue = $this->_Template->CurrentValue;
                    }
                }
            } else {
                $this->_Template->ViewValue = null;
            }
            $this->_Template->ViewCustomAttributes = "";

            // courseinhospital
            $this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
            $this->courseinhospital->ViewCustomAttributes = "";

            // procedurenotes
            $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
            $this->procedurenotes->ViewCustomAttributes = "";

            // conditionatdischarge
            $this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
            $this->conditionatdischarge->ViewCustomAttributes = "";

            // Template1
            $curVal = trim(strval($this->Template1->CurrentValue));
            if ($curVal != "") {
                $this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
                if ($this->Template1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Template1->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Template1->Lookup->renderViewRow($rswrk[0]);
                        $this->Template1->ViewValue = $this->Template1->displayValue($arwrk);
                    } else {
                        $this->Template1->ViewValue = $this->Template1->CurrentValue;
                    }
                }
            } else {
                $this->Template1->ViewValue = null;
            }
            $this->Template1->ViewCustomAttributes = "";

            // Template2
            $curVal = trim(strval($this->Template2->CurrentValue));
            if ($curVal != "") {
                $this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
                if ($this->Template2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Procedure Notes'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Template2->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Template2->Lookup->renderViewRow($rswrk[0]);
                        $this->Template2->ViewValue = $this->Template2->displayValue($arwrk);
                    } else {
                        $this->Template2->ViewValue = $this->Template2->CurrentValue;
                    }
                }
            } else {
                $this->Template2->ViewValue = null;
            }
            $this->Template2->ViewCustomAttributes = "";

            // Template3
            $curVal = trim(strval($this->Template3->CurrentValue));
            if ($curVal != "") {
                $this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
                if ($this->Template3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Condition at Discharge'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Template3->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Template3->Lookup->renderViewRow($rswrk[0]);
                        $this->Template3->ViewValue = $this->Template3->displayValue($arwrk);
                    } else {
                        $this->Template3->ViewValue = $this->Template3->CurrentValue;
                    }
                }
            } else {
                $this->Template3->ViewValue = null;
            }
            $this->Template3->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientSearch
            $curVal = trim(strval($this->PatientSearch->CurrentValue));
            if ($curVal != "") {
                $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
                if ($this->PatientSearch->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientSearch->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                    } else {
                        $this->PatientSearch->ViewValue = $this->PatientSearch->CurrentValue;
                    }
                }
            } else {
                $this->PatientSearch->ViewValue = null;
            }
            $this->PatientSearch->ViewCustomAttributes = "";

            // DischargeAdviceMedicine
            $this->DischargeAdviceMedicine->ViewValue = $this->DischargeAdviceMedicine->CurrentValue;
            $this->DischargeAdviceMedicine->ViewCustomAttributes = "";

            // DischargeAdviceMedicineTemplate
            $curVal = trim(strval($this->DischargeAdviceMedicineTemplate->CurrentValue));
            if ($curVal != "") {
                $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->lookupCacheOption($curVal);
                if ($this->DischargeAdviceMedicineTemplate->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='Discharge Advice Medicine'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->DischargeAdviceMedicineTemplate->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DischargeAdviceMedicineTemplate->Lookup->renderViewRow($rswrk[0]);
                        $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->displayValue($arwrk);
                    } else {
                        $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->CurrentValue;
                    }
                }
            } else {
                $this->DischargeAdviceMedicineTemplate->ViewValue = null;
            }
            $this->DischargeAdviceMedicineTemplate->ViewCustomAttributes = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // Resp
            $this->Resp->LinkCustomAttributes = "";
            $this->Resp->HrefValue = "";
            $this->Resp->TooltipValue = "";

            // SPO2
            $this->SPO2->LinkCustomAttributes = "";
            $this->SPO2->HrefValue = "";
            $this->SPO2->TooltipValue = "";

            // FollowupAdvice
            $this->FollowupAdvice->LinkCustomAttributes = "";
            $this->FollowupAdvice->HrefValue = "";
            $this->FollowupAdvice->TooltipValue = "";

            // NextReviewDate
            $this->NextReviewDate->LinkCustomAttributes = "";
            $this->NextReviewDate->HrefValue = "";
            $this->NextReviewDate->TooltipValue = "";

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

            // Template
            $this->_Template->LinkCustomAttributes = "";
            $this->_Template->HrefValue = "";
            $this->_Template->TooltipValue = "";

            // courseinhospital
            $this->courseinhospital->LinkCustomAttributes = "";
            $this->courseinhospital->HrefValue = "";
            $this->courseinhospital->TooltipValue = "";

            // procedurenotes
            $this->procedurenotes->LinkCustomAttributes = "";
            $this->procedurenotes->HrefValue = "";
            $this->procedurenotes->TooltipValue = "";

            // conditionatdischarge
            $this->conditionatdischarge->LinkCustomAttributes = "";
            $this->conditionatdischarge->HrefValue = "";
            $this->conditionatdischarge->TooltipValue = "";

            // Template1
            $this->Template1->LinkCustomAttributes = "";
            $this->Template1->HrefValue = "";
            $this->Template1->TooltipValue = "";

            // Template2
            $this->Template2->LinkCustomAttributes = "";
            $this->Template2->HrefValue = "";
            $this->Template2->TooltipValue = "";

            // Template3
            $this->Template3->LinkCustomAttributes = "";
            $this->Template3->HrefValue = "";
            $this->Template3->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // DischargeAdviceMedicine
            $this->DischargeAdviceMedicine->LinkCustomAttributes = "";
            $this->DischargeAdviceMedicine->HrefValue = "";
            $this->DischargeAdviceMedicine->TooltipValue = "";

            // DischargeAdviceMedicineTemplate
            $this->DischargeAdviceMedicineTemplate->LinkCustomAttributes = "";
            $this->DischargeAdviceMedicineTemplate->HrefValue = "";
            $this->DischargeAdviceMedicineTemplate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if ($this->mrnno->getSessionValue() != "") {
                $this->mrnno->CurrentValue = GetForeignKeyValue($this->mrnno->getSessionValue());
                $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
                $this->mrnno->ViewCustomAttributes = "";
            } else {
                if (!$this->mrnno->Raw) {
                    $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
                }
                $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
                $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());
            }

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // Resp
            $this->Resp->EditAttrs["class"] = "form-control";
            $this->Resp->EditCustomAttributes = "";
            if (!$this->Resp->Raw) {
                $this->Resp->CurrentValue = HtmlDecode($this->Resp->CurrentValue);
            }
            $this->Resp->EditValue = HtmlEncode($this->Resp->CurrentValue);
            $this->Resp->PlaceHolder = RemoveHtml($this->Resp->caption());

            // SPO2
            $this->SPO2->EditAttrs["class"] = "form-control";
            $this->SPO2->EditCustomAttributes = "";
            if (!$this->SPO2->Raw) {
                $this->SPO2->CurrentValue = HtmlDecode($this->SPO2->CurrentValue);
            }
            $this->SPO2->EditValue = HtmlEncode($this->SPO2->CurrentValue);
            $this->SPO2->PlaceHolder = RemoveHtml($this->SPO2->caption());

            // FollowupAdvice
            $this->FollowupAdvice->EditAttrs["class"] = "form-control";
            $this->FollowupAdvice->EditCustomAttributes = "";
            $this->FollowupAdvice->EditValue = HtmlEncode($this->FollowupAdvice->CurrentValue);
            $this->FollowupAdvice->PlaceHolder = RemoveHtml($this->FollowupAdvice->caption());

            // NextReviewDate
            $this->NextReviewDate->EditAttrs["class"] = "form-control";
            $this->NextReviewDate->EditCustomAttributes = "";
            $this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 7));
            $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

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

            // Template
            $this->_Template->EditAttrs["class"] = "form-control";
            $this->_Template->EditCustomAttributes = "";
            $curVal = trim(strval($this->_Template->CurrentValue));
            if ($curVal != "") {
                $this->_Template->ViewValue = $this->_Template->lookupCacheOption($curVal);
            } else {
                $this->_Template->ViewValue = $this->_Template->Lookup !== null && is_array($this->_Template->Lookup->Options) ? $curVal : null;
            }
            if ($this->_Template->ViewValue !== null) { // Load from cache
                $this->_Template->EditValue = array_values($this->_Template->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->_Template->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Follow up Advice'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->_Template->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->_Template->EditValue = $arwrk;
            }
            $this->_Template->PlaceHolder = RemoveHtml($this->_Template->caption());

            // courseinhospital
            $this->courseinhospital->EditAttrs["class"] = "form-control";
            $this->courseinhospital->EditCustomAttributes = "";
            $this->courseinhospital->EditValue = HtmlEncode($this->courseinhospital->CurrentValue);
            $this->courseinhospital->PlaceHolder = RemoveHtml($this->courseinhospital->caption());

            // procedurenotes
            $this->procedurenotes->EditAttrs["class"] = "form-control";
            $this->procedurenotes->EditCustomAttributes = "";
            $this->procedurenotes->EditValue = HtmlEncode($this->procedurenotes->CurrentValue);
            $this->procedurenotes->PlaceHolder = RemoveHtml($this->procedurenotes->caption());

            // conditionatdischarge
            $this->conditionatdischarge->EditAttrs["class"] = "form-control";
            $this->conditionatdischarge->EditCustomAttributes = "";
            $this->conditionatdischarge->EditValue = HtmlEncode($this->conditionatdischarge->CurrentValue);
            $this->conditionatdischarge->PlaceHolder = RemoveHtml($this->conditionatdischarge->caption());

            // Template1
            $this->Template1->EditAttrs["class"] = "form-control";
            $this->Template1->EditCustomAttributes = "";
            $curVal = trim(strval($this->Template1->CurrentValue));
            if ($curVal != "") {
                $this->Template1->ViewValue = $this->Template1->lookupCacheOption($curVal);
            } else {
                $this->Template1->ViewValue = $this->Template1->Lookup !== null && is_array($this->Template1->Lookup->Options) ? $curVal : null;
            }
            if ($this->Template1->ViewValue !== null) { // Load from cache
                $this->Template1->EditValue = array_values($this->Template1->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->Template1->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Course In Hospital'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template1->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Template1->EditValue = $arwrk;
            }
            $this->Template1->PlaceHolder = RemoveHtml($this->Template1->caption());

            // Template2
            $this->Template2->EditAttrs["class"] = "form-control";
            $this->Template2->EditCustomAttributes = "";
            $curVal = trim(strval($this->Template2->CurrentValue));
            if ($curVal != "") {
                $this->Template2->ViewValue = $this->Template2->lookupCacheOption($curVal);
            } else {
                $this->Template2->ViewValue = $this->Template2->Lookup !== null && is_array($this->Template2->Lookup->Options) ? $curVal : null;
            }
            if ($this->Template2->ViewValue !== null) { // Load from cache
                $this->Template2->EditValue = array_values($this->Template2->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->Template2->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Procedure Notes'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template2->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Template2->EditValue = $arwrk;
            }
            $this->Template2->PlaceHolder = RemoveHtml($this->Template2->caption());

            // Template3
            $this->Template3->EditAttrs["class"] = "form-control";
            $this->Template3->EditCustomAttributes = "";
            $curVal = trim(strval($this->Template3->CurrentValue));
            if ($curVal != "") {
                $this->Template3->ViewValue = $this->Template3->lookupCacheOption($curVal);
            } else {
                $this->Template3->ViewValue = $this->Template3->Lookup !== null && is_array($this->Template3->Lookup->Options) ? $curVal : null;
            }
            if ($this->Template3->ViewValue !== null) { // Load from cache
                $this->Template3->EditValue = array_values($this->Template3->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->Template3->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Condition at Discharge'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->Template3->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Template3->EditValue = $arwrk;
            }
            $this->Template3->PlaceHolder = RemoveHtml($this->Template3->caption());

            // HospID

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            if ($this->Reception->getSessionValue() != "") {
                $this->Reception->CurrentValue = GetForeignKeyValue($this->Reception->getSessionValue());
                $this->Reception->ViewValue = $this->Reception->CurrentValue;
                $this->Reception->ViewCustomAttributes = "";
            } else {
                if (!$this->Reception->Raw) {
                    $this->Reception->CurrentValue = HtmlDecode($this->Reception->CurrentValue);
                }
                $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
                $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());
            }

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if ($this->PatientId->getSessionValue() != "") {
                $this->PatientId->CurrentValue = GetForeignKeyValue($this->PatientId->getSessionValue());
                $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
                $this->PatientId->ViewCustomAttributes = "";
            } else {
                if (!$this->PatientId->Raw) {
                    $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
                }
                $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
                $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());
            }

            // PatientSearch
            $this->PatientSearch->EditCustomAttributes = "";
            $curVal = trim(strval($this->PatientSearch->CurrentValue));
            if ($curVal != "") {
                $this->PatientSearch->ViewValue = $this->PatientSearch->lookupCacheOption($curVal);
            } else {
                $this->PatientSearch->ViewValue = $this->PatientSearch->Lookup !== null && is_array($this->PatientSearch->Lookup->Options) ? $curVal : null;
            }
            if ($this->PatientSearch->ViewValue !== null) { // Load from cache
                $this->PatientSearch->EditValue = array_values($this->PatientSearch->Lookup->Options);
                if ($this->PatientSearch->ViewValue == "") {
                    $this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->PatientSearch->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->PatientSearch->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->PatientSearch->Lookup->renderViewRow($rswrk[0]);
                    $this->PatientSearch->ViewValue = $this->PatientSearch->displayValue($arwrk);
                } else {
                    $this->PatientSearch->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                foreach ($arwrk as &$row)
                    $row = $this->PatientSearch->Lookup->renderViewRow($row);
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // DischargeAdviceMedicine
            $this->DischargeAdviceMedicine->EditAttrs["class"] = "form-control";
            $this->DischargeAdviceMedicine->EditCustomAttributes = "";
            $this->DischargeAdviceMedicine->EditValue = HtmlEncode($this->DischargeAdviceMedicine->CurrentValue);
            $this->DischargeAdviceMedicine->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicine->caption());

            // DischargeAdviceMedicineTemplate
            $this->DischargeAdviceMedicineTemplate->EditAttrs["class"] = "form-control";
            $this->DischargeAdviceMedicineTemplate->EditCustomAttributes = "";
            $curVal = trim(strval($this->DischargeAdviceMedicineTemplate->CurrentValue));
            if ($curVal != "") {
                $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->lookupCacheOption($curVal);
            } else {
                $this->DischargeAdviceMedicineTemplate->ViewValue = $this->DischargeAdviceMedicineTemplate->Lookup !== null && is_array($this->DischargeAdviceMedicineTemplate->Lookup->Options) ? $curVal : null;
            }
            if ($this->DischargeAdviceMedicineTemplate->ViewValue !== null) { // Load from cache
                $this->DischargeAdviceMedicineTemplate->EditValue = array_values($this->DischargeAdviceMedicineTemplate->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->DischargeAdviceMedicineTemplate->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='Discharge Advice Medicine'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->DischargeAdviceMedicineTemplate->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->DischargeAdviceMedicineTemplate->EditValue = $arwrk;
            }
            $this->DischargeAdviceMedicineTemplate->PlaceHolder = RemoveHtml($this->DischargeAdviceMedicineTemplate->caption());

            // Add refer script

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // Resp
            $this->Resp->LinkCustomAttributes = "";
            $this->Resp->HrefValue = "";

            // SPO2
            $this->SPO2->LinkCustomAttributes = "";
            $this->SPO2->HrefValue = "";

            // FollowupAdvice
            $this->FollowupAdvice->LinkCustomAttributes = "";
            $this->FollowupAdvice->HrefValue = "";

            // NextReviewDate
            $this->NextReviewDate->LinkCustomAttributes = "";
            $this->NextReviewDate->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Template
            $this->_Template->LinkCustomAttributes = "";
            $this->_Template->HrefValue = "";

            // courseinhospital
            $this->courseinhospital->LinkCustomAttributes = "";
            $this->courseinhospital->HrefValue = "";

            // procedurenotes
            $this->procedurenotes->LinkCustomAttributes = "";
            $this->procedurenotes->HrefValue = "";

            // conditionatdischarge
            $this->conditionatdischarge->LinkCustomAttributes = "";
            $this->conditionatdischarge->HrefValue = "";

            // Template1
            $this->Template1->LinkCustomAttributes = "";
            $this->Template1->HrefValue = "";

            // Template2
            $this->Template2->LinkCustomAttributes = "";
            $this->Template2->HrefValue = "";

            // Template3
            $this->Template3->LinkCustomAttributes = "";
            $this->Template3->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";

            // DischargeAdviceMedicine
            $this->DischargeAdviceMedicine->LinkCustomAttributes = "";
            $this->DischargeAdviceMedicine->HrefValue = "";

            // DischargeAdviceMedicineTemplate
            $this->DischargeAdviceMedicineTemplate->LinkCustomAttributes = "";
            $this->DischargeAdviceMedicineTemplate->HrefValue = "";
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->BP->Required) {
            if (!$this->BP->IsDetailKey && EmptyValue($this->BP->FormValue)) {
                $this->BP->addErrorMessage(str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
            }
        }
        if ($this->Pulse->Required) {
            if (!$this->Pulse->IsDetailKey && EmptyValue($this->Pulse->FormValue)) {
                $this->Pulse->addErrorMessage(str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
            }
        }
        if ($this->Resp->Required) {
            if (!$this->Resp->IsDetailKey && EmptyValue($this->Resp->FormValue)) {
                $this->Resp->addErrorMessage(str_replace("%s", $this->Resp->caption(), $this->Resp->RequiredErrorMessage));
            }
        }
        if ($this->SPO2->Required) {
            if (!$this->SPO2->IsDetailKey && EmptyValue($this->SPO2->FormValue)) {
                $this->SPO2->addErrorMessage(str_replace("%s", $this->SPO2->caption(), $this->SPO2->RequiredErrorMessage));
            }
        }
        if ($this->FollowupAdvice->Required) {
            if (!$this->FollowupAdvice->IsDetailKey && EmptyValue($this->FollowupAdvice->FormValue)) {
                $this->FollowupAdvice->addErrorMessage(str_replace("%s", $this->FollowupAdvice->caption(), $this->FollowupAdvice->RequiredErrorMessage));
            }
        }
        if ($this->NextReviewDate->Required) {
            if (!$this->NextReviewDate->IsDetailKey && EmptyValue($this->NextReviewDate->FormValue)) {
                $this->NextReviewDate->addErrorMessage(str_replace("%s", $this->NextReviewDate->caption(), $this->NextReviewDate->RequiredErrorMessage));
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
        if ($this->_Template->Required) {
            if (!$this->_Template->IsDetailKey && EmptyValue($this->_Template->FormValue)) {
                $this->_Template->addErrorMessage(str_replace("%s", $this->_Template->caption(), $this->_Template->RequiredErrorMessage));
            }
        }
        if ($this->courseinhospital->Required) {
            if (!$this->courseinhospital->IsDetailKey && EmptyValue($this->courseinhospital->FormValue)) {
                $this->courseinhospital->addErrorMessage(str_replace("%s", $this->courseinhospital->caption(), $this->courseinhospital->RequiredErrorMessage));
            }
        }
        if ($this->procedurenotes->Required) {
            if (!$this->procedurenotes->IsDetailKey && EmptyValue($this->procedurenotes->FormValue)) {
                $this->procedurenotes->addErrorMessage(str_replace("%s", $this->procedurenotes->caption(), $this->procedurenotes->RequiredErrorMessage));
            }
        }
        if ($this->conditionatdischarge->Required) {
            if (!$this->conditionatdischarge->IsDetailKey && EmptyValue($this->conditionatdischarge->FormValue)) {
                $this->conditionatdischarge->addErrorMessage(str_replace("%s", $this->conditionatdischarge->caption(), $this->conditionatdischarge->RequiredErrorMessage));
            }
        }
        if ($this->Template1->Required) {
            if (!$this->Template1->IsDetailKey && EmptyValue($this->Template1->FormValue)) {
                $this->Template1->addErrorMessage(str_replace("%s", $this->Template1->caption(), $this->Template1->RequiredErrorMessage));
            }
        }
        if ($this->Template2->Required) {
            if (!$this->Template2->IsDetailKey && EmptyValue($this->Template2->FormValue)) {
                $this->Template2->addErrorMessage(str_replace("%s", $this->Template2->caption(), $this->Template2->RequiredErrorMessage));
            }
        }
        if ($this->Template3->Required) {
            if (!$this->Template3->IsDetailKey && EmptyValue($this->Template3->FormValue)) {
                $this->Template3->addErrorMessage(str_replace("%s", $this->Template3->caption(), $this->Template3->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
            }
        }
        if ($this->DischargeAdviceMedicine->Required) {
            if (!$this->DischargeAdviceMedicine->IsDetailKey && EmptyValue($this->DischargeAdviceMedicine->FormValue)) {
                $this->DischargeAdviceMedicine->addErrorMessage(str_replace("%s", $this->DischargeAdviceMedicine->caption(), $this->DischargeAdviceMedicine->RequiredErrorMessage));
            }
        }
        if ($this->DischargeAdviceMedicineTemplate->Required) {
            if (!$this->DischargeAdviceMedicineTemplate->IsDetailKey && EmptyValue($this->DischargeAdviceMedicineTemplate->FormValue)) {
                $this->DischargeAdviceMedicineTemplate->addErrorMessage(str_replace("%s", $this->DischargeAdviceMedicineTemplate->caption(), $this->DischargeAdviceMedicineTemplate->RequiredErrorMessage));
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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // BP
        $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, false);

        // Pulse
        $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, false);

        // Resp
        $this->Resp->setDbValueDef($rsnew, $this->Resp->CurrentValue, null, false);

        // SPO2
        $this->SPO2->setDbValueDef($rsnew, $this->SPO2->CurrentValue, null, false);

        // FollowupAdvice
        $this->FollowupAdvice->setDbValueDef($rsnew, $this->FollowupAdvice->CurrentValue, null, false);

        // NextReviewDate
        $this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 7), null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // Gender
        $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // Template
        $this->_Template->setDbValueDef($rsnew, $this->_Template->CurrentValue, "", false);

        // courseinhospital
        $this->courseinhospital->setDbValueDef($rsnew, $this->courseinhospital->CurrentValue, null, false);

        // procedurenotes
        $this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, null, false);

        // conditionatdischarge
        $this->conditionatdischarge->setDbValueDef($rsnew, $this->conditionatdischarge->CurrentValue, null, false);

        // Template1
        $this->Template1->setDbValueDef($rsnew, $this->Template1->CurrentValue, "", false);

        // Template2
        $this->Template2->setDbValueDef($rsnew, $this->Template2->CurrentValue, "", false);

        // Template3
        $this->Template3->setDbValueDef($rsnew, $this->Template3->CurrentValue, "", false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // PatientSearch
        $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", false);

        // DischargeAdviceMedicine
        $this->DischargeAdviceMedicine->setDbValueDef($rsnew, $this->DischargeAdviceMedicine->CurrentValue, null, false);

        // DischargeAdviceMedicineTemplate
        $this->DischargeAdviceMedicineTemplate->setDbValueDef($rsnew, $this->DischargeAdviceMedicineTemplate->CurrentValue, "", false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        $addRow = false;
        if ($insertRow) {
            try {
                $addRow = $this->insert($rsnew);
            } catch (\Exception $e) {
                $this->setFailureMessage($e->getMessage());
            }
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientFollowUpList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
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
                case "x__Template":
                    $lookupFilter = function () {
                        return "`TemplateType`='Follow up Advice'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_Template1":
                    $lookupFilter = function () {
                        return "`TemplateType`='Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_Template2":
                    $lookupFilter = function () {
                        return "`TemplateType`='Procedure Notes'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_Template3":
                    $lookupFilter = function () {
                        return "`TemplateType`='Condition at Discharge'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_PatientSearch":
                    break;
                case "x_DischargeAdviceMedicineTemplate":
                    $lookupFilter = function () {
                        return "`TemplateType`='Discharge Advice Medicine'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
    public function pageRedirecting(&$url) {
    	// Example:
    	//$url = "your URL";
    	$dbhelper = &DbHelper();
    	$Tid = $_POST["fk_patient_id"] ;
    	$Reception = $_POST["fk_id"] ;
    	$PatientId = $_POST["fk_patient_id"] ;
    	$mrnno = $_POST["fk_mrnNo"] ;
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_vitals where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$vitalsURL = "patient_vitalsadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$vitalsURL = "patient_vitalsedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_history where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$historyURL = "patient_historyadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$historyURL = "patient_historyedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_provisional_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$provisionaldiagnosisURL = "patient_provisional_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$provisionaldiagnosisURL = "patient_provisional_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}		
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_prescription where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$prescriptionURL = "patient_prescriptionlist.php?action=gridadd&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$prescriptionURL = "patient_prescriptionlist.php?action=gridedit&showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_final_diagnosis where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$finaldiagnosisURL = "patient_final_diagnosisadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$finaldiagnosisURL = "patient_final_diagnosisedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}		
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_follow_up where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$followupURL = "patient_follow_upadd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$followupURL = "patient_follow_upedit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_delivery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$deliveryregisterURL = "patient_ot_delivery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$deliveryregisterURL = "patient_ot_delivery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$sql = "SELECT * FROM ganeshkumar_bjhims.patient_ot_surgery_register where Reception='".$Reception."' and PatientId='".$PatientId."'  and mrnno='".$mrnno."'  ;";
    	$results1 = $dbhelper->ExecuteRows($sql);
    	if($results1[0]["id"] == "")
    	{
    		$surgeryregisterURL = "patient_ot_surgery_registeradd.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno;
    	}else{
    		$surgeryregisterURL = "patient_ot_surgery_registeredit.php?showmaster=ip_admission&fk_id=".$Reception."&fk_patient_id=".$PatientId."&fk_mrnNo=".$mrnno."&id=".$results1[0]["id"];
    	}	
    	$PageReDirect = $_POST["Repagehistoryview"];
    	if($PageReDirect == "patientvitals")
    	{
       	  $url = $vitalsURL;
    	}
    	if($PageReDirect == "patienthistory")
    	{
       	  $url = $historyURL;
    	}
    	if($PageReDirect == "patientprovisionaldiagnosis")
    	{
       	  $url = $provisionaldiagnosisURL;
    	}
    	 if($PageReDirect == "patientprescription")
    	{
       	  $url = $prescriptionURL;
    	} 
    	if($PageReDirect == "patientfinaldiagnosis")
    	{
       	  $url = $finaldiagnosisURL;
    	}
    	if($PageReDirect == "patientfollowup")
    	{
       	  $url = $followupURL;
    	}
    	if($PageReDirect == "patientotdeliveryregister")
    	{
       	  $url = $deliveryregisterURL;
    	}
    	if($PageReDirect == "patientotsurgeryregister")
    	{
       	  $url = $surgeryregisterURL;
    	}
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
