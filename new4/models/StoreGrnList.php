<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreGrnList extends StoreGrn
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_grn';

    // Page object name
    public $PageObjName = "StoreGrnList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fstore_grnlist";
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

        // Table object (store_grn)
        if (!isset($GLOBALS["store_grn"]) || get_class($GLOBALS["store_grn"]) == PROJECT_NAMESPACE . "store_grn") {
            $GLOBALS["store_grn"] = &$this;
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
        $this->AddUrl = "StoreGrnAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "StoreGrnDelete";
        $this->MultiUpdateUrl = "StoreGrnUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_grn');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fstore_grnlistsrch";

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
                $doc = new $class(Container("store_grn"));
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
            $this->HospID->Visible = false;
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
            $this->PharmacyID->Visible = false;
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
    public $DisplayRecords = 8;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "5,8,10,20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
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
        $this->GRNNO->setVisibility();
        $this->DT->setVisibility();
        $this->YM->Visible = false;
        $this->PC->Visible = false;
        $this->Customercode->Visible = false;
        $this->Customername->setVisibility();
        $this->pharmacy_pocol->Visible = false;
        $this->Address1->Visible = false;
        $this->Address2->Visible = false;
        $this->Address3->Visible = false;
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->Visible = false;
        $this->EEmail->Visible = false;
        $this->HospID->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->BILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->BRCODE->Visible = false;
        $this->PharmacyID->Visible = false;
        $this->BillTotalValue->setVisibility();
        $this->GRNTotalValue->setVisibility();
        $this->BillDiscount->setVisibility();
        $this->BillUpload->Visible = false;
        $this->TransPort->Visible = false;
        $this->AnyOther->Visible = false;
        $this->Remarks->Visible = false;
        $this->GrnValue->setVisibility();
        $this->Pid->setVisibility();
        $this->PaymentNo->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->PaidAmount->setVisibility();
        $this->StoreID->setVisibility();
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up master detail parameters
        $this->setupMasterParms();

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
        $this->setupLookupOptions($this->PC);
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
            $this->DisplayRecords = 8; // Load default
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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "store_payment") {
            $masterTbl = Container("store_payment");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("StorePaymentList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

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
                    $this->DisplayRecords = 8; // Non-numeric, load default
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fstore_grnlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->GRNNO->AdvancedSearch->toJson(), ","); // Field GRNNO
        $filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
        $filterList = Concat($filterList, $this->YM->AdvancedSearch->toJson(), ","); // Field YM
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->Customercode->AdvancedSearch->toJson(), ","); // Field Customercode
        $filterList = Concat($filterList, $this->Customername->AdvancedSearch->toJson(), ","); // Field Customername
        $filterList = Concat($filterList, $this->pharmacy_pocol->AdvancedSearch->toJson(), ","); // Field pharmacy_pocol
        $filterList = Concat($filterList, $this->Address1->AdvancedSearch->toJson(), ","); // Field Address1
        $filterList = Concat($filterList, $this->Address2->AdvancedSearch->toJson(), ","); // Field Address2
        $filterList = Concat($filterList, $this->Address3->AdvancedSearch->toJson(), ","); // Field Address3
        $filterList = Concat($filterList, $this->State->AdvancedSearch->toJson(), ","); // Field State
        $filterList = Concat($filterList, $this->Pincode->AdvancedSearch->toJson(), ","); // Field Pincode
        $filterList = Concat($filterList, $this->Phone->AdvancedSearch->toJson(), ","); // Field Phone
        $filterList = Concat($filterList, $this->Fax->AdvancedSearch->toJson(), ","); // Field Fax
        $filterList = Concat($filterList, $this->EEmail->AdvancedSearch->toJson(), ","); // Field EEmail
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->BILLNO->AdvancedSearch->toJson(), ","); // Field BILLNO
        $filterList = Concat($filterList, $this->BILLDT->AdvancedSearch->toJson(), ","); // Field BILLDT
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->PharmacyID->AdvancedSearch->toJson(), ","); // Field PharmacyID
        $filterList = Concat($filterList, $this->BillTotalValue->AdvancedSearch->toJson(), ","); // Field BillTotalValue
        $filterList = Concat($filterList, $this->GRNTotalValue->AdvancedSearch->toJson(), ","); // Field GRNTotalValue
        $filterList = Concat($filterList, $this->BillDiscount->AdvancedSearch->toJson(), ","); // Field BillDiscount
        $filterList = Concat($filterList, $this->BillUpload->AdvancedSearch->toJson(), ","); // Field BillUpload
        $filterList = Concat($filterList, $this->TransPort->AdvancedSearch->toJson(), ","); // Field TransPort
        $filterList = Concat($filterList, $this->AnyOther->AdvancedSearch->toJson(), ","); // Field AnyOther
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->GrnValue->AdvancedSearch->toJson(), ","); // Field GrnValue
        $filterList = Concat($filterList, $this->Pid->AdvancedSearch->toJson(), ","); // Field Pid
        $filterList = Concat($filterList, $this->PaymentNo->AdvancedSearch->toJson(), ","); // Field PaymentNo
        $filterList = Concat($filterList, $this->PaymentStatus->AdvancedSearch->toJson(), ","); // Field PaymentStatus
        $filterList = Concat($filterList, $this->PaidAmount->AdvancedSearch->toJson(), ","); // Field PaidAmount
        $filterList = Concat($filterList, $this->StoreID->AdvancedSearch->toJson(), ","); // Field StoreID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fstore_grnlistsrch", $filters);
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

        // Field GRNNO
        $this->GRNNO->AdvancedSearch->SearchValue = @$filter["x_GRNNO"];
        $this->GRNNO->AdvancedSearch->SearchOperator = @$filter["z_GRNNO"];
        $this->GRNNO->AdvancedSearch->SearchCondition = @$filter["v_GRNNO"];
        $this->GRNNO->AdvancedSearch->SearchValue2 = @$filter["y_GRNNO"];
        $this->GRNNO->AdvancedSearch->SearchOperator2 = @$filter["w_GRNNO"];
        $this->GRNNO->AdvancedSearch->save();

        // Field DT
        $this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
        $this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
        $this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
        $this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
        $this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
        $this->DT->AdvancedSearch->save();

        // Field YM
        $this->YM->AdvancedSearch->SearchValue = @$filter["x_YM"];
        $this->YM->AdvancedSearch->SearchOperator = @$filter["z_YM"];
        $this->YM->AdvancedSearch->SearchCondition = @$filter["v_YM"];
        $this->YM->AdvancedSearch->SearchValue2 = @$filter["y_YM"];
        $this->YM->AdvancedSearch->SearchOperator2 = @$filter["w_YM"];
        $this->YM->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field Customercode
        $this->Customercode->AdvancedSearch->SearchValue = @$filter["x_Customercode"];
        $this->Customercode->AdvancedSearch->SearchOperator = @$filter["z_Customercode"];
        $this->Customercode->AdvancedSearch->SearchCondition = @$filter["v_Customercode"];
        $this->Customercode->AdvancedSearch->SearchValue2 = @$filter["y_Customercode"];
        $this->Customercode->AdvancedSearch->SearchOperator2 = @$filter["w_Customercode"];
        $this->Customercode->AdvancedSearch->save();

        // Field Customername
        $this->Customername->AdvancedSearch->SearchValue = @$filter["x_Customername"];
        $this->Customername->AdvancedSearch->SearchOperator = @$filter["z_Customername"];
        $this->Customername->AdvancedSearch->SearchCondition = @$filter["v_Customername"];
        $this->Customername->AdvancedSearch->SearchValue2 = @$filter["y_Customername"];
        $this->Customername->AdvancedSearch->SearchOperator2 = @$filter["w_Customername"];
        $this->Customername->AdvancedSearch->save();

        // Field pharmacy_pocol
        $this->pharmacy_pocol->AdvancedSearch->SearchValue = @$filter["x_pharmacy_pocol"];
        $this->pharmacy_pocol->AdvancedSearch->SearchOperator = @$filter["z_pharmacy_pocol"];
        $this->pharmacy_pocol->AdvancedSearch->SearchCondition = @$filter["v_pharmacy_pocol"];
        $this->pharmacy_pocol->AdvancedSearch->SearchValue2 = @$filter["y_pharmacy_pocol"];
        $this->pharmacy_pocol->AdvancedSearch->SearchOperator2 = @$filter["w_pharmacy_pocol"];
        $this->pharmacy_pocol->AdvancedSearch->save();

        // Field Address1
        $this->Address1->AdvancedSearch->SearchValue = @$filter["x_Address1"];
        $this->Address1->AdvancedSearch->SearchOperator = @$filter["z_Address1"];
        $this->Address1->AdvancedSearch->SearchCondition = @$filter["v_Address1"];
        $this->Address1->AdvancedSearch->SearchValue2 = @$filter["y_Address1"];
        $this->Address1->AdvancedSearch->SearchOperator2 = @$filter["w_Address1"];
        $this->Address1->AdvancedSearch->save();

        // Field Address2
        $this->Address2->AdvancedSearch->SearchValue = @$filter["x_Address2"];
        $this->Address2->AdvancedSearch->SearchOperator = @$filter["z_Address2"];
        $this->Address2->AdvancedSearch->SearchCondition = @$filter["v_Address2"];
        $this->Address2->AdvancedSearch->SearchValue2 = @$filter["y_Address2"];
        $this->Address2->AdvancedSearch->SearchOperator2 = @$filter["w_Address2"];
        $this->Address2->AdvancedSearch->save();

        // Field Address3
        $this->Address3->AdvancedSearch->SearchValue = @$filter["x_Address3"];
        $this->Address3->AdvancedSearch->SearchOperator = @$filter["z_Address3"];
        $this->Address3->AdvancedSearch->SearchCondition = @$filter["v_Address3"];
        $this->Address3->AdvancedSearch->SearchValue2 = @$filter["y_Address3"];
        $this->Address3->AdvancedSearch->SearchOperator2 = @$filter["w_Address3"];
        $this->Address3->AdvancedSearch->save();

        // Field State
        $this->State->AdvancedSearch->SearchValue = @$filter["x_State"];
        $this->State->AdvancedSearch->SearchOperator = @$filter["z_State"];
        $this->State->AdvancedSearch->SearchCondition = @$filter["v_State"];
        $this->State->AdvancedSearch->SearchValue2 = @$filter["y_State"];
        $this->State->AdvancedSearch->SearchOperator2 = @$filter["w_State"];
        $this->State->AdvancedSearch->save();

        // Field Pincode
        $this->Pincode->AdvancedSearch->SearchValue = @$filter["x_Pincode"];
        $this->Pincode->AdvancedSearch->SearchOperator = @$filter["z_Pincode"];
        $this->Pincode->AdvancedSearch->SearchCondition = @$filter["v_Pincode"];
        $this->Pincode->AdvancedSearch->SearchValue2 = @$filter["y_Pincode"];
        $this->Pincode->AdvancedSearch->SearchOperator2 = @$filter["w_Pincode"];
        $this->Pincode->AdvancedSearch->save();

        // Field Phone
        $this->Phone->AdvancedSearch->SearchValue = @$filter["x_Phone"];
        $this->Phone->AdvancedSearch->SearchOperator = @$filter["z_Phone"];
        $this->Phone->AdvancedSearch->SearchCondition = @$filter["v_Phone"];
        $this->Phone->AdvancedSearch->SearchValue2 = @$filter["y_Phone"];
        $this->Phone->AdvancedSearch->SearchOperator2 = @$filter["w_Phone"];
        $this->Phone->AdvancedSearch->save();

        // Field Fax
        $this->Fax->AdvancedSearch->SearchValue = @$filter["x_Fax"];
        $this->Fax->AdvancedSearch->SearchOperator = @$filter["z_Fax"];
        $this->Fax->AdvancedSearch->SearchCondition = @$filter["v_Fax"];
        $this->Fax->AdvancedSearch->SearchValue2 = @$filter["y_Fax"];
        $this->Fax->AdvancedSearch->SearchOperator2 = @$filter["w_Fax"];
        $this->Fax->AdvancedSearch->save();

        // Field EEmail
        $this->EEmail->AdvancedSearch->SearchValue = @$filter["x_EEmail"];
        $this->EEmail->AdvancedSearch->SearchOperator = @$filter["z_EEmail"];
        $this->EEmail->AdvancedSearch->SearchCondition = @$filter["v_EEmail"];
        $this->EEmail->AdvancedSearch->SearchValue2 = @$filter["y_EEmail"];
        $this->EEmail->AdvancedSearch->SearchOperator2 = @$filter["w_EEmail"];
        $this->EEmail->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

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

        // Field BILLNO
        $this->BILLNO->AdvancedSearch->SearchValue = @$filter["x_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchOperator = @$filter["z_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchCondition = @$filter["v_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchValue2 = @$filter["y_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchOperator2 = @$filter["w_BILLNO"];
        $this->BILLNO->AdvancedSearch->save();

        // Field BILLDT
        $this->BILLDT->AdvancedSearch->SearchValue = @$filter["x_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchOperator = @$filter["z_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchCondition = @$filter["v_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchValue2 = @$filter["y_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDT"];
        $this->BILLDT->AdvancedSearch->save();

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field PharmacyID
        $this->PharmacyID->AdvancedSearch->SearchValue = @$filter["x_PharmacyID"];
        $this->PharmacyID->AdvancedSearch->SearchOperator = @$filter["z_PharmacyID"];
        $this->PharmacyID->AdvancedSearch->SearchCondition = @$filter["v_PharmacyID"];
        $this->PharmacyID->AdvancedSearch->SearchValue2 = @$filter["y_PharmacyID"];
        $this->PharmacyID->AdvancedSearch->SearchOperator2 = @$filter["w_PharmacyID"];
        $this->PharmacyID->AdvancedSearch->save();

        // Field BillTotalValue
        $this->BillTotalValue->AdvancedSearch->SearchValue = @$filter["x_BillTotalValue"];
        $this->BillTotalValue->AdvancedSearch->SearchOperator = @$filter["z_BillTotalValue"];
        $this->BillTotalValue->AdvancedSearch->SearchCondition = @$filter["v_BillTotalValue"];
        $this->BillTotalValue->AdvancedSearch->SearchValue2 = @$filter["y_BillTotalValue"];
        $this->BillTotalValue->AdvancedSearch->SearchOperator2 = @$filter["w_BillTotalValue"];
        $this->BillTotalValue->AdvancedSearch->save();

        // Field GRNTotalValue
        $this->GRNTotalValue->AdvancedSearch->SearchValue = @$filter["x_GRNTotalValue"];
        $this->GRNTotalValue->AdvancedSearch->SearchOperator = @$filter["z_GRNTotalValue"];
        $this->GRNTotalValue->AdvancedSearch->SearchCondition = @$filter["v_GRNTotalValue"];
        $this->GRNTotalValue->AdvancedSearch->SearchValue2 = @$filter["y_GRNTotalValue"];
        $this->GRNTotalValue->AdvancedSearch->SearchOperator2 = @$filter["w_GRNTotalValue"];
        $this->GRNTotalValue->AdvancedSearch->save();

        // Field BillDiscount
        $this->BillDiscount->AdvancedSearch->SearchValue = @$filter["x_BillDiscount"];
        $this->BillDiscount->AdvancedSearch->SearchOperator = @$filter["z_BillDiscount"];
        $this->BillDiscount->AdvancedSearch->SearchCondition = @$filter["v_BillDiscount"];
        $this->BillDiscount->AdvancedSearch->SearchValue2 = @$filter["y_BillDiscount"];
        $this->BillDiscount->AdvancedSearch->SearchOperator2 = @$filter["w_BillDiscount"];
        $this->BillDiscount->AdvancedSearch->save();

        // Field BillUpload
        $this->BillUpload->AdvancedSearch->SearchValue = @$filter["x_BillUpload"];
        $this->BillUpload->AdvancedSearch->SearchOperator = @$filter["z_BillUpload"];
        $this->BillUpload->AdvancedSearch->SearchCondition = @$filter["v_BillUpload"];
        $this->BillUpload->AdvancedSearch->SearchValue2 = @$filter["y_BillUpload"];
        $this->BillUpload->AdvancedSearch->SearchOperator2 = @$filter["w_BillUpload"];
        $this->BillUpload->AdvancedSearch->save();

        // Field TransPort
        $this->TransPort->AdvancedSearch->SearchValue = @$filter["x_TransPort"];
        $this->TransPort->AdvancedSearch->SearchOperator = @$filter["z_TransPort"];
        $this->TransPort->AdvancedSearch->SearchCondition = @$filter["v_TransPort"];
        $this->TransPort->AdvancedSearch->SearchValue2 = @$filter["y_TransPort"];
        $this->TransPort->AdvancedSearch->SearchOperator2 = @$filter["w_TransPort"];
        $this->TransPort->AdvancedSearch->save();

        // Field AnyOther
        $this->AnyOther->AdvancedSearch->SearchValue = @$filter["x_AnyOther"];
        $this->AnyOther->AdvancedSearch->SearchOperator = @$filter["z_AnyOther"];
        $this->AnyOther->AdvancedSearch->SearchCondition = @$filter["v_AnyOther"];
        $this->AnyOther->AdvancedSearch->SearchValue2 = @$filter["y_AnyOther"];
        $this->AnyOther->AdvancedSearch->SearchOperator2 = @$filter["w_AnyOther"];
        $this->AnyOther->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field GrnValue
        $this->GrnValue->AdvancedSearch->SearchValue = @$filter["x_GrnValue"];
        $this->GrnValue->AdvancedSearch->SearchOperator = @$filter["z_GrnValue"];
        $this->GrnValue->AdvancedSearch->SearchCondition = @$filter["v_GrnValue"];
        $this->GrnValue->AdvancedSearch->SearchValue2 = @$filter["y_GrnValue"];
        $this->GrnValue->AdvancedSearch->SearchOperator2 = @$filter["w_GrnValue"];
        $this->GrnValue->AdvancedSearch->save();

        // Field Pid
        $this->Pid->AdvancedSearch->SearchValue = @$filter["x_Pid"];
        $this->Pid->AdvancedSearch->SearchOperator = @$filter["z_Pid"];
        $this->Pid->AdvancedSearch->SearchCondition = @$filter["v_Pid"];
        $this->Pid->AdvancedSearch->SearchValue2 = @$filter["y_Pid"];
        $this->Pid->AdvancedSearch->SearchOperator2 = @$filter["w_Pid"];
        $this->Pid->AdvancedSearch->save();

        // Field PaymentNo
        $this->PaymentNo->AdvancedSearch->SearchValue = @$filter["x_PaymentNo"];
        $this->PaymentNo->AdvancedSearch->SearchOperator = @$filter["z_PaymentNo"];
        $this->PaymentNo->AdvancedSearch->SearchCondition = @$filter["v_PaymentNo"];
        $this->PaymentNo->AdvancedSearch->SearchValue2 = @$filter["y_PaymentNo"];
        $this->PaymentNo->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentNo"];
        $this->PaymentNo->AdvancedSearch->save();

        // Field PaymentStatus
        $this->PaymentStatus->AdvancedSearch->SearchValue = @$filter["x_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchOperator = @$filter["z_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchCondition = @$filter["v_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchValue2 = @$filter["y_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->SearchOperator2 = @$filter["w_PaymentStatus"];
        $this->PaymentStatus->AdvancedSearch->save();

        // Field PaidAmount
        $this->PaidAmount->AdvancedSearch->SearchValue = @$filter["x_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchOperator = @$filter["z_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchCondition = @$filter["v_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchValue2 = @$filter["y_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->SearchOperator2 = @$filter["w_PaidAmount"];
        $this->PaidAmount->AdvancedSearch->save();

        // Field StoreID
        $this->StoreID->AdvancedSearch->SearchValue = @$filter["x_StoreID"];
        $this->StoreID->AdvancedSearch->SearchOperator = @$filter["z_StoreID"];
        $this->StoreID->AdvancedSearch->SearchCondition = @$filter["v_StoreID"];
        $this->StoreID->AdvancedSearch->SearchValue2 = @$filter["y_StoreID"];
        $this->StoreID->AdvancedSearch->SearchOperator2 = @$filter["w_StoreID"];
        $this->StoreID->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->GRNNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->YM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Customercode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Customername, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pharmacy_pocol, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pincode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Phone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fax, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EEmail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillUpload, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaymentNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaymentStatus, $arKeywords, $type);
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
            $this->updateSort($this->GRNNO); // GRNNO
            $this->updateSort($this->DT); // DT
            $this->updateSort($this->Customername); // Customername
            $this->updateSort($this->State); // State
            $this->updateSort($this->Pincode); // Pincode
            $this->updateSort($this->Phone); // Phone
            $this->updateSort($this->BILLNO); // BILLNO
            $this->updateSort($this->BILLDT); // BILLDT
            $this->updateSort($this->BillTotalValue); // BillTotalValue
            $this->updateSort($this->GRNTotalValue); // GRNTotalValue
            $this->updateSort($this->BillDiscount); // BillDiscount
            $this->updateSort($this->GrnValue); // GrnValue
            $this->updateSort($this->Pid); // Pid
            $this->updateSort($this->PaymentNo); // PaymentNo
            $this->updateSort($this->PaymentStatus); // PaymentStatus
            $this->updateSort($this->PaidAmount); // PaidAmount
            $this->updateSort($this->StoreID); // StoreID
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

            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->Pid->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->GRNNO->setSort("");
                $this->DT->setSort("");
                $this->YM->setSort("");
                $this->PC->setSort("");
                $this->Customercode->setSort("");
                $this->Customername->setSort("");
                $this->pharmacy_pocol->setSort("");
                $this->Address1->setSort("");
                $this->Address2->setSort("");
                $this->Address3->setSort("");
                $this->State->setSort("");
                $this->Pincode->setSort("");
                $this->Phone->setSort("");
                $this->Fax->setSort("");
                $this->EEmail->setSort("");
                $this->HospID->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->BILLNO->setSort("");
                $this->BILLDT->setSort("");
                $this->BRCODE->setSort("");
                $this->PharmacyID->setSort("");
                $this->BillTotalValue->setSort("");
                $this->GRNTotalValue->setSort("");
                $this->BillDiscount->setSort("");
                $this->BillUpload->setSort("");
                $this->TransPort->setSort("");
                $this->AnyOther->setSort("");
                $this->Remarks->setSort("");
                $this->GrnValue->setSort("");
                $this->Pid->setSort("");
                $this->PaymentNo->setSort("");
                $this->PaymentStatus->setSort("");
                $this->PaidAmount->setSort("");
                $this->StoreID->setSort("");
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

        // "detail_view_store_grn"
        $item = &$this->ListOptions->add("detail_view_store_grn");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'view_store_grn') && !$this->ShowMultipleDetails;
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
        $pages->add("view_store_grn");
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

        // "detail_view_store_grn"
        $opt = $this->ListOptions["detail_view_store_grn"];
        if ($Security->allowList(CurrentProjectID() . 'view_store_grn')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("view_store_grn", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ViewStoreGrnList?" . Config("TABLE_SHOW_MASTER") . "=store_grn&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("ViewStoreGrnGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "view_store_grn";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "view_store_grn";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "view_store_grn";
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
                $item = &$option->add("detailadd_view_store_grn");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $detailPage = Container("ViewStoreGrnGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'store_grn') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "view_store_grn";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fstore_grnlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fstore_grnlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fstore_grnlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $sqlwrk = "`grnid`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_view_store_grn"
        if ($this->DetailPages && $this->DetailPages["view_store_grn"] && $this->DetailPages["view_store_grn"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_view_store_grn"];
            $url = "ViewStoreGrnPreview?t=store_grn&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"view_store_grn\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'store_grn')) {
                $label = $Language->TablePhrase("view_store_grn", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_store_grn\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("ViewStoreGrnList?" . Config("TABLE_SHOW_MASTER") . "=store_grn&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_store_grn", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("ViewStoreGrnGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'store_grn')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_store_grn");
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
        $this->GRNNO->setDbValue($row['GRNNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PharmacyID->setDbValue($row['PharmacyID']);
        $this->BillTotalValue->setDbValue($row['BillTotalValue']);
        $this->GRNTotalValue->setDbValue($row['GRNTotalValue']);
        $this->BillDiscount->setDbValue($row['BillDiscount']);
        $this->BillUpload->Upload->DbValue = $row['BillUpload'];
        $this->BillUpload->setDbValue($this->BillUpload->Upload->DbValue);
        $this->TransPort->setDbValue($row['TransPort']);
        $this->AnyOther->setDbValue($row['AnyOther']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->GrnValue->setDbValue($row['GrnValue']);
        $this->Pid->setDbValue($row['Pid']);
        $this->PaymentNo->setDbValue($row['PaymentNo']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->PaidAmount->setDbValue($row['PaidAmount']);
        $this->StoreID->setDbValue($row['StoreID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['GRNNO'] = null;
        $row['DT'] = null;
        $row['YM'] = null;
        $row['PC'] = null;
        $row['Customercode'] = null;
        $row['Customername'] = null;
        $row['pharmacy_pocol'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['EEmail'] = null;
        $row['HospID'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['BILLNO'] = null;
        $row['BILLDT'] = null;
        $row['BRCODE'] = null;
        $row['PharmacyID'] = null;
        $row['BillTotalValue'] = null;
        $row['GRNTotalValue'] = null;
        $row['BillDiscount'] = null;
        $row['BillUpload'] = null;
        $row['TransPort'] = null;
        $row['AnyOther'] = null;
        $row['Remarks'] = null;
        $row['GrnValue'] = null;
        $row['Pid'] = null;
        $row['PaymentNo'] = null;
        $row['PaymentStatus'] = null;
        $row['PaidAmount'] = null;
        $row['StoreID'] = null;
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
        if ($this->BillTotalValue->FormValue == $this->BillTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->BillTotalValue->CurrentValue))) {
            $this->BillTotalValue->CurrentValue = ConvertToFloatString($this->BillTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GRNTotalValue->FormValue == $this->GRNTotalValue->CurrentValue && is_numeric(ConvertToFloatString($this->GRNTotalValue->CurrentValue))) {
            $this->GRNTotalValue->CurrentValue = ConvertToFloatString($this->GRNTotalValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillDiscount->FormValue == $this->BillDiscount->CurrentValue && is_numeric(ConvertToFloatString($this->BillDiscount->CurrentValue))) {
            $this->BillDiscount->CurrentValue = ConvertToFloatString($this->BillDiscount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GrnValue->FormValue == $this->GrnValue->CurrentValue && is_numeric(ConvertToFloatString($this->GrnValue->CurrentValue))) {
            $this->GrnValue->CurrentValue = ConvertToFloatString($this->GrnValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PaidAmount->FormValue == $this->PaidAmount->CurrentValue && is_numeric(ConvertToFloatString($this->PaidAmount->CurrentValue))) {
            $this->PaidAmount->CurrentValue = ConvertToFloatString($this->PaidAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // GRNNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BILLNO

        // BILLDT

        // BRCODE

        // PharmacyID

        // BillTotalValue

        // GRNTotalValue

        // BillDiscount

        // BillUpload

        // TransPort

        // AnyOther

        // Remarks

        // GrnValue

        // Pid

        // PaymentNo

        // PaymentStatus

        // PaidAmount

        // StoreID

        // Accumulate aggregate value
        if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
            if (is_numeric($this->BillTotalValue->CurrentValue)) {
                $this->BillTotalValue->Total += $this->BillTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->GRNTotalValue->CurrentValue)) {
                $this->GRNTotalValue->Total += $this->GRNTotalValue->CurrentValue; // Accumulate total
            }
            if (is_numeric($this->BillDiscount->CurrentValue)) {
                $this->BillDiscount->Total += $this->BillDiscount->CurrentValue; // Accumulate total
            }
        }
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // GRNNO
            $this->GRNNO->ViewValue = $this->GRNNO->CurrentValue;
            $this->GRNNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // PC
            $curVal = trim(strval($this->PC->CurrentValue));
            if ($curVal != "") {
                $this->PC->ViewValue = $this->PC->lookupCacheOption($curVal);
                if ($this->PC->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PC->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PC->Lookup->renderViewRow($rswrk[0]);
                        $this->PC->ViewValue = $this->PC->displayValue($arwrk);
                    } else {
                        $this->PC->ViewValue = $this->PC->CurrentValue;
                    }
                }
            } else {
                $this->PC->ViewValue = null;
            }
            $this->PC->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
            $this->pharmacy_pocol->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // EEmail
            $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
            $this->EEmail->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // BRCODE
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->ViewValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
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

            // PharmacyID
            $this->PharmacyID->ViewValue = $this->PharmacyID->CurrentValue;
            $this->PharmacyID->ViewValue = FormatNumber($this->PharmacyID->ViewValue, 0, -2, -2, -2);
            $this->PharmacyID->ViewCustomAttributes = "";

            // BillTotalValue
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";

            // GRNTotalValue
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";

            // BillDiscount
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";

            // TransPort
            $this->TransPort->ViewValue = $this->TransPort->CurrentValue;
            $this->TransPort->ViewValue = FormatNumber($this->TransPort->ViewValue, 2, -2, -2, -2);
            $this->TransPort->ViewCustomAttributes = "";

            // AnyOther
            $this->AnyOther->ViewValue = $this->AnyOther->CurrentValue;
            $this->AnyOther->ViewValue = FormatNumber($this->AnyOther->ViewValue, 2, -2, -2, -2);
            $this->AnyOther->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // GrnValue
            $this->GrnValue->ViewValue = $this->GrnValue->CurrentValue;
            $this->GrnValue->ViewValue = FormatNumber($this->GrnValue->ViewValue, 2, -2, -2, -2);
            $this->GrnValue->ViewCustomAttributes = "";

            // Pid
            $this->Pid->ViewValue = $this->Pid->CurrentValue;
            $this->Pid->ViewValue = FormatNumber($this->Pid->ViewValue, 0, -2, -2, -2);
            $this->Pid->ViewCustomAttributes = "";

            // PaymentNo
            $this->PaymentNo->ViewValue = $this->PaymentNo->CurrentValue;
            $this->PaymentNo->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewCustomAttributes = "";

            // PaidAmount
            $this->PaidAmount->ViewValue = $this->PaidAmount->CurrentValue;
            $this->PaidAmount->ViewValue = FormatNumber($this->PaidAmount->ViewValue, 2, -2, -2, -2);
            $this->PaidAmount->ViewCustomAttributes = "";

            // StoreID
            $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
            $this->StoreID->ViewValue = FormatNumber($this->StoreID->ViewValue, 0, -2, -2, -2);
            $this->StoreID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // GRNNO
            $this->GRNNO->LinkCustomAttributes = "";
            $this->GRNNO->HrefValue = "";
            $this->GRNNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // BillTotalValue
            $this->BillTotalValue->LinkCustomAttributes = "";
            $this->BillTotalValue->HrefValue = "";
            $this->BillTotalValue->TooltipValue = "";

            // GRNTotalValue
            $this->GRNTotalValue->LinkCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = "";
            $this->GRNTotalValue->TooltipValue = "";

            // BillDiscount
            $this->BillDiscount->LinkCustomAttributes = "";
            $this->BillDiscount->HrefValue = "";
            $this->BillDiscount->TooltipValue = "";

            // GrnValue
            $this->GrnValue->LinkCustomAttributes = "";
            $this->GrnValue->HrefValue = "";
            $this->GrnValue->TooltipValue = "";

            // Pid
            $this->Pid->LinkCustomAttributes = "";
            $this->Pid->HrefValue = "";
            $this->Pid->TooltipValue = "";

            // PaymentNo
            $this->PaymentNo->LinkCustomAttributes = "";
            $this->PaymentNo->HrefValue = "";
            $this->PaymentNo->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

            // PaidAmount
            $this->PaidAmount->LinkCustomAttributes = "";
            $this->PaidAmount->HrefValue = "";
            $this->PaidAmount->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
                    $this->BillTotalValue->Total = 0; // Initialize total
                    $this->GRNTotalValue->Total = 0; // Initialize total
                    $this->BillDiscount->Total = 0; // Initialize total
        } elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
            $this->BillTotalValue->CurrentValue = $this->BillTotalValue->Total;
            $this->BillTotalValue->ViewValue = $this->BillTotalValue->CurrentValue;
            $this->BillTotalValue->ViewValue = FormatNumber($this->BillTotalValue->ViewValue, 2, -2, -2, -2);
            $this->BillTotalValue->ViewCustomAttributes = "";
            $this->BillTotalValue->HrefValue = ""; // Clear href value
            $this->GRNTotalValue->CurrentValue = $this->GRNTotalValue->Total;
            $this->GRNTotalValue->ViewValue = $this->GRNTotalValue->CurrentValue;
            $this->GRNTotalValue->ViewValue = FormatNumber($this->GRNTotalValue->ViewValue, 2, -2, -2, -2);
            $this->GRNTotalValue->ViewCustomAttributes = "";
            $this->GRNTotalValue->HrefValue = ""; // Clear href value
            $this->BillDiscount->CurrentValue = $this->BillDiscount->Total;
            $this->BillDiscount->ViewValue = $this->BillDiscount->CurrentValue;
            $this->BillDiscount->ViewValue = FormatNumber($this->BillDiscount->ViewValue, 2, -2, -2, -2);
            $this->BillDiscount->ViewCustomAttributes = "";
            $this->BillDiscount->HrefValue = ""; // Clear href value
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fstore_grnlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fstore_grnlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fstore_grnlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_store_grn" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_store_grn\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fstore_grnlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = true;

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fstore_grnlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "store_payment") {
            $store_payment = Container("store_payment");
            $rsmaster = $store_payment->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $store_payment;
                    $store_payment->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }
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
            if ($return) {
                return $doc->Text; // Return email content
            } else {
                echo $this->exportEmail($doc->Text); // Send email
            }
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

    // Export email
    protected function exportEmail($emailContent)
    {
        global $TempImages, $Language;
        $sender = Post("sender", "");
        $recipient = Post("recipient", "");
        $cc = Post("cc", "");
        $bcc = Post("bcc", "");

        // Subject
        $subject = Post("subject", "");
        $emailSubject = $subject;

        // Message
        $content = Post("message", "");
        $emailMessage = $content;

        // Check sender
        if ($sender == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Sender"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmail($sender)) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
        }

        // Check recipient
        if ($recipient == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Recipient"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
        }

        // Check cc
        if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
        }

        // Check bcc
        if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
        }

        // Check email sent count
        $_SESSION[Config("EXPORT_EMAIL_COUNTER")] = Session(Config("EXPORT_EMAIL_COUNTER")) ?? 0;
        if ((int)Session(Config("EXPORT_EMAIL_COUNTER")) > Config("MAX_EMAIL_SENT_COUNT")) {
            return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
        }

        // Send email
        $email = new Email();
        $email->Sender = $sender; // Sender
        $email->Recipient = $recipient; // Recipient
        $email->Cc = $cc; // Cc
        $email->Bcc = $bcc; // Bcc
        $email->Subject = $emailSubject; // Subject
        $email->Format = "html";
        if ($emailMessage != "") {
            $emailMessage = RemoveXss($emailMessage) . "<br><br>";
        }
        foreach ($TempImages as $tmpImage) {
            $email->addEmbeddedImage($tmpImage);
        }
        $email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
        $eventArgs = [];
        if ($this->Recordset) {
            $eventArgs["rs"] = &$this->Recordset;
        }
        $emailSent = false;
        if ($this->emailSending($email, $eventArgs)) {
            $emailSent = $email->send();
        }

        // Check email sent status
        if ($emailSent) {
            // Update email sent count
            $_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

            // Sent email success
            return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
        } else {
            // Sent email failure
            return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
        }
    }

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "store_payment") {
                $validMaster = true;
                $masterTbl = Container("store_payment");
                if (($parm = Get("fk_id", Get("Pid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Pid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Pid->setSessionValue($this->Pid->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "store_payment") {
                $validMaster = true;
                $masterTbl = Container("store_payment");
                if (($parm = Post("fk_id", Post("Pid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Pid->setFormValue($masterTbl->id->FormValue);
                    $this->Pid->setSessionValue($this->Pid->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);

            // Update URL
            $this->AddUrl = $this->addMasterUrl($this->AddUrl);
            $this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
            $this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
            $this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "store_payment") {
                if ($this->Pid->CurrentValue == "") {
                    $this->Pid->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
                case "x_PC":
                    break;
                case "x_BRCODE":
                    $lookupFilter = function () {
                        return "`id`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
