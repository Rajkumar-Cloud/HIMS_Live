<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeLeavesAdd extends EmployeeLeaves
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_leaves';

    // Page object name
    public $PageObjName = "EmployeeLeavesAdd";

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

        // Table object (employee_leaves)
        if (!isset($GLOBALS["employee_leaves"]) || get_class($GLOBALS["employee_leaves"]) == PROJECT_NAMESPACE . "employee_leaves") {
            $GLOBALS["employee_leaves"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_leaves');
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
                $doc = new $class(Container("employee_leaves"));
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
                    if ($pageName == "EmployeeLeavesView") {
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
        $this->employee->setVisibility();
        $this->leave_type->setVisibility();
        $this->leave_period->setVisibility();
        $this->date_start->setVisibility();
        $this->date_end->setVisibility();
        $this->details->setVisibility();
        $this->status->setVisibility();
        $this->attachment->setVisibility();
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
                    $this->terminate("EmployeeLeavesList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeLeavesList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeLeavesView") {
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
        $this->employee->CurrentValue = null;
        $this->employee->OldValue = $this->employee->CurrentValue;
        $this->leave_type->CurrentValue = null;
        $this->leave_type->OldValue = $this->leave_type->CurrentValue;
        $this->leave_period->CurrentValue = null;
        $this->leave_period->OldValue = $this->leave_period->CurrentValue;
        $this->date_start->CurrentValue = null;
        $this->date_start->OldValue = $this->date_start->CurrentValue;
        $this->date_end->CurrentValue = null;
        $this->date_end->OldValue = $this->date_end->CurrentValue;
        $this->details->CurrentValue = null;
        $this->details->OldValue = $this->details->CurrentValue;
        $this->status->CurrentValue = "Pending";
        $this->attachment->CurrentValue = null;
        $this->attachment->OldValue = $this->attachment->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'employee' first before field var 'x_employee'
        $val = $CurrentForm->hasValue("employee") ? $CurrentForm->getValue("employee") : $CurrentForm->getValue("x_employee");
        if (!$this->employee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employee->Visible = false; // Disable update for API request
            } else {
                $this->employee->setFormValue($val);
            }
        }

        // Check field name 'leave_type' first before field var 'x_leave_type'
        $val = $CurrentForm->hasValue("leave_type") ? $CurrentForm->getValue("leave_type") : $CurrentForm->getValue("x_leave_type");
        if (!$this->leave_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leave_type->Visible = false; // Disable update for API request
            } else {
                $this->leave_type->setFormValue($val);
            }
        }

        // Check field name 'leave_period' first before field var 'x_leave_period'
        $val = $CurrentForm->hasValue("leave_period") ? $CurrentForm->getValue("leave_period") : $CurrentForm->getValue("x_leave_period");
        if (!$this->leave_period->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leave_period->Visible = false; // Disable update for API request
            } else {
                $this->leave_period->setFormValue($val);
            }
        }

        // Check field name 'date_start' first before field var 'x_date_start'
        $val = $CurrentForm->hasValue("date_start") ? $CurrentForm->getValue("date_start") : $CurrentForm->getValue("x_date_start");
        if (!$this->date_start->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->date_start->Visible = false; // Disable update for API request
            } else {
                $this->date_start->setFormValue($val);
            }
            $this->date_start->CurrentValue = UnFormatDateTime($this->date_start->CurrentValue, 0);
        }

        // Check field name 'date_end' first before field var 'x_date_end'
        $val = $CurrentForm->hasValue("date_end") ? $CurrentForm->getValue("date_end") : $CurrentForm->getValue("x_date_end");
        if (!$this->date_end->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->date_end->Visible = false; // Disable update for API request
            } else {
                $this->date_end->setFormValue($val);
            }
            $this->date_end->CurrentValue = UnFormatDateTime($this->date_end->CurrentValue, 0);
        }

        // Check field name 'details' first before field var 'x_details'
        $val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
        if (!$this->details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->details->Visible = false; // Disable update for API request
            } else {
                $this->details->setFormValue($val);
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

        // Check field name 'attachment' first before field var 'x_attachment'
        $val = $CurrentForm->hasValue("attachment") ? $CurrentForm->getValue("attachment") : $CurrentForm->getValue("x_attachment");
        if (!$this->attachment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment->Visible = false; // Disable update for API request
            } else {
                $this->attachment->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->employee->CurrentValue = $this->employee->FormValue;
        $this->leave_type->CurrentValue = $this->leave_type->FormValue;
        $this->leave_period->CurrentValue = $this->leave_period->FormValue;
        $this->date_start->CurrentValue = $this->date_start->FormValue;
        $this->date_start->CurrentValue = UnFormatDateTime($this->date_start->CurrentValue, 0);
        $this->date_end->CurrentValue = $this->date_end->FormValue;
        $this->date_end->CurrentValue = UnFormatDateTime($this->date_end->CurrentValue, 0);
        $this->details->CurrentValue = $this->details->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->attachment->CurrentValue = $this->attachment->FormValue;
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
        $this->employee->setDbValue($row['employee']);
        $this->leave_type->setDbValue($row['leave_type']);
        $this->leave_period->setDbValue($row['leave_period']);
        $this->date_start->setDbValue($row['date_start']);
        $this->date_end->setDbValue($row['date_end']);
        $this->details->setDbValue($row['details']);
        $this->status->setDbValue($row['status']);
        $this->attachment->setDbValue($row['attachment']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee'] = $this->employee->CurrentValue;
        $row['leave_type'] = $this->leave_type->CurrentValue;
        $row['leave_period'] = $this->leave_period->CurrentValue;
        $row['date_start'] = $this->date_start->CurrentValue;
        $row['date_end'] = $this->date_end->CurrentValue;
        $row['details'] = $this->details->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['attachment'] = $this->attachment->CurrentValue;
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

        // employee

        // leave_type

        // leave_period

        // date_start

        // date_end

        // details

        // status

        // attachment
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee
            $this->employee->ViewValue = $this->employee->CurrentValue;
            $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
            $this->employee->ViewCustomAttributes = "";

            // leave_type
            $this->leave_type->ViewValue = $this->leave_type->CurrentValue;
            $this->leave_type->ViewValue = FormatNumber($this->leave_type->ViewValue, 0, -2, -2, -2);
            $this->leave_type->ViewCustomAttributes = "";

            // leave_period
            $this->leave_period->ViewValue = $this->leave_period->CurrentValue;
            $this->leave_period->ViewValue = FormatNumber($this->leave_period->ViewValue, 0, -2, -2, -2);
            $this->leave_period->ViewCustomAttributes = "";

            // date_start
            $this->date_start->ViewValue = $this->date_start->CurrentValue;
            $this->date_start->ViewValue = FormatDateTime($this->date_start->ViewValue, 0);
            $this->date_start->ViewCustomAttributes = "";

            // date_end
            $this->date_end->ViewValue = $this->date_end->CurrentValue;
            $this->date_end->ViewValue = FormatDateTime($this->date_end->ViewValue, 0);
            $this->date_end->ViewCustomAttributes = "";

            // details
            $this->details->ViewValue = $this->details->CurrentValue;
            $this->details->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // attachment
            $this->attachment->ViewValue = $this->attachment->CurrentValue;
            $this->attachment->ViewCustomAttributes = "";

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";
            $this->employee->TooltipValue = "";

            // leave_type
            $this->leave_type->LinkCustomAttributes = "";
            $this->leave_type->HrefValue = "";
            $this->leave_type->TooltipValue = "";

            // leave_period
            $this->leave_period->LinkCustomAttributes = "";
            $this->leave_period->HrefValue = "";
            $this->leave_period->TooltipValue = "";

            // date_start
            $this->date_start->LinkCustomAttributes = "";
            $this->date_start->HrefValue = "";
            $this->date_start->TooltipValue = "";

            // date_end
            $this->date_end->LinkCustomAttributes = "";
            $this->date_end->HrefValue = "";
            $this->date_end->TooltipValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";
            $this->details->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";
            $this->attachment->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // employee
            $this->employee->EditAttrs["class"] = "form-control";
            $this->employee->EditCustomAttributes = "";
            $this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
            $this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

            // leave_type
            $this->leave_type->EditAttrs["class"] = "form-control";
            $this->leave_type->EditCustomAttributes = "";
            $this->leave_type->EditValue = HtmlEncode($this->leave_type->CurrentValue);
            $this->leave_type->PlaceHolder = RemoveHtml($this->leave_type->caption());

            // leave_period
            $this->leave_period->EditAttrs["class"] = "form-control";
            $this->leave_period->EditCustomAttributes = "";
            $this->leave_period->EditValue = HtmlEncode($this->leave_period->CurrentValue);
            $this->leave_period->PlaceHolder = RemoveHtml($this->leave_period->caption());

            // date_start
            $this->date_start->EditAttrs["class"] = "form-control";
            $this->date_start->EditCustomAttributes = "";
            $this->date_start->EditValue = HtmlEncode(FormatDateTime($this->date_start->CurrentValue, 8));
            $this->date_start->PlaceHolder = RemoveHtml($this->date_start->caption());

            // date_end
            $this->date_end->EditAttrs["class"] = "form-control";
            $this->date_end->EditCustomAttributes = "";
            $this->date_end->EditValue = HtmlEncode(FormatDateTime($this->date_end->CurrentValue, 8));
            $this->date_end->PlaceHolder = RemoveHtml($this->date_end->caption());

            // details
            $this->details->EditAttrs["class"] = "form-control";
            $this->details->EditCustomAttributes = "";
            $this->details->EditValue = HtmlEncode($this->details->CurrentValue);
            $this->details->PlaceHolder = RemoveHtml($this->details->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // attachment
            $this->attachment->EditAttrs["class"] = "form-control";
            $this->attachment->EditCustomAttributes = "";
            if (!$this->attachment->Raw) {
                $this->attachment->CurrentValue = HtmlDecode($this->attachment->CurrentValue);
            }
            $this->attachment->EditValue = HtmlEncode($this->attachment->CurrentValue);
            $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

            // Add refer script

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";

            // leave_type
            $this->leave_type->LinkCustomAttributes = "";
            $this->leave_type->HrefValue = "";

            // leave_period
            $this->leave_period->LinkCustomAttributes = "";
            $this->leave_period->HrefValue = "";

            // date_start
            $this->date_start->LinkCustomAttributes = "";
            $this->date_start->HrefValue = "";

            // date_end
            $this->date_end->LinkCustomAttributes = "";
            $this->date_end->HrefValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";
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
        if ($this->employee->Required) {
            if (!$this->employee->IsDetailKey && EmptyValue($this->employee->FormValue)) {
                $this->employee->addErrorMessage(str_replace("%s", $this->employee->caption(), $this->employee->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->employee->FormValue)) {
            $this->employee->addErrorMessage($this->employee->getErrorMessage(false));
        }
        if ($this->leave_type->Required) {
            if (!$this->leave_type->IsDetailKey && EmptyValue($this->leave_type->FormValue)) {
                $this->leave_type->addErrorMessage(str_replace("%s", $this->leave_type->caption(), $this->leave_type->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leave_type->FormValue)) {
            $this->leave_type->addErrorMessage($this->leave_type->getErrorMessage(false));
        }
        if ($this->leave_period->Required) {
            if (!$this->leave_period->IsDetailKey && EmptyValue($this->leave_period->FormValue)) {
                $this->leave_period->addErrorMessage(str_replace("%s", $this->leave_period->caption(), $this->leave_period->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leave_period->FormValue)) {
            $this->leave_period->addErrorMessage($this->leave_period->getErrorMessage(false));
        }
        if ($this->date_start->Required) {
            if (!$this->date_start->IsDetailKey && EmptyValue($this->date_start->FormValue)) {
                $this->date_start->addErrorMessage(str_replace("%s", $this->date_start->caption(), $this->date_start->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->date_start->FormValue)) {
            $this->date_start->addErrorMessage($this->date_start->getErrorMessage(false));
        }
        if ($this->date_end->Required) {
            if (!$this->date_end->IsDetailKey && EmptyValue($this->date_end->FormValue)) {
                $this->date_end->addErrorMessage(str_replace("%s", $this->date_end->caption(), $this->date_end->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->date_end->FormValue)) {
            $this->date_end->addErrorMessage($this->date_end->getErrorMessage(false));
        }
        if ($this->details->Required) {
            if (!$this->details->IsDetailKey && EmptyValue($this->details->FormValue)) {
                $this->details->addErrorMessage(str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->attachment->Required) {
            if (!$this->attachment->IsDetailKey && EmptyValue($this->attachment->FormValue)) {
                $this->attachment->addErrorMessage(str_replace("%s", $this->attachment->caption(), $this->attachment->RequiredErrorMessage));
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

        // employee
        $this->employee->setDbValueDef($rsnew, $this->employee->CurrentValue, 0, false);

        // leave_type
        $this->leave_type->setDbValueDef($rsnew, $this->leave_type->CurrentValue, 0, false);

        // leave_period
        $this->leave_period->setDbValueDef($rsnew, $this->leave_period->CurrentValue, 0, false);

        // date_start
        $this->date_start->setDbValueDef($rsnew, UnFormatDateTime($this->date_start->CurrentValue, 0), null, false);

        // date_end
        $this->date_end->setDbValueDef($rsnew, UnFormatDateTime($this->date_end->CurrentValue, 0), null, false);

        // details
        $this->details->setDbValueDef($rsnew, $this->details->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, strval($this->status->CurrentValue) == "");

        // attachment
        $this->attachment->setDbValueDef($rsnew, $this->attachment->CurrentValue, null, false);

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

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeLeavesList"), "", $this->TableVar, true);
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
