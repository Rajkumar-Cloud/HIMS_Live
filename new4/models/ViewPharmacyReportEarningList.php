<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacyReportEarningList extends ViewPharmacyReportEarning
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacy_report_earning';

    // Page object name
    public $PageObjName = "ViewPharmacyReportEarningList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_pharmacy_report_earninglist";
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

        // Table object (view_pharmacy_report_earning)
        if (!isset($GLOBALS["view_pharmacy_report_earning"]) || get_class($GLOBALS["view_pharmacy_report_earning"]) == PROJECT_NAMESPACE . "view_pharmacy_report_earning") {
            $GLOBALS["view_pharmacy_report_earning"] = &$this;
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
        $this->AddUrl = "ViewPharmacyReportEarningAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewPharmacyReportEarningDelete";
        $this->MultiUpdateUrl = "ViewPharmacyReportEarningUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_report_earning');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacy_report_earninglistsrch";

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
                $doc = new $class(Container("view_pharmacy_report_earning"));
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
        $this->ProductCode->setVisibility();
        $this->ProductName->setVisibility();
        $this->SaleQuantity->setVisibility();
        $this->RT->setVisibility();
        $this->SaleValue->setVisibility();
        $this->PurRate->setVisibility();
        $this->PurchaseCostValue->Visible = false;
        $this->MarginAmount->Visible = false;
        $this->MarginOnSale->Visible = false;
        $this->MarginOnCost->Visible = false;
        $this->PurchaseCostValue1->setVisibility();
        $this->MarginAmount1->setVisibility();
        $this->MarginOnSale1->setVisibility();
        $this->MarginOnCost1->setVisibility();
        $this->Date->setVisibility();
        $this->BRCODE->setVisibility();
        $this->HosoID->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacy_report_earninglistsrch");
        }
        $filterList = Concat($filterList, $this->ProductCode->AdvancedSearch->toJson(), ","); // Field ProductCode
        $filterList = Concat($filterList, $this->ProductName->AdvancedSearch->toJson(), ","); // Field ProductName
        $filterList = Concat($filterList, $this->SaleQuantity->AdvancedSearch->toJson(), ","); // Field SaleQuantity
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->SaleValue->AdvancedSearch->toJson(), ","); // Field SaleValue
        $filterList = Concat($filterList, $this->PurRate->AdvancedSearch->toJson(), ","); // Field PurRate
        $filterList = Concat($filterList, $this->PurchaseCostValue->AdvancedSearch->toJson(), ","); // Field PurchaseCostValue
        $filterList = Concat($filterList, $this->MarginAmount->AdvancedSearch->toJson(), ","); // Field MarginAmount
        $filterList = Concat($filterList, $this->MarginOnSale->AdvancedSearch->toJson(), ","); // Field MarginOnSale
        $filterList = Concat($filterList, $this->MarginOnCost->AdvancedSearch->toJson(), ","); // Field MarginOnCost
        $filterList = Concat($filterList, $this->PurchaseCostValue1->AdvancedSearch->toJson(), ","); // Field PurchaseCostValue1
        $filterList = Concat($filterList, $this->MarginAmount1->AdvancedSearch->toJson(), ","); // Field MarginAmount1
        $filterList = Concat($filterList, $this->MarginOnSale1->AdvancedSearch->toJson(), ","); // Field MarginOnSale1
        $filterList = Concat($filterList, $this->MarginOnCost1->AdvancedSearch->toJson(), ","); // Field MarginOnCost1
        $filterList = Concat($filterList, $this->Date->AdvancedSearch->toJson(), ","); // Field Date
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacy_report_earninglistsrch", $filters);
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

        // Field ProductCode
        $this->ProductCode->AdvancedSearch->SearchValue = @$filter["x_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchOperator = @$filter["z_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchCondition = @$filter["v_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchValue2 = @$filter["y_ProductCode"];
        $this->ProductCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCode"];
        $this->ProductCode->AdvancedSearch->save();

        // Field ProductName
        $this->ProductName->AdvancedSearch->SearchValue = @$filter["x_ProductName"];
        $this->ProductName->AdvancedSearch->SearchOperator = @$filter["z_ProductName"];
        $this->ProductName->AdvancedSearch->SearchCondition = @$filter["v_ProductName"];
        $this->ProductName->AdvancedSearch->SearchValue2 = @$filter["y_ProductName"];
        $this->ProductName->AdvancedSearch->SearchOperator2 = @$filter["w_ProductName"];
        $this->ProductName->AdvancedSearch->save();

        // Field SaleQuantity
        $this->SaleQuantity->AdvancedSearch->SearchValue = @$filter["x_SaleQuantity"];
        $this->SaleQuantity->AdvancedSearch->SearchOperator = @$filter["z_SaleQuantity"];
        $this->SaleQuantity->AdvancedSearch->SearchCondition = @$filter["v_SaleQuantity"];
        $this->SaleQuantity->AdvancedSearch->SearchValue2 = @$filter["y_SaleQuantity"];
        $this->SaleQuantity->AdvancedSearch->SearchOperator2 = @$filter["w_SaleQuantity"];
        $this->SaleQuantity->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field SaleValue
        $this->SaleValue->AdvancedSearch->SearchValue = @$filter["x_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchOperator = @$filter["z_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchCondition = @$filter["v_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchValue2 = @$filter["y_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchOperator2 = @$filter["w_SaleValue"];
        $this->SaleValue->AdvancedSearch->save();

        // Field PurRate
        $this->PurRate->AdvancedSearch->SearchValue = @$filter["x_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator = @$filter["z_PurRate"];
        $this->PurRate->AdvancedSearch->SearchCondition = @$filter["v_PurRate"];
        $this->PurRate->AdvancedSearch->SearchValue2 = @$filter["y_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator2 = @$filter["w_PurRate"];
        $this->PurRate->AdvancedSearch->save();

        // Field PurchaseCostValue
        $this->PurchaseCostValue->AdvancedSearch->SearchValue = @$filter["x_PurchaseCostValue"];
        $this->PurchaseCostValue->AdvancedSearch->SearchOperator = @$filter["z_PurchaseCostValue"];
        $this->PurchaseCostValue->AdvancedSearch->SearchCondition = @$filter["v_PurchaseCostValue"];
        $this->PurchaseCostValue->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseCostValue"];
        $this->PurchaseCostValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseCostValue"];
        $this->PurchaseCostValue->AdvancedSearch->save();

        // Field MarginAmount
        $this->MarginAmount->AdvancedSearch->SearchValue = @$filter["x_MarginAmount"];
        $this->MarginAmount->AdvancedSearch->SearchOperator = @$filter["z_MarginAmount"];
        $this->MarginAmount->AdvancedSearch->SearchCondition = @$filter["v_MarginAmount"];
        $this->MarginAmount->AdvancedSearch->SearchValue2 = @$filter["y_MarginAmount"];
        $this->MarginAmount->AdvancedSearch->SearchOperator2 = @$filter["w_MarginAmount"];
        $this->MarginAmount->AdvancedSearch->save();

        // Field MarginOnSale
        $this->MarginOnSale->AdvancedSearch->SearchValue = @$filter["x_MarginOnSale"];
        $this->MarginOnSale->AdvancedSearch->SearchOperator = @$filter["z_MarginOnSale"];
        $this->MarginOnSale->AdvancedSearch->SearchCondition = @$filter["v_MarginOnSale"];
        $this->MarginOnSale->AdvancedSearch->SearchValue2 = @$filter["y_MarginOnSale"];
        $this->MarginOnSale->AdvancedSearch->SearchOperator2 = @$filter["w_MarginOnSale"];
        $this->MarginOnSale->AdvancedSearch->save();

        // Field MarginOnCost
        $this->MarginOnCost->AdvancedSearch->SearchValue = @$filter["x_MarginOnCost"];
        $this->MarginOnCost->AdvancedSearch->SearchOperator = @$filter["z_MarginOnCost"];
        $this->MarginOnCost->AdvancedSearch->SearchCondition = @$filter["v_MarginOnCost"];
        $this->MarginOnCost->AdvancedSearch->SearchValue2 = @$filter["y_MarginOnCost"];
        $this->MarginOnCost->AdvancedSearch->SearchOperator2 = @$filter["w_MarginOnCost"];
        $this->MarginOnCost->AdvancedSearch->save();

        // Field PurchaseCostValue1
        $this->PurchaseCostValue1->AdvancedSearch->SearchValue = @$filter["x_PurchaseCostValue1"];
        $this->PurchaseCostValue1->AdvancedSearch->SearchOperator = @$filter["z_PurchaseCostValue1"];
        $this->PurchaseCostValue1->AdvancedSearch->SearchCondition = @$filter["v_PurchaseCostValue1"];
        $this->PurchaseCostValue1->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseCostValue1"];
        $this->PurchaseCostValue1->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseCostValue1"];
        $this->PurchaseCostValue1->AdvancedSearch->save();

        // Field MarginAmount1
        $this->MarginAmount1->AdvancedSearch->SearchValue = @$filter["x_MarginAmount1"];
        $this->MarginAmount1->AdvancedSearch->SearchOperator = @$filter["z_MarginAmount1"];
        $this->MarginAmount1->AdvancedSearch->SearchCondition = @$filter["v_MarginAmount1"];
        $this->MarginAmount1->AdvancedSearch->SearchValue2 = @$filter["y_MarginAmount1"];
        $this->MarginAmount1->AdvancedSearch->SearchOperator2 = @$filter["w_MarginAmount1"];
        $this->MarginAmount1->AdvancedSearch->save();

        // Field MarginOnSale1
        $this->MarginOnSale1->AdvancedSearch->SearchValue = @$filter["x_MarginOnSale1"];
        $this->MarginOnSale1->AdvancedSearch->SearchOperator = @$filter["z_MarginOnSale1"];
        $this->MarginOnSale1->AdvancedSearch->SearchCondition = @$filter["v_MarginOnSale1"];
        $this->MarginOnSale1->AdvancedSearch->SearchValue2 = @$filter["y_MarginOnSale1"];
        $this->MarginOnSale1->AdvancedSearch->SearchOperator2 = @$filter["w_MarginOnSale1"];
        $this->MarginOnSale1->AdvancedSearch->save();

        // Field MarginOnCost1
        $this->MarginOnCost1->AdvancedSearch->SearchValue = @$filter["x_MarginOnCost1"];
        $this->MarginOnCost1->AdvancedSearch->SearchOperator = @$filter["z_MarginOnCost1"];
        $this->MarginOnCost1->AdvancedSearch->SearchCondition = @$filter["v_MarginOnCost1"];
        $this->MarginOnCost1->AdvancedSearch->SearchValue2 = @$filter["y_MarginOnCost1"];
        $this->MarginOnCost1->AdvancedSearch->SearchOperator2 = @$filter["w_MarginOnCost1"];
        $this->MarginOnCost1->AdvancedSearch->save();

        // Field Date
        $this->Date->AdvancedSearch->SearchValue = @$filter["x_Date"];
        $this->Date->AdvancedSearch->SearchOperator = @$filter["z_Date"];
        $this->Date->AdvancedSearch->SearchCondition = @$filter["v_Date"];
        $this->Date->AdvancedSearch->SearchValue2 = @$filter["y_Date"];
        $this->Date->AdvancedSearch->SearchOperator2 = @$filter["w_Date"];
        $this->Date->AdvancedSearch->save();

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field HosoID
        $this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
        $this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
        $this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
        $this->HosoID->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->ProductCode, $default, false); // ProductCode
        $this->buildSearchSql($where, $this->ProductName, $default, false); // ProductName
        $this->buildSearchSql($where, $this->SaleQuantity, $default, false); // SaleQuantity
        $this->buildSearchSql($where, $this->RT, $default, false); // RT
        $this->buildSearchSql($where, $this->SaleValue, $default, false); // SaleValue
        $this->buildSearchSql($where, $this->PurRate, $default, false); // PurRate
        $this->buildSearchSql($where, $this->PurchaseCostValue, $default, false); // PurchaseCostValue
        $this->buildSearchSql($where, $this->MarginAmount, $default, false); // MarginAmount
        $this->buildSearchSql($where, $this->MarginOnSale, $default, false); // MarginOnSale
        $this->buildSearchSql($where, $this->MarginOnCost, $default, false); // MarginOnCost
        $this->buildSearchSql($where, $this->PurchaseCostValue1, $default, false); // PurchaseCostValue1
        $this->buildSearchSql($where, $this->MarginAmount1, $default, false); // MarginAmount1
        $this->buildSearchSql($where, $this->MarginOnSale1, $default, false); // MarginOnSale1
        $this->buildSearchSql($where, $this->MarginOnCost1, $default, false); // MarginOnCost1
        $this->buildSearchSql($where, $this->Date, $default, false); // Date
        $this->buildSearchSql($where, $this->BRCODE, $default, false); // BRCODE
        $this->buildSearchSql($where, $this->HosoID, $default, false); // HosoID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->ProductCode->AdvancedSearch->save(); // ProductCode
            $this->ProductName->AdvancedSearch->save(); // ProductName
            $this->SaleQuantity->AdvancedSearch->save(); // SaleQuantity
            $this->RT->AdvancedSearch->save(); // RT
            $this->SaleValue->AdvancedSearch->save(); // SaleValue
            $this->PurRate->AdvancedSearch->save(); // PurRate
            $this->PurchaseCostValue->AdvancedSearch->save(); // PurchaseCostValue
            $this->MarginAmount->AdvancedSearch->save(); // MarginAmount
            $this->MarginOnSale->AdvancedSearch->save(); // MarginOnSale
            $this->MarginOnCost->AdvancedSearch->save(); // MarginOnCost
            $this->PurchaseCostValue1->AdvancedSearch->save(); // PurchaseCostValue1
            $this->MarginAmount1->AdvancedSearch->save(); // MarginAmount1
            $this->MarginOnSale1->AdvancedSearch->save(); // MarginOnSale1
            $this->MarginOnCost1->AdvancedSearch->save(); // MarginOnCost1
            $this->Date->AdvancedSearch->save(); // Date
            $this->BRCODE->AdvancedSearch->save(); // BRCODE
            $this->HosoID->AdvancedSearch->save(); // HosoID
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
        $this->buildBasicSearchSql($where, $this->ProductCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProductName, $arKeywords, $type);
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
        if ($this->ProductCode->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProductName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SaleQuantity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SaleValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurRate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurchaseCostValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginOnSale->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginOnCost->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurchaseCostValue1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginAmount1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginOnSale1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MarginOnCost1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HosoID->AdvancedSearch->issetSession()) {
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
                $this->ProductCode->AdvancedSearch->unsetSession();
                $this->ProductName->AdvancedSearch->unsetSession();
                $this->SaleQuantity->AdvancedSearch->unsetSession();
                $this->RT->AdvancedSearch->unsetSession();
                $this->SaleValue->AdvancedSearch->unsetSession();
                $this->PurRate->AdvancedSearch->unsetSession();
                $this->PurchaseCostValue->AdvancedSearch->unsetSession();
                $this->MarginAmount->AdvancedSearch->unsetSession();
                $this->MarginOnSale->AdvancedSearch->unsetSession();
                $this->MarginOnCost->AdvancedSearch->unsetSession();
                $this->PurchaseCostValue1->AdvancedSearch->unsetSession();
                $this->MarginAmount1->AdvancedSearch->unsetSession();
                $this->MarginOnSale1->AdvancedSearch->unsetSession();
                $this->MarginOnCost1->AdvancedSearch->unsetSession();
                $this->Date->AdvancedSearch->unsetSession();
                $this->BRCODE->AdvancedSearch->unsetSession();
                $this->HosoID->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->ProductCode->AdvancedSearch->load();
                $this->ProductName->AdvancedSearch->load();
                $this->SaleQuantity->AdvancedSearch->load();
                $this->RT->AdvancedSearch->load();
                $this->SaleValue->AdvancedSearch->load();
                $this->PurRate->AdvancedSearch->load();
                $this->PurchaseCostValue->AdvancedSearch->load();
                $this->MarginAmount->AdvancedSearch->load();
                $this->MarginOnSale->AdvancedSearch->load();
                $this->MarginOnCost->AdvancedSearch->load();
                $this->PurchaseCostValue1->AdvancedSearch->load();
                $this->MarginAmount1->AdvancedSearch->load();
                $this->MarginOnSale1->AdvancedSearch->load();
                $this->MarginOnCost1->AdvancedSearch->load();
                $this->Date->AdvancedSearch->load();
                $this->BRCODE->AdvancedSearch->load();
                $this->HosoID->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->ProductCode); // ProductCode
            $this->updateSort($this->ProductName); // ProductName
            $this->updateSort($this->SaleQuantity); // SaleQuantity
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->SaleValue); // SaleValue
            $this->updateSort($this->PurRate); // PurRate
            $this->updateSort($this->PurchaseCostValue1); // PurchaseCostValue1
            $this->updateSort($this->MarginAmount1); // MarginAmount1
            $this->updateSort($this->MarginOnSale1); // MarginOnSale1
            $this->updateSort($this->MarginOnCost1); // MarginOnCost1
            $this->updateSort($this->Date); // Date
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->HosoID); // HosoID
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
                $this->ProductCode->setSort("");
                $this->ProductName->setSort("");
                $this->SaleQuantity->setSort("");
                $this->RT->setSort("");
                $this->SaleValue->setSort("");
                $this->PurRate->setSort("");
                $this->PurchaseCostValue->setSort("");
                $this->MarginAmount->setSort("");
                $this->MarginOnSale->setSort("");
                $this->MarginOnCost->setSort("");
                $this->PurchaseCostValue1->setSort("");
                $this->MarginAmount1->setSort("");
                $this->MarginOnSale1->setSort("");
                $this->MarginOnCost1->setSort("");
                $this->Date->setSort("");
                $this->BRCODE->setSort("");
                $this->HosoID->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacy_report_earninglistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacy_report_earninglistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_pharmacy_report_earninglist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // ProductCode
        if (!$this->isAddOrEdit() && $this->ProductCode->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProductCode->AdvancedSearch->SearchValue != "" || $this->ProductCode->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProductName
        if (!$this->isAddOrEdit() && $this->ProductName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProductName->AdvancedSearch->SearchValue != "" || $this->ProductName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SaleQuantity
        if (!$this->isAddOrEdit() && $this->SaleQuantity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SaleQuantity->AdvancedSearch->SearchValue != "" || $this->SaleQuantity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RT
        if (!$this->isAddOrEdit() && $this->RT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RT->AdvancedSearch->SearchValue != "" || $this->RT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SaleValue
        if (!$this->isAddOrEdit() && $this->SaleValue->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SaleValue->AdvancedSearch->SearchValue != "" || $this->SaleValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurRate
        if (!$this->isAddOrEdit() && $this->PurRate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurRate->AdvancedSearch->SearchValue != "" || $this->PurRate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurchaseCostValue
        if (!$this->isAddOrEdit() && $this->PurchaseCostValue->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurchaseCostValue->AdvancedSearch->SearchValue != "" || $this->PurchaseCostValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginAmount
        if (!$this->isAddOrEdit() && $this->MarginAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginAmount->AdvancedSearch->SearchValue != "" || $this->MarginAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginOnSale
        if (!$this->isAddOrEdit() && $this->MarginOnSale->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginOnSale->AdvancedSearch->SearchValue != "" || $this->MarginOnSale->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginOnCost
        if (!$this->isAddOrEdit() && $this->MarginOnCost->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginOnCost->AdvancedSearch->SearchValue != "" || $this->MarginOnCost->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurchaseCostValue1
        if (!$this->isAddOrEdit() && $this->PurchaseCostValue1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurchaseCostValue1->AdvancedSearch->SearchValue != "" || $this->PurchaseCostValue1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginAmount1
        if (!$this->isAddOrEdit() && $this->MarginAmount1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginAmount1->AdvancedSearch->SearchValue != "" || $this->MarginAmount1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginOnSale1
        if (!$this->isAddOrEdit() && $this->MarginOnSale1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginOnSale1->AdvancedSearch->SearchValue != "" || $this->MarginOnSale1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MarginOnCost1
        if (!$this->isAddOrEdit() && $this->MarginOnCost1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MarginOnCost1->AdvancedSearch->SearchValue != "" || $this->MarginOnCost1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Date
        if (!$this->isAddOrEdit() && $this->Date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Date->AdvancedSearch->SearchValue != "" || $this->Date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BRCODE
        if (!$this->isAddOrEdit() && $this->BRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BRCODE->AdvancedSearch->SearchValue != "" || $this->BRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HosoID
        if (!$this->isAddOrEdit() && $this->HosoID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HosoID->AdvancedSearch->SearchValue != "" || $this->HosoID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->ProductCode->setDbValue($row['ProductCode']);
        $this->ProductName->setDbValue($row['ProductName']);
        $this->SaleQuantity->setDbValue($row['SaleQuantity']);
        $this->RT->setDbValue($row['RT']);
        $this->SaleValue->setDbValue($row['SaleValue']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->PurchaseCostValue->setDbValue($row['PurchaseCostValue']);
        $this->MarginAmount->setDbValue($row['MarginAmount']);
        $this->MarginOnSale->setDbValue($row['MarginOnSale']);
        $this->MarginOnCost->setDbValue($row['MarginOnCost']);
        $this->PurchaseCostValue1->setDbValue($row['PurchaseCostValue1']);
        $this->MarginAmount1->setDbValue($row['MarginAmount1']);
        $this->MarginOnSale1->setDbValue($row['MarginOnSale1']);
        $this->MarginOnCost1->setDbValue($row['MarginOnCost1']);
        $this->Date->setDbValue($row['Date']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HosoID->setDbValue($row['HosoID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['ProductCode'] = null;
        $row['ProductName'] = null;
        $row['SaleQuantity'] = null;
        $row['RT'] = null;
        $row['SaleValue'] = null;
        $row['PurRate'] = null;
        $row['PurchaseCostValue'] = null;
        $row['MarginAmount'] = null;
        $row['MarginOnSale'] = null;
        $row['MarginOnCost'] = null;
        $row['PurchaseCostValue1'] = null;
        $row['MarginAmount1'] = null;
        $row['MarginOnSale1'] = null;
        $row['MarginOnCost1'] = null;
        $row['Date'] = null;
        $row['BRCODE'] = null;
        $row['HosoID'] = null;
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
        if ($this->SaleQuantity->FormValue == $this->SaleQuantity->CurrentValue && is_numeric(ConvertToFloatString($this->SaleQuantity->CurrentValue))) {
            $this->SaleQuantity->CurrentValue = ConvertToFloatString($this->SaleQuantity->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue))) {
            $this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchaseCostValue1->FormValue == $this->PurchaseCostValue1->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseCostValue1->CurrentValue))) {
            $this->PurchaseCostValue1->CurrentValue = ConvertToFloatString($this->PurchaseCostValue1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarginAmount1->FormValue == $this->MarginAmount1->CurrentValue && is_numeric(ConvertToFloatString($this->MarginAmount1->CurrentValue))) {
            $this->MarginAmount1->CurrentValue = ConvertToFloatString($this->MarginAmount1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarginOnSale1->FormValue == $this->MarginOnSale1->CurrentValue && is_numeric(ConvertToFloatString($this->MarginOnSale1->CurrentValue))) {
            $this->MarginOnSale1->CurrentValue = ConvertToFloatString($this->MarginOnSale1->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MarginOnCost1->FormValue == $this->MarginOnCost1->CurrentValue && is_numeric(ConvertToFloatString($this->MarginOnCost1->CurrentValue))) {
            $this->MarginOnCost1->CurrentValue = ConvertToFloatString($this->MarginOnCost1->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ProductCode

        // ProductName

        // SaleQuantity

        // RT

        // SaleValue

        // PurRate

        // PurchaseCostValue

        // MarginAmount

        // MarginOnSale

        // MarginOnCost

        // PurchaseCostValue1

        // MarginAmount1

        // MarginOnSale1

        // MarginOnCost1

        // Date

        // BRCODE

        // HosoID

        // Accumulate aggregate value
        if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
            if (is_numeric($this->SaleValue->CurrentValue)) {
                $this->SaleValue->Total += $this->SaleValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->PurchaseCostValue->CurrentValue)) {
                $this->PurchaseCostValue->Total += $this->PurchaseCostValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginAmount->CurrentValue)) {
                $this->MarginAmount->Total += $this->MarginAmount->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->PurchaseCostValue1->CurrentValue)) {
                $this->PurchaseCostValue1->Total += $this->PurchaseCostValue1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginAmount1->CurrentValue)) {
                $this->MarginAmount1->Total += $this->MarginAmount1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginOnSale1->CurrentValue)) {
                $this->MarginOnSale1->Total += $this->MarginOnSale1->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->MarginOnCost1->CurrentValue)) {
                $this->MarginOnCost1->Total += $this->MarginOnCost1->CurrentValue; // Accumulate total
            }
        }
        if ($this->RowType == ROWTYPE_VIEW) {
            // ProductCode
            $this->ProductCode->ViewValue = $this->ProductCode->CurrentValue;
            $this->ProductCode->ViewCustomAttributes = "";

            // ProductName
            $this->ProductName->ViewValue = $this->ProductName->CurrentValue;
            $this->ProductName->ViewCustomAttributes = "";

            // SaleQuantity
            $this->SaleQuantity->ViewValue = $this->SaleQuantity->CurrentValue;
            $this->SaleQuantity->ViewValue = FormatNumber($this->SaleQuantity->ViewValue, 2, -2, -2, -2);
            $this->SaleQuantity->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // SaleValue
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // PurchaseCostValue1
            $this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
            $this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
            $this->PurchaseCostValue1->ViewCustomAttributes = "";

            // MarginAmount1
            $this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
            $this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
            $this->MarginAmount1->ViewCustomAttributes = "";

            // MarginOnSale1
            $this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
            $this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnSale1->ViewCustomAttributes = "";

            // MarginOnCost1
            $this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
            $this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnCost1->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

            // ProductCode
            $this->ProductCode->LinkCustomAttributes = "";
            $this->ProductCode->HrefValue = "";
            $this->ProductCode->TooltipValue = "";

            // ProductName
            $this->ProductName->LinkCustomAttributes = "";
            $this->ProductName->HrefValue = "";
            $this->ProductName->TooltipValue = "";

            // SaleQuantity
            $this->SaleQuantity->LinkCustomAttributes = "";
            $this->SaleQuantity->HrefValue = "";
            $this->SaleQuantity->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // SaleValue
            $this->SaleValue->LinkCustomAttributes = "";
            $this->SaleValue->HrefValue = "";
            $this->SaleValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";

            // PurchaseCostValue1
            $this->PurchaseCostValue1->LinkCustomAttributes = "";
            $this->PurchaseCostValue1->HrefValue = "";
            $this->PurchaseCostValue1->TooltipValue = "";

            // MarginAmount1
            $this->MarginAmount1->LinkCustomAttributes = "";
            $this->MarginAmount1->HrefValue = "";
            $this->MarginAmount1->TooltipValue = "";

            // MarginOnSale1
            $this->MarginOnSale1->LinkCustomAttributes = "";
            $this->MarginOnSale1->HrefValue = "";
            $this->MarginOnSale1->TooltipValue = "";

            // MarginOnCost1
            $this->MarginOnCost1->LinkCustomAttributes = "";
            $this->MarginOnCost1->HrefValue = "";
            $this->MarginOnCost1->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // ProductCode
            $this->ProductCode->EditAttrs["class"] = "form-control";
            $this->ProductCode->EditCustomAttributes = "";
            if (!$this->ProductCode->Raw) {
                $this->ProductCode->AdvancedSearch->SearchValue = HtmlDecode($this->ProductCode->AdvancedSearch->SearchValue);
            }
            $this->ProductCode->EditValue = HtmlEncode($this->ProductCode->AdvancedSearch->SearchValue);
            $this->ProductCode->PlaceHolder = RemoveHtml($this->ProductCode->caption());

            // ProductName
            $this->ProductName->EditAttrs["class"] = "form-control";
            $this->ProductName->EditCustomAttributes = "";
            if (!$this->ProductName->Raw) {
                $this->ProductName->AdvancedSearch->SearchValue = HtmlDecode($this->ProductName->AdvancedSearch->SearchValue);
            }
            $this->ProductName->EditValue = HtmlEncode($this->ProductName->AdvancedSearch->SearchValue);
            $this->ProductName->PlaceHolder = RemoveHtml($this->ProductName->caption());

            // SaleQuantity
            $this->SaleQuantity->EditAttrs["class"] = "form-control";
            $this->SaleQuantity->EditCustomAttributes = "";
            $this->SaleQuantity->EditValue = HtmlEncode($this->SaleQuantity->AdvancedSearch->SearchValue);
            $this->SaleQuantity->PlaceHolder = RemoveHtml($this->SaleQuantity->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // SaleValue
            $this->SaleValue->EditAttrs["class"] = "form-control";
            $this->SaleValue->EditCustomAttributes = "";
            $this->SaleValue->EditValue = HtmlEncode($this->SaleValue->AdvancedSearch->SearchValue);
            $this->SaleValue->PlaceHolder = RemoveHtml($this->SaleValue->caption());

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->AdvancedSearch->SearchValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());

            // PurchaseCostValue1
            $this->PurchaseCostValue1->EditAttrs["class"] = "form-control";
            $this->PurchaseCostValue1->EditCustomAttributes = "";
            $this->PurchaseCostValue1->EditValue = HtmlEncode($this->PurchaseCostValue1->AdvancedSearch->SearchValue);
            $this->PurchaseCostValue1->PlaceHolder = RemoveHtml($this->PurchaseCostValue1->caption());

            // MarginAmount1
            $this->MarginAmount1->EditAttrs["class"] = "form-control";
            $this->MarginAmount1->EditCustomAttributes = "";
            $this->MarginAmount1->EditValue = HtmlEncode($this->MarginAmount1->AdvancedSearch->SearchValue);
            $this->MarginAmount1->PlaceHolder = RemoveHtml($this->MarginAmount1->caption());

            // MarginOnSale1
            $this->MarginOnSale1->EditAttrs["class"] = "form-control";
            $this->MarginOnSale1->EditCustomAttributes = "";
            $this->MarginOnSale1->EditValue = HtmlEncode($this->MarginOnSale1->AdvancedSearch->SearchValue);
            $this->MarginOnSale1->PlaceHolder = RemoveHtml($this->MarginOnSale1->caption());

            // MarginOnCost1
            $this->MarginOnCost1->EditAttrs["class"] = "form-control";
            $this->MarginOnCost1->EditCustomAttributes = "";
            $this->MarginOnCost1->EditValue = HtmlEncode($this->MarginOnCost1->AdvancedSearch->SearchValue);
            $this->MarginOnCost1->PlaceHolder = RemoveHtml($this->MarginOnCost1->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue, 0), 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue2, 0), 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HosoID
            $this->HosoID->EditAttrs["class"] = "form-control";
            $this->HosoID->EditCustomAttributes = "";
            $this->HosoID->EditValue = HtmlEncode($this->HosoID->AdvancedSearch->SearchValue);
            $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());
        } elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
                    $this->SaleValue->Total = 0; // Initialize total
                    $this->PurchaseCostValue->Total = 0; // Initialize total
                    $this->MarginAmount->Total = 0; // Initialize total
                    $this->PurchaseCostValue1->Total = 0; // Initialize total
                    $this->MarginAmount1->Total = 0; // Initialize total
                    $this->MarginOnSale1->Total = 0; // Initialize total
                    $this->MarginOnCost1->Total = 0; // Initialize total
        } elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
            $this->SaleValue->CurrentValue = $this->SaleValue->Total;
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";
            $this->SaleValue->HrefValue = ""; // Clear href value
            $this->PurchaseCostValue->CurrentValue = $this->PurchaseCostValue->Total;
            $this->PurchaseCostValue->ViewValue = $this->PurchaseCostValue->CurrentValue;
            $this->PurchaseCostValue->ViewValue = FormatNumber($this->PurchaseCostValue->ViewValue, 2, -2, -2, -2);
            $this->PurchaseCostValue->ViewCustomAttributes = "";
            $this->PurchaseCostValue->HrefValue = ""; // Clear href value
            $this->MarginAmount->CurrentValue = $this->MarginAmount->Total;
            $this->MarginAmount->ViewValue = $this->MarginAmount->CurrentValue;
            $this->MarginAmount->ViewValue = FormatNumber($this->MarginAmount->ViewValue, 2, -2, -2, -2);
            $this->MarginAmount->ViewCustomAttributes = "";
            $this->MarginAmount->HrefValue = ""; // Clear href value
            $this->PurchaseCostValue1->CurrentValue = $this->PurchaseCostValue1->Total;
            $this->PurchaseCostValue1->ViewValue = $this->PurchaseCostValue1->CurrentValue;
            $this->PurchaseCostValue1->ViewValue = FormatNumber($this->PurchaseCostValue1->ViewValue, 2, -2, -2, -2);
            $this->PurchaseCostValue1->ViewCustomAttributes = "";
            $this->PurchaseCostValue1->HrefValue = ""; // Clear href value
            $this->MarginAmount1->CurrentValue = $this->MarginAmount1->Total;
            $this->MarginAmount1->ViewValue = $this->MarginAmount1->CurrentValue;
            $this->MarginAmount1->ViewValue = FormatNumber($this->MarginAmount1->ViewValue, 2, -2, -2, -2);
            $this->MarginAmount1->ViewCustomAttributes = "";
            $this->MarginAmount1->HrefValue = ""; // Clear href value
            $this->MarginOnSale1->CurrentValue = $this->MarginOnSale1->Total;
            $this->MarginOnSale1->ViewValue = $this->MarginOnSale1->CurrentValue;
            $this->MarginOnSale1->ViewValue = FormatNumber($this->MarginOnSale1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnSale1->ViewCustomAttributes = "";
            $this->MarginOnSale1->HrefValue = ""; // Clear href value
            $this->MarginOnCost1->CurrentValue = $this->MarginOnCost1->Total;
            $this->MarginOnCost1->ViewValue = $this->MarginOnCost1->CurrentValue;
            $this->MarginOnCost1->ViewValue = FormatNumber($this->MarginOnCost1->ViewValue, 2, -2, -2, -2);
            $this->MarginOnCost1->ViewCustomAttributes = "";
            $this->MarginOnCost1->HrefValue = ""; // Clear href value
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
        if (!CheckDate($this->Date->AdvancedSearch->SearchValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
        }
        if (!CheckDate($this->Date->AdvancedSearch->SearchValue2)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
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
        $this->ProductCode->AdvancedSearch->load();
        $this->ProductName->AdvancedSearch->load();
        $this->SaleQuantity->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->SaleValue->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
        $this->PurchaseCostValue->AdvancedSearch->load();
        $this->MarginAmount->AdvancedSearch->load();
        $this->MarginOnSale->AdvancedSearch->load();
        $this->MarginOnCost->AdvancedSearch->load();
        $this->PurchaseCostValue1->AdvancedSearch->load();
        $this->MarginAmount1->AdvancedSearch->load();
        $this->MarginOnSale1->AdvancedSearch->load();
        $this->MarginOnCost1->AdvancedSearch->load();
        $this->Date->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->HosoID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_report_earninglist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_report_earninglist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_report_earninglist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_pharmacy_report_earning" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_pharmacy_report_earning\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_pharmacy_report_earninglist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacy_report_earninglistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
