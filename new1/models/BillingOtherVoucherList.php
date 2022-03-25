<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class BillingOtherVoucherList extends BillingOtherVoucher
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'billing_other_voucher';

    // Page object name
    public $PageObjName = "BillingOtherVoucherList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fbilling_other_voucherlist";
    public $FormActionName = "k_action";
    public $FormKeyName = "k_key";
    public $FormOldKeyName = "k_oldkey";
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

    // Messages
    private $message = "";
    private $failureMessage = "";
    private $successMessage = "";
    private $warningMessage = "";

    // Get message
    public function getMessage()
    {
        return $_SESSION[SESSION_MESSAGE] ?? $this->message;
    }

    // Set message
    public function setMessage($v)
    {
        AddMessage($this->message, $v);
        $_SESSION[SESSION_MESSAGE] = $this->message;
    }

    // Get failure message
    public function getFailureMessage()
    {
        return $_SESSION[SESSION_FAILURE_MESSAGE] ?? $this->failureMessage;
    }

    // Set failure message
    public function setFailureMessage($v)
    {
        AddMessage($this->failureMessage, $v);
        $_SESSION[SESSION_FAILURE_MESSAGE] = $this->failureMessage;
    }

    // Get success message
    public function getSuccessMessage()
    {
        return $_SESSION[SESSION_SUCCESS_MESSAGE] ?? $this->successMessage;
    }

    // Set success message
    public function setSuccessMessage($v)
    {
        AddMessage($this->successMessage, $v);
        $_SESSION[SESSION_SUCCESS_MESSAGE] = $this->successMessage;
    }

    // Get warning message
    public function getWarningMessage()
    {
        return $_SESSION[SESSION_WARNING_MESSAGE] ?? $this->warningMessage;
    }

    // Set warning message
    public function setWarningMessage($v)
    {
        AddMessage($this->warningMessage, $v);
        $_SESSION[SESSION_WARNING_MESSAGE] = $this->warningMessage;
    }

    // Clear message
    public function clearMessage()
    {
        $this->message = "";
        $_SESSION[SESSION_MESSAGE] = "";
    }

    // Clear failure message
    public function clearFailureMessage()
    {
        $this->failureMessage = "";
        $_SESSION[SESSION_FAILURE_MESSAGE] = "";
    }

    // Clear success message
    public function clearSuccessMessage()
    {
        $this->successMessage = "";
        $_SESSION[SESSION_SUCCESS_MESSAGE] = "";
    }

    // Clear warning message
    public function clearWarningMessage()
    {
        $this->warningMessage = "";
        $_SESSION[SESSION_WARNING_MESSAGE] = "";
    }

    // Clear messages
    public function clearMessages()
    {
        $this->clearMessage();
        $this->clearFailureMessage();
        $this->clearSuccessMessage();
        $this->clearWarningMessage();
    }

    // Show message
    public function showMessage()
    {
        $hidden = true;
        $html = "";
        // Message
        $message = $this->getMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($message, "");
        }
        if ($message != "") { // Message in Session, display
            if (!$hidden) {
                $message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
            }
            $html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($warningMessage, "warning");
        }
        if ($warningMessage != "") { // Message in Session, display
            if (!$hidden) {
                $warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
            }
            $html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($successMessage, "success");
        }
        if ($successMessage != "") { // Message in Session, display
            if (!$hidden) {
                $successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
            }
            $html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $errorMessage = $this->getFailureMessage();
        if (method_exists($this, "messageShowing")) {
            $this->messageShowing($errorMessage, "failure");
        }
        if ($errorMessage != "") { // Message in Session, display
            if (!$hidden) {
                $errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
            }
            $html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        echo '<div class="ew-message-dialog' . ($hidden ? ' d-none' : '') . '">' . $html . '</div>';
    }

    // Get message as array
    public function getMessages()
    {
        $ar = [];
        // Message
        $message = $this->getMessage();
        if ($message != "") { // Message in Session, display
            $ar["message"] = $message;
            $_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
        }
        // Warning message
        $warningMessage = $this->getWarningMessage();
        if ($warningMessage != "") { // Message in Session, display
            $ar["warningMessage"] = $warningMessage;
            $_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
        }
        // Success message
        $successMessage = $this->getSuccessMessage();
        if ($successMessage != "") { // Message in Session, display
            $ar["successMessage"] = $successMessage;
            $_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
        }
        // Failure message
        $failureMessage = $this->getFailureMessage();
        if ($failureMessage != "") { // Message in Session, display
            $ar["failureMessage"] = $failureMessage;
            $_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
        }
        return $ar;
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

        // Initialize
        $GLOBALS["Page"] = &$this;
        $this->TokenTimeout = SessionTimeoutTime();

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (billing_other_voucher)
        if (!isset($GLOBALS["billing_other_voucher"]) || get_class($GLOBALS["billing_other_voucher"]) == PROJECT_NAMESPACE . "billing_other_voucher") {
            $GLOBALS["billing_other_voucher"] = &$this;
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
        $this->AddUrl = "BillingOtherVoucherAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "BillingOtherVoucherDelete";
        $this->MultiUpdateUrl = "BillingOtherVoucherUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'billing_other_voucher');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

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
        $this->FilterOptions->TagClassName = "ew-filter-option fbilling_other_voucherlistsrch";

        // List actions
        $this->ListActions = new ListActions();
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
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
        global $ExportFileName, $TempImages, $DashboardReport;

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
                $doc = new $class(Container("billing_other_voucher"));
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
        if (!array_key_exists($fieldName, $this->Fields)) {
            return false;
        }
        $lookupField = $this->Fields[$fieldName];
        $lookup = $lookupField->Lookup;
        if ($lookup === null) {
            return false;
        }

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
    public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
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
    public $RowOldKey = ""; // Row old key (for copy)
    public $MultiColumnClass = "col-sm";
    public $MultiColumnEditClass = "w-100";
    public $DbMasterFilter = ""; // Master filter
    public $DbDetailFilter = ""; // Detail filter
    public $MasterRecordExists;
    public $MultiSelectKey;
    public $Command;
    public $RestoreSearch = false;
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
        $this->CurrentAction = Param("action"); // Set up current action

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();
        $this->id->setVisibility();
        $this->Name->setVisibility();
        $this->Mobile->setVisibility();
        $this->voucher_type->setVisibility();
        $this->Details->setVisibility();
        $this->ModeofPayment->setVisibility();
        $this->Amount->setVisibility();
        $this->AnyDues->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatID->setVisibility();
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
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
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search/sort options
        $this->setupSearchSortOptions();

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
        $this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Pass table and field properties to client side
            $this->toClientVar(["tableCaption"], ["caption", "Required", "IsInvalid", "Raw"]);

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Rendering event
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
        $thisKey = strval($CurrentForm->getValue($this->FormKeyName));
        while ($thisKey != "") {
            if ($this->setupKeyValues($thisKey)) {
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
            $thisKey = strval($CurrentForm->getValue($this->FormKeyName));
        }
        return $wrkFilter;
    }

    // Set up key values
    protected function setupKeyValues($key)
    {
        $arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
        if (count($arKeyFlds) >= 1) {
            $this->id->setOldValue($arKeyFlds[0]);
            if (!is_numeric($this->id->OldValue)) {
                return false;
            }
        }
        return true;
    }

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
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
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fbilling_other_voucherlistsrch", $filters);
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
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->voucher_type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Details, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModeofPayment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AnyDues, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
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
            $this->updateSort($this->Name); // Name
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
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->PatientName); // PatientName
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
                $this->PatientID->setSort("");
                $this->PatientName->setSort("");
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
        $item->OnLeft = false;
        $item->Visible = false;

        // "view"
        $item = &$this->ListOptions->add("view");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "edit"
        $item = &$this->ListOptions->add("edit");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "copy"
        $item = &$this->ListOptions->add("copy");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = true;
        $item->OnLeft = false;

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = false;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = false;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = false;
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
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode(GetUrl($this->ViewUrl)) . "\">" . $Language->phrase("ViewLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "edit"
            $opt = $this->ListOptions["edit"];
            $editcaption = HtmlTitle($Language->phrase("EditLink"));
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("EditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if (true) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "delete"
            $opt = $this->ListOptions["delete"];
            if (true) {
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
        $item->Visible = $this->AddUrl != "";
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = false;
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fbilling_other_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fbilling_other_voucherlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fbilling_other_voucherlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
    }

    // Render list options (extended codes)
    protected function renderListOptionsExt()
    {
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
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
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Name'] = null;
        $row['Mobile'] = null;
        $row['voucher_type'] = null;
        $row['Details'] = null;
        $row['ModeofPayment'] = null;
        $row['Amount'] = null;
        $row['AnyDues'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatID'] = null;
        $row['PatientID'] = null;
        $row['PatientName'] = null;
        $row['VisiteType'] = null;
        $row['VisitDate'] = null;
        $row['AdvanceNo'] = null;
        $row['Status'] = null;
        $row['Date'] = null;
        $row['AdvanceValidityDate'] = null;
        $row['TotalRemainingAdvance'] = null;
        $row['Remarks'] = null;
        $row['SeectPaymentMode'] = null;
        $row['PaidAmount'] = null;
        $row['Currency'] = null;
        $row['CardNumber'] = null;
        $row['BankName'] = null;
        $row['HospID'] = null;
        $row['Reception'] = null;
        $row['mrnno'] = null;
        $row['GetUserName'] = null;
        $row['AdjustmentwithAdvance'] = null;
        $row['AdjustmentBillNumber'] = null;
        $row['CancelAdvance'] = null;
        $row['CancelReasan'] = null;
        $row['CancelBy'] = null;
        $row['CancelDate'] = null;
        $row['CancelDateTime'] = null;
        $row['CanceledBy'] = null;
        $row['CancelStatus'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("id")) != "") {
            $this->id->OldValue = $this->getKey("id"); // id
        } else {
            $validKey = false;
        }

        // Load old record
        $this->OldRecordset = null;
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

        // PatientID

        // PatientName

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
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

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

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

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

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

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
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Set up search/sort options
    protected function setupSearchSortOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fbilling_other_voucherlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
