<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewTillSearchViewList extends ViewTillSearchView
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_till_search_view';

    // Page object name
    public $PageObjName = "ViewTillSearchViewList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fview_till_search_viewlist";
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

        // Table object (view_till_search_view)
        if (!isset($GLOBALS["view_till_search_view"]) || get_class($GLOBALS["view_till_search_view"]) == PROJECT_NAMESPACE . "view_till_search_view") {
            $GLOBALS["view_till_search_view"] = &$this;
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
        $this->AddUrl = "ViewTillSearchViewAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewTillSearchViewDelete";
        $this->MultiUpdateUrl = "ViewTillSearchViewUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_till_search_view');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_till_search_viewlistsrch";

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
                $doc = new $class(Container("view_till_search_view"));
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
        $this->DepositDate->setVisibility();
        $this->DepositToBankSelect->setVisibility();
        $this->DepositToBank->setVisibility();
        $this->TransferToSelect->setVisibility();
        $this->TransferTo->setVisibility();
        $this->OpeningBalance->setVisibility();
        $this->A2000Count->setVisibility();
        $this->A2000Amount->setVisibility();
        $this->A1000Count->setVisibility();
        $this->A1000Amount->setVisibility();
        $this->A500Count->setVisibility();
        $this->A500Amount->setVisibility();
        $this->A200Count->setVisibility();
        $this->A200Amount->setVisibility();
        $this->A100Count->setVisibility();
        $this->A100Amount->setVisibility();
        $this->A50Count->setVisibility();
        $this->A50Amount->setVisibility();
        $this->A20Count->setVisibility();
        $this->A20Amount->setVisibility();
        $this->A10Count->setVisibility();
        $this->A10Amount->setVisibility();
        $this->Other->setVisibility();
        $this->TotalCash->setVisibility();
        $this->Cheque->setVisibility();
        $this->Card->setVisibility();
        $this->NEFTRTGS->setVisibility();
        $this->TotalTransferDepositAmount->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->CreatedUserName->setVisibility();
        $this->ModifiedUserName->setVisibility();
        $this->BalanceAmount->setVisibility();
        $this->CashCollected->setVisibility();
        $this->RTGS->setVisibility();
        $this->PAYTM->setVisibility();
        $this->HospID->setVisibility();
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
        $filterList = Concat($filterList, $this->DepositDate->AdvancedSearch->toJson(), ","); // Field DepositDate
        $filterList = Concat($filterList, $this->DepositToBankSelect->AdvancedSearch->toJson(), ","); // Field DepositToBankSelect
        $filterList = Concat($filterList, $this->DepositToBank->AdvancedSearch->toJson(), ","); // Field DepositToBank
        $filterList = Concat($filterList, $this->TransferToSelect->AdvancedSearch->toJson(), ","); // Field TransferToSelect
        $filterList = Concat($filterList, $this->TransferTo->AdvancedSearch->toJson(), ","); // Field TransferTo
        $filterList = Concat($filterList, $this->OpeningBalance->AdvancedSearch->toJson(), ","); // Field OpeningBalance
        $filterList = Concat($filterList, $this->A2000Count->AdvancedSearch->toJson(), ","); // Field A2000Count
        $filterList = Concat($filterList, $this->A2000Amount->AdvancedSearch->toJson(), ","); // Field A2000Amount
        $filterList = Concat($filterList, $this->A1000Count->AdvancedSearch->toJson(), ","); // Field A1000Count
        $filterList = Concat($filterList, $this->A1000Amount->AdvancedSearch->toJson(), ","); // Field A1000Amount
        $filterList = Concat($filterList, $this->A500Count->AdvancedSearch->toJson(), ","); // Field A500Count
        $filterList = Concat($filterList, $this->A500Amount->AdvancedSearch->toJson(), ","); // Field A500Amount
        $filterList = Concat($filterList, $this->A200Count->AdvancedSearch->toJson(), ","); // Field A200Count
        $filterList = Concat($filterList, $this->A200Amount->AdvancedSearch->toJson(), ","); // Field A200Amount
        $filterList = Concat($filterList, $this->A100Count->AdvancedSearch->toJson(), ","); // Field A100Count
        $filterList = Concat($filterList, $this->A100Amount->AdvancedSearch->toJson(), ","); // Field A100Amount
        $filterList = Concat($filterList, $this->A50Count->AdvancedSearch->toJson(), ","); // Field A50Count
        $filterList = Concat($filterList, $this->A50Amount->AdvancedSearch->toJson(), ","); // Field A50Amount
        $filterList = Concat($filterList, $this->A20Count->AdvancedSearch->toJson(), ","); // Field A20Count
        $filterList = Concat($filterList, $this->A20Amount->AdvancedSearch->toJson(), ","); // Field A20Amount
        $filterList = Concat($filterList, $this->A10Count->AdvancedSearch->toJson(), ","); // Field A10Count
        $filterList = Concat($filterList, $this->A10Amount->AdvancedSearch->toJson(), ","); // Field A10Amount
        $filterList = Concat($filterList, $this->Other->AdvancedSearch->toJson(), ","); // Field Other
        $filterList = Concat($filterList, $this->TotalCash->AdvancedSearch->toJson(), ","); // Field TotalCash
        $filterList = Concat($filterList, $this->Cheque->AdvancedSearch->toJson(), ","); // Field Cheque
        $filterList = Concat($filterList, $this->Card->AdvancedSearch->toJson(), ","); // Field Card
        $filterList = Concat($filterList, $this->NEFTRTGS->AdvancedSearch->toJson(), ","); // Field NEFTRTGS
        $filterList = Concat($filterList, $this->TotalTransferDepositAmount->AdvancedSearch->toJson(), ","); // Field TotalTransferDepositAmount
        $filterList = Concat($filterList, $this->CreatedBy->AdvancedSearch->toJson(), ","); // Field CreatedBy
        $filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
        $filterList = Concat($filterList, $this->ModifiedBy->AdvancedSearch->toJson(), ","); // Field ModifiedBy
        $filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
        $filterList = Concat($filterList, $this->CreatedUserName->AdvancedSearch->toJson(), ","); // Field CreatedUserName
        $filterList = Concat($filterList, $this->ModifiedUserName->AdvancedSearch->toJson(), ","); // Field ModifiedUserName
        $filterList = Concat($filterList, $this->BalanceAmount->AdvancedSearch->toJson(), ","); // Field BalanceAmount
        $filterList = Concat($filterList, $this->CashCollected->AdvancedSearch->toJson(), ","); // Field CashCollected
        $filterList = Concat($filterList, $this->RTGS->AdvancedSearch->toJson(), ","); // Field RTGS
        $filterList = Concat($filterList, $this->PAYTM->AdvancedSearch->toJson(), ","); // Field PAYTM
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_till_search_viewlistsrch", $filters);
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

        // Field DepositDate
        $this->DepositDate->AdvancedSearch->SearchValue = @$filter["x_DepositDate"];
        $this->DepositDate->AdvancedSearch->SearchOperator = @$filter["z_DepositDate"];
        $this->DepositDate->AdvancedSearch->SearchCondition = @$filter["v_DepositDate"];
        $this->DepositDate->AdvancedSearch->SearchValue2 = @$filter["y_DepositDate"];
        $this->DepositDate->AdvancedSearch->SearchOperator2 = @$filter["w_DepositDate"];
        $this->DepositDate->AdvancedSearch->save();

        // Field DepositToBankSelect
        $this->DepositToBankSelect->AdvancedSearch->SearchValue = @$filter["x_DepositToBankSelect"];
        $this->DepositToBankSelect->AdvancedSearch->SearchOperator = @$filter["z_DepositToBankSelect"];
        $this->DepositToBankSelect->AdvancedSearch->SearchCondition = @$filter["v_DepositToBankSelect"];
        $this->DepositToBankSelect->AdvancedSearch->SearchValue2 = @$filter["y_DepositToBankSelect"];
        $this->DepositToBankSelect->AdvancedSearch->SearchOperator2 = @$filter["w_DepositToBankSelect"];
        $this->DepositToBankSelect->AdvancedSearch->save();

        // Field DepositToBank
        $this->DepositToBank->AdvancedSearch->SearchValue = @$filter["x_DepositToBank"];
        $this->DepositToBank->AdvancedSearch->SearchOperator = @$filter["z_DepositToBank"];
        $this->DepositToBank->AdvancedSearch->SearchCondition = @$filter["v_DepositToBank"];
        $this->DepositToBank->AdvancedSearch->SearchValue2 = @$filter["y_DepositToBank"];
        $this->DepositToBank->AdvancedSearch->SearchOperator2 = @$filter["w_DepositToBank"];
        $this->DepositToBank->AdvancedSearch->save();

        // Field TransferToSelect
        $this->TransferToSelect->AdvancedSearch->SearchValue = @$filter["x_TransferToSelect"];
        $this->TransferToSelect->AdvancedSearch->SearchOperator = @$filter["z_TransferToSelect"];
        $this->TransferToSelect->AdvancedSearch->SearchCondition = @$filter["v_TransferToSelect"];
        $this->TransferToSelect->AdvancedSearch->SearchValue2 = @$filter["y_TransferToSelect"];
        $this->TransferToSelect->AdvancedSearch->SearchOperator2 = @$filter["w_TransferToSelect"];
        $this->TransferToSelect->AdvancedSearch->save();

        // Field TransferTo
        $this->TransferTo->AdvancedSearch->SearchValue = @$filter["x_TransferTo"];
        $this->TransferTo->AdvancedSearch->SearchOperator = @$filter["z_TransferTo"];
        $this->TransferTo->AdvancedSearch->SearchCondition = @$filter["v_TransferTo"];
        $this->TransferTo->AdvancedSearch->SearchValue2 = @$filter["y_TransferTo"];
        $this->TransferTo->AdvancedSearch->SearchOperator2 = @$filter["w_TransferTo"];
        $this->TransferTo->AdvancedSearch->save();

        // Field OpeningBalance
        $this->OpeningBalance->AdvancedSearch->SearchValue = @$filter["x_OpeningBalance"];
        $this->OpeningBalance->AdvancedSearch->SearchOperator = @$filter["z_OpeningBalance"];
        $this->OpeningBalance->AdvancedSearch->SearchCondition = @$filter["v_OpeningBalance"];
        $this->OpeningBalance->AdvancedSearch->SearchValue2 = @$filter["y_OpeningBalance"];
        $this->OpeningBalance->AdvancedSearch->SearchOperator2 = @$filter["w_OpeningBalance"];
        $this->OpeningBalance->AdvancedSearch->save();

        // Field A2000Count
        $this->A2000Count->AdvancedSearch->SearchValue = @$filter["x_A2000Count"];
        $this->A2000Count->AdvancedSearch->SearchOperator = @$filter["z_A2000Count"];
        $this->A2000Count->AdvancedSearch->SearchCondition = @$filter["v_A2000Count"];
        $this->A2000Count->AdvancedSearch->SearchValue2 = @$filter["y_A2000Count"];
        $this->A2000Count->AdvancedSearch->SearchOperator2 = @$filter["w_A2000Count"];
        $this->A2000Count->AdvancedSearch->save();

        // Field A2000Amount
        $this->A2000Amount->AdvancedSearch->SearchValue = @$filter["x_A2000Amount"];
        $this->A2000Amount->AdvancedSearch->SearchOperator = @$filter["z_A2000Amount"];
        $this->A2000Amount->AdvancedSearch->SearchCondition = @$filter["v_A2000Amount"];
        $this->A2000Amount->AdvancedSearch->SearchValue2 = @$filter["y_A2000Amount"];
        $this->A2000Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A2000Amount"];
        $this->A2000Amount->AdvancedSearch->save();

        // Field A1000Count
        $this->A1000Count->AdvancedSearch->SearchValue = @$filter["x_A1000Count"];
        $this->A1000Count->AdvancedSearch->SearchOperator = @$filter["z_A1000Count"];
        $this->A1000Count->AdvancedSearch->SearchCondition = @$filter["v_A1000Count"];
        $this->A1000Count->AdvancedSearch->SearchValue2 = @$filter["y_A1000Count"];
        $this->A1000Count->AdvancedSearch->SearchOperator2 = @$filter["w_A1000Count"];
        $this->A1000Count->AdvancedSearch->save();

        // Field A1000Amount
        $this->A1000Amount->AdvancedSearch->SearchValue = @$filter["x_A1000Amount"];
        $this->A1000Amount->AdvancedSearch->SearchOperator = @$filter["z_A1000Amount"];
        $this->A1000Amount->AdvancedSearch->SearchCondition = @$filter["v_A1000Amount"];
        $this->A1000Amount->AdvancedSearch->SearchValue2 = @$filter["y_A1000Amount"];
        $this->A1000Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A1000Amount"];
        $this->A1000Amount->AdvancedSearch->save();

        // Field A500Count
        $this->A500Count->AdvancedSearch->SearchValue = @$filter["x_A500Count"];
        $this->A500Count->AdvancedSearch->SearchOperator = @$filter["z_A500Count"];
        $this->A500Count->AdvancedSearch->SearchCondition = @$filter["v_A500Count"];
        $this->A500Count->AdvancedSearch->SearchValue2 = @$filter["y_A500Count"];
        $this->A500Count->AdvancedSearch->SearchOperator2 = @$filter["w_A500Count"];
        $this->A500Count->AdvancedSearch->save();

        // Field A500Amount
        $this->A500Amount->AdvancedSearch->SearchValue = @$filter["x_A500Amount"];
        $this->A500Amount->AdvancedSearch->SearchOperator = @$filter["z_A500Amount"];
        $this->A500Amount->AdvancedSearch->SearchCondition = @$filter["v_A500Amount"];
        $this->A500Amount->AdvancedSearch->SearchValue2 = @$filter["y_A500Amount"];
        $this->A500Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A500Amount"];
        $this->A500Amount->AdvancedSearch->save();

        // Field A200Count
        $this->A200Count->AdvancedSearch->SearchValue = @$filter["x_A200Count"];
        $this->A200Count->AdvancedSearch->SearchOperator = @$filter["z_A200Count"];
        $this->A200Count->AdvancedSearch->SearchCondition = @$filter["v_A200Count"];
        $this->A200Count->AdvancedSearch->SearchValue2 = @$filter["y_A200Count"];
        $this->A200Count->AdvancedSearch->SearchOperator2 = @$filter["w_A200Count"];
        $this->A200Count->AdvancedSearch->save();

        // Field A200Amount
        $this->A200Amount->AdvancedSearch->SearchValue = @$filter["x_A200Amount"];
        $this->A200Amount->AdvancedSearch->SearchOperator = @$filter["z_A200Amount"];
        $this->A200Amount->AdvancedSearch->SearchCondition = @$filter["v_A200Amount"];
        $this->A200Amount->AdvancedSearch->SearchValue2 = @$filter["y_A200Amount"];
        $this->A200Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A200Amount"];
        $this->A200Amount->AdvancedSearch->save();

        // Field A100Count
        $this->A100Count->AdvancedSearch->SearchValue = @$filter["x_A100Count"];
        $this->A100Count->AdvancedSearch->SearchOperator = @$filter["z_A100Count"];
        $this->A100Count->AdvancedSearch->SearchCondition = @$filter["v_A100Count"];
        $this->A100Count->AdvancedSearch->SearchValue2 = @$filter["y_A100Count"];
        $this->A100Count->AdvancedSearch->SearchOperator2 = @$filter["w_A100Count"];
        $this->A100Count->AdvancedSearch->save();

        // Field A100Amount
        $this->A100Amount->AdvancedSearch->SearchValue = @$filter["x_A100Amount"];
        $this->A100Amount->AdvancedSearch->SearchOperator = @$filter["z_A100Amount"];
        $this->A100Amount->AdvancedSearch->SearchCondition = @$filter["v_A100Amount"];
        $this->A100Amount->AdvancedSearch->SearchValue2 = @$filter["y_A100Amount"];
        $this->A100Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A100Amount"];
        $this->A100Amount->AdvancedSearch->save();

        // Field A50Count
        $this->A50Count->AdvancedSearch->SearchValue = @$filter["x_A50Count"];
        $this->A50Count->AdvancedSearch->SearchOperator = @$filter["z_A50Count"];
        $this->A50Count->AdvancedSearch->SearchCondition = @$filter["v_A50Count"];
        $this->A50Count->AdvancedSearch->SearchValue2 = @$filter["y_A50Count"];
        $this->A50Count->AdvancedSearch->SearchOperator2 = @$filter["w_A50Count"];
        $this->A50Count->AdvancedSearch->save();

        // Field A50Amount
        $this->A50Amount->AdvancedSearch->SearchValue = @$filter["x_A50Amount"];
        $this->A50Amount->AdvancedSearch->SearchOperator = @$filter["z_A50Amount"];
        $this->A50Amount->AdvancedSearch->SearchCondition = @$filter["v_A50Amount"];
        $this->A50Amount->AdvancedSearch->SearchValue2 = @$filter["y_A50Amount"];
        $this->A50Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A50Amount"];
        $this->A50Amount->AdvancedSearch->save();

        // Field A20Count
        $this->A20Count->AdvancedSearch->SearchValue = @$filter["x_A20Count"];
        $this->A20Count->AdvancedSearch->SearchOperator = @$filter["z_A20Count"];
        $this->A20Count->AdvancedSearch->SearchCondition = @$filter["v_A20Count"];
        $this->A20Count->AdvancedSearch->SearchValue2 = @$filter["y_A20Count"];
        $this->A20Count->AdvancedSearch->SearchOperator2 = @$filter["w_A20Count"];
        $this->A20Count->AdvancedSearch->save();

        // Field A20Amount
        $this->A20Amount->AdvancedSearch->SearchValue = @$filter["x_A20Amount"];
        $this->A20Amount->AdvancedSearch->SearchOperator = @$filter["z_A20Amount"];
        $this->A20Amount->AdvancedSearch->SearchCondition = @$filter["v_A20Amount"];
        $this->A20Amount->AdvancedSearch->SearchValue2 = @$filter["y_A20Amount"];
        $this->A20Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A20Amount"];
        $this->A20Amount->AdvancedSearch->save();

        // Field A10Count
        $this->A10Count->AdvancedSearch->SearchValue = @$filter["x_A10Count"];
        $this->A10Count->AdvancedSearch->SearchOperator = @$filter["z_A10Count"];
        $this->A10Count->AdvancedSearch->SearchCondition = @$filter["v_A10Count"];
        $this->A10Count->AdvancedSearch->SearchValue2 = @$filter["y_A10Count"];
        $this->A10Count->AdvancedSearch->SearchOperator2 = @$filter["w_A10Count"];
        $this->A10Count->AdvancedSearch->save();

        // Field A10Amount
        $this->A10Amount->AdvancedSearch->SearchValue = @$filter["x_A10Amount"];
        $this->A10Amount->AdvancedSearch->SearchOperator = @$filter["z_A10Amount"];
        $this->A10Amount->AdvancedSearch->SearchCondition = @$filter["v_A10Amount"];
        $this->A10Amount->AdvancedSearch->SearchValue2 = @$filter["y_A10Amount"];
        $this->A10Amount->AdvancedSearch->SearchOperator2 = @$filter["w_A10Amount"];
        $this->A10Amount->AdvancedSearch->save();

        // Field Other
        $this->Other->AdvancedSearch->SearchValue = @$filter["x_Other"];
        $this->Other->AdvancedSearch->SearchOperator = @$filter["z_Other"];
        $this->Other->AdvancedSearch->SearchCondition = @$filter["v_Other"];
        $this->Other->AdvancedSearch->SearchValue2 = @$filter["y_Other"];
        $this->Other->AdvancedSearch->SearchOperator2 = @$filter["w_Other"];
        $this->Other->AdvancedSearch->save();

        // Field TotalCash
        $this->TotalCash->AdvancedSearch->SearchValue = @$filter["x_TotalCash"];
        $this->TotalCash->AdvancedSearch->SearchOperator = @$filter["z_TotalCash"];
        $this->TotalCash->AdvancedSearch->SearchCondition = @$filter["v_TotalCash"];
        $this->TotalCash->AdvancedSearch->SearchValue2 = @$filter["y_TotalCash"];
        $this->TotalCash->AdvancedSearch->SearchOperator2 = @$filter["w_TotalCash"];
        $this->TotalCash->AdvancedSearch->save();

        // Field Cheque
        $this->Cheque->AdvancedSearch->SearchValue = @$filter["x_Cheque"];
        $this->Cheque->AdvancedSearch->SearchOperator = @$filter["z_Cheque"];
        $this->Cheque->AdvancedSearch->SearchCondition = @$filter["v_Cheque"];
        $this->Cheque->AdvancedSearch->SearchValue2 = @$filter["y_Cheque"];
        $this->Cheque->AdvancedSearch->SearchOperator2 = @$filter["w_Cheque"];
        $this->Cheque->AdvancedSearch->save();

        // Field Card
        $this->Card->AdvancedSearch->SearchValue = @$filter["x_Card"];
        $this->Card->AdvancedSearch->SearchOperator = @$filter["z_Card"];
        $this->Card->AdvancedSearch->SearchCondition = @$filter["v_Card"];
        $this->Card->AdvancedSearch->SearchValue2 = @$filter["y_Card"];
        $this->Card->AdvancedSearch->SearchOperator2 = @$filter["w_Card"];
        $this->Card->AdvancedSearch->save();

        // Field NEFTRTGS
        $this->NEFTRTGS->AdvancedSearch->SearchValue = @$filter["x_NEFTRTGS"];
        $this->NEFTRTGS->AdvancedSearch->SearchOperator = @$filter["z_NEFTRTGS"];
        $this->NEFTRTGS->AdvancedSearch->SearchCondition = @$filter["v_NEFTRTGS"];
        $this->NEFTRTGS->AdvancedSearch->SearchValue2 = @$filter["y_NEFTRTGS"];
        $this->NEFTRTGS->AdvancedSearch->SearchOperator2 = @$filter["w_NEFTRTGS"];
        $this->NEFTRTGS->AdvancedSearch->save();

        // Field TotalTransferDepositAmount
        $this->TotalTransferDepositAmount->AdvancedSearch->SearchValue = @$filter["x_TotalTransferDepositAmount"];
        $this->TotalTransferDepositAmount->AdvancedSearch->SearchOperator = @$filter["z_TotalTransferDepositAmount"];
        $this->TotalTransferDepositAmount->AdvancedSearch->SearchCondition = @$filter["v_TotalTransferDepositAmount"];
        $this->TotalTransferDepositAmount->AdvancedSearch->SearchValue2 = @$filter["y_TotalTransferDepositAmount"];
        $this->TotalTransferDepositAmount->AdvancedSearch->SearchOperator2 = @$filter["w_TotalTransferDepositAmount"];
        $this->TotalTransferDepositAmount->AdvancedSearch->save();

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

        // Field CreatedUserName
        $this->CreatedUserName->AdvancedSearch->SearchValue = @$filter["x_CreatedUserName"];
        $this->CreatedUserName->AdvancedSearch->SearchOperator = @$filter["z_CreatedUserName"];
        $this->CreatedUserName->AdvancedSearch->SearchCondition = @$filter["v_CreatedUserName"];
        $this->CreatedUserName->AdvancedSearch->SearchValue2 = @$filter["y_CreatedUserName"];
        $this->CreatedUserName->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedUserName"];
        $this->CreatedUserName->AdvancedSearch->save();

        // Field ModifiedUserName
        $this->ModifiedUserName->AdvancedSearch->SearchValue = @$filter["x_ModifiedUserName"];
        $this->ModifiedUserName->AdvancedSearch->SearchOperator = @$filter["z_ModifiedUserName"];
        $this->ModifiedUserName->AdvancedSearch->SearchCondition = @$filter["v_ModifiedUserName"];
        $this->ModifiedUserName->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedUserName"];
        $this->ModifiedUserName->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedUserName"];
        $this->ModifiedUserName->AdvancedSearch->save();

        // Field BalanceAmount
        $this->BalanceAmount->AdvancedSearch->SearchValue = @$filter["x_BalanceAmount"];
        $this->BalanceAmount->AdvancedSearch->SearchOperator = @$filter["z_BalanceAmount"];
        $this->BalanceAmount->AdvancedSearch->SearchCondition = @$filter["v_BalanceAmount"];
        $this->BalanceAmount->AdvancedSearch->SearchValue2 = @$filter["y_BalanceAmount"];
        $this->BalanceAmount->AdvancedSearch->SearchOperator2 = @$filter["w_BalanceAmount"];
        $this->BalanceAmount->AdvancedSearch->save();

        // Field CashCollected
        $this->CashCollected->AdvancedSearch->SearchValue = @$filter["x_CashCollected"];
        $this->CashCollected->AdvancedSearch->SearchOperator = @$filter["z_CashCollected"];
        $this->CashCollected->AdvancedSearch->SearchCondition = @$filter["v_CashCollected"];
        $this->CashCollected->AdvancedSearch->SearchValue2 = @$filter["y_CashCollected"];
        $this->CashCollected->AdvancedSearch->SearchOperator2 = @$filter["w_CashCollected"];
        $this->CashCollected->AdvancedSearch->save();

        // Field RTGS
        $this->RTGS->AdvancedSearch->SearchValue = @$filter["x_RTGS"];
        $this->RTGS->AdvancedSearch->SearchOperator = @$filter["z_RTGS"];
        $this->RTGS->AdvancedSearch->SearchCondition = @$filter["v_RTGS"];
        $this->RTGS->AdvancedSearch->SearchValue2 = @$filter["y_RTGS"];
        $this->RTGS->AdvancedSearch->SearchOperator2 = @$filter["w_RTGS"];
        $this->RTGS->AdvancedSearch->save();

        // Field PAYTM
        $this->PAYTM->AdvancedSearch->SearchValue = @$filter["x_PAYTM"];
        $this->PAYTM->AdvancedSearch->SearchOperator = @$filter["z_PAYTM"];
        $this->PAYTM->AdvancedSearch->SearchCondition = @$filter["v_PAYTM"];
        $this->PAYTM->AdvancedSearch->SearchValue2 = @$filter["y_PAYTM"];
        $this->PAYTM->AdvancedSearch->SearchOperator2 = @$filter["w_PAYTM"];
        $this->PAYTM->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->DepositToBankSelect, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DepositToBank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TransferToSelect, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TransferTo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CreatedUserName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ModifiedUserName, $arKeywords, $type);
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
            $this->updateSort($this->DepositDate); // DepositDate
            $this->updateSort($this->DepositToBankSelect); // DepositToBankSelect
            $this->updateSort($this->DepositToBank); // DepositToBank
            $this->updateSort($this->TransferToSelect); // TransferToSelect
            $this->updateSort($this->TransferTo); // TransferTo
            $this->updateSort($this->OpeningBalance); // OpeningBalance
            $this->updateSort($this->A2000Count); // A2000Count
            $this->updateSort($this->A2000Amount); // A2000Amount
            $this->updateSort($this->A1000Count); // A1000Count
            $this->updateSort($this->A1000Amount); // A1000Amount
            $this->updateSort($this->A500Count); // A500Count
            $this->updateSort($this->A500Amount); // A500Amount
            $this->updateSort($this->A200Count); // A200Count
            $this->updateSort($this->A200Amount); // A200Amount
            $this->updateSort($this->A100Count); // A100Count
            $this->updateSort($this->A100Amount); // A100Amount
            $this->updateSort($this->A50Count); // A50Count
            $this->updateSort($this->A50Amount); // A50Amount
            $this->updateSort($this->A20Count); // A20Count
            $this->updateSort($this->A20Amount); // A20Amount
            $this->updateSort($this->A10Count); // A10Count
            $this->updateSort($this->A10Amount); // A10Amount
            $this->updateSort($this->Other); // Other
            $this->updateSort($this->TotalCash); // TotalCash
            $this->updateSort($this->Cheque); // Cheque
            $this->updateSort($this->Card); // Card
            $this->updateSort($this->NEFTRTGS); // NEFTRTGS
            $this->updateSort($this->TotalTransferDepositAmount); // TotalTransferDepositAmount
            $this->updateSort($this->CreatedBy); // CreatedBy
            $this->updateSort($this->CreatedDateTime); // CreatedDateTime
            $this->updateSort($this->ModifiedBy); // ModifiedBy
            $this->updateSort($this->ModifiedDateTime); // ModifiedDateTime
            $this->updateSort($this->CreatedUserName); // CreatedUserName
            $this->updateSort($this->ModifiedUserName); // ModifiedUserName
            $this->updateSort($this->BalanceAmount); // BalanceAmount
            $this->updateSort($this->CashCollected); // CashCollected
            $this->updateSort($this->RTGS); // RTGS
            $this->updateSort($this->PAYTM); // PAYTM
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
                $this->DepositDate->setSort("");
                $this->DepositToBankSelect->setSort("");
                $this->DepositToBank->setSort("");
                $this->TransferToSelect->setSort("");
                $this->TransferTo->setSort("");
                $this->OpeningBalance->setSort("");
                $this->A2000Count->setSort("");
                $this->A2000Amount->setSort("");
                $this->A1000Count->setSort("");
                $this->A1000Amount->setSort("");
                $this->A500Count->setSort("");
                $this->A500Amount->setSort("");
                $this->A200Count->setSort("");
                $this->A200Amount->setSort("");
                $this->A100Count->setSort("");
                $this->A100Amount->setSort("");
                $this->A50Count->setSort("");
                $this->A50Amount->setSort("");
                $this->A20Count->setSort("");
                $this->A20Amount->setSort("");
                $this->A10Count->setSort("");
                $this->A10Amount->setSort("");
                $this->Other->setSort("");
                $this->TotalCash->setSort("");
                $this->Cheque->setSort("");
                $this->Card->setSort("");
                $this->NEFTRTGS->setSort("");
                $this->TotalTransferDepositAmount->setSort("");
                $this->CreatedBy->setSort("");
                $this->CreatedDateTime->setSort("");
                $this->ModifiedBy->setSort("");
                $this->ModifiedDateTime->setSort("");
                $this->CreatedUserName->setSort("");
                $this->ModifiedUserName->setSort("");
                $this->BalanceAmount->setSort("");
                $this->CashCollected->setSort("");
                $this->RTGS->setSort("");
                $this->PAYTM->setSort("");
                $this->HospID->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_till_search_viewlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_till_search_viewlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_till_search_viewlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->DepositDate->setDbValue($row['DepositDate']);
        $this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
        $this->DepositToBank->setDbValue($row['DepositToBank']);
        $this->TransferToSelect->setDbValue($row['TransferToSelect']);
        $this->TransferTo->setDbValue($row['TransferTo']);
        $this->OpeningBalance->setDbValue($row['OpeningBalance']);
        $this->A2000Count->setDbValue($row['A2000Count']);
        $this->A2000Amount->setDbValue($row['A2000Amount']);
        $this->A1000Count->setDbValue($row['A1000Count']);
        $this->A1000Amount->setDbValue($row['A1000Amount']);
        $this->A500Count->setDbValue($row['A500Count']);
        $this->A500Amount->setDbValue($row['A500Amount']);
        $this->A200Count->setDbValue($row['A200Count']);
        $this->A200Amount->setDbValue($row['A200Amount']);
        $this->A100Count->setDbValue($row['A100Count']);
        $this->A100Amount->setDbValue($row['A100Amount']);
        $this->A50Count->setDbValue($row['A50Count']);
        $this->A50Amount->setDbValue($row['A50Amount']);
        $this->A20Count->setDbValue($row['A20Count']);
        $this->A20Amount->setDbValue($row['A20Amount']);
        $this->A10Count->setDbValue($row['A10Count']);
        $this->A10Amount->setDbValue($row['A10Amount']);
        $this->Other->setDbValue($row['Other']);
        $this->TotalCash->setDbValue($row['TotalCash']);
        $this->Cheque->setDbValue($row['Cheque']);
        $this->Card->setDbValue($row['Card']);
        $this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
        $this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->CreatedUserName->setDbValue($row['CreatedUserName']);
        $this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
        $this->BalanceAmount->setDbValue($row['BalanceAmount']);
        $this->CashCollected->setDbValue($row['CashCollected']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['DepositDate'] = null;
        $row['DepositToBankSelect'] = null;
        $row['DepositToBank'] = null;
        $row['TransferToSelect'] = null;
        $row['TransferTo'] = null;
        $row['OpeningBalance'] = null;
        $row['A2000Count'] = null;
        $row['A2000Amount'] = null;
        $row['A1000Count'] = null;
        $row['A1000Amount'] = null;
        $row['A500Count'] = null;
        $row['A500Amount'] = null;
        $row['A200Count'] = null;
        $row['A200Amount'] = null;
        $row['A100Count'] = null;
        $row['A100Amount'] = null;
        $row['A50Count'] = null;
        $row['A50Amount'] = null;
        $row['A20Count'] = null;
        $row['A20Amount'] = null;
        $row['A10Count'] = null;
        $row['A10Amount'] = null;
        $row['Other'] = null;
        $row['TotalCash'] = null;
        $row['Cheque'] = null;
        $row['Card'] = null;
        $row['NEFTRTGS'] = null;
        $row['TotalTransferDepositAmount'] = null;
        $row['CreatedBy'] = null;
        $row['CreatedDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
        $row['CreatedUserName'] = null;
        $row['ModifiedUserName'] = null;
        $row['BalanceAmount'] = null;
        $row['CashCollected'] = null;
        $row['RTGS'] = null;
        $row['PAYTM'] = null;
        $row['HospID'] = null;
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
        if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue))) {
            $this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A2000Amount->FormValue == $this->A2000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A2000Amount->CurrentValue))) {
            $this->A2000Amount->CurrentValue = ConvertToFloatString($this->A2000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A1000Amount->FormValue == $this->A1000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A1000Amount->CurrentValue))) {
            $this->A1000Amount->CurrentValue = ConvertToFloatString($this->A1000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A500Amount->FormValue == $this->A500Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A500Amount->CurrentValue))) {
            $this->A500Amount->CurrentValue = ConvertToFloatString($this->A500Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A200Amount->FormValue == $this->A200Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A200Amount->CurrentValue))) {
            $this->A200Amount->CurrentValue = ConvertToFloatString($this->A200Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A100Amount->FormValue == $this->A100Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A100Amount->CurrentValue))) {
            $this->A100Amount->CurrentValue = ConvertToFloatString($this->A100Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A50Amount->FormValue == $this->A50Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A50Amount->CurrentValue))) {
            $this->A50Amount->CurrentValue = ConvertToFloatString($this->A50Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A20Amount->FormValue == $this->A20Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A20Amount->CurrentValue))) {
            $this->A20Amount->CurrentValue = ConvertToFloatString($this->A20Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A10Amount->FormValue == $this->A10Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A10Amount->CurrentValue))) {
            $this->A10Amount->CurrentValue = ConvertToFloatString($this->A10Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue))) {
            $this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue))) {
            $this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue))) {
            $this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue))) {
            $this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue))) {
            $this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BalanceAmount->FormValue == $this->BalanceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->BalanceAmount->CurrentValue))) {
            $this->BalanceAmount->CurrentValue = ConvertToFloatString($this->BalanceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue))) {
            $this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue))) {
            $this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue))) {
            $this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // DepositDate

        // DepositToBankSelect

        // DepositToBank

        // TransferToSelect

        // TransferTo

        // OpeningBalance

        // A2000Count

        // A2000Amount

        // A1000Count

        // A1000Amount

        // A500Count

        // A500Amount

        // A200Count

        // A200Amount

        // A100Count

        // A100Amount

        // A50Count

        // A50Amount

        // A20Count

        // A20Amount

        // A10Count

        // A10Amount

        // Other

        // TotalCash

        // Cheque

        // Card

        // NEFTRTGS

        // TotalTransferDepositAmount

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // CreatedUserName

        // ModifiedUserName

        // BalanceAmount

        // CashCollected

        // RTGS

        // PAYTM

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // DepositDate
            $this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
            $this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 0);
            $this->DepositDate->ViewCustomAttributes = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->CurrentValue;
            $this->DepositToBankSelect->ViewCustomAttributes = "";

            // DepositToBank
            $this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
            $this->DepositToBank->ViewCustomAttributes = "";

            // TransferToSelect
            $this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
            $this->TransferToSelect->ViewCustomAttributes = "";

            // TransferTo
            $this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
            $this->TransferTo->ViewCustomAttributes = "";

            // OpeningBalance
            $this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
            $this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
            $this->OpeningBalance->ViewCustomAttributes = "";

            // A2000Count
            $this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
            $this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
            $this->A2000Count->ViewCustomAttributes = "";

            // A2000Amount
            $this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
            $this->A2000Amount->ViewValue = FormatNumber($this->A2000Amount->ViewValue, 2, -2, -2, -2);
            $this->A2000Amount->ViewCustomAttributes = "";

            // A1000Count
            $this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
            $this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
            $this->A1000Count->ViewCustomAttributes = "";

            // A1000Amount
            $this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
            $this->A1000Amount->ViewValue = FormatNumber($this->A1000Amount->ViewValue, 2, -2, -2, -2);
            $this->A1000Amount->ViewCustomAttributes = "";

            // A500Count
            $this->A500Count->ViewValue = $this->A500Count->CurrentValue;
            $this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
            $this->A500Count->ViewCustomAttributes = "";

            // A500Amount
            $this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
            $this->A500Amount->ViewValue = FormatNumber($this->A500Amount->ViewValue, 2, -2, -2, -2);
            $this->A500Amount->ViewCustomAttributes = "";

            // A200Count
            $this->A200Count->ViewValue = $this->A200Count->CurrentValue;
            $this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
            $this->A200Count->ViewCustomAttributes = "";

            // A200Amount
            $this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
            $this->A200Amount->ViewValue = FormatNumber($this->A200Amount->ViewValue, 2, -2, -2, -2);
            $this->A200Amount->ViewCustomAttributes = "";

            // A100Count
            $this->A100Count->ViewValue = $this->A100Count->CurrentValue;
            $this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
            $this->A100Count->ViewCustomAttributes = "";

            // A100Amount
            $this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
            $this->A100Amount->ViewValue = FormatNumber($this->A100Amount->ViewValue, 2, -2, -2, -2);
            $this->A100Amount->ViewCustomAttributes = "";

            // A50Count
            $this->A50Count->ViewValue = $this->A50Count->CurrentValue;
            $this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
            $this->A50Count->ViewCustomAttributes = "";

            // A50Amount
            $this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
            $this->A50Amount->ViewValue = FormatNumber($this->A50Amount->ViewValue, 2, -2, -2, -2);
            $this->A50Amount->ViewCustomAttributes = "";

            // A20Count
            $this->A20Count->ViewValue = $this->A20Count->CurrentValue;
            $this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
            $this->A20Count->ViewCustomAttributes = "";

            // A20Amount
            $this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
            $this->A20Amount->ViewValue = FormatNumber($this->A20Amount->ViewValue, 2, -2, -2, -2);
            $this->A20Amount->ViewCustomAttributes = "";

            // A10Count
            $this->A10Count->ViewValue = $this->A10Count->CurrentValue;
            $this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
            $this->A10Count->ViewCustomAttributes = "";

            // A10Amount
            $this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
            $this->A10Amount->ViewValue = FormatNumber($this->A10Amount->ViewValue, 2, -2, -2, -2);
            $this->A10Amount->ViewCustomAttributes = "";

            // Other
            $this->Other->ViewValue = $this->Other->CurrentValue;
            $this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
            $this->Other->ViewCustomAttributes = "";

            // TotalCash
            $this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
            $this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
            $this->TotalCash->ViewCustomAttributes = "";

            // Cheque
            $this->Cheque->ViewValue = $this->Cheque->CurrentValue;
            $this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
            $this->Cheque->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // NEFTRTGS
            $this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
            $this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
            $this->NEFTRTGS->ViewCustomAttributes = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
            $this->TotalTransferDepositAmount->ViewValue = FormatNumber($this->TotalTransferDepositAmount->ViewValue, 2, -2, -2, -2);
            $this->TotalTransferDepositAmount->ViewCustomAttributes = "";

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

            // CreatedUserName
            $this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
            $this->CreatedUserName->ViewCustomAttributes = "";

            // ModifiedUserName
            $this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
            $this->ModifiedUserName->ViewCustomAttributes = "";

            // BalanceAmount
            $this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
            $this->BalanceAmount->ViewValue = FormatNumber($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
            $this->BalanceAmount->ViewCustomAttributes = "";

            // CashCollected
            $this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
            $this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
            $this->CashCollected->ViewCustomAttributes = "";

            // RTGS
            $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
            $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
            $this->RTGS->ViewCustomAttributes = "";

            // PAYTM
            $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
            $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
            $this->PAYTM->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // DepositDate
            $this->DepositDate->LinkCustomAttributes = "";
            $this->DepositDate->HrefValue = "";
            $this->DepositDate->TooltipValue = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->LinkCustomAttributes = "";
            $this->DepositToBankSelect->HrefValue = "";
            $this->DepositToBankSelect->TooltipValue = "";

            // DepositToBank
            $this->DepositToBank->LinkCustomAttributes = "";
            $this->DepositToBank->HrefValue = "";
            $this->DepositToBank->TooltipValue = "";

            // TransferToSelect
            $this->TransferToSelect->LinkCustomAttributes = "";
            $this->TransferToSelect->HrefValue = "";
            $this->TransferToSelect->TooltipValue = "";

            // TransferTo
            $this->TransferTo->LinkCustomAttributes = "";
            $this->TransferTo->HrefValue = "";
            $this->TransferTo->TooltipValue = "";

            // OpeningBalance
            $this->OpeningBalance->LinkCustomAttributes = "";
            $this->OpeningBalance->HrefValue = "";
            $this->OpeningBalance->TooltipValue = "";

            // A2000Count
            $this->A2000Count->LinkCustomAttributes = "";
            $this->A2000Count->HrefValue = "";
            $this->A2000Count->TooltipValue = "";

            // A2000Amount
            $this->A2000Amount->LinkCustomAttributes = "";
            $this->A2000Amount->HrefValue = "";
            $this->A2000Amount->TooltipValue = "";

            // A1000Count
            $this->A1000Count->LinkCustomAttributes = "";
            $this->A1000Count->HrefValue = "";
            $this->A1000Count->TooltipValue = "";

            // A1000Amount
            $this->A1000Amount->LinkCustomAttributes = "";
            $this->A1000Amount->HrefValue = "";
            $this->A1000Amount->TooltipValue = "";

            // A500Count
            $this->A500Count->LinkCustomAttributes = "";
            $this->A500Count->HrefValue = "";
            $this->A500Count->TooltipValue = "";

            // A500Amount
            $this->A500Amount->LinkCustomAttributes = "";
            $this->A500Amount->HrefValue = "";
            $this->A500Amount->TooltipValue = "";

            // A200Count
            $this->A200Count->LinkCustomAttributes = "";
            $this->A200Count->HrefValue = "";
            $this->A200Count->TooltipValue = "";

            // A200Amount
            $this->A200Amount->LinkCustomAttributes = "";
            $this->A200Amount->HrefValue = "";
            $this->A200Amount->TooltipValue = "";

            // A100Count
            $this->A100Count->LinkCustomAttributes = "";
            $this->A100Count->HrefValue = "";
            $this->A100Count->TooltipValue = "";

            // A100Amount
            $this->A100Amount->LinkCustomAttributes = "";
            $this->A100Amount->HrefValue = "";
            $this->A100Amount->TooltipValue = "";

            // A50Count
            $this->A50Count->LinkCustomAttributes = "";
            $this->A50Count->HrefValue = "";
            $this->A50Count->TooltipValue = "";

            // A50Amount
            $this->A50Amount->LinkCustomAttributes = "";
            $this->A50Amount->HrefValue = "";
            $this->A50Amount->TooltipValue = "";

            // A20Count
            $this->A20Count->LinkCustomAttributes = "";
            $this->A20Count->HrefValue = "";
            $this->A20Count->TooltipValue = "";

            // A20Amount
            $this->A20Amount->LinkCustomAttributes = "";
            $this->A20Amount->HrefValue = "";
            $this->A20Amount->TooltipValue = "";

            // A10Count
            $this->A10Count->LinkCustomAttributes = "";
            $this->A10Count->HrefValue = "";
            $this->A10Count->TooltipValue = "";

            // A10Amount
            $this->A10Amount->LinkCustomAttributes = "";
            $this->A10Amount->HrefValue = "";
            $this->A10Amount->TooltipValue = "";

            // Other
            $this->Other->LinkCustomAttributes = "";
            $this->Other->HrefValue = "";
            $this->Other->TooltipValue = "";

            // TotalCash
            $this->TotalCash->LinkCustomAttributes = "";
            $this->TotalCash->HrefValue = "";
            $this->TotalCash->TooltipValue = "";

            // Cheque
            $this->Cheque->LinkCustomAttributes = "";
            $this->Cheque->HrefValue = "";
            $this->Cheque->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // NEFTRTGS
            $this->NEFTRTGS->LinkCustomAttributes = "";
            $this->NEFTRTGS->HrefValue = "";
            $this->NEFTRTGS->TooltipValue = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
            $this->TotalTransferDepositAmount->HrefValue = "";
            $this->TotalTransferDepositAmount->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // CreatedUserName
            $this->CreatedUserName->LinkCustomAttributes = "";
            $this->CreatedUserName->HrefValue = "";
            $this->CreatedUserName->TooltipValue = "";

            // ModifiedUserName
            $this->ModifiedUserName->LinkCustomAttributes = "";
            $this->ModifiedUserName->HrefValue = "";
            $this->ModifiedUserName->TooltipValue = "";

            // BalanceAmount
            $this->BalanceAmount->LinkCustomAttributes = "";
            $this->BalanceAmount->HrefValue = "";
            $this->BalanceAmount->TooltipValue = "";

            // CashCollected
            $this->CashCollected->LinkCustomAttributes = "";
            $this->CashCollected->HrefValue = "";
            $this->CashCollected->TooltipValue = "";

            // RTGS
            $this->RTGS->LinkCustomAttributes = "";
            $this->RTGS->HrefValue = "";
            $this->RTGS->TooltipValue = "";

            // PAYTM
            $this->PAYTM->LinkCustomAttributes = "";
            $this->PAYTM->HrefValue = "";
            $this->PAYTM->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_till_search_viewlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
