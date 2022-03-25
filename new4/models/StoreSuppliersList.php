<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreSuppliersList extends StoreSuppliers
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_suppliers';

    // Page object name
    public $PageObjName = "StoreSuppliersList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fstore_supplierslist";
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

        // Table object (store_suppliers)
        if (!isset($GLOBALS["store_suppliers"]) || get_class($GLOBALS["store_suppliers"]) == PROJECT_NAMESPACE . "store_suppliers") {
            $GLOBALS["store_suppliers"] = &$this;
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
        $this->AddUrl = "StoreSuppliersAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "StoreSuppliersDelete";
        $this->MultiUpdateUrl = "StoreSuppliersUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_suppliers');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fstore_supplierslistsrch";

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
                $doc = new $class(Container("store_suppliers"));
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
        $this->Suppliercode->setVisibility();
        $this->Suppliername->setVisibility();
        $this->Abbreviation->setVisibility();
        $this->Creationdate->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->Citycode->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Tngstnumber->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->_Email->setVisibility();
        $this->Paymentmode->setVisibility();
        $this->Contactperson1->setVisibility();
        $this->CP1Address1->setVisibility();
        $this->CP1Address2->setVisibility();
        $this->CP1Address3->setVisibility();
        $this->CP1Citycode->setVisibility();
        $this->CP1State->setVisibility();
        $this->CP1Pincode->setVisibility();
        $this->CP1Designation->setVisibility();
        $this->CP1Phone->setVisibility();
        $this->CP1MobileNo->setVisibility();
        $this->CP1Fax->setVisibility();
        $this->CP1Email->setVisibility();
        $this->Contactperson2->setVisibility();
        $this->CP2Address1->setVisibility();
        $this->CP2Address2->setVisibility();
        $this->CP2Address3->setVisibility();
        $this->CP2Citycode->setVisibility();
        $this->CP2State->setVisibility();
        $this->CP2Pincode->setVisibility();
        $this->CP2Designation->setVisibility();
        $this->CP2Phone->setVisibility();
        $this->CP2MobileNo->setVisibility();
        $this->CP2Fax->setVisibility();
        $this->CP2Email->setVisibility();
        $this->Type->setVisibility();
        $this->Creditterms->setVisibility();
        $this->Remarks->setVisibility();
        $this->Tinnumber->setVisibility();
        $this->Universalsuppliercode->setVisibility();
        $this->Mobilenumber->setVisibility();
        $this->PANNumber->setVisibility();
        $this->SalesRepMobileNo->setVisibility();
        $this->GSTNumber->setVisibility();
        $this->TANNumber->setVisibility();
        $this->id->setVisibility();
        $this->HospID->setVisibility();
        $this->BranchID->setVisibility();
        $this->StoreID->setVisibility();
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

            // Get basic search values
            $this->loadBasicSearchValues();

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fstore_supplierslistsrch");
        }
        $filterList = Concat($filterList, $this->Suppliercode->AdvancedSearch->toJson(), ","); // Field Suppliercode
        $filterList = Concat($filterList, $this->Suppliername->AdvancedSearch->toJson(), ","); // Field Suppliername
        $filterList = Concat($filterList, $this->Abbreviation->AdvancedSearch->toJson(), ","); // Field Abbreviation
        $filterList = Concat($filterList, $this->Creationdate->AdvancedSearch->toJson(), ","); // Field Creationdate
        $filterList = Concat($filterList, $this->Address1->AdvancedSearch->toJson(), ","); // Field Address1
        $filterList = Concat($filterList, $this->Address2->AdvancedSearch->toJson(), ","); // Field Address2
        $filterList = Concat($filterList, $this->Address3->AdvancedSearch->toJson(), ","); // Field Address3
        $filterList = Concat($filterList, $this->Citycode->AdvancedSearch->toJson(), ","); // Field Citycode
        $filterList = Concat($filterList, $this->State->AdvancedSearch->toJson(), ","); // Field State
        $filterList = Concat($filterList, $this->Pincode->AdvancedSearch->toJson(), ","); // Field Pincode
        $filterList = Concat($filterList, $this->Tngstnumber->AdvancedSearch->toJson(), ","); // Field Tngstnumber
        $filterList = Concat($filterList, $this->Phone->AdvancedSearch->toJson(), ","); // Field Phone
        $filterList = Concat($filterList, $this->Fax->AdvancedSearch->toJson(), ","); // Field Fax
        $filterList = Concat($filterList, $this->_Email->AdvancedSearch->toJson(), ","); // Field Email
        $filterList = Concat($filterList, $this->Paymentmode->AdvancedSearch->toJson(), ","); // Field Paymentmode
        $filterList = Concat($filterList, $this->Contactperson1->AdvancedSearch->toJson(), ","); // Field Contactperson1
        $filterList = Concat($filterList, $this->CP1Address1->AdvancedSearch->toJson(), ","); // Field CP1Address1
        $filterList = Concat($filterList, $this->CP1Address2->AdvancedSearch->toJson(), ","); // Field CP1Address2
        $filterList = Concat($filterList, $this->CP1Address3->AdvancedSearch->toJson(), ","); // Field CP1Address3
        $filterList = Concat($filterList, $this->CP1Citycode->AdvancedSearch->toJson(), ","); // Field CP1Citycode
        $filterList = Concat($filterList, $this->CP1State->AdvancedSearch->toJson(), ","); // Field CP1State
        $filterList = Concat($filterList, $this->CP1Pincode->AdvancedSearch->toJson(), ","); // Field CP1Pincode
        $filterList = Concat($filterList, $this->CP1Designation->AdvancedSearch->toJson(), ","); // Field CP1Designation
        $filterList = Concat($filterList, $this->CP1Phone->AdvancedSearch->toJson(), ","); // Field CP1Phone
        $filterList = Concat($filterList, $this->CP1MobileNo->AdvancedSearch->toJson(), ","); // Field CP1MobileNo
        $filterList = Concat($filterList, $this->CP1Fax->AdvancedSearch->toJson(), ","); // Field CP1Fax
        $filterList = Concat($filterList, $this->CP1Email->AdvancedSearch->toJson(), ","); // Field CP1Email
        $filterList = Concat($filterList, $this->Contactperson2->AdvancedSearch->toJson(), ","); // Field Contactperson2
        $filterList = Concat($filterList, $this->CP2Address1->AdvancedSearch->toJson(), ","); // Field CP2Address1
        $filterList = Concat($filterList, $this->CP2Address2->AdvancedSearch->toJson(), ","); // Field CP2Address2
        $filterList = Concat($filterList, $this->CP2Address3->AdvancedSearch->toJson(), ","); // Field CP2Address3
        $filterList = Concat($filterList, $this->CP2Citycode->AdvancedSearch->toJson(), ","); // Field CP2Citycode
        $filterList = Concat($filterList, $this->CP2State->AdvancedSearch->toJson(), ","); // Field CP2State
        $filterList = Concat($filterList, $this->CP2Pincode->AdvancedSearch->toJson(), ","); // Field CP2Pincode
        $filterList = Concat($filterList, $this->CP2Designation->AdvancedSearch->toJson(), ","); // Field CP2Designation
        $filterList = Concat($filterList, $this->CP2Phone->AdvancedSearch->toJson(), ","); // Field CP2Phone
        $filterList = Concat($filterList, $this->CP2MobileNo->AdvancedSearch->toJson(), ","); // Field CP2MobileNo
        $filterList = Concat($filterList, $this->CP2Fax->AdvancedSearch->toJson(), ","); // Field CP2Fax
        $filterList = Concat($filterList, $this->CP2Email->AdvancedSearch->toJson(), ","); // Field CP2Email
        $filterList = Concat($filterList, $this->Type->AdvancedSearch->toJson(), ","); // Field Type
        $filterList = Concat($filterList, $this->Creditterms->AdvancedSearch->toJson(), ","); // Field Creditterms
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->Tinnumber->AdvancedSearch->toJson(), ","); // Field Tinnumber
        $filterList = Concat($filterList, $this->Universalsuppliercode->AdvancedSearch->toJson(), ","); // Field Universalsuppliercode
        $filterList = Concat($filterList, $this->Mobilenumber->AdvancedSearch->toJson(), ","); // Field Mobilenumber
        $filterList = Concat($filterList, $this->PANNumber->AdvancedSearch->toJson(), ","); // Field PANNumber
        $filterList = Concat($filterList, $this->SalesRepMobileNo->AdvancedSearch->toJson(), ","); // Field SalesRepMobileNo
        $filterList = Concat($filterList, $this->GSTNumber->AdvancedSearch->toJson(), ","); // Field GSTNumber
        $filterList = Concat($filterList, $this->TANNumber->AdvancedSearch->toJson(), ","); // Field TANNumber
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->BranchID->AdvancedSearch->toJson(), ","); // Field BranchID
        $filterList = Concat($filterList, $this->StoreID->AdvancedSearch->toJson(), ","); // Field StoreID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fstore_supplierslistsrch", $filters);
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

        // Field Suppliercode
        $this->Suppliercode->AdvancedSearch->SearchValue = @$filter["x_Suppliercode"];
        $this->Suppliercode->AdvancedSearch->SearchOperator = @$filter["z_Suppliercode"];
        $this->Suppliercode->AdvancedSearch->SearchCondition = @$filter["v_Suppliercode"];
        $this->Suppliercode->AdvancedSearch->SearchValue2 = @$filter["y_Suppliercode"];
        $this->Suppliercode->AdvancedSearch->SearchOperator2 = @$filter["w_Suppliercode"];
        $this->Suppliercode->AdvancedSearch->save();

        // Field Suppliername
        $this->Suppliername->AdvancedSearch->SearchValue = @$filter["x_Suppliername"];
        $this->Suppliername->AdvancedSearch->SearchOperator = @$filter["z_Suppliername"];
        $this->Suppliername->AdvancedSearch->SearchCondition = @$filter["v_Suppliername"];
        $this->Suppliername->AdvancedSearch->SearchValue2 = @$filter["y_Suppliername"];
        $this->Suppliername->AdvancedSearch->SearchOperator2 = @$filter["w_Suppliername"];
        $this->Suppliername->AdvancedSearch->save();

        // Field Abbreviation
        $this->Abbreviation->AdvancedSearch->SearchValue = @$filter["x_Abbreviation"];
        $this->Abbreviation->AdvancedSearch->SearchOperator = @$filter["z_Abbreviation"];
        $this->Abbreviation->AdvancedSearch->SearchCondition = @$filter["v_Abbreviation"];
        $this->Abbreviation->AdvancedSearch->SearchValue2 = @$filter["y_Abbreviation"];
        $this->Abbreviation->AdvancedSearch->SearchOperator2 = @$filter["w_Abbreviation"];
        $this->Abbreviation->AdvancedSearch->save();

        // Field Creationdate
        $this->Creationdate->AdvancedSearch->SearchValue = @$filter["x_Creationdate"];
        $this->Creationdate->AdvancedSearch->SearchOperator = @$filter["z_Creationdate"];
        $this->Creationdate->AdvancedSearch->SearchCondition = @$filter["v_Creationdate"];
        $this->Creationdate->AdvancedSearch->SearchValue2 = @$filter["y_Creationdate"];
        $this->Creationdate->AdvancedSearch->SearchOperator2 = @$filter["w_Creationdate"];
        $this->Creationdate->AdvancedSearch->save();

        // Field Address1
        $this->Address1->AdvancedSearch->SearchValue = @$filter["x_Address1"];
        $this->Address1->AdvancedSearch->SearchOperator = @$filter["z_Address1"];
        $this->Address1->AdvancedSearch->SearchCondition = @$filter["v_Address1"];
        $this->Address1->AdvancedSearch->SearchValue2 = @$filter["y_Address1"];
        $this->Address1->AdvancedSearch->SearchOperator2 = @$filter["w_Address1"];
        $this->Address1->AdvancedSearch->save();

        // Field Address2
        $this->Address2->AdvancedSearch->SearchValue = @$filter["x_Address2"];
        $this->Address2->AdvancedSearch->SearchOperator = @$filter["z_Address2"];
        $this->Address2->AdvancedSearch->SearchCondition = @$filter["v_Address2"];
        $this->Address2->AdvancedSearch->SearchValue2 = @$filter["y_Address2"];
        $this->Address2->AdvancedSearch->SearchOperator2 = @$filter["w_Address2"];
        $this->Address2->AdvancedSearch->save();

        // Field Address3
        $this->Address3->AdvancedSearch->SearchValue = @$filter["x_Address3"];
        $this->Address3->AdvancedSearch->SearchOperator = @$filter["z_Address3"];
        $this->Address3->AdvancedSearch->SearchCondition = @$filter["v_Address3"];
        $this->Address3->AdvancedSearch->SearchValue2 = @$filter["y_Address3"];
        $this->Address3->AdvancedSearch->SearchOperator2 = @$filter["w_Address3"];
        $this->Address3->AdvancedSearch->save();

        // Field Citycode
        $this->Citycode->AdvancedSearch->SearchValue = @$filter["x_Citycode"];
        $this->Citycode->AdvancedSearch->SearchOperator = @$filter["z_Citycode"];
        $this->Citycode->AdvancedSearch->SearchCondition = @$filter["v_Citycode"];
        $this->Citycode->AdvancedSearch->SearchValue2 = @$filter["y_Citycode"];
        $this->Citycode->AdvancedSearch->SearchOperator2 = @$filter["w_Citycode"];
        $this->Citycode->AdvancedSearch->save();

        // Field State
        $this->State->AdvancedSearch->SearchValue = @$filter["x_State"];
        $this->State->AdvancedSearch->SearchOperator = @$filter["z_State"];
        $this->State->AdvancedSearch->SearchCondition = @$filter["v_State"];
        $this->State->AdvancedSearch->SearchValue2 = @$filter["y_State"];
        $this->State->AdvancedSearch->SearchOperator2 = @$filter["w_State"];
        $this->State->AdvancedSearch->save();

        // Field Pincode
        $this->Pincode->AdvancedSearch->SearchValue = @$filter["x_Pincode"];
        $this->Pincode->AdvancedSearch->SearchOperator = @$filter["z_Pincode"];
        $this->Pincode->AdvancedSearch->SearchCondition = @$filter["v_Pincode"];
        $this->Pincode->AdvancedSearch->SearchValue2 = @$filter["y_Pincode"];
        $this->Pincode->AdvancedSearch->SearchOperator2 = @$filter["w_Pincode"];
        $this->Pincode->AdvancedSearch->save();

        // Field Tngstnumber
        $this->Tngstnumber->AdvancedSearch->SearchValue = @$filter["x_Tngstnumber"];
        $this->Tngstnumber->AdvancedSearch->SearchOperator = @$filter["z_Tngstnumber"];
        $this->Tngstnumber->AdvancedSearch->SearchCondition = @$filter["v_Tngstnumber"];
        $this->Tngstnumber->AdvancedSearch->SearchValue2 = @$filter["y_Tngstnumber"];
        $this->Tngstnumber->AdvancedSearch->SearchOperator2 = @$filter["w_Tngstnumber"];
        $this->Tngstnumber->AdvancedSearch->save();

        // Field Phone
        $this->Phone->AdvancedSearch->SearchValue = @$filter["x_Phone"];
        $this->Phone->AdvancedSearch->SearchOperator = @$filter["z_Phone"];
        $this->Phone->AdvancedSearch->SearchCondition = @$filter["v_Phone"];
        $this->Phone->AdvancedSearch->SearchValue2 = @$filter["y_Phone"];
        $this->Phone->AdvancedSearch->SearchOperator2 = @$filter["w_Phone"];
        $this->Phone->AdvancedSearch->save();

        // Field Fax
        $this->Fax->AdvancedSearch->SearchValue = @$filter["x_Fax"];
        $this->Fax->AdvancedSearch->SearchOperator = @$filter["z_Fax"];
        $this->Fax->AdvancedSearch->SearchCondition = @$filter["v_Fax"];
        $this->Fax->AdvancedSearch->SearchValue2 = @$filter["y_Fax"];
        $this->Fax->AdvancedSearch->SearchOperator2 = @$filter["w_Fax"];
        $this->Fax->AdvancedSearch->save();

        // Field Email
        $this->_Email->AdvancedSearch->SearchValue = @$filter["x__Email"];
        $this->_Email->AdvancedSearch->SearchOperator = @$filter["z__Email"];
        $this->_Email->AdvancedSearch->SearchCondition = @$filter["v__Email"];
        $this->_Email->AdvancedSearch->SearchValue2 = @$filter["y__Email"];
        $this->_Email->AdvancedSearch->SearchOperator2 = @$filter["w__Email"];
        $this->_Email->AdvancedSearch->save();

        // Field Paymentmode
        $this->Paymentmode->AdvancedSearch->SearchValue = @$filter["x_Paymentmode"];
        $this->Paymentmode->AdvancedSearch->SearchOperator = @$filter["z_Paymentmode"];
        $this->Paymentmode->AdvancedSearch->SearchCondition = @$filter["v_Paymentmode"];
        $this->Paymentmode->AdvancedSearch->SearchValue2 = @$filter["y_Paymentmode"];
        $this->Paymentmode->AdvancedSearch->SearchOperator2 = @$filter["w_Paymentmode"];
        $this->Paymentmode->AdvancedSearch->save();

        // Field Contactperson1
        $this->Contactperson1->AdvancedSearch->SearchValue = @$filter["x_Contactperson1"];
        $this->Contactperson1->AdvancedSearch->SearchOperator = @$filter["z_Contactperson1"];
        $this->Contactperson1->AdvancedSearch->SearchCondition = @$filter["v_Contactperson1"];
        $this->Contactperson1->AdvancedSearch->SearchValue2 = @$filter["y_Contactperson1"];
        $this->Contactperson1->AdvancedSearch->SearchOperator2 = @$filter["w_Contactperson1"];
        $this->Contactperson1->AdvancedSearch->save();

        // Field CP1Address1
        $this->CP1Address1->AdvancedSearch->SearchValue = @$filter["x_CP1Address1"];
        $this->CP1Address1->AdvancedSearch->SearchOperator = @$filter["z_CP1Address1"];
        $this->CP1Address1->AdvancedSearch->SearchCondition = @$filter["v_CP1Address1"];
        $this->CP1Address1->AdvancedSearch->SearchValue2 = @$filter["y_CP1Address1"];
        $this->CP1Address1->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Address1"];
        $this->CP1Address1->AdvancedSearch->save();

        // Field CP1Address2
        $this->CP1Address2->AdvancedSearch->SearchValue = @$filter["x_CP1Address2"];
        $this->CP1Address2->AdvancedSearch->SearchOperator = @$filter["z_CP1Address2"];
        $this->CP1Address2->AdvancedSearch->SearchCondition = @$filter["v_CP1Address2"];
        $this->CP1Address2->AdvancedSearch->SearchValue2 = @$filter["y_CP1Address2"];
        $this->CP1Address2->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Address2"];
        $this->CP1Address2->AdvancedSearch->save();

        // Field CP1Address3
        $this->CP1Address3->AdvancedSearch->SearchValue = @$filter["x_CP1Address3"];
        $this->CP1Address3->AdvancedSearch->SearchOperator = @$filter["z_CP1Address3"];
        $this->CP1Address3->AdvancedSearch->SearchCondition = @$filter["v_CP1Address3"];
        $this->CP1Address3->AdvancedSearch->SearchValue2 = @$filter["y_CP1Address3"];
        $this->CP1Address3->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Address3"];
        $this->CP1Address3->AdvancedSearch->save();

        // Field CP1Citycode
        $this->CP1Citycode->AdvancedSearch->SearchValue = @$filter["x_CP1Citycode"];
        $this->CP1Citycode->AdvancedSearch->SearchOperator = @$filter["z_CP1Citycode"];
        $this->CP1Citycode->AdvancedSearch->SearchCondition = @$filter["v_CP1Citycode"];
        $this->CP1Citycode->AdvancedSearch->SearchValue2 = @$filter["y_CP1Citycode"];
        $this->CP1Citycode->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Citycode"];
        $this->CP1Citycode->AdvancedSearch->save();

        // Field CP1State
        $this->CP1State->AdvancedSearch->SearchValue = @$filter["x_CP1State"];
        $this->CP1State->AdvancedSearch->SearchOperator = @$filter["z_CP1State"];
        $this->CP1State->AdvancedSearch->SearchCondition = @$filter["v_CP1State"];
        $this->CP1State->AdvancedSearch->SearchValue2 = @$filter["y_CP1State"];
        $this->CP1State->AdvancedSearch->SearchOperator2 = @$filter["w_CP1State"];
        $this->CP1State->AdvancedSearch->save();

        // Field CP1Pincode
        $this->CP1Pincode->AdvancedSearch->SearchValue = @$filter["x_CP1Pincode"];
        $this->CP1Pincode->AdvancedSearch->SearchOperator = @$filter["z_CP1Pincode"];
        $this->CP1Pincode->AdvancedSearch->SearchCondition = @$filter["v_CP1Pincode"];
        $this->CP1Pincode->AdvancedSearch->SearchValue2 = @$filter["y_CP1Pincode"];
        $this->CP1Pincode->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Pincode"];
        $this->CP1Pincode->AdvancedSearch->save();

        // Field CP1Designation
        $this->CP1Designation->AdvancedSearch->SearchValue = @$filter["x_CP1Designation"];
        $this->CP1Designation->AdvancedSearch->SearchOperator = @$filter["z_CP1Designation"];
        $this->CP1Designation->AdvancedSearch->SearchCondition = @$filter["v_CP1Designation"];
        $this->CP1Designation->AdvancedSearch->SearchValue2 = @$filter["y_CP1Designation"];
        $this->CP1Designation->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Designation"];
        $this->CP1Designation->AdvancedSearch->save();

        // Field CP1Phone
        $this->CP1Phone->AdvancedSearch->SearchValue = @$filter["x_CP1Phone"];
        $this->CP1Phone->AdvancedSearch->SearchOperator = @$filter["z_CP1Phone"];
        $this->CP1Phone->AdvancedSearch->SearchCondition = @$filter["v_CP1Phone"];
        $this->CP1Phone->AdvancedSearch->SearchValue2 = @$filter["y_CP1Phone"];
        $this->CP1Phone->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Phone"];
        $this->CP1Phone->AdvancedSearch->save();

        // Field CP1MobileNo
        $this->CP1MobileNo->AdvancedSearch->SearchValue = @$filter["x_CP1MobileNo"];
        $this->CP1MobileNo->AdvancedSearch->SearchOperator = @$filter["z_CP1MobileNo"];
        $this->CP1MobileNo->AdvancedSearch->SearchCondition = @$filter["v_CP1MobileNo"];
        $this->CP1MobileNo->AdvancedSearch->SearchValue2 = @$filter["y_CP1MobileNo"];
        $this->CP1MobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_CP1MobileNo"];
        $this->CP1MobileNo->AdvancedSearch->save();

        // Field CP1Fax
        $this->CP1Fax->AdvancedSearch->SearchValue = @$filter["x_CP1Fax"];
        $this->CP1Fax->AdvancedSearch->SearchOperator = @$filter["z_CP1Fax"];
        $this->CP1Fax->AdvancedSearch->SearchCondition = @$filter["v_CP1Fax"];
        $this->CP1Fax->AdvancedSearch->SearchValue2 = @$filter["y_CP1Fax"];
        $this->CP1Fax->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Fax"];
        $this->CP1Fax->AdvancedSearch->save();

        // Field CP1Email
        $this->CP1Email->AdvancedSearch->SearchValue = @$filter["x_CP1Email"];
        $this->CP1Email->AdvancedSearch->SearchOperator = @$filter["z_CP1Email"];
        $this->CP1Email->AdvancedSearch->SearchCondition = @$filter["v_CP1Email"];
        $this->CP1Email->AdvancedSearch->SearchValue2 = @$filter["y_CP1Email"];
        $this->CP1Email->AdvancedSearch->SearchOperator2 = @$filter["w_CP1Email"];
        $this->CP1Email->AdvancedSearch->save();

        // Field Contactperson2
        $this->Contactperson2->AdvancedSearch->SearchValue = @$filter["x_Contactperson2"];
        $this->Contactperson2->AdvancedSearch->SearchOperator = @$filter["z_Contactperson2"];
        $this->Contactperson2->AdvancedSearch->SearchCondition = @$filter["v_Contactperson2"];
        $this->Contactperson2->AdvancedSearch->SearchValue2 = @$filter["y_Contactperson2"];
        $this->Contactperson2->AdvancedSearch->SearchOperator2 = @$filter["w_Contactperson2"];
        $this->Contactperson2->AdvancedSearch->save();

        // Field CP2Address1
        $this->CP2Address1->AdvancedSearch->SearchValue = @$filter["x_CP2Address1"];
        $this->CP2Address1->AdvancedSearch->SearchOperator = @$filter["z_CP2Address1"];
        $this->CP2Address1->AdvancedSearch->SearchCondition = @$filter["v_CP2Address1"];
        $this->CP2Address1->AdvancedSearch->SearchValue2 = @$filter["y_CP2Address1"];
        $this->CP2Address1->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Address1"];
        $this->CP2Address1->AdvancedSearch->save();

        // Field CP2Address2
        $this->CP2Address2->AdvancedSearch->SearchValue = @$filter["x_CP2Address2"];
        $this->CP2Address2->AdvancedSearch->SearchOperator = @$filter["z_CP2Address2"];
        $this->CP2Address2->AdvancedSearch->SearchCondition = @$filter["v_CP2Address2"];
        $this->CP2Address2->AdvancedSearch->SearchValue2 = @$filter["y_CP2Address2"];
        $this->CP2Address2->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Address2"];
        $this->CP2Address2->AdvancedSearch->save();

        // Field CP2Address3
        $this->CP2Address3->AdvancedSearch->SearchValue = @$filter["x_CP2Address3"];
        $this->CP2Address3->AdvancedSearch->SearchOperator = @$filter["z_CP2Address3"];
        $this->CP2Address3->AdvancedSearch->SearchCondition = @$filter["v_CP2Address3"];
        $this->CP2Address3->AdvancedSearch->SearchValue2 = @$filter["y_CP2Address3"];
        $this->CP2Address3->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Address3"];
        $this->CP2Address3->AdvancedSearch->save();

        // Field CP2Citycode
        $this->CP2Citycode->AdvancedSearch->SearchValue = @$filter["x_CP2Citycode"];
        $this->CP2Citycode->AdvancedSearch->SearchOperator = @$filter["z_CP2Citycode"];
        $this->CP2Citycode->AdvancedSearch->SearchCondition = @$filter["v_CP2Citycode"];
        $this->CP2Citycode->AdvancedSearch->SearchValue2 = @$filter["y_CP2Citycode"];
        $this->CP2Citycode->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Citycode"];
        $this->CP2Citycode->AdvancedSearch->save();

        // Field CP2State
        $this->CP2State->AdvancedSearch->SearchValue = @$filter["x_CP2State"];
        $this->CP2State->AdvancedSearch->SearchOperator = @$filter["z_CP2State"];
        $this->CP2State->AdvancedSearch->SearchCondition = @$filter["v_CP2State"];
        $this->CP2State->AdvancedSearch->SearchValue2 = @$filter["y_CP2State"];
        $this->CP2State->AdvancedSearch->SearchOperator2 = @$filter["w_CP2State"];
        $this->CP2State->AdvancedSearch->save();

        // Field CP2Pincode
        $this->CP2Pincode->AdvancedSearch->SearchValue = @$filter["x_CP2Pincode"];
        $this->CP2Pincode->AdvancedSearch->SearchOperator = @$filter["z_CP2Pincode"];
        $this->CP2Pincode->AdvancedSearch->SearchCondition = @$filter["v_CP2Pincode"];
        $this->CP2Pincode->AdvancedSearch->SearchValue2 = @$filter["y_CP2Pincode"];
        $this->CP2Pincode->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Pincode"];
        $this->CP2Pincode->AdvancedSearch->save();

        // Field CP2Designation
        $this->CP2Designation->AdvancedSearch->SearchValue = @$filter["x_CP2Designation"];
        $this->CP2Designation->AdvancedSearch->SearchOperator = @$filter["z_CP2Designation"];
        $this->CP2Designation->AdvancedSearch->SearchCondition = @$filter["v_CP2Designation"];
        $this->CP2Designation->AdvancedSearch->SearchValue2 = @$filter["y_CP2Designation"];
        $this->CP2Designation->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Designation"];
        $this->CP2Designation->AdvancedSearch->save();

        // Field CP2Phone
        $this->CP2Phone->AdvancedSearch->SearchValue = @$filter["x_CP2Phone"];
        $this->CP2Phone->AdvancedSearch->SearchOperator = @$filter["z_CP2Phone"];
        $this->CP2Phone->AdvancedSearch->SearchCondition = @$filter["v_CP2Phone"];
        $this->CP2Phone->AdvancedSearch->SearchValue2 = @$filter["y_CP2Phone"];
        $this->CP2Phone->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Phone"];
        $this->CP2Phone->AdvancedSearch->save();

        // Field CP2MobileNo
        $this->CP2MobileNo->AdvancedSearch->SearchValue = @$filter["x_CP2MobileNo"];
        $this->CP2MobileNo->AdvancedSearch->SearchOperator = @$filter["z_CP2MobileNo"];
        $this->CP2MobileNo->AdvancedSearch->SearchCondition = @$filter["v_CP2MobileNo"];
        $this->CP2MobileNo->AdvancedSearch->SearchValue2 = @$filter["y_CP2MobileNo"];
        $this->CP2MobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_CP2MobileNo"];
        $this->CP2MobileNo->AdvancedSearch->save();

        // Field CP2Fax
        $this->CP2Fax->AdvancedSearch->SearchValue = @$filter["x_CP2Fax"];
        $this->CP2Fax->AdvancedSearch->SearchOperator = @$filter["z_CP2Fax"];
        $this->CP2Fax->AdvancedSearch->SearchCondition = @$filter["v_CP2Fax"];
        $this->CP2Fax->AdvancedSearch->SearchValue2 = @$filter["y_CP2Fax"];
        $this->CP2Fax->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Fax"];
        $this->CP2Fax->AdvancedSearch->save();

        // Field CP2Email
        $this->CP2Email->AdvancedSearch->SearchValue = @$filter["x_CP2Email"];
        $this->CP2Email->AdvancedSearch->SearchOperator = @$filter["z_CP2Email"];
        $this->CP2Email->AdvancedSearch->SearchCondition = @$filter["v_CP2Email"];
        $this->CP2Email->AdvancedSearch->SearchValue2 = @$filter["y_CP2Email"];
        $this->CP2Email->AdvancedSearch->SearchOperator2 = @$filter["w_CP2Email"];
        $this->CP2Email->AdvancedSearch->save();

        // Field Type
        $this->Type->AdvancedSearch->SearchValue = @$filter["x_Type"];
        $this->Type->AdvancedSearch->SearchOperator = @$filter["z_Type"];
        $this->Type->AdvancedSearch->SearchCondition = @$filter["v_Type"];
        $this->Type->AdvancedSearch->SearchValue2 = @$filter["y_Type"];
        $this->Type->AdvancedSearch->SearchOperator2 = @$filter["w_Type"];
        $this->Type->AdvancedSearch->save();

        // Field Creditterms
        $this->Creditterms->AdvancedSearch->SearchValue = @$filter["x_Creditterms"];
        $this->Creditterms->AdvancedSearch->SearchOperator = @$filter["z_Creditterms"];
        $this->Creditterms->AdvancedSearch->SearchCondition = @$filter["v_Creditterms"];
        $this->Creditterms->AdvancedSearch->SearchValue2 = @$filter["y_Creditterms"];
        $this->Creditterms->AdvancedSearch->SearchOperator2 = @$filter["w_Creditterms"];
        $this->Creditterms->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field Tinnumber
        $this->Tinnumber->AdvancedSearch->SearchValue = @$filter["x_Tinnumber"];
        $this->Tinnumber->AdvancedSearch->SearchOperator = @$filter["z_Tinnumber"];
        $this->Tinnumber->AdvancedSearch->SearchCondition = @$filter["v_Tinnumber"];
        $this->Tinnumber->AdvancedSearch->SearchValue2 = @$filter["y_Tinnumber"];
        $this->Tinnumber->AdvancedSearch->SearchOperator2 = @$filter["w_Tinnumber"];
        $this->Tinnumber->AdvancedSearch->save();

        // Field Universalsuppliercode
        $this->Universalsuppliercode->AdvancedSearch->SearchValue = @$filter["x_Universalsuppliercode"];
        $this->Universalsuppliercode->AdvancedSearch->SearchOperator = @$filter["z_Universalsuppliercode"];
        $this->Universalsuppliercode->AdvancedSearch->SearchCondition = @$filter["v_Universalsuppliercode"];
        $this->Universalsuppliercode->AdvancedSearch->SearchValue2 = @$filter["y_Universalsuppliercode"];
        $this->Universalsuppliercode->AdvancedSearch->SearchOperator2 = @$filter["w_Universalsuppliercode"];
        $this->Universalsuppliercode->AdvancedSearch->save();

        // Field Mobilenumber
        $this->Mobilenumber->AdvancedSearch->SearchValue = @$filter["x_Mobilenumber"];
        $this->Mobilenumber->AdvancedSearch->SearchOperator = @$filter["z_Mobilenumber"];
        $this->Mobilenumber->AdvancedSearch->SearchCondition = @$filter["v_Mobilenumber"];
        $this->Mobilenumber->AdvancedSearch->SearchValue2 = @$filter["y_Mobilenumber"];
        $this->Mobilenumber->AdvancedSearch->SearchOperator2 = @$filter["w_Mobilenumber"];
        $this->Mobilenumber->AdvancedSearch->save();

        // Field PANNumber
        $this->PANNumber->AdvancedSearch->SearchValue = @$filter["x_PANNumber"];
        $this->PANNumber->AdvancedSearch->SearchOperator = @$filter["z_PANNumber"];
        $this->PANNumber->AdvancedSearch->SearchCondition = @$filter["v_PANNumber"];
        $this->PANNumber->AdvancedSearch->SearchValue2 = @$filter["y_PANNumber"];
        $this->PANNumber->AdvancedSearch->SearchOperator2 = @$filter["w_PANNumber"];
        $this->PANNumber->AdvancedSearch->save();

        // Field SalesRepMobileNo
        $this->SalesRepMobileNo->AdvancedSearch->SearchValue = @$filter["x_SalesRepMobileNo"];
        $this->SalesRepMobileNo->AdvancedSearch->SearchOperator = @$filter["z_SalesRepMobileNo"];
        $this->SalesRepMobileNo->AdvancedSearch->SearchCondition = @$filter["v_SalesRepMobileNo"];
        $this->SalesRepMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_SalesRepMobileNo"];
        $this->SalesRepMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_SalesRepMobileNo"];
        $this->SalesRepMobileNo->AdvancedSearch->save();

        // Field GSTNumber
        $this->GSTNumber->AdvancedSearch->SearchValue = @$filter["x_GSTNumber"];
        $this->GSTNumber->AdvancedSearch->SearchOperator = @$filter["z_GSTNumber"];
        $this->GSTNumber->AdvancedSearch->SearchCondition = @$filter["v_GSTNumber"];
        $this->GSTNumber->AdvancedSearch->SearchValue2 = @$filter["y_GSTNumber"];
        $this->GSTNumber->AdvancedSearch->SearchOperator2 = @$filter["w_GSTNumber"];
        $this->GSTNumber->AdvancedSearch->save();

        // Field TANNumber
        $this->TANNumber->AdvancedSearch->SearchValue = @$filter["x_TANNumber"];
        $this->TANNumber->AdvancedSearch->SearchOperator = @$filter["z_TANNumber"];
        $this->TANNumber->AdvancedSearch->SearchCondition = @$filter["v_TANNumber"];
        $this->TANNumber->AdvancedSearch->SearchValue2 = @$filter["y_TANNumber"];
        $this->TANNumber->AdvancedSearch->SearchOperator2 = @$filter["w_TANNumber"];
        $this->TANNumber->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field BranchID
        $this->BranchID->AdvancedSearch->SearchValue = @$filter["x_BranchID"];
        $this->BranchID->AdvancedSearch->SearchOperator = @$filter["z_BranchID"];
        $this->BranchID->AdvancedSearch->SearchCondition = @$filter["v_BranchID"];
        $this->BranchID->AdvancedSearch->SearchValue2 = @$filter["y_BranchID"];
        $this->BranchID->AdvancedSearch->SearchOperator2 = @$filter["w_BranchID"];
        $this->BranchID->AdvancedSearch->save();

        // Field StoreID
        $this->StoreID->AdvancedSearch->SearchValue = @$filter["x_StoreID"];
        $this->StoreID->AdvancedSearch->SearchOperator = @$filter["z_StoreID"];
        $this->StoreID->AdvancedSearch->SearchCondition = @$filter["v_StoreID"];
        $this->StoreID->AdvancedSearch->SearchValue2 = @$filter["y_StoreID"];
        $this->StoreID->AdvancedSearch->SearchOperator2 = @$filter["w_StoreID"];
        $this->StoreID->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Suppliercode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Suppliername, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abbreviation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pincode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tngstnumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fax, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_Email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Paymentmode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Contactperson1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Address3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1State, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Pincode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Designation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1MobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Fax, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP1Email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Contactperson2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Address3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2State, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Pincode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Designation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2MobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Fax, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CP2Email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Creditterms, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tinnumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Universalsuppliercode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobilenumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PANNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SalesRepMobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GSTNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TANNumber, $arKeywords, $type);
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

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->Suppliercode); // Suppliercode
            $this->updateSort($this->Suppliername); // Suppliername
            $this->updateSort($this->Abbreviation); // Abbreviation
            $this->updateSort($this->Creationdate); // Creationdate
            $this->updateSort($this->Address1); // Address1
            $this->updateSort($this->Address2); // Address2
            $this->updateSort($this->Address3); // Address3
            $this->updateSort($this->Citycode); // Citycode
            $this->updateSort($this->State); // State
            $this->updateSort($this->Pincode); // Pincode
            $this->updateSort($this->Tngstnumber); // Tngstnumber
            $this->updateSort($this->Phone); // Phone
            $this->updateSort($this->Fax); // Fax
            $this->updateSort($this->_Email); // Email
            $this->updateSort($this->Paymentmode); // Paymentmode
            $this->updateSort($this->Contactperson1); // Contactperson1
            $this->updateSort($this->CP1Address1); // CP1Address1
            $this->updateSort($this->CP1Address2); // CP1Address2
            $this->updateSort($this->CP1Address3); // CP1Address3
            $this->updateSort($this->CP1Citycode); // CP1Citycode
            $this->updateSort($this->CP1State); // CP1State
            $this->updateSort($this->CP1Pincode); // CP1Pincode
            $this->updateSort($this->CP1Designation); // CP1Designation
            $this->updateSort($this->CP1Phone); // CP1Phone
            $this->updateSort($this->CP1MobileNo); // CP1MobileNo
            $this->updateSort($this->CP1Fax); // CP1Fax
            $this->updateSort($this->CP1Email); // CP1Email
            $this->updateSort($this->Contactperson2); // Contactperson2
            $this->updateSort($this->CP2Address1); // CP2Address1
            $this->updateSort($this->CP2Address2); // CP2Address2
            $this->updateSort($this->CP2Address3); // CP2Address3
            $this->updateSort($this->CP2Citycode); // CP2Citycode
            $this->updateSort($this->CP2State); // CP2State
            $this->updateSort($this->CP2Pincode); // CP2Pincode
            $this->updateSort($this->CP2Designation); // CP2Designation
            $this->updateSort($this->CP2Phone); // CP2Phone
            $this->updateSort($this->CP2MobileNo); // CP2MobileNo
            $this->updateSort($this->CP2Fax); // CP2Fax
            $this->updateSort($this->CP2Email); // CP2Email
            $this->updateSort($this->Type); // Type
            $this->updateSort($this->Creditterms); // Creditterms
            $this->updateSort($this->Remarks); // Remarks
            $this->updateSort($this->Tinnumber); // Tinnumber
            $this->updateSort($this->Universalsuppliercode); // Universalsuppliercode
            $this->updateSort($this->Mobilenumber); // Mobilenumber
            $this->updateSort($this->PANNumber); // PANNumber
            $this->updateSort($this->SalesRepMobileNo); // SalesRepMobileNo
            $this->updateSort($this->GSTNumber); // GSTNumber
            $this->updateSort($this->TANNumber); // TANNumber
            $this->updateSort($this->id); // id
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->BranchID); // BranchID
            $this->updateSort($this->StoreID); // StoreID
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
                $this->Suppliercode->setSort("");
                $this->Suppliername->setSort("");
                $this->Abbreviation->setSort("");
                $this->Creationdate->setSort("");
                $this->Address1->setSort("");
                $this->Address2->setSort("");
                $this->Address3->setSort("");
                $this->Citycode->setSort("");
                $this->State->setSort("");
                $this->Pincode->setSort("");
                $this->Tngstnumber->setSort("");
                $this->Phone->setSort("");
                $this->Fax->setSort("");
                $this->_Email->setSort("");
                $this->Paymentmode->setSort("");
                $this->Contactperson1->setSort("");
                $this->CP1Address1->setSort("");
                $this->CP1Address2->setSort("");
                $this->CP1Address3->setSort("");
                $this->CP1Citycode->setSort("");
                $this->CP1State->setSort("");
                $this->CP1Pincode->setSort("");
                $this->CP1Designation->setSort("");
                $this->CP1Phone->setSort("");
                $this->CP1MobileNo->setSort("");
                $this->CP1Fax->setSort("");
                $this->CP1Email->setSort("");
                $this->Contactperson2->setSort("");
                $this->CP2Address1->setSort("");
                $this->CP2Address2->setSort("");
                $this->CP2Address3->setSort("");
                $this->CP2Citycode->setSort("");
                $this->CP2State->setSort("");
                $this->CP2Pincode->setSort("");
                $this->CP2Designation->setSort("");
                $this->CP2Phone->setSort("");
                $this->CP2MobileNo->setSort("");
                $this->CP2Fax->setSort("");
                $this->CP2Email->setSort("");
                $this->Type->setSort("");
                $this->Creditterms->setSort("");
                $this->Remarks->setSort("");
                $this->Tinnumber->setSort("");
                $this->Universalsuppliercode->setSort("");
                $this->Mobilenumber->setSort("");
                $this->PANNumber->setSort("");
                $this->SalesRepMobileNo->setSort("");
                $this->GSTNumber->setSort("");
                $this->TANNumber->setSort("");
                $this->id->setSort("");
                $this->HospID->setSort("");
                $this->BranchID->setSort("");
                $this->StoreID->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fstore_supplierslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fstore_supplierslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fstore_supplierslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Suppliercode->setDbValue($row['Suppliercode']);
        $this->Suppliername->setDbValue($row['Suppliername']);
        $this->Abbreviation->setDbValue($row['Abbreviation']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->Citycode->setDbValue($row['Citycode']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Tngstnumber->setDbValue($row['Tngstnumber']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Paymentmode->setDbValue($row['Paymentmode']);
        $this->Contactperson1->setDbValue($row['Contactperson1']);
        $this->CP1Address1->setDbValue($row['CP1Address1']);
        $this->CP1Address2->setDbValue($row['CP1Address2']);
        $this->CP1Address3->setDbValue($row['CP1Address3']);
        $this->CP1Citycode->setDbValue($row['CP1Citycode']);
        $this->CP1State->setDbValue($row['CP1State']);
        $this->CP1Pincode->setDbValue($row['CP1Pincode']);
        $this->CP1Designation->setDbValue($row['CP1Designation']);
        $this->CP1Phone->setDbValue($row['CP1Phone']);
        $this->CP1MobileNo->setDbValue($row['CP1MobileNo']);
        $this->CP1Fax->setDbValue($row['CP1Fax']);
        $this->CP1Email->setDbValue($row['CP1Email']);
        $this->Contactperson2->setDbValue($row['Contactperson2']);
        $this->CP2Address1->setDbValue($row['CP2Address1']);
        $this->CP2Address2->setDbValue($row['CP2Address2']);
        $this->CP2Address3->setDbValue($row['CP2Address3']);
        $this->CP2Citycode->setDbValue($row['CP2Citycode']);
        $this->CP2State->setDbValue($row['CP2State']);
        $this->CP2Pincode->setDbValue($row['CP2Pincode']);
        $this->CP2Designation->setDbValue($row['CP2Designation']);
        $this->CP2Phone->setDbValue($row['CP2Phone']);
        $this->CP2MobileNo->setDbValue($row['CP2MobileNo']);
        $this->CP2Fax->setDbValue($row['CP2Fax']);
        $this->CP2Email->setDbValue($row['CP2Email']);
        $this->Type->setDbValue($row['Type']);
        $this->Creditterms->setDbValue($row['Creditterms']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->Tinnumber->setDbValue($row['Tinnumber']);
        $this->Universalsuppliercode->setDbValue($row['Universalsuppliercode']);
        $this->Mobilenumber->setDbValue($row['Mobilenumber']);
        $this->PANNumber->setDbValue($row['PANNumber']);
        $this->SalesRepMobileNo->setDbValue($row['SalesRepMobileNo']);
        $this->GSTNumber->setDbValue($row['GSTNumber']);
        $this->TANNumber->setDbValue($row['TANNumber']);
        $this->id->setDbValue($row['id']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BranchID->setDbValue($row['BranchID']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Suppliercode'] = null;
        $row['Suppliername'] = null;
        $row['Abbreviation'] = null;
        $row['Creationdate'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['Citycode'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Tngstnumber'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['Email'] = null;
        $row['Paymentmode'] = null;
        $row['Contactperson1'] = null;
        $row['CP1Address1'] = null;
        $row['CP1Address2'] = null;
        $row['CP1Address3'] = null;
        $row['CP1Citycode'] = null;
        $row['CP1State'] = null;
        $row['CP1Pincode'] = null;
        $row['CP1Designation'] = null;
        $row['CP1Phone'] = null;
        $row['CP1MobileNo'] = null;
        $row['CP1Fax'] = null;
        $row['CP1Email'] = null;
        $row['Contactperson2'] = null;
        $row['CP2Address1'] = null;
        $row['CP2Address2'] = null;
        $row['CP2Address3'] = null;
        $row['CP2Citycode'] = null;
        $row['CP2State'] = null;
        $row['CP2Pincode'] = null;
        $row['CP2Designation'] = null;
        $row['CP2Phone'] = null;
        $row['CP2MobileNo'] = null;
        $row['CP2Fax'] = null;
        $row['CP2Email'] = null;
        $row['Type'] = null;
        $row['Creditterms'] = null;
        $row['Remarks'] = null;
        $row['Tinnumber'] = null;
        $row['Universalsuppliercode'] = null;
        $row['Mobilenumber'] = null;
        $row['PANNumber'] = null;
        $row['SalesRepMobileNo'] = null;
        $row['GSTNumber'] = null;
        $row['TANNumber'] = null;
        $row['id'] = null;
        $row['HospID'] = null;
        $row['BranchID'] = null;
        $row['StoreID'] = null;
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

        // Suppliercode

        // Suppliername

        // Abbreviation

        // Creationdate

        // Address1

        // Address2

        // Address3

        // Citycode

        // State

        // Pincode

        // Tngstnumber

        // Phone

        // Fax

        // Email

        // Paymentmode

        // Contactperson1

        // CP1Address1

        // CP1Address2

        // CP1Address3

        // CP1Citycode

        // CP1State

        // CP1Pincode

        // CP1Designation

        // CP1Phone

        // CP1MobileNo

        // CP1Fax

        // CP1Email

        // Contactperson2

        // CP2Address1

        // CP2Address2

        // CP2Address3

        // CP2Citycode

        // CP2State

        // CP2Pincode

        // CP2Designation

        // CP2Phone

        // CP2MobileNo

        // CP2Fax

        // CP2Email

        // Type

        // Creditterms

        // Remarks

        // Tinnumber

        // Universalsuppliercode

        // Mobilenumber

        // PANNumber

        // SalesRepMobileNo

        // GSTNumber

        // TANNumber

        // id

        // HospID

        // BranchID

        // StoreID
        if ($this->RowType == ROWTYPE_VIEW) {
            // Suppliercode
            $this->Suppliercode->ViewValue = $this->Suppliercode->CurrentValue;
            $this->Suppliercode->ViewCustomAttributes = "";

            // Suppliername
            $this->Suppliername->ViewValue = $this->Suppliername->CurrentValue;
            $this->Suppliername->ViewCustomAttributes = "";

            // Abbreviation
            $this->Abbreviation->ViewValue = $this->Abbreviation->CurrentValue;
            $this->Abbreviation->ViewCustomAttributes = "";

            // Creationdate
            $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
            $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
            $this->Creationdate->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // Citycode
            $this->Citycode->ViewValue = $this->Citycode->CurrentValue;
            $this->Citycode->ViewValue = FormatNumber($this->Citycode->ViewValue, 0, -2, -2, -2);
            $this->Citycode->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Tngstnumber
            $this->Tngstnumber->ViewValue = $this->Tngstnumber->CurrentValue;
            $this->Tngstnumber->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // Email
            $this->_Email->ViewValue = $this->_Email->CurrentValue;
            $this->_Email->ViewCustomAttributes = "";

            // Paymentmode
            $this->Paymentmode->ViewValue = $this->Paymentmode->CurrentValue;
            $this->Paymentmode->ViewCustomAttributes = "";

            // Contactperson1
            $this->Contactperson1->ViewValue = $this->Contactperson1->CurrentValue;
            $this->Contactperson1->ViewCustomAttributes = "";

            // CP1Address1
            $this->CP1Address1->ViewValue = $this->CP1Address1->CurrentValue;
            $this->CP1Address1->ViewCustomAttributes = "";

            // CP1Address2
            $this->CP1Address2->ViewValue = $this->CP1Address2->CurrentValue;
            $this->CP1Address2->ViewCustomAttributes = "";

            // CP1Address3
            $this->CP1Address3->ViewValue = $this->CP1Address3->CurrentValue;
            $this->CP1Address3->ViewCustomAttributes = "";

            // CP1Citycode
            $this->CP1Citycode->ViewValue = $this->CP1Citycode->CurrentValue;
            $this->CP1Citycode->ViewValue = FormatNumber($this->CP1Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP1Citycode->ViewCustomAttributes = "";

            // CP1State
            $this->CP1State->ViewValue = $this->CP1State->CurrentValue;
            $this->CP1State->ViewCustomAttributes = "";

            // CP1Pincode
            $this->CP1Pincode->ViewValue = $this->CP1Pincode->CurrentValue;
            $this->CP1Pincode->ViewCustomAttributes = "";

            // CP1Designation
            $this->CP1Designation->ViewValue = $this->CP1Designation->CurrentValue;
            $this->CP1Designation->ViewCustomAttributes = "";

            // CP1Phone
            $this->CP1Phone->ViewValue = $this->CP1Phone->CurrentValue;
            $this->CP1Phone->ViewCustomAttributes = "";

            // CP1MobileNo
            $this->CP1MobileNo->ViewValue = $this->CP1MobileNo->CurrentValue;
            $this->CP1MobileNo->ViewCustomAttributes = "";

            // CP1Fax
            $this->CP1Fax->ViewValue = $this->CP1Fax->CurrentValue;
            $this->CP1Fax->ViewCustomAttributes = "";

            // CP1Email
            $this->CP1Email->ViewValue = $this->CP1Email->CurrentValue;
            $this->CP1Email->ViewCustomAttributes = "";

            // Contactperson2
            $this->Contactperson2->ViewValue = $this->Contactperson2->CurrentValue;
            $this->Contactperson2->ViewCustomAttributes = "";

            // CP2Address1
            $this->CP2Address1->ViewValue = $this->CP2Address1->CurrentValue;
            $this->CP2Address1->ViewCustomAttributes = "";

            // CP2Address2
            $this->CP2Address2->ViewValue = $this->CP2Address2->CurrentValue;
            $this->CP2Address2->ViewCustomAttributes = "";

            // CP2Address3
            $this->CP2Address3->ViewValue = $this->CP2Address3->CurrentValue;
            $this->CP2Address3->ViewCustomAttributes = "";

            // CP2Citycode
            $this->CP2Citycode->ViewValue = $this->CP2Citycode->CurrentValue;
            $this->CP2Citycode->ViewValue = FormatNumber($this->CP2Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP2Citycode->ViewCustomAttributes = "";

            // CP2State
            $this->CP2State->ViewValue = $this->CP2State->CurrentValue;
            $this->CP2State->ViewCustomAttributes = "";

            // CP2Pincode
            $this->CP2Pincode->ViewValue = $this->CP2Pincode->CurrentValue;
            $this->CP2Pincode->ViewCustomAttributes = "";

            // CP2Designation
            $this->CP2Designation->ViewValue = $this->CP2Designation->CurrentValue;
            $this->CP2Designation->ViewCustomAttributes = "";

            // CP2Phone
            $this->CP2Phone->ViewValue = $this->CP2Phone->CurrentValue;
            $this->CP2Phone->ViewCustomAttributes = "";

            // CP2MobileNo
            $this->CP2MobileNo->ViewValue = $this->CP2MobileNo->CurrentValue;
            $this->CP2MobileNo->ViewCustomAttributes = "";

            // CP2Fax
            $this->CP2Fax->ViewValue = $this->CP2Fax->CurrentValue;
            $this->CP2Fax->ViewCustomAttributes = "";

            // CP2Email
            $this->CP2Email->ViewValue = $this->CP2Email->CurrentValue;
            $this->CP2Email->ViewCustomAttributes = "";

            // Type
            $this->Type->ViewValue = $this->Type->CurrentValue;
            $this->Type->ViewCustomAttributes = "";

            // Creditterms
            $this->Creditterms->ViewValue = $this->Creditterms->CurrentValue;
            $this->Creditterms->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // Tinnumber
            $this->Tinnumber->ViewValue = $this->Tinnumber->CurrentValue;
            $this->Tinnumber->ViewCustomAttributes = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->ViewValue = $this->Universalsuppliercode->CurrentValue;
            $this->Universalsuppliercode->ViewCustomAttributes = "";

            // Mobilenumber
            $this->Mobilenumber->ViewValue = $this->Mobilenumber->CurrentValue;
            $this->Mobilenumber->ViewCustomAttributes = "";

            // PANNumber
            $this->PANNumber->ViewValue = $this->PANNumber->CurrentValue;
            $this->PANNumber->ViewCustomAttributes = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->ViewValue = $this->SalesRepMobileNo->CurrentValue;
            $this->SalesRepMobileNo->ViewCustomAttributes = "";

            // GSTNumber
            $this->GSTNumber->ViewValue = $this->GSTNumber->CurrentValue;
            $this->GSTNumber->ViewCustomAttributes = "";

            // TANNumber
            $this->TANNumber->ViewValue = $this->TANNumber->CurrentValue;
            $this->TANNumber->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // BranchID
            $this->BranchID->ViewValue = $this->BranchID->CurrentValue;
            $this->BranchID->ViewValue = FormatNumber($this->BranchID->ViewValue, 0, -2, -2, -2);
            $this->BranchID->ViewCustomAttributes = "";

            // StoreID
            $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
            $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
            $this->StoreID->ViewCustomAttributes = "";

            // Suppliercode
            $this->Suppliercode->LinkCustomAttributes = "";
            $this->Suppliercode->HrefValue = "";
            $this->Suppliercode->TooltipValue = "";

            // Suppliername
            $this->Suppliername->LinkCustomAttributes = "";
            $this->Suppliername->HrefValue = "";
            $this->Suppliername->TooltipValue = "";

            // Abbreviation
            $this->Abbreviation->LinkCustomAttributes = "";
            $this->Abbreviation->HrefValue = "";
            $this->Abbreviation->TooltipValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";
            $this->Creationdate->TooltipValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";
            $this->Address1->TooltipValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";
            $this->Address2->TooltipValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";
            $this->Address3->TooltipValue = "";

            // Citycode
            $this->Citycode->LinkCustomAttributes = "";
            $this->Citycode->HrefValue = "";
            $this->Citycode->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Tngstnumber
            $this->Tngstnumber->LinkCustomAttributes = "";
            $this->Tngstnumber->HrefValue = "";
            $this->Tngstnumber->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";
            $this->Fax->TooltipValue = "";

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";
            $this->_Email->TooltipValue = "";

            // Paymentmode
            $this->Paymentmode->LinkCustomAttributes = "";
            $this->Paymentmode->HrefValue = "";
            $this->Paymentmode->TooltipValue = "";

            // Contactperson1
            $this->Contactperson1->LinkCustomAttributes = "";
            $this->Contactperson1->HrefValue = "";
            $this->Contactperson1->TooltipValue = "";

            // CP1Address1
            $this->CP1Address1->LinkCustomAttributes = "";
            $this->CP1Address1->HrefValue = "";
            $this->CP1Address1->TooltipValue = "";

            // CP1Address2
            $this->CP1Address2->LinkCustomAttributes = "";
            $this->CP1Address2->HrefValue = "";
            $this->CP1Address2->TooltipValue = "";

            // CP1Address3
            $this->CP1Address3->LinkCustomAttributes = "";
            $this->CP1Address3->HrefValue = "";
            $this->CP1Address3->TooltipValue = "";

            // CP1Citycode
            $this->CP1Citycode->LinkCustomAttributes = "";
            $this->CP1Citycode->HrefValue = "";
            $this->CP1Citycode->TooltipValue = "";

            // CP1State
            $this->CP1State->LinkCustomAttributes = "";
            $this->CP1State->HrefValue = "";
            $this->CP1State->TooltipValue = "";

            // CP1Pincode
            $this->CP1Pincode->LinkCustomAttributes = "";
            $this->CP1Pincode->HrefValue = "";
            $this->CP1Pincode->TooltipValue = "";

            // CP1Designation
            $this->CP1Designation->LinkCustomAttributes = "";
            $this->CP1Designation->HrefValue = "";
            $this->CP1Designation->TooltipValue = "";

            // CP1Phone
            $this->CP1Phone->LinkCustomAttributes = "";
            $this->CP1Phone->HrefValue = "";
            $this->CP1Phone->TooltipValue = "";

            // CP1MobileNo
            $this->CP1MobileNo->LinkCustomAttributes = "";
            $this->CP1MobileNo->HrefValue = "";
            $this->CP1MobileNo->TooltipValue = "";

            // CP1Fax
            $this->CP1Fax->LinkCustomAttributes = "";
            $this->CP1Fax->HrefValue = "";
            $this->CP1Fax->TooltipValue = "";

            // CP1Email
            $this->CP1Email->LinkCustomAttributes = "";
            $this->CP1Email->HrefValue = "";
            $this->CP1Email->TooltipValue = "";

            // Contactperson2
            $this->Contactperson2->LinkCustomAttributes = "";
            $this->Contactperson2->HrefValue = "";
            $this->Contactperson2->TooltipValue = "";

            // CP2Address1
            $this->CP2Address1->LinkCustomAttributes = "";
            $this->CP2Address1->HrefValue = "";
            $this->CP2Address1->TooltipValue = "";

            // CP2Address2
            $this->CP2Address2->LinkCustomAttributes = "";
            $this->CP2Address2->HrefValue = "";
            $this->CP2Address2->TooltipValue = "";

            // CP2Address3
            $this->CP2Address3->LinkCustomAttributes = "";
            $this->CP2Address3->HrefValue = "";
            $this->CP2Address3->TooltipValue = "";

            // CP2Citycode
            $this->CP2Citycode->LinkCustomAttributes = "";
            $this->CP2Citycode->HrefValue = "";
            $this->CP2Citycode->TooltipValue = "";

            // CP2State
            $this->CP2State->LinkCustomAttributes = "";
            $this->CP2State->HrefValue = "";
            $this->CP2State->TooltipValue = "";

            // CP2Pincode
            $this->CP2Pincode->LinkCustomAttributes = "";
            $this->CP2Pincode->HrefValue = "";
            $this->CP2Pincode->TooltipValue = "";

            // CP2Designation
            $this->CP2Designation->LinkCustomAttributes = "";
            $this->CP2Designation->HrefValue = "";
            $this->CP2Designation->TooltipValue = "";

            // CP2Phone
            $this->CP2Phone->LinkCustomAttributes = "";
            $this->CP2Phone->HrefValue = "";
            $this->CP2Phone->TooltipValue = "";

            // CP2MobileNo
            $this->CP2MobileNo->LinkCustomAttributes = "";
            $this->CP2MobileNo->HrefValue = "";
            $this->CP2MobileNo->TooltipValue = "";

            // CP2Fax
            $this->CP2Fax->LinkCustomAttributes = "";
            $this->CP2Fax->HrefValue = "";
            $this->CP2Fax->TooltipValue = "";

            // CP2Email
            $this->CP2Email->LinkCustomAttributes = "";
            $this->CP2Email->HrefValue = "";
            $this->CP2Email->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // Creditterms
            $this->Creditterms->LinkCustomAttributes = "";
            $this->Creditterms->HrefValue = "";
            $this->Creditterms->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // Tinnumber
            $this->Tinnumber->LinkCustomAttributes = "";
            $this->Tinnumber->HrefValue = "";
            $this->Tinnumber->TooltipValue = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->LinkCustomAttributes = "";
            $this->Universalsuppliercode->HrefValue = "";
            $this->Universalsuppliercode->TooltipValue = "";

            // Mobilenumber
            $this->Mobilenumber->LinkCustomAttributes = "";
            $this->Mobilenumber->HrefValue = "";
            $this->Mobilenumber->TooltipValue = "";

            // PANNumber
            $this->PANNumber->LinkCustomAttributes = "";
            $this->PANNumber->HrefValue = "";
            $this->PANNumber->TooltipValue = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->LinkCustomAttributes = "";
            $this->SalesRepMobileNo->HrefValue = "";
            $this->SalesRepMobileNo->TooltipValue = "";

            // GSTNumber
            $this->GSTNumber->LinkCustomAttributes = "";
            $this->GSTNumber->HrefValue = "";
            $this->GSTNumber->TooltipValue = "";

            // TANNumber
            $this->TANNumber->LinkCustomAttributes = "";
            $this->TANNumber->HrefValue = "";
            $this->TANNumber->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // BranchID
            $this->BranchID->LinkCustomAttributes = "";
            $this->BranchID->HrefValue = "";
            $this->BranchID->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fstore_supplierslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fstore_supplierslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fstore_supplierslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_store_suppliers" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_store_suppliers\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fstore_supplierslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fstore_supplierslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
