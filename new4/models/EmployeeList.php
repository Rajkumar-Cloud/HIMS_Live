<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeList extends Employee
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee';

    // Page object name
    public $PageObjName = "EmployeeList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "femployeelist";
    public $FormActionName = "k_action";
    public $FormBlankRowName = "k_blankrow";
    public $FormKeyCountName = "key_count";

    // Page URLs
    public $AddUrl;
    public $EditUrl;
    public $CopyUrl;
    public $DeleteUrl;
    public $ViewUrl;
    public $ListUrl;

    // Export URLs
    public $ExportPrintUrl;
    public $ExportHtmlUrl;
    public $ExportExcelUrl;
    public $ExportWordUrl;
    public $ExportXmlUrl;
    public $ExportCsvUrl;
    public $ExportPdfUrl;

    // Custom export
    public $ExportExcelCustom = false;
    public $ExportWordCustom = false;
    public $ExportPdfCustom = false;
    public $ExportEmailCustom = false;

    // Update URLs
    public $InlineAddUrl;
    public $InlineCopyUrl;
    public $InlineEditUrl;
    public $GridAddUrl;
    public $GridEditUrl;
    public $MultiDeleteUrl;
    public $MultiUpdateUrl;

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

        // Table object (employee)
        if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
            $GLOBALS["employee"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Initialize URLs
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->AddUrl = "EmployeeAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "EmployeeDelete";
        $this->MultiUpdateUrl = "EmployeeUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");

        // List options
        $this->ListOptions = new ListOptions();
        $this->ListOptions->TableVar = $this->TableVar;

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Import options
        $this->ImportOptions = new ListOptions("div");
        $this->ImportOptions->TagClassName = "ew-import-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";

        // Filter options
        $this->FilterOptions = new ListOptions("div");
        $this->FilterOptions->TagClassName = "ew-filter-option femployeelistsrch";

        // List actions
        $this->ListActions = new ListActions();
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
                $doc = new $class(Container("employee"));
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
            SaveDebugMessage();
            Redirect(GetUrl($url));
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
                        if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0) {
                            $val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
                        }
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
        if ($this->isAddOrEdit()) {
            $this->status->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->HospID->Visible = false;
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

    // Class variables
    public $ListOptions; // List options
    public $ExportOptions; // Export options
    public $SearchOptions; // Search options
    public $OtherOptions; // Other options
    public $FilterOptions; // Filter options
    public $ImportOptions; // Import options
    public $ListActions; // List actions
    public $SelectedCount = 0;
    public $SelectedIndex = 0;
    public $DisplayRecords = 20;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
    public $DefaultSearchWhere = ""; // Default search WHERE clause
    public $SearchWhere = ""; // Search WHERE clause
    public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
    public $SearchRowCount = 0; // For extended search
    public $SearchColumnCount = 0; // For extended search
    public $SearchFieldsPerRow = 2; // For extended search
    public $RecordCount = 0; // Record count
    public $EditRowCount;
    public $StartRowCount = 1;
    public $RowCount = 0;
    public $Attrs = []; // Row attributes and cell attributes
    public $RowIndex = 0; // Row index
    public $KeyCount = 0; // Key count
    public $RowAction = ""; // Row action
    public $MultiColumnClass = "col-sm";
    public $MultiColumnEditClass = "w-100";
    public $DbMasterFilter = ""; // Master filter
    public $DbDetailFilter = ""; // Detail filter
    public $MasterRecordExists;
    public $MultiSelectKey;
    public $Command;
    public $RestoreSearch = false;
    public $HashValue; // Hash value
    public $DetailPages;
    public $OldRecordset;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

        // Get export parameters
        $custom = "";
        if (Param("export") !== null) {
            $this->Export = Param("export");
            $custom = Param("custom", "");
        } elseif (IsPost()) {
            if (Post("exporttype") !== null) {
                $this->Export = Post("exporttype");
            }
            $custom = Post("custom", "");
        } elseif (Get("cmd") == "json") {
            $this->Export = Get("cmd");
        } else {
            $this->setExportReturnUrl(CurrentUrl());
        }
        $ExportFileName = $this->TableVar; // Get export file, used in header

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

        // Update Export URLs
        if (Config("USE_PHPEXCEL")) {
            $this->ExportExcelCustom = false;
        }
        if (Config("USE_PHPWORD")) {
            $this->ExportWordCustom = false;
        }
        if ($this->ExportExcelCustom) {
            $this->ExportExcelUrl .= "&amp;custom=1";
        }
        if ($this->ExportWordCustom) {
            $this->ExportWordUrl .= "&amp;custom=1";
        }
        if ($this->ExportPdfCustom) {
            $this->ExportPdfUrl .= "&amp;custom=1";
        }
        $this->CurrentAction = Param("action"); // Set up current action

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();

        // Setup export options
        $this->setupExportOptions();
        $this->id->setVisibility();
        $this->employee_id->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->marital_status->setVisibility();
        $this->ssn_num->setVisibility();
        $this->nic_num->setVisibility();
        $this->other_id->setVisibility();
        $this->driving_license->setVisibility();
        $this->driving_license_exp_date->setVisibility();
        $this->employment_status->setVisibility();
        $this->job_title->setVisibility();
        $this->pay_grade->setVisibility();
        $this->work_station_id->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->work_phone->setVisibility();
        $this->work_email->setVisibility();
        $this->private_email->setVisibility();
        $this->joined_date->setVisibility();
        $this->confirmation_date->setVisibility();
        $this->supervisor->setVisibility();
        $this->indirect_supervisors->setVisibility();
        $this->department->setVisibility();
        $this->custom1->setVisibility();
        $this->custom2->setVisibility();
        $this->custom3->setVisibility();
        $this->custom4->setVisibility();
        $this->custom5->setVisibility();
        $this->custom6->setVisibility();
        $this->custom7->setVisibility();
        $this->custom8->setVisibility();
        $this->custom9->setVisibility();
        $this->custom10->setVisibility();
        $this->termination_date->setVisibility();
        $this->notes->Visible = false;
        $this->ethnicity->setVisibility();
        $this->immigration_status->setVisibility();
        $this->approver1->setVisibility();
        $this->approver2->setVisibility();
        $this->approver3->setVisibility();
        $this->status->setVisibility();
        $this->HospID->setVisibility();
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Setup other options
        $this->setupOtherOptions();

        // Set up custom action (compatible with old version)
        foreach ($this->CustomActions as $name => $action) {
            $this->ListActions->add($name, $action);
        }

        // Show checkbox column if multiple action
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
                $this->ListOptions["checkbox"]->Visible = true;
                break;
            }
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->nationality);
        $this->setupLookupOptions($this->approver1);
        $this->setupLookupOptions($this->approver2);
        $this->setupLookupOptions($this->approver3);
        $this->setupLookupOptions($this->status);

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Process list action first
            if ($this->processListAction()) { // Ajax request
                $this->terminate();
                return;
            }

            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

            // Set up Breadcrumb
            if (!$this->isExport()) {
                $this->setupBreadcrumb();
            }

            // Hide list options
            if ($this->isExport()) {
                $this->ListOptions->hideAllOptions(["sequence"]);
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            } elseif ($this->isGridAdd() || $this->isGridEdit()) {
                $this->ListOptions->hideAllOptions();
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            }

            // Hide options
            if ($this->isExport() || $this->CurrentAction) {
                $this->ExportOptions->hideAllOptions();
                $this->FilterOptions->hideAllOptions();
                $this->ImportOptions->hideAllOptions();
            }

            // Hide other options
            if ($this->isExport()) {
                $this->OtherOptions->hideAllOptions();
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));
            AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Get and validate search values for advanced search
            $this->loadSearchValues(); // Get search values

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }
            if (!$this->validateSearch()) {
                // Nothing to do
            }

            // Restore search parms from Session if not searching / reset / export
            if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms()) {
                $this->restoreSearchParms();
            }

            // Call Recordset SearchValidated event
            $this->recordsetSearchValidated();

            // Set up sorting order
            $this->setupSortOrder();

            // Get basic search criteria
            if (!$this->hasInvalidFields()) {
                $srchBasic = $this->basicSearchWhere();
            }

            // Get search criteria for advanced search
            if (!$this->hasInvalidFields()) {
                $srchAdvanced = $this->advancedSearchWhere();
            }
        }

        // Restore display records
        if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
            $this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
        } else {
            $this->DisplayRecords = 20; // Load default
            $this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
        }

        // Load Sorting Order
        if ($this->Command != "json") {
            $this->loadSortOrder();
        }

        // Load search default if no existing search criteria
        if (!$this->checkSearchParms()) {
            // Load basic search from default
            $this->BasicSearch->loadDefault();
            if ($this->BasicSearch->Keyword != "") {
                $srchBasic = $this->basicSearchWhere();
            }

            // Load advanced search from default
            if ($this->loadAdvancedSearchDefault()) {
                $srchAdvanced = $this->advancedSearchWhere();
            }
        }

        // Restore search settings from Session
        if (!$this->hasInvalidFields()) {
            $this->loadAdvancedSearch();
        }

        // Build search criteria
        AddFilter($this->SearchWhere, $srchAdvanced);
        AddFilter($this->SearchWhere, $srchBasic);

        // Call Recordset_Searching event
        $this->recordsetSearching($this->SearchWhere);

        // Save search criteria
        if ($this->Command == "search" && !$this->RestoreSearch) {
            $this->setSearchWhere($this->SearchWhere); // Save to Session
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->Command != "json") {
            $this->SearchWhere = $this->getSearchWhere();
        }

        // Build filter
        $filter = "";
        if (!$Security->canList()) {
            $filter = "(0=1)"; // Filter all records
        }
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }

        // Export data only
        if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
            $this->exportData();
            $this->terminate();
            return;
        }
        if ($this->isGridAdd()) {
            $this->CurrentFilter = "0=1";
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->GridAddRowCount;
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) { // Display all records
                $this->DisplayRecords = $this->TotalRecords;
            }
            if (!($this->isExport() && $this->ExportAll)) { // Set up start record position
                $this->setupStartRecord();
            }
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

            // Set no record found message
            if (!$this->CurrentAction && $this->TotalRecords == 0) {
                if (!$Security->canList()) {
                    $this->setWarningMessage(DeniedMessage());
                }
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search options
        $this->setupSearchOptions();

        // Set up search panel class
        if ($this->SearchWhere != "") {
            AppendClass($this->SearchPanelClass, "show");
        }

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset);
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
            $this->terminate(true);
            return;
        }

        // Set up pager
        $this->Pager = new NumericPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);

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

    // Set up number of records displayed per page
    protected function setupDisplayRecords()
    {
        $wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
        if ($wrk != "") {
            if (is_numeric($wrk)) {
                $this->DisplayRecords = (int)$wrk;
            } else {
                if (SameText($wrk, "all")) { // Display all records
                    $this->DisplayRecords = -1;
                } else {
                    $this->DisplayRecords = 20; // Non-numeric, load default
                }
            }
            $this->setRecordsPerPage($this->DisplayRecords); // Save to Session
            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Build filter for all keys
    protected function buildKeyFilter()
    {
        global $CurrentForm;
        $wrkFilter = "";

        // Update row index and get row key
        $rowindex = 1;
        $CurrentForm->Index = $rowindex;
        $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        while ($thisKey != "") {
            $this->setKey($thisKey);
            if ($this->OldKey != "") {
                $filter = $this->getRecordFilter();
                if ($wrkFilter != "") {
                    $wrkFilter .= " OR ";
                }
                $wrkFilter .= $filter;
            } else {
                $wrkFilter = "0=1";
                break;
            }

            // Update row index and get row key
            $rowindex++; // Next row
            $CurrentForm->Index = $rowindex;
            $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        }
        return $wrkFilter;
    }

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";

        // Load server side filters
        if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile)) {
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "femployeelistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->employee_id->AdvancedSearch->toJson(), ","); // Field employee_id
        $filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
        $filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
        $filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
        $filterList = Concat($filterList, $this->nationality->AdvancedSearch->toJson(), ","); // Field nationality
        $filterList = Concat($filterList, $this->birthday->AdvancedSearch->toJson(), ","); // Field birthday
        $filterList = Concat($filterList, $this->marital_status->AdvancedSearch->toJson(), ","); // Field marital_status
        $filterList = Concat($filterList, $this->ssn_num->AdvancedSearch->toJson(), ","); // Field ssn_num
        $filterList = Concat($filterList, $this->nic_num->AdvancedSearch->toJson(), ","); // Field nic_num
        $filterList = Concat($filterList, $this->other_id->AdvancedSearch->toJson(), ","); // Field other_id
        $filterList = Concat($filterList, $this->driving_license->AdvancedSearch->toJson(), ","); // Field driving_license
        $filterList = Concat($filterList, $this->driving_license_exp_date->AdvancedSearch->toJson(), ","); // Field driving_license_exp_date
        $filterList = Concat($filterList, $this->employment_status->AdvancedSearch->toJson(), ","); // Field employment_status
        $filterList = Concat($filterList, $this->job_title->AdvancedSearch->toJson(), ","); // Field job_title
        $filterList = Concat($filterList, $this->pay_grade->AdvancedSearch->toJson(), ","); // Field pay_grade
        $filterList = Concat($filterList, $this->work_station_id->AdvancedSearch->toJson(), ","); // Field work_station_id
        $filterList = Concat($filterList, $this->address1->AdvancedSearch->toJson(), ","); // Field address1
        $filterList = Concat($filterList, $this->address2->AdvancedSearch->toJson(), ","); // Field address2
        $filterList = Concat($filterList, $this->city->AdvancedSearch->toJson(), ","); // Field city
        $filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
        $filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
        $filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
        $filterList = Concat($filterList, $this->home_phone->AdvancedSearch->toJson(), ","); // Field home_phone
        $filterList = Concat($filterList, $this->mobile_phone->AdvancedSearch->toJson(), ","); // Field mobile_phone
        $filterList = Concat($filterList, $this->work_phone->AdvancedSearch->toJson(), ","); // Field work_phone
        $filterList = Concat($filterList, $this->work_email->AdvancedSearch->toJson(), ","); // Field work_email
        $filterList = Concat($filterList, $this->private_email->AdvancedSearch->toJson(), ","); // Field private_email
        $filterList = Concat($filterList, $this->joined_date->AdvancedSearch->toJson(), ","); // Field joined_date
        $filterList = Concat($filterList, $this->confirmation_date->AdvancedSearch->toJson(), ","); // Field confirmation_date
        $filterList = Concat($filterList, $this->supervisor->AdvancedSearch->toJson(), ","); // Field supervisor
        $filterList = Concat($filterList, $this->indirect_supervisors->AdvancedSearch->toJson(), ","); // Field indirect_supervisors
        $filterList = Concat($filterList, $this->department->AdvancedSearch->toJson(), ","); // Field department
        $filterList = Concat($filterList, $this->custom1->AdvancedSearch->toJson(), ","); // Field custom1
        $filterList = Concat($filterList, $this->custom2->AdvancedSearch->toJson(), ","); // Field custom2
        $filterList = Concat($filterList, $this->custom3->AdvancedSearch->toJson(), ","); // Field custom3
        $filterList = Concat($filterList, $this->custom4->AdvancedSearch->toJson(), ","); // Field custom4
        $filterList = Concat($filterList, $this->custom5->AdvancedSearch->toJson(), ","); // Field custom5
        $filterList = Concat($filterList, $this->custom6->AdvancedSearch->toJson(), ","); // Field custom6
        $filterList = Concat($filterList, $this->custom7->AdvancedSearch->toJson(), ","); // Field custom7
        $filterList = Concat($filterList, $this->custom8->AdvancedSearch->toJson(), ","); // Field custom8
        $filterList = Concat($filterList, $this->custom9->AdvancedSearch->toJson(), ","); // Field custom9
        $filterList = Concat($filterList, $this->custom10->AdvancedSearch->toJson(), ","); // Field custom10
        $filterList = Concat($filterList, $this->termination_date->AdvancedSearch->toJson(), ","); // Field termination_date
        $filterList = Concat($filterList, $this->notes->AdvancedSearch->toJson(), ","); // Field notes
        $filterList = Concat($filterList, $this->ethnicity->AdvancedSearch->toJson(), ","); // Field ethnicity
        $filterList = Concat($filterList, $this->immigration_status->AdvancedSearch->toJson(), ","); // Field immigration_status
        $filterList = Concat($filterList, $this->approver1->AdvancedSearch->toJson(), ","); // Field approver1
        $filterList = Concat($filterList, $this->approver2->AdvancedSearch->toJson(), ","); // Field approver2
        $filterList = Concat($filterList, $this->approver3->AdvancedSearch->toJson(), ","); // Field approver3
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        if ($this->BasicSearch->Keyword != "") {
            $wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
            $filterList = Concat($filterList, $wrk, ",");
        }

        // Return filter list in JSON
        if ($filterList != "") {
            $filterList = "\"data\":{" . $filterList . "}";
        }
        if ($savedFilterList != "") {
            $filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
        }
        return ($filterList != "") ? "{" . $filterList . "}" : "null";
    }

    // Process filter list
    protected function processFilterList()
    {
        global $UserProfile;
        if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
            $filters = Post("filters");
            $UserProfile->setSearchFilters(CurrentUserName(), "femployeelistsrch", $filters);
            WriteJson([["success" => true]]); // Success
            return true;
        } elseif (Post("cmd") == "resetfilter") {
            $this->restoreFilterList();
        }
        return false;
    }

    // Restore list of filters
    protected function restoreFilterList()
    {
        // Return if not reset filter
        if (Post("cmd") !== "resetfilter") {
            return false;
        }
        $filter = json_decode(Post("filter"), true);
        $this->Command = "search";

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field employee_id
        $this->employee_id->AdvancedSearch->SearchValue = @$filter["x_employee_id"];
        $this->employee_id->AdvancedSearch->SearchOperator = @$filter["z_employee_id"];
        $this->employee_id->AdvancedSearch->SearchCondition = @$filter["v_employee_id"];
        $this->employee_id->AdvancedSearch->SearchValue2 = @$filter["y_employee_id"];
        $this->employee_id->AdvancedSearch->SearchOperator2 = @$filter["w_employee_id"];
        $this->employee_id->AdvancedSearch->save();

        // Field first_name
        $this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
        $this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
        $this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
        $this->first_name->AdvancedSearch->save();

        // Field middle_name
        $this->middle_name->AdvancedSearch->SearchValue = @$filter["x_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator = @$filter["z_middle_name"];
        $this->middle_name->AdvancedSearch->SearchCondition = @$filter["v_middle_name"];
        $this->middle_name->AdvancedSearch->SearchValue2 = @$filter["y_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_middle_name"];
        $this->middle_name->AdvancedSearch->save();

        // Field last_name
        $this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
        $this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
        $this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
        $this->last_name->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();

        // Field nationality
        $this->nationality->AdvancedSearch->SearchValue = @$filter["x_nationality"];
        $this->nationality->AdvancedSearch->SearchOperator = @$filter["z_nationality"];
        $this->nationality->AdvancedSearch->SearchCondition = @$filter["v_nationality"];
        $this->nationality->AdvancedSearch->SearchValue2 = @$filter["y_nationality"];
        $this->nationality->AdvancedSearch->SearchOperator2 = @$filter["w_nationality"];
        $this->nationality->AdvancedSearch->save();

        // Field birthday
        $this->birthday->AdvancedSearch->SearchValue = @$filter["x_birthday"];
        $this->birthday->AdvancedSearch->SearchOperator = @$filter["z_birthday"];
        $this->birthday->AdvancedSearch->SearchCondition = @$filter["v_birthday"];
        $this->birthday->AdvancedSearch->SearchValue2 = @$filter["y_birthday"];
        $this->birthday->AdvancedSearch->SearchOperator2 = @$filter["w_birthday"];
        $this->birthday->AdvancedSearch->save();

        // Field marital_status
        $this->marital_status->AdvancedSearch->SearchValue = @$filter["x_marital_status"];
        $this->marital_status->AdvancedSearch->SearchOperator = @$filter["z_marital_status"];
        $this->marital_status->AdvancedSearch->SearchCondition = @$filter["v_marital_status"];
        $this->marital_status->AdvancedSearch->SearchValue2 = @$filter["y_marital_status"];
        $this->marital_status->AdvancedSearch->SearchOperator2 = @$filter["w_marital_status"];
        $this->marital_status->AdvancedSearch->save();

        // Field ssn_num
        $this->ssn_num->AdvancedSearch->SearchValue = @$filter["x_ssn_num"];
        $this->ssn_num->AdvancedSearch->SearchOperator = @$filter["z_ssn_num"];
        $this->ssn_num->AdvancedSearch->SearchCondition = @$filter["v_ssn_num"];
        $this->ssn_num->AdvancedSearch->SearchValue2 = @$filter["y_ssn_num"];
        $this->ssn_num->AdvancedSearch->SearchOperator2 = @$filter["w_ssn_num"];
        $this->ssn_num->AdvancedSearch->save();

        // Field nic_num
        $this->nic_num->AdvancedSearch->SearchValue = @$filter["x_nic_num"];
        $this->nic_num->AdvancedSearch->SearchOperator = @$filter["z_nic_num"];
        $this->nic_num->AdvancedSearch->SearchCondition = @$filter["v_nic_num"];
        $this->nic_num->AdvancedSearch->SearchValue2 = @$filter["y_nic_num"];
        $this->nic_num->AdvancedSearch->SearchOperator2 = @$filter["w_nic_num"];
        $this->nic_num->AdvancedSearch->save();

        // Field other_id
        $this->other_id->AdvancedSearch->SearchValue = @$filter["x_other_id"];
        $this->other_id->AdvancedSearch->SearchOperator = @$filter["z_other_id"];
        $this->other_id->AdvancedSearch->SearchCondition = @$filter["v_other_id"];
        $this->other_id->AdvancedSearch->SearchValue2 = @$filter["y_other_id"];
        $this->other_id->AdvancedSearch->SearchOperator2 = @$filter["w_other_id"];
        $this->other_id->AdvancedSearch->save();

        // Field driving_license
        $this->driving_license->AdvancedSearch->SearchValue = @$filter["x_driving_license"];
        $this->driving_license->AdvancedSearch->SearchOperator = @$filter["z_driving_license"];
        $this->driving_license->AdvancedSearch->SearchCondition = @$filter["v_driving_license"];
        $this->driving_license->AdvancedSearch->SearchValue2 = @$filter["y_driving_license"];
        $this->driving_license->AdvancedSearch->SearchOperator2 = @$filter["w_driving_license"];
        $this->driving_license->AdvancedSearch->save();

        // Field driving_license_exp_date
        $this->driving_license_exp_date->AdvancedSearch->SearchValue = @$filter["x_driving_license_exp_date"];
        $this->driving_license_exp_date->AdvancedSearch->SearchOperator = @$filter["z_driving_license_exp_date"];
        $this->driving_license_exp_date->AdvancedSearch->SearchCondition = @$filter["v_driving_license_exp_date"];
        $this->driving_license_exp_date->AdvancedSearch->SearchValue2 = @$filter["y_driving_license_exp_date"];
        $this->driving_license_exp_date->AdvancedSearch->SearchOperator2 = @$filter["w_driving_license_exp_date"];
        $this->driving_license_exp_date->AdvancedSearch->save();

        // Field employment_status
        $this->employment_status->AdvancedSearch->SearchValue = @$filter["x_employment_status"];
        $this->employment_status->AdvancedSearch->SearchOperator = @$filter["z_employment_status"];
        $this->employment_status->AdvancedSearch->SearchCondition = @$filter["v_employment_status"];
        $this->employment_status->AdvancedSearch->SearchValue2 = @$filter["y_employment_status"];
        $this->employment_status->AdvancedSearch->SearchOperator2 = @$filter["w_employment_status"];
        $this->employment_status->AdvancedSearch->save();

        // Field job_title
        $this->job_title->AdvancedSearch->SearchValue = @$filter["x_job_title"];
        $this->job_title->AdvancedSearch->SearchOperator = @$filter["z_job_title"];
        $this->job_title->AdvancedSearch->SearchCondition = @$filter["v_job_title"];
        $this->job_title->AdvancedSearch->SearchValue2 = @$filter["y_job_title"];
        $this->job_title->AdvancedSearch->SearchOperator2 = @$filter["w_job_title"];
        $this->job_title->AdvancedSearch->save();

        // Field pay_grade
        $this->pay_grade->AdvancedSearch->SearchValue = @$filter["x_pay_grade"];
        $this->pay_grade->AdvancedSearch->SearchOperator = @$filter["z_pay_grade"];
        $this->pay_grade->AdvancedSearch->SearchCondition = @$filter["v_pay_grade"];
        $this->pay_grade->AdvancedSearch->SearchValue2 = @$filter["y_pay_grade"];
        $this->pay_grade->AdvancedSearch->SearchOperator2 = @$filter["w_pay_grade"];
        $this->pay_grade->AdvancedSearch->save();

        // Field work_station_id
        $this->work_station_id->AdvancedSearch->SearchValue = @$filter["x_work_station_id"];
        $this->work_station_id->AdvancedSearch->SearchOperator = @$filter["z_work_station_id"];
        $this->work_station_id->AdvancedSearch->SearchCondition = @$filter["v_work_station_id"];
        $this->work_station_id->AdvancedSearch->SearchValue2 = @$filter["y_work_station_id"];
        $this->work_station_id->AdvancedSearch->SearchOperator2 = @$filter["w_work_station_id"];
        $this->work_station_id->AdvancedSearch->save();

        // Field address1
        $this->address1->AdvancedSearch->SearchValue = @$filter["x_address1"];
        $this->address1->AdvancedSearch->SearchOperator = @$filter["z_address1"];
        $this->address1->AdvancedSearch->SearchCondition = @$filter["v_address1"];
        $this->address1->AdvancedSearch->SearchValue2 = @$filter["y_address1"];
        $this->address1->AdvancedSearch->SearchOperator2 = @$filter["w_address1"];
        $this->address1->AdvancedSearch->save();

        // Field address2
        $this->address2->AdvancedSearch->SearchValue = @$filter["x_address2"];
        $this->address2->AdvancedSearch->SearchOperator = @$filter["z_address2"];
        $this->address2->AdvancedSearch->SearchCondition = @$filter["v_address2"];
        $this->address2->AdvancedSearch->SearchValue2 = @$filter["y_address2"];
        $this->address2->AdvancedSearch->SearchOperator2 = @$filter["w_address2"];
        $this->address2->AdvancedSearch->save();

        // Field city
        $this->city->AdvancedSearch->SearchValue = @$filter["x_city"];
        $this->city->AdvancedSearch->SearchOperator = @$filter["z_city"];
        $this->city->AdvancedSearch->SearchCondition = @$filter["v_city"];
        $this->city->AdvancedSearch->SearchValue2 = @$filter["y_city"];
        $this->city->AdvancedSearch->SearchOperator2 = @$filter["w_city"];
        $this->city->AdvancedSearch->save();

        // Field country
        $this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
        $this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
        $this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
        $this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
        $this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
        $this->country->AdvancedSearch->save();

        // Field province
        $this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
        $this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
        $this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
        $this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
        $this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
        $this->province->AdvancedSearch->save();

        // Field postal_code
        $this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
        $this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
        $this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
        $this->postal_code->AdvancedSearch->save();

        // Field home_phone
        $this->home_phone->AdvancedSearch->SearchValue = @$filter["x_home_phone"];
        $this->home_phone->AdvancedSearch->SearchOperator = @$filter["z_home_phone"];
        $this->home_phone->AdvancedSearch->SearchCondition = @$filter["v_home_phone"];
        $this->home_phone->AdvancedSearch->SearchValue2 = @$filter["y_home_phone"];
        $this->home_phone->AdvancedSearch->SearchOperator2 = @$filter["w_home_phone"];
        $this->home_phone->AdvancedSearch->save();

        // Field mobile_phone
        $this->mobile_phone->AdvancedSearch->SearchValue = @$filter["x_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchOperator = @$filter["z_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchCondition = @$filter["v_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchValue2 = @$filter["y_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->save();

        // Field work_phone
        $this->work_phone->AdvancedSearch->SearchValue = @$filter["x_work_phone"];
        $this->work_phone->AdvancedSearch->SearchOperator = @$filter["z_work_phone"];
        $this->work_phone->AdvancedSearch->SearchCondition = @$filter["v_work_phone"];
        $this->work_phone->AdvancedSearch->SearchValue2 = @$filter["y_work_phone"];
        $this->work_phone->AdvancedSearch->SearchOperator2 = @$filter["w_work_phone"];
        $this->work_phone->AdvancedSearch->save();

        // Field work_email
        $this->work_email->AdvancedSearch->SearchValue = @$filter["x_work_email"];
        $this->work_email->AdvancedSearch->SearchOperator = @$filter["z_work_email"];
        $this->work_email->AdvancedSearch->SearchCondition = @$filter["v_work_email"];
        $this->work_email->AdvancedSearch->SearchValue2 = @$filter["y_work_email"];
        $this->work_email->AdvancedSearch->SearchOperator2 = @$filter["w_work_email"];
        $this->work_email->AdvancedSearch->save();

        // Field private_email
        $this->private_email->AdvancedSearch->SearchValue = @$filter["x_private_email"];
        $this->private_email->AdvancedSearch->SearchOperator = @$filter["z_private_email"];
        $this->private_email->AdvancedSearch->SearchCondition = @$filter["v_private_email"];
        $this->private_email->AdvancedSearch->SearchValue2 = @$filter["y_private_email"];
        $this->private_email->AdvancedSearch->SearchOperator2 = @$filter["w_private_email"];
        $this->private_email->AdvancedSearch->save();

        // Field joined_date
        $this->joined_date->AdvancedSearch->SearchValue = @$filter["x_joined_date"];
        $this->joined_date->AdvancedSearch->SearchOperator = @$filter["z_joined_date"];
        $this->joined_date->AdvancedSearch->SearchCondition = @$filter["v_joined_date"];
        $this->joined_date->AdvancedSearch->SearchValue2 = @$filter["y_joined_date"];
        $this->joined_date->AdvancedSearch->SearchOperator2 = @$filter["w_joined_date"];
        $this->joined_date->AdvancedSearch->save();

        // Field confirmation_date
        $this->confirmation_date->AdvancedSearch->SearchValue = @$filter["x_confirmation_date"];
        $this->confirmation_date->AdvancedSearch->SearchOperator = @$filter["z_confirmation_date"];
        $this->confirmation_date->AdvancedSearch->SearchCondition = @$filter["v_confirmation_date"];
        $this->confirmation_date->AdvancedSearch->SearchValue2 = @$filter["y_confirmation_date"];
        $this->confirmation_date->AdvancedSearch->SearchOperator2 = @$filter["w_confirmation_date"];
        $this->confirmation_date->AdvancedSearch->save();

        // Field supervisor
        $this->supervisor->AdvancedSearch->SearchValue = @$filter["x_supervisor"];
        $this->supervisor->AdvancedSearch->SearchOperator = @$filter["z_supervisor"];
        $this->supervisor->AdvancedSearch->SearchCondition = @$filter["v_supervisor"];
        $this->supervisor->AdvancedSearch->SearchValue2 = @$filter["y_supervisor"];
        $this->supervisor->AdvancedSearch->SearchOperator2 = @$filter["w_supervisor"];
        $this->supervisor->AdvancedSearch->save();

        // Field indirect_supervisors
        $this->indirect_supervisors->AdvancedSearch->SearchValue = @$filter["x_indirect_supervisors"];
        $this->indirect_supervisors->AdvancedSearch->SearchOperator = @$filter["z_indirect_supervisors"];
        $this->indirect_supervisors->AdvancedSearch->SearchCondition = @$filter["v_indirect_supervisors"];
        $this->indirect_supervisors->AdvancedSearch->SearchValue2 = @$filter["y_indirect_supervisors"];
        $this->indirect_supervisors->AdvancedSearch->SearchOperator2 = @$filter["w_indirect_supervisors"];
        $this->indirect_supervisors->AdvancedSearch->save();

        // Field department
        $this->department->AdvancedSearch->SearchValue = @$filter["x_department"];
        $this->department->AdvancedSearch->SearchOperator = @$filter["z_department"];
        $this->department->AdvancedSearch->SearchCondition = @$filter["v_department"];
        $this->department->AdvancedSearch->SearchValue2 = @$filter["y_department"];
        $this->department->AdvancedSearch->SearchOperator2 = @$filter["w_department"];
        $this->department->AdvancedSearch->save();

        // Field custom1
        $this->custom1->AdvancedSearch->SearchValue = @$filter["x_custom1"];
        $this->custom1->AdvancedSearch->SearchOperator = @$filter["z_custom1"];
        $this->custom1->AdvancedSearch->SearchCondition = @$filter["v_custom1"];
        $this->custom1->AdvancedSearch->SearchValue2 = @$filter["y_custom1"];
        $this->custom1->AdvancedSearch->SearchOperator2 = @$filter["w_custom1"];
        $this->custom1->AdvancedSearch->save();

        // Field custom2
        $this->custom2->AdvancedSearch->SearchValue = @$filter["x_custom2"];
        $this->custom2->AdvancedSearch->SearchOperator = @$filter["z_custom2"];
        $this->custom2->AdvancedSearch->SearchCondition = @$filter["v_custom2"];
        $this->custom2->AdvancedSearch->SearchValue2 = @$filter["y_custom2"];
        $this->custom2->AdvancedSearch->SearchOperator2 = @$filter["w_custom2"];
        $this->custom2->AdvancedSearch->save();

        // Field custom3
        $this->custom3->AdvancedSearch->SearchValue = @$filter["x_custom3"];
        $this->custom3->AdvancedSearch->SearchOperator = @$filter["z_custom3"];
        $this->custom3->AdvancedSearch->SearchCondition = @$filter["v_custom3"];
        $this->custom3->AdvancedSearch->SearchValue2 = @$filter["y_custom3"];
        $this->custom3->AdvancedSearch->SearchOperator2 = @$filter["w_custom3"];
        $this->custom3->AdvancedSearch->save();

        // Field custom4
        $this->custom4->AdvancedSearch->SearchValue = @$filter["x_custom4"];
        $this->custom4->AdvancedSearch->SearchOperator = @$filter["z_custom4"];
        $this->custom4->AdvancedSearch->SearchCondition = @$filter["v_custom4"];
        $this->custom4->AdvancedSearch->SearchValue2 = @$filter["y_custom4"];
        $this->custom4->AdvancedSearch->SearchOperator2 = @$filter["w_custom4"];
        $this->custom4->AdvancedSearch->save();

        // Field custom5
        $this->custom5->AdvancedSearch->SearchValue = @$filter["x_custom5"];
        $this->custom5->AdvancedSearch->SearchOperator = @$filter["z_custom5"];
        $this->custom5->AdvancedSearch->SearchCondition = @$filter["v_custom5"];
        $this->custom5->AdvancedSearch->SearchValue2 = @$filter["y_custom5"];
        $this->custom5->AdvancedSearch->SearchOperator2 = @$filter["w_custom5"];
        $this->custom5->AdvancedSearch->save();

        // Field custom6
        $this->custom6->AdvancedSearch->SearchValue = @$filter["x_custom6"];
        $this->custom6->AdvancedSearch->SearchOperator = @$filter["z_custom6"];
        $this->custom6->AdvancedSearch->SearchCondition = @$filter["v_custom6"];
        $this->custom6->AdvancedSearch->SearchValue2 = @$filter["y_custom6"];
        $this->custom6->AdvancedSearch->SearchOperator2 = @$filter["w_custom6"];
        $this->custom6->AdvancedSearch->save();

        // Field custom7
        $this->custom7->AdvancedSearch->SearchValue = @$filter["x_custom7"];
        $this->custom7->AdvancedSearch->SearchOperator = @$filter["z_custom7"];
        $this->custom7->AdvancedSearch->SearchCondition = @$filter["v_custom7"];
        $this->custom7->AdvancedSearch->SearchValue2 = @$filter["y_custom7"];
        $this->custom7->AdvancedSearch->SearchOperator2 = @$filter["w_custom7"];
        $this->custom7->AdvancedSearch->save();

        // Field custom8
        $this->custom8->AdvancedSearch->SearchValue = @$filter["x_custom8"];
        $this->custom8->AdvancedSearch->SearchOperator = @$filter["z_custom8"];
        $this->custom8->AdvancedSearch->SearchCondition = @$filter["v_custom8"];
        $this->custom8->AdvancedSearch->SearchValue2 = @$filter["y_custom8"];
        $this->custom8->AdvancedSearch->SearchOperator2 = @$filter["w_custom8"];
        $this->custom8->AdvancedSearch->save();

        // Field custom9
        $this->custom9->AdvancedSearch->SearchValue = @$filter["x_custom9"];
        $this->custom9->AdvancedSearch->SearchOperator = @$filter["z_custom9"];
        $this->custom9->AdvancedSearch->SearchCondition = @$filter["v_custom9"];
        $this->custom9->AdvancedSearch->SearchValue2 = @$filter["y_custom9"];
        $this->custom9->AdvancedSearch->SearchOperator2 = @$filter["w_custom9"];
        $this->custom9->AdvancedSearch->save();

        // Field custom10
        $this->custom10->AdvancedSearch->SearchValue = @$filter["x_custom10"];
        $this->custom10->AdvancedSearch->SearchOperator = @$filter["z_custom10"];
        $this->custom10->AdvancedSearch->SearchCondition = @$filter["v_custom10"];
        $this->custom10->AdvancedSearch->SearchValue2 = @$filter["y_custom10"];
        $this->custom10->AdvancedSearch->SearchOperator2 = @$filter["w_custom10"];
        $this->custom10->AdvancedSearch->save();

        // Field termination_date
        $this->termination_date->AdvancedSearch->SearchValue = @$filter["x_termination_date"];
        $this->termination_date->AdvancedSearch->SearchOperator = @$filter["z_termination_date"];
        $this->termination_date->AdvancedSearch->SearchCondition = @$filter["v_termination_date"];
        $this->termination_date->AdvancedSearch->SearchValue2 = @$filter["y_termination_date"];
        $this->termination_date->AdvancedSearch->SearchOperator2 = @$filter["w_termination_date"];
        $this->termination_date->AdvancedSearch->save();

        // Field notes
        $this->notes->AdvancedSearch->SearchValue = @$filter["x_notes"];
        $this->notes->AdvancedSearch->SearchOperator = @$filter["z_notes"];
        $this->notes->AdvancedSearch->SearchCondition = @$filter["v_notes"];
        $this->notes->AdvancedSearch->SearchValue2 = @$filter["y_notes"];
        $this->notes->AdvancedSearch->SearchOperator2 = @$filter["w_notes"];
        $this->notes->AdvancedSearch->save();

        // Field ethnicity
        $this->ethnicity->AdvancedSearch->SearchValue = @$filter["x_ethnicity"];
        $this->ethnicity->AdvancedSearch->SearchOperator = @$filter["z_ethnicity"];
        $this->ethnicity->AdvancedSearch->SearchCondition = @$filter["v_ethnicity"];
        $this->ethnicity->AdvancedSearch->SearchValue2 = @$filter["y_ethnicity"];
        $this->ethnicity->AdvancedSearch->SearchOperator2 = @$filter["w_ethnicity"];
        $this->ethnicity->AdvancedSearch->save();

        // Field immigration_status
        $this->immigration_status->AdvancedSearch->SearchValue = @$filter["x_immigration_status"];
        $this->immigration_status->AdvancedSearch->SearchOperator = @$filter["z_immigration_status"];
        $this->immigration_status->AdvancedSearch->SearchCondition = @$filter["v_immigration_status"];
        $this->immigration_status->AdvancedSearch->SearchValue2 = @$filter["y_immigration_status"];
        $this->immigration_status->AdvancedSearch->SearchOperator2 = @$filter["w_immigration_status"];
        $this->immigration_status->AdvancedSearch->save();

        // Field approver1
        $this->approver1->AdvancedSearch->SearchValue = @$filter["x_approver1"];
        $this->approver1->AdvancedSearch->SearchOperator = @$filter["z_approver1"];
        $this->approver1->AdvancedSearch->SearchCondition = @$filter["v_approver1"];
        $this->approver1->AdvancedSearch->SearchValue2 = @$filter["y_approver1"];
        $this->approver1->AdvancedSearch->SearchOperator2 = @$filter["w_approver1"];
        $this->approver1->AdvancedSearch->save();

        // Field approver2
        $this->approver2->AdvancedSearch->SearchValue = @$filter["x_approver2"];
        $this->approver2->AdvancedSearch->SearchOperator = @$filter["z_approver2"];
        $this->approver2->AdvancedSearch->SearchCondition = @$filter["v_approver2"];
        $this->approver2->AdvancedSearch->SearchValue2 = @$filter["y_approver2"];
        $this->approver2->AdvancedSearch->SearchOperator2 = @$filter["w_approver2"];
        $this->approver2->AdvancedSearch->save();

        // Field approver3
        $this->approver3->AdvancedSearch->SearchValue = @$filter["x_approver3"];
        $this->approver3->AdvancedSearch->SearchOperator = @$filter["z_approver3"];
        $this->approver3->AdvancedSearch->SearchCondition = @$filter["v_approver3"];
        $this->approver3->AdvancedSearch->SearchValue2 = @$filter["y_approver3"];
        $this->approver3->AdvancedSearch->SearchOperator2 = @$filter["w_approver3"];
        $this->approver3->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Advanced search WHERE clause based on QueryString
    protected function advancedSearchWhere($default = false)
    {
        global $Security;
        $where = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $this->buildSearchSql($where, $this->id, $default, false); // id
        $this->buildSearchSql($where, $this->employee_id, $default, false); // employee_id
        $this->buildSearchSql($where, $this->first_name, $default, false); // first_name
        $this->buildSearchSql($where, $this->middle_name, $default, false); // middle_name
        $this->buildSearchSql($where, $this->last_name, $default, false); // last_name
        $this->buildSearchSql($where, $this->gender, $default, false); // gender
        $this->buildSearchSql($where, $this->nationality, $default, false); // nationality
        $this->buildSearchSql($where, $this->birthday, $default, false); // birthday
        $this->buildSearchSql($where, $this->marital_status, $default, false); // marital_status
        $this->buildSearchSql($where, $this->ssn_num, $default, false); // ssn_num
        $this->buildSearchSql($where, $this->nic_num, $default, false); // nic_num
        $this->buildSearchSql($where, $this->other_id, $default, false); // other_id
        $this->buildSearchSql($where, $this->driving_license, $default, false); // driving_license
        $this->buildSearchSql($where, $this->driving_license_exp_date, $default, false); // driving_license_exp_date
        $this->buildSearchSql($where, $this->employment_status, $default, false); // employment_status
        $this->buildSearchSql($where, $this->job_title, $default, false); // job_title
        $this->buildSearchSql($where, $this->pay_grade, $default, false); // pay_grade
        $this->buildSearchSql($where, $this->work_station_id, $default, false); // work_station_id
        $this->buildSearchSql($where, $this->address1, $default, false); // address1
        $this->buildSearchSql($where, $this->address2, $default, false); // address2
        $this->buildSearchSql($where, $this->city, $default, false); // city
        $this->buildSearchSql($where, $this->country, $default, false); // country
        $this->buildSearchSql($where, $this->province, $default, false); // province
        $this->buildSearchSql($where, $this->postal_code, $default, false); // postal_code
        $this->buildSearchSql($where, $this->home_phone, $default, false); // home_phone
        $this->buildSearchSql($where, $this->mobile_phone, $default, false); // mobile_phone
        $this->buildSearchSql($where, $this->work_phone, $default, false); // work_phone
        $this->buildSearchSql($where, $this->work_email, $default, false); // work_email
        $this->buildSearchSql($where, $this->private_email, $default, false); // private_email
        $this->buildSearchSql($where, $this->joined_date, $default, false); // joined_date
        $this->buildSearchSql($where, $this->confirmation_date, $default, false); // confirmation_date
        $this->buildSearchSql($where, $this->supervisor, $default, false); // supervisor
        $this->buildSearchSql($where, $this->indirect_supervisors, $default, false); // indirect_supervisors
        $this->buildSearchSql($where, $this->department, $default, false); // department
        $this->buildSearchSql($where, $this->custom1, $default, false); // custom1
        $this->buildSearchSql($where, $this->custom2, $default, false); // custom2
        $this->buildSearchSql($where, $this->custom3, $default, false); // custom3
        $this->buildSearchSql($where, $this->custom4, $default, false); // custom4
        $this->buildSearchSql($where, $this->custom5, $default, false); // custom5
        $this->buildSearchSql($where, $this->custom6, $default, false); // custom6
        $this->buildSearchSql($where, $this->custom7, $default, false); // custom7
        $this->buildSearchSql($where, $this->custom8, $default, false); // custom8
        $this->buildSearchSql($where, $this->custom9, $default, false); // custom9
        $this->buildSearchSql($where, $this->custom10, $default, false); // custom10
        $this->buildSearchSql($where, $this->termination_date, $default, false); // termination_date
        $this->buildSearchSql($where, $this->notes, $default, false); // notes
        $this->buildSearchSql($where, $this->ethnicity, $default, false); // ethnicity
        $this->buildSearchSql($where, $this->immigration_status, $default, false); // immigration_status
        $this->buildSearchSql($where, $this->approver1, $default, false); // approver1
        $this->buildSearchSql($where, $this->approver2, $default, false); // approver2
        $this->buildSearchSql($where, $this->approver3, $default, false); // approver3
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->employee_id->AdvancedSearch->save(); // employee_id
            $this->first_name->AdvancedSearch->save(); // first_name
            $this->middle_name->AdvancedSearch->save(); // middle_name
            $this->last_name->AdvancedSearch->save(); // last_name
            $this->gender->AdvancedSearch->save(); // gender
            $this->nationality->AdvancedSearch->save(); // nationality
            $this->birthday->AdvancedSearch->save(); // birthday
            $this->marital_status->AdvancedSearch->save(); // marital_status
            $this->ssn_num->AdvancedSearch->save(); // ssn_num
            $this->nic_num->AdvancedSearch->save(); // nic_num
            $this->other_id->AdvancedSearch->save(); // other_id
            $this->driving_license->AdvancedSearch->save(); // driving_license
            $this->driving_license_exp_date->AdvancedSearch->save(); // driving_license_exp_date
            $this->employment_status->AdvancedSearch->save(); // employment_status
            $this->job_title->AdvancedSearch->save(); // job_title
            $this->pay_grade->AdvancedSearch->save(); // pay_grade
            $this->work_station_id->AdvancedSearch->save(); // work_station_id
            $this->address1->AdvancedSearch->save(); // address1
            $this->address2->AdvancedSearch->save(); // address2
            $this->city->AdvancedSearch->save(); // city
            $this->country->AdvancedSearch->save(); // country
            $this->province->AdvancedSearch->save(); // province
            $this->postal_code->AdvancedSearch->save(); // postal_code
            $this->home_phone->AdvancedSearch->save(); // home_phone
            $this->mobile_phone->AdvancedSearch->save(); // mobile_phone
            $this->work_phone->AdvancedSearch->save(); // work_phone
            $this->work_email->AdvancedSearch->save(); // work_email
            $this->private_email->AdvancedSearch->save(); // private_email
            $this->joined_date->AdvancedSearch->save(); // joined_date
            $this->confirmation_date->AdvancedSearch->save(); // confirmation_date
            $this->supervisor->AdvancedSearch->save(); // supervisor
            $this->indirect_supervisors->AdvancedSearch->save(); // indirect_supervisors
            $this->department->AdvancedSearch->save(); // department
            $this->custom1->AdvancedSearch->save(); // custom1
            $this->custom2->AdvancedSearch->save(); // custom2
            $this->custom3->AdvancedSearch->save(); // custom3
            $this->custom4->AdvancedSearch->save(); // custom4
            $this->custom5->AdvancedSearch->save(); // custom5
            $this->custom6->AdvancedSearch->save(); // custom6
            $this->custom7->AdvancedSearch->save(); // custom7
            $this->custom8->AdvancedSearch->save(); // custom8
            $this->custom9->AdvancedSearch->save(); // custom9
            $this->custom10->AdvancedSearch->save(); // custom10
            $this->termination_date->AdvancedSearch->save(); // termination_date
            $this->notes->AdvancedSearch->save(); // notes
            $this->ethnicity->AdvancedSearch->save(); // ethnicity
            $this->immigration_status->AdvancedSearch->save(); // immigration_status
            $this->approver1->AdvancedSearch->save(); // approver1
            $this->approver2->AdvancedSearch->save(); // approver2
            $this->approver3->AdvancedSearch->save(); // approver3
            $this->status->AdvancedSearch->save(); // status
            $this->HospID->AdvancedSearch->save(); // HospID
        }
        return $where;
    }

    // Build search SQL
    protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
    {
        $fldParm = $fld->Param;
        $fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
        $fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
        $fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
        $fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
        $fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
        $wrk = "";
        if (is_array($fldVal)) {
            $fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
        }
        if (is_array($fldVal2)) {
            $fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
        }
        $fldOpr = strtoupper(trim($fldOpr));
        if ($fldOpr == "") {
            $fldOpr = "=";
        }
        $fldOpr2 = strtoupper(trim($fldOpr2));
        if ($fldOpr2 == "") {
            $fldOpr2 = "=";
        }
        if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr)) {
            $multiValue = false;
        }
        if ($multiValue) {
            $wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
            $wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
            $wrk = $wrk1; // Build final SQL
            if ($wrk2 != "") {
                $wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
            }
        } else {
            $fldVal = $this->convertSearchValue($fld, $fldVal);
            $fldVal2 = $this->convertSearchValue($fld, $fldVal2);
            $wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
        }
        AddFilter($where, $wrk);
    }

    // Convert search value
    protected function convertSearchValue(&$fld, $fldVal)
    {
        if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE")) {
            return $fldVal;
        }
        $value = $fldVal;
        if ($fld->isBoolean()) {
            if ($fldVal != "") {
                $value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
            }
        } elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
            if ($fldVal != "") {
                $value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
            }
        }
        return $value;
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->employee_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ssn_num, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->nic_num, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->other_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->driving_license, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->work_station_id, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->city, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->home_phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile_phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->work_phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->work_email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->private_email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->indirect_supervisors, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom6, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom7, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom8, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom9, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->custom10, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->notes, $arKeywords, $type);
        return $where;
    }

    // Build basic search SQL
    protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
    {
        $defCond = ($type == "OR") ? "OR" : "AND";
        $arSql = []; // Array for SQL parts
        $arCond = []; // Array for search conditions
        $cnt = count($arKeywords);
        $j = 0; // Number of SQL parts
        for ($i = 0; $i < $cnt; $i++) {
            $keyword = $arKeywords[$i];
            $keyword = trim($keyword);
            if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
                $keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
                $ar = explode("\\", $keyword);
            } else {
                $ar = [$keyword];
            }
            foreach ($ar as $keyword) {
                if ($keyword != "") {
                    $wrk = "";
                    if ($keyword == "OR" && $type == "") {
                        if ($j > 0) {
                            $arCond[$j - 1] = "OR";
                        }
                    } elseif ($keyword == Config("NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NULL";
                    } elseif ($keyword == Config("NOT_NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NOT NULL";
                    } elseif ($fld->IsVirtual && $fld->Visible) {
                        $wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    } elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
                        $wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    }
                    if ($wrk != "") {
                        $arSql[$j] = $wrk;
                        $arCond[$j] = $defCond;
                        $j += 1;
                    }
                }
            }
        }
        $cnt = count($arSql);
        $quoted = false;
        $sql = "";
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt - 1; $i++) {
                if ($arCond[$i] == "OR") {
                    if (!$quoted) {
                        $sql .= "(";
                    }
                    $quoted = true;
                }
                $sql .= $arSql[$i];
                if ($quoted && $arCond[$i] != "OR") {
                    $sql .= ")";
                    $quoted = false;
                }
                $sql .= " " . $arCond[$i] . " ";
            }
            $sql .= $arSql[$cnt - 1];
            if ($quoted) {
                $sql .= ")";
            }
        }
        if ($sql != "") {
            if ($where != "") {
                $where .= " OR ";
            }
            $where .= "(" . $sql . ")";
        }
    }

    // Return basic search WHERE clause based on search keyword and type
    protected function basicSearchWhere($default = false)
    {
        global $Security;
        $searchStr = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
        $searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

        // Get search SQL
        if ($searchKeyword != "") {
            $ar = $this->BasicSearch->keywordList($default);
            // Search keyword in any fields
            if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
                foreach ($ar as $keyword) {
                    if ($keyword != "") {
                        if ($searchStr != "") {
                            $searchStr .= " " . $searchType . " ";
                        }
                        $searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
                    }
                }
            } else {
                $searchStr = $this->basicSearchSql($ar, $searchType);
            }
            if (!$default && in_array($this->Command, ["", "reset", "resetall"])) {
                $this->Command = "search";
            }
        }
        if (!$default && $this->Command == "search") {
            $this->BasicSearch->setKeyword($searchKeyword);
            $this->BasicSearch->setType($searchType);
        }
        return $searchStr;
    }

    // Check if search parm exists
    protected function checkSearchParms()
    {
        // Check basic search
        if ($this->BasicSearch->issetSession()) {
            return true;
        }
        if ($this->id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->employee_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->first_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->middle_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->last_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->nationality->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->birthday->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->marital_status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ssn_num->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->nic_num->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->other_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->driving_license->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->driving_license_exp_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->employment_status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->job_title->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->pay_grade->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->work_station_id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->address1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->address2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->city->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->country->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->province->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->postal_code->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->home_phone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mobile_phone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->work_phone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->work_email->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->private_email->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->joined_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->confirmation_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->supervisor->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->indirect_supervisors->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->department->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom3->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom4->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom5->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom6->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom7->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom8->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom9->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->custom10->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->termination_date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->notes->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ethnicity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->immigration_status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->approver1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->approver2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->approver3->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        return false;
    }

    // Clear all search parameters
    protected function resetSearchParms()
    {
        // Clear search WHERE clause
        $this->SearchWhere = "";
        $this->setSearchWhere($this->SearchWhere);

        // Clear basic search parameters
        $this->resetBasicSearchParms();

        // Clear advanced search parameters
        $this->resetAdvancedSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all basic search parameters
    protected function resetBasicSearchParms()
    {
        $this->BasicSearch->unsetSession();
    }

    // Clear all advanced search parameters
    protected function resetAdvancedSearchParms()
    {
                $this->id->AdvancedSearch->unsetSession();
                $this->employee_id->AdvancedSearch->unsetSession();
                $this->first_name->AdvancedSearch->unsetSession();
                $this->middle_name->AdvancedSearch->unsetSession();
                $this->last_name->AdvancedSearch->unsetSession();
                $this->gender->AdvancedSearch->unsetSession();
                $this->nationality->AdvancedSearch->unsetSession();
                $this->birthday->AdvancedSearch->unsetSession();
                $this->marital_status->AdvancedSearch->unsetSession();
                $this->ssn_num->AdvancedSearch->unsetSession();
                $this->nic_num->AdvancedSearch->unsetSession();
                $this->other_id->AdvancedSearch->unsetSession();
                $this->driving_license->AdvancedSearch->unsetSession();
                $this->driving_license_exp_date->AdvancedSearch->unsetSession();
                $this->employment_status->AdvancedSearch->unsetSession();
                $this->job_title->AdvancedSearch->unsetSession();
                $this->pay_grade->AdvancedSearch->unsetSession();
                $this->work_station_id->AdvancedSearch->unsetSession();
                $this->address1->AdvancedSearch->unsetSession();
                $this->address2->AdvancedSearch->unsetSession();
                $this->city->AdvancedSearch->unsetSession();
                $this->country->AdvancedSearch->unsetSession();
                $this->province->AdvancedSearch->unsetSession();
                $this->postal_code->AdvancedSearch->unsetSession();
                $this->home_phone->AdvancedSearch->unsetSession();
                $this->mobile_phone->AdvancedSearch->unsetSession();
                $this->work_phone->AdvancedSearch->unsetSession();
                $this->work_email->AdvancedSearch->unsetSession();
                $this->private_email->AdvancedSearch->unsetSession();
                $this->joined_date->AdvancedSearch->unsetSession();
                $this->confirmation_date->AdvancedSearch->unsetSession();
                $this->supervisor->AdvancedSearch->unsetSession();
                $this->indirect_supervisors->AdvancedSearch->unsetSession();
                $this->department->AdvancedSearch->unsetSession();
                $this->custom1->AdvancedSearch->unsetSession();
                $this->custom2->AdvancedSearch->unsetSession();
                $this->custom3->AdvancedSearch->unsetSession();
                $this->custom4->AdvancedSearch->unsetSession();
                $this->custom5->AdvancedSearch->unsetSession();
                $this->custom6->AdvancedSearch->unsetSession();
                $this->custom7->AdvancedSearch->unsetSession();
                $this->custom8->AdvancedSearch->unsetSession();
                $this->custom9->AdvancedSearch->unsetSession();
                $this->custom10->AdvancedSearch->unsetSession();
                $this->termination_date->AdvancedSearch->unsetSession();
                $this->notes->AdvancedSearch->unsetSession();
                $this->ethnicity->AdvancedSearch->unsetSession();
                $this->immigration_status->AdvancedSearch->unsetSession();
                $this->approver1->AdvancedSearch->unsetSession();
                $this->approver2->AdvancedSearch->unsetSession();
                $this->approver3->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->employee_id->AdvancedSearch->load();
                $this->first_name->AdvancedSearch->load();
                $this->middle_name->AdvancedSearch->load();
                $this->last_name->AdvancedSearch->load();
                $this->gender->AdvancedSearch->load();
                $this->nationality->AdvancedSearch->load();
                $this->birthday->AdvancedSearch->load();
                $this->marital_status->AdvancedSearch->load();
                $this->ssn_num->AdvancedSearch->load();
                $this->nic_num->AdvancedSearch->load();
                $this->other_id->AdvancedSearch->load();
                $this->driving_license->AdvancedSearch->load();
                $this->driving_license_exp_date->AdvancedSearch->load();
                $this->employment_status->AdvancedSearch->load();
                $this->job_title->AdvancedSearch->load();
                $this->pay_grade->AdvancedSearch->load();
                $this->work_station_id->AdvancedSearch->load();
                $this->address1->AdvancedSearch->load();
                $this->address2->AdvancedSearch->load();
                $this->city->AdvancedSearch->load();
                $this->country->AdvancedSearch->load();
                $this->province->AdvancedSearch->load();
                $this->postal_code->AdvancedSearch->load();
                $this->home_phone->AdvancedSearch->load();
                $this->mobile_phone->AdvancedSearch->load();
                $this->work_phone->AdvancedSearch->load();
                $this->work_email->AdvancedSearch->load();
                $this->private_email->AdvancedSearch->load();
                $this->joined_date->AdvancedSearch->load();
                $this->confirmation_date->AdvancedSearch->load();
                $this->supervisor->AdvancedSearch->load();
                $this->indirect_supervisors->AdvancedSearch->load();
                $this->department->AdvancedSearch->load();
                $this->custom1->AdvancedSearch->load();
                $this->custom2->AdvancedSearch->load();
                $this->custom3->AdvancedSearch->load();
                $this->custom4->AdvancedSearch->load();
                $this->custom5->AdvancedSearch->load();
                $this->custom6->AdvancedSearch->load();
                $this->custom7->AdvancedSearch->load();
                $this->custom8->AdvancedSearch->load();
                $this->custom9->AdvancedSearch->load();
                $this->custom10->AdvancedSearch->load();
                $this->termination_date->AdvancedSearch->load();
                $this->notes->AdvancedSearch->load();
                $this->ethnicity->AdvancedSearch->load();
                $this->immigration_status->AdvancedSearch->load();
                $this->approver1->AdvancedSearch->load();
                $this->approver2->AdvancedSearch->load();
                $this->approver3->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->employee_id); // employee_id
            $this->updateSort($this->first_name); // first_name
            $this->updateSort($this->middle_name); // middle_name
            $this->updateSort($this->last_name); // last_name
            $this->updateSort($this->gender); // gender
            $this->updateSort($this->nationality); // nationality
            $this->updateSort($this->birthday); // birthday
            $this->updateSort($this->marital_status); // marital_status
            $this->updateSort($this->ssn_num); // ssn_num
            $this->updateSort($this->nic_num); // nic_num
            $this->updateSort($this->other_id); // other_id
            $this->updateSort($this->driving_license); // driving_license
            $this->updateSort($this->driving_license_exp_date); // driving_license_exp_date
            $this->updateSort($this->employment_status); // employment_status
            $this->updateSort($this->job_title); // job_title
            $this->updateSort($this->pay_grade); // pay_grade
            $this->updateSort($this->work_station_id); // work_station_id
            $this->updateSort($this->address1); // address1
            $this->updateSort($this->address2); // address2
            $this->updateSort($this->city); // city
            $this->updateSort($this->country); // country
            $this->updateSort($this->province); // province
            $this->updateSort($this->postal_code); // postal_code
            $this->updateSort($this->home_phone); // home_phone
            $this->updateSort($this->mobile_phone); // mobile_phone
            $this->updateSort($this->work_phone); // work_phone
            $this->updateSort($this->work_email); // work_email
            $this->updateSort($this->private_email); // private_email
            $this->updateSort($this->joined_date); // joined_date
            $this->updateSort($this->confirmation_date); // confirmation_date
            $this->updateSort($this->supervisor); // supervisor
            $this->updateSort($this->indirect_supervisors); // indirect_supervisors
            $this->updateSort($this->department); // department
            $this->updateSort($this->custom1); // custom1
            $this->updateSort($this->custom2); // custom2
            $this->updateSort($this->custom3); // custom3
            $this->updateSort($this->custom4); // custom4
            $this->updateSort($this->custom5); // custom5
            $this->updateSort($this->custom6); // custom6
            $this->updateSort($this->custom7); // custom7
            $this->updateSort($this->custom8); // custom8
            $this->updateSort($this->custom9); // custom9
            $this->updateSort($this->custom10); // custom10
            $this->updateSort($this->termination_date); // termination_date
            $this->updateSort($this->ethnicity); // ethnicity
            $this->updateSort($this->immigration_status); // immigration_status
            $this->updateSort($this->approver1); // approver1
            $this->updateSort($this->approver2); // approver2
            $this->updateSort($this->approver3); // approver3
            $this->updateSort($this->status); // status
            $this->updateSort($this->HospID); // HospID
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "`id` DESC";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($this->id->getSort() != "") {
                    $useDefaultSort = false;
                }
                if ($useDefaultSort) {
                    $this->id->setSort("DESC");
                    $orderBy = $this->getSqlOrderBy();
                    $this->setSessionOrderBy($orderBy);
                } else {
                    $this->setSessionOrderBy("");
                }
            }
        }
    }

    // Reset command
    // - cmd=reset (Reset search parameters)
    // - cmd=resetall (Reset search and master/detail parameters)
    // - cmd=resetsort (Reset sort parameters)
    protected function resetCmd()
    {
        // Check if reset command
        if (StartsString("reset", $this->Command)) {
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->employee_id->setSort("");
                $this->first_name->setSort("");
                $this->middle_name->setSort("");
                $this->last_name->setSort("");
                $this->gender->setSort("");
                $this->nationality->setSort("");
                $this->birthday->setSort("");
                $this->marital_status->setSort("");
                $this->ssn_num->setSort("");
                $this->nic_num->setSort("");
                $this->other_id->setSort("");
                $this->driving_license->setSort("");
                $this->driving_license_exp_date->setSort("");
                $this->employment_status->setSort("");
                $this->job_title->setSort("");
                $this->pay_grade->setSort("");
                $this->work_station_id->setSort("");
                $this->address1->setSort("");
                $this->address2->setSort("");
                $this->city->setSort("");
                $this->country->setSort("");
                $this->province->setSort("");
                $this->postal_code->setSort("");
                $this->home_phone->setSort("");
                $this->mobile_phone->setSort("");
                $this->work_phone->setSort("");
                $this->work_email->setSort("");
                $this->private_email->setSort("");
                $this->joined_date->setSort("");
                $this->confirmation_date->setSort("");
                $this->supervisor->setSort("");
                $this->indirect_supervisors->setSort("");
                $this->department->setSort("");
                $this->custom1->setSort("");
                $this->custom2->setSort("");
                $this->custom3->setSort("");
                $this->custom4->setSort("");
                $this->custom5->setSort("");
                $this->custom6->setSort("");
                $this->custom7->setSort("");
                $this->custom8->setSort("");
                $this->custom9->setSort("");
                $this->custom10->setSort("");
                $this->termination_date->setSort("");
                $this->notes->setSort("");
                $this->ethnicity->setSort("");
                $this->immigration_status->setSort("");
                $this->approver1->setSort("");
                $this->approver2->setSort("");
                $this->approver3->setSort("");
                $this->status->setSort("");
                $this->HospID->setSort("");
            }

            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Set up list options
    protected function setupListOptions()
    {
        global $Security, $Language;

        // Add group option item
        $item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = true;
        $item->Visible = false;

        // "view"
        $item = &$this->ListOptions->add("view");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canView();
        $item->OnLeft = true;

        // "edit"
        $item = &$this->ListOptions->add("edit");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canEdit();
        $item->OnLeft = true;

        // "copy"
        $item = &$this->ListOptions->add("copy");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canAdd();
        $item->OnLeft = true;

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canDelete();
        $item->OnLeft = true;

        // "detail_employee_address"
        $item = &$this->ListOptions->add("detail_employee_address");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_address') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_employee_telephone"
        $item = &$this->ListOptions->add("detail_employee_telephone");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_telephone') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_employee_email"
        $item = &$this->ListOptions->add("detail_employee_email");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_email') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_employee_has_degree"
        $item = &$this->ListOptions->add("detail_employee_has_degree");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_has_degree') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_employee_has_experience"
        $item = &$this->ListOptions->add("detail_employee_has_experience");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_has_experience') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_employee_document"
        $item = &$this->ListOptions->add("detail_employee_document");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'employee_document') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // Multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$this->ListOptions->add("details");
            $item->CssClass = "text-nowrap";
            $item->Visible = $this->ShowMultipleDetails;
            $item->OnLeft = true;
            $item->ShowInButtonGroup = false;
        }

        // Set up detail pages
        $pages = new SubPages();
        $pages->add("employee_address");
        $pages->add("employee_telephone");
        $pages->add("employee_email");
        $pages->add("employee_has_degree");
        $pages->add("employee_has_experience");
        $pages->add("employee_document");
        $this->DetailPages = $pages;

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = true;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = true;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->moveTo(0);
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = true;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $this->setupListOptionsExt();
        $item = $this->ListOptions[$this->ListOptions->GroupOptionName];
        $item->Visible = $this->ListOptions->groupOptionVisible();
    }

    // Render list options
    public function renderListOptions()
    {
        global $Security, $Language, $CurrentForm;
        $this->ListOptions->loadDefault();

        // Call ListOptions_Rendering event
        $this->listOptionsRendering();
        $pageUrl = $this->pageUrl();
        if ($this->CurrentMode == "view") {
            // "view"
            $opt = $this->ListOptions["view"];
            $viewcaption = HtmlTitle($Language->phrase("ViewLink"));
            if ($Security->canView()) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode(GetUrl($this->ViewUrl)) . "\">" . $Language->phrase("ViewLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "edit"
            $opt = $this->ListOptions["edit"];
            $editcaption = HtmlTitle($Language->phrase("EditLink"));
            if ($Security->canEdit()) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("EditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if ($Security->canAdd()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "delete"
            $opt = $this->ListOptions["delete"];
            if ($Security->canDelete()) {
            $opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("DeleteLink") . "</a>";
            } else {
                $opt->Body = "";
            }
        } // End View mode

        // Set up list action buttons
        $opt = $this->ListOptions["listactions"];
        if ($opt && !$this->isExport() && !$this->CurrentAction) {
            $body = "";
            $links = [];
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
                    $action = $listaction->Action;
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
                    $links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a></li>";
                    if (count($links) == 1) { // Single button
                        $body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a>";
                    }
                }
            }
            if (count($links) > 1) { // More than one buttons, use dropdown
                $body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
                $content = "";
                foreach ($links as $link) {
                    $content .= "<li>" . $link . "</li>";
                }
                $body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">" . $content . "</ul>";
                $body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
            }
            if (count($links) > 0) {
                $opt->Body = $body;
                $opt->Visible = true;
            }
        }
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_employee_address"
        $opt = $this->ListOptions["detail_employee_address"];
        if ($Security->allowList(CurrentProjectID() . 'employee_address')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_address", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeAddressList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeAddressGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_address";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_address";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_address";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_employee_telephone"
        $opt = $this->ListOptions["detail_employee_telephone"];
        if ($Security->allowList(CurrentProjectID() . 'employee_telephone')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_telephone", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeTelephoneList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeTelephoneGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_telephone";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_telephone";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_telephone";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_employee_email"
        $opt = $this->ListOptions["detail_employee_email"];
        if ($Security->allowList(CurrentProjectID() . 'employee_email')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_email", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeEmailList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeEmailGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_email";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_email";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_email";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_employee_has_degree"
        $opt = $this->ListOptions["detail_employee_has_degree"];
        if ($Security->allowList(CurrentProjectID() . 'employee_has_degree')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_has_degree", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeHasDegreeList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeHasDegreeGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_has_degree";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_has_degree";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_has_degree";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_employee_has_experience"
        $opt = $this->ListOptions["detail_employee_has_experience"];
        if ($Security->allowList(CurrentProjectID() . 'employee_has_experience')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_has_experience", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeHasExperienceList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeHasExperienceGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_has_experience";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_has_experience";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_has_experience";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_employee_document"
        $opt = $this->ListOptions["detail_employee_document"];
        if ($Security->allowList(CurrentProjectID() . 'employee_document')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("employee_document", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("EmployeeDocumentList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("EmployeeDocumentGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "employee_document";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "employee_document";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "employee_document";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }
        if ($this->ShowMultipleDetails) {
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
            $links = "";
            if ($detailViewTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            }
            if ($detailEditTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            }
            if ($detailCopyTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
                $body .= "<ul class=\"dropdown-menu ew-menu\">" . $links . "</ul>";
            }
            $body .= "</div>";
            // Multiple details
            $opt = $this->ListOptions["details"];
            $opt->Body = $body;
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("AddLink"));
        $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
        $item->Visible = $this->AddUrl != "" && $Security->canAdd();
        $option = $options["detail"];
        $detailTableLink = "";
                $item = &$option->add("detailadd_employee_address");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $detailPage = Container("EmployeeAddressGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_address";
                }
                $item = &$option->add("detailadd_employee_telephone");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $detailPage = Container("EmployeeTelephoneGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_telephone";
                }
                $item = &$option->add("detailadd_employee_email");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $detailPage = Container("EmployeeEmailGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_email";
                }
                $item = &$option->add("detailadd_employee_has_degree");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $detailPage = Container("EmployeeHasDegreeGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_has_degree";
                }
                $item = &$option->add("detailadd_employee_has_experience");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $detailPage = Container("EmployeeHasExperienceGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_has_experience";
                }
                $item = &$option->add("detailadd_employee_document");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $detailPage = Container("EmployeeDocumentGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'employee') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "employee_document";
                }

        // Add multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$option->add("detailsadd");
            $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
            $caption = $Language->phrase("AddMasterDetailLink");
            $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
            $item->Visible = $detailTableLink != "" && $Security->canAdd();
            // Hide single master/detail items
            $ar = explode(",", $detailTableLink);
            $cnt = count($ar);
            for ($i = 0; $i < $cnt; $i++) {
                if ($item = $option["detailadd_" . $ar[$i]]) {
                    $item->Visible = false;
                }
            }
        }
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = true;
            $option->UseButtonGroup = true;
            //$option->ButtonClass = ""; // Class for button group
            $item = &$option->add($option->GroupOptionName);
            $item->Body = "";
            $item->Visible = false;
        }
        $options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

        // Filter button
        $item = &$this->FilterOptions->add("savecurrentfilter");
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"femployeelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"femployeelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
        $item->Visible = true;
        $this->FilterOptions->UseDropDownButton = true;
        $this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
        $this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

        // Add group option item
        $item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];
        // Set up list action buttons
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE) {
                $item = &$option->add("custom_" . $listaction->Action);
                $caption = $listaction->Caption;
                $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.femployeelist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
                $item->Visible = $listaction->Allow;
            }
        }

        // Hide grid edit and other options
        if ($this->TotalRecords <= 0) {
            $option = $options["addedit"];
            $item = $option["gridedit"];
            if ($item) {
                $item->Visible = false;
            }
            $option = $options["action"];
            $option->hideAllOptions();
        }
    }

    // Process list action
    protected function processListAction()
    {
        global $Language, $Security;
        $userlist = "";
        $user = "";
        $filter = $this->getFilterFromRecordKeys();
        $userAction = Post("useraction", "");
        if ($filter != "" && $userAction != "") {
            // Check permission first
            $actionCaption = $userAction;
            if (array_key_exists($userAction, $this->ListActions->Items)) {
                $actionCaption = $this->ListActions[$userAction]->Caption;
                if (!$this->ListActions[$userAction]->Allow) {
                    $errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
                    if (Post("ajax") == $userAction) { // Ajax
                        echo "<p class=\"text-danger\">" . $errmsg . "</p>";
                        return true;
                    } else {
                        $this->setFailureMessage($errmsg);
                        return false;
                    }
                }
            }
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = LoadRecordset($sql, $conn, \PDO::FETCH_ASSOC);
            $this->CurrentAction = $userAction;

            // Call row action event
            if ($rs) {
                $conn->beginTransaction();
                $this->SelectedCount = $rs->recordCount();
                $this->SelectedIndex = 0;
                while (!$rs->EOF) {
                    $this->SelectedIndex++;
                    $row = $rs->fields;
                    $processed = $this->rowCustomAction($userAction, $row);
                    if (!$processed) {
                        break;
                    }
                    $rs->moveNext();
                }
                if ($processed) {
                    $conn->commit(); // Commit the changes
                    if ($this->getSuccessMessage() == "" && !ob_get_length()) { // No output
                        $this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
                    }
                } else {
                    $conn->rollback(); // Rollback changes

                    // Set up error message
                    if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                        // Use the message, do nothing
                    } elseif ($this->CancelMessage != "") {
                        $this->setFailureMessage($this->CancelMessage);
                        $this->CancelMessage = "";
                    } else {
                        $this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
                    }
                }
            }
            if ($rs) {
                $rs->close();
            }
            $this->CurrentAction = ""; // Clear action
            if (Post("ajax") == $userAction) { // Ajax
                if ($this->getSuccessMessage() != "") {
                    echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
                    $this->clearSuccessMessage(); // Clear message
                }
                if ($this->getFailureMessage() != "") {
                    echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
                    $this->clearFailureMessage(); // Clear message
                }
                return true;
            }
        }
        return false; // Not ajax request
    }

    // Set up list options (extended codes)
    protected function setupListOptionsExt()
    {
        // Hide detail items for dropdown if necessary
        $this->ListOptions->hideDetailItemsForDropDown();
    }

    // Render list options (extended codes)
    protected function renderListOptionsExt()
    {
        global $Security, $Language;
        $links = "";
        $btngrps = "";
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_address"
        if ($this->DetailPages && $this->DetailPages["employee_address"] && $this->DetailPages["employee_address"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_address"];
            $url = "EmployeeAddressPreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_address\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_address", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_address\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeAddressList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_address", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeAddressGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_address");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_telephone"
        if ($this->DetailPages && $this->DetailPages["employee_telephone"] && $this->DetailPages["employee_telephone"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_telephone"];
            $url = "EmployeeTelephonePreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_telephone\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_telephone", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_telephone\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeTelephoneList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_telephone", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeTelephoneGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_telephone");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_email"
        if ($this->DetailPages && $this->DetailPages["employee_email"] && $this->DetailPages["employee_email"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_email"];
            $url = "EmployeeEmailPreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_email\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_email", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_email\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeEmailList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_email", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeEmailGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_email");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_has_degree"
        if ($this->DetailPages && $this->DetailPages["employee_has_degree"] && $this->DetailPages["employee_has_degree"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_has_degree"];
            $url = "EmployeeHasDegreePreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_has_degree\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_has_degree", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_has_degree\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeHasDegreeList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_has_degree", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeHasDegreeGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_degree");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_has_experience"
        if ($this->DetailPages && $this->DetailPages["employee_has_experience"] && $this->DetailPages["employee_has_experience"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_has_experience"];
            $url = "EmployeeHasExperiencePreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_has_experience\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_has_experience", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_has_experience\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeHasExperienceList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_has_experience", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeHasExperienceGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_has_experience");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`employee_id`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_employee_document"
        if ($this->DetailPages && $this->DetailPages["employee_document"] && $this->DetailPages["employee_document"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_employee_document"];
            $url = "EmployeeDocumentPreview?t=employee&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"employee_document\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'employee')) {
                $label = $Language->TablePhrase("employee_document", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"employee_document\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("EmployeeDocumentList?" . Config("TABLE_SHOW_MASTER") . "=employee&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("employee_document", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("EmployeeDocumentGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'employee')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=employee_document");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }

        // Hide detail items if necessary
        $this->ListOptions->hideDetailItemsForDropDown();

        // Column "preview"
        $option = $this->ListOptions["preview"];
        if (!$option) { // Add preview column
            $option = &$this->ListOptions->add("preview");
            $option->OnLeft = true;
            if ($option->OnLeft) {
                $option->moveTo($this->ListOptions->itemPos("checkbox") + 1);
            } else {
                $option->moveTo($this->ListOptions->itemPos("checkbox"));
            }
            $option->Visible = !($this->isExport() || $this->isGridAdd() || $this->isGridEdit());
            $option->ShowInDropDown = false;
            $option->ShowInButtonGroup = false;
        }
        if ($option) {
            $option->Body = "<i class=\"ew-preview-row-btn ew-icon icon-expand\"></i>";
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }

        // Column "details" (Multiple details)
        $option = $this->ListOptions["details"];
        if ($option) {
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }
    }

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
    }

    // Load search values for validation
    protected function loadSearchValues()
    {
        // Load search values
        $hasValue = false;

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // employee_id
        if (!$this->isAddOrEdit() && $this->employee_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->employee_id->AdvancedSearch->SearchValue != "" || $this->employee_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // first_name
        if (!$this->isAddOrEdit() && $this->first_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->first_name->AdvancedSearch->SearchValue != "" || $this->first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // middle_name
        if (!$this->isAddOrEdit() && $this->middle_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->middle_name->AdvancedSearch->SearchValue != "" || $this->middle_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // last_name
        if (!$this->isAddOrEdit() && $this->last_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->last_name->AdvancedSearch->SearchValue != "" || $this->last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // gender
        if (!$this->isAddOrEdit() && $this->gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->gender->AdvancedSearch->SearchValue != "" || $this->gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // nationality
        if (!$this->isAddOrEdit() && $this->nationality->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->nationality->AdvancedSearch->SearchValue != "" || $this->nationality->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // birthday
        if (!$this->isAddOrEdit() && $this->birthday->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->birthday->AdvancedSearch->SearchValue != "" || $this->birthday->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // marital_status
        if (!$this->isAddOrEdit() && $this->marital_status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->marital_status->AdvancedSearch->SearchValue != "" || $this->marital_status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ssn_num
        if (!$this->isAddOrEdit() && $this->ssn_num->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ssn_num->AdvancedSearch->SearchValue != "" || $this->ssn_num->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // nic_num
        if (!$this->isAddOrEdit() && $this->nic_num->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->nic_num->AdvancedSearch->SearchValue != "" || $this->nic_num->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // other_id
        if (!$this->isAddOrEdit() && $this->other_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->other_id->AdvancedSearch->SearchValue != "" || $this->other_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // driving_license
        if (!$this->isAddOrEdit() && $this->driving_license->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->driving_license->AdvancedSearch->SearchValue != "" || $this->driving_license->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // driving_license_exp_date
        if (!$this->isAddOrEdit() && $this->driving_license_exp_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->driving_license_exp_date->AdvancedSearch->SearchValue != "" || $this->driving_license_exp_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // employment_status
        if (!$this->isAddOrEdit() && $this->employment_status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->employment_status->AdvancedSearch->SearchValue != "" || $this->employment_status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // job_title
        if (!$this->isAddOrEdit() && $this->job_title->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->job_title->AdvancedSearch->SearchValue != "" || $this->job_title->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // pay_grade
        if (!$this->isAddOrEdit() && $this->pay_grade->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->pay_grade->AdvancedSearch->SearchValue != "" || $this->pay_grade->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // work_station_id
        if (!$this->isAddOrEdit() && $this->work_station_id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->work_station_id->AdvancedSearch->SearchValue != "" || $this->work_station_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // address1
        if (!$this->isAddOrEdit() && $this->address1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->address1->AdvancedSearch->SearchValue != "" || $this->address1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // address2
        if (!$this->isAddOrEdit() && $this->address2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->address2->AdvancedSearch->SearchValue != "" || $this->address2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // city
        if (!$this->isAddOrEdit() && $this->city->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->city->AdvancedSearch->SearchValue != "" || $this->city->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // country
        if (!$this->isAddOrEdit() && $this->country->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->country->AdvancedSearch->SearchValue != "" || $this->country->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // province
        if (!$this->isAddOrEdit() && $this->province->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->province->AdvancedSearch->SearchValue != "" || $this->province->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // postal_code
        if (!$this->isAddOrEdit() && $this->postal_code->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->postal_code->AdvancedSearch->SearchValue != "" || $this->postal_code->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // home_phone
        if (!$this->isAddOrEdit() && $this->home_phone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->home_phone->AdvancedSearch->SearchValue != "" || $this->home_phone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mobile_phone
        if (!$this->isAddOrEdit() && $this->mobile_phone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mobile_phone->AdvancedSearch->SearchValue != "" || $this->mobile_phone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // work_phone
        if (!$this->isAddOrEdit() && $this->work_phone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->work_phone->AdvancedSearch->SearchValue != "" || $this->work_phone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // work_email
        if (!$this->isAddOrEdit() && $this->work_email->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->work_email->AdvancedSearch->SearchValue != "" || $this->work_email->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // private_email
        if (!$this->isAddOrEdit() && $this->private_email->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->private_email->AdvancedSearch->SearchValue != "" || $this->private_email->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // joined_date
        if (!$this->isAddOrEdit() && $this->joined_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->joined_date->AdvancedSearch->SearchValue != "" || $this->joined_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // confirmation_date
        if (!$this->isAddOrEdit() && $this->confirmation_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->confirmation_date->AdvancedSearch->SearchValue != "" || $this->confirmation_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // supervisor
        if (!$this->isAddOrEdit() && $this->supervisor->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->supervisor->AdvancedSearch->SearchValue != "" || $this->supervisor->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // indirect_supervisors
        if (!$this->isAddOrEdit() && $this->indirect_supervisors->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->indirect_supervisors->AdvancedSearch->SearchValue != "" || $this->indirect_supervisors->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // department
        if (!$this->isAddOrEdit() && $this->department->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->department->AdvancedSearch->SearchValue != "" || $this->department->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom1
        if (!$this->isAddOrEdit() && $this->custom1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom1->AdvancedSearch->SearchValue != "" || $this->custom1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom2
        if (!$this->isAddOrEdit() && $this->custom2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom2->AdvancedSearch->SearchValue != "" || $this->custom2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom3
        if (!$this->isAddOrEdit() && $this->custom3->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom3->AdvancedSearch->SearchValue != "" || $this->custom3->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom4
        if (!$this->isAddOrEdit() && $this->custom4->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom4->AdvancedSearch->SearchValue != "" || $this->custom4->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom5
        if (!$this->isAddOrEdit() && $this->custom5->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom5->AdvancedSearch->SearchValue != "" || $this->custom5->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom6
        if (!$this->isAddOrEdit() && $this->custom6->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom6->AdvancedSearch->SearchValue != "" || $this->custom6->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom7
        if (!$this->isAddOrEdit() && $this->custom7->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom7->AdvancedSearch->SearchValue != "" || $this->custom7->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom8
        if (!$this->isAddOrEdit() && $this->custom8->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom8->AdvancedSearch->SearchValue != "" || $this->custom8->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom9
        if (!$this->isAddOrEdit() && $this->custom9->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom9->AdvancedSearch->SearchValue != "" || $this->custom9->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // custom10
        if (!$this->isAddOrEdit() && $this->custom10->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->custom10->AdvancedSearch->SearchValue != "" || $this->custom10->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // termination_date
        if (!$this->isAddOrEdit() && $this->termination_date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->termination_date->AdvancedSearch->SearchValue != "" || $this->termination_date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // notes
        if (!$this->isAddOrEdit() && $this->notes->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->notes->AdvancedSearch->SearchValue != "" || $this->notes->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ethnicity
        if (!$this->isAddOrEdit() && $this->ethnicity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ethnicity->AdvancedSearch->SearchValue != "" || $this->ethnicity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // immigration_status
        if (!$this->isAddOrEdit() && $this->immigration_status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->immigration_status->AdvancedSearch->SearchValue != "" || $this->immigration_status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // approver1
        if (!$this->isAddOrEdit() && $this->approver1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->approver1->AdvancedSearch->SearchValue != "" || $this->approver1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // approver2
        if (!$this->isAddOrEdit() && $this->approver2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->approver2->AdvancedSearch->SearchValue != "" || $this->approver2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // approver3
        if (!$this->isAddOrEdit() && $this->approver3->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->approver3->AdvancedSearch->SearchValue != "" || $this->approver3->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // status
        if (!$this->isAddOrEdit() && $this->status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->status->AdvancedSearch->SearchValue != "" || $this->status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HospID
        if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        return $hasValue;
    }

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
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
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->driving_license->setDbValue($row['driving_license']);
        $this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
        $this->employment_status->setDbValue($row['employment_status']);
        $this->job_title->setDbValue($row['job_title']);
        $this->pay_grade->setDbValue($row['pay_grade']);
        $this->work_station_id->setDbValue($row['work_station_id']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->work_phone->setDbValue($row['work_phone']);
        $this->work_email->setDbValue($row['work_email']);
        $this->private_email->setDbValue($row['private_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
        $this->department->setDbValue($row['department']);
        $this->custom1->setDbValue($row['custom1']);
        $this->custom2->setDbValue($row['custom2']);
        $this->custom3->setDbValue($row['custom3']);
        $this->custom4->setDbValue($row['custom4']);
        $this->custom5->setDbValue($row['custom5']);
        $this->custom6->setDbValue($row['custom6']);
        $this->custom7->setDbValue($row['custom7']);
        $this->custom8->setDbValue($row['custom8']);
        $this->custom9->setDbValue($row['custom9']);
        $this->custom10->setDbValue($row['custom10']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->ethnicity->setDbValue($row['ethnicity']);
        $this->immigration_status->setDbValue($row['immigration_status']);
        $this->approver1->setDbValue($row['approver1']);
        $this->approver2->setDbValue($row['approver2']);
        $this->approver3->setDbValue($row['approver3']);
        $this->status->setDbValue($row['status']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['employee_id'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['nationality'] = null;
        $row['birthday'] = null;
        $row['marital_status'] = null;
        $row['ssn_num'] = null;
        $row['nic_num'] = null;
        $row['other_id'] = null;
        $row['driving_license'] = null;
        $row['driving_license_exp_date'] = null;
        $row['employment_status'] = null;
        $row['job_title'] = null;
        $row['pay_grade'] = null;
        $row['work_station_id'] = null;
        $row['address1'] = null;
        $row['address2'] = null;
        $row['city'] = null;
        $row['country'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['home_phone'] = null;
        $row['mobile_phone'] = null;
        $row['work_phone'] = null;
        $row['work_email'] = null;
        $row['private_email'] = null;
        $row['joined_date'] = null;
        $row['confirmation_date'] = null;
        $row['supervisor'] = null;
        $row['indirect_supervisors'] = null;
        $row['department'] = null;
        $row['custom1'] = null;
        $row['custom2'] = null;
        $row['custom3'] = null;
        $row['custom4'] = null;
        $row['custom5'] = null;
        $row['custom6'] = null;
        $row['custom7'] = null;
        $row['custom8'] = null;
        $row['custom9'] = null;
        $row['custom10'] = null;
        $row['termination_date'] = null;
        $row['notes'] = null;
        $row['ethnicity'] = null;
        $row['immigration_status'] = null;
        $row['approver1'] = null;
        $row['approver2'] = null;
        $row['approver3'] = null;
        $row['status'] = null;
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
        $this->ViewUrl = $this->getViewUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->InlineEditUrl = $this->getInlineEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->InlineCopyUrl = $this->getInlineCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // employee_id

        // first_name

        // middle_name

        // last_name

        // gender

        // nationality

        // birthday

        // marital_status

        // ssn_num

        // nic_num

        // other_id

        // driving_license

        // driving_license_exp_date

        // employment_status

        // job_title

        // pay_grade

        // work_station_id

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // home_phone

        // mobile_phone

        // work_phone

        // work_email

        // private_email

        // joined_date

        // confirmation_date

        // supervisor

        // indirect_supervisors

        // department

        // custom1

        // custom2

        // custom3

        // custom4

        // custom5

        // custom6

        // custom7

        // custom8

        // custom9

        // custom10

        // termination_date

        // notes

        // ethnicity

        // immigration_status

        // approver1

        // approver2

        // approver3

        // status

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // nationality
            $curVal = trim(strval($this->nationality->CurrentValue));
            if ($curVal != "") {
                $this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
                if ($this->nationality->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->nationality->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->nationality->Lookup->renderViewRow($rswrk[0]);
                        $this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
                    } else {
                        $this->nationality->ViewValue = $this->nationality->CurrentValue;
                    }
                }
            } else {
                $this->nationality->ViewValue = null;
            }
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // ssn_num
            $this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
            $this->ssn_num->ViewCustomAttributes = "";

            // nic_num
            $this->nic_num->ViewValue = $this->nic_num->CurrentValue;
            $this->nic_num->ViewCustomAttributes = "";

            // other_id
            $this->other_id->ViewValue = $this->other_id->CurrentValue;
            $this->other_id->ViewCustomAttributes = "";

            // driving_license
            $this->driving_license->ViewValue = $this->driving_license->CurrentValue;
            $this->driving_license->ViewCustomAttributes = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
            $this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
            $this->driving_license_exp_date->ViewCustomAttributes = "";

            // employment_status
            $this->employment_status->ViewValue = $this->employment_status->CurrentValue;
            $this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
            $this->employment_status->ViewCustomAttributes = "";

            // job_title
            $this->job_title->ViewValue = $this->job_title->CurrentValue;
            $this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
            $this->job_title->ViewCustomAttributes = "";

            // pay_grade
            $this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
            $this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
            $this->pay_grade->ViewCustomAttributes = "";

            // work_station_id
            $this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
            $this->work_station_id->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // work_phone
            $this->work_phone->ViewValue = $this->work_phone->CurrentValue;
            $this->work_phone->ViewCustomAttributes = "";

            // work_email
            $this->work_email->ViewValue = $this->work_email->CurrentValue;
            $this->work_email->ViewCustomAttributes = "";

            // private_email
            $this->private_email->ViewValue = $this->private_email->CurrentValue;
            $this->private_email->ViewCustomAttributes = "";

            // joined_date
            $this->joined_date->ViewValue = $this->joined_date->CurrentValue;
            $this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
            $this->joined_date->ViewCustomAttributes = "";

            // confirmation_date
            $this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
            $this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
            $this->confirmation_date->ViewCustomAttributes = "";

            // supervisor
            $this->supervisor->ViewValue = $this->supervisor->CurrentValue;
            $this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
            $this->supervisor->ViewCustomAttributes = "";

            // indirect_supervisors
            $this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
            $this->indirect_supervisors->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
            $this->department->ViewCustomAttributes = "";

            // custom1
            $this->custom1->ViewValue = $this->custom1->CurrentValue;
            $this->custom1->ViewCustomAttributes = "";

            // custom2
            $this->custom2->ViewValue = $this->custom2->CurrentValue;
            $this->custom2->ViewCustomAttributes = "";

            // custom3
            $this->custom3->ViewValue = $this->custom3->CurrentValue;
            $this->custom3->ViewCustomAttributes = "";

            // custom4
            $this->custom4->ViewValue = $this->custom4->CurrentValue;
            $this->custom4->ViewCustomAttributes = "";

            // custom5
            $this->custom5->ViewValue = $this->custom5->CurrentValue;
            $this->custom5->ViewCustomAttributes = "";

            // custom6
            $this->custom6->ViewValue = $this->custom6->CurrentValue;
            $this->custom6->ViewCustomAttributes = "";

            // custom7
            $this->custom7->ViewValue = $this->custom7->CurrentValue;
            $this->custom7->ViewCustomAttributes = "";

            // custom8
            $this->custom8->ViewValue = $this->custom8->CurrentValue;
            $this->custom8->ViewCustomAttributes = "";

            // custom9
            $this->custom9->ViewValue = $this->custom9->CurrentValue;
            $this->custom9->ViewCustomAttributes = "";

            // custom10
            $this->custom10->ViewValue = $this->custom10->CurrentValue;
            $this->custom10->ViewCustomAttributes = "";

            // termination_date
            $this->termination_date->ViewValue = $this->termination_date->CurrentValue;
            $this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
            $this->termination_date->ViewCustomAttributes = "";

            // ethnicity
            $this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
            $this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
            $this->ethnicity->ViewCustomAttributes = "";

            // immigration_status
            $this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
            $this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
            $this->immigration_status->ViewCustomAttributes = "";

            // approver1
            $curVal = trim(strval($this->approver1->CurrentValue));
            if ($curVal != "") {
                $this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
                if ($this->approver1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver1->Lookup->renderViewRow($rswrk[0]);
                        $this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
                    } else {
                        $this->approver1->ViewValue = $this->approver1->CurrentValue;
                    }
                }
            } else {
                $this->approver1->ViewValue = null;
            }
            $this->approver1->ViewCustomAttributes = "";

            // approver2
            $curVal = trim(strval($this->approver2->CurrentValue));
            if ($curVal != "") {
                $this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
                if ($this->approver2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver2->Lookup->renderViewRow($rswrk[0]);
                        $this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
                    } else {
                        $this->approver2->ViewValue = $this->approver2->CurrentValue;
                    }
                }
            } else {
                $this->approver2->ViewValue = null;
            }
            $this->approver2->ViewCustomAttributes = "";

            // approver3
            $curVal = trim(strval($this->approver3->CurrentValue));
            if ($curVal != "") {
                $this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
                if ($this->approver3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver3->Lookup->renderViewRow($rswrk[0]);
                        $this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
                    } else {
                        $this->approver3->ViewValue = $this->approver3->CurrentValue;
                    }
                }
            } else {
                $this->approver3->ViewValue = null;
            }
            $this->approver3->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";
            $this->employee_id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

            // ssn_num
            $this->ssn_num->LinkCustomAttributes = "";
            $this->ssn_num->HrefValue = "";
            $this->ssn_num->TooltipValue = "";

            // nic_num
            $this->nic_num->LinkCustomAttributes = "";
            $this->nic_num->HrefValue = "";
            $this->nic_num->TooltipValue = "";

            // other_id
            $this->other_id->LinkCustomAttributes = "";
            $this->other_id->HrefValue = "";
            $this->other_id->TooltipValue = "";

            // driving_license
            $this->driving_license->LinkCustomAttributes = "";
            $this->driving_license->HrefValue = "";
            $this->driving_license->TooltipValue = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->LinkCustomAttributes = "";
            $this->driving_license_exp_date->HrefValue = "";
            $this->driving_license_exp_date->TooltipValue = "";

            // employment_status
            $this->employment_status->LinkCustomAttributes = "";
            $this->employment_status->HrefValue = "";
            $this->employment_status->TooltipValue = "";

            // job_title
            $this->job_title->LinkCustomAttributes = "";
            $this->job_title->HrefValue = "";
            $this->job_title->TooltipValue = "";

            // pay_grade
            $this->pay_grade->LinkCustomAttributes = "";
            $this->pay_grade->HrefValue = "";
            $this->pay_grade->TooltipValue = "";

            // work_station_id
            $this->work_station_id->LinkCustomAttributes = "";
            $this->work_station_id->HrefValue = "";
            $this->work_station_id->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // work_phone
            $this->work_phone->LinkCustomAttributes = "";
            $this->work_phone->HrefValue = "";
            $this->work_phone->TooltipValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";
            $this->work_email->TooltipValue = "";

            // private_email
            $this->private_email->LinkCustomAttributes = "";
            $this->private_email->HrefValue = "";
            $this->private_email->TooltipValue = "";

            // joined_date
            $this->joined_date->LinkCustomAttributes = "";
            $this->joined_date->HrefValue = "";
            $this->joined_date->TooltipValue = "";

            // confirmation_date
            $this->confirmation_date->LinkCustomAttributes = "";
            $this->confirmation_date->HrefValue = "";
            $this->confirmation_date->TooltipValue = "";

            // supervisor
            $this->supervisor->LinkCustomAttributes = "";
            $this->supervisor->HrefValue = "";
            $this->supervisor->TooltipValue = "";

            // indirect_supervisors
            $this->indirect_supervisors->LinkCustomAttributes = "";
            $this->indirect_supervisors->HrefValue = "";
            $this->indirect_supervisors->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // custom1
            $this->custom1->LinkCustomAttributes = "";
            $this->custom1->HrefValue = "";
            $this->custom1->TooltipValue = "";

            // custom2
            $this->custom2->LinkCustomAttributes = "";
            $this->custom2->HrefValue = "";
            $this->custom2->TooltipValue = "";

            // custom3
            $this->custom3->LinkCustomAttributes = "";
            $this->custom3->HrefValue = "";
            $this->custom3->TooltipValue = "";

            // custom4
            $this->custom4->LinkCustomAttributes = "";
            $this->custom4->HrefValue = "";
            $this->custom4->TooltipValue = "";

            // custom5
            $this->custom5->LinkCustomAttributes = "";
            $this->custom5->HrefValue = "";
            $this->custom5->TooltipValue = "";

            // custom6
            $this->custom6->LinkCustomAttributes = "";
            $this->custom6->HrefValue = "";
            $this->custom6->TooltipValue = "";

            // custom7
            $this->custom7->LinkCustomAttributes = "";
            $this->custom7->HrefValue = "";
            $this->custom7->TooltipValue = "";

            // custom8
            $this->custom8->LinkCustomAttributes = "";
            $this->custom8->HrefValue = "";
            $this->custom8->TooltipValue = "";

            // custom9
            $this->custom9->LinkCustomAttributes = "";
            $this->custom9->HrefValue = "";
            $this->custom9->TooltipValue = "";

            // custom10
            $this->custom10->LinkCustomAttributes = "";
            $this->custom10->HrefValue = "";
            $this->custom10->TooltipValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";
            $this->termination_date->TooltipValue = "";

            // ethnicity
            $this->ethnicity->LinkCustomAttributes = "";
            $this->ethnicity->HrefValue = "";
            $this->ethnicity->TooltipValue = "";

            // immigration_status
            $this->immigration_status->LinkCustomAttributes = "";
            $this->immigration_status->HrefValue = "";
            $this->immigration_status->TooltipValue = "";

            // approver1
            $this->approver1->LinkCustomAttributes = "";
            $this->approver1->HrefValue = "";
            $this->approver1->TooltipValue = "";

            // approver2
            $this->approver2->LinkCustomAttributes = "";
            $this->approver2->HrefValue = "";
            $this->approver2->TooltipValue = "";

            // approver3
            $this->approver3->LinkCustomAttributes = "";
            $this->approver3->HrefValue = "";
            $this->approver3->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // employee_id
            $this->employee_id->EditAttrs["class"] = "form-control";
            $this->employee_id->EditCustomAttributes = "";
            if (!$this->employee_id->Raw) {
                $this->employee_id->AdvancedSearch->SearchValue = HtmlDecode($this->employee_id->AdvancedSearch->SearchValue);
            }
            $this->employee_id->EditValue = HtmlEncode($this->employee_id->AdvancedSearch->SearchValue);
            $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // middle_name
            $this->middle_name->EditAttrs["class"] = "form-control";
            $this->middle_name->EditCustomAttributes = "";
            if (!$this->middle_name->Raw) {
                $this->middle_name->AdvancedSearch->SearchValue = HtmlDecode($this->middle_name->AdvancedSearch->SearchValue);
            }
            $this->middle_name->EditValue = HtmlEncode($this->middle_name->AdvancedSearch->SearchValue);
            $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->AdvancedSearch->SearchValue = HtmlDecode($this->last_name->AdvancedSearch->SearchValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->AdvancedSearch->SearchValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // nationality
            $this->nationality->EditAttrs["class"] = "form-control";
            $this->nationality->EditCustomAttributes = "";
            $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

            // birthday
            $this->birthday->EditAttrs["class"] = "form-control";
            $this->birthday->EditCustomAttributes = "";
            $this->birthday->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->birthday->AdvancedSearch->SearchValue, 0), 8));
            $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

            // marital_status
            $this->marital_status->EditCustomAttributes = "";
            $this->marital_status->EditValue = $this->marital_status->options(false);
            $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

            // ssn_num
            $this->ssn_num->EditAttrs["class"] = "form-control";
            $this->ssn_num->EditCustomAttributes = "";
            if (!$this->ssn_num->Raw) {
                $this->ssn_num->AdvancedSearch->SearchValue = HtmlDecode($this->ssn_num->AdvancedSearch->SearchValue);
            }
            $this->ssn_num->EditValue = HtmlEncode($this->ssn_num->AdvancedSearch->SearchValue);
            $this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

            // nic_num
            $this->nic_num->EditAttrs["class"] = "form-control";
            $this->nic_num->EditCustomAttributes = "";
            if (!$this->nic_num->Raw) {
                $this->nic_num->AdvancedSearch->SearchValue = HtmlDecode($this->nic_num->AdvancedSearch->SearchValue);
            }
            $this->nic_num->EditValue = HtmlEncode($this->nic_num->AdvancedSearch->SearchValue);
            $this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

            // other_id
            $this->other_id->EditAttrs["class"] = "form-control";
            $this->other_id->EditCustomAttributes = "";
            if (!$this->other_id->Raw) {
                $this->other_id->AdvancedSearch->SearchValue = HtmlDecode($this->other_id->AdvancedSearch->SearchValue);
            }
            $this->other_id->EditValue = HtmlEncode($this->other_id->AdvancedSearch->SearchValue);
            $this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

            // driving_license
            $this->driving_license->EditAttrs["class"] = "form-control";
            $this->driving_license->EditCustomAttributes = "";
            if (!$this->driving_license->Raw) {
                $this->driving_license->AdvancedSearch->SearchValue = HtmlDecode($this->driving_license->AdvancedSearch->SearchValue);
            }
            $this->driving_license->EditValue = HtmlEncode($this->driving_license->AdvancedSearch->SearchValue);
            $this->driving_license->PlaceHolder = RemoveHtml($this->driving_license->caption());

            // driving_license_exp_date
            $this->driving_license_exp_date->EditAttrs["class"] = "form-control";
            $this->driving_license_exp_date->EditCustomAttributes = "";
            $this->driving_license_exp_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->driving_license_exp_date->AdvancedSearch->SearchValue, 0), 8));
            $this->driving_license_exp_date->PlaceHolder = RemoveHtml($this->driving_license_exp_date->caption());

            // employment_status
            $this->employment_status->EditAttrs["class"] = "form-control";
            $this->employment_status->EditCustomAttributes = "";
            $this->employment_status->EditValue = HtmlEncode($this->employment_status->AdvancedSearch->SearchValue);
            $this->employment_status->PlaceHolder = RemoveHtml($this->employment_status->caption());

            // job_title
            $this->job_title->EditAttrs["class"] = "form-control";
            $this->job_title->EditCustomAttributes = "";
            $this->job_title->EditValue = HtmlEncode($this->job_title->AdvancedSearch->SearchValue);
            $this->job_title->PlaceHolder = RemoveHtml($this->job_title->caption());

            // pay_grade
            $this->pay_grade->EditAttrs["class"] = "form-control";
            $this->pay_grade->EditCustomAttributes = "";
            $this->pay_grade->EditValue = HtmlEncode($this->pay_grade->AdvancedSearch->SearchValue);
            $this->pay_grade->PlaceHolder = RemoveHtml($this->pay_grade->caption());

            // work_station_id
            $this->work_station_id->EditAttrs["class"] = "form-control";
            $this->work_station_id->EditCustomAttributes = "";
            if (!$this->work_station_id->Raw) {
                $this->work_station_id->AdvancedSearch->SearchValue = HtmlDecode($this->work_station_id->AdvancedSearch->SearchValue);
            }
            $this->work_station_id->EditValue = HtmlEncode($this->work_station_id->AdvancedSearch->SearchValue);
            $this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

            // address1
            $this->address1->EditAttrs["class"] = "form-control";
            $this->address1->EditCustomAttributes = "";
            if (!$this->address1->Raw) {
                $this->address1->AdvancedSearch->SearchValue = HtmlDecode($this->address1->AdvancedSearch->SearchValue);
            }
            $this->address1->EditValue = HtmlEncode($this->address1->AdvancedSearch->SearchValue);
            $this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

            // address2
            $this->address2->EditAttrs["class"] = "form-control";
            $this->address2->EditCustomAttributes = "";
            if (!$this->address2->Raw) {
                $this->address2->AdvancedSearch->SearchValue = HtmlDecode($this->address2->AdvancedSearch->SearchValue);
            }
            $this->address2->EditValue = HtmlEncode($this->address2->AdvancedSearch->SearchValue);
            $this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

            // city
            $this->city->EditAttrs["class"] = "form-control";
            $this->city->EditCustomAttributes = "";
            if (!$this->city->Raw) {
                $this->city->AdvancedSearch->SearchValue = HtmlDecode($this->city->AdvancedSearch->SearchValue);
            }
            $this->city->EditValue = HtmlEncode($this->city->AdvancedSearch->SearchValue);
            $this->city->PlaceHolder = RemoveHtml($this->city->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            $this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // home_phone
            $this->home_phone->EditAttrs["class"] = "form-control";
            $this->home_phone->EditCustomAttributes = "";
            if (!$this->home_phone->Raw) {
                $this->home_phone->AdvancedSearch->SearchValue = HtmlDecode($this->home_phone->AdvancedSearch->SearchValue);
            }
            $this->home_phone->EditValue = HtmlEncode($this->home_phone->AdvancedSearch->SearchValue);
            $this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

            // mobile_phone
            $this->mobile_phone->EditAttrs["class"] = "form-control";
            $this->mobile_phone->EditCustomAttributes = "";
            if (!$this->mobile_phone->Raw) {
                $this->mobile_phone->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_phone->AdvancedSearch->SearchValue);
            }
            $this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->AdvancedSearch->SearchValue);
            $this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

            // work_phone
            $this->work_phone->EditAttrs["class"] = "form-control";
            $this->work_phone->EditCustomAttributes = "";
            if (!$this->work_phone->Raw) {
                $this->work_phone->AdvancedSearch->SearchValue = HtmlDecode($this->work_phone->AdvancedSearch->SearchValue);
            }
            $this->work_phone->EditValue = HtmlEncode($this->work_phone->AdvancedSearch->SearchValue);
            $this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

            // work_email
            $this->work_email->EditAttrs["class"] = "form-control";
            $this->work_email->EditCustomAttributes = "";
            if (!$this->work_email->Raw) {
                $this->work_email->AdvancedSearch->SearchValue = HtmlDecode($this->work_email->AdvancedSearch->SearchValue);
            }
            $this->work_email->EditValue = HtmlEncode($this->work_email->AdvancedSearch->SearchValue);
            $this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

            // private_email
            $this->private_email->EditAttrs["class"] = "form-control";
            $this->private_email->EditCustomAttributes = "";
            if (!$this->private_email->Raw) {
                $this->private_email->AdvancedSearch->SearchValue = HtmlDecode($this->private_email->AdvancedSearch->SearchValue);
            }
            $this->private_email->EditValue = HtmlEncode($this->private_email->AdvancedSearch->SearchValue);
            $this->private_email->PlaceHolder = RemoveHtml($this->private_email->caption());

            // joined_date
            $this->joined_date->EditAttrs["class"] = "form-control";
            $this->joined_date->EditCustomAttributes = "";
            $this->joined_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->joined_date->AdvancedSearch->SearchValue, 0), 8));
            $this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

            // confirmation_date
            $this->confirmation_date->EditAttrs["class"] = "form-control";
            $this->confirmation_date->EditCustomAttributes = "";
            $this->confirmation_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->confirmation_date->AdvancedSearch->SearchValue, 0), 8));
            $this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

            // supervisor
            $this->supervisor->EditAttrs["class"] = "form-control";
            $this->supervisor->EditCustomAttributes = "";
            $this->supervisor->EditValue = HtmlEncode($this->supervisor->AdvancedSearch->SearchValue);
            $this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

            // indirect_supervisors
            $this->indirect_supervisors->EditAttrs["class"] = "form-control";
            $this->indirect_supervisors->EditCustomAttributes = "";
            if (!$this->indirect_supervisors->Raw) {
                $this->indirect_supervisors->AdvancedSearch->SearchValue = HtmlDecode($this->indirect_supervisors->AdvancedSearch->SearchValue);
            }
            $this->indirect_supervisors->EditValue = HtmlEncode($this->indirect_supervisors->AdvancedSearch->SearchValue);
            $this->indirect_supervisors->PlaceHolder = RemoveHtml($this->indirect_supervisors->caption());

            // department
            $this->department->EditAttrs["class"] = "form-control";
            $this->department->EditCustomAttributes = "";
            $this->department->EditValue = HtmlEncode($this->department->AdvancedSearch->SearchValue);
            $this->department->PlaceHolder = RemoveHtml($this->department->caption());

            // custom1
            $this->custom1->EditAttrs["class"] = "form-control";
            $this->custom1->EditCustomAttributes = "";
            if (!$this->custom1->Raw) {
                $this->custom1->AdvancedSearch->SearchValue = HtmlDecode($this->custom1->AdvancedSearch->SearchValue);
            }
            $this->custom1->EditValue = HtmlEncode($this->custom1->AdvancedSearch->SearchValue);
            $this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

            // custom2
            $this->custom2->EditAttrs["class"] = "form-control";
            $this->custom2->EditCustomAttributes = "";
            if (!$this->custom2->Raw) {
                $this->custom2->AdvancedSearch->SearchValue = HtmlDecode($this->custom2->AdvancedSearch->SearchValue);
            }
            $this->custom2->EditValue = HtmlEncode($this->custom2->AdvancedSearch->SearchValue);
            $this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

            // custom3
            $this->custom3->EditAttrs["class"] = "form-control";
            $this->custom3->EditCustomAttributes = "";
            if (!$this->custom3->Raw) {
                $this->custom3->AdvancedSearch->SearchValue = HtmlDecode($this->custom3->AdvancedSearch->SearchValue);
            }
            $this->custom3->EditValue = HtmlEncode($this->custom3->AdvancedSearch->SearchValue);
            $this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

            // custom4
            $this->custom4->EditAttrs["class"] = "form-control";
            $this->custom4->EditCustomAttributes = "";
            if (!$this->custom4->Raw) {
                $this->custom4->AdvancedSearch->SearchValue = HtmlDecode($this->custom4->AdvancedSearch->SearchValue);
            }
            $this->custom4->EditValue = HtmlEncode($this->custom4->AdvancedSearch->SearchValue);
            $this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

            // custom5
            $this->custom5->EditAttrs["class"] = "form-control";
            $this->custom5->EditCustomAttributes = "";
            if (!$this->custom5->Raw) {
                $this->custom5->AdvancedSearch->SearchValue = HtmlDecode($this->custom5->AdvancedSearch->SearchValue);
            }
            $this->custom5->EditValue = HtmlEncode($this->custom5->AdvancedSearch->SearchValue);
            $this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

            // custom6
            $this->custom6->EditAttrs["class"] = "form-control";
            $this->custom6->EditCustomAttributes = "";
            if (!$this->custom6->Raw) {
                $this->custom6->AdvancedSearch->SearchValue = HtmlDecode($this->custom6->AdvancedSearch->SearchValue);
            }
            $this->custom6->EditValue = HtmlEncode($this->custom6->AdvancedSearch->SearchValue);
            $this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

            // custom7
            $this->custom7->EditAttrs["class"] = "form-control";
            $this->custom7->EditCustomAttributes = "";
            if (!$this->custom7->Raw) {
                $this->custom7->AdvancedSearch->SearchValue = HtmlDecode($this->custom7->AdvancedSearch->SearchValue);
            }
            $this->custom7->EditValue = HtmlEncode($this->custom7->AdvancedSearch->SearchValue);
            $this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

            // custom8
            $this->custom8->EditAttrs["class"] = "form-control";
            $this->custom8->EditCustomAttributes = "";
            if (!$this->custom8->Raw) {
                $this->custom8->AdvancedSearch->SearchValue = HtmlDecode($this->custom8->AdvancedSearch->SearchValue);
            }
            $this->custom8->EditValue = HtmlEncode($this->custom8->AdvancedSearch->SearchValue);
            $this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

            // custom9
            $this->custom9->EditAttrs["class"] = "form-control";
            $this->custom9->EditCustomAttributes = "";
            if (!$this->custom9->Raw) {
                $this->custom9->AdvancedSearch->SearchValue = HtmlDecode($this->custom9->AdvancedSearch->SearchValue);
            }
            $this->custom9->EditValue = HtmlEncode($this->custom9->AdvancedSearch->SearchValue);
            $this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

            // custom10
            $this->custom10->EditAttrs["class"] = "form-control";
            $this->custom10->EditCustomAttributes = "";
            if (!$this->custom10->Raw) {
                $this->custom10->AdvancedSearch->SearchValue = HtmlDecode($this->custom10->AdvancedSearch->SearchValue);
            }
            $this->custom10->EditValue = HtmlEncode($this->custom10->AdvancedSearch->SearchValue);
            $this->custom10->PlaceHolder = RemoveHtml($this->custom10->caption());

            // termination_date
            $this->termination_date->EditAttrs["class"] = "form-control";
            $this->termination_date->EditCustomAttributes = "";
            $this->termination_date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->termination_date->AdvancedSearch->SearchValue, 0), 8));
            $this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

            // ethnicity
            $this->ethnicity->EditAttrs["class"] = "form-control";
            $this->ethnicity->EditCustomAttributes = "";
            $this->ethnicity->EditValue = HtmlEncode($this->ethnicity->AdvancedSearch->SearchValue);
            $this->ethnicity->PlaceHolder = RemoveHtml($this->ethnicity->caption());

            // immigration_status
            $this->immigration_status->EditAttrs["class"] = "form-control";
            $this->immigration_status->EditCustomAttributes = "";
            $this->immigration_status->EditValue = HtmlEncode($this->immigration_status->AdvancedSearch->SearchValue);
            $this->immigration_status->PlaceHolder = RemoveHtml($this->immigration_status->caption());

            // approver1
            $this->approver1->EditAttrs["class"] = "form-control";
            $this->approver1->EditCustomAttributes = "";
            $this->approver1->PlaceHolder = RemoveHtml($this->approver1->caption());

            // approver2
            $this->approver2->EditAttrs["class"] = "form-control";
            $this->approver2->EditCustomAttributes = "";
            $this->approver2->PlaceHolder = RemoveHtml($this->approver2->caption());

            // approver3
            $this->approver3->EditAttrs["class"] = "form-control";
            $this->approver3->EditCustomAttributes = "";
            $this->approver3->PlaceHolder = RemoveHtml($this->approver3->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate search
    protected function validateSearch()
    {
        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }

        // Return validate result
        $validateSearch = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateSearch = $validateSearch && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateSearch;
    }

    // Load advanced search
    public function loadAdvancedSearch()
    {
        $this->id->AdvancedSearch->load();
        $this->employee_id->AdvancedSearch->load();
        $this->first_name->AdvancedSearch->load();
        $this->middle_name->AdvancedSearch->load();
        $this->last_name->AdvancedSearch->load();
        $this->gender->AdvancedSearch->load();
        $this->nationality->AdvancedSearch->load();
        $this->birthday->AdvancedSearch->load();
        $this->marital_status->AdvancedSearch->load();
        $this->ssn_num->AdvancedSearch->load();
        $this->nic_num->AdvancedSearch->load();
        $this->other_id->AdvancedSearch->load();
        $this->driving_license->AdvancedSearch->load();
        $this->driving_license_exp_date->AdvancedSearch->load();
        $this->employment_status->AdvancedSearch->load();
        $this->job_title->AdvancedSearch->load();
        $this->pay_grade->AdvancedSearch->load();
        $this->work_station_id->AdvancedSearch->load();
        $this->address1->AdvancedSearch->load();
        $this->address2->AdvancedSearch->load();
        $this->city->AdvancedSearch->load();
        $this->country->AdvancedSearch->load();
        $this->province->AdvancedSearch->load();
        $this->postal_code->AdvancedSearch->load();
        $this->home_phone->AdvancedSearch->load();
        $this->mobile_phone->AdvancedSearch->load();
        $this->work_phone->AdvancedSearch->load();
        $this->work_email->AdvancedSearch->load();
        $this->private_email->AdvancedSearch->load();
        $this->joined_date->AdvancedSearch->load();
        $this->confirmation_date->AdvancedSearch->load();
        $this->supervisor->AdvancedSearch->load();
        $this->indirect_supervisors->AdvancedSearch->load();
        $this->department->AdvancedSearch->load();
        $this->custom1->AdvancedSearch->load();
        $this->custom2->AdvancedSearch->load();
        $this->custom3->AdvancedSearch->load();
        $this->custom4->AdvancedSearch->load();
        $this->custom5->AdvancedSearch->load();
        $this->custom6->AdvancedSearch->load();
        $this->custom7->AdvancedSearch->load();
        $this->custom8->AdvancedSearch->load();
        $this->custom9->AdvancedSearch->load();
        $this->custom10->AdvancedSearch->load();
        $this->termination_date->AdvancedSearch->load();
        $this->notes->AdvancedSearch->load();
        $this->ethnicity->AdvancedSearch->load();
        $this->immigration_status->AdvancedSearch->load();
        $this->approver1->AdvancedSearch->load();
        $this->approver2->AdvancedSearch->load();
        $this->approver3->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.femployeelist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.femployeelist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.femployeelist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
            }
        } elseif (SameText($type, "html")) {
            return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
        } elseif (SameText($type, "xml")) {
            return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
        } elseif (SameText($type, "csv")) {
            return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
        } elseif (SameText($type, "email")) {
            $url = $custom ? ",url:'" . $pageUrl . "export=email&amp;custom=1'" : "";
            return '<button id="emf_employee" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_employee\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.femployeelist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
        } elseif (SameText($type, "print")) {
            return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
        }
    }

    // Set up export options
    protected function setupExportOptions()
    {
        global $Language;

        // Printer friendly
        $item = &$this->ExportOptions->add("print");
        $item->Body = $this->getExportTag("print");
        $item->Visible = true;

        // Export to Excel
        $item = &$this->ExportOptions->add("excel");
        $item->Body = $this->getExportTag("excel");
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word");
        $item->Visible = true;

        // Export to Html
        $item = &$this->ExportOptions->add("html");
        $item->Body = $this->getExportTag("html");
        $item->Visible = true;

        // Export to Xml
        $item = &$this->ExportOptions->add("xml");
        $item->Body = $this->getExportTag("xml");
        $item->Visible = true;

        // Export to Csv
        $item = &$this->ExportOptions->add("csv");
        $item->Body = $this->getExportTag("csv");
        $item->Visible = true;

        // Export to Pdf
        $item = &$this->ExportOptions->add("pdf");
        $item->Body = $this->getExportTag("pdf");
        $item->Visible = true;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email");
        $item->Visible = false;

        // Drop down button for export
        $this->ExportOptions->UseButtonGroup = true;
        $this->ExportOptions->UseDropDownButton = true;
        if ($this->ExportOptions->UseButtonGroup && IsMobile()) {
            $this->ExportOptions->UseDropDownButton = true;
        }
        $this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

        // Add group option item
        $item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Set up search options
    protected function setupSearchOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"femployeelistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Button group for search
        $this->SearchOptions->UseDropDownButton = false;
        $this->SearchOptions->UseButtonGroup = true;
        $this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

        // Add group option item
        $item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide search options
        if ($this->isExport() || $this->CurrentAction) {
            $this->SearchOptions->hideAllOptions();
        }
        if (!$Security->canSearch()) {
            $this->SearchOptions->hideAllOptions();
            $this->FilterOptions->hideAllOptions();
        }
    }

    /**
    * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
    *
    * @param bool $return Return the data rather than output it
    * @return mixed
    */
    public function exportData($return = false)
    {
        global $Language;
        $utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");

        // Load recordset
        $this->TotalRecords = $this->listRecordCount();
        $this->StartRecord = 1;

        // Export all
        if ($this->ExportAll) {
            if (Config("EXPORT_ALL_TIME_LIMIT") >= 0) {
                @set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
            }
            $this->DisplayRecords = $this->TotalRecords;
            $this->StopRecord = $this->TotalRecords;
        } else { // Export one page only
            $this->setupStartRecord(); // Set up start record position
            // Set the last record to display
            if ($this->DisplayRecords <= 0) {
                $this->StopRecord = $this->TotalRecords;
            } else {
                $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
            }
        }
        $rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
        $this->ExportDoc = GetExportDocument($this, "h");
        $doc = &$this->ExportDoc;
        if (!$doc) {
            $this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
        }
        if (!$rs || !$doc) {
            RemoveHeader("Content-Type"); // Remove header
            RemoveHeader("Content-Disposition");
            $this->showMessage();
            return;
        }
        $this->StartRecord = 1;
        $this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;

        // Call Page Exporting server event
        $this->ExportDoc->ExportCustom = !$this->pageExporting();
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        $doc->Text .= $footer;

        // Close recordset
        $rs->close();

        // Call Page Exported server event
        $this->pageExported();

        // Export header and footer
        $doc->exportHeaderAndFooter();

        // Clean output buffer (without destroying output buffer)
        $buffer = ob_get_contents(); // Save the output buffer
        if (!Config("DEBUG") && $buffer) {
            ob_clean();
        }

        // Write debug message if enabled
        if (Config("DEBUG") && !$this->isExport("pdf")) {
            echo GetDebugMessage();
        }

        // Output data
        if ($this->isExport("email")) {
            // Export-to-email disabled
        } else {
            $doc->export();
            if ($return) {
                RemoveHeader("Content-Type"); // Remove header
                RemoveHeader("Content-Disposition");
                $content = ob_get_contents();
                if ($content) {
                    ob_clean();
                }
                if ($buffer) {
                    echo $buffer; // Resume the output buffer
                }
                return $content;
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
        $Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, true);
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
                case "x_gender":
                    break;
                case "x_nationality":
                    break;
                case "x_marital_status":
                    break;
                case "x_approver1":
                    break;
                case "x_approver2":
                    break;
                case "x_approver3":
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

    // ListOptions Load event
    public function listOptionsLoad()
    {
        // Example:
        //$opt = &$this->ListOptions->Add("new");
        //$opt->Header = "xxx";
        //$opt->OnLeft = true; // Link on left
        //$opt->MoveTo(0); // Move to first column
    }

    // ListOptions Rendering event
    public function listOptionsRendering()
    {
        //Container("DetailTableGrid")->DetailAdd = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailEdit = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailView = (...condition...); // Set to true or false conditionally
    }

    // ListOptions Rendered event
    public function listOptionsRendered()
    {
        // Example:
        //$this->ListOptions["new"]->Body = "xxx";
    }

    // Row Custom Action event
    public function rowCustomAction($action, $row)
    {
        // Return false to abort
        return true;
    }

    // Page Exporting event
    // $this->ExportDoc = export document object
    public function pageExporting()
    {
        //$this->ExportDoc->Text = "my header"; // Export header
        //return false; // Return false to skip default export and use Row_Export event
        return true; // Return true to use default export and skip Row_Export event
    }

    // Row Export event
    // $this->ExportDoc = export document object
    public function rowExport($rs)
    {
        //$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
    }

    // Page Exported event
    // $this->ExportDoc = export document object
    public function pageExported()
    {
        //$this->ExportDoc->Text .= "my footer"; // Export footer
        //Log($this->ExportDoc->Text);
    }

    // Page Importing event
    public function pageImporting($reader, &$options)
    {
        //var_dump($reader); // Import data reader
        //var_dump($options); // Show all options for importing
        //return false; // Return false to skip import
        return true;
    }

    // Row Import event
    public function rowImport(&$row, $cnt)
    {
        //Log($cnt); // Import record count
        //var_dump($row); // Import row
        //return false; // Return false to skip import
        return true;
    }

    // Page Imported event
    public function pageImported($reader, $results)
    {
        //var_dump($reader); // Import data reader
        //var_dump($results); // Import results
    }
}
