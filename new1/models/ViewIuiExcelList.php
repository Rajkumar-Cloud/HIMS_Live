<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIuiExcelList extends ViewIuiExcel
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_iui_excel';

    // Page object name
    public $PageObjName = "ViewIuiExcelList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fview_iui_excellist";
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

        // Table object (view_iui_excel)
        if (!isset($GLOBALS["view_iui_excel"]) || get_class($GLOBALS["view_iui_excel"]) == PROJECT_NAMESPACE . "view_iui_excel") {
            $GLOBALS["view_iui_excel"] = &$this;
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
        $this->AddUrl = "ViewIuiExcelAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewIuiExcelDelete";
        $this->MultiUpdateUrl = "ViewIuiExcelUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_iui_excel');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_iui_excellistsrch";

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
                $doc = new $class(Container("view_iui_excel"));
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
            $key .= @$ar['CoupleID'];
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
        $this->NAME->setVisibility();
        $this->HUSBAND_NAME->setVisibility();
        $this->CoupleID->setVisibility();
        $this->AGE___WIFE->setVisibility();
        $this->AGE_HUSBAND->setVisibility();
        $this->ANXIOUS_TO_CONCEIVE_FOR->setVisibility();
        $this->AMH__NGML->setVisibility();
        $this->TUBAL_PATENCY->setVisibility();
        $this->HSG->setVisibility();
        $this->DHL->setVisibility();
        $this->UTERINE_PROBLEMS->setVisibility();
        $this->W_COMORBIDS->setVisibility();
        $this->H_COMORBIDS->setVisibility();
        $this->SEXUAL_DYSFUNCTION->setVisibility();
        $this->PREV_IUI->setVisibility();
        $this->PREV_IVF->Visible = false;
        $this->TABLETS->setVisibility();
        $this->INJTYPE->setVisibility();
        $this->LMP->setVisibility();
        $this->TRIGGERR->setVisibility();
        $this->TRIGGERDATE->setVisibility();
        $this->FOLLICLE_STATUS->setVisibility();
        $this->NUMBER_OF_IUI->setVisibility();
        $this->PROCEDURE->setVisibility();
        $this->LUTEAL_SUPPORT->setVisibility();
        $this->HD_SAMPLE->setVisibility();
        $this->DONOR__ID->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->COLLECTION__METHOD->setVisibility();
        $this->SAMPLE_SOURCE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
        $this->SPECIFIC_MATERNAL_PROBLEMS->setVisibility();
        $this->RESULTS->Visible = false;
        $this->ONGOING_PREG->setVisibility();
        $this->EDD_Date->setVisibility();
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
            $this->CoupleID->setOldValue($arKeyFlds[0]);
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
        $filterList = Concat($filterList, $this->NAME->AdvancedSearch->toJson(), ","); // Field NAME
        $filterList = Concat($filterList, $this->HUSBAND_NAME->AdvancedSearch->toJson(), ","); // Field HUSBAND NAME
        $filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
        $filterList = Concat($filterList, $this->AGE___WIFE->AdvancedSearch->toJson(), ","); // Field AGE  - WIFE
        $filterList = Concat($filterList, $this->AGE_HUSBAND->AdvancedSearch->toJson(), ","); // Field AGE- HUSBAND
        $filterList = Concat($filterList, $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->toJson(), ","); // Field ANXIOUS TO CONCEIVE FOR
        $filterList = Concat($filterList, $this->AMH__NGML->AdvancedSearch->toJson(), ","); // Field AMH ( NG/ML)
        $filterList = Concat($filterList, $this->TUBAL_PATENCY->AdvancedSearch->toJson(), ","); // Field TUBAL_PATENCY
        $filterList = Concat($filterList, $this->HSG->AdvancedSearch->toJson(), ","); // Field HSG
        $filterList = Concat($filterList, $this->DHL->AdvancedSearch->toJson(), ","); // Field DHL
        $filterList = Concat($filterList, $this->UTERINE_PROBLEMS->AdvancedSearch->toJson(), ","); // Field UTERINE_PROBLEMS
        $filterList = Concat($filterList, $this->W_COMORBIDS->AdvancedSearch->toJson(), ","); // Field W_COMORBIDS
        $filterList = Concat($filterList, $this->H_COMORBIDS->AdvancedSearch->toJson(), ","); // Field H_COMORBIDS
        $filterList = Concat($filterList, $this->SEXUAL_DYSFUNCTION->AdvancedSearch->toJson(), ","); // Field SEXUAL_DYSFUNCTION
        $filterList = Concat($filterList, $this->PREV_IUI->AdvancedSearch->toJson(), ","); // Field PREV IUI
        $filterList = Concat($filterList, $this->PREV_IVF->AdvancedSearch->toJson(), ","); // Field PREV_IVF
        $filterList = Concat($filterList, $this->TABLETS->AdvancedSearch->toJson(), ","); // Field TABLETS
        $filterList = Concat($filterList, $this->INJTYPE->AdvancedSearch->toJson(), ","); // Field INJTYPE
        $filterList = Concat($filterList, $this->LMP->AdvancedSearch->toJson(), ","); // Field LMP
        $filterList = Concat($filterList, $this->TRIGGERR->AdvancedSearch->toJson(), ","); // Field TRIGGERR
        $filterList = Concat($filterList, $this->TRIGGERDATE->AdvancedSearch->toJson(), ","); // Field TRIGGERDATE
        $filterList = Concat($filterList, $this->FOLLICLE_STATUS->AdvancedSearch->toJson(), ","); // Field FOLLICLE_STATUS
        $filterList = Concat($filterList, $this->NUMBER_OF_IUI->AdvancedSearch->toJson(), ","); // Field NUMBER_OF_IUI
        $filterList = Concat($filterList, $this->PROCEDURE->AdvancedSearch->toJson(), ","); // Field PROCEDURE
        $filterList = Concat($filterList, $this->LUTEAL_SUPPORT->AdvancedSearch->toJson(), ","); // Field LUTEAL_SUPPORT
        $filterList = Concat($filterList, $this->HD_SAMPLE->AdvancedSearch->toJson(), ","); // Field H/D SAMPLE
        $filterList = Concat($filterList, $this->DONOR__ID->AdvancedSearch->toJson(), ","); // Field DONOR - I.D
        $filterList = Concat($filterList, $this->PREG_TEST_DATE->AdvancedSearch->toJson(), ","); // Field PREG_TEST_DATE
        $filterList = Concat($filterList, $this->COLLECTION__METHOD->AdvancedSearch->toJson(), ","); // Field COLLECTION  METHOD
        $filterList = Concat($filterList, $this->SAMPLE_SOURCE->AdvancedSearch->toJson(), ","); // Field SAMPLE SOURCE
        $filterList = Concat($filterList, $this->SPECIFIC_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_PROBLEMS
        $filterList = Concat($filterList, $this->IMSC_1->AdvancedSearch->toJson(), ","); // Field IMSC_1
        $filterList = Concat($filterList, $this->IMSC_2->AdvancedSearch->toJson(), ","); // Field IMSC_2
        $filterList = Concat($filterList, $this->LIQUIFACTION_STORAGE->AdvancedSearch->toJson(), ","); // Field LIQUIFACTION_STORAGE
        $filterList = Concat($filterList, $this->IUI_PREP_METHOD->AdvancedSearch->toJson(), ","); // Field IUI_PREP_METHOD
        $filterList = Concat($filterList, $this->TIME_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME_FROM_TRIGGER
        $filterList = Concat($filterList, $this->COLLECTION_TO_PREPARATION->AdvancedSearch->toJson(), ","); // Field COLLECTION_TO_PREPARATION
        $filterList = Concat($filterList, $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->toJson(), ","); // Field TIME_FROM_PREP_TO_INSEM
        $filterList = Concat($filterList, $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_MATERNAL_PROBLEMS
        $filterList = Concat($filterList, $this->RESULTS->AdvancedSearch->toJson(), ","); // Field RESULTS
        $filterList = Concat($filterList, $this->ONGOING_PREG->AdvancedSearch->toJson(), ","); // Field ONGOING_PREG
        $filterList = Concat($filterList, $this->EDD_Date->AdvancedSearch->toJson(), ","); // Field EDD_Date
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_iui_excellistsrch", $filters);
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

        // Field NAME
        $this->NAME->AdvancedSearch->SearchValue = @$filter["x_NAME"];
        $this->NAME->AdvancedSearch->SearchOperator = @$filter["z_NAME"];
        $this->NAME->AdvancedSearch->SearchCondition = @$filter["v_NAME"];
        $this->NAME->AdvancedSearch->SearchValue2 = @$filter["y_NAME"];
        $this->NAME->AdvancedSearch->SearchOperator2 = @$filter["w_NAME"];
        $this->NAME->AdvancedSearch->save();

        // Field HUSBAND NAME
        $this->HUSBAND_NAME->AdvancedSearch->SearchValue = @$filter["x_HUSBAND_NAME"];
        $this->HUSBAND_NAME->AdvancedSearch->SearchOperator = @$filter["z_HUSBAND_NAME"];
        $this->HUSBAND_NAME->AdvancedSearch->SearchCondition = @$filter["v_HUSBAND_NAME"];
        $this->HUSBAND_NAME->AdvancedSearch->SearchValue2 = @$filter["y_HUSBAND_NAME"];
        $this->HUSBAND_NAME->AdvancedSearch->SearchOperator2 = @$filter["w_HUSBAND_NAME"];
        $this->HUSBAND_NAME->AdvancedSearch->save();

        // Field CoupleID
        $this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
        $this->CoupleID->AdvancedSearch->save();

        // Field AGE  - WIFE
        $this->AGE___WIFE->AdvancedSearch->SearchValue = @$filter["x_AGE___WIFE"];
        $this->AGE___WIFE->AdvancedSearch->SearchOperator = @$filter["z_AGE___WIFE"];
        $this->AGE___WIFE->AdvancedSearch->SearchCondition = @$filter["v_AGE___WIFE"];
        $this->AGE___WIFE->AdvancedSearch->SearchValue2 = @$filter["y_AGE___WIFE"];
        $this->AGE___WIFE->AdvancedSearch->SearchOperator2 = @$filter["w_AGE___WIFE"];
        $this->AGE___WIFE->AdvancedSearch->save();

        // Field AGE- HUSBAND
        $this->AGE_HUSBAND->AdvancedSearch->SearchValue = @$filter["x_AGE_HUSBAND"];
        $this->AGE_HUSBAND->AdvancedSearch->SearchOperator = @$filter["z_AGE_HUSBAND"];
        $this->AGE_HUSBAND->AdvancedSearch->SearchCondition = @$filter["v_AGE_HUSBAND"];
        $this->AGE_HUSBAND->AdvancedSearch->SearchValue2 = @$filter["y_AGE_HUSBAND"];
        $this->AGE_HUSBAND->AdvancedSearch->SearchOperator2 = @$filter["w_AGE_HUSBAND"];
        $this->AGE_HUSBAND->AdvancedSearch->save();

        // Field ANXIOUS TO CONCEIVE FOR
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue = @$filter["x_ANXIOUS_TO_CONCEIVE_FOR"];
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchOperator = @$filter["z_ANXIOUS_TO_CONCEIVE_FOR"];
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchCondition = @$filter["v_ANXIOUS_TO_CONCEIVE_FOR"];
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchValue2 = @$filter["y_ANXIOUS_TO_CONCEIVE_FOR"];
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->SearchOperator2 = @$filter["w_ANXIOUS_TO_CONCEIVE_FOR"];
        $this->ANXIOUS_TO_CONCEIVE_FOR->AdvancedSearch->save();

        // Field AMH ( NG/ML)
        $this->AMH__NGML->AdvancedSearch->SearchValue = @$filter["x_AMH__NGML"];
        $this->AMH__NGML->AdvancedSearch->SearchOperator = @$filter["z_AMH__NGML"];
        $this->AMH__NGML->AdvancedSearch->SearchCondition = @$filter["v_AMH__NGML"];
        $this->AMH__NGML->AdvancedSearch->SearchValue2 = @$filter["y_AMH__NGML"];
        $this->AMH__NGML->AdvancedSearch->SearchOperator2 = @$filter["w_AMH__NGML"];
        $this->AMH__NGML->AdvancedSearch->save();

        // Field TUBAL_PATENCY
        $this->TUBAL_PATENCY->AdvancedSearch->SearchValue = @$filter["x_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchOperator = @$filter["z_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchCondition = @$filter["v_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchValue2 = @$filter["y_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->SearchOperator2 = @$filter["w_TUBAL_PATENCY"];
        $this->TUBAL_PATENCY->AdvancedSearch->save();

        // Field HSG
        $this->HSG->AdvancedSearch->SearchValue = @$filter["x_HSG"];
        $this->HSG->AdvancedSearch->SearchOperator = @$filter["z_HSG"];
        $this->HSG->AdvancedSearch->SearchCondition = @$filter["v_HSG"];
        $this->HSG->AdvancedSearch->SearchValue2 = @$filter["y_HSG"];
        $this->HSG->AdvancedSearch->SearchOperator2 = @$filter["w_HSG"];
        $this->HSG->AdvancedSearch->save();

        // Field DHL
        $this->DHL->AdvancedSearch->SearchValue = @$filter["x_DHL"];
        $this->DHL->AdvancedSearch->SearchOperator = @$filter["z_DHL"];
        $this->DHL->AdvancedSearch->SearchCondition = @$filter["v_DHL"];
        $this->DHL->AdvancedSearch->SearchValue2 = @$filter["y_DHL"];
        $this->DHL->AdvancedSearch->SearchOperator2 = @$filter["w_DHL"];
        $this->DHL->AdvancedSearch->save();

        // Field UTERINE_PROBLEMS
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_UTERINE_PROBLEMS"];
        $this->UTERINE_PROBLEMS->AdvancedSearch->save();

        // Field W_COMORBIDS
        $this->W_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_W_COMORBIDS"];
        $this->W_COMORBIDS->AdvancedSearch->save();

        // Field H_COMORBIDS
        $this->H_COMORBIDS->AdvancedSearch->SearchValue = @$filter["x_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchOperator = @$filter["z_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchCondition = @$filter["v_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchValue2 = @$filter["y_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->SearchOperator2 = @$filter["w_H_COMORBIDS"];
        $this->H_COMORBIDS->AdvancedSearch->save();

        // Field SEXUAL_DYSFUNCTION
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue = @$filter["x_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator = @$filter["z_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchCondition = @$filter["v_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchValue2 = @$filter["y_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->SearchOperator2 = @$filter["w_SEXUAL_DYSFUNCTION"];
        $this->SEXUAL_DYSFUNCTION->AdvancedSearch->save();

        // Field PREV IUI
        $this->PREV_IUI->AdvancedSearch->SearchValue = @$filter["x_PREV_IUI"];
        $this->PREV_IUI->AdvancedSearch->SearchOperator = @$filter["z_PREV_IUI"];
        $this->PREV_IUI->AdvancedSearch->SearchCondition = @$filter["v_PREV_IUI"];
        $this->PREV_IUI->AdvancedSearch->SearchValue2 = @$filter["y_PREV_IUI"];
        $this->PREV_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_PREV_IUI"];
        $this->PREV_IUI->AdvancedSearch->save();

        // Field PREV_IVF
        $this->PREV_IVF->AdvancedSearch->SearchValue = @$filter["x_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchOperator = @$filter["z_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchCondition = @$filter["v_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchValue2 = @$filter["y_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->SearchOperator2 = @$filter["w_PREV_IVF"];
        $this->PREV_IVF->AdvancedSearch->save();

        // Field TABLETS
        $this->TABLETS->AdvancedSearch->SearchValue = @$filter["x_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchOperator = @$filter["z_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchCondition = @$filter["v_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchValue2 = @$filter["y_TABLETS"];
        $this->TABLETS->AdvancedSearch->SearchOperator2 = @$filter["w_TABLETS"];
        $this->TABLETS->AdvancedSearch->save();

        // Field INJTYPE
        $this->INJTYPE->AdvancedSearch->SearchValue = @$filter["x_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchOperator = @$filter["z_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchCondition = @$filter["v_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchValue2 = @$filter["y_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_INJTYPE"];
        $this->INJTYPE->AdvancedSearch->save();

        // Field LMP
        $this->LMP->AdvancedSearch->SearchValue = @$filter["x_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator = @$filter["z_LMP"];
        $this->LMP->AdvancedSearch->SearchCondition = @$filter["v_LMP"];
        $this->LMP->AdvancedSearch->SearchValue2 = @$filter["y_LMP"];
        $this->LMP->AdvancedSearch->SearchOperator2 = @$filter["w_LMP"];
        $this->LMP->AdvancedSearch->save();

        // Field TRIGGERR
        $this->TRIGGERR->AdvancedSearch->SearchValue = @$filter["x_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERR"];
        $this->TRIGGERR->AdvancedSearch->save();

        // Field TRIGGERDATE
        $this->TRIGGERDATE->AdvancedSearch->SearchValue = @$filter["x_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchOperator = @$filter["z_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchCondition = @$filter["v_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchValue2 = @$filter["y_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->SearchOperator2 = @$filter["w_TRIGGERDATE"];
        $this->TRIGGERDATE->AdvancedSearch->save();

        // Field FOLLICLE_STATUS
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue = @$filter["x_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator = @$filter["z_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchCondition = @$filter["v_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchValue2 = @$filter["y_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_FOLLICLE_STATUS"];
        $this->FOLLICLE_STATUS->AdvancedSearch->save();

        // Field NUMBER_OF_IUI
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue = @$filter["x_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator = @$filter["z_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchCondition = @$filter["v_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchValue2 = @$filter["y_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->SearchOperator2 = @$filter["w_NUMBER_OF_IUI"];
        $this->NUMBER_OF_IUI->AdvancedSearch->save();

        // Field PROCEDURE
        $this->PROCEDURE->AdvancedSearch->SearchValue = @$filter["x_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchOperator = @$filter["z_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchCondition = @$filter["v_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchValue2 = @$filter["y_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->SearchOperator2 = @$filter["w_PROCEDURE"];
        $this->PROCEDURE->AdvancedSearch->save();

        // Field LUTEAL_SUPPORT
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue = @$filter["x_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator = @$filter["z_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchCondition = @$filter["v_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchValue2 = @$filter["y_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->SearchOperator2 = @$filter["w_LUTEAL_SUPPORT"];
        $this->LUTEAL_SUPPORT->AdvancedSearch->save();

        // Field H/D SAMPLE
        $this->HD_SAMPLE->AdvancedSearch->SearchValue = @$filter["x_HD_SAMPLE"];
        $this->HD_SAMPLE->AdvancedSearch->SearchOperator = @$filter["z_HD_SAMPLE"];
        $this->HD_SAMPLE->AdvancedSearch->SearchCondition = @$filter["v_HD_SAMPLE"];
        $this->HD_SAMPLE->AdvancedSearch->SearchValue2 = @$filter["y_HD_SAMPLE"];
        $this->HD_SAMPLE->AdvancedSearch->SearchOperator2 = @$filter["w_HD_SAMPLE"];
        $this->HD_SAMPLE->AdvancedSearch->save();

        // Field DONOR - I.D
        $this->DONOR__ID->AdvancedSearch->SearchValue = @$filter["x_DONOR__ID"];
        $this->DONOR__ID->AdvancedSearch->SearchOperator = @$filter["z_DONOR__ID"];
        $this->DONOR__ID->AdvancedSearch->SearchCondition = @$filter["v_DONOR__ID"];
        $this->DONOR__ID->AdvancedSearch->SearchValue2 = @$filter["y_DONOR__ID"];
        $this->DONOR__ID->AdvancedSearch->SearchOperator2 = @$filter["w_DONOR__ID"];
        $this->DONOR__ID->AdvancedSearch->save();

        // Field PREG_TEST_DATE
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue = @$filter["x_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator = @$filter["z_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchCondition = @$filter["v_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 = @$filter["y_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator2 = @$filter["w_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->save();

        // Field COLLECTION  METHOD
        $this->COLLECTION__METHOD->AdvancedSearch->SearchValue = @$filter["x_COLLECTION__METHOD"];
        $this->COLLECTION__METHOD->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION__METHOD"];
        $this->COLLECTION__METHOD->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION__METHOD"];
        $this->COLLECTION__METHOD->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION__METHOD"];
        $this->COLLECTION__METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION__METHOD"];
        $this->COLLECTION__METHOD->AdvancedSearch->save();

        // Field SAMPLE SOURCE
        $this->SAMPLE_SOURCE->AdvancedSearch->SearchValue = @$filter["x_SAMPLE_SOURCE"];
        $this->SAMPLE_SOURCE->AdvancedSearch->SearchOperator = @$filter["z_SAMPLE_SOURCE"];
        $this->SAMPLE_SOURCE->AdvancedSearch->SearchCondition = @$filter["v_SAMPLE_SOURCE"];
        $this->SAMPLE_SOURCE->AdvancedSearch->SearchValue2 = @$filter["y_SAMPLE_SOURCE"];
        $this->SAMPLE_SOURCE->AdvancedSearch->SearchOperator2 = @$filter["w_SAMPLE_SOURCE"];
        $this->SAMPLE_SOURCE->AdvancedSearch->save();

        // Field SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->save();

        // Field IMSC_1
        $this->IMSC_1->AdvancedSearch->SearchValue = @$filter["x_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator = @$filter["z_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchCondition = @$filter["v_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->save();

        // Field IMSC_2
        $this->IMSC_2->AdvancedSearch->SearchValue = @$filter["x_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator = @$filter["z_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchCondition = @$filter["v_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->save();

        // Field LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = @$filter["x_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator = @$filter["z_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchCondition = @$filter["v_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 = @$filter["y_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator2 = @$filter["w_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->save();

        // Field IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = @$filter["x_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator = @$filter["z_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchCondition = @$filter["v_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 = @$filter["y_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->save();

        // Field TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->save();

        // Field COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = @$filter["x_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save();

        // Field TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save();

        // Field SPECIFIC_MATERNAL_PROBLEMS
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_MATERNAL_PROBLEMS"];
        $this->SPECIFIC_MATERNAL_PROBLEMS->AdvancedSearch->save();

        // Field RESULTS
        $this->RESULTS->AdvancedSearch->SearchValue = @$filter["x_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchOperator = @$filter["z_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchCondition = @$filter["v_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchValue2 = @$filter["y_RESULTS"];
        $this->RESULTS->AdvancedSearch->SearchOperator2 = @$filter["w_RESULTS"];
        $this->RESULTS->AdvancedSearch->save();

        // Field ONGOING_PREG
        $this->ONGOING_PREG->AdvancedSearch->SearchValue = @$filter["x_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchOperator = @$filter["z_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchCondition = @$filter["v_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchValue2 = @$filter["y_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->SearchOperator2 = @$filter["w_ONGOING_PREG"];
        $this->ONGOING_PREG->AdvancedSearch->save();

        // Field EDD_Date
        $this->EDD_Date->AdvancedSearch->SearchValue = @$filter["x_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchOperator = @$filter["z_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchCondition = @$filter["v_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchValue2 = @$filter["y_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->SearchOperator2 = @$filter["w_EDD_Date"];
        $this->EDD_Date->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->NAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HUSBAND_NAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AGE___WIFE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AGE_HUSBAND, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ANXIOUS_TO_CONCEIVE_FOR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AMH__NGML, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TUBAL_PATENCY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HSG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DHL, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UTERINE_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->W_COMORBIDS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->H_COMORBIDS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SEXUAL_DYSFUNCTION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PREV_IUI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PREV_IVF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TABLETS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->INJTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TRIGGERR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FOLLICLE_STATUS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NUMBER_OF_IUI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PROCEDURE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LUTEAL_SUPPORT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HD_SAMPLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTION__METHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SAMPLE_SOURCE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LIQUIFACTION_STORAGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUI_PREP_METHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_TRIGGER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTION_TO_PREPARATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_MATERNAL_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULTS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ONGOING_PREG, $arKeywords, $type);
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
            $this->updateSort($this->NAME); // NAME
            $this->updateSort($this->HUSBAND_NAME); // HUSBAND NAME
            $this->updateSort($this->CoupleID); // CoupleID
            $this->updateSort($this->AGE___WIFE); // AGE  - WIFE
            $this->updateSort($this->AGE_HUSBAND); // AGE- HUSBAND
            $this->updateSort($this->ANXIOUS_TO_CONCEIVE_FOR); // ANXIOUS TO CONCEIVE FOR
            $this->updateSort($this->AMH__NGML); // AMH ( NG/ML)
            $this->updateSort($this->TUBAL_PATENCY); // TUBAL_PATENCY
            $this->updateSort($this->HSG); // HSG
            $this->updateSort($this->DHL); // DHL
            $this->updateSort($this->UTERINE_PROBLEMS); // UTERINE_PROBLEMS
            $this->updateSort($this->W_COMORBIDS); // W_COMORBIDS
            $this->updateSort($this->H_COMORBIDS); // H_COMORBIDS
            $this->updateSort($this->SEXUAL_DYSFUNCTION); // SEXUAL_DYSFUNCTION
            $this->updateSort($this->PREV_IUI); // PREV IUI
            $this->updateSort($this->TABLETS); // TABLETS
            $this->updateSort($this->INJTYPE); // INJTYPE
            $this->updateSort($this->LMP); // LMP
            $this->updateSort($this->TRIGGERR); // TRIGGERR
            $this->updateSort($this->TRIGGERDATE); // TRIGGERDATE
            $this->updateSort($this->FOLLICLE_STATUS); // FOLLICLE_STATUS
            $this->updateSort($this->NUMBER_OF_IUI); // NUMBER_OF_IUI
            $this->updateSort($this->PROCEDURE); // PROCEDURE
            $this->updateSort($this->LUTEAL_SUPPORT); // LUTEAL_SUPPORT
            $this->updateSort($this->HD_SAMPLE); // H/D SAMPLE
            $this->updateSort($this->DONOR__ID); // DONOR - I.D
            $this->updateSort($this->PREG_TEST_DATE); // PREG_TEST_DATE
            $this->updateSort($this->COLLECTION__METHOD); // COLLECTION  METHOD
            $this->updateSort($this->SAMPLE_SOURCE); // SAMPLE SOURCE
            $this->updateSort($this->SPECIFIC_PROBLEMS); // SPECIFIC_PROBLEMS
            $this->updateSort($this->IMSC_1); // IMSC_1
            $this->updateSort($this->IMSC_2); // IMSC_2
            $this->updateSort($this->LIQUIFACTION_STORAGE); // LIQUIFACTION_STORAGE
            $this->updateSort($this->IUI_PREP_METHOD); // IUI_PREP_METHOD
            $this->updateSort($this->TIME_FROM_TRIGGER); // TIME_FROM_TRIGGER
            $this->updateSort($this->COLLECTION_TO_PREPARATION); // COLLECTION_TO_PREPARATION
            $this->updateSort($this->TIME_FROM_PREP_TO_INSEM); // TIME_FROM_PREP_TO_INSEM
            $this->updateSort($this->SPECIFIC_MATERNAL_PROBLEMS); // SPECIFIC_MATERNAL_PROBLEMS
            $this->updateSort($this->ONGOING_PREG); // ONGOING_PREG
            $this->updateSort($this->EDD_Date); // EDD_Date
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
                $this->NAME->setSort("");
                $this->HUSBAND_NAME->setSort("");
                $this->CoupleID->setSort("");
                $this->AGE___WIFE->setSort("");
                $this->AGE_HUSBAND->setSort("");
                $this->ANXIOUS_TO_CONCEIVE_FOR->setSort("");
                $this->AMH__NGML->setSort("");
                $this->TUBAL_PATENCY->setSort("");
                $this->HSG->setSort("");
                $this->DHL->setSort("");
                $this->UTERINE_PROBLEMS->setSort("");
                $this->W_COMORBIDS->setSort("");
                $this->H_COMORBIDS->setSort("");
                $this->SEXUAL_DYSFUNCTION->setSort("");
                $this->PREV_IUI->setSort("");
                $this->PREV_IVF->setSort("");
                $this->TABLETS->setSort("");
                $this->INJTYPE->setSort("");
                $this->LMP->setSort("");
                $this->TRIGGERR->setSort("");
                $this->TRIGGERDATE->setSort("");
                $this->FOLLICLE_STATUS->setSort("");
                $this->NUMBER_OF_IUI->setSort("");
                $this->PROCEDURE->setSort("");
                $this->LUTEAL_SUPPORT->setSort("");
                $this->HD_SAMPLE->setSort("");
                $this->DONOR__ID->setSort("");
                $this->PREG_TEST_DATE->setSort("");
                $this->COLLECTION__METHOD->setSort("");
                $this->SAMPLE_SOURCE->setSort("");
                $this->SPECIFIC_PROBLEMS->setSort("");
                $this->IMSC_1->setSort("");
                $this->IMSC_2->setSort("");
                $this->LIQUIFACTION_STORAGE->setSort("");
                $this->IUI_PREP_METHOD->setSort("");
                $this->TIME_FROM_TRIGGER->setSort("");
                $this->COLLECTION_TO_PREPARATION->setSort("");
                $this->TIME_FROM_PREP_TO_INSEM->setSort("");
                $this->SPECIFIC_MATERNAL_PROBLEMS->setSort("");
                $this->RESULTS->setSort("");
                $this->ONGOING_PREG->setSort("");
                $this->EDD_Date->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->CoupleID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_iui_excellistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_iui_excellist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->NAME->setDbValue($row['NAME']);
        $this->HUSBAND_NAME->setDbValue($row['HUSBAND NAME']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->AGE___WIFE->setDbValue($row['AGE  - WIFE']);
        $this->AGE_HUSBAND->setDbValue($row['AGE- HUSBAND']);
        $this->ANXIOUS_TO_CONCEIVE_FOR->setDbValue($row['ANXIOUS TO CONCEIVE FOR']);
        $this->AMH__NGML->setDbValue($row['AMH ( NG/ML)']);
        $this->TUBAL_PATENCY->setDbValue($row['TUBAL_PATENCY']);
        $this->HSG->setDbValue($row['HSG']);
        $this->DHL->setDbValue($row['DHL']);
        $this->UTERINE_PROBLEMS->setDbValue($row['UTERINE_PROBLEMS']);
        $this->W_COMORBIDS->setDbValue($row['W_COMORBIDS']);
        $this->H_COMORBIDS->setDbValue($row['H_COMORBIDS']);
        $this->SEXUAL_DYSFUNCTION->setDbValue($row['SEXUAL_DYSFUNCTION']);
        $this->PREV_IUI->setDbValue($row['PREV IUI']);
        $this->PREV_IVF->setDbValue($row['PREV_IVF']);
        $this->TABLETS->setDbValue($row['TABLETS']);
        $this->INJTYPE->setDbValue($row['INJTYPE']);
        $this->LMP->setDbValue($row['LMP']);
        $this->TRIGGERR->setDbValue($row['TRIGGERR']);
        $this->TRIGGERDATE->setDbValue($row['TRIGGERDATE']);
        $this->FOLLICLE_STATUS->setDbValue($row['FOLLICLE_STATUS']);
        $this->NUMBER_OF_IUI->setDbValue($row['NUMBER_OF_IUI']);
        $this->PROCEDURE->setDbValue($row['PROCEDURE']);
        $this->LUTEAL_SUPPORT->setDbValue($row['LUTEAL_SUPPORT']);
        $this->HD_SAMPLE->setDbValue($row['H/D SAMPLE']);
        $this->DONOR__ID->setDbValue($row['DONOR - I.D']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->COLLECTION__METHOD->setDbValue($row['COLLECTION  METHOD']);
        $this->SAMPLE_SOURCE->setDbValue($row['SAMPLE SOURCE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
        $this->SPECIFIC_MATERNAL_PROBLEMS->setDbValue($row['SPECIFIC_MATERNAL_PROBLEMS']);
        $this->RESULTS->setDbValue($row['RESULTS']);
        $this->ONGOING_PREG->setDbValue($row['ONGOING_PREG']);
        $this->EDD_Date->setDbValue($row['EDD_Date']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['NAME'] = null;
        $row['HUSBAND NAME'] = null;
        $row['CoupleID'] = null;
        $row['AGE  - WIFE'] = null;
        $row['AGE- HUSBAND'] = null;
        $row['ANXIOUS TO CONCEIVE FOR'] = null;
        $row['AMH ( NG/ML)'] = null;
        $row['TUBAL_PATENCY'] = null;
        $row['HSG'] = null;
        $row['DHL'] = null;
        $row['UTERINE_PROBLEMS'] = null;
        $row['W_COMORBIDS'] = null;
        $row['H_COMORBIDS'] = null;
        $row['SEXUAL_DYSFUNCTION'] = null;
        $row['PREV IUI'] = null;
        $row['PREV_IVF'] = null;
        $row['TABLETS'] = null;
        $row['INJTYPE'] = null;
        $row['LMP'] = null;
        $row['TRIGGERR'] = null;
        $row['TRIGGERDATE'] = null;
        $row['FOLLICLE_STATUS'] = null;
        $row['NUMBER_OF_IUI'] = null;
        $row['PROCEDURE'] = null;
        $row['LUTEAL_SUPPORT'] = null;
        $row['H/D SAMPLE'] = null;
        $row['DONOR - I.D'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['COLLECTION  METHOD'] = null;
        $row['SAMPLE SOURCE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
        $row['SPECIFIC_MATERNAL_PROBLEMS'] = null;
        $row['RESULTS'] = null;
        $row['ONGOING_PREG'] = null;
        $row['EDD_Date'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("CoupleID")) != "") {
            $this->CoupleID->OldValue = $this->getKey("CoupleID"); // CoupleID
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // NAME

        // HUSBAND NAME

        // CoupleID

        // AGE  - WIFE

        // AGE- HUSBAND

        // ANXIOUS TO CONCEIVE FOR

        // AMH ( NG/ML)

        // TUBAL_PATENCY

        // HSG

        // DHL

        // UTERINE_PROBLEMS

        // W_COMORBIDS

        // H_COMORBIDS

        // SEXUAL_DYSFUNCTION

        // PREV IUI

        // PREV_IVF

        // TABLETS

        // INJTYPE

        // LMP

        // TRIGGERR

        // TRIGGERDATE

        // FOLLICLE_STATUS

        // NUMBER_OF_IUI

        // PROCEDURE

        // LUTEAL_SUPPORT

        // H/D SAMPLE

        // DONOR - I.D

        // PREG_TEST_DATE

        // COLLECTION  METHOD

        // SAMPLE SOURCE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM

        // SPECIFIC_MATERNAL_PROBLEMS

        // RESULTS

        // ONGOING_PREG

        // EDD_Date
        if ($this->RowType == ROWTYPE_VIEW) {
            // NAME
            $this->NAME->ViewValue = $this->NAME->CurrentValue;
            $this->NAME->ViewCustomAttributes = "";

            // HUSBAND NAME
            $this->HUSBAND_NAME->ViewValue = $this->HUSBAND_NAME->CurrentValue;
            $this->HUSBAND_NAME->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // AGE  - WIFE
            $this->AGE___WIFE->ViewValue = $this->AGE___WIFE->CurrentValue;
            $this->AGE___WIFE->ViewCustomAttributes = "";

            // AGE- HUSBAND
            $this->AGE_HUSBAND->ViewValue = $this->AGE_HUSBAND->CurrentValue;
            $this->AGE_HUSBAND->ViewCustomAttributes = "";

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUS_TO_CONCEIVE_FOR->ViewValue = $this->ANXIOUS_TO_CONCEIVE_FOR->CurrentValue;
            $this->ANXIOUS_TO_CONCEIVE_FOR->ViewCustomAttributes = "";

            // AMH ( NG/ML)
            $this->AMH__NGML->ViewValue = $this->AMH__NGML->CurrentValue;
            $this->AMH__NGML->ViewCustomAttributes = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->ViewValue = $this->TUBAL_PATENCY->CurrentValue;
            $this->TUBAL_PATENCY->ViewCustomAttributes = "";

            // HSG
            $this->HSG->ViewValue = $this->HSG->CurrentValue;
            $this->HSG->ViewCustomAttributes = "";

            // DHL
            $this->DHL->ViewValue = $this->DHL->CurrentValue;
            $this->DHL->ViewCustomAttributes = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->ViewValue = $this->UTERINE_PROBLEMS->CurrentValue;
            $this->UTERINE_PROBLEMS->ViewCustomAttributes = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->ViewValue = $this->W_COMORBIDS->CurrentValue;
            $this->W_COMORBIDS->ViewCustomAttributes = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->ViewValue = $this->H_COMORBIDS->CurrentValue;
            $this->H_COMORBIDS->ViewCustomAttributes = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->ViewValue = $this->SEXUAL_DYSFUNCTION->CurrentValue;
            $this->SEXUAL_DYSFUNCTION->ViewCustomAttributes = "";

            // PREV IUI
            $this->PREV_IUI->ViewValue = $this->PREV_IUI->CurrentValue;
            $this->PREV_IUI->ViewCustomAttributes = "";

            // TABLETS
            $this->TABLETS->ViewValue = $this->TABLETS->CurrentValue;
            $this->TABLETS->ViewCustomAttributes = "";

            // INJTYPE
            $this->INJTYPE->ViewValue = $this->INJTYPE->CurrentValue;
            $this->INJTYPE->ViewCustomAttributes = "";

            // LMP
            $this->LMP->ViewValue = $this->LMP->CurrentValue;
            $this->LMP->ViewValue = FormatDateTime($this->LMP->ViewValue, 0);
            $this->LMP->ViewCustomAttributes = "";

            // TRIGGERR
            $this->TRIGGERR->ViewValue = $this->TRIGGERR->CurrentValue;
            $this->TRIGGERR->ViewCustomAttributes = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->ViewValue = $this->TRIGGERDATE->CurrentValue;
            $this->TRIGGERDATE->ViewValue = FormatDateTime($this->TRIGGERDATE->ViewValue, 0);
            $this->TRIGGERDATE->ViewCustomAttributes = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->ViewValue = $this->FOLLICLE_STATUS->CurrentValue;
            $this->FOLLICLE_STATUS->ViewCustomAttributes = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->ViewValue = $this->NUMBER_OF_IUI->CurrentValue;
            $this->NUMBER_OF_IUI->ViewCustomAttributes = "";

            // PROCEDURE
            $this->PROCEDURE->ViewValue = $this->PROCEDURE->CurrentValue;
            $this->PROCEDURE->ViewCustomAttributes = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->ViewValue = $this->LUTEAL_SUPPORT->CurrentValue;
            $this->LUTEAL_SUPPORT->ViewCustomAttributes = "";

            // H/D SAMPLE
            $this->HD_SAMPLE->ViewValue = $this->HD_SAMPLE->CurrentValue;
            $this->HD_SAMPLE->ViewCustomAttributes = "";

            // DONOR - I.D
            $this->DONOR__ID->ViewValue = $this->DONOR__ID->CurrentValue;
            $this->DONOR__ID->ViewValue = FormatNumber($this->DONOR__ID->ViewValue, 0, -2, -2, -2);
            $this->DONOR__ID->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // COLLECTION  METHOD
            $this->COLLECTION__METHOD->ViewValue = $this->COLLECTION__METHOD->CurrentValue;
            $this->COLLECTION__METHOD->ViewCustomAttributes = "";

            // SAMPLE SOURCE
            $this->SAMPLE_SOURCE->ViewValue = $this->SAMPLE_SOURCE->CurrentValue;
            $this->SAMPLE_SOURCE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->CurrentValue;
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->CurrentValue;
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewValue = $this->SPECIFIC_MATERNAL_PROBLEMS->CurrentValue;
            $this->SPECIFIC_MATERNAL_PROBLEMS->ViewCustomAttributes = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->ViewValue = $this->ONGOING_PREG->CurrentValue;
            $this->ONGOING_PREG->ViewCustomAttributes = "";

            // EDD_Date
            $this->EDD_Date->ViewValue = $this->EDD_Date->CurrentValue;
            $this->EDD_Date->ViewValue = FormatDateTime($this->EDD_Date->ViewValue, 0);
            $this->EDD_Date->ViewCustomAttributes = "";

            // NAME
            $this->NAME->LinkCustomAttributes = "";
            $this->NAME->HrefValue = "";
            $this->NAME->TooltipValue = "";

            // HUSBAND NAME
            $this->HUSBAND_NAME->LinkCustomAttributes = "";
            $this->HUSBAND_NAME->HrefValue = "";
            $this->HUSBAND_NAME->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";

            // AGE  - WIFE
            $this->AGE___WIFE->LinkCustomAttributes = "";
            $this->AGE___WIFE->HrefValue = "";
            $this->AGE___WIFE->TooltipValue = "";

            // AGE- HUSBAND
            $this->AGE_HUSBAND->LinkCustomAttributes = "";
            $this->AGE_HUSBAND->HrefValue = "";
            $this->AGE_HUSBAND->TooltipValue = "";

            // ANXIOUS TO CONCEIVE FOR
            $this->ANXIOUS_TO_CONCEIVE_FOR->LinkCustomAttributes = "";
            $this->ANXIOUS_TO_CONCEIVE_FOR->HrefValue = "";
            $this->ANXIOUS_TO_CONCEIVE_FOR->TooltipValue = "";

            // AMH ( NG/ML)
            $this->AMH__NGML->LinkCustomAttributes = "";
            $this->AMH__NGML->HrefValue = "";
            $this->AMH__NGML->TooltipValue = "";

            // TUBAL_PATENCY
            $this->TUBAL_PATENCY->LinkCustomAttributes = "";
            $this->TUBAL_PATENCY->HrefValue = "";
            $this->TUBAL_PATENCY->TooltipValue = "";

            // HSG
            $this->HSG->LinkCustomAttributes = "";
            $this->HSG->HrefValue = "";
            $this->HSG->TooltipValue = "";

            // DHL
            $this->DHL->LinkCustomAttributes = "";
            $this->DHL->HrefValue = "";
            $this->DHL->TooltipValue = "";

            // UTERINE_PROBLEMS
            $this->UTERINE_PROBLEMS->LinkCustomAttributes = "";
            $this->UTERINE_PROBLEMS->HrefValue = "";
            $this->UTERINE_PROBLEMS->TooltipValue = "";

            // W_COMORBIDS
            $this->W_COMORBIDS->LinkCustomAttributes = "";
            $this->W_COMORBIDS->HrefValue = "";
            $this->W_COMORBIDS->TooltipValue = "";

            // H_COMORBIDS
            $this->H_COMORBIDS->LinkCustomAttributes = "";
            $this->H_COMORBIDS->HrefValue = "";
            $this->H_COMORBIDS->TooltipValue = "";

            // SEXUAL_DYSFUNCTION
            $this->SEXUAL_DYSFUNCTION->LinkCustomAttributes = "";
            $this->SEXUAL_DYSFUNCTION->HrefValue = "";
            $this->SEXUAL_DYSFUNCTION->TooltipValue = "";

            // PREV IUI
            $this->PREV_IUI->LinkCustomAttributes = "";
            $this->PREV_IUI->HrefValue = "";
            $this->PREV_IUI->TooltipValue = "";

            // TABLETS
            $this->TABLETS->LinkCustomAttributes = "";
            $this->TABLETS->HrefValue = "";
            $this->TABLETS->TooltipValue = "";

            // INJTYPE
            $this->INJTYPE->LinkCustomAttributes = "";
            $this->INJTYPE->HrefValue = "";
            $this->INJTYPE->TooltipValue = "";

            // LMP
            $this->LMP->LinkCustomAttributes = "";
            $this->LMP->HrefValue = "";
            $this->LMP->TooltipValue = "";

            // TRIGGERR
            $this->TRIGGERR->LinkCustomAttributes = "";
            $this->TRIGGERR->HrefValue = "";
            $this->TRIGGERR->TooltipValue = "";

            // TRIGGERDATE
            $this->TRIGGERDATE->LinkCustomAttributes = "";
            $this->TRIGGERDATE->HrefValue = "";
            $this->TRIGGERDATE->TooltipValue = "";

            // FOLLICLE_STATUS
            $this->FOLLICLE_STATUS->LinkCustomAttributes = "";
            $this->FOLLICLE_STATUS->HrefValue = "";
            $this->FOLLICLE_STATUS->TooltipValue = "";

            // NUMBER_OF_IUI
            $this->NUMBER_OF_IUI->LinkCustomAttributes = "";
            $this->NUMBER_OF_IUI->HrefValue = "";
            $this->NUMBER_OF_IUI->TooltipValue = "";

            // PROCEDURE
            $this->PROCEDURE->LinkCustomAttributes = "";
            $this->PROCEDURE->HrefValue = "";
            $this->PROCEDURE->TooltipValue = "";

            // LUTEAL_SUPPORT
            $this->LUTEAL_SUPPORT->LinkCustomAttributes = "";
            $this->LUTEAL_SUPPORT->HrefValue = "";
            $this->LUTEAL_SUPPORT->TooltipValue = "";

            // H/D SAMPLE
            $this->HD_SAMPLE->LinkCustomAttributes = "";
            $this->HD_SAMPLE->HrefValue = "";
            $this->HD_SAMPLE->TooltipValue = "";

            // DONOR - I.D
            $this->DONOR__ID->LinkCustomAttributes = "";
            $this->DONOR__ID->HrefValue = "";
            $this->DONOR__ID->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // COLLECTION  METHOD
            $this->COLLECTION__METHOD->LinkCustomAttributes = "";
            $this->COLLECTION__METHOD->HrefValue = "";
            $this->COLLECTION__METHOD->TooltipValue = "";

            // SAMPLE SOURCE
            $this->SAMPLE_SOURCE->LinkCustomAttributes = "";
            $this->SAMPLE_SOURCE->HrefValue = "";
            $this->SAMPLE_SOURCE->TooltipValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";

            // SPECIFIC_MATERNAL_PROBLEMS
            $this->SPECIFIC_MATERNAL_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_MATERNAL_PROBLEMS->TooltipValue = "";

            // ONGOING_PREG
            $this->ONGOING_PREG->LinkCustomAttributes = "";
            $this->ONGOING_PREG->HrefValue = "";
            $this->ONGOING_PREG->TooltipValue = "";

            // EDD_Date
            $this->EDD_Date->LinkCustomAttributes = "";
            $this->EDD_Date->HrefValue = "";
            $this->EDD_Date->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_iui_excellistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
