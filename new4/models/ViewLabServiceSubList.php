<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewLabServiceSubList extends ViewLabServiceSub
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_lab_service_sub';

    // Page object name
    public $PageObjName = "ViewLabServiceSubList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_lab_service_sublist";
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

        // Table object (view_lab_service_sub)
        if (!isset($GLOBALS["view_lab_service_sub"]) || get_class($GLOBALS["view_lab_service_sub"]) == PROJECT_NAMESPACE . "view_lab_service_sub") {
            $GLOBALS["view_lab_service_sub"] = &$this;
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
        $this->AddUrl = "ViewLabServiceSubAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewLabServiceSubDelete";
        $this->MultiUpdateUrl = "ViewLabServiceSubUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_service_sub');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_lab_service_sublistsrch";

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
                $doc = new $class(Container("view_lab_service_sub"));
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
            $key .= @$ar['Id'];
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
            $this->Id->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->Created->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->CreatedDateTime->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->Modified->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->ModifiedDateTime->Visible = false;
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
        $this->Id->setVisibility();
        $this->CODE->setVisibility();
        $this->SERVICE->setVisibility();
        $this->UNITS->setVisibility();
        $this->AMOUNT->Visible = false;
        $this->SERVICE_TYPE->Visible = false;
        $this->DEPARTMENT->Visible = false;
        $this->Created->Visible = false;
        $this->CreatedDateTime->Visible = false;
        $this->Modified->Visible = false;
        $this->ModifiedDateTime->Visible = false;
        $this->mas_services_billingcol->Visible = false;
        $this->DrShareAmount->Visible = false;
        $this->HospShareAmount->Visible = false;
        $this->DrSharePer->Visible = false;
        $this->HospSharePer->Visible = false;
        $this->HospID->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->Method->setVisibility();
        $this->Order->setVisibility();
        $this->Form->Visible = false;
        $this->ResType->setVisibility();
        $this->UnitCD->setVisibility();
        $this->RefValue->Visible = false;
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->setVisibility();
        $this->Inactive->setVisibility();
        $this->Outsource->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->Visible = false;
        $this->NoHeading->Visible = false;
        $this->ChemicalCode->Visible = false;
        $this->ChemicalName->Visible = false;
        $this->Utilaization->Visible = false;
        $this->Interpretation->Visible = false;
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
        $this->setupLookupOptions($this->UNITS);
        $this->setupLookupOptions($this->SERVICE_TYPE);

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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_lab_service") {
            $masterTbl = Container("view_lab_service");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewLabServiceList"); // Return to master page
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_lab_service_sublistsrch");
        }
        $filterList = Concat($filterList, $this->Id->AdvancedSearch->toJson(), ","); // Field Id
        $filterList = Concat($filterList, $this->CODE->AdvancedSearch->toJson(), ","); // Field CODE
        $filterList = Concat($filterList, $this->SERVICE->AdvancedSearch->toJson(), ","); // Field SERVICE
        $filterList = Concat($filterList, $this->UNITS->AdvancedSearch->toJson(), ","); // Field UNITS
        $filterList = Concat($filterList, $this->AMOUNT->AdvancedSearch->toJson(), ","); // Field AMOUNT
        $filterList = Concat($filterList, $this->SERVICE_TYPE->AdvancedSearch->toJson(), ","); // Field SERVICE_TYPE
        $filterList = Concat($filterList, $this->DEPARTMENT->AdvancedSearch->toJson(), ","); // Field DEPARTMENT
        $filterList = Concat($filterList, $this->Created->AdvancedSearch->toJson(), ","); // Field Created
        $filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
        $filterList = Concat($filterList, $this->Modified->AdvancedSearch->toJson(), ","); // Field Modified
        $filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
        $filterList = Concat($filterList, $this->mas_services_billingcol->AdvancedSearch->toJson(), ","); // Field mas_services_billingcol
        $filterList = Concat($filterList, $this->DrShareAmount->AdvancedSearch->toJson(), ","); // Field DrShareAmount
        $filterList = Concat($filterList, $this->HospShareAmount->AdvancedSearch->toJson(), ","); // Field HospShareAmount
        $filterList = Concat($filterList, $this->DrSharePer->AdvancedSearch->toJson(), ","); // Field DrSharePer
        $filterList = Concat($filterList, $this->HospSharePer->AdvancedSearch->toJson(), ","); // Field HospSharePer
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
        $filterList = Concat($filterList, $this->UnitCD->AdvancedSearch->toJson(), ","); // Field UnitCD
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
        $filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
        $filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
        $filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
        $filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
        $filterList = Concat($filterList, $this->Outsource->AdvancedSearch->toJson(), ","); // Field Outsource
        $filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
        $filterList = Concat($filterList, $this->TestType->AdvancedSearch->toJson(), ","); // Field TestType
        $filterList = Concat($filterList, $this->NoHeading->AdvancedSearch->toJson(), ","); // Field NoHeading
        $filterList = Concat($filterList, $this->ChemicalCode->AdvancedSearch->toJson(), ","); // Field ChemicalCode
        $filterList = Concat($filterList, $this->ChemicalName->AdvancedSearch->toJson(), ","); // Field ChemicalName
        $filterList = Concat($filterList, $this->Utilaization->AdvancedSearch->toJson(), ","); // Field Utilaization
        $filterList = Concat($filterList, $this->Interpretation->AdvancedSearch->toJson(), ","); // Field Interpretation
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_lab_service_sublistsrch", $filters);
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

        // Field Id
        $this->Id->AdvancedSearch->SearchValue = @$filter["x_Id"];
        $this->Id->AdvancedSearch->SearchOperator = @$filter["z_Id"];
        $this->Id->AdvancedSearch->SearchCondition = @$filter["v_Id"];
        $this->Id->AdvancedSearch->SearchValue2 = @$filter["y_Id"];
        $this->Id->AdvancedSearch->SearchOperator2 = @$filter["w_Id"];
        $this->Id->AdvancedSearch->save();

        // Field CODE
        $this->CODE->AdvancedSearch->SearchValue = @$filter["x_CODE"];
        $this->CODE->AdvancedSearch->SearchOperator = @$filter["z_CODE"];
        $this->CODE->AdvancedSearch->SearchCondition = @$filter["v_CODE"];
        $this->CODE->AdvancedSearch->SearchValue2 = @$filter["y_CODE"];
        $this->CODE->AdvancedSearch->SearchOperator2 = @$filter["w_CODE"];
        $this->CODE->AdvancedSearch->save();

        // Field SERVICE
        $this->SERVICE->AdvancedSearch->SearchValue = @$filter["x_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchOperator = @$filter["z_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchCondition = @$filter["v_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchValue2 = @$filter["y_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchOperator2 = @$filter["w_SERVICE"];
        $this->SERVICE->AdvancedSearch->save();

        // Field UNITS
        $this->UNITS->AdvancedSearch->SearchValue = @$filter["x_UNITS"];
        $this->UNITS->AdvancedSearch->SearchOperator = @$filter["z_UNITS"];
        $this->UNITS->AdvancedSearch->SearchCondition = @$filter["v_UNITS"];
        $this->UNITS->AdvancedSearch->SearchValue2 = @$filter["y_UNITS"];
        $this->UNITS->AdvancedSearch->SearchOperator2 = @$filter["w_UNITS"];
        $this->UNITS->AdvancedSearch->save();

        // Field AMOUNT
        $this->AMOUNT->AdvancedSearch->SearchValue = @$filter["x_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchOperator = @$filter["z_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchCondition = @$filter["v_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchValue2 = @$filter["y_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchOperator2 = @$filter["w_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->save();

        // Field SERVICE_TYPE
        $this->SERVICE_TYPE->AdvancedSearch->SearchValue = @$filter["x_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchOperator = @$filter["z_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchCondition = @$filter["v_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->save();

        // Field DEPARTMENT
        $this->DEPARTMENT->AdvancedSearch->SearchValue = @$filter["x_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchOperator = @$filter["z_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchCondition = @$filter["v_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchValue2 = @$filter["y_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchOperator2 = @$filter["w_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->save();

        // Field Created
        $this->Created->AdvancedSearch->SearchValue = @$filter["x_Created"];
        $this->Created->AdvancedSearch->SearchOperator = @$filter["z_Created"];
        $this->Created->AdvancedSearch->SearchCondition = @$filter["v_Created"];
        $this->Created->AdvancedSearch->SearchValue2 = @$filter["y_Created"];
        $this->Created->AdvancedSearch->SearchOperator2 = @$filter["w_Created"];
        $this->Created->AdvancedSearch->save();

        // Field CreatedDateTime
        $this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->save();

        // Field Modified
        $this->Modified->AdvancedSearch->SearchValue = @$filter["x_Modified"];
        $this->Modified->AdvancedSearch->SearchOperator = @$filter["z_Modified"];
        $this->Modified->AdvancedSearch->SearchCondition = @$filter["v_Modified"];
        $this->Modified->AdvancedSearch->SearchValue2 = @$filter["y_Modified"];
        $this->Modified->AdvancedSearch->SearchOperator2 = @$filter["w_Modified"];
        $this->Modified->AdvancedSearch->save();

        // Field ModifiedDateTime
        $this->ModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->save();

        // Field mas_services_billingcol
        $this->mas_services_billingcol->AdvancedSearch->SearchValue = @$filter["x_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchOperator = @$filter["z_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchCondition = @$filter["v_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchValue2 = @$filter["y_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchOperator2 = @$filter["w_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->save();

        // Field DrShareAmount
        $this->DrShareAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->save();

        // Field HospShareAmount
        $this->HospShareAmount->AdvancedSearch->SearchValue = @$filter["x_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator = @$filter["z_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchCondition = @$filter["v_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->save();

        // Field DrSharePer
        $this->DrSharePer->AdvancedSearch->SearchValue = @$filter["x_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchOperator = @$filter["z_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchCondition = @$filter["v_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchValue2 = @$filter["y_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchOperator2 = @$filter["w_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->save();

        // Field HospSharePer
        $this->HospSharePer->AdvancedSearch->SearchValue = @$filter["x_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchOperator = @$filter["z_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchCondition = @$filter["v_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchValue2 = @$filter["y_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchOperator2 = @$filter["w_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field TestSubCd
        $this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Order
        $this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
        $this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
        $this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
        $this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
        $this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
        $this->Order->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field ResType
        $this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
        $this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
        $this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
        $this->ResType->AdvancedSearch->save();

        // Field UnitCD
        $this->UnitCD->AdvancedSearch->SearchValue = @$filter["x_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchOperator = @$filter["z_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchCondition = @$filter["v_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchValue2 = @$filter["y_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchOperator2 = @$filter["w_UnitCD"];
        $this->UnitCD->AdvancedSearch->save();

        // Field RefValue
        $this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
        $this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
        $this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
        $this->RefValue->AdvancedSearch->save();

        // Field Sample
        $this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
        $this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
        $this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
        $this->Sample->AdvancedSearch->save();

        // Field NoD
        $this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
        $this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
        $this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
        $this->NoD->AdvancedSearch->save();

        // Field BillOrder
        $this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
        $this->BillOrder->AdvancedSearch->save();

        // Field Formula
        $this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
        $this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
        $this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
        $this->Formula->AdvancedSearch->save();

        // Field Inactive
        $this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
        $this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
        $this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
        $this->Inactive->AdvancedSearch->save();

        // Field Outsource
        $this->Outsource->AdvancedSearch->SearchValue = @$filter["x_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator = @$filter["z_Outsource"];
        $this->Outsource->AdvancedSearch->SearchCondition = @$filter["v_Outsource"];
        $this->Outsource->AdvancedSearch->SearchValue2 = @$filter["y_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator2 = @$filter["w_Outsource"];
        $this->Outsource->AdvancedSearch->save();

        // Field CollSample
        $this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
        $this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
        $this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
        $this->CollSample->AdvancedSearch->save();

        // Field TestType
        $this->TestType->AdvancedSearch->SearchValue = @$filter["x_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator = @$filter["z_TestType"];
        $this->TestType->AdvancedSearch->SearchCondition = @$filter["v_TestType"];
        $this->TestType->AdvancedSearch->SearchValue2 = @$filter["y_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator2 = @$filter["w_TestType"];
        $this->TestType->AdvancedSearch->save();

        // Field NoHeading
        $this->NoHeading->AdvancedSearch->SearchValue = @$filter["x_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator = @$filter["z_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchCondition = @$filter["v_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchValue2 = @$filter["y_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator2 = @$filter["w_NoHeading"];
        $this->NoHeading->AdvancedSearch->save();

        // Field ChemicalCode
        $this->ChemicalCode->AdvancedSearch->SearchValue = @$filter["x_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchOperator = @$filter["z_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchCondition = @$filter["v_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchValue2 = @$filter["y_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchOperator2 = @$filter["w_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->save();

        // Field ChemicalName
        $this->ChemicalName->AdvancedSearch->SearchValue = @$filter["x_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchOperator = @$filter["z_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchCondition = @$filter["v_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchValue2 = @$filter["y_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchOperator2 = @$filter["w_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->save();

        // Field Utilaization
        $this->Utilaization->AdvancedSearch->SearchValue = @$filter["x_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchOperator = @$filter["z_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchCondition = @$filter["v_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchValue2 = @$filter["y_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchOperator2 = @$filter["w_Utilaization"];
        $this->Utilaization->AdvancedSearch->save();

        // Field Interpretation
        $this->Interpretation->AdvancedSearch->SearchValue = @$filter["x_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchOperator = @$filter["z_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchCondition = @$filter["v_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchValue2 = @$filter["y_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchOperator2 = @$filter["w_Interpretation"];
        $this->Interpretation->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->Id, $default, false); // Id
        $this->buildSearchSql($where, $this->CODE, $default, false); // CODE
        $this->buildSearchSql($where, $this->SERVICE, $default, false); // SERVICE
        $this->buildSearchSql($where, $this->UNITS, $default, false); // UNITS
        $this->buildSearchSql($where, $this->AMOUNT, $default, false); // AMOUNT
        $this->buildSearchSql($where, $this->SERVICE_TYPE, $default, false); // SERVICE_TYPE
        $this->buildSearchSql($where, $this->DEPARTMENT, $default, false); // DEPARTMENT
        $this->buildSearchSql($where, $this->Created, $default, false); // Created
        $this->buildSearchSql($where, $this->CreatedDateTime, $default, false); // CreatedDateTime
        $this->buildSearchSql($where, $this->Modified, $default, false); // Modified
        $this->buildSearchSql($where, $this->ModifiedDateTime, $default, false); // ModifiedDateTime
        $this->buildSearchSql($where, $this->mas_services_billingcol, $default, false); // mas_services_billingcol
        $this->buildSearchSql($where, $this->DrShareAmount, $default, false); // DrShareAmount
        $this->buildSearchSql($where, $this->HospShareAmount, $default, false); // HospShareAmount
        $this->buildSearchSql($where, $this->DrSharePer, $default, false); // DrSharePer
        $this->buildSearchSql($where, $this->HospSharePer, $default, false); // HospSharePer
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->TestSubCd, $default, false); // TestSubCd
        $this->buildSearchSql($where, $this->Method, $default, false); // Method
        $this->buildSearchSql($where, $this->Order, $default, false); // Order
        $this->buildSearchSql($where, $this->Form, $default, false); // Form
        $this->buildSearchSql($where, $this->ResType, $default, false); // ResType
        $this->buildSearchSql($where, $this->UnitCD, $default, false); // UnitCD
        $this->buildSearchSql($where, $this->RefValue, $default, false); // RefValue
        $this->buildSearchSql($where, $this->Sample, $default, false); // Sample
        $this->buildSearchSql($where, $this->NoD, $default, false); // NoD
        $this->buildSearchSql($where, $this->BillOrder, $default, false); // BillOrder
        $this->buildSearchSql($where, $this->Formula, $default, false); // Formula
        $this->buildSearchSql($where, $this->Inactive, $default, true); // Inactive
        $this->buildSearchSql($where, $this->Outsource, $default, false); // Outsource
        $this->buildSearchSql($where, $this->CollSample, $default, false); // CollSample
        $this->buildSearchSql($where, $this->TestType, $default, false); // TestType
        $this->buildSearchSql($where, $this->NoHeading, $default, false); // NoHeading
        $this->buildSearchSql($where, $this->ChemicalCode, $default, false); // ChemicalCode
        $this->buildSearchSql($where, $this->ChemicalName, $default, false); // ChemicalName
        $this->buildSearchSql($where, $this->Utilaization, $default, false); // Utilaization
        $this->buildSearchSql($where, $this->Interpretation, $default, false); // Interpretation

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->Id->AdvancedSearch->save(); // Id
            $this->CODE->AdvancedSearch->save(); // CODE
            $this->SERVICE->AdvancedSearch->save(); // SERVICE
            $this->UNITS->AdvancedSearch->save(); // UNITS
            $this->AMOUNT->AdvancedSearch->save(); // AMOUNT
            $this->SERVICE_TYPE->AdvancedSearch->save(); // SERVICE_TYPE
            $this->DEPARTMENT->AdvancedSearch->save(); // DEPARTMENT
            $this->Created->AdvancedSearch->save(); // Created
            $this->CreatedDateTime->AdvancedSearch->save(); // CreatedDateTime
            $this->Modified->AdvancedSearch->save(); // Modified
            $this->ModifiedDateTime->AdvancedSearch->save(); // ModifiedDateTime
            $this->mas_services_billingcol->AdvancedSearch->save(); // mas_services_billingcol
            $this->DrShareAmount->AdvancedSearch->save(); // DrShareAmount
            $this->HospShareAmount->AdvancedSearch->save(); // HospShareAmount
            $this->DrSharePer->AdvancedSearch->save(); // DrSharePer
            $this->HospSharePer->AdvancedSearch->save(); // HospSharePer
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->TestSubCd->AdvancedSearch->save(); // TestSubCd
            $this->Method->AdvancedSearch->save(); // Method
            $this->Order->AdvancedSearch->save(); // Order
            $this->Form->AdvancedSearch->save(); // Form
            $this->ResType->AdvancedSearch->save(); // ResType
            $this->UnitCD->AdvancedSearch->save(); // UnitCD
            $this->RefValue->AdvancedSearch->save(); // RefValue
            $this->Sample->AdvancedSearch->save(); // Sample
            $this->NoD->AdvancedSearch->save(); // NoD
            $this->BillOrder->AdvancedSearch->save(); // BillOrder
            $this->Formula->AdvancedSearch->save(); // Formula
            $this->Inactive->AdvancedSearch->save(); // Inactive
            $this->Outsource->AdvancedSearch->save(); // Outsource
            $this->CollSample->AdvancedSearch->save(); // CollSample
            $this->TestType->AdvancedSearch->save(); // TestType
            $this->NoHeading->AdvancedSearch->save(); // NoHeading
            $this->ChemicalCode->AdvancedSearch->save(); // ChemicalCode
            $this->ChemicalName->AdvancedSearch->save(); // ChemicalName
            $this->Utilaization->AdvancedSearch->save(); // Utilaization
            $this->Interpretation->AdvancedSearch->save(); // Interpretation
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
        $this->buildBasicSearchSql($where, $this->CODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SERVICE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AMOUNT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SERVICE_TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEPARTMENT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Created, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Modified, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mas_services_billingcol, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UnitCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Outsource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoHeading, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChemicalCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChemicalName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Utilaization, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Interpretation, $arKeywords, $type);
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
        if ($this->Id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SERVICE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UNITS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AMOUNT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SERVICE_TYPE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DEPARTMENT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Created->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Modified->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ModifiedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mas_services_billingcol->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrShareAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospShareAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrSharePer->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospSharePer->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TestSubCd->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Method->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Order->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Form->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ResType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UnitCD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RefValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Sample->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NoD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillOrder->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Formula->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Inactive->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Outsource->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CollSample->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TestType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NoHeading->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChemicalCode->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ChemicalName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Utilaization->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Interpretation->AdvancedSearch->issetSession()) {
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
                $this->Id->AdvancedSearch->unsetSession();
                $this->CODE->AdvancedSearch->unsetSession();
                $this->SERVICE->AdvancedSearch->unsetSession();
                $this->UNITS->AdvancedSearch->unsetSession();
                $this->AMOUNT->AdvancedSearch->unsetSession();
                $this->SERVICE_TYPE->AdvancedSearch->unsetSession();
                $this->DEPARTMENT->AdvancedSearch->unsetSession();
                $this->Created->AdvancedSearch->unsetSession();
                $this->CreatedDateTime->AdvancedSearch->unsetSession();
                $this->Modified->AdvancedSearch->unsetSession();
                $this->ModifiedDateTime->AdvancedSearch->unsetSession();
                $this->mas_services_billingcol->AdvancedSearch->unsetSession();
                $this->DrShareAmount->AdvancedSearch->unsetSession();
                $this->HospShareAmount->AdvancedSearch->unsetSession();
                $this->DrSharePer->AdvancedSearch->unsetSession();
                $this->HospSharePer->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->TestSubCd->AdvancedSearch->unsetSession();
                $this->Method->AdvancedSearch->unsetSession();
                $this->Order->AdvancedSearch->unsetSession();
                $this->Form->AdvancedSearch->unsetSession();
                $this->ResType->AdvancedSearch->unsetSession();
                $this->UnitCD->AdvancedSearch->unsetSession();
                $this->RefValue->AdvancedSearch->unsetSession();
                $this->Sample->AdvancedSearch->unsetSession();
                $this->NoD->AdvancedSearch->unsetSession();
                $this->BillOrder->AdvancedSearch->unsetSession();
                $this->Formula->AdvancedSearch->unsetSession();
                $this->Inactive->AdvancedSearch->unsetSession();
                $this->Outsource->AdvancedSearch->unsetSession();
                $this->CollSample->AdvancedSearch->unsetSession();
                $this->TestType->AdvancedSearch->unsetSession();
                $this->NoHeading->AdvancedSearch->unsetSession();
                $this->ChemicalCode->AdvancedSearch->unsetSession();
                $this->ChemicalName->AdvancedSearch->unsetSession();
                $this->Utilaization->AdvancedSearch->unsetSession();
                $this->Interpretation->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->Id->AdvancedSearch->load();
                $this->CODE->AdvancedSearch->load();
                $this->SERVICE->AdvancedSearch->load();
                $this->UNITS->AdvancedSearch->load();
                $this->AMOUNT->AdvancedSearch->load();
                $this->SERVICE_TYPE->AdvancedSearch->load();
                $this->DEPARTMENT->AdvancedSearch->load();
                $this->Created->AdvancedSearch->load();
                $this->CreatedDateTime->AdvancedSearch->load();
                $this->Modified->AdvancedSearch->load();
                $this->ModifiedDateTime->AdvancedSearch->load();
                $this->mas_services_billingcol->AdvancedSearch->load();
                $this->DrShareAmount->AdvancedSearch->load();
                $this->HospShareAmount->AdvancedSearch->load();
                $this->DrSharePer->AdvancedSearch->load();
                $this->HospSharePer->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->TestSubCd->AdvancedSearch->load();
                $this->Method->AdvancedSearch->load();
                $this->Order->AdvancedSearch->load();
                $this->Form->AdvancedSearch->load();
                $this->ResType->AdvancedSearch->load();
                $this->UnitCD->AdvancedSearch->load();
                $this->RefValue->AdvancedSearch->load();
                $this->Sample->AdvancedSearch->load();
                $this->NoD->AdvancedSearch->load();
                $this->BillOrder->AdvancedSearch->load();
                $this->Formula->AdvancedSearch->load();
                $this->Inactive->AdvancedSearch->load();
                $this->Outsource->AdvancedSearch->load();
                $this->CollSample->AdvancedSearch->load();
                $this->TestType->AdvancedSearch->load();
                $this->NoHeading->AdvancedSearch->load();
                $this->ChemicalCode->AdvancedSearch->load();
                $this->ChemicalName->AdvancedSearch->load();
                $this->Utilaization->AdvancedSearch->load();
                $this->Interpretation->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->Id); // Id
            $this->updateSort($this->CODE); // CODE
            $this->updateSort($this->SERVICE); // SERVICE
            $this->updateSort($this->UNITS); // UNITS
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Order); // Order
            $this->updateSort($this->ResType); // ResType
            $this->updateSort($this->UnitCD); // UnitCD
            $this->updateSort($this->Sample); // Sample
            $this->updateSort($this->NoD); // NoD
            $this->updateSort($this->BillOrder); // BillOrder
            $this->updateSort($this->Formula); // Formula
            $this->updateSort($this->Inactive); // Inactive
            $this->updateSort($this->Outsource); // Outsource
            $this->updateSort($this->CollSample); // CollSample
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
                        $this->CODE->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->Id->setSort("");
                $this->CODE->setSort("");
                $this->SERVICE->setSort("");
                $this->UNITS->setSort("");
                $this->AMOUNT->setSort("");
                $this->SERVICE_TYPE->setSort("");
                $this->DEPARTMENT->setSort("");
                $this->Created->setSort("");
                $this->CreatedDateTime->setSort("");
                $this->Modified->setSort("");
                $this->ModifiedDateTime->setSort("");
                $this->mas_services_billingcol->setSort("");
                $this->DrShareAmount->setSort("");
                $this->HospShareAmount->setSort("");
                $this->DrSharePer->setSort("");
                $this->HospSharePer->setSort("");
                $this->HospID->setSort("");
                $this->TestSubCd->setSort("");
                $this->Method->setSort("");
                $this->Order->setSort("");
                $this->Form->setSort("");
                $this->ResType->setSort("");
                $this->UnitCD->setSort("");
                $this->RefValue->setSort("");
                $this->Sample->setSort("");
                $this->NoD->setSort("");
                $this->BillOrder->setSort("");
                $this->Formula->setSort("");
                $this->Inactive->setSort("");
                $this->Outsource->setSort("");
                $this->CollSample->setSort("");
                $this->TestType->setSort("");
                $this->NoHeading->setSort("");
                $this->ChemicalCode->setSort("");
                $this->ChemicalName->setSort("");
                $this->Utilaization->setSort("");
                $this->Interpretation->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->Id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_lab_service_sublistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_lab_service_sublistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_lab_service_sublist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // Id
        if (!$this->isAddOrEdit() && $this->Id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Id->AdvancedSearch->SearchValue != "" || $this->Id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CODE
        if (!$this->isAddOrEdit() && $this->CODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CODE->AdvancedSearch->SearchValue != "" || $this->CODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SERVICE
        if (!$this->isAddOrEdit() && $this->SERVICE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SERVICE->AdvancedSearch->SearchValue != "" || $this->SERVICE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UNITS
        if (!$this->isAddOrEdit() && $this->UNITS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UNITS->AdvancedSearch->SearchValue != "" || $this->UNITS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AMOUNT
        if (!$this->isAddOrEdit() && $this->AMOUNT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AMOUNT->AdvancedSearch->SearchValue != "" || $this->AMOUNT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SERVICE_TYPE
        if (!$this->isAddOrEdit() && $this->SERVICE_TYPE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SERVICE_TYPE->AdvancedSearch->SearchValue != "" || $this->SERVICE_TYPE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DEPARTMENT
        if (!$this->isAddOrEdit() && $this->DEPARTMENT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DEPARTMENT->AdvancedSearch->SearchValue != "" || $this->DEPARTMENT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Created
        if (!$this->isAddOrEdit() && $this->Created->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Created->AdvancedSearch->SearchValue != "" || $this->Created->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Modified
        if (!$this->isAddOrEdit() && $this->Modified->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Modified->AdvancedSearch->SearchValue != "" || $this->Modified->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ModifiedDateTime
        if (!$this->isAddOrEdit() && $this->ModifiedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ModifiedDateTime->AdvancedSearch->SearchValue != "" || $this->ModifiedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mas_services_billingcol
        if (!$this->isAddOrEdit() && $this->mas_services_billingcol->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mas_services_billingcol->AdvancedSearch->SearchValue != "" || $this->mas_services_billingcol->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrShareAmount
        if (!$this->isAddOrEdit() && $this->DrShareAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrShareAmount->AdvancedSearch->SearchValue != "" || $this->DrShareAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HospShareAmount
        if (!$this->isAddOrEdit() && $this->HospShareAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospShareAmount->AdvancedSearch->SearchValue != "" || $this->HospShareAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrSharePer
        if (!$this->isAddOrEdit() && $this->DrSharePer->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrSharePer->AdvancedSearch->SearchValue != "" || $this->DrSharePer->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HospSharePer
        if (!$this->isAddOrEdit() && $this->HospSharePer->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospSharePer->AdvancedSearch->SearchValue != "" || $this->HospSharePer->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // TestSubCd
        if (!$this->isAddOrEdit() && $this->TestSubCd->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TestSubCd->AdvancedSearch->SearchValue != "" || $this->TestSubCd->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Method
        if (!$this->isAddOrEdit() && $this->Method->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Method->AdvancedSearch->SearchValue != "" || $this->Method->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Order
        if (!$this->isAddOrEdit() && $this->Order->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Order->AdvancedSearch->SearchValue != "" || $this->Order->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Form
        if (!$this->isAddOrEdit() && $this->Form->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Form->AdvancedSearch->SearchValue != "" || $this->Form->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ResType
        if (!$this->isAddOrEdit() && $this->ResType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ResType->AdvancedSearch->SearchValue != "" || $this->ResType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UnitCD
        if (!$this->isAddOrEdit() && $this->UnitCD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UnitCD->AdvancedSearch->SearchValue != "" || $this->UnitCD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RefValue
        if (!$this->isAddOrEdit() && $this->RefValue->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RefValue->AdvancedSearch->SearchValue != "" || $this->RefValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Sample
        if (!$this->isAddOrEdit() && $this->Sample->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Sample->AdvancedSearch->SearchValue != "" || $this->Sample->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NoD
        if (!$this->isAddOrEdit() && $this->NoD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NoD->AdvancedSearch->SearchValue != "" || $this->NoD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillOrder
        if (!$this->isAddOrEdit() && $this->BillOrder->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillOrder->AdvancedSearch->SearchValue != "" || $this->BillOrder->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Formula
        if (!$this->isAddOrEdit() && $this->Formula->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Formula->AdvancedSearch->SearchValue != "" || $this->Formula->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Inactive
        if (!$this->isAddOrEdit() && $this->Inactive->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Inactive->AdvancedSearch->SearchValue != "" || $this->Inactive->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->Inactive->AdvancedSearch->SearchValue)) {
            $this->Inactive->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Inactive->AdvancedSearch->SearchValue);
        }
        if (is_array($this->Inactive->AdvancedSearch->SearchValue2)) {
            $this->Inactive->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Inactive->AdvancedSearch->SearchValue2);
        }

        // Outsource
        if (!$this->isAddOrEdit() && $this->Outsource->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Outsource->AdvancedSearch->SearchValue != "" || $this->Outsource->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CollSample
        if (!$this->isAddOrEdit() && $this->CollSample->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CollSample->AdvancedSearch->SearchValue != "" || $this->CollSample->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TestType
        if (!$this->isAddOrEdit() && $this->TestType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TestType->AdvancedSearch->SearchValue != "" || $this->TestType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NoHeading
        if (!$this->isAddOrEdit() && $this->NoHeading->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NoHeading->AdvancedSearch->SearchValue != "" || $this->NoHeading->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChemicalCode
        if (!$this->isAddOrEdit() && $this->ChemicalCode->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChemicalCode->AdvancedSearch->SearchValue != "" || $this->ChemicalCode->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ChemicalName
        if (!$this->isAddOrEdit() && $this->ChemicalName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ChemicalName->AdvancedSearch->SearchValue != "" || $this->ChemicalName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Utilaization
        if (!$this->isAddOrEdit() && $this->Utilaization->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Utilaization->AdvancedSearch->SearchValue != "" || $this->Utilaization->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Interpretation
        if (!$this->isAddOrEdit() && $this->Interpretation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Interpretation->AdvancedSearch->SearchValue != "" || $this->Interpretation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->Id->setDbValue($row['Id']);
        $this->CODE->setDbValue($row['CODE']);
        $this->SERVICE->setDbValue($row['SERVICE']);
        $this->UNITS->setDbValue($row['UNITS']);
        $this->AMOUNT->setDbValue($row['AMOUNT']);
        $this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->mas_services_billingcol->setDbValue($row['mas_services_billingcol']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrSharePer->setDbValue($row['DrSharePer']);
        $this->HospSharePer->setDbValue($row['HospSharePer']);
        $this->HospID->setDbValue($row['HospID']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->ChemicalCode->setDbValue($row['ChemicalCode']);
        $this->ChemicalName->setDbValue($row['ChemicalName']);
        $this->Utilaization->setDbValue($row['Utilaization']);
        $this->Interpretation->setDbValue($row['Interpretation']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Id'] = null;
        $row['CODE'] = null;
        $row['SERVICE'] = null;
        $row['UNITS'] = null;
        $row['AMOUNT'] = null;
        $row['SERVICE_TYPE'] = null;
        $row['DEPARTMENT'] = null;
        $row['Created'] = null;
        $row['CreatedDateTime'] = null;
        $row['Modified'] = null;
        $row['ModifiedDateTime'] = null;
        $row['mas_services_billingcol'] = null;
        $row['DrShareAmount'] = null;
        $row['HospShareAmount'] = null;
        $row['DrSharePer'] = null;
        $row['HospSharePer'] = null;
        $row['HospID'] = null;
        $row['TestSubCd'] = null;
        $row['Method'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['ResType'] = null;
        $row['UnitCD'] = null;
        $row['RefValue'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['Outsource'] = null;
        $row['CollSample'] = null;
        $row['TestType'] = null;
        $row['NoHeading'] = null;
        $row['ChemicalCode'] = null;
        $row['ChemicalName'] = null;
        $row['Utilaization'] = null;
        $row['Interpretation'] = null;
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
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Id

        // CODE

        // SERVICE

        // UNITS

        // AMOUNT

        // SERVICE_TYPE

        // DEPARTMENT

        // Created

        // CreatedDateTime

        // Modified

        // ModifiedDateTime

        // mas_services_billingcol

        // DrShareAmount

        // HospShareAmount

        // DrSharePer

        // HospSharePer

        // HospID

        // TestSubCd

        // Method

        // Order

        // Form

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // Outsource

        // CollSample

        // TestType

        // NoHeading

        // ChemicalCode

        // ChemicalName

        // Utilaization

        // Interpretation
        if ($this->RowType == ROWTYPE_VIEW) {
            // Id
            $this->Id->ViewValue = $this->Id->CurrentValue;
            $this->Id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->ViewValue = $this->CODE->CurrentValue;
            $this->CODE->ViewCustomAttributes = "";

            // SERVICE
            $this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
            $this->SERVICE->ViewCustomAttributes = "";

            // UNITS
            $curVal = trim(strval($this->UNITS->CurrentValue));
            if ($curVal != "") {
                $this->UNITS->ViewValue = $this->UNITS->lookupCacheOption($curVal);
                if ($this->UNITS->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->UNITS->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->UNITS->Lookup->renderViewRow($rswrk[0]);
                        $this->UNITS->ViewValue = $this->UNITS->displayValue($arwrk);
                    } else {
                        $this->UNITS->ViewValue = $this->UNITS->CurrentValue;
                    }
                }
            } else {
                $this->UNITS->ViewValue = null;
            }
            $this->UNITS->ViewCustomAttributes = "";

            // AMOUNT
            $this->AMOUNT->ViewValue = $this->AMOUNT->CurrentValue;
            $this->AMOUNT->ViewValue = FormatNumber($this->AMOUNT->ViewValue, $this->AMOUNT->DefaultDecimalPrecision);
            $this->AMOUNT->ViewCustomAttributes = "";

            // SERVICE_TYPE
            $curVal = trim(strval($this->SERVICE_TYPE->CurrentValue));
            if ($curVal != "") {
                $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->lookupCacheOption($curVal);
                if ($this->SERVICE_TYPE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->SERVICE_TYPE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SERVICE_TYPE->Lookup->renderViewRow($rswrk[0]);
                        $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->displayValue($arwrk);
                    } else {
                        $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
                    }
                }
            } else {
                $this->SERVICE_TYPE->ViewValue = null;
            }
            $this->SERVICE_TYPE->ViewCustomAttributes = "";

            // DEPARTMENT
            if (strval($this->DEPARTMENT->CurrentValue) != "") {
                $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->optionCaption($this->DEPARTMENT->CurrentValue);
            } else {
                $this->DEPARTMENT->ViewValue = null;
            }
            $this->DEPARTMENT->ViewCustomAttributes = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->ViewValue = $this->mas_services_billingcol->CurrentValue;
            $this->mas_services_billingcol->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrSharePer
            $this->DrSharePer->ViewValue = $this->DrSharePer->CurrentValue;
            $this->DrSharePer->ViewValue = FormatNumber($this->DrSharePer->ViewValue, 0, -2, -2, -2);
            $this->DrSharePer->ViewCustomAttributes = "";

            // HospSharePer
            $this->HospSharePer->ViewValue = $this->HospSharePer->CurrentValue;
            $this->HospSharePer->ViewValue = FormatNumber($this->HospSharePer->ViewValue, 0, -2, -2, -2);
            $this->HospSharePer->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // UnitCD
            $this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
            $this->UnitCD->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Formula
            $this->Formula->ViewValue = $this->Formula->CurrentValue;
            $this->Formula->ViewCustomAttributes = "";

            // Inactive
            if (strval($this->Inactive->CurrentValue) != "") {
                $this->Inactive->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Inactive->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Inactive->ViewValue->add($this->Inactive->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Inactive->ViewValue = null;
            }
            $this->Inactive->ViewCustomAttributes = "";

            // Outsource
            $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
            $this->Outsource->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            if (strval($this->TestType->CurrentValue) != "") {
                $this->TestType->ViewValue = $this->TestType->optionCaption($this->TestType->CurrentValue);
            } else {
                $this->TestType->ViewValue = null;
            }
            $this->TestType->ViewCustomAttributes = "";

            // NoHeading
            $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
            $this->NoHeading->ViewCustomAttributes = "";

            // ChemicalCode
            $this->ChemicalCode->ViewValue = $this->ChemicalCode->CurrentValue;
            $this->ChemicalCode->ViewCustomAttributes = "";

            // ChemicalName
            $this->ChemicalName->ViewValue = $this->ChemicalName->CurrentValue;
            $this->ChemicalName->ViewCustomAttributes = "";

            // Utilaization
            $this->Utilaization->ViewValue = $this->Utilaization->CurrentValue;
            $this->Utilaization->ViewCustomAttributes = "";

            // Id
            $this->Id->LinkCustomAttributes = "";
            $this->Id->HrefValue = "";
            $this->Id->TooltipValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";
            $this->CODE->TooltipValue = "";

            // SERVICE
            $this->SERVICE->LinkCustomAttributes = "";
            $this->SERVICE->HrefValue = "";
            $this->SERVICE->TooltipValue = "";

            // UNITS
            $this->UNITS->LinkCustomAttributes = "";
            $this->UNITS->HrefValue = "";
            $this->UNITS->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // UnitCD
            $this->UnitCD->LinkCustomAttributes = "";
            $this->UnitCD->HrefValue = "";
            $this->UnitCD->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Formula
            $this->Formula->LinkCustomAttributes = "";
            $this->Formula->HrefValue = "";
            $this->Formula->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";
            $this->Outsource->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // Id
            $this->Id->EditAttrs["class"] = "form-control";
            $this->Id->EditCustomAttributes = "";
            $this->Id->EditValue = HtmlEncode($this->Id->AdvancedSearch->SearchValue);
            $this->Id->PlaceHolder = RemoveHtml($this->Id->caption());

            // CODE
            $this->CODE->EditAttrs["class"] = "form-control";
            $this->CODE->EditCustomAttributes = "";
            if (!$this->CODE->Raw) {
                $this->CODE->AdvancedSearch->SearchValue = HtmlDecode($this->CODE->AdvancedSearch->SearchValue);
            }
            $this->CODE->EditValue = HtmlEncode($this->CODE->AdvancedSearch->SearchValue);
            $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

            // SERVICE
            $this->SERVICE->EditAttrs["class"] = "form-control";
            $this->SERVICE->EditCustomAttributes = "";
            if (!$this->SERVICE->Raw) {
                $this->SERVICE->AdvancedSearch->SearchValue = HtmlDecode($this->SERVICE->AdvancedSearch->SearchValue);
            }
            $this->SERVICE->EditValue = HtmlEncode($this->SERVICE->AdvancedSearch->SearchValue);
            $this->SERVICE->PlaceHolder = RemoveHtml($this->SERVICE->caption());

            // UNITS
            $this->UNITS->EditAttrs["class"] = "form-control";
            $this->UNITS->EditCustomAttributes = "";
            $this->UNITS->PlaceHolder = RemoveHtml($this->UNITS->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // TestSubCd
            $this->TestSubCd->EditAttrs["class"] = "form-control";
            $this->TestSubCd->EditCustomAttributes = "";
            if (!$this->TestSubCd->Raw) {
                $this->TestSubCd->AdvancedSearch->SearchValue = HtmlDecode($this->TestSubCd->AdvancedSearch->SearchValue);
            }
            $this->TestSubCd->EditValue = HtmlEncode($this->TestSubCd->AdvancedSearch->SearchValue);
            $this->TestSubCd->PlaceHolder = RemoveHtml($this->TestSubCd->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->AdvancedSearch->SearchValue = HtmlDecode($this->Method->AdvancedSearch->SearchValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->AdvancedSearch->SearchValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->AdvancedSearch->SearchValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());

            // ResType
            $this->ResType->EditAttrs["class"] = "form-control";
            $this->ResType->EditCustomAttributes = "";
            if (!$this->ResType->Raw) {
                $this->ResType->AdvancedSearch->SearchValue = HtmlDecode($this->ResType->AdvancedSearch->SearchValue);
            }
            $this->ResType->EditValue = HtmlEncode($this->ResType->AdvancedSearch->SearchValue);
            $this->ResType->PlaceHolder = RemoveHtml($this->ResType->caption());

            // UnitCD
            $this->UnitCD->EditAttrs["class"] = "form-control";
            $this->UnitCD->EditCustomAttributes = "";
            if (!$this->UnitCD->Raw) {
                $this->UnitCD->AdvancedSearch->SearchValue = HtmlDecode($this->UnitCD->AdvancedSearch->SearchValue);
            }
            $this->UnitCD->EditValue = HtmlEncode($this->UnitCD->AdvancedSearch->SearchValue);
            $this->UnitCD->PlaceHolder = RemoveHtml($this->UnitCD->caption());

            // Sample
            $this->Sample->EditAttrs["class"] = "form-control";
            $this->Sample->EditCustomAttributes = "";
            if (!$this->Sample->Raw) {
                $this->Sample->AdvancedSearch->SearchValue = HtmlDecode($this->Sample->AdvancedSearch->SearchValue);
            }
            $this->Sample->EditValue = HtmlEncode($this->Sample->AdvancedSearch->SearchValue);
            $this->Sample->PlaceHolder = RemoveHtml($this->Sample->caption());

            // NoD
            $this->NoD->EditAttrs["class"] = "form-control";
            $this->NoD->EditCustomAttributes = "";
            $this->NoD->EditValue = HtmlEncode($this->NoD->AdvancedSearch->SearchValue);
            $this->NoD->PlaceHolder = RemoveHtml($this->NoD->caption());

            // BillOrder
            $this->BillOrder->EditAttrs["class"] = "form-control";
            $this->BillOrder->EditCustomAttributes = "";
            $this->BillOrder->EditValue = HtmlEncode($this->BillOrder->AdvancedSearch->SearchValue);
            $this->BillOrder->PlaceHolder = RemoveHtml($this->BillOrder->caption());

            // Formula
            $this->Formula->EditAttrs["class"] = "form-control";
            $this->Formula->EditCustomAttributes = "";
            $this->Formula->EditValue = HtmlEncode($this->Formula->AdvancedSearch->SearchValue);
            $this->Formula->PlaceHolder = RemoveHtml($this->Formula->caption());

            // Inactive
            $this->Inactive->EditCustomAttributes = "";
            $this->Inactive->EditValue = $this->Inactive->options(false);
            $this->Inactive->PlaceHolder = RemoveHtml($this->Inactive->caption());

            // Outsource
            $this->Outsource->EditAttrs["class"] = "form-control";
            $this->Outsource->EditCustomAttributes = "";
            if (!$this->Outsource->Raw) {
                $this->Outsource->AdvancedSearch->SearchValue = HtmlDecode($this->Outsource->AdvancedSearch->SearchValue);
            }
            $this->Outsource->EditValue = HtmlEncode($this->Outsource->AdvancedSearch->SearchValue);
            $this->Outsource->PlaceHolder = RemoveHtml($this->Outsource->caption());

            // CollSample
            $this->CollSample->EditAttrs["class"] = "form-control";
            $this->CollSample->EditCustomAttributes = "";
            if (!$this->CollSample->Raw) {
                $this->CollSample->AdvancedSearch->SearchValue = HtmlDecode($this->CollSample->AdvancedSearch->SearchValue);
            }
            $this->CollSample->EditValue = HtmlEncode($this->CollSample->AdvancedSearch->SearchValue);
            $this->CollSample->PlaceHolder = RemoveHtml($this->CollSample->caption());
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
        $this->Id->AdvancedSearch->load();
        $this->CODE->AdvancedSearch->load();
        $this->SERVICE->AdvancedSearch->load();
        $this->UNITS->AdvancedSearch->load();
        $this->AMOUNT->AdvancedSearch->load();
        $this->SERVICE_TYPE->AdvancedSearch->load();
        $this->DEPARTMENT->AdvancedSearch->load();
        $this->Created->AdvancedSearch->load();
        $this->CreatedDateTime->AdvancedSearch->load();
        $this->Modified->AdvancedSearch->load();
        $this->ModifiedDateTime->AdvancedSearch->load();
        $this->mas_services_billingcol->AdvancedSearch->load();
        $this->DrShareAmount->AdvancedSearch->load();
        $this->HospShareAmount->AdvancedSearch->load();
        $this->DrSharePer->AdvancedSearch->load();
        $this->HospSharePer->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->TestSubCd->AdvancedSearch->load();
        $this->Method->AdvancedSearch->load();
        $this->Order->AdvancedSearch->load();
        $this->Form->AdvancedSearch->load();
        $this->ResType->AdvancedSearch->load();
        $this->UnitCD->AdvancedSearch->load();
        $this->RefValue->AdvancedSearch->load();
        $this->Sample->AdvancedSearch->load();
        $this->NoD->AdvancedSearch->load();
        $this->BillOrder->AdvancedSearch->load();
        $this->Formula->AdvancedSearch->load();
        $this->Inactive->AdvancedSearch->load();
        $this->Outsource->AdvancedSearch->load();
        $this->CollSample->AdvancedSearch->load();
        $this->TestType->AdvancedSearch->load();
        $this->NoHeading->AdvancedSearch->load();
        $this->ChemicalCode->AdvancedSearch->load();
        $this->ChemicalName->AdvancedSearch->load();
        $this->Utilaization->AdvancedSearch->load();
        $this->Interpretation->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_lab_service_sublist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_lab_service_sublist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_lab_service_sublist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_lab_service_sub" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_lab_service_sub\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_lab_service_sublist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_lab_service_sublistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_lab_service") {
            $view_lab_service = Container("view_lab_service");
            $rsmaster = $view_lab_service->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $view_lab_service;
                    $view_lab_service->exportDocument($doc, new Recordset($rsmaster));
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
            if ($masterTblVar == "view_lab_service") {
                $validMaster = true;
                $masterTbl = Container("view_lab_service");
                if (($parm = Get("fk_CODE", Get("CODE"))) !== null) {
                    $masterTbl->CODE->setQueryStringValue($parm);
                    $this->CODE->setQueryStringValue($masterTbl->CODE->QueryStringValue);
                    $this->CODE->setSessionValue($this->CODE->QueryStringValue);
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
            if ($masterTblVar == "view_lab_service") {
                $validMaster = true;
                $masterTbl = Container("view_lab_service");
                if (($parm = Post("fk_CODE", Post("CODE"))) !== null) {
                    $masterTbl->CODE->setFormValue($parm);
                    $this->CODE->setFormValue($masterTbl->CODE->FormValue);
                    $this->CODE->setSessionValue($this->CODE->FormValue);
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
            if ($masterTblVar != "view_lab_service") {
                if ($this->CODE->CurrentValue == "") {
                    $this->CODE->setSessionValue("");
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
                case "x_UNITS":
                    break;
                case "x_SERVICE_TYPE":
                    break;
                case "x_DEPARTMENT":
                    break;
                case "x_Inactive":
                    break;
                case "x_TestType":
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
