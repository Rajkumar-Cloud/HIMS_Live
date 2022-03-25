<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOpdFollowUpList extends PatientOpdFollowUp
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_opd_follow_up';

    // Page object name
    public $PageObjName = "PatientOpdFollowUpList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_opd_follow_uplist";
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

        // Table object (patient_opd_follow_up)
        if (!isset($GLOBALS["patient_opd_follow_up"]) || get_class($GLOBALS["patient_opd_follow_up"]) == PROJECT_NAMESPACE . "patient_opd_follow_up") {
            $GLOBALS["patient_opd_follow_up"] = &$this;
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
        $this->AddUrl = "PatientOpdFollowUpAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientOpdFollowUpDelete";
        $this->MultiUpdateUrl = "PatientOpdFollowUpUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_opd_follow_up');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_opd_follow_uplistsrch";

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
                $doc = new $class(Container("patient_opd_follow_up"));
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
        if ($this->isAddOrEdit()) {
            $this->createdUserName->Visible = false;
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
        $this->id->setVisibility();
        $this->Reception->Visible = false;
        $this->PatID->setVisibility();
        $this->PatientId->Visible = false;
        $this->PatientName->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->Telephone->Visible = false;
        $this->mrnno->Visible = false;
        $this->Age->Visible = false;
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->procedurenotes->Visible = false;
        $this->NextReviewDate->setVisibility();
        $this->ICSIAdvised->setVisibility();
        $this->DeliveryRegistered->setVisibility();
        $this->EDD->setVisibility();
        $this->SerologyPositive->setVisibility();
        $this->Allergy->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->LMP->setVisibility();
        $this->Procedure->Visible = false;
        $this->ProcedureDateTime->setVisibility();
        $this->ICSIDate->setVisibility();
        $this->PatientSearch->Visible = false;
        $this->HospID->setVisibility();
        $this->createdUserName->setVisibility();
        $this->TemplateDrNotes->Visible = false;
        $this->reportheader->setVisibility();
        $this->Purpose->Visible = false;
        $this->DrName->setVisibility();
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
        $this->setupLookupOptions($this->Allergy);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->PatientSearch);
        $this->setupLookupOptions($this->TemplateDrNotes);
        $this->setupLookupOptions($this->DrName);

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_opd_follow_uplistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
        $filterList = Concat($filterList, $this->Telephone->AdvancedSearch->toJson(), ","); // Field Telephone
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->procedurenotes->AdvancedSearch->toJson(), ","); // Field procedurenotes
        $filterList = Concat($filterList, $this->NextReviewDate->AdvancedSearch->toJson(), ","); // Field NextReviewDate
        $filterList = Concat($filterList, $this->ICSIAdvised->AdvancedSearch->toJson(), ","); // Field ICSIAdvised
        $filterList = Concat($filterList, $this->DeliveryRegistered->AdvancedSearch->toJson(), ","); // Field DeliveryRegistered
        $filterList = Concat($filterList, $this->EDD->AdvancedSearch->toJson(), ","); // Field EDD
        $filterList = Concat($filterList, $this->SerologyPositive->AdvancedSearch->toJson(), ","); // Field SerologyPositive
        $filterList = Concat($filterList, $this->Allergy->AdvancedSearch->toJson(), ","); // Field Allergy
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
        $filterList = Concat($filterList, $this->Procedure->AdvancedSearch->toJson(), ","); // Field Procedure
        $filterList = Concat($filterList, $this->ProcedureDateTime->AdvancedSearch->toJson(), ","); // Field ProcedureDateTime
        $filterList = Concat($filterList, $this->ICSIDate->AdvancedSearch->toJson(), ","); // Field ICSIDate
        $filterList = Concat($filterList, $this->PatientSearch->AdvancedSearch->toJson(), ","); // Field PatientSearch
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->createdUserName->AdvancedSearch->toJson(), ","); // Field createdUserName
        $filterList = Concat($filterList, $this->TemplateDrNotes->AdvancedSearch->toJson(), ","); // Field TemplateDrNotes
        $filterList = Concat($filterList, $this->reportheader->AdvancedSearch->toJson(), ","); // Field reportheader
        $filterList = Concat($filterList, $this->Purpose->AdvancedSearch->toJson(), ","); // Field Purpose
        $filterList = Concat($filterList, $this->DrName->AdvancedSearch->toJson(), ","); // Field DrName
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_opd_follow_uplistsrch", $filters);
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

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

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

        // Field MobileNumber
        $this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->save();

        // Field Telephone
        $this->Telephone->AdvancedSearch->SearchValue = @$filter["x_Telephone"];
        $this->Telephone->AdvancedSearch->SearchOperator = @$filter["z_Telephone"];
        $this->Telephone->AdvancedSearch->SearchCondition = @$filter["v_Telephone"];
        $this->Telephone->AdvancedSearch->SearchValue2 = @$filter["y_Telephone"];
        $this->Telephone->AdvancedSearch->SearchOperator2 = @$filter["w_Telephone"];
        $this->Telephone->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field procedurenotes
        $this->procedurenotes->AdvancedSearch->SearchValue = @$filter["x_procedurenotes"];
        $this->procedurenotes->AdvancedSearch->SearchOperator = @$filter["z_procedurenotes"];
        $this->procedurenotes->AdvancedSearch->SearchCondition = @$filter["v_procedurenotes"];
        $this->procedurenotes->AdvancedSearch->SearchValue2 = @$filter["y_procedurenotes"];
        $this->procedurenotes->AdvancedSearch->SearchOperator2 = @$filter["w_procedurenotes"];
        $this->procedurenotes->AdvancedSearch->save();

        // Field NextReviewDate
        $this->NextReviewDate->AdvancedSearch->SearchValue = @$filter["x_NextReviewDate"];
        $this->NextReviewDate->AdvancedSearch->SearchOperator = @$filter["z_NextReviewDate"];
        $this->NextReviewDate->AdvancedSearch->SearchCondition = @$filter["v_NextReviewDate"];
        $this->NextReviewDate->AdvancedSearch->SearchValue2 = @$filter["y_NextReviewDate"];
        $this->NextReviewDate->AdvancedSearch->SearchOperator2 = @$filter["w_NextReviewDate"];
        $this->NextReviewDate->AdvancedSearch->save();

        // Field ICSIAdvised
        $this->ICSIAdvised->AdvancedSearch->SearchValue = @$filter["x_ICSIAdvised"];
        $this->ICSIAdvised->AdvancedSearch->SearchOperator = @$filter["z_ICSIAdvised"];
        $this->ICSIAdvised->AdvancedSearch->SearchCondition = @$filter["v_ICSIAdvised"];
        $this->ICSIAdvised->AdvancedSearch->SearchValue2 = @$filter["y_ICSIAdvised"];
        $this->ICSIAdvised->AdvancedSearch->SearchOperator2 = @$filter["w_ICSIAdvised"];
        $this->ICSIAdvised->AdvancedSearch->save();

        // Field DeliveryRegistered
        $this->DeliveryRegistered->AdvancedSearch->SearchValue = @$filter["x_DeliveryRegistered"];
        $this->DeliveryRegistered->AdvancedSearch->SearchOperator = @$filter["z_DeliveryRegistered"];
        $this->DeliveryRegistered->AdvancedSearch->SearchCondition = @$filter["v_DeliveryRegistered"];
        $this->DeliveryRegistered->AdvancedSearch->SearchValue2 = @$filter["y_DeliveryRegistered"];
        $this->DeliveryRegistered->AdvancedSearch->SearchOperator2 = @$filter["w_DeliveryRegistered"];
        $this->DeliveryRegistered->AdvancedSearch->save();

        // Field EDD
        $this->EDD->AdvancedSearch->SearchValue = @$filter["x_EDD"];
        $this->EDD->AdvancedSearch->SearchOperator = @$filter["z_EDD"];
        $this->EDD->AdvancedSearch->SearchCondition = @$filter["v_EDD"];
        $this->EDD->AdvancedSearch->SearchValue2 = @$filter["y_EDD"];
        $this->EDD->AdvancedSearch->SearchOperator2 = @$filter["w_EDD"];
        $this->EDD->AdvancedSearch->save();

        // Field SerologyPositive
        $this->SerologyPositive->AdvancedSearch->SearchValue = @$filter["x_SerologyPositive"];
        $this->SerologyPositive->AdvancedSearch->SearchOperator = @$filter["z_SerologyPositive"];
        $this->SerologyPositive->AdvancedSearch->SearchCondition = @$filter["v_SerologyPositive"];
        $this->SerologyPositive->AdvancedSearch->SearchValue2 = @$filter["y_SerologyPositive"];
        $this->SerologyPositive->AdvancedSearch->SearchOperator2 = @$filter["w_SerologyPositive"];
        $this->SerologyPositive->AdvancedSearch->save();

        // Field Allergy
        $this->Allergy->AdvancedSearch->SearchValue = @$filter["x_Allergy"];
        $this->Allergy->AdvancedSearch->SearchOperator = @$filter["z_Allergy"];
        $this->Allergy->AdvancedSearch->SearchCondition = @$filter["v_Allergy"];
        $this->Allergy->AdvancedSearch->SearchValue2 = @$filter["y_Allergy"];
        $this->Allergy->AdvancedSearch->SearchOperator2 = @$filter["w_Allergy"];
        $this->Allergy->AdvancedSearch->save();

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

        // Field LMP
        $this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
        $this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
        $this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
        $this->LMP->AdvancedSearch->save();

        // Field Procedure
        $this->Procedure->AdvancedSearch->SearchValue = @$filter["x_Procedure"];
        $this->Procedure->AdvancedSearch->SearchOperator = @$filter["z_Procedure"];
        $this->Procedure->AdvancedSearch->SearchCondition = @$filter["v_Procedure"];
        $this->Procedure->AdvancedSearch->SearchValue2 = @$filter["y_Procedure"];
        $this->Procedure->AdvancedSearch->SearchOperator2 = @$filter["w_Procedure"];
        $this->Procedure->AdvancedSearch->save();

        // Field ProcedureDateTime
        $this->ProcedureDateTime->AdvancedSearch->SearchValue = @$filter["x_ProcedureDateTime"];
        $this->ProcedureDateTime->AdvancedSearch->SearchOperator = @$filter["z_ProcedureDateTime"];
        $this->ProcedureDateTime->AdvancedSearch->SearchCondition = @$filter["v_ProcedureDateTime"];
        $this->ProcedureDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureDateTime"];
        $this->ProcedureDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureDateTime"];
        $this->ProcedureDateTime->AdvancedSearch->save();

        // Field ICSIDate
        $this->ICSIDate->AdvancedSearch->SearchValue = @$filter["x_ICSIDate"];
        $this->ICSIDate->AdvancedSearch->SearchOperator = @$filter["z_ICSIDate"];
        $this->ICSIDate->AdvancedSearch->SearchCondition = @$filter["v_ICSIDate"];
        $this->ICSIDate->AdvancedSearch->SearchValue2 = @$filter["y_ICSIDate"];
        $this->ICSIDate->AdvancedSearch->SearchOperator2 = @$filter["w_ICSIDate"];
        $this->ICSIDate->AdvancedSearch->save();

        // Field PatientSearch
        $this->PatientSearch->AdvancedSearch->SearchValue = @$filter["x_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator = @$filter["z_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchCondition = @$filter["v_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchValue2 = @$filter["y_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator2 = @$filter["w_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field createdUserName
        $this->createdUserName->AdvancedSearch->SearchValue = @$filter["x_createdUserName"];
        $this->createdUserName->AdvancedSearch->SearchOperator = @$filter["z_createdUserName"];
        $this->createdUserName->AdvancedSearch->SearchCondition = @$filter["v_createdUserName"];
        $this->createdUserName->AdvancedSearch->SearchValue2 = @$filter["y_createdUserName"];
        $this->createdUserName->AdvancedSearch->SearchOperator2 = @$filter["w_createdUserName"];
        $this->createdUserName->AdvancedSearch->save();

        // Field TemplateDrNotes
        $this->TemplateDrNotes->AdvancedSearch->SearchValue = @$filter["x_TemplateDrNotes"];
        $this->TemplateDrNotes->AdvancedSearch->SearchOperator = @$filter["z_TemplateDrNotes"];
        $this->TemplateDrNotes->AdvancedSearch->SearchCondition = @$filter["v_TemplateDrNotes"];
        $this->TemplateDrNotes->AdvancedSearch->SearchValue2 = @$filter["y_TemplateDrNotes"];
        $this->TemplateDrNotes->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateDrNotes"];
        $this->TemplateDrNotes->AdvancedSearch->save();

        // Field reportheader
        $this->reportheader->AdvancedSearch->SearchValue = @$filter["x_reportheader"];
        $this->reportheader->AdvancedSearch->SearchOperator = @$filter["z_reportheader"];
        $this->reportheader->AdvancedSearch->SearchCondition = @$filter["v_reportheader"];
        $this->reportheader->AdvancedSearch->SearchValue2 = @$filter["y_reportheader"];
        $this->reportheader->AdvancedSearch->SearchOperator2 = @$filter["w_reportheader"];
        $this->reportheader->AdvancedSearch->save();

        // Field Purpose
        $this->Purpose->AdvancedSearch->SearchValue = @$filter["x_Purpose"];
        $this->Purpose->AdvancedSearch->SearchOperator = @$filter["z_Purpose"];
        $this->Purpose->AdvancedSearch->SearchCondition = @$filter["v_Purpose"];
        $this->Purpose->AdvancedSearch->SearchValue2 = @$filter["y_Purpose"];
        $this->Purpose->AdvancedSearch->SearchOperator2 = @$filter["w_Purpose"];
        $this->Purpose->AdvancedSearch->save();

        // Field DrName
        $this->DrName->AdvancedSearch->SearchValue = @$filter["x_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator = @$filter["z_DrName"];
        $this->DrName->AdvancedSearch->SearchCondition = @$filter["v_DrName"];
        $this->DrName->AdvancedSearch->SearchValue2 = @$filter["y_DrName"];
        $this->DrName->AdvancedSearch->SearchOperator2 = @$filter["w_DrName"];
        $this->DrName->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->PatID, $default, false); // PatID
        $this->buildSearchSql($where, $this->PatientId, $default, false); // PatientId
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->MobileNumber, $default, false); // MobileNumber
        $this->buildSearchSql($where, $this->Telephone, $default, false); // Telephone
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->Gender, $default, false); // Gender
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->procedurenotes, $default, false); // procedurenotes
        $this->buildSearchSql($where, $this->NextReviewDate, $default, false); // NextReviewDate
        $this->buildSearchSql($where, $this->ICSIAdvised, $default, true); // ICSIAdvised
        $this->buildSearchSql($where, $this->DeliveryRegistered, $default, true); // DeliveryRegistered
        $this->buildSearchSql($where, $this->EDD, $default, false); // EDD
        $this->buildSearchSql($where, $this->SerologyPositive, $default, true); // SerologyPositive
        $this->buildSearchSql($where, $this->Allergy, $default, false); // Allergy
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->LMP, $default, false); // LMP
        $this->buildSearchSql($where, $this->Procedure, $default, false); // Procedure
        $this->buildSearchSql($where, $this->ProcedureDateTime, $default, false); // ProcedureDateTime
        $this->buildSearchSql($where, $this->ICSIDate, $default, false); // ICSIDate
        $this->buildSearchSql($where, $this->PatientSearch, $default, false); // PatientSearch
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->createdUserName, $default, false); // createdUserName
        $this->buildSearchSql($where, $this->TemplateDrNotes, $default, false); // TemplateDrNotes
        $this->buildSearchSql($where, $this->reportheader, $default, true); // reportheader
        $this->buildSearchSql($where, $this->Purpose, $default, false); // Purpose
        $this->buildSearchSql($where, $this->DrName, $default, false); // DrName

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->PatID->AdvancedSearch->save(); // PatID
            $this->PatientId->AdvancedSearch->save(); // PatientId
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->MobileNumber->AdvancedSearch->save(); // MobileNumber
            $this->Telephone->AdvancedSearch->save(); // Telephone
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->Age->AdvancedSearch->save(); // Age
            $this->Gender->AdvancedSearch->save(); // Gender
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->procedurenotes->AdvancedSearch->save(); // procedurenotes
            $this->NextReviewDate->AdvancedSearch->save(); // NextReviewDate
            $this->ICSIAdvised->AdvancedSearch->save(); // ICSIAdvised
            $this->DeliveryRegistered->AdvancedSearch->save(); // DeliveryRegistered
            $this->EDD->AdvancedSearch->save(); // EDD
            $this->SerologyPositive->AdvancedSearch->save(); // SerologyPositive
            $this->Allergy->AdvancedSearch->save(); // Allergy
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->LMP->AdvancedSearch->save(); // LMP
            $this->Procedure->AdvancedSearch->save(); // Procedure
            $this->ProcedureDateTime->AdvancedSearch->save(); // ProcedureDateTime
            $this->ICSIDate->AdvancedSearch->save(); // ICSIDate
            $this->PatientSearch->AdvancedSearch->save(); // PatientSearch
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->createdUserName->AdvancedSearch->save(); // createdUserName
            $this->TemplateDrNotes->AdvancedSearch->save(); // TemplateDrNotes
            $this->reportheader->AdvancedSearch->save(); // reportheader
            $this->Purpose->AdvancedSearch->save(); // Purpose
            $this->DrName->AdvancedSearch->save(); // DrName
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
        $this->buildBasicSearchSql($where, $this->Reception, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Telephone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->procedurenotes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ICSIAdvised, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeliveryRegistered, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SerologyPositive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Allergy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Procedure, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcedureDateTime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientSearch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdUserName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TemplateDrNotes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->reportheader, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Purpose, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrName, $arKeywords, $type);
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
        if ($this->Reception->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MobileNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Telephone->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profilePic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->procedurenotes->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NextReviewDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ICSIAdvised->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DeliveryRegistered->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EDD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SerologyPositive->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Allergy->AdvancedSearch->issetSession()) {
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
        if ($this->LMP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Procedure->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProcedureDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ICSIDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientSearch->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createdUserName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TemplateDrNotes->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->reportheader->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Purpose->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrName->AdvancedSearch->issetSession()) {
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
                $this->Reception->AdvancedSearch->unsetSession();
                $this->PatID->AdvancedSearch->unsetSession();
                $this->PatientId->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->MobileNumber->AdvancedSearch->unsetSession();
                $this->Telephone->AdvancedSearch->unsetSession();
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->Gender->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->procedurenotes->AdvancedSearch->unsetSession();
                $this->NextReviewDate->AdvancedSearch->unsetSession();
                $this->ICSIAdvised->AdvancedSearch->unsetSession();
                $this->DeliveryRegistered->AdvancedSearch->unsetSession();
                $this->EDD->AdvancedSearch->unsetSession();
                $this->SerologyPositive->AdvancedSearch->unsetSession();
                $this->Allergy->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->LMP->AdvancedSearch->unsetSession();
                $this->Procedure->AdvancedSearch->unsetSession();
                $this->ProcedureDateTime->AdvancedSearch->unsetSession();
                $this->ICSIDate->AdvancedSearch->unsetSession();
                $this->PatientSearch->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->createdUserName->AdvancedSearch->unsetSession();
                $this->TemplateDrNotes->AdvancedSearch->unsetSession();
                $this->reportheader->AdvancedSearch->unsetSession();
                $this->Purpose->AdvancedSearch->unsetSession();
                $this->DrName->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->Reception->AdvancedSearch->load();
                $this->PatID->AdvancedSearch->load();
                $this->PatientId->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->MobileNumber->AdvancedSearch->load();
                $this->Telephone->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->Gender->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->procedurenotes->AdvancedSearch->load();
                $this->NextReviewDate->AdvancedSearch->load();
                $this->ICSIAdvised->AdvancedSearch->load();
                $this->DeliveryRegistered->AdvancedSearch->load();
                $this->EDD->AdvancedSearch->load();
                $this->SerologyPositive->AdvancedSearch->load();
                $this->Allergy->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->LMP->AdvancedSearch->load();
                $this->Procedure->AdvancedSearch->load();
                $this->ProcedureDateTime->AdvancedSearch->load();
                $this->ICSIDate->AdvancedSearch->load();
                $this->PatientSearch->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->createdUserName->AdvancedSearch->load();
                $this->TemplateDrNotes->AdvancedSearch->load();
                $this->reportheader->AdvancedSearch->load();
                $this->Purpose->AdvancedSearch->load();
                $this->DrName->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->MobileNumber); // MobileNumber
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->NextReviewDate); // NextReviewDate
            $this->updateSort($this->ICSIAdvised); // ICSIAdvised
            $this->updateSort($this->DeliveryRegistered); // DeliveryRegistered
            $this->updateSort($this->EDD); // EDD
            $this->updateSort($this->SerologyPositive); // SerologyPositive
            $this->updateSort($this->Allergy); // Allergy
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->LMP); // LMP
            $this->updateSort($this->ProcedureDateTime); // ProcedureDateTime
            $this->updateSort($this->ICSIDate); // ICSIDate
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->createdUserName); // createdUserName
            $this->updateSort($this->reportheader); // reportheader
            $this->updateSort($this->DrName); // DrName
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
                $this->Reception->setSort("");
                $this->PatID->setSort("");
                $this->PatientId->setSort("");
                $this->PatientName->setSort("");
                $this->MobileNumber->setSort("");
                $this->Telephone->setSort("");
                $this->mrnno->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->procedurenotes->setSort("");
                $this->NextReviewDate->setSort("");
                $this->ICSIAdvised->setSort("");
                $this->DeliveryRegistered->setSort("");
                $this->EDD->setSort("");
                $this->SerologyPositive->setSort("");
                $this->Allergy->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->LMP->setSort("");
                $this->Procedure->setSort("");
                $this->ProcedureDateTime->setSort("");
                $this->ICSIDate->setSort("");
                $this->PatientSearch->setSort("");
                $this->HospID->setSort("");
                $this->createdUserName->setSort("");
                $this->TemplateDrNotes->setSort("");
                $this->reportheader->setSort("");
                $this->Purpose->setSort("");
                $this->DrName->setSort("");
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

        // "detail_patient_an_registration"
        $item = &$this->ListOptions->add("detail_patient_an_registration");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'patient_an_registration') && !$this->ShowMultipleDetails;
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
        $pages->add("patient_an_registration");
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
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_patient_an_registration"
        $opt = $this->ListOptions["detail_patient_an_registration"];
        if ($Security->allowList(CurrentProjectID() . 'patient_an_registration')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("patient_an_registration", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PatientAnRegistrationList?" . Config("TABLE_SHOW_MASTER") . "=patient_opd_follow_up&" . GetForeignKeyUrl("fk_PatientId", $this->PatientId->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PatientAnRegistrationGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "patient_an_registration";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "patient_an_registration";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "patient_an_registration";
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
                $item = &$option->add("detailadd_patient_an_registration");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $detailPage = Container("PatientAnRegistrationGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'patient_opd_follow_up') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "patient_an_registration";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_opd_follow_uplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_opd_follow_uplistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_opd_follow_uplist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $sqlwrk = "`pid`=" . AdjustSql($this->PatientId->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`fid`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_patient_an_registration"
        if ($this->DetailPages && $this->DetailPages["patient_an_registration"] && $this->DetailPages["patient_an_registration"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_patient_an_registration"];
            $url = "PatientAnRegistrationPreview?t=patient_opd_follow_up&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"patient_an_registration\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'patient_opd_follow_up')) {
                $label = $Language->TablePhrase("patient_an_registration", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"patient_an_registration\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PatientAnRegistrationList?" . Config("TABLE_SHOW_MASTER") . "=patient_opd_follow_up&" . GetForeignKeyUrl("fk_PatientId", $this->PatientId->CurrentValue) . "&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("patient_an_registration", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PatientAnRegistrationGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'patient_opd_follow_up')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=patient_an_registration");
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

        // Reception
        if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatID
        if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientId
        if (!$this->isAddOrEdit() && $this->PatientId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientId->AdvancedSearch->SearchValue != "" || $this->PatientId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // MobileNumber
        if (!$this->isAddOrEdit() && $this->MobileNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MobileNumber->AdvancedSearch->SearchValue != "" || $this->MobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Telephone
        if (!$this->isAddOrEdit() && $this->Telephone->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Telephone->AdvancedSearch->SearchValue != "" || $this->Telephone->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // mrnno
        if (!$this->isAddOrEdit() && $this->mrnno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mrnno->AdvancedSearch->SearchValue != "" || $this->mrnno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Age
        if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Gender
        if (!$this->isAddOrEdit() && $this->Gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Gender->AdvancedSearch->SearchValue != "" || $this->Gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // profilePic
        if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // procedurenotes
        if (!$this->isAddOrEdit() && $this->procedurenotes->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->procedurenotes->AdvancedSearch->SearchValue != "" || $this->procedurenotes->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NextReviewDate
        if (!$this->isAddOrEdit() && $this->NextReviewDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NextReviewDate->AdvancedSearch->SearchValue != "" || $this->NextReviewDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ICSIAdvised
        if (!$this->isAddOrEdit() && $this->ICSIAdvised->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ICSIAdvised->AdvancedSearch->SearchValue != "" || $this->ICSIAdvised->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->ICSIAdvised->AdvancedSearch->SearchValue)) {
            $this->ICSIAdvised->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ICSIAdvised->AdvancedSearch->SearchValue);
        }
        if (is_array($this->ICSIAdvised->AdvancedSearch->SearchValue2)) {
            $this->ICSIAdvised->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ICSIAdvised->AdvancedSearch->SearchValue2);
        }

        // DeliveryRegistered
        if (!$this->isAddOrEdit() && $this->DeliveryRegistered->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DeliveryRegistered->AdvancedSearch->SearchValue != "" || $this->DeliveryRegistered->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->DeliveryRegistered->AdvancedSearch->SearchValue)) {
            $this->DeliveryRegistered->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->DeliveryRegistered->AdvancedSearch->SearchValue);
        }
        if (is_array($this->DeliveryRegistered->AdvancedSearch->SearchValue2)) {
            $this->DeliveryRegistered->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->DeliveryRegistered->AdvancedSearch->SearchValue2);
        }

        // EDD
        if (!$this->isAddOrEdit() && $this->EDD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EDD->AdvancedSearch->SearchValue != "" || $this->EDD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SerologyPositive
        if (!$this->isAddOrEdit() && $this->SerologyPositive->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SerologyPositive->AdvancedSearch->SearchValue != "" || $this->SerologyPositive->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->SerologyPositive->AdvancedSearch->SearchValue)) {
            $this->SerologyPositive->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->SerologyPositive->AdvancedSearch->SearchValue);
        }
        if (is_array($this->SerologyPositive->AdvancedSearch->SearchValue2)) {
            $this->SerologyPositive->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->SerologyPositive->AdvancedSearch->SearchValue2);
        }

        // Allergy
        if (!$this->isAddOrEdit() && $this->Allergy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Allergy->AdvancedSearch->SearchValue != "" || $this->Allergy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // LMP
        if (!$this->isAddOrEdit() && $this->LMP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LMP->AdvancedSearch->SearchValue != "" || $this->LMP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Procedure
        if (!$this->isAddOrEdit() && $this->Procedure->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Procedure->AdvancedSearch->SearchValue != "" || $this->Procedure->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProcedureDateTime
        if (!$this->isAddOrEdit() && $this->ProcedureDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProcedureDateTime->AdvancedSearch->SearchValue != "" || $this->ProcedureDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ICSIDate
        if (!$this->isAddOrEdit() && $this->ICSIDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ICSIDate->AdvancedSearch->SearchValue != "" || $this->ICSIDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientSearch
        if (!$this->isAddOrEdit() && $this->PatientSearch->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientSearch->AdvancedSearch->SearchValue != "" || $this->PatientSearch->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // createdUserName
        if (!$this->isAddOrEdit() && $this->createdUserName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createdUserName->AdvancedSearch->SearchValue != "" || $this->createdUserName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TemplateDrNotes
        if (!$this->isAddOrEdit() && $this->TemplateDrNotes->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TemplateDrNotes->AdvancedSearch->SearchValue != "" || $this->TemplateDrNotes->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // reportheader
        if (!$this->isAddOrEdit() && $this->reportheader->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->reportheader->AdvancedSearch->SearchValue != "" || $this->reportheader->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->reportheader->AdvancedSearch->SearchValue)) {
            $this->reportheader->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->reportheader->AdvancedSearch->SearchValue);
        }
        if (is_array($this->reportheader->AdvancedSearch->SearchValue2)) {
            $this->reportheader->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->reportheader->AdvancedSearch->SearchValue2);
        }

        // Purpose
        if (!$this->isAddOrEdit() && $this->Purpose->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Purpose->AdvancedSearch->SearchValue != "" || $this->Purpose->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DrName
        if (!$this->isAddOrEdit() && $this->DrName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrName->AdvancedSearch->SearchValue != "" || $this->DrName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->Telephone->setDbValue($row['Telephone']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->procedurenotes->setDbValue($row['procedurenotes']);
        $this->NextReviewDate->setDbValue($row['NextReviewDate']);
        $this->ICSIAdvised->setDbValue($row['ICSIAdvised']);
        $this->DeliveryRegistered->setDbValue($row['DeliveryRegistered']);
        $this->EDD->setDbValue($row['EDD']);
        $this->SerologyPositive->setDbValue($row['SerologyPositive']);
        $this->Allergy->setDbValue($row['Allergy']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->LMP->setDbValue($row['LMP']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->ProcedureDateTime->setDbValue($row['ProcedureDateTime']);
        $this->ICSIDate->setDbValue($row['ICSIDate']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdUserName->setDbValue($row['createdUserName']);
        $this->TemplateDrNotes->setDbValue($row['TemplateDrNotes']);
        $this->reportheader->setDbValue($row['reportheader']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->DrName->setDbValue($row['DrName']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatID'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['MobileNumber'] = null;
        $row['Telephone'] = null;
        $row['mrnno'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['procedurenotes'] = null;
        $row['NextReviewDate'] = null;
        $row['ICSIAdvised'] = null;
        $row['DeliveryRegistered'] = null;
        $row['EDD'] = null;
        $row['SerologyPositive'] = null;
        $row['Allergy'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['LMP'] = null;
        $row['Procedure'] = null;
        $row['ProcedureDateTime'] = null;
        $row['ICSIDate'] = null;
        $row['PatientSearch'] = null;
        $row['HospID'] = null;
        $row['createdUserName'] = null;
        $row['TemplateDrNotes'] = null;
        $row['reportheader'] = null;
        $row['Purpose'] = null;
        $row['DrName'] = null;
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

        // Reception

        // PatID

        // PatientId

        // PatientName

        // MobileNumber

        // Telephone

        // mrnno

        // Age

        // Gender

        // profilePic

        // procedurenotes

        // NextReviewDate

        // ICSIAdvised

        // DeliveryRegistered

        // EDD

        // SerologyPositive

        // Allergy

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // LMP

        // Procedure

        // ProcedureDateTime

        // ICSIDate

        // PatientSearch

        // HospID

        // createdUserName

        // TemplateDrNotes

        // reportheader

        // Purpose

        // DrName
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // Telephone
            $this->Telephone->ViewValue = $this->Telephone->CurrentValue;
            $this->Telephone->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // NextReviewDate
            $this->NextReviewDate->ViewValue = $this->NextReviewDate->CurrentValue;
            $this->NextReviewDate->ViewValue = FormatDateTime($this->NextReviewDate->ViewValue, 7);
            $this->NextReviewDate->ViewCustomAttributes = "";

            // ICSIAdvised
            if (strval($this->ICSIAdvised->CurrentValue) != "") {
                $this->ICSIAdvised->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ICSIAdvised->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ICSIAdvised->ViewValue->add($this->ICSIAdvised->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ICSIAdvised->ViewValue = null;
            }
            $this->ICSIAdvised->ViewCustomAttributes = "";

            // DeliveryRegistered
            if (strval($this->DeliveryRegistered->CurrentValue) != "") {
                $this->DeliveryRegistered->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->DeliveryRegistered->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->DeliveryRegistered->ViewValue->add($this->DeliveryRegistered->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->DeliveryRegistered->ViewValue = null;
            }
            $this->DeliveryRegistered->ViewCustomAttributes = "";

            // EDD
            $this->EDD->ViewValue = $this->EDD->CurrentValue;
            $this->EDD->ViewValue = FormatDateTime($this->EDD->ViewValue, 7);
            $this->EDD->ViewCustomAttributes = "";

            // SerologyPositive
            if (strval($this->SerologyPositive->CurrentValue) != "") {
                $this->SerologyPositive->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->SerologyPositive->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->SerologyPositive->ViewValue->add($this->SerologyPositive->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->SerologyPositive->ViewValue = null;
            }
            $this->SerologyPositive->ViewCustomAttributes = "";

            // Allergy
            $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
            $curVal = trim(strval($this->Allergy->CurrentValue));
            if ($curVal != "") {
                $this->Allergy->ViewValue = $this->Allergy->lookupCacheOption($curVal);
                if ($this->Allergy->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Generic`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->Allergy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Allergy->Lookup->renderViewRow($rswrk[0]);
                        $this->Allergy->ViewValue = $this->Allergy->displayValue($arwrk);
                    } else {
                        $this->Allergy->ViewValue = $this->Allergy->CurrentValue;
                    }
                }
            } else {
                $this->Allergy->ViewValue = null;
            }
            $this->Allergy->ViewCustomAttributes = "";

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

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 7);
            $this->LMP->ViewCustomAttributes = "";

            // ProcedureDateTime
            $this->ProcedureDateTime->ViewValue = $this->ProcedureDateTime->CurrentValue;
            $this->ProcedureDateTime->ViewValue = FormatDateTime($this->ProcedureDateTime->ViewValue, 11);
            $this->ProcedureDateTime->ViewCustomAttributes = "";

            // ICSIDate
            $this->ICSIDate->ViewValue = $this->ICSIDate->CurrentValue;
            $this->ICSIDate->ViewValue = FormatDateTime($this->ICSIDate->ViewValue, 7);
            $this->ICSIDate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // createdUserName
            $this->createdUserName->ViewValue = $this->createdUserName->CurrentValue;
            $this->createdUserName->ViewCustomAttributes = "";

            // reportheader
            if (strval($this->reportheader->CurrentValue) != "") {
                $this->reportheader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->reportheader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->reportheader->ViewValue->add($this->reportheader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->reportheader->ViewValue = null;
            }
            $this->reportheader->ViewCustomAttributes = "";

            // DrName
            $curVal = trim(strval($this->DrName->CurrentValue));
            if ($curVal != "") {
                $this->DrName->ViewValue = $this->DrName->lookupCacheOption($curVal);
                if ($this->DrName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`CODE`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->DrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrName->Lookup->renderViewRow($rswrk[0]);
                        $this->DrName->ViewValue = $this->DrName->displayValue($arwrk);
                    } else {
                        $this->DrName->ViewValue = $this->DrName->CurrentValue;
                    }
                }
            } else {
                $this->DrName->ViewValue = null;
            }
            $this->DrName->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
            if (!$this->isExport()) {
                $this->id->ViewValue = $this->highlightValue($this->id);
            }

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatID->ViewValue = $this->highlightValue($this->PatID);
            }

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientName->ViewValue = $this->highlightValue($this->PatientName);
            }

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MobileNumber->ViewValue = $this->highlightValue($this->MobileNumber);
            }

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Gender->ViewValue = $this->highlightValue($this->Gender);
            }

            // NextReviewDate
            $this->NextReviewDate->LinkCustomAttributes = "";
            $this->NextReviewDate->HrefValue = "";
            $this->NextReviewDate->TooltipValue = "";

            // ICSIAdvised
            $this->ICSIAdvised->LinkCustomAttributes = "";
            $this->ICSIAdvised->HrefValue = "";
            $this->ICSIAdvised->TooltipValue = "";

            // DeliveryRegistered
            $this->DeliveryRegistered->LinkCustomAttributes = "";
            $this->DeliveryRegistered->HrefValue = "";
            $this->DeliveryRegistered->TooltipValue = "";

            // EDD
            $this->EDD->LinkCustomAttributes = "";
            $this->EDD->HrefValue = "";
            $this->EDD->TooltipValue = "";

            // SerologyPositive
            $this->SerologyPositive->LinkCustomAttributes = "";
            $this->SerologyPositive->HrefValue = "";
            $this->SerologyPositive->TooltipValue = "";

            // Allergy
            $this->Allergy->LinkCustomAttributes = "";
            $this->Allergy->HrefValue = "";
            $this->Allergy->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Allergy->ViewValue = $this->highlightValue($this->Allergy);
            }

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

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // ProcedureDateTime
            $this->ProcedureDateTime->LinkCustomAttributes = "";
            $this->ProcedureDateTime->HrefValue = "";
            $this->ProcedureDateTime->TooltipValue = "";

            // ICSIDate
            $this->ICSIDate->LinkCustomAttributes = "";
            $this->ICSIDate->HrefValue = "";
            $this->ICSIDate->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HospID->ViewValue = $this->highlightValue($this->HospID);
            }

            // createdUserName
            $this->createdUserName->LinkCustomAttributes = "";
            $this->createdUserName->HrefValue = "";
            $this->createdUserName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->createdUserName->ViewValue = $this->highlightValue($this->createdUserName);
            }

            // reportheader
            $this->reportheader->LinkCustomAttributes = "";
            $this->reportheader->HrefValue = "";
            $this->reportheader->TooltipValue = "";

            // DrName
            $this->DrName->LinkCustomAttributes = "";
            $this->DrName->HrefValue = "";
            $this->DrName->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // NextReviewDate
            $this->NextReviewDate->EditAttrs["class"] = "form-control";
            $this->NextReviewDate->EditCustomAttributes = "";
            $this->NextReviewDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->NextReviewDate->AdvancedSearch->SearchValue, 7), 7));
            $this->NextReviewDate->PlaceHolder = RemoveHtml($this->NextReviewDate->caption());

            // ICSIAdvised
            $this->ICSIAdvised->EditCustomAttributes = "";
            $this->ICSIAdvised->EditValue = $this->ICSIAdvised->options(false);
            $this->ICSIAdvised->PlaceHolder = RemoveHtml($this->ICSIAdvised->caption());

            // DeliveryRegistered
            $this->DeliveryRegistered->EditCustomAttributes = "";
            $this->DeliveryRegistered->EditValue = $this->DeliveryRegistered->options(false);
            $this->DeliveryRegistered->PlaceHolder = RemoveHtml($this->DeliveryRegistered->caption());

            // EDD
            $this->EDD->EditAttrs["class"] = "form-control";
            $this->EDD->EditCustomAttributes = "";
            $this->EDD->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EDD->AdvancedSearch->SearchValue, 7), 7));
            $this->EDD->PlaceHolder = RemoveHtml($this->EDD->caption());

            // SerologyPositive
            $this->SerologyPositive->EditCustomAttributes = "";
            $this->SerologyPositive->EditValue = $this->SerologyPositive->options(false);
            $this->SerologyPositive->PlaceHolder = RemoveHtml($this->SerologyPositive->caption());

            // Allergy
            $this->Allergy->EditAttrs["class"] = "form-control";
            $this->Allergy->EditCustomAttributes = "";
            if (!$this->Allergy->Raw) {
                $this->Allergy->AdvancedSearch->SearchValue = HtmlDecode($this->Allergy->AdvancedSearch->SearchValue);
            }
            $this->Allergy->EditValue = HtmlEncode($this->Allergy->AdvancedSearch->SearchValue);
            $this->Allergy->PlaceHolder = RemoveHtml($this->Allergy->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // LMP
            $this->LMP->EditAttrs["class"] = "form-control";
            $this->LMP->EditCustomAttributes = "";
            $this->LMP->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->LMP->AdvancedSearch->SearchValue, 7), 7));
            $this->LMP->PlaceHolder = RemoveHtml($this->LMP->caption());

            // ProcedureDateTime
            $this->ProcedureDateTime->EditAttrs["class"] = "form-control";
            $this->ProcedureDateTime->EditCustomAttributes = "";
            $this->ProcedureDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ProcedureDateTime->AdvancedSearch->SearchValue, 11), 11));
            $this->ProcedureDateTime->PlaceHolder = RemoveHtml($this->ProcedureDateTime->caption());

            // ICSIDate
            $this->ICSIDate->EditAttrs["class"] = "form-control";
            $this->ICSIDate->EditCustomAttributes = "";
            $this->ICSIDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ICSIDate->AdvancedSearch->SearchValue, 7), 7));
            $this->ICSIDate->PlaceHolder = RemoveHtml($this->ICSIDate->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            if (!$this->HospID->Raw) {
                $this->HospID->AdvancedSearch->SearchValue = HtmlDecode($this->HospID->AdvancedSearch->SearchValue);
            }
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // createdUserName
            $this->createdUserName->EditAttrs["class"] = "form-control";
            $this->createdUserName->EditCustomAttributes = "";
            if (!$this->createdUserName->Raw) {
                $this->createdUserName->AdvancedSearch->SearchValue = HtmlDecode($this->createdUserName->AdvancedSearch->SearchValue);
            }
            $this->createdUserName->EditValue = HtmlEncode($this->createdUserName->AdvancedSearch->SearchValue);
            $this->createdUserName->PlaceHolder = RemoveHtml($this->createdUserName->caption());

            // reportheader
            $this->reportheader->EditCustomAttributes = "";
            $this->reportheader->EditValue = $this->reportheader->options(false);
            $this->reportheader->PlaceHolder = RemoveHtml($this->reportheader->caption());

            // DrName
            $this->DrName->EditAttrs["class"] = "form-control";
            $this->DrName->EditCustomAttributes = "";
            $this->DrName->PlaceHolder = RemoveHtml($this->DrName->caption());
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
        if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
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
        $this->Reception->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->Telephone->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->procedurenotes->AdvancedSearch->load();
        $this->NextReviewDate->AdvancedSearch->load();
        $this->ICSIAdvised->AdvancedSearch->load();
        $this->DeliveryRegistered->AdvancedSearch->load();
        $this->EDD->AdvancedSearch->load();
        $this->SerologyPositive->AdvancedSearch->load();
        $this->Allergy->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->LMP->AdvancedSearch->load();
        $this->Procedure->AdvancedSearch->load();
        $this->ProcedureDateTime->AdvancedSearch->load();
        $this->ICSIDate->AdvancedSearch->load();
        $this->PatientSearch->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->createdUserName->AdvancedSearch->load();
        $this->TemplateDrNotes->AdvancedSearch->load();
        $this->reportheader->AdvancedSearch->load();
        $this->Purpose->AdvancedSearch->load();
        $this->DrName->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_opd_follow_uplist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_opd_follow_uplist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_opd_follow_uplist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_patient_opd_follow_up" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_opd_follow_up\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_opd_follow_uplist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_opd_follow_uplistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"PatientOpdFollowUpSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"patient_opd_follow_up\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'PatientOpdFollowUpSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpatient_opd_follow_uplistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_ICSIAdvised":
                    break;
                case "x_DeliveryRegistered":
                    break;
                case "x_SerologyPositive":
                    break;
                case "x_Allergy":
                    break;
                case "x_status":
                    break;
                case "x_PatientSearch":
                    break;
                case "x_TemplateDrNotes":
                    $lookupFilter = function () {
                        return "`TemplateType`='Doctor Notes'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_reportheader":
                    break;
                case "x_DrName":
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
