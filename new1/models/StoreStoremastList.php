<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreStoremastList extends StoreStoremast
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_storemast';

    // Page object name
    public $PageObjName = "StoreStoremastList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fstore_storemastlist";
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

        // Table object (store_storemast)
        if (!isset($GLOBALS["store_storemast"]) || get_class($GLOBALS["store_storemast"]) == PROJECT_NAMESPACE . "store_storemast") {
            $GLOBALS["store_storemast"] = &$this;
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
        $this->AddUrl = "StoreStoremastAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "StoreStoremastDelete";
        $this->MultiUpdateUrl = "StoreStoremastUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_storemast');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fstore_storemastlistsrch";

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
                $doc = new $class(Container("store_storemast"));
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
        $this->BRCODE->setVisibility();
        $this->PRC->setVisibility();
        $this->TYPE->setVisibility();
        $this->DES->setVisibility();
        $this->UM->setVisibility();
        $this->RT->setVisibility();
        $this->UR->setVisibility();
        $this->TAXP->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->MRP->setVisibility();
        $this->EXPDT->setVisibility();
        $this->SALQTY->setVisibility();
        $this->LASTPURDT->setVisibility();
        $this->LASTSUPP->setVisibility();
        $this->GENNAME->setVisibility();
        $this->LASTISSDT->setVisibility();
        $this->CREATEDDT->setVisibility();
        $this->OPPRC->setVisibility();
        $this->RESTRICT->setVisibility();
        $this->BAWAPRC->setVisibility();
        $this->STAXPER->setVisibility();
        $this->TAXTYPE->setVisibility();
        $this->OLDTAXP->setVisibility();
        $this->TAXUPD->setVisibility();
        $this->PACKAGE->setVisibility();
        $this->NEWRT->setVisibility();
        $this->NEWMRP->setVisibility();
        $this->NEWUR->setVisibility();
        $this->STATUS->setVisibility();
        $this->RETNQTY->setVisibility();
        $this->KEMODISC->setVisibility();
        $this->PATSALE->setVisibility();
        $this->ORGAN->setVisibility();
        $this->OLDRQ->setVisibility();
        $this->DRID->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->COMBCODE->setVisibility();
        $this->GENCODE->setVisibility();
        $this->STRENGTH->setVisibility();
        $this->UNIT->setVisibility();
        $this->FORMULARY->setVisibility();
        $this->STOCK->setVisibility();
        $this->RACKNO->setVisibility();
        $this->SUPPNAME->setVisibility();
        $this->COMBNAME->setVisibility();
        $this->GENERICNAME->setVisibility();
        $this->REMARK->setVisibility();
        $this->TEMP->setVisibility();
        $this->PACKING->setVisibility();
        $this->PhysQty->setVisibility();
        $this->LedQty->setVisibility();
        $this->id->setVisibility();
        $this->PurValue->setVisibility();
        $this->PSGST->setVisibility();
        $this->PCGST->setVisibility();
        $this->SaleValue->setVisibility();
        $this->SSGST->setVisibility();
        $this->SCGST->setVisibility();
        $this->SaleRate->setVisibility();
        $this->HospID->setVisibility();
        $this->BRNAME->setVisibility();
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
        $filterList = Concat($filterList, $this->BRCODE->AdvancedSearch->toJson(), ","); // Field BRCODE
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->TYPE->AdvancedSearch->toJson(), ","); // Field TYPE
        $filterList = Concat($filterList, $this->DES->AdvancedSearch->toJson(), ","); // Field DES
        $filterList = Concat($filterList, $this->UM->AdvancedSearch->toJson(), ","); // Field UM
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
        $filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
        $filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
        $filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
        $filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
        $filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
        $filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
        $filterList = Concat($filterList, $this->SALQTY->AdvancedSearch->toJson(), ","); // Field SALQTY
        $filterList = Concat($filterList, $this->LASTPURDT->AdvancedSearch->toJson(), ","); // Field LASTPURDT
        $filterList = Concat($filterList, $this->LASTSUPP->AdvancedSearch->toJson(), ","); // Field LASTSUPP
        $filterList = Concat($filterList, $this->GENNAME->AdvancedSearch->toJson(), ","); // Field GENNAME
        $filterList = Concat($filterList, $this->LASTISSDT->AdvancedSearch->toJson(), ","); // Field LASTISSDT
        $filterList = Concat($filterList, $this->CREATEDDT->AdvancedSearch->toJson(), ","); // Field CREATEDDT
        $filterList = Concat($filterList, $this->OPPRC->AdvancedSearch->toJson(), ","); // Field OPPRC
        $filterList = Concat($filterList, $this->RESTRICT->AdvancedSearch->toJson(), ","); // Field RESTRICT
        $filterList = Concat($filterList, $this->BAWAPRC->AdvancedSearch->toJson(), ","); // Field BAWAPRC
        $filterList = Concat($filterList, $this->STAXPER->AdvancedSearch->toJson(), ","); // Field STAXPER
        $filterList = Concat($filterList, $this->TAXTYPE->AdvancedSearch->toJson(), ","); // Field TAXTYPE
        $filterList = Concat($filterList, $this->OLDTAXP->AdvancedSearch->toJson(), ","); // Field OLDTAXP
        $filterList = Concat($filterList, $this->TAXUPD->AdvancedSearch->toJson(), ","); // Field TAXUPD
        $filterList = Concat($filterList, $this->PACKAGE->AdvancedSearch->toJson(), ","); // Field PACKAGE
        $filterList = Concat($filterList, $this->NEWRT->AdvancedSearch->toJson(), ","); // Field NEWRT
        $filterList = Concat($filterList, $this->NEWMRP->AdvancedSearch->toJson(), ","); // Field NEWMRP
        $filterList = Concat($filterList, $this->NEWUR->AdvancedSearch->toJson(), ","); // Field NEWUR
        $filterList = Concat($filterList, $this->STATUS->AdvancedSearch->toJson(), ","); // Field STATUS
        $filterList = Concat($filterList, $this->RETNQTY->AdvancedSearch->toJson(), ","); // Field RETNQTY
        $filterList = Concat($filterList, $this->KEMODISC->AdvancedSearch->toJson(), ","); // Field KEMODISC
        $filterList = Concat($filterList, $this->PATSALE->AdvancedSearch->toJson(), ","); // Field PATSALE
        $filterList = Concat($filterList, $this->ORGAN->AdvancedSearch->toJson(), ","); // Field ORGAN
        $filterList = Concat($filterList, $this->OLDRQ->AdvancedSearch->toJson(), ","); // Field OLDRQ
        $filterList = Concat($filterList, $this->DRID->AdvancedSearch->toJson(), ","); // Field DRID
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->COMBCODE->AdvancedSearch->toJson(), ","); // Field COMBCODE
        $filterList = Concat($filterList, $this->GENCODE->AdvancedSearch->toJson(), ","); // Field GENCODE
        $filterList = Concat($filterList, $this->STRENGTH->AdvancedSearch->toJson(), ","); // Field STRENGTH
        $filterList = Concat($filterList, $this->UNIT->AdvancedSearch->toJson(), ","); // Field UNIT
        $filterList = Concat($filterList, $this->FORMULARY->AdvancedSearch->toJson(), ","); // Field FORMULARY
        $filterList = Concat($filterList, $this->STOCK->AdvancedSearch->toJson(), ","); // Field STOCK
        $filterList = Concat($filterList, $this->RACKNO->AdvancedSearch->toJson(), ","); // Field RACKNO
        $filterList = Concat($filterList, $this->SUPPNAME->AdvancedSearch->toJson(), ","); // Field SUPPNAME
        $filterList = Concat($filterList, $this->COMBNAME->AdvancedSearch->toJson(), ","); // Field COMBNAME
        $filterList = Concat($filterList, $this->GENERICNAME->AdvancedSearch->toJson(), ","); // Field GENERICNAME
        $filterList = Concat($filterList, $this->REMARK->AdvancedSearch->toJson(), ","); // Field REMARK
        $filterList = Concat($filterList, $this->TEMP->AdvancedSearch->toJson(), ","); // Field TEMP
        $filterList = Concat($filterList, $this->PACKING->AdvancedSearch->toJson(), ","); // Field PACKING
        $filterList = Concat($filterList, $this->PhysQty->AdvancedSearch->toJson(), ","); // Field PhysQty
        $filterList = Concat($filterList, $this->LedQty->AdvancedSearch->toJson(), ","); // Field LedQty
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PurValue->AdvancedSearch->toJson(), ","); // Field PurValue
        $filterList = Concat($filterList, $this->PSGST->AdvancedSearch->toJson(), ","); // Field PSGST
        $filterList = Concat($filterList, $this->PCGST->AdvancedSearch->toJson(), ","); // Field PCGST
        $filterList = Concat($filterList, $this->SaleValue->AdvancedSearch->toJson(), ","); // Field SaleValue
        $filterList = Concat($filterList, $this->SSGST->AdvancedSearch->toJson(), ","); // Field SSGST
        $filterList = Concat($filterList, $this->SCGST->AdvancedSearch->toJson(), ","); // Field SCGST
        $filterList = Concat($filterList, $this->SaleRate->AdvancedSearch->toJson(), ","); // Field SaleRate
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
        $filterList = Concat($filterList, $this->BRNAME->AdvancedSearch->toJson(), ","); // Field BRNAME
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fstore_storemastlistsrch", $filters);
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

        // Field BRCODE
        $this->BRCODE->AdvancedSearch->SearchValue = @$filter["x_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator = @$filter["z_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchCondition = @$filter["v_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchValue2 = @$filter["y_BRCODE"];
        $this->BRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_BRCODE"];
        $this->BRCODE->AdvancedSearch->save();

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

        // Field TYPE
        $this->TYPE->AdvancedSearch->SearchValue = @$filter["x_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator = @$filter["z_TYPE"];
        $this->TYPE->AdvancedSearch->SearchCondition = @$filter["v_TYPE"];
        $this->TYPE->AdvancedSearch->SearchValue2 = @$filter["y_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TYPE"];
        $this->TYPE->AdvancedSearch->save();

        // Field DES
        $this->DES->AdvancedSearch->SearchValue = @$filter["x_DES"];
        $this->DES->AdvancedSearch->SearchOperator = @$filter["z_DES"];
        $this->DES->AdvancedSearch->SearchCondition = @$filter["v_DES"];
        $this->DES->AdvancedSearch->SearchValue2 = @$filter["y_DES"];
        $this->DES->AdvancedSearch->SearchOperator2 = @$filter["w_DES"];
        $this->DES->AdvancedSearch->save();

        // Field UM
        $this->UM->AdvancedSearch->SearchValue = @$filter["x_UM"];
        $this->UM->AdvancedSearch->SearchOperator = @$filter["z_UM"];
        $this->UM->AdvancedSearch->SearchCondition = @$filter["v_UM"];
        $this->UM->AdvancedSearch->SearchValue2 = @$filter["y_UM"];
        $this->UM->AdvancedSearch->SearchOperator2 = @$filter["w_UM"];
        $this->UM->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field UR
        $this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
        $this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
        $this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
        $this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
        $this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
        $this->UR->AdvancedSearch->save();

        // Field TAXP
        $this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
        $this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
        $this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
        $this->TAXP->AdvancedSearch->save();

        // Field BATCHNO
        $this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->save();

        // Field OQ
        $this->OQ->AdvancedSearch->SearchValue = @$filter["x_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator = @$filter["z_OQ"];
        $this->OQ->AdvancedSearch->SearchCondition = @$filter["v_OQ"];
        $this->OQ->AdvancedSearch->SearchValue2 = @$filter["y_OQ"];
        $this->OQ->AdvancedSearch->SearchOperator2 = @$filter["w_OQ"];
        $this->OQ->AdvancedSearch->save();

        // Field RQ
        $this->RQ->AdvancedSearch->SearchValue = @$filter["x_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator = @$filter["z_RQ"];
        $this->RQ->AdvancedSearch->SearchCondition = @$filter["v_RQ"];
        $this->RQ->AdvancedSearch->SearchValue2 = @$filter["y_RQ"];
        $this->RQ->AdvancedSearch->SearchOperator2 = @$filter["w_RQ"];
        $this->RQ->AdvancedSearch->save();

        // Field MRQ
        $this->MRQ->AdvancedSearch->SearchValue = @$filter["x_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator = @$filter["z_MRQ"];
        $this->MRQ->AdvancedSearch->SearchCondition = @$filter["v_MRQ"];
        $this->MRQ->AdvancedSearch->SearchValue2 = @$filter["y_MRQ"];
        $this->MRQ->AdvancedSearch->SearchOperator2 = @$filter["w_MRQ"];
        $this->MRQ->AdvancedSearch->save();

        // Field IQ
        $this->IQ->AdvancedSearch->SearchValue = @$filter["x_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator = @$filter["z_IQ"];
        $this->IQ->AdvancedSearch->SearchCondition = @$filter["v_IQ"];
        $this->IQ->AdvancedSearch->SearchValue2 = @$filter["y_IQ"];
        $this->IQ->AdvancedSearch->SearchOperator2 = @$filter["w_IQ"];
        $this->IQ->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field EXPDT
        $this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
        $this->EXPDT->AdvancedSearch->save();

        // Field SALQTY
        $this->SALQTY->AdvancedSearch->SearchValue = @$filter["x_SALQTY"];
        $this->SALQTY->AdvancedSearch->SearchOperator = @$filter["z_SALQTY"];
        $this->SALQTY->AdvancedSearch->SearchCondition = @$filter["v_SALQTY"];
        $this->SALQTY->AdvancedSearch->SearchValue2 = @$filter["y_SALQTY"];
        $this->SALQTY->AdvancedSearch->SearchOperator2 = @$filter["w_SALQTY"];
        $this->SALQTY->AdvancedSearch->save();

        // Field LASTPURDT
        $this->LASTPURDT->AdvancedSearch->SearchValue = @$filter["x_LASTPURDT"];
        $this->LASTPURDT->AdvancedSearch->SearchOperator = @$filter["z_LASTPURDT"];
        $this->LASTPURDT->AdvancedSearch->SearchCondition = @$filter["v_LASTPURDT"];
        $this->LASTPURDT->AdvancedSearch->SearchValue2 = @$filter["y_LASTPURDT"];
        $this->LASTPURDT->AdvancedSearch->SearchOperator2 = @$filter["w_LASTPURDT"];
        $this->LASTPURDT->AdvancedSearch->save();

        // Field LASTSUPP
        $this->LASTSUPP->AdvancedSearch->SearchValue = @$filter["x_LASTSUPP"];
        $this->LASTSUPP->AdvancedSearch->SearchOperator = @$filter["z_LASTSUPP"];
        $this->LASTSUPP->AdvancedSearch->SearchCondition = @$filter["v_LASTSUPP"];
        $this->LASTSUPP->AdvancedSearch->SearchValue2 = @$filter["y_LASTSUPP"];
        $this->LASTSUPP->AdvancedSearch->SearchOperator2 = @$filter["w_LASTSUPP"];
        $this->LASTSUPP->AdvancedSearch->save();

        // Field GENNAME
        $this->GENNAME->AdvancedSearch->SearchValue = @$filter["x_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator = @$filter["z_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchCondition = @$filter["v_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENNAME"];
        $this->GENNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENNAME"];
        $this->GENNAME->AdvancedSearch->save();

        // Field LASTISSDT
        $this->LASTISSDT->AdvancedSearch->SearchValue = @$filter["x_LASTISSDT"];
        $this->LASTISSDT->AdvancedSearch->SearchOperator = @$filter["z_LASTISSDT"];
        $this->LASTISSDT->AdvancedSearch->SearchCondition = @$filter["v_LASTISSDT"];
        $this->LASTISSDT->AdvancedSearch->SearchValue2 = @$filter["y_LASTISSDT"];
        $this->LASTISSDT->AdvancedSearch->SearchOperator2 = @$filter["w_LASTISSDT"];
        $this->LASTISSDT->AdvancedSearch->save();

        // Field CREATEDDT
        $this->CREATEDDT->AdvancedSearch->SearchValue = @$filter["x_CREATEDDT"];
        $this->CREATEDDT->AdvancedSearch->SearchOperator = @$filter["z_CREATEDDT"];
        $this->CREATEDDT->AdvancedSearch->SearchCondition = @$filter["v_CREATEDDT"];
        $this->CREATEDDT->AdvancedSearch->SearchValue2 = @$filter["y_CREATEDDT"];
        $this->CREATEDDT->AdvancedSearch->SearchOperator2 = @$filter["w_CREATEDDT"];
        $this->CREATEDDT->AdvancedSearch->save();

        // Field OPPRC
        $this->OPPRC->AdvancedSearch->SearchValue = @$filter["x_OPPRC"];
        $this->OPPRC->AdvancedSearch->SearchOperator = @$filter["z_OPPRC"];
        $this->OPPRC->AdvancedSearch->SearchCondition = @$filter["v_OPPRC"];
        $this->OPPRC->AdvancedSearch->SearchValue2 = @$filter["y_OPPRC"];
        $this->OPPRC->AdvancedSearch->SearchOperator2 = @$filter["w_OPPRC"];
        $this->OPPRC->AdvancedSearch->save();

        // Field RESTRICT
        $this->RESTRICT->AdvancedSearch->SearchValue = @$filter["x_RESTRICT"];
        $this->RESTRICT->AdvancedSearch->SearchOperator = @$filter["z_RESTRICT"];
        $this->RESTRICT->AdvancedSearch->SearchCondition = @$filter["v_RESTRICT"];
        $this->RESTRICT->AdvancedSearch->SearchValue2 = @$filter["y_RESTRICT"];
        $this->RESTRICT->AdvancedSearch->SearchOperator2 = @$filter["w_RESTRICT"];
        $this->RESTRICT->AdvancedSearch->save();

        // Field BAWAPRC
        $this->BAWAPRC->AdvancedSearch->SearchValue = @$filter["x_BAWAPRC"];
        $this->BAWAPRC->AdvancedSearch->SearchOperator = @$filter["z_BAWAPRC"];
        $this->BAWAPRC->AdvancedSearch->SearchCondition = @$filter["v_BAWAPRC"];
        $this->BAWAPRC->AdvancedSearch->SearchValue2 = @$filter["y_BAWAPRC"];
        $this->BAWAPRC->AdvancedSearch->SearchOperator2 = @$filter["w_BAWAPRC"];
        $this->BAWAPRC->AdvancedSearch->save();

        // Field STAXPER
        $this->STAXPER->AdvancedSearch->SearchValue = @$filter["x_STAXPER"];
        $this->STAXPER->AdvancedSearch->SearchOperator = @$filter["z_STAXPER"];
        $this->STAXPER->AdvancedSearch->SearchCondition = @$filter["v_STAXPER"];
        $this->STAXPER->AdvancedSearch->SearchValue2 = @$filter["y_STAXPER"];
        $this->STAXPER->AdvancedSearch->SearchOperator2 = @$filter["w_STAXPER"];
        $this->STAXPER->AdvancedSearch->save();

        // Field TAXTYPE
        $this->TAXTYPE->AdvancedSearch->SearchValue = @$filter["x_TAXTYPE"];
        $this->TAXTYPE->AdvancedSearch->SearchOperator = @$filter["z_TAXTYPE"];
        $this->TAXTYPE->AdvancedSearch->SearchCondition = @$filter["v_TAXTYPE"];
        $this->TAXTYPE->AdvancedSearch->SearchValue2 = @$filter["y_TAXTYPE"];
        $this->TAXTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TAXTYPE"];
        $this->TAXTYPE->AdvancedSearch->save();

        // Field OLDTAXP
        $this->OLDTAXP->AdvancedSearch->SearchValue = @$filter["x_OLDTAXP"];
        $this->OLDTAXP->AdvancedSearch->SearchOperator = @$filter["z_OLDTAXP"];
        $this->OLDTAXP->AdvancedSearch->SearchCondition = @$filter["v_OLDTAXP"];
        $this->OLDTAXP->AdvancedSearch->SearchValue2 = @$filter["y_OLDTAXP"];
        $this->OLDTAXP->AdvancedSearch->SearchOperator2 = @$filter["w_OLDTAXP"];
        $this->OLDTAXP->AdvancedSearch->save();

        // Field TAXUPD
        $this->TAXUPD->AdvancedSearch->SearchValue = @$filter["x_TAXUPD"];
        $this->TAXUPD->AdvancedSearch->SearchOperator = @$filter["z_TAXUPD"];
        $this->TAXUPD->AdvancedSearch->SearchCondition = @$filter["v_TAXUPD"];
        $this->TAXUPD->AdvancedSearch->SearchValue2 = @$filter["y_TAXUPD"];
        $this->TAXUPD->AdvancedSearch->SearchOperator2 = @$filter["w_TAXUPD"];
        $this->TAXUPD->AdvancedSearch->save();

        // Field PACKAGE
        $this->PACKAGE->AdvancedSearch->SearchValue = @$filter["x_PACKAGE"];
        $this->PACKAGE->AdvancedSearch->SearchOperator = @$filter["z_PACKAGE"];
        $this->PACKAGE->AdvancedSearch->SearchCondition = @$filter["v_PACKAGE"];
        $this->PACKAGE->AdvancedSearch->SearchValue2 = @$filter["y_PACKAGE"];
        $this->PACKAGE->AdvancedSearch->SearchOperator2 = @$filter["w_PACKAGE"];
        $this->PACKAGE->AdvancedSearch->save();

        // Field NEWRT
        $this->NEWRT->AdvancedSearch->SearchValue = @$filter["x_NEWRT"];
        $this->NEWRT->AdvancedSearch->SearchOperator = @$filter["z_NEWRT"];
        $this->NEWRT->AdvancedSearch->SearchCondition = @$filter["v_NEWRT"];
        $this->NEWRT->AdvancedSearch->SearchValue2 = @$filter["y_NEWRT"];
        $this->NEWRT->AdvancedSearch->SearchOperator2 = @$filter["w_NEWRT"];
        $this->NEWRT->AdvancedSearch->save();

        // Field NEWMRP
        $this->NEWMRP->AdvancedSearch->SearchValue = @$filter["x_NEWMRP"];
        $this->NEWMRP->AdvancedSearch->SearchOperator = @$filter["z_NEWMRP"];
        $this->NEWMRP->AdvancedSearch->SearchCondition = @$filter["v_NEWMRP"];
        $this->NEWMRP->AdvancedSearch->SearchValue2 = @$filter["y_NEWMRP"];
        $this->NEWMRP->AdvancedSearch->SearchOperator2 = @$filter["w_NEWMRP"];
        $this->NEWMRP->AdvancedSearch->save();

        // Field NEWUR
        $this->NEWUR->AdvancedSearch->SearchValue = @$filter["x_NEWUR"];
        $this->NEWUR->AdvancedSearch->SearchOperator = @$filter["z_NEWUR"];
        $this->NEWUR->AdvancedSearch->SearchCondition = @$filter["v_NEWUR"];
        $this->NEWUR->AdvancedSearch->SearchValue2 = @$filter["y_NEWUR"];
        $this->NEWUR->AdvancedSearch->SearchOperator2 = @$filter["w_NEWUR"];
        $this->NEWUR->AdvancedSearch->save();

        // Field STATUS
        $this->STATUS->AdvancedSearch->SearchValue = @$filter["x_STATUS"];
        $this->STATUS->AdvancedSearch->SearchOperator = @$filter["z_STATUS"];
        $this->STATUS->AdvancedSearch->SearchCondition = @$filter["v_STATUS"];
        $this->STATUS->AdvancedSearch->SearchValue2 = @$filter["y_STATUS"];
        $this->STATUS->AdvancedSearch->SearchOperator2 = @$filter["w_STATUS"];
        $this->STATUS->AdvancedSearch->save();

        // Field RETNQTY
        $this->RETNQTY->AdvancedSearch->SearchValue = @$filter["x_RETNQTY"];
        $this->RETNQTY->AdvancedSearch->SearchOperator = @$filter["z_RETNQTY"];
        $this->RETNQTY->AdvancedSearch->SearchCondition = @$filter["v_RETNQTY"];
        $this->RETNQTY->AdvancedSearch->SearchValue2 = @$filter["y_RETNQTY"];
        $this->RETNQTY->AdvancedSearch->SearchOperator2 = @$filter["w_RETNQTY"];
        $this->RETNQTY->AdvancedSearch->save();

        // Field KEMODISC
        $this->KEMODISC->AdvancedSearch->SearchValue = @$filter["x_KEMODISC"];
        $this->KEMODISC->AdvancedSearch->SearchOperator = @$filter["z_KEMODISC"];
        $this->KEMODISC->AdvancedSearch->SearchCondition = @$filter["v_KEMODISC"];
        $this->KEMODISC->AdvancedSearch->SearchValue2 = @$filter["y_KEMODISC"];
        $this->KEMODISC->AdvancedSearch->SearchOperator2 = @$filter["w_KEMODISC"];
        $this->KEMODISC->AdvancedSearch->save();

        // Field PATSALE
        $this->PATSALE->AdvancedSearch->SearchValue = @$filter["x_PATSALE"];
        $this->PATSALE->AdvancedSearch->SearchOperator = @$filter["z_PATSALE"];
        $this->PATSALE->AdvancedSearch->SearchCondition = @$filter["v_PATSALE"];
        $this->PATSALE->AdvancedSearch->SearchValue2 = @$filter["y_PATSALE"];
        $this->PATSALE->AdvancedSearch->SearchOperator2 = @$filter["w_PATSALE"];
        $this->PATSALE->AdvancedSearch->save();

        // Field ORGAN
        $this->ORGAN->AdvancedSearch->SearchValue = @$filter["x_ORGAN"];
        $this->ORGAN->AdvancedSearch->SearchOperator = @$filter["z_ORGAN"];
        $this->ORGAN->AdvancedSearch->SearchCondition = @$filter["v_ORGAN"];
        $this->ORGAN->AdvancedSearch->SearchValue2 = @$filter["y_ORGAN"];
        $this->ORGAN->AdvancedSearch->SearchOperator2 = @$filter["w_ORGAN"];
        $this->ORGAN->AdvancedSearch->save();

        // Field OLDRQ
        $this->OLDRQ->AdvancedSearch->SearchValue = @$filter["x_OLDRQ"];
        $this->OLDRQ->AdvancedSearch->SearchOperator = @$filter["z_OLDRQ"];
        $this->OLDRQ->AdvancedSearch->SearchCondition = @$filter["v_OLDRQ"];
        $this->OLDRQ->AdvancedSearch->SearchValue2 = @$filter["y_OLDRQ"];
        $this->OLDRQ->AdvancedSearch->SearchOperator2 = @$filter["w_OLDRQ"];
        $this->OLDRQ->AdvancedSearch->save();

        // Field DRID
        $this->DRID->AdvancedSearch->SearchValue = @$filter["x_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator = @$filter["z_DRID"];
        $this->DRID->AdvancedSearch->SearchCondition = @$filter["v_DRID"];
        $this->DRID->AdvancedSearch->SearchValue2 = @$filter["y_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator2 = @$filter["w_DRID"];
        $this->DRID->AdvancedSearch->save();

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

        // Field COMBCODE
        $this->COMBCODE->AdvancedSearch->SearchValue = @$filter["x_COMBCODE"];
        $this->COMBCODE->AdvancedSearch->SearchOperator = @$filter["z_COMBCODE"];
        $this->COMBCODE->AdvancedSearch->SearchCondition = @$filter["v_COMBCODE"];
        $this->COMBCODE->AdvancedSearch->SearchValue2 = @$filter["y_COMBCODE"];
        $this->COMBCODE->AdvancedSearch->SearchOperator2 = @$filter["w_COMBCODE"];
        $this->COMBCODE->AdvancedSearch->save();

        // Field GENCODE
        $this->GENCODE->AdvancedSearch->SearchValue = @$filter["x_GENCODE"];
        $this->GENCODE->AdvancedSearch->SearchOperator = @$filter["z_GENCODE"];
        $this->GENCODE->AdvancedSearch->SearchCondition = @$filter["v_GENCODE"];
        $this->GENCODE->AdvancedSearch->SearchValue2 = @$filter["y_GENCODE"];
        $this->GENCODE->AdvancedSearch->SearchOperator2 = @$filter["w_GENCODE"];
        $this->GENCODE->AdvancedSearch->save();

        // Field STRENGTH
        $this->STRENGTH->AdvancedSearch->SearchValue = @$filter["x_STRENGTH"];
        $this->STRENGTH->AdvancedSearch->SearchOperator = @$filter["z_STRENGTH"];
        $this->STRENGTH->AdvancedSearch->SearchCondition = @$filter["v_STRENGTH"];
        $this->STRENGTH->AdvancedSearch->SearchValue2 = @$filter["y_STRENGTH"];
        $this->STRENGTH->AdvancedSearch->SearchOperator2 = @$filter["w_STRENGTH"];
        $this->STRENGTH->AdvancedSearch->save();

        // Field UNIT
        $this->UNIT->AdvancedSearch->SearchValue = @$filter["x_UNIT"];
        $this->UNIT->AdvancedSearch->SearchOperator = @$filter["z_UNIT"];
        $this->UNIT->AdvancedSearch->SearchCondition = @$filter["v_UNIT"];
        $this->UNIT->AdvancedSearch->SearchValue2 = @$filter["y_UNIT"];
        $this->UNIT->AdvancedSearch->SearchOperator2 = @$filter["w_UNIT"];
        $this->UNIT->AdvancedSearch->save();

        // Field FORMULARY
        $this->FORMULARY->AdvancedSearch->SearchValue = @$filter["x_FORMULARY"];
        $this->FORMULARY->AdvancedSearch->SearchOperator = @$filter["z_FORMULARY"];
        $this->FORMULARY->AdvancedSearch->SearchCondition = @$filter["v_FORMULARY"];
        $this->FORMULARY->AdvancedSearch->SearchValue2 = @$filter["y_FORMULARY"];
        $this->FORMULARY->AdvancedSearch->SearchOperator2 = @$filter["w_FORMULARY"];
        $this->FORMULARY->AdvancedSearch->save();

        // Field STOCK
        $this->STOCK->AdvancedSearch->SearchValue = @$filter["x_STOCK"];
        $this->STOCK->AdvancedSearch->SearchOperator = @$filter["z_STOCK"];
        $this->STOCK->AdvancedSearch->SearchCondition = @$filter["v_STOCK"];
        $this->STOCK->AdvancedSearch->SearchValue2 = @$filter["y_STOCK"];
        $this->STOCK->AdvancedSearch->SearchOperator2 = @$filter["w_STOCK"];
        $this->STOCK->AdvancedSearch->save();

        // Field RACKNO
        $this->RACKNO->AdvancedSearch->SearchValue = @$filter["x_RACKNO"];
        $this->RACKNO->AdvancedSearch->SearchOperator = @$filter["z_RACKNO"];
        $this->RACKNO->AdvancedSearch->SearchCondition = @$filter["v_RACKNO"];
        $this->RACKNO->AdvancedSearch->SearchValue2 = @$filter["y_RACKNO"];
        $this->RACKNO->AdvancedSearch->SearchOperator2 = @$filter["w_RACKNO"];
        $this->RACKNO->AdvancedSearch->save();

        // Field SUPPNAME
        $this->SUPPNAME->AdvancedSearch->SearchValue = @$filter["x_SUPPNAME"];
        $this->SUPPNAME->AdvancedSearch->SearchOperator = @$filter["z_SUPPNAME"];
        $this->SUPPNAME->AdvancedSearch->SearchCondition = @$filter["v_SUPPNAME"];
        $this->SUPPNAME->AdvancedSearch->SearchValue2 = @$filter["y_SUPPNAME"];
        $this->SUPPNAME->AdvancedSearch->SearchOperator2 = @$filter["w_SUPPNAME"];
        $this->SUPPNAME->AdvancedSearch->save();

        // Field COMBNAME
        $this->COMBNAME->AdvancedSearch->SearchValue = @$filter["x_COMBNAME"];
        $this->COMBNAME->AdvancedSearch->SearchOperator = @$filter["z_COMBNAME"];
        $this->COMBNAME->AdvancedSearch->SearchCondition = @$filter["v_COMBNAME"];
        $this->COMBNAME->AdvancedSearch->SearchValue2 = @$filter["y_COMBNAME"];
        $this->COMBNAME->AdvancedSearch->SearchOperator2 = @$filter["w_COMBNAME"];
        $this->COMBNAME->AdvancedSearch->save();

        // Field GENERICNAME
        $this->GENERICNAME->AdvancedSearch->SearchValue = @$filter["x_GENERICNAME"];
        $this->GENERICNAME->AdvancedSearch->SearchOperator = @$filter["z_GENERICNAME"];
        $this->GENERICNAME->AdvancedSearch->SearchCondition = @$filter["v_GENERICNAME"];
        $this->GENERICNAME->AdvancedSearch->SearchValue2 = @$filter["y_GENERICNAME"];
        $this->GENERICNAME->AdvancedSearch->SearchOperator2 = @$filter["w_GENERICNAME"];
        $this->GENERICNAME->AdvancedSearch->save();

        // Field REMARK
        $this->REMARK->AdvancedSearch->SearchValue = @$filter["x_REMARK"];
        $this->REMARK->AdvancedSearch->SearchOperator = @$filter["z_REMARK"];
        $this->REMARK->AdvancedSearch->SearchCondition = @$filter["v_REMARK"];
        $this->REMARK->AdvancedSearch->SearchValue2 = @$filter["y_REMARK"];
        $this->REMARK->AdvancedSearch->SearchOperator2 = @$filter["w_REMARK"];
        $this->REMARK->AdvancedSearch->save();

        // Field TEMP
        $this->TEMP->AdvancedSearch->SearchValue = @$filter["x_TEMP"];
        $this->TEMP->AdvancedSearch->SearchOperator = @$filter["z_TEMP"];
        $this->TEMP->AdvancedSearch->SearchCondition = @$filter["v_TEMP"];
        $this->TEMP->AdvancedSearch->SearchValue2 = @$filter["y_TEMP"];
        $this->TEMP->AdvancedSearch->SearchOperator2 = @$filter["w_TEMP"];
        $this->TEMP->AdvancedSearch->save();

        // Field PACKING
        $this->PACKING->AdvancedSearch->SearchValue = @$filter["x_PACKING"];
        $this->PACKING->AdvancedSearch->SearchOperator = @$filter["z_PACKING"];
        $this->PACKING->AdvancedSearch->SearchCondition = @$filter["v_PACKING"];
        $this->PACKING->AdvancedSearch->SearchValue2 = @$filter["y_PACKING"];
        $this->PACKING->AdvancedSearch->SearchOperator2 = @$filter["w_PACKING"];
        $this->PACKING->AdvancedSearch->save();

        // Field PhysQty
        $this->PhysQty->AdvancedSearch->SearchValue = @$filter["x_PhysQty"];
        $this->PhysQty->AdvancedSearch->SearchOperator = @$filter["z_PhysQty"];
        $this->PhysQty->AdvancedSearch->SearchCondition = @$filter["v_PhysQty"];
        $this->PhysQty->AdvancedSearch->SearchValue2 = @$filter["y_PhysQty"];
        $this->PhysQty->AdvancedSearch->SearchOperator2 = @$filter["w_PhysQty"];
        $this->PhysQty->AdvancedSearch->save();

        // Field LedQty
        $this->LedQty->AdvancedSearch->SearchValue = @$filter["x_LedQty"];
        $this->LedQty->AdvancedSearch->SearchOperator = @$filter["z_LedQty"];
        $this->LedQty->AdvancedSearch->SearchCondition = @$filter["v_LedQty"];
        $this->LedQty->AdvancedSearch->SearchValue2 = @$filter["y_LedQty"];
        $this->LedQty->AdvancedSearch->SearchOperator2 = @$filter["w_LedQty"];
        $this->LedQty->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field PurValue
        $this->PurValue->AdvancedSearch->SearchValue = @$filter["x_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator = @$filter["z_PurValue"];
        $this->PurValue->AdvancedSearch->SearchCondition = @$filter["v_PurValue"];
        $this->PurValue->AdvancedSearch->SearchValue2 = @$filter["y_PurValue"];
        $this->PurValue->AdvancedSearch->SearchOperator2 = @$filter["w_PurValue"];
        $this->PurValue->AdvancedSearch->save();

        // Field PSGST
        $this->PSGST->AdvancedSearch->SearchValue = @$filter["x_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator = @$filter["z_PSGST"];
        $this->PSGST->AdvancedSearch->SearchCondition = @$filter["v_PSGST"];
        $this->PSGST->AdvancedSearch->SearchValue2 = @$filter["y_PSGST"];
        $this->PSGST->AdvancedSearch->SearchOperator2 = @$filter["w_PSGST"];
        $this->PSGST->AdvancedSearch->save();

        // Field PCGST
        $this->PCGST->AdvancedSearch->SearchValue = @$filter["x_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator = @$filter["z_PCGST"];
        $this->PCGST->AdvancedSearch->SearchCondition = @$filter["v_PCGST"];
        $this->PCGST->AdvancedSearch->SearchValue2 = @$filter["y_PCGST"];
        $this->PCGST->AdvancedSearch->SearchOperator2 = @$filter["w_PCGST"];
        $this->PCGST->AdvancedSearch->save();

        // Field SaleValue
        $this->SaleValue->AdvancedSearch->SearchValue = @$filter["x_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchOperator = @$filter["z_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchCondition = @$filter["v_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchValue2 = @$filter["y_SaleValue"];
        $this->SaleValue->AdvancedSearch->SearchOperator2 = @$filter["w_SaleValue"];
        $this->SaleValue->AdvancedSearch->save();

        // Field SSGST
        $this->SSGST->AdvancedSearch->SearchValue = @$filter["x_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator = @$filter["z_SSGST"];
        $this->SSGST->AdvancedSearch->SearchCondition = @$filter["v_SSGST"];
        $this->SSGST->AdvancedSearch->SearchValue2 = @$filter["y_SSGST"];
        $this->SSGST->AdvancedSearch->SearchOperator2 = @$filter["w_SSGST"];
        $this->SSGST->AdvancedSearch->save();

        // Field SCGST
        $this->SCGST->AdvancedSearch->SearchValue = @$filter["x_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator = @$filter["z_SCGST"];
        $this->SCGST->AdvancedSearch->SearchCondition = @$filter["v_SCGST"];
        $this->SCGST->AdvancedSearch->SearchValue2 = @$filter["y_SCGST"];
        $this->SCGST->AdvancedSearch->SearchOperator2 = @$filter["w_SCGST"];
        $this->SCGST->AdvancedSearch->save();

        // Field SaleRate
        $this->SaleRate->AdvancedSearch->SearchValue = @$filter["x_SaleRate"];
        $this->SaleRate->AdvancedSearch->SearchOperator = @$filter["z_SaleRate"];
        $this->SaleRate->AdvancedSearch->SearchCondition = @$filter["v_SaleRate"];
        $this->SaleRate->AdvancedSearch->SearchValue2 = @$filter["y_SaleRate"];
        $this->SaleRate->AdvancedSearch->SearchOperator2 = @$filter["w_SaleRate"];
        $this->SaleRate->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();

        // Field BRNAME
        $this->BRNAME->AdvancedSearch->SearchValue = @$filter["x_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchOperator = @$filter["z_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchCondition = @$filter["v_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchValue2 = @$filter["y_BRNAME"];
        $this->BRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_BRNAME"];
        $this->BRNAME->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DES, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LASTSUPP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GENNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OPPRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESTRICT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BAWAPRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TAXTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TAXUPD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PACKAGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->STATUS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->KEMODISC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ORGAN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DRID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COMBCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GENCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UNIT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FORMULARY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RACKNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SUPPNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COMBNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GENERICNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->REMARK, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TEMP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BRNAME, $arKeywords, $type);
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
            $this->updateSort($this->BRCODE); // BRCODE
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->TYPE); // TYPE
            $this->updateSort($this->DES); // DES
            $this->updateSort($this->UM); // UM
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->UR); // UR
            $this->updateSort($this->TAXP); // TAXP
            $this->updateSort($this->BATCHNO); // BATCHNO
            $this->updateSort($this->OQ); // OQ
            $this->updateSort($this->RQ); // RQ
            $this->updateSort($this->MRQ); // MRQ
            $this->updateSort($this->IQ); // IQ
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->EXPDT); // EXPDT
            $this->updateSort($this->SALQTY); // SALQTY
            $this->updateSort($this->LASTPURDT); // LASTPURDT
            $this->updateSort($this->LASTSUPP); // LASTSUPP
            $this->updateSort($this->GENNAME); // GENNAME
            $this->updateSort($this->LASTISSDT); // LASTISSDT
            $this->updateSort($this->CREATEDDT); // CREATEDDT
            $this->updateSort($this->OPPRC); // OPPRC
            $this->updateSort($this->RESTRICT); // RESTRICT
            $this->updateSort($this->BAWAPRC); // BAWAPRC
            $this->updateSort($this->STAXPER); // STAXPER
            $this->updateSort($this->TAXTYPE); // TAXTYPE
            $this->updateSort($this->OLDTAXP); // OLDTAXP
            $this->updateSort($this->TAXUPD); // TAXUPD
            $this->updateSort($this->PACKAGE); // PACKAGE
            $this->updateSort($this->NEWRT); // NEWRT
            $this->updateSort($this->NEWMRP); // NEWMRP
            $this->updateSort($this->NEWUR); // NEWUR
            $this->updateSort($this->STATUS); // STATUS
            $this->updateSort($this->RETNQTY); // RETNQTY
            $this->updateSort($this->KEMODISC); // KEMODISC
            $this->updateSort($this->PATSALE); // PATSALE
            $this->updateSort($this->ORGAN); // ORGAN
            $this->updateSort($this->OLDRQ); // OLDRQ
            $this->updateSort($this->DRID); // DRID
            $this->updateSort($this->MFRCODE); // MFRCODE
            $this->updateSort($this->COMBCODE); // COMBCODE
            $this->updateSort($this->GENCODE); // GENCODE
            $this->updateSort($this->STRENGTH); // STRENGTH
            $this->updateSort($this->UNIT); // UNIT
            $this->updateSort($this->FORMULARY); // FORMULARY
            $this->updateSort($this->STOCK); // STOCK
            $this->updateSort($this->RACKNO); // RACKNO
            $this->updateSort($this->SUPPNAME); // SUPPNAME
            $this->updateSort($this->COMBNAME); // COMBNAME
            $this->updateSort($this->GENERICNAME); // GENERICNAME
            $this->updateSort($this->REMARK); // REMARK
            $this->updateSort($this->TEMP); // TEMP
            $this->updateSort($this->PACKING); // PACKING
            $this->updateSort($this->PhysQty); // PhysQty
            $this->updateSort($this->LedQty); // LedQty
            $this->updateSort($this->id); // id
            $this->updateSort($this->PurValue); // PurValue
            $this->updateSort($this->PSGST); // PSGST
            $this->updateSort($this->PCGST); // PCGST
            $this->updateSort($this->SaleValue); // SaleValue
            $this->updateSort($this->SSGST); // SSGST
            $this->updateSort($this->SCGST); // SCGST
            $this->updateSort($this->SaleRate); // SaleRate
            $this->updateSort($this->HospID); // HospID
            $this->updateSort($this->BRNAME); // BRNAME
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
                $this->BRCODE->setSort("");
                $this->PRC->setSort("");
                $this->TYPE->setSort("");
                $this->DES->setSort("");
                $this->UM->setSort("");
                $this->RT->setSort("");
                $this->UR->setSort("");
                $this->TAXP->setSort("");
                $this->BATCHNO->setSort("");
                $this->OQ->setSort("");
                $this->RQ->setSort("");
                $this->MRQ->setSort("");
                $this->IQ->setSort("");
                $this->MRP->setSort("");
                $this->EXPDT->setSort("");
                $this->SALQTY->setSort("");
                $this->LASTPURDT->setSort("");
                $this->LASTSUPP->setSort("");
                $this->GENNAME->setSort("");
                $this->LASTISSDT->setSort("");
                $this->CREATEDDT->setSort("");
                $this->OPPRC->setSort("");
                $this->RESTRICT->setSort("");
                $this->BAWAPRC->setSort("");
                $this->STAXPER->setSort("");
                $this->TAXTYPE->setSort("");
                $this->OLDTAXP->setSort("");
                $this->TAXUPD->setSort("");
                $this->PACKAGE->setSort("");
                $this->NEWRT->setSort("");
                $this->NEWMRP->setSort("");
                $this->NEWUR->setSort("");
                $this->STATUS->setSort("");
                $this->RETNQTY->setSort("");
                $this->KEMODISC->setSort("");
                $this->PATSALE->setSort("");
                $this->ORGAN->setSort("");
                $this->OLDRQ->setSort("");
                $this->DRID->setSort("");
                $this->MFRCODE->setSort("");
                $this->COMBCODE->setSort("");
                $this->GENCODE->setSort("");
                $this->STRENGTH->setSort("");
                $this->UNIT->setSort("");
                $this->FORMULARY->setSort("");
                $this->STOCK->setSort("");
                $this->RACKNO->setSort("");
                $this->SUPPNAME->setSort("");
                $this->COMBNAME->setSort("");
                $this->GENERICNAME->setSort("");
                $this->REMARK->setSort("");
                $this->TEMP->setSort("");
                $this->PACKING->setSort("");
                $this->PhysQty->setSort("");
                $this->LedQty->setSort("");
                $this->id->setSort("");
                $this->PurValue->setSort("");
                $this->PSGST->setSort("");
                $this->PCGST->setSort("");
                $this->SaleValue->setSort("");
                $this->SSGST->setSort("");
                $this->SCGST->setSort("");
                $this->SaleRate->setSort("");
                $this->HospID->setSort("");
                $this->BRNAME->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fstore_storemastlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fstore_storemastlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fstore_storemastlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->BRCODE->setDbValue($row['BRCODE']);
        $this->PRC->setDbValue($row['PRC']);
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DES->setDbValue($row['DES']);
        $this->UM->setDbValue($row['UM']);
        $this->RT->setDbValue($row['RT']);
        $this->UR->setDbValue($row['UR']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->MRP->setDbValue($row['MRP']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->SALQTY->setDbValue($row['SALQTY']);
        $this->LASTPURDT->setDbValue($row['LASTPURDT']);
        $this->LASTSUPP->setDbValue($row['LASTSUPP']);
        $this->GENNAME->setDbValue($row['GENNAME']);
        $this->LASTISSDT->setDbValue($row['LASTISSDT']);
        $this->CREATEDDT->setDbValue($row['CREATEDDT']);
        $this->OPPRC->setDbValue($row['OPPRC']);
        $this->RESTRICT->setDbValue($row['RESTRICT']);
        $this->BAWAPRC->setDbValue($row['BAWAPRC']);
        $this->STAXPER->setDbValue($row['STAXPER']);
        $this->TAXTYPE->setDbValue($row['TAXTYPE']);
        $this->OLDTAXP->setDbValue($row['OLDTAXP']);
        $this->TAXUPD->setDbValue($row['TAXUPD']);
        $this->PACKAGE->setDbValue($row['PACKAGE']);
        $this->NEWRT->setDbValue($row['NEWRT']);
        $this->NEWMRP->setDbValue($row['NEWMRP']);
        $this->NEWUR->setDbValue($row['NEWUR']);
        $this->STATUS->setDbValue($row['STATUS']);
        $this->RETNQTY->setDbValue($row['RETNQTY']);
        $this->KEMODISC->setDbValue($row['KEMODISC']);
        $this->PATSALE->setDbValue($row['PATSALE']);
        $this->ORGAN->setDbValue($row['ORGAN']);
        $this->OLDRQ->setDbValue($row['OLDRQ']);
        $this->DRID->setDbValue($row['DRID']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->COMBCODE->setDbValue($row['COMBCODE']);
        $this->GENCODE->setDbValue($row['GENCODE']);
        $this->STRENGTH->setDbValue($row['STRENGTH']);
        $this->UNIT->setDbValue($row['UNIT']);
        $this->FORMULARY->setDbValue($row['FORMULARY']);
        $this->STOCK->setDbValue($row['STOCK']);
        $this->RACKNO->setDbValue($row['RACKNO']);
        $this->SUPPNAME->setDbValue($row['SUPPNAME']);
        $this->COMBNAME->setDbValue($row['COMBNAME']);
        $this->GENERICNAME->setDbValue($row['GENERICNAME']);
        $this->REMARK->setDbValue($row['REMARK']);
        $this->TEMP->setDbValue($row['TEMP']);
        $this->PACKING->setDbValue($row['PACKING']);
        $this->PhysQty->setDbValue($row['PhysQty']);
        $this->LedQty->setDbValue($row['LedQty']);
        $this->id->setDbValue($row['id']);
        $this->PurValue->setDbValue($row['PurValue']);
        $this->PSGST->setDbValue($row['PSGST']);
        $this->PCGST->setDbValue($row['PCGST']);
        $this->SaleValue->setDbValue($row['SaleValue']);
        $this->SSGST->setDbValue($row['SSGST']);
        $this->SCGST->setDbValue($row['SCGST']);
        $this->SaleRate->setDbValue($row['SaleRate']);
        $this->HospID->setDbValue($row['HospID']);
        $this->BRNAME->setDbValue($row['BRNAME']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['BRCODE'] = null;
        $row['PRC'] = null;
        $row['TYPE'] = null;
        $row['DES'] = null;
        $row['UM'] = null;
        $row['RT'] = null;
        $row['UR'] = null;
        $row['TAXP'] = null;
        $row['BATCHNO'] = null;
        $row['OQ'] = null;
        $row['RQ'] = null;
        $row['MRQ'] = null;
        $row['IQ'] = null;
        $row['MRP'] = null;
        $row['EXPDT'] = null;
        $row['SALQTY'] = null;
        $row['LASTPURDT'] = null;
        $row['LASTSUPP'] = null;
        $row['GENNAME'] = null;
        $row['LASTISSDT'] = null;
        $row['CREATEDDT'] = null;
        $row['OPPRC'] = null;
        $row['RESTRICT'] = null;
        $row['BAWAPRC'] = null;
        $row['STAXPER'] = null;
        $row['TAXTYPE'] = null;
        $row['OLDTAXP'] = null;
        $row['TAXUPD'] = null;
        $row['PACKAGE'] = null;
        $row['NEWRT'] = null;
        $row['NEWMRP'] = null;
        $row['NEWUR'] = null;
        $row['STATUS'] = null;
        $row['RETNQTY'] = null;
        $row['KEMODISC'] = null;
        $row['PATSALE'] = null;
        $row['ORGAN'] = null;
        $row['OLDRQ'] = null;
        $row['DRID'] = null;
        $row['MFRCODE'] = null;
        $row['COMBCODE'] = null;
        $row['GENCODE'] = null;
        $row['STRENGTH'] = null;
        $row['UNIT'] = null;
        $row['FORMULARY'] = null;
        $row['STOCK'] = null;
        $row['RACKNO'] = null;
        $row['SUPPNAME'] = null;
        $row['COMBNAME'] = null;
        $row['GENERICNAME'] = null;
        $row['REMARK'] = null;
        $row['TEMP'] = null;
        $row['PACKING'] = null;
        $row['PhysQty'] = null;
        $row['LedQty'] = null;
        $row['id'] = null;
        $row['PurValue'] = null;
        $row['PSGST'] = null;
        $row['PCGST'] = null;
        $row['SaleValue'] = null;
        $row['SSGST'] = null;
        $row['SCGST'] = null;
        $row['SaleRate'] = null;
        $row['HospID'] = null;
        $row['BRNAME'] = null;
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

        // Convert decimal values if posted back
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OQ->FormValue == $this->OQ->CurrentValue && is_numeric(ConvertToFloatString($this->OQ->CurrentValue))) {
            $this->OQ->CurrentValue = ConvertToFloatString($this->OQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RQ->FormValue == $this->RQ->CurrentValue && is_numeric(ConvertToFloatString($this->RQ->CurrentValue))) {
            $this->RQ->CurrentValue = ConvertToFloatString($this->RQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRQ->FormValue == $this->MRQ->CurrentValue && is_numeric(ConvertToFloatString($this->MRQ->CurrentValue))) {
            $this->MRQ->CurrentValue = ConvertToFloatString($this->MRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->IQ->FormValue == $this->IQ->CurrentValue && is_numeric(ConvertToFloatString($this->IQ->CurrentValue))) {
            $this->IQ->CurrentValue = ConvertToFloatString($this->IQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SALQTY->FormValue == $this->SALQTY->CurrentValue && is_numeric(ConvertToFloatString($this->SALQTY->CurrentValue))) {
            $this->SALQTY->CurrentValue = ConvertToFloatString($this->SALQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STAXPER->FormValue == $this->STAXPER->CurrentValue && is_numeric(ConvertToFloatString($this->STAXPER->CurrentValue))) {
            $this->STAXPER->CurrentValue = ConvertToFloatString($this->STAXPER->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDTAXP->FormValue == $this->OLDTAXP->CurrentValue && is_numeric(ConvertToFloatString($this->OLDTAXP->CurrentValue))) {
            $this->OLDTAXP->CurrentValue = ConvertToFloatString($this->OLDTAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWRT->FormValue == $this->NEWRT->CurrentValue && is_numeric(ConvertToFloatString($this->NEWRT->CurrentValue))) {
            $this->NEWRT->CurrentValue = ConvertToFloatString($this->NEWRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWMRP->FormValue == $this->NEWMRP->CurrentValue && is_numeric(ConvertToFloatString($this->NEWMRP->CurrentValue))) {
            $this->NEWMRP->CurrentValue = ConvertToFloatString($this->NEWMRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEWUR->FormValue == $this->NEWUR->CurrentValue && is_numeric(ConvertToFloatString($this->NEWUR->CurrentValue))) {
            $this->NEWUR->CurrentValue = ConvertToFloatString($this->NEWUR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RETNQTY->FormValue == $this->RETNQTY->CurrentValue && is_numeric(ConvertToFloatString($this->RETNQTY->CurrentValue))) {
            $this->RETNQTY->CurrentValue = ConvertToFloatString($this->RETNQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PATSALE->FormValue == $this->PATSALE->CurrentValue && is_numeric(ConvertToFloatString($this->PATSALE->CurrentValue))) {
            $this->PATSALE->CurrentValue = ConvertToFloatString($this->PATSALE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OLDRQ->FormValue == $this->OLDRQ->CurrentValue && is_numeric(ConvertToFloatString($this->OLDRQ->CurrentValue))) {
            $this->OLDRQ->CurrentValue = ConvertToFloatString($this->OLDRQ->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STRENGTH->FormValue == $this->STRENGTH->CurrentValue && is_numeric(ConvertToFloatString($this->STRENGTH->CurrentValue))) {
            $this->STRENGTH->CurrentValue = ConvertToFloatString($this->STRENGTH->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->STOCK->FormValue == $this->STOCK->CurrentValue && is_numeric(ConvertToFloatString($this->STOCK->CurrentValue))) {
            $this->STOCK->CurrentValue = ConvertToFloatString($this->STOCK->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PACKING->FormValue == $this->PACKING->CurrentValue && is_numeric(ConvertToFloatString($this->PACKING->CurrentValue))) {
            $this->PACKING->CurrentValue = ConvertToFloatString($this->PACKING->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PhysQty->FormValue == $this->PhysQty->CurrentValue && is_numeric(ConvertToFloatString($this->PhysQty->CurrentValue))) {
            $this->PhysQty->CurrentValue = ConvertToFloatString($this->PhysQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->LedQty->FormValue == $this->LedQty->CurrentValue && is_numeric(ConvertToFloatString($this->LedQty->CurrentValue))) {
            $this->LedQty->CurrentValue = ConvertToFloatString($this->LedQty->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PurValue->FormValue == $this->PurValue->CurrentValue && is_numeric(ConvertToFloatString($this->PurValue->CurrentValue))) {
            $this->PurValue->CurrentValue = ConvertToFloatString($this->PurValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PSGST->FormValue == $this->PSGST->CurrentValue && is_numeric(ConvertToFloatString($this->PSGST->CurrentValue))) {
            $this->PSGST->CurrentValue = ConvertToFloatString($this->PSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PCGST->FormValue == $this->PCGST->CurrentValue && is_numeric(ConvertToFloatString($this->PCGST->CurrentValue))) {
            $this->PCGST->CurrentValue = ConvertToFloatString($this->PCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleValue->FormValue == $this->SaleValue->CurrentValue && is_numeric(ConvertToFloatString($this->SaleValue->CurrentValue))) {
            $this->SaleValue->CurrentValue = ConvertToFloatString($this->SaleValue->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SSGST->FormValue == $this->SSGST->CurrentValue && is_numeric(ConvertToFloatString($this->SSGST->CurrentValue))) {
            $this->SSGST->CurrentValue = ConvertToFloatString($this->SSGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SCGST->FormValue == $this->SCGST->CurrentValue && is_numeric(ConvertToFloatString($this->SCGST->CurrentValue))) {
            $this->SCGST->CurrentValue = ConvertToFloatString($this->SCGST->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SaleRate->FormValue == $this->SaleRate->CurrentValue && is_numeric(ConvertToFloatString($this->SaleRate->CurrentValue))) {
            $this->SaleRate->CurrentValue = ConvertToFloatString($this->SaleRate->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BRCODE

        // PRC

        // TYPE

        // DES

        // UM

        // RT

        // UR

        // TAXP

        // BATCHNO

        // OQ

        // RQ

        // MRQ

        // IQ

        // MRP

        // EXPDT

        // SALQTY

        // LASTPURDT

        // LASTSUPP

        // GENNAME

        // LASTISSDT

        // CREATEDDT

        // OPPRC

        // RESTRICT

        // BAWAPRC

        // STAXPER

        // TAXTYPE

        // OLDTAXP

        // TAXUPD

        // PACKAGE

        // NEWRT

        // NEWMRP

        // NEWUR

        // STATUS

        // RETNQTY

        // KEMODISC

        // PATSALE

        // ORGAN

        // OLDRQ

        // DRID

        // MFRCODE

        // COMBCODE

        // GENCODE

        // STRENGTH

        // UNIT

        // FORMULARY

        // STOCK

        // RACKNO

        // SUPPNAME

        // COMBNAME

        // GENERICNAME

        // REMARK

        // TEMP

        // PACKING

        // PhysQty

        // LedQty

        // id

        // PurValue

        // PSGST

        // PCGST

        // SaleValue

        // SSGST

        // SCGST

        // SaleRate

        // HospID

        // BRNAME
        if ($this->RowType == ROWTYPE_VIEW) {
            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

            // TYPE
            $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
            $this->TYPE->ViewCustomAttributes = "";

            // DES
            $this->DES->ViewValue = $this->DES->CurrentValue;
            $this->DES->ViewCustomAttributes = "";

            // UM
            $this->UM->ViewValue = $this->UM->CurrentValue;
            $this->UM->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // OQ
            $this->OQ->ViewValue = $this->OQ->CurrentValue;
            $this->OQ->ViewValue = FormatNumber($this->OQ->ViewValue, 2, -2, -2, -2);
            $this->OQ->ViewCustomAttributes = "";

            // RQ
            $this->RQ->ViewValue = $this->RQ->CurrentValue;
            $this->RQ->ViewValue = FormatNumber($this->RQ->ViewValue, 2, -2, -2, -2);
            $this->RQ->ViewCustomAttributes = "";

            // MRQ
            $this->MRQ->ViewValue = $this->MRQ->CurrentValue;
            $this->MRQ->ViewValue = FormatNumber($this->MRQ->ViewValue, 2, -2, -2, -2);
            $this->MRQ->ViewCustomAttributes = "";

            // IQ
            $this->IQ->ViewValue = $this->IQ->CurrentValue;
            $this->IQ->ViewValue = FormatNumber($this->IQ->ViewValue, 2, -2, -2, -2);
            $this->IQ->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // SALQTY
            $this->SALQTY->ViewValue = $this->SALQTY->CurrentValue;
            $this->SALQTY->ViewValue = FormatNumber($this->SALQTY->ViewValue, 2, -2, -2, -2);
            $this->SALQTY->ViewCustomAttributes = "";

            // LASTPURDT
            $this->LASTPURDT->ViewValue = $this->LASTPURDT->CurrentValue;
            $this->LASTPURDT->ViewValue = FormatDateTime($this->LASTPURDT->ViewValue, 0);
            $this->LASTPURDT->ViewCustomAttributes = "";

            // LASTSUPP
            $this->LASTSUPP->ViewValue = $this->LASTSUPP->CurrentValue;
            $this->LASTSUPP->ViewCustomAttributes = "";

            // GENNAME
            $this->GENNAME->ViewValue = $this->GENNAME->CurrentValue;
            $this->GENNAME->ViewCustomAttributes = "";

            // LASTISSDT
            $this->LASTISSDT->ViewValue = $this->LASTISSDT->CurrentValue;
            $this->LASTISSDT->ViewValue = FormatDateTime($this->LASTISSDT->ViewValue, 0);
            $this->LASTISSDT->ViewCustomAttributes = "";

            // CREATEDDT
            $this->CREATEDDT->ViewValue = $this->CREATEDDT->CurrentValue;
            $this->CREATEDDT->ViewValue = FormatDateTime($this->CREATEDDT->ViewValue, 0);
            $this->CREATEDDT->ViewCustomAttributes = "";

            // OPPRC
            $this->OPPRC->ViewValue = $this->OPPRC->CurrentValue;
            $this->OPPRC->ViewCustomAttributes = "";

            // RESTRICT
            $this->RESTRICT->ViewValue = $this->RESTRICT->CurrentValue;
            $this->RESTRICT->ViewCustomAttributes = "";

            // BAWAPRC
            $this->BAWAPRC->ViewValue = $this->BAWAPRC->CurrentValue;
            $this->BAWAPRC->ViewCustomAttributes = "";

            // STAXPER
            $this->STAXPER->ViewValue = $this->STAXPER->CurrentValue;
            $this->STAXPER->ViewValue = FormatNumber($this->STAXPER->ViewValue, 2, -2, -2, -2);
            $this->STAXPER->ViewCustomAttributes = "";

            // TAXTYPE
            $this->TAXTYPE->ViewValue = $this->TAXTYPE->CurrentValue;
            $this->TAXTYPE->ViewCustomAttributes = "";

            // OLDTAXP
            $this->OLDTAXP->ViewValue = $this->OLDTAXP->CurrentValue;
            $this->OLDTAXP->ViewValue = FormatNumber($this->OLDTAXP->ViewValue, 2, -2, -2, -2);
            $this->OLDTAXP->ViewCustomAttributes = "";

            // TAXUPD
            $this->TAXUPD->ViewValue = $this->TAXUPD->CurrentValue;
            $this->TAXUPD->ViewCustomAttributes = "";

            // PACKAGE
            $this->PACKAGE->ViewValue = $this->PACKAGE->CurrentValue;
            $this->PACKAGE->ViewCustomAttributes = "";

            // NEWRT
            $this->NEWRT->ViewValue = $this->NEWRT->CurrentValue;
            $this->NEWRT->ViewValue = FormatNumber($this->NEWRT->ViewValue, 2, -2, -2, -2);
            $this->NEWRT->ViewCustomAttributes = "";

            // NEWMRP
            $this->NEWMRP->ViewValue = $this->NEWMRP->CurrentValue;
            $this->NEWMRP->ViewValue = FormatNumber($this->NEWMRP->ViewValue, 2, -2, -2, -2);
            $this->NEWMRP->ViewCustomAttributes = "";

            // NEWUR
            $this->NEWUR->ViewValue = $this->NEWUR->CurrentValue;
            $this->NEWUR->ViewValue = FormatNumber($this->NEWUR->ViewValue, 2, -2, -2, -2);
            $this->NEWUR->ViewCustomAttributes = "";

            // STATUS
            $this->STATUS->ViewValue = $this->STATUS->CurrentValue;
            $this->STATUS->ViewCustomAttributes = "";

            // RETNQTY
            $this->RETNQTY->ViewValue = $this->RETNQTY->CurrentValue;
            $this->RETNQTY->ViewValue = FormatNumber($this->RETNQTY->ViewValue, 2, -2, -2, -2);
            $this->RETNQTY->ViewCustomAttributes = "";

            // KEMODISC
            $this->KEMODISC->ViewValue = $this->KEMODISC->CurrentValue;
            $this->KEMODISC->ViewCustomAttributes = "";

            // PATSALE
            $this->PATSALE->ViewValue = $this->PATSALE->CurrentValue;
            $this->PATSALE->ViewValue = FormatNumber($this->PATSALE->ViewValue, 2, -2, -2, -2);
            $this->PATSALE->ViewCustomAttributes = "";

            // ORGAN
            $this->ORGAN->ViewValue = $this->ORGAN->CurrentValue;
            $this->ORGAN->ViewCustomAttributes = "";

            // OLDRQ
            $this->OLDRQ->ViewValue = $this->OLDRQ->CurrentValue;
            $this->OLDRQ->ViewValue = FormatNumber($this->OLDRQ->ViewValue, 2, -2, -2, -2);
            $this->OLDRQ->ViewCustomAttributes = "";

            // DRID
            $this->DRID->ViewValue = $this->DRID->CurrentValue;
            $this->DRID->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // COMBCODE
            $this->COMBCODE->ViewValue = $this->COMBCODE->CurrentValue;
            $this->COMBCODE->ViewCustomAttributes = "";

            // GENCODE
            $this->GENCODE->ViewValue = $this->GENCODE->CurrentValue;
            $this->GENCODE->ViewCustomAttributes = "";

            // STRENGTH
            $this->STRENGTH->ViewValue = $this->STRENGTH->CurrentValue;
            $this->STRENGTH->ViewValue = FormatNumber($this->STRENGTH->ViewValue, 2, -2, -2, -2);
            $this->STRENGTH->ViewCustomAttributes = "";

            // UNIT
            $this->UNIT->ViewValue = $this->UNIT->CurrentValue;
            $this->UNIT->ViewCustomAttributes = "";

            // FORMULARY
            $this->FORMULARY->ViewValue = $this->FORMULARY->CurrentValue;
            $this->FORMULARY->ViewCustomAttributes = "";

            // STOCK
            $this->STOCK->ViewValue = $this->STOCK->CurrentValue;
            $this->STOCK->ViewValue = FormatNumber($this->STOCK->ViewValue, 2, -2, -2, -2);
            $this->STOCK->ViewCustomAttributes = "";

            // RACKNO
            $this->RACKNO->ViewValue = $this->RACKNO->CurrentValue;
            $this->RACKNO->ViewCustomAttributes = "";

            // SUPPNAME
            $this->SUPPNAME->ViewValue = $this->SUPPNAME->CurrentValue;
            $this->SUPPNAME->ViewCustomAttributes = "";

            // COMBNAME
            $this->COMBNAME->ViewValue = $this->COMBNAME->CurrentValue;
            $this->COMBNAME->ViewCustomAttributes = "";

            // GENERICNAME
            $this->GENERICNAME->ViewValue = $this->GENERICNAME->CurrentValue;
            $this->GENERICNAME->ViewCustomAttributes = "";

            // REMARK
            $this->REMARK->ViewValue = $this->REMARK->CurrentValue;
            $this->REMARK->ViewCustomAttributes = "";

            // TEMP
            $this->TEMP->ViewValue = $this->TEMP->CurrentValue;
            $this->TEMP->ViewCustomAttributes = "";

            // PACKING
            $this->PACKING->ViewValue = $this->PACKING->CurrentValue;
            $this->PACKING->ViewValue = FormatNumber($this->PACKING->ViewValue, 2, -2, -2, -2);
            $this->PACKING->ViewCustomAttributes = "";

            // PhysQty
            $this->PhysQty->ViewValue = $this->PhysQty->CurrentValue;
            $this->PhysQty->ViewValue = FormatNumber($this->PhysQty->ViewValue, 2, -2, -2, -2);
            $this->PhysQty->ViewCustomAttributes = "";

            // LedQty
            $this->LedQty->ViewValue = $this->LedQty->CurrentValue;
            $this->LedQty->ViewValue = FormatNumber($this->LedQty->ViewValue, 2, -2, -2, -2);
            $this->LedQty->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PurValue
            $this->PurValue->ViewValue = $this->PurValue->CurrentValue;
            $this->PurValue->ViewValue = FormatNumber($this->PurValue->ViewValue, 2, -2, -2, -2);
            $this->PurValue->ViewCustomAttributes = "";

            // PSGST
            $this->PSGST->ViewValue = $this->PSGST->CurrentValue;
            $this->PSGST->ViewValue = FormatNumber($this->PSGST->ViewValue, 2, -2, -2, -2);
            $this->PSGST->ViewCustomAttributes = "";

            // PCGST
            $this->PCGST->ViewValue = $this->PCGST->CurrentValue;
            $this->PCGST->ViewValue = FormatNumber($this->PCGST->ViewValue, 2, -2, -2, -2);
            $this->PCGST->ViewCustomAttributes = "";

            // SaleValue
            $this->SaleValue->ViewValue = $this->SaleValue->CurrentValue;
            $this->SaleValue->ViewValue = FormatNumber($this->SaleValue->ViewValue, 2, -2, -2, -2);
            $this->SaleValue->ViewCustomAttributes = "";

            // SSGST
            $this->SSGST->ViewValue = $this->SSGST->CurrentValue;
            $this->SSGST->ViewValue = FormatNumber($this->SSGST->ViewValue, 2, -2, -2, -2);
            $this->SSGST->ViewCustomAttributes = "";

            // SCGST
            $this->SCGST->ViewValue = $this->SCGST->CurrentValue;
            $this->SCGST->ViewValue = FormatNumber($this->SCGST->ViewValue, 2, -2, -2, -2);
            $this->SCGST->ViewCustomAttributes = "";

            // SaleRate
            $this->SaleRate->ViewValue = $this->SaleRate->CurrentValue;
            $this->SaleRate->ViewValue = FormatNumber($this->SaleRate->ViewValue, 2, -2, -2, -2);
            $this->SaleRate->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";
            $this->TYPE->TooltipValue = "";

            // DES
            $this->DES->LinkCustomAttributes = "";
            $this->DES->HrefValue = "";
            $this->DES->TooltipValue = "";

            // UM
            $this->UM->LinkCustomAttributes = "";
            $this->UM->HrefValue = "";
            $this->UM->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";
            $this->OQ->TooltipValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";
            $this->RQ->TooltipValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";
            $this->MRQ->TooltipValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";
            $this->IQ->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // SALQTY
            $this->SALQTY->LinkCustomAttributes = "";
            $this->SALQTY->HrefValue = "";
            $this->SALQTY->TooltipValue = "";

            // LASTPURDT
            $this->LASTPURDT->LinkCustomAttributes = "";
            $this->LASTPURDT->HrefValue = "";
            $this->LASTPURDT->TooltipValue = "";

            // LASTSUPP
            $this->LASTSUPP->LinkCustomAttributes = "";
            $this->LASTSUPP->HrefValue = "";
            $this->LASTSUPP->TooltipValue = "";

            // GENNAME
            $this->GENNAME->LinkCustomAttributes = "";
            $this->GENNAME->HrefValue = "";
            $this->GENNAME->TooltipValue = "";

            // LASTISSDT
            $this->LASTISSDT->LinkCustomAttributes = "";
            $this->LASTISSDT->HrefValue = "";
            $this->LASTISSDT->TooltipValue = "";

            // CREATEDDT
            $this->CREATEDDT->LinkCustomAttributes = "";
            $this->CREATEDDT->HrefValue = "";
            $this->CREATEDDT->TooltipValue = "";

            // OPPRC
            $this->OPPRC->LinkCustomAttributes = "";
            $this->OPPRC->HrefValue = "";
            $this->OPPRC->TooltipValue = "";

            // RESTRICT
            $this->RESTRICT->LinkCustomAttributes = "";
            $this->RESTRICT->HrefValue = "";
            $this->RESTRICT->TooltipValue = "";

            // BAWAPRC
            $this->BAWAPRC->LinkCustomAttributes = "";
            $this->BAWAPRC->HrefValue = "";
            $this->BAWAPRC->TooltipValue = "";

            // STAXPER
            $this->STAXPER->LinkCustomAttributes = "";
            $this->STAXPER->HrefValue = "";
            $this->STAXPER->TooltipValue = "";

            // TAXTYPE
            $this->TAXTYPE->LinkCustomAttributes = "";
            $this->TAXTYPE->HrefValue = "";
            $this->TAXTYPE->TooltipValue = "";

            // OLDTAXP
            $this->OLDTAXP->LinkCustomAttributes = "";
            $this->OLDTAXP->HrefValue = "";
            $this->OLDTAXP->TooltipValue = "";

            // TAXUPD
            $this->TAXUPD->LinkCustomAttributes = "";
            $this->TAXUPD->HrefValue = "";
            $this->TAXUPD->TooltipValue = "";

            // PACKAGE
            $this->PACKAGE->LinkCustomAttributes = "";
            $this->PACKAGE->HrefValue = "";
            $this->PACKAGE->TooltipValue = "";

            // NEWRT
            $this->NEWRT->LinkCustomAttributes = "";
            $this->NEWRT->HrefValue = "";
            $this->NEWRT->TooltipValue = "";

            // NEWMRP
            $this->NEWMRP->LinkCustomAttributes = "";
            $this->NEWMRP->HrefValue = "";
            $this->NEWMRP->TooltipValue = "";

            // NEWUR
            $this->NEWUR->LinkCustomAttributes = "";
            $this->NEWUR->HrefValue = "";
            $this->NEWUR->TooltipValue = "";

            // STATUS
            $this->STATUS->LinkCustomAttributes = "";
            $this->STATUS->HrefValue = "";
            $this->STATUS->TooltipValue = "";

            // RETNQTY
            $this->RETNQTY->LinkCustomAttributes = "";
            $this->RETNQTY->HrefValue = "";
            $this->RETNQTY->TooltipValue = "";

            // KEMODISC
            $this->KEMODISC->LinkCustomAttributes = "";
            $this->KEMODISC->HrefValue = "";
            $this->KEMODISC->TooltipValue = "";

            // PATSALE
            $this->PATSALE->LinkCustomAttributes = "";
            $this->PATSALE->HrefValue = "";
            $this->PATSALE->TooltipValue = "";

            // ORGAN
            $this->ORGAN->LinkCustomAttributes = "";
            $this->ORGAN->HrefValue = "";
            $this->ORGAN->TooltipValue = "";

            // OLDRQ
            $this->OLDRQ->LinkCustomAttributes = "";
            $this->OLDRQ->HrefValue = "";
            $this->OLDRQ->TooltipValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";
            $this->DRID->TooltipValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // COMBCODE
            $this->COMBCODE->LinkCustomAttributes = "";
            $this->COMBCODE->HrefValue = "";
            $this->COMBCODE->TooltipValue = "";

            // GENCODE
            $this->GENCODE->LinkCustomAttributes = "";
            $this->GENCODE->HrefValue = "";
            $this->GENCODE->TooltipValue = "";

            // STRENGTH
            $this->STRENGTH->LinkCustomAttributes = "";
            $this->STRENGTH->HrefValue = "";
            $this->STRENGTH->TooltipValue = "";

            // UNIT
            $this->UNIT->LinkCustomAttributes = "";
            $this->UNIT->HrefValue = "";
            $this->UNIT->TooltipValue = "";

            // FORMULARY
            $this->FORMULARY->LinkCustomAttributes = "";
            $this->FORMULARY->HrefValue = "";
            $this->FORMULARY->TooltipValue = "";

            // STOCK
            $this->STOCK->LinkCustomAttributes = "";
            $this->STOCK->HrefValue = "";
            $this->STOCK->TooltipValue = "";

            // RACKNO
            $this->RACKNO->LinkCustomAttributes = "";
            $this->RACKNO->HrefValue = "";
            $this->RACKNO->TooltipValue = "";

            // SUPPNAME
            $this->SUPPNAME->LinkCustomAttributes = "";
            $this->SUPPNAME->HrefValue = "";
            $this->SUPPNAME->TooltipValue = "";

            // COMBNAME
            $this->COMBNAME->LinkCustomAttributes = "";
            $this->COMBNAME->HrefValue = "";
            $this->COMBNAME->TooltipValue = "";

            // GENERICNAME
            $this->GENERICNAME->LinkCustomAttributes = "";
            $this->GENERICNAME->HrefValue = "";
            $this->GENERICNAME->TooltipValue = "";

            // REMARK
            $this->REMARK->LinkCustomAttributes = "";
            $this->REMARK->HrefValue = "";
            $this->REMARK->TooltipValue = "";

            // TEMP
            $this->TEMP->LinkCustomAttributes = "";
            $this->TEMP->HrefValue = "";
            $this->TEMP->TooltipValue = "";

            // PACKING
            $this->PACKING->LinkCustomAttributes = "";
            $this->PACKING->HrefValue = "";
            $this->PACKING->TooltipValue = "";

            // PhysQty
            $this->PhysQty->LinkCustomAttributes = "";
            $this->PhysQty->HrefValue = "";
            $this->PhysQty->TooltipValue = "";

            // LedQty
            $this->LedQty->LinkCustomAttributes = "";
            $this->LedQty->HrefValue = "";
            $this->LedQty->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PurValue
            $this->PurValue->LinkCustomAttributes = "";
            $this->PurValue->HrefValue = "";
            $this->PurValue->TooltipValue = "";

            // PSGST
            $this->PSGST->LinkCustomAttributes = "";
            $this->PSGST->HrefValue = "";
            $this->PSGST->TooltipValue = "";

            // PCGST
            $this->PCGST->LinkCustomAttributes = "";
            $this->PCGST->HrefValue = "";
            $this->PCGST->TooltipValue = "";

            // SaleValue
            $this->SaleValue->LinkCustomAttributes = "";
            $this->SaleValue->HrefValue = "";
            $this->SaleValue->TooltipValue = "";

            // SSGST
            $this->SSGST->LinkCustomAttributes = "";
            $this->SSGST->HrefValue = "";
            $this->SSGST->TooltipValue = "";

            // SCGST
            $this->SCGST->LinkCustomAttributes = "";
            $this->SCGST->HrefValue = "";
            $this->SCGST->TooltipValue = "";

            // SaleRate
            $this->SaleRate->LinkCustomAttributes = "";
            $this->SaleRate->HrefValue = "";
            $this->SaleRate->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
            $this->BRNAME->TooltipValue = "";
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fstore_storemastlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
