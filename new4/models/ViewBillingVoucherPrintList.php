<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewBillingVoucherPrintList extends ViewBillingVoucherPrint
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_billing_voucher_print';

    // Page object name
    public $PageObjName = "ViewBillingVoucherPrintList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_billing_voucher_printlist";
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

        // Table object (view_billing_voucher_print)
        if (!isset($GLOBALS["view_billing_voucher_print"]) || get_class($GLOBALS["view_billing_voucher_print"]) == PROJECT_NAMESPACE . "view_billing_voucher_print") {
            $GLOBALS["view_billing_voucher_print"] = &$this;
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
        $this->AddUrl = "ViewBillingVoucherPrintAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewBillingVoucherPrintDelete";
        $this->MultiUpdateUrl = "ViewBillingVoucherPrintUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_billing_voucher_print');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_billing_voucher_printlistsrch";

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
                $doc = new $class(Container("view_billing_voucher_print"));
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
            $this->_UserName->Visible = false;
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
        $this->id->Visible = false;
        $this->Reception->Visible = false;
        $this->PatientId->setVisibility();
        $this->mrnno->Visible = false;
        $this->PatientName->setVisibility();
        $this->Age->Visible = false;
        $this->Gender->Visible = false;
        $this->profilePic->Visible = false;
        $this->Mobile->setVisibility();
        $this->IP_OP->Visible = false;
        $this->Doctor->setVisibility();
        $this->voucher_type->Visible = false;
        $this->Details->Visible = false;
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->RealizationAmount->Visible = false;
        $this->RealizationStatus->Visible = false;
        $this->RealizationRemarks->Visible = false;
        $this->RealizationBatchNo->Visible = false;
        $this->RealizationDate->Visible = false;
        $this->HospID->Visible = false;
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
        $this->BillNumber->setVisibility();
        $this->CardNumber->Visible = false;
        $this->BankName->setVisibility();
        $this->DrID->Visible = false;
        $this->BillStatus->Visible = false;
        $this->ReportHeader->Visible = false;
        $this->_UserName->setVisibility();
        $this->AdjustmentAdvance->Visible = false;
        $this->billing_vouchercol->Visible = false;
        $this->BillType->setVisibility();
        $this->ProcedureName->Visible = false;
        $this->ProcedureAmount->Visible = false;
        $this->IncludePackage->Visible = false;
        $this->CancelBill->Visible = false;
        $this->CancelReason->Visible = false;
        $this->CancelModeOfPayment->setVisibility();
        $this->CancelAmount->setVisibility();
        $this->CancelBankName->setVisibility();
        $this->CancelTransactionNumber->setVisibility();
        $this->LabTest->setVisibility();
        $this->sid->setVisibility();
        $this->SidNo->setVisibility();
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
        $this->setupLookupOptions($this->Reception);
        $this->setupLookupOptions($this->ModeofPayment);
        $this->setupLookupOptions($this->RIDNO);
        $this->setupLookupOptions($this->CId);
        $this->setupLookupOptions($this->PatId);
        $this->setupLookupOptions($this->RefferedBy);
        $this->setupLookupOptions($this->DrID);

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
                            $this->terminate(_LIST);
                            return;
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
        if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Doctor") && $CurrentForm->hasValue("o_Doctor") && $this->Doctor->CurrentValue != $this->Doctor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ModeofPayment") && $CurrentForm->hasValue("o_ModeofPayment") && $this->ModeofPayment->CurrentValue != $this->ModeofPayment->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Amount") && $CurrentForm->hasValue("o_Amount") && $this->Amount->CurrentValue != $this->Amount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillNumber") && $CurrentForm->hasValue("o_BillNumber") && $this->BillNumber->CurrentValue != $this->BillNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BankName") && $CurrentForm->hasValue("o_BankName") && $this->BankName->CurrentValue != $this->BankName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillType") && $CurrentForm->hasValue("o_BillType") && $this->BillType->CurrentValue != $this->BillType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelModeOfPayment") && $CurrentForm->hasValue("o_CancelModeOfPayment") && $this->CancelModeOfPayment->CurrentValue != $this->CancelModeOfPayment->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelAmount") && $CurrentForm->hasValue("o_CancelAmount") && $this->CancelAmount->CurrentValue != $this->CancelAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelBankName") && $CurrentForm->hasValue("o_CancelBankName") && $this->CancelBankName->CurrentValue != $this->CancelBankName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CancelTransactionNumber") && $CurrentForm->hasValue("o_CancelTransactionNumber") && $this->CancelTransactionNumber->CurrentValue != $this->CancelTransactionNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LabTest") && $CurrentForm->hasValue("o_LabTest") && $this->LabTest->CurrentValue != $this->LabTest->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_sid") && $CurrentForm->hasValue("o_sid") && $this->sid->CurrentValue != $this->sid->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SidNo") && $CurrentForm->hasValue("o_SidNo") && $this->SidNo->CurrentValue != $this->SidNo->OldValue) {
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
        $this->PatientId->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Mobile->clearErrorMessage();
        $this->Doctor->clearErrorMessage();
        $this->ModeofPayment->clearErrorMessage();
        $this->Amount->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->BillNumber->clearErrorMessage();
        $this->BankName->clearErrorMessage();
        $this->_UserName->clearErrorMessage();
        $this->BillType->clearErrorMessage();
        $this->CancelModeOfPayment->clearErrorMessage();
        $this->CancelAmount->clearErrorMessage();
        $this->CancelBankName->clearErrorMessage();
        $this->CancelTransactionNumber->clearErrorMessage();
        $this->LabTest->clearErrorMessage();
        $this->sid->clearErrorMessage();
        $this->SidNo->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_billing_voucher_printlistsrch");
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_billing_voucher_printlistsrch", $filters);
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
        $this->buildSearchSql($where, $this->ReportHeader, $default, true); // ReportHeader
        $this->buildSearchSql($where, $this->_UserName, $default, false); // UserName
        $this->buildSearchSql($where, $this->AdjustmentAdvance, $default, true); // AdjustmentAdvance
        $this->buildSearchSql($where, $this->billing_vouchercol, $default, false); // billing_vouchercol
        $this->buildSearchSql($where, $this->BillType, $default, false); // BillType
        $this->buildSearchSql($where, $this->ProcedureName, $default, false); // ProcedureName
        $this->buildSearchSql($where, $this->ProcedureAmount, $default, false); // ProcedureAmount
        $this->buildSearchSql($where, $this->IncludePackage, $default, true); // IncludePackage
        $this->buildSearchSql($where, $this->CancelBill, $default, false); // CancelBill
        $this->buildSearchSql($where, $this->CancelReason, $default, false); // CancelReason
        $this->buildSearchSql($where, $this->CancelModeOfPayment, $default, false); // CancelModeOfPayment
        $this->buildSearchSql($where, $this->CancelAmount, $default, false); // CancelAmount
        $this->buildSearchSql($where, $this->CancelBankName, $default, false); // CancelBankName
        $this->buildSearchSql($where, $this->CancelTransactionNumber, $default, false); // CancelTransactionNumber
        $this->buildSearchSql($where, $this->LabTest, $default, false); // LabTest
        $this->buildSearchSql($where, $this->sid, $default, false); // sid
        $this->buildSearchSql($where, $this->SidNo, $default, false); // SidNo

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
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->Doctor); // Doctor
            $this->updateSort($this->ModeofPayment); // ModeofPayment
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->BillNumber); // BillNumber
            $this->updateSort($this->BankName); // BankName
            $this->updateSort($this->_UserName); // UserName
            $this->updateSort($this->BillType); // BillType
            $this->updateSort($this->CancelModeOfPayment); // CancelModeOfPayment
            $this->updateSort($this->CancelAmount); // CancelAmount
            $this->updateSort($this->CancelBankName); // CancelBankName
            $this->updateSort($this->CancelTransactionNumber); // CancelTransactionNumber
            $this->updateSort($this->LabTest); // LabTest
            $this->updateSort($this->sid); // sid
            $this->updateSort($this->SidNo); // SidNo
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

        // "detail_view_patient_services"
        $item = &$this->ListOptions->add("detail_view_patient_services");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'view_patient_services') && !$this->ShowMultipleDetails;
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
        $pages->add("view_patient_services");
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
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_view_patient_services"
        $opt = $this->ListOptions["detail_view_patient_services"];
        if ($Security->allowList(CurrentProjectID() . 'view_patient_services')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("view_patient_services", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("ViewPatientServicesList?" . Config("TABLE_SHOW_MASTER") . "=view_billing_voucher_print&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("ViewPatientServicesGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_billing_voucher_print')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_patient_services");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "view_patient_services";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_billing_voucher_print')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_patient_services");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "view_patient_services";
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
        $item = &$option->add("gridadd");
        $item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridAddUrl)) . "\">" . $Language->phrase("GridAddLink") . "</a>";
        $item->Visible = $this->GridAddUrl != "" && $Security->canAdd();
        $option = $options["detail"];
        $detailTableLink = "";
                $item = &$option->add("detailadd_view_patient_services");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=view_patient_services");
                $detailPage = Container("ViewPatientServicesGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'view_billing_voucher_print') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "view_patient_services";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_billing_voucher_printlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_billing_voucher_printlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_billing_voucher_printlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $links = "";
        $btngrps = "";
        $sqlwrk = "`Vid`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_view_patient_services"
        if ($this->DetailPages && $this->DetailPages["view_patient_services"] && $this->DetailPages["view_patient_services"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_view_patient_services"];
            $url = "ViewPatientServicesPreview?t=view_billing_voucher_print&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"view_patient_services\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'view_billing_voucher_print')) {
                $label = $Language->TablePhrase("view_patient_services", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"view_patient_services\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("ViewPatientServicesList?" . Config("TABLE_SHOW_MASTER") . "=view_billing_voucher_print&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("view_patient_services", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("ViewPatientServicesGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_billing_voucher_print')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=view_patient_services");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'view_billing_voucher_print')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=view_patient_services");
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

    // Load default values
    protected function loadDefaultValues()
    {
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->IP_OP->CurrentValue = null;
        $this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
        $this->Doctor->CurrentValue = null;
        $this->Doctor->OldValue = $this->Doctor->CurrentValue;
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
        $this->RealizationAmount->CurrentValue = null;
        $this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
        $this->RealizationStatus->CurrentValue = null;
        $this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
        $this->RealizationRemarks->CurrentValue = null;
        $this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
        $this->RealizationBatchNo->CurrentValue = null;
        $this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
        $this->RealizationDate->CurrentValue = null;
        $this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->CId->CurrentValue = null;
        $this->CId->OldValue = $this->CId->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PayerType->CurrentValue = null;
        $this->PayerType->OldValue = $this->PayerType->CurrentValue;
        $this->Dob->CurrentValue = null;
        $this->Dob->OldValue = $this->Dob->CurrentValue;
        $this->Currency->CurrentValue = null;
        $this->Currency->OldValue = $this->Currency->CurrentValue;
        $this->DiscountRemarks->CurrentValue = null;
        $this->DiscountRemarks->OldValue = $this->DiscountRemarks->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->PatId->CurrentValue = null;
        $this->PatId->OldValue = $this->PatId->CurrentValue;
        $this->DrDepartment->CurrentValue = null;
        $this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
        $this->RefferedBy->CurrentValue = null;
        $this->RefferedBy->OldValue = $this->RefferedBy->CurrentValue;
        $this->BillNumber->CurrentValue = null;
        $this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
        $this->CardNumber->CurrentValue = null;
        $this->CardNumber->OldValue = $this->CardNumber->CurrentValue;
        $this->BankName->CurrentValue = null;
        $this->BankName->OldValue = $this->BankName->CurrentValue;
        $this->DrID->CurrentValue = null;
        $this->DrID->OldValue = $this->DrID->CurrentValue;
        $this->BillStatus->CurrentValue = 0;
        $this->BillStatus->OldValue = $this->BillStatus->CurrentValue;
        $this->ReportHeader->CurrentValue = null;
        $this->ReportHeader->OldValue = $this->ReportHeader->CurrentValue;
        $this->_UserName->CurrentValue = null;
        $this->_UserName->OldValue = $this->_UserName->CurrentValue;
        $this->AdjustmentAdvance->CurrentValue = null;
        $this->AdjustmentAdvance->OldValue = $this->AdjustmentAdvance->CurrentValue;
        $this->billing_vouchercol->CurrentValue = null;
        $this->billing_vouchercol->OldValue = $this->billing_vouchercol->CurrentValue;
        $this->BillType->CurrentValue = null;
        $this->BillType->OldValue = $this->BillType->CurrentValue;
        $this->ProcedureName->CurrentValue = null;
        $this->ProcedureName->OldValue = $this->ProcedureName->CurrentValue;
        $this->ProcedureAmount->CurrentValue = null;
        $this->ProcedureAmount->OldValue = $this->ProcedureAmount->CurrentValue;
        $this->IncludePackage->CurrentValue = null;
        $this->IncludePackage->OldValue = $this->IncludePackage->CurrentValue;
        $this->CancelBill->CurrentValue = null;
        $this->CancelBill->OldValue = $this->CancelBill->CurrentValue;
        $this->CancelReason->CurrentValue = null;
        $this->CancelReason->OldValue = $this->CancelReason->CurrentValue;
        $this->CancelModeOfPayment->CurrentValue = null;
        $this->CancelModeOfPayment->OldValue = $this->CancelModeOfPayment->CurrentValue;
        $this->CancelAmount->CurrentValue = null;
        $this->CancelAmount->OldValue = $this->CancelAmount->CurrentValue;
        $this->CancelBankName->CurrentValue = null;
        $this->CancelBankName->OldValue = $this->CancelBankName->CurrentValue;
        $this->CancelTransactionNumber->CurrentValue = null;
        $this->CancelTransactionNumber->OldValue = $this->CancelTransactionNumber->CurrentValue;
        $this->LabTest->CurrentValue = null;
        $this->LabTest->OldValue = $this->LabTest->CurrentValue;
        $this->sid->CurrentValue = null;
        $this->sid->OldValue = $this->sid->CurrentValue;
        $this->SidNo->CurrentValue = null;
        $this->SidNo->OldValue = $this->SidNo->CurrentValue;
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
        if (is_array($this->ReportHeader->AdvancedSearch->SearchValue)) {
            $this->ReportHeader->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ReportHeader->AdvancedSearch->SearchValue);
        }
        if (is_array($this->ReportHeader->AdvancedSearch->SearchValue2)) {
            $this->ReportHeader->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->ReportHeader->AdvancedSearch->SearchValue2);
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
        if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue)) {
            $this->AdjustmentAdvance->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->AdjustmentAdvance->AdvancedSearch->SearchValue);
        }
        if (is_array($this->AdjustmentAdvance->AdvancedSearch->SearchValue2)) {
            $this->AdjustmentAdvance->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->AdjustmentAdvance->AdvancedSearch->SearchValue2);
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
        if (is_array($this->IncludePackage->AdvancedSearch->SearchValue)) {
            $this->IncludePackage->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->IncludePackage->AdvancedSearch->SearchValue);
        }
        if (is_array($this->IncludePackage->AdvancedSearch->SearchValue2)) {
            $this->IncludePackage->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->IncludePackage->AdvancedSearch->SearchValue2);
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
        return $hasValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientId")) {
            $this->PatientId->setOldValue($CurrentForm->getValue("o_PatientId"));
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
        if ($CurrentForm->hasValue("o_PatientName")) {
            $this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));
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
        if ($CurrentForm->hasValue("o_Mobile")) {
            $this->Mobile->setOldValue($CurrentForm->getValue("o_Mobile"));
        }

        // Check field name 'Doctor' first before field var 'x_Doctor'
        $val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
        if (!$this->Doctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Doctor->Visible = false; // Disable update for API request
            } else {
                $this->Doctor->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Doctor")) {
            $this->Doctor->setOldValue($CurrentForm->getValue("o_Doctor"));
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
        if ($CurrentForm->hasValue("o_ModeofPayment")) {
            $this->ModeofPayment->setOldValue($CurrentForm->getValue("o_ModeofPayment"));
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
        if ($CurrentForm->hasValue("o_Amount")) {
            $this->Amount->setOldValue($CurrentForm->getValue("o_Amount"));
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        }
        if ($CurrentForm->hasValue("o_createddatetime")) {
            $this->createddatetime->setOldValue($CurrentForm->getValue("o_createddatetime"));
        }

        // Check field name 'BillNumber' first before field var 'x_BillNumber'
        $val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
        if (!$this->BillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillNumber->Visible = false; // Disable update for API request
            } else {
                $this->BillNumber->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillNumber")) {
            $this->BillNumber->setOldValue($CurrentForm->getValue("o_BillNumber"));
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
        if ($CurrentForm->hasValue("o_BankName")) {
            $this->BankName->setOldValue($CurrentForm->getValue("o_BankName"));
        }

        // Check field name 'UserName' first before field var 'x__UserName'
        $val = $CurrentForm->hasValue("UserName") ? $CurrentForm->getValue("UserName") : $CurrentForm->getValue("x__UserName");
        if (!$this->_UserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_UserName->Visible = false; // Disable update for API request
            } else {
                $this->_UserName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o__UserName")) {
            $this->_UserName->setOldValue($CurrentForm->getValue("o__UserName"));
        }

        // Check field name 'BillType' first before field var 'x_BillType'
        $val = $CurrentForm->hasValue("BillType") ? $CurrentForm->getValue("BillType") : $CurrentForm->getValue("x_BillType");
        if (!$this->BillType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillType->Visible = false; // Disable update for API request
            } else {
                $this->BillType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillType")) {
            $this->BillType->setOldValue($CurrentForm->getValue("o_BillType"));
        }

        // Check field name 'CancelModeOfPayment' first before field var 'x_CancelModeOfPayment'
        $val = $CurrentForm->hasValue("CancelModeOfPayment") ? $CurrentForm->getValue("CancelModeOfPayment") : $CurrentForm->getValue("x_CancelModeOfPayment");
        if (!$this->CancelModeOfPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelModeOfPayment->Visible = false; // Disable update for API request
            } else {
                $this->CancelModeOfPayment->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CancelModeOfPayment")) {
            $this->CancelModeOfPayment->setOldValue($CurrentForm->getValue("o_CancelModeOfPayment"));
        }

        // Check field name 'CancelAmount' first before field var 'x_CancelAmount'
        $val = $CurrentForm->hasValue("CancelAmount") ? $CurrentForm->getValue("CancelAmount") : $CurrentForm->getValue("x_CancelAmount");
        if (!$this->CancelAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelAmount->Visible = false; // Disable update for API request
            } else {
                $this->CancelAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CancelAmount")) {
            $this->CancelAmount->setOldValue($CurrentForm->getValue("o_CancelAmount"));
        }

        // Check field name 'CancelBankName' first before field var 'x_CancelBankName'
        $val = $CurrentForm->hasValue("CancelBankName") ? $CurrentForm->getValue("CancelBankName") : $CurrentForm->getValue("x_CancelBankName");
        if (!$this->CancelBankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelBankName->Visible = false; // Disable update for API request
            } else {
                $this->CancelBankName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CancelBankName")) {
            $this->CancelBankName->setOldValue($CurrentForm->getValue("o_CancelBankName"));
        }

        // Check field name 'CancelTransactionNumber' first before field var 'x_CancelTransactionNumber'
        $val = $CurrentForm->hasValue("CancelTransactionNumber") ? $CurrentForm->getValue("CancelTransactionNumber") : $CurrentForm->getValue("x_CancelTransactionNumber");
        if (!$this->CancelTransactionNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CancelTransactionNumber->Visible = false; // Disable update for API request
            } else {
                $this->CancelTransactionNumber->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CancelTransactionNumber")) {
            $this->CancelTransactionNumber->setOldValue($CurrentForm->getValue("o_CancelTransactionNumber"));
        }

        // Check field name 'LabTest' first before field var 'x_LabTest'
        $val = $CurrentForm->hasValue("LabTest") ? $CurrentForm->getValue("LabTest") : $CurrentForm->getValue("x_LabTest");
        if (!$this->LabTest->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LabTest->Visible = false; // Disable update for API request
            } else {
                $this->LabTest->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LabTest")) {
            $this->LabTest->setOldValue($CurrentForm->getValue("o_LabTest"));
        }

        // Check field name 'sid' first before field var 'x_sid'
        $val = $CurrentForm->hasValue("sid") ? $CurrentForm->getValue("sid") : $CurrentForm->getValue("x_sid");
        if (!$this->sid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->sid->Visible = false; // Disable update for API request
            } else {
                $this->sid->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_sid")) {
            $this->sid->setOldValue($CurrentForm->getValue("o_sid"));
        }

        // Check field name 'SidNo' first before field var 'x_SidNo'
        $val = $CurrentForm->hasValue("SidNo") ? $CurrentForm->getValue("SidNo") : $CurrentForm->getValue("x_SidNo");
        if (!$this->SidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SidNo->Visible = false; // Disable update for API request
            } else {
                $this->SidNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SidNo")) {
            $this->SidNo->setOldValue($CurrentForm->getValue("o_SidNo"));
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
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->BankName->CurrentValue = $this->BankName->FormValue;
        $this->_UserName->CurrentValue = $this->_UserName->FormValue;
        $this->BillType->CurrentValue = $this->BillType->FormValue;
        $this->CancelModeOfPayment->CurrentValue = $this->CancelModeOfPayment->FormValue;
        $this->CancelAmount->CurrentValue = $this->CancelAmount->FormValue;
        $this->CancelBankName->CurrentValue = $this->CancelBankName->FormValue;
        $this->CancelTransactionNumber->CurrentValue = $this->CancelTransactionNumber->FormValue;
        $this->LabTest->CurrentValue = $this->LabTest->FormValue;
        $this->sid->CurrentValue = $this->sid->FormValue;
        $this->SidNo->CurrentValue = $this->SidNo->FormValue;
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
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['IP_OP'] = $this->IP_OP->CurrentValue;
        $row['Doctor'] = $this->Doctor->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Details'] = $this->Details->CurrentValue;
        $row['ModeofPayment'] = $this->ModeofPayment->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['AnyDues'] = $this->AnyDues->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
        $row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
        $row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
        $row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
        $row['RealizationDate'] = $this->RealizationDate->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['CId'] = $this->CId->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PayerType'] = $this->PayerType->CurrentValue;
        $row['Dob'] = $this->Dob->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['PatId'] = $this->PatId->CurrentValue;
        $row['DrDepartment'] = $this->DrDepartment->CurrentValue;
        $row['RefferedBy'] = $this->RefferedBy->CurrentValue;
        $row['BillNumber'] = $this->BillNumber->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['BillStatus'] = $this->BillStatus->CurrentValue;
        $row['ReportHeader'] = $this->ReportHeader->CurrentValue;
        $row['UserName'] = $this->_UserName->CurrentValue;
        $row['AdjustmentAdvance'] = $this->AdjustmentAdvance->CurrentValue;
        $row['billing_vouchercol'] = $this->billing_vouchercol->CurrentValue;
        $row['BillType'] = $this->BillType->CurrentValue;
        $row['ProcedureName'] = $this->ProcedureName->CurrentValue;
        $row['ProcedureAmount'] = $this->ProcedureAmount->CurrentValue;
        $row['IncludePackage'] = $this->IncludePackage->CurrentValue;
        $row['CancelBill'] = $this->CancelBill->CurrentValue;
        $row['CancelReason'] = $this->CancelReason->CurrentValue;
        $row['CancelModeOfPayment'] = $this->CancelModeOfPayment->CurrentValue;
        $row['CancelAmount'] = $this->CancelAmount->CurrentValue;
        $row['CancelBankName'] = $this->CancelBankName->CurrentValue;
        $row['CancelTransactionNumber'] = $this->CancelTransactionNumber->CurrentValue;
        $row['LabTest'] = $this->LabTest->CurrentValue;
        $row['sid'] = $this->sid->CurrentValue;
        $row['SidNo'] = $this->SidNo->CurrentValue;
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
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $curVal = trim(strval($this->Reception->CurrentValue));
            if ($curVal != "") {
                $this->Reception->ViewValue = $this->Reception->lookupCacheOption($curVal);
                if ($this->Reception->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Reception->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Reception->Lookup->renderViewRow($rswrk[0]);
                        $this->Reception->ViewValue = $this->Reception->displayValue($arwrk);
                    } else {
                        $this->Reception->ViewValue = $this->Reception->CurrentValue;
                    }
                }
            } else {
                $this->Reception->ViewValue = null;
            }
            $this->Reception->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // IP_OP
            $this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
            $this->IP_OP->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // voucher_type
            $this->voucher_type->ViewValue = $this->voucher_type->CurrentValue;
            $this->voucher_type->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

            // ModeofPayment
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
                if ($this->ModeofPayment->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->displayValue($arwrk);
                    } else {
                        $this->ModeofPayment->ViewValue = $this->ModeofPayment->CurrentValue;
                    }
                }
            } else {
                $this->ModeofPayment->ViewValue = null;
            }
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
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 7);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // RealizationAmount
            $this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
            $this->RealizationAmount->ViewValue = FormatNumber($this->RealizationAmount->ViewValue, 2, -2, -2, -2);
            $this->RealizationAmount->ViewCustomAttributes = "";

            // RealizationStatus
            $this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
            $this->RealizationStatus->ViewCustomAttributes = "";

            // RealizationRemarks
            $this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
            $this->RealizationRemarks->ViewCustomAttributes = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
            $this->RealizationBatchNo->ViewCustomAttributes = "";

            // RealizationDate
            $this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
            $this->RealizationDate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $curVal = trim(strval($this->RIDNO->CurrentValue));
            if ($curVal != "") {
                $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
                if ($this->RIDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                    } else {
                        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                    }
                }
            } else {
                $this->RIDNO->ViewValue = null;
            }
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // CId
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
                if ($this->CId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->CId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                        $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                    } else {
                        $this->CId->ViewValue = $this->CId->CurrentValue;
                    }
                }
            } else {
                $this->CId->ViewValue = null;
            }
            $this->CId->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PayerType
            $this->PayerType->ViewValue = $this->PayerType->CurrentValue;
            $this->PayerType->ViewCustomAttributes = "";

            // Dob
            $this->Dob->ViewValue = $this->Dob->CurrentValue;
            $this->Dob->ViewCustomAttributes = "";

            // Currency
            $this->Currency->ViewValue = $this->Currency->CurrentValue;
            $this->Currency->ViewCustomAttributes = "";

            // DiscountRemarks
            $this->DiscountRemarks->ViewValue = $this->DiscountRemarks->CurrentValue;
            $this->DiscountRemarks->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // PatId
            $curVal = trim(strval($this->PatId->CurrentValue));
            if ($curVal != "") {
                $this->PatId->ViewValue = $this->PatId->lookupCacheOption($curVal);
                if ($this->PatId->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatId->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatId->Lookup->renderViewRow($rswrk[0]);
                        $this->PatId->ViewValue = $this->PatId->displayValue($arwrk);
                    } else {
                        $this->PatId->ViewValue = $this->PatId->CurrentValue;
                    }
                }
            } else {
                $this->PatId->ViewValue = null;
            }
            $this->PatId->ViewCustomAttributes = "";

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // RefferedBy
            $curVal = trim(strval($this->RefferedBy->CurrentValue));
            if ($curVal != "") {
                $this->RefferedBy->ViewValue = $this->RefferedBy->lookupCacheOption($curVal);
                if ($this->RefferedBy->ViewValue === null) { // Lookup from database
                    $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->RefferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RefferedBy->Lookup->renderViewRow($rswrk[0]);
                        $this->RefferedBy->ViewValue = $this->RefferedBy->displayValue($arwrk);
                    } else {
                        $this->RefferedBy->ViewValue = $this->RefferedBy->CurrentValue;
                    }
                }
            } else {
                $this->RefferedBy->ViewValue = null;
            }
            $this->RefferedBy->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // CardNumber
            $this->CardNumber->ViewValue = $this->CardNumber->CurrentValue;
            $this->CardNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->ViewValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // DrID
            $curVal = trim(strval($this->DrID->CurrentValue));
            if ($curVal != "") {
                $this->DrID->ViewValue = $this->DrID->lookupCacheOption($curVal);
                if ($this->DrID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $lookupFilter = function() {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->DrID->Lookup->renderViewRow($rswrk[0]);
                        $this->DrID->ViewValue = $this->DrID->displayValue($arwrk);
                    } else {
                        $this->DrID->ViewValue = $this->DrID->CurrentValue;
                    }
                }
            } else {
                $this->DrID->ViewValue = null;
            }
            $this->DrID->ViewCustomAttributes = "";

            // BillStatus
            $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
            $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
            $this->BillStatus->ViewCustomAttributes = "";

            // ReportHeader
            if (strval($this->ReportHeader->CurrentValue) != "") {
                $this->ReportHeader->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ReportHeader->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ReportHeader->ViewValue->add($this->ReportHeader->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ReportHeader->ViewValue = null;
            }
            $this->ReportHeader->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // AdjustmentAdvance
            if (strval($this->AdjustmentAdvance->CurrentValue) != "") {
                $this->AdjustmentAdvance->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->AdjustmentAdvance->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->AdjustmentAdvance->ViewValue->add($this->AdjustmentAdvance->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->AdjustmentAdvance->ViewValue = null;
            }
            $this->AdjustmentAdvance->ViewCustomAttributes = "";

            // billing_vouchercol
            $this->billing_vouchercol->ViewValue = $this->billing_vouchercol->CurrentValue;
            $this->billing_vouchercol->ViewCustomAttributes = "";

            // BillType
            $this->BillType->ViewValue = $this->BillType->CurrentValue;
            $this->BillType->ViewCustomAttributes = "";

            // ProcedureName
            $this->ProcedureName->ViewValue = $this->ProcedureName->CurrentValue;
            $this->ProcedureName->ViewCustomAttributes = "";

            // ProcedureAmount
            $this->ProcedureAmount->ViewValue = $this->ProcedureAmount->CurrentValue;
            $this->ProcedureAmount->ViewValue = FormatNumber($this->ProcedureAmount->ViewValue, 2, -2, -2, -2);
            $this->ProcedureAmount->ViewCustomAttributes = "";

            // IncludePackage
            if (strval($this->IncludePackage->CurrentValue) != "") {
                $this->IncludePackage->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->IncludePackage->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->IncludePackage->ViewValue->add($this->IncludePackage->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->IncludePackage->ViewValue = null;
            }
            $this->IncludePackage->ViewCustomAttributes = "";

            // CancelBill
            if (strval($this->CancelBill->CurrentValue) != "") {
                $this->CancelBill->ViewValue = $this->CancelBill->optionCaption($this->CancelBill->CurrentValue);
            } else {
                $this->CancelBill->ViewValue = null;
            }
            $this->CancelBill->ViewCustomAttributes = "";

            // CancelReason
            $this->CancelReason->ViewValue = $this->CancelReason->CurrentValue;
            $this->CancelReason->ViewCustomAttributes = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->ViewValue = $this->CancelModeOfPayment->CurrentValue;
            $this->CancelModeOfPayment->ViewCustomAttributes = "";

            // CancelAmount
            $this->CancelAmount->ViewValue = $this->CancelAmount->CurrentValue;
            $this->CancelAmount->ViewCustomAttributes = "";

            // CancelBankName
            $this->CancelBankName->ViewValue = $this->CancelBankName->CurrentValue;
            $this->CancelBankName->ViewCustomAttributes = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->ViewValue = $this->CancelTransactionNumber->CurrentValue;
            $this->CancelTransactionNumber->ViewCustomAttributes = "";

            // LabTest
            $this->LabTest->ViewValue = $this->LabTest->CurrentValue;
            $this->LabTest->ViewCustomAttributes = "";

            // sid
            $this->sid->ViewValue = $this->sid->CurrentValue;
            $this->sid->ViewValue = FormatNumber($this->sid->ViewValue, 0, -2, -2, -2);
            $this->sid->ViewCustomAttributes = "";

            // SidNo
            $this->SidNo->ViewValue = $this->SidNo->CurrentValue;
            $this->SidNo->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientName->ViewValue = $this->highlightValue($this->PatientName);
            }

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Mobile->ViewValue = $this->highlightValue($this->Mobile);
            }

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Doctor->ViewValue = $this->highlightValue($this->Doctor);
            }

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BillNumber->ViewValue = $this->highlightValue($this->BillNumber);
            }

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BankName->ViewValue = $this->highlightValue($this->BankName);
            }

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->_UserName->ViewValue = $this->highlightValue($this->_UserName);
            }

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BillType->ViewValue = $this->highlightValue($this->BillType);
            }

            // CancelModeOfPayment
            $this->CancelModeOfPayment->LinkCustomAttributes = "";
            $this->CancelModeOfPayment->HrefValue = "";
            $this->CancelModeOfPayment->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CancelModeOfPayment->ViewValue = $this->highlightValue($this->CancelModeOfPayment);
            }

            // CancelAmount
            $this->CancelAmount->LinkCustomAttributes = "";
            $this->CancelAmount->HrefValue = "";
            $this->CancelAmount->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CancelAmount->ViewValue = $this->highlightValue($this->CancelAmount);
            }

            // CancelBankName
            $this->CancelBankName->LinkCustomAttributes = "";
            $this->CancelBankName->HrefValue = "";
            $this->CancelBankName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CancelBankName->ViewValue = $this->highlightValue($this->CancelBankName);
            }

            // CancelTransactionNumber
            $this->CancelTransactionNumber->LinkCustomAttributes = "";
            $this->CancelTransactionNumber->HrefValue = "";
            $this->CancelTransactionNumber->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CancelTransactionNumber->ViewValue = $this->highlightValue($this->CancelTransactionNumber);
            }

            // LabTest
            $this->LabTest->LinkCustomAttributes = "";
            $this->LabTest->HrefValue = "";
            $this->LabTest->TooltipValue = "";
            if (!$this->isExport()) {
                $this->LabTest->ViewValue = $this->highlightValue($this->LabTest);
            }

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";
            $this->sid->TooltipValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
            $this->SidNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SidNo->ViewValue = $this->highlightValue($this->SidNo);
            }
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->ModeofPayment->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->ModeofPayment->EditValue = $arwrk;
            }
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
                $this->Amount->OldValue = $this->Amount->EditValue;
            }

            // createddatetime

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->CurrentValue = HtmlDecode($this->BankName->CurrentValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->CurrentValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // UserName

            // BillType
            $this->BillType->EditAttrs["class"] = "form-control";
            $this->BillType->EditCustomAttributes = "";
            if (!$this->BillType->Raw) {
                $this->BillType->CurrentValue = HtmlDecode($this->BillType->CurrentValue);
            }
            $this->BillType->EditValue = HtmlEncode($this->BillType->CurrentValue);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // CancelModeOfPayment
            $this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
            $this->CancelModeOfPayment->EditCustomAttributes = "";
            if (!$this->CancelModeOfPayment->Raw) {
                $this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
            }
            $this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->CurrentValue);
            $this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

            // CancelAmount
            $this->CancelAmount->EditAttrs["class"] = "form-control";
            $this->CancelAmount->EditCustomAttributes = "";
            if (!$this->CancelAmount->Raw) {
                $this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
            }
            $this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->CurrentValue);
            $this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

            // CancelBankName
            $this->CancelBankName->EditAttrs["class"] = "form-control";
            $this->CancelBankName->EditCustomAttributes = "";
            if (!$this->CancelBankName->Raw) {
                $this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
            }
            $this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->CurrentValue);
            $this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

            // CancelTransactionNumber
            $this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
            $this->CancelTransactionNumber->EditCustomAttributes = "";
            if (!$this->CancelTransactionNumber->Raw) {
                $this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
            }
            $this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->CurrentValue);
            $this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

            // LabTest
            $this->LabTest->EditAttrs["class"] = "form-control";
            $this->LabTest->EditCustomAttributes = "";
            if (!$this->LabTest->Raw) {
                $this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
            }
            $this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
            $this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

            // Add refer script

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->LinkCustomAttributes = "";
            $this->CancelModeOfPayment->HrefValue = "";

            // CancelAmount
            $this->CancelAmount->LinkCustomAttributes = "";
            $this->CancelAmount->HrefValue = "";

            // CancelBankName
            $this->CancelBankName->LinkCustomAttributes = "";
            $this->CancelBankName->HrefValue = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->LinkCustomAttributes = "";
            $this->CancelTransactionNumber->HrefValue = "";

            // LabTest
            $this->LabTest->LinkCustomAttributes = "";
            $this->LabTest->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

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

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            $this->Doctor->EditValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $curVal = trim(strval($this->ModeofPayment->CurrentValue));
            if ($curVal != "") {
                $this->ModeofPayment->EditValue = $this->ModeofPayment->lookupCacheOption($curVal);
                if ($this->ModeofPayment->EditValue === null) { // Lookup from database
                    $filterWrk = "`Mode`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ModeofPayment->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ModeofPayment->Lookup->renderViewRow($rswrk[0]);
                        $this->ModeofPayment->EditValue = $this->ModeofPayment->displayValue($arwrk);
                    } else {
                        $this->ModeofPayment->EditValue = $this->ModeofPayment->CurrentValue;
                    }
                }
            } else {
                $this->ModeofPayment->EditValue = null;
            }
            $this->ModeofPayment->ViewCustomAttributes = "";

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = $this->Amount->CurrentValue;
            $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // createddatetime

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            $this->BankName->EditValue = $this->BankName->CurrentValue;
            $this->BankName->ViewCustomAttributes = "";

            // UserName

            // BillType
            $this->BillType->EditAttrs["class"] = "form-control";
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->CurrentValue;
            $this->BillType->ViewCustomAttributes = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
            $this->CancelModeOfPayment->EditCustomAttributes = "";
            if (!$this->CancelModeOfPayment->Raw) {
                $this->CancelModeOfPayment->CurrentValue = HtmlDecode($this->CancelModeOfPayment->CurrentValue);
            }
            $this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->CurrentValue);
            $this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

            // CancelAmount
            $this->CancelAmount->EditAttrs["class"] = "form-control";
            $this->CancelAmount->EditCustomAttributes = "";
            if (!$this->CancelAmount->Raw) {
                $this->CancelAmount->CurrentValue = HtmlDecode($this->CancelAmount->CurrentValue);
            }
            $this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->CurrentValue);
            $this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

            // CancelBankName
            $this->CancelBankName->EditAttrs["class"] = "form-control";
            $this->CancelBankName->EditCustomAttributes = "";
            if (!$this->CancelBankName->Raw) {
                $this->CancelBankName->CurrentValue = HtmlDecode($this->CancelBankName->CurrentValue);
            }
            $this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->CurrentValue);
            $this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

            // CancelTransactionNumber
            $this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
            $this->CancelTransactionNumber->EditCustomAttributes = "";
            if (!$this->CancelTransactionNumber->Raw) {
                $this->CancelTransactionNumber->CurrentValue = HtmlDecode($this->CancelTransactionNumber->CurrentValue);
            }
            $this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->CurrentValue);
            $this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

            // LabTest
            $this->LabTest->EditAttrs["class"] = "form-control";
            $this->LabTest->EditCustomAttributes = "";
            if (!$this->LabTest->Raw) {
                $this->LabTest->CurrentValue = HtmlDecode($this->LabTest->CurrentValue);
            }
            $this->LabTest->EditValue = HtmlEncode($this->LabTest->CurrentValue);
            $this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->CurrentValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->CurrentValue = HtmlDecode($this->SidNo->CurrentValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->CurrentValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());

            // Edit refer script

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";
            $this->Mobile->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";
            $this->ModeofPayment->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // BankName
            $this->BankName->LinkCustomAttributes = "";
            $this->BankName->HrefValue = "";
            $this->BankName->TooltipValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";

            // CancelModeOfPayment
            $this->CancelModeOfPayment->LinkCustomAttributes = "";
            $this->CancelModeOfPayment->HrefValue = "";

            // CancelAmount
            $this->CancelAmount->LinkCustomAttributes = "";
            $this->CancelAmount->HrefValue = "";

            // CancelBankName
            $this->CancelBankName->LinkCustomAttributes = "";
            $this->CancelBankName->HrefValue = "";

            // CancelTransactionNumber
            $this->CancelTransactionNumber->LinkCustomAttributes = "";
            $this->CancelTransactionNumber->HrefValue = "";

            // LabTest
            $this->LabTest->LinkCustomAttributes = "";
            $this->LabTest->HrefValue = "";

            // sid
            $this->sid->LinkCustomAttributes = "";
            $this->sid->HrefValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->AdvancedSearch->SearchValue = HtmlDecode($this->PatientId->AdvancedSearch->SearchValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

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

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->AdvancedSearch->SearchValue = HtmlDecode($this->Doctor->AdvancedSearch->SearchValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->AdvancedSearch->SearchValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // ModeofPayment
            $this->ModeofPayment->EditAttrs["class"] = "form-control";
            $this->ModeofPayment->EditCustomAttributes = "";
            $this->ModeofPayment->PlaceHolder = RemoveHtml($this->ModeofPayment->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 7), 7));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // BankName
            $this->BankName->EditAttrs["class"] = "form-control";
            $this->BankName->EditCustomAttributes = "";
            if (!$this->BankName->Raw) {
                $this->BankName->AdvancedSearch->SearchValue = HtmlDecode($this->BankName->AdvancedSearch->SearchValue);
            }
            $this->BankName->EditValue = HtmlEncode($this->BankName->AdvancedSearch->SearchValue);
            $this->BankName->PlaceHolder = RemoveHtml($this->BankName->caption());

            // UserName
            $this->_UserName->EditAttrs["class"] = "form-control";
            $this->_UserName->EditCustomAttributes = "";
            if (!$this->_UserName->Raw) {
                $this->_UserName->AdvancedSearch->SearchValue = HtmlDecode($this->_UserName->AdvancedSearch->SearchValue);
            }
            $this->_UserName->EditValue = HtmlEncode($this->_UserName->AdvancedSearch->SearchValue);
            $this->_UserName->PlaceHolder = RemoveHtml($this->_UserName->caption());

            // BillType
            $this->BillType->EditAttrs["class"] = "form-control";
            $this->BillType->EditCustomAttributes = "";
            if (!$this->BillType->Raw) {
                $this->BillType->AdvancedSearch->SearchValue = HtmlDecode($this->BillType->AdvancedSearch->SearchValue);
            }
            $this->BillType->EditValue = HtmlEncode($this->BillType->AdvancedSearch->SearchValue);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // CancelModeOfPayment
            $this->CancelModeOfPayment->EditAttrs["class"] = "form-control";
            $this->CancelModeOfPayment->EditCustomAttributes = "";
            if (!$this->CancelModeOfPayment->Raw) {
                $this->CancelModeOfPayment->AdvancedSearch->SearchValue = HtmlDecode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
            }
            $this->CancelModeOfPayment->EditValue = HtmlEncode($this->CancelModeOfPayment->AdvancedSearch->SearchValue);
            $this->CancelModeOfPayment->PlaceHolder = RemoveHtml($this->CancelModeOfPayment->caption());

            // CancelAmount
            $this->CancelAmount->EditAttrs["class"] = "form-control";
            $this->CancelAmount->EditCustomAttributes = "";
            if (!$this->CancelAmount->Raw) {
                $this->CancelAmount->AdvancedSearch->SearchValue = HtmlDecode($this->CancelAmount->AdvancedSearch->SearchValue);
            }
            $this->CancelAmount->EditValue = HtmlEncode($this->CancelAmount->AdvancedSearch->SearchValue);
            $this->CancelAmount->PlaceHolder = RemoveHtml($this->CancelAmount->caption());

            // CancelBankName
            $this->CancelBankName->EditAttrs["class"] = "form-control";
            $this->CancelBankName->EditCustomAttributes = "";
            if (!$this->CancelBankName->Raw) {
                $this->CancelBankName->AdvancedSearch->SearchValue = HtmlDecode($this->CancelBankName->AdvancedSearch->SearchValue);
            }
            $this->CancelBankName->EditValue = HtmlEncode($this->CancelBankName->AdvancedSearch->SearchValue);
            $this->CancelBankName->PlaceHolder = RemoveHtml($this->CancelBankName->caption());

            // CancelTransactionNumber
            $this->CancelTransactionNumber->EditAttrs["class"] = "form-control";
            $this->CancelTransactionNumber->EditCustomAttributes = "";
            if (!$this->CancelTransactionNumber->Raw) {
                $this->CancelTransactionNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
            }
            $this->CancelTransactionNumber->EditValue = HtmlEncode($this->CancelTransactionNumber->AdvancedSearch->SearchValue);
            $this->CancelTransactionNumber->PlaceHolder = RemoveHtml($this->CancelTransactionNumber->caption());

            // LabTest
            $this->LabTest->EditAttrs["class"] = "form-control";
            $this->LabTest->EditCustomAttributes = "";
            if (!$this->LabTest->Raw) {
                $this->LabTest->AdvancedSearch->SearchValue = HtmlDecode($this->LabTest->AdvancedSearch->SearchValue);
            }
            $this->LabTest->EditValue = HtmlEncode($this->LabTest->AdvancedSearch->SearchValue);
            $this->LabTest->PlaceHolder = RemoveHtml($this->LabTest->caption());

            // sid
            $this->sid->EditAttrs["class"] = "form-control";
            $this->sid->EditCustomAttributes = "";
            $this->sid->EditValue = HtmlEncode($this->sid->AdvancedSearch->SearchValue);
            $this->sid->PlaceHolder = RemoveHtml($this->sid->caption());

            // SidNo
            $this->SidNo->EditAttrs["class"] = "form-control";
            $this->SidNo->EditCustomAttributes = "";
            if (!$this->SidNo->Raw) {
                $this->SidNo->AdvancedSearch->SearchValue = HtmlDecode($this->SidNo->AdvancedSearch->SearchValue);
            }
            $this->SidNo->EditValue = HtmlEncode($this->SidNo->AdvancedSearch->SearchValue);
            $this->SidNo->PlaceHolder = RemoveHtml($this->SidNo->caption());
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
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
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
        if ($this->Doctor->Required) {
            if (!$this->Doctor->IsDetailKey && EmptyValue($this->Doctor->FormValue)) {
                $this->Doctor->addErrorMessage(str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
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
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
        }
        if ($this->BankName->Required) {
            if (!$this->BankName->IsDetailKey && EmptyValue($this->BankName->FormValue)) {
                $this->BankName->addErrorMessage(str_replace("%s", $this->BankName->caption(), $this->BankName->RequiredErrorMessage));
            }
        }
        if ($this->_UserName->Required) {
            if (!$this->_UserName->IsDetailKey && EmptyValue($this->_UserName->FormValue)) {
                $this->_UserName->addErrorMessage(str_replace("%s", $this->_UserName->caption(), $this->_UserName->RequiredErrorMessage));
            }
        }
        if ($this->BillType->Required) {
            if (!$this->BillType->IsDetailKey && EmptyValue($this->BillType->FormValue)) {
                $this->BillType->addErrorMessage(str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
            }
        }
        if ($this->CancelModeOfPayment->Required) {
            if (!$this->CancelModeOfPayment->IsDetailKey && EmptyValue($this->CancelModeOfPayment->FormValue)) {
                $this->CancelModeOfPayment->addErrorMessage(str_replace("%s", $this->CancelModeOfPayment->caption(), $this->CancelModeOfPayment->RequiredErrorMessage));
            }
        }
        if ($this->CancelAmount->Required) {
            if (!$this->CancelAmount->IsDetailKey && EmptyValue($this->CancelAmount->FormValue)) {
                $this->CancelAmount->addErrorMessage(str_replace("%s", $this->CancelAmount->caption(), $this->CancelAmount->RequiredErrorMessage));
            }
        }
        if ($this->CancelBankName->Required) {
            if (!$this->CancelBankName->IsDetailKey && EmptyValue($this->CancelBankName->FormValue)) {
                $this->CancelBankName->addErrorMessage(str_replace("%s", $this->CancelBankName->caption(), $this->CancelBankName->RequiredErrorMessage));
            }
        }
        if ($this->CancelTransactionNumber->Required) {
            if (!$this->CancelTransactionNumber->IsDetailKey && EmptyValue($this->CancelTransactionNumber->FormValue)) {
                $this->CancelTransactionNumber->addErrorMessage(str_replace("%s", $this->CancelTransactionNumber->caption(), $this->CancelTransactionNumber->RequiredErrorMessage));
            }
        }
        if ($this->LabTest->Required) {
            if (!$this->LabTest->IsDetailKey && EmptyValue($this->LabTest->FormValue)) {
                $this->LabTest->addErrorMessage(str_replace("%s", $this->LabTest->caption(), $this->LabTest->RequiredErrorMessage));
            }
        }
        if ($this->sid->Required) {
            if (!$this->sid->IsDetailKey && EmptyValue($this->sid->FormValue)) {
                $this->sid->addErrorMessage(str_replace("%s", $this->sid->caption(), $this->sid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->sid->FormValue)) {
            $this->sid->addErrorMessage($this->sid->getErrorMessage(false));
        }
        if ($this->SidNo->Required) {
            if (!$this->SidNo->IsDetailKey && EmptyValue($this->SidNo->FormValue)) {
                $this->SidNo->addErrorMessage(str_replace("%s", $this->SidNo->caption(), $this->SidNo->RequiredErrorMessage));
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

            // CancelModeOfPayment
            $this->CancelModeOfPayment->setDbValueDef($rsnew, $this->CancelModeOfPayment->CurrentValue, null, $this->CancelModeOfPayment->ReadOnly);

            // CancelAmount
            $this->CancelAmount->setDbValueDef($rsnew, $this->CancelAmount->CurrentValue, null, $this->CancelAmount->ReadOnly);

            // CancelBankName
            $this->CancelBankName->setDbValueDef($rsnew, $this->CancelBankName->CurrentValue, null, $this->CancelBankName->ReadOnly);

            // CancelTransactionNumber
            $this->CancelTransactionNumber->setDbValueDef($rsnew, $this->CancelTransactionNumber->CurrentValue, null, $this->CancelTransactionNumber->ReadOnly);

            // LabTest
            $this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, null, $this->LabTest->ReadOnly);

            // sid
            $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, $this->sid->ReadOnly);

            // SidNo
            $this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, null, $this->SidNo->ReadOnly);

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
        $hash .= GetFieldHash($row['CancelModeOfPayment']); // CancelModeOfPayment
        $hash .= GetFieldHash($row['CancelAmount']); // CancelAmount
        $hash .= GetFieldHash($row['CancelBankName']); // CancelBankName
        $hash .= GetFieldHash($row['CancelTransactionNumber']); // CancelTransactionNumber
        $hash .= GetFieldHash($row['LabTest']); // LabTest
        $hash .= GetFieldHash($row['sid']); // sid
        $hash .= GetFieldHash($row['SidNo']); // SidNo
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

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // Doctor
        $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // BillNumber
        $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, false);

        // BankName
        $this->BankName->setDbValueDef($rsnew, $this->BankName->CurrentValue, null, false);

        // UserName
        $this->_UserName->CurrentValue = GetUserName();
        $this->_UserName->setDbValueDef($rsnew, $this->_UserName->CurrentValue, null);

        // BillType
        $this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, null, false);

        // CancelModeOfPayment
        $this->CancelModeOfPayment->setDbValueDef($rsnew, $this->CancelModeOfPayment->CurrentValue, null, false);

        // CancelAmount
        $this->CancelAmount->setDbValueDef($rsnew, $this->CancelAmount->CurrentValue, null, false);

        // CancelBankName
        $this->CancelBankName->setDbValueDef($rsnew, $this->CancelBankName->CurrentValue, null, false);

        // CancelTransactionNumber
        $this->CancelTransactionNumber->setDbValueDef($rsnew, $this->CancelTransactionNumber->CurrentValue, null, false);

        // LabTest
        $this->LabTest->setDbValueDef($rsnew, $this->LabTest->CurrentValue, null, false);

        // sid
        $this->sid->setDbValueDef($rsnew, $this->sid->CurrentValue, null, false);

        // SidNo
        $this->SidNo->setDbValueDef($rsnew, $this->SidNo->CurrentValue, null, false);

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
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_billing_voucher_printlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_billing_voucher_printlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_billing_voucher_printlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_billing_voucher_print" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_billing_voucher_print\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_billing_voucher_printlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_billing_voucher_printlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_billing_voucher_printlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_Reception":
                    break;
                case "x_ModeofPayment":
                    break;
                case "x_RIDNO":
                    break;
                case "x_CId":
                    break;
                case "x_PatId":
                    break;
                case "x_RefferedBy":
                    break;
                case "x_DrID":
                    $lookupFilter = function () {
                        return "`HospID`='".HospitalID()."'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_ReportHeader":
                    break;
                case "x_AdjustmentAdvance":
                    break;
                case "x_IncludePackage":
                    break;
                case "x_CancelBill":
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
