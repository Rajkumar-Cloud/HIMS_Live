<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewRevenueReportIpList extends ViewRevenueReportIp
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_revenue_report_ip';

    // Page object name
    public $PageObjName = "ViewRevenueReportIpList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_revenue_report_iplist";
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

        // Table object (view_revenue_report_ip)
        if (!isset($GLOBALS["view_revenue_report_ip"]) || get_class($GLOBALS["view_revenue_report_ip"]) == PROJECT_NAMESPACE . "view_revenue_report_ip") {
            $GLOBALS["view_revenue_report_ip"] = &$this;
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
        $this->AddUrl = "ViewRevenueReportIpAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewRevenueReportIpDelete";
        $this->MultiUpdateUrl = "ViewRevenueReportIpUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_revenue_report_ip');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_revenue_report_iplistsrch";

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
                $doc = new $class(Container("view_revenue_report_ip"));
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
    public $SearchFieldsPerRow = 1; // For extended search
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
        $this->DATE->setVisibility();
        $this->BillNumber->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->RefferedBy->setVisibility();
        $this->CASES->setVisibility();
        $this->WARD->setVisibility();
        $this->OT->setVisibility();
        $this->IMPLANT->setVisibility();
        $this->LAB->setVisibility();
        $this->PHARMACY->setVisibility();
        $this->OUTSIDEDRSVISITNAME->Visible = false;
        $this->OUTSIDEDRSVISITNAMEAmount->setVisibility();
        $this->PHYSIO->Visible = false;
        $this->PHYSIOAmount->setVisibility();
        $this->SURGEON->Visible = false;
        $this->SURGEONAmount->setVisibility();
        $this->ASSTSURGEON->Visible = false;
        $this->ASSTSURGEONAmount->setVisibility();
        $this->ANESTHETIST->Visible = false;
        $this->ANESTHETISTAmount->setVisibility();
        $this->_Others->setVisibility();
        $this->OtherServices->Visible = false;
        $this->Amount->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Cash->setVisibility();
        $this->Card->setVisibility();
        $this->Remarks->Visible = false;
        $this->DiscountRemarks->Visible = false;
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_revenue_report_iplistsrch");
        }
        $filterList = Concat($filterList, $this->DATE->AdvancedSearch->toJson(), ","); // Field DATE
        $filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
        $filterList = Concat($filterList, $this->CASES->AdvancedSearch->toJson(), ","); // Field CASES
        $filterList = Concat($filterList, $this->WARD->AdvancedSearch->toJson(), ","); // Field WARD
        $filterList = Concat($filterList, $this->OT->AdvancedSearch->toJson(), ","); // Field OT
        $filterList = Concat($filterList, $this->IMPLANT->AdvancedSearch->toJson(), ","); // Field IMPLANT
        $filterList = Concat($filterList, $this->LAB->AdvancedSearch->toJson(), ","); // Field LAB
        $filterList = Concat($filterList, $this->PHARMACY->AdvancedSearch->toJson(), ","); // Field PHARMACY
        $filterList = Concat($filterList, $this->OUTSIDEDRSVISITNAME->AdvancedSearch->toJson(), ","); // Field OUT SIDE DRS VISIT NAME
        $filterList = Concat($filterList, $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->toJson(), ","); // Field OUT SIDE DRS VISIT NAME Amount
        $filterList = Concat($filterList, $this->PHYSIO->AdvancedSearch->toJson(), ","); // Field PHYSIO
        $filterList = Concat($filterList, $this->PHYSIOAmount->AdvancedSearch->toJson(), ","); // Field PHYSIO Amount
        $filterList = Concat($filterList, $this->SURGEON->AdvancedSearch->toJson(), ","); // Field SURGEON
        $filterList = Concat($filterList, $this->SURGEONAmount->AdvancedSearch->toJson(), ","); // Field SURGEON Amount
        $filterList = Concat($filterList, $this->ASSTSURGEON->AdvancedSearch->toJson(), ","); // Field ASST SURGEON
        $filterList = Concat($filterList, $this->ASSTSURGEONAmount->AdvancedSearch->toJson(), ","); // Field ASST SURGEON Amount
        $filterList = Concat($filterList, $this->ANESTHETIST->AdvancedSearch->toJson(), ","); // Field ANESTHETIST
        $filterList = Concat($filterList, $this->ANESTHETISTAmount->AdvancedSearch->toJson(), ","); // Field ANESTHETIST Amount
        $filterList = Concat($filterList, $this->_Others->AdvancedSearch->toJson(), ","); // Field Others
        $filterList = Concat($filterList, $this->OtherServices->AdvancedSearch->toJson(), ","); // Field Other Services
        $filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
        $filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
        $filterList = Concat($filterList, $this->Cash->AdvancedSearch->toJson(), ","); // Field Cash
        $filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_revenue_report_iplistsrch", $filters);
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

        // Field DATE
        $this->DATE->AdvancedSearch->SearchValue = @$filter["x_DATE"];
        $this->DATE->AdvancedSearch->SearchOperator = @$filter["z_DATE"];
        $this->DATE->AdvancedSearch->SearchCondition = @$filter["v_DATE"];
        $this->DATE->AdvancedSearch->SearchValue2 = @$filter["y_DATE"];
        $this->DATE->AdvancedSearch->SearchOperator2 = @$filter["w_DATE"];
        $this->DATE->AdvancedSearch->save();

        // Field BillNumber
        $this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
        $this->BillNumber->AdvancedSearch->save();

        // Field PatientId
        $this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
        $this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
        $this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
        $this->PatientId->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field RefferedBy
        $this->RefferedBy->AdvancedSearch->SearchValue = @$filter["x_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchOperator = @$filter["z_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchCondition = @$filter["v_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchValue2 = @$filter["y_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->save();

        // Field CASES
        $this->CASES->AdvancedSearch->SearchValue = @$filter["x_CASES"];
        $this->CASES->AdvancedSearch->SearchOperator = @$filter["z_CASES"];
        $this->CASES->AdvancedSearch->SearchCondition = @$filter["v_CASES"];
        $this->CASES->AdvancedSearch->SearchValue2 = @$filter["y_CASES"];
        $this->CASES->AdvancedSearch->SearchOperator2 = @$filter["w_CASES"];
        $this->CASES->AdvancedSearch->save();

        // Field WARD
        $this->WARD->AdvancedSearch->SearchValue = @$filter["x_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator = @$filter["z_WARD"];
        $this->WARD->AdvancedSearch->SearchCondition = @$filter["v_WARD"];
        $this->WARD->AdvancedSearch->SearchValue2 = @$filter["y_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator2 = @$filter["w_WARD"];
        $this->WARD->AdvancedSearch->save();

        // Field OT
        $this->OT->AdvancedSearch->SearchValue = @$filter["x_OT"];
        $this->OT->AdvancedSearch->SearchOperator = @$filter["z_OT"];
        $this->OT->AdvancedSearch->SearchCondition = @$filter["v_OT"];
        $this->OT->AdvancedSearch->SearchValue2 = @$filter["y_OT"];
        $this->OT->AdvancedSearch->SearchOperator2 = @$filter["w_OT"];
        $this->OT->AdvancedSearch->save();

        // Field IMPLANT
        $this->IMPLANT->AdvancedSearch->SearchValue = @$filter["x_IMPLANT"];
        $this->IMPLANT->AdvancedSearch->SearchOperator = @$filter["z_IMPLANT"];
        $this->IMPLANT->AdvancedSearch->SearchCondition = @$filter["v_IMPLANT"];
        $this->IMPLANT->AdvancedSearch->SearchValue2 = @$filter["y_IMPLANT"];
        $this->IMPLANT->AdvancedSearch->SearchOperator2 = @$filter["w_IMPLANT"];
        $this->IMPLANT->AdvancedSearch->save();

        // Field LAB
        $this->LAB->AdvancedSearch->SearchValue = @$filter["x_LAB"];
        $this->LAB->AdvancedSearch->SearchOperator = @$filter["z_LAB"];
        $this->LAB->AdvancedSearch->SearchCondition = @$filter["v_LAB"];
        $this->LAB->AdvancedSearch->SearchValue2 = @$filter["y_LAB"];
        $this->LAB->AdvancedSearch->SearchOperator2 = @$filter["w_LAB"];
        $this->LAB->AdvancedSearch->save();

        // Field PHARMACY
        $this->PHARMACY->AdvancedSearch->SearchValue = @$filter["x_PHARMACY"];
        $this->PHARMACY->AdvancedSearch->SearchOperator = @$filter["z_PHARMACY"];
        $this->PHARMACY->AdvancedSearch->SearchCondition = @$filter["v_PHARMACY"];
        $this->PHARMACY->AdvancedSearch->SearchValue2 = @$filter["y_PHARMACY"];
        $this->PHARMACY->AdvancedSearch->SearchOperator2 = @$filter["w_PHARMACY"];
        $this->PHARMACY->AdvancedSearch->save();

        // Field OUT SIDE DRS VISIT NAME
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchValue = @$filter["x_OUTSIDEDRSVISITNAME"];
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchOperator = @$filter["z_OUTSIDEDRSVISITNAME"];
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchCondition = @$filter["v_OUTSIDEDRSVISITNAME"];
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchValue2 = @$filter["y_OUTSIDEDRSVISITNAME"];
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchOperator2 = @$filter["w_OUTSIDEDRSVISITNAME"];
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->save();

        // Field OUT SIDE DRS VISIT NAME Amount
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchValue = @$filter["x_OUTSIDEDRSVISITNAMEAmount"];
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchOperator = @$filter["z_OUTSIDEDRSVISITNAMEAmount"];
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchCondition = @$filter["v_OUTSIDEDRSVISITNAMEAmount"];
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchValue2 = @$filter["y_OUTSIDEDRSVISITNAMEAmount"];
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchOperator2 = @$filter["w_OUTSIDEDRSVISITNAMEAmount"];
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->save();

        // Field PHYSIO
        $this->PHYSIO->AdvancedSearch->SearchValue = @$filter["x_PHYSIO"];
        $this->PHYSIO->AdvancedSearch->SearchOperator = @$filter["z_PHYSIO"];
        $this->PHYSIO->AdvancedSearch->SearchCondition = @$filter["v_PHYSIO"];
        $this->PHYSIO->AdvancedSearch->SearchValue2 = @$filter["y_PHYSIO"];
        $this->PHYSIO->AdvancedSearch->SearchOperator2 = @$filter["w_PHYSIO"];
        $this->PHYSIO->AdvancedSearch->save();

        // Field PHYSIO Amount
        $this->PHYSIOAmount->AdvancedSearch->SearchValue = @$filter["x_PHYSIOAmount"];
        $this->PHYSIOAmount->AdvancedSearch->SearchOperator = @$filter["z_PHYSIOAmount"];
        $this->PHYSIOAmount->AdvancedSearch->SearchCondition = @$filter["v_PHYSIOAmount"];
        $this->PHYSIOAmount->AdvancedSearch->SearchValue2 = @$filter["y_PHYSIOAmount"];
        $this->PHYSIOAmount->AdvancedSearch->SearchOperator2 = @$filter["w_PHYSIOAmount"];
        $this->PHYSIOAmount->AdvancedSearch->save();

        // Field SURGEON
        $this->SURGEON->AdvancedSearch->SearchValue = @$filter["x_SURGEON"];
        $this->SURGEON->AdvancedSearch->SearchOperator = @$filter["z_SURGEON"];
        $this->SURGEON->AdvancedSearch->SearchCondition = @$filter["v_SURGEON"];
        $this->SURGEON->AdvancedSearch->SearchValue2 = @$filter["y_SURGEON"];
        $this->SURGEON->AdvancedSearch->SearchOperator2 = @$filter["w_SURGEON"];
        $this->SURGEON->AdvancedSearch->save();

        // Field SURGEON Amount
        $this->SURGEONAmount->AdvancedSearch->SearchValue = @$filter["x_SURGEONAmount"];
        $this->SURGEONAmount->AdvancedSearch->SearchOperator = @$filter["z_SURGEONAmount"];
        $this->SURGEONAmount->AdvancedSearch->SearchCondition = @$filter["v_SURGEONAmount"];
        $this->SURGEONAmount->AdvancedSearch->SearchValue2 = @$filter["y_SURGEONAmount"];
        $this->SURGEONAmount->AdvancedSearch->SearchOperator2 = @$filter["w_SURGEONAmount"];
        $this->SURGEONAmount->AdvancedSearch->save();

        // Field ASST SURGEON
        $this->ASSTSURGEON->AdvancedSearch->SearchValue = @$filter["x_ASSTSURGEON"];
        $this->ASSTSURGEON->AdvancedSearch->SearchOperator = @$filter["z_ASSTSURGEON"];
        $this->ASSTSURGEON->AdvancedSearch->SearchCondition = @$filter["v_ASSTSURGEON"];
        $this->ASSTSURGEON->AdvancedSearch->SearchValue2 = @$filter["y_ASSTSURGEON"];
        $this->ASSTSURGEON->AdvancedSearch->SearchOperator2 = @$filter["w_ASSTSURGEON"];
        $this->ASSTSURGEON->AdvancedSearch->save();

        // Field ASST SURGEON Amount
        $this->ASSTSURGEONAmount->AdvancedSearch->SearchValue = @$filter["x_ASSTSURGEONAmount"];
        $this->ASSTSURGEONAmount->AdvancedSearch->SearchOperator = @$filter["z_ASSTSURGEONAmount"];
        $this->ASSTSURGEONAmount->AdvancedSearch->SearchCondition = @$filter["v_ASSTSURGEONAmount"];
        $this->ASSTSURGEONAmount->AdvancedSearch->SearchValue2 = @$filter["y_ASSTSURGEONAmount"];
        $this->ASSTSURGEONAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ASSTSURGEONAmount"];
        $this->ASSTSURGEONAmount->AdvancedSearch->save();

        // Field ANESTHETIST
        $this->ANESTHETIST->AdvancedSearch->SearchValue = @$filter["x_ANESTHETIST"];
        $this->ANESTHETIST->AdvancedSearch->SearchOperator = @$filter["z_ANESTHETIST"];
        $this->ANESTHETIST->AdvancedSearch->SearchCondition = @$filter["v_ANESTHETIST"];
        $this->ANESTHETIST->AdvancedSearch->SearchValue2 = @$filter["y_ANESTHETIST"];
        $this->ANESTHETIST->AdvancedSearch->SearchOperator2 = @$filter["w_ANESTHETIST"];
        $this->ANESTHETIST->AdvancedSearch->save();

        // Field ANESTHETIST Amount
        $this->ANESTHETISTAmount->AdvancedSearch->SearchValue = @$filter["x_ANESTHETISTAmount"];
        $this->ANESTHETISTAmount->AdvancedSearch->SearchOperator = @$filter["z_ANESTHETISTAmount"];
        $this->ANESTHETISTAmount->AdvancedSearch->SearchCondition = @$filter["v_ANESTHETISTAmount"];
        $this->ANESTHETISTAmount->AdvancedSearch->SearchValue2 = @$filter["y_ANESTHETISTAmount"];
        $this->ANESTHETISTAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ANESTHETISTAmount"];
        $this->ANESTHETISTAmount->AdvancedSearch->save();

        // Field Others
        $this->_Others->AdvancedSearch->SearchValue = @$filter["x__Others"];
        $this->_Others->AdvancedSearch->SearchOperator = @$filter["z__Others"];
        $this->_Others->AdvancedSearch->SearchCondition = @$filter["v__Others"];
        $this->_Others->AdvancedSearch->SearchValue2 = @$filter["y__Others"];
        $this->_Others->AdvancedSearch->SearchOperator2 = @$filter["w__Others"];
        $this->_Others->AdvancedSearch->save();

        // Field Other Services
        $this->OtherServices->AdvancedSearch->SearchValue = @$filter["x_OtherServices"];
        $this->OtherServices->AdvancedSearch->SearchOperator = @$filter["z_OtherServices"];
        $this->OtherServices->AdvancedSearch->SearchCondition = @$filter["v_OtherServices"];
        $this->OtherServices->AdvancedSearch->SearchValue2 = @$filter["y_OtherServices"];
        $this->OtherServices->AdvancedSearch->SearchOperator2 = @$filter["w_OtherServices"];
        $this->OtherServices->AdvancedSearch->save();

        // Field Amount
        $this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
        $this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
        $this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
        $this->Amount->AdvancedSearch->save();

        // Field ModeofPayment
        $this->ModeofPayment->AdvancedSearch->SearchValue = @$filter["x_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchOperator = @$filter["z_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchCondition = @$filter["v_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchValue2 = @$filter["y_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchOperator2 = @$filter["w_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->save();

        // Field Cash
        $this->Cash->AdvancedSearch->SearchValue = @$filter["x_Cash"];
        $this->Cash->AdvancedSearch->SearchOperator = @$filter["z_Cash"];
        $this->Cash->AdvancedSearch->SearchCondition = @$filter["v_Cash"];
        $this->Cash->AdvancedSearch->SearchValue2 = @$filter["y_Cash"];
        $this->Cash->AdvancedSearch->SearchOperator2 = @$filter["w_Cash"];
        $this->Cash->AdvancedSearch->save();

        // Field Card
        $this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
        $this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
        $this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
        $this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
        $this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
        $this->Card->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field DiscountRemarks
        $this->DiscountRemarks->AdvancedSearch->SearchValue = @$filter["x_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchOperator = @$filter["z_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchCondition = @$filter["v_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->save();

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
        $this->buildSearchSql($where, $this->DATE, $default, false); // DATE
        $this->buildSearchSql($where, $this->BillNumber, $default, false); // BillNumber
        $this->buildSearchSql($where, $this->PatientId, $default, false); // PatientId
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->RefferedBy, $default, false); // RefferedBy
        $this->buildSearchSql($where, $this->CASES, $default, false); // CASES
        $this->buildSearchSql($where, $this->WARD, $default, false); // WARD
        $this->buildSearchSql($where, $this->OT, $default, false); // OT
        $this->buildSearchSql($where, $this->IMPLANT, $default, false); // IMPLANT
        $this->buildSearchSql($where, $this->LAB, $default, false); // LAB
        $this->buildSearchSql($where, $this->PHARMACY, $default, false); // PHARMACY
        $this->buildSearchSql($where, $this->OUTSIDEDRSVISITNAME, $default, false); // OUT SIDE DRS VISIT NAME
        $this->buildSearchSql($where, $this->OUTSIDEDRSVISITNAMEAmount, $default, false); // OUT SIDE DRS VISIT NAME Amount
        $this->buildSearchSql($where, $this->PHYSIO, $default, false); // PHYSIO
        $this->buildSearchSql($where, $this->PHYSIOAmount, $default, false); // PHYSIO Amount
        $this->buildSearchSql($where, $this->SURGEON, $default, false); // SURGEON
        $this->buildSearchSql($where, $this->SURGEONAmount, $default, false); // SURGEON Amount
        $this->buildSearchSql($where, $this->ASSTSURGEON, $default, false); // ASST SURGEON
        $this->buildSearchSql($where, $this->ASSTSURGEONAmount, $default, false); // ASST SURGEON Amount
        $this->buildSearchSql($where, $this->ANESTHETIST, $default, false); // ANESTHETIST
        $this->buildSearchSql($where, $this->ANESTHETISTAmount, $default, false); // ANESTHETIST Amount
        $this->buildSearchSql($where, $this->_Others, $default, false); // Others
        $this->buildSearchSql($where, $this->OtherServices, $default, false); // Other Services
        $this->buildSearchSql($where, $this->Amount, $default, false); // Amount
        $this->buildSearchSql($where, $this->ModeofPayment, $default, false); // ModeofPayment
        $this->buildSearchSql($where, $this->Cash, $default, false); // Cash
        $this->buildSearchSql($where, $this->Card, $default, false); // Card
        $this->buildSearchSql($where, $this->Remarks, $default, false); // Remarks
        $this->buildSearchSql($where, $this->DiscountRemarks, $default, false); // DiscountRemarks
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->DATE->AdvancedSearch->save(); // DATE
            $this->BillNumber->AdvancedSearch->save(); // BillNumber
            $this->PatientId->AdvancedSearch->save(); // PatientId
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->RefferedBy->AdvancedSearch->save(); // RefferedBy
            $this->CASES->AdvancedSearch->save(); // CASES
            $this->WARD->AdvancedSearch->save(); // WARD
            $this->OT->AdvancedSearch->save(); // OT
            $this->IMPLANT->AdvancedSearch->save(); // IMPLANT
            $this->LAB->AdvancedSearch->save(); // LAB
            $this->PHARMACY->AdvancedSearch->save(); // PHARMACY
            $this->OUTSIDEDRSVISITNAME->AdvancedSearch->save(); // OUT SIDE DRS VISIT NAME
            $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->save(); // OUT SIDE DRS VISIT NAME Amount
            $this->PHYSIO->AdvancedSearch->save(); // PHYSIO
            $this->PHYSIOAmount->AdvancedSearch->save(); // PHYSIO Amount
            $this->SURGEON->AdvancedSearch->save(); // SURGEON
            $this->SURGEONAmount->AdvancedSearch->save(); // SURGEON Amount
            $this->ASSTSURGEON->AdvancedSearch->save(); // ASST SURGEON
            $this->ASSTSURGEONAmount->AdvancedSearch->save(); // ASST SURGEON Amount
            $this->ANESTHETIST->AdvancedSearch->save(); // ANESTHETIST
            $this->ANESTHETISTAmount->AdvancedSearch->save(); // ANESTHETIST Amount
            $this->_Others->AdvancedSearch->save(); // Others
            $this->OtherServices->AdvancedSearch->save(); // Other Services
            $this->Amount->AdvancedSearch->save(); // Amount
            $this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
            $this->Cash->AdvancedSearch->save(); // Cash
            $this->Card->AdvancedSearch->save(); // Card
            $this->Remarks->AdvancedSearch->save(); // Remarks
            $this->DiscountRemarks->AdvancedSearch->save(); // DiscountRemarks
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
        $this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OUTSIDEDRSVISITNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PHYSIO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SURGEON, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ASSTSURGEON, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANESTHETIST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OtherServices, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
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
        if ($this->DATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RefferedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CASES->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WARD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMPLANT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LAB->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PHARMACY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OUTSIDEDRSVISITNAME->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PHYSIO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PHYSIOAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SURGEON->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SURGEONAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ASSTSURGEON->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ASSTSURGEONAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANESTHETIST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANESTHETISTAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_Others->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OtherServices->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Amount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ModeofPayment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Cash->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Card->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Remarks->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DiscountRemarks->AdvancedSearch->issetSession()) {
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
                $this->DATE->AdvancedSearch->unsetSession();
                $this->BillNumber->AdvancedSearch->unsetSession();
                $this->PatientId->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->RefferedBy->AdvancedSearch->unsetSession();
                $this->CASES->AdvancedSearch->unsetSession();
                $this->WARD->AdvancedSearch->unsetSession();
                $this->OT->AdvancedSearch->unsetSession();
                $this->IMPLANT->AdvancedSearch->unsetSession();
                $this->LAB->AdvancedSearch->unsetSession();
                $this->PHARMACY->AdvancedSearch->unsetSession();
                $this->OUTSIDEDRSVISITNAME->AdvancedSearch->unsetSession();
                $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->unsetSession();
                $this->PHYSIO->AdvancedSearch->unsetSession();
                $this->PHYSIOAmount->AdvancedSearch->unsetSession();
                $this->SURGEON->AdvancedSearch->unsetSession();
                $this->SURGEONAmount->AdvancedSearch->unsetSession();
                $this->ASSTSURGEON->AdvancedSearch->unsetSession();
                $this->ASSTSURGEONAmount->AdvancedSearch->unsetSession();
                $this->ANESTHETIST->AdvancedSearch->unsetSession();
                $this->ANESTHETISTAmount->AdvancedSearch->unsetSession();
                $this->_Others->AdvancedSearch->unsetSession();
                $this->OtherServices->AdvancedSearch->unsetSession();
                $this->Amount->AdvancedSearch->unsetSession();
                $this->ModeofPayment->AdvancedSearch->unsetSession();
                $this->Cash->AdvancedSearch->unsetSession();
                $this->Card->AdvancedSearch->unsetSession();
                $this->Remarks->AdvancedSearch->unsetSession();
                $this->DiscountRemarks->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->DATE->AdvancedSearch->load();
                $this->BillNumber->AdvancedSearch->load();
                $this->PatientId->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->RefferedBy->AdvancedSearch->load();
                $this->CASES->AdvancedSearch->load();
                $this->WARD->AdvancedSearch->load();
                $this->OT->AdvancedSearch->load();
                $this->IMPLANT->AdvancedSearch->load();
                $this->LAB->AdvancedSearch->load();
                $this->PHARMACY->AdvancedSearch->load();
                $this->OUTSIDEDRSVISITNAME->AdvancedSearch->load();
                $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->load();
                $this->PHYSIO->AdvancedSearch->load();
                $this->PHYSIOAmount->AdvancedSearch->load();
                $this->SURGEON->AdvancedSearch->load();
                $this->SURGEONAmount->AdvancedSearch->load();
                $this->ASSTSURGEON->AdvancedSearch->load();
                $this->ASSTSURGEONAmount->AdvancedSearch->load();
                $this->ANESTHETIST->AdvancedSearch->load();
                $this->ANESTHETISTAmount->AdvancedSearch->load();
                $this->_Others->AdvancedSearch->load();
                $this->OtherServices->AdvancedSearch->load();
                $this->Amount->AdvancedSearch->load();
                $this->ModeofPayment->AdvancedSearch->load();
                $this->Cash->AdvancedSearch->load();
                $this->Card->AdvancedSearch->load();
                $this->Remarks->AdvancedSearch->load();
                $this->DiscountRemarks->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->DATE); // DATE
            $this->updateSort($this->BillNumber); // BillNumber
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->RefferedBy); // RefferedBy
            $this->updateSort($this->CASES); // CASES
            $this->updateSort($this->WARD); // WARD
            $this->updateSort($this->OT); // OT
            $this->updateSort($this->IMPLANT); // IMPLANT
            $this->updateSort($this->LAB); // LAB
            $this->updateSort($this->PHARMACY); // PHARMACY
            $this->updateSort($this->OUTSIDEDRSVISITNAMEAmount); // OUT SIDE DRS VISIT NAME Amount
            $this->updateSort($this->PHYSIOAmount); // PHYSIO Amount
            $this->updateSort($this->SURGEONAmount); // SURGEON Amount
            $this->updateSort($this->ASSTSURGEONAmount); // ASST SURGEON Amount
            $this->updateSort($this->ANESTHETISTAmount); // ANESTHETIST Amount
            $this->updateSort($this->_Others); // Others
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->ModeofPayment); // ModeofPayment
            $this->updateSort($this->Cash); // Cash
            $this->updateSort($this->Card); // Card
            $this->updateSort($this->HospID); // HospID
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($useDefaultSort) {
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
                $this->DATE->setSort("");
                $this->BillNumber->setSort("");
                $this->PatientId->setSort("");
                $this->PatientName->setSort("");
                $this->RefferedBy->setSort("");
                $this->CASES->setSort("");
                $this->WARD->setSort("");
                $this->OT->setSort("");
                $this->IMPLANT->setSort("");
                $this->LAB->setSort("");
                $this->PHARMACY->setSort("");
                $this->OUTSIDEDRSVISITNAME->setSort("");
                $this->OUTSIDEDRSVISITNAMEAmount->setSort("");
                $this->PHYSIO->setSort("");
                $this->PHYSIOAmount->setSort("");
                $this->SURGEON->setSort("");
                $this->SURGEONAmount->setSort("");
                $this->ASSTSURGEON->setSort("");
                $this->ASSTSURGEONAmount->setSort("");
                $this->ANESTHETIST->setSort("");
                $this->ANESTHETISTAmount->setSort("");
                $this->_Others->setSort("");
                $this->OtherServices->setSort("");
                $this->Amount->setSort("");
                $this->ModeofPayment->setSort("");
                $this->Cash->setSort("");
                $this->Card->setSort("");
                $this->Remarks->setSort("");
                $this->DiscountRemarks->setSort("");
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
        if ($this->CurrentMode == "view") { // View mode
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

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_revenue_report_iplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_revenue_report_iplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_revenue_report_iplist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // DATE
        if (!$this->isAddOrEdit() && $this->DATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DATE->AdvancedSearch->SearchValue != "" || $this->DATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillNumber
        if (!$this->isAddOrEdit() && $this->BillNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillNumber->AdvancedSearch->SearchValue != "" || $this->BillNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientId
        if (!$this->isAddOrEdit() && $this->PatientId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientId->AdvancedSearch->SearchValue != "" || $this->PatientId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RefferedBy
        if (!$this->isAddOrEdit() && $this->RefferedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RefferedBy->AdvancedSearch->SearchValue != "" || $this->RefferedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CASES
        if (!$this->isAddOrEdit() && $this->CASES->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CASES->AdvancedSearch->SearchValue != "" || $this->CASES->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WARD
        if (!$this->isAddOrEdit() && $this->WARD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WARD->AdvancedSearch->SearchValue != "" || $this->WARD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OT
        if (!$this->isAddOrEdit() && $this->OT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OT->AdvancedSearch->SearchValue != "" || $this->OT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMPLANT
        if (!$this->isAddOrEdit() && $this->IMPLANT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMPLANT->AdvancedSearch->SearchValue != "" || $this->IMPLANT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LAB
        if (!$this->isAddOrEdit() && $this->LAB->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LAB->AdvancedSearch->SearchValue != "" || $this->LAB->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PHARMACY
        if (!$this->isAddOrEdit() && $this->PHARMACY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PHARMACY->AdvancedSearch->SearchValue != "" || $this->PHARMACY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OUT SIDE DRS VISIT NAME
        if (!$this->isAddOrEdit() && $this->OUTSIDEDRSVISITNAME->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchValue != "" || $this->OUTSIDEDRSVISITNAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OUT SIDE DRS VISIT NAME Amount
        if (!$this->isAddOrEdit() && $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchValue != "" || $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PHYSIO
        if (!$this->isAddOrEdit() && $this->PHYSIO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PHYSIO->AdvancedSearch->SearchValue != "" || $this->PHYSIO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PHYSIO Amount
        if (!$this->isAddOrEdit() && $this->PHYSIOAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PHYSIOAmount->AdvancedSearch->SearchValue != "" || $this->PHYSIOAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SURGEON
        if (!$this->isAddOrEdit() && $this->SURGEON->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SURGEON->AdvancedSearch->SearchValue != "" || $this->SURGEON->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SURGEON Amount
        if (!$this->isAddOrEdit() && $this->SURGEONAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SURGEONAmount->AdvancedSearch->SearchValue != "" || $this->SURGEONAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ASST SURGEON
        if (!$this->isAddOrEdit() && $this->ASSTSURGEON->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ASSTSURGEON->AdvancedSearch->SearchValue != "" || $this->ASSTSURGEON->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ASST SURGEON Amount
        if (!$this->isAddOrEdit() && $this->ASSTSURGEONAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ASSTSURGEONAmount->AdvancedSearch->SearchValue != "" || $this->ASSTSURGEONAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANESTHETIST
        if (!$this->isAddOrEdit() && $this->ANESTHETIST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANESTHETIST->AdvancedSearch->SearchValue != "" || $this->ANESTHETIST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANESTHETIST Amount
        if (!$this->isAddOrEdit() && $this->ANESTHETISTAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANESTHETISTAmount->AdvancedSearch->SearchValue != "" || $this->ANESTHETISTAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Others
        if (!$this->isAddOrEdit() && $this->_Others->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->_Others->AdvancedSearch->SearchValue != "" || $this->_Others->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Other Services
        if (!$this->isAddOrEdit() && $this->OtherServices->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OtherServices->AdvancedSearch->SearchValue != "" || $this->OtherServices->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Amount
        if (!$this->isAddOrEdit() && $this->Amount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Amount->AdvancedSearch->SearchValue != "" || $this->Amount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ModeofPayment
        if (!$this->isAddOrEdit() && $this->ModeofPayment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ModeofPayment->AdvancedSearch->SearchValue != "" || $this->ModeofPayment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Cash
        if (!$this->isAddOrEdit() && $this->Cash->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Cash->AdvancedSearch->SearchValue != "" || $this->Cash->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Card
        if (!$this->isAddOrEdit() && $this->Card->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Card->AdvancedSearch->SearchValue != "" || $this->Card->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Remarks
        if (!$this->isAddOrEdit() && $this->Remarks->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Remarks->AdvancedSearch->SearchValue != "" || $this->Remarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DiscountRemarks
        if (!$this->isAddOrEdit() && $this->DiscountRemarks->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DiscountRemarks->AdvancedSearch->SearchValue != "" || $this->DiscountRemarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->DATE->setDbValue($row['DATE']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CASES->setDbValue($row['CASES']);
        $this->WARD->setDbValue($row['WARD']);
        $this->OT->setDbValue($row['OT']);
        $this->IMPLANT->setDbValue($row['IMPLANT']);
        $this->LAB->setDbValue($row['LAB']);
        $this->PHARMACY->setDbValue($row['PHARMACY']);
        $this->OUTSIDEDRSVISITNAME->setDbValue($row['OUT SIDE DRS VISIT NAME']);
        $this->OUTSIDEDRSVISITNAMEAmount->setDbValue($row['OUT SIDE DRS VISIT NAME Amount']);
        $this->PHYSIO->setDbValue($row['PHYSIO']);
        $this->PHYSIOAmount->setDbValue($row['PHYSIO Amount']);
        $this->SURGEON->setDbValue($row['SURGEON']);
        $this->SURGEONAmount->setDbValue($row['SURGEON Amount']);
        $this->ASSTSURGEON->setDbValue($row['ASST SURGEON']);
        $this->ASSTSURGEONAmount->setDbValue($row['ASST SURGEON Amount']);
        $this->ANESTHETIST->setDbValue($row['ANESTHETIST']);
        $this->ANESTHETISTAmount->setDbValue($row['ANESTHETIST Amount']);
        $this->_Others->setDbValue($row['Others']);
        $this->OtherServices->setDbValue($row['Other Services']);
        $this->Amount->setDbValue($row['Amount']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['DATE'] = null;
        $row['BillNumber'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['RefferedBy'] = null;
        $row['CASES'] = null;
        $row['WARD'] = null;
        $row['OT'] = null;
        $row['IMPLANT'] = null;
        $row['LAB'] = null;
        $row['PHARMACY'] = null;
        $row['OUT SIDE DRS VISIT NAME'] = null;
        $row['OUT SIDE DRS VISIT NAME Amount'] = null;
        $row['PHYSIO'] = null;
        $row['PHYSIO Amount'] = null;
        $row['SURGEON'] = null;
        $row['SURGEON Amount'] = null;
        $row['ASST SURGEON'] = null;
        $row['ASST SURGEON Amount'] = null;
        $row['ANESTHETIST'] = null;
        $row['ANESTHETIST Amount'] = null;
        $row['Others'] = null;
        $row['Other Services'] = null;
        $row['Amount'] = null;
        $row['ModeofPayment'] = null;
        $row['Cash'] = null;
        $row['Card'] = null;
        $row['Remarks'] = null;
        $row['DiscountRemarks'] = null;
        $row['HospID'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        return false;
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

        // Convert decimal values if posted back
        if ($this->CASES->FormValue == $this->CASES->CurrentValue && is_numeric(ConvertToFloatString($this->CASES->CurrentValue))) {
            $this->CASES->CurrentValue = ConvertToFloatString($this->CASES->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->WARD->FormValue == $this->WARD->CurrentValue && is_numeric(ConvertToFloatString($this->WARD->CurrentValue))) {
            $this->WARD->CurrentValue = ConvertToFloatString($this->WARD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OT->FormValue == $this->OT->CurrentValue && is_numeric(ConvertToFloatString($this->OT->CurrentValue))) {
            $this->OT->CurrentValue = ConvertToFloatString($this->OT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IMPLANT->FormValue == $this->IMPLANT->CurrentValue && is_numeric(ConvertToFloatString($this->IMPLANT->CurrentValue))) {
            $this->IMPLANT->CurrentValue = ConvertToFloatString($this->IMPLANT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LAB->FormValue == $this->LAB->CurrentValue && is_numeric(ConvertToFloatString($this->LAB->CurrentValue))) {
            $this->LAB->CurrentValue = ConvertToFloatString($this->LAB->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PHARMACY->FormValue == $this->PHARMACY->CurrentValue && is_numeric(ConvertToFloatString($this->PHARMACY->CurrentValue))) {
            $this->PHARMACY->CurrentValue = ConvertToFloatString($this->PHARMACY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OUTSIDEDRSVISITNAMEAmount->FormValue == $this->OUTSIDEDRSVISITNAMEAmount->CurrentValue && is_numeric(ConvertToFloatString($this->OUTSIDEDRSVISITNAMEAmount->CurrentValue))) {
            $this->OUTSIDEDRSVISITNAMEAmount->CurrentValue = ConvertToFloatString($this->OUTSIDEDRSVISITNAMEAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PHYSIOAmount->FormValue == $this->PHYSIOAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PHYSIOAmount->CurrentValue))) {
            $this->PHYSIOAmount->CurrentValue = ConvertToFloatString($this->PHYSIOAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SURGEONAmount->FormValue == $this->SURGEONAmount->CurrentValue && is_numeric(ConvertToFloatString($this->SURGEONAmount->CurrentValue))) {
            $this->SURGEONAmount->CurrentValue = ConvertToFloatString($this->SURGEONAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ASSTSURGEONAmount->FormValue == $this->ASSTSURGEONAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ASSTSURGEONAmount->CurrentValue))) {
            $this->ASSTSURGEONAmount->CurrentValue = ConvertToFloatString($this->ASSTSURGEONAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ANESTHETISTAmount->FormValue == $this->ANESTHETISTAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ANESTHETISTAmount->CurrentValue))) {
            $this->ANESTHETISTAmount->CurrentValue = ConvertToFloatString($this->ANESTHETISTAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->_Others->FormValue == $this->_Others->CurrentValue && is_numeric(ConvertToFloatString($this->_Others->CurrentValue))) {
            $this->_Others->CurrentValue = ConvertToFloatString($this->_Others->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue))) {
            $this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // DATE

        // BillNumber

        // PatientId

        // PatientName

        // RefferedBy

        // CASES

        // WARD

        // OT

        // IMPLANT

        // LAB

        // PHARMACY

        // OUT SIDE DRS VISIT NAME

        // OUT SIDE DRS VISIT NAME Amount

        // PHYSIO

        // PHYSIO Amount

        // SURGEON

        // SURGEON Amount

        // ASST SURGEON

        // ASST SURGEON Amount

        // ANESTHETIST

        // ANESTHETIST Amount

        // Others

        // Other Services

        // Amount

        // ModeofPayment

        // Cash

        // Card

        // Remarks

        // DiscountRemarks

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // DATE
            $this->DATE->ViewValue = $this->DATE->CurrentValue;
            $this->DATE->ViewValue = FormatDateTime($this->DATE->ViewValue, 0);
            $this->DATE->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // RefferedBy
            $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
            $this->RefferedBy->ViewCustomAttributes = "";

            // CASES
            $this->CASES->ViewValue = $this->CASES->CurrentValue;
            $this->CASES->ViewValue = FormatNumber($this->CASES->ViewValue, 2, -2, -2, -2);
            $this->CASES->ViewCustomAttributes = "";

            // WARD
            $this->WARD->ViewValue = $this->WARD->CurrentValue;
            $this->WARD->ViewValue = FormatNumber($this->WARD->ViewValue, 2, -2, -2, -2);
            $this->WARD->ViewCustomAttributes = "";

            // OT
            $this->OT->ViewValue = $this->OT->CurrentValue;
            $this->OT->ViewValue = FormatNumber($this->OT->ViewValue, 2, -2, -2, -2);
            $this->OT->ViewCustomAttributes = "";

            // IMPLANT
            $this->IMPLANT->ViewValue = $this->IMPLANT->CurrentValue;
            $this->IMPLANT->ViewValue = FormatNumber($this->IMPLANT->ViewValue, 2, -2, -2, -2);
            $this->IMPLANT->ViewCustomAttributes = "";

            // LAB
            $this->LAB->ViewValue = $this->LAB->CurrentValue;
            $this->LAB->ViewValue = FormatNumber($this->LAB->ViewValue, 2, -2, -2, -2);
            $this->LAB->ViewCustomAttributes = "";

            // PHARMACY
            $this->PHARMACY->ViewValue = $this->PHARMACY->CurrentValue;
            $this->PHARMACY->ViewValue = FormatNumber($this->PHARMACY->ViewValue, 2, -2, -2, -2);
            $this->PHARMACY->ViewCustomAttributes = "";

            // OUT SIDE DRS VISIT NAME Amount
            $this->OUTSIDEDRSVISITNAMEAmount->ViewValue = $this->OUTSIDEDRSVISITNAMEAmount->CurrentValue;
            $this->OUTSIDEDRSVISITNAMEAmount->ViewValue = FormatNumber($this->OUTSIDEDRSVISITNAMEAmount->ViewValue, 2, -2, -2, -2);
            $this->OUTSIDEDRSVISITNAMEAmount->ViewCustomAttributes = "";

            // PHYSIO Amount
            $this->PHYSIOAmount->ViewValue = $this->PHYSIOAmount->CurrentValue;
            $this->PHYSIOAmount->ViewValue = FormatNumber($this->PHYSIOAmount->ViewValue, 2, -2, -2, -2);
            $this->PHYSIOAmount->ViewCustomAttributes = "";

            // SURGEON Amount
            $this->SURGEONAmount->ViewValue = $this->SURGEONAmount->CurrentValue;
            $this->SURGEONAmount->ViewValue = FormatNumber($this->SURGEONAmount->ViewValue, 2, -2, -2, -2);
            $this->SURGEONAmount->ViewCustomAttributes = "";

            // ASST SURGEON Amount
            $this->ASSTSURGEONAmount->ViewValue = $this->ASSTSURGEONAmount->CurrentValue;
            $this->ASSTSURGEONAmount->ViewValue = FormatNumber($this->ASSTSURGEONAmount->ViewValue, 2, -2, -2, -2);
            $this->ASSTSURGEONAmount->ViewCustomAttributes = "";

            // ANESTHETIST Amount
            $this->ANESTHETISTAmount->ViewValue = $this->ANESTHETISTAmount->CurrentValue;
            $this->ANESTHETISTAmount->ViewValue = FormatNumber($this->ANESTHETISTAmount->ViewValue, 2, -2, -2, -2);
            $this->ANESTHETISTAmount->ViewCustomAttributes = "";

            // Others
            $this->_Others->ViewValue = $this->_Others->CurrentValue;
            $this->_Others->ViewValue = FormatNumber($this->_Others->ViewValue, 2, -2, -2, -2);
            $this->_Others->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // ModeofPayment
            $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // DATE
            $this->DATE->LinkCustomAttributes = "";
            $this->DATE->HrefValue = "";
            $this->DATE->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // RefferedBy
            $this->RefferedBy->LinkCustomAttributes = "";
            $this->RefferedBy->HrefValue = "";
            $this->RefferedBy->TooltipValue = "";

            // CASES
            $this->CASES->LinkCustomAttributes = "";
            $this->CASES->HrefValue = "";
            $this->CASES->TooltipValue = "";

            // WARD
            $this->WARD->LinkCustomAttributes = "";
            $this->WARD->HrefValue = "";
            $this->WARD->TooltipValue = "";

            // OT
            $this->OT->LinkCustomAttributes = "";
            $this->OT->HrefValue = "";
            $this->OT->TooltipValue = "";

            // IMPLANT
            $this->IMPLANT->LinkCustomAttributes = "";
            $this->IMPLANT->HrefValue = "";
            $this->IMPLANT->TooltipValue = "";

            // LAB
            $this->LAB->LinkCustomAttributes = "";
            $this->LAB->HrefValue = "";
            $this->LAB->TooltipValue = "";

            // PHARMACY
            $this->PHARMACY->LinkCustomAttributes = "";
            $this->PHARMACY->HrefValue = "";
            $this->PHARMACY->TooltipValue = "";

            // OUT SIDE DRS VISIT NAME Amount
            $this->OUTSIDEDRSVISITNAMEAmount->LinkCustomAttributes = "";
            $this->OUTSIDEDRSVISITNAMEAmount->HrefValue = "";
            $this->OUTSIDEDRSVISITNAMEAmount->TooltipValue = "";

            // PHYSIO Amount
            $this->PHYSIOAmount->LinkCustomAttributes = "";
            $this->PHYSIOAmount->HrefValue = "";
            $this->PHYSIOAmount->TooltipValue = "";

            // SURGEON Amount
            $this->SURGEONAmount->LinkCustomAttributes = "";
            $this->SURGEONAmount->HrefValue = "";
            $this->SURGEONAmount->TooltipValue = "";

            // ASST SURGEON Amount
            $this->ASSTSURGEONAmount->LinkCustomAttributes = "";
            $this->ASSTSURGEONAmount->HrefValue = "";
            $this->ASSTSURGEONAmount->TooltipValue = "";

            // ANESTHETIST Amount
            $this->ANESTHETISTAmount->LinkCustomAttributes = "";
            $this->ANESTHETISTAmount->HrefValue = "";
            $this->ANESTHETISTAmount->TooltipValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";
            $this->_Others->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // DATE
            $this->DATE->EditAttrs["class"] = "form-control";
            $this->DATE->EditCustomAttributes = "";
            $this->DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DATE->AdvancedSearch->SearchValue, 0), 8));
            $this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());
            $this->DATE->EditAttrs["class"] = "form-control";
            $this->DATE->EditCustomAttributes = "";
            $this->DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->DATE->AdvancedSearch->SearchValue2, 0), 8));
            $this->DATE->PlaceHolder = RemoveHtml($this->DATE->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // RefferedBy
            $this->RefferedBy->EditAttrs["class"] = "form-control";
            $this->RefferedBy->EditCustomAttributes = "";
            if (!$this->RefferedBy->Raw) {
                $this->RefferedBy->AdvancedSearch->SearchValue = HtmlDecode($this->RefferedBy->AdvancedSearch->SearchValue);
            }
            $this->RefferedBy->EditValue = HtmlEncode($this->RefferedBy->AdvancedSearch->SearchValue);
            $this->RefferedBy->PlaceHolder = RemoveHtml($this->RefferedBy->caption());

            // CASES
            $this->CASES->EditAttrs["class"] = "form-control";
            $this->CASES->EditCustomAttributes = "";
            $this->CASES->EditValue = HtmlEncode($this->CASES->AdvancedSearch->SearchValue);
            $this->CASES->PlaceHolder = RemoveHtml($this->CASES->caption());

            // WARD
            $this->WARD->EditAttrs["class"] = "form-control";
            $this->WARD->EditCustomAttributes = "";
            $this->WARD->EditValue = HtmlEncode($this->WARD->AdvancedSearch->SearchValue);
            $this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());

            // OT
            $this->OT->EditAttrs["class"] = "form-control";
            $this->OT->EditCustomAttributes = "";
            $this->OT->EditValue = HtmlEncode($this->OT->AdvancedSearch->SearchValue);
            $this->OT->PlaceHolder = RemoveHtml($this->OT->caption());

            // IMPLANT
            $this->IMPLANT->EditAttrs["class"] = "form-control";
            $this->IMPLANT->EditCustomAttributes = "";
            $this->IMPLANT->EditValue = HtmlEncode($this->IMPLANT->AdvancedSearch->SearchValue);
            $this->IMPLANT->PlaceHolder = RemoveHtml($this->IMPLANT->caption());

            // LAB
            $this->LAB->EditAttrs["class"] = "form-control";
            $this->LAB->EditCustomAttributes = "";
            $this->LAB->EditValue = HtmlEncode($this->LAB->AdvancedSearch->SearchValue);
            $this->LAB->PlaceHolder = RemoveHtml($this->LAB->caption());

            // PHARMACY
            $this->PHARMACY->EditAttrs["class"] = "form-control";
            $this->PHARMACY->EditCustomAttributes = "";
            $this->PHARMACY->EditValue = HtmlEncode($this->PHARMACY->AdvancedSearch->SearchValue);
            $this->PHARMACY->PlaceHolder = RemoveHtml($this->PHARMACY->caption());

            // OUT SIDE DRS VISIT NAME Amount
            $this->OUTSIDEDRSVISITNAMEAmount->EditAttrs["class"] = "form-control";
            $this->OUTSIDEDRSVISITNAMEAmount->EditCustomAttributes = "";
            $this->OUTSIDEDRSVISITNAMEAmount->EditValue = HtmlEncode($this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->SearchValue);
            $this->OUTSIDEDRSVISITNAMEAmount->PlaceHolder = RemoveHtml($this->OUTSIDEDRSVISITNAMEAmount->caption());

            // PHYSIO Amount
            $this->PHYSIOAmount->EditAttrs["class"] = "form-control";
            $this->PHYSIOAmount->EditCustomAttributes = "";
            $this->PHYSIOAmount->EditValue = HtmlEncode($this->PHYSIOAmount->AdvancedSearch->SearchValue);
            $this->PHYSIOAmount->PlaceHolder = RemoveHtml($this->PHYSIOAmount->caption());

            // SURGEON Amount
            $this->SURGEONAmount->EditAttrs["class"] = "form-control";
            $this->SURGEONAmount->EditCustomAttributes = "";
            $this->SURGEONAmount->EditValue = HtmlEncode($this->SURGEONAmount->AdvancedSearch->SearchValue);
            $this->SURGEONAmount->PlaceHolder = RemoveHtml($this->SURGEONAmount->caption());

            // ASST SURGEON Amount
            $this->ASSTSURGEONAmount->EditAttrs["class"] = "form-control";
            $this->ASSTSURGEONAmount->EditCustomAttributes = "";
            $this->ASSTSURGEONAmount->EditValue = HtmlEncode($this->ASSTSURGEONAmount->AdvancedSearch->SearchValue);
            $this->ASSTSURGEONAmount->PlaceHolder = RemoveHtml($this->ASSTSURGEONAmount->caption());

            // ANESTHETIST Amount
            $this->ANESTHETISTAmount->EditAttrs["class"] = "form-control";
            $this->ANESTHETISTAmount->EditCustomAttributes = "";
            $this->ANESTHETISTAmount->EditValue = HtmlEncode($this->ANESTHETISTAmount->AdvancedSearch->SearchValue);
            $this->ANESTHETISTAmount->PlaceHolder = RemoveHtml($this->ANESTHETISTAmount->caption());

            // Others
            $this->_Others->EditAttrs["class"] = "form-control";
            $this->_Others->EditCustomAttributes = "";
            $this->_Others->EditValue = HtmlEncode($this->_Others->AdvancedSearch->SearchValue);
            $this->_Others->PlaceHolder = RemoveHtml($this->_Others->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            if (!$this->ModeofPayment->Raw) {
                $this->ModeofPayment->AdvancedSearch->SearchValue = HtmlDecode($this->ModeofPayment->AdvancedSearch->SearchValue);
            }
            $this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->AdvancedSearch->SearchValue);
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->AdvancedSearch->SearchValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());

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
        if (!CheckDate($this->DATE->AdvancedSearch->SearchValue)) {
            $this->DATE->addErrorMessage($this->DATE->getErrorMessage(false));
        }
        if (!CheckDate($this->DATE->AdvancedSearch->SearchValue2)) {
            $this->DATE->addErrorMessage($this->DATE->getErrorMessage(false));
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
        $this->DATE->AdvancedSearch->load();
        $this->BillNumber->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->RefferedBy->AdvancedSearch->load();
        $this->CASES->AdvancedSearch->load();
        $this->WARD->AdvancedSearch->load();
        $this->OT->AdvancedSearch->load();
        $this->IMPLANT->AdvancedSearch->load();
        $this->LAB->AdvancedSearch->load();
        $this->PHARMACY->AdvancedSearch->load();
        $this->OUTSIDEDRSVISITNAME->AdvancedSearch->load();
        $this->OUTSIDEDRSVISITNAMEAmount->AdvancedSearch->load();
        $this->PHYSIO->AdvancedSearch->load();
        $this->PHYSIOAmount->AdvancedSearch->load();
        $this->SURGEON->AdvancedSearch->load();
        $this->SURGEONAmount->AdvancedSearch->load();
        $this->ASSTSURGEON->AdvancedSearch->load();
        $this->ASSTSURGEONAmount->AdvancedSearch->load();
        $this->ANESTHETIST->AdvancedSearch->load();
        $this->ANESTHETISTAmount->AdvancedSearch->load();
        $this->_Others->AdvancedSearch->load();
        $this->OtherServices->AdvancedSearch->load();
        $this->Amount->AdvancedSearch->load();
        $this->ModeofPayment->AdvancedSearch->load();
        $this->Cash->AdvancedSearch->load();
        $this->Card->AdvancedSearch->load();
        $this->Remarks->AdvancedSearch->load();
        $this->DiscountRemarks->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_revenue_report_iplist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_revenue_report_iplist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_revenue_report_iplist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_revenue_report_ip" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_revenue_report_ip\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_revenue_report_iplist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = false;

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_revenue_report_iplistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
