<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabTestResultList extends LabTestResult
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_test_result';

    // Page object name
    public $PageObjName = "LabTestResultList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "flab_test_resultlist";
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

        // Table object (lab_test_result)
        if (!isset($GLOBALS["lab_test_result"]) || get_class($GLOBALS["lab_test_result"]) == PROJECT_NAMESPACE . "lab_test_result") {
            $GLOBALS["lab_test_result"] = &$this;
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
        $this->AddUrl = "LabTestResultAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "LabTestResultDelete";
        $this->MultiUpdateUrl = "LabTestResultUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_test_result');
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
        $this->FilterOptions->TagClassName = "ew-filter-option flab_test_resultlistsrch";

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
                $doc = new $class(Container("lab_test_result"));
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
        $this->Branch->setVisibility();
        $this->SidNo->setVisibility();
        $this->SidDate->setVisibility();
        $this->TestCd->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->DEptCd->setVisibility();
        $this->ProfCd->setVisibility();
        $this->LabReport->Visible = false;
        $this->ResultDate->setVisibility();
        $this->Comments->Visible = false;
        $this->Method->setVisibility();
        $this->Specimen->setVisibility();
        $this->Amount->setVisibility();
        $this->ResultBy->setVisibility();
        $this->AuthBy->setVisibility();
        $this->AuthDate->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Printed->setVisibility();
        $this->Dispatch->setVisibility();
        $this->LOWHIGH->setVisibility();
        $this->RefValue->Visible = false;
        $this->Unit->setVisibility();
        $this->ResDate->setVisibility();
        $this->Pic1->setVisibility();
        $this->Pic2->setVisibility();
        $this->GraphPath->setVisibility();
        $this->SampleDate->setVisibility();
        $this->SampleUser->setVisibility();
        $this->ReceivedDate->setVisibility();
        $this->ReceivedUser->setVisibility();
        $this->DeptRecvDate->setVisibility();
        $this->DeptRecvUser->setVisibility();
        $this->PrintBy->setVisibility();
        $this->PrintDate->setVisibility();
        $this->MachineCD->setVisibility();
        $this->TestCancel->setVisibility();
        $this->OutSource->setVisibility();
        $this->Tariff->setVisibility();
        $this->EDITDATE->setVisibility();
        $this->UPLOAD->setVisibility();
        $this->SAuthDate->setVisibility();
        $this->SAuthBy->setVisibility();
        $this->NoRC->setVisibility();
        $this->DispDt->setVisibility();
        $this->DispUser->setVisibility();
        $this->DispRemarks->setVisibility();
        $this->DispMode->setVisibility();
        $this->ProductCD->setVisibility();
        $this->Nos->setVisibility();
        $this->WBCPath->setVisibility();
        $this->RBCPath->setVisibility();
        $this->PTPath->setVisibility();
        $this->ActualAmt->setVisibility();
        $this->NoSign->setVisibility();
        $this->_Barcode->setVisibility();
        $this->ReadTime->setVisibility();
        $this->Result->Visible = false;
        $this->VailID->setVisibility();
        $this->ReadMachine->setVisibility();
        $this->LabCD->setVisibility();
        $this->OutLabAmt->setVisibility();
        $this->ProductQty->setVisibility();
        $this->Repeat->setVisibility();
        $this->DeptNo->setVisibility();
        $this->Desc1->setVisibility();
        $this->Desc2->setVisibility();
        $this->RptResult->setVisibility();
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
        if (count($arKeyFlds) >= 0) {
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
        $filterList = Concat($filterList, $this->Branch->AdvancedSearch->toJson(), ","); // Field Branch
        $filterList = Concat($filterList, $this->SidNo->AdvancedSearch->toJson(), ","); // Field SidNo
        $filterList = Concat($filterList, $this->SidDate->AdvancedSearch->toJson(), ","); // Field SidDate
        $filterList = Concat($filterList, $this->TestCd->AdvancedSearch->toJson(), ","); // Field TestCd
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->DEptCd->AdvancedSearch->toJson(), ","); // Field DEptCd
        $filterList = Concat($filterList, $this->ProfCd->AdvancedSearch->toJson(), ","); // Field ProfCd
        $filterList = Concat($filterList, $this->LabReport->AdvancedSearch->toJson(), ","); // Field LabReport
        $filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
        $filterList = Concat($filterList, $this->Comments->AdvancedSearch->toJson(), ","); // Field Comments
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Specimen->AdvancedSearch->toJson(), ","); // Field Specimen
        $filterList = Concat($filterList, $this->Amount->AdvancedSearch->toJson(), ","); // Field Amount
        $filterList = Concat($filterList, $this->ResultBy->AdvancedSearch->toJson(), ","); // Field ResultBy
        $filterList = Concat($filterList, $this->AuthBy->AdvancedSearch->toJson(), ","); // Field AuthBy
        $filterList = Concat($filterList, $this->AuthDate->AdvancedSearch->toJson(), ","); // Field AuthDate
        $filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
        $filterList = Concat($filterList, $this->Printed->AdvancedSearch->toJson(), ","); // Field Printed
        $filterList = Concat($filterList, $this->Dispatch->AdvancedSearch->toJson(), ","); // Field Dispatch
        $filterList = Concat($filterList, $this->LOWHIGH->AdvancedSearch->toJson(), ","); // Field LOWHIGH
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
        $filterList = Concat($filterList, $this->ResDate->AdvancedSearch->toJson(), ","); // Field ResDate
        $filterList = Concat($filterList, $this->Pic1->AdvancedSearch->toJson(), ","); // Field Pic1
        $filterList = Concat($filterList, $this->Pic2->AdvancedSearch->toJson(), ","); // Field Pic2
        $filterList = Concat($filterList, $this->GraphPath->AdvancedSearch->toJson(), ","); // Field GraphPath
        $filterList = Concat($filterList, $this->SampleDate->AdvancedSearch->toJson(), ","); // Field SampleDate
        $filterList = Concat($filterList, $this->SampleUser->AdvancedSearch->toJson(), ","); // Field SampleUser
        $filterList = Concat($filterList, $this->ReceivedDate->AdvancedSearch->toJson(), ","); // Field ReceivedDate
        $filterList = Concat($filterList, $this->ReceivedUser->AdvancedSearch->toJson(), ","); // Field ReceivedUser
        $filterList = Concat($filterList, $this->DeptRecvDate->AdvancedSearch->toJson(), ","); // Field DeptRecvDate
        $filterList = Concat($filterList, $this->DeptRecvUser->AdvancedSearch->toJson(), ","); // Field DeptRecvUser
        $filterList = Concat($filterList, $this->PrintBy->AdvancedSearch->toJson(), ","); // Field PrintBy
        $filterList = Concat($filterList, $this->PrintDate->AdvancedSearch->toJson(), ","); // Field PrintDate
        $filterList = Concat($filterList, $this->MachineCD->AdvancedSearch->toJson(), ","); // Field MachineCD
        $filterList = Concat($filterList, $this->TestCancel->AdvancedSearch->toJson(), ","); // Field TestCancel
        $filterList = Concat($filterList, $this->OutSource->AdvancedSearch->toJson(), ","); // Field OutSource
        $filterList = Concat($filterList, $this->Tariff->AdvancedSearch->toJson(), ","); // Field Tariff
        $filterList = Concat($filterList, $this->EDITDATE->AdvancedSearch->toJson(), ","); // Field EDITDATE
        $filterList = Concat($filterList, $this->UPLOAD->AdvancedSearch->toJson(), ","); // Field UPLOAD
        $filterList = Concat($filterList, $this->SAuthDate->AdvancedSearch->toJson(), ","); // Field SAuthDate
        $filterList = Concat($filterList, $this->SAuthBy->AdvancedSearch->toJson(), ","); // Field SAuthBy
        $filterList = Concat($filterList, $this->NoRC->AdvancedSearch->toJson(), ","); // Field NoRC
        $filterList = Concat($filterList, $this->DispDt->AdvancedSearch->toJson(), ","); // Field DispDt
        $filterList = Concat($filterList, $this->DispUser->AdvancedSearch->toJson(), ","); // Field DispUser
        $filterList = Concat($filterList, $this->DispRemarks->AdvancedSearch->toJson(), ","); // Field DispRemarks
        $filterList = Concat($filterList, $this->DispMode->AdvancedSearch->toJson(), ","); // Field DispMode
        $filterList = Concat($filterList, $this->ProductCD->AdvancedSearch->toJson(), ","); // Field ProductCD
        $filterList = Concat($filterList, $this->Nos->AdvancedSearch->toJson(), ","); // Field Nos
        $filterList = Concat($filterList, $this->WBCPath->AdvancedSearch->toJson(), ","); // Field WBCPath
        $filterList = Concat($filterList, $this->RBCPath->AdvancedSearch->toJson(), ","); // Field RBCPath
        $filterList = Concat($filterList, $this->PTPath->AdvancedSearch->toJson(), ","); // Field PTPath
        $filterList = Concat($filterList, $this->ActualAmt->AdvancedSearch->toJson(), ","); // Field ActualAmt
        $filterList = Concat($filterList, $this->NoSign->AdvancedSearch->toJson(), ","); // Field NoSign
        $filterList = Concat($filterList, $this->_Barcode->AdvancedSearch->toJson(), ","); // Field Barcode
        $filterList = Concat($filterList, $this->ReadTime->AdvancedSearch->toJson(), ","); // Field ReadTime
        $filterList = Concat($filterList, $this->Result->AdvancedSearch->toJson(), ","); // Field Result
        $filterList = Concat($filterList, $this->VailID->AdvancedSearch->toJson(), ","); // Field VailID
        $filterList = Concat($filterList, $this->ReadMachine->AdvancedSearch->toJson(), ","); // Field ReadMachine
        $filterList = Concat($filterList, $this->LabCD->AdvancedSearch->toJson(), ","); // Field LabCD
        $filterList = Concat($filterList, $this->OutLabAmt->AdvancedSearch->toJson(), ","); // Field OutLabAmt
        $filterList = Concat($filterList, $this->ProductQty->AdvancedSearch->toJson(), ","); // Field ProductQty
        $filterList = Concat($filterList, $this->Repeat->AdvancedSearch->toJson(), ","); // Field Repeat
        $filterList = Concat($filterList, $this->DeptNo->AdvancedSearch->toJson(), ","); // Field DeptNo
        $filterList = Concat($filterList, $this->Desc1->AdvancedSearch->toJson(), ","); // Field Desc1
        $filterList = Concat($filterList, $this->Desc2->AdvancedSearch->toJson(), ","); // Field Desc2
        $filterList = Concat($filterList, $this->RptResult->AdvancedSearch->toJson(), ","); // Field RptResult
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
            $UserProfile->setSearchFilters(CurrentUserName(), "flab_test_resultlistsrch", $filters);
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

        // Field Branch
        $this->Branch->AdvancedSearch->SearchValue = @$filter["x_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator = @$filter["z_Branch"];
        $this->Branch->AdvancedSearch->SearchCondition = @$filter["v_Branch"];
        $this->Branch->AdvancedSearch->SearchValue2 = @$filter["y_Branch"];
        $this->Branch->AdvancedSearch->SearchOperator2 = @$filter["w_Branch"];
        $this->Branch->AdvancedSearch->save();

        // Field SidNo
        $this->SidNo->AdvancedSearch->SearchValue = @$filter["x_SidNo"];
        $this->SidNo->AdvancedSearch->SearchOperator = @$filter["z_SidNo"];
        $this->SidNo->AdvancedSearch->SearchCondition = @$filter["v_SidNo"];
        $this->SidNo->AdvancedSearch->SearchValue2 = @$filter["y_SidNo"];
        $this->SidNo->AdvancedSearch->SearchOperator2 = @$filter["w_SidNo"];
        $this->SidNo->AdvancedSearch->save();

        // Field SidDate
        $this->SidDate->AdvancedSearch->SearchValue = @$filter["x_SidDate"];
        $this->SidDate->AdvancedSearch->SearchOperator = @$filter["z_SidDate"];
        $this->SidDate->AdvancedSearch->SearchCondition = @$filter["v_SidDate"];
        $this->SidDate->AdvancedSearch->SearchValue2 = @$filter["y_SidDate"];
        $this->SidDate->AdvancedSearch->SearchOperator2 = @$filter["w_SidDate"];
        $this->SidDate->AdvancedSearch->save();

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

        // Field DEptCd
        $this->DEptCd->AdvancedSearch->SearchValue = @$filter["x_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator = @$filter["z_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchCondition = @$filter["v_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchValue2 = @$filter["y_DEptCd"];
        $this->DEptCd->AdvancedSearch->SearchOperator2 = @$filter["w_DEptCd"];
        $this->DEptCd->AdvancedSearch->save();

        // Field ProfCd
        $this->ProfCd->AdvancedSearch->SearchValue = @$filter["x_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator = @$filter["z_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchCondition = @$filter["v_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchValue2 = @$filter["y_ProfCd"];
        $this->ProfCd->AdvancedSearch->SearchOperator2 = @$filter["w_ProfCd"];
        $this->ProfCd->AdvancedSearch->save();

        // Field LabReport
        $this->LabReport->AdvancedSearch->SearchValue = @$filter["x_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator = @$filter["z_LabReport"];
        $this->LabReport->AdvancedSearch->SearchCondition = @$filter["v_LabReport"];
        $this->LabReport->AdvancedSearch->SearchValue2 = @$filter["y_LabReport"];
        $this->LabReport->AdvancedSearch->SearchOperator2 = @$filter["w_LabReport"];
        $this->LabReport->AdvancedSearch->save();

        // Field ResultDate
        $this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
        $this->ResultDate->AdvancedSearch->save();

        // Field Comments
        $this->Comments->AdvancedSearch->SearchValue = @$filter["x_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator = @$filter["z_Comments"];
        $this->Comments->AdvancedSearch->SearchCondition = @$filter["v_Comments"];
        $this->Comments->AdvancedSearch->SearchValue2 = @$filter["y_Comments"];
        $this->Comments->AdvancedSearch->SearchOperator2 = @$filter["w_Comments"];
        $this->Comments->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Specimen
        $this->Specimen->AdvancedSearch->SearchValue = @$filter["x_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator = @$filter["z_Specimen"];
        $this->Specimen->AdvancedSearch->SearchCondition = @$filter["v_Specimen"];
        $this->Specimen->AdvancedSearch->SearchValue2 = @$filter["y_Specimen"];
        $this->Specimen->AdvancedSearch->SearchOperator2 = @$filter["w_Specimen"];
        $this->Specimen->AdvancedSearch->save();

        // Field Amount
        $this->Amount->AdvancedSearch->SearchValue = @$filter["x_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator = @$filter["z_Amount"];
        $this->Amount->AdvancedSearch->SearchCondition = @$filter["v_Amount"];
        $this->Amount->AdvancedSearch->SearchValue2 = @$filter["y_Amount"];
        $this->Amount->AdvancedSearch->SearchOperator2 = @$filter["w_Amount"];
        $this->Amount->AdvancedSearch->save();

        // Field ResultBy
        $this->ResultBy->AdvancedSearch->SearchValue = @$filter["x_ResultBy"];
        $this->ResultBy->AdvancedSearch->SearchOperator = @$filter["z_ResultBy"];
        $this->ResultBy->AdvancedSearch->SearchCondition = @$filter["v_ResultBy"];
        $this->ResultBy->AdvancedSearch->SearchValue2 = @$filter["y_ResultBy"];
        $this->ResultBy->AdvancedSearch->SearchOperator2 = @$filter["w_ResultBy"];
        $this->ResultBy->AdvancedSearch->save();

        // Field AuthBy
        $this->AuthBy->AdvancedSearch->SearchValue = @$filter["x_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator = @$filter["z_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchCondition = @$filter["v_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchValue2 = @$filter["y_AuthBy"];
        $this->AuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_AuthBy"];
        $this->AuthBy->AdvancedSearch->save();

        // Field AuthDate
        $this->AuthDate->AdvancedSearch->SearchValue = @$filter["x_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator = @$filter["z_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchCondition = @$filter["v_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchValue2 = @$filter["y_AuthDate"];
        $this->AuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_AuthDate"];
        $this->AuthDate->AdvancedSearch->save();

        // Field Abnormal
        $this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
        $this->Abnormal->AdvancedSearch->save();

        // Field Printed
        $this->Printed->AdvancedSearch->SearchValue = @$filter["x_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator = @$filter["z_Printed"];
        $this->Printed->AdvancedSearch->SearchCondition = @$filter["v_Printed"];
        $this->Printed->AdvancedSearch->SearchValue2 = @$filter["y_Printed"];
        $this->Printed->AdvancedSearch->SearchOperator2 = @$filter["w_Printed"];
        $this->Printed->AdvancedSearch->save();

        // Field Dispatch
        $this->Dispatch->AdvancedSearch->SearchValue = @$filter["x_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator = @$filter["z_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchCondition = @$filter["v_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchValue2 = @$filter["y_Dispatch"];
        $this->Dispatch->AdvancedSearch->SearchOperator2 = @$filter["w_Dispatch"];
        $this->Dispatch->AdvancedSearch->save();

        // Field LOWHIGH
        $this->LOWHIGH->AdvancedSearch->SearchValue = @$filter["x_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator = @$filter["z_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchCondition = @$filter["v_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchValue2 = @$filter["y_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->SearchOperator2 = @$filter["w_LOWHIGH"];
        $this->LOWHIGH->AdvancedSearch->save();

        // Field RefValue
        $this->RefValue->AdvancedSearch->SearchValue = @$filter["x_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator = @$filter["z_RefValue"];
        $this->RefValue->AdvancedSearch->SearchCondition = @$filter["v_RefValue"];
        $this->RefValue->AdvancedSearch->SearchValue2 = @$filter["y_RefValue"];
        $this->RefValue->AdvancedSearch->SearchOperator2 = @$filter["w_RefValue"];
        $this->RefValue->AdvancedSearch->save();

        // Field Unit
        $this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
        $this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
        $this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
        $this->Unit->AdvancedSearch->save();

        // Field ResDate
        $this->ResDate->AdvancedSearch->SearchValue = @$filter["x_ResDate"];
        $this->ResDate->AdvancedSearch->SearchOperator = @$filter["z_ResDate"];
        $this->ResDate->AdvancedSearch->SearchCondition = @$filter["v_ResDate"];
        $this->ResDate->AdvancedSearch->SearchValue2 = @$filter["y_ResDate"];
        $this->ResDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResDate"];
        $this->ResDate->AdvancedSearch->save();

        // Field Pic1
        $this->Pic1->AdvancedSearch->SearchValue = @$filter["x_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator = @$filter["z_Pic1"];
        $this->Pic1->AdvancedSearch->SearchCondition = @$filter["v_Pic1"];
        $this->Pic1->AdvancedSearch->SearchValue2 = @$filter["y_Pic1"];
        $this->Pic1->AdvancedSearch->SearchOperator2 = @$filter["w_Pic1"];
        $this->Pic1->AdvancedSearch->save();

        // Field Pic2
        $this->Pic2->AdvancedSearch->SearchValue = @$filter["x_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator = @$filter["z_Pic2"];
        $this->Pic2->AdvancedSearch->SearchCondition = @$filter["v_Pic2"];
        $this->Pic2->AdvancedSearch->SearchValue2 = @$filter["y_Pic2"];
        $this->Pic2->AdvancedSearch->SearchOperator2 = @$filter["w_Pic2"];
        $this->Pic2->AdvancedSearch->save();

        // Field GraphPath
        $this->GraphPath->AdvancedSearch->SearchValue = @$filter["x_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator = @$filter["z_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchCondition = @$filter["v_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchValue2 = @$filter["y_GraphPath"];
        $this->GraphPath->AdvancedSearch->SearchOperator2 = @$filter["w_GraphPath"];
        $this->GraphPath->AdvancedSearch->save();

        // Field SampleDate
        $this->SampleDate->AdvancedSearch->SearchValue = @$filter["x_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator = @$filter["z_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchCondition = @$filter["v_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchValue2 = @$filter["y_SampleDate"];
        $this->SampleDate->AdvancedSearch->SearchOperator2 = @$filter["w_SampleDate"];
        $this->SampleDate->AdvancedSearch->save();

        // Field SampleUser
        $this->SampleUser->AdvancedSearch->SearchValue = @$filter["x_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator = @$filter["z_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchCondition = @$filter["v_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchValue2 = @$filter["y_SampleUser"];
        $this->SampleUser->AdvancedSearch->SearchOperator2 = @$filter["w_SampleUser"];
        $this->SampleUser->AdvancedSearch->save();

        // Field ReceivedDate
        $this->ReceivedDate->AdvancedSearch->SearchValue = @$filter["x_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator = @$filter["z_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchCondition = @$filter["v_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedDate"];
        $this->ReceivedDate->AdvancedSearch->save();

        // Field ReceivedUser
        $this->ReceivedUser->AdvancedSearch->SearchValue = @$filter["x_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator = @$filter["z_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchCondition = @$filter["v_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchValue2 = @$filter["y_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->SearchOperator2 = @$filter["w_ReceivedUser"];
        $this->ReceivedUser->AdvancedSearch->save();

        // Field DeptRecvDate
        $this->DeptRecvDate->AdvancedSearch->SearchValue = @$filter["x_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvDate"];
        $this->DeptRecvDate->AdvancedSearch->save();

        // Field DeptRecvUser
        $this->DeptRecvUser->AdvancedSearch->SearchValue = @$filter["x_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator = @$filter["z_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchCondition = @$filter["v_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchValue2 = @$filter["y_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->SearchOperator2 = @$filter["w_DeptRecvUser"];
        $this->DeptRecvUser->AdvancedSearch->save();

        // Field PrintBy
        $this->PrintBy->AdvancedSearch->SearchValue = @$filter["x_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator = @$filter["z_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchCondition = @$filter["v_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchValue2 = @$filter["y_PrintBy"];
        $this->PrintBy->AdvancedSearch->SearchOperator2 = @$filter["w_PrintBy"];
        $this->PrintBy->AdvancedSearch->save();

        // Field PrintDate
        $this->PrintDate->AdvancedSearch->SearchValue = @$filter["x_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator = @$filter["z_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchCondition = @$filter["v_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchValue2 = @$filter["y_PrintDate"];
        $this->PrintDate->AdvancedSearch->SearchOperator2 = @$filter["w_PrintDate"];
        $this->PrintDate->AdvancedSearch->save();

        // Field MachineCD
        $this->MachineCD->AdvancedSearch->SearchValue = @$filter["x_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator = @$filter["z_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchCondition = @$filter["v_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchValue2 = @$filter["y_MachineCD"];
        $this->MachineCD->AdvancedSearch->SearchOperator2 = @$filter["w_MachineCD"];
        $this->MachineCD->AdvancedSearch->save();

        // Field TestCancel
        $this->TestCancel->AdvancedSearch->SearchValue = @$filter["x_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator = @$filter["z_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchCondition = @$filter["v_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchValue2 = @$filter["y_TestCancel"];
        $this->TestCancel->AdvancedSearch->SearchOperator2 = @$filter["w_TestCancel"];
        $this->TestCancel->AdvancedSearch->save();

        // Field OutSource
        $this->OutSource->AdvancedSearch->SearchValue = @$filter["x_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator = @$filter["z_OutSource"];
        $this->OutSource->AdvancedSearch->SearchCondition = @$filter["v_OutSource"];
        $this->OutSource->AdvancedSearch->SearchValue2 = @$filter["y_OutSource"];
        $this->OutSource->AdvancedSearch->SearchOperator2 = @$filter["w_OutSource"];
        $this->OutSource->AdvancedSearch->save();

        // Field Tariff
        $this->Tariff->AdvancedSearch->SearchValue = @$filter["x_Tariff"];
        $this->Tariff->AdvancedSearch->SearchOperator = @$filter["z_Tariff"];
        $this->Tariff->AdvancedSearch->SearchCondition = @$filter["v_Tariff"];
        $this->Tariff->AdvancedSearch->SearchValue2 = @$filter["y_Tariff"];
        $this->Tariff->AdvancedSearch->SearchOperator2 = @$filter["w_Tariff"];
        $this->Tariff->AdvancedSearch->save();

        // Field EDITDATE
        $this->EDITDATE->AdvancedSearch->SearchValue = @$filter["x_EDITDATE"];
        $this->EDITDATE->AdvancedSearch->SearchOperator = @$filter["z_EDITDATE"];
        $this->EDITDATE->AdvancedSearch->SearchCondition = @$filter["v_EDITDATE"];
        $this->EDITDATE->AdvancedSearch->SearchValue2 = @$filter["y_EDITDATE"];
        $this->EDITDATE->AdvancedSearch->SearchOperator2 = @$filter["w_EDITDATE"];
        $this->EDITDATE->AdvancedSearch->save();

        // Field UPLOAD
        $this->UPLOAD->AdvancedSearch->SearchValue = @$filter["x_UPLOAD"];
        $this->UPLOAD->AdvancedSearch->SearchOperator = @$filter["z_UPLOAD"];
        $this->UPLOAD->AdvancedSearch->SearchCondition = @$filter["v_UPLOAD"];
        $this->UPLOAD->AdvancedSearch->SearchValue2 = @$filter["y_UPLOAD"];
        $this->UPLOAD->AdvancedSearch->SearchOperator2 = @$filter["w_UPLOAD"];
        $this->UPLOAD->AdvancedSearch->save();

        // Field SAuthDate
        $this->SAuthDate->AdvancedSearch->SearchValue = @$filter["x_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator = @$filter["z_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchCondition = @$filter["v_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchValue2 = @$filter["y_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthDate"];
        $this->SAuthDate->AdvancedSearch->save();

        // Field SAuthBy
        $this->SAuthBy->AdvancedSearch->SearchValue = @$filter["x_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator = @$filter["z_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchCondition = @$filter["v_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchValue2 = @$filter["y_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->SearchOperator2 = @$filter["w_SAuthBy"];
        $this->SAuthBy->AdvancedSearch->save();

        // Field NoRC
        $this->NoRC->AdvancedSearch->SearchValue = @$filter["x_NoRC"];
        $this->NoRC->AdvancedSearch->SearchOperator = @$filter["z_NoRC"];
        $this->NoRC->AdvancedSearch->SearchCondition = @$filter["v_NoRC"];
        $this->NoRC->AdvancedSearch->SearchValue2 = @$filter["y_NoRC"];
        $this->NoRC->AdvancedSearch->SearchOperator2 = @$filter["w_NoRC"];
        $this->NoRC->AdvancedSearch->save();

        // Field DispDt
        $this->DispDt->AdvancedSearch->SearchValue = @$filter["x_DispDt"];
        $this->DispDt->AdvancedSearch->SearchOperator = @$filter["z_DispDt"];
        $this->DispDt->AdvancedSearch->SearchCondition = @$filter["v_DispDt"];
        $this->DispDt->AdvancedSearch->SearchValue2 = @$filter["y_DispDt"];
        $this->DispDt->AdvancedSearch->SearchOperator2 = @$filter["w_DispDt"];
        $this->DispDt->AdvancedSearch->save();

        // Field DispUser
        $this->DispUser->AdvancedSearch->SearchValue = @$filter["x_DispUser"];
        $this->DispUser->AdvancedSearch->SearchOperator = @$filter["z_DispUser"];
        $this->DispUser->AdvancedSearch->SearchCondition = @$filter["v_DispUser"];
        $this->DispUser->AdvancedSearch->SearchValue2 = @$filter["y_DispUser"];
        $this->DispUser->AdvancedSearch->SearchOperator2 = @$filter["w_DispUser"];
        $this->DispUser->AdvancedSearch->save();

        // Field DispRemarks
        $this->DispRemarks->AdvancedSearch->SearchValue = @$filter["x_DispRemarks"];
        $this->DispRemarks->AdvancedSearch->SearchOperator = @$filter["z_DispRemarks"];
        $this->DispRemarks->AdvancedSearch->SearchCondition = @$filter["v_DispRemarks"];
        $this->DispRemarks->AdvancedSearch->SearchValue2 = @$filter["y_DispRemarks"];
        $this->DispRemarks->AdvancedSearch->SearchOperator2 = @$filter["w_DispRemarks"];
        $this->DispRemarks->AdvancedSearch->save();

        // Field DispMode
        $this->DispMode->AdvancedSearch->SearchValue = @$filter["x_DispMode"];
        $this->DispMode->AdvancedSearch->SearchOperator = @$filter["z_DispMode"];
        $this->DispMode->AdvancedSearch->SearchCondition = @$filter["v_DispMode"];
        $this->DispMode->AdvancedSearch->SearchValue2 = @$filter["y_DispMode"];
        $this->DispMode->AdvancedSearch->SearchOperator2 = @$filter["w_DispMode"];
        $this->DispMode->AdvancedSearch->save();

        // Field ProductCD
        $this->ProductCD->AdvancedSearch->SearchValue = @$filter["x_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchOperator = @$filter["z_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchCondition = @$filter["v_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchValue2 = @$filter["y_ProductCD"];
        $this->ProductCD->AdvancedSearch->SearchOperator2 = @$filter["w_ProductCD"];
        $this->ProductCD->AdvancedSearch->save();

        // Field Nos
        $this->Nos->AdvancedSearch->SearchValue = @$filter["x_Nos"];
        $this->Nos->AdvancedSearch->SearchOperator = @$filter["z_Nos"];
        $this->Nos->AdvancedSearch->SearchCondition = @$filter["v_Nos"];
        $this->Nos->AdvancedSearch->SearchValue2 = @$filter["y_Nos"];
        $this->Nos->AdvancedSearch->SearchOperator2 = @$filter["w_Nos"];
        $this->Nos->AdvancedSearch->save();

        // Field WBCPath
        $this->WBCPath->AdvancedSearch->SearchValue = @$filter["x_WBCPath"];
        $this->WBCPath->AdvancedSearch->SearchOperator = @$filter["z_WBCPath"];
        $this->WBCPath->AdvancedSearch->SearchCondition = @$filter["v_WBCPath"];
        $this->WBCPath->AdvancedSearch->SearchValue2 = @$filter["y_WBCPath"];
        $this->WBCPath->AdvancedSearch->SearchOperator2 = @$filter["w_WBCPath"];
        $this->WBCPath->AdvancedSearch->save();

        // Field RBCPath
        $this->RBCPath->AdvancedSearch->SearchValue = @$filter["x_RBCPath"];
        $this->RBCPath->AdvancedSearch->SearchOperator = @$filter["z_RBCPath"];
        $this->RBCPath->AdvancedSearch->SearchCondition = @$filter["v_RBCPath"];
        $this->RBCPath->AdvancedSearch->SearchValue2 = @$filter["y_RBCPath"];
        $this->RBCPath->AdvancedSearch->SearchOperator2 = @$filter["w_RBCPath"];
        $this->RBCPath->AdvancedSearch->save();

        // Field PTPath
        $this->PTPath->AdvancedSearch->SearchValue = @$filter["x_PTPath"];
        $this->PTPath->AdvancedSearch->SearchOperator = @$filter["z_PTPath"];
        $this->PTPath->AdvancedSearch->SearchCondition = @$filter["v_PTPath"];
        $this->PTPath->AdvancedSearch->SearchValue2 = @$filter["y_PTPath"];
        $this->PTPath->AdvancedSearch->SearchOperator2 = @$filter["w_PTPath"];
        $this->PTPath->AdvancedSearch->save();

        // Field ActualAmt
        $this->ActualAmt->AdvancedSearch->SearchValue = @$filter["x_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator = @$filter["z_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchCondition = @$filter["v_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchValue2 = @$filter["y_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->SearchOperator2 = @$filter["w_ActualAmt"];
        $this->ActualAmt->AdvancedSearch->save();

        // Field NoSign
        $this->NoSign->AdvancedSearch->SearchValue = @$filter["x_NoSign"];
        $this->NoSign->AdvancedSearch->SearchOperator = @$filter["z_NoSign"];
        $this->NoSign->AdvancedSearch->SearchCondition = @$filter["v_NoSign"];
        $this->NoSign->AdvancedSearch->SearchValue2 = @$filter["y_NoSign"];
        $this->NoSign->AdvancedSearch->SearchOperator2 = @$filter["w_NoSign"];
        $this->NoSign->AdvancedSearch->save();

        // Field Barcode
        $this->_Barcode->AdvancedSearch->SearchValue = @$filter["x__Barcode"];
        $this->_Barcode->AdvancedSearch->SearchOperator = @$filter["z__Barcode"];
        $this->_Barcode->AdvancedSearch->SearchCondition = @$filter["v__Barcode"];
        $this->_Barcode->AdvancedSearch->SearchValue2 = @$filter["y__Barcode"];
        $this->_Barcode->AdvancedSearch->SearchOperator2 = @$filter["w__Barcode"];
        $this->_Barcode->AdvancedSearch->save();

        // Field ReadTime
        $this->ReadTime->AdvancedSearch->SearchValue = @$filter["x_ReadTime"];
        $this->ReadTime->AdvancedSearch->SearchOperator = @$filter["z_ReadTime"];
        $this->ReadTime->AdvancedSearch->SearchCondition = @$filter["v_ReadTime"];
        $this->ReadTime->AdvancedSearch->SearchValue2 = @$filter["y_ReadTime"];
        $this->ReadTime->AdvancedSearch->SearchOperator2 = @$filter["w_ReadTime"];
        $this->ReadTime->AdvancedSearch->save();

        // Field Result
        $this->Result->AdvancedSearch->SearchValue = @$filter["x_Result"];
        $this->Result->AdvancedSearch->SearchOperator = @$filter["z_Result"];
        $this->Result->AdvancedSearch->SearchCondition = @$filter["v_Result"];
        $this->Result->AdvancedSearch->SearchValue2 = @$filter["y_Result"];
        $this->Result->AdvancedSearch->SearchOperator2 = @$filter["w_Result"];
        $this->Result->AdvancedSearch->save();

        // Field VailID
        $this->VailID->AdvancedSearch->SearchValue = @$filter["x_VailID"];
        $this->VailID->AdvancedSearch->SearchOperator = @$filter["z_VailID"];
        $this->VailID->AdvancedSearch->SearchCondition = @$filter["v_VailID"];
        $this->VailID->AdvancedSearch->SearchValue2 = @$filter["y_VailID"];
        $this->VailID->AdvancedSearch->SearchOperator2 = @$filter["w_VailID"];
        $this->VailID->AdvancedSearch->save();

        // Field ReadMachine
        $this->ReadMachine->AdvancedSearch->SearchValue = @$filter["x_ReadMachine"];
        $this->ReadMachine->AdvancedSearch->SearchOperator = @$filter["z_ReadMachine"];
        $this->ReadMachine->AdvancedSearch->SearchCondition = @$filter["v_ReadMachine"];
        $this->ReadMachine->AdvancedSearch->SearchValue2 = @$filter["y_ReadMachine"];
        $this->ReadMachine->AdvancedSearch->SearchOperator2 = @$filter["w_ReadMachine"];
        $this->ReadMachine->AdvancedSearch->save();

        // Field LabCD
        $this->LabCD->AdvancedSearch->SearchValue = @$filter["x_LabCD"];
        $this->LabCD->AdvancedSearch->SearchOperator = @$filter["z_LabCD"];
        $this->LabCD->AdvancedSearch->SearchCondition = @$filter["v_LabCD"];
        $this->LabCD->AdvancedSearch->SearchValue2 = @$filter["y_LabCD"];
        $this->LabCD->AdvancedSearch->SearchOperator2 = @$filter["w_LabCD"];
        $this->LabCD->AdvancedSearch->save();

        // Field OutLabAmt
        $this->OutLabAmt->AdvancedSearch->SearchValue = @$filter["x_OutLabAmt"];
        $this->OutLabAmt->AdvancedSearch->SearchOperator = @$filter["z_OutLabAmt"];
        $this->OutLabAmt->AdvancedSearch->SearchCondition = @$filter["v_OutLabAmt"];
        $this->OutLabAmt->AdvancedSearch->SearchValue2 = @$filter["y_OutLabAmt"];
        $this->OutLabAmt->AdvancedSearch->SearchOperator2 = @$filter["w_OutLabAmt"];
        $this->OutLabAmt->AdvancedSearch->save();

        // Field ProductQty
        $this->ProductQty->AdvancedSearch->SearchValue = @$filter["x_ProductQty"];
        $this->ProductQty->AdvancedSearch->SearchOperator = @$filter["z_ProductQty"];
        $this->ProductQty->AdvancedSearch->SearchCondition = @$filter["v_ProductQty"];
        $this->ProductQty->AdvancedSearch->SearchValue2 = @$filter["y_ProductQty"];
        $this->ProductQty->AdvancedSearch->SearchOperator2 = @$filter["w_ProductQty"];
        $this->ProductQty->AdvancedSearch->save();

        // Field Repeat
        $this->Repeat->AdvancedSearch->SearchValue = @$filter["x_Repeat"];
        $this->Repeat->AdvancedSearch->SearchOperator = @$filter["z_Repeat"];
        $this->Repeat->AdvancedSearch->SearchCondition = @$filter["v_Repeat"];
        $this->Repeat->AdvancedSearch->SearchValue2 = @$filter["y_Repeat"];
        $this->Repeat->AdvancedSearch->SearchOperator2 = @$filter["w_Repeat"];
        $this->Repeat->AdvancedSearch->save();

        // Field DeptNo
        $this->DeptNo->AdvancedSearch->SearchValue = @$filter["x_DeptNo"];
        $this->DeptNo->AdvancedSearch->SearchOperator = @$filter["z_DeptNo"];
        $this->DeptNo->AdvancedSearch->SearchCondition = @$filter["v_DeptNo"];
        $this->DeptNo->AdvancedSearch->SearchValue2 = @$filter["y_DeptNo"];
        $this->DeptNo->AdvancedSearch->SearchOperator2 = @$filter["w_DeptNo"];
        $this->DeptNo->AdvancedSearch->save();

        // Field Desc1
        $this->Desc1->AdvancedSearch->SearchValue = @$filter["x_Desc1"];
        $this->Desc1->AdvancedSearch->SearchOperator = @$filter["z_Desc1"];
        $this->Desc1->AdvancedSearch->SearchCondition = @$filter["v_Desc1"];
        $this->Desc1->AdvancedSearch->SearchValue2 = @$filter["y_Desc1"];
        $this->Desc1->AdvancedSearch->SearchOperator2 = @$filter["w_Desc1"];
        $this->Desc1->AdvancedSearch->save();

        // Field Desc2
        $this->Desc2->AdvancedSearch->SearchValue = @$filter["x_Desc2"];
        $this->Desc2->AdvancedSearch->SearchOperator = @$filter["z_Desc2"];
        $this->Desc2->AdvancedSearch->SearchCondition = @$filter["v_Desc2"];
        $this->Desc2->AdvancedSearch->SearchValue2 = @$filter["y_Desc2"];
        $this->Desc2->AdvancedSearch->SearchOperator2 = @$filter["w_Desc2"];
        $this->Desc2->AdvancedSearch->save();

        // Field RptResult
        $this->RptResult->AdvancedSearch->SearchValue = @$filter["x_RptResult"];
        $this->RptResult->AdvancedSearch->SearchOperator = @$filter["z_RptResult"];
        $this->RptResult->AdvancedSearch->SearchCondition = @$filter["v_RptResult"];
        $this->RptResult->AdvancedSearch->SearchValue2 = @$filter["y_RptResult"];
        $this->RptResult->AdvancedSearch->SearchOperator2 = @$filter["w_RptResult"];
        $this->RptResult->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Branch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SidNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEptCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProfCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabReport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Comments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Specimen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResultBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Printed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Dispatch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LOWHIGH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pic2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GraphPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SampleUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReceivedUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptRecvUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrintBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MachineCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestCancel, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OutSource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UPLOAD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAuthBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DispUser, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DispRemarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DispMode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProductCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WBCPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RBCPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PTPath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoSign, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_Barcode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Result, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VailID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReadMachine, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LabCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Repeat, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DeptNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Desc1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Desc2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RptResult, $arKeywords, $type);
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
            $this->updateSort($this->Branch); // Branch
            $this->updateSort($this->SidNo); // SidNo
            $this->updateSort($this->SidDate); // SidDate
            $this->updateSort($this->TestCd); // TestCd
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->DEptCd); // DEptCd
            $this->updateSort($this->ProfCd); // ProfCd
            $this->updateSort($this->ResultDate); // ResultDate
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Specimen); // Specimen
            $this->updateSort($this->Amount); // Amount
            $this->updateSort($this->ResultBy); // ResultBy
            $this->updateSort($this->AuthBy); // AuthBy
            $this->updateSort($this->AuthDate); // AuthDate
            $this->updateSort($this->Abnormal); // Abnormal
            $this->updateSort($this->Printed); // Printed
            $this->updateSort($this->Dispatch); // Dispatch
            $this->updateSort($this->LOWHIGH); // LOWHIGH
            $this->updateSort($this->Unit); // Unit
            $this->updateSort($this->ResDate); // ResDate
            $this->updateSort($this->Pic1); // Pic1
            $this->updateSort($this->Pic2); // Pic2
            $this->updateSort($this->GraphPath); // GraphPath
            $this->updateSort($this->SampleDate); // SampleDate
            $this->updateSort($this->SampleUser); // SampleUser
            $this->updateSort($this->ReceivedDate); // ReceivedDate
            $this->updateSort($this->ReceivedUser); // ReceivedUser
            $this->updateSort($this->DeptRecvDate); // DeptRecvDate
            $this->updateSort($this->DeptRecvUser); // DeptRecvUser
            $this->updateSort($this->PrintBy); // PrintBy
            $this->updateSort($this->PrintDate); // PrintDate
            $this->updateSort($this->MachineCD); // MachineCD
            $this->updateSort($this->TestCancel); // TestCancel
            $this->updateSort($this->OutSource); // OutSource
            $this->updateSort($this->Tariff); // Tariff
            $this->updateSort($this->EDITDATE); // EDITDATE
            $this->updateSort($this->UPLOAD); // UPLOAD
            $this->updateSort($this->SAuthDate); // SAuthDate
            $this->updateSort($this->SAuthBy); // SAuthBy
            $this->updateSort($this->NoRC); // NoRC
            $this->updateSort($this->DispDt); // DispDt
            $this->updateSort($this->DispUser); // DispUser
            $this->updateSort($this->DispRemarks); // DispRemarks
            $this->updateSort($this->DispMode); // DispMode
            $this->updateSort($this->ProductCD); // ProductCD
            $this->updateSort($this->Nos); // Nos
            $this->updateSort($this->WBCPath); // WBCPath
            $this->updateSort($this->RBCPath); // RBCPath
            $this->updateSort($this->PTPath); // PTPath
            $this->updateSort($this->ActualAmt); // ActualAmt
            $this->updateSort($this->NoSign); // NoSign
            $this->updateSort($this->_Barcode); // Barcode
            $this->updateSort($this->ReadTime); // ReadTime
            $this->updateSort($this->VailID); // VailID
            $this->updateSort($this->ReadMachine); // ReadMachine
            $this->updateSort($this->LabCD); // LabCD
            $this->updateSort($this->OutLabAmt); // OutLabAmt
            $this->updateSort($this->ProductQty); // ProductQty
            $this->updateSort($this->Repeat); // Repeat
            $this->updateSort($this->DeptNo); // DeptNo
            $this->updateSort($this->Desc1); // Desc1
            $this->updateSort($this->Desc2); // Desc2
            $this->updateSort($this->RptResult); // RptResult
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
                $this->Branch->setSort("");
                $this->SidNo->setSort("");
                $this->SidDate->setSort("");
                $this->TestCd->setSort("");
                $this->TestSubCd->setSort("");
                $this->DEptCd->setSort("");
                $this->ProfCd->setSort("");
                $this->LabReport->setSort("");
                $this->ResultDate->setSort("");
                $this->Comments->setSort("");
                $this->Method->setSort("");
                $this->Specimen->setSort("");
                $this->Amount->setSort("");
                $this->ResultBy->setSort("");
                $this->AuthBy->setSort("");
                $this->AuthDate->setSort("");
                $this->Abnormal->setSort("");
                $this->Printed->setSort("");
                $this->Dispatch->setSort("");
                $this->LOWHIGH->setSort("");
                $this->RefValue->setSort("");
                $this->Unit->setSort("");
                $this->ResDate->setSort("");
                $this->Pic1->setSort("");
                $this->Pic2->setSort("");
                $this->GraphPath->setSort("");
                $this->SampleDate->setSort("");
                $this->SampleUser->setSort("");
                $this->ReceivedDate->setSort("");
                $this->ReceivedUser->setSort("");
                $this->DeptRecvDate->setSort("");
                $this->DeptRecvUser->setSort("");
                $this->PrintBy->setSort("");
                $this->PrintDate->setSort("");
                $this->MachineCD->setSort("");
                $this->TestCancel->setSort("");
                $this->OutSource->setSort("");
                $this->Tariff->setSort("");
                $this->EDITDATE->setSort("");
                $this->UPLOAD->setSort("");
                $this->SAuthDate->setSort("");
                $this->SAuthBy->setSort("");
                $this->NoRC->setSort("");
                $this->DispDt->setSort("");
                $this->DispUser->setSort("");
                $this->DispRemarks->setSort("");
                $this->DispMode->setSort("");
                $this->ProductCD->setSort("");
                $this->Nos->setSort("");
                $this->WBCPath->setSort("");
                $this->RBCPath->setSort("");
                $this->PTPath->setSort("");
                $this->ActualAmt->setSort("");
                $this->NoSign->setSort("");
                $this->_Barcode->setSort("");
                $this->ReadTime->setSort("");
                $this->Result->setSort("");
                $this->VailID->setSort("");
                $this->ReadMachine->setSort("");
                $this->LabCD->setSort("");
                $this->OutLabAmt->setSort("");
                $this->ProductQty->setSort("");
                $this->Repeat->setSort("");
                $this->DeptNo->setSort("");
                $this->Desc1->setSort("");
                $this->Desc2->setSort("");
                $this->RptResult->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"flab_test_resultlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"flab_test_resultlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.flab_test_resultlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Branch->setDbValue($row['Branch']);
        $this->SidNo->setDbValue($row['SidNo']);
        $this->SidDate->setDbValue($row['SidDate']);
        $this->TestCd->setDbValue($row['TestCd']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->DEptCd->setDbValue($row['DEptCd']);
        $this->ProfCd->setDbValue($row['ProfCd']);
        $this->LabReport->setDbValue($row['LabReport']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->Comments->setDbValue($row['Comments']);
        $this->Method->setDbValue($row['Method']);
        $this->Specimen->setDbValue($row['Specimen']);
        $this->Amount->setDbValue($row['Amount']);
        $this->ResultBy->setDbValue($row['ResultBy']);
        $this->AuthBy->setDbValue($row['AuthBy']);
        $this->AuthDate->setDbValue($row['AuthDate']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Printed->setDbValue($row['Printed']);
        $this->Dispatch->setDbValue($row['Dispatch']);
        $this->LOWHIGH->setDbValue($row['LOWHIGH']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Unit->setDbValue($row['Unit']);
        $this->ResDate->setDbValue($row['ResDate']);
        $this->Pic1->setDbValue($row['Pic1']);
        $this->Pic2->setDbValue($row['Pic2']);
        $this->GraphPath->setDbValue($row['GraphPath']);
        $this->SampleDate->setDbValue($row['SampleDate']);
        $this->SampleUser->setDbValue($row['SampleUser']);
        $this->ReceivedDate->setDbValue($row['ReceivedDate']);
        $this->ReceivedUser->setDbValue($row['ReceivedUser']);
        $this->DeptRecvDate->setDbValue($row['DeptRecvDate']);
        $this->DeptRecvUser->setDbValue($row['DeptRecvUser']);
        $this->PrintBy->setDbValue($row['PrintBy']);
        $this->PrintDate->setDbValue($row['PrintDate']);
        $this->MachineCD->setDbValue($row['MachineCD']);
        $this->TestCancel->setDbValue($row['TestCancel']);
        $this->OutSource->setDbValue($row['OutSource']);
        $this->Tariff->setDbValue($row['Tariff']);
        $this->EDITDATE->setDbValue($row['EDITDATE']);
        $this->UPLOAD->setDbValue($row['UPLOAD']);
        $this->SAuthDate->setDbValue($row['SAuthDate']);
        $this->SAuthBy->setDbValue($row['SAuthBy']);
        $this->NoRC->setDbValue($row['NoRC']);
        $this->DispDt->setDbValue($row['DispDt']);
        $this->DispUser->setDbValue($row['DispUser']);
        $this->DispRemarks->setDbValue($row['DispRemarks']);
        $this->DispMode->setDbValue($row['DispMode']);
        $this->ProductCD->setDbValue($row['ProductCD']);
        $this->Nos->setDbValue($row['Nos']);
        $this->WBCPath->setDbValue($row['WBCPath']);
        $this->RBCPath->setDbValue($row['RBCPath']);
        $this->PTPath->setDbValue($row['PTPath']);
        $this->ActualAmt->setDbValue($row['ActualAmt']);
        $this->NoSign->setDbValue($row['NoSign']);
        $this->_Barcode->setDbValue($row['Barcode']);
        $this->ReadTime->setDbValue($row['ReadTime']);
        $this->Result->setDbValue($row['Result']);
        $this->VailID->setDbValue($row['VailID']);
        $this->ReadMachine->setDbValue($row['ReadMachine']);
        $this->LabCD->setDbValue($row['LabCD']);
        $this->OutLabAmt->setDbValue($row['OutLabAmt']);
        $this->ProductQty->setDbValue($row['ProductQty']);
        $this->Repeat->setDbValue($row['Repeat']);
        $this->DeptNo->setDbValue($row['DeptNo']);
        $this->Desc1->setDbValue($row['Desc1']);
        $this->Desc2->setDbValue($row['Desc2']);
        $this->RptResult->setDbValue($row['RptResult']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Branch'] = null;
        $row['SidNo'] = null;
        $row['SidDate'] = null;
        $row['TestCd'] = null;
        $row['TestSubCd'] = null;
        $row['DEptCd'] = null;
        $row['ProfCd'] = null;
        $row['LabReport'] = null;
        $row['ResultDate'] = null;
        $row['Comments'] = null;
        $row['Method'] = null;
        $row['Specimen'] = null;
        $row['Amount'] = null;
        $row['ResultBy'] = null;
        $row['AuthBy'] = null;
        $row['AuthDate'] = null;
        $row['Abnormal'] = null;
        $row['Printed'] = null;
        $row['Dispatch'] = null;
        $row['LOWHIGH'] = null;
        $row['RefValue'] = null;
        $row['Unit'] = null;
        $row['ResDate'] = null;
        $row['Pic1'] = null;
        $row['Pic2'] = null;
        $row['GraphPath'] = null;
        $row['SampleDate'] = null;
        $row['SampleUser'] = null;
        $row['ReceivedDate'] = null;
        $row['ReceivedUser'] = null;
        $row['DeptRecvDate'] = null;
        $row['DeptRecvUser'] = null;
        $row['PrintBy'] = null;
        $row['PrintDate'] = null;
        $row['MachineCD'] = null;
        $row['TestCancel'] = null;
        $row['OutSource'] = null;
        $row['Tariff'] = null;
        $row['EDITDATE'] = null;
        $row['UPLOAD'] = null;
        $row['SAuthDate'] = null;
        $row['SAuthBy'] = null;
        $row['NoRC'] = null;
        $row['DispDt'] = null;
        $row['DispUser'] = null;
        $row['DispRemarks'] = null;
        $row['DispMode'] = null;
        $row['ProductCD'] = null;
        $row['Nos'] = null;
        $row['WBCPath'] = null;
        $row['RBCPath'] = null;
        $row['PTPath'] = null;
        $row['ActualAmt'] = null;
        $row['NoSign'] = null;
        $row['Barcode'] = null;
        $row['ReadTime'] = null;
        $row['Result'] = null;
        $row['VailID'] = null;
        $row['ReadMachine'] = null;
        $row['LabCD'] = null;
        $row['OutLabAmt'] = null;
        $row['ProductQty'] = null;
        $row['Repeat'] = null;
        $row['DeptNo'] = null;
        $row['Desc1'] = null;
        $row['Desc2'] = null;
        $row['RptResult'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        return false;
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
        if ($this->Tariff->FormValue == $this->Tariff->CurrentValue && is_numeric(ConvertToFloatString($this->Tariff->CurrentValue))) {
            $this->Tariff->CurrentValue = ConvertToFloatString($this->Tariff->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Nos->FormValue == $this->Nos->CurrentValue && is_numeric(ConvertToFloatString($this->Nos->CurrentValue))) {
            $this->Nos->CurrentValue = ConvertToFloatString($this->Nos->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ActualAmt->FormValue == $this->ActualAmt->CurrentValue && is_numeric(ConvertToFloatString($this->ActualAmt->CurrentValue))) {
            $this->ActualAmt->CurrentValue = ConvertToFloatString($this->ActualAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OutLabAmt->FormValue == $this->OutLabAmt->CurrentValue && is_numeric(ConvertToFloatString($this->OutLabAmt->CurrentValue))) {
            $this->OutLabAmt->CurrentValue = ConvertToFloatString($this->OutLabAmt->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->ProductQty->FormValue == $this->ProductQty->CurrentValue && is_numeric(ConvertToFloatString($this->ProductQty->CurrentValue))) {
            $this->ProductQty->CurrentValue = ConvertToFloatString($this->ProductQty->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Branch

        // SidNo

        // SidDate

        // TestCd

        // TestSubCd

        // DEptCd

        // ProfCd

        // LabReport

        // ResultDate

        // Comments

        // Method

        // Specimen

        // Amount

        // ResultBy

        // AuthBy

        // AuthDate

        // Abnormal

        // Printed

        // Dispatch

        // LOWHIGH

        // RefValue

        // Unit

        // ResDate

        // Pic1

        // Pic2

        // GraphPath

        // SampleDate

        // SampleUser

        // ReceivedDate

        // ReceivedUser

        // DeptRecvDate

        // DeptRecvUser

        // PrintBy

        // PrintDate

        // MachineCD

        // TestCancel

        // OutSource

        // Tariff

        // EDITDATE

        // UPLOAD

        // SAuthDate

        // SAuthBy

        // NoRC

        // DispDt

        // DispUser

        // DispRemarks

        // DispMode

        // ProductCD

        // Nos

        // WBCPath

        // RBCPath

        // PTPath

        // ActualAmt

        // NoSign

        // Barcode

        // ReadTime

        // Result

        // VailID

        // ReadMachine

        // LabCD

        // OutLabAmt

        // ProductQty

        // Repeat

        // DeptNo

        // Desc1

        // Desc2

        // RptResult
        if ($this->RowType == ROWTYPE_VIEW) {
            // Branch
            $this->Branch->ViewValue = $this->Branch->CurrentValue;
            $this->Branch->ViewCustomAttributes = "";

            // SidNo
            $this->SidNo->ViewValue = $this->SidNo->CurrentValue;
            $this->SidNo->ViewCustomAttributes = "";

            // SidDate
            $this->SidDate->ViewValue = $this->SidDate->CurrentValue;
            $this->SidDate->ViewValue = FormatDateTime($this->SidDate->ViewValue, 0);
            $this->SidDate->ViewCustomAttributes = "";

            // TestCd
            $this->TestCd->ViewValue = $this->TestCd->CurrentValue;
            $this->TestCd->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // DEptCd
            $this->DEptCd->ViewValue = $this->DEptCd->CurrentValue;
            $this->DEptCd->ViewCustomAttributes = "";

            // ProfCd
            $this->ProfCd->ViewValue = $this->ProfCd->CurrentValue;
            $this->ProfCd->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Specimen
            $this->Specimen->ViewValue = $this->Specimen->CurrentValue;
            $this->Specimen->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // ResultBy
            $this->ResultBy->ViewValue = $this->ResultBy->CurrentValue;
            $this->ResultBy->ViewCustomAttributes = "";

            // AuthBy
            $this->AuthBy->ViewValue = $this->AuthBy->CurrentValue;
            $this->AuthBy->ViewCustomAttributes = "";

            // AuthDate
            $this->AuthDate->ViewValue = $this->AuthDate->CurrentValue;
            $this->AuthDate->ViewValue = FormatDateTime($this->AuthDate->ViewValue, 0);
            $this->AuthDate->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Printed
            $this->Printed->ViewValue = $this->Printed->CurrentValue;
            $this->Printed->ViewCustomAttributes = "";

            // Dispatch
            $this->Dispatch->ViewValue = $this->Dispatch->CurrentValue;
            $this->Dispatch->ViewCustomAttributes = "";

            // LOWHIGH
            $this->LOWHIGH->ViewValue = $this->LOWHIGH->CurrentValue;
            $this->LOWHIGH->ViewCustomAttributes = "";

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewCustomAttributes = "";

            // ResDate
            $this->ResDate->ViewValue = $this->ResDate->CurrentValue;
            $this->ResDate->ViewValue = FormatDateTime($this->ResDate->ViewValue, 0);
            $this->ResDate->ViewCustomAttributes = "";

            // Pic1
            $this->Pic1->ViewValue = $this->Pic1->CurrentValue;
            $this->Pic1->ViewCustomAttributes = "";

            // Pic2
            $this->Pic2->ViewValue = $this->Pic2->CurrentValue;
            $this->Pic2->ViewCustomAttributes = "";

            // GraphPath
            $this->GraphPath->ViewValue = $this->GraphPath->CurrentValue;
            $this->GraphPath->ViewCustomAttributes = "";

            // SampleDate
            $this->SampleDate->ViewValue = $this->SampleDate->CurrentValue;
            $this->SampleDate->ViewValue = FormatDateTime($this->SampleDate->ViewValue, 0);
            $this->SampleDate->ViewCustomAttributes = "";

            // SampleUser
            $this->SampleUser->ViewValue = $this->SampleUser->CurrentValue;
            $this->SampleUser->ViewCustomAttributes = "";

            // ReceivedDate
            $this->ReceivedDate->ViewValue = $this->ReceivedDate->CurrentValue;
            $this->ReceivedDate->ViewValue = FormatDateTime($this->ReceivedDate->ViewValue, 0);
            $this->ReceivedDate->ViewCustomAttributes = "";

            // ReceivedUser
            $this->ReceivedUser->ViewValue = $this->ReceivedUser->CurrentValue;
            $this->ReceivedUser->ViewCustomAttributes = "";

            // DeptRecvDate
            $this->DeptRecvDate->ViewValue = $this->DeptRecvDate->CurrentValue;
            $this->DeptRecvDate->ViewValue = FormatDateTime($this->DeptRecvDate->ViewValue, 0);
            $this->DeptRecvDate->ViewCustomAttributes = "";

            // DeptRecvUser
            $this->DeptRecvUser->ViewValue = $this->DeptRecvUser->CurrentValue;
            $this->DeptRecvUser->ViewCustomAttributes = "";

            // PrintBy
            $this->PrintBy->ViewValue = $this->PrintBy->CurrentValue;
            $this->PrintBy->ViewCustomAttributes = "";

            // PrintDate
            $this->PrintDate->ViewValue = $this->PrintDate->CurrentValue;
            $this->PrintDate->ViewValue = FormatDateTime($this->PrintDate->ViewValue, 0);
            $this->PrintDate->ViewCustomAttributes = "";

            // MachineCD
            $this->MachineCD->ViewValue = $this->MachineCD->CurrentValue;
            $this->MachineCD->ViewCustomAttributes = "";

            // TestCancel
            $this->TestCancel->ViewValue = $this->TestCancel->CurrentValue;
            $this->TestCancel->ViewCustomAttributes = "";

            // OutSource
            $this->OutSource->ViewValue = $this->OutSource->CurrentValue;
            $this->OutSource->ViewCustomAttributes = "";

            // Tariff
            $this->Tariff->ViewValue = $this->Tariff->CurrentValue;
            $this->Tariff->ViewValue = FormatNumber($this->Tariff->ViewValue, 2, -2, -2, -2);
            $this->Tariff->ViewCustomAttributes = "";

            // EDITDATE
            $this->EDITDATE->ViewValue = $this->EDITDATE->CurrentValue;
            $this->EDITDATE->ViewValue = FormatDateTime($this->EDITDATE->ViewValue, 0);
            $this->EDITDATE->ViewCustomAttributes = "";

            // UPLOAD
            $this->UPLOAD->ViewValue = $this->UPLOAD->CurrentValue;
            $this->UPLOAD->ViewCustomAttributes = "";

            // SAuthDate
            $this->SAuthDate->ViewValue = $this->SAuthDate->CurrentValue;
            $this->SAuthDate->ViewValue = FormatDateTime($this->SAuthDate->ViewValue, 0);
            $this->SAuthDate->ViewCustomAttributes = "";

            // SAuthBy
            $this->SAuthBy->ViewValue = $this->SAuthBy->CurrentValue;
            $this->SAuthBy->ViewCustomAttributes = "";

            // NoRC
            $this->NoRC->ViewValue = $this->NoRC->CurrentValue;
            $this->NoRC->ViewCustomAttributes = "";

            // DispDt
            $this->DispDt->ViewValue = $this->DispDt->CurrentValue;
            $this->DispDt->ViewValue = FormatDateTime($this->DispDt->ViewValue, 0);
            $this->DispDt->ViewCustomAttributes = "";

            // DispUser
            $this->DispUser->ViewValue = $this->DispUser->CurrentValue;
            $this->DispUser->ViewCustomAttributes = "";

            // DispRemarks
            $this->DispRemarks->ViewValue = $this->DispRemarks->CurrentValue;
            $this->DispRemarks->ViewCustomAttributes = "";

            // DispMode
            $this->DispMode->ViewValue = $this->DispMode->CurrentValue;
            $this->DispMode->ViewCustomAttributes = "";

            // ProductCD
            $this->ProductCD->ViewValue = $this->ProductCD->CurrentValue;
            $this->ProductCD->ViewCustomAttributes = "";

            // Nos
            $this->Nos->ViewValue = $this->Nos->CurrentValue;
            $this->Nos->ViewValue = FormatNumber($this->Nos->ViewValue, 2, -2, -2, -2);
            $this->Nos->ViewCustomAttributes = "";

            // WBCPath
            $this->WBCPath->ViewValue = $this->WBCPath->CurrentValue;
            $this->WBCPath->ViewCustomAttributes = "";

            // RBCPath
            $this->RBCPath->ViewValue = $this->RBCPath->CurrentValue;
            $this->RBCPath->ViewCustomAttributes = "";

            // PTPath
            $this->PTPath->ViewValue = $this->PTPath->CurrentValue;
            $this->PTPath->ViewCustomAttributes = "";

            // ActualAmt
            $this->ActualAmt->ViewValue = $this->ActualAmt->CurrentValue;
            $this->ActualAmt->ViewValue = FormatNumber($this->ActualAmt->ViewValue, 2, -2, -2, -2);
            $this->ActualAmt->ViewCustomAttributes = "";

            // NoSign
            $this->NoSign->ViewValue = $this->NoSign->CurrentValue;
            $this->NoSign->ViewCustomAttributes = "";

            // Barcode
            $this->_Barcode->ViewValue = $this->_Barcode->CurrentValue;
            $this->_Barcode->ViewCustomAttributes = "";

            // ReadTime
            $this->ReadTime->ViewValue = $this->ReadTime->CurrentValue;
            $this->ReadTime->ViewValue = FormatDateTime($this->ReadTime->ViewValue, 0);
            $this->ReadTime->ViewCustomAttributes = "";

            // VailID
            $this->VailID->ViewValue = $this->VailID->CurrentValue;
            $this->VailID->ViewCustomAttributes = "";

            // ReadMachine
            $this->ReadMachine->ViewValue = $this->ReadMachine->CurrentValue;
            $this->ReadMachine->ViewCustomAttributes = "";

            // LabCD
            $this->LabCD->ViewValue = $this->LabCD->CurrentValue;
            $this->LabCD->ViewCustomAttributes = "";

            // OutLabAmt
            $this->OutLabAmt->ViewValue = $this->OutLabAmt->CurrentValue;
            $this->OutLabAmt->ViewValue = FormatNumber($this->OutLabAmt->ViewValue, 2, -2, -2, -2);
            $this->OutLabAmt->ViewCustomAttributes = "";

            // ProductQty
            $this->ProductQty->ViewValue = $this->ProductQty->CurrentValue;
            $this->ProductQty->ViewValue = FormatNumber($this->ProductQty->ViewValue, 2, -2, -2, -2);
            $this->ProductQty->ViewCustomAttributes = "";

            // Repeat
            $this->Repeat->ViewValue = $this->Repeat->CurrentValue;
            $this->Repeat->ViewCustomAttributes = "";

            // DeptNo
            $this->DeptNo->ViewValue = $this->DeptNo->CurrentValue;
            $this->DeptNo->ViewCustomAttributes = "";

            // Desc1
            $this->Desc1->ViewValue = $this->Desc1->CurrentValue;
            $this->Desc1->ViewCustomAttributes = "";

            // Desc2
            $this->Desc2->ViewValue = $this->Desc2->CurrentValue;
            $this->Desc2->ViewCustomAttributes = "";

            // RptResult
            $this->RptResult->ViewValue = $this->RptResult->CurrentValue;
            $this->RptResult->ViewCustomAttributes = "";

            // Branch
            $this->Branch->LinkCustomAttributes = "";
            $this->Branch->HrefValue = "";
            $this->Branch->TooltipValue = "";

            // SidNo
            $this->SidNo->LinkCustomAttributes = "";
            $this->SidNo->HrefValue = "";
            $this->SidNo->TooltipValue = "";

            // SidDate
            $this->SidDate->LinkCustomAttributes = "";
            $this->SidDate->HrefValue = "";
            $this->SidDate->TooltipValue = "";

            // TestCd
            $this->TestCd->LinkCustomAttributes = "";
            $this->TestCd->HrefValue = "";
            $this->TestCd->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // DEptCd
            $this->DEptCd->LinkCustomAttributes = "";
            $this->DEptCd->HrefValue = "";
            $this->DEptCd->TooltipValue = "";

            // ProfCd
            $this->ProfCd->LinkCustomAttributes = "";
            $this->ProfCd->HrefValue = "";
            $this->ProfCd->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Specimen
            $this->Specimen->LinkCustomAttributes = "";
            $this->Specimen->HrefValue = "";
            $this->Specimen->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // ResultBy
            $this->ResultBy->LinkCustomAttributes = "";
            $this->ResultBy->HrefValue = "";
            $this->ResultBy->TooltipValue = "";

            // AuthBy
            $this->AuthBy->LinkCustomAttributes = "";
            $this->AuthBy->HrefValue = "";
            $this->AuthBy->TooltipValue = "";

            // AuthDate
            $this->AuthDate->LinkCustomAttributes = "";
            $this->AuthDate->HrefValue = "";
            $this->AuthDate->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Printed
            $this->Printed->LinkCustomAttributes = "";
            $this->Printed->HrefValue = "";
            $this->Printed->TooltipValue = "";

            // Dispatch
            $this->Dispatch->LinkCustomAttributes = "";
            $this->Dispatch->HrefValue = "";
            $this->Dispatch->TooltipValue = "";

            // LOWHIGH
            $this->LOWHIGH->LinkCustomAttributes = "";
            $this->LOWHIGH->HrefValue = "";
            $this->LOWHIGH->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // ResDate
            $this->ResDate->LinkCustomAttributes = "";
            $this->ResDate->HrefValue = "";
            $this->ResDate->TooltipValue = "";

            // Pic1
            $this->Pic1->LinkCustomAttributes = "";
            $this->Pic1->HrefValue = "";
            $this->Pic1->TooltipValue = "";

            // Pic2
            $this->Pic2->LinkCustomAttributes = "";
            $this->Pic2->HrefValue = "";
            $this->Pic2->TooltipValue = "";

            // GraphPath
            $this->GraphPath->LinkCustomAttributes = "";
            $this->GraphPath->HrefValue = "";
            $this->GraphPath->TooltipValue = "";

            // SampleDate
            $this->SampleDate->LinkCustomAttributes = "";
            $this->SampleDate->HrefValue = "";
            $this->SampleDate->TooltipValue = "";

            // SampleUser
            $this->SampleUser->LinkCustomAttributes = "";
            $this->SampleUser->HrefValue = "";
            $this->SampleUser->TooltipValue = "";

            // ReceivedDate
            $this->ReceivedDate->LinkCustomAttributes = "";
            $this->ReceivedDate->HrefValue = "";
            $this->ReceivedDate->TooltipValue = "";

            // ReceivedUser
            $this->ReceivedUser->LinkCustomAttributes = "";
            $this->ReceivedUser->HrefValue = "";
            $this->ReceivedUser->TooltipValue = "";

            // DeptRecvDate
            $this->DeptRecvDate->LinkCustomAttributes = "";
            $this->DeptRecvDate->HrefValue = "";
            $this->DeptRecvDate->TooltipValue = "";

            // DeptRecvUser
            $this->DeptRecvUser->LinkCustomAttributes = "";
            $this->DeptRecvUser->HrefValue = "";
            $this->DeptRecvUser->TooltipValue = "";

            // PrintBy
            $this->PrintBy->LinkCustomAttributes = "";
            $this->PrintBy->HrefValue = "";
            $this->PrintBy->TooltipValue = "";

            // PrintDate
            $this->PrintDate->LinkCustomAttributes = "";
            $this->PrintDate->HrefValue = "";
            $this->PrintDate->TooltipValue = "";

            // MachineCD
            $this->MachineCD->LinkCustomAttributes = "";
            $this->MachineCD->HrefValue = "";
            $this->MachineCD->TooltipValue = "";

            // TestCancel
            $this->TestCancel->LinkCustomAttributes = "";
            $this->TestCancel->HrefValue = "";
            $this->TestCancel->TooltipValue = "";

            // OutSource
            $this->OutSource->LinkCustomAttributes = "";
            $this->OutSource->HrefValue = "";
            $this->OutSource->TooltipValue = "";

            // Tariff
            $this->Tariff->LinkCustomAttributes = "";
            $this->Tariff->HrefValue = "";
            $this->Tariff->TooltipValue = "";

            // EDITDATE
            $this->EDITDATE->LinkCustomAttributes = "";
            $this->EDITDATE->HrefValue = "";
            $this->EDITDATE->TooltipValue = "";

            // UPLOAD
            $this->UPLOAD->LinkCustomAttributes = "";
            $this->UPLOAD->HrefValue = "";
            $this->UPLOAD->TooltipValue = "";

            // SAuthDate
            $this->SAuthDate->LinkCustomAttributes = "";
            $this->SAuthDate->HrefValue = "";
            $this->SAuthDate->TooltipValue = "";

            // SAuthBy
            $this->SAuthBy->LinkCustomAttributes = "";
            $this->SAuthBy->HrefValue = "";
            $this->SAuthBy->TooltipValue = "";

            // NoRC
            $this->NoRC->LinkCustomAttributes = "";
            $this->NoRC->HrefValue = "";
            $this->NoRC->TooltipValue = "";

            // DispDt
            $this->DispDt->LinkCustomAttributes = "";
            $this->DispDt->HrefValue = "";
            $this->DispDt->TooltipValue = "";

            // DispUser
            $this->DispUser->LinkCustomAttributes = "";
            $this->DispUser->HrefValue = "";
            $this->DispUser->TooltipValue = "";

            // DispRemarks
            $this->DispRemarks->LinkCustomAttributes = "";
            $this->DispRemarks->HrefValue = "";
            $this->DispRemarks->TooltipValue = "";

            // DispMode
            $this->DispMode->LinkCustomAttributes = "";
            $this->DispMode->HrefValue = "";
            $this->DispMode->TooltipValue = "";

            // ProductCD
            $this->ProductCD->LinkCustomAttributes = "";
            $this->ProductCD->HrefValue = "";
            $this->ProductCD->TooltipValue = "";

            // Nos
            $this->Nos->LinkCustomAttributes = "";
            $this->Nos->HrefValue = "";
            $this->Nos->TooltipValue = "";

            // WBCPath
            $this->WBCPath->LinkCustomAttributes = "";
            $this->WBCPath->HrefValue = "";
            $this->WBCPath->TooltipValue = "";

            // RBCPath
            $this->RBCPath->LinkCustomAttributes = "";
            $this->RBCPath->HrefValue = "";
            $this->RBCPath->TooltipValue = "";

            // PTPath
            $this->PTPath->LinkCustomAttributes = "";
            $this->PTPath->HrefValue = "";
            $this->PTPath->TooltipValue = "";

            // ActualAmt
            $this->ActualAmt->LinkCustomAttributes = "";
            $this->ActualAmt->HrefValue = "";
            $this->ActualAmt->TooltipValue = "";

            // NoSign
            $this->NoSign->LinkCustomAttributes = "";
            $this->NoSign->HrefValue = "";
            $this->NoSign->TooltipValue = "";

            // Barcode
            $this->_Barcode->LinkCustomAttributes = "";
            $this->_Barcode->HrefValue = "";
            $this->_Barcode->TooltipValue = "";

            // ReadTime
            $this->ReadTime->LinkCustomAttributes = "";
            $this->ReadTime->HrefValue = "";
            $this->ReadTime->TooltipValue = "";

            // VailID
            $this->VailID->LinkCustomAttributes = "";
            $this->VailID->HrefValue = "";
            $this->VailID->TooltipValue = "";

            // ReadMachine
            $this->ReadMachine->LinkCustomAttributes = "";
            $this->ReadMachine->HrefValue = "";
            $this->ReadMachine->TooltipValue = "";

            // LabCD
            $this->LabCD->LinkCustomAttributes = "";
            $this->LabCD->HrefValue = "";
            $this->LabCD->TooltipValue = "";

            // OutLabAmt
            $this->OutLabAmt->LinkCustomAttributes = "";
            $this->OutLabAmt->HrefValue = "";
            $this->OutLabAmt->TooltipValue = "";

            // ProductQty
            $this->ProductQty->LinkCustomAttributes = "";
            $this->ProductQty->HrefValue = "";
            $this->ProductQty->TooltipValue = "";

            // Repeat
            $this->Repeat->LinkCustomAttributes = "";
            $this->Repeat->HrefValue = "";
            $this->Repeat->TooltipValue = "";

            // DeptNo
            $this->DeptNo->LinkCustomAttributes = "";
            $this->DeptNo->HrefValue = "";
            $this->DeptNo->TooltipValue = "";

            // Desc1
            $this->Desc1->LinkCustomAttributes = "";
            $this->Desc1->HrefValue = "";
            $this->Desc1->TooltipValue = "";

            // Desc2
            $this->Desc2->LinkCustomAttributes = "";
            $this->Desc2->HrefValue = "";
            $this->Desc2->TooltipValue = "";

            // RptResult
            $this->RptResult->LinkCustomAttributes = "";
            $this->RptResult->HrefValue = "";
            $this->RptResult->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"flab_test_resultlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
