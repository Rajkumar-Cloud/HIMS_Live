<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresTradenamesNewList extends PresTradenamesNew
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_tradenames_new';

    // Page object name
    public $PageObjName = "PresTradenamesNewList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fpres_tradenames_newlist";
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

        // Table object (pres_tradenames_new)
        if (!isset($GLOBALS["pres_tradenames_new"]) || get_class($GLOBALS["pres_tradenames_new"]) == PROJECT_NAMESPACE . "pres_tradenames_new") {
            $GLOBALS["pres_tradenames_new"] = &$this;
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
        $this->AddUrl = "PresTradenamesNewAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PresTradenamesNewDelete";
        $this->MultiUpdateUrl = "PresTradenamesNewUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_tradenames_new');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpres_tradenames_newlistsrch";

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
                $doc = new $class(Container("pres_tradenames_new"));
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
            $key .= @$ar['ID'];
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
            $this->ID->Visible = false;
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
        $this->ID->setVisibility();
        $this->Drug_Name->setVisibility();
        $this->Generic_Name->setVisibility();
        $this->Trade_Name->setVisibility();
        $this->PR_CODE->setVisibility();
        $this->Form->setVisibility();
        $this->Strength->setVisibility();
        $this->Unit->setVisibility();
        $this->CONTAINER_TYPE->setVisibility();
        $this->CONTAINER_STRENGTH->setVisibility();
        $this->TypeOfDrug->setVisibility();
        $this->ProductType->setVisibility();
        $this->Generic_Name1->setVisibility();
        $this->Strength1->setVisibility();
        $this->Unit1->setVisibility();
        $this->Generic_Name2->setVisibility();
        $this->Strength2->setVisibility();
        $this->Unit2->setVisibility();
        $this->Generic_Name3->setVisibility();
        $this->Strength3->setVisibility();
        $this->Unit3->setVisibility();
        $this->Generic_Name4->setVisibility();
        $this->Generic_Name5->setVisibility();
        $this->Strength4->setVisibility();
        $this->Strength5->setVisibility();
        $this->Unit4->setVisibility();
        $this->Unit5->setVisibility();
        $this->AlterNative1->setVisibility();
        $this->AlterNative2->setVisibility();
        $this->AlterNative3->setVisibility();
        $this->AlterNative4->setVisibility();
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
            $this->ID->setOldValue($arKeyFlds[0]);
            if (!is_numeric($this->ID->OldValue)) {
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
        $filterList = Concat($filterList, $this->ID->AdvancedSearch->toJson(), ","); // Field ID
        $filterList = Concat($filterList, $this->Drug_Name->AdvancedSearch->toJson(), ","); // Field Drug_Name
        $filterList = Concat($filterList, $this->Generic_Name->AdvancedSearch->toJson(), ","); // Field Generic_Name
        $filterList = Concat($filterList, $this->Trade_Name->AdvancedSearch->toJson(), ","); // Field Trade_Name
        $filterList = Concat($filterList, $this->PR_CODE->AdvancedSearch->toJson(), ","); // Field PR_CODE
        $filterList = Concat($filterList, $this->Form->AdvancedSearch->toJson(), ","); // Field Form
        $filterList = Concat($filterList, $this->Strength->AdvancedSearch->toJson(), ","); // Field Strength
        $filterList = Concat($filterList, $this->Unit->AdvancedSearch->toJson(), ","); // Field Unit
        $filterList = Concat($filterList, $this->CONTAINER_TYPE->AdvancedSearch->toJson(), ","); // Field CONTAINER_TYPE
        $filterList = Concat($filterList, $this->CONTAINER_STRENGTH->AdvancedSearch->toJson(), ","); // Field CONTAINER_STRENGTH
        $filterList = Concat($filterList, $this->TypeOfDrug->AdvancedSearch->toJson(), ","); // Field TypeOfDrug
        $filterList = Concat($filterList, $this->ProductType->AdvancedSearch->toJson(), ","); // Field ProductType
        $filterList = Concat($filterList, $this->Generic_Name1->AdvancedSearch->toJson(), ","); // Field Generic_Name1
        $filterList = Concat($filterList, $this->Strength1->AdvancedSearch->toJson(), ","); // Field Strength1
        $filterList = Concat($filterList, $this->Unit1->AdvancedSearch->toJson(), ","); // Field Unit1
        $filterList = Concat($filterList, $this->Generic_Name2->AdvancedSearch->toJson(), ","); // Field Generic_Name2
        $filterList = Concat($filterList, $this->Strength2->AdvancedSearch->toJson(), ","); // Field Strength2
        $filterList = Concat($filterList, $this->Unit2->AdvancedSearch->toJson(), ","); // Field Unit2
        $filterList = Concat($filterList, $this->Generic_Name3->AdvancedSearch->toJson(), ","); // Field Generic_Name3
        $filterList = Concat($filterList, $this->Strength3->AdvancedSearch->toJson(), ","); // Field Strength3
        $filterList = Concat($filterList, $this->Unit3->AdvancedSearch->toJson(), ","); // Field Unit3
        $filterList = Concat($filterList, $this->Generic_Name4->AdvancedSearch->toJson(), ","); // Field Generic_Name4
        $filterList = Concat($filterList, $this->Generic_Name5->AdvancedSearch->toJson(), ","); // Field Generic_Name5
        $filterList = Concat($filterList, $this->Strength4->AdvancedSearch->toJson(), ","); // Field Strength4
        $filterList = Concat($filterList, $this->Strength5->AdvancedSearch->toJson(), ","); // Field Strength5
        $filterList = Concat($filterList, $this->Unit4->AdvancedSearch->toJson(), ","); // Field Unit4
        $filterList = Concat($filterList, $this->Unit5->AdvancedSearch->toJson(), ","); // Field Unit5
        $filterList = Concat($filterList, $this->AlterNative1->AdvancedSearch->toJson(), ","); // Field AlterNative1
        $filterList = Concat($filterList, $this->AlterNative2->AdvancedSearch->toJson(), ","); // Field AlterNative2
        $filterList = Concat($filterList, $this->AlterNative3->AdvancedSearch->toJson(), ","); // Field AlterNative3
        $filterList = Concat($filterList, $this->AlterNative4->AdvancedSearch->toJson(), ","); // Field AlterNative4
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpres_tradenames_newlistsrch", $filters);
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

        // Field ID
        $this->ID->AdvancedSearch->SearchValue = @$filter["x_ID"];
        $this->ID->AdvancedSearch->SearchOperator = @$filter["z_ID"];
        $this->ID->AdvancedSearch->SearchCondition = @$filter["v_ID"];
        $this->ID->AdvancedSearch->SearchValue2 = @$filter["y_ID"];
        $this->ID->AdvancedSearch->SearchOperator2 = @$filter["w_ID"];
        $this->ID->AdvancedSearch->save();

        // Field Drug_Name
        $this->Drug_Name->AdvancedSearch->SearchValue = @$filter["x_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchOperator = @$filter["z_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchCondition = @$filter["v_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchValue2 = @$filter["y_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Drug_Name"];
        $this->Drug_Name->AdvancedSearch->save();

        // Field Generic_Name
        $this->Generic_Name->AdvancedSearch->SearchValue = @$filter["x_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name"];
        $this->Generic_Name->AdvancedSearch->save();

        // Field Trade_Name
        $this->Trade_Name->AdvancedSearch->SearchValue = @$filter["x_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchOperator = @$filter["z_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchCondition = @$filter["v_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchValue2 = @$filter["y_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->SearchOperator2 = @$filter["w_Trade_Name"];
        $this->Trade_Name->AdvancedSearch->save();

        // Field PR_CODE
        $this->PR_CODE->AdvancedSearch->SearchValue = @$filter["x_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchOperator = @$filter["z_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchCondition = @$filter["v_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchValue2 = @$filter["y_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->SearchOperator2 = @$filter["w_PR_CODE"];
        $this->PR_CODE->AdvancedSearch->save();

        // Field Form
        $this->Form->AdvancedSearch->SearchValue = @$filter["x_Form"];
        $this->Form->AdvancedSearch->SearchOperator = @$filter["z_Form"];
        $this->Form->AdvancedSearch->SearchCondition = @$filter["v_Form"];
        $this->Form->AdvancedSearch->SearchValue2 = @$filter["y_Form"];
        $this->Form->AdvancedSearch->SearchOperator2 = @$filter["w_Form"];
        $this->Form->AdvancedSearch->save();

        // Field Strength
        $this->Strength->AdvancedSearch->SearchValue = @$filter["x_Strength"];
        $this->Strength->AdvancedSearch->SearchOperator = @$filter["z_Strength"];
        $this->Strength->AdvancedSearch->SearchCondition = @$filter["v_Strength"];
        $this->Strength->AdvancedSearch->SearchValue2 = @$filter["y_Strength"];
        $this->Strength->AdvancedSearch->SearchOperator2 = @$filter["w_Strength"];
        $this->Strength->AdvancedSearch->save();

        // Field Unit
        $this->Unit->AdvancedSearch->SearchValue = @$filter["x_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator = @$filter["z_Unit"];
        $this->Unit->AdvancedSearch->SearchCondition = @$filter["v_Unit"];
        $this->Unit->AdvancedSearch->SearchValue2 = @$filter["y_Unit"];
        $this->Unit->AdvancedSearch->SearchOperator2 = @$filter["w_Unit"];
        $this->Unit->AdvancedSearch->save();

        // Field CONTAINER_TYPE
        $this->CONTAINER_TYPE->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_TYPE"];
        $this->CONTAINER_TYPE->AdvancedSearch->save();

        // Field CONTAINER_STRENGTH
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue = @$filter["x_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator = @$filter["z_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchCondition = @$filter["v_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchValue2 = @$filter["y_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->SearchOperator2 = @$filter["w_CONTAINER_STRENGTH"];
        $this->CONTAINER_STRENGTH->AdvancedSearch->save();

        // Field TypeOfDrug
        $this->TypeOfDrug->AdvancedSearch->SearchValue = @$filter["x_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchOperator = @$filter["z_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchCondition = @$filter["v_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfDrug"];
        $this->TypeOfDrug->AdvancedSearch->save();

        // Field ProductType
        $this->ProductType->AdvancedSearch->SearchValue = @$filter["x_ProductType"];
        $this->ProductType->AdvancedSearch->SearchOperator = @$filter["z_ProductType"];
        $this->ProductType->AdvancedSearch->SearchCondition = @$filter["v_ProductType"];
        $this->ProductType->AdvancedSearch->SearchValue2 = @$filter["y_ProductType"];
        $this->ProductType->AdvancedSearch->SearchOperator2 = @$filter["w_ProductType"];
        $this->ProductType->AdvancedSearch->save();

        // Field Generic_Name1
        $this->Generic_Name1->AdvancedSearch->SearchValue = @$filter["x_Generic_Name1"];
        $this->Generic_Name1->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name1"];
        $this->Generic_Name1->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name1"];
        $this->Generic_Name1->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name1"];
        $this->Generic_Name1->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name1"];
        $this->Generic_Name1->AdvancedSearch->save();

        // Field Strength1
        $this->Strength1->AdvancedSearch->SearchValue = @$filter["x_Strength1"];
        $this->Strength1->AdvancedSearch->SearchOperator = @$filter["z_Strength1"];
        $this->Strength1->AdvancedSearch->SearchCondition = @$filter["v_Strength1"];
        $this->Strength1->AdvancedSearch->SearchValue2 = @$filter["y_Strength1"];
        $this->Strength1->AdvancedSearch->SearchOperator2 = @$filter["w_Strength1"];
        $this->Strength1->AdvancedSearch->save();

        // Field Unit1
        $this->Unit1->AdvancedSearch->SearchValue = @$filter["x_Unit1"];
        $this->Unit1->AdvancedSearch->SearchOperator = @$filter["z_Unit1"];
        $this->Unit1->AdvancedSearch->SearchCondition = @$filter["v_Unit1"];
        $this->Unit1->AdvancedSearch->SearchValue2 = @$filter["y_Unit1"];
        $this->Unit1->AdvancedSearch->SearchOperator2 = @$filter["w_Unit1"];
        $this->Unit1->AdvancedSearch->save();

        // Field Generic_Name2
        $this->Generic_Name2->AdvancedSearch->SearchValue = @$filter["x_Generic_Name2"];
        $this->Generic_Name2->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name2"];
        $this->Generic_Name2->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name2"];
        $this->Generic_Name2->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name2"];
        $this->Generic_Name2->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name2"];
        $this->Generic_Name2->AdvancedSearch->save();

        // Field Strength2
        $this->Strength2->AdvancedSearch->SearchValue = @$filter["x_Strength2"];
        $this->Strength2->AdvancedSearch->SearchOperator = @$filter["z_Strength2"];
        $this->Strength2->AdvancedSearch->SearchCondition = @$filter["v_Strength2"];
        $this->Strength2->AdvancedSearch->SearchValue2 = @$filter["y_Strength2"];
        $this->Strength2->AdvancedSearch->SearchOperator2 = @$filter["w_Strength2"];
        $this->Strength2->AdvancedSearch->save();

        // Field Unit2
        $this->Unit2->AdvancedSearch->SearchValue = @$filter["x_Unit2"];
        $this->Unit2->AdvancedSearch->SearchOperator = @$filter["z_Unit2"];
        $this->Unit2->AdvancedSearch->SearchCondition = @$filter["v_Unit2"];
        $this->Unit2->AdvancedSearch->SearchValue2 = @$filter["y_Unit2"];
        $this->Unit2->AdvancedSearch->SearchOperator2 = @$filter["w_Unit2"];
        $this->Unit2->AdvancedSearch->save();

        // Field Generic_Name3
        $this->Generic_Name3->AdvancedSearch->SearchValue = @$filter["x_Generic_Name3"];
        $this->Generic_Name3->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name3"];
        $this->Generic_Name3->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name3"];
        $this->Generic_Name3->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name3"];
        $this->Generic_Name3->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name3"];
        $this->Generic_Name3->AdvancedSearch->save();

        // Field Strength3
        $this->Strength3->AdvancedSearch->SearchValue = @$filter["x_Strength3"];
        $this->Strength3->AdvancedSearch->SearchOperator = @$filter["z_Strength3"];
        $this->Strength3->AdvancedSearch->SearchCondition = @$filter["v_Strength3"];
        $this->Strength3->AdvancedSearch->SearchValue2 = @$filter["y_Strength3"];
        $this->Strength3->AdvancedSearch->SearchOperator2 = @$filter["w_Strength3"];
        $this->Strength3->AdvancedSearch->save();

        // Field Unit3
        $this->Unit3->AdvancedSearch->SearchValue = @$filter["x_Unit3"];
        $this->Unit3->AdvancedSearch->SearchOperator = @$filter["z_Unit3"];
        $this->Unit3->AdvancedSearch->SearchCondition = @$filter["v_Unit3"];
        $this->Unit3->AdvancedSearch->SearchValue2 = @$filter["y_Unit3"];
        $this->Unit3->AdvancedSearch->SearchOperator2 = @$filter["w_Unit3"];
        $this->Unit3->AdvancedSearch->save();

        // Field Generic_Name4
        $this->Generic_Name4->AdvancedSearch->SearchValue = @$filter["x_Generic_Name4"];
        $this->Generic_Name4->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name4"];
        $this->Generic_Name4->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name4"];
        $this->Generic_Name4->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name4"];
        $this->Generic_Name4->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name4"];
        $this->Generic_Name4->AdvancedSearch->save();

        // Field Generic_Name5
        $this->Generic_Name5->AdvancedSearch->SearchValue = @$filter["x_Generic_Name5"];
        $this->Generic_Name5->AdvancedSearch->SearchOperator = @$filter["z_Generic_Name5"];
        $this->Generic_Name5->AdvancedSearch->SearchCondition = @$filter["v_Generic_Name5"];
        $this->Generic_Name5->AdvancedSearch->SearchValue2 = @$filter["y_Generic_Name5"];
        $this->Generic_Name5->AdvancedSearch->SearchOperator2 = @$filter["w_Generic_Name5"];
        $this->Generic_Name5->AdvancedSearch->save();

        // Field Strength4
        $this->Strength4->AdvancedSearch->SearchValue = @$filter["x_Strength4"];
        $this->Strength4->AdvancedSearch->SearchOperator = @$filter["z_Strength4"];
        $this->Strength4->AdvancedSearch->SearchCondition = @$filter["v_Strength4"];
        $this->Strength4->AdvancedSearch->SearchValue2 = @$filter["y_Strength4"];
        $this->Strength4->AdvancedSearch->SearchOperator2 = @$filter["w_Strength4"];
        $this->Strength4->AdvancedSearch->save();

        // Field Strength5
        $this->Strength5->AdvancedSearch->SearchValue = @$filter["x_Strength5"];
        $this->Strength5->AdvancedSearch->SearchOperator = @$filter["z_Strength5"];
        $this->Strength5->AdvancedSearch->SearchCondition = @$filter["v_Strength5"];
        $this->Strength5->AdvancedSearch->SearchValue2 = @$filter["y_Strength5"];
        $this->Strength5->AdvancedSearch->SearchOperator2 = @$filter["w_Strength5"];
        $this->Strength5->AdvancedSearch->save();

        // Field Unit4
        $this->Unit4->AdvancedSearch->SearchValue = @$filter["x_Unit4"];
        $this->Unit4->AdvancedSearch->SearchOperator = @$filter["z_Unit4"];
        $this->Unit4->AdvancedSearch->SearchCondition = @$filter["v_Unit4"];
        $this->Unit4->AdvancedSearch->SearchValue2 = @$filter["y_Unit4"];
        $this->Unit4->AdvancedSearch->SearchOperator2 = @$filter["w_Unit4"];
        $this->Unit4->AdvancedSearch->save();

        // Field Unit5
        $this->Unit5->AdvancedSearch->SearchValue = @$filter["x_Unit5"];
        $this->Unit5->AdvancedSearch->SearchOperator = @$filter["z_Unit5"];
        $this->Unit5->AdvancedSearch->SearchCondition = @$filter["v_Unit5"];
        $this->Unit5->AdvancedSearch->SearchValue2 = @$filter["y_Unit5"];
        $this->Unit5->AdvancedSearch->SearchOperator2 = @$filter["w_Unit5"];
        $this->Unit5->AdvancedSearch->save();

        // Field AlterNative1
        $this->AlterNative1->AdvancedSearch->SearchValue = @$filter["x_AlterNative1"];
        $this->AlterNative1->AdvancedSearch->SearchOperator = @$filter["z_AlterNative1"];
        $this->AlterNative1->AdvancedSearch->SearchCondition = @$filter["v_AlterNative1"];
        $this->AlterNative1->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative1"];
        $this->AlterNative1->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative1"];
        $this->AlterNative1->AdvancedSearch->save();

        // Field AlterNative2
        $this->AlterNative2->AdvancedSearch->SearchValue = @$filter["x_AlterNative2"];
        $this->AlterNative2->AdvancedSearch->SearchOperator = @$filter["z_AlterNative2"];
        $this->AlterNative2->AdvancedSearch->SearchCondition = @$filter["v_AlterNative2"];
        $this->AlterNative2->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative2"];
        $this->AlterNative2->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative2"];
        $this->AlterNative2->AdvancedSearch->save();

        // Field AlterNative3
        $this->AlterNative3->AdvancedSearch->SearchValue = @$filter["x_AlterNative3"];
        $this->AlterNative3->AdvancedSearch->SearchOperator = @$filter["z_AlterNative3"];
        $this->AlterNative3->AdvancedSearch->SearchCondition = @$filter["v_AlterNative3"];
        $this->AlterNative3->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative3"];
        $this->AlterNative3->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative3"];
        $this->AlterNative3->AdvancedSearch->save();

        // Field AlterNative4
        $this->AlterNative4->AdvancedSearch->SearchValue = @$filter["x_AlterNative4"];
        $this->AlterNative4->AdvancedSearch->SearchOperator = @$filter["z_AlterNative4"];
        $this->AlterNative4->AdvancedSearch->SearchCondition = @$filter["v_AlterNative4"];
        $this->AlterNative4->AdvancedSearch->SearchValue2 = @$filter["y_AlterNative4"];
        $this->AlterNative4->AdvancedSearch->SearchOperator2 = @$filter["w_AlterNative4"];
        $this->AlterNative4->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Drug_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Trade_Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PR_CODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Form, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CONTAINER_TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CONTAINER_STRENGTH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeOfDrug, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProductType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generic_Name5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Strength5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Unit5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlterNative1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlterNative2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlterNative3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AlterNative4, $arKeywords, $type);
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
            $this->updateSort($this->ID); // ID
            $this->updateSort($this->Drug_Name); // Drug_Name
            $this->updateSort($this->Generic_Name); // Generic_Name
            $this->updateSort($this->Trade_Name); // Trade_Name
            $this->updateSort($this->PR_CODE); // PR_CODE
            $this->updateSort($this->Form); // Form
            $this->updateSort($this->Strength); // Strength
            $this->updateSort($this->Unit); // Unit
            $this->updateSort($this->CONTAINER_TYPE); // CONTAINER_TYPE
            $this->updateSort($this->CONTAINER_STRENGTH); // CONTAINER_STRENGTH
            $this->updateSort($this->TypeOfDrug); // TypeOfDrug
            $this->updateSort($this->ProductType); // ProductType
            $this->updateSort($this->Generic_Name1); // Generic_Name1
            $this->updateSort($this->Strength1); // Strength1
            $this->updateSort($this->Unit1); // Unit1
            $this->updateSort($this->Generic_Name2); // Generic_Name2
            $this->updateSort($this->Strength2); // Strength2
            $this->updateSort($this->Unit2); // Unit2
            $this->updateSort($this->Generic_Name3); // Generic_Name3
            $this->updateSort($this->Strength3); // Strength3
            $this->updateSort($this->Unit3); // Unit3
            $this->updateSort($this->Generic_Name4); // Generic_Name4
            $this->updateSort($this->Generic_Name5); // Generic_Name5
            $this->updateSort($this->Strength4); // Strength4
            $this->updateSort($this->Strength5); // Strength5
            $this->updateSort($this->Unit4); // Unit4
            $this->updateSort($this->Unit5); // Unit5
            $this->updateSort($this->AlterNative1); // AlterNative1
            $this->updateSort($this->AlterNative2); // AlterNative2
            $this->updateSort($this->AlterNative3); // AlterNative3
            $this->updateSort($this->AlterNative4); // AlterNative4
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
                $this->ID->setSort("");
                $this->Drug_Name->setSort("");
                $this->Generic_Name->setSort("");
                $this->Trade_Name->setSort("");
                $this->PR_CODE->setSort("");
                $this->Form->setSort("");
                $this->Strength->setSort("");
                $this->Unit->setSort("");
                $this->CONTAINER_TYPE->setSort("");
                $this->CONTAINER_STRENGTH->setSort("");
                $this->TypeOfDrug->setSort("");
                $this->ProductType->setSort("");
                $this->Generic_Name1->setSort("");
                $this->Strength1->setSort("");
                $this->Unit1->setSort("");
                $this->Generic_Name2->setSort("");
                $this->Strength2->setSort("");
                $this->Unit2->setSort("");
                $this->Generic_Name3->setSort("");
                $this->Strength3->setSort("");
                $this->Unit3->setSort("");
                $this->Generic_Name4->setSort("");
                $this->Generic_Name5->setSort("");
                $this->Strength4->setSort("");
                $this->Strength5->setSort("");
                $this->Unit4->setSort("");
                $this->Unit5->setSort("");
                $this->AlterNative1->setSort("");
                $this->AlterNative2->setSort("");
                $this->AlterNative3->setSort("");
                $this->AlterNative4->setSort("");
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
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->ID->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpres_tradenames_newlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpres_tradenames_newlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpres_tradenames_newlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->ID->setDbValue($row['ID']);
        $this->Drug_Name->setDbValue($row['Drug_Name']);
        $this->Generic_Name->setDbValue($row['Generic_Name']);
        $this->Trade_Name->setDbValue($row['Trade_Name']);
        $this->PR_CODE->setDbValue($row['PR_CODE']);
        $this->Form->setDbValue($row['Form']);
        $this->Strength->setDbValue($row['Strength']);
        $this->Unit->setDbValue($row['Unit']);
        $this->CONTAINER_TYPE->setDbValue($row['CONTAINER_TYPE']);
        $this->CONTAINER_STRENGTH->setDbValue($row['CONTAINER_STRENGTH']);
        $this->TypeOfDrug->setDbValue($row['TypeOfDrug']);
        $this->ProductType->setDbValue($row['ProductType']);
        $this->Generic_Name1->setDbValue($row['Generic_Name1']);
        $this->Strength1->setDbValue($row['Strength1']);
        $this->Unit1->setDbValue($row['Unit1']);
        $this->Generic_Name2->setDbValue($row['Generic_Name2']);
        $this->Strength2->setDbValue($row['Strength2']);
        $this->Unit2->setDbValue($row['Unit2']);
        $this->Generic_Name3->setDbValue($row['Generic_Name3']);
        $this->Strength3->setDbValue($row['Strength3']);
        $this->Unit3->setDbValue($row['Unit3']);
        $this->Generic_Name4->setDbValue($row['Generic_Name4']);
        $this->Generic_Name5->setDbValue($row['Generic_Name5']);
        $this->Strength4->setDbValue($row['Strength4']);
        $this->Strength5->setDbValue($row['Strength5']);
        $this->Unit4->setDbValue($row['Unit4']);
        $this->Unit5->setDbValue($row['Unit5']);
        $this->AlterNative1->setDbValue($row['AlterNative1']);
        $this->AlterNative2->setDbValue($row['AlterNative2']);
        $this->AlterNative3->setDbValue($row['AlterNative3']);
        $this->AlterNative4->setDbValue($row['AlterNative4']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['ID'] = null;
        $row['Drug_Name'] = null;
        $row['Generic_Name'] = null;
        $row['Trade_Name'] = null;
        $row['PR_CODE'] = null;
        $row['Form'] = null;
        $row['Strength'] = null;
        $row['Unit'] = null;
        $row['CONTAINER_TYPE'] = null;
        $row['CONTAINER_STRENGTH'] = null;
        $row['TypeOfDrug'] = null;
        $row['ProductType'] = null;
        $row['Generic_Name1'] = null;
        $row['Strength1'] = null;
        $row['Unit1'] = null;
        $row['Generic_Name2'] = null;
        $row['Strength2'] = null;
        $row['Unit2'] = null;
        $row['Generic_Name3'] = null;
        $row['Strength3'] = null;
        $row['Unit3'] = null;
        $row['Generic_Name4'] = null;
        $row['Generic_Name5'] = null;
        $row['Strength4'] = null;
        $row['Strength5'] = null;
        $row['Unit4'] = null;
        $row['Unit5'] = null;
        $row['AlterNative1'] = null;
        $row['AlterNative2'] = null;
        $row['AlterNative3'] = null;
        $row['AlterNative4'] = null;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("ID")) != "") {
            $this->ID->OldValue = $this->getKey("ID"); // ID
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

        // ID

        // Drug_Name

        // Generic_Name

        // Trade_Name

        // PR_CODE

        // Form

        // Strength

        // Unit

        // CONTAINER_TYPE

        // CONTAINER_STRENGTH

        // TypeOfDrug

        // ProductType

        // Generic_Name1

        // Strength1

        // Unit1

        // Generic_Name2

        // Strength2

        // Unit2

        // Generic_Name3

        // Strength3

        // Unit3

        // Generic_Name4

        // Generic_Name5

        // Strength4

        // Strength5

        // Unit4

        // Unit5

        // AlterNative1

        // AlterNative2

        // AlterNative3

        // AlterNative4
        if ($this->RowType == ROWTYPE_VIEW) {
            // ID
            $this->ID->ViewValue = $this->ID->CurrentValue;
            $this->ID->ViewCustomAttributes = "";

            // Drug_Name
            $this->Drug_Name->ViewValue = $this->Drug_Name->CurrentValue;
            $this->Drug_Name->ViewCustomAttributes = "";

            // Generic_Name
            $this->Generic_Name->ViewValue = $this->Generic_Name->CurrentValue;
            $this->Generic_Name->ViewCustomAttributes = "";

            // Trade_Name
            $this->Trade_Name->ViewValue = $this->Trade_Name->CurrentValue;
            $this->Trade_Name->ViewCustomAttributes = "";

            // PR_CODE
            $this->PR_CODE->ViewValue = $this->PR_CODE->CurrentValue;
            $this->PR_CODE->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewCustomAttributes = "";

            // Unit
            $this->Unit->ViewValue = $this->Unit->CurrentValue;
            $this->Unit->ViewCustomAttributes = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->ViewValue = $this->CONTAINER_TYPE->CurrentValue;
            $this->CONTAINER_TYPE->ViewCustomAttributes = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->ViewValue = $this->CONTAINER_STRENGTH->CurrentValue;
            $this->CONTAINER_STRENGTH->ViewCustomAttributes = "";

            // TypeOfDrug
            $this->TypeOfDrug->ViewValue = $this->TypeOfDrug->CurrentValue;
            $this->TypeOfDrug->ViewCustomAttributes = "";

            // ProductType
            $this->ProductType->ViewValue = $this->ProductType->CurrentValue;
            $this->ProductType->ViewCustomAttributes = "";

            // Generic_Name1
            $this->Generic_Name1->ViewValue = $this->Generic_Name1->CurrentValue;
            $this->Generic_Name1->ViewCustomAttributes = "";

            // Strength1
            $this->Strength1->ViewValue = $this->Strength1->CurrentValue;
            $this->Strength1->ViewCustomAttributes = "";

            // Unit1
            $this->Unit1->ViewValue = $this->Unit1->CurrentValue;
            $this->Unit1->ViewCustomAttributes = "";

            // Generic_Name2
            $this->Generic_Name2->ViewValue = $this->Generic_Name2->CurrentValue;
            $this->Generic_Name2->ViewCustomAttributes = "";

            // Strength2
            $this->Strength2->ViewValue = $this->Strength2->CurrentValue;
            $this->Strength2->ViewCustomAttributes = "";

            // Unit2
            $this->Unit2->ViewValue = $this->Unit2->CurrentValue;
            $this->Unit2->ViewCustomAttributes = "";

            // Generic_Name3
            $this->Generic_Name3->ViewValue = $this->Generic_Name3->CurrentValue;
            $this->Generic_Name3->ViewCustomAttributes = "";

            // Strength3
            $this->Strength3->ViewValue = $this->Strength3->CurrentValue;
            $this->Strength3->ViewCustomAttributes = "";

            // Unit3
            $this->Unit3->ViewValue = $this->Unit3->CurrentValue;
            $this->Unit3->ViewCustomAttributes = "";

            // Generic_Name4
            $this->Generic_Name4->ViewValue = $this->Generic_Name4->CurrentValue;
            $this->Generic_Name4->ViewCustomAttributes = "";

            // Generic_Name5
            $this->Generic_Name5->ViewValue = $this->Generic_Name5->CurrentValue;
            $this->Generic_Name5->ViewCustomAttributes = "";

            // Strength4
            $this->Strength4->ViewValue = $this->Strength4->CurrentValue;
            $this->Strength4->ViewCustomAttributes = "";

            // Strength5
            $this->Strength5->ViewValue = $this->Strength5->CurrentValue;
            $this->Strength5->ViewCustomAttributes = "";

            // Unit4
            $this->Unit4->ViewValue = $this->Unit4->CurrentValue;
            $this->Unit4->ViewCustomAttributes = "";

            // Unit5
            $this->Unit5->ViewValue = $this->Unit5->CurrentValue;
            $this->Unit5->ViewCustomAttributes = "";

            // AlterNative1
            $this->AlterNative1->ViewValue = $this->AlterNative1->CurrentValue;
            $this->AlterNative1->ViewCustomAttributes = "";

            // AlterNative2
            $this->AlterNative2->ViewValue = $this->AlterNative2->CurrentValue;
            $this->AlterNative2->ViewCustomAttributes = "";

            // AlterNative3
            $this->AlterNative3->ViewValue = $this->AlterNative3->CurrentValue;
            $this->AlterNative3->ViewCustomAttributes = "";

            // AlterNative4
            $this->AlterNative4->ViewValue = $this->AlterNative4->CurrentValue;
            $this->AlterNative4->ViewCustomAttributes = "";

            // ID
            $this->ID->LinkCustomAttributes = "";
            $this->ID->HrefValue = "";
            $this->ID->TooltipValue = "";

            // Drug_Name
            $this->Drug_Name->LinkCustomAttributes = "";
            $this->Drug_Name->HrefValue = "";
            $this->Drug_Name->TooltipValue = "";

            // Generic_Name
            $this->Generic_Name->LinkCustomAttributes = "";
            $this->Generic_Name->HrefValue = "";
            $this->Generic_Name->TooltipValue = "";

            // Trade_Name
            $this->Trade_Name->LinkCustomAttributes = "";
            $this->Trade_Name->HrefValue = "";
            $this->Trade_Name->TooltipValue = "";

            // PR_CODE
            $this->PR_CODE->LinkCustomAttributes = "";
            $this->PR_CODE->HrefValue = "";
            $this->PR_CODE->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // Unit
            $this->Unit->LinkCustomAttributes = "";
            $this->Unit->HrefValue = "";
            $this->Unit->TooltipValue = "";

            // CONTAINER_TYPE
            $this->CONTAINER_TYPE->LinkCustomAttributes = "";
            $this->CONTAINER_TYPE->HrefValue = "";
            $this->CONTAINER_TYPE->TooltipValue = "";

            // CONTAINER_STRENGTH
            $this->CONTAINER_STRENGTH->LinkCustomAttributes = "";
            $this->CONTAINER_STRENGTH->HrefValue = "";
            $this->CONTAINER_STRENGTH->TooltipValue = "";

            // TypeOfDrug
            $this->TypeOfDrug->LinkCustomAttributes = "";
            $this->TypeOfDrug->HrefValue = "";
            $this->TypeOfDrug->TooltipValue = "";

            // ProductType
            $this->ProductType->LinkCustomAttributes = "";
            $this->ProductType->HrefValue = "";
            $this->ProductType->TooltipValue = "";

            // Generic_Name1
            $this->Generic_Name1->LinkCustomAttributes = "";
            $this->Generic_Name1->HrefValue = "";
            $this->Generic_Name1->TooltipValue = "";

            // Strength1
            $this->Strength1->LinkCustomAttributes = "";
            $this->Strength1->HrefValue = "";
            $this->Strength1->TooltipValue = "";

            // Unit1
            $this->Unit1->LinkCustomAttributes = "";
            $this->Unit1->HrefValue = "";
            $this->Unit1->TooltipValue = "";

            // Generic_Name2
            $this->Generic_Name2->LinkCustomAttributes = "";
            $this->Generic_Name2->HrefValue = "";
            $this->Generic_Name2->TooltipValue = "";

            // Strength2
            $this->Strength2->LinkCustomAttributes = "";
            $this->Strength2->HrefValue = "";
            $this->Strength2->TooltipValue = "";

            // Unit2
            $this->Unit2->LinkCustomAttributes = "";
            $this->Unit2->HrefValue = "";
            $this->Unit2->TooltipValue = "";

            // Generic_Name3
            $this->Generic_Name3->LinkCustomAttributes = "";
            $this->Generic_Name3->HrefValue = "";
            $this->Generic_Name3->TooltipValue = "";

            // Strength3
            $this->Strength3->LinkCustomAttributes = "";
            $this->Strength3->HrefValue = "";
            $this->Strength3->TooltipValue = "";

            // Unit3
            $this->Unit3->LinkCustomAttributes = "";
            $this->Unit3->HrefValue = "";
            $this->Unit3->TooltipValue = "";

            // Generic_Name4
            $this->Generic_Name4->LinkCustomAttributes = "";
            $this->Generic_Name4->HrefValue = "";
            $this->Generic_Name4->TooltipValue = "";

            // Generic_Name5
            $this->Generic_Name5->LinkCustomAttributes = "";
            $this->Generic_Name5->HrefValue = "";
            $this->Generic_Name5->TooltipValue = "";

            // Strength4
            $this->Strength4->LinkCustomAttributes = "";
            $this->Strength4->HrefValue = "";
            $this->Strength4->TooltipValue = "";

            // Strength5
            $this->Strength5->LinkCustomAttributes = "";
            $this->Strength5->HrefValue = "";
            $this->Strength5->TooltipValue = "";

            // Unit4
            $this->Unit4->LinkCustomAttributes = "";
            $this->Unit4->HrefValue = "";
            $this->Unit4->TooltipValue = "";

            // Unit5
            $this->Unit5->LinkCustomAttributes = "";
            $this->Unit5->HrefValue = "";
            $this->Unit5->TooltipValue = "";

            // AlterNative1
            $this->AlterNative1->LinkCustomAttributes = "";
            $this->AlterNative1->HrefValue = "";
            $this->AlterNative1->TooltipValue = "";

            // AlterNative2
            $this->AlterNative2->LinkCustomAttributes = "";
            $this->AlterNative2->HrefValue = "";
            $this->AlterNative2->TooltipValue = "";

            // AlterNative3
            $this->AlterNative3->LinkCustomAttributes = "";
            $this->AlterNative3->HrefValue = "";
            $this->AlterNative3->TooltipValue = "";

            // AlterNative4
            $this->AlterNative4->LinkCustomAttributes = "";
            $this->AlterNative4->HrefValue = "";
            $this->AlterNative4->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpres_tradenames_newlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
