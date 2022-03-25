<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresTradeCombinationNamesNewList extends PresTradeCombinationNamesNew
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_trade_combination_names_new';

    // Page object name
    public $PageObjName = "PresTradeCombinationNamesNewList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpres_trade_combination_names_newlist";
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

        // Table object (pres_trade_combination_names_new)
        if (!isset($GLOBALS["pres_trade_combination_names_new"]) || get_class($GLOBALS["pres_trade_combination_names_new"]) == PROJECT_NAMESPACE . "pres_trade_combination_names_new") {
            $GLOBALS["pres_trade_combination_names_new"] = &$this;
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
        $this->AddUrl = "PresTradeCombinationNamesNewAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PresTradeCombinationNamesNewDelete";
        $this->MultiUpdateUrl = "PresTradeCombinationNamesNewUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_trade_combination_names_new');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpres_trade_combination_names_newlistsrch";

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
                $doc = new $class(Container("pres_trade_combination_names_new"));
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
            $key .= @$ar['ID'];
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
            $this->ID->Visible = false;
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

        // Create form object
        $CurrentForm = new HttpForm();

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
        $this->ID->setVisibility();
        $this->tradenames_id->setVisibility();
        $this->Drug_Name->setVisibility();
        $this->Generic_Name->setVisibility();
        $this->Trade_Name->setVisibility();
        $this->PR_CODE->setVisibility();
        $this->Form->setVisibility();
        $this->Strength->setVisibility();
        $this->Unit->setVisibility();
        $this->CONTAINER_TYPE->setVisibility();
        $this->CONTAINER_STRENGTH->setVisibility();
        $this->TypeOfDrug->setVisibility();
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up master detail parameters
        $this->setupMasterParms();

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
        $this->setupLookupOptions($this->Generic_Name);
        $this->setupLookupOptions($this->Form);
        $this->setupLookupOptions($this->Unit);

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

            // Check QueryString parameters
            if (Get("action") !== null) {
                $this->CurrentAction = Get("action");

                // Clear inline mode
                if ($this->isCancel()) {
                    $this->clearInlineMode();
                }

                // Switch to grid edit mode
                if ($this->isGridEdit()) {
                    $this->gridEditMode();
                }

                // Switch to inline add mode
                if ($this->isAdd() || $this->isCopy()) {
                    $this->inlineAddMode();
                }

                // Switch to grid add mode
                if ($this->isGridAdd()) {
                    $this->gridAddMode();
                }
            } else {
                if (Post("action") !== null) {
                    $this->CurrentAction = Post("action"); // Get action

                    // Grid Update
                    if (($this->isGridUpdate() || $this->isGridOverwrite()) && Session(SESSION_INLINE_MODE) == "gridedit") {
                        if ($this->validateGridForm()) {
                            $gridUpdate = $this->gridUpdate();
                        } else {
                            $gridUpdate = false;
                        }
                        if ($gridUpdate) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridEditMode(); // Stay in Grid edit mode
                        }
                    }

                    // Insert Inline
                    if ($this->isInsert() && Session(SESSION_INLINE_MODE) == "add") {
                        $this->setKey(Post($this->OldKeyName));
                        $this->inlineInsert();
                    }

                    // Grid Insert
                    if ($this->isGridInsert() && Session(SESSION_INLINE_MODE) == "gridadd") {
                        if ($this->validateGridForm()) {
                            $gridInsert = $this->gridInsert();
                        } else {
                            $gridInsert = false;
                        }
                        if ($gridInsert) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridAddMode(); // Stay in Grid add mode
                        }
                    }
                } elseif (Session(SESSION_INLINE_MODE) == "gridedit") { // Previously in grid edit mode
                    if (Get(Config("TABLE_START_REC")) !== null || Get(Config("TABLE_PAGE_NO")) !== null) { // Stay in grid edit mode if paging
                        $this->gridEditMode();
                    } else { // Reset grid edit
                        $this->clearInlineMode();
                    }
                }
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

            // Show grid delete link for grid add / grid edit
            if ($this->AllowAddDeleteRow) {
                if ($this->isGridAdd() || $this->isGridEdit()) {
                    $item = $this->ListOptions["griddelete"];
                    if ($item) {
                        $item->Visible = true;
                    }
                }
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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pres_tradenames_new") {
            $masterTbl = Container("pres_tradenames_new");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PresTradenamesNewList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

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

    // Exit inline mode
    protected function clearInlineMode()
    {
        $this->LastAction = $this->CurrentAction; // Save last action
        $this->CurrentAction = ""; // Clear action
        $_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
    }

    // Switch to Grid Add mode
    protected function gridAddMode()
    {
        $this->CurrentAction = "gridadd";
        $_SESSION[SESSION_INLINE_MODE] = "gridadd";
        $this->hideFieldsForAddEdit();
    }

    // Switch to Grid Edit mode
    protected function gridEditMode()
    {
        $this->CurrentAction = "gridedit";
        $_SESSION[SESSION_INLINE_MODE] = "gridedit";
        $this->hideFieldsForAddEdit();
    }

    // Switch to Inline Add mode
    protected function inlineAddMode()
    {
        global $Security, $Language;
        if (!$Security->canAdd()) {
            return false; // Add not allowed
        }
        if ($this->isCopy()) {
            if (($keyValue = Get("ID") ?? Route("ID")) !== null) {
                $this->ID->setQueryStringValue($keyValue);
            } else {
                $this->CurrentAction = "add";
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
        } else {
            $this->OldKey = ""; // Clear old record key
        }
        $this->setKey($this->OldKey); // Set to OldValue
        $_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
        return true;
    }

    // Perform update to Inline Add/Copy record
    protected function inlineInsert()
    {
        global $Language, $CurrentForm;
        $this->loadOldRecord(); // Load old record
        $CurrentForm->Index = 0;
        $this->loadFormValues(); // Get form values

        // Validate form
        if (!$this->validateForm()) {
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
            return;
        }
        $this->SendEmail = true; // Send email on add success
        if ($this->addRow($this->OldRecordset)) { // Add record
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
            }
            $this->clearInlineMode(); // Clear inline add mode
        } else { // Add failed
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
        }
    }

    // Perform update to grid
    public function gridUpdate()
    {
        global $Language, $CurrentForm;
        $gridUpdate = true;

        // Get old recordset
        $this->CurrentFilter = $this->buildKeyFilter();
        if ($this->CurrentFilter == "") {
            $this->CurrentFilter = "0=1";
        }
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        if ($rs = $conn->executeQuery($sql)) {
            $rsold = $rs->fetchAll();
            $rs->closeCursor();
        }

        // Call Grid Updating event
        if (!$this->gridUpdating($rsold)) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();
        $key = "";

        // Update row index and get row key
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Update all rows based on key
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            $CurrentForm->Index = $rowindex;
            $this->setKey($CurrentForm->getValue($this->OldKeyName));
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));

            // Load all values and keys
            if ($rowaction != "insertdelete") { // Skip insert then deleted rows
                $this->loadFormValues(); // Get form values
                if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
                    $gridUpdate = $this->OldKey != ""; // Key must not be empty
                } else {
                    $gridUpdate = true;
                }

                // Skip empty row
                if ($rowaction == "insert" && $this->emptyRow()) {
                // Validate form and insert/update/delete record
                } elseif ($gridUpdate) {
                    if ($rowaction == "delete") {
                        $this->CurrentFilter = $this->getRecordFilter();
                        $gridUpdate = $this->deleteRows(); // Delete this row
                    //} elseif (!$this->validateForm()) { // Already done in validateGridForm
                    //    $gridUpdate = false; // Form error, reset action
                    } else {
                        if ($rowaction == "insert") {
                            $gridUpdate = $this->addRow(); // Insert this row
                        } else {
                            if ($this->OldKey != "") {
                                $this->SendEmail = false; // Do not send email on update success
                                $gridUpdate = $this->editRow(); // Update this row
                            }
                        } // End update
                    }
                }
                if ($gridUpdate) {
                    if ($key != "") {
                        $key .= ", ";
                    }
                    $key .= $this->OldKey;
                } else {
                    break;
                }
            }
        }
        if ($gridUpdate) {
            $conn->commit(); // Commit transaction

            // Get new records
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Updated event
            $this->gridUpdated($rsold, $rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
            }
        }
        return $gridUpdate;
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

    // Perform Grid Add
    public function gridInsert()
    {
        global $Language, $CurrentForm;
        $rowindex = 1;
        $gridInsert = false;
        $conn = $this->getConnection();

        // Call Grid Inserting event
        if (!$this->gridInserting()) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();

        // Init key filter
        $wrkfilter = "";
        $addcnt = 0;
        $key = "";

        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Insert all rows
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "" && $rowaction != "insert") {
                continue; // Skip
            }
            if ($rowaction == "insert") {
                $this->OldKey = strval($CurrentForm->getValue($this->OldKeyName));
                $this->loadOldRecord(); // Load old record
            }
            $this->loadFormValues(); // Get form values
            if (!$this->emptyRow()) {
                $addcnt++;
                $this->SendEmail = false; // Do not send email on insert success

                // Validate form // Already done in validateGridForm
                //if (!$this->validateForm()) {
                //    $gridInsert = false; // Form error, reset action
                //} else {
                    $gridInsert = $this->addRow($this->OldRecordset); // Insert this row
                //}
                if ($gridInsert) {
                    if ($key != "") {
                        $key .= Config("COMPOSITE_KEY_SEPARATOR");
                    }
                    $key .= $this->ID->CurrentValue;

                    // Add filter for this record
                    $filter = $this->getRecordFilter();
                    if ($wrkfilter != "") {
                        $wrkfilter .= " OR ";
                    }
                    $wrkfilter .= $filter;
                } else {
                    break;
                }
            }
        }
        if ($addcnt == 0) { // No record inserted
            $this->setFailureMessage($Language->phrase("NoAddRecord"));
            $gridInsert = false;
        }
        if ($gridInsert) {
            $conn->commit(); // Commit transaction

            // Get new records
            $this->CurrentFilter = $wrkfilter;
            $sql = $this->getCurrentSql();
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Inserted event
            $this->gridInserted($rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
            }
            $this->clearInlineMode(); // Clear grid add mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
            }
        }
        return $gridInsert;
    }

    // Check if empty row
    public function emptyRow()
    {
        global $CurrentForm;
        if ($CurrentForm->hasValue("x_tradenames_id") && $CurrentForm->hasValue("o_tradenames_id") && $this->tradenames_id->CurrentValue != $this->tradenames_id->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Drug_Name") && $CurrentForm->hasValue("o_Drug_Name") && $this->Drug_Name->CurrentValue != $this->Drug_Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Generic_Name") && $CurrentForm->hasValue("o_Generic_Name") && $this->Generic_Name->CurrentValue != $this->Generic_Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Trade_Name") && $CurrentForm->hasValue("o_Trade_Name") && $this->Trade_Name->CurrentValue != $this->Trade_Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PR_CODE") && $CurrentForm->hasValue("o_PR_CODE") && $this->PR_CODE->CurrentValue != $this->PR_CODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Form") && $CurrentForm->hasValue("o_Form") && $this->Form->CurrentValue != $this->Form->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Strength") && $CurrentForm->hasValue("o_Strength") && $this->Strength->CurrentValue != $this->Strength->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Unit") && $CurrentForm->hasValue("o_Unit") && $this->Unit->CurrentValue != $this->Unit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CONTAINER_TYPE") && $CurrentForm->hasValue("o_CONTAINER_TYPE") && $this->CONTAINER_TYPE->CurrentValue != $this->CONTAINER_TYPE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CONTAINER_STRENGTH") && $CurrentForm->hasValue("o_CONTAINER_STRENGTH") && $this->CONTAINER_STRENGTH->CurrentValue != $this->CONTAINER_STRENGTH->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TypeOfDrug") && $CurrentForm->hasValue("o_TypeOfDrug") && $this->TypeOfDrug->CurrentValue != $this->TypeOfDrug->OldValue) {
            return false;
        }
        return true;
    }

    // Validate grid form
    public function validateGridForm()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Validate all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } elseif (!$this->validateForm()) {
                    return false;
                }
            }
        }
        return true;
    }

    // Get all form values of the grid
    public function getGridFormValues()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }
        $rows = [];

        // Loop through all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } else {
                    $rows[] = $this->getFieldValues("FormValue"); // Return row as array
                }
            }
        }
        return $rows; // Return as array of array
    }

    // Restore form values for current row
    public function restoreCurrentRowFormValues($idx)
    {
        global $CurrentForm;

        // Get row based on current index
        $CurrentForm->Index = $idx;
        $rowaction = strval($CurrentForm->getValue($this->FormActionName));
        $this->loadFormValues(); // Load form values
        // Set up invalid status correctly
        $this->resetFormError();
        if ($rowaction == "insert" && $this->emptyRow()) {
            // Ignore
        } else {
            $this->validateForm();
        }
    }

    // Reset form status
    public function resetFormError()
    {
        $this->ID->clearErrorMessage();
        $this->tradenames_id->clearErrorMessage();
        $this->Drug_Name->clearErrorMessage();
        $this->Generic_Name->clearErrorMessage();
        $this->Trade_Name->clearErrorMessage();
        $this->PR_CODE->clearErrorMessage();
        $this->Form->clearErrorMessage();
        $this->Strength->clearErrorMessage();
        $this->Unit->clearErrorMessage();
        $this->CONTAINER_TYPE->clearErrorMessage();
        $this->CONTAINER_STRENGTH->clearErrorMessage();
        $this->TypeOfDrug->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpres_trade_combination_names_newlistsrch");
        }
        $filterList = Concat($filterList, $this->ID->AdvancedSearch->toJson(), ","); // Field ID
        $filterList = Concat($filterList, $this->tradenames_id->AdvancedSearch->toJson(), ","); // Field tradenames_id
        $filterList = Concat($filterList, $this->Drug_Name->AdvancedSearch->toJson(), ","); // Field Drug_Name
        $filterList = Concat($filterList, $this->Generic_Name->AdvancedSearch->toJson(), ","); // Field Generic_Name
        $filterList = Concat($filterList, $this->Trade_Name->AdvancedSearch->toJson(), ","); // Field Trade_Name
        $filterList = Concat($filterList, $this->PR_CODE->AdvancedSearch->toJson(), ","); // Field PR_CODE
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->Strength->AdvancedSearch->toJson(), ","); // Field Strength
        $filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
        $filterList = Concat($filterList, $this->CONTAINER_TYPE->AdvancedSearch->toJson(), ","); // Field CONTAINER_TYPE
        $filterList = Concat($filterList, $this->CONTAINER_STRENGTH->AdvancedSearch->toJson(), ","); // Field CONTAINER_STRENGTH
        $filterList = Concat($filterList, $this->TypeOfDrug->AdvancedSearch->toJson(), ","); // Field TypeOfDrug
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpres_trade_combination_names_newlistsrch", $filters);
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

        // Field ID
        $this->ID->AdvancedSearch->SearchValue = @$filter["x_ID"];
        $this->ID->AdvancedSearch->SearchOperator = @$filter["z_ID"];
        $this->ID->AdvancedSearch->SearchCondition = @$filter["v_ID"];
        $this->ID->AdvancedSearch->SearchValue2 = @$filter["y_ID"];
        $this->ID->AdvancedSearch->SearchOperator2 = @$filter["w_ID"];
        $this->ID->AdvancedSearch->save();

        // Field tradenames_id
        $this->tradenames_id->AdvancedSearch->SearchValue = @$filter["x_tradenames_id"];
        $this->tradenames_id->AdvancedSearch->SearchOperator = @$filter["z_tradenames_id"];
        $this->tradenames_id->AdvancedSearch->SearchCondition = @$filter["v_tradenames_id"];
        $this->tradenames_id->AdvancedSearch->SearchValue2 = @$filter["y_tradenames_id"];
        $this->tradenames_id->AdvancedSearch->SearchOperator2 = @$filter["w_tradenames_id"];
        $this->tradenames_id->AdvancedSearch->save();

        // Field Drug_Name
        $this->Drug_Name->AdvancedSearch->SearchValue = @$filter["x_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchOperator = @$filter["z_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchCondition = @$filter["v_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchValue2 = @$filter["y_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->save();

        // Field Generic_Name
        $this->Generic_Name->AdvancedSearch->SearchValue = @$filter["x_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->save();

        // Field Trade_Name
        $this->Trade_Name->AdvancedSearch->SearchValue = @$filter["x_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchOperator = @$filter["z_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchCondition = @$filter["v_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchValue2 = @$filter["y_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->save();

        // Field PR_CODE
        $this->PR_CODE->AdvancedSearch->SearchValue = @$filter["x_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchOperator = @$filter["z_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchCondition = @$filter["v_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchValue2 = @$filter["y_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchOperator2 = @$filter["w_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field Strength
        $this->Strength->AdvancedSearch->SearchValue = @$filter["x_Strength"];
        $this->Strength->AdvancedSearch->SearchOperator = @$filter["z_Strength"];
        $this->Strength->AdvancedSearch->SearchCondition = @$filter["v_Strength"];
        $this->Strength->AdvancedSearch->SearchValue2 = @$filter["y_Strength"];
        $this->Strength->AdvancedSearch->SearchOperator2 = @$filter["w_Strength"];
        $this->Strength->AdvancedSearch->save();

        // Field Unit
        $this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
        $this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
        $this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
        $this->Unit->AdvancedSearch->save();

        // Field CONTAINER_TYPE
        $this->CONTAINER_TYPE->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->save();

        // Field CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->save();

        // Field TypeOfDrug
        $this->TypeOfDrug->AdvancedSearch->SearchValue = @$filter["x_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchOperator = @$filter["z_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchCondition = @$filter["v_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Drug_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Trade_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PR_CODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CONTAINER_TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CONTAINER_STRENGTH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeOfDrug, $arKeywords, $type);
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
            $this->updateSort($this->ID); // ID
            $this->updateSort($this->tradenames_id); // tradenames_id
            $this->updateSort($this->Drug_Name); // Drug_Name
            $this->updateSort($this->Generic_Name); // Generic_Name
            $this->updateSort($this->Trade_Name); // Trade_Name
            $this->updateSort($this->PR_CODE); // PR_CODE
            $this->updateSort($this->Form); // Form
            $this->updateSort($this->Strength); // Strength
            $this->updateSort($this->Unit); // Unit
            $this->updateSort($this->CONTAINER_TYPE); // CONTAINER_TYPE
            $this->updateSort($this->CONTAINER_STRENGTH); // CONTAINER_STRENGTH
            $this->updateSort($this->TypeOfDrug); // TypeOfDrug
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

            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->tradenames_id->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->ID->setSort("");
                $this->tradenames_id->setSort("");
                $this->Drug_Name->setSort("");
                $this->Generic_Name->setSort("");
                $this->Trade_Name->setSort("");
                $this->PR_CODE->setSort("");
                $this->Form->setSort("");
                $this->Strength->setSort("");
                $this->Unit->setSort("");
                $this->CONTAINER_TYPE->setSort("");
                $this->CONTAINER_STRENGTH->setSort("");
                $this->TypeOfDrug->setSort("");
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

        // "griddelete"
        if ($this->AllowAddDeleteRow) {
            $item = &$this->ListOptions->add("griddelete");
            $item->CssClass = "text-nowrap";
            $item->OnLeft = true;
            $item->Visible = false; // Default hidden
        }

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

        // Set up row action and key
        if ($CurrentForm && is_numeric($this->RowIndex) && $this->RowType != "view") {
            $CurrentForm->Index = $this->RowIndex;
            $actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
            $oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->OldKeyName);
            $blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
            if ($this->RowAction != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
            }
            $oldKey = $this->getKey(false); // Get from OldValue
            if ($oldKeyName != "" && $oldKey != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($oldKey) . "\">";
            }
            if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow()) {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
            }
        }

        // "delete"
        if ($this->AllowAddDeleteRow) {
            if ($this->isGridAdd() || $this->isGridEdit()) {
                $options = &$this->ListOptions;
                $options->UseButtonGroup = true; // Use button group for grid delete button
                $opt = $options["griddelete"];
                if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
                    $opt->Body = "&nbsp;";
                } else {
                    $opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
                }
            }
        }
        $pageUrl = $this->pageUrl();

        // "copy"
        $opt = $this->ListOptions["copy"];
        if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
            $this->ListOptions->CustomItem = "copy"; // Show copy column only
            $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
            $opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
            "<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
            "<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
            "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
            return;
        }
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
                $opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineCopyUrl)) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->ID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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

        // Inline Add
        $item = &$option->add("inlineadd");
        $item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineAddUrl)) . "\">" . $Language->phrase("InlineAddLink") . "</a>";
        $item->Visible = $this->InlineAddUrl != "" && $Security->canAdd();
        $item = &$option->add("gridadd");
        $item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridAddUrl)) . "\">" . $Language->phrase("GridAddLink") . "</a>";
        $item->Visible = $this->GridAddUrl != "" && $Security->canAdd();

        // Add grid edit
        $option = $options["addedit"];
        $item = &$option->add("gridedit");
        $item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridEditUrl)) . "\">" . $Language->phrase("GridEditLink") . "</a>";
        $item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpres_trade_combination_names_newlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpres_trade_combination_names_newlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
        if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
            $option = $options["action"];
            // Set up list action buttons
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_MULTIPLE) {
                    $item = &$option->add("custom_" . $listaction->Action);
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpres_trade_combination_names_newlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        } else { // Grid add/edit mode
            // Hide all options first
            foreach ($options as $option) {
                $option->hideAllOptions();
            }
            $pageUrl = $this->pageUrl();

            // Grid-Add
            if ($this->isGridAdd()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                // Add grid insert
                $item = &$option->add("gridinsert");
                $item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridInsertLink") . "</a>";
                // Add grid cancel
                $item = &$option->add("gridcancel");
                $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }

            // Grid-Edit
            if ($this->isGridEdit()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                    $item = &$option->add("gridsave");
                    $item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridSaveLink") . "</a>";
                    $item = &$option->add("gridcancel");
                    $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                    $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->ID->CurrentValue = null;
        $this->ID->OldValue = $this->ID->CurrentValue;
        $this->tradenames_id->CurrentValue = null;
        $this->tradenames_id->OldValue = $this->tradenames_id->CurrentValue;
        $this->Drug_Name->CurrentValue = null;
        $this->Drug_Name->OldValue = $this->Drug_Name->CurrentValue;
        $this->Generic_Name->CurrentValue = null;
        $this->Generic_Name->OldValue = $this->Generic_Name->CurrentValue;
        $this->Trade_Name->CurrentValue = null;
        $this->Trade_Name->OldValue = $this->Trade_Name->CurrentValue;
        $this->PR_CODE->CurrentValue = null;
        $this->PR_CODE->OldValue = $this->PR_CODE->CurrentValue;
        $this->Form->CurrentValue = null;
        $this->Form->OldValue = $this->Form->CurrentValue;
        $this->Strength->CurrentValue = null;
        $this->Strength->OldValue = $this->Strength->CurrentValue;
        $this->Unit->CurrentValue = null;
        $this->Unit->OldValue = $this->Unit->CurrentValue;
        $this->CONTAINER_TYPE->CurrentValue = null;
        $this->CONTAINER_TYPE->OldValue = $this->CONTAINER_TYPE->CurrentValue;
        $this->CONTAINER_STRENGTH->CurrentValue = null;
        $this->CONTAINER_STRENGTH->OldValue = $this->CONTAINER_STRENGTH->CurrentValue;
        $this->TypeOfDrug->CurrentValue = null;
        $this->TypeOfDrug->OldValue = $this->TypeOfDrug->CurrentValue;
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'ID' first before field var 'x_ID'
        $val = $CurrentForm->hasValue("ID") ? $CurrentForm->getValue("ID") : $CurrentForm->getValue("x_ID");
        if (!$this->ID->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->ID->setFormValue($val);
        }

        // Check field name 'tradenames_id' first before field var 'x_tradenames_id'
        $val = $CurrentForm->hasValue("tradenames_id") ? $CurrentForm->getValue("tradenames_id") : $CurrentForm->getValue("x_tradenames_id");
        if (!$this->tradenames_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->tradenames_id->Visible = false; // Disable update for API request
            } else {
                $this->tradenames_id->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_tradenames_id")) {
            $this->tradenames_id->setOldValue($CurrentForm->getValue("o_tradenames_id"));
        }

        // Check field name 'Drug_Name' first before field var 'x_Drug_Name'
        $val = $CurrentForm->hasValue("Drug_Name") ? $CurrentForm->getValue("Drug_Name") : $CurrentForm->getValue("x_Drug_Name");
        if (!$this->Drug_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Drug_Name->Visible = false; // Disable update for API request
            } else {
                $this->Drug_Name->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Drug_Name")) {
            $this->Drug_Name->setOldValue($CurrentForm->getValue("o_Drug_Name"));
        }

        // Check field name 'Generic_Name' first before field var 'x_Generic_Name'
        $val = $CurrentForm->hasValue("Generic_Name") ? $CurrentForm->getValue("Generic_Name") : $CurrentForm->getValue("x_Generic_Name");
        if (!$this->Generic_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Generic_Name->Visible = false; // Disable update for API request
            } else {
                $this->Generic_Name->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Generic_Name")) {
            $this->Generic_Name->setOldValue($CurrentForm->getValue("o_Generic_Name"));
        }

        // Check field name 'Trade_Name' first before field var 'x_Trade_Name'
        $val = $CurrentForm->hasValue("Trade_Name") ? $CurrentForm->getValue("Trade_Name") : $CurrentForm->getValue("x_Trade_Name");
        if (!$this->Trade_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Trade_Name->Visible = false; // Disable update for API request
            } else {
                $this->Trade_Name->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Trade_Name")) {
            $this->Trade_Name->setOldValue($CurrentForm->getValue("o_Trade_Name"));
        }

        // Check field name 'PR_CODE' first before field var 'x_PR_CODE'
        $val = $CurrentForm->hasValue("PR_CODE") ? $CurrentForm->getValue("PR_CODE") : $CurrentForm->getValue("x_PR_CODE");
        if (!$this->PR_CODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PR_CODE->Visible = false; // Disable update for API request
            } else {
                $this->PR_CODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PR_CODE")) {
            $this->PR_CODE->setOldValue($CurrentForm->getValue("o_PR_CODE"));
        }

        // Check field name 'Form' first before field var 'x_Form'
        $val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
        if (!$this->Form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Form->Visible = false; // Disable update for API request
            } else {
                $this->Form->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Form")) {
            $this->Form->setOldValue($CurrentForm->getValue("o_Form"));
        }

        // Check field name 'Strength' first before field var 'x_Strength'
        $val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
        if (!$this->Strength->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength->Visible = false; // Disable update for API request
            } else {
                $this->Strength->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Strength")) {
            $this->Strength->setOldValue($CurrentForm->getValue("o_Strength"));
        }

        // Check field name 'Unit' first before field var 'x_Unit'
        $val = $CurrentForm->hasValue("Unit") ? $CurrentForm->getValue("Unit") : $CurrentForm->getValue("x_Unit");
        if (!$this->Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Unit->Visible = false; // Disable update for API request
            } else {
                $this->Unit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Unit")) {
            $this->Unit->setOldValue($CurrentForm->getValue("o_Unit"));
        }

        // Check field name 'CONTAINER_TYPE' first before field var 'x_CONTAINER_TYPE'
        $val = $CurrentForm->hasValue("CONTAINER_TYPE") ? $CurrentForm->getValue("CONTAINER_TYPE") : $CurrentForm->getValue("x_CONTAINER_TYPE");
        if (!$this->CONTAINER_TYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CONTAINER_TYPE->Visible = false; // Disable update for API request
            } else {
                $this->CONTAINER_TYPE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CONTAINER_TYPE")) {
            $this->CONTAINER_TYPE->setOldValue($CurrentForm->getValue("o_CONTAINER_TYPE"));
        }

        // Check field name 'CONTAINER_STRENGTH' first before field var 'x_CONTAINER_STRENGTH'
        $val = $CurrentForm->hasValue("CONTAINER_STRENGTH") ? $CurrentForm->getValue("CONTAINER_STRENGTH") : $CurrentForm->getValue("x_CONTAINER_STRENGTH");
        if (!$this->CONTAINER_STRENGTH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CONTAINER_STRENGTH->Visible = false; // Disable update for API request
            } else {
                $this->CONTAINER_STRENGTH->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CONTAINER_STRENGTH")) {
            $this->CONTAINER_STRENGTH->setOldValue($CurrentForm->getValue("o_CONTAINER_STRENGTH"));
        }

        // Check field name 'TypeOfDrug' first before field var 'x_TypeOfDrug'
        $val = $CurrentForm->hasValue("TypeOfDrug") ? $CurrentForm->getValue("TypeOfDrug") : $CurrentForm->getValue("x_TypeOfDrug");
        if (!$this->TypeOfDrug->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeOfDrug->Visible = false; // Disable update for API request
            } else {
                $this->TypeOfDrug->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TypeOfDrug")) {
            $this->TypeOfDrug->setOldValue($CurrentForm->getValue("o_TypeOfDrug"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->ID->CurrentValue = $this->ID->FormValue;
        }
        $this->tradenames_id->CurrentValue = $this->tradenames_id->FormValue;
        $this->Drug_Name->CurrentValue = $this->Drug_Name->FormValue;
        $this->Generic_Name->CurrentValue = $this->Generic_Name->FormValue;
        $this->Trade_Name->CurrentValue = $this->Trade_Name->FormValue;
        $this->PR_CODE->CurrentValue = $this->PR_CODE->FormValue;
        $this->Form->CurrentValue = $this->Form->FormValue;
        $this->Strength->CurrentValue = $this->Strength->FormValue;
        $this->Unit->CurrentValue = $this->Unit->FormValue;
        $this->CONTAINER_TYPE->CurrentValue = $this->CONTAINER_TYPE->FormValue;
        $this->CONTAINER_STRENGTH->CurrentValue = $this->CONTAINER_STRENGTH->FormValue;
        $this->TypeOfDrug->CurrentValue = $this->TypeOfDrug->FormValue;
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
            if (!$this->EventCancelled) {
                $this->HashValue = $this->getRowHash($row); // Get hash value for record
            }
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
        $this->ID->setDbValue($row['ID']);
        $this->tradenames_id->setDbValue($row['tradenames_id']);
        $this->Drug_Name->setDbValue($row['Drug_Name']);
        $this->Generic_Name->setDbValue($row['Generic_Name']);
        $this->Trade_Name->setDbValue($row['Trade_Name']);
        $this->PR_CODE->setDbValue($row['PR_CODE']);
        $this->Form->setDbValue($row['Form']);
        $this->Strength->setDbValue($row['Strength']);
        $this->Unit->setDbValue($row['Unit']);
        $this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
        $this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
        $this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ID'] = $this->ID->CurrentValue;
        $row['tradenames_id'] = $this->tradenames_id->CurrentValue;
        $row['Drug_Name'] = $this->Drug_Name->CurrentValue;
        $row['Generic_Name'] = $this->Generic_Name->CurrentValue;
        $row['Trade_Name'] = $this->Trade_Name->CurrentValue;
        $row['PR_CODE'] = $this->PR_CODE->CurrentValue;
        $row['Form'] = $this->Form->CurrentValue;
        $row['Strength'] = $this->Strength->CurrentValue;
        $row['Unit'] = $this->Unit->CurrentValue;
        $row['CONTAINER_TYPE'] = $this->CONTAINER_TYPE->CurrentValue;
        $row['CONTAINER_STRENGTH'] = $this->CONTAINER_STRENGTH->CurrentValue;
        $row['TypeOfDrug'] = $this->TypeOfDrug->CurrentValue;
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

        // ID

        // tradenames_id

        // Drug_Name

        // Generic_Name

        // Trade_Name

        // PR_CODE

        // Form

        // Strength

        // Unit

        // CONTAINER_TYPE

        // CONTAINER_STRENGTH

        // TypeOfDrug
        if ($this->RowType == ROWTYPE_VIEW) {
            // ID
            $this->ID->ViewValue = $this->ID->CurrentValue;
            $this->ID->ViewCustomAttributes = "";

            // tradenames_id
            $this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
            $this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
            $this->tradenames_id->ViewCustomAttributes = "";

            // Drug_Name
            $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
            $this->Drug_Name->ViewCustomAttributes = "";

            // Generic_Name
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
                if ($this->Generic_Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Generic_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Generic_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->Generic_Name->ViewValue = $this->Generic_Name->displayValue($arwrk);
                    } else {
                        $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
                    }
                }
            } else {
                $this->Generic_Name->ViewValue = null;
            }
            $this->Generic_Name->ViewCustomAttributes = "";

            // Trade_Name
            $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
            $this->Trade_Name->ViewCustomAttributes = "";

            // PR_CODE
            $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
            $this->PR_CODE->ViewCustomAttributes = "";

            // Form
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
                if ($this->Form->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Forms`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Form->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Form->Lookup->renderViewRow($rswrk[0]);
                        $this->Form->ViewValue = $this->Form->displayValue($arwrk);
                    } else {
                        $this->Form->ViewValue = $this->Form->CurrentValue;
                    }
                }
            } else {
                $this->Form->ViewValue = null;
            }
            $this->Form->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewCustomAttributes = "";

            // Unit
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
                if ($this->Unit->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Units`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Unit->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Unit->Lookup->renderViewRow($rswrk[0]);
                        $this->Unit->ViewValue = $this->Unit->displayValue($arwrk);
                    } else {
                        $this->Unit->ViewValue = $this->Unit->CurrentValue;
                    }
                }
            } else {
                $this->Unit->ViewValue = null;
            }
            $this->Unit->ViewCustomAttributes = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
            $this->CONTAINER_TYPE->ViewCustomAttributes = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
            $this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

            // TypeOfDrug
            if (strval($this->TypeOfDrug->CurrentValue) != "") {
                $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->optionCaption($this->TypeOfDrug->CurrentValue);
            } else {
                $this->TypeOfDrug->ViewValue = null;
            }
            $this->TypeOfDrug->ViewCustomAttributes = "";

            // ID
            $this->ID->LinkCustomAttributes = "";
            $this->ID->HrefValue = "";
            $this->ID->TooltipValue = "";

            // tradenames_id
            $this->tradenames_id->LinkCustomAttributes = "";
            $this->tradenames_id->HrefValue = "";
            $this->tradenames_id->TooltipValue = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";
            $this->Drug_Name->TooltipValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";
            $this->Generic_Name->TooltipValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";
            $this->Trade_Name->TooltipValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";
            $this->PR_CODE->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";
            $this->CONTAINER_TYPE->TooltipValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";
            $this->CONTAINER_STRENGTH->TooltipValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
            $this->TypeOfDrug->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ID

            // tradenames_id
            $this->tradenames_id->EditAttrs["class"] = "form-control";
            $this->tradenames_id->EditCustomAttributes = "";
            if ($this->tradenames_id->getSessionValue() != "") {
                $this->tradenames_id->CurrentValue = GetForeignKeyValue($this->tradenames_id->getSessionValue());
                $this->tradenames_id->OldValue = $this->tradenames_id->CurrentValue;
                $this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
                $this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
                $this->tradenames_id->ViewCustomAttributes = "";
            } else {
                $this->tradenames_id->EditValue = HtmlEncode($this->tradenames_id->CurrentValue);
                $this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());
            }

            // Drug_Name
            $this->Drug_Name->EditAttrs["class"] = "form-control";
            $this->Drug_Name->EditCustomAttributes = "";
            if (!$this->Drug_Name->Raw) {
                $this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
            }
            $this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
            $this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

            // Generic_Name
            $this->Generic_Name->EditAttrs["class"] = "form-control";
            $this->Generic_Name->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name->ViewValue = $this->Generic_Name->Lookup !== null && is_array($this->Generic_Name->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name->ViewValue !== null) { // Load from cache
                $this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Generic_Name->EditValue = $arwrk;
            }
            $this->Generic_Name->PlaceHolder = RemoveHtml($this->Generic_Name->caption());

            // Trade_Name
            $this->Trade_Name->EditAttrs["class"] = "form-control";
            $this->Trade_Name->EditCustomAttributes = "";
            if (!$this->Trade_Name->Raw) {
                $this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
            }
            $this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->CurrentValue);
            $this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

            // PR_CODE
            $this->PR_CODE->EditAttrs["class"] = "form-control";
            $this->PR_CODE->EditCustomAttributes = "";
            if (!$this->PR_CODE->Raw) {
                $this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
            }
            $this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
            $this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
            } else {
                $this->Form->ViewValue = $this->Form->Lookup !== null && is_array($this->Form->Lookup->Options) ? $curVal : null;
            }
            if ($this->Form->ViewValue !== null) { // Load from cache
                $this->Form->EditValue = array_values($this->Form->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Forms`" . SearchString("=", $this->Form->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Form->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Form->EditValue = $arwrk;
            }
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // Strength
            $this->Strength->EditAttrs["class"] = "form-control";
            $this->Strength->EditCustomAttributes = "";
            if (!$this->Strength->Raw) {
                $this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
            }
            $this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
            $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
            } else {
                $this->Unit->ViewValue = $this->Unit->Lookup !== null && is_array($this->Unit->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit->ViewValue !== null) { // Load from cache
                $this->Unit->EditValue = array_values($this->Unit->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit->EditValue = $arwrk;
            }
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
            $this->CONTAINER_TYPE->EditCustomAttributes = "";
            if (!$this->CONTAINER_TYPE->Raw) {
                $this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
            }
            $this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
            $this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
            $this->CONTAINER_STRENGTH->EditCustomAttributes = "";
            if (!$this->CONTAINER_STRENGTH->Raw) {
                $this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
            }
            $this->CONTAINER_STRENGTH->EditValue = HtmlEncode($this->CONTAINER_STRENGTH->CurrentValue);
            $this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

            // TypeOfDrug
            $this->TypeOfDrug->EditAttrs["class"] = "form-control";
            $this->TypeOfDrug->EditCustomAttributes = "";
            $this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(true);
            $this->TypeOfDrug->PlaceHolder = RemoveHtml($this->TypeOfDrug->caption());

            // Add refer script

            // ID
            $this->ID->LinkCustomAttributes = "";
            $this->ID->HrefValue = "";

            // tradenames_id
            $this->tradenames_id->LinkCustomAttributes = "";
            $this->tradenames_id->HrefValue = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // ID
            $this->ID->EditAttrs["class"] = "form-control";
            $this->ID->EditCustomAttributes = "";
            $this->ID->EditValue = $this->ID->CurrentValue;
            $this->ID->ViewCustomAttributes = "";

            // tradenames_id
            $this->tradenames_id->EditAttrs["class"] = "form-control";
            $this->tradenames_id->EditCustomAttributes = "";
            if ($this->tradenames_id->getSessionValue() != "") {
                $this->tradenames_id->CurrentValue = GetForeignKeyValue($this->tradenames_id->getSessionValue());
                $this->tradenames_id->OldValue = $this->tradenames_id->CurrentValue;
                $this->tradenames_id->ViewValue = $this->tradenames_id->CurrentValue;
                $this->tradenames_id->ViewValue = FormatNumber($this->tradenames_id->ViewValue, 0, -2, -2, -2);
                $this->tradenames_id->ViewCustomAttributes = "";
            } else {
                $this->tradenames_id->EditValue = HtmlEncode($this->tradenames_id->CurrentValue);
                $this->tradenames_id->PlaceHolder = RemoveHtml($this->tradenames_id->caption());
            }

            // Drug_Name
            $this->Drug_Name->EditAttrs["class"] = "form-control";
            $this->Drug_Name->EditCustomAttributes = "";
            if (!$this->Drug_Name->Raw) {
                $this->Drug_Name->CurrentValue = HtmlDecode($this->Drug_Name->CurrentValue);
            }
            $this->Drug_Name->EditValue = HtmlEncode($this->Drug_Name->CurrentValue);
            $this->Drug_Name->PlaceHolder = RemoveHtml($this->Drug_Name->caption());

            // Generic_Name
            $this->Generic_Name->EditAttrs["class"] = "form-control";
            $this->Generic_Name->EditCustomAttributes = "";
            $curVal = trim(strval($this->Generic_Name->CurrentValue));
            if ($curVal != "") {
                $this->Generic_Name->ViewValue = $this->Generic_Name->lookupCacheOption($curVal);
            } else {
                $this->Generic_Name->ViewValue = $this->Generic_Name->Lookup !== null && is_array($this->Generic_Name->Lookup->Options) ? $curVal : null;
            }
            if ($this->Generic_Name->ViewValue !== null) { // Load from cache
                $this->Generic_Name->EditValue = array_values($this->Generic_Name->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Generic`" . SearchString("=", $this->Generic_Name->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Generic_Name->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Generic_Name->EditValue = $arwrk;
            }
            $this->Generic_Name->PlaceHolder = RemoveHtml($this->Generic_Name->caption());

            // Trade_Name
            $this->Trade_Name->EditAttrs["class"] = "form-control";
            $this->Trade_Name->EditCustomAttributes = "";
            if (!$this->Trade_Name->Raw) {
                $this->Trade_Name->CurrentValue = HtmlDecode($this->Trade_Name->CurrentValue);
            }
            $this->Trade_Name->EditValue = HtmlEncode($this->Trade_Name->CurrentValue);
            $this->Trade_Name->PlaceHolder = RemoveHtml($this->Trade_Name->caption());

            // PR_CODE
            $this->PR_CODE->EditAttrs["class"] = "form-control";
            $this->PR_CODE->EditCustomAttributes = "";
            if (!$this->PR_CODE->Raw) {
                $this->PR_CODE->CurrentValue = HtmlDecode($this->PR_CODE->CurrentValue);
            }
            $this->PR_CODE->EditValue = HtmlEncode($this->PR_CODE->CurrentValue);
            $this->PR_CODE->PlaceHolder = RemoveHtml($this->PR_CODE->caption());

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            $curVal = trim(strval($this->Form->CurrentValue));
            if ($curVal != "") {
                $this->Form->ViewValue = $this->Form->lookupCacheOption($curVal);
            } else {
                $this->Form->ViewValue = $this->Form->Lookup !== null && is_array($this->Form->Lookup->Options) ? $curVal : null;
            }
            if ($this->Form->ViewValue !== null) { // Load from cache
                $this->Form->EditValue = array_values($this->Form->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Forms`" . SearchString("=", $this->Form->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Form->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Form->EditValue = $arwrk;
            }
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // Strength
            $this->Strength->EditAttrs["class"] = "form-control";
            $this->Strength->EditCustomAttributes = "";
            if (!$this->Strength->Raw) {
                $this->Strength->CurrentValue = HtmlDecode($this->Strength->CurrentValue);
            }
            $this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
            $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());

            // Unit
            $this->Unit->EditAttrs["class"] = "form-control";
            $this->Unit->EditCustomAttributes = "";
            $curVal = trim(strval($this->Unit->CurrentValue));
            if ($curVal != "") {
                $this->Unit->ViewValue = $this->Unit->lookupCacheOption($curVal);
            } else {
                $this->Unit->ViewValue = $this->Unit->Lookup !== null && is_array($this->Unit->Lookup->Options) ? $curVal : null;
            }
            if ($this->Unit->ViewValue !== null) { // Load from cache
                $this->Unit->EditValue = array_values($this->Unit->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Units`" . SearchString("=", $this->Unit->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->Unit->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Unit->EditValue = $arwrk;
            }
            $this->Unit->PlaceHolder = RemoveHtml($this->Unit->caption());

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->EditAttrs["class"] = "form-control";
            $this->CONTAINER_TYPE->EditCustomAttributes = "";
            if (!$this->CONTAINER_TYPE->Raw) {
                $this->CONTAINER_TYPE->CurrentValue = HtmlDecode($this->CONTAINER_TYPE->CurrentValue);
            }
            $this->CONTAINER_TYPE->EditValue = HtmlEncode($this->CONTAINER_TYPE->CurrentValue);
            $this->CONTAINER_TYPE->PlaceHolder = RemoveHtml($this->CONTAINER_TYPE->caption());

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->EditAttrs["class"] = "form-control";
            $this->CONTAINER_STRENGTH->EditCustomAttributes = "";
            if (!$this->CONTAINER_STRENGTH->Raw) {
                $this->CONTAINER_STRENGTH->CurrentValue = HtmlDecode($this->CONTAINER_STRENGTH->CurrentValue);
            }
            $this->CONTAINER_STRENGTH->EditValue = HtmlEncode($this->CONTAINER_STRENGTH->CurrentValue);
            $this->CONTAINER_STRENGTH->PlaceHolder = RemoveHtml($this->CONTAINER_STRENGTH->caption());

            // TypeOfDrug
            $this->TypeOfDrug->EditAttrs["class"] = "form-control";
            $this->TypeOfDrug->EditCustomAttributes = "";
            $this->TypeOfDrug->EditValue = $this->TypeOfDrug->options(true);
            $this->TypeOfDrug->PlaceHolder = RemoveHtml($this->TypeOfDrug->caption());

            // Edit refer script

            // ID
            $this->ID->LinkCustomAttributes = "";
            $this->ID->HrefValue = "";

            // tradenames_id
            $this->tradenames_id->LinkCustomAttributes = "";
            $this->tradenames_id->HrefValue = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
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
        if ($this->ID->Required) {
            if (!$this->ID->IsDetailKey && EmptyValue($this->ID->FormValue)) {
                $this->ID->addErrorMessage(str_replace("%s", $this->ID->caption(), $this->ID->RequiredErrorMessage));
            }
        }
        if ($this->tradenames_id->Required) {
            if (!$this->tradenames_id->IsDetailKey && EmptyValue($this->tradenames_id->FormValue)) {
                $this->tradenames_id->addErrorMessage(str_replace("%s", $this->tradenames_id->caption(), $this->tradenames_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->tradenames_id->FormValue)) {
            $this->tradenames_id->addErrorMessage($this->tradenames_id->getErrorMessage(false));
        }
        if ($this->Drug_Name->Required) {
            if (!$this->Drug_Name->IsDetailKey && EmptyValue($this->Drug_Name->FormValue)) {
                $this->Drug_Name->addErrorMessage(str_replace("%s", $this->Drug_Name->caption(), $this->Drug_Name->RequiredErrorMessage));
            }
        }
        if ($this->Generic_Name->Required) {
            if (!$this->Generic_Name->IsDetailKey && EmptyValue($this->Generic_Name->FormValue)) {
                $this->Generic_Name->addErrorMessage(str_replace("%s", $this->Generic_Name->caption(), $this->Generic_Name->RequiredErrorMessage));
            }
        }
        if ($this->Trade_Name->Required) {
            if (!$this->Trade_Name->IsDetailKey && EmptyValue($this->Trade_Name->FormValue)) {
                $this->Trade_Name->addErrorMessage(str_replace("%s", $this->Trade_Name->caption(), $this->Trade_Name->RequiredErrorMessage));
            }
        }
        if ($this->PR_CODE->Required) {
            if (!$this->PR_CODE->IsDetailKey && EmptyValue($this->PR_CODE->FormValue)) {
                $this->PR_CODE->addErrorMessage(str_replace("%s", $this->PR_CODE->caption(), $this->PR_CODE->RequiredErrorMessage));
            }
        }
        if ($this->Form->Required) {
            if (!$this->Form->IsDetailKey && EmptyValue($this->Form->FormValue)) {
                $this->Form->addErrorMessage(str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
            }
        }
        if ($this->Strength->Required) {
            if (!$this->Strength->IsDetailKey && EmptyValue($this->Strength->FormValue)) {
                $this->Strength->addErrorMessage(str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
            }
        }
        if ($this->Unit->Required) {
            if (!$this->Unit->IsDetailKey && EmptyValue($this->Unit->FormValue)) {
                $this->Unit->addErrorMessage(str_replace("%s", $this->Unit->caption(), $this->Unit->RequiredErrorMessage));
            }
        }
        if ($this->CONTAINER_TYPE->Required) {
            if (!$this->CONTAINER_TYPE->IsDetailKey && EmptyValue($this->CONTAINER_TYPE->FormValue)) {
                $this->CONTAINER_TYPE->addErrorMessage(str_replace("%s", $this->CONTAINER_TYPE->caption(), $this->CONTAINER_TYPE->RequiredErrorMessage));
            }
        }
        if ($this->CONTAINER_STRENGTH->Required) {
            if (!$this->CONTAINER_STRENGTH->IsDetailKey && EmptyValue($this->CONTAINER_STRENGTH->FormValue)) {
                $this->CONTAINER_STRENGTH->addErrorMessage(str_replace("%s", $this->CONTAINER_STRENGTH->caption(), $this->CONTAINER_STRENGTH->RequiredErrorMessage));
            }
        }
        if ($this->TypeOfDrug->Required) {
            if (!$this->TypeOfDrug->IsDetailKey && EmptyValue($this->TypeOfDrug->FormValue)) {
                $this->TypeOfDrug->addErrorMessage(str_replace("%s", $this->TypeOfDrug->caption(), $this->TypeOfDrug->RequiredErrorMessage));
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

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['ID'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // tradenames_id
            if ($this->tradenames_id->getSessionValue() != "") {
                $this->tradenames_id->ReadOnly = true;
            }
            $this->tradenames_id->setDbValueDef($rsnew, $this->tradenames_id->CurrentValue, 0, $this->tradenames_id->ReadOnly);

            // Drug_Name
            $this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, "", $this->Drug_Name->ReadOnly);

            // Generic_Name
            $this->Generic_Name->setDbValueDef($rsnew, $this->Generic_Name->CurrentValue, "", $this->Generic_Name->ReadOnly);

            // Trade_Name
            $this->Trade_Name->setDbValueDef($rsnew, $this->Trade_Name->CurrentValue, "", $this->Trade_Name->ReadOnly);

            // PR_CODE
            $this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, "", $this->PR_CODE->ReadOnly);

            // Form
            $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, "", $this->Form->ReadOnly);

            // Strength
            $this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, "", $this->Strength->ReadOnly);

            // Unit
            $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, "", $this->Unit->ReadOnly);

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, null, $this->CONTAINER_TYPE->ReadOnly);

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->setDbValueDef($rsnew, $this->CONTAINER_STRENGTH->CurrentValue, null, $this->CONTAINER_STRENGTH->ReadOnly);

            // TypeOfDrug
            $this->TypeOfDrug->setDbValueDef($rsnew, $this->TypeOfDrug->CurrentValue, "", $this->TypeOfDrug->ReadOnly);

            // Check referential integrity for master table 'pres_tradenames_new'
            $validMasterRecord = true;
            $masterFilter = $this->sqlMasterFilter_pres_tradenames_new();
            $keyValue = $rsnew['tradenames_id'] ?? $rsold['tradenames_id'];
            if (strval($keyValue) != "") {
                $masterFilter = str_replace("@ID@", AdjustSql($keyValue), $masterFilter);
            } else {
                $validMasterRecord = false;
            }
            if ($validMasterRecord) {
                $rsmaster = Container("pres_tradenames_new")->loadRs($masterFilter)->fetch();
                $validMasterRecord = $rsmaster !== false;
            }
            if (!$validMasterRecord) {
                $relatedRecordMsg = str_replace("%t", "pres_tradenames_new", $Language->phrase("RelatedRecordRequired"));
                $this->setFailureMessage($relatedRecordMsg);
                return false;
            }

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Load row hash
    protected function loadRowHash()
    {
        $filter = $this->getRecordFilter();

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $row = $conn->fetchAssoc($sql);
        $this->HashValue = $row ? $this->getRowHash($row) : ""; // Get hash value for record
    }

    // Get Row Hash
    public function getRowHash(&$rs)
    {
        if (!$rs) {
            return "";
        }
        $row = ($rs instanceof Recordset) ? $rs->fields : $rs;
        $hash = "";
        $hash .= GetFieldHash($row['tradenames_id']); // tradenames_id
        $hash .= GetFieldHash($row['Drug_Name']); // Drug_Name
        $hash .= GetFieldHash($row['Generic_Name']); // Generic_Name
        $hash .= GetFieldHash($row['Trade_Name']); // Trade_Name
        $hash .= GetFieldHash($row['PR_CODE']); // PR_CODE
        $hash .= GetFieldHash($row['Form']); // Form
        $hash .= GetFieldHash($row['Strength']); // Strength
        $hash .= GetFieldHash($row['Unit']); // Unit
        $hash .= GetFieldHash($row['CONTAINER_TYPE']); // CONTAINER_TYPE
        $hash .= GetFieldHash($row['CONTAINER_STRENGTH']); // CONTAINER_STRENGTH
        $hash .= GetFieldHash($row['TypeOfDrug']); // TypeOfDrug
        return md5($hash);
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;

        // Check referential integrity for master table 'pres_trade_combination_names_new'
        $validMasterRecord = true;
        $masterFilter = $this->sqlMasterFilter_pres_tradenames_new();
        if (strval($this->tradenames_id->CurrentValue) != "") {
            $masterFilter = str_replace("@ID@", AdjustSql($this->tradenames_id->CurrentValue, "DB"), $masterFilter);
        } else {
            $validMasterRecord = false;
        }
        if ($validMasterRecord) {
            $rsmaster = Container("pres_tradenames_new")->loadRs($masterFilter)->fetch();
            $validMasterRecord = $rsmaster !== false;
        }
        if (!$validMasterRecord) {
            $relatedRecordMsg = str_replace("%t", "pres_tradenames_new", $Language->phrase("RelatedRecordRequired"));
            $this->setFailureMessage($relatedRecordMsg);
            return false;
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // tradenames_id
        $this->tradenames_id->setDbValueDef($rsnew, $this->tradenames_id->CurrentValue, 0, false);

        // Drug_Name
        $this->Drug_Name->setDbValueDef($rsnew, $this->Drug_Name->CurrentValue, "", false);

        // Generic_Name
        $this->Generic_Name->setDbValueDef($rsnew, $this->Generic_Name->CurrentValue, "", false);

        // Trade_Name
        $this->Trade_Name->setDbValueDef($rsnew, $this->Trade_Name->CurrentValue, "", false);

        // PR_CODE
        $this->PR_CODE->setDbValueDef($rsnew, $this->PR_CODE->CurrentValue, "", false);

        // Form
        $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, "", false);

        // Strength
        $this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, "", false);

        // Unit
        $this->Unit->setDbValueDef($rsnew, $this->Unit->CurrentValue, "", false);

        // CONTAINER_TYPE
        $this->CONTAINER_TYPE->setDbValueDef($rsnew, $this->CONTAINER_TYPE->CurrentValue, null, false);

        // CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->setDbValueDef($rsnew, $this->CONTAINER_STRENGTH->CurrentValue, null, false);

        // TypeOfDrug
        $this->TypeOfDrug->setDbValueDef($rsnew, $this->TypeOfDrug->CurrentValue, "", false);

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

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpres_trade_combination_names_newlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpres_trade_combination_names_newlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpres_trade_combination_names_newlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_pres_trade_combination_names_new" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pres_trade_combination_names_new\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpres_trade_combination_names_newlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpres_trade_combination_names_newlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pres_tradenames_new") {
            $pres_tradenames_new = Container("pres_tradenames_new");
            $rsmaster = $pres_tradenames_new->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $pres_tradenames_new;
                    $pres_tradenames_new->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }
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
            if ($masterTblVar == "pres_tradenames_new") {
                $validMaster = true;
                $masterTbl = Container("pres_tradenames_new");
                if (($parm = Get("fk_ID", Get("tradenames_id"))) !== null) {
                    $masterTbl->ID->setQueryStringValue($parm);
                    $this->tradenames_id->setQueryStringValue($masterTbl->ID->QueryStringValue);
                    $this->tradenames_id->setSessionValue($this->tradenames_id->QueryStringValue);
                    if (!is_numeric($masterTbl->ID->QueryStringValue)) {
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
            if ($masterTblVar == "pres_tradenames_new") {
                $validMaster = true;
                $masterTbl = Container("pres_tradenames_new");
                if (($parm = Post("fk_ID", Post("tradenames_id"))) !== null) {
                    $masterTbl->ID->setFormValue($parm);
                    $this->tradenames_id->setFormValue($masterTbl->ID->FormValue);
                    $this->tradenames_id->setSessionValue($this->tradenames_id->FormValue);
                    if (!is_numeric($masterTbl->ID->FormValue)) {
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

            // Update URL
            $this->AddUrl = $this->addMasterUrl($this->AddUrl);
            $this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
            $this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
            $this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "pres_tradenames_new") {
                if ($this->tradenames_id->CurrentValue == "") {
                    $this->tradenames_id->setSessionValue("");
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
                case "x_Generic_Name":
                    break;
                case "x_Form":
                    break;
                case "x_Unit":
                    break;
                case "x_TypeOfDrug":
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
