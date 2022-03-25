<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeCompanyLoansAdd extends EmployeeCompanyLoans
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_company_loans';

    // Page object name
    public $PageObjName = "EmployeeCompanyLoansAdd";

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

        // Table object (employee_company_loans)
        if (!isset($GLOBALS["employee_company_loans"]) || get_class($GLOBALS["employee_company_loans"]) == PROJECT_NAMESPACE . "employee_company_loans") {
            $GLOBALS["employee_company_loans"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_company_loans');
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
                $doc = new $class(Container("employee_company_loans"));
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
                    if ($pageName == "EmployeeCompanyLoansView") {
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
        $this->loan->setVisibility();
        $this->start_date->setVisibility();
        $this->last_installment_date->setVisibility();
        $this->period_months->setVisibility();
        $this->currency->setVisibility();
        $this->amount->setVisibility();
        $this->monthly_installment->setVisibility();
        $this->status->setVisibility();
        $this->details->setVisibility();
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
                    $this->terminate("EmployeeCompanyLoansList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeCompanyLoansList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeCompanyLoansView") {
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
        $this->loan->CurrentValue = null;
        $this->loan->OldValue = $this->loan->CurrentValue;
        $this->start_date->CurrentValue = null;
        $this->start_date->OldValue = $this->start_date->CurrentValue;
        $this->last_installment_date->CurrentValue = null;
        $this->last_installment_date->OldValue = $this->last_installment_date->CurrentValue;
        $this->period_months->CurrentValue = null;
        $this->period_months->OldValue = $this->period_months->CurrentValue;
        $this->currency->CurrentValue = null;
        $this->currency->OldValue = $this->currency->CurrentValue;
        $this->amount->CurrentValue = null;
        $this->amount->OldValue = $this->amount->CurrentValue;
        $this->monthly_installment->CurrentValue = null;
        $this->monthly_installment->OldValue = $this->monthly_installment->CurrentValue;
        $this->status->CurrentValue = "Approved";
        $this->details->CurrentValue = null;
        $this->details->OldValue = $this->details->CurrentValue;
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

        // Check field name 'loan' first before field var 'x_loan'
        $val = $CurrentForm->hasValue("loan") ? $CurrentForm->getValue("loan") : $CurrentForm->getValue("x_loan");
        if (!$this->loan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->loan->Visible = false; // Disable update for API request
            } else {
                $this->loan->setFormValue($val);
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

        // Check field name 'last_installment_date' first before field var 'x_last_installment_date'
        $val = $CurrentForm->hasValue("last_installment_date") ? $CurrentForm->getValue("last_installment_date") : $CurrentForm->getValue("x_last_installment_date");
        if (!$this->last_installment_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->last_installment_date->Visible = false; // Disable update for API request
            } else {
                $this->last_installment_date->setFormValue($val);
            }
            $this->last_installment_date->CurrentValue = UnFormatDateTime($this->last_installment_date->CurrentValue, 0);
        }

        // Check field name 'period_months' first before field var 'x_period_months'
        $val = $CurrentForm->hasValue("period_months") ? $CurrentForm->getValue("period_months") : $CurrentForm->getValue("x_period_months");
        if (!$this->period_months->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->period_months->Visible = false; // Disable update for API request
            } else {
                $this->period_months->setFormValue($val);
            }
        }

        // Check field name 'currency' first before field var 'x_currency'
        $val = $CurrentForm->hasValue("currency") ? $CurrentForm->getValue("currency") : $CurrentForm->getValue("x_currency");
        if (!$this->currency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->currency->Visible = false; // Disable update for API request
            } else {
                $this->currency->setFormValue($val);
            }
        }

        // Check field name 'amount' first before field var 'x_amount'
        $val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
        if (!$this->amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->amount->Visible = false; // Disable update for API request
            } else {
                $this->amount->setFormValue($val);
            }
        }

        // Check field name 'monthly_installment' first before field var 'x_monthly_installment'
        $val = $CurrentForm->hasValue("monthly_installment") ? $CurrentForm->getValue("monthly_installment") : $CurrentForm->getValue("x_monthly_installment");
        if (!$this->monthly_installment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->monthly_installment->Visible = false; // Disable update for API request
            } else {
                $this->monthly_installment->setFormValue($val);
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

        // Check field name 'details' first before field var 'x_details'
        $val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
        if (!$this->details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->details->Visible = false; // Disable update for API request
            } else {
                $this->details->setFormValue($val);
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
        $this->loan->CurrentValue = $this->loan->FormValue;
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
        $this->last_installment_date->CurrentValue = $this->last_installment_date->FormValue;
        $this->last_installment_date->CurrentValue = UnFormatDateTime($this->last_installment_date->CurrentValue, 0);
        $this->period_months->CurrentValue = $this->period_months->FormValue;
        $this->currency->CurrentValue = $this->currency->FormValue;
        $this->amount->CurrentValue = $this->amount->FormValue;
        $this->monthly_installment->CurrentValue = $this->monthly_installment->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->details->CurrentValue = $this->details->FormValue;
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
        $this->loan->setDbValue($row['loan']);
        $this->start_date->setDbValue($row['start_date']);
        $this->last_installment_date->setDbValue($row['last_installment_date']);
        $this->period_months->setDbValue($row['period_months']);
        $this->currency->setDbValue($row['currency']);
        $this->amount->setDbValue($row['amount']);
        $this->monthly_installment->setDbValue($row['monthly_installment']);
        $this->status->setDbValue($row['status']);
        $this->details->setDbValue($row['details']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee'] = $this->employee->CurrentValue;
        $row['loan'] = $this->loan->CurrentValue;
        $row['start_date'] = $this->start_date->CurrentValue;
        $row['last_installment_date'] = $this->last_installment_date->CurrentValue;
        $row['period_months'] = $this->period_months->CurrentValue;
        $row['currency'] = $this->currency->CurrentValue;
        $row['amount'] = $this->amount->CurrentValue;
        $row['monthly_installment'] = $this->monthly_installment->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['details'] = $this->details->CurrentValue;
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
        if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue))) {
            $this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->monthly_installment->FormValue == $this->monthly_installment->CurrentValue && is_numeric(ConvertToFloatString($this->monthly_installment->CurrentValue))) {
            $this->monthly_installment->CurrentValue = ConvertToFloatString($this->monthly_installment->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // employee

        // loan

        // start_date

        // last_installment_date

        // period_months

        // currency

        // amount

        // monthly_installment

        // status

        // details
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee
            $this->employee->ViewValue = $this->employee->CurrentValue;
            $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
            $this->employee->ViewCustomAttributes = "";

            // loan
            $this->loan->ViewValue = $this->loan->CurrentValue;
            $this->loan->ViewValue = FormatNumber($this->loan->ViewValue, 0, -2, -2, -2);
            $this->loan->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
            $this->start_date->ViewCustomAttributes = "";

            // last_installment_date
            $this->last_installment_date->ViewValue = $this->last_installment_date->CurrentValue;
            $this->last_installment_date->ViewValue = FormatDateTime($this->last_installment_date->ViewValue, 0);
            $this->last_installment_date->ViewCustomAttributes = "";

            // period_months
            $this->period_months->ViewValue = $this->period_months->CurrentValue;
            $this->period_months->ViewValue = FormatNumber($this->period_months->ViewValue, 0, -2, -2, -2);
            $this->period_months->ViewCustomAttributes = "";

            // currency
            $this->currency->ViewValue = $this->currency->CurrentValue;
            $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
            $this->currency->ViewCustomAttributes = "";

            // amount
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";

            // monthly_installment
            $this->monthly_installment->ViewValue = $this->monthly_installment->CurrentValue;
            $this->monthly_installment->ViewValue = FormatNumber($this->monthly_installment->ViewValue, 2, -2, -2, -2);
            $this->monthly_installment->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // details
            $this->details->ViewValue = $this->details->CurrentValue;
            $this->details->ViewCustomAttributes = "";

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";
            $this->employee->TooltipValue = "";

            // loan
            $this->loan->LinkCustomAttributes = "";
            $this->loan->HrefValue = "";
            $this->loan->TooltipValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // last_installment_date
            $this->last_installment_date->LinkCustomAttributes = "";
            $this->last_installment_date->HrefValue = "";
            $this->last_installment_date->TooltipValue = "";

            // period_months
            $this->period_months->LinkCustomAttributes = "";
            $this->period_months->HrefValue = "";
            $this->period_months->TooltipValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";
            $this->currency->TooltipValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";
            $this->amount->TooltipValue = "";

            // monthly_installment
            $this->monthly_installment->LinkCustomAttributes = "";
            $this->monthly_installment->HrefValue = "";
            $this->monthly_installment->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";
            $this->details->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // employee
            $this->employee->EditAttrs["class"] = "form-control";
            $this->employee->EditCustomAttributes = "";
            $this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
            $this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

            // loan
            $this->loan->EditAttrs["class"] = "form-control";
            $this->loan->EditCustomAttributes = "";
            $this->loan->EditValue = HtmlEncode($this->loan->CurrentValue);
            $this->loan->PlaceHolder = RemoveHtml($this->loan->caption());

            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 8));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // last_installment_date
            $this->last_installment_date->EditAttrs["class"] = "form-control";
            $this->last_installment_date->EditCustomAttributes = "";
            $this->last_installment_date->EditValue = HtmlEncode(FormatDateTime($this->last_installment_date->CurrentValue, 8));
            $this->last_installment_date->PlaceHolder = RemoveHtml($this->last_installment_date->caption());

            // period_months
            $this->period_months->EditAttrs["class"] = "form-control";
            $this->period_months->EditCustomAttributes = "";
            $this->period_months->EditValue = HtmlEncode($this->period_months->CurrentValue);
            $this->period_months->PlaceHolder = RemoveHtml($this->period_months->caption());

            // currency
            $this->currency->EditAttrs["class"] = "form-control";
            $this->currency->EditCustomAttributes = "";
            $this->currency->EditValue = HtmlEncode($this->currency->CurrentValue);
            $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
            if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
                $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
            }

            // monthly_installment
            $this->monthly_installment->EditAttrs["class"] = "form-control";
            $this->monthly_installment->EditCustomAttributes = "";
            $this->monthly_installment->EditValue = HtmlEncode($this->monthly_installment->CurrentValue);
            $this->monthly_installment->PlaceHolder = RemoveHtml($this->monthly_installment->caption());
            if (strval($this->monthly_installment->EditValue) != "" && is_numeric($this->monthly_installment->EditValue)) {
                $this->monthly_installment->EditValue = FormatNumber($this->monthly_installment->EditValue, -2, -2, -2, -2);
            }

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // details
            $this->details->EditAttrs["class"] = "form-control";
            $this->details->EditCustomAttributes = "";
            $this->details->EditValue = HtmlEncode($this->details->CurrentValue);
            $this->details->PlaceHolder = RemoveHtml($this->details->caption());

            // Add refer script

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";

            // loan
            $this->loan->LinkCustomAttributes = "";
            $this->loan->HrefValue = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // last_installment_date
            $this->last_installment_date->LinkCustomAttributes = "";
            $this->last_installment_date->HrefValue = "";

            // period_months
            $this->period_months->LinkCustomAttributes = "";
            $this->period_months->HrefValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";

            // monthly_installment
            $this->monthly_installment->LinkCustomAttributes = "";
            $this->monthly_installment->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";
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
        if ($this->loan->Required) {
            if (!$this->loan->IsDetailKey && EmptyValue($this->loan->FormValue)) {
                $this->loan->addErrorMessage(str_replace("%s", $this->loan->caption(), $this->loan->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->loan->FormValue)) {
            $this->loan->addErrorMessage($this->loan->getErrorMessage(false));
        }
        if ($this->start_date->Required) {
            if (!$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->start_date->FormValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if ($this->last_installment_date->Required) {
            if (!$this->last_installment_date->IsDetailKey && EmptyValue($this->last_installment_date->FormValue)) {
                $this->last_installment_date->addErrorMessage(str_replace("%s", $this->last_installment_date->caption(), $this->last_installment_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->last_installment_date->FormValue)) {
            $this->last_installment_date->addErrorMessage($this->last_installment_date->getErrorMessage(false));
        }
        if ($this->period_months->Required) {
            if (!$this->period_months->IsDetailKey && EmptyValue($this->period_months->FormValue)) {
                $this->period_months->addErrorMessage(str_replace("%s", $this->period_months->caption(), $this->period_months->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->period_months->FormValue)) {
            $this->period_months->addErrorMessage($this->period_months->getErrorMessage(false));
        }
        if ($this->currency->Required) {
            if (!$this->currency->IsDetailKey && EmptyValue($this->currency->FormValue)) {
                $this->currency->addErrorMessage(str_replace("%s", $this->currency->caption(), $this->currency->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->currency->FormValue)) {
            $this->currency->addErrorMessage($this->currency->getErrorMessage(false));
        }
        if ($this->amount->Required) {
            if (!$this->amount->IsDetailKey && EmptyValue($this->amount->FormValue)) {
                $this->amount->addErrorMessage(str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->amount->FormValue)) {
            $this->amount->addErrorMessage($this->amount->getErrorMessage(false));
        }
        if ($this->monthly_installment->Required) {
            if (!$this->monthly_installment->IsDetailKey && EmptyValue($this->monthly_installment->FormValue)) {
                $this->monthly_installment->addErrorMessage(str_replace("%s", $this->monthly_installment->caption(), $this->monthly_installment->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->monthly_installment->FormValue)) {
            $this->monthly_installment->addErrorMessage($this->monthly_installment->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->details->Required) {
            if (!$this->details->IsDetailKey && EmptyValue($this->details->FormValue)) {
                $this->details->addErrorMessage(str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
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

        // loan
        $this->loan->setDbValueDef($rsnew, $this->loan->CurrentValue, null, false);

        // start_date
        $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 0), CurrentDate(), false);

        // last_installment_date
        $this->last_installment_date->setDbValueDef($rsnew, UnFormatDateTime($this->last_installment_date->CurrentValue, 0), CurrentDate(), false);

        // period_months
        $this->period_months->setDbValueDef($rsnew, $this->period_months->CurrentValue, null, false);

        // currency
        $this->currency->setDbValueDef($rsnew, $this->currency->CurrentValue, null, false);

        // amount
        $this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, false);

        // monthly_installment
        $this->monthly_installment->setDbValueDef($rsnew, $this->monthly_installment->CurrentValue, 0, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, strval($this->status->CurrentValue) == "");

        // details
        $this->details->setDbValueDef($rsnew, $this->details->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeCompanyLoansList"), "", $this->TableVar, true);
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
