<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresGenericinteractionsAdd extends PresGenericinteractions
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_genericinteractions';

    // Page object name
    public $PageObjName = "PresGenericinteractionsAdd";

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

        // Table object (pres_genericinteractions)
        if (!isset($GLOBALS["pres_genericinteractions"]) || get_class($GLOBALS["pres_genericinteractions"]) == PROJECT_NAMESPACE . "pres_genericinteractions") {
            $GLOBALS["pres_genericinteractions"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_genericinteractions');
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
                $doc = new $class(Container("pres_genericinteractions"));
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
                    if ($pageName == "PresGenericinteractionsView") {
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
        $this->id->Visible = false;
        $this->Genericname->setVisibility();
        $this->Catid->setVisibility();
        $this->Interactions->setVisibility();
        $this->Intid->setVisibility();
        $this->Createddt->setVisibility();
        $this->Createdtm->setVisibility();
        $this->Statusbit->setVisibility();
        $this->Remarks->setVisibility();
        $this->_Username->setVisibility();
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
                    $this->terminate("PresGenericinteractionsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PresGenericinteractionsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PresGenericinteractionsView") {
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
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
        $this->Genericname->CurrentValue = null;
        $this->Genericname->OldValue = $this->Genericname->CurrentValue;
        $this->Catid->CurrentValue = null;
        $this->Catid->OldValue = $this->Catid->CurrentValue;
        $this->Interactions->CurrentValue = null;
        $this->Interactions->OldValue = $this->Interactions->CurrentValue;
        $this->Intid->CurrentValue = null;
        $this->Intid->OldValue = $this->Intid->CurrentValue;
        $this->Createddt->CurrentValue = null;
        $this->Createddt->OldValue = $this->Createddt->CurrentValue;
        $this->Createdtm->CurrentValue = null;
        $this->Createdtm->OldValue = $this->Createdtm->CurrentValue;
        $this->Statusbit->CurrentValue = null;
        $this->Statusbit->OldValue = $this->Statusbit->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->_Username->CurrentValue = null;
        $this->_Username->OldValue = $this->_Username->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Genericname' first before field var 'x_Genericname'
        $val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
        if (!$this->Genericname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Genericname->Visible = false; // Disable update for API request
            } else {
                $this->Genericname->setFormValue($val);
            }
        }

        // Check field name 'Catid' first before field var 'x_Catid'
        $val = $CurrentForm->hasValue("Catid") ? $CurrentForm->getValue("Catid") : $CurrentForm->getValue("x_Catid");
        if (!$this->Catid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Catid->Visible = false; // Disable update for API request
            } else {
                $this->Catid->setFormValue($val);
            }
        }

        // Check field name 'Interactions' first before field var 'x_Interactions'
        $val = $CurrentForm->hasValue("Interactions") ? $CurrentForm->getValue("Interactions") : $CurrentForm->getValue("x_Interactions");
        if (!$this->Interactions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Interactions->Visible = false; // Disable update for API request
            } else {
                $this->Interactions->setFormValue($val);
            }
        }

        // Check field name 'Intid' first before field var 'x_Intid'
        $val = $CurrentForm->hasValue("Intid") ? $CurrentForm->getValue("Intid") : $CurrentForm->getValue("x_Intid");
        if (!$this->Intid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Intid->Visible = false; // Disable update for API request
            } else {
                $this->Intid->setFormValue($val);
            }
        }

        // Check field name 'Createddt' first before field var 'x_Createddt'
        $val = $CurrentForm->hasValue("Createddt") ? $CurrentForm->getValue("Createddt") : $CurrentForm->getValue("x_Createddt");
        if (!$this->Createddt->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Createddt->Visible = false; // Disable update for API request
            } else {
                $this->Createddt->setFormValue($val);
            }
            $this->Createddt->CurrentValue = UnFormatDateTime($this->Createddt->CurrentValue, 0);
        }

        // Check field name 'Createdtm' first before field var 'x_Createdtm'
        $val = $CurrentForm->hasValue("Createdtm") ? $CurrentForm->getValue("Createdtm") : $CurrentForm->getValue("x_Createdtm");
        if (!$this->Createdtm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Createdtm->Visible = false; // Disable update for API request
            } else {
                $this->Createdtm->setFormValue($val);
            }
            $this->Createdtm->CurrentValue = UnFormatDateTime($this->Createdtm->CurrentValue, 4);
        }

        // Check field name 'Statusbit' first before field var 'x_Statusbit'
        $val = $CurrentForm->hasValue("Statusbit") ? $CurrentForm->getValue("Statusbit") : $CurrentForm->getValue("x_Statusbit");
        if (!$this->Statusbit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Statusbit->Visible = false; // Disable update for API request
            } else {
                $this->Statusbit->setFormValue($val);
            }
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'Username' first before field var 'x__Username'
        $val = $CurrentForm->hasValue("Username") ? $CurrentForm->getValue("Username") : $CurrentForm->getValue("x__Username");
        if (!$this->_Username->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Username->Visible = false; // Disable update for API request
            } else {
                $this->_Username->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Genericname->CurrentValue = $this->Genericname->FormValue;
        $this->Catid->CurrentValue = $this->Catid->FormValue;
        $this->Interactions->CurrentValue = $this->Interactions->FormValue;
        $this->Intid->CurrentValue = $this->Intid->FormValue;
        $this->Createddt->CurrentValue = $this->Createddt->FormValue;
        $this->Createddt->CurrentValue = UnFormatDateTime($this->Createddt->CurrentValue, 0);
        $this->Createdtm->CurrentValue = $this->Createdtm->FormValue;
        $this->Createdtm->CurrentValue = UnFormatDateTime($this->Createdtm->CurrentValue, 4);
        $this->Statusbit->CurrentValue = $this->Statusbit->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->_Username->CurrentValue = $this->_Username->FormValue;
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
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Catid->setDbValue($row['Catid']);
        $this->Interactions->setDbValue($row['Interactions']);
        $this->Intid->setDbValue($row['Intid']);
        $this->Createddt->setDbValue($row['Createddt']);
        $this->Createdtm->setDbValue($row['Createdtm']);
        $this->Statusbit->setDbValue($row['Statusbit']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->_Username->setDbValue($row['Username']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Genericname'] = $this->Genericname->CurrentValue;
        $row['Catid'] = $this->Catid->CurrentValue;
        $row['Interactions'] = $this->Interactions->CurrentValue;
        $row['Intid'] = $this->Intid->CurrentValue;
        $row['Createddt'] = $this->Createddt->CurrentValue;
        $row['Createdtm'] = $this->Createdtm->CurrentValue;
        $row['Statusbit'] = $this->Statusbit->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['Username'] = $this->_Username->CurrentValue;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Genericname

        // Catid

        // Interactions

        // Intid

        // Createddt

        // Createdtm

        // Statusbit

        // Remarks

        // Username
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
            $this->Genericname->ViewCustomAttributes = "";

            // Catid
            $this->Catid->ViewValue = $this->Catid->CurrentValue;
            $this->Catid->ViewValue = FormatNumber($this->Catid->ViewValue, 0, -2, -2, -2);
            $this->Catid->ViewCustomAttributes = "";

            // Interactions
            $this->Interactions->ViewValue = $this->Interactions->CurrentValue;
            $this->Interactions->ViewCustomAttributes = "";

            // Intid
            $this->Intid->ViewValue = $this->Intid->CurrentValue;
            $this->Intid->ViewValue = FormatNumber($this->Intid->ViewValue, 0, -2, -2, -2);
            $this->Intid->ViewCustomAttributes = "";

            // Createddt
            $this->Createddt->ViewValue = $this->Createddt->CurrentValue;
            $this->Createddt->ViewValue = FormatDateTime($this->Createddt->ViewValue, 0);
            $this->Createddt->ViewCustomAttributes = "";

            // Createdtm
            $this->Createdtm->ViewValue = $this->Createdtm->CurrentValue;
            $this->Createdtm->ViewValue = FormatDateTime($this->Createdtm->ViewValue, 4);
            $this->Createdtm->ViewCustomAttributes = "";

            // Statusbit
            $this->Statusbit->ViewValue = $this->Statusbit->CurrentValue;
            $this->Statusbit->ViewValue = FormatNumber($this->Statusbit->ViewValue, 0, -2, -2, -2);
            $this->Statusbit->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // Username
            $this->_Username->ViewValue = $this->_Username->CurrentValue;
            $this->_Username->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";
            $this->Genericname->TooltipValue = "";

            // Catid
            $this->Catid->LinkCustomAttributes = "";
            $this->Catid->HrefValue = "";
            $this->Catid->TooltipValue = "";

            // Interactions
            $this->Interactions->LinkCustomAttributes = "";
            $this->Interactions->HrefValue = "";
            $this->Interactions->TooltipValue = "";

            // Intid
            $this->Intid->LinkCustomAttributes = "";
            $this->Intid->HrefValue = "";
            $this->Intid->TooltipValue = "";

            // Createddt
            $this->Createddt->LinkCustomAttributes = "";
            $this->Createddt->HrefValue = "";
            $this->Createddt->TooltipValue = "";

            // Createdtm
            $this->Createdtm->LinkCustomAttributes = "";
            $this->Createdtm->HrefValue = "";
            $this->Createdtm->TooltipValue = "";

            // Statusbit
            $this->Statusbit->LinkCustomAttributes = "";
            $this->Statusbit->HrefValue = "";
            $this->Statusbit->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // Username
            $this->_Username->LinkCustomAttributes = "";
            $this->_Username->HrefValue = "";
            $this->_Username->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Genericname
            $this->Genericname->EditAttrs["class"] = "form-control";
            $this->Genericname->EditCustomAttributes = "";
            if (!$this->Genericname->Raw) {
                $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
            }
            $this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
            $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

            // Catid
            $this->Catid->EditAttrs["class"] = "form-control";
            $this->Catid->EditCustomAttributes = "";
            $this->Catid->EditValue = HtmlEncode($this->Catid->CurrentValue);
            $this->Catid->PlaceHolder = RemoveHtml($this->Catid->caption());

            // Interactions
            $this->Interactions->EditAttrs["class"] = "form-control";
            $this->Interactions->EditCustomAttributes = "";
            if (!$this->Interactions->Raw) {
                $this->Interactions->CurrentValue = HtmlDecode($this->Interactions->CurrentValue);
            }
            $this->Interactions->EditValue = HtmlEncode($this->Interactions->CurrentValue);
            $this->Interactions->PlaceHolder = RemoveHtml($this->Interactions->caption());

            // Intid
            $this->Intid->EditAttrs["class"] = "form-control";
            $this->Intid->EditCustomAttributes = "";
            $this->Intid->EditValue = HtmlEncode($this->Intid->CurrentValue);
            $this->Intid->PlaceHolder = RemoveHtml($this->Intid->caption());

            // Createddt
            $this->Createddt->EditAttrs["class"] = "form-control";
            $this->Createddt->EditCustomAttributes = "";
            $this->Createddt->EditValue = HtmlEncode(FormatDateTime($this->Createddt->CurrentValue, 8));
            $this->Createddt->PlaceHolder = RemoveHtml($this->Createddt->caption());

            // Createdtm
            $this->Createdtm->EditAttrs["class"] = "form-control";
            $this->Createdtm->EditCustomAttributes = "";
            $this->Createdtm->EditValue = HtmlEncode($this->Createdtm->CurrentValue);
            $this->Createdtm->PlaceHolder = RemoveHtml($this->Createdtm->caption());

            // Statusbit
            $this->Statusbit->EditAttrs["class"] = "form-control";
            $this->Statusbit->EditCustomAttributes = "";
            $this->Statusbit->EditValue = HtmlEncode($this->Statusbit->CurrentValue);
            $this->Statusbit->PlaceHolder = RemoveHtml($this->Statusbit->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // Username
            $this->_Username->EditAttrs["class"] = "form-control";
            $this->_Username->EditCustomAttributes = "";
            if (!$this->_Username->Raw) {
                $this->_Username->CurrentValue = HtmlDecode($this->_Username->CurrentValue);
            }
            $this->_Username->EditValue = HtmlEncode($this->_Username->CurrentValue);
            $this->_Username->PlaceHolder = RemoveHtml($this->_Username->caption());

            // Add refer script

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";

            // Catid
            $this->Catid->LinkCustomAttributes = "";
            $this->Catid->HrefValue = "";

            // Interactions
            $this->Interactions->LinkCustomAttributes = "";
            $this->Interactions->HrefValue = "";

            // Intid
            $this->Intid->LinkCustomAttributes = "";
            $this->Intid->HrefValue = "";

            // Createddt
            $this->Createddt->LinkCustomAttributes = "";
            $this->Createddt->HrefValue = "";

            // Createdtm
            $this->Createdtm->LinkCustomAttributes = "";
            $this->Createdtm->HrefValue = "";

            // Statusbit
            $this->Statusbit->LinkCustomAttributes = "";
            $this->Statusbit->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // Username
            $this->_Username->LinkCustomAttributes = "";
            $this->_Username->HrefValue = "";
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
        if ($this->Genericname->Required) {
            if (!$this->Genericname->IsDetailKey && EmptyValue($this->Genericname->FormValue)) {
                $this->Genericname->addErrorMessage(str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
            }
        }
        if ($this->Catid->Required) {
            if (!$this->Catid->IsDetailKey && EmptyValue($this->Catid->FormValue)) {
                $this->Catid->addErrorMessage(str_replace("%s", $this->Catid->caption(), $this->Catid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Catid->FormValue)) {
            $this->Catid->addErrorMessage($this->Catid->getErrorMessage(false));
        }
        if ($this->Interactions->Required) {
            if (!$this->Interactions->IsDetailKey && EmptyValue($this->Interactions->FormValue)) {
                $this->Interactions->addErrorMessage(str_replace("%s", $this->Interactions->caption(), $this->Interactions->RequiredErrorMessage));
            }
        }
        if ($this->Intid->Required) {
            if (!$this->Intid->IsDetailKey && EmptyValue($this->Intid->FormValue)) {
                $this->Intid->addErrorMessage(str_replace("%s", $this->Intid->caption(), $this->Intid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Intid->FormValue)) {
            $this->Intid->addErrorMessage($this->Intid->getErrorMessage(false));
        }
        if ($this->Createddt->Required) {
            if (!$this->Createddt->IsDetailKey && EmptyValue($this->Createddt->FormValue)) {
                $this->Createddt->addErrorMessage(str_replace("%s", $this->Createddt->caption(), $this->Createddt->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Createddt->FormValue)) {
            $this->Createddt->addErrorMessage($this->Createddt->getErrorMessage(false));
        }
        if ($this->Createdtm->Required) {
            if (!$this->Createdtm->IsDetailKey && EmptyValue($this->Createdtm->FormValue)) {
                $this->Createdtm->addErrorMessage(str_replace("%s", $this->Createdtm->caption(), $this->Createdtm->RequiredErrorMessage));
            }
        }
        if (!CheckTime($this->Createdtm->FormValue)) {
            $this->Createdtm->addErrorMessage($this->Createdtm->getErrorMessage(false));
        }
        if ($this->Statusbit->Required) {
            if (!$this->Statusbit->IsDetailKey && EmptyValue($this->Statusbit->FormValue)) {
                $this->Statusbit->addErrorMessage(str_replace("%s", $this->Statusbit->caption(), $this->Statusbit->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Statusbit->FormValue)) {
            $this->Statusbit->addErrorMessage($this->Statusbit->getErrorMessage(false));
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->_Username->Required) {
            if (!$this->_Username->IsDetailKey && EmptyValue($this->_Username->FormValue)) {
                $this->_Username->addErrorMessage(str_replace("%s", $this->_Username->caption(), $this->_Username->RequiredErrorMessage));
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

        // Genericname
        $this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, null, false);

        // Catid
        $this->Catid->setDbValueDef($rsnew, $this->Catid->CurrentValue, null, false);

        // Interactions
        $this->Interactions->setDbValueDef($rsnew, $this->Interactions->CurrentValue, null, false);

        // Intid
        $this->Intid->setDbValueDef($rsnew, $this->Intid->CurrentValue, null, false);

        // Createddt
        $this->Createddt->setDbValueDef($rsnew, UnFormatDateTime($this->Createddt->CurrentValue, 0), null, false);

        // Createdtm
        $this->Createdtm->setDbValueDef($rsnew, $this->Createdtm->CurrentValue, null, false);

        // Statusbit
        $this->Statusbit->setDbValueDef($rsnew, $this->Statusbit->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // Username
        $this->_Username->setDbValueDef($rsnew, $this->_Username->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresGenericinteractionsList"), "", $this->TableVar, true);
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
