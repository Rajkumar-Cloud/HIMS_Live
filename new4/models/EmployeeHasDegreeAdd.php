<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeHasDegreeAdd extends EmployeeHasDegree
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_has_degree';

    // Page object name
    public $PageObjName = "EmployeeHasDegreeAdd";

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

        // Table object (employee_has_degree)
        if (!isset($GLOBALS["employee_has_degree"]) || get_class($GLOBALS["employee_has_degree"]) == PROJECT_NAMESPACE . "employee_has_degree") {
            $GLOBALS["employee_has_degree"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_has_degree');
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
                $doc = new $class(Container("employee_has_degree"));
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
                    if ($pageName == "EmployeeHasDegreeView") {
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
        $this->degree_id->setVisibility();
        $this->college_or_school->setVisibility();
        $this->university_or_board->setVisibility();
        $this->year_of_passing->setVisibility();
        $this->scoring_marks->setVisibility();
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
        $this->setupLookupOptions($this->degree_id);
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
                    $this->terminate("EmployeeHasDegreeList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeHasDegreeList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeHasDegreeView") {
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
        $this->degree_id->CurrentValue = null;
        $this->degree_id->OldValue = $this->degree_id->CurrentValue;
        $this->college_or_school->CurrentValue = null;
        $this->college_or_school->OldValue = $this->college_or_school->CurrentValue;
        $this->university_or_board->CurrentValue = null;
        $this->university_or_board->OldValue = $this->university_or_board->CurrentValue;
        $this->year_of_passing->CurrentValue = null;
        $this->year_of_passing->OldValue = $this->year_of_passing->CurrentValue;
        $this->scoring_marks->CurrentValue = null;
        $this->scoring_marks->OldValue = $this->scoring_marks->CurrentValue;
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

        // Check field name 'degree_id' first before field var 'x_degree_id'
        $val = $CurrentForm->hasValue("degree_id") ? $CurrentForm->getValue("degree_id") : $CurrentForm->getValue("x_degree_id");
        if (!$this->degree_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->degree_id->Visible = false; // Disable update for API request
            } else {
                $this->degree_id->setFormValue($val);
            }
        }

        // Check field name 'college_or_school' first before field var 'x_college_or_school'
        $val = $CurrentForm->hasValue("college_or_school") ? $CurrentForm->getValue("college_or_school") : $CurrentForm->getValue("x_college_or_school");
        if (!$this->college_or_school->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->college_or_school->Visible = false; // Disable update for API request
            } else {
                $this->college_or_school->setFormValue($val);
            }
        }

        // Check field name 'university_or_board' first before field var 'x_university_or_board'
        $val = $CurrentForm->hasValue("university_or_board") ? $CurrentForm->getValue("university_or_board") : $CurrentForm->getValue("x_university_or_board");
        if (!$this->university_or_board->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->university_or_board->Visible = false; // Disable update for API request
            } else {
                $this->university_or_board->setFormValue($val);
            }
        }

        // Check field name 'year_of_passing' first before field var 'x_year_of_passing'
        $val = $CurrentForm->hasValue("year_of_passing") ? $CurrentForm->getValue("year_of_passing") : $CurrentForm->getValue("x_year_of_passing");
        if (!$this->year_of_passing->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->year_of_passing->Visible = false; // Disable update for API request
            } else {
                $this->year_of_passing->setFormValue($val);
            }
        }

        // Check field name 'scoring_marks' first before field var 'x_scoring_marks'
        $val = $CurrentForm->hasValue("scoring_marks") ? $CurrentForm->getValue("scoring_marks") : $CurrentForm->getValue("x_scoring_marks");
        if (!$this->scoring_marks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scoring_marks->Visible = false; // Disable update for API request
            } else {
                $this->scoring_marks->setFormValue($val);
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
        $this->degree_id->CurrentValue = $this->degree_id->FormValue;
        $this->college_or_school->CurrentValue = $this->college_or_school->FormValue;
        $this->university_or_board->CurrentValue = $this->university_or_board->FormValue;
        $this->year_of_passing->CurrentValue = $this->year_of_passing->FormValue;
        $this->scoring_marks->CurrentValue = $this->scoring_marks->FormValue;
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
        $this->degree_id->setDbValue($row['degree_id']);
        $this->college_or_school->setDbValue($row['college_or_school']);
        $this->university_or_board->setDbValue($row['university_or_board']);
        $this->year_of_passing->setDbValue($row['year_of_passing']);
        $this->scoring_marks->setDbValue($row['scoring_marks']);
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
        $row['degree_id'] = $this->degree_id->CurrentValue;
        $row['college_or_school'] = $this->college_or_school->CurrentValue;
        $row['university_or_board'] = $this->university_or_board->CurrentValue;
        $row['year_of_passing'] = $this->year_of_passing->CurrentValue;
        $row['scoring_marks'] = $this->scoring_marks->CurrentValue;
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

        // degree_id

        // college_or_school

        // university_or_board

        // year_of_passing

        // scoring_marks

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

            // degree_id
            $curVal = trim(strval($this->degree_id->CurrentValue));
            if ($curVal != "") {
                $this->degree_id->ViewValue = $this->degree_id->lookupCacheOption($curVal);
                if ($this->degree_id->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->degree_id->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->degree_id->Lookup->renderViewRow($rswrk[0]);
                        $this->degree_id->ViewValue = $this->degree_id->displayValue($arwrk);
                    } else {
                        $this->degree_id->ViewValue = $this->degree_id->CurrentValue;
                    }
                }
            } else {
                $this->degree_id->ViewValue = null;
            }
            $this->degree_id->ViewCustomAttributes = "";

            // college_or_school
            $this->college_or_school->ViewValue = $this->college_or_school->CurrentValue;
            $this->college_or_school->ViewCustomAttributes = "";

            // university_or_board
            $this->university_or_board->ViewValue = $this->university_or_board->CurrentValue;
            $this->university_or_board->ViewCustomAttributes = "";

            // year_of_passing
            $this->year_of_passing->ViewValue = $this->year_of_passing->CurrentValue;
            $this->year_of_passing->ViewCustomAttributes = "";

            // scoring_marks
            $this->scoring_marks->ViewValue = $this->scoring_marks->CurrentValue;
            $this->scoring_marks->ViewCustomAttributes = "";

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

            // degree_id
            $this->degree_id->LinkCustomAttributes = "";
            $this->degree_id->HrefValue = "";
            $this->degree_id->TooltipValue = "";

            // college_or_school
            $this->college_or_school->LinkCustomAttributes = "";
            $this->college_or_school->HrefValue = "";
            $this->college_or_school->TooltipValue = "";

            // university_or_board
            $this->university_or_board->LinkCustomAttributes = "";
            $this->university_or_board->HrefValue = "";
            $this->university_or_board->TooltipValue = "";

            // year_of_passing
            $this->year_of_passing->LinkCustomAttributes = "";
            $this->year_of_passing->HrefValue = "";
            $this->year_of_passing->TooltipValue = "";

            // scoring_marks
            $this->scoring_marks->LinkCustomAttributes = "";
            $this->scoring_marks->HrefValue = "";
            $this->scoring_marks->TooltipValue = "";

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
                $this->certificates->LinkAttrs["data-rel"] = "employee_has_degree_x_certificates";
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

            // degree_id
            $this->degree_id->EditAttrs["class"] = "form-control";
            $this->degree_id->EditCustomAttributes = "";
            $curVal = trim(strval($this->degree_id->CurrentValue));
            if ($curVal != "") {
                $this->degree_id->ViewValue = $this->degree_id->lookupCacheOption($curVal);
            } else {
                $this->degree_id->ViewValue = $this->degree_id->Lookup !== null && is_array($this->degree_id->Lookup->Options) ? $curVal : null;
            }
            if ($this->degree_id->ViewValue !== null) { // Load from cache
                $this->degree_id->EditValue = array_values($this->degree_id->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->degree_id->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->degree_id->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->degree_id->EditValue = $arwrk;
            }
            $this->degree_id->PlaceHolder = RemoveHtml($this->degree_id->caption());

            // college_or_school
            $this->college_or_school->EditAttrs["class"] = "form-control";
            $this->college_or_school->EditCustomAttributes = "";
            if (!$this->college_or_school->Raw) {
                $this->college_or_school->CurrentValue = HtmlDecode($this->college_or_school->CurrentValue);
            }
            $this->college_or_school->EditValue = HtmlEncode($this->college_or_school->CurrentValue);
            $this->college_or_school->PlaceHolder = RemoveHtml($this->college_or_school->caption());

            // university_or_board
            $this->university_or_board->EditAttrs["class"] = "form-control";
            $this->university_or_board->EditCustomAttributes = "";
            if (!$this->university_or_board->Raw) {
                $this->university_or_board->CurrentValue = HtmlDecode($this->university_or_board->CurrentValue);
            }
            $this->university_or_board->EditValue = HtmlEncode($this->university_or_board->CurrentValue);
            $this->university_or_board->PlaceHolder = RemoveHtml($this->university_or_board->caption());

            // year_of_passing
            $this->year_of_passing->EditAttrs["class"] = "form-control";
            $this->year_of_passing->EditCustomAttributes = "";
            if (!$this->year_of_passing->Raw) {
                $this->year_of_passing->CurrentValue = HtmlDecode($this->year_of_passing->CurrentValue);
            }
            $this->year_of_passing->EditValue = HtmlEncode($this->year_of_passing->CurrentValue);
            $this->year_of_passing->PlaceHolder = RemoveHtml($this->year_of_passing->caption());

            // scoring_marks
            $this->scoring_marks->EditAttrs["class"] = "form-control";
            $this->scoring_marks->EditCustomAttributes = "";
            if (!$this->scoring_marks->Raw) {
                $this->scoring_marks->CurrentValue = HtmlDecode($this->scoring_marks->CurrentValue);
            }
            $this->scoring_marks->EditValue = HtmlEncode($this->scoring_marks->CurrentValue);
            $this->scoring_marks->PlaceHolder = RemoveHtml($this->scoring_marks->caption());

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

            // degree_id
            $this->degree_id->LinkCustomAttributes = "";
            $this->degree_id->HrefValue = "";

            // college_or_school
            $this->college_or_school->LinkCustomAttributes = "";
            $this->college_or_school->HrefValue = "";

            // university_or_board
            $this->university_or_board->LinkCustomAttributes = "";
            $this->university_or_board->HrefValue = "";

            // year_of_passing
            $this->year_of_passing->LinkCustomAttributes = "";
            $this->year_of_passing->HrefValue = "";

            // scoring_marks
            $this->scoring_marks->LinkCustomAttributes = "";
            $this->scoring_marks->HrefValue = "";

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
        if ($this->degree_id->Required) {
            if (!$this->degree_id->IsDetailKey && EmptyValue($this->degree_id->FormValue)) {
                $this->degree_id->addErrorMessage(str_replace("%s", $this->degree_id->caption(), $this->degree_id->RequiredErrorMessage));
            }
        }
        if ($this->college_or_school->Required) {
            if (!$this->college_or_school->IsDetailKey && EmptyValue($this->college_or_school->FormValue)) {
                $this->college_or_school->addErrorMessage(str_replace("%s", $this->college_or_school->caption(), $this->college_or_school->RequiredErrorMessage));
            }
        }
        if ($this->university_or_board->Required) {
            if (!$this->university_or_board->IsDetailKey && EmptyValue($this->university_or_board->FormValue)) {
                $this->university_or_board->addErrorMessage(str_replace("%s", $this->university_or_board->caption(), $this->university_or_board->RequiredErrorMessage));
            }
        }
        if ($this->year_of_passing->Required) {
            if (!$this->year_of_passing->IsDetailKey && EmptyValue($this->year_of_passing->FormValue)) {
                $this->year_of_passing->addErrorMessage(str_replace("%s", $this->year_of_passing->caption(), $this->year_of_passing->RequiredErrorMessage));
            }
        }
        if ($this->scoring_marks->Required) {
            if (!$this->scoring_marks->IsDetailKey && EmptyValue($this->scoring_marks->FormValue)) {
                $this->scoring_marks->addErrorMessage(str_replace("%s", $this->scoring_marks->caption(), $this->scoring_marks->RequiredErrorMessage));
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

        // Check referential integrity for master table 'employee_has_degree'
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

        // degree_id
        $this->degree_id->setDbValueDef($rsnew, $this->degree_id->CurrentValue, 0, false);

        // college_or_school
        $this->college_or_school->setDbValueDef($rsnew, $this->college_or_school->CurrentValue, "", false);

        // university_or_board
        $this->university_or_board->setDbValueDef($rsnew, $this->university_or_board->CurrentValue, "", false);

        // year_of_passing
        $this->year_of_passing->setDbValueDef($rsnew, $this->year_of_passing->CurrentValue, "", false);

        // scoring_marks
        $this->scoring_marks->setDbValueDef($rsnew, $this->scoring_marks->CurrentValue, "", false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeHasDegreeList"), "", $this->TableVar, true);
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
                case "x_degree_id":
                    break;
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
