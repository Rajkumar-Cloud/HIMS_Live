<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyStockMovementList extends PharmacyStockMovement
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_stock_movement';

    // Page object name
    public $PageObjName = "PharmacyStockMovementList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpharmacy_stock_movementlist";
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

        // Table object (pharmacy_stock_movement)
        if (!isset($GLOBALS["pharmacy_stock_movement"]) || get_class($GLOBALS["pharmacy_stock_movement"]) == PROJECT_NAMESPACE . "pharmacy_stock_movement") {
            $GLOBALS["pharmacy_stock_movement"] = &$this;
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
        $this->AddUrl = "PharmacyStockMovementAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PharmacyStockMovementDelete";
        $this->MultiUpdateUrl = "PharmacyStockMovementUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_stock_movement');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_stock_movementlistsrch";

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
                $doc = new $class(Container("pharmacy_stock_movement"));
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
        $this->PRC->setVisibility();
        $this->PrName->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->OpeningStk->setVisibility();
        $this->PurchaseQty->setVisibility();
        $this->SalesQty->setVisibility();
        $this->ClosingStk->setVisibility();
        $this->PurchasefreeQty->setVisibility();
        $this->TransferingQty->setVisibility();
        $this->UnitPurchaseRate->setVisibility();
        $this->UnitSaleRate->setVisibility();
        $this->CreatedDate->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->UR->setVisibility();
        $this->RT->setVisibility();
        $this->PRCODE->setVisibility();
        $this->BATCH->setVisibility();
        $this->PC->setVisibility();
        $this->OLDRT->setVisibility();
        $this->TEMPMRQ->setVisibility();
        $this->TAXP->setVisibility();
        $this->OLDRATE->setVisibility();
        $this->NEWRATE->setVisibility();
        $this->OTEMPMRA->setVisibility();
        $this->ACTIVESTATUS->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->BRCODE->setVisibility();
        $this->FRQ->setVisibility();
        $this->HospID->setVisibility();
        $this->UM->setVisibility();
        $this->GENNAME->setVisibility();
        $this->BILLDATE->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->baid->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_stock_movementlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->PrName->AdvancedSearch->toJson(), ","); // Field PrName
        $filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
        $filterList = Concat($filterList, $this->OpeningStk->AdvancedSearch->toJson(), ","); // Field OpeningStk
        $filterList = Concat($filterList, $this->PurchaseQty->AdvancedSearch->toJson(), ","); // Field PurchaseQty
        $filterList = Concat($filterList, $this->SalesQty->AdvancedSearch->toJson(), ","); // Field SalesQty
        $filterList = Concat($filterList, $this->ClosingStk->AdvancedSearch->toJson(), ","); // Field ClosingStk
        $filterList = Concat($filterList, $this->PurchasefreeQty->AdvancedSearch->toJson(), ","); // Field PurchasefreeQty
        $filterList = Concat($filterList, $this->TransferingQty->AdvancedSearch->toJson(), ","); // Field TransferingQty
        $filterList = Concat($filterList, $this->UnitPurchaseRate->AdvancedSearch->toJson(), ","); // Field UnitPurchaseRate
        $filterList = Concat($filterList, $this->UnitSaleRate->AdvancedSearch->toJson(), ","); // Field UnitSaleRate
        $filterList = Concat($filterList, $this->CreatedDate->AdvancedSearch->toJson(), ","); // Field CreatedDate
        $filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
        $filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
        $filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
        $filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
        $filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
        $filterList = Concat($filterList, $this->BATCH->AdvancedSearch->toJson(), ","); // Field BATCH
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->OLDRT->AdvancedSearch->toJson(), ","); // Field OLDRT
        $filterList = Concat($filterList, $this->TEMPMRQ->AdvancedSearch->toJson(), ","); // Field TEMPMRQ
        $filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
        $filterList = Concat($filterList, $this->OLDRATE->AdvancedSearch->toJson(), ","); // Field OLDRATE
        $filterList = Concat($filterList, $this->NEWRATE->AdvancedSearch->toJson(), ","); // Field NEWRATE
        $filterList = Concat($filterList, $this->OTEMPMRA->AdvancedSearch->toJson(), ","); // Field OTEMPMRA
        $filterList = Concat($filterList, $this->ACTIVESTATUS->AdvancedSearch->toJson(), ","); // Field ACTIVESTATUS
        $filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
        $filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
        $filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
        $filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->FRQ->AdvancedSearch->toJson(), ","); // Field FRQ
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->UM->AdvancedSearch->toJson(), ","); // Field UM
        $filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
        $filterList = Concat($filterList, $this->BILLDATE->AdvancedSearch->toJson(), ","); // Field BILLDATE
        $filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
        $filterList = Concat($filterList, $this->baid->AdvancedSearch->toJson(), ","); // Field baid
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_stock_movementlistsrch", $filters);
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

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

        // Field PrName
        $this->PrName->AdvancedSearch->SearchValue = @$filter["x_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator = @$filter["z_PrName"];
        $this->PrName->AdvancedSearch->SearchCondition = @$filter["v_PrName"];
        $this->PrName->AdvancedSearch->SearchValue2 = @$filter["y_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator2 = @$filter["w_PrName"];
        $this->PrName->AdvancedSearch->save();

        // Field BATCHNO
        $this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->save();

        // Field OpeningStk
        $this->OpeningStk->AdvancedSearch->SearchValue = @$filter["x_OpeningStk"];
        $this->OpeningStk->AdvancedSearch->SearchOperator = @$filter["z_OpeningStk"];
        $this->OpeningStk->AdvancedSearch->SearchCondition = @$filter["v_OpeningStk"];
        $this->OpeningStk->AdvancedSearch->SearchValue2 = @$filter["y_OpeningStk"];
        $this->OpeningStk->AdvancedSearch->SearchOperator2 = @$filter["w_OpeningStk"];
        $this->OpeningStk->AdvancedSearch->save();

        // Field PurchaseQty
        $this->PurchaseQty->AdvancedSearch->SearchValue = @$filter["x_PurchaseQty"];
        $this->PurchaseQty->AdvancedSearch->SearchOperator = @$filter["z_PurchaseQty"];
        $this->PurchaseQty->AdvancedSearch->SearchCondition = @$filter["v_PurchaseQty"];
        $this->PurchaseQty->AdvancedSearch->SearchValue2 = @$filter["y_PurchaseQty"];
        $this->PurchaseQty->AdvancedSearch->SearchOperator2 = @$filter["w_PurchaseQty"];
        $this->PurchaseQty->AdvancedSearch->save();

        // Field SalesQty
        $this->SalesQty->AdvancedSearch->SearchValue = @$filter["x_SalesQty"];
        $this->SalesQty->AdvancedSearch->SearchOperator = @$filter["z_SalesQty"];
        $this->SalesQty->AdvancedSearch->SearchCondition = @$filter["v_SalesQty"];
        $this->SalesQty->AdvancedSearch->SearchValue2 = @$filter["y_SalesQty"];
        $this->SalesQty->AdvancedSearch->SearchOperator2 = @$filter["w_SalesQty"];
        $this->SalesQty->AdvancedSearch->save();

        // Field ClosingStk
        $this->ClosingStk->AdvancedSearch->SearchValue = @$filter["x_ClosingStk"];
        $this->ClosingStk->AdvancedSearch->SearchOperator = @$filter["z_ClosingStk"];
        $this->ClosingStk->AdvancedSearch->SearchCondition = @$filter["v_ClosingStk"];
        $this->ClosingStk->AdvancedSearch->SearchValue2 = @$filter["y_ClosingStk"];
        $this->ClosingStk->AdvancedSearch->SearchOperator2 = @$filter["w_ClosingStk"];
        $this->ClosingStk->AdvancedSearch->save();

        // Field PurchasefreeQty
        $this->PurchasefreeQty->AdvancedSearch->SearchValue = @$filter["x_PurchasefreeQty"];
        $this->PurchasefreeQty->AdvancedSearch->SearchOperator = @$filter["z_PurchasefreeQty"];
        $this->PurchasefreeQty->AdvancedSearch->SearchCondition = @$filter["v_PurchasefreeQty"];
        $this->PurchasefreeQty->AdvancedSearch->SearchValue2 = @$filter["y_PurchasefreeQty"];
        $this->PurchasefreeQty->AdvancedSearch->SearchOperator2 = @$filter["w_PurchasefreeQty"];
        $this->PurchasefreeQty->AdvancedSearch->save();

        // Field TransferingQty
        $this->TransferingQty->AdvancedSearch->SearchValue = @$filter["x_TransferingQty"];
        $this->TransferingQty->AdvancedSearch->SearchOperator = @$filter["z_TransferingQty"];
        $this->TransferingQty->AdvancedSearch->SearchCondition = @$filter["v_TransferingQty"];
        $this->TransferingQty->AdvancedSearch->SearchValue2 = @$filter["y_TransferingQty"];
        $this->TransferingQty->AdvancedSearch->SearchOperator2 = @$filter["w_TransferingQty"];
        $this->TransferingQty->AdvancedSearch->save();

        // Field UnitPurchaseRate
        $this->UnitPurchaseRate->AdvancedSearch->SearchValue = @$filter["x_UnitPurchaseRate"];
        $this->UnitPurchaseRate->AdvancedSearch->SearchOperator = @$filter["z_UnitPurchaseRate"];
        $this->UnitPurchaseRate->AdvancedSearch->SearchCondition = @$filter["v_UnitPurchaseRate"];
        $this->UnitPurchaseRate->AdvancedSearch->SearchValue2 = @$filter["y_UnitPurchaseRate"];
        $this->UnitPurchaseRate->AdvancedSearch->SearchOperator2 = @$filter["w_UnitPurchaseRate"];
        $this->UnitPurchaseRate->AdvancedSearch->save();

        // Field UnitSaleRate
        $this->UnitSaleRate->AdvancedSearch->SearchValue = @$filter["x_UnitSaleRate"];
        $this->UnitSaleRate->AdvancedSearch->SearchOperator = @$filter["z_UnitSaleRate"];
        $this->UnitSaleRate->AdvancedSearch->SearchCondition = @$filter["v_UnitSaleRate"];
        $this->UnitSaleRate->AdvancedSearch->SearchValue2 = @$filter["y_UnitSaleRate"];
        $this->UnitSaleRate->AdvancedSearch->SearchOperator2 = @$filter["w_UnitSaleRate"];
        $this->UnitSaleRate->AdvancedSearch->save();

        // Field CreatedDate
        $this->CreatedDate->AdvancedSearch->SearchValue = @$filter["x_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchOperator = @$filter["z_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchCondition = @$filter["v_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->save();

        // Field OQ
        $this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
        $this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
        $this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
        $this->OQ->AdvancedSearch->save();

        // Field RQ
        $this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
        $this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
        $this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
        $this->RQ->AdvancedSearch->save();

        // Field MRQ
        $this->MRQ->AdvancedSearch->SearchValue = @$filter["x_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator = @$filter["z_MRQ"];
        $this->MRQ->AdvancedSearch->SearchCondition = @$filter["v_MRQ"];
        $this->MRQ->AdvancedSearch->SearchValue2 = @$filter["y_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator2 = @$filter["w_MRQ"];
        $this->MRQ->AdvancedSearch->save();

        // Field IQ
        $this->IQ->AdvancedSearch->SearchValue = @$filter["x_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator = @$filter["z_IQ"];
        $this->IQ->AdvancedSearch->SearchCondition = @$filter["v_IQ"];
        $this->IQ->AdvancedSearch->SearchValue2 = @$filter["y_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator2 = @$filter["w_IQ"];
        $this->IQ->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field EXPDT
        $this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
        $this->EXPDT->AdvancedSearch->save();

        // Field UR
        $this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
        $this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
        $this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
        $this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
        $this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
        $this->UR->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field PRCODE
        $this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
        $this->PRCODE->AdvancedSearch->save();

        // Field BATCH
        $this->BATCH->AdvancedSearch->SearchValue = @$filter["x_BATCH"];
        $this->BATCH->AdvancedSearch->SearchOperator = @$filter["z_BATCH"];
        $this->BATCH->AdvancedSearch->SearchCondition = @$filter["v_BATCH"];
        $this->BATCH->AdvancedSearch->SearchValue2 = @$filter["y_BATCH"];
        $this->BATCH->AdvancedSearch->SearchOperator2 = @$filter["w_BATCH"];
        $this->BATCH->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field OLDRT
        $this->OLDRT->AdvancedSearch->SearchValue = @$filter["x_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchOperator = @$filter["z_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchCondition = @$filter["v_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchValue2 = @$filter["y_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRT"];
        $this->OLDRT->AdvancedSearch->save();

        // Field TEMPMRQ
        $this->TEMPMRQ->AdvancedSearch->SearchValue = @$filter["x_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchOperator = @$filter["z_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchCondition = @$filter["v_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchValue2 = @$filter["y_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->save();

        // Field TAXP
        $this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
        $this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
        $this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
        $this->TAXP->AdvancedSearch->save();

        // Field OLDRATE
        $this->OLDRATE->AdvancedSearch->SearchValue = @$filter["x_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchOperator = @$filter["z_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchCondition = @$filter["v_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchValue2 = @$filter["y_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->save();

        // Field NEWRATE
        $this->NEWRATE->AdvancedSearch->SearchValue = @$filter["x_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchOperator = @$filter["z_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchCondition = @$filter["v_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchValue2 = @$filter["y_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchOperator2 = @$filter["w_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->save();

        // Field OTEMPMRA
        $this->OTEMPMRA->AdvancedSearch->SearchValue = @$filter["x_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchOperator = @$filter["z_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchCondition = @$filter["v_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchValue2 = @$filter["y_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchOperator2 = @$filter["w_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->save();

        // Field ACTIVESTATUS
        $this->ACTIVESTATUS->AdvancedSearch->SearchValue = @$filter["x_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchOperator = @$filter["z_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchCondition = @$filter["v_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchValue2 = @$filter["y_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchOperator2 = @$filter["w_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->save();

        // Field PSGST
        $this->PSGST->AdvancedSearch->SearchValue = @$filter["x_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator = @$filter["z_PSGST"];
        $this->PSGST->AdvancedSearch->SearchCondition = @$filter["v_PSGST"];
        $this->PSGST->AdvancedSearch->SearchValue2 = @$filter["y_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator2 = @$filter["w_PSGST"];
        $this->PSGST->AdvancedSearch->save();

        // Field PCGST
        $this->PCGST->AdvancedSearch->SearchValue = @$filter["x_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator = @$filter["z_PCGST"];
        $this->PCGST->AdvancedSearch->SearchCondition = @$filter["v_PCGST"];
        $this->PCGST->AdvancedSearch->SearchValue2 = @$filter["y_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator2 = @$filter["w_PCGST"];
        $this->PCGST->AdvancedSearch->save();

        // Field SSGST
        $this->SSGST->AdvancedSearch->SearchValue = @$filter["x_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator = @$filter["z_SSGST"];
        $this->SSGST->AdvancedSearch->SearchCondition = @$filter["v_SSGST"];
        $this->SSGST->AdvancedSearch->SearchValue2 = @$filter["y_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator2 = @$filter["w_SSGST"];
        $this->SSGST->AdvancedSearch->save();

        // Field SCGST
        $this->SCGST->AdvancedSearch->SearchValue = @$filter["x_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator = @$filter["z_SCGST"];
        $this->SCGST->AdvancedSearch->SearchCondition = @$filter["v_SCGST"];
        $this->SCGST->AdvancedSearch->SearchValue2 = @$filter["y_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator2 = @$filter["w_SCGST"];
        $this->SCGST->AdvancedSearch->save();

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field FRQ
        $this->FRQ->AdvancedSearch->SearchValue = @$filter["x_FRQ"];
        $this->FRQ->AdvancedSearch->SearchOperator = @$filter["z_FRQ"];
        $this->FRQ->AdvancedSearch->SearchCondition = @$filter["v_FRQ"];
        $this->FRQ->AdvancedSearch->SearchValue2 = @$filter["y_FRQ"];
        $this->FRQ->AdvancedSearch->SearchOperator2 = @$filter["w_FRQ"];
        $this->FRQ->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field UM
        $this->UM->AdvancedSearch->SearchValue = @$filter["x_UM"];
        $this->UM->AdvancedSearch->SearchOperator = @$filter["z_UM"];
        $this->UM->AdvancedSearch->SearchCondition = @$filter["v_UM"];
        $this->UM->AdvancedSearch->SearchValue2 = @$filter["y_UM"];
        $this->UM->AdvancedSearch->SearchOperator2 = @$filter["w_UM"];
        $this->UM->AdvancedSearch->save();

        // Field GENNAME
        $this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
        $this->GENNAME->AdvancedSearch->save();

        // Field BILLDATE
        $this->BILLDATE->AdvancedSearch->SearchValue = @$filter["x_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchOperator = @$filter["z_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchCondition = @$filter["v_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchValue2 = @$filter["y_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->save();

        // Field CreatedDateTime
        $this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->save();

        // Field baid
        $this->baid->AdvancedSearch->SearchValue = @$filter["x_baid"];
        $this->baid->AdvancedSearch->SearchOperator = @$filter["z_baid"];
        $this->baid->AdvancedSearch->SearchCondition = @$filter["v_baid"];
        $this->baid->AdvancedSearch->SearchValue2 = @$filter["y_baid"];
        $this->baid->AdvancedSearch->SearchOperator2 = @$filter["w_baid"];
        $this->baid->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->PRC, $default, false); // PRC
        $this->buildSearchSql($where, $this->PrName, $default, false); // PrName
        $this->buildSearchSql($where, $this->BATCHNO, $default, false); // BATCHNO
        $this->buildSearchSql($where, $this->OpeningStk, $default, false); // OpeningStk
        $this->buildSearchSql($where, $this->PurchaseQty, $default, false); // PurchaseQty
        $this->buildSearchSql($where, $this->SalesQty, $default, false); // SalesQty
        $this->buildSearchSql($where, $this->ClosingStk, $default, false); // ClosingStk
        $this->buildSearchSql($where, $this->PurchasefreeQty, $default, false); // PurchasefreeQty
        $this->buildSearchSql($where, $this->TransferingQty, $default, false); // TransferingQty
        $this->buildSearchSql($where, $this->UnitPurchaseRate, $default, false); // UnitPurchaseRate
        $this->buildSearchSql($where, $this->UnitSaleRate, $default, false); // UnitSaleRate
        $this->buildSearchSql($where, $this->CreatedDate, $default, false); // CreatedDate
        $this->buildSearchSql($where, $this->OQ, $default, false); // OQ
        $this->buildSearchSql($where, $this->RQ, $default, false); // RQ
        $this->buildSearchSql($where, $this->MRQ, $default, false); // MRQ
        $this->buildSearchSql($where, $this->IQ, $default, false); // IQ
        $this->buildSearchSql($where, $this->MRP, $default, false); // MRP
        $this->buildSearchSql($where, $this->EXPDT, $default, false); // EXPDT
        $this->buildSearchSql($where, $this->UR, $default, false); // UR
        $this->buildSearchSql($where, $this->RT, $default, false); // RT
        $this->buildSearchSql($where, $this->PRCODE, $default, false); // PRCODE
        $this->buildSearchSql($where, $this->BATCH, $default, false); // BATCH
        $this->buildSearchSql($where, $this->PC, $default, false); // PC
        $this->buildSearchSql($where, $this->OLDRT, $default, false); // OLDRT
        $this->buildSearchSql($where, $this->TEMPMRQ, $default, false); // TEMPMRQ
        $this->buildSearchSql($where, $this->TAXP, $default, false); // TAXP
        $this->buildSearchSql($where, $this->OLDRATE, $default, false); // OLDRATE
        $this->buildSearchSql($where, $this->NEWRATE, $default, false); // NEWRATE
        $this->buildSearchSql($where, $this->OTEMPMRA, $default, false); // OTEMPMRA
        $this->buildSearchSql($where, $this->ACTIVESTATUS, $default, false); // ACTIVESTATUS
        $this->buildSearchSql($where, $this->PSGST, $default, false); // PSGST
        $this->buildSearchSql($where, $this->PCGST, $default, false); // PCGST
        $this->buildSearchSql($where, $this->SSGST, $default, false); // SSGST
        $this->buildSearchSql($where, $this->SCGST, $default, false); // SCGST
        $this->buildSearchSql($where, $this->MFRCODE, $default, false); // MFRCODE
        $this->buildSearchSql($where, $this->BRCODE, $default, false); // BRCODE
        $this->buildSearchSql($where, $this->FRQ, $default, false); // FRQ
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->UM, $default, false); // UM
        $this->buildSearchSql($where, $this->GENNAME, $default, false); // GENNAME
        $this->buildSearchSql($where, $this->BILLDATE, $default, false); // BILLDATE
        $this->buildSearchSql($where, $this->CreatedDateTime, $default, false); // CreatedDateTime
        $this->buildSearchSql($where, $this->baid, $default, false); // baid

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->PRC->AdvancedSearch->save(); // PRC
            $this->PrName->AdvancedSearch->save(); // PrName
            $this->BATCHNO->AdvancedSearch->save(); // BATCHNO
            $this->OpeningStk->AdvancedSearch->save(); // OpeningStk
            $this->PurchaseQty->AdvancedSearch->save(); // PurchaseQty
            $this->SalesQty->AdvancedSearch->save(); // SalesQty
            $this->ClosingStk->AdvancedSearch->save(); // ClosingStk
            $this->PurchasefreeQty->AdvancedSearch->save(); // PurchasefreeQty
            $this->TransferingQty->AdvancedSearch->save(); // TransferingQty
            $this->UnitPurchaseRate->AdvancedSearch->save(); // UnitPurchaseRate
            $this->UnitSaleRate->AdvancedSearch->save(); // UnitSaleRate
            $this->CreatedDate->AdvancedSearch->save(); // CreatedDate
            $this->OQ->AdvancedSearch->save(); // OQ
            $this->RQ->AdvancedSearch->save(); // RQ
            $this->MRQ->AdvancedSearch->save(); // MRQ
            $this->IQ->AdvancedSearch->save(); // IQ
            $this->MRP->AdvancedSearch->save(); // MRP
            $this->EXPDT->AdvancedSearch->save(); // EXPDT
            $this->UR->AdvancedSearch->save(); // UR
            $this->RT->AdvancedSearch->save(); // RT
            $this->PRCODE->AdvancedSearch->save(); // PRCODE
            $this->BATCH->AdvancedSearch->save(); // BATCH
            $this->PC->AdvancedSearch->save(); // PC
            $this->OLDRT->AdvancedSearch->save(); // OLDRT
            $this->TEMPMRQ->AdvancedSearch->save(); // TEMPMRQ
            $this->TAXP->AdvancedSearch->save(); // TAXP
            $this->OLDRATE->AdvancedSearch->save(); // OLDRATE
            $this->NEWRATE->AdvancedSearch->save(); // NEWRATE
            $this->OTEMPMRA->AdvancedSearch->save(); // OTEMPMRA
            $this->ACTIVESTATUS->AdvancedSearch->save(); // ACTIVESTATUS
            $this->PSGST->AdvancedSearch->save(); // PSGST
            $this->PCGST->AdvancedSearch->save(); // PCGST
            $this->SSGST->AdvancedSearch->save(); // SSGST
            $this->SCGST->AdvancedSearch->save(); // SCGST
            $this->MFRCODE->AdvancedSearch->save(); // MFRCODE
            $this->BRCODE->AdvancedSearch->save(); // BRCODE
            $this->FRQ->AdvancedSearch->save(); // FRQ
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->UM->AdvancedSearch->save(); // UM
            $this->GENNAME->AdvancedSearch->save(); // GENNAME
            $this->BILLDATE->AdvancedSearch->save(); // BILLDATE
            $this->CreatedDateTime->AdvancedSearch->save(); // CreatedDateTime
            $this->baid->AdvancedSearch->save(); // baid
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
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ACTIVESTATUS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
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
        if ($this->PRC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PrName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BATCHNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OpeningStk->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurchaseQty->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SalesQty->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ClosingStk->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurchasefreeQty->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TransferingQty->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UnitPurchaseRate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UnitSaleRate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MRP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EXPDT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BATCH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OLDRT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TEMPMRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TAXP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OLDRATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NEWRATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OTEMPMRA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ACTIVESTATUS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MFRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UM->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GENNAME->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BILLDATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->baid->AdvancedSearch->issetSession()) {
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
                $this->PRC->AdvancedSearch->unsetSession();
                $this->PrName->AdvancedSearch->unsetSession();
                $this->BATCHNO->AdvancedSearch->unsetSession();
                $this->OpeningStk->AdvancedSearch->unsetSession();
                $this->PurchaseQty->AdvancedSearch->unsetSession();
                $this->SalesQty->AdvancedSearch->unsetSession();
                $this->ClosingStk->AdvancedSearch->unsetSession();
                $this->PurchasefreeQty->AdvancedSearch->unsetSession();
                $this->TransferingQty->AdvancedSearch->unsetSession();
                $this->UnitPurchaseRate->AdvancedSearch->unsetSession();
                $this->UnitSaleRate->AdvancedSearch->unsetSession();
                $this->CreatedDate->AdvancedSearch->unsetSession();
                $this->OQ->AdvancedSearch->unsetSession();
                $this->RQ->AdvancedSearch->unsetSession();
                $this->MRQ->AdvancedSearch->unsetSession();
                $this->IQ->AdvancedSearch->unsetSession();
                $this->MRP->AdvancedSearch->unsetSession();
                $this->EXPDT->AdvancedSearch->unsetSession();
                $this->UR->AdvancedSearch->unsetSession();
                $this->RT->AdvancedSearch->unsetSession();
                $this->PRCODE->AdvancedSearch->unsetSession();
                $this->BATCH->AdvancedSearch->unsetSession();
                $this->PC->AdvancedSearch->unsetSession();
                $this->OLDRT->AdvancedSearch->unsetSession();
                $this->TEMPMRQ->AdvancedSearch->unsetSession();
                $this->TAXP->AdvancedSearch->unsetSession();
                $this->OLDRATE->AdvancedSearch->unsetSession();
                $this->NEWRATE->AdvancedSearch->unsetSession();
                $this->OTEMPMRA->AdvancedSearch->unsetSession();
                $this->ACTIVESTATUS->AdvancedSearch->unsetSession();
                $this->PSGST->AdvancedSearch->unsetSession();
                $this->PCGST->AdvancedSearch->unsetSession();
                $this->SSGST->AdvancedSearch->unsetSession();
                $this->SCGST->AdvancedSearch->unsetSession();
                $this->MFRCODE->AdvancedSearch->unsetSession();
                $this->BRCODE->AdvancedSearch->unsetSession();
                $this->FRQ->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->UM->AdvancedSearch->unsetSession();
                $this->GENNAME->AdvancedSearch->unsetSession();
                $this->BILLDATE->AdvancedSearch->unsetSession();
                $this->CreatedDateTime->AdvancedSearch->unsetSession();
                $this->baid->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->PRC->AdvancedSearch->load();
                $this->PrName->AdvancedSearch->load();
                $this->BATCHNO->AdvancedSearch->load();
                $this->OpeningStk->AdvancedSearch->load();
                $this->PurchaseQty->AdvancedSearch->load();
                $this->SalesQty->AdvancedSearch->load();
                $this->ClosingStk->AdvancedSearch->load();
                $this->PurchasefreeQty->AdvancedSearch->load();
                $this->TransferingQty->AdvancedSearch->load();
                $this->UnitPurchaseRate->AdvancedSearch->load();
                $this->UnitSaleRate->AdvancedSearch->load();
                $this->CreatedDate->AdvancedSearch->load();
                $this->OQ->AdvancedSearch->load();
                $this->RQ->AdvancedSearch->load();
                $this->MRQ->AdvancedSearch->load();
                $this->IQ->AdvancedSearch->load();
                $this->MRP->AdvancedSearch->load();
                $this->EXPDT->AdvancedSearch->load();
                $this->UR->AdvancedSearch->load();
                $this->RT->AdvancedSearch->load();
                $this->PRCODE->AdvancedSearch->load();
                $this->BATCH->AdvancedSearch->load();
                $this->PC->AdvancedSearch->load();
                $this->OLDRT->AdvancedSearch->load();
                $this->TEMPMRQ->AdvancedSearch->load();
                $this->TAXP->AdvancedSearch->load();
                $this->OLDRATE->AdvancedSearch->load();
                $this->NEWRATE->AdvancedSearch->load();
                $this->OTEMPMRA->AdvancedSearch->load();
                $this->ACTIVESTATUS->AdvancedSearch->load();
                $this->PSGST->AdvancedSearch->load();
                $this->PCGST->AdvancedSearch->load();
                $this->SSGST->AdvancedSearch->load();
                $this->SCGST->AdvancedSearch->load();
                $this->MFRCODE->AdvancedSearch->load();
                $this->BRCODE->AdvancedSearch->load();
                $this->FRQ->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->UM->AdvancedSearch->load();
                $this->GENNAME->AdvancedSearch->load();
                $this->BILLDATE->AdvancedSearch->load();
                $this->CreatedDateTime->AdvancedSearch->load();
                $this->baid->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->PrName); // PrName
            $this->updateSort($this->BATCHNO); // BATCHNO
            $this->updateSort($this->OpeningStk); // OpeningStk
            $this->updateSort($this->PurchaseQty); // PurchaseQty
            $this->updateSort($this->SalesQty); // SalesQty
            $this->updateSort($this->ClosingStk); // ClosingStk
            $this->updateSort($this->PurchasefreeQty); // PurchasefreeQty
            $this->updateSort($this->TransferingQty); // TransferingQty
            $this->updateSort($this->UnitPurchaseRate); // UnitPurchaseRate
            $this->updateSort($this->UnitSaleRate); // UnitSaleRate
            $this->updateSort($this->CreatedDate); // CreatedDate
            $this->updateSort($this->OQ); // OQ
            $this->updateSort($this->RQ); // RQ
            $this->updateSort($this->MRQ); // MRQ
            $this->updateSort($this->IQ); // IQ
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->EXPDT); // EXPDT
            $this->updateSort($this->UR); // UR
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->PRCODE); // PRCODE
            $this->updateSort($this->BATCH); // BATCH
            $this->updateSort($this->PC); // PC
            $this->updateSort($this->OLDRT); // OLDRT
            $this->updateSort($this->TEMPMRQ); // TEMPMRQ
            $this->updateSort($this->TAXP); // TAXP
            $this->updateSort($this->OLDRATE); // OLDRATE
            $this->updateSort($this->NEWRATE); // NEWRATE
            $this->updateSort($this->OTEMPMRA); // OTEMPMRA
            $this->updateSort($this->ACTIVESTATUS); // ACTIVESTATUS
            $this->updateSort($this->PSGST); // PSGST
            $this->updateSort($this->PCGST); // PCGST
            $this->updateSort($this->SSGST); // SSGST
            $this->updateSort($this->SCGST); // SCGST
            $this->updateSort($this->MFRCODE); // MFRCODE
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->FRQ); // FRQ
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->UM); // UM
            $this->updateSort($this->GENNAME); // GENNAME
            $this->updateSort($this->BILLDATE); // BILLDATE
            $this->updateSort($this->CreatedDateTime); // CreatedDateTime
            $this->updateSort($this->baid); // baid
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
                $this->id->setSort("");
                $this->PRC->setSort("");
                $this->PrName->setSort("");
                $this->BATCHNO->setSort("");
                $this->OpeningStk->setSort("");
                $this->PurchaseQty->setSort("");
                $this->SalesQty->setSort("");
                $this->ClosingStk->setSort("");
                $this->PurchasefreeQty->setSort("");
                $this->TransferingQty->setSort("");
                $this->UnitPurchaseRate->setSort("");
                $this->UnitSaleRate->setSort("");
                $this->CreatedDate->setSort("");
                $this->OQ->setSort("");
                $this->RQ->setSort("");
                $this->MRQ->setSort("");
                $this->IQ->setSort("");
                $this->MRP->setSort("");
                $this->EXPDT->setSort("");
                $this->UR->setSort("");
                $this->RT->setSort("");
                $this->PRCODE->setSort("");
                $this->BATCH->setSort("");
                $this->PC->setSort("");
                $this->OLDRT->setSort("");
                $this->TEMPMRQ->setSort("");
                $this->TAXP->setSort("");
                $this->OLDRATE->setSort("");
                $this->NEWRATE->setSort("");
                $this->OTEMPMRA->setSort("");
                $this->ACTIVESTATUS->setSort("");
                $this->PSGST->setSort("");
                $this->PCGST->setSort("");
                $this->SSGST->setSort("");
                $this->SCGST->setSort("");
                $this->MFRCODE->setSort("");
                $this->BRCODE->setSort("");
                $this->FRQ->setSort("");
                $this->HospID->setSort("");
                $this->UM->setSort("");
                $this->GENNAME->setSort("");
                $this->BILLDATE->setSort("");
                $this->CreatedDateTime->setSort("");
                $this->baid->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_stock_movementlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_stock_movementlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpharmacy_stock_movementlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PRC
        if (!$this->isAddOrEdit() && $this->PRC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PRC->AdvancedSearch->SearchValue != "" || $this->PRC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PrName
        if (!$this->isAddOrEdit() && $this->PrName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PrName->AdvancedSearch->SearchValue != "" || $this->PrName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BATCHNO
        if (!$this->isAddOrEdit() && $this->BATCHNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BATCHNO->AdvancedSearch->SearchValue != "" || $this->BATCHNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OpeningStk
        if (!$this->isAddOrEdit() && $this->OpeningStk->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OpeningStk->AdvancedSearch->SearchValue != "" || $this->OpeningStk->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurchaseQty
        if (!$this->isAddOrEdit() && $this->PurchaseQty->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurchaseQty->AdvancedSearch->SearchValue != "" || $this->PurchaseQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SalesQty
        if (!$this->isAddOrEdit() && $this->SalesQty->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SalesQty->AdvancedSearch->SearchValue != "" || $this->SalesQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ClosingStk
        if (!$this->isAddOrEdit() && $this->ClosingStk->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ClosingStk->AdvancedSearch->SearchValue != "" || $this->ClosingStk->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurchasefreeQty
        if (!$this->isAddOrEdit() && $this->PurchasefreeQty->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurchasefreeQty->AdvancedSearch->SearchValue != "" || $this->PurchasefreeQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TransferingQty
        if (!$this->isAddOrEdit() && $this->TransferingQty->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TransferingQty->AdvancedSearch->SearchValue != "" || $this->TransferingQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UnitPurchaseRate
        if (!$this->isAddOrEdit() && $this->UnitPurchaseRate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UnitPurchaseRate->AdvancedSearch->SearchValue != "" || $this->UnitPurchaseRate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UnitSaleRate
        if (!$this->isAddOrEdit() && $this->UnitSaleRate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UnitSaleRate->AdvancedSearch->SearchValue != "" || $this->UnitSaleRate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CreatedDate
        if (!$this->isAddOrEdit() && $this->CreatedDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CreatedDate->AdvancedSearch->SearchValue != "" || $this->CreatedDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OQ
        if (!$this->isAddOrEdit() && $this->OQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OQ->AdvancedSearch->SearchValue != "" || $this->OQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RQ
        if (!$this->isAddOrEdit() && $this->RQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RQ->AdvancedSearch->SearchValue != "" || $this->RQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MRQ
        if (!$this->isAddOrEdit() && $this->MRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MRQ->AdvancedSearch->SearchValue != "" || $this->MRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IQ
        if (!$this->isAddOrEdit() && $this->IQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IQ->AdvancedSearch->SearchValue != "" || $this->IQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MRP
        if (!$this->isAddOrEdit() && $this->MRP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MRP->AdvancedSearch->SearchValue != "" || $this->MRP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EXPDT
        if (!$this->isAddOrEdit() && $this->EXPDT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EXPDT->AdvancedSearch->SearchValue != "" || $this->EXPDT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UR
        if (!$this->isAddOrEdit() && $this->UR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UR->AdvancedSearch->SearchValue != "" || $this->UR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PRCODE
        if (!$this->isAddOrEdit() && $this->PRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PRCODE->AdvancedSearch->SearchValue != "" || $this->PRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BATCH
        if (!$this->isAddOrEdit() && $this->BATCH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BATCH->AdvancedSearch->SearchValue != "" || $this->BATCH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PC
        if (!$this->isAddOrEdit() && $this->PC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PC->AdvancedSearch->SearchValue != "" || $this->PC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OLDRT
        if (!$this->isAddOrEdit() && $this->OLDRT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OLDRT->AdvancedSearch->SearchValue != "" || $this->OLDRT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TEMPMRQ
        if (!$this->isAddOrEdit() && $this->TEMPMRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TEMPMRQ->AdvancedSearch->SearchValue != "" || $this->TEMPMRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TAXP
        if (!$this->isAddOrEdit() && $this->TAXP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TAXP->AdvancedSearch->SearchValue != "" || $this->TAXP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OLDRATE
        if (!$this->isAddOrEdit() && $this->OLDRATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OLDRATE->AdvancedSearch->SearchValue != "" || $this->OLDRATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NEWRATE
        if (!$this->isAddOrEdit() && $this->NEWRATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NEWRATE->AdvancedSearch->SearchValue != "" || $this->NEWRATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OTEMPMRA
        if (!$this->isAddOrEdit() && $this->OTEMPMRA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OTEMPMRA->AdvancedSearch->SearchValue != "" || $this->OTEMPMRA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ACTIVESTATUS
        if (!$this->isAddOrEdit() && $this->ACTIVESTATUS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ACTIVESTATUS->AdvancedSearch->SearchValue != "" || $this->ACTIVESTATUS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PSGST
        if (!$this->isAddOrEdit() && $this->PSGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PSGST->AdvancedSearch->SearchValue != "" || $this->PSGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PCGST
        if (!$this->isAddOrEdit() && $this->PCGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PCGST->AdvancedSearch->SearchValue != "" || $this->PCGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SSGST
        if (!$this->isAddOrEdit() && $this->SSGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SSGST->AdvancedSearch->SearchValue != "" || $this->SSGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SCGST
        if (!$this->isAddOrEdit() && $this->SCGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SCGST->AdvancedSearch->SearchValue != "" || $this->SCGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MFRCODE
        if (!$this->isAddOrEdit() && $this->MFRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MFRCODE->AdvancedSearch->SearchValue != "" || $this->MFRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // FRQ
        if (!$this->isAddOrEdit() && $this->FRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FRQ->AdvancedSearch->SearchValue != "" || $this->FRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // UM
        if (!$this->isAddOrEdit() && $this->UM->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UM->AdvancedSearch->SearchValue != "" || $this->UM->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GENNAME
        if (!$this->isAddOrEdit() && $this->GENNAME->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GENNAME->AdvancedSearch->SearchValue != "" || $this->GENNAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BILLDATE
        if (!$this->isAddOrEdit() && $this->BILLDATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BILLDATE->AdvancedSearch->SearchValue != "" || $this->BILLDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CreatedDateTime
        if (!$this->isAddOrEdit() && $this->CreatedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CreatedDateTime->AdvancedSearch->SearchValue != "" || $this->CreatedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // baid
        if (!$this->isAddOrEdit() && $this->baid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->baid->AdvancedSearch->SearchValue != "" || $this->baid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->PRC->setDbValue($row['PRC']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OpeningStk->setDbValue($row['OpeningStk']);
        $this->PurchaseQty->setDbValue($row['PurchaseQty']);
        $this->SalesQty->setDbValue($row['SalesQty']);
        $this->ClosingStk->setDbValue($row['ClosingStk']);
        $this->PurchasefreeQty->setDbValue($row['PurchasefreeQty']);
        $this->TransferingQty->setDbValue($row['TransferingQty']);
        $this->UnitPurchaseRate->setDbValue($row['UnitPurchaseRate']);
        $this->UnitSaleRate->setDbValue($row['UnitSaleRate']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->UR->setDbValue($row['UR']);
        $this->RT->setDbValue($row['RT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->BATCH->setDbValue($row['BATCH']);
        $this->PC->setDbValue($row['PC']);
        $this->OLDRT->setDbValue($row['OLDRT']);
        $this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->OLDRATE->setDbValue($row['OLDRATE']);
        $this->NEWRATE->setDbValue($row['NEWRATE']);
        $this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
        $this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->FRQ->setDbValue($row['FRQ']);
        $this->HospID->setDbValue($row['HospID']);
        $this->UM->setDbValue($row['UM']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->BILLDATE->setDbValue($row['BILLDATE']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->baid->setDbValue($row['baid']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PRC'] = null;
        $row['PrName'] = null;
        $row['BATCHNO'] = null;
        $row['OpeningStk'] = null;
        $row['PurchaseQty'] = null;
        $row['SalesQty'] = null;
        $row['ClosingStk'] = null;
        $row['PurchasefreeQty'] = null;
        $row['TransferingQty'] = null;
        $row['UnitPurchaseRate'] = null;
        $row['UnitSaleRate'] = null;
        $row['CreatedDate'] = null;
        $row['OQ'] = null;
        $row['RQ'] = null;
        $row['MRQ'] = null;
        $row['IQ'] = null;
        $row['MRP'] = null;
        $row['EXPDT'] = null;
        $row['UR'] = null;
        $row['RT'] = null;
        $row['PRCODE'] = null;
        $row['BATCH'] = null;
        $row['PC'] = null;
        $row['OLDRT'] = null;
        $row['TEMPMRQ'] = null;
        $row['TAXP'] = null;
        $row['OLDRATE'] = null;
        $row['NEWRATE'] = null;
        $row['OTEMPMRA'] = null;
        $row['ACTIVESTATUS'] = null;
        $row['PSGST'] = null;
        $row['PCGST'] = null;
        $row['SSGST'] = null;
        $row['SCGST'] = null;
        $row['MFRCODE'] = null;
        $row['BRCODE'] = null;
        $row['FRQ'] = null;
        $row['HospID'] = null;
        $row['UM'] = null;
        $row['GENNAME'] = null;
        $row['BILLDATE'] = null;
        $row['CreatedDateTime'] = null;
        $row['baid'] = null;
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

        // Convert decimal values if posted back
        if ($this->OpeningStk->FormValue == $this->OpeningStk->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningStk->CurrentValue))) {
            $this->OpeningStk->CurrentValue = ConvertToFloatString($this->OpeningStk->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchaseQty->FormValue == $this->PurchaseQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchaseQty->CurrentValue))) {
            $this->PurchaseQty->CurrentValue = ConvertToFloatString($this->PurchaseQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SalesQty->FormValue == $this->SalesQty->CurrentValue && is_numeric(ConvertToFloatString($this->SalesQty->CurrentValue))) {
            $this->SalesQty->CurrentValue = ConvertToFloatString($this->SalesQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ClosingStk->FormValue == $this->ClosingStk->CurrentValue && is_numeric(ConvertToFloatString($this->ClosingStk->CurrentValue))) {
            $this->ClosingStk->CurrentValue = ConvertToFloatString($this->ClosingStk->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurchasefreeQty->FormValue == $this->PurchasefreeQty->CurrentValue && is_numeric(ConvertToFloatString($this->PurchasefreeQty->CurrentValue))) {
            $this->PurchasefreeQty->CurrentValue = ConvertToFloatString($this->PurchasefreeQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TransferingQty->FormValue == $this->TransferingQty->CurrentValue && is_numeric(ConvertToFloatString($this->TransferingQty->CurrentValue))) {
            $this->TransferingQty->CurrentValue = ConvertToFloatString($this->TransferingQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UnitPurchaseRate->FormValue == $this->UnitPurchaseRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitPurchaseRate->CurrentValue))) {
            $this->UnitPurchaseRate->CurrentValue = ConvertToFloatString($this->UnitPurchaseRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UnitSaleRate->FormValue == $this->UnitSaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->UnitSaleRate->CurrentValue))) {
            $this->UnitSaleRate->CurrentValue = ConvertToFloatString($this->UnitSaleRate->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRT->FormValue == $this->OLDRT->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRT->CurrentValue))) {
            $this->OLDRT->CurrentValue = ConvertToFloatString($this->OLDRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TEMPMRQ->FormValue == $this->TEMPMRQ->CurrentValue && is_numeric(ConvertToFloatString($this->TEMPMRQ->CurrentValue))) {
            $this->TEMPMRQ->CurrentValue = ConvertToFloatString($this->TEMPMRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRATE->FormValue == $this->OLDRATE->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRATE->CurrentValue))) {
            $this->OLDRATE->CurrentValue = ConvertToFloatString($this->OLDRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRATE->FormValue == $this->NEWRATE->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRATE->CurrentValue))) {
            $this->NEWRATE->CurrentValue = ConvertToFloatString($this->NEWRATE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OTEMPMRA->FormValue == $this->OTEMPMRA->CurrentValue && is_numeric(ConvertToFloatString($this->OTEMPMRA->CurrentValue))) {
            $this->OTEMPMRA->CurrentValue = ConvertToFloatString($this->OTEMPMRA->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue))) {
            $this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue))) {
            $this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue))) {
            $this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // PRC

        // PrName

        // BATCHNO

        // OpeningStk

        // PurchaseQty

        // SalesQty

        // ClosingStk

        // PurchasefreeQty

        // TransferingQty

        // UnitPurchaseRate

        // UnitSaleRate

        // CreatedDate

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // UR

        // RT

        // PRCODE

        // BATCH

        // PC

        // OLDRT

        // TEMPMRQ

        // TAXP

        // OLDRATE

        // NEWRATE

        // OTEMPMRA

        // ACTIVESTATUS

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // MFRCODE

        // BRCODE

        // FRQ

        // HospID

        // UM

        // GENNAME

        // BILLDATE

        // CreatedDateTime

        // baid
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // OpeningStk
            $this->OpeningStk->ViewValue = $this->OpeningStk->CurrentValue;
            $this->OpeningStk->ViewValue = FormatNumber($this->OpeningStk->ViewValue, 2, -2, -2, -2);
            $this->OpeningStk->ViewCustomAttributes = "";

            // PurchaseQty
            $this->PurchaseQty->ViewValue = $this->PurchaseQty->CurrentValue;
            $this->PurchaseQty->ViewValue = FormatNumber($this->PurchaseQty->ViewValue, 2, -2, -2, -2);
            $this->PurchaseQty->ViewCustomAttributes = "";

            // SalesQty
            $this->SalesQty->ViewValue = $this->SalesQty->CurrentValue;
            $this->SalesQty->ViewValue = FormatNumber($this->SalesQty->ViewValue, 2, -2, -2, -2);
            $this->SalesQty->ViewCustomAttributes = "";

            // ClosingStk
            $this->ClosingStk->ViewValue = $this->ClosingStk->CurrentValue;
            $this->ClosingStk->ViewValue = FormatNumber($this->ClosingStk->ViewValue, 2, -2, -2, -2);
            $this->ClosingStk->ViewCustomAttributes = "";

            // PurchasefreeQty
            $this->PurchasefreeQty->ViewValue = $this->PurchasefreeQty->CurrentValue;
            $this->PurchasefreeQty->ViewValue = FormatNumber($this->PurchasefreeQty->ViewValue, 2, -2, -2, -2);
            $this->PurchasefreeQty->ViewCustomAttributes = "";

            // TransferingQty
            $this->TransferingQty->ViewValue = $this->TransferingQty->CurrentValue;
            $this->TransferingQty->ViewValue = FormatNumber($this->TransferingQty->ViewValue, 2, -2, -2, -2);
            $this->TransferingQty->ViewCustomAttributes = "";

            // UnitPurchaseRate
            $this->UnitPurchaseRate->ViewValue = $this->UnitPurchaseRate->CurrentValue;
            $this->UnitPurchaseRate->ViewValue = FormatNumber($this->UnitPurchaseRate->ViewValue, 2, -2, -2, -2);
            $this->UnitPurchaseRate->ViewCustomAttributes = "";

            // UnitSaleRate
            $this->UnitSaleRate->ViewValue = $this->UnitSaleRate->CurrentValue;
            $this->UnitSaleRate->ViewValue = FormatNumber($this->UnitSaleRate->ViewValue, 2, -2, -2, -2);
            $this->UnitSaleRate->ViewCustomAttributes = "";

            // CreatedDate
            $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
            $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
            $this->CreatedDate->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // BATCH
            $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
            $this->BATCH->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // OLDRT
            $this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
            $this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
            $this->OLDRT->ViewCustomAttributes = "";

            // TEMPMRQ
            $this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
            $this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
            $this->TEMPMRQ->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // OLDRATE
            $this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
            $this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
            $this->OLDRATE->ViewCustomAttributes = "";

            // NEWRATE
            $this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
            $this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
            $this->NEWRATE->ViewCustomAttributes = "";

            // OTEMPMRA
            $this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
            $this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
            $this->OTEMPMRA->ViewCustomAttributes = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
            $this->ACTIVESTATUS->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // FRQ
            $this->FRQ->ViewValue = $this->FRQ->CurrentValue;
            $this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
            $this->FRQ->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $this->GENNAME->ViewCustomAttributes = "";

            // BILLDATE
            $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
            $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
            $this->BILLDATE->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // baid
            $this->baid->ViewValue = $this->baid->CurrentValue;
            $this->baid->ViewValue = FormatNumber($this->baid->ViewValue, 0, -2, -2, -2);
            $this->baid->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // OpeningStk
            $this->OpeningStk->LinkCustomAttributes = "";
            $this->OpeningStk->HrefValue = "";
            $this->OpeningStk->TooltipValue = "";

            // PurchaseQty
            $this->PurchaseQty->LinkCustomAttributes = "";
            $this->PurchaseQty->HrefValue = "";
            $this->PurchaseQty->TooltipValue = "";

            // SalesQty
            $this->SalesQty->LinkCustomAttributes = "";
            $this->SalesQty->HrefValue = "";
            $this->SalesQty->TooltipValue = "";

            // ClosingStk
            $this->ClosingStk->LinkCustomAttributes = "";
            $this->ClosingStk->HrefValue = "";
            $this->ClosingStk->TooltipValue = "";

            // PurchasefreeQty
            $this->PurchasefreeQty->LinkCustomAttributes = "";
            $this->PurchasefreeQty->HrefValue = "";
            $this->PurchasefreeQty->TooltipValue = "";

            // TransferingQty
            $this->TransferingQty->LinkCustomAttributes = "";
            $this->TransferingQty->HrefValue = "";
            $this->TransferingQty->TooltipValue = "";

            // UnitPurchaseRate
            $this->UnitPurchaseRate->LinkCustomAttributes = "";
            $this->UnitPurchaseRate->HrefValue = "";
            $this->UnitPurchaseRate->TooltipValue = "";

            // UnitSaleRate
            $this->UnitSaleRate->LinkCustomAttributes = "";
            $this->UnitSaleRate->HrefValue = "";
            $this->UnitSaleRate->TooltipValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
            $this->CreatedDate->TooltipValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";
            $this->PRCODE->TooltipValue = "";

            // BATCH
            $this->BATCH->LinkCustomAttributes = "";
            $this->BATCH->HrefValue = "";
            $this->BATCH->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // OLDRT
            $this->OLDRT->LinkCustomAttributes = "";
            $this->OLDRT->HrefValue = "";
            $this->OLDRT->TooltipValue = "";

            // TEMPMRQ
            $this->TEMPMRQ->LinkCustomAttributes = "";
            $this->TEMPMRQ->HrefValue = "";
            $this->TEMPMRQ->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // OLDRATE
            $this->OLDRATE->LinkCustomAttributes = "";
            $this->OLDRATE->HrefValue = "";
            $this->OLDRATE->TooltipValue = "";

            // NEWRATE
            $this->NEWRATE->LinkCustomAttributes = "";
            $this->NEWRATE->HrefValue = "";
            $this->NEWRATE->TooltipValue = "";

            // OTEMPMRA
            $this->OTEMPMRA->LinkCustomAttributes = "";
            $this->OTEMPMRA->HrefValue = "";
            $this->OTEMPMRA->TooltipValue = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->LinkCustomAttributes = "";
            $this->ACTIVESTATUS->HrefValue = "";
            $this->ACTIVESTATUS->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";
            $this->FRQ->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";
            $this->BILLDATE->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // baid
            $this->baid->LinkCustomAttributes = "";
            $this->baid->HrefValue = "";
            $this->baid->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // OpeningStk
            $this->OpeningStk->EditAttrs["class"] = "form-control";
            $this->OpeningStk->EditCustomAttributes = "";
            $this->OpeningStk->EditValue = HtmlEncode($this->OpeningStk->AdvancedSearch->SearchValue);
            $this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());
            $this->OpeningStk->EditAttrs["class"] = "form-control";
            $this->OpeningStk->EditCustomAttributes = "";
            $this->OpeningStk->EditValue2 = HtmlEncode($this->OpeningStk->AdvancedSearch->SearchValue2);
            $this->OpeningStk->PlaceHolder = RemoveHtml($this->OpeningStk->caption());

            // PurchaseQty
            $this->PurchaseQty->EditAttrs["class"] = "form-control";
            $this->PurchaseQty->EditCustomAttributes = "";
            $this->PurchaseQty->EditValue = HtmlEncode($this->PurchaseQty->AdvancedSearch->SearchValue);
            $this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());
            $this->PurchaseQty->EditAttrs["class"] = "form-control";
            $this->PurchaseQty->EditCustomAttributes = "";
            $this->PurchaseQty->EditValue2 = HtmlEncode($this->PurchaseQty->AdvancedSearch->SearchValue2);
            $this->PurchaseQty->PlaceHolder = RemoveHtml($this->PurchaseQty->caption());

            // SalesQty
            $this->SalesQty->EditAttrs["class"] = "form-control";
            $this->SalesQty->EditCustomAttributes = "";
            $this->SalesQty->EditValue = HtmlEncode($this->SalesQty->AdvancedSearch->SearchValue);
            $this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());
            $this->SalesQty->EditAttrs["class"] = "form-control";
            $this->SalesQty->EditCustomAttributes = "";
            $this->SalesQty->EditValue2 = HtmlEncode($this->SalesQty->AdvancedSearch->SearchValue2);
            $this->SalesQty->PlaceHolder = RemoveHtml($this->SalesQty->caption());

            // ClosingStk
            $this->ClosingStk->EditAttrs["class"] = "form-control";
            $this->ClosingStk->EditCustomAttributes = "";
            $this->ClosingStk->EditValue = HtmlEncode($this->ClosingStk->AdvancedSearch->SearchValue);
            $this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());
            $this->ClosingStk->EditAttrs["class"] = "form-control";
            $this->ClosingStk->EditCustomAttributes = "";
            $this->ClosingStk->EditValue2 = HtmlEncode($this->ClosingStk->AdvancedSearch->SearchValue2);
            $this->ClosingStk->PlaceHolder = RemoveHtml($this->ClosingStk->caption());

            // PurchasefreeQty
            $this->PurchasefreeQty->EditAttrs["class"] = "form-control";
            $this->PurchasefreeQty->EditCustomAttributes = "";
            $this->PurchasefreeQty->EditValue = HtmlEncode($this->PurchasefreeQty->AdvancedSearch->SearchValue);
            $this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());
            $this->PurchasefreeQty->EditAttrs["class"] = "form-control";
            $this->PurchasefreeQty->EditCustomAttributes = "";
            $this->PurchasefreeQty->EditValue2 = HtmlEncode($this->PurchasefreeQty->AdvancedSearch->SearchValue2);
            $this->PurchasefreeQty->PlaceHolder = RemoveHtml($this->PurchasefreeQty->caption());

            // TransferingQty
            $this->TransferingQty->EditAttrs["class"] = "form-control";
            $this->TransferingQty->EditCustomAttributes = "";
            $this->TransferingQty->EditValue = HtmlEncode($this->TransferingQty->AdvancedSearch->SearchValue);
            $this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());
            $this->TransferingQty->EditAttrs["class"] = "form-control";
            $this->TransferingQty->EditCustomAttributes = "";
            $this->TransferingQty->EditValue2 = HtmlEncode($this->TransferingQty->AdvancedSearch->SearchValue2);
            $this->TransferingQty->PlaceHolder = RemoveHtml($this->TransferingQty->caption());

            // UnitPurchaseRate
            $this->UnitPurchaseRate->EditAttrs["class"] = "form-control";
            $this->UnitPurchaseRate->EditCustomAttributes = "";
            $this->UnitPurchaseRate->EditValue = HtmlEncode($this->UnitPurchaseRate->AdvancedSearch->SearchValue);
            $this->UnitPurchaseRate->PlaceHolder = RemoveHtml($this->UnitPurchaseRate->caption());

            // UnitSaleRate
            $this->UnitSaleRate->EditAttrs["class"] = "form-control";
            $this->UnitSaleRate->EditCustomAttributes = "";
            $this->UnitSaleRate->EditValue = HtmlEncode($this->UnitSaleRate->AdvancedSearch->SearchValue);
            $this->UnitSaleRate->PlaceHolder = RemoveHtml($this->UnitSaleRate->caption());

            // CreatedDate
            $this->CreatedDate->EditAttrs["class"] = "form-control";
            $this->CreatedDate->EditCustomAttributes = "";
            $this->CreatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue, 0), 8));
            $this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());
            $this->CreatedDate->EditAttrs["class"] = "form-control";
            $this->CreatedDate->EditCustomAttributes = "";
            $this->CreatedDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue2, 0), 8));
            $this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->AdvancedSearch->SearchValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->AdvancedSearch->SearchValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->PRCODE->AdvancedSearch->SearchValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->AdvancedSearch->SearchValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // BATCH
            $this->BATCH->EditAttrs["class"] = "form-control";
            $this->BATCH->EditCustomAttributes = "";
            if (!$this->BATCH->Raw) {
                $this->BATCH->AdvancedSearch->SearchValue = HtmlDecode($this->BATCH->AdvancedSearch->SearchValue);
            }
            $this->BATCH->EditValue = HtmlEncode($this->BATCH->AdvancedSearch->SearchValue);
            $this->BATCH->PlaceHolder = RemoveHtml($this->BATCH->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->AdvancedSearch->SearchValue = HtmlDecode($this->PC->AdvancedSearch->SearchValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->AdvancedSearch->SearchValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // OLDRT
            $this->OLDRT->EditAttrs["class"] = "form-control";
            $this->OLDRT->EditCustomAttributes = "";
            $this->OLDRT->EditValue = HtmlEncode($this->OLDRT->AdvancedSearch->SearchValue);
            $this->OLDRT->PlaceHolder = RemoveHtml($this->OLDRT->caption());

            // TEMPMRQ
            $this->TEMPMRQ->EditAttrs["class"] = "form-control";
            $this->TEMPMRQ->EditCustomAttributes = "";
            $this->TEMPMRQ->EditValue = HtmlEncode($this->TEMPMRQ->AdvancedSearch->SearchValue);
            $this->TEMPMRQ->PlaceHolder = RemoveHtml($this->TEMPMRQ->caption());

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->AdvancedSearch->SearchValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());

            // OLDRATE
            $this->OLDRATE->EditAttrs["class"] = "form-control";
            $this->OLDRATE->EditCustomAttributes = "";
            $this->OLDRATE->EditValue = HtmlEncode($this->OLDRATE->AdvancedSearch->SearchValue);
            $this->OLDRATE->PlaceHolder = RemoveHtml($this->OLDRATE->caption());

            // NEWRATE
            $this->NEWRATE->EditAttrs["class"] = "form-control";
            $this->NEWRATE->EditCustomAttributes = "";
            $this->NEWRATE->EditValue = HtmlEncode($this->NEWRATE->AdvancedSearch->SearchValue);
            $this->NEWRATE->PlaceHolder = RemoveHtml($this->NEWRATE->caption());

            // OTEMPMRA
            $this->OTEMPMRA->EditAttrs["class"] = "form-control";
            $this->OTEMPMRA->EditCustomAttributes = "";
            $this->OTEMPMRA->EditValue = HtmlEncode($this->OTEMPMRA->AdvancedSearch->SearchValue);
            $this->OTEMPMRA->PlaceHolder = RemoveHtml($this->OTEMPMRA->caption());

            // ACTIVESTATUS
            $this->ACTIVESTATUS->EditAttrs["class"] = "form-control";
            $this->ACTIVESTATUS->EditCustomAttributes = "";
            if (!$this->ACTIVESTATUS->Raw) {
                $this->ACTIVESTATUS->AdvancedSearch->SearchValue = HtmlDecode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
            }
            $this->ACTIVESTATUS->EditValue = HtmlEncode($this->ACTIVESTATUS->AdvancedSearch->SearchValue);
            $this->ACTIVESTATUS->PlaceHolder = RemoveHtml($this->ACTIVESTATUS->caption());

            // PSGST
            $this->PSGST->EditAttrs["class"] = "form-control";
            $this->PSGST->EditCustomAttributes = "";
            $this->PSGST->EditValue = HtmlEncode($this->PSGST->AdvancedSearch->SearchValue);
            $this->PSGST->PlaceHolder = RemoveHtml($this->PSGST->caption());

            // PCGST
            $this->PCGST->EditAttrs["class"] = "form-control";
            $this->PCGST->EditCustomAttributes = "";
            $this->PCGST->EditValue = HtmlEncode($this->PCGST->AdvancedSearch->SearchValue);
            $this->PCGST->PlaceHolder = RemoveHtml($this->PCGST->caption());

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->AdvancedSearch->SearchValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->AdvancedSearch->SearchValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // baid
            $this->baid->EditAttrs["class"] = "form-control";
            $this->baid->EditCustomAttributes = "";
            $this->baid->EditValue = HtmlEncode($this->baid->AdvancedSearch->SearchValue);
            $this->baid->PlaceHolder = RemoveHtml($this->baid->caption());
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
        if (!CheckNumber($this->OpeningStk->AdvancedSearch->SearchValue)) {
            $this->OpeningStk->addErrorMessage($this->OpeningStk->getErrorMessage(false));
        }
        if (!CheckNumber($this->OpeningStk->AdvancedSearch->SearchValue2)) {
            $this->OpeningStk->addErrorMessage($this->OpeningStk->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurchaseQty->AdvancedSearch->SearchValue)) {
            $this->PurchaseQty->addErrorMessage($this->PurchaseQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurchaseQty->AdvancedSearch->SearchValue2)) {
            $this->PurchaseQty->addErrorMessage($this->PurchaseQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->SalesQty->AdvancedSearch->SearchValue)) {
            $this->SalesQty->addErrorMessage($this->SalesQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->SalesQty->AdvancedSearch->SearchValue2)) {
            $this->SalesQty->addErrorMessage($this->SalesQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->ClosingStk->AdvancedSearch->SearchValue)) {
            $this->ClosingStk->addErrorMessage($this->ClosingStk->getErrorMessage(false));
        }
        if (!CheckNumber($this->ClosingStk->AdvancedSearch->SearchValue2)) {
            $this->ClosingStk->addErrorMessage($this->ClosingStk->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurchasefreeQty->AdvancedSearch->SearchValue)) {
            $this->PurchasefreeQty->addErrorMessage($this->PurchasefreeQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->PurchasefreeQty->AdvancedSearch->SearchValue2)) {
            $this->PurchasefreeQty->addErrorMessage($this->PurchasefreeQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->TransferingQty->AdvancedSearch->SearchValue)) {
            $this->TransferingQty->addErrorMessage($this->TransferingQty->getErrorMessage(false));
        }
        if (!CheckNumber($this->TransferingQty->AdvancedSearch->SearchValue2)) {
            $this->TransferingQty->addErrorMessage($this->TransferingQty->getErrorMessage(false));
        }
        if (!CheckDate($this->CreatedDate->AdvancedSearch->SearchValue)) {
            $this->CreatedDate->addErrorMessage($this->CreatedDate->getErrorMessage(false));
        }
        if (!CheckDate($this->CreatedDate->AdvancedSearch->SearchValue2)) {
            $this->CreatedDate->addErrorMessage($this->CreatedDate->getErrorMessage(false));
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
        $this->PRC->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->BATCHNO->AdvancedSearch->load();
        $this->OpeningStk->AdvancedSearch->load();
        $this->PurchaseQty->AdvancedSearch->load();
        $this->SalesQty->AdvancedSearch->load();
        $this->ClosingStk->AdvancedSearch->load();
        $this->PurchasefreeQty->AdvancedSearch->load();
        $this->TransferingQty->AdvancedSearch->load();
        $this->UnitPurchaseRate->AdvancedSearch->load();
        $this->UnitSaleRate->AdvancedSearch->load();
        $this->CreatedDate->AdvancedSearch->load();
        $this->OQ->AdvancedSearch->load();
        $this->RQ->AdvancedSearch->load();
        $this->MRQ->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->EXPDT->AdvancedSearch->load();
        $this->UR->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->PRCODE->AdvancedSearch->load();
        $this->BATCH->AdvancedSearch->load();
        $this->PC->AdvancedSearch->load();
        $this->OLDRT->AdvancedSearch->load();
        $this->TEMPMRQ->AdvancedSearch->load();
        $this->TAXP->AdvancedSearch->load();
        $this->OLDRATE->AdvancedSearch->load();
        $this->NEWRATE->AdvancedSearch->load();
        $this->OTEMPMRA->AdvancedSearch->load();
        $this->ACTIVESTATUS->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->FRQ->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->UM->AdvancedSearch->load();
        $this->GENNAME->AdvancedSearch->load();
        $this->BILLDATE->AdvancedSearch->load();
        $this->CreatedDateTime->AdvancedSearch->load();
        $this->baid->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpharmacy_stock_movementlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpharmacy_stock_movementlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpharmacy_stock_movementlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_pharmacy_stock_movement" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pharmacy_stock_movement\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpharmacy_stock_movementlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_stock_movementlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
