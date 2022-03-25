<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class CrmContactdetailsList extends CrmContactdetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'crm_contactdetails';

    // Page object name
    public $PageObjName = "CrmContactdetailsList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fcrm_contactdetailslist";
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

        // Table object (crm_contactdetails)
        if (!isset($GLOBALS["crm_contactdetails"]) || get_class($GLOBALS["crm_contactdetails"]) == PROJECT_NAMESPACE . "crm_contactdetails") {
            $GLOBALS["crm_contactdetails"] = &$this;
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
        $this->AddUrl = "CrmContactdetailsAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "CrmContactdetailsDelete";
        $this->MultiUpdateUrl = "CrmContactdetailsUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'crm_contactdetails');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fcrm_contactdetailslistsrch";

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
                $doc = new $class(Container("crm_contactdetails"));
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
            $key .= @$ar['contactid'];
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
        $this->contactid->setVisibility();
        $this->contact_no->setVisibility();
        $this->parentid->setVisibility();
        $this->salutation->setVisibility();
        $this->firstname->setVisibility();
        $this->lastname->setVisibility();
        $this->_email->setVisibility();
        $this->phone->setVisibility();
        $this->mobile->setVisibility();
        $this->reportsto->setVisibility();
        $this->training->setVisibility();
        $this->usertype->setVisibility();
        $this->contacttype->setVisibility();
        $this->otheremail->setVisibility();
        $this->donotcall->setVisibility();
        $this->emailoptout->setVisibility();
        $this->imagename->Visible = false;
        $this->isconvertedfromlead->setVisibility();
        $this->verification->Visible = false;
        $this->secondary_email->setVisibility();
        $this->notifilanguage->setVisibility();
        $this->contactstatus->setVisibility();
        $this->dav_status->setVisibility();
        $this->jobtitle->setVisibility();
        $this->decision_maker->setVisibility();
        $this->sum_time->setVisibility();
        $this->phone_extra->setVisibility();
        $this->mobile_extra->setVisibility();
        $this->approvals->Visible = false;
        $this->gender->setVisibility();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fcrm_contactdetailslistsrch");
        }
        $filterList = Concat($filterList, $this->contactid->AdvancedSearch->toJson(), ","); // Field contactid
        $filterList = Concat($filterList, $this->contact_no->AdvancedSearch->toJson(), ","); // Field contact_no
        $filterList = Concat($filterList, $this->parentid->AdvancedSearch->toJson(), ","); // Field parentid
        $filterList = Concat($filterList, $this->salutation->AdvancedSearch->toJson(), ","); // Field salutation
        $filterList = Concat($filterList, $this->firstname->AdvancedSearch->toJson(), ","); // Field firstname
        $filterList = Concat($filterList, $this->lastname->AdvancedSearch->toJson(), ","); // Field lastname
        $filterList = Concat($filterList, $this->_email->AdvancedSearch->toJson(), ","); // Field email
        $filterList = Concat($filterList, $this->phone->AdvancedSearch->toJson(), ","); // Field phone
        $filterList = Concat($filterList, $this->mobile->AdvancedSearch->toJson(), ","); // Field mobile
        $filterList = Concat($filterList, $this->reportsto->AdvancedSearch->toJson(), ","); // Field reportsto
        $filterList = Concat($filterList, $this->training->AdvancedSearch->toJson(), ","); // Field training
        $filterList = Concat($filterList, $this->usertype->AdvancedSearch->toJson(), ","); // Field usertype
        $filterList = Concat($filterList, $this->contacttype->AdvancedSearch->toJson(), ","); // Field contacttype
        $filterList = Concat($filterList, $this->otheremail->AdvancedSearch->toJson(), ","); // Field otheremail
        $filterList = Concat($filterList, $this->donotcall->AdvancedSearch->toJson(), ","); // Field donotcall
        $filterList = Concat($filterList, $this->emailoptout->AdvancedSearch->toJson(), ","); // Field emailoptout
        $filterList = Concat($filterList, $this->imagename->AdvancedSearch->toJson(), ","); // Field imagename
        $filterList = Concat($filterList, $this->isconvertedfromlead->AdvancedSearch->toJson(), ","); // Field isconvertedfromlead
        $filterList = Concat($filterList, $this->verification->AdvancedSearch->toJson(), ","); // Field verification
        $filterList = Concat($filterList, $this->secondary_email->AdvancedSearch->toJson(), ","); // Field secondary_email
        $filterList = Concat($filterList, $this->notifilanguage->AdvancedSearch->toJson(), ","); // Field notifilanguage
        $filterList = Concat($filterList, $this->contactstatus->AdvancedSearch->toJson(), ","); // Field contactstatus
        $filterList = Concat($filterList, $this->dav_status->AdvancedSearch->toJson(), ","); // Field dav_status
        $filterList = Concat($filterList, $this->jobtitle->AdvancedSearch->toJson(), ","); // Field jobtitle
        $filterList = Concat($filterList, $this->decision_maker->AdvancedSearch->toJson(), ","); // Field decision_maker
        $filterList = Concat($filterList, $this->sum_time->AdvancedSearch->toJson(), ","); // Field sum_time
        $filterList = Concat($filterList, $this->phone_extra->AdvancedSearch->toJson(), ","); // Field phone_extra
        $filterList = Concat($filterList, $this->mobile_extra->AdvancedSearch->toJson(), ","); // Field mobile_extra
        $filterList = Concat($filterList, $this->approvals->AdvancedSearch->toJson(), ","); // Field approvals
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fcrm_contactdetailslistsrch", $filters);
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

        // Field contactid
        $this->contactid->AdvancedSearch->SearchValue = @$filter["x_contactid"];
        $this->contactid->AdvancedSearch->SearchOperator = @$filter["z_contactid"];
        $this->contactid->AdvancedSearch->SearchCondition = @$filter["v_contactid"];
        $this->contactid->AdvancedSearch->SearchValue2 = @$filter["y_contactid"];
        $this->contactid->AdvancedSearch->SearchOperator2 = @$filter["w_contactid"];
        $this->contactid->AdvancedSearch->save();

        // Field contact_no
        $this->contact_no->AdvancedSearch->SearchValue = @$filter["x_contact_no"];
        $this->contact_no->AdvancedSearch->SearchOperator = @$filter["z_contact_no"];
        $this->contact_no->AdvancedSearch->SearchCondition = @$filter["v_contact_no"];
        $this->contact_no->AdvancedSearch->SearchValue2 = @$filter["y_contact_no"];
        $this->contact_no->AdvancedSearch->SearchOperator2 = @$filter["w_contact_no"];
        $this->contact_no->AdvancedSearch->save();

        // Field parentid
        $this->parentid->AdvancedSearch->SearchValue = @$filter["x_parentid"];
        $this->parentid->AdvancedSearch->SearchOperator = @$filter["z_parentid"];
        $this->parentid->AdvancedSearch->SearchCondition = @$filter["v_parentid"];
        $this->parentid->AdvancedSearch->SearchValue2 = @$filter["y_parentid"];
        $this->parentid->AdvancedSearch->SearchOperator2 = @$filter["w_parentid"];
        $this->parentid->AdvancedSearch->save();

        // Field salutation
        $this->salutation->AdvancedSearch->SearchValue = @$filter["x_salutation"];
        $this->salutation->AdvancedSearch->SearchOperator = @$filter["z_salutation"];
        $this->salutation->AdvancedSearch->SearchCondition = @$filter["v_salutation"];
        $this->salutation->AdvancedSearch->SearchValue2 = @$filter["y_salutation"];
        $this->salutation->AdvancedSearch->SearchOperator2 = @$filter["w_salutation"];
        $this->salutation->AdvancedSearch->save();

        // Field firstname
        $this->firstname->AdvancedSearch->SearchValue = @$filter["x_firstname"];
        $this->firstname->AdvancedSearch->SearchOperator = @$filter["z_firstname"];
        $this->firstname->AdvancedSearch->SearchCondition = @$filter["v_firstname"];
        $this->firstname->AdvancedSearch->SearchValue2 = @$filter["y_firstname"];
        $this->firstname->AdvancedSearch->SearchOperator2 = @$filter["w_firstname"];
        $this->firstname->AdvancedSearch->save();

        // Field lastname
        $this->lastname->AdvancedSearch->SearchValue = @$filter["x_lastname"];
        $this->lastname->AdvancedSearch->SearchOperator = @$filter["z_lastname"];
        $this->lastname->AdvancedSearch->SearchCondition = @$filter["v_lastname"];
        $this->lastname->AdvancedSearch->SearchValue2 = @$filter["y_lastname"];
        $this->lastname->AdvancedSearch->SearchOperator2 = @$filter["w_lastname"];
        $this->lastname->AdvancedSearch->save();

        // Field email
        $this->_email->AdvancedSearch->SearchValue = @$filter["x__email"];
        $this->_email->AdvancedSearch->SearchOperator = @$filter["z__email"];
        $this->_email->AdvancedSearch->SearchCondition = @$filter["v__email"];
        $this->_email->AdvancedSearch->SearchValue2 = @$filter["y__email"];
        $this->_email->AdvancedSearch->SearchOperator2 = @$filter["w__email"];
        $this->_email->AdvancedSearch->save();

        // Field phone
        $this->phone->AdvancedSearch->SearchValue = @$filter["x_phone"];
        $this->phone->AdvancedSearch->SearchOperator = @$filter["z_phone"];
        $this->phone->AdvancedSearch->SearchCondition = @$filter["v_phone"];
        $this->phone->AdvancedSearch->SearchValue2 = @$filter["y_phone"];
        $this->phone->AdvancedSearch->SearchOperator2 = @$filter["w_phone"];
        $this->phone->AdvancedSearch->save();

        // Field mobile
        $this->mobile->AdvancedSearch->SearchValue = @$filter["x_mobile"];
        $this->mobile->AdvancedSearch->SearchOperator = @$filter["z_mobile"];
        $this->mobile->AdvancedSearch->SearchCondition = @$filter["v_mobile"];
        $this->mobile->AdvancedSearch->SearchValue2 = @$filter["y_mobile"];
        $this->mobile->AdvancedSearch->SearchOperator2 = @$filter["w_mobile"];
        $this->mobile->AdvancedSearch->save();

        // Field reportsto
        $this->reportsto->AdvancedSearch->SearchValue = @$filter["x_reportsto"];
        $this->reportsto->AdvancedSearch->SearchOperator = @$filter["z_reportsto"];
        $this->reportsto->AdvancedSearch->SearchCondition = @$filter["v_reportsto"];
        $this->reportsto->AdvancedSearch->SearchValue2 = @$filter["y_reportsto"];
        $this->reportsto->AdvancedSearch->SearchOperator2 = @$filter["w_reportsto"];
        $this->reportsto->AdvancedSearch->save();

        // Field training
        $this->training->AdvancedSearch->SearchValue = @$filter["x_training"];
        $this->training->AdvancedSearch->SearchOperator = @$filter["z_training"];
        $this->training->AdvancedSearch->SearchCondition = @$filter["v_training"];
        $this->training->AdvancedSearch->SearchValue2 = @$filter["y_training"];
        $this->training->AdvancedSearch->SearchOperator2 = @$filter["w_training"];
        $this->training->AdvancedSearch->save();

        // Field usertype
        $this->usertype->AdvancedSearch->SearchValue = @$filter["x_usertype"];
        $this->usertype->AdvancedSearch->SearchOperator = @$filter["z_usertype"];
        $this->usertype->AdvancedSearch->SearchCondition = @$filter["v_usertype"];
        $this->usertype->AdvancedSearch->SearchValue2 = @$filter["y_usertype"];
        $this->usertype->AdvancedSearch->SearchOperator2 = @$filter["w_usertype"];
        $this->usertype->AdvancedSearch->save();

        // Field contacttype
        $this->contacttype->AdvancedSearch->SearchValue = @$filter["x_contacttype"];
        $this->contacttype->AdvancedSearch->SearchOperator = @$filter["z_contacttype"];
        $this->contacttype->AdvancedSearch->SearchCondition = @$filter["v_contacttype"];
        $this->contacttype->AdvancedSearch->SearchValue2 = @$filter["y_contacttype"];
        $this->contacttype->AdvancedSearch->SearchOperator2 = @$filter["w_contacttype"];
        $this->contacttype->AdvancedSearch->save();

        // Field otheremail
        $this->otheremail->AdvancedSearch->SearchValue = @$filter["x_otheremail"];
        $this->otheremail->AdvancedSearch->SearchOperator = @$filter["z_otheremail"];
        $this->otheremail->AdvancedSearch->SearchCondition = @$filter["v_otheremail"];
        $this->otheremail->AdvancedSearch->SearchValue2 = @$filter["y_otheremail"];
        $this->otheremail->AdvancedSearch->SearchOperator2 = @$filter["w_otheremail"];
        $this->otheremail->AdvancedSearch->save();

        // Field donotcall
        $this->donotcall->AdvancedSearch->SearchValue = @$filter["x_donotcall"];
        $this->donotcall->AdvancedSearch->SearchOperator = @$filter["z_donotcall"];
        $this->donotcall->AdvancedSearch->SearchCondition = @$filter["v_donotcall"];
        $this->donotcall->AdvancedSearch->SearchValue2 = @$filter["y_donotcall"];
        $this->donotcall->AdvancedSearch->SearchOperator2 = @$filter["w_donotcall"];
        $this->donotcall->AdvancedSearch->save();

        // Field emailoptout
        $this->emailoptout->AdvancedSearch->SearchValue = @$filter["x_emailoptout"];
        $this->emailoptout->AdvancedSearch->SearchOperator = @$filter["z_emailoptout"];
        $this->emailoptout->AdvancedSearch->SearchCondition = @$filter["v_emailoptout"];
        $this->emailoptout->AdvancedSearch->SearchValue2 = @$filter["y_emailoptout"];
        $this->emailoptout->AdvancedSearch->SearchOperator2 = @$filter["w_emailoptout"];
        $this->emailoptout->AdvancedSearch->save();

        // Field imagename
        $this->imagename->AdvancedSearch->SearchValue = @$filter["x_imagename"];
        $this->imagename->AdvancedSearch->SearchOperator = @$filter["z_imagename"];
        $this->imagename->AdvancedSearch->SearchCondition = @$filter["v_imagename"];
        $this->imagename->AdvancedSearch->SearchValue2 = @$filter["y_imagename"];
        $this->imagename->AdvancedSearch->SearchOperator2 = @$filter["w_imagename"];
        $this->imagename->AdvancedSearch->save();

        // Field isconvertedfromlead
        $this->isconvertedfromlead->AdvancedSearch->SearchValue = @$filter["x_isconvertedfromlead"];
        $this->isconvertedfromlead->AdvancedSearch->SearchOperator = @$filter["z_isconvertedfromlead"];
        $this->isconvertedfromlead->AdvancedSearch->SearchCondition = @$filter["v_isconvertedfromlead"];
        $this->isconvertedfromlead->AdvancedSearch->SearchValue2 = @$filter["y_isconvertedfromlead"];
        $this->isconvertedfromlead->AdvancedSearch->SearchOperator2 = @$filter["w_isconvertedfromlead"];
        $this->isconvertedfromlead->AdvancedSearch->save();

        // Field verification
        $this->verification->AdvancedSearch->SearchValue = @$filter["x_verification"];
        $this->verification->AdvancedSearch->SearchOperator = @$filter["z_verification"];
        $this->verification->AdvancedSearch->SearchCondition = @$filter["v_verification"];
        $this->verification->AdvancedSearch->SearchValue2 = @$filter["y_verification"];
        $this->verification->AdvancedSearch->SearchOperator2 = @$filter["w_verification"];
        $this->verification->AdvancedSearch->save();

        // Field secondary_email
        $this->secondary_email->AdvancedSearch->SearchValue = @$filter["x_secondary_email"];
        $this->secondary_email->AdvancedSearch->SearchOperator = @$filter["z_secondary_email"];
        $this->secondary_email->AdvancedSearch->SearchCondition = @$filter["v_secondary_email"];
        $this->secondary_email->AdvancedSearch->SearchValue2 = @$filter["y_secondary_email"];
        $this->secondary_email->AdvancedSearch->SearchOperator2 = @$filter["w_secondary_email"];
        $this->secondary_email->AdvancedSearch->save();

        // Field notifilanguage
        $this->notifilanguage->AdvancedSearch->SearchValue = @$filter["x_notifilanguage"];
        $this->notifilanguage->AdvancedSearch->SearchOperator = @$filter["z_notifilanguage"];
        $this->notifilanguage->AdvancedSearch->SearchCondition = @$filter["v_notifilanguage"];
        $this->notifilanguage->AdvancedSearch->SearchValue2 = @$filter["y_notifilanguage"];
        $this->notifilanguage->AdvancedSearch->SearchOperator2 = @$filter["w_notifilanguage"];
        $this->notifilanguage->AdvancedSearch->save();

        // Field contactstatus
        $this->contactstatus->AdvancedSearch->SearchValue = @$filter["x_contactstatus"];
        $this->contactstatus->AdvancedSearch->SearchOperator = @$filter["z_contactstatus"];
        $this->contactstatus->AdvancedSearch->SearchCondition = @$filter["v_contactstatus"];
        $this->contactstatus->AdvancedSearch->SearchValue2 = @$filter["y_contactstatus"];
        $this->contactstatus->AdvancedSearch->SearchOperator2 = @$filter["w_contactstatus"];
        $this->contactstatus->AdvancedSearch->save();

        // Field dav_status
        $this->dav_status->AdvancedSearch->SearchValue = @$filter["x_dav_status"];
        $this->dav_status->AdvancedSearch->SearchOperator = @$filter["z_dav_status"];
        $this->dav_status->AdvancedSearch->SearchCondition = @$filter["v_dav_status"];
        $this->dav_status->AdvancedSearch->SearchValue2 = @$filter["y_dav_status"];
        $this->dav_status->AdvancedSearch->SearchOperator2 = @$filter["w_dav_status"];
        $this->dav_status->AdvancedSearch->save();

        // Field jobtitle
        $this->jobtitle->AdvancedSearch->SearchValue = @$filter["x_jobtitle"];
        $this->jobtitle->AdvancedSearch->SearchOperator = @$filter["z_jobtitle"];
        $this->jobtitle->AdvancedSearch->SearchCondition = @$filter["v_jobtitle"];
        $this->jobtitle->AdvancedSearch->SearchValue2 = @$filter["y_jobtitle"];
        $this->jobtitle->AdvancedSearch->SearchOperator2 = @$filter["w_jobtitle"];
        $this->jobtitle->AdvancedSearch->save();

        // Field decision_maker
        $this->decision_maker->AdvancedSearch->SearchValue = @$filter["x_decision_maker"];
        $this->decision_maker->AdvancedSearch->SearchOperator = @$filter["z_decision_maker"];
        $this->decision_maker->AdvancedSearch->SearchCondition = @$filter["v_decision_maker"];
        $this->decision_maker->AdvancedSearch->SearchValue2 = @$filter["y_decision_maker"];
        $this->decision_maker->AdvancedSearch->SearchOperator2 = @$filter["w_decision_maker"];
        $this->decision_maker->AdvancedSearch->save();

        // Field sum_time
        $this->sum_time->AdvancedSearch->SearchValue = @$filter["x_sum_time"];
        $this->sum_time->AdvancedSearch->SearchOperator = @$filter["z_sum_time"];
        $this->sum_time->AdvancedSearch->SearchCondition = @$filter["v_sum_time"];
        $this->sum_time->AdvancedSearch->SearchValue2 = @$filter["y_sum_time"];
        $this->sum_time->AdvancedSearch->SearchOperator2 = @$filter["w_sum_time"];
        $this->sum_time->AdvancedSearch->save();

        // Field phone_extra
        $this->phone_extra->AdvancedSearch->SearchValue = @$filter["x_phone_extra"];
        $this->phone_extra->AdvancedSearch->SearchOperator = @$filter["z_phone_extra"];
        $this->phone_extra->AdvancedSearch->SearchCondition = @$filter["v_phone_extra"];
        $this->phone_extra->AdvancedSearch->SearchValue2 = @$filter["y_phone_extra"];
        $this->phone_extra->AdvancedSearch->SearchOperator2 = @$filter["w_phone_extra"];
        $this->phone_extra->AdvancedSearch->save();

        // Field mobile_extra
        $this->mobile_extra->AdvancedSearch->SearchValue = @$filter["x_mobile_extra"];
        $this->mobile_extra->AdvancedSearch->SearchOperator = @$filter["z_mobile_extra"];
        $this->mobile_extra->AdvancedSearch->SearchCondition = @$filter["v_mobile_extra"];
        $this->mobile_extra->AdvancedSearch->SearchValue2 = @$filter["y_mobile_extra"];
        $this->mobile_extra->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_extra"];
        $this->mobile_extra->AdvancedSearch->save();

        // Field approvals
        $this->approvals->AdvancedSearch->SearchValue = @$filter["x_approvals"];
        $this->approvals->AdvancedSearch->SearchOperator = @$filter["z_approvals"];
        $this->approvals->AdvancedSearch->SearchCondition = @$filter["v_approvals"];
        $this->approvals->AdvancedSearch->SearchValue2 = @$filter["y_approvals"];
        $this->approvals->AdvancedSearch->SearchOperator2 = @$filter["w_approvals"];
        $this->approvals->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->contact_no, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->salutation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->firstname, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->lastname, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->training, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->usertype, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->contacttype, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->otheremail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->imagename, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->verification, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->secondary_email, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->notifilanguage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->contactstatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->jobtitle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->phone_extra, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile_extra, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->approvals, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
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
            $this->updateSort($this->contactid); // contactid
            $this->updateSort($this->contact_no); // contact_no
            $this->updateSort($this->parentid); // parentid
            $this->updateSort($this->salutation); // salutation
            $this->updateSort($this->firstname); // firstname
            $this->updateSort($this->lastname); // lastname
            $this->updateSort($this->_email); // email
            $this->updateSort($this->phone); // phone
            $this->updateSort($this->mobile); // mobile
            $this->updateSort($this->reportsto); // reportsto
            $this->updateSort($this->training); // training
            $this->updateSort($this->usertype); // usertype
            $this->updateSort($this->contacttype); // contacttype
            $this->updateSort($this->otheremail); // otheremail
            $this->updateSort($this->donotcall); // donotcall
            $this->updateSort($this->emailoptout); // emailoptout
            $this->updateSort($this->isconvertedfromlead); // isconvertedfromlead
            $this->updateSort($this->secondary_email); // secondary_email
            $this->updateSort($this->notifilanguage); // notifilanguage
            $this->updateSort($this->contactstatus); // contactstatus
            $this->updateSort($this->dav_status); // dav_status
            $this->updateSort($this->jobtitle); // jobtitle
            $this->updateSort($this->decision_maker); // decision_maker
            $this->updateSort($this->sum_time); // sum_time
            $this->updateSort($this->phone_extra); // phone_extra
            $this->updateSort($this->mobile_extra); // mobile_extra
            $this->updateSort($this->gender); // gender
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
                $this->contactid->setSort("");
                $this->contact_no->setSort("");
                $this->parentid->setSort("");
                $this->salutation->setSort("");
                $this->firstname->setSort("");
                $this->lastname->setSort("");
                $this->_email->setSort("");
                $this->phone->setSort("");
                $this->mobile->setSort("");
                $this->reportsto->setSort("");
                $this->training->setSort("");
                $this->usertype->setSort("");
                $this->contacttype->setSort("");
                $this->otheremail->setSort("");
                $this->donotcall->setSort("");
                $this->emailoptout->setSort("");
                $this->imagename->setSort("");
                $this->isconvertedfromlead->setSort("");
                $this->verification->setSort("");
                $this->secondary_email->setSort("");
                $this->notifilanguage->setSort("");
                $this->contactstatus->setSort("");
                $this->dav_status->setSort("");
                $this->jobtitle->setSort("");
                $this->decision_maker->setSort("");
                $this->sum_time->setSort("");
                $this->phone_extra->setSort("");
                $this->mobile_extra->setSort("");
                $this->approvals->setSort("");
                $this->gender->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->contactid->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fcrm_contactdetailslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fcrm_contactdetailslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fcrm_contactdetailslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->contactid->setDbValue($row['contactid']);
        $this->contact_no->setDbValue($row['contact_no']);
        $this->parentid->setDbValue($row['parentid']);
        $this->salutation->setDbValue($row['salutation']);
        $this->firstname->setDbValue($row['firstname']);
        $this->lastname->setDbValue($row['lastname']);
        $this->_email->setDbValue($row['email']);
        $this->phone->setDbValue($row['phone']);
        $this->mobile->setDbValue($row['mobile']);
        $this->reportsto->setDbValue($row['reportsto']);
        $this->training->setDbValue($row['training']);
        $this->usertype->setDbValue($row['usertype']);
        $this->contacttype->setDbValue($row['contacttype']);
        $this->otheremail->setDbValue($row['otheremail']);
        $this->donotcall->setDbValue($row['donotcall']);
        $this->emailoptout->setDbValue($row['emailoptout']);
        $this->imagename->setDbValue($row['imagename']);
        $this->isconvertedfromlead->setDbValue($row['isconvertedfromlead']);
        $this->verification->setDbValue($row['verification']);
        $this->secondary_email->setDbValue($row['secondary_email']);
        $this->notifilanguage->setDbValue($row['notifilanguage']);
        $this->contactstatus->setDbValue($row['contactstatus']);
        $this->dav_status->setDbValue($row['dav_status']);
        $this->jobtitle->setDbValue($row['jobtitle']);
        $this->decision_maker->setDbValue($row['decision_maker']);
        $this->sum_time->setDbValue($row['sum_time']);
        $this->phone_extra->setDbValue($row['phone_extra']);
        $this->mobile_extra->setDbValue($row['mobile_extra']);
        $this->approvals->setDbValue($row['approvals']);
        $this->gender->setDbValue($row['gender']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['contactid'] = null;
        $row['contact_no'] = null;
        $row['parentid'] = null;
        $row['salutation'] = null;
        $row['firstname'] = null;
        $row['lastname'] = null;
        $row['email'] = null;
        $row['phone'] = null;
        $row['mobile'] = null;
        $row['reportsto'] = null;
        $row['training'] = null;
        $row['usertype'] = null;
        $row['contacttype'] = null;
        $row['otheremail'] = null;
        $row['donotcall'] = null;
        $row['emailoptout'] = null;
        $row['imagename'] = null;
        $row['isconvertedfromlead'] = null;
        $row['verification'] = null;
        $row['secondary_email'] = null;
        $row['notifilanguage'] = null;
        $row['contactstatus'] = null;
        $row['dav_status'] = null;
        $row['jobtitle'] = null;
        $row['decision_maker'] = null;
        $row['sum_time'] = null;
        $row['phone_extra'] = null;
        $row['mobile_extra'] = null;
        $row['approvals'] = null;
        $row['gender'] = null;
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
        if ($this->sum_time->FormValue == $this->sum_time->CurrentValue && is_numeric(ConvertToFloatString($this->sum_time->CurrentValue))) {
            $this->sum_time->CurrentValue = ConvertToFloatString($this->sum_time->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // contactid

        // contact_no

        // parentid

        // salutation

        // firstname

        // lastname

        // email

        // phone

        // mobile

        // reportsto

        // training

        // usertype

        // contacttype

        // otheremail

        // donotcall

        // emailoptout

        // imagename

        // isconvertedfromlead

        // verification

        // secondary_email

        // notifilanguage

        // contactstatus

        // dav_status

        // jobtitle

        // decision_maker

        // sum_time

        // phone_extra

        // mobile_extra

        // approvals

        // gender
        if ($this->RowType == ROWTYPE_VIEW) {
            // contactid
            $this->contactid->ViewValue = $this->contactid->CurrentValue;
            $this->contactid->ViewValue = FormatNumber($this->contactid->ViewValue, 0, -2, -2, -2);
            $this->contactid->ViewCustomAttributes = "";

            // contact_no
            $this->contact_no->ViewValue = $this->contact_no->CurrentValue;
            $this->contact_no->ViewCustomAttributes = "";

            // parentid
            $this->parentid->ViewValue = $this->parentid->CurrentValue;
            $this->parentid->ViewValue = FormatNumber($this->parentid->ViewValue, 0, -2, -2, -2);
            $this->parentid->ViewCustomAttributes = "";

            // salutation
            $this->salutation->ViewValue = $this->salutation->CurrentValue;
            $this->salutation->ViewCustomAttributes = "";

            // firstname
            $this->firstname->ViewValue = $this->firstname->CurrentValue;
            $this->firstname->ViewCustomAttributes = "";

            // lastname
            $this->lastname->ViewValue = $this->lastname->CurrentValue;
            $this->lastname->ViewCustomAttributes = "";

            // email
            $this->_email->ViewValue = $this->_email->CurrentValue;
            $this->_email->ViewCustomAttributes = "";

            // phone
            $this->phone->ViewValue = $this->phone->CurrentValue;
            $this->phone->ViewCustomAttributes = "";

            // mobile
            $this->mobile->ViewValue = $this->mobile->CurrentValue;
            $this->mobile->ViewCustomAttributes = "";

            // reportsto
            $this->reportsto->ViewValue = $this->reportsto->CurrentValue;
            $this->reportsto->ViewValue = FormatNumber($this->reportsto->ViewValue, 0, -2, -2, -2);
            $this->reportsto->ViewCustomAttributes = "";

            // training
            $this->training->ViewValue = $this->training->CurrentValue;
            $this->training->ViewCustomAttributes = "";

            // usertype
            $this->usertype->ViewValue = $this->usertype->CurrentValue;
            $this->usertype->ViewCustomAttributes = "";

            // contacttype
            $this->contacttype->ViewValue = $this->contacttype->CurrentValue;
            $this->contacttype->ViewCustomAttributes = "";

            // otheremail
            $this->otheremail->ViewValue = $this->otheremail->CurrentValue;
            $this->otheremail->ViewCustomAttributes = "";

            // donotcall
            $this->donotcall->ViewValue = $this->donotcall->CurrentValue;
            $this->donotcall->ViewValue = FormatNumber($this->donotcall->ViewValue, 0, -2, -2, -2);
            $this->donotcall->ViewCustomAttributes = "";

            // emailoptout
            $this->emailoptout->ViewValue = $this->emailoptout->CurrentValue;
            $this->emailoptout->ViewValue = FormatNumber($this->emailoptout->ViewValue, 0, -2, -2, -2);
            $this->emailoptout->ViewCustomAttributes = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->ViewValue = $this->isconvertedfromlead->CurrentValue;
            $this->isconvertedfromlead->ViewValue = FormatNumber($this->isconvertedfromlead->ViewValue, 0, -2, -2, -2);
            $this->isconvertedfromlead->ViewCustomAttributes = "";

            // secondary_email
            $this->secondary_email->ViewValue = $this->secondary_email->CurrentValue;
            $this->secondary_email->ViewCustomAttributes = "";

            // notifilanguage
            $this->notifilanguage->ViewValue = $this->notifilanguage->CurrentValue;
            $this->notifilanguage->ViewCustomAttributes = "";

            // contactstatus
            $this->contactstatus->ViewValue = $this->contactstatus->CurrentValue;
            $this->contactstatus->ViewCustomAttributes = "";

            // dav_status
            $this->dav_status->ViewValue = $this->dav_status->CurrentValue;
            $this->dav_status->ViewValue = FormatNumber($this->dav_status->ViewValue, 0, -2, -2, -2);
            $this->dav_status->ViewCustomAttributes = "";

            // jobtitle
            $this->jobtitle->ViewValue = $this->jobtitle->CurrentValue;
            $this->jobtitle->ViewCustomAttributes = "";

            // decision_maker
            $this->decision_maker->ViewValue = $this->decision_maker->CurrentValue;
            $this->decision_maker->ViewValue = FormatNumber($this->decision_maker->ViewValue, 0, -2, -2, -2);
            $this->decision_maker->ViewCustomAttributes = "";

            // sum_time
            $this->sum_time->ViewValue = $this->sum_time->CurrentValue;
            $this->sum_time->ViewValue = FormatNumber($this->sum_time->ViewValue, 2, -2, -2, -2);
            $this->sum_time->ViewCustomAttributes = "";

            // phone_extra
            $this->phone_extra->ViewValue = $this->phone_extra->CurrentValue;
            $this->phone_extra->ViewCustomAttributes = "";

            // mobile_extra
            $this->mobile_extra->ViewValue = $this->mobile_extra->CurrentValue;
            $this->mobile_extra->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // contactid
            $this->contactid->LinkCustomAttributes = "";
            $this->contactid->HrefValue = "";
            $this->contactid->TooltipValue = "";

            // contact_no
            $this->contact_no->LinkCustomAttributes = "";
            $this->contact_no->HrefValue = "";
            $this->contact_no->TooltipValue = "";

            // parentid
            $this->parentid->LinkCustomAttributes = "";
            $this->parentid->HrefValue = "";
            $this->parentid->TooltipValue = "";

            // salutation
            $this->salutation->LinkCustomAttributes = "";
            $this->salutation->HrefValue = "";
            $this->salutation->TooltipValue = "";

            // firstname
            $this->firstname->LinkCustomAttributes = "";
            $this->firstname->HrefValue = "";
            $this->firstname->TooltipValue = "";

            // lastname
            $this->lastname->LinkCustomAttributes = "";
            $this->lastname->HrefValue = "";
            $this->lastname->TooltipValue = "";

            // email
            $this->_email->LinkCustomAttributes = "";
            $this->_email->HrefValue = "";
            $this->_email->TooltipValue = "";

            // phone
            $this->phone->LinkCustomAttributes = "";
            $this->phone->HrefValue = "";
            $this->phone->TooltipValue = "";

            // mobile
            $this->mobile->LinkCustomAttributes = "";
            $this->mobile->HrefValue = "";
            $this->mobile->TooltipValue = "";

            // reportsto
            $this->reportsto->LinkCustomAttributes = "";
            $this->reportsto->HrefValue = "";
            $this->reportsto->TooltipValue = "";

            // training
            $this->training->LinkCustomAttributes = "";
            $this->training->HrefValue = "";
            $this->training->TooltipValue = "";

            // usertype
            $this->usertype->LinkCustomAttributes = "";
            $this->usertype->HrefValue = "";
            $this->usertype->TooltipValue = "";

            // contacttype
            $this->contacttype->LinkCustomAttributes = "";
            $this->contacttype->HrefValue = "";
            $this->contacttype->TooltipValue = "";

            // otheremail
            $this->otheremail->LinkCustomAttributes = "";
            $this->otheremail->HrefValue = "";
            $this->otheremail->TooltipValue = "";

            // donotcall
            $this->donotcall->LinkCustomAttributes = "";
            $this->donotcall->HrefValue = "";
            $this->donotcall->TooltipValue = "";

            // emailoptout
            $this->emailoptout->LinkCustomAttributes = "";
            $this->emailoptout->HrefValue = "";
            $this->emailoptout->TooltipValue = "";

            // isconvertedfromlead
            $this->isconvertedfromlead->LinkCustomAttributes = "";
            $this->isconvertedfromlead->HrefValue = "";
            $this->isconvertedfromlead->TooltipValue = "";

            // secondary_email
            $this->secondary_email->LinkCustomAttributes = "";
            $this->secondary_email->HrefValue = "";
            $this->secondary_email->TooltipValue = "";

            // notifilanguage
            $this->notifilanguage->LinkCustomAttributes = "";
            $this->notifilanguage->HrefValue = "";
            $this->notifilanguage->TooltipValue = "";

            // contactstatus
            $this->contactstatus->LinkCustomAttributes = "";
            $this->contactstatus->HrefValue = "";
            $this->contactstatus->TooltipValue = "";

            // dav_status
            $this->dav_status->LinkCustomAttributes = "";
            $this->dav_status->HrefValue = "";
            $this->dav_status->TooltipValue = "";

            // jobtitle
            $this->jobtitle->LinkCustomAttributes = "";
            $this->jobtitle->HrefValue = "";
            $this->jobtitle->TooltipValue = "";

            // decision_maker
            $this->decision_maker->LinkCustomAttributes = "";
            $this->decision_maker->HrefValue = "";
            $this->decision_maker->TooltipValue = "";

            // sum_time
            $this->sum_time->LinkCustomAttributes = "";
            $this->sum_time->HrefValue = "";
            $this->sum_time->TooltipValue = "";

            // phone_extra
            $this->phone_extra->LinkCustomAttributes = "";
            $this->phone_extra->HrefValue = "";
            $this->phone_extra->TooltipValue = "";

            // mobile_extra
            $this->mobile_extra->LinkCustomAttributes = "";
            $this->mobile_extra->HrefValue = "";
            $this->mobile_extra->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fcrm_contactdetailslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_crm_contactdetails" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_crm_contactdetails\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fcrm_contactdetailslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fcrm_contactdetailslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
