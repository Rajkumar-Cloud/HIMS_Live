<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class DepositPettycashAdd extends DepositPettycash
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'deposit_pettycash';

    // Page object name
    public $PageObjName = "DepositPettycashAdd";

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

        // Table object (deposit_pettycash)
        if (!isset($GLOBALS["deposit_pettycash"]) || get_class($GLOBALS["deposit_pettycash"]) == PROJECT_NAMESPACE . "deposit_pettycash") {
            $GLOBALS["deposit_pettycash"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'deposit_pettycash');
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
                $doc = new $class(Container("deposit_pettycash"));
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
                    if ($pageName == "DepositPettycashView") {
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
        $this->TransType->setVisibility();
        $this->ShiftNumber->setVisibility();
        $this->TerminalNumber->setVisibility();
        $this->User->setVisibility();
        $this->OpenedDateTime->setVisibility();
        $this->AccoundHead->setVisibility();
        $this->Amount->setVisibility();
        $this->Narration->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
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
                    $this->terminate("DepositPettycashList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "DepositPettycashList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "DepositPettycashView") {
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
        $this->TransType->CurrentValue = null;
        $this->TransType->OldValue = $this->TransType->CurrentValue;
        $this->ShiftNumber->CurrentValue = null;
        $this->ShiftNumber->OldValue = $this->ShiftNumber->CurrentValue;
        $this->TerminalNumber->CurrentValue = null;
        $this->TerminalNumber->OldValue = $this->TerminalNumber->CurrentValue;
        $this->User->CurrentValue = null;
        $this->User->OldValue = $this->User->CurrentValue;
        $this->OpenedDateTime->CurrentValue = null;
        $this->OpenedDateTime->OldValue = $this->OpenedDateTime->CurrentValue;
        $this->AccoundHead->CurrentValue = null;
        $this->AccoundHead->OldValue = $this->AccoundHead->CurrentValue;
        $this->Amount->CurrentValue = null;
        $this->Amount->OldValue = $this->Amount->CurrentValue;
        $this->Narration->CurrentValue = null;
        $this->Narration->OldValue = $this->Narration->CurrentValue;
        $this->CreatedBy->CurrentValue = null;
        $this->CreatedBy->OldValue = $this->CreatedBy->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->ModifiedBy->CurrentValue = null;
        $this->ModifiedBy->OldValue = $this->ModifiedBy->CurrentValue;
        $this->ModifiedDateTime->CurrentValue = null;
        $this->ModifiedDateTime->OldValue = $this->ModifiedDateTime->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'TransType' first before field var 'x_TransType'
        $val = $CurrentForm->hasValue("TransType") ? $CurrentForm->getValue("TransType") : $CurrentForm->getValue("x_TransType");
        if (!$this->TransType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransType->Visible = false; // Disable update for API request
            } else {
                $this->TransType->setFormValue($val);
            }
        }

        // Check field name 'ShiftNumber' first before field var 'x_ShiftNumber'
        $val = $CurrentForm->hasValue("ShiftNumber") ? $CurrentForm->getValue("ShiftNumber") : $CurrentForm->getValue("x_ShiftNumber");
        if (!$this->ShiftNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ShiftNumber->Visible = false; // Disable update for API request
            } else {
                $this->ShiftNumber->setFormValue($val);
            }
        }

        // Check field name 'TerminalNumber' first before field var 'x_TerminalNumber'
        $val = $CurrentForm->hasValue("TerminalNumber") ? $CurrentForm->getValue("TerminalNumber") : $CurrentForm->getValue("x_TerminalNumber");
        if (!$this->TerminalNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TerminalNumber->Visible = false; // Disable update for API request
            } else {
                $this->TerminalNumber->setFormValue($val);
            }
        }

        // Check field name 'User' first before field var 'x_User'
        $val = $CurrentForm->hasValue("User") ? $CurrentForm->getValue("User") : $CurrentForm->getValue("x_User");
        if (!$this->User->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->User->Visible = false; // Disable update for API request
            } else {
                $this->User->setFormValue($val);
            }
        }

        // Check field name 'OpenedDateTime' first before field var 'x_OpenedDateTime'
        $val = $CurrentForm->hasValue("OpenedDateTime") ? $CurrentForm->getValue("OpenedDateTime") : $CurrentForm->getValue("x_OpenedDateTime");
        if (!$this->OpenedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OpenedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->OpenedDateTime->setFormValue($val);
            }
            $this->OpenedDateTime->CurrentValue = UnFormatDateTime($this->OpenedDateTime->CurrentValue, 0);
        }

        // Check field name 'AccoundHead' first before field var 'x_AccoundHead'
        $val = $CurrentForm->hasValue("AccoundHead") ? $CurrentForm->getValue("AccoundHead") : $CurrentForm->getValue("x_AccoundHead");
        if (!$this->AccoundHead->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AccoundHead->Visible = false; // Disable update for API request
            } else {
                $this->AccoundHead->setFormValue($val);
            }
        }

        // Check field name 'Amount' first before field var 'x_Amount'
        $val = $CurrentForm->hasValue("Amount") ? $CurrentForm->getValue("Amount") : $CurrentForm->getValue("x_Amount");
        if (!$this->Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amount->Visible = false; // Disable update for API request
            } else {
                $this->Amount->setFormValue($val);
            }
        }

        // Check field name 'Narration' first before field var 'x_Narration'
        $val = $CurrentForm->hasValue("Narration") ? $CurrentForm->getValue("Narration") : $CurrentForm->getValue("x_Narration");
        if (!$this->Narration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Narration->Visible = false; // Disable update for API request
            } else {
                $this->Narration->setFormValue($val);
            }
        }

        // Check field name 'CreatedBy' first before field var 'x_CreatedBy'
        $val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
        if (!$this->CreatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedBy->Visible = false; // Disable update for API request
            } else {
                $this->CreatedBy->setFormValue($val);
            }
        }

        // Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
        $val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
        if (!$this->CreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDateTime->setFormValue($val);
            }
            $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        }

        // Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
        $val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
        if (!$this->ModifiedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedBy->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedBy->setFormValue($val);
            }
        }

        // Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
        $val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
        if (!$this->ModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedDateTime->setFormValue($val);
            }
            $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->TransType->CurrentValue = $this->TransType->FormValue;
        $this->ShiftNumber->CurrentValue = $this->ShiftNumber->FormValue;
        $this->TerminalNumber->CurrentValue = $this->TerminalNumber->FormValue;
        $this->User->CurrentValue = $this->User->FormValue;
        $this->OpenedDateTime->CurrentValue = $this->OpenedDateTime->FormValue;
        $this->OpenedDateTime->CurrentValue = UnFormatDateTime($this->OpenedDateTime->CurrentValue, 0);
        $this->AccoundHead->CurrentValue = $this->AccoundHead->FormValue;
        $this->Amount->CurrentValue = $this->Amount->FormValue;
        $this->Narration->CurrentValue = $this->Narration->FormValue;
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
        $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
        $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
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
        $this->TransType->setDbValue($row['TransType']);
        $this->ShiftNumber->setDbValue($row['ShiftNumber']);
        $this->TerminalNumber->setDbValue($row['TerminalNumber']);
        $this->User->setDbValue($row['User']);
        $this->OpenedDateTime->setDbValue($row['OpenedDateTime']);
        $this->AccoundHead->setDbValue($row['AccoundHead']);
        $this->Amount->setDbValue($row['Amount']);
        $this->Narration->setDbValue($row['Narration']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['TransType'] = $this->TransType->CurrentValue;
        $row['ShiftNumber'] = $this->ShiftNumber->CurrentValue;
        $row['TerminalNumber'] = $this->TerminalNumber->CurrentValue;
        $row['User'] = $this->User->CurrentValue;
        $row['OpenedDateTime'] = $this->OpenedDateTime->CurrentValue;
        $row['AccoundHead'] = $this->AccoundHead->CurrentValue;
        $row['Amount'] = $this->Amount->CurrentValue;
        $row['Narration'] = $this->Narration->CurrentValue;
        $row['CreatedBy'] = $this->CreatedBy->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['ModifiedBy'] = $this->ModifiedBy->CurrentValue;
        $row['ModifiedDateTime'] = $this->ModifiedDateTime->CurrentValue;
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
        if ($this->Amount->FormValue == $this->Amount->CurrentValue && is_numeric(ConvertToFloatString($this->Amount->CurrentValue))) {
            $this->Amount->CurrentValue = ConvertToFloatString($this->Amount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // TransType

        // ShiftNumber

        // TerminalNumber

        // User

        // OpenedDateTime

        // AccoundHead

        // Amount

        // Narration

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // TransType
            $this->TransType->ViewValue = $this->TransType->CurrentValue;
            $this->TransType->ViewCustomAttributes = "";

            // ShiftNumber
            $this->ShiftNumber->ViewValue = $this->ShiftNumber->CurrentValue;
            $this->ShiftNumber->ViewCustomAttributes = "";

            // TerminalNumber
            $this->TerminalNumber->ViewValue = $this->TerminalNumber->CurrentValue;
            $this->TerminalNumber->ViewCustomAttributes = "";

            // User
            $this->User->ViewValue = $this->User->CurrentValue;
            $this->User->ViewCustomAttributes = "";

            // OpenedDateTime
            $this->OpenedDateTime->ViewValue = $this->OpenedDateTime->CurrentValue;
            $this->OpenedDateTime->ViewValue = FormatDateTime($this->OpenedDateTime->ViewValue, 0);
            $this->OpenedDateTime->ViewCustomAttributes = "";

            // AccoundHead
            $this->AccoundHead->ViewValue = $this->AccoundHead->CurrentValue;
            $this->AccoundHead->ViewCustomAttributes = "";

            // Amount
            $this->Amount->ViewValue = $this->Amount->CurrentValue;
            $this->Amount->ViewValue = FormatNumber($this->Amount->ViewValue, 2, -2, -2, -2);
            $this->Amount->ViewCustomAttributes = "";

            // Narration
            $this->Narration->ViewValue = $this->Narration->CurrentValue;
            $this->Narration->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // TransType
            $this->TransType->LinkCustomAttributes = "";
            $this->TransType->HrefValue = "";
            $this->TransType->TooltipValue = "";

            // ShiftNumber
            $this->ShiftNumber->LinkCustomAttributes = "";
            $this->ShiftNumber->HrefValue = "";
            $this->ShiftNumber->TooltipValue = "";

            // TerminalNumber
            $this->TerminalNumber->LinkCustomAttributes = "";
            $this->TerminalNumber->HrefValue = "";
            $this->TerminalNumber->TooltipValue = "";

            // User
            $this->User->LinkCustomAttributes = "";
            $this->User->HrefValue = "";
            $this->User->TooltipValue = "";

            // OpenedDateTime
            $this->OpenedDateTime->LinkCustomAttributes = "";
            $this->OpenedDateTime->HrefValue = "";
            $this->OpenedDateTime->TooltipValue = "";

            // AccoundHead
            $this->AccoundHead->LinkCustomAttributes = "";
            $this->AccoundHead->HrefValue = "";
            $this->AccoundHead->TooltipValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";
            $this->Amount->TooltipValue = "";

            // Narration
            $this->Narration->LinkCustomAttributes = "";
            $this->Narration->HrefValue = "";
            $this->Narration->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // TransType
            $this->TransType->EditAttrs["class"] = "form-control";
            $this->TransType->EditCustomAttributes = "";
            if (!$this->TransType->Raw) {
                $this->TransType->CurrentValue = HtmlDecode($this->TransType->CurrentValue);
            }
            $this->TransType->EditValue = HtmlEncode($this->TransType->CurrentValue);
            $this->TransType->PlaceHolder = RemoveHtml($this->TransType->caption());

            // ShiftNumber
            $this->ShiftNumber->EditAttrs["class"] = "form-control";
            $this->ShiftNumber->EditCustomAttributes = "";
            if (!$this->ShiftNumber->Raw) {
                $this->ShiftNumber->CurrentValue = HtmlDecode($this->ShiftNumber->CurrentValue);
            }
            $this->ShiftNumber->EditValue = HtmlEncode($this->ShiftNumber->CurrentValue);
            $this->ShiftNumber->PlaceHolder = RemoveHtml($this->ShiftNumber->caption());

            // TerminalNumber
            $this->TerminalNumber->EditAttrs["class"] = "form-control";
            $this->TerminalNumber->EditCustomAttributes = "";
            if (!$this->TerminalNumber->Raw) {
                $this->TerminalNumber->CurrentValue = HtmlDecode($this->TerminalNumber->CurrentValue);
            }
            $this->TerminalNumber->EditValue = HtmlEncode($this->TerminalNumber->CurrentValue);
            $this->TerminalNumber->PlaceHolder = RemoveHtml($this->TerminalNumber->caption());

            // User
            $this->User->EditAttrs["class"] = "form-control";
            $this->User->EditCustomAttributes = "";
            if (!$this->User->Raw) {
                $this->User->CurrentValue = HtmlDecode($this->User->CurrentValue);
            }
            $this->User->EditValue = HtmlEncode($this->User->CurrentValue);
            $this->User->PlaceHolder = RemoveHtml($this->User->caption());

            // OpenedDateTime
            $this->OpenedDateTime->EditAttrs["class"] = "form-control";
            $this->OpenedDateTime->EditCustomAttributes = "";
            $this->OpenedDateTime->EditValue = HtmlEncode(FormatDateTime($this->OpenedDateTime->CurrentValue, 8));
            $this->OpenedDateTime->PlaceHolder = RemoveHtml($this->OpenedDateTime->caption());

            // AccoundHead
            $this->AccoundHead->EditAttrs["class"] = "form-control";
            $this->AccoundHead->EditCustomAttributes = "";
            if (!$this->AccoundHead->Raw) {
                $this->AccoundHead->CurrentValue = HtmlDecode($this->AccoundHead->CurrentValue);
            }
            $this->AccoundHead->EditValue = HtmlEncode($this->AccoundHead->CurrentValue);
            $this->AccoundHead->PlaceHolder = RemoveHtml($this->AccoundHead->caption());

            // Amount
            $this->Amount->EditAttrs["class"] = "form-control";
            $this->Amount->EditCustomAttributes = "";
            $this->Amount->EditValue = HtmlEncode($this->Amount->CurrentValue);
            $this->Amount->PlaceHolder = RemoveHtml($this->Amount->caption());
            if (strval($this->Amount->EditValue) != "" && is_numeric($this->Amount->EditValue)) {
                $this->Amount->EditValue = FormatNumber($this->Amount->EditValue, -2, -2, -2, -2);
            }

            // Narration
            $this->Narration->EditAttrs["class"] = "form-control";
            $this->Narration->EditCustomAttributes = "";
            $this->Narration->EditValue = HtmlEncode($this->Narration->CurrentValue);
            $this->Narration->PlaceHolder = RemoveHtml($this->Narration->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            $this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->ModifiedDateTime->CurrentValue, 8));
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // Add refer script

            // TransType
            $this->TransType->LinkCustomAttributes = "";
            $this->TransType->HrefValue = "";

            // ShiftNumber
            $this->ShiftNumber->LinkCustomAttributes = "";
            $this->ShiftNumber->HrefValue = "";

            // TerminalNumber
            $this->TerminalNumber->LinkCustomAttributes = "";
            $this->TerminalNumber->HrefValue = "";

            // User
            $this->User->LinkCustomAttributes = "";
            $this->User->HrefValue = "";

            // OpenedDateTime
            $this->OpenedDateTime->LinkCustomAttributes = "";
            $this->OpenedDateTime->HrefValue = "";

            // AccoundHead
            $this->AccoundHead->LinkCustomAttributes = "";
            $this->AccoundHead->HrefValue = "";

            // Amount
            $this->Amount->LinkCustomAttributes = "";
            $this->Amount->HrefValue = "";

            // Narration
            $this->Narration->LinkCustomAttributes = "";
            $this->Narration->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
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
        if ($this->TransType->Required) {
            if (!$this->TransType->IsDetailKey && EmptyValue($this->TransType->FormValue)) {
                $this->TransType->addErrorMessage(str_replace("%s", $this->TransType->caption(), $this->TransType->RequiredErrorMessage));
            }
        }
        if ($this->ShiftNumber->Required) {
            if (!$this->ShiftNumber->IsDetailKey && EmptyValue($this->ShiftNumber->FormValue)) {
                $this->ShiftNumber->addErrorMessage(str_replace("%s", $this->ShiftNumber->caption(), $this->ShiftNumber->RequiredErrorMessage));
            }
        }
        if ($this->TerminalNumber->Required) {
            if (!$this->TerminalNumber->IsDetailKey && EmptyValue($this->TerminalNumber->FormValue)) {
                $this->TerminalNumber->addErrorMessage(str_replace("%s", $this->TerminalNumber->caption(), $this->TerminalNumber->RequiredErrorMessage));
            }
        }
        if ($this->User->Required) {
            if (!$this->User->IsDetailKey && EmptyValue($this->User->FormValue)) {
                $this->User->addErrorMessage(str_replace("%s", $this->User->caption(), $this->User->RequiredErrorMessage));
            }
        }
        if ($this->OpenedDateTime->Required) {
            if (!$this->OpenedDateTime->IsDetailKey && EmptyValue($this->OpenedDateTime->FormValue)) {
                $this->OpenedDateTime->addErrorMessage(str_replace("%s", $this->OpenedDateTime->caption(), $this->OpenedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OpenedDateTime->FormValue)) {
            $this->OpenedDateTime->addErrorMessage($this->OpenedDateTime->getErrorMessage(false));
        }
        if ($this->AccoundHead->Required) {
            if (!$this->AccoundHead->IsDetailKey && EmptyValue($this->AccoundHead->FormValue)) {
                $this->AccoundHead->addErrorMessage(str_replace("%s", $this->AccoundHead->caption(), $this->AccoundHead->RequiredErrorMessage));
            }
        }
        if ($this->Amount->Required) {
            if (!$this->Amount->IsDetailKey && EmptyValue($this->Amount->FormValue)) {
                $this->Amount->addErrorMessage(str_replace("%s", $this->Amount->caption(), $this->Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Amount->FormValue)) {
            $this->Amount->addErrorMessage($this->Amount->getErrorMessage(false));
        }
        if ($this->Narration->Required) {
            if (!$this->Narration->IsDetailKey && EmptyValue($this->Narration->FormValue)) {
                $this->Narration->addErrorMessage(str_replace("%s", $this->Narration->caption(), $this->Narration->RequiredErrorMessage));
            }
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreatedDateTime->FormValue)) {
            $this->CreatedDateTime->addErrorMessage($this->CreatedDateTime->getErrorMessage(false));
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ModifiedDateTime->FormValue)) {
            $this->ModifiedDateTime->addErrorMessage($this->ModifiedDateTime->getErrorMessage(false));
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

        // TransType
        $this->TransType->setDbValueDef($rsnew, $this->TransType->CurrentValue, null, false);

        // ShiftNumber
        $this->ShiftNumber->setDbValueDef($rsnew, $this->ShiftNumber->CurrentValue, null, false);

        // TerminalNumber
        $this->TerminalNumber->setDbValueDef($rsnew, $this->TerminalNumber->CurrentValue, null, false);

        // User
        $this->User->setDbValueDef($rsnew, $this->User->CurrentValue, null, false);

        // OpenedDateTime
        $this->OpenedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->OpenedDateTime->CurrentValue, 0), null, false);

        // AccoundHead
        $this->AccoundHead->setDbValueDef($rsnew, $this->AccoundHead->CurrentValue, null, false);

        // Amount
        $this->Amount->setDbValueDef($rsnew, $this->Amount->CurrentValue, null, false);

        // Narration
        $this->Narration->setDbValueDef($rsnew, $this->Narration->CurrentValue, null, false);

        // CreatedBy
        $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, false);

        // CreatedDateTime
        $this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), null, false);

        // ModifiedBy
        $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, false);

        // ModifiedDateTime
        $this->ModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0), null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DepositPettycashList"), "", $this->TableVar, true);
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
