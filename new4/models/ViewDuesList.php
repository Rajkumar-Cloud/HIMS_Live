<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewDuesList extends ViewDues
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_dues';

    // Page object name
    public $PageObjName = "ViewDuesList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_dueslist";
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

        // Table object (view_dues)
        if (!isset($GLOBALS["view_dues"]) || get_class($GLOBALS["view_dues"]) == PROJECT_NAMESPACE . "view_dues") {
            $GLOBALS["view_dues"] = &$this;
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
        $this->AddUrl = "ViewDuesAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewDuesDelete";
        $this->MultiUpdateUrl = "ViewDuesUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_dues');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_dueslistsrch";

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
                $doc = new $class(Container("view_dues"));
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
        $this->PatientId->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->Visible = false;
        $this->Gender->Visible = false;
        $this->profilePic->Visible = false;
        $this->Mobile->setVisibility();
        $this->IP_OP->Visible = false;
        $this->Doctor->Visible = false;
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->RealizationAmount->Visible = false;
        $this->RealizationStatus->Visible = false;
        $this->RealizationRemarks->Visible = false;
        $this->RealizationBatchNo->Visible = false;
        $this->RealizationDate->Visible = false;
        $this->HospID->setVisibility();
        $this->RIDNO->Visible = false;
        $this->TidNo->Visible = false;
        $this->CId->Visible = false;
        $this->PartnerName->Visible = false;
        $this->PayerType->Visible = false;
        $this->Dob->Visible = false;
        $this->Currency->Visible = false;
        $this->DiscountRemarks->Visible = false;
        $this->Remarks->Visible = false;
        $this->PatId->Visible = false;
        $this->DrDepartment->Visible = false;
        $this->RefferedBy->Visible = false;
        $this->BillNumber->Visible = false;
        $this->CardNumber->Visible = false;
        $this->BankName->Visible = false;
        $this->DrID->Visible = false;
        $this->BillStatus->Visible = false;
        $this->ReportHeader->Visible = false;
        $this->_UserName->Visible = false;
        $this->AdjustmentAdvance->Visible = false;
        $this->billing_vouchercol->Visible = false;
        $this->BillType->Visible = false;
        $this->ProcedureName->Visible = false;
        $this->ProcedureAmount->Visible = false;
        $this->IncludePackage->Visible = false;
        $this->CancelBill->Visible = false;
        $this->CancelReason->Visible = false;
        $this->CancelModeOfPayment->Visible = false;
        $this->CancelAmount->Visible = false;
        $this->CancelBankName->Visible = false;
        $this->CancelTransactionNumber->Visible = false;
        $this->LabTest->Visible = false;
        $this->sid->Visible = false;
        $this->SidNo->Visible = false;
        $this->createdDatettime->Visible = false;
        $this->LabTestReleased->Visible = false;
        $this->GoogleReviewID->Visible = false;
        $this->CardType->Visible = false;
        $this->PharmacyBill->Visible = false;
        $this->DiscountAmount->Visible = false;
        $this->Cash->Visible = false;
        $this->Card->Visible = false;
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_dueslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
        $filterList = Concat($filterList, $this->IP_OP->AdvancedSearch->toJson(), ","); // Field IP_OP
        $filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
        $filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
        $filterList = Concat($filterList, $this->Details->AdvancedSearch->toJson(), ","); // Field Details
        $filterList = Concat($filterList, $this->ModeofPayment->AdvancedSearch->toJson(), ","); // Field ModeofPayment
        $filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
        $filterList = Concat($filterList, $this->AnyDues->AdvancedSearch->toJson(), ","); // Field AnyDues
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->RealizationAmount->AdvancedSearch->toJson(), ","); // Field RealizationAmount
        $filterList = Concat($filterList, $this->RealizationStatus->AdvancedSearch->toJson(), ","); // Field RealizationStatus
        $filterList = Concat($filterList, $this->RealizationRemarks->AdvancedSearch->toJson(), ","); // Field RealizationRemarks
        $filterList = Concat($filterList, $this->RealizationBatchNo->AdvancedSearch->toJson(), ","); // Field RealizationBatchNo
        $filterList = Concat($filterList, $this->RealizationDate->AdvancedSearch->toJson(), ","); // Field RealizationDate
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->CId->AdvancedSearch->toJson(), ","); // Field CId
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PayerType->AdvancedSearch->toJson(), ","); // Field PayerType
        $filterList = Concat($filterList, $this->Dob->AdvancedSearch->toJson(), ","); // Field Dob
        $filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
        $filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
        $filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
        $filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
        $filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
        $filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
        $filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
        $filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
        $filterList = Concat($filterList, $this->BillStatus->AdvancedSearch->toJson(), ","); // Field BillStatus
        $filterList = Concat($filterList, $this->ReportHeader->AdvancedSearch->toJson(), ","); // Field ReportHeader
        $filterList = Concat($filterList, $this->_UserName->AdvancedSearch->toJson(), ","); // Field UserName
        $filterList = Concat($filterList, $this->AdjustmentAdvance->AdvancedSearch->toJson(), ","); // Field AdjustmentAdvance
        $filterList = Concat($filterList, $this->billing_vouchercol->AdvancedSearch->toJson(), ","); // Field billing_vouchercol
        $filterList = Concat($filterList, $this->BillType->AdvancedSearch->toJson(), ","); // Field BillType
        $filterList = Concat($filterList, $this->ProcedureName->AdvancedSearch->toJson(), ","); // Field ProcedureName
        $filterList = Concat($filterList, $this->ProcedureAmount->AdvancedSearch->toJson(), ","); // Field ProcedureAmount
        $filterList = Concat($filterList, $this->IncludePackage->AdvancedSearch->toJson(), ","); // Field IncludePackage
        $filterList = Concat($filterList, $this->CancelBill->AdvancedSearch->toJson(), ","); // Field CancelBill
        $filterList = Concat($filterList, $this->CancelReason->AdvancedSearch->toJson(), ","); // Field CancelReason
        $filterList = Concat($filterList, $this->CancelModeOfPayment->AdvancedSearch->toJson(), ","); // Field CancelModeOfPayment
        $filterList = Concat($filterList, $this->CancelAmount->AdvancedSearch->toJson(), ","); // Field CancelAmount
        $filterList = Concat($filterList, $this->CancelBankName->AdvancedSearch->toJson(), ","); // Field CancelBankName
        $filterList = Concat($filterList, $this->CancelTransactionNumber->AdvancedSearch->toJson(), ","); // Field CancelTransactionNumber
        $filterList = Concat($filterList, $this->LabTest->AdvancedSearch->toJson(), ","); // Field LabTest
        $filterList = Concat($filterList, $this->sid->AdvancedSearch->toJson(), ","); // Field sid
        $filterList = Concat($filterList, $this->SidNo->AdvancedSearch->toJson(), ","); // Field SidNo
        $filterList = Concat($filterList, $this->createdDatettime->AdvancedSearch->toJson(), ","); // Field createdDatettime
        $filterList = Concat($filterList, $this->LabTestReleased->AdvancedSearch->toJson(), ","); // Field LabTestReleased
        $filterList = Concat($filterList, $this->GoogleReviewID->AdvancedSearch->toJson(), ","); // Field GoogleReviewID
        $filterList = Concat($filterList, $this->CardType->AdvancedSearch->toJson(), ","); // Field CardType
        $filterList = Concat($filterList, $this->PharmacyBill->AdvancedSearch->toJson(), ","); // Field PharmacyBill
        $filterList = Concat($filterList, $this->DiscountAmount->AdvancedSearch->toJson(), ","); // Field DiscountAmount
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_dueslistsrch", $filters);
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

        // Field PatientId
        $this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
        $this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
        $this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
        $this->PatientId->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

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

        // Field Mobile
        $this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
        $this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
        $this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
        $this->Mobile->AdvancedSearch->save();

        // Field IP_OP
        $this->IP_OP->AdvancedSearch->SearchValue = @$filter["x_IP_OP"];
        $this->IP_OP->AdvancedSearch->SearchOperator = @$filter["z_IP_OP"];
        $this->IP_OP->AdvancedSearch->SearchCondition = @$filter["v_IP_OP"];
        $this->IP_OP->AdvancedSearch->SearchValue2 = @$filter["y_IP_OP"];
        $this->IP_OP->AdvancedSearch->SearchOperator2 = @$filter["w_IP_OP"];
        $this->IP_OP->AdvancedSearch->save();

        // Field Doctor
        $this->Doctor->AdvancedSearch->SearchValue = @$filter["x_Doctor"];
        $this->Doctor->AdvancedSearch->SearchOperator = @$filter["z_Doctor"];
        $this->Doctor->AdvancedSearch->SearchCondition = @$filter["v_Doctor"];
        $this->Doctor->AdvancedSearch->SearchValue2 = @$filter["y_Doctor"];
        $this->Doctor->AdvancedSearch->SearchOperator2 = @$filter["w_Doctor"];
        $this->Doctor->AdvancedSearch->save();

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

        // Field RealizationAmount
        $this->RealizationAmount->AdvancedSearch->SearchValue = @$filter["x_RealizationAmount"];
        $this->RealizationAmount->AdvancedSearch->SearchOperator = @$filter["z_RealizationAmount"];
        $this->RealizationAmount->AdvancedSearch->SearchCondition = @$filter["v_RealizationAmount"];
        $this->RealizationAmount->AdvancedSearch->SearchValue2 = @$filter["y_RealizationAmount"];
        $this->RealizationAmount->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationAmount"];
        $this->RealizationAmount->AdvancedSearch->save();

        // Field RealizationStatus
        $this->RealizationStatus->AdvancedSearch->SearchValue = @$filter["x_RealizationStatus"];
        $this->RealizationStatus->AdvancedSearch->SearchOperator = @$filter["z_RealizationStatus"];
        $this->RealizationStatus->AdvancedSearch->SearchCondition = @$filter["v_RealizationStatus"];
        $this->RealizationStatus->AdvancedSearch->SearchValue2 = @$filter["y_RealizationStatus"];
        $this->RealizationStatus->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationStatus"];
        $this->RealizationStatus->AdvancedSearch->save();

        // Field RealizationRemarks
        $this->RealizationRemarks->AdvancedSearch->SearchValue = @$filter["x_RealizationRemarks"];
        $this->RealizationRemarks->AdvancedSearch->SearchOperator = @$filter["z_RealizationRemarks"];
        $this->RealizationRemarks->AdvancedSearch->SearchCondition = @$filter["v_RealizationRemarks"];
        $this->RealizationRemarks->AdvancedSearch->SearchValue2 = @$filter["y_RealizationRemarks"];
        $this->RealizationRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationRemarks"];
        $this->RealizationRemarks->AdvancedSearch->save();

        // Field RealizationBatchNo
        $this->RealizationBatchNo->AdvancedSearch->SearchValue = @$filter["x_RealizationBatchNo"];
        $this->RealizationBatchNo->AdvancedSearch->SearchOperator = @$filter["z_RealizationBatchNo"];
        $this->RealizationBatchNo->AdvancedSearch->SearchCondition = @$filter["v_RealizationBatchNo"];
        $this->RealizationBatchNo->AdvancedSearch->SearchValue2 = @$filter["y_RealizationBatchNo"];
        $this->RealizationBatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationBatchNo"];
        $this->RealizationBatchNo->AdvancedSearch->save();

        // Field RealizationDate
        $this->RealizationDate->AdvancedSearch->SearchValue = @$filter["x_RealizationDate"];
        $this->RealizationDate->AdvancedSearch->SearchOperator = @$filter["z_RealizationDate"];
        $this->RealizationDate->AdvancedSearch->SearchCondition = @$filter["v_RealizationDate"];
        $this->RealizationDate->AdvancedSearch->SearchValue2 = @$filter["y_RealizationDate"];
        $this->RealizationDate->AdvancedSearch->SearchOperator2 = @$filter["w_RealizationDate"];
        $this->RealizationDate->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field CId
        $this->CId->AdvancedSearch->SearchValue = @$filter["x_CId"];
        $this->CId->AdvancedSearch->SearchOperator = @$filter["z_CId"];
        $this->CId->AdvancedSearch->SearchCondition = @$filter["v_CId"];
        $this->CId->AdvancedSearch->SearchValue2 = @$filter["y_CId"];
        $this->CId->AdvancedSearch->SearchOperator2 = @$filter["w_CId"];
        $this->CId->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field PayerType
        $this->PayerType->AdvancedSearch->SearchValue = @$filter["x_PayerType"];
        $this->PayerType->AdvancedSearch->SearchOperator = @$filter["z_PayerType"];
        $this->PayerType->AdvancedSearch->SearchCondition = @$filter["v_PayerType"];
        $this->PayerType->AdvancedSearch->SearchValue2 = @$filter["y_PayerType"];
        $this->PayerType->AdvancedSearch->SearchOperator2 = @$filter["w_PayerType"];
        $this->PayerType->AdvancedSearch->save();

        // Field Dob
        $this->Dob->AdvancedSearch->SearchValue = @$filter["x_Dob"];
        $this->Dob->AdvancedSearch->SearchOperator = @$filter["z_Dob"];
        $this->Dob->AdvancedSearch->SearchCondition = @$filter["v_Dob"];
        $this->Dob->AdvancedSearch->SearchValue2 = @$filter["y_Dob"];
        $this->Dob->AdvancedSearch->SearchOperator2 = @$filter["w_Dob"];
        $this->Dob->AdvancedSearch->save();

        // Field Currency
        $this->Currency->AdvancedSearch->SearchValue = @$filter["x_Currency"];
        $this->Currency->AdvancedSearch->SearchOperator = @$filter["z_Currency"];
        $this->Currency->AdvancedSearch->SearchCondition = @$filter["v_Currency"];
        $this->Currency->AdvancedSearch->SearchValue2 = @$filter["y_Currency"];
        $this->Currency->AdvancedSearch->SearchOperator2 = @$filter["w_Currency"];
        $this->Currency->AdvancedSearch->save();

        // Field DiscountRemarks
        $this->DiscountRemarks->AdvancedSearch->SearchValue = @$filter["x_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchOperator = @$filter["z_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchCondition = @$filter["v_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountRemarks"];
        $this->DiscountRemarks->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field PatId
        $this->PatId->AdvancedSearch->SearchValue = @$filter["x_PatId"];
        $this->PatId->AdvancedSearch->SearchOperator = @$filter["z_PatId"];
        $this->PatId->AdvancedSearch->SearchCondition = @$filter["v_PatId"];
        $this->PatId->AdvancedSearch->SearchValue2 = @$filter["y_PatId"];
        $this->PatId->AdvancedSearch->SearchOperator2 = @$filter["w_PatId"];
        $this->PatId->AdvancedSearch->save();

        // Field DrDepartment
        $this->DrDepartment->AdvancedSearch->SearchValue = @$filter["x_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchOperator = @$filter["z_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchCondition = @$filter["v_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchValue2 = @$filter["y_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->SearchOperator2 = @$filter["w_DrDepartment"];
        $this->DrDepartment->AdvancedSearch->save();

        // Field RefferedBy
        $this->RefferedBy->AdvancedSearch->SearchValue = @$filter["x_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchOperator = @$filter["z_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchCondition = @$filter["v_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchValue2 = @$filter["y_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_RefferedBy"];
        $this->RefferedBy->AdvancedSearch->save();

        // Field BillNumber
        $this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
        $this->BillNumber->AdvancedSearch->save();

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

        // Field DrID
        $this->DrID->AdvancedSearch->SearchValue = @$filter["x_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator = @$filter["z_DrID"];
        $this->DrID->AdvancedSearch->SearchCondition = @$filter["v_DrID"];
        $this->DrID->AdvancedSearch->SearchValue2 = @$filter["y_DrID"];
        $this->DrID->AdvancedSearch->SearchOperator2 = @$filter["w_DrID"];
        $this->DrID->AdvancedSearch->save();

        // Field BillStatus
        $this->BillStatus->AdvancedSearch->SearchValue = @$filter["x_BillStatus"];
        $this->BillStatus->AdvancedSearch->SearchOperator = @$filter["z_BillStatus"];
        $this->BillStatus->AdvancedSearch->SearchCondition = @$filter["v_BillStatus"];
        $this->BillStatus->AdvancedSearch->SearchValue2 = @$filter["y_BillStatus"];
        $this->BillStatus->AdvancedSearch->SearchOperator2 = @$filter["w_BillStatus"];
        $this->BillStatus->AdvancedSearch->save();

        // Field ReportHeader
        $this->ReportHeader->AdvancedSearch->SearchValue = @$filter["x_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchOperator = @$filter["z_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchCondition = @$filter["v_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchValue2 = @$filter["y_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->SearchOperator2 = @$filter["w_ReportHeader"];
        $this->ReportHeader->AdvancedSearch->save();

        // Field UserName
        $this->_UserName->AdvancedSearch->SearchValue = @$filter["x__UserName"];
        $this->_UserName->AdvancedSearch->SearchOperator = @$filter["z__UserName"];
        $this->_UserName->AdvancedSearch->SearchCondition = @$filter["v__UserName"];
        $this->_UserName->AdvancedSearch->SearchValue2 = @$filter["y__UserName"];
        $this->_UserName->AdvancedSearch->SearchOperator2 = @$filter["w__UserName"];
        $this->_UserName->AdvancedSearch->save();

        // Field AdjustmentAdvance
        $this->AdjustmentAdvance->AdvancedSearch->SearchValue = @$filter["x_AdjustmentAdvance"];
        $this->AdjustmentAdvance->AdvancedSearch->SearchOperator = @$filter["z_AdjustmentAdvance"];
        $this->AdjustmentAdvance->AdvancedSearch->SearchCondition = @$filter["v_AdjustmentAdvance"];
        $this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = @$filter["y_AdjustmentAdvance"];
        $this->AdjustmentAdvance->AdvancedSearch->SearchOperator2 = @$filter["w_AdjustmentAdvance"];
        $this->AdjustmentAdvance->AdvancedSearch->save();

        // Field billing_vouchercol
        $this->billing_vouchercol->AdvancedSearch->SearchValue = @$filter["x_billing_vouchercol"];
        $this->billing_vouchercol->AdvancedSearch->SearchOperator = @$filter["z_billing_vouchercol"];
        $this->billing_vouchercol->AdvancedSearch->SearchCondition = @$filter["v_billing_vouchercol"];
        $this->billing_vouchercol->AdvancedSearch->SearchValue2 = @$filter["y_billing_vouchercol"];
        $this->billing_vouchercol->AdvancedSearch->SearchOperator2 = @$filter["w_billing_vouchercol"];
        $this->billing_vouchercol->AdvancedSearch->save();

        // Field BillType
        $this->BillType->AdvancedSearch->SearchValue = @$filter["x_BillType"];
        $this->BillType->AdvancedSearch->SearchOperator = @$filter["z_BillType"];
        $this->BillType->AdvancedSearch->SearchCondition = @$filter["v_BillType"];
        $this->BillType->AdvancedSearch->SearchValue2 = @$filter["y_BillType"];
        $this->BillType->AdvancedSearch->SearchOperator2 = @$filter["w_BillType"];
        $this->BillType->AdvancedSearch->save();

        // Field ProcedureName
        $this->ProcedureName->AdvancedSearch->SearchValue = @$filter["x_ProcedureName"];
        $this->ProcedureName->AdvancedSearch->SearchOperator = @$filter["z_ProcedureName"];
        $this->ProcedureName->AdvancedSearch->SearchCondition = @$filter["v_ProcedureName"];
        $this->ProcedureName->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureName"];
        $this->ProcedureName->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureName"];
        $this->ProcedureName->AdvancedSearch->save();

        // Field ProcedureAmount
        $this->ProcedureAmount->AdvancedSearch->SearchValue = @$filter["x_ProcedureAmount"];
        $this->ProcedureAmount->AdvancedSearch->SearchOperator = @$filter["z_ProcedureAmount"];
        $this->ProcedureAmount->AdvancedSearch->SearchCondition = @$filter["v_ProcedureAmount"];
        $this->ProcedureAmount->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureAmount"];
        $this->ProcedureAmount->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureAmount"];
        $this->ProcedureAmount->AdvancedSearch->save();

        // Field IncludePackage
        $this->IncludePackage->AdvancedSearch->SearchValue = @$filter["x_IncludePackage"];
        $this->IncludePackage->AdvancedSearch->SearchOperator = @$filter["z_IncludePackage"];
        $this->IncludePackage->AdvancedSearch->SearchCondition = @$filter["v_IncludePackage"];
        $this->IncludePackage->AdvancedSearch->SearchValue2 = @$filter["y_IncludePackage"];
        $this->IncludePackage->AdvancedSearch->SearchOperator2 = @$filter["w_IncludePackage"];
        $this->IncludePackage->AdvancedSearch->save();

        // Field CancelBill
        $this->CancelBill->AdvancedSearch->SearchValue = @$filter["x_CancelBill"];
        $this->CancelBill->AdvancedSearch->SearchOperator = @$filter["z_CancelBill"];
        $this->CancelBill->AdvancedSearch->SearchCondition = @$filter["v_CancelBill"];
        $this->CancelBill->AdvancedSearch->SearchValue2 = @$filter["y_CancelBill"];
        $this->CancelBill->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBill"];
        $this->CancelBill->AdvancedSearch->save();

        // Field CancelReason
        $this->CancelReason->AdvancedSearch->SearchValue = @$filter["x_CancelReason"];
        $this->CancelReason->AdvancedSearch->SearchOperator = @$filter["z_CancelReason"];
        $this->CancelReason->AdvancedSearch->SearchCondition = @$filter["v_CancelReason"];
        $this->CancelReason->AdvancedSearch->SearchValue2 = @$filter["y_CancelReason"];
        $this->CancelReason->AdvancedSearch->SearchOperator2 = @$filter["w_CancelReason"];
        $this->CancelReason->AdvancedSearch->save();

        // Field CancelModeOfPayment
        $this->CancelModeOfPayment->AdvancedSearch->SearchValue = @$filter["x_CancelModeOfPayment"];
        $this->CancelModeOfPayment->AdvancedSearch->SearchOperator = @$filter["z_CancelModeOfPayment"];
        $this->CancelModeOfPayment->AdvancedSearch->SearchCondition = @$filter["v_CancelModeOfPayment"];
        $this->CancelModeOfPayment->AdvancedSearch->SearchValue2 = @$filter["y_CancelModeOfPayment"];
        $this->CancelModeOfPayment->AdvancedSearch->SearchOperator2 = @$filter["w_CancelModeOfPayment"];
        $this->CancelModeOfPayment->AdvancedSearch->save();

        // Field CancelAmount
        $this->CancelAmount->AdvancedSearch->SearchValue = @$filter["x_CancelAmount"];
        $this->CancelAmount->AdvancedSearch->SearchOperator = @$filter["z_CancelAmount"];
        $this->CancelAmount->AdvancedSearch->SearchCondition = @$filter["v_CancelAmount"];
        $this->CancelAmount->AdvancedSearch->SearchValue2 = @$filter["y_CancelAmount"];
        $this->CancelAmount->AdvancedSearch->SearchOperator2 = @$filter["w_CancelAmount"];
        $this->CancelAmount->AdvancedSearch->save();

        // Field CancelBankName
        $this->CancelBankName->AdvancedSearch->SearchValue = @$filter["x_CancelBankName"];
        $this->CancelBankName->AdvancedSearch->SearchOperator = @$filter["z_CancelBankName"];
        $this->CancelBankName->AdvancedSearch->SearchCondition = @$filter["v_CancelBankName"];
        $this->CancelBankName->AdvancedSearch->SearchValue2 = @$filter["y_CancelBankName"];
        $this->CancelBankName->AdvancedSearch->SearchOperator2 = @$filter["w_CancelBankName"];
        $this->CancelBankName->AdvancedSearch->save();

        // Field CancelTransactionNumber
        $this->CancelTransactionNumber->AdvancedSearch->SearchValue = @$filter["x_CancelTransactionNumber"];
        $this->CancelTransactionNumber->AdvancedSearch->SearchOperator = @$filter["z_CancelTransactionNumber"];
        $this->CancelTransactionNumber->AdvancedSearch->SearchCondition = @$filter["v_CancelTransactionNumber"];
        $this->CancelTransactionNumber->AdvancedSearch->SearchValue2 = @$filter["y_CancelTransactionNumber"];
        $this->CancelTransactionNumber->AdvancedSearch->SearchOperator2 = @$filter["w_CancelTransactionNumber"];
        $this->CancelTransactionNumber->AdvancedSearch->save();

        // Field LabTest
        $this->LabTest->AdvancedSearch->SearchValue = @$filter["x_LabTest"];
        $this->LabTest->AdvancedSearch->SearchOperator = @$filter["z_LabTest"];
        $this->LabTest->AdvancedSearch->SearchCondition = @$filter["v_LabTest"];
        $this->LabTest->AdvancedSearch->SearchValue2 = @$filter["y_LabTest"];
        $this->LabTest->AdvancedSearch->SearchOperator2 = @$filter["w_LabTest"];
        $this->LabTest->AdvancedSearch->save();

        // Field sid
        $this->sid->AdvancedSearch->SearchValue = @$filter["x_sid"];
        $this->sid->AdvancedSearch->SearchOperator = @$filter["z_sid"];
        $this->sid->AdvancedSearch->SearchCondition = @$filter["v_sid"];
        $this->sid->AdvancedSearch->SearchValue2 = @$filter["y_sid"];
        $this->sid->AdvancedSearch->SearchOperator2 = @$filter["w_sid"];
        $this->sid->AdvancedSearch->save();

        // Field SidNo
        $this->SidNo->AdvancedSearch->SearchValue = @$filter["x_SidNo"];
        $this->SidNo->AdvancedSearch->SearchOperator = @$filter["z_SidNo"];
        $this->SidNo->AdvancedSearch->SearchCondition = @$filter["v_SidNo"];
        $this->SidNo->AdvancedSearch->SearchValue2 = @$filter["y_SidNo"];
        $this->SidNo->AdvancedSearch->SearchOperator2 = @$filter["w_SidNo"];
        $this->SidNo->AdvancedSearch->save();

        // Field createdDatettime
        $this->createdDatettime->AdvancedSearch->SearchValue = @$filter["x_createdDatettime"];
        $this->createdDatettime->AdvancedSearch->SearchOperator = @$filter["z_createdDatettime"];
        $this->createdDatettime->AdvancedSearch->SearchCondition = @$filter["v_createdDatettime"];
        $this->createdDatettime->AdvancedSearch->SearchValue2 = @$filter["y_createdDatettime"];
        $this->createdDatettime->AdvancedSearch->SearchOperator2 = @$filter["w_createdDatettime"];
        $this->createdDatettime->AdvancedSearch->save();

        // Field LabTestReleased
        $this->LabTestReleased->AdvancedSearch->SearchValue = @$filter["x_LabTestReleased"];
        $this->LabTestReleased->AdvancedSearch->SearchOperator = @$filter["z_LabTestReleased"];
        $this->LabTestReleased->AdvancedSearch->SearchCondition = @$filter["v_LabTestReleased"];
        $this->LabTestReleased->AdvancedSearch->SearchValue2 = @$filter["y_LabTestReleased"];
        $this->LabTestReleased->AdvancedSearch->SearchOperator2 = @$filter["w_LabTestReleased"];
        $this->LabTestReleased->AdvancedSearch->save();

        // Field GoogleReviewID
        $this->GoogleReviewID->AdvancedSearch->SearchValue = @$filter["x_GoogleReviewID"];
        $this->GoogleReviewID->AdvancedSearch->SearchOperator = @$filter["z_GoogleReviewID"];
        $this->GoogleReviewID->AdvancedSearch->SearchCondition = @$filter["v_GoogleReviewID"];
        $this->GoogleReviewID->AdvancedSearch->SearchValue2 = @$filter["y_GoogleReviewID"];
        $this->GoogleReviewID->AdvancedSearch->SearchOperator2 = @$filter["w_GoogleReviewID"];
        $this->GoogleReviewID->AdvancedSearch->save();

        // Field CardType
        $this->CardType->AdvancedSearch->SearchValue = @$filter["x_CardType"];
        $this->CardType->AdvancedSearch->SearchOperator = @$filter["z_CardType"];
        $this->CardType->AdvancedSearch->SearchCondition = @$filter["v_CardType"];
        $this->CardType->AdvancedSearch->SearchValue2 = @$filter["y_CardType"];
        $this->CardType->AdvancedSearch->SearchOperator2 = @$filter["w_CardType"];
        $this->CardType->AdvancedSearch->save();

        // Field PharmacyBill
        $this->PharmacyBill->AdvancedSearch->SearchValue = @$filter["x_PharmacyBill"];
        $this->PharmacyBill->AdvancedSearch->SearchOperator = @$filter["z_PharmacyBill"];
        $this->PharmacyBill->AdvancedSearch->SearchCondition = @$filter["v_PharmacyBill"];
        $this->PharmacyBill->AdvancedSearch->SearchValue2 = @$filter["y_PharmacyBill"];
        $this->PharmacyBill->AdvancedSearch->SearchOperator2 = @$filter["w_PharmacyBill"];
        $this->PharmacyBill->AdvancedSearch->save();

        // Field DiscountAmount
        $this->DiscountAmount->AdvancedSearch->SearchValue = @$filter["x_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchOperator = @$filter["z_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchCondition = @$filter["v_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchValue2 = @$filter["y_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->save();

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
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->PatientId, $default, false); // PatientId
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->Gender, $default, false); // Gender
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->Mobile, $default, false); // Mobile
        $this->buildSearchSql($where, $this->IP_OP, $default, false); // IP_OP
        $this->buildSearchSql($where, $this->Doctor, $default, false); // Doctor
        $this->buildSearchSql($where, $this->voucher_type, $default, false); // voucher_type
        $this->buildSearchSql($where, $this->Details, $default, false); // Details
        $this->buildSearchSql($where, $this->ModeofPayment, $default, false); // ModeofPayment
        $this->buildSearchSql($where, $this->Amount, $default, false); // Amount
        $this->buildSearchSql($where, $this->AnyDues, $default, false); // AnyDues
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->RealizationAmount, $default, false); // RealizationAmount
        $this->buildSearchSql($where, $this->RealizationStatus, $default, false); // RealizationStatus
        $this->buildSearchSql($where, $this->RealizationRemarks, $default, false); // RealizationRemarks
        $this->buildSearchSql($where, $this->RealizationBatchNo, $default, false); // RealizationBatchNo
        $this->buildSearchSql($where, $this->RealizationDate, $default, false); // RealizationDate
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->RIDNO, $default, false); // RIDNO
        $this->buildSearchSql($where, $this->TidNo, $default, false); // TidNo
        $this->buildSearchSql($where, $this->CId, $default, false); // CId
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->PayerType, $default, false); // PayerType
        $this->buildSearchSql($where, $this->Dob, $default, false); // Dob
        $this->buildSearchSql($where, $this->Currency, $default, false); // Currency
        $this->buildSearchSql($where, $this->DiscountRemarks, $default, false); // DiscountRemarks
        $this->buildSearchSql($where, $this->Remarks, $default, false); // Remarks
        $this->buildSearchSql($where, $this->PatId, $default, false); // PatId
        $this->buildSearchSql($where, $this->DrDepartment, $default, false); // DrDepartment
        $this->buildSearchSql($where, $this->RefferedBy, $default, false); // RefferedBy
        $this->buildSearchSql($where, $this->BillNumber, $default, false); // BillNumber
        $this->buildSearchSql($where, $this->CardNumber, $default, false); // CardNumber
        $this->buildSearchSql($where, $this->BankName, $default, false); // BankName
        $this->buildSearchSql($where, $this->DrID, $default, false); // DrID
        $this->buildSearchSql($where, $this->BillStatus, $default, false); // BillStatus
        $this->buildSearchSql($where, $this->ReportHeader, $default, false); // ReportHeader
        $this->buildSearchSql($where, $this->_UserName, $default, false); // UserName
        $this->buildSearchSql($where, $this->AdjustmentAdvance, $default, false); // AdjustmentAdvance
        $this->buildSearchSql($where, $this->billing_vouchercol, $default, false); // billing_vouchercol
        $this->buildSearchSql($where, $this->BillType, $default, false); // BillType
        $this->buildSearchSql($where, $this->ProcedureName, $default, false); // ProcedureName
        $this->buildSearchSql($where, $this->ProcedureAmount, $default, false); // ProcedureAmount
        $this->buildSearchSql($where, $this->IncludePackage, $default, false); // IncludePackage
        $this->buildSearchSql($where, $this->CancelBill, $default, false); // CancelBill
        $this->buildSearchSql($where, $this->CancelReason, $default, false); // CancelReason
        $this->buildSearchSql($where, $this->CancelModeOfPayment, $default, false); // CancelModeOfPayment
        $this->buildSearchSql($where, $this->CancelAmount, $default, false); // CancelAmount
        $this->buildSearchSql($where, $this->CancelBankName, $default, false); // CancelBankName
        $this->buildSearchSql($where, $this->CancelTransactionNumber, $default, false); // CancelTransactionNumber
        $this->buildSearchSql($where, $this->LabTest, $default, false); // LabTest
        $this->buildSearchSql($where, $this->sid, $default, false); // sid
        $this->buildSearchSql($where, $this->SidNo, $default, false); // SidNo
        $this->buildSearchSql($where, $this->createdDatettime, $default, false); // createdDatettime
        $this->buildSearchSql($where, $this->LabTestReleased, $default, false); // LabTestReleased
        $this->buildSearchSql($where, $this->GoogleReviewID, $default, false); // GoogleReviewID
        $this->buildSearchSql($where, $this->CardType, $default, false); // CardType
        $this->buildSearchSql($where, $this->PharmacyBill, $default, false); // PharmacyBill
        $this->buildSearchSql($where, $this->DiscountAmount, $default, false); // DiscountAmount
        $this->buildSearchSql($where, $this->Cash, $default, false); // Cash
        $this->buildSearchSql($where, $this->Card, $default, false); // Card

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->PatientId->AdvancedSearch->save(); // PatientId
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->Age->AdvancedSearch->save(); // Age
            $this->Gender->AdvancedSearch->save(); // Gender
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->Mobile->AdvancedSearch->save(); // Mobile
            $this->IP_OP->AdvancedSearch->save(); // IP_OP
            $this->Doctor->AdvancedSearch->save(); // Doctor
            $this->voucher_type->AdvancedSearch->save(); // voucher_type
            $this->Details->AdvancedSearch->save(); // Details
            $this->ModeofPayment->AdvancedSearch->save(); // ModeofPayment
            $this->Amount->AdvancedSearch->save(); // Amount
            $this->AnyDues->AdvancedSearch->save(); // AnyDues
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->RealizationAmount->AdvancedSearch->save(); // RealizationAmount
            $this->RealizationStatus->AdvancedSearch->save(); // RealizationStatus
            $this->RealizationRemarks->AdvancedSearch->save(); // RealizationRemarks
            $this->RealizationBatchNo->AdvancedSearch->save(); // RealizationBatchNo
            $this->RealizationDate->AdvancedSearch->save(); // RealizationDate
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->RIDNO->AdvancedSearch->save(); // RIDNO
            $this->TidNo->AdvancedSearch->save(); // TidNo
            $this->CId->AdvancedSearch->save(); // CId
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->PayerType->AdvancedSearch->save(); // PayerType
            $this->Dob->AdvancedSearch->save(); // Dob
            $this->Currency->AdvancedSearch->save(); // Currency
            $this->DiscountRemarks->AdvancedSearch->save(); // DiscountRemarks
            $this->Remarks->AdvancedSearch->save(); // Remarks
            $this->PatId->AdvancedSearch->save(); // PatId
            $this->DrDepartment->AdvancedSearch->save(); // DrDepartment
            $this->RefferedBy->AdvancedSearch->save(); // RefferedBy
            $this->BillNumber->AdvancedSearch->save(); // BillNumber
            $this->CardNumber->AdvancedSearch->save(); // CardNumber
            $this->BankName->AdvancedSearch->save(); // BankName
            $this->DrID->AdvancedSearch->save(); // DrID
            $this->BillStatus->AdvancedSearch->save(); // BillStatus
            $this->ReportHeader->AdvancedSearch->save(); // ReportHeader
            $this->_UserName->AdvancedSearch->save(); // UserName
            $this->AdjustmentAdvance->AdvancedSearch->save(); // AdjustmentAdvance
            $this->billing_vouchercol->AdvancedSearch->save(); // billing_vouchercol
            $this->BillType->AdvancedSearch->save(); // BillType
            $this->ProcedureName->AdvancedSearch->save(); // ProcedureName
            $this->ProcedureAmount->AdvancedSearch->save(); // ProcedureAmount
            $this->IncludePackage->AdvancedSearch->save(); // IncludePackage
            $this->CancelBill->AdvancedSearch->save(); // CancelBill
            $this->CancelReason->AdvancedSearch->save(); // CancelReason
            $this->CancelModeOfPayment->AdvancedSearch->save(); // CancelModeOfPayment
            $this->CancelAmount->AdvancedSearch->save(); // CancelAmount
            $this->CancelBankName->AdvancedSearch->save(); // CancelBankName
            $this->CancelTransactionNumber->AdvancedSearch->save(); // CancelTransactionNumber
            $this->LabTest->AdvancedSearch->save(); // LabTest
            $this->sid->AdvancedSearch->save(); // sid
            $this->SidNo->AdvancedSearch->save(); // SidNo
            $this->createdDatettime->AdvancedSearch->save(); // createdDatettime
            $this->LabTestReleased->AdvancedSearch->save(); // LabTestReleased
            $this->GoogleReviewID->AdvancedSearch->save(); // GoogleReviewID
            $this->CardType->AdvancedSearch->save(); // CardType
            $this->PharmacyBill->AdvancedSearch->save(); // PharmacyBill
            $this->DiscountAmount->AdvancedSearch->save(); // DiscountAmount
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
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IP_OP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RealizationStatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RealizationRemarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RealizationBatchNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RealizationDate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PayerType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Dob, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReportHeader, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_UserName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AdjustmentAdvance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->billing_vouchercol, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcedureName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IncludePackage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelBill, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelReason, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelModeOfPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelAmount, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelBankName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CancelTransactionNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabTest, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SidNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabTestReleased, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GoogleReviewID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CardType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PharmacyBill, $arKeywords, $type);
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
        if ($this->PatientId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
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
        if ($this->Mobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP_OP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Doctor->AdvancedSearch->issetSession()) {
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
        if ($this->RealizationAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RealizationStatus->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RealizationRemarks->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RealizationBatchNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RealizationDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RIDNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TidNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PayerType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Dob->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Currency->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DiscountRemarks->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Remarks->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrDepartment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RefferedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CardNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BankName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DrID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillStatus->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReportHeader->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_UserName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AdjustmentAdvance->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->billing_vouchercol->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProcedureName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProcedureAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IncludePackage->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelBill->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelReason->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelModeOfPayment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelBankName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CancelTransactionNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LabTest->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->sid->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SidNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createdDatettime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LabTestReleased->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GoogleReviewID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CardType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PharmacyBill->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DiscountAmount->AdvancedSearch->issetSession()) {
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
                $this->Reception->AdvancedSearch->unsetSession();
                $this->PatientId->AdvancedSearch->unsetSession();
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->Gender->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->Mobile->AdvancedSearch->unsetSession();
                $this->IP_OP->AdvancedSearch->unsetSession();
                $this->Doctor->AdvancedSearch->unsetSession();
                $this->voucher_type->AdvancedSearch->unsetSession();
                $this->Details->AdvancedSearch->unsetSession();
                $this->ModeofPayment->AdvancedSearch->unsetSession();
                $this->Amount->AdvancedSearch->unsetSession();
                $this->AnyDues->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->RealizationAmount->AdvancedSearch->unsetSession();
                $this->RealizationStatus->AdvancedSearch->unsetSession();
                $this->RealizationRemarks->AdvancedSearch->unsetSession();
                $this->RealizationBatchNo->AdvancedSearch->unsetSession();
                $this->RealizationDate->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->RIDNO->AdvancedSearch->unsetSession();
                $this->TidNo->AdvancedSearch->unsetSession();
                $this->CId->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->PayerType->AdvancedSearch->unsetSession();
                $this->Dob->AdvancedSearch->unsetSession();
                $this->Currency->AdvancedSearch->unsetSession();
                $this->DiscountRemarks->AdvancedSearch->unsetSession();
                $this->Remarks->AdvancedSearch->unsetSession();
                $this->PatId->AdvancedSearch->unsetSession();
                $this->DrDepartment->AdvancedSearch->unsetSession();
                $this->RefferedBy->AdvancedSearch->unsetSession();
                $this->BillNumber->AdvancedSearch->unsetSession();
                $this->CardNumber->AdvancedSearch->unsetSession();
                $this->BankName->AdvancedSearch->unsetSession();
                $this->DrID->AdvancedSearch->unsetSession();
                $this->BillStatus->AdvancedSearch->unsetSession();
                $this->ReportHeader->AdvancedSearch->unsetSession();
                $this->_UserName->AdvancedSearch->unsetSession();
                $this->AdjustmentAdvance->AdvancedSearch->unsetSession();
                $this->billing_vouchercol->AdvancedSearch->unsetSession();
                $this->BillType->AdvancedSearch->unsetSession();
                $this->ProcedureName->AdvancedSearch->unsetSession();
                $this->ProcedureAmount->AdvancedSearch->unsetSession();
                $this->IncludePackage->AdvancedSearch->unsetSession();
                $this->CancelBill->AdvancedSearch->unsetSession();
                $this->CancelReason->AdvancedSearch->unsetSession();
                $this->CancelModeOfPayment->AdvancedSearch->unsetSession();
                $this->CancelAmount->AdvancedSearch->unsetSession();
                $this->CancelBankName->AdvancedSearch->unsetSession();
                $this->CancelTransactionNumber->AdvancedSearch->unsetSession();
                $this->LabTest->AdvancedSearch->unsetSession();
                $this->sid->AdvancedSearch->unsetSession();
                $this->SidNo->AdvancedSearch->unsetSession();
                $this->createdDatettime->AdvancedSearch->unsetSession();
                $this->LabTestReleased->AdvancedSearch->unsetSession();
                $this->GoogleReviewID->AdvancedSearch->unsetSession();
                $this->CardType->AdvancedSearch->unsetSession();
                $this->PharmacyBill->AdvancedSearch->unsetSession();
                $this->DiscountAmount->AdvancedSearch->unsetSession();
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
                $this->Reception->AdvancedSearch->load();
                $this->PatientId->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->Gender->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->Mobile->AdvancedSearch->load();
                $this->IP_OP->AdvancedSearch->load();
                $this->Doctor->AdvancedSearch->load();
                $this->voucher_type->AdvancedSearch->load();
                $this->Details->AdvancedSearch->load();
                $this->ModeofPayment->AdvancedSearch->load();
                $this->Amount->AdvancedSearch->load();
                $this->AnyDues->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->RealizationAmount->AdvancedSearch->load();
                $this->RealizationStatus->AdvancedSearch->load();
                $this->RealizationRemarks->AdvancedSearch->load();
                $this->RealizationBatchNo->AdvancedSearch->load();
                $this->RealizationDate->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->RIDNO->AdvancedSearch->load();
                $this->TidNo->AdvancedSearch->load();
                $this->CId->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->PayerType->AdvancedSearch->load();
                $this->Dob->AdvancedSearch->load();
                $this->Currency->AdvancedSearch->load();
                $this->DiscountRemarks->AdvancedSearch->load();
                $this->Remarks->AdvancedSearch->load();
                $this->PatId->AdvancedSearch->load();
                $this->DrDepartment->AdvancedSearch->load();
                $this->RefferedBy->AdvancedSearch->load();
                $this->BillNumber->AdvancedSearch->load();
                $this->CardNumber->AdvancedSearch->load();
                $this->BankName->AdvancedSearch->load();
                $this->DrID->AdvancedSearch->load();
                $this->BillStatus->AdvancedSearch->load();
                $this->ReportHeader->AdvancedSearch->load();
                $this->_UserName->AdvancedSearch->load();
                $this->AdjustmentAdvance->AdvancedSearch->load();
                $this->billing_vouchercol->AdvancedSearch->load();
                $this->BillType->AdvancedSearch->load();
                $this->ProcedureName->AdvancedSearch->load();
                $this->ProcedureAmount->AdvancedSearch->load();
                $this->IncludePackage->AdvancedSearch->load();
                $this->CancelBill->AdvancedSearch->load();
                $this->CancelReason->AdvancedSearch->load();
                $this->CancelModeOfPayment->AdvancedSearch->load();
                $this->CancelAmount->AdvancedSearch->load();
                $this->CancelBankName->AdvancedSearch->load();
                $this->CancelTransactionNumber->AdvancedSearch->load();
                $this->LabTest->AdvancedSearch->load();
                $this->sid->AdvancedSearch->load();
                $this->SidNo->AdvancedSearch->load();
                $this->createdDatettime->AdvancedSearch->load();
                $this->LabTestReleased->AdvancedSearch->load();
                $this->GoogleReviewID->AdvancedSearch->load();
                $this->CardType->AdvancedSearch->load();
                $this->PharmacyBill->AdvancedSearch->load();
                $this->DiscountAmount->AdvancedSearch->load();
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
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->voucher_type); // voucher_type
            $this->updateSort($this->Details); // Details
            $this->updateSort($this->ModeofPayment); // ModeofPayment
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->AnyDues); // AnyDues
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
                $this->Reception->setSort("");
                $this->PatientId->setSort("");
                $this->mrnno->setSort("");
                $this->PatientName->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->Mobile->setSort("");
                $this->IP_OP->setSort("");
                $this->Doctor->setSort("");
                $this->voucher_type->setSort("");
                $this->Details->setSort("");
                $this->ModeofPayment->setSort("");
                $this->Amount->setSort("");
                $this->AnyDues->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->RealizationAmount->setSort("");
                $this->RealizationStatus->setSort("");
                $this->RealizationRemarks->setSort("");
                $this->RealizationBatchNo->setSort("");
                $this->RealizationDate->setSort("");
                $this->HospID->setSort("");
                $this->RIDNO->setSort("");
                $this->TidNo->setSort("");
                $this->CId->setSort("");
                $this->PartnerName->setSort("");
                $this->PayerType->setSort("");
                $this->Dob->setSort("");
                $this->Currency->setSort("");
                $this->DiscountRemarks->setSort("");
                $this->Remarks->setSort("");
                $this->PatId->setSort("");
                $this->DrDepartment->setSort("");
                $this->RefferedBy->setSort("");
                $this->BillNumber->setSort("");
                $this->CardNumber->setSort("");
                $this->BankName->setSort("");
                $this->DrID->setSort("");
                $this->BillStatus->setSort("");
                $this->ReportHeader->setSort("");
                $this->_UserName->setSort("");
                $this->AdjustmentAdvance->setSort("");
                $this->billing_vouchercol->setSort("");
                $this->BillType->setSort("");
                $this->ProcedureName->setSort("");
                $this->ProcedureAmount->setSort("");
                $this->IncludePackage->setSort("");
                $this->CancelBill->setSort("");
                $this->CancelReason->setSort("");
                $this->CancelModeOfPayment->setSort("");
                $this->CancelAmount->setSort("");
                $this->CancelBankName->setSort("");
                $this->CancelTransactionNumber->setSort("");
                $this->LabTest->setSort("");
                $this->sid->setSort("");
                $this->SidNo->setSort("");
                $this->createdDatettime->setSort("");
                $this->LabTestReleased->setSort("");
                $this->GoogleReviewID->setSort("");
                $this->CardType->setSort("");
                $this->PharmacyBill->setSort("");
                $this->DiscountAmount->setSort("");
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

        // Add group option item
        $item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = true;
        $item->Visible = false;

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
        if ($this->CurrentMode == "view") { // View mode
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_dueslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_dueslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_dueslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // Reception
        if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // mrnno
        if (!$this->isAddOrEdit() && $this->mrnno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mrnno->AdvancedSearch->SearchValue != "" || $this->mrnno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Mobile
        if (!$this->isAddOrEdit() && $this->Mobile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Mobile->AdvancedSearch->SearchValue != "" || $this->Mobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IP_OP
        if (!$this->isAddOrEdit() && $this->IP_OP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IP_OP->AdvancedSearch->SearchValue != "" || $this->IP_OP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // RealizationAmount
        if (!$this->isAddOrEdit() && $this->RealizationAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RealizationAmount->AdvancedSearch->SearchValue != "" || $this->RealizationAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RealizationStatus
        if (!$this->isAddOrEdit() && $this->RealizationStatus->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RealizationStatus->AdvancedSearch->SearchValue != "" || $this->RealizationStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RealizationRemarks
        if (!$this->isAddOrEdit() && $this->RealizationRemarks->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RealizationRemarks->AdvancedSearch->SearchValue != "" || $this->RealizationRemarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RealizationBatchNo
        if (!$this->isAddOrEdit() && $this->RealizationBatchNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RealizationBatchNo->AdvancedSearch->SearchValue != "" || $this->RealizationBatchNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RealizationDate
        if (!$this->isAddOrEdit() && $this->RealizationDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RealizationDate->AdvancedSearch->SearchValue != "" || $this->RealizationDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // RIDNO
        if (!$this->isAddOrEdit() && $this->RIDNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RIDNO->AdvancedSearch->SearchValue != "" || $this->RIDNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TidNo
        if (!$this->isAddOrEdit() && $this->TidNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TidNo->AdvancedSearch->SearchValue != "" || $this->TidNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CId
        if (!$this->isAddOrEdit() && $this->CId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CId->AdvancedSearch->SearchValue != "" || $this->CId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PayerType
        if (!$this->isAddOrEdit() && $this->PayerType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PayerType->AdvancedSearch->SearchValue != "" || $this->PayerType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Dob
        if (!$this->isAddOrEdit() && $this->Dob->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Dob->AdvancedSearch->SearchValue != "" || $this->Dob->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // DiscountRemarks
        if (!$this->isAddOrEdit() && $this->DiscountRemarks->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DiscountRemarks->AdvancedSearch->SearchValue != "" || $this->DiscountRemarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatId
        if (!$this->isAddOrEdit() && $this->PatId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatId->AdvancedSearch->SearchValue != "" || $this->PatId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // RefferedBy
        if (!$this->isAddOrEdit() && $this->RefferedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RefferedBy->AdvancedSearch->SearchValue != "" || $this->RefferedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillNumber
        if (!$this->isAddOrEdit() && $this->BillNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillNumber->AdvancedSearch->SearchValue != "" || $this->BillNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // DrID
        if (!$this->isAddOrEdit() && $this->DrID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DrID->AdvancedSearch->SearchValue != "" || $this->DrID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillStatus
        if (!$this->isAddOrEdit() && $this->BillStatus->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillStatus->AdvancedSearch->SearchValue != "" || $this->BillStatus->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReportHeader
        if (!$this->isAddOrEdit() && $this->ReportHeader->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReportHeader->AdvancedSearch->SearchValue != "" || $this->ReportHeader->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UserName
        if (!$this->isAddOrEdit() && $this->_UserName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->_UserName->AdvancedSearch->SearchValue != "" || $this->_UserName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AdjustmentAdvance
        if (!$this->isAddOrEdit() && $this->AdjustmentAdvance->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AdjustmentAdvance->AdvancedSearch->SearchValue != "" || $this->AdjustmentAdvance->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // billing_vouchercol
        if (!$this->isAddOrEdit() && $this->billing_vouchercol->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->billing_vouchercol->AdvancedSearch->SearchValue != "" || $this->billing_vouchercol->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillType
        if (!$this->isAddOrEdit() && $this->BillType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillType->AdvancedSearch->SearchValue != "" || $this->BillType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProcedureName
        if (!$this->isAddOrEdit() && $this->ProcedureName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProcedureName->AdvancedSearch->SearchValue != "" || $this->ProcedureName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProcedureAmount
        if (!$this->isAddOrEdit() && $this->ProcedureAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProcedureAmount->AdvancedSearch->SearchValue != "" || $this->ProcedureAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IncludePackage
        if (!$this->isAddOrEdit() && $this->IncludePackage->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IncludePackage->AdvancedSearch->SearchValue != "" || $this->IncludePackage->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelBill
        if (!$this->isAddOrEdit() && $this->CancelBill->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelBill->AdvancedSearch->SearchValue != "" || $this->CancelBill->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelReason
        if (!$this->isAddOrEdit() && $this->CancelReason->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelReason->AdvancedSearch->SearchValue != "" || $this->CancelReason->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelModeOfPayment
        if (!$this->isAddOrEdit() && $this->CancelModeOfPayment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelModeOfPayment->AdvancedSearch->SearchValue != "" || $this->CancelModeOfPayment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelAmount
        if (!$this->isAddOrEdit() && $this->CancelAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelAmount->AdvancedSearch->SearchValue != "" || $this->CancelAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelBankName
        if (!$this->isAddOrEdit() && $this->CancelBankName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelBankName->AdvancedSearch->SearchValue != "" || $this->CancelBankName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CancelTransactionNumber
        if (!$this->isAddOrEdit() && $this->CancelTransactionNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CancelTransactionNumber->AdvancedSearch->SearchValue != "" || $this->CancelTransactionNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LabTest
        if (!$this->isAddOrEdit() && $this->LabTest->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LabTest->AdvancedSearch->SearchValue != "" || $this->LabTest->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // sid
        if (!$this->isAddOrEdit() && $this->sid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->sid->AdvancedSearch->SearchValue != "" || $this->sid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SidNo
        if (!$this->isAddOrEdit() && $this->SidNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SidNo->AdvancedSearch->SearchValue != "" || $this->SidNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createdDatettime
        if (!$this->isAddOrEdit() && $this->createdDatettime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createdDatettime->AdvancedSearch->SearchValue != "" || $this->createdDatettime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LabTestReleased
        if (!$this->isAddOrEdit() && $this->LabTestReleased->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LabTestReleased->AdvancedSearch->SearchValue != "" || $this->LabTestReleased->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GoogleReviewID
        if (!$this->isAddOrEdit() && $this->GoogleReviewID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GoogleReviewID->AdvancedSearch->SearchValue != "" || $this->GoogleReviewID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CardType
        if (!$this->isAddOrEdit() && $this->CardType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CardType->AdvancedSearch->SearchValue != "" || $this->CardType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PharmacyBill
        if (!$this->isAddOrEdit() && $this->PharmacyBill->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PharmacyBill->AdvancedSearch->SearchValue != "" || $this->PharmacyBill->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DiscountAmount
        if (!$this->isAddOrEdit() && $this->DiscountAmount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DiscountAmount->AdvancedSearch->SearchValue != "" || $this->DiscountAmount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->PatientId->setDbValue($row['PatientId']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Details->setDbValue($row['Details']);
        $this->ModeofPayment->setDbValue($row['ModeofPayment']);
        $this->Amount->setDbValue($row['Amount']);
        $this->AnyDues->setDbValue($row['AnyDues']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->CId->setDbValue($row['CId']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PayerType->setDbValue($row['PayerType']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->AdjustmentAdvance->setDbValue($row['AdjustmentAdvance']);
        $this->billing_vouchercol->setDbValue($row['billing_vouchercol']);
        $this->BillType->setDbValue($row['BillType']);
        $this->ProcedureName->setDbValue($row['ProcedureName']);
        $this->ProcedureAmount->setDbValue($row['ProcedureAmount']);
        $this->IncludePackage->setDbValue($row['IncludePackage']);
        $this->CancelBill->setDbValue($row['CancelBill']);
        $this->CancelReason->setDbValue($row['CancelReason']);
        $this->CancelModeOfPayment->setDbValue($row['CancelModeOfPayment']);
        $this->CancelAmount->setDbValue($row['CancelAmount']);
        $this->CancelBankName->setDbValue($row['CancelBankName']);
        $this->CancelTransactionNumber->setDbValue($row['CancelTransactionNumber']);
        $this->LabTest->setDbValue($row['LabTest']);
        $this->sid->setDbValue($row['sid']);
        $this->SidNo->setDbValue($row['SidNo']);
        $this->createdDatettime->setDbValue($row['createdDatettime']);
        $this->LabTestReleased->setDbValue($row['LabTestReleased']);
        $this->GoogleReviewID->setDbValue($row['GoogleReviewID']);
        $this->CardType->setDbValue($row['CardType']);
        $this->PharmacyBill->setDbValue($row['PharmacyBill']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PatientId'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['Mobile'] = null;
        $row['IP_OP'] = null;
        $row['Doctor'] = null;
        $row['voucher_type'] = null;
        $row['Details'] = null;
        $row['ModeofPayment'] = null;
        $row['Amount'] = null;
        $row['AnyDues'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['RealizationAmount'] = null;
        $row['RealizationStatus'] = null;
        $row['RealizationRemarks'] = null;
        $row['RealizationBatchNo'] = null;
        $row['RealizationDate'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['CId'] = null;
        $row['PartnerName'] = null;
        $row['PayerType'] = null;
        $row['Dob'] = null;
        $row['Currency'] = null;
        $row['DiscountRemarks'] = null;
        $row['Remarks'] = null;
        $row['PatId'] = null;
        $row['DrDepartment'] = null;
        $row['RefferedBy'] = null;
        $row['BillNumber'] = null;
        $row['CardNumber'] = null;
        $row['BankName'] = null;
        $row['DrID'] = null;
        $row['BillStatus'] = null;
        $row['ReportHeader'] = null;
        $row['UserName'] = null;
        $row['AdjustmentAdvance'] = null;
        $row['billing_vouchercol'] = null;
        $row['BillType'] = null;
        $row['ProcedureName'] = null;
        $row['ProcedureAmount'] = null;
        $row['IncludePackage'] = null;
        $row['CancelBill'] = null;
        $row['CancelReason'] = null;
        $row['CancelModeOfPayment'] = null;
        $row['CancelAmount'] = null;
        $row['CancelBankName'] = null;
        $row['CancelTransactionNumber'] = null;
        $row['LabTest'] = null;
        $row['sid'] = null;
        $row['SidNo'] = null;
        $row['createdDatettime'] = null;
        $row['LabTestReleased'] = null;
        $row['GoogleReviewID'] = null;
        $row['CardType'] = null;
        $row['PharmacyBill'] = null;
        $row['DiscountAmount'] = null;
        $row['Cash'] = null;
        $row['Card'] = null;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // PatientId

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // Mobile

        // IP_OP

        // Doctor

        // voucher_type

        // Details

        // ModeofPayment

        // Amount

        // AnyDues

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // RealizationAmount

        // RealizationStatus

        // RealizationRemarks

        // RealizationBatchNo

        // RealizationDate

        // HospID

        // RIDNO

        // TidNo

        // CId

        // PartnerName

        // PayerType

        // Dob

        // Currency

        // DiscountRemarks

        // Remarks

        // PatId

        // DrDepartment

        // RefferedBy

        // BillNumber

        // CardNumber

        // BankName

        // DrID

        // BillStatus

        // ReportHeader

        // UserName

        // AdjustmentAdvance

        // billing_vouchercol

        // BillType

        // ProcedureName

        // ProcedureAmount

        // IncludePackage

        // CancelBill

        // CancelReason

        // CancelModeOfPayment

        // CancelAmount

        // CancelBankName

        // CancelTransactionNumber

        // LabTest

        // sid

        // SidNo

        // createdDatettime

        // LabTestReleased

        // GoogleReviewID

        // CardType

        // PharmacyBill

        // DiscountAmount

        // Cash

        // Card
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

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

            // AnyDues
            $this->AnyDues->ViewValue = $this->AnyDues->CurrentValue;
            $this->AnyDues->ViewCustomAttributes = "";

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

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";
            $this->AnyDues->TooltipValue = "";

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
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

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
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue2 = HtmlEncode($this->Amount->AdvancedSearch->SearchValue2);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->AdvancedSearch->SearchValue = HtmlDecode($this->AnyDues->AdvancedSearch->SearchValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->AdvancedSearch->SearchValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

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

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
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
        if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if (!CheckNumber($this->Amount->AdvancedSearch->SearchValue2)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
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
        $this->PatientId->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->Mobile->AdvancedSearch->load();
        $this->IP_OP->AdvancedSearch->load();
        $this->Doctor->AdvancedSearch->load();
        $this->voucher_type->AdvancedSearch->load();
        $this->Details->AdvancedSearch->load();
        $this->ModeofPayment->AdvancedSearch->load();
        $this->Amount->AdvancedSearch->load();
        $this->AnyDues->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->RealizationAmount->AdvancedSearch->load();
        $this->RealizationStatus->AdvancedSearch->load();
        $this->RealizationRemarks->AdvancedSearch->load();
        $this->RealizationBatchNo->AdvancedSearch->load();
        $this->RealizationDate->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->RIDNO->AdvancedSearch->load();
        $this->TidNo->AdvancedSearch->load();
        $this->CId->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PayerType->AdvancedSearch->load();
        $this->Dob->AdvancedSearch->load();
        $this->Currency->AdvancedSearch->load();
        $this->DiscountRemarks->AdvancedSearch->load();
        $this->Remarks->AdvancedSearch->load();
        $this->PatId->AdvancedSearch->load();
        $this->DrDepartment->AdvancedSearch->load();
        $this->RefferedBy->AdvancedSearch->load();
        $this->BillNumber->AdvancedSearch->load();
        $this->CardNumber->AdvancedSearch->load();
        $this->BankName->AdvancedSearch->load();
        $this->DrID->AdvancedSearch->load();
        $this->BillStatus->AdvancedSearch->load();
        $this->ReportHeader->AdvancedSearch->load();
        $this->_UserName->AdvancedSearch->load();
        $this->AdjustmentAdvance->AdvancedSearch->load();
        $this->billing_vouchercol->AdvancedSearch->load();
        $this->BillType->AdvancedSearch->load();
        $this->ProcedureName->AdvancedSearch->load();
        $this->ProcedureAmount->AdvancedSearch->load();
        $this->IncludePackage->AdvancedSearch->load();
        $this->CancelBill->AdvancedSearch->load();
        $this->CancelReason->AdvancedSearch->load();
        $this->CancelModeOfPayment->AdvancedSearch->load();
        $this->CancelAmount->AdvancedSearch->load();
        $this->CancelBankName->AdvancedSearch->load();
        $this->CancelTransactionNumber->AdvancedSearch->load();
        $this->LabTest->AdvancedSearch->load();
        $this->sid->AdvancedSearch->load();
        $this->SidNo->AdvancedSearch->load();
        $this->createdDatettime->AdvancedSearch->load();
        $this->LabTestReleased->AdvancedSearch->load();
        $this->GoogleReviewID->AdvancedSearch->load();
        $this->CardType->AdvancedSearch->load();
        $this->PharmacyBill->AdvancedSearch->load();
        $this->DiscountAmount->AdvancedSearch->load();
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_dueslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_dueslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_dueslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_dues" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_dues\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_dueslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_dueslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
