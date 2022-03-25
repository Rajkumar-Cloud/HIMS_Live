<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class RecruitmentCandidatesList extends RecruitmentCandidates
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'recruitment_candidates';

    // Page object name
    public $PageObjName = "RecruitmentCandidatesList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "frecruitment_candidateslist";
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

        // Table object (recruitment_candidates)
        if (!isset($GLOBALS["recruitment_candidates"]) || get_class($GLOBALS["recruitment_candidates"]) == PROJECT_NAMESPACE . "recruitment_candidates") {
            $GLOBALS["recruitment_candidates"] = &$this;
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
        $this->AddUrl = "RecruitmentCandidatesAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "RecruitmentCandidatesDelete";
        $this->MultiUpdateUrl = "RecruitmentCandidatesUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_candidates');
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
        $this->FilterOptions->TagClassName = "ew-filter-option frecruitment_candidateslistsrch";

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
                $doc = new $class(Container("recruitment_candidates"));
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
        $this->first_name->setVisibility();
        $this->last_name->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->gender->setVisibility();
        $this->marital_status->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->_email->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->cv_title->setVisibility();
        $this->cv->setVisibility();
        $this->cvtext->Visible = false;
        $this->industry->Visible = false;
        $this->profileImage->setVisibility();
        $this->head_line->Visible = false;
        $this->objective->Visible = false;
        $this->work_history->Visible = false;
        $this->education->Visible = false;
        $this->skills->Visible = false;
        $this->referees->Visible = false;
        $this->linkedInUrl->Visible = false;
        $this->linkedInData->Visible = false;
        $this->totalYearsOfExperience->setVisibility();
        $this->totalMonthsOfExperience->setVisibility();
        $this->htmlCVData->Visible = false;
        $this->generatedCVFile->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
        $this->expectedSalary->setVisibility();
        $this->preferedPositions->Visible = false;
        $this->preferedJobtype->setVisibility();
        $this->preferedCountries->Visible = false;
        $this->tags->Visible = false;
        $this->notes->Visible = false;
        $this->calls->Visible = false;
        $this->age->setVisibility();
        $this->hash->setVisibility();
        $this->linkedInProfileLink->setVisibility();
        $this->linkedInProfileId->setVisibility();
        $this->facebookProfileLink->setVisibility();
        $this->facebookProfileId->setVisibility();
        $this->twitterProfileLink->setVisibility();
        $this->twitterProfileId->setVisibility();
        $this->googleProfileLink->setVisibility();
        $this->googleProfileId->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "frecruitment_candidateslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
        $filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
        $filterList = Concat($filterList, $this->nationality->AdvancedSearch->toJson(), ","); // Field nationality
        $filterList = Concat($filterList, $this->birthday->AdvancedSearch->toJson(), ","); // Field birthday
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
        $filterList = Concat($filterList, $this->marital_status->AdvancedSearch->toJson(), ","); // Field marital_status
        $filterList = Concat($filterList, $this->address1->AdvancedSearch->toJson(), ","); // Field address1
        $filterList = Concat($filterList, $this->address2->AdvancedSearch->toJson(), ","); // Field address2
        $filterList = Concat($filterList, $this->city->AdvancedSearch->toJson(), ","); // Field city
        $filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
        $filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
        $filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
        $filterList = Concat($filterList, $this->_email->AdvancedSearch->toJson(), ","); // Field email
        $filterList = Concat($filterList, $this->home_phone->AdvancedSearch->toJson(), ","); // Field home_phone
        $filterList = Concat($filterList, $this->mobile_phone->AdvancedSearch->toJson(), ","); // Field mobile_phone
        $filterList = Concat($filterList, $this->cv_title->AdvancedSearch->toJson(), ","); // Field cv_title
        $filterList = Concat($filterList, $this->cv->AdvancedSearch->toJson(), ","); // Field cv
        $filterList = Concat($filterList, $this->cvtext->AdvancedSearch->toJson(), ","); // Field cvtext
        $filterList = Concat($filterList, $this->industry->AdvancedSearch->toJson(), ","); // Field industry
        $filterList = Concat($filterList, $this->profileImage->AdvancedSearch->toJson(), ","); // Field profileImage
        $filterList = Concat($filterList, $this->head_line->AdvancedSearch->toJson(), ","); // Field head_line
        $filterList = Concat($filterList, $this->objective->AdvancedSearch->toJson(), ","); // Field objective
        $filterList = Concat($filterList, $this->work_history->AdvancedSearch->toJson(), ","); // Field work_history
        $filterList = Concat($filterList, $this->education->AdvancedSearch->toJson(), ","); // Field education
        $filterList = Concat($filterList, $this->skills->AdvancedSearch->toJson(), ","); // Field skills
        $filterList = Concat($filterList, $this->referees->AdvancedSearch->toJson(), ","); // Field referees
        $filterList = Concat($filterList, $this->linkedInUrl->AdvancedSearch->toJson(), ","); // Field linkedInUrl
        $filterList = Concat($filterList, $this->linkedInData->AdvancedSearch->toJson(), ","); // Field linkedInData
        $filterList = Concat($filterList, $this->totalYearsOfExperience->AdvancedSearch->toJson(), ","); // Field totalYearsOfExperience
        $filterList = Concat($filterList, $this->totalMonthsOfExperience->AdvancedSearch->toJson(), ","); // Field totalMonthsOfExperience
        $filterList = Concat($filterList, $this->htmlCVData->AdvancedSearch->toJson(), ","); // Field htmlCVData
        $filterList = Concat($filterList, $this->generatedCVFile->AdvancedSearch->toJson(), ","); // Field generatedCVFile
        $filterList = Concat($filterList, $this->created->AdvancedSearch->toJson(), ","); // Field created
        $filterList = Concat($filterList, $this->updated->AdvancedSearch->toJson(), ","); // Field updated
        $filterList = Concat($filterList, $this->expectedSalary->AdvancedSearch->toJson(), ","); // Field expectedSalary
        $filterList = Concat($filterList, $this->preferedPositions->AdvancedSearch->toJson(), ","); // Field preferedPositions
        $filterList = Concat($filterList, $this->preferedJobtype->AdvancedSearch->toJson(), ","); // Field preferedJobtype
        $filterList = Concat($filterList, $this->preferedCountries->AdvancedSearch->toJson(), ","); // Field preferedCountries
        $filterList = Concat($filterList, $this->tags->AdvancedSearch->toJson(), ","); // Field tags
        $filterList = Concat($filterList, $this->notes->AdvancedSearch->toJson(), ","); // Field notes
        $filterList = Concat($filterList, $this->calls->AdvancedSearch->toJson(), ","); // Field calls
        $filterList = Concat($filterList, $this->age->AdvancedSearch->toJson(), ","); // Field age
        $filterList = Concat($filterList, $this->hash->AdvancedSearch->toJson(), ","); // Field hash
        $filterList = Concat($filterList, $this->linkedInProfileLink->AdvancedSearch->toJson(), ","); // Field linkedInProfileLink
        $filterList = Concat($filterList, $this->linkedInProfileId->AdvancedSearch->toJson(), ","); // Field linkedInProfileId
        $filterList = Concat($filterList, $this->facebookProfileLink->AdvancedSearch->toJson(), ","); // Field facebookProfileLink
        $filterList = Concat($filterList, $this->facebookProfileId->AdvancedSearch->toJson(), ","); // Field facebookProfileId
        $filterList = Concat($filterList, $this->twitterProfileLink->AdvancedSearch->toJson(), ","); // Field twitterProfileLink
        $filterList = Concat($filterList, $this->twitterProfileId->AdvancedSearch->toJson(), ","); // Field twitterProfileId
        $filterList = Concat($filterList, $this->googleProfileLink->AdvancedSearch->toJson(), ","); // Field googleProfileLink
        $filterList = Concat($filterList, $this->googleProfileId->AdvancedSearch->toJson(), ","); // Field googleProfileId
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
            $UserProfile->setSearchFilters(CurrentUserName(), "frecruitment_candidateslistsrch", $filters);
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

        // Field first_name
        $this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
        $this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
        $this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
        $this->first_name->AdvancedSearch->save();

        // Field last_name
        $this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
        $this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
        $this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
        $this->last_name->AdvancedSearch->save();

        // Field nationality
        $this->nationality->AdvancedSearch->SearchValue = @$filter["x_nationality"];
        $this->nationality->AdvancedSearch->SearchOperator = @$filter["z_nationality"];
        $this->nationality->AdvancedSearch->SearchCondition = @$filter["v_nationality"];
        $this->nationality->AdvancedSearch->SearchValue2 = @$filter["y_nationality"];
        $this->nationality->AdvancedSearch->SearchOperator2 = @$filter["w_nationality"];
        $this->nationality->AdvancedSearch->save();

        // Field birthday
        $this->birthday->AdvancedSearch->SearchValue = @$filter["x_birthday"];
        $this->birthday->AdvancedSearch->SearchOperator = @$filter["z_birthday"];
        $this->birthday->AdvancedSearch->SearchCondition = @$filter["v_birthday"];
        $this->birthday->AdvancedSearch->SearchValue2 = @$filter["y_birthday"];
        $this->birthday->AdvancedSearch->SearchOperator2 = @$filter["w_birthday"];
        $this->birthday->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();

        // Field marital_status
        $this->marital_status->AdvancedSearch->SearchValue = @$filter["x_marital_status"];
        $this->marital_status->AdvancedSearch->SearchOperator = @$filter["z_marital_status"];
        $this->marital_status->AdvancedSearch->SearchCondition = @$filter["v_marital_status"];
        $this->marital_status->AdvancedSearch->SearchValue2 = @$filter["y_marital_status"];
        $this->marital_status->AdvancedSearch->SearchOperator2 = @$filter["w_marital_status"];
        $this->marital_status->AdvancedSearch->save();

        // Field address1
        $this->address1->AdvancedSearch->SearchValue = @$filter["x_address1"];
        $this->address1->AdvancedSearch->SearchOperator = @$filter["z_address1"];
        $this->address1->AdvancedSearch->SearchCondition = @$filter["v_address1"];
        $this->address1->AdvancedSearch->SearchValue2 = @$filter["y_address1"];
        $this->address1->AdvancedSearch->SearchOperator2 = @$filter["w_address1"];
        $this->address1->AdvancedSearch->save();

        // Field address2
        $this->address2->AdvancedSearch->SearchValue = @$filter["x_address2"];
        $this->address2->AdvancedSearch->SearchOperator = @$filter["z_address2"];
        $this->address2->AdvancedSearch->SearchCondition = @$filter["v_address2"];
        $this->address2->AdvancedSearch->SearchValue2 = @$filter["y_address2"];
        $this->address2->AdvancedSearch->SearchOperator2 = @$filter["w_address2"];
        $this->address2->AdvancedSearch->save();

        // Field city
        $this->city->AdvancedSearch->SearchValue = @$filter["x_city"];
        $this->city->AdvancedSearch->SearchOperator = @$filter["z_city"];
        $this->city->AdvancedSearch->SearchCondition = @$filter["v_city"];
        $this->city->AdvancedSearch->SearchValue2 = @$filter["y_city"];
        $this->city->AdvancedSearch->SearchOperator2 = @$filter["w_city"];
        $this->city->AdvancedSearch->save();

        // Field country
        $this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
        $this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
        $this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
        $this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
        $this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
        $this->country->AdvancedSearch->save();

        // Field province
        $this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
        $this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
        $this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
        $this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
        $this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
        $this->province->AdvancedSearch->save();

        // Field postal_code
        $this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
        $this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
        $this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
        $this->postal_code->AdvancedSearch->save();

        // Field email
        $this->_email->AdvancedSearch->SearchValue = @$filter["x__email"];
        $this->_email->AdvancedSearch->SearchOperator = @$filter["z__email"];
        $this->_email->AdvancedSearch->SearchCondition = @$filter["v__email"];
        $this->_email->AdvancedSearch->SearchValue2 = @$filter["y__email"];
        $this->_email->AdvancedSearch->SearchOperator2 = @$filter["w__email"];
        $this->_email->AdvancedSearch->save();

        // Field home_phone
        $this->home_phone->AdvancedSearch->SearchValue = @$filter["x_home_phone"];
        $this->home_phone->AdvancedSearch->SearchOperator = @$filter["z_home_phone"];
        $this->home_phone->AdvancedSearch->SearchCondition = @$filter["v_home_phone"];
        $this->home_phone->AdvancedSearch->SearchValue2 = @$filter["y_home_phone"];
        $this->home_phone->AdvancedSearch->SearchOperator2 = @$filter["w_home_phone"];
        $this->home_phone->AdvancedSearch->save();

        // Field mobile_phone
        $this->mobile_phone->AdvancedSearch->SearchValue = @$filter["x_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchOperator = @$filter["z_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchCondition = @$filter["v_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchValue2 = @$filter["y_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_phone"];
        $this->mobile_phone->AdvancedSearch->save();

        // Field cv_title
        $this->cv_title->AdvancedSearch->SearchValue = @$filter["x_cv_title"];
        $this->cv_title->AdvancedSearch->SearchOperator = @$filter["z_cv_title"];
        $this->cv_title->AdvancedSearch->SearchCondition = @$filter["v_cv_title"];
        $this->cv_title->AdvancedSearch->SearchValue2 = @$filter["y_cv_title"];
        $this->cv_title->AdvancedSearch->SearchOperator2 = @$filter["w_cv_title"];
        $this->cv_title->AdvancedSearch->save();

        // Field cv
        $this->cv->AdvancedSearch->SearchValue = @$filter["x_cv"];
        $this->cv->AdvancedSearch->SearchOperator = @$filter["z_cv"];
        $this->cv->AdvancedSearch->SearchCondition = @$filter["v_cv"];
        $this->cv->AdvancedSearch->SearchValue2 = @$filter["y_cv"];
        $this->cv->AdvancedSearch->SearchOperator2 = @$filter["w_cv"];
        $this->cv->AdvancedSearch->save();

        // Field cvtext
        $this->cvtext->AdvancedSearch->SearchValue = @$filter["x_cvtext"];
        $this->cvtext->AdvancedSearch->SearchOperator = @$filter["z_cvtext"];
        $this->cvtext->AdvancedSearch->SearchCondition = @$filter["v_cvtext"];
        $this->cvtext->AdvancedSearch->SearchValue2 = @$filter["y_cvtext"];
        $this->cvtext->AdvancedSearch->SearchOperator2 = @$filter["w_cvtext"];
        $this->cvtext->AdvancedSearch->save();

        // Field industry
        $this->industry->AdvancedSearch->SearchValue = @$filter["x_industry"];
        $this->industry->AdvancedSearch->SearchOperator = @$filter["z_industry"];
        $this->industry->AdvancedSearch->SearchCondition = @$filter["v_industry"];
        $this->industry->AdvancedSearch->SearchValue2 = @$filter["y_industry"];
        $this->industry->AdvancedSearch->SearchOperator2 = @$filter["w_industry"];
        $this->industry->AdvancedSearch->save();

        // Field profileImage
        $this->profileImage->AdvancedSearch->SearchValue = @$filter["x_profileImage"];
        $this->profileImage->AdvancedSearch->SearchOperator = @$filter["z_profileImage"];
        $this->profileImage->AdvancedSearch->SearchCondition = @$filter["v_profileImage"];
        $this->profileImage->AdvancedSearch->SearchValue2 = @$filter["y_profileImage"];
        $this->profileImage->AdvancedSearch->SearchOperator2 = @$filter["w_profileImage"];
        $this->profileImage->AdvancedSearch->save();

        // Field head_line
        $this->head_line->AdvancedSearch->SearchValue = @$filter["x_head_line"];
        $this->head_line->AdvancedSearch->SearchOperator = @$filter["z_head_line"];
        $this->head_line->AdvancedSearch->SearchCondition = @$filter["v_head_line"];
        $this->head_line->AdvancedSearch->SearchValue2 = @$filter["y_head_line"];
        $this->head_line->AdvancedSearch->SearchOperator2 = @$filter["w_head_line"];
        $this->head_line->AdvancedSearch->save();

        // Field objective
        $this->objective->AdvancedSearch->SearchValue = @$filter["x_objective"];
        $this->objective->AdvancedSearch->SearchOperator = @$filter["z_objective"];
        $this->objective->AdvancedSearch->SearchCondition = @$filter["v_objective"];
        $this->objective->AdvancedSearch->SearchValue2 = @$filter["y_objective"];
        $this->objective->AdvancedSearch->SearchOperator2 = @$filter["w_objective"];
        $this->objective->AdvancedSearch->save();

        // Field work_history
        $this->work_history->AdvancedSearch->SearchValue = @$filter["x_work_history"];
        $this->work_history->AdvancedSearch->SearchOperator = @$filter["z_work_history"];
        $this->work_history->AdvancedSearch->SearchCondition = @$filter["v_work_history"];
        $this->work_history->AdvancedSearch->SearchValue2 = @$filter["y_work_history"];
        $this->work_history->AdvancedSearch->SearchOperator2 = @$filter["w_work_history"];
        $this->work_history->AdvancedSearch->save();

        // Field education
        $this->education->AdvancedSearch->SearchValue = @$filter["x_education"];
        $this->education->AdvancedSearch->SearchOperator = @$filter["z_education"];
        $this->education->AdvancedSearch->SearchCondition = @$filter["v_education"];
        $this->education->AdvancedSearch->SearchValue2 = @$filter["y_education"];
        $this->education->AdvancedSearch->SearchOperator2 = @$filter["w_education"];
        $this->education->AdvancedSearch->save();

        // Field skills
        $this->skills->AdvancedSearch->SearchValue = @$filter["x_skills"];
        $this->skills->AdvancedSearch->SearchOperator = @$filter["z_skills"];
        $this->skills->AdvancedSearch->SearchCondition = @$filter["v_skills"];
        $this->skills->AdvancedSearch->SearchValue2 = @$filter["y_skills"];
        $this->skills->AdvancedSearch->SearchOperator2 = @$filter["w_skills"];
        $this->skills->AdvancedSearch->save();

        // Field referees
        $this->referees->AdvancedSearch->SearchValue = @$filter["x_referees"];
        $this->referees->AdvancedSearch->SearchOperator = @$filter["z_referees"];
        $this->referees->AdvancedSearch->SearchCondition = @$filter["v_referees"];
        $this->referees->AdvancedSearch->SearchValue2 = @$filter["y_referees"];
        $this->referees->AdvancedSearch->SearchOperator2 = @$filter["w_referees"];
        $this->referees->AdvancedSearch->save();

        // Field linkedInUrl
        $this->linkedInUrl->AdvancedSearch->SearchValue = @$filter["x_linkedInUrl"];
        $this->linkedInUrl->AdvancedSearch->SearchOperator = @$filter["z_linkedInUrl"];
        $this->linkedInUrl->AdvancedSearch->SearchCondition = @$filter["v_linkedInUrl"];
        $this->linkedInUrl->AdvancedSearch->SearchValue2 = @$filter["y_linkedInUrl"];
        $this->linkedInUrl->AdvancedSearch->SearchOperator2 = @$filter["w_linkedInUrl"];
        $this->linkedInUrl->AdvancedSearch->save();

        // Field linkedInData
        $this->linkedInData->AdvancedSearch->SearchValue = @$filter["x_linkedInData"];
        $this->linkedInData->AdvancedSearch->SearchOperator = @$filter["z_linkedInData"];
        $this->linkedInData->AdvancedSearch->SearchCondition = @$filter["v_linkedInData"];
        $this->linkedInData->AdvancedSearch->SearchValue2 = @$filter["y_linkedInData"];
        $this->linkedInData->AdvancedSearch->SearchOperator2 = @$filter["w_linkedInData"];
        $this->linkedInData->AdvancedSearch->save();

        // Field totalYearsOfExperience
        $this->totalYearsOfExperience->AdvancedSearch->SearchValue = @$filter["x_totalYearsOfExperience"];
        $this->totalYearsOfExperience->AdvancedSearch->SearchOperator = @$filter["z_totalYearsOfExperience"];
        $this->totalYearsOfExperience->AdvancedSearch->SearchCondition = @$filter["v_totalYearsOfExperience"];
        $this->totalYearsOfExperience->AdvancedSearch->SearchValue2 = @$filter["y_totalYearsOfExperience"];
        $this->totalYearsOfExperience->AdvancedSearch->SearchOperator2 = @$filter["w_totalYearsOfExperience"];
        $this->totalYearsOfExperience->AdvancedSearch->save();

        // Field totalMonthsOfExperience
        $this->totalMonthsOfExperience->AdvancedSearch->SearchValue = @$filter["x_totalMonthsOfExperience"];
        $this->totalMonthsOfExperience->AdvancedSearch->SearchOperator = @$filter["z_totalMonthsOfExperience"];
        $this->totalMonthsOfExperience->AdvancedSearch->SearchCondition = @$filter["v_totalMonthsOfExperience"];
        $this->totalMonthsOfExperience->AdvancedSearch->SearchValue2 = @$filter["y_totalMonthsOfExperience"];
        $this->totalMonthsOfExperience->AdvancedSearch->SearchOperator2 = @$filter["w_totalMonthsOfExperience"];
        $this->totalMonthsOfExperience->AdvancedSearch->save();

        // Field htmlCVData
        $this->htmlCVData->AdvancedSearch->SearchValue = @$filter["x_htmlCVData"];
        $this->htmlCVData->AdvancedSearch->SearchOperator = @$filter["z_htmlCVData"];
        $this->htmlCVData->AdvancedSearch->SearchCondition = @$filter["v_htmlCVData"];
        $this->htmlCVData->AdvancedSearch->SearchValue2 = @$filter["y_htmlCVData"];
        $this->htmlCVData->AdvancedSearch->SearchOperator2 = @$filter["w_htmlCVData"];
        $this->htmlCVData->AdvancedSearch->save();

        // Field generatedCVFile
        $this->generatedCVFile->AdvancedSearch->SearchValue = @$filter["x_generatedCVFile"];
        $this->generatedCVFile->AdvancedSearch->SearchOperator = @$filter["z_generatedCVFile"];
        $this->generatedCVFile->AdvancedSearch->SearchCondition = @$filter["v_generatedCVFile"];
        $this->generatedCVFile->AdvancedSearch->SearchValue2 = @$filter["y_generatedCVFile"];
        $this->generatedCVFile->AdvancedSearch->SearchOperator2 = @$filter["w_generatedCVFile"];
        $this->generatedCVFile->AdvancedSearch->save();

        // Field created
        $this->created->AdvancedSearch->SearchValue = @$filter["x_created"];
        $this->created->AdvancedSearch->SearchOperator = @$filter["z_created"];
        $this->created->AdvancedSearch->SearchCondition = @$filter["v_created"];
        $this->created->AdvancedSearch->SearchValue2 = @$filter["y_created"];
        $this->created->AdvancedSearch->SearchOperator2 = @$filter["w_created"];
        $this->created->AdvancedSearch->save();

        // Field updated
        $this->updated->AdvancedSearch->SearchValue = @$filter["x_updated"];
        $this->updated->AdvancedSearch->SearchOperator = @$filter["z_updated"];
        $this->updated->AdvancedSearch->SearchCondition = @$filter["v_updated"];
        $this->updated->AdvancedSearch->SearchValue2 = @$filter["y_updated"];
        $this->updated->AdvancedSearch->SearchOperator2 = @$filter["w_updated"];
        $this->updated->AdvancedSearch->save();

        // Field expectedSalary
        $this->expectedSalary->AdvancedSearch->SearchValue = @$filter["x_expectedSalary"];
        $this->expectedSalary->AdvancedSearch->SearchOperator = @$filter["z_expectedSalary"];
        $this->expectedSalary->AdvancedSearch->SearchCondition = @$filter["v_expectedSalary"];
        $this->expectedSalary->AdvancedSearch->SearchValue2 = @$filter["y_expectedSalary"];
        $this->expectedSalary->AdvancedSearch->SearchOperator2 = @$filter["w_expectedSalary"];
        $this->expectedSalary->AdvancedSearch->save();

        // Field preferedPositions
        $this->preferedPositions->AdvancedSearch->SearchValue = @$filter["x_preferedPositions"];
        $this->preferedPositions->AdvancedSearch->SearchOperator = @$filter["z_preferedPositions"];
        $this->preferedPositions->AdvancedSearch->SearchCondition = @$filter["v_preferedPositions"];
        $this->preferedPositions->AdvancedSearch->SearchValue2 = @$filter["y_preferedPositions"];
        $this->preferedPositions->AdvancedSearch->SearchOperator2 = @$filter["w_preferedPositions"];
        $this->preferedPositions->AdvancedSearch->save();

        // Field preferedJobtype
        $this->preferedJobtype->AdvancedSearch->SearchValue = @$filter["x_preferedJobtype"];
        $this->preferedJobtype->AdvancedSearch->SearchOperator = @$filter["z_preferedJobtype"];
        $this->preferedJobtype->AdvancedSearch->SearchCondition = @$filter["v_preferedJobtype"];
        $this->preferedJobtype->AdvancedSearch->SearchValue2 = @$filter["y_preferedJobtype"];
        $this->preferedJobtype->AdvancedSearch->SearchOperator2 = @$filter["w_preferedJobtype"];
        $this->preferedJobtype->AdvancedSearch->save();

        // Field preferedCountries
        $this->preferedCountries->AdvancedSearch->SearchValue = @$filter["x_preferedCountries"];
        $this->preferedCountries->AdvancedSearch->SearchOperator = @$filter["z_preferedCountries"];
        $this->preferedCountries->AdvancedSearch->SearchCondition = @$filter["v_preferedCountries"];
        $this->preferedCountries->AdvancedSearch->SearchValue2 = @$filter["y_preferedCountries"];
        $this->preferedCountries->AdvancedSearch->SearchOperator2 = @$filter["w_preferedCountries"];
        $this->preferedCountries->AdvancedSearch->save();

        // Field tags
        $this->tags->AdvancedSearch->SearchValue = @$filter["x_tags"];
        $this->tags->AdvancedSearch->SearchOperator = @$filter["z_tags"];
        $this->tags->AdvancedSearch->SearchCondition = @$filter["v_tags"];
        $this->tags->AdvancedSearch->SearchValue2 = @$filter["y_tags"];
        $this->tags->AdvancedSearch->SearchOperator2 = @$filter["w_tags"];
        $this->tags->AdvancedSearch->save();

        // Field notes
        $this->notes->AdvancedSearch->SearchValue = @$filter["x_notes"];
        $this->notes->AdvancedSearch->SearchOperator = @$filter["z_notes"];
        $this->notes->AdvancedSearch->SearchCondition = @$filter["v_notes"];
        $this->notes->AdvancedSearch->SearchValue2 = @$filter["y_notes"];
        $this->notes->AdvancedSearch->SearchOperator2 = @$filter["w_notes"];
        $this->notes->AdvancedSearch->save();

        // Field calls
        $this->calls->AdvancedSearch->SearchValue = @$filter["x_calls"];
        $this->calls->AdvancedSearch->SearchOperator = @$filter["z_calls"];
        $this->calls->AdvancedSearch->SearchCondition = @$filter["v_calls"];
        $this->calls->AdvancedSearch->SearchValue2 = @$filter["y_calls"];
        $this->calls->AdvancedSearch->SearchOperator2 = @$filter["w_calls"];
        $this->calls->AdvancedSearch->save();

        // Field age
        $this->age->AdvancedSearch->SearchValue = @$filter["x_age"];
        $this->age->AdvancedSearch->SearchOperator = @$filter["z_age"];
        $this->age->AdvancedSearch->SearchCondition = @$filter["v_age"];
        $this->age->AdvancedSearch->SearchValue2 = @$filter["y_age"];
        $this->age->AdvancedSearch->SearchOperator2 = @$filter["w_age"];
        $this->age->AdvancedSearch->save();

        // Field hash
        $this->hash->AdvancedSearch->SearchValue = @$filter["x_hash"];
        $this->hash->AdvancedSearch->SearchOperator = @$filter["z_hash"];
        $this->hash->AdvancedSearch->SearchCondition = @$filter["v_hash"];
        $this->hash->AdvancedSearch->SearchValue2 = @$filter["y_hash"];
        $this->hash->AdvancedSearch->SearchOperator2 = @$filter["w_hash"];
        $this->hash->AdvancedSearch->save();

        // Field linkedInProfileLink
        $this->linkedInProfileLink->AdvancedSearch->SearchValue = @$filter["x_linkedInProfileLink"];
        $this->linkedInProfileLink->AdvancedSearch->SearchOperator = @$filter["z_linkedInProfileLink"];
        $this->linkedInProfileLink->AdvancedSearch->SearchCondition = @$filter["v_linkedInProfileLink"];
        $this->linkedInProfileLink->AdvancedSearch->SearchValue2 = @$filter["y_linkedInProfileLink"];
        $this->linkedInProfileLink->AdvancedSearch->SearchOperator2 = @$filter["w_linkedInProfileLink"];
        $this->linkedInProfileLink->AdvancedSearch->save();

        // Field linkedInProfileId
        $this->linkedInProfileId->AdvancedSearch->SearchValue = @$filter["x_linkedInProfileId"];
        $this->linkedInProfileId->AdvancedSearch->SearchOperator = @$filter["z_linkedInProfileId"];
        $this->linkedInProfileId->AdvancedSearch->SearchCondition = @$filter["v_linkedInProfileId"];
        $this->linkedInProfileId->AdvancedSearch->SearchValue2 = @$filter["y_linkedInProfileId"];
        $this->linkedInProfileId->AdvancedSearch->SearchOperator2 = @$filter["w_linkedInProfileId"];
        $this->linkedInProfileId->AdvancedSearch->save();

        // Field facebookProfileLink
        $this->facebookProfileLink->AdvancedSearch->SearchValue = @$filter["x_facebookProfileLink"];
        $this->facebookProfileLink->AdvancedSearch->SearchOperator = @$filter["z_facebookProfileLink"];
        $this->facebookProfileLink->AdvancedSearch->SearchCondition = @$filter["v_facebookProfileLink"];
        $this->facebookProfileLink->AdvancedSearch->SearchValue2 = @$filter["y_facebookProfileLink"];
        $this->facebookProfileLink->AdvancedSearch->SearchOperator2 = @$filter["w_facebookProfileLink"];
        $this->facebookProfileLink->AdvancedSearch->save();

        // Field facebookProfileId
        $this->facebookProfileId->AdvancedSearch->SearchValue = @$filter["x_facebookProfileId"];
        $this->facebookProfileId->AdvancedSearch->SearchOperator = @$filter["z_facebookProfileId"];
        $this->facebookProfileId->AdvancedSearch->SearchCondition = @$filter["v_facebookProfileId"];
        $this->facebookProfileId->AdvancedSearch->SearchValue2 = @$filter["y_facebookProfileId"];
        $this->facebookProfileId->AdvancedSearch->SearchOperator2 = @$filter["w_facebookProfileId"];
        $this->facebookProfileId->AdvancedSearch->save();

        // Field twitterProfileLink
        $this->twitterProfileLink->AdvancedSearch->SearchValue = @$filter["x_twitterProfileLink"];
        $this->twitterProfileLink->AdvancedSearch->SearchOperator = @$filter["z_twitterProfileLink"];
        $this->twitterProfileLink->AdvancedSearch->SearchCondition = @$filter["v_twitterProfileLink"];
        $this->twitterProfileLink->AdvancedSearch->SearchValue2 = @$filter["y_twitterProfileLink"];
        $this->twitterProfileLink->AdvancedSearch->SearchOperator2 = @$filter["w_twitterProfileLink"];
        $this->twitterProfileLink->AdvancedSearch->save();

        // Field twitterProfileId
        $this->twitterProfileId->AdvancedSearch->SearchValue = @$filter["x_twitterProfileId"];
        $this->twitterProfileId->AdvancedSearch->SearchOperator = @$filter["z_twitterProfileId"];
        $this->twitterProfileId->AdvancedSearch->SearchCondition = @$filter["v_twitterProfileId"];
        $this->twitterProfileId->AdvancedSearch->SearchValue2 = @$filter["y_twitterProfileId"];
        $this->twitterProfileId->AdvancedSearch->SearchOperator2 = @$filter["w_twitterProfileId"];
        $this->twitterProfileId->AdvancedSearch->save();

        // Field googleProfileLink
        $this->googleProfileLink->AdvancedSearch->SearchValue = @$filter["x_googleProfileLink"];
        $this->googleProfileLink->AdvancedSearch->SearchOperator = @$filter["z_googleProfileLink"];
        $this->googleProfileLink->AdvancedSearch->SearchCondition = @$filter["v_googleProfileLink"];
        $this->googleProfileLink->AdvancedSearch->SearchValue2 = @$filter["y_googleProfileLink"];
        $this->googleProfileLink->AdvancedSearch->SearchOperator2 = @$filter["w_googleProfileLink"];
        $this->googleProfileLink->AdvancedSearch->save();

        // Field googleProfileId
        $this->googleProfileId->AdvancedSearch->SearchValue = @$filter["x_googleProfileId"];
        $this->googleProfileId->AdvancedSearch->SearchOperator = @$filter["z_googleProfileId"];
        $this->googleProfileId->AdvancedSearch->SearchCondition = @$filter["v_googleProfileId"];
        $this->googleProfileId->AdvancedSearch->SearchValue2 = @$filter["y_googleProfileId"];
        $this->googleProfileId->AdvancedSearch->SearchOperator2 = @$filter["w_googleProfileId"];
        $this->googleProfileId->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->first_name, $default, false); // first_name
        $this->buildSearchSql($where, $this->last_name, $default, false); // last_name
        $this->buildSearchSql($where, $this->nationality, $default, false); // nationality
        $this->buildSearchSql($where, $this->birthday, $default, false); // birthday
        $this->buildSearchSql($where, $this->gender, $default, false); // gender
        $this->buildSearchSql($where, $this->marital_status, $default, false); // marital_status
        $this->buildSearchSql($where, $this->address1, $default, false); // address1
        $this->buildSearchSql($where, $this->address2, $default, false); // address2
        $this->buildSearchSql($where, $this->city, $default, false); // city
        $this->buildSearchSql($where, $this->country, $default, false); // country
        $this->buildSearchSql($where, $this->province, $default, false); // province
        $this->buildSearchSql($where, $this->postal_code, $default, false); // postal_code
        $this->buildSearchSql($where, $this->_email, $default, false); // email
        $this->buildSearchSql($where, $this->home_phone, $default, false); // home_phone
        $this->buildSearchSql($where, $this->mobile_phone, $default, false); // mobile_phone
        $this->buildSearchSql($where, $this->cv_title, $default, false); // cv_title
        $this->buildSearchSql($where, $this->cv, $default, false); // cv
        $this->buildSearchSql($where, $this->cvtext, $default, false); // cvtext
        $this->buildSearchSql($where, $this->industry, $default, false); // industry
        $this->buildSearchSql($where, $this->profileImage, $default, false); // profileImage
        $this->buildSearchSql($where, $this->head_line, $default, false); // head_line
        $this->buildSearchSql($where, $this->objective, $default, false); // objective
        $this->buildSearchSql($where, $this->work_history, $default, false); // work_history
        $this->buildSearchSql($where, $this->education, $default, false); // education
        $this->buildSearchSql($where, $this->skills, $default, false); // skills
        $this->buildSearchSql($where, $this->referees, $default, false); // referees
        $this->buildSearchSql($where, $this->linkedInUrl, $default, false); // linkedInUrl
        $this->buildSearchSql($where, $this->linkedInData, $default, false); // linkedInData
        $this->buildSearchSql($where, $this->totalYearsOfExperience, $default, false); // totalYearsOfExperience
        $this->buildSearchSql($where, $this->totalMonthsOfExperience, $default, false); // totalMonthsOfExperience
        $this->buildSearchSql($where, $this->htmlCVData, $default, false); // htmlCVData
        $this->buildSearchSql($where, $this->generatedCVFile, $default, false); // generatedCVFile
        $this->buildSearchSql($where, $this->created, $default, false); // created
        $this->buildSearchSql($where, $this->updated, $default, false); // updated
        $this->buildSearchSql($where, $this->expectedSalary, $default, false); // expectedSalary
        $this->buildSearchSql($where, $this->preferedPositions, $default, false); // preferedPositions
        $this->buildSearchSql($where, $this->preferedJobtype, $default, false); // preferedJobtype
        $this->buildSearchSql($where, $this->preferedCountries, $default, false); // preferedCountries
        $this->buildSearchSql($where, $this->tags, $default, false); // tags
        $this->buildSearchSql($where, $this->notes, $default, false); // notes
        $this->buildSearchSql($where, $this->calls, $default, false); // calls
        $this->buildSearchSql($where, $this->age, $default, false); // age
        $this->buildSearchSql($where, $this->hash, $default, false); // hash
        $this->buildSearchSql($where, $this->linkedInProfileLink, $default, false); // linkedInProfileLink
        $this->buildSearchSql($where, $this->linkedInProfileId, $default, false); // linkedInProfileId
        $this->buildSearchSql($where, $this->facebookProfileLink, $default, false); // facebookProfileLink
        $this->buildSearchSql($where, $this->facebookProfileId, $default, false); // facebookProfileId
        $this->buildSearchSql($where, $this->twitterProfileLink, $default, false); // twitterProfileLink
        $this->buildSearchSql($where, $this->twitterProfileId, $default, false); // twitterProfileId
        $this->buildSearchSql($where, $this->googleProfileLink, $default, false); // googleProfileLink
        $this->buildSearchSql($where, $this->googleProfileId, $default, false); // googleProfileId

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->first_name->AdvancedSearch->save(); // first_name
            $this->last_name->AdvancedSearch->save(); // last_name
            $this->nationality->AdvancedSearch->save(); // nationality
            $this->birthday->AdvancedSearch->save(); // birthday
            $this->gender->AdvancedSearch->save(); // gender
            $this->marital_status->AdvancedSearch->save(); // marital_status
            $this->address1->AdvancedSearch->save(); // address1
            $this->address2->AdvancedSearch->save(); // address2
            $this->city->AdvancedSearch->save(); // city
            $this->country->AdvancedSearch->save(); // country
            $this->province->AdvancedSearch->save(); // province
            $this->postal_code->AdvancedSearch->save(); // postal_code
            $this->_email->AdvancedSearch->save(); // email
            $this->home_phone->AdvancedSearch->save(); // home_phone
            $this->mobile_phone->AdvancedSearch->save(); // mobile_phone
            $this->cv_title->AdvancedSearch->save(); // cv_title
            $this->cv->AdvancedSearch->save(); // cv
            $this->cvtext->AdvancedSearch->save(); // cvtext
            $this->industry->AdvancedSearch->save(); // industry
            $this->profileImage->AdvancedSearch->save(); // profileImage
            $this->head_line->AdvancedSearch->save(); // head_line
            $this->objective->AdvancedSearch->save(); // objective
            $this->work_history->AdvancedSearch->save(); // work_history
            $this->education->AdvancedSearch->save(); // education
            $this->skills->AdvancedSearch->save(); // skills
            $this->referees->AdvancedSearch->save(); // referees
            $this->linkedInUrl->AdvancedSearch->save(); // linkedInUrl
            $this->linkedInData->AdvancedSearch->save(); // linkedInData
            $this->totalYearsOfExperience->AdvancedSearch->save(); // totalYearsOfExperience
            $this->totalMonthsOfExperience->AdvancedSearch->save(); // totalMonthsOfExperience
            $this->htmlCVData->AdvancedSearch->save(); // htmlCVData
            $this->generatedCVFile->AdvancedSearch->save(); // generatedCVFile
            $this->created->AdvancedSearch->save(); // created
            $this->updated->AdvancedSearch->save(); // updated
            $this->expectedSalary->AdvancedSearch->save(); // expectedSalary
            $this->preferedPositions->AdvancedSearch->save(); // preferedPositions
            $this->preferedJobtype->AdvancedSearch->save(); // preferedJobtype
            $this->preferedCountries->AdvancedSearch->save(); // preferedCountries
            $this->tags->AdvancedSearch->save(); // tags
            $this->notes->AdvancedSearch->save(); // notes
            $this->calls->AdvancedSearch->save(); // calls
            $this->age->AdvancedSearch->save(); // age
            $this->hash->AdvancedSearch->save(); // hash
            $this->linkedInProfileLink->AdvancedSearch->save(); // linkedInProfileLink
            $this->linkedInProfileId->AdvancedSearch->save(); // linkedInProfileId
            $this->facebookProfileLink->AdvancedSearch->save(); // facebookProfileLink
            $this->facebookProfileId->AdvancedSearch->save(); // facebookProfileId
            $this->twitterProfileLink->AdvancedSearch->save(); // twitterProfileLink
            $this->twitterProfileId->AdvancedSearch->save(); // twitterProfileId
            $this->googleProfileLink->AdvancedSearch->save(); // googleProfileLink
            $this->googleProfileId->AdvancedSearch->save(); // googleProfileId
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
        $this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->city, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->home_phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile_phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->cv_title, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->cv, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->cvtext, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->industry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profileImage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->head_line, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->objective, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->work_history, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->education, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->skills, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->referees, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->linkedInUrl, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->linkedInData, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->htmlCVData, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->generatedCVFile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->preferedPositions, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->preferedJobtype, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->preferedCountries, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->tags, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->notes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->calls, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->hash, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->linkedInProfileLink, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->linkedInProfileId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->facebookProfileLink, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->facebookProfileId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->twitterProfileLink, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->twitterProfileId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->googleProfileLink, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->googleProfileId, $arKeywords, $type);
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
        if ($this->first_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->last_name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->nationality->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->birthday->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->marital_status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->address1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->address2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->city->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->country->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->province->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->postal_code->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_email->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->home_phone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mobile_phone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->cv_title->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->cv->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->cvtext->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->industry->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profileImage->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->head_line->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->objective->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->work_history->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->education->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->skills->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->referees->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->linkedInUrl->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->linkedInData->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->totalYearsOfExperience->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->totalMonthsOfExperience->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->htmlCVData->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->generatedCVFile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->created->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->updated->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->expectedSalary->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->preferedPositions->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->preferedJobtype->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->preferedCountries->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->tags->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->notes->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->calls->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->hash->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->linkedInProfileLink->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->linkedInProfileId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->facebookProfileLink->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->facebookProfileId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->twitterProfileLink->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->twitterProfileId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->googleProfileLink->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->googleProfileId->AdvancedSearch->issetSession()) {
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
                $this->first_name->AdvancedSearch->unsetSession();
                $this->last_name->AdvancedSearch->unsetSession();
                $this->nationality->AdvancedSearch->unsetSession();
                $this->birthday->AdvancedSearch->unsetSession();
                $this->gender->AdvancedSearch->unsetSession();
                $this->marital_status->AdvancedSearch->unsetSession();
                $this->address1->AdvancedSearch->unsetSession();
                $this->address2->AdvancedSearch->unsetSession();
                $this->city->AdvancedSearch->unsetSession();
                $this->country->AdvancedSearch->unsetSession();
                $this->province->AdvancedSearch->unsetSession();
                $this->postal_code->AdvancedSearch->unsetSession();
                $this->_email->AdvancedSearch->unsetSession();
                $this->home_phone->AdvancedSearch->unsetSession();
                $this->mobile_phone->AdvancedSearch->unsetSession();
                $this->cv_title->AdvancedSearch->unsetSession();
                $this->cv->AdvancedSearch->unsetSession();
                $this->cvtext->AdvancedSearch->unsetSession();
                $this->industry->AdvancedSearch->unsetSession();
                $this->profileImage->AdvancedSearch->unsetSession();
                $this->head_line->AdvancedSearch->unsetSession();
                $this->objective->AdvancedSearch->unsetSession();
                $this->work_history->AdvancedSearch->unsetSession();
                $this->education->AdvancedSearch->unsetSession();
                $this->skills->AdvancedSearch->unsetSession();
                $this->referees->AdvancedSearch->unsetSession();
                $this->linkedInUrl->AdvancedSearch->unsetSession();
                $this->linkedInData->AdvancedSearch->unsetSession();
                $this->totalYearsOfExperience->AdvancedSearch->unsetSession();
                $this->totalMonthsOfExperience->AdvancedSearch->unsetSession();
                $this->htmlCVData->AdvancedSearch->unsetSession();
                $this->generatedCVFile->AdvancedSearch->unsetSession();
                $this->created->AdvancedSearch->unsetSession();
                $this->updated->AdvancedSearch->unsetSession();
                $this->expectedSalary->AdvancedSearch->unsetSession();
                $this->preferedPositions->AdvancedSearch->unsetSession();
                $this->preferedJobtype->AdvancedSearch->unsetSession();
                $this->preferedCountries->AdvancedSearch->unsetSession();
                $this->tags->AdvancedSearch->unsetSession();
                $this->notes->AdvancedSearch->unsetSession();
                $this->calls->AdvancedSearch->unsetSession();
                $this->age->AdvancedSearch->unsetSession();
                $this->hash->AdvancedSearch->unsetSession();
                $this->linkedInProfileLink->AdvancedSearch->unsetSession();
                $this->linkedInProfileId->AdvancedSearch->unsetSession();
                $this->facebookProfileLink->AdvancedSearch->unsetSession();
                $this->facebookProfileId->AdvancedSearch->unsetSession();
                $this->twitterProfileLink->AdvancedSearch->unsetSession();
                $this->twitterProfileId->AdvancedSearch->unsetSession();
                $this->googleProfileLink->AdvancedSearch->unsetSession();
                $this->googleProfileId->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->first_name->AdvancedSearch->load();
                $this->last_name->AdvancedSearch->load();
                $this->nationality->AdvancedSearch->load();
                $this->birthday->AdvancedSearch->load();
                $this->gender->AdvancedSearch->load();
                $this->marital_status->AdvancedSearch->load();
                $this->address1->AdvancedSearch->load();
                $this->address2->AdvancedSearch->load();
                $this->city->AdvancedSearch->load();
                $this->country->AdvancedSearch->load();
                $this->province->AdvancedSearch->load();
                $this->postal_code->AdvancedSearch->load();
                $this->_email->AdvancedSearch->load();
                $this->home_phone->AdvancedSearch->load();
                $this->mobile_phone->AdvancedSearch->load();
                $this->cv_title->AdvancedSearch->load();
                $this->cv->AdvancedSearch->load();
                $this->cvtext->AdvancedSearch->load();
                $this->industry->AdvancedSearch->load();
                $this->profileImage->AdvancedSearch->load();
                $this->head_line->AdvancedSearch->load();
                $this->objective->AdvancedSearch->load();
                $this->work_history->AdvancedSearch->load();
                $this->education->AdvancedSearch->load();
                $this->skills->AdvancedSearch->load();
                $this->referees->AdvancedSearch->load();
                $this->linkedInUrl->AdvancedSearch->load();
                $this->linkedInData->AdvancedSearch->load();
                $this->totalYearsOfExperience->AdvancedSearch->load();
                $this->totalMonthsOfExperience->AdvancedSearch->load();
                $this->htmlCVData->AdvancedSearch->load();
                $this->generatedCVFile->AdvancedSearch->load();
                $this->created->AdvancedSearch->load();
                $this->updated->AdvancedSearch->load();
                $this->expectedSalary->AdvancedSearch->load();
                $this->preferedPositions->AdvancedSearch->load();
                $this->preferedJobtype->AdvancedSearch->load();
                $this->preferedCountries->AdvancedSearch->load();
                $this->tags->AdvancedSearch->load();
                $this->notes->AdvancedSearch->load();
                $this->calls->AdvancedSearch->load();
                $this->age->AdvancedSearch->load();
                $this->hash->AdvancedSearch->load();
                $this->linkedInProfileLink->AdvancedSearch->load();
                $this->linkedInProfileId->AdvancedSearch->load();
                $this->facebookProfileLink->AdvancedSearch->load();
                $this->facebookProfileId->AdvancedSearch->load();
                $this->twitterProfileLink->AdvancedSearch->load();
                $this->twitterProfileId->AdvancedSearch->load();
                $this->googleProfileLink->AdvancedSearch->load();
                $this->googleProfileId->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->first_name); // first_name
            $this->updateSort($this->last_name); // last_name
            $this->updateSort($this->nationality); // nationality
            $this->updateSort($this->birthday); // birthday
            $this->updateSort($this->gender); // gender
            $this->updateSort($this->marital_status); // marital_status
            $this->updateSort($this->address1); // address1
            $this->updateSort($this->address2); // address2
            $this->updateSort($this->city); // city
            $this->updateSort($this->country); // country
            $this->updateSort($this->province); // province
            $this->updateSort($this->postal_code); // postal_code
            $this->updateSort($this->_email); // email
            $this->updateSort($this->home_phone); // home_phone
            $this->updateSort($this->mobile_phone); // mobile_phone
            $this->updateSort($this->cv_title); // cv_title
            $this->updateSort($this->cv); // cv
            $this->updateSort($this->profileImage); // profileImage
            $this->updateSort($this->totalYearsOfExperience); // totalYearsOfExperience
            $this->updateSort($this->totalMonthsOfExperience); // totalMonthsOfExperience
            $this->updateSort($this->generatedCVFile); // generatedCVFile
            $this->updateSort($this->created); // created
            $this->updateSort($this->updated); // updated
            $this->updateSort($this->expectedSalary); // expectedSalary
            $this->updateSort($this->preferedJobtype); // preferedJobtype
            $this->updateSort($this->age); // age
            $this->updateSort($this->hash); // hash
            $this->updateSort($this->linkedInProfileLink); // linkedInProfileLink
            $this->updateSort($this->linkedInProfileId); // linkedInProfileId
            $this->updateSort($this->facebookProfileLink); // facebookProfileLink
            $this->updateSort($this->facebookProfileId); // facebookProfileId
            $this->updateSort($this->twitterProfileLink); // twitterProfileLink
            $this->updateSort($this->twitterProfileId); // twitterProfileId
            $this->updateSort($this->googleProfileLink); // googleProfileLink
            $this->updateSort($this->googleProfileId); // googleProfileId
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
                $this->first_name->setSort("");
                $this->last_name->setSort("");
                $this->nationality->setSort("");
                $this->birthday->setSort("");
                $this->gender->setSort("");
                $this->marital_status->setSort("");
                $this->address1->setSort("");
                $this->address2->setSort("");
                $this->city->setSort("");
                $this->country->setSort("");
                $this->province->setSort("");
                $this->postal_code->setSort("");
                $this->_email->setSort("");
                $this->home_phone->setSort("");
                $this->mobile_phone->setSort("");
                $this->cv_title->setSort("");
                $this->cv->setSort("");
                $this->cvtext->setSort("");
                $this->industry->setSort("");
                $this->profileImage->setSort("");
                $this->head_line->setSort("");
                $this->objective->setSort("");
                $this->work_history->setSort("");
                $this->education->setSort("");
                $this->skills->setSort("");
                $this->referees->setSort("");
                $this->linkedInUrl->setSort("");
                $this->linkedInData->setSort("");
                $this->totalYearsOfExperience->setSort("");
                $this->totalMonthsOfExperience->setSort("");
                $this->htmlCVData->setSort("");
                $this->generatedCVFile->setSort("");
                $this->created->setSort("");
                $this->updated->setSort("");
                $this->expectedSalary->setSort("");
                $this->preferedPositions->setSort("");
                $this->preferedJobtype->setSort("");
                $this->preferedCountries->setSort("");
                $this->tags->setSort("");
                $this->notes->setSort("");
                $this->calls->setSort("");
                $this->age->setSort("");
                $this->hash->setSort("");
                $this->linkedInProfileLink->setSort("");
                $this->linkedInProfileId->setSort("");
                $this->facebookProfileLink->setSort("");
                $this->facebookProfileId->setSort("");
                $this->twitterProfileLink->setSort("");
                $this->twitterProfileId->setSort("");
                $this->googleProfileLink->setSort("");
                $this->googleProfileId->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"frecruitment_candidateslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"frecruitment_candidateslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.frecruitment_candidateslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // first_name
        if (!$this->isAddOrEdit() && $this->first_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->first_name->AdvancedSearch->SearchValue != "" || $this->first_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // last_name
        if (!$this->isAddOrEdit() && $this->last_name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->last_name->AdvancedSearch->SearchValue != "" || $this->last_name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // nationality
        if (!$this->isAddOrEdit() && $this->nationality->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->nationality->AdvancedSearch->SearchValue != "" || $this->nationality->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // birthday
        if (!$this->isAddOrEdit() && $this->birthday->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->birthday->AdvancedSearch->SearchValue != "" || $this->birthday->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // gender
        if (!$this->isAddOrEdit() && $this->gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->gender->AdvancedSearch->SearchValue != "" || $this->gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // marital_status
        if (!$this->isAddOrEdit() && $this->marital_status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->marital_status->AdvancedSearch->SearchValue != "" || $this->marital_status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // address1
        if (!$this->isAddOrEdit() && $this->address1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->address1->AdvancedSearch->SearchValue != "" || $this->address1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // address2
        if (!$this->isAddOrEdit() && $this->address2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->address2->AdvancedSearch->SearchValue != "" || $this->address2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // city
        if (!$this->isAddOrEdit() && $this->city->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->city->AdvancedSearch->SearchValue != "" || $this->city->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // province
        if (!$this->isAddOrEdit() && $this->province->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->province->AdvancedSearch->SearchValue != "" || $this->province->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // postal_code
        if (!$this->isAddOrEdit() && $this->postal_code->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->postal_code->AdvancedSearch->SearchValue != "" || $this->postal_code->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // email
        if (!$this->isAddOrEdit() && $this->_email->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->_email->AdvancedSearch->SearchValue != "" || $this->_email->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // home_phone
        if (!$this->isAddOrEdit() && $this->home_phone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->home_phone->AdvancedSearch->SearchValue != "" || $this->home_phone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mobile_phone
        if (!$this->isAddOrEdit() && $this->mobile_phone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mobile_phone->AdvancedSearch->SearchValue != "" || $this->mobile_phone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // cv_title
        if (!$this->isAddOrEdit() && $this->cv_title->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->cv_title->AdvancedSearch->SearchValue != "" || $this->cv_title->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // cv
        if (!$this->isAddOrEdit() && $this->cv->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->cv->AdvancedSearch->SearchValue != "" || $this->cv->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // cvtext
        if (!$this->isAddOrEdit() && $this->cvtext->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->cvtext->AdvancedSearch->SearchValue != "" || $this->cvtext->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // profileImage
        if (!$this->isAddOrEdit() && $this->profileImage->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->profileImage->AdvancedSearch->SearchValue != "" || $this->profileImage->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // head_line
        if (!$this->isAddOrEdit() && $this->head_line->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->head_line->AdvancedSearch->SearchValue != "" || $this->head_line->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // objective
        if (!$this->isAddOrEdit() && $this->objective->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->objective->AdvancedSearch->SearchValue != "" || $this->objective->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // work_history
        if (!$this->isAddOrEdit() && $this->work_history->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->work_history->AdvancedSearch->SearchValue != "" || $this->work_history->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // education
        if (!$this->isAddOrEdit() && $this->education->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->education->AdvancedSearch->SearchValue != "" || $this->education->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // skills
        if (!$this->isAddOrEdit() && $this->skills->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->skills->AdvancedSearch->SearchValue != "" || $this->skills->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // referees
        if (!$this->isAddOrEdit() && $this->referees->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->referees->AdvancedSearch->SearchValue != "" || $this->referees->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // linkedInUrl
        if (!$this->isAddOrEdit() && $this->linkedInUrl->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->linkedInUrl->AdvancedSearch->SearchValue != "" || $this->linkedInUrl->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // linkedInData
        if (!$this->isAddOrEdit() && $this->linkedInData->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->linkedInData->AdvancedSearch->SearchValue != "" || $this->linkedInData->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // totalYearsOfExperience
        if (!$this->isAddOrEdit() && $this->totalYearsOfExperience->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->totalYearsOfExperience->AdvancedSearch->SearchValue != "" || $this->totalYearsOfExperience->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // totalMonthsOfExperience
        if (!$this->isAddOrEdit() && $this->totalMonthsOfExperience->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->totalMonthsOfExperience->AdvancedSearch->SearchValue != "" || $this->totalMonthsOfExperience->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // htmlCVData
        if (!$this->isAddOrEdit() && $this->htmlCVData->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->htmlCVData->AdvancedSearch->SearchValue != "" || $this->htmlCVData->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // generatedCVFile
        if (!$this->isAddOrEdit() && $this->generatedCVFile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->generatedCVFile->AdvancedSearch->SearchValue != "" || $this->generatedCVFile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // created
        if (!$this->isAddOrEdit() && $this->created->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->created->AdvancedSearch->SearchValue != "" || $this->created->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // updated
        if (!$this->isAddOrEdit() && $this->updated->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->updated->AdvancedSearch->SearchValue != "" || $this->updated->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // expectedSalary
        if (!$this->isAddOrEdit() && $this->expectedSalary->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->expectedSalary->AdvancedSearch->SearchValue != "" || $this->expectedSalary->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // preferedPositions
        if (!$this->isAddOrEdit() && $this->preferedPositions->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->preferedPositions->AdvancedSearch->SearchValue != "" || $this->preferedPositions->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // preferedJobtype
        if (!$this->isAddOrEdit() && $this->preferedJobtype->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->preferedJobtype->AdvancedSearch->SearchValue != "" || $this->preferedJobtype->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // preferedCountries
        if (!$this->isAddOrEdit() && $this->preferedCountries->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->preferedCountries->AdvancedSearch->SearchValue != "" || $this->preferedCountries->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // tags
        if (!$this->isAddOrEdit() && $this->tags->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->tags->AdvancedSearch->SearchValue != "" || $this->tags->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // notes
        if (!$this->isAddOrEdit() && $this->notes->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->notes->AdvancedSearch->SearchValue != "" || $this->notes->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // calls
        if (!$this->isAddOrEdit() && $this->calls->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->calls->AdvancedSearch->SearchValue != "" || $this->calls->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // age
        if (!$this->isAddOrEdit() && $this->age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->age->AdvancedSearch->SearchValue != "" || $this->age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // hash
        if (!$this->isAddOrEdit() && $this->hash->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->hash->AdvancedSearch->SearchValue != "" || $this->hash->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // linkedInProfileLink
        if (!$this->isAddOrEdit() && $this->linkedInProfileLink->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->linkedInProfileLink->AdvancedSearch->SearchValue != "" || $this->linkedInProfileLink->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // linkedInProfileId
        if (!$this->isAddOrEdit() && $this->linkedInProfileId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->linkedInProfileId->AdvancedSearch->SearchValue != "" || $this->linkedInProfileId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // facebookProfileLink
        if (!$this->isAddOrEdit() && $this->facebookProfileLink->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->facebookProfileLink->AdvancedSearch->SearchValue != "" || $this->facebookProfileLink->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // facebookProfileId
        if (!$this->isAddOrEdit() && $this->facebookProfileId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->facebookProfileId->AdvancedSearch->SearchValue != "" || $this->facebookProfileId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // twitterProfileLink
        if (!$this->isAddOrEdit() && $this->twitterProfileLink->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->twitterProfileLink->AdvancedSearch->SearchValue != "" || $this->twitterProfileLink->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // twitterProfileId
        if (!$this->isAddOrEdit() && $this->twitterProfileId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->twitterProfileId->AdvancedSearch->SearchValue != "" || $this->twitterProfileId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // googleProfileLink
        if (!$this->isAddOrEdit() && $this->googleProfileLink->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->googleProfileLink->AdvancedSearch->SearchValue != "" || $this->googleProfileLink->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // googleProfileId
        if (!$this->isAddOrEdit() && $this->googleProfileId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->googleProfileId->AdvancedSearch->SearchValue != "" || $this->googleProfileId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->gender->setDbValue($row['gender']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->_email->setDbValue($row['email']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->cv_title->setDbValue($row['cv_title']);
        $this->cv->setDbValue($row['cv']);
        $this->cvtext->setDbValue($row['cvtext']);
        $this->industry->setDbValue($row['industry']);
        $this->profileImage->setDbValue($row['profileImage']);
        $this->head_line->setDbValue($row['head_line']);
        $this->objective->setDbValue($row['objective']);
        $this->work_history->setDbValue($row['work_history']);
        $this->education->setDbValue($row['education']);
        $this->skills->setDbValue($row['skills']);
        $this->referees->setDbValue($row['referees']);
        $this->linkedInUrl->setDbValue($row['linkedInUrl']);
        $this->linkedInData->setDbValue($row['linkedInData']);
        $this->totalYearsOfExperience->setDbValue($row['totalYearsOfExperience']);
        $this->totalMonthsOfExperience->setDbValue($row['totalMonthsOfExperience']);
        $this->htmlCVData->setDbValue($row['htmlCVData']);
        $this->generatedCVFile->setDbValue($row['generatedCVFile']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->expectedSalary->setDbValue($row['expectedSalary']);
        $this->preferedPositions->setDbValue($row['preferedPositions']);
        $this->preferedJobtype->setDbValue($row['preferedJobtype']);
        $this->preferedCountries->setDbValue($row['preferedCountries']);
        $this->tags->setDbValue($row['tags']);
        $this->notes->setDbValue($row['notes']);
        $this->calls->setDbValue($row['calls']);
        $this->age->setDbValue($row['age']);
        $this->hash->setDbValue($row['hash']);
        $this->linkedInProfileLink->setDbValue($row['linkedInProfileLink']);
        $this->linkedInProfileId->setDbValue($row['linkedInProfileId']);
        $this->facebookProfileLink->setDbValue($row['facebookProfileLink']);
        $this->facebookProfileId->setDbValue($row['facebookProfileId']);
        $this->twitterProfileLink->setDbValue($row['twitterProfileLink']);
        $this->twitterProfileId->setDbValue($row['twitterProfileId']);
        $this->googleProfileLink->setDbValue($row['googleProfileLink']);
        $this->googleProfileId->setDbValue($row['googleProfileId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['first_name'] = null;
        $row['last_name'] = null;
        $row['nationality'] = null;
        $row['birthday'] = null;
        $row['gender'] = null;
        $row['marital_status'] = null;
        $row['address1'] = null;
        $row['address2'] = null;
        $row['city'] = null;
        $row['country'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['email'] = null;
        $row['home_phone'] = null;
        $row['mobile_phone'] = null;
        $row['cv_title'] = null;
        $row['cv'] = null;
        $row['cvtext'] = null;
        $row['industry'] = null;
        $row['profileImage'] = null;
        $row['head_line'] = null;
        $row['objective'] = null;
        $row['work_history'] = null;
        $row['education'] = null;
        $row['skills'] = null;
        $row['referees'] = null;
        $row['linkedInUrl'] = null;
        $row['linkedInData'] = null;
        $row['totalYearsOfExperience'] = null;
        $row['totalMonthsOfExperience'] = null;
        $row['htmlCVData'] = null;
        $row['generatedCVFile'] = null;
        $row['created'] = null;
        $row['updated'] = null;
        $row['expectedSalary'] = null;
        $row['preferedPositions'] = null;
        $row['preferedJobtype'] = null;
        $row['preferedCountries'] = null;
        $row['tags'] = null;
        $row['notes'] = null;
        $row['calls'] = null;
        $row['age'] = null;
        $row['hash'] = null;
        $row['linkedInProfileLink'] = null;
        $row['linkedInProfileId'] = null;
        $row['facebookProfileLink'] = null;
        $row['facebookProfileId'] = null;
        $row['twitterProfileLink'] = null;
        $row['twitterProfileId'] = null;
        $row['googleProfileLink'] = null;
        $row['googleProfileId'] = null;
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

        // first_name

        // last_name

        // nationality

        // birthday

        // gender

        // marital_status

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // email

        // home_phone

        // mobile_phone

        // cv_title

        // cv

        // cvtext

        // industry

        // profileImage

        // head_line

        // objective

        // work_history

        // education

        // skills

        // referees

        // linkedInUrl

        // linkedInData

        // totalYearsOfExperience

        // totalMonthsOfExperience

        // htmlCVData

        // generatedCVFile

        // created

        // updated

        // expectedSalary

        // preferedPositions

        // preferedJobtype

        // preferedCountries

        // tags

        // notes

        // calls

        // age

        // hash

        // linkedInProfileLink

        // linkedInProfileId

        // facebookProfileLink

        // facebookProfileId

        // twitterProfileLink

        // twitterProfileId

        // googleProfileLink

        // googleProfileId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // nationality
            $this->nationality->ViewValue = $this->nationality->CurrentValue;
            $this->nationality->ViewValue = FormatNumber($this->nationality->ViewValue, 0, -2, -2, -2);
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // gender
            if (strval($this->gender->CurrentValue) != "") {
                $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // cv_title
            $this->cv_title->ViewValue = $this->cv_title->CurrentValue;
            $this->cv_title->ViewCustomAttributes = "";

            // cv
            $this->cv->ViewValue = $this->cv->CurrentValue;
            $this->cv->ViewCustomAttributes = "";

            // profileImage
            $this->profileImage->ViewValue = $this->profileImage->CurrentValue;
            $this->profileImage->ViewCustomAttributes = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->ViewValue = $this->totalYearsOfExperience->CurrentValue;
            $this->totalYearsOfExperience->ViewValue = FormatNumber($this->totalYearsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalYearsOfExperience->ViewCustomAttributes = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->ViewValue = $this->totalMonthsOfExperience->CurrentValue;
            $this->totalMonthsOfExperience->ViewValue = FormatNumber($this->totalMonthsOfExperience->ViewValue, 0, -2, -2, -2);
            $this->totalMonthsOfExperience->ViewCustomAttributes = "";

            // generatedCVFile
            $this->generatedCVFile->ViewValue = $this->generatedCVFile->CurrentValue;
            $this->generatedCVFile->ViewCustomAttributes = "";

            // created
            $this->created->ViewValue = $this->created->CurrentValue;
            $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
            $this->created->ViewCustomAttributes = "";

            // updated
            $this->updated->ViewValue = $this->updated->CurrentValue;
            $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
            $this->updated->ViewCustomAttributes = "";

            // expectedSalary
            $this->expectedSalary->ViewValue = $this->expectedSalary->CurrentValue;
            $this->expectedSalary->ViewValue = FormatNumber($this->expectedSalary->ViewValue, 0, -2, -2, -2);
            $this->expectedSalary->ViewCustomAttributes = "";

            // preferedJobtype
            $this->preferedJobtype->ViewValue = $this->preferedJobtype->CurrentValue;
            $this->preferedJobtype->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewValue = FormatNumber($this->age->ViewValue, 0, -2, -2, -2);
            $this->age->ViewCustomAttributes = "";

            // hash
            $this->hash->ViewValue = $this->hash->CurrentValue;
            $this->hash->ViewCustomAttributes = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->ViewValue = $this->linkedInProfileLink->CurrentValue;
            $this->linkedInProfileLink->ViewCustomAttributes = "";

            // linkedInProfileId
            $this->linkedInProfileId->ViewValue = $this->linkedInProfileId->CurrentValue;
            $this->linkedInProfileId->ViewCustomAttributes = "";

            // facebookProfileLink
            $this->facebookProfileLink->ViewValue = $this->facebookProfileLink->CurrentValue;
            $this->facebookProfileLink->ViewCustomAttributes = "";

            // facebookProfileId
            $this->facebookProfileId->ViewValue = $this->facebookProfileId->CurrentValue;
            $this->facebookProfileId->ViewCustomAttributes = "";

            // twitterProfileLink
            $this->twitterProfileLink->ViewValue = $this->twitterProfileLink->CurrentValue;
            $this->twitterProfileLink->ViewCustomAttributes = "";

            // twitterProfileId
            $this->twitterProfileId->ViewValue = $this->twitterProfileId->CurrentValue;
            $this->twitterProfileId->ViewCustomAttributes = "";

            // googleProfileLink
            $this->googleProfileLink->ViewValue = $this->googleProfileLink->CurrentValue;
            $this->googleProfileLink->ViewCustomAttributes = "";

            // googleProfileId
            $this->googleProfileId->ViewValue = $this->googleProfileId->CurrentValue;
            $this->googleProfileId->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // cv_title
            $this->cv_title->LinkCustomAttributes = "";
            $this->cv_title->HrefValue = "";
            $this->cv_title->TooltipValue = "";

            // cv
            $this->cv->LinkCustomAttributes = "";
            $this->cv->HrefValue = "";
            $this->cv->TooltipValue = "";

            // profileImage
            $this->profileImage->LinkCustomAttributes = "";
            $this->profileImage->HrefValue = "";
            $this->profileImage->TooltipValue = "";

            // totalYearsOfExperience
            $this->totalYearsOfExperience->LinkCustomAttributes = "";
            $this->totalYearsOfExperience->HrefValue = "";
            $this->totalYearsOfExperience->TooltipValue = "";

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->LinkCustomAttributes = "";
            $this->totalMonthsOfExperience->HrefValue = "";
            $this->totalMonthsOfExperience->TooltipValue = "";

            // generatedCVFile
            $this->generatedCVFile->LinkCustomAttributes = "";
            $this->generatedCVFile->HrefValue = "";
            $this->generatedCVFile->TooltipValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";
            $this->created->TooltipValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";
            $this->updated->TooltipValue = "";

            // expectedSalary
            $this->expectedSalary->LinkCustomAttributes = "";
            $this->expectedSalary->HrefValue = "";
            $this->expectedSalary->TooltipValue = "";

            // preferedJobtype
            $this->preferedJobtype->LinkCustomAttributes = "";
            $this->preferedJobtype->HrefValue = "";
            $this->preferedJobtype->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // hash
            $this->hash->LinkCustomAttributes = "";
            $this->hash->HrefValue = "";
            $this->hash->TooltipValue = "";

            // linkedInProfileLink
            $this->linkedInProfileLink->LinkCustomAttributes = "";
            $this->linkedInProfileLink->HrefValue = "";
            $this->linkedInProfileLink->TooltipValue = "";

            // linkedInProfileId
            $this->linkedInProfileId->LinkCustomAttributes = "";
            $this->linkedInProfileId->HrefValue = "";
            $this->linkedInProfileId->TooltipValue = "";

            // facebookProfileLink
            $this->facebookProfileLink->LinkCustomAttributes = "";
            $this->facebookProfileLink->HrefValue = "";
            $this->facebookProfileLink->TooltipValue = "";

            // facebookProfileId
            $this->facebookProfileId->LinkCustomAttributes = "";
            $this->facebookProfileId->HrefValue = "";
            $this->facebookProfileId->TooltipValue = "";

            // twitterProfileLink
            $this->twitterProfileLink->LinkCustomAttributes = "";
            $this->twitterProfileLink->HrefValue = "";
            $this->twitterProfileLink->TooltipValue = "";

            // twitterProfileId
            $this->twitterProfileId->LinkCustomAttributes = "";
            $this->twitterProfileId->HrefValue = "";
            $this->twitterProfileId->TooltipValue = "";

            // googleProfileLink
            $this->googleProfileLink->LinkCustomAttributes = "";
            $this->googleProfileLink->HrefValue = "";
            $this->googleProfileLink->TooltipValue = "";

            // googleProfileId
            $this->googleProfileId->LinkCustomAttributes = "";
            $this->googleProfileId->HrefValue = "";
            $this->googleProfileId->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->AdvancedSearch->SearchValue = HtmlDecode($this->first_name->AdvancedSearch->SearchValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->AdvancedSearch->SearchValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->AdvancedSearch->SearchValue = HtmlDecode($this->last_name->AdvancedSearch->SearchValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->AdvancedSearch->SearchValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // nationality
            $this->nationality->EditAttrs["class"] = "form-control";
            $this->nationality->EditCustomAttributes = "";
            $this->nationality->EditValue = HtmlEncode($this->nationality->AdvancedSearch->SearchValue);
            $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

            // birthday
            $this->birthday->EditAttrs["class"] = "form-control";
            $this->birthday->EditCustomAttributes = "";
            $this->birthday->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->birthday->AdvancedSearch->SearchValue, 0), 8));
            $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

            // gender
            $this->gender->EditCustomAttributes = "";
            $this->gender->EditValue = $this->gender->options(false);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // marital_status
            $this->marital_status->EditCustomAttributes = "";
            $this->marital_status->EditValue = $this->marital_status->options(false);
            $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

            // address1
            $this->address1->EditAttrs["class"] = "form-control";
            $this->address1->EditCustomAttributes = "";
            if (!$this->address1->Raw) {
                $this->address1->AdvancedSearch->SearchValue = HtmlDecode($this->address1->AdvancedSearch->SearchValue);
            }
            $this->address1->EditValue = HtmlEncode($this->address1->AdvancedSearch->SearchValue);
            $this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

            // address2
            $this->address2->EditAttrs["class"] = "form-control";
            $this->address2->EditCustomAttributes = "";
            if (!$this->address2->Raw) {
                $this->address2->AdvancedSearch->SearchValue = HtmlDecode($this->address2->AdvancedSearch->SearchValue);
            }
            $this->address2->EditValue = HtmlEncode($this->address2->AdvancedSearch->SearchValue);
            $this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

            // city
            $this->city->EditAttrs["class"] = "form-control";
            $this->city->EditCustomAttributes = "";
            if (!$this->city->Raw) {
                $this->city->AdvancedSearch->SearchValue = HtmlDecode($this->city->AdvancedSearch->SearchValue);
            }
            $this->city->EditValue = HtmlEncode($this->city->AdvancedSearch->SearchValue);
            $this->city->PlaceHolder = RemoveHtml($this->city->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->AdvancedSearch->SearchValue = HtmlDecode($this->country->AdvancedSearch->SearchValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->AdvancedSearch->SearchValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            $this->province->EditValue = HtmlEncode($this->province->AdvancedSearch->SearchValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->AdvancedSearch->SearchValue = HtmlDecode($this->postal_code->AdvancedSearch->SearchValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->AdvancedSearch->SearchValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // email
            $this->_email->EditAttrs["class"] = "form-control";
            $this->_email->EditCustomAttributes = "";
            if (!$this->_email->Raw) {
                $this->_email->AdvancedSearch->SearchValue = HtmlDecode($this->_email->AdvancedSearch->SearchValue);
            }
            $this->_email->EditValue = HtmlEncode($this->_email->AdvancedSearch->SearchValue);
            $this->_email->PlaceHolder = RemoveHtml($this->_email->caption());

            // home_phone
            $this->home_phone->EditAttrs["class"] = "form-control";
            $this->home_phone->EditCustomAttributes = "";
            if (!$this->home_phone->Raw) {
                $this->home_phone->AdvancedSearch->SearchValue = HtmlDecode($this->home_phone->AdvancedSearch->SearchValue);
            }
            $this->home_phone->EditValue = HtmlEncode($this->home_phone->AdvancedSearch->SearchValue);
            $this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

            // mobile_phone
            $this->mobile_phone->EditAttrs["class"] = "form-control";
            $this->mobile_phone->EditCustomAttributes = "";
            if (!$this->mobile_phone->Raw) {
                $this->mobile_phone->AdvancedSearch->SearchValue = HtmlDecode($this->mobile_phone->AdvancedSearch->SearchValue);
            }
            $this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->AdvancedSearch->SearchValue);
            $this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

            // cv_title
            $this->cv_title->EditAttrs["class"] = "form-control";
            $this->cv_title->EditCustomAttributes = "";
            if (!$this->cv_title->Raw) {
                $this->cv_title->AdvancedSearch->SearchValue = HtmlDecode($this->cv_title->AdvancedSearch->SearchValue);
            }
            $this->cv_title->EditValue = HtmlEncode($this->cv_title->AdvancedSearch->SearchValue);
            $this->cv_title->PlaceHolder = RemoveHtml($this->cv_title->caption());

            // cv
            $this->cv->EditAttrs["class"] = "form-control";
            $this->cv->EditCustomAttributes = "";
            if (!$this->cv->Raw) {
                $this->cv->AdvancedSearch->SearchValue = HtmlDecode($this->cv->AdvancedSearch->SearchValue);
            }
            $this->cv->EditValue = HtmlEncode($this->cv->AdvancedSearch->SearchValue);
            $this->cv->PlaceHolder = RemoveHtml($this->cv->caption());

            // profileImage
            $this->profileImage->EditAttrs["class"] = "form-control";
            $this->profileImage->EditCustomAttributes = "";
            if (!$this->profileImage->Raw) {
                $this->profileImage->AdvancedSearch->SearchValue = HtmlDecode($this->profileImage->AdvancedSearch->SearchValue);
            }
            $this->profileImage->EditValue = HtmlEncode($this->profileImage->AdvancedSearch->SearchValue);
            $this->profileImage->PlaceHolder = RemoveHtml($this->profileImage->caption());

            // totalYearsOfExperience
            $this->totalYearsOfExperience->EditAttrs["class"] = "form-control";
            $this->totalYearsOfExperience->EditCustomAttributes = "";
            $this->totalYearsOfExperience->EditValue = HtmlEncode($this->totalYearsOfExperience->AdvancedSearch->SearchValue);
            $this->totalYearsOfExperience->PlaceHolder = RemoveHtml($this->totalYearsOfExperience->caption());

            // totalMonthsOfExperience
            $this->totalMonthsOfExperience->EditAttrs["class"] = "form-control";
            $this->totalMonthsOfExperience->EditCustomAttributes = "";
            $this->totalMonthsOfExperience->EditValue = HtmlEncode($this->totalMonthsOfExperience->AdvancedSearch->SearchValue);
            $this->totalMonthsOfExperience->PlaceHolder = RemoveHtml($this->totalMonthsOfExperience->caption());

            // generatedCVFile
            $this->generatedCVFile->EditAttrs["class"] = "form-control";
            $this->generatedCVFile->EditCustomAttributes = "";
            if (!$this->generatedCVFile->Raw) {
                $this->generatedCVFile->AdvancedSearch->SearchValue = HtmlDecode($this->generatedCVFile->AdvancedSearch->SearchValue);
            }
            $this->generatedCVFile->EditValue = HtmlEncode($this->generatedCVFile->AdvancedSearch->SearchValue);
            $this->generatedCVFile->PlaceHolder = RemoveHtml($this->generatedCVFile->caption());

            // created
            $this->created->EditAttrs["class"] = "form-control";
            $this->created->EditCustomAttributes = "";
            $this->created->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->created->AdvancedSearch->SearchValue, 0), 8));
            $this->created->PlaceHolder = RemoveHtml($this->created->caption());

            // updated
            $this->updated->EditAttrs["class"] = "form-control";
            $this->updated->EditCustomAttributes = "";
            $this->updated->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->updated->AdvancedSearch->SearchValue, 0), 8));
            $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

            // expectedSalary
            $this->expectedSalary->EditAttrs["class"] = "form-control";
            $this->expectedSalary->EditCustomAttributes = "";
            $this->expectedSalary->EditValue = HtmlEncode($this->expectedSalary->AdvancedSearch->SearchValue);
            $this->expectedSalary->PlaceHolder = RemoveHtml($this->expectedSalary->caption());

            // preferedJobtype
            $this->preferedJobtype->EditAttrs["class"] = "form-control";
            $this->preferedJobtype->EditCustomAttributes = "";
            if (!$this->preferedJobtype->Raw) {
                $this->preferedJobtype->AdvancedSearch->SearchValue = HtmlDecode($this->preferedJobtype->AdvancedSearch->SearchValue);
            }
            $this->preferedJobtype->EditValue = HtmlEncode($this->preferedJobtype->AdvancedSearch->SearchValue);
            $this->preferedJobtype->PlaceHolder = RemoveHtml($this->preferedJobtype->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            $this->age->EditValue = HtmlEncode($this->age->AdvancedSearch->SearchValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // hash
            $this->hash->EditAttrs["class"] = "form-control";
            $this->hash->EditCustomAttributes = "";
            if (!$this->hash->Raw) {
                $this->hash->AdvancedSearch->SearchValue = HtmlDecode($this->hash->AdvancedSearch->SearchValue);
            }
            $this->hash->EditValue = HtmlEncode($this->hash->AdvancedSearch->SearchValue);
            $this->hash->PlaceHolder = RemoveHtml($this->hash->caption());

            // linkedInProfileLink
            $this->linkedInProfileLink->EditAttrs["class"] = "form-control";
            $this->linkedInProfileLink->EditCustomAttributes = "";
            if (!$this->linkedInProfileLink->Raw) {
                $this->linkedInProfileLink->AdvancedSearch->SearchValue = HtmlDecode($this->linkedInProfileLink->AdvancedSearch->SearchValue);
            }
            $this->linkedInProfileLink->EditValue = HtmlEncode($this->linkedInProfileLink->AdvancedSearch->SearchValue);
            $this->linkedInProfileLink->PlaceHolder = RemoveHtml($this->linkedInProfileLink->caption());

            // linkedInProfileId
            $this->linkedInProfileId->EditAttrs["class"] = "form-control";
            $this->linkedInProfileId->EditCustomAttributes = "";
            if (!$this->linkedInProfileId->Raw) {
                $this->linkedInProfileId->AdvancedSearch->SearchValue = HtmlDecode($this->linkedInProfileId->AdvancedSearch->SearchValue);
            }
            $this->linkedInProfileId->EditValue = HtmlEncode($this->linkedInProfileId->AdvancedSearch->SearchValue);
            $this->linkedInProfileId->PlaceHolder = RemoveHtml($this->linkedInProfileId->caption());

            // facebookProfileLink
            $this->facebookProfileLink->EditAttrs["class"] = "form-control";
            $this->facebookProfileLink->EditCustomAttributes = "";
            if (!$this->facebookProfileLink->Raw) {
                $this->facebookProfileLink->AdvancedSearch->SearchValue = HtmlDecode($this->facebookProfileLink->AdvancedSearch->SearchValue);
            }
            $this->facebookProfileLink->EditValue = HtmlEncode($this->facebookProfileLink->AdvancedSearch->SearchValue);
            $this->facebookProfileLink->PlaceHolder = RemoveHtml($this->facebookProfileLink->caption());

            // facebookProfileId
            $this->facebookProfileId->EditAttrs["class"] = "form-control";
            $this->facebookProfileId->EditCustomAttributes = "";
            if (!$this->facebookProfileId->Raw) {
                $this->facebookProfileId->AdvancedSearch->SearchValue = HtmlDecode($this->facebookProfileId->AdvancedSearch->SearchValue);
            }
            $this->facebookProfileId->EditValue = HtmlEncode($this->facebookProfileId->AdvancedSearch->SearchValue);
            $this->facebookProfileId->PlaceHolder = RemoveHtml($this->facebookProfileId->caption());

            // twitterProfileLink
            $this->twitterProfileLink->EditAttrs["class"] = "form-control";
            $this->twitterProfileLink->EditCustomAttributes = "";
            if (!$this->twitterProfileLink->Raw) {
                $this->twitterProfileLink->AdvancedSearch->SearchValue = HtmlDecode($this->twitterProfileLink->AdvancedSearch->SearchValue);
            }
            $this->twitterProfileLink->EditValue = HtmlEncode($this->twitterProfileLink->AdvancedSearch->SearchValue);
            $this->twitterProfileLink->PlaceHolder = RemoveHtml($this->twitterProfileLink->caption());

            // twitterProfileId
            $this->twitterProfileId->EditAttrs["class"] = "form-control";
            $this->twitterProfileId->EditCustomAttributes = "";
            if (!$this->twitterProfileId->Raw) {
                $this->twitterProfileId->AdvancedSearch->SearchValue = HtmlDecode($this->twitterProfileId->AdvancedSearch->SearchValue);
            }
            $this->twitterProfileId->EditValue = HtmlEncode($this->twitterProfileId->AdvancedSearch->SearchValue);
            $this->twitterProfileId->PlaceHolder = RemoveHtml($this->twitterProfileId->caption());

            // googleProfileLink
            $this->googleProfileLink->EditAttrs["class"] = "form-control";
            $this->googleProfileLink->EditCustomAttributes = "";
            if (!$this->googleProfileLink->Raw) {
                $this->googleProfileLink->AdvancedSearch->SearchValue = HtmlDecode($this->googleProfileLink->AdvancedSearch->SearchValue);
            }
            $this->googleProfileLink->EditValue = HtmlEncode($this->googleProfileLink->AdvancedSearch->SearchValue);
            $this->googleProfileLink->PlaceHolder = RemoveHtml($this->googleProfileLink->caption());

            // googleProfileId
            $this->googleProfileId->EditAttrs["class"] = "form-control";
            $this->googleProfileId->EditCustomAttributes = "";
            if (!$this->googleProfileId->Raw) {
                $this->googleProfileId->AdvancedSearch->SearchValue = HtmlDecode($this->googleProfileId->AdvancedSearch->SearchValue);
            }
            $this->googleProfileId->EditValue = HtmlEncode($this->googleProfileId->AdvancedSearch->SearchValue);
            $this->googleProfileId->PlaceHolder = RemoveHtml($this->googleProfileId->caption());
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
        $this->first_name->AdvancedSearch->load();
        $this->last_name->AdvancedSearch->load();
        $this->nationality->AdvancedSearch->load();
        $this->birthday->AdvancedSearch->load();
        $this->gender->AdvancedSearch->load();
        $this->marital_status->AdvancedSearch->load();
        $this->address1->AdvancedSearch->load();
        $this->address2->AdvancedSearch->load();
        $this->city->AdvancedSearch->load();
        $this->country->AdvancedSearch->load();
        $this->province->AdvancedSearch->load();
        $this->postal_code->AdvancedSearch->load();
        $this->_email->AdvancedSearch->load();
        $this->home_phone->AdvancedSearch->load();
        $this->mobile_phone->AdvancedSearch->load();
        $this->cv_title->AdvancedSearch->load();
        $this->cv->AdvancedSearch->load();
        $this->cvtext->AdvancedSearch->load();
        $this->industry->AdvancedSearch->load();
        $this->profileImage->AdvancedSearch->load();
        $this->head_line->AdvancedSearch->load();
        $this->objective->AdvancedSearch->load();
        $this->work_history->AdvancedSearch->load();
        $this->education->AdvancedSearch->load();
        $this->skills->AdvancedSearch->load();
        $this->referees->AdvancedSearch->load();
        $this->linkedInUrl->AdvancedSearch->load();
        $this->linkedInData->AdvancedSearch->load();
        $this->totalYearsOfExperience->AdvancedSearch->load();
        $this->totalMonthsOfExperience->AdvancedSearch->load();
        $this->htmlCVData->AdvancedSearch->load();
        $this->generatedCVFile->AdvancedSearch->load();
        $this->created->AdvancedSearch->load();
        $this->updated->AdvancedSearch->load();
        $this->expectedSalary->AdvancedSearch->load();
        $this->preferedPositions->AdvancedSearch->load();
        $this->preferedJobtype->AdvancedSearch->load();
        $this->preferedCountries->AdvancedSearch->load();
        $this->tags->AdvancedSearch->load();
        $this->notes->AdvancedSearch->load();
        $this->calls->AdvancedSearch->load();
        $this->age->AdvancedSearch->load();
        $this->hash->AdvancedSearch->load();
        $this->linkedInProfileLink->AdvancedSearch->load();
        $this->linkedInProfileId->AdvancedSearch->load();
        $this->facebookProfileLink->AdvancedSearch->load();
        $this->facebookProfileId->AdvancedSearch->load();
        $this->twitterProfileLink->AdvancedSearch->load();
        $this->twitterProfileId->AdvancedSearch->load();
        $this->googleProfileLink->AdvancedSearch->load();
        $this->googleProfileId->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.frecruitment_candidateslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.frecruitment_candidateslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.frecruitment_candidateslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_recruitment_candidates" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_recruitment_candidates\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.frecruitment_candidateslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"frecruitment_candidateslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_gender":
                    break;
                case "x_marital_status":
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
