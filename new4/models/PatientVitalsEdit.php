<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientVitalsEdit extends PatientVitals
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_vitals';

    // Page object name
    public $PageObjName = "PatientVitalsEdit";

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

        // Table object (patient_vitals)
        if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
            $GLOBALS["patient_vitals"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');
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
                $doc = new $class(Container("patient_vitals"));
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
                    if ($pageName == "PatientVitalsView") {
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
        $this->PatID->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->profilePic->setVisibility();
        $this->HT->setVisibility();
        $this->WT->setVisibility();
        $this->SurfaceArea->setVisibility();
        $this->BodyMassIndex->setVisibility();
        $this->ClinicalFindings->setVisibility();
        $this->ClinicalDiagnosis->setVisibility();
        $this->AnticoagulantifAny->setVisibility();
        $this->FoodAllergies->setVisibility();
        $this->GenericAllergies->setVisibility();
        $this->GroupAllergies->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->PR->setVisibility();
        $this->CNS->setVisibility();
        $this->RSA->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PS->setVisibility();
        $this->PV->setVisibility();
        $this->clinicaldetails->setVisibility();
        $this->status->setVisibility();
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->PatientSearch->setVisibility();
        $this->PatientId->setVisibility();
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
        $this->setupLookupOptions($this->AnticoagulantifAny);
        $this->setupLookupOptions($this->GenericAllergies);
        $this->setupLookupOptions($this->GroupAllergies);
        $this->setupLookupOptions($this->clinicaldetails);
        $this->setupLookupOptions($this->status);
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
                    $this->terminate("PatientVitalsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientVitalsList") {
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

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
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

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }

        // Check field name 'HT' first before field var 'x_HT'
        $val = $CurrentForm->hasValue("HT") ? $CurrentForm->getValue("HT") : $CurrentForm->getValue("x_HT");
        if (!$this->HT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HT->Visible = false; // Disable update for API request
            } else {
                $this->HT->setFormValue($val);
            }
        }

        // Check field name 'WT' first before field var 'x_WT'
        $val = $CurrentForm->hasValue("WT") ? $CurrentForm->getValue("WT") : $CurrentForm->getValue("x_WT");
        if (!$this->WT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WT->Visible = false; // Disable update for API request
            } else {
                $this->WT->setFormValue($val);
            }
        }

        // Check field name 'SurfaceArea' first before field var 'x_SurfaceArea'
        $val = $CurrentForm->hasValue("SurfaceArea") ? $CurrentForm->getValue("SurfaceArea") : $CurrentForm->getValue("x_SurfaceArea");
        if (!$this->SurfaceArea->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurfaceArea->Visible = false; // Disable update for API request
            } else {
                $this->SurfaceArea->setFormValue($val);
            }
        }

        // Check field name 'BodyMassIndex' first before field var 'x_BodyMassIndex'
        $val = $CurrentForm->hasValue("BodyMassIndex") ? $CurrentForm->getValue("BodyMassIndex") : $CurrentForm->getValue("x_BodyMassIndex");
        if (!$this->BodyMassIndex->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BodyMassIndex->Visible = false; // Disable update for API request
            } else {
                $this->BodyMassIndex->setFormValue($val);
            }
        }

        // Check field name 'ClinicalFindings' first before field var 'x_ClinicalFindings'
        $val = $CurrentForm->hasValue("ClinicalFindings") ? $CurrentForm->getValue("ClinicalFindings") : $CurrentForm->getValue("x_ClinicalFindings");
        if (!$this->ClinicalFindings->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClinicalFindings->Visible = false; // Disable update for API request
            } else {
                $this->ClinicalFindings->setFormValue($val);
            }
        }

        // Check field name 'ClinicalDiagnosis' first before field var 'x_ClinicalDiagnosis'
        $val = $CurrentForm->hasValue("ClinicalDiagnosis") ? $CurrentForm->getValue("ClinicalDiagnosis") : $CurrentForm->getValue("x_ClinicalDiagnosis");
        if (!$this->ClinicalDiagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClinicalDiagnosis->Visible = false; // Disable update for API request
            } else {
                $this->ClinicalDiagnosis->setFormValue($val);
            }
        }

        // Check field name 'AnticoagulantifAny' first before field var 'x_AnticoagulantifAny'
        $val = $CurrentForm->hasValue("AnticoagulantifAny") ? $CurrentForm->getValue("AnticoagulantifAny") : $CurrentForm->getValue("x_AnticoagulantifAny");
        if (!$this->AnticoagulantifAny->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnticoagulantifAny->Visible = false; // Disable update for API request
            } else {
                $this->AnticoagulantifAny->setFormValue($val);
            }
        }

        // Check field name 'FoodAllergies' first before field var 'x_FoodAllergies'
        $val = $CurrentForm->hasValue("FoodAllergies") ? $CurrentForm->getValue("FoodAllergies") : $CurrentForm->getValue("x_FoodAllergies");
        if (!$this->FoodAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FoodAllergies->Visible = false; // Disable update for API request
            } else {
                $this->FoodAllergies->setFormValue($val);
            }
        }

        // Check field name 'GenericAllergies' first before field var 'x_GenericAllergies'
        $val = $CurrentForm->hasValue("GenericAllergies") ? $CurrentForm->getValue("GenericAllergies") : $CurrentForm->getValue("x_GenericAllergies");
        if (!$this->GenericAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GenericAllergies->Visible = false; // Disable update for API request
            } else {
                $this->GenericAllergies->setFormValue($val);
            }
        }

        // Check field name 'GroupAllergies' first before field var 'x_GroupAllergies'
        $val = $CurrentForm->hasValue("GroupAllergies") ? $CurrentForm->getValue("GroupAllergies") : $CurrentForm->getValue("x_GroupAllergies");
        if (!$this->GroupAllergies->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupAllergies->Visible = false; // Disable update for API request
            } else {
                $this->GroupAllergies->setFormValue($val);
            }
        }

        // Check field name 'Temp' first before field var 'x_Temp'
        $val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
        if (!$this->Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Temp->Visible = false; // Disable update for API request
            } else {
                $this->Temp->setFormValue($val);
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

        // Check field name 'BP' first before field var 'x_BP'
        $val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
        if (!$this->BP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BP->Visible = false; // Disable update for API request
            } else {
                $this->BP->setFormValue($val);
            }
        }

        // Check field name 'PR' first before field var 'x_PR'
        $val = $CurrentForm->hasValue("PR") ? $CurrentForm->getValue("PR") : $CurrentForm->getValue("x_PR");
        if (!$this->PR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PR->Visible = false; // Disable update for API request
            } else {
                $this->PR->setFormValue($val);
            }
        }

        // Check field name 'CNS' first before field var 'x_CNS'
        $val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
        if (!$this->CNS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CNS->Visible = false; // Disable update for API request
            } else {
                $this->CNS->setFormValue($val);
            }
        }

        // Check field name 'RSA' first before field var 'x_RSA'
        $val = $CurrentForm->hasValue("RSA") ? $CurrentForm->getValue("RSA") : $CurrentForm->getValue("x_RSA");
        if (!$this->RSA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RSA->Visible = false; // Disable update for API request
            } else {
                $this->RSA->setFormValue($val);
            }
        }

        // Check field name 'CVS' first before field var 'x_CVS'
        $val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
        if (!$this->CVS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CVS->Visible = false; // Disable update for API request
            } else {
                $this->CVS->setFormValue($val);
            }
        }

        // Check field name 'PA' first before field var 'x_PA'
        $val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
        if (!$this->PA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PA->Visible = false; // Disable update for API request
            } else {
                $this->PA->setFormValue($val);
            }
        }

        // Check field name 'PS' first before field var 'x_PS'
        $val = $CurrentForm->hasValue("PS") ? $CurrentForm->getValue("PS") : $CurrentForm->getValue("x_PS");
        if (!$this->PS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PS->Visible = false; // Disable update for API request
            } else {
                $this->PS->setFormValue($val);
            }
        }

        // Check field name 'PV' first before field var 'x_PV'
        $val = $CurrentForm->hasValue("PV") ? $CurrentForm->getValue("PV") : $CurrentForm->getValue("x_PV");
        if (!$this->PV->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PV->Visible = false; // Disable update for API request
            } else {
                $this->PV->setFormValue($val);
            }
        }

        // Check field name 'clinicaldetails' first before field var 'x_clinicaldetails'
        $val = $CurrentForm->hasValue("clinicaldetails") ? $CurrentForm->getValue("clinicaldetails") : $CurrentForm->getValue("x_clinicaldetails");
        if (!$this->clinicaldetails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->clinicaldetails->Visible = false; // Disable update for API request
            } else {
                $this->clinicaldetails->setFormValue($val);
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

        // Check field name 'PatientSearch' first before field var 'x_PatientSearch'
        $val = $CurrentForm->hasValue("PatientSearch") ? $CurrentForm->getValue("PatientSearch") : $CurrentForm->getValue("x_PatientSearch");
        if (!$this->PatientSearch->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientSearch->Visible = false; // Disable update for API request
            } else {
                $this->PatientSearch->setFormValue($val);
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
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->HT->CurrentValue = $this->HT->FormValue;
        $this->WT->CurrentValue = $this->WT->FormValue;
        $this->SurfaceArea->CurrentValue = $this->SurfaceArea->FormValue;
        $this->BodyMassIndex->CurrentValue = $this->BodyMassIndex->FormValue;
        $this->ClinicalFindings->CurrentValue = $this->ClinicalFindings->FormValue;
        $this->ClinicalDiagnosis->CurrentValue = $this->ClinicalDiagnosis->FormValue;
        $this->AnticoagulantifAny->CurrentValue = $this->AnticoagulantifAny->FormValue;
        $this->FoodAllergies->CurrentValue = $this->FoodAllergies->FormValue;
        $this->GenericAllergies->CurrentValue = $this->GenericAllergies->FormValue;
        $this->GroupAllergies->CurrentValue = $this->GroupAllergies->FormValue;
        $this->Temp->CurrentValue = $this->Temp->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->PR->CurrentValue = $this->PR->FormValue;
        $this->CNS->CurrentValue = $this->CNS->FormValue;
        $this->RSA->CurrentValue = $this->RSA->FormValue;
        $this->CVS->CurrentValue = $this->CVS->FormValue;
        $this->PA->CurrentValue = $this->PA->FormValue;
        $this->PS->CurrentValue = $this->PS->FormValue;
        $this->PV->CurrentValue = $this->PV->FormValue;
        $this->clinicaldetails->CurrentValue = $this->clinicaldetails->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->PatientSearch->CurrentValue = $this->PatientSearch->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
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
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->HT->setDbValue($row['HT']);
        $this->WT->setDbValue($row['WT']);
        $this->SurfaceArea->setDbValue($row['SurfaceArea']);
        $this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
        $this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
        $this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
        $this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
        $this->FoodAllergies->setDbValue($row['FoodAllergies']);
        $this->GenericAllergies->setDbValue($row['GenericAllergies']);
        $this->GroupAllergies->setDbValue($row['GroupAllergies']);
        if (array_key_exists('EV__GroupAllergies', $row)) {
            $this->GroupAllergies->VirtualValue = $row['EV__GroupAllergies']; // Set up virtual field value
        } else {
            $this->GroupAllergies->VirtualValue = ""; // Clear value
        }
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->PR->setDbValue($row['PR']);
        $this->CNS->setDbValue($row['CNS']);
        $this->RSA->setDbValue($row['RSA']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PS->setDbValue($row['PS']);
        $this->PV->setDbValue($row['PV']);
        $this->clinicaldetails->setDbValue($row['clinicaldetails']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->PatientId->setDbValue($row['PatientId']);
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
        $row['PatID'] = null;
        $row['MobileNumber'] = null;
        $row['profilePic'] = null;
        $row['HT'] = null;
        $row['WT'] = null;
        $row['SurfaceArea'] = null;
        $row['BodyMassIndex'] = null;
        $row['ClinicalFindings'] = null;
        $row['ClinicalDiagnosis'] = null;
        $row['AnticoagulantifAny'] = null;
        $row['FoodAllergies'] = null;
        $row['GenericAllergies'] = null;
        $row['GroupAllergies'] = null;
        $row['Temp'] = null;
        $row['Pulse'] = null;
        $row['BP'] = null;
        $row['PR'] = null;
        $row['CNS'] = null;
        $row['RSA'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['PS'] = null;
        $row['PV'] = null;
        $row['clinicaldetails'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['PatientSearch'] = null;
        $row['PatientId'] = null;
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

        // PatID

        // MobileNumber

        // profilePic

        // HT

        // WT

        // SurfaceArea

        // BodyMassIndex

        // ClinicalFindings

        // ClinicalDiagnosis

        // AnticoagulantifAny

        // FoodAllergies

        // GenericAllergies

        // GroupAllergies

        // Temp

        // Pulse

        // BP

        // PR

        // CNS

        // RSA

        // CVS

        // PA

        // PS

        // PV

        // clinicaldetails

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Age

        // Gender

        // PatientSearch

        // PatientId

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->CssClass = "font-weight-bold";
            $this->profilePic->ViewCustomAttributes = "";

            // HT
            $this->HT->ViewValue = $this->HT->CurrentValue;
            $this->HT->ViewCustomAttributes = "";

            // WT
            $this->WT->ViewValue = $this->WT->CurrentValue;
            $this->WT->ViewCustomAttributes = "";

            // SurfaceArea
            $this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
            $this->SurfaceArea->ViewCustomAttributes = "";

            // BodyMassIndex
            $this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
            $this->BodyMassIndex->ViewCustomAttributes = "";

            // ClinicalFindings
            $this->ClinicalFindings->ViewValue = $this->ClinicalFindings->CurrentValue;
            $this->ClinicalFindings->ViewCustomAttributes = "";

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->ViewValue = $this->ClinicalDiagnosis->CurrentValue;
            $this->ClinicalDiagnosis->ViewCustomAttributes = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
                    }
                }
            } else {
                $this->AnticoagulantifAny->ViewValue = null;
            }
            $this->AnticoagulantifAny->ViewCustomAttributes = "";

            // FoodAllergies
            $this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
            $this->FoodAllergies->ViewCustomAttributes = "";

            // GenericAllergies
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
                if ($this->GenericAllergies->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->GenericAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->GenericAllergies->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                            $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        }
                    } else {
                        $this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
                    }
                }
            } else {
                $this->GenericAllergies->ViewValue = null;
            }
            $this->GenericAllergies->ViewCustomAttributes = "";

            // GroupAllergies
            if ($this->GroupAllergies->VirtualValue != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
            } else {
                $curVal = trim(strval($this->GroupAllergies->CurrentValue));
                if ($curVal != "") {
                    $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
                    if ($this->GroupAllergies->ViewValue === null) { // Lookup from database
                        $arwrk = explode(",", $curVal);
                        $filterWrk = "";
                        foreach ($arwrk as $wrk) {
                            if ($filterWrk != "") {
                                $filterWrk .= " OR ";
                            }
                            $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                        }
                        $sqlWrk = $this->GroupAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $this->GroupAllergies->ViewValue = new OptionValues();
                            foreach ($rswrk as $row) {
                                $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                                $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                            }
                        } else {
                            $this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
                        }
                    }
                } else {
                    $this->GroupAllergies->ViewValue = null;
                }
            }
            $this->GroupAllergies->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RSA
            $this->RSA->ViewValue = $this->RSA->CurrentValue;
            $this->RSA->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PS
            $this->PS->ViewValue = $this->PS->CurrentValue;
            $this->PS->ViewCustomAttributes = "";

            // PV
            $this->PV->ViewValue = $this->PV->CurrentValue;
            $this->PV->ViewCustomAttributes = "";

            // clinicaldetails
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
                if ($this->clinicaldetails->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->clinicaldetails->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->clinicaldetails->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->clinicaldetails->Lookup->renderViewRow($row);
                            $this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
                        }
                    } else {
                        $this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
                    }
                }
            } else {
                $this->clinicaldetails->ViewValue = null;
            }
            $this->clinicaldetails->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

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

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";
            $this->HT->TooltipValue = "";

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";
            $this->WT->TooltipValue = "";

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";
            $this->SurfaceArea->TooltipValue = "";

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";
            $this->BodyMassIndex->TooltipValue = "";

            // ClinicalFindings
            $this->ClinicalFindings->LinkCustomAttributes = "";
            $this->ClinicalFindings->HrefValue = "";
            $this->ClinicalFindings->TooltipValue = "";

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->LinkCustomAttributes = "";
            $this->ClinicalDiagnosis->HrefValue = "";
            $this->ClinicalDiagnosis->TooltipValue = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";
            $this->AnticoagulantifAny->TooltipValue = "";

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";
            $this->FoodAllergies->TooltipValue = "";

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";
            $this->GenericAllergies->TooltipValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";
            $this->GroupAllergies->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";
            $this->RSA->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";
            $this->PS->TooltipValue = "";

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";
            $this->PV->TooltipValue = "";

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";
            $this->clinicaldetails->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";
            $this->PatientSearch->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

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
            $this->PatientName->EditValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!$this->profilePic->Raw) {
                $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
            }
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // HT
            $this->HT->EditAttrs["class"] = "form-control";
            $this->HT->EditCustomAttributes = "";
            if (!$this->HT->Raw) {
                $this->HT->CurrentValue = HtmlDecode($this->HT->CurrentValue);
            }
            $this->HT->EditValue = HtmlEncode($this->HT->CurrentValue);
            $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

            // WT
            $this->WT->EditAttrs["class"] = "form-control";
            $this->WT->EditCustomAttributes = "";
            if (!$this->WT->Raw) {
                $this->WT->CurrentValue = HtmlDecode($this->WT->CurrentValue);
            }
            $this->WT->EditValue = HtmlEncode($this->WT->CurrentValue);
            $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

            // SurfaceArea
            $this->SurfaceArea->EditAttrs["class"] = "form-control";
            $this->SurfaceArea->EditCustomAttributes = "";
            if (!$this->SurfaceArea->Raw) {
                $this->SurfaceArea->CurrentValue = HtmlDecode($this->SurfaceArea->CurrentValue);
            }
            $this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->CurrentValue);
            $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

            // BodyMassIndex
            $this->BodyMassIndex->EditAttrs["class"] = "form-control";
            $this->BodyMassIndex->EditCustomAttributes = "";
            if (!$this->BodyMassIndex->Raw) {
                $this->BodyMassIndex->CurrentValue = HtmlDecode($this->BodyMassIndex->CurrentValue);
            }
            $this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->CurrentValue);
            $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

            // ClinicalFindings
            $this->ClinicalFindings->EditAttrs["class"] = "form-control";
            $this->ClinicalFindings->EditCustomAttributes = "";
            $this->ClinicalFindings->EditValue = HtmlEncode($this->ClinicalFindings->CurrentValue);
            $this->ClinicalFindings->PlaceHolder = RemoveHtml($this->ClinicalFindings->caption());

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->EditAttrs["class"] = "form-control";
            $this->ClinicalDiagnosis->EditCustomAttributes = "";
            $this->ClinicalDiagnosis->EditValue = HtmlEncode($this->ClinicalDiagnosis->CurrentValue);
            $this->ClinicalDiagnosis->PlaceHolder = RemoveHtml($this->ClinicalDiagnosis->caption());

            // AnticoagulantifAny
            $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
            $this->AnticoagulantifAny->EditCustomAttributes = "";
            if (!$this->AnticoagulantifAny->Raw) {
                $this->AnticoagulantifAny->CurrentValue = HtmlDecode($this->AnticoagulantifAny->CurrentValue);
            }
            $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->EditValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->EditValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->CurrentValue);
                    }
                }
            } else {
                $this->AnticoagulantifAny->EditValue = null;
            }
            $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

            // FoodAllergies
            $this->FoodAllergies->EditAttrs["class"] = "form-control";
            $this->FoodAllergies->EditCustomAttributes = "";
            if (!$this->FoodAllergies->Raw) {
                $this->FoodAllergies->CurrentValue = HtmlDecode($this->FoodAllergies->CurrentValue);
            }
            $this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->CurrentValue);
            $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

            // GenericAllergies
            $this->GenericAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
            } else {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->Lookup !== null && is_array($this->GenericAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GenericAllergies->ViewValue !== null) { // Load from cache
                $this->GenericAllergies->EditValue = array_values($this->GenericAllergies->Lookup->Options);
                if ($this->GenericAllergies->ViewValue == "") {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GenericAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GenericAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                        $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GenericAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GenericAllergies->EditValue = $arwrk;
            }
            $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

            // GroupAllergies
            $this->GroupAllergies->EditCustomAttributes = "";
            $curVal = trim(strval($this->GroupAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
            } else {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->Lookup !== null && is_array($this->GroupAllergies->Lookup->Options) ? $curVal : null;
            }
            if ($this->GroupAllergies->ViewValue !== null) { // Load from cache
                $this->GroupAllergies->EditValue = array_values($this->GroupAllergies->Lookup->Options);
                if ($this->GroupAllergies->ViewValue == "") {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->GroupAllergies->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $this->GroupAllergies->ViewValue = new OptionValues();
                    foreach ($rswrk as $row) {
                        $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                        $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                        $ari++;
                    }
                } else {
                    $this->GroupAllergies->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->GroupAllergies->EditValue = $arwrk;
            }
            $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // PR
            $this->PR->EditAttrs["class"] = "form-control";
            $this->PR->EditCustomAttributes = "";
            if (!$this->PR->Raw) {
                $this->PR->CurrentValue = HtmlDecode($this->PR->CurrentValue);
            }
            $this->PR->EditValue = HtmlEncode($this->PR->CurrentValue);
            $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RSA
            $this->RSA->EditAttrs["class"] = "form-control";
            $this->RSA->EditCustomAttributes = "";
            if (!$this->RSA->Raw) {
                $this->RSA->CurrentValue = HtmlDecode($this->RSA->CurrentValue);
            }
            $this->RSA->EditValue = HtmlEncode($this->RSA->CurrentValue);
            $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // PS
            $this->PS->EditAttrs["class"] = "form-control";
            $this->PS->EditCustomAttributes = "";
            if (!$this->PS->Raw) {
                $this->PS->CurrentValue = HtmlDecode($this->PS->CurrentValue);
            }
            $this->PS->EditValue = HtmlEncode($this->PS->CurrentValue);
            $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

            // PV
            $this->PV->EditAttrs["class"] = "form-control";
            $this->PV->EditCustomAttributes = "";
            if (!$this->PV->Raw) {
                $this->PV->CurrentValue = HtmlDecode($this->PV->CurrentValue);
            }
            $this->PV->EditValue = HtmlEncode($this->PV->CurrentValue);
            $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

            // clinicaldetails
            $this->clinicaldetails->EditCustomAttributes = "";
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
            } else {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->Lookup !== null && is_array($this->clinicaldetails->Lookup->Options) ? $curVal : null;
            }
            if ($this->clinicaldetails->ViewValue !== null) { // Load from cache
                $this->clinicaldetails->EditValue = array_values($this->clinicaldetails->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                }
                $sqlWrk = $this->clinicaldetails->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->clinicaldetails->EditValue = $arwrk;
            }
            $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
            } else {
                $this->status->ViewValue = $this->status->Lookup !== null && is_array($this->status->Lookup->Options) ? $curVal : null;
            }
            if ($this->status->ViewValue !== null) { // Load from cache
                $this->status->EditValue = array_values($this->status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->status->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->status->EditValue = $arwrk;
            }
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // modifiedby

            // modifieddatetime

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
                $this->PatientSearch->EditValue = $arwrk;
            }
            $this->PatientSearch->PlaceHolder = RemoveHtml($this->PatientSearch->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

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
            $this->PatientName->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";

            // ClinicalFindings
            $this->ClinicalFindings->LinkCustomAttributes = "";
            $this->ClinicalFindings->HrefValue = "";

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->LinkCustomAttributes = "";
            $this->ClinicalDiagnosis->HrefValue = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // PatientSearch
            $this->PatientSearch->LinkCustomAttributes = "";
            $this->PatientSearch->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->HT->Required) {
            if (!$this->HT->IsDetailKey && EmptyValue($this->HT->FormValue)) {
                $this->HT->addErrorMessage(str_replace("%s", $this->HT->caption(), $this->HT->RequiredErrorMessage));
            }
        }
        if ($this->WT->Required) {
            if (!$this->WT->IsDetailKey && EmptyValue($this->WT->FormValue)) {
                $this->WT->addErrorMessage(str_replace("%s", $this->WT->caption(), $this->WT->RequiredErrorMessage));
            }
        }
        if ($this->SurfaceArea->Required) {
            if (!$this->SurfaceArea->IsDetailKey && EmptyValue($this->SurfaceArea->FormValue)) {
                $this->SurfaceArea->addErrorMessage(str_replace("%s", $this->SurfaceArea->caption(), $this->SurfaceArea->RequiredErrorMessage));
            }
        }
        if ($this->BodyMassIndex->Required) {
            if (!$this->BodyMassIndex->IsDetailKey && EmptyValue($this->BodyMassIndex->FormValue)) {
                $this->BodyMassIndex->addErrorMessage(str_replace("%s", $this->BodyMassIndex->caption(), $this->BodyMassIndex->RequiredErrorMessage));
            }
        }
        if ($this->ClinicalFindings->Required) {
            if (!$this->ClinicalFindings->IsDetailKey && EmptyValue($this->ClinicalFindings->FormValue)) {
                $this->ClinicalFindings->addErrorMessage(str_replace("%s", $this->ClinicalFindings->caption(), $this->ClinicalFindings->RequiredErrorMessage));
            }
        }
        if ($this->ClinicalDiagnosis->Required) {
            if (!$this->ClinicalDiagnosis->IsDetailKey && EmptyValue($this->ClinicalDiagnosis->FormValue)) {
                $this->ClinicalDiagnosis->addErrorMessage(str_replace("%s", $this->ClinicalDiagnosis->caption(), $this->ClinicalDiagnosis->RequiredErrorMessage));
            }
        }
        if ($this->AnticoagulantifAny->Required) {
            if (!$this->AnticoagulantifAny->IsDetailKey && EmptyValue($this->AnticoagulantifAny->FormValue)) {
                $this->AnticoagulantifAny->addErrorMessage(str_replace("%s", $this->AnticoagulantifAny->caption(), $this->AnticoagulantifAny->RequiredErrorMessage));
            }
        }
        if ($this->FoodAllergies->Required) {
            if (!$this->FoodAllergies->IsDetailKey && EmptyValue($this->FoodAllergies->FormValue)) {
                $this->FoodAllergies->addErrorMessage(str_replace("%s", $this->FoodAllergies->caption(), $this->FoodAllergies->RequiredErrorMessage));
            }
        }
        if ($this->GenericAllergies->Required) {
            if ($this->GenericAllergies->FormValue == "") {
                $this->GenericAllergies->addErrorMessage(str_replace("%s", $this->GenericAllergies->caption(), $this->GenericAllergies->RequiredErrorMessage));
            }
        }
        if ($this->GroupAllergies->Required) {
            if ($this->GroupAllergies->FormValue == "") {
                $this->GroupAllergies->addErrorMessage(str_replace("%s", $this->GroupAllergies->caption(), $this->GroupAllergies->RequiredErrorMessage));
            }
        }
        if ($this->Temp->Required) {
            if (!$this->Temp->IsDetailKey && EmptyValue($this->Temp->FormValue)) {
                $this->Temp->addErrorMessage(str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
            }
        }
        if ($this->Pulse->Required) {
            if (!$this->Pulse->IsDetailKey && EmptyValue($this->Pulse->FormValue)) {
                $this->Pulse->addErrorMessage(str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
            }
        }
        if ($this->BP->Required) {
            if (!$this->BP->IsDetailKey && EmptyValue($this->BP->FormValue)) {
                $this->BP->addErrorMessage(str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
            }
        }
        if ($this->PR->Required) {
            if (!$this->PR->IsDetailKey && EmptyValue($this->PR->FormValue)) {
                $this->PR->addErrorMessage(str_replace("%s", $this->PR->caption(), $this->PR->RequiredErrorMessage));
            }
        }
        if ($this->CNS->Required) {
            if (!$this->CNS->IsDetailKey && EmptyValue($this->CNS->FormValue)) {
                $this->CNS->addErrorMessage(str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
            }
        }
        if ($this->RSA->Required) {
            if (!$this->RSA->IsDetailKey && EmptyValue($this->RSA->FormValue)) {
                $this->RSA->addErrorMessage(str_replace("%s", $this->RSA->caption(), $this->RSA->RequiredErrorMessage));
            }
        }
        if ($this->CVS->Required) {
            if (!$this->CVS->IsDetailKey && EmptyValue($this->CVS->FormValue)) {
                $this->CVS->addErrorMessage(str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
            }
        }
        if ($this->PA->Required) {
            if (!$this->PA->IsDetailKey && EmptyValue($this->PA->FormValue)) {
                $this->PA->addErrorMessage(str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
            }
        }
        if ($this->PS->Required) {
            if (!$this->PS->IsDetailKey && EmptyValue($this->PS->FormValue)) {
                $this->PS->addErrorMessage(str_replace("%s", $this->PS->caption(), $this->PS->RequiredErrorMessage));
            }
        }
        if ($this->PV->Required) {
            if (!$this->PV->IsDetailKey && EmptyValue($this->PV->FormValue)) {
                $this->PV->addErrorMessage(str_replace("%s", $this->PV->caption(), $this->PV->RequiredErrorMessage));
            }
        }
        if ($this->clinicaldetails->Required) {
            if ($this->clinicaldetails->FormValue == "") {
                $this->clinicaldetails->addErrorMessage(str_replace("%s", $this->clinicaldetails->caption(), $this->clinicaldetails->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
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
        if ($this->PatientSearch->Required) {
            if (!$this->PatientSearch->IsDetailKey && EmptyValue($this->PatientSearch->FormValue)) {
                $this->PatientSearch->addErrorMessage(str_replace("%s", $this->PatientSearch->caption(), $this->PatientSearch->RequiredErrorMessage));
            }
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
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

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // HT
            $this->HT->setDbValueDef($rsnew, $this->HT->CurrentValue, null, $this->HT->ReadOnly);

            // WT
            $this->WT->setDbValueDef($rsnew, $this->WT->CurrentValue, null, $this->WT->ReadOnly);

            // SurfaceArea
            $this->SurfaceArea->setDbValueDef($rsnew, $this->SurfaceArea->CurrentValue, null, $this->SurfaceArea->ReadOnly);

            // BodyMassIndex
            $this->BodyMassIndex->setDbValueDef($rsnew, $this->BodyMassIndex->CurrentValue, null, $this->BodyMassIndex->ReadOnly);

            // ClinicalFindings
            $this->ClinicalFindings->setDbValueDef($rsnew, $this->ClinicalFindings->CurrentValue, null, $this->ClinicalFindings->ReadOnly);

            // ClinicalDiagnosis
            $this->ClinicalDiagnosis->setDbValueDef($rsnew, $this->ClinicalDiagnosis->CurrentValue, null, $this->ClinicalDiagnosis->ReadOnly);

            // AnticoagulantifAny
            $this->AnticoagulantifAny->setDbValueDef($rsnew, $this->AnticoagulantifAny->CurrentValue, null, $this->AnticoagulantifAny->ReadOnly);

            // FoodAllergies
            $this->FoodAllergies->setDbValueDef($rsnew, $this->FoodAllergies->CurrentValue, null, $this->FoodAllergies->ReadOnly);

            // GenericAllergies
            $this->GenericAllergies->setDbValueDef($rsnew, $this->GenericAllergies->CurrentValue, null, $this->GenericAllergies->ReadOnly);

            // GroupAllergies
            $this->GroupAllergies->setDbValueDef($rsnew, $this->GroupAllergies->CurrentValue, null, $this->GroupAllergies->ReadOnly);

            // Temp
            $this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, null, $this->Temp->ReadOnly);

            // Pulse
            $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, $this->Pulse->ReadOnly);

            // BP
            $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, $this->BP->ReadOnly);

            // PR
            $this->PR->setDbValueDef($rsnew, $this->PR->CurrentValue, null, $this->PR->ReadOnly);

            // CNS
            $this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, null, $this->CNS->ReadOnly);

            // RSA
            $this->RSA->setDbValueDef($rsnew, $this->RSA->CurrentValue, null, $this->RSA->ReadOnly);

            // CVS
            $this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, null, $this->CVS->ReadOnly);

            // PA
            $this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, null, $this->PA->ReadOnly);

            // PS
            $this->PS->setDbValueDef($rsnew, $this->PS->CurrentValue, null, $this->PS->ReadOnly);

            // PV
            $this->PV->setDbValueDef($rsnew, $this->PV->CurrentValue, null, $this->PV->ReadOnly);

            // clinicaldetails
            $this->clinicaldetails->setDbValueDef($rsnew, $this->clinicaldetails->CurrentValue, null, $this->clinicaldetails->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserName();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // PatientSearch
            $this->PatientSearch->setDbValueDef($rsnew, $this->PatientSearch->CurrentValue, "", $this->PatientSearch->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientVitalsList"), "", $this->TableVar, true);
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
                case "x_AnticoagulantifAny":
                    break;
                case "x_GenericAllergies":
                    break;
                case "x_GroupAllergies":
                    break;
                case "x_clinicaldetails":
                    break;
                case "x_status":
                    break;
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
