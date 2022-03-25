<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBillingVoucherList extends PharmacyBillingVoucher
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_billing_voucher';

    // Page object name
    public $PageObjName = "PharmacyBillingVoucherList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpharmacy_billing_voucherlist";
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

        // Table object (pharmacy_billing_voucher)
        if (!isset($GLOBALS["pharmacy_billing_voucher"]) || get_class($GLOBALS["pharmacy_billing_voucher"]) == PROJECT_NAMESPACE . "pharmacy_billing_voucher") {
            $GLOBALS["pharmacy_billing_voucher"] = &$this;
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
        $this->AddUrl = "PharmacyBillingVoucherAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PharmacyBillingVoucherDelete";
        $this->MultiUpdateUrl = "PharmacyBillingVoucherUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_billing_voucher');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpharmacy_billing_voucherlistsrch";

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
                $doc = new $class(Container("pharmacy_billing_voucher"));
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
            $this->PharID->Visible = false;
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
        $this->id->setVisibility();
        $this->BillNumber->setVisibility();
        $this->voucher_type->Visible = false;
        $this->Reception->Visible = false;
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Mobile->setVisibility();
        $this->Age->Visible = false;
        $this->mrnno->setVisibility();
        $this->IP_OP->setVisibility();
        $this->Doctor->setVisibility();
        $this->Gender->Visible = false;
        $this->Details->Visible = false;
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->RealizationAmount->setVisibility();
        $this->RealizationStatus->Visible = false;
        $this->RealizationRemarks->Visible = false;
        $this->RealizationBatchNo->Visible = false;
        $this->RealizationDate->Visible = false;
        $this->HospID->Visible = false;
        $this->RIDNO->Visible = false;
        $this->TidNo->Visible = false;
        $this->CId->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PayerType->Visible = false;
        $this->profilePic->Visible = false;
        $this->Dob->Visible = false;
        $this->Currency->Visible = false;
        $this->DiscountRemarks->Visible = false;
        $this->Remarks->Visible = false;
        $this->PatId->Visible = false;
        $this->DrDepartment->Visible = false;
        $this->RefferedBy->Visible = false;
        $this->CardNumber->setVisibility();
        $this->BankName->Visible = false;
        $this->DrID->Visible = false;
        $this->BillStatus->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->PharID->setVisibility();
        $this->_UserName->setVisibility();
        $this->CardType->setVisibility();
        $this->DiscountAmount->setVisibility();
        $this->ApprovalNumber->setVisibility();
        $this->Cash->setVisibility();
        $this->Card->setVisibility();
        $this->BillType->setVisibility();
        $this->PartialSave->setVisibility();
        $this->PatientGST->setVisibility();
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
        $this->Amount->FormValue = ""; // Clear form value
        $this->RealizationAmount->FormValue = ""; // Clear form value
        $this->DiscountAmount->FormValue = ""; // Clear form value
        $this->Cash->FormValue = ""; // Clear form value
        $this->Card->FormValue = ""; // Clear form value
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
        if ($CurrentForm->hasValue("x_BillNumber") && $CurrentForm->hasValue("o_BillNumber") && $this->BillNumber->CurrentValue != $this->BillNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientId") && $CurrentForm->hasValue("o_PatientId") && $this->PatientId->CurrentValue != $this->PatientId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Mobile") && $CurrentForm->hasValue("o_Mobile") && $this->Mobile->CurrentValue != $this->Mobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_mrnno") && $CurrentForm->hasValue("o_mrnno") && $this->mrnno->CurrentValue != $this->mrnno->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IP_OP") && $CurrentForm->hasValue("o_IP_OP") && $this->IP_OP->CurrentValue != $this->IP_OP->OldValue) {
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
        if ($CurrentForm->hasValue("x_AnyDues") && $CurrentForm->hasValue("o_AnyDues") && $this->AnyDues->CurrentValue != $this->AnyDues->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RealizationAmount") && $CurrentForm->hasValue("o_RealizationAmount") && $this->RealizationAmount->CurrentValue != $this->RealizationAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CId") && $CurrentForm->hasValue("o_CId") && $this->CId->CurrentValue != $this->CId->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PartnerName") && $CurrentForm->hasValue("o_PartnerName") && $this->PartnerName->CurrentValue != $this->PartnerName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CardNumber") && $CurrentForm->hasValue("o_CardNumber") && $this->CardNumber->CurrentValue != $this->CardNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillStatus") && $CurrentForm->hasValue("o_BillStatus") && $this->BillStatus->CurrentValue != $this->BillStatus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ReportHeader") && $CurrentForm->hasValue("o_ReportHeader") && $this->ReportHeader->CurrentValue != $this->ReportHeader->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CardType") && $CurrentForm->hasValue("o_CardType") && $this->CardType->CurrentValue != $this->CardType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DiscountAmount") && $CurrentForm->hasValue("o_DiscountAmount") && $this->DiscountAmount->CurrentValue != $this->DiscountAmount->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ApprovalNumber") && $CurrentForm->hasValue("o_ApprovalNumber") && $this->ApprovalNumber->CurrentValue != $this->ApprovalNumber->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Cash") && $CurrentForm->hasValue("o_Cash") && $this->Cash->CurrentValue != $this->Cash->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Card") && $CurrentForm->hasValue("o_Card") && $this->Card->CurrentValue != $this->Card->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_BillType") && $CurrentForm->hasValue("o_BillType") && $this->BillType->CurrentValue != $this->BillType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PartialSave") && $CurrentForm->hasValue("o_PartialSave") && $this->PartialSave->CurrentValue != $this->PartialSave->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PatientGST") && $CurrentForm->hasValue("o_PatientGST") && $this->PatientGST->CurrentValue != $this->PatientGST->OldValue) {
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
        $this->BillNumber->clearErrorMessage();
        $this->PatientId->clearErrorMessage();
        $this->PatientName->clearErrorMessage();
        $this->Mobile->clearErrorMessage();
        $this->mrnno->clearErrorMessage();
        $this->IP_OP->clearErrorMessage();
        $this->Doctor->clearErrorMessage();
        $this->ModeofPayment->clearErrorMessage();
        $this->Amount->clearErrorMessage();
        $this->AnyDues->clearErrorMessage();
        $this->createdby->clearErrorMessage();
        $this->createddatetime->clearErrorMessage();
        $this->modifiedby->clearErrorMessage();
        $this->modifieddatetime->clearErrorMessage();
        $this->RealizationAmount->clearErrorMessage();
        $this->CId->clearErrorMessage();
        $this->PartnerName->clearErrorMessage();
        $this->CardNumber->clearErrorMessage();
        $this->BillStatus->clearErrorMessage();
        $this->ReportHeader->clearErrorMessage();
        $this->PharID->clearErrorMessage();
        $this->_UserName->clearErrorMessage();
        $this->CardType->clearErrorMessage();
        $this->DiscountAmount->clearErrorMessage();
        $this->ApprovalNumber->clearErrorMessage();
        $this->Cash->clearErrorMessage();
        $this->Card->clearErrorMessage();
        $this->BillType->clearErrorMessage();
        $this->PartialSave->clearErrorMessage();
        $this->PatientGST->clearErrorMessage();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpharmacy_billing_voucherlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->BillNumber->AdvancedSearch->toJson(), ","); // Field BillNumber
        $filterList = Concat($filterList, $this->voucher_type->AdvancedSearch->toJson(), ","); // Field voucher_type
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Mobile->AdvancedSearch->toJson(), ","); // Field Mobile
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->IP_OP->AdvancedSearch->toJson(), ","); // Field IP_OP
        $filterList = Concat($filterList, $this->Doctor->AdvancedSearch->toJson(), ","); // Field Doctor
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
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
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->Dob->AdvancedSearch->toJson(), ","); // Field Dob
        $filterList = Concat($filterList, $this->Currency->AdvancedSearch->toJson(), ","); // Field Currency
        $filterList = Concat($filterList, $this->DiscountRemarks->AdvancedSearch->toJson(), ","); // Field DiscountRemarks
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->PatId->AdvancedSearch->toJson(), ","); // Field PatId
        $filterList = Concat($filterList, $this->DrDepartment->AdvancedSearch->toJson(), ","); // Field DrDepartment
        $filterList = Concat($filterList, $this->RefferedBy->AdvancedSearch->toJson(), ","); // Field RefferedBy
        $filterList = Concat($filterList, $this->CardNumber->AdvancedSearch->toJson(), ","); // Field CardNumber
        $filterList = Concat($filterList, $this->BankName->AdvancedSearch->toJson(), ","); // Field BankName
        $filterList = Concat($filterList, $this->DrID->AdvancedSearch->toJson(), ","); // Field DrID
        $filterList = Concat($filterList, $this->BillStatus->AdvancedSearch->toJson(), ","); // Field BillStatus
        $filterList = Concat($filterList, $this->ReportHeader->AdvancedSearch->toJson(), ","); // Field ReportHeader
        $filterList = Concat($filterList, $this->PharID->AdvancedSearch->toJson(), ","); // Field PharID
        $filterList = Concat($filterList, $this->_UserName->AdvancedSearch->toJson(), ","); // Field UserName
        $filterList = Concat($filterList, $this->CardType->AdvancedSearch->toJson(), ","); // Field CardType
        $filterList = Concat($filterList, $this->DiscountAmount->AdvancedSearch->toJson(), ","); // Field DiscountAmount
        $filterList = Concat($filterList, $this->ApprovalNumber->AdvancedSearch->toJson(), ","); // Field ApprovalNumber
        $filterList = Concat($filterList, $this->Cash->AdvancedSearch->toJson(), ","); // Field Cash
        $filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
        $filterList = Concat($filterList, $this->BillType->AdvancedSearch->toJson(), ","); // Field BillType
        $filterList = Concat($filterList, $this->PartialSave->AdvancedSearch->toJson(), ","); // Field PartialSave
        $filterList = Concat($filterList, $this->PatientGST->AdvancedSearch->toJson(), ","); // Field PatientGST
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpharmacy_billing_voucherlistsrch", $filters);
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

        // Field BillNumber
        $this->BillNumber->AdvancedSearch->SearchValue = @$filter["x_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator = @$filter["z_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchCondition = @$filter["v_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchValue2 = @$filter["y_BillNumber"];
        $this->BillNumber->AdvancedSearch->SearchOperator2 = @$filter["w_BillNumber"];
        $this->BillNumber->AdvancedSearch->save();

        // Field voucher_type
        $this->voucher_type->AdvancedSearch->SearchValue = @$filter["x_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchOperator = @$filter["z_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchCondition = @$filter["v_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchValue2 = @$filter["y_voucher_type"];
        $this->voucher_type->AdvancedSearch->SearchOperator2 = @$filter["w_voucher_type"];
        $this->voucher_type->AdvancedSearch->save();

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

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field Mobile
        $this->Mobile->AdvancedSearch->SearchValue = @$filter["x_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator = @$filter["z_Mobile"];
        $this->Mobile->AdvancedSearch->SearchCondition = @$filter["v_Mobile"];
        $this->Mobile->AdvancedSearch->SearchValue2 = @$filter["y_Mobile"];
        $this->Mobile->AdvancedSearch->SearchOperator2 = @$filter["w_Mobile"];
        $this->Mobile->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

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

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

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

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

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

        // Field PharID
        $this->PharID->AdvancedSearch->SearchValue = @$filter["x_PharID"];
        $this->PharID->AdvancedSearch->SearchOperator = @$filter["z_PharID"];
        $this->PharID->AdvancedSearch->SearchCondition = @$filter["v_PharID"];
        $this->PharID->AdvancedSearch->SearchValue2 = @$filter["y_PharID"];
        $this->PharID->AdvancedSearch->SearchOperator2 = @$filter["w_PharID"];
        $this->PharID->AdvancedSearch->save();

        // Field UserName
        $this->_UserName->AdvancedSearch->SearchValue = @$filter["x__UserName"];
        $this->_UserName->AdvancedSearch->SearchOperator = @$filter["z__UserName"];
        $this->_UserName->AdvancedSearch->SearchCondition = @$filter["v__UserName"];
        $this->_UserName->AdvancedSearch->SearchValue2 = @$filter["y__UserName"];
        $this->_UserName->AdvancedSearch->SearchOperator2 = @$filter["w__UserName"];
        $this->_UserName->AdvancedSearch->save();

        // Field CardType
        $this->CardType->AdvancedSearch->SearchValue = @$filter["x_CardType"];
        $this->CardType->AdvancedSearch->SearchOperator = @$filter["z_CardType"];
        $this->CardType->AdvancedSearch->SearchCondition = @$filter["v_CardType"];
        $this->CardType->AdvancedSearch->SearchValue2 = @$filter["y_CardType"];
        $this->CardType->AdvancedSearch->SearchOperator2 = @$filter["w_CardType"];
        $this->CardType->AdvancedSearch->save();

        // Field DiscountAmount
        $this->DiscountAmount->AdvancedSearch->SearchValue = @$filter["x_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchOperator = @$filter["z_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchCondition = @$filter["v_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchValue2 = @$filter["y_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DiscountAmount"];
        $this->DiscountAmount->AdvancedSearch->save();

        // Field ApprovalNumber
        $this->ApprovalNumber->AdvancedSearch->SearchValue = @$filter["x_ApprovalNumber"];
        $this->ApprovalNumber->AdvancedSearch->SearchOperator = @$filter["z_ApprovalNumber"];
        $this->ApprovalNumber->AdvancedSearch->SearchCondition = @$filter["v_ApprovalNumber"];
        $this->ApprovalNumber->AdvancedSearch->SearchValue2 = @$filter["y_ApprovalNumber"];
        $this->ApprovalNumber->AdvancedSearch->SearchOperator2 = @$filter["w_ApprovalNumber"];
        $this->ApprovalNumber->AdvancedSearch->save();

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

        // Field BillType
        $this->BillType->AdvancedSearch->SearchValue = @$filter["x_BillType"];
        $this->BillType->AdvancedSearch->SearchOperator = @$filter["z_BillType"];
        $this->BillType->AdvancedSearch->SearchCondition = @$filter["v_BillType"];
        $this->BillType->AdvancedSearch->SearchValue2 = @$filter["y_BillType"];
        $this->BillType->AdvancedSearch->SearchOperator2 = @$filter["w_BillType"];
        $this->BillType->AdvancedSearch->save();

        // Field PartialSave
        $this->PartialSave->AdvancedSearch->SearchValue = @$filter["x_PartialSave"];
        $this->PartialSave->AdvancedSearch->SearchOperator = @$filter["z_PartialSave"];
        $this->PartialSave->AdvancedSearch->SearchCondition = @$filter["v_PartialSave"];
        $this->PartialSave->AdvancedSearch->SearchValue2 = @$filter["y_PartialSave"];
        $this->PartialSave->AdvancedSearch->SearchOperator2 = @$filter["w_PartialSave"];
        $this->PartialSave->AdvancedSearch->save();

        // Field PatientGST
        $this->PatientGST->AdvancedSearch->SearchValue = @$filter["x_PatientGST"];
        $this->PatientGST->AdvancedSearch->SearchOperator = @$filter["z_PatientGST"];
        $this->PatientGST->AdvancedSearch->SearchCondition = @$filter["v_PatientGST"];
        $this->PatientGST->AdvancedSearch->SearchValue2 = @$filter["y_PatientGST"];
        $this->PatientGST->AdvancedSearch->SearchOperator2 = @$filter["w_PatientGST"];
        $this->PatientGST->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->BillNumber, $default, false); // BillNumber
        $this->buildSearchSql($where, $this->voucher_type, $default, false); // voucher_type
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->PatientId, $default, false); // PatientId
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->Mobile, $default, false); // Mobile
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->IP_OP, $default, false); // IP_OP
        $this->buildSearchSql($where, $this->Doctor, $default, false); // Doctor
        $this->buildSearchSql($where, $this->Gender, $default, false); // Gender
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
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->Dob, $default, false); // Dob
        $this->buildSearchSql($where, $this->Currency, $default, false); // Currency
        $this->buildSearchSql($where, $this->DiscountRemarks, $default, false); // DiscountRemarks
        $this->buildSearchSql($where, $this->Remarks, $default, false); // Remarks
        $this->buildSearchSql($where, $this->PatId, $default, false); // PatId
        $this->buildSearchSql($where, $this->DrDepartment, $default, false); // DrDepartment
        $this->buildSearchSql($where, $this->RefferedBy, $default, false); // RefferedBy
        $this->buildSearchSql($where, $this->CardNumber, $default, false); // CardNumber
        $this->buildSearchSql($where, $this->BankName, $default, false); // BankName
        $this->buildSearchSql($where, $this->DrID, $default, false); // DrID
        $this->buildSearchSql($where, $this->BillStatus, $default, false); // BillStatus
        $this->buildSearchSql($where, $this->ReportHeader, $default, true); // ReportHeader
        $this->buildSearchSql($where, $this->PharID, $default, false); // PharID
        $this->buildSearchSql($where, $this->_UserName, $default, false); // UserName
        $this->buildSearchSql($where, $this->CardType, $default, false); // CardType
        $this->buildSearchSql($where, $this->DiscountAmount, $default, false); // DiscountAmount
        $this->buildSearchSql($where, $this->ApprovalNumber, $default, false); // ApprovalNumber
        $this->buildSearchSql($where, $this->Cash, $default, false); // Cash
        $this->buildSearchSql($where, $this->Card, $default, false); // Card
        $this->buildSearchSql($where, $this->BillType, $default, false); // BillType
        $this->buildSearchSql($where, $this->PartialSave, $default, true); // PartialSave
        $this->buildSearchSql($where, $this->PatientGST, $default, false); // PatientGST

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->BillNumber->AdvancedSearch->save(); // BillNumber
            $this->voucher_type->AdvancedSearch->save(); // voucher_type
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->PatientId->AdvancedSearch->save(); // PatientId
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->Mobile->AdvancedSearch->save(); // Mobile
            $this->Age->AdvancedSearch->save(); // Age
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->IP_OP->AdvancedSearch->save(); // IP_OP
            $this->Doctor->AdvancedSearch->save(); // Doctor
            $this->Gender->AdvancedSearch->save(); // Gender
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
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->Dob->AdvancedSearch->save(); // Dob
            $this->Currency->AdvancedSearch->save(); // Currency
            $this->DiscountRemarks->AdvancedSearch->save(); // DiscountRemarks
            $this->Remarks->AdvancedSearch->save(); // Remarks
            $this->PatId->AdvancedSearch->save(); // PatId
            $this->DrDepartment->AdvancedSearch->save(); // DrDepartment
            $this->RefferedBy->AdvancedSearch->save(); // RefferedBy
            $this->CardNumber->AdvancedSearch->save(); // CardNumber
            $this->BankName->AdvancedSearch->save(); // BankName
            $this->DrID->AdvancedSearch->save(); // DrID
            $this->BillStatus->AdvancedSearch->save(); // BillStatus
            $this->ReportHeader->AdvancedSearch->save(); // ReportHeader
            $this->PharID->AdvancedSearch->save(); // PharID
            $this->_UserName->AdvancedSearch->save(); // UserName
            $this->CardType->AdvancedSearch->save(); // CardType
            $this->DiscountAmount->AdvancedSearch->save(); // DiscountAmount
            $this->ApprovalNumber->AdvancedSearch->save(); // ApprovalNumber
            $this->Cash->AdvancedSearch->save(); // Cash
            $this->Card->AdvancedSearch->save(); // Card
            $this->BillType->AdvancedSearch->save(); // BillType
            $this->PartialSave->AdvancedSearch->save(); // PartialSave
            $this->PatientGST->AdvancedSearch->save(); // PatientGST
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
        $this->buildBasicSearchSql($where, $this->BillNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IP_OP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Doctor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
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
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Dob, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Currency, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountRemarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DrDepartment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefferedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CardNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BankName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReportHeader, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_UserName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CardType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DiscountAmount, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ApprovalNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartialSave, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientGST, $arKeywords, $type);
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
        if ($this->BillNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->voucher_type->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reception->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Mobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IP_OP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Doctor->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Gender->AdvancedSearch->issetSession()) {
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
        if ($this->profilePic->AdvancedSearch->issetSession()) {
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
        if ($this->PharID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->_UserName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CardType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DiscountAmount->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ApprovalNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Cash->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Card->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BillType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartialSave->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientGST->AdvancedSearch->issetSession()) {
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
                $this->BillNumber->AdvancedSearch->unsetSession();
                $this->voucher_type->AdvancedSearch->unsetSession();
                $this->Reception->AdvancedSearch->unsetSession();
                $this->PatientId->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->Mobile->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->IP_OP->AdvancedSearch->unsetSession();
                $this->Doctor->AdvancedSearch->unsetSession();
                $this->Gender->AdvancedSearch->unsetSession();
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
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->Dob->AdvancedSearch->unsetSession();
                $this->Currency->AdvancedSearch->unsetSession();
                $this->DiscountRemarks->AdvancedSearch->unsetSession();
                $this->Remarks->AdvancedSearch->unsetSession();
                $this->PatId->AdvancedSearch->unsetSession();
                $this->DrDepartment->AdvancedSearch->unsetSession();
                $this->RefferedBy->AdvancedSearch->unsetSession();
                $this->CardNumber->AdvancedSearch->unsetSession();
                $this->BankName->AdvancedSearch->unsetSession();
                $this->DrID->AdvancedSearch->unsetSession();
                $this->BillStatus->AdvancedSearch->unsetSession();
                $this->ReportHeader->AdvancedSearch->unsetSession();
                $this->PharID->AdvancedSearch->unsetSession();
                $this->_UserName->AdvancedSearch->unsetSession();
                $this->CardType->AdvancedSearch->unsetSession();
                $this->DiscountAmount->AdvancedSearch->unsetSession();
                $this->ApprovalNumber->AdvancedSearch->unsetSession();
                $this->Cash->AdvancedSearch->unsetSession();
                $this->Card->AdvancedSearch->unsetSession();
                $this->BillType->AdvancedSearch->unsetSession();
                $this->PartialSave->AdvancedSearch->unsetSession();
                $this->PatientGST->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->BillNumber->AdvancedSearch->load();
                $this->voucher_type->AdvancedSearch->load();
                $this->Reception->AdvancedSearch->load();
                $this->PatientId->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->Mobile->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->IP_OP->AdvancedSearch->load();
                $this->Doctor->AdvancedSearch->load();
                $this->Gender->AdvancedSearch->load();
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
                $this->profilePic->AdvancedSearch->load();
                $this->Dob->AdvancedSearch->load();
                $this->Currency->AdvancedSearch->load();
                $this->DiscountRemarks->AdvancedSearch->load();
                $this->Remarks->AdvancedSearch->load();
                $this->PatId->AdvancedSearch->load();
                $this->DrDepartment->AdvancedSearch->load();
                $this->RefferedBy->AdvancedSearch->load();
                $this->CardNumber->AdvancedSearch->load();
                $this->BankName->AdvancedSearch->load();
                $this->DrID->AdvancedSearch->load();
                $this->BillStatus->AdvancedSearch->load();
                $this->ReportHeader->AdvancedSearch->load();
                $this->PharID->AdvancedSearch->load();
                $this->_UserName->AdvancedSearch->load();
                $this->CardType->AdvancedSearch->load();
                $this->DiscountAmount->AdvancedSearch->load();
                $this->ApprovalNumber->AdvancedSearch->load();
                $this->Cash->AdvancedSearch->load();
                $this->Card->AdvancedSearch->load();
                $this->BillType->AdvancedSearch->load();
                $this->PartialSave->AdvancedSearch->load();
                $this->PatientGST->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->BillNumber); // BillNumber
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Mobile); // Mobile
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->IP_OP); // IP_OP
            $this->updateSort($this->Doctor); // Doctor
            $this->updateSort($this->ModeofPayment); // ModeofPayment
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->AnyDues); // AnyDues
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->RealizationAmount); // RealizationAmount
            $this->updateSort($this->CId); // CId
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->CardNumber); // CardNumber
            $this->updateSort($this->BillStatus); // BillStatus
            $this->updateSort($this->ReportHeader); // ReportHeader
            $this->updateSort($this->PharID); // PharID
            $this->updateSort($this->_UserName); // UserName
            $this->updateSort($this->CardType); // CardType
            $this->updateSort($this->DiscountAmount); // DiscountAmount
            $this->updateSort($this->ApprovalNumber); // ApprovalNumber
            $this->updateSort($this->Cash); // Cash
            $this->updateSort($this->Card); // Card
            $this->updateSort($this->BillType); // BillType
            $this->updateSort($this->PartialSave); // PartialSave
            $this->updateSort($this->PatientGST); // PatientGST
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
                $this->BillNumber->setSort("");
                $this->voucher_type->setSort("");
                $this->Reception->setSort("");
                $this->PatientId->setSort("");
                $this->PatientName->setSort("");
                $this->Mobile->setSort("");
                $this->Age->setSort("");
                $this->mrnno->setSort("");
                $this->IP_OP->setSort("");
                $this->Doctor->setSort("");
                $this->Gender->setSort("");
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
                $this->profilePic->setSort("");
                $this->Dob->setSort("");
                $this->Currency->setSort("");
                $this->DiscountRemarks->setSort("");
                $this->Remarks->setSort("");
                $this->PatId->setSort("");
                $this->DrDepartment->setSort("");
                $this->RefferedBy->setSort("");
                $this->CardNumber->setSort("");
                $this->BankName->setSort("");
                $this->DrID->setSort("");
                $this->BillStatus->setSort("");
                $this->ReportHeader->setSort("");
                $this->PharID->setSort("");
                $this->_UserName->setSort("");
                $this->CardType->setSort("");
                $this->DiscountAmount->setSort("");
                $this->ApprovalNumber->setSort("");
                $this->Cash->setSort("");
                $this->Card->setSort("");
                $this->BillType->setSort("");
                $this->PartialSave->setSort("");
                $this->PatientGST->setSort("");
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

        // "detail_pharmacy_pharled"
        $item = &$this->ListOptions->add("detail_pharmacy_pharled");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'pharmacy_pharled') && !$this->ShowMultipleDetails;
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
        $pages->add("pharmacy_pharled");
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

        // "detail_pharmacy_pharled"
        $opt = $this->ListOptions["detail_pharmacy_pharled"];
        if ($Security->allowList(CurrentProjectID() . 'pharmacy_pharled')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("pharmacy_pharled", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("PharmacyPharledList?" . Config("TABLE_SHOW_MASTER") . "=pharmacy_billing_voucher&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("PharmacyPharledGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "pharmacy_pharled";
            }
            if ($detailPage->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailEditTblVar != "") {
                    $detailEditTblVar .= ",";
                }
                $detailEditTblVar .= "pharmacy_pharled";
            }
            if ($detailPage->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $caption = $Language->phrase("MasterDetailCopyLink");
                $url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailCopyTblVar != "") {
                    $detailCopyTblVar .= ",";
                }
                $detailCopyTblVar .= "pharmacy_pharled";
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
                $item = &$option->add("detailadd_pharmacy_pharled");
                $url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $detailPage = Container("PharmacyPharledGrid");
                $caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $detailPage->tableCaption();
                $item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode(GetUrl($url)) . "\">" . $caption . "</a>";
                $item->Visible = ($detailPage->DetailAdd && $Security->allowAdd(CurrentProjectID() . 'pharmacy_billing_voucher') && $Security->canAdd());
                if ($item->Visible) {
                    if ($detailTableLink != "") {
                        $detailTableLink .= ",";
                    }
                    $detailTableLink .= "pharmacy_pharled";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpharmacy_billing_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpharmacy_billing_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpharmacy_billing_voucherlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $sqlwrk = "`pbv`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";

        // Column "detail_pharmacy_pharled"
        if ($this->DetailPages && $this->DetailPages["pharmacy_pharled"] && $this->DetailPages["pharmacy_pharled"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_pharmacy_pharled"];
            $url = "PharmacyPharledPreview?t=pharmacy_billing_voucher&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $label = $Language->TablePhrase("pharmacy_pharled", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"pharmacy_pharled\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("PharmacyPharledList?" . Config("TABLE_SHOW_MASTER") . "=pharmacy_billing_voucher&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("pharmacy_pharled", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("PharmacyPharledGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            if ($detailPageObj->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 'pharmacy_billing_voucher')) {
                $caption = $Language->phrase("MasterDetailEditLink");
                $url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=pharmacy_pharled");
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
        $this->BillNumber->CurrentValue = null;
        $this->BillNumber->OldValue = $this->BillNumber->CurrentValue;
        $this->voucher_type->CurrentValue = null;
        $this->voucher_type->OldValue = $this->voucher_type->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatientId->CurrentValue = null;
        $this->PatientId->OldValue = $this->PatientId->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->Mobile->CurrentValue = null;
        $this->Mobile->OldValue = $this->Mobile->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->IP_OP->CurrentValue = null;
        $this->IP_OP->OldValue = $this->IP_OP->CurrentValue;
        $this->Doctor->CurrentValue = null;
        $this->Doctor->OldValue = $this->Doctor->CurrentValue;
        $this->Gender->CurrentValue = null;
        $this->Gender->OldValue = $this->Gender->CurrentValue;
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
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
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
        $this->PharID->CurrentValue = null;
        $this->PharID->OldValue = $this->PharID->CurrentValue;
        $this->_UserName->CurrentValue = null;
        $this->_UserName->OldValue = $this->_UserName->CurrentValue;
        $this->CardType->CurrentValue = null;
        $this->CardType->OldValue = $this->CardType->CurrentValue;
        $this->DiscountAmount->CurrentValue = 0;
        $this->DiscountAmount->OldValue = $this->DiscountAmount->CurrentValue;
        $this->ApprovalNumber->CurrentValue = null;
        $this->ApprovalNumber->OldValue = $this->ApprovalNumber->CurrentValue;
        $this->Cash->CurrentValue = null;
        $this->Cash->OldValue = $this->Cash->CurrentValue;
        $this->Card->CurrentValue = null;
        $this->Card->OldValue = $this->Card->CurrentValue;
        $this->BillType->CurrentValue = OP;
        $this->BillType->OldValue = $this->BillType->CurrentValue;
        $this->PartialSave->CurrentValue = null;
        $this->PartialSave->OldValue = $this->PartialSave->CurrentValue;
        $this->PatientGST->CurrentValue = null;
        $this->PatientGST->OldValue = $this->PatientGST->CurrentValue;
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

        // BillNumber
        if (!$this->isAddOrEdit() && $this->BillNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillNumber->AdvancedSearch->SearchValue != "" || $this->BillNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Age
        if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Gender
        if (!$this->isAddOrEdit() && $this->Gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Gender->AdvancedSearch->SearchValue != "" || $this->Gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // profilePic
        if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PharID
        if (!$this->isAddOrEdit() && $this->PharID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PharID->AdvancedSearch->SearchValue != "" || $this->PharID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // CardType
        if (!$this->isAddOrEdit() && $this->CardType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CardType->AdvancedSearch->SearchValue != "" || $this->CardType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // ApprovalNumber
        if (!$this->isAddOrEdit() && $this->ApprovalNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ApprovalNumber->AdvancedSearch->SearchValue != "" || $this->ApprovalNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // BillType
        if (!$this->isAddOrEdit() && $this->BillType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BillType->AdvancedSearch->SearchValue != "" || $this->BillType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartialSave
        if (!$this->isAddOrEdit() && $this->PartialSave->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartialSave->AdvancedSearch->SearchValue != "" || $this->PartialSave->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->PartialSave->AdvancedSearch->SearchValue)) {
            $this->PartialSave->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->PartialSave->AdvancedSearch->SearchValue);
        }
        if (is_array($this->PartialSave->AdvancedSearch->SearchValue2)) {
            $this->PartialSave->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->PartialSave->AdvancedSearch->SearchValue2);
        }

        // PatientGST
        if (!$this->isAddOrEdit() && $this->PatientGST->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientGST->AdvancedSearch->SearchValue != "" || $this->PatientGST->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_mrnno")) {
            $this->mrnno->setOldValue($CurrentForm->getValue("o_mrnno"));
        }

        // Check field name 'IP_OP' first before field var 'x_IP_OP'
        $val = $CurrentForm->hasValue("IP_OP") ? $CurrentForm->getValue("IP_OP") : $CurrentForm->getValue("x_IP_OP");
        if (!$this->IP_OP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IP_OP->Visible = false; // Disable update for API request
            } else {
                $this->IP_OP->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IP_OP")) {
            $this->IP_OP->setOldValue($CurrentForm->getValue("o_IP_OP"));
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

        // Check field name 'AnyDues' first before field var 'x_AnyDues'
        $val = $CurrentForm->hasValue("AnyDues") ? $CurrentForm->getValue("AnyDues") : $CurrentForm->getValue("x_AnyDues");
        if (!$this->AnyDues->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnyDues->Visible = false; // Disable update for API request
            } else {
                $this->AnyDues->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_AnyDues")) {
            $this->AnyDues->setOldValue($CurrentForm->getValue("o_AnyDues"));
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
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
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

        // Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
        $val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
        if (!$this->RealizationAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationAmount->Visible = false; // Disable update for API request
            } else {
                $this->RealizationAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RealizationAmount")) {
            $this->RealizationAmount->setOldValue($CurrentForm->getValue("o_RealizationAmount"));
        }

        // Check field name 'CId' first before field var 'x_CId'
        $val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
        if (!$this->CId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CId->Visible = false; // Disable update for API request
            } else {
                $this->CId->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CId")) {
            $this->CId->setOldValue($CurrentForm->getValue("o_CId"));
        }

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PartnerName")) {
            $this->PartnerName->setOldValue($CurrentForm->getValue("o_PartnerName"));
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
        if ($CurrentForm->hasValue("o_CardNumber")) {
            $this->CardNumber->setOldValue($CurrentForm->getValue("o_CardNumber"));
        }

        // Check field name 'BillStatus' first before field var 'x_BillStatus'
        $val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
        if (!$this->BillStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillStatus->Visible = false; // Disable update for API request
            } else {
                $this->BillStatus->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_BillStatus")) {
            $this->BillStatus->setOldValue($CurrentForm->getValue("o_BillStatus"));
        }

        // Check field name 'ReportHeader' first before field var 'x_ReportHeader'
        $val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
        if (!$this->ReportHeader->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReportHeader->Visible = false; // Disable update for API request
            } else {
                $this->ReportHeader->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ReportHeader")) {
            $this->ReportHeader->setOldValue($CurrentForm->getValue("o_ReportHeader"));
        }

        // Check field name 'PharID' first before field var 'x_PharID'
        $val = $CurrentForm->hasValue("PharID") ? $CurrentForm->getValue("PharID") : $CurrentForm->getValue("x_PharID");
        if (!$this->PharID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharID->Visible = false; // Disable update for API request
            } else {
                $this->PharID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PharID")) {
            $this->PharID->setOldValue($CurrentForm->getValue("o_PharID"));
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

        // Check field name 'CardType' first before field var 'x_CardType'
        $val = $CurrentForm->hasValue("CardType") ? $CurrentForm->getValue("CardType") : $CurrentForm->getValue("x_CardType");
        if (!$this->CardType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CardType->Visible = false; // Disable update for API request
            } else {
                $this->CardType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CardType")) {
            $this->CardType->setOldValue($CurrentForm->getValue("o_CardType"));
        }

        // Check field name 'DiscountAmount' first before field var 'x_DiscountAmount'
        $val = $CurrentForm->hasValue("DiscountAmount") ? $CurrentForm->getValue("DiscountAmount") : $CurrentForm->getValue("x_DiscountAmount");
        if (!$this->DiscountAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DiscountAmount->Visible = false; // Disable update for API request
            } else {
                $this->DiscountAmount->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DiscountAmount")) {
            $this->DiscountAmount->setOldValue($CurrentForm->getValue("o_DiscountAmount"));
        }

        // Check field name 'ApprovalNumber' first before field var 'x_ApprovalNumber'
        $val = $CurrentForm->hasValue("ApprovalNumber") ? $CurrentForm->getValue("ApprovalNumber") : $CurrentForm->getValue("x_ApprovalNumber");
        if (!$this->ApprovalNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ApprovalNumber->Visible = false; // Disable update for API request
            } else {
                $this->ApprovalNumber->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ApprovalNumber")) {
            $this->ApprovalNumber->setOldValue($CurrentForm->getValue("o_ApprovalNumber"));
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
        if ($CurrentForm->hasValue("o_Cash")) {
            $this->Cash->setOldValue($CurrentForm->getValue("o_Cash"));
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
        if ($CurrentForm->hasValue("o_Card")) {
            $this->Card->setOldValue($CurrentForm->getValue("o_Card"));
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

        // Check field name 'PartialSave' first before field var 'x_PartialSave'
        $val = $CurrentForm->hasValue("PartialSave") ? $CurrentForm->getValue("PartialSave") : $CurrentForm->getValue("x_PartialSave");
        if (!$this->PartialSave->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartialSave->Visible = false; // Disable update for API request
            } else {
                $this->PartialSave->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PartialSave")) {
            $this->PartialSave->setOldValue($CurrentForm->getValue("o_PartialSave"));
        }

        // Check field name 'PatientGST' first before field var 'x_PatientGST'
        $val = $CurrentForm->hasValue("PatientGST") ? $CurrentForm->getValue("PatientGST") : $CurrentForm->getValue("x_PatientGST");
        if (!$this->PatientGST->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientGST->Visible = false; // Disable update for API request
            } else {
                $this->PatientGST->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientGST")) {
            $this->PatientGST->setOldValue($CurrentForm->getValue("o_PatientGST"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Mobile->CurrentValue = $this->Mobile->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->IP_OP->CurrentValue = $this->IP_OP->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
        $this->ModeofPayment->CurrentValue = $this->ModeofPayment->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->AnyDues->CurrentValue = $this->AnyDues->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 7);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
        $this->CId->CurrentValue = $this->CId->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->CardNumber->CurrentValue = $this->CardNumber->FormValue;
        $this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
        $this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
        $this->PharID->CurrentValue = $this->PharID->FormValue;
        $this->_UserName->CurrentValue = $this->_UserName->FormValue;
        $this->CardType->CurrentValue = $this->CardType->FormValue;
        $this->DiscountAmount->CurrentValue = $this->DiscountAmount->FormValue;
        $this->ApprovalNumber->CurrentValue = $this->ApprovalNumber->FormValue;
        $this->Cash->CurrentValue = $this->Cash->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
        $this->BillType->CurrentValue = $this->BillType->FormValue;
        $this->PartialSave->CurrentValue = $this->PartialSave->FormValue;
        $this->PatientGST->CurrentValue = $this->PatientGST->FormValue;
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
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->voucher_type->setDbValue($row['voucher_type']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Mobile->setDbValue($row['Mobile']);
        $this->Age->setDbValue($row['Age']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->IP_OP->setDbValue($row['IP_OP']);
        $this->Doctor->setDbValue($row['Doctor']);
        $this->Gender->setDbValue($row['Gender']);
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
        $this->profilePic->setDbValue($row['profilePic']);
        $this->Dob->setDbValue($row['Dob']);
        $this->Currency->setDbValue($row['Currency']);
        $this->DiscountRemarks->setDbValue($row['DiscountRemarks']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->RefferedBy->setDbValue($row['RefferedBy']);
        $this->CardNumber->setDbValue($row['CardNumber']);
        $this->BankName->setDbValue($row['BankName']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->PharID->setDbValue($row['PharID']);
        $this->_UserName->setDbValue($row['UserName']);
        $this->CardType->setDbValue($row['CardType']);
        $this->DiscountAmount->setDbValue($row['DiscountAmount']);
        $this->ApprovalNumber->setDbValue($row['ApprovalNumber']);
        $this->Cash->setDbValue($row['Cash']);
        $this->Card->setDbValue($row['Card']);
        $this->BillType->setDbValue($row['BillType']);
        $this->PartialSave->setDbValue($row['PartialSave']);
        $this->PatientGST->setDbValue($row['PatientGST']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['BillNumber'] = $this->BillNumber->CurrentValue;
        $row['voucher_type'] = $this->voucher_type->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatientId'] = $this->PatientId->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['Mobile'] = $this->Mobile->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['IP_OP'] = $this->IP_OP->CurrentValue;
        $row['Doctor'] = $this->Doctor->CurrentValue;
        $row['Gender'] = $this->Gender->CurrentValue;
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
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['Dob'] = $this->Dob->CurrentValue;
        $row['Currency'] = $this->Currency->CurrentValue;
        $row['DiscountRemarks'] = $this->DiscountRemarks->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['PatId'] = $this->PatId->CurrentValue;
        $row['DrDepartment'] = $this->DrDepartment->CurrentValue;
        $row['RefferedBy'] = $this->RefferedBy->CurrentValue;
        $row['CardNumber'] = $this->CardNumber->CurrentValue;
        $row['BankName'] = $this->BankName->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['BillStatus'] = $this->BillStatus->CurrentValue;
        $row['ReportHeader'] = $this->ReportHeader->CurrentValue;
        $row['PharID'] = $this->PharID->CurrentValue;
        $row['UserName'] = $this->_UserName->CurrentValue;
        $row['CardType'] = $this->CardType->CurrentValue;
        $row['DiscountAmount'] = $this->DiscountAmount->CurrentValue;
        $row['ApprovalNumber'] = $this->ApprovalNumber->CurrentValue;
        $row['Cash'] = $this->Cash->CurrentValue;
        $row['Card'] = $this->Card->CurrentValue;
        $row['BillType'] = $this->BillType->CurrentValue;
        $row['PartialSave'] = $this->PartialSave->CurrentValue;
        $row['PatientGST'] = $this->PatientGST->CurrentValue;
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
        if ($this->RealizationAmount->FormValue == $this->RealizationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->RealizationAmount->CurrentValue))) {
            $this->RealizationAmount->CurrentValue = ConvertToFloatString($this->RealizationAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DiscountAmount->FormValue == $this->DiscountAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DiscountAmount->CurrentValue))) {
            $this->DiscountAmount->CurrentValue = ConvertToFloatString($this->DiscountAmount->CurrentValue);
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

        // BillNumber

        // voucher_type

        // Reception
        $this->Reception->CellCssStyle = "white-space: nowrap;";

        // PatientId

        // PatientName

        // Mobile

        // Age
        $this->Age->CellCssStyle = "white-space: nowrap;";

        // mrnno

        // IP_OP

        // Doctor

        // Gender

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

        // profilePic

        // Dob

        // Currency

        // DiscountRemarks

        // Remarks

        // PatId

        // DrDepartment

        // RefferedBy

        // CardNumber

        // BankName

        // DrID

        // BillStatus

        // ReportHeader

        // PharID

        // UserName

        // CardType

        // DiscountAmount

        // ApprovalNumber

        // Cash

        // Card

        // BillType

        // PartialSave

        // PatientGST

        // Accumulate aggregate value
        if ($this->RowType != ROWTYPE_AGGREGATEINIT && $this->RowType != ROWTYPE_AGGREGATE) {
            if (is_numeric($this->Amount->CurrentValue)) {
                $this->Amount->Total += $this->Amount->CurrentValue; // Accumulate total
            }
        }
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

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

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Mobile
            $this->Mobile->ViewValue = $this->Mobile->CurrentValue;
            $this->Mobile->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // IP_OP
            $this->IP_OP->ViewValue = $this->IP_OP->CurrentValue;
            $this->IP_OP->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

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
                    $sqlWrk = $this->DrID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
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

            // PharID
            $this->PharID->ViewValue = $this->PharID->CurrentValue;
            $this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
            $this->PharID->ViewCustomAttributes = "";

            // UserName
            $this->_UserName->ViewValue = $this->_UserName->CurrentValue;
            $this->_UserName->ViewCustomAttributes = "";

            // CardType
            if (strval($this->CardType->CurrentValue) != "") {
                $this->CardType->ViewValue = $this->CardType->optionCaption($this->CardType->CurrentValue);
            } else {
                $this->CardType->ViewValue = null;
            }
            $this->CardType->ViewCustomAttributes = "";

            // DiscountAmount
            $this->DiscountAmount->ViewValue = $this->DiscountAmount->CurrentValue;
            $this->DiscountAmount->ViewValue = FormatNumber($this->DiscountAmount->ViewValue, $this->DiscountAmount->DefaultDecimalPrecision);
            $this->DiscountAmount->ViewCustomAttributes = "";

            // ApprovalNumber
            $this->ApprovalNumber->ViewValue = $this->ApprovalNumber->CurrentValue;
            $this->ApprovalNumber->ViewCustomAttributes = "";

            // Cash
            $this->Cash->ViewValue = $this->Cash->CurrentValue;
            $this->Cash->ViewValue = FormatNumber($this->Cash->ViewValue, 2, -2, -2, -2);
            $this->Cash->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // BillType
            if (strval($this->BillType->CurrentValue) != "") {
                $this->BillType->ViewValue = $this->BillType->optionCaption($this->BillType->CurrentValue);
            } else {
                $this->BillType->ViewValue = null;
            }
            $this->BillType->ViewCustomAttributes = "";

            // PartialSave
            if (strval($this->PartialSave->CurrentValue) != "") {
                $this->PartialSave->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->PartialSave->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->PartialSave->ViewValue->add($this->PartialSave->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->PartialSave->ViewValue = null;
            }
            $this->PartialSave->ViewCustomAttributes = "";

            // PatientGST
            $this->PatientGST->ViewValue = $this->PatientGST->CurrentValue;
            $this->PatientGST->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

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

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";
            $this->IP_OP->TooltipValue = "";

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

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";
            $this->RealizationAmount->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";
            $this->CardNumber->TooltipValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";
            $this->BillStatus->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";
            $this->_UserName->TooltipValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";
            $this->CardType->TooltipValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";
            $this->DiscountAmount->TooltipValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";
            $this->ApprovalNumber->TooltipValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";
            $this->Cash->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";
            $this->BillType->TooltipValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";
            $this->PartialSave->TooltipValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
            $this->PatientGST->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

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

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // IP_OP
            $this->IP_OP->EditAttrs["class"] = "form-control";
            $this->IP_OP->EditCustomAttributes = "";
            if (!$this->IP_OP->Raw) {
                $this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
            }
            $this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
            $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

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

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
            if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
                $this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
                $this->RealizationAmount->OldValue = $this->RealizationAmount->EditValue;
            }

            // CId
            $this->CId->EditCustomAttributes = "";
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
            } else {
                $this->CId->ViewValue = $this->CId->Lookup !== null && is_array($this->CId->Lookup->Options) ? $curVal : null;
            }
            if ($this->CId->ViewValue !== null) { // Load from cache
                $this->CId->EditValue = array_values($this->CId->Lookup->Options);
                if ($this->CId->ViewValue == "") {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->CId->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->CId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                    $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                } else {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->CId->EditValue = $arwrk;
            }
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditCustomAttributes = "";
            $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // PharID

            // UserName

            // CardType
            $this->CardType->EditCustomAttributes = "";
            $this->CardType->EditValue = $this->CardType->options(false);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
            if (strval($this->DiscountAmount->EditValue) != "" && is_numeric($this->DiscountAmount->EditValue)) {
                $this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -1, -2, 0);
                $this->DiscountAmount->OldValue = $this->DiscountAmount->EditValue;
            }

            // ApprovalNumber
            $this->ApprovalNumber->EditAttrs["class"] = "form-control";
            $this->ApprovalNumber->EditCustomAttributes = "";
            if (!$this->ApprovalNumber->Raw) {
                $this->ApprovalNumber->CurrentValue = HtmlDecode($this->ApprovalNumber->CurrentValue);
            }
            $this->ApprovalNumber->EditValue = HtmlEncode($this->ApprovalNumber->CurrentValue);
            $this->ApprovalNumber->PlaceHolder = RemoveHtml($this->ApprovalNumber->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
            if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
                $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
                $this->Cash->OldValue = $this->Cash->EditValue;
            }

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
            if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
                $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
                $this->Card->OldValue = $this->Card->EditValue;
            }

            // BillType
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->options(false);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // PartialSave
            $this->PartialSave->EditCustomAttributes = "";
            $this->PartialSave->EditValue = $this->PartialSave->options(false);
            $this->PartialSave->PlaceHolder = RemoveHtml($this->PartialSave->caption());

            // PatientGST
            $this->PatientGST->EditAttrs["class"] = "form-control";
            $this->PatientGST->EditCustomAttributes = "";
            if (!$this->PatientGST->Raw) {
                $this->PatientGST->CurrentValue = HtmlDecode($this->PatientGST->CurrentValue);
            }
            $this->PatientGST->EditValue = HtmlEncode($this->PatientGST->CurrentValue);
            $this->PatientGST->PlaceHolder = RemoveHtml($this->PatientGST->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

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

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            $this->BillNumber->EditValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

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

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // IP_OP
            $this->IP_OP->EditAttrs["class"] = "form-control";
            $this->IP_OP->EditCustomAttributes = "";
            if (!$this->IP_OP->Raw) {
                $this->IP_OP->CurrentValue = HtmlDecode($this->IP_OP->CurrentValue);
            }
            $this->IP_OP->EditValue = HtmlEncode($this->IP_OP->CurrentValue);
            $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

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

            // AnyDues
            $this->AnyDues->EditAttrs["class"] = "form-control";
            $this->AnyDues->EditCustomAttributes = "";
            if (!$this->AnyDues->Raw) {
                $this->AnyDues->CurrentValue = HtmlDecode($this->AnyDues->CurrentValue);
            }
            $this->AnyDues->EditValue = HtmlEncode($this->AnyDues->CurrentValue);
            $this->AnyDues->PlaceHolder = RemoveHtml($this->AnyDues->caption());

            // createdby

            // createddatetime

            // modifiedby

            // modifieddatetime

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());
            if (strval($this->RealizationAmount->EditValue) != "" && is_numeric($this->RealizationAmount->EditValue)) {
                $this->RealizationAmount->EditValue = FormatNumber($this->RealizationAmount->EditValue, -2, -2, -2, -2);
                $this->RealizationAmount->OldValue = $this->RealizationAmount->EditValue;
            }

            // CId
            $this->CId->EditCustomAttributes = "";
            $curVal = trim(strval($this->CId->CurrentValue));
            if ($curVal != "") {
                $this->CId->ViewValue = $this->CId->lookupCacheOption($curVal);
            } else {
                $this->CId->ViewValue = $this->CId->Lookup !== null && is_array($this->CId->Lookup->Options) ? $curVal : null;
            }
            if ($this->CId->ViewValue !== null) { // Load from cache
                $this->CId->EditValue = array_values($this->CId->Lookup->Options);
                if ($this->CId->ViewValue == "") {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->CId->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->CId->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->CId->Lookup->renderViewRow($rswrk[0]);
                    $this->CId->ViewValue = $this->CId->displayValue($arwrk);
                } else {
                    $this->CId->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->CId->EditValue = $arwrk;
            }
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->CurrentValue = HtmlDecode($this->CardNumber->CurrentValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->CurrentValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditCustomAttributes = "";
            $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // PharID

            // UserName

            // CardType
            $this->CardType->EditCustomAttributes = "";
            $this->CardType->EditValue = $this->CardType->options(false);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->CurrentValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());
            if (strval($this->DiscountAmount->EditValue) != "" && is_numeric($this->DiscountAmount->EditValue)) {
                $this->DiscountAmount->EditValue = FormatNumber($this->DiscountAmount->EditValue, -2, -1, -2, 0);
                $this->DiscountAmount->OldValue = $this->DiscountAmount->EditValue;
            }

            // ApprovalNumber
            $this->ApprovalNumber->EditAttrs["class"] = "form-control";
            $this->ApprovalNumber->EditCustomAttributes = "";
            if (!$this->ApprovalNumber->Raw) {
                $this->ApprovalNumber->CurrentValue = HtmlDecode($this->ApprovalNumber->CurrentValue);
            }
            $this->ApprovalNumber->EditValue = HtmlEncode($this->ApprovalNumber->CurrentValue);
            $this->ApprovalNumber->PlaceHolder = RemoveHtml($this->ApprovalNumber->caption());

            // Cash
            $this->Cash->EditAttrs["class"] = "form-control";
            $this->Cash->EditCustomAttributes = "";
            $this->Cash->EditValue = HtmlEncode($this->Cash->CurrentValue);
            $this->Cash->PlaceHolder = RemoveHtml($this->Cash->caption());
            if (strval($this->Cash->EditValue) != "" && is_numeric($this->Cash->EditValue)) {
                $this->Cash->EditValue = FormatNumber($this->Cash->EditValue, -2, -2, -2, -2);
                $this->Cash->OldValue = $this->Cash->EditValue;
            }

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
            if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
                $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
                $this->Card->OldValue = $this->Card->EditValue;
            }

            // BillType
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->options(false);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // PartialSave
            $this->PartialSave->EditCustomAttributes = "";
            $this->PartialSave->EditValue = $this->PartialSave->options(false);
            $this->PartialSave->PlaceHolder = RemoveHtml($this->PartialSave->caption());

            // PatientGST
            $this->PatientGST->EditAttrs["class"] = "form-control";
            $this->PatientGST->EditCustomAttributes = "";
            if (!$this->PatientGST->Raw) {
                $this->PatientGST->CurrentValue = HtmlDecode($this->PatientGST->CurrentValue);
            }
            $this->PatientGST->EditValue = HtmlEncode($this->PatientGST->CurrentValue);
            $this->PatientGST->PlaceHolder = RemoveHtml($this->PatientGST->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Mobile
            $this->Mobile->LinkCustomAttributes = "";
            $this->Mobile->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // IP_OP
            $this->IP_OP->LinkCustomAttributes = "";
            $this->IP_OP->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";

            // ModeofPayment
            $this->ModeofPayment->LinkCustomAttributes = "";
            $this->ModeofPayment->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // AnyDues
            $this->AnyDues->LinkCustomAttributes = "";
            $this->AnyDues->HrefValue = "";

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

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // CardNumber
            $this->CardNumber->LinkCustomAttributes = "";
            $this->CardNumber->HrefValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";

            // UserName
            $this->_UserName->LinkCustomAttributes = "";
            $this->_UserName->HrefValue = "";

            // CardType
            $this->CardType->LinkCustomAttributes = "";
            $this->CardType->HrefValue = "";

            // DiscountAmount
            $this->DiscountAmount->LinkCustomAttributes = "";
            $this->DiscountAmount->HrefValue = "";

            // ApprovalNumber
            $this->ApprovalNumber->LinkCustomAttributes = "";
            $this->ApprovalNumber->HrefValue = "";

            // Cash
            $this->Cash->LinkCustomAttributes = "";
            $this->Cash->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";

            // BillType
            $this->BillType->LinkCustomAttributes = "";
            $this->BillType->HrefValue = "";

            // PartialSave
            $this->PartialSave->LinkCustomAttributes = "";
            $this->PartialSave->HrefValue = "";

            // PatientGST
            $this->PatientGST->LinkCustomAttributes = "";
            $this->PatientGST->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->AdvancedSearch->SearchValue = HtmlDecode($this->BillNumber->AdvancedSearch->SearchValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->AdvancedSearch->SearchValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

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

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // IP_OP
            $this->IP_OP->EditAttrs["class"] = "form-control";
            $this->IP_OP->EditCustomAttributes = "";
            if (!$this->IP_OP->Raw) {
                $this->IP_OP->AdvancedSearch->SearchValue = HtmlDecode($this->IP_OP->AdvancedSearch->SearchValue);
            }
            $this->IP_OP->EditValue = HtmlEncode($this->IP_OP->AdvancedSearch->SearchValue);
            $this->IP_OP->PlaceHolder = RemoveHtml($this->IP_OP->caption());

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
            $curVal = trim(strval($this->ModeofPayment->AdvancedSearch->SearchValue));
            if ($curVal != "") {
                $this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->lookupCacheOption($curVal);
            } else {
                $this->ModeofPayment->AdvancedSearch->ViewValue = $this->ModeofPayment->Lookup !== null && is_array($this->ModeofPayment->Lookup->Options) ? $curVal : null;
            }
            if ($this->ModeofPayment->AdvancedSearch->ViewValue !== null) { // Load from cache
                $this->ModeofPayment->EditValue = array_values($this->ModeofPayment->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Mode`" . SearchString("=", $this->ModeofPayment->AdvancedSearch->SearchValue, DATATYPE_STRING, "");
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
            $this->Amount->EditValue = HtmlEncode($this->Amount->AdvancedSearch->SearchValue);
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
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 7), 7));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue2, 7), 7));
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

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->AdvancedSearch->SearchValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // CardNumber
            $this->CardNumber->EditAttrs["class"] = "form-control";
            $this->CardNumber->EditCustomAttributes = "";
            if (!$this->CardNumber->Raw) {
                $this->CardNumber->AdvancedSearch->SearchValue = HtmlDecode($this->CardNumber->AdvancedSearch->SearchValue);
            }
            $this->CardNumber->EditValue = HtmlEncode($this->CardNumber->AdvancedSearch->SearchValue);
            $this->CardNumber->PlaceHolder = RemoveHtml($this->CardNumber->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->AdvancedSearch->SearchValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // ReportHeader
            $this->ReportHeader->EditCustomAttributes = "";
            $this->ReportHeader->EditValue = $this->ReportHeader->options(false);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // PharID
            $this->PharID->EditAttrs["class"] = "form-control";
            $this->PharID->EditCustomAttributes = "";
            $this->PharID->EditValue = HtmlEncode($this->PharID->AdvancedSearch->SearchValue);
            $this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

            // UserName
            $this->_UserName->EditAttrs["class"] = "form-control";
            $this->_UserName->EditCustomAttributes = "";
            if (!$this->_UserName->Raw) {
                $this->_UserName->AdvancedSearch->SearchValue = HtmlDecode($this->_UserName->AdvancedSearch->SearchValue);
            }
            $this->_UserName->EditValue = HtmlEncode($this->_UserName->AdvancedSearch->SearchValue);
            $this->_UserName->PlaceHolder = RemoveHtml($this->_UserName->caption());

            // CardType
            $this->CardType->EditCustomAttributes = "";
            $this->CardType->EditValue = $this->CardType->options(false);
            $this->CardType->PlaceHolder = RemoveHtml($this->CardType->caption());

            // DiscountAmount
            $this->DiscountAmount->EditAttrs["class"] = "form-control";
            $this->DiscountAmount->EditCustomAttributes = "";
            $this->DiscountAmount->EditValue = HtmlEncode($this->DiscountAmount->AdvancedSearch->SearchValue);
            $this->DiscountAmount->PlaceHolder = RemoveHtml($this->DiscountAmount->caption());

            // ApprovalNumber
            $this->ApprovalNumber->EditAttrs["class"] = "form-control";
            $this->ApprovalNumber->EditCustomAttributes = "";
            if (!$this->ApprovalNumber->Raw) {
                $this->ApprovalNumber->AdvancedSearch->SearchValue = HtmlDecode($this->ApprovalNumber->AdvancedSearch->SearchValue);
            }
            $this->ApprovalNumber->EditValue = HtmlEncode($this->ApprovalNumber->AdvancedSearch->SearchValue);
            $this->ApprovalNumber->PlaceHolder = RemoveHtml($this->ApprovalNumber->caption());

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

            // BillType
            $this->BillType->EditCustomAttributes = "";
            $this->BillType->EditValue = $this->BillType->options(false);
            $this->BillType->PlaceHolder = RemoveHtml($this->BillType->caption());

            // PartialSave
            $this->PartialSave->EditCustomAttributes = "";
            $this->PartialSave->EditValue = $this->PartialSave->options(false);
            $this->PartialSave->PlaceHolder = RemoveHtml($this->PartialSave->caption());

            // PatientGST
            $this->PatientGST->EditAttrs["class"] = "form-control";
            $this->PatientGST->EditCustomAttributes = "";
            if (!$this->PatientGST->Raw) {
                $this->PatientGST->AdvancedSearch->SearchValue = HtmlDecode($this->PatientGST->AdvancedSearch->SearchValue);
            }
            $this->PatientGST->EditValue = HtmlEncode($this->PatientGST->AdvancedSearch->SearchValue);
            $this->PatientGST->PlaceHolder = RemoveHtml($this->PatientGST->caption());
        } elseif ($this->RowType == ROWTYPE_AGGREGATEINIT) { // Initialize aggregate row
                    $this->Amount->Total = 0; // Initialize total
        } elseif ($this->RowType == ROWTYPE_AGGREGATE) { // Aggregate row
            $this->Amount->CurrentValue = $this->Amount->Total;
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";
            $this->Amount->HrefValue = ""; // Clear href value
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
        if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->createddatetime->AdvancedSearch->SearchValue2)) {
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
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
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
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->IP_OP->Required) {
            if (!$this->IP_OP->IsDetailKey && EmptyValue($this->IP_OP->FormValue)) {
                $this->IP_OP->addErrorMessage(str_replace("%s", $this->IP_OP->caption(), $this->IP_OP->RequiredErrorMessage));
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
        if (!CheckNumber($this->Amount->FormValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if ($this->AnyDues->Required) {
            if (!$this->AnyDues->IsDetailKey && EmptyValue($this->AnyDues->FormValue)) {
                $this->AnyDues->addErrorMessage(str_replace("%s", $this->AnyDues->caption(), $this->AnyDues->RequiredErrorMessage));
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
        if ($this->RealizationAmount->Required) {
            if (!$this->RealizationAmount->IsDetailKey && EmptyValue($this->RealizationAmount->FormValue)) {
                $this->RealizationAmount->addErrorMessage(str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RealizationAmount->FormValue)) {
            $this->RealizationAmount->addErrorMessage($this->RealizationAmount->getErrorMessage(false));
        }
        if ($this->CId->Required) {
            if (!$this->CId->IsDetailKey && EmptyValue($this->CId->FormValue)) {
                $this->CId->addErrorMessage(str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->CardNumber->Required) {
            if (!$this->CardNumber->IsDetailKey && EmptyValue($this->CardNumber->FormValue)) {
                $this->CardNumber->addErrorMessage(str_replace("%s", $this->CardNumber->caption(), $this->CardNumber->RequiredErrorMessage));
            }
        }
        if ($this->BillStatus->Required) {
            if (!$this->BillStatus->IsDetailKey && EmptyValue($this->BillStatus->FormValue)) {
                $this->BillStatus->addErrorMessage(str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BillStatus->FormValue)) {
            $this->BillStatus->addErrorMessage($this->BillStatus->getErrorMessage(false));
        }
        if ($this->ReportHeader->Required) {
            if ($this->ReportHeader->FormValue == "") {
                $this->ReportHeader->addErrorMessage(str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
            }
        }
        if ($this->PharID->Required) {
            if (!$this->PharID->IsDetailKey && EmptyValue($this->PharID->FormValue)) {
                $this->PharID->addErrorMessage(str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
            }
        }
        if ($this->_UserName->Required) {
            if (!$this->_UserName->IsDetailKey && EmptyValue($this->_UserName->FormValue)) {
                $this->_UserName->addErrorMessage(str_replace("%s", $this->_UserName->caption(), $this->_UserName->RequiredErrorMessage));
            }
        }
        if ($this->CardType->Required) {
            if ($this->CardType->FormValue == "") {
                $this->CardType->addErrorMessage(str_replace("%s", $this->CardType->caption(), $this->CardType->RequiredErrorMessage));
            }
        }
        if ($this->DiscountAmount->Required) {
            if (!$this->DiscountAmount->IsDetailKey && EmptyValue($this->DiscountAmount->FormValue)) {
                $this->DiscountAmount->addErrorMessage(str_replace("%s", $this->DiscountAmount->caption(), $this->DiscountAmount->RequiredErrorMessage));
            }
        }
        if ($this->ApprovalNumber->Required) {
            if (!$this->ApprovalNumber->IsDetailKey && EmptyValue($this->ApprovalNumber->FormValue)) {
                $this->ApprovalNumber->addErrorMessage(str_replace("%s", $this->ApprovalNumber->caption(), $this->ApprovalNumber->RequiredErrorMessage));
            }
        }
        if ($this->Cash->Required) {
            if (!$this->Cash->IsDetailKey && EmptyValue($this->Cash->FormValue)) {
                $this->Cash->addErrorMessage(str_replace("%s", $this->Cash->caption(), $this->Cash->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Cash->FormValue)) {
            $this->Cash->addErrorMessage($this->Cash->getErrorMessage(false));
        }
        if ($this->Card->Required) {
            if (!$this->Card->IsDetailKey && EmptyValue($this->Card->FormValue)) {
                $this->Card->addErrorMessage(str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Card->FormValue)) {
            $this->Card->addErrorMessage($this->Card->getErrorMessage(false));
        }
        if ($this->BillType->Required) {
            if ($this->BillType->FormValue == "") {
                $this->BillType->addErrorMessage(str_replace("%s", $this->BillType->caption(), $this->BillType->RequiredErrorMessage));
            }
        }
        if ($this->PartialSave->Required) {
            if ($this->PartialSave->FormValue == "") {
                $this->PartialSave->addErrorMessage(str_replace("%s", $this->PartialSave->caption(), $this->PartialSave->RequiredErrorMessage));
            }
        }
        if ($this->PatientGST->Required) {
            if (!$this->PatientGST->IsDetailKey && EmptyValue($this->PatientGST->FormValue)) {
                $this->PatientGST->addErrorMessage(str_replace("%s", $this->PatientGST->caption(), $this->PatientGST->RequiredErrorMessage));
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

            // PatientId
            $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, $this->PatientId->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Mobile
            $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, $this->Mobile->ReadOnly);

            // mrnno
            $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, $this->mrnno->ReadOnly);

            // IP_OP
            $this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, null, $this->IP_OP->ReadOnly);

            // Doctor
            $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, $this->Doctor->ReadOnly);

            // ModeofPayment
            $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, $this->ModeofPayment->ReadOnly);

            // Amount
            $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, $this->Amount->ReadOnly);

            // AnyDues
            $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, $this->AnyDues->ReadOnly);

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

            // RealizationAmount
            $this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, null, $this->RealizationAmount->ReadOnly);

            // CId
            $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, $this->CId->ReadOnly);

            // PartnerName
            $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, $this->PartnerName->ReadOnly);

            // CardNumber
            $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, $this->CardNumber->ReadOnly);

            // BillStatus
            $this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, null, $this->BillStatus->ReadOnly);

            // ReportHeader
            $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, $this->ReportHeader->ReadOnly);

            // PharID
            $this->PharID->CurrentValue = PharmacyID();
            $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null);

            // UserName
            $this->_UserName->CurrentValue = GetUserName();
            $this->_UserName->setDbValueDef($rsnew, $this->_UserName->CurrentValue, null);

            // CardType
            $this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, null, $this->CardType->ReadOnly);

            // DiscountAmount
            $this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, null, $this->DiscountAmount->ReadOnly);

            // ApprovalNumber
            $this->ApprovalNumber->setDbValueDef($rsnew, $this->ApprovalNumber->CurrentValue, null, $this->ApprovalNumber->ReadOnly);

            // Cash
            $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, $this->Cash->ReadOnly);

            // Card
            $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, $this->Card->ReadOnly);

            // BillType
            $this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, null, $this->BillType->ReadOnly);

            // PartialSave
            $this->PartialSave->setDbValueDef($rsnew, $this->PartialSave->CurrentValue, null, $this->PartialSave->ReadOnly);

            // PatientGST
            $this->PatientGST->setDbValueDef($rsnew, $this->PatientGST->CurrentValue, null, $this->PatientGST->ReadOnly);

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
        $hash .= GetFieldHash($row['PatientId']); // PatientId
        $hash .= GetFieldHash($row['PatientName']); // PatientName
        $hash .= GetFieldHash($row['Mobile']); // Mobile
        $hash .= GetFieldHash($row['mrnno']); // mrnno
        $hash .= GetFieldHash($row['IP_OP']); // IP_OP
        $hash .= GetFieldHash($row['Doctor']); // Doctor
        $hash .= GetFieldHash($row['ModeofPayment']); // ModeofPayment
        $hash .= GetFieldHash($row['Amount']); // Amount
        $hash .= GetFieldHash($row['AnyDues']); // AnyDues
        $hash .= GetFieldHash($row['createdby']); // createdby
        $hash .= GetFieldHash($row['createddatetime']); // createddatetime
        $hash .= GetFieldHash($row['modifiedby']); // modifiedby
        $hash .= GetFieldHash($row['modifieddatetime']); // modifieddatetime
        $hash .= GetFieldHash($row['RealizationAmount']); // RealizationAmount
        $hash .= GetFieldHash($row['CId']); // CId
        $hash .= GetFieldHash($row['PartnerName']); // PartnerName
        $hash .= GetFieldHash($row['CardNumber']); // CardNumber
        $hash .= GetFieldHash($row['BillStatus']); // BillStatus
        $hash .= GetFieldHash($row['ReportHeader']); // ReportHeader
        $hash .= GetFieldHash($row['PharID']); // PharID
        $hash .= GetFieldHash($row['UserName']); // UserName
        $hash .= GetFieldHash($row['CardType']); // CardType
        $hash .= GetFieldHash($row['DiscountAmount']); // DiscountAmount
        $hash .= GetFieldHash($row['ApprovalNumber']); // ApprovalNumber
        $hash .= GetFieldHash($row['Cash']); // Cash
        $hash .= GetFieldHash($row['Card']); // Card
        $hash .= GetFieldHash($row['BillType']); // BillType
        $hash .= GetFieldHash($row['PartialSave']); // PartialSave
        $hash .= GetFieldHash($row['PatientGST']); // PatientGST
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

        // BillNumber
        $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, false);

        // PatientId
        $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // Mobile
        $this->Mobile->setDbValueDef($rsnew, $this->Mobile->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // IP_OP
        $this->IP_OP->setDbValueDef($rsnew, $this->IP_OP->CurrentValue, null, false);

        // Doctor
        $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, false);

        // ModeofPayment
        $this->ModeofPayment->setDbValueDef($rsnew, $this->ModeofPayment->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // AnyDues
        $this->AnyDues->setDbValueDef($rsnew, $this->AnyDues->CurrentValue, null, false);

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

        // RealizationAmount
        $this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, null, false);

        // CId
        $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // CardNumber
        $this->CardNumber->setDbValueDef($rsnew, $this->CardNumber->CurrentValue, null, false);

        // BillStatus
        $this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, null, strval($this->BillStatus->CurrentValue) == "");

        // ReportHeader
        $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, false);

        // PharID
        $this->PharID->CurrentValue = PharmacyID();
        $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null);

        // UserName
        $this->_UserName->CurrentValue = GetUserName();
        $this->_UserName->setDbValueDef($rsnew, $this->_UserName->CurrentValue, null);

        // CardType
        $this->CardType->setDbValueDef($rsnew, $this->CardType->CurrentValue, null, false);

        // DiscountAmount
        $this->DiscountAmount->setDbValueDef($rsnew, $this->DiscountAmount->CurrentValue, null, false);

        // ApprovalNumber
        $this->ApprovalNumber->setDbValueDef($rsnew, $this->ApprovalNumber->CurrentValue, null, false);

        // Cash
        $this->Cash->setDbValueDef($rsnew, $this->Cash->CurrentValue, null, false);

        // Card
        $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, false);

        // BillType
        $this->BillType->setDbValueDef($rsnew, $this->BillType->CurrentValue, null, false);

        // PartialSave
        $this->PartialSave->setDbValueDef($rsnew, $this->PartialSave->CurrentValue, null, false);

        // PatientGST
        $this->PatientGST->setDbValueDef($rsnew, $this->PatientGST->CurrentValue, null, false);

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
        $this->BillNumber->AdvancedSearch->load();
        $this->voucher_type->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->Mobile->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->mrnno->AdvancedSearch->load();
        $this->IP_OP->AdvancedSearch->load();
        $this->Doctor->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
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
        $this->profilePic->AdvancedSearch->load();
        $this->Dob->AdvancedSearch->load();
        $this->Currency->AdvancedSearch->load();
        $this->DiscountRemarks->AdvancedSearch->load();
        $this->Remarks->AdvancedSearch->load();
        $this->PatId->AdvancedSearch->load();
        $this->DrDepartment->AdvancedSearch->load();
        $this->RefferedBy->AdvancedSearch->load();
        $this->CardNumber->AdvancedSearch->load();
        $this->BankName->AdvancedSearch->load();
        $this->DrID->AdvancedSearch->load();
        $this->BillStatus->AdvancedSearch->load();
        $this->ReportHeader->AdvancedSearch->load();
        $this->PharID->AdvancedSearch->load();
        $this->_UserName->AdvancedSearch->load();
        $this->CardType->AdvancedSearch->load();
        $this->DiscountAmount->AdvancedSearch->load();
        $this->ApprovalNumber->AdvancedSearch->load();
        $this->Cash->AdvancedSearch->load();
        $this->Card->AdvancedSearch->load();
        $this->BillType->AdvancedSearch->load();
        $this->PartialSave->AdvancedSearch->load();
        $this->PatientGST->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpharmacy_billing_voucherlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_pharmacy_billing_voucher" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_pharmacy_billing_voucher\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpharmacy_billing_voucherlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpharmacy_billing_voucherlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                    break;
                case "x_ReportHeader":
                    break;
                case "x_CardType":
                    break;
                case "x_BillType":
                    break;
                case "x_PartialSave":
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
    public function listOptionsLoad() {
    	// Example:
    	//$opt = &$this->ListOptions->Add("new");
    	//$opt->Header = "xxx";
    	//$opt->OnLeft = TRUE; // Link on left
    	//$opt->MoveTo(0); // Move to first column
    		$opt =&$this->ListOptions->Add("EditBill");
    	$opt->Header = "EditBill";
    	$opt->OnLeft = TRUE; // Link on left
    	$opt->MoveTo(8); // Move to first column
    }

    // ListOptions Rendering event
    public function listOptionsRendering()
    {
        //Container("DetailTableGrid")->DetailAdd = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailEdit = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailView = (...condition...); // Set to true or false conditionally
    }

    // ListOptions Rendered event
    public function listOptionsRendered() {
    	// Example:
    	//$this->ListOptions->Items["new"]->Body = "xxx";
    $this->ListOptions->Items["EditBill"]->Body = '<a class="btn btn-default ew-row-link ew-view" title="EditBill" data-caption="EditBill" href="pharmacy_billing_voucheredit.php?showdetail=pharmacy_pharled&id='.CurrentTable()->id->CurrentValue.'" data-original-title="EditBill"><i data-phrase="ViewLink" class="fas fa-edit  fa-lg" data-caption="EditBill"></i></a>';
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
