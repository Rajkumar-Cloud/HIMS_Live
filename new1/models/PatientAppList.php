<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientAppList extends PatientApp
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_app';

    // Page object name
    public $PageObjName = "PatientAppList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fpatient_applist";
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

        // Table object (patient_app)
        if (!isset($GLOBALS["patient_app"]) || get_class($GLOBALS["patient_app"]) == PROJECT_NAMESPACE . "patient_app") {
            $GLOBALS["patient_app"] = &$this;
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
        $this->AddUrl = "PatientAppAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientAppDelete";
        $this->MultiUpdateUrl = "PatientAppUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_app');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_applistsrch";

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
                $doc = new $class(Container("patient_app"));
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
            $key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
            $key .= @$ar['PatientID'];
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
        $this->PatientID->setVisibility();
        $this->title->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->dob->setVisibility();
        $this->Age->setVisibility();
        $this->blood_group->setVisibility();
        $this->mobile_no->setVisibility();
        $this->description->Visible = false;
        $this->IdentificationMark->setVisibility();
        $this->Religion->setVisibility();
        $this->Nationality->setVisibility();
        $this->profilePic->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->spouse_title->setVisibility();
        $this->spouse_first_name->setVisibility();
        $this->spouse_middle_name->setVisibility();
        $this->spouse_last_name->setVisibility();
        $this->spouse_gender->setVisibility();
        $this->spouse_dob->setVisibility();
        $this->spouse_Age->setVisibility();
        $this->spouse_blood_group->setVisibility();
        $this->spouse_mobile_no->setVisibility();
        $this->Maritalstatus->setVisibility();
        $this->Business->setVisibility();
        $this->Patient_Language->setVisibility();
        $this->Passport->setVisibility();
        $this->VisaNo->setVisibility();
        $this->ValidityOfVisa->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->street->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->country->setVisibility();
        $this->postal_code->setVisibility();
        $this->PEmail->setVisibility();
        $this->PEmergencyContact->setVisibility();
        $this->occupation->setVisibility();
        $this->spouse_occupation->setVisibility();
        $this->WhatsApp->setVisibility();
        $this->CouppleID->setVisibility();
        $this->MaleID->setVisibility();
        $this->FemaleID->setVisibility();
        $this->GroupID->setVisibility();
        $this->Relationship->setVisibility();
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
        if (count($arKeyFlds) >= 2) {
            $this->id->setOldValue($arKeyFlds[0]);
            if (!is_numeric($this->id->OldValue)) {
                return false;
            }
            $this->PatientID->setOldValue($arKeyFlds[1]);
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
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->title->AdvancedSearch->toJson(), ","); // Field title
        $filterList = Concat($filterList, $this->first_name->AdvancedSearch->toJson(), ","); // Field first_name
        $filterList = Concat($filterList, $this->middle_name->AdvancedSearch->toJson(), ","); // Field middle_name
        $filterList = Concat($filterList, $this->last_name->AdvancedSearch->toJson(), ","); // Field last_name
        $filterList = Concat($filterList, $this->gender->AdvancedSearch->toJson(), ","); // Field gender
        $filterList = Concat($filterList, $this->dob->AdvancedSearch->toJson(), ","); // Field dob
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->blood_group->AdvancedSearch->toJson(), ","); // Field blood_group
        $filterList = Concat($filterList, $this->mobile_no->AdvancedSearch->toJson(), ","); // Field mobile_no
        $filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
        $filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
        $filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
        $filterList = Concat($filterList, $this->Nationality->AdvancedSearch->toJson(), ","); // Field Nationality
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->ReferedByDr->AdvancedSearch->toJson(), ","); // Field ReferedByDr
        $filterList = Concat($filterList, $this->ReferClinicname->AdvancedSearch->toJson(), ","); // Field ReferClinicname
        $filterList = Concat($filterList, $this->ReferCity->AdvancedSearch->toJson(), ","); // Field ReferCity
        $filterList = Concat($filterList, $this->ReferMobileNo->AdvancedSearch->toJson(), ","); // Field ReferMobileNo
        $filterList = Concat($filterList, $this->ReferA4TreatingConsultant->AdvancedSearch->toJson(), ","); // Field ReferA4TreatingConsultant
        $filterList = Concat($filterList, $this->PurposreReferredfor->AdvancedSearch->toJson(), ","); // Field PurposreReferredfor
        $filterList = Concat($filterList, $this->spouse_title->AdvancedSearch->toJson(), ","); // Field spouse_title
        $filterList = Concat($filterList, $this->spouse_first_name->AdvancedSearch->toJson(), ","); // Field spouse_first_name
        $filterList = Concat($filterList, $this->spouse_middle_name->AdvancedSearch->toJson(), ","); // Field spouse_middle_name
        $filterList = Concat($filterList, $this->spouse_last_name->AdvancedSearch->toJson(), ","); // Field spouse_last_name
        $filterList = Concat($filterList, $this->spouse_gender->AdvancedSearch->toJson(), ","); // Field spouse_gender
        $filterList = Concat($filterList, $this->spouse_dob->AdvancedSearch->toJson(), ","); // Field spouse_dob
        $filterList = Concat($filterList, $this->spouse_Age->AdvancedSearch->toJson(), ","); // Field spouse_Age
        $filterList = Concat($filterList, $this->spouse_blood_group->AdvancedSearch->toJson(), ","); // Field spouse_blood_group
        $filterList = Concat($filterList, $this->spouse_mobile_no->AdvancedSearch->toJson(), ","); // Field spouse_mobile_no
        $filterList = Concat($filterList, $this->Maritalstatus->AdvancedSearch->toJson(), ","); // Field Maritalstatus
        $filterList = Concat($filterList, $this->Business->AdvancedSearch->toJson(), ","); // Field Business
        $filterList = Concat($filterList, $this->Patient_Language->AdvancedSearch->toJson(), ","); // Field Patient_Language
        $filterList = Concat($filterList, $this->Passport->AdvancedSearch->toJson(), ","); // Field Passport
        $filterList = Concat($filterList, $this->VisaNo->AdvancedSearch->toJson(), ","); // Field VisaNo
        $filterList = Concat($filterList, $this->ValidityOfVisa->AdvancedSearch->toJson(), ","); // Field ValidityOfVisa
        $filterList = Concat($filterList, $this->WhereDidYouHear->AdvancedSearch->toJson(), ","); // Field WhereDidYouHear
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->street->AdvancedSearch->toJson(), ","); // Field street
        $filterList = Concat($filterList, $this->town->AdvancedSearch->toJson(), ","); // Field town
        $filterList = Concat($filterList, $this->province->AdvancedSearch->toJson(), ","); // Field province
        $filterList = Concat($filterList, $this->country->AdvancedSearch->toJson(), ","); // Field country
        $filterList = Concat($filterList, $this->postal_code->AdvancedSearch->toJson(), ","); // Field postal_code
        $filterList = Concat($filterList, $this->PEmail->AdvancedSearch->toJson(), ","); // Field PEmail
        $filterList = Concat($filterList, $this->PEmergencyContact->AdvancedSearch->toJson(), ","); // Field PEmergencyContact
        $filterList = Concat($filterList, $this->occupation->AdvancedSearch->toJson(), ","); // Field occupation
        $filterList = Concat($filterList, $this->spouse_occupation->AdvancedSearch->toJson(), ","); // Field spouse_occupation
        $filterList = Concat($filterList, $this->WhatsApp->AdvancedSearch->toJson(), ","); // Field WhatsApp
        $filterList = Concat($filterList, $this->CouppleID->AdvancedSearch->toJson(), ","); // Field CouppleID
        $filterList = Concat($filterList, $this->MaleID->AdvancedSearch->toJson(), ","); // Field MaleID
        $filterList = Concat($filterList, $this->FemaleID->AdvancedSearch->toJson(), ","); // Field FemaleID
        $filterList = Concat($filterList, $this->GroupID->AdvancedSearch->toJson(), ","); // Field GroupID
        $filterList = Concat($filterList, $this->Relationship->AdvancedSearch->toJson(), ","); // Field Relationship
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_applistsrch", $filters);
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

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field title
        $this->title->AdvancedSearch->SearchValue = @$filter["x_title"];
        $this->title->AdvancedSearch->SearchOperator = @$filter["z_title"];
        $this->title->AdvancedSearch->SearchCondition = @$filter["v_title"];
        $this->title->AdvancedSearch->SearchValue2 = @$filter["y_title"];
        $this->title->AdvancedSearch->SearchOperator2 = @$filter["w_title"];
        $this->title->AdvancedSearch->save();

        // Field first_name
        $this->first_name->AdvancedSearch->SearchValue = @$filter["x_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator = @$filter["z_first_name"];
        $this->first_name->AdvancedSearch->SearchCondition = @$filter["v_first_name"];
        $this->first_name->AdvancedSearch->SearchValue2 = @$filter["y_first_name"];
        $this->first_name->AdvancedSearch->SearchOperator2 = @$filter["w_first_name"];
        $this->first_name->AdvancedSearch->save();

        // Field middle_name
        $this->middle_name->AdvancedSearch->SearchValue = @$filter["x_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator = @$filter["z_middle_name"];
        $this->middle_name->AdvancedSearch->SearchCondition = @$filter["v_middle_name"];
        $this->middle_name->AdvancedSearch->SearchValue2 = @$filter["y_middle_name"];
        $this->middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_middle_name"];
        $this->middle_name->AdvancedSearch->save();

        // Field last_name
        $this->last_name->AdvancedSearch->SearchValue = @$filter["x_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator = @$filter["z_last_name"];
        $this->last_name->AdvancedSearch->SearchCondition = @$filter["v_last_name"];
        $this->last_name->AdvancedSearch->SearchValue2 = @$filter["y_last_name"];
        $this->last_name->AdvancedSearch->SearchOperator2 = @$filter["w_last_name"];
        $this->last_name->AdvancedSearch->save();

        // Field gender
        $this->gender->AdvancedSearch->SearchValue = @$filter["x_gender"];
        $this->gender->AdvancedSearch->SearchOperator = @$filter["z_gender"];
        $this->gender->AdvancedSearch->SearchCondition = @$filter["v_gender"];
        $this->gender->AdvancedSearch->SearchValue2 = @$filter["y_gender"];
        $this->gender->AdvancedSearch->SearchOperator2 = @$filter["w_gender"];
        $this->gender->AdvancedSearch->save();

        // Field dob
        $this->dob->AdvancedSearch->SearchValue = @$filter["x_dob"];
        $this->dob->AdvancedSearch->SearchOperator = @$filter["z_dob"];
        $this->dob->AdvancedSearch->SearchCondition = @$filter["v_dob"];
        $this->dob->AdvancedSearch->SearchValue2 = @$filter["y_dob"];
        $this->dob->AdvancedSearch->SearchOperator2 = @$filter["w_dob"];
        $this->dob->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field blood_group
        $this->blood_group->AdvancedSearch->SearchValue = @$filter["x_blood_group"];
        $this->blood_group->AdvancedSearch->SearchOperator = @$filter["z_blood_group"];
        $this->blood_group->AdvancedSearch->SearchCondition = @$filter["v_blood_group"];
        $this->blood_group->AdvancedSearch->SearchValue2 = @$filter["y_blood_group"];
        $this->blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_blood_group"];
        $this->blood_group->AdvancedSearch->save();

        // Field mobile_no
        $this->mobile_no->AdvancedSearch->SearchValue = @$filter["x_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchOperator = @$filter["z_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchCondition = @$filter["v_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_mobile_no"];
        $this->mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_mobile_no"];
        $this->mobile_no->AdvancedSearch->save();

        // Field description
        $this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
        $this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
        $this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
        $this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
        $this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
        $this->description->AdvancedSearch->save();

        // Field IdentificationMark
        $this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->save();

        // Field Religion
        $this->Religion->AdvancedSearch->SearchValue = @$filter["x_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator = @$filter["z_Religion"];
        $this->Religion->AdvancedSearch->SearchCondition = @$filter["v_Religion"];
        $this->Religion->AdvancedSearch->SearchValue2 = @$filter["y_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator2 = @$filter["w_Religion"];
        $this->Religion->AdvancedSearch->save();

        // Field Nationality
        $this->Nationality->AdvancedSearch->SearchValue = @$filter["x_Nationality"];
        $this->Nationality->AdvancedSearch->SearchOperator = @$filter["z_Nationality"];
        $this->Nationality->AdvancedSearch->SearchCondition = @$filter["v_Nationality"];
        $this->Nationality->AdvancedSearch->SearchValue2 = @$filter["y_Nationality"];
        $this->Nationality->AdvancedSearch->SearchOperator2 = @$filter["w_Nationality"];
        $this->Nationality->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

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

        // Field ReferedByDr
        $this->ReferedByDr->AdvancedSearch->SearchValue = @$filter["x_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchOperator = @$filter["z_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchCondition = @$filter["v_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchValue2 = @$filter["y_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedByDr"];
        $this->ReferedByDr->AdvancedSearch->save();

        // Field ReferClinicname
        $this->ReferClinicname->AdvancedSearch->SearchValue = @$filter["x_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchOperator = @$filter["z_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchCondition = @$filter["v_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchValue2 = @$filter["y_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->SearchOperator2 = @$filter["w_ReferClinicname"];
        $this->ReferClinicname->AdvancedSearch->save();

        // Field ReferCity
        $this->ReferCity->AdvancedSearch->SearchValue = @$filter["x_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchOperator = @$filter["z_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchCondition = @$filter["v_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchValue2 = @$filter["y_ReferCity"];
        $this->ReferCity->AdvancedSearch->SearchOperator2 = @$filter["w_ReferCity"];
        $this->ReferCity->AdvancedSearch->save();

        // Field ReferMobileNo
        $this->ReferMobileNo->AdvancedSearch->SearchValue = @$filter["x_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchOperator = @$filter["z_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchCondition = @$filter["v_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferMobileNo"];
        $this->ReferMobileNo->AdvancedSearch->save();

        // Field ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue = @$filter["x_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator = @$filter["z_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchCondition = @$filter["v_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchValue2 = @$filter["y_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->SearchOperator2 = @$filter["w_ReferA4TreatingConsultant"];
        $this->ReferA4TreatingConsultant->AdvancedSearch->save();

        // Field PurposreReferredfor
        $this->PurposreReferredfor->AdvancedSearch->SearchValue = @$filter["x_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchOperator = @$filter["z_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchCondition = @$filter["v_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchValue2 = @$filter["y_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->SearchOperator2 = @$filter["w_PurposreReferredfor"];
        $this->PurposreReferredfor->AdvancedSearch->save();

        // Field spouse_title
        $this->spouse_title->AdvancedSearch->SearchValue = @$filter["x_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchOperator = @$filter["z_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchCondition = @$filter["v_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchValue2 = @$filter["y_spouse_title"];
        $this->spouse_title->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_title"];
        $this->spouse_title->AdvancedSearch->save();

        // Field spouse_first_name
        $this->spouse_first_name->AdvancedSearch->SearchValue = @$filter["x_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_first_name"];
        $this->spouse_first_name->AdvancedSearch->save();

        // Field spouse_middle_name
        $this->spouse_middle_name->AdvancedSearch->SearchValue = @$filter["x_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_middle_name"];
        $this->spouse_middle_name->AdvancedSearch->save();

        // Field spouse_last_name
        $this->spouse_last_name->AdvancedSearch->SearchValue = @$filter["x_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchOperator = @$filter["z_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchCondition = @$filter["v_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchValue2 = @$filter["y_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_last_name"];
        $this->spouse_last_name->AdvancedSearch->save();

        // Field spouse_gender
        $this->spouse_gender->AdvancedSearch->SearchValue = @$filter["x_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchOperator = @$filter["z_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchCondition = @$filter["v_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchValue2 = @$filter["y_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_gender"];
        $this->spouse_gender->AdvancedSearch->save();

        // Field spouse_dob
        $this->spouse_dob->AdvancedSearch->SearchValue = @$filter["x_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchOperator = @$filter["z_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchCondition = @$filter["v_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchValue2 = @$filter["y_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_dob"];
        $this->spouse_dob->AdvancedSearch->save();

        // Field spouse_Age
        $this->spouse_Age->AdvancedSearch->SearchValue = @$filter["x_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchOperator = @$filter["z_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchCondition = @$filter["v_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchValue2 = @$filter["y_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_Age"];
        $this->spouse_Age->AdvancedSearch->save();

        // Field spouse_blood_group
        $this->spouse_blood_group->AdvancedSearch->SearchValue = @$filter["x_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchOperator = @$filter["z_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchCondition = @$filter["v_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchValue2 = @$filter["y_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_blood_group"];
        $this->spouse_blood_group->AdvancedSearch->save();

        // Field spouse_mobile_no
        $this->spouse_mobile_no->AdvancedSearch->SearchValue = @$filter["x_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchOperator = @$filter["z_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchCondition = @$filter["v_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchValue2 = @$filter["y_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_mobile_no"];
        $this->spouse_mobile_no->AdvancedSearch->save();

        // Field Maritalstatus
        $this->Maritalstatus->AdvancedSearch->SearchValue = @$filter["x_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchOperator = @$filter["z_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchCondition = @$filter["v_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchValue2 = @$filter["y_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->SearchOperator2 = @$filter["w_Maritalstatus"];
        $this->Maritalstatus->AdvancedSearch->save();

        // Field Business
        $this->Business->AdvancedSearch->SearchValue = @$filter["x_Business"];
        $this->Business->AdvancedSearch->SearchOperator = @$filter["z_Business"];
        $this->Business->AdvancedSearch->SearchCondition = @$filter["v_Business"];
        $this->Business->AdvancedSearch->SearchValue2 = @$filter["y_Business"];
        $this->Business->AdvancedSearch->SearchOperator2 = @$filter["w_Business"];
        $this->Business->AdvancedSearch->save();

        // Field Patient_Language
        $this->Patient_Language->AdvancedSearch->SearchValue = @$filter["x_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchOperator = @$filter["z_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchCondition = @$filter["v_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchValue2 = @$filter["y_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->SearchOperator2 = @$filter["w_Patient_Language"];
        $this->Patient_Language->AdvancedSearch->save();

        // Field Passport
        $this->Passport->AdvancedSearch->SearchValue = @$filter["x_Passport"];
        $this->Passport->AdvancedSearch->SearchOperator = @$filter["z_Passport"];
        $this->Passport->AdvancedSearch->SearchCondition = @$filter["v_Passport"];
        $this->Passport->AdvancedSearch->SearchValue2 = @$filter["y_Passport"];
        $this->Passport->AdvancedSearch->SearchOperator2 = @$filter["w_Passport"];
        $this->Passport->AdvancedSearch->save();

        // Field VisaNo
        $this->VisaNo->AdvancedSearch->SearchValue = @$filter["x_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchOperator = @$filter["z_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchCondition = @$filter["v_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchValue2 = @$filter["y_VisaNo"];
        $this->VisaNo->AdvancedSearch->SearchOperator2 = @$filter["w_VisaNo"];
        $this->VisaNo->AdvancedSearch->save();

        // Field ValidityOfVisa
        $this->ValidityOfVisa->AdvancedSearch->SearchValue = @$filter["x_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchOperator = @$filter["z_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchCondition = @$filter["v_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchValue2 = @$filter["y_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->SearchOperator2 = @$filter["w_ValidityOfVisa"];
        $this->ValidityOfVisa->AdvancedSearch->save();

        // Field WhereDidYouHear
        $this->WhereDidYouHear->AdvancedSearch->SearchValue = @$filter["x_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchOperator = @$filter["z_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchCondition = @$filter["v_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchValue2 = @$filter["y_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->SearchOperator2 = @$filter["w_WhereDidYouHear"];
        $this->WhereDidYouHear->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field street
        $this->street->AdvancedSearch->SearchValue = @$filter["x_street"];
        $this->street->AdvancedSearch->SearchOperator = @$filter["z_street"];
        $this->street->AdvancedSearch->SearchCondition = @$filter["v_street"];
        $this->street->AdvancedSearch->SearchValue2 = @$filter["y_street"];
        $this->street->AdvancedSearch->SearchOperator2 = @$filter["w_street"];
        $this->street->AdvancedSearch->save();

        // Field town
        $this->town->AdvancedSearch->SearchValue = @$filter["x_town"];
        $this->town->AdvancedSearch->SearchOperator = @$filter["z_town"];
        $this->town->AdvancedSearch->SearchCondition = @$filter["v_town"];
        $this->town->AdvancedSearch->SearchValue2 = @$filter["y_town"];
        $this->town->AdvancedSearch->SearchOperator2 = @$filter["w_town"];
        $this->town->AdvancedSearch->save();

        // Field province
        $this->province->AdvancedSearch->SearchValue = @$filter["x_province"];
        $this->province->AdvancedSearch->SearchOperator = @$filter["z_province"];
        $this->province->AdvancedSearch->SearchCondition = @$filter["v_province"];
        $this->province->AdvancedSearch->SearchValue2 = @$filter["y_province"];
        $this->province->AdvancedSearch->SearchOperator2 = @$filter["w_province"];
        $this->province->AdvancedSearch->save();

        // Field country
        $this->country->AdvancedSearch->SearchValue = @$filter["x_country"];
        $this->country->AdvancedSearch->SearchOperator = @$filter["z_country"];
        $this->country->AdvancedSearch->SearchCondition = @$filter["v_country"];
        $this->country->AdvancedSearch->SearchValue2 = @$filter["y_country"];
        $this->country->AdvancedSearch->SearchOperator2 = @$filter["w_country"];
        $this->country->AdvancedSearch->save();

        // Field postal_code
        $this->postal_code->AdvancedSearch->SearchValue = @$filter["x_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator = @$filter["z_postal_code"];
        $this->postal_code->AdvancedSearch->SearchCondition = @$filter["v_postal_code"];
        $this->postal_code->AdvancedSearch->SearchValue2 = @$filter["y_postal_code"];
        $this->postal_code->AdvancedSearch->SearchOperator2 = @$filter["w_postal_code"];
        $this->postal_code->AdvancedSearch->save();

        // Field PEmail
        $this->PEmail->AdvancedSearch->SearchValue = @$filter["x_PEmail"];
        $this->PEmail->AdvancedSearch->SearchOperator = @$filter["z_PEmail"];
        $this->PEmail->AdvancedSearch->SearchCondition = @$filter["v_PEmail"];
        $this->PEmail->AdvancedSearch->SearchValue2 = @$filter["y_PEmail"];
        $this->PEmail->AdvancedSearch->SearchOperator2 = @$filter["w_PEmail"];
        $this->PEmail->AdvancedSearch->save();

        // Field PEmergencyContact
        $this->PEmergencyContact->AdvancedSearch->SearchValue = @$filter["x_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchOperator = @$filter["z_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchCondition = @$filter["v_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchValue2 = @$filter["y_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->SearchOperator2 = @$filter["w_PEmergencyContact"];
        $this->PEmergencyContact->AdvancedSearch->save();

        // Field occupation
        $this->occupation->AdvancedSearch->SearchValue = @$filter["x_occupation"];
        $this->occupation->AdvancedSearch->SearchOperator = @$filter["z_occupation"];
        $this->occupation->AdvancedSearch->SearchCondition = @$filter["v_occupation"];
        $this->occupation->AdvancedSearch->SearchValue2 = @$filter["y_occupation"];
        $this->occupation->AdvancedSearch->SearchOperator2 = @$filter["w_occupation"];
        $this->occupation->AdvancedSearch->save();

        // Field spouse_occupation
        $this->spouse_occupation->AdvancedSearch->SearchValue = @$filter["x_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchOperator = @$filter["z_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchCondition = @$filter["v_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchValue2 = @$filter["y_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->SearchOperator2 = @$filter["w_spouse_occupation"];
        $this->spouse_occupation->AdvancedSearch->save();

        // Field WhatsApp
        $this->WhatsApp->AdvancedSearch->SearchValue = @$filter["x_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchOperator = @$filter["z_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchCondition = @$filter["v_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchValue2 = @$filter["y_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->SearchOperator2 = @$filter["w_WhatsApp"];
        $this->WhatsApp->AdvancedSearch->save();

        // Field CouppleID
        $this->CouppleID->AdvancedSearch->SearchValue = @$filter["x_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchOperator = @$filter["z_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchCondition = @$filter["v_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchValue2 = @$filter["y_CouppleID"];
        $this->CouppleID->AdvancedSearch->SearchOperator2 = @$filter["w_CouppleID"];
        $this->CouppleID->AdvancedSearch->save();

        // Field MaleID
        $this->MaleID->AdvancedSearch->SearchValue = @$filter["x_MaleID"];
        $this->MaleID->AdvancedSearch->SearchOperator = @$filter["z_MaleID"];
        $this->MaleID->AdvancedSearch->SearchCondition = @$filter["v_MaleID"];
        $this->MaleID->AdvancedSearch->SearchValue2 = @$filter["y_MaleID"];
        $this->MaleID->AdvancedSearch->SearchOperator2 = @$filter["w_MaleID"];
        $this->MaleID->AdvancedSearch->save();

        // Field FemaleID
        $this->FemaleID->AdvancedSearch->SearchValue = @$filter["x_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchOperator = @$filter["z_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchCondition = @$filter["v_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchValue2 = @$filter["y_FemaleID"];
        $this->FemaleID->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleID"];
        $this->FemaleID->AdvancedSearch->save();

        // Field GroupID
        $this->GroupID->AdvancedSearch->SearchValue = @$filter["x_GroupID"];
        $this->GroupID->AdvancedSearch->SearchOperator = @$filter["z_GroupID"];
        $this->GroupID->AdvancedSearch->SearchCondition = @$filter["v_GroupID"];
        $this->GroupID->AdvancedSearch->SearchValue2 = @$filter["y_GroupID"];
        $this->GroupID->AdvancedSearch->SearchOperator2 = @$filter["w_GroupID"];
        $this->GroupID->AdvancedSearch->save();

        // Field Relationship
        $this->Relationship->AdvancedSearch->SearchValue = @$filter["x_Relationship"];
        $this->Relationship->AdvancedSearch->SearchOperator = @$filter["z_Relationship"];
        $this->Relationship->AdvancedSearch->SearchCondition = @$filter["v_Relationship"];
        $this->Relationship->AdvancedSearch->SearchValue2 = @$filter["y_Relationship"];
        $this->Relationship->AdvancedSearch->SearchOperator2 = @$filter["w_Relationship"];
        $this->Relationship->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->middle_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->blood_group, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mobile_no, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Nationality, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferedByDr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferClinicname, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferCity, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferMobileNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferA4TreatingConsultant, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PurposreReferredfor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_title, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_first_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_middle_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_last_name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_blood_group, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_mobile_no, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Maritalstatus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Business, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Patient_Language, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Passport, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VisaNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ValidityOfVisa, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WhereDidYouHear, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HospID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->street, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->town, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->province, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->country, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->postal_code, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PEmail, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PEmergencyContact, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->occupation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->spouse_occupation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WhatsApp, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Relationship, $arKeywords, $type);
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
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->title); // title
            $this->updateSort($this->first_name); // first_name
            $this->updateSort($this->middle_name); // middle_name
            $this->updateSort($this->last_name); // last_name
            $this->updateSort($this->gender); // gender
            $this->updateSort($this->dob); // dob
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->blood_group); // blood_group
            $this->updateSort($this->mobile_no); // mobile_no
            $this->updateSort($this->IdentificationMark); // IdentificationMark
            $this->updateSort($this->Religion); // Religion
            $this->updateSort($this->Nationality); // Nationality
            $this->updateSort($this->profilePic); // profilePic
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->ReferedByDr); // ReferedByDr
            $this->updateSort($this->ReferClinicname); // ReferClinicname
            $this->updateSort($this->ReferCity); // ReferCity
            $this->updateSort($this->ReferMobileNo); // ReferMobileNo
            $this->updateSort($this->ReferA4TreatingConsultant); // ReferA4TreatingConsultant
            $this->updateSort($this->PurposreReferredfor); // PurposreReferredfor
            $this->updateSort($this->spouse_title); // spouse_title
            $this->updateSort($this->spouse_first_name); // spouse_first_name
            $this->updateSort($this->spouse_middle_name); // spouse_middle_name
            $this->updateSort($this->spouse_last_name); // spouse_last_name
            $this->updateSort($this->spouse_gender); // spouse_gender
            $this->updateSort($this->spouse_dob); // spouse_dob
            $this->updateSort($this->spouse_Age); // spouse_Age
            $this->updateSort($this->spouse_blood_group); // spouse_blood_group
            $this->updateSort($this->spouse_mobile_no); // spouse_mobile_no
            $this->updateSort($this->Maritalstatus); // Maritalstatus
            $this->updateSort($this->Business); // Business
            $this->updateSort($this->Patient_Language); // Patient_Language
            $this->updateSort($this->Passport); // Passport
            $this->updateSort($this->VisaNo); // VisaNo
            $this->updateSort($this->ValidityOfVisa); // ValidityOfVisa
            $this->updateSort($this->WhereDidYouHear); // WhereDidYouHear
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->street); // street
            $this->updateSort($this->town); // town
            $this->updateSort($this->province); // province
            $this->updateSort($this->country); // country
            $this->updateSort($this->postal_code); // postal_code
            $this->updateSort($this->PEmail); // PEmail
            $this->updateSort($this->PEmergencyContact); // PEmergencyContact
            $this->updateSort($this->occupation); // occupation
            $this->updateSort($this->spouse_occupation); // spouse_occupation
            $this->updateSort($this->WhatsApp); // WhatsApp
            $this->updateSort($this->CouppleID); // CouppleID
            $this->updateSort($this->MaleID); // MaleID
            $this->updateSort($this->FemaleID); // FemaleID
            $this->updateSort($this->GroupID); // GroupID
            $this->updateSort($this->Relationship); // Relationship
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
                $this->PatientID->setSort("");
                $this->title->setSort("");
                $this->first_name->setSort("");
                $this->middle_name->setSort("");
                $this->last_name->setSort("");
                $this->gender->setSort("");
                $this->dob->setSort("");
                $this->Age->setSort("");
                $this->blood_group->setSort("");
                $this->mobile_no->setSort("");
                $this->description->setSort("");
                $this->IdentificationMark->setSort("");
                $this->Religion->setSort("");
                $this->Nationality->setSort("");
                $this->profilePic->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->ReferedByDr->setSort("");
                $this->ReferClinicname->setSort("");
                $this->ReferCity->setSort("");
                $this->ReferMobileNo->setSort("");
                $this->ReferA4TreatingConsultant->setSort("");
                $this->PurposreReferredfor->setSort("");
                $this->spouse_title->setSort("");
                $this->spouse_first_name->setSort("");
                $this->spouse_middle_name->setSort("");
                $this->spouse_last_name->setSort("");
                $this->spouse_gender->setSort("");
                $this->spouse_dob->setSort("");
                $this->spouse_Age->setSort("");
                $this->spouse_blood_group->setSort("");
                $this->spouse_mobile_no->setSort("");
                $this->Maritalstatus->setSort("");
                $this->Business->setSort("");
                $this->Patient_Language->setSort("");
                $this->Passport->setSort("");
                $this->VisaNo->setSort("");
                $this->ValidityOfVisa->setSort("");
                $this->WhereDidYouHear->setSort("");
                $this->HospID->setSort("");
                $this->street->setSort("");
                $this->town->setSort("");
                $this->province->setSort("");
                $this->country->setSort("");
                $this->postal_code->setSort("");
                $this->PEmail->setSort("");
                $this->PEmergencyContact->setSort("");
                $this->occupation->setSort("");
                $this->spouse_occupation->setSort("");
                $this->WhatsApp->setSort("");
                $this->CouppleID->setSort("");
                $this->MaleID->setSort("");
                $this->FemaleID->setSort("");
                $this->GroupID->setSort("");
                $this->Relationship->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->PatientID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_applistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_applistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_applist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatientID'] = null;
        $row['title'] = null;
        $row['first_name'] = null;
        $row['middle_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['dob'] = null;
        $row['Age'] = null;
        $row['blood_group'] = null;
        $row['mobile_no'] = null;
        $row['description'] = null;
        $row['IdentificationMark'] = null;
        $row['Religion'] = null;
        $row['Nationality'] = null;
        $row['profilePic'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['spouse_title'] = null;
        $row['spouse_first_name'] = null;
        $row['spouse_middle_name'] = null;
        $row['spouse_last_name'] = null;
        $row['spouse_gender'] = null;
        $row['spouse_dob'] = null;
        $row['spouse_Age'] = null;
        $row['spouse_blood_group'] = null;
        $row['spouse_mobile_no'] = null;
        $row['Maritalstatus'] = null;
        $row['Business'] = null;
        $row['Patient_Language'] = null;
        $row['Passport'] = null;
        $row['VisaNo'] = null;
        $row['ValidityOfVisa'] = null;
        $row['WhereDidYouHear'] = null;
        $row['HospID'] = null;
        $row['street'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['country'] = null;
        $row['postal_code'] = null;
        $row['PEmail'] = null;
        $row['PEmergencyContact'] = null;
        $row['occupation'] = null;
        $row['spouse_occupation'] = null;
        $row['WhatsApp'] = null;
        $row['CouppleID'] = null;
        $row['MaleID'] = null;
        $row['FemaleID'] = null;
        $row['GroupID'] = null;
        $row['Relationship'] = null;
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
        if (strval($this->getKey("PatientID")) != "") {
            $this->PatientID->OldValue = $this->getKey("PatientID"); // PatientID
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

        // PatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // Age

        // blood_group

        // mobile_no

        // description

        // IdentificationMark

        // Religion

        // Nationality

        // profilePic

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // spouse_title

        // spouse_first_name

        // spouse_middle_name

        // spouse_last_name

        // spouse_gender

        // spouse_dob

        // spouse_Age

        // spouse_blood_group

        // spouse_mobile_no

        // Maritalstatus

        // Business

        // Patient_Language

        // Passport

        // VisaNo

        // ValidityOfVisa

        // WhereDidYouHear

        // HospID

        // street

        // town

        // province

        // country

        // postal_code

        // PEmail

        // PEmergencyContact

        // occupation

        // spouse_occupation

        // WhatsApp

        // CouppleID

        // MaleID

        // FemaleID

        // GroupID

        // Relationship
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $this->title->ViewValue = $this->title->CurrentValue;
            $this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
            $this->title->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // dob
            $this->dob->ViewValue = $this->dob->CurrentValue;
            $this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
            $this->dob->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // blood_group
            $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
            $this->blood_group->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Nationality
            $this->Nationality->ViewValue = $this->Nationality->CurrentValue;
            $this->Nationality->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

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

            // ReferedByDr
            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
            $this->ReferedByDr->ViewCustomAttributes = "";

            // ReferClinicname
            $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
            $this->ReferClinicname->ViewCustomAttributes = "";

            // ReferCity
            $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
            $this->ReferCity->ViewCustomAttributes = "";

            // ReferMobileNo
            $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
            $this->ReferMobileNo->ViewCustomAttributes = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // spouse_title
            $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
            $this->spouse_title->ViewCustomAttributes = "";

            // spouse_first_name
            $this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
            $this->spouse_first_name->ViewCustomAttributes = "";

            // spouse_middle_name
            $this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
            $this->spouse_middle_name->ViewCustomAttributes = "";

            // spouse_last_name
            $this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
            $this->spouse_last_name->ViewCustomAttributes = "";

            // spouse_gender
            $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
            $this->spouse_gender->ViewCustomAttributes = "";

            // spouse_dob
            $this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
            $this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
            $this->spouse_dob->ViewCustomAttributes = "";

            // spouse_Age
            $this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
            $this->spouse_Age->ViewCustomAttributes = "";

            // spouse_blood_group
            $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
            $this->spouse_blood_group->ViewCustomAttributes = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
            $this->spouse_mobile_no->ViewCustomAttributes = "";

            // Maritalstatus
            $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
            $this->Maritalstatus->ViewCustomAttributes = "";

            // Business
            $this->Business->ViewValue = $this->Business->CurrentValue;
            $this->Business->ViewCustomAttributes = "";

            // Patient_Language
            $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
            $this->Patient_Language->ViewCustomAttributes = "";

            // Passport
            $this->Passport->ViewValue = $this->Passport->CurrentValue;
            $this->Passport->ViewCustomAttributes = "";

            // VisaNo
            $this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
            $this->VisaNo->ViewCustomAttributes = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
            $this->ValidityOfVisa->ViewCustomAttributes = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // PEmail
            $this->PEmail->ViewValue = $this->PEmail->CurrentValue;
            $this->PEmail->ViewCustomAttributes = "";

            // PEmergencyContact
            $this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
            $this->PEmergencyContact->ViewCustomAttributes = "";

            // occupation
            $this->occupation->ViewValue = $this->occupation->CurrentValue;
            $this->occupation->ViewCustomAttributes = "";

            // spouse_occupation
            $this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
            $this->spouse_occupation->ViewCustomAttributes = "";

            // WhatsApp
            $this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
            $this->WhatsApp->ViewCustomAttributes = "";

            // CouppleID
            $this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
            $this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
            $this->CouppleID->ViewCustomAttributes = "";

            // MaleID
            $this->MaleID->ViewValue = $this->MaleID->CurrentValue;
            $this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
            $this->MaleID->ViewCustomAttributes = "";

            // FemaleID
            $this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
            $this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
            $this->FemaleID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // Relationship
            $this->Relationship->ViewValue = $this->Relationship->CurrentValue;
            $this->Relationship->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";
            $this->dob->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";
            $this->blood_group->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";
            $this->Nationality->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

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

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";
            $this->ReferedByDr->TooltipValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";
            $this->ReferClinicname->TooltipValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";
            $this->ReferCity->TooltipValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";
            $this->ReferMobileNo->TooltipValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";
            $this->ReferA4TreatingConsultant->TooltipValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";
            $this->PurposreReferredfor->TooltipValue = "";

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";
            $this->spouse_title->TooltipValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";
            $this->spouse_first_name->TooltipValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";
            $this->spouse_middle_name->TooltipValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";
            $this->spouse_last_name->TooltipValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";
            $this->spouse_gender->TooltipValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";
            $this->spouse_dob->TooltipValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";
            $this->spouse_Age->TooltipValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";
            $this->spouse_blood_group->TooltipValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";
            $this->spouse_mobile_no->TooltipValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";
            $this->Maritalstatus->TooltipValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";
            $this->Business->TooltipValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";
            $this->Patient_Language->TooltipValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";
            $this->Passport->TooltipValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";
            $this->VisaNo->TooltipValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";
            $this->ValidityOfVisa->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";
            $this->PEmail->TooltipValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";
            $this->PEmergencyContact->TooltipValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";
            $this->occupation->TooltipValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";
            $this->spouse_occupation->TooltipValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";
            $this->WhatsApp->TooltipValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";
            $this->CouppleID->TooltipValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";
            $this->MaleID->TooltipValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";
            $this->FemaleID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";
            $this->Relationship->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_applistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
