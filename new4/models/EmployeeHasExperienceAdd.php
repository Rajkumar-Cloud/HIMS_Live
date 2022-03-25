<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeHasExperienceAdd extends EmployeeHasExperience
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_has_experience';

    // Page object name
    public $PageObjName = "EmployeeHasExperienceAdd";

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

        // Table object (employee_has_experience)
        if (!isset($GLOBALS["employee_has_experience"]) || get_class($GLOBALS["employee_has_experience"]) == PROJECT_NAMESPACE . "employee_has_experience") {
            $GLOBALS["employee_has_experience"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_has_experience');
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
                $doc = new $class(Container("employee_has_experience"));
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
                    if ($pageName == "EmployeeHasExperienceView") {
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
        $this->employee_id->setVisibility();
        $this->working_at->setVisibility();
        $this->jobdescription->setVisibility();
        $this->role->setVisibility();
        $this->start_date->setVisibility();
        $this->end_date->setVisibility();
        $this->total_experience->setVisibility();
        $this->certificates->setVisibility();
        $this->_others->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
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
        $this->setupLookupOptions($this->status);

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
                    $this->terminate("EmployeeHasExperienceList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeHasExperienceList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeHasExperienceView") {
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
        $this->certificates->Upload->Index = $CurrentForm->Index;
        $this->certificates->Upload->uploadFile();
        $this->certificates->CurrentValue = $this->certificates->Upload->FileName;
        $this->_others->Upload->Index = $CurrentForm->Index;
        $this->_others->Upload->uploadFile();
        $this->_others->CurrentValue = $this->_others->Upload->FileName;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->employee_id->CurrentValue = null;
        $this->employee_id->OldValue = $this->employee_id->CurrentValue;
        $this->working_at->CurrentValue = null;
        $this->working_at->OldValue = $this->working_at->CurrentValue;
        $this->jobdescription->CurrentValue = null;
        $this->jobdescription->OldValue = $this->jobdescription->CurrentValue;
        $this->role->CurrentValue = null;
        $this->role->OldValue = $this->role->CurrentValue;
        $this->start_date->CurrentValue = null;
        $this->start_date->OldValue = $this->start_date->CurrentValue;
        $this->end_date->CurrentValue = null;
        $this->end_date->OldValue = $this->end_date->CurrentValue;
        $this->total_experience->CurrentValue = null;
        $this->total_experience->OldValue = $this->total_experience->CurrentValue;
        $this->certificates->Upload->DbValue = null;
        $this->certificates->OldValue = $this->certificates->Upload->DbValue;
        $this->certificates->CurrentValue = null; // Clear file related field
        $this->_others->Upload->DbValue = null;
        $this->_others->OldValue = $this->_others->Upload->DbValue;
        $this->_others->CurrentValue = null; // Clear file related field
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
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'employee_id' first before field var 'x_employee_id'
        $val = $CurrentForm->hasValue("employee_id") ? $CurrentForm->getValue("employee_id") : $CurrentForm->getValue("x_employee_id");
        if (!$this->employee_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employee_id->Visible = false; // Disable update for API request
            } else {
                $this->employee_id->setFormValue($val);
            }
        }

        // Check field name 'working_at' first before field var 'x_working_at'
        $val = $CurrentForm->hasValue("working_at") ? $CurrentForm->getValue("working_at") : $CurrentForm->getValue("x_working_at");
        if (!$this->working_at->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->working_at->Visible = false; // Disable update for API request
            } else {
                $this->working_at->setFormValue($val);
            }
        }

        // Check field name 'job description' first before field var 'x_jobdescription'
        $val = $CurrentForm->hasValue("job description") ? $CurrentForm->getValue("job description") : $CurrentForm->getValue("x_jobdescription");
        if (!$this->jobdescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->jobdescription->Visible = false; // Disable update for API request
            } else {
                $this->jobdescription->setFormValue($val);
            }
        }

        // Check field name 'role' first before field var 'x_role'
        $val = $CurrentForm->hasValue("role") ? $CurrentForm->getValue("role") : $CurrentForm->getValue("x_role");
        if (!$this->role->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->role->Visible = false; // Disable update for API request
            } else {
                $this->role->setFormValue($val);
            }
        }

        // Check field name 'start_date' first before field var 'x_start_date'
        $val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
        if (!$this->start_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_date->Visible = false; // Disable update for API request
            } else {
                $this->start_date->setFormValue($val);
            }
            $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
        }

        // Check field name 'end_date' first before field var 'x_end_date'
        $val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
        if (!$this->end_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_date->Visible = false; // Disable update for API request
            } else {
                $this->end_date->setFormValue($val);
            }
            $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
        }

        // Check field name 'total_experience' first before field var 'x_total_experience'
        $val = $CurrentForm->hasValue("total_experience") ? $CurrentForm->getValue("total_experience") : $CurrentForm->getValue("x_total_experience");
        if (!$this->total_experience->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->total_experience->Visible = false; // Disable update for API request
            } else {
                $this->total_experience->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->employee_id->CurrentValue = $this->employee_id->FormValue;
        $this->working_at->CurrentValue = $this->working_at->FormValue;
        $this->jobdescription->CurrentValue = $this->jobdescription->FormValue;
        $this->role->CurrentValue = $this->role->FormValue;
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
        $this->end_date->CurrentValue = $this->end_date->FormValue;
        $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
        $this->total_experience->CurrentValue = $this->total_experience->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
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
        $this->employee_id->setDbValue($row['employee_id']);
        $this->working_at->setDbValue($row['working_at']);
        $this->jobdescription->setDbValue($row['job description']);
        $this->role->setDbValue($row['role']);
        $this->start_date->setDbValue($row['start_date']);
        $this->end_date->setDbValue($row['end_date']);
        $this->total_experience->setDbValue($row['total_experience']);
        $this->certificates->Upload->DbValue = $row['certificates'];
        $this->certificates->setDbValue($this->certificates->Upload->DbValue);
        $this->_others->Upload->DbValue = $row['others'];
        $this->_others->setDbValue($this->_others->Upload->DbValue);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee_id'] = $this->employee_id->CurrentValue;
        $row['working_at'] = $this->working_at->CurrentValue;
        $row['job description'] = $this->jobdescription->CurrentValue;
        $row['role'] = $this->role->CurrentValue;
        $row['start_date'] = $this->start_date->CurrentValue;
        $row['end_date'] = $this->end_date->CurrentValue;
        $row['total_experience'] = $this->total_experience->CurrentValue;
        $row['certificates'] = $this->certificates->Upload->DbValue;
        $row['others'] = $this->_others->Upload->DbValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
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

        // employee_id

        // working_at

        // job description

        // role

        // start_date

        // end_date

        // total_experience

        // certificates

        // others

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
            $this->employee_id->ViewCustomAttributes = "";

            // working_at
            $this->working_at->ViewValue = $this->working_at->CurrentValue;
            $this->working_at->ViewCustomAttributes = "";

            // job description
            $this->jobdescription->ViewValue = $this->jobdescription->CurrentValue;
            $this->jobdescription->ViewCustomAttributes = "";

            // role
            $this->role->ViewValue = $this->role->CurrentValue;
            $this->role->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
            $this->start_date->ViewCustomAttributes = "";

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 0);
            $this->end_date->ViewCustomAttributes = "";

            // total_experience
            $this->total_experience->ViewValue = $this->total_experience->CurrentValue;
            $this->total_experience->ViewCustomAttributes = "";

            // certificates
            if (!EmptyValue($this->certificates->Upload->DbValue)) {
                $this->certificates->ImageWidth = 100;
                $this->certificates->ImageHeight = 100;
                $this->certificates->ImageAlt = $this->certificates->alt();
                $this->certificates->ViewValue = $this->certificates->Upload->DbValue;
            } else {
                $this->certificates->ViewValue = "";
            }
            $this->certificates->ViewCustomAttributes = "";

            // others
            if (!EmptyValue($this->_others->Upload->DbValue)) {
                $this->_others->ViewValue = $this->_others->Upload->DbValue;
            } else {
                $this->_others->ViewValue = "";
            }
            $this->_others->ViewCustomAttributes = "";

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
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";
            $this->employee_id->TooltipValue = "";

            // working_at
            $this->working_at->LinkCustomAttributes = "";
            $this->working_at->HrefValue = "";
            $this->working_at->TooltipValue = "";

            // job description
            $this->jobdescription->LinkCustomAttributes = "";
            $this->jobdescription->HrefValue = "";
            $this->jobdescription->TooltipValue = "";

            // role
            $this->role->LinkCustomAttributes = "";
            $this->role->HrefValue = "";
            $this->role->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";
            $this->end_date->TooltipValue = "";

            // total_experience
            $this->total_experience->LinkCustomAttributes = "";
            $this->total_experience->HrefValue = "";
            $this->total_experience->TooltipValue = "";

            // certificates
            $this->certificates->LinkCustomAttributes = "";
            if (!EmptyValue($this->certificates->Upload->DbValue)) {
                $this->certificates->HrefValue = "%u"; // Add prefix/suffix
                $this->certificates->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->certificates->HrefValue = FullUrl($this->certificates->HrefValue, "href");
                }
            } else {
                $this->certificates->HrefValue = "";
            }
            $this->certificates->ExportHrefValue = $this->certificates->UploadPath . $this->certificates->Upload->DbValue;
            $this->certificates->TooltipValue = "";
            if ($this->certificates->UseColorbox) {
                if (EmptyValue($this->certificates->TooltipValue)) {
                    $this->certificates->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->certificates->LinkAttrs["data-rel"] = "employee_has_experience_x_certificates";
                $this->certificates->LinkAttrs->appendClass("ew-lightbox");
            }

            // others
            $this->_others->LinkCustomAttributes = "";
            $this->_others->HrefValue = "";
            $this->_others->ExportHrefValue = $this->_others->UploadPath . $this->_others->Upload->DbValue;
            $this->_others->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // employee_id
            $this->employee_id->EditAttrs["class"] = "form-control";
            $this->employee_id->EditCustomAttributes = "";
            if ($this->employee_id->getSessionValue() != "") {
                $this->employee_id->CurrentValue = GetForeignKeyValue($this->employee_id->getSessionValue());
                $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
                $this->employee_id->ViewValue = FormatNumber($this->employee_id->ViewValue, 0, -2, -2, -2);
                $this->employee_id->ViewCustomAttributes = "";
            } else {
                $this->employee_id->EditValue = HtmlEncode($this->employee_id->CurrentValue);
                $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());
            }

            // working_at
            $this->working_at->EditAttrs["class"] = "form-control";
            $this->working_at->EditCustomAttributes = "";
            if (!$this->working_at->Raw) {
                $this->working_at->CurrentValue = HtmlDecode($this->working_at->CurrentValue);
            }
            $this->working_at->EditValue = HtmlEncode($this->working_at->CurrentValue);
            $this->working_at->PlaceHolder = RemoveHtml($this->working_at->caption());

            // job description
            $this->jobdescription->EditAttrs["class"] = "form-control";
            $this->jobdescription->EditCustomAttributes = "";
            if (!$this->jobdescription->Raw) {
                $this->jobdescription->CurrentValue = HtmlDecode($this->jobdescription->CurrentValue);
            }
            $this->jobdescription->EditValue = HtmlEncode($this->jobdescription->CurrentValue);
            $this->jobdescription->PlaceHolder = RemoveHtml($this->jobdescription->caption());

            // role
            $this->role->EditAttrs["class"] = "form-control";
            $this->role->EditCustomAttributes = "";
            if (!$this->role->Raw) {
                $this->role->CurrentValue = HtmlDecode($this->role->CurrentValue);
            }
            $this->role->EditValue = HtmlEncode($this->role->CurrentValue);
            $this->role->PlaceHolder = RemoveHtml($this->role->caption());

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 8));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 8));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // total_experience
            $this->total_experience->EditAttrs["class"] = "form-control";
            $this->total_experience->EditCustomAttributes = "";
            if (!$this->total_experience->Raw) {
                $this->total_experience->CurrentValue = HtmlDecode($this->total_experience->CurrentValue);
            }
            $this->total_experience->EditValue = HtmlEncode($this->total_experience->CurrentValue);
            $this->total_experience->PlaceHolder = RemoveHtml($this->total_experience->caption());

            // certificates
            $this->certificates->EditAttrs["class"] = "form-control";
            $this->certificates->EditCustomAttributes = "";
            if (!EmptyValue($this->certificates->Upload->DbValue)) {
                $this->certificates->ImageWidth = 100;
                $this->certificates->ImageHeight = 100;
                $this->certificates->ImageAlt = $this->certificates->alt();
                $this->certificates->EditValue = $this->certificates->Upload->DbValue;
            } else {
                $this->certificates->EditValue = "";
            }
            if (!EmptyValue($this->certificates->CurrentValue)) {
                $this->certificates->Upload->FileName = $this->certificates->CurrentValue;
            }
            if ($this->isShow() || $this->isCopy()) {
                RenderUploadField($this->certificates);
            }

            // others
            $this->_others->EditAttrs["class"] = "form-control";
            $this->_others->EditCustomAttributes = "";
            if (!EmptyValue($this->_others->Upload->DbValue)) {
                $this->_others->EditValue = $this->_others->Upload->DbValue;
            } else {
                $this->_others->EditValue = "";
            }
            if (!EmptyValue($this->_others->CurrentValue)) {
                $this->_others->Upload->FileName = $this->_others->CurrentValue;
            }
            if ($this->isShow() || $this->isCopy()) {
                RenderUploadField($this->_others);
            }

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

            // createdby

            // createddatetime

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Add refer script

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";

            // working_at
            $this->working_at->LinkCustomAttributes = "";
            $this->working_at->HrefValue = "";

            // job description
            $this->jobdescription->LinkCustomAttributes = "";
            $this->jobdescription->HrefValue = "";

            // role
            $this->role->LinkCustomAttributes = "";
            $this->role->HrefValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";

            // total_experience
            $this->total_experience->LinkCustomAttributes = "";
            $this->total_experience->HrefValue = "";

            // certificates
            $this->certificates->LinkCustomAttributes = "";
            if (!EmptyValue($this->certificates->Upload->DbValue)) {
                $this->certificates->HrefValue = "%u"; // Add prefix/suffix
                $this->certificates->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->certificates->HrefValue = FullUrl($this->certificates->HrefValue, "href");
                }
            } else {
                $this->certificates->HrefValue = "";
            }
            $this->certificates->ExportHrefValue = $this->certificates->UploadPath . $this->certificates->Upload->DbValue;

            // others
            $this->_others->LinkCustomAttributes = "";
            $this->_others->HrefValue = "";
            $this->_others->ExportHrefValue = $this->_others->UploadPath . $this->_others->Upload->DbValue;

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

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
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->employee_id->Required) {
            if (!$this->employee_id->IsDetailKey && EmptyValue($this->employee_id->FormValue)) {
                $this->employee_id->addErrorMessage(str_replace("%s", $this->employee_id->caption(), $this->employee_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->employee_id->FormValue)) {
            $this->employee_id->addErrorMessage($this->employee_id->getErrorMessage(false));
        }
        if ($this->working_at->Required) {
            if (!$this->working_at->IsDetailKey && EmptyValue($this->working_at->FormValue)) {
                $this->working_at->addErrorMessage(str_replace("%s", $this->working_at->caption(), $this->working_at->RequiredErrorMessage));
            }
        }
        if ($this->jobdescription->Required) {
            if (!$this->jobdescription->IsDetailKey && EmptyValue($this->jobdescription->FormValue)) {
                $this->jobdescription->addErrorMessage(str_replace("%s", $this->jobdescription->caption(), $this->jobdescription->RequiredErrorMessage));
            }
        }
        if ($this->role->Required) {
            if (!$this->role->IsDetailKey && EmptyValue($this->role->FormValue)) {
                $this->role->addErrorMessage(str_replace("%s", $this->role->caption(), $this->role->RequiredErrorMessage));
            }
        }
        if ($this->start_date->Required) {
            if (!$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->start_date->FormValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if ($this->end_date->Required) {
            if (!$this->end_date->IsDetailKey && EmptyValue($this->end_date->FormValue)) {
                $this->end_date->addErrorMessage(str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->end_date->FormValue)) {
            $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
        }
        if ($this->total_experience->Required) {
            if (!$this->total_experience->IsDetailKey && EmptyValue($this->total_experience->FormValue)) {
                $this->total_experience->addErrorMessage(str_replace("%s", $this->total_experience->caption(), $this->total_experience->RequiredErrorMessage));
            }
        }
        if ($this->certificates->Required) {
            if ($this->certificates->Upload->FileName == "" && !$this->certificates->Upload->KeepFile) {
                $this->certificates->addErrorMessage(str_replace("%s", $this->certificates->caption(), $this->certificates->RequiredErrorMessage));
            }
        }
        if ($this->_others->Required) {
            if ($this->_others->Upload->FileName == "" && !$this->_others->Upload->KeepFile) {
                $this->_others->addErrorMessage(str_replace("%s", $this->_others->caption(), $this->_others->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
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

        // Check referential integrity for master table 'employee_has_experience'
        $validMasterRecord = true;
        $masterFilter = $this->sqlMasterFilter_employee();
        if (strval($this->employee_id->CurrentValue) != "") {
            $masterFilter = str_replace("@id@", AdjustSql($this->employee_id->CurrentValue, "DB"), $masterFilter);
        } else {
            $validMasterRecord = false;
        }
        if ($validMasterRecord) {
            $rsmaster = Container("employee")->loadRs($masterFilter)->fetch();
            $validMasterRecord = $rsmaster !== false;
        }
        if (!$validMasterRecord) {
            $relatedRecordMsg = str_replace("%t", "employee", $Language->phrase("RelatedRecordRequired"));
            $this->setFailureMessage($relatedRecordMsg);
            return false;
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // employee_id
        $this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, 0, false);

        // working_at
        $this->working_at->setDbValueDef($rsnew, $this->working_at->CurrentValue, "", false);

        // job description
        $this->jobdescription->setDbValueDef($rsnew, $this->jobdescription->CurrentValue, "", false);

        // role
        $this->role->setDbValueDef($rsnew, $this->role->CurrentValue, "", false);

        // start_date
        $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 0), null, false);

        // end_date
        $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 0), null, false);

        // total_experience
        $this->total_experience->setDbValueDef($rsnew, $this->total_experience->CurrentValue, "", false);

        // certificates
        if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
            $this->certificates->Upload->DbValue = ""; // No need to delete old file
            if ($this->certificates->Upload->FileName == "") {
                $rsnew['certificates'] = null;
            } else {
                $rsnew['certificates'] = $this->certificates->Upload->FileName;
            }
        }

        // others
        if ($this->_others->Visible && !$this->_others->Upload->KeepFile) {
            $this->_others->Upload->DbValue = ""; // No need to delete old file
            if ($this->_others->Upload->FileName == "") {
                $rsnew['others'] = null;
            } else {
                $rsnew['others'] = $this->_others->Upload->FileName;
            }
        }

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserID();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);
        if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
            $oldFiles = EmptyValue($this->certificates->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->certificates->htmlDecode(strval($this->certificates->Upload->DbValue)));
            if (!EmptyValue($this->certificates->Upload->FileName)) {
                $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), strval($this->certificates->Upload->FileName));
                $NewFileCount = count($newFiles);
                for ($i = 0; $i < $NewFileCount; $i++) {
                    if ($newFiles[$i] != "") {
                        $file = $newFiles[$i];
                        $tempPath = UploadTempPath($this->certificates, $this->certificates->Upload->Index);
                        if (file_exists($tempPath . $file)) {
                            if (Config("DELETE_UPLOADED_FILES")) {
                                $oldFileFound = false;
                                $oldFileCount = count($oldFiles);
                                for ($j = 0; $j < $oldFileCount; $j++) {
                                    $oldFile = $oldFiles[$j];
                                    if ($oldFile == $file) { // Old file found, no need to delete anymore
                                        array_splice($oldFiles, $j, 1);
                                        $oldFileFound = true;
                                        break;
                                    }
                                }
                                if ($oldFileFound) { // No need to check if file exists further
                                    continue;
                                }
                            }
                            $file1 = UniqueFilename($this->certificates->physicalUploadPath(), $file); // Get new file name
                            if ($file1 != $file) { // Rename temp file
                                while (file_exists($tempPath . $file1) || file_exists($this->certificates->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                    $file1 = UniqueFilename([$this->certificates->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                }
                                rename($tempPath . $file, $tempPath . $file1);
                                $newFiles[$i] = $file1;
                            }
                        }
                    }
                }
                $this->certificates->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                $this->certificates->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                $this->certificates->setDbValueDef($rsnew, $this->certificates->Upload->FileName, "", false);
            }
        }
        if ($this->_others->Visible && !$this->_others->Upload->KeepFile) {
            $oldFiles = EmptyValue($this->_others->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->_others->htmlDecode(strval($this->_others->Upload->DbValue)));
            if (!EmptyValue($this->_others->Upload->FileName)) {
                $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), strval($this->_others->Upload->FileName));
                $NewFileCount = count($newFiles);
                for ($i = 0; $i < $NewFileCount; $i++) {
                    if ($newFiles[$i] != "") {
                        $file = $newFiles[$i];
                        $tempPath = UploadTempPath($this->_others, $this->_others->Upload->Index);
                        if (file_exists($tempPath . $file)) {
                            if (Config("DELETE_UPLOADED_FILES")) {
                                $oldFileFound = false;
                                $oldFileCount = count($oldFiles);
                                for ($j = 0; $j < $oldFileCount; $j++) {
                                    $oldFile = $oldFiles[$j];
                                    if ($oldFile == $file) { // Old file found, no need to delete anymore
                                        array_splice($oldFiles, $j, 1);
                                        $oldFileFound = true;
                                        break;
                                    }
                                }
                                if ($oldFileFound) { // No need to check if file exists further
                                    continue;
                                }
                            }
                            $file1 = UniqueFilename($this->_others->physicalUploadPath(), $file); // Get new file name
                            if ($file1 != $file) { // Rename temp file
                                while (file_exists($tempPath . $file1) || file_exists($this->_others->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                    $file1 = UniqueFilename([$this->_others->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                }
                                rename($tempPath . $file, $tempPath . $file1);
                                $newFiles[$i] = $file1;
                            }
                        }
                    }
                }
                $this->_others->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                $this->_others->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                $this->_others->setDbValueDef($rsnew, $this->_others->Upload->FileName, "", false);
            }
        }

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
                if ($this->certificates->Visible && !$this->certificates->Upload->KeepFile) {
                    $oldFiles = EmptyValue($this->certificates->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->certificates->htmlDecode(strval($this->certificates->Upload->DbValue)));
                    if (!EmptyValue($this->certificates->Upload->FileName)) {
                        $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->certificates->Upload->FileName);
                        $newFiles2 = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->certificates->htmlDecode($rsnew['certificates']));
                        $newFileCount = count($newFiles);
                        for ($i = 0; $i < $newFileCount; $i++) {
                            if ($newFiles[$i] != "") {
                                $file = UploadTempPath($this->certificates, $this->certificates->Upload->Index) . $newFiles[$i];
                                if (file_exists($file)) {
                                    if (@$newFiles2[$i] != "") { // Use correct file name
                                        $newFiles[$i] = $newFiles2[$i];
                                    }
                                    if (!$this->certificates->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                        $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                        return false;
                                    }
                                }
                            }
                        }
                    } else {
                        $newFiles = [];
                    }
                    if (Config("DELETE_UPLOADED_FILES")) {
                        foreach ($oldFiles as $oldFile) {
                            if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                @unlink($this->certificates->oldPhysicalUploadPath() . $oldFile);
                            }
                        }
                    }
                }
                if ($this->_others->Visible && !$this->_others->Upload->KeepFile) {
                    $oldFiles = EmptyValue($this->_others->Upload->DbValue) ? [] : explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->_others->htmlDecode(strval($this->_others->Upload->DbValue)));
                    if (!EmptyValue($this->_others->Upload->FileName)) {
                        $newFiles = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->_others->Upload->FileName);
                        $newFiles2 = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $this->_others->htmlDecode($rsnew['others']));
                        $newFileCount = count($newFiles);
                        for ($i = 0; $i < $newFileCount; $i++) {
                            if ($newFiles[$i] != "") {
                                $file = UploadTempPath($this->_others, $this->_others->Upload->Index) . $newFiles[$i];
                                if (file_exists($file)) {
                                    if (@$newFiles2[$i] != "") { // Use correct file name
                                        $newFiles[$i] = $newFiles2[$i];
                                    }
                                    if (!$this->_others->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                        $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                        return false;
                                    }
                                }
                            }
                        }
                    } else {
                        $newFiles = [];
                    }
                    if (Config("DELETE_UPLOADED_FILES")) {
                        foreach ($oldFiles as $oldFile) {
                            if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                @unlink($this->_others->oldPhysicalUploadPath() . $oldFile);
                            }
                        }
                    }
                }
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
            // certificates
            CleanUploadTempPath($this->certificates, $this->certificates->Upload->Index);

            // others
            CleanUploadTempPath($this->_others, $this->_others->Upload->Index);
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
            if ($masterTblVar == "employee") {
                $validMaster = true;
                $masterTbl = Container("employee");
                if (($parm = Get("fk_id", Get("employee_id"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->employee_id->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->employee_id->setSessionValue($this->employee_id->QueryStringValue);
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
            if ($masterTblVar == "employee") {
                $validMaster = true;
                $masterTbl = Container("employee");
                if (($parm = Post("fk_id", Post("employee_id"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->employee_id->setFormValue($masterTbl->id->FormValue);
                    $this->employee_id->setSessionValue($this->employee_id->FormValue);
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

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "employee") {
                if ($this->employee_id->CurrentValue == "") {
                    $this->employee_id->setSessionValue("");
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeHasExperienceList"), "", $this->TableVar, true);
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
                case "x_status":
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
