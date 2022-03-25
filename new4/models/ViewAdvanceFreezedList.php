<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewAdvanceFreezedList extends ViewAdvanceFreezed
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_advance_freezed';

    // Page object name
    public $PageObjName = "ViewAdvanceFreezedList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_advance_freezedlist";
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

        // Table object (view_advance_freezed)
        if (!isset($GLOBALS["view_advance_freezed"]) || get_class($GLOBALS["view_advance_freezed"]) == PROJECT_NAMESPACE . "view_advance_freezed") {
            $GLOBALS["view_advance_freezed"] = &$this;
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
        $this->AddUrl = "ViewAdvanceFreezedAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewAdvanceFreezedDelete";
        $this->MultiUpdateUrl = "ViewAdvanceFreezedUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_advance_freezed');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_advance_freezedlistsrch";

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
                $doc = new $class(Container("view_advance_freezed"));
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
        $this->id->setVisibility();
        $this->freezed->setVisibility();
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
        $this->Name->Visible = false;
        $this->Mobile->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->Visible = false;
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatID->setVisibility();
        $this->VisiteType->setVisibility();
        $this->VisitDate->setVisibility();
        $this->AdvanceNo->setVisibility();
        $this->Status->setVisibility();
        $this->Date->setVisibility();
        $this->AdvanceValidityDate->setVisibility();
        $this->TotalRemainingAdvance->setVisibility();
        $this->Remarks->Visible = false;
        $this->SeectPaymentMode->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->Currency->setVisibility();
        $this->CardNumber->setVisibility();
        $this->BankName->setVisibility();
        $this->HospID->setVisibility();
        $this->Reception->setVisibility();
        $this->mrnno->setVisibility();
        $this->GetUserName->setVisibility();
        $this->AdjustmentwithAdvance->setVisibility();
        $this->AdjustmentBillNumber->setVisibility();
        $this->CancelAdvance->setVisibility();
        $this->CancelReasan->Visible = false;
        $this->CancelBy->setVisibility();
        $this->CancelDate->setVisibility();
        $this->CancelDateTime->setVisibility();
        $this->CanceledBy->setVisibility();
        $this->CancelStatus->setVisibility();
        $this->Cash->setVisibility();
        $this->Card->setVisibility();
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
        $this->Amount->FormValue = ""; // Clear form value
        $this->Cash->FormValue = ""; // Clear form value
        $this->Card->FormValue = ""; // Clear form value
        $this->LastAction = $this->CurrentAction; // Save last action
        $this->CurrentAction = ""; // Clear action
        $_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
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

    // Check if empty row
    public function emptyRow()
    {
        global $CurrentForm;
        if ($CurrentForm->hasValue("x_freezed") && $CurrentForm->hasValue("o_freezed") && $this->freezed->CurrentValue != $this->freezed->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientID") && $CurrentForm->hasValue("o_PatientID") && $this->PatientID->CurrentValue != $this->PatientID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_voucher_type") && $CurrentForm->hasValue("o_voucher_type") && $this->voucher_type->CurrentValue != $this->voucher_type->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Details") && $CurrentForm->hasValue("o_Details") && $this->Details->CurrentValue != $this->Details->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue != $this->ModeofPayment->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue != $this->Amount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_createdby") && $CurrentForm->hasValue("o_createdby") && $this->createdby->CurrentValue != $this->createdby->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_createddatetime") && $CurrentForm->hasValue("o_createddatetime") && $this->createddatetime->CurrentValue != $this->createddatetime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_modifiedby") && $CurrentForm->hasValue("o_modifiedby") && $this->modifiedby->CurrentValue != $this->modifiedby->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_modifieddatetime") && $CurrentForm->hasValue("o_modifieddatetime") && $this->modifieddatetime->CurrentValue != $this->modifieddatetime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatID") && $CurrentForm->hasValue("o_PatID") && $this->PatID->CurrentValue != $this->PatID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_VisiteType") && $CurrentForm->hasValue("o_VisiteType") && $this->VisiteType->CurrentValue != $this->VisiteType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_VisitDate") && $CurrentForm->hasValue("o_VisitDate") && $this->VisitDate->CurrentValue != $this->VisitDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdvanceNo") && $CurrentForm->hasValue("o_AdvanceNo") && $this->AdvanceNo->CurrentValue != $this->AdvanceNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Status") && $CurrentForm->hasValue("o_Status") && $this->Status->CurrentValue != $this->Status->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Date") && $CurrentForm->hasValue("o_Date") && $this->Date->CurrentValue != $this->Date->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdvanceValidityDate") && $CurrentForm->hasValue("o_AdvanceValidityDate") && $this->AdvanceValidityDate->CurrentValue != $this->AdvanceValidityDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TotalRemainingAdvance") && $CurrentForm->hasValue("o_TotalRemainingAdvance") && $this->TotalRemainingAdvance->CurrentValue != $this->TotalRemainingAdvance->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SeectPaymentMode") && $CurrentForm->hasValue("o_SeectPaymentMode") && $this->SeectPaymentMode->CurrentValue != $this->SeectPaymentMode->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaidAmount") && $CurrentForm->hasValue("o_PaidAmount") && $this->PaidAmount->CurrentValue != $this->PaidAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Currency") && $CurrentForm->hasValue("o_Currency") && $this->Currency->CurrentValue != $this->Currency->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CardNumber") && $CurrentForm->hasValue("o_CardNumber") && $this->CardNumber->CurrentValue != $this->CardNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BankName") && $CurrentForm->hasValue("o_BankName") && $this->BankName->CurrentValue != $this->BankName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HospID") && $CurrentForm->hasValue("o_HospID") && $this->HospID->CurrentValue != $this->HospID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Reception") && $CurrentForm->hasValue("o_Reception") && $this->Reception->CurrentValue != $this->Reception->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_GetUserName") && $CurrentForm->hasValue("o_GetUserName") && $this->GetUserName->CurrentValue != $this->GetUserName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdjustmentwithAdvance") && $CurrentForm->hasValue("o_AdjustmentwithAdvance") && $this->AdjustmentwithAdvance->CurrentValue != $this->AdjustmentwithAdvance->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_AdjustmentBillNumber") && $CurrentForm->hasValue("o_AdjustmentBillNumber") && $this->AdjustmentBillNumber->CurrentValue != $this->AdjustmentBillNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelAdvance") && $CurrentForm->hasValue("o_CancelAdvance") && $this->CancelAdvance->CurrentValue != $this->CancelAdvance->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelBy") && $CurrentForm->hasValue("o_CancelBy") && $this->CancelBy->CurrentValue != $this->CancelBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelDate") && $CurrentForm->hasValue("o_CancelDate") && $this->CancelDate->CurrentValue != $this->CancelDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelDateTime") && $CurrentForm->hasValue("o_CancelDateTime") && $this->CancelDateTime->CurrentValue != $this->CancelDateTime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CanceledBy") && $CurrentForm->hasValue("o_CanceledBy") && $this->CanceledBy->CurrentValue != $this->CanceledBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelStatus") && $CurrentForm->hasValue("o_CancelStatus") && $this->CancelStatus->CurrentValue != $this->CancelStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Cash") && $CurrentForm->hasValue("o_Cash") && $this->Cash->CurrentValue != $this->Cash->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Card") && $CurrentForm->hasValue("o_Card") && $this->Card->CurrentValue != $this->Card->OldValue) {
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
        $this->freezed->clearErrorMessage();
        $this->PatientID->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Mobile->clearErrorMessage();
        $this->voucher_type->clearErrorMessage();
        $this->Details->clearErrorMessage();
        $this->ModeofPayment->clearErrorMessage();
        $this->Amount->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->PatID->clearErrorMessage();
        $this->VisiteType->clearErrorMessage();
        $this->VisitDate->clearErrorMessage();
        $this->AdvanceNo->clearErrorMessage();
        $this->Status->clearErrorMessage();
        $this->Date->clearErrorMessage();
        $this->AdvanceValidityDate->clearErrorMessage();
        $this->TotalRemainingAdvance->clearErrorMessage();
        $this->SeectPaymentMode->clearErrorMessage();
        $this->PaidAmount->clearErrorMessage();
        $this->Currency->clearErrorMessage();
        $this->CardNumber->clearErrorMessage();
        $this->BankName->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->Reception->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
        $this->GetUserName->clearErrorMessage();
        $this->AdjustmentwithAdvance->clearErrorMessage();
        $this->AdjustmentBillNumber->clearErrorMessage();
        $this->CancelAdvance->clearErrorMessage();
        $this->CancelBy->clearErrorMessage();
        $this->CancelDate->clearErrorMessage();
        $this->CancelDateTime->clearErrorMessage();
        $this->CanceledBy->clearErrorMessage();
        $this->CancelStatus->clearErrorMessage();
        $this->Cash->clearErrorMessage();
        $this->Card->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_advance_freezedlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->freezed->AdvancedSearch->toJson(), ","); // Field freezed
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
        $filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
        $filterList = Concat($filterList, $this->Details->AdvancedSearch->toJson(), ","); // Field Details
        $filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
        $filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
        $filterList = Concat($filterList, $this->AnyDues->AdvancedSearch->toJson(), ","); // Field AnyDues
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->VisiteType->AdvancedSearch->toJson(), ","); // Field VisiteType
        $filterList = Concat($filterList, $this->VisitDate->AdvancedSearch->toJson(), ","); // Field VisitDate
        $filterList = Concat($filterList, $this->AdvanceNo->AdvancedSearch->toJson(), ","); // Field AdvanceNo
        $filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
        $filterList = Concat($filterList, $this->Date->AdvancedSearch->toJson(), ","); // Field Date
        $filterList = Concat($filterList, $this->AdvanceValidityDate->AdvancedSearch->toJson(), ","); // Field AdvanceValidityDate
        $filterList = Concat($filterList, $this->TotalRemainingAdvance->AdvancedSearch->toJson(), ","); // Field TotalRemainingAdvance
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->SeectPaymentMode->AdvancedSearch->toJson(), ","); // Field SeectPaymentMode
        $filterList = Concat($filterList, $this->PaidAmount->AdvancedSearch->toJson(), ","); // Field PaidAmount
        $filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
        $filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
        $filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->GetUserName->AdvancedSearch->toJson(), ","); // Field GetUserName
        $filterList = Concat($filterList, $this->AdjustmentwithAdvance->AdvancedSearch->toJson(), ","); // Field AdjustmentwithAdvance
        $filterList = Concat($filterList, $this->AdjustmentBillNumber->AdvancedSearch->toJson(), ","); // Field AdjustmentBillNumber
        $filterList = Concat($filterList, $this->CancelAdvance->AdvancedSearch->toJson(), ","); // Field CancelAdvance
        $filterList = Concat($filterList, $this->CancelReasan->AdvancedSearch->toJson(), ","); // Field CancelReasan
        $filterList = Concat($filterList, $this->CancelBy->AdvancedSearch->toJson(), ","); // Field CancelBy
        $filterList = Concat($filterList, $this->CancelDate->AdvancedSearch->toJson(), ","); // Field CancelDate
        $filterList = Concat($filterList, $this->CancelDateTime->AdvancedSearch->toJson(), ","); // Field CancelDateTime
        $filterList = Concat($filterList, $this->CanceledBy->AdvancedSearch->toJson(), ","); // Field CanceledBy
        $filterList = Concat($filterList, $this->CancelStatus->AdvancedSearch->toJson(), ","); // Field CancelStatus
        $filterList = Concat($filterList, $this->Cash->AdvancedSearch->toJson(), ","); // Field Cash
        $filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_advance_freezedlistsrch", $filters);
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

        // Field freezed
        $this->freezed->AdvancedSearch->SearchValue = @$filter["x_freezed"];
        $this->freezed->AdvancedSearch->SearchOperator = @$filter["z_freezed"];
        $this->freezed->AdvancedSearch->SearchCondition = @$filter["v_freezed"];
        $this->freezed->AdvancedSearch->SearchValue2 = @$filter["y_freezed"];
        $this->freezed->AdvancedSearch->SearchOperator2 = @$filter["w_freezed"];
        $this->freezed->AdvancedSearch->save();

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field Mobile
        $this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
        $this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
        $this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
        $this->Mobile->AdvancedSearch->save();

        // Field voucher_type
        $this->voucher_type->AdvancedSearch->SearchValue = @$filter["x_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchOperator = @$filter["z_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchCondition = @$filter["v_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchValue2 = @$filter["y_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchOperator2 = @$filter["w_voucher_type"];
        $this->voucher_type->AdvancedSearch->save();

        // Field Details
        $this->Details->AdvancedSearch->SearchValue = @$filter["x_Details"];
        $this->Details->AdvancedSearch->SearchOperator = @$filter["z_Details"];
        $this->Details->AdvancedSearch->SearchCondition = @$filter["v_Details"];
        $this->Details->AdvancedSearch->SearchValue2 = @$filter["y_Details"];
        $this->Details->AdvancedSearch->SearchOperator2 = @$filter["w_Details"];
        $this->Details->AdvancedSearch->save();

        // Field ModeofPayment
        $this->ModeofPayment->AdvancedSearch->SearchValue = @$filter["x_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchOperator = @$filter["z_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchCondition = @$filter["v_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchValue2 = @$filter["y_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->SearchOperator2 = @$filter["w_ModeofPayment"];
        $this->ModeofPayment->AdvancedSearch->save();

        // Field Amount
        $this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
        $this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
        $this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
        $this->Amount->AdvancedSearch->save();

        // Field AnyDues
        $this->AnyDues->AdvancedSearch->SearchValue = @$filter["x_AnyDues"];
        $this->AnyDues->AdvancedSearch->SearchOperator = @$filter["z_AnyDues"];
        $this->AnyDues->AdvancedSearch->SearchCondition = @$filter["v_AnyDues"];
        $this->AnyDues->AdvancedSearch->SearchValue2 = @$filter["y_AnyDues"];
        $this->AnyDues->AdvancedSearch->SearchOperator2 = @$filter["w_AnyDues"];
        $this->AnyDues->AdvancedSearch->save();

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

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field VisiteType
        $this->VisiteType->AdvancedSearch->SearchValue = @$filter["x_VisiteType"];
        $this->VisiteType->AdvancedSearch->SearchOperator = @$filter["z_VisiteType"];
        $this->VisiteType->AdvancedSearch->SearchCondition = @$filter["v_VisiteType"];
        $this->VisiteType->AdvancedSearch->SearchValue2 = @$filter["y_VisiteType"];
        $this->VisiteType->AdvancedSearch->SearchOperator2 = @$filter["w_VisiteType"];
        $this->VisiteType->AdvancedSearch->save();

        // Field VisitDate
        $this->VisitDate->AdvancedSearch->SearchValue = @$filter["x_VisitDate"];
        $this->VisitDate->AdvancedSearch->SearchOperator = @$filter["z_VisitDate"];
        $this->VisitDate->AdvancedSearch->SearchCondition = @$filter["v_VisitDate"];
        $this->VisitDate->AdvancedSearch->SearchValue2 = @$filter["y_VisitDate"];
        $this->VisitDate->AdvancedSearch->SearchOperator2 = @$filter["w_VisitDate"];
        $this->VisitDate->AdvancedSearch->save();

        // Field AdvanceNo
        $this->AdvanceNo->AdvancedSearch->SearchValue = @$filter["x_AdvanceNo"];
        $this->AdvanceNo->AdvancedSearch->SearchOperator = @$filter["z_AdvanceNo"];
        $this->AdvanceNo->AdvancedSearch->SearchCondition = @$filter["v_AdvanceNo"];
        $this->AdvanceNo->AdvancedSearch->SearchValue2 = @$filter["y_AdvanceNo"];
        $this->AdvanceNo->AdvancedSearch->SearchOperator2 = @$filter["w_AdvanceNo"];
        $this->AdvanceNo->AdvancedSearch->save();

        // Field Status
        $this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
        $this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
        $this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
        $this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
        $this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
        $this->Status->AdvancedSearch->save();

        // Field Date
        $this->Date->AdvancedSearch->SearchValue = @$filter["x_Date"];
        $this->Date->AdvancedSearch->SearchOperator = @$filter["z_Date"];
        $this->Date->AdvancedSearch->SearchCondition = @$filter["v_Date"];
        $this->Date->AdvancedSearch->SearchValue2 = @$filter["y_Date"];
        $this->Date->AdvancedSearch->SearchOperator2 = @$filter["w_Date"];
        $this->Date->AdvancedSearch->save();

        // Field AdvanceValidityDate
        $this->AdvanceValidityDate->AdvancedSearch->SearchValue = @$filter["x_AdvanceValidityDate"];
        $this->AdvanceValidityDate->AdvancedSearch->SearchOperator = @$filter["z_AdvanceValidityDate"];
        $this->AdvanceValidityDate->AdvancedSearch->SearchCondition = @$filter["v_AdvanceValidityDate"];
        $this->AdvanceValidityDate->AdvancedSearch->SearchValue2 = @$filter["y_AdvanceValidityDate"];
        $this->AdvanceValidityDate->AdvancedSearch->SearchOperator2 = @$filter["w_AdvanceValidityDate"];
        $this->AdvanceValidityDate->AdvancedSearch->save();

        // Field TotalRemainingAdvance
        $this->TotalRemainingAdvance->AdvancedSearch->SearchValue = @$filter["x_TotalRemainingAdvance"];
        $this->TotalRemainingAdvance->AdvancedSearch->SearchOperator = @$filter["z_TotalRemainingAdvance"];
        $this->TotalRemainingAdvance->AdvancedSearch->SearchCondition = @$filter["v_TotalRemainingAdvance"];
        $this->TotalRemainingAdvance->AdvancedSearch->SearchValue2 = @$filter["y_TotalRemainingAdvance"];
        $this->TotalRemainingAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_TotalRemainingAdvance"];
        $this->TotalRemainingAdvance->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field SeectPaymentMode
        $this->SeectPaymentMode->AdvancedSearch->SearchValue = @$filter["x_SeectPaymentMode"];
        $this->SeectPaymentMode->AdvancedSearch->SearchOperator = @$filter["z_SeectPaymentMode"];
        $this->SeectPaymentMode->AdvancedSearch->SearchCondition = @$filter["v_SeectPaymentMode"];
        $this->SeectPaymentMode->AdvancedSearch->SearchValue2 = @$filter["y_SeectPaymentMode"];
        $this->SeectPaymentMode->AdvancedSearch->SearchOperator2 = @$filter["w_SeectPaymentMode"];
        $this->SeectPaymentMode->AdvancedSearch->save();

        // Field PaidAmount
        $this->PaidAmount->AdvancedSearch->SearchValue = @$filter["x_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchOperator = @$filter["z_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchCondition = @$filter["v_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchValue2 = @$filter["y_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchOperator2 = @$filter["w_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->save();

        // Field Currency
        $this->Currency->AdvancedSearch->SearchValue = @$filter["x_Currency"];
        $this->Currency->AdvancedSearch->SearchOperator = @$filter["z_Currency"];
        $this->Currency->AdvancedSearch->SearchCondition = @$filter["v_Currency"];
        $this->Currency->AdvancedSearch->SearchValue2 = @$filter["y_Currency"];
        $this->Currency->AdvancedSearch->SearchOperator2 = @$filter["w_Currency"];
        $this->Currency->AdvancedSearch->save();

        // Field CardNumber
        $this->CardNumber->AdvancedSearch->SearchValue = @$filter["x_CardNumber"];
        $this->CardNumber->AdvancedSearch->SearchOperator = @$filter["z_CardNumber"];
        $this->CardNumber->AdvancedSearch->SearchCondition = @$filter["v_CardNumber"];
        $this->CardNumber->AdvancedSearch->SearchValue2 = @$filter["y_CardNumber"];
        $this->CardNumber->AdvancedSearch->SearchOperator2 = @$filter["w_CardNumber"];
        $this->CardNumber->AdvancedSearch->save();

        // Field BankName
        $this->BankName->AdvancedSearch->SearchValue = @$filter["x_BankName"];
        $this->BankName->AdvancedSearch->SearchOperator = @$filter["z_BankName"];
        $this->BankName->AdvancedSearch->SearchCondition = @$filter["v_BankName"];
        $this->BankName->AdvancedSearch->SearchValue2 = @$filter["y_BankName"];
        $this->BankName->AdvancedSearch->SearchOperator2 = @$filter["w_BankName"];
        $this->BankName->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field GetUserName
        $this->GetUserName->AdvancedSearch->SearchValue = @$filter["x_GetUserName"];
        $this->GetUserName->AdvancedSearch->SearchOperator = @$filter["z_GetUserName"];
        $this->GetUserName->AdvancedSearch->SearchCondition = @$filter["v_GetUserName"];
        $this->GetUserName->AdvancedSearch->SearchValue2 = @$filter["y_GetUserName"];
        $this->GetUserName->AdvancedSearch->SearchOperator2 = @$filter["w_GetUserName"];
        $this->GetUserName->AdvancedSearch->save();

        // Field AdjustmentwithAdvance
        $this->AdjustmentwithAdvance->AdvancedSearch->SearchValue = @$filter["x_AdjustmentwithAdvance"];
        $this->AdjustmentwithAdvance->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentwithAdvance"];
        $this->AdjustmentwithAdvance->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentwithAdvance"];
        $this->AdjustmentwithAdvance->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentwithAdvance"];
        $this->AdjustmentwithAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentwithAdvance"];
        $this->AdjustmentwithAdvance->AdvancedSearch->save();

        // Field AdjustmentBillNumber
        $this->AdjustmentBillNumber->AdvancedSearch->SearchValue = @$filter["x_AdjustmentBillNumber"];
        $this->AdjustmentBillNumber->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentBillNumber"];
        $this->AdjustmentBillNumber->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentBillNumber"];
        $this->AdjustmentBillNumber->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentBillNumber"];
        $this->AdjustmentBillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentBillNumber"];
        $this->AdjustmentBillNumber->AdvancedSearch->save();

        // Field CancelAdvance
        $this->CancelAdvance->AdvancedSearch->SearchValue = @$filter["x_CancelAdvance"];
        $this->CancelAdvance->AdvancedSearch->SearchOperator = @$filter["z_CancelAdvance"];
        $this->CancelAdvance->AdvancedSearch->SearchCondition = @$filter["v_CancelAdvance"];
        $this->CancelAdvance->AdvancedSearch->SearchValue2 = @$filter["y_CancelAdvance"];
        $this->CancelAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_CancelAdvance"];
        $this->CancelAdvance->AdvancedSearch->save();

        // Field CancelReasan
        $this->CancelReasan->AdvancedSearch->SearchValue = @$filter["x_CancelReasan"];
        $this->CancelReasan->AdvancedSearch->SearchOperator = @$filter["z_CancelReasan"];
        $this->CancelReasan->AdvancedSearch->SearchCondition = @$filter["v_CancelReasan"];
        $this->CancelReasan->AdvancedSearch->SearchValue2 = @$filter["y_CancelReasan"];
        $this->CancelReasan->AdvancedSearch->SearchOperator2 = @$filter["w_CancelReasan"];
        $this->CancelReasan->AdvancedSearch->save();

        // Field CancelBy
        $this->CancelBy->AdvancedSearch->SearchValue = @$filter["x_CancelBy"];
        $this->CancelBy->AdvancedSearch->SearchOperator = @$filter["z_CancelBy"];
        $this->CancelBy->AdvancedSearch->SearchCondition = @$filter["v_CancelBy"];
        $this->CancelBy->AdvancedSearch->SearchValue2 = @$filter["y_CancelBy"];
        $this->CancelBy->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBy"];
        $this->CancelBy->AdvancedSearch->save();

        // Field CancelDate
        $this->CancelDate->AdvancedSearch->SearchValue = @$filter["x_CancelDate"];
        $this->CancelDate->AdvancedSearch->SearchOperator = @$filter["z_CancelDate"];
        $this->CancelDate->AdvancedSearch->SearchCondition = @$filter["v_CancelDate"];
        $this->CancelDate->AdvancedSearch->SearchValue2 = @$filter["y_CancelDate"];
        $this->CancelDate->AdvancedSearch->SearchOperator2 = @$filter["w_CancelDate"];
        $this->CancelDate->AdvancedSearch->save();

        // Field CancelDateTime
        $this->CancelDateTime->AdvancedSearch->SearchValue = @$filter["x_CancelDateTime"];
        $this->CancelDateTime->AdvancedSearch->SearchOperator = @$filter["z_CancelDateTime"];
        $this->CancelDateTime->AdvancedSearch->SearchCondition = @$filter["v_CancelDateTime"];
        $this->CancelDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CancelDateTime"];
        $this->CancelDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CancelDateTime"];
        $this->CancelDateTime->AdvancedSearch->save();

        // Field CanceledBy
        $this->CanceledBy->AdvancedSearch->SearchValue = @$filter["x_CanceledBy"];
        $this->CanceledBy->AdvancedSearch->SearchOperator = @$filter["z_CanceledBy"];
        $this->CanceledBy->AdvancedSearch->SearchCondition = @$filter["v_CanceledBy"];
        $this->CanceledBy->AdvancedSearch->SearchValue2 = @$filter["y_CanceledBy"];
        $this->CanceledBy->AdvancedSearch->SearchOperator2 = @$filter["w_CanceledBy"];
        $this->CanceledBy->AdvancedSearch->save();

        // Field CancelStatus
        $this->CancelStatus->AdvancedSearch->SearchValue = @$filter["x_CancelStatus"];
        $this->CancelStatus->AdvancedSearch->SearchOperator = @$filter["z_CancelStatus"];
        $this->CancelStatus->AdvancedSearch->SearchCondition = @$filter["v_CancelStatus"];
        $this->CancelStatus->AdvancedSearch->SearchValue2 = @$filter["y_CancelStatus"];
        $this->CancelStatus->AdvancedSearch->SearchOperator2 = @$filter["w_CancelStatus"];
        $this->CancelStatus->AdvancedSearch->save();

        // Field Cash
        $this->Cash->AdvancedSearch->SearchValue = @$filter["x_Cash"];
        $this->Cash->AdvancedSearch->SearchOperator = @$filter["z_Cash"];
        $this->Cash->AdvancedSearch->SearchCondition = @$filter["v_Cash"];
        $this->Cash->AdvancedSearch->SearchValue2 = @$filter["y_Cash"];
        $this->Cash->AdvancedSearch->SearchOperator2 = @$filter["w_Cash"];
        $this->Cash->AdvancedSearch->save();

        // Field Card
        $this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
        $this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
        $this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
        $this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
        $this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
        $this->Card->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->freezed, $default, false); // freezed
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->Name, $default, false); // Name
        $this->buildSearchSql($where, $this->Mobile, $default, false); // Mobile
        $this->buildSearchSql($where, $this->voucher_type, $default, false); // voucher_type
        $this->buildSearchSql($where, $this->Details, $default, false); // Details
        $this->buildSearchSql($where, $this->ModeofPayment, $default, false); // ModeofPayment
        $this->buildSearchSql($where, $this->Amount, $default, false); // Amount
        $this->buildSearchSql($where, $this->AnyDues, $default, false); // AnyDues
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->PatID, $default, false); // PatID
        $this->buildSearchSql($where, $this->VisiteType, $default, false); // VisiteType
        $this->buildSearchSql($where, $this->VisitDate, $default, false); // VisitDate
        $this->buildSearchSql($where, $this->AdvanceNo, $default, false); // AdvanceNo
        $this->buildSearchSql($where, $this->Status, $default, false); // Status
        $this->buildSearchSql($where, $this->Date, $default, false); // Date
        $this->buildSearchSql($where, $this->AdvanceValidityDate, $default, false); // AdvanceValidityDate
        $this->buildSearchSql($where, $this->TotalRemainingAdvance, $default, false); // TotalRemainingAdvance
        $this->buildSearchSql($where, $this->Remarks, $default, false); // Remarks
        $this->buildSearchSql($where, $this->SeectPaymentMode, $default, false); // SeectPaymentMode
        $this->buildSearchSql($where, $this->PaidAmount, $default, false); // PaidAmount
        $this->buildSearchSql($where, $this->Currency, $default, false); // Currency
        $this->buildSearchSql($where, $this->CardNumber, $default, false); // CardNumber
        $this->buildSearchSql($where, $this->BankName, $default, false); // BankName
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->GetUserName, $default, false); // GetUserName
        $this->buildSearchSql($where, $this->AdjustmentwithAdvance, $default, false); // AdjustmentwithAdvance
        $this->buildSearchSql($where, $this->AdjustmentBillNumber, $default, false); // AdjustmentBillNumber
        $this->buildSearchSql($where, $this->CancelAdvance, $default, false); // CancelAdvance
        $this->buildSearchSql($where, $this->CancelReasan, $default, false); // CancelReasan
        $this->buildSearchSql($where, $this->CancelBy, $default, false); // CancelBy
        $this->buildSearchSql($where, $this->CancelDate, $default, false); // CancelDate
        $this->buildSearchSql($where, $this->CancelDateTime, $default, false); // CancelDateTime
        $this->buildSearchSql($where, $this->CanceledBy, $default, false); // CanceledBy
        $this->buildSearchSql($where, $this->CancelStatus, $default, false); // CancelStatus
        $this->buildSearchSql($where, $this->Cash, $default, false); // Cash
        $this->buildSearchSql($where, $this->Card, $default, false); // Card

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->freezed->AdvancedSearch->save(); // freezed
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->Name->AdvancedSearch->save(); // Name
            $this->Mobile->AdvancedSearch->save(); // Mobile
            $this->voucher_type->AdvancedSearch->save(); // voucher_type
            $this->Details->AdvancedSearch->save(); // Details
            $this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
            $this->Amount->AdvancedSearch->save(); // Amount
            $this->AnyDues->AdvancedSearch->save(); // AnyDues
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->PatID->AdvancedSearch->save(); // PatID
            $this->VisiteType->AdvancedSearch->save(); // VisiteType
            $this->VisitDate->AdvancedSearch->save(); // VisitDate
            $this->AdvanceNo->AdvancedSearch->save(); // AdvanceNo
            $this->Status->AdvancedSearch->save(); // Status
            $this->Date->AdvancedSearch->save(); // Date
            $this->AdvanceValidityDate->AdvancedSearch->save(); // AdvanceValidityDate
            $this->TotalRemainingAdvance->AdvancedSearch->save(); // TotalRemainingAdvance
            $this->Remarks->AdvancedSearch->save(); // Remarks
            $this->SeectPaymentMode->AdvancedSearch->save(); // SeectPaymentMode
            $this->PaidAmount->AdvancedSearch->save(); // PaidAmount
            $this->Currency->AdvancedSearch->save(); // Currency
            $this->CardNumber->AdvancedSearch->save(); // CardNumber
            $this->BankName->AdvancedSearch->save(); // BankName
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->GetUserName->AdvancedSearch->save(); // GetUserName
            $this->AdjustmentwithAdvance->AdvancedSearch->save(); // AdjustmentwithAdvance
            $this->AdjustmentBillNumber->AdvancedSearch->save(); // AdjustmentBillNumber
            $this->CancelAdvance->AdvancedSearch->save(); // CancelAdvance
            $this->CancelReasan->AdvancedSearch->save(); // CancelReasan
            $this->CancelBy->AdvancedSearch->save(); // CancelBy
            $this->CancelDate->AdvancedSearch->save(); // CancelDate
            $this->CancelDateTime->AdvancedSearch->save(); // CancelDateTime
            $this->CanceledBy->AdvancedSearch->save(); // CanceledBy
            $this->CancelStatus->AdvancedSearch->save(); // CancelStatus
            $this->Cash->AdvancedSearch->save(); // Cash
            $this->Card->AdvancedSearch->save(); // Card
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
        $this->buildBasicSearchSql($where, $this->freezed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VisiteType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AdvanceNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Status, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalRemainingAdvance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SeectPaymentMode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaidAmount, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GetUserName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AdjustmentwithAdvance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AdjustmentBillNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelAdvance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelReasan, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CanceledBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelStatus, $arKeywords, $type);
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
        if ($this->freezed->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Mobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->voucher_type->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Details->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ModeofPayment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Amount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AnyDues->AdvancedSearch->issetSession()) {
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
        if ($this->PatID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VisiteType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->VisitDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdvanceNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Date->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdvanceValidityDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TotalRemainingAdvance->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Remarks->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SeectPaymentMode->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PaidAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Currency->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CardNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BankName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reception->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GetUserName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdjustmentwithAdvance->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdjustmentBillNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelAdvance->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelReasan->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CanceledBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelStatus->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Cash->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Card->AdvancedSearch->issetSession()) {
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
                $this->freezed->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->Name->AdvancedSearch->unsetSession();
                $this->Mobile->AdvancedSearch->unsetSession();
                $this->voucher_type->AdvancedSearch->unsetSession();
                $this->Details->AdvancedSearch->unsetSession();
                $this->ModeofPayment->AdvancedSearch->unsetSession();
                $this->Amount->AdvancedSearch->unsetSession();
                $this->AnyDues->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->PatID->AdvancedSearch->unsetSession();
                $this->VisiteType->AdvancedSearch->unsetSession();
                $this->VisitDate->AdvancedSearch->unsetSession();
                $this->AdvanceNo->AdvancedSearch->unsetSession();
                $this->Status->AdvancedSearch->unsetSession();
                $this->Date->AdvancedSearch->unsetSession();
                $this->AdvanceValidityDate->AdvancedSearch->unsetSession();
                $this->TotalRemainingAdvance->AdvancedSearch->unsetSession();
                $this->Remarks->AdvancedSearch->unsetSession();
                $this->SeectPaymentMode->AdvancedSearch->unsetSession();
                $this->PaidAmount->AdvancedSearch->unsetSession();
                $this->Currency->AdvancedSearch->unsetSession();
                $this->CardNumber->AdvancedSearch->unsetSession();
                $this->BankName->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->Reception->AdvancedSearch->unsetSession();
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->GetUserName->AdvancedSearch->unsetSession();
                $this->AdjustmentwithAdvance->AdvancedSearch->unsetSession();
                $this->AdjustmentBillNumber->AdvancedSearch->unsetSession();
                $this->CancelAdvance->AdvancedSearch->unsetSession();
                $this->CancelReasan->AdvancedSearch->unsetSession();
                $this->CancelBy->AdvancedSearch->unsetSession();
                $this->CancelDate->AdvancedSearch->unsetSession();
                $this->CancelDateTime->AdvancedSearch->unsetSession();
                $this->CanceledBy->AdvancedSearch->unsetSession();
                $this->CancelStatus->AdvancedSearch->unsetSession();
                $this->Cash->AdvancedSearch->unsetSession();
                $this->Card->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->freezed->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->Name->AdvancedSearch->load();
                $this->Mobile->AdvancedSearch->load();
                $this->voucher_type->AdvancedSearch->load();
                $this->Details->AdvancedSearch->load();
                $this->ModeofPayment->AdvancedSearch->load();
                $this->Amount->AdvancedSearch->load();
                $this->AnyDues->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->PatID->AdvancedSearch->load();
                $this->VisiteType->AdvancedSearch->load();
                $this->VisitDate->AdvancedSearch->load();
                $this->AdvanceNo->AdvancedSearch->load();
                $this->Status->AdvancedSearch->load();
                $this->Date->AdvancedSearch->load();
                $this->AdvanceValidityDate->AdvancedSearch->load();
                $this->TotalRemainingAdvance->AdvancedSearch->load();
                $this->Remarks->AdvancedSearch->load();
                $this->SeectPaymentMode->AdvancedSearch->load();
                $this->PaidAmount->AdvancedSearch->load();
                $this->Currency->AdvancedSearch->load();
                $this->CardNumber->AdvancedSearch->load();
                $this->BankName->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->Reception->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->GetUserName->AdvancedSearch->load();
                $this->AdjustmentwithAdvance->AdvancedSearch->load();
                $this->AdjustmentBillNumber->AdvancedSearch->load();
                $this->CancelAdvance->AdvancedSearch->load();
                $this->CancelReasan->AdvancedSearch->load();
                $this->CancelBy->AdvancedSearch->load();
                $this->CancelDate->AdvancedSearch->load();
                $this->CancelDateTime->AdvancedSearch->load();
                $this->CanceledBy->AdvancedSearch->load();
                $this->CancelStatus->AdvancedSearch->load();
                $this->Cash->AdvancedSearch->load();
                $this->Card->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->freezed); // freezed
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->voucher_type); // voucher_type
            $this->updateSort($this->Details); // Details
            $this->updateSort($this->ModeofPayment); // ModeofPayment
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->VisiteType); // VisiteType
            $this->updateSort($this->VisitDate); // VisitDate
            $this->updateSort($this->AdvanceNo); // AdvanceNo
            $this->updateSort($this->Status); // Status
            $this->updateSort($this->Date); // Date
            $this->updateSort($this->AdvanceValidityDate); // AdvanceValidityDate
            $this->updateSort($this->TotalRemainingAdvance); // TotalRemainingAdvance
            $this->updateSort($this->SeectPaymentMode); // SeectPaymentMode
            $this->updateSort($this->PaidAmount); // PaidAmount
            $this->updateSort($this->Currency); // Currency
            $this->updateSort($this->CardNumber); // CardNumber
            $this->updateSort($this->BankName); // BankName
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->GetUserName); // GetUserName
            $this->updateSort($this->AdjustmentwithAdvance); // AdjustmentwithAdvance
            $this->updateSort($this->AdjustmentBillNumber); // AdjustmentBillNumber
            $this->updateSort($this->CancelAdvance); // CancelAdvance
            $this->updateSort($this->CancelBy); // CancelBy
            $this->updateSort($this->CancelDate); // CancelDate
            $this->updateSort($this->CancelDateTime); // CancelDateTime
            $this->updateSort($this->CanceledBy); // CanceledBy
            $this->updateSort($this->CancelStatus); // CancelStatus
            $this->updateSort($this->Cash); // Cash
            $this->updateSort($this->Card); // Card
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
                $this->freezed->setSort("");
                $this->PatientID->setSort("");
                $this->PatientName->setSort("");
                $this->Name->setSort("");
                $this->Mobile->setSort("");
                $this->voucher_type->setSort("");
                $this->Details->setSort("");
                $this->ModeofPayment->setSort("");
                $this->Amount->setSort("");
                $this->AnyDues->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->PatID->setSort("");
                $this->VisiteType->setSort("");
                $this->VisitDate->setSort("");
                $this->AdvanceNo->setSort("");
                $this->Status->setSort("");
                $this->Date->setSort("");
                $this->AdvanceValidityDate->setSort("");
                $this->TotalRemainingAdvance->setSort("");
                $this->Remarks->setSort("");
                $this->SeectPaymentMode->setSort("");
                $this->PaidAmount->setSort("");
                $this->Currency->setSort("");
                $this->CardNumber->setSort("");
                $this->BankName->setSort("");
                $this->HospID->setSort("");
                $this->Reception->setSort("");
                $this->mrnno->setSort("");
                $this->GetUserName->setSort("");
                $this->AdjustmentwithAdvance->setSort("");
                $this->AdjustmentBillNumber->setSort("");
                $this->CancelAdvance->setSort("");
                $this->CancelReasan->setSort("");
                $this->CancelBy->setSort("");
                $this->CancelDate->setSort("");
                $this->CancelDateTime->setSort("");
                $this->CanceledBy->setSort("");
                $this->CancelStatus->setSort("");
                $this->Cash->setSort("");
                $this->Card->setSort("");
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
                if (is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
                    $opt->Body = "&nbsp;";
                } else {
                    $opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
                }
            }
        }
        $pageUrl = $this->pageUrl();

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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_advance_freezedlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_advance_freezedlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_advance_freezedlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

            // Grid-Edit
            if ($this->isGridEdit()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = false;
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
        $this->freezed->CurrentValue = null;
        $this->freezed->OldValue = $this->freezed->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Details->CurrentValue = null;
        $this->Details->OldValue = $this->Details->CurrentValue;
        $this->ModeofPayment->CurrentValue = null;
        $this->ModeofPayment->OldValue = $this->ModeofPayment->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->AnyDues->CurrentValue = null;
        $this->AnyDues->OldValue = $this->AnyDues->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->VisiteType->CurrentValue = null;
        $this->VisiteType->OldValue = $this->VisiteType->CurrentValue;
        $this->VisitDate->CurrentValue = null;
        $this->VisitDate->OldValue = $this->VisitDate->CurrentValue;
        $this->AdvanceNo->CurrentValue = null;
        $this->AdvanceNo->OldValue = $this->AdvanceNo->CurrentValue;
        $this->Status->CurrentValue = null;
        $this->Status->OldValue = $this->Status->CurrentValue;
        $this->Date->CurrentValue = null;
        $this->Date->OldValue = $this->Date->CurrentValue;
        $this->AdvanceValidityDate->CurrentValue = null;
        $this->AdvanceValidityDate->OldValue = $this->AdvanceValidityDate->CurrentValue;
        $this->TotalRemainingAdvance->CurrentValue = null;
        $this->TotalRemainingAdvance->OldValue = $this->TotalRemainingAdvance->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->SeectPaymentMode->CurrentValue = null;
        $this->SeectPaymentMode->OldValue = $this->SeectPaymentMode->CurrentValue;
        $this->PaidAmount->CurrentValue = null;
        $this->PaidAmount->OldValue = $this->PaidAmount->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->GetUserName->CurrentValue = null;
        $this->GetUserName->OldValue = $this->GetUserName->CurrentValue;
        $this->AdjustmentwithAdvance->CurrentValue = null;
        $this->AdjustmentwithAdvance->OldValue = $this->AdjustmentwithAdvance->CurrentValue;
        $this->AdjustmentBillNumber->CurrentValue = null;
        $this->AdjustmentBillNumber->OldValue = $this->AdjustmentBillNumber->CurrentValue;
        $this->CancelAdvance->CurrentValue = null;
        $this->CancelAdvance->OldValue = $this->CancelAdvance->CurrentValue;
        $this->CancelReasan->CurrentValue = null;
        $this->CancelReasan->OldValue = $this->CancelReasan->CurrentValue;
        $this->CancelBy->CurrentValue = null;
        $this->CancelBy->OldValue = $this->CancelBy->CurrentValue;
        $this->CancelDate->CurrentValue = null;
        $this->CancelDate->OldValue = $this->CancelDate->CurrentValue;
        $this->CancelDateTime->CurrentValue = null;
        $this->CancelDateTime->OldValue = $this->CancelDateTime->CurrentValue;
        $this->CanceledBy->CurrentValue = null;
        $this->CanceledBy->OldValue = $this->CanceledBy->CurrentValue;
        $this->CancelStatus->CurrentValue = null;
        $this->CancelStatus->OldValue = $this->CancelStatus->CurrentValue;
        $this->Cash->CurrentValue = null;
        $this->Cash->OldValue = $this->Cash->CurrentValue;
        $this->Card->CurrentValue = null;
        $this->Card->OldValue = $this->Card->CurrentValue;
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

        // freezed
        if (!$this->isAddOrEdit() && $this->freezed->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->freezed->AdvancedSearch->SearchValue != "" || $this->freezed->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Name
        if (!$this->isAddOrEdit() && $this->Name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Name->AdvancedSearch->SearchValue != "" || $this->Name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Mobile
        if (!$this->isAddOrEdit() && $this->Mobile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Mobile->AdvancedSearch->SearchValue != "" || $this->Mobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // voucher_type
        if (!$this->isAddOrEdit() && $this->voucher_type->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->voucher_type->AdvancedSearch->SearchValue != "" || $this->voucher_type->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Details
        if (!$this->isAddOrEdit() && $this->Details->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Details->AdvancedSearch->SearchValue != "" || $this->Details->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ModeofPayment
        if (!$this->isAddOrEdit() && $this->ModeofPayment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ModeofPayment->AdvancedSearch->SearchValue != "" || $this->ModeofPayment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Amount
        if (!$this->isAddOrEdit() && $this->Amount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Amount->AdvancedSearch->SearchValue != "" || $this->Amount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AnyDues
        if (!$this->isAddOrEdit() && $this->AnyDues->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AnyDues->AdvancedSearch->SearchValue != "" || $this->AnyDues->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatID
        if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VisiteType
        if (!$this->isAddOrEdit() && $this->VisiteType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VisiteType->AdvancedSearch->SearchValue != "" || $this->VisiteType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // VisitDate
        if (!$this->isAddOrEdit() && $this->VisitDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->VisitDate->AdvancedSearch->SearchValue != "" || $this->VisitDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AdvanceNo
        if (!$this->isAddOrEdit() && $this->AdvanceNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdvanceNo->AdvancedSearch->SearchValue != "" || $this->AdvanceNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Status
        if (!$this->isAddOrEdit() && $this->Status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Status->AdvancedSearch->SearchValue != "" || $this->Status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // AdvanceValidityDate
        if (!$this->isAddOrEdit() && $this->AdvanceValidityDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdvanceValidityDate->AdvancedSearch->SearchValue != "" || $this->AdvanceValidityDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TotalRemainingAdvance
        if (!$this->isAddOrEdit() && $this->TotalRemainingAdvance->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TotalRemainingAdvance->AdvancedSearch->SearchValue != "" || $this->TotalRemainingAdvance->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Remarks
        if (!$this->isAddOrEdit() && $this->Remarks->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Remarks->AdvancedSearch->SearchValue != "" || $this->Remarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SeectPaymentMode
        if (!$this->isAddOrEdit() && $this->SeectPaymentMode->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SeectPaymentMode->AdvancedSearch->SearchValue != "" || $this->SeectPaymentMode->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PaidAmount
        if (!$this->isAddOrEdit() && $this->PaidAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaidAmount->AdvancedSearch->SearchValue != "" || $this->PaidAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Currency
        if (!$this->isAddOrEdit() && $this->Currency->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Currency->AdvancedSearch->SearchValue != "" || $this->Currency->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CardNumber
        if (!$this->isAddOrEdit() && $this->CardNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CardNumber->AdvancedSearch->SearchValue != "" || $this->CardNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BankName
        if (!$this->isAddOrEdit() && $this->BankName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BankName->AdvancedSearch->SearchValue != "" || $this->BankName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Reception
        if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // GetUserName
        if (!$this->isAddOrEdit() && $this->GetUserName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GetUserName->AdvancedSearch->SearchValue != "" || $this->GetUserName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AdjustmentwithAdvance
        if (!$this->isAddOrEdit() && $this->AdjustmentwithAdvance->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue != "" || $this->AdjustmentwithAdvance->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AdjustmentBillNumber
        if (!$this->isAddOrEdit() && $this->AdjustmentBillNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdjustmentBillNumber->AdvancedSearch->SearchValue != "" || $this->AdjustmentBillNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelAdvance
        if (!$this->isAddOrEdit() && $this->CancelAdvance->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelAdvance->AdvancedSearch->SearchValue != "" || $this->CancelAdvance->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelReasan
        if (!$this->isAddOrEdit() && $this->CancelReasan->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelReasan->AdvancedSearch->SearchValue != "" || $this->CancelReasan->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelBy
        if (!$this->isAddOrEdit() && $this->CancelBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelBy->AdvancedSearch->SearchValue != "" || $this->CancelBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelDate
        if (!$this->isAddOrEdit() && $this->CancelDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelDate->AdvancedSearch->SearchValue != "" || $this->CancelDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelDateTime
        if (!$this->isAddOrEdit() && $this->CancelDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelDateTime->AdvancedSearch->SearchValue != "" || $this->CancelDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CanceledBy
        if (!$this->isAddOrEdit() && $this->CanceledBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CanceledBy->AdvancedSearch->SearchValue != "" || $this->CanceledBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelStatus
        if (!$this->isAddOrEdit() && $this->CancelStatus->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelStatus->AdvancedSearch->SearchValue != "" || $this->CancelStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Cash
        if (!$this->isAddOrEdit() && $this->Cash->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Cash->AdvancedSearch->SearchValue != "" || $this->Cash->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Card
        if (!$this->isAddOrEdit() && $this->Card->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Card->AdvancedSearch->SearchValue != "" || $this->Card->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Check field name 'freezed' first before field var 'x_freezed'
        $val = $CurrentForm->hasValue("freezed") ? $CurrentForm->getValue("freezed") : $CurrentForm->getValue("x_freezed");
        if (!$this->freezed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->freezed->Visible = false; // Disable update for API request
            } else {
                $this->freezed->setFormValue($val);
            }
        }

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'Mobile' first before field var 'x_Mobile'
        $val = $CurrentForm->hasValue("Mobile") ? $CurrentForm->getValue("Mobile") : $CurrentForm->getValue("x_Mobile");
        if (!$this->Mobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mobile->Visible = false; // Disable update for API request
            } else {
                $this->Mobile->setFormValue($val);
            }
        }

        // Check field name 'voucher_type' first before field var 'x_voucher_type'
        $val = $CurrentForm->hasValue("voucher_type") ? $CurrentForm->getValue("voucher_type") : $CurrentForm->getValue("x_voucher_type");
        if (!$this->voucher_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->voucher_type->Visible = false; // Disable update for API request
            } else {
                $this->voucher_type->setFormValue($val);
            }
        }

        // Check field name 'Details' first before field var 'x_Details'
        $val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
        if (!$this->Details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Details->Visible = false; // Disable update for API request
            } else {
                $this->Details->setFormValue($val);
            }
        }

        // Check field name 'ModeofPayment' first before field var 'x_ModeofPayment'
        $val = $CurrentForm->hasValue("ModeofPayment") ? $CurrentForm->getValue("ModeofPayment") : $CurrentForm->getValue("x_ModeofPayment");
        if (!$this->ModeofPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModeofPayment->Visible = false; // Disable update for API request
            } else {
                $this->ModeofPayment->setFormValue($val);
            }
        }

        // Check field name 'Amount' first before field var 'x_Amount'
        $val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
        if (!$this->Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amount->Visible = false; // Disable update for API request
            } else {
                $this->Amount->setFormValue($val);
            }
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        }

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
            }
        }

        // Check field name 'VisiteType' first before field var 'x_VisiteType'
        $val = $CurrentForm->hasValue("VisiteType") ? $CurrentForm->getValue("VisiteType") : $CurrentForm->getValue("x_VisiteType");
        if (!$this->VisiteType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisiteType->Visible = false; // Disable update for API request
            } else {
                $this->VisiteType->setFormValue($val);
            }
        }

        // Check field name 'VisitDate' first before field var 'x_VisitDate'
        $val = $CurrentForm->hasValue("VisitDate") ? $CurrentForm->getValue("VisitDate") : $CurrentForm->getValue("x_VisitDate");
        if (!$this->VisitDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisitDate->Visible = false; // Disable update for API request
            } else {
                $this->VisitDate->setFormValue($val);
            }
            $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        }

        // Check field name 'AdvanceNo' first before field var 'x_AdvanceNo'
        $val = $CurrentForm->hasValue("AdvanceNo") ? $CurrentForm->getValue("AdvanceNo") : $CurrentForm->getValue("x_AdvanceNo");
        if (!$this->AdvanceNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceNo->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceNo->setFormValue($val);
            }
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
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

        // Check field name 'AdvanceValidityDate' first before field var 'x_AdvanceValidityDate'
        $val = $CurrentForm->hasValue("AdvanceValidityDate") ? $CurrentForm->getValue("AdvanceValidityDate") : $CurrentForm->getValue("x_AdvanceValidityDate");
        if (!$this->AdvanceValidityDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdvanceValidityDate->Visible = false; // Disable update for API request
            } else {
                $this->AdvanceValidityDate->setFormValue($val);
            }
            $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        }

        // Check field name 'TotalRemainingAdvance' first before field var 'x_TotalRemainingAdvance'
        $val = $CurrentForm->hasValue("TotalRemainingAdvance") ? $CurrentForm->getValue("TotalRemainingAdvance") : $CurrentForm->getValue("x_TotalRemainingAdvance");
        if (!$this->TotalRemainingAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalRemainingAdvance->Visible = false; // Disable update for API request
            } else {
                $this->TotalRemainingAdvance->setFormValue($val);
            }
        }

        // Check field name 'SeectPaymentMode' first before field var 'x_SeectPaymentMode'
        $val = $CurrentForm->hasValue("SeectPaymentMode") ? $CurrentForm->getValue("SeectPaymentMode") : $CurrentForm->getValue("x_SeectPaymentMode");
        if (!$this->SeectPaymentMode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SeectPaymentMode->Visible = false; // Disable update for API request
            } else {
                $this->SeectPaymentMode->setFormValue($val);
            }
        }

        // Check field name 'PaidAmount' first before field var 'x_PaidAmount'
        $val = $CurrentForm->hasValue("PaidAmount") ? $CurrentForm->getValue("PaidAmount") : $CurrentForm->getValue("x_PaidAmount");
        if (!$this->PaidAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaidAmount->Visible = false; // Disable update for API request
            } else {
                $this->PaidAmount->setFormValue($val);
            }
        }

        // Check field name 'Currency' first before field var 'x_Currency'
        $val = $CurrentForm->hasValue("Currency") ? $CurrentForm->getValue("Currency") : $CurrentForm->getValue("x_Currency");
        if (!$this->Currency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Currency->Visible = false; // Disable update for API request
            } else {
                $this->Currency->setFormValue($val);
            }
        }

        // Check field name 'CardNumber' first before field var 'x_CardNumber'
        $val = $CurrentForm->hasValue("CardNumber") ? $CurrentForm->getValue("CardNumber") : $CurrentForm->getValue("x_CardNumber");
        if (!$this->CardNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardNumber->Visible = false; // Disable update for API request
            } else {
                $this->CardNumber->setFormValue($val);
            }
        }

        // Check field name 'BankName' first before field var 'x_BankName'
        $val = $CurrentForm->hasValue("BankName") ? $CurrentForm->getValue("BankName") : $CurrentForm->getValue("x_BankName");
        if (!$this->BankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BankName->Visible = false; // Disable update for API request
            } else {
                $this->BankName->setFormValue($val);
            }
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }

        // Check field name 'GetUserName' first before field var 'x_GetUserName'
        $val = $CurrentForm->hasValue("GetUserName") ? $CurrentForm->getValue("GetUserName") : $CurrentForm->getValue("x_GetUserName");
        if (!$this->GetUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GetUserName->Visible = false; // Disable update for API request
            } else {
                $this->GetUserName->setFormValue($val);
            }
        }

        // Check field name 'AdjustmentwithAdvance' first before field var 'x_AdjustmentwithAdvance'
        $val = $CurrentForm->hasValue("AdjustmentwithAdvance") ? $CurrentForm->getValue("AdjustmentwithAdvance") : $CurrentForm->getValue("x_AdjustmentwithAdvance");
        if (!$this->AdjustmentwithAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdjustmentwithAdvance->Visible = false; // Disable update for API request
            } else {
                $this->AdjustmentwithAdvance->setFormValue($val);
            }
        }

        // Check field name 'AdjustmentBillNumber' first before field var 'x_AdjustmentBillNumber'
        $val = $CurrentForm->hasValue("AdjustmentBillNumber") ? $CurrentForm->getValue("AdjustmentBillNumber") : $CurrentForm->getValue("x_AdjustmentBillNumber");
        if (!$this->AdjustmentBillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdjustmentBillNumber->Visible = false; // Disable update for API request
            } else {
                $this->AdjustmentBillNumber->setFormValue($val);
            }
        }

        // Check field name 'CancelAdvance' first before field var 'x_CancelAdvance'
        $val = $CurrentForm->hasValue("CancelAdvance") ? $CurrentForm->getValue("CancelAdvance") : $CurrentForm->getValue("x_CancelAdvance");
        if (!$this->CancelAdvance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelAdvance->Visible = false; // Disable update for API request
            } else {
                $this->CancelAdvance->setFormValue($val);
            }
        }

        // Check field name 'CancelBy' first before field var 'x_CancelBy'
        $val = $CurrentForm->hasValue("CancelBy") ? $CurrentForm->getValue("CancelBy") : $CurrentForm->getValue("x_CancelBy");
        if (!$this->CancelBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelBy->Visible = false; // Disable update for API request
            } else {
                $this->CancelBy->setFormValue($val);
            }
        }

        // Check field name 'CancelDate' first before field var 'x_CancelDate'
        $val = $CurrentForm->hasValue("CancelDate") ? $CurrentForm->getValue("CancelDate") : $CurrentForm->getValue("x_CancelDate");
        if (!$this->CancelDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelDate->Visible = false; // Disable update for API request
            } else {
                $this->CancelDate->setFormValue($val);
            }
            $this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
        }

        // Check field name 'CancelDateTime' first before field var 'x_CancelDateTime'
        $val = $CurrentForm->hasValue("CancelDateTime") ? $CurrentForm->getValue("CancelDateTime") : $CurrentForm->getValue("x_CancelDateTime");
        if (!$this->CancelDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CancelDateTime->setFormValue($val);
            }
            $this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
        }

        // Check field name 'CanceledBy' first before field var 'x_CanceledBy'
        $val = $CurrentForm->hasValue("CanceledBy") ? $CurrentForm->getValue("CanceledBy") : $CurrentForm->getValue("x_CanceledBy");
        if (!$this->CanceledBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CanceledBy->Visible = false; // Disable update for API request
            } else {
                $this->CanceledBy->setFormValue($val);
            }
        }

        // Check field name 'CancelStatus' first before field var 'x_CancelStatus'
        $val = $CurrentForm->hasValue("CancelStatus") ? $CurrentForm->getValue("CancelStatus") : $CurrentForm->getValue("x_CancelStatus");
        if (!$this->CancelStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelStatus->Visible = false; // Disable update for API request
            } else {
                $this->CancelStatus->setFormValue($val);
            }
        }

        // Check field name 'Cash' first before field var 'x_Cash'
        $val = $CurrentForm->hasValue("Cash") ? $CurrentForm->getValue("Cash") : $CurrentForm->getValue("x_Cash");
        if (!$this->Cash->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cash->Visible = false; // Disable update for API request
            } else {
                $this->Cash->setFormValue($val);
            }
        }

        // Check field name 'Card' first before field var 'x_Card'
        $val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
        if (!$this->Card->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Card->Visible = false; // Disable update for API request
            } else {
                $this->Card->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->freezed->CurrentValue = $this->freezed->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->voucher_type->CurrentValue = $this->voucher_type->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->VisiteType->CurrentValue = $this->VisiteType->FormValue;
        $this->VisitDate->CurrentValue = $this->VisitDate->FormValue;
        $this->VisitDate->CurrentValue = UnFormatDateTime($this->VisitDate->CurrentValue, 0);
        $this->AdvanceNo->CurrentValue = $this->AdvanceNo->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->Date->CurrentValue = $this->Date->FormValue;
        $this->Date->CurrentValue = UnFormatDateTime($this->Date->CurrentValue, 0);
        $this->AdvanceValidityDate->CurrentValue = $this->AdvanceValidityDate->FormValue;
        $this->AdvanceValidityDate->CurrentValue = UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0);
        $this->TotalRemainingAdvance->CurrentValue = $this->TotalRemainingAdvance->FormValue;
        $this->SeectPaymentMode->CurrentValue = $this->SeectPaymentMode->FormValue;
        $this->PaidAmount->CurrentValue = $this->PaidAmount->FormValue;
        $this->Currency->CurrentValue = $this->Currency->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->GetUserName->CurrentValue = $this->GetUserName->FormValue;
        $this->AdjustmentwithAdvance->CurrentValue = $this->AdjustmentwithAdvance->FormValue;
        $this->AdjustmentBillNumber->CurrentValue = $this->AdjustmentBillNumber->FormValue;
        $this->CancelAdvance->CurrentValue = $this->CancelAdvance->FormValue;
        $this->CancelBy->CurrentValue = $this->CancelBy->FormValue;
        $this->CancelDate->CurrentValue = $this->CancelDate->FormValue;
        $this->CancelDate->CurrentValue = UnFormatDateTime($this->CancelDate->CurrentValue, 0);
        $this->CancelDateTime->CurrentValue = $this->CancelDateTime->FormValue;
        $this->CancelDateTime->CurrentValue = UnFormatDateTime($this->CancelDateTime->CurrentValue, 0);
        $this->CanceledBy->CurrentValue = $this->CanceledBy->FormValue;
        $this->CancelStatus->CurrentValue = $this->CancelStatus->FormValue;
        $this->Cash->CurrentValue = $this->Cash->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
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
        $this->freezed->setDbValue($row['freezed']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Name->setDbValue($row['Name']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatID->setDbValue($row['PatID']);
        $this->VisiteType->setDbValue($row['VisiteType']);
        $this->VisitDate->setDbValue($row['VisitDate']);
        $this->AdvanceNo->setDbValue($row['AdvanceNo']);
        $this->Status->setDbValue($row['Status']);
        $this->Date->setDbValue($row['Date']);
        $this->AdvanceValidityDate->setDbValue($row['AdvanceValidityDate']);
        $this->TotalRemainingAdvance->setDbValue($row['TotalRemainingAdvance']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->SeectPaymentMode->setDbValue($row['SeectPaymentMode']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->Currency->setDbValue($row['Currency']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Reception->setDbValue($row['Reception']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->GetUserName->setDbValue($row['GetUserName']);
        $this->AdjustmentwithAdvance->setDbValue($row['AdjustmentwithAdvance']);
        $this->AdjustmentBillNumber->setDbValue($row['AdjustmentBillNumber']);
        $this->CancelAdvance->setDbValue($row['CancelAdvance']);
        $this->CancelReasan->setDbValue($row['CancelReasan']);
        $this->CancelBy->setDbValue($row['CancelBy']);
        $this->CancelDate->setDbValue($row['CancelDate']);
        $this->CancelDateTime->setDbValue($row['CancelDateTime']);
        $this->CanceledBy->setDbValue($row['CanceledBy']);
        $this->CancelStatus->setDbValue($row['CancelStatus']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['freezed'] = $this->freezed->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['AnyDues'] = $this->AnyDues->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['VisiteType'] = $this->VisiteType->CurrentValue;
        $row['VisitDate'] = $this->VisitDate->CurrentValue;
        $row['AdvanceNo'] = $this->AdvanceNo->CurrentValue;
        $row['Status'] = $this->Status->CurrentValue;
        $row['Date'] = $this->Date->CurrentValue;
        $row['AdvanceValidityDate'] = $this->AdvanceValidityDate->CurrentValue;
        $row['TotalRemainingAdvance'] = $this->TotalRemainingAdvance->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['SeectPaymentMode'] = $this->SeectPaymentMode->CurrentValue;
        $row['PaidAmount'] = $this->PaidAmount->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['GetUserName'] = $this->GetUserName->CurrentValue;
        $row['AdjustmentwithAdvance'] = $this->AdjustmentwithAdvance->CurrentValue;
        $row['AdjustmentBillNumber'] = $this->AdjustmentBillNumber->CurrentValue;
        $row['CancelAdvance'] = $this->CancelAdvance->CurrentValue;
        $row['CancelReasan'] = $this->CancelReasan->CurrentValue;
        $row['CancelBy'] = $this->CancelBy->CurrentValue;
        $row['CancelDate'] = $this->CancelDate->CurrentValue;
        $row['CancelDateTime'] = $this->CancelDateTime->CurrentValue;
        $row['CanceledBy'] = $this->CanceledBy->CurrentValue;
        $row['CancelStatus'] = $this->CancelStatus->CurrentValue;
        $row['Cash'] = $this->Cash->CurrentValue;
        $row['Card'] = $this->Card->CurrentValue;
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
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cash->FormValue == $this->Cash->CurrentValue && is_numeric(ConvertToFloatString($this->Cash->CurrentValue))) {
            $this->Cash->CurrentValue = ConvertToFloatString($this->Cash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // freezed

        // PatientID

        // PatientName

        // Name

        // Mobile

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatID

        // VisiteType

        // VisitDate

        // AdvanceNo

        // Status

        // Date

        // AdvanceValidityDate

        // TotalRemainingAdvance

        // Remarks

        // SeectPaymentMode

        // PaidAmount

        // Currency

        // CardNumber

        // BankName

        // HospID

        // Reception

        // mrnno

        // GetUserName

        // AdjustmentwithAdvance

        // AdjustmentBillNumber

        // CancelAdvance

        // CancelReasan

        // CancelBy

        // CancelDate

        // CancelDateTime

        // CanceledBy

        // CancelStatus

        // Cash

        // Card
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // freezed
            if (strval($this->freezed->CurrentValue) != "") {
                $this->freezed->ViewValue = $this->freezed->optionCaption($this->freezed->CurrentValue);
            } else {
                $this->freezed->ViewValue = null;
            }
            $this->freezed->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // VisiteType
            $this->VisiteType->ViewValue = $this->VisiteType->CurrentValue;
            $this->VisiteType->ViewCustomAttributes = "";

            // VisitDate
            $this->VisitDate->ViewValue = $this->VisitDate->CurrentValue;
            $this->VisitDate->ViewValue = FormatDateTime($this->VisitDate->ViewValue, 0);
            $this->VisitDate->ViewCustomAttributes = "";

            // AdvanceNo
            $this->AdvanceNo->ViewValue = $this->AdvanceNo->CurrentValue;
            $this->AdvanceNo->ViewCustomAttributes = "";

            // Status
            $this->Status->ViewValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // Date
            $this->Date->ViewValue = $this->Date->CurrentValue;
            $this->Date->ViewValue = FormatDateTime($this->Date->ViewValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->ViewValue = $this->AdvanceValidityDate->CurrentValue;
            $this->AdvanceValidityDate->ViewValue = FormatDateTime($this->AdvanceValidityDate->ViewValue, 0);
            $this->AdvanceValidityDate->ViewCustomAttributes = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->ViewValue = $this->TotalRemainingAdvance->CurrentValue;
            $this->TotalRemainingAdvance->ViewCustomAttributes = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->ViewValue = $this->SeectPaymentMode->CurrentValue;
            $this->SeectPaymentMode->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // GetUserName
            $this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
            $this->GetUserName->ViewCustomAttributes = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->ViewValue = $this->AdjustmentwithAdvance->CurrentValue;
            $this->AdjustmentwithAdvance->ViewCustomAttributes = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->ViewValue = $this->AdjustmentBillNumber->CurrentValue;
            $this->AdjustmentBillNumber->ViewCustomAttributes = "";

            // CancelAdvance
            $this->CancelAdvance->ViewValue = $this->CancelAdvance->CurrentValue;
            $this->CancelAdvance->ViewCustomAttributes = "";

            // CancelBy
            $this->CancelBy->ViewValue = $this->CancelBy->CurrentValue;
            $this->CancelBy->ViewCustomAttributes = "";

            // CancelDate
            $this->CancelDate->ViewValue = $this->CancelDate->CurrentValue;
            $this->CancelDate->ViewValue = FormatDateTime($this->CancelDate->ViewValue, 0);
            $this->CancelDate->ViewCustomAttributes = "";

            // CancelDateTime
            $this->CancelDateTime->ViewValue = $this->CancelDateTime->CurrentValue;
            $this->CancelDateTime->ViewValue = FormatDateTime($this->CancelDateTime->ViewValue, 0);
            $this->CancelDateTime->ViewCustomAttributes = "";

            // CanceledBy
            $this->CanceledBy->ViewValue = $this->CanceledBy->CurrentValue;
            $this->CanceledBy->ViewCustomAttributes = "";

            // CancelStatus
            $this->CancelStatus->ViewValue = $this->CancelStatus->CurrentValue;
            $this->CancelStatus->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // freezed
            $this->freezed->LinkCustomAttributes = "";
            $this->freezed->HrefValue = "";
            $this->freezed->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";
            $this->VisiteType->TooltipValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";
            $this->VisitDate->TooltipValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";
            $this->AdvanceNo->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";
            $this->AdvanceValidityDate->TooltipValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";
            $this->TotalRemainingAdvance->TooltipValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";
            $this->SeectPaymentMode->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";
            $this->Currency->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";
            $this->GetUserName->TooltipValue = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->LinkCustomAttributes = "";
            $this->AdjustmentwithAdvance->HrefValue = "";
            $this->AdjustmentwithAdvance->TooltipValue = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->LinkCustomAttributes = "";
            $this->AdjustmentBillNumber->HrefValue = "";
            $this->AdjustmentBillNumber->TooltipValue = "";

            // CancelAdvance
            $this->CancelAdvance->LinkCustomAttributes = "";
            $this->CancelAdvance->HrefValue = "";
            $this->CancelAdvance->TooltipValue = "";

            // CancelBy
            $this->CancelBy->LinkCustomAttributes = "";
            $this->CancelBy->HrefValue = "";
            $this->CancelBy->TooltipValue = "";

            // CancelDate
            $this->CancelDate->LinkCustomAttributes = "";
            $this->CancelDate->HrefValue = "";
            $this->CancelDate->TooltipValue = "";

            // CancelDateTime
            $this->CancelDateTime->LinkCustomAttributes = "";
            $this->CancelDateTime->HrefValue = "";
            $this->CancelDateTime->TooltipValue = "";

            // CanceledBy
            $this->CanceledBy->LinkCustomAttributes = "";
            $this->CanceledBy->HrefValue = "";
            $this->CanceledBy->TooltipValue = "";

            // CancelStatus
            $this->CancelStatus->LinkCustomAttributes = "";
            $this->CancelStatus->HrefValue = "";
            $this->CancelStatus->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // freezed
            $this->freezed->EditCustomAttributes = "";
            $this->freezed->EditValue = $this->freezed->options(false);
            $this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->CurrentValue = HtmlDecode($this->Mobile->CurrentValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->CurrentValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->CurrentValue = HtmlDecode($this->voucher_type->CurrentValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->CurrentValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            if (!$this->ModeofPayment->Raw) {
                $this->ModeofPayment->CurrentValue = HtmlDecode($this->ModeofPayment->CurrentValue);
            }
            $this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->CurrentValue);
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
            }

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            if (!$this->VisiteType->Raw) {
                $this->VisiteType->CurrentValue = HtmlDecode($this->VisiteType->CurrentValue);
            }
            $this->VisiteType->EditValue = HtmlEncode($this->VisiteType->CurrentValue);
            $this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = HtmlEncode(FormatDateTime($this->VisitDate->CurrentValue, 8));
            $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            if (!$this->AdvanceNo->Raw) {
                $this->AdvanceNo->CurrentValue = HtmlDecode($this->AdvanceNo->CurrentValue);
            }
            $this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->CurrentValue);
            $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime($this->Date->CurrentValue, 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime($this->AdvanceValidityDate->CurrentValue, 8));
            $this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            if (!$this->TotalRemainingAdvance->Raw) {
                $this->TotalRemainingAdvance->CurrentValue = HtmlDecode($this->TotalRemainingAdvance->CurrentValue);
            }
            $this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->CurrentValue);
            $this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            if (!$this->SeectPaymentMode->Raw) {
                $this->SeectPaymentMode->CurrentValue = HtmlDecode($this->SeectPaymentMode->CurrentValue);
            }
            $this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->CurrentValue);
            $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            if (!$this->PaidAmount->Raw) {
                $this->PaidAmount->CurrentValue = HtmlDecode($this->PaidAmount->CurrentValue);
            }
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->CurrentValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->CurrentValue = HtmlDecode($this->Currency->CurrentValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->CurrentValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // GetUserName
            $this->GetUserName->EditAttrs["class"] = "form-control";
            $this->GetUserName->EditCustomAttributes = "";
            if (!$this->GetUserName->Raw) {
                $this->GetUserName->CurrentValue = HtmlDecode($this->GetUserName->CurrentValue);
            }
            $this->GetUserName->EditValue = HtmlEncode($this->GetUserName->CurrentValue);
            $this->GetUserName->PlaceHolder = RemoveHtml($this->GetUserName->caption());

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
            $this->AdjustmentwithAdvance->EditCustomAttributes = "";
            if (!$this->AdjustmentwithAdvance->Raw) {
                $this->AdjustmentwithAdvance->CurrentValue = HtmlDecode($this->AdjustmentwithAdvance->CurrentValue);
            }
            $this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->CurrentValue);
            $this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
            $this->AdjustmentBillNumber->EditCustomAttributes = "";
            if (!$this->AdjustmentBillNumber->Raw) {
                $this->AdjustmentBillNumber->CurrentValue = HtmlDecode($this->AdjustmentBillNumber->CurrentValue);
            }
            $this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->CurrentValue);
            $this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

            // CancelAdvance
            $this->CancelAdvance->EditAttrs["class"] = "form-control";
            $this->CancelAdvance->EditCustomAttributes = "";
            if (!$this->CancelAdvance->Raw) {
                $this->CancelAdvance->CurrentValue = HtmlDecode($this->CancelAdvance->CurrentValue);
            }
            $this->CancelAdvance->EditValue = HtmlEncode($this->CancelAdvance->CurrentValue);
            $this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

            // CancelBy
            $this->CancelBy->EditAttrs["class"] = "form-control";
            $this->CancelBy->EditCustomAttributes = "";
            if (!$this->CancelBy->Raw) {
                $this->CancelBy->CurrentValue = HtmlDecode($this->CancelBy->CurrentValue);
            }
            $this->CancelBy->EditValue = HtmlEncode($this->CancelBy->CurrentValue);
            $this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

            // CancelDate
            $this->CancelDate->EditAttrs["class"] = "form-control";
            $this->CancelDate->EditCustomAttributes = "";
            $this->CancelDate->EditValue = HtmlEncode(FormatDateTime($this->CancelDate->CurrentValue, 8));
            $this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

            // CancelDateTime
            $this->CancelDateTime->EditAttrs["class"] = "form-control";
            $this->CancelDateTime->EditCustomAttributes = "";
            $this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime($this->CancelDateTime->CurrentValue, 8));
            $this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

            // CanceledBy
            $this->CanceledBy->EditAttrs["class"] = "form-control";
            $this->CanceledBy->EditCustomAttributes = "";
            if (!$this->CanceledBy->Raw) {
                $this->CanceledBy->CurrentValue = HtmlDecode($this->CanceledBy->CurrentValue);
            }
            $this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->CurrentValue);
            $this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

            // CancelStatus
            $this->CancelStatus->EditAttrs["class"] = "form-control";
            $this->CancelStatus->EditCustomAttributes = "";
            if (!$this->CancelStatus->Raw) {
                $this->CancelStatus->CurrentValue = HtmlDecode($this->CancelStatus->CurrentValue);
            }
            $this->CancelStatus->EditValue = HtmlEncode($this->CancelStatus->CurrentValue);
            $this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
            if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
                $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
            }

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
            if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
                $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
            }

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // freezed
            $this->freezed->LinkCustomAttributes = "";
            $this->freezed->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->LinkCustomAttributes = "";
            $this->AdjustmentwithAdvance->HrefValue = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->LinkCustomAttributes = "";
            $this->AdjustmentBillNumber->HrefValue = "";

            // CancelAdvance
            $this->CancelAdvance->LinkCustomAttributes = "";
            $this->CancelAdvance->HrefValue = "";

            // CancelBy
            $this->CancelBy->LinkCustomAttributes = "";
            $this->CancelBy->HrefValue = "";

            // CancelDate
            $this->CancelDate->LinkCustomAttributes = "";
            $this->CancelDate->HrefValue = "";

            // CancelDateTime
            $this->CancelDateTime->LinkCustomAttributes = "";
            $this->CancelDateTime->HrefValue = "";

            // CanceledBy
            $this->CanceledBy->LinkCustomAttributes = "";
            $this->CanceledBy->HrefValue = "";

            // CancelStatus
            $this->CancelStatus->LinkCustomAttributes = "";
            $this->CancelStatus->HrefValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // freezed
            $this->freezed->EditCustomAttributes = "";
            $this->freezed->EditValue = $this->freezed->options(false);
            $this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            $this->PatientID->EditValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            $this->PatientName->EditValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            $this->Mobile->EditValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            $this->voucher_type->EditValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            $this->Details->EditValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = $this->Amount->CurrentValue;
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            $this->createdby->EditValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->EditValue = FormatDateTime($this->createddatetime->EditValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            $this->modifiedby->EditValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->EditValue = FormatDateTime($this->modifieddatetime->EditValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = $this->PatID->CurrentValue;
            $this->PatID->EditValue = FormatNumber($this->PatID->EditValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            $this->VisiteType->EditValue = $this->VisiteType->CurrentValue;
            $this->VisiteType->ViewCustomAttributes = "";

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = $this->VisitDate->CurrentValue;
            $this->VisitDate->EditValue = FormatDateTime($this->VisitDate->EditValue, 0);
            $this->VisitDate->ViewCustomAttributes = "";

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            $this->AdvanceNo->EditValue = $this->AdvanceNo->CurrentValue;
            $this->AdvanceNo->ViewCustomAttributes = "";

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            $this->Status->EditValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = $this->Date->CurrentValue;
            $this->Date->EditValue = FormatDateTime($this->Date->EditValue, 0);
            $this->Date->ViewCustomAttributes = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = $this->AdvanceValidityDate->CurrentValue;
            $this->AdvanceValidityDate->EditValue = FormatDateTime($this->AdvanceValidityDate->EditValue, 0);
            $this->AdvanceValidityDate->ViewCustomAttributes = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            $this->TotalRemainingAdvance->EditValue = $this->TotalRemainingAdvance->CurrentValue;
            $this->TotalRemainingAdvance->ViewCustomAttributes = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            $this->SeectPaymentMode->EditValue = $this->SeectPaymentMode->CurrentValue;
            $this->SeectPaymentMode->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            $this->PaidAmount->EditValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewCustomAttributes = "";

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            $this->Currency->EditValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            $this->CardNumber->EditValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            $this->BankName->EditValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = $this->HospID->CurrentValue;
            $this->HospID->EditValue = FormatNumber($this->HospID->EditValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = $this->Reception->CurrentValue;
            $this->Reception->EditValue = FormatNumber($this->Reception->EditValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            $this->mrnno->EditValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // GetUserName
            $this->GetUserName->EditAttrs["class"] = "form-control";
            $this->GetUserName->EditCustomAttributes = "";
            $this->GetUserName->EditValue = $this->GetUserName->CurrentValue;
            $this->GetUserName->ViewCustomAttributes = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
            $this->AdjustmentwithAdvance->EditCustomAttributes = "";
            $this->AdjustmentwithAdvance->EditValue = $this->AdjustmentwithAdvance->CurrentValue;
            $this->AdjustmentwithAdvance->ViewCustomAttributes = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
            $this->AdjustmentBillNumber->EditCustomAttributes = "";
            $this->AdjustmentBillNumber->EditValue = $this->AdjustmentBillNumber->CurrentValue;
            $this->AdjustmentBillNumber->ViewCustomAttributes = "";

            // CancelAdvance
            $this->CancelAdvance->EditAttrs["class"] = "form-control";
            $this->CancelAdvance->EditCustomAttributes = "";
            $this->CancelAdvance->EditValue = $this->CancelAdvance->CurrentValue;
            $this->CancelAdvance->ViewCustomAttributes = "";

            // CancelBy
            $this->CancelBy->EditAttrs["class"] = "form-control";
            $this->CancelBy->EditCustomAttributes = "";
            $this->CancelBy->EditValue = $this->CancelBy->CurrentValue;
            $this->CancelBy->ViewCustomAttributes = "";

            // CancelDate
            $this->CancelDate->EditAttrs["class"] = "form-control";
            $this->CancelDate->EditCustomAttributes = "";
            $this->CancelDate->EditValue = $this->CancelDate->CurrentValue;
            $this->CancelDate->EditValue = FormatDateTime($this->CancelDate->EditValue, 0);
            $this->CancelDate->ViewCustomAttributes = "";

            // CancelDateTime
            $this->CancelDateTime->EditAttrs["class"] = "form-control";
            $this->CancelDateTime->EditCustomAttributes = "";
            $this->CancelDateTime->EditValue = $this->CancelDateTime->CurrentValue;
            $this->CancelDateTime->EditValue = FormatDateTime($this->CancelDateTime->EditValue, 0);
            $this->CancelDateTime->ViewCustomAttributes = "";

            // CanceledBy
            $this->CanceledBy->EditAttrs["class"] = "form-control";
            $this->CanceledBy->EditCustomAttributes = "";
            $this->CanceledBy->EditValue = $this->CanceledBy->CurrentValue;
            $this->CanceledBy->ViewCustomAttributes = "";

            // CancelStatus
            $this->CancelStatus->EditAttrs["class"] = "form-control";
            $this->CancelStatus->EditCustomAttributes = "";
            $this->CancelStatus->EditValue = $this->CancelStatus->CurrentValue;
            $this->CancelStatus->ViewCustomAttributes = "";

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = $this->Cash->CurrentValue;
            $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = $this->Card->CurrentValue;
            $this->Card->EditValue = FormatNumber($this->Card->EditValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // freezed
            $this->freezed->LinkCustomAttributes = "";
            $this->freezed->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // voucher_type
            $this->voucher_type->LinkCustomAttributes = "";
            $this->voucher_type->HrefValue = "";
            $this->voucher_type->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // VisiteType
            $this->VisiteType->LinkCustomAttributes = "";
            $this->VisiteType->HrefValue = "";
            $this->VisiteType->TooltipValue = "";

            // VisitDate
            $this->VisitDate->LinkCustomAttributes = "";
            $this->VisitDate->HrefValue = "";
            $this->VisitDate->TooltipValue = "";

            // AdvanceNo
            $this->AdvanceNo->LinkCustomAttributes = "";
            $this->AdvanceNo->HrefValue = "";
            $this->AdvanceNo->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Date
            $this->Date->LinkCustomAttributes = "";
            $this->Date->HrefValue = "";
            $this->Date->TooltipValue = "";

            // AdvanceValidityDate
            $this->AdvanceValidityDate->LinkCustomAttributes = "";
            $this->AdvanceValidityDate->HrefValue = "";
            $this->AdvanceValidityDate->TooltipValue = "";

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->LinkCustomAttributes = "";
            $this->TotalRemainingAdvance->HrefValue = "";
            $this->TotalRemainingAdvance->TooltipValue = "";

            // SeectPaymentMode
            $this->SeectPaymentMode->LinkCustomAttributes = "";
            $this->SeectPaymentMode->HrefValue = "";
            $this->SeectPaymentMode->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // Currency
            $this->Currency->LinkCustomAttributes = "";
            $this->Currency->HrefValue = "";
            $this->Currency->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";
            $this->GetUserName->TooltipValue = "";

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->LinkCustomAttributes = "";
            $this->AdjustmentwithAdvance->HrefValue = "";
            $this->AdjustmentwithAdvance->TooltipValue = "";

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->LinkCustomAttributes = "";
            $this->AdjustmentBillNumber->HrefValue = "";
            $this->AdjustmentBillNumber->TooltipValue = "";

            // CancelAdvance
            $this->CancelAdvance->LinkCustomAttributes = "";
            $this->CancelAdvance->HrefValue = "";
            $this->CancelAdvance->TooltipValue = "";

            // CancelBy
            $this->CancelBy->LinkCustomAttributes = "";
            $this->CancelBy->HrefValue = "";
            $this->CancelBy->TooltipValue = "";

            // CancelDate
            $this->CancelDate->LinkCustomAttributes = "";
            $this->CancelDate->HrefValue = "";
            $this->CancelDate->TooltipValue = "";

            // CancelDateTime
            $this->CancelDateTime->LinkCustomAttributes = "";
            $this->CancelDateTime->HrefValue = "";
            $this->CancelDateTime->TooltipValue = "";

            // CanceledBy
            $this->CanceledBy->LinkCustomAttributes = "";
            $this->CanceledBy->HrefValue = "";
            $this->CanceledBy->TooltipValue = "";

            // CancelStatus
            $this->CancelStatus->LinkCustomAttributes = "";
            $this->CancelStatus->HrefValue = "";
            $this->CancelStatus->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // freezed
            $this->freezed->EditCustomAttributes = "";
            $this->freezed->EditValue = $this->freezed->options(false);
            $this->freezed->PlaceHolder = RemoveHtml($this->freezed->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Mobile
            $this->Mobile->EditAttrs["class"] = "form-control";
            $this->Mobile->EditCustomAttributes = "";
            if (!$this->Mobile->Raw) {
                $this->Mobile->AdvancedSearch->SearchValue = HtmlDecode($this->Mobile->AdvancedSearch->SearchValue);
            }
            $this->Mobile->EditValue = HtmlEncode($this->Mobile->AdvancedSearch->SearchValue);
            $this->Mobile->PlaceHolder = RemoveHtml($this->Mobile->caption());

            // voucher_type
            $this->voucher_type->EditAttrs["class"] = "form-control";
            $this->voucher_type->EditCustomAttributes = "";
            if (!$this->voucher_type->Raw) {
                $this->voucher_type->AdvancedSearch->SearchValue = HtmlDecode($this->voucher_type->AdvancedSearch->SearchValue);
            }
            $this->voucher_type->EditValue = HtmlEncode($this->voucher_type->AdvancedSearch->SearchValue);
            $this->voucher_type->PlaceHolder = RemoveHtml($this->voucher_type->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->AdvancedSearch->SearchValue = HtmlDecode($this->Details->AdvancedSearch->SearchValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->AdvancedSearch->SearchValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            if (!$this->ModeofPayment->Raw) {
                $this->ModeofPayment->AdvancedSearch->SearchValue = HtmlDecode($this->ModeofPayment->AdvancedSearch->SearchValue);
            }
            $this->ModeofPayment->EditValue = HtmlEncode($this->ModeofPayment->AdvancedSearch->SearchValue);
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // VisiteType
            $this->VisiteType->EditAttrs["class"] = "form-control";
            $this->VisiteType->EditCustomAttributes = "";
            if (!$this->VisiteType->Raw) {
                $this->VisiteType->AdvancedSearch->SearchValue = HtmlDecode($this->VisiteType->AdvancedSearch->SearchValue);
            }
            $this->VisiteType->EditValue = HtmlEncode($this->VisiteType->AdvancedSearch->SearchValue);
            $this->VisiteType->PlaceHolder = RemoveHtml($this->VisiteType->caption());

            // VisitDate
            $this->VisitDate->EditAttrs["class"] = "form-control";
            $this->VisitDate->EditCustomAttributes = "";
            $this->VisitDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->VisitDate->AdvancedSearch->SearchValue, 0), 8));
            $this->VisitDate->PlaceHolder = RemoveHtml($this->VisitDate->caption());

            // AdvanceNo
            $this->AdvanceNo->EditAttrs["class"] = "form-control";
            $this->AdvanceNo->EditCustomAttributes = "";
            if (!$this->AdvanceNo->Raw) {
                $this->AdvanceNo->AdvancedSearch->SearchValue = HtmlDecode($this->AdvanceNo->AdvancedSearch->SearchValue);
            }
            $this->AdvanceNo->EditValue = HtmlEncode($this->AdvanceNo->AdvancedSearch->SearchValue);
            $this->AdvanceNo->PlaceHolder = RemoveHtml($this->AdvanceNo->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->AdvancedSearch->SearchValue = HtmlDecode($this->Status->AdvancedSearch->SearchValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->AdvancedSearch->SearchValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // Date
            $this->Date->EditAttrs["class"] = "form-control";
            $this->Date->EditCustomAttributes = "";
            $this->Date->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->Date->AdvancedSearch->SearchValue, 0), 8));
            $this->Date->PlaceHolder = RemoveHtml($this->Date->caption());

            // AdvanceValidityDate
            $this->AdvanceValidityDate->EditAttrs["class"] = "form-control";
            $this->AdvanceValidityDate->EditCustomAttributes = "";
            $this->AdvanceValidityDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->AdvanceValidityDate->AdvancedSearch->SearchValue, 0), 8));
            $this->AdvanceValidityDate->PlaceHolder = RemoveHtml($this->AdvanceValidityDate->caption());

            // TotalRemainingAdvance
            $this->TotalRemainingAdvance->EditAttrs["class"] = "form-control";
            $this->TotalRemainingAdvance->EditCustomAttributes = "";
            if (!$this->TotalRemainingAdvance->Raw) {
                $this->TotalRemainingAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->TotalRemainingAdvance->AdvancedSearch->SearchValue);
            }
            $this->TotalRemainingAdvance->EditValue = HtmlEncode($this->TotalRemainingAdvance->AdvancedSearch->SearchValue);
            $this->TotalRemainingAdvance->PlaceHolder = RemoveHtml($this->TotalRemainingAdvance->caption());

            // SeectPaymentMode
            $this->SeectPaymentMode->EditAttrs["class"] = "form-control";
            $this->SeectPaymentMode->EditCustomAttributes = "";
            if (!$this->SeectPaymentMode->Raw) {
                $this->SeectPaymentMode->AdvancedSearch->SearchValue = HtmlDecode($this->SeectPaymentMode->AdvancedSearch->SearchValue);
            }
            $this->SeectPaymentMode->EditValue = HtmlEncode($this->SeectPaymentMode->AdvancedSearch->SearchValue);
            $this->SeectPaymentMode->PlaceHolder = RemoveHtml($this->SeectPaymentMode->caption());

            // PaidAmount
            $this->PaidAmount->EditAttrs["class"] = "form-control";
            $this->PaidAmount->EditCustomAttributes = "";
            if (!$this->PaidAmount->Raw) {
                $this->PaidAmount->AdvancedSearch->SearchValue = HtmlDecode($this->PaidAmount->AdvancedSearch->SearchValue);
            }
            $this->PaidAmount->EditValue = HtmlEncode($this->PaidAmount->AdvancedSearch->SearchValue);
            $this->PaidAmount->PlaceHolder = RemoveHtml($this->PaidAmount->caption());

            // Currency
            $this->Currency->EditAttrs["class"] = "form-control";
            $this->Currency->EditCustomAttributes = "";
            if (!$this->Currency->Raw) {
                $this->Currency->AdvancedSearch->SearchValue = HtmlDecode($this->Currency->AdvancedSearch->SearchValue);
            }
            $this->Currency->EditValue = HtmlEncode($this->Currency->AdvancedSearch->SearchValue);
            $this->Currency->PlaceHolder = RemoveHtml($this->Currency->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CardNumber->AdvancedSearch->SearchValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->AdvancedSearch->SearchValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // GetUserName
            $this->GetUserName->EditAttrs["class"] = "form-control";
            $this->GetUserName->EditCustomAttributes = "";
            if (!$this->GetUserName->Raw) {
                $this->GetUserName->AdvancedSearch->SearchValue = HtmlDecode($this->GetUserName->AdvancedSearch->SearchValue);
            }
            $this->GetUserName->EditValue = HtmlEncode($this->GetUserName->AdvancedSearch->SearchValue);
            $this->GetUserName->PlaceHolder = RemoveHtml($this->GetUserName->caption());

            // AdjustmentwithAdvance
            $this->AdjustmentwithAdvance->EditAttrs["class"] = "form-control";
            $this->AdjustmentwithAdvance->EditCustomAttributes = "";
            if (!$this->AdjustmentwithAdvance->Raw) {
                $this->AdjustmentwithAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue);
            }
            $this->AdjustmentwithAdvance->EditValue = HtmlEncode($this->AdjustmentwithAdvance->AdvancedSearch->SearchValue);
            $this->AdjustmentwithAdvance->PlaceHolder = RemoveHtml($this->AdjustmentwithAdvance->caption());

            // AdjustmentBillNumber
            $this->AdjustmentBillNumber->EditAttrs["class"] = "form-control";
            $this->AdjustmentBillNumber->EditCustomAttributes = "";
            if (!$this->AdjustmentBillNumber->Raw) {
                $this->AdjustmentBillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->AdjustmentBillNumber->AdvancedSearch->SearchValue);
            }
            $this->AdjustmentBillNumber->EditValue = HtmlEncode($this->AdjustmentBillNumber->AdvancedSearch->SearchValue);
            $this->AdjustmentBillNumber->PlaceHolder = RemoveHtml($this->AdjustmentBillNumber->caption());

            // CancelAdvance
            $this->CancelAdvance->EditAttrs["class"] = "form-control";
            $this->CancelAdvance->EditCustomAttributes = "";
            if (!$this->CancelAdvance->Raw) {
                $this->CancelAdvance->AdvancedSearch->SearchValue = HtmlDecode($this->CancelAdvance->AdvancedSearch->SearchValue);
            }
            $this->CancelAdvance->EditValue = HtmlEncode($this->CancelAdvance->AdvancedSearch->SearchValue);
            $this->CancelAdvance->PlaceHolder = RemoveHtml($this->CancelAdvance->caption());

            // CancelBy
            $this->CancelBy->EditAttrs["class"] = "form-control";
            $this->CancelBy->EditCustomAttributes = "";
            if (!$this->CancelBy->Raw) {
                $this->CancelBy->AdvancedSearch->SearchValue = HtmlDecode($this->CancelBy->AdvancedSearch->SearchValue);
            }
            $this->CancelBy->EditValue = HtmlEncode($this->CancelBy->AdvancedSearch->SearchValue);
            $this->CancelBy->PlaceHolder = RemoveHtml($this->CancelBy->caption());

            // CancelDate
            $this->CancelDate->EditAttrs["class"] = "form-control";
            $this->CancelDate->EditCustomAttributes = "";
            $this->CancelDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CancelDate->AdvancedSearch->SearchValue, 0), 8));
            $this->CancelDate->PlaceHolder = RemoveHtml($this->CancelDate->caption());

            // CancelDateTime
            $this->CancelDateTime->EditAttrs["class"] = "form-control";
            $this->CancelDateTime->EditCustomAttributes = "";
            $this->CancelDateTime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CancelDateTime->AdvancedSearch->SearchValue, 0), 8));
            $this->CancelDateTime->PlaceHolder = RemoveHtml($this->CancelDateTime->caption());

            // CanceledBy
            $this->CanceledBy->EditAttrs["class"] = "form-control";
            $this->CanceledBy->EditCustomAttributes = "";
            if (!$this->CanceledBy->Raw) {
                $this->CanceledBy->AdvancedSearch->SearchValue = HtmlDecode($this->CanceledBy->AdvancedSearch->SearchValue);
            }
            $this->CanceledBy->EditValue = HtmlEncode($this->CanceledBy->AdvancedSearch->SearchValue);
            $this->CanceledBy->PlaceHolder = RemoveHtml($this->CanceledBy->caption());

            // CancelStatus
            $this->CancelStatus->EditAttrs["class"] = "form-control";
            $this->CancelStatus->EditCustomAttributes = "";
            if (!$this->CancelStatus->Raw) {
                $this->CancelStatus->AdvancedSearch->SearchValue = HtmlDecode($this->CancelStatus->AdvancedSearch->SearchValue);
            }
            $this->CancelStatus->EditValue = HtmlEncode($this->CancelStatus->AdvancedSearch->SearchValue);
            $this->CancelStatus->PlaceHolder = RemoveHtml($this->CancelStatus->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->AdvancedSearch->SearchValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->AdvancedSearch->SearchValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
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
        if ($this->freezed->Required) {
            if ($this->freezed->FormValue == "") {
                $this->freezed->addErrorMessage(str_replace("%s", $this->freezed->caption(), $this->freezed->RequiredErrorMessage));
            }
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Mobile->Required) {
            if (!$this->Mobile->IsDetailKey && EmptyValue($this->Mobile->FormValue)) {
                $this->Mobile->addErrorMessage(str_replace("%s", $this->Mobile->caption(), $this->Mobile->RequiredErrorMessage));
            }
        }
        if ($this->voucher_type->Required) {
            if (!$this->voucher_type->IsDetailKey && EmptyValue($this->voucher_type->FormValue)) {
                $this->voucher_type->addErrorMessage(str_replace("%s", $this->voucher_type->caption(), $this->voucher_type->RequiredErrorMessage));
            }
        }
        if ($this->Details->Required) {
            if (!$this->Details->IsDetailKey && EmptyValue($this->Details->FormValue)) {
                $this->Details->addErrorMessage(str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
            }
        }
        if ($this->ModeofPayment->Required) {
            if (!$this->ModeofPayment->IsDetailKey && EmptyValue($this->ModeofPayment->FormValue)) {
                $this->ModeofPayment->addErrorMessage(str_replace("%s", $this->ModeofPayment->caption(), $this->ModeofPayment->RequiredErrorMessage));
            }
        }
        if ($this->Amount->Required) {
            if (!$this->Amount->IsDetailKey && EmptyValue($this->Amount->FormValue)) {
                $this->Amount->addErrorMessage(str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
            }
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->VisiteType->Required) {
            if (!$this->VisiteType->IsDetailKey && EmptyValue($this->VisiteType->FormValue)) {
                $this->VisiteType->addErrorMessage(str_replace("%s", $this->VisiteType->caption(), $this->VisiteType->RequiredErrorMessage));
            }
        }
        if ($this->VisitDate->Required) {
            if (!$this->VisitDate->IsDetailKey && EmptyValue($this->VisitDate->FormValue)) {
                $this->VisitDate->addErrorMessage(str_replace("%s", $this->VisitDate->caption(), $this->VisitDate->RequiredErrorMessage));
            }
        }
        if ($this->AdvanceNo->Required) {
            if (!$this->AdvanceNo->IsDetailKey && EmptyValue($this->AdvanceNo->FormValue)) {
                $this->AdvanceNo->addErrorMessage(str_replace("%s", $this->AdvanceNo->caption(), $this->AdvanceNo->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->Date->Required) {
            if (!$this->Date->IsDetailKey && EmptyValue($this->Date->FormValue)) {
                $this->Date->addErrorMessage(str_replace("%s", $this->Date->caption(), $this->Date->RequiredErrorMessage));
            }
        }
        if ($this->AdvanceValidityDate->Required) {
            if (!$this->AdvanceValidityDate->IsDetailKey && EmptyValue($this->AdvanceValidityDate->FormValue)) {
                $this->AdvanceValidityDate->addErrorMessage(str_replace("%s", $this->AdvanceValidityDate->caption(), $this->AdvanceValidityDate->RequiredErrorMessage));
            }
        }
        if ($this->TotalRemainingAdvance->Required) {
            if (!$this->TotalRemainingAdvance->IsDetailKey && EmptyValue($this->TotalRemainingAdvance->FormValue)) {
                $this->TotalRemainingAdvance->addErrorMessage(str_replace("%s", $this->TotalRemainingAdvance->caption(), $this->TotalRemainingAdvance->RequiredErrorMessage));
            }
        }
        if ($this->SeectPaymentMode->Required) {
            if (!$this->SeectPaymentMode->IsDetailKey && EmptyValue($this->SeectPaymentMode->FormValue)) {
                $this->SeectPaymentMode->addErrorMessage(str_replace("%s", $this->SeectPaymentMode->caption(), $this->SeectPaymentMode->RequiredErrorMessage));
            }
        }
        if ($this->PaidAmount->Required) {
            if (!$this->PaidAmount->IsDetailKey && EmptyValue($this->PaidAmount->FormValue)) {
                $this->PaidAmount->addErrorMessage(str_replace("%s", $this->PaidAmount->caption(), $this->PaidAmount->RequiredErrorMessage));
            }
        }
        if ($this->Currency->Required) {
            if (!$this->Currency->IsDetailKey && EmptyValue($this->Currency->FormValue)) {
                $this->Currency->addErrorMessage(str_replace("%s", $this->Currency->caption(), $this->Currency->RequiredErrorMessage));
            }
        }
        if ($this->CardNumber->Required) {
            if (!$this->CardNumber->IsDetailKey && EmptyValue($this->CardNumber->FormValue)) {
                $this->CardNumber->addErrorMessage(str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
            }
        }
        if ($this->BankName->Required) {
            if (!$this->BankName->IsDetailKey && EmptyValue($this->BankName->FormValue)) {
                $this->BankName->addErrorMessage(str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->GetUserName->Required) {
            if (!$this->GetUserName->IsDetailKey && EmptyValue($this->GetUserName->FormValue)) {
                $this->GetUserName->addErrorMessage(str_replace("%s", $this->GetUserName->caption(), $this->GetUserName->RequiredErrorMessage));
            }
        }
        if ($this->AdjustmentwithAdvance->Required) {
            if (!$this->AdjustmentwithAdvance->IsDetailKey && EmptyValue($this->AdjustmentwithAdvance->FormValue)) {
                $this->AdjustmentwithAdvance->addErrorMessage(str_replace("%s", $this->AdjustmentwithAdvance->caption(), $this->AdjustmentwithAdvance->RequiredErrorMessage));
            }
        }
        if ($this->AdjustmentBillNumber->Required) {
            if (!$this->AdjustmentBillNumber->IsDetailKey && EmptyValue($this->AdjustmentBillNumber->FormValue)) {
                $this->AdjustmentBillNumber->addErrorMessage(str_replace("%s", $this->AdjustmentBillNumber->caption(), $this->AdjustmentBillNumber->RequiredErrorMessage));
            }
        }
        if ($this->CancelAdvance->Required) {
            if (!$this->CancelAdvance->IsDetailKey && EmptyValue($this->CancelAdvance->FormValue)) {
                $this->CancelAdvance->addErrorMessage(str_replace("%s", $this->CancelAdvance->caption(), $this->CancelAdvance->RequiredErrorMessage));
            }
        }
        if ($this->CancelBy->Required) {
            if (!$this->CancelBy->IsDetailKey && EmptyValue($this->CancelBy->FormValue)) {
                $this->CancelBy->addErrorMessage(str_replace("%s", $this->CancelBy->caption(), $this->CancelBy->RequiredErrorMessage));
            }
        }
        if ($this->CancelDate->Required) {
            if (!$this->CancelDate->IsDetailKey && EmptyValue($this->CancelDate->FormValue)) {
                $this->CancelDate->addErrorMessage(str_replace("%s", $this->CancelDate->caption(), $this->CancelDate->RequiredErrorMessage));
            }
        }
        if ($this->CancelDateTime->Required) {
            if (!$this->CancelDateTime->IsDetailKey && EmptyValue($this->CancelDateTime->FormValue)) {
                $this->CancelDateTime->addErrorMessage(str_replace("%s", $this->CancelDateTime->caption(), $this->CancelDateTime->RequiredErrorMessage));
            }
        }
        if ($this->CanceledBy->Required) {
            if (!$this->CanceledBy->IsDetailKey && EmptyValue($this->CanceledBy->FormValue)) {
                $this->CanceledBy->addErrorMessage(str_replace("%s", $this->CanceledBy->caption(), $this->CanceledBy->RequiredErrorMessage));
            }
        }
        if ($this->CancelStatus->Required) {
            if (!$this->CancelStatus->IsDetailKey && EmptyValue($this->CancelStatus->FormValue)) {
                $this->CancelStatus->addErrorMessage(str_replace("%s", $this->CancelStatus->caption(), $this->CancelStatus->RequiredErrorMessage));
            }
        }
        if ($this->Cash->Required) {
            if (!$this->Cash->IsDetailKey && EmptyValue($this->Cash->FormValue)) {
                $this->Cash->addErrorMessage(str_replace("%s", $this->Cash->caption(), $this->Cash->RequiredErrorMessage));
            }
        }
        if ($this->Card->Required) {
            if (!$this->Card->IsDetailKey && EmptyValue($this->Card->FormValue)) {
                $this->Card->addErrorMessage(str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
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

            // freezed
            $this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, null, $this->freezed->ReadOnly);

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
        $hash .= GetFieldHash($row['freezed']); // freezed
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

        // freezed
        $this->freezed->setDbValueDef($rsnew, $this->freezed->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // voucher_type
        $this->voucher_type->setDbValueDef($rsnew, $this->voucher_type->CurrentValue, null, false);

        // Details
        $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // VisiteType
        $this->VisiteType->setDbValueDef($rsnew, $this->VisiteType->CurrentValue, null, false);

        // VisitDate
        $this->VisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->VisitDate->CurrentValue, 0), null, false);

        // AdvanceNo
        $this->AdvanceNo->setDbValueDef($rsnew, $this->AdvanceNo->CurrentValue, null, false);

        // Status
        $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, false);

        // Date
        $this->Date->setDbValueDef($rsnew, UnFormatDateTime($this->Date->CurrentValue, 0), null, false);

        // AdvanceValidityDate
        $this->AdvanceValidityDate->setDbValueDef($rsnew, UnFormatDateTime($this->AdvanceValidityDate->CurrentValue, 0), null, false);

        // TotalRemainingAdvance
        $this->TotalRemainingAdvance->setDbValueDef($rsnew, $this->TotalRemainingAdvance->CurrentValue, null, false);

        // SeectPaymentMode
        $this->SeectPaymentMode->setDbValueDef($rsnew, $this->SeectPaymentMode->CurrentValue, null, false);

        // PaidAmount
        $this->PaidAmount->setDbValueDef($rsnew, $this->PaidAmount->CurrentValue, null, false);

        // Currency
        $this->Currency->setDbValueDef($rsnew, $this->Currency->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // GetUserName
        $this->GetUserName->setDbValueDef($rsnew, $this->GetUserName->CurrentValue, null, false);

        // AdjustmentwithAdvance
        $this->AdjustmentwithAdvance->setDbValueDef($rsnew, $this->AdjustmentwithAdvance->CurrentValue, null, false);

        // AdjustmentBillNumber
        $this->AdjustmentBillNumber->setDbValueDef($rsnew, $this->AdjustmentBillNumber->CurrentValue, null, false);

        // CancelAdvance
        $this->CancelAdvance->setDbValueDef($rsnew, $this->CancelAdvance->CurrentValue, null, false);

        // CancelBy
        $this->CancelBy->setDbValueDef($rsnew, $this->CancelBy->CurrentValue, null, false);

        // CancelDate
        $this->CancelDate->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDate->CurrentValue, 0), null, false);

        // CancelDateTime
        $this->CancelDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CancelDateTime->CurrentValue, 0), null, false);

        // CanceledBy
        $this->CanceledBy->setDbValueDef($rsnew, $this->CanceledBy->CurrentValue, null, false);

        // CancelStatus
        $this->CancelStatus->setDbValueDef($rsnew, $this->CancelStatus->CurrentValue, null, false);

        // Cash
        $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, false);

        // Card
        $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, false);

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
        $this->freezed->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->Name->AdvancedSearch->load();
        $this->Mobile->AdvancedSearch->load();
        $this->voucher_type->AdvancedSearch->load();
        $this->Details->AdvancedSearch->load();
        $this->ModeofPayment->AdvancedSearch->load();
        $this->Amount->AdvancedSearch->load();
        $this->AnyDues->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->VisiteType->AdvancedSearch->load();
        $this->VisitDate->AdvancedSearch->load();
        $this->AdvanceNo->AdvancedSearch->load();
        $this->Status->AdvancedSearch->load();
        $this->Date->AdvancedSearch->load();
        $this->AdvanceValidityDate->AdvancedSearch->load();
        $this->TotalRemainingAdvance->AdvancedSearch->load();
        $this->Remarks->AdvancedSearch->load();
        $this->SeectPaymentMode->AdvancedSearch->load();
        $this->PaidAmount->AdvancedSearch->load();
        $this->Currency->AdvancedSearch->load();
        $this->CardNumber->AdvancedSearch->load();
        $this->BankName->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->GetUserName->AdvancedSearch->load();
        $this->AdjustmentwithAdvance->AdvancedSearch->load();
        $this->AdjustmentBillNumber->AdvancedSearch->load();
        $this->CancelAdvance->AdvancedSearch->load();
        $this->CancelReasan->AdvancedSearch->load();
        $this->CancelBy->AdvancedSearch->load();
        $this->CancelDate->AdvancedSearch->load();
        $this->CancelDateTime->AdvancedSearch->load();
        $this->CanceledBy->AdvancedSearch->load();
        $this->CancelStatus->AdvancedSearch->load();
        $this->Cash->AdvancedSearch->load();
        $this->Card->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_advance_freezedlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_advance_freezedlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_advance_freezedlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_advance_freezed" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_advance_freezed\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_advance_freezedlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_advance_freezedlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_freezed":
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
