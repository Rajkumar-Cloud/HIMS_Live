<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEmbryologyChartList extends IvfEmbryologyChart
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_embryology_chart';

    // Page object name
    public $PageObjName = "IvfEmbryologyChartList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fivf_embryology_chartlist";
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

        // Table object (ivf_embryology_chart)
        if (!isset($GLOBALS["ivf_embryology_chart"]) || get_class($GLOBALS["ivf_embryology_chart"]) == PROJECT_NAMESPACE . "ivf_embryology_chart") {
            $GLOBALS["ivf_embryology_chart"] = &$this;
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
        $this->AddUrl = "IvfEmbryologyChartAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfEmbryologyChartDelete";
        $this->MultiUpdateUrl = "IvfEmbryologyChartUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_embryology_chart');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_embryology_chartlistsrch";

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
                $doc = new $class(Container("ivf_embryology_chart"));
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
        $this->SpermOrigin->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->Day0OocyteStage->setVisibility();
        $this->Day0PolarBodyPosition->setVisibility();
        $this->Day0Breakage->setVisibility();
        $this->Day1PN->setVisibility();
        $this->Day1PB->setVisibility();
        $this->Day1Pronucleus->setVisibility();
        $this->Day1Nucleolus->setVisibility();
        $this->Day1Halo->setVisibility();
        $this->Day1Sperm->setVisibility();
        $this->Day2CellNo->setVisibility();
        $this->Day2Frag->setVisibility();
        $this->Day2Symmetry->setVisibility();
        $this->Day2Cryoptop->setVisibility();
        $this->Day3CellNo->setVisibility();
        $this->Day3Frag->setVisibility();
        $this->Day3Symmetry->setVisibility();
        $this->Day3Grade->setVisibility();
        $this->Day3Vacoules->setVisibility();
        $this->Day3ZP->setVisibility();
        $this->Day3Cryoptop->setVisibility();
        $this->Day4CellNo->setVisibility();
        $this->Day4Frag->setVisibility();
        $this->Day4Symmetry->setVisibility();
        $this->Day4Grade->setVisibility();
        $this->Day4Cryoptop->setVisibility();
        $this->Day5CellNo->setVisibility();
        $this->Day5ICM->setVisibility();
        $this->Day5TE->setVisibility();
        $this->Day5Observation->setVisibility();
        $this->Day5Collapsed->setVisibility();
        $this->Day5Vacoulles->setVisibility();
        $this->Day5Grade->setVisibility();
        $this->Day5Cryoptop->setVisibility();
        $this->Day6CellNo->setVisibility();
        $this->Day6ICM->setVisibility();
        $this->Day6TE->setVisibility();
        $this->Day6Observation->setVisibility();
        $this->Day6Collapsed->setVisibility();
        $this->Day6Vacoulles->setVisibility();
        $this->Day6Grade->setVisibility();
        $this->Day6Cryoptop->setVisibility();
        $this->EndingDay->setVisibility();
        $this->EndingCellStage->setVisibility();
        $this->EndingGrade->setVisibility();
        $this->EndingState->setVisibility();
        $this->Day0sino->setVisibility();
        $this->Day0Attempts->setVisibility();
        $this->Day0SPZMorpho->setVisibility();
        $this->Day0SPZLocation->setVisibility();
        $this->Day2Grade->setVisibility();
        $this->Day3Sino->setVisibility();
        $this->Day3End->setVisibility();
        $this->Day4SiNo->setVisibility();
        $this->TidNo->setVisibility();
        $this->Day0SpOrgin->setVisibility();
        $this->DidNO->setVisibility();
        $this->ICSiIVFDateTime->setVisibility();
        $this->PrimaryEmbrologist->setVisibility();
        $this->SecondaryEmbrologist->setVisibility();
        $this->Incubator->setVisibility();
        $this->location->setVisibility();
        $this->Remarks->setVisibility();
        $this->OocyteNo->setVisibility();
        $this->Stage->setVisibility();
        $this->vitrificationDate->setVisibility();
        $this->vitriPrimaryEmbryologist->setVisibility();
        $this->vitriSecondaryEmbryologist->setVisibility();
        $this->vitriEmbryoNo->setVisibility();
        $this->vitriFertilisationDate->setVisibility();
        $this->vitriDay->setVisibility();
        $this->vitriGrade->setVisibility();
        $this->vitriIncubator->setVisibility();
        $this->vitriTank->setVisibility();
        $this->vitriCanister->setVisibility();
        $this->vitriGobiet->setVisibility();
        $this->vitriViscotube->setVisibility();
        $this->vitriCryolockNo->setVisibility();
        $this->vitriCryolockColour->setVisibility();
        $this->vitriStage->setVisibility();
        $this->thawDate->setVisibility();
        $this->thawPrimaryEmbryologist->setVisibility();
        $this->thawSecondaryEmbryologist->setVisibility();
        $this->thawET->setVisibility();
        $this->thawReFrozen->setVisibility();
        $this->thawAbserve->setVisibility();
        $this->thawDiscard->setVisibility();
        $this->ETCatheter->setVisibility();
        $this->ETDifficulty->setVisibility();
        $this->ETEasy->setVisibility();
        $this->ETComments->setVisibility();
        $this->ETDoctor->setVisibility();
        $this->ETEmbryologist->setVisibility();
        $this->Day2End->setVisibility();
        $this->Day2SiNo->setVisibility();
        $this->EndSiNo->setVisibility();
        $this->Day4End->setVisibility();
        $this->ETDate->setVisibility();
        $this->Day1End->setVisibility();
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
        $filterList = Concat($filterList, $this->SpermOrigin->AdvancedSearch->toJson(), ","); // Field SpermOrigin
        $filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
        $filterList = Concat($filterList, $this->IndicationForART->AdvancedSearch->toJson(), ","); // Field IndicationForART
        $filterList = Concat($filterList, $this->Day0OocyteStage->AdvancedSearch->toJson(), ","); // Field Day0OocyteStage
        $filterList = Concat($filterList, $this->Day0PolarBodyPosition->AdvancedSearch->toJson(), ","); // Field Day0PolarBodyPosition
        $filterList = Concat($filterList, $this->Day0Breakage->AdvancedSearch->toJson(), ","); // Field Day0Breakage
        $filterList = Concat($filterList, $this->Day1PN->AdvancedSearch->toJson(), ","); // Field Day1PN
        $filterList = Concat($filterList, $this->Day1PB->AdvancedSearch->toJson(), ","); // Field Day1PB
        $filterList = Concat($filterList, $this->Day1Pronucleus->AdvancedSearch->toJson(), ","); // Field Day1Pronucleus
        $filterList = Concat($filterList, $this->Day1Nucleolus->AdvancedSearch->toJson(), ","); // Field Day1Nucleolus
        $filterList = Concat($filterList, $this->Day1Halo->AdvancedSearch->toJson(), ","); // Field Day1Halo
        $filterList = Concat($filterList, $this->Day1Sperm->AdvancedSearch->toJson(), ","); // Field Day1Sperm
        $filterList = Concat($filterList, $this->Day2CellNo->AdvancedSearch->toJson(), ","); // Field Day2CellNo
        $filterList = Concat($filterList, $this->Day2Frag->AdvancedSearch->toJson(), ","); // Field Day2Frag
        $filterList = Concat($filterList, $this->Day2Symmetry->AdvancedSearch->toJson(), ","); // Field Day2Symmetry
        $filterList = Concat($filterList, $this->Day2Cryoptop->AdvancedSearch->toJson(), ","); // Field Day2Cryoptop
        $filterList = Concat($filterList, $this->Day3CellNo->AdvancedSearch->toJson(), ","); // Field Day3CellNo
        $filterList = Concat($filterList, $this->Day3Frag->AdvancedSearch->toJson(), ","); // Field Day3Frag
        $filterList = Concat($filterList, $this->Day3Symmetry->AdvancedSearch->toJson(), ","); // Field Day3Symmetry
        $filterList = Concat($filterList, $this->Day3Grade->AdvancedSearch->toJson(), ","); // Field Day3Grade
        $filterList = Concat($filterList, $this->Day3Vacoules->AdvancedSearch->toJson(), ","); // Field Day3Vacoules
        $filterList = Concat($filterList, $this->Day3ZP->AdvancedSearch->toJson(), ","); // Field Day3ZP
        $filterList = Concat($filterList, $this->Day3Cryoptop->AdvancedSearch->toJson(), ","); // Field Day3Cryoptop
        $filterList = Concat($filterList, $this->Day4CellNo->AdvancedSearch->toJson(), ","); // Field Day4CellNo
        $filterList = Concat($filterList, $this->Day4Frag->AdvancedSearch->toJson(), ","); // Field Day4Frag
        $filterList = Concat($filterList, $this->Day4Symmetry->AdvancedSearch->toJson(), ","); // Field Day4Symmetry
        $filterList = Concat($filterList, $this->Day4Grade->AdvancedSearch->toJson(), ","); // Field Day4Grade
        $filterList = Concat($filterList, $this->Day4Cryoptop->AdvancedSearch->toJson(), ","); // Field Day4Cryoptop
        $filterList = Concat($filterList, $this->Day5CellNo->AdvancedSearch->toJson(), ","); // Field Day5CellNo
        $filterList = Concat($filterList, $this->Day5ICM->AdvancedSearch->toJson(), ","); // Field Day5ICM
        $filterList = Concat($filterList, $this->Day5TE->AdvancedSearch->toJson(), ","); // Field Day5TE
        $filterList = Concat($filterList, $this->Day5Observation->AdvancedSearch->toJson(), ","); // Field Day5Observation
        $filterList = Concat($filterList, $this->Day5Collapsed->AdvancedSearch->toJson(), ","); // Field Day5Collapsed
        $filterList = Concat($filterList, $this->Day5Vacoulles->AdvancedSearch->toJson(), ","); // Field Day5Vacoulles
        $filterList = Concat($filterList, $this->Day5Grade->AdvancedSearch->toJson(), ","); // Field Day5Grade
        $filterList = Concat($filterList, $this->Day5Cryoptop->AdvancedSearch->toJson(), ","); // Field Day5Cryoptop
        $filterList = Concat($filterList, $this->Day6CellNo->AdvancedSearch->toJson(), ","); // Field Day6CellNo
        $filterList = Concat($filterList, $this->Day6ICM->AdvancedSearch->toJson(), ","); // Field Day6ICM
        $filterList = Concat($filterList, $this->Day6TE->AdvancedSearch->toJson(), ","); // Field Day6TE
        $filterList = Concat($filterList, $this->Day6Observation->AdvancedSearch->toJson(), ","); // Field Day6Observation
        $filterList = Concat($filterList, $this->Day6Collapsed->AdvancedSearch->toJson(), ","); // Field Day6Collapsed
        $filterList = Concat($filterList, $this->Day6Vacoulles->AdvancedSearch->toJson(), ","); // Field Day6Vacoulles
        $filterList = Concat($filterList, $this->Day6Grade->AdvancedSearch->toJson(), ","); // Field Day6Grade
        $filterList = Concat($filterList, $this->Day6Cryoptop->AdvancedSearch->toJson(), ","); // Field Day6Cryoptop
        $filterList = Concat($filterList, $this->EndingDay->AdvancedSearch->toJson(), ","); // Field EndingDay
        $filterList = Concat($filterList, $this->EndingCellStage->AdvancedSearch->toJson(), ","); // Field EndingCellStage
        $filterList = Concat($filterList, $this->EndingGrade->AdvancedSearch->toJson(), ","); // Field EndingGrade
        $filterList = Concat($filterList, $this->EndingState->AdvancedSearch->toJson(), ","); // Field EndingState
        $filterList = Concat($filterList, $this->Day0sino->AdvancedSearch->toJson(), ","); // Field Day0sino
        $filterList = Concat($filterList, $this->Day0Attempts->AdvancedSearch->toJson(), ","); // Field Day0Attempts
        $filterList = Concat($filterList, $this->Day0SPZMorpho->AdvancedSearch->toJson(), ","); // Field Day0SPZMorpho
        $filterList = Concat($filterList, $this->Day0SPZLocation->AdvancedSearch->toJson(), ","); // Field Day0SPZLocation
        $filterList = Concat($filterList, $this->Day2Grade->AdvancedSearch->toJson(), ","); // Field Day2Grade
        $filterList = Concat($filterList, $this->Day3Sino->AdvancedSearch->toJson(), ","); // Field Day3Sino
        $filterList = Concat($filterList, $this->Day3End->AdvancedSearch->toJson(), ","); // Field Day3End
        $filterList = Concat($filterList, $this->Day4SiNo->AdvancedSearch->toJson(), ","); // Field Day4SiNo
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->Day0SpOrgin->AdvancedSearch->toJson(), ","); // Field Day0SpOrgin
        $filterList = Concat($filterList, $this->DidNO->AdvancedSearch->toJson(), ","); // Field DidNO
        $filterList = Concat($filterList, $this->ICSiIVFDateTime->AdvancedSearch->toJson(), ","); // Field ICSiIVFDateTime
        $filterList = Concat($filterList, $this->PrimaryEmbrologist->AdvancedSearch->toJson(), ","); // Field PrimaryEmbrologist
        $filterList = Concat($filterList, $this->SecondaryEmbrologist->AdvancedSearch->toJson(), ","); // Field SecondaryEmbrologist
        $filterList = Concat($filterList, $this->Incubator->AdvancedSearch->toJson(), ","); // Field Incubator
        $filterList = Concat($filterList, $this->location->AdvancedSearch->toJson(), ","); // Field location
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->OocyteNo->AdvancedSearch->toJson(), ","); // Field OocyteNo
        $filterList = Concat($filterList, $this->Stage->AdvancedSearch->toJson(), ","); // Field Stage
        $filterList = Concat($filterList, $this->vitrificationDate->AdvancedSearch->toJson(), ","); // Field vitrificationDate
        $filterList = Concat($filterList, $this->vitriPrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field vitriPrimaryEmbryologist
        $filterList = Concat($filterList, $this->vitriSecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field vitriSecondaryEmbryologist
        $filterList = Concat($filterList, $this->vitriEmbryoNo->AdvancedSearch->toJson(), ","); // Field vitriEmbryoNo
        $filterList = Concat($filterList, $this->vitriFertilisationDate->AdvancedSearch->toJson(), ","); // Field vitriFertilisationDate
        $filterList = Concat($filterList, $this->vitriDay->AdvancedSearch->toJson(), ","); // Field vitriDay
        $filterList = Concat($filterList, $this->vitriGrade->AdvancedSearch->toJson(), ","); // Field vitriGrade
        $filterList = Concat($filterList, $this->vitriIncubator->AdvancedSearch->toJson(), ","); // Field vitriIncubator
        $filterList = Concat($filterList, $this->vitriTank->AdvancedSearch->toJson(), ","); // Field vitriTank
        $filterList = Concat($filterList, $this->vitriCanister->AdvancedSearch->toJson(), ","); // Field vitriCanister
        $filterList = Concat($filterList, $this->vitriGobiet->AdvancedSearch->toJson(), ","); // Field vitriGobiet
        $filterList = Concat($filterList, $this->vitriViscotube->AdvancedSearch->toJson(), ","); // Field vitriViscotube
        $filterList = Concat($filterList, $this->vitriCryolockNo->AdvancedSearch->toJson(), ","); // Field vitriCryolockNo
        $filterList = Concat($filterList, $this->vitriCryolockColour->AdvancedSearch->toJson(), ","); // Field vitriCryolockColour
        $filterList = Concat($filterList, $this->vitriStage->AdvancedSearch->toJson(), ","); // Field vitriStage
        $filterList = Concat($filterList, $this->thawDate->AdvancedSearch->toJson(), ","); // Field thawDate
        $filterList = Concat($filterList, $this->thawPrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawPrimaryEmbryologist
        $filterList = Concat($filterList, $this->thawSecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawSecondaryEmbryologist
        $filterList = Concat($filterList, $this->thawET->AdvancedSearch->toJson(), ","); // Field thawET
        $filterList = Concat($filterList, $this->thawReFrozen->AdvancedSearch->toJson(), ","); // Field thawReFrozen
        $filterList = Concat($filterList, $this->thawAbserve->AdvancedSearch->toJson(), ","); // Field thawAbserve
        $filterList = Concat($filterList, $this->thawDiscard->AdvancedSearch->toJson(), ","); // Field thawDiscard
        $filterList = Concat($filterList, $this->ETCatheter->AdvancedSearch->toJson(), ","); // Field ETCatheter
        $filterList = Concat($filterList, $this->ETDifficulty->AdvancedSearch->toJson(), ","); // Field ETDifficulty
        $filterList = Concat($filterList, $this->ETEasy->AdvancedSearch->toJson(), ","); // Field ETEasy
        $filterList = Concat($filterList, $this->ETComments->AdvancedSearch->toJson(), ","); // Field ETComments
        $filterList = Concat($filterList, $this->ETDoctor->AdvancedSearch->toJson(), ","); // Field ETDoctor
        $filterList = Concat($filterList, $this->ETEmbryologist->AdvancedSearch->toJson(), ","); // Field ETEmbryologist
        $filterList = Concat($filterList, $this->Day2End->AdvancedSearch->toJson(), ","); // Field Day2End
        $filterList = Concat($filterList, $this->Day2SiNo->AdvancedSearch->toJson(), ","); // Field Day2SiNo
        $filterList = Concat($filterList, $this->EndSiNo->AdvancedSearch->toJson(), ","); // Field EndSiNo
        $filterList = Concat($filterList, $this->Day4End->AdvancedSearch->toJson(), ","); // Field Day4End
        $filterList = Concat($filterList, $this->ETDate->AdvancedSearch->toJson(), ","); // Field ETDate
        $filterList = Concat($filterList, $this->Day1End->AdvancedSearch->toJson(), ","); // Field Day1End
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_embryology_chartlistsrch", $filters);
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

        // Field SpermOrigin
        $this->SpermOrigin->AdvancedSearch->SearchValue = @$filter["x_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchOperator = @$filter["z_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchCondition = @$filter["v_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchValue2 = @$filter["y_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchOperator2 = @$filter["w_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->save();

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

        // Field Day0OocyteStage
        $this->Day0OocyteStage->AdvancedSearch->SearchValue = @$filter["x_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchOperator = @$filter["z_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchCondition = @$filter["v_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchValue2 = @$filter["y_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchOperator2 = @$filter["w_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->save();

        // Field Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchValue = @$filter["x_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchOperator = @$filter["z_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchCondition = @$filter["v_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchValue2 = @$filter["y_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchOperator2 = @$filter["w_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->save();

        // Field Day0Breakage
        $this->Day0Breakage->AdvancedSearch->SearchValue = @$filter["x_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchOperator = @$filter["z_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchCondition = @$filter["v_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchValue2 = @$filter["y_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchOperator2 = @$filter["w_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->save();

        // Field Day1PN
        $this->Day1PN->AdvancedSearch->SearchValue = @$filter["x_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchOperator = @$filter["z_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchCondition = @$filter["v_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchValue2 = @$filter["y_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchOperator2 = @$filter["w_Day1PN"];
        $this->Day1PN->AdvancedSearch->save();

        // Field Day1PB
        $this->Day1PB->AdvancedSearch->SearchValue = @$filter["x_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchOperator = @$filter["z_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchCondition = @$filter["v_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchValue2 = @$filter["y_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchOperator2 = @$filter["w_Day1PB"];
        $this->Day1PB->AdvancedSearch->save();

        // Field Day1Pronucleus
        $this->Day1Pronucleus->AdvancedSearch->SearchValue = @$filter["x_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchOperator = @$filter["z_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchCondition = @$filter["v_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchValue2 = @$filter["y_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->save();

        // Field Day1Nucleolus
        $this->Day1Nucleolus->AdvancedSearch->SearchValue = @$filter["x_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchOperator = @$filter["z_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchCondition = @$filter["v_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchValue2 = @$filter["y_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->save();

        // Field Day1Halo
        $this->Day1Halo->AdvancedSearch->SearchValue = @$filter["x_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchOperator = @$filter["z_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchCondition = @$filter["v_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchValue2 = @$filter["y_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->save();

        // Field Day1Sperm
        $this->Day1Sperm->AdvancedSearch->SearchValue = @$filter["x_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchOperator = @$filter["z_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchCondition = @$filter["v_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchValue2 = @$filter["y_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->save();

        // Field Day2CellNo
        $this->Day2CellNo->AdvancedSearch->SearchValue = @$filter["x_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->save();

        // Field Day2Frag
        $this->Day2Frag->AdvancedSearch->SearchValue = @$filter["x_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchOperator = @$filter["z_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchCondition = @$filter["v_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->save();

        // Field Day2Symmetry
        $this->Day2Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->save();

        // Field Day2Cryoptop
        $this->Day2Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->save();

        // Field Day3CellNo
        $this->Day3CellNo->AdvancedSearch->SearchValue = @$filter["x_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->save();

        // Field Day3Frag
        $this->Day3Frag->AdvancedSearch->SearchValue = @$filter["x_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchOperator = @$filter["z_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchCondition = @$filter["v_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->save();

        // Field Day3Symmetry
        $this->Day3Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->save();

        // Field Day3Grade
        $this->Day3Grade->AdvancedSearch->SearchValue = @$filter["x_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchOperator = @$filter["z_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchCondition = @$filter["v_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->save();

        // Field Day3Vacoules
        $this->Day3Vacoules->AdvancedSearch->SearchValue = @$filter["x_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchOperator = @$filter["z_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchCondition = @$filter["v_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchValue2 = @$filter["y_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->save();

        // Field Day3ZP
        $this->Day3ZP->AdvancedSearch->SearchValue = @$filter["x_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchOperator = @$filter["z_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchCondition = @$filter["v_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchValue2 = @$filter["y_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchOperator2 = @$filter["w_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->save();

        // Field Day3Cryoptop
        $this->Day3Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->save();

        // Field Day4CellNo
        $this->Day4CellNo->AdvancedSearch->SearchValue = @$filter["x_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->save();

        // Field Day4Frag
        $this->Day4Frag->AdvancedSearch->SearchValue = @$filter["x_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchOperator = @$filter["z_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchCondition = @$filter["v_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->save();

        // Field Day4Symmetry
        $this->Day4Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->save();

        // Field Day4Grade
        $this->Day4Grade->AdvancedSearch->SearchValue = @$filter["x_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchOperator = @$filter["z_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchCondition = @$filter["v_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->save();

        // Field Day4Cryoptop
        $this->Day4Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->save();

        // Field Day5CellNo
        $this->Day5CellNo->AdvancedSearch->SearchValue = @$filter["x_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->save();

        // Field Day5ICM
        $this->Day5ICM->AdvancedSearch->SearchValue = @$filter["x_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchOperator = @$filter["z_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchCondition = @$filter["v_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchValue2 = @$filter["y_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchOperator2 = @$filter["w_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->save();

        // Field Day5TE
        $this->Day5TE->AdvancedSearch->SearchValue = @$filter["x_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchOperator = @$filter["z_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchCondition = @$filter["v_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchValue2 = @$filter["y_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchOperator2 = @$filter["w_Day5TE"];
        $this->Day5TE->AdvancedSearch->save();

        // Field Day5Observation
        $this->Day5Observation->AdvancedSearch->SearchValue = @$filter["x_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchOperator = @$filter["z_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchCondition = @$filter["v_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchValue2 = @$filter["y_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->save();

        // Field Day5Collapsed
        $this->Day5Collapsed->AdvancedSearch->SearchValue = @$filter["x_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchOperator = @$filter["z_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchCondition = @$filter["v_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchValue2 = @$filter["y_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->save();

        // Field Day5Vacoulles
        $this->Day5Vacoulles->AdvancedSearch->SearchValue = @$filter["x_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchOperator = @$filter["z_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchCondition = @$filter["v_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchValue2 = @$filter["y_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->save();

        // Field Day5Grade
        $this->Day5Grade->AdvancedSearch->SearchValue = @$filter["x_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchOperator = @$filter["z_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchCondition = @$filter["v_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->save();

        // Field Day5Cryoptop
        $this->Day5Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->save();

        // Field Day6CellNo
        $this->Day6CellNo->AdvancedSearch->SearchValue = @$filter["x_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->save();

        // Field Day6ICM
        $this->Day6ICM->AdvancedSearch->SearchValue = @$filter["x_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchOperator = @$filter["z_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchCondition = @$filter["v_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchValue2 = @$filter["y_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchOperator2 = @$filter["w_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->save();

        // Field Day6TE
        $this->Day6TE->AdvancedSearch->SearchValue = @$filter["x_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchOperator = @$filter["z_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchCondition = @$filter["v_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchValue2 = @$filter["y_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchOperator2 = @$filter["w_Day6TE"];
        $this->Day6TE->AdvancedSearch->save();

        // Field Day6Observation
        $this->Day6Observation->AdvancedSearch->SearchValue = @$filter["x_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchOperator = @$filter["z_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchCondition = @$filter["v_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchValue2 = @$filter["y_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->save();

        // Field Day6Collapsed
        $this->Day6Collapsed->AdvancedSearch->SearchValue = @$filter["x_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchOperator = @$filter["z_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchCondition = @$filter["v_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchValue2 = @$filter["y_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->save();

        // Field Day6Vacoulles
        $this->Day6Vacoulles->AdvancedSearch->SearchValue = @$filter["x_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchOperator = @$filter["z_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchCondition = @$filter["v_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchValue2 = @$filter["y_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->save();

        // Field Day6Grade
        $this->Day6Grade->AdvancedSearch->SearchValue = @$filter["x_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchOperator = @$filter["z_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchCondition = @$filter["v_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->save();

        // Field Day6Cryoptop
        $this->Day6Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->save();

        // Field EndingDay
        $this->EndingDay->AdvancedSearch->SearchValue = @$filter["x_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchOperator = @$filter["z_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchCondition = @$filter["v_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchValue2 = @$filter["y_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchOperator2 = @$filter["w_EndingDay"];
        $this->EndingDay->AdvancedSearch->save();

        // Field EndingCellStage
        $this->EndingCellStage->AdvancedSearch->SearchValue = @$filter["x_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchOperator = @$filter["z_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchCondition = @$filter["v_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchValue2 = @$filter["y_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchOperator2 = @$filter["w_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->save();

        // Field EndingGrade
        $this->EndingGrade->AdvancedSearch->SearchValue = @$filter["x_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchOperator = @$filter["z_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchCondition = @$filter["v_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchValue2 = @$filter["y_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchOperator2 = @$filter["w_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->save();

        // Field EndingState
        $this->EndingState->AdvancedSearch->SearchValue = @$filter["x_EndingState"];
        $this->EndingState->AdvancedSearch->SearchOperator = @$filter["z_EndingState"];
        $this->EndingState->AdvancedSearch->SearchCondition = @$filter["v_EndingState"];
        $this->EndingState->AdvancedSearch->SearchValue2 = @$filter["y_EndingState"];
        $this->EndingState->AdvancedSearch->SearchOperator2 = @$filter["w_EndingState"];
        $this->EndingState->AdvancedSearch->save();

        // Field Day0sino
        $this->Day0sino->AdvancedSearch->SearchValue = @$filter["x_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchOperator = @$filter["z_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchCondition = @$filter["v_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchValue2 = @$filter["y_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchOperator2 = @$filter["w_Day0sino"];
        $this->Day0sino->AdvancedSearch->save();

        // Field Day0Attempts
        $this->Day0Attempts->AdvancedSearch->SearchValue = @$filter["x_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchOperator = @$filter["z_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchCondition = @$filter["v_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchValue2 = @$filter["y_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchOperator2 = @$filter["w_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->save();

        // Field Day0SPZMorpho
        $this->Day0SPZMorpho->AdvancedSearch->SearchValue = @$filter["x_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchOperator = @$filter["z_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchCondition = @$filter["v_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchValue2 = @$filter["y_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->save();

        // Field Day0SPZLocation
        $this->Day0SPZLocation->AdvancedSearch->SearchValue = @$filter["x_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchOperator = @$filter["z_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchCondition = @$filter["v_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchValue2 = @$filter["y_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->save();

        // Field Day2Grade
        $this->Day2Grade->AdvancedSearch->SearchValue = @$filter["x_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchOperator = @$filter["z_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchCondition = @$filter["v_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->save();

        // Field Day3Sino
        $this->Day3Sino->AdvancedSearch->SearchValue = @$filter["x_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchOperator = @$filter["z_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchCondition = @$filter["v_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchValue2 = @$filter["y_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->save();

        // Field Day3End
        $this->Day3End->AdvancedSearch->SearchValue = @$filter["x_Day3End"];
        $this->Day3End->AdvancedSearch->SearchOperator = @$filter["z_Day3End"];
        $this->Day3End->AdvancedSearch->SearchCondition = @$filter["v_Day3End"];
        $this->Day3End->AdvancedSearch->SearchValue2 = @$filter["y_Day3End"];
        $this->Day3End->AdvancedSearch->SearchOperator2 = @$filter["w_Day3End"];
        $this->Day3End->AdvancedSearch->save();

        // Field Day4SiNo
        $this->Day4SiNo->AdvancedSearch->SearchValue = @$filter["x_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchOperator = @$filter["z_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchCondition = @$filter["v_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchValue2 = @$filter["y_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field Day0SpOrgin
        $this->Day0SpOrgin->AdvancedSearch->SearchValue = @$filter["x_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchOperator = @$filter["z_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchCondition = @$filter["v_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchValue2 = @$filter["y_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->save();

        // Field DidNO
        $this->DidNO->AdvancedSearch->SearchValue = @$filter["x_DidNO"];
        $this->DidNO->AdvancedSearch->SearchOperator = @$filter["z_DidNO"];
        $this->DidNO->AdvancedSearch->SearchCondition = @$filter["v_DidNO"];
        $this->DidNO->AdvancedSearch->SearchValue2 = @$filter["y_DidNO"];
        $this->DidNO->AdvancedSearch->SearchOperator2 = @$filter["w_DidNO"];
        $this->DidNO->AdvancedSearch->save();

        // Field ICSiIVFDateTime
        $this->ICSiIVFDateTime->AdvancedSearch->SearchValue = @$filter["x_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchOperator = @$filter["z_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchCondition = @$filter["v_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->save();

        // Field PrimaryEmbrologist
        $this->PrimaryEmbrologist->AdvancedSearch->SearchValue = @$filter["x_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchOperator = @$filter["z_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchCondition = @$filter["v_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchValue2 = @$filter["y_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchOperator2 = @$filter["w_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->save();

        // Field SecondaryEmbrologist
        $this->SecondaryEmbrologist->AdvancedSearch->SearchValue = @$filter["x_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchOperator = @$filter["z_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchCondition = @$filter["v_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchValue2 = @$filter["y_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchOperator2 = @$filter["w_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->save();

        // Field Incubator
        $this->Incubator->AdvancedSearch->SearchValue = @$filter["x_Incubator"];
        $this->Incubator->AdvancedSearch->SearchOperator = @$filter["z_Incubator"];
        $this->Incubator->AdvancedSearch->SearchCondition = @$filter["v_Incubator"];
        $this->Incubator->AdvancedSearch->SearchValue2 = @$filter["y_Incubator"];
        $this->Incubator->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator"];
        $this->Incubator->AdvancedSearch->save();

        // Field location
        $this->location->AdvancedSearch->SearchValue = @$filter["x_location"];
        $this->location->AdvancedSearch->SearchOperator = @$filter["z_location"];
        $this->location->AdvancedSearch->SearchCondition = @$filter["v_location"];
        $this->location->AdvancedSearch->SearchValue2 = @$filter["y_location"];
        $this->location->AdvancedSearch->SearchOperator2 = @$filter["w_location"];
        $this->location->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field OocyteNo
        $this->OocyteNo->AdvancedSearch->SearchValue = @$filter["x_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchOperator = @$filter["z_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchCondition = @$filter["v_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchValue2 = @$filter["y_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchOperator2 = @$filter["w_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->save();

        // Field Stage
        $this->Stage->AdvancedSearch->SearchValue = @$filter["x_Stage"];
        $this->Stage->AdvancedSearch->SearchOperator = @$filter["z_Stage"];
        $this->Stage->AdvancedSearch->SearchCondition = @$filter["v_Stage"];
        $this->Stage->AdvancedSearch->SearchValue2 = @$filter["y_Stage"];
        $this->Stage->AdvancedSearch->SearchOperator2 = @$filter["w_Stage"];
        $this->Stage->AdvancedSearch->save();

        // Field vitrificationDate
        $this->vitrificationDate->AdvancedSearch->SearchValue = @$filter["x_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchOperator = @$filter["z_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchCondition = @$filter["v_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchValue2 = @$filter["y_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchOperator2 = @$filter["w_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->save();

        // Field vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->save();

        // Field vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->save();

        // Field vitriEmbryoNo
        $this->vitriEmbryoNo->AdvancedSearch->SearchValue = @$filter["x_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchOperator = @$filter["z_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchCondition = @$filter["v_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchValue2 = @$filter["y_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchOperator2 = @$filter["w_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->save();

        // Field vitriFertilisationDate
        $this->vitriFertilisationDate->AdvancedSearch->SearchValue = @$filter["x_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchOperator = @$filter["z_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchCondition = @$filter["v_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchValue2 = @$filter["y_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchOperator2 = @$filter["w_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->save();

        // Field vitriDay
        $this->vitriDay->AdvancedSearch->SearchValue = @$filter["x_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchOperator = @$filter["z_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchCondition = @$filter["v_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchValue2 = @$filter["y_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchOperator2 = @$filter["w_vitriDay"];
        $this->vitriDay->AdvancedSearch->save();

        // Field vitriGrade
        $this->vitriGrade->AdvancedSearch->SearchValue = @$filter["x_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchOperator = @$filter["z_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchCondition = @$filter["v_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchValue2 = @$filter["y_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchOperator2 = @$filter["w_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->save();

        // Field vitriIncubator
        $this->vitriIncubator->AdvancedSearch->SearchValue = @$filter["x_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchOperator = @$filter["z_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchCondition = @$filter["v_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchValue2 = @$filter["y_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchOperator2 = @$filter["w_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->save();

        // Field vitriTank
        $this->vitriTank->AdvancedSearch->SearchValue = @$filter["x_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchOperator = @$filter["z_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchCondition = @$filter["v_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchValue2 = @$filter["y_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchOperator2 = @$filter["w_vitriTank"];
        $this->vitriTank->AdvancedSearch->save();

        // Field vitriCanister
        $this->vitriCanister->AdvancedSearch->SearchValue = @$filter["x_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchOperator = @$filter["z_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchCondition = @$filter["v_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchValue2 = @$filter["y_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->save();

        // Field vitriGobiet
        $this->vitriGobiet->AdvancedSearch->SearchValue = @$filter["x_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchOperator = @$filter["z_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchCondition = @$filter["v_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchValue2 = @$filter["y_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchOperator2 = @$filter["w_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->save();

        // Field vitriViscotube
        $this->vitriViscotube->AdvancedSearch->SearchValue = @$filter["x_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchOperator = @$filter["z_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchCondition = @$filter["v_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchValue2 = @$filter["y_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchOperator2 = @$filter["w_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->save();

        // Field vitriCryolockNo
        $this->vitriCryolockNo->AdvancedSearch->SearchValue = @$filter["x_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchOperator = @$filter["z_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchCondition = @$filter["v_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchValue2 = @$filter["y_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->save();

        // Field vitriCryolockColour
        $this->vitriCryolockColour->AdvancedSearch->SearchValue = @$filter["x_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchOperator = @$filter["z_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchCondition = @$filter["v_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchValue2 = @$filter["y_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->save();

        // Field vitriStage
        $this->vitriStage->AdvancedSearch->SearchValue = @$filter["x_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchOperator = @$filter["z_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchCondition = @$filter["v_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchValue2 = @$filter["y_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchOperator2 = @$filter["w_vitriStage"];
        $this->vitriStage->AdvancedSearch->save();

        // Field thawDate
        $this->thawDate->AdvancedSearch->SearchValue = @$filter["x_thawDate"];
        $this->thawDate->AdvancedSearch->SearchOperator = @$filter["z_thawDate"];
        $this->thawDate->AdvancedSearch->SearchCondition = @$filter["v_thawDate"];
        $this->thawDate->AdvancedSearch->SearchValue2 = @$filter["y_thawDate"];
        $this->thawDate->AdvancedSearch->SearchOperator2 = @$filter["w_thawDate"];
        $this->thawDate->AdvancedSearch->save();

        // Field thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->save();

        // Field thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->save();

        // Field thawET
        $this->thawET->AdvancedSearch->SearchValue = @$filter["x_thawET"];
        $this->thawET->AdvancedSearch->SearchOperator = @$filter["z_thawET"];
        $this->thawET->AdvancedSearch->SearchCondition = @$filter["v_thawET"];
        $this->thawET->AdvancedSearch->SearchValue2 = @$filter["y_thawET"];
        $this->thawET->AdvancedSearch->SearchOperator2 = @$filter["w_thawET"];
        $this->thawET->AdvancedSearch->save();

        // Field thawReFrozen
        $this->thawReFrozen->AdvancedSearch->SearchValue = @$filter["x_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchOperator = @$filter["z_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchCondition = @$filter["v_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchValue2 = @$filter["y_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchOperator2 = @$filter["w_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->save();

        // Field thawAbserve
        $this->thawAbserve->AdvancedSearch->SearchValue = @$filter["x_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchOperator = @$filter["z_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchCondition = @$filter["v_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchValue2 = @$filter["y_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchOperator2 = @$filter["w_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->save();

        // Field thawDiscard
        $this->thawDiscard->AdvancedSearch->SearchValue = @$filter["x_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchOperator = @$filter["z_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchCondition = @$filter["v_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchValue2 = @$filter["y_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchOperator2 = @$filter["w_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->save();

        // Field ETCatheter
        $this->ETCatheter->AdvancedSearch->SearchValue = @$filter["x_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchOperator = @$filter["z_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchCondition = @$filter["v_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchValue2 = @$filter["y_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchOperator2 = @$filter["w_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->save();

        // Field ETDifficulty
        $this->ETDifficulty->AdvancedSearch->SearchValue = @$filter["x_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchOperator = @$filter["z_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchCondition = @$filter["v_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchValue2 = @$filter["y_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchOperator2 = @$filter["w_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->save();

        // Field ETEasy
        $this->ETEasy->AdvancedSearch->SearchValue = @$filter["x_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchOperator = @$filter["z_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchCondition = @$filter["v_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchValue2 = @$filter["y_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchOperator2 = @$filter["w_ETEasy"];
        $this->ETEasy->AdvancedSearch->save();

        // Field ETComments
        $this->ETComments->AdvancedSearch->SearchValue = @$filter["x_ETComments"];
        $this->ETComments->AdvancedSearch->SearchOperator = @$filter["z_ETComments"];
        $this->ETComments->AdvancedSearch->SearchCondition = @$filter["v_ETComments"];
        $this->ETComments->AdvancedSearch->SearchValue2 = @$filter["y_ETComments"];
        $this->ETComments->AdvancedSearch->SearchOperator2 = @$filter["w_ETComments"];
        $this->ETComments->AdvancedSearch->save();

        // Field ETDoctor
        $this->ETDoctor->AdvancedSearch->SearchValue = @$filter["x_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchOperator = @$filter["z_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchCondition = @$filter["v_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchValue2 = @$filter["y_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchOperator2 = @$filter["w_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->save();

        // Field ETEmbryologist
        $this->ETEmbryologist->AdvancedSearch->SearchValue = @$filter["x_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->save();

        // Field Day2End
        $this->Day2End->AdvancedSearch->SearchValue = @$filter["x_Day2End"];
        $this->Day2End->AdvancedSearch->SearchOperator = @$filter["z_Day2End"];
        $this->Day2End->AdvancedSearch->SearchCondition = @$filter["v_Day2End"];
        $this->Day2End->AdvancedSearch->SearchValue2 = @$filter["y_Day2End"];
        $this->Day2End->AdvancedSearch->SearchOperator2 = @$filter["w_Day2End"];
        $this->Day2End->AdvancedSearch->save();

        // Field Day2SiNo
        $this->Day2SiNo->AdvancedSearch->SearchValue = @$filter["x_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchOperator = @$filter["z_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchCondition = @$filter["v_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchValue2 = @$filter["y_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->save();

        // Field EndSiNo
        $this->EndSiNo->AdvancedSearch->SearchValue = @$filter["x_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchOperator = @$filter["z_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchCondition = @$filter["v_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchValue2 = @$filter["y_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchOperator2 = @$filter["w_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->save();

        // Field Day4End
        $this->Day4End->AdvancedSearch->SearchValue = @$filter["x_Day4End"];
        $this->Day4End->AdvancedSearch->SearchOperator = @$filter["z_Day4End"];
        $this->Day4End->AdvancedSearch->SearchCondition = @$filter["v_Day4End"];
        $this->Day4End->AdvancedSearch->SearchValue2 = @$filter["y_Day4End"];
        $this->Day4End->AdvancedSearch->SearchOperator2 = @$filter["w_Day4End"];
        $this->Day4End->AdvancedSearch->save();

        // Field ETDate
        $this->ETDate->AdvancedSearch->SearchValue = @$filter["x_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator = @$filter["z_ETDate"];
        $this->ETDate->AdvancedSearch->SearchCondition = @$filter["v_ETDate"];
        $this->ETDate->AdvancedSearch->SearchValue2 = @$filter["y_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator2 = @$filter["w_ETDate"];
        $this->ETDate->AdvancedSearch->save();

        // Field Day1End
        $this->Day1End->AdvancedSearch->SearchValue = @$filter["x_Day1End"];
        $this->Day1End->AdvancedSearch->SearchOperator = @$filter["z_Day1End"];
        $this->Day1End->AdvancedSearch->SearchCondition = @$filter["v_Day1End"];
        $this->Day1End->AdvancedSearch->SearchValue2 = @$filter["y_Day1End"];
        $this->Day1End->AdvancedSearch->SearchOperator2 = @$filter["w_Day1End"];
        $this->Day1End->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermOrigin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IndicationForART, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0OocyteStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0PolarBodyPosition, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0Breakage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1PN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1PB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Pronucleus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Nucleolus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Halo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Sperm, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Vacoules, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3ZP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5ICM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5TE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Observation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Collapsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Vacoulles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6ICM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6TE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Observation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Collapsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Vacoulles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingDay, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingCellStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingGrade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingState, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0sino, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0Attempts, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SPZMorpho, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SPZLocation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Sino, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4SiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SpOrgin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DidNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrimaryEmbrologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SecondaryEmbrologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Incubator, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->location, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OocyteNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Stage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriPrimaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriSecondaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriEmbryoNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriDay, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriGrade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriIncubator, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriTank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCanister, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriGobiet, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriViscotube, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCryolockNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCryolockColour, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawPrimaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawSecondaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawReFrozen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawAbserve, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawDiscard, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETCatheter, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETDifficulty, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETEasy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETComments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETDoctor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2SiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndSiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1End, $arKeywords, $type);
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
            $this->updateSort($this->SpermOrigin); // SpermOrigin
            $this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
            $this->updateSort($this->IndicationForART); // IndicationForART
            $this->updateSort($this->Day0OocyteStage); // Day0OocyteStage
            $this->updateSort($this->Day0PolarBodyPosition); // Day0PolarBodyPosition
            $this->updateSort($this->Day0Breakage); // Day0Breakage
            $this->updateSort($this->Day1PN); // Day1PN
            $this->updateSort($this->Day1PB); // Day1PB
            $this->updateSort($this->Day1Pronucleus); // Day1Pronucleus
            $this->updateSort($this->Day1Nucleolus); // Day1Nucleolus
            $this->updateSort($this->Day1Halo); // Day1Halo
            $this->updateSort($this->Day1Sperm); // Day1Sperm
            $this->updateSort($this->Day2CellNo); // Day2CellNo
            $this->updateSort($this->Day2Frag); // Day2Frag
            $this->updateSort($this->Day2Symmetry); // Day2Symmetry
            $this->updateSort($this->Day2Cryoptop); // Day2Cryoptop
            $this->updateSort($this->Day3CellNo); // Day3CellNo
            $this->updateSort($this->Day3Frag); // Day3Frag
            $this->updateSort($this->Day3Symmetry); // Day3Symmetry
            $this->updateSort($this->Day3Grade); // Day3Grade
            $this->updateSort($this->Day3Vacoules); // Day3Vacoules
            $this->updateSort($this->Day3ZP); // Day3ZP
            $this->updateSort($this->Day3Cryoptop); // Day3Cryoptop
            $this->updateSort($this->Day4CellNo); // Day4CellNo
            $this->updateSort($this->Day4Frag); // Day4Frag
            $this->updateSort($this->Day4Symmetry); // Day4Symmetry
            $this->updateSort($this->Day4Grade); // Day4Grade
            $this->updateSort($this->Day4Cryoptop); // Day4Cryoptop
            $this->updateSort($this->Day5CellNo); // Day5CellNo
            $this->updateSort($this->Day5ICM); // Day5ICM
            $this->updateSort($this->Day5TE); // Day5TE
            $this->updateSort($this->Day5Observation); // Day5Observation
            $this->updateSort($this->Day5Collapsed); // Day5Collapsed
            $this->updateSort($this->Day5Vacoulles); // Day5Vacoulles
            $this->updateSort($this->Day5Grade); // Day5Grade
            $this->updateSort($this->Day5Cryoptop); // Day5Cryoptop
            $this->updateSort($this->Day6CellNo); // Day6CellNo
            $this->updateSort($this->Day6ICM); // Day6ICM
            $this->updateSort($this->Day6TE); // Day6TE
            $this->updateSort($this->Day6Observation); // Day6Observation
            $this->updateSort($this->Day6Collapsed); // Day6Collapsed
            $this->updateSort($this->Day6Vacoulles); // Day6Vacoulles
            $this->updateSort($this->Day6Grade); // Day6Grade
            $this->updateSort($this->Day6Cryoptop); // Day6Cryoptop
            $this->updateSort($this->EndingDay); // EndingDay
            $this->updateSort($this->EndingCellStage); // EndingCellStage
            $this->updateSort($this->EndingGrade); // EndingGrade
            $this->updateSort($this->EndingState); // EndingState
            $this->updateSort($this->Day0sino); // Day0sino
            $this->updateSort($this->Day0Attempts); // Day0Attempts
            $this->updateSort($this->Day0SPZMorpho); // Day0SPZMorpho
            $this->updateSort($this->Day0SPZLocation); // Day0SPZLocation
            $this->updateSort($this->Day2Grade); // Day2Grade
            $this->updateSort($this->Day3Sino); // Day3Sino
            $this->updateSort($this->Day3End); // Day3End
            $this->updateSort($this->Day4SiNo); // Day4SiNo
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->Day0SpOrgin); // Day0SpOrgin
            $this->updateSort($this->DidNO); // DidNO
            $this->updateSort($this->ICSiIVFDateTime); // ICSiIVFDateTime
            $this->updateSort($this->PrimaryEmbrologist); // PrimaryEmbrologist
            $this->updateSort($this->SecondaryEmbrologist); // SecondaryEmbrologist
            $this->updateSort($this->Incubator); // Incubator
            $this->updateSort($this->location); // location
            $this->updateSort($this->Remarks); // Remarks
            $this->updateSort($this->OocyteNo); // OocyteNo
            $this->updateSort($this->Stage); // Stage
            $this->updateSort($this->vitrificationDate); // vitrificationDate
            $this->updateSort($this->vitriPrimaryEmbryologist); // vitriPrimaryEmbryologist
            $this->updateSort($this->vitriSecondaryEmbryologist); // vitriSecondaryEmbryologist
            $this->updateSort($this->vitriEmbryoNo); // vitriEmbryoNo
            $this->updateSort($this->vitriFertilisationDate); // vitriFertilisationDate
            $this->updateSort($this->vitriDay); // vitriDay
            $this->updateSort($this->vitriGrade); // vitriGrade
            $this->updateSort($this->vitriIncubator); // vitriIncubator
            $this->updateSort($this->vitriTank); // vitriTank
            $this->updateSort($this->vitriCanister); // vitriCanister
            $this->updateSort($this->vitriGobiet); // vitriGobiet
            $this->updateSort($this->vitriViscotube); // vitriViscotube
            $this->updateSort($this->vitriCryolockNo); // vitriCryolockNo
            $this->updateSort($this->vitriCryolockColour); // vitriCryolockColour
            $this->updateSort($this->vitriStage); // vitriStage
            $this->updateSort($this->thawDate); // thawDate
            $this->updateSort($this->thawPrimaryEmbryologist); // thawPrimaryEmbryologist
            $this->updateSort($this->thawSecondaryEmbryologist); // thawSecondaryEmbryologist
            $this->updateSort($this->thawET); // thawET
            $this->updateSort($this->thawReFrozen); // thawReFrozen
            $this->updateSort($this->thawAbserve); // thawAbserve
            $this->updateSort($this->thawDiscard); // thawDiscard
            $this->updateSort($this->ETCatheter); // ETCatheter
            $this->updateSort($this->ETDifficulty); // ETDifficulty
            $this->updateSort($this->ETEasy); // ETEasy
            $this->updateSort($this->ETComments); // ETComments
            $this->updateSort($this->ETDoctor); // ETDoctor
            $this->updateSort($this->ETEmbryologist); // ETEmbryologist
            $this->updateSort($this->Day2End); // Day2End
            $this->updateSort($this->Day2SiNo); // Day2SiNo
            $this->updateSort($this->EndSiNo); // EndSiNo
            $this->updateSort($this->Day4End); // Day4End
            $this->updateSort($this->ETDate); // ETDate
            $this->updateSort($this->Day1End); // Day1End
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
                $this->SpermOrigin->setSort("");
                $this->InseminatinTechnique->setSort("");
                $this->IndicationForART->setSort("");
                $this->Day0OocyteStage->setSort("");
                $this->Day0PolarBodyPosition->setSort("");
                $this->Day0Breakage->setSort("");
                $this->Day1PN->setSort("");
                $this->Day1PB->setSort("");
                $this->Day1Pronucleus->setSort("");
                $this->Day1Nucleolus->setSort("");
                $this->Day1Halo->setSort("");
                $this->Day1Sperm->setSort("");
                $this->Day2CellNo->setSort("");
                $this->Day2Frag->setSort("");
                $this->Day2Symmetry->setSort("");
                $this->Day2Cryoptop->setSort("");
                $this->Day3CellNo->setSort("");
                $this->Day3Frag->setSort("");
                $this->Day3Symmetry->setSort("");
                $this->Day3Grade->setSort("");
                $this->Day3Vacoules->setSort("");
                $this->Day3ZP->setSort("");
                $this->Day3Cryoptop->setSort("");
                $this->Day4CellNo->setSort("");
                $this->Day4Frag->setSort("");
                $this->Day4Symmetry->setSort("");
                $this->Day4Grade->setSort("");
                $this->Day4Cryoptop->setSort("");
                $this->Day5CellNo->setSort("");
                $this->Day5ICM->setSort("");
                $this->Day5TE->setSort("");
                $this->Day5Observation->setSort("");
                $this->Day5Collapsed->setSort("");
                $this->Day5Vacoulles->setSort("");
                $this->Day5Grade->setSort("");
                $this->Day5Cryoptop->setSort("");
                $this->Day6CellNo->setSort("");
                $this->Day6ICM->setSort("");
                $this->Day6TE->setSort("");
                $this->Day6Observation->setSort("");
                $this->Day6Collapsed->setSort("");
                $this->Day6Vacoulles->setSort("");
                $this->Day6Grade->setSort("");
                $this->Day6Cryoptop->setSort("");
                $this->EndingDay->setSort("");
                $this->EndingCellStage->setSort("");
                $this->EndingGrade->setSort("");
                $this->EndingState->setSort("");
                $this->Day0sino->setSort("");
                $this->Day0Attempts->setSort("");
                $this->Day0SPZMorpho->setSort("");
                $this->Day0SPZLocation->setSort("");
                $this->Day2Grade->setSort("");
                $this->Day3Sino->setSort("");
                $this->Day3End->setSort("");
                $this->Day4SiNo->setSort("");
                $this->TidNo->setSort("");
                $this->Day0SpOrgin->setSort("");
                $this->DidNO->setSort("");
                $this->ICSiIVFDateTime->setSort("");
                $this->PrimaryEmbrologist->setSort("");
                $this->SecondaryEmbrologist->setSort("");
                $this->Incubator->setSort("");
                $this->location->setSort("");
                $this->Remarks->setSort("");
                $this->OocyteNo->setSort("");
                $this->Stage->setSort("");
                $this->vitrificationDate->setSort("");
                $this->vitriPrimaryEmbryologist->setSort("");
                $this->vitriSecondaryEmbryologist->setSort("");
                $this->vitriEmbryoNo->setSort("");
                $this->vitriFertilisationDate->setSort("");
                $this->vitriDay->setSort("");
                $this->vitriGrade->setSort("");
                $this->vitriIncubator->setSort("");
                $this->vitriTank->setSort("");
                $this->vitriCanister->setSort("");
                $this->vitriGobiet->setSort("");
                $this->vitriViscotube->setSort("");
                $this->vitriCryolockNo->setSort("");
                $this->vitriCryolockColour->setSort("");
                $this->vitriStage->setSort("");
                $this->thawDate->setSort("");
                $this->thawPrimaryEmbryologist->setSort("");
                $this->thawSecondaryEmbryologist->setSort("");
                $this->thawET->setSort("");
                $this->thawReFrozen->setSort("");
                $this->thawAbserve->setSort("");
                $this->thawDiscard->setSort("");
                $this->ETCatheter->setSort("");
                $this->ETDifficulty->setSort("");
                $this->ETEasy->setSort("");
                $this->ETComments->setSort("");
                $this->ETDoctor->setSort("");
                $this->ETEmbryologist->setSort("");
                $this->Day2End->setSort("");
                $this->Day2SiNo->setSort("");
                $this->EndSiNo->setSort("");
                $this->Day4End->setSort("");
                $this->ETDate->setSort("");
                $this->Day1End->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_embryology_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_embryology_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_embryology_chartlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->SpermOrigin->setDbValue($row['SpermOrigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
        $this->Day0Breakage->setDbValue($row['Day0Breakage']);
        $this->Day1PN->setDbValue($row['Day1PN']);
        $this->Day1PB->setDbValue($row['Day1PB']);
        $this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
        $this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
        $this->Day1Halo->setDbValue($row['Day1Halo']);
        $this->Day1Sperm->setDbValue($row['Day1Sperm']);
        $this->Day2CellNo->setDbValue($row['Day2CellNo']);
        $this->Day2Frag->setDbValue($row['Day2Frag']);
        $this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
        $this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
        $this->Day3CellNo->setDbValue($row['Day3CellNo']);
        $this->Day3Frag->setDbValue($row['Day3Frag']);
        $this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
        $this->Day3Grade->setDbValue($row['Day3Grade']);
        $this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
        $this->Day3ZP->setDbValue($row['Day3ZP']);
        $this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
        $this->Day4CellNo->setDbValue($row['Day4CellNo']);
        $this->Day4Frag->setDbValue($row['Day4Frag']);
        $this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
        $this->Day4Grade->setDbValue($row['Day4Grade']);
        $this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
        $this->Day5CellNo->setDbValue($row['Day5CellNo']);
        $this->Day5ICM->setDbValue($row['Day5ICM']);
        $this->Day5TE->setDbValue($row['Day5TE']);
        $this->Day5Observation->setDbValue($row['Day5Observation']);
        $this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
        $this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
        $this->Day5Grade->setDbValue($row['Day5Grade']);
        $this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
        $this->Day6CellNo->setDbValue($row['Day6CellNo']);
        $this->Day6ICM->setDbValue($row['Day6ICM']);
        $this->Day6TE->setDbValue($row['Day6TE']);
        $this->Day6Observation->setDbValue($row['Day6Observation']);
        $this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
        $this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
        $this->Day6Grade->setDbValue($row['Day6Grade']);
        $this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
        $this->EndingDay->setDbValue($row['EndingDay']);
        $this->EndingCellStage->setDbValue($row['EndingCellStage']);
        $this->EndingGrade->setDbValue($row['EndingGrade']);
        $this->EndingState->setDbValue($row['EndingState']);
        $this->Day0sino->setDbValue($row['Day0sino']);
        $this->Day0Attempts->setDbValue($row['Day0Attempts']);
        $this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
        $this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
        $this->Day2Grade->setDbValue($row['Day2Grade']);
        $this->Day3Sino->setDbValue($row['Day3Sino']);
        $this->Day3End->setDbValue($row['Day3End']);
        $this->Day4SiNo->setDbValue($row['Day4SiNo']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
        $this->DidNO->setDbValue($row['DidNO']);
        $this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
        $this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
        $this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->location->setDbValue($row['location']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->OocyteNo->setDbValue($row['OocyteNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
        $this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
        $this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
        $this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
        $this->vitriDay->setDbValue($row['vitriDay']);
        $this->vitriGrade->setDbValue($row['vitriGrade']);
        $this->vitriIncubator->setDbValue($row['vitriIncubator']);
        $this->vitriTank->setDbValue($row['vitriTank']);
        $this->vitriCanister->setDbValue($row['vitriCanister']);
        $this->vitriGobiet->setDbValue($row['vitriGobiet']);
        $this->vitriViscotube->setDbValue($row['vitriViscotube']);
        $this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
        $this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
        $this->vitriStage->setDbValue($row['vitriStage']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->ETCatheter->setDbValue($row['ETCatheter']);
        $this->ETDifficulty->setDbValue($row['ETDifficulty']);
        $this->ETEasy->setDbValue($row['ETEasy']);
        $this->ETComments->setDbValue($row['ETComments']);
        $this->ETDoctor->setDbValue($row['ETDoctor']);
        $this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
        $this->Day2End->setDbValue($row['Day2End']);
        $this->Day2SiNo->setDbValue($row['Day2SiNo']);
        $this->EndSiNo->setDbValue($row['EndSiNo']);
        $this->Day4End->setDbValue($row['Day4End']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->Day1End->setDbValue($row['Day1End']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['SpermOrigin'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['Day0OocyteStage'] = null;
        $row['Day0PolarBodyPosition'] = null;
        $row['Day0Breakage'] = null;
        $row['Day1PN'] = null;
        $row['Day1PB'] = null;
        $row['Day1Pronucleus'] = null;
        $row['Day1Nucleolus'] = null;
        $row['Day1Halo'] = null;
        $row['Day1Sperm'] = null;
        $row['Day2CellNo'] = null;
        $row['Day2Frag'] = null;
        $row['Day2Symmetry'] = null;
        $row['Day2Cryoptop'] = null;
        $row['Day3CellNo'] = null;
        $row['Day3Frag'] = null;
        $row['Day3Symmetry'] = null;
        $row['Day3Grade'] = null;
        $row['Day3Vacoules'] = null;
        $row['Day3ZP'] = null;
        $row['Day3Cryoptop'] = null;
        $row['Day4CellNo'] = null;
        $row['Day4Frag'] = null;
        $row['Day4Symmetry'] = null;
        $row['Day4Grade'] = null;
        $row['Day4Cryoptop'] = null;
        $row['Day5CellNo'] = null;
        $row['Day5ICM'] = null;
        $row['Day5TE'] = null;
        $row['Day5Observation'] = null;
        $row['Day5Collapsed'] = null;
        $row['Day5Vacoulles'] = null;
        $row['Day5Grade'] = null;
        $row['Day5Cryoptop'] = null;
        $row['Day6CellNo'] = null;
        $row['Day6ICM'] = null;
        $row['Day6TE'] = null;
        $row['Day6Observation'] = null;
        $row['Day6Collapsed'] = null;
        $row['Day6Vacoulles'] = null;
        $row['Day6Grade'] = null;
        $row['Day6Cryoptop'] = null;
        $row['EndingDay'] = null;
        $row['EndingCellStage'] = null;
        $row['EndingGrade'] = null;
        $row['EndingState'] = null;
        $row['Day0sino'] = null;
        $row['Day0Attempts'] = null;
        $row['Day0SPZMorpho'] = null;
        $row['Day0SPZLocation'] = null;
        $row['Day2Grade'] = null;
        $row['Day3Sino'] = null;
        $row['Day3End'] = null;
        $row['Day4SiNo'] = null;
        $row['TidNo'] = null;
        $row['Day0SpOrgin'] = null;
        $row['DidNO'] = null;
        $row['ICSiIVFDateTime'] = null;
        $row['PrimaryEmbrologist'] = null;
        $row['SecondaryEmbrologist'] = null;
        $row['Incubator'] = null;
        $row['location'] = null;
        $row['Remarks'] = null;
        $row['OocyteNo'] = null;
        $row['Stage'] = null;
        $row['vitrificationDate'] = null;
        $row['vitriPrimaryEmbryologist'] = null;
        $row['vitriSecondaryEmbryologist'] = null;
        $row['vitriEmbryoNo'] = null;
        $row['vitriFertilisationDate'] = null;
        $row['vitriDay'] = null;
        $row['vitriGrade'] = null;
        $row['vitriIncubator'] = null;
        $row['vitriTank'] = null;
        $row['vitriCanister'] = null;
        $row['vitriGobiet'] = null;
        $row['vitriViscotube'] = null;
        $row['vitriCryolockNo'] = null;
        $row['vitriCryolockColour'] = null;
        $row['vitriStage'] = null;
        $row['thawDate'] = null;
        $row['thawPrimaryEmbryologist'] = null;
        $row['thawSecondaryEmbryologist'] = null;
        $row['thawET'] = null;
        $row['thawReFrozen'] = null;
        $row['thawAbserve'] = null;
        $row['thawDiscard'] = null;
        $row['ETCatheter'] = null;
        $row['ETDifficulty'] = null;
        $row['ETEasy'] = null;
        $row['ETComments'] = null;
        $row['ETDoctor'] = null;
        $row['ETEmbryologist'] = null;
        $row['Day2End'] = null;
        $row['Day2SiNo'] = null;
        $row['EndSiNo'] = null;
        $row['Day4End'] = null;
        $row['ETDate'] = null;
        $row['Day1End'] = null;
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

        // SpermOrigin

        // InseminatinTechnique

        // IndicationForART

        // Day0OocyteStage

        // Day0PolarBodyPosition

        // Day0Breakage

        // Day1PN

        // Day1PB

        // Day1Pronucleus

        // Day1Nucleolus

        // Day1Halo

        // Day1Sperm

        // Day2CellNo

        // Day2Frag

        // Day2Symmetry

        // Day2Cryoptop

        // Day3CellNo

        // Day3Frag

        // Day3Symmetry

        // Day3Grade

        // Day3Vacoules

        // Day3ZP

        // Day3Cryoptop

        // Day4CellNo

        // Day4Frag

        // Day4Symmetry

        // Day4Grade

        // Day4Cryoptop

        // Day5CellNo

        // Day5ICM

        // Day5TE

        // Day5Observation

        // Day5Collapsed

        // Day5Vacoulles

        // Day5Grade

        // Day5Cryoptop

        // Day6CellNo

        // Day6ICM

        // Day6TE

        // Day6Observation

        // Day6Collapsed

        // Day6Vacoulles

        // Day6Grade

        // Day6Cryoptop

        // EndingDay

        // EndingCellStage

        // EndingGrade

        // EndingState

        // Day0sino

        // Day0Attempts

        // Day0SPZMorpho

        // Day0SPZLocation

        // Day2Grade

        // Day3Sino

        // Day3End

        // Day4SiNo

        // TidNo

        // Day0SpOrgin

        // DidNO

        // ICSiIVFDateTime

        // PrimaryEmbrologist

        // SecondaryEmbrologist

        // Incubator

        // location

        // Remarks

        // OocyteNo

        // Stage

        // vitrificationDate

        // vitriPrimaryEmbryologist

        // vitriSecondaryEmbryologist

        // vitriEmbryoNo

        // vitriFertilisationDate

        // vitriDay

        // vitriGrade

        // vitriIncubator

        // vitriTank

        // vitriCanister

        // vitriGobiet

        // vitriViscotube

        // vitriCryolockNo

        // vitriCryolockColour

        // vitriStage

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawReFrozen

        // thawAbserve

        // thawDiscard

        // ETCatheter

        // ETDifficulty

        // ETEasy

        // ETComments

        // ETDoctor

        // ETEmbryologist

        // Day2End

        // Day2SiNo

        // EndSiNo

        // Day4End

        // ETDate

        // Day1End
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

            // SpermOrigin
            $this->SpermOrigin->ViewValue = $this->SpermOrigin->CurrentValue;
            $this->SpermOrigin->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
            $this->Day0OocyteStage->ViewCustomAttributes = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->CurrentValue;
            $this->Day0PolarBodyPosition->ViewCustomAttributes = "";

            // Day0Breakage
            $this->Day0Breakage->ViewValue = $this->Day0Breakage->CurrentValue;
            $this->Day0Breakage->ViewCustomAttributes = "";

            // Day1PN
            $this->Day1PN->ViewValue = $this->Day1PN->CurrentValue;
            $this->Day1PN->ViewCustomAttributes = "";

            // Day1PB
            $this->Day1PB->ViewValue = $this->Day1PB->CurrentValue;
            $this->Day1PB->ViewCustomAttributes = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->CurrentValue;
            $this->Day1Pronucleus->ViewCustomAttributes = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->CurrentValue;
            $this->Day1Nucleolus->ViewCustomAttributes = "";

            // Day1Halo
            $this->Day1Halo->ViewValue = $this->Day1Halo->CurrentValue;
            $this->Day1Halo->ViewCustomAttributes = "";

            // Day1Sperm
            $this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
            $this->Day1Sperm->ViewCustomAttributes = "";

            // Day2CellNo
            $this->Day2CellNo->ViewValue = $this->Day2CellNo->CurrentValue;
            $this->Day2CellNo->ViewCustomAttributes = "";

            // Day2Frag
            $this->Day2Frag->ViewValue = $this->Day2Frag->CurrentValue;
            $this->Day2Frag->ViewCustomAttributes = "";

            // Day2Symmetry
            $this->Day2Symmetry->ViewValue = $this->Day2Symmetry->CurrentValue;
            $this->Day2Symmetry->ViewCustomAttributes = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->ViewValue = $this->Day2Cryoptop->CurrentValue;
            $this->Day2Cryoptop->ViewCustomAttributes = "";

            // Day3CellNo
            $this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
            $this->Day3CellNo->ViewCustomAttributes = "";

            // Day3Frag
            $this->Day3Frag->ViewValue = $this->Day3Frag->CurrentValue;
            $this->Day3Frag->ViewCustomAttributes = "";

            // Day3Symmetry
            $this->Day3Symmetry->ViewValue = $this->Day3Symmetry->CurrentValue;
            $this->Day3Symmetry->ViewCustomAttributes = "";

            // Day3Grade
            $this->Day3Grade->ViewValue = $this->Day3Grade->CurrentValue;
            $this->Day3Grade->ViewCustomAttributes = "";

            // Day3Vacoules
            $this->Day3Vacoules->ViewValue = $this->Day3Vacoules->CurrentValue;
            $this->Day3Vacoules->ViewCustomAttributes = "";

            // Day3ZP
            $this->Day3ZP->ViewValue = $this->Day3ZP->CurrentValue;
            $this->Day3ZP->ViewCustomAttributes = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->CurrentValue;
            $this->Day3Cryoptop->ViewCustomAttributes = "";

            // Day4CellNo
            $this->Day4CellNo->ViewValue = $this->Day4CellNo->CurrentValue;
            $this->Day4CellNo->ViewCustomAttributes = "";

            // Day4Frag
            $this->Day4Frag->ViewValue = $this->Day4Frag->CurrentValue;
            $this->Day4Frag->ViewCustomAttributes = "";

            // Day4Symmetry
            $this->Day4Symmetry->ViewValue = $this->Day4Symmetry->CurrentValue;
            $this->Day4Symmetry->ViewCustomAttributes = "";

            // Day4Grade
            $this->Day4Grade->ViewValue = $this->Day4Grade->CurrentValue;
            $this->Day4Grade->ViewCustomAttributes = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->CurrentValue;
            $this->Day4Cryoptop->ViewCustomAttributes = "";

            // Day5CellNo
            $this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
            $this->Day5CellNo->ViewCustomAttributes = "";

            // Day5ICM
            $this->Day5ICM->ViewValue = $this->Day5ICM->CurrentValue;
            $this->Day5ICM->ViewCustomAttributes = "";

            // Day5TE
            $this->Day5TE->ViewValue = $this->Day5TE->CurrentValue;
            $this->Day5TE->ViewCustomAttributes = "";

            // Day5Observation
            $this->Day5Observation->ViewValue = $this->Day5Observation->CurrentValue;
            $this->Day5Observation->ViewCustomAttributes = "";

            // Day5Collapsed
            $this->Day5Collapsed->ViewValue = $this->Day5Collapsed->CurrentValue;
            $this->Day5Collapsed->ViewCustomAttributes = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->CurrentValue;
            $this->Day5Vacoulles->ViewCustomAttributes = "";

            // Day5Grade
            $this->Day5Grade->ViewValue = $this->Day5Grade->CurrentValue;
            $this->Day5Grade->ViewCustomAttributes = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->CurrentValue;
            $this->Day5Cryoptop->ViewCustomAttributes = "";

            // Day6CellNo
            $this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
            $this->Day6CellNo->ViewCustomAttributes = "";

            // Day6ICM
            $this->Day6ICM->ViewValue = $this->Day6ICM->CurrentValue;
            $this->Day6ICM->ViewCustomAttributes = "";

            // Day6TE
            $this->Day6TE->ViewValue = $this->Day6TE->CurrentValue;
            $this->Day6TE->ViewCustomAttributes = "";

            // Day6Observation
            $this->Day6Observation->ViewValue = $this->Day6Observation->CurrentValue;
            $this->Day6Observation->ViewCustomAttributes = "";

            // Day6Collapsed
            $this->Day6Collapsed->ViewValue = $this->Day6Collapsed->CurrentValue;
            $this->Day6Collapsed->ViewCustomAttributes = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->CurrentValue;
            $this->Day6Vacoulles->ViewCustomAttributes = "";

            // Day6Grade
            $this->Day6Grade->ViewValue = $this->Day6Grade->CurrentValue;
            $this->Day6Grade->ViewCustomAttributes = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
            $this->Day6Cryoptop->ViewCustomAttributes = "";

            // EndingDay
            $this->EndingDay->ViewValue = $this->EndingDay->CurrentValue;
            $this->EndingDay->ViewCustomAttributes = "";

            // EndingCellStage
            $this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
            $this->EndingCellStage->ViewCustomAttributes = "";

            // EndingGrade
            $this->EndingGrade->ViewValue = $this->EndingGrade->CurrentValue;
            $this->EndingGrade->ViewCustomAttributes = "";

            // EndingState
            $this->EndingState->ViewValue = $this->EndingState->CurrentValue;
            $this->EndingState->ViewCustomAttributes = "";

            // Day0sino
            $this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
            $this->Day0sino->ViewCustomAttributes = "";

            // Day0Attempts
            $this->Day0Attempts->ViewValue = $this->Day0Attempts->CurrentValue;
            $this->Day0Attempts->ViewCustomAttributes = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->CurrentValue;
            $this->Day0SPZMorpho->ViewCustomAttributes = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->CurrentValue;
            $this->Day0SPZLocation->ViewCustomAttributes = "";

            // Day2Grade
            $this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
            $this->Day2Grade->ViewCustomAttributes = "";

            // Day3Sino
            $this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
            $this->Day3Sino->ViewCustomAttributes = "";

            // Day3End
            $this->Day3End->ViewValue = $this->Day3End->CurrentValue;
            $this->Day3End->ViewCustomAttributes = "";

            // Day4SiNo
            $this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
            $this->Day4SiNo->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->CurrentValue;
            $this->Day0SpOrgin->ViewCustomAttributes = "";

            // DidNO
            $this->DidNO->ViewValue = $this->DidNO->CurrentValue;
            $this->DidNO->ViewCustomAttributes = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->ViewValue = $this->ICSiIVFDateTime->CurrentValue;
            $this->ICSiIVFDateTime->ViewValue = FormatDateTime($this->ICSiIVFDateTime->ViewValue, 0);
            $this->ICSiIVFDateTime->ViewCustomAttributes = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->ViewValue = $this->PrimaryEmbrologist->CurrentValue;
            $this->PrimaryEmbrologist->ViewCustomAttributes = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->ViewValue = $this->SecondaryEmbrologist->CurrentValue;
            $this->SecondaryEmbrologist->ViewCustomAttributes = "";

            // Incubator
            $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
            $this->Incubator->ViewCustomAttributes = "";

            // location
            $this->location->ViewValue = $this->location->CurrentValue;
            $this->location->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // OocyteNo
            $this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
            $this->OocyteNo->ViewCustomAttributes = "";

            // Stage
            $this->Stage->ViewValue = $this->Stage->CurrentValue;
            $this->Stage->ViewCustomAttributes = "";

            // vitrificationDate
            $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
            $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
            $this->vitrificationDate->ViewCustomAttributes = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->ViewValue = $this->vitriPrimaryEmbryologist->CurrentValue;
            $this->vitriPrimaryEmbryologist->ViewCustomAttributes = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->ViewValue = $this->vitriSecondaryEmbryologist->CurrentValue;
            $this->vitriSecondaryEmbryologist->ViewCustomAttributes = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->ViewValue = $this->vitriEmbryoNo->CurrentValue;
            $this->vitriEmbryoNo->ViewCustomAttributes = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
            $this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
            $this->vitriFertilisationDate->ViewCustomAttributes = "";

            // vitriDay
            $this->vitriDay->ViewValue = $this->vitriDay->CurrentValue;
            $this->vitriDay->ViewCustomAttributes = "";

            // vitriGrade
            $this->vitriGrade->ViewValue = $this->vitriGrade->CurrentValue;
            $this->vitriGrade->ViewCustomAttributes = "";

            // vitriIncubator
            $this->vitriIncubator->ViewValue = $this->vitriIncubator->CurrentValue;
            $this->vitriIncubator->ViewCustomAttributes = "";

            // vitriTank
            $this->vitriTank->ViewValue = $this->vitriTank->CurrentValue;
            $this->vitriTank->ViewCustomAttributes = "";

            // vitriCanister
            $this->vitriCanister->ViewValue = $this->vitriCanister->CurrentValue;
            $this->vitriCanister->ViewCustomAttributes = "";

            // vitriGobiet
            $this->vitriGobiet->ViewValue = $this->vitriGobiet->CurrentValue;
            $this->vitriGobiet->ViewCustomAttributes = "";

            // vitriViscotube
            $this->vitriViscotube->ViewValue = $this->vitriViscotube->CurrentValue;
            $this->vitriViscotube->ViewCustomAttributes = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->ViewValue = $this->vitriCryolockNo->CurrentValue;
            $this->vitriCryolockNo->ViewCustomAttributes = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->ViewValue = $this->vitriCryolockColour->CurrentValue;
            $this->vitriCryolockColour->ViewCustomAttributes = "";

            // vitriStage
            $this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
            $this->vitriStage->ViewCustomAttributes = "";

            // thawDate
            $this->thawDate->ViewValue = $this->thawDate->CurrentValue;
            $this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
            $this->thawDate->ViewCustomAttributes = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
            $this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
            $this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

            // thawET
            $this->thawET->ViewValue = $this->thawET->CurrentValue;
            $this->thawET->ViewCustomAttributes = "";

            // thawReFrozen
            $this->thawReFrozen->ViewValue = $this->thawReFrozen->CurrentValue;
            $this->thawReFrozen->ViewCustomAttributes = "";

            // thawAbserve
            $this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
            $this->thawAbserve->ViewCustomAttributes = "";

            // thawDiscard
            $this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
            $this->thawDiscard->ViewCustomAttributes = "";

            // ETCatheter
            $this->ETCatheter->ViewValue = $this->ETCatheter->CurrentValue;
            $this->ETCatheter->ViewCustomAttributes = "";

            // ETDifficulty
            $this->ETDifficulty->ViewValue = $this->ETDifficulty->CurrentValue;
            $this->ETDifficulty->ViewCustomAttributes = "";

            // ETEasy
            $this->ETEasy->ViewValue = $this->ETEasy->CurrentValue;
            $this->ETEasy->ViewCustomAttributes = "";

            // ETComments
            $this->ETComments->ViewValue = $this->ETComments->CurrentValue;
            $this->ETComments->ViewCustomAttributes = "";

            // ETDoctor
            $this->ETDoctor->ViewValue = $this->ETDoctor->CurrentValue;
            $this->ETDoctor->ViewCustomAttributes = "";

            // ETEmbryologist
            $this->ETEmbryologist->ViewValue = $this->ETEmbryologist->CurrentValue;
            $this->ETEmbryologist->ViewCustomAttributes = "";

            // Day2End
            $this->Day2End->ViewValue = $this->Day2End->CurrentValue;
            $this->Day2End->ViewCustomAttributes = "";

            // Day2SiNo
            $this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
            $this->Day2SiNo->ViewCustomAttributes = "";

            // EndSiNo
            $this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
            $this->EndSiNo->ViewCustomAttributes = "";

            // Day4End
            $this->Day4End->ViewValue = $this->Day4End->CurrentValue;
            $this->Day4End->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
            $this->ETDate->ViewCustomAttributes = "";

            // Day1End
            $this->Day1End->ViewValue = $this->Day1End->CurrentValue;
            $this->Day1End->ViewCustomAttributes = "";

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

            // SpermOrigin
            $this->SpermOrigin->LinkCustomAttributes = "";
            $this->SpermOrigin->HrefValue = "";
            $this->SpermOrigin->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->LinkCustomAttributes = "";
            $this->Day0OocyteStage->HrefValue = "";
            $this->Day0OocyteStage->TooltipValue = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->LinkCustomAttributes = "";
            $this->Day0PolarBodyPosition->HrefValue = "";
            $this->Day0PolarBodyPosition->TooltipValue = "";

            // Day0Breakage
            $this->Day0Breakage->LinkCustomAttributes = "";
            $this->Day0Breakage->HrefValue = "";
            $this->Day0Breakage->TooltipValue = "";

            // Day1PN
            $this->Day1PN->LinkCustomAttributes = "";
            $this->Day1PN->HrefValue = "";
            $this->Day1PN->TooltipValue = "";

            // Day1PB
            $this->Day1PB->LinkCustomAttributes = "";
            $this->Day1PB->HrefValue = "";
            $this->Day1PB->TooltipValue = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->LinkCustomAttributes = "";
            $this->Day1Pronucleus->HrefValue = "";
            $this->Day1Pronucleus->TooltipValue = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->LinkCustomAttributes = "";
            $this->Day1Nucleolus->HrefValue = "";
            $this->Day1Nucleolus->TooltipValue = "";

            // Day1Halo
            $this->Day1Halo->LinkCustomAttributes = "";
            $this->Day1Halo->HrefValue = "";
            $this->Day1Halo->TooltipValue = "";

            // Day1Sperm
            $this->Day1Sperm->LinkCustomAttributes = "";
            $this->Day1Sperm->HrefValue = "";
            $this->Day1Sperm->TooltipValue = "";

            // Day2CellNo
            $this->Day2CellNo->LinkCustomAttributes = "";
            $this->Day2CellNo->HrefValue = "";
            $this->Day2CellNo->TooltipValue = "";

            // Day2Frag
            $this->Day2Frag->LinkCustomAttributes = "";
            $this->Day2Frag->HrefValue = "";
            $this->Day2Frag->TooltipValue = "";

            // Day2Symmetry
            $this->Day2Symmetry->LinkCustomAttributes = "";
            $this->Day2Symmetry->HrefValue = "";
            $this->Day2Symmetry->TooltipValue = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->LinkCustomAttributes = "";
            $this->Day2Cryoptop->HrefValue = "";
            $this->Day2Cryoptop->TooltipValue = "";

            // Day3CellNo
            $this->Day3CellNo->LinkCustomAttributes = "";
            $this->Day3CellNo->HrefValue = "";
            $this->Day3CellNo->TooltipValue = "";

            // Day3Frag
            $this->Day3Frag->LinkCustomAttributes = "";
            $this->Day3Frag->HrefValue = "";
            $this->Day3Frag->TooltipValue = "";

            // Day3Symmetry
            $this->Day3Symmetry->LinkCustomAttributes = "";
            $this->Day3Symmetry->HrefValue = "";
            $this->Day3Symmetry->TooltipValue = "";

            // Day3Grade
            $this->Day3Grade->LinkCustomAttributes = "";
            $this->Day3Grade->HrefValue = "";
            $this->Day3Grade->TooltipValue = "";

            // Day3Vacoules
            $this->Day3Vacoules->LinkCustomAttributes = "";
            $this->Day3Vacoules->HrefValue = "";
            $this->Day3Vacoules->TooltipValue = "";

            // Day3ZP
            $this->Day3ZP->LinkCustomAttributes = "";
            $this->Day3ZP->HrefValue = "";
            $this->Day3ZP->TooltipValue = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->LinkCustomAttributes = "";
            $this->Day3Cryoptop->HrefValue = "";
            $this->Day3Cryoptop->TooltipValue = "";

            // Day4CellNo
            $this->Day4CellNo->LinkCustomAttributes = "";
            $this->Day4CellNo->HrefValue = "";
            $this->Day4CellNo->TooltipValue = "";

            // Day4Frag
            $this->Day4Frag->LinkCustomAttributes = "";
            $this->Day4Frag->HrefValue = "";
            $this->Day4Frag->TooltipValue = "";

            // Day4Symmetry
            $this->Day4Symmetry->LinkCustomAttributes = "";
            $this->Day4Symmetry->HrefValue = "";
            $this->Day4Symmetry->TooltipValue = "";

            // Day4Grade
            $this->Day4Grade->LinkCustomAttributes = "";
            $this->Day4Grade->HrefValue = "";
            $this->Day4Grade->TooltipValue = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->LinkCustomAttributes = "";
            $this->Day4Cryoptop->HrefValue = "";
            $this->Day4Cryoptop->TooltipValue = "";

            // Day5CellNo
            $this->Day5CellNo->LinkCustomAttributes = "";
            $this->Day5CellNo->HrefValue = "";
            $this->Day5CellNo->TooltipValue = "";

            // Day5ICM
            $this->Day5ICM->LinkCustomAttributes = "";
            $this->Day5ICM->HrefValue = "";
            $this->Day5ICM->TooltipValue = "";

            // Day5TE
            $this->Day5TE->LinkCustomAttributes = "";
            $this->Day5TE->HrefValue = "";
            $this->Day5TE->TooltipValue = "";

            // Day5Observation
            $this->Day5Observation->LinkCustomAttributes = "";
            $this->Day5Observation->HrefValue = "";
            $this->Day5Observation->TooltipValue = "";

            // Day5Collapsed
            $this->Day5Collapsed->LinkCustomAttributes = "";
            $this->Day5Collapsed->HrefValue = "";
            $this->Day5Collapsed->TooltipValue = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->LinkCustomAttributes = "";
            $this->Day5Vacoulles->HrefValue = "";
            $this->Day5Vacoulles->TooltipValue = "";

            // Day5Grade
            $this->Day5Grade->LinkCustomAttributes = "";
            $this->Day5Grade->HrefValue = "";
            $this->Day5Grade->TooltipValue = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->LinkCustomAttributes = "";
            $this->Day5Cryoptop->HrefValue = "";
            $this->Day5Cryoptop->TooltipValue = "";

            // Day6CellNo
            $this->Day6CellNo->LinkCustomAttributes = "";
            $this->Day6CellNo->HrefValue = "";
            $this->Day6CellNo->TooltipValue = "";

            // Day6ICM
            $this->Day6ICM->LinkCustomAttributes = "";
            $this->Day6ICM->HrefValue = "";
            $this->Day6ICM->TooltipValue = "";

            // Day6TE
            $this->Day6TE->LinkCustomAttributes = "";
            $this->Day6TE->HrefValue = "";
            $this->Day6TE->TooltipValue = "";

            // Day6Observation
            $this->Day6Observation->LinkCustomAttributes = "";
            $this->Day6Observation->HrefValue = "";
            $this->Day6Observation->TooltipValue = "";

            // Day6Collapsed
            $this->Day6Collapsed->LinkCustomAttributes = "";
            $this->Day6Collapsed->HrefValue = "";
            $this->Day6Collapsed->TooltipValue = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->LinkCustomAttributes = "";
            $this->Day6Vacoulles->HrefValue = "";
            $this->Day6Vacoulles->TooltipValue = "";

            // Day6Grade
            $this->Day6Grade->LinkCustomAttributes = "";
            $this->Day6Grade->HrefValue = "";
            $this->Day6Grade->TooltipValue = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->LinkCustomAttributes = "";
            $this->Day6Cryoptop->HrefValue = "";
            $this->Day6Cryoptop->TooltipValue = "";

            // EndingDay
            $this->EndingDay->LinkCustomAttributes = "";
            $this->EndingDay->HrefValue = "";
            $this->EndingDay->TooltipValue = "";

            // EndingCellStage
            $this->EndingCellStage->LinkCustomAttributes = "";
            $this->EndingCellStage->HrefValue = "";
            $this->EndingCellStage->TooltipValue = "";

            // EndingGrade
            $this->EndingGrade->LinkCustomAttributes = "";
            $this->EndingGrade->HrefValue = "";
            $this->EndingGrade->TooltipValue = "";

            // EndingState
            $this->EndingState->LinkCustomAttributes = "";
            $this->EndingState->HrefValue = "";
            $this->EndingState->TooltipValue = "";

            // Day0sino
            $this->Day0sino->LinkCustomAttributes = "";
            $this->Day0sino->HrefValue = "";
            $this->Day0sino->TooltipValue = "";

            // Day0Attempts
            $this->Day0Attempts->LinkCustomAttributes = "";
            $this->Day0Attempts->HrefValue = "";
            $this->Day0Attempts->TooltipValue = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->LinkCustomAttributes = "";
            $this->Day0SPZMorpho->HrefValue = "";
            $this->Day0SPZMorpho->TooltipValue = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->LinkCustomAttributes = "";
            $this->Day0SPZLocation->HrefValue = "";
            $this->Day0SPZLocation->TooltipValue = "";

            // Day2Grade
            $this->Day2Grade->LinkCustomAttributes = "";
            $this->Day2Grade->HrefValue = "";
            $this->Day2Grade->TooltipValue = "";

            // Day3Sino
            $this->Day3Sino->LinkCustomAttributes = "";
            $this->Day3Sino->HrefValue = "";
            $this->Day3Sino->TooltipValue = "";

            // Day3End
            $this->Day3End->LinkCustomAttributes = "";
            $this->Day3End->HrefValue = "";
            $this->Day3End->TooltipValue = "";

            // Day4SiNo
            $this->Day4SiNo->LinkCustomAttributes = "";
            $this->Day4SiNo->HrefValue = "";
            $this->Day4SiNo->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->LinkCustomAttributes = "";
            $this->Day0SpOrgin->HrefValue = "";
            $this->Day0SpOrgin->TooltipValue = "";

            // DidNO
            $this->DidNO->LinkCustomAttributes = "";
            $this->DidNO->HrefValue = "";
            $this->DidNO->TooltipValue = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->LinkCustomAttributes = "";
            $this->ICSiIVFDateTime->HrefValue = "";
            $this->ICSiIVFDateTime->TooltipValue = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->LinkCustomAttributes = "";
            $this->PrimaryEmbrologist->HrefValue = "";
            $this->PrimaryEmbrologist->TooltipValue = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->LinkCustomAttributes = "";
            $this->SecondaryEmbrologist->HrefValue = "";
            $this->SecondaryEmbrologist->TooltipValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";
            $this->Incubator->TooltipValue = "";

            // location
            $this->location->LinkCustomAttributes = "";
            $this->location->HrefValue = "";
            $this->location->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // OocyteNo
            $this->OocyteNo->LinkCustomAttributes = "";
            $this->OocyteNo->HrefValue = "";
            $this->OocyteNo->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";
            $this->vitrificationDate->TooltipValue = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriPrimaryEmbryologist->HrefValue = "";
            $this->vitriPrimaryEmbryologist->TooltipValue = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriSecondaryEmbryologist->HrefValue = "";
            $this->vitriSecondaryEmbryologist->TooltipValue = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->LinkCustomAttributes = "";
            $this->vitriEmbryoNo->HrefValue = "";
            $this->vitriEmbryoNo->TooltipValue = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->LinkCustomAttributes = "";
            $this->vitriFertilisationDate->HrefValue = "";
            $this->vitriFertilisationDate->TooltipValue = "";

            // vitriDay
            $this->vitriDay->LinkCustomAttributes = "";
            $this->vitriDay->HrefValue = "";
            $this->vitriDay->TooltipValue = "";

            // vitriGrade
            $this->vitriGrade->LinkCustomAttributes = "";
            $this->vitriGrade->HrefValue = "";
            $this->vitriGrade->TooltipValue = "";

            // vitriIncubator
            $this->vitriIncubator->LinkCustomAttributes = "";
            $this->vitriIncubator->HrefValue = "";
            $this->vitriIncubator->TooltipValue = "";

            // vitriTank
            $this->vitriTank->LinkCustomAttributes = "";
            $this->vitriTank->HrefValue = "";
            $this->vitriTank->TooltipValue = "";

            // vitriCanister
            $this->vitriCanister->LinkCustomAttributes = "";
            $this->vitriCanister->HrefValue = "";
            $this->vitriCanister->TooltipValue = "";

            // vitriGobiet
            $this->vitriGobiet->LinkCustomAttributes = "";
            $this->vitriGobiet->HrefValue = "";
            $this->vitriGobiet->TooltipValue = "";

            // vitriViscotube
            $this->vitriViscotube->LinkCustomAttributes = "";
            $this->vitriViscotube->HrefValue = "";
            $this->vitriViscotube->TooltipValue = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->LinkCustomAttributes = "";
            $this->vitriCryolockNo->HrefValue = "";
            $this->vitriCryolockNo->TooltipValue = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->LinkCustomAttributes = "";
            $this->vitriCryolockColour->HrefValue = "";
            $this->vitriCryolockColour->TooltipValue = "";

            // vitriStage
            $this->vitriStage->LinkCustomAttributes = "";
            $this->vitriStage->HrefValue = "";
            $this->vitriStage->TooltipValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";
            $this->thawDate->TooltipValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";
            $this->thawPrimaryEmbryologist->TooltipValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";
            $this->thawSecondaryEmbryologist->TooltipValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";
            $this->thawET->TooltipValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";
            $this->thawReFrozen->TooltipValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";
            $this->thawAbserve->TooltipValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";
            $this->thawDiscard->TooltipValue = "";

            // ETCatheter
            $this->ETCatheter->LinkCustomAttributes = "";
            $this->ETCatheter->HrefValue = "";
            $this->ETCatheter->TooltipValue = "";

            // ETDifficulty
            $this->ETDifficulty->LinkCustomAttributes = "";
            $this->ETDifficulty->HrefValue = "";
            $this->ETDifficulty->TooltipValue = "";

            // ETEasy
            $this->ETEasy->LinkCustomAttributes = "";
            $this->ETEasy->HrefValue = "";
            $this->ETEasy->TooltipValue = "";

            // ETComments
            $this->ETComments->LinkCustomAttributes = "";
            $this->ETComments->HrefValue = "";
            $this->ETComments->TooltipValue = "";

            // ETDoctor
            $this->ETDoctor->LinkCustomAttributes = "";
            $this->ETDoctor->HrefValue = "";
            $this->ETDoctor->TooltipValue = "";

            // ETEmbryologist
            $this->ETEmbryologist->LinkCustomAttributes = "";
            $this->ETEmbryologist->HrefValue = "";
            $this->ETEmbryologist->TooltipValue = "";

            // Day2End
            $this->Day2End->LinkCustomAttributes = "";
            $this->Day2End->HrefValue = "";
            $this->Day2End->TooltipValue = "";

            // Day2SiNo
            $this->Day2SiNo->LinkCustomAttributes = "";
            $this->Day2SiNo->HrefValue = "";
            $this->Day2SiNo->TooltipValue = "";

            // EndSiNo
            $this->EndSiNo->LinkCustomAttributes = "";
            $this->EndSiNo->HrefValue = "";
            $this->EndSiNo->TooltipValue = "";

            // Day4End
            $this->Day4End->LinkCustomAttributes = "";
            $this->Day4End->HrefValue = "";
            $this->Day4End->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // Day1End
            $this->Day1End->LinkCustomAttributes = "";
            $this->Day1End->HrefValue = "";
            $this->Day1End->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_embryology_chartlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
