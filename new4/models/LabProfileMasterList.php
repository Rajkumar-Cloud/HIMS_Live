<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabProfileMasterList extends LabProfileMaster
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_profile_master';

    // Page object name
    public $PageObjName = "LabProfileMasterList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "flab_profile_masterlist";
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

        // Table object (lab_profile_master)
        if (!isset($GLOBALS["lab_profile_master"]) || get_class($GLOBALS["lab_profile_master"]) == PROJECT_NAMESPACE . "lab_profile_master") {
            $GLOBALS["lab_profile_master"] = &$this;
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
        $this->AddUrl = "LabProfileMasterAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "LabProfileMasterDelete";
        $this->MultiUpdateUrl = "LabProfileMasterUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_profile_master');
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
        $this->FilterOptions->TagClassName = "ew-filter-option flab_profile_masterlistsrch";

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
                $doc = new $class(Container("lab_profile_master"));
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
        $this->ProfileCode->setVisibility();
        $this->ProfileName->setVisibility();
        $this->ProfileAmount->setVisibility();
        $this->ProfileSpecialAmount->setVisibility();
        $this->ProfileMasterInactive->setVisibility();
        $this->ReagentAmt->setVisibility();
        $this->LabAmt->setVisibility();
        $this->RefAmt->setVisibility();
        $this->MainDeptCD->setVisibility();
        $this->Individual->setVisibility();
        $this->ShortName->setVisibility();
        $this->Note->Visible = false;
        $this->PrevAmt->setVisibility();
        $this->BillName->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->NoHeading->setVisibility();
        $this->EditDate->setVisibility();
        $this->EditUser->setVisibility();
        $this->HISCD->setVisibility();
        $this->PriceList->setVisibility();
        $this->IPAmt->setVisibility();
        $this->IInsAmt->setVisibility();
        $this->ManualCD->setVisibility();
        $this->Free->setVisibility();
        $this->IIpAmt->setVisibility();
        $this->InsAmt->setVisibility();
        $this->OutSource->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "flab_profile_masterlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->ProfileCode->AdvancedSearch->toJson(), ","); // Field ProfileCode
        $filterList = Concat($filterList, $this->ProfileName->AdvancedSearch->toJson(), ","); // Field ProfileName
        $filterList = Concat($filterList, $this->ProfileAmount->AdvancedSearch->toJson(), ","); // Field ProfileAmount
        $filterList = Concat($filterList, $this->ProfileSpecialAmount->AdvancedSearch->toJson(), ","); // Field ProfileSpecialAmount
        $filterList = Concat($filterList, $this->ProfileMasterInactive->AdvancedSearch->toJson(), ","); // Field ProfileMasterInactive
        $filterList = Concat($filterList, $this->ReagentAmt->AdvancedSearch->toJson(), ","); // Field ReagentAmt
        $filterList = Concat($filterList, $this->LabAmt->AdvancedSearch->toJson(), ","); // Field LabAmt
        $filterList = Concat($filterList, $this->RefAmt->AdvancedSearch->toJson(), ","); // Field RefAmt
        $filterList = Concat($filterList, $this->MainDeptCD->AdvancedSearch->toJson(), ","); // Field MainDeptCD
        $filterList = Concat($filterList, $this->Individual->AdvancedSearch->toJson(), ","); // Field Individual
        $filterList = Concat($filterList, $this->ShortName->AdvancedSearch->toJson(), ","); // Field ShortName
        $filterList = Concat($filterList, $this->Note->AdvancedSearch->toJson(), ","); // Field Note
        $filterList = Concat($filterList, $this->PrevAmt->AdvancedSearch->toJson(), ","); // Field PrevAmt
        $filterList = Concat($filterList, $this->BillName->AdvancedSearch->toJson(), ","); // Field BillName
        $filterList = Concat($filterList, $this->ActualAmt->AdvancedSearch->toJson(), ","); // Field ActualAmt
        $filterList = Concat($filterList, $this->NoHeading->AdvancedSearch->toJson(), ","); // Field NoHeading
        $filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
        $filterList = Concat($filterList, $this->EditUser->AdvancedSearch->toJson(), ","); // Field EditUser
        $filterList = Concat($filterList, $this->HISCD->AdvancedSearch->toJson(), ","); // Field HISCD
        $filterList = Concat($filterList, $this->PriceList->AdvancedSearch->toJson(), ","); // Field PriceList
        $filterList = Concat($filterList, $this->IPAmt->AdvancedSearch->toJson(), ","); // Field IPAmt
        $filterList = Concat($filterList, $this->IInsAmt->AdvancedSearch->toJson(), ","); // Field IInsAmt
        $filterList = Concat($filterList, $this->ManualCD->AdvancedSearch->toJson(), ","); // Field ManualCD
        $filterList = Concat($filterList, $this->Free->AdvancedSearch->toJson(), ","); // Field Free
        $filterList = Concat($filterList, $this->IIpAmt->AdvancedSearch->toJson(), ","); // Field IIpAmt
        $filterList = Concat($filterList, $this->InsAmt->AdvancedSearch->toJson(), ","); // Field InsAmt
        $filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
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
            $UserProfile->setSearchFilters(CurrentUserName(), "flab_profile_masterlistsrch", $filters);
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

        // Field ProfileCode
        $this->ProfileCode->AdvancedSearch->SearchValue = @$filter["x_ProfileCode"];
        $this->ProfileCode->AdvancedSearch->SearchOperator = @$filter["z_ProfileCode"];
        $this->ProfileCode->AdvancedSearch->SearchCondition = @$filter["v_ProfileCode"];
        $this->ProfileCode->AdvancedSearch->SearchValue2 = @$filter["y_ProfileCode"];
        $this->ProfileCode->AdvancedSearch->SearchOperator2 = @$filter["w_ProfileCode"];
        $this->ProfileCode->AdvancedSearch->save();

        // Field ProfileName
        $this->ProfileName->AdvancedSearch->SearchValue = @$filter["x_ProfileName"];
        $this->ProfileName->AdvancedSearch->SearchOperator = @$filter["z_ProfileName"];
        $this->ProfileName->AdvancedSearch->SearchCondition = @$filter["v_ProfileName"];
        $this->ProfileName->AdvancedSearch->SearchValue2 = @$filter["y_ProfileName"];
        $this->ProfileName->AdvancedSearch->SearchOperator2 = @$filter["w_ProfileName"];
        $this->ProfileName->AdvancedSearch->save();

        // Field ProfileAmount
        $this->ProfileAmount->AdvancedSearch->SearchValue = @$filter["x_ProfileAmount"];
        $this->ProfileAmount->AdvancedSearch->SearchOperator = @$filter["z_ProfileAmount"];
        $this->ProfileAmount->AdvancedSearch->SearchCondition = @$filter["v_ProfileAmount"];
        $this->ProfileAmount->AdvancedSearch->SearchValue2 = @$filter["y_ProfileAmount"];
        $this->ProfileAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ProfileAmount"];
        $this->ProfileAmount->AdvancedSearch->save();

        // Field ProfileSpecialAmount
        $this->ProfileSpecialAmount->AdvancedSearch->SearchValue = @$filter["x_ProfileSpecialAmount"];
        $this->ProfileSpecialAmount->AdvancedSearch->SearchOperator = @$filter["z_ProfileSpecialAmount"];
        $this->ProfileSpecialAmount->AdvancedSearch->SearchCondition = @$filter["v_ProfileSpecialAmount"];
        $this->ProfileSpecialAmount->AdvancedSearch->SearchValue2 = @$filter["y_ProfileSpecialAmount"];
        $this->ProfileSpecialAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ProfileSpecialAmount"];
        $this->ProfileSpecialAmount->AdvancedSearch->save();

        // Field ProfileMasterInactive
        $this->ProfileMasterInactive->AdvancedSearch->SearchValue = @$filter["x_ProfileMasterInactive"];
        $this->ProfileMasterInactive->AdvancedSearch->SearchOperator = @$filter["z_ProfileMasterInactive"];
        $this->ProfileMasterInactive->AdvancedSearch->SearchCondition = @$filter["v_ProfileMasterInactive"];
        $this->ProfileMasterInactive->AdvancedSearch->SearchValue2 = @$filter["y_ProfileMasterInactive"];
        $this->ProfileMasterInactive->AdvancedSearch->SearchOperator2 = @$filter["w_ProfileMasterInactive"];
        $this->ProfileMasterInactive->AdvancedSearch->save();

        // Field ReagentAmt
        $this->ReagentAmt->AdvancedSearch->SearchValue = @$filter["x_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchOperator = @$filter["z_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchCondition = @$filter["v_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchValue2 = @$filter["y_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->save();

        // Field LabAmt
        $this->LabAmt->AdvancedSearch->SearchValue = @$filter["x_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchOperator = @$filter["z_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchCondition = @$filter["v_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchValue2 = @$filter["y_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchOperator2 = @$filter["w_LabAmt"];
        $this->LabAmt->AdvancedSearch->save();

        // Field RefAmt
        $this->RefAmt->AdvancedSearch->SearchValue = @$filter["x_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchOperator = @$filter["z_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchCondition = @$filter["v_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchValue2 = @$filter["y_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchOperator2 = @$filter["w_RefAmt"];
        $this->RefAmt->AdvancedSearch->save();

        // Field MainDeptCD
        $this->MainDeptCD->AdvancedSearch->SearchValue = @$filter["x_MainDeptCD"];
        $this->MainDeptCD->AdvancedSearch->SearchOperator = @$filter["z_MainDeptCD"];
        $this->MainDeptCD->AdvancedSearch->SearchCondition = @$filter["v_MainDeptCD"];
        $this->MainDeptCD->AdvancedSearch->SearchValue2 = @$filter["y_MainDeptCD"];
        $this->MainDeptCD->AdvancedSearch->SearchOperator2 = @$filter["w_MainDeptCD"];
        $this->MainDeptCD->AdvancedSearch->save();

        // Field Individual
        $this->Individual->AdvancedSearch->SearchValue = @$filter["x_Individual"];
        $this->Individual->AdvancedSearch->SearchOperator = @$filter["z_Individual"];
        $this->Individual->AdvancedSearch->SearchCondition = @$filter["v_Individual"];
        $this->Individual->AdvancedSearch->SearchValue2 = @$filter["y_Individual"];
        $this->Individual->AdvancedSearch->SearchOperator2 = @$filter["w_Individual"];
        $this->Individual->AdvancedSearch->save();

        // Field ShortName
        $this->ShortName->AdvancedSearch->SearchValue = @$filter["x_ShortName"];
        $this->ShortName->AdvancedSearch->SearchOperator = @$filter["z_ShortName"];
        $this->ShortName->AdvancedSearch->SearchCondition = @$filter["v_ShortName"];
        $this->ShortName->AdvancedSearch->SearchValue2 = @$filter["y_ShortName"];
        $this->ShortName->AdvancedSearch->SearchOperator2 = @$filter["w_ShortName"];
        $this->ShortName->AdvancedSearch->save();

        // Field Note
        $this->Note->AdvancedSearch->SearchValue = @$filter["x_Note"];
        $this->Note->AdvancedSearch->SearchOperator = @$filter["z_Note"];
        $this->Note->AdvancedSearch->SearchCondition = @$filter["v_Note"];
        $this->Note->AdvancedSearch->SearchValue2 = @$filter["y_Note"];
        $this->Note->AdvancedSearch->SearchOperator2 = @$filter["w_Note"];
        $this->Note->AdvancedSearch->save();

        // Field PrevAmt
        $this->PrevAmt->AdvancedSearch->SearchValue = @$filter["x_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchOperator = @$filter["z_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchCondition = @$filter["v_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchValue2 = @$filter["y_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchOperator2 = @$filter["w_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->save();

        // Field BillName
        $this->BillName->AdvancedSearch->SearchValue = @$filter["x_BillName"];
        $this->BillName->AdvancedSearch->SearchOperator = @$filter["z_BillName"];
        $this->BillName->AdvancedSearch->SearchCondition = @$filter["v_BillName"];
        $this->BillName->AdvancedSearch->SearchValue2 = @$filter["y_BillName"];
        $this->BillName->AdvancedSearch->SearchOperator2 = @$filter["w_BillName"];
        $this->BillName->AdvancedSearch->save();

        // Field ActualAmt
        $this->ActualAmt->AdvancedSearch->SearchValue = @$filter["x_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator = @$filter["z_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchCondition = @$filter["v_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchValue2 = @$filter["y_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->save();

        // Field NoHeading
        $this->NoHeading->AdvancedSearch->SearchValue = @$filter["x_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator = @$filter["z_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchCondition = @$filter["v_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchValue2 = @$filter["y_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator2 = @$filter["w_NoHeading"];
        $this->NoHeading->AdvancedSearch->save();

        // Field EditDate
        $this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
        $this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
        $this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
        $this->EditDate->AdvancedSearch->save();

        // Field EditUser
        $this->EditUser->AdvancedSearch->SearchValue = @$filter["x_EditUser"];
        $this->EditUser->AdvancedSearch->SearchOperator = @$filter["z_EditUser"];
        $this->EditUser->AdvancedSearch->SearchCondition = @$filter["v_EditUser"];
        $this->EditUser->AdvancedSearch->SearchValue2 = @$filter["y_EditUser"];
        $this->EditUser->AdvancedSearch->SearchOperator2 = @$filter["w_EditUser"];
        $this->EditUser->AdvancedSearch->save();

        // Field HISCD
        $this->HISCD->AdvancedSearch->SearchValue = @$filter["x_HISCD"];
        $this->HISCD->AdvancedSearch->SearchOperator = @$filter["z_HISCD"];
        $this->HISCD->AdvancedSearch->SearchCondition = @$filter["v_HISCD"];
        $this->HISCD->AdvancedSearch->SearchValue2 = @$filter["y_HISCD"];
        $this->HISCD->AdvancedSearch->SearchOperator2 = @$filter["w_HISCD"];
        $this->HISCD->AdvancedSearch->save();

        // Field PriceList
        $this->PriceList->AdvancedSearch->SearchValue = @$filter["x_PriceList"];
        $this->PriceList->AdvancedSearch->SearchOperator = @$filter["z_PriceList"];
        $this->PriceList->AdvancedSearch->SearchCondition = @$filter["v_PriceList"];
        $this->PriceList->AdvancedSearch->SearchValue2 = @$filter["y_PriceList"];
        $this->PriceList->AdvancedSearch->SearchOperator2 = @$filter["w_PriceList"];
        $this->PriceList->AdvancedSearch->save();

        // Field IPAmt
        $this->IPAmt->AdvancedSearch->SearchValue = @$filter["x_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchOperator = @$filter["z_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchCondition = @$filter["v_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchValue2 = @$filter["y_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchOperator2 = @$filter["w_IPAmt"];
        $this->IPAmt->AdvancedSearch->save();

        // Field IInsAmt
        $this->IInsAmt->AdvancedSearch->SearchValue = @$filter["x_IInsAmt"];
        $this->IInsAmt->AdvancedSearch->SearchOperator = @$filter["z_IInsAmt"];
        $this->IInsAmt->AdvancedSearch->SearchCondition = @$filter["v_IInsAmt"];
        $this->IInsAmt->AdvancedSearch->SearchValue2 = @$filter["y_IInsAmt"];
        $this->IInsAmt->AdvancedSearch->SearchOperator2 = @$filter["w_IInsAmt"];
        $this->IInsAmt->AdvancedSearch->save();

        // Field ManualCD
        $this->ManualCD->AdvancedSearch->SearchValue = @$filter["x_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchOperator = @$filter["z_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchCondition = @$filter["v_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchValue2 = @$filter["y_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchOperator2 = @$filter["w_ManualCD"];
        $this->ManualCD->AdvancedSearch->save();

        // Field Free
        $this->Free->AdvancedSearch->SearchValue = @$filter["x_Free"];
        $this->Free->AdvancedSearch->SearchOperator = @$filter["z_Free"];
        $this->Free->AdvancedSearch->SearchCondition = @$filter["v_Free"];
        $this->Free->AdvancedSearch->SearchValue2 = @$filter["y_Free"];
        $this->Free->AdvancedSearch->SearchOperator2 = @$filter["w_Free"];
        $this->Free->AdvancedSearch->save();

        // Field IIpAmt
        $this->IIpAmt->AdvancedSearch->SearchValue = @$filter["x_IIpAmt"];
        $this->IIpAmt->AdvancedSearch->SearchOperator = @$filter["z_IIpAmt"];
        $this->IIpAmt->AdvancedSearch->SearchCondition = @$filter["v_IIpAmt"];
        $this->IIpAmt->AdvancedSearch->SearchValue2 = @$filter["y_IIpAmt"];
        $this->IIpAmt->AdvancedSearch->SearchOperator2 = @$filter["w_IIpAmt"];
        $this->IIpAmt->AdvancedSearch->save();

        // Field InsAmt
        $this->InsAmt->AdvancedSearch->SearchValue = @$filter["x_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchOperator = @$filter["z_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchCondition = @$filter["v_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchValue2 = @$filter["y_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchOperator2 = @$filter["w_InsAmt"];
        $this->InsAmt->AdvancedSearch->save();

        // Field OutSource
        $this->OutSource->AdvancedSearch->SearchValue = @$filter["x_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator = @$filter["z_OutSource"];
        $this->OutSource->AdvancedSearch->SearchCondition = @$filter["v_OutSource"];
        $this->OutSource->AdvancedSearch->SearchValue2 = @$filter["y_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator2 = @$filter["w_OutSource"];
        $this->OutSource->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->ProfileCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProfileName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProfileMasterInactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MainDeptCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Individual, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ShortName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Note, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoHeading, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EditUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HISCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PriceList, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ManualCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Free, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
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
            $this->updateSort($this->id); // id
            $this->updateSort($this->ProfileCode); // ProfileCode
            $this->updateSort($this->ProfileName); // ProfileName
            $this->updateSort($this->ProfileAmount); // ProfileAmount
            $this->updateSort($this->ProfileSpecialAmount); // ProfileSpecialAmount
            $this->updateSort($this->ProfileMasterInactive); // ProfileMasterInactive
            $this->updateSort($this->ReagentAmt); // ReagentAmt
            $this->updateSort($this->LabAmt); // LabAmt
            $this->updateSort($this->RefAmt); // RefAmt
            $this->updateSort($this->MainDeptCD); // MainDeptCD
            $this->updateSort($this->Individual); // Individual
            $this->updateSort($this->ShortName); // ShortName
            $this->updateSort($this->PrevAmt); // PrevAmt
            $this->updateSort($this->BillName); // BillName
            $this->updateSort($this->ActualAmt); // ActualAmt
            $this->updateSort($this->NoHeading); // NoHeading
            $this->updateSort($this->EditDate); // EditDate
            $this->updateSort($this->EditUser); // EditUser
            $this->updateSort($this->HISCD); // HISCD
            $this->updateSort($this->PriceList); // PriceList
            $this->updateSort($this->IPAmt); // IPAmt
            $this->updateSort($this->IInsAmt); // IInsAmt
            $this->updateSort($this->ManualCD); // ManualCD
            $this->updateSort($this->Free); // Free
            $this->updateSort($this->IIpAmt); // IIpAmt
            $this->updateSort($this->InsAmt); // InsAmt
            $this->updateSort($this->OutSource); // OutSource
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
                $this->ProfileCode->setSort("");
                $this->ProfileName->setSort("");
                $this->ProfileAmount->setSort("");
                $this->ProfileSpecialAmount->setSort("");
                $this->ProfileMasterInactive->setSort("");
                $this->ReagentAmt->setSort("");
                $this->LabAmt->setSort("");
                $this->RefAmt->setSort("");
                $this->MainDeptCD->setSort("");
                $this->Individual->setSort("");
                $this->ShortName->setSort("");
                $this->Note->setSort("");
                $this->PrevAmt->setSort("");
                $this->BillName->setSort("");
                $this->ActualAmt->setSort("");
                $this->NoHeading->setSort("");
                $this->EditDate->setSort("");
                $this->EditUser->setSort("");
                $this->HISCD->setSort("");
                $this->PriceList->setSort("");
                $this->IPAmt->setSort("");
                $this->IInsAmt->setSort("");
                $this->ManualCD->setSort("");
                $this->Free->setSort("");
                $this->IIpAmt->setSort("");
                $this->InsAmt->setSort("");
                $this->OutSource->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"flab_profile_masterlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"flab_profile_masterlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.flab_profile_masterlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->id->setDbValue($row['id']);
        $this->ProfileCode->setDbValue($row['ProfileCode']);
        $this->ProfileName->setDbValue($row['ProfileName']);
        $this->ProfileAmount->setDbValue($row['ProfileAmount']);
        $this->ProfileSpecialAmount->setDbValue($row['ProfileSpecialAmount']);
        $this->ProfileMasterInactive->setDbValue($row['ProfileMasterInactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->MainDeptCD->setDbValue($row['MainDeptCD']);
        $this->Individual->setDbValue($row['Individual']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Note->setDbValue($row['Note']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->EditUser->setDbValue($row['EditUser']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->IInsAmt->setDbValue($row['IInsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->IIpAmt->setDbValue($row['IIpAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->OutSource->setDbValue($row['OutSource']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ProfileCode'] = null;
        $row['ProfileName'] = null;
        $row['ProfileAmount'] = null;
        $row['ProfileSpecialAmount'] = null;
        $row['ProfileMasterInactive'] = null;
        $row['ReagentAmt'] = null;
        $row['LabAmt'] = null;
        $row['RefAmt'] = null;
        $row['MainDeptCD'] = null;
        $row['Individual'] = null;
        $row['ShortName'] = null;
        $row['Note'] = null;
        $row['PrevAmt'] = null;
        $row['BillName'] = null;
        $row['ActualAmt'] = null;
        $row['NoHeading'] = null;
        $row['EditDate'] = null;
        $row['EditUser'] = null;
        $row['HISCD'] = null;
        $row['PriceList'] = null;
        $row['IPAmt'] = null;
        $row['IInsAmt'] = null;
        $row['ManualCD'] = null;
        $row['Free'] = null;
        $row['IIpAmt'] = null;
        $row['InsAmt'] = null;
        $row['OutSource'] = null;
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
        if ($this->ProfileAmount->FormValue == $this->ProfileAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileAmount->CurrentValue))) {
            $this->ProfileAmount->CurrentValue = ConvertToFloatString($this->ProfileAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ProfileSpecialAmount->FormValue == $this->ProfileSpecialAmount->CurrentValue && is_numeric(ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue))) {
            $this->ProfileSpecialAmount->CurrentValue = ConvertToFloatString($this->ProfileSpecialAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue))) {
            $this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue))) {
            $this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue))) {
            $this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue))) {
            $this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue))) {
            $this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IInsAmt->FormValue == $this->IInsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IInsAmt->CurrentValue))) {
            $this->IInsAmt->CurrentValue = ConvertToFloatString($this->IInsAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IIpAmt->FormValue == $this->IIpAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IIpAmt->CurrentValue))) {
            $this->IIpAmt->CurrentValue = ConvertToFloatString($this->IIpAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue))) {
            $this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // ProfileCode

        // ProfileName

        // ProfileAmount

        // ProfileSpecialAmount

        // ProfileMasterInactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // MainDeptCD

        // Individual

        // ShortName

        // Note

        // PrevAmt

        // BillName

        // ActualAmt

        // NoHeading

        // EditDate

        // EditUser

        // HISCD

        // PriceList

        // IPAmt

        // IInsAmt

        // ManualCD

        // Free

        // IIpAmt

        // InsAmt

        // OutSource
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ProfileCode
            $this->ProfileCode->ViewValue = $this->ProfileCode->CurrentValue;
            $this->ProfileCode->ViewCustomAttributes = "";

            // ProfileName
            $this->ProfileName->ViewValue = $this->ProfileName->CurrentValue;
            $this->ProfileName->ViewCustomAttributes = "";

            // ProfileAmount
            $this->ProfileAmount->ViewValue = $this->ProfileAmount->CurrentValue;
            $this->ProfileAmount->ViewValue = FormatNumber($this->ProfileAmount->ViewValue, 2, -2, -2, -2);
            $this->ProfileAmount->ViewCustomAttributes = "";

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->ViewValue = $this->ProfileSpecialAmount->CurrentValue;
            $this->ProfileSpecialAmount->ViewValue = FormatNumber($this->ProfileSpecialAmount->ViewValue, 2, -2, -2, -2);
            $this->ProfileSpecialAmount->ViewCustomAttributes = "";

            // ProfileMasterInactive
            $this->ProfileMasterInactive->ViewValue = $this->ProfileMasterInactive->CurrentValue;
            $this->ProfileMasterInactive->ViewCustomAttributes = "";

            // ReagentAmt
            $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
            $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
            $this->ReagentAmt->ViewCustomAttributes = "";

            // LabAmt
            $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
            $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
            $this->LabAmt->ViewCustomAttributes = "";

            // RefAmt
            $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
            $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
            $this->RefAmt->ViewCustomAttributes = "";

            // MainDeptCD
            $this->MainDeptCD->ViewValue = $this->MainDeptCD->CurrentValue;
            $this->MainDeptCD->ViewCustomAttributes = "";

            // Individual
            $this->Individual->ViewValue = $this->Individual->CurrentValue;
            $this->Individual->ViewCustomAttributes = "";

            // ShortName
            $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
            $this->ShortName->ViewCustomAttributes = "";

            // PrevAmt
            $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
            $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevAmt->ViewCustomAttributes = "";

            // BillName
            $this->BillName->ViewValue = $this->BillName->CurrentValue;
            $this->BillName->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // NoHeading
            $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
            $this->NoHeading->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // EditUser
            $this->EditUser->ViewValue = $this->EditUser->CurrentValue;
            $this->EditUser->ViewCustomAttributes = "";

            // HISCD
            $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
            $this->HISCD->ViewCustomAttributes = "";

            // PriceList
            $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
            $this->PriceList->ViewCustomAttributes = "";

            // IPAmt
            $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
            $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
            $this->IPAmt->ViewCustomAttributes = "";

            // IInsAmt
            $this->IInsAmt->ViewValue = $this->IInsAmt->CurrentValue;
            $this->IInsAmt->ViewValue = FormatNumber($this->IInsAmt->ViewValue, 2, -2, -2, -2);
            $this->IInsAmt->ViewCustomAttributes = "";

            // ManualCD
            $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
            $this->ManualCD->ViewCustomAttributes = "";

            // Free
            $this->Free->ViewValue = $this->Free->CurrentValue;
            $this->Free->ViewCustomAttributes = "";

            // IIpAmt
            $this->IIpAmt->ViewValue = $this->IIpAmt->CurrentValue;
            $this->IIpAmt->ViewValue = FormatNumber($this->IIpAmt->ViewValue, 2, -2, -2, -2);
            $this->IIpAmt->ViewCustomAttributes = "";

            // InsAmt
            $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
            $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
            $this->InsAmt->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ProfileCode
            $this->ProfileCode->LinkCustomAttributes = "";
            $this->ProfileCode->HrefValue = "";
            $this->ProfileCode->TooltipValue = "";

            // ProfileName
            $this->ProfileName->LinkCustomAttributes = "";
            $this->ProfileName->HrefValue = "";
            $this->ProfileName->TooltipValue = "";

            // ProfileAmount
            $this->ProfileAmount->LinkCustomAttributes = "";
            $this->ProfileAmount->HrefValue = "";
            $this->ProfileAmount->TooltipValue = "";

            // ProfileSpecialAmount
            $this->ProfileSpecialAmount->LinkCustomAttributes = "";
            $this->ProfileSpecialAmount->HrefValue = "";
            $this->ProfileSpecialAmount->TooltipValue = "";

            // ProfileMasterInactive
            $this->ProfileMasterInactive->LinkCustomAttributes = "";
            $this->ProfileMasterInactive->HrefValue = "";
            $this->ProfileMasterInactive->TooltipValue = "";

            // ReagentAmt
            $this->ReagentAmt->LinkCustomAttributes = "";
            $this->ReagentAmt->HrefValue = "";
            $this->ReagentAmt->TooltipValue = "";

            // LabAmt
            $this->LabAmt->LinkCustomAttributes = "";
            $this->LabAmt->HrefValue = "";
            $this->LabAmt->TooltipValue = "";

            // RefAmt
            $this->RefAmt->LinkCustomAttributes = "";
            $this->RefAmt->HrefValue = "";
            $this->RefAmt->TooltipValue = "";

            // MainDeptCD
            $this->MainDeptCD->LinkCustomAttributes = "";
            $this->MainDeptCD->HrefValue = "";
            $this->MainDeptCD->TooltipValue = "";

            // Individual
            $this->Individual->LinkCustomAttributes = "";
            $this->Individual->HrefValue = "";
            $this->Individual->TooltipValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";
            $this->ShortName->TooltipValue = "";

            // PrevAmt
            $this->PrevAmt->LinkCustomAttributes = "";
            $this->PrevAmt->HrefValue = "";
            $this->PrevAmt->TooltipValue = "";

            // BillName
            $this->BillName->LinkCustomAttributes = "";
            $this->BillName->HrefValue = "";
            $this->BillName->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";
            $this->NoHeading->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // EditUser
            $this->EditUser->LinkCustomAttributes = "";
            $this->EditUser->HrefValue = "";
            $this->EditUser->TooltipValue = "";

            // HISCD
            $this->HISCD->LinkCustomAttributes = "";
            $this->HISCD->HrefValue = "";
            $this->HISCD->TooltipValue = "";

            // PriceList
            $this->PriceList->LinkCustomAttributes = "";
            $this->PriceList->HrefValue = "";
            $this->PriceList->TooltipValue = "";

            // IPAmt
            $this->IPAmt->LinkCustomAttributes = "";
            $this->IPAmt->HrefValue = "";
            $this->IPAmt->TooltipValue = "";

            // IInsAmt
            $this->IInsAmt->LinkCustomAttributes = "";
            $this->IInsAmt->HrefValue = "";
            $this->IInsAmt->TooltipValue = "";

            // ManualCD
            $this->ManualCD->LinkCustomAttributes = "";
            $this->ManualCD->HrefValue = "";
            $this->ManualCD->TooltipValue = "";

            // Free
            $this->Free->LinkCustomAttributes = "";
            $this->Free->HrefValue = "";
            $this->Free->TooltipValue = "";

            // IIpAmt
            $this->IIpAmt->LinkCustomAttributes = "";
            $this->IIpAmt->HrefValue = "";
            $this->IIpAmt->TooltipValue = "";

            // InsAmt
            $this->InsAmt->LinkCustomAttributes = "";
            $this->InsAmt->HrefValue = "";
            $this->InsAmt->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.flab_profile_masterlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.flab_profile_masterlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.flab_profile_masterlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_lab_profile_master" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_lab_profile_master\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.flab_profile_masterlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"flab_profile_masterlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
