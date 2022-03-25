<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewPharmacyPharledReturnList extends ViewPharmacyPharledReturn
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_pharmacy_pharled_return';

    // Page object name
    public $PageObjName = "ViewPharmacyPharledReturnList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_pharmacy_pharled_returnlist";
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

        // Table object (view_pharmacy_pharled_return)
        if (!isset($GLOBALS["view_pharmacy_pharled_return"]) || get_class($GLOBALS["view_pharmacy_pharled_return"]) == PROJECT_NAMESPACE . "view_pharmacy_pharled_return") {
            $GLOBALS["view_pharmacy_pharled_return"] = &$this;
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
        $this->AddUrl = "ViewPharmacyPharledReturnAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewPharmacyPharledReturnDelete";
        $this->MultiUpdateUrl = "ViewPharmacyPharledReturnUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_pharmacy_pharled_return');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_pharmacy_pharled_returnlistsrch";

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
                $doc = new $class(Container("view_pharmacy_pharled_return"));
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
            $this->BRCODE->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->_USERID->Visible = false;
        }
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->HosoID->Visible = false;
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
            $this->BRNAME->Visible = false;
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
        $this->BRCODE->setVisibility();
        $this->TYPE->Visible = false;
        $this->DN->Visible = false;
        $this->RDN->Visible = false;
        $this->DT->Visible = false;
        $this->PRC->setVisibility();
        $this->OQ->Visible = false;
        $this->SiNo->setVisibility();
        $this->RQ->Visible = false;
        $this->Product->setVisibility();
        $this->SLNO->setVisibility();
        $this->RT->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->DAMT->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->EXPDT->setVisibility();
        $this->Mfg->setVisibility();
        $this->BILLNO->Visible = false;
        $this->BILLDT->Visible = false;
        $this->VALUE->Visible = false;
        $this->DISC->Visible = false;
        $this->TAXP->Visible = false;
        $this->TAX->Visible = false;
        $this->TAXR->Visible = false;
        $this->EMPNO->Visible = false;
        $this->PC->Visible = false;
        $this->DRNAME->Visible = false;
        $this->BTIME->Visible = false;
        $this->ONO->Visible = false;
        $this->ODT->Visible = false;
        $this->PURRT->Visible = false;
        $this->GRP->Visible = false;
        $this->IBATCH->Visible = false;
        $this->IPNO->Visible = false;
        $this->OPNO->Visible = false;
        $this->RECID->Visible = false;
        $this->FQTY->Visible = false;
        $this->UR->setVisibility();
        $this->DCID->Visible = false;
        $this->_USERID->setVisibility();
        $this->MODDT->Visible = false;
        $this->FYM->Visible = false;
        $this->PRCBATCH->Visible = false;
        $this->MRP->Visible = false;
        $this->BILLYM->Visible = false;
        $this->BILLGRP->Visible = false;
        $this->STAFF->Visible = false;
        $this->TEMPIPNO->Visible = false;
        $this->PRNTED->Visible = false;
        $this->PATNAME->Visible = false;
        $this->PJVNO->Visible = false;
        $this->PJVSLNO->Visible = false;
        $this->OTHDISC->Visible = false;
        $this->PJVYM->Visible = false;
        $this->PURDISCPER->Visible = false;
        $this->CASHIER->Visible = false;
        $this->CASHTIME->Visible = false;
        $this->CASHRECD->Visible = false;
        $this->CASHREFNO->Visible = false;
        $this->CASHIERSHIFT->Visible = false;
        $this->PRCODE->Visible = false;
        $this->RELEASEBY->Visible = false;
        $this->CRAUTHOR->Visible = false;
        $this->PAYMENT->Visible = false;
        $this->DRID->Visible = false;
        $this->WARD->Visible = false;
        $this->STAXTYPE->Visible = false;
        $this->PURDISCVAL->Visible = false;
        $this->RNDOFF->Visible = false;
        $this->DISCONMRP->Visible = false;
        $this->DELVDT->Visible = false;
        $this->DELVTIME->Visible = false;
        $this->DELVBY->Visible = false;
        $this->HOSPNO->Visible = false;
        $this->id->setVisibility();
        $this->pbv->Visible = false;
        $this->pbt->Visible = false;
        $this->HosoID->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->MFRCODE->Visible = false;
        $this->Reception->Visible = false;
        $this->PatID->Visible = false;
        $this->mrnno->Visible = false;
        $this->BRNAME->setVisibility();
        $this->sretid->Visible = false;
        $this->sprid->Visible = false;
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
        $this->setupLookupOptions($this->SLNO);

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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_return") {
            $masterTbl = Container("pharmacy_billing_return");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("PharmacyBillingReturnList"); // Return to master page
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
        $this->RT->FormValue = ""; // Clear form value
        $this->MRQ->FormValue = ""; // Clear form value
        $this->IQ->FormValue = ""; // Clear form value
        $this->DAMT->FormValue = ""; // Clear form value
        $this->UR->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_SiNo") && $CurrentForm->hasValue("o_SiNo") && $this->SiNo->CurrentValue != $this->SiNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Product") && $CurrentForm->hasValue("o_Product") && $this->Product->CurrentValue != $this->Product->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SLNO") && $CurrentForm->hasValue("o_SLNO") && $this->SLNO->CurrentValue != $this->SLNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RT") && $CurrentForm->hasValue("o_RT") && $this->RT->CurrentValue != $this->RT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MRQ") && $CurrentForm->hasValue("o_MRQ") && $this->MRQ->CurrentValue != $this->MRQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IQ") && $CurrentForm->hasValue("o_IQ") && $this->IQ->CurrentValue != $this->IQ->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DAMT") && $CurrentForm->hasValue("o_DAMT") && $this->DAMT->CurrentValue != $this->DAMT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BATCHNO") && $CurrentForm->hasValue("o_BATCHNO") && $this->BATCHNO->CurrentValue != $this->BATCHNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EXPDT") && $CurrentForm->hasValue("o_EXPDT") && $this->EXPDT->CurrentValue != $this->EXPDT->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mfg") && $CurrentForm->hasValue("o_Mfg") && $this->Mfg->CurrentValue != $this->Mfg->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_UR") && $CurrentForm->hasValue("o_UR") && $this->UR->CurrentValue != $this->UR->OldValue) {
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
        $this->BRCODE->clearErrorMessage();
        $this->PRC->clearErrorMessage();
        $this->SiNo->clearErrorMessage();
        $this->Product->clearErrorMessage();
        $this->SLNO->clearErrorMessage();
        $this->RT->clearErrorMessage();
        $this->MRQ->clearErrorMessage();
        $this->IQ->clearErrorMessage();
        $this->DAMT->clearErrorMessage();
        $this->BATCHNO->clearErrorMessage();
        $this->EXPDT->clearErrorMessage();
        $this->Mfg->clearErrorMessage();
        $this->UR->clearErrorMessage();
        $this->_USERID->clearErrorMessage();
        $this->id->clearErrorMessage();
        $this->HosoID->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->BRNAME->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_pharmacy_pharled_returnlistsrch");
        }
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->TYPE->AdvancedSearch->toJson(), ","); // Field TYPE
        $filterList = Concat($filterList, $this->DN->AdvancedSearch->toJson(), ","); // Field DN
        $filterList = Concat($filterList, $this->RDN->AdvancedSearch->toJson(), ","); // Field RDN
        $filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
        $filterList = Concat($filterList, $this->SiNo->AdvancedSearch->toJson(), ","); // Field SiNo
        $filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
        $filterList = Concat($filterList, $this->Product->AdvancedSearch->toJson(), ","); // Field Product
        $filterList = Concat($filterList, $this->SLNO->AdvancedSearch->toJson(), ","); // Field SLNO
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
        $filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
        $filterList = Concat($filterList, $this->DAMT->AdvancedSearch->toJson(), ","); // Field DAMT
        $filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
        $filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
        $filterList = Concat($filterList, $this->Mfg->AdvancedSearch->toJson(), ","); // Field Mfg
        $filterList = Concat($filterList, $this->BILLNO->AdvancedSearch->toJson(), ","); // Field BILLNO
        $filterList = Concat($filterList, $this->BILLDT->AdvancedSearch->toJson(), ","); // Field BILLDT
        $filterList = Concat($filterList, $this->VALUE->AdvancedSearch->toJson(), ","); // Field VALUE
        $filterList = Concat($filterList, $this->DISC->AdvancedSearch->toJson(), ","); // Field DISC
        $filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
        $filterList = Concat($filterList, $this->TAX->AdvancedSearch->toJson(), ","); // Field TAX
        $filterList = Concat($filterList, $this->TAXR->AdvancedSearch->toJson(), ","); // Field TAXR
        $filterList = Concat($filterList, $this->EMPNO->AdvancedSearch->toJson(), ","); // Field EMPNO
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->DRNAME->AdvancedSearch->toJson(), ","); // Field DRNAME
        $filterList = Concat($filterList, $this->BTIME->AdvancedSearch->toJson(), ","); // Field BTIME
        $filterList = Concat($filterList, $this->ONO->AdvancedSearch->toJson(), ","); // Field ONO
        $filterList = Concat($filterList, $this->ODT->AdvancedSearch->toJson(), ","); // Field ODT
        $filterList = Concat($filterList, $this->PURRT->AdvancedSearch->toJson(), ","); // Field PURRT
        $filterList = Concat($filterList, $this->GRP->AdvancedSearch->toJson(), ","); // Field GRP
        $filterList = Concat($filterList, $this->IBATCH->AdvancedSearch->toJson(), ","); // Field IBATCH
        $filterList = Concat($filterList, $this->IPNO->AdvancedSearch->toJson(), ","); // Field IPNO
        $filterList = Concat($filterList, $this->OPNO->AdvancedSearch->toJson(), ","); // Field OPNO
        $filterList = Concat($filterList, $this->RECID->AdvancedSearch->toJson(), ","); // Field RECID
        $filterList = Concat($filterList, $this->FQTY->AdvancedSearch->toJson(), ","); // Field FQTY
        $filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
        $filterList = Concat($filterList, $this->DCID->AdvancedSearch->toJson(), ","); // Field DCID
        $filterList = Concat($filterList, $this->_USERID->AdvancedSearch->toJson(), ","); // Field USERID
        $filterList = Concat($filterList, $this->MODDT->AdvancedSearch->toJson(), ","); // Field MODDT
        $filterList = Concat($filterList, $this->FYM->AdvancedSearch->toJson(), ","); // Field FYM
        $filterList = Concat($filterList, $this->PRCBATCH->AdvancedSearch->toJson(), ","); // Field PRCBATCH
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->BILLYM->AdvancedSearch->toJson(), ","); // Field BILLYM
        $filterList = Concat($filterList, $this->BILLGRP->AdvancedSearch->toJson(), ","); // Field BILLGRP
        $filterList = Concat($filterList, $this->STAFF->AdvancedSearch->toJson(), ","); // Field STAFF
        $filterList = Concat($filterList, $this->TEMPIPNO->AdvancedSearch->toJson(), ","); // Field TEMPIPNO
        $filterList = Concat($filterList, $this->PRNTED->AdvancedSearch->toJson(), ","); // Field PRNTED
        $filterList = Concat($filterList, $this->PATNAME->AdvancedSearch->toJson(), ","); // Field PATNAME
        $filterList = Concat($filterList, $this->PJVNO->AdvancedSearch->toJson(), ","); // Field PJVNO
        $filterList = Concat($filterList, $this->PJVSLNO->AdvancedSearch->toJson(), ","); // Field PJVSLNO
        $filterList = Concat($filterList, $this->OTHDISC->AdvancedSearch->toJson(), ","); // Field OTHDISC
        $filterList = Concat($filterList, $this->PJVYM->AdvancedSearch->toJson(), ","); // Field PJVYM
        $filterList = Concat($filterList, $this->PURDISCPER->AdvancedSearch->toJson(), ","); // Field PURDISCPER
        $filterList = Concat($filterList, $this->CASHIER->AdvancedSearch->toJson(), ","); // Field CASHIER
        $filterList = Concat($filterList, $this->CASHTIME->AdvancedSearch->toJson(), ","); // Field CASHTIME
        $filterList = Concat($filterList, $this->CASHRECD->AdvancedSearch->toJson(), ","); // Field CASHRECD
        $filterList = Concat($filterList, $this->CASHREFNO->AdvancedSearch->toJson(), ","); // Field CASHREFNO
        $filterList = Concat($filterList, $this->CASHIERSHIFT->AdvancedSearch->toJson(), ","); // Field CASHIERSHIFT
        $filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
        $filterList = Concat($filterList, $this->RELEASEBY->AdvancedSearch->toJson(), ","); // Field RELEASEBY
        $filterList = Concat($filterList, $this->CRAUTHOR->AdvancedSearch->toJson(), ","); // Field CRAUTHOR
        $filterList = Concat($filterList, $this->PAYMENT->AdvancedSearch->toJson(), ","); // Field PAYMENT
        $filterList = Concat($filterList, $this->DRID->AdvancedSearch->toJson(), ","); // Field DRID
        $filterList = Concat($filterList, $this->WARD->AdvancedSearch->toJson(), ","); // Field WARD
        $filterList = Concat($filterList, $this->STAXTYPE->AdvancedSearch->toJson(), ","); // Field STAXTYPE
        $filterList = Concat($filterList, $this->PURDISCVAL->AdvancedSearch->toJson(), ","); // Field PURDISCVAL
        $filterList = Concat($filterList, $this->RNDOFF->AdvancedSearch->toJson(), ","); // Field RNDOFF
        $filterList = Concat($filterList, $this->DISCONMRP->AdvancedSearch->toJson(), ","); // Field DISCONMRP
        $filterList = Concat($filterList, $this->DELVDT->AdvancedSearch->toJson(), ","); // Field DELVDT
        $filterList = Concat($filterList, $this->DELVTIME->AdvancedSearch->toJson(), ","); // Field DELVTIME
        $filterList = Concat($filterList, $this->DELVBY->AdvancedSearch->toJson(), ","); // Field DELVBY
        $filterList = Concat($filterList, $this->HOSPNO->AdvancedSearch->toJson(), ","); // Field HOSPNO
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->pbv->AdvancedSearch->toJson(), ","); // Field pbv
        $filterList = Concat($filterList, $this->pbt->AdvancedSearch->toJson(), ","); // Field pbt
        $filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->BRNAME->AdvancedSearch->toJson(), ","); // Field BRNAME
        $filterList = Concat($filterList, $this->sretid->AdvancedSearch->toJson(), ","); // Field sretid
        $filterList = Concat($filterList, $this->sprid->AdvancedSearch->toJson(), ","); // Field sprid
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_pharmacy_pharled_returnlistsrch", $filters);
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

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field TYPE
        $this->TYPE->AdvancedSearch->SearchValue = @$filter["x_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator = @$filter["z_TYPE"];
        $this->TYPE->AdvancedSearch->SearchCondition = @$filter["v_TYPE"];
        $this->TYPE->AdvancedSearch->SearchValue2 = @$filter["y_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TYPE"];
        $this->TYPE->AdvancedSearch->save();

        // Field DN
        $this->DN->AdvancedSearch->SearchValue = @$filter["x_DN"];
        $this->DN->AdvancedSearch->SearchOperator = @$filter["z_DN"];
        $this->DN->AdvancedSearch->SearchCondition = @$filter["v_DN"];
        $this->DN->AdvancedSearch->SearchValue2 = @$filter["y_DN"];
        $this->DN->AdvancedSearch->SearchOperator2 = @$filter["w_DN"];
        $this->DN->AdvancedSearch->save();

        // Field RDN
        $this->RDN->AdvancedSearch->SearchValue = @$filter["x_RDN"];
        $this->RDN->AdvancedSearch->SearchOperator = @$filter["z_RDN"];
        $this->RDN->AdvancedSearch->SearchCondition = @$filter["v_RDN"];
        $this->RDN->AdvancedSearch->SearchValue2 = @$filter["y_RDN"];
        $this->RDN->AdvancedSearch->SearchOperator2 = @$filter["w_RDN"];
        $this->RDN->AdvancedSearch->save();

        // Field DT
        $this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
        $this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
        $this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
        $this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
        $this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
        $this->DT->AdvancedSearch->save();

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

        // Field OQ
        $this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
        $this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
        $this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
        $this->OQ->AdvancedSearch->save();

        // Field SiNo
        $this->SiNo->AdvancedSearch->SearchValue = @$filter["x_SiNo"];
        $this->SiNo->AdvancedSearch->SearchOperator = @$filter["z_SiNo"];
        $this->SiNo->AdvancedSearch->SearchCondition = @$filter["v_SiNo"];
        $this->SiNo->AdvancedSearch->SearchValue2 = @$filter["y_SiNo"];
        $this->SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_SiNo"];
        $this->SiNo->AdvancedSearch->save();

        // Field RQ
        $this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
        $this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
        $this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
        $this->RQ->AdvancedSearch->save();

        // Field Product
        $this->Product->AdvancedSearch->SearchValue = @$filter["x_Product"];
        $this->Product->AdvancedSearch->SearchOperator = @$filter["z_Product"];
        $this->Product->AdvancedSearch->SearchCondition = @$filter["v_Product"];
        $this->Product->AdvancedSearch->SearchValue2 = @$filter["y_Product"];
        $this->Product->AdvancedSearch->SearchOperator2 = @$filter["w_Product"];
        $this->Product->AdvancedSearch->save();

        // Field SLNO
        $this->SLNO->AdvancedSearch->SearchValue = @$filter["x_SLNO"];
        $this->SLNO->AdvancedSearch->SearchOperator = @$filter["z_SLNO"];
        $this->SLNO->AdvancedSearch->SearchCondition = @$filter["v_SLNO"];
        $this->SLNO->AdvancedSearch->SearchValue2 = @$filter["y_SLNO"];
        $this->SLNO->AdvancedSearch->SearchOperator2 = @$filter["w_SLNO"];
        $this->SLNO->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field MRQ
        $this->MRQ->AdvancedSearch->SearchValue = @$filter["x_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator = @$filter["z_MRQ"];
        $this->MRQ->AdvancedSearch->SearchCondition = @$filter["v_MRQ"];
        $this->MRQ->AdvancedSearch->SearchValue2 = @$filter["y_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator2 = @$filter["w_MRQ"];
        $this->MRQ->AdvancedSearch->save();

        // Field IQ
        $this->IQ->AdvancedSearch->SearchValue = @$filter["x_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator = @$filter["z_IQ"];
        $this->IQ->AdvancedSearch->SearchCondition = @$filter["v_IQ"];
        $this->IQ->AdvancedSearch->SearchValue2 = @$filter["y_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator2 = @$filter["w_IQ"];
        $this->IQ->AdvancedSearch->save();

        // Field DAMT
        $this->DAMT->AdvancedSearch->SearchValue = @$filter["x_DAMT"];
        $this->DAMT->AdvancedSearch->SearchOperator = @$filter["z_DAMT"];
        $this->DAMT->AdvancedSearch->SearchCondition = @$filter["v_DAMT"];
        $this->DAMT->AdvancedSearch->SearchValue2 = @$filter["y_DAMT"];
        $this->DAMT->AdvancedSearch->SearchOperator2 = @$filter["w_DAMT"];
        $this->DAMT->AdvancedSearch->save();

        // Field BATCHNO
        $this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->save();

        // Field EXPDT
        $this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
        $this->EXPDT->AdvancedSearch->save();

        // Field Mfg
        $this->Mfg->AdvancedSearch->SearchValue = @$filter["x_Mfg"];
        $this->Mfg->AdvancedSearch->SearchOperator = @$filter["z_Mfg"];
        $this->Mfg->AdvancedSearch->SearchCondition = @$filter["v_Mfg"];
        $this->Mfg->AdvancedSearch->SearchValue2 = @$filter["y_Mfg"];
        $this->Mfg->AdvancedSearch->SearchOperator2 = @$filter["w_Mfg"];
        $this->Mfg->AdvancedSearch->save();

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

        // Field VALUE
        $this->VALUE->AdvancedSearch->SearchValue = @$filter["x_VALUE"];
        $this->VALUE->AdvancedSearch->SearchOperator = @$filter["z_VALUE"];
        $this->VALUE->AdvancedSearch->SearchCondition = @$filter["v_VALUE"];
        $this->VALUE->AdvancedSearch->SearchValue2 = @$filter["y_VALUE"];
        $this->VALUE->AdvancedSearch->SearchOperator2 = @$filter["w_VALUE"];
        $this->VALUE->AdvancedSearch->save();

        // Field DISC
        $this->DISC->AdvancedSearch->SearchValue = @$filter["x_DISC"];
        $this->DISC->AdvancedSearch->SearchOperator = @$filter["z_DISC"];
        $this->DISC->AdvancedSearch->SearchCondition = @$filter["v_DISC"];
        $this->DISC->AdvancedSearch->SearchValue2 = @$filter["y_DISC"];
        $this->DISC->AdvancedSearch->SearchOperator2 = @$filter["w_DISC"];
        $this->DISC->AdvancedSearch->save();

        // Field TAXP
        $this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
        $this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
        $this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
        $this->TAXP->AdvancedSearch->save();

        // Field TAX
        $this->TAX->AdvancedSearch->SearchValue = @$filter["x_TAX"];
        $this->TAX->AdvancedSearch->SearchOperator = @$filter["z_TAX"];
        $this->TAX->AdvancedSearch->SearchCondition = @$filter["v_TAX"];
        $this->TAX->AdvancedSearch->SearchValue2 = @$filter["y_TAX"];
        $this->TAX->AdvancedSearch->SearchOperator2 = @$filter["w_TAX"];
        $this->TAX->AdvancedSearch->save();

        // Field TAXR
        $this->TAXR->AdvancedSearch->SearchValue = @$filter["x_TAXR"];
        $this->TAXR->AdvancedSearch->SearchOperator = @$filter["z_TAXR"];
        $this->TAXR->AdvancedSearch->SearchCondition = @$filter["v_TAXR"];
        $this->TAXR->AdvancedSearch->SearchValue2 = @$filter["y_TAXR"];
        $this->TAXR->AdvancedSearch->SearchOperator2 = @$filter["w_TAXR"];
        $this->TAXR->AdvancedSearch->save();

        // Field EMPNO
        $this->EMPNO->AdvancedSearch->SearchValue = @$filter["x_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchOperator = @$filter["z_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchCondition = @$filter["v_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchValue2 = @$filter["y_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchOperator2 = @$filter["w_EMPNO"];
        $this->EMPNO->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field DRNAME
        $this->DRNAME->AdvancedSearch->SearchValue = @$filter["x_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchOperator = @$filter["z_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchCondition = @$filter["v_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchValue2 = @$filter["y_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_DRNAME"];
        $this->DRNAME->AdvancedSearch->save();

        // Field BTIME
        $this->BTIME->AdvancedSearch->SearchValue = @$filter["x_BTIME"];
        $this->BTIME->AdvancedSearch->SearchOperator = @$filter["z_BTIME"];
        $this->BTIME->AdvancedSearch->SearchCondition = @$filter["v_BTIME"];
        $this->BTIME->AdvancedSearch->SearchValue2 = @$filter["y_BTIME"];
        $this->BTIME->AdvancedSearch->SearchOperator2 = @$filter["w_BTIME"];
        $this->BTIME->AdvancedSearch->save();

        // Field ONO
        $this->ONO->AdvancedSearch->SearchValue = @$filter["x_ONO"];
        $this->ONO->AdvancedSearch->SearchOperator = @$filter["z_ONO"];
        $this->ONO->AdvancedSearch->SearchCondition = @$filter["v_ONO"];
        $this->ONO->AdvancedSearch->SearchValue2 = @$filter["y_ONO"];
        $this->ONO->AdvancedSearch->SearchOperator2 = @$filter["w_ONO"];
        $this->ONO->AdvancedSearch->save();

        // Field ODT
        $this->ODT->AdvancedSearch->SearchValue = @$filter["x_ODT"];
        $this->ODT->AdvancedSearch->SearchOperator = @$filter["z_ODT"];
        $this->ODT->AdvancedSearch->SearchCondition = @$filter["v_ODT"];
        $this->ODT->AdvancedSearch->SearchValue2 = @$filter["y_ODT"];
        $this->ODT->AdvancedSearch->SearchOperator2 = @$filter["w_ODT"];
        $this->ODT->AdvancedSearch->save();

        // Field PURRT
        $this->PURRT->AdvancedSearch->SearchValue = @$filter["x_PURRT"];
        $this->PURRT->AdvancedSearch->SearchOperator = @$filter["z_PURRT"];
        $this->PURRT->AdvancedSearch->SearchCondition = @$filter["v_PURRT"];
        $this->PURRT->AdvancedSearch->SearchValue2 = @$filter["y_PURRT"];
        $this->PURRT->AdvancedSearch->SearchOperator2 = @$filter["w_PURRT"];
        $this->PURRT->AdvancedSearch->save();

        // Field GRP
        $this->GRP->AdvancedSearch->SearchValue = @$filter["x_GRP"];
        $this->GRP->AdvancedSearch->SearchOperator = @$filter["z_GRP"];
        $this->GRP->AdvancedSearch->SearchCondition = @$filter["v_GRP"];
        $this->GRP->AdvancedSearch->SearchValue2 = @$filter["y_GRP"];
        $this->GRP->AdvancedSearch->SearchOperator2 = @$filter["w_GRP"];
        $this->GRP->AdvancedSearch->save();

        // Field IBATCH
        $this->IBATCH->AdvancedSearch->SearchValue = @$filter["x_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchOperator = @$filter["z_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchCondition = @$filter["v_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchValue2 = @$filter["y_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_IBATCH"];
        $this->IBATCH->AdvancedSearch->save();

        // Field IPNO
        $this->IPNO->AdvancedSearch->SearchValue = @$filter["x_IPNO"];
        $this->IPNO->AdvancedSearch->SearchOperator = @$filter["z_IPNO"];
        $this->IPNO->AdvancedSearch->SearchCondition = @$filter["v_IPNO"];
        $this->IPNO->AdvancedSearch->SearchValue2 = @$filter["y_IPNO"];
        $this->IPNO->AdvancedSearch->SearchOperator2 = @$filter["w_IPNO"];
        $this->IPNO->AdvancedSearch->save();

        // Field OPNO
        $this->OPNO->AdvancedSearch->SearchValue = @$filter["x_OPNO"];
        $this->OPNO->AdvancedSearch->SearchOperator = @$filter["z_OPNO"];
        $this->OPNO->AdvancedSearch->SearchCondition = @$filter["v_OPNO"];
        $this->OPNO->AdvancedSearch->SearchValue2 = @$filter["y_OPNO"];
        $this->OPNO->AdvancedSearch->SearchOperator2 = @$filter["w_OPNO"];
        $this->OPNO->AdvancedSearch->save();

        // Field RECID
        $this->RECID->AdvancedSearch->SearchValue = @$filter["x_RECID"];
        $this->RECID->AdvancedSearch->SearchOperator = @$filter["z_RECID"];
        $this->RECID->AdvancedSearch->SearchCondition = @$filter["v_RECID"];
        $this->RECID->AdvancedSearch->SearchValue2 = @$filter["y_RECID"];
        $this->RECID->AdvancedSearch->SearchOperator2 = @$filter["w_RECID"];
        $this->RECID->AdvancedSearch->save();

        // Field FQTY
        $this->FQTY->AdvancedSearch->SearchValue = @$filter["x_FQTY"];
        $this->FQTY->AdvancedSearch->SearchOperator = @$filter["z_FQTY"];
        $this->FQTY->AdvancedSearch->SearchCondition = @$filter["v_FQTY"];
        $this->FQTY->AdvancedSearch->SearchValue2 = @$filter["y_FQTY"];
        $this->FQTY->AdvancedSearch->SearchOperator2 = @$filter["w_FQTY"];
        $this->FQTY->AdvancedSearch->save();

        // Field UR
        $this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
        $this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
        $this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
        $this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
        $this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
        $this->UR->AdvancedSearch->save();

        // Field DCID
        $this->DCID->AdvancedSearch->SearchValue = @$filter["x_DCID"];
        $this->DCID->AdvancedSearch->SearchOperator = @$filter["z_DCID"];
        $this->DCID->AdvancedSearch->SearchCondition = @$filter["v_DCID"];
        $this->DCID->AdvancedSearch->SearchValue2 = @$filter["y_DCID"];
        $this->DCID->AdvancedSearch->SearchOperator2 = @$filter["w_DCID"];
        $this->DCID->AdvancedSearch->save();

        // Field USERID
        $this->_USERID->AdvancedSearch->SearchValue = @$filter["x__USERID"];
        $this->_USERID->AdvancedSearch->SearchOperator = @$filter["z__USERID"];
        $this->_USERID->AdvancedSearch->SearchCondition = @$filter["v__USERID"];
        $this->_USERID->AdvancedSearch->SearchValue2 = @$filter["y__USERID"];
        $this->_USERID->AdvancedSearch->SearchOperator2 = @$filter["w__USERID"];
        $this->_USERID->AdvancedSearch->save();

        // Field MODDT
        $this->MODDT->AdvancedSearch->SearchValue = @$filter["x_MODDT"];
        $this->MODDT->AdvancedSearch->SearchOperator = @$filter["z_MODDT"];
        $this->MODDT->AdvancedSearch->SearchCondition = @$filter["v_MODDT"];
        $this->MODDT->AdvancedSearch->SearchValue2 = @$filter["y_MODDT"];
        $this->MODDT->AdvancedSearch->SearchOperator2 = @$filter["w_MODDT"];
        $this->MODDT->AdvancedSearch->save();

        // Field FYM
        $this->FYM->AdvancedSearch->SearchValue = @$filter["x_FYM"];
        $this->FYM->AdvancedSearch->SearchOperator = @$filter["z_FYM"];
        $this->FYM->AdvancedSearch->SearchCondition = @$filter["v_FYM"];
        $this->FYM->AdvancedSearch->SearchValue2 = @$filter["y_FYM"];
        $this->FYM->AdvancedSearch->SearchOperator2 = @$filter["w_FYM"];
        $this->FYM->AdvancedSearch->save();

        // Field PRCBATCH
        $this->PRCBATCH->AdvancedSearch->SearchValue = @$filter["x_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchOperator = @$filter["z_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchCondition = @$filter["v_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchValue2 = @$filter["y_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field BILLYM
        $this->BILLYM->AdvancedSearch->SearchValue = @$filter["x_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchOperator = @$filter["z_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchCondition = @$filter["v_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchValue2 = @$filter["y_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchOperator2 = @$filter["w_BILLYM"];
        $this->BILLYM->AdvancedSearch->save();

        // Field BILLGRP
        $this->BILLGRP->AdvancedSearch->SearchValue = @$filter["x_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchOperator = @$filter["z_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchCondition = @$filter["v_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchValue2 = @$filter["y_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchOperator2 = @$filter["w_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->save();

        // Field STAFF
        $this->STAFF->AdvancedSearch->SearchValue = @$filter["x_STAFF"];
        $this->STAFF->AdvancedSearch->SearchOperator = @$filter["z_STAFF"];
        $this->STAFF->AdvancedSearch->SearchCondition = @$filter["v_STAFF"];
        $this->STAFF->AdvancedSearch->SearchValue2 = @$filter["y_STAFF"];
        $this->STAFF->AdvancedSearch->SearchOperator2 = @$filter["w_STAFF"];
        $this->STAFF->AdvancedSearch->save();

        // Field TEMPIPNO
        $this->TEMPIPNO->AdvancedSearch->SearchValue = @$filter["x_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchOperator = @$filter["z_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchCondition = @$filter["v_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchValue2 = @$filter["y_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->save();

        // Field PRNTED
        $this->PRNTED->AdvancedSearch->SearchValue = @$filter["x_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchOperator = @$filter["z_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchCondition = @$filter["v_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchValue2 = @$filter["y_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchOperator2 = @$filter["w_PRNTED"];
        $this->PRNTED->AdvancedSearch->save();

        // Field PATNAME
        $this->PATNAME->AdvancedSearch->SearchValue = @$filter["x_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchOperator = @$filter["z_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchCondition = @$filter["v_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchValue2 = @$filter["y_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchOperator2 = @$filter["w_PATNAME"];
        $this->PATNAME->AdvancedSearch->save();

        // Field PJVNO
        $this->PJVNO->AdvancedSearch->SearchValue = @$filter["x_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchOperator = @$filter["z_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchCondition = @$filter["v_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVNO"];
        $this->PJVNO->AdvancedSearch->save();

        // Field PJVSLNO
        $this->PJVSLNO->AdvancedSearch->SearchValue = @$filter["x_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchOperator = @$filter["z_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchCondition = @$filter["v_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->save();

        // Field OTHDISC
        $this->OTHDISC->AdvancedSearch->SearchValue = @$filter["x_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchOperator = @$filter["z_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchCondition = @$filter["v_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchValue2 = @$filter["y_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchOperator2 = @$filter["w_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->save();

        // Field PJVYM
        $this->PJVYM->AdvancedSearch->SearchValue = @$filter["x_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchOperator = @$filter["z_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchCondition = @$filter["v_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchValue2 = @$filter["y_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchOperator2 = @$filter["w_PJVYM"];
        $this->PJVYM->AdvancedSearch->save();

        // Field PURDISCPER
        $this->PURDISCPER->AdvancedSearch->SearchValue = @$filter["x_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchOperator = @$filter["z_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchCondition = @$filter["v_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->save();

        // Field CASHIER
        $this->CASHIER->AdvancedSearch->SearchValue = @$filter["x_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchOperator = @$filter["z_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchCondition = @$filter["v_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchValue2 = @$filter["y_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIER"];
        $this->CASHIER->AdvancedSearch->save();

        // Field CASHTIME
        $this->CASHTIME->AdvancedSearch->SearchValue = @$filter["x_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchOperator = @$filter["z_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchCondition = @$filter["v_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchValue2 = @$filter["y_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchOperator2 = @$filter["w_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->save();

        // Field CASHRECD
        $this->CASHRECD->AdvancedSearch->SearchValue = @$filter["x_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchOperator = @$filter["z_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchCondition = @$filter["v_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchValue2 = @$filter["y_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchOperator2 = @$filter["w_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->save();

        // Field CASHREFNO
        $this->CASHREFNO->AdvancedSearch->SearchValue = @$filter["x_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchOperator = @$filter["z_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchCondition = @$filter["v_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchValue2 = @$filter["y_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchOperator2 = @$filter["w_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->save();

        // Field CASHIERSHIFT
        $this->CASHIERSHIFT->AdvancedSearch->SearchValue = @$filter["x_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchOperator = @$filter["z_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchCondition = @$filter["v_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchValue2 = @$filter["y_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->save();

        // Field PRCODE
        $this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
        $this->PRCODE->AdvancedSearch->save();

        // Field RELEASEBY
        $this->RELEASEBY->AdvancedSearch->SearchValue = @$filter["x_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchOperator = @$filter["z_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchCondition = @$filter["v_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchValue2 = @$filter["y_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchOperator2 = @$filter["w_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->save();

        // Field CRAUTHOR
        $this->CRAUTHOR->AdvancedSearch->SearchValue = @$filter["x_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchOperator = @$filter["z_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchCondition = @$filter["v_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchValue2 = @$filter["y_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchOperator2 = @$filter["w_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->save();

        // Field PAYMENT
        $this->PAYMENT->AdvancedSearch->SearchValue = @$filter["x_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchOperator = @$filter["z_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchCondition = @$filter["v_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchValue2 = @$filter["y_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchOperator2 = @$filter["w_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->save();

        // Field DRID
        $this->DRID->AdvancedSearch->SearchValue = @$filter["x_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator = @$filter["z_DRID"];
        $this->DRID->AdvancedSearch->SearchCondition = @$filter["v_DRID"];
        $this->DRID->AdvancedSearch->SearchValue2 = @$filter["y_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator2 = @$filter["w_DRID"];
        $this->DRID->AdvancedSearch->save();

        // Field WARD
        $this->WARD->AdvancedSearch->SearchValue = @$filter["x_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator = @$filter["z_WARD"];
        $this->WARD->AdvancedSearch->SearchCondition = @$filter["v_WARD"];
        $this->WARD->AdvancedSearch->SearchValue2 = @$filter["y_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator2 = @$filter["w_WARD"];
        $this->WARD->AdvancedSearch->save();

        // Field STAXTYPE
        $this->STAXTYPE->AdvancedSearch->SearchValue = @$filter["x_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchOperator = @$filter["z_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchCondition = @$filter["v_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchValue2 = @$filter["y_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->save();

        // Field PURDISCVAL
        $this->PURDISCVAL->AdvancedSearch->SearchValue = @$filter["x_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchOperator = @$filter["z_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchCondition = @$filter["v_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->save();

        // Field RNDOFF
        $this->RNDOFF->AdvancedSearch->SearchValue = @$filter["x_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchOperator = @$filter["z_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchCondition = @$filter["v_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchValue2 = @$filter["y_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchOperator2 = @$filter["w_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->save();

        // Field DISCONMRP
        $this->DISCONMRP->AdvancedSearch->SearchValue = @$filter["x_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchOperator = @$filter["z_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchCondition = @$filter["v_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchValue2 = @$filter["y_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchOperator2 = @$filter["w_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->save();

        // Field DELVDT
        $this->DELVDT->AdvancedSearch->SearchValue = @$filter["x_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchOperator = @$filter["z_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchCondition = @$filter["v_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchValue2 = @$filter["y_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchOperator2 = @$filter["w_DELVDT"];
        $this->DELVDT->AdvancedSearch->save();

        // Field DELVTIME
        $this->DELVTIME->AdvancedSearch->SearchValue = @$filter["x_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchOperator = @$filter["z_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchCondition = @$filter["v_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchValue2 = @$filter["y_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchOperator2 = @$filter["w_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->save();

        // Field DELVBY
        $this->DELVBY->AdvancedSearch->SearchValue = @$filter["x_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchOperator = @$filter["z_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchCondition = @$filter["v_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchValue2 = @$filter["y_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchOperator2 = @$filter["w_DELVBY"];
        $this->DELVBY->AdvancedSearch->save();

        // Field HOSPNO
        $this->HOSPNO->AdvancedSearch->SearchValue = @$filter["x_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchOperator = @$filter["z_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchCondition = @$filter["v_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchValue2 = @$filter["y_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchOperator2 = @$filter["w_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field pbv
        $this->pbv->AdvancedSearch->SearchValue = @$filter["x_pbv"];
        $this->pbv->AdvancedSearch->SearchOperator = @$filter["z_pbv"];
        $this->pbv->AdvancedSearch->SearchCondition = @$filter["v_pbv"];
        $this->pbv->AdvancedSearch->SearchValue2 = @$filter["y_pbv"];
        $this->pbv->AdvancedSearch->SearchOperator2 = @$filter["w_pbv"];
        $this->pbv->AdvancedSearch->save();

        // Field pbt
        $this->pbt->AdvancedSearch->SearchValue = @$filter["x_pbt"];
        $this->pbt->AdvancedSearch->SearchOperator = @$filter["z_pbt"];
        $this->pbt->AdvancedSearch->SearchCondition = @$filter["v_pbt"];
        $this->pbt->AdvancedSearch->SearchValue2 = @$filter["y_pbt"];
        $this->pbt->AdvancedSearch->SearchOperator2 = @$filter["w_pbt"];
        $this->pbt->AdvancedSearch->save();

        // Field HosoID
        $this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
        $this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
        $this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
        $this->HosoID->AdvancedSearch->save();

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

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

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

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field BRNAME
        $this->BRNAME->AdvancedSearch->SearchValue = @$filter["x_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchOperator = @$filter["z_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchCondition = @$filter["v_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchValue2 = @$filter["y_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_BRNAME"];
        $this->BRNAME->AdvancedSearch->save();

        // Field sretid
        $this->sretid->AdvancedSearch->SearchValue = @$filter["x_sretid"];
        $this->sretid->AdvancedSearch->SearchOperator = @$filter["z_sretid"];
        $this->sretid->AdvancedSearch->SearchCondition = @$filter["v_sretid"];
        $this->sretid->AdvancedSearch->SearchValue2 = @$filter["y_sretid"];
        $this->sretid->AdvancedSearch->SearchOperator2 = @$filter["w_sretid"];
        $this->sretid->AdvancedSearch->save();

        // Field sprid
        $this->sprid->AdvancedSearch->SearchValue = @$filter["x_sprid"];
        $this->sprid->AdvancedSearch->SearchOperator = @$filter["z_sprid"];
        $this->sprid->AdvancedSearch->SearchCondition = @$filter["v_sprid"];
        $this->sprid->AdvancedSearch->SearchValue2 = @$filter["y_sprid"];
        $this->sprid->AdvancedSearch->SearchOperator2 = @$filter["w_sprid"];
        $this->sprid->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->BRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RDN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Product, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mfg, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EMPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DRNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ONO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IBATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RECID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DCID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_USERID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCBATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLGRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->STAFF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TEMPIPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRNTED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PATNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVSLNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHIER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHREFNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHIERSHIFT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RELEASEBY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CRAUTHOR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PAYMENT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DRID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WARD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->STAXTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DELVTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DELVBY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HOSPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BRNAME, $arKeywords, $type);
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
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->SiNo); // SiNo
            $this->updateSort($this->Product); // Product
            $this->updateSort($this->SLNO); // SLNO
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->MRQ); // MRQ
            $this->updateSort($this->IQ); // IQ
            $this->updateSort($this->DAMT); // DAMT
            $this->updateSort($this->BATCHNO); // BATCHNO
            $this->updateSort($this->EXPDT); // EXPDT
            $this->updateSort($this->Mfg); // Mfg
            $this->updateSort($this->UR); // UR
            $this->updateSort($this->_USERID); // USERID
            $this->updateSort($this->id); // id
            $this->updateSort($this->HosoID); // HosoID
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->BRNAME); // BRNAME
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
                        $this->sretid->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->BRCODE->setSort("");
                $this->TYPE->setSort("");
                $this->DN->setSort("");
                $this->RDN->setSort("");
                $this->DT->setSort("");
                $this->PRC->setSort("");
                $this->OQ->setSort("");
                $this->SiNo->setSort("");
                $this->RQ->setSort("");
                $this->Product->setSort("");
                $this->SLNO->setSort("");
                $this->RT->setSort("");
                $this->MRQ->setSort("");
                $this->IQ->setSort("");
                $this->DAMT->setSort("");
                $this->BATCHNO->setSort("");
                $this->EXPDT->setSort("");
                $this->Mfg->setSort("");
                $this->BILLNO->setSort("");
                $this->BILLDT->setSort("");
                $this->VALUE->setSort("");
                $this->DISC->setSort("");
                $this->TAXP->setSort("");
                $this->TAX->setSort("");
                $this->TAXR->setSort("");
                $this->EMPNO->setSort("");
                $this->PC->setSort("");
                $this->DRNAME->setSort("");
                $this->BTIME->setSort("");
                $this->ONO->setSort("");
                $this->ODT->setSort("");
                $this->PURRT->setSort("");
                $this->GRP->setSort("");
                $this->IBATCH->setSort("");
                $this->IPNO->setSort("");
                $this->OPNO->setSort("");
                $this->RECID->setSort("");
                $this->FQTY->setSort("");
                $this->UR->setSort("");
                $this->DCID->setSort("");
                $this->_USERID->setSort("");
                $this->MODDT->setSort("");
                $this->FYM->setSort("");
                $this->PRCBATCH->setSort("");
                $this->MRP->setSort("");
                $this->BILLYM->setSort("");
                $this->BILLGRP->setSort("");
                $this->STAFF->setSort("");
                $this->TEMPIPNO->setSort("");
                $this->PRNTED->setSort("");
                $this->PATNAME->setSort("");
                $this->PJVNO->setSort("");
                $this->PJVSLNO->setSort("");
                $this->OTHDISC->setSort("");
                $this->PJVYM->setSort("");
                $this->PURDISCPER->setSort("");
                $this->CASHIER->setSort("");
                $this->CASHTIME->setSort("");
                $this->CASHRECD->setSort("");
                $this->CASHREFNO->setSort("");
                $this->CASHIERSHIFT->setSort("");
                $this->PRCODE->setSort("");
                $this->RELEASEBY->setSort("");
                $this->CRAUTHOR->setSort("");
                $this->PAYMENT->setSort("");
                $this->DRID->setSort("");
                $this->WARD->setSort("");
                $this->STAXTYPE->setSort("");
                $this->PURDISCVAL->setSort("");
                $this->RNDOFF->setSort("");
                $this->DISCONMRP->setSort("");
                $this->DELVDT->setSort("");
                $this->DELVTIME->setSort("");
                $this->DELVBY->setSort("");
                $this->HOSPNO->setSort("");
                $this->id->setSort("");
                $this->pbv->setSort("");
                $this->pbt->setSort("");
                $this->HosoID->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->MFRCODE->setSort("");
                $this->Reception->setSort("");
                $this->PatID->setSort("");
                $this->mrnno->setSort("");
                $this->BRNAME->setSort("");
                $this->sretid->setSort("");
                $this->sprid->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_pharmacy_pharled_returnlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_pharmacy_pharled_returnlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_pharmacy_pharled_returnlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->TYPE->CurrentValue = null;
        $this->TYPE->OldValue = $this->TYPE->CurrentValue;
        $this->DN->CurrentValue = null;
        $this->DN->OldValue = $this->DN->CurrentValue;
        $this->RDN->CurrentValue = null;
        $this->RDN->OldValue = $this->RDN->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->OQ->CurrentValue = null;
        $this->OQ->OldValue = $this->OQ->CurrentValue;
        $this->SiNo->CurrentValue = null;
        $this->SiNo->OldValue = $this->SiNo->CurrentValue;
        $this->RQ->CurrentValue = null;
        $this->RQ->OldValue = $this->RQ->CurrentValue;
        $this->Product->CurrentValue = null;
        $this->Product->OldValue = $this->Product->CurrentValue;
        $this->SLNO->CurrentValue = null;
        $this->SLNO->OldValue = $this->SLNO->CurrentValue;
        $this->RT->CurrentValue = null;
        $this->RT->OldValue = $this->RT->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->DAMT->CurrentValue = null;
        $this->DAMT->OldValue = $this->DAMT->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->Mfg->CurrentValue = null;
        $this->Mfg->OldValue = $this->Mfg->CurrentValue;
        $this->BILLNO->CurrentValue = null;
        $this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
        $this->BILLDT->CurrentValue = null;
        $this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
        $this->VALUE->CurrentValue = null;
        $this->VALUE->OldValue = $this->VALUE->CurrentValue;
        $this->DISC->CurrentValue = null;
        $this->DISC->OldValue = $this->DISC->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->TAX->CurrentValue = null;
        $this->TAX->OldValue = $this->TAX->CurrentValue;
        $this->TAXR->CurrentValue = null;
        $this->TAXR->OldValue = $this->TAXR->CurrentValue;
        $this->EMPNO->CurrentValue = null;
        $this->EMPNO->OldValue = $this->EMPNO->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->DRNAME->CurrentValue = null;
        $this->DRNAME->OldValue = $this->DRNAME->CurrentValue;
        $this->BTIME->CurrentValue = null;
        $this->BTIME->OldValue = $this->BTIME->CurrentValue;
        $this->ONO->CurrentValue = null;
        $this->ONO->OldValue = $this->ONO->CurrentValue;
        $this->ODT->CurrentValue = null;
        $this->ODT->OldValue = $this->ODT->CurrentValue;
        $this->PURRT->CurrentValue = null;
        $this->PURRT->OldValue = $this->PURRT->CurrentValue;
        $this->GRP->CurrentValue = null;
        $this->GRP->OldValue = $this->GRP->CurrentValue;
        $this->IBATCH->CurrentValue = null;
        $this->IBATCH->OldValue = $this->IBATCH->CurrentValue;
        $this->IPNO->CurrentValue = null;
        $this->IPNO->OldValue = $this->IPNO->CurrentValue;
        $this->OPNO->CurrentValue = null;
        $this->OPNO->OldValue = $this->OPNO->CurrentValue;
        $this->RECID->CurrentValue = null;
        $this->RECID->OldValue = $this->RECID->CurrentValue;
        $this->FQTY->CurrentValue = null;
        $this->FQTY->OldValue = $this->FQTY->CurrentValue;
        $this->UR->CurrentValue = null;
        $this->UR->OldValue = $this->UR->CurrentValue;
        $this->DCID->CurrentValue = null;
        $this->DCID->OldValue = $this->DCID->CurrentValue;
        $this->_USERID->CurrentValue = null;
        $this->_USERID->OldValue = $this->_USERID->CurrentValue;
        $this->MODDT->CurrentValue = null;
        $this->MODDT->OldValue = $this->MODDT->CurrentValue;
        $this->FYM->CurrentValue = null;
        $this->FYM->OldValue = $this->FYM->CurrentValue;
        $this->PRCBATCH->CurrentValue = null;
        $this->PRCBATCH->OldValue = $this->PRCBATCH->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->BILLYM->CurrentValue = null;
        $this->BILLYM->OldValue = $this->BILLYM->CurrentValue;
        $this->BILLGRP->CurrentValue = null;
        $this->BILLGRP->OldValue = $this->BILLGRP->CurrentValue;
        $this->STAFF->CurrentValue = null;
        $this->STAFF->OldValue = $this->STAFF->CurrentValue;
        $this->TEMPIPNO->CurrentValue = null;
        $this->TEMPIPNO->OldValue = $this->TEMPIPNO->CurrentValue;
        $this->PRNTED->CurrentValue = null;
        $this->PRNTED->OldValue = $this->PRNTED->CurrentValue;
        $this->PATNAME->CurrentValue = null;
        $this->PATNAME->OldValue = $this->PATNAME->CurrentValue;
        $this->PJVNO->CurrentValue = null;
        $this->PJVNO->OldValue = $this->PJVNO->CurrentValue;
        $this->PJVSLNO->CurrentValue = null;
        $this->PJVSLNO->OldValue = $this->PJVSLNO->CurrentValue;
        $this->OTHDISC->CurrentValue = null;
        $this->OTHDISC->OldValue = $this->OTHDISC->CurrentValue;
        $this->PJVYM->CurrentValue = null;
        $this->PJVYM->OldValue = $this->PJVYM->CurrentValue;
        $this->PURDISCPER->CurrentValue = null;
        $this->PURDISCPER->OldValue = $this->PURDISCPER->CurrentValue;
        $this->CASHIER->CurrentValue = null;
        $this->CASHIER->OldValue = $this->CASHIER->CurrentValue;
        $this->CASHTIME->CurrentValue = null;
        $this->CASHTIME->OldValue = $this->CASHTIME->CurrentValue;
        $this->CASHRECD->CurrentValue = null;
        $this->CASHRECD->OldValue = $this->CASHRECD->CurrentValue;
        $this->CASHREFNO->CurrentValue = null;
        $this->CASHREFNO->OldValue = $this->CASHREFNO->CurrentValue;
        $this->CASHIERSHIFT->CurrentValue = null;
        $this->CASHIERSHIFT->OldValue = $this->CASHIERSHIFT->CurrentValue;
        $this->PRCODE->CurrentValue = null;
        $this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
        $this->RELEASEBY->CurrentValue = null;
        $this->RELEASEBY->OldValue = $this->RELEASEBY->CurrentValue;
        $this->CRAUTHOR->CurrentValue = null;
        $this->CRAUTHOR->OldValue = $this->CRAUTHOR->CurrentValue;
        $this->PAYMENT->CurrentValue = null;
        $this->PAYMENT->OldValue = $this->PAYMENT->CurrentValue;
        $this->DRID->CurrentValue = null;
        $this->DRID->OldValue = $this->DRID->CurrentValue;
        $this->WARD->CurrentValue = null;
        $this->WARD->OldValue = $this->WARD->CurrentValue;
        $this->STAXTYPE->CurrentValue = null;
        $this->STAXTYPE->OldValue = $this->STAXTYPE->CurrentValue;
        $this->PURDISCVAL->CurrentValue = null;
        $this->PURDISCVAL->OldValue = $this->PURDISCVAL->CurrentValue;
        $this->RNDOFF->CurrentValue = null;
        $this->RNDOFF->OldValue = $this->RNDOFF->CurrentValue;
        $this->DISCONMRP->CurrentValue = null;
        $this->DISCONMRP->OldValue = $this->DISCONMRP->CurrentValue;
        $this->DELVDT->CurrentValue = null;
        $this->DELVDT->OldValue = $this->DELVDT->CurrentValue;
        $this->DELVTIME->CurrentValue = null;
        $this->DELVTIME->OldValue = $this->DELVTIME->CurrentValue;
        $this->DELVBY->CurrentValue = null;
        $this->DELVBY->OldValue = $this->DELVBY->CurrentValue;
        $this->HOSPNO->CurrentValue = null;
        $this->HOSPNO->OldValue = $this->HOSPNO->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->pbv->CurrentValue = null;
        $this->pbv->OldValue = $this->pbv->CurrentValue;
        $this->pbt->CurrentValue = null;
        $this->pbt->OldValue = $this->pbt->CurrentValue;
        $this->HosoID->CurrentValue = null;
        $this->HosoID->OldValue = $this->HosoID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->BRNAME->CurrentValue = null;
        $this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
        $this->sretid->CurrentValue = null;
        $this->sretid->OldValue = $this->sretid->CurrentValue;
        $this->sprid->CurrentValue = null;
        $this->sprid->OldValue = $this->sprid->CurrentValue;
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

        // Check field name 'SiNo' first before field var 'x_SiNo'
        $val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
        if (!$this->SiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SiNo->Visible = false; // Disable update for API request
            } else {
                $this->SiNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SiNo")) {
            $this->SiNo->setOldValue($CurrentForm->getValue("o_SiNo"));
        }

        // Check field name 'Product' first before field var 'x_Product'
        $val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
        if (!$this->Product->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Product->Visible = false; // Disable update for API request
            } else {
                $this->Product->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Product")) {
            $this->Product->setOldValue($CurrentForm->getValue("o_Product"));
        }

        // Check field name 'SLNO' first before field var 'x_SLNO'
        $val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
        if (!$this->SLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SLNO->Visible = false; // Disable update for API request
            } else {
                $this->SLNO->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SLNO")) {
            $this->SLNO->setOldValue($CurrentForm->getValue("o_SLNO"));
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

        // Check field name 'DAMT' first before field var 'x_DAMT'
        $val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
        if (!$this->DAMT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAMT->Visible = false; // Disable update for API request
            } else {
                $this->DAMT->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DAMT")) {
            $this->DAMT->setOldValue($CurrentForm->getValue("o_DAMT"));
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

        // Check field name 'Mfg' first before field var 'x_Mfg'
        $val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
        if (!$this->Mfg->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mfg->Visible = false; // Disable update for API request
            } else {
                $this->Mfg->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Mfg")) {
            $this->Mfg->setOldValue($CurrentForm->getValue("o_Mfg"));
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

        // Check field name 'USERID' first before field var 'x__USERID'
        $val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
        if (!$this->_USERID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_USERID->Visible = false; // Disable update for API request
            } else {
                $this->_USERID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o__USERID")) {
            $this->_USERID->setOldValue($CurrentForm->getValue("o__USERID"));
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }

        // Check field name 'HosoID' first before field var 'x_HosoID'
        $val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
        if (!$this->HosoID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HosoID->Visible = false; // Disable update for API request
            } else {
                $this->HosoID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HosoID")) {
            $this->HosoID->setOldValue($CurrentForm->getValue("o_HosoID"));
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
        if ($CurrentForm->hasValue("o_createdby")) {
            $this->createdby->setOldValue($CurrentForm->getValue("o_createdby"));
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
        if ($CurrentForm->hasValue("o_createddatetime")) {
            $this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));
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
        if ($CurrentForm->hasValue("o_modifiedby")) {
            $this->modifiedby->setOldValue($CurrentForm->getValue("o_modifiedby"));
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
        if ($CurrentForm->hasValue("o_modifieddatetime")) {
            $this->modifieddatetime->setOldValue($CurrentForm->getValue("o_modifieddatetime"));
        }

        // Check field name 'BRNAME' first before field var 'x_BRNAME'
        $val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
        if (!$this->BRNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRNAME->Visible = false; // Disable update for API request
            } else {
                $this->BRNAME->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BRNAME")) {
            $this->BRNAME->setOldValue($CurrentForm->getValue("o_BRNAME"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->SiNo->CurrentValue = $this->SiNo->FormValue;
        $this->Product->CurrentValue = $this->Product->FormValue;
        $this->SLNO->CurrentValue = $this->SLNO->FormValue;
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->MRQ->CurrentValue = $this->MRQ->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->DAMT->CurrentValue = $this->DAMT->FormValue;
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->Mfg->CurrentValue = $this->Mfg->FormValue;
        $this->UR->CurrentValue = $this->UR->FormValue;
        $this->_USERID->CurrentValue = $this->_USERID->FormValue;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->HosoID->CurrentValue = $this->HosoID->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
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
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DN->setDbValue($row['DN']);
        $this->RDN->setDbValue($row['RDN']);
        $this->DT->setDbValue($row['DT']);
        $this->PRC->setDbValue($row['PRC']);
        $this->OQ->setDbValue($row['OQ']);
        $this->SiNo->setDbValue($row['SiNo']);
        $this->RQ->setDbValue($row['RQ']);
        $this->Product->setDbValue($row['Product']);
        $this->SLNO->setDbValue($row['SLNO']);
        $this->RT->setDbValue($row['RT']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->DAMT->setDbValue($row['DAMT']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->Mfg->setDbValue($row['Mfg']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->VALUE->setDbValue($row['VALUE']);
        $this->DISC->setDbValue($row['DISC']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->TAX->setDbValue($row['TAX']);
        $this->TAXR->setDbValue($row['TAXR']);
        $this->EMPNO->setDbValue($row['EMPNO']);
        $this->PC->setDbValue($row['PC']);
        $this->DRNAME->setDbValue($row['DRNAME']);
        $this->BTIME->setDbValue($row['BTIME']);
        $this->ONO->setDbValue($row['ONO']);
        $this->ODT->setDbValue($row['ODT']);
        $this->PURRT->setDbValue($row['PURRT']);
        $this->GRP->setDbValue($row['GRP']);
        $this->IBATCH->setDbValue($row['IBATCH']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->RECID->setDbValue($row['RECID']);
        $this->FQTY->setDbValue($row['FQTY']);
        $this->UR->setDbValue($row['UR']);
        $this->DCID->setDbValue($row['DCID']);
        $this->_USERID->setDbValue($row['USERID']);
        $this->MODDT->setDbValue($row['MODDT']);
        $this->FYM->setDbValue($row['FYM']);
        $this->PRCBATCH->setDbValue($row['PRCBATCH']);
        $this->MRP->setDbValue($row['MRP']);
        $this->BILLYM->setDbValue($row['BILLYM']);
        $this->BILLGRP->setDbValue($row['BILLGRP']);
        $this->STAFF->setDbValue($row['STAFF']);
        $this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
        $this->PRNTED->setDbValue($row['PRNTED']);
        $this->PATNAME->setDbValue($row['PATNAME']);
        $this->PJVNO->setDbValue($row['PJVNO']);
        $this->PJVSLNO->setDbValue($row['PJVSLNO']);
        $this->OTHDISC->setDbValue($row['OTHDISC']);
        $this->PJVYM->setDbValue($row['PJVYM']);
        $this->PURDISCPER->setDbValue($row['PURDISCPER']);
        $this->CASHIER->setDbValue($row['CASHIER']);
        $this->CASHTIME->setDbValue($row['CASHTIME']);
        $this->CASHRECD->setDbValue($row['CASHRECD']);
        $this->CASHREFNO->setDbValue($row['CASHREFNO']);
        $this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->RELEASEBY->setDbValue($row['RELEASEBY']);
        $this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
        $this->PAYMENT->setDbValue($row['PAYMENT']);
        $this->DRID->setDbValue($row['DRID']);
        $this->WARD->setDbValue($row['WARD']);
        $this->STAXTYPE->setDbValue($row['STAXTYPE']);
        $this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
        $this->RNDOFF->setDbValue($row['RNDOFF']);
        $this->DISCONMRP->setDbValue($row['DISCONMRP']);
        $this->DELVDT->setDbValue($row['DELVDT']);
        $this->DELVTIME->setDbValue($row['DELVTIME']);
        $this->DELVBY->setDbValue($row['DELVBY']);
        $this->HOSPNO->setDbValue($row['HOSPNO']);
        $this->id->setDbValue($row['id']);
        $this->pbv->setDbValue($row['pbv']);
        $this->pbt->setDbValue($row['pbt']);
        $this->HosoID->setDbValue($row['HosoID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BRNAME->setDbValue($row['BRNAME']);
        $this->sretid->setDbValue($row['sretid']);
        $this->sprid->setDbValue($row['sprid']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['TYPE'] = $this->TYPE->CurrentValue;
        $row['DN'] = $this->DN->CurrentValue;
        $row['RDN'] = $this->RDN->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['SiNo'] = $this->SiNo->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['Product'] = $this->Product->CurrentValue;
        $row['SLNO'] = $this->SLNO->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['DAMT'] = $this->DAMT->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['Mfg'] = $this->Mfg->CurrentValue;
        $row['BILLNO'] = $this->BILLNO->CurrentValue;
        $row['BILLDT'] = $this->BILLDT->CurrentValue;
        $row['VALUE'] = $this->VALUE->CurrentValue;
        $row['DISC'] = $this->DISC->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['TAX'] = $this->TAX->CurrentValue;
        $row['TAXR'] = $this->TAXR->CurrentValue;
        $row['EMPNO'] = $this->EMPNO->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['DRNAME'] = $this->DRNAME->CurrentValue;
        $row['BTIME'] = $this->BTIME->CurrentValue;
        $row['ONO'] = $this->ONO->CurrentValue;
        $row['ODT'] = $this->ODT->CurrentValue;
        $row['PURRT'] = $this->PURRT->CurrentValue;
        $row['GRP'] = $this->GRP->CurrentValue;
        $row['IBATCH'] = $this->IBATCH->CurrentValue;
        $row['IPNO'] = $this->IPNO->CurrentValue;
        $row['OPNO'] = $this->OPNO->CurrentValue;
        $row['RECID'] = $this->RECID->CurrentValue;
        $row['FQTY'] = $this->FQTY->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['DCID'] = $this->DCID->CurrentValue;
        $row['USERID'] = $this->_USERID->CurrentValue;
        $row['MODDT'] = $this->MODDT->CurrentValue;
        $row['FYM'] = $this->FYM->CurrentValue;
        $row['PRCBATCH'] = $this->PRCBATCH->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['BILLYM'] = $this->BILLYM->CurrentValue;
        $row['BILLGRP'] = $this->BILLGRP->CurrentValue;
        $row['STAFF'] = $this->STAFF->CurrentValue;
        $row['TEMPIPNO'] = $this->TEMPIPNO->CurrentValue;
        $row['PRNTED'] = $this->PRNTED->CurrentValue;
        $row['PATNAME'] = $this->PATNAME->CurrentValue;
        $row['PJVNO'] = $this->PJVNO->CurrentValue;
        $row['PJVSLNO'] = $this->PJVSLNO->CurrentValue;
        $row['OTHDISC'] = $this->OTHDISC->CurrentValue;
        $row['PJVYM'] = $this->PJVYM->CurrentValue;
        $row['PURDISCPER'] = $this->PURDISCPER->CurrentValue;
        $row['CASHIER'] = $this->CASHIER->CurrentValue;
        $row['CASHTIME'] = $this->CASHTIME->CurrentValue;
        $row['CASHRECD'] = $this->CASHRECD->CurrentValue;
        $row['CASHREFNO'] = $this->CASHREFNO->CurrentValue;
        $row['CASHIERSHIFT'] = $this->CASHIERSHIFT->CurrentValue;
        $row['PRCODE'] = $this->PRCODE->CurrentValue;
        $row['RELEASEBY'] = $this->RELEASEBY->CurrentValue;
        $row['CRAUTHOR'] = $this->CRAUTHOR->CurrentValue;
        $row['PAYMENT'] = $this->PAYMENT->CurrentValue;
        $row['DRID'] = $this->DRID->CurrentValue;
        $row['WARD'] = $this->WARD->CurrentValue;
        $row['STAXTYPE'] = $this->STAXTYPE->CurrentValue;
        $row['PURDISCVAL'] = $this->PURDISCVAL->CurrentValue;
        $row['RNDOFF'] = $this->RNDOFF->CurrentValue;
        $row['DISCONMRP'] = $this->DISCONMRP->CurrentValue;
        $row['DELVDT'] = $this->DELVDT->CurrentValue;
        $row['DELVTIME'] = $this->DELVTIME->CurrentValue;
        $row['DELVBY'] = $this->DELVBY->CurrentValue;
        $row['HOSPNO'] = $this->HOSPNO->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['pbv'] = $this->pbv->CurrentValue;
        $row['pbt'] = $this->pbt->CurrentValue;
        $row['HosoID'] = $this->HosoID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['BRNAME'] = $this->BRNAME->CurrentValue;
        $row['sretid'] = $this->sretid->CurrentValue;
        $row['sprid'] = $this->sprid->CurrentValue;
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
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue))) {
            $this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BRCODE

        // TYPE

        // DN

        // RDN

        // DT

        // PRC

        // OQ

        // SiNo

        // RQ

        // Product

        // SLNO

        // RT

        // MRQ

        // IQ

        // DAMT

        // BATCHNO

        // EXPDT

        // Mfg

        // BILLNO

        // BILLDT

        // VALUE

        // DISC

        // TAXP

        // TAX

        // TAXR

        // EMPNO

        // PC

        // DRNAME

        // BTIME

        // ONO

        // ODT

        // PURRT

        // GRP

        // IBATCH

        // IPNO

        // OPNO

        // RECID

        // FQTY

        // UR

        // DCID

        // USERID

        // MODDT

        // FYM

        // PRCBATCH

        // MRP

        // BILLYM

        // BILLGRP

        // STAFF

        // TEMPIPNO

        // PRNTED

        // PATNAME

        // PJVNO

        // PJVSLNO

        // OTHDISC

        // PJVYM

        // PURDISCPER

        // CASHIER

        // CASHTIME

        // CASHRECD

        // CASHREFNO

        // CASHIERSHIFT

        // PRCODE

        // RELEASEBY

        // CRAUTHOR

        // PAYMENT

        // DRID

        // WARD

        // STAXTYPE

        // PURDISCVAL

        // RNDOFF

        // DISCONMRP

        // DELVDT

        // DELVTIME

        // DELVBY

        // HOSPNO

        // id

        // pbv

        // pbt

        // HosoID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // MFRCODE

        // Reception

        // PatID

        // mrnno

        // BRNAME

        // sretid

        // sprid
        if ($this->RowType == ROWTYPE_VIEW) {
            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewCustomAttributes = "";

            // TYPE
            $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
            $this->TYPE->ViewCustomAttributes = "";

            // DN
            $this->DN->ViewValue = $this->DN->CurrentValue;
            $this->DN->ViewCustomAttributes = "";

            // RDN
            $this->RDN->ViewValue = $this->RDN->CurrentValue;
            $this->RDN->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // SiNo
            $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
            $this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
            $this->SiNo->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // Product
            $this->Product->ViewValue = $this->Product->CurrentValue;
            $this->Product->ViewCustomAttributes = "";

            // SLNO
            $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->ViewValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->ViewValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
                    }
                }
            } else {
                $this->SLNO->ViewValue = null;
            }
            $this->SLNO->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // DAMT
            $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
            $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
            $this->DAMT->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // Mfg
            $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
            $this->Mfg->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // VALUE
            $this->VALUE->ViewValue = $this->VALUE->CurrentValue;
            $this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
            $this->VALUE->ViewCustomAttributes = "";

            // DISC
            $this->DISC->ViewValue = $this->DISC->CurrentValue;
            $this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
            $this->DISC->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // TAX
            $this->TAX->ViewValue = $this->TAX->CurrentValue;
            $this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
            $this->TAX->ViewCustomAttributes = "";

            // TAXR
            $this->TAXR->ViewValue = $this->TAXR->CurrentValue;
            $this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
            $this->TAXR->ViewCustomAttributes = "";

            // EMPNO
            $this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
            $this->EMPNO->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // DRNAME
            $this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
            $this->DRNAME->ViewCustomAttributes = "";

            // BTIME
            $this->BTIME->ViewValue = $this->BTIME->CurrentValue;
            $this->BTIME->ViewCustomAttributes = "";

            // ONO
            $this->ONO->ViewValue = $this->ONO->CurrentValue;
            $this->ONO->ViewCustomAttributes = "";

            // ODT
            $this->ODT->ViewValue = $this->ODT->CurrentValue;
            $this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
            $this->ODT->ViewCustomAttributes = "";

            // PURRT
            $this->PURRT->ViewValue = $this->PURRT->CurrentValue;
            $this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
            $this->PURRT->ViewCustomAttributes = "";

            // GRP
            $this->GRP->ViewValue = $this->GRP->CurrentValue;
            $this->GRP->ViewCustomAttributes = "";

            // IBATCH
            $this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
            $this->IBATCH->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // RECID
            $this->RECID->ViewValue = $this->RECID->CurrentValue;
            $this->RECID->ViewCustomAttributes = "";

            // FQTY
            $this->FQTY->ViewValue = $this->FQTY->CurrentValue;
            $this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
            $this->FQTY->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // DCID
            $this->DCID->ViewValue = $this->DCID->CurrentValue;
            $this->DCID->ViewCustomAttributes = "";

            // USERID
            $this->_USERID->ViewValue = $this->_USERID->CurrentValue;
            $this->_USERID->ViewCustomAttributes = "";

            // MODDT
            $this->MODDT->ViewValue = $this->MODDT->CurrentValue;
            $this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
            $this->MODDT->ViewCustomAttributes = "";

            // FYM
            $this->FYM->ViewValue = $this->FYM->CurrentValue;
            $this->FYM->ViewCustomAttributes = "";

            // PRCBATCH
            $this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
            $this->PRCBATCH->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // BILLYM
            $this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
            $this->BILLYM->ViewCustomAttributes = "";

            // BILLGRP
            $this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
            $this->BILLGRP->ViewCustomAttributes = "";

            // STAFF
            $this->STAFF->ViewValue = $this->STAFF->CurrentValue;
            $this->STAFF->ViewCustomAttributes = "";

            // TEMPIPNO
            $this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
            $this->TEMPIPNO->ViewCustomAttributes = "";

            // PRNTED
            $this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
            $this->PRNTED->ViewCustomAttributes = "";

            // PATNAME
            $this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
            $this->PATNAME->ViewCustomAttributes = "";

            // PJVNO
            $this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
            $this->PJVNO->ViewCustomAttributes = "";

            // PJVSLNO
            $this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
            $this->PJVSLNO->ViewCustomAttributes = "";

            // OTHDISC
            $this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
            $this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
            $this->OTHDISC->ViewCustomAttributes = "";

            // PJVYM
            $this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
            $this->PJVYM->ViewCustomAttributes = "";

            // PURDISCPER
            $this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
            $this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
            $this->PURDISCPER->ViewCustomAttributes = "";

            // CASHIER
            $this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
            $this->CASHIER->ViewCustomAttributes = "";

            // CASHTIME
            $this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
            $this->CASHTIME->ViewCustomAttributes = "";

            // CASHRECD
            $this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
            $this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
            $this->CASHRECD->ViewCustomAttributes = "";

            // CASHREFNO
            $this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
            $this->CASHREFNO->ViewCustomAttributes = "";

            // CASHIERSHIFT
            $this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
            $this->CASHIERSHIFT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // RELEASEBY
            $this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
            $this->RELEASEBY->ViewCustomAttributes = "";

            // CRAUTHOR
            $this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
            $this->CRAUTHOR->ViewCustomAttributes = "";

            // PAYMENT
            $this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
            $this->PAYMENT->ViewCustomAttributes = "";

            // DRID
            $this->DRID->ViewValue = $this->DRID->CurrentValue;
            $this->DRID->ViewCustomAttributes = "";

            // WARD
            $this->WARD->ViewValue = $this->WARD->CurrentValue;
            $this->WARD->ViewCustomAttributes = "";

            // STAXTYPE
            $this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
            $this->STAXTYPE->ViewCustomAttributes = "";

            // PURDISCVAL
            $this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
            $this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
            $this->PURDISCVAL->ViewCustomAttributes = "";

            // RNDOFF
            $this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
            $this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
            $this->RNDOFF->ViewCustomAttributes = "";

            // DISCONMRP
            $this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
            $this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
            $this->DISCONMRP->ViewCustomAttributes = "";

            // DELVDT
            $this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
            $this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
            $this->DELVDT->ViewCustomAttributes = "";

            // DELVTIME
            $this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
            $this->DELVTIME->ViewCustomAttributes = "";

            // DELVBY
            $this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
            $this->DELVBY->ViewCustomAttributes = "";

            // HOSPNO
            $this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
            $this->HOSPNO->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pbv
            $this->pbv->ViewValue = $this->pbv->CurrentValue;
            $this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
            $this->pbv->ViewCustomAttributes = "";

            // pbt
            $this->pbt->ViewValue = $this->pbt->CurrentValue;
            $this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
            $this->pbt->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

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

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // sretid
            $this->sretid->ViewValue = $this->sretid->CurrentValue;
            $this->sretid->ViewValue = FormatNumber($this->sretid->ViewValue, 0, -2, -2, -2);
            $this->sretid->ViewCustomAttributes = "";

            // sprid
            $this->sprid->ViewValue = $this->sprid->CurrentValue;
            $this->sprid->ViewValue = FormatNumber($this->sprid->ViewValue, 0, -2, -2, -2);
            $this->sprid->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";
            $this->SiNo->TooltipValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";
            $this->Product->TooltipValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";
            $this->SLNO->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";
            $this->DAMT->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";
            $this->Mfg->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";
            $this->_USERID->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
            $this->BRNAME->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // BRCODE

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // SLNO
            $this->SLNO->EditAttrs["class"] = "form-control";
            $this->SLNO->EditCustomAttributes = "";
            $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
                    }
                }
            } else {
                $this->SLNO->EditValue = null;
            }
            $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
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

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
            if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
                $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
                $this->DAMT->OldValue = $this->DAMT->EditValue;
            }

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // USERID

            // id

            // HosoID

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // BRNAME

            // Add refer script

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // BRCODE

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // SLNO
            $this->SLNO->EditAttrs["class"] = "form-control";
            $this->SLNO->EditCustomAttributes = "";
            $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
            $curVal = trim(strval($this->SLNO->CurrentValue));
            if ($curVal != "") {
                $this->SLNO->EditValue = $this->SLNO->lookupCacheOption($curVal);
                if ($this->SLNO->EditValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`BRCODE`='".PharmacyID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->SLNO->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->SLNO->Lookup->renderViewRow($rswrk[0]);
                        $this->SLNO->EditValue = $this->SLNO->displayValue($arwrk);
                    } else {
                        $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
                    }
                }
            } else {
                $this->SLNO->EditValue = null;
            }
            $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
                $this->RT->OldValue = $this->RT->EditValue;
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

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
                $this->IQ->OldValue = $this->IQ->EditValue;
            }

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
            if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
                $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
                $this->DAMT->OldValue = $this->DAMT->EditValue;
            }

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
                $this->UR->OldValue = $this->UR->EditValue;
            }

            // USERID

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // HosoID

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // BRNAME

            // Edit refer script

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";

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

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
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
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->SiNo->Required) {
            if (!$this->SiNo->IsDetailKey && EmptyValue($this->SiNo->FormValue)) {
                $this->SiNo->addErrorMessage(str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SiNo->FormValue)) {
            $this->SiNo->addErrorMessage($this->SiNo->getErrorMessage(false));
        }
        if ($this->Product->Required) {
            if (!$this->Product->IsDetailKey && EmptyValue($this->Product->FormValue)) {
                $this->Product->addErrorMessage(str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
            }
        }
        if ($this->SLNO->Required) {
            if (!$this->SLNO->IsDetailKey && EmptyValue($this->SLNO->FormValue)) {
                $this->SLNO->addErrorMessage(str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SLNO->FormValue)) {
            $this->SLNO->addErrorMessage($this->SLNO->getErrorMessage(false));
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->MRQ->Required) {
            if (!$this->MRQ->IsDetailKey && EmptyValue($this->MRQ->FormValue)) {
                $this->MRQ->addErrorMessage(str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRQ->FormValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IQ->FormValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if ($this->DAMT->Required) {
            if (!$this->DAMT->IsDetailKey && EmptyValue($this->DAMT->FormValue)) {
                $this->DAMT->addErrorMessage(str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DAMT->FormValue)) {
            $this->DAMT->addErrorMessage($this->DAMT->getErrorMessage(false));
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
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
        if ($this->Mfg->Required) {
            if (!$this->Mfg->IsDetailKey && EmptyValue($this->Mfg->FormValue)) {
                $this->Mfg->addErrorMessage(str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
            }
        }
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->_USERID->Required) {
            if (!$this->_USERID->IsDetailKey && EmptyValue($this->_USERID->FormValue)) {
                $this->_USERID->addErrorMessage(str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
            }
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->HosoID->Required) {
            if (!$this->HosoID->IsDetailKey && EmptyValue($this->HosoID->FormValue)) {
                $this->HosoID->addErrorMessage(str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
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
        if ($this->BRNAME->Required) {
            if (!$this->BRNAME->IsDetailKey && EmptyValue($this->BRNAME->FormValue)) {
                $this->BRNAME->addErrorMessage(str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
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

            // BRCODE
            $this->BRCODE->CurrentValue = PharmacyID();
            $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null);

            // PRC
            $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, $this->PRC->ReadOnly);

            // SiNo
            $this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, null, $this->SiNo->ReadOnly);

            // Product
            $this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, null, $this->Product->ReadOnly);

            // SLNO
            $this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, null, $this->SLNO->ReadOnly);

            // RT
            $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, $this->RT->ReadOnly);

            // MRQ
            $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, $this->MRQ->ReadOnly);

            // IQ
            $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, $this->IQ->ReadOnly);

            // DAMT
            $this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, null, $this->DAMT->ReadOnly);

            // BATCHNO
            $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, $this->BATCHNO->ReadOnly);

            // EXPDT
            $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, $this->EXPDT->ReadOnly);

            // Mfg
            $this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, null, $this->Mfg->ReadOnly);

            // UR
            $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, $this->UR->ReadOnly);

            // USERID
            $this->_USERID->CurrentValue = CurrentUserID();
            $this->_USERID->setDbValueDef($rsnew, $this->_USERID->CurrentValue, null);

            // HosoID
            $this->HosoID->CurrentValue = HospitalID();
            $this->HosoID->setDbValueDef($rsnew, $this->HosoID->CurrentValue, null);

            // createdby
            $this->createdby->CurrentValue = CurrentUserName();
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

            // createddatetime
            $this->createddatetime->CurrentValue = CurrentDateTime();
            $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

            // modifiedby
            $this->modifiedby->CurrentValue = CurrentUserName();
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

            // modifieddatetime
            $this->modifieddatetime->CurrentValue = CurrentDateTime();
            $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

            // BRNAME
            $this->BRNAME->CurrentValue = PharmacyID();
            $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null);

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
        $hash .= GetFieldHash($row['BRCODE']); // BRCODE
        $hash .= GetFieldHash($row['PRC']); // PRC
        $hash .= GetFieldHash($row['SiNo']); // SiNo
        $hash .= GetFieldHash($row['Product']); // Product
        $hash .= GetFieldHash($row['SLNO']); // SLNO
        $hash .= GetFieldHash($row['RT']); // RT
        $hash .= GetFieldHash($row['MRQ']); // MRQ
        $hash .= GetFieldHash($row['IQ']); // IQ
        $hash .= GetFieldHash($row['DAMT']); // DAMT
        $hash .= GetFieldHash($row['BATCHNO']); // BATCHNO
        $hash .= GetFieldHash($row['EXPDT']); // EXPDT
        $hash .= GetFieldHash($row['Mfg']); // Mfg
        $hash .= GetFieldHash($row['UR']); // UR
        $hash .= GetFieldHash($row['USERID']); // USERID
        $hash .= GetFieldHash($row['HosoID']); // HosoID
        $hash .= GetFieldHash($row['createdby']); // createdby
        $hash .= GetFieldHash($row['createddatetime']); // createddatetime
        $hash .= GetFieldHash($row['modifiedby']); // modifiedby
        $hash .= GetFieldHash($row['modifieddatetime']); // modifieddatetime
        $hash .= GetFieldHash($row['BRNAME']); // BRNAME
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

        // BRCODE
        $this->BRCODE->CurrentValue = PharmacyID();
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // SiNo
        $this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, null, false);

        // Product
        $this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, null, false);

        // SLNO
        $this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, null, false);

        // RT
        $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, false);

        // MRQ
        $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, false);

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, false);

        // DAMT
        $this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, null, false);

        // BATCHNO
        $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, false);

        // EXPDT
        $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, false);

        // Mfg
        $this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, null, false);

        // UR
        $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, false);

        // USERID
        $this->_USERID->CurrentValue = CurrentUserID();
        $this->_USERID->setDbValueDef($rsnew, $this->_USERID->CurrentValue, null);

        // HosoID
        $this->HosoID->CurrentValue = HospitalID();
        $this->HosoID->setDbValueDef($rsnew, $this->HosoID->CurrentValue, null);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // modifiedby
        $this->modifiedby->CurrentValue = CurrentUserName();
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null);

        // modifieddatetime
        $this->modifieddatetime->CurrentValue = CurrentDateTime();
        $this->modifieddatetime->setDbValueDef($rsnew, $this->modifieddatetime->CurrentValue, null);

        // BRNAME
        $this->BRNAME->CurrentValue = PharmacyID();
        $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null);

        // sretid
        if ($this->sretid->getSessionValue() != "") {
            $rsnew['sretid'] = $this->sretid->getSessionValue();
        }

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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_pharled_returnlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_pharled_returnlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_pharmacy_pharled_returnlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_pharmacy_pharled_return" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_pharmacy_pharled_return\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_pharmacy_pharled_returnlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_pharmacy_pharled_returnlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "pharmacy_billing_return") {
            $pharmacy_billing_return = Container("pharmacy_billing_return");
            $rsmaster = $pharmacy_billing_return->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $pharmacy_billing_return;
                    $pharmacy_billing_return->exportDocument($doc, new Recordset($rsmaster));
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
            if ($masterTblVar == "pharmacy_billing_return") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_billing_return");
                if (($parm = Get("fk_id", Get("sretid"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->sretid->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->sretid->setSessionValue($this->sretid->QueryStringValue);
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
            if ($masterTblVar == "pharmacy_billing_return") {
                $validMaster = true;
                $masterTbl = Container("pharmacy_billing_return");
                if (($parm = Post("fk_id", Post("sretid"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->sretid->setFormValue($masterTbl->id->FormValue);
                    $this->sretid->setSessionValue($this->sretid->FormValue);
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
            if ($masterTblVar != "pharmacy_billing_return") {
                if ($this->sretid->CurrentValue == "") {
                    $this->sretid->setSessionValue("");
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
                case "x_SLNO":
                    $lookupFilter = function () {
                        return "`BRCODE`='".PharmacyID()."'";
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
