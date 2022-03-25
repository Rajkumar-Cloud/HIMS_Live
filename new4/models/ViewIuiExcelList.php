<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIuiExcelList extends ViewIuiExcel
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_iui_excel';

    // Page object name
    public $PageObjName = "ViewIuiExcelList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_iui_excellist";
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

        // Table object (view_iui_excel)
        if (!isset($GLOBALS["view_iui_excel"]) || get_class($GLOBALS["view_iui_excel"]) == PROJECT_NAMESPACE . "view_iui_excel") {
            $GLOBALS["view_iui_excel"] = &$this;
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
        $this->AddUrl = "ViewIuiExcelAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewIuiExcelDelete";
        $this->MultiUpdateUrl = "ViewIuiExcelUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_iui_excel');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_iui_excellistsrch";

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
                $doc = new $class(Container("view_iui_excel"));
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
            $key .= @$ar['CoupleID'];
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
        $this->NAME->setVisibility();
        $this->HUSBANDNAME->setVisibility();
        $this->CoupleID->setVisibility();
        $this->AGEWIFE->setVisibility();
        $this->AGEHUSBAND->setVisibility();
        $this->ANXIOUSTOCONCEIVEFOR->setVisibility();
        $this->AMHNGML->setVisibility();
        $this->TUBAL_PATENCY->setVisibility();
        $this->HSG->setVisibility();
        $this->DHL->setVisibility();
        $this->UTERINE_PROBLEMS->setVisibility();
        $this->W_COMORBIDS->setVisibility();
        $this->H_COMORBIDS->setVisibility();
        $this->SEXUAL_DYSFUNCTION->setVisibility();
        $this->PREVIUI->setVisibility();
        $this->PREV_IVF->setVisibility();
        $this->TABLETS->setVisibility();
        $this->INJTYPE->setVisibility();
        $this->LMP->setVisibility();
        $this->TRIGGERR->setVisibility();
        $this->TRIGGERDATE->setVisibility();
        $this->FOLLICLE_STATUS->setVisibility();
        $this->NUMBER_OF_IUI->setVisibility();
        $this->PROCEDURE->setVisibility();
        $this->LUTEAL_SUPPORT->setVisibility();
        $this->HDSAMPLE->setVisibility();
        $this->DONORID->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->COLLECTIONMETHOD->setVisibility();
        $this->SAMPLESOURCE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
        $this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
        $this->RESULTS->setVisibility();
        $this->ONGOING_PREG->setVisibility();
        $this->EDD_Date->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_iui_excellistsrch");
        }
        $filterList = Concat($filterList, $this->NAME->AdvancedSearch->toJson(), ","); // Field NAME
        $filterList = Concat($filterList, $this->HUSBANDNAME->AdvancedSearch->toJson(), ","); // Field HUSBAND NAME
        $filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
        $filterList = Concat($filterList, $this->AGEWIFE->AdvancedSearch->toJson(), ","); // Field AGE  - WIFE
        $filterList = Concat($filterList, $this->AGEHUSBAND->AdvancedSearch->toJson(), ","); // Field AGE- HUSBAND
        $filterList = Concat($filterList, $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->toJson(), ","); // Field ANXIOUS TO CONCEIVE FOR
        $filterList = Concat($filterList, $this->AMHNGML->AdvancedSearch->toJson(), ","); // Field AMH ( NG/ML)
        $filterList = Concat($filterList, $this->TUBAL_PATENCY->AdvancedSearch->toJson(), ","); // Field TUBAL_PATENCY
        $filterList = Concat($filterList, $this->HSG->AdvancedSearch->toJson(), ","); // Field HSG
        $filterList = Concat($filterList, $this->DHL->AdvancedSearch->toJson(), ","); // Field DHL
        $filterList = Concat($filterList, $this->UTERINE_PROBLEMS->AdvancedSearch->toJson(), ","); // Field UTERINE_PROBLEMS
        $filterList = Concat($filterList, $this->W_COMORBIDS->AdvancedSearch->toJson(), ","); // Field W_COMORBIDS
        $filterList = Concat($filterList, $this->H_COMORBIDS->AdvancedSearch->toJson(), ","); // Field H_COMORBIDS
        $filterList = Concat($filterList, $this->SEXUAL_DYSFUNCTION->AdvancedSearch->toJson(), ","); // Field SEXUAL_DYSFUNCTION
        $filterList = Concat($filterList, $this->PREVIUI->AdvancedSearch->toJson(), ","); // Field PREV IUI
        $filterList = Concat($filterList, $this->PREV_IVF->AdvancedSearch->toJson(), ","); // Field PREV_IVF
        $filterList = Concat($filterList, $this->TABLETS->AdvancedSearch->toJson(), ","); // Field TABLETS
        $filterList = Concat($filterList, $this->INJTYPE->AdvancedSearch->toJson(), ","); // Field INJTYPE
        $filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
        $filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
        $filterList = Concat($filterList, $this->TRIGGERDATE->AdvancedSearch->toJson(), ","); // Field TRIGGERDATE
        $filterList = Concat($filterList, $this->FOLLICLE_STATUS->AdvancedSearch->toJson(), ","); // Field FOLLICLE_STATUS
        $filterList = Concat($filterList, $this->NUMBER_OF_IUI->AdvancedSearch->toJson(), ","); // Field NUMBER_OF_IUI
        $filterList = Concat($filterList, $this->PROCEDURE->AdvancedSearch->toJson(), ","); // Field PROCEDURE
        $filterList = Concat($filterList, $this->LUTEAL_SUPPORT->AdvancedSearch->toJson(), ","); // Field LUTEAL_SUPPORT
        $filterList = Concat($filterList, $this->HDSAMPLE->AdvancedSearch->toJson(), ","); // Field H/D SAMPLE
        $filterList = Concat($filterList, $this->DONORID->AdvancedSearch->toJson(), ","); // Field DONOR - I.D
        $filterList = Concat($filterList, $this->PREG_TEST_DATE->AdvancedSearch->toJson(), ","); // Field PREG_TEST_DATE
        $filterList = Concat($filterList, $this->COLLECTIONMETHOD->AdvancedSearch->toJson(), ","); // Field COLLECTION  METHOD
        $filterList = Concat($filterList, $this->SAMPLESOURCE->AdvancedSearch->toJson(), ","); // Field SAMPLE SOURCE
        $filterList = Concat($filterList, $this->SPECIFIC_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_PROBLEMS
        $filterList = Concat($filterList, $this->IMSC_1->AdvancedSearch->toJson(), ","); // Field IMSC_1
        $filterList = Concat($filterList, $this->IMSC_2->AdvancedSearch->toJson(), ","); // Field IMSC_2
        $filterList = Concat($filterList, $this->LIQUIFACTION_STORAGE->AdvancedSearch->toJson(), ","); // Field LIQUIFACTION_STORAGE
        $filterList = Concat($filterList, $this->IUI_PREP_METHOD->AdvancedSearch->toJson(), ","); // Field IUI_PREP_METHOD
        $filterList = Concat($filterList, $this->TIME_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME_FROM_TRIGGER
        $filterList = Concat($filterList, $this->COLLECTION_TO_PREPARATION->AdvancedSearch->toJson(), ","); // Field COLLECTION_TO_PREPARATION
        $filterList = Concat($filterList, $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->toJson(), ","); // Field TIME_FROM_PREP_TO_INSEM
        $filterList = Concat($filterList, $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_MATERNAL_PROBLEMS
        $filterList = Concat($filterList, $this->RESULTS->AdvancedSearch->toJson(), ","); // Field RESULTS
        $filterList = Concat($filterList, $this->ONGOING_PREG->AdvancedSearch->toJson(), ","); // Field ONGOING_PREG
        $filterList = Concat($filterList, $this->EDD_Date->AdvancedSearch->toJson(), ","); // Field EDD_Date
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_iui_excellistsrch", $filters);
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

        // Field NAME
        $this->NAME->AdvancedSearch->SearchValue = @$filter["x_NAME"];
        $this->NAME->AdvancedSearch->SearchOperator = @$filter["z_NAME"];
        $this->NAME->AdvancedSearch->SearchCondition = @$filter["v_NAME"];
        $this->NAME->AdvancedSearch->SearchValue2 = @$filter["y_NAME"];
        $this->NAME->AdvancedSearch->SearchOperator2 = @$filter["w_NAME"];
        $this->NAME->AdvancedSearch->save();

        // Field HUSBAND NAME
        $this->HUSBANDNAME->AdvancedSearch->SearchValue = @$filter["x_HUSBANDNAME"];
        $this->HUSBANDNAME->AdvancedSearch->SearchOperator = @$filter["z_HUSBANDNAME"];
        $this->HUSBANDNAME->AdvancedSearch->SearchCondition = @$filter["v_HUSBANDNAME"];
        $this->HUSBANDNAME->AdvancedSearch->SearchValue2 = @$filter["y_HUSBANDNAME"];
        $this->HUSBANDNAME->AdvancedSearch->SearchOperator2 = @$filter["w_HUSBANDNAME"];
        $this->HUSBANDNAME->AdvancedSearch->save();

        // Field CoupleID
        $this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
        $this->CoupleID->AdvancedSearch->save();

        // Field AGE  - WIFE
        $this->AGEWIFE->AdvancedSearch->SearchValue = @$filter["x_AGEWIFE"];
        $this->AGEWIFE->AdvancedSearch->SearchOperator = @$filter["z_AGEWIFE"];
        $this->AGEWIFE->AdvancedSearch->SearchCondition = @$filter["v_AGEWIFE"];
        $this->AGEWIFE->AdvancedSearch->SearchValue2 = @$filter["y_AGEWIFE"];
        $this->AGEWIFE->AdvancedSearch->SearchOperator2 = @$filter["w_AGEWIFE"];
        $this->AGEWIFE->AdvancedSearch->save();

        // Field AGE- HUSBAND
        $this->AGEHUSBAND->AdvancedSearch->SearchValue = @$filter["x_AGEHUSBAND"];
        $this->AGEHUSBAND->AdvancedSearch->SearchOperator = @$filter["z_AGEHUSBAND"];
        $this->AGEHUSBAND->AdvancedSearch->SearchCondition = @$filter["v_AGEHUSBAND"];
        $this->AGEHUSBAND->AdvancedSearch->SearchValue2 = @$filter["y_AGEHUSBAND"];
        $this->AGEHUSBAND->AdvancedSearch->SearchOperator2 = @$filter["w_AGEHUSBAND"];
        $this->AGEHUSBAND->AdvancedSearch->save();

        // Field ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue = @$filter["x_ANXIOUSTOCONCEIVEFOR"];
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchOperator = @$filter["z_ANXIOUSTOCONCEIVEFOR"];
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchCondition = @$filter["v_ANXIOUSTOCONCEIVEFOR"];
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue2 = @$filter["y_ANXIOUSTOCONCEIVEFOR"];
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchOperator2 = @$filter["w_ANXIOUSTOCONCEIVEFOR"];
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->save();

        // Field AMH ( NG/ML)
        $this->AMHNGML->AdvancedSearch->SearchValue = @$filter["x_AMHNGML"];
        $this->AMHNGML->AdvancedSearch->SearchOperator = @$filter["z_AMHNGML"];
        $this->AMHNGML->AdvancedSearch->SearchCondition = @$filter["v_AMHNGML"];
        $this->AMHNGML->AdvancedSearch->SearchValue2 = @$filter["y_AMHNGML"];
        $this->AMHNGML->AdvancedSearch->SearchOperator2 = @$filter["w_AMHNGML"];
        $this->AMHNGML->AdvancedSearch->save();

        // Field TUBAL_PATENCY
        $this->TUBAL_PATENCY->AdvancedSearch->SearchValue = @$filter["x_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchOperator = @$filter["z_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchCondition = @$filter["v_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchValue2 = @$filter["y_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchOperator2 = @$filter["w_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->save();

        // Field HSG
        $this->HSG->AdvancedSearch->SearchValue = @$filter["x_HSG"];
        $this->HSG->AdvancedSearch->SearchOperator = @$filter["z_HSG"];
        $this->HSG->AdvancedSearch->SearchCondition = @$filter["v_HSG"];
        $this->HSG->AdvancedSearch->SearchValue2 = @$filter["y_HSG"];
        $this->HSG->AdvancedSearch->SearchOperator2 = @$filter["w_HSG"];
        $this->HSG->AdvancedSearch->save();

        // Field DHL
        $this->DHL->AdvancedSearch->SearchValue = @$filter["x_DHL"];
        $this->DHL->AdvancedSearch->SearchOperator = @$filter["z_DHL"];
        $this->DHL->AdvancedSearch->SearchCondition = @$filter["v_DHL"];
        $this->DHL->AdvancedSearch->SearchValue2 = @$filter["y_DHL"];
        $this->DHL->AdvancedSearch->SearchOperator2 = @$filter["w_DHL"];
        $this->DHL->AdvancedSearch->save();

        // Field UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->save();

        // Field W_COMORBIDS
        $this->W_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->save();

        // Field H_COMORBIDS
        $this->H_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->save();

        // Field SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = @$filter["x_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator = @$filter["z_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchCondition = @$filter["v_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue2 = @$filter["y_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator2 = @$filter["w_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->save();

        // Field PREV IUI
        $this->PREVIUI->AdvancedSearch->SearchValue = @$filter["x_PREVIUI"];
        $this->PREVIUI->AdvancedSearch->SearchOperator = @$filter["z_PREVIUI"];
        $this->PREVIUI->AdvancedSearch->SearchCondition = @$filter["v_PREVIUI"];
        $this->PREVIUI->AdvancedSearch->SearchValue2 = @$filter["y_PREVIUI"];
        $this->PREVIUI->AdvancedSearch->SearchOperator2 = @$filter["w_PREVIUI"];
        $this->PREVIUI->AdvancedSearch->save();

        // Field PREV_IVF
        $this->PREV_IVF->AdvancedSearch->SearchValue = @$filter["x_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchOperator = @$filter["z_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchCondition = @$filter["v_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchValue2 = @$filter["y_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchOperator2 = @$filter["w_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->save();

        // Field TABLETS
        $this->TABLETS->AdvancedSearch->SearchValue = @$filter["x_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchOperator = @$filter["z_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchCondition = @$filter["v_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchValue2 = @$filter["y_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchOperator2 = @$filter["w_TABLETS"];
        $this->TABLETS->AdvancedSearch->save();

        // Field INJTYPE
        $this->INJTYPE->AdvancedSearch->SearchValue = @$filter["x_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchOperator = @$filter["z_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchCondition = @$filter["v_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchValue2 = @$filter["y_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->save();

        // Field LMP
        $this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
        $this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
        $this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
        $this->LMP->AdvancedSearch->save();

        // Field TRIGGERR
        $this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->save();

        // Field TRIGGERDATE
        $this->TRIGGERDATE->AdvancedSearch->SearchValue = @$filter["x_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->save();

        // Field FOLLICLE_STATUS
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = @$filter["x_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator = @$filter["z_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchCondition = @$filter["v_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue2 = @$filter["y_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->save();

        // Field NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = @$filter["x_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator = @$filter["z_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchCondition = @$filter["v_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue2 = @$filter["y_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->save();

        // Field PROCEDURE
        $this->PROCEDURE->AdvancedSearch->SearchValue = @$filter["x_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchOperator = @$filter["z_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchCondition = @$filter["v_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchValue2 = @$filter["y_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchOperator2 = @$filter["w_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->save();

        // Field LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = @$filter["x_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator = @$filter["z_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchCondition = @$filter["v_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue2 = @$filter["y_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator2 = @$filter["w_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->save();

        // Field H/D SAMPLE
        $this->HDSAMPLE->AdvancedSearch->SearchValue = @$filter["x_HDSAMPLE"];
        $this->HDSAMPLE->AdvancedSearch->SearchOperator = @$filter["z_HDSAMPLE"];
        $this->HDSAMPLE->AdvancedSearch->SearchCondition = @$filter["v_HDSAMPLE"];
        $this->HDSAMPLE->AdvancedSearch->SearchValue2 = @$filter["y_HDSAMPLE"];
        $this->HDSAMPLE->AdvancedSearch->SearchOperator2 = @$filter["w_HDSAMPLE"];
        $this->HDSAMPLE->AdvancedSearch->save();

        // Field DONOR - I.D
        $this->DONORID->AdvancedSearch->SearchValue = @$filter["x_DONORID"];
        $this->DONORID->AdvancedSearch->SearchOperator = @$filter["z_DONORID"];
        $this->DONORID->AdvancedSearch->SearchCondition = @$filter["v_DONORID"];
        $this->DONORID->AdvancedSearch->SearchValue2 = @$filter["y_DONORID"];
        $this->DONORID->AdvancedSearch->SearchOperator2 = @$filter["w_DONORID"];
        $this->DONORID->AdvancedSearch->save();

        // Field PREG_TEST_DATE
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue = @$filter["x_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator = @$filter["z_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchCondition = @$filter["v_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 = @$filter["y_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator2 = @$filter["w_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->save();

        // Field COLLECTION  METHOD
        $this->COLLECTIONMETHOD->AdvancedSearch->SearchValue = @$filter["x_COLLECTIONMETHOD"];
        $this->COLLECTIONMETHOD->AdvancedSearch->SearchOperator = @$filter["z_COLLECTIONMETHOD"];
        $this->COLLECTIONMETHOD->AdvancedSearch->SearchCondition = @$filter["v_COLLECTIONMETHOD"];
        $this->COLLECTIONMETHOD->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTIONMETHOD"];
        $this->COLLECTIONMETHOD->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTIONMETHOD"];
        $this->COLLECTIONMETHOD->AdvancedSearch->save();

        // Field SAMPLE SOURCE
        $this->SAMPLESOURCE->AdvancedSearch->SearchValue = @$filter["x_SAMPLESOURCE"];
        $this->SAMPLESOURCE->AdvancedSearch->SearchOperator = @$filter["z_SAMPLESOURCE"];
        $this->SAMPLESOURCE->AdvancedSearch->SearchCondition = @$filter["v_SAMPLESOURCE"];
        $this->SAMPLESOURCE->AdvancedSearch->SearchValue2 = @$filter["y_SAMPLESOURCE"];
        $this->SAMPLESOURCE->AdvancedSearch->SearchOperator2 = @$filter["w_SAMPLESOURCE"];
        $this->SAMPLESOURCE->AdvancedSearch->save();

        // Field SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->save();

        // Field IMSC_1
        $this->IMSC_1->AdvancedSearch->SearchValue = @$filter["x_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator = @$filter["z_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchCondition = @$filter["v_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->save();

        // Field IMSC_2
        $this->IMSC_2->AdvancedSearch->SearchValue = @$filter["x_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator = @$filter["z_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchCondition = @$filter["v_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->save();

        // Field LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = @$filter["x_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator = @$filter["z_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchCondition = @$filter["v_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 = @$filter["y_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator2 = @$filter["w_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->save();

        // Field IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = @$filter["x_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator = @$filter["z_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchCondition = @$filter["v_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 = @$filter["y_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->save();

        // Field TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->save();

        // Field COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = @$filter["x_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save();

        // Field TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save();

        // Field SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save();

        // Field RESULTS
        $this->RESULTS->AdvancedSearch->SearchValue = @$filter["x_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchOperator = @$filter["z_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchCondition = @$filter["v_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchValue2 = @$filter["y_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchOperator2 = @$filter["w_RESULTS"];
        $this->RESULTS->AdvancedSearch->save();

        // Field ONGOING_PREG
        $this->ONGOING_PREG->AdvancedSearch->SearchValue = @$filter["x_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchOperator = @$filter["z_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchCondition = @$filter["v_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchValue2 = @$filter["y_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchOperator2 = @$filter["w_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->save();

        // Field EDD_Date
        $this->EDD_Date->AdvancedSearch->SearchValue = @$filter["x_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchOperator = @$filter["z_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchCondition = @$filter["v_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchValue2 = @$filter["y_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchOperator2 = @$filter["w_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->NAME, $default, false); // NAME
        $this->buildSearchSql($where, $this->HUSBANDNAME, $default, false); // HUSBAND NAME
        $this->buildSearchSql($where, $this->CoupleID, $default, false); // CoupleID
        $this->buildSearchSql($where, $this->AGEWIFE, $default, false); // AGE  - WIFE
        $this->buildSearchSql($where, $this->AGEHUSBAND, $default, false); // AGE- HUSBAND
        $this->buildSearchSql($where, $this->ANXIOUSTOCONCEIVEFOR, $default, false); // ANXIOUS TO CONCEIVE FOR
        $this->buildSearchSql($where, $this->AMHNGML, $default, false); // AMH ( NG/ML)
        $this->buildSearchSql($where, $this->TUBAL_PATENCY, $default, false); // TUBAL_PATENCY
        $this->buildSearchSql($where, $this->HSG, $default, false); // HSG
        $this->buildSearchSql($where, $this->DHL, $default, false); // DHL
        $this->buildSearchSql($where, $this->UTERINE_PROBLEMS, $default, false); // UTERINE_PROBLEMS
        $this->buildSearchSql($where, $this->W_COMORBIDS, $default, false); // W_COMORBIDS
        $this->buildSearchSql($where, $this->H_COMORBIDS, $default, false); // H_COMORBIDS
        $this->buildSearchSql($where, $this->SEXUAL_DYSFUNCTION, $default, false); // SEXUAL_DYSFUNCTION
        $this->buildSearchSql($where, $this->PREVIUI, $default, false); // PREV IUI
        $this->buildSearchSql($where, $this->PREV_IVF, $default, false); // PREV_IVF
        $this->buildSearchSql($where, $this->TABLETS, $default, false); // TABLETS
        $this->buildSearchSql($where, $this->INJTYPE, $default, false); // INJTYPE
        $this->buildSearchSql($where, $this->LMP, $default, false); // LMP
        $this->buildSearchSql($where, $this->TRIGGERR, $default, false); // TRIGGERR
        $this->buildSearchSql($where, $this->TRIGGERDATE, $default, false); // TRIGGERDATE
        $this->buildSearchSql($where, $this->FOLLICLE_STATUS, $default, false); // FOLLICLE_STATUS
        $this->buildSearchSql($where, $this->NUMBER_OF_IUI, $default, false); // NUMBER_OF_IUI
        $this->buildSearchSql($where, $this->PROCEDURE, $default, false); // PROCEDURE
        $this->buildSearchSql($where, $this->LUTEAL_SUPPORT, $default, false); // LUTEAL_SUPPORT
        $this->buildSearchSql($where, $this->HDSAMPLE, $default, false); // H/D SAMPLE
        $this->buildSearchSql($where, $this->DONORID, $default, false); // DONOR - I.D
        $this->buildSearchSql($where, $this->PREG_TEST_DATE, $default, false); // PREG_TEST_DATE
        $this->buildSearchSql($where, $this->COLLECTIONMETHOD, $default, false); // COLLECTION  METHOD
        $this->buildSearchSql($where, $this->SAMPLESOURCE, $default, false); // SAMPLE SOURCE
        $this->buildSearchSql($where, $this->SPECIFIC_PROBLEMS, $default, false); // SPECIFIC_PROBLEMS
        $this->buildSearchSql($where, $this->IMSC_1, $default, false); // IMSC_1
        $this->buildSearchSql($where, $this->IMSC_2, $default, false); // IMSC_2
        $this->buildSearchSql($where, $this->LIQUIFACTION_STORAGE, $default, false); // LIQUIFACTION_STORAGE
        $this->buildSearchSql($where, $this->IUI_PREP_METHOD, $default, false); // IUI_PREP_METHOD
        $this->buildSearchSql($where, $this->TIME_FROM_TRIGGER, $default, false); // TIME_FROM_TRIGGER
        $this->buildSearchSql($where, $this->COLLECTION_TO_PREPARATION, $default, false); // COLLECTION_TO_PREPARATION
        $this->buildSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $default, false); // TIME_FROM_PREP_TO_INSEM
        $this->buildSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $default, false); // SPECIFIC_MATERNAL_PROBLEMS
        $this->buildSearchSql($where, $this->RESULTS, $default, false); // RESULTS
        $this->buildSearchSql($where, $this->ONGOING_PREG, $default, false); // ONGOING_PREG
        $this->buildSearchSql($where, $this->EDD_Date, $default, false); // EDD_Date

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->NAME->AdvancedSearch->save(); // NAME
            $this->HUSBANDNAME->AdvancedSearch->save(); // HUSBAND NAME
            $this->CoupleID->AdvancedSearch->save(); // CoupleID
            $this->AGEWIFE->AdvancedSearch->save(); // AGE  - WIFE
            $this->AGEHUSBAND->AdvancedSearch->save(); // AGE- HUSBAND
            $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->save(); // ANXIOUS TO CONCEIVE FOR
            $this->AMHNGML->AdvancedSearch->save(); // AMH ( NG/ML)
            $this->TUBAL_PATENCY->AdvancedSearch->save(); // TUBAL_PATENCY
            $this->HSG->AdvancedSearch->save(); // HSG
            $this->DHL->AdvancedSearch->save(); // DHL
            $this->UTERINE_PROBLEMS->AdvancedSearch->save(); // UTERINE_PROBLEMS
            $this->W_COMORBIDS->AdvancedSearch->save(); // W_COMORBIDS
            $this->H_COMORBIDS->AdvancedSearch->save(); // H_COMORBIDS
            $this->SEXUAL_DYSFUNCTION->AdvancedSearch->save(); // SEXUAL_DYSFUNCTION
            $this->PREVIUI->AdvancedSearch->save(); // PREV IUI
            $this->PREV_IVF->AdvancedSearch->save(); // PREV_IVF
            $this->TABLETS->AdvancedSearch->save(); // TABLETS
            $this->INJTYPE->AdvancedSearch->save(); // INJTYPE
            $this->LMP->AdvancedSearch->save(); // LMP
            $this->TRIGGERR->AdvancedSearch->save(); // TRIGGERR
            $this->TRIGGERDATE->AdvancedSearch->save(); // TRIGGERDATE
            $this->FOLLICLE_STATUS->AdvancedSearch->save(); // FOLLICLE_STATUS
            $this->NUMBER_OF_IUI->AdvancedSearch->save(); // NUMBER_OF_IUI
            $this->PROCEDURE->AdvancedSearch->save(); // PROCEDURE
            $this->LUTEAL_SUPPORT->AdvancedSearch->save(); // LUTEAL_SUPPORT
            $this->HDSAMPLE->AdvancedSearch->save(); // H/D SAMPLE
            $this->DONORID->AdvancedSearch->save(); // DONOR - I.D
            $this->PREG_TEST_DATE->AdvancedSearch->save(); // PREG_TEST_DATE
            $this->COLLECTIONMETHOD->AdvancedSearch->save(); // COLLECTION  METHOD
            $this->SAMPLESOURCE->AdvancedSearch->save(); // SAMPLE SOURCE
            $this->SPECIFIC_PROBLEMS->AdvancedSearch->save(); // SPECIFIC_PROBLEMS
            $this->IMSC_1->AdvancedSearch->save(); // IMSC_1
            $this->IMSC_2->AdvancedSearch->save(); // IMSC_2
            $this->LIQUIFACTION_STORAGE->AdvancedSearch->save(); // LIQUIFACTION_STORAGE
            $this->IUI_PREP_METHOD->AdvancedSearch->save(); // IUI_PREP_METHOD
            $this->TIME_FROM_TRIGGER->AdvancedSearch->save(); // TIME_FROM_TRIGGER
            $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save(); // COLLECTION_TO_PREPARATION
            $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save(); // TIME_FROM_PREP_TO_INSEM
            $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save(); // SPECIFIC_MATERNAL_PROBLEMS
            $this->RESULTS->AdvancedSearch->save(); // RESULTS
            $this->ONGOING_PREG->AdvancedSearch->save(); // ONGOING_PREG
            $this->EDD_Date->AdvancedSearch->save(); // EDD_Date
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
        $this->buildBasicSearchSql($where, $this->NAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HUSBANDNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AGEWIFE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AGEHUSBAND, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANXIOUSTOCONCEIVEFOR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AMHNGML, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TUBAL_PATENCY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HSG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DHL, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UTERINE_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->W_COMORBIDS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->H_COMORBIDS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SEXUAL_DYSFUNCTION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PREVIUI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PREV_IVF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TABLETS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->INJTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FOLLICLE_STATUS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NUMBER_OF_IUI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PROCEDURE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LUTEAL_SUPPORT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HDSAMPLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTIONMETHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAMPLESOURCE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LIQUIFACTION_STORAGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUI_PREP_METHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_TRIGGER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTION_TO_PREPARATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULTS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ONGOING_PREG, $arKeywords, $type);
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
        if ($this->NAME->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HUSBANDNAME->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CoupleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AGEWIFE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AGEHUSBAND->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AMHNGML->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TUBAL_PATENCY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HSG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DHL->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UTERINE_PROBLEMS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->W_COMORBIDS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->H_COMORBIDS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SEXUAL_DYSFUNCTION->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PREVIUI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PREV_IVF->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TABLETS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->INJTYPE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LMP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TRIGGERR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TRIGGERDATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FOLLICLE_STATUS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NUMBER_OF_IUI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PROCEDURE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LUTEAL_SUPPORT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HDSAMPLE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DONORID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PREG_TEST_DATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->COLLECTIONMETHOD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SAMPLESOURCE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMSC_1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMSC_2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IUI_PREP_METHOD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIME_FROM_TRIGGER->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RESULTS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ONGOING_PREG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EDD_Date->AdvancedSearch->issetSession()) {
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
                $this->NAME->AdvancedSearch->unsetSession();
                $this->HUSBANDNAME->AdvancedSearch->unsetSession();
                $this->CoupleID->AdvancedSearch->unsetSession();
                $this->AGEWIFE->AdvancedSearch->unsetSession();
                $this->AGEHUSBAND->AdvancedSearch->unsetSession();
                $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->unsetSession();
                $this->AMHNGML->AdvancedSearch->unsetSession();
                $this->TUBAL_PATENCY->AdvancedSearch->unsetSession();
                $this->HSG->AdvancedSearch->unsetSession();
                $this->DHL->AdvancedSearch->unsetSession();
                $this->UTERINE_PROBLEMS->AdvancedSearch->unsetSession();
                $this->W_COMORBIDS->AdvancedSearch->unsetSession();
                $this->H_COMORBIDS->AdvancedSearch->unsetSession();
                $this->SEXUAL_DYSFUNCTION->AdvancedSearch->unsetSession();
                $this->PREVIUI->AdvancedSearch->unsetSession();
                $this->PREV_IVF->AdvancedSearch->unsetSession();
                $this->TABLETS->AdvancedSearch->unsetSession();
                $this->INJTYPE->AdvancedSearch->unsetSession();
                $this->LMP->AdvancedSearch->unsetSession();
                $this->TRIGGERR->AdvancedSearch->unsetSession();
                $this->TRIGGERDATE->AdvancedSearch->unsetSession();
                $this->FOLLICLE_STATUS->AdvancedSearch->unsetSession();
                $this->NUMBER_OF_IUI->AdvancedSearch->unsetSession();
                $this->PROCEDURE->AdvancedSearch->unsetSession();
                $this->LUTEAL_SUPPORT->AdvancedSearch->unsetSession();
                $this->HDSAMPLE->AdvancedSearch->unsetSession();
                $this->DONORID->AdvancedSearch->unsetSession();
                $this->PREG_TEST_DATE->AdvancedSearch->unsetSession();
                $this->COLLECTIONMETHOD->AdvancedSearch->unsetSession();
                $this->SAMPLESOURCE->AdvancedSearch->unsetSession();
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->unsetSession();
                $this->IMSC_1->AdvancedSearch->unsetSession();
                $this->IMSC_2->AdvancedSearch->unsetSession();
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->unsetSession();
                $this->IUI_PREP_METHOD->AdvancedSearch->unsetSession();
                $this->TIME_FROM_TRIGGER->AdvancedSearch->unsetSession();
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->unsetSession();
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->unsetSession();
                $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->unsetSession();
                $this->RESULTS->AdvancedSearch->unsetSession();
                $this->ONGOING_PREG->AdvancedSearch->unsetSession();
                $this->EDD_Date->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->NAME->AdvancedSearch->load();
                $this->HUSBANDNAME->AdvancedSearch->load();
                $this->CoupleID->AdvancedSearch->load();
                $this->AGEWIFE->AdvancedSearch->load();
                $this->AGEHUSBAND->AdvancedSearch->load();
                $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->load();
                $this->AMHNGML->AdvancedSearch->load();
                $this->TUBAL_PATENCY->AdvancedSearch->load();
                $this->HSG->AdvancedSearch->load();
                $this->DHL->AdvancedSearch->load();
                $this->UTERINE_PROBLEMS->AdvancedSearch->load();
                $this->W_COMORBIDS->AdvancedSearch->load();
                $this->H_COMORBIDS->AdvancedSearch->load();
                $this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
                $this->PREVIUI->AdvancedSearch->load();
                $this->PREV_IVF->AdvancedSearch->load();
                $this->TABLETS->AdvancedSearch->load();
                $this->INJTYPE->AdvancedSearch->load();
                $this->LMP->AdvancedSearch->load();
                $this->TRIGGERR->AdvancedSearch->load();
                $this->TRIGGERDATE->AdvancedSearch->load();
                $this->FOLLICLE_STATUS->AdvancedSearch->load();
                $this->NUMBER_OF_IUI->AdvancedSearch->load();
                $this->PROCEDURE->AdvancedSearch->load();
                $this->LUTEAL_SUPPORT->AdvancedSearch->load();
                $this->HDSAMPLE->AdvancedSearch->load();
                $this->DONORID->AdvancedSearch->load();
                $this->PREG_TEST_DATE->AdvancedSearch->load();
                $this->COLLECTIONMETHOD->AdvancedSearch->load();
                $this->SAMPLESOURCE->AdvancedSearch->load();
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
                $this->IMSC_1->AdvancedSearch->load();
                $this->IMSC_2->AdvancedSearch->load();
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
                $this->IUI_PREP_METHOD->AdvancedSearch->load();
                $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
                $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
                $this->RESULTS->AdvancedSearch->load();
                $this->ONGOING_PREG->AdvancedSearch->load();
                $this->EDD_Date->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->NAME); // NAME
            $this->updateSort($this->HUSBANDNAME); // HUSBAND NAME
            $this->updateSort($this->CoupleID); // CoupleID
            $this->updateSort($this->AGEWIFE); // AGE  - WIFE
            $this->updateSort($this->AGEHUSBAND); // AGE- HUSBAND
            $this->updateSort($this->ANXIOUSTOCONCEIVEFOR); // ANXIOUS TO CONCEIVE FOR
            $this->updateSort($this->AMHNGML); // AMH ( NG/ML)
            $this->updateSort($this->TUBAL_PATENCY); // TUBAL_PATENCY
            $this->updateSort($this->HSG); // HSG
            $this->updateSort($this->DHL); // DHL
            $this->updateSort($this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
            $this->updateSort($this->W_COMORBIDS); // W_COMORBIDS
            $this->updateSort($this->H_COMORBIDS); // H_COMORBIDS
            $this->updateSort($this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
            $this->updateSort($this->PREVIUI); // PREV IUI
            $this->updateSort($this->PREV_IVF); // PREV_IVF
            $this->updateSort($this->TABLETS); // TABLETS
            $this->updateSort($this->INJTYPE); // INJTYPE
            $this->updateSort($this->LMP); // LMP
            $this->updateSort($this->TRIGGERR); // TRIGGERR
            $this->updateSort($this->TRIGGERDATE); // TRIGGERDATE
            $this->updateSort($this->FOLLICLE_STATUS); // FOLLICLE_STATUS
            $this->updateSort($this->NUMBER_OF_IUI); // NUMBER_OF_IUI
            $this->updateSort($this->PROCEDURE); // PROCEDURE
            $this->updateSort($this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
            $this->updateSort($this->HDSAMPLE); // H/D SAMPLE
            $this->updateSort($this->DONORID); // DONOR - I.D
            $this->updateSort($this->PREG_TEST_DATE); // PREG_TEST_DATE
            $this->updateSort($this->COLLECTIONMETHOD); // COLLECTION  METHOD
            $this->updateSort($this->SAMPLESOURCE); // SAMPLE SOURCE
            $this->updateSort($this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
            $this->updateSort($this->IMSC_1); // IMSC_1
            $this->updateSort($this->IMSC_2); // IMSC_2
            $this->updateSort($this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
            $this->updateSort($this->IUI_PREP_METHOD); // IUI_PREP_METHOD
            $this->updateSort($this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
            $this->updateSort($this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
            $this->updateSort($this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
            $this->updateSort($this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
            $this->updateSort($this->RESULTS); // RESULTS
            $this->updateSort($this->ONGOING_PREG); // ONGOING_PREG
            $this->updateSort($this->EDD_Date); // EDD_Date
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
                $this->NAME->setSort("");
                $this->HUSBANDNAME->setSort("");
                $this->CoupleID->setSort("");
                $this->AGEWIFE->setSort("");
                $this->AGEHUSBAND->setSort("");
                $this->ANXIOUSTOCONCEIVEFOR->setSort("");
                $this->AMHNGML->setSort("");
                $this->TUBAL_PATENCY->setSort("");
                $this->HSG->setSort("");
                $this->DHL->setSort("");
                $this->UTERINE_PROBLEMS->setSort("");
                $this->W_COMORBIDS->setSort("");
                $this->H_COMORBIDS->setSort("");
                $this->SEXUAL_DYSFUNCTION->setSort("");
                $this->PREVIUI->setSort("");
                $this->PREV_IVF->setSort("");
                $this->TABLETS->setSort("");
                $this->INJTYPE->setSort("");
                $this->LMP->setSort("");
                $this->TRIGGERR->setSort("");
                $this->TRIGGERDATE->setSort("");
                $this->FOLLICLE_STATUS->setSort("");
                $this->NUMBER_OF_IUI->setSort("");
                $this->PROCEDURE->setSort("");
                $this->LUTEAL_SUPPORT->setSort("");
                $this->HDSAMPLE->setSort("");
                $this->DONORID->setSort("");
                $this->PREG_TEST_DATE->setSort("");
                $this->COLLECTIONMETHOD->setSort("");
                $this->SAMPLESOURCE->setSort("");
                $this->SPECIFIC_PROBLEMS->setSort("");
                $this->IMSC_1->setSort("");
                $this->IMSC_2->setSort("");
                $this->LIQUIFACTION_STORAGE->setSort("");
                $this->IUI_PREP_METHOD->setSort("");
                $this->TIME_FROM_TRIGGER->setSort("");
                $this->COLLECTION_TO_PREPARATION->setSort("");
                $this->TIME_FROM_PREP_TO_INSEM->setSort("");
                $this->SPECIFIC_MATERNAL_PROBLEMS->setSort("");
                $this->RESULTS->setSort("");
                $this->ONGOING_PREG->setSort("");
                $this->EDD_Date->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->CoupleID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_iui_excellist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // NAME
        if (!$this->isAddOrEdit() && $this->NAME->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NAME->AdvancedSearch->SearchValue != "" || $this->NAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HUSBAND NAME
        if (!$this->isAddOrEdit() && $this->HUSBANDNAME->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HUSBANDNAME->AdvancedSearch->SearchValue != "" || $this->HUSBANDNAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CoupleID
        if (!$this->isAddOrEdit() && $this->CoupleID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CoupleID->AdvancedSearch->SearchValue != "" || $this->CoupleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AGE  - WIFE
        if (!$this->isAddOrEdit() && $this->AGEWIFE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AGEWIFE->AdvancedSearch->SearchValue != "" || $this->AGEWIFE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AGE- HUSBAND
        if (!$this->isAddOrEdit() && $this->AGEHUSBAND->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AGEHUSBAND->AdvancedSearch->SearchValue != "" || $this->AGEHUSBAND->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ANXIOUS TO CONCEIVE FOR
        if (!$this->isAddOrEdit() && $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue != "" || $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AMH ( NG/ML)
        if (!$this->isAddOrEdit() && $this->AMHNGML->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AMHNGML->AdvancedSearch->SearchValue != "" || $this->AMHNGML->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TUBAL_PATENCY
        if (!$this->isAddOrEdit() && $this->TUBAL_PATENCY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TUBAL_PATENCY->AdvancedSearch->SearchValue != "" || $this->TUBAL_PATENCY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HSG
        if (!$this->isAddOrEdit() && $this->HSG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HSG->AdvancedSearch->SearchValue != "" || $this->HSG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DHL
        if (!$this->isAddOrEdit() && $this->DHL->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DHL->AdvancedSearch->SearchValue != "" || $this->DHL->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UTERINE_PROBLEMS
        if (!$this->isAddOrEdit() && $this->UTERINE_PROBLEMS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue != "" || $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // W_COMORBIDS
        if (!$this->isAddOrEdit() && $this->W_COMORBIDS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->W_COMORBIDS->AdvancedSearch->SearchValue != "" || $this->W_COMORBIDS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // H_COMORBIDS
        if (!$this->isAddOrEdit() && $this->H_COMORBIDS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->H_COMORBIDS->AdvancedSearch->SearchValue != "" || $this->H_COMORBIDS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SEXUAL_DYSFUNCTION
        if (!$this->isAddOrEdit() && $this->SEXUAL_DYSFUNCTION->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue != "" || $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PREV IUI
        if (!$this->isAddOrEdit() && $this->PREVIUI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PREVIUI->AdvancedSearch->SearchValue != "" || $this->PREVIUI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PREV_IVF
        if (!$this->isAddOrEdit() && $this->PREV_IVF->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PREV_IVF->AdvancedSearch->SearchValue != "" || $this->PREV_IVF->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TABLETS
        if (!$this->isAddOrEdit() && $this->TABLETS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TABLETS->AdvancedSearch->SearchValue != "" || $this->TABLETS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // INJTYPE
        if (!$this->isAddOrEdit() && $this->INJTYPE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->INJTYPE->AdvancedSearch->SearchValue != "" || $this->INJTYPE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LMP
        if (!$this->isAddOrEdit() && $this->LMP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LMP->AdvancedSearch->SearchValue != "" || $this->LMP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TRIGGERR
        if (!$this->isAddOrEdit() && $this->TRIGGERR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TRIGGERR->AdvancedSearch->SearchValue != "" || $this->TRIGGERR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TRIGGERDATE
        if (!$this->isAddOrEdit() && $this->TRIGGERDATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TRIGGERDATE->AdvancedSearch->SearchValue != "" || $this->TRIGGERDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FOLLICLE_STATUS
        if (!$this->isAddOrEdit() && $this->FOLLICLE_STATUS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue != "" || $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NUMBER_OF_IUI
        if (!$this->isAddOrEdit() && $this->NUMBER_OF_IUI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue != "" || $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PROCEDURE
        if (!$this->isAddOrEdit() && $this->PROCEDURE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PROCEDURE->AdvancedSearch->SearchValue != "" || $this->PROCEDURE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LUTEAL_SUPPORT
        if (!$this->isAddOrEdit() && $this->LUTEAL_SUPPORT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue != "" || $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // H/D SAMPLE
        if (!$this->isAddOrEdit() && $this->HDSAMPLE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HDSAMPLE->AdvancedSearch->SearchValue != "" || $this->HDSAMPLE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DONOR - I.D
        if (!$this->isAddOrEdit() && $this->DONORID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DONORID->AdvancedSearch->SearchValue != "" || $this->DONORID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PREG_TEST_DATE
        if (!$this->isAddOrEdit() && $this->PREG_TEST_DATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PREG_TEST_DATE->AdvancedSearch->SearchValue != "" || $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // COLLECTION  METHOD
        if (!$this->isAddOrEdit() && $this->COLLECTIONMETHOD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->COLLECTIONMETHOD->AdvancedSearch->SearchValue != "" || $this->COLLECTIONMETHOD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SAMPLE SOURCE
        if (!$this->isAddOrEdit() && $this->SAMPLESOURCE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SAMPLESOURCE->AdvancedSearch->SearchValue != "" || $this->SAMPLESOURCE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SPECIFIC_PROBLEMS
        if (!$this->isAddOrEdit() && $this->SPECIFIC_PROBLEMS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue != "" || $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMSC_1
        if (!$this->isAddOrEdit() && $this->IMSC_1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMSC_1->AdvancedSearch->SearchValue != "" || $this->IMSC_1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMSC_2
        if (!$this->isAddOrEdit() && $this->IMSC_2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMSC_2->AdvancedSearch->SearchValue != "" || $this->IMSC_2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LIQUIFACTION_STORAGE
        if (!$this->isAddOrEdit() && $this->LIQUIFACTION_STORAGE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue != "" || $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IUI_PREP_METHOD
        if (!$this->isAddOrEdit() && $this->IUI_PREP_METHOD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue != "" || $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME_FROM_TRIGGER
        if (!$this->isAddOrEdit() && $this->TIME_FROM_TRIGGER->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue != "" || $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // COLLECTION_TO_PREPARATION
        if (!$this->isAddOrEdit() && $this->COLLECTION_TO_PREPARATION->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue != "" || $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME_FROM_PREP_TO_INSEM
        if (!$this->isAddOrEdit() && $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue != "" || $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SPECIFIC_MATERNAL_PROBLEMS
        if (!$this->isAddOrEdit() && $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue != "" || $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RESULTS
        if (!$this->isAddOrEdit() && $this->RESULTS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RESULTS->AdvancedSearch->SearchValue != "" || $this->RESULTS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ONGOING_PREG
        if (!$this->isAddOrEdit() && $this->ONGOING_PREG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ONGOING_PREG->AdvancedSearch->SearchValue != "" || $this->ONGOING_PREG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EDD_Date
        if (!$this->isAddOrEdit() && $this->EDD_Date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EDD_Date->AdvancedSearch->SearchValue != "" || $this->EDD_Date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->NAME->setDbValue($row['NAME']);
        $this->HUSBANDNAME->setDbValue($row['HUSBAND NAME']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->AGEWIFE->setDbValue($row['AGE  - WIFE']);
        $this->AGEHUSBAND->setDbValue($row['AGE- HUSBAND']);
        $this->ANXIOUSTOCONCEIVEFOR->setDbValue($row['ANXIOUS TO CONCEIVE FOR']);
        $this->AMHNGML->setDbValue($row['AMH ( NG/ML)']);
        $this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
        $this->HSG->setDbValue($row['HSG']);
        $this->DHL->setDbValue($row['DHL']);
        $this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
        $this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
        $this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
        $this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
        $this->PREVIUI->setDbValue($row['PREV IUI']);
        $this->PREV_IVF->setDbValue($row['PREV_IVF']);
        $this->TABLETS->setDbValue($row['TABLETS']);
        $this->INJTYPE->setDbValue($row['INJTYPE']);
        $this->LMP->setDbValue($row['LMP']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
        $this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
        $this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
        $this->HDSAMPLE->setDbValue($row['H/D SAMPLE']);
        $this->DONORID->setDbValue($row['DONOR - I.D']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->COLLECTIONMETHOD->setDbValue($row['COLLECTION  METHOD']);
        $this->SAMPLESOURCE->setDbValue($row['SAMPLE SOURCE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
        $this->RESULTS->setDbValue($row['RESULTS']);
        $this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
        $this->EDD_Date->setDbValue($row['EDD_Date']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['NAME'] = null;
        $row['HUSBAND NAME'] = null;
        $row['CoupleID'] = null;
        $row['AGE  - WIFE'] = null;
        $row['AGE- HUSBAND'] = null;
        $row['ANXIOUS TO CONCEIVE FOR'] = null;
        $row['AMH ( NG/ML)'] = null;
        $row['TUBAL_PATENCY'] = null;
        $row['HSG'] = null;
        $row['DHL'] = null;
        $row['UTERINE_PROBLEMS'] = null;
        $row['W_COMORBIDS'] = null;
        $row['H_COMORBIDS'] = null;
        $row['SEXUAL_DYSFUNCTION'] = null;
        $row['PREV IUI'] = null;
        $row['PREV_IVF'] = null;
        $row['TABLETS'] = null;
        $row['INJTYPE'] = null;
        $row['LMP'] = null;
        $row['TRIGGERR'] = null;
        $row['TRIGGERDATE'] = null;
        $row['FOLLICLE_STATUS'] = null;
        $row['NUMBER_OF_IUI'] = null;
        $row['PROCEDURE'] = null;
        $row['LUTEAL_SUPPORT'] = null;
        $row['H/D SAMPLE'] = null;
        $row['DONOR - I.D'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['COLLECTION  METHOD'] = null;
        $row['SAMPLE SOURCE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
        $row['SPECIFIC_MATERNAL_PROBLEMS'] = null;
        $row['RESULTS'] = null;
        $row['ONGOING_PREG'] = null;
        $row['EDD_Date'] = null;
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

        // NAME

        // HUSBAND NAME

        // CoupleID

        // AGE  - WIFE

        // AGE- HUSBAND

        // ANXIOUS TO CONCEIVE FOR

        // AMH ( NG/ML)

        // TUBAL_PATENCY

        // HSG

        // DHL

        // UTERINE_PROBLEMS

        // W_COMORBIDS

        // H_COMORBIDS

        // SEXUAL_DYSFUNCTION

        // PREV IUI

        // PREV_IVF

        // TABLETS

        // INJTYPE

        // LMP

        // TRIGGERR

        // TRIGGERDATE

        // FOLLICLE_STATUS

        // NUMBER_OF_IUI

        // PROCEDURE

        // LUTEAL_SUPPORT

        // H/D SAMPLE

        // DONOR - I.D

        // PREG_TEST_DATE

        // COLLECTION  METHOD

        // SAMPLE SOURCE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM

        // SPECIFIC_MATERNAL_PROBLEMS

        // RESULTS

        // ONGOING_PREG

        // EDD_Date
        if ($this->RowType == ROWTYPE_VIEW) {
            // NAME
            $this->NAME->ViewValue = $this->NAME->CurrentValue;
            $this->NAME->ViewCustomAttributes = "";

            // HUSBAND NAME
            $this->HUSBANDNAME->ViewValue = $this->HUSBANDNAME->CurrentValue;
            $this->HUSBANDNAME->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // AGE  - WIFE
            $this->AGEWIFE->ViewValue = $this->AGEWIFE->CurrentValue;
            $this->AGEWIFE->ViewCustomAttributes = "";

            // AGE- HUSBAND
            $this->AGEHUSBAND->ViewValue = $this->AGEHUSBAND->CurrentValue;
            $this->AGEHUSBAND->ViewCustomAttributes = "";

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->ViewValue = $this->ANXIOUSTOCONCEIVEFOR->CurrentValue;
            $this->ANXIOUSTOCONCEIVEFOR->ViewCustomAttributes = "";

            // AMH ( NG/ML)
            $this->AMHNGML->ViewValue = $this->AMHNGML->CurrentValue;
            $this->AMHNGML->ViewCustomAttributes = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
            $this->TUBAL_PATENCY->ViewCustomAttributes = "";

            // HSG
            $this->HSG->ViewValue = $this->HSG->CurrentValue;
            $this->HSG->ViewCustomAttributes = "";

            // DHL
            $this->DHL->ViewValue = $this->DHL->CurrentValue;
            $this->DHL->ViewCustomAttributes = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
            $this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
            $this->W_COMORBIDS->ViewCustomAttributes = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
            $this->H_COMORBIDS->ViewCustomAttributes = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
            $this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

            // PREV IUI
            $this->PREVIUI->ViewValue = $this->PREVIUI->CurrentValue;
            $this->PREVIUI->ViewCustomAttributes = "";

            // PREV_IVF
            $this->PREV_IVF->ViewValue = $this->PREV_IVF->CurrentValue;
            $this->PREV_IVF->ViewCustomAttributes = "";

            // TABLETS
            $this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
            $this->TABLETS->ViewCustomAttributes = "";

            // INJTYPE
            $this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
            $this->INJTYPE->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
            $this->LMP->ViewCustomAttributes = "";

            // TRIGGERR
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
            $this->TRIGGERR->ViewCustomAttributes = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
            $this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
            $this->TRIGGERDATE->ViewCustomAttributes = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
            $this->FOLLICLE_STATUS->ViewCustomAttributes = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
            $this->NUMBER_OF_IUI->ViewCustomAttributes = "";

            // PROCEDURE
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
            $this->PROCEDURE->ViewCustomAttributes = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
            $this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

            // H/D SAMPLE
            $this->HDSAMPLE->ViewValue = $this->HDSAMPLE->CurrentValue;
            $this->HDSAMPLE->ViewCustomAttributes = "";

            // DONOR - I.D
            $this->DONORID->ViewValue = $this->DONORID->CurrentValue;
            $this->DONORID->ViewValue = FormatNumber($this->DONORID->ViewValue, 0, -2, -2, -2);
            $this->DONORID->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->ViewValue = $this->COLLECTIONMETHOD->CurrentValue;
            $this->COLLECTIONMETHOD->ViewCustomAttributes = "";

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->ViewValue = $this->SAMPLESOURCE->CurrentValue;
            $this->SAMPLESOURCE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

            // RESULTS
            $this->RESULTS->ViewValue = $this->RESULTS->CurrentValue;
            $this->RESULTS->ViewCustomAttributes = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
            $this->ONGOING_PREG->ViewCustomAttributes = "";

            // EDD_Date
            $this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
            $this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
            $this->EDD_Date->ViewCustomAttributes = "";

            // NAME
            $this->NAME->LinkCustomAttributes = "";
            $this->NAME->HrefValue = "";
            $this->NAME->TooltipValue = "";
            if (!$this->isExport()) {
                $this->NAME->ViewValue = $this->highlightValue($this->NAME);
            }

            // HUSBAND NAME
            $this->HUSBANDNAME->LinkCustomAttributes = "";
            $this->HUSBANDNAME->HrefValue = "";
            $this->HUSBANDNAME->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HUSBANDNAME->ViewValue = $this->highlightValue($this->HUSBANDNAME);
            }

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);
            }

            // AGE  - WIFE
            $this->AGEWIFE->LinkCustomAttributes = "";
            $this->AGEWIFE->HrefValue = "";
            $this->AGEWIFE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AGEWIFE->ViewValue = $this->highlightValue($this->AGEWIFE);
            }

            // AGE- HUSBAND
            $this->AGEHUSBAND->LinkCustomAttributes = "";
            $this->AGEHUSBAND->HrefValue = "";
            $this->AGEHUSBAND->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AGEHUSBAND->ViewValue = $this->highlightValue($this->AGEHUSBAND);
            }

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->LinkCustomAttributes = "";
            $this->ANXIOUSTOCONCEIVEFOR->HrefValue = "";
            $this->ANXIOUSTOCONCEIVEFOR->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ANXIOUSTOCONCEIVEFOR->ViewValue = $this->highlightValue($this->ANXIOUSTOCONCEIVEFOR);
            }

            // AMH ( NG/ML)
            $this->AMHNGML->LinkCustomAttributes = "";
            $this->AMHNGML->HrefValue = "";
            $this->AMHNGML->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AMHNGML->ViewValue = $this->highlightValue($this->AMHNGML);
            }

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->LinkCustomAttributes = "";
            $this->TUBAL_PATENCY->HrefValue = "";
            $this->TUBAL_PATENCY->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TUBAL_PATENCY->ViewValue = $this->highlightValue($this->TUBAL_PATENCY);
            }

            // HSG
            $this->HSG->LinkCustomAttributes = "";
            $this->HSG->HrefValue = "";
            $this->HSG->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HSG->ViewValue = $this->highlightValue($this->HSG);
            }

            // DHL
            $this->DHL->LinkCustomAttributes = "";
            $this->DHL->HrefValue = "";
            $this->DHL->TooltipValue = "";
            if (!$this->isExport()) {
                $this->DHL->ViewValue = $this->highlightValue($this->DHL);
            }

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
            $this->UTERINE_PROBLEMS->HrefValue = "";
            $this->UTERINE_PROBLEMS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->UTERINE_PROBLEMS->ViewValue = $this->highlightValue($this->UTERINE_PROBLEMS);
            }

            // W_COMORBIDS
            $this->W_COMORBIDS->LinkCustomAttributes = "";
            $this->W_COMORBIDS->HrefValue = "";
            $this->W_COMORBIDS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->W_COMORBIDS->ViewValue = $this->highlightValue($this->W_COMORBIDS);
            }

            // H_COMORBIDS
            $this->H_COMORBIDS->LinkCustomAttributes = "";
            $this->H_COMORBIDS->HrefValue = "";
            $this->H_COMORBIDS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->H_COMORBIDS->ViewValue = $this->highlightValue($this->H_COMORBIDS);
            }

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
            $this->SEXUAL_DYSFUNCTION->HrefValue = "";
            $this->SEXUAL_DYSFUNCTION->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SEXUAL_DYSFUNCTION->ViewValue = $this->highlightValue($this->SEXUAL_DYSFUNCTION);
            }

            // PREV IUI
            $this->PREVIUI->LinkCustomAttributes = "";
            $this->PREVIUI->HrefValue = "";
            $this->PREVIUI->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PREVIUI->ViewValue = $this->highlightValue($this->PREVIUI);
            }

            // PREV_IVF
            $this->PREV_IVF->LinkCustomAttributes = "";
            $this->PREV_IVF->HrefValue = "";
            $this->PREV_IVF->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PREV_IVF->ViewValue = $this->highlightValue($this->PREV_IVF);
            }

            // TABLETS
            $this->TABLETS->LinkCustomAttributes = "";
            $this->TABLETS->HrefValue = "";
            $this->TABLETS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TABLETS->ViewValue = $this->highlightValue($this->TABLETS);
            }

            // INJTYPE
            $this->INJTYPE->LinkCustomAttributes = "";
            $this->INJTYPE->HrefValue = "";
            $this->INJTYPE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->INJTYPE->ViewValue = $this->highlightValue($this->INJTYPE);
            }

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";
            $this->TRIGGERR->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TRIGGERR->ViewValue = $this->highlightValue($this->TRIGGERR);
            }

            // TRIGGERDATE
            $this->TRIGGERDATE->LinkCustomAttributes = "";
            $this->TRIGGERDATE->HrefValue = "";
            $this->TRIGGERDATE->TooltipValue = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
            $this->FOLLICLE_STATUS->HrefValue = "";
            $this->FOLLICLE_STATUS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->FOLLICLE_STATUS->ViewValue = $this->highlightValue($this->FOLLICLE_STATUS);
            }

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
            $this->NUMBER_OF_IUI->HrefValue = "";
            $this->NUMBER_OF_IUI->TooltipValue = "";
            if (!$this->isExport()) {
                $this->NUMBER_OF_IUI->ViewValue = $this->highlightValue($this->NUMBER_OF_IUI);
            }

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";
            $this->PROCEDURE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PROCEDURE->ViewValue = $this->highlightValue($this->PROCEDURE);
            }

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
            $this->LUTEAL_SUPPORT->HrefValue = "";
            $this->LUTEAL_SUPPORT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->LUTEAL_SUPPORT->ViewValue = $this->highlightValue($this->LUTEAL_SUPPORT);
            }

            // H/D SAMPLE
            $this->HDSAMPLE->LinkCustomAttributes = "";
            $this->HDSAMPLE->HrefValue = "";
            $this->HDSAMPLE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HDSAMPLE->ViewValue = $this->highlightValue($this->HDSAMPLE);
            }

            // DONOR - I.D
            $this->DONORID->LinkCustomAttributes = "";
            $this->DONORID->HrefValue = "";
            $this->DONORID->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->LinkCustomAttributes = "";
            $this->COLLECTIONMETHOD->HrefValue = "";
            $this->COLLECTIONMETHOD->TooltipValue = "";
            if (!$this->isExport()) {
                $this->COLLECTIONMETHOD->ViewValue = $this->highlightValue($this->COLLECTIONMETHOD);
            }

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->LinkCustomAttributes = "";
            $this->SAMPLESOURCE->HrefValue = "";
            $this->SAMPLESOURCE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SAMPLESOURCE->ViewValue = $this->highlightValue($this->SAMPLESOURCE);
            }

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SPECIFIC_PROBLEMS->ViewValue = $this->highlightValue($this->SPECIFIC_PROBLEMS);
            }

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IMSC_1->ViewValue = $this->highlightValue($this->IMSC_1);
            }

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IMSC_2->ViewValue = $this->highlightValue($this->IMSC_2);
            }

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->LIQUIFACTION_STORAGE->ViewValue = $this->highlightValue($this->LIQUIFACTION_STORAGE);
            }

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IUI_PREP_METHOD->ViewValue = $this->highlightValue($this->IUI_PREP_METHOD);
            }

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TIME_FROM_TRIGGER->ViewValue = $this->highlightValue($this->TIME_FROM_TRIGGER);
            }

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";
            if (!$this->isExport()) {
                $this->COLLECTION_TO_PREPARATION->ViewValue = $this->highlightValue($this->COLLECTION_TO_PREPARATION);
            }

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->highlightValue($this->TIME_FROM_PREP_TO_INSEM);
            }

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->highlightValue($this->SPECIFIC_MATERNAL_PROBLEMS);
            }

            // RESULTS
            $this->RESULTS->LinkCustomAttributes = "";
            $this->RESULTS->HrefValue = "";
            $this->RESULTS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->RESULTS->ViewValue = $this->highlightValue($this->RESULTS);
            }

            // ONGOING_PREG
            $this->ONGOING_PREG->LinkCustomAttributes = "";
            $this->ONGOING_PREG->HrefValue = "";
            $this->ONGOING_PREG->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ONGOING_PREG->ViewValue = $this->highlightValue($this->ONGOING_PREG);
            }

            // EDD_Date
            $this->EDD_Date->LinkCustomAttributes = "";
            $this->EDD_Date->HrefValue = "";
            $this->EDD_Date->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // NAME
            $this->NAME->EditAttrs["class"] = "form-control";
            $this->NAME->EditCustomAttributes = "";
            if (!$this->NAME->Raw) {
                $this->NAME->AdvancedSearch->SearchValue = HtmlDecode($this->NAME->AdvancedSearch->SearchValue);
            }
            $this->NAME->EditValue = HtmlEncode($this->NAME->AdvancedSearch->SearchValue);
            $this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

            // HUSBAND NAME
            $this->HUSBANDNAME->EditAttrs["class"] = "form-control";
            $this->HUSBANDNAME->EditCustomAttributes = "";
            if (!$this->HUSBANDNAME->Raw) {
                $this->HUSBANDNAME->AdvancedSearch->SearchValue = HtmlDecode($this->HUSBANDNAME->AdvancedSearch->SearchValue);
            }
            $this->HUSBANDNAME->EditValue = HtmlEncode($this->HUSBANDNAME->AdvancedSearch->SearchValue);
            $this->HUSBANDNAME->PlaceHolder = RemoveHtml($this->HUSBANDNAME->caption());

            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

            // AGE  - WIFE
            $this->AGEWIFE->EditAttrs["class"] = "form-control";
            $this->AGEWIFE->EditCustomAttributes = "";
            if (!$this->AGEWIFE->Raw) {
                $this->AGEWIFE->AdvancedSearch->SearchValue = HtmlDecode($this->AGEWIFE->AdvancedSearch->SearchValue);
            }
            $this->AGEWIFE->EditValue = HtmlEncode($this->AGEWIFE->AdvancedSearch->SearchValue);
            $this->AGEWIFE->PlaceHolder = RemoveHtml($this->AGEWIFE->caption());

            // AGE- HUSBAND
            $this->AGEHUSBAND->EditAttrs["class"] = "form-control";
            $this->AGEHUSBAND->EditCustomAttributes = "";
            if (!$this->AGEHUSBAND->Raw) {
                $this->AGEHUSBAND->AdvancedSearch->SearchValue = HtmlDecode($this->AGEHUSBAND->AdvancedSearch->SearchValue);
            }
            $this->AGEHUSBAND->EditValue = HtmlEncode($this->AGEHUSBAND->AdvancedSearch->SearchValue);
            $this->AGEHUSBAND->PlaceHolder = RemoveHtml($this->AGEHUSBAND->caption());

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUSTOCONCEIVEFOR->EditAttrs["class"] = "form-control";
            $this->ANXIOUSTOCONCEIVEFOR->EditCustomAttributes = "";
            if (!$this->ANXIOUSTOCONCEIVEFOR->Raw) {
                $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue = HtmlDecode($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue);
            }
            $this->ANXIOUSTOCONCEIVEFOR->EditValue = HtmlEncode($this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->SearchValue);
            $this->ANXIOUSTOCONCEIVEFOR->PlaceHolder = RemoveHtml($this->ANXIOUSTOCONCEIVEFOR->caption());

            // AMH ( NG/ML)
            $this->AMHNGML->EditAttrs["class"] = "form-control";
            $this->AMHNGML->EditCustomAttributes = "";
            if (!$this->AMHNGML->Raw) {
                $this->AMHNGML->AdvancedSearch->SearchValue = HtmlDecode($this->AMHNGML->AdvancedSearch->SearchValue);
            }
            $this->AMHNGML->EditValue = HtmlEncode($this->AMHNGML->AdvancedSearch->SearchValue);
            $this->AMHNGML->PlaceHolder = RemoveHtml($this->AMHNGML->caption());

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->EditAttrs["class"] = "form-control";
            $this->TUBAL_PATENCY->EditCustomAttributes = "";
            if (!$this->TUBAL_PATENCY->Raw) {
                $this->TUBAL_PATENCY->AdvancedSearch->SearchValue = HtmlDecode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
            }
            $this->TUBAL_PATENCY->EditValue = HtmlEncode($this->TUBAL_PATENCY->AdvancedSearch->SearchValue);
            $this->TUBAL_PATENCY->PlaceHolder = RemoveHtml($this->TUBAL_PATENCY->caption());

            // HSG
            $this->HSG->EditAttrs["class"] = "form-control";
            $this->HSG->EditCustomAttributes = "";
            if (!$this->HSG->Raw) {
                $this->HSG->AdvancedSearch->SearchValue = HtmlDecode($this->HSG->AdvancedSearch->SearchValue);
            }
            $this->HSG->EditValue = HtmlEncode($this->HSG->AdvancedSearch->SearchValue);
            $this->HSG->PlaceHolder = RemoveHtml($this->HSG->caption());

            // DHL
            $this->DHL->EditAttrs["class"] = "form-control";
            $this->DHL->EditCustomAttributes = "";
            if (!$this->DHL->Raw) {
                $this->DHL->AdvancedSearch->SearchValue = HtmlDecode($this->DHL->AdvancedSearch->SearchValue);
            }
            $this->DHL->EditValue = HtmlEncode($this->DHL->AdvancedSearch->SearchValue);
            $this->DHL->PlaceHolder = RemoveHtml($this->DHL->caption());

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->UTERINE_PROBLEMS->EditCustomAttributes = "";
            if (!$this->UTERINE_PROBLEMS->Raw) {
                $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->UTERINE_PROBLEMS->EditValue = HtmlEncode($this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue);
            $this->UTERINE_PROBLEMS->PlaceHolder = RemoveHtml($this->UTERINE_PROBLEMS->caption());

            // W_COMORBIDS
            $this->W_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->W_COMORBIDS->EditCustomAttributes = "";
            if (!$this->W_COMORBIDS->Raw) {
                $this->W_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
            }
            $this->W_COMORBIDS->EditValue = HtmlEncode($this->W_COMORBIDS->AdvancedSearch->SearchValue);
            $this->W_COMORBIDS->PlaceHolder = RemoveHtml($this->W_COMORBIDS->caption());

            // H_COMORBIDS
            $this->H_COMORBIDS->EditAttrs["class"] = "form-control";
            $this->H_COMORBIDS->EditCustomAttributes = "";
            if (!$this->H_COMORBIDS->Raw) {
                $this->H_COMORBIDS->AdvancedSearch->SearchValue = HtmlDecode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
            }
            $this->H_COMORBIDS->EditValue = HtmlEncode($this->H_COMORBIDS->AdvancedSearch->SearchValue);
            $this->H_COMORBIDS->PlaceHolder = RemoveHtml($this->H_COMORBIDS->caption());

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->EditAttrs["class"] = "form-control";
            $this->SEXUAL_DYSFUNCTION->EditCustomAttributes = "";
            if (!$this->SEXUAL_DYSFUNCTION->Raw) {
                $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = HtmlDecode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
            }
            $this->SEXUAL_DYSFUNCTION->EditValue = HtmlEncode($this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue);
            $this->SEXUAL_DYSFUNCTION->PlaceHolder = RemoveHtml($this->SEXUAL_DYSFUNCTION->caption());

            // PREV IUI
            $this->PREVIUI->EditAttrs["class"] = "form-control";
            $this->PREVIUI->EditCustomAttributes = "";
            if (!$this->PREVIUI->Raw) {
                $this->PREVIUI->AdvancedSearch->SearchValue = HtmlDecode($this->PREVIUI->AdvancedSearch->SearchValue);
            }
            $this->PREVIUI->EditValue = HtmlEncode($this->PREVIUI->AdvancedSearch->SearchValue);
            $this->PREVIUI->PlaceHolder = RemoveHtml($this->PREVIUI->caption());

            // PREV_IVF
            $this->PREV_IVF->EditAttrs["class"] = "form-control";
            $this->PREV_IVF->EditCustomAttributes = "";
            $this->PREV_IVF->EditValue = HtmlEncode($this->PREV_IVF->AdvancedSearch->SearchValue);
            $this->PREV_IVF->PlaceHolder = RemoveHtml($this->PREV_IVF->caption());

            // TABLETS
            $this->TABLETS->EditAttrs["class"] = "form-control";
            $this->TABLETS->EditCustomAttributes = "";
            if (!$this->TABLETS->Raw) {
                $this->TABLETS->AdvancedSearch->SearchValue = HtmlDecode($this->TABLETS->AdvancedSearch->SearchValue);
            }
            $this->TABLETS->EditValue = HtmlEncode($this->TABLETS->AdvancedSearch->SearchValue);
            $this->TABLETS->PlaceHolder = RemoveHtml($this->TABLETS->caption());

            // INJTYPE
            $this->INJTYPE->EditAttrs["class"] = "form-control";
            $this->INJTYPE->EditCustomAttributes = "";
            if (!$this->INJTYPE->Raw) {
                $this->INJTYPE->AdvancedSearch->SearchValue = HtmlDecode($this->INJTYPE->AdvancedSearch->SearchValue);
            }
            $this->INJTYPE->EditValue = HtmlEncode($this->INJTYPE->AdvancedSearch->SearchValue);
            $this->INJTYPE->PlaceHolder = RemoveHtml($this->INJTYPE->caption());

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            $this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 0), 8));
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // TRIGGERR
            $this->TRIGGERR->EditAttrs["class"] = "form-control";
            $this->TRIGGERR->EditCustomAttributes = "";
            if (!$this->TRIGGERR->Raw) {
                $this->TRIGGERR->AdvancedSearch->SearchValue = HtmlDecode($this->TRIGGERR->AdvancedSearch->SearchValue);
            }
            $this->TRIGGERR->EditValue = HtmlEncode($this->TRIGGERR->AdvancedSearch->SearchValue);
            $this->TRIGGERR->PlaceHolder = RemoveHtml($this->TRIGGERR->caption());

            // TRIGGERDATE
            $this->TRIGGERDATE->EditAttrs["class"] = "form-control";
            $this->TRIGGERDATE->EditCustomAttributes = "";
            $this->TRIGGERDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TRIGGERDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->TRIGGERDATE->PlaceHolder = RemoveHtml($this->TRIGGERDATE->caption());

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->EditAttrs["class"] = "form-control";
            $this->FOLLICLE_STATUS->EditCustomAttributes = "";
            if (!$this->FOLLICLE_STATUS->Raw) {
                $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = HtmlDecode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
            }
            $this->FOLLICLE_STATUS->EditValue = HtmlEncode($this->FOLLICLE_STATUS->AdvancedSearch->SearchValue);
            $this->FOLLICLE_STATUS->PlaceHolder = RemoveHtml($this->FOLLICLE_STATUS->caption());

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->EditAttrs["class"] = "form-control";
            $this->NUMBER_OF_IUI->EditCustomAttributes = "";
            if (!$this->NUMBER_OF_IUI->Raw) {
                $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = HtmlDecode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
            }
            $this->NUMBER_OF_IUI->EditValue = HtmlEncode($this->NUMBER_OF_IUI->AdvancedSearch->SearchValue);
            $this->NUMBER_OF_IUI->PlaceHolder = RemoveHtml($this->NUMBER_OF_IUI->caption());

            // PROCEDURE
            $this->PROCEDURE->EditAttrs["class"] = "form-control";
            $this->PROCEDURE->EditCustomAttributes = "";
            if (!$this->PROCEDURE->Raw) {
                $this->PROCEDURE->AdvancedSearch->SearchValue = HtmlDecode($this->PROCEDURE->AdvancedSearch->SearchValue);
            }
            $this->PROCEDURE->EditValue = HtmlEncode($this->PROCEDURE->AdvancedSearch->SearchValue);
            $this->PROCEDURE->PlaceHolder = RemoveHtml($this->PROCEDURE->caption());

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->EditAttrs["class"] = "form-control";
            $this->LUTEAL_SUPPORT->EditCustomAttributes = "";
            if (!$this->LUTEAL_SUPPORT->Raw) {
                $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = HtmlDecode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
            }
            $this->LUTEAL_SUPPORT->EditValue = HtmlEncode($this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue);
            $this->LUTEAL_SUPPORT->PlaceHolder = RemoveHtml($this->LUTEAL_SUPPORT->caption());

            // H/D SAMPLE
            $this->HDSAMPLE->EditAttrs["class"] = "form-control";
            $this->HDSAMPLE->EditCustomAttributes = "";
            if (!$this->HDSAMPLE->Raw) {
                $this->HDSAMPLE->AdvancedSearch->SearchValue = HtmlDecode($this->HDSAMPLE->AdvancedSearch->SearchValue);
            }
            $this->HDSAMPLE->EditValue = HtmlEncode($this->HDSAMPLE->AdvancedSearch->SearchValue);
            $this->HDSAMPLE->PlaceHolder = RemoveHtml($this->HDSAMPLE->caption());

            // DONOR - I.D
            $this->DONORID->EditAttrs["class"] = "form-control";
            $this->DONORID->EditCustomAttributes = "";
            $this->DONORID->EditValue = HtmlEncode($this->DONORID->AdvancedSearch->SearchValue);
            $this->DONORID->PlaceHolder = RemoveHtml($this->DONORID->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // COLLECTION  METHOD
            $this->COLLECTIONMETHOD->EditAttrs["class"] = "form-control";
            $this->COLLECTIONMETHOD->EditCustomAttributes = "";
            if (!$this->COLLECTIONMETHOD->Raw) {
                $this->COLLECTIONMETHOD->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTIONMETHOD->AdvancedSearch->SearchValue);
            }
            $this->COLLECTIONMETHOD->EditValue = HtmlEncode($this->COLLECTIONMETHOD->AdvancedSearch->SearchValue);
            $this->COLLECTIONMETHOD->PlaceHolder = RemoveHtml($this->COLLECTIONMETHOD->caption());

            // SAMPLE SOURCE
            $this->SAMPLESOURCE->EditAttrs["class"] = "form-control";
            $this->SAMPLESOURCE->EditCustomAttributes = "";
            if (!$this->SAMPLESOURCE->Raw) {
                $this->SAMPLESOURCE->AdvancedSearch->SearchValue = HtmlDecode($this->SAMPLESOURCE->AdvancedSearch->SearchValue);
            }
            $this->SAMPLESOURCE->EditValue = HtmlEncode($this->SAMPLESOURCE->AdvancedSearch->SearchValue);
            $this->SAMPLESOURCE->PlaceHolder = RemoveHtml($this->SAMPLESOURCE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            if (!$this->SPECIFIC_PROBLEMS->Raw) {
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->SPECIFIC_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue);
            $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

            // IMSC_1
            $this->IMSC_1->EditAttrs["class"] = "form-control";
            $this->IMSC_1->EditCustomAttributes = "";
            if (!$this->IMSC_1->Raw) {
                $this->IMSC_1->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_1->AdvancedSearch->SearchValue);
            }
            $this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->AdvancedSearch->SearchValue);
            $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

            // IMSC_2
            $this->IMSC_2->EditAttrs["class"] = "form-control";
            $this->IMSC_2->EditCustomAttributes = "";
            if (!$this->IMSC_2->Raw) {
                $this->IMSC_2->AdvancedSearch->SearchValue = HtmlDecode($this->IMSC_2->AdvancedSearch->SearchValue);
            }
            $this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->AdvancedSearch->SearchValue);
            $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
            $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
            if (!$this->LIQUIFACTION_STORAGE->Raw) {
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = HtmlDecode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
            }
            $this->LIQUIFACTION_STORAGE->EditValue = HtmlEncode($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            if (!$this->IUI_PREP_METHOD->Raw) {
                $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = HtmlDecode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
            }
            $this->IUI_PREP_METHOD->EditValue = HtmlEncode($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            if (!$this->TIME_FROM_TRIGGER->Raw) {
                $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
            }
            $this->TIME_FROM_TRIGGER->EditValue = HtmlEncode($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            if (!$this->COLLECTION_TO_PREPARATION->Raw) {
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = HtmlDecode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
            }
            $this->COLLECTION_TO_PREPARATION->EditValue = HtmlEncode($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
            }
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditCustomAttributes = "";
            if (!$this->SPECIFIC_MATERNAL_PROBLEMS->Raw) {
                $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = HtmlDecode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
            }
            $this->SPECIFIC_MATERNAL_PROBLEMS->EditValue = HtmlEncode($this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue);
            $this->SPECIFIC_MATERNAL_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_MATERNAL_PROBLEMS->caption());

            // RESULTS
            $this->RESULTS->EditAttrs["class"] = "form-control";
            $this->RESULTS->EditCustomAttributes = "";
            $this->RESULTS->EditValue = HtmlEncode($this->RESULTS->AdvancedSearch->SearchValue);
            $this->RESULTS->PlaceHolder = RemoveHtml($this->RESULTS->caption());

            // ONGOING_PREG
            $this->ONGOING_PREG->EditAttrs["class"] = "form-control";
            $this->ONGOING_PREG->EditCustomAttributes = "";
            if (!$this->ONGOING_PREG->Raw) {
                $this->ONGOING_PREG->AdvancedSearch->SearchValue = HtmlDecode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
            }
            $this->ONGOING_PREG->EditValue = HtmlEncode($this->ONGOING_PREG->AdvancedSearch->SearchValue);
            $this->ONGOING_PREG->PlaceHolder = RemoveHtml($this->ONGOING_PREG->caption());

            // EDD_Date
            $this->EDD_Date->EditAttrs["class"] = "form-control";
            $this->EDD_Date->EditCustomAttributes = "";
            $this->EDD_Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue, 0), 8));
            $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
            $this->EDD_Date->EditAttrs["class"] = "form-control";
            $this->EDD_Date->EditCustomAttributes = "";
            $this->EDD_Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD_Date->AdvancedSearch->SearchValue2, 0), 8));
            $this->EDD_Date->PlaceHolder = RemoveHtml($this->EDD_Date->caption());
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
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue)) {
            $this->EDD_Date->addErrorMessage($this->EDD_Date->getErrorMessage(false));
        }
        if (!CheckDate($this->EDD_Date->AdvancedSearch->SearchValue2)) {
            $this->EDD_Date->addErrorMessage($this->EDD_Date->getErrorMessage(false));
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
        $this->NAME->AdvancedSearch->load();
        $this->HUSBANDNAME->AdvancedSearch->load();
        $this->CoupleID->AdvancedSearch->load();
        $this->AGEWIFE->AdvancedSearch->load();
        $this->AGEHUSBAND->AdvancedSearch->load();
        $this->ANXIOUSTOCONCEIVEFOR->AdvancedSearch->load();
        $this->AMHNGML->AdvancedSearch->load();
        $this->TUBAL_PATENCY->AdvancedSearch->load();
        $this->HSG->AdvancedSearch->load();
        $this->DHL->AdvancedSearch->load();
        $this->UTERINE_PROBLEMS->AdvancedSearch->load();
        $this->W_COMORBIDS->AdvancedSearch->load();
        $this->H_COMORBIDS->AdvancedSearch->load();
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->load();
        $this->PREVIUI->AdvancedSearch->load();
        $this->PREV_IVF->AdvancedSearch->load();
        $this->TABLETS->AdvancedSearch->load();
        $this->INJTYPE->AdvancedSearch->load();
        $this->LMP->AdvancedSearch->load();
        $this->TRIGGERR->AdvancedSearch->load();
        $this->TRIGGERDATE->AdvancedSearch->load();
        $this->FOLLICLE_STATUS->AdvancedSearch->load();
        $this->NUMBER_OF_IUI->AdvancedSearch->load();
        $this->PROCEDURE->AdvancedSearch->load();
        $this->LUTEAL_SUPPORT->AdvancedSearch->load();
        $this->HDSAMPLE->AdvancedSearch->load();
        $this->DONORID->AdvancedSearch->load();
        $this->PREG_TEST_DATE->AdvancedSearch->load();
        $this->COLLECTIONMETHOD->AdvancedSearch->load();
        $this->SAMPLESOURCE->AdvancedSearch->load();
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
        $this->IMSC_1->AdvancedSearch->load();
        $this->IMSC_2->AdvancedSearch->load();
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
        $this->IUI_PREP_METHOD->AdvancedSearch->load();
        $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->load();
        $this->RESULTS->AdvancedSearch->load();
        $this->ONGOING_PREG->AdvancedSearch->load();
        $this->EDD_Date->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_iui_excellist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_iui_excellist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_iui_excellist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_iui_excel" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_iui_excel\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_iui_excellist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_iui_excellistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"ViewIuiExcelSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_iui_excel\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'ViewIuiExcelSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_iui_excellistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != "" && $this->TotalRecords > 0);

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
