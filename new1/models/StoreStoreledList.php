<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreStoreledList extends StoreStoreled
{
    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_storeled';

    // Page object name
    public $PageObjName = "StoreStoreledList";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

    // Grid form hidden field names
    public $FormName = "fstore_storeledlist";
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

        // Table object (store_storeled)
        if (!isset($GLOBALS["store_storeled"]) || get_class($GLOBALS["store_storeled"]) == PROJECT_NAMESPACE . "store_storeled") {
            $GLOBALS["store_storeled"] = &$this;
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
        $this->AddUrl = "StoreStoreledAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "StoreStoreledDelete";
        $this->MultiUpdateUrl = "StoreStoreledUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'store_storeled');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fstore_storeledlistsrch";

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
                $doc = new $class(Container("store_storeled"));
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
        $this->TYPE->setVisibility();
        $this->DN->setVisibility();
        $this->RDN->setVisibility();
        $this->DT->setVisibility();
        $this->PRC->setVisibility();
        $this->OQ->setVisibility();
        $this->RQ->setVisibility();
        $this->MRQ->setVisibility();
        $this->IQ->setVisibility();
        $this->BATCHNO->setVisibility();
        $this->EXPDT->setVisibility();
        $this->BILLNO->setVisibility();
        $this->BILLDT->setVisibility();
        $this->RT->setVisibility();
        $this->VALUE->setVisibility();
        $this->DISC->setVisibility();
        $this->TAXP->setVisibility();
        $this->TAX->setVisibility();
        $this->TAXR->setVisibility();
        $this->DAMT->setVisibility();
        $this->EMPNO->setVisibility();
        $this->PC->setVisibility();
        $this->DRNAME->setVisibility();
        $this->BTIME->setVisibility();
        $this->ONO->setVisibility();
        $this->ODT->setVisibility();
        $this->PURRT->setVisibility();
        $this->GRP->setVisibility();
        $this->IBATCH->setVisibility();
        $this->IPNO->setVisibility();
        $this->OPNO->setVisibility();
        $this->RECID->setVisibility();
        $this->FQTY->setVisibility();
        $this->UR->setVisibility();
        $this->DCID->setVisibility();
        $this->_USERID->setVisibility();
        $this->MODDT->setVisibility();
        $this->FYM->setVisibility();
        $this->PRCBATCH->setVisibility();
        $this->SLNO->setVisibility();
        $this->MRP->setVisibility();
        $this->BILLYM->setVisibility();
        $this->BILLGRP->setVisibility();
        $this->STAFF->setVisibility();
        $this->TEMPIPNO->setVisibility();
        $this->PRNTED->setVisibility();
        $this->PATNAME->setVisibility();
        $this->PJVNO->setVisibility();
        $this->PJVSLNO->setVisibility();
        $this->OTHDISC->setVisibility();
        $this->PJVYM->setVisibility();
        $this->PURDISCPER->setVisibility();
        $this->CASHIER->setVisibility();
        $this->CASHTIME->setVisibility();
        $this->CASHRECD->setVisibility();
        $this->CASHREFNO->setVisibility();
        $this->CASHIERSHIFT->setVisibility();
        $this->PRCODE->setVisibility();
        $this->RELEASEBY->setVisibility();
        $this->CRAUTHOR->setVisibility();
        $this->PAYMENT->setVisibility();
        $this->DRID->setVisibility();
        $this->WARD->setVisibility();
        $this->STAXTYPE->setVisibility();
        $this->PURDISCVAL->setVisibility();
        $this->RNDOFF->setVisibility();
        $this->DISCONMRP->setVisibility();
        $this->DELVDT->setVisibility();
        $this->DELVTIME->setVisibility();
        $this->DELVBY->setVisibility();
        $this->HOSPNO->setVisibility();
        $this->id->setVisibility();
        $this->pbv->setVisibility();
        $this->pbt->setVisibility();
        $this->SiNo->setVisibility();
        $this->Product->setVisibility();
        $this->Mfg->setVisibility();
        $this->HosoID->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->MFRCODE->setVisibility();
        $this->Reception->setVisibility();
        $this->PatID->setVisibility();
        $this->mrnno->setVisibility();
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
        $filterList = Concat($filterList, $this->TYPE->AdvancedSearch->toJson(), ","); // Field TYPE
        $filterList = Concat($filterList, $this->DN->AdvancedSearch->toJson(), ","); // Field DN
        $filterList = Concat($filterList, $this->RDN->AdvancedSearch->toJson(), ","); // Field RDN
        $filterList = Concat($filterList, $this->DT->AdvancedSearch->toJson(), ","); // Field DT
        $filterList = Concat($filterList, $this->PRC->AdvancedSearch->toJson(), ","); // Field PRC
        $filterList = Concat($filterList, $this->OQ->AdvancedSearch->toJson(), ","); // Field OQ
        $filterList = Concat($filterList, $this->RQ->AdvancedSearch->toJson(), ","); // Field RQ
        $filterList = Concat($filterList, $this->MRQ->AdvancedSearch->toJson(), ","); // Field MRQ
        $filterList = Concat($filterList, $this->IQ->AdvancedSearch->toJson(), ","); // Field IQ
        $filterList = Concat($filterList, $this->BATCHNO->AdvancedSearch->toJson(), ","); // Field BATCHNO
        $filterList = Concat($filterList, $this->EXPDT->AdvancedSearch->toJson(), ","); // Field EXPDT
        $filterList = Concat($filterList, $this->BILLNO->AdvancedSearch->toJson(), ","); // Field BILLNO
        $filterList = Concat($filterList, $this->BILLDT->AdvancedSearch->toJson(), ","); // Field BILLDT
        $filterList = Concat($filterList, $this->RT->AdvancedSearch->toJson(), ","); // Field RT
        $filterList = Concat($filterList, $this->VALUE->AdvancedSearch->toJson(), ","); // Field VALUE
        $filterList = Concat($filterList, $this->DISC->AdvancedSearch->toJson(), ","); // Field DISC
        $filterList = Concat($filterList, $this->TAXP->AdvancedSearch->toJson(), ","); // Field TAXP
        $filterList = Concat($filterList, $this->TAX->AdvancedSearch->toJson(), ","); // Field TAX
        $filterList = Concat($filterList, $this->TAXR->AdvancedSearch->toJson(), ","); // Field TAXR
        $filterList = Concat($filterList, $this->DAMT->AdvancedSearch->toJson(), ","); // Field DAMT
        $filterList = Concat($filterList, $this->EMPNO->AdvancedSearch->toJson(), ","); // Field EMPNO
        $filterList = Concat($filterList, $this->PC->AdvancedSearch->toJson(), ","); // Field PC
        $filterList = Concat($filterList, $this->DRNAME->AdvancedSearch->toJson(), ","); // Field DRNAME
        $filterList = Concat($filterList, $this->BTIME->AdvancedSearch->toJson(), ","); // Field BTIME
        $filterList = Concat($filterList, $this->ONO->AdvancedSearch->toJson(), ","); // Field ONO
        $filterList = Concat($filterList, $this->ODT->AdvancedSearch->toJson(), ","); // Field ODT
        $filterList = Concat($filterList, $this->PURRT->AdvancedSearch->toJson(), ","); // Field PURRT
        $filterList = Concat($filterList, $this->GRP->AdvancedSearch->toJson(), ","); // Field GRP
        $filterList = Concat($filterList, $this->IBATCH->AdvancedSearch->toJson(), ","); // Field IBATCH
        $filterList = Concat($filterList, $this->IPNO->AdvancedSearch->toJson(), ","); // Field IPNO
        $filterList = Concat($filterList, $this->OPNO->AdvancedSearch->toJson(), ","); // Field OPNO
        $filterList = Concat($filterList, $this->RECID->AdvancedSearch->toJson(), ","); // Field RECID
        $filterList = Concat($filterList, $this->FQTY->AdvancedSearch->toJson(), ","); // Field FQTY
        $filterList = Concat($filterList, $this->UR->AdvancedSearch->toJson(), ","); // Field UR
        $filterList = Concat($filterList, $this->DCID->AdvancedSearch->toJson(), ","); // Field DCID
        $filterList = Concat($filterList, $this->_USERID->AdvancedSearch->toJson(), ","); // Field USERID
        $filterList = Concat($filterList, $this->MODDT->AdvancedSearch->toJson(), ","); // Field MODDT
        $filterList = Concat($filterList, $this->FYM->AdvancedSearch->toJson(), ","); // Field FYM
        $filterList = Concat($filterList, $this->PRCBATCH->AdvancedSearch->toJson(), ","); // Field PRCBATCH
        $filterList = Concat($filterList, $this->SLNO->AdvancedSearch->toJson(), ","); // Field SLNO
        $filterList = Concat($filterList, $this->MRP->AdvancedSearch->toJson(), ","); // Field MRP
        $filterList = Concat($filterList, $this->BILLYM->AdvancedSearch->toJson(), ","); // Field BILLYM
        $filterList = Concat($filterList, $this->BILLGRP->AdvancedSearch->toJson(), ","); // Field BILLGRP
        $filterList = Concat($filterList, $this->STAFF->AdvancedSearch->toJson(), ","); // Field STAFF
        $filterList = Concat($filterList, $this->TEMPIPNO->AdvancedSearch->toJson(), ","); // Field TEMPIPNO
        $filterList = Concat($filterList, $this->PRNTED->AdvancedSearch->toJson(), ","); // Field PRNTED
        $filterList = Concat($filterList, $this->PATNAME->AdvancedSearch->toJson(), ","); // Field PATNAME
        $filterList = Concat($filterList, $this->PJVNO->AdvancedSearch->toJson(), ","); // Field PJVNO
        $filterList = Concat($filterList, $this->PJVSLNO->AdvancedSearch->toJson(), ","); // Field PJVSLNO
        $filterList = Concat($filterList, $this->OTHDISC->AdvancedSearch->toJson(), ","); // Field OTHDISC
        $filterList = Concat($filterList, $this->PJVYM->AdvancedSearch->toJson(), ","); // Field PJVYM
        $filterList = Concat($filterList, $this->PURDISCPER->AdvancedSearch->toJson(), ","); // Field PURDISCPER
        $filterList = Concat($filterList, $this->CASHIER->AdvancedSearch->toJson(), ","); // Field CASHIER
        $filterList = Concat($filterList, $this->CASHTIME->AdvancedSearch->toJson(), ","); // Field CASHTIME
        $filterList = Concat($filterList, $this->CASHRECD->AdvancedSearch->toJson(), ","); // Field CASHRECD
        $filterList = Concat($filterList, $this->CASHREFNO->AdvancedSearch->toJson(), ","); // Field CASHREFNO
        $filterList = Concat($filterList, $this->CASHIERSHIFT->AdvancedSearch->toJson(), ","); // Field CASHIERSHIFT
        $filterList = Concat($filterList, $this->PRCODE->AdvancedSearch->toJson(), ","); // Field PRCODE
        $filterList = Concat($filterList, $this->RELEASEBY->AdvancedSearch->toJson(), ","); // Field RELEASEBY
        $filterList = Concat($filterList, $this->CRAUTHOR->AdvancedSearch->toJson(), ","); // Field CRAUTHOR
        $filterList = Concat($filterList, $this->PAYMENT->AdvancedSearch->toJson(), ","); // Field PAYMENT
        $filterList = Concat($filterList, $this->DRID->AdvancedSearch->toJson(), ","); // Field DRID
        $filterList = Concat($filterList, $this->WARD->AdvancedSearch->toJson(), ","); // Field WARD
        $filterList = Concat($filterList, $this->STAXTYPE->AdvancedSearch->toJson(), ","); // Field STAXTYPE
        $filterList = Concat($filterList, $this->PURDISCVAL->AdvancedSearch->toJson(), ","); // Field PURDISCVAL
        $filterList = Concat($filterList, $this->RNDOFF->AdvancedSearch->toJson(), ","); // Field RNDOFF
        $filterList = Concat($filterList, $this->DISCONMRP->AdvancedSearch->toJson(), ","); // Field DISCONMRP
        $filterList = Concat($filterList, $this->DELVDT->AdvancedSearch->toJson(), ","); // Field DELVDT
        $filterList = Concat($filterList, $this->DELVTIME->AdvancedSearch->toJson(), ","); // Field DELVTIME
        $filterList = Concat($filterList, $this->DELVBY->AdvancedSearch->toJson(), ","); // Field DELVBY
        $filterList = Concat($filterList, $this->HOSPNO->AdvancedSearch->toJson(), ","); // Field HOSPNO
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->pbv->AdvancedSearch->toJson(), ","); // Field pbv
        $filterList = Concat($filterList, $this->pbt->AdvancedSearch->toJson(), ","); // Field pbt
        $filterList = Concat($filterList, $this->SiNo->AdvancedSearch->toJson(), ","); // Field SiNo
        $filterList = Concat($filterList, $this->Product->AdvancedSearch->toJson(), ","); // Field Product
        $filterList = Concat($filterList, $this->Mfg->AdvancedSearch->toJson(), ","); // Field Mfg
        $filterList = Concat($filterList, $this->HosoID->AdvancedSearch->toJson(), ","); // Field HosoID
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->MFRCODE->AdvancedSearch->toJson(), ","); // Field MFRCODE
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fstore_storeledlistsrch", $filters);
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

        // Field TYPE
        $this->TYPE->AdvancedSearch->SearchValue = @$filter["x_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator = @$filter["z_TYPE"];
        $this->TYPE->AdvancedSearch->SearchCondition = @$filter["v_TYPE"];
        $this->TYPE->AdvancedSearch->SearchValue2 = @$filter["y_TYPE"];
        $this->TYPE->AdvancedSearch->SearchOperator2 = @$filter["w_TYPE"];
        $this->TYPE->AdvancedSearch->save();

        // Field DN
        $this->DN->AdvancedSearch->SearchValue = @$filter["x_DN"];
        $this->DN->AdvancedSearch->SearchOperator = @$filter["z_DN"];
        $this->DN->AdvancedSearch->SearchCondition = @$filter["v_DN"];
        $this->DN->AdvancedSearch->SearchValue2 = @$filter["y_DN"];
        $this->DN->AdvancedSearch->SearchOperator2 = @$filter["w_DN"];
        $this->DN->AdvancedSearch->save();

        // Field RDN
        $this->RDN->AdvancedSearch->SearchValue = @$filter["x_RDN"];
        $this->RDN->AdvancedSearch->SearchOperator = @$filter["z_RDN"];
        $this->RDN->AdvancedSearch->SearchCondition = @$filter["v_RDN"];
        $this->RDN->AdvancedSearch->SearchValue2 = @$filter["y_RDN"];
        $this->RDN->AdvancedSearch->SearchOperator2 = @$filter["w_RDN"];
        $this->RDN->AdvancedSearch->save();

        // Field DT
        $this->DT->AdvancedSearch->SearchValue = @$filter["x_DT"];
        $this->DT->AdvancedSearch->SearchOperator = @$filter["z_DT"];
        $this->DT->AdvancedSearch->SearchCondition = @$filter["v_DT"];
        $this->DT->AdvancedSearch->SearchValue2 = @$filter["y_DT"];
        $this->DT->AdvancedSearch->SearchOperator2 = @$filter["w_DT"];
        $this->DT->AdvancedSearch->save();

        // Field PRC
        $this->PRC->AdvancedSearch->SearchValue = @$filter["x_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator = @$filter["z_PRC"];
        $this->PRC->AdvancedSearch->SearchCondition = @$filter["v_PRC"];
        $this->PRC->AdvancedSearch->SearchValue2 = @$filter["y_PRC"];
        $this->PRC->AdvancedSearch->SearchOperator2 = @$filter["w_PRC"];
        $this->PRC->AdvancedSearch->save();

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

        // Field BATCHNO
        $this->BATCHNO->AdvancedSearch->SearchValue = @$filter["x_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator = @$filter["z_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchCondition = @$filter["v_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchValue2 = @$filter["y_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->SearchOperator2 = @$filter["w_BATCHNO"];
        $this->BATCHNO->AdvancedSearch->save();

        // Field EXPDT
        $this->EXPDT->AdvancedSearch->SearchValue = @$filter["x_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator = @$filter["z_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchCondition = @$filter["v_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchValue2 = @$filter["y_EXPDT"];
        $this->EXPDT->AdvancedSearch->SearchOperator2 = @$filter["w_EXPDT"];
        $this->EXPDT->AdvancedSearch->save();

        // Field BILLNO
        $this->BILLNO->AdvancedSearch->SearchValue = @$filter["x_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchOperator = @$filter["z_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchCondition = @$filter["v_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchValue2 = @$filter["y_BILLNO"];
        $this->BILLNO->AdvancedSearch->SearchOperator2 = @$filter["w_BILLNO"];
        $this->BILLNO->AdvancedSearch->save();

        // Field BILLDT
        $this->BILLDT->AdvancedSearch->SearchValue = @$filter["x_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchOperator = @$filter["z_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchCondition = @$filter["v_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchValue2 = @$filter["y_BILLDT"];
        $this->BILLDT->AdvancedSearch->SearchOperator2 = @$filter["w_BILLDT"];
        $this->BILLDT->AdvancedSearch->save();

        // Field RT
        $this->RT->AdvancedSearch->SearchValue = @$filter["x_RT"];
        $this->RT->AdvancedSearch->SearchOperator = @$filter["z_RT"];
        $this->RT->AdvancedSearch->SearchCondition = @$filter["v_RT"];
        $this->RT->AdvancedSearch->SearchValue2 = @$filter["y_RT"];
        $this->RT->AdvancedSearch->SearchOperator2 = @$filter["w_RT"];
        $this->RT->AdvancedSearch->save();

        // Field VALUE
        $this->VALUE->AdvancedSearch->SearchValue = @$filter["x_VALUE"];
        $this->VALUE->AdvancedSearch->SearchOperator = @$filter["z_VALUE"];
        $this->VALUE->AdvancedSearch->SearchCondition = @$filter["v_VALUE"];
        $this->VALUE->AdvancedSearch->SearchValue2 = @$filter["y_VALUE"];
        $this->VALUE->AdvancedSearch->SearchOperator2 = @$filter["w_VALUE"];
        $this->VALUE->AdvancedSearch->save();

        // Field DISC
        $this->DISC->AdvancedSearch->SearchValue = @$filter["x_DISC"];
        $this->DISC->AdvancedSearch->SearchOperator = @$filter["z_DISC"];
        $this->DISC->AdvancedSearch->SearchCondition = @$filter["v_DISC"];
        $this->DISC->AdvancedSearch->SearchValue2 = @$filter["y_DISC"];
        $this->DISC->AdvancedSearch->SearchOperator2 = @$filter["w_DISC"];
        $this->DISC->AdvancedSearch->save();

        // Field TAXP
        $this->TAXP->AdvancedSearch->SearchValue = @$filter["x_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator = @$filter["z_TAXP"];
        $this->TAXP->AdvancedSearch->SearchCondition = @$filter["v_TAXP"];
        $this->TAXP->AdvancedSearch->SearchValue2 = @$filter["y_TAXP"];
        $this->TAXP->AdvancedSearch->SearchOperator2 = @$filter["w_TAXP"];
        $this->TAXP->AdvancedSearch->save();

        // Field TAX
        $this->TAX->AdvancedSearch->SearchValue = @$filter["x_TAX"];
        $this->TAX->AdvancedSearch->SearchOperator = @$filter["z_TAX"];
        $this->TAX->AdvancedSearch->SearchCondition = @$filter["v_TAX"];
        $this->TAX->AdvancedSearch->SearchValue2 = @$filter["y_TAX"];
        $this->TAX->AdvancedSearch->SearchOperator2 = @$filter["w_TAX"];
        $this->TAX->AdvancedSearch->save();

        // Field TAXR
        $this->TAXR->AdvancedSearch->SearchValue = @$filter["x_TAXR"];
        $this->TAXR->AdvancedSearch->SearchOperator = @$filter["z_TAXR"];
        $this->TAXR->AdvancedSearch->SearchCondition = @$filter["v_TAXR"];
        $this->TAXR->AdvancedSearch->SearchValue2 = @$filter["y_TAXR"];
        $this->TAXR->AdvancedSearch->SearchOperator2 = @$filter["w_TAXR"];
        $this->TAXR->AdvancedSearch->save();

        // Field DAMT
        $this->DAMT->AdvancedSearch->SearchValue = @$filter["x_DAMT"];
        $this->DAMT->AdvancedSearch->SearchOperator = @$filter["z_DAMT"];
        $this->DAMT->AdvancedSearch->SearchCondition = @$filter["v_DAMT"];
        $this->DAMT->AdvancedSearch->SearchValue2 = @$filter["y_DAMT"];
        $this->DAMT->AdvancedSearch->SearchOperator2 = @$filter["w_DAMT"];
        $this->DAMT->AdvancedSearch->save();

        // Field EMPNO
        $this->EMPNO->AdvancedSearch->SearchValue = @$filter["x_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchOperator = @$filter["z_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchCondition = @$filter["v_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchValue2 = @$filter["y_EMPNO"];
        $this->EMPNO->AdvancedSearch->SearchOperator2 = @$filter["w_EMPNO"];
        $this->EMPNO->AdvancedSearch->save();

        // Field PC
        $this->PC->AdvancedSearch->SearchValue = @$filter["x_PC"];
        $this->PC->AdvancedSearch->SearchOperator = @$filter["z_PC"];
        $this->PC->AdvancedSearch->SearchCondition = @$filter["v_PC"];
        $this->PC->AdvancedSearch->SearchValue2 = @$filter["y_PC"];
        $this->PC->AdvancedSearch->SearchOperator2 = @$filter["w_PC"];
        $this->PC->AdvancedSearch->save();

        // Field DRNAME
        $this->DRNAME->AdvancedSearch->SearchValue = @$filter["x_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchOperator = @$filter["z_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchCondition = @$filter["v_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchValue2 = @$filter["y_DRNAME"];
        $this->DRNAME->AdvancedSearch->SearchOperator2 = @$filter["w_DRNAME"];
        $this->DRNAME->AdvancedSearch->save();

        // Field BTIME
        $this->BTIME->AdvancedSearch->SearchValue = @$filter["x_BTIME"];
        $this->BTIME->AdvancedSearch->SearchOperator = @$filter["z_BTIME"];
        $this->BTIME->AdvancedSearch->SearchCondition = @$filter["v_BTIME"];
        $this->BTIME->AdvancedSearch->SearchValue2 = @$filter["y_BTIME"];
        $this->BTIME->AdvancedSearch->SearchOperator2 = @$filter["w_BTIME"];
        $this->BTIME->AdvancedSearch->save();

        // Field ONO
        $this->ONO->AdvancedSearch->SearchValue = @$filter["x_ONO"];
        $this->ONO->AdvancedSearch->SearchOperator = @$filter["z_ONO"];
        $this->ONO->AdvancedSearch->SearchCondition = @$filter["v_ONO"];
        $this->ONO->AdvancedSearch->SearchValue2 = @$filter["y_ONO"];
        $this->ONO->AdvancedSearch->SearchOperator2 = @$filter["w_ONO"];
        $this->ONO->AdvancedSearch->save();

        // Field ODT
        $this->ODT->AdvancedSearch->SearchValue = @$filter["x_ODT"];
        $this->ODT->AdvancedSearch->SearchOperator = @$filter["z_ODT"];
        $this->ODT->AdvancedSearch->SearchCondition = @$filter["v_ODT"];
        $this->ODT->AdvancedSearch->SearchValue2 = @$filter["y_ODT"];
        $this->ODT->AdvancedSearch->SearchOperator2 = @$filter["w_ODT"];
        $this->ODT->AdvancedSearch->save();

        // Field PURRT
        $this->PURRT->AdvancedSearch->SearchValue = @$filter["x_PURRT"];
        $this->PURRT->AdvancedSearch->SearchOperator = @$filter["z_PURRT"];
        $this->PURRT->AdvancedSearch->SearchCondition = @$filter["v_PURRT"];
        $this->PURRT->AdvancedSearch->SearchValue2 = @$filter["y_PURRT"];
        $this->PURRT->AdvancedSearch->SearchOperator2 = @$filter["w_PURRT"];
        $this->PURRT->AdvancedSearch->save();

        // Field GRP
        $this->GRP->AdvancedSearch->SearchValue = @$filter["x_GRP"];
        $this->GRP->AdvancedSearch->SearchOperator = @$filter["z_GRP"];
        $this->GRP->AdvancedSearch->SearchCondition = @$filter["v_GRP"];
        $this->GRP->AdvancedSearch->SearchValue2 = @$filter["y_GRP"];
        $this->GRP->AdvancedSearch->SearchOperator2 = @$filter["w_GRP"];
        $this->GRP->AdvancedSearch->save();

        // Field IBATCH
        $this->IBATCH->AdvancedSearch->SearchValue = @$filter["x_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchOperator = @$filter["z_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchCondition = @$filter["v_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchValue2 = @$filter["y_IBATCH"];
        $this->IBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_IBATCH"];
        $this->IBATCH->AdvancedSearch->save();

        // Field IPNO
        $this->IPNO->AdvancedSearch->SearchValue = @$filter["x_IPNO"];
        $this->IPNO->AdvancedSearch->SearchOperator = @$filter["z_IPNO"];
        $this->IPNO->AdvancedSearch->SearchCondition = @$filter["v_IPNO"];
        $this->IPNO->AdvancedSearch->SearchValue2 = @$filter["y_IPNO"];
        $this->IPNO->AdvancedSearch->SearchOperator2 = @$filter["w_IPNO"];
        $this->IPNO->AdvancedSearch->save();

        // Field OPNO
        $this->OPNO->AdvancedSearch->SearchValue = @$filter["x_OPNO"];
        $this->OPNO->AdvancedSearch->SearchOperator = @$filter["z_OPNO"];
        $this->OPNO->AdvancedSearch->SearchCondition = @$filter["v_OPNO"];
        $this->OPNO->AdvancedSearch->SearchValue2 = @$filter["y_OPNO"];
        $this->OPNO->AdvancedSearch->SearchOperator2 = @$filter["w_OPNO"];
        $this->OPNO->AdvancedSearch->save();

        // Field RECID
        $this->RECID->AdvancedSearch->SearchValue = @$filter["x_RECID"];
        $this->RECID->AdvancedSearch->SearchOperator = @$filter["z_RECID"];
        $this->RECID->AdvancedSearch->SearchCondition = @$filter["v_RECID"];
        $this->RECID->AdvancedSearch->SearchValue2 = @$filter["y_RECID"];
        $this->RECID->AdvancedSearch->SearchOperator2 = @$filter["w_RECID"];
        $this->RECID->AdvancedSearch->save();

        // Field FQTY
        $this->FQTY->AdvancedSearch->SearchValue = @$filter["x_FQTY"];
        $this->FQTY->AdvancedSearch->SearchOperator = @$filter["z_FQTY"];
        $this->FQTY->AdvancedSearch->SearchCondition = @$filter["v_FQTY"];
        $this->FQTY->AdvancedSearch->SearchValue2 = @$filter["y_FQTY"];
        $this->FQTY->AdvancedSearch->SearchOperator2 = @$filter["w_FQTY"];
        $this->FQTY->AdvancedSearch->save();

        // Field UR
        $this->UR->AdvancedSearch->SearchValue = @$filter["x_UR"];
        $this->UR->AdvancedSearch->SearchOperator = @$filter["z_UR"];
        $this->UR->AdvancedSearch->SearchCondition = @$filter["v_UR"];
        $this->UR->AdvancedSearch->SearchValue2 = @$filter["y_UR"];
        $this->UR->AdvancedSearch->SearchOperator2 = @$filter["w_UR"];
        $this->UR->AdvancedSearch->save();

        // Field DCID
        $this->DCID->AdvancedSearch->SearchValue = @$filter["x_DCID"];
        $this->DCID->AdvancedSearch->SearchOperator = @$filter["z_DCID"];
        $this->DCID->AdvancedSearch->SearchCondition = @$filter["v_DCID"];
        $this->DCID->AdvancedSearch->SearchValue2 = @$filter["y_DCID"];
        $this->DCID->AdvancedSearch->SearchOperator2 = @$filter["w_DCID"];
        $this->DCID->AdvancedSearch->save();

        // Field USERID
        $this->_USERID->AdvancedSearch->SearchValue = @$filter["x__USERID"];
        $this->_USERID->AdvancedSearch->SearchOperator = @$filter["z__USERID"];
        $this->_USERID->AdvancedSearch->SearchCondition = @$filter["v__USERID"];
        $this->_USERID->AdvancedSearch->SearchValue2 = @$filter["y__USERID"];
        $this->_USERID->AdvancedSearch->SearchOperator2 = @$filter["w__USERID"];
        $this->_USERID->AdvancedSearch->save();

        // Field MODDT
        $this->MODDT->AdvancedSearch->SearchValue = @$filter["x_MODDT"];
        $this->MODDT->AdvancedSearch->SearchOperator = @$filter["z_MODDT"];
        $this->MODDT->AdvancedSearch->SearchCondition = @$filter["v_MODDT"];
        $this->MODDT->AdvancedSearch->SearchValue2 = @$filter["y_MODDT"];
        $this->MODDT->AdvancedSearch->SearchOperator2 = @$filter["w_MODDT"];
        $this->MODDT->AdvancedSearch->save();

        // Field FYM
        $this->FYM->AdvancedSearch->SearchValue = @$filter["x_FYM"];
        $this->FYM->AdvancedSearch->SearchOperator = @$filter["z_FYM"];
        $this->FYM->AdvancedSearch->SearchCondition = @$filter["v_FYM"];
        $this->FYM->AdvancedSearch->SearchValue2 = @$filter["y_FYM"];
        $this->FYM->AdvancedSearch->SearchOperator2 = @$filter["w_FYM"];
        $this->FYM->AdvancedSearch->save();

        // Field PRCBATCH
        $this->PRCBATCH->AdvancedSearch->SearchValue = @$filter["x_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchOperator = @$filter["z_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchCondition = @$filter["v_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchValue2 = @$filter["y_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->SearchOperator2 = @$filter["w_PRCBATCH"];
        $this->PRCBATCH->AdvancedSearch->save();

        // Field SLNO
        $this->SLNO->AdvancedSearch->SearchValue = @$filter["x_SLNO"];
        $this->SLNO->AdvancedSearch->SearchOperator = @$filter["z_SLNO"];
        $this->SLNO->AdvancedSearch->SearchCondition = @$filter["v_SLNO"];
        $this->SLNO->AdvancedSearch->SearchValue2 = @$filter["y_SLNO"];
        $this->SLNO->AdvancedSearch->SearchOperator2 = @$filter["w_SLNO"];
        $this->SLNO->AdvancedSearch->save();

        // Field MRP
        $this->MRP->AdvancedSearch->SearchValue = @$filter["x_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator = @$filter["z_MRP"];
        $this->MRP->AdvancedSearch->SearchCondition = @$filter["v_MRP"];
        $this->MRP->AdvancedSearch->SearchValue2 = @$filter["y_MRP"];
        $this->MRP->AdvancedSearch->SearchOperator2 = @$filter["w_MRP"];
        $this->MRP->AdvancedSearch->save();

        // Field BILLYM
        $this->BILLYM->AdvancedSearch->SearchValue = @$filter["x_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchOperator = @$filter["z_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchCondition = @$filter["v_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchValue2 = @$filter["y_BILLYM"];
        $this->BILLYM->AdvancedSearch->SearchOperator2 = @$filter["w_BILLYM"];
        $this->BILLYM->AdvancedSearch->save();

        // Field BILLGRP
        $this->BILLGRP->AdvancedSearch->SearchValue = @$filter["x_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchOperator = @$filter["z_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchCondition = @$filter["v_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchValue2 = @$filter["y_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->SearchOperator2 = @$filter["w_BILLGRP"];
        $this->BILLGRP->AdvancedSearch->save();

        // Field STAFF
        $this->STAFF->AdvancedSearch->SearchValue = @$filter["x_STAFF"];
        $this->STAFF->AdvancedSearch->SearchOperator = @$filter["z_STAFF"];
        $this->STAFF->AdvancedSearch->SearchCondition = @$filter["v_STAFF"];
        $this->STAFF->AdvancedSearch->SearchValue2 = @$filter["y_STAFF"];
        $this->STAFF->AdvancedSearch->SearchOperator2 = @$filter["w_STAFF"];
        $this->STAFF->AdvancedSearch->save();

        // Field TEMPIPNO
        $this->TEMPIPNO->AdvancedSearch->SearchValue = @$filter["x_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchOperator = @$filter["z_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchCondition = @$filter["v_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchValue2 = @$filter["y_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->SearchOperator2 = @$filter["w_TEMPIPNO"];
        $this->TEMPIPNO->AdvancedSearch->save();

        // Field PRNTED
        $this->PRNTED->AdvancedSearch->SearchValue = @$filter["x_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchOperator = @$filter["z_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchCondition = @$filter["v_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchValue2 = @$filter["y_PRNTED"];
        $this->PRNTED->AdvancedSearch->SearchOperator2 = @$filter["w_PRNTED"];
        $this->PRNTED->AdvancedSearch->save();

        // Field PATNAME
        $this->PATNAME->AdvancedSearch->SearchValue = @$filter["x_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchOperator = @$filter["z_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchCondition = @$filter["v_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchValue2 = @$filter["y_PATNAME"];
        $this->PATNAME->AdvancedSearch->SearchOperator2 = @$filter["w_PATNAME"];
        $this->PATNAME->AdvancedSearch->save();

        // Field PJVNO
        $this->PJVNO->AdvancedSearch->SearchValue = @$filter["x_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchOperator = @$filter["z_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchCondition = @$filter["v_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVNO"];
        $this->PJVNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVNO"];
        $this->PJVNO->AdvancedSearch->save();

        // Field PJVSLNO
        $this->PJVSLNO->AdvancedSearch->SearchValue = @$filter["x_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchOperator = @$filter["z_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchCondition = @$filter["v_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchValue2 = @$filter["y_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->SearchOperator2 = @$filter["w_PJVSLNO"];
        $this->PJVSLNO->AdvancedSearch->save();

        // Field OTHDISC
        $this->OTHDISC->AdvancedSearch->SearchValue = @$filter["x_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchOperator = @$filter["z_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchCondition = @$filter["v_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchValue2 = @$filter["y_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->SearchOperator2 = @$filter["w_OTHDISC"];
        $this->OTHDISC->AdvancedSearch->save();

        // Field PJVYM
        $this->PJVYM->AdvancedSearch->SearchValue = @$filter["x_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchOperator = @$filter["z_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchCondition = @$filter["v_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchValue2 = @$filter["y_PJVYM"];
        $this->PJVYM->AdvancedSearch->SearchOperator2 = @$filter["w_PJVYM"];
        $this->PJVYM->AdvancedSearch->save();

        // Field PURDISCPER
        $this->PURDISCPER->AdvancedSearch->SearchValue = @$filter["x_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchOperator = @$filter["z_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchCondition = @$filter["v_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCPER"];
        $this->PURDISCPER->AdvancedSearch->save();

        // Field CASHIER
        $this->CASHIER->AdvancedSearch->SearchValue = @$filter["x_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchOperator = @$filter["z_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchCondition = @$filter["v_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchValue2 = @$filter["y_CASHIER"];
        $this->CASHIER->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIER"];
        $this->CASHIER->AdvancedSearch->save();

        // Field CASHTIME
        $this->CASHTIME->AdvancedSearch->SearchValue = @$filter["x_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchOperator = @$filter["z_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchCondition = @$filter["v_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchValue2 = @$filter["y_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->SearchOperator2 = @$filter["w_CASHTIME"];
        $this->CASHTIME->AdvancedSearch->save();

        // Field CASHRECD
        $this->CASHRECD->AdvancedSearch->SearchValue = @$filter["x_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchOperator = @$filter["z_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchCondition = @$filter["v_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchValue2 = @$filter["y_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->SearchOperator2 = @$filter["w_CASHRECD"];
        $this->CASHRECD->AdvancedSearch->save();

        // Field CASHREFNO
        $this->CASHREFNO->AdvancedSearch->SearchValue = @$filter["x_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchOperator = @$filter["z_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchCondition = @$filter["v_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchValue2 = @$filter["y_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->SearchOperator2 = @$filter["w_CASHREFNO"];
        $this->CASHREFNO->AdvancedSearch->save();

        // Field CASHIERSHIFT
        $this->CASHIERSHIFT->AdvancedSearch->SearchValue = @$filter["x_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchOperator = @$filter["z_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchCondition = @$filter["v_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchValue2 = @$filter["y_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->SearchOperator2 = @$filter["w_CASHIERSHIFT"];
        $this->CASHIERSHIFT->AdvancedSearch->save();

        // Field PRCODE
        $this->PRCODE->AdvancedSearch->SearchValue = @$filter["x_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator = @$filter["z_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchCondition = @$filter["v_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchValue2 = @$filter["y_PRCODE"];
        $this->PRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_PRCODE"];
        $this->PRCODE->AdvancedSearch->save();

        // Field RELEASEBY
        $this->RELEASEBY->AdvancedSearch->SearchValue = @$filter["x_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchOperator = @$filter["z_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchCondition = @$filter["v_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchValue2 = @$filter["y_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->SearchOperator2 = @$filter["w_RELEASEBY"];
        $this->RELEASEBY->AdvancedSearch->save();

        // Field CRAUTHOR
        $this->CRAUTHOR->AdvancedSearch->SearchValue = @$filter["x_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchOperator = @$filter["z_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchCondition = @$filter["v_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchValue2 = @$filter["y_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->SearchOperator2 = @$filter["w_CRAUTHOR"];
        $this->CRAUTHOR->AdvancedSearch->save();

        // Field PAYMENT
        $this->PAYMENT->AdvancedSearch->SearchValue = @$filter["x_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchOperator = @$filter["z_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchCondition = @$filter["v_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchValue2 = @$filter["y_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->SearchOperator2 = @$filter["w_PAYMENT"];
        $this->PAYMENT->AdvancedSearch->save();

        // Field DRID
        $this->DRID->AdvancedSearch->SearchValue = @$filter["x_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator = @$filter["z_DRID"];
        $this->DRID->AdvancedSearch->SearchCondition = @$filter["v_DRID"];
        $this->DRID->AdvancedSearch->SearchValue2 = @$filter["y_DRID"];
        $this->DRID->AdvancedSearch->SearchOperator2 = @$filter["w_DRID"];
        $this->DRID->AdvancedSearch->save();

        // Field WARD
        $this->WARD->AdvancedSearch->SearchValue = @$filter["x_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator = @$filter["z_WARD"];
        $this->WARD->AdvancedSearch->SearchCondition = @$filter["v_WARD"];
        $this->WARD->AdvancedSearch->SearchValue2 = @$filter["y_WARD"];
        $this->WARD->AdvancedSearch->SearchOperator2 = @$filter["w_WARD"];
        $this->WARD->AdvancedSearch->save();

        // Field STAXTYPE
        $this->STAXTYPE->AdvancedSearch->SearchValue = @$filter["x_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchOperator = @$filter["z_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchCondition = @$filter["v_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchValue2 = @$filter["y_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->SearchOperator2 = @$filter["w_STAXTYPE"];
        $this->STAXTYPE->AdvancedSearch->save();

        // Field PURDISCVAL
        $this->PURDISCVAL->AdvancedSearch->SearchValue = @$filter["x_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchOperator = @$filter["z_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchCondition = @$filter["v_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchValue2 = @$filter["y_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->SearchOperator2 = @$filter["w_PURDISCVAL"];
        $this->PURDISCVAL->AdvancedSearch->save();

        // Field RNDOFF
        $this->RNDOFF->AdvancedSearch->SearchValue = @$filter["x_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchOperator = @$filter["z_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchCondition = @$filter["v_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchValue2 = @$filter["y_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->SearchOperator2 = @$filter["w_RNDOFF"];
        $this->RNDOFF->AdvancedSearch->save();

        // Field DISCONMRP
        $this->DISCONMRP->AdvancedSearch->SearchValue = @$filter["x_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchOperator = @$filter["z_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchCondition = @$filter["v_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchValue2 = @$filter["y_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->SearchOperator2 = @$filter["w_DISCONMRP"];
        $this->DISCONMRP->AdvancedSearch->save();

        // Field DELVDT
        $this->DELVDT->AdvancedSearch->SearchValue = @$filter["x_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchOperator = @$filter["z_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchCondition = @$filter["v_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchValue2 = @$filter["y_DELVDT"];
        $this->DELVDT->AdvancedSearch->SearchOperator2 = @$filter["w_DELVDT"];
        $this->DELVDT->AdvancedSearch->save();

        // Field DELVTIME
        $this->DELVTIME->AdvancedSearch->SearchValue = @$filter["x_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchOperator = @$filter["z_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchCondition = @$filter["v_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchValue2 = @$filter["y_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->SearchOperator2 = @$filter["w_DELVTIME"];
        $this->DELVTIME->AdvancedSearch->save();

        // Field DELVBY
        $this->DELVBY->AdvancedSearch->SearchValue = @$filter["x_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchOperator = @$filter["z_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchCondition = @$filter["v_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchValue2 = @$filter["y_DELVBY"];
        $this->DELVBY->AdvancedSearch->SearchOperator2 = @$filter["w_DELVBY"];
        $this->DELVBY->AdvancedSearch->save();

        // Field HOSPNO
        $this->HOSPNO->AdvancedSearch->SearchValue = @$filter["x_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchOperator = @$filter["z_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchCondition = @$filter["v_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchValue2 = @$filter["y_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->SearchOperator2 = @$filter["w_HOSPNO"];
        $this->HOSPNO->AdvancedSearch->save();

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field pbv
        $this->pbv->AdvancedSearch->SearchValue = @$filter["x_pbv"];
        $this->pbv->AdvancedSearch->SearchOperator = @$filter["z_pbv"];
        $this->pbv->AdvancedSearch->SearchCondition = @$filter["v_pbv"];
        $this->pbv->AdvancedSearch->SearchValue2 = @$filter["y_pbv"];
        $this->pbv->AdvancedSearch->SearchOperator2 = @$filter["w_pbv"];
        $this->pbv->AdvancedSearch->save();

        // Field pbt
        $this->pbt->AdvancedSearch->SearchValue = @$filter["x_pbt"];
        $this->pbt->AdvancedSearch->SearchOperator = @$filter["z_pbt"];
        $this->pbt->AdvancedSearch->SearchCondition = @$filter["v_pbt"];
        $this->pbt->AdvancedSearch->SearchValue2 = @$filter["y_pbt"];
        $this->pbt->AdvancedSearch->SearchOperator2 = @$filter["w_pbt"];
        $this->pbt->AdvancedSearch->save();

        // Field SiNo
        $this->SiNo->AdvancedSearch->SearchValue = @$filter["x_SiNo"];
        $this->SiNo->AdvancedSearch->SearchOperator = @$filter["z_SiNo"];
        $this->SiNo->AdvancedSearch->SearchCondition = @$filter["v_SiNo"];
        $this->SiNo->AdvancedSearch->SearchValue2 = @$filter["y_SiNo"];
        $this->SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_SiNo"];
        $this->SiNo->AdvancedSearch->save();

        // Field Product
        $this->Product->AdvancedSearch->SearchValue = @$filter["x_Product"];
        $this->Product->AdvancedSearch->SearchOperator = @$filter["z_Product"];
        $this->Product->AdvancedSearch->SearchCondition = @$filter["v_Product"];
        $this->Product->AdvancedSearch->SearchValue2 = @$filter["y_Product"];
        $this->Product->AdvancedSearch->SearchOperator2 = @$filter["w_Product"];
        $this->Product->AdvancedSearch->save();

        // Field Mfg
        $this->Mfg->AdvancedSearch->SearchValue = @$filter["x_Mfg"];
        $this->Mfg->AdvancedSearch->SearchOperator = @$filter["z_Mfg"];
        $this->Mfg->AdvancedSearch->SearchCondition = @$filter["v_Mfg"];
        $this->Mfg->AdvancedSearch->SearchValue2 = @$filter["y_Mfg"];
        $this->Mfg->AdvancedSearch->SearchOperator2 = @$filter["w_Mfg"];
        $this->Mfg->AdvancedSearch->save();

        // Field HosoID
        $this->HosoID->AdvancedSearch->SearchValue = @$filter["x_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator = @$filter["z_HosoID"];
        $this->HosoID->AdvancedSearch->SearchCondition = @$filter["v_HosoID"];
        $this->HosoID->AdvancedSearch->SearchValue2 = @$filter["y_HosoID"];
        $this->HosoID->AdvancedSearch->SearchOperator2 = @$filter["w_HosoID"];
        $this->HosoID->AdvancedSearch->save();

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

        // Field MFRCODE
        $this->MFRCODE->AdvancedSearch->SearchValue = @$filter["x_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator = @$filter["z_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchCondition = @$filter["v_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchValue2 = @$filter["y_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->SearchOperator2 = @$filter["w_MFRCODE"];
        $this->MFRCODE->AdvancedSearch->save();

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

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
        $this->buildBasicSearchSql($where, $this->TYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RDN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BATCHNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EMPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PC, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DRNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ONO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IBATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RECID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DCID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_USERID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCBATCH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BILLGRP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->STAFF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TEMPIPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRNTED, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PATNAME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVSLNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PJVYM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHIER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHREFNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CASHIERSHIFT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RELEASEBY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CRAUTHOR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PAYMENT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DRID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WARD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->STAXTYPE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DELVTIME, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DELVBY, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HOSPNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Product, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mfg, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MFRCODE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
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
            $this->updateSort($this->TYPE); // TYPE
            $this->updateSort($this->DN); // DN
            $this->updateSort($this->RDN); // RDN
            $this->updateSort($this->DT); // DT
            $this->updateSort($this->PRC); // PRC
            $this->updateSort($this->OQ); // OQ
            $this->updateSort($this->RQ); // RQ
            $this->updateSort($this->MRQ); // MRQ
            $this->updateSort($this->IQ); // IQ
            $this->updateSort($this->BATCHNO); // BATCHNO
            $this->updateSort($this->EXPDT); // EXPDT
            $this->updateSort($this->BILLNO); // BILLNO
            $this->updateSort($this->BILLDT); // BILLDT
            $this->updateSort($this->RT); // RT
            $this->updateSort($this->VALUE); // VALUE
            $this->updateSort($this->DISC); // DISC
            $this->updateSort($this->TAXP); // TAXP
            $this->updateSort($this->TAX); // TAX
            $this->updateSort($this->TAXR); // TAXR
            $this->updateSort($this->DAMT); // DAMT
            $this->updateSort($this->EMPNO); // EMPNO
            $this->updateSort($this->PC); // PC
            $this->updateSort($this->DRNAME); // DRNAME
            $this->updateSort($this->BTIME); // BTIME
            $this->updateSort($this->ONO); // ONO
            $this->updateSort($this->ODT); // ODT
            $this->updateSort($this->PURRT); // PURRT
            $this->updateSort($this->GRP); // GRP
            $this->updateSort($this->IBATCH); // IBATCH
            $this->updateSort($this->IPNO); // IPNO
            $this->updateSort($this->OPNO); // OPNO
            $this->updateSort($this->RECID); // RECID
            $this->updateSort($this->FQTY); // FQTY
            $this->updateSort($this->UR); // UR
            $this->updateSort($this->DCID); // DCID
            $this->updateSort($this->_USERID); // USERID
            $this->updateSort($this->MODDT); // MODDT
            $this->updateSort($this->FYM); // FYM
            $this->updateSort($this->PRCBATCH); // PRCBATCH
            $this->updateSort($this->SLNO); // SLNO
            $this->updateSort($this->MRP); // MRP
            $this->updateSort($this->BILLYM); // BILLYM
            $this->updateSort($this->BILLGRP); // BILLGRP
            $this->updateSort($this->STAFF); // STAFF
            $this->updateSort($this->TEMPIPNO); // TEMPIPNO
            $this->updateSort($this->PRNTED); // PRNTED
            $this->updateSort($this->PATNAME); // PATNAME
            $this->updateSort($this->PJVNO); // PJVNO
            $this->updateSort($this->PJVSLNO); // PJVSLNO
            $this->updateSort($this->OTHDISC); // OTHDISC
            $this->updateSort($this->PJVYM); // PJVYM
            $this->updateSort($this->PURDISCPER); // PURDISCPER
            $this->updateSort($this->CASHIER); // CASHIER
            $this->updateSort($this->CASHTIME); // CASHTIME
            $this->updateSort($this->CASHRECD); // CASHRECD
            $this->updateSort($this->CASHREFNO); // CASHREFNO
            $this->updateSort($this->CASHIERSHIFT); // CASHIERSHIFT
            $this->updateSort($this->PRCODE); // PRCODE
            $this->updateSort($this->RELEASEBY); // RELEASEBY
            $this->updateSort($this->CRAUTHOR); // CRAUTHOR
            $this->updateSort($this->PAYMENT); // PAYMENT
            $this->updateSort($this->DRID); // DRID
            $this->updateSort($this->WARD); // WARD
            $this->updateSort($this->STAXTYPE); // STAXTYPE
            $this->updateSort($this->PURDISCVAL); // PURDISCVAL
            $this->updateSort($this->RNDOFF); // RNDOFF
            $this->updateSort($this->DISCONMRP); // DISCONMRP
            $this->updateSort($this->DELVDT); // DELVDT
            $this->updateSort($this->DELVTIME); // DELVTIME
            $this->updateSort($this->DELVBY); // DELVBY
            $this->updateSort($this->HOSPNO); // HOSPNO
            $this->updateSort($this->id); // id
            $this->updateSort($this->pbv); // pbv
            $this->updateSort($this->pbt); // pbt
            $this->updateSort($this->SiNo); // SiNo
            $this->updateSort($this->Product); // Product
            $this->updateSort($this->Mfg); // Mfg
            $this->updateSort($this->HosoID); // HosoID
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->MFRCODE); // MFRCODE
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->mrnno); // mrnno
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
                $this->TYPE->setSort("");
                $this->DN->setSort("");
                $this->RDN->setSort("");
                $this->DT->setSort("");
                $this->PRC->setSort("");
                $this->OQ->setSort("");
                $this->RQ->setSort("");
                $this->MRQ->setSort("");
                $this->IQ->setSort("");
                $this->BATCHNO->setSort("");
                $this->EXPDT->setSort("");
                $this->BILLNO->setSort("");
                $this->BILLDT->setSort("");
                $this->RT->setSort("");
                $this->VALUE->setSort("");
                $this->DISC->setSort("");
                $this->TAXP->setSort("");
                $this->TAX->setSort("");
                $this->TAXR->setSort("");
                $this->DAMT->setSort("");
                $this->EMPNO->setSort("");
                $this->PC->setSort("");
                $this->DRNAME->setSort("");
                $this->BTIME->setSort("");
                $this->ONO->setSort("");
                $this->ODT->setSort("");
                $this->PURRT->setSort("");
                $this->GRP->setSort("");
                $this->IBATCH->setSort("");
                $this->IPNO->setSort("");
                $this->OPNO->setSort("");
                $this->RECID->setSort("");
                $this->FQTY->setSort("");
                $this->UR->setSort("");
                $this->DCID->setSort("");
                $this->_USERID->setSort("");
                $this->MODDT->setSort("");
                $this->FYM->setSort("");
                $this->PRCBATCH->setSort("");
                $this->SLNO->setSort("");
                $this->MRP->setSort("");
                $this->BILLYM->setSort("");
                $this->BILLGRP->setSort("");
                $this->STAFF->setSort("");
                $this->TEMPIPNO->setSort("");
                $this->PRNTED->setSort("");
                $this->PATNAME->setSort("");
                $this->PJVNO->setSort("");
                $this->PJVSLNO->setSort("");
                $this->OTHDISC->setSort("");
                $this->PJVYM->setSort("");
                $this->PURDISCPER->setSort("");
                $this->CASHIER->setSort("");
                $this->CASHTIME->setSort("");
                $this->CASHRECD->setSort("");
                $this->CASHREFNO->setSort("");
                $this->CASHIERSHIFT->setSort("");
                $this->PRCODE->setSort("");
                $this->RELEASEBY->setSort("");
                $this->CRAUTHOR->setSort("");
                $this->PAYMENT->setSort("");
                $this->DRID->setSort("");
                $this->WARD->setSort("");
                $this->STAXTYPE->setSort("");
                $this->PURDISCVAL->setSort("");
                $this->RNDOFF->setSort("");
                $this->DISCONMRP->setSort("");
                $this->DELVDT->setSort("");
                $this->DELVTIME->setSort("");
                $this->DELVBY->setSort("");
                $this->HOSPNO->setSort("");
                $this->id->setSort("");
                $this->pbv->setSort("");
                $this->pbt->setSort("");
                $this->SiNo->setSort("");
                $this->Product->setSort("");
                $this->Mfg->setSort("");
                $this->HosoID->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->MFRCODE->setSort("");
                $this->Reception->setSort("");
                $this->PatID->setSort("");
                $this->mrnno->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fstore_storeledlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fstore_storeledlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fstore_storeledlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->TYPE->setDbValue($row['TYPE']);
        $this->DN->setDbValue($row['DN']);
        $this->RDN->setDbValue($row['RDN']);
        $this->DT->setDbValue($row['DT']);
        $this->PRC->setDbValue($row['PRC']);
        $this->OQ->setDbValue($row['OQ']);
        $this->RQ->setDbValue($row['RQ']);
        $this->MRQ->setDbValue($row['MRQ']);
        $this->IQ->setDbValue($row['IQ']);
        $this->BATCHNO->setDbValue($row['BATCHNO']);
        $this->EXPDT->setDbValue($row['EXPDT']);
        $this->BILLNO->setDbValue($row['BILLNO']);
        $this->BILLDT->setDbValue($row['BILLDT']);
        $this->RT->setDbValue($row['RT']);
        $this->VALUE->setDbValue($row['VALUE']);
        $this->DISC->setDbValue($row['DISC']);
        $this->TAXP->setDbValue($row['TAXP']);
        $this->TAX->setDbValue($row['TAX']);
        $this->TAXR->setDbValue($row['TAXR']);
        $this->DAMT->setDbValue($row['DAMT']);
        $this->EMPNO->setDbValue($row['EMPNO']);
        $this->PC->setDbValue($row['PC']);
        $this->DRNAME->setDbValue($row['DRNAME']);
        $this->BTIME->setDbValue($row['BTIME']);
        $this->ONO->setDbValue($row['ONO']);
        $this->ODT->setDbValue($row['ODT']);
        $this->PURRT->setDbValue($row['PURRT']);
        $this->GRP->setDbValue($row['GRP']);
        $this->IBATCH->setDbValue($row['IBATCH']);
        $this->IPNO->setDbValue($row['IPNO']);
        $this->OPNO->setDbValue($row['OPNO']);
        $this->RECID->setDbValue($row['RECID']);
        $this->FQTY->setDbValue($row['FQTY']);
        $this->UR->setDbValue($row['UR']);
        $this->DCID->setDbValue($row['DCID']);
        $this->_USERID->setDbValue($row['USERID']);
        $this->MODDT->setDbValue($row['MODDT']);
        $this->FYM->setDbValue($row['FYM']);
        $this->PRCBATCH->setDbValue($row['PRCBATCH']);
        $this->SLNO->setDbValue($row['SLNO']);
        $this->MRP->setDbValue($row['MRP']);
        $this->BILLYM->setDbValue($row['BILLYM']);
        $this->BILLGRP->setDbValue($row['BILLGRP']);
        $this->STAFF->setDbValue($row['STAFF']);
        $this->TEMPIPNO->setDbValue($row['TEMPIPNO']);
        $this->PRNTED->setDbValue($row['PRNTED']);
        $this->PATNAME->setDbValue($row['PATNAME']);
        $this->PJVNO->setDbValue($row['PJVNO']);
        $this->PJVSLNO->setDbValue($row['PJVSLNO']);
        $this->OTHDISC->setDbValue($row['OTHDISC']);
        $this->PJVYM->setDbValue($row['PJVYM']);
        $this->PURDISCPER->setDbValue($row['PURDISCPER']);
        $this->CASHIER->setDbValue($row['CASHIER']);
        $this->CASHTIME->setDbValue($row['CASHTIME']);
        $this->CASHRECD->setDbValue($row['CASHRECD']);
        $this->CASHREFNO->setDbValue($row['CASHREFNO']);
        $this->CASHIERSHIFT->setDbValue($row['CASHIERSHIFT']);
        $this->PRCODE->setDbValue($row['PRCODE']);
        $this->RELEASEBY->setDbValue($row['RELEASEBY']);
        $this->CRAUTHOR->setDbValue($row['CRAUTHOR']);
        $this->PAYMENT->setDbValue($row['PAYMENT']);
        $this->DRID->setDbValue($row['DRID']);
        $this->WARD->setDbValue($row['WARD']);
        $this->STAXTYPE->setDbValue($row['STAXTYPE']);
        $this->PURDISCVAL->setDbValue($row['PURDISCVAL']);
        $this->RNDOFF->setDbValue($row['RNDOFF']);
        $this->DISCONMRP->setDbValue($row['DISCONMRP']);
        $this->DELVDT->setDbValue($row['DELVDT']);
        $this->DELVTIME->setDbValue($row['DELVTIME']);
        $this->DELVBY->setDbValue($row['DELVBY']);
        $this->HOSPNO->setDbValue($row['HOSPNO']);
        $this->id->setDbValue($row['id']);
        $this->pbv->setDbValue($row['pbv']);
        $this->pbt->setDbValue($row['pbt']);
        $this->SiNo->setDbValue($row['SiNo']);
        $this->Product->setDbValue($row['Product']);
        $this->Mfg->setDbValue($row['Mfg']);
        $this->HosoID->setDbValue($row['HosoID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->MFRCODE->setDbValue($row['MFRCODE']);
        $this->Reception->setDbValue($row['Reception']);
        $this->PatID->setDbValue($row['PatID']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->BRNAME->setDbValue($row['BRNAME']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['BRCODE'] = null;
        $row['TYPE'] = null;
        $row['DN'] = null;
        $row['RDN'] = null;
        $row['DT'] = null;
        $row['PRC'] = null;
        $row['OQ'] = null;
        $row['RQ'] = null;
        $row['MRQ'] = null;
        $row['IQ'] = null;
        $row['BATCHNO'] = null;
        $row['EXPDT'] = null;
        $row['BILLNO'] = null;
        $row['BILLDT'] = null;
        $row['RT'] = null;
        $row['VALUE'] = null;
        $row['DISC'] = null;
        $row['TAXP'] = null;
        $row['TAX'] = null;
        $row['TAXR'] = null;
        $row['DAMT'] = null;
        $row['EMPNO'] = null;
        $row['PC'] = null;
        $row['DRNAME'] = null;
        $row['BTIME'] = null;
        $row['ONO'] = null;
        $row['ODT'] = null;
        $row['PURRT'] = null;
        $row['GRP'] = null;
        $row['IBATCH'] = null;
        $row['IPNO'] = null;
        $row['OPNO'] = null;
        $row['RECID'] = null;
        $row['FQTY'] = null;
        $row['UR'] = null;
        $row['DCID'] = null;
        $row['USERID'] = null;
        $row['MODDT'] = null;
        $row['FYM'] = null;
        $row['PRCBATCH'] = null;
        $row['SLNO'] = null;
        $row['MRP'] = null;
        $row['BILLYM'] = null;
        $row['BILLGRP'] = null;
        $row['STAFF'] = null;
        $row['TEMPIPNO'] = null;
        $row['PRNTED'] = null;
        $row['PATNAME'] = null;
        $row['PJVNO'] = null;
        $row['PJVSLNO'] = null;
        $row['OTHDISC'] = null;
        $row['PJVYM'] = null;
        $row['PURDISCPER'] = null;
        $row['CASHIER'] = null;
        $row['CASHTIME'] = null;
        $row['CASHRECD'] = null;
        $row['CASHREFNO'] = null;
        $row['CASHIERSHIFT'] = null;
        $row['PRCODE'] = null;
        $row['RELEASEBY'] = null;
        $row['CRAUTHOR'] = null;
        $row['PAYMENT'] = null;
        $row['DRID'] = null;
        $row['WARD'] = null;
        $row['STAXTYPE'] = null;
        $row['PURDISCVAL'] = null;
        $row['RNDOFF'] = null;
        $row['DISCONMRP'] = null;
        $row['DELVDT'] = null;
        $row['DELVTIME'] = null;
        $row['DELVBY'] = null;
        $row['HOSPNO'] = null;
        $row['id'] = null;
        $row['pbv'] = null;
        $row['pbt'] = null;
        $row['SiNo'] = null;
        $row['Product'] = null;
        $row['Mfg'] = null;
        $row['HosoID'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['MFRCODE'] = null;
        $row['Reception'] = null;
        $row['PatID'] = null;
        $row['mrnno'] = null;
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
        if ($this->RT->FormValue == $this->RT->CurrentValue && is_numeric(ConvertToFloatString($this->RT->CurrentValue))) {
            $this->RT->CurrentValue = ConvertToFloatString($this->RT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->VALUE->FormValue == $this->VALUE->CurrentValue && is_numeric(ConvertToFloatString($this->VALUE->CurrentValue))) {
            $this->VALUE->CurrentValue = ConvertToFloatString($this->VALUE->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DISC->FormValue == $this->DISC->CurrentValue && is_numeric(ConvertToFloatString($this->DISC->CurrentValue))) {
            $this->DISC->CurrentValue = ConvertToFloatString($this->DISC->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXP->FormValue == $this->TAXP->CurrentValue && is_numeric(ConvertToFloatString($this->TAXP->CurrentValue))) {
            $this->TAXP->CurrentValue = ConvertToFloatString($this->TAXP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAX->FormValue == $this->TAX->CurrentValue && is_numeric(ConvertToFloatString($this->TAX->CurrentValue))) {
            $this->TAX->CurrentValue = ConvertToFloatString($this->TAX->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TAXR->FormValue == $this->TAXR->CurrentValue && is_numeric(ConvertToFloatString($this->TAXR->CurrentValue))) {
            $this->TAXR->CurrentValue = ConvertToFloatString($this->TAXR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DAMT->FormValue == $this->DAMT->CurrentValue && is_numeric(ConvertToFloatString($this->DAMT->CurrentValue))) {
            $this->DAMT->CurrentValue = ConvertToFloatString($this->DAMT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PURRT->FormValue == $this->PURRT->CurrentValue && is_numeric(ConvertToFloatString($this->PURRT->CurrentValue))) {
            $this->PURRT->CurrentValue = ConvertToFloatString($this->PURRT->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->FQTY->FormValue == $this->FQTY->CurrentValue && is_numeric(ConvertToFloatString($this->FQTY->CurrentValue))) {
            $this->FQTY->CurrentValue = ConvertToFloatString($this->FQTY->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->UR->FormValue == $this->UR->CurrentValue && is_numeric(ConvertToFloatString($this->UR->CurrentValue))) {
            $this->UR->CurrentValue = ConvertToFloatString($this->UR->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->MRP->FormValue == $this->MRP->CurrentValue && is_numeric(ConvertToFloatString($this->MRP->CurrentValue))) {
            $this->MRP->CurrentValue = ConvertToFloatString($this->MRP->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->OTHDISC->FormValue == $this->OTHDISC->CurrentValue && is_numeric(ConvertToFloatString($this->OTHDISC->CurrentValue))) {
            $this->OTHDISC->CurrentValue = ConvertToFloatString($this->OTHDISC->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PURDISCPER->FormValue == $this->PURDISCPER->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCPER->CurrentValue))) {
            $this->PURDISCPER->CurrentValue = ConvertToFloatString($this->PURDISCPER->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CASHRECD->FormValue == $this->CASHRECD->CurrentValue && is_numeric(ConvertToFloatString($this->CASHRECD->CurrentValue))) {
            $this->CASHRECD->CurrentValue = ConvertToFloatString($this->CASHRECD->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PURDISCVAL->FormValue == $this->PURDISCVAL->CurrentValue && is_numeric(ConvertToFloatString($this->PURDISCVAL->CurrentValue))) {
            $this->PURDISCVAL->CurrentValue = ConvertToFloatString($this->PURDISCVAL->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RNDOFF->FormValue == $this->RNDOFF->CurrentValue && is_numeric(ConvertToFloatString($this->RNDOFF->CurrentValue))) {
            $this->RNDOFF->CurrentValue = ConvertToFloatString($this->RNDOFF->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->DISCONMRP->FormValue == $this->DISCONMRP->CurrentValue && is_numeric(ConvertToFloatString($this->DISCONMRP->CurrentValue))) {
            $this->DISCONMRP->CurrentValue = ConvertToFloatString($this->DISCONMRP->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // BRCODE

        // TYPE

        // DN

        // RDN

        // DT

        // PRC

        // OQ

        // RQ

        // MRQ

        // IQ

        // BATCHNO

        // EXPDT

        // BILLNO

        // BILLDT

        // RT

        // VALUE

        // DISC

        // TAXP

        // TAX

        // TAXR

        // DAMT

        // EMPNO

        // PC

        // DRNAME

        // BTIME

        // ONO

        // ODT

        // PURRT

        // GRP

        // IBATCH

        // IPNO

        // OPNO

        // RECID

        // FQTY

        // UR

        // DCID

        // USERID

        // MODDT

        // FYM

        // PRCBATCH

        // SLNO

        // MRP

        // BILLYM

        // BILLGRP

        // STAFF

        // TEMPIPNO

        // PRNTED

        // PATNAME

        // PJVNO

        // PJVSLNO

        // OTHDISC

        // PJVYM

        // PURDISCPER

        // CASHIER

        // CASHTIME

        // CASHRECD

        // CASHREFNO

        // CASHIERSHIFT

        // PRCODE

        // RELEASEBY

        // CRAUTHOR

        // PAYMENT

        // DRID

        // WARD

        // STAXTYPE

        // PURDISCVAL

        // RNDOFF

        // DISCONMRP

        // DELVDT

        // DELVTIME

        // DELVBY

        // HOSPNO

        // id

        // pbv

        // pbt

        // SiNo

        // Product

        // Mfg

        // HosoID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // MFRCODE

        // Reception

        // PatID

        // mrnno

        // BRNAME
        if ($this->RowType == ROWTYPE_VIEW) {
            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // TYPE
            $this->TYPE->ViewValue = $this->TYPE->CurrentValue;
            $this->TYPE->ViewCustomAttributes = "";

            // DN
            $this->DN->ViewValue = $this->DN->CurrentValue;
            $this->DN->ViewCustomAttributes = "";

            // RDN
            $this->RDN->ViewValue = $this->RDN->CurrentValue;
            $this->RDN->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // PRC
            $this->PRC->ViewValue = $this->PRC->CurrentValue;
            $this->PRC->ViewCustomAttributes = "";

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

            // BATCHNO
            $this->BATCHNO->ViewValue = $this->BATCHNO->CurrentValue;
            $this->BATCHNO->ViewCustomAttributes = "";

            // EXPDT
            $this->EXPDT->ViewValue = $this->EXPDT->CurrentValue;
            $this->EXPDT->ViewValue = FormatDateTime($this->EXPDT->ViewValue, 0);
            $this->EXPDT->ViewCustomAttributes = "";

            // BILLNO
            $this->BILLNO->ViewValue = $this->BILLNO->CurrentValue;
            $this->BILLNO->ViewCustomAttributes = "";

            // BILLDT
            $this->BILLDT->ViewValue = $this->BILLDT->CurrentValue;
            $this->BILLDT->ViewValue = FormatDateTime($this->BILLDT->ViewValue, 0);
            $this->BILLDT->ViewCustomAttributes = "";

            // RT
            $this->RT->ViewValue = $this->RT->CurrentValue;
            $this->RT->ViewValue = FormatNumber($this->RT->ViewValue, 2, -2, -2, -2);
            $this->RT->ViewCustomAttributes = "";

            // VALUE
            $this->VALUE->ViewValue = $this->VALUE->CurrentValue;
            $this->VALUE->ViewValue = FormatNumber($this->VALUE->ViewValue, 2, -2, -2, -2);
            $this->VALUE->ViewCustomAttributes = "";

            // DISC
            $this->DISC->ViewValue = $this->DISC->CurrentValue;
            $this->DISC->ViewValue = FormatNumber($this->DISC->ViewValue, 2, -2, -2, -2);
            $this->DISC->ViewCustomAttributes = "";

            // TAXP
            $this->TAXP->ViewValue = $this->TAXP->CurrentValue;
            $this->TAXP->ViewValue = FormatNumber($this->TAXP->ViewValue, 2, -2, -2, -2);
            $this->TAXP->ViewCustomAttributes = "";

            // TAX
            $this->TAX->ViewValue = $this->TAX->CurrentValue;
            $this->TAX->ViewValue = FormatNumber($this->TAX->ViewValue, 2, -2, -2, -2);
            $this->TAX->ViewCustomAttributes = "";

            // TAXR
            $this->TAXR->ViewValue = $this->TAXR->CurrentValue;
            $this->TAXR->ViewValue = FormatNumber($this->TAXR->ViewValue, 2, -2, -2, -2);
            $this->TAXR->ViewCustomAttributes = "";

            // DAMT
            $this->DAMT->ViewValue = $this->DAMT->CurrentValue;
            $this->DAMT->ViewValue = FormatNumber($this->DAMT->ViewValue, 2, -2, -2, -2);
            $this->DAMT->ViewCustomAttributes = "";

            // EMPNO
            $this->EMPNO->ViewValue = $this->EMPNO->CurrentValue;
            $this->EMPNO->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // DRNAME
            $this->DRNAME->ViewValue = $this->DRNAME->CurrentValue;
            $this->DRNAME->ViewCustomAttributes = "";

            // BTIME
            $this->BTIME->ViewValue = $this->BTIME->CurrentValue;
            $this->BTIME->ViewCustomAttributes = "";

            // ONO
            $this->ONO->ViewValue = $this->ONO->CurrentValue;
            $this->ONO->ViewCustomAttributes = "";

            // ODT
            $this->ODT->ViewValue = $this->ODT->CurrentValue;
            $this->ODT->ViewValue = FormatDateTime($this->ODT->ViewValue, 0);
            $this->ODT->ViewCustomAttributes = "";

            // PURRT
            $this->PURRT->ViewValue = $this->PURRT->CurrentValue;
            $this->PURRT->ViewValue = FormatNumber($this->PURRT->ViewValue, 2, -2, -2, -2);
            $this->PURRT->ViewCustomAttributes = "";

            // GRP
            $this->GRP->ViewValue = $this->GRP->CurrentValue;
            $this->GRP->ViewCustomAttributes = "";

            // IBATCH
            $this->IBATCH->ViewValue = $this->IBATCH->CurrentValue;
            $this->IBATCH->ViewCustomAttributes = "";

            // IPNO
            $this->IPNO->ViewValue = $this->IPNO->CurrentValue;
            $this->IPNO->ViewCustomAttributes = "";

            // OPNO
            $this->OPNO->ViewValue = $this->OPNO->CurrentValue;
            $this->OPNO->ViewCustomAttributes = "";

            // RECID
            $this->RECID->ViewValue = $this->RECID->CurrentValue;
            $this->RECID->ViewCustomAttributes = "";

            // FQTY
            $this->FQTY->ViewValue = $this->FQTY->CurrentValue;
            $this->FQTY->ViewValue = FormatNumber($this->FQTY->ViewValue, 2, -2, -2, -2);
            $this->FQTY->ViewCustomAttributes = "";

            // UR
            $this->UR->ViewValue = $this->UR->CurrentValue;
            $this->UR->ViewValue = FormatNumber($this->UR->ViewValue, 2, -2, -2, -2);
            $this->UR->ViewCustomAttributes = "";

            // DCID
            $this->DCID->ViewValue = $this->DCID->CurrentValue;
            $this->DCID->ViewCustomAttributes = "";

            // USERID
            $this->_USERID->ViewValue = $this->_USERID->CurrentValue;
            $this->_USERID->ViewCustomAttributes = "";

            // MODDT
            $this->MODDT->ViewValue = $this->MODDT->CurrentValue;
            $this->MODDT->ViewValue = FormatDateTime($this->MODDT->ViewValue, 0);
            $this->MODDT->ViewCustomAttributes = "";

            // FYM
            $this->FYM->ViewValue = $this->FYM->CurrentValue;
            $this->FYM->ViewCustomAttributes = "";

            // PRCBATCH
            $this->PRCBATCH->ViewValue = $this->PRCBATCH->CurrentValue;
            $this->PRCBATCH->ViewCustomAttributes = "";

            // SLNO
            $this->SLNO->ViewValue = $this->SLNO->CurrentValue;
            $this->SLNO->ViewValue = FormatNumber($this->SLNO->ViewValue, 0, -2, -2, -2);
            $this->SLNO->ViewCustomAttributes = "";

            // MRP
            $this->MRP->ViewValue = $this->MRP->CurrentValue;
            $this->MRP->ViewValue = FormatNumber($this->MRP->ViewValue, 2, -2, -2, -2);
            $this->MRP->ViewCustomAttributes = "";

            // BILLYM
            $this->BILLYM->ViewValue = $this->BILLYM->CurrentValue;
            $this->BILLYM->ViewCustomAttributes = "";

            // BILLGRP
            $this->BILLGRP->ViewValue = $this->BILLGRP->CurrentValue;
            $this->BILLGRP->ViewCustomAttributes = "";

            // STAFF
            $this->STAFF->ViewValue = $this->STAFF->CurrentValue;
            $this->STAFF->ViewCustomAttributes = "";

            // TEMPIPNO
            $this->TEMPIPNO->ViewValue = $this->TEMPIPNO->CurrentValue;
            $this->TEMPIPNO->ViewCustomAttributes = "";

            // PRNTED
            $this->PRNTED->ViewValue = $this->PRNTED->CurrentValue;
            $this->PRNTED->ViewCustomAttributes = "";

            // PATNAME
            $this->PATNAME->ViewValue = $this->PATNAME->CurrentValue;
            $this->PATNAME->ViewCustomAttributes = "";

            // PJVNO
            $this->PJVNO->ViewValue = $this->PJVNO->CurrentValue;
            $this->PJVNO->ViewCustomAttributes = "";

            // PJVSLNO
            $this->PJVSLNO->ViewValue = $this->PJVSLNO->CurrentValue;
            $this->PJVSLNO->ViewCustomAttributes = "";

            // OTHDISC
            $this->OTHDISC->ViewValue = $this->OTHDISC->CurrentValue;
            $this->OTHDISC->ViewValue = FormatNumber($this->OTHDISC->ViewValue, 2, -2, -2, -2);
            $this->OTHDISC->ViewCustomAttributes = "";

            // PJVYM
            $this->PJVYM->ViewValue = $this->PJVYM->CurrentValue;
            $this->PJVYM->ViewCustomAttributes = "";

            // PURDISCPER
            $this->PURDISCPER->ViewValue = $this->PURDISCPER->CurrentValue;
            $this->PURDISCPER->ViewValue = FormatNumber($this->PURDISCPER->ViewValue, 2, -2, -2, -2);
            $this->PURDISCPER->ViewCustomAttributes = "";

            // CASHIER
            $this->CASHIER->ViewValue = $this->CASHIER->CurrentValue;
            $this->CASHIER->ViewCustomAttributes = "";

            // CASHTIME
            $this->CASHTIME->ViewValue = $this->CASHTIME->CurrentValue;
            $this->CASHTIME->ViewCustomAttributes = "";

            // CASHRECD
            $this->CASHRECD->ViewValue = $this->CASHRECD->CurrentValue;
            $this->CASHRECD->ViewValue = FormatNumber($this->CASHRECD->ViewValue, 2, -2, -2, -2);
            $this->CASHRECD->ViewCustomAttributes = "";

            // CASHREFNO
            $this->CASHREFNO->ViewValue = $this->CASHREFNO->CurrentValue;
            $this->CASHREFNO->ViewCustomAttributes = "";

            // CASHIERSHIFT
            $this->CASHIERSHIFT->ViewValue = $this->CASHIERSHIFT->CurrentValue;
            $this->CASHIERSHIFT->ViewCustomAttributes = "";

            // PRCODE
            $this->PRCODE->ViewValue = $this->PRCODE->CurrentValue;
            $this->PRCODE->ViewCustomAttributes = "";

            // RELEASEBY
            $this->RELEASEBY->ViewValue = $this->RELEASEBY->CurrentValue;
            $this->RELEASEBY->ViewCustomAttributes = "";

            // CRAUTHOR
            $this->CRAUTHOR->ViewValue = $this->CRAUTHOR->CurrentValue;
            $this->CRAUTHOR->ViewCustomAttributes = "";

            // PAYMENT
            $this->PAYMENT->ViewValue = $this->PAYMENT->CurrentValue;
            $this->PAYMENT->ViewCustomAttributes = "";

            // DRID
            $this->DRID->ViewValue = $this->DRID->CurrentValue;
            $this->DRID->ViewCustomAttributes = "";

            // WARD
            $this->WARD->ViewValue = $this->WARD->CurrentValue;
            $this->WARD->ViewCustomAttributes = "";

            // STAXTYPE
            $this->STAXTYPE->ViewValue = $this->STAXTYPE->CurrentValue;
            $this->STAXTYPE->ViewCustomAttributes = "";

            // PURDISCVAL
            $this->PURDISCVAL->ViewValue = $this->PURDISCVAL->CurrentValue;
            $this->PURDISCVAL->ViewValue = FormatNumber($this->PURDISCVAL->ViewValue, 2, -2, -2, -2);
            $this->PURDISCVAL->ViewCustomAttributes = "";

            // RNDOFF
            $this->RNDOFF->ViewValue = $this->RNDOFF->CurrentValue;
            $this->RNDOFF->ViewValue = FormatNumber($this->RNDOFF->ViewValue, 2, -2, -2, -2);
            $this->RNDOFF->ViewCustomAttributes = "";

            // DISCONMRP
            $this->DISCONMRP->ViewValue = $this->DISCONMRP->CurrentValue;
            $this->DISCONMRP->ViewValue = FormatNumber($this->DISCONMRP->ViewValue, 2, -2, -2, -2);
            $this->DISCONMRP->ViewCustomAttributes = "";

            // DELVDT
            $this->DELVDT->ViewValue = $this->DELVDT->CurrentValue;
            $this->DELVDT->ViewValue = FormatDateTime($this->DELVDT->ViewValue, 0);
            $this->DELVDT->ViewCustomAttributes = "";

            // DELVTIME
            $this->DELVTIME->ViewValue = $this->DELVTIME->CurrentValue;
            $this->DELVTIME->ViewCustomAttributes = "";

            // DELVBY
            $this->DELVBY->ViewValue = $this->DELVBY->CurrentValue;
            $this->DELVBY->ViewCustomAttributes = "";

            // HOSPNO
            $this->HOSPNO->ViewValue = $this->HOSPNO->CurrentValue;
            $this->HOSPNO->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // pbv
            $this->pbv->ViewValue = $this->pbv->CurrentValue;
            $this->pbv->ViewValue = FormatNumber($this->pbv->ViewValue, 0, -2, -2, -2);
            $this->pbv->ViewCustomAttributes = "";

            // pbt
            $this->pbt->ViewValue = $this->pbt->CurrentValue;
            $this->pbt->ViewValue = FormatNumber($this->pbt->ViewValue, 0, -2, -2, -2);
            $this->pbt->ViewCustomAttributes = "";

            // SiNo
            $this->SiNo->ViewValue = $this->SiNo->CurrentValue;
            $this->SiNo->ViewValue = FormatNumber($this->SiNo->ViewValue, 0, -2, -2, -2);
            $this->SiNo->ViewCustomAttributes = "";

            // Product
            $this->Product->ViewValue = $this->Product->CurrentValue;
            $this->Product->ViewCustomAttributes = "";

            // Mfg
            $this->Mfg->ViewValue = $this->Mfg->CurrentValue;
            $this->Mfg->ViewCustomAttributes = "";

            // HosoID
            $this->HosoID->ViewValue = $this->HosoID->CurrentValue;
            $this->HosoID->ViewValue = FormatNumber($this->HosoID->ViewValue, 0, -2, -2, -2);
            $this->HosoID->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // MFRCODE
            $this->MFRCODE->ViewValue = $this->MFRCODE->CurrentValue;
            $this->MFRCODE->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewValue = FormatNumber($this->PatID->ViewValue, 0, -2, -2, -2);
            $this->PatID->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // BRNAME
            $this->BRNAME->ViewValue = $this->BRNAME->CurrentValue;
            $this->BRNAME->ViewCustomAttributes = "";

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";
            $this->TYPE->TooltipValue = "";

            // DN
            $this->DN->LinkCustomAttributes = "";
            $this->DN->HrefValue = "";
            $this->DN->TooltipValue = "";

            // RDN
            $this->RDN->LinkCustomAttributes = "";
            $this->RDN->HrefValue = "";
            $this->RDN->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";
            $this->PRC->TooltipValue = "";

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

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";
            $this->BATCHNO->TooltipValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";
            $this->EXPDT->TooltipValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";
            $this->BILLNO->TooltipValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";
            $this->BILLDT->TooltipValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";
            $this->RT->TooltipValue = "";

            // VALUE
            $this->VALUE->LinkCustomAttributes = "";
            $this->VALUE->HrefValue = "";
            $this->VALUE->TooltipValue = "";

            // DISC
            $this->DISC->LinkCustomAttributes = "";
            $this->DISC->HrefValue = "";
            $this->DISC->TooltipValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";
            $this->TAXP->TooltipValue = "";

            // TAX
            $this->TAX->LinkCustomAttributes = "";
            $this->TAX->HrefValue = "";
            $this->TAX->TooltipValue = "";

            // TAXR
            $this->TAXR->LinkCustomAttributes = "";
            $this->TAXR->HrefValue = "";
            $this->TAXR->TooltipValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";
            $this->DAMT->TooltipValue = "";

            // EMPNO
            $this->EMPNO->LinkCustomAttributes = "";
            $this->EMPNO->HrefValue = "";
            $this->EMPNO->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // DRNAME
            $this->DRNAME->LinkCustomAttributes = "";
            $this->DRNAME->HrefValue = "";
            $this->DRNAME->TooltipValue = "";

            // BTIME
            $this->BTIME->LinkCustomAttributes = "";
            $this->BTIME->HrefValue = "";
            $this->BTIME->TooltipValue = "";

            // ONO
            $this->ONO->LinkCustomAttributes = "";
            $this->ONO->HrefValue = "";
            $this->ONO->TooltipValue = "";

            // ODT
            $this->ODT->LinkCustomAttributes = "";
            $this->ODT->HrefValue = "";
            $this->ODT->TooltipValue = "";

            // PURRT
            $this->PURRT->LinkCustomAttributes = "";
            $this->PURRT->HrefValue = "";
            $this->PURRT->TooltipValue = "";

            // GRP
            $this->GRP->LinkCustomAttributes = "";
            $this->GRP->HrefValue = "";
            $this->GRP->TooltipValue = "";

            // IBATCH
            $this->IBATCH->LinkCustomAttributes = "";
            $this->IBATCH->HrefValue = "";
            $this->IBATCH->TooltipValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";
            $this->IPNO->TooltipValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";
            $this->OPNO->TooltipValue = "";

            // RECID
            $this->RECID->LinkCustomAttributes = "";
            $this->RECID->HrefValue = "";
            $this->RECID->TooltipValue = "";

            // FQTY
            $this->FQTY->LinkCustomAttributes = "";
            $this->FQTY->HrefValue = "";
            $this->FQTY->TooltipValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";
            $this->UR->TooltipValue = "";

            // DCID
            $this->DCID->LinkCustomAttributes = "";
            $this->DCID->HrefValue = "";
            $this->DCID->TooltipValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";
            $this->_USERID->TooltipValue = "";

            // MODDT
            $this->MODDT->LinkCustomAttributes = "";
            $this->MODDT->HrefValue = "";
            $this->MODDT->TooltipValue = "";

            // FYM
            $this->FYM->LinkCustomAttributes = "";
            $this->FYM->HrefValue = "";
            $this->FYM->TooltipValue = "";

            // PRCBATCH
            $this->PRCBATCH->LinkCustomAttributes = "";
            $this->PRCBATCH->HrefValue = "";
            $this->PRCBATCH->TooltipValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";
            $this->SLNO->TooltipValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";
            $this->MRP->TooltipValue = "";

            // BILLYM
            $this->BILLYM->LinkCustomAttributes = "";
            $this->BILLYM->HrefValue = "";
            $this->BILLYM->TooltipValue = "";

            // BILLGRP
            $this->BILLGRP->LinkCustomAttributes = "";
            $this->BILLGRP->HrefValue = "";
            $this->BILLGRP->TooltipValue = "";

            // STAFF
            $this->STAFF->LinkCustomAttributes = "";
            $this->STAFF->HrefValue = "";
            $this->STAFF->TooltipValue = "";

            // TEMPIPNO
            $this->TEMPIPNO->LinkCustomAttributes = "";
            $this->TEMPIPNO->HrefValue = "";
            $this->TEMPIPNO->TooltipValue = "";

            // PRNTED
            $this->PRNTED->LinkCustomAttributes = "";
            $this->PRNTED->HrefValue = "";
            $this->PRNTED->TooltipValue = "";

            // PATNAME
            $this->PATNAME->LinkCustomAttributes = "";
            $this->PATNAME->HrefValue = "";
            $this->PATNAME->TooltipValue = "";

            // PJVNO
            $this->PJVNO->LinkCustomAttributes = "";
            $this->PJVNO->HrefValue = "";
            $this->PJVNO->TooltipValue = "";

            // PJVSLNO
            $this->PJVSLNO->LinkCustomAttributes = "";
            $this->PJVSLNO->HrefValue = "";
            $this->PJVSLNO->TooltipValue = "";

            // OTHDISC
            $this->OTHDISC->LinkCustomAttributes = "";
            $this->OTHDISC->HrefValue = "";
            $this->OTHDISC->TooltipValue = "";

            // PJVYM
            $this->PJVYM->LinkCustomAttributes = "";
            $this->PJVYM->HrefValue = "";
            $this->PJVYM->TooltipValue = "";

            // PURDISCPER
            $this->PURDISCPER->LinkCustomAttributes = "";
            $this->PURDISCPER->HrefValue = "";
            $this->PURDISCPER->TooltipValue = "";

            // CASHIER
            $this->CASHIER->LinkCustomAttributes = "";
            $this->CASHIER->HrefValue = "";
            $this->CASHIER->TooltipValue = "";

            // CASHTIME
            $this->CASHTIME->LinkCustomAttributes = "";
            $this->CASHTIME->HrefValue = "";
            $this->CASHTIME->TooltipValue = "";

            // CASHRECD
            $this->CASHRECD->LinkCustomAttributes = "";
            $this->CASHRECD->HrefValue = "";
            $this->CASHRECD->TooltipValue = "";

            // CASHREFNO
            $this->CASHREFNO->LinkCustomAttributes = "";
            $this->CASHREFNO->HrefValue = "";
            $this->CASHREFNO->TooltipValue = "";

            // CASHIERSHIFT
            $this->CASHIERSHIFT->LinkCustomAttributes = "";
            $this->CASHIERSHIFT->HrefValue = "";
            $this->CASHIERSHIFT->TooltipValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";
            $this->PRCODE->TooltipValue = "";

            // RELEASEBY
            $this->RELEASEBY->LinkCustomAttributes = "";
            $this->RELEASEBY->HrefValue = "";
            $this->RELEASEBY->TooltipValue = "";

            // CRAUTHOR
            $this->CRAUTHOR->LinkCustomAttributes = "";
            $this->CRAUTHOR->HrefValue = "";
            $this->CRAUTHOR->TooltipValue = "";

            // PAYMENT
            $this->PAYMENT->LinkCustomAttributes = "";
            $this->PAYMENT->HrefValue = "";
            $this->PAYMENT->TooltipValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";
            $this->DRID->TooltipValue = "";

            // WARD
            $this->WARD->LinkCustomAttributes = "";
            $this->WARD->HrefValue = "";
            $this->WARD->TooltipValue = "";

            // STAXTYPE
            $this->STAXTYPE->LinkCustomAttributes = "";
            $this->STAXTYPE->HrefValue = "";
            $this->STAXTYPE->TooltipValue = "";

            // PURDISCVAL
            $this->PURDISCVAL->LinkCustomAttributes = "";
            $this->PURDISCVAL->HrefValue = "";
            $this->PURDISCVAL->TooltipValue = "";

            // RNDOFF
            $this->RNDOFF->LinkCustomAttributes = "";
            $this->RNDOFF->HrefValue = "";
            $this->RNDOFF->TooltipValue = "";

            // DISCONMRP
            $this->DISCONMRP->LinkCustomAttributes = "";
            $this->DISCONMRP->HrefValue = "";
            $this->DISCONMRP->TooltipValue = "";

            // DELVDT
            $this->DELVDT->LinkCustomAttributes = "";
            $this->DELVDT->HrefValue = "";
            $this->DELVDT->TooltipValue = "";

            // DELVTIME
            $this->DELVTIME->LinkCustomAttributes = "";
            $this->DELVTIME->HrefValue = "";
            $this->DELVTIME->TooltipValue = "";

            // DELVBY
            $this->DELVBY->LinkCustomAttributes = "";
            $this->DELVBY->HrefValue = "";
            $this->DELVBY->TooltipValue = "";

            // HOSPNO
            $this->HOSPNO->LinkCustomAttributes = "";
            $this->HOSPNO->HrefValue = "";
            $this->HOSPNO->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // pbv
            $this->pbv->LinkCustomAttributes = "";
            $this->pbv->HrefValue = "";
            $this->pbv->TooltipValue = "";

            // pbt
            $this->pbt->LinkCustomAttributes = "";
            $this->pbt->HrefValue = "";
            $this->pbt->TooltipValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";
            $this->SiNo->TooltipValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";
            $this->Product->TooltipValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";
            $this->Mfg->TooltipValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";
            $this->HosoID->TooltipValue = "";

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

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";
            $this->MFRCODE->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fstore_storeledlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
