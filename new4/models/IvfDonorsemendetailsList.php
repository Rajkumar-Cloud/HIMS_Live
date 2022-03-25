<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfDonorsemendetailsList extends IvfDonorsemendetails
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_donorsemendetails';

    // Page object name
    public $PageObjName = "IvfDonorsemendetailsList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fivf_donorsemendetailslist";
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

        // Table object (ivf_donorsemendetails)
        if (!isset($GLOBALS["ivf_donorsemendetails"]) || get_class($GLOBALS["ivf_donorsemendetails"]) == PROJECT_NAMESPACE . "ivf_donorsemendetails") {
            $GLOBALS["ivf_donorsemendetails"] = &$this;
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
        $this->AddUrl = "IvfDonorsemendetailsAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfDonorsemendetailsDelete";
        $this->MultiUpdateUrl = "IvfDonorsemendetailsUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_donorsemendetails');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_donorsemendetailslistsrch";

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
                $doc = new $class(Container("ivf_donorsemendetails"));
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

        // Create form object
        $CurrentForm = new HttpForm();

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
        $this->id->Visible = false;
        $this->RIDNo->Visible = false;
        $this->TidNo->Visible = false;
        $this->Agency->Visible = false;
        $this->ReceivedOn->Visible = false;
        $this->ReceivedBy->Visible = false;
        $this->DonorNo->setVisibility();
        $this->BatchNo->setVisibility();
        $this->BloodGroup->setVisibility();
        $this->Height->setVisibility();
        $this->SkinColor->setVisibility();
        $this->EyeColor->setVisibility();
        $this->HairColor->setVisibility();
        $this->NoOfVials->setVisibility();
        $this->Tank->setVisibility();
        $this->Canister->setVisibility();
        $this->Remarks->setVisibility();
        $this->patientid->Visible = false;
        $this->coupleid->Visible = false;
        $this->Usedstatus->Visible = false;
        $this->status->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->Lagency->Visible = false;
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
        $this->setupLookupOptions($this->BloodGroup);
        $this->setupLookupOptions($this->Lagency);

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

            // Check QueryString parameters
            if (Get("action") !== null) {
                $this->CurrentAction = Get("action");

                // Clear inline mode
                if ($this->isCancel()) {
                    $this->clearInlineMode();
                }

                // Switch to grid edit mode
                if ($this->isGridEdit()) {
                    $this->gridEditMode();
                }

                // Switch to grid add mode
                if ($this->isGridAdd()) {
                    $this->gridAddMode();
                }
            } else {
                if (Post("action") !== null) {
                    $this->CurrentAction = Post("action"); // Get action

                    // Grid Update
                    if (($this->isGridUpdate() || $this->isGridOverwrite()) && Session(SESSION_INLINE_MODE) == "gridedit") {
                        if ($this->validateGridForm()) {
                            $gridUpdate = $this->gridUpdate();
                        } else {
                            $gridUpdate = false;
                        }
                        if ($gridUpdate) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridEditMode(); // Stay in Grid edit mode
                        }
                    }

                    // Grid Insert
                    if ($this->isGridInsert() && Session(SESSION_INLINE_MODE) == "gridadd") {
                        if ($this->validateGridForm()) {
                            $gridInsert = $this->gridInsert();
                        } else {
                            $gridInsert = false;
                        }
                        if ($gridInsert) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridAddMode(); // Stay in Grid add mode
                        }
                    }
                } elseif (Session(SESSION_INLINE_MODE) == "gridedit") { // Previously in grid edit mode
                    if (Get(Config("TABLE_START_REC")) !== null || Get(Config("TABLE_PAGE_NO")) !== null) { // Stay in grid edit mode if paging
                        $this->gridEditMode();
                    } else { // Reset grid edit
                        $this->clearInlineMode();
                    }
                }
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

            // Show grid delete link for grid add / grid edit
            if ($this->AllowAddDeleteRow) {
                if ($this->isGridAdd() || $this->isGridEdit()) {
                    $item = $this->ListOptions["griddelete"];
                    if ($item) {
                        $item->Visible = true;
                    }
                }
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

    // Exit inline mode
    protected function clearInlineMode()
    {
        $this->LastAction = $this->CurrentAction; // Save last action
        $this->CurrentAction = ""; // Clear action
        $_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
    }

    // Switch to Grid Add mode
    protected function gridAddMode()
    {
        $this->CurrentAction = "gridadd";
        $_SESSION[SESSION_INLINE_MODE] = "gridadd";
        $this->hideFieldsForAddEdit();
    }

    // Switch to Grid Edit mode
    protected function gridEditMode()
    {
        $this->CurrentAction = "gridedit";
        $_SESSION[SESSION_INLINE_MODE] = "gridedit";
        $this->hideFieldsForAddEdit();
    }

    // Perform update to grid
    public function gridUpdate()
    {
        global $Language, $CurrentForm;
        $gridUpdate = true;

        // Get old recordset
        $this->CurrentFilter = $this->buildKeyFilter();
        if ($this->CurrentFilter == "") {
            $this->CurrentFilter = "0=1";
        }
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        if ($rs = $conn->executeQuery($sql)) {
            $rsold = $rs->fetchAll();
            $rs->closeCursor();
        }

        // Call Grid Updating event
        if (!$this->gridUpdating($rsold)) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();
        $key = "";

        // Update row index and get row key
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Update all rows based on key
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            $CurrentForm->Index = $rowindex;
            $this->setKey($CurrentForm->getValue($this->OldKeyName));
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));

            // Load all values and keys
            if ($rowaction != "insertdelete") { // Skip insert then deleted rows
                $this->loadFormValues(); // Get form values
                if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
                    $gridUpdate = $this->OldKey != ""; // Key must not be empty
                } else {
                    $gridUpdate = true;
                }

                // Skip empty row
                if ($rowaction == "insert" && $this->emptyRow()) {
                // Validate form and insert/update/delete record
                } elseif ($gridUpdate) {
                    if ($rowaction == "delete") {
                        $this->CurrentFilter = $this->getRecordFilter();
                        $gridUpdate = $this->deleteRows(); // Delete this row
                    //} elseif (!$this->validateForm()) { // Already done in validateGridForm
                    //    $gridUpdate = false; // Form error, reset action
                    } else {
                        if ($rowaction == "insert") {
                            $gridUpdate = $this->addRow(); // Insert this row
                        } else {
                            if ($this->OldKey != "") {
                                $this->SendEmail = false; // Do not send email on update success
                                $gridUpdate = $this->editRow(); // Update this row
                            }
                        } // End update
                    }
                }
                if ($gridUpdate) {
                    if ($key != "") {
                        $key .= ", ";
                    }
                    $key .= $this->OldKey;
                } else {
                    break;
                }
            }
        }
        if ($gridUpdate) {
            $conn->commit(); // Commit transaction

            // Get new records
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Updated event
            $this->gridUpdated($rsold, $rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
            }
        }
        return $gridUpdate;
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

    // Perform Grid Add
    public function gridInsert()
    {
        global $Language, $CurrentForm;
        $rowindex = 1;
        $gridInsert = false;
        $conn = $this->getConnection();

        // Call Grid Inserting event
        if (!$this->gridInserting()) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();

        // Init key filter
        $wrkfilter = "";
        $addcnt = 0;
        $key = "";

        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Insert all rows
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "" && $rowaction != "insert") {
                continue; // Skip
            }
            if ($rowaction == "insert") {
                $this->OldKey = strval($CurrentForm->getValue($this->OldKeyName));
                $this->loadOldRecord(); // Load old record
            }
            $this->loadFormValues(); // Get form values
            if (!$this->emptyRow()) {
                $addcnt++;
                $this->SendEmail = false; // Do not send email on insert success

                // Validate form // Already done in validateGridForm
                //if (!$this->validateForm()) {
                //    $gridInsert = false; // Form error, reset action
                //} else {
                    $gridInsert = $this->addRow($this->OldRecordset); // Insert this row
                //}
                if ($gridInsert) {
                    if ($key != "") {
                        $key .= Config("COMPOSITE_KEY_SEPARATOR");
                    }
                    $key .= $this->id->CurrentValue;

                    // Add filter for this record
                    $filter = $this->getRecordFilter();
                    if ($wrkfilter != "") {
                        $wrkfilter .= " OR ";
                    }
                    $wrkfilter .= $filter;
                } else {
                    break;
                }
            }
        }
        if ($addcnt == 0) { // No record inserted
            $this->setFailureMessage($Language->phrase("NoAddRecord"));
            $gridInsert = false;
        }
        if ($gridInsert) {
            $conn->commit(); // Commit transaction

            // Get new records
            $this->CurrentFilter = $wrkfilter;
            $sql = $this->getCurrentSql();
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Inserted event
            $this->gridInserted($rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
            }
            $this->clearInlineMode(); // Clear grid add mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
            }
        }
        return $gridInsert;
    }

    // Check if empty row
    public function emptyRow()
    {
        global $CurrentForm;
        if ($CurrentForm->hasValue("x_DonorNo") && $CurrentForm->hasValue("o_DonorNo") && $this->DonorNo->CurrentValue != $this->DonorNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue != $this->BatchNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BloodGroup") && $CurrentForm->hasValue("o_BloodGroup") && $this->BloodGroup->CurrentValue != $this->BloodGroup->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Height") && $CurrentForm->hasValue("o_Height") && $this->Height->CurrentValue != $this->Height->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SkinColor") && $CurrentForm->hasValue("o_SkinColor") && $this->SkinColor->CurrentValue != $this->SkinColor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EyeColor") && $CurrentForm->hasValue("o_EyeColor") && $this->EyeColor->CurrentValue != $this->EyeColor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HairColor") && $CurrentForm->hasValue("o_HairColor") && $this->HairColor->CurrentValue != $this->HairColor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NoOfVials") && $CurrentForm->hasValue("o_NoOfVials") && $this->NoOfVials->CurrentValue != $this->NoOfVials->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Tank") && $CurrentForm->hasValue("o_Tank") && $this->Tank->CurrentValue != $this->Tank->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Canister") && $CurrentForm->hasValue("o_Canister") && $this->Canister->CurrentValue != $this->Canister->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Remarks") && $CurrentForm->hasValue("o_Remarks") && $this->Remarks->CurrentValue != $this->Remarks->OldValue) {
            return false;
        }
        return true;
    }

    // Validate grid form
    public function validateGridForm()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Validate all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } elseif (!$this->validateForm()) {
                    return false;
                }
            }
        }
        return true;
    }

    // Get all form values of the grid
    public function getGridFormValues()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }
        $rows = [];

        // Loop through all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } else {
                    $rows[] = $this->getFieldValues("FormValue"); // Return row as array
                }
            }
        }
        return $rows; // Return as array of array
    }

    // Restore form values for current row
    public function restoreCurrentRowFormValues($idx)
    {
        global $CurrentForm;

        // Get row based on current index
        $CurrentForm->Index = $idx;
        $rowaction = strval($CurrentForm->getValue($this->FormActionName));
        $this->loadFormValues(); // Load form values
        // Set up invalid status correctly
        $this->resetFormError();
        if ($rowaction == "insert" && $this->emptyRow()) {
            // Ignore
        } else {
            $this->validateForm();
        }
    }

    // Reset form status
    public function resetFormError()
    {
        $this->DonorNo->clearErrorMessage();
        $this->BatchNo->clearErrorMessage();
        $this->BloodGroup->clearErrorMessage();
        $this->Height->clearErrorMessage();
        $this->SkinColor->clearErrorMessage();
        $this->EyeColor->clearErrorMessage();
        $this->HairColor->clearErrorMessage();
        $this->NoOfVials->clearErrorMessage();
        $this->Tank->clearErrorMessage();
        $this->Canister->clearErrorMessage();
        $this->Remarks->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_donorsemendetailslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->Agency->AdvancedSearch->toJson(), ","); // Field Agency
        $filterList = Concat($filterList, $this->ReceivedOn->AdvancedSearch->toJson(), ","); // Field ReceivedOn
        $filterList = Concat($filterList, $this->ReceivedBy->AdvancedSearch->toJson(), ","); // Field ReceivedBy
        $filterList = Concat($filterList, $this->DonorNo->AdvancedSearch->toJson(), ","); // Field DonorNo
        $filterList = Concat($filterList, $this->BatchNo->AdvancedSearch->toJson(), ","); // Field BatchNo
        $filterList = Concat($filterList, $this->BloodGroup->AdvancedSearch->toJson(), ","); // Field BloodGroup
        $filterList = Concat($filterList, $this->Height->AdvancedSearch->toJson(), ","); // Field Height
        $filterList = Concat($filterList, $this->SkinColor->AdvancedSearch->toJson(), ","); // Field SkinColor
        $filterList = Concat($filterList, $this->EyeColor->AdvancedSearch->toJson(), ","); // Field EyeColor
        $filterList = Concat($filterList, $this->HairColor->AdvancedSearch->toJson(), ","); // Field HairColor
        $filterList = Concat($filterList, $this->NoOfVials->AdvancedSearch->toJson(), ","); // Field NoOfVials
        $filterList = Concat($filterList, $this->Tank->AdvancedSearch->toJson(), ","); // Field Tank
        $filterList = Concat($filterList, $this->Canister->AdvancedSearch->toJson(), ","); // Field Canister
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->patientid->AdvancedSearch->toJson(), ","); // Field patientid
        $filterList = Concat($filterList, $this->coupleid->AdvancedSearch->toJson(), ","); // Field coupleid
        $filterList = Concat($filterList, $this->Usedstatus->AdvancedSearch->toJson(), ","); // Field Usedstatus
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->Lagency->AdvancedSearch->toJson(), ","); // Field Lagency
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_donorsemendetailslistsrch", $filters);
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

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field Agency
        $this->Agency->AdvancedSearch->SearchValue = @$filter["x_Agency"];
        $this->Agency->AdvancedSearch->SearchOperator = @$filter["z_Agency"];
        $this->Agency->AdvancedSearch->SearchCondition = @$filter["v_Agency"];
        $this->Agency->AdvancedSearch->SearchValue2 = @$filter["y_Agency"];
        $this->Agency->AdvancedSearch->SearchOperator2 = @$filter["w_Agency"];
        $this->Agency->AdvancedSearch->save();

        // Field ReceivedOn
        $this->ReceivedOn->AdvancedSearch->SearchValue = @$filter["x_ReceivedOn"];
        $this->ReceivedOn->AdvancedSearch->SearchOperator = @$filter["z_ReceivedOn"];
        $this->ReceivedOn->AdvancedSearch->SearchCondition = @$filter["v_ReceivedOn"];
        $this->ReceivedOn->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedOn"];
        $this->ReceivedOn->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedOn"];
        $this->ReceivedOn->AdvancedSearch->save();

        // Field ReceivedBy
        $this->ReceivedBy->AdvancedSearch->SearchValue = @$filter["x_ReceivedBy"];
        $this->ReceivedBy->AdvancedSearch->SearchOperator = @$filter["z_ReceivedBy"];
        $this->ReceivedBy->AdvancedSearch->SearchCondition = @$filter["v_ReceivedBy"];
        $this->ReceivedBy->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedBy"];
        $this->ReceivedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedBy"];
        $this->ReceivedBy->AdvancedSearch->save();

        // Field DonorNo
        $this->DonorNo->AdvancedSearch->SearchValue = @$filter["x_DonorNo"];
        $this->DonorNo->AdvancedSearch->SearchOperator = @$filter["z_DonorNo"];
        $this->DonorNo->AdvancedSearch->SearchCondition = @$filter["v_DonorNo"];
        $this->DonorNo->AdvancedSearch->SearchValue2 = @$filter["y_DonorNo"];
        $this->DonorNo->AdvancedSearch->SearchOperator2 = @$filter["w_DonorNo"];
        $this->DonorNo->AdvancedSearch->save();

        // Field BatchNo
        $this->BatchNo->AdvancedSearch->SearchValue = @$filter["x_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchOperator = @$filter["z_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchCondition = @$filter["v_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchValue2 = @$filter["y_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_BatchNo"];
        $this->BatchNo->AdvancedSearch->save();

        // Field BloodGroup
        $this->BloodGroup->AdvancedSearch->SearchValue = @$filter["x_BloodGroup"];
        $this->BloodGroup->AdvancedSearch->SearchOperator = @$filter["z_BloodGroup"];
        $this->BloodGroup->AdvancedSearch->SearchCondition = @$filter["v_BloodGroup"];
        $this->BloodGroup->AdvancedSearch->SearchValue2 = @$filter["y_BloodGroup"];
        $this->BloodGroup->AdvancedSearch->SearchOperator2 = @$filter["w_BloodGroup"];
        $this->BloodGroup->AdvancedSearch->save();

        // Field Height
        $this->Height->AdvancedSearch->SearchValue = @$filter["x_Height"];
        $this->Height->AdvancedSearch->SearchOperator = @$filter["z_Height"];
        $this->Height->AdvancedSearch->SearchCondition = @$filter["v_Height"];
        $this->Height->AdvancedSearch->SearchValue2 = @$filter["y_Height"];
        $this->Height->AdvancedSearch->SearchOperator2 = @$filter["w_Height"];
        $this->Height->AdvancedSearch->save();

        // Field SkinColor
        $this->SkinColor->AdvancedSearch->SearchValue = @$filter["x_SkinColor"];
        $this->SkinColor->AdvancedSearch->SearchOperator = @$filter["z_SkinColor"];
        $this->SkinColor->AdvancedSearch->SearchCondition = @$filter["v_SkinColor"];
        $this->SkinColor->AdvancedSearch->SearchValue2 = @$filter["y_SkinColor"];
        $this->SkinColor->AdvancedSearch->SearchOperator2 = @$filter["w_SkinColor"];
        $this->SkinColor->AdvancedSearch->save();

        // Field EyeColor
        $this->EyeColor->AdvancedSearch->SearchValue = @$filter["x_EyeColor"];
        $this->EyeColor->AdvancedSearch->SearchOperator = @$filter["z_EyeColor"];
        $this->EyeColor->AdvancedSearch->SearchCondition = @$filter["v_EyeColor"];
        $this->EyeColor->AdvancedSearch->SearchValue2 = @$filter["y_EyeColor"];
        $this->EyeColor->AdvancedSearch->SearchOperator2 = @$filter["w_EyeColor"];
        $this->EyeColor->AdvancedSearch->save();

        // Field HairColor
        $this->HairColor->AdvancedSearch->SearchValue = @$filter["x_HairColor"];
        $this->HairColor->AdvancedSearch->SearchOperator = @$filter["z_HairColor"];
        $this->HairColor->AdvancedSearch->SearchCondition = @$filter["v_HairColor"];
        $this->HairColor->AdvancedSearch->SearchValue2 = @$filter["y_HairColor"];
        $this->HairColor->AdvancedSearch->SearchOperator2 = @$filter["w_HairColor"];
        $this->HairColor->AdvancedSearch->save();

        // Field NoOfVials
        $this->NoOfVials->AdvancedSearch->SearchValue = @$filter["x_NoOfVials"];
        $this->NoOfVials->AdvancedSearch->SearchOperator = @$filter["z_NoOfVials"];
        $this->NoOfVials->AdvancedSearch->SearchCondition = @$filter["v_NoOfVials"];
        $this->NoOfVials->AdvancedSearch->SearchValue2 = @$filter["y_NoOfVials"];
        $this->NoOfVials->AdvancedSearch->SearchOperator2 = @$filter["w_NoOfVials"];
        $this->NoOfVials->AdvancedSearch->save();

        // Field Tank
        $this->Tank->AdvancedSearch->SearchValue = @$filter["x_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator = @$filter["z_Tank"];
        $this->Tank->AdvancedSearch->SearchCondition = @$filter["v_Tank"];
        $this->Tank->AdvancedSearch->SearchValue2 = @$filter["y_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator2 = @$filter["w_Tank"];
        $this->Tank->AdvancedSearch->save();

        // Field Canister
        $this->Canister->AdvancedSearch->SearchValue = @$filter["x_Canister"];
        $this->Canister->AdvancedSearch->SearchOperator = @$filter["z_Canister"];
        $this->Canister->AdvancedSearch->SearchCondition = @$filter["v_Canister"];
        $this->Canister->AdvancedSearch->SearchValue2 = @$filter["y_Canister"];
        $this->Canister->AdvancedSearch->SearchOperator2 = @$filter["w_Canister"];
        $this->Canister->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field patientid
        $this->patientid->AdvancedSearch->SearchValue = @$filter["x_patientid"];
        $this->patientid->AdvancedSearch->SearchOperator = @$filter["z_patientid"];
        $this->patientid->AdvancedSearch->SearchCondition = @$filter["v_patientid"];
        $this->patientid->AdvancedSearch->SearchValue2 = @$filter["y_patientid"];
        $this->patientid->AdvancedSearch->SearchOperator2 = @$filter["w_patientid"];
        $this->patientid->AdvancedSearch->save();

        // Field coupleid
        $this->coupleid->AdvancedSearch->SearchValue = @$filter["x_coupleid"];
        $this->coupleid->AdvancedSearch->SearchOperator = @$filter["z_coupleid"];
        $this->coupleid->AdvancedSearch->SearchCondition = @$filter["v_coupleid"];
        $this->coupleid->AdvancedSearch->SearchValue2 = @$filter["y_coupleid"];
        $this->coupleid->AdvancedSearch->SearchOperator2 = @$filter["w_coupleid"];
        $this->coupleid->AdvancedSearch->save();

        // Field Usedstatus
        $this->Usedstatus->AdvancedSearch->SearchValue = @$filter["x_Usedstatus"];
        $this->Usedstatus->AdvancedSearch->SearchOperator = @$filter["z_Usedstatus"];
        $this->Usedstatus->AdvancedSearch->SearchCondition = @$filter["v_Usedstatus"];
        $this->Usedstatus->AdvancedSearch->SearchValue2 = @$filter["y_Usedstatus"];
        $this->Usedstatus->AdvancedSearch->SearchOperator2 = @$filter["w_Usedstatus"];
        $this->Usedstatus->AdvancedSearch->save();

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

        // Field Lagency
        $this->Lagency->AdvancedSearch->SearchValue = @$filter["x_Lagency"];
        $this->Lagency->AdvancedSearch->SearchOperator = @$filter["z_Lagency"];
        $this->Lagency->AdvancedSearch->SearchCondition = @$filter["v_Lagency"];
        $this->Lagency->AdvancedSearch->SearchValue2 = @$filter["y_Lagency"];
        $this->Lagency->AdvancedSearch->SearchOperator2 = @$filter["w_Lagency"];
        $this->Lagency->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Agency, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReceivedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DonorNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BatchNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BloodGroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Height, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SkinColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EyeColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HairColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoOfVials, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Canister, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Lagency, $arKeywords, $type);
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
            $this->updateSort($this->DonorNo); // DonorNo
            $this->updateSort($this->BatchNo); // BatchNo
            $this->updateSort($this->BloodGroup); // BloodGroup
            $this->updateSort($this->Height); // Height
            $this->updateSort($this->SkinColor); // SkinColor
            $this->updateSort($this->EyeColor); // EyeColor
            $this->updateSort($this->HairColor); // HairColor
            $this->updateSort($this->NoOfVials); // NoOfVials
            $this->updateSort($this->Tank); // Tank
            $this->updateSort($this->Canister); // Canister
            $this->updateSort($this->Remarks); // Remarks
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
                $this->RIDNo->setSort("");
                $this->TidNo->setSort("");
                $this->Agency->setSort("");
                $this->ReceivedOn->setSort("");
                $this->ReceivedBy->setSort("");
                $this->DonorNo->setSort("");
                $this->BatchNo->setSort("");
                $this->BloodGroup->setSort("");
                $this->Height->setSort("");
                $this->SkinColor->setSort("");
                $this->EyeColor->setSort("");
                $this->HairColor->setSort("");
                $this->NoOfVials->setSort("");
                $this->Tank->setSort("");
                $this->Canister->setSort("");
                $this->Remarks->setSort("");
                $this->patientid->setSort("");
                $this->coupleid->setSort("");
                $this->Usedstatus->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->Lagency->setSort("");
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

        // "griddelete"
        if ($this->AllowAddDeleteRow) {
            $item = &$this->ListOptions->add("griddelete");
            $item->CssClass = "text-nowrap";
            $item->OnLeft = true;
            $item->Visible = false; // Default hidden
        }

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

        // Set up row action and key
        if ($CurrentForm && is_numeric($this->RowIndex) && $this->RowType != "view") {
            $CurrentForm->Index = $this->RowIndex;
            $actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
            $oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->OldKeyName);
            $blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
            if ($this->RowAction != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
            }
            $oldKey = $this->getKey(false); // Get from OldValue
            if ($oldKeyName != "" && $oldKey != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($oldKey) . "\">";
            }
            if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow()) {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
            }
        }

        // "delete"
        if ($this->AllowAddDeleteRow) {
            if ($this->isGridAdd() || $this->isGridEdit()) {
                $options = &$this->ListOptions;
                $options->UseButtonGroup = true; // Use button group for grid delete button
                $opt = $options["griddelete"];
                if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
                    $opt->Body = "&nbsp;";
                } else {
                    $opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
                }
            }
        }
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
        $item = &$option->add("gridadd");
        $item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridAddUrl)) . "\">" . $Language->phrase("GridAddLink") . "</a>";
        $item->Visible = $this->GridAddUrl != "" && $Security->canAdd();

        // Add grid edit
        $option = $options["addedit"];
        $item = &$option->add("gridedit");
        $item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridEditUrl)) . "\">" . $Language->phrase("GridEditLink") . "</a>";
        $item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_donorsemendetailslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_donorsemendetailslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
        if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
            $option = $options["action"];
            // Set up list action buttons
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_MULTIPLE) {
                    $item = &$option->add("custom_" . $listaction->Action);
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_donorsemendetailslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        } else { // Grid add/edit mode
            // Hide all options first
            foreach ($options as $option) {
                $option->hideAllOptions();
            }
            $pageUrl = $this->pageUrl();

            // Grid-Add
            if ($this->isGridAdd()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                // Add grid insert
                $item = &$option->add("gridinsert");
                $item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridInsertLink") . "</a>";
                // Add grid cancel
                $item = &$option->add("gridcancel");
                $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }

            // Grid-Edit
            if ($this->isGridEdit()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                    $item = &$option->add("gridsave");
                    $item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridSaveLink") . "</a>";
                    $item = &$option->add("gridcancel");
                    $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                    $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->RIDNo->CurrentValue = null;
        $this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->Agency->CurrentValue = null;
        $this->Agency->OldValue = $this->Agency->CurrentValue;
        $this->ReceivedOn->CurrentValue = null;
        $this->ReceivedOn->OldValue = $this->ReceivedOn->CurrentValue;
        $this->ReceivedBy->CurrentValue = null;
        $this->ReceivedBy->OldValue = $this->ReceivedBy->CurrentValue;
        $this->DonorNo->CurrentValue = null;
        $this->DonorNo->OldValue = $this->DonorNo->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->BloodGroup->CurrentValue = null;
        $this->BloodGroup->OldValue = $this->BloodGroup->CurrentValue;
        $this->Height->CurrentValue = null;
        $this->Height->OldValue = $this->Height->CurrentValue;
        $this->SkinColor->CurrentValue = null;
        $this->SkinColor->OldValue = $this->SkinColor->CurrentValue;
        $this->EyeColor->CurrentValue = null;
        $this->EyeColor->OldValue = $this->EyeColor->CurrentValue;
        $this->HairColor->CurrentValue = null;
        $this->HairColor->OldValue = $this->HairColor->CurrentValue;
        $this->NoOfVials->CurrentValue = null;
        $this->NoOfVials->OldValue = $this->NoOfVials->CurrentValue;
        $this->Tank->CurrentValue = null;
        $this->Tank->OldValue = $this->Tank->CurrentValue;
        $this->Canister->CurrentValue = null;
        $this->Canister->OldValue = $this->Canister->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->patientid->CurrentValue = null;
        $this->patientid->OldValue = $this->patientid->CurrentValue;
        $this->coupleid->CurrentValue = null;
        $this->coupleid->OldValue = $this->coupleid->CurrentValue;
        $this->Usedstatus->CurrentValue = null;
        $this->Usedstatus->OldValue = $this->Usedstatus->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->Lagency->CurrentValue = null;
        $this->Lagency->OldValue = $this->Lagency->CurrentValue;
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'DonorNo' first before field var 'x_DonorNo'
        $val = $CurrentForm->hasValue("DonorNo") ? $CurrentForm->getValue("DonorNo") : $CurrentForm->getValue("x_DonorNo");
        if (!$this->DonorNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DonorNo->Visible = false; // Disable update for API request
            } else {
                $this->DonorNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DonorNo")) {
            $this->DonorNo->setOldValue($CurrentForm->getValue("o_DonorNo"));
        }

        // Check field name 'BatchNo' first before field var 'x_BatchNo'
        $val = $CurrentForm->hasValue("BatchNo") ? $CurrentForm->getValue("BatchNo") : $CurrentForm->getValue("x_BatchNo");
        if (!$this->BatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BatchNo->Visible = false; // Disable update for API request
            } else {
                $this->BatchNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BatchNo")) {
            $this->BatchNo->setOldValue($CurrentForm->getValue("o_BatchNo"));
        }

        // Check field name 'BloodGroup' first before field var 'x_BloodGroup'
        $val = $CurrentForm->hasValue("BloodGroup") ? $CurrentForm->getValue("BloodGroup") : $CurrentForm->getValue("x_BloodGroup");
        if (!$this->BloodGroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BloodGroup->Visible = false; // Disable update for API request
            } else {
                $this->BloodGroup->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BloodGroup")) {
            $this->BloodGroup->setOldValue($CurrentForm->getValue("o_BloodGroup"));
        }

        // Check field name 'Height' first before field var 'x_Height'
        $val = $CurrentForm->hasValue("Height") ? $CurrentForm->getValue("Height") : $CurrentForm->getValue("x_Height");
        if (!$this->Height->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Height->Visible = false; // Disable update for API request
            } else {
                $this->Height->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Height")) {
            $this->Height->setOldValue($CurrentForm->getValue("o_Height"));
        }

        // Check field name 'SkinColor' first before field var 'x_SkinColor'
        $val = $CurrentForm->hasValue("SkinColor") ? $CurrentForm->getValue("SkinColor") : $CurrentForm->getValue("x_SkinColor");
        if (!$this->SkinColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SkinColor->Visible = false; // Disable update for API request
            } else {
                $this->SkinColor->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SkinColor")) {
            $this->SkinColor->setOldValue($CurrentForm->getValue("o_SkinColor"));
        }

        // Check field name 'EyeColor' first before field var 'x_EyeColor'
        $val = $CurrentForm->hasValue("EyeColor") ? $CurrentForm->getValue("EyeColor") : $CurrentForm->getValue("x_EyeColor");
        if (!$this->EyeColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EyeColor->Visible = false; // Disable update for API request
            } else {
                $this->EyeColor->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_EyeColor")) {
            $this->EyeColor->setOldValue($CurrentForm->getValue("o_EyeColor"));
        }

        // Check field name 'HairColor' first before field var 'x_HairColor'
        $val = $CurrentForm->hasValue("HairColor") ? $CurrentForm->getValue("HairColor") : $CurrentForm->getValue("x_HairColor");
        if (!$this->HairColor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HairColor->Visible = false; // Disable update for API request
            } else {
                $this->HairColor->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HairColor")) {
            $this->HairColor->setOldValue($CurrentForm->getValue("o_HairColor"));
        }

        // Check field name 'NoOfVials' first before field var 'x_NoOfVials'
        $val = $CurrentForm->hasValue("NoOfVials") ? $CurrentForm->getValue("NoOfVials") : $CurrentForm->getValue("x_NoOfVials");
        if (!$this->NoOfVials->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfVials->Visible = false; // Disable update for API request
            } else {
                $this->NoOfVials->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NoOfVials")) {
            $this->NoOfVials->setOldValue($CurrentForm->getValue("o_NoOfVials"));
        }

        // Check field name 'Tank' first before field var 'x_Tank'
        $val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
        if (!$this->Tank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tank->Visible = false; // Disable update for API request
            } else {
                $this->Tank->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Tank")) {
            $this->Tank->setOldValue($CurrentForm->getValue("o_Tank"));
        }

        // Check field name 'Canister' first before field var 'x_Canister'
        $val = $CurrentForm->hasValue("Canister") ? $CurrentForm->getValue("Canister") : $CurrentForm->getValue("x_Canister");
        if (!$this->Canister->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Canister->Visible = false; // Disable update for API request
            } else {
                $this->Canister->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Canister")) {
            $this->Canister->setOldValue($CurrentForm->getValue("o_Canister"));
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Remarks")) {
            $this->Remarks->setOldValue($CurrentForm->getValue("o_Remarks"));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->DonorNo->CurrentValue = $this->DonorNo->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->BloodGroup->CurrentValue = $this->BloodGroup->FormValue;
        $this->Height->CurrentValue = $this->Height->FormValue;
        $this->SkinColor->CurrentValue = $this->SkinColor->FormValue;
        $this->EyeColor->CurrentValue = $this->EyeColor->FormValue;
        $this->HairColor->CurrentValue = $this->HairColor->FormValue;
        $this->NoOfVials->CurrentValue = $this->NoOfVials->FormValue;
        $this->Tank->CurrentValue = $this->Tank->FormValue;
        $this->Canister->CurrentValue = $this->Canister->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
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
            if (!$this->EventCancelled) {
                $this->HashValue = $this->getRowHash($row); // Get hash value for record
            }
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Agency->setDbValue($row['Agency']);
        $this->ReceivedOn->setDbValue($row['ReceivedOn']);
        $this->ReceivedBy->setDbValue($row['ReceivedBy']);
        $this->DonorNo->setDbValue($row['DonorNo']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->BloodGroup->setDbValue($row['BloodGroup']);
        $this->Height->setDbValue($row['Height']);
        $this->SkinColor->setDbValue($row['SkinColor']);
        $this->EyeColor->setDbValue($row['EyeColor']);
        $this->HairColor->setDbValue($row['HairColor']);
        $this->NoOfVials->setDbValue($row['NoOfVials']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Canister->setDbValue($row['Canister']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->patientid->setDbValue($row['patientid']);
        $this->coupleid->setDbValue($row['coupleid']);
        $this->Usedstatus->setDbValue($row['Usedstatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Lagency->setDbValue($row['Lagency']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNo'] = $this->RIDNo->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['Agency'] = $this->Agency->CurrentValue;
        $row['ReceivedOn'] = $this->ReceivedOn->CurrentValue;
        $row['ReceivedBy'] = $this->ReceivedBy->CurrentValue;
        $row['DonorNo'] = $this->DonorNo->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['BloodGroup'] = $this->BloodGroup->CurrentValue;
        $row['Height'] = $this->Height->CurrentValue;
        $row['SkinColor'] = $this->SkinColor->CurrentValue;
        $row['EyeColor'] = $this->EyeColor->CurrentValue;
        $row['HairColor'] = $this->HairColor->CurrentValue;
        $row['NoOfVials'] = $this->NoOfVials->CurrentValue;
        $row['Tank'] = $this->Tank->CurrentValue;
        $row['Canister'] = $this->Canister->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['patientid'] = $this->patientid->CurrentValue;
        $row['coupleid'] = $this->coupleid->CurrentValue;
        $row['Usedstatus'] = $this->Usedstatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['Lagency'] = $this->Lagency->CurrentValue;
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

        // RIDNo

        // TidNo

        // Agency

        // ReceivedOn

        // ReceivedBy

        // DonorNo

        // BatchNo

        // BloodGroup

        // Height

        // SkinColor

        // EyeColor

        // HairColor

        // NoOfVials

        // Tank

        // Canister

        // Remarks

        // patientid

        // coupleid

        // Usedstatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Lagency
        if ($this->RowType == ROWTYPE_VIEW) {
            // DonorNo
            $this->DonorNo->ViewValue = $this->DonorNo->CurrentValue;
            $this->DonorNo->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // BloodGroup
            $curVal = trim(strval($this->BloodGroup->CurrentValue));
            if ($curVal != "") {
                $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
                if ($this->BloodGroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->BloodGroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BloodGroup->Lookup->renderViewRow($rswrk[0]);
                        $this->BloodGroup->ViewValue = $this->BloodGroup->displayValue($arwrk);
                    } else {
                        $this->BloodGroup->ViewValue = $this->BloodGroup->CurrentValue;
                    }
                }
            } else {
                $this->BloodGroup->ViewValue = null;
            }
            $this->BloodGroup->ViewCustomAttributes = "";

            // Height
            $this->Height->ViewValue = $this->Height->CurrentValue;
            $this->Height->ViewCustomAttributes = "";

            // SkinColor
            if (strval($this->SkinColor->CurrentValue) != "") {
                $this->SkinColor->ViewValue = $this->SkinColor->optionCaption($this->SkinColor->CurrentValue);
            } else {
                $this->SkinColor->ViewValue = null;
            }
            $this->SkinColor->ViewCustomAttributes = "";

            // EyeColor
            if (strval($this->EyeColor->CurrentValue) != "") {
                $this->EyeColor->ViewValue = $this->EyeColor->optionCaption($this->EyeColor->CurrentValue);
            } else {
                $this->EyeColor->ViewValue = null;
            }
            $this->EyeColor->ViewCustomAttributes = "";

            // HairColor
            if (strval($this->HairColor->CurrentValue) != "") {
                $this->HairColor->ViewValue = $this->HairColor->optionCaption($this->HairColor->CurrentValue);
            } else {
                $this->HairColor->ViewValue = null;
            }
            $this->HairColor->ViewCustomAttributes = "";

            // NoOfVials
            $this->NoOfVials->ViewValue = $this->NoOfVials->CurrentValue;
            $this->NoOfVials->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Canister
            $this->Canister->ViewValue = $this->Canister->CurrentValue;
            $this->Canister->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // DonorNo
            $this->DonorNo->LinkCustomAttributes = "";
            $this->DonorNo->HrefValue = "";
            $this->DonorNo->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";

            // BloodGroup
            $this->BloodGroup->LinkCustomAttributes = "";
            $this->BloodGroup->HrefValue = "";
            $this->BloodGroup->TooltipValue = "";

            // Height
            $this->Height->LinkCustomAttributes = "";
            $this->Height->HrefValue = "";
            $this->Height->TooltipValue = "";

            // SkinColor
            $this->SkinColor->LinkCustomAttributes = "";
            $this->SkinColor->HrefValue = "";
            $this->SkinColor->TooltipValue = "";

            // EyeColor
            $this->EyeColor->LinkCustomAttributes = "";
            $this->EyeColor->HrefValue = "";
            $this->EyeColor->TooltipValue = "";

            // HairColor
            $this->HairColor->LinkCustomAttributes = "";
            $this->HairColor->HrefValue = "";
            $this->HairColor->TooltipValue = "";

            // NoOfVials
            $this->NoOfVials->LinkCustomAttributes = "";
            $this->NoOfVials->HrefValue = "";
            $this->NoOfVials->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";
            $this->Canister->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // DonorNo
            $this->DonorNo->EditAttrs["class"] = "form-control";
            $this->DonorNo->EditCustomAttributes = "";
            if (!$this->DonorNo->Raw) {
                $this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
            }
            $this->DonorNo->EditValue = HtmlEncode($this->DonorNo->CurrentValue);
            $this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // BloodGroup
            $this->BloodGroup->EditAttrs["class"] = "form-control";
            $this->BloodGroup->EditCustomAttributes = "";
            $curVal = trim(strval($this->BloodGroup->CurrentValue));
            if ($curVal != "") {
                $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
            } else {
                $this->BloodGroup->ViewValue = $this->BloodGroup->Lookup !== null && is_array($this->BloodGroup->Lookup->Options) ? $curVal : null;
            }
            if ($this->BloodGroup->ViewValue !== null) { // Load from cache
                $this->BloodGroup->EditValue = array_values($this->BloodGroup->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`BloodGroup`" . SearchString("=", $this->BloodGroup->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->BloodGroup->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->BloodGroup->EditValue = $arwrk;
            }
            $this->BloodGroup->PlaceHolder = RemoveHtml($this->BloodGroup->caption());

            // Height
            $this->Height->EditAttrs["class"] = "form-control";
            $this->Height->EditCustomAttributes = "";
            if (!$this->Height->Raw) {
                $this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
            }
            $this->Height->EditValue = HtmlEncode($this->Height->CurrentValue);
            $this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

            // SkinColor
            $this->SkinColor->EditAttrs["class"] = "form-control";
            $this->SkinColor->EditCustomAttributes = "";
            $this->SkinColor->EditValue = $this->SkinColor->options(true);
            $this->SkinColor->PlaceHolder = RemoveHtml($this->SkinColor->caption());

            // EyeColor
            $this->EyeColor->EditAttrs["class"] = "form-control";
            $this->EyeColor->EditCustomAttributes = "";
            $this->EyeColor->EditValue = $this->EyeColor->options(true);
            $this->EyeColor->PlaceHolder = RemoveHtml($this->EyeColor->caption());

            // HairColor
            $this->HairColor->EditAttrs["class"] = "form-control";
            $this->HairColor->EditCustomAttributes = "";
            $this->HairColor->EditValue = $this->HairColor->options(true);
            $this->HairColor->PlaceHolder = RemoveHtml($this->HairColor->caption());

            // NoOfVials
            $this->NoOfVials->EditAttrs["class"] = "form-control";
            $this->NoOfVials->EditCustomAttributes = "";
            if (!$this->NoOfVials->Raw) {
                $this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
            }
            $this->NoOfVials->EditValue = HtmlEncode($this->NoOfVials->CurrentValue);
            $this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Canister
            $this->Canister->EditAttrs["class"] = "form-control";
            $this->Canister->EditCustomAttributes = "";
            if (!$this->Canister->Raw) {
                $this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
            }
            $this->Canister->EditValue = HtmlEncode($this->Canister->CurrentValue);
            $this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // Add refer script

            // DonorNo
            $this->DonorNo->LinkCustomAttributes = "";
            $this->DonorNo->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // BloodGroup
            $this->BloodGroup->LinkCustomAttributes = "";
            $this->BloodGroup->HrefValue = "";

            // Height
            $this->Height->LinkCustomAttributes = "";
            $this->Height->HrefValue = "";

            // SkinColor
            $this->SkinColor->LinkCustomAttributes = "";
            $this->SkinColor->HrefValue = "";

            // EyeColor
            $this->EyeColor->LinkCustomAttributes = "";
            $this->EyeColor->HrefValue = "";

            // HairColor
            $this->HairColor->LinkCustomAttributes = "";
            $this->HairColor->HrefValue = "";

            // NoOfVials
            $this->NoOfVials->LinkCustomAttributes = "";
            $this->NoOfVials->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // DonorNo
            $this->DonorNo->EditAttrs["class"] = "form-control";
            $this->DonorNo->EditCustomAttributes = "";
            if (!$this->DonorNo->Raw) {
                $this->DonorNo->CurrentValue = HtmlDecode($this->DonorNo->CurrentValue);
            }
            $this->DonorNo->EditValue = HtmlEncode($this->DonorNo->CurrentValue);
            $this->DonorNo->PlaceHolder = RemoveHtml($this->DonorNo->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // BloodGroup
            $this->BloodGroup->EditAttrs["class"] = "form-control";
            $this->BloodGroup->EditCustomAttributes = "";
            $curVal = trim(strval($this->BloodGroup->CurrentValue));
            if ($curVal != "") {
                $this->BloodGroup->ViewValue = $this->BloodGroup->lookupCacheOption($curVal);
            } else {
                $this->BloodGroup->ViewValue = $this->BloodGroup->Lookup !== null && is_array($this->BloodGroup->Lookup->Options) ? $curVal : null;
            }
            if ($this->BloodGroup->ViewValue !== null) { // Load from cache
                $this->BloodGroup->EditValue = array_values($this->BloodGroup->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`BloodGroup`" . SearchString("=", $this->BloodGroup->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->BloodGroup->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->BloodGroup->EditValue = $arwrk;
            }
            $this->BloodGroup->PlaceHolder = RemoveHtml($this->BloodGroup->caption());

            // Height
            $this->Height->EditAttrs["class"] = "form-control";
            $this->Height->EditCustomAttributes = "";
            if (!$this->Height->Raw) {
                $this->Height->CurrentValue = HtmlDecode($this->Height->CurrentValue);
            }
            $this->Height->EditValue = HtmlEncode($this->Height->CurrentValue);
            $this->Height->PlaceHolder = RemoveHtml($this->Height->caption());

            // SkinColor
            $this->SkinColor->EditAttrs["class"] = "form-control";
            $this->SkinColor->EditCustomAttributes = "";
            $this->SkinColor->EditValue = $this->SkinColor->options(true);
            $this->SkinColor->PlaceHolder = RemoveHtml($this->SkinColor->caption());

            // EyeColor
            $this->EyeColor->EditAttrs["class"] = "form-control";
            $this->EyeColor->EditCustomAttributes = "";
            $this->EyeColor->EditValue = $this->EyeColor->options(true);
            $this->EyeColor->PlaceHolder = RemoveHtml($this->EyeColor->caption());

            // HairColor
            $this->HairColor->EditAttrs["class"] = "form-control";
            $this->HairColor->EditCustomAttributes = "";
            $this->HairColor->EditValue = $this->HairColor->options(true);
            $this->HairColor->PlaceHolder = RemoveHtml($this->HairColor->caption());

            // NoOfVials
            $this->NoOfVials->EditAttrs["class"] = "form-control";
            $this->NoOfVials->EditCustomAttributes = "";
            if (!$this->NoOfVials->Raw) {
                $this->NoOfVials->CurrentValue = HtmlDecode($this->NoOfVials->CurrentValue);
            }
            $this->NoOfVials->EditValue = HtmlEncode($this->NoOfVials->CurrentValue);
            $this->NoOfVials->PlaceHolder = RemoveHtml($this->NoOfVials->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Canister
            $this->Canister->EditAttrs["class"] = "form-control";
            $this->Canister->EditCustomAttributes = "";
            if (!$this->Canister->Raw) {
                $this->Canister->CurrentValue = HtmlDecode($this->Canister->CurrentValue);
            }
            $this->Canister->EditValue = HtmlEncode($this->Canister->CurrentValue);
            $this->Canister->PlaceHolder = RemoveHtml($this->Canister->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // Edit refer script

            // DonorNo
            $this->DonorNo->LinkCustomAttributes = "";
            $this->DonorNo->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // BloodGroup
            $this->BloodGroup->LinkCustomAttributes = "";
            $this->BloodGroup->HrefValue = "";

            // Height
            $this->Height->LinkCustomAttributes = "";
            $this->Height->HrefValue = "";

            // SkinColor
            $this->SkinColor->LinkCustomAttributes = "";
            $this->SkinColor->HrefValue = "";

            // EyeColor
            $this->EyeColor->LinkCustomAttributes = "";
            $this->EyeColor->HrefValue = "";

            // HairColor
            $this->HairColor->LinkCustomAttributes = "";
            $this->HairColor->HrefValue = "";

            // NoOfVials
            $this->NoOfVials->LinkCustomAttributes = "";
            $this->NoOfVials->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Canister
            $this->Canister->LinkCustomAttributes = "";
            $this->Canister->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->DonorNo->Required) {
            if (!$this->DonorNo->IsDetailKey && EmptyValue($this->DonorNo->FormValue)) {
                $this->DonorNo->addErrorMessage(str_replace("%s", $this->DonorNo->caption(), $this->DonorNo->RequiredErrorMessage));
            }
        }
        if ($this->BatchNo->Required) {
            if (!$this->BatchNo->IsDetailKey && EmptyValue($this->BatchNo->FormValue)) {
                $this->BatchNo->addErrorMessage(str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
            }
        }
        if ($this->BloodGroup->Required) {
            if (!$this->BloodGroup->IsDetailKey && EmptyValue($this->BloodGroup->FormValue)) {
                $this->BloodGroup->addErrorMessage(str_replace("%s", $this->BloodGroup->caption(), $this->BloodGroup->RequiredErrorMessage));
            }
        }
        if ($this->Height->Required) {
            if (!$this->Height->IsDetailKey && EmptyValue($this->Height->FormValue)) {
                $this->Height->addErrorMessage(str_replace("%s", $this->Height->caption(), $this->Height->RequiredErrorMessage));
            }
        }
        if ($this->SkinColor->Required) {
            if (!$this->SkinColor->IsDetailKey && EmptyValue($this->SkinColor->FormValue)) {
                $this->SkinColor->addErrorMessage(str_replace("%s", $this->SkinColor->caption(), $this->SkinColor->RequiredErrorMessage));
            }
        }
        if ($this->EyeColor->Required) {
            if (!$this->EyeColor->IsDetailKey && EmptyValue($this->EyeColor->FormValue)) {
                $this->EyeColor->addErrorMessage(str_replace("%s", $this->EyeColor->caption(), $this->EyeColor->RequiredErrorMessage));
            }
        }
        if ($this->HairColor->Required) {
            if (!$this->HairColor->IsDetailKey && EmptyValue($this->HairColor->FormValue)) {
                $this->HairColor->addErrorMessage(str_replace("%s", $this->HairColor->caption(), $this->HairColor->RequiredErrorMessage));
            }
        }
        if ($this->NoOfVials->Required) {
            if (!$this->NoOfVials->IsDetailKey && EmptyValue($this->NoOfVials->FormValue)) {
                $this->NoOfVials->addErrorMessage(str_replace("%s", $this->NoOfVials->caption(), $this->NoOfVials->RequiredErrorMessage));
            }
        }
        if ($this->Tank->Required) {
            if (!$this->Tank->IsDetailKey && EmptyValue($this->Tank->FormValue)) {
                $this->Tank->addErrorMessage(str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
            }
        }
        if ($this->Canister->Required) {
            if (!$this->Canister->IsDetailKey && EmptyValue($this->Canister->FormValue)) {
                $this->Canister->addErrorMessage(str_replace("%s", $this->Canister->caption(), $this->Canister->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
    }

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // DonorNo
            $this->DonorNo->setDbValueDef($rsnew, $this->DonorNo->CurrentValue, null, $this->DonorNo->ReadOnly);

            // BatchNo
            $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, $this->BatchNo->ReadOnly);

            // BloodGroup
            $this->BloodGroup->setDbValueDef($rsnew, $this->BloodGroup->CurrentValue, null, $this->BloodGroup->ReadOnly);

            // Height
            $this->Height->setDbValueDef($rsnew, $this->Height->CurrentValue, null, $this->Height->ReadOnly);

            // SkinColor
            $this->SkinColor->setDbValueDef($rsnew, $this->SkinColor->CurrentValue, null, $this->SkinColor->ReadOnly);

            // EyeColor
            $this->EyeColor->setDbValueDef($rsnew, $this->EyeColor->CurrentValue, null, $this->EyeColor->ReadOnly);

            // HairColor
            $this->HairColor->setDbValueDef($rsnew, $this->HairColor->CurrentValue, null, $this->HairColor->ReadOnly);

            // NoOfVials
            $this->NoOfVials->setDbValueDef($rsnew, $this->NoOfVials->CurrentValue, null, $this->NoOfVials->ReadOnly);

            // Tank
            $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, $this->Tank->ReadOnly);

            // Canister
            $this->Canister->setDbValueDef($rsnew, $this->Canister->CurrentValue, null, $this->Canister->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Load row hash
    protected function loadRowHash()
    {
        $filter = $this->getRecordFilter();

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $row = $conn->fetchAssoc($sql);
        $this->HashValue = $row ? $this->getRowHash($row) : ""; // Get hash value for record
    }

    // Get Row Hash
    public function getRowHash(&$rs)
    {
        if (!$rs) {
            return "";
        }
        $row = ($rs instanceof Recordset) ? $rs->fields : $rs;
        $hash = "";
        $hash .= GetFieldHash($row['DonorNo']); // DonorNo
        $hash .= GetFieldHash($row['BatchNo']); // BatchNo
        $hash .= GetFieldHash($row['BloodGroup']); // BloodGroup
        $hash .= GetFieldHash($row['Height']); // Height
        $hash .= GetFieldHash($row['SkinColor']); // SkinColor
        $hash .= GetFieldHash($row['EyeColor']); // EyeColor
        $hash .= GetFieldHash($row['HairColor']); // HairColor
        $hash .= GetFieldHash($row['NoOfVials']); // NoOfVials
        $hash .= GetFieldHash($row['Tank']); // Tank
        $hash .= GetFieldHash($row['Canister']); // Canister
        $hash .= GetFieldHash($row['Remarks']); // Remarks
        return md5($hash);
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // DonorNo
        $this->DonorNo->setDbValueDef($rsnew, $this->DonorNo->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // BloodGroup
        $this->BloodGroup->setDbValueDef($rsnew, $this->BloodGroup->CurrentValue, null, false);

        // Height
        $this->Height->setDbValueDef($rsnew, $this->Height->CurrentValue, null, false);

        // SkinColor
        $this->SkinColor->setDbValueDef($rsnew, $this->SkinColor->CurrentValue, null, false);

        // EyeColor
        $this->EyeColor->setDbValueDef($rsnew, $this->EyeColor->CurrentValue, null, false);

        // HairColor
        $this->HairColor->setDbValueDef($rsnew, $this->HairColor->CurrentValue, null, false);

        // NoOfVials
        $this->NoOfVials->setDbValueDef($rsnew, $this->NoOfVials->CurrentValue, null, false);

        // Tank
        $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, false);

        // Canister
        $this->Canister->setDbValueDef($rsnew, $this->Canister->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        $addRow = false;
        if ($insertRow) {
            try {
                $addRow = $this->insert($rsnew);
            } catch (\Exception $e) {
                $this->setFailureMessage($e->getMessage());
            }
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_donorsemendetailslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_donorsemendetailslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_donorsemendetailslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_donorsemendetails" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_donorsemendetails\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_donorsemendetailslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_donorsemendetailslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_BloodGroup":
                    break;
                case "x_SkinColor":
                    break;
                case "x_EyeColor":
                    break;
                case "x_HairColor":
                    break;
                case "x_Lagency":
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
