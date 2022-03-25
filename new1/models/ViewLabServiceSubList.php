<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewLabServiceSubList extends ViewLabServiceSub
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_lab_service_sub';

    // Page object name
    public $PageObjName = "ViewLabServiceSubList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fview_lab_service_sublist";
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

        // Table object (view_lab_service_sub)
        if (!isset($GLOBALS["view_lab_service_sub"]) || get_class($GLOBALS["view_lab_service_sub"]) == PROJECT_NAMESPACE . "view_lab_service_sub") {
            $GLOBALS["view_lab_service_sub"] = &$this;
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
        $this->AddUrl = "ViewLabServiceSubAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewLabServiceSubDelete";
        $this->MultiUpdateUrl = "ViewLabServiceSubUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_lab_service_sub');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_lab_service_sublistsrch";

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
                $doc = new $class(Container("view_lab_service_sub"));
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
            $key .= @$ar['Id'];
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
            $this->Id->Visible = false;
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
        $this->Id->setVisibility();
        $this->CODE->setVisibility();
        $this->SERVICE->setVisibility();
        $this->UNITS->setVisibility();
        $this->AMOUNT->setVisibility();
        $this->SERVICE_TYPE->setVisibility();
        $this->DEPARTMENT->setVisibility();
        $this->Created->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->Modified->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->mas_services_billingcol->setVisibility();
        $this->DrShareAmount->setVisibility();
        $this->HospShareAmount->setVisibility();
        $this->DrSharePer->setVisibility();
        $this->HospSharePer->setVisibility();
        $this->HospID->setVisibility();
        $this->TestSubCd->setVisibility();
        $this->Method->setVisibility();
        $this->Order->setVisibility();
        $this->Form->Visible = false;
        $this->ResType->setVisibility();
        $this->UnitCD->setVisibility();
        $this->RefValue->Visible = false;
        $this->Sample->setVisibility();
        $this->NoD->setVisibility();
        $this->BillOrder->setVisibility();
        $this->Formula->Visible = false;
        $this->Inactive->setVisibility();
        $this->Outsource->setVisibility();
        $this->CollSample->setVisibility();
        $this->TestType->setVisibility();
        $this->NoHeading->setVisibility();
        $this->ChemicalCode->setVisibility();
        $this->ChemicalName->setVisibility();
        $this->Utilaization->setVisibility();
        $this->Interpretation->Visible = false;
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
            $this->Id->setOldValue($arKeyFlds[0]);
            if (!is_numeric($this->Id->OldValue)) {
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
        $filterList = Concat($filterList, $this->Id->AdvancedSearch->toJson(), ","); // Field Id
        $filterList = Concat($filterList, $this->CODE->AdvancedSearch->toJson(), ","); // Field CODE
        $filterList = Concat($filterList, $this->SERVICE->AdvancedSearch->toJson(), ","); // Field SERVICE
        $filterList = Concat($filterList, $this->UNITS->AdvancedSearch->toJson(), ","); // Field UNITS
        $filterList = Concat($filterList, $this->AMOUNT->AdvancedSearch->toJson(), ","); // Field AMOUNT
        $filterList = Concat($filterList, $this->SERVICE_TYPE->AdvancedSearch->toJson(), ","); // Field SERVICE_TYPE
        $filterList = Concat($filterList, $this->DEPARTMENT->AdvancedSearch->toJson(), ","); // Field DEPARTMENT
        $filterList = Concat($filterList, $this->Created->AdvancedSearch->toJson(), ","); // Field Created
        $filterList = Concat($filterList, $this->CreatedDateTime->AdvancedSearch->toJson(), ","); // Field CreatedDateTime
        $filterList = Concat($filterList, $this->Modified->AdvancedSearch->toJson(), ","); // Field Modified
        $filterList = Concat($filterList, $this->ModifiedDateTime->AdvancedSearch->toJson(), ","); // Field ModifiedDateTime
        $filterList = Concat($filterList, $this->mas_services_billingcol->AdvancedSearch->toJson(), ","); // Field mas_services_billingcol
        $filterList = Concat($filterList, $this->DrShareAmount->AdvancedSearch->toJson(), ","); // Field DrShareAmount
        $filterList = Concat($filterList, $this->HospShareAmount->AdvancedSearch->toJson(), ","); // Field HospShareAmount
        $filterList = Concat($filterList, $this->DrSharePer->AdvancedSearch->toJson(), ","); // Field DrSharePer
        $filterList = Concat($filterList, $this->HospSharePer->AdvancedSearch->toJson(), ","); // Field HospSharePer
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->TestSubCd->AdvancedSearch->toJson(), ","); // Field TestSubCd
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Order->AdvancedSearch->toJson(), ","); // Field Order
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->ResType->AdvancedSearch->toJson(), ","); // Field ResType
        $filterList = Concat($filterList, $this->UnitCD->AdvancedSearch->toJson(), ","); // Field UnitCD
        $filterList = Concat($filterList, $this->RefValue->AdvancedSearch->toJson(), ","); // Field RefValue
        $filterList = Concat($filterList, $this->Sample->AdvancedSearch->toJson(), ","); // Field Sample
        $filterList = Concat($filterList, $this->NoD->AdvancedSearch->toJson(), ","); // Field NoD
        $filterList = Concat($filterList, $this->BillOrder->AdvancedSearch->toJson(), ","); // Field BillOrder
        $filterList = Concat($filterList, $this->Formula->AdvancedSearch->toJson(), ","); // Field Formula
        $filterList = Concat($filterList, $this->Inactive->AdvancedSearch->toJson(), ","); // Field Inactive
        $filterList = Concat($filterList, $this->Outsource->AdvancedSearch->toJson(), ","); // Field Outsource
        $filterList = Concat($filterList, $this->CollSample->AdvancedSearch->toJson(), ","); // Field CollSample
        $filterList = Concat($filterList, $this->TestType->AdvancedSearch->toJson(), ","); // Field TestType
        $filterList = Concat($filterList, $this->NoHeading->AdvancedSearch->toJson(), ","); // Field NoHeading
        $filterList = Concat($filterList, $this->ChemicalCode->AdvancedSearch->toJson(), ","); // Field ChemicalCode
        $filterList = Concat($filterList, $this->ChemicalName->AdvancedSearch->toJson(), ","); // Field ChemicalName
        $filterList = Concat($filterList, $this->Utilaization->AdvancedSearch->toJson(), ","); // Field Utilaization
        $filterList = Concat($filterList, $this->Interpretation->AdvancedSearch->toJson(), ","); // Field Interpretation
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_lab_service_sublistsrch", $filters);
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

        // Field Id
        $this->Id->AdvancedSearch->SearchValue = @$filter["x_Id"];
        $this->Id->AdvancedSearch->SearchOperator = @$filter["z_Id"];
        $this->Id->AdvancedSearch->SearchCondition = @$filter["v_Id"];
        $this->Id->AdvancedSearch->SearchValue2 = @$filter["y_Id"];
        $this->Id->AdvancedSearch->SearchOperator2 = @$filter["w_Id"];
        $this->Id->AdvancedSearch->save();

        // Field CODE
        $this->CODE->AdvancedSearch->SearchValue = @$filter["x_CODE"];
        $this->CODE->AdvancedSearch->SearchOperator = @$filter["z_CODE"];
        $this->CODE->AdvancedSearch->SearchCondition = @$filter["v_CODE"];
        $this->CODE->AdvancedSearch->SearchValue2 = @$filter["y_CODE"];
        $this->CODE->AdvancedSearch->SearchOperator2 = @$filter["w_CODE"];
        $this->CODE->AdvancedSearch->save();

        // Field SERVICE
        $this->SERVICE->AdvancedSearch->SearchValue = @$filter["x_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchOperator = @$filter["z_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchCondition = @$filter["v_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchValue2 = @$filter["y_SERVICE"];
        $this->SERVICE->AdvancedSearch->SearchOperator2 = @$filter["w_SERVICE"];
        $this->SERVICE->AdvancedSearch->save();

        // Field UNITS
        $this->UNITS->AdvancedSearch->SearchValue = @$filter["x_UNITS"];
        $this->UNITS->AdvancedSearch->SearchOperator = @$filter["z_UNITS"];
        $this->UNITS->AdvancedSearch->SearchCondition = @$filter["v_UNITS"];
        $this->UNITS->AdvancedSearch->SearchValue2 = @$filter["y_UNITS"];
        $this->UNITS->AdvancedSearch->SearchOperator2 = @$filter["w_UNITS"];
        $this->UNITS->AdvancedSearch->save();

        // Field AMOUNT
        $this->AMOUNT->AdvancedSearch->SearchValue = @$filter["x_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchOperator = @$filter["z_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchCondition = @$filter["v_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchValue2 = @$filter["y_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->SearchOperator2 = @$filter["w_AMOUNT"];
        $this->AMOUNT->AdvancedSearch->save();

        // Field SERVICE_TYPE
        $this->SERVICE_TYPE->AdvancedSearch->SearchValue = @$filter["x_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchOperator = @$filter["z_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchCondition = @$filter["v_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_SERVICE_TYPE"];
        $this->SERVICE_TYPE->AdvancedSearch->save();

        // Field DEPARTMENT
        $this->DEPARTMENT->AdvancedSearch->SearchValue = @$filter["x_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchOperator = @$filter["z_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchCondition = @$filter["v_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchValue2 = @$filter["y_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->SearchOperator2 = @$filter["w_DEPARTMENT"];
        $this->DEPARTMENT->AdvancedSearch->save();

        // Field Created
        $this->Created->AdvancedSearch->SearchValue = @$filter["x_Created"];
        $this->Created->AdvancedSearch->SearchOperator = @$filter["z_Created"];
        $this->Created->AdvancedSearch->SearchCondition = @$filter["v_Created"];
        $this->Created->AdvancedSearch->SearchValue2 = @$filter["y_Created"];
        $this->Created->AdvancedSearch->SearchOperator2 = @$filter["w_Created"];
        $this->Created->AdvancedSearch->save();

        // Field CreatedDateTime
        $this->CreatedDateTime->AdvancedSearch->SearchValue = @$filter["x_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator = @$filter["z_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchCondition = @$filter["v_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_CreatedDateTime"];
        $this->CreatedDateTime->AdvancedSearch->save();

        // Field Modified
        $this->Modified->AdvancedSearch->SearchValue = @$filter["x_Modified"];
        $this->Modified->AdvancedSearch->SearchOperator = @$filter["z_Modified"];
        $this->Modified->AdvancedSearch->SearchCondition = @$filter["v_Modified"];
        $this->Modified->AdvancedSearch->SearchValue2 = @$filter["y_Modified"];
        $this->Modified->AdvancedSearch->SearchOperator2 = @$filter["w_Modified"];
        $this->Modified->AdvancedSearch->save();

        // Field ModifiedDateTime
        $this->ModifiedDateTime->AdvancedSearch->SearchValue = @$filter["x_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator = @$filter["z_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchCondition = @$filter["v_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ModifiedDateTime"];
        $this->ModifiedDateTime->AdvancedSearch->save();

        // Field mas_services_billingcol
        $this->mas_services_billingcol->AdvancedSearch->SearchValue = @$filter["x_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchOperator = @$filter["z_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchCondition = @$filter["v_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchValue2 = @$filter["y_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->SearchOperator2 = @$filter["w_mas_services_billingcol"];
        $this->mas_services_billingcol->AdvancedSearch->save();

        // Field DrShareAmount
        $this->DrShareAmount->AdvancedSearch->SearchValue = @$filter["x_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator = @$filter["z_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchCondition = @$filter["v_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DrShareAmount"];
        $this->DrShareAmount->AdvancedSearch->save();

        // Field HospShareAmount
        $this->HospShareAmount->AdvancedSearch->SearchValue = @$filter["x_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator = @$filter["z_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchCondition = @$filter["v_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchValue2 = @$filter["y_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->SearchOperator2 = @$filter["w_HospShareAmount"];
        $this->HospShareAmount->AdvancedSearch->save();

        // Field DrSharePer
        $this->DrSharePer->AdvancedSearch->SearchValue = @$filter["x_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchOperator = @$filter["z_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchCondition = @$filter["v_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchValue2 = @$filter["y_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->SearchOperator2 = @$filter["w_DrSharePer"];
        $this->DrSharePer->AdvancedSearch->save();

        // Field HospSharePer
        $this->HospSharePer->AdvancedSearch->SearchValue = @$filter["x_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchOperator = @$filter["z_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchCondition = @$filter["v_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchValue2 = @$filter["y_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->SearchOperator2 = @$filter["w_HospSharePer"];
        $this->HospSharePer->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field TestSubCd
        $this->TestSubCd->AdvancedSearch->SearchValue = @$filter["x_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator = @$filter["z_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchCondition = @$filter["v_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchValue2 = @$filter["y_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->SearchOperator2 = @$filter["w_TestSubCd"];
        $this->TestSubCd->AdvancedSearch->save();

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

        // Field Outsource
        $this->Outsource->AdvancedSearch->SearchValue = @$filter["x_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator = @$filter["z_Outsource"];
        $this->Outsource->AdvancedSearch->SearchCondition = @$filter["v_Outsource"];
        $this->Outsource->AdvancedSearch->SearchValue2 = @$filter["y_Outsource"];
        $this->Outsource->AdvancedSearch->SearchOperator2 = @$filter["w_Outsource"];
        $this->Outsource->AdvancedSearch->save();

        // Field CollSample
        $this->CollSample->AdvancedSearch->SearchValue = @$filter["x_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator = @$filter["z_CollSample"];
        $this->CollSample->AdvancedSearch->SearchCondition = @$filter["v_CollSample"];
        $this->CollSample->AdvancedSearch->SearchValue2 = @$filter["y_CollSample"];
        $this->CollSample->AdvancedSearch->SearchOperator2 = @$filter["w_CollSample"];
        $this->CollSample->AdvancedSearch->save();

        // Field TestType
        $this->TestType->AdvancedSearch->SearchValue = @$filter["x_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator = @$filter["z_TestType"];
        $this->TestType->AdvancedSearch->SearchCondition = @$filter["v_TestType"];
        $this->TestType->AdvancedSearch->SearchValue2 = @$filter["y_TestType"];
        $this->TestType->AdvancedSearch->SearchOperator2 = @$filter["w_TestType"];
        $this->TestType->AdvancedSearch->save();

        // Field NoHeading
        $this->NoHeading->AdvancedSearch->SearchValue = @$filter["x_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator = @$filter["z_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchCondition = @$filter["v_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchValue2 = @$filter["y_NoHeading"];
        $this->NoHeading->AdvancedSearch->SearchOperator2 = @$filter["w_NoHeading"];
        $this->NoHeading->AdvancedSearch->save();

        // Field ChemicalCode
        $this->ChemicalCode->AdvancedSearch->SearchValue = @$filter["x_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchOperator = @$filter["z_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchCondition = @$filter["v_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchValue2 = @$filter["y_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->SearchOperator2 = @$filter["w_ChemicalCode"];
        $this->ChemicalCode->AdvancedSearch->save();

        // Field ChemicalName
        $this->ChemicalName->AdvancedSearch->SearchValue = @$filter["x_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchOperator = @$filter["z_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchCondition = @$filter["v_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchValue2 = @$filter["y_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->SearchOperator2 = @$filter["w_ChemicalName"];
        $this->ChemicalName->AdvancedSearch->save();

        // Field Utilaization
        $this->Utilaization->AdvancedSearch->SearchValue = @$filter["x_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchOperator = @$filter["z_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchCondition = @$filter["v_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchValue2 = @$filter["y_Utilaization"];
        $this->Utilaization->AdvancedSearch->SearchOperator2 = @$filter["w_Utilaization"];
        $this->Utilaization->AdvancedSearch->save();

        // Field Interpretation
        $this->Interpretation->AdvancedSearch->SearchValue = @$filter["x_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchOperator = @$filter["z_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchCondition = @$filter["v_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchValue2 = @$filter["y_Interpretation"];
        $this->Interpretation->AdvancedSearch->SearchOperator2 = @$filter["w_Interpretation"];
        $this->Interpretation->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->CODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SERVICE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SERVICE_TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DEPARTMENT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Created, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Modified, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mas_services_billingcol, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestSubCd, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ResType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UnitCD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RefValue, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Sample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Formula, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Inactive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Outsource, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TestType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoHeading, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChemicalCode, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ChemicalName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Utilaization, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Interpretation, $arKeywords, $type);
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
            $this->updateSort($this->Id); // Id
            $this->updateSort($this->CODE); // CODE
            $this->updateSort($this->SERVICE); // SERVICE
            $this->updateSort($this->UNITS); // UNITS
            $this->updateSort($this->AMOUNT); // AMOUNT
            $this->updateSort($this->SERVICE_TYPE); // SERVICE_TYPE
            $this->updateSort($this->DEPARTMENT); // DEPARTMENT
            $this->updateSort($this->Created); // Created
            $this->updateSort($this->CreatedDateTime); // CreatedDateTime
            $this->updateSort($this->Modified); // Modified
            $this->updateSort($this->ModifiedDateTime); // ModifiedDateTime
            $this->updateSort($this->mas_services_billingcol); // mas_services_billingcol
            $this->updateSort($this->DrShareAmount); // DrShareAmount
            $this->updateSort($this->HospShareAmount); // HospShareAmount
            $this->updateSort($this->DrSharePer); // DrSharePer
            $this->updateSort($this->HospSharePer); // HospSharePer
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->TestSubCd); // TestSubCd
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->Order); // Order
            $this->updateSort($this->ResType); // ResType
            $this->updateSort($this->UnitCD); // UnitCD
            $this->updateSort($this->Sample); // Sample
            $this->updateSort($this->NoD); // NoD
            $this->updateSort($this->BillOrder); // BillOrder
            $this->updateSort($this->Inactive); // Inactive
            $this->updateSort($this->Outsource); // Outsource
            $this->updateSort($this->CollSample); // CollSample
            $this->updateSort($this->TestType); // TestType
            $this->updateSort($this->NoHeading); // NoHeading
            $this->updateSort($this->ChemicalCode); // ChemicalCode
            $this->updateSort($this->ChemicalName); // ChemicalName
            $this->updateSort($this->Utilaization); // Utilaization
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
                $this->Id->setSort("");
                $this->CODE->setSort("");
                $this->SERVICE->setSort("");
                $this->UNITS->setSort("");
                $this->AMOUNT->setSort("");
                $this->SERVICE_TYPE->setSort("");
                $this->DEPARTMENT->setSort("");
                $this->Created->setSort("");
                $this->CreatedDateTime->setSort("");
                $this->Modified->setSort("");
                $this->ModifiedDateTime->setSort("");
                $this->mas_services_billingcol->setSort("");
                $this->DrShareAmount->setSort("");
                $this->HospShareAmount->setSort("");
                $this->DrSharePer->setSort("");
                $this->HospSharePer->setSort("");
                $this->HospID->setSort("");
                $this->TestSubCd->setSort("");
                $this->Method->setSort("");
                $this->Order->setSort("");
                $this->Form->setSort("");
                $this->ResType->setSort("");
                $this->UnitCD->setSort("");
                $this->RefValue->setSort("");
                $this->Sample->setSort("");
                $this->NoD->setSort("");
                $this->BillOrder->setSort("");
                $this->Formula->setSort("");
                $this->Inactive->setSort("");
                $this->Outsource->setSort("");
                $this->CollSample->setSort("");
                $this->TestType->setSort("");
                $this->NoHeading->setSort("");
                $this->ChemicalCode->setSort("");
                $this->ChemicalName->setSort("");
                $this->Utilaization->setSort("");
                $this->Interpretation->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->Id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_lab_service_sublistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_lab_service_sublistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_lab_service_sublist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->Id->setDbValue($row['Id']);
        $this->CODE->setDbValue($row['CODE']);
        $this->SERVICE->setDbValue($row['SERVICE']);
        $this->UNITS->setDbValue($row['UNITS']);
        $this->AMOUNT->setDbValue($row['AMOUNT']);
        $this->SERVICE_TYPE->setDbValue($row['SERVICE_TYPE']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->Created->setDbValue($row['Created']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->Modified->setDbValue($row['Modified']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->mas_services_billingcol->setDbValue($row['mas_services_billingcol']);
        $this->DrShareAmount->setDbValue($row['DrShareAmount']);
        $this->HospShareAmount->setDbValue($row['HospShareAmount']);
        $this->DrSharePer->setDbValue($row['DrSharePer']);
        $this->HospSharePer->setDbValue($row['HospSharePer']);
        $this->HospID->setDbValue($row['HospID']);
        $this->TestSubCd->setDbValue($row['TestSubCd']);
        $this->Method->setDbValue($row['Method']);
        $this->Order->setDbValue($row['Order']);
        $this->Form->setDbValue($row['Form']);
        $this->ResType->setDbValue($row['ResType']);
        $this->UnitCD->setDbValue($row['UnitCD']);
        $this->RefValue->setDbValue($row['RefValue']);
        $this->Sample->setDbValue($row['Sample']);
        $this->NoD->setDbValue($row['NoD']);
        $this->BillOrder->setDbValue($row['BillOrder']);
        $this->Formula->setDbValue($row['Formula']);
        $this->Inactive->setDbValue($row['Inactive']);
        $this->Outsource->setDbValue($row['Outsource']);
        $this->CollSample->setDbValue($row['CollSample']);
        $this->TestType->setDbValue($row['TestType']);
        $this->NoHeading->setDbValue($row['NoHeading']);
        $this->ChemicalCode->setDbValue($row['ChemicalCode']);
        $this->ChemicalName->setDbValue($row['ChemicalName']);
        $this->Utilaization->setDbValue($row['Utilaization']);
        $this->Interpretation->setDbValue($row['Interpretation']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Id'] = null;
        $row['CODE'] = null;
        $row['SERVICE'] = null;
        $row['UNITS'] = null;
        $row['AMOUNT'] = null;
        $row['SERVICE_TYPE'] = null;
        $row['DEPARTMENT'] = null;
        $row['Created'] = null;
        $row['CreatedDateTime'] = null;
        $row['Modified'] = null;
        $row['ModifiedDateTime'] = null;
        $row['mas_services_billingcol'] = null;
        $row['DrShareAmount'] = null;
        $row['HospShareAmount'] = null;
        $row['DrSharePer'] = null;
        $row['HospSharePer'] = null;
        $row['HospID'] = null;
        $row['TestSubCd'] = null;
        $row['Method'] = null;
        $row['Order'] = null;
        $row['Form'] = null;
        $row['ResType'] = null;
        $row['UnitCD'] = null;
        $row['RefValue'] = null;
        $row['Sample'] = null;
        $row['NoD'] = null;
        $row['BillOrder'] = null;
        $row['Formula'] = null;
        $row['Inactive'] = null;
        $row['Outsource'] = null;
        $row['CollSample'] = null;
        $row['TestType'] = null;
        $row['NoHeading'] = null;
        $row['ChemicalCode'] = null;
        $row['ChemicalName'] = null;
        $row['Utilaization'] = null;
        $row['Interpretation'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("Id")) != "") {
            $this->Id->OldValue = $this->getKey("Id"); // Id
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
        if ($this->AMOUNT->FormValue == $this->AMOUNT->CurrentValue && is_numeric(ConvertToFloatString($this->AMOUNT->CurrentValue))) {
            $this->AMOUNT->CurrentValue = ConvertToFloatString($this->AMOUNT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DrShareAmount->FormValue == $this->DrShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DrShareAmount->CurrentValue))) {
            $this->DrShareAmount->CurrentValue = ConvertToFloatString($this->DrShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->HospShareAmount->FormValue == $this->HospShareAmount->CurrentValue && is_numeric(ConvertToFloatString($this->HospShareAmount->CurrentValue))) {
            $this->HospShareAmount->CurrentValue = ConvertToFloatString($this->HospShareAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NoD->FormValue == $this->NoD->CurrentValue && is_numeric(ConvertToFloatString($this->NoD->CurrentValue))) {
            $this->NoD->CurrentValue = ConvertToFloatString($this->NoD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BillOrder->FormValue == $this->BillOrder->CurrentValue && is_numeric(ConvertToFloatString($this->BillOrder->CurrentValue))) {
            $this->BillOrder->CurrentValue = ConvertToFloatString($this->BillOrder->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Id

        // CODE

        // SERVICE

        // UNITS

        // AMOUNT

        // SERVICE_TYPE

        // DEPARTMENT

        // Created

        // CreatedDateTime

        // Modified

        // ModifiedDateTime

        // mas_services_billingcol

        // DrShareAmount

        // HospShareAmount

        // DrSharePer

        // HospSharePer

        // HospID

        // TestSubCd

        // Method

        // Order

        // Form

        // ResType

        // UnitCD

        // RefValue

        // Sample

        // NoD

        // BillOrder

        // Formula

        // Inactive

        // Outsource

        // CollSample

        // TestType

        // NoHeading

        // ChemicalCode

        // ChemicalName

        // Utilaization

        // Interpretation
        if ($this->RowType == ROWTYPE_VIEW) {
            // Id
            $this->Id->ViewValue = $this->Id->CurrentValue;
            $this->Id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->ViewValue = $this->CODE->CurrentValue;
            $this->CODE->ViewCustomAttributes = "";

            // SERVICE
            $this->SERVICE->ViewValue = $this->SERVICE->CurrentValue;
            $this->SERVICE->ViewCustomAttributes = "";

            // UNITS
            $this->UNITS->ViewValue = $this->UNITS->CurrentValue;
            $this->UNITS->ViewValue = FormatNumber($this->UNITS->ViewValue, 0, -2, -2, -2);
            $this->UNITS->ViewCustomAttributes = "";

            // AMOUNT
            $this->AMOUNT->ViewValue = $this->AMOUNT->CurrentValue;
            $this->AMOUNT->ViewValue = FormatNumber($this->AMOUNT->ViewValue, 2, -2, -2, -2);
            $this->AMOUNT->ViewCustomAttributes = "";

            // SERVICE_TYPE
            $this->SERVICE_TYPE->ViewValue = $this->SERVICE_TYPE->CurrentValue;
            $this->SERVICE_TYPE->ViewCustomAttributes = "";

            // DEPARTMENT
            $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
            $this->DEPARTMENT->ViewCustomAttributes = "";

            // Created
            $this->Created->ViewValue = $this->Created->CurrentValue;
            $this->Created->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // Modified
            $this->Modified->ViewValue = $this->Modified->CurrentValue;
            $this->Modified->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->ViewValue = $this->mas_services_billingcol->CurrentValue;
            $this->mas_services_billingcol->ViewCustomAttributes = "";

            // DrShareAmount
            $this->DrShareAmount->ViewValue = $this->DrShareAmount->CurrentValue;
            $this->DrShareAmount->ViewValue = FormatNumber($this->DrShareAmount->ViewValue, 2, -2, -2, -2);
            $this->DrShareAmount->ViewCustomAttributes = "";

            // HospShareAmount
            $this->HospShareAmount->ViewValue = $this->HospShareAmount->CurrentValue;
            $this->HospShareAmount->ViewValue = FormatNumber($this->HospShareAmount->ViewValue, 2, -2, -2, -2);
            $this->HospShareAmount->ViewCustomAttributes = "";

            // DrSharePer
            $this->DrSharePer->ViewValue = $this->DrSharePer->CurrentValue;
            $this->DrSharePer->ViewValue = FormatNumber($this->DrSharePer->ViewValue, 0, -2, -2, -2);
            $this->DrSharePer->ViewCustomAttributes = "";

            // HospSharePer
            $this->HospSharePer->ViewValue = $this->HospSharePer->CurrentValue;
            $this->HospSharePer->ViewValue = FormatNumber($this->HospSharePer->ViewValue, 0, -2, -2, -2);
            $this->HospSharePer->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // TestSubCd
            $this->TestSubCd->ViewValue = $this->TestSubCd->CurrentValue;
            $this->TestSubCd->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

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

            // Outsource
            $this->Outsource->ViewValue = $this->Outsource->CurrentValue;
            $this->Outsource->ViewCustomAttributes = "";

            // CollSample
            $this->CollSample->ViewValue = $this->CollSample->CurrentValue;
            $this->CollSample->ViewCustomAttributes = "";

            // TestType
            $this->TestType->ViewValue = $this->TestType->CurrentValue;
            $this->TestType->ViewCustomAttributes = "";

            // NoHeading
            $this->NoHeading->ViewValue = $this->NoHeading->CurrentValue;
            $this->NoHeading->ViewCustomAttributes = "";

            // ChemicalCode
            $this->ChemicalCode->ViewValue = $this->ChemicalCode->CurrentValue;
            $this->ChemicalCode->ViewCustomAttributes = "";

            // ChemicalName
            $this->ChemicalName->ViewValue = $this->ChemicalName->CurrentValue;
            $this->ChemicalName->ViewCustomAttributes = "";

            // Utilaization
            $this->Utilaization->ViewValue = $this->Utilaization->CurrentValue;
            $this->Utilaization->ViewCustomAttributes = "";

            // Id
            $this->Id->LinkCustomAttributes = "";
            $this->Id->HrefValue = "";
            $this->Id->TooltipValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";
            $this->CODE->TooltipValue = "";

            // SERVICE
            $this->SERVICE->LinkCustomAttributes = "";
            $this->SERVICE->HrefValue = "";
            $this->SERVICE->TooltipValue = "";

            // UNITS
            $this->UNITS->LinkCustomAttributes = "";
            $this->UNITS->HrefValue = "";
            $this->UNITS->TooltipValue = "";

            // AMOUNT
            $this->AMOUNT->LinkCustomAttributes = "";
            $this->AMOUNT->HrefValue = "";
            $this->AMOUNT->TooltipValue = "";

            // SERVICE_TYPE
            $this->SERVICE_TYPE->LinkCustomAttributes = "";
            $this->SERVICE_TYPE->HrefValue = "";
            $this->SERVICE_TYPE->TooltipValue = "";

            // DEPARTMENT
            $this->DEPARTMENT->LinkCustomAttributes = "";
            $this->DEPARTMENT->HrefValue = "";
            $this->DEPARTMENT->TooltipValue = "";

            // Created
            $this->Created->LinkCustomAttributes = "";
            $this->Created->HrefValue = "";
            $this->Created->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // Modified
            $this->Modified->LinkCustomAttributes = "";
            $this->Modified->HrefValue = "";
            $this->Modified->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // mas_services_billingcol
            $this->mas_services_billingcol->LinkCustomAttributes = "";
            $this->mas_services_billingcol->HrefValue = "";
            $this->mas_services_billingcol->TooltipValue = "";

            // DrShareAmount
            $this->DrShareAmount->LinkCustomAttributes = "";
            $this->DrShareAmount->HrefValue = "";
            $this->DrShareAmount->TooltipValue = "";

            // HospShareAmount
            $this->HospShareAmount->LinkCustomAttributes = "";
            $this->HospShareAmount->HrefValue = "";
            $this->HospShareAmount->TooltipValue = "";

            // DrSharePer
            $this->DrSharePer->LinkCustomAttributes = "";
            $this->DrSharePer->HrefValue = "";
            $this->DrSharePer->TooltipValue = "";

            // HospSharePer
            $this->HospSharePer->LinkCustomAttributes = "";
            $this->HospSharePer->HrefValue = "";
            $this->HospSharePer->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // TestSubCd
            $this->TestSubCd->LinkCustomAttributes = "";
            $this->TestSubCd->HrefValue = "";
            $this->TestSubCd->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

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

            // Outsource
            $this->Outsource->LinkCustomAttributes = "";
            $this->Outsource->HrefValue = "";
            $this->Outsource->TooltipValue = "";

            // CollSample
            $this->CollSample->LinkCustomAttributes = "";
            $this->CollSample->HrefValue = "";
            $this->CollSample->TooltipValue = "";

            // TestType
            $this->TestType->LinkCustomAttributes = "";
            $this->TestType->HrefValue = "";
            $this->TestType->TooltipValue = "";

            // NoHeading
            $this->NoHeading->LinkCustomAttributes = "";
            $this->NoHeading->HrefValue = "";
            $this->NoHeading->TooltipValue = "";

            // ChemicalCode
            $this->ChemicalCode->LinkCustomAttributes = "";
            $this->ChemicalCode->HrefValue = "";
            $this->ChemicalCode->TooltipValue = "";

            // ChemicalName
            $this->ChemicalName->LinkCustomAttributes = "";
            $this->ChemicalName->HrefValue = "";
            $this->ChemicalName->TooltipValue = "";

            // Utilaization
            $this->Utilaization->LinkCustomAttributes = "";
            $this->Utilaization->HrefValue = "";
            $this->Utilaization->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_lab_service_sublistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
