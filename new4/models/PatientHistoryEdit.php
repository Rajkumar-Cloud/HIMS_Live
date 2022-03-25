<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientHistoryEdit extends PatientHistory
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_history';

    // Page object name
    public $PageObjName = "PatientHistoryEdit";

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

        // Table object (patient_history)
        if (!isset($GLOBALS["patient_history"]) || get_class($GLOBALS["patient_history"]) == PROJECT_NAMESPACE . "patient_history") {
            $GLOBALS["patient_history"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_history');
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
                $doc = new $class(Container("patient_history"));
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
                    if ($pageName == "PatientHistoryView") {
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
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientId->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->MaritalHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->MedicalHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->TreatmentHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->Complaints->setVisibility();
        $this->illness->setVisibility();
        $this->PersonalHistory->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->PatID->setVisibility();
        $this->Reception->setVisibility();
        $this->HospID->setVisibility();
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
        $this->setupLookupOptions($this->PatientSearch);

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
                    $this->terminate("PatientHistoryList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientHistoryList") {
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
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

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
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

        // Check field name 'MaritalHistory' first before field var 'x_MaritalHistory'
        $val = $CurrentForm->hasValue("MaritalHistory") ? $CurrentForm->getValue("MaritalHistory") : $CurrentForm->getValue("x_MaritalHistory");
        if (!$this->MaritalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaritalHistory->Visible = false; // Disable update for API request
            } else {
                $this->MaritalHistory->setFormValue($val);
            }
        }

        // Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
        $val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
        if (!$this->MenstrualHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MenstrualHistory->Visible = false; // Disable update for API request
            } else {
                $this->MenstrualHistory->setFormValue($val);
            }
        }

        // Check field name 'ObstetricHistory' first before field var 'x_ObstetricHistory'
        $val = $CurrentForm->hasValue("ObstetricHistory") ? $CurrentForm->getValue("ObstetricHistory") : $CurrentForm->getValue("x_ObstetricHistory");
        if (!$this->ObstetricHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ObstetricHistory->Visible = false; // Disable update for API request
            } else {
                $this->ObstetricHistory->setFormValue($val);
            }
        }

        // Check field name 'MedicalHistory' first before field var 'x_MedicalHistory'
        $val = $CurrentForm->hasValue("MedicalHistory") ? $CurrentForm->getValue("MedicalHistory") : $CurrentForm->getValue("x_MedicalHistory");
        if (!$this->MedicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MedicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->MedicalHistory->setFormValue($val);
            }
        }

        // Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
        $val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
        if (!$this->SurgicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurgicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->SurgicalHistory->setFormValue($val);
            }
        }

        // Check field name 'PastHistory' first before field var 'x_PastHistory'
        $val = $CurrentForm->hasValue("PastHistory") ? $CurrentForm->getValue("PastHistory") : $CurrentForm->getValue("x_PastHistory");
        if (!$this->PastHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastHistory->Visible = false; // Disable update for API request
            } else {
                $this->PastHistory->setFormValue($val);
            }
        }

        // Check field name 'TreatmentHistory' first before field var 'x_TreatmentHistory'
        $val = $CurrentForm->hasValue("TreatmentHistory") ? $CurrentForm->getValue("TreatmentHistory") : $CurrentForm->getValue("x_TreatmentHistory");
        if (!$this->TreatmentHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatmentHistory->Visible = false; // Disable update for API request
            } else {
                $this->TreatmentHistory->setFormValue($val);
            }
        }

        // Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
        $val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
        if (!$this->FamilyHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FamilyHistory->Visible = false; // Disable update for API request
            } else {
                $this->FamilyHistory->setFormValue($val);
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

        // Check field name 'Complaints' first before field var 'x_Complaints'
        $val = $CurrentForm->hasValue("Complaints") ? $CurrentForm->getValue("Complaints") : $CurrentForm->getValue("x_Complaints");
        if (!$this->Complaints->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Complaints->Visible = false; // Disable update for API request
            } else {
                $this->Complaints->setFormValue($val);
            }
        }

        // Check field name 'illness' first before field var 'x_illness'
        $val = $CurrentForm->hasValue("illness") ? $CurrentForm->getValue("illness") : $CurrentForm->getValue("x_illness");
        if (!$this->illness->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->illness->Visible = false; // Disable update for API request
            } else {
                $this->illness->setFormValue($val);
            }
        }

        // Check field name 'PersonalHistory' first before field var 'x_PersonalHistory'
        $val = $CurrentForm->hasValue("PersonalHistory") ? $CurrentForm->getValue("PersonalHistory") : $CurrentForm->getValue("x_PersonalHistory");
        if (!$this->PersonalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PersonalHistory->Visible = false; // Disable update for API request
            } else {
                $this->PersonalHistory->setFormValue($val);
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

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->MaritalHistory->CurrentValue = $this->MaritalHistory->FormValue;
        $this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
        $this->ObstetricHistory->CurrentValue = $this->ObstetricHistory->FormValue;
        $this->MedicalHistory->CurrentValue = $this->MedicalHistory->FormValue;
        $this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
        $this->PastHistory->CurrentValue = $this->PastHistory->FormValue;
        $this->TreatmentHistory->CurrentValue = $this->TreatmentHistory->FormValue;
        $this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->Complaints->CurrentValue = $this->Complaints->FormValue;
        $this->illness->CurrentValue = $this->illness->FormValue;
        $this->PersonalHistory->CurrentValue = $this->PersonalHistory->FormValue;
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
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
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->MaritalHistory->setDbValue($row['MaritalHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->TreatmentHistory->setDbValue($row['TreatmentHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Complaints->setDbValue($row['Complaints']);
        $this->illness->setDbValue($row['illness']);
        $this->PersonalHistory->setDbValue($row['PersonalHistory']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->PatID->setDbValue($row['PatID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['PatientId'] = null;
        $row['MobileNumber'] = null;
        $row['MaritalHistory'] = null;
        $row['MenstrualHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['MedicalHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['PastHistory'] = null;
        $row['TreatmentHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['Complaints'] = null;
        $row['illness'] = null;
        $row['PersonalHistory'] = null;
        $row['PatientSearch'] = null;
        $row['PatID'] = null;
        $row['Reception'] = null;
        $row['HospID'] = null;
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

        // mrnno

        // PatientName

        // PatientId

        // MobileNumber

        // MaritalHistory

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // PastHistory

        // TreatmentHistory

        // FamilyHistory

        // Age

        // Gender

        // profilePic

        // Complaints

        // illness

        // PersonalHistory

        // PatientSearch

        // PatID

        // Reception

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewValue = FormatNumber($this->PatientId->ViewValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // MaritalHistory
            $this->MaritalHistory->ViewValue = $this->MaritalHistory->CurrentValue;
            $this->MaritalHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // MedicalHistory
            $this->MedicalHistory->ViewValue = $this->MedicalHistory->CurrentValue;
            $this->MedicalHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // TreatmentHistory
            $this->TreatmentHistory->ViewValue = $this->TreatmentHistory->CurrentValue;
            $this->TreatmentHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // Complaints
            $this->Complaints->ViewValue = $this->Complaints->CurrentValue;
            $this->Complaints->ViewCustomAttributes = "";

            // illness
            $this->illness->ViewValue = $this->illness->CurrentValue;
            $this->illness->ViewCustomAttributes = "";

            // PersonalHistory
            $this->PersonalHistory->ViewValue = $this->PersonalHistory->CurrentValue;
            $this->PersonalHistory->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";
            $this->MaritalHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";
            $this->MedicalHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // TreatmentHistory
            $this->TreatmentHistory->LinkCustomAttributes = "";
            $this->TreatmentHistory->HrefValue = "";
            $this->TreatmentHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

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

            // Complaints
            $this->Complaints->LinkCustomAttributes = "";
            $this->Complaints->HrefValue = "";
            $this->Complaints->TooltipValue = "";

            // illness
            $this->illness->LinkCustomAttributes = "";
            $this->illness->HrefValue = "";
            $this->illness->TooltipValue = "";

            // PersonalHistory
            $this->PersonalHistory->LinkCustomAttributes = "";
            $this->PersonalHistory->HrefValue = "";
            $this->PersonalHistory->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->EditValue = FormatNumber($this->PatientId->EditValue, 0, -2, -2, -2);
            $this->PatientId->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // MaritalHistory
            $this->MaritalHistory->EditAttrs["class"] = "form-control";
            $this->MaritalHistory->EditCustomAttributes = "";
            $this->MaritalHistory->EditValue = HtmlEncode($this->MaritalHistory->CurrentValue);
            $this->MaritalHistory->PlaceHolder = RemoveHtml($this->MaritalHistory->caption());

            // MenstrualHistory
            $this->MenstrualHistory->EditAttrs["class"] = "form-control";
            $this->MenstrualHistory->EditCustomAttributes = "";
            $this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
            $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

            // ObstetricHistory
            $this->ObstetricHistory->EditAttrs["class"] = "form-control";
            $this->ObstetricHistory->EditCustomAttributes = "";
            $this->ObstetricHistory->EditValue = HtmlEncode($this->ObstetricHistory->CurrentValue);
            $this->ObstetricHistory->PlaceHolder = RemoveHtml($this->ObstetricHistory->caption());

            // MedicalHistory
            $this->MedicalHistory->EditAttrs["class"] = "form-control";
            $this->MedicalHistory->EditCustomAttributes = "";
            $this->MedicalHistory->EditValue = HtmlEncode($this->MedicalHistory->CurrentValue);
            $this->MedicalHistory->PlaceHolder = RemoveHtml($this->MedicalHistory->caption());

            // SurgicalHistory
            $this->SurgicalHistory->EditAttrs["class"] = "form-control";
            $this->SurgicalHistory->EditCustomAttributes = "";
            $this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
            $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

            // PastHistory
            $this->PastHistory->EditAttrs["class"] = "form-control";
            $this->PastHistory->EditCustomAttributes = "";
            $this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
            $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

            // TreatmentHistory
            $this->TreatmentHistory->EditAttrs["class"] = "form-control";
            $this->TreatmentHistory->EditCustomAttributes = "";
            $this->TreatmentHistory->EditValue = HtmlEncode($this->TreatmentHistory->CurrentValue);
            $this->TreatmentHistory->PlaceHolder = RemoveHtml($this->TreatmentHistory->caption());

            // FamilyHistory
            $this->FamilyHistory->EditAttrs["class"] = "form-control";
            $this->FamilyHistory->EditCustomAttributes = "";
            $this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
            $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

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

            // Complaints
            $this->Complaints->EditAttrs["class"] = "form-control";
            $this->Complaints->EditCustomAttributes = "";
            $this->Complaints->EditValue = HtmlEncode($this->Complaints->CurrentValue);
            $this->Complaints->PlaceHolder = RemoveHtml($this->Complaints->caption());

            // illness
            $this->illness->EditAttrs["class"] = "form-control";
            $this->illness->EditCustomAttributes = "";
            $this->illness->EditValue = HtmlEncode($this->illness->CurrentValue);
            $this->illness->PlaceHolder = RemoveHtml($this->illness->caption());

            // PersonalHistory
            $this->PersonalHistory->EditAttrs["class"] = "form-control";
            $this->PersonalHistory->EditCustomAttributes = "";
            $this->PersonalHistory->EditValue = HtmlEncode($this->PersonalHistory->CurrentValue);
            $this->PersonalHistory->PlaceHolder = RemoveHtml($this->PersonalHistory->caption());

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

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // HospID

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // MaritalHistory
            $this->MaritalHistory->LinkCustomAttributes = "";
            $this->MaritalHistory->HrefValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";

            // TreatmentHistory
            $this->TreatmentHistory->LinkCustomAttributes = "";
            $this->TreatmentHistory->HrefValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // Complaints
            $this->Complaints->LinkCustomAttributes = "";
            $this->Complaints->HrefValue = "";

            // illness
            $this->illness->LinkCustomAttributes = "";
            $this->illness->HrefValue = "";

            // PersonalHistory
            $this->PersonalHistory->LinkCustomAttributes = "";
            $this->PersonalHistory->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
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
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->MaritalHistory->Required) {
            if (!$this->MaritalHistory->IsDetailKey && EmptyValue($this->MaritalHistory->FormValue)) {
                $this->MaritalHistory->addErrorMessage(str_replace("%s", $this->MaritalHistory->caption(), $this->MaritalHistory->RequiredErrorMessage));
            }
        }
        if ($this->MenstrualHistory->Required) {
            if (!$this->MenstrualHistory->IsDetailKey && EmptyValue($this->MenstrualHistory->FormValue)) {
                $this->MenstrualHistory->addErrorMessage(str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
            }
        }
        if ($this->ObstetricHistory->Required) {
            if (!$this->ObstetricHistory->IsDetailKey && EmptyValue($this->ObstetricHistory->FormValue)) {
                $this->ObstetricHistory->addErrorMessage(str_replace("%s", $this->ObstetricHistory->caption(), $this->ObstetricHistory->RequiredErrorMessage));
            }
        }
        if ($this->MedicalHistory->Required) {
            if (!$this->MedicalHistory->IsDetailKey && EmptyValue($this->MedicalHistory->FormValue)) {
                $this->MedicalHistory->addErrorMessage(str_replace("%s", $this->MedicalHistory->caption(), $this->MedicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->SurgicalHistory->Required) {
            if (!$this->SurgicalHistory->IsDetailKey && EmptyValue($this->SurgicalHistory->FormValue)) {
                $this->SurgicalHistory->addErrorMessage(str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->PastHistory->Required) {
            if (!$this->PastHistory->IsDetailKey && EmptyValue($this->PastHistory->FormValue)) {
                $this->PastHistory->addErrorMessage(str_replace("%s", $this->PastHistory->caption(), $this->PastHistory->RequiredErrorMessage));
            }
        }
        if ($this->TreatmentHistory->Required) {
            if (!$this->TreatmentHistory->IsDetailKey && EmptyValue($this->TreatmentHistory->FormValue)) {
                $this->TreatmentHistory->addErrorMessage(str_replace("%s", $this->TreatmentHistory->caption(), $this->TreatmentHistory->RequiredErrorMessage));
            }
        }
        if ($this->FamilyHistory->Required) {
            if (!$this->FamilyHistory->IsDetailKey && EmptyValue($this->FamilyHistory->FormValue)) {
                $this->FamilyHistory->addErrorMessage(str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
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
        if ($this->Complaints->Required) {
            if (!$this->Complaints->IsDetailKey && EmptyValue($this->Complaints->FormValue)) {
                $this->Complaints->addErrorMessage(str_replace("%s", $this->Complaints->caption(), $this->Complaints->RequiredErrorMessage));
            }
        }
        if ($this->illness->Required) {
            if (!$this->illness->IsDetailKey && EmptyValue($this->illness->FormValue)) {
                $this->illness->addErrorMessage(str_replace("%s", $this->illness->caption(), $this->illness->RequiredErrorMessage));
            }
        }
        if ($this->PersonalHistory->Required) {
            if (!$this->PersonalHistory->IsDetailKey && EmptyValue($this->PersonalHistory->FormValue)) {
                $this->PersonalHistory->addErrorMessage(str_replace("%s", $this->PersonalHistory->caption(), $this->PersonalHistory->RequiredErrorMessage));
            }
        }
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
            }
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

            // MaritalHistory
            $this->MaritalHistory->setDbValueDef($rsnew, $this->MaritalHistory->CurrentValue, null, $this->MaritalHistory->ReadOnly);

            // MenstrualHistory
            $this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, null, $this->MenstrualHistory->ReadOnly);

            // ObstetricHistory
            $this->ObstetricHistory->setDbValueDef($rsnew, $this->ObstetricHistory->CurrentValue, null, $this->ObstetricHistory->ReadOnly);

            // MedicalHistory
            $this->MedicalHistory->setDbValueDef($rsnew, $this->MedicalHistory->CurrentValue, null, $this->MedicalHistory->ReadOnly);

            // SurgicalHistory
            $this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, null, $this->SurgicalHistory->ReadOnly);

            // PastHistory
            $this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, null, $this->PastHistory->ReadOnly);

            // TreatmentHistory
            $this->TreatmentHistory->setDbValueDef($rsnew, $this->TreatmentHistory->CurrentValue, null, $this->TreatmentHistory->ReadOnly);

            // FamilyHistory
            $this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, null, $this->FamilyHistory->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // Complaints
            $this->Complaints->setDbValueDef($rsnew, $this->Complaints->CurrentValue, null, $this->Complaints->ReadOnly);

            // illness
            $this->illness->setDbValueDef($rsnew, $this->illness->CurrentValue, null, $this->illness->ReadOnly);

            // PersonalHistory
            $this->PersonalHistory->setDbValueDef($rsnew, $this->PersonalHistory->CurrentValue, null, $this->PersonalHistory->ReadOnly);

            // PatientSearch
            $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", $this->PatientSearch->ReadOnly);

            // PatID
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientHistoryList"), "", $this->TableVar, true);
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
                case "x_PatientSearch":
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
