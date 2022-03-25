<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOutcomeList extends IvfOutcome
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_outcome';

    // Page object name
    public $PageObjName = "IvfOutcomeList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fivf_outcomelist";
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

        // Table object (ivf_outcome)
        if (!isset($GLOBALS["ivf_outcome"]) || get_class($GLOBALS["ivf_outcome"]) == PROJECT_NAMESPACE . "ivf_outcome") {
            $GLOBALS["ivf_outcome"] = &$this;
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
        $this->AddUrl = "IvfOutcomeAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfOutcomeDelete";
        $this->MultiUpdateUrl = "IvfOutcomeUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_outcome');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_outcomelistsrch";

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
                $doc = new $class(Container("ivf_outcome"));
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
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->outcomeDate->setVisibility();
        $this->outcomeDay->setVisibility();
        $this->OPResult->setVisibility();
        $this->Gestation->setVisibility();
        $this->TransferdEmbryos->setVisibility();
        $this->InitalOfSacs->setVisibility();
        $this->ImplimentationRate->setVisibility();
        $this->EmbryoNo->setVisibility();
        $this->ExtrauterineSac->setVisibility();
        $this->PregnancyMonozygotic->setVisibility();
        $this->TypeGestation->setVisibility();
        $this->Urine->setVisibility();
        $this->PTdate->setVisibility();
        $this->Reduced->setVisibility();
        $this->INduced->setVisibility();
        $this->INducedDate->setVisibility();
        $this->Miscarriage->setVisibility();
        $this->Induced1->setVisibility();
        $this->Type->setVisibility();
        $this->IfClinical->setVisibility();
        $this->GADate->setVisibility();
        $this->GA->setVisibility();
        $this->FoetalDeath->setVisibility();
        $this->FerinatalDeath->setVisibility();
        $this->TidNo->setVisibility();
        $this->Ectopic->setVisibility();
        $this->Extra->setVisibility();
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
        $filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
        $filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
        $filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->outcomeDate->AdvancedSearch->toJson(), ","); // Field outcomeDate
        $filterList = Concat($filterList, $this->outcomeDay->AdvancedSearch->toJson(), ","); // Field outcomeDay
        $filterList = Concat($filterList, $this->OPResult->AdvancedSearch->toJson(), ","); // Field OPResult
        $filterList = Concat($filterList, $this->Gestation->AdvancedSearch->toJson(), ","); // Field Gestation
        $filterList = Concat($filterList, $this->TransferdEmbryos->AdvancedSearch->toJson(), ","); // Field TransferdEmbryos
        $filterList = Concat($filterList, $this->InitalOfSacs->AdvancedSearch->toJson(), ","); // Field InitalOfSacs
        $filterList = Concat($filterList, $this->ImplimentationRate->AdvancedSearch->toJson(), ","); // Field ImplimentationRate
        $filterList = Concat($filterList, $this->EmbryoNo->AdvancedSearch->toJson(), ","); // Field EmbryoNo
        $filterList = Concat($filterList, $this->ExtrauterineSac->AdvancedSearch->toJson(), ","); // Field ExtrauterineSac
        $filterList = Concat($filterList, $this->PregnancyMonozygotic->AdvancedSearch->toJson(), ","); // Field PregnancyMonozygotic
        $filterList = Concat($filterList, $this->TypeGestation->AdvancedSearch->toJson(), ","); // Field TypeGestation
        $filterList = Concat($filterList, $this->Urine->AdvancedSearch->toJson(), ","); // Field Urine
        $filterList = Concat($filterList, $this->PTdate->AdvancedSearch->toJson(), ","); // Field PTdate
        $filterList = Concat($filterList, $this->Reduced->AdvancedSearch->toJson(), ","); // Field Reduced
        $filterList = Concat($filterList, $this->INduced->AdvancedSearch->toJson(), ","); // Field INduced
        $filterList = Concat($filterList, $this->INducedDate->AdvancedSearch->toJson(), ","); // Field INducedDate
        $filterList = Concat($filterList, $this->Miscarriage->AdvancedSearch->toJson(), ","); // Field Miscarriage
        $filterList = Concat($filterList, $this->Induced1->AdvancedSearch->toJson(), ","); // Field Induced1
        $filterList = Concat($filterList, $this->Type->AdvancedSearch->toJson(), ","); // Field Type
        $filterList = Concat($filterList, $this->IfClinical->AdvancedSearch->toJson(), ","); // Field IfClinical
        $filterList = Concat($filterList, $this->GADate->AdvancedSearch->toJson(), ","); // Field GADate
        $filterList = Concat($filterList, $this->GA->AdvancedSearch->toJson(), ","); // Field GA
        $filterList = Concat($filterList, $this->FoetalDeath->AdvancedSearch->toJson(), ","); // Field FoetalDeath
        $filterList = Concat($filterList, $this->FerinatalDeath->AdvancedSearch->toJson(), ","); // Field FerinatalDeath
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
        $filterList = Concat($filterList, $this->Extra->AdvancedSearch->toJson(), ","); // Field Extra
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_outcomelistsrch", $filters);
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

        // Field treatment_status
        $this->treatment_status->AdvancedSearch->SearchValue = @$filter["x_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchOperator = @$filter["z_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchCondition = @$filter["v_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchValue2 = @$filter["y_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchOperator2 = @$filter["w_treatment_status"];
        $this->treatment_status->AdvancedSearch->save();

        // Field ARTCYCLE
        $this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->save();

        // Field RESULT
        $this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
        $this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
        $this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
        $this->RESULT->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

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

        // Field outcomeDate
        $this->outcomeDate->AdvancedSearch->SearchValue = @$filter["x_outcomeDate"];
        $this->outcomeDate->AdvancedSearch->SearchOperator = @$filter["z_outcomeDate"];
        $this->outcomeDate->AdvancedSearch->SearchCondition = @$filter["v_outcomeDate"];
        $this->outcomeDate->AdvancedSearch->SearchValue2 = @$filter["y_outcomeDate"];
        $this->outcomeDate->AdvancedSearch->SearchOperator2 = @$filter["w_outcomeDate"];
        $this->outcomeDate->AdvancedSearch->save();

        // Field outcomeDay
        $this->outcomeDay->AdvancedSearch->SearchValue = @$filter["x_outcomeDay"];
        $this->outcomeDay->AdvancedSearch->SearchOperator = @$filter["z_outcomeDay"];
        $this->outcomeDay->AdvancedSearch->SearchCondition = @$filter["v_outcomeDay"];
        $this->outcomeDay->AdvancedSearch->SearchValue2 = @$filter["y_outcomeDay"];
        $this->outcomeDay->AdvancedSearch->SearchOperator2 = @$filter["w_outcomeDay"];
        $this->outcomeDay->AdvancedSearch->save();

        // Field OPResult
        $this->OPResult->AdvancedSearch->SearchValue = @$filter["x_OPResult"];
        $this->OPResult->AdvancedSearch->SearchOperator = @$filter["z_OPResult"];
        $this->OPResult->AdvancedSearch->SearchCondition = @$filter["v_OPResult"];
        $this->OPResult->AdvancedSearch->SearchValue2 = @$filter["y_OPResult"];
        $this->OPResult->AdvancedSearch->SearchOperator2 = @$filter["w_OPResult"];
        $this->OPResult->AdvancedSearch->save();

        // Field Gestation
        $this->Gestation->AdvancedSearch->SearchValue = @$filter["x_Gestation"];
        $this->Gestation->AdvancedSearch->SearchOperator = @$filter["z_Gestation"];
        $this->Gestation->AdvancedSearch->SearchCondition = @$filter["v_Gestation"];
        $this->Gestation->AdvancedSearch->SearchValue2 = @$filter["y_Gestation"];
        $this->Gestation->AdvancedSearch->SearchOperator2 = @$filter["w_Gestation"];
        $this->Gestation->AdvancedSearch->save();

        // Field TransferdEmbryos
        $this->TransferdEmbryos->AdvancedSearch->SearchValue = @$filter["x_TransferdEmbryos"];
        $this->TransferdEmbryos->AdvancedSearch->SearchOperator = @$filter["z_TransferdEmbryos"];
        $this->TransferdEmbryos->AdvancedSearch->SearchCondition = @$filter["v_TransferdEmbryos"];
        $this->TransferdEmbryos->AdvancedSearch->SearchValue2 = @$filter["y_TransferdEmbryos"];
        $this->TransferdEmbryos->AdvancedSearch->SearchOperator2 = @$filter["w_TransferdEmbryos"];
        $this->TransferdEmbryos->AdvancedSearch->save();

        // Field InitalOfSacs
        $this->InitalOfSacs->AdvancedSearch->SearchValue = @$filter["x_InitalOfSacs"];
        $this->InitalOfSacs->AdvancedSearch->SearchOperator = @$filter["z_InitalOfSacs"];
        $this->InitalOfSacs->AdvancedSearch->SearchCondition = @$filter["v_InitalOfSacs"];
        $this->InitalOfSacs->AdvancedSearch->SearchValue2 = @$filter["y_InitalOfSacs"];
        $this->InitalOfSacs->AdvancedSearch->SearchOperator2 = @$filter["w_InitalOfSacs"];
        $this->InitalOfSacs->AdvancedSearch->save();

        // Field ImplimentationRate
        $this->ImplimentationRate->AdvancedSearch->SearchValue = @$filter["x_ImplimentationRate"];
        $this->ImplimentationRate->AdvancedSearch->SearchOperator = @$filter["z_ImplimentationRate"];
        $this->ImplimentationRate->AdvancedSearch->SearchCondition = @$filter["v_ImplimentationRate"];
        $this->ImplimentationRate->AdvancedSearch->SearchValue2 = @$filter["y_ImplimentationRate"];
        $this->ImplimentationRate->AdvancedSearch->SearchOperator2 = @$filter["w_ImplimentationRate"];
        $this->ImplimentationRate->AdvancedSearch->save();

        // Field EmbryoNo
        $this->EmbryoNo->AdvancedSearch->SearchValue = @$filter["x_EmbryoNo"];
        $this->EmbryoNo->AdvancedSearch->SearchOperator = @$filter["z_EmbryoNo"];
        $this->EmbryoNo->AdvancedSearch->SearchCondition = @$filter["v_EmbryoNo"];
        $this->EmbryoNo->AdvancedSearch->SearchValue2 = @$filter["y_EmbryoNo"];
        $this->EmbryoNo->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryoNo"];
        $this->EmbryoNo->AdvancedSearch->save();

        // Field ExtrauterineSac
        $this->ExtrauterineSac->AdvancedSearch->SearchValue = @$filter["x_ExtrauterineSac"];
        $this->ExtrauterineSac->AdvancedSearch->SearchOperator = @$filter["z_ExtrauterineSac"];
        $this->ExtrauterineSac->AdvancedSearch->SearchCondition = @$filter["v_ExtrauterineSac"];
        $this->ExtrauterineSac->AdvancedSearch->SearchValue2 = @$filter["y_ExtrauterineSac"];
        $this->ExtrauterineSac->AdvancedSearch->SearchOperator2 = @$filter["w_ExtrauterineSac"];
        $this->ExtrauterineSac->AdvancedSearch->save();

        // Field PregnancyMonozygotic
        $this->PregnancyMonozygotic->AdvancedSearch->SearchValue = @$filter["x_PregnancyMonozygotic"];
        $this->PregnancyMonozygotic->AdvancedSearch->SearchOperator = @$filter["z_PregnancyMonozygotic"];
        $this->PregnancyMonozygotic->AdvancedSearch->SearchCondition = @$filter["v_PregnancyMonozygotic"];
        $this->PregnancyMonozygotic->AdvancedSearch->SearchValue2 = @$filter["y_PregnancyMonozygotic"];
        $this->PregnancyMonozygotic->AdvancedSearch->SearchOperator2 = @$filter["w_PregnancyMonozygotic"];
        $this->PregnancyMonozygotic->AdvancedSearch->save();

        // Field TypeGestation
        $this->TypeGestation->AdvancedSearch->SearchValue = @$filter["x_TypeGestation"];
        $this->TypeGestation->AdvancedSearch->SearchOperator = @$filter["z_TypeGestation"];
        $this->TypeGestation->AdvancedSearch->SearchCondition = @$filter["v_TypeGestation"];
        $this->TypeGestation->AdvancedSearch->SearchValue2 = @$filter["y_TypeGestation"];
        $this->TypeGestation->AdvancedSearch->SearchOperator2 = @$filter["w_TypeGestation"];
        $this->TypeGestation->AdvancedSearch->save();

        // Field Urine
        $this->Urine->AdvancedSearch->SearchValue = @$filter["x_Urine"];
        $this->Urine->AdvancedSearch->SearchOperator = @$filter["z_Urine"];
        $this->Urine->AdvancedSearch->SearchCondition = @$filter["v_Urine"];
        $this->Urine->AdvancedSearch->SearchValue2 = @$filter["y_Urine"];
        $this->Urine->AdvancedSearch->SearchOperator2 = @$filter["w_Urine"];
        $this->Urine->AdvancedSearch->save();

        // Field PTdate
        $this->PTdate->AdvancedSearch->SearchValue = @$filter["x_PTdate"];
        $this->PTdate->AdvancedSearch->SearchOperator = @$filter["z_PTdate"];
        $this->PTdate->AdvancedSearch->SearchCondition = @$filter["v_PTdate"];
        $this->PTdate->AdvancedSearch->SearchValue2 = @$filter["y_PTdate"];
        $this->PTdate->AdvancedSearch->SearchOperator2 = @$filter["w_PTdate"];
        $this->PTdate->AdvancedSearch->save();

        // Field Reduced
        $this->Reduced->AdvancedSearch->SearchValue = @$filter["x_Reduced"];
        $this->Reduced->AdvancedSearch->SearchOperator = @$filter["z_Reduced"];
        $this->Reduced->AdvancedSearch->SearchCondition = @$filter["v_Reduced"];
        $this->Reduced->AdvancedSearch->SearchValue2 = @$filter["y_Reduced"];
        $this->Reduced->AdvancedSearch->SearchOperator2 = @$filter["w_Reduced"];
        $this->Reduced->AdvancedSearch->save();

        // Field INduced
        $this->INduced->AdvancedSearch->SearchValue = @$filter["x_INduced"];
        $this->INduced->AdvancedSearch->SearchOperator = @$filter["z_INduced"];
        $this->INduced->AdvancedSearch->SearchCondition = @$filter["v_INduced"];
        $this->INduced->AdvancedSearch->SearchValue2 = @$filter["y_INduced"];
        $this->INduced->AdvancedSearch->SearchOperator2 = @$filter["w_INduced"];
        $this->INduced->AdvancedSearch->save();

        // Field INducedDate
        $this->INducedDate->AdvancedSearch->SearchValue = @$filter["x_INducedDate"];
        $this->INducedDate->AdvancedSearch->SearchOperator = @$filter["z_INducedDate"];
        $this->INducedDate->AdvancedSearch->SearchCondition = @$filter["v_INducedDate"];
        $this->INducedDate->AdvancedSearch->SearchValue2 = @$filter["y_INducedDate"];
        $this->INducedDate->AdvancedSearch->SearchOperator2 = @$filter["w_INducedDate"];
        $this->INducedDate->AdvancedSearch->save();

        // Field Miscarriage
        $this->Miscarriage->AdvancedSearch->SearchValue = @$filter["x_Miscarriage"];
        $this->Miscarriage->AdvancedSearch->SearchOperator = @$filter["z_Miscarriage"];
        $this->Miscarriage->AdvancedSearch->SearchCondition = @$filter["v_Miscarriage"];
        $this->Miscarriage->AdvancedSearch->SearchValue2 = @$filter["y_Miscarriage"];
        $this->Miscarriage->AdvancedSearch->SearchOperator2 = @$filter["w_Miscarriage"];
        $this->Miscarriage->AdvancedSearch->save();

        // Field Induced1
        $this->Induced1->AdvancedSearch->SearchValue = @$filter["x_Induced1"];
        $this->Induced1->AdvancedSearch->SearchOperator = @$filter["z_Induced1"];
        $this->Induced1->AdvancedSearch->SearchCondition = @$filter["v_Induced1"];
        $this->Induced1->AdvancedSearch->SearchValue2 = @$filter["y_Induced1"];
        $this->Induced1->AdvancedSearch->SearchOperator2 = @$filter["w_Induced1"];
        $this->Induced1->AdvancedSearch->save();

        // Field Type
        $this->Type->AdvancedSearch->SearchValue = @$filter["x_Type"];
        $this->Type->AdvancedSearch->SearchOperator = @$filter["z_Type"];
        $this->Type->AdvancedSearch->SearchCondition = @$filter["v_Type"];
        $this->Type->AdvancedSearch->SearchValue2 = @$filter["y_Type"];
        $this->Type->AdvancedSearch->SearchOperator2 = @$filter["w_Type"];
        $this->Type->AdvancedSearch->save();

        // Field IfClinical
        $this->IfClinical->AdvancedSearch->SearchValue = @$filter["x_IfClinical"];
        $this->IfClinical->AdvancedSearch->SearchOperator = @$filter["z_IfClinical"];
        $this->IfClinical->AdvancedSearch->SearchCondition = @$filter["v_IfClinical"];
        $this->IfClinical->AdvancedSearch->SearchValue2 = @$filter["y_IfClinical"];
        $this->IfClinical->AdvancedSearch->SearchOperator2 = @$filter["w_IfClinical"];
        $this->IfClinical->AdvancedSearch->save();

        // Field GADate
        $this->GADate->AdvancedSearch->SearchValue = @$filter["x_GADate"];
        $this->GADate->AdvancedSearch->SearchOperator = @$filter["z_GADate"];
        $this->GADate->AdvancedSearch->SearchCondition = @$filter["v_GADate"];
        $this->GADate->AdvancedSearch->SearchValue2 = @$filter["y_GADate"];
        $this->GADate->AdvancedSearch->SearchOperator2 = @$filter["w_GADate"];
        $this->GADate->AdvancedSearch->save();

        // Field GA
        $this->GA->AdvancedSearch->SearchValue = @$filter["x_GA"];
        $this->GA->AdvancedSearch->SearchOperator = @$filter["z_GA"];
        $this->GA->AdvancedSearch->SearchCondition = @$filter["v_GA"];
        $this->GA->AdvancedSearch->SearchValue2 = @$filter["y_GA"];
        $this->GA->AdvancedSearch->SearchOperator2 = @$filter["w_GA"];
        $this->GA->AdvancedSearch->save();

        // Field FoetalDeath
        $this->FoetalDeath->AdvancedSearch->SearchValue = @$filter["x_FoetalDeath"];
        $this->FoetalDeath->AdvancedSearch->SearchOperator = @$filter["z_FoetalDeath"];
        $this->FoetalDeath->AdvancedSearch->SearchCondition = @$filter["v_FoetalDeath"];
        $this->FoetalDeath->AdvancedSearch->SearchValue2 = @$filter["y_FoetalDeath"];
        $this->FoetalDeath->AdvancedSearch->SearchOperator2 = @$filter["w_FoetalDeath"];
        $this->FoetalDeath->AdvancedSearch->save();

        // Field FerinatalDeath
        $this->FerinatalDeath->AdvancedSearch->SearchValue = @$filter["x_FerinatalDeath"];
        $this->FerinatalDeath->AdvancedSearch->SearchOperator = @$filter["z_FerinatalDeath"];
        $this->FerinatalDeath->AdvancedSearch->SearchCondition = @$filter["v_FerinatalDeath"];
        $this->FerinatalDeath->AdvancedSearch->SearchValue2 = @$filter["y_FerinatalDeath"];
        $this->FerinatalDeath->AdvancedSearch->SearchOperator2 = @$filter["w_FerinatalDeath"];
        $this->FerinatalDeath->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field Ectopic
        $this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
        $this->Ectopic->AdvancedSearch->save();

        // Field Extra
        $this->Extra->AdvancedSearch->SearchValue = @$filter["x_Extra"];
        $this->Extra->AdvancedSearch->SearchOperator = @$filter["z_Extra"];
        $this->Extra->AdvancedSearch->SearchCondition = @$filter["v_Extra"];
        $this->Extra->AdvancedSearch->SearchValue2 = @$filter["y_Extra"];
        $this->Extra->AdvancedSearch->SearchOperator2 = @$filter["w_Extra"];
        $this->Extra->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->treatment_status, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OPResult, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gestation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TransferdEmbryos, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InitalOfSacs, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ImplimentationRate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EmbryoNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ExtrauterineSac, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PregnancyMonozygotic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeGestation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Urine, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PTdate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Reduced, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->INduced, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->INducedDate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Miscarriage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Induced1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Type, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IfClinical, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GADate, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FoetalDeath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FerinatalDeath, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Extra, $arKeywords, $type);
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
            $this->updateSort($this->treatment_status); // treatment_status
            $this->updateSort($this->ARTCYCLE); // ARTCYCLE
            $this->updateSort($this->RESULT); // RESULT
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->outcomeDate); // outcomeDate
            $this->updateSort($this->outcomeDay); // outcomeDay
            $this->updateSort($this->OPResult); // OPResult
            $this->updateSort($this->Gestation); // Gestation
            $this->updateSort($this->TransferdEmbryos); // TransferdEmbryos
            $this->updateSort($this->InitalOfSacs); // InitalOfSacs
            $this->updateSort($this->ImplimentationRate); // ImplimentationRate
            $this->updateSort($this->EmbryoNo); // EmbryoNo
            $this->updateSort($this->ExtrauterineSac); // ExtrauterineSac
            $this->updateSort($this->PregnancyMonozygotic); // PregnancyMonozygotic
            $this->updateSort($this->TypeGestation); // TypeGestation
            $this->updateSort($this->Urine); // Urine
            $this->updateSort($this->PTdate); // PTdate
            $this->updateSort($this->Reduced); // Reduced
            $this->updateSort($this->INduced); // INduced
            $this->updateSort($this->INducedDate); // INducedDate
            $this->updateSort($this->Miscarriage); // Miscarriage
            $this->updateSort($this->Induced1); // Induced1
            $this->updateSort($this->Type); // Type
            $this->updateSort($this->IfClinical); // IfClinical
            $this->updateSort($this->GADate); // GADate
            $this->updateSort($this->GA); // GA
            $this->updateSort($this->FoetalDeath); // FoetalDeath
            $this->updateSort($this->FerinatalDeath); // FerinatalDeath
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->Ectopic); // Ectopic
            $this->updateSort($this->Extra); // Extra
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
                $this->treatment_status->setSort("");
                $this->ARTCYCLE->setSort("");
                $this->RESULT->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->outcomeDate->setSort("");
                $this->outcomeDay->setSort("");
                $this->OPResult->setSort("");
                $this->Gestation->setSort("");
                $this->TransferdEmbryos->setSort("");
                $this->InitalOfSacs->setSort("");
                $this->ImplimentationRate->setSort("");
                $this->EmbryoNo->setSort("");
                $this->ExtrauterineSac->setSort("");
                $this->PregnancyMonozygotic->setSort("");
                $this->TypeGestation->setSort("");
                $this->Urine->setSort("");
                $this->PTdate->setSort("");
                $this->Reduced->setSort("");
                $this->INduced->setSort("");
                $this->INducedDate->setSort("");
                $this->Miscarriage->setSort("");
                $this->Induced1->setSort("");
                $this->Type->setSort("");
                $this->IfClinical->setSort("");
                $this->GADate->setSort("");
                $this->GA->setSort("");
                $this->FoetalDeath->setSort("");
                $this->FerinatalDeath->setSort("");
                $this->TidNo->setSort("");
                $this->Ectopic->setSort("");
                $this->Extra->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_outcomelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_outcomelistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_outcomelist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->outcomeDate->setDbValue($row['outcomeDate']);
        $this->outcomeDay->setDbValue($row['outcomeDay']);
        $this->OPResult->setDbValue($row['OPResult']);
        $this->Gestation->setDbValue($row['Gestation']);
        $this->TransferdEmbryos->setDbValue($row['TransferdEmbryos']);
        $this->InitalOfSacs->setDbValue($row['InitalOfSacs']);
        $this->ImplimentationRate->setDbValue($row['ImplimentationRate']);
        $this->EmbryoNo->setDbValue($row['EmbryoNo']);
        $this->ExtrauterineSac->setDbValue($row['ExtrauterineSac']);
        $this->PregnancyMonozygotic->setDbValue($row['PregnancyMonozygotic']);
        $this->TypeGestation->setDbValue($row['TypeGestation']);
        $this->Urine->setDbValue($row['Urine']);
        $this->PTdate->setDbValue($row['PTdate']);
        $this->Reduced->setDbValue($row['Reduced']);
        $this->INduced->setDbValue($row['INduced']);
        $this->INducedDate->setDbValue($row['INducedDate']);
        $this->Miscarriage->setDbValue($row['Miscarriage']);
        $this->Induced1->setDbValue($row['Induced1']);
        $this->Type->setDbValue($row['Type']);
        $this->IfClinical->setDbValue($row['IfClinical']);
        $this->GADate->setDbValue($row['GADate']);
        $this->GA->setDbValue($row['GA']);
        $this->FoetalDeath->setDbValue($row['FoetalDeath']);
        $this->FerinatalDeath->setDbValue($row['FerinatalDeath']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Extra->setDbValue($row['Extra']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['treatment_status'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['outcomeDate'] = null;
        $row['outcomeDay'] = null;
        $row['OPResult'] = null;
        $row['Gestation'] = null;
        $row['TransferdEmbryos'] = null;
        $row['InitalOfSacs'] = null;
        $row['ImplimentationRate'] = null;
        $row['EmbryoNo'] = null;
        $row['ExtrauterineSac'] = null;
        $row['PregnancyMonozygotic'] = null;
        $row['TypeGestation'] = null;
        $row['Urine'] = null;
        $row['PTdate'] = null;
        $row['Reduced'] = null;
        $row['INduced'] = null;
        $row['INducedDate'] = null;
        $row['Miscarriage'] = null;
        $row['Induced1'] = null;
        $row['Type'] = null;
        $row['IfClinical'] = null;
        $row['GADate'] = null;
        $row['GA'] = null;
        $row['FoetalDeath'] = null;
        $row['FerinatalDeath'] = null;
        $row['TidNo'] = null;
        $row['Ectopic'] = null;
        $row['Extra'] = null;
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

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // outcomeDate

        // outcomeDay

        // OPResult

        // Gestation

        // TransferdEmbryos

        // InitalOfSacs

        // ImplimentationRate

        // EmbryoNo

        // ExtrauterineSac

        // PregnancyMonozygotic

        // TypeGestation

        // Urine

        // PTdate

        // Reduced

        // INduced

        // INducedDate

        // Miscarriage

        // Induced1

        // Type

        // IfClinical

        // GADate

        // GA

        // FoetalDeath

        // FerinatalDeath

        // TidNo

        // Ectopic

        // Extra
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

            // treatment_status
            $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // outcomeDate
            $this->outcomeDate->ViewValue = $this->outcomeDate->CurrentValue;
            $this->outcomeDate->ViewValue = FormatDateTime($this->outcomeDate->ViewValue, 0);
            $this->outcomeDate->ViewCustomAttributes = "";

            // outcomeDay
            $this->outcomeDay->ViewValue = $this->outcomeDay->CurrentValue;
            $this->outcomeDay->ViewValue = FormatDateTime($this->outcomeDay->ViewValue, 0);
            $this->outcomeDay->ViewCustomAttributes = "";

            // OPResult
            $this->OPResult->ViewValue = $this->OPResult->CurrentValue;
            $this->OPResult->ViewCustomAttributes = "";

            // Gestation
            $this->Gestation->ViewValue = $this->Gestation->CurrentValue;
            $this->Gestation->ViewCustomAttributes = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->ViewValue = $this->TransferdEmbryos->CurrentValue;
            $this->TransferdEmbryos->ViewCustomAttributes = "";

            // InitalOfSacs
            $this->InitalOfSacs->ViewValue = $this->InitalOfSacs->CurrentValue;
            $this->InitalOfSacs->ViewCustomAttributes = "";

            // ImplimentationRate
            $this->ImplimentationRate->ViewValue = $this->ImplimentationRate->CurrentValue;
            $this->ImplimentationRate->ViewCustomAttributes = "";

            // EmbryoNo
            $this->EmbryoNo->ViewValue = $this->EmbryoNo->CurrentValue;
            $this->EmbryoNo->ViewCustomAttributes = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->ViewValue = $this->ExtrauterineSac->CurrentValue;
            $this->ExtrauterineSac->ViewCustomAttributes = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->ViewValue = $this->PregnancyMonozygotic->CurrentValue;
            $this->PregnancyMonozygotic->ViewCustomAttributes = "";

            // TypeGestation
            $this->TypeGestation->ViewValue = $this->TypeGestation->CurrentValue;
            $this->TypeGestation->ViewCustomAttributes = "";

            // Urine
            $this->Urine->ViewValue = $this->Urine->CurrentValue;
            $this->Urine->ViewCustomAttributes = "";

            // PTdate
            $this->PTdate->ViewValue = $this->PTdate->CurrentValue;
            $this->PTdate->ViewCustomAttributes = "";

            // Reduced
            $this->Reduced->ViewValue = $this->Reduced->CurrentValue;
            $this->Reduced->ViewCustomAttributes = "";

            // INduced
            $this->INduced->ViewValue = $this->INduced->CurrentValue;
            $this->INduced->ViewCustomAttributes = "";

            // INducedDate
            $this->INducedDate->ViewValue = $this->INducedDate->CurrentValue;
            $this->INducedDate->ViewCustomAttributes = "";

            // Miscarriage
            $this->Miscarriage->ViewValue = $this->Miscarriage->CurrentValue;
            $this->Miscarriage->ViewCustomAttributes = "";

            // Induced1
            $this->Induced1->ViewValue = $this->Induced1->CurrentValue;
            $this->Induced1->ViewCustomAttributes = "";

            // Type
            $this->Type->ViewValue = $this->Type->CurrentValue;
            $this->Type->ViewCustomAttributes = "";

            // IfClinical
            $this->IfClinical->ViewValue = $this->IfClinical->CurrentValue;
            $this->IfClinical->ViewCustomAttributes = "";

            // GADate
            $this->GADate->ViewValue = $this->GADate->CurrentValue;
            $this->GADate->ViewCustomAttributes = "";

            // GA
            $this->GA->ViewValue = $this->GA->CurrentValue;
            $this->GA->ViewCustomAttributes = "";

            // FoetalDeath
            $this->FoetalDeath->ViewValue = $this->FoetalDeath->CurrentValue;
            $this->FoetalDeath->ViewCustomAttributes = "";

            // FerinatalDeath
            $this->FerinatalDeath->ViewValue = $this->FerinatalDeath->CurrentValue;
            $this->FerinatalDeath->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Ectopic
            $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
            $this->Ectopic->ViewCustomAttributes = "";

            // Extra
            $this->Extra->ViewValue = $this->Extra->CurrentValue;
            $this->Extra->ViewCustomAttributes = "";

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

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // outcomeDate
            $this->outcomeDate->LinkCustomAttributes = "";
            $this->outcomeDate->HrefValue = "";
            $this->outcomeDate->TooltipValue = "";

            // outcomeDay
            $this->outcomeDay->LinkCustomAttributes = "";
            $this->outcomeDay->HrefValue = "";
            $this->outcomeDay->TooltipValue = "";

            // OPResult
            $this->OPResult->LinkCustomAttributes = "";
            $this->OPResult->HrefValue = "";
            $this->OPResult->TooltipValue = "";

            // Gestation
            $this->Gestation->LinkCustomAttributes = "";
            $this->Gestation->HrefValue = "";
            $this->Gestation->TooltipValue = "";

            // TransferdEmbryos
            $this->TransferdEmbryos->LinkCustomAttributes = "";
            $this->TransferdEmbryos->HrefValue = "";
            $this->TransferdEmbryos->TooltipValue = "";

            // InitalOfSacs
            $this->InitalOfSacs->LinkCustomAttributes = "";
            $this->InitalOfSacs->HrefValue = "";
            $this->InitalOfSacs->TooltipValue = "";

            // ImplimentationRate
            $this->ImplimentationRate->LinkCustomAttributes = "";
            $this->ImplimentationRate->HrefValue = "";
            $this->ImplimentationRate->TooltipValue = "";

            // EmbryoNo
            $this->EmbryoNo->LinkCustomAttributes = "";
            $this->EmbryoNo->HrefValue = "";
            $this->EmbryoNo->TooltipValue = "";

            // ExtrauterineSac
            $this->ExtrauterineSac->LinkCustomAttributes = "";
            $this->ExtrauterineSac->HrefValue = "";
            $this->ExtrauterineSac->TooltipValue = "";

            // PregnancyMonozygotic
            $this->PregnancyMonozygotic->LinkCustomAttributes = "";
            $this->PregnancyMonozygotic->HrefValue = "";
            $this->PregnancyMonozygotic->TooltipValue = "";

            // TypeGestation
            $this->TypeGestation->LinkCustomAttributes = "";
            $this->TypeGestation->HrefValue = "";
            $this->TypeGestation->TooltipValue = "";

            // Urine
            $this->Urine->LinkCustomAttributes = "";
            $this->Urine->HrefValue = "";
            $this->Urine->TooltipValue = "";

            // PTdate
            $this->PTdate->LinkCustomAttributes = "";
            $this->PTdate->HrefValue = "";
            $this->PTdate->TooltipValue = "";

            // Reduced
            $this->Reduced->LinkCustomAttributes = "";
            $this->Reduced->HrefValue = "";
            $this->Reduced->TooltipValue = "";

            // INduced
            $this->INduced->LinkCustomAttributes = "";
            $this->INduced->HrefValue = "";
            $this->INduced->TooltipValue = "";

            // INducedDate
            $this->INducedDate->LinkCustomAttributes = "";
            $this->INducedDate->HrefValue = "";
            $this->INducedDate->TooltipValue = "";

            // Miscarriage
            $this->Miscarriage->LinkCustomAttributes = "";
            $this->Miscarriage->HrefValue = "";
            $this->Miscarriage->TooltipValue = "";

            // Induced1
            $this->Induced1->LinkCustomAttributes = "";
            $this->Induced1->HrefValue = "";
            $this->Induced1->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // IfClinical
            $this->IfClinical->LinkCustomAttributes = "";
            $this->IfClinical->HrefValue = "";
            $this->IfClinical->TooltipValue = "";

            // GADate
            $this->GADate->LinkCustomAttributes = "";
            $this->GADate->HrefValue = "";
            $this->GADate->TooltipValue = "";

            // GA
            $this->GA->LinkCustomAttributes = "";
            $this->GA->HrefValue = "";
            $this->GA->TooltipValue = "";

            // FoetalDeath
            $this->FoetalDeath->LinkCustomAttributes = "";
            $this->FoetalDeath->HrefValue = "";
            $this->FoetalDeath->TooltipValue = "";

            // FerinatalDeath
            $this->FerinatalDeath->LinkCustomAttributes = "";
            $this->FerinatalDeath->HrefValue = "";
            $this->FerinatalDeath->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";
            $this->Ectopic->TooltipValue = "";

            // Extra
            $this->Extra->LinkCustomAttributes = "";
            $this->Extra->HrefValue = "";
            $this->Extra->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_outcomelistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
