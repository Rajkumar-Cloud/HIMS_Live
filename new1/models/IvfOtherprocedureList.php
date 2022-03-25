<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOtherprocedureList extends IvfOtherprocedure
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_otherprocedure';

    // Page object name
    public $PageObjName = "IvfOtherprocedureList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fivf_otherprocedurelist";
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

        // Table object (ivf_otherprocedure)
        if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
            $GLOBALS["ivf_otherprocedure"] = &$this;
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
        $this->AddUrl = "IvfOtherprocedureAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfOtherprocedureDelete";
        $this->MultiUpdateUrl = "IvfOtherprocedureUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_otherprocedurelistsrch";

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
                $doc = new $class(Container("ivf_otherprocedure"));
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Address->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateofProcedure->setVisibility();
        $this->DateofDischarge->setVisibility();
        $this->Consultant->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->ProcedureDone->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MaritallHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->CNS->setVisibility();
        $this->_RS->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->InvestigationReport->Visible = false;
        $this->FinalDiagnosis->Visible = false;
        $this->Treatment->Visible = false;
        $this->DetailOfOperation->Visible = false;
        $this->FollowUpAdvice->Visible = false;
        $this->FollowUpMedication->Visible = false;
        $this->Plan->Visible = false;
        $this->TidNo->setVisibility();
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
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->SEX->AdvancedSearch->toJson(), ","); // Field SEX
        $filterList = Concat($filterList, $this->Address->AdvancedSearch->toJson(), ","); // Field Address
        $filterList = Concat($filterList, $this->DateofAdmission->AdvancedSearch->toJson(), ","); // Field DateofAdmission
        $filterList = Concat($filterList, $this->DateofProcedure->AdvancedSearch->toJson(), ","); // Field DateofProcedure
        $filterList = Concat($filterList, $this->DateofDischarge->AdvancedSearch->toJson(), ","); // Field DateofDischarge
        $filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
        $filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
        $filterList = Concat($filterList, $this->Anesthetist->AdvancedSearch->toJson(), ","); // Field Anesthetist
        $filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
        $filterList = Concat($filterList, $this->ProcedureDone->AdvancedSearch->toJson(), ","); // Field ProcedureDone
        $filterList = Concat($filterList, $this->PROVISIONALDIAGNOSIS->AdvancedSearch->toJson(), ","); // Field PROVISIONALDIAGNOSIS
        $filterList = Concat($filterList, $this->Chiefcomplaints->AdvancedSearch->toJson(), ","); // Field Chiefcomplaints
        $filterList = Concat($filterList, $this->MaritallHistory->AdvancedSearch->toJson(), ","); // Field MaritallHistory
        $filterList = Concat($filterList, $this->MenstrualHistory->AdvancedSearch->toJson(), ","); // Field MenstrualHistory
        $filterList = Concat($filterList, $this->SurgicalHistory->AdvancedSearch->toJson(), ","); // Field SurgicalHistory
        $filterList = Concat($filterList, $this->PastHistory->AdvancedSearch->toJson(), ","); // Field PastHistory
        $filterList = Concat($filterList, $this->FamilyHistory->AdvancedSearch->toJson(), ","); // Field FamilyHistory
        $filterList = Concat($filterList, $this->Temp->AdvancedSearch->toJson(), ","); // Field Temp
        $filterList = Concat($filterList, $this->Pulse->AdvancedSearch->toJson(), ","); // Field Pulse
        $filterList = Concat($filterList, $this->BP->AdvancedSearch->toJson(), ","); // Field BP
        $filterList = Concat($filterList, $this->CNS->AdvancedSearch->toJson(), ","); // Field CNS
        $filterList = Concat($filterList, $this->_RS->AdvancedSearch->toJson(), ","); // Field RS
        $filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
        $filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
        $filterList = Concat($filterList, $this->InvestigationReport->AdvancedSearch->toJson(), ","); // Field InvestigationReport
        $filterList = Concat($filterList, $this->FinalDiagnosis->AdvancedSearch->toJson(), ","); // Field FinalDiagnosis
        $filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
        $filterList = Concat($filterList, $this->DetailOfOperation->AdvancedSearch->toJson(), ","); // Field DetailOfOperation
        $filterList = Concat($filterList, $this->FollowUpAdvice->AdvancedSearch->toJson(), ","); // Field FollowUpAdvice
        $filterList = Concat($filterList, $this->FollowUpMedication->AdvancedSearch->toJson(), ","); // Field FollowUpMedication
        $filterList = Concat($filterList, $this->Plan->AdvancedSearch->toJson(), ","); // Field Plan
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_otherprocedurelistsrch", $filters);
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

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field SEX
        $this->SEX->AdvancedSearch->SearchValue = @$filter["x_SEX"];
        $this->SEX->AdvancedSearch->SearchOperator = @$filter["z_SEX"];
        $this->SEX->AdvancedSearch->SearchCondition = @$filter["v_SEX"];
        $this->SEX->AdvancedSearch->SearchValue2 = @$filter["y_SEX"];
        $this->SEX->AdvancedSearch->SearchOperator2 = @$filter["w_SEX"];
        $this->SEX->AdvancedSearch->save();

        // Field Address
        $this->Address->AdvancedSearch->SearchValue = @$filter["x_Address"];
        $this->Address->AdvancedSearch->SearchOperator = @$filter["z_Address"];
        $this->Address->AdvancedSearch->SearchCondition = @$filter["v_Address"];
        $this->Address->AdvancedSearch->SearchValue2 = @$filter["y_Address"];
        $this->Address->AdvancedSearch->SearchOperator2 = @$filter["w_Address"];
        $this->Address->AdvancedSearch->save();

        // Field DateofAdmission
        $this->DateofAdmission->AdvancedSearch->SearchValue = @$filter["x_DateofAdmission"];
        $this->DateofAdmission->AdvancedSearch->SearchOperator = @$filter["z_DateofAdmission"];
        $this->DateofAdmission->AdvancedSearch->SearchCondition = @$filter["v_DateofAdmission"];
        $this->DateofAdmission->AdvancedSearch->SearchValue2 = @$filter["y_DateofAdmission"];
        $this->DateofAdmission->AdvancedSearch->SearchOperator2 = @$filter["w_DateofAdmission"];
        $this->DateofAdmission->AdvancedSearch->save();

        // Field DateofProcedure
        $this->DateofProcedure->AdvancedSearch->SearchValue = @$filter["x_DateofProcedure"];
        $this->DateofProcedure->AdvancedSearch->SearchOperator = @$filter["z_DateofProcedure"];
        $this->DateofProcedure->AdvancedSearch->SearchCondition = @$filter["v_DateofProcedure"];
        $this->DateofProcedure->AdvancedSearch->SearchValue2 = @$filter["y_DateofProcedure"];
        $this->DateofProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_DateofProcedure"];
        $this->DateofProcedure->AdvancedSearch->save();

        // Field DateofDischarge
        $this->DateofDischarge->AdvancedSearch->SearchValue = @$filter["x_DateofDischarge"];
        $this->DateofDischarge->AdvancedSearch->SearchOperator = @$filter["z_DateofDischarge"];
        $this->DateofDischarge->AdvancedSearch->SearchCondition = @$filter["v_DateofDischarge"];
        $this->DateofDischarge->AdvancedSearch->SearchValue2 = @$filter["y_DateofDischarge"];
        $this->DateofDischarge->AdvancedSearch->SearchOperator2 = @$filter["w_DateofDischarge"];
        $this->DateofDischarge->AdvancedSearch->save();

        // Field Consultant
        $this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
        $this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
        $this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
        $this->Consultant->AdvancedSearch->save();

        // Field Surgeon
        $this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
        $this->Surgeon->AdvancedSearch->save();

        // Field Anesthetist
        $this->Anesthetist->AdvancedSearch->SearchValue = @$filter["x_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anesthetist"];
        $this->Anesthetist->AdvancedSearch->save();

        // Field IdentificationMark
        $this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->save();

        // Field ProcedureDone
        $this->ProcedureDone->AdvancedSearch->SearchValue = @$filter["x_ProcedureDone"];
        $this->ProcedureDone->AdvancedSearch->SearchOperator = @$filter["z_ProcedureDone"];
        $this->ProcedureDone->AdvancedSearch->SearchCondition = @$filter["v_ProcedureDone"];
        $this->ProcedureDone->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureDone"];
        $this->ProcedureDone->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureDone"];
        $this->ProcedureDone->AdvancedSearch->save();

        // Field PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue = @$filter["x_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator = @$filter["z_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchCondition = @$filter["v_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue2 = @$filter["y_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator2 = @$filter["w_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->save();

        // Field Chiefcomplaints
        $this->Chiefcomplaints->AdvancedSearch->SearchValue = @$filter["x_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchOperator = @$filter["z_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchCondition = @$filter["v_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchValue2 = @$filter["y_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchOperator2 = @$filter["w_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->save();

        // Field MaritallHistory
        $this->MaritallHistory->AdvancedSearch->SearchValue = @$filter["x_MaritallHistory"];
        $this->MaritallHistory->AdvancedSearch->SearchOperator = @$filter["z_MaritallHistory"];
        $this->MaritallHistory->AdvancedSearch->SearchCondition = @$filter["v_MaritallHistory"];
        $this->MaritallHistory->AdvancedSearch->SearchValue2 = @$filter["y_MaritallHistory"];
        $this->MaritallHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MaritallHistory"];
        $this->MaritallHistory->AdvancedSearch->save();

        // Field MenstrualHistory
        $this->MenstrualHistory->AdvancedSearch->SearchValue = @$filter["x_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchOperator = @$filter["z_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchCondition = @$filter["v_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchValue2 = @$filter["y_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->save();

        // Field SurgicalHistory
        $this->SurgicalHistory->AdvancedSearch->SearchValue = @$filter["x_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->save();

        // Field PastHistory
        $this->PastHistory->AdvancedSearch->SearchValue = @$filter["x_PastHistory"];
        $this->PastHistory->AdvancedSearch->SearchOperator = @$filter["z_PastHistory"];
        $this->PastHistory->AdvancedSearch->SearchCondition = @$filter["v_PastHistory"];
        $this->PastHistory->AdvancedSearch->SearchValue2 = @$filter["y_PastHistory"];
        $this->PastHistory->AdvancedSearch->SearchOperator2 = @$filter["w_PastHistory"];
        $this->PastHistory->AdvancedSearch->save();

        // Field FamilyHistory
        $this->FamilyHistory->AdvancedSearch->SearchValue = @$filter["x_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->save();

        // Field Temp
        $this->Temp->AdvancedSearch->SearchValue = @$filter["x_Temp"];
        $this->Temp->AdvancedSearch->SearchOperator = @$filter["z_Temp"];
        $this->Temp->AdvancedSearch->SearchCondition = @$filter["v_Temp"];
        $this->Temp->AdvancedSearch->SearchValue2 = @$filter["y_Temp"];
        $this->Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Temp"];
        $this->Temp->AdvancedSearch->save();

        // Field Pulse
        $this->Pulse->AdvancedSearch->SearchValue = @$filter["x_Pulse"];
        $this->Pulse->AdvancedSearch->SearchOperator = @$filter["z_Pulse"];
        $this->Pulse->AdvancedSearch->SearchCondition = @$filter["v_Pulse"];
        $this->Pulse->AdvancedSearch->SearchValue2 = @$filter["y_Pulse"];
        $this->Pulse->AdvancedSearch->SearchOperator2 = @$filter["w_Pulse"];
        $this->Pulse->AdvancedSearch->save();

        // Field BP
        $this->BP->AdvancedSearch->SearchValue = @$filter["x_BP"];
        $this->BP->AdvancedSearch->SearchOperator = @$filter["z_BP"];
        $this->BP->AdvancedSearch->SearchCondition = @$filter["v_BP"];
        $this->BP->AdvancedSearch->SearchValue2 = @$filter["y_BP"];
        $this->BP->AdvancedSearch->SearchOperator2 = @$filter["w_BP"];
        $this->BP->AdvancedSearch->save();

        // Field CNS
        $this->CNS->AdvancedSearch->SearchValue = @$filter["x_CNS"];
        $this->CNS->AdvancedSearch->SearchOperator = @$filter["z_CNS"];
        $this->CNS->AdvancedSearch->SearchCondition = @$filter["v_CNS"];
        $this->CNS->AdvancedSearch->SearchValue2 = @$filter["y_CNS"];
        $this->CNS->AdvancedSearch->SearchOperator2 = @$filter["w_CNS"];
        $this->CNS->AdvancedSearch->save();

        // Field RS
        $this->_RS->AdvancedSearch->SearchValue = @$filter["x__RS"];
        $this->_RS->AdvancedSearch->SearchOperator = @$filter["z__RS"];
        $this->_RS->AdvancedSearch->SearchCondition = @$filter["v__RS"];
        $this->_RS->AdvancedSearch->SearchValue2 = @$filter["y__RS"];
        $this->_RS->AdvancedSearch->SearchOperator2 = @$filter["w__RS"];
        $this->_RS->AdvancedSearch->save();

        // Field CVS
        $this->CVS->AdvancedSearch->SearchValue = @$filter["x_CVS"];
        $this->CVS->AdvancedSearch->SearchOperator = @$filter["z_CVS"];
        $this->CVS->AdvancedSearch->SearchCondition = @$filter["v_CVS"];
        $this->CVS->AdvancedSearch->SearchValue2 = @$filter["y_CVS"];
        $this->CVS->AdvancedSearch->SearchOperator2 = @$filter["w_CVS"];
        $this->CVS->AdvancedSearch->save();

        // Field PA
        $this->PA->AdvancedSearch->SearchValue = @$filter["x_PA"];
        $this->PA->AdvancedSearch->SearchOperator = @$filter["z_PA"];
        $this->PA->AdvancedSearch->SearchCondition = @$filter["v_PA"];
        $this->PA->AdvancedSearch->SearchValue2 = @$filter["y_PA"];
        $this->PA->AdvancedSearch->SearchOperator2 = @$filter["w_PA"];
        $this->PA->AdvancedSearch->save();

        // Field InvestigationReport
        $this->InvestigationReport->AdvancedSearch->SearchValue = @$filter["x_InvestigationReport"];
        $this->InvestigationReport->AdvancedSearch->SearchOperator = @$filter["z_InvestigationReport"];
        $this->InvestigationReport->AdvancedSearch->SearchCondition = @$filter["v_InvestigationReport"];
        $this->InvestigationReport->AdvancedSearch->SearchValue2 = @$filter["y_InvestigationReport"];
        $this->InvestigationReport->AdvancedSearch->SearchOperator2 = @$filter["w_InvestigationReport"];
        $this->InvestigationReport->AdvancedSearch->save();

        // Field FinalDiagnosis
        $this->FinalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_FinalDiagnosis"];
        $this->FinalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_FinalDiagnosis"];
        $this->FinalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_FinalDiagnosis"];
        $this->FinalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_FinalDiagnosis"];
        $this->FinalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_FinalDiagnosis"];
        $this->FinalDiagnosis->AdvancedSearch->save();

        // Field Treatment
        $this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
        $this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
        $this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
        $this->Treatment->AdvancedSearch->save();

        // Field DetailOfOperation
        $this->DetailOfOperation->AdvancedSearch->SearchValue = @$filter["x_DetailOfOperation"];
        $this->DetailOfOperation->AdvancedSearch->SearchOperator = @$filter["z_DetailOfOperation"];
        $this->DetailOfOperation->AdvancedSearch->SearchCondition = @$filter["v_DetailOfOperation"];
        $this->DetailOfOperation->AdvancedSearch->SearchValue2 = @$filter["y_DetailOfOperation"];
        $this->DetailOfOperation->AdvancedSearch->SearchOperator2 = @$filter["w_DetailOfOperation"];
        $this->DetailOfOperation->AdvancedSearch->save();

        // Field FollowUpAdvice
        $this->FollowUpAdvice->AdvancedSearch->SearchValue = @$filter["x_FollowUpAdvice"];
        $this->FollowUpAdvice->AdvancedSearch->SearchOperator = @$filter["z_FollowUpAdvice"];
        $this->FollowUpAdvice->AdvancedSearch->SearchCondition = @$filter["v_FollowUpAdvice"];
        $this->FollowUpAdvice->AdvancedSearch->SearchValue2 = @$filter["y_FollowUpAdvice"];
        $this->FollowUpAdvice->AdvancedSearch->SearchOperator2 = @$filter["w_FollowUpAdvice"];
        $this->FollowUpAdvice->AdvancedSearch->save();

        // Field FollowUpMedication
        $this->FollowUpMedication->AdvancedSearch->SearchValue = @$filter["x_FollowUpMedication"];
        $this->FollowUpMedication->AdvancedSearch->SearchOperator = @$filter["z_FollowUpMedication"];
        $this->FollowUpMedication->AdvancedSearch->SearchCondition = @$filter["v_FollowUpMedication"];
        $this->FollowUpMedication->AdvancedSearch->SearchValue2 = @$filter["y_FollowUpMedication"];
        $this->FollowUpMedication->AdvancedSearch->SearchOperator2 = @$filter["w_FollowUpMedication"];
        $this->FollowUpMedication->AdvancedSearch->save();

        // Field Plan
        $this->Plan->AdvancedSearch->SearchValue = @$filter["x_Plan"];
        $this->Plan->AdvancedSearch->SearchOperator = @$filter["z_Plan"];
        $this->Plan->AdvancedSearch->SearchCondition = @$filter["v_Plan"];
        $this->Plan->AdvancedSearch->SearchValue2 = @$filter["y_Plan"];
        $this->Plan->AdvancedSearch->SearchOperator2 = @$filter["w_Plan"];
        $this->Plan->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SEX, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Anesthetist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcedureDone, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PROVISIONALDIAGNOSIS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Chiefcomplaints, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaritallHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MenstrualHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SurgicalHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PastHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FamilyHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Temp, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pulse, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CNS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_RS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InvestigationReport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FinalDiagnosis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DetailOfOperation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FollowUpAdvice, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FollowUpMedication, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Plan, $arKeywords, $type);
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
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->SEX); // SEX
            $this->updateSort($this->Address); // Address
            $this->updateSort($this->DateofAdmission); // DateofAdmission
            $this->updateSort($this->DateofProcedure); // DateofProcedure
            $this->updateSort($this->DateofDischarge); // DateofDischarge
            $this->updateSort($this->Consultant); // Consultant
            $this->updateSort($this->Surgeon); // Surgeon
            $this->updateSort($this->Anesthetist); // Anesthetist
            $this->updateSort($this->IdentificationMark); // IdentificationMark
            $this->updateSort($this->ProcedureDone); // ProcedureDone
            $this->updateSort($this->PROVISIONALDIAGNOSIS); // PROVISIONALDIAGNOSIS
            $this->updateSort($this->Chiefcomplaints); // Chiefcomplaints
            $this->updateSort($this->MaritallHistory); // MaritallHistory
            $this->updateSort($this->MenstrualHistory); // MenstrualHistory
            $this->updateSort($this->SurgicalHistory); // SurgicalHistory
            $this->updateSort($this->PastHistory); // PastHistory
            $this->updateSort($this->FamilyHistory); // FamilyHistory
            $this->updateSort($this->Temp); // Temp
            $this->updateSort($this->Pulse); // Pulse
            $this->updateSort($this->BP); // BP
            $this->updateSort($this->CNS); // CNS
            $this->updateSort($this->_RS); // RS
            $this->updateSort($this->CVS); // CVS
            $this->updateSort($this->PA); // PA
            $this->updateSort($this->TidNo); // TidNo
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
                $this->RIDNO->setSort("");
                $this->Name->setSort("");
                $this->Age->setSort("");
                $this->SEX->setSort("");
                $this->Address->setSort("");
                $this->DateofAdmission->setSort("");
                $this->DateofProcedure->setSort("");
                $this->DateofDischarge->setSort("");
                $this->Consultant->setSort("");
                $this->Surgeon->setSort("");
                $this->Anesthetist->setSort("");
                $this->IdentificationMark->setSort("");
                $this->ProcedureDone->setSort("");
                $this->PROVISIONALDIAGNOSIS->setSort("");
                $this->Chiefcomplaints->setSort("");
                $this->MaritallHistory->setSort("");
                $this->MenstrualHistory->setSort("");
                $this->SurgicalHistory->setSort("");
                $this->PastHistory->setSort("");
                $this->FamilyHistory->setSort("");
                $this->Temp->setSort("");
                $this->Pulse->setSort("");
                $this->BP->setSort("");
                $this->CNS->setSort("");
                $this->_RS->setSort("");
                $this->CVS->setSort("");
                $this->PA->setSort("");
                $this->InvestigationReport->setSort("");
                $this->FinalDiagnosis->setSort("");
                $this->Treatment->setSort("");
                $this->DetailOfOperation->setSort("");
                $this->FollowUpAdvice->setSort("");
                $this->FollowUpMedication->setSort("");
                $this->Plan->setSort("");
                $this->TidNo->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_otherprocedurelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_otherprocedurelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_otherprocedurelist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Address->setDbValue($row['Address']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateofProcedure->setDbValue($row['DateofProcedure']);
        $this->DateofDischarge->setDbValue($row['DateofDischarge']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->ProcedureDone->setDbValue($row['ProcedureDone']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MaritallHistory->setDbValue($row['MaritallHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->CNS->setDbValue($row['CNS']);
        $this->_RS->setDbValue($row['RS']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->InvestigationReport->setDbValue($row['InvestigationReport']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
        $this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
        $this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
        $this->Plan->setDbValue($row['Plan']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Address'] = null;
        $row['DateofAdmission'] = null;
        $row['DateofProcedure'] = null;
        $row['DateofDischarge'] = null;
        $row['Consultant'] = null;
        $row['Surgeon'] = null;
        $row['Anesthetist'] = null;
        $row['IdentificationMark'] = null;
        $row['ProcedureDone'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MaritallHistory'] = null;
        $row['MenstrualHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['PastHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Temp'] = null;
        $row['Pulse'] = null;
        $row['BP'] = null;
        $row['CNS'] = null;
        $row['RS'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['InvestigationReport'] = null;
        $row['FinalDiagnosis'] = null;
        $row['Treatment'] = null;
        $row['DetailOfOperation'] = null;
        $row['FollowUpAdvice'] = null;
        $row['FollowUpMedication'] = null;
        $row['Plan'] = null;
        $row['TidNo'] = null;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // RIDNO

        // Name

        // Age

        // SEX

        // Address

        // DateofAdmission

        // DateofProcedure

        // DateofDischarge

        // Consultant

        // Surgeon

        // Anesthetist

        // IdentificationMark

        // ProcedureDone

        // PROVISIONALDIAGNOSIS

        // Chiefcomplaints

        // MaritallHistory

        // MenstrualHistory

        // SurgicalHistory

        // PastHistory

        // FamilyHistory

        // Temp

        // Pulse

        // BP

        // CNS

        // RS

        // CVS

        // PA

        // InvestigationReport

        // FinalDiagnosis

        // Treatment

        // DetailOfOperation

        // FollowUpAdvice

        // FollowUpMedication

        // Plan

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 0);
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateofProcedure
            $this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
            $this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 0);
            $this->DateofProcedure->ViewCustomAttributes = "";

            // DateofDischarge
            $this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
            $this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 0);
            $this->DateofDischarge->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $this->Surgeon->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // ProcedureDone
            $this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
            $this->ProcedureDone->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MaritallHistory
            $this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
            $this->MaritallHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RS
            $this->_RS->ViewValue = $this->_RS->CurrentValue;
            $this->_RS->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";
            $this->DateofProcedure->TooltipValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";
            $this->DateofDischarge->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";
            $this->ProcedureDone->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";
            $this->MaritallHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";
            $this->_RS->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_otherprocedurelistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
