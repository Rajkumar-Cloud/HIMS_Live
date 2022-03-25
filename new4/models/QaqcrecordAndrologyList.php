<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class QaqcrecordAndrologyList extends QaqcrecordAndrology
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'qaqcrecord_andrology';

    // Page object name
    public $PageObjName = "QaqcrecordAndrologyList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fqaqcrecord_andrologylist";
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

        // Table object (qaqcrecord_andrology)
        if (!isset($GLOBALS["qaqcrecord_andrology"]) || get_class($GLOBALS["qaqcrecord_andrology"]) == PROJECT_NAMESPACE . "qaqcrecord_andrology") {
            $GLOBALS["qaqcrecord_andrology"] = &$this;
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
        $this->AddUrl = "QaqcrecordAndrologyAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "QaqcrecordAndrologyDelete";
        $this->MultiUpdateUrl = "QaqcrecordAndrologyUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'qaqcrecord_andrology');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fqaqcrecord_andrologylistsrch";

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
                $doc = new $class(Container("qaqcrecord_andrology"));
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
            $this->Createdby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->CreatedDate->Visible = false;
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
        $this->id->setVisibility();
        $this->Date->setVisibility();
        $this->LN2_Level->setVisibility();
        $this->LN2_Checked->setVisibility();
        $this->Incubator_Temp->setVisibility();
        $this->Incubator_Cleaned->setVisibility();
        $this->LAF_MG->setVisibility();
        $this->LAF_Cleaned->setVisibility();
        $this->REF_Temp->setVisibility();
        $this->REF_Cleaned->setVisibility();
        $this->Heating_Temp->setVisibility();
        $this->Heating_Cleaned->setVisibility();
        $this->Createdby->setVisibility();
        $this->CreatedDate->setVisibility();
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

                // Switch to inline edit mode
                if ($this->isEdit()) {
                    $this->inlineEditMode();
                }

                // Switch to inline add mode
                if ($this->isAdd() || $this->isCopy()) {
                    $this->inlineAddMode();
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

                    // Inline Update
                    if (($this->isUpdate() || $this->isOverwrite()) && Session(SESSION_INLINE_MODE) == "edit") {
                        $this->setKey(Post($this->OldKeyName));
                        $this->inlineUpdate();
                    }

                    // Insert Inline
                    if ($this->isInsert() && Session(SESSION_INLINE_MODE) == "add") {
                        $this->setKey(Post($this->OldKeyName));
                        $this->inlineInsert();
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
        $this->LN2_Level->FormValue = ""; // Clear form value
        $this->Incubator_Temp->FormValue = ""; // Clear form value
        $this->LAF_MG->FormValue = ""; // Clear form value
        $this->REF_Temp->FormValue = ""; // Clear form value
        $this->Heating_Temp->FormValue = ""; // Clear form value
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

    // Switch to Inline Edit mode
    protected function inlineEditMode()
    {
        global $Security, $Language;
        if (!$Security->canEdit()) {
            return false; // Edit not allowed
        }
        $inlineEdit = true;
        if (($keyValue = Get("id") ?? Route("id")) !== null) {
            $this->id->setQueryStringValue($keyValue);
        } else {
            $inlineEdit = false;
        }
        if ($inlineEdit) {
            if ($this->loadRow()) {
                $this->OldKey = $this->getKey(true); // Get from CurrentValue
                $this->setKey($this->OldKey); // Set to OldValue
                $_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
            }
        }
        return true;
    }

    // Perform update to Inline Edit record
    protected function inlineUpdate()
    {
        global $Language, $CurrentForm;
        $CurrentForm->Index = 1;
        $this->loadFormValues(); // Get form values

        // Validate form
        $inlineUpdate = true;
        if (!$this->validateForm()) {
            $inlineUpdate = false; // Form error, reset action
        } else {
            $inlineUpdate = false;
            $this->SendEmail = true; // Send email on update success
            $inlineUpdate = $this->editRow(); // Update record
        }
        if ($inlineUpdate) { // Update success
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
            }
            $this->EventCancelled = true; // Cancel event
            $this->CurrentAction = "edit"; // Stay in edit mode
        }
    }

    // Check Inline Edit key
    public function checkInlineEditKey()
    {
        if (!SameString($this->id->OldValue, $this->id->CurrentValue)) {
            return false;
        }
        return true;
    }

    // Switch to Inline Add mode
    protected function inlineAddMode()
    {
        global $Security, $Language;
        if (!$Security->canAdd()) {
            return false; // Add not allowed
        }
        if ($this->isCopy()) {
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            } else {
                $this->CurrentAction = "add";
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
        } else {
            $this->OldKey = ""; // Clear old record key
        }
        $this->setKey($this->OldKey); // Set to OldValue
        $_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
        return true;
    }

    // Perform update to Inline Add/Copy record
    protected function inlineInsert()
    {
        global $Language, $CurrentForm;
        $this->loadOldRecord(); // Load old record
        $CurrentForm->Index = 0;
        $this->loadFormValues(); // Get form values

        // Validate form
        if (!$this->validateForm()) {
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
            return;
        }
        $this->SendEmail = true; // Send email on add success
        if ($this->addRow($this->OldRecordset)) { // Add record
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
            }
            $this->clearInlineMode(); // Clear inline add mode
        } else { // Add failed
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
        }
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
        if ($CurrentForm->hasValue("x_Date") && $CurrentForm->hasValue("o_Date") && $this->Date->CurrentValue != $this->Date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LN2_Level") && $CurrentForm->hasValue("o_LN2_Level") && $this->LN2_Level->CurrentValue != $this->LN2_Level->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LN2_Checked") && $CurrentForm->hasValue("o_LN2_Checked") && $this->LN2_Checked->CurrentValue != $this->LN2_Checked->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Incubator_Temp") && $CurrentForm->hasValue("o_Incubator_Temp") && $this->Incubator_Temp->CurrentValue != $this->Incubator_Temp->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Incubator_Cleaned") && $CurrentForm->hasValue("o_Incubator_Cleaned") && $this->Incubator_Cleaned->CurrentValue != $this->Incubator_Cleaned->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LAF_MG") && $CurrentForm->hasValue("o_LAF_MG") && $this->LAF_MG->CurrentValue != $this->LAF_MG->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LAF_Cleaned") && $CurrentForm->hasValue("o_LAF_Cleaned") && $this->LAF_Cleaned->CurrentValue != $this->LAF_Cleaned->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_REF_Temp") && $CurrentForm->hasValue("o_REF_Temp") && $this->REF_Temp->CurrentValue != $this->REF_Temp->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_REF_Cleaned") && $CurrentForm->hasValue("o_REF_Cleaned") && $this->REF_Cleaned->CurrentValue != $this->REF_Cleaned->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Heating_Temp") && $CurrentForm->hasValue("o_Heating_Temp") && $this->Heating_Temp->CurrentValue != $this->Heating_Temp->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Heating_Cleaned") && $CurrentForm->hasValue("o_Heating_Cleaned") && $this->Heating_Cleaned->CurrentValue != $this->Heating_Cleaned->OldValue) {
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
        $this->id->clearErrorMessage();
        $this->Date->clearErrorMessage();
        $this->LN2_Level->clearErrorMessage();
        $this->LN2_Checked->clearErrorMessage();
        $this->Incubator_Temp->clearErrorMessage();
        $this->Incubator_Cleaned->clearErrorMessage();
        $this->LAF_MG->clearErrorMessage();
        $this->LAF_Cleaned->clearErrorMessage();
        $this->REF_Temp->clearErrorMessage();
        $this->REF_Cleaned->clearErrorMessage();
        $this->Heating_Temp->clearErrorMessage();
        $this->Heating_Cleaned->clearErrorMessage();
        $this->Createdby->clearErrorMessage();
        $this->CreatedDate->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fqaqcrecord_andrologylistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->Date->AdvancedSearch->toJson(), ","); // Field Date
        $filterList = Concat($filterList, $this->LN2_Level->AdvancedSearch->toJson(), ","); // Field LN2_Level
        $filterList = Concat($filterList, $this->LN2_Checked->AdvancedSearch->toJson(), ","); // Field LN2_Checked
        $filterList = Concat($filterList, $this->Incubator_Temp->AdvancedSearch->toJson(), ","); // Field Incubator_Temp
        $filterList = Concat($filterList, $this->Incubator_Cleaned->AdvancedSearch->toJson(), ","); // Field Incubator_Cleaned
        $filterList = Concat($filterList, $this->LAF_MG->AdvancedSearch->toJson(), ","); // Field LAF_MG
        $filterList = Concat($filterList, $this->LAF_Cleaned->AdvancedSearch->toJson(), ","); // Field LAF_Cleaned
        $filterList = Concat($filterList, $this->REF_Temp->AdvancedSearch->toJson(), ","); // Field REF_Temp
        $filterList = Concat($filterList, $this->REF_Cleaned->AdvancedSearch->toJson(), ","); // Field REF_Cleaned
        $filterList = Concat($filterList, $this->Heating_Temp->AdvancedSearch->toJson(), ","); // Field Heating_Temp
        $filterList = Concat($filterList, $this->Heating_Cleaned->AdvancedSearch->toJson(), ","); // Field Heating_Cleaned
        $filterList = Concat($filterList, $this->Createdby->AdvancedSearch->toJson(), ","); // Field Createdby
        $filterList = Concat($filterList, $this->CreatedDate->AdvancedSearch->toJson(), ","); // Field CreatedDate
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fqaqcrecord_andrologylistsrch", $filters);
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

        // Field Date
        $this->Date->AdvancedSearch->SearchValue = @$filter["x_Date"];
        $this->Date->AdvancedSearch->SearchOperator = @$filter["z_Date"];
        $this->Date->AdvancedSearch->SearchCondition = @$filter["v_Date"];
        $this->Date->AdvancedSearch->SearchValue2 = @$filter["y_Date"];
        $this->Date->AdvancedSearch->SearchOperator2 = @$filter["w_Date"];
        $this->Date->AdvancedSearch->save();

        // Field LN2_Level
        $this->LN2_Level->AdvancedSearch->SearchValue = @$filter["x_LN2_Level"];
        $this->LN2_Level->AdvancedSearch->SearchOperator = @$filter["z_LN2_Level"];
        $this->LN2_Level->AdvancedSearch->SearchCondition = @$filter["v_LN2_Level"];
        $this->LN2_Level->AdvancedSearch->SearchValue2 = @$filter["y_LN2_Level"];
        $this->LN2_Level->AdvancedSearch->SearchOperator2 = @$filter["w_LN2_Level"];
        $this->LN2_Level->AdvancedSearch->save();

        // Field LN2_Checked
        $this->LN2_Checked->AdvancedSearch->SearchValue = @$filter["x_LN2_Checked"];
        $this->LN2_Checked->AdvancedSearch->SearchOperator = @$filter["z_LN2_Checked"];
        $this->LN2_Checked->AdvancedSearch->SearchCondition = @$filter["v_LN2_Checked"];
        $this->LN2_Checked->AdvancedSearch->SearchValue2 = @$filter["y_LN2_Checked"];
        $this->LN2_Checked->AdvancedSearch->SearchOperator2 = @$filter["w_LN2_Checked"];
        $this->LN2_Checked->AdvancedSearch->save();

        // Field Incubator_Temp
        $this->Incubator_Temp->AdvancedSearch->SearchValue = @$filter["x_Incubator_Temp"];
        $this->Incubator_Temp->AdvancedSearch->SearchOperator = @$filter["z_Incubator_Temp"];
        $this->Incubator_Temp->AdvancedSearch->SearchCondition = @$filter["v_Incubator_Temp"];
        $this->Incubator_Temp->AdvancedSearch->SearchValue2 = @$filter["y_Incubator_Temp"];
        $this->Incubator_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator_Temp"];
        $this->Incubator_Temp->AdvancedSearch->save();

        // Field Incubator_Cleaned
        $this->Incubator_Cleaned->AdvancedSearch->SearchValue = @$filter["x_Incubator_Cleaned"];
        $this->Incubator_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_Incubator_Cleaned"];
        $this->Incubator_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_Incubator_Cleaned"];
        $this->Incubator_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_Incubator_Cleaned"];
        $this->Incubator_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator_Cleaned"];
        $this->Incubator_Cleaned->AdvancedSearch->save();

        // Field LAF_MG
        $this->LAF_MG->AdvancedSearch->SearchValue = @$filter["x_LAF_MG"];
        $this->LAF_MG->AdvancedSearch->SearchOperator = @$filter["z_LAF_MG"];
        $this->LAF_MG->AdvancedSearch->SearchCondition = @$filter["v_LAF_MG"];
        $this->LAF_MG->AdvancedSearch->SearchValue2 = @$filter["y_LAF_MG"];
        $this->LAF_MG->AdvancedSearch->SearchOperator2 = @$filter["w_LAF_MG"];
        $this->LAF_MG->AdvancedSearch->save();

        // Field LAF_Cleaned
        $this->LAF_Cleaned->AdvancedSearch->SearchValue = @$filter["x_LAF_Cleaned"];
        $this->LAF_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_LAF_Cleaned"];
        $this->LAF_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_LAF_Cleaned"];
        $this->LAF_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_LAF_Cleaned"];
        $this->LAF_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_LAF_Cleaned"];
        $this->LAF_Cleaned->AdvancedSearch->save();

        // Field REF_Temp
        $this->REF_Temp->AdvancedSearch->SearchValue = @$filter["x_REF_Temp"];
        $this->REF_Temp->AdvancedSearch->SearchOperator = @$filter["z_REF_Temp"];
        $this->REF_Temp->AdvancedSearch->SearchCondition = @$filter["v_REF_Temp"];
        $this->REF_Temp->AdvancedSearch->SearchValue2 = @$filter["y_REF_Temp"];
        $this->REF_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_REF_Temp"];
        $this->REF_Temp->AdvancedSearch->save();

        // Field REF_Cleaned
        $this->REF_Cleaned->AdvancedSearch->SearchValue = @$filter["x_REF_Cleaned"];
        $this->REF_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_REF_Cleaned"];
        $this->REF_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_REF_Cleaned"];
        $this->REF_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_REF_Cleaned"];
        $this->REF_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_REF_Cleaned"];
        $this->REF_Cleaned->AdvancedSearch->save();

        // Field Heating_Temp
        $this->Heating_Temp->AdvancedSearch->SearchValue = @$filter["x_Heating_Temp"];
        $this->Heating_Temp->AdvancedSearch->SearchOperator = @$filter["z_Heating_Temp"];
        $this->Heating_Temp->AdvancedSearch->SearchCondition = @$filter["v_Heating_Temp"];
        $this->Heating_Temp->AdvancedSearch->SearchValue2 = @$filter["y_Heating_Temp"];
        $this->Heating_Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Heating_Temp"];
        $this->Heating_Temp->AdvancedSearch->save();

        // Field Heating_Cleaned
        $this->Heating_Cleaned->AdvancedSearch->SearchValue = @$filter["x_Heating_Cleaned"];
        $this->Heating_Cleaned->AdvancedSearch->SearchOperator = @$filter["z_Heating_Cleaned"];
        $this->Heating_Cleaned->AdvancedSearch->SearchCondition = @$filter["v_Heating_Cleaned"];
        $this->Heating_Cleaned->AdvancedSearch->SearchValue2 = @$filter["y_Heating_Cleaned"];
        $this->Heating_Cleaned->AdvancedSearch->SearchOperator2 = @$filter["w_Heating_Cleaned"];
        $this->Heating_Cleaned->AdvancedSearch->save();

        // Field Createdby
        $this->Createdby->AdvancedSearch->SearchValue = @$filter["x_Createdby"];
        $this->Createdby->AdvancedSearch->SearchOperator = @$filter["z_Createdby"];
        $this->Createdby->AdvancedSearch->SearchCondition = @$filter["v_Createdby"];
        $this->Createdby->AdvancedSearch->SearchValue2 = @$filter["y_Createdby"];
        $this->Createdby->AdvancedSearch->SearchOperator2 = @$filter["w_Createdby"];
        $this->Createdby->AdvancedSearch->save();

        // Field CreatedDate
        $this->CreatedDate->AdvancedSearch->SearchValue = @$filter["x_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchOperator = @$filter["z_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchCondition = @$filter["v_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDate"];
        $this->CreatedDate->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->Date, $default, false); // Date
        $this->buildSearchSql($where, $this->LN2_Level, $default, false); // LN2_Level
        $this->buildSearchSql($where, $this->LN2_Checked, $default, true); // LN2_Checked
        $this->buildSearchSql($where, $this->Incubator_Temp, $default, false); // Incubator_Temp
        $this->buildSearchSql($where, $this->Incubator_Cleaned, $default, true); // Incubator_Cleaned
        $this->buildSearchSql($where, $this->LAF_MG, $default, false); // LAF_MG
        $this->buildSearchSql($where, $this->LAF_Cleaned, $default, true); // LAF_Cleaned
        $this->buildSearchSql($where, $this->REF_Temp, $default, false); // REF_Temp
        $this->buildSearchSql($where, $this->REF_Cleaned, $default, true); // REF_Cleaned
        $this->buildSearchSql($where, $this->Heating_Temp, $default, false); // Heating_Temp
        $this->buildSearchSql($where, $this->Heating_Cleaned, $default, true); // Heating_Cleaned
        $this->buildSearchSql($where, $this->Createdby, $default, false); // Createdby
        $this->buildSearchSql($where, $this->CreatedDate, $default, false); // CreatedDate

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->Date->AdvancedSearch->save(); // Date
            $this->LN2_Level->AdvancedSearch->save(); // LN2_Level
            $this->LN2_Checked->AdvancedSearch->save(); // LN2_Checked
            $this->Incubator_Temp->AdvancedSearch->save(); // Incubator_Temp
            $this->Incubator_Cleaned->AdvancedSearch->save(); // Incubator_Cleaned
            $this->LAF_MG->AdvancedSearch->save(); // LAF_MG
            $this->LAF_Cleaned->AdvancedSearch->save(); // LAF_Cleaned
            $this->REF_Temp->AdvancedSearch->save(); // REF_Temp
            $this->REF_Cleaned->AdvancedSearch->save(); // REF_Cleaned
            $this->Heating_Temp->AdvancedSearch->save(); // Heating_Temp
            $this->Heating_Cleaned->AdvancedSearch->save(); // Heating_Cleaned
            $this->Createdby->AdvancedSearch->save(); // Createdby
            $this->CreatedDate->AdvancedSearch->save(); // CreatedDate
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
        $this->buildBasicSearchSql($where, $this->LN2_Checked, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Incubator_Cleaned, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LAF_Cleaned, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->REF_Cleaned, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Heating_Cleaned, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Createdby, $arKeywords, $type);
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
        if ($this->Date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LN2_Level->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LN2_Checked->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Incubator_Temp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Incubator_Cleaned->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LAF_MG->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LAF_Cleaned->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->REF_Temp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->REF_Cleaned->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Heating_Temp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Heating_Cleaned->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Createdby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedDate->AdvancedSearch->issetSession()) {
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
                $this->Date->AdvancedSearch->unsetSession();
                $this->LN2_Level->AdvancedSearch->unsetSession();
                $this->LN2_Checked->AdvancedSearch->unsetSession();
                $this->Incubator_Temp->AdvancedSearch->unsetSession();
                $this->Incubator_Cleaned->AdvancedSearch->unsetSession();
                $this->LAF_MG->AdvancedSearch->unsetSession();
                $this->LAF_Cleaned->AdvancedSearch->unsetSession();
                $this->REF_Temp->AdvancedSearch->unsetSession();
                $this->REF_Cleaned->AdvancedSearch->unsetSession();
                $this->Heating_Temp->AdvancedSearch->unsetSession();
                $this->Heating_Cleaned->AdvancedSearch->unsetSession();
                $this->Createdby->AdvancedSearch->unsetSession();
                $this->CreatedDate->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->Date->AdvancedSearch->load();
                $this->LN2_Level->AdvancedSearch->load();
                $this->LN2_Checked->AdvancedSearch->load();
                $this->Incubator_Temp->AdvancedSearch->load();
                $this->Incubator_Cleaned->AdvancedSearch->load();
                $this->LAF_MG->AdvancedSearch->load();
                $this->LAF_Cleaned->AdvancedSearch->load();
                $this->REF_Temp->AdvancedSearch->load();
                $this->REF_Cleaned->AdvancedSearch->load();
                $this->Heating_Temp->AdvancedSearch->load();
                $this->Heating_Cleaned->AdvancedSearch->load();
                $this->Createdby->AdvancedSearch->load();
                $this->CreatedDate->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->Date); // Date
            $this->updateSort($this->LN2_Level); // LN2_Level
            $this->updateSort($this->LN2_Checked); // LN2_Checked
            $this->updateSort($this->Incubator_Temp); // Incubator_Temp
            $this->updateSort($this->Incubator_Cleaned); // Incubator_Cleaned
            $this->updateSort($this->LAF_MG); // LAF_MG
            $this->updateSort($this->LAF_Cleaned); // LAF_Cleaned
            $this->updateSort($this->REF_Temp); // REF_Temp
            $this->updateSort($this->REF_Cleaned); // REF_Cleaned
            $this->updateSort($this->Heating_Temp); // Heating_Temp
            $this->updateSort($this->Heating_Cleaned); // Heating_Cleaned
            $this->updateSort($this->Createdby); // Createdby
            $this->updateSort($this->CreatedDate); // CreatedDate
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
                $this->Date->setSort("");
                $this->LN2_Level->setSort("");
                $this->LN2_Checked->setSort("");
                $this->Incubator_Temp->setSort("");
                $this->Incubator_Cleaned->setSort("");
                $this->LAF_MG->setSort("");
                $this->LAF_Cleaned->setSort("");
                $this->REF_Temp->setSort("");
                $this->REF_Cleaned->setSort("");
                $this->Heating_Temp->setSort("");
                $this->Heating_Cleaned->setSort("");
                $this->Createdby->setSort("");
                $this->CreatedDate->setSort("");
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

        // "copy"
        $opt = $this->ListOptions["copy"];
        if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
            $this->ListOptions->CustomItem = "copy"; // Show copy column only
            $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
            $opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
            "<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
            "<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
            "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
            return;
        }

        // "edit"
        $opt = $this->ListOptions["edit"];
        if ($this->isInlineEditRow()) { // Inline-Edit
            $this->ListOptions->CustomItem = "edit"; // Show edit column only
            $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
                "<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . UrlAddHash($this->pageName(), "r" . $this->RowCount . "_" . $this->TableVar) . "'); return false;\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
                "<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
                "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
            $opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\">";
            return;
        }
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
                $opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash(GetUrl($this->InlineEditUrl), "r" . $this->RowCount . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if ($Security->canAdd()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
                $opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineCopyUrl)) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
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

        // Inline Add
        $item = &$option->add("inlineadd");
        $item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineAddUrl)) . "\">" . $Language->phrase("InlineAddLink") . "</a>";
        $item->Visible = $this->InlineAddUrl != "" && $Security->canAdd();
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fqaqcrecord_andrologylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fqaqcrecord_andrologylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fqaqcrecord_andrologylist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Date->CurrentValue = null;
        $this->Date->OldValue = $this->Date->CurrentValue;
        $this->LN2_Level->CurrentValue = null;
        $this->LN2_Level->OldValue = $this->LN2_Level->CurrentValue;
        $this->LN2_Checked->CurrentValue = null;
        $this->LN2_Checked->OldValue = $this->LN2_Checked->CurrentValue;
        $this->Incubator_Temp->CurrentValue = null;
        $this->Incubator_Temp->OldValue = $this->Incubator_Temp->CurrentValue;
        $this->Incubator_Cleaned->CurrentValue = null;
        $this->Incubator_Cleaned->OldValue = $this->Incubator_Cleaned->CurrentValue;
        $this->LAF_MG->CurrentValue = null;
        $this->LAF_MG->OldValue = $this->LAF_MG->CurrentValue;
        $this->LAF_Cleaned->CurrentValue = null;
        $this->LAF_Cleaned->OldValue = $this->LAF_Cleaned->CurrentValue;
        $this->REF_Temp->CurrentValue = null;
        $this->REF_Temp->OldValue = $this->REF_Temp->CurrentValue;
        $this->REF_Cleaned->CurrentValue = null;
        $this->REF_Cleaned->OldValue = $this->REF_Cleaned->CurrentValue;
        $this->Heating_Temp->CurrentValue = null;
        $this->Heating_Temp->OldValue = $this->Heating_Temp->CurrentValue;
        $this->Heating_Cleaned->CurrentValue = null;
        $this->Heating_Cleaned->OldValue = $this->Heating_Cleaned->CurrentValue;
        $this->Createdby->CurrentValue = null;
        $this->Createdby->OldValue = $this->Createdby->CurrentValue;
        $this->CreatedDate->CurrentValue = null;
        $this->CreatedDate->OldValue = $this->CreatedDate->CurrentValue;
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

        // Date
        if (!$this->isAddOrEdit() && $this->Date->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Date->AdvancedSearch->SearchValue != "" || $this->Date->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LN2_Level
        if (!$this->isAddOrEdit() && $this->LN2_Level->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LN2_Level->AdvancedSearch->SearchValue != "" || $this->LN2_Level->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LN2_Checked
        if (!$this->isAddOrEdit() && $this->LN2_Checked->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LN2_Checked->AdvancedSearch->SearchValue != "" || $this->LN2_Checked->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->LN2_Checked->AdvancedSearch->SearchValue)) {
            $this->LN2_Checked->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->LN2_Checked->AdvancedSearch->SearchValue);
        }
        if (is_array($this->LN2_Checked->AdvancedSearch->SearchValue2)) {
            $this->LN2_Checked->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->LN2_Checked->AdvancedSearch->SearchValue2);
        }

        // Incubator_Temp
        if (!$this->isAddOrEdit() && $this->Incubator_Temp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Incubator_Temp->AdvancedSearch->SearchValue != "" || $this->Incubator_Temp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Incubator_Cleaned
        if (!$this->isAddOrEdit() && $this->Incubator_Cleaned->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Incubator_Cleaned->AdvancedSearch->SearchValue != "" || $this->Incubator_Cleaned->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->Incubator_Cleaned->AdvancedSearch->SearchValue)) {
            $this->Incubator_Cleaned->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Incubator_Cleaned->AdvancedSearch->SearchValue);
        }
        if (is_array($this->Incubator_Cleaned->AdvancedSearch->SearchValue2)) {
            $this->Incubator_Cleaned->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Incubator_Cleaned->AdvancedSearch->SearchValue2);
        }

        // LAF_MG
        if (!$this->isAddOrEdit() && $this->LAF_MG->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LAF_MG->AdvancedSearch->SearchValue != "" || $this->LAF_MG->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LAF_Cleaned
        if (!$this->isAddOrEdit() && $this->LAF_Cleaned->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LAF_Cleaned->AdvancedSearch->SearchValue != "" || $this->LAF_Cleaned->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->LAF_Cleaned->AdvancedSearch->SearchValue)) {
            $this->LAF_Cleaned->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->LAF_Cleaned->AdvancedSearch->SearchValue);
        }
        if (is_array($this->LAF_Cleaned->AdvancedSearch->SearchValue2)) {
            $this->LAF_Cleaned->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->LAF_Cleaned->AdvancedSearch->SearchValue2);
        }

        // REF_Temp
        if (!$this->isAddOrEdit() && $this->REF_Temp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->REF_Temp->AdvancedSearch->SearchValue != "" || $this->REF_Temp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // REF_Cleaned
        if (!$this->isAddOrEdit() && $this->REF_Cleaned->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->REF_Cleaned->AdvancedSearch->SearchValue != "" || $this->REF_Cleaned->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->REF_Cleaned->AdvancedSearch->SearchValue)) {
            $this->REF_Cleaned->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->REF_Cleaned->AdvancedSearch->SearchValue);
        }
        if (is_array($this->REF_Cleaned->AdvancedSearch->SearchValue2)) {
            $this->REF_Cleaned->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->REF_Cleaned->AdvancedSearch->SearchValue2);
        }

        // Heating_Temp
        if (!$this->isAddOrEdit() && $this->Heating_Temp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Heating_Temp->AdvancedSearch->SearchValue != "" || $this->Heating_Temp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Heating_Cleaned
        if (!$this->isAddOrEdit() && $this->Heating_Cleaned->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Heating_Cleaned->AdvancedSearch->SearchValue != "" || $this->Heating_Cleaned->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->Heating_Cleaned->AdvancedSearch->SearchValue)) {
            $this->Heating_Cleaned->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Heating_Cleaned->AdvancedSearch->SearchValue);
        }
        if (is_array($this->Heating_Cleaned->AdvancedSearch->SearchValue2)) {
            $this->Heating_Cleaned->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->Heating_Cleaned->AdvancedSearch->SearchValue2);
        }

        // Createdby
        if (!$this->isAddOrEdit() && $this->Createdby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Createdby->AdvancedSearch->SearchValue != "" || $this->Createdby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CreatedDate
        if (!$this->isAddOrEdit() && $this->CreatedDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CreatedDate->AdvancedSearch->SearchValue != "" || $this->CreatedDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }

        // Check field name 'Date' first before field var 'x_Date'
        $val = $CurrentForm->hasValue("Date") ? $CurrentForm->getValue("Date") : $CurrentForm->getValue("x_Date");
        if (!$this->Date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Date->Visible = false; // Disable update for API request
            } else {
                $this->Date->setFormValue($val);
            }
            $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_Date")) {
            $this->Date->setOldValue($CurrentForm->getValue("o_Date"));
        }

        // Check field name 'LN2_Level' first before field var 'x_LN2_Level'
        $val = $CurrentForm->hasValue("LN2_Level") ? $CurrentForm->getValue("LN2_Level") : $CurrentForm->getValue("x_LN2_Level");
        if (!$this->LN2_Level->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LN2_Level->Visible = false; // Disable update for API request
            } else {
                $this->LN2_Level->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LN2_Level")) {
            $this->LN2_Level->setOldValue($CurrentForm->getValue("o_LN2_Level"));
        }

        // Check field name 'LN2_Checked' first before field var 'x_LN2_Checked'
        $val = $CurrentForm->hasValue("LN2_Checked") ? $CurrentForm->getValue("LN2_Checked") : $CurrentForm->getValue("x_LN2_Checked");
        if (!$this->LN2_Checked->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LN2_Checked->Visible = false; // Disable update for API request
            } else {
                $this->LN2_Checked->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LN2_Checked")) {
            $this->LN2_Checked->setOldValue($CurrentForm->getValue("o_LN2_Checked"));
        }

        // Check field name 'Incubator_Temp' first before field var 'x_Incubator_Temp'
        $val = $CurrentForm->hasValue("Incubator_Temp") ? $CurrentForm->getValue("Incubator_Temp") : $CurrentForm->getValue("x_Incubator_Temp");
        if (!$this->Incubator_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator_Temp->Visible = false; // Disable update for API request
            } else {
                $this->Incubator_Temp->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Incubator_Temp")) {
            $this->Incubator_Temp->setOldValue($CurrentForm->getValue("o_Incubator_Temp"));
        }

        // Check field name 'Incubator_Cleaned' first before field var 'x_Incubator_Cleaned'
        $val = $CurrentForm->hasValue("Incubator_Cleaned") ? $CurrentForm->getValue("Incubator_Cleaned") : $CurrentForm->getValue("x_Incubator_Cleaned");
        if (!$this->Incubator_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->Incubator_Cleaned->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Incubator_Cleaned")) {
            $this->Incubator_Cleaned->setOldValue($CurrentForm->getValue("o_Incubator_Cleaned"));
        }

        // Check field name 'LAF_MG' first before field var 'x_LAF_MG'
        $val = $CurrentForm->hasValue("LAF_MG") ? $CurrentForm->getValue("LAF_MG") : $CurrentForm->getValue("x_LAF_MG");
        if (!$this->LAF_MG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LAF_MG->Visible = false; // Disable update for API request
            } else {
                $this->LAF_MG->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LAF_MG")) {
            $this->LAF_MG->setOldValue($CurrentForm->getValue("o_LAF_MG"));
        }

        // Check field name 'LAF_Cleaned' first before field var 'x_LAF_Cleaned'
        $val = $CurrentForm->hasValue("LAF_Cleaned") ? $CurrentForm->getValue("LAF_Cleaned") : $CurrentForm->getValue("x_LAF_Cleaned");
        if (!$this->LAF_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LAF_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->LAF_Cleaned->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LAF_Cleaned")) {
            $this->LAF_Cleaned->setOldValue($CurrentForm->getValue("o_LAF_Cleaned"));
        }

        // Check field name 'REF_Temp' first before field var 'x_REF_Temp'
        $val = $CurrentForm->hasValue("REF_Temp") ? $CurrentForm->getValue("REF_Temp") : $CurrentForm->getValue("x_REF_Temp");
        if (!$this->REF_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REF_Temp->Visible = false; // Disable update for API request
            } else {
                $this->REF_Temp->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_REF_Temp")) {
            $this->REF_Temp->setOldValue($CurrentForm->getValue("o_REF_Temp"));
        }

        // Check field name 'REF_Cleaned' first before field var 'x_REF_Cleaned'
        $val = $CurrentForm->hasValue("REF_Cleaned") ? $CurrentForm->getValue("REF_Cleaned") : $CurrentForm->getValue("x_REF_Cleaned");
        if (!$this->REF_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->REF_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->REF_Cleaned->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_REF_Cleaned")) {
            $this->REF_Cleaned->setOldValue($CurrentForm->getValue("o_REF_Cleaned"));
        }

        // Check field name 'Heating_Temp' first before field var 'x_Heating_Temp'
        $val = $CurrentForm->hasValue("Heating_Temp") ? $CurrentForm->getValue("Heating_Temp") : $CurrentForm->getValue("x_Heating_Temp");
        if (!$this->Heating_Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Heating_Temp->Visible = false; // Disable update for API request
            } else {
                $this->Heating_Temp->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Heating_Temp")) {
            $this->Heating_Temp->setOldValue($CurrentForm->getValue("o_Heating_Temp"));
        }

        // Check field name 'Heating_Cleaned' first before field var 'x_Heating_Cleaned'
        $val = $CurrentForm->hasValue("Heating_Cleaned") ? $CurrentForm->getValue("Heating_Cleaned") : $CurrentForm->getValue("x_Heating_Cleaned");
        if (!$this->Heating_Cleaned->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Heating_Cleaned->Visible = false; // Disable update for API request
            } else {
                $this->Heating_Cleaned->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Heating_Cleaned")) {
            $this->Heating_Cleaned->setOldValue($CurrentForm->getValue("o_Heating_Cleaned"));
        }

        // Check field name 'Createdby' first before field var 'x_Createdby'
        $val = $CurrentForm->hasValue("Createdby") ? $CurrentForm->getValue("Createdby") : $CurrentForm->getValue("x_Createdby");
        if (!$this->Createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Createdby->Visible = false; // Disable update for API request
            } else {
                $this->Createdby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Createdby")) {
            $this->Createdby->setOldValue($CurrentForm->getValue("o_Createdby"));
        }

        // Check field name 'CreatedDate' first before field var 'x_CreatedDate'
        $val = $CurrentForm->hasValue("CreatedDate") ? $CurrentForm->getValue("CreatedDate") : $CurrentForm->getValue("x_CreatedDate");
        if (!$this->CreatedDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDate->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDate->setFormValue($val);
            }
            $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_CreatedDate")) {
            $this->CreatedDate->setOldValue($CurrentForm->getValue("o_CreatedDate"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->Date->CurrentValue = $this->Date->FormValue;
        $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        $this->LN2_Level->CurrentValue = $this->LN2_Level->FormValue;
        $this->LN2_Checked->CurrentValue = $this->LN2_Checked->FormValue;
        $this->Incubator_Temp->CurrentValue = $this->Incubator_Temp->FormValue;
        $this->Incubator_Cleaned->CurrentValue = $this->Incubator_Cleaned->FormValue;
        $this->LAF_MG->CurrentValue = $this->LAF_MG->FormValue;
        $this->LAF_Cleaned->CurrentValue = $this->LAF_Cleaned->FormValue;
        $this->REF_Temp->CurrentValue = $this->REF_Temp->FormValue;
        $this->REF_Cleaned->CurrentValue = $this->REF_Cleaned->FormValue;
        $this->Heating_Temp->CurrentValue = $this->Heating_Temp->FormValue;
        $this->Heating_Cleaned->CurrentValue = $this->Heating_Cleaned->FormValue;
        $this->Createdby->CurrentValue = $this->Createdby->FormValue;
        $this->CreatedDate->CurrentValue = $this->CreatedDate->FormValue;
        $this->CreatedDate->CurrentValue = UnFormatDateTime($this->CreatedDate->CurrentValue, 0);
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
        $this->Date->setDbValue($row['Date']);
        $this->LN2_Level->setDbValue($row['LN2_Level']);
        $this->LN2_Checked->setDbValue($row['LN2_Checked']);
        $this->Incubator_Temp->setDbValue($row['Incubator_Temp']);
        $this->Incubator_Cleaned->setDbValue($row['Incubator_Cleaned']);
        $this->LAF_MG->setDbValue($row['LAF_MG']);
        $this->LAF_Cleaned->setDbValue($row['LAF_Cleaned']);
        $this->REF_Temp->setDbValue($row['REF_Temp']);
        $this->REF_Cleaned->setDbValue($row['REF_Cleaned']);
        $this->Heating_Temp->setDbValue($row['Heating_Temp']);
        $this->Heating_Cleaned->setDbValue($row['Heating_Cleaned']);
        $this->Createdby->setDbValue($row['Createdby']);
        $this->CreatedDate->setDbValue($row['CreatedDate']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Date'] = $this->Date->CurrentValue;
        $row['LN2_Level'] = $this->LN2_Level->CurrentValue;
        $row['LN2_Checked'] = $this->LN2_Checked->CurrentValue;
        $row['Incubator_Temp'] = $this->Incubator_Temp->CurrentValue;
        $row['Incubator_Cleaned'] = $this->Incubator_Cleaned->CurrentValue;
        $row['LAF_MG'] = $this->LAF_MG->CurrentValue;
        $row['LAF_Cleaned'] = $this->LAF_Cleaned->CurrentValue;
        $row['REF_Temp'] = $this->REF_Temp->CurrentValue;
        $row['REF_Cleaned'] = $this->REF_Cleaned->CurrentValue;
        $row['Heating_Temp'] = $this->Heating_Temp->CurrentValue;
        $row['Heating_Cleaned'] = $this->Heating_Cleaned->CurrentValue;
        $row['Createdby'] = $this->Createdby->CurrentValue;
        $row['CreatedDate'] = $this->CreatedDate->CurrentValue;
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
        if ($this->LN2_Level->FormValue == $this->LN2_Level->CurrentValue && is_numeric(ConvertToFloatString($this->LN2_Level->CurrentValue))) {
            $this->LN2_Level->CurrentValue = ConvertToFloatString($this->LN2_Level->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Incubator_Temp->FormValue == $this->Incubator_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Incubator_Temp->CurrentValue))) {
            $this->Incubator_Temp->CurrentValue = ConvertToFloatString($this->Incubator_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LAF_MG->FormValue == $this->LAF_MG->CurrentValue && is_numeric(ConvertToFloatString($this->LAF_MG->CurrentValue))) {
            $this->LAF_MG->CurrentValue = ConvertToFloatString($this->LAF_MG->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->REF_Temp->FormValue == $this->REF_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->REF_Temp->CurrentValue))) {
            $this->REF_Temp->CurrentValue = ConvertToFloatString($this->REF_Temp->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Heating_Temp->FormValue == $this->Heating_Temp->CurrentValue && is_numeric(ConvertToFloatString($this->Heating_Temp->CurrentValue))) {
            $this->Heating_Temp->CurrentValue = ConvertToFloatString($this->Heating_Temp->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Date

        // LN2_Level

        // LN2_Checked

        // Incubator_Temp

        // Incubator_Cleaned

        // LAF_MG

        // LAF_Cleaned

        // REF_Temp

        // REF_Cleaned

        // Heating_Temp

        // Heating_Cleaned

        // Createdby

        // CreatedDate
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // LN2_Level
            $this->LN2_Level->ViewValue = $this->LN2_Level->CurrentValue;
            $this->LN2_Level->ViewValue = FormatNumber($this->LN2_Level->ViewValue, 2, -2, -2, -2);
            $this->LN2_Level->ViewCustomAttributes = "";

            // LN2_Checked
            if (strval($this->LN2_Checked->CurrentValue) != "") {
                $this->LN2_Checked->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LN2_Checked->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LN2_Checked->ViewValue->add($this->LN2_Checked->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LN2_Checked->ViewValue = null;
            }
            $this->LN2_Checked->ViewCustomAttributes = "";

            // Incubator_Temp
            $this->Incubator_Temp->ViewValue = $this->Incubator_Temp->CurrentValue;
            $this->Incubator_Temp->ViewValue = FormatNumber($this->Incubator_Temp->ViewValue, 2, -2, -2, -2);
            $this->Incubator_Temp->ViewCustomAttributes = "";

            // Incubator_Cleaned
            if (strval($this->Incubator_Cleaned->CurrentValue) != "") {
                $this->Incubator_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Incubator_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Incubator_Cleaned->ViewValue->add($this->Incubator_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Incubator_Cleaned->ViewValue = null;
            }
            $this->Incubator_Cleaned->ViewCustomAttributes = "";

            // LAF_MG
            $this->LAF_MG->ViewValue = $this->LAF_MG->CurrentValue;
            $this->LAF_MG->ViewValue = FormatNumber($this->LAF_MG->ViewValue, 2, -2, -2, -2);
            $this->LAF_MG->ViewCustomAttributes = "";

            // LAF_Cleaned
            if (strval($this->LAF_Cleaned->CurrentValue) != "") {
                $this->LAF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->LAF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->LAF_Cleaned->ViewValue->add($this->LAF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->LAF_Cleaned->ViewValue = null;
            }
            $this->LAF_Cleaned->ViewCustomAttributes = "";

            // REF_Temp
            $this->REF_Temp->ViewValue = $this->REF_Temp->CurrentValue;
            $this->REF_Temp->ViewValue = FormatNumber($this->REF_Temp->ViewValue, 2, -2, -2, -2);
            $this->REF_Temp->ViewCustomAttributes = "";

            // REF_Cleaned
            if (strval($this->REF_Cleaned->CurrentValue) != "") {
                $this->REF_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->REF_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->REF_Cleaned->ViewValue->add($this->REF_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->REF_Cleaned->ViewValue = null;
            }
            $this->REF_Cleaned->ViewCustomAttributes = "";

            // Heating_Temp
            $this->Heating_Temp->ViewValue = $this->Heating_Temp->CurrentValue;
            $this->Heating_Temp->ViewValue = FormatNumber($this->Heating_Temp->ViewValue, 2, -2, -2, -2);
            $this->Heating_Temp->ViewCustomAttributes = "";

            // Heating_Cleaned
            if (strval($this->Heating_Cleaned->CurrentValue) != "") {
                $this->Heating_Cleaned->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Heating_Cleaned->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Heating_Cleaned->ViewValue->add($this->Heating_Cleaned->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Heating_Cleaned->ViewValue = null;
            }
            $this->Heating_Cleaned->ViewCustomAttributes = "";

            // Createdby
            $this->Createdby->ViewValue = $this->Createdby->CurrentValue;
            $this->Createdby->ViewCustomAttributes = "";

            // CreatedDate
            $this->CreatedDate->ViewValue = $this->CreatedDate->CurrentValue;
            $this->CreatedDate->ViewValue = FormatDateTime($this->CreatedDate->ViewValue, 0);
            $this->CreatedDate->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";
            $this->LN2_Level->TooltipValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";
            $this->LN2_Checked->TooltipValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";
            $this->Incubator_Temp->TooltipValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";
            $this->Incubator_Cleaned->TooltipValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";
            $this->LAF_MG->TooltipValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";
            $this->LAF_Cleaned->TooltipValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";
            $this->REF_Temp->TooltipValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";
            $this->REF_Cleaned->TooltipValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";
            $this->Heating_Temp->TooltipValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";
            $this->Heating_Cleaned->TooltipValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";
            $this->Createdby->TooltipValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
            $this->CreatedDate->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // LN2_Level
            $this->LN2_Level->EditAttrs["class"] = "form-control";
            $this->LN2_Level->EditCustomAttributes = "";
            $this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
            $this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
            if (strval($this->LN2_Level->EditValue) != "" && is_numeric($this->LN2_Level->EditValue)) {
                $this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
                $this->LN2_Level->OldValue = $this->LN2_Level->EditValue;
            }

            // LN2_Checked
            $this->LN2_Checked->EditCustomAttributes = "";
            $this->LN2_Checked->EditValue = $this->LN2_Checked->options(false);
            $this->LN2_Checked->PlaceHolder = RemoveHtml($this->LN2_Checked->caption());

            // Incubator_Temp
            $this->Incubator_Temp->EditAttrs["class"] = "form-control";
            $this->Incubator_Temp->EditCustomAttributes = "";
            $this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
            $this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
            if (strval($this->Incubator_Temp->EditValue) != "" && is_numeric($this->Incubator_Temp->EditValue)) {
                $this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
                $this->Incubator_Temp->OldValue = $this->Incubator_Temp->EditValue;
            }

            // Incubator_Cleaned
            $this->Incubator_Cleaned->EditCustomAttributes = "";
            $this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(false);
            $this->Incubator_Cleaned->PlaceHolder = RemoveHtml($this->Incubator_Cleaned->caption());

            // LAF_MG
            $this->LAF_MG->EditAttrs["class"] = "form-control";
            $this->LAF_MG->EditCustomAttributes = "";
            $this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
            $this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
            if (strval($this->LAF_MG->EditValue) != "" && is_numeric($this->LAF_MG->EditValue)) {
                $this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
                $this->LAF_MG->OldValue = $this->LAF_MG->EditValue;
            }

            // LAF_Cleaned
            $this->LAF_Cleaned->EditCustomAttributes = "";
            $this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(false);
            $this->LAF_Cleaned->PlaceHolder = RemoveHtml($this->LAF_Cleaned->caption());

            // REF_Temp
            $this->REF_Temp->EditAttrs["class"] = "form-control";
            $this->REF_Temp->EditCustomAttributes = "";
            $this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
            $this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
            if (strval($this->REF_Temp->EditValue) != "" && is_numeric($this->REF_Temp->EditValue)) {
                $this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
                $this->REF_Temp->OldValue = $this->REF_Temp->EditValue;
            }

            // REF_Cleaned
            $this->REF_Cleaned->EditCustomAttributes = "";
            $this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(false);
            $this->REF_Cleaned->PlaceHolder = RemoveHtml($this->REF_Cleaned->caption());

            // Heating_Temp
            $this->Heating_Temp->EditAttrs["class"] = "form-control";
            $this->Heating_Temp->EditCustomAttributes = "";
            $this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
            $this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
            if (strval($this->Heating_Temp->EditValue) != "" && is_numeric($this->Heating_Temp->EditValue)) {
                $this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
                $this->Heating_Temp->OldValue = $this->Heating_Temp->EditValue;
            }

            // Heating_Cleaned
            $this->Heating_Cleaned->EditCustomAttributes = "";
            $this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(false);
            $this->Heating_Cleaned->PlaceHolder = RemoveHtml($this->Heating_Cleaned->caption());

            // Createdby

            // CreatedDate

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // LN2_Level
            $this->LN2_Level->EditAttrs["class"] = "form-control";
            $this->LN2_Level->EditCustomAttributes = "";
            $this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->CurrentValue);
            $this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());
            if (strval($this->LN2_Level->EditValue) != "" && is_numeric($this->LN2_Level->EditValue)) {
                $this->LN2_Level->EditValue = FormatNumber($this->LN2_Level->EditValue, -2, -2, -2, -2);
                $this->LN2_Level->OldValue = $this->LN2_Level->EditValue;
            }

            // LN2_Checked
            $this->LN2_Checked->EditCustomAttributes = "";
            $this->LN2_Checked->EditValue = $this->LN2_Checked->options(false);
            $this->LN2_Checked->PlaceHolder = RemoveHtml($this->LN2_Checked->caption());

            // Incubator_Temp
            $this->Incubator_Temp->EditAttrs["class"] = "form-control";
            $this->Incubator_Temp->EditCustomAttributes = "";
            $this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->CurrentValue);
            $this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());
            if (strval($this->Incubator_Temp->EditValue) != "" && is_numeric($this->Incubator_Temp->EditValue)) {
                $this->Incubator_Temp->EditValue = FormatNumber($this->Incubator_Temp->EditValue, -2, -2, -2, -2);
                $this->Incubator_Temp->OldValue = $this->Incubator_Temp->EditValue;
            }

            // Incubator_Cleaned
            $this->Incubator_Cleaned->EditCustomAttributes = "";
            $this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(false);
            $this->Incubator_Cleaned->PlaceHolder = RemoveHtml($this->Incubator_Cleaned->caption());

            // LAF_MG
            $this->LAF_MG->EditAttrs["class"] = "form-control";
            $this->LAF_MG->EditCustomAttributes = "";
            $this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->CurrentValue);
            $this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());
            if (strval($this->LAF_MG->EditValue) != "" && is_numeric($this->LAF_MG->EditValue)) {
                $this->LAF_MG->EditValue = FormatNumber($this->LAF_MG->EditValue, -2, -2, -2, -2);
                $this->LAF_MG->OldValue = $this->LAF_MG->EditValue;
            }

            // LAF_Cleaned
            $this->LAF_Cleaned->EditCustomAttributes = "";
            $this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(false);
            $this->LAF_Cleaned->PlaceHolder = RemoveHtml($this->LAF_Cleaned->caption());

            // REF_Temp
            $this->REF_Temp->EditAttrs["class"] = "form-control";
            $this->REF_Temp->EditCustomAttributes = "";
            $this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->CurrentValue);
            $this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());
            if (strval($this->REF_Temp->EditValue) != "" && is_numeric($this->REF_Temp->EditValue)) {
                $this->REF_Temp->EditValue = FormatNumber($this->REF_Temp->EditValue, -2, -2, -2, -2);
                $this->REF_Temp->OldValue = $this->REF_Temp->EditValue;
            }

            // REF_Cleaned
            $this->REF_Cleaned->EditCustomAttributes = "";
            $this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(false);
            $this->REF_Cleaned->PlaceHolder = RemoveHtml($this->REF_Cleaned->caption());

            // Heating_Temp
            $this->Heating_Temp->EditAttrs["class"] = "form-control";
            $this->Heating_Temp->EditCustomAttributes = "";
            $this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->CurrentValue);
            $this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());
            if (strval($this->Heating_Temp->EditValue) != "" && is_numeric($this->Heating_Temp->EditValue)) {
                $this->Heating_Temp->EditValue = FormatNumber($this->Heating_Temp->EditValue, -2, -2, -2, -2);
                $this->Heating_Temp->OldValue = $this->Heating_Temp->EditValue;
            }

            // Heating_Cleaned
            $this->Heating_Cleaned->EditCustomAttributes = "";
            $this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(false);
            $this->Heating_Cleaned->PlaceHolder = RemoveHtml($this->Heating_Cleaned->caption());

            // Createdby

            // CreatedDate

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // LN2_Level
            $this->LN2_Level->LinkCustomAttributes = "";
            $this->LN2_Level->HrefValue = "";

            // LN2_Checked
            $this->LN2_Checked->LinkCustomAttributes = "";
            $this->LN2_Checked->HrefValue = "";

            // Incubator_Temp
            $this->Incubator_Temp->LinkCustomAttributes = "";
            $this->Incubator_Temp->HrefValue = "";

            // Incubator_Cleaned
            $this->Incubator_Cleaned->LinkCustomAttributes = "";
            $this->Incubator_Cleaned->HrefValue = "";

            // LAF_MG
            $this->LAF_MG->LinkCustomAttributes = "";
            $this->LAF_MG->HrefValue = "";

            // LAF_Cleaned
            $this->LAF_Cleaned->LinkCustomAttributes = "";
            $this->LAF_Cleaned->HrefValue = "";

            // REF_Temp
            $this->REF_Temp->LinkCustomAttributes = "";
            $this->REF_Temp->HrefValue = "";

            // REF_Cleaned
            $this->REF_Cleaned->LinkCustomAttributes = "";
            $this->REF_Cleaned->HrefValue = "";

            // Heating_Temp
            $this->Heating_Temp->LinkCustomAttributes = "";
            $this->Heating_Temp->HrefValue = "";

            // Heating_Cleaned
            $this->Heating_Cleaned->LinkCustomAttributes = "";
            $this->Heating_Cleaned->HrefValue = "";

            // Createdby
            $this->Createdby->LinkCustomAttributes = "";
            $this->Createdby->HrefValue = "";

            // CreatedDate
            $this->CreatedDate->LinkCustomAttributes = "";
            $this->CreatedDate->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue, 0), 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue2, 0), 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // LN2_Level
            $this->LN2_Level->EditAttrs["class"] = "form-control";
            $this->LN2_Level->EditCustomAttributes = "";
            $this->LN2_Level->EditValue = HtmlEncode($this->LN2_Level->AdvancedSearch->SearchValue);
            $this->LN2_Level->PlaceHolder = RemoveHtml($this->LN2_Level->caption());

            // LN2_Checked
            $this->LN2_Checked->EditCustomAttributes = "";
            $this->LN2_Checked->EditValue = $this->LN2_Checked->options(false);
            $this->LN2_Checked->PlaceHolder = RemoveHtml($this->LN2_Checked->caption());

            // Incubator_Temp
            $this->Incubator_Temp->EditAttrs["class"] = "form-control";
            $this->Incubator_Temp->EditCustomAttributes = "";
            $this->Incubator_Temp->EditValue = HtmlEncode($this->Incubator_Temp->AdvancedSearch->SearchValue);
            $this->Incubator_Temp->PlaceHolder = RemoveHtml($this->Incubator_Temp->caption());

            // Incubator_Cleaned
            $this->Incubator_Cleaned->EditCustomAttributes = "";
            $this->Incubator_Cleaned->EditValue = $this->Incubator_Cleaned->options(false);
            $this->Incubator_Cleaned->PlaceHolder = RemoveHtml($this->Incubator_Cleaned->caption());

            // LAF_MG
            $this->LAF_MG->EditAttrs["class"] = "form-control";
            $this->LAF_MG->EditCustomAttributes = "";
            $this->LAF_MG->EditValue = HtmlEncode($this->LAF_MG->AdvancedSearch->SearchValue);
            $this->LAF_MG->PlaceHolder = RemoveHtml($this->LAF_MG->caption());

            // LAF_Cleaned
            $this->LAF_Cleaned->EditCustomAttributes = "";
            $this->LAF_Cleaned->EditValue = $this->LAF_Cleaned->options(false);
            $this->LAF_Cleaned->PlaceHolder = RemoveHtml($this->LAF_Cleaned->caption());

            // REF_Temp
            $this->REF_Temp->EditAttrs["class"] = "form-control";
            $this->REF_Temp->EditCustomAttributes = "";
            $this->REF_Temp->EditValue = HtmlEncode($this->REF_Temp->AdvancedSearch->SearchValue);
            $this->REF_Temp->PlaceHolder = RemoveHtml($this->REF_Temp->caption());

            // REF_Cleaned
            $this->REF_Cleaned->EditCustomAttributes = "";
            $this->REF_Cleaned->EditValue = $this->REF_Cleaned->options(false);
            $this->REF_Cleaned->PlaceHolder = RemoveHtml($this->REF_Cleaned->caption());

            // Heating_Temp
            $this->Heating_Temp->EditAttrs["class"] = "form-control";
            $this->Heating_Temp->EditCustomAttributes = "";
            $this->Heating_Temp->EditValue = HtmlEncode($this->Heating_Temp->AdvancedSearch->SearchValue);
            $this->Heating_Temp->PlaceHolder = RemoveHtml($this->Heating_Temp->caption());

            // Heating_Cleaned
            $this->Heating_Cleaned->EditCustomAttributes = "";
            $this->Heating_Cleaned->EditValue = $this->Heating_Cleaned->options(false);
            $this->Heating_Cleaned->PlaceHolder = RemoveHtml($this->Heating_Cleaned->caption());

            // Createdby
            $this->Createdby->EditAttrs["class"] = "form-control";
            $this->Createdby->EditCustomAttributes = "";
            if (!$this->Createdby->Raw) {
                $this->Createdby->AdvancedSearch->SearchValue = HtmlDecode($this->Createdby->AdvancedSearch->SearchValue);
            }
            $this->Createdby->EditValue = HtmlEncode($this->Createdby->AdvancedSearch->SearchValue);
            $this->Createdby->PlaceHolder = RemoveHtml($this->Createdby->caption());

            // CreatedDate
            $this->CreatedDate->EditAttrs["class"] = "form-control";
            $this->CreatedDate->EditCustomAttributes = "";
            $this->CreatedDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CreatedDate->AdvancedSearch->SearchValue, 0), 8));
            $this->CreatedDate->PlaceHolder = RemoveHtml($this->CreatedDate->caption());
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
        if (!CheckDate($this->Date->AdvancedSearch->SearchValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
        }
        if (!CheckDate($this->Date->AdvancedSearch->SearchValue2)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->Date->Required) {
            if (!$this->Date->IsDetailKey && EmptyValue($this->Date->FormValue)) {
                $this->Date->addErrorMessage(str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Date->FormValue)) {
            $this->Date->addErrorMessage($this->Date->getErrorMessage(false));
        }
        if ($this->LN2_Level->Required) {
            if (!$this->LN2_Level->IsDetailKey && EmptyValue($this->LN2_Level->FormValue)) {
                $this->LN2_Level->addErrorMessage(str_replace("%s", $this->LN2_Level->caption(), $this->LN2_Level->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LN2_Level->FormValue)) {
            $this->LN2_Level->addErrorMessage($this->LN2_Level->getErrorMessage(false));
        }
        if ($this->LN2_Checked->Required) {
            if ($this->LN2_Checked->FormValue == "") {
                $this->LN2_Checked->addErrorMessage(str_replace("%s", $this->LN2_Checked->caption(), $this->LN2_Checked->RequiredErrorMessage));
            }
        }
        if ($this->Incubator_Temp->Required) {
            if (!$this->Incubator_Temp->IsDetailKey && EmptyValue($this->Incubator_Temp->FormValue)) {
                $this->Incubator_Temp->addErrorMessage(str_replace("%s", $this->Incubator_Temp->caption(), $this->Incubator_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Incubator_Temp->FormValue)) {
            $this->Incubator_Temp->addErrorMessage($this->Incubator_Temp->getErrorMessage(false));
        }
        if ($this->Incubator_Cleaned->Required) {
            if ($this->Incubator_Cleaned->FormValue == "") {
                $this->Incubator_Cleaned->addErrorMessage(str_replace("%s", $this->Incubator_Cleaned->caption(), $this->Incubator_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->LAF_MG->Required) {
            if (!$this->LAF_MG->IsDetailKey && EmptyValue($this->LAF_MG->FormValue)) {
                $this->LAF_MG->addErrorMessage(str_replace("%s", $this->LAF_MG->caption(), $this->LAF_MG->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->LAF_MG->FormValue)) {
            $this->LAF_MG->addErrorMessage($this->LAF_MG->getErrorMessage(false));
        }
        if ($this->LAF_Cleaned->Required) {
            if ($this->LAF_Cleaned->FormValue == "") {
                $this->LAF_Cleaned->addErrorMessage(str_replace("%s", $this->LAF_Cleaned->caption(), $this->LAF_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->REF_Temp->Required) {
            if (!$this->REF_Temp->IsDetailKey && EmptyValue($this->REF_Temp->FormValue)) {
                $this->REF_Temp->addErrorMessage(str_replace("%s", $this->REF_Temp->caption(), $this->REF_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->REF_Temp->FormValue)) {
            $this->REF_Temp->addErrorMessage($this->REF_Temp->getErrorMessage(false));
        }
        if ($this->REF_Cleaned->Required) {
            if ($this->REF_Cleaned->FormValue == "") {
                $this->REF_Cleaned->addErrorMessage(str_replace("%s", $this->REF_Cleaned->caption(), $this->REF_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->Heating_Temp->Required) {
            if (!$this->Heating_Temp->IsDetailKey && EmptyValue($this->Heating_Temp->FormValue)) {
                $this->Heating_Temp->addErrorMessage(str_replace("%s", $this->Heating_Temp->caption(), $this->Heating_Temp->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Heating_Temp->FormValue)) {
            $this->Heating_Temp->addErrorMessage($this->Heating_Temp->getErrorMessage(false));
        }
        if ($this->Heating_Cleaned->Required) {
            if ($this->Heating_Cleaned->FormValue == "") {
                $this->Heating_Cleaned->addErrorMessage(str_replace("%s", $this->Heating_Cleaned->caption(), $this->Heating_Cleaned->RequiredErrorMessage));
            }
        }
        if ($this->Createdby->Required) {
            if (!$this->Createdby->IsDetailKey && EmptyValue($this->Createdby->FormValue)) {
                $this->Createdby->addErrorMessage(str_replace("%s", $this->Createdby->caption(), $this->Createdby->RequiredErrorMessage));
            }
        }
        if ($this->CreatedDate->Required) {
            if (!$this->CreatedDate->IsDetailKey && EmptyValue($this->CreatedDate->FormValue)) {
                $this->CreatedDate->addErrorMessage(str_replace("%s", $this->CreatedDate->caption(), $this->CreatedDate->RequiredErrorMessage));
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

            // Date
            $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), $this->Date->ReadOnly);

            // LN2_Level
            $this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, null, $this->LN2_Level->ReadOnly);

            // LN2_Checked
            $this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, null, $this->LN2_Checked->ReadOnly);

            // Incubator_Temp
            $this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, null, $this->Incubator_Temp->ReadOnly);

            // Incubator_Cleaned
            $this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, null, $this->Incubator_Cleaned->ReadOnly);

            // LAF_MG
            $this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, null, $this->LAF_MG->ReadOnly);

            // LAF_Cleaned
            $this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, null, $this->LAF_Cleaned->ReadOnly);

            // REF_Temp
            $this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, null, $this->REF_Temp->ReadOnly);

            // REF_Cleaned
            $this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, null, $this->REF_Cleaned->ReadOnly);

            // Heating_Temp
            $this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, $this->Heating_Temp->ReadOnly);

            // Heating_Cleaned
            $this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, null, $this->Heating_Cleaned->ReadOnly);

            // Createdby
            $this->Createdby->CurrentValue = CurrentUserName();
            $this->Createdby->setDbValueDef($rsnew, $this->Createdby->CurrentValue, null);

            // CreatedDate
            $this->CreatedDate->CurrentValue = CurrentDateTime();
            $this->CreatedDate->setDbValueDef($rsnew, $this->CreatedDate->CurrentValue, null);

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
        $hash .= GetFieldHash($row['Date']); // Date
        $hash .= GetFieldHash($row['LN2_Level']); // LN2_Level
        $hash .= GetFieldHash($row['LN2_Checked']); // LN2_Checked
        $hash .= GetFieldHash($row['Incubator_Temp']); // Incubator_Temp
        $hash .= GetFieldHash($row['Incubator_Cleaned']); // Incubator_Cleaned
        $hash .= GetFieldHash($row['LAF_MG']); // LAF_MG
        $hash .= GetFieldHash($row['LAF_Cleaned']); // LAF_Cleaned
        $hash .= GetFieldHash($row['REF_Temp']); // REF_Temp
        $hash .= GetFieldHash($row['REF_Cleaned']); // REF_Cleaned
        $hash .= GetFieldHash($row['Heating_Temp']); // Heating_Temp
        $hash .= GetFieldHash($row['Heating_Cleaned']); // Heating_Cleaned
        $hash .= GetFieldHash($row['Createdby']); // Createdby
        $hash .= GetFieldHash($row['CreatedDate']); // CreatedDate
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

        // Date
        $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), CurrentDate(), false);

        // LN2_Level
        $this->LN2_Level->setDbValueDef($rsnew, $this->LN2_Level->CurrentValue, null, false);

        // LN2_Checked
        $this->LN2_Checked->setDbValueDef($rsnew, $this->LN2_Checked->CurrentValue, null, false);

        // Incubator_Temp
        $this->Incubator_Temp->setDbValueDef($rsnew, $this->Incubator_Temp->CurrentValue, null, false);

        // Incubator_Cleaned
        $this->Incubator_Cleaned->setDbValueDef($rsnew, $this->Incubator_Cleaned->CurrentValue, null, false);

        // LAF_MG
        $this->LAF_MG->setDbValueDef($rsnew, $this->LAF_MG->CurrentValue, null, false);

        // LAF_Cleaned
        $this->LAF_Cleaned->setDbValueDef($rsnew, $this->LAF_Cleaned->CurrentValue, null, false);

        // REF_Temp
        $this->REF_Temp->setDbValueDef($rsnew, $this->REF_Temp->CurrentValue, null, false);

        // REF_Cleaned
        $this->REF_Cleaned->setDbValueDef($rsnew, $this->REF_Cleaned->CurrentValue, null, false);

        // Heating_Temp
        $this->Heating_Temp->setDbValueDef($rsnew, $this->Heating_Temp->CurrentValue, 0, false);

        // Heating_Cleaned
        $this->Heating_Cleaned->setDbValueDef($rsnew, $this->Heating_Cleaned->CurrentValue, null, false);

        // Createdby
        $this->Createdby->CurrentValue = CurrentUserName();
        $this->Createdby->setDbValueDef($rsnew, $this->Createdby->CurrentValue, null);

        // CreatedDate
        $this->CreatedDate->CurrentValue = CurrentDateTime();
        $this->CreatedDate->setDbValueDef($rsnew, $this->CreatedDate->CurrentValue, null);

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
        $this->id->AdvancedSearch->load();
        $this->Date->AdvancedSearch->load();
        $this->LN2_Level->AdvancedSearch->load();
        $this->LN2_Checked->AdvancedSearch->load();
        $this->Incubator_Temp->AdvancedSearch->load();
        $this->Incubator_Cleaned->AdvancedSearch->load();
        $this->LAF_MG->AdvancedSearch->load();
        $this->LAF_Cleaned->AdvancedSearch->load();
        $this->REF_Temp->AdvancedSearch->load();
        $this->REF_Cleaned->AdvancedSearch->load();
        $this->Heating_Temp->AdvancedSearch->load();
        $this->Heating_Cleaned->AdvancedSearch->load();
        $this->Createdby->AdvancedSearch->load();
        $this->CreatedDate->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fqaqcrecord_andrologylist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fqaqcrecord_andrologylist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fqaqcrecord_andrologylist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_qaqcrecord_andrology" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_qaqcrecord_andrology\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fqaqcrecord_andrologylist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fqaqcrecord_andrologylistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_LN2_Checked":
                    break;
                case "x_Incubator_Cleaned":
                    break;
                case "x_LAF_Cleaned":
                    break;
                case "x_REF_Cleaned":
                    break;
                case "x_Heating_Cleaned":
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
