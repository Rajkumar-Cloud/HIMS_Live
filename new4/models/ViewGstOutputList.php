<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewGstOutputList extends ViewGstOutput
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_gst_output';

    // Page object name
    public $PageObjName = "ViewGstOutputList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_gst_outputlist";
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

        // Table object (view_gst_output)
        if (!isset($GLOBALS["view_gst_output"]) || get_class($GLOBALS["view_gst_output"]) == PROJECT_NAMESPACE . "view_gst_output") {
            $GLOBALS["view_gst_output"] = &$this;
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
        $this->AddUrl = "ViewGstOutputAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewGstOutputDelete";
        $this->MultiUpdateUrl = "ViewGstOutputUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_gst_output');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_gst_outputlistsrch";

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
                $doc = new $class(Container("view_gst_output"));
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
        if ($this->isAddOrEdit()) {
            $this->HosoID->Visible = false;
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
        $this->BillDate->setVisibility();
        $this->IP25SGST->setVisibility();
        $this->IP25CGST->setVisibility();
        $this->IP60SGST->setVisibility();
        $this->IP60CGST->setVisibility();
        $this->IP90SGST->setVisibility();
        $this->IP90CGST->setVisibility();
        $this->IP140SGST->setVisibility();
        $this->IP140CGST->setVisibility();
        $this->OP25SGST->setVisibility();
        $this->OP25CGST->setVisibility();
        $this->OP60SGST->setVisibility();
        $this->OP60CGST->setVisibility();
        $this->OP90SGST->setVisibility();
        $this->OP90CGST->setVisibility();
        $this->OP140SGST->setVisibility();
        $this->OP140CGST->setVisibility();
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
            AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(true));

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_gst_outputlistsrch");
        }
        $filterList = Concat($filterList, $this->BillDate->AdvancedSearch->toJson(), ","); // Field BillDate
        $filterList = Concat($filterList, $this->IP25SGST->AdvancedSearch->toJson(), ","); // Field IP 2.5% SGST
        $filterList = Concat($filterList, $this->IP25CGST->AdvancedSearch->toJson(), ","); // Field IP 2.5% CGST
        $filterList = Concat($filterList, $this->IP60SGST->AdvancedSearch->toJson(), ","); // Field IP 6.0% SGST
        $filterList = Concat($filterList, $this->IP60CGST->AdvancedSearch->toJson(), ","); // Field IP 6.0% CGST
        $filterList = Concat($filterList, $this->IP90SGST->AdvancedSearch->toJson(), ","); // Field IP 9.0% SGST
        $filterList = Concat($filterList, $this->IP90CGST->AdvancedSearch->toJson(), ","); // Field IP 9.0% CGST
        $filterList = Concat($filterList, $this->IP140SGST->AdvancedSearch->toJson(), ","); // Field IP 14.0% SGST
        $filterList = Concat($filterList, $this->IP140CGST->AdvancedSearch->toJson(), ","); // Field IP 14.0% CGST
        $filterList = Concat($filterList, $this->OP25SGST->AdvancedSearch->toJson(), ","); // Field OP 2.5% SGST
        $filterList = Concat($filterList, $this->OP25CGST->AdvancedSearch->toJson(), ","); // Field OP 2.5% CGST
        $filterList = Concat($filterList, $this->OP60SGST->AdvancedSearch->toJson(), ","); // Field OP 6.0% SGST
        $filterList = Concat($filterList, $this->OP60CGST->AdvancedSearch->toJson(), ","); // Field OP 6.0% CGST
        $filterList = Concat($filterList, $this->OP90SGST->AdvancedSearch->toJson(), ","); // Field OP 9.0% SGST
        $filterList = Concat($filterList, $this->OP90CGST->AdvancedSearch->toJson(), ","); // Field OP 9.0% CGST
        $filterList = Concat($filterList, $this->OP140SGST->AdvancedSearch->toJson(), ","); // Field OP 14.0% SGST
        $filterList = Concat($filterList, $this->OP140CGST->AdvancedSearch->toJson(), ","); // Field OP 14.0% CGST
        $filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID

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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_gst_outputlistsrch", $filters);
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

        // Field BillDate
        $this->BillDate->AdvancedSearch->SearchValue = @$filter["x_BillDate"];
        $this->BillDate->AdvancedSearch->SearchOperator = @$filter["z_BillDate"];
        $this->BillDate->AdvancedSearch->SearchCondition = @$filter["v_BillDate"];
        $this->BillDate->AdvancedSearch->SearchValue2 = @$filter["y_BillDate"];
        $this->BillDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillDate"];
        $this->BillDate->AdvancedSearch->save();

        // Field IP 2.5% SGST
        $this->IP25SGST->AdvancedSearch->SearchValue = @$filter["x_IP25SGST"];
        $this->IP25SGST->AdvancedSearch->SearchOperator = @$filter["z_IP25SGST"];
        $this->IP25SGST->AdvancedSearch->SearchCondition = @$filter["v_IP25SGST"];
        $this->IP25SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP25SGST"];
        $this->IP25SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP25SGST"];
        $this->IP25SGST->AdvancedSearch->save();

        // Field IP 2.5% CGST
        $this->IP25CGST->AdvancedSearch->SearchValue = @$filter["x_IP25CGST"];
        $this->IP25CGST->AdvancedSearch->SearchOperator = @$filter["z_IP25CGST"];
        $this->IP25CGST->AdvancedSearch->SearchCondition = @$filter["v_IP25CGST"];
        $this->IP25CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP25CGST"];
        $this->IP25CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP25CGST"];
        $this->IP25CGST->AdvancedSearch->save();

        // Field IP 6.0% SGST
        $this->IP60SGST->AdvancedSearch->SearchValue = @$filter["x_IP60SGST"];
        $this->IP60SGST->AdvancedSearch->SearchOperator = @$filter["z_IP60SGST"];
        $this->IP60SGST->AdvancedSearch->SearchCondition = @$filter["v_IP60SGST"];
        $this->IP60SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP60SGST"];
        $this->IP60SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP60SGST"];
        $this->IP60SGST->AdvancedSearch->save();

        // Field IP 6.0% CGST
        $this->IP60CGST->AdvancedSearch->SearchValue = @$filter["x_IP60CGST"];
        $this->IP60CGST->AdvancedSearch->SearchOperator = @$filter["z_IP60CGST"];
        $this->IP60CGST->AdvancedSearch->SearchCondition = @$filter["v_IP60CGST"];
        $this->IP60CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP60CGST"];
        $this->IP60CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP60CGST"];
        $this->IP60CGST->AdvancedSearch->save();

        // Field IP 9.0% SGST
        $this->IP90SGST->AdvancedSearch->SearchValue = @$filter["x_IP90SGST"];
        $this->IP90SGST->AdvancedSearch->SearchOperator = @$filter["z_IP90SGST"];
        $this->IP90SGST->AdvancedSearch->SearchCondition = @$filter["v_IP90SGST"];
        $this->IP90SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP90SGST"];
        $this->IP90SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP90SGST"];
        $this->IP90SGST->AdvancedSearch->save();

        // Field IP 9.0% CGST
        $this->IP90CGST->AdvancedSearch->SearchValue = @$filter["x_IP90CGST"];
        $this->IP90CGST->AdvancedSearch->SearchOperator = @$filter["z_IP90CGST"];
        $this->IP90CGST->AdvancedSearch->SearchCondition = @$filter["v_IP90CGST"];
        $this->IP90CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP90CGST"];
        $this->IP90CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP90CGST"];
        $this->IP90CGST->AdvancedSearch->save();

        // Field IP 14.0% SGST
        $this->IP140SGST->AdvancedSearch->SearchValue = @$filter["x_IP140SGST"];
        $this->IP140SGST->AdvancedSearch->SearchOperator = @$filter["z_IP140SGST"];
        $this->IP140SGST->AdvancedSearch->SearchCondition = @$filter["v_IP140SGST"];
        $this->IP140SGST->AdvancedSearch->SearchValue2 = @$filter["y_IP140SGST"];
        $this->IP140SGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP140SGST"];
        $this->IP140SGST->AdvancedSearch->save();

        // Field IP 14.0% CGST
        $this->IP140CGST->AdvancedSearch->SearchValue = @$filter["x_IP140CGST"];
        $this->IP140CGST->AdvancedSearch->SearchOperator = @$filter["z_IP140CGST"];
        $this->IP140CGST->AdvancedSearch->SearchCondition = @$filter["v_IP140CGST"];
        $this->IP140CGST->AdvancedSearch->SearchValue2 = @$filter["y_IP140CGST"];
        $this->IP140CGST->AdvancedSearch->SearchOperator2 = @$filter["w_IP140CGST"];
        $this->IP140CGST->AdvancedSearch->save();

        // Field OP 2.5% SGST
        $this->OP25SGST->AdvancedSearch->SearchValue = @$filter["x_OP25SGST"];
        $this->OP25SGST->AdvancedSearch->SearchOperator = @$filter["z_OP25SGST"];
        $this->OP25SGST->AdvancedSearch->SearchCondition = @$filter["v_OP25SGST"];
        $this->OP25SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP25SGST"];
        $this->OP25SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP25SGST"];
        $this->OP25SGST->AdvancedSearch->save();

        // Field OP 2.5% CGST
        $this->OP25CGST->AdvancedSearch->SearchValue = @$filter["x_OP25CGST"];
        $this->OP25CGST->AdvancedSearch->SearchOperator = @$filter["z_OP25CGST"];
        $this->OP25CGST->AdvancedSearch->SearchCondition = @$filter["v_OP25CGST"];
        $this->OP25CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP25CGST"];
        $this->OP25CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP25CGST"];
        $this->OP25CGST->AdvancedSearch->save();

        // Field OP 6.0% SGST
        $this->OP60SGST->AdvancedSearch->SearchValue = @$filter["x_OP60SGST"];
        $this->OP60SGST->AdvancedSearch->SearchOperator = @$filter["z_OP60SGST"];
        $this->OP60SGST->AdvancedSearch->SearchCondition = @$filter["v_OP60SGST"];
        $this->OP60SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP60SGST"];
        $this->OP60SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP60SGST"];
        $this->OP60SGST->AdvancedSearch->save();

        // Field OP 6.0% CGST
        $this->OP60CGST->AdvancedSearch->SearchValue = @$filter["x_OP60CGST"];
        $this->OP60CGST->AdvancedSearch->SearchOperator = @$filter["z_OP60CGST"];
        $this->OP60CGST->AdvancedSearch->SearchCondition = @$filter["v_OP60CGST"];
        $this->OP60CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP60CGST"];
        $this->OP60CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP60CGST"];
        $this->OP60CGST->AdvancedSearch->save();

        // Field OP 9.0% SGST
        $this->OP90SGST->AdvancedSearch->SearchValue = @$filter["x_OP90SGST"];
        $this->OP90SGST->AdvancedSearch->SearchOperator = @$filter["z_OP90SGST"];
        $this->OP90SGST->AdvancedSearch->SearchCondition = @$filter["v_OP90SGST"];
        $this->OP90SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP90SGST"];
        $this->OP90SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP90SGST"];
        $this->OP90SGST->AdvancedSearch->save();

        // Field OP 9.0% CGST
        $this->OP90CGST->AdvancedSearch->SearchValue = @$filter["x_OP90CGST"];
        $this->OP90CGST->AdvancedSearch->SearchOperator = @$filter["z_OP90CGST"];
        $this->OP90CGST->AdvancedSearch->SearchCondition = @$filter["v_OP90CGST"];
        $this->OP90CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP90CGST"];
        $this->OP90CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP90CGST"];
        $this->OP90CGST->AdvancedSearch->save();

        // Field OP 14.0% SGST
        $this->OP140SGST->AdvancedSearch->SearchValue = @$filter["x_OP140SGST"];
        $this->OP140SGST->AdvancedSearch->SearchOperator = @$filter["z_OP140SGST"];
        $this->OP140SGST->AdvancedSearch->SearchCondition = @$filter["v_OP140SGST"];
        $this->OP140SGST->AdvancedSearch->SearchValue2 = @$filter["y_OP140SGST"];
        $this->OP140SGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP140SGST"];
        $this->OP140SGST->AdvancedSearch->save();

        // Field OP 14.0% CGST
        $this->OP140CGST->AdvancedSearch->SearchValue = @$filter["x_OP140CGST"];
        $this->OP140CGST->AdvancedSearch->SearchOperator = @$filter["z_OP140CGST"];
        $this->OP140CGST->AdvancedSearch->SearchCondition = @$filter["v_OP140CGST"];
        $this->OP140CGST->AdvancedSearch->SearchValue2 = @$filter["y_OP140CGST"];
        $this->OP140CGST->AdvancedSearch->SearchOperator2 = @$filter["w_OP140CGST"];
        $this->OP140CGST->AdvancedSearch->save();

        // Field HosoID
        $this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
        $this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
        $this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
        $this->HosoID->AdvancedSearch->save();
    }

    // Advanced search WHERE clause based on QueryString
    protected function advancedSearchWhere($default = false)
    {
        global $Security;
        $where = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $this->buildSearchSql($where, $this->BillDate, $default, false); // BillDate
        $this->buildSearchSql($where, $this->IP25SGST, $default, false); // IP 2.5% SGST
        $this->buildSearchSql($where, $this->IP25CGST, $default, false); // IP 2.5% CGST
        $this->buildSearchSql($where, $this->IP60SGST, $default, false); // IP 6.0% SGST
        $this->buildSearchSql($where, $this->IP60CGST, $default, false); // IP 6.0% CGST
        $this->buildSearchSql($where, $this->IP90SGST, $default, false); // IP 9.0% SGST
        $this->buildSearchSql($where, $this->IP90CGST, $default, false); // IP 9.0% CGST
        $this->buildSearchSql($where, $this->IP140SGST, $default, false); // IP 14.0% SGST
        $this->buildSearchSql($where, $this->IP140CGST, $default, false); // IP 14.0% CGST
        $this->buildSearchSql($where, $this->OP25SGST, $default, false); // OP 2.5% SGST
        $this->buildSearchSql($where, $this->OP25CGST, $default, false); // OP 2.5% CGST
        $this->buildSearchSql($where, $this->OP60SGST, $default, false); // OP 6.0% SGST
        $this->buildSearchSql($where, $this->OP60CGST, $default, false); // OP 6.0% CGST
        $this->buildSearchSql($where, $this->OP90SGST, $default, false); // OP 9.0% SGST
        $this->buildSearchSql($where, $this->OP90CGST, $default, false); // OP 9.0% CGST
        $this->buildSearchSql($where, $this->OP140SGST, $default, false); // OP 14.0% SGST
        $this->buildSearchSql($where, $this->OP140CGST, $default, false); // OP 14.0% CGST
        $this->buildSearchSql($where, $this->HosoID, $default, false); // HosoID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->BillDate->AdvancedSearch->save(); // BillDate
            $this->IP25SGST->AdvancedSearch->save(); // IP 2.5% SGST
            $this->IP25CGST->AdvancedSearch->save(); // IP 2.5% CGST
            $this->IP60SGST->AdvancedSearch->save(); // IP 6.0% SGST
            $this->IP60CGST->AdvancedSearch->save(); // IP 6.0% CGST
            $this->IP90SGST->AdvancedSearch->save(); // IP 9.0% SGST
            $this->IP90CGST->AdvancedSearch->save(); // IP 9.0% CGST
            $this->IP140SGST->AdvancedSearch->save(); // IP 14.0% SGST
            $this->IP140CGST->AdvancedSearch->save(); // IP 14.0% CGST
            $this->OP25SGST->AdvancedSearch->save(); // OP 2.5% SGST
            $this->OP25CGST->AdvancedSearch->save(); // OP 2.5% CGST
            $this->OP60SGST->AdvancedSearch->save(); // OP 6.0% SGST
            $this->OP60CGST->AdvancedSearch->save(); // OP 6.0% CGST
            $this->OP90SGST->AdvancedSearch->save(); // OP 9.0% SGST
            $this->OP90CGST->AdvancedSearch->save(); // OP 9.0% CGST
            $this->OP140SGST->AdvancedSearch->save(); // OP 14.0% SGST
            $this->OP140CGST->AdvancedSearch->save(); // OP 14.0% CGST
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

    // Check if search parm exists
    protected function checkSearchParms()
    {
        if ($this->BillDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP25SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP25CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP60SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP60CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP90SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP90CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP140SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP140CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP25SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP25CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP60SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP60CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP90SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP90CGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP140SGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OP140CGST->AdvancedSearch->issetSession()) {
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

        // Clear advanced search parameters
        $this->resetAdvancedSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all advanced search parameters
    protected function resetAdvancedSearchParms()
    {
                $this->BillDate->AdvancedSearch->unsetSession();
                $this->IP25SGST->AdvancedSearch->unsetSession();
                $this->IP25CGST->AdvancedSearch->unsetSession();
                $this->IP60SGST->AdvancedSearch->unsetSession();
                $this->IP60CGST->AdvancedSearch->unsetSession();
                $this->IP90SGST->AdvancedSearch->unsetSession();
                $this->IP90CGST->AdvancedSearch->unsetSession();
                $this->IP140SGST->AdvancedSearch->unsetSession();
                $this->IP140CGST->AdvancedSearch->unsetSession();
                $this->OP25SGST->AdvancedSearch->unsetSession();
                $this->OP25CGST->AdvancedSearch->unsetSession();
                $this->OP60SGST->AdvancedSearch->unsetSession();
                $this->OP60CGST->AdvancedSearch->unsetSession();
                $this->OP90SGST->AdvancedSearch->unsetSession();
                $this->OP90CGST->AdvancedSearch->unsetSession();
                $this->OP140SGST->AdvancedSearch->unsetSession();
                $this->OP140CGST->AdvancedSearch->unsetSession();
                $this->HosoID->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore advanced search values
                $this->BillDate->AdvancedSearch->load();
                $this->IP25SGST->AdvancedSearch->load();
                $this->IP25CGST->AdvancedSearch->load();
                $this->IP60SGST->AdvancedSearch->load();
                $this->IP60CGST->AdvancedSearch->load();
                $this->IP90SGST->AdvancedSearch->load();
                $this->IP90CGST->AdvancedSearch->load();
                $this->IP140SGST->AdvancedSearch->load();
                $this->IP140CGST->AdvancedSearch->load();
                $this->OP25SGST->AdvancedSearch->load();
                $this->OP25CGST->AdvancedSearch->load();
                $this->OP60SGST->AdvancedSearch->load();
                $this->OP60CGST->AdvancedSearch->load();
                $this->OP90SGST->AdvancedSearch->load();
                $this->OP90CGST->AdvancedSearch->load();
                $this->OP140SGST->AdvancedSearch->load();
                $this->OP140CGST->AdvancedSearch->load();
                $this->HosoID->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->BillDate); // BillDate
            $this->updateSort($this->IP25SGST); // IP 2.5% SGST
            $this->updateSort($this->IP25CGST); // IP 2.5% CGST
            $this->updateSort($this->IP60SGST); // IP 6.0% SGST
            $this->updateSort($this->IP60CGST); // IP 6.0% CGST
            $this->updateSort($this->IP90SGST); // IP 9.0% SGST
            $this->updateSort($this->IP90CGST); // IP 9.0% CGST
            $this->updateSort($this->IP140SGST); // IP 14.0% SGST
            $this->updateSort($this->IP140CGST); // IP 14.0% CGST
            $this->updateSort($this->OP25SGST); // OP 2.5% SGST
            $this->updateSort($this->OP25CGST); // OP 2.5% CGST
            $this->updateSort($this->OP60SGST); // OP 6.0% SGST
            $this->updateSort($this->OP60CGST); // OP 6.0% CGST
            $this->updateSort($this->OP90SGST); // OP 9.0% SGST
            $this->updateSort($this->OP90CGST); // OP 9.0% CGST
            $this->updateSort($this->OP140SGST); // OP 14.0% SGST
            $this->updateSort($this->OP140CGST); // OP 14.0% CGST
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
                $this->BillDate->setSort("");
                $this->IP25SGST->setSort("");
                $this->IP25CGST->setSort("");
                $this->IP60SGST->setSort("");
                $this->IP60CGST->setSort("");
                $this->IP90SGST->setSort("");
                $this->IP90CGST->setSort("");
                $this->IP140SGST->setSort("");
                $this->IP140CGST->setSort("");
                $this->OP25SGST->setSort("");
                $this->OP25CGST->setSort("");
                $this->OP60SGST->setSort("");
                $this->OP60CGST->setSort("");
                $this->OP90SGST->setSort("");
                $this->OP90CGST->setSort("");
                $this->OP140SGST->setSort("");
                $this->OP140CGST->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_gst_outputlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_gst_outputlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_gst_outputlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

    // Load search values for validation
    protected function loadSearchValues()
    {
        // Load search values
        $hasValue = false;

        // BillDate
        if (!$this->isAddOrEdit() && $this->BillDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillDate->AdvancedSearch->SearchValue != "" || $this->BillDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 2.5% SGST
        if (!$this->isAddOrEdit() && $this->IP25SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP25SGST->AdvancedSearch->SearchValue != "" || $this->IP25SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 2.5% CGST
        if (!$this->isAddOrEdit() && $this->IP25CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP25CGST->AdvancedSearch->SearchValue != "" || $this->IP25CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 6.0% SGST
        if (!$this->isAddOrEdit() && $this->IP60SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP60SGST->AdvancedSearch->SearchValue != "" || $this->IP60SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 6.0% CGST
        if (!$this->isAddOrEdit() && $this->IP60CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP60CGST->AdvancedSearch->SearchValue != "" || $this->IP60CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 9.0% SGST
        if (!$this->isAddOrEdit() && $this->IP90SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP90SGST->AdvancedSearch->SearchValue != "" || $this->IP90SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 9.0% CGST
        if (!$this->isAddOrEdit() && $this->IP90CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP90CGST->AdvancedSearch->SearchValue != "" || $this->IP90CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 14.0% SGST
        if (!$this->isAddOrEdit() && $this->IP140SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP140SGST->AdvancedSearch->SearchValue != "" || $this->IP140SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP 14.0% CGST
        if (!$this->isAddOrEdit() && $this->IP140CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP140CGST->AdvancedSearch->SearchValue != "" || $this->IP140CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 2.5% SGST
        if (!$this->isAddOrEdit() && $this->OP25SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP25SGST->AdvancedSearch->SearchValue != "" || $this->OP25SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 2.5% CGST
        if (!$this->isAddOrEdit() && $this->OP25CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP25CGST->AdvancedSearch->SearchValue != "" || $this->OP25CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 6.0% SGST
        if (!$this->isAddOrEdit() && $this->OP60SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP60SGST->AdvancedSearch->SearchValue != "" || $this->OP60SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 6.0% CGST
        if (!$this->isAddOrEdit() && $this->OP60CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP60CGST->AdvancedSearch->SearchValue != "" || $this->OP60CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 9.0% SGST
        if (!$this->isAddOrEdit() && $this->OP90SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP90SGST->AdvancedSearch->SearchValue != "" || $this->OP90SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 9.0% CGST
        if (!$this->isAddOrEdit() && $this->OP90CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP90CGST->AdvancedSearch->SearchValue != "" || $this->OP90CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 14.0% SGST
        if (!$this->isAddOrEdit() && $this->OP140SGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP140SGST->AdvancedSearch->SearchValue != "" || $this->OP140SGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OP 14.0% CGST
        if (!$this->isAddOrEdit() && $this->OP140CGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OP140CGST->AdvancedSearch->SearchValue != "" || $this->OP140CGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->BillDate->setDbValue($row['BillDate']);
        $this->IP25SGST->setDbValue($row['IP 2.5% SGST']);
        $this->IP25CGST->setDbValue($row['IP 2.5% CGST']);
        $this->IP60SGST->setDbValue($row['IP 6.0% SGST']);
        $this->IP60CGST->setDbValue($row['IP 6.0% CGST']);
        $this->IP90SGST->setDbValue($row['IP 9.0% SGST']);
        $this->IP90CGST->setDbValue($row['IP 9.0% CGST']);
        $this->IP140SGST->setDbValue($row['IP 14.0% SGST']);
        $this->IP140CGST->setDbValue($row['IP 14.0% CGST']);
        $this->OP25SGST->setDbValue($row['OP 2.5% SGST']);
        $this->OP25CGST->setDbValue($row['OP 2.5% CGST']);
        $this->OP60SGST->setDbValue($row['OP 6.0% SGST']);
        $this->OP60CGST->setDbValue($row['OP 6.0% CGST']);
        $this->OP90SGST->setDbValue($row['OP 9.0% SGST']);
        $this->OP90CGST->setDbValue($row['OP 9.0% CGST']);
        $this->OP140SGST->setDbValue($row['OP 14.0% SGST']);
        $this->OP140CGST->setDbValue($row['OP 14.0% CGST']);
        $this->HosoID->setDbValue($row['HosoID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['BillDate'] = null;
        $row['IP 2.5% SGST'] = null;
        $row['IP 2.5% CGST'] = null;
        $row['IP 6.0% SGST'] = null;
        $row['IP 6.0% CGST'] = null;
        $row['IP 9.0% SGST'] = null;
        $row['IP 9.0% CGST'] = null;
        $row['IP 14.0% SGST'] = null;
        $row['IP 14.0% CGST'] = null;
        $row['OP 2.5% SGST'] = null;
        $row['OP 2.5% CGST'] = null;
        $row['OP 6.0% SGST'] = null;
        $row['OP 6.0% CGST'] = null;
        $row['OP 9.0% SGST'] = null;
        $row['OP 9.0% CGST'] = null;
        $row['OP 14.0% SGST'] = null;
        $row['OP 14.0% CGST'] = null;
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
        if ($this->IP25SGST->FormValue == $this->IP25SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP25SGST->CurrentValue))) {
            $this->IP25SGST->CurrentValue = ConvertToFloatString($this->IP25SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP25CGST->FormValue == $this->IP25CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP25CGST->CurrentValue))) {
            $this->IP25CGST->CurrentValue = ConvertToFloatString($this->IP25CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP60SGST->FormValue == $this->IP60SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP60SGST->CurrentValue))) {
            $this->IP60SGST->CurrentValue = ConvertToFloatString($this->IP60SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP60CGST->FormValue == $this->IP60CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP60CGST->CurrentValue))) {
            $this->IP60CGST->CurrentValue = ConvertToFloatString($this->IP60CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP90SGST->FormValue == $this->IP90SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP90SGST->CurrentValue))) {
            $this->IP90SGST->CurrentValue = ConvertToFloatString($this->IP90SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP90CGST->FormValue == $this->IP90CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP90CGST->CurrentValue))) {
            $this->IP90CGST->CurrentValue = ConvertToFloatString($this->IP90CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP140SGST->FormValue == $this->IP140SGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP140SGST->CurrentValue))) {
            $this->IP140SGST->CurrentValue = ConvertToFloatString($this->IP140SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IP140CGST->FormValue == $this->IP140CGST->CurrentValue && is_numeric(ConvertToFloatString($this->IP140CGST->CurrentValue))) {
            $this->IP140CGST->CurrentValue = ConvertToFloatString($this->IP140CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP25SGST->FormValue == $this->OP25SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP25SGST->CurrentValue))) {
            $this->OP25SGST->CurrentValue = ConvertToFloatString($this->OP25SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP25CGST->FormValue == $this->OP25CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP25CGST->CurrentValue))) {
            $this->OP25CGST->CurrentValue = ConvertToFloatString($this->OP25CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP60SGST->FormValue == $this->OP60SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP60SGST->CurrentValue))) {
            $this->OP60SGST->CurrentValue = ConvertToFloatString($this->OP60SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP60CGST->FormValue == $this->OP60CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP60CGST->CurrentValue))) {
            $this->OP60CGST->CurrentValue = ConvertToFloatString($this->OP60CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP90SGST->FormValue == $this->OP90SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP90SGST->CurrentValue))) {
            $this->OP90SGST->CurrentValue = ConvertToFloatString($this->OP90SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP90CGST->FormValue == $this->OP90CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP90CGST->CurrentValue))) {
            $this->OP90CGST->CurrentValue = ConvertToFloatString($this->OP90CGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP140SGST->FormValue == $this->OP140SGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP140SGST->CurrentValue))) {
            $this->OP140SGST->CurrentValue = ConvertToFloatString($this->OP140SGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OP140CGST->FormValue == $this->OP140CGST->CurrentValue && is_numeric(ConvertToFloatString($this->OP140CGST->CurrentValue))) {
            $this->OP140CGST->CurrentValue = ConvertToFloatString($this->OP140CGST->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BillDate

        // IP 2.5% SGST

        // IP 2.5% CGST

        // IP 6.0% SGST

        // IP 6.0% CGST

        // IP 9.0% SGST

        // IP 9.0% CGST

        // IP 14.0% SGST

        // IP 14.0% CGST

        // OP 2.5% SGST

        // OP 2.5% CGST

        // OP 6.0% SGST

        // OP 6.0% CGST

        // OP 9.0% SGST

        // OP 9.0% CGST

        // OP 14.0% SGST

        // OP 14.0% CGST

        // HosoID
        if ($this->RowType == ROWTYPE_VIEW) {
            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 7);
            $this->BillDate->ViewCustomAttributes = "";

            // IP 2.5% SGST
            $this->IP25SGST->ViewValue = $this->IP25SGST->CurrentValue;
            $this->IP25SGST->ViewValue = FormatNumber($this->IP25SGST->ViewValue, 2, -2, -2, -2);
            $this->IP25SGST->ViewCustomAttributes = "";

            // IP 2.5% CGST
            $this->IP25CGST->ViewValue = $this->IP25CGST->CurrentValue;
            $this->IP25CGST->ViewValue = FormatNumber($this->IP25CGST->ViewValue, 2, -2, -2, -2);
            $this->IP25CGST->ViewCustomAttributes = "";

            // IP 6.0% SGST
            $this->IP60SGST->ViewValue = $this->IP60SGST->CurrentValue;
            $this->IP60SGST->ViewValue = FormatNumber($this->IP60SGST->ViewValue, 2, -2, -2, -2);
            $this->IP60SGST->ViewCustomAttributes = "";

            // IP 6.0% CGST
            $this->IP60CGST->ViewValue = $this->IP60CGST->CurrentValue;
            $this->IP60CGST->ViewValue = FormatNumber($this->IP60CGST->ViewValue, 2, -2, -2, -2);
            $this->IP60CGST->ViewCustomAttributes = "";

            // IP 9.0% SGST
            $this->IP90SGST->ViewValue = $this->IP90SGST->CurrentValue;
            $this->IP90SGST->ViewValue = FormatNumber($this->IP90SGST->ViewValue, 2, -2, -2, -2);
            $this->IP90SGST->ViewCustomAttributes = "";

            // IP 9.0% CGST
            $this->IP90CGST->ViewValue = $this->IP90CGST->CurrentValue;
            $this->IP90CGST->ViewValue = FormatNumber($this->IP90CGST->ViewValue, 2, -2, -2, -2);
            $this->IP90CGST->ViewCustomAttributes = "";

            // IP 14.0% SGST
            $this->IP140SGST->ViewValue = $this->IP140SGST->CurrentValue;
            $this->IP140SGST->ViewValue = FormatNumber($this->IP140SGST->ViewValue, 2, -2, -2, -2);
            $this->IP140SGST->ViewCustomAttributes = "";

            // IP 14.0% CGST
            $this->IP140CGST->ViewValue = $this->IP140CGST->CurrentValue;
            $this->IP140CGST->ViewValue = FormatNumber($this->IP140CGST->ViewValue, 2, -2, -2, -2);
            $this->IP140CGST->ViewCustomAttributes = "";

            // OP 2.5% SGST
            $this->OP25SGST->ViewValue = $this->OP25SGST->CurrentValue;
            $this->OP25SGST->ViewValue = FormatNumber($this->OP25SGST->ViewValue, 2, -2, -2, -2);
            $this->OP25SGST->ViewCustomAttributes = "";

            // OP 2.5% CGST
            $this->OP25CGST->ViewValue = $this->OP25CGST->CurrentValue;
            $this->OP25CGST->ViewValue = FormatNumber($this->OP25CGST->ViewValue, 2, -2, -2, -2);
            $this->OP25CGST->ViewCustomAttributes = "";

            // OP 6.0% SGST
            $this->OP60SGST->ViewValue = $this->OP60SGST->CurrentValue;
            $this->OP60SGST->ViewValue = FormatNumber($this->OP60SGST->ViewValue, 2, -2, -2, -2);
            $this->OP60SGST->ViewCustomAttributes = "";

            // OP 6.0% CGST
            $this->OP60CGST->ViewValue = $this->OP60CGST->CurrentValue;
            $this->OP60CGST->ViewValue = FormatNumber($this->OP60CGST->ViewValue, 2, -2, -2, -2);
            $this->OP60CGST->ViewCustomAttributes = "";

            // OP 9.0% SGST
            $this->OP90SGST->ViewValue = $this->OP90SGST->CurrentValue;
            $this->OP90SGST->ViewValue = FormatNumber($this->OP90SGST->ViewValue, 2, -2, -2, -2);
            $this->OP90SGST->ViewCustomAttributes = "";

            // OP 9.0% CGST
            $this->OP90CGST->ViewValue = $this->OP90CGST->CurrentValue;
            $this->OP90CGST->ViewValue = FormatNumber($this->OP90CGST->ViewValue, 2, -2, -2, -2);
            $this->OP90CGST->ViewCustomAttributes = "";

            // OP 14.0% SGST
            $this->OP140SGST->ViewValue = $this->OP140SGST->CurrentValue;
            $this->OP140SGST->ViewValue = FormatNumber($this->OP140SGST->ViewValue, 2, -2, -2, -2);
            $this->OP140SGST->ViewCustomAttributes = "";

            // OP 14.0% CGST
            $this->OP140CGST->ViewValue = $this->OP140CGST->CurrentValue;
            $this->OP140CGST->ViewValue = FormatNumber($this->OP140CGST->ViewValue, 2, -2, -2, -2);
            $this->OP140CGST->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // IP 2.5% SGST
            $this->IP25SGST->LinkCustomAttributes = "";
            $this->IP25SGST->HrefValue = "";
            $this->IP25SGST->TooltipValue = "";

            // IP 2.5% CGST
            $this->IP25CGST->LinkCustomAttributes = "";
            $this->IP25CGST->HrefValue = "";
            $this->IP25CGST->TooltipValue = "";

            // IP 6.0% SGST
            $this->IP60SGST->LinkCustomAttributes = "";
            $this->IP60SGST->HrefValue = "";
            $this->IP60SGST->TooltipValue = "";

            // IP 6.0% CGST
            $this->IP60CGST->LinkCustomAttributes = "";
            $this->IP60CGST->HrefValue = "";
            $this->IP60CGST->TooltipValue = "";

            // IP 9.0% SGST
            $this->IP90SGST->LinkCustomAttributes = "";
            $this->IP90SGST->HrefValue = "";
            $this->IP90SGST->TooltipValue = "";

            // IP 9.0% CGST
            $this->IP90CGST->LinkCustomAttributes = "";
            $this->IP90CGST->HrefValue = "";
            $this->IP90CGST->TooltipValue = "";

            // IP 14.0% SGST
            $this->IP140SGST->LinkCustomAttributes = "";
            $this->IP140SGST->HrefValue = "";
            $this->IP140SGST->TooltipValue = "";

            // IP 14.0% CGST
            $this->IP140CGST->LinkCustomAttributes = "";
            $this->IP140CGST->HrefValue = "";
            $this->IP140CGST->TooltipValue = "";

            // OP 2.5% SGST
            $this->OP25SGST->LinkCustomAttributes = "";
            $this->OP25SGST->HrefValue = "";
            $this->OP25SGST->TooltipValue = "";

            // OP 2.5% CGST
            $this->OP25CGST->LinkCustomAttributes = "";
            $this->OP25CGST->HrefValue = "";
            $this->OP25CGST->TooltipValue = "";

            // OP 6.0% SGST
            $this->OP60SGST->LinkCustomAttributes = "";
            $this->OP60SGST->HrefValue = "";
            $this->OP60SGST->TooltipValue = "";

            // OP 6.0% CGST
            $this->OP60CGST->LinkCustomAttributes = "";
            $this->OP60CGST->HrefValue = "";
            $this->OP60CGST->TooltipValue = "";

            // OP 9.0% SGST
            $this->OP90SGST->LinkCustomAttributes = "";
            $this->OP90SGST->HrefValue = "";
            $this->OP90SGST->TooltipValue = "";

            // OP 9.0% CGST
            $this->OP90CGST->LinkCustomAttributes = "";
            $this->OP90CGST->HrefValue = "";
            $this->OP90CGST->TooltipValue = "";

            // OP 14.0% SGST
            $this->OP140SGST->LinkCustomAttributes = "";
            $this->OP140SGST->HrefValue = "";
            $this->OP140SGST->TooltipValue = "";

            // OP 14.0% CGST
            $this->OP140CGST->LinkCustomAttributes = "";
            $this->OP140CGST->HrefValue = "";
            $this->OP140CGST->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue, 7), 7));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BillDate->AdvancedSearch->SearchValue2, 7), 7));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // IP 2.5% SGST
            $this->IP25SGST->EditAttrs["class"] = "form-control";
            $this->IP25SGST->EditCustomAttributes = "";
            $this->IP25SGST->EditValue = HtmlEncode($this->IP25SGST->AdvancedSearch->SearchValue);
            $this->IP25SGST->PlaceHolder = RemoveHtml($this->IP25SGST->caption());

            // IP 2.5% CGST
            $this->IP25CGST->EditAttrs["class"] = "form-control";
            $this->IP25CGST->EditCustomAttributes = "";
            $this->IP25CGST->EditValue = HtmlEncode($this->IP25CGST->AdvancedSearch->SearchValue);
            $this->IP25CGST->PlaceHolder = RemoveHtml($this->IP25CGST->caption());

            // IP 6.0% SGST
            $this->IP60SGST->EditAttrs["class"] = "form-control";
            $this->IP60SGST->EditCustomAttributes = "";
            $this->IP60SGST->EditValue = HtmlEncode($this->IP60SGST->AdvancedSearch->SearchValue);
            $this->IP60SGST->PlaceHolder = RemoveHtml($this->IP60SGST->caption());

            // IP 6.0% CGST
            $this->IP60CGST->EditAttrs["class"] = "form-control";
            $this->IP60CGST->EditCustomAttributes = "";
            $this->IP60CGST->EditValue = HtmlEncode($this->IP60CGST->AdvancedSearch->SearchValue);
            $this->IP60CGST->PlaceHolder = RemoveHtml($this->IP60CGST->caption());

            // IP 9.0% SGST
            $this->IP90SGST->EditAttrs["class"] = "form-control";
            $this->IP90SGST->EditCustomAttributes = "";
            $this->IP90SGST->EditValue = HtmlEncode($this->IP90SGST->AdvancedSearch->SearchValue);
            $this->IP90SGST->PlaceHolder = RemoveHtml($this->IP90SGST->caption());

            // IP 9.0% CGST
            $this->IP90CGST->EditAttrs["class"] = "form-control";
            $this->IP90CGST->EditCustomAttributes = "";
            $this->IP90CGST->EditValue = HtmlEncode($this->IP90CGST->AdvancedSearch->SearchValue);
            $this->IP90CGST->PlaceHolder = RemoveHtml($this->IP90CGST->caption());

            // IP 14.0% SGST
            $this->IP140SGST->EditAttrs["class"] = "form-control";
            $this->IP140SGST->EditCustomAttributes = "";
            $this->IP140SGST->EditValue = HtmlEncode($this->IP140SGST->AdvancedSearch->SearchValue);
            $this->IP140SGST->PlaceHolder = RemoveHtml($this->IP140SGST->caption());

            // IP 14.0% CGST
            $this->IP140CGST->EditAttrs["class"] = "form-control";
            $this->IP140CGST->EditCustomAttributes = "";
            $this->IP140CGST->EditValue = HtmlEncode($this->IP140CGST->AdvancedSearch->SearchValue);
            $this->IP140CGST->PlaceHolder = RemoveHtml($this->IP140CGST->caption());

            // OP 2.5% SGST
            $this->OP25SGST->EditAttrs["class"] = "form-control";
            $this->OP25SGST->EditCustomAttributes = "";
            $this->OP25SGST->EditValue = HtmlEncode($this->OP25SGST->AdvancedSearch->SearchValue);
            $this->OP25SGST->PlaceHolder = RemoveHtml($this->OP25SGST->caption());

            // OP 2.5% CGST
            $this->OP25CGST->EditAttrs["class"] = "form-control";
            $this->OP25CGST->EditCustomAttributes = "";
            $this->OP25CGST->EditValue = HtmlEncode($this->OP25CGST->AdvancedSearch->SearchValue);
            $this->OP25CGST->PlaceHolder = RemoveHtml($this->OP25CGST->caption());

            // OP 6.0% SGST
            $this->OP60SGST->EditAttrs["class"] = "form-control";
            $this->OP60SGST->EditCustomAttributes = "";
            $this->OP60SGST->EditValue = HtmlEncode($this->OP60SGST->AdvancedSearch->SearchValue);
            $this->OP60SGST->PlaceHolder = RemoveHtml($this->OP60SGST->caption());

            // OP 6.0% CGST
            $this->OP60CGST->EditAttrs["class"] = "form-control";
            $this->OP60CGST->EditCustomAttributes = "";
            $this->OP60CGST->EditValue = HtmlEncode($this->OP60CGST->AdvancedSearch->SearchValue);
            $this->OP60CGST->PlaceHolder = RemoveHtml($this->OP60CGST->caption());

            // OP 9.0% SGST
            $this->OP90SGST->EditAttrs["class"] = "form-control";
            $this->OP90SGST->EditCustomAttributes = "";
            $this->OP90SGST->EditValue = HtmlEncode($this->OP90SGST->AdvancedSearch->SearchValue);
            $this->OP90SGST->PlaceHolder = RemoveHtml($this->OP90SGST->caption());

            // OP 9.0% CGST
            $this->OP90CGST->EditAttrs["class"] = "form-control";
            $this->OP90CGST->EditCustomAttributes = "";
            $this->OP90CGST->EditValue = HtmlEncode($this->OP90CGST->AdvancedSearch->SearchValue);
            $this->OP90CGST->PlaceHolder = RemoveHtml($this->OP90CGST->caption());

            // OP 14.0% SGST
            $this->OP140SGST->EditAttrs["class"] = "form-control";
            $this->OP140SGST->EditCustomAttributes = "";
            $this->OP140SGST->EditValue = HtmlEncode($this->OP140SGST->AdvancedSearch->SearchValue);
            $this->OP140SGST->PlaceHolder = RemoveHtml($this->OP140SGST->caption());

            // OP 14.0% CGST
            $this->OP140CGST->EditAttrs["class"] = "form-control";
            $this->OP140CGST->EditCustomAttributes = "";
            $this->OP140CGST->EditValue = HtmlEncode($this->OP140CGST->AdvancedSearch->SearchValue);
            $this->OP140CGST->PlaceHolder = RemoveHtml($this->OP140CGST->caption());

            // HosoID
            $this->HosoID->EditAttrs["class"] = "form-control";
            $this->HosoID->EditCustomAttributes = "";
            $this->HosoID->EditValue = HtmlEncode($this->HosoID->AdvancedSearch->SearchValue);
            $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());
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
        if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->BillDate->AdvancedSearch->SearchValue2)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
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
        $this->BillDate->AdvancedSearch->load();
        $this->IP25SGST->AdvancedSearch->load();
        $this->IP25CGST->AdvancedSearch->load();
        $this->IP60SGST->AdvancedSearch->load();
        $this->IP60CGST->AdvancedSearch->load();
        $this->IP90SGST->AdvancedSearch->load();
        $this->IP90CGST->AdvancedSearch->load();
        $this->IP140SGST->AdvancedSearch->load();
        $this->IP140CGST->AdvancedSearch->load();
        $this->OP25SGST->AdvancedSearch->load();
        $this->OP25CGST->AdvancedSearch->load();
        $this->OP60SGST->AdvancedSearch->load();
        $this->OP60CGST->AdvancedSearch->load();
        $this->OP90SGST->AdvancedSearch->load();
        $this->OP90CGST->AdvancedSearch->load();
        $this->OP140SGST->AdvancedSearch->load();
        $this->OP140CGST->AdvancedSearch->load();
        $this->HosoID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_gst_outputlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_gst_outputlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_gst_outputlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_gst_output" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_gst_output\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_gst_outputlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_gst_outputlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
