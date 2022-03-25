<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class RecruitmentJobList extends RecruitmentJob
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'recruitment_job';

    // Page object name
    public $PageObjName = "RecruitmentJobList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "frecruitment_joblist";
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

        // Table object (recruitment_job)
        if (!isset($GLOBALS["recruitment_job"]) || get_class($GLOBALS["recruitment_job"]) == PROJECT_NAMESPACE . "recruitment_job") {
            $GLOBALS["recruitment_job"] = &$this;
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
        $this->AddUrl = "RecruitmentJobAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "RecruitmentJobDelete";
        $this->MultiUpdateUrl = "RecruitmentJobUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_job');
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
        $this->FilterOptions->TagClassName = "ew-filter-option frecruitment_joblistsrch";

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
                $doc = new $class(Container("recruitment_job"));
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
        $this->id->setVisibility();
        $this->title->setVisibility();
        $this->shortDescription->Visible = false;
        $this->description->Visible = false;
        $this->requirements->Visible = false;
        $this->benefits->Visible = false;
        $this->country->setVisibility();
        $this->company->setVisibility();
        $this->department->setVisibility();
        $this->code->setVisibility();
        $this->employementType->setVisibility();
        $this->industry->setVisibility();
        $this->experienceLevel->setVisibility();
        $this->jobFunction->setVisibility();
        $this->educationLevel->setVisibility();
        $this->currency->setVisibility();
        $this->showSalary->setVisibility();
        $this->salaryMin->setVisibility();
        $this->salaryMax->setVisibility();
        $this->keywords->Visible = false;
        $this->status->setVisibility();
        $this->closingDate->setVisibility();
        $this->attachment->setVisibility();
        $this->display->setVisibility();
        $this->postedBy->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "frecruitment_joblistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
        $filterList = Concat($filterList, $this->shortDescription->AdvancedSearch->toJson(), ","); // Field shortDescription
        $filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
        $filterList = Concat($filterList, $this->requirements->AdvancedSearch->toJson(), ","); // Field requirements
        $filterList = Concat($filterList, $this->benefits->AdvancedSearch->toJson(), ","); // Field benefits
        $filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
        $filterList = Concat($filterList, $this->company->AdvancedSearch->toJson(), ","); // Field company
        $filterList = Concat($filterList, $this->department->AdvancedSearch->toJson(), ","); // Field department
        $filterList = Concat($filterList, $this->code->AdvancedSearch->toJson(), ","); // Field code
        $filterList = Concat($filterList, $this->employementType->AdvancedSearch->toJson(), ","); // Field employementType
        $filterList = Concat($filterList, $this->industry->AdvancedSearch->toJson(), ","); // Field industry
        $filterList = Concat($filterList, $this->experienceLevel->AdvancedSearch->toJson(), ","); // Field experienceLevel
        $filterList = Concat($filterList, $this->jobFunction->AdvancedSearch->toJson(), ","); // Field jobFunction
        $filterList = Concat($filterList, $this->educationLevel->AdvancedSearch->toJson(), ","); // Field educationLevel
        $filterList = Concat($filterList, $this->currency->AdvancedSearch->toJson(), ","); // Field currency
        $filterList = Concat($filterList, $this->showSalary->AdvancedSearch->toJson(), ","); // Field showSalary
        $filterList = Concat($filterList, $this->salaryMin->AdvancedSearch->toJson(), ","); // Field salaryMin
        $filterList = Concat($filterList, $this->salaryMax->AdvancedSearch->toJson(), ","); // Field salaryMax
        $filterList = Concat($filterList, $this->keywords->AdvancedSearch->toJson(), ","); // Field keywords
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->closingDate->AdvancedSearch->toJson(), ","); // Field closingDate
        $filterList = Concat($filterList, $this->attachment->AdvancedSearch->toJson(), ","); // Field attachment
        $filterList = Concat($filterList, $this->display->AdvancedSearch->toJson(), ","); // Field display
        $filterList = Concat($filterList, $this->postedBy->AdvancedSearch->toJson(), ","); // Field postedBy
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
            $UserProfile->setSearchFilters(CurrentUserName(), "frecruitment_joblistsrch", $filters);
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

        // Field title
        $this->title->AdvancedSearch->SearchValue = @$filter["x_title"];
        $this->title->AdvancedSearch->SearchOperator = @$filter["z_title"];
        $this->title->AdvancedSearch->SearchCondition = @$filter["v_title"];
        $this->title->AdvancedSearch->SearchValue2 = @$filter["y_title"];
        $this->title->AdvancedSearch->SearchOperator2 = @$filter["w_title"];
        $this->title->AdvancedSearch->save();

        // Field shortDescription
        $this->shortDescription->AdvancedSearch->SearchValue = @$filter["x_shortDescription"];
        $this->shortDescription->AdvancedSearch->SearchOperator = @$filter["z_shortDescription"];
        $this->shortDescription->AdvancedSearch->SearchCondition = @$filter["v_shortDescription"];
        $this->shortDescription->AdvancedSearch->SearchValue2 = @$filter["y_shortDescription"];
        $this->shortDescription->AdvancedSearch->SearchOperator2 = @$filter["w_shortDescription"];
        $this->shortDescription->AdvancedSearch->save();

        // Field description
        $this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
        $this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
        $this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
        $this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
        $this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
        $this->description->AdvancedSearch->save();

        // Field requirements
        $this->requirements->AdvancedSearch->SearchValue = @$filter["x_requirements"];
        $this->requirements->AdvancedSearch->SearchOperator = @$filter["z_requirements"];
        $this->requirements->AdvancedSearch->SearchCondition = @$filter["v_requirements"];
        $this->requirements->AdvancedSearch->SearchValue2 = @$filter["y_requirements"];
        $this->requirements->AdvancedSearch->SearchOperator2 = @$filter["w_requirements"];
        $this->requirements->AdvancedSearch->save();

        // Field benefits
        $this->benefits->AdvancedSearch->SearchValue = @$filter["x_benefits"];
        $this->benefits->AdvancedSearch->SearchOperator = @$filter["z_benefits"];
        $this->benefits->AdvancedSearch->SearchCondition = @$filter["v_benefits"];
        $this->benefits->AdvancedSearch->SearchValue2 = @$filter["y_benefits"];
        $this->benefits->AdvancedSearch->SearchOperator2 = @$filter["w_benefits"];
        $this->benefits->AdvancedSearch->save();

        // Field country
        $this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
        $this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
        $this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
        $this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
        $this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
        $this->country->AdvancedSearch->save();

        // Field company
        $this->company->AdvancedSearch->SearchValue = @$filter["x_company"];
        $this->company->AdvancedSearch->SearchOperator = @$filter["z_company"];
        $this->company->AdvancedSearch->SearchCondition = @$filter["v_company"];
        $this->company->AdvancedSearch->SearchValue2 = @$filter["y_company"];
        $this->company->AdvancedSearch->SearchOperator2 = @$filter["w_company"];
        $this->company->AdvancedSearch->save();

        // Field department
        $this->department->AdvancedSearch->SearchValue = @$filter["x_department"];
        $this->department->AdvancedSearch->SearchOperator = @$filter["z_department"];
        $this->department->AdvancedSearch->SearchCondition = @$filter["v_department"];
        $this->department->AdvancedSearch->SearchValue2 = @$filter["y_department"];
        $this->department->AdvancedSearch->SearchOperator2 = @$filter["w_department"];
        $this->department->AdvancedSearch->save();

        // Field code
        $this->code->AdvancedSearch->SearchValue = @$filter["x_code"];
        $this->code->AdvancedSearch->SearchOperator = @$filter["z_code"];
        $this->code->AdvancedSearch->SearchCondition = @$filter["v_code"];
        $this->code->AdvancedSearch->SearchValue2 = @$filter["y_code"];
        $this->code->AdvancedSearch->SearchOperator2 = @$filter["w_code"];
        $this->code->AdvancedSearch->save();

        // Field employementType
        $this->employementType->AdvancedSearch->SearchValue = @$filter["x_employementType"];
        $this->employementType->AdvancedSearch->SearchOperator = @$filter["z_employementType"];
        $this->employementType->AdvancedSearch->SearchCondition = @$filter["v_employementType"];
        $this->employementType->AdvancedSearch->SearchValue2 = @$filter["y_employementType"];
        $this->employementType->AdvancedSearch->SearchOperator2 = @$filter["w_employementType"];
        $this->employementType->AdvancedSearch->save();

        // Field industry
        $this->industry->AdvancedSearch->SearchValue = @$filter["x_industry"];
        $this->industry->AdvancedSearch->SearchOperator = @$filter["z_industry"];
        $this->industry->AdvancedSearch->SearchCondition = @$filter["v_industry"];
        $this->industry->AdvancedSearch->SearchValue2 = @$filter["y_industry"];
        $this->industry->AdvancedSearch->SearchOperator2 = @$filter["w_industry"];
        $this->industry->AdvancedSearch->save();

        // Field experienceLevel
        $this->experienceLevel->AdvancedSearch->SearchValue = @$filter["x_experienceLevel"];
        $this->experienceLevel->AdvancedSearch->SearchOperator = @$filter["z_experienceLevel"];
        $this->experienceLevel->AdvancedSearch->SearchCondition = @$filter["v_experienceLevel"];
        $this->experienceLevel->AdvancedSearch->SearchValue2 = @$filter["y_experienceLevel"];
        $this->experienceLevel->AdvancedSearch->SearchOperator2 = @$filter["w_experienceLevel"];
        $this->experienceLevel->AdvancedSearch->save();

        // Field jobFunction
        $this->jobFunction->AdvancedSearch->SearchValue = @$filter["x_jobFunction"];
        $this->jobFunction->AdvancedSearch->SearchOperator = @$filter["z_jobFunction"];
        $this->jobFunction->AdvancedSearch->SearchCondition = @$filter["v_jobFunction"];
        $this->jobFunction->AdvancedSearch->SearchValue2 = @$filter["y_jobFunction"];
        $this->jobFunction->AdvancedSearch->SearchOperator2 = @$filter["w_jobFunction"];
        $this->jobFunction->AdvancedSearch->save();

        // Field educationLevel
        $this->educationLevel->AdvancedSearch->SearchValue = @$filter["x_educationLevel"];
        $this->educationLevel->AdvancedSearch->SearchOperator = @$filter["z_educationLevel"];
        $this->educationLevel->AdvancedSearch->SearchCondition = @$filter["v_educationLevel"];
        $this->educationLevel->AdvancedSearch->SearchValue2 = @$filter["y_educationLevel"];
        $this->educationLevel->AdvancedSearch->SearchOperator2 = @$filter["w_educationLevel"];
        $this->educationLevel->AdvancedSearch->save();

        // Field currency
        $this->currency->AdvancedSearch->SearchValue = @$filter["x_currency"];
        $this->currency->AdvancedSearch->SearchOperator = @$filter["z_currency"];
        $this->currency->AdvancedSearch->SearchCondition = @$filter["v_currency"];
        $this->currency->AdvancedSearch->SearchValue2 = @$filter["y_currency"];
        $this->currency->AdvancedSearch->SearchOperator2 = @$filter["w_currency"];
        $this->currency->AdvancedSearch->save();

        // Field showSalary
        $this->showSalary->AdvancedSearch->SearchValue = @$filter["x_showSalary"];
        $this->showSalary->AdvancedSearch->SearchOperator = @$filter["z_showSalary"];
        $this->showSalary->AdvancedSearch->SearchCondition = @$filter["v_showSalary"];
        $this->showSalary->AdvancedSearch->SearchValue2 = @$filter["y_showSalary"];
        $this->showSalary->AdvancedSearch->SearchOperator2 = @$filter["w_showSalary"];
        $this->showSalary->AdvancedSearch->save();

        // Field salaryMin
        $this->salaryMin->AdvancedSearch->SearchValue = @$filter["x_salaryMin"];
        $this->salaryMin->AdvancedSearch->SearchOperator = @$filter["z_salaryMin"];
        $this->salaryMin->AdvancedSearch->SearchCondition = @$filter["v_salaryMin"];
        $this->salaryMin->AdvancedSearch->SearchValue2 = @$filter["y_salaryMin"];
        $this->salaryMin->AdvancedSearch->SearchOperator2 = @$filter["w_salaryMin"];
        $this->salaryMin->AdvancedSearch->save();

        // Field salaryMax
        $this->salaryMax->AdvancedSearch->SearchValue = @$filter["x_salaryMax"];
        $this->salaryMax->AdvancedSearch->SearchOperator = @$filter["z_salaryMax"];
        $this->salaryMax->AdvancedSearch->SearchCondition = @$filter["v_salaryMax"];
        $this->salaryMax->AdvancedSearch->SearchValue2 = @$filter["y_salaryMax"];
        $this->salaryMax->AdvancedSearch->SearchOperator2 = @$filter["w_salaryMax"];
        $this->salaryMax->AdvancedSearch->save();

        // Field keywords
        $this->keywords->AdvancedSearch->SearchValue = @$filter["x_keywords"];
        $this->keywords->AdvancedSearch->SearchOperator = @$filter["z_keywords"];
        $this->keywords->AdvancedSearch->SearchCondition = @$filter["v_keywords"];
        $this->keywords->AdvancedSearch->SearchValue2 = @$filter["y_keywords"];
        $this->keywords->AdvancedSearch->SearchOperator2 = @$filter["w_keywords"];
        $this->keywords->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

        // Field closingDate
        $this->closingDate->AdvancedSearch->SearchValue = @$filter["x_closingDate"];
        $this->closingDate->AdvancedSearch->SearchOperator = @$filter["z_closingDate"];
        $this->closingDate->AdvancedSearch->SearchCondition = @$filter["v_closingDate"];
        $this->closingDate->AdvancedSearch->SearchValue2 = @$filter["y_closingDate"];
        $this->closingDate->AdvancedSearch->SearchOperator2 = @$filter["w_closingDate"];
        $this->closingDate->AdvancedSearch->save();

        // Field attachment
        $this->attachment->AdvancedSearch->SearchValue = @$filter["x_attachment"];
        $this->attachment->AdvancedSearch->SearchOperator = @$filter["z_attachment"];
        $this->attachment->AdvancedSearch->SearchCondition = @$filter["v_attachment"];
        $this->attachment->AdvancedSearch->SearchValue2 = @$filter["y_attachment"];
        $this->attachment->AdvancedSearch->SearchOperator2 = @$filter["w_attachment"];
        $this->attachment->AdvancedSearch->save();

        // Field display
        $this->display->AdvancedSearch->SearchValue = @$filter["x_display"];
        $this->display->AdvancedSearch->SearchOperator = @$filter["z_display"];
        $this->display->AdvancedSearch->SearchCondition = @$filter["v_display"];
        $this->display->AdvancedSearch->SearchValue2 = @$filter["y_display"];
        $this->display->AdvancedSearch->SearchOperator2 = @$filter["w_display"];
        $this->display->AdvancedSearch->save();

        // Field postedBy
        $this->postedBy->AdvancedSearch->SearchValue = @$filter["x_postedBy"];
        $this->postedBy->AdvancedSearch->SearchOperator = @$filter["z_postedBy"];
        $this->postedBy->AdvancedSearch->SearchCondition = @$filter["v_postedBy"];
        $this->postedBy->AdvancedSearch->SearchValue2 = @$filter["y_postedBy"];
        $this->postedBy->AdvancedSearch->SearchOperator2 = @$filter["w_postedBy"];
        $this->postedBy->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->title, $default, false); // title
        $this->buildSearchSql($where, $this->shortDescription, $default, false); // shortDescription
        $this->buildSearchSql($where, $this->description, $default, false); // description
        $this->buildSearchSql($where, $this->requirements, $default, false); // requirements
        $this->buildSearchSql($where, $this->benefits, $default, false); // benefits
        $this->buildSearchSql($where, $this->country, $default, false); // country
        $this->buildSearchSql($where, $this->company, $default, false); // company
        $this->buildSearchSql($where, $this->department, $default, false); // department
        $this->buildSearchSql($where, $this->code, $default, false); // code
        $this->buildSearchSql($where, $this->employementType, $default, false); // employementType
        $this->buildSearchSql($where, $this->industry, $default, false); // industry
        $this->buildSearchSql($where, $this->experienceLevel, $default, false); // experienceLevel
        $this->buildSearchSql($where, $this->jobFunction, $default, false); // jobFunction
        $this->buildSearchSql($where, $this->educationLevel, $default, false); // educationLevel
        $this->buildSearchSql($where, $this->currency, $default, false); // currency
        $this->buildSearchSql($where, $this->showSalary, $default, false); // showSalary
        $this->buildSearchSql($where, $this->salaryMin, $default, false); // salaryMin
        $this->buildSearchSql($where, $this->salaryMax, $default, false); // salaryMax
        $this->buildSearchSql($where, $this->keywords, $default, false); // keywords
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->closingDate, $default, false); // closingDate
        $this->buildSearchSql($where, $this->attachment, $default, false); // attachment
        $this->buildSearchSql($where, $this->display, $default, false); // display
        $this->buildSearchSql($where, $this->postedBy, $default, false); // postedBy

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->title->AdvancedSearch->save(); // title
            $this->shortDescription->AdvancedSearch->save(); // shortDescription
            $this->description->AdvancedSearch->save(); // description
            $this->requirements->AdvancedSearch->save(); // requirements
            $this->benefits->AdvancedSearch->save(); // benefits
            $this->country->AdvancedSearch->save(); // country
            $this->company->AdvancedSearch->save(); // company
            $this->department->AdvancedSearch->save(); // department
            $this->code->AdvancedSearch->save(); // code
            $this->employementType->AdvancedSearch->save(); // employementType
            $this->industry->AdvancedSearch->save(); // industry
            $this->experienceLevel->AdvancedSearch->save(); // experienceLevel
            $this->jobFunction->AdvancedSearch->save(); // jobFunction
            $this->educationLevel->AdvancedSearch->save(); // educationLevel
            $this->currency->AdvancedSearch->save(); // currency
            $this->showSalary->AdvancedSearch->save(); // showSalary
            $this->salaryMin->AdvancedSearch->save(); // salaryMin
            $this->salaryMax->AdvancedSearch->save(); // salaryMax
            $this->keywords->AdvancedSearch->save(); // keywords
            $this->status->AdvancedSearch->save(); // status
            $this->closingDate->AdvancedSearch->save(); // closingDate
            $this->attachment->AdvancedSearch->save(); // attachment
            $this->display->AdvancedSearch->save(); // display
            $this->postedBy->AdvancedSearch->save(); // postedBy
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
        $this->buildBasicSearchSql($where, $this->title, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->shortDescription, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->requirements, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->benefits, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->department, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->code, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->keywords, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->attachment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->display, $arKeywords, $type);
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
        if ($this->title->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->shortDescription->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->description->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->requirements->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->benefits->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->country->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->company->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->department->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->code->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->employementType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->industry->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->experienceLevel->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->jobFunction->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->educationLevel->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->currency->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->showSalary->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->salaryMin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->salaryMax->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->keywords->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->closingDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->attachment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->display->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->postedBy->AdvancedSearch->issetSession()) {
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
                $this->title->AdvancedSearch->unsetSession();
                $this->shortDescription->AdvancedSearch->unsetSession();
                $this->description->AdvancedSearch->unsetSession();
                $this->requirements->AdvancedSearch->unsetSession();
                $this->benefits->AdvancedSearch->unsetSession();
                $this->country->AdvancedSearch->unsetSession();
                $this->company->AdvancedSearch->unsetSession();
                $this->department->AdvancedSearch->unsetSession();
                $this->code->AdvancedSearch->unsetSession();
                $this->employementType->AdvancedSearch->unsetSession();
                $this->industry->AdvancedSearch->unsetSession();
                $this->experienceLevel->AdvancedSearch->unsetSession();
                $this->jobFunction->AdvancedSearch->unsetSession();
                $this->educationLevel->AdvancedSearch->unsetSession();
                $this->currency->AdvancedSearch->unsetSession();
                $this->showSalary->AdvancedSearch->unsetSession();
                $this->salaryMin->AdvancedSearch->unsetSession();
                $this->salaryMax->AdvancedSearch->unsetSession();
                $this->keywords->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->closingDate->AdvancedSearch->unsetSession();
                $this->attachment->AdvancedSearch->unsetSession();
                $this->display->AdvancedSearch->unsetSession();
                $this->postedBy->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->title->AdvancedSearch->load();
                $this->shortDescription->AdvancedSearch->load();
                $this->description->AdvancedSearch->load();
                $this->requirements->AdvancedSearch->load();
                $this->benefits->AdvancedSearch->load();
                $this->country->AdvancedSearch->load();
                $this->company->AdvancedSearch->load();
                $this->department->AdvancedSearch->load();
                $this->code->AdvancedSearch->load();
                $this->employementType->AdvancedSearch->load();
                $this->industry->AdvancedSearch->load();
                $this->experienceLevel->AdvancedSearch->load();
                $this->jobFunction->AdvancedSearch->load();
                $this->educationLevel->AdvancedSearch->load();
                $this->currency->AdvancedSearch->load();
                $this->showSalary->AdvancedSearch->load();
                $this->salaryMin->AdvancedSearch->load();
                $this->salaryMax->AdvancedSearch->load();
                $this->keywords->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->closingDate->AdvancedSearch->load();
                $this->attachment->AdvancedSearch->load();
                $this->display->AdvancedSearch->load();
                $this->postedBy->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->title); // title
            $this->updateSort($this->country); // country
            $this->updateSort($this->company); // company
            $this->updateSort($this->department); // department
            $this->updateSort($this->code); // code
            $this->updateSort($this->employementType); // employementType
            $this->updateSort($this->industry); // industry
            $this->updateSort($this->experienceLevel); // experienceLevel
            $this->updateSort($this->jobFunction); // jobFunction
            $this->updateSort($this->educationLevel); // educationLevel
            $this->updateSort($this->currency); // currency
            $this->updateSort($this->showSalary); // showSalary
            $this->updateSort($this->salaryMin); // salaryMin
            $this->updateSort($this->salaryMax); // salaryMax
            $this->updateSort($this->status); // status
            $this->updateSort($this->closingDate); // closingDate
            $this->updateSort($this->attachment); // attachment
            $this->updateSort($this->display); // display
            $this->updateSort($this->postedBy); // postedBy
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
                $this->title->setSort("");
                $this->shortDescription->setSort("");
                $this->description->setSort("");
                $this->requirements->setSort("");
                $this->benefits->setSort("");
                $this->country->setSort("");
                $this->company->setSort("");
                $this->department->setSort("");
                $this->code->setSort("");
                $this->employementType->setSort("");
                $this->industry->setSort("");
                $this->experienceLevel->setSort("");
                $this->jobFunction->setSort("");
                $this->educationLevel->setSort("");
                $this->currency->setSort("");
                $this->showSalary->setSort("");
                $this->salaryMin->setSort("");
                $this->salaryMax->setSort("");
                $this->keywords->setSort("");
                $this->status->setSort("");
                $this->closingDate->setSort("");
                $this->attachment->setSort("");
                $this->display->setSort("");
                $this->postedBy->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"frecruitment_joblistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"frecruitment_joblistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.frecruitment_joblist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // title
        if (!$this->isAddOrEdit() && $this->title->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->title->AdvancedSearch->SearchValue != "" || $this->title->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // shortDescription
        if (!$this->isAddOrEdit() && $this->shortDescription->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->shortDescription->AdvancedSearch->SearchValue != "" || $this->shortDescription->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // description
        if (!$this->isAddOrEdit() && $this->description->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->description->AdvancedSearch->SearchValue != "" || $this->description->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // requirements
        if (!$this->isAddOrEdit() && $this->requirements->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->requirements->AdvancedSearch->SearchValue != "" || $this->requirements->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // benefits
        if (!$this->isAddOrEdit() && $this->benefits->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->benefits->AdvancedSearch->SearchValue != "" || $this->benefits->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // company
        if (!$this->isAddOrEdit() && $this->company->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->company->AdvancedSearch->SearchValue != "" || $this->company->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // code
        if (!$this->isAddOrEdit() && $this->code->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->code->AdvancedSearch->SearchValue != "" || $this->code->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // employementType
        if (!$this->isAddOrEdit() && $this->employementType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->employementType->AdvancedSearch->SearchValue != "" || $this->employementType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // industry
        if (!$this->isAddOrEdit() && $this->industry->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->industry->AdvancedSearch->SearchValue != "" || $this->industry->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // experienceLevel
        if (!$this->isAddOrEdit() && $this->experienceLevel->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->experienceLevel->AdvancedSearch->SearchValue != "" || $this->experienceLevel->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // jobFunction
        if (!$this->isAddOrEdit() && $this->jobFunction->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->jobFunction->AdvancedSearch->SearchValue != "" || $this->jobFunction->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // educationLevel
        if (!$this->isAddOrEdit() && $this->educationLevel->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->educationLevel->AdvancedSearch->SearchValue != "" || $this->educationLevel->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // currency
        if (!$this->isAddOrEdit() && $this->currency->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->currency->AdvancedSearch->SearchValue != "" || $this->currency->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // showSalary
        if (!$this->isAddOrEdit() && $this->showSalary->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->showSalary->AdvancedSearch->SearchValue != "" || $this->showSalary->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // salaryMin
        if (!$this->isAddOrEdit() && $this->salaryMin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->salaryMin->AdvancedSearch->SearchValue != "" || $this->salaryMin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // salaryMax
        if (!$this->isAddOrEdit() && $this->salaryMax->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->salaryMax->AdvancedSearch->SearchValue != "" || $this->salaryMax->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // keywords
        if (!$this->isAddOrEdit() && $this->keywords->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->keywords->AdvancedSearch->SearchValue != "" || $this->keywords->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // closingDate
        if (!$this->isAddOrEdit() && $this->closingDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->closingDate->AdvancedSearch->SearchValue != "" || $this->closingDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // attachment
        if (!$this->isAddOrEdit() && $this->attachment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->attachment->AdvancedSearch->SearchValue != "" || $this->attachment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // display
        if (!$this->isAddOrEdit() && $this->display->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->display->AdvancedSearch->SearchValue != "" || $this->display->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // postedBy
        if (!$this->isAddOrEdit() && $this->postedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->postedBy->AdvancedSearch->SearchValue != "" || $this->postedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->title->setDbValue($row['title']);
        $this->shortDescription->setDbValue($row['shortDescription']);
        $this->description->setDbValue($row['description']);
        $this->requirements->setDbValue($row['requirements']);
        $this->benefits->setDbValue($row['benefits']);
        $this->country->setDbValue($row['country']);
        $this->company->setDbValue($row['company']);
        $this->department->setDbValue($row['department']);
        $this->code->setDbValue($row['code']);
        $this->employementType->setDbValue($row['employementType']);
        $this->industry->setDbValue($row['industry']);
        $this->experienceLevel->setDbValue($row['experienceLevel']);
        $this->jobFunction->setDbValue($row['jobFunction']);
        $this->educationLevel->setDbValue($row['educationLevel']);
        $this->currency->setDbValue($row['currency']);
        $this->showSalary->setDbValue($row['showSalary']);
        $this->salaryMin->setDbValue($row['salaryMin']);
        $this->salaryMax->setDbValue($row['salaryMax']);
        $this->keywords->setDbValue($row['keywords']);
        $this->status->setDbValue($row['status']);
        $this->closingDate->setDbValue($row['closingDate']);
        $this->attachment->setDbValue($row['attachment']);
        $this->display->setDbValue($row['display']);
        $this->postedBy->setDbValue($row['postedBy']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['title'] = null;
        $row['shortDescription'] = null;
        $row['description'] = null;
        $row['requirements'] = null;
        $row['benefits'] = null;
        $row['country'] = null;
        $row['company'] = null;
        $row['department'] = null;
        $row['code'] = null;
        $row['employementType'] = null;
        $row['industry'] = null;
        $row['experienceLevel'] = null;
        $row['jobFunction'] = null;
        $row['educationLevel'] = null;
        $row['currency'] = null;
        $row['showSalary'] = null;
        $row['salaryMin'] = null;
        $row['salaryMax'] = null;
        $row['keywords'] = null;
        $row['status'] = null;
        $row['closingDate'] = null;
        $row['attachment'] = null;
        $row['display'] = null;
        $row['postedBy'] = null;
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

        // title

        // shortDescription

        // description

        // requirements

        // benefits

        // country

        // company

        // department

        // code

        // employementType

        // industry

        // experienceLevel

        // jobFunction

        // educationLevel

        // currency

        // showSalary

        // salaryMin

        // salaryMax

        // keywords

        // status

        // closingDate

        // attachment

        // display

        // postedBy
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // title
            $this->title->ViewValue = $this->title->CurrentValue;
            $this->title->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
            $this->country->ViewCustomAttributes = "";

            // company
            $this->company->ViewValue = $this->company->CurrentValue;
            $this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
            $this->company->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewCustomAttributes = "";

            // code
            $this->code->ViewValue = $this->code->CurrentValue;
            $this->code->ViewCustomAttributes = "";

            // employementType
            $this->employementType->ViewValue = $this->employementType->CurrentValue;
            $this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
            $this->employementType->ViewCustomAttributes = "";

            // industry
            $this->industry->ViewValue = $this->industry->CurrentValue;
            $this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
            $this->industry->ViewCustomAttributes = "";

            // experienceLevel
            $this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
            $this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
            $this->experienceLevel->ViewCustomAttributes = "";

            // jobFunction
            $this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
            $this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
            $this->jobFunction->ViewCustomAttributes = "";

            // educationLevel
            $this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
            $this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
            $this->educationLevel->ViewCustomAttributes = "";

            // currency
            $this->currency->ViewValue = $this->currency->CurrentValue;
            $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
            $this->currency->ViewCustomAttributes = "";

            // showSalary
            if (strval($this->showSalary->CurrentValue) != "") {
                $this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
            } else {
                $this->showSalary->ViewValue = null;
            }
            $this->showSalary->ViewCustomAttributes = "";

            // salaryMin
            $this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
            $this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
            $this->salaryMin->ViewCustomAttributes = "";

            // salaryMax
            $this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
            $this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
            $this->salaryMax->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // closingDate
            $this->closingDate->ViewValue = $this->closingDate->CurrentValue;
            $this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
            $this->closingDate->ViewCustomAttributes = "";

            // attachment
            $this->attachment->ViewValue = $this->attachment->CurrentValue;
            $this->attachment->ViewCustomAttributes = "";

            // display
            $this->display->ViewValue = $this->display->CurrentValue;
            $this->display->ViewCustomAttributes = "";

            // postedBy
            $this->postedBy->ViewValue = $this->postedBy->CurrentValue;
            $this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
            $this->postedBy->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";
            $this->company->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // code
            $this->code->LinkCustomAttributes = "";
            $this->code->HrefValue = "";
            $this->code->TooltipValue = "";

            // employementType
            $this->employementType->LinkCustomAttributes = "";
            $this->employementType->HrefValue = "";
            $this->employementType->TooltipValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";
            $this->industry->TooltipValue = "";

            // experienceLevel
            $this->experienceLevel->LinkCustomAttributes = "";
            $this->experienceLevel->HrefValue = "";
            $this->experienceLevel->TooltipValue = "";

            // jobFunction
            $this->jobFunction->LinkCustomAttributes = "";
            $this->jobFunction->HrefValue = "";
            $this->jobFunction->TooltipValue = "";

            // educationLevel
            $this->educationLevel->LinkCustomAttributes = "";
            $this->educationLevel->HrefValue = "";
            $this->educationLevel->TooltipValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";
            $this->currency->TooltipValue = "";

            // showSalary
            $this->showSalary->LinkCustomAttributes = "";
            $this->showSalary->HrefValue = "";
            $this->showSalary->TooltipValue = "";

            // salaryMin
            $this->salaryMin->LinkCustomAttributes = "";
            $this->salaryMin->HrefValue = "";
            $this->salaryMin->TooltipValue = "";

            // salaryMax
            $this->salaryMax->LinkCustomAttributes = "";
            $this->salaryMax->HrefValue = "";
            $this->salaryMax->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // closingDate
            $this->closingDate->LinkCustomAttributes = "";
            $this->closingDate->HrefValue = "";
            $this->closingDate->TooltipValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";
            $this->attachment->TooltipValue = "";

            // display
            $this->display->LinkCustomAttributes = "";
            $this->display->HrefValue = "";
            $this->display->TooltipValue = "";

            // postedBy
            $this->postedBy->LinkCustomAttributes = "";
            $this->postedBy->HrefValue = "";
            $this->postedBy->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // title
            $this->title->EditAttrs["class"] = "form-control";
            $this->title->EditCustomAttributes = "";
            if (!$this->title->Raw) {
                $this->title->AdvancedSearch->SearchValue = HtmlDecode($this->title->AdvancedSearch->SearchValue);
            }
            $this->title->EditValue = HtmlEncode($this->title->AdvancedSearch->SearchValue);
            $this->title->PlaceHolder = RemoveHtml($this->title->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            $this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // company
            $this->company->EditAttrs["class"] = "form-control";
            $this->company->EditCustomAttributes = "";
            $this->company->EditValue = HtmlEncode($this->company->AdvancedSearch->SearchValue);
            $this->company->PlaceHolder = RemoveHtml($this->company->caption());

            // department
            $this->department->EditAttrs["class"] = "form-control";
            $this->department->EditCustomAttributes = "";
            if (!$this->department->Raw) {
                $this->department->AdvancedSearch->SearchValue = HtmlDecode($this->department->AdvancedSearch->SearchValue);
            }
            $this->department->EditValue = HtmlEncode($this->department->AdvancedSearch->SearchValue);
            $this->department->PlaceHolder = RemoveHtml($this->department->caption());

            // code
            $this->code->EditAttrs["class"] = "form-control";
            $this->code->EditCustomAttributes = "";
            if (!$this->code->Raw) {
                $this->code->AdvancedSearch->SearchValue = HtmlDecode($this->code->AdvancedSearch->SearchValue);
            }
            $this->code->EditValue = HtmlEncode($this->code->AdvancedSearch->SearchValue);
            $this->code->PlaceHolder = RemoveHtml($this->code->caption());

            // employementType
            $this->employementType->EditAttrs["class"] = "form-control";
            $this->employementType->EditCustomAttributes = "";
            $this->employementType->EditValue = HtmlEncode($this->employementType->AdvancedSearch->SearchValue);
            $this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

            // industry
            $this->industry->EditAttrs["class"] = "form-control";
            $this->industry->EditCustomAttributes = "";
            $this->industry->EditValue = HtmlEncode($this->industry->AdvancedSearch->SearchValue);
            $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

            // experienceLevel
            $this->experienceLevel->EditAttrs["class"] = "form-control";
            $this->experienceLevel->EditCustomAttributes = "";
            $this->experienceLevel->EditValue = HtmlEncode($this->experienceLevel->AdvancedSearch->SearchValue);
            $this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

            // jobFunction
            $this->jobFunction->EditAttrs["class"] = "form-control";
            $this->jobFunction->EditCustomAttributes = "";
            $this->jobFunction->EditValue = HtmlEncode($this->jobFunction->AdvancedSearch->SearchValue);
            $this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

            // educationLevel
            $this->educationLevel->EditAttrs["class"] = "form-control";
            $this->educationLevel->EditCustomAttributes = "";
            $this->educationLevel->EditValue = HtmlEncode($this->educationLevel->AdvancedSearch->SearchValue);
            $this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

            // currency
            $this->currency->EditAttrs["class"] = "form-control";
            $this->currency->EditCustomAttributes = "";
            $this->currency->EditValue = HtmlEncode($this->currency->AdvancedSearch->SearchValue);
            $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

            // showSalary
            $this->showSalary->EditCustomAttributes = "";
            $this->showSalary->EditValue = $this->showSalary->options(false);
            $this->showSalary->PlaceHolder = RemoveHtml($this->showSalary->caption());

            // salaryMin
            $this->salaryMin->EditAttrs["class"] = "form-control";
            $this->salaryMin->EditCustomAttributes = "";
            $this->salaryMin->EditValue = HtmlEncode($this->salaryMin->AdvancedSearch->SearchValue);
            $this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

            // salaryMax
            $this->salaryMax->EditAttrs["class"] = "form-control";
            $this->salaryMax->EditCustomAttributes = "";
            $this->salaryMax->EditValue = HtmlEncode($this->salaryMax->AdvancedSearch->SearchValue);
            $this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // closingDate
            $this->closingDate->EditAttrs["class"] = "form-control";
            $this->closingDate->EditCustomAttributes = "";
            $this->closingDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->closingDate->AdvancedSearch->SearchValue, 0), 8));
            $this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

            // attachment
            $this->attachment->EditAttrs["class"] = "form-control";
            $this->attachment->EditCustomAttributes = "";
            if (!$this->attachment->Raw) {
                $this->attachment->AdvancedSearch->SearchValue = HtmlDecode($this->attachment->AdvancedSearch->SearchValue);
            }
            $this->attachment->EditValue = HtmlEncode($this->attachment->AdvancedSearch->SearchValue);
            $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

            // display
            $this->display->EditAttrs["class"] = "form-control";
            $this->display->EditCustomAttributes = "";
            if (!$this->display->Raw) {
                $this->display->AdvancedSearch->SearchValue = HtmlDecode($this->display->AdvancedSearch->SearchValue);
            }
            $this->display->EditValue = HtmlEncode($this->display->AdvancedSearch->SearchValue);
            $this->display->PlaceHolder = RemoveHtml($this->display->caption());

            // postedBy
            $this->postedBy->EditAttrs["class"] = "form-control";
            $this->postedBy->EditCustomAttributes = "";
            $this->postedBy->EditValue = HtmlEncode($this->postedBy->AdvancedSearch->SearchValue);
            $this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());
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
        $this->title->AdvancedSearch->load();
        $this->shortDescription->AdvancedSearch->load();
        $this->description->AdvancedSearch->load();
        $this->requirements->AdvancedSearch->load();
        $this->benefits->AdvancedSearch->load();
        $this->country->AdvancedSearch->load();
        $this->company->AdvancedSearch->load();
        $this->department->AdvancedSearch->load();
        $this->code->AdvancedSearch->load();
        $this->employementType->AdvancedSearch->load();
        $this->industry->AdvancedSearch->load();
        $this->experienceLevel->AdvancedSearch->load();
        $this->jobFunction->AdvancedSearch->load();
        $this->educationLevel->AdvancedSearch->load();
        $this->currency->AdvancedSearch->load();
        $this->showSalary->AdvancedSearch->load();
        $this->salaryMin->AdvancedSearch->load();
        $this->salaryMax->AdvancedSearch->load();
        $this->keywords->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->closingDate->AdvancedSearch->load();
        $this->attachment->AdvancedSearch->load();
        $this->display->AdvancedSearch->load();
        $this->postedBy->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.frecruitment_joblist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.frecruitment_joblist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.frecruitment_joblist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_recruitment_job" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_recruitment_job\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.frecruitment_joblist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"frecruitment_joblistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_showSalary":
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
