<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabTestMasterList extends LabTestMaster
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_test_master';

    // Page object name
    public $PageObjName = "LabTestMasterList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "flab_test_masterlist";
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

        // Table object (lab_test_master)
        if (!isset($GLOBALS["lab_test_master"]) || get_class($GLOBALS["lab_test_master"]) == PROJECT_NAMESPACE . "lab_test_master") {
            $GLOBALS["lab_test_master"] = &$this;
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
        $this->AddUrl = "LabTestMasterAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "LabTestMasterDelete";
        $this->MultiUpdateUrl = "LabTestMasterUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_master');
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
        $this->FilterOptions->TagClassName = "ew-filter-option flab_test_masterlistsrch";

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
                $doc = new $class(Container("lab_test_master"));
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
        $this->MainDeptCd->setVisibility();
        $this->DeptCd->setVisibility();
        $this->TestCd->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->TestName->setVisibility();
        $this->XrayPart->setVisibility();
        $this->Method->setVisibility();
        $this->Order->setVisibility();
        $this->Form->setVisibility();
        $this->Amt->setVisibility();
        $this->SplAmt->setVisibility();
        $this->ResType->setVisibility();
        $this->UnitCD->setVisibility();
        $this->RefValue->Visible = false;
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->Visible = false;
        $this->Inactive->setVisibility();
        $this->ReagentAmt->setVisibility();
        $this->LabAmt->setVisibility();
        $this->RefAmt->setVisibility();
        $this->CreFrom->setVisibility();
        $this->CreTo->setVisibility();
        $this->Note->Visible = false;
        $this->Sun->setVisibility();
        $this->Mon->setVisibility();
        $this->Tue->setVisibility();
        $this->Wed->setVisibility();
        $this->Thi->setVisibility();
        $this->Fri->setVisibility();
        $this->Sat->setVisibility();
        $this->Days->setVisibility();
        $this->Cutoff->setVisibility();
        $this->FontBold->setVisibility();
        $this->TestHeading->setVisibility();
        $this->Outsource->setVisibility();
        $this->NoResult->setVisibility();
        $this->GraphLow->setVisibility();
        $this->GraphHigh->setVisibility();
        $this->CollSample->setVisibility();
        $this->ProcessTime->setVisibility();
        $this->TamilName->setVisibility();
        $this->ShortName->setVisibility();
        $this->Individual->setVisibility();
        $this->PrevAmt->setVisibility();
        $this->PrevSplAmt->setVisibility();
        $this->Remarks->Visible = false;
        $this->EditDate->setVisibility();
        $this->BillName->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->HISCD->setVisibility();
        $this->PriceList->setVisibility();
        $this->IPAmt->setVisibility();
        $this->InsAmt->setVisibility();
        $this->ManualCD->setVisibility();
        $this->Free->setVisibility();
        $this->AutoAuth->setVisibility();
        $this->ProductCD->setVisibility();
        $this->Inventory->setVisibility();
        $this->IntimateTest->setVisibility();
        $this->Manual->setVisibility();
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
        $filterList = Concat($filterList, $this->MainDeptCd->AdvancedSearch->toJson(), ","); // Field MainDeptCd
        $filterList = Concat($filterList, $this->DeptCd->AdvancedSearch->toJson(), ","); // Field DeptCd
        $filterList = Concat($filterList, $this->TestCd->AdvancedSearch->toJson(), ","); // Field TestCd
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->TestName->AdvancedSearch->toJson(), ","); // Field TestName
        $filterList = Concat($filterList, $this->XrayPart->AdvancedSearch->toJson(), ","); // Field XrayPart
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->Amt->AdvancedSearch->toJson(), ","); // Field Amt
        $filterList = Concat($filterList, $this->SplAmt->AdvancedSearch->toJson(), ","); // Field SplAmt
        $filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
        $filterList = Concat($filterList, $this->UnitCD->AdvancedSearch->toJson(), ","); // Field UnitCD
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
        $filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
        $filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
        $filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
        $filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
        $filterList = Concat($filterList, $this->ReagentAmt->AdvancedSearch->toJson(), ","); // Field ReagentAmt
        $filterList = Concat($filterList, $this->LabAmt->AdvancedSearch->toJson(), ","); // Field LabAmt
        $filterList = Concat($filterList, $this->RefAmt->AdvancedSearch->toJson(), ","); // Field RefAmt
        $filterList = Concat($filterList, $this->CreFrom->AdvancedSearch->toJson(), ","); // Field CreFrom
        $filterList = Concat($filterList, $this->CreTo->AdvancedSearch->toJson(), ","); // Field CreTo
        $filterList = Concat($filterList, $this->Note->AdvancedSearch->toJson(), ","); // Field Note
        $filterList = Concat($filterList, $this->Sun->AdvancedSearch->toJson(), ","); // Field Sun
        $filterList = Concat($filterList, $this->Mon->AdvancedSearch->toJson(), ","); // Field Mon
        $filterList = Concat($filterList, $this->Tue->AdvancedSearch->toJson(), ","); // Field Tue
        $filterList = Concat($filterList, $this->Wed->AdvancedSearch->toJson(), ","); // Field Wed
        $filterList = Concat($filterList, $this->Thi->AdvancedSearch->toJson(), ","); // Field Thi
        $filterList = Concat($filterList, $this->Fri->AdvancedSearch->toJson(), ","); // Field Fri
        $filterList = Concat($filterList, $this->Sat->AdvancedSearch->toJson(), ","); // Field Sat
        $filterList = Concat($filterList, $this->Days->AdvancedSearch->toJson(), ","); // Field Days
        $filterList = Concat($filterList, $this->Cutoff->AdvancedSearch->toJson(), ","); // Field Cutoff
        $filterList = Concat($filterList, $this->FontBold->AdvancedSearch->toJson(), ","); // Field FontBold
        $filterList = Concat($filterList, $this->TestHeading->AdvancedSearch->toJson(), ","); // Field TestHeading
        $filterList = Concat($filterList, $this->Outsource->AdvancedSearch->toJson(), ","); // Field Outsource
        $filterList = Concat($filterList, $this->NoResult->AdvancedSearch->toJson(), ","); // Field NoResult
        $filterList = Concat($filterList, $this->GraphLow->AdvancedSearch->toJson(), ","); // Field GraphLow
        $filterList = Concat($filterList, $this->GraphHigh->AdvancedSearch->toJson(), ","); // Field GraphHigh
        $filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
        $filterList = Concat($filterList, $this->ProcessTime->AdvancedSearch->toJson(), ","); // Field ProcessTime
        $filterList = Concat($filterList, $this->TamilName->AdvancedSearch->toJson(), ","); // Field TamilName
        $filterList = Concat($filterList, $this->ShortName->AdvancedSearch->toJson(), ","); // Field ShortName
        $filterList = Concat($filterList, $this->Individual->AdvancedSearch->toJson(), ","); // Field Individual
        $filterList = Concat($filterList, $this->PrevAmt->AdvancedSearch->toJson(), ","); // Field PrevAmt
        $filterList = Concat($filterList, $this->PrevSplAmt->AdvancedSearch->toJson(), ","); // Field PrevSplAmt
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->EditDate->AdvancedSearch->toJson(), ","); // Field EditDate
        $filterList = Concat($filterList, $this->BillName->AdvancedSearch->toJson(), ","); // Field BillName
        $filterList = Concat($filterList, $this->ActualAmt->AdvancedSearch->toJson(), ","); // Field ActualAmt
        $filterList = Concat($filterList, $this->HISCD->AdvancedSearch->toJson(), ","); // Field HISCD
        $filterList = Concat($filterList, $this->PriceList->AdvancedSearch->toJson(), ","); // Field PriceList
        $filterList = Concat($filterList, $this->IPAmt->AdvancedSearch->toJson(), ","); // Field IPAmt
        $filterList = Concat($filterList, $this->InsAmt->AdvancedSearch->toJson(), ","); // Field InsAmt
        $filterList = Concat($filterList, $this->ManualCD->AdvancedSearch->toJson(), ","); // Field ManualCD
        $filterList = Concat($filterList, $this->Free->AdvancedSearch->toJson(), ","); // Field Free
        $filterList = Concat($filterList, $this->AutoAuth->AdvancedSearch->toJson(), ","); // Field AutoAuth
        $filterList = Concat($filterList, $this->ProductCD->AdvancedSearch->toJson(), ","); // Field ProductCD
        $filterList = Concat($filterList, $this->Inventory->AdvancedSearch->toJson(), ","); // Field Inventory
        $filterList = Concat($filterList, $this->IntimateTest->AdvancedSearch->toJson(), ","); // Field IntimateTest
        $filterList = Concat($filterList, $this->Manual->AdvancedSearch->toJson(), ","); // Field Manual
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
            $UserProfile->setSearchFilters(CurrentUserName(), "flab_test_masterlistsrch", $filters);
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

        // Field MainDeptCd
        $this->MainDeptCd->AdvancedSearch->SearchValue = @$filter["x_MainDeptCd"];
        $this->MainDeptCd->AdvancedSearch->SearchOperator = @$filter["z_MainDeptCd"];
        $this->MainDeptCd->AdvancedSearch->SearchCondition = @$filter["v_MainDeptCd"];
        $this->MainDeptCd->AdvancedSearch->SearchValue2 = @$filter["y_MainDeptCd"];
        $this->MainDeptCd->AdvancedSearch->SearchOperator2 = @$filter["w_MainDeptCd"];
        $this->MainDeptCd->AdvancedSearch->save();

        // Field DeptCd
        $this->DeptCd->AdvancedSearch->SearchValue = @$filter["x_DeptCd"];
        $this->DeptCd->AdvancedSearch->SearchOperator = @$filter["z_DeptCd"];
        $this->DeptCd->AdvancedSearch->SearchCondition = @$filter["v_DeptCd"];
        $this->DeptCd->AdvancedSearch->SearchValue2 = @$filter["y_DeptCd"];
        $this->DeptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DeptCd"];
        $this->DeptCd->AdvancedSearch->save();

        // Field TestCd
        $this->TestCd->AdvancedSearch->SearchValue = @$filter["x_TestCd"];
        $this->TestCd->AdvancedSearch->SearchOperator = @$filter["z_TestCd"];
        $this->TestCd->AdvancedSearch->SearchCondition = @$filter["v_TestCd"];
        $this->TestCd->AdvancedSearch->SearchValue2 = @$filter["y_TestCd"];
        $this->TestCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestCd"];
        $this->TestCd->AdvancedSearch->save();

        // Field TestSubCd
        $this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->save();

        // Field TestName
        $this->TestName->AdvancedSearch->SearchValue = @$filter["x_TestName"];
        $this->TestName->AdvancedSearch->SearchOperator = @$filter["z_TestName"];
        $this->TestName->AdvancedSearch->SearchCondition = @$filter["v_TestName"];
        $this->TestName->AdvancedSearch->SearchValue2 = @$filter["y_TestName"];
        $this->TestName->AdvancedSearch->SearchOperator2 = @$filter["w_TestName"];
        $this->TestName->AdvancedSearch->save();

        // Field XrayPart
        $this->XrayPart->AdvancedSearch->SearchValue = @$filter["x_XrayPart"];
        $this->XrayPart->AdvancedSearch->SearchOperator = @$filter["z_XrayPart"];
        $this->XrayPart->AdvancedSearch->SearchCondition = @$filter["v_XrayPart"];
        $this->XrayPart->AdvancedSearch->SearchValue2 = @$filter["y_XrayPart"];
        $this->XrayPart->AdvancedSearch->SearchOperator2 = @$filter["w_XrayPart"];
        $this->XrayPart->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Order
        $this->Order->AdvancedSearch->SearchValue = @$filter["x_Order"];
        $this->Order->AdvancedSearch->SearchOperator = @$filter["z_Order"];
        $this->Order->AdvancedSearch->SearchCondition = @$filter["v_Order"];
        $this->Order->AdvancedSearch->SearchValue2 = @$filter["y_Order"];
        $this->Order->AdvancedSearch->SearchOperator2 = @$filter["w_Order"];
        $this->Order->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field Amt
        $this->Amt->AdvancedSearch->SearchValue = @$filter["x_Amt"];
        $this->Amt->AdvancedSearch->SearchOperator = @$filter["z_Amt"];
        $this->Amt->AdvancedSearch->SearchCondition = @$filter["v_Amt"];
        $this->Amt->AdvancedSearch->SearchValue2 = @$filter["y_Amt"];
        $this->Amt->AdvancedSearch->SearchOperator2 = @$filter["w_Amt"];
        $this->Amt->AdvancedSearch->save();

        // Field SplAmt
        $this->SplAmt->AdvancedSearch->SearchValue = @$filter["x_SplAmt"];
        $this->SplAmt->AdvancedSearch->SearchOperator = @$filter["z_SplAmt"];
        $this->SplAmt->AdvancedSearch->SearchCondition = @$filter["v_SplAmt"];
        $this->SplAmt->AdvancedSearch->SearchValue2 = @$filter["y_SplAmt"];
        $this->SplAmt->AdvancedSearch->SearchOperator2 = @$filter["w_SplAmt"];
        $this->SplAmt->AdvancedSearch->save();

        // Field ResType
        $this->ResType->AdvancedSearch->SearchValue = @$filter["x_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator = @$filter["z_ResType"];
        $this->ResType->AdvancedSearch->SearchCondition = @$filter["v_ResType"];
        $this->ResType->AdvancedSearch->SearchValue2 = @$filter["y_ResType"];
        $this->ResType->AdvancedSearch->SearchOperator2 = @$filter["w_ResType"];
        $this->ResType->AdvancedSearch->save();

        // Field UnitCD
        $this->UnitCD->AdvancedSearch->SearchValue = @$filter["x_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchOperator = @$filter["z_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchCondition = @$filter["v_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchValue2 = @$filter["y_UnitCD"];
        $this->UnitCD->AdvancedSearch->SearchOperator2 = @$filter["w_UnitCD"];
        $this->UnitCD->AdvancedSearch->save();

        // Field RefValue
        $this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
        $this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
        $this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
        $this->RefValue->AdvancedSearch->save();

        // Field Sample
        $this->Sample->AdvancedSearch->SearchValue = @$filter["x_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator = @$filter["z_Sample"];
        $this->Sample->AdvancedSearch->SearchCondition = @$filter["v_Sample"];
        $this->Sample->AdvancedSearch->SearchValue2 = @$filter["y_Sample"];
        $this->Sample->AdvancedSearch->SearchOperator2 = @$filter["w_Sample"];
        $this->Sample->AdvancedSearch->save();

        // Field NoD
        $this->NoD->AdvancedSearch->SearchValue = @$filter["x_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator = @$filter["z_NoD"];
        $this->NoD->AdvancedSearch->SearchCondition = @$filter["v_NoD"];
        $this->NoD->AdvancedSearch->SearchValue2 = @$filter["y_NoD"];
        $this->NoD->AdvancedSearch->SearchOperator2 = @$filter["w_NoD"];
        $this->NoD->AdvancedSearch->save();

        // Field BillOrder
        $this->BillOrder->AdvancedSearch->SearchValue = @$filter["x_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator = @$filter["z_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchCondition = @$filter["v_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchValue2 = @$filter["y_BillOrder"];
        $this->BillOrder->AdvancedSearch->SearchOperator2 = @$filter["w_BillOrder"];
        $this->BillOrder->AdvancedSearch->save();

        // Field Formula
        $this->Formula->AdvancedSearch->SearchValue = @$filter["x_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator = @$filter["z_Formula"];
        $this->Formula->AdvancedSearch->SearchCondition = @$filter["v_Formula"];
        $this->Formula->AdvancedSearch->SearchValue2 = @$filter["y_Formula"];
        $this->Formula->AdvancedSearch->SearchOperator2 = @$filter["w_Formula"];
        $this->Formula->AdvancedSearch->save();

        // Field Inactive
        $this->Inactive->AdvancedSearch->SearchValue = @$filter["x_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator = @$filter["z_Inactive"];
        $this->Inactive->AdvancedSearch->SearchCondition = @$filter["v_Inactive"];
        $this->Inactive->AdvancedSearch->SearchValue2 = @$filter["y_Inactive"];
        $this->Inactive->AdvancedSearch->SearchOperator2 = @$filter["w_Inactive"];
        $this->Inactive->AdvancedSearch->save();

        // Field ReagentAmt
        $this->ReagentAmt->AdvancedSearch->SearchValue = @$filter["x_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchOperator = @$filter["z_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchCondition = @$filter["v_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchValue2 = @$filter["y_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ReagentAmt"];
        $this->ReagentAmt->AdvancedSearch->save();

        // Field LabAmt
        $this->LabAmt->AdvancedSearch->SearchValue = @$filter["x_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchOperator = @$filter["z_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchCondition = @$filter["v_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchValue2 = @$filter["y_LabAmt"];
        $this->LabAmt->AdvancedSearch->SearchOperator2 = @$filter["w_LabAmt"];
        $this->LabAmt->AdvancedSearch->save();

        // Field RefAmt
        $this->RefAmt->AdvancedSearch->SearchValue = @$filter["x_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchOperator = @$filter["z_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchCondition = @$filter["v_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchValue2 = @$filter["y_RefAmt"];
        $this->RefAmt->AdvancedSearch->SearchOperator2 = @$filter["w_RefAmt"];
        $this->RefAmt->AdvancedSearch->save();

        // Field CreFrom
        $this->CreFrom->AdvancedSearch->SearchValue = @$filter["x_CreFrom"];
        $this->CreFrom->AdvancedSearch->SearchOperator = @$filter["z_CreFrom"];
        $this->CreFrom->AdvancedSearch->SearchCondition = @$filter["v_CreFrom"];
        $this->CreFrom->AdvancedSearch->SearchValue2 = @$filter["y_CreFrom"];
        $this->CreFrom->AdvancedSearch->SearchOperator2 = @$filter["w_CreFrom"];
        $this->CreFrom->AdvancedSearch->save();

        // Field CreTo
        $this->CreTo->AdvancedSearch->SearchValue = @$filter["x_CreTo"];
        $this->CreTo->AdvancedSearch->SearchOperator = @$filter["z_CreTo"];
        $this->CreTo->AdvancedSearch->SearchCondition = @$filter["v_CreTo"];
        $this->CreTo->AdvancedSearch->SearchValue2 = @$filter["y_CreTo"];
        $this->CreTo->AdvancedSearch->SearchOperator2 = @$filter["w_CreTo"];
        $this->CreTo->AdvancedSearch->save();

        // Field Note
        $this->Note->AdvancedSearch->SearchValue = @$filter["x_Note"];
        $this->Note->AdvancedSearch->SearchOperator = @$filter["z_Note"];
        $this->Note->AdvancedSearch->SearchCondition = @$filter["v_Note"];
        $this->Note->AdvancedSearch->SearchValue2 = @$filter["y_Note"];
        $this->Note->AdvancedSearch->SearchOperator2 = @$filter["w_Note"];
        $this->Note->AdvancedSearch->save();

        // Field Sun
        $this->Sun->AdvancedSearch->SearchValue = @$filter["x_Sun"];
        $this->Sun->AdvancedSearch->SearchOperator = @$filter["z_Sun"];
        $this->Sun->AdvancedSearch->SearchCondition = @$filter["v_Sun"];
        $this->Sun->AdvancedSearch->SearchValue2 = @$filter["y_Sun"];
        $this->Sun->AdvancedSearch->SearchOperator2 = @$filter["w_Sun"];
        $this->Sun->AdvancedSearch->save();

        // Field Mon
        $this->Mon->AdvancedSearch->SearchValue = @$filter["x_Mon"];
        $this->Mon->AdvancedSearch->SearchOperator = @$filter["z_Mon"];
        $this->Mon->AdvancedSearch->SearchCondition = @$filter["v_Mon"];
        $this->Mon->AdvancedSearch->SearchValue2 = @$filter["y_Mon"];
        $this->Mon->AdvancedSearch->SearchOperator2 = @$filter["w_Mon"];
        $this->Mon->AdvancedSearch->save();

        // Field Tue
        $this->Tue->AdvancedSearch->SearchValue = @$filter["x_Tue"];
        $this->Tue->AdvancedSearch->SearchOperator = @$filter["z_Tue"];
        $this->Tue->AdvancedSearch->SearchCondition = @$filter["v_Tue"];
        $this->Tue->AdvancedSearch->SearchValue2 = @$filter["y_Tue"];
        $this->Tue->AdvancedSearch->SearchOperator2 = @$filter["w_Tue"];
        $this->Tue->AdvancedSearch->save();

        // Field Wed
        $this->Wed->AdvancedSearch->SearchValue = @$filter["x_Wed"];
        $this->Wed->AdvancedSearch->SearchOperator = @$filter["z_Wed"];
        $this->Wed->AdvancedSearch->SearchCondition = @$filter["v_Wed"];
        $this->Wed->AdvancedSearch->SearchValue2 = @$filter["y_Wed"];
        $this->Wed->AdvancedSearch->SearchOperator2 = @$filter["w_Wed"];
        $this->Wed->AdvancedSearch->save();

        // Field Thi
        $this->Thi->AdvancedSearch->SearchValue = @$filter["x_Thi"];
        $this->Thi->AdvancedSearch->SearchOperator = @$filter["z_Thi"];
        $this->Thi->AdvancedSearch->SearchCondition = @$filter["v_Thi"];
        $this->Thi->AdvancedSearch->SearchValue2 = @$filter["y_Thi"];
        $this->Thi->AdvancedSearch->SearchOperator2 = @$filter["w_Thi"];
        $this->Thi->AdvancedSearch->save();

        // Field Fri
        $this->Fri->AdvancedSearch->SearchValue = @$filter["x_Fri"];
        $this->Fri->AdvancedSearch->SearchOperator = @$filter["z_Fri"];
        $this->Fri->AdvancedSearch->SearchCondition = @$filter["v_Fri"];
        $this->Fri->AdvancedSearch->SearchValue2 = @$filter["y_Fri"];
        $this->Fri->AdvancedSearch->SearchOperator2 = @$filter["w_Fri"];
        $this->Fri->AdvancedSearch->save();

        // Field Sat
        $this->Sat->AdvancedSearch->SearchValue = @$filter["x_Sat"];
        $this->Sat->AdvancedSearch->SearchOperator = @$filter["z_Sat"];
        $this->Sat->AdvancedSearch->SearchCondition = @$filter["v_Sat"];
        $this->Sat->AdvancedSearch->SearchValue2 = @$filter["y_Sat"];
        $this->Sat->AdvancedSearch->SearchOperator2 = @$filter["w_Sat"];
        $this->Sat->AdvancedSearch->save();

        // Field Days
        $this->Days->AdvancedSearch->SearchValue = @$filter["x_Days"];
        $this->Days->AdvancedSearch->SearchOperator = @$filter["z_Days"];
        $this->Days->AdvancedSearch->SearchCondition = @$filter["v_Days"];
        $this->Days->AdvancedSearch->SearchValue2 = @$filter["y_Days"];
        $this->Days->AdvancedSearch->SearchOperator2 = @$filter["w_Days"];
        $this->Days->AdvancedSearch->save();

        // Field Cutoff
        $this->Cutoff->AdvancedSearch->SearchValue = @$filter["x_Cutoff"];
        $this->Cutoff->AdvancedSearch->SearchOperator = @$filter["z_Cutoff"];
        $this->Cutoff->AdvancedSearch->SearchCondition = @$filter["v_Cutoff"];
        $this->Cutoff->AdvancedSearch->SearchValue2 = @$filter["y_Cutoff"];
        $this->Cutoff->AdvancedSearch->SearchOperator2 = @$filter["w_Cutoff"];
        $this->Cutoff->AdvancedSearch->save();

        // Field FontBold
        $this->FontBold->AdvancedSearch->SearchValue = @$filter["x_FontBold"];
        $this->FontBold->AdvancedSearch->SearchOperator = @$filter["z_FontBold"];
        $this->FontBold->AdvancedSearch->SearchCondition = @$filter["v_FontBold"];
        $this->FontBold->AdvancedSearch->SearchValue2 = @$filter["y_FontBold"];
        $this->FontBold->AdvancedSearch->SearchOperator2 = @$filter["w_FontBold"];
        $this->FontBold->AdvancedSearch->save();

        // Field TestHeading
        $this->TestHeading->AdvancedSearch->SearchValue = @$filter["x_TestHeading"];
        $this->TestHeading->AdvancedSearch->SearchOperator = @$filter["z_TestHeading"];
        $this->TestHeading->AdvancedSearch->SearchCondition = @$filter["v_TestHeading"];
        $this->TestHeading->AdvancedSearch->SearchValue2 = @$filter["y_TestHeading"];
        $this->TestHeading->AdvancedSearch->SearchOperator2 = @$filter["w_TestHeading"];
        $this->TestHeading->AdvancedSearch->save();

        // Field Outsource
        $this->Outsource->AdvancedSearch->SearchValue = @$filter["x_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator = @$filter["z_Outsource"];
        $this->Outsource->AdvancedSearch->SearchCondition = @$filter["v_Outsource"];
        $this->Outsource->AdvancedSearch->SearchValue2 = @$filter["y_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator2 = @$filter["w_Outsource"];
        $this->Outsource->AdvancedSearch->save();

        // Field NoResult
        $this->NoResult->AdvancedSearch->SearchValue = @$filter["x_NoResult"];
        $this->NoResult->AdvancedSearch->SearchOperator = @$filter["z_NoResult"];
        $this->NoResult->AdvancedSearch->SearchCondition = @$filter["v_NoResult"];
        $this->NoResult->AdvancedSearch->SearchValue2 = @$filter["y_NoResult"];
        $this->NoResult->AdvancedSearch->SearchOperator2 = @$filter["w_NoResult"];
        $this->NoResult->AdvancedSearch->save();

        // Field GraphLow
        $this->GraphLow->AdvancedSearch->SearchValue = @$filter["x_GraphLow"];
        $this->GraphLow->AdvancedSearch->SearchOperator = @$filter["z_GraphLow"];
        $this->GraphLow->AdvancedSearch->SearchCondition = @$filter["v_GraphLow"];
        $this->GraphLow->AdvancedSearch->SearchValue2 = @$filter["y_GraphLow"];
        $this->GraphLow->AdvancedSearch->SearchOperator2 = @$filter["w_GraphLow"];
        $this->GraphLow->AdvancedSearch->save();

        // Field GraphHigh
        $this->GraphHigh->AdvancedSearch->SearchValue = @$filter["x_GraphHigh"];
        $this->GraphHigh->AdvancedSearch->SearchOperator = @$filter["z_GraphHigh"];
        $this->GraphHigh->AdvancedSearch->SearchCondition = @$filter["v_GraphHigh"];
        $this->GraphHigh->AdvancedSearch->SearchValue2 = @$filter["y_GraphHigh"];
        $this->GraphHigh->AdvancedSearch->SearchOperator2 = @$filter["w_GraphHigh"];
        $this->GraphHigh->AdvancedSearch->save();

        // Field CollSample
        $this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
        $this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
        $this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
        $this->CollSample->AdvancedSearch->save();

        // Field ProcessTime
        $this->ProcessTime->AdvancedSearch->SearchValue = @$filter["x_ProcessTime"];
        $this->ProcessTime->AdvancedSearch->SearchOperator = @$filter["z_ProcessTime"];
        $this->ProcessTime->AdvancedSearch->SearchCondition = @$filter["v_ProcessTime"];
        $this->ProcessTime->AdvancedSearch->SearchValue2 = @$filter["y_ProcessTime"];
        $this->ProcessTime->AdvancedSearch->SearchOperator2 = @$filter["w_ProcessTime"];
        $this->ProcessTime->AdvancedSearch->save();

        // Field TamilName
        $this->TamilName->AdvancedSearch->SearchValue = @$filter["x_TamilName"];
        $this->TamilName->AdvancedSearch->SearchOperator = @$filter["z_TamilName"];
        $this->TamilName->AdvancedSearch->SearchCondition = @$filter["v_TamilName"];
        $this->TamilName->AdvancedSearch->SearchValue2 = @$filter["y_TamilName"];
        $this->TamilName->AdvancedSearch->SearchOperator2 = @$filter["w_TamilName"];
        $this->TamilName->AdvancedSearch->save();

        // Field ShortName
        $this->ShortName->AdvancedSearch->SearchValue = @$filter["x_ShortName"];
        $this->ShortName->AdvancedSearch->SearchOperator = @$filter["z_ShortName"];
        $this->ShortName->AdvancedSearch->SearchCondition = @$filter["v_ShortName"];
        $this->ShortName->AdvancedSearch->SearchValue2 = @$filter["y_ShortName"];
        $this->ShortName->AdvancedSearch->SearchOperator2 = @$filter["w_ShortName"];
        $this->ShortName->AdvancedSearch->save();

        // Field Individual
        $this->Individual->AdvancedSearch->SearchValue = @$filter["x_Individual"];
        $this->Individual->AdvancedSearch->SearchOperator = @$filter["z_Individual"];
        $this->Individual->AdvancedSearch->SearchCondition = @$filter["v_Individual"];
        $this->Individual->AdvancedSearch->SearchValue2 = @$filter["y_Individual"];
        $this->Individual->AdvancedSearch->SearchOperator2 = @$filter["w_Individual"];
        $this->Individual->AdvancedSearch->save();

        // Field PrevAmt
        $this->PrevAmt->AdvancedSearch->SearchValue = @$filter["x_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchOperator = @$filter["z_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchCondition = @$filter["v_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchValue2 = @$filter["y_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->SearchOperator2 = @$filter["w_PrevAmt"];
        $this->PrevAmt->AdvancedSearch->save();

        // Field PrevSplAmt
        $this->PrevSplAmt->AdvancedSearch->SearchValue = @$filter["x_PrevSplAmt"];
        $this->PrevSplAmt->AdvancedSearch->SearchOperator = @$filter["z_PrevSplAmt"];
        $this->PrevSplAmt->AdvancedSearch->SearchCondition = @$filter["v_PrevSplAmt"];
        $this->PrevSplAmt->AdvancedSearch->SearchValue2 = @$filter["y_PrevSplAmt"];
        $this->PrevSplAmt->AdvancedSearch->SearchOperator2 = @$filter["w_PrevSplAmt"];
        $this->PrevSplAmt->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field EditDate
        $this->EditDate->AdvancedSearch->SearchValue = @$filter["x_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator = @$filter["z_EditDate"];
        $this->EditDate->AdvancedSearch->SearchCondition = @$filter["v_EditDate"];
        $this->EditDate->AdvancedSearch->SearchValue2 = @$filter["y_EditDate"];
        $this->EditDate->AdvancedSearch->SearchOperator2 = @$filter["w_EditDate"];
        $this->EditDate->AdvancedSearch->save();

        // Field BillName
        $this->BillName->AdvancedSearch->SearchValue = @$filter["x_BillName"];
        $this->BillName->AdvancedSearch->SearchOperator = @$filter["z_BillName"];
        $this->BillName->AdvancedSearch->SearchCondition = @$filter["v_BillName"];
        $this->BillName->AdvancedSearch->SearchValue2 = @$filter["y_BillName"];
        $this->BillName->AdvancedSearch->SearchOperator2 = @$filter["w_BillName"];
        $this->BillName->AdvancedSearch->save();

        // Field ActualAmt
        $this->ActualAmt->AdvancedSearch->SearchValue = @$filter["x_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator = @$filter["z_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchCondition = @$filter["v_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchValue2 = @$filter["y_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->save();

        // Field HISCD
        $this->HISCD->AdvancedSearch->SearchValue = @$filter["x_HISCD"];
        $this->HISCD->AdvancedSearch->SearchOperator = @$filter["z_HISCD"];
        $this->HISCD->AdvancedSearch->SearchCondition = @$filter["v_HISCD"];
        $this->HISCD->AdvancedSearch->SearchValue2 = @$filter["y_HISCD"];
        $this->HISCD->AdvancedSearch->SearchOperator2 = @$filter["w_HISCD"];
        $this->HISCD->AdvancedSearch->save();

        // Field PriceList
        $this->PriceList->AdvancedSearch->SearchValue = @$filter["x_PriceList"];
        $this->PriceList->AdvancedSearch->SearchOperator = @$filter["z_PriceList"];
        $this->PriceList->AdvancedSearch->SearchCondition = @$filter["v_PriceList"];
        $this->PriceList->AdvancedSearch->SearchValue2 = @$filter["y_PriceList"];
        $this->PriceList->AdvancedSearch->SearchOperator2 = @$filter["w_PriceList"];
        $this->PriceList->AdvancedSearch->save();

        // Field IPAmt
        $this->IPAmt->AdvancedSearch->SearchValue = @$filter["x_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchOperator = @$filter["z_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchCondition = @$filter["v_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchValue2 = @$filter["y_IPAmt"];
        $this->IPAmt->AdvancedSearch->SearchOperator2 = @$filter["w_IPAmt"];
        $this->IPAmt->AdvancedSearch->save();

        // Field InsAmt
        $this->InsAmt->AdvancedSearch->SearchValue = @$filter["x_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchOperator = @$filter["z_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchCondition = @$filter["v_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchValue2 = @$filter["y_InsAmt"];
        $this->InsAmt->AdvancedSearch->SearchOperator2 = @$filter["w_InsAmt"];
        $this->InsAmt->AdvancedSearch->save();

        // Field ManualCD
        $this->ManualCD->AdvancedSearch->SearchValue = @$filter["x_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchOperator = @$filter["z_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchCondition = @$filter["v_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchValue2 = @$filter["y_ManualCD"];
        $this->ManualCD->AdvancedSearch->SearchOperator2 = @$filter["w_ManualCD"];
        $this->ManualCD->AdvancedSearch->save();

        // Field Free
        $this->Free->AdvancedSearch->SearchValue = @$filter["x_Free"];
        $this->Free->AdvancedSearch->SearchOperator = @$filter["z_Free"];
        $this->Free->AdvancedSearch->SearchCondition = @$filter["v_Free"];
        $this->Free->AdvancedSearch->SearchValue2 = @$filter["y_Free"];
        $this->Free->AdvancedSearch->SearchOperator2 = @$filter["w_Free"];
        $this->Free->AdvancedSearch->save();

        // Field AutoAuth
        $this->AutoAuth->AdvancedSearch->SearchValue = @$filter["x_AutoAuth"];
        $this->AutoAuth->AdvancedSearch->SearchOperator = @$filter["z_AutoAuth"];
        $this->AutoAuth->AdvancedSearch->SearchCondition = @$filter["v_AutoAuth"];
        $this->AutoAuth->AdvancedSearch->SearchValue2 = @$filter["y_AutoAuth"];
        $this->AutoAuth->AdvancedSearch->SearchOperator2 = @$filter["w_AutoAuth"];
        $this->AutoAuth->AdvancedSearch->save();

        // Field ProductCD
        $this->ProductCD->AdvancedSearch->SearchValue = @$filter["x_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchOperator = @$filter["z_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchCondition = @$filter["v_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchValue2 = @$filter["y_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCD"];
        $this->ProductCD->AdvancedSearch->save();

        // Field Inventory
        $this->Inventory->AdvancedSearch->SearchValue = @$filter["x_Inventory"];
        $this->Inventory->AdvancedSearch->SearchOperator = @$filter["z_Inventory"];
        $this->Inventory->AdvancedSearch->SearchCondition = @$filter["v_Inventory"];
        $this->Inventory->AdvancedSearch->SearchValue2 = @$filter["y_Inventory"];
        $this->Inventory->AdvancedSearch->SearchOperator2 = @$filter["w_Inventory"];
        $this->Inventory->AdvancedSearch->save();

        // Field IntimateTest
        $this->IntimateTest->AdvancedSearch->SearchValue = @$filter["x_IntimateTest"];
        $this->IntimateTest->AdvancedSearch->SearchOperator = @$filter["z_IntimateTest"];
        $this->IntimateTest->AdvancedSearch->SearchCondition = @$filter["v_IntimateTest"];
        $this->IntimateTest->AdvancedSearch->SearchValue2 = @$filter["y_IntimateTest"];
        $this->IntimateTest->AdvancedSearch->SearchOperator2 = @$filter["w_IntimateTest"];
        $this->IntimateTest->AdvancedSearch->save();

        // Field Manual
        $this->Manual->AdvancedSearch->SearchValue = @$filter["x_Manual"];
        $this->Manual->AdvancedSearch->SearchOperator = @$filter["z_Manual"];
        $this->Manual->AdvancedSearch->SearchCondition = @$filter["v_Manual"];
        $this->Manual->AdvancedSearch->SearchValue2 = @$filter["y_Manual"];
        $this->Manual->AdvancedSearch->SearchOperator2 = @$filter["w_Manual"];
        $this->Manual->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->MainDeptCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->XrayPart, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UnitCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Note, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sun, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mon, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Wed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Thi, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fri, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sat, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Cutoff, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FontBold, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestHeading, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Outsource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoResult, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcessTime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TamilName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ShortName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Individual, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BillName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HISCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PriceList, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ManualCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Free, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AutoAuth, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProductCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inventory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IntimateTest, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Manual, $arKeywords, $type);
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
            $this->updateSort($this->MainDeptCd); // MainDeptCd
            $this->updateSort($this->DeptCd); // DeptCd
            $this->updateSort($this->TestCd); // TestCd
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->TestName); // TestName
            $this->updateSort($this->XrayPart); // XrayPart
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Order); // Order
            $this->updateSort($this->Form); // Form
            $this->updateSort($this->Amt); // Amt
            $this->updateSort($this->SplAmt); // SplAmt
            $this->updateSort($this->ResType); // ResType
            $this->updateSort($this->UnitCD); // UnitCD
            $this->updateSort($this->Sample); // Sample
            $this->updateSort($this->NoD); // NoD
            $this->updateSort($this->BillOrder); // BillOrder
            $this->updateSort($this->Inactive); // Inactive
            $this->updateSort($this->ReagentAmt); // ReagentAmt
            $this->updateSort($this->LabAmt); // LabAmt
            $this->updateSort($this->RefAmt); // RefAmt
            $this->updateSort($this->CreFrom); // CreFrom
            $this->updateSort($this->CreTo); // CreTo
            $this->updateSort($this->Sun); // Sun
            $this->updateSort($this->Mon); // Mon
            $this->updateSort($this->Tue); // Tue
            $this->updateSort($this->Wed); // Wed
            $this->updateSort($this->Thi); // Thi
            $this->updateSort($this->Fri); // Fri
            $this->updateSort($this->Sat); // Sat
            $this->updateSort($this->Days); // Days
            $this->updateSort($this->Cutoff); // Cutoff
            $this->updateSort($this->FontBold); // FontBold
            $this->updateSort($this->TestHeading); // TestHeading
            $this->updateSort($this->Outsource); // Outsource
            $this->updateSort($this->NoResult); // NoResult
            $this->updateSort($this->GraphLow); // GraphLow
            $this->updateSort($this->GraphHigh); // GraphHigh
            $this->updateSort($this->CollSample); // CollSample
            $this->updateSort($this->ProcessTime); // ProcessTime
            $this->updateSort($this->TamilName); // TamilName
            $this->updateSort($this->ShortName); // ShortName
            $this->updateSort($this->Individual); // Individual
            $this->updateSort($this->PrevAmt); // PrevAmt
            $this->updateSort($this->PrevSplAmt); // PrevSplAmt
            $this->updateSort($this->EditDate); // EditDate
            $this->updateSort($this->BillName); // BillName
            $this->updateSort($this->ActualAmt); // ActualAmt
            $this->updateSort($this->HISCD); // HISCD
            $this->updateSort($this->PriceList); // PriceList
            $this->updateSort($this->IPAmt); // IPAmt
            $this->updateSort($this->InsAmt); // InsAmt
            $this->updateSort($this->ManualCD); // ManualCD
            $this->updateSort($this->Free); // Free
            $this->updateSort($this->AutoAuth); // AutoAuth
            $this->updateSort($this->ProductCD); // ProductCD
            $this->updateSort($this->Inventory); // Inventory
            $this->updateSort($this->IntimateTest); // IntimateTest
            $this->updateSort($this->Manual); // Manual
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
                $this->MainDeptCd->setSort("");
                $this->DeptCd->setSort("");
                $this->TestCd->setSort("");
                $this->TestSubCd->setSort("");
                $this->TestName->setSort("");
                $this->XrayPart->setSort("");
                $this->Method->setSort("");
                $this->Order->setSort("");
                $this->Form->setSort("");
                $this->Amt->setSort("");
                $this->SplAmt->setSort("");
                $this->ResType->setSort("");
                $this->UnitCD->setSort("");
                $this->RefValue->setSort("");
                $this->Sample->setSort("");
                $this->NoD->setSort("");
                $this->BillOrder->setSort("");
                $this->Formula->setSort("");
                $this->Inactive->setSort("");
                $this->ReagentAmt->setSort("");
                $this->LabAmt->setSort("");
                $this->RefAmt->setSort("");
                $this->CreFrom->setSort("");
                $this->CreTo->setSort("");
                $this->Note->setSort("");
                $this->Sun->setSort("");
                $this->Mon->setSort("");
                $this->Tue->setSort("");
                $this->Wed->setSort("");
                $this->Thi->setSort("");
                $this->Fri->setSort("");
                $this->Sat->setSort("");
                $this->Days->setSort("");
                $this->Cutoff->setSort("");
                $this->FontBold->setSort("");
                $this->TestHeading->setSort("");
                $this->Outsource->setSort("");
                $this->NoResult->setSort("");
                $this->GraphLow->setSort("");
                $this->GraphHigh->setSort("");
                $this->CollSample->setSort("");
                $this->ProcessTime->setSort("");
                $this->TamilName->setSort("");
                $this->ShortName->setSort("");
                $this->Individual->setSort("");
                $this->PrevAmt->setSort("");
                $this->PrevSplAmt->setSort("");
                $this->Remarks->setSort("");
                $this->EditDate->setSort("");
                $this->BillName->setSort("");
                $this->ActualAmt->setSort("");
                $this->HISCD->setSort("");
                $this->PriceList->setSort("");
                $this->IPAmt->setSort("");
                $this->InsAmt->setSort("");
                $this->ManualCD->setSort("");
                $this->Free->setSort("");
                $this->AutoAuth->setSort("");
                $this->ProductCD->setSort("");
                $this->Inventory->setSort("");
                $this->IntimateTest->setSort("");
                $this->Manual->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"flab_test_masterlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"flab_test_masterlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.flab_test_masterlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->MainDeptCd->setDbValue($row['MainDeptCd']);
        $this->DeptCd->setDbValue($row['DeptCd']);
        $this->TestCd->setDbValue($row['TestCd']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->TestName->setDbValue($row['TestName']);
        $this->XrayPart->setDbValue($row['XrayPart']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->Amt->setDbValue($row['Amt']);
        $this->SplAmt->setDbValue($row['SplAmt']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->ReagentAmt->setDbValue($row['ReagentAmt']);
        $this->LabAmt->setDbValue($row['LabAmt']);
        $this->RefAmt->setDbValue($row['RefAmt']);
        $this->CreFrom->setDbValue($row['CreFrom']);
        $this->CreTo->setDbValue($row['CreTo']);
        $this->Note->setDbValue($row['Note']);
        $this->Sun->setDbValue($row['Sun']);
        $this->Mon->setDbValue($row['Mon']);
        $this->Tue->setDbValue($row['Tue']);
        $this->Wed->setDbValue($row['Wed']);
        $this->Thi->setDbValue($row['Thi']);
        $this->Fri->setDbValue($row['Fri']);
        $this->Sat->setDbValue($row['Sat']);
        $this->Days->setDbValue($row['Days']);
        $this->Cutoff->setDbValue($row['Cutoff']);
        $this->FontBold->setDbValue($row['FontBold']);
        $this->TestHeading->setDbValue($row['TestHeading']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->NoResult->setDbValue($row['NoResult']);
        $this->GraphLow->setDbValue($row['GraphLow']);
        $this->GraphHigh->setDbValue($row['GraphHigh']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->ProcessTime->setDbValue($row['ProcessTime']);
        $this->TamilName->setDbValue($row['TamilName']);
        $this->ShortName->setDbValue($row['ShortName']);
        $this->Individual->setDbValue($row['Individual']);
        $this->PrevAmt->setDbValue($row['PrevAmt']);
        $this->PrevSplAmt->setDbValue($row['PrevSplAmt']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->BillName->setDbValue($row['BillName']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->HISCD->setDbValue($row['HISCD']);
        $this->PriceList->setDbValue($row['PriceList']);
        $this->IPAmt->setDbValue($row['IPAmt']);
        $this->InsAmt->setDbValue($row['InsAmt']);
        $this->ManualCD->setDbValue($row['ManualCD']);
        $this->Free->setDbValue($row['Free']);
        $this->AutoAuth->setDbValue($row['AutoAuth']);
        $this->ProductCD->setDbValue($row['ProductCD']);
        $this->Inventory->setDbValue($row['Inventory']);
        $this->IntimateTest->setDbValue($row['IntimateTest']);
        $this->Manual->setDbValue($row['Manual']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['MainDeptCd'] = null;
        $row['DeptCd'] = null;
        $row['TestCd'] = null;
        $row['TestSubCd'] = null;
        $row['TestName'] = null;
        $row['XrayPart'] = null;
        $row['Method'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['Amt'] = null;
        $row['SplAmt'] = null;
        $row['ResType'] = null;
        $row['UnitCD'] = null;
        $row['RefValue'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['ReagentAmt'] = null;
        $row['LabAmt'] = null;
        $row['RefAmt'] = null;
        $row['CreFrom'] = null;
        $row['CreTo'] = null;
        $row['Note'] = null;
        $row['Sun'] = null;
        $row['Mon'] = null;
        $row['Tue'] = null;
        $row['Wed'] = null;
        $row['Thi'] = null;
        $row['Fri'] = null;
        $row['Sat'] = null;
        $row['Days'] = null;
        $row['Cutoff'] = null;
        $row['FontBold'] = null;
        $row['TestHeading'] = null;
        $row['Outsource'] = null;
        $row['NoResult'] = null;
        $row['GraphLow'] = null;
        $row['GraphHigh'] = null;
        $row['CollSample'] = null;
        $row['ProcessTime'] = null;
        $row['TamilName'] = null;
        $row['ShortName'] = null;
        $row['Individual'] = null;
        $row['PrevAmt'] = null;
        $row['PrevSplAmt'] = null;
        $row['Remarks'] = null;
        $row['EditDate'] = null;
        $row['BillName'] = null;
        $row['ActualAmt'] = null;
        $row['HISCD'] = null;
        $row['PriceList'] = null;
        $row['IPAmt'] = null;
        $row['InsAmt'] = null;
        $row['ManualCD'] = null;
        $row['Free'] = null;
        $row['AutoAuth'] = null;
        $row['ProductCD'] = null;
        $row['Inventory'] = null;
        $row['IntimateTest'] = null;
        $row['Manual'] = null;
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
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Amt->FormValue == $this->Amt->CurrentValue && is_numeric(ConvertToFloatString($this->Amt->CurrentValue))) {
            $this->Amt->CurrentValue = ConvertToFloatString($this->Amt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SplAmt->FormValue == $this->SplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->SplAmt->CurrentValue))) {
            $this->SplAmt->CurrentValue = ConvertToFloatString($this->SplAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ReagentAmt->FormValue == $this->ReagentAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ReagentAmt->CurrentValue))) {
            $this->ReagentAmt->CurrentValue = ConvertToFloatString($this->ReagentAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LabAmt->FormValue == $this->LabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->LabAmt->CurrentValue))) {
            $this->LabAmt->CurrentValue = ConvertToFloatString($this->LabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RefAmt->FormValue == $this->RefAmt->CurrentValue && is_numeric(ConvertToFloatString($this->RefAmt->CurrentValue))) {
            $this->RefAmt->CurrentValue = ConvertToFloatString($this->RefAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CreFrom->FormValue == $this->CreFrom->CurrentValue && is_numeric(ConvertToFloatString($this->CreFrom->CurrentValue))) {
            $this->CreFrom->CurrentValue = ConvertToFloatString($this->CreFrom->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CreTo->FormValue == $this->CreTo->CurrentValue && is_numeric(ConvertToFloatString($this->CreTo->CurrentValue))) {
            $this->CreTo->CurrentValue = ConvertToFloatString($this->CreTo->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Days->FormValue == $this->Days->CurrentValue && is_numeric(ConvertToFloatString($this->Days->CurrentValue))) {
            $this->Days->CurrentValue = ConvertToFloatString($this->Days->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GraphLow->FormValue == $this->GraphLow->CurrentValue && is_numeric(ConvertToFloatString($this->GraphLow->CurrentValue))) {
            $this->GraphLow->CurrentValue = ConvertToFloatString($this->GraphLow->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->GraphHigh->FormValue == $this->GraphHigh->CurrentValue && is_numeric(ConvertToFloatString($this->GraphHigh->CurrentValue))) {
            $this->GraphHigh->CurrentValue = ConvertToFloatString($this->GraphHigh->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevAmt->FormValue == $this->PrevAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevAmt->CurrentValue))) {
            $this->PrevAmt->CurrentValue = ConvertToFloatString($this->PrevAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PrevSplAmt->FormValue == $this->PrevSplAmt->CurrentValue && is_numeric(ConvertToFloatString($this->PrevSplAmt->CurrentValue))) {
            $this->PrevSplAmt->CurrentValue = ConvertToFloatString($this->PrevSplAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IPAmt->FormValue == $this->IPAmt->CurrentValue && is_numeric(ConvertToFloatString($this->IPAmt->CurrentValue))) {
            $this->IPAmt->CurrentValue = ConvertToFloatString($this->IPAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->InsAmt->FormValue == $this->InsAmt->CurrentValue && is_numeric(ConvertToFloatString($this->InsAmt->CurrentValue))) {
            $this->InsAmt->CurrentValue = ConvertToFloatString($this->InsAmt->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // MainDeptCd

        // DeptCd

        // TestCd

        // TestSubCd

        // TestName

        // XrayPart

        // Method

        // Order

        // Form

        // Amt

        // SplAmt

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // ReagentAmt

        // LabAmt

        // RefAmt

        // CreFrom

        // CreTo

        // Note

        // Sun

        // Mon

        // Tue

        // Wed

        // Thi

        // Fri

        // Sat

        // Days

        // Cutoff

        // FontBold

        // TestHeading

        // Outsource

        // NoResult

        // GraphLow

        // GraphHigh

        // CollSample

        // ProcessTime

        // TamilName

        // ShortName

        // Individual

        // PrevAmt

        // PrevSplAmt

        // Remarks

        // EditDate

        // BillName

        // ActualAmt

        // HISCD

        // PriceList

        // IPAmt

        // InsAmt

        // ManualCD

        // Free

        // AutoAuth

        // ProductCD

        // Inventory

        // IntimateTest

        // Manual
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // MainDeptCd
            $this->MainDeptCd->ViewValue = $this->MainDeptCd->CurrentValue;
            $this->MainDeptCd->ViewCustomAttributes = "";

            // DeptCd
            $this->DeptCd->ViewValue = $this->DeptCd->CurrentValue;
            $this->DeptCd->ViewCustomAttributes = "";

            // TestCd
            $this->TestCd->ViewValue = $this->TestCd->CurrentValue;
            $this->TestCd->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // TestName
            $this->TestName->ViewValue = $this->TestName->CurrentValue;
            $this->TestName->ViewCustomAttributes = "";

            // XrayPart
            $this->XrayPart->ViewValue = $this->XrayPart->CurrentValue;
            $this->XrayPart->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // Amt
            $this->Amt->ViewValue = $this->Amt->CurrentValue;
            $this->Amt->ViewValue = FormatNumber($this->Amt->ViewValue, 2, -2, -2, -2);
            $this->Amt->ViewCustomAttributes = "";

            // SplAmt
            $this->SplAmt->ViewValue = $this->SplAmt->CurrentValue;
            $this->SplAmt->ViewValue = FormatNumber($this->SplAmt->ViewValue, 2, -2, -2, -2);
            $this->SplAmt->ViewCustomAttributes = "";

            // ResType
            $this->ResType->ViewValue = $this->ResType->CurrentValue;
            $this->ResType->ViewCustomAttributes = "";

            // UnitCD
            $this->UnitCD->ViewValue = $this->UnitCD->CurrentValue;
            $this->UnitCD->ViewCustomAttributes = "";

            // Sample
            $this->Sample->ViewValue = $this->Sample->CurrentValue;
            $this->Sample->ViewCustomAttributes = "";

            // NoD
            $this->NoD->ViewValue = $this->NoD->CurrentValue;
            $this->NoD->ViewValue = FormatNumber($this->NoD->ViewValue, 2, -2, -2, -2);
            $this->NoD->ViewCustomAttributes = "";

            // BillOrder
            $this->BillOrder->ViewValue = $this->BillOrder->CurrentValue;
            $this->BillOrder->ViewValue = FormatNumber($this->BillOrder->ViewValue, 2, -2, -2, -2);
            $this->BillOrder->ViewCustomAttributes = "";

            // Inactive
            $this->Inactive->ViewValue = $this->Inactive->CurrentValue;
            $this->Inactive->ViewCustomAttributes = "";

            // ReagentAmt
            $this->ReagentAmt->ViewValue = $this->ReagentAmt->CurrentValue;
            $this->ReagentAmt->ViewValue = FormatNumber($this->ReagentAmt->ViewValue, 2, -2, -2, -2);
            $this->ReagentAmt->ViewCustomAttributes = "";

            // LabAmt
            $this->LabAmt->ViewValue = $this->LabAmt->CurrentValue;
            $this->LabAmt->ViewValue = FormatNumber($this->LabAmt->ViewValue, 2, -2, -2, -2);
            $this->LabAmt->ViewCustomAttributes = "";

            // RefAmt
            $this->RefAmt->ViewValue = $this->RefAmt->CurrentValue;
            $this->RefAmt->ViewValue = FormatNumber($this->RefAmt->ViewValue, 2, -2, -2, -2);
            $this->RefAmt->ViewCustomAttributes = "";

            // CreFrom
            $this->CreFrom->ViewValue = $this->CreFrom->CurrentValue;
            $this->CreFrom->ViewValue = FormatNumber($this->CreFrom->ViewValue, 2, -2, -2, -2);
            $this->CreFrom->ViewCustomAttributes = "";

            // CreTo
            $this->CreTo->ViewValue = $this->CreTo->CurrentValue;
            $this->CreTo->ViewValue = FormatNumber($this->CreTo->ViewValue, 2, -2, -2, -2);
            $this->CreTo->ViewCustomAttributes = "";

            // Sun
            $this->Sun->ViewValue = $this->Sun->CurrentValue;
            $this->Sun->ViewCustomAttributes = "";

            // Mon
            $this->Mon->ViewValue = $this->Mon->CurrentValue;
            $this->Mon->ViewCustomAttributes = "";

            // Tue
            $this->Tue->ViewValue = $this->Tue->CurrentValue;
            $this->Tue->ViewCustomAttributes = "";

            // Wed
            $this->Wed->ViewValue = $this->Wed->CurrentValue;
            $this->Wed->ViewCustomAttributes = "";

            // Thi
            $this->Thi->ViewValue = $this->Thi->CurrentValue;
            $this->Thi->ViewCustomAttributes = "";

            // Fri
            $this->Fri->ViewValue = $this->Fri->CurrentValue;
            $this->Fri->ViewCustomAttributes = "";

            // Sat
            $this->Sat->ViewValue = $this->Sat->CurrentValue;
            $this->Sat->ViewCustomAttributes = "";

            // Days
            $this->Days->ViewValue = $this->Days->CurrentValue;
            $this->Days->ViewValue = FormatNumber($this->Days->ViewValue, 2, -2, -2, -2);
            $this->Days->ViewCustomAttributes = "";

            // Cutoff
            $this->Cutoff->ViewValue = $this->Cutoff->CurrentValue;
            $this->Cutoff->ViewCustomAttributes = "";

            // FontBold
            $this->FontBold->ViewValue = $this->FontBold->CurrentValue;
            $this->FontBold->ViewCustomAttributes = "";

            // TestHeading
            $this->TestHeading->ViewValue = $this->TestHeading->CurrentValue;
            $this->TestHeading->ViewCustomAttributes = "";

            // Outsource
            $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
            $this->Outsource->ViewCustomAttributes = "";

            // NoResult
            $this->NoResult->ViewValue = $this->NoResult->CurrentValue;
            $this->NoResult->ViewCustomAttributes = "";

            // GraphLow
            $this->GraphLow->ViewValue = $this->GraphLow->CurrentValue;
            $this->GraphLow->ViewValue = FormatNumber($this->GraphLow->ViewValue, 2, -2, -2, -2);
            $this->GraphLow->ViewCustomAttributes = "";

            // GraphHigh
            $this->GraphHigh->ViewValue = $this->GraphHigh->CurrentValue;
            $this->GraphHigh->ViewValue = FormatNumber($this->GraphHigh->ViewValue, 2, -2, -2, -2);
            $this->GraphHigh->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // ProcessTime
            $this->ProcessTime->ViewValue = $this->ProcessTime->CurrentValue;
            $this->ProcessTime->ViewCustomAttributes = "";

            // TamilName
            $this->TamilName->ViewValue = $this->TamilName->CurrentValue;
            $this->TamilName->ViewCustomAttributes = "";

            // ShortName
            $this->ShortName->ViewValue = $this->ShortName->CurrentValue;
            $this->ShortName->ViewCustomAttributes = "";

            // Individual
            $this->Individual->ViewValue = $this->Individual->CurrentValue;
            $this->Individual->ViewCustomAttributes = "";

            // PrevAmt
            $this->PrevAmt->ViewValue = $this->PrevAmt->CurrentValue;
            $this->PrevAmt->ViewValue = FormatNumber($this->PrevAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevAmt->ViewCustomAttributes = "";

            // PrevSplAmt
            $this->PrevSplAmt->ViewValue = $this->PrevSplAmt->CurrentValue;
            $this->PrevSplAmt->ViewValue = FormatNumber($this->PrevSplAmt->ViewValue, 2, -2, -2, -2);
            $this->PrevSplAmt->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // BillName
            $this->BillName->ViewValue = $this->BillName->CurrentValue;
            $this->BillName->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // HISCD
            $this->HISCD->ViewValue = $this->HISCD->CurrentValue;
            $this->HISCD->ViewCustomAttributes = "";

            // PriceList
            $this->PriceList->ViewValue = $this->PriceList->CurrentValue;
            $this->PriceList->ViewCustomAttributes = "";

            // IPAmt
            $this->IPAmt->ViewValue = $this->IPAmt->CurrentValue;
            $this->IPAmt->ViewValue = FormatNumber($this->IPAmt->ViewValue, 2, -2, -2, -2);
            $this->IPAmt->ViewCustomAttributes = "";

            // InsAmt
            $this->InsAmt->ViewValue = $this->InsAmt->CurrentValue;
            $this->InsAmt->ViewValue = FormatNumber($this->InsAmt->ViewValue, 2, -2, -2, -2);
            $this->InsAmt->ViewCustomAttributes = "";

            // ManualCD
            $this->ManualCD->ViewValue = $this->ManualCD->CurrentValue;
            $this->ManualCD->ViewCustomAttributes = "";

            // Free
            $this->Free->ViewValue = $this->Free->CurrentValue;
            $this->Free->ViewCustomAttributes = "";

            // AutoAuth
            $this->AutoAuth->ViewValue = $this->AutoAuth->CurrentValue;
            $this->AutoAuth->ViewCustomAttributes = "";

            // ProductCD
            $this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
            $this->ProductCD->ViewCustomAttributes = "";

            // Inventory
            $this->Inventory->ViewValue = $this->Inventory->CurrentValue;
            $this->Inventory->ViewCustomAttributes = "";

            // IntimateTest
            $this->IntimateTest->ViewValue = $this->IntimateTest->CurrentValue;
            $this->IntimateTest->ViewCustomAttributes = "";

            // Manual
            $this->Manual->ViewValue = $this->Manual->CurrentValue;
            $this->Manual->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // MainDeptCd
            $this->MainDeptCd->LinkCustomAttributes = "";
            $this->MainDeptCd->HrefValue = "";
            $this->MainDeptCd->TooltipValue = "";

            // DeptCd
            $this->DeptCd->LinkCustomAttributes = "";
            $this->DeptCd->HrefValue = "";
            $this->DeptCd->TooltipValue = "";

            // TestCd
            $this->TestCd->LinkCustomAttributes = "";
            $this->TestCd->HrefValue = "";
            $this->TestCd->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // TestName
            $this->TestName->LinkCustomAttributes = "";
            $this->TestName->HrefValue = "";
            $this->TestName->TooltipValue = "";

            // XrayPart
            $this->XrayPart->LinkCustomAttributes = "";
            $this->XrayPart->HrefValue = "";
            $this->XrayPart->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Amt
            $this->Amt->LinkCustomAttributes = "";
            $this->Amt->HrefValue = "";
            $this->Amt->TooltipValue = "";

            // SplAmt
            $this->SplAmt->LinkCustomAttributes = "";
            $this->SplAmt->HrefValue = "";
            $this->SplAmt->TooltipValue = "";

            // ResType
            $this->ResType->LinkCustomAttributes = "";
            $this->ResType->HrefValue = "";
            $this->ResType->TooltipValue = "";

            // UnitCD
            $this->UnitCD->LinkCustomAttributes = "";
            $this->UnitCD->HrefValue = "";
            $this->UnitCD->TooltipValue = "";

            // Sample
            $this->Sample->LinkCustomAttributes = "";
            $this->Sample->HrefValue = "";
            $this->Sample->TooltipValue = "";

            // NoD
            $this->NoD->LinkCustomAttributes = "";
            $this->NoD->HrefValue = "";
            $this->NoD->TooltipValue = "";

            // BillOrder
            $this->BillOrder->LinkCustomAttributes = "";
            $this->BillOrder->HrefValue = "";
            $this->BillOrder->TooltipValue = "";

            // Inactive
            $this->Inactive->LinkCustomAttributes = "";
            $this->Inactive->HrefValue = "";
            $this->Inactive->TooltipValue = "";

            // ReagentAmt
            $this->ReagentAmt->LinkCustomAttributes = "";
            $this->ReagentAmt->HrefValue = "";
            $this->ReagentAmt->TooltipValue = "";

            // LabAmt
            $this->LabAmt->LinkCustomAttributes = "";
            $this->LabAmt->HrefValue = "";
            $this->LabAmt->TooltipValue = "";

            // RefAmt
            $this->RefAmt->LinkCustomAttributes = "";
            $this->RefAmt->HrefValue = "";
            $this->RefAmt->TooltipValue = "";

            // CreFrom
            $this->CreFrom->LinkCustomAttributes = "";
            $this->CreFrom->HrefValue = "";
            $this->CreFrom->TooltipValue = "";

            // CreTo
            $this->CreTo->LinkCustomAttributes = "";
            $this->CreTo->HrefValue = "";
            $this->CreTo->TooltipValue = "";

            // Sun
            $this->Sun->LinkCustomAttributes = "";
            $this->Sun->HrefValue = "";
            $this->Sun->TooltipValue = "";

            // Mon
            $this->Mon->LinkCustomAttributes = "";
            $this->Mon->HrefValue = "";
            $this->Mon->TooltipValue = "";

            // Tue
            $this->Tue->LinkCustomAttributes = "";
            $this->Tue->HrefValue = "";
            $this->Tue->TooltipValue = "";

            // Wed
            $this->Wed->LinkCustomAttributes = "";
            $this->Wed->HrefValue = "";
            $this->Wed->TooltipValue = "";

            // Thi
            $this->Thi->LinkCustomAttributes = "";
            $this->Thi->HrefValue = "";
            $this->Thi->TooltipValue = "";

            // Fri
            $this->Fri->LinkCustomAttributes = "";
            $this->Fri->HrefValue = "";
            $this->Fri->TooltipValue = "";

            // Sat
            $this->Sat->LinkCustomAttributes = "";
            $this->Sat->HrefValue = "";
            $this->Sat->TooltipValue = "";

            // Days
            $this->Days->LinkCustomAttributes = "";
            $this->Days->HrefValue = "";
            $this->Days->TooltipValue = "";

            // Cutoff
            $this->Cutoff->LinkCustomAttributes = "";
            $this->Cutoff->HrefValue = "";
            $this->Cutoff->TooltipValue = "";

            // FontBold
            $this->FontBold->LinkCustomAttributes = "";
            $this->FontBold->HrefValue = "";
            $this->FontBold->TooltipValue = "";

            // TestHeading
            $this->TestHeading->LinkCustomAttributes = "";
            $this->TestHeading->HrefValue = "";
            $this->TestHeading->TooltipValue = "";

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";
            $this->Outsource->TooltipValue = "";

            // NoResult
            $this->NoResult->LinkCustomAttributes = "";
            $this->NoResult->HrefValue = "";
            $this->NoResult->TooltipValue = "";

            // GraphLow
            $this->GraphLow->LinkCustomAttributes = "";
            $this->GraphLow->HrefValue = "";
            $this->GraphLow->TooltipValue = "";

            // GraphHigh
            $this->GraphHigh->LinkCustomAttributes = "";
            $this->GraphHigh->HrefValue = "";
            $this->GraphHigh->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // ProcessTime
            $this->ProcessTime->LinkCustomAttributes = "";
            $this->ProcessTime->HrefValue = "";
            $this->ProcessTime->TooltipValue = "";

            // TamilName
            $this->TamilName->LinkCustomAttributes = "";
            $this->TamilName->HrefValue = "";
            $this->TamilName->TooltipValue = "";

            // ShortName
            $this->ShortName->LinkCustomAttributes = "";
            $this->ShortName->HrefValue = "";
            $this->ShortName->TooltipValue = "";

            // Individual
            $this->Individual->LinkCustomAttributes = "";
            $this->Individual->HrefValue = "";
            $this->Individual->TooltipValue = "";

            // PrevAmt
            $this->PrevAmt->LinkCustomAttributes = "";
            $this->PrevAmt->HrefValue = "";
            $this->PrevAmt->TooltipValue = "";

            // PrevSplAmt
            $this->PrevSplAmt->LinkCustomAttributes = "";
            $this->PrevSplAmt->HrefValue = "";
            $this->PrevSplAmt->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // BillName
            $this->BillName->LinkCustomAttributes = "";
            $this->BillName->HrefValue = "";
            $this->BillName->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // HISCD
            $this->HISCD->LinkCustomAttributes = "";
            $this->HISCD->HrefValue = "";
            $this->HISCD->TooltipValue = "";

            // PriceList
            $this->PriceList->LinkCustomAttributes = "";
            $this->PriceList->HrefValue = "";
            $this->PriceList->TooltipValue = "";

            // IPAmt
            $this->IPAmt->LinkCustomAttributes = "";
            $this->IPAmt->HrefValue = "";
            $this->IPAmt->TooltipValue = "";

            // InsAmt
            $this->InsAmt->LinkCustomAttributes = "";
            $this->InsAmt->HrefValue = "";
            $this->InsAmt->TooltipValue = "";

            // ManualCD
            $this->ManualCD->LinkCustomAttributes = "";
            $this->ManualCD->HrefValue = "";
            $this->ManualCD->TooltipValue = "";

            // Free
            $this->Free->LinkCustomAttributes = "";
            $this->Free->HrefValue = "";
            $this->Free->TooltipValue = "";

            // AutoAuth
            $this->AutoAuth->LinkCustomAttributes = "";
            $this->AutoAuth->HrefValue = "";
            $this->AutoAuth->TooltipValue = "";

            // ProductCD
            $this->ProductCD->LinkCustomAttributes = "";
            $this->ProductCD->HrefValue = "";
            $this->ProductCD->TooltipValue = "";

            // Inventory
            $this->Inventory->LinkCustomAttributes = "";
            $this->Inventory->HrefValue = "";
            $this->Inventory->TooltipValue = "";

            // IntimateTest
            $this->IntimateTest->LinkCustomAttributes = "";
            $this->IntimateTest->HrefValue = "";
            $this->IntimateTest->TooltipValue = "";

            // Manual
            $this->Manual->LinkCustomAttributes = "";
            $this->Manual->HrefValue = "";
            $this->Manual->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"flab_test_masterlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
