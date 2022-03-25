<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class StoreStoreledAdd extends StoreStoreled
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'store_storeled';

    // Page object name
    public $PageObjName = "StoreStoreledAdd";

    // Rendering View
    public $RenderingView = false;

    // Custom template
    public $UseCustomTemplate = false;

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

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $row = ["url" => GetUrl($url), "modal" => "1"];
                $pageName = GetPageName($url);
                if ($pageName != $this->getListUrl()) { // Not List page
                    $row["caption"] = $this->getModalCaption($pageName);
                    if ($pageName == "StoreStoreledView") {
                        $row["view"] = "1";
                    }
                } else { // List page should not be shown as modal => error
                    $row["error"] = $this->getFailureMessage();
                    $this->clearFailureMessage();
                }
                WriteJson($row);
            } else {
                SaveDebugMessage();
                Redirect(GetUrl($url));
            }
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
    public $FormClassName = "ew-horizontal ew-form ew-add-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter = "";
    public $DbDetailFilter = "";
    public $StartRecord;
    public $Priv = 0;
    public $OldRecordset;
    public $CopyRecord;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
            $SkipHeaderFooter;

        // Is modal
        $this->IsModal = Param("modal") == "1";

        // Create form object
        $CurrentForm = new HttpForm();
        $this->CurrentAction = Param("action"); // Set up current action
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
        $this->id->Visible = false;
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

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $this->FormClassName = "ew-form ew-add-form ew-horizontal";
        $postBack = false;

        // Set up current action
        if (IsApi()) {
            $this->CurrentAction = "insert"; // Add record directly
            $postBack = true;
        } elseif (Post("action") !== null) {
            $this->CurrentAction = Post("action"); // Get form action
            $postBack = true;
        } else {
            // Load key values from QueryString
            $this->CopyRecord = true;
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->setKey("id", $this->id->CurrentValue); // Set up key
            } else {
                $this->setKey("id", ""); // Clear key
                $this->CopyRecord = false;
            }
            if ($this->CopyRecord) {
                $this->CurrentAction = "copy"; // Copy record
            } else {
                $this->CurrentAction = "show"; // Display blank record
            }
        }

        // Load old record / default values
        $loaded = $this->loadOldRecord();

        // Load form values
        if ($postBack) {
            $this->loadFormValues(); // Load form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues(); // Restore form values
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = "show"; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "copy": // Copy an existing record
                if (!$loaded) { // Record not loaded
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("StoreStoreledList"); // No matching record, return to list
                    return;
                }
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    $returnUrl = $this->getReturnUrl();
                    if (GetPageName($returnUrl) == "StoreStoreledList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "StoreStoreledView") {
                        $returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
                    }
                    if (IsApi()) { // Return to caller
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl);
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Add failed, restore form values
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render row based on row type
        $this->RowType = ROWTYPE_ADD; // Render add type

        // Render row
        $this->resetAttributes();
        $this->renderRow();

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

    // Get upload files
    protected function getUploadFiles()
    {
        global $CurrentForm, $Language;
    }

    // Load default values
    protected function loadDefaultValues()
    {
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
        $this->TYPE->CurrentValue = null;
        $this->TYPE->OldValue = $this->TYPE->CurrentValue;
        $this->DN->CurrentValue = null;
        $this->DN->OldValue = $this->DN->CurrentValue;
        $this->RDN->CurrentValue = null;
        $this->RDN->OldValue = $this->RDN->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->PRC->CurrentValue = null;
        $this->PRC->OldValue = $this->PRC->CurrentValue;
        $this->OQ->CurrentValue = null;
        $this->OQ->OldValue = $this->OQ->CurrentValue;
        $this->RQ->CurrentValue = null;
        $this->RQ->OldValue = $this->RQ->CurrentValue;
        $this->MRQ->CurrentValue = null;
        $this->MRQ->OldValue = $this->MRQ->CurrentValue;
        $this->IQ->CurrentValue = null;
        $this->IQ->OldValue = $this->IQ->CurrentValue;
        $this->BATCHNO->CurrentValue = null;
        $this->BATCHNO->OldValue = $this->BATCHNO->CurrentValue;
        $this->EXPDT->CurrentValue = null;
        $this->EXPDT->OldValue = $this->EXPDT->CurrentValue;
        $this->BILLNO->CurrentValue = null;
        $this->BILLNO->OldValue = $this->BILLNO->CurrentValue;
        $this->BILLDT->CurrentValue = null;
        $this->BILLDT->OldValue = $this->BILLDT->CurrentValue;
        $this->RT->CurrentValue = null;
        $this->RT->OldValue = $this->RT->CurrentValue;
        $this->VALUE->CurrentValue = null;
        $this->VALUE->OldValue = $this->VALUE->CurrentValue;
        $this->DISC->CurrentValue = null;
        $this->DISC->OldValue = $this->DISC->CurrentValue;
        $this->TAXP->CurrentValue = null;
        $this->TAXP->OldValue = $this->TAXP->CurrentValue;
        $this->TAX->CurrentValue = null;
        $this->TAX->OldValue = $this->TAX->CurrentValue;
        $this->TAXR->CurrentValue = null;
        $this->TAXR->OldValue = $this->TAXR->CurrentValue;
        $this->DAMT->CurrentValue = null;
        $this->DAMT->OldValue = $this->DAMT->CurrentValue;
        $this->EMPNO->CurrentValue = null;
        $this->EMPNO->OldValue = $this->EMPNO->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->DRNAME->CurrentValue = null;
        $this->DRNAME->OldValue = $this->DRNAME->CurrentValue;
        $this->BTIME->CurrentValue = null;
        $this->BTIME->OldValue = $this->BTIME->CurrentValue;
        $this->ONO->CurrentValue = null;
        $this->ONO->OldValue = $this->ONO->CurrentValue;
        $this->ODT->CurrentValue = null;
        $this->ODT->OldValue = $this->ODT->CurrentValue;
        $this->PURRT->CurrentValue = null;
        $this->PURRT->OldValue = $this->PURRT->CurrentValue;
        $this->GRP->CurrentValue = null;
        $this->GRP->OldValue = $this->GRP->CurrentValue;
        $this->IBATCH->CurrentValue = null;
        $this->IBATCH->OldValue = $this->IBATCH->CurrentValue;
        $this->IPNO->CurrentValue = null;
        $this->IPNO->OldValue = $this->IPNO->CurrentValue;
        $this->OPNO->CurrentValue = null;
        $this->OPNO->OldValue = $this->OPNO->CurrentValue;
        $this->RECID->CurrentValue = null;
        $this->RECID->OldValue = $this->RECID->CurrentValue;
        $this->FQTY->CurrentValue = null;
        $this->FQTY->OldValue = $this->FQTY->CurrentValue;
        $this->UR->CurrentValue = null;
        $this->UR->OldValue = $this->UR->CurrentValue;
        $this->DCID->CurrentValue = null;
        $this->DCID->OldValue = $this->DCID->CurrentValue;
        $this->_USERID->CurrentValue = null;
        $this->_USERID->OldValue = $this->_USERID->CurrentValue;
        $this->MODDT->CurrentValue = null;
        $this->MODDT->OldValue = $this->MODDT->CurrentValue;
        $this->FYM->CurrentValue = null;
        $this->FYM->OldValue = $this->FYM->CurrentValue;
        $this->PRCBATCH->CurrentValue = null;
        $this->PRCBATCH->OldValue = $this->PRCBATCH->CurrentValue;
        $this->SLNO->CurrentValue = null;
        $this->SLNO->OldValue = $this->SLNO->CurrentValue;
        $this->MRP->CurrentValue = null;
        $this->MRP->OldValue = $this->MRP->CurrentValue;
        $this->BILLYM->CurrentValue = null;
        $this->BILLYM->OldValue = $this->BILLYM->CurrentValue;
        $this->BILLGRP->CurrentValue = null;
        $this->BILLGRP->OldValue = $this->BILLGRP->CurrentValue;
        $this->STAFF->CurrentValue = null;
        $this->STAFF->OldValue = $this->STAFF->CurrentValue;
        $this->TEMPIPNO->CurrentValue = null;
        $this->TEMPIPNO->OldValue = $this->TEMPIPNO->CurrentValue;
        $this->PRNTED->CurrentValue = null;
        $this->PRNTED->OldValue = $this->PRNTED->CurrentValue;
        $this->PATNAME->CurrentValue = null;
        $this->PATNAME->OldValue = $this->PATNAME->CurrentValue;
        $this->PJVNO->CurrentValue = null;
        $this->PJVNO->OldValue = $this->PJVNO->CurrentValue;
        $this->PJVSLNO->CurrentValue = null;
        $this->PJVSLNO->OldValue = $this->PJVSLNO->CurrentValue;
        $this->OTHDISC->CurrentValue = null;
        $this->OTHDISC->OldValue = $this->OTHDISC->CurrentValue;
        $this->PJVYM->CurrentValue = null;
        $this->PJVYM->OldValue = $this->PJVYM->CurrentValue;
        $this->PURDISCPER->CurrentValue = null;
        $this->PURDISCPER->OldValue = $this->PURDISCPER->CurrentValue;
        $this->CASHIER->CurrentValue = null;
        $this->CASHIER->OldValue = $this->CASHIER->CurrentValue;
        $this->CASHTIME->CurrentValue = null;
        $this->CASHTIME->OldValue = $this->CASHTIME->CurrentValue;
        $this->CASHRECD->CurrentValue = null;
        $this->CASHRECD->OldValue = $this->CASHRECD->CurrentValue;
        $this->CASHREFNO->CurrentValue = null;
        $this->CASHREFNO->OldValue = $this->CASHREFNO->CurrentValue;
        $this->CASHIERSHIFT->CurrentValue = null;
        $this->CASHIERSHIFT->OldValue = $this->CASHIERSHIFT->CurrentValue;
        $this->PRCODE->CurrentValue = null;
        $this->PRCODE->OldValue = $this->PRCODE->CurrentValue;
        $this->RELEASEBY->CurrentValue = null;
        $this->RELEASEBY->OldValue = $this->RELEASEBY->CurrentValue;
        $this->CRAUTHOR->CurrentValue = null;
        $this->CRAUTHOR->OldValue = $this->CRAUTHOR->CurrentValue;
        $this->PAYMENT->CurrentValue = null;
        $this->PAYMENT->OldValue = $this->PAYMENT->CurrentValue;
        $this->DRID->CurrentValue = null;
        $this->DRID->OldValue = $this->DRID->CurrentValue;
        $this->WARD->CurrentValue = null;
        $this->WARD->OldValue = $this->WARD->CurrentValue;
        $this->STAXTYPE->CurrentValue = null;
        $this->STAXTYPE->OldValue = $this->STAXTYPE->CurrentValue;
        $this->PURDISCVAL->CurrentValue = null;
        $this->PURDISCVAL->OldValue = $this->PURDISCVAL->CurrentValue;
        $this->RNDOFF->CurrentValue = null;
        $this->RNDOFF->OldValue = $this->RNDOFF->CurrentValue;
        $this->DISCONMRP->CurrentValue = null;
        $this->DISCONMRP->OldValue = $this->DISCONMRP->CurrentValue;
        $this->DELVDT->CurrentValue = null;
        $this->DELVDT->OldValue = $this->DELVDT->CurrentValue;
        $this->DELVTIME->CurrentValue = null;
        $this->DELVTIME->OldValue = $this->DELVTIME->CurrentValue;
        $this->DELVBY->CurrentValue = null;
        $this->DELVBY->OldValue = $this->DELVBY->CurrentValue;
        $this->HOSPNO->CurrentValue = null;
        $this->HOSPNO->OldValue = $this->HOSPNO->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->pbv->CurrentValue = null;
        $this->pbv->OldValue = $this->pbv->CurrentValue;
        $this->pbt->CurrentValue = null;
        $this->pbt->OldValue = $this->pbt->CurrentValue;
        $this->SiNo->CurrentValue = null;
        $this->SiNo->OldValue = $this->SiNo->CurrentValue;
        $this->Product->CurrentValue = null;
        $this->Product->OldValue = $this->Product->CurrentValue;
        $this->Mfg->CurrentValue = null;
        $this->Mfg->OldValue = $this->Mfg->CurrentValue;
        $this->HosoID->CurrentValue = null;
        $this->HosoID->OldValue = $this->HosoID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->MFRCODE->CurrentValue = null;
        $this->MFRCODE->OldValue = $this->MFRCODE->CurrentValue;
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->PatID->CurrentValue = null;
        $this->PatID->OldValue = $this->PatID->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->BRNAME->CurrentValue = null;
        $this->BRNAME->OldValue = $this->BRNAME->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }

        // Check field name 'TYPE' first before field var 'x_TYPE'
        $val = $CurrentForm->hasValue("TYPE") ? $CurrentForm->getValue("TYPE") : $CurrentForm->getValue("x_TYPE");
        if (!$this->TYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TYPE->Visible = false; // Disable update for API request
            } else {
                $this->TYPE->setFormValue($val);
            }
        }

        // Check field name 'DN' first before field var 'x_DN'
        $val = $CurrentForm->hasValue("DN") ? $CurrentForm->getValue("DN") : $CurrentForm->getValue("x_DN");
        if (!$this->DN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DN->Visible = false; // Disable update for API request
            } else {
                $this->DN->setFormValue($val);
            }
        }

        // Check field name 'RDN' first before field var 'x_RDN'
        $val = $CurrentForm->hasValue("RDN") ? $CurrentForm->getValue("RDN") : $CurrentForm->getValue("x_RDN");
        if (!$this->RDN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RDN->Visible = false; // Disable update for API request
            } else {
                $this->RDN->setFormValue($val);
            }
        }

        // Check field name 'DT' first before field var 'x_DT'
        $val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
        if (!$this->DT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DT->Visible = false; // Disable update for API request
            } else {
                $this->DT->setFormValue($val);
            }
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        }

        // Check field name 'PRC' first before field var 'x_PRC'
        $val = $CurrentForm->hasValue("PRC") ? $CurrentForm->getValue("PRC") : $CurrentForm->getValue("x_PRC");
        if (!$this->PRC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRC->Visible = false; // Disable update for API request
            } else {
                $this->PRC->setFormValue($val);
            }
        }

        // Check field name 'OQ' first before field var 'x_OQ'
        $val = $CurrentForm->hasValue("OQ") ? $CurrentForm->getValue("OQ") : $CurrentForm->getValue("x_OQ");
        if (!$this->OQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OQ->Visible = false; // Disable update for API request
            } else {
                $this->OQ->setFormValue($val);
            }
        }

        // Check field name 'RQ' first before field var 'x_RQ'
        $val = $CurrentForm->hasValue("RQ") ? $CurrentForm->getValue("RQ") : $CurrentForm->getValue("x_RQ");
        if (!$this->RQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RQ->Visible = false; // Disable update for API request
            } else {
                $this->RQ->setFormValue($val);
            }
        }

        // Check field name 'MRQ' first before field var 'x_MRQ'
        $val = $CurrentForm->hasValue("MRQ") ? $CurrentForm->getValue("MRQ") : $CurrentForm->getValue("x_MRQ");
        if (!$this->MRQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRQ->Visible = false; // Disable update for API request
            } else {
                $this->MRQ->setFormValue($val);
            }
        }

        // Check field name 'IQ' first before field var 'x_IQ'
        $val = $CurrentForm->hasValue("IQ") ? $CurrentForm->getValue("IQ") : $CurrentForm->getValue("x_IQ");
        if (!$this->IQ->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IQ->Visible = false; // Disable update for API request
            } else {
                $this->IQ->setFormValue($val);
            }
        }

        // Check field name 'BATCHNO' first before field var 'x_BATCHNO'
        $val = $CurrentForm->hasValue("BATCHNO") ? $CurrentForm->getValue("BATCHNO") : $CurrentForm->getValue("x_BATCHNO");
        if (!$this->BATCHNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BATCHNO->Visible = false; // Disable update for API request
            } else {
                $this->BATCHNO->setFormValue($val);
            }
        }

        // Check field name 'EXPDT' first before field var 'x_EXPDT'
        $val = $CurrentForm->hasValue("EXPDT") ? $CurrentForm->getValue("EXPDT") : $CurrentForm->getValue("x_EXPDT");
        if (!$this->EXPDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EXPDT->Visible = false; // Disable update for API request
            } else {
                $this->EXPDT->setFormValue($val);
            }
            $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        }

        // Check field name 'BILLNO' first before field var 'x_BILLNO'
        $val = $CurrentForm->hasValue("BILLNO") ? $CurrentForm->getValue("BILLNO") : $CurrentForm->getValue("x_BILLNO");
        if (!$this->BILLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLNO->Visible = false; // Disable update for API request
            } else {
                $this->BILLNO->setFormValue($val);
            }
        }

        // Check field name 'BILLDT' first before field var 'x_BILLDT'
        $val = $CurrentForm->hasValue("BILLDT") ? $CurrentForm->getValue("BILLDT") : $CurrentForm->getValue("x_BILLDT");
        if (!$this->BILLDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLDT->Visible = false; // Disable update for API request
            } else {
                $this->BILLDT->setFormValue($val);
            }
            $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        }

        // Check field name 'RT' first before field var 'x_RT'
        $val = $CurrentForm->hasValue("RT") ? $CurrentForm->getValue("RT") : $CurrentForm->getValue("x_RT");
        if (!$this->RT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RT->Visible = false; // Disable update for API request
            } else {
                $this->RT->setFormValue($val);
            }
        }

        // Check field name 'VALUE' first before field var 'x_VALUE'
        $val = $CurrentForm->hasValue("VALUE") ? $CurrentForm->getValue("VALUE") : $CurrentForm->getValue("x_VALUE");
        if (!$this->VALUE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VALUE->Visible = false; // Disable update for API request
            } else {
                $this->VALUE->setFormValue($val);
            }
        }

        // Check field name 'DISC' first before field var 'x_DISC'
        $val = $CurrentForm->hasValue("DISC") ? $CurrentForm->getValue("DISC") : $CurrentForm->getValue("x_DISC");
        if (!$this->DISC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DISC->Visible = false; // Disable update for API request
            } else {
                $this->DISC->setFormValue($val);
            }
        }

        // Check field name 'TAXP' first before field var 'x_TAXP'
        $val = $CurrentForm->hasValue("TAXP") ? $CurrentForm->getValue("TAXP") : $CurrentForm->getValue("x_TAXP");
        if (!$this->TAXP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TAXP->Visible = false; // Disable update for API request
            } else {
                $this->TAXP->setFormValue($val);
            }
        }

        // Check field name 'TAX' first before field var 'x_TAX'
        $val = $CurrentForm->hasValue("TAX") ? $CurrentForm->getValue("TAX") : $CurrentForm->getValue("x_TAX");
        if (!$this->TAX->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TAX->Visible = false; // Disable update for API request
            } else {
                $this->TAX->setFormValue($val);
            }
        }

        // Check field name 'TAXR' first before field var 'x_TAXR'
        $val = $CurrentForm->hasValue("TAXR") ? $CurrentForm->getValue("TAXR") : $CurrentForm->getValue("x_TAXR");
        if (!$this->TAXR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TAXR->Visible = false; // Disable update for API request
            } else {
                $this->TAXR->setFormValue($val);
            }
        }

        // Check field name 'DAMT' first before field var 'x_DAMT'
        $val = $CurrentForm->hasValue("DAMT") ? $CurrentForm->getValue("DAMT") : $CurrentForm->getValue("x_DAMT");
        if (!$this->DAMT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAMT->Visible = false; // Disable update for API request
            } else {
                $this->DAMT->setFormValue($val);
            }
        }

        // Check field name 'EMPNO' first before field var 'x_EMPNO'
        $val = $CurrentForm->hasValue("EMPNO") ? $CurrentForm->getValue("EMPNO") : $CurrentForm->getValue("x_EMPNO");
        if (!$this->EMPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EMPNO->Visible = false; // Disable update for API request
            } else {
                $this->EMPNO->setFormValue($val);
            }
        }

        // Check field name 'PC' first before field var 'x_PC'
        $val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
        if (!$this->PC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PC->Visible = false; // Disable update for API request
            } else {
                $this->PC->setFormValue($val);
            }
        }

        // Check field name 'DRNAME' first before field var 'x_DRNAME'
        $val = $CurrentForm->hasValue("DRNAME") ? $CurrentForm->getValue("DRNAME") : $CurrentForm->getValue("x_DRNAME");
        if (!$this->DRNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DRNAME->Visible = false; // Disable update for API request
            } else {
                $this->DRNAME->setFormValue($val);
            }
        }

        // Check field name 'BTIME' first before field var 'x_BTIME'
        $val = $CurrentForm->hasValue("BTIME") ? $CurrentForm->getValue("BTIME") : $CurrentForm->getValue("x_BTIME");
        if (!$this->BTIME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BTIME->Visible = false; // Disable update for API request
            } else {
                $this->BTIME->setFormValue($val);
            }
        }

        // Check field name 'ONO' first before field var 'x_ONO'
        $val = $CurrentForm->hasValue("ONO") ? $CurrentForm->getValue("ONO") : $CurrentForm->getValue("x_ONO");
        if (!$this->ONO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ONO->Visible = false; // Disable update for API request
            } else {
                $this->ONO->setFormValue($val);
            }
        }

        // Check field name 'ODT' first before field var 'x_ODT'
        $val = $CurrentForm->hasValue("ODT") ? $CurrentForm->getValue("ODT") : $CurrentForm->getValue("x_ODT");
        if (!$this->ODT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ODT->Visible = false; // Disable update for API request
            } else {
                $this->ODT->setFormValue($val);
            }
            $this->ODT->CurrentValue = UnFormatDateTime($this->ODT->CurrentValue, 0);
        }

        // Check field name 'PURRT' first before field var 'x_PURRT'
        $val = $CurrentForm->hasValue("PURRT") ? $CurrentForm->getValue("PURRT") : $CurrentForm->getValue("x_PURRT");
        if (!$this->PURRT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PURRT->Visible = false; // Disable update for API request
            } else {
                $this->PURRT->setFormValue($val);
            }
        }

        // Check field name 'GRP' first before field var 'x_GRP'
        $val = $CurrentForm->hasValue("GRP") ? $CurrentForm->getValue("GRP") : $CurrentForm->getValue("x_GRP");
        if (!$this->GRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GRP->Visible = false; // Disable update for API request
            } else {
                $this->GRP->setFormValue($val);
            }
        }

        // Check field name 'IBATCH' first before field var 'x_IBATCH'
        $val = $CurrentForm->hasValue("IBATCH") ? $CurrentForm->getValue("IBATCH") : $CurrentForm->getValue("x_IBATCH");
        if (!$this->IBATCH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IBATCH->Visible = false; // Disable update for API request
            } else {
                $this->IBATCH->setFormValue($val);
            }
        }

        // Check field name 'IPNO' first before field var 'x_IPNO'
        $val = $CurrentForm->hasValue("IPNO") ? $CurrentForm->getValue("IPNO") : $CurrentForm->getValue("x_IPNO");
        if (!$this->IPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IPNO->Visible = false; // Disable update for API request
            } else {
                $this->IPNO->setFormValue($val);
            }
        }

        // Check field name 'OPNO' first before field var 'x_OPNO'
        $val = $CurrentForm->hasValue("OPNO") ? $CurrentForm->getValue("OPNO") : $CurrentForm->getValue("x_OPNO");
        if (!$this->OPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPNO->Visible = false; // Disable update for API request
            } else {
                $this->OPNO->setFormValue($val);
            }
        }

        // Check field name 'RECID' first before field var 'x_RECID'
        $val = $CurrentForm->hasValue("RECID") ? $CurrentForm->getValue("RECID") : $CurrentForm->getValue("x_RECID");
        if (!$this->RECID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RECID->Visible = false; // Disable update for API request
            } else {
                $this->RECID->setFormValue($val);
            }
        }

        // Check field name 'FQTY' first before field var 'x_FQTY'
        $val = $CurrentForm->hasValue("FQTY") ? $CurrentForm->getValue("FQTY") : $CurrentForm->getValue("x_FQTY");
        if (!$this->FQTY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FQTY->Visible = false; // Disable update for API request
            } else {
                $this->FQTY->setFormValue($val);
            }
        }

        // Check field name 'UR' first before field var 'x_UR'
        $val = $CurrentForm->hasValue("UR") ? $CurrentForm->getValue("UR") : $CurrentForm->getValue("x_UR");
        if (!$this->UR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UR->Visible = false; // Disable update for API request
            } else {
                $this->UR->setFormValue($val);
            }
        }

        // Check field name 'DCID' first before field var 'x_DCID'
        $val = $CurrentForm->hasValue("DCID") ? $CurrentForm->getValue("DCID") : $CurrentForm->getValue("x_DCID");
        if (!$this->DCID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DCID->Visible = false; // Disable update for API request
            } else {
                $this->DCID->setFormValue($val);
            }
        }

        // Check field name 'USERID' first before field var 'x__USERID'
        $val = $CurrentForm->hasValue("USERID") ? $CurrentForm->getValue("USERID") : $CurrentForm->getValue("x__USERID");
        if (!$this->_USERID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_USERID->Visible = false; // Disable update for API request
            } else {
                $this->_USERID->setFormValue($val);
            }
        }

        // Check field name 'MODDT' first before field var 'x_MODDT'
        $val = $CurrentForm->hasValue("MODDT") ? $CurrentForm->getValue("MODDT") : $CurrentForm->getValue("x_MODDT");
        if (!$this->MODDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MODDT->Visible = false; // Disable update for API request
            } else {
                $this->MODDT->setFormValue($val);
            }
            $this->MODDT->CurrentValue = UnFormatDateTime($this->MODDT->CurrentValue, 0);
        }

        // Check field name 'FYM' first before field var 'x_FYM'
        $val = $CurrentForm->hasValue("FYM") ? $CurrentForm->getValue("FYM") : $CurrentForm->getValue("x_FYM");
        if (!$this->FYM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FYM->Visible = false; // Disable update for API request
            } else {
                $this->FYM->setFormValue($val);
            }
        }

        // Check field name 'PRCBATCH' first before field var 'x_PRCBATCH'
        $val = $CurrentForm->hasValue("PRCBATCH") ? $CurrentForm->getValue("PRCBATCH") : $CurrentForm->getValue("x_PRCBATCH");
        if (!$this->PRCBATCH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRCBATCH->Visible = false; // Disable update for API request
            } else {
                $this->PRCBATCH->setFormValue($val);
            }
        }

        // Check field name 'SLNO' first before field var 'x_SLNO'
        $val = $CurrentForm->hasValue("SLNO") ? $CurrentForm->getValue("SLNO") : $CurrentForm->getValue("x_SLNO");
        if (!$this->SLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SLNO->Visible = false; // Disable update for API request
            } else {
                $this->SLNO->setFormValue($val);
            }
        }

        // Check field name 'MRP' first before field var 'x_MRP'
        $val = $CurrentForm->hasValue("MRP") ? $CurrentForm->getValue("MRP") : $CurrentForm->getValue("x_MRP");
        if (!$this->MRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MRP->Visible = false; // Disable update for API request
            } else {
                $this->MRP->setFormValue($val);
            }
        }

        // Check field name 'BILLYM' first before field var 'x_BILLYM'
        $val = $CurrentForm->hasValue("BILLYM") ? $CurrentForm->getValue("BILLYM") : $CurrentForm->getValue("x_BILLYM");
        if (!$this->BILLYM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLYM->Visible = false; // Disable update for API request
            } else {
                $this->BILLYM->setFormValue($val);
            }
        }

        // Check field name 'BILLGRP' first before field var 'x_BILLGRP'
        $val = $CurrentForm->hasValue("BILLGRP") ? $CurrentForm->getValue("BILLGRP") : $CurrentForm->getValue("x_BILLGRP");
        if (!$this->BILLGRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BILLGRP->Visible = false; // Disable update for API request
            } else {
                $this->BILLGRP->setFormValue($val);
            }
        }

        // Check field name 'STAFF' first before field var 'x_STAFF'
        $val = $CurrentForm->hasValue("STAFF") ? $CurrentForm->getValue("STAFF") : $CurrentForm->getValue("x_STAFF");
        if (!$this->STAFF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->STAFF->Visible = false; // Disable update for API request
            } else {
                $this->STAFF->setFormValue($val);
            }
        }

        // Check field name 'TEMPIPNO' first before field var 'x_TEMPIPNO'
        $val = $CurrentForm->hasValue("TEMPIPNO") ? $CurrentForm->getValue("TEMPIPNO") : $CurrentForm->getValue("x_TEMPIPNO");
        if (!$this->TEMPIPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TEMPIPNO->Visible = false; // Disable update for API request
            } else {
                $this->TEMPIPNO->setFormValue($val);
            }
        }

        // Check field name 'PRNTED' first before field var 'x_PRNTED'
        $val = $CurrentForm->hasValue("PRNTED") ? $CurrentForm->getValue("PRNTED") : $CurrentForm->getValue("x_PRNTED");
        if (!$this->PRNTED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRNTED->Visible = false; // Disable update for API request
            } else {
                $this->PRNTED->setFormValue($val);
            }
        }

        // Check field name 'PATNAME' first before field var 'x_PATNAME'
        $val = $CurrentForm->hasValue("PATNAME") ? $CurrentForm->getValue("PATNAME") : $CurrentForm->getValue("x_PATNAME");
        if (!$this->PATNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PATNAME->Visible = false; // Disable update for API request
            } else {
                $this->PATNAME->setFormValue($val);
            }
        }

        // Check field name 'PJVNO' first before field var 'x_PJVNO'
        $val = $CurrentForm->hasValue("PJVNO") ? $CurrentForm->getValue("PJVNO") : $CurrentForm->getValue("x_PJVNO");
        if (!$this->PJVNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PJVNO->Visible = false; // Disable update for API request
            } else {
                $this->PJVNO->setFormValue($val);
            }
        }

        // Check field name 'PJVSLNO' first before field var 'x_PJVSLNO'
        $val = $CurrentForm->hasValue("PJVSLNO") ? $CurrentForm->getValue("PJVSLNO") : $CurrentForm->getValue("x_PJVSLNO");
        if (!$this->PJVSLNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PJVSLNO->Visible = false; // Disable update for API request
            } else {
                $this->PJVSLNO->setFormValue($val);
            }
        }

        // Check field name 'OTHDISC' first before field var 'x_OTHDISC'
        $val = $CurrentForm->hasValue("OTHDISC") ? $CurrentForm->getValue("OTHDISC") : $CurrentForm->getValue("x_OTHDISC");
        if (!$this->OTHDISC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OTHDISC->Visible = false; // Disable update for API request
            } else {
                $this->OTHDISC->setFormValue($val);
            }
        }

        // Check field name 'PJVYM' first before field var 'x_PJVYM'
        $val = $CurrentForm->hasValue("PJVYM") ? $CurrentForm->getValue("PJVYM") : $CurrentForm->getValue("x_PJVYM");
        if (!$this->PJVYM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PJVYM->Visible = false; // Disable update for API request
            } else {
                $this->PJVYM->setFormValue($val);
            }
        }

        // Check field name 'PURDISCPER' first before field var 'x_PURDISCPER'
        $val = $CurrentForm->hasValue("PURDISCPER") ? $CurrentForm->getValue("PURDISCPER") : $CurrentForm->getValue("x_PURDISCPER");
        if (!$this->PURDISCPER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PURDISCPER->Visible = false; // Disable update for API request
            } else {
                $this->PURDISCPER->setFormValue($val);
            }
        }

        // Check field name 'CASHIER' first before field var 'x_CASHIER'
        $val = $CurrentForm->hasValue("CASHIER") ? $CurrentForm->getValue("CASHIER") : $CurrentForm->getValue("x_CASHIER");
        if (!$this->CASHIER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CASHIER->Visible = false; // Disable update for API request
            } else {
                $this->CASHIER->setFormValue($val);
            }
        }

        // Check field name 'CASHTIME' first before field var 'x_CASHTIME'
        $val = $CurrentForm->hasValue("CASHTIME") ? $CurrentForm->getValue("CASHTIME") : $CurrentForm->getValue("x_CASHTIME");
        if (!$this->CASHTIME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CASHTIME->Visible = false; // Disable update for API request
            } else {
                $this->CASHTIME->setFormValue($val);
            }
        }

        // Check field name 'CASHRECD' first before field var 'x_CASHRECD'
        $val = $CurrentForm->hasValue("CASHRECD") ? $CurrentForm->getValue("CASHRECD") : $CurrentForm->getValue("x_CASHRECD");
        if (!$this->CASHRECD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CASHRECD->Visible = false; // Disable update for API request
            } else {
                $this->CASHRECD->setFormValue($val);
            }
        }

        // Check field name 'CASHREFNO' first before field var 'x_CASHREFNO'
        $val = $CurrentForm->hasValue("CASHREFNO") ? $CurrentForm->getValue("CASHREFNO") : $CurrentForm->getValue("x_CASHREFNO");
        if (!$this->CASHREFNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CASHREFNO->Visible = false; // Disable update for API request
            } else {
                $this->CASHREFNO->setFormValue($val);
            }
        }

        // Check field name 'CASHIERSHIFT' first before field var 'x_CASHIERSHIFT'
        $val = $CurrentForm->hasValue("CASHIERSHIFT") ? $CurrentForm->getValue("CASHIERSHIFT") : $CurrentForm->getValue("x_CASHIERSHIFT");
        if (!$this->CASHIERSHIFT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CASHIERSHIFT->Visible = false; // Disable update for API request
            } else {
                $this->CASHIERSHIFT->setFormValue($val);
            }
        }

        // Check field name 'PRCODE' first before field var 'x_PRCODE'
        $val = $CurrentForm->hasValue("PRCODE") ? $CurrentForm->getValue("PRCODE") : $CurrentForm->getValue("x_PRCODE");
        if (!$this->PRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PRCODE->Visible = false; // Disable update for API request
            } else {
                $this->PRCODE->setFormValue($val);
            }
        }

        // Check field name 'RELEASEBY' first before field var 'x_RELEASEBY'
        $val = $CurrentForm->hasValue("RELEASEBY") ? $CurrentForm->getValue("RELEASEBY") : $CurrentForm->getValue("x_RELEASEBY");
        if (!$this->RELEASEBY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RELEASEBY->Visible = false; // Disable update for API request
            } else {
                $this->RELEASEBY->setFormValue($val);
            }
        }

        // Check field name 'CRAUTHOR' first before field var 'x_CRAUTHOR'
        $val = $CurrentForm->hasValue("CRAUTHOR") ? $CurrentForm->getValue("CRAUTHOR") : $CurrentForm->getValue("x_CRAUTHOR");
        if (!$this->CRAUTHOR->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CRAUTHOR->Visible = false; // Disable update for API request
            } else {
                $this->CRAUTHOR->setFormValue($val);
            }
        }

        // Check field name 'PAYMENT' first before field var 'x_PAYMENT'
        $val = $CurrentForm->hasValue("PAYMENT") ? $CurrentForm->getValue("PAYMENT") : $CurrentForm->getValue("x_PAYMENT");
        if (!$this->PAYMENT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PAYMENT->Visible = false; // Disable update for API request
            } else {
                $this->PAYMENT->setFormValue($val);
            }
        }

        // Check field name 'DRID' first before field var 'x_DRID'
        $val = $CurrentForm->hasValue("DRID") ? $CurrentForm->getValue("DRID") : $CurrentForm->getValue("x_DRID");
        if (!$this->DRID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DRID->Visible = false; // Disable update for API request
            } else {
                $this->DRID->setFormValue($val);
            }
        }

        // Check field name 'WARD' first before field var 'x_WARD'
        $val = $CurrentForm->hasValue("WARD") ? $CurrentForm->getValue("WARD") : $CurrentForm->getValue("x_WARD");
        if (!$this->WARD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WARD->Visible = false; // Disable update for API request
            } else {
                $this->WARD->setFormValue($val);
            }
        }

        // Check field name 'STAXTYPE' first before field var 'x_STAXTYPE'
        $val = $CurrentForm->hasValue("STAXTYPE") ? $CurrentForm->getValue("STAXTYPE") : $CurrentForm->getValue("x_STAXTYPE");
        if (!$this->STAXTYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->STAXTYPE->Visible = false; // Disable update for API request
            } else {
                $this->STAXTYPE->setFormValue($val);
            }
        }

        // Check field name 'PURDISCVAL' first before field var 'x_PURDISCVAL'
        $val = $CurrentForm->hasValue("PURDISCVAL") ? $CurrentForm->getValue("PURDISCVAL") : $CurrentForm->getValue("x_PURDISCVAL");
        if (!$this->PURDISCVAL->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PURDISCVAL->Visible = false; // Disable update for API request
            } else {
                $this->PURDISCVAL->setFormValue($val);
            }
        }

        // Check field name 'RNDOFF' first before field var 'x_RNDOFF'
        $val = $CurrentForm->hasValue("RNDOFF") ? $CurrentForm->getValue("RNDOFF") : $CurrentForm->getValue("x_RNDOFF");
        if (!$this->RNDOFF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RNDOFF->Visible = false; // Disable update for API request
            } else {
                $this->RNDOFF->setFormValue($val);
            }
        }

        // Check field name 'DISCONMRP' first before field var 'x_DISCONMRP'
        $val = $CurrentForm->hasValue("DISCONMRP") ? $CurrentForm->getValue("DISCONMRP") : $CurrentForm->getValue("x_DISCONMRP");
        if (!$this->DISCONMRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DISCONMRP->Visible = false; // Disable update for API request
            } else {
                $this->DISCONMRP->setFormValue($val);
            }
        }

        // Check field name 'DELVDT' first before field var 'x_DELVDT'
        $val = $CurrentForm->hasValue("DELVDT") ? $CurrentForm->getValue("DELVDT") : $CurrentForm->getValue("x_DELVDT");
        if (!$this->DELVDT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DELVDT->Visible = false; // Disable update for API request
            } else {
                $this->DELVDT->setFormValue($val);
            }
            $this->DELVDT->CurrentValue = UnFormatDateTime($this->DELVDT->CurrentValue, 0);
        }

        // Check field name 'DELVTIME' first before field var 'x_DELVTIME'
        $val = $CurrentForm->hasValue("DELVTIME") ? $CurrentForm->getValue("DELVTIME") : $CurrentForm->getValue("x_DELVTIME");
        if (!$this->DELVTIME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DELVTIME->Visible = false; // Disable update for API request
            } else {
                $this->DELVTIME->setFormValue($val);
            }
        }

        // Check field name 'DELVBY' first before field var 'x_DELVBY'
        $val = $CurrentForm->hasValue("DELVBY") ? $CurrentForm->getValue("DELVBY") : $CurrentForm->getValue("x_DELVBY");
        if (!$this->DELVBY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DELVBY->Visible = false; // Disable update for API request
            } else {
                $this->DELVBY->setFormValue($val);
            }
        }

        // Check field name 'HOSPNO' first before field var 'x_HOSPNO'
        $val = $CurrentForm->hasValue("HOSPNO") ? $CurrentForm->getValue("HOSPNO") : $CurrentForm->getValue("x_HOSPNO");
        if (!$this->HOSPNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HOSPNO->Visible = false; // Disable update for API request
            } else {
                $this->HOSPNO->setFormValue($val);
            }
        }

        // Check field name 'pbv' first before field var 'x_pbv'
        $val = $CurrentForm->hasValue("pbv") ? $CurrentForm->getValue("pbv") : $CurrentForm->getValue("x_pbv");
        if (!$this->pbv->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pbv->Visible = false; // Disable update for API request
            } else {
                $this->pbv->setFormValue($val);
            }
        }

        // Check field name 'pbt' first before field var 'x_pbt'
        $val = $CurrentForm->hasValue("pbt") ? $CurrentForm->getValue("pbt") : $CurrentForm->getValue("x_pbt");
        if (!$this->pbt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pbt->Visible = false; // Disable update for API request
            } else {
                $this->pbt->setFormValue($val);
            }
        }

        // Check field name 'SiNo' first before field var 'x_SiNo'
        $val = $CurrentForm->hasValue("SiNo") ? $CurrentForm->getValue("SiNo") : $CurrentForm->getValue("x_SiNo");
        if (!$this->SiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SiNo->Visible = false; // Disable update for API request
            } else {
                $this->SiNo->setFormValue($val);
            }
        }

        // Check field name 'Product' first before field var 'x_Product'
        $val = $CurrentForm->hasValue("Product") ? $CurrentForm->getValue("Product") : $CurrentForm->getValue("x_Product");
        if (!$this->Product->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Product->Visible = false; // Disable update for API request
            } else {
                $this->Product->setFormValue($val);
            }
        }

        // Check field name 'Mfg' first before field var 'x_Mfg'
        $val = $CurrentForm->hasValue("Mfg") ? $CurrentForm->getValue("Mfg") : $CurrentForm->getValue("x_Mfg");
        if (!$this->Mfg->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mfg->Visible = false; // Disable update for API request
            } else {
                $this->Mfg->setFormValue($val);
            }
        }

        // Check field name 'HosoID' first before field var 'x_HosoID'
        $val = $CurrentForm->hasValue("HosoID") ? $CurrentForm->getValue("HosoID") : $CurrentForm->getValue("x_HosoID");
        if (!$this->HosoID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HosoID->Visible = false; // Disable update for API request
            } else {
                $this->HosoID->setFormValue($val);
            }
        }

        // Check field name 'createdby' first before field var 'x_createdby'
        $val = $CurrentForm->hasValue("createdby") ? $CurrentForm->getValue("createdby") : $CurrentForm->getValue("x_createdby");
        if (!$this->createdby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdby->Visible = false; // Disable update for API request
            } else {
                $this->createdby->setFormValue($val);
            }
        }

        // Check field name 'createddatetime' first before field var 'x_createddatetime'
        $val = $CurrentForm->hasValue("createddatetime") ? $CurrentForm->getValue("createddatetime") : $CurrentForm->getValue("x_createddatetime");
        if (!$this->createddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createddatetime->Visible = false; // Disable update for API request
            } else {
                $this->createddatetime->setFormValue($val);
            }
            $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        }

        // Check field name 'modifiedby' first before field var 'x_modifiedby'
        $val = $CurrentForm->hasValue("modifiedby") ? $CurrentForm->getValue("modifiedby") : $CurrentForm->getValue("x_modifiedby");
        if (!$this->modifiedby->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifiedby->Visible = false; // Disable update for API request
            } else {
                $this->modifiedby->setFormValue($val);
            }
        }

        // Check field name 'modifieddatetime' first before field var 'x_modifieddatetime'
        $val = $CurrentForm->hasValue("modifieddatetime") ? $CurrentForm->getValue("modifieddatetime") : $CurrentForm->getValue("x_modifieddatetime");
        if (!$this->modifieddatetime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modifieddatetime->Visible = false; // Disable update for API request
            } else {
                $this->modifieddatetime->setFormValue($val);
            }
            $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        }

        // Check field name 'MFRCODE' first before field var 'x_MFRCODE'
        $val = $CurrentForm->hasValue("MFRCODE") ? $CurrentForm->getValue("MFRCODE") : $CurrentForm->getValue("x_MFRCODE");
        if (!$this->MFRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MFRCODE->Visible = false; // Disable update for API request
            } else {
                $this->MFRCODE->setFormValue($val);
            }
        }

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
            }
        }

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
            }
        }

        // Check field name 'BRNAME' first before field var 'x_BRNAME'
        $val = $CurrentForm->hasValue("BRNAME") ? $CurrentForm->getValue("BRNAME") : $CurrentForm->getValue("x_BRNAME");
        if (!$this->BRNAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRNAME->Visible = false; // Disable update for API request
            } else {
                $this->BRNAME->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
        $this->TYPE->CurrentValue = $this->TYPE->FormValue;
        $this->DN->CurrentValue = $this->DN->FormValue;
        $this->RDN->CurrentValue = $this->RDN->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        $this->PRC->CurrentValue = $this->PRC->FormValue;
        $this->OQ->CurrentValue = $this->OQ->FormValue;
        $this->RQ->CurrentValue = $this->RQ->FormValue;
        $this->MRQ->CurrentValue = $this->MRQ->FormValue;
        $this->IQ->CurrentValue = $this->IQ->FormValue;
        $this->BATCHNO->CurrentValue = $this->BATCHNO->FormValue;
        $this->EXPDT->CurrentValue = $this->EXPDT->FormValue;
        $this->EXPDT->CurrentValue = UnFormatDateTime($this->EXPDT->CurrentValue, 0);
        $this->BILLNO->CurrentValue = $this->BILLNO->FormValue;
        $this->BILLDT->CurrentValue = $this->BILLDT->FormValue;
        $this->BILLDT->CurrentValue = UnFormatDateTime($this->BILLDT->CurrentValue, 0);
        $this->RT->CurrentValue = $this->RT->FormValue;
        $this->VALUE->CurrentValue = $this->VALUE->FormValue;
        $this->DISC->CurrentValue = $this->DISC->FormValue;
        $this->TAXP->CurrentValue = $this->TAXP->FormValue;
        $this->TAX->CurrentValue = $this->TAX->FormValue;
        $this->TAXR->CurrentValue = $this->TAXR->FormValue;
        $this->DAMT->CurrentValue = $this->DAMT->FormValue;
        $this->EMPNO->CurrentValue = $this->EMPNO->FormValue;
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->DRNAME->CurrentValue = $this->DRNAME->FormValue;
        $this->BTIME->CurrentValue = $this->BTIME->FormValue;
        $this->ONO->CurrentValue = $this->ONO->FormValue;
        $this->ODT->CurrentValue = $this->ODT->FormValue;
        $this->ODT->CurrentValue = UnFormatDateTime($this->ODT->CurrentValue, 0);
        $this->PURRT->CurrentValue = $this->PURRT->FormValue;
        $this->GRP->CurrentValue = $this->GRP->FormValue;
        $this->IBATCH->CurrentValue = $this->IBATCH->FormValue;
        $this->IPNO->CurrentValue = $this->IPNO->FormValue;
        $this->OPNO->CurrentValue = $this->OPNO->FormValue;
        $this->RECID->CurrentValue = $this->RECID->FormValue;
        $this->FQTY->CurrentValue = $this->FQTY->FormValue;
        $this->UR->CurrentValue = $this->UR->FormValue;
        $this->DCID->CurrentValue = $this->DCID->FormValue;
        $this->_USERID->CurrentValue = $this->_USERID->FormValue;
        $this->MODDT->CurrentValue = $this->MODDT->FormValue;
        $this->MODDT->CurrentValue = UnFormatDateTime($this->MODDT->CurrentValue, 0);
        $this->FYM->CurrentValue = $this->FYM->FormValue;
        $this->PRCBATCH->CurrentValue = $this->PRCBATCH->FormValue;
        $this->SLNO->CurrentValue = $this->SLNO->FormValue;
        $this->MRP->CurrentValue = $this->MRP->FormValue;
        $this->BILLYM->CurrentValue = $this->BILLYM->FormValue;
        $this->BILLGRP->CurrentValue = $this->BILLGRP->FormValue;
        $this->STAFF->CurrentValue = $this->STAFF->FormValue;
        $this->TEMPIPNO->CurrentValue = $this->TEMPIPNO->FormValue;
        $this->PRNTED->CurrentValue = $this->PRNTED->FormValue;
        $this->PATNAME->CurrentValue = $this->PATNAME->FormValue;
        $this->PJVNO->CurrentValue = $this->PJVNO->FormValue;
        $this->PJVSLNO->CurrentValue = $this->PJVSLNO->FormValue;
        $this->OTHDISC->CurrentValue = $this->OTHDISC->FormValue;
        $this->PJVYM->CurrentValue = $this->PJVYM->FormValue;
        $this->PURDISCPER->CurrentValue = $this->PURDISCPER->FormValue;
        $this->CASHIER->CurrentValue = $this->CASHIER->FormValue;
        $this->CASHTIME->CurrentValue = $this->CASHTIME->FormValue;
        $this->CASHRECD->CurrentValue = $this->CASHRECD->FormValue;
        $this->CASHREFNO->CurrentValue = $this->CASHREFNO->FormValue;
        $this->CASHIERSHIFT->CurrentValue = $this->CASHIERSHIFT->FormValue;
        $this->PRCODE->CurrentValue = $this->PRCODE->FormValue;
        $this->RELEASEBY->CurrentValue = $this->RELEASEBY->FormValue;
        $this->CRAUTHOR->CurrentValue = $this->CRAUTHOR->FormValue;
        $this->PAYMENT->CurrentValue = $this->PAYMENT->FormValue;
        $this->DRID->CurrentValue = $this->DRID->FormValue;
        $this->WARD->CurrentValue = $this->WARD->FormValue;
        $this->STAXTYPE->CurrentValue = $this->STAXTYPE->FormValue;
        $this->PURDISCVAL->CurrentValue = $this->PURDISCVAL->FormValue;
        $this->RNDOFF->CurrentValue = $this->RNDOFF->FormValue;
        $this->DISCONMRP->CurrentValue = $this->DISCONMRP->FormValue;
        $this->DELVDT->CurrentValue = $this->DELVDT->FormValue;
        $this->DELVDT->CurrentValue = UnFormatDateTime($this->DELVDT->CurrentValue, 0);
        $this->DELVTIME->CurrentValue = $this->DELVTIME->FormValue;
        $this->DELVBY->CurrentValue = $this->DELVBY->FormValue;
        $this->HOSPNO->CurrentValue = $this->HOSPNO->FormValue;
        $this->pbv->CurrentValue = $this->pbv->FormValue;
        $this->pbt->CurrentValue = $this->pbt->FormValue;
        $this->SiNo->CurrentValue = $this->SiNo->FormValue;
        $this->Product->CurrentValue = $this->Product->FormValue;
        $this->Mfg->CurrentValue = $this->Mfg->FormValue;
        $this->HosoID->CurrentValue = $this->HosoID->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->MFRCODE->CurrentValue = $this->MFRCODE->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->BRNAME->CurrentValue = $this->BRNAME->FormValue;
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
        $this->loadDefaultValues();
        $row = [];
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
        $row['TYPE'] = $this->TYPE->CurrentValue;
        $row['DN'] = $this->DN->CurrentValue;
        $row['RDN'] = $this->RDN->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['PRC'] = $this->PRC->CurrentValue;
        $row['OQ'] = $this->OQ->CurrentValue;
        $row['RQ'] = $this->RQ->CurrentValue;
        $row['MRQ'] = $this->MRQ->CurrentValue;
        $row['IQ'] = $this->IQ->CurrentValue;
        $row['BATCHNO'] = $this->BATCHNO->CurrentValue;
        $row['EXPDT'] = $this->EXPDT->CurrentValue;
        $row['BILLNO'] = $this->BILLNO->CurrentValue;
        $row['BILLDT'] = $this->BILLDT->CurrentValue;
        $row['RT'] = $this->RT->CurrentValue;
        $row['VALUE'] = $this->VALUE->CurrentValue;
        $row['DISC'] = $this->DISC->CurrentValue;
        $row['TAXP'] = $this->TAXP->CurrentValue;
        $row['TAX'] = $this->TAX->CurrentValue;
        $row['TAXR'] = $this->TAXR->CurrentValue;
        $row['DAMT'] = $this->DAMT->CurrentValue;
        $row['EMPNO'] = $this->EMPNO->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['DRNAME'] = $this->DRNAME->CurrentValue;
        $row['BTIME'] = $this->BTIME->CurrentValue;
        $row['ONO'] = $this->ONO->CurrentValue;
        $row['ODT'] = $this->ODT->CurrentValue;
        $row['PURRT'] = $this->PURRT->CurrentValue;
        $row['GRP'] = $this->GRP->CurrentValue;
        $row['IBATCH'] = $this->IBATCH->CurrentValue;
        $row['IPNO'] = $this->IPNO->CurrentValue;
        $row['OPNO'] = $this->OPNO->CurrentValue;
        $row['RECID'] = $this->RECID->CurrentValue;
        $row['FQTY'] = $this->FQTY->CurrentValue;
        $row['UR'] = $this->UR->CurrentValue;
        $row['DCID'] = $this->DCID->CurrentValue;
        $row['USERID'] = $this->_USERID->CurrentValue;
        $row['MODDT'] = $this->MODDT->CurrentValue;
        $row['FYM'] = $this->FYM->CurrentValue;
        $row['PRCBATCH'] = $this->PRCBATCH->CurrentValue;
        $row['SLNO'] = $this->SLNO->CurrentValue;
        $row['MRP'] = $this->MRP->CurrentValue;
        $row['BILLYM'] = $this->BILLYM->CurrentValue;
        $row['BILLGRP'] = $this->BILLGRP->CurrentValue;
        $row['STAFF'] = $this->STAFF->CurrentValue;
        $row['TEMPIPNO'] = $this->TEMPIPNO->CurrentValue;
        $row['PRNTED'] = $this->PRNTED->CurrentValue;
        $row['PATNAME'] = $this->PATNAME->CurrentValue;
        $row['PJVNO'] = $this->PJVNO->CurrentValue;
        $row['PJVSLNO'] = $this->PJVSLNO->CurrentValue;
        $row['OTHDISC'] = $this->OTHDISC->CurrentValue;
        $row['PJVYM'] = $this->PJVYM->CurrentValue;
        $row['PURDISCPER'] = $this->PURDISCPER->CurrentValue;
        $row['CASHIER'] = $this->CASHIER->CurrentValue;
        $row['CASHTIME'] = $this->CASHTIME->CurrentValue;
        $row['CASHRECD'] = $this->CASHRECD->CurrentValue;
        $row['CASHREFNO'] = $this->CASHREFNO->CurrentValue;
        $row['CASHIERSHIFT'] = $this->CASHIERSHIFT->CurrentValue;
        $row['PRCODE'] = $this->PRCODE->CurrentValue;
        $row['RELEASEBY'] = $this->RELEASEBY->CurrentValue;
        $row['CRAUTHOR'] = $this->CRAUTHOR->CurrentValue;
        $row['PAYMENT'] = $this->PAYMENT->CurrentValue;
        $row['DRID'] = $this->DRID->CurrentValue;
        $row['WARD'] = $this->WARD->CurrentValue;
        $row['STAXTYPE'] = $this->STAXTYPE->CurrentValue;
        $row['PURDISCVAL'] = $this->PURDISCVAL->CurrentValue;
        $row['RNDOFF'] = $this->RNDOFF->CurrentValue;
        $row['DISCONMRP'] = $this->DISCONMRP->CurrentValue;
        $row['DELVDT'] = $this->DELVDT->CurrentValue;
        $row['DELVTIME'] = $this->DELVTIME->CurrentValue;
        $row['DELVBY'] = $this->DELVBY->CurrentValue;
        $row['HOSPNO'] = $this->HOSPNO->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
        $row['pbv'] = $this->pbv->CurrentValue;
        $row['pbt'] = $this->pbt->CurrentValue;
        $row['SiNo'] = $this->SiNo->CurrentValue;
        $row['Product'] = $this->Product->CurrentValue;
        $row['Mfg'] = $this->Mfg->CurrentValue;
        $row['HosoID'] = $this->HosoID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['MFRCODE'] = $this->MFRCODE->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['PatID'] = $this->PatID->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['BRNAME'] = $this->BRNAME->CurrentValue;
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
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // TYPE
            $this->TYPE->EditAttrs["class"] = "form-control";
            $this->TYPE->EditCustomAttributes = "";
            if (!$this->TYPE->Raw) {
                $this->TYPE->CurrentValue = HtmlDecode($this->TYPE->CurrentValue);
            }
            $this->TYPE->EditValue = HtmlEncode($this->TYPE->CurrentValue);
            $this->TYPE->PlaceHolder = RemoveHtml($this->TYPE->caption());

            // DN
            $this->DN->EditAttrs["class"] = "form-control";
            $this->DN->EditCustomAttributes = "";
            if (!$this->DN->Raw) {
                $this->DN->CurrentValue = HtmlDecode($this->DN->CurrentValue);
            }
            $this->DN->EditValue = HtmlEncode($this->DN->CurrentValue);
            $this->DN->PlaceHolder = RemoveHtml($this->DN->caption());

            // RDN
            $this->RDN->EditAttrs["class"] = "form-control";
            $this->RDN->EditCustomAttributes = "";
            if (!$this->RDN->Raw) {
                $this->RDN->CurrentValue = HtmlDecode($this->RDN->CurrentValue);
            }
            $this->RDN->EditValue = HtmlEncode($this->RDN->CurrentValue);
            $this->RDN->PlaceHolder = RemoveHtml($this->RDN->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // PRC
            $this->PRC->EditAttrs["class"] = "form-control";
            $this->PRC->EditCustomAttributes = "";
            if (!$this->PRC->Raw) {
                $this->PRC->CurrentValue = HtmlDecode($this->PRC->CurrentValue);
            }
            $this->PRC->EditValue = HtmlEncode($this->PRC->CurrentValue);
            $this->PRC->PlaceHolder = RemoveHtml($this->PRC->caption());

            // OQ
            $this->OQ->EditAttrs["class"] = "form-control";
            $this->OQ->EditCustomAttributes = "";
            $this->OQ->EditValue = HtmlEncode($this->OQ->CurrentValue);
            $this->OQ->PlaceHolder = RemoveHtml($this->OQ->caption());
            if (strval($this->OQ->EditValue) != "" && is_numeric($this->OQ->EditValue)) {
                $this->OQ->EditValue = FormatNumber($this->OQ->EditValue, -2, -2, -2, -2);
            }

            // RQ
            $this->RQ->EditAttrs["class"] = "form-control";
            $this->RQ->EditCustomAttributes = "";
            $this->RQ->EditValue = HtmlEncode($this->RQ->CurrentValue);
            $this->RQ->PlaceHolder = RemoveHtml($this->RQ->caption());
            if (strval($this->RQ->EditValue) != "" && is_numeric($this->RQ->EditValue)) {
                $this->RQ->EditValue = FormatNumber($this->RQ->EditValue, -2, -2, -2, -2);
            }

            // MRQ
            $this->MRQ->EditAttrs["class"] = "form-control";
            $this->MRQ->EditCustomAttributes = "";
            $this->MRQ->EditValue = HtmlEncode($this->MRQ->CurrentValue);
            $this->MRQ->PlaceHolder = RemoveHtml($this->MRQ->caption());
            if (strval($this->MRQ->EditValue) != "" && is_numeric($this->MRQ->EditValue)) {
                $this->MRQ->EditValue = FormatNumber($this->MRQ->EditValue, -2, -2, -2, -2);
            }

            // IQ
            $this->IQ->EditAttrs["class"] = "form-control";
            $this->IQ->EditCustomAttributes = "";
            $this->IQ->EditValue = HtmlEncode($this->IQ->CurrentValue);
            $this->IQ->PlaceHolder = RemoveHtml($this->IQ->caption());
            if (strval($this->IQ->EditValue) != "" && is_numeric($this->IQ->EditValue)) {
                $this->IQ->EditValue = FormatNumber($this->IQ->EditValue, -2, -2, -2, -2);
            }

            // BATCHNO
            $this->BATCHNO->EditAttrs["class"] = "form-control";
            $this->BATCHNO->EditCustomAttributes = "";
            if (!$this->BATCHNO->Raw) {
                $this->BATCHNO->CurrentValue = HtmlDecode($this->BATCHNO->CurrentValue);
            }
            $this->BATCHNO->EditValue = HtmlEncode($this->BATCHNO->CurrentValue);
            $this->BATCHNO->PlaceHolder = RemoveHtml($this->BATCHNO->caption());

            // EXPDT
            $this->EXPDT->EditAttrs["class"] = "form-control";
            $this->EXPDT->EditCustomAttributes = "";
            $this->EXPDT->EditValue = HtmlEncode(FormatDateTime($this->EXPDT->CurrentValue, 8));
            $this->EXPDT->PlaceHolder = RemoveHtml($this->EXPDT->caption());

            // BILLNO
            $this->BILLNO->EditAttrs["class"] = "form-control";
            $this->BILLNO->EditCustomAttributes = "";
            if (!$this->BILLNO->Raw) {
                $this->BILLNO->CurrentValue = HtmlDecode($this->BILLNO->CurrentValue);
            }
            $this->BILLNO->EditValue = HtmlEncode($this->BILLNO->CurrentValue);
            $this->BILLNO->PlaceHolder = RemoveHtml($this->BILLNO->caption());

            // BILLDT
            $this->BILLDT->EditAttrs["class"] = "form-control";
            $this->BILLDT->EditCustomAttributes = "";
            $this->BILLDT->EditValue = HtmlEncode(FormatDateTime($this->BILLDT->CurrentValue, 8));
            $this->BILLDT->PlaceHolder = RemoveHtml($this->BILLDT->caption());

            // RT
            $this->RT->EditAttrs["class"] = "form-control";
            $this->RT->EditCustomAttributes = "";
            $this->RT->EditValue = HtmlEncode($this->RT->CurrentValue);
            $this->RT->PlaceHolder = RemoveHtml($this->RT->caption());
            if (strval($this->RT->EditValue) != "" && is_numeric($this->RT->EditValue)) {
                $this->RT->EditValue = FormatNumber($this->RT->EditValue, -2, -2, -2, -2);
            }

            // VALUE
            $this->VALUE->EditAttrs["class"] = "form-control";
            $this->VALUE->EditCustomAttributes = "";
            $this->VALUE->EditValue = HtmlEncode($this->VALUE->CurrentValue);
            $this->VALUE->PlaceHolder = RemoveHtml($this->VALUE->caption());
            if (strval($this->VALUE->EditValue) != "" && is_numeric($this->VALUE->EditValue)) {
                $this->VALUE->EditValue = FormatNumber($this->VALUE->EditValue, -2, -2, -2, -2);
            }

            // DISC
            $this->DISC->EditAttrs["class"] = "form-control";
            $this->DISC->EditCustomAttributes = "";
            $this->DISC->EditValue = HtmlEncode($this->DISC->CurrentValue);
            $this->DISC->PlaceHolder = RemoveHtml($this->DISC->caption());
            if (strval($this->DISC->EditValue) != "" && is_numeric($this->DISC->EditValue)) {
                $this->DISC->EditValue = FormatNumber($this->DISC->EditValue, -2, -2, -2, -2);
            }

            // TAXP
            $this->TAXP->EditAttrs["class"] = "form-control";
            $this->TAXP->EditCustomAttributes = "";
            $this->TAXP->EditValue = HtmlEncode($this->TAXP->CurrentValue);
            $this->TAXP->PlaceHolder = RemoveHtml($this->TAXP->caption());
            if (strval($this->TAXP->EditValue) != "" && is_numeric($this->TAXP->EditValue)) {
                $this->TAXP->EditValue = FormatNumber($this->TAXP->EditValue, -2, -2, -2, -2);
            }

            // TAX
            $this->TAX->EditAttrs["class"] = "form-control";
            $this->TAX->EditCustomAttributes = "";
            $this->TAX->EditValue = HtmlEncode($this->TAX->CurrentValue);
            $this->TAX->PlaceHolder = RemoveHtml($this->TAX->caption());
            if (strval($this->TAX->EditValue) != "" && is_numeric($this->TAX->EditValue)) {
                $this->TAX->EditValue = FormatNumber($this->TAX->EditValue, -2, -2, -2, -2);
            }

            // TAXR
            $this->TAXR->EditAttrs["class"] = "form-control";
            $this->TAXR->EditCustomAttributes = "";
            $this->TAXR->EditValue = HtmlEncode($this->TAXR->CurrentValue);
            $this->TAXR->PlaceHolder = RemoveHtml($this->TAXR->caption());
            if (strval($this->TAXR->EditValue) != "" && is_numeric($this->TAXR->EditValue)) {
                $this->TAXR->EditValue = FormatNumber($this->TAXR->EditValue, -2, -2, -2, -2);
            }

            // DAMT
            $this->DAMT->EditAttrs["class"] = "form-control";
            $this->DAMT->EditCustomAttributes = "";
            $this->DAMT->EditValue = HtmlEncode($this->DAMT->CurrentValue);
            $this->DAMT->PlaceHolder = RemoveHtml($this->DAMT->caption());
            if (strval($this->DAMT->EditValue) != "" && is_numeric($this->DAMT->EditValue)) {
                $this->DAMT->EditValue = FormatNumber($this->DAMT->EditValue, -2, -2, -2, -2);
            }

            // EMPNO
            $this->EMPNO->EditAttrs["class"] = "form-control";
            $this->EMPNO->EditCustomAttributes = "";
            if (!$this->EMPNO->Raw) {
                $this->EMPNO->CurrentValue = HtmlDecode($this->EMPNO->CurrentValue);
            }
            $this->EMPNO->EditValue = HtmlEncode($this->EMPNO->CurrentValue);
            $this->EMPNO->PlaceHolder = RemoveHtml($this->EMPNO->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // DRNAME
            $this->DRNAME->EditAttrs["class"] = "form-control";
            $this->DRNAME->EditCustomAttributes = "";
            if (!$this->DRNAME->Raw) {
                $this->DRNAME->CurrentValue = HtmlDecode($this->DRNAME->CurrentValue);
            }
            $this->DRNAME->EditValue = HtmlEncode($this->DRNAME->CurrentValue);
            $this->DRNAME->PlaceHolder = RemoveHtml($this->DRNAME->caption());

            // BTIME
            $this->BTIME->EditAttrs["class"] = "form-control";
            $this->BTIME->EditCustomAttributes = "";
            if (!$this->BTIME->Raw) {
                $this->BTIME->CurrentValue = HtmlDecode($this->BTIME->CurrentValue);
            }
            $this->BTIME->EditValue = HtmlEncode($this->BTIME->CurrentValue);
            $this->BTIME->PlaceHolder = RemoveHtml($this->BTIME->caption());

            // ONO
            $this->ONO->EditAttrs["class"] = "form-control";
            $this->ONO->EditCustomAttributes = "";
            if (!$this->ONO->Raw) {
                $this->ONO->CurrentValue = HtmlDecode($this->ONO->CurrentValue);
            }
            $this->ONO->EditValue = HtmlEncode($this->ONO->CurrentValue);
            $this->ONO->PlaceHolder = RemoveHtml($this->ONO->caption());

            // ODT
            $this->ODT->EditAttrs["class"] = "form-control";
            $this->ODT->EditCustomAttributes = "";
            $this->ODT->EditValue = HtmlEncode(FormatDateTime($this->ODT->CurrentValue, 8));
            $this->ODT->PlaceHolder = RemoveHtml($this->ODT->caption());

            // PURRT
            $this->PURRT->EditAttrs["class"] = "form-control";
            $this->PURRT->EditCustomAttributes = "";
            $this->PURRT->EditValue = HtmlEncode($this->PURRT->CurrentValue);
            $this->PURRT->PlaceHolder = RemoveHtml($this->PURRT->caption());
            if (strval($this->PURRT->EditValue) != "" && is_numeric($this->PURRT->EditValue)) {
                $this->PURRT->EditValue = FormatNumber($this->PURRT->EditValue, -2, -2, -2, -2);
            }

            // GRP
            $this->GRP->EditAttrs["class"] = "form-control";
            $this->GRP->EditCustomAttributes = "";
            if (!$this->GRP->Raw) {
                $this->GRP->CurrentValue = HtmlDecode($this->GRP->CurrentValue);
            }
            $this->GRP->EditValue = HtmlEncode($this->GRP->CurrentValue);
            $this->GRP->PlaceHolder = RemoveHtml($this->GRP->caption());

            // IBATCH
            $this->IBATCH->EditAttrs["class"] = "form-control";
            $this->IBATCH->EditCustomAttributes = "";
            if (!$this->IBATCH->Raw) {
                $this->IBATCH->CurrentValue = HtmlDecode($this->IBATCH->CurrentValue);
            }
            $this->IBATCH->EditValue = HtmlEncode($this->IBATCH->CurrentValue);
            $this->IBATCH->PlaceHolder = RemoveHtml($this->IBATCH->caption());

            // IPNO
            $this->IPNO->EditAttrs["class"] = "form-control";
            $this->IPNO->EditCustomAttributes = "";
            if (!$this->IPNO->Raw) {
                $this->IPNO->CurrentValue = HtmlDecode($this->IPNO->CurrentValue);
            }
            $this->IPNO->EditValue = HtmlEncode($this->IPNO->CurrentValue);
            $this->IPNO->PlaceHolder = RemoveHtml($this->IPNO->caption());

            // OPNO
            $this->OPNO->EditAttrs["class"] = "form-control";
            $this->OPNO->EditCustomAttributes = "";
            if (!$this->OPNO->Raw) {
                $this->OPNO->CurrentValue = HtmlDecode($this->OPNO->CurrentValue);
            }
            $this->OPNO->EditValue = HtmlEncode($this->OPNO->CurrentValue);
            $this->OPNO->PlaceHolder = RemoveHtml($this->OPNO->caption());

            // RECID
            $this->RECID->EditAttrs["class"] = "form-control";
            $this->RECID->EditCustomAttributes = "";
            if (!$this->RECID->Raw) {
                $this->RECID->CurrentValue = HtmlDecode($this->RECID->CurrentValue);
            }
            $this->RECID->EditValue = HtmlEncode($this->RECID->CurrentValue);
            $this->RECID->PlaceHolder = RemoveHtml($this->RECID->caption());

            // FQTY
            $this->FQTY->EditAttrs["class"] = "form-control";
            $this->FQTY->EditCustomAttributes = "";
            $this->FQTY->EditValue = HtmlEncode($this->FQTY->CurrentValue);
            $this->FQTY->PlaceHolder = RemoveHtml($this->FQTY->caption());
            if (strval($this->FQTY->EditValue) != "" && is_numeric($this->FQTY->EditValue)) {
                $this->FQTY->EditValue = FormatNumber($this->FQTY->EditValue, -2, -2, -2, -2);
            }

            // UR
            $this->UR->EditAttrs["class"] = "form-control";
            $this->UR->EditCustomAttributes = "";
            $this->UR->EditValue = HtmlEncode($this->UR->CurrentValue);
            $this->UR->PlaceHolder = RemoveHtml($this->UR->caption());
            if (strval($this->UR->EditValue) != "" && is_numeric($this->UR->EditValue)) {
                $this->UR->EditValue = FormatNumber($this->UR->EditValue, -2, -2, -2, -2);
            }

            // DCID
            $this->DCID->EditAttrs["class"] = "form-control";
            $this->DCID->EditCustomAttributes = "";
            if (!$this->DCID->Raw) {
                $this->DCID->CurrentValue = HtmlDecode($this->DCID->CurrentValue);
            }
            $this->DCID->EditValue = HtmlEncode($this->DCID->CurrentValue);
            $this->DCID->PlaceHolder = RemoveHtml($this->DCID->caption());

            // USERID
            $this->_USERID->EditAttrs["class"] = "form-control";
            $this->_USERID->EditCustomAttributes = "";
            if (!$this->_USERID->Raw) {
                $this->_USERID->CurrentValue = HtmlDecode($this->_USERID->CurrentValue);
            }
            $this->_USERID->EditValue = HtmlEncode($this->_USERID->CurrentValue);
            $this->_USERID->PlaceHolder = RemoveHtml($this->_USERID->caption());

            // MODDT
            $this->MODDT->EditAttrs["class"] = "form-control";
            $this->MODDT->EditCustomAttributes = "";
            $this->MODDT->EditValue = HtmlEncode(FormatDateTime($this->MODDT->CurrentValue, 8));
            $this->MODDT->PlaceHolder = RemoveHtml($this->MODDT->caption());

            // FYM
            $this->FYM->EditAttrs["class"] = "form-control";
            $this->FYM->EditCustomAttributes = "";
            if (!$this->FYM->Raw) {
                $this->FYM->CurrentValue = HtmlDecode($this->FYM->CurrentValue);
            }
            $this->FYM->EditValue = HtmlEncode($this->FYM->CurrentValue);
            $this->FYM->PlaceHolder = RemoveHtml($this->FYM->caption());

            // PRCBATCH
            $this->PRCBATCH->EditAttrs["class"] = "form-control";
            $this->PRCBATCH->EditCustomAttributes = "";
            if (!$this->PRCBATCH->Raw) {
                $this->PRCBATCH->CurrentValue = HtmlDecode($this->PRCBATCH->CurrentValue);
            }
            $this->PRCBATCH->EditValue = HtmlEncode($this->PRCBATCH->CurrentValue);
            $this->PRCBATCH->PlaceHolder = RemoveHtml($this->PRCBATCH->caption());

            // SLNO
            $this->SLNO->EditAttrs["class"] = "form-control";
            $this->SLNO->EditCustomAttributes = "";
            $this->SLNO->EditValue = HtmlEncode($this->SLNO->CurrentValue);
            $this->SLNO->PlaceHolder = RemoveHtml($this->SLNO->caption());

            // MRP
            $this->MRP->EditAttrs["class"] = "form-control";
            $this->MRP->EditCustomAttributes = "";
            $this->MRP->EditValue = HtmlEncode($this->MRP->CurrentValue);
            $this->MRP->PlaceHolder = RemoveHtml($this->MRP->caption());
            if (strval($this->MRP->EditValue) != "" && is_numeric($this->MRP->EditValue)) {
                $this->MRP->EditValue = FormatNumber($this->MRP->EditValue, -2, -2, -2, -2);
            }

            // BILLYM
            $this->BILLYM->EditAttrs["class"] = "form-control";
            $this->BILLYM->EditCustomAttributes = "";
            if (!$this->BILLYM->Raw) {
                $this->BILLYM->CurrentValue = HtmlDecode($this->BILLYM->CurrentValue);
            }
            $this->BILLYM->EditValue = HtmlEncode($this->BILLYM->CurrentValue);
            $this->BILLYM->PlaceHolder = RemoveHtml($this->BILLYM->caption());

            // BILLGRP
            $this->BILLGRP->EditAttrs["class"] = "form-control";
            $this->BILLGRP->EditCustomAttributes = "";
            if (!$this->BILLGRP->Raw) {
                $this->BILLGRP->CurrentValue = HtmlDecode($this->BILLGRP->CurrentValue);
            }
            $this->BILLGRP->EditValue = HtmlEncode($this->BILLGRP->CurrentValue);
            $this->BILLGRP->PlaceHolder = RemoveHtml($this->BILLGRP->caption());

            // STAFF
            $this->STAFF->EditAttrs["class"] = "form-control";
            $this->STAFF->EditCustomAttributes = "";
            if (!$this->STAFF->Raw) {
                $this->STAFF->CurrentValue = HtmlDecode($this->STAFF->CurrentValue);
            }
            $this->STAFF->EditValue = HtmlEncode($this->STAFF->CurrentValue);
            $this->STAFF->PlaceHolder = RemoveHtml($this->STAFF->caption());

            // TEMPIPNO
            $this->TEMPIPNO->EditAttrs["class"] = "form-control";
            $this->TEMPIPNO->EditCustomAttributes = "";
            if (!$this->TEMPIPNO->Raw) {
                $this->TEMPIPNO->CurrentValue = HtmlDecode($this->TEMPIPNO->CurrentValue);
            }
            $this->TEMPIPNO->EditValue = HtmlEncode($this->TEMPIPNO->CurrentValue);
            $this->TEMPIPNO->PlaceHolder = RemoveHtml($this->TEMPIPNO->caption());

            // PRNTED
            $this->PRNTED->EditAttrs["class"] = "form-control";
            $this->PRNTED->EditCustomAttributes = "";
            if (!$this->PRNTED->Raw) {
                $this->PRNTED->CurrentValue = HtmlDecode($this->PRNTED->CurrentValue);
            }
            $this->PRNTED->EditValue = HtmlEncode($this->PRNTED->CurrentValue);
            $this->PRNTED->PlaceHolder = RemoveHtml($this->PRNTED->caption());

            // PATNAME
            $this->PATNAME->EditAttrs["class"] = "form-control";
            $this->PATNAME->EditCustomAttributes = "";
            if (!$this->PATNAME->Raw) {
                $this->PATNAME->CurrentValue = HtmlDecode($this->PATNAME->CurrentValue);
            }
            $this->PATNAME->EditValue = HtmlEncode($this->PATNAME->CurrentValue);
            $this->PATNAME->PlaceHolder = RemoveHtml($this->PATNAME->caption());

            // PJVNO
            $this->PJVNO->EditAttrs["class"] = "form-control";
            $this->PJVNO->EditCustomAttributes = "";
            if (!$this->PJVNO->Raw) {
                $this->PJVNO->CurrentValue = HtmlDecode($this->PJVNO->CurrentValue);
            }
            $this->PJVNO->EditValue = HtmlEncode($this->PJVNO->CurrentValue);
            $this->PJVNO->PlaceHolder = RemoveHtml($this->PJVNO->caption());

            // PJVSLNO
            $this->PJVSLNO->EditAttrs["class"] = "form-control";
            $this->PJVSLNO->EditCustomAttributes = "";
            if (!$this->PJVSLNO->Raw) {
                $this->PJVSLNO->CurrentValue = HtmlDecode($this->PJVSLNO->CurrentValue);
            }
            $this->PJVSLNO->EditValue = HtmlEncode($this->PJVSLNO->CurrentValue);
            $this->PJVSLNO->PlaceHolder = RemoveHtml($this->PJVSLNO->caption());

            // OTHDISC
            $this->OTHDISC->EditAttrs["class"] = "form-control";
            $this->OTHDISC->EditCustomAttributes = "";
            $this->OTHDISC->EditValue = HtmlEncode($this->OTHDISC->CurrentValue);
            $this->OTHDISC->PlaceHolder = RemoveHtml($this->OTHDISC->caption());
            if (strval($this->OTHDISC->EditValue) != "" && is_numeric($this->OTHDISC->EditValue)) {
                $this->OTHDISC->EditValue = FormatNumber($this->OTHDISC->EditValue, -2, -2, -2, -2);
            }

            // PJVYM
            $this->PJVYM->EditAttrs["class"] = "form-control";
            $this->PJVYM->EditCustomAttributes = "";
            if (!$this->PJVYM->Raw) {
                $this->PJVYM->CurrentValue = HtmlDecode($this->PJVYM->CurrentValue);
            }
            $this->PJVYM->EditValue = HtmlEncode($this->PJVYM->CurrentValue);
            $this->PJVYM->PlaceHolder = RemoveHtml($this->PJVYM->caption());

            // PURDISCPER
            $this->PURDISCPER->EditAttrs["class"] = "form-control";
            $this->PURDISCPER->EditCustomAttributes = "";
            $this->PURDISCPER->EditValue = HtmlEncode($this->PURDISCPER->CurrentValue);
            $this->PURDISCPER->PlaceHolder = RemoveHtml($this->PURDISCPER->caption());
            if (strval($this->PURDISCPER->EditValue) != "" && is_numeric($this->PURDISCPER->EditValue)) {
                $this->PURDISCPER->EditValue = FormatNumber($this->PURDISCPER->EditValue, -2, -2, -2, -2);
            }

            // CASHIER
            $this->CASHIER->EditAttrs["class"] = "form-control";
            $this->CASHIER->EditCustomAttributes = "";
            if (!$this->CASHIER->Raw) {
                $this->CASHIER->CurrentValue = HtmlDecode($this->CASHIER->CurrentValue);
            }
            $this->CASHIER->EditValue = HtmlEncode($this->CASHIER->CurrentValue);
            $this->CASHIER->PlaceHolder = RemoveHtml($this->CASHIER->caption());

            // CASHTIME
            $this->CASHTIME->EditAttrs["class"] = "form-control";
            $this->CASHTIME->EditCustomAttributes = "";
            if (!$this->CASHTIME->Raw) {
                $this->CASHTIME->CurrentValue = HtmlDecode($this->CASHTIME->CurrentValue);
            }
            $this->CASHTIME->EditValue = HtmlEncode($this->CASHTIME->CurrentValue);
            $this->CASHTIME->PlaceHolder = RemoveHtml($this->CASHTIME->caption());

            // CASHRECD
            $this->CASHRECD->EditAttrs["class"] = "form-control";
            $this->CASHRECD->EditCustomAttributes = "";
            $this->CASHRECD->EditValue = HtmlEncode($this->CASHRECD->CurrentValue);
            $this->CASHRECD->PlaceHolder = RemoveHtml($this->CASHRECD->caption());
            if (strval($this->CASHRECD->EditValue) != "" && is_numeric($this->CASHRECD->EditValue)) {
                $this->CASHRECD->EditValue = FormatNumber($this->CASHRECD->EditValue, -2, -2, -2, -2);
            }

            // CASHREFNO
            $this->CASHREFNO->EditAttrs["class"] = "form-control";
            $this->CASHREFNO->EditCustomAttributes = "";
            if (!$this->CASHREFNO->Raw) {
                $this->CASHREFNO->CurrentValue = HtmlDecode($this->CASHREFNO->CurrentValue);
            }
            $this->CASHREFNO->EditValue = HtmlEncode($this->CASHREFNO->CurrentValue);
            $this->CASHREFNO->PlaceHolder = RemoveHtml($this->CASHREFNO->caption());

            // CASHIERSHIFT
            $this->CASHIERSHIFT->EditAttrs["class"] = "form-control";
            $this->CASHIERSHIFT->EditCustomAttributes = "";
            if (!$this->CASHIERSHIFT->Raw) {
                $this->CASHIERSHIFT->CurrentValue = HtmlDecode($this->CASHIERSHIFT->CurrentValue);
            }
            $this->CASHIERSHIFT->EditValue = HtmlEncode($this->CASHIERSHIFT->CurrentValue);
            $this->CASHIERSHIFT->PlaceHolder = RemoveHtml($this->CASHIERSHIFT->caption());

            // PRCODE
            $this->PRCODE->EditAttrs["class"] = "form-control";
            $this->PRCODE->EditCustomAttributes = "";
            if (!$this->PRCODE->Raw) {
                $this->PRCODE->CurrentValue = HtmlDecode($this->PRCODE->CurrentValue);
            }
            $this->PRCODE->EditValue = HtmlEncode($this->PRCODE->CurrentValue);
            $this->PRCODE->PlaceHolder = RemoveHtml($this->PRCODE->caption());

            // RELEASEBY
            $this->RELEASEBY->EditAttrs["class"] = "form-control";
            $this->RELEASEBY->EditCustomAttributes = "";
            if (!$this->RELEASEBY->Raw) {
                $this->RELEASEBY->CurrentValue = HtmlDecode($this->RELEASEBY->CurrentValue);
            }
            $this->RELEASEBY->EditValue = HtmlEncode($this->RELEASEBY->CurrentValue);
            $this->RELEASEBY->PlaceHolder = RemoveHtml($this->RELEASEBY->caption());

            // CRAUTHOR
            $this->CRAUTHOR->EditAttrs["class"] = "form-control";
            $this->CRAUTHOR->EditCustomAttributes = "";
            if (!$this->CRAUTHOR->Raw) {
                $this->CRAUTHOR->CurrentValue = HtmlDecode($this->CRAUTHOR->CurrentValue);
            }
            $this->CRAUTHOR->EditValue = HtmlEncode($this->CRAUTHOR->CurrentValue);
            $this->CRAUTHOR->PlaceHolder = RemoveHtml($this->CRAUTHOR->caption());

            // PAYMENT
            $this->PAYMENT->EditAttrs["class"] = "form-control";
            $this->PAYMENT->EditCustomAttributes = "";
            if (!$this->PAYMENT->Raw) {
                $this->PAYMENT->CurrentValue = HtmlDecode($this->PAYMENT->CurrentValue);
            }
            $this->PAYMENT->EditValue = HtmlEncode($this->PAYMENT->CurrentValue);
            $this->PAYMENT->PlaceHolder = RemoveHtml($this->PAYMENT->caption());

            // DRID
            $this->DRID->EditAttrs["class"] = "form-control";
            $this->DRID->EditCustomAttributes = "";
            if (!$this->DRID->Raw) {
                $this->DRID->CurrentValue = HtmlDecode($this->DRID->CurrentValue);
            }
            $this->DRID->EditValue = HtmlEncode($this->DRID->CurrentValue);
            $this->DRID->PlaceHolder = RemoveHtml($this->DRID->caption());

            // WARD
            $this->WARD->EditAttrs["class"] = "form-control";
            $this->WARD->EditCustomAttributes = "";
            if (!$this->WARD->Raw) {
                $this->WARD->CurrentValue = HtmlDecode($this->WARD->CurrentValue);
            }
            $this->WARD->EditValue = HtmlEncode($this->WARD->CurrentValue);
            $this->WARD->PlaceHolder = RemoveHtml($this->WARD->caption());

            // STAXTYPE
            $this->STAXTYPE->EditAttrs["class"] = "form-control";
            $this->STAXTYPE->EditCustomAttributes = "";
            if (!$this->STAXTYPE->Raw) {
                $this->STAXTYPE->CurrentValue = HtmlDecode($this->STAXTYPE->CurrentValue);
            }
            $this->STAXTYPE->EditValue = HtmlEncode($this->STAXTYPE->CurrentValue);
            $this->STAXTYPE->PlaceHolder = RemoveHtml($this->STAXTYPE->caption());

            // PURDISCVAL
            $this->PURDISCVAL->EditAttrs["class"] = "form-control";
            $this->PURDISCVAL->EditCustomAttributes = "";
            $this->PURDISCVAL->EditValue = HtmlEncode($this->PURDISCVAL->CurrentValue);
            $this->PURDISCVAL->PlaceHolder = RemoveHtml($this->PURDISCVAL->caption());
            if (strval($this->PURDISCVAL->EditValue) != "" && is_numeric($this->PURDISCVAL->EditValue)) {
                $this->PURDISCVAL->EditValue = FormatNumber($this->PURDISCVAL->EditValue, -2, -2, -2, -2);
            }

            // RNDOFF
            $this->RNDOFF->EditAttrs["class"] = "form-control";
            $this->RNDOFF->EditCustomAttributes = "";
            $this->RNDOFF->EditValue = HtmlEncode($this->RNDOFF->CurrentValue);
            $this->RNDOFF->PlaceHolder = RemoveHtml($this->RNDOFF->caption());
            if (strval($this->RNDOFF->EditValue) != "" && is_numeric($this->RNDOFF->EditValue)) {
                $this->RNDOFF->EditValue = FormatNumber($this->RNDOFF->EditValue, -2, -2, -2, -2);
            }

            // DISCONMRP
            $this->DISCONMRP->EditAttrs["class"] = "form-control";
            $this->DISCONMRP->EditCustomAttributes = "";
            $this->DISCONMRP->EditValue = HtmlEncode($this->DISCONMRP->CurrentValue);
            $this->DISCONMRP->PlaceHolder = RemoveHtml($this->DISCONMRP->caption());
            if (strval($this->DISCONMRP->EditValue) != "" && is_numeric($this->DISCONMRP->EditValue)) {
                $this->DISCONMRP->EditValue = FormatNumber($this->DISCONMRP->EditValue, -2, -2, -2, -2);
            }

            // DELVDT
            $this->DELVDT->EditAttrs["class"] = "form-control";
            $this->DELVDT->EditCustomAttributes = "";
            $this->DELVDT->EditValue = HtmlEncode(FormatDateTime($this->DELVDT->CurrentValue, 8));
            $this->DELVDT->PlaceHolder = RemoveHtml($this->DELVDT->caption());

            // DELVTIME
            $this->DELVTIME->EditAttrs["class"] = "form-control";
            $this->DELVTIME->EditCustomAttributes = "";
            if (!$this->DELVTIME->Raw) {
                $this->DELVTIME->CurrentValue = HtmlDecode($this->DELVTIME->CurrentValue);
            }
            $this->DELVTIME->EditValue = HtmlEncode($this->DELVTIME->CurrentValue);
            $this->DELVTIME->PlaceHolder = RemoveHtml($this->DELVTIME->caption());

            // DELVBY
            $this->DELVBY->EditAttrs["class"] = "form-control";
            $this->DELVBY->EditCustomAttributes = "";
            if (!$this->DELVBY->Raw) {
                $this->DELVBY->CurrentValue = HtmlDecode($this->DELVBY->CurrentValue);
            }
            $this->DELVBY->EditValue = HtmlEncode($this->DELVBY->CurrentValue);
            $this->DELVBY->PlaceHolder = RemoveHtml($this->DELVBY->caption());

            // HOSPNO
            $this->HOSPNO->EditAttrs["class"] = "form-control";
            $this->HOSPNO->EditCustomAttributes = "";
            if (!$this->HOSPNO->Raw) {
                $this->HOSPNO->CurrentValue = HtmlDecode($this->HOSPNO->CurrentValue);
            }
            $this->HOSPNO->EditValue = HtmlEncode($this->HOSPNO->CurrentValue);
            $this->HOSPNO->PlaceHolder = RemoveHtml($this->HOSPNO->caption());

            // pbv
            $this->pbv->EditAttrs["class"] = "form-control";
            $this->pbv->EditCustomAttributes = "";
            $this->pbv->EditValue = HtmlEncode($this->pbv->CurrentValue);
            $this->pbv->PlaceHolder = RemoveHtml($this->pbv->caption());

            // pbt
            $this->pbt->EditAttrs["class"] = "form-control";
            $this->pbt->EditCustomAttributes = "";
            $this->pbt->EditValue = HtmlEncode($this->pbt->CurrentValue);
            $this->pbt->PlaceHolder = RemoveHtml($this->pbt->caption());

            // SiNo
            $this->SiNo->EditAttrs["class"] = "form-control";
            $this->SiNo->EditCustomAttributes = "";
            $this->SiNo->EditValue = HtmlEncode($this->SiNo->CurrentValue);
            $this->SiNo->PlaceHolder = RemoveHtml($this->SiNo->caption());

            // Product
            $this->Product->EditAttrs["class"] = "form-control";
            $this->Product->EditCustomAttributes = "";
            if (!$this->Product->Raw) {
                $this->Product->CurrentValue = HtmlDecode($this->Product->CurrentValue);
            }
            $this->Product->EditValue = HtmlEncode($this->Product->CurrentValue);
            $this->Product->PlaceHolder = RemoveHtml($this->Product->caption());

            // Mfg
            $this->Mfg->EditAttrs["class"] = "form-control";
            $this->Mfg->EditCustomAttributes = "";
            if (!$this->Mfg->Raw) {
                $this->Mfg->CurrentValue = HtmlDecode($this->Mfg->CurrentValue);
            }
            $this->Mfg->EditValue = HtmlEncode($this->Mfg->CurrentValue);
            $this->Mfg->PlaceHolder = RemoveHtml($this->Mfg->caption());

            // HosoID
            $this->HosoID->EditAttrs["class"] = "form-control";
            $this->HosoID->EditCustomAttributes = "";
            $this->HosoID->EditValue = HtmlEncode($this->HosoID->CurrentValue);
            $this->HosoID->PlaceHolder = RemoveHtml($this->HosoID->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->CurrentValue = HtmlDecode($this->createdby->CurrentValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->CurrentValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime($this->createddatetime->CurrentValue, 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->CurrentValue = HtmlDecode($this->modifiedby->CurrentValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // MFRCODE
            $this->MFRCODE->EditAttrs["class"] = "form-control";
            $this->MFRCODE->EditCustomAttributes = "";
            if (!$this->MFRCODE->Raw) {
                $this->MFRCODE->CurrentValue = HtmlDecode($this->MFRCODE->CurrentValue);
            }
            $this->MFRCODE->EditValue = HtmlEncode($this->MFRCODE->CurrentValue);
            $this->MFRCODE->PlaceHolder = RemoveHtml($this->MFRCODE->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // BRNAME
            $this->BRNAME->EditAttrs["class"] = "form-control";
            $this->BRNAME->EditCustomAttributes = "";
            if (!$this->BRNAME->Raw) {
                $this->BRNAME->CurrentValue = HtmlDecode($this->BRNAME->CurrentValue);
            }
            $this->BRNAME->EditValue = HtmlEncode($this->BRNAME->CurrentValue);
            $this->BRNAME->PlaceHolder = RemoveHtml($this->BRNAME->caption());

            // Add refer script

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";

            // TYPE
            $this->TYPE->LinkCustomAttributes = "";
            $this->TYPE->HrefValue = "";

            // DN
            $this->DN->LinkCustomAttributes = "";
            $this->DN->HrefValue = "";

            // RDN
            $this->RDN->LinkCustomAttributes = "";
            $this->RDN->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // PRC
            $this->PRC->LinkCustomAttributes = "";
            $this->PRC->HrefValue = "";

            // OQ
            $this->OQ->LinkCustomAttributes = "";
            $this->OQ->HrefValue = "";

            // RQ
            $this->RQ->LinkCustomAttributes = "";
            $this->RQ->HrefValue = "";

            // MRQ
            $this->MRQ->LinkCustomAttributes = "";
            $this->MRQ->HrefValue = "";

            // IQ
            $this->IQ->LinkCustomAttributes = "";
            $this->IQ->HrefValue = "";

            // BATCHNO
            $this->BATCHNO->LinkCustomAttributes = "";
            $this->BATCHNO->HrefValue = "";

            // EXPDT
            $this->EXPDT->LinkCustomAttributes = "";
            $this->EXPDT->HrefValue = "";

            // BILLNO
            $this->BILLNO->LinkCustomAttributes = "";
            $this->BILLNO->HrefValue = "";

            // BILLDT
            $this->BILLDT->LinkCustomAttributes = "";
            $this->BILLDT->HrefValue = "";

            // RT
            $this->RT->LinkCustomAttributes = "";
            $this->RT->HrefValue = "";

            // VALUE
            $this->VALUE->LinkCustomAttributes = "";
            $this->VALUE->HrefValue = "";

            // DISC
            $this->DISC->LinkCustomAttributes = "";
            $this->DISC->HrefValue = "";

            // TAXP
            $this->TAXP->LinkCustomAttributes = "";
            $this->TAXP->HrefValue = "";

            // TAX
            $this->TAX->LinkCustomAttributes = "";
            $this->TAX->HrefValue = "";

            // TAXR
            $this->TAXR->LinkCustomAttributes = "";
            $this->TAXR->HrefValue = "";

            // DAMT
            $this->DAMT->LinkCustomAttributes = "";
            $this->DAMT->HrefValue = "";

            // EMPNO
            $this->EMPNO->LinkCustomAttributes = "";
            $this->EMPNO->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // DRNAME
            $this->DRNAME->LinkCustomAttributes = "";
            $this->DRNAME->HrefValue = "";

            // BTIME
            $this->BTIME->LinkCustomAttributes = "";
            $this->BTIME->HrefValue = "";

            // ONO
            $this->ONO->LinkCustomAttributes = "";
            $this->ONO->HrefValue = "";

            // ODT
            $this->ODT->LinkCustomAttributes = "";
            $this->ODT->HrefValue = "";

            // PURRT
            $this->PURRT->LinkCustomAttributes = "";
            $this->PURRT->HrefValue = "";

            // GRP
            $this->GRP->LinkCustomAttributes = "";
            $this->GRP->HrefValue = "";

            // IBATCH
            $this->IBATCH->LinkCustomAttributes = "";
            $this->IBATCH->HrefValue = "";

            // IPNO
            $this->IPNO->LinkCustomAttributes = "";
            $this->IPNO->HrefValue = "";

            // OPNO
            $this->OPNO->LinkCustomAttributes = "";
            $this->OPNO->HrefValue = "";

            // RECID
            $this->RECID->LinkCustomAttributes = "";
            $this->RECID->HrefValue = "";

            // FQTY
            $this->FQTY->LinkCustomAttributes = "";
            $this->FQTY->HrefValue = "";

            // UR
            $this->UR->LinkCustomAttributes = "";
            $this->UR->HrefValue = "";

            // DCID
            $this->DCID->LinkCustomAttributes = "";
            $this->DCID->HrefValue = "";

            // USERID
            $this->_USERID->LinkCustomAttributes = "";
            $this->_USERID->HrefValue = "";

            // MODDT
            $this->MODDT->LinkCustomAttributes = "";
            $this->MODDT->HrefValue = "";

            // FYM
            $this->FYM->LinkCustomAttributes = "";
            $this->FYM->HrefValue = "";

            // PRCBATCH
            $this->PRCBATCH->LinkCustomAttributes = "";
            $this->PRCBATCH->HrefValue = "";

            // SLNO
            $this->SLNO->LinkCustomAttributes = "";
            $this->SLNO->HrefValue = "";

            // MRP
            $this->MRP->LinkCustomAttributes = "";
            $this->MRP->HrefValue = "";

            // BILLYM
            $this->BILLYM->LinkCustomAttributes = "";
            $this->BILLYM->HrefValue = "";

            // BILLGRP
            $this->BILLGRP->LinkCustomAttributes = "";
            $this->BILLGRP->HrefValue = "";

            // STAFF
            $this->STAFF->LinkCustomAttributes = "";
            $this->STAFF->HrefValue = "";

            // TEMPIPNO
            $this->TEMPIPNO->LinkCustomAttributes = "";
            $this->TEMPIPNO->HrefValue = "";

            // PRNTED
            $this->PRNTED->LinkCustomAttributes = "";
            $this->PRNTED->HrefValue = "";

            // PATNAME
            $this->PATNAME->LinkCustomAttributes = "";
            $this->PATNAME->HrefValue = "";

            // PJVNO
            $this->PJVNO->LinkCustomAttributes = "";
            $this->PJVNO->HrefValue = "";

            // PJVSLNO
            $this->PJVSLNO->LinkCustomAttributes = "";
            $this->PJVSLNO->HrefValue = "";

            // OTHDISC
            $this->OTHDISC->LinkCustomAttributes = "";
            $this->OTHDISC->HrefValue = "";

            // PJVYM
            $this->PJVYM->LinkCustomAttributes = "";
            $this->PJVYM->HrefValue = "";

            // PURDISCPER
            $this->PURDISCPER->LinkCustomAttributes = "";
            $this->PURDISCPER->HrefValue = "";

            // CASHIER
            $this->CASHIER->LinkCustomAttributes = "";
            $this->CASHIER->HrefValue = "";

            // CASHTIME
            $this->CASHTIME->LinkCustomAttributes = "";
            $this->CASHTIME->HrefValue = "";

            // CASHRECD
            $this->CASHRECD->LinkCustomAttributes = "";
            $this->CASHRECD->HrefValue = "";

            // CASHREFNO
            $this->CASHREFNO->LinkCustomAttributes = "";
            $this->CASHREFNO->HrefValue = "";

            // CASHIERSHIFT
            $this->CASHIERSHIFT->LinkCustomAttributes = "";
            $this->CASHIERSHIFT->HrefValue = "";

            // PRCODE
            $this->PRCODE->LinkCustomAttributes = "";
            $this->PRCODE->HrefValue = "";

            // RELEASEBY
            $this->RELEASEBY->LinkCustomAttributes = "";
            $this->RELEASEBY->HrefValue = "";

            // CRAUTHOR
            $this->CRAUTHOR->LinkCustomAttributes = "";
            $this->CRAUTHOR->HrefValue = "";

            // PAYMENT
            $this->PAYMENT->LinkCustomAttributes = "";
            $this->PAYMENT->HrefValue = "";

            // DRID
            $this->DRID->LinkCustomAttributes = "";
            $this->DRID->HrefValue = "";

            // WARD
            $this->WARD->LinkCustomAttributes = "";
            $this->WARD->HrefValue = "";

            // STAXTYPE
            $this->STAXTYPE->LinkCustomAttributes = "";
            $this->STAXTYPE->HrefValue = "";

            // PURDISCVAL
            $this->PURDISCVAL->LinkCustomAttributes = "";
            $this->PURDISCVAL->HrefValue = "";

            // RNDOFF
            $this->RNDOFF->LinkCustomAttributes = "";
            $this->RNDOFF->HrefValue = "";

            // DISCONMRP
            $this->DISCONMRP->LinkCustomAttributes = "";
            $this->DISCONMRP->HrefValue = "";

            // DELVDT
            $this->DELVDT->LinkCustomAttributes = "";
            $this->DELVDT->HrefValue = "";

            // DELVTIME
            $this->DELVTIME->LinkCustomAttributes = "";
            $this->DELVTIME->HrefValue = "";

            // DELVBY
            $this->DELVBY->LinkCustomAttributes = "";
            $this->DELVBY->HrefValue = "";

            // HOSPNO
            $this->HOSPNO->LinkCustomAttributes = "";
            $this->HOSPNO->HrefValue = "";

            // pbv
            $this->pbv->LinkCustomAttributes = "";
            $this->pbv->HrefValue = "";

            // pbt
            $this->pbt->LinkCustomAttributes = "";
            $this->pbt->HrefValue = "";

            // SiNo
            $this->SiNo->LinkCustomAttributes = "";
            $this->SiNo->HrefValue = "";

            // Product
            $this->Product->LinkCustomAttributes = "";
            $this->Product->HrefValue = "";

            // Mfg
            $this->Mfg->LinkCustomAttributes = "";
            $this->Mfg->HrefValue = "";

            // HosoID
            $this->HosoID->LinkCustomAttributes = "";
            $this->HosoID->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";

            // MFRCODE
            $this->MFRCODE->LinkCustomAttributes = "";
            $this->MFRCODE->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // BRNAME
            $this->BRNAME->LinkCustomAttributes = "";
            $this->BRNAME->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm()
    {
        global $Language;

        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
        }
        if ($this->TYPE->Required) {
            if (!$this->TYPE->IsDetailKey && EmptyValue($this->TYPE->FormValue)) {
                $this->TYPE->addErrorMessage(str_replace("%s", $this->TYPE->caption(), $this->TYPE->RequiredErrorMessage));
            }
        }
        if ($this->DN->Required) {
            if (!$this->DN->IsDetailKey && EmptyValue($this->DN->FormValue)) {
                $this->DN->addErrorMessage(str_replace("%s", $this->DN->caption(), $this->DN->RequiredErrorMessage));
            }
        }
        if ($this->RDN->Required) {
            if (!$this->RDN->IsDetailKey && EmptyValue($this->RDN->FormValue)) {
                $this->RDN->addErrorMessage(str_replace("%s", $this->RDN->caption(), $this->RDN->RequiredErrorMessage));
            }
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->PRC->Required) {
            if (!$this->PRC->IsDetailKey && EmptyValue($this->PRC->FormValue)) {
                $this->PRC->addErrorMessage(str_replace("%s", $this->PRC->caption(), $this->PRC->RequiredErrorMessage));
            }
        }
        if ($this->OQ->Required) {
            if (!$this->OQ->IsDetailKey && EmptyValue($this->OQ->FormValue)) {
                $this->OQ->addErrorMessage(str_replace("%s", $this->OQ->caption(), $this->OQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OQ->FormValue)) {
            $this->OQ->addErrorMessage($this->OQ->getErrorMessage(false));
        }
        if ($this->RQ->Required) {
            if (!$this->RQ->IsDetailKey && EmptyValue($this->RQ->FormValue)) {
                $this->RQ->addErrorMessage(str_replace("%s", $this->RQ->caption(), $this->RQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RQ->FormValue)) {
            $this->RQ->addErrorMessage($this->RQ->getErrorMessage(false));
        }
        if ($this->MRQ->Required) {
            if (!$this->MRQ->IsDetailKey && EmptyValue($this->MRQ->FormValue)) {
                $this->MRQ->addErrorMessage(str_replace("%s", $this->MRQ->caption(), $this->MRQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRQ->FormValue)) {
            $this->MRQ->addErrorMessage($this->MRQ->getErrorMessage(false));
        }
        if ($this->IQ->Required) {
            if (!$this->IQ->IsDetailKey && EmptyValue($this->IQ->FormValue)) {
                $this->IQ->addErrorMessage(str_replace("%s", $this->IQ->caption(), $this->IQ->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->IQ->FormValue)) {
            $this->IQ->addErrorMessage($this->IQ->getErrorMessage(false));
        }
        if ($this->BATCHNO->Required) {
            if (!$this->BATCHNO->IsDetailKey && EmptyValue($this->BATCHNO->FormValue)) {
                $this->BATCHNO->addErrorMessage(str_replace("%s", $this->BATCHNO->caption(), $this->BATCHNO->RequiredErrorMessage));
            }
        }
        if ($this->EXPDT->Required) {
            if (!$this->EXPDT->IsDetailKey && EmptyValue($this->EXPDT->FormValue)) {
                $this->EXPDT->addErrorMessage(str_replace("%s", $this->EXPDT->caption(), $this->EXPDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EXPDT->FormValue)) {
            $this->EXPDT->addErrorMessage($this->EXPDT->getErrorMessage(false));
        }
        if ($this->BILLNO->Required) {
            if (!$this->BILLNO->IsDetailKey && EmptyValue($this->BILLNO->FormValue)) {
                $this->BILLNO->addErrorMessage(str_replace("%s", $this->BILLNO->caption(), $this->BILLNO->RequiredErrorMessage));
            }
        }
        if ($this->BILLDT->Required) {
            if (!$this->BILLDT->IsDetailKey && EmptyValue($this->BILLDT->FormValue)) {
                $this->BILLDT->addErrorMessage(str_replace("%s", $this->BILLDT->caption(), $this->BILLDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BILLDT->FormValue)) {
            $this->BILLDT->addErrorMessage($this->BILLDT->getErrorMessage(false));
        }
        if ($this->RT->Required) {
            if (!$this->RT->IsDetailKey && EmptyValue($this->RT->FormValue)) {
                $this->RT->addErrorMessage(str_replace("%s", $this->RT->caption(), $this->RT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RT->FormValue)) {
            $this->RT->addErrorMessage($this->RT->getErrorMessage(false));
        }
        if ($this->VALUE->Required) {
            if (!$this->VALUE->IsDetailKey && EmptyValue($this->VALUE->FormValue)) {
                $this->VALUE->addErrorMessage(str_replace("%s", $this->VALUE->caption(), $this->VALUE->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->VALUE->FormValue)) {
            $this->VALUE->addErrorMessage($this->VALUE->getErrorMessage(false));
        }
        if ($this->DISC->Required) {
            if (!$this->DISC->IsDetailKey && EmptyValue($this->DISC->FormValue)) {
                $this->DISC->addErrorMessage(str_replace("%s", $this->DISC->caption(), $this->DISC->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DISC->FormValue)) {
            $this->DISC->addErrorMessage($this->DISC->getErrorMessage(false));
        }
        if ($this->TAXP->Required) {
            if (!$this->TAXP->IsDetailKey && EmptyValue($this->TAXP->FormValue)) {
                $this->TAXP->addErrorMessage(str_replace("%s", $this->TAXP->caption(), $this->TAXP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TAXP->FormValue)) {
            $this->TAXP->addErrorMessage($this->TAXP->getErrorMessage(false));
        }
        if ($this->TAX->Required) {
            if (!$this->TAX->IsDetailKey && EmptyValue($this->TAX->FormValue)) {
                $this->TAX->addErrorMessage(str_replace("%s", $this->TAX->caption(), $this->TAX->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TAX->FormValue)) {
            $this->TAX->addErrorMessage($this->TAX->getErrorMessage(false));
        }
        if ($this->TAXR->Required) {
            if (!$this->TAXR->IsDetailKey && EmptyValue($this->TAXR->FormValue)) {
                $this->TAXR->addErrorMessage(str_replace("%s", $this->TAXR->caption(), $this->TAXR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TAXR->FormValue)) {
            $this->TAXR->addErrorMessage($this->TAXR->getErrorMessage(false));
        }
        if ($this->DAMT->Required) {
            if (!$this->DAMT->IsDetailKey && EmptyValue($this->DAMT->FormValue)) {
                $this->DAMT->addErrorMessage(str_replace("%s", $this->DAMT->caption(), $this->DAMT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DAMT->FormValue)) {
            $this->DAMT->addErrorMessage($this->DAMT->getErrorMessage(false));
        }
        if ($this->EMPNO->Required) {
            if (!$this->EMPNO->IsDetailKey && EmptyValue($this->EMPNO->FormValue)) {
                $this->EMPNO->addErrorMessage(str_replace("%s", $this->EMPNO->caption(), $this->EMPNO->RequiredErrorMessage));
            }
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->DRNAME->Required) {
            if (!$this->DRNAME->IsDetailKey && EmptyValue($this->DRNAME->FormValue)) {
                $this->DRNAME->addErrorMessage(str_replace("%s", $this->DRNAME->caption(), $this->DRNAME->RequiredErrorMessage));
            }
        }
        if ($this->BTIME->Required) {
            if (!$this->BTIME->IsDetailKey && EmptyValue($this->BTIME->FormValue)) {
                $this->BTIME->addErrorMessage(str_replace("%s", $this->BTIME->caption(), $this->BTIME->RequiredErrorMessage));
            }
        }
        if ($this->ONO->Required) {
            if (!$this->ONO->IsDetailKey && EmptyValue($this->ONO->FormValue)) {
                $this->ONO->addErrorMessage(str_replace("%s", $this->ONO->caption(), $this->ONO->RequiredErrorMessage));
            }
        }
        if ($this->ODT->Required) {
            if (!$this->ODT->IsDetailKey && EmptyValue($this->ODT->FormValue)) {
                $this->ODT->addErrorMessage(str_replace("%s", $this->ODT->caption(), $this->ODT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ODT->FormValue)) {
            $this->ODT->addErrorMessage($this->ODT->getErrorMessage(false));
        }
        if ($this->PURRT->Required) {
            if (!$this->PURRT->IsDetailKey && EmptyValue($this->PURRT->FormValue)) {
                $this->PURRT->addErrorMessage(str_replace("%s", $this->PURRT->caption(), $this->PURRT->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PURRT->FormValue)) {
            $this->PURRT->addErrorMessage($this->PURRT->getErrorMessage(false));
        }
        if ($this->GRP->Required) {
            if (!$this->GRP->IsDetailKey && EmptyValue($this->GRP->FormValue)) {
                $this->GRP->addErrorMessage(str_replace("%s", $this->GRP->caption(), $this->GRP->RequiredErrorMessage));
            }
        }
        if ($this->IBATCH->Required) {
            if (!$this->IBATCH->IsDetailKey && EmptyValue($this->IBATCH->FormValue)) {
                $this->IBATCH->addErrorMessage(str_replace("%s", $this->IBATCH->caption(), $this->IBATCH->RequiredErrorMessage));
            }
        }
        if ($this->IPNO->Required) {
            if (!$this->IPNO->IsDetailKey && EmptyValue($this->IPNO->FormValue)) {
                $this->IPNO->addErrorMessage(str_replace("%s", $this->IPNO->caption(), $this->IPNO->RequiredErrorMessage));
            }
        }
        if ($this->OPNO->Required) {
            if (!$this->OPNO->IsDetailKey && EmptyValue($this->OPNO->FormValue)) {
                $this->OPNO->addErrorMessage(str_replace("%s", $this->OPNO->caption(), $this->OPNO->RequiredErrorMessage));
            }
        }
        if ($this->RECID->Required) {
            if (!$this->RECID->IsDetailKey && EmptyValue($this->RECID->FormValue)) {
                $this->RECID->addErrorMessage(str_replace("%s", $this->RECID->caption(), $this->RECID->RequiredErrorMessage));
            }
        }
        if ($this->FQTY->Required) {
            if (!$this->FQTY->IsDetailKey && EmptyValue($this->FQTY->FormValue)) {
                $this->FQTY->addErrorMessage(str_replace("%s", $this->FQTY->caption(), $this->FQTY->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->FQTY->FormValue)) {
            $this->FQTY->addErrorMessage($this->FQTY->getErrorMessage(false));
        }
        if ($this->UR->Required) {
            if (!$this->UR->IsDetailKey && EmptyValue($this->UR->FormValue)) {
                $this->UR->addErrorMessage(str_replace("%s", $this->UR->caption(), $this->UR->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->UR->FormValue)) {
            $this->UR->addErrorMessage($this->UR->getErrorMessage(false));
        }
        if ($this->DCID->Required) {
            if (!$this->DCID->IsDetailKey && EmptyValue($this->DCID->FormValue)) {
                $this->DCID->addErrorMessage(str_replace("%s", $this->DCID->caption(), $this->DCID->RequiredErrorMessage));
            }
        }
        if ($this->_USERID->Required) {
            if (!$this->_USERID->IsDetailKey && EmptyValue($this->_USERID->FormValue)) {
                $this->_USERID->addErrorMessage(str_replace("%s", $this->_USERID->caption(), $this->_USERID->RequiredErrorMessage));
            }
        }
        if ($this->MODDT->Required) {
            if (!$this->MODDT->IsDetailKey && EmptyValue($this->MODDT->FormValue)) {
                $this->MODDT->addErrorMessage(str_replace("%s", $this->MODDT->caption(), $this->MODDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->MODDT->FormValue)) {
            $this->MODDT->addErrorMessage($this->MODDT->getErrorMessage(false));
        }
        if ($this->FYM->Required) {
            if (!$this->FYM->IsDetailKey && EmptyValue($this->FYM->FormValue)) {
                $this->FYM->addErrorMessage(str_replace("%s", $this->FYM->caption(), $this->FYM->RequiredErrorMessage));
            }
        }
        if ($this->PRCBATCH->Required) {
            if (!$this->PRCBATCH->IsDetailKey && EmptyValue($this->PRCBATCH->FormValue)) {
                $this->PRCBATCH->addErrorMessage(str_replace("%s", $this->PRCBATCH->caption(), $this->PRCBATCH->RequiredErrorMessage));
            }
        }
        if ($this->SLNO->Required) {
            if (!$this->SLNO->IsDetailKey && EmptyValue($this->SLNO->FormValue)) {
                $this->SLNO->addErrorMessage(str_replace("%s", $this->SLNO->caption(), $this->SLNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SLNO->FormValue)) {
            $this->SLNO->addErrorMessage($this->SLNO->getErrorMessage(false));
        }
        if ($this->MRP->Required) {
            if (!$this->MRP->IsDetailKey && EmptyValue($this->MRP->FormValue)) {
                $this->MRP->addErrorMessage(str_replace("%s", $this->MRP->caption(), $this->MRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->MRP->FormValue)) {
            $this->MRP->addErrorMessage($this->MRP->getErrorMessage(false));
        }
        if ($this->BILLYM->Required) {
            if (!$this->BILLYM->IsDetailKey && EmptyValue($this->BILLYM->FormValue)) {
                $this->BILLYM->addErrorMessage(str_replace("%s", $this->BILLYM->caption(), $this->BILLYM->RequiredErrorMessage));
            }
        }
        if ($this->BILLGRP->Required) {
            if (!$this->BILLGRP->IsDetailKey && EmptyValue($this->BILLGRP->FormValue)) {
                $this->BILLGRP->addErrorMessage(str_replace("%s", $this->BILLGRP->caption(), $this->BILLGRP->RequiredErrorMessage));
            }
        }
        if ($this->STAFF->Required) {
            if (!$this->STAFF->IsDetailKey && EmptyValue($this->STAFF->FormValue)) {
                $this->STAFF->addErrorMessage(str_replace("%s", $this->STAFF->caption(), $this->STAFF->RequiredErrorMessage));
            }
        }
        if ($this->TEMPIPNO->Required) {
            if (!$this->TEMPIPNO->IsDetailKey && EmptyValue($this->TEMPIPNO->FormValue)) {
                $this->TEMPIPNO->addErrorMessage(str_replace("%s", $this->TEMPIPNO->caption(), $this->TEMPIPNO->RequiredErrorMessage));
            }
        }
        if ($this->PRNTED->Required) {
            if (!$this->PRNTED->IsDetailKey && EmptyValue($this->PRNTED->FormValue)) {
                $this->PRNTED->addErrorMessage(str_replace("%s", $this->PRNTED->caption(), $this->PRNTED->RequiredErrorMessage));
            }
        }
        if ($this->PATNAME->Required) {
            if (!$this->PATNAME->IsDetailKey && EmptyValue($this->PATNAME->FormValue)) {
                $this->PATNAME->addErrorMessage(str_replace("%s", $this->PATNAME->caption(), $this->PATNAME->RequiredErrorMessage));
            }
        }
        if ($this->PJVNO->Required) {
            if (!$this->PJVNO->IsDetailKey && EmptyValue($this->PJVNO->FormValue)) {
                $this->PJVNO->addErrorMessage(str_replace("%s", $this->PJVNO->caption(), $this->PJVNO->RequiredErrorMessage));
            }
        }
        if ($this->PJVSLNO->Required) {
            if (!$this->PJVSLNO->IsDetailKey && EmptyValue($this->PJVSLNO->FormValue)) {
                $this->PJVSLNO->addErrorMessage(str_replace("%s", $this->PJVSLNO->caption(), $this->PJVSLNO->RequiredErrorMessage));
            }
        }
        if ($this->OTHDISC->Required) {
            if (!$this->OTHDISC->IsDetailKey && EmptyValue($this->OTHDISC->FormValue)) {
                $this->OTHDISC->addErrorMessage(str_replace("%s", $this->OTHDISC->caption(), $this->OTHDISC->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OTHDISC->FormValue)) {
            $this->OTHDISC->addErrorMessage($this->OTHDISC->getErrorMessage(false));
        }
        if ($this->PJVYM->Required) {
            if (!$this->PJVYM->IsDetailKey && EmptyValue($this->PJVYM->FormValue)) {
                $this->PJVYM->addErrorMessage(str_replace("%s", $this->PJVYM->caption(), $this->PJVYM->RequiredErrorMessage));
            }
        }
        if ($this->PURDISCPER->Required) {
            if (!$this->PURDISCPER->IsDetailKey && EmptyValue($this->PURDISCPER->FormValue)) {
                $this->PURDISCPER->addErrorMessage(str_replace("%s", $this->PURDISCPER->caption(), $this->PURDISCPER->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PURDISCPER->FormValue)) {
            $this->PURDISCPER->addErrorMessage($this->PURDISCPER->getErrorMessage(false));
        }
        if ($this->CASHIER->Required) {
            if (!$this->CASHIER->IsDetailKey && EmptyValue($this->CASHIER->FormValue)) {
                $this->CASHIER->addErrorMessage(str_replace("%s", $this->CASHIER->caption(), $this->CASHIER->RequiredErrorMessage));
            }
        }
        if ($this->CASHTIME->Required) {
            if (!$this->CASHTIME->IsDetailKey && EmptyValue($this->CASHTIME->FormValue)) {
                $this->CASHTIME->addErrorMessage(str_replace("%s", $this->CASHTIME->caption(), $this->CASHTIME->RequiredErrorMessage));
            }
        }
        if ($this->CASHRECD->Required) {
            if (!$this->CASHRECD->IsDetailKey && EmptyValue($this->CASHRECD->FormValue)) {
                $this->CASHRECD->addErrorMessage(str_replace("%s", $this->CASHRECD->caption(), $this->CASHRECD->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->CASHRECD->FormValue)) {
            $this->CASHRECD->addErrorMessage($this->CASHRECD->getErrorMessage(false));
        }
        if ($this->CASHREFNO->Required) {
            if (!$this->CASHREFNO->IsDetailKey && EmptyValue($this->CASHREFNO->FormValue)) {
                $this->CASHREFNO->addErrorMessage(str_replace("%s", $this->CASHREFNO->caption(), $this->CASHREFNO->RequiredErrorMessage));
            }
        }
        if ($this->CASHIERSHIFT->Required) {
            if (!$this->CASHIERSHIFT->IsDetailKey && EmptyValue($this->CASHIERSHIFT->FormValue)) {
                $this->CASHIERSHIFT->addErrorMessage(str_replace("%s", $this->CASHIERSHIFT->caption(), $this->CASHIERSHIFT->RequiredErrorMessage));
            }
        }
        if ($this->PRCODE->Required) {
            if (!$this->PRCODE->IsDetailKey && EmptyValue($this->PRCODE->FormValue)) {
                $this->PRCODE->addErrorMessage(str_replace("%s", $this->PRCODE->caption(), $this->PRCODE->RequiredErrorMessage));
            }
        }
        if ($this->RELEASEBY->Required) {
            if (!$this->RELEASEBY->IsDetailKey && EmptyValue($this->RELEASEBY->FormValue)) {
                $this->RELEASEBY->addErrorMessage(str_replace("%s", $this->RELEASEBY->caption(), $this->RELEASEBY->RequiredErrorMessage));
            }
        }
        if ($this->CRAUTHOR->Required) {
            if (!$this->CRAUTHOR->IsDetailKey && EmptyValue($this->CRAUTHOR->FormValue)) {
                $this->CRAUTHOR->addErrorMessage(str_replace("%s", $this->CRAUTHOR->caption(), $this->CRAUTHOR->RequiredErrorMessage));
            }
        }
        if ($this->PAYMENT->Required) {
            if (!$this->PAYMENT->IsDetailKey && EmptyValue($this->PAYMENT->FormValue)) {
                $this->PAYMENT->addErrorMessage(str_replace("%s", $this->PAYMENT->caption(), $this->PAYMENT->RequiredErrorMessage));
            }
        }
        if ($this->DRID->Required) {
            if (!$this->DRID->IsDetailKey && EmptyValue($this->DRID->FormValue)) {
                $this->DRID->addErrorMessage(str_replace("%s", $this->DRID->caption(), $this->DRID->RequiredErrorMessage));
            }
        }
        if ($this->WARD->Required) {
            if (!$this->WARD->IsDetailKey && EmptyValue($this->WARD->FormValue)) {
                $this->WARD->addErrorMessage(str_replace("%s", $this->WARD->caption(), $this->WARD->RequiredErrorMessage));
            }
        }
        if ($this->STAXTYPE->Required) {
            if (!$this->STAXTYPE->IsDetailKey && EmptyValue($this->STAXTYPE->FormValue)) {
                $this->STAXTYPE->addErrorMessage(str_replace("%s", $this->STAXTYPE->caption(), $this->STAXTYPE->RequiredErrorMessage));
            }
        }
        if ($this->PURDISCVAL->Required) {
            if (!$this->PURDISCVAL->IsDetailKey && EmptyValue($this->PURDISCVAL->FormValue)) {
                $this->PURDISCVAL->addErrorMessage(str_replace("%s", $this->PURDISCVAL->caption(), $this->PURDISCVAL->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PURDISCVAL->FormValue)) {
            $this->PURDISCVAL->addErrorMessage($this->PURDISCVAL->getErrorMessage(false));
        }
        if ($this->RNDOFF->Required) {
            if (!$this->RNDOFF->IsDetailKey && EmptyValue($this->RNDOFF->FormValue)) {
                $this->RNDOFF->addErrorMessage(str_replace("%s", $this->RNDOFF->caption(), $this->RNDOFF->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RNDOFF->FormValue)) {
            $this->RNDOFF->addErrorMessage($this->RNDOFF->getErrorMessage(false));
        }
        if ($this->DISCONMRP->Required) {
            if (!$this->DISCONMRP->IsDetailKey && EmptyValue($this->DISCONMRP->FormValue)) {
                $this->DISCONMRP->addErrorMessage(str_replace("%s", $this->DISCONMRP->caption(), $this->DISCONMRP->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->DISCONMRP->FormValue)) {
            $this->DISCONMRP->addErrorMessage($this->DISCONMRP->getErrorMessage(false));
        }
        if ($this->DELVDT->Required) {
            if (!$this->DELVDT->IsDetailKey && EmptyValue($this->DELVDT->FormValue)) {
                $this->DELVDT->addErrorMessage(str_replace("%s", $this->DELVDT->caption(), $this->DELVDT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DELVDT->FormValue)) {
            $this->DELVDT->addErrorMessage($this->DELVDT->getErrorMessage(false));
        }
        if ($this->DELVTIME->Required) {
            if (!$this->DELVTIME->IsDetailKey && EmptyValue($this->DELVTIME->FormValue)) {
                $this->DELVTIME->addErrorMessage(str_replace("%s", $this->DELVTIME->caption(), $this->DELVTIME->RequiredErrorMessage));
            }
        }
        if ($this->DELVBY->Required) {
            if (!$this->DELVBY->IsDetailKey && EmptyValue($this->DELVBY->FormValue)) {
                $this->DELVBY->addErrorMessage(str_replace("%s", $this->DELVBY->caption(), $this->DELVBY->RequiredErrorMessage));
            }
        }
        if ($this->HOSPNO->Required) {
            if (!$this->HOSPNO->IsDetailKey && EmptyValue($this->HOSPNO->FormValue)) {
                $this->HOSPNO->addErrorMessage(str_replace("%s", $this->HOSPNO->caption(), $this->HOSPNO->RequiredErrorMessage));
            }
        }
        if ($this->pbv->Required) {
            if (!$this->pbv->IsDetailKey && EmptyValue($this->pbv->FormValue)) {
                $this->pbv->addErrorMessage(str_replace("%s", $this->pbv->caption(), $this->pbv->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->pbv->FormValue)) {
            $this->pbv->addErrorMessage($this->pbv->getErrorMessage(false));
        }
        if ($this->pbt->Required) {
            if (!$this->pbt->IsDetailKey && EmptyValue($this->pbt->FormValue)) {
                $this->pbt->addErrorMessage(str_replace("%s", $this->pbt->caption(), $this->pbt->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->pbt->FormValue)) {
            $this->pbt->addErrorMessage($this->pbt->getErrorMessage(false));
        }
        if ($this->SiNo->Required) {
            if (!$this->SiNo->IsDetailKey && EmptyValue($this->SiNo->FormValue)) {
                $this->SiNo->addErrorMessage(str_replace("%s", $this->SiNo->caption(), $this->SiNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->SiNo->FormValue)) {
            $this->SiNo->addErrorMessage($this->SiNo->getErrorMessage(false));
        }
        if ($this->Product->Required) {
            if (!$this->Product->IsDetailKey && EmptyValue($this->Product->FormValue)) {
                $this->Product->addErrorMessage(str_replace("%s", $this->Product->caption(), $this->Product->RequiredErrorMessage));
            }
        }
        if ($this->Mfg->Required) {
            if (!$this->Mfg->IsDetailKey && EmptyValue($this->Mfg->FormValue)) {
                $this->Mfg->addErrorMessage(str_replace("%s", $this->Mfg->caption(), $this->Mfg->RequiredErrorMessage));
            }
        }
        if ($this->HosoID->Required) {
            if (!$this->HosoID->IsDetailKey && EmptyValue($this->HosoID->FormValue)) {
                $this->HosoID->addErrorMessage(str_replace("%s", $this->HosoID->caption(), $this->HosoID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HosoID->FormValue)) {
            $this->HosoID->addErrorMessage($this->HosoID->getErrorMessage(false));
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if ($this->createddatetime->Required) {
            if (!$this->createddatetime->IsDetailKey && EmptyValue($this->createddatetime->FormValue)) {
                $this->createddatetime->addErrorMessage(str_replace("%s", $this->createddatetime->caption(), $this->createddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createddatetime->FormValue)) {
            $this->createddatetime->addErrorMessage($this->createddatetime->getErrorMessage(false));
        }
        if ($this->modifiedby->Required) {
            if (!$this->modifiedby->IsDetailKey && EmptyValue($this->modifiedby->FormValue)) {
                $this->modifiedby->addErrorMessage(str_replace("%s", $this->modifiedby->caption(), $this->modifiedby->RequiredErrorMessage));
            }
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->MFRCODE->Required) {
            if (!$this->MFRCODE->IsDetailKey && EmptyValue($this->MFRCODE->FormValue)) {
                $this->MFRCODE->addErrorMessage(str_replace("%s", $this->MFRCODE->caption(), $this->MFRCODE->RequiredErrorMessage));
            }
        }
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Reception->FormValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatID->FormValue)) {
            $this->PatID->addErrorMessage($this->PatID->getErrorMessage(false));
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
            }
        }
        if ($this->BRNAME->Required) {
            if (!$this->BRNAME->IsDetailKey && EmptyValue($this->BRNAME->FormValue)) {
                $this->BRNAME->addErrorMessage(str_replace("%s", $this->BRNAME->caption(), $this->BRNAME->RequiredErrorMessage));
            }
        }

        // Return validate result
        $validateForm = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

        // TYPE
        $this->TYPE->setDbValueDef($rsnew, $this->TYPE->CurrentValue, null, false);

        // DN
        $this->DN->setDbValueDef($rsnew, $this->DN->CurrentValue, null, false);

        // RDN
        $this->RDN->setDbValueDef($rsnew, $this->RDN->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, false);

        // PRC
        $this->PRC->setDbValueDef($rsnew, $this->PRC->CurrentValue, null, false);

        // OQ
        $this->OQ->setDbValueDef($rsnew, $this->OQ->CurrentValue, null, false);

        // RQ
        $this->RQ->setDbValueDef($rsnew, $this->RQ->CurrentValue, null, false);

        // MRQ
        $this->MRQ->setDbValueDef($rsnew, $this->MRQ->CurrentValue, null, false);

        // IQ
        $this->IQ->setDbValueDef($rsnew, $this->IQ->CurrentValue, null, false);

        // BATCHNO
        $this->BATCHNO->setDbValueDef($rsnew, $this->BATCHNO->CurrentValue, null, false);

        // EXPDT
        $this->EXPDT->setDbValueDef($rsnew, UnFormatDateTime($this->EXPDT->CurrentValue, 0), null, false);

        // BILLNO
        $this->BILLNO->setDbValueDef($rsnew, $this->BILLNO->CurrentValue, null, false);

        // BILLDT
        $this->BILLDT->setDbValueDef($rsnew, UnFormatDateTime($this->BILLDT->CurrentValue, 0), null, false);

        // RT
        $this->RT->setDbValueDef($rsnew, $this->RT->CurrentValue, null, false);

        // VALUE
        $this->VALUE->setDbValueDef($rsnew, $this->VALUE->CurrentValue, null, false);

        // DISC
        $this->DISC->setDbValueDef($rsnew, $this->DISC->CurrentValue, null, false);

        // TAXP
        $this->TAXP->setDbValueDef($rsnew, $this->TAXP->CurrentValue, null, false);

        // TAX
        $this->TAX->setDbValueDef($rsnew, $this->TAX->CurrentValue, null, false);

        // TAXR
        $this->TAXR->setDbValueDef($rsnew, $this->TAXR->CurrentValue, null, false);

        // DAMT
        $this->DAMT->setDbValueDef($rsnew, $this->DAMT->CurrentValue, null, false);

        // EMPNO
        $this->EMPNO->setDbValueDef($rsnew, $this->EMPNO->CurrentValue, null, false);

        // PC
        $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, false);

        // DRNAME
        $this->DRNAME->setDbValueDef($rsnew, $this->DRNAME->CurrentValue, null, false);

        // BTIME
        $this->BTIME->setDbValueDef($rsnew, $this->BTIME->CurrentValue, null, false);

        // ONO
        $this->ONO->setDbValueDef($rsnew, $this->ONO->CurrentValue, null, false);

        // ODT
        $this->ODT->setDbValueDef($rsnew, UnFormatDateTime($this->ODT->CurrentValue, 0), null, false);

        // PURRT
        $this->PURRT->setDbValueDef($rsnew, $this->PURRT->CurrentValue, null, false);

        // GRP
        $this->GRP->setDbValueDef($rsnew, $this->GRP->CurrentValue, null, false);

        // IBATCH
        $this->IBATCH->setDbValueDef($rsnew, $this->IBATCH->CurrentValue, null, false);

        // IPNO
        $this->IPNO->setDbValueDef($rsnew, $this->IPNO->CurrentValue, null, false);

        // OPNO
        $this->OPNO->setDbValueDef($rsnew, $this->OPNO->CurrentValue, null, false);

        // RECID
        $this->RECID->setDbValueDef($rsnew, $this->RECID->CurrentValue, null, false);

        // FQTY
        $this->FQTY->setDbValueDef($rsnew, $this->FQTY->CurrentValue, null, false);

        // UR
        $this->UR->setDbValueDef($rsnew, $this->UR->CurrentValue, null, false);

        // DCID
        $this->DCID->setDbValueDef($rsnew, $this->DCID->CurrentValue, null, false);

        // USERID
        $this->_USERID->setDbValueDef($rsnew, $this->_USERID->CurrentValue, null, false);

        // MODDT
        $this->MODDT->setDbValueDef($rsnew, UnFormatDateTime($this->MODDT->CurrentValue, 0), null, false);

        // FYM
        $this->FYM->setDbValueDef($rsnew, $this->FYM->CurrentValue, null, false);

        // PRCBATCH
        $this->PRCBATCH->setDbValueDef($rsnew, $this->PRCBATCH->CurrentValue, null, false);

        // SLNO
        $this->SLNO->setDbValueDef($rsnew, $this->SLNO->CurrentValue, null, false);

        // MRP
        $this->MRP->setDbValueDef($rsnew, $this->MRP->CurrentValue, null, false);

        // BILLYM
        $this->BILLYM->setDbValueDef($rsnew, $this->BILLYM->CurrentValue, null, false);

        // BILLGRP
        $this->BILLGRP->setDbValueDef($rsnew, $this->BILLGRP->CurrentValue, null, false);

        // STAFF
        $this->STAFF->setDbValueDef($rsnew, $this->STAFF->CurrentValue, null, false);

        // TEMPIPNO
        $this->TEMPIPNO->setDbValueDef($rsnew, $this->TEMPIPNO->CurrentValue, null, false);

        // PRNTED
        $this->PRNTED->setDbValueDef($rsnew, $this->PRNTED->CurrentValue, null, false);

        // PATNAME
        $this->PATNAME->setDbValueDef($rsnew, $this->PATNAME->CurrentValue, null, false);

        // PJVNO
        $this->PJVNO->setDbValueDef($rsnew, $this->PJVNO->CurrentValue, null, false);

        // PJVSLNO
        $this->PJVSLNO->setDbValueDef($rsnew, $this->PJVSLNO->CurrentValue, null, false);

        // OTHDISC
        $this->OTHDISC->setDbValueDef($rsnew, $this->OTHDISC->CurrentValue, null, false);

        // PJVYM
        $this->PJVYM->setDbValueDef($rsnew, $this->PJVYM->CurrentValue, null, false);

        // PURDISCPER
        $this->PURDISCPER->setDbValueDef($rsnew, $this->PURDISCPER->CurrentValue, null, false);

        // CASHIER
        $this->CASHIER->setDbValueDef($rsnew, $this->CASHIER->CurrentValue, null, false);

        // CASHTIME
        $this->CASHTIME->setDbValueDef($rsnew, $this->CASHTIME->CurrentValue, null, false);

        // CASHRECD
        $this->CASHRECD->setDbValueDef($rsnew, $this->CASHRECD->CurrentValue, null, false);

        // CASHREFNO
        $this->CASHREFNO->setDbValueDef($rsnew, $this->CASHREFNO->CurrentValue, null, false);

        // CASHIERSHIFT
        $this->CASHIERSHIFT->setDbValueDef($rsnew, $this->CASHIERSHIFT->CurrentValue, null, false);

        // PRCODE
        $this->PRCODE->setDbValueDef($rsnew, $this->PRCODE->CurrentValue, null, false);

        // RELEASEBY
        $this->RELEASEBY->setDbValueDef($rsnew, $this->RELEASEBY->CurrentValue, null, false);

        // CRAUTHOR
        $this->CRAUTHOR->setDbValueDef($rsnew, $this->CRAUTHOR->CurrentValue, null, false);

        // PAYMENT
        $this->PAYMENT->setDbValueDef($rsnew, $this->PAYMENT->CurrentValue, null, false);

        // DRID
        $this->DRID->setDbValueDef($rsnew, $this->DRID->CurrentValue, null, false);

        // WARD
        $this->WARD->setDbValueDef($rsnew, $this->WARD->CurrentValue, null, false);

        // STAXTYPE
        $this->STAXTYPE->setDbValueDef($rsnew, $this->STAXTYPE->CurrentValue, null, false);

        // PURDISCVAL
        $this->PURDISCVAL->setDbValueDef($rsnew, $this->PURDISCVAL->CurrentValue, null, false);

        // RNDOFF
        $this->RNDOFF->setDbValueDef($rsnew, $this->RNDOFF->CurrentValue, null, false);

        // DISCONMRP
        $this->DISCONMRP->setDbValueDef($rsnew, $this->DISCONMRP->CurrentValue, null, false);

        // DELVDT
        $this->DELVDT->setDbValueDef($rsnew, UnFormatDateTime($this->DELVDT->CurrentValue, 0), null, false);

        // DELVTIME
        $this->DELVTIME->setDbValueDef($rsnew, $this->DELVTIME->CurrentValue, null, false);

        // DELVBY
        $this->DELVBY->setDbValueDef($rsnew, $this->DELVBY->CurrentValue, null, false);

        // HOSPNO
        $this->HOSPNO->setDbValueDef($rsnew, $this->HOSPNO->CurrentValue, null, false);

        // pbv
        $this->pbv->setDbValueDef($rsnew, $this->pbv->CurrentValue, null, false);

        // pbt
        $this->pbt->setDbValueDef($rsnew, $this->pbt->CurrentValue, null, false);

        // SiNo
        $this->SiNo->setDbValueDef($rsnew, $this->SiNo->CurrentValue, null, false);

        // Product
        $this->Product->setDbValueDef($rsnew, $this->Product->CurrentValue, null, false);

        // Mfg
        $this->Mfg->setDbValueDef($rsnew, $this->Mfg->CurrentValue, null, false);

        // HosoID
        $this->HosoID->setDbValueDef($rsnew, $this->HosoID->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // MFRCODE
        $this->MFRCODE->setDbValueDef($rsnew, $this->MFRCODE->CurrentValue, null, false);

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, false);

        // PatID
        $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // BRNAME
        $this->BRNAME->setDbValueDef($rsnew, $this->BRNAME->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        if ($insertRow) {
            $addRow = $this->insert($rsnew);
            if ($addRow) {
            }
        } else {
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("InsertCancelled"));
            }
            $addRow = false;
        }
        if ($addRow) {
            // Call Row Inserted event
            $this->rowInserted($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($addRow) {
        }

        // Write JSON for API request
        if (IsApi() && $addRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $addRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("StoreStoreledList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
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
}
