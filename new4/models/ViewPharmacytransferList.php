<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacytransferList extends ViewPharmacytransfer
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacytransfer';

    // Page object name
    public $PageObjName = "ViewPharmacytransferList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_pharmacytransferlist";
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

        // Table object (view_pharmacytransfer)
        if (!isset($GLOBALS["view_pharmacytransfer"]) || get_class($GLOBALS["view_pharmacytransfer"]) == PROJECT_NAMESPACE . "view_pharmacytransfer") {
            $GLOBALS["view_pharmacytransfer"] = &$this;
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
        $this->AddUrl = "ViewPharmacytransferAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewPharmacytransferDelete";
        $this->MultiUpdateUrl = "ViewPharmacytransferUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacytransfer');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacytransferlistsrch";

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
                $doc = new $class(Container("view_pharmacytransfer"));
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
        if ($this->isAddOrEdit()) {
            $this->ORDNO->Visible = false;
        }
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->HospID->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grncreatedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grncreatedDateTime->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grnModifiedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->grnModifiedDateTime->Visible = false;
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
        $this->ORDNO->setVisibility();
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->QTY->Visible = false;
        $this->DT->Visible = false;
        $this->PC->Visible = false;
        $this->YM->Visible = false;
        $this->Stock->Visible = false;
        $this->Printcheck->Visible = false;
        $this->id->Visible = false;
        $this->grnid->Visible = false;
        $this->poid->Visible = false;
        $this->LastMonthSale->setVisibility();
        $this->PrName->setVisibility();
        $this->GrnQuantity->Visible = false;
        $this->Quantity->setVisibility();
        $this->FreeQty->Visible = false;
        $this->BatchNo->setVisibility();
        $this->ExpDate->setVisibility();
        $this->HSN->Visible = false;
        $this->MFRCODE->Visible = false;
        $this->PUnit->Visible = false;
        $this->SUnit->Visible = false;
        $this->MRP->setVisibility();
        $this->PurValue->Visible = false;
        $this->Disc->Visible = false;
        $this->PSGST->Visible = false;
        $this->PCGST->Visible = false;
        $this->PTax->Visible = false;
        $this->ItemValue->setVisibility();
        $this->SalTax->Visible = false;
        $this->PurRate->Visible = false;
        $this->SalRate->Visible = false;
        $this->Discount->Visible = false;
        $this->SSGST->Visible = false;
        $this->SCGST->Visible = false;
        $this->Pack->Visible = false;
        $this->GrnMRP->Visible = false;
        $this->trid->setVisibility();
        $this->HospID->setVisibility();
        $this->CreatedBy->Visible = false;
        $this->CreatedDateTime->Visible = false;
        $this->ModifiedBy->Visible = false;
        $this->ModifiedDateTime->Visible = false;
        $this->grncreatedby->setVisibility();
        $this->grncreatedDateTime->setVisibility();
        $this->grnModifiedby->setVisibility();
        $this->grnModifiedDateTime->setVisibility();
        $this->Received->Visible = false;
        $this->BillDate->setVisibility();
        $this->CurStock->setVisibility();
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
        $this->setupLookupOptions($this->ORDNO);
        $this->setupLookupOptions($this->BRCODE);
        $this->setupLookupOptions($this->LastMonthSale);

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
                            $this->terminate(_LIST);
                            return;
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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
            $masterTbl = Container("pharmacy_billing_transfer");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PharmacyBillingTransferList"); // Return to master page
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
        $this->MRP->FormValue = ""; // Clear form value
        $this->ItemValue->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_BRCODE") && $CurrentForm->hasValue("o_BRCODE") && $this->BRCODE->CurrentValue != $this->BRCODE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PRC") && $CurrentForm->hasValue("o_PRC") && $this->PRC->CurrentValue != $this->PRC->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LastMonthSale") && $CurrentForm->hasValue("o_LastMonthSale") && $this->LastMonthSale->CurrentValue != $this->LastMonthSale->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrName") && $CurrentForm->hasValue("o_PrName") && $this->PrName->CurrentValue != $this->PrName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Quantity") && $CurrentForm->hasValue("o_Quantity") && $this->Quantity->CurrentValue != $this->Quantity->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BatchNo") && $CurrentForm->hasValue("o_BatchNo") && $this->BatchNo->CurrentValue != $this->BatchNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ExpDate") && $CurrentForm->hasValue("o_ExpDate") && $this->ExpDate->CurrentValue != $this->ExpDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRP") && $CurrentForm->hasValue("o_MRP") && $this->MRP->CurrentValue != $this->MRP->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ItemValue") && $CurrentForm->hasValue("o_ItemValue") && $this->ItemValue->CurrentValue != $this->ItemValue->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_trid") && $CurrentForm->hasValue("o_trid") && $this->trid->CurrentValue != $this->trid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillDate") && $CurrentForm->hasValue("o_BillDate") && $this->BillDate->CurrentValue != $this->BillDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CurStock") && $CurrentForm->hasValue("o_CurStock") && $this->CurStock->CurrentValue != $this->CurStock->OldValue) {
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
        $this->ORDNO->clearErrorMessage();
        $this->BRCODE->clearErrorMessage();
        $this->PRC->clearErrorMessage();
        $this->LastMonthSale->clearErrorMessage();
        $this->PrName->clearErrorMessage();
        $this->Quantity->clearErrorMessage();
        $this->BatchNo->clearErrorMessage();
        $this->ExpDate->clearErrorMessage();
        $this->MRP->clearErrorMessage();
        $this->ItemValue->clearErrorMessage();
        $this->trid->clearErrorMessage();
        $this->HospID->clearErrorMessage();
        $this->grncreatedby->clearErrorMessage();
        $this->grncreatedDateTime->clearErrorMessage();
        $this->grnModifiedby->clearErrorMessage();
        $this->grnModifiedDateTime->clearErrorMessage();
        $this->BillDate->clearErrorMessage();
        $this->CurStock->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacytransferlistsrch");
        }
        $filterList = Concat($filterList, $this->ORDNO->AdvancedSearch->toJson(), ","); // Field ORDNO
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->QTY->AdvancedSearch->toJson(), ","); // Field QTY
        $filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->YM->AdvancedSearch->toJson(), ","); // Field YM
        $filterList = Concat($filterList, $this->Stock->AdvancedSearch->toJson(), ","); // Field Stock
        $filterList = Concat($filterList, $this->Printcheck->AdvancedSearch->toJson(), ","); // Field Printcheck
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->grnid->AdvancedSearch->toJson(), ","); // Field grnid
        $filterList = Concat($filterList, $this->poid->AdvancedSearch->toJson(), ","); // Field poid
        $filterList = Concat($filterList, $this->LastMonthSale->AdvancedSearch->toJson(), ","); // Field LastMonthSale
        $filterList = Concat($filterList, $this->PrName->AdvancedSearch->toJson(), ","); // Field PrName
        $filterList = Concat($filterList, $this->GrnQuantity->AdvancedSearch->toJson(), ","); // Field GrnQuantity
        $filterList = Concat($filterList, $this->Quantity->AdvancedSearch->toJson(), ","); // Field Quantity
        $filterList = Concat($filterList, $this->FreeQty->AdvancedSearch->toJson(), ","); // Field FreeQty
        $filterList = Concat($filterList, $this->BatchNo->AdvancedSearch->toJson(), ","); // Field BatchNo
        $filterList = Concat($filterList, $this->ExpDate->AdvancedSearch->toJson(), ","); // Field ExpDate
        $filterList = Concat($filterList, $this->HSN->AdvancedSearch->toJson(), ","); // Field HSN
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->PUnit->AdvancedSearch->toJson(), ","); // Field PUnit
        $filterList = Concat($filterList, $this->SUnit->AdvancedSearch->toJson(), ","); // Field SUnit
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->PurValue->AdvancedSearch->toJson(), ","); // Field PurValue
        $filterList = Concat($filterList, $this->Disc->AdvancedSearch->toJson(), ","); // Field Disc
        $filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
        $filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
        $filterList = Concat($filterList, $this->PTax->AdvancedSearch->toJson(), ","); // Field PTax
        $filterList = Concat($filterList, $this->ItemValue->AdvancedSearch->toJson(), ","); // Field ItemValue
        $filterList = Concat($filterList, $this->SalTax->AdvancedSearch->toJson(), ","); // Field SalTax
        $filterList = Concat($filterList, $this->PurRate->AdvancedSearch->toJson(), ","); // Field PurRate
        $filterList = Concat($filterList, $this->SalRate->AdvancedSearch->toJson(), ","); // Field SalRate
        $filterList = Concat($filterList, $this->Discount->AdvancedSearch->toJson(), ","); // Field Discount
        $filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
        $filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
        $filterList = Concat($filterList, $this->Pack->AdvancedSearch->toJson(), ","); // Field Pack
        $filterList = Concat($filterList, $this->GrnMRP->AdvancedSearch->toJson(), ","); // Field GrnMRP
        $filterList = Concat($filterList, $this->trid->AdvancedSearch->toJson(), ","); // Field trid
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->CreatedBy->AdvancedSearch->toJson(), ","); // Field CreatedBy
        $filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
        $filterList = Concat($filterList, $this->ModifiedBy->AdvancedSearch->toJson(), ","); // Field ModifiedBy
        $filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
        $filterList = Concat($filterList, $this->grncreatedby->AdvancedSearch->toJson(), ","); // Field grncreatedby
        $filterList = Concat($filterList, $this->grncreatedDateTime->AdvancedSearch->toJson(), ","); // Field grncreatedDateTime
        $filterList = Concat($filterList, $this->grnModifiedby->AdvancedSearch->toJson(), ","); // Field grnModifiedby
        $filterList = Concat($filterList, $this->grnModifiedDateTime->AdvancedSearch->toJson(), ","); // Field grnModifiedDateTime
        $filterList = Concat($filterList, $this->Received->AdvancedSearch->toJson(), ","); // Field Received
        $filterList = Concat($filterList, $this->BillDate->AdvancedSearch->toJson(), ","); // Field BillDate
        $filterList = Concat($filterList, $this->CurStock->AdvancedSearch->toJson(), ","); // Field CurStock
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacytransferlistsrch", $filters);
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

        // Field ORDNO
        $this->ORDNO->AdvancedSearch->SearchValue = @$filter["x_ORDNO"];
        $this->ORDNO->AdvancedSearch->SearchOperator = @$filter["z_ORDNO"];
        $this->ORDNO->AdvancedSearch->SearchCondition = @$filter["v_ORDNO"];
        $this->ORDNO->AdvancedSearch->SearchValue2 = @$filter["y_ORDNO"];
        $this->ORDNO->AdvancedSearch->SearchOperator2 = @$filter["w_ORDNO"];
        $this->ORDNO->AdvancedSearch->save();

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

        // Field QTY
        $this->QTY->AdvancedSearch->SearchValue = @$filter["x_QTY"];
        $this->QTY->AdvancedSearch->SearchOperator = @$filter["z_QTY"];
        $this->QTY->AdvancedSearch->SearchCondition = @$filter["v_QTY"];
        $this->QTY->AdvancedSearch->SearchValue2 = @$filter["y_QTY"];
        $this->QTY->AdvancedSearch->SearchOperator2 = @$filter["w_QTY"];
        $this->QTY->AdvancedSearch->save();

        // Field DT
        $this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
        $this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
        $this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
        $this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
        $this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
        $this->DT->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field YM
        $this->YM->AdvancedSearch->SearchValue = @$filter["x_YM"];
        $this->YM->AdvancedSearch->SearchOperator = @$filter["z_YM"];
        $this->YM->AdvancedSearch->SearchCondition = @$filter["v_YM"];
        $this->YM->AdvancedSearch->SearchValue2 = @$filter["y_YM"];
        $this->YM->AdvancedSearch->SearchOperator2 = @$filter["w_YM"];
        $this->YM->AdvancedSearch->save();

        // Field Stock
        $this->Stock->AdvancedSearch->SearchValue = @$filter["x_Stock"];
        $this->Stock->AdvancedSearch->SearchOperator = @$filter["z_Stock"];
        $this->Stock->AdvancedSearch->SearchCondition = @$filter["v_Stock"];
        $this->Stock->AdvancedSearch->SearchValue2 = @$filter["y_Stock"];
        $this->Stock->AdvancedSearch->SearchOperator2 = @$filter["w_Stock"];
        $this->Stock->AdvancedSearch->save();

        // Field Printcheck
        $this->Printcheck->AdvancedSearch->SearchValue = @$filter["x_Printcheck"];
        $this->Printcheck->AdvancedSearch->SearchOperator = @$filter["z_Printcheck"];
        $this->Printcheck->AdvancedSearch->SearchCondition = @$filter["v_Printcheck"];
        $this->Printcheck->AdvancedSearch->SearchValue2 = @$filter["y_Printcheck"];
        $this->Printcheck->AdvancedSearch->SearchOperator2 = @$filter["w_Printcheck"];
        $this->Printcheck->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field grnid
        $this->grnid->AdvancedSearch->SearchValue = @$filter["x_grnid"];
        $this->grnid->AdvancedSearch->SearchOperator = @$filter["z_grnid"];
        $this->grnid->AdvancedSearch->SearchCondition = @$filter["v_grnid"];
        $this->grnid->AdvancedSearch->SearchValue2 = @$filter["y_grnid"];
        $this->grnid->AdvancedSearch->SearchOperator2 = @$filter["w_grnid"];
        $this->grnid->AdvancedSearch->save();

        // Field poid
        $this->poid->AdvancedSearch->SearchValue = @$filter["x_poid"];
        $this->poid->AdvancedSearch->SearchOperator = @$filter["z_poid"];
        $this->poid->AdvancedSearch->SearchCondition = @$filter["v_poid"];
        $this->poid->AdvancedSearch->SearchValue2 = @$filter["y_poid"];
        $this->poid->AdvancedSearch->SearchOperator2 = @$filter["w_poid"];
        $this->poid->AdvancedSearch->save();

        // Field LastMonthSale
        $this->LastMonthSale->AdvancedSearch->SearchValue = @$filter["x_LastMonthSale"];
        $this->LastMonthSale->AdvancedSearch->SearchOperator = @$filter["z_LastMonthSale"];
        $this->LastMonthSale->AdvancedSearch->SearchCondition = @$filter["v_LastMonthSale"];
        $this->LastMonthSale->AdvancedSearch->SearchValue2 = @$filter["y_LastMonthSale"];
        $this->LastMonthSale->AdvancedSearch->SearchOperator2 = @$filter["w_LastMonthSale"];
        $this->LastMonthSale->AdvancedSearch->save();

        // Field PrName
        $this->PrName->AdvancedSearch->SearchValue = @$filter["x_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator = @$filter["z_PrName"];
        $this->PrName->AdvancedSearch->SearchCondition = @$filter["v_PrName"];
        $this->PrName->AdvancedSearch->SearchValue2 = @$filter["y_PrName"];
        $this->PrName->AdvancedSearch->SearchOperator2 = @$filter["w_PrName"];
        $this->PrName->AdvancedSearch->save();

        // Field GrnQuantity
        $this->GrnQuantity->AdvancedSearch->SearchValue = @$filter["x_GrnQuantity"];
        $this->GrnQuantity->AdvancedSearch->SearchOperator = @$filter["z_GrnQuantity"];
        $this->GrnQuantity->AdvancedSearch->SearchCondition = @$filter["v_GrnQuantity"];
        $this->GrnQuantity->AdvancedSearch->SearchValue2 = @$filter["y_GrnQuantity"];
        $this->GrnQuantity->AdvancedSearch->SearchOperator2 = @$filter["w_GrnQuantity"];
        $this->GrnQuantity->AdvancedSearch->save();

        // Field Quantity
        $this->Quantity->AdvancedSearch->SearchValue = @$filter["x_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator = @$filter["z_Quantity"];
        $this->Quantity->AdvancedSearch->SearchCondition = @$filter["v_Quantity"];
        $this->Quantity->AdvancedSearch->SearchValue2 = @$filter["y_Quantity"];
        $this->Quantity->AdvancedSearch->SearchOperator2 = @$filter["w_Quantity"];
        $this->Quantity->AdvancedSearch->save();

        // Field FreeQty
        $this->FreeQty->AdvancedSearch->SearchValue = @$filter["x_FreeQty"];
        $this->FreeQty->AdvancedSearch->SearchOperator = @$filter["z_FreeQty"];
        $this->FreeQty->AdvancedSearch->SearchCondition = @$filter["v_FreeQty"];
        $this->FreeQty->AdvancedSearch->SearchValue2 = @$filter["y_FreeQty"];
        $this->FreeQty->AdvancedSearch->SearchOperator2 = @$filter["w_FreeQty"];
        $this->FreeQty->AdvancedSearch->save();

        // Field BatchNo
        $this->BatchNo->AdvancedSearch->SearchValue = @$filter["x_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchOperator = @$filter["z_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchCondition = @$filter["v_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchValue2 = @$filter["y_BatchNo"];
        $this->BatchNo->AdvancedSearch->SearchOperator2 = @$filter["w_BatchNo"];
        $this->BatchNo->AdvancedSearch->save();

        // Field ExpDate
        $this->ExpDate->AdvancedSearch->SearchValue = @$filter["x_ExpDate"];
        $this->ExpDate->AdvancedSearch->SearchOperator = @$filter["z_ExpDate"];
        $this->ExpDate->AdvancedSearch->SearchCondition = @$filter["v_ExpDate"];
        $this->ExpDate->AdvancedSearch->SearchValue2 = @$filter["y_ExpDate"];
        $this->ExpDate->AdvancedSearch->SearchOperator2 = @$filter["w_ExpDate"];
        $this->ExpDate->AdvancedSearch->save();

        // Field HSN
        $this->HSN->AdvancedSearch->SearchValue = @$filter["x_HSN"];
        $this->HSN->AdvancedSearch->SearchOperator = @$filter["z_HSN"];
        $this->HSN->AdvancedSearch->SearchCondition = @$filter["v_HSN"];
        $this->HSN->AdvancedSearch->SearchValue2 = @$filter["y_HSN"];
        $this->HSN->AdvancedSearch->SearchOperator2 = @$filter["w_HSN"];
        $this->HSN->AdvancedSearch->save();

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

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

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field PurValue
        $this->PurValue->AdvancedSearch->SearchValue = @$filter["x_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator = @$filter["z_PurValue"];
        $this->PurValue->AdvancedSearch->SearchCondition = @$filter["v_PurValue"];
        $this->PurValue->AdvancedSearch->SearchValue2 = @$filter["y_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurValue"];
        $this->PurValue->AdvancedSearch->save();

        // Field Disc
        $this->Disc->AdvancedSearch->SearchValue = @$filter["x_Disc"];
        $this->Disc->AdvancedSearch->SearchOperator = @$filter["z_Disc"];
        $this->Disc->AdvancedSearch->SearchCondition = @$filter["v_Disc"];
        $this->Disc->AdvancedSearch->SearchValue2 = @$filter["y_Disc"];
        $this->Disc->AdvancedSearch->SearchOperator2 = @$filter["w_Disc"];
        $this->Disc->AdvancedSearch->save();

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

        // Field PTax
        $this->PTax->AdvancedSearch->SearchValue = @$filter["x_PTax"];
        $this->PTax->AdvancedSearch->SearchOperator = @$filter["z_PTax"];
        $this->PTax->AdvancedSearch->SearchCondition = @$filter["v_PTax"];
        $this->PTax->AdvancedSearch->SearchValue2 = @$filter["y_PTax"];
        $this->PTax->AdvancedSearch->SearchOperator2 = @$filter["w_PTax"];
        $this->PTax->AdvancedSearch->save();

        // Field ItemValue
        $this->ItemValue->AdvancedSearch->SearchValue = @$filter["x_ItemValue"];
        $this->ItemValue->AdvancedSearch->SearchOperator = @$filter["z_ItemValue"];
        $this->ItemValue->AdvancedSearch->SearchCondition = @$filter["v_ItemValue"];
        $this->ItemValue->AdvancedSearch->SearchValue2 = @$filter["y_ItemValue"];
        $this->ItemValue->AdvancedSearch->SearchOperator2 = @$filter["w_ItemValue"];
        $this->ItemValue->AdvancedSearch->save();

        // Field SalTax
        $this->SalTax->AdvancedSearch->SearchValue = @$filter["x_SalTax"];
        $this->SalTax->AdvancedSearch->SearchOperator = @$filter["z_SalTax"];
        $this->SalTax->AdvancedSearch->SearchCondition = @$filter["v_SalTax"];
        $this->SalTax->AdvancedSearch->SearchValue2 = @$filter["y_SalTax"];
        $this->SalTax->AdvancedSearch->SearchOperator2 = @$filter["w_SalTax"];
        $this->SalTax->AdvancedSearch->save();

        // Field PurRate
        $this->PurRate->AdvancedSearch->SearchValue = @$filter["x_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator = @$filter["z_PurRate"];
        $this->PurRate->AdvancedSearch->SearchCondition = @$filter["v_PurRate"];
        $this->PurRate->AdvancedSearch->SearchValue2 = @$filter["y_PurRate"];
        $this->PurRate->AdvancedSearch->SearchOperator2 = @$filter["w_PurRate"];
        $this->PurRate->AdvancedSearch->save();

        // Field SalRate
        $this->SalRate->AdvancedSearch->SearchValue = @$filter["x_SalRate"];
        $this->SalRate->AdvancedSearch->SearchOperator = @$filter["z_SalRate"];
        $this->SalRate->AdvancedSearch->SearchCondition = @$filter["v_SalRate"];
        $this->SalRate->AdvancedSearch->SearchValue2 = @$filter["y_SalRate"];
        $this->SalRate->AdvancedSearch->SearchOperator2 = @$filter["w_SalRate"];
        $this->SalRate->AdvancedSearch->save();

        // Field Discount
        $this->Discount->AdvancedSearch->SearchValue = @$filter["x_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator = @$filter["z_Discount"];
        $this->Discount->AdvancedSearch->SearchCondition = @$filter["v_Discount"];
        $this->Discount->AdvancedSearch->SearchValue2 = @$filter["y_Discount"];
        $this->Discount->AdvancedSearch->SearchOperator2 = @$filter["w_Discount"];
        $this->Discount->AdvancedSearch->save();

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

        // Field Pack
        $this->Pack->AdvancedSearch->SearchValue = @$filter["x_Pack"];
        $this->Pack->AdvancedSearch->SearchOperator = @$filter["z_Pack"];
        $this->Pack->AdvancedSearch->SearchCondition = @$filter["v_Pack"];
        $this->Pack->AdvancedSearch->SearchValue2 = @$filter["y_Pack"];
        $this->Pack->AdvancedSearch->SearchOperator2 = @$filter["w_Pack"];
        $this->Pack->AdvancedSearch->save();

        // Field GrnMRP
        $this->GrnMRP->AdvancedSearch->SearchValue = @$filter["x_GrnMRP"];
        $this->GrnMRP->AdvancedSearch->SearchOperator = @$filter["z_GrnMRP"];
        $this->GrnMRP->AdvancedSearch->SearchCondition = @$filter["v_GrnMRP"];
        $this->GrnMRP->AdvancedSearch->SearchValue2 = @$filter["y_GrnMRP"];
        $this->GrnMRP->AdvancedSearch->SearchOperator2 = @$filter["w_GrnMRP"];
        $this->GrnMRP->AdvancedSearch->save();

        // Field trid
        $this->trid->AdvancedSearch->SearchValue = @$filter["x_trid"];
        $this->trid->AdvancedSearch->SearchOperator = @$filter["z_trid"];
        $this->trid->AdvancedSearch->SearchCondition = @$filter["v_trid"];
        $this->trid->AdvancedSearch->SearchValue2 = @$filter["y_trid"];
        $this->trid->AdvancedSearch->SearchOperator2 = @$filter["w_trid"];
        $this->trid->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field CreatedBy
        $this->CreatedBy->AdvancedSearch->SearchValue = @$filter["x_CreatedBy"];
        $this->CreatedBy->AdvancedSearch->SearchOperator = @$filter["z_CreatedBy"];
        $this->CreatedBy->AdvancedSearch->SearchCondition = @$filter["v_CreatedBy"];
        $this->CreatedBy->AdvancedSearch->SearchValue2 = @$filter["y_CreatedBy"];
        $this->CreatedBy->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedBy"];
        $this->CreatedBy->AdvancedSearch->save();

        // Field CreatedDateTime
        $this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->save();

        // Field ModifiedBy
        $this->ModifiedBy->AdvancedSearch->SearchValue = @$filter["x_ModifiedBy"];
        $this->ModifiedBy->AdvancedSearch->SearchOperator = @$filter["z_ModifiedBy"];
        $this->ModifiedBy->AdvancedSearch->SearchCondition = @$filter["v_ModifiedBy"];
        $this->ModifiedBy->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedBy"];
        $this->ModifiedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedBy"];
        $this->ModifiedBy->AdvancedSearch->save();

        // Field ModifiedDateTime
        $this->ModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->save();

        // Field grncreatedby
        $this->grncreatedby->AdvancedSearch->SearchValue = @$filter["x_grncreatedby"];
        $this->grncreatedby->AdvancedSearch->SearchOperator = @$filter["z_grncreatedby"];
        $this->grncreatedby->AdvancedSearch->SearchCondition = @$filter["v_grncreatedby"];
        $this->grncreatedby->AdvancedSearch->SearchValue2 = @$filter["y_grncreatedby"];
        $this->grncreatedby->AdvancedSearch->SearchOperator2 = @$filter["w_grncreatedby"];
        $this->grncreatedby->AdvancedSearch->save();

        // Field grncreatedDateTime
        $this->grncreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_grncreatedDateTime"];
        $this->grncreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_grncreatedDateTime"];
        $this->grncreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_grncreatedDateTime"];
        $this->grncreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_grncreatedDateTime"];
        $this->grncreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_grncreatedDateTime"];
        $this->grncreatedDateTime->AdvancedSearch->save();

        // Field grnModifiedby
        $this->grnModifiedby->AdvancedSearch->SearchValue = @$filter["x_grnModifiedby"];
        $this->grnModifiedby->AdvancedSearch->SearchOperator = @$filter["z_grnModifiedby"];
        $this->grnModifiedby->AdvancedSearch->SearchCondition = @$filter["v_grnModifiedby"];
        $this->grnModifiedby->AdvancedSearch->SearchValue2 = @$filter["y_grnModifiedby"];
        $this->grnModifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_grnModifiedby"];
        $this->grnModifiedby->AdvancedSearch->save();

        // Field grnModifiedDateTime
        $this->grnModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_grnModifiedDateTime"];
        $this->grnModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_grnModifiedDateTime"];
        $this->grnModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_grnModifiedDateTime"];
        $this->grnModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_grnModifiedDateTime"];
        $this->grnModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_grnModifiedDateTime"];
        $this->grnModifiedDateTime->AdvancedSearch->save();

        // Field Received
        $this->Received->AdvancedSearch->SearchValue = @$filter["x_Received"];
        $this->Received->AdvancedSearch->SearchOperator = @$filter["z_Received"];
        $this->Received->AdvancedSearch->SearchCondition = @$filter["v_Received"];
        $this->Received->AdvancedSearch->SearchValue2 = @$filter["y_Received"];
        $this->Received->AdvancedSearch->SearchOperator2 = @$filter["w_Received"];
        $this->Received->AdvancedSearch->save();

        // Field BillDate
        $this->BillDate->AdvancedSearch->SearchValue = @$filter["x_BillDate"];
        $this->BillDate->AdvancedSearch->SearchOperator = @$filter["z_BillDate"];
        $this->BillDate->AdvancedSearch->SearchCondition = @$filter["v_BillDate"];
        $this->BillDate->AdvancedSearch->SearchValue2 = @$filter["y_BillDate"];
        $this->BillDate->AdvancedSearch->SearchOperator2 = @$filter["w_BillDate"];
        $this->BillDate->AdvancedSearch->save();

        // Field CurStock
        $this->CurStock->AdvancedSearch->SearchValue = @$filter["x_CurStock"];
        $this->CurStock->AdvancedSearch->SearchOperator = @$filter["z_CurStock"];
        $this->CurStock->AdvancedSearch->SearchCondition = @$filter["v_CurStock"];
        $this->CurStock->AdvancedSearch->SearchValue2 = @$filter["y_CurStock"];
        $this->CurStock->AdvancedSearch->SearchOperator2 = @$filter["w_CurStock"];
        $this->CurStock->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->ORDNO, $default, false); // ORDNO
        $this->buildSearchSql($where, $this->BRCODE, $default, false); // BRCODE
        $this->buildSearchSql($where, $this->PRC, $default, false); // PRC
        $this->buildSearchSql($where, $this->QTY, $default, false); // QTY
        $this->buildSearchSql($where, $this->DT, $default, false); // DT
        $this->buildSearchSql($where, $this->PC, $default, false); // PC
        $this->buildSearchSql($where, $this->YM, $default, false); // YM
        $this->buildSearchSql($where, $this->Stock, $default, false); // Stock
        $this->buildSearchSql($where, $this->Printcheck, $default, false); // Printcheck
        $this->buildSearchSql($where, $this->id, $default, false); // id
        $this->buildSearchSql($where, $this->grnid, $default, false); // grnid
        $this->buildSearchSql($where, $this->poid, $default, false); // poid
        $this->buildSearchSql($where, $this->LastMonthSale, $default, false); // LastMonthSale
        $this->buildSearchSql($where, $this->PrName, $default, false); // PrName
        $this->buildSearchSql($where, $this->GrnQuantity, $default, false); // GrnQuantity
        $this->buildSearchSql($where, $this->Quantity, $default, false); // Quantity
        $this->buildSearchSql($where, $this->FreeQty, $default, false); // FreeQty
        $this->buildSearchSql($where, $this->BatchNo, $default, false); // BatchNo
        $this->buildSearchSql($where, $this->ExpDate, $default, false); // ExpDate
        $this->buildSearchSql($where, $this->HSN, $default, false); // HSN
        $this->buildSearchSql($where, $this->MFRCODE, $default, false); // MFRCODE
        $this->buildSearchSql($where, $this->PUnit, $default, false); // PUnit
        $this->buildSearchSql($where, $this->SUnit, $default, false); // SUnit
        $this->buildSearchSql($where, $this->MRP, $default, false); // MRP
        $this->buildSearchSql($where, $this->PurValue, $default, false); // PurValue
        $this->buildSearchSql($where, $this->Disc, $default, false); // Disc
        $this->buildSearchSql($where, $this->PSGST, $default, false); // PSGST
        $this->buildSearchSql($where, $this->PCGST, $default, false); // PCGST
        $this->buildSearchSql($where, $this->PTax, $default, false); // PTax
        $this->buildSearchSql($where, $this->ItemValue, $default, false); // ItemValue
        $this->buildSearchSql($where, $this->SalTax, $default, false); // SalTax
        $this->buildSearchSql($where, $this->PurRate, $default, false); // PurRate
        $this->buildSearchSql($where, $this->SalRate, $default, false); // SalRate
        $this->buildSearchSql($where, $this->Discount, $default, false); // Discount
        $this->buildSearchSql($where, $this->SSGST, $default, false); // SSGST
        $this->buildSearchSql($where, $this->SCGST, $default, false); // SCGST
        $this->buildSearchSql($where, $this->Pack, $default, false); // Pack
        $this->buildSearchSql($where, $this->GrnMRP, $default, false); // GrnMRP
        $this->buildSearchSql($where, $this->trid, $default, false); // trid
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID
        $this->buildSearchSql($where, $this->CreatedBy, $default, false); // CreatedBy
        $this->buildSearchSql($where, $this->CreatedDateTime, $default, false); // CreatedDateTime
        $this->buildSearchSql($where, $this->ModifiedBy, $default, false); // ModifiedBy
        $this->buildSearchSql($where, $this->ModifiedDateTime, $default, false); // ModifiedDateTime
        $this->buildSearchSql($where, $this->grncreatedby, $default, false); // grncreatedby
        $this->buildSearchSql($where, $this->grncreatedDateTime, $default, false); // grncreatedDateTime
        $this->buildSearchSql($where, $this->grnModifiedby, $default, false); // grnModifiedby
        $this->buildSearchSql($where, $this->grnModifiedDateTime, $default, false); // grnModifiedDateTime
        $this->buildSearchSql($where, $this->Received, $default, false); // Received
        $this->buildSearchSql($where, $this->BillDate, $default, false); // BillDate
        $this->buildSearchSql($where, $this->CurStock, $default, false); // CurStock

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->ORDNO->AdvancedSearch->save(); // ORDNO
            $this->BRCODE->AdvancedSearch->save(); // BRCODE
            $this->PRC->AdvancedSearch->save(); // PRC
            $this->QTY->AdvancedSearch->save(); // QTY
            $this->DT->AdvancedSearch->save(); // DT
            $this->PC->AdvancedSearch->save(); // PC
            $this->YM->AdvancedSearch->save(); // YM
            $this->Stock->AdvancedSearch->save(); // Stock
            $this->Printcheck->AdvancedSearch->save(); // Printcheck
            $this->id->AdvancedSearch->save(); // id
            $this->grnid->AdvancedSearch->save(); // grnid
            $this->poid->AdvancedSearch->save(); // poid
            $this->LastMonthSale->AdvancedSearch->save(); // LastMonthSale
            $this->PrName->AdvancedSearch->save(); // PrName
            $this->GrnQuantity->AdvancedSearch->save(); // GrnQuantity
            $this->Quantity->AdvancedSearch->save(); // Quantity
            $this->FreeQty->AdvancedSearch->save(); // FreeQty
            $this->BatchNo->AdvancedSearch->save(); // BatchNo
            $this->ExpDate->AdvancedSearch->save(); // ExpDate
            $this->HSN->AdvancedSearch->save(); // HSN
            $this->MFRCODE->AdvancedSearch->save(); // MFRCODE
            $this->PUnit->AdvancedSearch->save(); // PUnit
            $this->SUnit->AdvancedSearch->save(); // SUnit
            $this->MRP->AdvancedSearch->save(); // MRP
            $this->PurValue->AdvancedSearch->save(); // PurValue
            $this->Disc->AdvancedSearch->save(); // Disc
            $this->PSGST->AdvancedSearch->save(); // PSGST
            $this->PCGST->AdvancedSearch->save(); // PCGST
            $this->PTax->AdvancedSearch->save(); // PTax
            $this->ItemValue->AdvancedSearch->save(); // ItemValue
            $this->SalTax->AdvancedSearch->save(); // SalTax
            $this->PurRate->AdvancedSearch->save(); // PurRate
            $this->SalRate->AdvancedSearch->save(); // SalRate
            $this->Discount->AdvancedSearch->save(); // Discount
            $this->SSGST->AdvancedSearch->save(); // SSGST
            $this->SCGST->AdvancedSearch->save(); // SCGST
            $this->Pack->AdvancedSearch->save(); // Pack
            $this->GrnMRP->AdvancedSearch->save(); // GrnMRP
            $this->trid->AdvancedSearch->save(); // trid
            $this->HospID->AdvancedSearch->save(); // HospID
            $this->CreatedBy->AdvancedSearch->save(); // CreatedBy
            $this->CreatedDateTime->AdvancedSearch->save(); // CreatedDateTime
            $this->ModifiedBy->AdvancedSearch->save(); // ModifiedBy
            $this->ModifiedDateTime->AdvancedSearch->save(); // ModifiedDateTime
            $this->grncreatedby->AdvancedSearch->save(); // grncreatedby
            $this->grncreatedDateTime->AdvancedSearch->save(); // grncreatedDateTime
            $this->grnModifiedby->AdvancedSearch->save(); // grnModifiedby
            $this->grnModifiedDateTime->AdvancedSearch->save(); // grnModifiedDateTime
            $this->Received->AdvancedSearch->save(); // Received
            $this->BillDate->AdvancedSearch->save(); // BillDate
            $this->CurStock->AdvancedSearch->save(); // CurStock
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
        $this->buildBasicSearchSql($where, $this->ORDNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->YM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Printcheck, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BatchNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HSN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pack, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Received, $arKeywords, $type);
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
        if ($this->ORDNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PRC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->QTY->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PC->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->YM->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Stock->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Printcheck->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->grnid->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->poid->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LastMonthSale->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PrName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GrnQuantity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Quantity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FreeQty->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BatchNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ExpDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HSN->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MFRCODE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PUnit->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SUnit->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MRP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Disc->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PTax->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ItemValue->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SalTax->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PurRate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SalRate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Discount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SSGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SCGST->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Pack->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GrnMRP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->trid->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CreatedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ModifiedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ModifiedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->grncreatedby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->grncreatedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->grnModifiedby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->grnModifiedDateTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Received->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CurStock->AdvancedSearch->issetSession()) {
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
                $this->ORDNO->AdvancedSearch->unsetSession();
                $this->BRCODE->AdvancedSearch->unsetSession();
                $this->PRC->AdvancedSearch->unsetSession();
                $this->QTY->AdvancedSearch->unsetSession();
                $this->DT->AdvancedSearch->unsetSession();
                $this->PC->AdvancedSearch->unsetSession();
                $this->YM->AdvancedSearch->unsetSession();
                $this->Stock->AdvancedSearch->unsetSession();
                $this->Printcheck->AdvancedSearch->unsetSession();
                $this->id->AdvancedSearch->unsetSession();
                $this->grnid->AdvancedSearch->unsetSession();
                $this->poid->AdvancedSearch->unsetSession();
                $this->LastMonthSale->AdvancedSearch->unsetSession();
                $this->PrName->AdvancedSearch->unsetSession();
                $this->GrnQuantity->AdvancedSearch->unsetSession();
                $this->Quantity->AdvancedSearch->unsetSession();
                $this->FreeQty->AdvancedSearch->unsetSession();
                $this->BatchNo->AdvancedSearch->unsetSession();
                $this->ExpDate->AdvancedSearch->unsetSession();
                $this->HSN->AdvancedSearch->unsetSession();
                $this->MFRCODE->AdvancedSearch->unsetSession();
                $this->PUnit->AdvancedSearch->unsetSession();
                $this->SUnit->AdvancedSearch->unsetSession();
                $this->MRP->AdvancedSearch->unsetSession();
                $this->PurValue->AdvancedSearch->unsetSession();
                $this->Disc->AdvancedSearch->unsetSession();
                $this->PSGST->AdvancedSearch->unsetSession();
                $this->PCGST->AdvancedSearch->unsetSession();
                $this->PTax->AdvancedSearch->unsetSession();
                $this->ItemValue->AdvancedSearch->unsetSession();
                $this->SalTax->AdvancedSearch->unsetSession();
                $this->PurRate->AdvancedSearch->unsetSession();
                $this->SalRate->AdvancedSearch->unsetSession();
                $this->Discount->AdvancedSearch->unsetSession();
                $this->SSGST->AdvancedSearch->unsetSession();
                $this->SCGST->AdvancedSearch->unsetSession();
                $this->Pack->AdvancedSearch->unsetSession();
                $this->GrnMRP->AdvancedSearch->unsetSession();
                $this->trid->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
                $this->CreatedBy->AdvancedSearch->unsetSession();
                $this->CreatedDateTime->AdvancedSearch->unsetSession();
                $this->ModifiedBy->AdvancedSearch->unsetSession();
                $this->ModifiedDateTime->AdvancedSearch->unsetSession();
                $this->grncreatedby->AdvancedSearch->unsetSession();
                $this->grncreatedDateTime->AdvancedSearch->unsetSession();
                $this->grnModifiedby->AdvancedSearch->unsetSession();
                $this->grnModifiedDateTime->AdvancedSearch->unsetSession();
                $this->Received->AdvancedSearch->unsetSession();
                $this->BillDate->AdvancedSearch->unsetSession();
                $this->CurStock->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->ORDNO->AdvancedSearch->load();
                $this->BRCODE->AdvancedSearch->load();
                $this->PRC->AdvancedSearch->load();
                $this->QTY->AdvancedSearch->load();
                $this->DT->AdvancedSearch->load();
                $this->PC->AdvancedSearch->load();
                $this->YM->AdvancedSearch->load();
                $this->Stock->AdvancedSearch->load();
                $this->Printcheck->AdvancedSearch->load();
                $this->id->AdvancedSearch->load();
                $this->grnid->AdvancedSearch->load();
                $this->poid->AdvancedSearch->load();
                $this->LastMonthSale->AdvancedSearch->load();
                $this->PrName->AdvancedSearch->load();
                $this->GrnQuantity->AdvancedSearch->load();
                $this->Quantity->AdvancedSearch->load();
                $this->FreeQty->AdvancedSearch->load();
                $this->BatchNo->AdvancedSearch->load();
                $this->ExpDate->AdvancedSearch->load();
                $this->HSN->AdvancedSearch->load();
                $this->MFRCODE->AdvancedSearch->load();
                $this->PUnit->AdvancedSearch->load();
                $this->SUnit->AdvancedSearch->load();
                $this->MRP->AdvancedSearch->load();
                $this->PurValue->AdvancedSearch->load();
                $this->Disc->AdvancedSearch->load();
                $this->PSGST->AdvancedSearch->load();
                $this->PCGST->AdvancedSearch->load();
                $this->PTax->AdvancedSearch->load();
                $this->ItemValue->AdvancedSearch->load();
                $this->SalTax->AdvancedSearch->load();
                $this->PurRate->AdvancedSearch->load();
                $this->SalRate->AdvancedSearch->load();
                $this->Discount->AdvancedSearch->load();
                $this->SSGST->AdvancedSearch->load();
                $this->SCGST->AdvancedSearch->load();
                $this->Pack->AdvancedSearch->load();
                $this->GrnMRP->AdvancedSearch->load();
                $this->trid->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
                $this->CreatedBy->AdvancedSearch->load();
                $this->CreatedDateTime->AdvancedSearch->load();
                $this->ModifiedBy->AdvancedSearch->load();
                $this->ModifiedDateTime->AdvancedSearch->load();
                $this->grncreatedby->AdvancedSearch->load();
                $this->grncreatedDateTime->AdvancedSearch->load();
                $this->grnModifiedby->AdvancedSearch->load();
                $this->grnModifiedDateTime->AdvancedSearch->load();
                $this->Received->AdvancedSearch->load();
                $this->BillDate->AdvancedSearch->load();
                $this->CurStock->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->ORDNO); // ORDNO
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->LastMonthSale); // LastMonthSale
            $this->updateSort($this->PrName); // PrName
            $this->updateSort($this->Quantity); // Quantity
            $this->updateSort($this->BatchNo); // BatchNo
            $this->updateSort($this->ExpDate); // ExpDate
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->ItemValue); // ItemValue
            $this->updateSort($this->trid); // trid
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->grncreatedby); // grncreatedby
            $this->updateSort($this->grncreatedDateTime); // grncreatedDateTime
            $this->updateSort($this->grnModifiedby); // grnModifiedby
            $this->updateSort($this->grnModifiedDateTime); // grnModifiedDateTime
            $this->updateSort($this->BillDate); // BillDate
            $this->updateSort($this->CurStock); // CurStock
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
                        $this->trid->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->ORDNO->setSort("");
                $this->BRCODE->setSort("");
                $this->PRC->setSort("");
                $this->QTY->setSort("");
                $this->DT->setSort("");
                $this->PC->setSort("");
                $this->YM->setSort("");
                $this->Stock->setSort("");
                $this->Printcheck->setSort("");
                $this->id->setSort("");
                $this->grnid->setSort("");
                $this->poid->setSort("");
                $this->LastMonthSale->setSort("");
                $this->PrName->setSort("");
                $this->GrnQuantity->setSort("");
                $this->Quantity->setSort("");
                $this->FreeQty->setSort("");
                $this->BatchNo->setSort("");
                $this->ExpDate->setSort("");
                $this->HSN->setSort("");
                $this->MFRCODE->setSort("");
                $this->PUnit->setSort("");
                $this->SUnit->setSort("");
                $this->MRP->setSort("");
                $this->PurValue->setSort("");
                $this->Disc->setSort("");
                $this->PSGST->setSort("");
                $this->PCGST->setSort("");
                $this->PTax->setSort("");
                $this->ItemValue->setSort("");
                $this->SalTax->setSort("");
                $this->PurRate->setSort("");
                $this->SalRate->setSort("");
                $this->Discount->setSort("");
                $this->SSGST->setSort("");
                $this->SCGST->setSort("");
                $this->Pack->setSort("");
                $this->GrnMRP->setSort("");
                $this->trid->setSort("");
                $this->HospID->setSort("");
                $this->CreatedBy->setSort("");
                $this->CreatedDateTime->setSort("");
                $this->ModifiedBy->setSort("");
                $this->ModifiedDateTime->setSort("");
                $this->grncreatedby->setSort("");
                $this->grncreatedDateTime->setSort("");
                $this->grnModifiedby->setSort("");
                $this->grnModifiedDateTime->setSort("");
                $this->Received->setSort("");
                $this->BillDate->setSort("");
                $this->CurStock->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacytransferlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacytransferlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_pharmacytransferlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->ORDNO->CurrentValue = null;
        $this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->QTY->CurrentValue = null;
        $this->QTY->OldValue = $this->QTY->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->Stock->CurrentValue = null;
        $this->Stock->OldValue = $this->Stock->CurrentValue;
        $this->Printcheck->CurrentValue = null;
        $this->Printcheck->OldValue = $this->Printcheck->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->grnid->CurrentValue = null;
        $this->grnid->OldValue = $this->grnid->CurrentValue;
        $this->poid->CurrentValue = null;
        $this->poid->OldValue = $this->poid->CurrentValue;
        $this->LastMonthSale->CurrentValue = null;
        $this->LastMonthSale->OldValue = $this->LastMonthSale->CurrentValue;
        $this->PrName->CurrentValue = null;
        $this->PrName->OldValue = $this->PrName->CurrentValue;
        $this->GrnQuantity->CurrentValue = null;
        $this->GrnQuantity->OldValue = $this->GrnQuantity->CurrentValue;
        $this->Quantity->CurrentValue = null;
        $this->Quantity->OldValue = $this->Quantity->CurrentValue;
        $this->FreeQty->CurrentValue = null;
        $this->FreeQty->OldValue = $this->FreeQty->CurrentValue;
        $this->BatchNo->CurrentValue = null;
        $this->BatchNo->OldValue = $this->BatchNo->CurrentValue;
        $this->ExpDate->CurrentValue = null;
        $this->ExpDate->OldValue = $this->ExpDate->CurrentValue;
        $this->HSN->CurrentValue = null;
        $this->HSN->OldValue = $this->HSN->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->PUnit->CurrentValue = 0;
        $this->PUnit->OldValue = $this->PUnit->CurrentValue;
        $this->SUnit->CurrentValue = 0;
        $this->SUnit->OldValue = $this->SUnit->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->PurValue->CurrentValue = null;
        $this->PurValue->OldValue = $this->PurValue->CurrentValue;
        $this->Disc->CurrentValue = null;
        $this->Disc->OldValue = $this->Disc->CurrentValue;
        $this->PSGST->CurrentValue = null;
        $this->PSGST->OldValue = $this->PSGST->CurrentValue;
        $this->PCGST->CurrentValue = null;
        $this->PCGST->OldValue = $this->PCGST->CurrentValue;
        $this->PTax->CurrentValue = null;
        $this->PTax->OldValue = $this->PTax->CurrentValue;
        $this->ItemValue->CurrentValue = null;
        $this->ItemValue->OldValue = $this->ItemValue->CurrentValue;
        $this->SalTax->CurrentValue = null;
        $this->SalTax->OldValue = $this->SalTax->CurrentValue;
        $this->PurRate->CurrentValue = null;
        $this->PurRate->OldValue = $this->PurRate->CurrentValue;
        $this->SalRate->CurrentValue = null;
        $this->SalRate->OldValue = $this->SalRate->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->SSGST->CurrentValue = null;
        $this->SSGST->OldValue = $this->SSGST->CurrentValue;
        $this->SCGST->CurrentValue = null;
        $this->SCGST->OldValue = $this->SCGST->CurrentValue;
        $this->Pack->CurrentValue = null;
        $this->Pack->OldValue = $this->Pack->CurrentValue;
        $this->GrnMRP->CurrentValue = null;
        $this->GrnMRP->OldValue = $this->GrnMRP->CurrentValue;
        $this->trid->CurrentValue = null;
        $this->trid->OldValue = $this->trid->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedDateTime->CurrentValue = null;
        $this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
        $this->grncreatedby->CurrentValue = null;
        $this->grncreatedby->OldValue = $this->grncreatedby->CurrentValue;
        $this->grncreatedDateTime->CurrentValue = null;
        $this->grncreatedDateTime->OldValue = $this->grncreatedDateTime->CurrentValue;
        $this->grnModifiedby->CurrentValue = null;
        $this->grnModifiedby->OldValue = $this->grnModifiedby->CurrentValue;
        $this->grnModifiedDateTime->CurrentValue = null;
        $this->grnModifiedDateTime->OldValue = $this->grnModifiedDateTime->CurrentValue;
        $this->Received->CurrentValue = null;
        $this->Received->OldValue = $this->Received->CurrentValue;
        $this->BillDate->CurrentValue = null;
        $this->BillDate->OldValue = $this->BillDate->CurrentValue;
        $this->CurStock->CurrentValue = null;
        $this->CurStock->OldValue = $this->CurStock->CurrentValue;
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

        // ORDNO
        if (!$this->isAddOrEdit() && $this->ORDNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ORDNO->AdvancedSearch->SearchValue != "" || $this->ORDNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PRC
        if (!$this->isAddOrEdit() && $this->PRC->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PRC->AdvancedSearch->SearchValue != "" || $this->PRC->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // QTY
        if (!$this->isAddOrEdit() && $this->QTY->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->QTY->AdvancedSearch->SearchValue != "" || $this->QTY->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DT
        if (!$this->isAddOrEdit() && $this->DT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DT->AdvancedSearch->SearchValue != "" || $this->DT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // YM
        if (!$this->isAddOrEdit() && $this->YM->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->YM->AdvancedSearch->SearchValue != "" || $this->YM->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Stock
        if (!$this->isAddOrEdit() && $this->Stock->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Stock->AdvancedSearch->SearchValue != "" || $this->Stock->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Printcheck
        if (!$this->isAddOrEdit() && $this->Printcheck->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Printcheck->AdvancedSearch->SearchValue != "" || $this->Printcheck->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // grnid
        if (!$this->isAddOrEdit() && $this->grnid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->grnid->AdvancedSearch->SearchValue != "" || $this->grnid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // poid
        if (!$this->isAddOrEdit() && $this->poid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->poid->AdvancedSearch->SearchValue != "" || $this->poid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LastMonthSale
        if (!$this->isAddOrEdit() && $this->LastMonthSale->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LastMonthSale->AdvancedSearch->SearchValue != "" || $this->LastMonthSale->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // GrnQuantity
        if (!$this->isAddOrEdit() && $this->GrnQuantity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GrnQuantity->AdvancedSearch->SearchValue != "" || $this->GrnQuantity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Quantity
        if (!$this->isAddOrEdit() && $this->Quantity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Quantity->AdvancedSearch->SearchValue != "" || $this->Quantity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FreeQty
        if (!$this->isAddOrEdit() && $this->FreeQty->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FreeQty->AdvancedSearch->SearchValue != "" || $this->FreeQty->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BatchNo
        if (!$this->isAddOrEdit() && $this->BatchNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BatchNo->AdvancedSearch->SearchValue != "" || $this->BatchNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ExpDate
        if (!$this->isAddOrEdit() && $this->ExpDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ExpDate->AdvancedSearch->SearchValue != "" || $this->ExpDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HSN
        if (!$this->isAddOrEdit() && $this->HSN->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HSN->AdvancedSearch->SearchValue != "" || $this->HSN->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // MRP
        if (!$this->isAddOrEdit() && $this->MRP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MRP->AdvancedSearch->SearchValue != "" || $this->MRP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Disc
        if (!$this->isAddOrEdit() && $this->Disc->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Disc->AdvancedSearch->SearchValue != "" || $this->Disc->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PTax
        if (!$this->isAddOrEdit() && $this->PTax->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PTax->AdvancedSearch->SearchValue != "" || $this->PTax->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ItemValue
        if (!$this->isAddOrEdit() && $this->ItemValue->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ItemValue->AdvancedSearch->SearchValue != "" || $this->ItemValue->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SalTax
        if (!$this->isAddOrEdit() && $this->SalTax->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SalTax->AdvancedSearch->SearchValue != "" || $this->SalTax->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // SalRate
        if (!$this->isAddOrEdit() && $this->SalRate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SalRate->AdvancedSearch->SearchValue != "" || $this->SalRate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Discount
        if (!$this->isAddOrEdit() && $this->Discount->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Discount->AdvancedSearch->SearchValue != "" || $this->Discount->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Pack
        if (!$this->isAddOrEdit() && $this->Pack->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Pack->AdvancedSearch->SearchValue != "" || $this->Pack->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GrnMRP
        if (!$this->isAddOrEdit() && $this->GrnMRP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GrnMRP->AdvancedSearch->SearchValue != "" || $this->GrnMRP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // trid
        if (!$this->isAddOrEdit() && $this->trid->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->trid->AdvancedSearch->SearchValue != "" || $this->trid->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // CreatedBy
        if (!$this->isAddOrEdit() && $this->CreatedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CreatedBy->AdvancedSearch->SearchValue != "" || $this->CreatedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CreatedDateTime
        if (!$this->isAddOrEdit() && $this->CreatedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CreatedDateTime->AdvancedSearch->SearchValue != "" || $this->CreatedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ModifiedBy
        if (!$this->isAddOrEdit() && $this->ModifiedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ModifiedBy->AdvancedSearch->SearchValue != "" || $this->ModifiedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ModifiedDateTime
        if (!$this->isAddOrEdit() && $this->ModifiedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ModifiedDateTime->AdvancedSearch->SearchValue != "" || $this->ModifiedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // grncreatedby
        if (!$this->isAddOrEdit() && $this->grncreatedby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->grncreatedby->AdvancedSearch->SearchValue != "" || $this->grncreatedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // grncreatedDateTime
        if (!$this->isAddOrEdit() && $this->grncreatedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->grncreatedDateTime->AdvancedSearch->SearchValue != "" || $this->grncreatedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // grnModifiedby
        if (!$this->isAddOrEdit() && $this->grnModifiedby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->grnModifiedby->AdvancedSearch->SearchValue != "" || $this->grnModifiedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // grnModifiedDateTime
        if (!$this->isAddOrEdit() && $this->grnModifiedDateTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->grnModifiedDateTime->AdvancedSearch->SearchValue != "" || $this->grnModifiedDateTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Received
        if (!$this->isAddOrEdit() && $this->Received->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Received->AdvancedSearch->SearchValue != "" || $this->Received->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BillDate
        if (!$this->isAddOrEdit() && $this->BillDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillDate->AdvancedSearch->SearchValue != "" || $this->BillDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CurStock
        if (!$this->isAddOrEdit() && $this->CurStock->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CurStock->AdvancedSearch->SearchValue != "" || $this->CurStock->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Check field name 'ORDNO' first before field var 'x_ORDNO'
        $val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
        if (!$this->ORDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ORDNO->Visible = false; // Disable update for API request
            } else {
                $this->ORDNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ORDNO")) {
            $this->ORDNO->setOldValue($CurrentForm->getValue("o_ORDNO"));
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

        // Check field name 'LastMonthSale' first before field var 'x_LastMonthSale'
        $val = $CurrentForm->hasValue("LastMonthSale") ? $CurrentForm->getValue("LastMonthSale") : $CurrentForm->getValue("x_LastMonthSale");
        if (!$this->LastMonthSale->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LastMonthSale->Visible = false; // Disable update for API request
            } else {
                $this->LastMonthSale->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LastMonthSale")) {
            $this->LastMonthSale->setOldValue($CurrentForm->getValue("o_LastMonthSale"));
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

        // Check field name 'Quantity' first before field var 'x_Quantity'
        $val = $CurrentForm->hasValue("Quantity") ? $CurrentForm->getValue("Quantity") : $CurrentForm->getValue("x_Quantity");
        if (!$this->Quantity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Quantity->Visible = false; // Disable update for API request
            } else {
                $this->Quantity->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Quantity")) {
            $this->Quantity->setOldValue($CurrentForm->getValue("o_Quantity"));
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

        // Check field name 'ExpDate' first before field var 'x_ExpDate'
        $val = $CurrentForm->hasValue("ExpDate") ? $CurrentForm->getValue("ExpDate") : $CurrentForm->getValue("x_ExpDate");
        if (!$this->ExpDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExpDate->Visible = false; // Disable update for API request
            } else {
                $this->ExpDate->setFormValue($val);
            }
            $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_ExpDate")) {
            $this->ExpDate->setOldValue($CurrentForm->getValue("o_ExpDate"));
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

        // Check field name 'ItemValue' first before field var 'x_ItemValue'
        $val = $CurrentForm->hasValue("ItemValue") ? $CurrentForm->getValue("ItemValue") : $CurrentForm->getValue("x_ItemValue");
        if (!$this->ItemValue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ItemValue->Visible = false; // Disable update for API request
            } else {
                $this->ItemValue->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ItemValue")) {
            $this->ItemValue->setOldValue($CurrentForm->getValue("o_ItemValue"));
        }

        // Check field name 'trid' first before field var 'x_trid'
        $val = $CurrentForm->hasValue("trid") ? $CurrentForm->getValue("trid") : $CurrentForm->getValue("x_trid");
        if (!$this->trid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->trid->Visible = false; // Disable update for API request
            } else {
                $this->trid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_trid")) {
            $this->trid->setOldValue($CurrentForm->getValue("o_trid"));
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

        // Check field name 'grncreatedby' first before field var 'x_grncreatedby'
        $val = $CurrentForm->hasValue("grncreatedby") ? $CurrentForm->getValue("grncreatedby") : $CurrentForm->getValue("x_grncreatedby");
        if (!$this->grncreatedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedby->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_grncreatedby")) {
            $this->grncreatedby->setOldValue($CurrentForm->getValue("o_grncreatedby"));
        }

        // Check field name 'grncreatedDateTime' first before field var 'x_grncreatedDateTime'
        $val = $CurrentForm->hasValue("grncreatedDateTime") ? $CurrentForm->getValue("grncreatedDateTime") : $CurrentForm->getValue("x_grncreatedDateTime");
        if (!$this->grncreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grncreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grncreatedDateTime->setFormValue($val);
            }
            $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_grncreatedDateTime")) {
            $this->grncreatedDateTime->setOldValue($CurrentForm->getValue("o_grncreatedDateTime"));
        }

        // Check field name 'grnModifiedby' first before field var 'x_grnModifiedby'
        $val = $CurrentForm->hasValue("grnModifiedby") ? $CurrentForm->getValue("grnModifiedby") : $CurrentForm->getValue("x_grnModifiedby");
        if (!$this->grnModifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedby->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedby->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_grnModifiedby")) {
            $this->grnModifiedby->setOldValue($CurrentForm->getValue("o_grnModifiedby"));
        }

        // Check field name 'grnModifiedDateTime' first before field var 'x_grnModifiedDateTime'
        $val = $CurrentForm->hasValue("grnModifiedDateTime") ? $CurrentForm->getValue("grnModifiedDateTime") : $CurrentForm->getValue("x_grnModifiedDateTime");
        if (!$this->grnModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->grnModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->grnModifiedDateTime->setFormValue($val);
            }
            $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_grnModifiedDateTime")) {
            $this->grnModifiedDateTime->setOldValue($CurrentForm->getValue("o_grnModifiedDateTime"));
        }

        // Check field name 'BillDate' first before field var 'x_BillDate'
        $val = $CurrentForm->hasValue("BillDate") ? $CurrentForm->getValue("BillDate") : $CurrentForm->getValue("x_BillDate");
        if (!$this->BillDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillDate->Visible = false; // Disable update for API request
            } else {
                $this->BillDate->setFormValue($val);
            }
            $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_BillDate")) {
            $this->BillDate->setOldValue($CurrentForm->getValue("o_BillDate"));
        }

        // Check field name 'CurStock' first before field var 'x_CurStock'
        $val = $CurrentForm->hasValue("CurStock") ? $CurrentForm->getValue("CurStock") : $CurrentForm->getValue("x_CurStock");
        if (!$this->CurStock->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CurStock->Visible = false; // Disable update for API request
            } else {
                $this->CurStock->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CurStock")) {
            $this->CurStock->setOldValue($CurrentForm->getValue("o_CurStock"));
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
        $this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->LastMonthSale->CurrentValue = $this->LastMonthSale->FormValue;
        $this->PrName->CurrentValue = $this->PrName->FormValue;
        $this->Quantity->CurrentValue = $this->Quantity->FormValue;
        $this->BatchNo->CurrentValue = $this->BatchNo->FormValue;
        $this->ExpDate->CurrentValue = $this->ExpDate->FormValue;
        $this->ExpDate->CurrentValue = UnFormatDateTime($this->ExpDate->CurrentValue, 0);
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->ItemValue->CurrentValue = $this->ItemValue->FormValue;
        $this->trid->CurrentValue = $this->trid->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->grncreatedby->CurrentValue = $this->grncreatedby->FormValue;
        $this->grncreatedDateTime->CurrentValue = $this->grncreatedDateTime->FormValue;
        $this->grncreatedDateTime->CurrentValue = UnFormatDateTime($this->grncreatedDateTime->CurrentValue, 0);
        $this->grnModifiedby->CurrentValue = $this->grnModifiedby->FormValue;
        $this->grnModifiedDateTime->CurrentValue = $this->grnModifiedDateTime->FormValue;
        $this->grnModifiedDateTime->CurrentValue = UnFormatDateTime($this->grnModifiedDateTime->CurrentValue, 0);
        $this->BillDate->CurrentValue = $this->BillDate->FormValue;
        $this->BillDate->CurrentValue = UnFormatDateTime($this->BillDate->CurrentValue, 0);
        $this->CurStock->CurrentValue = $this->CurStock->FormValue;
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
        $this->ORDNO->setDbValue($row['ORDNO']);
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PRC->setDbValue($row['PRC']);
        $this->QTY->setDbValue($row['QTY']);
        $this->DT->setDbValue($row['DT']);
        $this->PC->setDbValue($row['PC']);
        $this->YM->setDbValue($row['YM']);
        $this->Stock->setDbValue($row['Stock']);
        $this->Printcheck->setDbValue($row['Printcheck']);
        $this->id->setDbValue($row['id']);
        $this->grnid->setDbValue($row['grnid']);
        $this->poid->setDbValue($row['poid']);
        $this->LastMonthSale->setDbValue($row['LastMonthSale']);
        $this->PrName->setDbValue($row['PrName']);
        $this->GrnQuantity->setDbValue($row['GrnQuantity']);
        $this->Quantity->setDbValue($row['Quantity']);
        $this->FreeQty->setDbValue($row['FreeQty']);
        $this->BatchNo->setDbValue($row['BatchNo']);
        $this->ExpDate->setDbValue($row['ExpDate']);
        $this->HSN->setDbValue($row['HSN']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->PUnit->setDbValue($row['PUnit']);
        $this->SUnit->setDbValue($row['SUnit']);
        $this->MRP->setDbValue($row['MRP']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->Disc->setDbValue($row['Disc']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->PTax->setDbValue($row['PTax']);
        $this->ItemValue->setDbValue($row['ItemValue']);
        $this->SalTax->setDbValue($row['SalTax']);
        $this->PurRate->setDbValue($row['PurRate']);
        $this->SalRate->setDbValue($row['SalRate']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->Pack->setDbValue($row['Pack']);
        $this->GrnMRP->setDbValue($row['GrnMRP']);
        $this->trid->setDbValue($row['trid']);
        $this->HospID->setDbValue($row['HospID']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->grncreatedby->setDbValue($row['grncreatedby']);
        $this->grncreatedDateTime->setDbValue($row['grncreatedDateTime']);
        $this->grnModifiedby->setDbValue($row['grnModifiedby']);
        $this->grnModifiedDateTime->setDbValue($row['grnModifiedDateTime']);
        $this->Received->setDbValue($row['Received']);
        $this->BillDate->setDbValue($row['BillDate']);
        $this->CurStock->setDbValue($row['CurStock']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['ORDNO'] = $this->ORDNO->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['QTY'] = $this->QTY->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['Stock'] = $this->Stock->CurrentValue;
        $row['Printcheck'] = $this->Printcheck->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['grnid'] = $this->grnid->CurrentValue;
        $row['poid'] = $this->poid->CurrentValue;
        $row['LastMonthSale'] = $this->LastMonthSale->CurrentValue;
        $row['PrName'] = $this->PrName->CurrentValue;
        $row['GrnQuantity'] = $this->GrnQuantity->CurrentValue;
        $row['Quantity'] = $this->Quantity->CurrentValue;
        $row['FreeQty'] = $this->FreeQty->CurrentValue;
        $row['BatchNo'] = $this->BatchNo->CurrentValue;
        $row['ExpDate'] = $this->ExpDate->CurrentValue;
        $row['HSN'] = $this->HSN->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['PUnit'] = $this->PUnit->CurrentValue;
        $row['SUnit'] = $this->SUnit->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['PurValue'] = $this->PurValue->CurrentValue;
        $row['Disc'] = $this->Disc->CurrentValue;
        $row['PSGST'] = $this->PSGST->CurrentValue;
        $row['PCGST'] = $this->PCGST->CurrentValue;
        $row['PTax'] = $this->PTax->CurrentValue;
        $row['ItemValue'] = $this->ItemValue->CurrentValue;
        $row['SalTax'] = $this->SalTax->CurrentValue;
        $row['PurRate'] = $this->PurRate->CurrentValue;
        $row['SalRate'] = $this->SalRate->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['SSGST'] = $this->SSGST->CurrentValue;
        $row['SCGST'] = $this->SCGST->CurrentValue;
        $row['Pack'] = $this->Pack->CurrentValue;
        $row['GrnMRP'] = $this->GrnMRP->CurrentValue;
        $row['trid'] = $this->trid->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
        $row['grncreatedby'] = $this->grncreatedby->CurrentValue;
        $row['grncreatedDateTime'] = $this->grncreatedDateTime->CurrentValue;
        $row['grnModifiedby'] = $this->grnModifiedby->CurrentValue;
        $row['grnModifiedDateTime'] = $this->grnModifiedDateTime->CurrentValue;
        $row['Received'] = $this->Received->CurrentValue;
        $row['BillDate'] = $this->BillDate->CurrentValue;
        $row['CurStock'] = $this->CurStock->CurrentValue;
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
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ItemValue->FormValue == $this->ItemValue->CurrentValue && is_numeric(ConvertToFloatString($this->ItemValue->CurrentValue))) {
            $this->ItemValue->CurrentValue = ConvertToFloatString($this->ItemValue->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // ORDNO

        // BRCODE

        // PRC

        // QTY

        // DT

        // PC

        // YM

        // Stock

        // Printcheck

        // id

        // grnid

        // poid

        // LastMonthSale

        // PrName

        // GrnQuantity

        // Quantity

        // FreeQty

        // BatchNo

        // ExpDate

        // HSN

        // MFRCODE

        // PUnit

        // SUnit

        // MRP

        // PurValue

        // Disc

        // PSGST

        // PCGST

        // PTax

        // ItemValue

        // SalTax

        // PurRate

        // SalRate

        // Discount

        // SSGST

        // SCGST

        // Pack

        // GrnMRP

        // trid

        // HospID

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // grncreatedby

        // grncreatedDateTime

        // grnModifiedby

        // grnModifiedDateTime

        // Received

        // BillDate

        // CurStock
        if ($this->RowType == ROWTYPE_VIEW) {
            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $curVal = trim(strval($this->ORDNO->CurrentValue));
            if ($curVal != "") {
                $this->ORDNO->ViewValue = $this->ORDNO->lookupCacheOption($curVal);
                if ($this->ORDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->ORDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ORDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->ORDNO->ViewValue = $this->ORDNO->displayValue($arwrk);
                    } else {
                        $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
                    }
                }
            } else {
                $this->ORDNO->ViewValue = null;
            }
            $this->ORDNO->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
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

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // QTY
            $this->QTY->ViewValue = $this->QTY->CurrentValue;
            $this->QTY->ViewValue = FormatNumber($this->QTY->ViewValue, 0, -2, -2, -2);
            $this->QTY->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // Stock
            $this->Stock->ViewValue = $this->Stock->CurrentValue;
            $this->Stock->ViewValue = FormatNumber($this->Stock->ViewValue, 0, -2, -2, -2);
            $this->Stock->ViewCustomAttributes = "";

            // Printcheck
            $this->Printcheck->ViewValue = $this->Printcheck->CurrentValue;
            $this->Printcheck->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // grnid
            $this->grnid->ViewValue = $this->grnid->CurrentValue;
            $this->grnid->ViewValue = FormatNumber($this->grnid->ViewValue, 0, -2, -2, -2);
            $this->grnid->ViewCustomAttributes = "";

            // poid
            $this->poid->ViewValue = $this->poid->CurrentValue;
            $this->poid->ViewValue = FormatNumber($this->poid->ViewValue, 0, -2, -2, -2);
            $this->poid->ViewCustomAttributes = "";

            // LastMonthSale
            $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->ViewValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->ViewValue = $this->LastMonthSale->CurrentValue;
                    }
                }
            } else {
                $this->LastMonthSale->ViewValue = null;
            }
            $this->LastMonthSale->ViewCustomAttributes = "";

            // PrName
            $this->PrName->ViewValue = $this->PrName->CurrentValue;
            $this->PrName->ViewCustomAttributes = "";

            // GrnQuantity
            $this->GrnQuantity->ViewValue = $this->GrnQuantity->CurrentValue;
            $this->GrnQuantity->ViewValue = FormatNumber($this->GrnQuantity->ViewValue, 0, -2, -2, -2);
            $this->GrnQuantity->ViewCustomAttributes = "";

            // Quantity
            $this->Quantity->ViewValue = $this->Quantity->CurrentValue;
            $this->Quantity->ViewValue = FormatNumber($this->Quantity->ViewValue, 0, -2, -2, -2);
            $this->Quantity->ViewCustomAttributes = "";

            // FreeQty
            $this->FreeQty->ViewValue = $this->FreeQty->CurrentValue;
            $this->FreeQty->ViewValue = FormatNumber($this->FreeQty->ViewValue, 0, -2, -2, -2);
            $this->FreeQty->ViewCustomAttributes = "";

            // BatchNo
            $this->BatchNo->ViewValue = $this->BatchNo->CurrentValue;
            $this->BatchNo->ViewCustomAttributes = "";

            // ExpDate
            $this->ExpDate->ViewValue = $this->ExpDate->CurrentValue;
            $this->ExpDate->ViewValue = FormatDateTime($this->ExpDate->ViewValue, 0);
            $this->ExpDate->ViewCustomAttributes = "";

            // HSN
            $this->HSN->ViewValue = $this->HSN->CurrentValue;
            $this->HSN->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // PUnit
            $this->PUnit->ViewValue = $this->PUnit->CurrentValue;
            $this->PUnit->ViewValue = FormatNumber($this->PUnit->ViewValue, 0, -2, -2, -2);
            $this->PUnit->ViewCustomAttributes = "";

            // SUnit
            $this->SUnit->ViewValue = $this->SUnit->CurrentValue;
            $this->SUnit->ViewValue = FormatNumber($this->SUnit->ViewValue, 0, -2, -2, -2);
            $this->SUnit->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // Disc
            $this->Disc->ViewValue = $this->Disc->CurrentValue;
            $this->Disc->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // PTax
            $this->PTax->ViewValue = $this->PTax->CurrentValue;
            $this->PTax->ViewValue = FormatNumber($this->PTax->ViewValue, 2, -2, -2, -2);
            $this->PTax->ViewCustomAttributes = "";

            // ItemValue
            $this->ItemValue->ViewValue = $this->ItemValue->CurrentValue;
            $this->ItemValue->ViewValue = FormatNumber($this->ItemValue->ViewValue, 2, -2, -2, -2);
            $this->ItemValue->ViewCustomAttributes = "";

            // SalTax
            $this->SalTax->ViewValue = $this->SalTax->CurrentValue;
            $this->SalTax->ViewValue = FormatNumber($this->SalTax->ViewValue, 2, -2, -2, -2);
            $this->SalTax->ViewCustomAttributes = "";

            // PurRate
            $this->PurRate->ViewValue = $this->PurRate->CurrentValue;
            $this->PurRate->ViewValue = FormatNumber($this->PurRate->ViewValue, 2, -2, -2, -2);
            $this->PurRate->ViewCustomAttributes = "";

            // SalRate
            $this->SalRate->ViewValue = $this->SalRate->CurrentValue;
            $this->SalRate->ViewValue = FormatNumber($this->SalRate->ViewValue, 2, -2, -2, -2);
            $this->SalRate->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // Pack
            $this->Pack->ViewValue = $this->Pack->CurrentValue;
            $this->Pack->ViewCustomAttributes = "";

            // GrnMRP
            $this->GrnMRP->ViewValue = $this->GrnMRP->CurrentValue;
            $this->GrnMRP->ViewValue = FormatNumber($this->GrnMRP->ViewValue, 2, -2, -2, -2);
            $this->GrnMRP->ViewCustomAttributes = "";

            // trid
            $this->trid->ViewValue = $this->trid->CurrentValue;
            $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
            $this->trid->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // grncreatedby
            $this->grncreatedby->ViewValue = $this->grncreatedby->CurrentValue;
            $this->grncreatedby->ViewValue = FormatNumber($this->grncreatedby->ViewValue, 0, -2, -2, -2);
            $this->grncreatedby->ViewCustomAttributes = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->ViewValue = $this->grncreatedDateTime->CurrentValue;
            $this->grncreatedDateTime->ViewValue = FormatDateTime($this->grncreatedDateTime->ViewValue, 0);
            $this->grncreatedDateTime->ViewCustomAttributes = "";

            // grnModifiedby
            $this->grnModifiedby->ViewValue = $this->grnModifiedby->CurrentValue;
            $this->grnModifiedby->ViewValue = FormatNumber($this->grnModifiedby->ViewValue, 0, -2, -2, -2);
            $this->grnModifiedby->ViewCustomAttributes = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->ViewValue = $this->grnModifiedDateTime->CurrentValue;
            $this->grnModifiedDateTime->ViewValue = FormatDateTime($this->grnModifiedDateTime->ViewValue, 0);
            $this->grnModifiedDateTime->ViewCustomAttributes = "";

            // Received
            $this->Received->ViewValue = $this->Received->CurrentValue;
            $this->Received->ViewCustomAttributes = "";

            // BillDate
            $this->BillDate->ViewValue = $this->BillDate->CurrentValue;
            $this->BillDate->ViewValue = FormatDateTime($this->BillDate->ViewValue, 0);
            $this->BillDate->ViewCustomAttributes = "";

            // CurStock
            $this->CurStock->ViewValue = $this->CurStock->CurrentValue;
            $this->CurStock->ViewValue = FormatNumber($this->CurStock->ViewValue, 0, -2, -2, -2);
            $this->CurStock->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";
            $this->ORDNO->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ORDNO->ViewValue = $this->highlightValue($this->ORDNO);
            }

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PRC->ViewValue = $this->highlightValue($this->PRC);
            }

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";
            $this->LastMonthSale->TooltipValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";
            $this->PrName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PrName->ViewValue = $this->highlightValue($this->PrName);
            }

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";
            $this->Quantity->TooltipValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";
            $this->BatchNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BatchNo->ViewValue = $this->highlightValue($this->BatchNo);
            }

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";
            $this->ExpDate->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";
            $this->ItemValue->TooltipValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";
            $this->trid->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";
            $this->grncreatedby->TooltipValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";
            $this->grncreatedDateTime->TooltipValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";
            $this->grnModifiedby->TooltipValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";
            $this->grnModifiedDateTime->TooltipValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";
            $this->BillDate->TooltipValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
            $this->CurStock->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ORDNO

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
            if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
                $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
                $this->ItemValue->OldValue = $this->ItemValue->EditValue;
            }

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            if ($this->trid->getSessionValue() != "") {
                $this->trid->CurrentValue = GetForeignKeyValue($this->trid->getSessionValue());
                $this->trid->OldValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
                $this->trid->ViewCustomAttributes = "";
            } else {
                $this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
                $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
            }

            // HospID

            // grncreatedby

            // grncreatedDateTime

            // grnModifiedby

            // grnModifiedDateTime

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

            // Add refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // ORDNO

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $curVal = trim(strval($this->BRCODE->CurrentValue));
            if ($curVal != "") {
                $this->BRCODE->EditValue = $this->BRCODE->lookupCacheOption($curVal);
                if ($this->BRCODE->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->BRCODE->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->BRCODE->Lookup->renderViewRow($rswrk[0]);
                        $this->BRCODE->EditValue = $this->BRCODE->displayValue($arwrk);
                    } else {
                        $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
                    }
                }
            } else {
                $this->BRCODE->EditValue = null;
            }
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // LastMonthSale
            $this->LastMonthSale->EditAttrs["class"] = "form-control";
            $this->LastMonthSale->EditCustomAttributes = "";
            $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
            $curVal = trim(strval($this->LastMonthSale->CurrentValue));
            if ($curVal != "") {
                $this->LastMonthSale->EditValue = $this->LastMonthSale->lookupCacheOption($curVal);
                if ($this->LastMonthSale->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->LastMonthSale->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->LastMonthSale->Lookup->renderViewRow($rswrk[0]);
                        $this->LastMonthSale->EditValue = $this->LastMonthSale->displayValue($arwrk);
                    } else {
                        $this->LastMonthSale->EditValue = HtmlEncode($this->LastMonthSale->CurrentValue);
                    }
                }
            } else {
                $this->LastMonthSale->EditValue = null;
            }
            $this->LastMonthSale->PlaceHolder = RemoveHtml($this->LastMonthSale->caption());

            // PrName
            $this->PrName->EditAttrs["class"] = "form-control";
            $this->PrName->EditCustomAttributes = "";
            if (!$this->PrName->Raw) {
                $this->PrName->CurrentValue = HtmlDecode($this->PrName->CurrentValue);
            }
            $this->PrName->EditValue = HtmlEncode($this->PrName->CurrentValue);
            $this->PrName->PlaceHolder = RemoveHtml($this->PrName->caption());

            // Quantity
            $this->Quantity->EditAttrs["class"] = "form-control";
            $this->Quantity->EditCustomAttributes = "";
            $this->Quantity->EditValue = HtmlEncode($this->Quantity->CurrentValue);
            $this->Quantity->PlaceHolder = RemoveHtml($this->Quantity->caption());

            // BatchNo
            $this->BatchNo->EditAttrs["class"] = "form-control";
            $this->BatchNo->EditCustomAttributes = "";
            if (!$this->BatchNo->Raw) {
                $this->BatchNo->CurrentValue = HtmlDecode($this->BatchNo->CurrentValue);
            }
            $this->BatchNo->EditValue = HtmlEncode($this->BatchNo->CurrentValue);
            $this->BatchNo->PlaceHolder = RemoveHtml($this->BatchNo->caption());

            // ExpDate
            $this->ExpDate->EditAttrs["class"] = "form-control";
            $this->ExpDate->EditCustomAttributes = "";
            $this->ExpDate->EditValue = HtmlEncode(FormatDateTime($this->ExpDate->CurrentValue, 8));
            $this->ExpDate->PlaceHolder = RemoveHtml($this->ExpDate->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
                $this->MRP->OldValue = $this->MRP->EditValue;
            }

            // ItemValue
            $this->ItemValue->EditAttrs["class"] = "form-control";
            $this->ItemValue->EditCustomAttributes = "";
            $this->ItemValue->EditValue = HtmlEncode($this->ItemValue->CurrentValue);
            $this->ItemValue->PlaceHolder = RemoveHtml($this->ItemValue->caption());
            if (strval($this->ItemValue->EditValue) != "" && is_numeric($this->ItemValue->EditValue)) {
                $this->ItemValue->EditValue = FormatNumber($this->ItemValue->EditValue, -2, -2, -2, -2);
                $this->ItemValue->OldValue = $this->ItemValue->EditValue;
            }

            // trid
            $this->trid->EditAttrs["class"] = "form-control";
            $this->trid->EditCustomAttributes = "";
            if ($this->trid->getSessionValue() != "") {
                $this->trid->CurrentValue = GetForeignKeyValue($this->trid->getSessionValue());
                $this->trid->OldValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = $this->trid->CurrentValue;
                $this->trid->ViewValue = FormatNumber($this->trid->ViewValue, 0, -2, -2, -2);
                $this->trid->ViewCustomAttributes = "";
            } else {
                $this->trid->EditValue = HtmlEncode($this->trid->CurrentValue);
                $this->trid->PlaceHolder = RemoveHtml($this->trid->caption());
            }

            // HospID

            // grncreatedby

            // grncreatedDateTime

            // grnModifiedby

            // grnModifiedDateTime

            // BillDate
            $this->BillDate->EditAttrs["class"] = "form-control";
            $this->BillDate->EditCustomAttributes = "";
            $this->BillDate->EditValue = HtmlEncode(FormatDateTime($this->BillDate->CurrentValue, 8));
            $this->BillDate->PlaceHolder = RemoveHtml($this->BillDate->caption());

            // CurStock
            $this->CurStock->EditAttrs["class"] = "form-control";
            $this->CurStock->EditCustomAttributes = "";
            $this->CurStock->EditValue = HtmlEncode($this->CurStock->CurrentValue);
            $this->CurStock->PlaceHolder = RemoveHtml($this->CurStock->caption());

            // Edit refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // LastMonthSale
            $this->LastMonthSale->LinkCustomAttributes = "";
            $this->LastMonthSale->HrefValue = "";

            // PrName
            $this->PrName->LinkCustomAttributes = "";
            $this->PrName->HrefValue = "";

            // Quantity
            $this->Quantity->LinkCustomAttributes = "";
            $this->Quantity->HrefValue = "";

            // BatchNo
            $this->BatchNo->LinkCustomAttributes = "";
            $this->BatchNo->HrefValue = "";

            // ExpDate
            $this->ExpDate->LinkCustomAttributes = "";
            $this->ExpDate->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // ItemValue
            $this->ItemValue->LinkCustomAttributes = "";
            $this->ItemValue->HrefValue = "";

            // trid
            $this->trid->LinkCustomAttributes = "";
            $this->trid->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // grncreatedby
            $this->grncreatedby->LinkCustomAttributes = "";
            $this->grncreatedby->HrefValue = "";

            // grncreatedDateTime
            $this->grncreatedDateTime->LinkCustomAttributes = "";
            $this->grncreatedDateTime->HrefValue = "";

            // grnModifiedby
            $this->grnModifiedby->LinkCustomAttributes = "";
            $this->grnModifiedby->HrefValue = "";

            // grnModifiedDateTime
            $this->grnModifiedDateTime->LinkCustomAttributes = "";
            $this->grnModifiedDateTime->HrefValue = "";

            // BillDate
            $this->BillDate->LinkCustomAttributes = "";
            $this->BillDate->HrefValue = "";

            // CurStock
            $this->CurStock->LinkCustomAttributes = "";
            $this->CurStock->HrefValue = "";
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
        if ($this->ORDNO->Required) {
            if (!$this->ORDNO->IsDetailKey && EmptyValue($this->ORDNO->FormValue)) {
                $this->ORDNO->addErrorMessage(str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
            }
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->LastMonthSale->Required) {
            if (!$this->LastMonthSale->IsDetailKey && EmptyValue($this->LastMonthSale->FormValue)) {
                $this->LastMonthSale->addErrorMessage(str_replace("%s", $this->LastMonthSale->caption(), $this->LastMonthSale->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->LastMonthSale->FormValue)) {
            $this->LastMonthSale->addErrorMessage($this->LastMonthSale->getErrorMessage(false));
        }
        if ($this->PrName->Required) {
            if (!$this->PrName->IsDetailKey && EmptyValue($this->PrName->FormValue)) {
                $this->PrName->addErrorMessage(str_replace("%s", $this->PrName->caption(), $this->PrName->RequiredErrorMessage));
            }
        }
        if ($this->Quantity->Required) {
            if (!$this->Quantity->IsDetailKey && EmptyValue($this->Quantity->FormValue)) {
                $this->Quantity->addErrorMessage(str_replace("%s", $this->Quantity->caption(), $this->Quantity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Quantity->FormValue)) {
            $this->Quantity->addErrorMessage($this->Quantity->getErrorMessage(false));
        }
        if ($this->BatchNo->Required) {
            if (!$this->BatchNo->IsDetailKey && EmptyValue($this->BatchNo->FormValue)) {
                $this->BatchNo->addErrorMessage(str_replace("%s", $this->BatchNo->caption(), $this->BatchNo->RequiredErrorMessage));
            }
        }
        if ($this->ExpDate->Required) {
            if (!$this->ExpDate->IsDetailKey && EmptyValue($this->ExpDate->FormValue)) {
                $this->ExpDate->addErrorMessage(str_replace("%s", $this->ExpDate->caption(), $this->ExpDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ExpDate->FormValue)) {
            $this->ExpDate->addErrorMessage($this->ExpDate->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->ItemValue->Required) {
            if (!$this->ItemValue->IsDetailKey && EmptyValue($this->ItemValue->FormValue)) {
                $this->ItemValue->addErrorMessage(str_replace("%s", $this->ItemValue->caption(), $this->ItemValue->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->ItemValue->FormValue)) {
            $this->ItemValue->addErrorMessage($this->ItemValue->getErrorMessage(false));
        }
        if ($this->trid->Required) {
            if (!$this->trid->IsDetailKey && EmptyValue($this->trid->FormValue)) {
                $this->trid->addErrorMessage(str_replace("%s", $this->trid->caption(), $this->trid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->trid->FormValue)) {
            $this->trid->addErrorMessage($this->trid->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedby->Required) {
            if (!$this->grncreatedby->IsDetailKey && EmptyValue($this->grncreatedby->FormValue)) {
                $this->grncreatedby->addErrorMessage(str_replace("%s", $this->grncreatedby->caption(), $this->grncreatedby->RequiredErrorMessage));
            }
        }
        if ($this->grncreatedDateTime->Required) {
            if (!$this->grncreatedDateTime->IsDetailKey && EmptyValue($this->grncreatedDateTime->FormValue)) {
                $this->grncreatedDateTime->addErrorMessage(str_replace("%s", $this->grncreatedDateTime->caption(), $this->grncreatedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedby->Required) {
            if (!$this->grnModifiedby->IsDetailKey && EmptyValue($this->grnModifiedby->FormValue)) {
                $this->grnModifiedby->addErrorMessage(str_replace("%s", $this->grnModifiedby->caption(), $this->grnModifiedby->RequiredErrorMessage));
            }
        }
        if ($this->grnModifiedDateTime->Required) {
            if (!$this->grnModifiedDateTime->IsDetailKey && EmptyValue($this->grnModifiedDateTime->FormValue)) {
                $this->grnModifiedDateTime->addErrorMessage(str_replace("%s", $this->grnModifiedDateTime->caption(), $this->grnModifiedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->BillDate->Required) {
            if (!$this->BillDate->IsDetailKey && EmptyValue($this->BillDate->FormValue)) {
                $this->BillDate->addErrorMessage(str_replace("%s", $this->BillDate->caption(), $this->BillDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillDate->FormValue)) {
            $this->BillDate->addErrorMessage($this->BillDate->getErrorMessage(false));
        }
        if ($this->CurStock->Required) {
            if (!$this->CurStock->IsDetailKey && EmptyValue($this->CurStock->FormValue)) {
                $this->CurStock->addErrorMessage(str_replace("%s", $this->CurStock->caption(), $this->CurStock->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CurStock->FormValue)) {
            $this->CurStock->addErrorMessage($this->CurStock->getErrorMessage(false));
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

            // ORDNO
            $this->ORDNO->CurrentValue = PharmacyID();
            $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null);

            // BRCODE
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, $this->BRCODE->ReadOnly);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // LastMonthSale
            $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, $this->LastMonthSale->ReadOnly);

            // PrName
            $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, $this->PrName->ReadOnly);

            // Quantity
            $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, $this->Quantity->ReadOnly);

            // BatchNo
            $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, $this->BatchNo->ReadOnly);

            // ExpDate
            $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), null, $this->ExpDate->ReadOnly);

            // MRP
            $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, $this->MRP->ReadOnly);

            // ItemValue
            $this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, null, $this->ItemValue->ReadOnly);

            // trid
            if ($this->trid->getSessionValue() != "") {
                $this->trid->ReadOnly = true;
            }
            $this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, null, $this->trid->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // grncreatedby
            $this->grncreatedby->CurrentValue = CurrentUserID();
            $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null);

            // grncreatedDateTime
            $this->grncreatedDateTime->CurrentValue = CurrentDateTime();
            $this->grncreatedDateTime->setDbValueDef($rsnew, $this->grncreatedDateTime->CurrentValue, null);

            // grnModifiedby
            $this->grnModifiedby->CurrentValue = CurrentUserID();
            $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null);

            // grnModifiedDateTime
            $this->grnModifiedDateTime->CurrentValue = CurrentDateTime();
            $this->grnModifiedDateTime->setDbValueDef($rsnew, $this->grnModifiedDateTime->CurrentValue, null);

            // BillDate
            $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, $this->BillDate->ReadOnly);

            // CurStock
            $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, $this->CurStock->ReadOnly);

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
        $hash .= GetFieldHash($row['ORDNO']); // ORDNO
        $hash .= GetFieldHash($row['BRCODE']); // BRCODE
        $hash .= GetFieldHash($row['PRC']); // PRC
        $hash .= GetFieldHash($row['LastMonthSale']); // LastMonthSale
        $hash .= GetFieldHash($row['PrName']); // PrName
        $hash .= GetFieldHash($row['Quantity']); // Quantity
        $hash .= GetFieldHash($row['BatchNo']); // BatchNo
        $hash .= GetFieldHash($row['ExpDate']); // ExpDate
        $hash .= GetFieldHash($row['MRP']); // MRP
        $hash .= GetFieldHash($row['ItemValue']); // ItemValue
        $hash .= GetFieldHash($row['trid']); // trid
        $hash .= GetFieldHash($row['HospID']); // HospID
        $hash .= GetFieldHash($row['grncreatedby']); // grncreatedby
        $hash .= GetFieldHash($row['grncreatedDateTime']); // grncreatedDateTime
        $hash .= GetFieldHash($row['grnModifiedby']); // grnModifiedby
        $hash .= GetFieldHash($row['grnModifiedDateTime']); // grnModifiedDateTime
        $hash .= GetFieldHash($row['BillDate']); // BillDate
        $hash .= GetFieldHash($row['CurStock']); // CurStock
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

        // ORDNO
        $this->ORDNO->CurrentValue = PharmacyID();
        $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // LastMonthSale
        $this->LastMonthSale->setDbValueDef($rsnew, $this->LastMonthSale->CurrentValue, null, false);

        // PrName
        $this->PrName->setDbValueDef($rsnew, $this->PrName->CurrentValue, null, false);

        // Quantity
        $this->Quantity->setDbValueDef($rsnew, $this->Quantity->CurrentValue, null, false);

        // BatchNo
        $this->BatchNo->setDbValueDef($rsnew, $this->BatchNo->CurrentValue, null, false);

        // ExpDate
        $this->ExpDate->setDbValueDef($rsnew, UnFormatDateTime($this->ExpDate->CurrentValue, 0), null, false);

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, false);

        // ItemValue
        $this->ItemValue->setDbValueDef($rsnew, $this->ItemValue->CurrentValue, null, false);

        // trid
        $this->trid->setDbValueDef($rsnew, $this->trid->CurrentValue, null, false);

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

        // grncreatedby
        $this->grncreatedby->CurrentValue = CurrentUserID();
        $this->grncreatedby->setDbValueDef($rsnew, $this->grncreatedby->CurrentValue, null);

        // grncreatedDateTime
        $this->grncreatedDateTime->CurrentValue = CurrentDateTime();
        $this->grncreatedDateTime->setDbValueDef($rsnew, $this->grncreatedDateTime->CurrentValue, null);

        // grnModifiedby
        $this->grnModifiedby->CurrentValue = CurrentUserID();
        $this->grnModifiedby->setDbValueDef($rsnew, $this->grnModifiedby->CurrentValue, null);

        // grnModifiedDateTime
        $this->grnModifiedDateTime->CurrentValue = CurrentDateTime();
        $this->grnModifiedDateTime->setDbValueDef($rsnew, $this->grnModifiedDateTime->CurrentValue, null);

        // BillDate
        $this->BillDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillDate->CurrentValue, 0), null, false);

        // CurStock
        $this->CurStock->setDbValueDef($rsnew, $this->CurStock->CurrentValue, null, false);

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
        $this->ORDNO->AdvancedSearch->load();
        $this->BRCODE->AdvancedSearch->load();
        $this->PRC->AdvancedSearch->load();
        $this->QTY->AdvancedSearch->load();
        $this->DT->AdvancedSearch->load();
        $this->PC->AdvancedSearch->load();
        $this->YM->AdvancedSearch->load();
        $this->Stock->AdvancedSearch->load();
        $this->Printcheck->AdvancedSearch->load();
        $this->id->AdvancedSearch->load();
        $this->grnid->AdvancedSearch->load();
        $this->poid->AdvancedSearch->load();
        $this->LastMonthSale->AdvancedSearch->load();
        $this->PrName->AdvancedSearch->load();
        $this->GrnQuantity->AdvancedSearch->load();
        $this->Quantity->AdvancedSearch->load();
        $this->FreeQty->AdvancedSearch->load();
        $this->BatchNo->AdvancedSearch->load();
        $this->ExpDate->AdvancedSearch->load();
        $this->HSN->AdvancedSearch->load();
        $this->MFRCODE->AdvancedSearch->load();
        $this->PUnit->AdvancedSearch->load();
        $this->SUnit->AdvancedSearch->load();
        $this->MRP->AdvancedSearch->load();
        $this->PurValue->AdvancedSearch->load();
        $this->Disc->AdvancedSearch->load();
        $this->PSGST->AdvancedSearch->load();
        $this->PCGST->AdvancedSearch->load();
        $this->PTax->AdvancedSearch->load();
        $this->ItemValue->AdvancedSearch->load();
        $this->SalTax->AdvancedSearch->load();
        $this->PurRate->AdvancedSearch->load();
        $this->SalRate->AdvancedSearch->load();
        $this->Discount->AdvancedSearch->load();
        $this->SSGST->AdvancedSearch->load();
        $this->SCGST->AdvancedSearch->load();
        $this->Pack->AdvancedSearch->load();
        $this->GrnMRP->AdvancedSearch->load();
        $this->trid->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
        $this->CreatedBy->AdvancedSearch->load();
        $this->CreatedDateTime->AdvancedSearch->load();
        $this->ModifiedBy->AdvancedSearch->load();
        $this->ModifiedDateTime->AdvancedSearch->load();
        $this->grncreatedby->AdvancedSearch->load();
        $this->grncreatedDateTime->AdvancedSearch->load();
        $this->grnModifiedby->AdvancedSearch->load();
        $this->grnModifiedDateTime->AdvancedSearch->load();
        $this->Received->AdvancedSearch->load();
        $this->BillDate->AdvancedSearch->load();
        $this->CurStock->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_pharmacytransferlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_pharmacytransferlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_pharmacytransferlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_pharmacytransfer" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_pharmacytransfer\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_pharmacytransferlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacytransferlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"ViewPharmacytransferSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_pharmacytransfer\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'ViewPharmacytransferSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_pharmacytransferlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_transfer") {
            $pharmacy_billing_transfer = Container("pharmacy_billing_transfer");
            $rsmaster = $pharmacy_billing_transfer->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $pharmacy_billing_transfer;
                    $pharmacy_billing_transfer->exportDocument($doc, new Recordset($rsmaster));
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
            if ($masterTblVar == "pharmacy_billing_transfer") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_billing_transfer");
                if (($parm = Get("fk_id", Get("trid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->trid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->trid->setSessionValue($this->trid->QueryStringValue);
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
            if ($masterTblVar == "pharmacy_billing_transfer") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_billing_transfer");
                if (($parm = Post("fk_id", Post("trid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->trid->setFormValue($masterTbl->id->FormValue);
                    $this->trid->setSessionValue($this->trid->FormValue);
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
            if ($masterTblVar != "pharmacy_billing_transfer") {
                if ($this->trid->CurrentValue == "") {
                    $this->trid->setSessionValue("");
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
                case "x_ORDNO":
                    break;
                case "x_BRCODE":
                    break;
                case "x_LastMonthSale":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'  and  `HospID` = '".HospitalID()."'";
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
