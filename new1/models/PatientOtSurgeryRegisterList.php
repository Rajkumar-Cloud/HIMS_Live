<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtSurgeryRegisterList extends PatientOtSurgeryRegister
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_surgery_register';

    // Page object name
    public $PageObjName = "PatientOtSurgeryRegisterList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fpatient_ot_surgery_registerlist";
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

        // Table object (patient_ot_surgery_register)
        if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
            $GLOBALS["patient_ot_surgery_register"] = &$this;
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
        $this->AddUrl = "PatientOtSurgeryRegisterAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientOtSurgeryRegisterDelete";
        $this->MultiUpdateUrl = "PatientOtSurgeryRegisterUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_ot_surgery_registerlistsrch";

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
                $doc = new $class(Container("patient_ot_surgery_register"));
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
        $this->Reception->setVisibility();
        $this->PId->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->Visible = false;
        $this->diagnosis->Visible = false;
        $this->proposedSurgery->Visible = false;
        $this->surgeryProcedure->Visible = false;
        $this->typeOfAnaesthesia->Visible = false;
        $this->RecievedTime->setVisibility();
        $this->AnaesthesiaStarted->setVisibility();
        $this->AnaesthesiaEnded->setVisibility();
        $this->surgeryStarted->setVisibility();
        $this->surgeryEnded->setVisibility();
        $this->RecoveryTime->setVisibility();
        $this->ShiftedTime->setVisibility();
        $this->Duration->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AsstSurgeon1->setVisibility();
        $this->AsstSurgeon2->setVisibility();
        $this->paediatric->setVisibility();
        $this->ScrubNurse1->setVisibility();
        $this->ScrubNurse2->setVisibility();
        $this->FloorNurse->setVisibility();
        $this->Technician->setVisibility();
        $this->HouseKeeping->setVisibility();
        $this->countsCheckedMops->setVisibility();
        $this->gauze->setVisibility();
        $this->needles->setVisibility();
        $this->bloodloss->setVisibility();
        $this->bloodtransfusion->setVisibility();
        $this->implantsUsed->Visible = false;
        $this->MaterialsForHPE->Visible = false;
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->PatID->setVisibility();
        $this->MobileNumber->setVisibility();
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
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PId->AdvancedSearch->toJson(), ","); // Field PId
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->diagnosis->AdvancedSearch->toJson(), ","); // Field diagnosis
        $filterList = Concat($filterList, $this->proposedSurgery->AdvancedSearch->toJson(), ","); // Field proposedSurgery
        $filterList = Concat($filterList, $this->surgeryProcedure->AdvancedSearch->toJson(), ","); // Field surgeryProcedure
        $filterList = Concat($filterList, $this->typeOfAnaesthesia->AdvancedSearch->toJson(), ","); // Field typeOfAnaesthesia
        $filterList = Concat($filterList, $this->RecievedTime->AdvancedSearch->toJson(), ","); // Field RecievedTime
        $filterList = Concat($filterList, $this->AnaesthesiaStarted->AdvancedSearch->toJson(), ","); // Field AnaesthesiaStarted
        $filterList = Concat($filterList, $this->AnaesthesiaEnded->AdvancedSearch->toJson(), ","); // Field AnaesthesiaEnded
        $filterList = Concat($filterList, $this->surgeryStarted->AdvancedSearch->toJson(), ","); // Field surgeryStarted
        $filterList = Concat($filterList, $this->surgeryEnded->AdvancedSearch->toJson(), ","); // Field surgeryEnded
        $filterList = Concat($filterList, $this->RecoveryTime->AdvancedSearch->toJson(), ","); // Field RecoveryTime
        $filterList = Concat($filterList, $this->ShiftedTime->AdvancedSearch->toJson(), ","); // Field ShiftedTime
        $filterList = Concat($filterList, $this->Duration->AdvancedSearch->toJson(), ","); // Field Duration
        $filterList = Concat($filterList, $this->Surgeon->AdvancedSearch->toJson(), ","); // Field Surgeon
        $filterList = Concat($filterList, $this->Anaesthetist->AdvancedSearch->toJson(), ","); // Field Anaesthetist
        $filterList = Concat($filterList, $this->AsstSurgeon1->AdvancedSearch->toJson(), ","); // Field AsstSurgeon1
        $filterList = Concat($filterList, $this->AsstSurgeon2->AdvancedSearch->toJson(), ","); // Field AsstSurgeon2
        $filterList = Concat($filterList, $this->paediatric->AdvancedSearch->toJson(), ","); // Field paediatric
        $filterList = Concat($filterList, $this->ScrubNurse1->AdvancedSearch->toJson(), ","); // Field ScrubNurse1
        $filterList = Concat($filterList, $this->ScrubNurse2->AdvancedSearch->toJson(), ","); // Field ScrubNurse2
        $filterList = Concat($filterList, $this->FloorNurse->AdvancedSearch->toJson(), ","); // Field FloorNurse
        $filterList = Concat($filterList, $this->Technician->AdvancedSearch->toJson(), ","); // Field Technician
        $filterList = Concat($filterList, $this->HouseKeeping->AdvancedSearch->toJson(), ","); // Field HouseKeeping
        $filterList = Concat($filterList, $this->countsCheckedMops->AdvancedSearch->toJson(), ","); // Field countsCheckedMops
        $filterList = Concat($filterList, $this->gauze->AdvancedSearch->toJson(), ","); // Field gauze
        $filterList = Concat($filterList, $this->needles->AdvancedSearch->toJson(), ","); // Field needles
        $filterList = Concat($filterList, $this->bloodloss->AdvancedSearch->toJson(), ","); // Field bloodloss
        $filterList = Concat($filterList, $this->bloodtransfusion->AdvancedSearch->toJson(), ","); // Field bloodtransfusion
        $filterList = Concat($filterList, $this->implantsUsed->AdvancedSearch->toJson(), ","); // Field implantsUsed
        $filterList = Concat($filterList, $this->MaterialsForHPE->AdvancedSearch->toJson(), ","); // Field MaterialsForHPE
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_ot_surgery_registerlistsrch", $filters);
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

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field PId
        $this->PId->AdvancedSearch->SearchValue = @$filter["x_PId"];
        $this->PId->AdvancedSearch->SearchOperator = @$filter["z_PId"];
        $this->PId->AdvancedSearch->SearchCondition = @$filter["v_PId"];
        $this->PId->AdvancedSearch->SearchValue2 = @$filter["y_PId"];
        $this->PId->AdvancedSearch->SearchOperator2 = @$filter["w_PId"];
        $this->PId->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field diagnosis
        $this->diagnosis->AdvancedSearch->SearchValue = @$filter["x_diagnosis"];
        $this->diagnosis->AdvancedSearch->SearchOperator = @$filter["z_diagnosis"];
        $this->diagnosis->AdvancedSearch->SearchCondition = @$filter["v_diagnosis"];
        $this->diagnosis->AdvancedSearch->SearchValue2 = @$filter["y_diagnosis"];
        $this->diagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_diagnosis"];
        $this->diagnosis->AdvancedSearch->save();

        // Field proposedSurgery
        $this->proposedSurgery->AdvancedSearch->SearchValue = @$filter["x_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchOperator = @$filter["z_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchCondition = @$filter["v_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchValue2 = @$filter["y_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->SearchOperator2 = @$filter["w_proposedSurgery"];
        $this->proposedSurgery->AdvancedSearch->save();

        // Field surgeryProcedure
        $this->surgeryProcedure->AdvancedSearch->SearchValue = @$filter["x_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchOperator = @$filter["z_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchCondition = @$filter["v_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchValue2 = @$filter["y_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryProcedure"];
        $this->surgeryProcedure->AdvancedSearch->save();

        // Field typeOfAnaesthesia
        $this->typeOfAnaesthesia->AdvancedSearch->SearchValue = @$filter["x_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchOperator = @$filter["z_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchCondition = @$filter["v_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchValue2 = @$filter["y_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->SearchOperator2 = @$filter["w_typeOfAnaesthesia"];
        $this->typeOfAnaesthesia->AdvancedSearch->save();

        // Field RecievedTime
        $this->RecievedTime->AdvancedSearch->SearchValue = @$filter["x_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchOperator = @$filter["z_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchCondition = @$filter["v_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchValue2 = @$filter["y_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecievedTime"];
        $this->RecievedTime->AdvancedSearch->save();

        // Field AnaesthesiaStarted
        $this->AnaesthesiaStarted->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaStarted"];
        $this->AnaesthesiaStarted->AdvancedSearch->save();

        // Field AnaesthesiaEnded
        $this->AnaesthesiaEnded->AdvancedSearch->SearchValue = @$filter["x_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchOperator = @$filter["z_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchCondition = @$filter["v_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchValue2 = @$filter["y_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->SearchOperator2 = @$filter["w_AnaesthesiaEnded"];
        $this->AnaesthesiaEnded->AdvancedSearch->save();

        // Field surgeryStarted
        $this->surgeryStarted->AdvancedSearch->SearchValue = @$filter["x_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchOperator = @$filter["z_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchCondition = @$filter["v_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchValue2 = @$filter["y_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryStarted"];
        $this->surgeryStarted->AdvancedSearch->save();

        // Field surgeryEnded
        $this->surgeryEnded->AdvancedSearch->SearchValue = @$filter["x_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchOperator = @$filter["z_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchCondition = @$filter["v_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchValue2 = @$filter["y_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->SearchOperator2 = @$filter["w_surgeryEnded"];
        $this->surgeryEnded->AdvancedSearch->save();

        // Field RecoveryTime
        $this->RecoveryTime->AdvancedSearch->SearchValue = @$filter["x_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchOperator = @$filter["z_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchCondition = @$filter["v_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchValue2 = @$filter["y_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->SearchOperator2 = @$filter["w_RecoveryTime"];
        $this->RecoveryTime->AdvancedSearch->save();

        // Field ShiftedTime
        $this->ShiftedTime->AdvancedSearch->SearchValue = @$filter["x_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchOperator = @$filter["z_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchCondition = @$filter["v_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchValue2 = @$filter["y_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->SearchOperator2 = @$filter["w_ShiftedTime"];
        $this->ShiftedTime->AdvancedSearch->save();

        // Field Duration
        $this->Duration->AdvancedSearch->SearchValue = @$filter["x_Duration"];
        $this->Duration->AdvancedSearch->SearchOperator = @$filter["z_Duration"];
        $this->Duration->AdvancedSearch->SearchCondition = @$filter["v_Duration"];
        $this->Duration->AdvancedSearch->SearchValue2 = @$filter["y_Duration"];
        $this->Duration->AdvancedSearch->SearchOperator2 = @$filter["w_Duration"];
        $this->Duration->AdvancedSearch->save();

        // Field Surgeon
        $this->Surgeon->AdvancedSearch->SearchValue = @$filter["x_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator = @$filter["z_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchCondition = @$filter["v_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchValue2 = @$filter["y_Surgeon"];
        $this->Surgeon->AdvancedSearch->SearchOperator2 = @$filter["w_Surgeon"];
        $this->Surgeon->AdvancedSearch->save();

        // Field Anaesthetist
        $this->Anaesthetist->AdvancedSearch->SearchValue = @$filter["x_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchOperator = @$filter["z_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchCondition = @$filter["v_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchValue2 = @$filter["y_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->SearchOperator2 = @$filter["w_Anaesthetist"];
        $this->Anaesthetist->AdvancedSearch->save();

        // Field AsstSurgeon1
        $this->AsstSurgeon1->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon1"];
        $this->AsstSurgeon1->AdvancedSearch->save();

        // Field AsstSurgeon2
        $this->AsstSurgeon2->AdvancedSearch->SearchValue = @$filter["x_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchOperator = @$filter["z_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchCondition = @$filter["v_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchValue2 = @$filter["y_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->SearchOperator2 = @$filter["w_AsstSurgeon2"];
        $this->AsstSurgeon2->AdvancedSearch->save();

        // Field paediatric
        $this->paediatric->AdvancedSearch->SearchValue = @$filter["x_paediatric"];
        $this->paediatric->AdvancedSearch->SearchOperator = @$filter["z_paediatric"];
        $this->paediatric->AdvancedSearch->SearchCondition = @$filter["v_paediatric"];
        $this->paediatric->AdvancedSearch->SearchValue2 = @$filter["y_paediatric"];
        $this->paediatric->AdvancedSearch->SearchOperator2 = @$filter["w_paediatric"];
        $this->paediatric->AdvancedSearch->save();

        // Field ScrubNurse1
        $this->ScrubNurse1->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse1"];
        $this->ScrubNurse1->AdvancedSearch->save();

        // Field ScrubNurse2
        $this->ScrubNurse2->AdvancedSearch->SearchValue = @$filter["x_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchOperator = @$filter["z_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchCondition = @$filter["v_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchValue2 = @$filter["y_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->SearchOperator2 = @$filter["w_ScrubNurse2"];
        $this->ScrubNurse2->AdvancedSearch->save();

        // Field FloorNurse
        $this->FloorNurse->AdvancedSearch->SearchValue = @$filter["x_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchOperator = @$filter["z_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchCondition = @$filter["v_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchValue2 = @$filter["y_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->SearchOperator2 = @$filter["w_FloorNurse"];
        $this->FloorNurse->AdvancedSearch->save();

        // Field Technician
        $this->Technician->AdvancedSearch->SearchValue = @$filter["x_Technician"];
        $this->Technician->AdvancedSearch->SearchOperator = @$filter["z_Technician"];
        $this->Technician->AdvancedSearch->SearchCondition = @$filter["v_Technician"];
        $this->Technician->AdvancedSearch->SearchValue2 = @$filter["y_Technician"];
        $this->Technician->AdvancedSearch->SearchOperator2 = @$filter["w_Technician"];
        $this->Technician->AdvancedSearch->save();

        // Field HouseKeeping
        $this->HouseKeeping->AdvancedSearch->SearchValue = @$filter["x_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchOperator = @$filter["z_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchCondition = @$filter["v_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchValue2 = @$filter["y_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->SearchOperator2 = @$filter["w_HouseKeeping"];
        $this->HouseKeeping->AdvancedSearch->save();

        // Field countsCheckedMops
        $this->countsCheckedMops->AdvancedSearch->SearchValue = @$filter["x_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchOperator = @$filter["z_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchCondition = @$filter["v_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchValue2 = @$filter["y_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->SearchOperator2 = @$filter["w_countsCheckedMops"];
        $this->countsCheckedMops->AdvancedSearch->save();

        // Field gauze
        $this->gauze->AdvancedSearch->SearchValue = @$filter["x_gauze"];
        $this->gauze->AdvancedSearch->SearchOperator = @$filter["z_gauze"];
        $this->gauze->AdvancedSearch->SearchCondition = @$filter["v_gauze"];
        $this->gauze->AdvancedSearch->SearchValue2 = @$filter["y_gauze"];
        $this->gauze->AdvancedSearch->SearchOperator2 = @$filter["w_gauze"];
        $this->gauze->AdvancedSearch->save();

        // Field needles
        $this->needles->AdvancedSearch->SearchValue = @$filter["x_needles"];
        $this->needles->AdvancedSearch->SearchOperator = @$filter["z_needles"];
        $this->needles->AdvancedSearch->SearchCondition = @$filter["v_needles"];
        $this->needles->AdvancedSearch->SearchValue2 = @$filter["y_needles"];
        $this->needles->AdvancedSearch->SearchOperator2 = @$filter["w_needles"];
        $this->needles->AdvancedSearch->save();

        // Field bloodloss
        $this->bloodloss->AdvancedSearch->SearchValue = @$filter["x_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchOperator = @$filter["z_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchCondition = @$filter["v_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchValue2 = @$filter["y_bloodloss"];
        $this->bloodloss->AdvancedSearch->SearchOperator2 = @$filter["w_bloodloss"];
        $this->bloodloss->AdvancedSearch->save();

        // Field bloodtransfusion
        $this->bloodtransfusion->AdvancedSearch->SearchValue = @$filter["x_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchOperator = @$filter["z_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchCondition = @$filter["v_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchValue2 = @$filter["y_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->SearchOperator2 = @$filter["w_bloodtransfusion"];
        $this->bloodtransfusion->AdvancedSearch->save();

        // Field implantsUsed
        $this->implantsUsed->AdvancedSearch->SearchValue = @$filter["x_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchOperator = @$filter["z_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchCondition = @$filter["v_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchValue2 = @$filter["y_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->SearchOperator2 = @$filter["w_implantsUsed"];
        $this->implantsUsed->AdvancedSearch->save();

        // Field MaterialsForHPE
        $this->MaterialsForHPE->AdvancedSearch->SearchValue = @$filter["x_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchOperator = @$filter["z_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchCondition = @$filter["v_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchValue2 = @$filter["y_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->SearchOperator2 = @$filter["w_MaterialsForHPE"];
        $this->MaterialsForHPE->AdvancedSearch->save();

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

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field MobileNumber
        $this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->diagnosis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->proposedSurgery, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->surgeryProcedure, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->typeOfAnaesthesia, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Duration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Surgeon, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Anaesthetist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AsstSurgeon1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AsstSurgeon2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->paediatric, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ScrubNurse1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ScrubNurse2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FloorNurse, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Technician, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HouseKeeping, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->countsCheckedMops, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gauze, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->needles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->bloodloss, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->bloodtransfusion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->implantsUsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaterialsForHPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
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
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->PId); // PId
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->RecievedTime); // RecievedTime
            $this->updateSort($this->AnaesthesiaStarted); // AnaesthesiaStarted
            $this->updateSort($this->AnaesthesiaEnded); // AnaesthesiaEnded
            $this->updateSort($this->surgeryStarted); // surgeryStarted
            $this->updateSort($this->surgeryEnded); // surgeryEnded
            $this->updateSort($this->RecoveryTime); // RecoveryTime
            $this->updateSort($this->ShiftedTime); // ShiftedTime
            $this->updateSort($this->Duration); // Duration
            $this->updateSort($this->Surgeon); // Surgeon
            $this->updateSort($this->Anaesthetist); // Anaesthetist
            $this->updateSort($this->AsstSurgeon1); // AsstSurgeon1
            $this->updateSort($this->AsstSurgeon2); // AsstSurgeon2
            $this->updateSort($this->paediatric); // paediatric
            $this->updateSort($this->ScrubNurse1); // ScrubNurse1
            $this->updateSort($this->ScrubNurse2); // ScrubNurse2
            $this->updateSort($this->FloorNurse); // FloorNurse
            $this->updateSort($this->Technician); // Technician
            $this->updateSort($this->HouseKeeping); // HouseKeeping
            $this->updateSort($this->countsCheckedMops); // countsCheckedMops
            $this->updateSort($this->gauze); // gauze
            $this->updateSort($this->needles); // needles
            $this->updateSort($this->bloodloss); // bloodloss
            $this->updateSort($this->bloodtransfusion); // bloodtransfusion
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->MobileNumber); // MobileNumber
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
                $this->Reception->setSort("");
                $this->PId->setSort("");
                $this->mrnno->setSort("");
                $this->PatientName->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->profilePic->setSort("");
                $this->diagnosis->setSort("");
                $this->proposedSurgery->setSort("");
                $this->surgeryProcedure->setSort("");
                $this->typeOfAnaesthesia->setSort("");
                $this->RecievedTime->setSort("");
                $this->AnaesthesiaStarted->setSort("");
                $this->AnaesthesiaEnded->setSort("");
                $this->surgeryStarted->setSort("");
                $this->surgeryEnded->setSort("");
                $this->RecoveryTime->setSort("");
                $this->ShiftedTime->setSort("");
                $this->Duration->setSort("");
                $this->Surgeon->setSort("");
                $this->Anaesthetist->setSort("");
                $this->AsstSurgeon1->setSort("");
                $this->AsstSurgeon2->setSort("");
                $this->paediatric->setSort("");
                $this->ScrubNurse1->setSort("");
                $this->ScrubNurse2->setSort("");
                $this->FloorNurse->setSort("");
                $this->Technician->setSort("");
                $this->HouseKeeping->setSort("");
                $this->countsCheckedMops->setSort("");
                $this->gauze->setSort("");
                $this->needles->setSort("");
                $this->bloodloss->setSort("");
                $this->bloodtransfusion->setSort("");
                $this->implantsUsed->setSort("");
                $this->MaterialsForHPE->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->PatientID->setSort("");
                $this->HospID->setSort("");
                $this->PatID->setSort("");
                $this->MobileNumber->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_ot_surgery_registerlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_ot_surgery_registerlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_ot_surgery_registerlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PId->setDbValue($row['PId']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->diagnosis->setDbValue($row['diagnosis']);
        $this->proposedSurgery->setDbValue($row['proposedSurgery']);
        $this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
        $this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
        $this->RecievedTime->setDbValue($row['RecievedTime']);
        $this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
        $this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
        $this->surgeryStarted->setDbValue($row['surgeryStarted']);
        $this->surgeryEnded->setDbValue($row['surgeryEnded']);
        $this->RecoveryTime->setDbValue($row['RecoveryTime']);
        $this->ShiftedTime->setDbValue($row['ShiftedTime']);
        $this->Duration->setDbValue($row['Duration']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
        $this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
        $this->paediatric->setDbValue($row['paediatric']);
        $this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
        $this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
        $this->FloorNurse->setDbValue($row['FloorNurse']);
        $this->Technician->setDbValue($row['Technician']);
        $this->HouseKeeping->setDbValue($row['HouseKeeping']);
        $this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
        $this->gauze->setDbValue($row['gauze']);
        $this->needles->setDbValue($row['needles']);
        $this->bloodloss->setDbValue($row['bloodloss']);
        $this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
        $this->implantsUsed->setDbValue($row['implantsUsed']);
        $this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PId'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['diagnosis'] = null;
        $row['proposedSurgery'] = null;
        $row['surgeryProcedure'] = null;
        $row['typeOfAnaesthesia'] = null;
        $row['RecievedTime'] = null;
        $row['AnaesthesiaStarted'] = null;
        $row['AnaesthesiaEnded'] = null;
        $row['surgeryStarted'] = null;
        $row['surgeryEnded'] = null;
        $row['RecoveryTime'] = null;
        $row['ShiftedTime'] = null;
        $row['Duration'] = null;
        $row['Surgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AsstSurgeon1'] = null;
        $row['AsstSurgeon2'] = null;
        $row['paediatric'] = null;
        $row['ScrubNurse1'] = null;
        $row['ScrubNurse2'] = null;
        $row['FloorNurse'] = null;
        $row['Technician'] = null;
        $row['HouseKeeping'] = null;
        $row['countsCheckedMops'] = null;
        $row['gauze'] = null;
        $row['needles'] = null;
        $row['bloodloss'] = null;
        $row['bloodtransfusion'] = null;
        $row['implantsUsed'] = null;
        $row['MaterialsForHPE'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['PatID'] = null;
        $row['MobileNumber'] = null;
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

        // Reception

        // PId

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // diagnosis

        // proposedSurgery

        // surgeryProcedure

        // typeOfAnaesthesia

        // RecievedTime

        // AnaesthesiaStarted

        // AnaesthesiaEnded

        // surgeryStarted

        // surgeryEnded

        // RecoveryTime

        // ShiftedTime

        // Duration

        // Surgeon

        // Anaesthetist

        // AsstSurgeon1

        // AsstSurgeon2

        // paediatric

        // ScrubNurse1

        // ScrubNurse2

        // FloorNurse

        // Technician

        // HouseKeeping

        // countsCheckedMops

        // gauze

        // needles

        // bloodloss

        // bloodtransfusion

        // implantsUsed

        // MaterialsForHPE

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // PatID

        // MobileNumber
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // RecievedTime
            $this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
            $this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 0);
            $this->RecievedTime->ViewCustomAttributes = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
            $this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 0);
            $this->AnaesthesiaStarted->ViewCustomAttributes = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
            $this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 0);
            $this->AnaesthesiaEnded->ViewCustomAttributes = "";

            // surgeryStarted
            $this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
            $this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 0);
            $this->surgeryStarted->ViewCustomAttributes = "";

            // surgeryEnded
            $this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 0);
            $this->surgeryEnded->ViewCustomAttributes = "";

            // RecoveryTime
            $this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
            $this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 0);
            $this->RecoveryTime->ViewCustomAttributes = "";

            // ShiftedTime
            $this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
            $this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 0);
            $this->ShiftedTime->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $this->Surgeon->ViewCustomAttributes = "";

            // Anaesthetist
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
            $this->AsstSurgeon1->ViewCustomAttributes = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
            $this->AsstSurgeon2->ViewCustomAttributes = "";

            // paediatric
            $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
            $this->paediatric->ViewCustomAttributes = "";

            // ScrubNurse1
            $this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
            $this->ScrubNurse1->ViewCustomAttributes = "";

            // ScrubNurse2
            $this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
            $this->ScrubNurse2->ViewCustomAttributes = "";

            // FloorNurse
            $this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
            $this->FloorNurse->ViewCustomAttributes = "";

            // Technician
            $this->Technician->ViewValue = $this->Technician->CurrentValue;
            $this->Technician->ViewCustomAttributes = "";

            // HouseKeeping
            $this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
            $this->HouseKeeping->ViewCustomAttributes = "";

            // countsCheckedMops
            $this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
            $this->countsCheckedMops->ViewCustomAttributes = "";

            // gauze
            $this->gauze->ViewValue = $this->gauze->CurrentValue;
            $this->gauze->ViewCustomAttributes = "";

            // needles
            $this->needles->ViewValue = $this->needles->CurrentValue;
            $this->needles->ViewCustomAttributes = "";

            // bloodloss
            $this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
            $this->bloodloss->ViewCustomAttributes = "";

            // bloodtransfusion
            $this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
            $this->bloodtransfusion->ViewCustomAttributes = "";

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

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";
            $this->RecievedTime->TooltipValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";
            $this->AnaesthesiaStarted->TooltipValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";
            $this->AnaesthesiaEnded->TooltipValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";
            $this->surgeryStarted->TooltipValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";
            $this->surgeryEnded->TooltipValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";
            $this->RecoveryTime->TooltipValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";
            $this->ShiftedTime->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";
            $this->AsstSurgeon1->TooltipValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";
            $this->AsstSurgeon2->TooltipValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";
            $this->paediatric->TooltipValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";
            $this->ScrubNurse1->TooltipValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";
            $this->ScrubNurse2->TooltipValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";
            $this->FloorNurse->TooltipValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";
            $this->Technician->TooltipValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";
            $this->HouseKeeping->TooltipValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";
            $this->countsCheckedMops->TooltipValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";
            $this->gauze->TooltipValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";
            $this->needles->TooltipValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";
            $this->bloodloss->TooltipValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";
            $this->bloodtransfusion->TooltipValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_ot_surgery_registerlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
