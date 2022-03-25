<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBatchmasList extends PharmacyBatchmas
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_batchmas';

    // Page object name
    public $PageObjName = "PharmacyBatchmasList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpharmacy_batchmaslist";
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

        // Table object (pharmacy_batchmas)
        if (!isset($GLOBALS["pharmacy_batchmas"]) || get_class($GLOBALS["pharmacy_batchmas"]) == PROJECT_NAMESPACE . "pharmacy_batchmas") {
            $GLOBALS["pharmacy_batchmas"] = &$this;
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
        $this->AddUrl = "PharmacyBatchmasAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PharmacyBatchmasDelete";
        $this->MultiUpdateUrl = "PharmacyBatchmasUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_batchmas');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_batchmaslistsrch";

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
                $doc = new $class(Container("pharmacy_batchmas"));
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
        $this->PRC->setVisibility();
        $this->PrName->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->BATCH->Visible = false;
        $this->MFRCODE->setVisibility();
        $this->EXPDT->setVisibility();
        $this->PRCODE->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->FRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->MRP->setVisibility();
        $this->UR->setVisibility();
        $this->PC->Visible = false;
        $this->OLDRT->Visible = false;
        $this->TEMPMRQ->Visible = false;
        $this->TAXP->Visible = false;
        $this->OLDRATE->Visible = false;
        $this->NEWRATE->Visible = false;
        $this->OTEMPMRA->Visible = false;
        $this->ACTIVESTATUS->Visible = false;
        $this->id->Visible = false;
        $this->PSGST->Visible = false;
        $this->PCGST->Visible = false;
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->RT->setVisibility();
        $this->BRCODE->setVisibility();
        $this->HospID->setVisibility();
        $this->UM->setVisibility();
        $this->GENNAME->setVisibility();
        $this->BILLDATE->setVisibility();
        $this->PUnit->setVisibility();
        $this->SUnit->setVisibility();
        $this->PurValue->setVisibility();
        $this->PurRate->setVisibility();
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
        $this->setupLookupOptions($this->PrName);
        $this->setupLookupOptions($this->BRCODE);

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

    // Exit inline mode
    protected function clearInlineMode()
    {
        $this->OQ->FormValue = ""; // Clear form value
        $this->RQ->FormValue = ""; // Clear form value
        $this->FRQ->FormValue = ""; // Clear form value
        $this->IQ->FormValue = ""; // Clear form value
        $this->MRQ->FormValue = ""; // Clear form value
        $this->MRP->FormValue = ""; // Clear form value
        $this->UR->FormValue = ""; // Clear form value
        $this->SSGST->FormValue = ""; // Clear form value
        $this->SCGST->FormValue = ""; // Clear form value
        $this->RT->FormValue = ""; // Clear form value
        $this->PurValue->FormValue = ""; // Clear form value
        $this->PurRate->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue != $this->PrName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue != $this->BATCHNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MFRCODE") && $CurrentForm->hasValue("o_MFRCODE") && $this->MFRCODE->CurrentValue != $this->MFRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue != $this->EXPDT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PRCODE") && $CurrentForm->hasValue("o_PRCODE") && $this->PRCODE->CurrentValue != $this->PRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_OQ") && $CurrentForm->hasValue("o_OQ") && $this->OQ->CurrentValue != $this->OQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RQ") && $CurrentForm->hasValue("o_RQ") && $this->RQ->CurrentValue != $this->RQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_FRQ") && $CurrentForm->hasValue("o_FRQ") && $this->FRQ->CurrentValue != $this->FRQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue != $this->IQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRQ") && $CurrentForm->hasValue("o_MRQ") && $this->MRQ->CurrentValue != $this->MRQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRP") && $CurrentForm->hasValue("o_MRP") && $this->MRP->CurrentValue != $this->MRP->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_UR") && $CurrentForm->hasValue("o_UR") && $this->UR->CurrentValue != $this->UR->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SSGST") && $CurrentForm->hasValue("o_SSGST") && $this->SSGST->CurrentValue != $this->SSGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SCGST") && $CurrentForm->hasValue("o_SCGST") && $this->SCGST->CurrentValue != $this->SCGST->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue != $this->RT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue != $this->BRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HospID") && $CurrentForm->hasValue("o_HospID") && $this->HospID->CurrentValue != $this->HospID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_UM") && $CurrentForm->hasValue("o_UM") && $this->UM->CurrentValue != $this->UM->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GENNAME") && $CurrentForm->hasValue("o_GENNAME") && $this->GENNAME->CurrentValue != $this->GENNAME->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BILLDATE") && $CurrentForm->hasValue("o_BILLDATE") && $this->BILLDATE->CurrentValue != $this->BILLDATE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PUnit") && $CurrentForm->hasValue("o_PUnit") && $this->PUnit->CurrentValue != $this->PUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SUnit") && $CurrentForm->hasValue("o_SUnit") && $this->SUnit->CurrentValue != $this->SUnit->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PurValue") && $CurrentForm->hasValue("o_PurValue") && $this->PurValue->CurrentValue != $this->PurValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PurRate") && $CurrentForm->hasValue("o_PurRate") && $this->PurRate->CurrentValue != $this->PurRate->OldValue) {
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
        $this->PRC->clearErrorMessage();
        $this->PrName->clearErrorMessage();
        $this->BATCHNO->clearErrorMessage();
        $this->MFRCODE->clearErrorMessage();
        $this->EXPDT->clearErrorMessage();
        $this->PRCODE->clearErrorMessage();
        $this->OQ->clearErrorMessage();
        $this->RQ->clearErrorMessage();
        $this->FRQ->clearErrorMessage();
        $this->IQ->clearErrorMessage();
        $this->MRQ->clearErrorMessage();
        $this->MRP->clearErrorMessage();
        $this->UR->clearErrorMessage();
        $this->SSGST->clearErrorMessage();
        $this->SCGST->clearErrorMessage();
        $this->RT->clearErrorMessage();
        $this->BRCODE->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->UM->clearErrorMessage();
        $this->GENNAME->clearErrorMessage();
        $this->BILLDATE->clearErrorMessage();
        $this->PUnit->clearErrorMessage();
        $this->SUnit->clearErrorMessage();
        $this->PurValue->clearErrorMessage();
        $this->PurRate->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_batchmaslistsrch");
        }
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->PrName->AdvancedSearch->toJson(), ","); // Field PrName
        $filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
        $filterList = Concat($filterList, $this->BATCH->AdvancedSearch->toJson(), ","); // Field BATCH
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
        $filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
        $filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
        $filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
        $filterList = Concat($filterList, $this->FRQ->AdvancedSearch->toJson(), ","); // Field FRQ
        $filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
        $filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->OLDRT->AdvancedSearch->toJson(), ","); // Field OLDRT
        $filterList = Concat($filterList, $this->TEMPMRQ->AdvancedSearch->toJson(), ","); // Field TEMPMRQ
        $filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
        $filterList = Concat($filterList, $this->OLDRATE->AdvancedSearch->toJson(), ","); // Field OLDRATE
        $filterList = Concat($filterList, $this->NEWRATE->AdvancedSearch->toJson(), ","); // Field NEWRATE
        $filterList = Concat($filterList, $this->OTEMPMRA->AdvancedSearch->toJson(), ","); // Field OTEMPMRA
        $filterList = Concat($filterList, $this->ACTIVESTATUS->AdvancedSearch->toJson(), ","); // Field ACTIVESTATUS
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
        $filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
        $filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
        $filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->UM->AdvancedSearch->toJson(), ","); // Field UM
        $filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
        $filterList = Concat($filterList, $this->BILLDATE->AdvancedSearch->toJson(), ","); // Field BILLDATE
        $filterList = Concat($filterList, $this->PUnit->AdvancedSearch->toJson(), ","); // Field PUnit
        $filterList = Concat($filterList, $this->SUnit->AdvancedSearch->toJson(), ","); // Field SUnit
        $filterList = Concat($filterList, $this->PurValue->AdvancedSearch->toJson(), ","); // Field PurValue
        $filterList = Concat($filterList, $this->PurRate->AdvancedSearch->toJson(), ","); // Field PurRate
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_batchmaslistsrch", $filters);
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

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

        // Field PrName
        $this->PrName->AdvancedSearch->SearchValue = @$filter["x_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator = @$filter["z_PrName"];
        $this->PrName->AdvancedSearch->SearchCondition = @$filter["v_PrName"];
        $this->PrName->AdvancedSearch->SearchValue2 = @$filter["y_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator2 = @$filter["w_PrName"];
        $this->PrName->AdvancedSearch->save();

        // Field BATCHNO
        $this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->save();

        // Field BATCH
        $this->BATCH->AdvancedSearch->SearchValue = @$filter["x_BATCH"];
        $this->BATCH->AdvancedSearch->SearchOperator = @$filter["z_BATCH"];
        $this->BATCH->AdvancedSearch->SearchCondition = @$filter["v_BATCH"];
        $this->BATCH->AdvancedSearch->SearchValue2 = @$filter["y_BATCH"];
        $this->BATCH->AdvancedSearch->SearchOperator2 = @$filter["w_BATCH"];
        $this->BATCH->AdvancedSearch->save();

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

        // Field EXPDT
        $this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
        $this->EXPDT->AdvancedSearch->save();

        // Field PRCODE
        $this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
        $this->PRCODE->AdvancedSearch->save();

        // Field OQ
        $this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
        $this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
        $this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
        $this->OQ->AdvancedSearch->save();

        // Field RQ
        $this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
        $this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
        $this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
        $this->RQ->AdvancedSearch->save();

        // Field FRQ
        $this->FRQ->AdvancedSearch->SearchValue = @$filter["x_FRQ"];
        $this->FRQ->AdvancedSearch->SearchOperator = @$filter["z_FRQ"];
        $this->FRQ->AdvancedSearch->SearchCondition = @$filter["v_FRQ"];
        $this->FRQ->AdvancedSearch->SearchValue2 = @$filter["y_FRQ"];
        $this->FRQ->AdvancedSearch->SearchOperator2 = @$filter["w_FRQ"];
        $this->FRQ->AdvancedSearch->save();

        // Field IQ
        $this->IQ->AdvancedSearch->SearchValue = @$filter["x_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator = @$filter["z_IQ"];
        $this->IQ->AdvancedSearch->SearchCondition = @$filter["v_IQ"];
        $this->IQ->AdvancedSearch->SearchValue2 = @$filter["y_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator2 = @$filter["w_IQ"];
        $this->IQ->AdvancedSearch->save();

        // Field MRQ
        $this->MRQ->AdvancedSearch->SearchValue = @$filter["x_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator = @$filter["z_MRQ"];
        $this->MRQ->AdvancedSearch->SearchCondition = @$filter["v_MRQ"];
        $this->MRQ->AdvancedSearch->SearchValue2 = @$filter["y_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator2 = @$filter["w_MRQ"];
        $this->MRQ->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field UR
        $this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
        $this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
        $this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
        $this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
        $this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
        $this->UR->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field OLDRT
        $this->OLDRT->AdvancedSearch->SearchValue = @$filter["x_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchOperator = @$filter["z_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchCondition = @$filter["v_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchValue2 = @$filter["y_OLDRT"];
        $this->OLDRT->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRT"];
        $this->OLDRT->AdvancedSearch->save();

        // Field TEMPMRQ
        $this->TEMPMRQ->AdvancedSearch->SearchValue = @$filter["x_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchOperator = @$filter["z_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchCondition = @$filter["v_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchValue2 = @$filter["y_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPMRQ"];
        $this->TEMPMRQ->AdvancedSearch->save();

        // Field TAXP
        $this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
        $this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
        $this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
        $this->TAXP->AdvancedSearch->save();

        // Field OLDRATE
        $this->OLDRATE->AdvancedSearch->SearchValue = @$filter["x_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchOperator = @$filter["z_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchCondition = @$filter["v_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchValue2 = @$filter["y_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRATE"];
        $this->OLDRATE->AdvancedSearch->save();

        // Field NEWRATE
        $this->NEWRATE->AdvancedSearch->SearchValue = @$filter["x_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchOperator = @$filter["z_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchCondition = @$filter["v_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchValue2 = @$filter["y_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->SearchOperator2 = @$filter["w_NEWRATE"];
        $this->NEWRATE->AdvancedSearch->save();

        // Field OTEMPMRA
        $this->OTEMPMRA->AdvancedSearch->SearchValue = @$filter["x_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchOperator = @$filter["z_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchCondition = @$filter["v_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchValue2 = @$filter["y_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->SearchOperator2 = @$filter["w_OTEMPMRA"];
        $this->OTEMPMRA->AdvancedSearch->save();

        // Field ACTIVESTATUS
        $this->ACTIVESTATUS->AdvancedSearch->SearchValue = @$filter["x_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchOperator = @$filter["z_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchCondition = @$filter["v_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchValue2 = @$filter["y_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->SearchOperator2 = @$filter["w_ACTIVESTATUS"];
        $this->ACTIVESTATUS->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field PSGST
        $this->PSGST->AdvancedSearch->SearchValue = @$filter["x_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator = @$filter["z_PSGST"];
        $this->PSGST->AdvancedSearch->SearchCondition = @$filter["v_PSGST"];
        $this->PSGST->AdvancedSearch->SearchValue2 = @$filter["y_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator2 = @$filter["w_PSGST"];
        $this->PSGST->AdvancedSearch->save();

        // Field PCGST
        $this->PCGST->AdvancedSearch->SearchValue = @$filter["x_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator = @$filter["z_PCGST"];
        $this->PCGST->AdvancedSearch->SearchCondition = @$filter["v_PCGST"];
        $this->PCGST->AdvancedSearch->SearchValue2 = @$filter["y_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator2 = @$filter["w_PCGST"];
        $this->PCGST->AdvancedSearch->save();

        // Field SSGST
        $this->SSGST->AdvancedSearch->SearchValue = @$filter["x_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator = @$filter["z_SSGST"];
        $this->SSGST->AdvancedSearch->SearchCondition = @$filter["v_SSGST"];
        $this->SSGST->AdvancedSearch->SearchValue2 = @$filter["y_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator2 = @$filter["w_SSGST"];
        $this->SSGST->AdvancedSearch->save();

        // Field SCGST
        $this->SCGST->AdvancedSearch->SearchValue = @$filter["x_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator = @$filter["z_SCGST"];
        $this->SCGST->AdvancedSearch->SearchCondition = @$filter["v_SCGST"];
        $this->SCGST->AdvancedSearch->SearchValue2 = @$filter["y_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator2 = @$filter["w_SCGST"];
        $this->SCGST->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field UM
        $this->UM->AdvancedSearch->SearchValue = @$filter["x_UM"];
        $this->UM->AdvancedSearch->SearchOperator = @$filter["z_UM"];
        $this->UM->AdvancedSearch->SearchCondition = @$filter["v_UM"];
        $this->UM->AdvancedSearch->SearchValue2 = @$filter["y_UM"];
        $this->UM->AdvancedSearch->SearchOperator2 = @$filter["w_UM"];
        $this->UM->AdvancedSearch->save();

        // Field GENNAME
        $this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
        $this->GENNAME->AdvancedSearch->save();

        // Field BILLDATE
        $this->BILLDATE->AdvancedSearch->SearchValue = @$filter["x_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchOperator = @$filter["z_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchCondition = @$filter["v_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchValue2 = @$filter["y_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDATE"];
        $this->BILLDATE->AdvancedSearch->save();

        // Field PUnit
        $this->PUnit->AdvancedSearch->SearchValue = @$filter["x_PUnit"];
        $this->PUnit->AdvancedSearch->SearchOperator = @$filter["z_PUnit"];
        $this->PUnit->AdvancedSearch->SearchCondition = @$filter["v_PUnit"];
        $this->PUnit->AdvancedSearch->SearchValue2 = @$filter["y_PUnit"];
        $this->PUnit->AdvancedSearch->SearchOperator2 = @$filter["w_PUnit"];
        $this->PUnit->AdvancedSearch->save();

        // Field SUnit
        $this->SUnit->AdvancedSearch->SearchValue = @$filter["x_SUnit"];
        $this->SUnit->AdvancedSearch->SearchOperator = @$filter["z_SUnit"];
        $this->SUnit->AdvancedSearch->SearchCondition = @$filter["v_SUnit"];
        $this->SUnit->AdvancedSearch->SearchValue2 = @$filter["y_SUnit"];
        $this->SUnit->AdvancedSearch->SearchOperator2 = @$filter["w_SUnit"];
        $this->SUnit->AdvancedSearch->save();

        // Field PurValue
        $this->PurValue->AdvancedSearch->SearchValue = @$filter["x_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator = @$filter["z_PurValue"];
        $this->PurValue->AdvancedSearch->SearchCondition = @$filter["v_PurValue"];
        $this->PurValue->AdvancedSearch->SearchValue2 = @$filter["y_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurValue"];
        $this->PurValue->AdvancedSearch->save();

        // Field PurRate
        $this->PurRate->AdvancedSearch->SearchValue = @$filter["x_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator = @$filter["z_PurRate"];
        $this->PurRate->AdvancedSearch->SearchCondition = @$filter["v_PurRate"];
        $this->PurRate->AdvancedSearch->SearchValue2 = @$filter["y_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator2 = @$filter["w_PurRate"];
        $this->PurRate->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->PRC, $default, false); // PRC
        $this->buildSearchSql($where, $this->PrName, $default, false); // PrName
        $this->buildSearchSql($where, $this->BATCHNO, $default, false); // BATCHNO
        $this->buildSearchSql($where, $this->BATCH, $default, false); // BATCH
        $this->buildSearchSql($where, $this->MFRCODE, $default, false); // MFRCODE
        $this->buildSearchSql($where, $this->EXPDT, $default, false); // EXPDT
        $this->buildSearchSql($where, $this->PRCODE, $default, false); // PRCODE
        $this->buildSearchSql($where, $this->OQ, $default, false); // OQ
        $this->buildSearchSql($where, $this->RQ, $default, false); // RQ
        $this->buildSearchSql($where, $this->FRQ, $default, false); // FRQ
        $this->buildSearchSql($where, $this->IQ, $default, false); // IQ
        $this->buildSearchSql($where, $this->MRQ, $default, false); // MRQ
        $this->buildSearchSql($where, $this->MRP, $default, false); // MRP
        $this->buildSearchSql($where, $this->UR, $default, false); // UR
        $this->buildSearchSql($where, $this->PC, $default, false); // PC
        $this->buildSearchSql($where, $this->OLDRT, $default, false); // OLDRT
        $this->buildSearchSql($where, $this->TEMPMRQ, $default, false); // TEMPMRQ
        $this->buildSearchSql($where, $this->TAXP, $default, false); // TAXP
        $this->buildSearchSql($where, $this->OLDRATE, $default, false); // OLDRATE
        $this->buildSearchSql($where, $this->NEWRATE, $default, false); // NEWRATE
        $this->buildSearchSql($where, $this->OTEMPMRA, $default, false); // OTEMPMRA
        $this->buildSearchSql($where, $this->ACTIVESTATUS, $default, false); // ACTIVESTATUS
        $this->buildSearchSql($where, $this->id, $default, false); // id
        $this->buildSearchSql($where, $this->PSGST, $default, false); // PSGST
        $this->buildSearchSql($where, $this->PCGST, $default, false); // PCGST
        $this->buildSearchSql($where, $this->SSGST, $default, false); // SSGST
        $this->buildSearchSql($where, $this->SCGST, $default, false); // SCGST
        $this->buildSearchSql($where, $this->RT, $default, false); // RT
        $this->buildSearchSql($where, $this->BRCODE, $default, false); // BRCODE
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->UM, $default, false); // UM
        $this->buildSearchSql($where, $this->GENNAME, $default, false); // GENNAME
        $this->buildSearchSql($where, $this->BILLDATE, $default, false); // BILLDATE
        $this->buildSearchSql($where, $this->PUnit, $default, false); // PUnit
        $this->buildSearchSql($where, $this->SUnit, $default, false); // SUnit
        $this->buildSearchSql($where, $this->PurValue, $default, false); // PurValue
        $this->buildSearchSql($where, $this->PurRate, $default, false); // PurRate

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->PRC->AdvancedSearch->save(); // PRC
            $this->PrName->AdvancedSearch->save(); // PrName
            $this->BATCHNO->AdvancedSearch->save(); // BATCHNO
            $this->BATCH->AdvancedSearch->save(); // BATCH
            $this->MFRCODE->AdvancedSearch->save(); // MFRCODE
            $this->EXPDT->AdvancedSearch->save(); // EXPDT
            $this->PRCODE->AdvancedSearch->save(); // PRCODE
            $this->OQ->AdvancedSearch->save(); // OQ
            $this->RQ->AdvancedSearch->save(); // RQ
            $this->FRQ->AdvancedSearch->save(); // FRQ
            $this->IQ->AdvancedSearch->save(); // IQ
            $this->MRQ->AdvancedSearch->save(); // MRQ
            $this->MRP->AdvancedSearch->save(); // MRP
            $this->UR->AdvancedSearch->save(); // UR
            $this->PC->AdvancedSearch->save(); // PC
            $this->OLDRT->AdvancedSearch->save(); // OLDRT
            $this->TEMPMRQ->AdvancedSearch->save(); // TEMPMRQ
            $this->TAXP->AdvancedSearch->save(); // TAXP
            $this->OLDRATE->AdvancedSearch->save(); // OLDRATE
            $this->NEWRATE->AdvancedSearch->save(); // NEWRATE
            $this->OTEMPMRA->AdvancedSearch->save(); // OTEMPMRA
            $this->ACTIVESTATUS->AdvancedSearch->save(); // ACTIVESTATUS
            $this->id->AdvancedSearch->save(); // id
            $this->PSGST->AdvancedSearch->save(); // PSGST
            $this->PCGST->AdvancedSearch->save(); // PCGST
            $this->SSGST->AdvancedSearch->save(); // SSGST
            $this->SCGST->AdvancedSearch->save(); // SCGST
            $this->RT->AdvancedSearch->save(); // RT
            $this->BRCODE->AdvancedSearch->save(); // BRCODE
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->UM->AdvancedSearch->save(); // UM
            $this->GENNAME->AdvancedSearch->save(); // GENNAME
            $this->BILLDATE->AdvancedSearch->save(); // BILLDATE
            $this->PUnit->AdvancedSearch->save(); // PUnit
            $this->SUnit->AdvancedSearch->save(); // SUnit
            $this->PurValue->AdvancedSearch->save(); // PurValue
            $this->PurRate->AdvancedSearch->save(); // PurRate
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
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ACTIVESTATUS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PSGST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PCGST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SSGST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SCGST, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
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
        if ($this->PRC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PrName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BATCHNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BATCH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MFRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->EXPDT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MRP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OLDRT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TEMPMRQ->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TAXP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OLDRATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NEWRATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->OTEMPMRA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ACTIVESTATUS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UM->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GENNAME->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BILLDATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PUnit->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SUnit->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurRate->AdvancedSearch->issetSession()) {
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
                $this->PRC->AdvancedSearch->unsetSession();
                $this->PrName->AdvancedSearch->unsetSession();
                $this->BATCHNO->AdvancedSearch->unsetSession();
                $this->BATCH->AdvancedSearch->unsetSession();
                $this->MFRCODE->AdvancedSearch->unsetSession();
                $this->EXPDT->AdvancedSearch->unsetSession();
                $this->PRCODE->AdvancedSearch->unsetSession();
                $this->OQ->AdvancedSearch->unsetSession();
                $this->RQ->AdvancedSearch->unsetSession();
                $this->FRQ->AdvancedSearch->unsetSession();
                $this->IQ->AdvancedSearch->unsetSession();
                $this->MRQ->AdvancedSearch->unsetSession();
                $this->MRP->AdvancedSearch->unsetSession();
                $this->UR->AdvancedSearch->unsetSession();
                $this->PC->AdvancedSearch->unsetSession();
                $this->OLDRT->AdvancedSearch->unsetSession();
                $this->TEMPMRQ->AdvancedSearch->unsetSession();
                $this->TAXP->AdvancedSearch->unsetSession();
                $this->OLDRATE->AdvancedSearch->unsetSession();
                $this->NEWRATE->AdvancedSearch->unsetSession();
                $this->OTEMPMRA->AdvancedSearch->unsetSession();
                $this->ACTIVESTATUS->AdvancedSearch->unsetSession();
                $this->id->AdvancedSearch->unsetSession();
                $this->PSGST->AdvancedSearch->unsetSession();
                $this->PCGST->AdvancedSearch->unsetSession();
                $this->SSGST->AdvancedSearch->unsetSession();
                $this->SCGST->AdvancedSearch->unsetSession();
                $this->RT->AdvancedSearch->unsetSession();
                $this->BRCODE->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->UM->AdvancedSearch->unsetSession();
                $this->GENNAME->AdvancedSearch->unsetSession();
                $this->BILLDATE->AdvancedSearch->unsetSession();
                $this->PUnit->AdvancedSearch->unsetSession();
                $this->SUnit->AdvancedSearch->unsetSession();
                $this->PurValue->AdvancedSearch->unsetSession();
                $this->PurRate->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->PRC->AdvancedSearch->load();
                $this->PrName->AdvancedSearch->load();
                $this->BATCHNO->AdvancedSearch->load();
                $this->BATCH->AdvancedSearch->load();
                $this->MFRCODE->AdvancedSearch->load();
                $this->EXPDT->AdvancedSearch->load();
                $this->PRCODE->AdvancedSearch->load();
                $this->OQ->AdvancedSearch->load();
                $this->RQ->AdvancedSearch->load();
                $this->FRQ->AdvancedSearch->load();
                $this->IQ->AdvancedSearch->load();
                $this->MRQ->AdvancedSearch->load();
                $this->MRP->AdvancedSearch->load();
                $this->UR->AdvancedSearch->load();
                $this->PC->AdvancedSearch->load();
                $this->OLDRT->AdvancedSearch->load();
                $this->TEMPMRQ->AdvancedSearch->load();
                $this->TAXP->AdvancedSearch->load();
                $this->OLDRATE->AdvancedSearch->load();
                $this->NEWRATE->AdvancedSearch->load();
                $this->OTEMPMRA->AdvancedSearch->load();
                $this->ACTIVESTATUS->AdvancedSearch->load();
                $this->id->AdvancedSearch->load();
                $this->PSGST->AdvancedSearch->load();
                $this->PCGST->AdvancedSearch->load();
                $this->SSGST->AdvancedSearch->load();
                $this->SCGST->AdvancedSearch->load();
                $this->RT->AdvancedSearch->load();
                $this->BRCODE->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->UM->AdvancedSearch->load();
                $this->GENNAME->AdvancedSearch->load();
                $this->BILLDATE->AdvancedSearch->load();
                $this->PUnit->AdvancedSearch->load();
                $this->SUnit->AdvancedSearch->load();
                $this->PurValue->AdvancedSearch->load();
                $this->PurRate->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->PrName); // PrName
            $this->updateSort($this->BATCHNO); // BATCHNO
            $this->updateSort($this->MFRCODE); // MFRCODE
            $this->updateSort($this->EXPDT); // EXPDT
            $this->updateSort($this->PRCODE); // PRCODE
            $this->updateSort($this->OQ); // OQ
            $this->updateSort($this->RQ); // RQ
            $this->updateSort($this->FRQ); // FRQ
            $this->updateSort($this->IQ); // IQ
            $this->updateSort($this->MRQ); // MRQ
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->UR); // UR
            $this->updateSort($this->SSGST); // SSGST
            $this->updateSort($this->SCGST); // SCGST
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->UM); // UM
            $this->updateSort($this->GENNAME); // GENNAME
            $this->updateSort($this->BILLDATE); // BILLDATE
            $this->updateSort($this->PUnit); // PUnit
            $this->updateSort($this->SUnit); // SUnit
            $this->updateSort($this->PurValue); // PurValue
            $this->updateSort($this->PurRate); // PurRate
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
                $this->PRC->setSort("");
                $this->PrName->setSort("");
                $this->BATCHNO->setSort("");
                $this->BATCH->setSort("");
                $this->MFRCODE->setSort("");
                $this->EXPDT->setSort("");
                $this->PRCODE->setSort("");
                $this->OQ->setSort("");
                $this->RQ->setSort("");
                $this->FRQ->setSort("");
                $this->IQ->setSort("");
                $this->MRQ->setSort("");
                $this->MRP->setSort("");
                $this->UR->setSort("");
                $this->PC->setSort("");
                $this->OLDRT->setSort("");
                $this->TEMPMRQ->setSort("");
                $this->TAXP->setSort("");
                $this->OLDRATE->setSort("");
                $this->NEWRATE->setSort("");
                $this->OTEMPMRA->setSort("");
                $this->ACTIVESTATUS->setSort("");
                $this->id->setSort("");
                $this->PSGST->setSort("");
                $this->PCGST->setSort("");
                $this->SSGST->setSort("");
                $this->SCGST->setSort("");
                $this->RT->setSort("");
                $this->BRCODE->setSort("");
                $this->HospID->setSort("");
                $this->UM->setSort("");
                $this->GENNAME->setSort("");
                $this->BILLDATE->setSort("");
                $this->PUnit->setSort("");
                $this->SUnit->setSort("");
                $this->PurValue->setSort("");
                $this->PurRate->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_batchmaslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_batchmaslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpharmacy_batchmaslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->BATCH->CurrentValue = null;
        $this->BATCH->OldValue = $this->BATCH->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->PRCODE->CurrentValue = null;
        $this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
        $this->OQ->CurrentValue = null;
        $this->OQ->OldValue = $this->OQ->CurrentValue;
        $this->RQ->CurrentValue = null;
        $this->RQ->OldValue = $this->RQ->CurrentValue;
        $this->FRQ->CurrentValue = null;
        $this->FRQ->OldValue = $this->FRQ->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->UR->CurrentValue = null;
        $this->UR->OldValue = $this->UR->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->OLDRT->CurrentValue = null;
        $this->OLDRT->OldValue = $this->OLDRT->CurrentValue;
        $this->TEMPMRQ->CurrentValue = null;
        $this->TEMPMRQ->OldValue = $this->TEMPMRQ->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->OLDRATE->CurrentValue = null;
        $this->OLDRATE->OldValue = $this->OLDRATE->CurrentValue;
        $this->NEWRATE->CurrentValue = null;
        $this->NEWRATE->OldValue = $this->NEWRATE->CurrentValue;
        $this->OTEMPMRA->CurrentValue = null;
        $this->OTEMPMRA->OldValue = $this->OTEMPMRA->CurrentValue;
        $this->ACTIVESTATUS->CurrentValue = null;
        $this->ACTIVESTATUS->OldValue = $this->ACTIVESTATUS->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->RT->CurrentValue = null;
        $this->RT->OldValue = $this->RT->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->UM->CurrentValue = null;
        $this->UM->OldValue = $this->UM->CurrentValue;
        $this->GENNAME->CurrentValue = null;
        $this->GENNAME->OldValue = $this->GENNAME->CurrentValue;
        $this->BILLDATE->CurrentValue = null;
        $this->BILLDATE->OldValue = $this->BILLDATE->CurrentValue;
        $this->PUnit->CurrentValue = null;
        $this->PUnit->OldValue = $this->PUnit->CurrentValue;
        $this->SUnit->CurrentValue = null;
        $this->SUnit->OldValue = $this->SUnit->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->PurRate->CurrentValue = null;
        $this->PurRate->OldValue = $this->PurRate->CurrentValue;
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

        // PRC
        if (!$this->isAddOrEdit() && $this->PRC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PRC->AdvancedSearch->SearchValue != "" || $this->PRC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PrName
        if (!$this->isAddOrEdit() && $this->PrName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PrName->AdvancedSearch->SearchValue != "" || $this->PrName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BATCHNO
        if (!$this->isAddOrEdit() && $this->BATCHNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BATCHNO->AdvancedSearch->SearchValue != "" || $this->BATCHNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BATCH
        if (!$this->isAddOrEdit() && $this->BATCH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BATCH->AdvancedSearch->SearchValue != "" || $this->BATCH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MFRCODE
        if (!$this->isAddOrEdit() && $this->MFRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MFRCODE->AdvancedSearch->SearchValue != "" || $this->MFRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // EXPDT
        if (!$this->isAddOrEdit() && $this->EXPDT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->EXPDT->AdvancedSearch->SearchValue != "" || $this->EXPDT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PRCODE
        if (!$this->isAddOrEdit() && $this->PRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PRCODE->AdvancedSearch->SearchValue != "" || $this->PRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OQ
        if (!$this->isAddOrEdit() && $this->OQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OQ->AdvancedSearch->SearchValue != "" || $this->OQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RQ
        if (!$this->isAddOrEdit() && $this->RQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RQ->AdvancedSearch->SearchValue != "" || $this->RQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FRQ
        if (!$this->isAddOrEdit() && $this->FRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FRQ->AdvancedSearch->SearchValue != "" || $this->FRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IQ
        if (!$this->isAddOrEdit() && $this->IQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IQ->AdvancedSearch->SearchValue != "" || $this->IQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MRQ
        if (!$this->isAddOrEdit() && $this->MRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MRQ->AdvancedSearch->SearchValue != "" || $this->MRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MRP
        if (!$this->isAddOrEdit() && $this->MRP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MRP->AdvancedSearch->SearchValue != "" || $this->MRP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UR
        if (!$this->isAddOrEdit() && $this->UR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UR->AdvancedSearch->SearchValue != "" || $this->UR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PC
        if (!$this->isAddOrEdit() && $this->PC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PC->AdvancedSearch->SearchValue != "" || $this->PC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OLDRT
        if (!$this->isAddOrEdit() && $this->OLDRT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OLDRT->AdvancedSearch->SearchValue != "" || $this->OLDRT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TEMPMRQ
        if (!$this->isAddOrEdit() && $this->TEMPMRQ->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TEMPMRQ->AdvancedSearch->SearchValue != "" || $this->TEMPMRQ->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TAXP
        if (!$this->isAddOrEdit() && $this->TAXP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TAXP->AdvancedSearch->SearchValue != "" || $this->TAXP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OLDRATE
        if (!$this->isAddOrEdit() && $this->OLDRATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OLDRATE->AdvancedSearch->SearchValue != "" || $this->OLDRATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NEWRATE
        if (!$this->isAddOrEdit() && $this->NEWRATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NEWRATE->AdvancedSearch->SearchValue != "" || $this->NEWRATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // OTEMPMRA
        if (!$this->isAddOrEdit() && $this->OTEMPMRA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->OTEMPMRA->AdvancedSearch->SearchValue != "" || $this->OTEMPMRA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ACTIVESTATUS
        if (!$this->isAddOrEdit() && $this->ACTIVESTATUS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ACTIVESTATUS->AdvancedSearch->SearchValue != "" || $this->ACTIVESTATUS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PSGST
        if (!$this->isAddOrEdit() && $this->PSGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PSGST->AdvancedSearch->SearchValue != "" || $this->PSGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PCGST
        if (!$this->isAddOrEdit() && $this->PCGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PCGST->AdvancedSearch->SearchValue != "" || $this->PCGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SSGST
        if (!$this->isAddOrEdit() && $this->SSGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SSGST->AdvancedSearch->SearchValue != "" || $this->SSGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SCGST
        if (!$this->isAddOrEdit() && $this->SCGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SCGST->AdvancedSearch->SearchValue != "" || $this->SCGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RT
        if (!$this->isAddOrEdit() && $this->RT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RT->AdvancedSearch->SearchValue != "" || $this->RT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BRCODE
        if (!$this->isAddOrEdit() && $this->BRCODE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BRCODE->AdvancedSearch->SearchValue != "" || $this->BRCODE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // UM
        if (!$this->isAddOrEdit() && $this->UM->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UM->AdvancedSearch->SearchValue != "" || $this->UM->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GENNAME
        if (!$this->isAddOrEdit() && $this->GENNAME->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GENNAME->AdvancedSearch->SearchValue != "" || $this->GENNAME->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BILLDATE
        if (!$this->isAddOrEdit() && $this->BILLDATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BILLDATE->AdvancedSearch->SearchValue != "" || $this->BILLDATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PUnit
        if (!$this->isAddOrEdit() && $this->PUnit->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PUnit->AdvancedSearch->SearchValue != "" || $this->PUnit->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SUnit
        if (!$this->isAddOrEdit() && $this->SUnit->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SUnit->AdvancedSearch->SearchValue != "" || $this->SUnit->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurValue
        if (!$this->isAddOrEdit() && $this->PurValue->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurValue->AdvancedSearch->SearchValue != "" || $this->PurValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PurRate
        if (!$this->isAddOrEdit() && $this->PurRate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PurRate->AdvancedSearch->SearchValue != "" || $this->PurRate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        return $hasValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRC->Visible = false; // Disable update for API request
            } else {
                $this->PRC->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PRC")) {
            $this->PRC->setOldValue($CurrentForm->getValue("o_PRC"));
        }

        // Check field name 'PrName' first before field var 'x_PrName'
        $val = $CurrentForm->hasValue("PrName") ? $CurrentForm->getValue("PrName") : $CurrentForm->getValue("x_PrName");
        if (!$this->PrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrName->Visible = false; // Disable update for API request
            } else {
                $this->PrName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PrName")) {
            $this->PrName->setOldValue($CurrentForm->getValue("o_PrName"));
        }

        // Check field name 'BATCHNO' first before field var 'x_BATCHNO'
        $val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
        if (!$this->BATCHNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BATCHNO->Visible = false; // Disable update for API request
            } else {
                $this->BATCHNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BATCHNO")) {
            $this->BATCHNO->setOldValue($CurrentForm->getValue("o_BATCHNO"));
        }

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MFRCODE->Visible = false; // Disable update for API request
            } else {
                $this->MFRCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MFRCODE")) {
            $this->MFRCODE->setOldValue($CurrentForm->getValue("o_MFRCODE"));
        }

        // Check field name 'EXPDT' first before field var 'x_EXPDT'
        $val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
        if (!$this->EXPDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EXPDT->Visible = false; // Disable update for API request
            } else {
                $this->EXPDT->setFormValue($val);
            }
            $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_EXPDT")) {
            $this->EXPDT->setOldValue($CurrentForm->getValue("o_EXPDT"));
        }

        // Check field name 'PRCODE' first before field var 'x_PRCODE'
        $val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
        if (!$this->PRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRCODE->Visible = false; // Disable update for API request
            } else {
                $this->PRCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PRCODE")) {
            $this->PRCODE->setOldValue($CurrentForm->getValue("o_PRCODE"));
        }

        // Check field name 'OQ' first before field var 'x_OQ'
        $val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
        if (!$this->OQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OQ->Visible = false; // Disable update for API request
            } else {
                $this->OQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_OQ")) {
            $this->OQ->setOldValue($CurrentForm->getValue("o_OQ"));
        }

        // Check field name 'RQ' first before field var 'x_RQ'
        $val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
        if (!$this->RQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RQ->Visible = false; // Disable update for API request
            } else {
                $this->RQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RQ")) {
            $this->RQ->setOldValue($CurrentForm->getValue("o_RQ"));
        }

        // Check field name 'FRQ' first before field var 'x_FRQ'
        $val = $CurrentForm->hasValue("FRQ") ? $CurrentForm->getValue("FRQ") : $CurrentForm->getValue("x_FRQ");
        if (!$this->FRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FRQ->Visible = false; // Disable update for API request
            } else {
                $this->FRQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_FRQ")) {
            $this->FRQ->setOldValue($CurrentForm->getValue("o_FRQ"));
        }

        // Check field name 'IQ' first before field var 'x_IQ'
        $val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
        if (!$this->IQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IQ->Visible = false; // Disable update for API request
            } else {
                $this->IQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IQ")) {
            $this->IQ->setOldValue($CurrentForm->getValue("o_IQ"));
        }

        // Check field name 'MRQ' first before field var 'x_MRQ'
        $val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
        if (!$this->MRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRQ->Visible = false; // Disable update for API request
            } else {
                $this->MRQ->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MRQ")) {
            $this->MRQ->setOldValue($CurrentForm->getValue("o_MRQ"));
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRP->Visible = false; // Disable update for API request
            } else {
                $this->MRP->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MRP")) {
            $this->MRP->setOldValue($CurrentForm->getValue("o_MRP"));
        }

        // Check field name 'UR' first before field var 'x_UR'
        $val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
        if (!$this->UR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UR->Visible = false; // Disable update for API request
            } else {
                $this->UR->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_UR")) {
            $this->UR->setOldValue($CurrentForm->getValue("o_UR"));
        }

        // Check field name 'SSGST' first before field var 'x_SSGST'
        $val = $CurrentForm->hasValue("SSGST") ? $CurrentForm->getValue("SSGST") : $CurrentForm->getValue("x_SSGST");
        if (!$this->SSGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SSGST->Visible = false; // Disable update for API request
            } else {
                $this->SSGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SSGST")) {
            $this->SSGST->setOldValue($CurrentForm->getValue("o_SSGST"));
        }

        // Check field name 'SCGST' first before field var 'x_SCGST'
        $val = $CurrentForm->hasValue("SCGST") ? $CurrentForm->getValue("SCGST") : $CurrentForm->getValue("x_SCGST");
        if (!$this->SCGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SCGST->Visible = false; // Disable update for API request
            } else {
                $this->SCGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SCGST")) {
            $this->SCGST->setOldValue($CurrentForm->getValue("o_SCGST"));
        }

        // Check field name 'RT' first before field var 'x_RT'
        $val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
        if (!$this->RT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RT->Visible = false; // Disable update for API request
            } else {
                $this->RT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RT")) {
            $this->RT->setOldValue($CurrentForm->getValue("o_RT"));
        }

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BRCODE")) {
            $this->BRCODE->setOldValue($CurrentForm->getValue("o_BRCODE"));
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HospID")) {
            $this->HospID->setOldValue($CurrentForm->getValue("o_HospID"));
        }

        // Check field name 'UM' first before field var 'x_UM'
        $val = $CurrentForm->hasValue("UM") ? $CurrentForm->getValue("UM") : $CurrentForm->getValue("x_UM");
        if (!$this->UM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UM->Visible = false; // Disable update for API request
            } else {
                $this->UM->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_UM")) {
            $this->UM->setOldValue($CurrentForm->getValue("o_UM"));
        }

        // Check field name 'GENNAME' first before field var 'x_GENNAME'
        $val = $CurrentForm->hasValue("GENNAME") ? $CurrentForm->getValue("GENNAME") : $CurrentForm->getValue("x_GENNAME");
        if (!$this->GENNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GENNAME->Visible = false; // Disable update for API request
            } else {
                $this->GENNAME->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_GENNAME")) {
            $this->GENNAME->setOldValue($CurrentForm->getValue("o_GENNAME"));
        }

        // Check field name 'BILLDATE' first before field var 'x_BILLDATE'
        $val = $CurrentForm->hasValue("BILLDATE") ? $CurrentForm->getValue("BILLDATE") : $CurrentForm->getValue("x_BILLDATE");
        if (!$this->BILLDATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDATE->Visible = false; // Disable update for API request
            } else {
                $this->BILLDATE->setFormValue($val);
            }
            $this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_BILLDATE")) {
            $this->BILLDATE->setOldValue($CurrentForm->getValue("o_BILLDATE"));
        }

        // Check field name 'PUnit' first before field var 'x_PUnit'
        $val = $CurrentForm->hasValue("PUnit") ? $CurrentForm->getValue("PUnit") : $CurrentForm->getValue("x_PUnit");
        if (!$this->PUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PUnit->Visible = false; // Disable update for API request
            } else {
                $this->PUnit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PUnit")) {
            $this->PUnit->setOldValue($CurrentForm->getValue("o_PUnit"));
        }

        // Check field name 'SUnit' first before field var 'x_SUnit'
        $val = $CurrentForm->hasValue("SUnit") ? $CurrentForm->getValue("SUnit") : $CurrentForm->getValue("x_SUnit");
        if (!$this->SUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SUnit->Visible = false; // Disable update for API request
            } else {
                $this->SUnit->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SUnit")) {
            $this->SUnit->setOldValue($CurrentForm->getValue("o_SUnit"));
        }

        // Check field name 'PurValue' first before field var 'x_PurValue'
        $val = $CurrentForm->hasValue("PurValue") ? $CurrentForm->getValue("PurValue") : $CurrentForm->getValue("x_PurValue");
        if (!$this->PurValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurValue->Visible = false; // Disable update for API request
            } else {
                $this->PurValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PurValue")) {
            $this->PurValue->setOldValue($CurrentForm->getValue("o_PurValue"));
        }

        // Check field name 'PurRate' first before field var 'x_PurRate'
        $val = $CurrentForm->hasValue("PurRate") ? $CurrentForm->getValue("PurRate") : $CurrentForm->getValue("x_PurRate");
        if (!$this->PurRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurRate->Visible = false; // Disable update for API request
            } else {
                $this->PurRate->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PurRate")) {
            $this->PurRate->setOldValue($CurrentForm->getValue("o_PurRate"));
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
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
        $this->OQ->CurrentValue = $this->OQ->FormValue;
        $this->RQ->CurrentValue = $this->RQ->FormValue;
        $this->FRQ->CurrentValue = $this->FRQ->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->MRQ->CurrentValue = $this->MRQ->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->UR->CurrentValue = $this->UR->FormValue;
        $this->SSGST->CurrentValue = $this->SSGST->FormValue;
        $this->SCGST->CurrentValue = $this->SCGST->FormValue;
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->UM->CurrentValue = $this->UM->FormValue;
        $this->GENNAME->CurrentValue = $this->GENNAME->FormValue;
        $this->BILLDATE->CurrentValue = $this->BILLDATE->FormValue;
        $this->BILLDATE->CurrentValue = UnFormatDateTime($this->BILLDATE->CurrentValue, 0);
        $this->PUnit->CurrentValue = $this->PUnit->FormValue;
        $this->SUnit->CurrentValue = $this->SUnit->FormValue;
        $this->PurValue->CurrentValue = $this->PurValue->FormValue;
        $this->PurRate->CurrentValue = $this->PurRate->FormValue;
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
        $this->PRC->setDbValue($row['PRC']);
        $this->PrName->setDbValue($row['PrName']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->BATCH->setDbValue($row['BATCH']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->FRQ->setDbValue($row['FRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->UR->setDbValue($row['UR']);
        $this->PC->setDbValue($row['PC']);
        $this->OLDRT->setDbValue($row['OLDRT']);
        $this->TEMPMRQ->setDbValue($row['TEMPMRQ']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->OLDRATE->setDbValue($row['OLDRATE']);
        $this->NEWRATE->setDbValue($row['NEWRATE']);
        $this->OTEMPMRA->setDbValue($row['OTEMPMRA']);
        $this->ACTIVESTATUS->setDbValue($row['ACTIVESTATUS']);
        $this->id->setDbValue($row['id']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->RT->setDbValue($row['RT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->HospID->setDbValue($row['HospID']);
        $this->UM->setDbValue($row['UM']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->BILLDATE->setDbValue($row['BILLDATE']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PurRate->setDbValue($row['PurRate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['BATCH'] = $this->BATCH->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['PRCODE'] = $this->PRCODE->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['FRQ'] = $this->FRQ->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['OLDRT'] = $this->OLDRT->CurrentValue;
        $row['TEMPMRQ'] = $this->TEMPMRQ->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['OLDRATE'] = $this->OLDRATE->CurrentValue;
        $row['NEWRATE'] = $this->NEWRATE->CurrentValue;
        $row['OTEMPMRA'] = $this->OTEMPMRA->CurrentValue;
        $row['ACTIVESTATUS'] = $this->ACTIVESTATUS->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['UM'] = $this->UM->CurrentValue;
        $row['GENNAME'] = $this->GENNAME->CurrentValue;
        $row['BILLDATE'] = $this->BILLDATE->CurrentValue;
        $row['PUnit'] = $this->PUnit->CurrentValue;
        $row['SUnit'] = $this->SUnit->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['PurRate'] = $this->PurRate->CurrentValue;
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
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FRQ->FormValue == $this->FRQ->CurrentValue && is_numeric(ConvertToFloatString($this->FRQ->CurrentValue))) {
            $this->FRQ->CurrentValue = ConvertToFloatString($this->FRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurRate->FormValue == $this->PurRate->CurrentValue && is_numeric(ConvertToFloatString($this->PurRate->CurrentValue))) {
            $this->PurRate->CurrentValue = ConvertToFloatString($this->PurRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // PRC

        // PrName

        // BATCHNO

        // BATCH

        // MFRCODE

        // EXPDT

        // PRCODE

        // OQ

        // RQ

        // FRQ

        // IQ

        // MRQ

        // MRP

        // UR

        // PC

        // OLDRT

        // TEMPMRQ

        // TAXP

        // OLDRATE

        // NEWRATE

        // OTEMPMRA

        // ACTIVESTATUS

        // id

        // PSGST

        // PCGST

        // SSGST

        // SCGST

        // RT

        // BRCODE

        // HospID

        // UM

        // GENNAME

        // BILLDATE

        // PUnit

        // SUnit

        // PurValue

        // PurRate
        if ($this->RowType == ROWTYPE_VIEW) {
            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $curVal = trim(strval($this->PrName->CurrentValue));
            if ($curVal != "") {
                $this->PrName->ViewValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->ViewValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->ViewValue = $this->PrName->CurrentValue;
                    }
                }
            } else {
                $this->PrName->ViewValue = null;
            }
            $this->PrName->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // BATCH
            $this->BATCH->ViewValue = $this->BATCH->CurrentValue;
            $this->BATCH->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // FRQ
            $this->FRQ->ViewValue = $this->FRQ->CurrentValue;
            $this->FRQ->ViewValue = FormatNumber($this->FRQ->ViewValue, 2, -2, -2, -2);
            $this->FRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // OLDRT
            $this->OLDRT->ViewValue = $this->OLDRT->CurrentValue;
            $this->OLDRT->ViewValue = FormatNumber($this->OLDRT->ViewValue, 2, -2, -2, -2);
            $this->OLDRT->ViewCustomAttributes = "";

            // TEMPMRQ
            $this->TEMPMRQ->ViewValue = $this->TEMPMRQ->CurrentValue;
            $this->TEMPMRQ->ViewValue = FormatNumber($this->TEMPMRQ->ViewValue, 2, -2, -2, -2);
            $this->TEMPMRQ->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // OLDRATE
            $this->OLDRATE->ViewValue = $this->OLDRATE->CurrentValue;
            $this->OLDRATE->ViewValue = FormatNumber($this->OLDRATE->ViewValue, 2, -2, -2, -2);
            $this->OLDRATE->ViewCustomAttributes = "";

            // NEWRATE
            $this->NEWRATE->ViewValue = $this->NEWRATE->CurrentValue;
            $this->NEWRATE->ViewValue = FormatNumber($this->NEWRATE->ViewValue, 2, -2, -2, -2);
            $this->NEWRATE->ViewCustomAttributes = "";

            // OTEMPMRA
            $this->OTEMPMRA->ViewValue = $this->OTEMPMRA->CurrentValue;
            $this->OTEMPMRA->ViewValue = FormatNumber($this->OTEMPMRA->ViewValue, 2, -2, -2, -2);
            $this->OTEMPMRA->ViewCustomAttributes = "";

            // ACTIVESTATUS
            $this->ACTIVESTATUS->ViewValue = $this->ACTIVESTATUS->CurrentValue;
            $this->ACTIVESTATUS->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, $this->PSGST->DefaultDecimalPrecision);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, $this->PCGST->DefaultDecimalPrecision);
            $this->PCGST->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, $this->SSGST->DefaultDecimalPrecision);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, $this->SCGST->DefaultDecimalPrecision);
            $this->SCGST->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // BRCODE
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
                    }
                }
            } else {
                $this->BRCODE->ViewValue = null;
            }
            $this->BRCODE->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $this->GENNAME->ViewCustomAttributes = "";

            // BILLDATE
            $this->BILLDATE->ViewValue = $this->BILLDATE->CurrentValue;
            $this->BILLDATE->ViewValue = FormatDateTime($this->BILLDATE->ViewValue, 0);
            $this->BILLDATE->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PRC->ViewValue = $this->highlightValue($this->PRC);
            }

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PrName->ViewValue = $this->highlightValue($this->PrName);
            }

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BATCHNO->ViewValue = $this->highlightValue($this->BATCHNO);
            }

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MFRCODE->ViewValue = $this->highlightValue($this->MFRCODE);
            }

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";
            $this->PRCODE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PRCODE->ViewValue = $this->highlightValue($this->PRCODE);
            }

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";
            $this->FRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SSGST->ViewValue = $this->highlightValue($this->SSGST);
            }

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SCGST->ViewValue = $this->highlightValue($this->SCGST);
            }

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";
            if (!$this->isExport()) {
                $this->UM->ViewValue = $this->highlightValue($this->UM);
            }

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";
            if (!$this->isExport()) {
                $this->GENNAME->ViewValue = $this->highlightValue($this->GENNAME);
            }

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";
            $this->BILLDATE->TooltipValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";
            $this->PUnit->TooltipValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";
            $this->SUnit->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
            $this->PurRate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $curVal = trim(strval($this->PrName->CurrentValue));
            if ($curVal != "") {
                $this->PrName->EditValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->EditValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->EditValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
                    }
                }
            } else {
                $this->PrName->EditValue = null;
            }
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
            if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
                $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
                $this->OQ->OldValue = $this->OQ->EditValue;
            }

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
            if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue)) {
                $this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
                $this->RQ->OldValue = $this->RQ->EditValue;
            }

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->CurrentValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
            if (strval($this->FRQ->EditValue) != "" && is_numeric($this->FRQ->EditValue)) {
                $this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);
                $this->FRQ->OldValue = $this->FRQ->EditValue;
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
            if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue)) {
                $this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
                $this->MRQ->OldValue = $this->MRQ->EditValue;
            }

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -1, -2, 0);
                $this->SSGST->OldValue = $this->SSGST->EditValue;
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -1, -2, 0);
                $this->SCGST->OldValue = $this->SCGST->EditValue;
            }

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
            }

            // BRCODE
            $this->BRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
            } else {
                $this->BRCODE->ViewValue = $this->BRCODE->Lookup !== null && is_array($this->BRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->BRCODE->ViewValue !== null) { // Load from cache
                $this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
                if ($this->BRCODE->ViewValue == "") {
                    $this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->BRCODE->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->BRCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                } else {
                    $this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->BRCODE->EditValue = $arwrk;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime($this->BILLDATE->CurrentValue, 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
                $this->PurValue->OldValue = $this->PurValue->EditValue;
            }

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
            if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
                $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
                $this->PurRate->OldValue = $this->PurRate->EditValue;
            }

            // Add refer script

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $curVal = trim(strval($this->PrName->CurrentValue));
            if ($curVal != "") {
                $this->PrName->EditValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->EditValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->EditValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
                    }
                }
            } else {
                $this->PrName->EditValue = null;
            }
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
            if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
                $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
                $this->OQ->OldValue = $this->OQ->EditValue;
            }

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
            if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue)) {
                $this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
                $this->RQ->OldValue = $this->RQ->EditValue;
            }

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->CurrentValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());
            if (strval($this->FRQ->EditValue) != "" && is_numeric($this->FRQ->EditValue)) {
                $this->FRQ->EditValue = FormatNumber($this->FRQ->EditValue, -2, -2, -2, -2);
                $this->FRQ->OldValue = $this->FRQ->EditValue;
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
            if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue)) {
                $this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
                $this->MRQ->OldValue = $this->MRQ->EditValue;
            }

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->CurrentValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());
            if (strval($this->SSGST->EditValue) != "" && is_numeric($this->SSGST->EditValue)) {
                $this->SSGST->EditValue = FormatNumber($this->SSGST->EditValue, -2, -1, -2, 0);
                $this->SSGST->OldValue = $this->SSGST->EditValue;
            }

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->CurrentValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());
            if (strval($this->SCGST->EditValue) != "" && is_numeric($this->SCGST->EditValue)) {
                $this->SCGST->EditValue = FormatNumber($this->SCGST->EditValue, -2, -1, -2, 0);
                $this->SCGST->OldValue = $this->SCGST->EditValue;
            }

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
            }

            // BRCODE
            $this->BRCODE->EditCustomAttributes = "";
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
            } else {
                $this->BRCODE->ViewValue = $this->BRCODE->Lookup !== null && is_array($this->BRCODE->Lookup->Options) ? $curVal : null;
            }
            if ($this->BRCODE->ViewValue !== null) { // Load from cache
                $this->BRCODE->EditValue = array_values($this->BRCODE->Lookup->Options);
                if ($this->BRCODE->ViewValue == "") {
                    $this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->BRCODE->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->BRCODE->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                    $this->BRCODE->ViewValue = $this->BRCODE->displayValue($arwrk);
                } else {
                    $this->BRCODE->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->BRCODE->EditValue = $arwrk;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->CurrentValue = HtmlDecode($this->UM->CurrentValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->CurrentValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->CurrentValue = HtmlDecode($this->GENNAME->CurrentValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->CurrentValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime($this->BILLDATE->CurrentValue, 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->CurrentValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->CurrentValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->CurrentValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());
            if (strval($this->PurValue->EditValue) != "" && is_numeric($this->PurValue->EditValue)) {
                $this->PurValue->EditValue = FormatNumber($this->PurValue->EditValue, -2, -2, -2, -2);
                $this->PurValue->OldValue = $this->PurValue->EditValue;
            }

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->CurrentValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
            if (strval($this->PurRate->EditValue) != "" && is_numeric($this->PurRate->EditValue)) {
                $this->PurRate->EditValue = FormatNumber($this->PurRate->EditValue, -2, -2, -2, -2);
                $this->PurRate->OldValue = $this->PurRate->EditValue;
            }

            // Edit refer script

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";

            // FRQ
            $this->FRQ->LinkCustomAttributes = "";
            $this->FRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";

            // BILLDATE
            $this->BILLDATE->LinkCustomAttributes = "";
            $this->BILLDATE->HrefValue = "";

            // PUnit
            $this->PUnit->LinkCustomAttributes = "";
            $this->PUnit->HrefValue = "";

            // SUnit
            $this->SUnit->LinkCustomAttributes = "";
            $this->SUnit->HrefValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";

            // PurRate
            $this->PurRate->LinkCustomAttributes = "";
            $this->PurRate->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->AdvancedSearch->SearchValue = HtmlDecode($this->PRC->AdvancedSearch->SearchValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->AdvancedSearch->SearchValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->AdvancedSearch->SearchValue = HtmlDecode($this->PrName->AdvancedSearch->SearchValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
            $curVal = trim(strval($this->PrName->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->PrName->EditValue = $this->PrName->lookupCacheOption($curVal);
                if ($this->PrName->EditValue === null) { // Lookup from database
                    $filterWrk = "`DES`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->PrName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PrName->Lookup->renderViewRow($rswrk[0]);
                        $this->PrName->EditValue = $this->PrName->displayValue($arwrk);
                    } else {
                        $this->PrName->EditValue = HtmlEncode($this->PrName->AdvancedSearch->SearchValue);
                    }
                }
            } else {
                $this->PrName->EditValue = null;
            }
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->AdvancedSearch->SearchValue = HtmlDecode($this->BATCHNO->AdvancedSearch->SearchValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->AdvancedSearch->SearchValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->MFRCODE->AdvancedSearch->SearchValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->AdvancedSearch->SearchValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->EXPDT->AdvancedSearch->SearchValue2, 0), 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->AdvancedSearch->SearchValue = HtmlDecode($this->PRCODE->AdvancedSearch->SearchValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->AdvancedSearch->SearchValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->AdvancedSearch->SearchValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->AdvancedSearch->SearchValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());

            // FRQ
            $this->FRQ->EditAttrs["class"] = "form-control";
            $this->FRQ->EditCustomAttributes = "";
            $this->FRQ->EditValue = HtmlEncode($this->FRQ->AdvancedSearch->SearchValue);
            $this->FRQ->PlaceHolder = RemoveHtml($this->FRQ->caption());

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->AdvancedSearch->SearchValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->AdvancedSearch->SearchValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->AdvancedSearch->SearchValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->AdvancedSearch->SearchValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());

            // SSGST
            $this->SSGST->EditAttrs["class"] = "form-control";
            $this->SSGST->EditCustomAttributes = "";
            $this->SSGST->EditValue = HtmlEncode($this->SSGST->AdvancedSearch->SearchValue);
            $this->SSGST->PlaceHolder = RemoveHtml($this->SSGST->caption());

            // SCGST
            $this->SCGST->EditAttrs["class"] = "form-control";
            $this->SCGST->EditCustomAttributes = "";
            $this->SCGST->EditValue = HtmlEncode($this->SCGST->AdvancedSearch->SearchValue);
            $this->SCGST->PlaceHolder = RemoveHtml($this->SCGST->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->AdvancedSearch->SearchValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());

            // BRCODE
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // UM
            $this->UM->EditAttrs["class"] = "form-control";
            $this->UM->EditCustomAttributes = "";
            if (!$this->UM->Raw) {
                $this->UM->AdvancedSearch->SearchValue = HtmlDecode($this->UM->AdvancedSearch->SearchValue);
            }
            $this->UM->EditValue = HtmlEncode($this->UM->AdvancedSearch->SearchValue);
            $this->UM->PlaceHolder = RemoveHtml($this->UM->caption());

            // GENNAME
            $this->GENNAME->EditAttrs["class"] = "form-control";
            $this->GENNAME->EditCustomAttributes = "";
            if (!$this->GENNAME->Raw) {
                $this->GENNAME->AdvancedSearch->SearchValue = HtmlDecode($this->GENNAME->AdvancedSearch->SearchValue);
            }
            $this->GENNAME->EditValue = HtmlEncode($this->GENNAME->AdvancedSearch->SearchValue);
            $this->GENNAME->PlaceHolder = RemoveHtml($this->GENNAME->caption());

            // BILLDATE
            $this->BILLDATE->EditAttrs["class"] = "form-control";
            $this->BILLDATE->EditCustomAttributes = "";
            $this->BILLDATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->BILLDATE->AdvancedSearch->SearchValue, 0), 8));
            $this->BILLDATE->PlaceHolder = RemoveHtml($this->BILLDATE->caption());

            // PUnit
            $this->PUnit->EditAttrs["class"] = "form-control";
            $this->PUnit->EditCustomAttributes = "";
            $this->PUnit->EditValue = HtmlEncode($this->PUnit->AdvancedSearch->SearchValue);
            $this->PUnit->PlaceHolder = RemoveHtml($this->PUnit->caption());

            // SUnit
            $this->SUnit->EditAttrs["class"] = "form-control";
            $this->SUnit->EditCustomAttributes = "";
            $this->SUnit->EditValue = HtmlEncode($this->SUnit->AdvancedSearch->SearchValue);
            $this->SUnit->PlaceHolder = RemoveHtml($this->SUnit->caption());

            // PurValue
            $this->PurValue->EditAttrs["class"] = "form-control";
            $this->PurValue->EditCustomAttributes = "";
            $this->PurValue->EditValue = HtmlEncode($this->PurValue->AdvancedSearch->SearchValue);
            $this->PurValue->PlaceHolder = RemoveHtml($this->PurValue->caption());

            // PurRate
            $this->PurRate->EditAttrs["class"] = "form-control";
            $this->PurRate->EditCustomAttributes = "";
            $this->PurRate->EditValue = HtmlEncode($this->PurRate->AdvancedSearch->SearchValue);
            $this->PurRate->PlaceHolder = RemoveHtml($this->PurRate->caption());
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
        if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if (!CheckDate($this->EXPDT->AdvancedSearch->SearchValue2)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
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

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
        }
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->EXPDT->Required) {
            if (!$this->EXPDT->IsDetailKey && EmptyValue($this->EXPDT->FormValue)) {
                $this->EXPDT->addErrorMessage(str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EXPDT->FormValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if ($this->PRCODE->Required) {
            if (!$this->PRCODE->IsDetailKey && EmptyValue($this->PRCODE->FormValue)) {
                $this->PRCODE->addErrorMessage(str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
            }
        }
        if ($this->OQ->Required) {
            if (!$this->OQ->IsDetailKey && EmptyValue($this->OQ->FormValue)) {
                $this->OQ->addErrorMessage(str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OQ->FormValue)) {
            $this->OQ->addErrorMessage($this->OQ->getErrorMessage(false));
        }
        if ($this->RQ->Required) {
            if (!$this->RQ->IsDetailKey && EmptyValue($this->RQ->FormValue)) {
                $this->RQ->addErrorMessage(str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RQ->FormValue)) {
            $this->RQ->addErrorMessage($this->RQ->getErrorMessage(false));
        }
        if ($this->FRQ->Required) {
            if (!$this->FRQ->IsDetailKey && EmptyValue($this->FRQ->FormValue)) {
                $this->FRQ->addErrorMessage(str_replace("%s", $this->FRQ->caption(), $this->FRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->FRQ->FormValue)) {
            $this->FRQ->addErrorMessage($this->FRQ->getErrorMessage(false));
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IQ->FormValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if ($this->MRQ->Required) {
            if (!$this->MRQ->IsDetailKey && EmptyValue($this->MRQ->FormValue)) {
                $this->MRQ->addErrorMessage(str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRQ->FormValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->SSGST->Required) {
            if (!$this->SSGST->IsDetailKey && EmptyValue($this->SSGST->FormValue)) {
                $this->SSGST->addErrorMessage(str_replace("%s", $this->SSGST->caption(), $this->SSGST->RequiredErrorMessage));
            }
        }
        if ($this->SCGST->Required) {
            if (!$this->SCGST->IsDetailKey && EmptyValue($this->SCGST->FormValue)) {
                $this->SCGST->addErrorMessage(str_replace("%s", $this->SCGST->caption(), $this->SCGST->RequiredErrorMessage));
            }
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if ($this->UM->Required) {
            if (!$this->UM->IsDetailKey && EmptyValue($this->UM->FormValue)) {
                $this->UM->addErrorMessage(str_replace("%s", $this->UM->caption(), $this->UM->RequiredErrorMessage));
            }
        }
        if ($this->GENNAME->Required) {
            if (!$this->GENNAME->IsDetailKey && EmptyValue($this->GENNAME->FormValue)) {
                $this->GENNAME->addErrorMessage(str_replace("%s", $this->GENNAME->caption(), $this->GENNAME->RequiredErrorMessage));
            }
        }
        if ($this->BILLDATE->Required) {
            if (!$this->BILLDATE->IsDetailKey && EmptyValue($this->BILLDATE->FormValue)) {
                $this->BILLDATE->addErrorMessage(str_replace("%s", $this->BILLDATE->caption(), $this->BILLDATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BILLDATE->FormValue)) {
            $this->BILLDATE->addErrorMessage($this->BILLDATE->getErrorMessage(false));
        }
        if ($this->PUnit->Required) {
            if (!$this->PUnit->IsDetailKey && EmptyValue($this->PUnit->FormValue)) {
                $this->PUnit->addErrorMessage(str_replace("%s", $this->PUnit->caption(), $this->PUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PUnit->FormValue)) {
            $this->PUnit->addErrorMessage($this->PUnit->getErrorMessage(false));
        }
        if ($this->SUnit->Required) {
            if (!$this->SUnit->IsDetailKey && EmptyValue($this->SUnit->FormValue)) {
                $this->SUnit->addErrorMessage(str_replace("%s", $this->SUnit->caption(), $this->SUnit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SUnit->FormValue)) {
            $this->SUnit->addErrorMessage($this->SUnit->getErrorMessage(false));
        }
        if ($this->PurValue->Required) {
            if (!$this->PurValue->IsDetailKey && EmptyValue($this->PurValue->FormValue)) {
                $this->PurValue->addErrorMessage(str_replace("%s", $this->PurValue->caption(), $this->PurValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurValue->FormValue)) {
            $this->PurValue->addErrorMessage($this->PurValue->getErrorMessage(false));
        }
        if ($this->PurRate->Required) {
            if (!$this->PurRate->IsDetailKey && EmptyValue($this->PurRate->FormValue)) {
                $this->PurRate->addErrorMessage(str_replace("%s", $this->PurRate->caption(), $this->PurRate->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PurRate->FormValue)) {
            $this->PurRate->addErrorMessage($this->PurRate->getErrorMessage(false));
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

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // PrName
            $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, $this->PrName->ReadOnly);

            // BATCHNO
            $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, $this->BATCHNO->ReadOnly);

            // MFRCODE
            $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, $this->MFRCODE->ReadOnly);

            // EXPDT
            $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, $this->EXPDT->ReadOnly);

            // PRCODE
            $this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, null, $this->PRCODE->ReadOnly);

            // OQ
            $this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, null, $this->OQ->ReadOnly);

            // RQ
            $this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, null, $this->RQ->ReadOnly);

            // FRQ
            $this->FRQ->setDbValueDef($rsnew, $this->FRQ->CurrentValue, null, $this->FRQ->ReadOnly);

            // IQ
            $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, $this->IQ->ReadOnly);

            // MRQ
            $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, $this->MRQ->ReadOnly);

            // MRP
            $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, $this->MRP->ReadOnly);

            // UR
            $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, $this->UR->ReadOnly);

            // SSGST
            $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, $this->SSGST->ReadOnly);

            // SCGST
            $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, $this->SCGST->ReadOnly);

            // RT
            $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, $this->RT->ReadOnly);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);

            // UM
            $this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, null, $this->UM->ReadOnly);

            // GENNAME
            $this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, null, $this->GENNAME->ReadOnly);

            // BILLDATE
            $this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), null, $this->BILLDATE->ReadOnly);

            // PUnit
            $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, $this->PUnit->ReadOnly);

            // SUnit
            $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, $this->SUnit->ReadOnly);

            // PurValue
            $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, $this->PurValue->ReadOnly);

            // PurRate
            $this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, null, $this->PurRate->ReadOnly);

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
        $hash .= GetFieldHash($row['PRC']); // PRC
        $hash .= GetFieldHash($row['PrName']); // PrName
        $hash .= GetFieldHash($row['BATCHNO']); // BATCHNO
        $hash .= GetFieldHash($row['MFRCODE']); // MFRCODE
        $hash .= GetFieldHash($row['EXPDT']); // EXPDT
        $hash .= GetFieldHash($row['PRCODE']); // PRCODE
        $hash .= GetFieldHash($row['OQ']); // OQ
        $hash .= GetFieldHash($row['RQ']); // RQ
        $hash .= GetFieldHash($row['FRQ']); // FRQ
        $hash .= GetFieldHash($row['IQ']); // IQ
        $hash .= GetFieldHash($row['MRQ']); // MRQ
        $hash .= GetFieldHash($row['MRP']); // MRP
        $hash .= GetFieldHash($row['UR']); // UR
        $hash .= GetFieldHash($row['SSGST']); // SSGST
        $hash .= GetFieldHash($row['SCGST']); // SCGST
        $hash .= GetFieldHash($row['RT']); // RT
        $hash .= GetFieldHash($row['BRCODE']); // BRCODE
        $hash .= GetFieldHash($row['HospID']); // HospID
        $hash .= GetFieldHash($row['UM']); // UM
        $hash .= GetFieldHash($row['GENNAME']); // GENNAME
        $hash .= GetFieldHash($row['BILLDATE']); // BILLDATE
        $hash .= GetFieldHash($row['PUnit']); // PUnit
        $hash .= GetFieldHash($row['SUnit']); // SUnit
        $hash .= GetFieldHash($row['PurValue']); // PurValue
        $hash .= GetFieldHash($row['PurRate']); // PurRate
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

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // BATCHNO
        $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, false);

        // MFRCODE
        $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, false);

        // EXPDT
        $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, false);

        // PRCODE
        $this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, null, false);

        // OQ
        $this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, null, strval($this->OQ->CurrentValue) == "");

        // RQ
        $this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, null, strval($this->RQ->CurrentValue) == "");

        // FRQ
        $this->FRQ->setDbValueDef($rsnew, $this->FRQ->CurrentValue, null, strval($this->FRQ->CurrentValue) == "");

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, strval($this->IQ->CurrentValue) == "");

        // MRQ
        $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, strval($this->MRQ->CurrentValue) == "");

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, strval($this->MRP->CurrentValue) == "");

        // UR
        $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, strval($this->UR->CurrentValue) == "");

        // SSGST
        $this->SSGST->setDbValueDef($rsnew, $this->SSGST->CurrentValue, null, strval($this->SSGST->CurrentValue) == "");

        // SCGST
        $this->SCGST->setDbValueDef($rsnew, $this->SCGST->CurrentValue, null, strval($this->SCGST->CurrentValue) == "");

        // RT
        $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, strval($this->RT->CurrentValue) == "");

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // UM
        $this->UM->setDbValueDef($rsnew, $this->UM->CurrentValue, null, false);

        // GENNAME
        $this->GENNAME->setDbValueDef($rsnew, $this->GENNAME->CurrentValue, null, false);

        // BILLDATE
        $this->BILLDATE->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDATE->CurrentValue, 0), null, false);

        // PUnit
        $this->PUnit->setDbValueDef($rsnew, $this->PUnit->CurrentValue, null, false);

        // SUnit
        $this->SUnit->setDbValueDef($rsnew, $this->SUnit->CurrentValue, null, false);

        // PurValue
        $this->PurValue->setDbValueDef($rsnew, $this->PurValue->CurrentValue, null, false);

        // PurRate
        $this->PurRate->setDbValueDef($rsnew, $this->PurRate->CurrentValue, null, false);

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

    // Load advanced search
    public function loadAdvancedSearch()
    {
        $this->PRC->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->BATCHNO->AdvancedSearch->load();
        $this->BATCH->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->EXPDT->AdvancedSearch->load();
        $this->PRCODE->AdvancedSearch->load();
        $this->OQ->AdvancedSearch->load();
        $this->RQ->AdvancedSearch->load();
        $this->FRQ->AdvancedSearch->load();
        $this->IQ->AdvancedSearch->load();
        $this->MRQ->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->UR->AdvancedSearch->load();
        $this->PC->AdvancedSearch->load();
        $this->OLDRT->AdvancedSearch->load();
        $this->TEMPMRQ->AdvancedSearch->load();
        $this->TAXP->AdvancedSearch->load();
        $this->OLDRATE->AdvancedSearch->load();
        $this->NEWRATE->AdvancedSearch->load();
        $this->OTEMPMRA->AdvancedSearch->load();
        $this->ACTIVESTATUS->AdvancedSearch->load();
        $this->id->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->RT->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->UM->AdvancedSearch->load();
        $this->GENNAME->AdvancedSearch->load();
        $this->BILLDATE->AdvancedSearch->load();
        $this->PUnit->AdvancedSearch->load();
        $this->SUnit->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpharmacy_batchmaslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpharmacy_batchmaslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpharmacy_batchmaslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_pharmacy_batchmas" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pharmacy_batchmas\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpharmacy_batchmaslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_batchmaslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"PharmacyBatchmasSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"pharmacy_batchmas\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'PharmacyBatchmasSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpharmacy_batchmaslistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_PrName":
                    break;
                case "x_BRCODE":
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
    public function pageLoad() {
    	//echo "Page Load";
    	$this->GridAddRowCount = 10;
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
