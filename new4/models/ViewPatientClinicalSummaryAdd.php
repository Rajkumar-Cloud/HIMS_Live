<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPatientClinicalSummaryAdd extends ViewPatientClinicalSummary
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_patient_clinical_summary';

    // Page object name
    public $PageObjName = "ViewPatientClinicalSummaryAdd";

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

        // Table object (view_patient_clinical_summary)
        if (!isset($GLOBALS["view_patient_clinical_summary"]) || get_class($GLOBALS["view_patient_clinical_summary"]) == PROJECT_NAMESPACE . "view_patient_clinical_summary") {
            $GLOBALS["view_patient_clinical_summary"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_patient_clinical_summary');
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
                $doc = new $class(Container("view_patient_clinical_summary"));
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
                    if ($pageName == "ViewPatientClinicalSummaryView") {
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
        $this->id->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->mrnNo->setVisibility();
        $this->patient_id->setVisibility();
        $this->patient_name->setVisibility();
        $this->profilePic->setVisibility();
        $this->gender->setVisibility();
        $this->age->setVisibility();
        $this->physician_id->setVisibility();
        $this->typeRegsisteration->setVisibility();
        $this->PaymentCategory->setVisibility();
        $this->admission_consultant_id->setVisibility();
        $this->leading_consultant_id->setVisibility();
        $this->cause->setVisibility();
        $this->admission_date->setVisibility();
        $this->release_date->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->provisional_diagnosis->setVisibility();
        $this->Treatments->setVisibility();
        $this->FinalDiagnosis->setVisibility();
        $this->courseinhospital->setVisibility();
        $this->procedurenotes->setVisibility();
        $this->conditionatdischarge->setVisibility();
        $this->BP->setVisibility();
        $this->Pulse->setVisibility();
        $this->Resp->setVisibility();
        $this->SPO2->setVisibility();
        $this->FollowupAdvice->setVisibility();
        $this->NextReviewDate->setVisibility();
        $this->History->setVisibility();
        $this->vitals->setVisibility();
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
                    $this->terminate("ViewPatientClinicalSummaryList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "ViewPatientClinicalSummaryList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "ViewPatientClinicalSummaryView") {
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
        $this->id->CurrentValue = 0;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->mrnNo->CurrentValue = null;
        $this->mrnNo->OldValue = $this->mrnNo->CurrentValue;
        $this->patient_id->CurrentValue = null;
        $this->patient_id->OldValue = $this->patient_id->CurrentValue;
        $this->patient_name->CurrentValue = null;
        $this->patient_name->OldValue = $this->patient_name->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->gender->CurrentValue = null;
        $this->gender->OldValue = $this->gender->CurrentValue;
        $this->age->CurrentValue = null;
        $this->age->OldValue = $this->age->CurrentValue;
        $this->physician_id->CurrentValue = null;
        $this->physician_id->OldValue = $this->physician_id->CurrentValue;
        $this->typeRegsisteration->CurrentValue = null;
        $this->typeRegsisteration->OldValue = $this->typeRegsisteration->CurrentValue;
        $this->PaymentCategory->CurrentValue = null;
        $this->PaymentCategory->OldValue = $this->PaymentCategory->CurrentValue;
        $this->admission_consultant_id->CurrentValue = null;
        $this->admission_consultant_id->OldValue = $this->admission_consultant_id->CurrentValue;
        $this->leading_consultant_id->CurrentValue = null;
        $this->leading_consultant_id->OldValue = $this->leading_consultant_id->CurrentValue;
        $this->cause->CurrentValue = null;
        $this->cause->OldValue = $this->cause->CurrentValue;
        $this->admission_date->CurrentValue = null;
        $this->admission_date->OldValue = $this->admission_date->CurrentValue;
        $this->release_date->CurrentValue = null;
        $this->release_date->OldValue = $this->release_date->CurrentValue;
        $this->PaymentStatus->CurrentValue = null;
        $this->PaymentStatus->OldValue = $this->PaymentStatus->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->provisional_diagnosis->CurrentValue = null;
        $this->provisional_diagnosis->OldValue = $this->provisional_diagnosis->CurrentValue;
        $this->Treatments->CurrentValue = null;
        $this->Treatments->OldValue = $this->Treatments->CurrentValue;
        $this->FinalDiagnosis->CurrentValue = null;
        $this->FinalDiagnosis->OldValue = $this->FinalDiagnosis->CurrentValue;
        $this->courseinhospital->CurrentValue = null;
        $this->courseinhospital->OldValue = $this->courseinhospital->CurrentValue;
        $this->procedurenotes->CurrentValue = null;
        $this->procedurenotes->OldValue = $this->procedurenotes->CurrentValue;
        $this->conditionatdischarge->CurrentValue = null;
        $this->conditionatdischarge->OldValue = $this->conditionatdischarge->CurrentValue;
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
        $this->History->CurrentValue = null;
        $this->History->OldValue = $this->History->CurrentValue;
        $this->vitals->CurrentValue = null;
        $this->vitals->OldValue = $this->vitals->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->id->Visible = false; // Disable update for API request
            } else {
                $this->id->setFormValue($val);
            }
        }

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
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

        // Check field name 'mrnNo' first before field var 'x_mrnNo'
        $val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
        if (!$this->mrnNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnNo->Visible = false; // Disable update for API request
            } else {
                $this->mrnNo->setFormValue($val);
            }
        }

        // Check field name 'patient_id' first before field var 'x_patient_id'
        $val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
        if (!$this->patient_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_id->Visible = false; // Disable update for API request
            } else {
                $this->patient_id->setFormValue($val);
            }
        }

        // Check field name 'patient_name' first before field var 'x_patient_name'
        $val = $CurrentForm->hasValue("patient_name") ? $CurrentForm->getValue("patient_name") : $CurrentForm->getValue("x_patient_name");
        if (!$this->patient_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_name->Visible = false; // Disable update for API request
            } else {
                $this->patient_name->setFormValue($val);
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

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'age' first before field var 'x_age'
        $val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
        if (!$this->age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->age->Visible = false; // Disable update for API request
            } else {
                $this->age->setFormValue($val);
            }
        }

        // Check field name 'physician_id' first before field var 'x_physician_id'
        $val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
        if (!$this->physician_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->physician_id->Visible = false; // Disable update for API request
            } else {
                $this->physician_id->setFormValue($val);
            }
        }

        // Check field name 'typeRegsisteration' first before field var 'x_typeRegsisteration'
        $val = $CurrentForm->hasValue("typeRegsisteration") ? $CurrentForm->getValue("typeRegsisteration") : $CurrentForm->getValue("x_typeRegsisteration");
        if (!$this->typeRegsisteration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->typeRegsisteration->Visible = false; // Disable update for API request
            } else {
                $this->typeRegsisteration->setFormValue($val);
            }
        }

        // Check field name 'PaymentCategory' first before field var 'x_PaymentCategory'
        $val = $CurrentForm->hasValue("PaymentCategory") ? $CurrentForm->getValue("PaymentCategory") : $CurrentForm->getValue("x_PaymentCategory");
        if (!$this->PaymentCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentCategory->Visible = false; // Disable update for API request
            } else {
                $this->PaymentCategory->setFormValue($val);
            }
        }

        // Check field name 'admission_consultant_id' first before field var 'x_admission_consultant_id'
        $val = $CurrentForm->hasValue("admission_consultant_id") ? $CurrentForm->getValue("admission_consultant_id") : $CurrentForm->getValue("x_admission_consultant_id");
        if (!$this->admission_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->admission_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'leading_consultant_id' first before field var 'x_leading_consultant_id'
        $val = $CurrentForm->hasValue("leading_consultant_id") ? $CurrentForm->getValue("leading_consultant_id") : $CurrentForm->getValue("x_leading_consultant_id");
        if (!$this->leading_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leading_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->leading_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'cause' first before field var 'x_cause'
        $val = $CurrentForm->hasValue("cause") ? $CurrentForm->getValue("cause") : $CurrentForm->getValue("x_cause");
        if (!$this->cause->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cause->Visible = false; // Disable update for API request
            } else {
                $this->cause->setFormValue($val);
            }
        }

        // Check field name 'admission_date' first before field var 'x_admission_date'
        $val = $CurrentForm->hasValue("admission_date") ? $CurrentForm->getValue("admission_date") : $CurrentForm->getValue("x_admission_date");
        if (!$this->admission_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_date->Visible = false; // Disable update for API request
            } else {
                $this->admission_date->setFormValue($val);
            }
            $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
        }

        // Check field name 'release_date' first before field var 'x_release_date'
        $val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
        if (!$this->release_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->release_date->Visible = false; // Disable update for API request
            } else {
                $this->release_date->setFormValue($val);
            }
            $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
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

        // Check field name 'provisional_diagnosis' first before field var 'x_provisional_diagnosis'
        $val = $CurrentForm->hasValue("provisional_diagnosis") ? $CurrentForm->getValue("provisional_diagnosis") : $CurrentForm->getValue("x_provisional_diagnosis");
        if (!$this->provisional_diagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->provisional_diagnosis->Visible = false; // Disable update for API request
            } else {
                $this->provisional_diagnosis->setFormValue($val);
            }
        }

        // Check field name 'Treatments' first before field var 'x_Treatments'
        $val = $CurrentForm->hasValue("Treatments") ? $CurrentForm->getValue("Treatments") : $CurrentForm->getValue("x_Treatments");
        if (!$this->Treatments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Treatments->Visible = false; // Disable update for API request
            } else {
                $this->Treatments->setFormValue($val);
            }
        }

        // Check field name 'FinalDiagnosis' first before field var 'x_FinalDiagnosis'
        $val = $CurrentForm->hasValue("FinalDiagnosis") ? $CurrentForm->getValue("FinalDiagnosis") : $CurrentForm->getValue("x_FinalDiagnosis");
        if (!$this->FinalDiagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FinalDiagnosis->Visible = false; // Disable update for API request
            } else {
                $this->FinalDiagnosis->setFormValue($val);
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
            $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
        }

        // Check field name 'History' first before field var 'x_History'
        $val = $CurrentForm->hasValue("History") ? $CurrentForm->getValue("History") : $CurrentForm->getValue("x_History");
        if (!$this->History->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->History->Visible = false; // Disable update for API request
            } else {
                $this->History->setFormValue($val);
            }
        }

        // Check field name 'vitals' first before field var 'x_vitals'
        $val = $CurrentForm->hasValue("vitals") ? $CurrentForm->getValue("vitals") : $CurrentForm->getValue("x_vitals");
        if (!$this->vitals->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitals->Visible = false; // Disable update for API request
            } else {
                $this->vitals->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
        $this->patient_id->CurrentValue = $this->patient_id->FormValue;
        $this->patient_name->CurrentValue = $this->patient_name->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->age->CurrentValue = $this->age->FormValue;
        $this->physician_id->CurrentValue = $this->physician_id->FormValue;
        $this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
        $this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
        $this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
        $this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
        $this->cause->CurrentValue = $this->cause->FormValue;
        $this->admission_date->CurrentValue = $this->admission_date->FormValue;
        $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
        $this->release_date->CurrentValue = $this->release_date->FormValue;
        $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->provisional_diagnosis->CurrentValue = $this->provisional_diagnosis->FormValue;
        $this->Treatments->CurrentValue = $this->Treatments->FormValue;
        $this->FinalDiagnosis->CurrentValue = $this->FinalDiagnosis->FormValue;
        $this->courseinhospital->CurrentValue = $this->courseinhospital->FormValue;
        $this->procedurenotes->CurrentValue = $this->procedurenotes->FormValue;
        $this->conditionatdischarge->CurrentValue = $this->conditionatdischarge->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->Resp->CurrentValue = $this->Resp->FormValue;
        $this->SPO2->CurrentValue = $this->SPO2->FormValue;
        $this->FollowupAdvice->CurrentValue = $this->FollowupAdvice->FormValue;
        $this->NextReviewDate->CurrentValue = $this->NextReviewDate->FormValue;
        $this->NextReviewDate->CurrentValue = UnFormatDateTime($this->NextReviewDate->CurrentValue, 0);
        $this->History->CurrentValue = $this->History->FormValue;
        $this->vitals->CurrentValue = $this->vitals->FormValue;
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->provisional_diagnosis->setDbValue($row['provisional_diagnosis']);
        $this->Treatments->setDbValue($row['Treatments']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->courseinhospital->setDbValue($row['courseinhospital']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->conditionatdischarge->setDbValue($row['conditionatdischarge']);
        $this->BP->setDbValue($row['BP']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->Resp->setDbValue($row['Resp']);
        $this->SPO2->setDbValue($row['SPO2']);
        $this->FollowupAdvice->setDbValue($row['FollowupAdvice']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->History->setDbValue($row['History']);
        $this->vitals->setDbValue($row['vitals']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['mrnNo'] = $this->mrnNo->CurrentValue;
        $row['patient_id'] = $this->patient_id->CurrentValue;
        $row['patient_name'] = $this->patient_name->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['gender'] = $this->gender->CurrentValue;
        $row['age'] = $this->age->CurrentValue;
        $row['physician_id'] = $this->physician_id->CurrentValue;
        $row['typeRegsisteration'] = $this->typeRegsisteration->CurrentValue;
        $row['PaymentCategory'] = $this->PaymentCategory->CurrentValue;
        $row['admission_consultant_id'] = $this->admission_consultant_id->CurrentValue;
        $row['leading_consultant_id'] = $this->leading_consultant_id->CurrentValue;
        $row['cause'] = $this->cause->CurrentValue;
        $row['admission_date'] = $this->admission_date->CurrentValue;
        $row['release_date'] = $this->release_date->CurrentValue;
        $row['PaymentStatus'] = $this->PaymentStatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['provisional_diagnosis'] = $this->provisional_diagnosis->CurrentValue;
        $row['Treatments'] = $this->Treatments->CurrentValue;
        $row['FinalDiagnosis'] = $this->FinalDiagnosis->CurrentValue;
        $row['courseinhospital'] = $this->courseinhospital->CurrentValue;
        $row['procedurenotes'] = $this->procedurenotes->CurrentValue;
        $row['conditionatdischarge'] = $this->conditionatdischarge->CurrentValue;
        $row['BP'] = $this->BP->CurrentValue;
        $row['Pulse'] = $this->Pulse->CurrentValue;
        $row['Resp'] = $this->Resp->CurrentValue;
        $row['SPO2'] = $this->SPO2->CurrentValue;
        $row['FollowupAdvice'] = $this->FollowupAdvice->CurrentValue;
        $row['NextReviewDate'] = $this->NextReviewDate->CurrentValue;
        $row['History'] = $this->History->CurrentValue;
        $row['vitals'] = $this->vitals->CurrentValue;
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

        // PatientID

        // HospID

        // mrnNo

        // patient_id

        // patient_name

        // profilePic

        // gender

        // age

        // physician_id

        // typeRegsisteration

        // PaymentCategory

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // provisional_diagnosis

        // Treatments

        // FinalDiagnosis

        // courseinhospital

        // procedurenotes

        // conditionatdischarge

        // BP

        // Pulse

        // Resp

        // SPO2

        // FollowupAdvice

        // NextReviewDate

        // History

        // vitals
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewValue = FormatNumber($this->id->ViewValue, 0, -2, -2, -2);
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
            $this->mrnNo->ViewCustomAttributes = "";

            // patient_id
            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
            $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
            $this->patient_id->ViewCustomAttributes = "";

            // patient_name
            $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
            $this->patient_name->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewCustomAttributes = "";

            // physician_id
            $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
            $this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
            $this->physician_id->ViewCustomAttributes = "";

            // typeRegsisteration
            $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
            $this->typeRegsisteration->ViewCustomAttributes = "";

            // PaymentCategory
            $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
            $this->PaymentCategory->ViewCustomAttributes = "";

            // admission_consultant_id
            $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
            $this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->admission_consultant_id->ViewCustomAttributes = "";

            // leading_consultant_id
            $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
            $this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->leading_consultant_id->ViewCustomAttributes = "";

            // cause
            $this->cause->ViewValue = $this->cause->CurrentValue;
            $this->cause->ViewCustomAttributes = "";

            // admission_date
            $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
            $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
            $this->admission_date->ViewCustomAttributes = "";

            // release_date
            $this->release_date->ViewValue = $this->release_date->CurrentValue;
            $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 0);
            $this->release_date->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
            $this->PaymentStatus->ViewCustomAttributes = "";

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

            // provisional_diagnosis
            $this->provisional_diagnosis->ViewValue = $this->provisional_diagnosis->CurrentValue;
            $this->provisional_diagnosis->ViewCustomAttributes = "";

            // Treatments
            $this->Treatments->ViewValue = $this->Treatments->CurrentValue;
            $this->Treatments->ViewCustomAttributes = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
            $this->FinalDiagnosis->ViewCustomAttributes = "";

            // courseinhospital
            $this->courseinhospital->ViewValue = $this->courseinhospital->CurrentValue;
            $this->courseinhospital->ViewCustomAttributes = "";

            // procedurenotes
            $this->procedurenotes->ViewValue = $this->procedurenotes->CurrentValue;
            $this->procedurenotes->ViewCustomAttributes = "";

            // conditionatdischarge
            $this->conditionatdischarge->ViewValue = $this->conditionatdischarge->CurrentValue;
            $this->conditionatdischarge->ViewCustomAttributes = "";

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
            $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 0);
            $this->NextReviewDate->ViewCustomAttributes = "";

            // History
            $this->History->ViewValue = $this->History->CurrentValue;
            $this->History->ViewCustomAttributes = "";

            // vitals
            $this->vitals->ViewValue = $this->vitals->CurrentValue;
            $this->vitals->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";
            $this->mrnNo->TooltipValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";
            $this->patient_name->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";
            $this->physician_id->TooltipValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";
            $this->typeRegsisteration->TooltipValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";
            $this->PaymentCategory->TooltipValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";
            $this->admission_consultant_id->TooltipValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";
            $this->leading_consultant_id->TooltipValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";
            $this->cause->TooltipValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";
            $this->admission_date->TooltipValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";
            $this->release_date->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

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

            // provisional_diagnosis
            $this->provisional_diagnosis->LinkCustomAttributes = "";
            $this->provisional_diagnosis->HrefValue = "";
            $this->provisional_diagnosis->TooltipValue = "";

            // Treatments
            $this->Treatments->LinkCustomAttributes = "";
            $this->Treatments->HrefValue = "";
            $this->Treatments->TooltipValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";
            $this->FinalDiagnosis->TooltipValue = "";

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

            // History
            $this->History->LinkCustomAttributes = "";
            $this->History->HrefValue = "";
            $this->History->TooltipValue = "";

            // vitals
            $this->vitals->LinkCustomAttributes = "";
            $this->vitals->HrefValue = "";
            $this->vitals->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->CurrentValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            if (!$this->HospID->Raw) {
                $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
            }
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // mrnNo
            $this->mrnNo->EditAttrs["class"] = "form-control";
            $this->mrnNo->EditCustomAttributes = "";
            if (!$this->mrnNo->Raw) {
                $this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
            }
            $this->mrnNo->EditValue = HtmlEncode($this->mrnNo->CurrentValue);
            $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

            // patient_id
            $this->patient_id->EditAttrs["class"] = "form-control";
            $this->patient_id->EditCustomAttributes = "";
            $this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
            $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

            // patient_name
            $this->patient_name->EditAttrs["class"] = "form-control";
            $this->patient_name->EditCustomAttributes = "";
            if (!$this->patient_name->Raw) {
                $this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
            }
            $this->patient_name->EditValue = HtmlEncode($this->patient_name->CurrentValue);
            $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            if (!$this->age->Raw) {
                $this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
            }
            $this->age->EditValue = HtmlEncode($this->age->CurrentValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // physician_id
            $this->physician_id->EditAttrs["class"] = "form-control";
            $this->physician_id->EditCustomAttributes = "";
            $this->physician_id->EditValue = HtmlEncode($this->physician_id->CurrentValue);
            $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

            // typeRegsisteration
            $this->typeRegsisteration->EditAttrs["class"] = "form-control";
            $this->typeRegsisteration->EditCustomAttributes = "";
            if (!$this->typeRegsisteration->Raw) {
                $this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
            }
            $this->typeRegsisteration->EditValue = HtmlEncode($this->typeRegsisteration->CurrentValue);
            $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

            // PaymentCategory
            $this->PaymentCategory->EditAttrs["class"] = "form-control";
            $this->PaymentCategory->EditCustomAttributes = "";
            if (!$this->PaymentCategory->Raw) {
                $this->PaymentCategory->CurrentValue = HtmlDecode($this->PaymentCategory->CurrentValue);
            }
            $this->PaymentCategory->EditValue = HtmlEncode($this->PaymentCategory->CurrentValue);
            $this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

            // admission_consultant_id
            $this->admission_consultant_id->EditAttrs["class"] = "form-control";
            $this->admission_consultant_id->EditCustomAttributes = "";
            $this->admission_consultant_id->EditValue = HtmlEncode($this->admission_consultant_id->CurrentValue);
            $this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

            // leading_consultant_id
            $this->leading_consultant_id->EditAttrs["class"] = "form-control";
            $this->leading_consultant_id->EditCustomAttributes = "";
            $this->leading_consultant_id->EditValue = HtmlEncode($this->leading_consultant_id->CurrentValue);
            $this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

            // cause
            $this->cause->EditAttrs["class"] = "form-control";
            $this->cause->EditCustomAttributes = "";
            $this->cause->EditValue = HtmlEncode($this->cause->CurrentValue);
            $this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

            // admission_date
            $this->admission_date->EditAttrs["class"] = "form-control";
            $this->admission_date->EditCustomAttributes = "";
            $this->admission_date->EditValue = HtmlEncode(FormatDateTime($this->admission_date->CurrentValue, 8));
            $this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

            // release_date
            $this->release_date->EditAttrs["class"] = "form-control";
            $this->release_date->EditCustomAttributes = "";
            $this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 8));
            $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

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

            // provisional_diagnosis
            $this->provisional_diagnosis->EditAttrs["class"] = "form-control";
            $this->provisional_diagnosis->EditCustomAttributes = "";
            $this->provisional_diagnosis->EditValue = HtmlEncode($this->provisional_diagnosis->CurrentValue);
            $this->provisional_diagnosis->PlaceHolder = RemoveHtml($this->provisional_diagnosis->caption());

            // Treatments
            $this->Treatments->EditAttrs["class"] = "form-control";
            $this->Treatments->EditCustomAttributes = "";
            $this->Treatments->EditValue = HtmlEncode($this->Treatments->CurrentValue);
            $this->Treatments->PlaceHolder = RemoveHtml($this->Treatments->caption());

            // FinalDiagnosis
            $this->FinalDiagnosis->EditAttrs["class"] = "form-control";
            $this->FinalDiagnosis->EditCustomAttributes = "";
            $this->FinalDiagnosis->EditValue = HtmlEncode($this->FinalDiagnosis->CurrentValue);
            $this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

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
            $this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime($this->NextReviewDate->CurrentValue, 8));
            $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

            // History
            $this->History->EditAttrs["class"] = "form-control";
            $this->History->EditCustomAttributes = "";
            $this->History->EditValue = HtmlEncode($this->History->CurrentValue);
            $this->History->PlaceHolder = RemoveHtml($this->History->caption());

            // vitals
            $this->vitals->EditAttrs["class"] = "form-control";
            $this->vitals->EditCustomAttributes = "";
            $this->vitals->EditValue = HtmlEncode($this->vitals->CurrentValue);
            $this->vitals->PlaceHolder = RemoveHtml($this->vitals->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

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

            // provisional_diagnosis
            $this->provisional_diagnosis->LinkCustomAttributes = "";
            $this->provisional_diagnosis->HrefValue = "";

            // Treatments
            $this->Treatments->LinkCustomAttributes = "";
            $this->Treatments->HrefValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";

            // courseinhospital
            $this->courseinhospital->LinkCustomAttributes = "";
            $this->courseinhospital->HrefValue = "";

            // procedurenotes
            $this->procedurenotes->LinkCustomAttributes = "";
            $this->procedurenotes->HrefValue = "";

            // conditionatdischarge
            $this->conditionatdischarge->LinkCustomAttributes = "";
            $this->conditionatdischarge->HrefValue = "";

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

            // History
            $this->History->LinkCustomAttributes = "";
            $this->History->HrefValue = "";

            // vitals
            $this->vitals->LinkCustomAttributes = "";
            $this->vitals->HrefValue = "";
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
        if (!CheckInteger($this->id->FormValue)) {
            $this->id->addErrorMessage($this->id->getErrorMessage(false));
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->mrnNo->Required) {
            if (!$this->mrnNo->IsDetailKey && EmptyValue($this->mrnNo->FormValue)) {
                $this->mrnNo->addErrorMessage(str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
            }
        }
        if ($this->patient_id->Required) {
            if (!$this->patient_id->IsDetailKey && EmptyValue($this->patient_id->FormValue)) {
                $this->patient_id->addErrorMessage(str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient_id->FormValue)) {
            $this->patient_id->addErrorMessage($this->patient_id->getErrorMessage(false));
        }
        if ($this->patient_name->Required) {
            if (!$this->patient_name->IsDetailKey && EmptyValue($this->patient_name->FormValue)) {
                $this->patient_name->addErrorMessage(str_replace("%s", $this->patient_name->caption(), $this->patient_name->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->age->Required) {
            if (!$this->age->IsDetailKey && EmptyValue($this->age->FormValue)) {
                $this->age->addErrorMessage(str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
            }
        }
        if ($this->physician_id->Required) {
            if (!$this->physician_id->IsDetailKey && EmptyValue($this->physician_id->FormValue)) {
                $this->physician_id->addErrorMessage(str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->physician_id->FormValue)) {
            $this->physician_id->addErrorMessage($this->physician_id->getErrorMessage(false));
        }
        if ($this->typeRegsisteration->Required) {
            if (!$this->typeRegsisteration->IsDetailKey && EmptyValue($this->typeRegsisteration->FormValue)) {
                $this->typeRegsisteration->addErrorMessage(str_replace("%s", $this->typeRegsisteration->caption(), $this->typeRegsisteration->RequiredErrorMessage));
            }
        }
        if ($this->PaymentCategory->Required) {
            if (!$this->PaymentCategory->IsDetailKey && EmptyValue($this->PaymentCategory->FormValue)) {
                $this->PaymentCategory->addErrorMessage(str_replace("%s", $this->PaymentCategory->caption(), $this->PaymentCategory->RequiredErrorMessage));
            }
        }
        if ($this->admission_consultant_id->Required) {
            if (!$this->admission_consultant_id->IsDetailKey && EmptyValue($this->admission_consultant_id->FormValue)) {
                $this->admission_consultant_id->addErrorMessage(str_replace("%s", $this->admission_consultant_id->caption(), $this->admission_consultant_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->admission_consultant_id->FormValue)) {
            $this->admission_consultant_id->addErrorMessage($this->admission_consultant_id->getErrorMessage(false));
        }
        if ($this->leading_consultant_id->Required) {
            if (!$this->leading_consultant_id->IsDetailKey && EmptyValue($this->leading_consultant_id->FormValue)) {
                $this->leading_consultant_id->addErrorMessage(str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leading_consultant_id->FormValue)) {
            $this->leading_consultant_id->addErrorMessage($this->leading_consultant_id->getErrorMessage(false));
        }
        if ($this->cause->Required) {
            if (!$this->cause->IsDetailKey && EmptyValue($this->cause->FormValue)) {
                $this->cause->addErrorMessage(str_replace("%s", $this->cause->caption(), $this->cause->RequiredErrorMessage));
            }
        }
        if ($this->admission_date->Required) {
            if (!$this->admission_date->IsDetailKey && EmptyValue($this->admission_date->FormValue)) {
                $this->admission_date->addErrorMessage(str_replace("%s", $this->admission_date->caption(), $this->admission_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->admission_date->FormValue)) {
            $this->admission_date->addErrorMessage($this->admission_date->getErrorMessage(false));
        }
        if ($this->release_date->Required) {
            if (!$this->release_date->IsDetailKey && EmptyValue($this->release_date->FormValue)) {
                $this->release_date->addErrorMessage(str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->release_date->FormValue)) {
            $this->release_date->addErrorMessage($this->release_date->getErrorMessage(false));
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PaymentStatus->FormValue)) {
            $this->PaymentStatus->addErrorMessage($this->PaymentStatus->getErrorMessage(false));
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
        if ($this->provisional_diagnosis->Required) {
            if (!$this->provisional_diagnosis->IsDetailKey && EmptyValue($this->provisional_diagnosis->FormValue)) {
                $this->provisional_diagnosis->addErrorMessage(str_replace("%s", $this->provisional_diagnosis->caption(), $this->provisional_diagnosis->RequiredErrorMessage));
            }
        }
        if ($this->Treatments->Required) {
            if (!$this->Treatments->IsDetailKey && EmptyValue($this->Treatments->FormValue)) {
                $this->Treatments->addErrorMessage(str_replace("%s", $this->Treatments->caption(), $this->Treatments->RequiredErrorMessage));
            }
        }
        if ($this->FinalDiagnosis->Required) {
            if (!$this->FinalDiagnosis->IsDetailKey && EmptyValue($this->FinalDiagnosis->FormValue)) {
                $this->FinalDiagnosis->addErrorMessage(str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
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
        if (!CheckDate($this->NextReviewDate->FormValue)) {
            $this->NextReviewDate->addErrorMessage($this->NextReviewDate->getErrorMessage(false));
        }
        if ($this->History->Required) {
            if (!$this->History->IsDetailKey && EmptyValue($this->History->FormValue)) {
                $this->History->addErrorMessage(str_replace("%s", $this->History->caption(), $this->History->RequiredErrorMessage));
            }
        }
        if ($this->vitals->Required) {
            if (!$this->vitals->IsDetailKey && EmptyValue($this->vitals->FormValue)) {
                $this->vitals->addErrorMessage(str_replace("%s", $this->vitals->caption(), $this->vitals->RequiredErrorMessage));
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

        // id
        $this->id->setDbValueDef($rsnew, $this->id->CurrentValue, 0, strval($this->id->CurrentValue) == "");

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // mrnNo
        $this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", false);

        // patient_id
        $this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, false);

        // patient_name
        $this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

        // gender
        $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, false);

        // age
        $this->age->setDbValueDef($rsnew, $this->age->CurrentValue, null, false);

        // physician_id
        $this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, null, false);

        // typeRegsisteration
        $this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, null, false);

        // PaymentCategory
        $this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, null, false);

        // admission_consultant_id
        $this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, null, false);

        // leading_consultant_id
        $this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, null, false);

        // cause
        $this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, null, false);

        // admission_date
        $this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 0), null, false);

        // release_date
        $this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 0), null, false);

        // PaymentStatus
        $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // provisional_diagnosis
        $this->provisional_diagnosis->setDbValueDef($rsnew, $this->provisional_diagnosis->CurrentValue, null, false);

        // Treatments
        $this->Treatments->setDbValueDef($rsnew, $this->Treatments->CurrentValue, null, false);

        // FinalDiagnosis
        $this->FinalDiagnosis->setDbValueDef($rsnew, $this->FinalDiagnosis->CurrentValue, null, false);

        // courseinhospital
        $this->courseinhospital->setDbValueDef($rsnew, $this->courseinhospital->CurrentValue, null, false);

        // procedurenotes
        $this->procedurenotes->setDbValueDef($rsnew, $this->procedurenotes->CurrentValue, null, false);

        // conditionatdischarge
        $this->conditionatdischarge->setDbValueDef($rsnew, $this->conditionatdischarge->CurrentValue, null, false);

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
        $this->NextReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->NextReviewDate->CurrentValue, 0), null, false);

        // History
        $this->History->setDbValueDef($rsnew, $this->History->CurrentValue, null, false);

        // vitals
        $this->vitals->setDbValueDef($rsnew, $this->vitals->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);

        // Check if key value entered
        if ($insertRow && $this->ValidateKey && strval($rsnew['id']) == "") {
            $this->setFailureMessage($Language->phrase("InvalidKeyValue"));
            $insertRow = false;
        }

        // Check for duplicate key
        if ($insertRow && $this->ValidateKey) {
            $filter = $this->getRecordFilter($rsnew);
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $keyErrMsg = str_replace("%f", $filter, $Language->phrase("DupKey"));
                $this->setFailureMessage($keyErrMsg);
                $insertRow = false;
            }
        }
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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ViewPatientClinicalSummaryList"), "", $this->TableVar, true);
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
