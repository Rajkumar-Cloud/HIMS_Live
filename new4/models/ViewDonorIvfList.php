<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewDonorIvfList extends ViewDonorIvf
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_donor_ivf';

    // Page object name
    public $PageObjName = "ViewDonorIvfList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_donor_ivflist";
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
    public $ExportExcelCustom = true;
    public $ExportWordCustom = true;
    public $ExportPdfCustom = true;
    public $ExportEmailCustom = true;

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (view_donor_ivf)
        if (!isset($GLOBALS["view_donor_ivf"]) || get_class($GLOBALS["view_donor_ivf"]) == PROJECT_NAMESPACE . "view_donor_ivf") {
            $GLOBALS["view_donor_ivf"] = &$this;
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
        $this->AddUrl = "ViewDonorIvfAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewDonorIvfDelete";
        $this->MultiUpdateUrl = "ViewDonorIvfUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_donor_ivf');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_donor_ivflistsrch";

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
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("view_donor_ivf"));
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
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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

        // Custom export (post back from ew.applyTemplate), export and terminate page
        if (Post("customexport") !== null) {
            $this->CustomExport = Post("customexport");
            $this->Export = $this->CustomExport;
            $this->terminate();
            return;
        }

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
        $this->Male->setVisibility();
        $this->Female->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->malepropic->setVisibility();
        $this->femalepropic->setVisibility();
        $this->HusbandEducation->setVisibility();
        $this->WifeEducation->setVisibility();
        $this->HusbandWorkHours->setVisibility();
        $this->WifeWorkHours->setVisibility();
        $this->PatientLanguage->setVisibility();
        $this->ReferedBy->setVisibility();
        $this->ReferPhNo->setVisibility();
        $this->WifeCell->setVisibility();
        $this->HusbandCell->setVisibility();
        $this->WifeEmail->setVisibility();
        $this->HusbandEmail->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->CoupleID->setVisibility();
        $this->HospID->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerID->setVisibility();
        $this->DrID->setVisibility();
        $this->DrDepartment->setVisibility();
        $this->Doctor->setVisibility();
        $this->femalepic->Visible = false;
        $this->Fgender->Visible = false;
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
        $this->setupLookupOptions($this->Female);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->ReferedBy);
        $this->setupLookupOptions($this->DrID);
        $this->AllowAddDeleteRow = false; // Do not allow add/delete row

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_donor_ivflistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->Male->AdvancedSearch->toJson(), ","); // Field Male
        $filterList = Concat($filterList, $this->Female->AdvancedSearch->toJson(), ","); // Field Female
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->malepropic->AdvancedSearch->toJson(), ","); // Field malepropic
        $filterList = Concat($filterList, $this->femalepropic->AdvancedSearch->toJson(), ","); // Field femalepropic
        $filterList = Concat($filterList, $this->HusbandEducation->AdvancedSearch->toJson(), ","); // Field HusbandEducation
        $filterList = Concat($filterList, $this->WifeEducation->AdvancedSearch->toJson(), ","); // Field WifeEducation
        $filterList = Concat($filterList, $this->HusbandWorkHours->AdvancedSearch->toJson(), ","); // Field HusbandWorkHours
        $filterList = Concat($filterList, $this->WifeWorkHours->AdvancedSearch->toJson(), ","); // Field WifeWorkHours
        $filterList = Concat($filterList, $this->PatientLanguage->AdvancedSearch->toJson(), ","); // Field PatientLanguage
        $filterList = Concat($filterList, $this->ReferedBy->AdvancedSearch->toJson(), ","); // Field ReferedBy
        $filterList = Concat($filterList, $this->ReferPhNo->AdvancedSearch->toJson(), ","); // Field ReferPhNo
        $filterList = Concat($filterList, $this->WifeCell->AdvancedSearch->toJson(), ","); // Field WifeCell
        $filterList = Concat($filterList, $this->HusbandCell->AdvancedSearch->toJson(), ","); // Field HusbandCell
        $filterList = Concat($filterList, $this->WifeEmail->AdvancedSearch->toJson(), ","); // Field WifeEmail
        $filterList = Concat($filterList, $this->HusbandEmail->AdvancedSearch->toJson(), ","); // Field HusbandEmail
        $filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
        $filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
        $filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
        $filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
        $filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
        $filterList = Concat($filterList, $this->femalepic->AdvancedSearch->toJson(), ","); // Field femalepic
        $filterList = Concat($filterList, $this->Fgender->AdvancedSearch->toJson(), ","); // Field Fgender
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_donor_ivflistsrch", $filters);
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

        // Field Male
        $this->Male->AdvancedSearch->SearchValue = @$filter["x_Male"];
        $this->Male->AdvancedSearch->SearchOperator = @$filter["z_Male"];
        $this->Male->AdvancedSearch->SearchCondition = @$filter["v_Male"];
        $this->Male->AdvancedSearch->SearchValue2 = @$filter["y_Male"];
        $this->Male->AdvancedSearch->SearchOperator2 = @$filter["w_Male"];
        $this->Male->AdvancedSearch->save();

        // Field Female
        $this->Female->AdvancedSearch->SearchValue = @$filter["x_Female"];
        $this->Female->AdvancedSearch->SearchOperator = @$filter["z_Female"];
        $this->Female->AdvancedSearch->SearchCondition = @$filter["v_Female"];
        $this->Female->AdvancedSearch->SearchValue2 = @$filter["y_Female"];
        $this->Female->AdvancedSearch->SearchOperator2 = @$filter["w_Female"];
        $this->Female->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

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

        // Field malepropic
        $this->malepropic->AdvancedSearch->SearchValue = @$filter["x_malepropic"];
        $this->malepropic->AdvancedSearch->SearchOperator = @$filter["z_malepropic"];
        $this->malepropic->AdvancedSearch->SearchCondition = @$filter["v_malepropic"];
        $this->malepropic->AdvancedSearch->SearchValue2 = @$filter["y_malepropic"];
        $this->malepropic->AdvancedSearch->SearchOperator2 = @$filter["w_malepropic"];
        $this->malepropic->AdvancedSearch->save();

        // Field femalepropic
        $this->femalepropic->AdvancedSearch->SearchValue = @$filter["x_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchOperator = @$filter["z_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchCondition = @$filter["v_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchValue2 = @$filter["y_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchOperator2 = @$filter["w_femalepropic"];
        $this->femalepropic->AdvancedSearch->save();

        // Field HusbandEducation
        $this->HusbandEducation->AdvancedSearch->SearchValue = @$filter["x_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchOperator = @$filter["z_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchCondition = @$filter["v_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->save();

        // Field WifeEducation
        $this->WifeEducation->AdvancedSearch->SearchValue = @$filter["x_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchOperator = @$filter["z_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchCondition = @$filter["v_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchValue2 = @$filter["y_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->save();

        // Field HusbandWorkHours
        $this->HusbandWorkHours->AdvancedSearch->SearchValue = @$filter["x_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchOperator = @$filter["z_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchCondition = @$filter["v_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->save();

        // Field WifeWorkHours
        $this->WifeWorkHours->AdvancedSearch->SearchValue = @$filter["x_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchOperator = @$filter["z_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchCondition = @$filter["v_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->save();

        // Field PatientLanguage
        $this->PatientLanguage->AdvancedSearch->SearchValue = @$filter["x_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchOperator = @$filter["z_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchCondition = @$filter["v_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchValue2 = @$filter["y_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchOperator2 = @$filter["w_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->save();

        // Field ReferedBy
        $this->ReferedBy->AdvancedSearch->SearchValue = @$filter["x_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchOperator = @$filter["z_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchCondition = @$filter["v_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchValue2 = @$filter["y_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->save();

        // Field ReferPhNo
        $this->ReferPhNo->AdvancedSearch->SearchValue = @$filter["x_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchOperator = @$filter["z_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchCondition = @$filter["v_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->save();

        // Field WifeCell
        $this->WifeCell->AdvancedSearch->SearchValue = @$filter["x_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchOperator = @$filter["z_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchCondition = @$filter["v_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchValue2 = @$filter["y_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchOperator2 = @$filter["w_WifeCell"];
        $this->WifeCell->AdvancedSearch->save();

        // Field HusbandCell
        $this->HusbandCell->AdvancedSearch->SearchValue = @$filter["x_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchOperator = @$filter["z_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchCondition = @$filter["v_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchValue2 = @$filter["y_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->save();

        // Field WifeEmail
        $this->WifeEmail->AdvancedSearch->SearchValue = @$filter["x_WifeEmail"];
        $this->WifeEmail->AdvancedSearch->SearchOperator = @$filter["z_WifeEmail"];
        $this->WifeEmail->AdvancedSearch->SearchCondition = @$filter["v_WifeEmail"];
        $this->WifeEmail->AdvancedSearch->SearchValue2 = @$filter["y_WifeEmail"];
        $this->WifeEmail->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEmail"];
        $this->WifeEmail->AdvancedSearch->save();

        // Field HusbandEmail
        $this->HusbandEmail->AdvancedSearch->SearchValue = @$filter["x_HusbandEmail"];
        $this->HusbandEmail->AdvancedSearch->SearchOperator = @$filter["z_HusbandEmail"];
        $this->HusbandEmail->AdvancedSearch->SearchCondition = @$filter["v_HusbandEmail"];
        $this->HusbandEmail->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEmail"];
        $this->HusbandEmail->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEmail"];
        $this->HusbandEmail->AdvancedSearch->save();

        // Field ARTCYCLE
        $this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->save();

        // Field RESULT
        $this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
        $this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
        $this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
        $this->RESULT->AdvancedSearch->save();

        // Field CoupleID
        $this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
        $this->CoupleID->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field PartnerID
        $this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
        $this->PartnerID->AdvancedSearch->save();

        // Field DrID
        $this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
        $this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
        $this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
        $this->DrID->AdvancedSearch->save();

        // Field DrDepartment
        $this->DrDepartment->AdvancedSearch->SearchValue = @$filter["x_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchOperator = @$filter["z_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchCondition = @$filter["v_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchValue2 = @$filter["y_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchOperator2 = @$filter["w_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->save();

        // Field Doctor
        $this->Doctor->AdvancedSearch->SearchValue = @$filter["x_Doctor"];
        $this->Doctor->AdvancedSearch->SearchOperator = @$filter["z_Doctor"];
        $this->Doctor->AdvancedSearch->SearchCondition = @$filter["v_Doctor"];
        $this->Doctor->AdvancedSearch->SearchValue2 = @$filter["y_Doctor"];
        $this->Doctor->AdvancedSearch->SearchOperator2 = @$filter["w_Doctor"];
        $this->Doctor->AdvancedSearch->save();

        // Field femalepic
        $this->femalepic->AdvancedSearch->SearchValue = @$filter["x_femalepic"];
        $this->femalepic->AdvancedSearch->SearchOperator = @$filter["z_femalepic"];
        $this->femalepic->AdvancedSearch->SearchCondition = @$filter["v_femalepic"];
        $this->femalepic->AdvancedSearch->SearchValue2 = @$filter["y_femalepic"];
        $this->femalepic->AdvancedSearch->SearchOperator2 = @$filter["w_femalepic"];
        $this->femalepic->AdvancedSearch->save();

        // Field Fgender
        $this->Fgender->AdvancedSearch->SearchValue = @$filter["x_Fgender"];
        $this->Fgender->AdvancedSearch->SearchOperator = @$filter["z_Fgender"];
        $this->Fgender->AdvancedSearch->SearchCondition = @$filter["v_Fgender"];
        $this->Fgender->AdvancedSearch->SearchValue2 = @$filter["y_Fgender"];
        $this->Fgender->AdvancedSearch->SearchOperator2 = @$filter["w_Fgender"];
        $this->Fgender->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->Male, $default, false); // Male
        $this->buildSearchSql($where, $this->Female, $default, false); // Female
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->malepropic, $default, false); // malepropic
        $this->buildSearchSql($where, $this->femalepropic, $default, false); // femalepropic
        $this->buildSearchSql($where, $this->HusbandEducation, $default, false); // HusbandEducation
        $this->buildSearchSql($where, $this->WifeEducation, $default, false); // WifeEducation
        $this->buildSearchSql($where, $this->HusbandWorkHours, $default, false); // HusbandWorkHours
        $this->buildSearchSql($where, $this->WifeWorkHours, $default, false); // WifeWorkHours
        $this->buildSearchSql($where, $this->PatientLanguage, $default, false); // PatientLanguage
        $this->buildSearchSql($where, $this->ReferedBy, $default, false); // ReferedBy
        $this->buildSearchSql($where, $this->ReferPhNo, $default, false); // ReferPhNo
        $this->buildSearchSql($where, $this->WifeCell, $default, false); // WifeCell
        $this->buildSearchSql($where, $this->HusbandCell, $default, false); // HusbandCell
        $this->buildSearchSql($where, $this->WifeEmail, $default, false); // WifeEmail
        $this->buildSearchSql($where, $this->HusbandEmail, $default, false); // HusbandEmail
        $this->buildSearchSql($where, $this->ARTCYCLE, $default, false); // ARTCYCLE
        $this->buildSearchSql($where, $this->RESULT, $default, false); // RESULT
        $this->buildSearchSql($where, $this->CoupleID, $default, false); // CoupleID
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->PartnerID, $default, false); // PartnerID
        $this->buildSearchSql($where, $this->DrID, $default, false); // DrID
        $this->buildSearchSql($where, $this->DrDepartment, $default, false); // DrDepartment
        $this->buildSearchSql($where, $this->Doctor, $default, false); // Doctor
        $this->buildSearchSql($where, $this->femalepic, $default, false); // femalepic
        $this->buildSearchSql($where, $this->Fgender, $default, false); // Fgender

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->Male->AdvancedSearch->save(); // Male
            $this->Female->AdvancedSearch->save(); // Female
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->malepropic->AdvancedSearch->save(); // malepropic
            $this->femalepropic->AdvancedSearch->save(); // femalepropic
            $this->HusbandEducation->AdvancedSearch->save(); // HusbandEducation
            $this->WifeEducation->AdvancedSearch->save(); // WifeEducation
            $this->HusbandWorkHours->AdvancedSearch->save(); // HusbandWorkHours
            $this->WifeWorkHours->AdvancedSearch->save(); // WifeWorkHours
            $this->PatientLanguage->AdvancedSearch->save(); // PatientLanguage
            $this->ReferedBy->AdvancedSearch->save(); // ReferedBy
            $this->ReferPhNo->AdvancedSearch->save(); // ReferPhNo
            $this->WifeCell->AdvancedSearch->save(); // WifeCell
            $this->HusbandCell->AdvancedSearch->save(); // HusbandCell
            $this->WifeEmail->AdvancedSearch->save(); // WifeEmail
            $this->HusbandEmail->AdvancedSearch->save(); // HusbandEmail
            $this->ARTCYCLE->AdvancedSearch->save(); // ARTCYCLE
            $this->RESULT->AdvancedSearch->save(); // RESULT
            $this->CoupleID->AdvancedSearch->save(); // CoupleID
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->PartnerID->AdvancedSearch->save(); // PartnerID
            $this->DrID->AdvancedSearch->save(); // DrID
            $this->DrDepartment->AdvancedSearch->save(); // DrDepartment
            $this->Doctor->AdvancedSearch->save(); // Doctor
            $this->femalepic->AdvancedSearch->save(); // femalepic
            $this->Fgender->AdvancedSearch->save(); // Fgender
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
        $this->buildBasicSearchSql($where, $this->malepropic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->femalepropic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandEducation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeEducation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandWorkHours, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeWorkHours, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientLanguage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferPhNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeCell, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandCell, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeEmail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandEmail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->femalepic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fgender, $arKeywords, $type);
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
        if ($this->Male->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Female->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createdby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifiedby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifieddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->malepropic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->femalepropic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandEducation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeEducation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandWorkHours->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeWorkHours->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientLanguage->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferPhNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeCell->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandCell->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeEmail->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandEmail->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ARTCYCLE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RESULT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CoupleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrDepartment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Doctor->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->femalepic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Fgender->AdvancedSearch->issetSession()) {
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
                $this->Male->AdvancedSearch->unsetSession();
                $this->Female->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->malepropic->AdvancedSearch->unsetSession();
                $this->femalepropic->AdvancedSearch->unsetSession();
                $this->HusbandEducation->AdvancedSearch->unsetSession();
                $this->WifeEducation->AdvancedSearch->unsetSession();
                $this->HusbandWorkHours->AdvancedSearch->unsetSession();
                $this->WifeWorkHours->AdvancedSearch->unsetSession();
                $this->PatientLanguage->AdvancedSearch->unsetSession();
                $this->ReferedBy->AdvancedSearch->unsetSession();
                $this->ReferPhNo->AdvancedSearch->unsetSession();
                $this->WifeCell->AdvancedSearch->unsetSession();
                $this->HusbandCell->AdvancedSearch->unsetSession();
                $this->WifeEmail->AdvancedSearch->unsetSession();
                $this->HusbandEmail->AdvancedSearch->unsetSession();
                $this->ARTCYCLE->AdvancedSearch->unsetSession();
                $this->RESULT->AdvancedSearch->unsetSession();
                $this->CoupleID->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->PartnerID->AdvancedSearch->unsetSession();
                $this->DrID->AdvancedSearch->unsetSession();
                $this->DrDepartment->AdvancedSearch->unsetSession();
                $this->Doctor->AdvancedSearch->unsetSession();
                $this->femalepic->AdvancedSearch->unsetSession();
                $this->Fgender->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->Male->AdvancedSearch->load();
                $this->Female->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->malepropic->AdvancedSearch->load();
                $this->femalepropic->AdvancedSearch->load();
                $this->HusbandEducation->AdvancedSearch->load();
                $this->WifeEducation->AdvancedSearch->load();
                $this->HusbandWorkHours->AdvancedSearch->load();
                $this->WifeWorkHours->AdvancedSearch->load();
                $this->PatientLanguage->AdvancedSearch->load();
                $this->ReferedBy->AdvancedSearch->load();
                $this->ReferPhNo->AdvancedSearch->load();
                $this->WifeCell->AdvancedSearch->load();
                $this->HusbandCell->AdvancedSearch->load();
                $this->WifeEmail->AdvancedSearch->load();
                $this->HusbandEmail->AdvancedSearch->load();
                $this->ARTCYCLE->AdvancedSearch->load();
                $this->RESULT->AdvancedSearch->load();
                $this->CoupleID->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->PartnerID->AdvancedSearch->load();
                $this->DrID->AdvancedSearch->load();
                $this->DrDepartment->AdvancedSearch->load();
                $this->Doctor->AdvancedSearch->load();
                $this->femalepic->AdvancedSearch->load();
                $this->Fgender->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->Male); // Male
            $this->updateSort($this->Female); // Female
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->malepropic); // malepropic
            $this->updateSort($this->femalepropic); // femalepropic
            $this->updateSort($this->HusbandEducation); // HusbandEducation
            $this->updateSort($this->WifeEducation); // WifeEducation
            $this->updateSort($this->HusbandWorkHours); // HusbandWorkHours
            $this->updateSort($this->WifeWorkHours); // WifeWorkHours
            $this->updateSort($this->PatientLanguage); // PatientLanguage
            $this->updateSort($this->ReferedBy); // ReferedBy
            $this->updateSort($this->ReferPhNo); // ReferPhNo
            $this->updateSort($this->WifeCell); // WifeCell
            $this->updateSort($this->HusbandCell); // HusbandCell
            $this->updateSort($this->WifeEmail); // WifeEmail
            $this->updateSort($this->HusbandEmail); // HusbandEmail
            $this->updateSort($this->ARTCYCLE); // ARTCYCLE
            $this->updateSort($this->RESULT); // RESULT
            $this->updateSort($this->CoupleID); // CoupleID
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->DrID); // DrID
            $this->updateSort($this->DrDepartment); // DrDepartment
            $this->updateSort($this->Doctor); // Doctor
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
                $this->setSessionOrderByList($orderBy);
                $this->id->setSort("");
                $this->Male->setSort("");
                $this->Female->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->malepropic->setSort("");
                $this->femalepropic->setSort("");
                $this->HusbandEducation->setSort("");
                $this->WifeEducation->setSort("");
                $this->HusbandWorkHours->setSort("");
                $this->WifeWorkHours->setSort("");
                $this->PatientLanguage->setSort("");
                $this->ReferedBy->setSort("");
                $this->ReferPhNo->setSort("");
                $this->WifeCell->setSort("");
                $this->HusbandCell->setSort("");
                $this->WifeEmail->setSort("");
                $this->HusbandEmail->setSort("");
                $this->ARTCYCLE->setSort("");
                $this->RESULT->setSort("");
                $this->CoupleID->setSort("");
                $this->HospID->setSort("");
                $this->PatientName->setSort("");
                $this->PatientID->setSort("");
                $this->PartnerName->setSort("");
                $this->PartnerID->setSort("");
                $this->DrID->setSort("");
                $this->DrDepartment->setSort("");
                $this->Doctor->setSort("");
                $this->femalepic->setSort("");
                $this->Fgender->setSort("");
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

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canDelete();
        $item->OnLeft = true;

        // "detail_ivf_treatment_plan"
        $item = &$this->ListOptions->add("detail_ivf_treatment_plan");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_treatment_plan') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // Multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$this->ListOptions->add("details");
            $item->CssClass = "text-nowrap";
            $item->Visible = $this->ShowMultipleDetails;
            $item->OnLeft = true;
            $item->ShowInButtonGroup = false;
        }

        // Set up detail pages
        $pages = new SubPages();
        $pages->add("ivf_treatment_plan");
        $this->DetailPages = $pages;

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
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_ivf_treatment_plan"
        $opt = $this->ListOptions["detail_ivf_treatment_plan"];
        if ($Security->allowList(CurrentProjectID() . 'ivf_treatment_plan')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_treatment_plan", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("IvfTreatmentPlanList?" . Config("TABLE_SHOW_MASTER") . "=view_donor_ivf&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_Female", $this->Female->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("IvfTreatmentPlanGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_donor_ivf')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_treatment_plan");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "ivf_treatment_plan";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_donor_ivf')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_treatment_plan");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "ivf_treatment_plan";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }
        if ($this->ShowMultipleDetails) {
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
            $links = "";
            if ($detailViewTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            }
            if ($detailEditTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            }
            if ($detailCopyTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
                $body .= "<ul class=\"dropdown-menu ew-menu\">" . $links . "</ul>";
            }
            $body .= "</div>";
            // Multiple details
            $opt = $this->ListOptions["details"];
            $opt->Body = $body;
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
        $option = $options["detail"];
        $detailTableLink = "";
                $item = &$option->add("detailadd_ivf_treatment_plan");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_treatment_plan");
                $detailPage = Container("IvfTreatmentPlanGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'view_donor_ivf') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "ivf_treatment_plan";
                }

        // Add multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$option->add("detailsadd");
            $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
            $caption = $Language->phrase("AddMasterDetailLink");
            $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
            $item->Visible = $detailTableLink != "" && $Security->canAdd();
            // Hide single master/detail items
            $ar = explode(",", $detailTableLink);
            $cnt = count($ar);
            for ($i = 0; $i < $cnt; $i++) {
                if ($item = $option["detailadd_" . $ar[$i]]) {
                    $item->Visible = false;
                }
            }
        }
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_donor_ivflistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_donor_ivflistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_donor_ivflist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $links = "";
        $btngrps = "";
        $sqlwrk = "`RIDNO`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Female->CurrentValue, $this->Dbid) . "'";

        // Column "detail_ivf_treatment_plan"
        if ($this->DetailPages && $this->DetailPages["ivf_treatment_plan"] && $this->DetailPages["ivf_treatment_plan"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_ivf_treatment_plan"];
            $url = "IvfTreatmentPlanPreview?t=view_donor_ivf&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"ivf_treatment_plan\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'view_donor_ivf')) {
                $label = $Language->TablePhrase("ivf_treatment_plan", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_treatment_plan\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("IvfTreatmentPlanList?" . Config("TABLE_SHOW_MASTER") . "=view_donor_ivf&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_Female", $this->Female->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_treatment_plan", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("IvfTreatmentPlanGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_donor_ivf')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_treatment_plan");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_donor_ivf')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_treatment_plan");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }

        // Hide detail items if necessary
        $this->ListOptions->hideDetailItemsForDropDown();

        // Column "preview"
        $option = $this->ListOptions["preview"];
        if (!$option) { // Add preview column
            $option = &$this->ListOptions->add("preview");
            $option->OnLeft = true;
            if ($option->OnLeft) {
                $option->moveTo($this->ListOptions->itemPos("checkbox") + 1);
            } else {
                $option->moveTo($this->ListOptions->itemPos("checkbox"));
            }
            $option->Visible = !($this->isExport() || $this->isGridAdd() || $this->isGridEdit());
            $option->ShowInDropDown = false;
            $option->ShowInButtonGroup = false;
        }
        if ($option) {
            $option->Body = "<i class=\"ew-preview-row-btn ew-icon icon-expand\"></i>";
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }

        // Column "details" (Multiple details)
        $option = $this->ListOptions["details"];
        if ($option) {
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }
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

        // Male
        if (!$this->isAddOrEdit() && $this->Male->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Male->AdvancedSearch->SearchValue != "" || $this->Male->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Female
        if (!$this->isAddOrEdit() && $this->Female->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Female->AdvancedSearch->SearchValue != "" || $this->Female->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // createdby
        if (!$this->isAddOrEdit() && $this->createdby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createdby->AdvancedSearch->SearchValue != "" || $this->createdby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createddatetime
        if (!$this->isAddOrEdit() && $this->createddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createddatetime->AdvancedSearch->SearchValue != "" || $this->createddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifiedby
        if (!$this->isAddOrEdit() && $this->modifiedby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifiedby->AdvancedSearch->SearchValue != "" || $this->modifiedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifieddatetime
        if (!$this->isAddOrEdit() && $this->modifieddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifieddatetime->AdvancedSearch->SearchValue != "" || $this->modifieddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // malepropic
        if (!$this->isAddOrEdit() && $this->malepropic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->malepropic->AdvancedSearch->SearchValue != "" || $this->malepropic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // femalepropic
        if (!$this->isAddOrEdit() && $this->femalepropic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->femalepropic->AdvancedSearch->SearchValue != "" || $this->femalepropic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandEducation
        if (!$this->isAddOrEdit() && $this->HusbandEducation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandEducation->AdvancedSearch->SearchValue != "" || $this->HusbandEducation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeEducation
        if (!$this->isAddOrEdit() && $this->WifeEducation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeEducation->AdvancedSearch->SearchValue != "" || $this->WifeEducation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandWorkHours
        if (!$this->isAddOrEdit() && $this->HusbandWorkHours->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandWorkHours->AdvancedSearch->SearchValue != "" || $this->HusbandWorkHours->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeWorkHours
        if (!$this->isAddOrEdit() && $this->WifeWorkHours->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeWorkHours->AdvancedSearch->SearchValue != "" || $this->WifeWorkHours->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientLanguage
        if (!$this->isAddOrEdit() && $this->PatientLanguage->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientLanguage->AdvancedSearch->SearchValue != "" || $this->PatientLanguage->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferedBy
        if (!$this->isAddOrEdit() && $this->ReferedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferedBy->AdvancedSearch->SearchValue != "" || $this->ReferedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferPhNo
        if (!$this->isAddOrEdit() && $this->ReferPhNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferPhNo->AdvancedSearch->SearchValue != "" || $this->ReferPhNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeCell
        if (!$this->isAddOrEdit() && $this->WifeCell->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeCell->AdvancedSearch->SearchValue != "" || $this->WifeCell->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandCell
        if (!$this->isAddOrEdit() && $this->HusbandCell->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandCell->AdvancedSearch->SearchValue != "" || $this->HusbandCell->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeEmail
        if (!$this->isAddOrEdit() && $this->WifeEmail->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeEmail->AdvancedSearch->SearchValue != "" || $this->WifeEmail->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandEmail
        if (!$this->isAddOrEdit() && $this->HusbandEmail->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandEmail->AdvancedSearch->SearchValue != "" || $this->HusbandEmail->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ARTCYCLE
        if (!$this->isAddOrEdit() && $this->ARTCYCLE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ARTCYCLE->AdvancedSearch->SearchValue != "" || $this->ARTCYCLE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RESULT
        if (!$this->isAddOrEdit() && $this->RESULT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RESULT->AdvancedSearch->SearchValue != "" || $this->RESULT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // HospID
        if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerName
        if (!$this->isAddOrEdit() && $this->PartnerName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerName->AdvancedSearch->SearchValue != "" || $this->PartnerName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerID
        if (!$this->isAddOrEdit() && $this->PartnerID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerID->AdvancedSearch->SearchValue != "" || $this->PartnerID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrID
        if (!$this->isAddOrEdit() && $this->DrID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrID->AdvancedSearch->SearchValue != "" || $this->DrID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrDepartment
        if (!$this->isAddOrEdit() && $this->DrDepartment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrDepartment->AdvancedSearch->SearchValue != "" || $this->DrDepartment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Doctor
        if (!$this->isAddOrEdit() && $this->Doctor->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Doctor->AdvancedSearch->SearchValue != "" || $this->Doctor->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // femalepic
        if (!$this->isAddOrEdit() && $this->femalepic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->femalepic->AdvancedSearch->SearchValue != "" || $this->femalepic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Fgender
        if (!$this->isAddOrEdit() && $this->Fgender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Fgender->AdvancedSearch->SearchValue != "" || $this->Fgender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->Male->setDbValue($row['Male']);
        $this->Female->setDbValue($row['Female']);
        if (array_key_exists('EV__Female', $row)) {
            $this->Female->VirtualValue = $row['EV__Female']; // Set up virtual field value
        } else {
            $this->Female->VirtualValue = ""; // Clear value
        }
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->malepropic->Upload->DbValue = $row['malepropic'];
        $this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
        $this->femalepropic->Upload->DbValue = $row['femalepropic'];
        $this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        if (array_key_exists('EV__ReferedBy', $row)) {
            $this->ReferedBy->VirtualValue = $row['EV__ReferedBy']; // Set up virtual field value
        } else {
            $this->ReferedBy->VirtualValue = ""; // Clear value
        }
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->WifeEmail->setDbValue($row['WifeEmail']);
        $this->HusbandEmail->setDbValue($row['HusbandEmail']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->femalepic->setDbValue($row['femalepic']);
        $this->Fgender->setDbValue($row['Fgender']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Male'] = null;
        $row['Female'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['malepropic'] = null;
        $row['femalepropic'] = null;
        $row['HusbandEducation'] = null;
        $row['WifeEducation'] = null;
        $row['HusbandWorkHours'] = null;
        $row['WifeWorkHours'] = null;
        $row['PatientLanguage'] = null;
        $row['ReferedBy'] = null;
        $row['ReferPhNo'] = null;
        $row['WifeCell'] = null;
        $row['HusbandCell'] = null;
        $row['WifeEmail'] = null;
        $row['HusbandEmail'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['CoupleID'] = null;
        $row['HospID'] = null;
        $row['PatientName'] = null;
        $row['PatientID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerID'] = null;
        $row['DrID'] = null;
        $row['DrDepartment'] = null;
        $row['Doctor'] = null;
        $row['femalepic'] = null;
        $row['Fgender'] = null;
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

        // Male

        // Female

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // WifeCell

        // HusbandCell

        // WifeEmail

        // HusbandEmail

        // ARTCYCLE

        // RESULT

        // CoupleID

        // HospID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // DrID

        // DrDepartment

        // Doctor

        // femalepic

        // Fgender
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Male
            $this->Male->ViewValue = $this->Male->CurrentValue;
            $this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
            $this->Male->ViewCustomAttributes = "";

            // Female
            if ($this->Female->VirtualValue != "") {
                $this->Female->ViewValue = $this->Female->VirtualValue;
            } else {
                $curVal = trim(strval($this->Female->CurrentValue));
                if ($curVal != "") {
                    $this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
                    if ($this->Female->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Female->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Female->Lookup->renderViewRow($rswrk[0]);
                            $this->Female->ViewValue = $this->Female->displayValue($arwrk);
                        } else {
                            $this->Female->ViewValue = $this->Female->CurrentValue;
                        }
                    }
                } else {
                    $this->Female->ViewValue = null;
                }
            }
            $this->Female->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // malepropic
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->ImageWidth = 80;
                $this->malepropic->ImageHeight = 80;
                $this->malepropic->ImageAlt = $this->malepropic->alt();
                $this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
            } else {
                $this->malepropic->ViewValue = "";
            }
            $this->malepropic->ViewCustomAttributes = "";

            // femalepropic
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->ImageWidth = 80;
                $this->femalepropic->ImageHeight = 80;
                $this->femalepropic->ImageAlt = $this->femalepropic->alt();
                $this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
            } else {
                $this->femalepropic->ViewValue = "";
            }
            $this->femalepropic->ViewCustomAttributes = "";

            // HusbandEducation
            $this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
            $this->HusbandEducation->ViewCustomAttributes = "";

            // WifeEducation
            $this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
            $this->WifeEducation->ViewCustomAttributes = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
            $this->HusbandWorkHours->ViewCustomAttributes = "";

            // WifeWorkHours
            $this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
            $this->WifeWorkHours->ViewCustomAttributes = "";

            // PatientLanguage
            $this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
            $this->PatientLanguage->ViewCustomAttributes = "";

            // ReferedBy
            if ($this->ReferedBy->VirtualValue != "") {
                $this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedBy->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
                    if ($this->ReferedBy->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedBy->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
                        } else {
                            $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedBy->ViewValue = null;
                }
            }
            $this->ReferedBy->ViewCustomAttributes = "";

            // ReferPhNo
            $this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
            $this->ReferPhNo->ViewCustomAttributes = "";

            // WifeCell
            $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
            $this->WifeCell->ViewCustomAttributes = "";

            // HusbandCell
            $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
            $this->HusbandCell->ViewCustomAttributes = "";

            // WifeEmail
            $this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
            $this->WifeEmail->ViewCustomAttributes = "";

            // HusbandEmail
            $this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
            $this->HusbandEmail->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // DrID
            $curVal = trim(strval($this->DrID->CurrentValue));
            if ($curVal != "") {
                $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
                if ($this->DrID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                        $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                    } else {
                        $this->DrID->ViewValue = $this->DrID->CurrentValue;
                    }
                }
            } else {
                $this->DrID->ViewValue = null;
            }
            $this->DrID->ViewCustomAttributes = "";

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
            if (!$this->isExport()) {
                $this->id->ViewValue = $this->highlightValue($this->id);
            }

            // Male
            $this->Male->LinkCustomAttributes = "";
            $this->Male->HrefValue = "";
            $this->Male->TooltipValue = "";

            // Female
            $this->Female->LinkCustomAttributes = "";
            $this->Female->HrefValue = "";
            $this->Female->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // malepropic
            $this->malepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->htmlDecode($this->malepropic->Upload->DbValue)); // Add prefix/suffix
                $this->malepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
                }
            } else {
                $this->malepropic->HrefValue = "";
            }
            $this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
            $this->malepropic->TooltipValue = "";
            if ($this->malepropic->UseColorbox) {
                if (EmptyValue($this->malepropic->TooltipValue)) {
                    $this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->malepropic->LinkAttrs["data-rel"] = "view_donor_ivf_x" . $this->RowCount . "_malepropic";
                $this->malepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // femalepropic
            $this->femalepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->htmlDecode($this->femalepropic->Upload->DbValue)); // Add prefix/suffix
                $this->femalepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
                }
            } else {
                $this->femalepropic->HrefValue = "";
            }
            $this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
            $this->femalepropic->TooltipValue = "";
            if ($this->femalepropic->UseColorbox) {
                if (EmptyValue($this->femalepropic->TooltipValue)) {
                    $this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->femalepropic->LinkAttrs["data-rel"] = "view_donor_ivf_x" . $this->RowCount . "_femalepropic";
                $this->femalepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // HusbandEducation
            $this->HusbandEducation->LinkCustomAttributes = "";
            $this->HusbandEducation->HrefValue = "";
            $this->HusbandEducation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandEducation->ViewValue = $this->highlightValue($this->HusbandEducation);
            }

            // WifeEducation
            $this->WifeEducation->LinkCustomAttributes = "";
            $this->WifeEducation->HrefValue = "";
            $this->WifeEducation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeEducation->ViewValue = $this->highlightValue($this->WifeEducation);
            }

            // HusbandWorkHours
            $this->HusbandWorkHours->LinkCustomAttributes = "";
            $this->HusbandWorkHours->HrefValue = "";
            $this->HusbandWorkHours->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandWorkHours->ViewValue = $this->highlightValue($this->HusbandWorkHours);
            }

            // WifeWorkHours
            $this->WifeWorkHours->LinkCustomAttributes = "";
            $this->WifeWorkHours->HrefValue = "";
            $this->WifeWorkHours->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeWorkHours->ViewValue = $this->highlightValue($this->WifeWorkHours);
            }

            // PatientLanguage
            $this->PatientLanguage->LinkCustomAttributes = "";
            $this->PatientLanguage->HrefValue = "";
            $this->PatientLanguage->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientLanguage->ViewValue = $this->highlightValue($this->PatientLanguage);
            }

            // ReferedBy
            $this->ReferedBy->LinkCustomAttributes = "";
            $this->ReferedBy->HrefValue = "";
            $this->ReferedBy->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferedBy->ViewValue = $this->highlightValue($this->ReferedBy);
            }

            // ReferPhNo
            $this->ReferPhNo->LinkCustomAttributes = "";
            $this->ReferPhNo->HrefValue = "";
            $this->ReferPhNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferPhNo->ViewValue = $this->highlightValue($this->ReferPhNo);
            }

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";
            $this->WifeCell->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeCell->ViewValue = $this->highlightValue($this->WifeCell);
            }

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";
            $this->HusbandCell->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandCell->ViewValue = $this->highlightValue($this->HusbandCell);
            }

            // WifeEmail
            $this->WifeEmail->LinkCustomAttributes = "";
            $this->WifeEmail->HrefValue = "";
            $this->WifeEmail->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeEmail->ViewValue = $this->highlightValue($this->WifeEmail);
            }

            // HusbandEmail
            $this->HusbandEmail->LinkCustomAttributes = "";
            $this->HusbandEmail->HrefValue = "";
            $this->HusbandEmail->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandEmail->ViewValue = $this->highlightValue($this->HusbandEmail);
            }

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ARTCYCLE->ViewValue = $this->highlightValue($this->ARTCYCLE);
            }

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->RESULT->ViewValue = $this->highlightValue($this->RESULT);
            }

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);
            }

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientName->ViewValue = $this->highlightValue($this->PatientName);
            }

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientID->ViewValue = $this->highlightValue($this->PatientID);
            }

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerName->ViewValue = $this->highlightValue($this->PartnerName);
            }

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerID->ViewValue = $this->highlightValue($this->PartnerID);
            }

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";
            $this->DrDepartment->TooltipValue = "";
            if (!$this->isExport()) {
                $this->DrDepartment->ViewValue = $this->highlightValue($this->DrDepartment);
            }

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Doctor->ViewValue = $this->highlightValue($this->Doctor);
            }
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
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
        $this->Male->AdvancedSearch->load();
        $this->Female->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->malepropic->AdvancedSearch->load();
        $this->femalepropic->AdvancedSearch->load();
        $this->HusbandEducation->AdvancedSearch->load();
        $this->WifeEducation->AdvancedSearch->load();
        $this->HusbandWorkHours->AdvancedSearch->load();
        $this->WifeWorkHours->AdvancedSearch->load();
        $this->PatientLanguage->AdvancedSearch->load();
        $this->ReferedBy->AdvancedSearch->load();
        $this->ReferPhNo->AdvancedSearch->load();
        $this->WifeCell->AdvancedSearch->load();
        $this->HusbandCell->AdvancedSearch->load();
        $this->WifeEmail->AdvancedSearch->load();
        $this->HusbandEmail->AdvancedSearch->load();
        $this->ARTCYCLE->AdvancedSearch->load();
        $this->RESULT->AdvancedSearch->load();
        $this->CoupleID->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->DrID->AdvancedSearch->load();
        $this->DrDepartment->AdvancedSearch->load();
        $this->Doctor->AdvancedSearch->load();
        $this->femalepic->AdvancedSearch->load();
        $this->Fgender->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_donor_ivflist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_donor_ivflist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_donor_ivflist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_donor_ivf" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_donor_ivf\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_donor_ivflist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word", $this->ExportWordCustom);
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
        $item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
        $item->Visible = false;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_donor_ivflistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"ViewDonorIvfSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_donor_ivf\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'ViewDonorIvfSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_donor_ivflistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_Female":
                    break;
                case "x_status":
                    break;
                case "x_ReferedBy":
                    break;
                case "x_DrID":
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
