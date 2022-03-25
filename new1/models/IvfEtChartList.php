<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEtChartList extends IvfEtChart
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_et_chart';

    // Page object name
    public $PageObjName = "IvfEtChartList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fivf_et_chartlist";
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

        // Table object (ivf_et_chart)
        if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
            $GLOBALS["ivf_et_chart"] = &$this;
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
        $this->AddUrl = "IvfEtChartAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfEtChartDelete";
        $this->MultiUpdateUrl = "IvfEtChartUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_et_chartlistsrch";

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
                $doc = new $class(Container("ivf_et_chart"));
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
        $this->RIDNo->setVisibility();
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Consultant->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->PreTreatment->setVisibility();
        $this->Hysteroscopy->setVisibility();
        $this->EndometrialScratching->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->CYCLETYPE->setVisibility();
        $this->HRTCYCLE->setVisibility();
        $this->OralEstrogenDosage->setVisibility();
        $this->VaginalEstrogen->setVisibility();
        $this->GCSF->setVisibility();
        $this->ActivatedPRP->setVisibility();
        $this->ERA->setVisibility();
        $this->UCLcm->setVisibility();
        $this->DATEOFSTART->setVisibility();
        $this->DATEOFEMBRYOTRANSFER->setVisibility();
        $this->DAYOFEMBRYOTRANSFER->setVisibility();
        $this->NOOFEMBRYOSTHAWED->setVisibility();
        $this->NOOFEMBRYOSTRANSFERRED->setVisibility();
        $this->DAYOFEMBRYOS->setVisibility();
        $this->CRYOPRESERVEDEMBRYOS->setVisibility();
        $this->Code1->setVisibility();
        $this->Code2->setVisibility();
        $this->CellStage1->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade1->setVisibility();
        $this->Grade2->setVisibility();
        $this->ProcedureRecord->Visible = false;
        $this->Medicationsadvised->Visible = false;
        $this->PostProcedureInstructions->Visible = false;
        $this->PregnancyTestingWithSerumBetaHcG->setVisibility();
        $this->ReviewDate->setVisibility();
        $this->ReviewDoctor->setVisibility();
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
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->ARTCycle->AdvancedSearch->toJson(), ","); // Field ARTCycle
        $filterList = Concat($filterList, $this->Consultant->AdvancedSearch->toJson(), ","); // Field Consultant
        $filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
        $filterList = Concat($filterList, $this->IndicationForART->AdvancedSearch->toJson(), ","); // Field IndicationForART
        $filterList = Concat($filterList, $this->PreTreatment->AdvancedSearch->toJson(), ","); // Field PreTreatment
        $filterList = Concat($filterList, $this->Hysteroscopy->AdvancedSearch->toJson(), ","); // Field Hysteroscopy
        $filterList = Concat($filterList, $this->EndometrialScratching->AdvancedSearch->toJson(), ","); // Field EndometrialScratching
        $filterList = Concat($filterList, $this->TrialCannulation->AdvancedSearch->toJson(), ","); // Field TrialCannulation
        $filterList = Concat($filterList, $this->CYCLETYPE->AdvancedSearch->toJson(), ","); // Field CYCLETYPE
        $filterList = Concat($filterList, $this->HRTCYCLE->AdvancedSearch->toJson(), ","); // Field HRTCYCLE
        $filterList = Concat($filterList, $this->OralEstrogenDosage->AdvancedSearch->toJson(), ","); // Field OralEstrogenDosage
        $filterList = Concat($filterList, $this->VaginalEstrogen->AdvancedSearch->toJson(), ","); // Field VaginalEstrogen
        $filterList = Concat($filterList, $this->GCSF->AdvancedSearch->toJson(), ","); // Field GCSF
        $filterList = Concat($filterList, $this->ActivatedPRP->AdvancedSearch->toJson(), ","); // Field ActivatedPRP
        $filterList = Concat($filterList, $this->ERA->AdvancedSearch->toJson(), ","); // Field ERA
        $filterList = Concat($filterList, $this->UCLcm->AdvancedSearch->toJson(), ","); // Field UCLcm
        $filterList = Concat($filterList, $this->DATEOFSTART->AdvancedSearch->toJson(), ","); // Field DATEOFSTART
        $filterList = Concat($filterList, $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DATEOFEMBRYOTRANSFER
        $filterList = Concat($filterList, $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOTRANSFER
        $filterList = Concat($filterList, $this->NOOFEMBRYOSTHAWED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTHAWED
        $filterList = Concat($filterList, $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->toJson(), ","); // Field NOOFEMBRYOSTRANSFERRED
        $filterList = Concat($filterList, $this->DAYOFEMBRYOS->AdvancedSearch->toJson(), ","); // Field DAYOFEMBRYOS
        $filterList = Concat($filterList, $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->toJson(), ","); // Field CRYOPRESERVEDEMBRYOS
        $filterList = Concat($filterList, $this->Code1->AdvancedSearch->toJson(), ","); // Field Code1
        $filterList = Concat($filterList, $this->Code2->AdvancedSearch->toJson(), ","); // Field Code2
        $filterList = Concat($filterList, $this->CellStage1->AdvancedSearch->toJson(), ","); // Field CellStage1
        $filterList = Concat($filterList, $this->CellStage2->AdvancedSearch->toJson(), ","); // Field CellStage2
        $filterList = Concat($filterList, $this->Grade1->AdvancedSearch->toJson(), ","); // Field Grade1
        $filterList = Concat($filterList, $this->Grade2->AdvancedSearch->toJson(), ","); // Field Grade2
        $filterList = Concat($filterList, $this->ProcedureRecord->AdvancedSearch->toJson(), ","); // Field ProcedureRecord
        $filterList = Concat($filterList, $this->Medicationsadvised->AdvancedSearch->toJson(), ","); // Field Medicationsadvised
        $filterList = Concat($filterList, $this->PostProcedureInstructions->AdvancedSearch->toJson(), ","); // Field PostProcedureInstructions
        $filterList = Concat($filterList, $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->toJson(), ","); // Field PregnancyTestingWithSerumBetaHcG
        $filterList = Concat($filterList, $this->ReviewDate->AdvancedSearch->toJson(), ","); // Field ReviewDate
        $filterList = Concat($filterList, $this->ReviewDoctor->AdvancedSearch->toJson(), ","); // Field ReviewDoctor
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_et_chartlistsrch", $filters);
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

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field ARTCycle
        $this->ARTCycle->AdvancedSearch->SearchValue = @$filter["x_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator = @$filter["z_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchCondition = @$filter["v_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchValue2 = @$filter["y_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->save();

        // Field Consultant
        $this->Consultant->AdvancedSearch->SearchValue = @$filter["x_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator = @$filter["z_Consultant"];
        $this->Consultant->AdvancedSearch->SearchCondition = @$filter["v_Consultant"];
        $this->Consultant->AdvancedSearch->SearchValue2 = @$filter["y_Consultant"];
        $this->Consultant->AdvancedSearch->SearchOperator2 = @$filter["w_Consultant"];
        $this->Consultant->AdvancedSearch->save();

        // Field InseminatinTechnique
        $this->InseminatinTechnique->AdvancedSearch->SearchValue = @$filter["x_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator = @$filter["z_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchCondition = @$filter["v_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchValue2 = @$filter["y_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator2 = @$filter["w_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->save();

        // Field IndicationForART
        $this->IndicationForART->AdvancedSearch->SearchValue = @$filter["x_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchOperator = @$filter["z_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchCondition = @$filter["v_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchValue2 = @$filter["y_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchOperator2 = @$filter["w_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->save();

        // Field PreTreatment
        $this->PreTreatment->AdvancedSearch->SearchValue = @$filter["x_PreTreatment"];
        $this->PreTreatment->AdvancedSearch->SearchOperator = @$filter["z_PreTreatment"];
        $this->PreTreatment->AdvancedSearch->SearchCondition = @$filter["v_PreTreatment"];
        $this->PreTreatment->AdvancedSearch->SearchValue2 = @$filter["y_PreTreatment"];
        $this->PreTreatment->AdvancedSearch->SearchOperator2 = @$filter["w_PreTreatment"];
        $this->PreTreatment->AdvancedSearch->save();

        // Field Hysteroscopy
        $this->Hysteroscopy->AdvancedSearch->SearchValue = @$filter["x_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchOperator = @$filter["z_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchCondition = @$filter["v_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchValue2 = @$filter["y_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->SearchOperator2 = @$filter["w_Hysteroscopy"];
        $this->Hysteroscopy->AdvancedSearch->save();

        // Field EndometrialScratching
        $this->EndometrialScratching->AdvancedSearch->SearchValue = @$filter["x_EndometrialScratching"];
        $this->EndometrialScratching->AdvancedSearch->SearchOperator = @$filter["z_EndometrialScratching"];
        $this->EndometrialScratching->AdvancedSearch->SearchCondition = @$filter["v_EndometrialScratching"];
        $this->EndometrialScratching->AdvancedSearch->SearchValue2 = @$filter["y_EndometrialScratching"];
        $this->EndometrialScratching->AdvancedSearch->SearchOperator2 = @$filter["w_EndometrialScratching"];
        $this->EndometrialScratching->AdvancedSearch->save();

        // Field TrialCannulation
        $this->TrialCannulation->AdvancedSearch->SearchValue = @$filter["x_TrialCannulation"];
        $this->TrialCannulation->AdvancedSearch->SearchOperator = @$filter["z_TrialCannulation"];
        $this->TrialCannulation->AdvancedSearch->SearchCondition = @$filter["v_TrialCannulation"];
        $this->TrialCannulation->AdvancedSearch->SearchValue2 = @$filter["y_TrialCannulation"];
        $this->TrialCannulation->AdvancedSearch->SearchOperator2 = @$filter["w_TrialCannulation"];
        $this->TrialCannulation->AdvancedSearch->save();

        // Field CYCLETYPE
        $this->CYCLETYPE->AdvancedSearch->SearchValue = @$filter["x_CYCLETYPE"];
        $this->CYCLETYPE->AdvancedSearch->SearchOperator = @$filter["z_CYCLETYPE"];
        $this->CYCLETYPE->AdvancedSearch->SearchCondition = @$filter["v_CYCLETYPE"];
        $this->CYCLETYPE->AdvancedSearch->SearchValue2 = @$filter["y_CYCLETYPE"];
        $this->CYCLETYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CYCLETYPE"];
        $this->CYCLETYPE->AdvancedSearch->save();

        // Field HRTCYCLE
        $this->HRTCYCLE->AdvancedSearch->SearchValue = @$filter["x_HRTCYCLE"];
        $this->HRTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_HRTCYCLE"];
        $this->HRTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_HRTCYCLE"];
        $this->HRTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_HRTCYCLE"];
        $this->HRTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_HRTCYCLE"];
        $this->HRTCYCLE->AdvancedSearch->save();

        // Field OralEstrogenDosage
        $this->OralEstrogenDosage->AdvancedSearch->SearchValue = @$filter["x_OralEstrogenDosage"];
        $this->OralEstrogenDosage->AdvancedSearch->SearchOperator = @$filter["z_OralEstrogenDosage"];
        $this->OralEstrogenDosage->AdvancedSearch->SearchCondition = @$filter["v_OralEstrogenDosage"];
        $this->OralEstrogenDosage->AdvancedSearch->SearchValue2 = @$filter["y_OralEstrogenDosage"];
        $this->OralEstrogenDosage->AdvancedSearch->SearchOperator2 = @$filter["w_OralEstrogenDosage"];
        $this->OralEstrogenDosage->AdvancedSearch->save();

        // Field VaginalEstrogen
        $this->VaginalEstrogen->AdvancedSearch->SearchValue = @$filter["x_VaginalEstrogen"];
        $this->VaginalEstrogen->AdvancedSearch->SearchOperator = @$filter["z_VaginalEstrogen"];
        $this->VaginalEstrogen->AdvancedSearch->SearchCondition = @$filter["v_VaginalEstrogen"];
        $this->VaginalEstrogen->AdvancedSearch->SearchValue2 = @$filter["y_VaginalEstrogen"];
        $this->VaginalEstrogen->AdvancedSearch->SearchOperator2 = @$filter["w_VaginalEstrogen"];
        $this->VaginalEstrogen->AdvancedSearch->save();

        // Field GCSF
        $this->GCSF->AdvancedSearch->SearchValue = @$filter["x_GCSF"];
        $this->GCSF->AdvancedSearch->SearchOperator = @$filter["z_GCSF"];
        $this->GCSF->AdvancedSearch->SearchCondition = @$filter["v_GCSF"];
        $this->GCSF->AdvancedSearch->SearchValue2 = @$filter["y_GCSF"];
        $this->GCSF->AdvancedSearch->SearchOperator2 = @$filter["w_GCSF"];
        $this->GCSF->AdvancedSearch->save();

        // Field ActivatedPRP
        $this->ActivatedPRP->AdvancedSearch->SearchValue = @$filter["x_ActivatedPRP"];
        $this->ActivatedPRP->AdvancedSearch->SearchOperator = @$filter["z_ActivatedPRP"];
        $this->ActivatedPRP->AdvancedSearch->SearchCondition = @$filter["v_ActivatedPRP"];
        $this->ActivatedPRP->AdvancedSearch->SearchValue2 = @$filter["y_ActivatedPRP"];
        $this->ActivatedPRP->AdvancedSearch->SearchOperator2 = @$filter["w_ActivatedPRP"];
        $this->ActivatedPRP->AdvancedSearch->save();

        // Field ERA
        $this->ERA->AdvancedSearch->SearchValue = @$filter["x_ERA"];
        $this->ERA->AdvancedSearch->SearchOperator = @$filter["z_ERA"];
        $this->ERA->AdvancedSearch->SearchCondition = @$filter["v_ERA"];
        $this->ERA->AdvancedSearch->SearchValue2 = @$filter["y_ERA"];
        $this->ERA->AdvancedSearch->SearchOperator2 = @$filter["w_ERA"];
        $this->ERA->AdvancedSearch->save();

        // Field UCLcm
        $this->UCLcm->AdvancedSearch->SearchValue = @$filter["x_UCLcm"];
        $this->UCLcm->AdvancedSearch->SearchOperator = @$filter["z_UCLcm"];
        $this->UCLcm->AdvancedSearch->SearchCondition = @$filter["v_UCLcm"];
        $this->UCLcm->AdvancedSearch->SearchValue2 = @$filter["y_UCLcm"];
        $this->UCLcm->AdvancedSearch->SearchOperator2 = @$filter["w_UCLcm"];
        $this->UCLcm->AdvancedSearch->save();

        // Field DATEOFSTART
        $this->DATEOFSTART->AdvancedSearch->SearchValue = @$filter["x_DATEOFSTART"];
        $this->DATEOFSTART->AdvancedSearch->SearchOperator = @$filter["z_DATEOFSTART"];
        $this->DATEOFSTART->AdvancedSearch->SearchCondition = @$filter["v_DATEOFSTART"];
        $this->DATEOFSTART->AdvancedSearch->SearchValue2 = @$filter["y_DATEOFSTART"];
        $this->DATEOFSTART->AdvancedSearch->SearchOperator2 = @$filter["w_DATEOFSTART"];
        $this->DATEOFSTART->AdvancedSearch->save();

        // Field DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DATEOFEMBRYOTRANSFER"];
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DATEOFEMBRYOTRANSFER"];
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DATEOFEMBRYOTRANSFER"];
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DATEOFEMBRYOTRANSFER"];
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DATEOFEMBRYOTRANSFER"];
        $this->DATEOFEMBRYOTRANSFER->AdvancedSearch->save();

        // Field DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOTRANSFER"];
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOTRANSFER"];
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOTRANSFER"];
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOTRANSFER"];
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOTRANSFER"];
        $this->DAYOFEMBRYOTRANSFER->AdvancedSearch->save();

        // Field NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTHAWED"];
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTHAWED"];
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTHAWED"];
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTHAWED"];
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTHAWED"];
        $this->NOOFEMBRYOSTHAWED->AdvancedSearch->save();

        // Field NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue = @$filter["x_NOOFEMBRYOSTRANSFERRED"];
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator = @$filter["z_NOOFEMBRYOSTRANSFERRED"];
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchCondition = @$filter["v_NOOFEMBRYOSTRANSFERRED"];
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchValue2 = @$filter["y_NOOFEMBRYOSTRANSFERRED"];
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->SearchOperator2 = @$filter["w_NOOFEMBRYOSTRANSFERRED"];
        $this->NOOFEMBRYOSTRANSFERRED->AdvancedSearch->save();

        // Field DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_DAYOFEMBRYOS"];
        $this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_DAYOFEMBRYOS"];
        $this->DAYOFEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_DAYOFEMBRYOS"];
        $this->DAYOFEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_DAYOFEMBRYOS"];
        $this->DAYOFEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_DAYOFEMBRYOS"];
        $this->DAYOFEMBRYOS->AdvancedSearch->save();

        // Field CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue = @$filter["x_CRYOPRESERVEDEMBRYOS"];
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator = @$filter["z_CRYOPRESERVEDEMBRYOS"];
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchCondition = @$filter["v_CRYOPRESERVEDEMBRYOS"];
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchValue2 = @$filter["y_CRYOPRESERVEDEMBRYOS"];
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->SearchOperator2 = @$filter["w_CRYOPRESERVEDEMBRYOS"];
        $this->CRYOPRESERVEDEMBRYOS->AdvancedSearch->save();

        // Field Code1
        $this->Code1->AdvancedSearch->SearchValue = @$filter["x_Code1"];
        $this->Code1->AdvancedSearch->SearchOperator = @$filter["z_Code1"];
        $this->Code1->AdvancedSearch->SearchCondition = @$filter["v_Code1"];
        $this->Code1->AdvancedSearch->SearchValue2 = @$filter["y_Code1"];
        $this->Code1->AdvancedSearch->SearchOperator2 = @$filter["w_Code1"];
        $this->Code1->AdvancedSearch->save();

        // Field Code2
        $this->Code2->AdvancedSearch->SearchValue = @$filter["x_Code2"];
        $this->Code2->AdvancedSearch->SearchOperator = @$filter["z_Code2"];
        $this->Code2->AdvancedSearch->SearchCondition = @$filter["v_Code2"];
        $this->Code2->AdvancedSearch->SearchValue2 = @$filter["y_Code2"];
        $this->Code2->AdvancedSearch->SearchOperator2 = @$filter["w_Code2"];
        $this->Code2->AdvancedSearch->save();

        // Field CellStage1
        $this->CellStage1->AdvancedSearch->SearchValue = @$filter["x_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchOperator = @$filter["z_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchCondition = @$filter["v_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchValue2 = @$filter["y_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage1"];
        $this->CellStage1->AdvancedSearch->save();

        // Field CellStage2
        $this->CellStage2->AdvancedSearch->SearchValue = @$filter["x_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchOperator = @$filter["z_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchCondition = @$filter["v_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchValue2 = @$filter["y_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage2"];
        $this->CellStage2->AdvancedSearch->save();

        // Field Grade1
        $this->Grade1->AdvancedSearch->SearchValue = @$filter["x_Grade1"];
        $this->Grade1->AdvancedSearch->SearchOperator = @$filter["z_Grade1"];
        $this->Grade1->AdvancedSearch->SearchCondition = @$filter["v_Grade1"];
        $this->Grade1->AdvancedSearch->SearchValue2 = @$filter["y_Grade1"];
        $this->Grade1->AdvancedSearch->SearchOperator2 = @$filter["w_Grade1"];
        $this->Grade1->AdvancedSearch->save();

        // Field Grade2
        $this->Grade2->AdvancedSearch->SearchValue = @$filter["x_Grade2"];
        $this->Grade2->AdvancedSearch->SearchOperator = @$filter["z_Grade2"];
        $this->Grade2->AdvancedSearch->SearchCondition = @$filter["v_Grade2"];
        $this->Grade2->AdvancedSearch->SearchValue2 = @$filter["y_Grade2"];
        $this->Grade2->AdvancedSearch->SearchOperator2 = @$filter["w_Grade2"];
        $this->Grade2->AdvancedSearch->save();

        // Field ProcedureRecord
        $this->ProcedureRecord->AdvancedSearch->SearchValue = @$filter["x_ProcedureRecord"];
        $this->ProcedureRecord->AdvancedSearch->SearchOperator = @$filter["z_ProcedureRecord"];
        $this->ProcedureRecord->AdvancedSearch->SearchCondition = @$filter["v_ProcedureRecord"];
        $this->ProcedureRecord->AdvancedSearch->SearchValue2 = @$filter["y_ProcedureRecord"];
        $this->ProcedureRecord->AdvancedSearch->SearchOperator2 = @$filter["w_ProcedureRecord"];
        $this->ProcedureRecord->AdvancedSearch->save();

        // Field Medicationsadvised
        $this->Medicationsadvised->AdvancedSearch->SearchValue = @$filter["x_Medicationsadvised"];
        $this->Medicationsadvised->AdvancedSearch->SearchOperator = @$filter["z_Medicationsadvised"];
        $this->Medicationsadvised->AdvancedSearch->SearchCondition = @$filter["v_Medicationsadvised"];
        $this->Medicationsadvised->AdvancedSearch->SearchValue2 = @$filter["y_Medicationsadvised"];
        $this->Medicationsadvised->AdvancedSearch->SearchOperator2 = @$filter["w_Medicationsadvised"];
        $this->Medicationsadvised->AdvancedSearch->save();

        // Field PostProcedureInstructions
        $this->PostProcedureInstructions->AdvancedSearch->SearchValue = @$filter["x_PostProcedureInstructions"];
        $this->PostProcedureInstructions->AdvancedSearch->SearchOperator = @$filter["z_PostProcedureInstructions"];
        $this->PostProcedureInstructions->AdvancedSearch->SearchCondition = @$filter["v_PostProcedureInstructions"];
        $this->PostProcedureInstructions->AdvancedSearch->SearchValue2 = @$filter["y_PostProcedureInstructions"];
        $this->PostProcedureInstructions->AdvancedSearch->SearchOperator2 = @$filter["w_PostProcedureInstructions"];
        $this->PostProcedureInstructions->AdvancedSearch->save();

        // Field PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchValue = @$filter["x_PregnancyTestingWithSerumBetaHcG"];
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchOperator = @$filter["z_PregnancyTestingWithSerumBetaHcG"];
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchCondition = @$filter["v_PregnancyTestingWithSerumBetaHcG"];
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchValue2 = @$filter["y_PregnancyTestingWithSerumBetaHcG"];
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->SearchOperator2 = @$filter["w_PregnancyTestingWithSerumBetaHcG"];
        $this->PregnancyTestingWithSerumBetaHcG->AdvancedSearch->save();

        // Field ReviewDate
        $this->ReviewDate->AdvancedSearch->SearchValue = @$filter["x_ReviewDate"];
        $this->ReviewDate->AdvancedSearch->SearchOperator = @$filter["z_ReviewDate"];
        $this->ReviewDate->AdvancedSearch->SearchCondition = @$filter["v_ReviewDate"];
        $this->ReviewDate->AdvancedSearch->SearchValue2 = @$filter["y_ReviewDate"];
        $this->ReviewDate->AdvancedSearch->SearchOperator2 = @$filter["w_ReviewDate"];
        $this->ReviewDate->AdvancedSearch->save();

        // Field ReviewDoctor
        $this->ReviewDoctor->AdvancedSearch->SearchValue = @$filter["x_ReviewDoctor"];
        $this->ReviewDoctor->AdvancedSearch->SearchOperator = @$filter["z_ReviewDoctor"];
        $this->ReviewDoctor->AdvancedSearch->SearchCondition = @$filter["v_ReviewDoctor"];
        $this->ReviewDoctor->AdvancedSearch->SearchValue2 = @$filter["y_ReviewDoctor"];
        $this->ReviewDoctor->AdvancedSearch->SearchOperator2 = @$filter["w_ReviewDoctor"];
        $this->ReviewDoctor->AdvancedSearch->save();

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
        $this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Consultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IndicationForART, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PreTreatment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Hysteroscopy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndometrialScratching, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TrialCannulation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CYCLETYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HRTCYCLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OralEstrogenDosage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VaginalEstrogen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GCSF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ActivatedPRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ERA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UCLcm, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DAYOFEMBRYOTRANSFER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTHAWED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NOOFEMBRYOSTRANSFERRED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DAYOFEMBRYOS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CRYOPRESERVEDEMBRYOS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcedureRecord, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medicationsadvised, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PostProcedureInstructions, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PregnancyTestingWithSerumBetaHcG, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReviewDoctor, $arKeywords, $type);
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
            $this->updateSort($this->RIDNo); // RIDNo
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->ARTCycle); // ARTCycle
            $this->updateSort($this->Consultant); // Consultant
            $this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
            $this->updateSort($this->IndicationForART); // IndicationForART
            $this->updateSort($this->PreTreatment); // PreTreatment
            $this->updateSort($this->Hysteroscopy); // Hysteroscopy
            $this->updateSort($this->EndometrialScratching); // EndometrialScratching
            $this->updateSort($this->TrialCannulation); // TrialCannulation
            $this->updateSort($this->CYCLETYPE); // CYCLETYPE
            $this->updateSort($this->HRTCYCLE); // HRTCYCLE
            $this->updateSort($this->OralEstrogenDosage); // OralEstrogenDosage
            $this->updateSort($this->VaginalEstrogen); // VaginalEstrogen
            $this->updateSort($this->GCSF); // GCSF
            $this->updateSort($this->ActivatedPRP); // ActivatedPRP
            $this->updateSort($this->ERA); // ERA
            $this->updateSort($this->UCLcm); // UCLcm
            $this->updateSort($this->DATEOFSTART); // DATEOFSTART
            $this->updateSort($this->DATEOFEMBRYOTRANSFER); // DATEOFEMBRYOTRANSFER
            $this->updateSort($this->DAYOFEMBRYOTRANSFER); // DAYOFEMBRYOTRANSFER
            $this->updateSort($this->NOOFEMBRYOSTHAWED); // NOOFEMBRYOSTHAWED
            $this->updateSort($this->NOOFEMBRYOSTRANSFERRED); // NOOFEMBRYOSTRANSFERRED
            $this->updateSort($this->DAYOFEMBRYOS); // DAYOFEMBRYOS
            $this->updateSort($this->CRYOPRESERVEDEMBRYOS); // CRYOPRESERVEDEMBRYOS
            $this->updateSort($this->Code1); // Code1
            $this->updateSort($this->Code2); // Code2
            $this->updateSort($this->CellStage1); // CellStage1
            $this->updateSort($this->CellStage2); // CellStage2
            $this->updateSort($this->Grade1); // Grade1
            $this->updateSort($this->Grade2); // Grade2
            $this->updateSort($this->PregnancyTestingWithSerumBetaHcG); // PregnancyTestingWithSerumBetaHcG
            $this->updateSort($this->ReviewDate); // ReviewDate
            $this->updateSort($this->ReviewDoctor); // ReviewDoctor
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
                $this->RIDNo->setSort("");
                $this->Name->setSort("");
                $this->ARTCycle->setSort("");
                $this->Consultant->setSort("");
                $this->InseminatinTechnique->setSort("");
                $this->IndicationForART->setSort("");
                $this->PreTreatment->setSort("");
                $this->Hysteroscopy->setSort("");
                $this->EndometrialScratching->setSort("");
                $this->TrialCannulation->setSort("");
                $this->CYCLETYPE->setSort("");
                $this->HRTCYCLE->setSort("");
                $this->OralEstrogenDosage->setSort("");
                $this->VaginalEstrogen->setSort("");
                $this->GCSF->setSort("");
                $this->ActivatedPRP->setSort("");
                $this->ERA->setSort("");
                $this->UCLcm->setSort("");
                $this->DATEOFSTART->setSort("");
                $this->DATEOFEMBRYOTRANSFER->setSort("");
                $this->DAYOFEMBRYOTRANSFER->setSort("");
                $this->NOOFEMBRYOSTHAWED->setSort("");
                $this->NOOFEMBRYOSTRANSFERRED->setSort("");
                $this->DAYOFEMBRYOS->setSort("");
                $this->CRYOPRESERVEDEMBRYOS->setSort("");
                $this->Code1->setSort("");
                $this->Code2->setSort("");
                $this->CellStage1->setSort("");
                $this->CellStage2->setSort("");
                $this->Grade1->setSort("");
                $this->Grade2->setSort("");
                $this->ProcedureRecord->setSort("");
                $this->Medicationsadvised->setSort("");
                $this->PostProcedureInstructions->setSort("");
                $this->PregnancyTestingWithSerumBetaHcG->setSort("");
                $this->ReviewDate->setSort("");
                $this->ReviewDoctor->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_et_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_et_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_et_chartlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->PreTreatment->setDbValue($row['PreTreatment']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->ERA->setDbValue($row['ERA']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
        $this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
        $this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
        $this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
        $this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['Consultant'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['PreTreatment'] = null;
        $row['Hysteroscopy'] = null;
        $row['EndometrialScratching'] = null;
        $row['TrialCannulation'] = null;
        $row['CYCLETYPE'] = null;
        $row['HRTCYCLE'] = null;
        $row['OralEstrogenDosage'] = null;
        $row['VaginalEstrogen'] = null;
        $row['GCSF'] = null;
        $row['ActivatedPRP'] = null;
        $row['ERA'] = null;
        $row['UCLcm'] = null;
        $row['DATEOFSTART'] = null;
        $row['DATEOFEMBRYOTRANSFER'] = null;
        $row['DAYOFEMBRYOTRANSFER'] = null;
        $row['NOOFEMBRYOSTHAWED'] = null;
        $row['NOOFEMBRYOSTRANSFERRED'] = null;
        $row['DAYOFEMBRYOS'] = null;
        $row['CRYOPRESERVEDEMBRYOS'] = null;
        $row['Code1'] = null;
        $row['Code2'] = null;
        $row['CellStage1'] = null;
        $row['CellStage2'] = null;
        $row['Grade1'] = null;
        $row['Grade2'] = null;
        $row['ProcedureRecord'] = null;
        $row['Medicationsadvised'] = null;
        $row['PostProcedureInstructions'] = null;
        $row['PregnancyTestingWithSerumBetaHcG'] = null;
        $row['ReviewDate'] = null;
        $row['ReviewDoctor'] = null;
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

        // RIDNo

        // Name

        // ARTCycle

        // Consultant

        // InseminatinTechnique

        // IndicationForART

        // PreTreatment

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // ERA

        // UCLcm

        // DATEOFSTART

        // DATEOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // Code1

        // Code2

        // CellStage1

        // CellStage2

        // Grade1

        // Grade2

        // ProcedureRecord

        // Medicationsadvised

        // PostProcedureInstructions

        // PregnancyTestingWithSerumBetaHcG

        // ReviewDate

        // ReviewDoctor

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // PreTreatment
            $this->PreTreatment->ViewValue = $this->PreTreatment->CurrentValue;
            $this->PreTreatment->ViewCustomAttributes = "";

            // Hysteroscopy
            $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->CurrentValue;
            $this->Hysteroscopy->ViewCustomAttributes = "";

            // EndometrialScratching
            $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->CurrentValue;
            $this->EndometrialScratching->ViewCustomAttributes = "";

            // TrialCannulation
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
            $this->TrialCannulation->ViewCustomAttributes = "";

            // CYCLETYPE
            $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->CurrentValue;
            $this->CYCLETYPE->ViewCustomAttributes = "";

            // HRTCYCLE
            $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
            $this->HRTCYCLE->ViewCustomAttributes = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->CurrentValue;
            $this->OralEstrogenDosage->ViewCustomAttributes = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
            $this->VaginalEstrogen->ViewCustomAttributes = "";

            // GCSF
            $this->GCSF->ViewValue = $this->GCSF->CurrentValue;
            $this->GCSF->ViewCustomAttributes = "";

            // ActivatedPRP
            $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->CurrentValue;
            $this->ActivatedPRP->ViewCustomAttributes = "";

            // ERA
            $this->ERA->ViewValue = $this->ERA->CurrentValue;
            $this->ERA->ViewCustomAttributes = "";

            // UCLcm
            $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
            $this->UCLcm->ViewCustomAttributes = "";

            // DATEOFSTART
            $this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
            $this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 0);
            $this->DATEOFSTART->ViewCustomAttributes = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
            $this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 0);
            $this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
            $this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
            $this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
            $this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
            $this->DAYOFEMBRYOS->ViewCustomAttributes = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
            $this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // CellStage1
            $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
            $this->CellStage1->ViewCustomAttributes = "";

            // CellStage2
            $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade1
            $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
            $this->Grade1->ViewCustomAttributes = "";

            // Grade2
            $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
            $this->Grade2->ViewCustomAttributes = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
            $this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

            // ReviewDate
            $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
            $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
            $this->ReviewDate->ViewCustomAttributes = "";

            // ReviewDoctor
            $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
            $this->ReviewDoctor->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // PreTreatment
            $this->PreTreatment->LinkCustomAttributes = "";
            $this->PreTreatment->HrefValue = "";
            $this->PreTreatment->TooltipValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";
            $this->Hysteroscopy->TooltipValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";
            $this->EndometrialScratching->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";
            $this->CYCLETYPE->TooltipValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";
            $this->HRTCYCLE->TooltipValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";
            $this->OralEstrogenDosage->TooltipValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";
            $this->VaginalEstrogen->TooltipValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";
            $this->GCSF->TooltipValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";
            $this->ActivatedPRP->TooltipValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";
            $this->ERA->TooltipValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";
            $this->UCLcm->TooltipValue = "";

            // DATEOFSTART
            $this->DATEOFSTART->LinkCustomAttributes = "";
            $this->DATEOFSTART->HrefValue = "";
            $this->DATEOFSTART->TooltipValue = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->HrefValue = "";
            $this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";
            $this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";
            $this->NOOFEMBRYOSTHAWED->TooltipValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
            $this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";
            $this->DAYOFEMBRYOS->TooltipValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
            $this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
            $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
            $this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";
            $this->ReviewDate->TooltipValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";
            $this->ReviewDoctor->TooltipValue = "";

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_et_chartlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
