<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class MonitorTreatmentPlanList extends MonitorTreatmentPlan
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'monitor_treatment_plan';

    // Page object name
    public $PageObjName = "MonitorTreatmentPlanList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fmonitor_treatment_planlist";
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

        // Table object (monitor_treatment_plan)
        if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
            $GLOBALS["monitor_treatment_plan"] = &$this;
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
        $this->AddUrl = "MonitorTreatmentPlanAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "MonitorTreatmentPlanDelete";
        $this->MultiUpdateUrl = "MonitorTreatmentPlanUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fmonitor_treatment_planlistsrch";

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
                $doc = new $class(Container("monitor_treatment_plan"));
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
        if ($this->isAddOrEdit()) {
            $this->createdby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->createddatetime->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->modifiedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->modifieddatetime->Visible = false;
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
        $this->PatId->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->MobileNo->setVisibility();
        $this->ConsultantName->setVisibility();
        $this->RefDrName->setVisibility();
        $this->RefDrMobileNo->setVisibility();
        $this->NewVisitDate->setVisibility();
        $this->NewVisitYesNo->setVisibility();
        $this->Treatment->setVisibility();
        $this->IUIDoneDate1->setVisibility();
        $this->IUIDoneYesNo1->setVisibility();
        $this->UPTTestDate1->setVisibility();
        $this->UPTTestYesNo1->setVisibility();
        $this->IUIDoneDate2->setVisibility();
        $this->IUIDoneYesNo2->setVisibility();
        $this->UPTTestDate2->setVisibility();
        $this->UPTTestYesNo2->setVisibility();
        $this->IUIDoneDate3->setVisibility();
        $this->IUIDoneYesNo3->setVisibility();
        $this->UPTTestDate3->setVisibility();
        $this->UPTTestYesNo3->setVisibility();
        $this->IUIDoneDate4->setVisibility();
        $this->IUIDoneYesNo4->setVisibility();
        $this->UPTTestDate4->setVisibility();
        $this->UPTTestYesNo4->setVisibility();
        $this->IVFStimulationDate->setVisibility();
        $this->IVFStimulationYesNo->setVisibility();
        $this->OPUDate->setVisibility();
        $this->OPUYesNo->setVisibility();
        $this->ETDate->setVisibility();
        $this->ETYesNo->setVisibility();
        $this->BetaHCGDate->setVisibility();
        $this->BetaHCGYesNo->setVisibility();
        $this->FETDate->setVisibility();
        $this->FETYesNo->setVisibility();
        $this->FBetaHCGDate->setVisibility();
        $this->FBetaHCGYesNo->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
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
        $this->setupLookupOptions($this->PatId);

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fmonitor_treatment_planlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->MobileNo->AdvancedSearch->toJson(), ","); // Field MobileNo
        $filterList = Concat($filterList, $this->ConsultantName->AdvancedSearch->toJson(), ","); // Field ConsultantName
        $filterList = Concat($filterList, $this->RefDrName->AdvancedSearch->toJson(), ","); // Field RefDrName
        $filterList = Concat($filterList, $this->RefDrMobileNo->AdvancedSearch->toJson(), ","); // Field RefDrMobileNo
        $filterList = Concat($filterList, $this->NewVisitDate->AdvancedSearch->toJson(), ","); // Field NewVisitDate
        $filterList = Concat($filterList, $this->NewVisitYesNo->AdvancedSearch->toJson(), ","); // Field NewVisitYesNo
        $filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
        $filterList = Concat($filterList, $this->IUIDoneDate1->AdvancedSearch->toJson(), ","); // Field IUIDoneDate1
        $filterList = Concat($filterList, $this->IUIDoneYesNo1->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo1
        $filterList = Concat($filterList, $this->UPTTestDate1->AdvancedSearch->toJson(), ","); // Field UPTTestDate1
        $filterList = Concat($filterList, $this->UPTTestYesNo1->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo1
        $filterList = Concat($filterList, $this->IUIDoneDate2->AdvancedSearch->toJson(), ","); // Field IUIDoneDate2
        $filterList = Concat($filterList, $this->IUIDoneYesNo2->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo2
        $filterList = Concat($filterList, $this->UPTTestDate2->AdvancedSearch->toJson(), ","); // Field UPTTestDate2
        $filterList = Concat($filterList, $this->UPTTestYesNo2->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo2
        $filterList = Concat($filterList, $this->IUIDoneDate3->AdvancedSearch->toJson(), ","); // Field IUIDoneDate3
        $filterList = Concat($filterList, $this->IUIDoneYesNo3->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo3
        $filterList = Concat($filterList, $this->UPTTestDate3->AdvancedSearch->toJson(), ","); // Field UPTTestDate3
        $filterList = Concat($filterList, $this->UPTTestYesNo3->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo3
        $filterList = Concat($filterList, $this->IUIDoneDate4->AdvancedSearch->toJson(), ","); // Field IUIDoneDate4
        $filterList = Concat($filterList, $this->IUIDoneYesNo4->AdvancedSearch->toJson(), ","); // Field IUIDoneYesNo4
        $filterList = Concat($filterList, $this->UPTTestDate4->AdvancedSearch->toJson(), ","); // Field UPTTestDate4
        $filterList = Concat($filterList, $this->UPTTestYesNo4->AdvancedSearch->toJson(), ","); // Field UPTTestYesNo4
        $filterList = Concat($filterList, $this->IVFStimulationDate->AdvancedSearch->toJson(), ","); // Field IVFStimulationDate
        $filterList = Concat($filterList, $this->IVFStimulationYesNo->AdvancedSearch->toJson(), ","); // Field IVFStimulationYesNo
        $filterList = Concat($filterList, $this->OPUDate->AdvancedSearch->toJson(), ","); // Field OPUDate
        $filterList = Concat($filterList, $this->OPUYesNo->AdvancedSearch->toJson(), ","); // Field OPUYesNo
        $filterList = Concat($filterList, $this->ETDate->AdvancedSearch->toJson(), ","); // Field ETDate
        $filterList = Concat($filterList, $this->ETYesNo->AdvancedSearch->toJson(), ","); // Field ETYesNo
        $filterList = Concat($filterList, $this->BetaHCGDate->AdvancedSearch->toJson(), ","); // Field BetaHCGDate
        $filterList = Concat($filterList, $this->BetaHCGYesNo->AdvancedSearch->toJson(), ","); // Field BetaHCGYesNo
        $filterList = Concat($filterList, $this->FETDate->AdvancedSearch->toJson(), ","); // Field FETDate
        $filterList = Concat($filterList, $this->FETYesNo->AdvancedSearch->toJson(), ","); // Field FETYesNo
        $filterList = Concat($filterList, $this->FBetaHCGDate->AdvancedSearch->toJson(), ","); // Field FBetaHCGDate
        $filterList = Concat($filterList, $this->FBetaHCGYesNo->AdvancedSearch->toJson(), ","); // Field FBetaHCGYesNo
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fmonitor_treatment_planlistsrch", $filters);
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

        // Field PatId
        $this->PatId->AdvancedSearch->SearchValue = @$filter["x_PatId"];
        $this->PatId->AdvancedSearch->SearchOperator = @$filter["z_PatId"];
        $this->PatId->AdvancedSearch->SearchCondition = @$filter["v_PatId"];
        $this->PatId->AdvancedSearch->SearchValue2 = @$filter["y_PatId"];
        $this->PatId->AdvancedSearch->SearchOperator2 = @$filter["w_PatId"];
        $this->PatId->AdvancedSearch->save();

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

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field MobileNo
        $this->MobileNo->AdvancedSearch->SearchValue = @$filter["x_MobileNo"];
        $this->MobileNo->AdvancedSearch->SearchOperator = @$filter["z_MobileNo"];
        $this->MobileNo->AdvancedSearch->SearchCondition = @$filter["v_MobileNo"];
        $this->MobileNo->AdvancedSearch->SearchValue2 = @$filter["y_MobileNo"];
        $this->MobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNo"];
        $this->MobileNo->AdvancedSearch->save();

        // Field ConsultantName
        $this->ConsultantName->AdvancedSearch->SearchValue = @$filter["x_ConsultantName"];
        $this->ConsultantName->AdvancedSearch->SearchOperator = @$filter["z_ConsultantName"];
        $this->ConsultantName->AdvancedSearch->SearchCondition = @$filter["v_ConsultantName"];
        $this->ConsultantName->AdvancedSearch->SearchValue2 = @$filter["y_ConsultantName"];
        $this->ConsultantName->AdvancedSearch->SearchOperator2 = @$filter["w_ConsultantName"];
        $this->ConsultantName->AdvancedSearch->save();

        // Field RefDrName
        $this->RefDrName->AdvancedSearch->SearchValue = @$filter["x_RefDrName"];
        $this->RefDrName->AdvancedSearch->SearchOperator = @$filter["z_RefDrName"];
        $this->RefDrName->AdvancedSearch->SearchCondition = @$filter["v_RefDrName"];
        $this->RefDrName->AdvancedSearch->SearchValue2 = @$filter["y_RefDrName"];
        $this->RefDrName->AdvancedSearch->SearchOperator2 = @$filter["w_RefDrName"];
        $this->RefDrName->AdvancedSearch->save();

        // Field RefDrMobileNo
        $this->RefDrMobileNo->AdvancedSearch->SearchValue = @$filter["x_RefDrMobileNo"];
        $this->RefDrMobileNo->AdvancedSearch->SearchOperator = @$filter["z_RefDrMobileNo"];
        $this->RefDrMobileNo->AdvancedSearch->SearchCondition = @$filter["v_RefDrMobileNo"];
        $this->RefDrMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_RefDrMobileNo"];
        $this->RefDrMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_RefDrMobileNo"];
        $this->RefDrMobileNo->AdvancedSearch->save();

        // Field NewVisitDate
        $this->NewVisitDate->AdvancedSearch->SearchValue = @$filter["x_NewVisitDate"];
        $this->NewVisitDate->AdvancedSearch->SearchOperator = @$filter["z_NewVisitDate"];
        $this->NewVisitDate->AdvancedSearch->SearchCondition = @$filter["v_NewVisitDate"];
        $this->NewVisitDate->AdvancedSearch->SearchValue2 = @$filter["y_NewVisitDate"];
        $this->NewVisitDate->AdvancedSearch->SearchOperator2 = @$filter["w_NewVisitDate"];
        $this->NewVisitDate->AdvancedSearch->save();

        // Field NewVisitYesNo
        $this->NewVisitYesNo->AdvancedSearch->SearchValue = @$filter["x_NewVisitYesNo"];
        $this->NewVisitYesNo->AdvancedSearch->SearchOperator = @$filter["z_NewVisitYesNo"];
        $this->NewVisitYesNo->AdvancedSearch->SearchCondition = @$filter["v_NewVisitYesNo"];
        $this->NewVisitYesNo->AdvancedSearch->SearchValue2 = @$filter["y_NewVisitYesNo"];
        $this->NewVisitYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_NewVisitYesNo"];
        $this->NewVisitYesNo->AdvancedSearch->save();

        // Field Treatment
        $this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
        $this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
        $this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
        $this->Treatment->AdvancedSearch->save();

        // Field IUIDoneDate1
        $this->IUIDoneDate1->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate1"];
        $this->IUIDoneDate1->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate1"];
        $this->IUIDoneDate1->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate1"];
        $this->IUIDoneDate1->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate1"];
        $this->IUIDoneDate1->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate1"];
        $this->IUIDoneDate1->AdvancedSearch->save();

        // Field IUIDoneYesNo1
        $this->IUIDoneYesNo1->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo1"];
        $this->IUIDoneYesNo1->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo1"];
        $this->IUIDoneYesNo1->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo1"];
        $this->IUIDoneYesNo1->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo1"];
        $this->IUIDoneYesNo1->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo1"];
        $this->IUIDoneYesNo1->AdvancedSearch->save();

        // Field UPTTestDate1
        $this->UPTTestDate1->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate1"];
        $this->UPTTestDate1->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate1"];
        $this->UPTTestDate1->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate1"];
        $this->UPTTestDate1->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate1"];
        $this->UPTTestDate1->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate1"];
        $this->UPTTestDate1->AdvancedSearch->save();

        // Field UPTTestYesNo1
        $this->UPTTestYesNo1->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo1"];
        $this->UPTTestYesNo1->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo1"];
        $this->UPTTestYesNo1->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo1"];
        $this->UPTTestYesNo1->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo1"];
        $this->UPTTestYesNo1->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo1"];
        $this->UPTTestYesNo1->AdvancedSearch->save();

        // Field IUIDoneDate2
        $this->IUIDoneDate2->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate2"];
        $this->IUIDoneDate2->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate2"];
        $this->IUIDoneDate2->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate2"];
        $this->IUIDoneDate2->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate2"];
        $this->IUIDoneDate2->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate2"];
        $this->IUIDoneDate2->AdvancedSearch->save();

        // Field IUIDoneYesNo2
        $this->IUIDoneYesNo2->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo2"];
        $this->IUIDoneYesNo2->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo2"];
        $this->IUIDoneYesNo2->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo2"];
        $this->IUIDoneYesNo2->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo2"];
        $this->IUIDoneYesNo2->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo2"];
        $this->IUIDoneYesNo2->AdvancedSearch->save();

        // Field UPTTestDate2
        $this->UPTTestDate2->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate2"];
        $this->UPTTestDate2->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate2"];
        $this->UPTTestDate2->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate2"];
        $this->UPTTestDate2->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate2"];
        $this->UPTTestDate2->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate2"];
        $this->UPTTestDate2->AdvancedSearch->save();

        // Field UPTTestYesNo2
        $this->UPTTestYesNo2->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo2"];
        $this->UPTTestYesNo2->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo2"];
        $this->UPTTestYesNo2->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo2"];
        $this->UPTTestYesNo2->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo2"];
        $this->UPTTestYesNo2->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo2"];
        $this->UPTTestYesNo2->AdvancedSearch->save();

        // Field IUIDoneDate3
        $this->IUIDoneDate3->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate3"];
        $this->IUIDoneDate3->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate3"];
        $this->IUIDoneDate3->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate3"];
        $this->IUIDoneDate3->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate3"];
        $this->IUIDoneDate3->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate3"];
        $this->IUIDoneDate3->AdvancedSearch->save();

        // Field IUIDoneYesNo3
        $this->IUIDoneYesNo3->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo3"];
        $this->IUIDoneYesNo3->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo3"];
        $this->IUIDoneYesNo3->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo3"];
        $this->IUIDoneYesNo3->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo3"];
        $this->IUIDoneYesNo3->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo3"];
        $this->IUIDoneYesNo3->AdvancedSearch->save();

        // Field UPTTestDate3
        $this->UPTTestDate3->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate3"];
        $this->UPTTestDate3->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate3"];
        $this->UPTTestDate3->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate3"];
        $this->UPTTestDate3->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate3"];
        $this->UPTTestDate3->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate3"];
        $this->UPTTestDate3->AdvancedSearch->save();

        // Field UPTTestYesNo3
        $this->UPTTestYesNo3->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo3"];
        $this->UPTTestYesNo3->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo3"];
        $this->UPTTestYesNo3->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo3"];
        $this->UPTTestYesNo3->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo3"];
        $this->UPTTestYesNo3->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo3"];
        $this->UPTTestYesNo3->AdvancedSearch->save();

        // Field IUIDoneDate4
        $this->IUIDoneDate4->AdvancedSearch->SearchValue = @$filter["x_IUIDoneDate4"];
        $this->IUIDoneDate4->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneDate4"];
        $this->IUIDoneDate4->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneDate4"];
        $this->IUIDoneDate4->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneDate4"];
        $this->IUIDoneDate4->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneDate4"];
        $this->IUIDoneDate4->AdvancedSearch->save();

        // Field IUIDoneYesNo4
        $this->IUIDoneYesNo4->AdvancedSearch->SearchValue = @$filter["x_IUIDoneYesNo4"];
        $this->IUIDoneYesNo4->AdvancedSearch->SearchOperator = @$filter["z_IUIDoneYesNo4"];
        $this->IUIDoneYesNo4->AdvancedSearch->SearchCondition = @$filter["v_IUIDoneYesNo4"];
        $this->IUIDoneYesNo4->AdvancedSearch->SearchValue2 = @$filter["y_IUIDoneYesNo4"];
        $this->IUIDoneYesNo4->AdvancedSearch->SearchOperator2 = @$filter["w_IUIDoneYesNo4"];
        $this->IUIDoneYesNo4->AdvancedSearch->save();

        // Field UPTTestDate4
        $this->UPTTestDate4->AdvancedSearch->SearchValue = @$filter["x_UPTTestDate4"];
        $this->UPTTestDate4->AdvancedSearch->SearchOperator = @$filter["z_UPTTestDate4"];
        $this->UPTTestDate4->AdvancedSearch->SearchCondition = @$filter["v_UPTTestDate4"];
        $this->UPTTestDate4->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestDate4"];
        $this->UPTTestDate4->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestDate4"];
        $this->UPTTestDate4->AdvancedSearch->save();

        // Field UPTTestYesNo4
        $this->UPTTestYesNo4->AdvancedSearch->SearchValue = @$filter["x_UPTTestYesNo4"];
        $this->UPTTestYesNo4->AdvancedSearch->SearchOperator = @$filter["z_UPTTestYesNo4"];
        $this->UPTTestYesNo4->AdvancedSearch->SearchCondition = @$filter["v_UPTTestYesNo4"];
        $this->UPTTestYesNo4->AdvancedSearch->SearchValue2 = @$filter["y_UPTTestYesNo4"];
        $this->UPTTestYesNo4->AdvancedSearch->SearchOperator2 = @$filter["w_UPTTestYesNo4"];
        $this->UPTTestYesNo4->AdvancedSearch->save();

        // Field IVFStimulationDate
        $this->IVFStimulationDate->AdvancedSearch->SearchValue = @$filter["x_IVFStimulationDate"];
        $this->IVFStimulationDate->AdvancedSearch->SearchOperator = @$filter["z_IVFStimulationDate"];
        $this->IVFStimulationDate->AdvancedSearch->SearchCondition = @$filter["v_IVFStimulationDate"];
        $this->IVFStimulationDate->AdvancedSearch->SearchValue2 = @$filter["y_IVFStimulationDate"];
        $this->IVFStimulationDate->AdvancedSearch->SearchOperator2 = @$filter["w_IVFStimulationDate"];
        $this->IVFStimulationDate->AdvancedSearch->save();

        // Field IVFStimulationYesNo
        $this->IVFStimulationYesNo->AdvancedSearch->SearchValue = @$filter["x_IVFStimulationYesNo"];
        $this->IVFStimulationYesNo->AdvancedSearch->SearchOperator = @$filter["z_IVFStimulationYesNo"];
        $this->IVFStimulationYesNo->AdvancedSearch->SearchCondition = @$filter["v_IVFStimulationYesNo"];
        $this->IVFStimulationYesNo->AdvancedSearch->SearchValue2 = @$filter["y_IVFStimulationYesNo"];
        $this->IVFStimulationYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_IVFStimulationYesNo"];
        $this->IVFStimulationYesNo->AdvancedSearch->save();

        // Field OPUDate
        $this->OPUDate->AdvancedSearch->SearchValue = @$filter["x_OPUDate"];
        $this->OPUDate->AdvancedSearch->SearchOperator = @$filter["z_OPUDate"];
        $this->OPUDate->AdvancedSearch->SearchCondition = @$filter["v_OPUDate"];
        $this->OPUDate->AdvancedSearch->SearchValue2 = @$filter["y_OPUDate"];
        $this->OPUDate->AdvancedSearch->SearchOperator2 = @$filter["w_OPUDate"];
        $this->OPUDate->AdvancedSearch->save();

        // Field OPUYesNo
        $this->OPUYesNo->AdvancedSearch->SearchValue = @$filter["x_OPUYesNo"];
        $this->OPUYesNo->AdvancedSearch->SearchOperator = @$filter["z_OPUYesNo"];
        $this->OPUYesNo->AdvancedSearch->SearchCondition = @$filter["v_OPUYesNo"];
        $this->OPUYesNo->AdvancedSearch->SearchValue2 = @$filter["y_OPUYesNo"];
        $this->OPUYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_OPUYesNo"];
        $this->OPUYesNo->AdvancedSearch->save();

        // Field ETDate
        $this->ETDate->AdvancedSearch->SearchValue = @$filter["x_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator = @$filter["z_ETDate"];
        $this->ETDate->AdvancedSearch->SearchCondition = @$filter["v_ETDate"];
        $this->ETDate->AdvancedSearch->SearchValue2 = @$filter["y_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator2 = @$filter["w_ETDate"];
        $this->ETDate->AdvancedSearch->save();

        // Field ETYesNo
        $this->ETYesNo->AdvancedSearch->SearchValue = @$filter["x_ETYesNo"];
        $this->ETYesNo->AdvancedSearch->SearchOperator = @$filter["z_ETYesNo"];
        $this->ETYesNo->AdvancedSearch->SearchCondition = @$filter["v_ETYesNo"];
        $this->ETYesNo->AdvancedSearch->SearchValue2 = @$filter["y_ETYesNo"];
        $this->ETYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_ETYesNo"];
        $this->ETYesNo->AdvancedSearch->save();

        // Field BetaHCGDate
        $this->BetaHCGDate->AdvancedSearch->SearchValue = @$filter["x_BetaHCGDate"];
        $this->BetaHCGDate->AdvancedSearch->SearchOperator = @$filter["z_BetaHCGDate"];
        $this->BetaHCGDate->AdvancedSearch->SearchCondition = @$filter["v_BetaHCGDate"];
        $this->BetaHCGDate->AdvancedSearch->SearchValue2 = @$filter["y_BetaHCGDate"];
        $this->BetaHCGDate->AdvancedSearch->SearchOperator2 = @$filter["w_BetaHCGDate"];
        $this->BetaHCGDate->AdvancedSearch->save();

        // Field BetaHCGYesNo
        $this->BetaHCGYesNo->AdvancedSearch->SearchValue = @$filter["x_BetaHCGYesNo"];
        $this->BetaHCGYesNo->AdvancedSearch->SearchOperator = @$filter["z_BetaHCGYesNo"];
        $this->BetaHCGYesNo->AdvancedSearch->SearchCondition = @$filter["v_BetaHCGYesNo"];
        $this->BetaHCGYesNo->AdvancedSearch->SearchValue2 = @$filter["y_BetaHCGYesNo"];
        $this->BetaHCGYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_BetaHCGYesNo"];
        $this->BetaHCGYesNo->AdvancedSearch->save();

        // Field FETDate
        $this->FETDate->AdvancedSearch->SearchValue = @$filter["x_FETDate"];
        $this->FETDate->AdvancedSearch->SearchOperator = @$filter["z_FETDate"];
        $this->FETDate->AdvancedSearch->SearchCondition = @$filter["v_FETDate"];
        $this->FETDate->AdvancedSearch->SearchValue2 = @$filter["y_FETDate"];
        $this->FETDate->AdvancedSearch->SearchOperator2 = @$filter["w_FETDate"];
        $this->FETDate->AdvancedSearch->save();

        // Field FETYesNo
        $this->FETYesNo->AdvancedSearch->SearchValue = @$filter["x_FETYesNo"];
        $this->FETYesNo->AdvancedSearch->SearchOperator = @$filter["z_FETYesNo"];
        $this->FETYesNo->AdvancedSearch->SearchCondition = @$filter["v_FETYesNo"];
        $this->FETYesNo->AdvancedSearch->SearchValue2 = @$filter["y_FETYesNo"];
        $this->FETYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_FETYesNo"];
        $this->FETYesNo->AdvancedSearch->save();

        // Field FBetaHCGDate
        $this->FBetaHCGDate->AdvancedSearch->SearchValue = @$filter["x_FBetaHCGDate"];
        $this->FBetaHCGDate->AdvancedSearch->SearchOperator = @$filter["z_FBetaHCGDate"];
        $this->FBetaHCGDate->AdvancedSearch->SearchCondition = @$filter["v_FBetaHCGDate"];
        $this->FBetaHCGDate->AdvancedSearch->SearchValue2 = @$filter["y_FBetaHCGDate"];
        $this->FBetaHCGDate->AdvancedSearch->SearchOperator2 = @$filter["w_FBetaHCGDate"];
        $this->FBetaHCGDate->AdvancedSearch->save();

        // Field FBetaHCGYesNo
        $this->FBetaHCGYesNo->AdvancedSearch->SearchValue = @$filter["x_FBetaHCGYesNo"];
        $this->FBetaHCGYesNo->AdvancedSearch->SearchOperator = @$filter["z_FBetaHCGYesNo"];
        $this->FBetaHCGYesNo->AdvancedSearch->SearchCondition = @$filter["v_FBetaHCGYesNo"];
        $this->FBetaHCGYesNo->AdvancedSearch->SearchValue2 = @$filter["y_FBetaHCGYesNo"];
        $this->FBetaHCGYesNo->AdvancedSearch->SearchOperator2 = @$filter["w_FBetaHCGYesNo"];
        $this->FBetaHCGYesNo->AdvancedSearch->save();

        // Field createdby
        $this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
        $this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
        $this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
        $this->createdby->AdvancedSearch->save();

        // Field createddatetime
        $this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
        $this->createddatetime->AdvancedSearch->save();

        // Field modifiedby
        $this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
        $this->modifiedby->AdvancedSearch->save();

        // Field modifieddatetime
        $this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->save();

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

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ConsultantName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefDrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefDrMobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NewVisitYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUIDoneYesNo1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UPTTestYesNo1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUIDoneYesNo2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UPTTestYesNo2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUIDoneYesNo3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UPTTestYesNo3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUIDoneYesNo4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UPTTestYesNo4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IVFStimulationYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OPUYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BetaHCGYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FETYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FBetaHCGYesNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
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
            $this->updateSort($this->PatId); // PatId
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->MobileNo); // MobileNo
            $this->updateSort($this->ConsultantName); // ConsultantName
            $this->updateSort($this->RefDrName); // RefDrName
            $this->updateSort($this->RefDrMobileNo); // RefDrMobileNo
            $this->updateSort($this->NewVisitDate); // NewVisitDate
            $this->updateSort($this->NewVisitYesNo); // NewVisitYesNo
            $this->updateSort($this->Treatment); // Treatment
            $this->updateSort($this->IUIDoneDate1); // IUIDoneDate1
            $this->updateSort($this->IUIDoneYesNo1); // IUIDoneYesNo1
            $this->updateSort($this->UPTTestDate1); // UPTTestDate1
            $this->updateSort($this->UPTTestYesNo1); // UPTTestYesNo1
            $this->updateSort($this->IUIDoneDate2); // IUIDoneDate2
            $this->updateSort($this->IUIDoneYesNo2); // IUIDoneYesNo2
            $this->updateSort($this->UPTTestDate2); // UPTTestDate2
            $this->updateSort($this->UPTTestYesNo2); // UPTTestYesNo2
            $this->updateSort($this->IUIDoneDate3); // IUIDoneDate3
            $this->updateSort($this->IUIDoneYesNo3); // IUIDoneYesNo3
            $this->updateSort($this->UPTTestDate3); // UPTTestDate3
            $this->updateSort($this->UPTTestYesNo3); // UPTTestYesNo3
            $this->updateSort($this->IUIDoneDate4); // IUIDoneDate4
            $this->updateSort($this->IUIDoneYesNo4); // IUIDoneYesNo4
            $this->updateSort($this->UPTTestDate4); // UPTTestDate4
            $this->updateSort($this->UPTTestYesNo4); // UPTTestYesNo4
            $this->updateSort($this->IVFStimulationDate); // IVFStimulationDate
            $this->updateSort($this->IVFStimulationYesNo); // IVFStimulationYesNo
            $this->updateSort($this->OPUDate); // OPUDate
            $this->updateSort($this->OPUYesNo); // OPUYesNo
            $this->updateSort($this->ETDate); // ETDate
            $this->updateSort($this->ETYesNo); // ETYesNo
            $this->updateSort($this->BetaHCGDate); // BetaHCGDate
            $this->updateSort($this->BetaHCGYesNo); // BetaHCGYesNo
            $this->updateSort($this->FETDate); // FETDate
            $this->updateSort($this->FETYesNo); // FETYesNo
            $this->updateSort($this->FBetaHCGDate); // FBetaHCGDate
            $this->updateSort($this->FBetaHCGYesNo); // FBetaHCGYesNo
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->HospID); // HospID
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "`id` DESC";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($this->id->getSort() != "") {
                    $useDefaultSort = false;
                }
                if ($useDefaultSort) {
                    $this->id->setSort("DESC");
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
                $this->PatId->setSort("");
                $this->PatientId->setSort("");
                $this->PatientName->setSort("");
                $this->Age->setSort("");
                $this->MobileNo->setSort("");
                $this->ConsultantName->setSort("");
                $this->RefDrName->setSort("");
                $this->RefDrMobileNo->setSort("");
                $this->NewVisitDate->setSort("");
                $this->NewVisitYesNo->setSort("");
                $this->Treatment->setSort("");
                $this->IUIDoneDate1->setSort("");
                $this->IUIDoneYesNo1->setSort("");
                $this->UPTTestDate1->setSort("");
                $this->UPTTestYesNo1->setSort("");
                $this->IUIDoneDate2->setSort("");
                $this->IUIDoneYesNo2->setSort("");
                $this->UPTTestDate2->setSort("");
                $this->UPTTestYesNo2->setSort("");
                $this->IUIDoneDate3->setSort("");
                $this->IUIDoneYesNo3->setSort("");
                $this->UPTTestDate3->setSort("");
                $this->UPTTestYesNo3->setSort("");
                $this->IUIDoneDate4->setSort("");
                $this->IUIDoneYesNo4->setSort("");
                $this->UPTTestDate4->setSort("");
                $this->UPTTestYesNo4->setSort("");
                $this->IVFStimulationDate->setSort("");
                $this->IVFStimulationYesNo->setSort("");
                $this->OPUDate->setSort("");
                $this->OPUYesNo->setSort("");
                $this->ETDate->setSort("");
                $this->ETYesNo->setSort("");
                $this->BetaHCGDate->setSort("");
                $this->BetaHCGYesNo->setSort("");
                $this->FETDate->setSort("");
                $this->FETYesNo->setSort("");
                $this->FBetaHCGDate->setSort("");
                $this->FBetaHCGYesNo->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fmonitor_treatment_planlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fmonitor_treatment_planlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fmonitor_treatment_planlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->PatId->setDbValue($row['PatId']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->MobileNo->setDbValue($row['MobileNo']);
        $this->ConsultantName->setDbValue($row['ConsultantName']);
        $this->RefDrName->setDbValue($row['RefDrName']);
        $this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
        $this->NewVisitDate->setDbValue($row['NewVisitDate']);
        $this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
        $this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
        $this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
        $this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
        $this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
        $this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
        $this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
        $this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
        $this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
        $this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
        $this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
        $this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
        $this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
        $this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
        $this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
        $this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
        $this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
        $this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
        $this->OPUDate->setDbValue($row['OPUDate']);
        $this->OPUYesNo->setDbValue($row['OPUYesNo']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->ETYesNo->setDbValue($row['ETYesNo']);
        $this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
        $this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
        $this->FETDate->setDbValue($row['FETDate']);
        $this->FETYesNo->setDbValue($row['FETYesNo']);
        $this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
        $this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatId'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['MobileNo'] = null;
        $row['ConsultantName'] = null;
        $row['RefDrName'] = null;
        $row['RefDrMobileNo'] = null;
        $row['NewVisitDate'] = null;
        $row['NewVisitYesNo'] = null;
        $row['Treatment'] = null;
        $row['IUIDoneDate1'] = null;
        $row['IUIDoneYesNo1'] = null;
        $row['UPTTestDate1'] = null;
        $row['UPTTestYesNo1'] = null;
        $row['IUIDoneDate2'] = null;
        $row['IUIDoneYesNo2'] = null;
        $row['UPTTestDate2'] = null;
        $row['UPTTestYesNo2'] = null;
        $row['IUIDoneDate3'] = null;
        $row['IUIDoneYesNo3'] = null;
        $row['UPTTestDate3'] = null;
        $row['UPTTestYesNo3'] = null;
        $row['IUIDoneDate4'] = null;
        $row['IUIDoneYesNo4'] = null;
        $row['UPTTestDate4'] = null;
        $row['UPTTestYesNo4'] = null;
        $row['IVFStimulationDate'] = null;
        $row['IVFStimulationYesNo'] = null;
        $row['OPUDate'] = null;
        $row['OPUYesNo'] = null;
        $row['ETDate'] = null;
        $row['ETYesNo'] = null;
        $row['BetaHCGDate'] = null;
        $row['BetaHCGYesNo'] = null;
        $row['FETDate'] = null;
        $row['FETYesNo'] = null;
        $row['FBetaHCGDate'] = null;
        $row['FBetaHCGYesNo'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['HospID'] = null;
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

        // PatId

        // PatientId

        // PatientName

        // Age

        // MobileNo

        // ConsultantName

        // RefDrName

        // RefDrMobileNo

        // NewVisitDate

        // NewVisitYesNo

        // Treatment

        // IUIDoneDate1

        // IUIDoneYesNo1

        // UPTTestDate1

        // UPTTestYesNo1

        // IUIDoneDate2

        // IUIDoneYesNo2

        // UPTTestDate2

        // UPTTestYesNo2

        // IUIDoneDate3

        // IUIDoneYesNo3

        // UPTTestDate3

        // UPTTestYesNo3

        // IUIDoneDate4

        // IUIDoneYesNo4

        // UPTTestDate4

        // UPTTestYesNo4

        // IVFStimulationDate

        // IVFStimulationYesNo

        // OPUDate

        // OPUYesNo

        // ETDate

        // ETYesNo

        // BetaHCGDate

        // BetaHCGYesNo

        // FETDate

        // FETYesNo

        // FBetaHCGDate

        // FBetaHCGYesNo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $curVal = trim(strval($this->PatId->CurrentValue));
            if ($curVal != "") {
                $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
                if ($this->PatId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                        $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                    } else {
                        $this->PatId->ViewValue = $this->PatId->CurrentValue;
                    }
                }
            } else {
                $this->PatId->ViewValue = null;
            }
            $this->PatId->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // MobileNo
            $this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
            $this->MobileNo->ViewCustomAttributes = "";

            // ConsultantName
            $this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
            $this->ConsultantName->ViewCustomAttributes = "";

            // RefDrName
            $this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
            $this->RefDrName->ViewCustomAttributes = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
            $this->RefDrMobileNo->ViewCustomAttributes = "";

            // NewVisitDate
            $this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
            $this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 7);
            $this->NewVisitDate->ViewCustomAttributes = "";

            // NewVisitYesNo
            if (strval($this->NewVisitYesNo->CurrentValue) != "") {
                $this->NewVisitYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->NewVisitYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->NewVisitYesNo->ViewValue->add($this->NewVisitYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->NewVisitYesNo->ViewValue = null;
            }
            $this->NewVisitYesNo->ViewCustomAttributes = "";

            // Treatment
            if (strval($this->Treatment->CurrentValue) != "") {
                $this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
            } else {
                $this->Treatment->ViewValue = null;
            }
            $this->Treatment->ViewCustomAttributes = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
            $this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 7);
            $this->IUIDoneDate1->ViewCustomAttributes = "";

            // IUIDoneYesNo1
            if (strval($this->IUIDoneYesNo1->CurrentValue) != "") {
                $this->IUIDoneYesNo1->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IUIDoneYesNo1->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IUIDoneYesNo1->ViewValue->add($this->IUIDoneYesNo1->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IUIDoneYesNo1->ViewValue = null;
            }
            $this->IUIDoneYesNo1->ViewCustomAttributes = "";

            // UPTTestDate1
            $this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
            $this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 7);
            $this->UPTTestDate1->ViewCustomAttributes = "";

            // UPTTestYesNo1
            if (strval($this->UPTTestYesNo1->CurrentValue) != "") {
                $this->UPTTestYesNo1->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->UPTTestYesNo1->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->UPTTestYesNo1->ViewValue->add($this->UPTTestYesNo1->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->UPTTestYesNo1->ViewValue = null;
            }
            $this->UPTTestYesNo1->ViewCustomAttributes = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
            $this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 7);
            $this->IUIDoneDate2->ViewCustomAttributes = "";

            // IUIDoneYesNo2
            if (strval($this->IUIDoneYesNo2->CurrentValue) != "") {
                $this->IUIDoneYesNo2->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IUIDoneYesNo2->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IUIDoneYesNo2->ViewValue->add($this->IUIDoneYesNo2->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IUIDoneYesNo2->ViewValue = null;
            }
            $this->IUIDoneYesNo2->ViewCustomAttributes = "";

            // UPTTestDate2
            $this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
            $this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 7);
            $this->UPTTestDate2->ViewCustomAttributes = "";

            // UPTTestYesNo2
            if (strval($this->UPTTestYesNo2->CurrentValue) != "") {
                $this->UPTTestYesNo2->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->UPTTestYesNo2->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->UPTTestYesNo2->ViewValue->add($this->UPTTestYesNo2->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->UPTTestYesNo2->ViewValue = null;
            }
            $this->UPTTestYesNo2->ViewCustomAttributes = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
            $this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 7);
            $this->IUIDoneDate3->ViewCustomAttributes = "";

            // IUIDoneYesNo3
            if (strval($this->IUIDoneYesNo3->CurrentValue) != "") {
                $this->IUIDoneYesNo3->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IUIDoneYesNo3->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IUIDoneYesNo3->ViewValue->add($this->IUIDoneYesNo3->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IUIDoneYesNo3->ViewValue = null;
            }
            $this->IUIDoneYesNo3->ViewCustomAttributes = "";

            // UPTTestDate3
            $this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
            $this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 7);
            $this->UPTTestDate3->ViewCustomAttributes = "";

            // UPTTestYesNo3
            if (strval($this->UPTTestYesNo3->CurrentValue) != "") {
                $this->UPTTestYesNo3->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->UPTTestYesNo3->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->UPTTestYesNo3->ViewValue->add($this->UPTTestYesNo3->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->UPTTestYesNo3->ViewValue = null;
            }
            $this->UPTTestYesNo3->ViewCustomAttributes = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
            $this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 7);
            $this->IUIDoneDate4->ViewCustomAttributes = "";

            // IUIDoneYesNo4
            if (strval($this->IUIDoneYesNo4->CurrentValue) != "") {
                $this->IUIDoneYesNo4->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IUIDoneYesNo4->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IUIDoneYesNo4->ViewValue->add($this->IUIDoneYesNo4->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IUIDoneYesNo4->ViewValue = null;
            }
            $this->IUIDoneYesNo4->ViewCustomAttributes = "";

            // UPTTestDate4
            $this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
            $this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 7);
            $this->UPTTestDate4->ViewCustomAttributes = "";

            // UPTTestYesNo4
            if (strval($this->UPTTestYesNo4->CurrentValue) != "") {
                $this->UPTTestYesNo4->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->UPTTestYesNo4->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->UPTTestYesNo4->ViewValue->add($this->UPTTestYesNo4->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->UPTTestYesNo4->ViewValue = null;
            }
            $this->UPTTestYesNo4->ViewCustomAttributes = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
            $this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 7);
            $this->IVFStimulationDate->ViewCustomAttributes = "";

            // IVFStimulationYesNo
            if (strval($this->IVFStimulationYesNo->CurrentValue) != "") {
                $this->IVFStimulationYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IVFStimulationYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IVFStimulationYesNo->ViewValue->add($this->IVFStimulationYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IVFStimulationYesNo->ViewValue = null;
            }
            $this->IVFStimulationYesNo->ViewCustomAttributes = "";

            // OPUDate
            $this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
            $this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 7);
            $this->OPUDate->ViewCustomAttributes = "";

            // OPUYesNo
            if (strval($this->OPUYesNo->CurrentValue) != "") {
                $this->OPUYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->OPUYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->OPUYesNo->ViewValue->add($this->OPUYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->OPUYesNo->ViewValue = null;
            }
            $this->OPUYesNo->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 7);
            $this->ETDate->ViewCustomAttributes = "";

            // ETYesNo
            if (strval($this->ETYesNo->CurrentValue) != "") {
                $this->ETYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ETYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ETYesNo->ViewValue->add($this->ETYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ETYesNo->ViewValue = null;
            }
            $this->ETYesNo->ViewCustomAttributes = "";

            // BetaHCGDate
            $this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
            $this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 7);
            $this->BetaHCGDate->ViewCustomAttributes = "";

            // BetaHCGYesNo
            if (strval($this->BetaHCGYesNo->CurrentValue) != "") {
                $this->BetaHCGYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->BetaHCGYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->BetaHCGYesNo->ViewValue->add($this->BetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->BetaHCGYesNo->ViewValue = null;
            }
            $this->BetaHCGYesNo->ViewCustomAttributes = "";

            // FETDate
            $this->FETDate->ViewValue = $this->FETDate->CurrentValue;
            $this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 7);
            $this->FETDate->ViewCustomAttributes = "";

            // FETYesNo
            if (strval($this->FETYesNo->CurrentValue) != "") {
                $this->FETYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->FETYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->FETYesNo->ViewValue->add($this->FETYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->FETYesNo->ViewValue = null;
            }
            $this->FETYesNo->ViewCustomAttributes = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
            $this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 7);
            $this->FBetaHCGDate->ViewCustomAttributes = "";

            // FBetaHCGYesNo
            if (strval($this->FBetaHCGYesNo->CurrentValue) != "") {
                $this->FBetaHCGYesNo->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->FBetaHCGYesNo->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->FBetaHCGYesNo->ViewValue->add($this->FBetaHCGYesNo->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->FBetaHCGYesNo->ViewValue = null;
            }
            $this->FBetaHCGYesNo->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // MobileNo
            $this->MobileNo->LinkCustomAttributes = "";
            $this->MobileNo->HrefValue = "";
            $this->MobileNo->TooltipValue = "";

            // ConsultantName
            $this->ConsultantName->LinkCustomAttributes = "";
            $this->ConsultantName->HrefValue = "";
            $this->ConsultantName->TooltipValue = "";

            // RefDrName
            $this->RefDrName->LinkCustomAttributes = "";
            $this->RefDrName->HrefValue = "";
            $this->RefDrName->TooltipValue = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->LinkCustomAttributes = "";
            $this->RefDrMobileNo->HrefValue = "";
            $this->RefDrMobileNo->TooltipValue = "";

            // NewVisitDate
            $this->NewVisitDate->LinkCustomAttributes = "";
            $this->NewVisitDate->HrefValue = "";
            $this->NewVisitDate->TooltipValue = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->LinkCustomAttributes = "";
            $this->NewVisitYesNo->HrefValue = "";
            $this->NewVisitYesNo->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->LinkCustomAttributes = "";
            $this->IUIDoneDate1->HrefValue = "";
            $this->IUIDoneDate1->TooltipValue = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->LinkCustomAttributes = "";
            $this->IUIDoneYesNo1->HrefValue = "";
            $this->IUIDoneYesNo1->TooltipValue = "";

            // UPTTestDate1
            $this->UPTTestDate1->LinkCustomAttributes = "";
            $this->UPTTestDate1->HrefValue = "";
            $this->UPTTestDate1->TooltipValue = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->LinkCustomAttributes = "";
            $this->UPTTestYesNo1->HrefValue = "";
            $this->UPTTestYesNo1->TooltipValue = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->LinkCustomAttributes = "";
            $this->IUIDoneDate2->HrefValue = "";
            $this->IUIDoneDate2->TooltipValue = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->LinkCustomAttributes = "";
            $this->IUIDoneYesNo2->HrefValue = "";
            $this->IUIDoneYesNo2->TooltipValue = "";

            // UPTTestDate2
            $this->UPTTestDate2->LinkCustomAttributes = "";
            $this->UPTTestDate2->HrefValue = "";
            $this->UPTTestDate2->TooltipValue = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->LinkCustomAttributes = "";
            $this->UPTTestYesNo2->HrefValue = "";
            $this->UPTTestYesNo2->TooltipValue = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->LinkCustomAttributes = "";
            $this->IUIDoneDate3->HrefValue = "";
            $this->IUIDoneDate3->TooltipValue = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->LinkCustomAttributes = "";
            $this->IUIDoneYesNo3->HrefValue = "";
            $this->IUIDoneYesNo3->TooltipValue = "";

            // UPTTestDate3
            $this->UPTTestDate3->LinkCustomAttributes = "";
            $this->UPTTestDate3->HrefValue = "";
            $this->UPTTestDate3->TooltipValue = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->LinkCustomAttributes = "";
            $this->UPTTestYesNo3->HrefValue = "";
            $this->UPTTestYesNo3->TooltipValue = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->LinkCustomAttributes = "";
            $this->IUIDoneDate4->HrefValue = "";
            $this->IUIDoneDate4->TooltipValue = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->LinkCustomAttributes = "";
            $this->IUIDoneYesNo4->HrefValue = "";
            $this->IUIDoneYesNo4->TooltipValue = "";

            // UPTTestDate4
            $this->UPTTestDate4->LinkCustomAttributes = "";
            $this->UPTTestDate4->HrefValue = "";
            $this->UPTTestDate4->TooltipValue = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->LinkCustomAttributes = "";
            $this->UPTTestYesNo4->HrefValue = "";
            $this->UPTTestYesNo4->TooltipValue = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->LinkCustomAttributes = "";
            $this->IVFStimulationDate->HrefValue = "";
            $this->IVFStimulationDate->TooltipValue = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->LinkCustomAttributes = "";
            $this->IVFStimulationYesNo->HrefValue = "";
            $this->IVFStimulationYesNo->TooltipValue = "";

            // OPUDate
            $this->OPUDate->LinkCustomAttributes = "";
            $this->OPUDate->HrefValue = "";
            $this->OPUDate->TooltipValue = "";

            // OPUYesNo
            $this->OPUYesNo->LinkCustomAttributes = "";
            $this->OPUYesNo->HrefValue = "";
            $this->OPUYesNo->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // ETYesNo
            $this->ETYesNo->LinkCustomAttributes = "";
            $this->ETYesNo->HrefValue = "";
            $this->ETYesNo->TooltipValue = "";

            // BetaHCGDate
            $this->BetaHCGDate->LinkCustomAttributes = "";
            $this->BetaHCGDate->HrefValue = "";
            $this->BetaHCGDate->TooltipValue = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->LinkCustomAttributes = "";
            $this->BetaHCGYesNo->HrefValue = "";
            $this->BetaHCGYesNo->TooltipValue = "";

            // FETDate
            $this->FETDate->LinkCustomAttributes = "";
            $this->FETDate->HrefValue = "";
            $this->FETDate->TooltipValue = "";

            // FETYesNo
            $this->FETYesNo->LinkCustomAttributes = "";
            $this->FETYesNo->HrefValue = "";
            $this->FETYesNo->TooltipValue = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->LinkCustomAttributes = "";
            $this->FBetaHCGDate->HrefValue = "";
            $this->FBetaHCGDate->TooltipValue = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->LinkCustomAttributes = "";
            $this->FBetaHCGYesNo->HrefValue = "";
            $this->FBetaHCGYesNo->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fmonitor_treatment_planlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fmonitor_treatment_planlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fmonitor_treatment_planlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_monitor_treatment_plan" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_monitor_treatment_plan\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fmonitor_treatment_planlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fmonitor_treatment_planlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_PatId":
                    break;
                case "x_NewVisitYesNo":
                    break;
                case "x_Treatment":
                    break;
                case "x_IUIDoneYesNo1":
                    break;
                case "x_UPTTestYesNo1":
                    break;
                case "x_IUIDoneYesNo2":
                    break;
                case "x_UPTTestYesNo2":
                    break;
                case "x_IUIDoneYesNo3":
                    break;
                case "x_UPTTestYesNo3":
                    break;
                case "x_IUIDoneYesNo4":
                    break;
                case "x_UPTTestYesNo4":
                    break;
                case "x_IVFStimulationYesNo":
                    break;
                case "x_OPUYesNo":
                    break;
                case "x_ETYesNo":
                    break;
                case "x_BetaHCGYesNo":
                    break;
                case "x_FETYesNo":
                    break;
                case "x_FBetaHCGYesNo":
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
