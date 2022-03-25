<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class LabDeptMastAdd extends LabDeptMast
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'lab_dept_mast';

    // Page object name
    public $PageObjName = "LabDeptMastAdd";

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

        // Table object (lab_dept_mast)
        if (!isset($GLOBALS["lab_dept_mast"]) || get_class($GLOBALS["lab_dept_mast"]) == PROJECT_NAMESPACE . "lab_dept_mast") {
            $GLOBALS["lab_dept_mast"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'lab_dept_mast');
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
                $doc = new $class(Container("lab_dept_mast"));
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
                    if ($pageName == "LabDeptMastView") {
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
        $this->MainCD->setVisibility();
        $this->Code->setVisibility();
        $this->Name->setVisibility();
        $this->Order->setVisibility();
        $this->SignCD->setVisibility();
        $this->Collection->setVisibility();
        $this->EditDate->setVisibility();
        $this->SMS->setVisibility();
        $this->Note->setVisibility();
        $this->WorkList->setVisibility();
        $this->_Page->setVisibility();
        $this->Incharge->setVisibility();
        $this->AutoNum->setVisibility();
        $this->id->Visible = false;
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
                    $this->terminate("LabDeptMastList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "LabDeptMastList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "LabDeptMastView") {
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
        $this->MainCD->CurrentValue = null;
        $this->MainCD->OldValue = $this->MainCD->CurrentValue;
        $this->Code->CurrentValue = null;
        $this->Code->OldValue = $this->Code->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Order->CurrentValue = null;
        $this->Order->OldValue = $this->Order->CurrentValue;
        $this->SignCD->CurrentValue = null;
        $this->SignCD->OldValue = $this->SignCD->CurrentValue;
        $this->Collection->CurrentValue = null;
        $this->Collection->OldValue = $this->Collection->CurrentValue;
        $this->EditDate->CurrentValue = null;
        $this->EditDate->OldValue = $this->EditDate->CurrentValue;
        $this->SMS->CurrentValue = null;
        $this->SMS->OldValue = $this->SMS->CurrentValue;
        $this->Note->CurrentValue = null;
        $this->Note->OldValue = $this->Note->CurrentValue;
        $this->WorkList->CurrentValue = null;
        $this->WorkList->OldValue = $this->WorkList->CurrentValue;
        $this->_Page->CurrentValue = null;
        $this->_Page->OldValue = $this->_Page->CurrentValue;
        $this->Incharge->CurrentValue = null;
        $this->Incharge->OldValue = $this->Incharge->CurrentValue;
        $this->AutoNum->CurrentValue = null;
        $this->AutoNum->OldValue = $this->AutoNum->CurrentValue;
        $this->id->CurrentValue = null;
        $this->id->OldValue = $this->id->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'MainCD' first before field var 'x_MainCD'
        $val = $CurrentForm->hasValue("MainCD") ? $CurrentForm->getValue("MainCD") : $CurrentForm->getValue("x_MainCD");
        if (!$this->MainCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MainCD->Visible = false; // Disable update for API request
            } else {
                $this->MainCD->setFormValue($val);
            }
        }

        // Check field name 'Code' first before field var 'x_Code'
        $val = $CurrentForm->hasValue("Code") ? $CurrentForm->getValue("Code") : $CurrentForm->getValue("x_Code");
        if (!$this->Code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code->Visible = false; // Disable update for API request
            } else {
                $this->Code->setFormValue($val);
            }
        }

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
        }

        // Check field name 'Order' first before field var 'x_Order'
        $val = $CurrentForm->hasValue("Order") ? $CurrentForm->getValue("Order") : $CurrentForm->getValue("x_Order");
        if (!$this->Order->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Order->Visible = false; // Disable update for API request
            } else {
                $this->Order->setFormValue($val);
            }
        }

        // Check field name 'SignCD' first before field var 'x_SignCD'
        $val = $CurrentForm->hasValue("SignCD") ? $CurrentForm->getValue("SignCD") : $CurrentForm->getValue("x_SignCD");
        if (!$this->SignCD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SignCD->Visible = false; // Disable update for API request
            } else {
                $this->SignCD->setFormValue($val);
            }
        }

        // Check field name 'Collection' first before field var 'x_Collection'
        $val = $CurrentForm->hasValue("Collection") ? $CurrentForm->getValue("Collection") : $CurrentForm->getValue("x_Collection");
        if (!$this->Collection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Collection->Visible = false; // Disable update for API request
            } else {
                $this->Collection->setFormValue($val);
            }
        }

        // Check field name 'EditDate' first before field var 'x_EditDate'
        $val = $CurrentForm->hasValue("EditDate") ? $CurrentForm->getValue("EditDate") : $CurrentForm->getValue("x_EditDate");
        if (!$this->EditDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EditDate->Visible = false; // Disable update for API request
            } else {
                $this->EditDate->setFormValue($val);
            }
            $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        }

        // Check field name 'SMS' first before field var 'x_SMS'
        $val = $CurrentForm->hasValue("SMS") ? $CurrentForm->getValue("SMS") : $CurrentForm->getValue("x_SMS");
        if (!$this->SMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SMS->Visible = false; // Disable update for API request
            } else {
                $this->SMS->setFormValue($val);
            }
        }

        // Check field name 'Note' first before field var 'x_Note'
        $val = $CurrentForm->hasValue("Note") ? $CurrentForm->getValue("Note") : $CurrentForm->getValue("x_Note");
        if (!$this->Note->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Note->Visible = false; // Disable update for API request
            } else {
                $this->Note->setFormValue($val);
            }
        }

        // Check field name 'WorkList' first before field var 'x_WorkList'
        $val = $CurrentForm->hasValue("WorkList") ? $CurrentForm->getValue("WorkList") : $CurrentForm->getValue("x_WorkList");
        if (!$this->WorkList->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WorkList->Visible = false; // Disable update for API request
            } else {
                $this->WorkList->setFormValue($val);
            }
        }

        // Check field name 'Page' first before field var 'x__Page'
        $val = $CurrentForm->hasValue("Page") ? $CurrentForm->getValue("Page") : $CurrentForm->getValue("x__Page");
        if (!$this->_Page->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Page->Visible = false; // Disable update for API request
            } else {
                $this->_Page->setFormValue($val);
            }
        }

        // Check field name 'Incharge' first before field var 'x_Incharge'
        $val = $CurrentForm->hasValue("Incharge") ? $CurrentForm->getValue("Incharge") : $CurrentForm->getValue("x_Incharge");
        if (!$this->Incharge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incharge->Visible = false; // Disable update for API request
            } else {
                $this->Incharge->setFormValue($val);
            }
        }

        // Check field name 'AutoNum' first before field var 'x_AutoNum'
        $val = $CurrentForm->hasValue("AutoNum") ? $CurrentForm->getValue("AutoNum") : $CurrentForm->getValue("x_AutoNum");
        if (!$this->AutoNum->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AutoNum->Visible = false; // Disable update for API request
            } else {
                $this->AutoNum->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->MainCD->CurrentValue = $this->MainCD->FormValue;
        $this->Code->CurrentValue = $this->Code->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Order->CurrentValue = $this->Order->FormValue;
        $this->SignCD->CurrentValue = $this->SignCD->FormValue;
        $this->Collection->CurrentValue = $this->Collection->FormValue;
        $this->EditDate->CurrentValue = $this->EditDate->FormValue;
        $this->EditDate->CurrentValue = UnFormatDateTime($this->EditDate->CurrentValue, 0);
        $this->SMS->CurrentValue = $this->SMS->FormValue;
        $this->Note->CurrentValue = $this->Note->FormValue;
        $this->WorkList->CurrentValue = $this->WorkList->FormValue;
        $this->_Page->CurrentValue = $this->_Page->FormValue;
        $this->Incharge->CurrentValue = $this->Incharge->FormValue;
        $this->AutoNum->CurrentValue = $this->AutoNum->FormValue;
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
        $this->MainCD->setDbValue($row['MainCD']);
        $this->Code->setDbValue($row['Code']);
        $this->Name->setDbValue($row['Name']);
        $this->Order->setDbValue($row['Order']);
        $this->SignCD->setDbValue($row['SignCD']);
        $this->Collection->setDbValue($row['Collection']);
        $this->EditDate->setDbValue($row['EditDate']);
        $this->SMS->setDbValue($row['SMS']);
        $this->Note->setDbValue($row['Note']);
        $this->WorkList->setDbValue($row['WorkList']);
        $this->_Page->setDbValue($row['Page']);
        $this->Incharge->setDbValue($row['Incharge']);
        $this->AutoNum->setDbValue($row['AutoNum']);
        $this->id->setDbValue($row['id']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['MainCD'] = $this->MainCD->CurrentValue;
        $row['Code'] = $this->Code->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Order'] = $this->Order->CurrentValue;
        $row['SignCD'] = $this->SignCD->CurrentValue;
        $row['Collection'] = $this->Collection->CurrentValue;
        $row['EditDate'] = $this->EditDate->CurrentValue;
        $row['SMS'] = $this->SMS->CurrentValue;
        $row['Note'] = $this->Note->CurrentValue;
        $row['WorkList'] = $this->WorkList->CurrentValue;
        $row['Page'] = $this->_Page->CurrentValue;
        $row['Incharge'] = $this->Incharge->CurrentValue;
        $row['AutoNum'] = $this->AutoNum->CurrentValue;
        $row['id'] = $this->id->CurrentValue;
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
        if ($this->Order->FormValue == $this->Order->CurrentValue && is_numeric(ConvertToFloatString($this->Order->CurrentValue))) {
            $this->Order->CurrentValue = ConvertToFloatString($this->Order->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->_Page->FormValue == $this->_Page->CurrentValue && is_numeric(ConvertToFloatString($this->_Page->CurrentValue))) {
            $this->_Page->CurrentValue = ConvertToFloatString($this->_Page->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // MainCD

        // Code

        // Name

        // Order

        // SignCD

        // Collection

        // EditDate

        // SMS

        // Note

        // WorkList

        // Page

        // Incharge

        // AutoNum

        // id
        if ($this->RowType == ROWTYPE_VIEW) {
            // MainCD
            $this->MainCD->ViewValue = $this->MainCD->CurrentValue;
            $this->MainCD->ViewCustomAttributes = "";

            // Code
            $this->Code->ViewValue = $this->Code->CurrentValue;
            $this->Code->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Order
            $this->Order->ViewValue = $this->Order->CurrentValue;
            $this->Order->ViewValue = FormatNumber($this->Order->ViewValue, 2, -2, -2, -2);
            $this->Order->ViewCustomAttributes = "";

            // SignCD
            $this->SignCD->ViewValue = $this->SignCD->CurrentValue;
            $this->SignCD->ViewCustomAttributes = "";

            // Collection
            $this->Collection->ViewValue = $this->Collection->CurrentValue;
            $this->Collection->ViewCustomAttributes = "";

            // EditDate
            $this->EditDate->ViewValue = $this->EditDate->CurrentValue;
            $this->EditDate->ViewValue = FormatDateTime($this->EditDate->ViewValue, 0);
            $this->EditDate->ViewCustomAttributes = "";

            // SMS
            $this->SMS->ViewValue = $this->SMS->CurrentValue;
            $this->SMS->ViewCustomAttributes = "";

            // Note
            $this->Note->ViewValue = $this->Note->CurrentValue;
            $this->Note->ViewCustomAttributes = "";

            // WorkList
            $this->WorkList->ViewValue = $this->WorkList->CurrentValue;
            $this->WorkList->ViewCustomAttributes = "";

            // Page
            $this->_Page->ViewValue = $this->_Page->CurrentValue;
            $this->_Page->ViewValue = FormatNumber($this->_Page->ViewValue, 2, -2, -2, -2);
            $this->_Page->ViewCustomAttributes = "";

            // Incharge
            $this->Incharge->ViewValue = $this->Incharge->CurrentValue;
            $this->Incharge->ViewCustomAttributes = "";

            // AutoNum
            $this->AutoNum->ViewValue = $this->AutoNum->CurrentValue;
            $this->AutoNum->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // MainCD
            $this->MainCD->LinkCustomAttributes = "";
            $this->MainCD->HrefValue = "";
            $this->MainCD->TooltipValue = "";

            // Code
            $this->Code->LinkCustomAttributes = "";
            $this->Code->HrefValue = "";
            $this->Code->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";
            $this->Order->TooltipValue = "";

            // SignCD
            $this->SignCD->LinkCustomAttributes = "";
            $this->SignCD->HrefValue = "";
            $this->SignCD->TooltipValue = "";

            // Collection
            $this->Collection->LinkCustomAttributes = "";
            $this->Collection->HrefValue = "";
            $this->Collection->TooltipValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";
            $this->EditDate->TooltipValue = "";

            // SMS
            $this->SMS->LinkCustomAttributes = "";
            $this->SMS->HrefValue = "";
            $this->SMS->TooltipValue = "";

            // Note
            $this->Note->LinkCustomAttributes = "";
            $this->Note->HrefValue = "";
            $this->Note->TooltipValue = "";

            // WorkList
            $this->WorkList->LinkCustomAttributes = "";
            $this->WorkList->HrefValue = "";
            $this->WorkList->TooltipValue = "";

            // Page
            $this->_Page->LinkCustomAttributes = "";
            $this->_Page->HrefValue = "";
            $this->_Page->TooltipValue = "";

            // Incharge
            $this->Incharge->LinkCustomAttributes = "";
            $this->Incharge->HrefValue = "";
            $this->Incharge->TooltipValue = "";

            // AutoNum
            $this->AutoNum->LinkCustomAttributes = "";
            $this->AutoNum->HrefValue = "";
            $this->AutoNum->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // MainCD
            $this->MainCD->EditAttrs["class"] = "form-control";
            $this->MainCD->EditCustomAttributes = "";
            if (!$this->MainCD->Raw) {
                $this->MainCD->CurrentValue = HtmlDecode($this->MainCD->CurrentValue);
            }
            $this->MainCD->EditValue = HtmlEncode($this->MainCD->CurrentValue);
            $this->MainCD->PlaceHolder = RemoveHtml($this->MainCD->caption());

            // Code
            $this->Code->EditAttrs["class"] = "form-control";
            $this->Code->EditCustomAttributes = "";
            if (!$this->Code->Raw) {
                $this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
            }
            $this->Code->EditValue = HtmlEncode($this->Code->CurrentValue);
            $this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Order
            $this->Order->EditAttrs["class"] = "form-control";
            $this->Order->EditCustomAttributes = "";
            $this->Order->EditValue = HtmlEncode($this->Order->CurrentValue);
            $this->Order->PlaceHolder = RemoveHtml($this->Order->caption());
            if (strval($this->Order->EditValue) != "" && is_numeric($this->Order->EditValue)) {
                $this->Order->EditValue = FormatNumber($this->Order->EditValue, -2, -2, -2, -2);
            }

            // SignCD
            $this->SignCD->EditAttrs["class"] = "form-control";
            $this->SignCD->EditCustomAttributes = "";
            if (!$this->SignCD->Raw) {
                $this->SignCD->CurrentValue = HtmlDecode($this->SignCD->CurrentValue);
            }
            $this->SignCD->EditValue = HtmlEncode($this->SignCD->CurrentValue);
            $this->SignCD->PlaceHolder = RemoveHtml($this->SignCD->caption());

            // Collection
            $this->Collection->EditAttrs["class"] = "form-control";
            $this->Collection->EditCustomAttributes = "";
            if (!$this->Collection->Raw) {
                $this->Collection->CurrentValue = HtmlDecode($this->Collection->CurrentValue);
            }
            $this->Collection->EditValue = HtmlEncode($this->Collection->CurrentValue);
            $this->Collection->PlaceHolder = RemoveHtml($this->Collection->caption());

            // EditDate
            $this->EditDate->EditAttrs["class"] = "form-control";
            $this->EditDate->EditCustomAttributes = "";
            $this->EditDate->EditValue = HtmlEncode(FormatDateTime($this->EditDate->CurrentValue, 8));
            $this->EditDate->PlaceHolder = RemoveHtml($this->EditDate->caption());

            // SMS
            $this->SMS->EditAttrs["class"] = "form-control";
            $this->SMS->EditCustomAttributes = "";
            if (!$this->SMS->Raw) {
                $this->SMS->CurrentValue = HtmlDecode($this->SMS->CurrentValue);
            }
            $this->SMS->EditValue = HtmlEncode($this->SMS->CurrentValue);
            $this->SMS->PlaceHolder = RemoveHtml($this->SMS->caption());

            // Note
            $this->Note->EditAttrs["class"] = "form-control";
            $this->Note->EditCustomAttributes = "";
            $this->Note->EditValue = HtmlEncode($this->Note->CurrentValue);
            $this->Note->PlaceHolder = RemoveHtml($this->Note->caption());

            // WorkList
            $this->WorkList->EditAttrs["class"] = "form-control";
            $this->WorkList->EditCustomAttributes = "";
            if (!$this->WorkList->Raw) {
                $this->WorkList->CurrentValue = HtmlDecode($this->WorkList->CurrentValue);
            }
            $this->WorkList->EditValue = HtmlEncode($this->WorkList->CurrentValue);
            $this->WorkList->PlaceHolder = RemoveHtml($this->WorkList->caption());

            // Page
            $this->_Page->EditAttrs["class"] = "form-control";
            $this->_Page->EditCustomAttributes = "";
            $this->_Page->EditValue = HtmlEncode($this->_Page->CurrentValue);
            $this->_Page->PlaceHolder = RemoveHtml($this->_Page->caption());
            if (strval($this->_Page->EditValue) != "" && is_numeric($this->_Page->EditValue)) {
                $this->_Page->EditValue = FormatNumber($this->_Page->EditValue, -2, -2, -2, -2);
            }

            // Incharge
            $this->Incharge->EditAttrs["class"] = "form-control";
            $this->Incharge->EditCustomAttributes = "";
            if (!$this->Incharge->Raw) {
                $this->Incharge->CurrentValue = HtmlDecode($this->Incharge->CurrentValue);
            }
            $this->Incharge->EditValue = HtmlEncode($this->Incharge->CurrentValue);
            $this->Incharge->PlaceHolder = RemoveHtml($this->Incharge->caption());

            // AutoNum
            $this->AutoNum->EditAttrs["class"] = "form-control";
            $this->AutoNum->EditCustomAttributes = "";
            if (!$this->AutoNum->Raw) {
                $this->AutoNum->CurrentValue = HtmlDecode($this->AutoNum->CurrentValue);
            }
            $this->AutoNum->EditValue = HtmlEncode($this->AutoNum->CurrentValue);
            $this->AutoNum->PlaceHolder = RemoveHtml($this->AutoNum->caption());

            // Add refer script

            // MainCD
            $this->MainCD->LinkCustomAttributes = "";
            $this->MainCD->HrefValue = "";

            // Code
            $this->Code->LinkCustomAttributes = "";
            $this->Code->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Order
            $this->Order->LinkCustomAttributes = "";
            $this->Order->HrefValue = "";

            // SignCD
            $this->SignCD->LinkCustomAttributes = "";
            $this->SignCD->HrefValue = "";

            // Collection
            $this->Collection->LinkCustomAttributes = "";
            $this->Collection->HrefValue = "";

            // EditDate
            $this->EditDate->LinkCustomAttributes = "";
            $this->EditDate->HrefValue = "";

            // SMS
            $this->SMS->LinkCustomAttributes = "";
            $this->SMS->HrefValue = "";

            // Note
            $this->Note->LinkCustomAttributes = "";
            $this->Note->HrefValue = "";

            // WorkList
            $this->WorkList->LinkCustomAttributes = "";
            $this->WorkList->HrefValue = "";

            // Page
            $this->_Page->LinkCustomAttributes = "";
            $this->_Page->HrefValue = "";

            // Incharge
            $this->Incharge->LinkCustomAttributes = "";
            $this->Incharge->HrefValue = "";

            // AutoNum
            $this->AutoNum->LinkCustomAttributes = "";
            $this->AutoNum->HrefValue = "";
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
        if ($this->MainCD->Required) {
            if (!$this->MainCD->IsDetailKey && EmptyValue($this->MainCD->FormValue)) {
                $this->MainCD->addErrorMessage(str_replace("%s", $this->MainCD->caption(), $this->MainCD->RequiredErrorMessage));
            }
        }
        if ($this->Code->Required) {
            if (!$this->Code->IsDetailKey && EmptyValue($this->Code->FormValue)) {
                $this->Code->addErrorMessage(str_replace("%s", $this->Code->caption(), $this->Code->RequiredErrorMessage));
            }
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Order->Required) {
            if (!$this->Order->IsDetailKey && EmptyValue($this->Order->FormValue)) {
                $this->Order->addErrorMessage(str_replace("%s", $this->Order->caption(), $this->Order->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Order->FormValue)) {
            $this->Order->addErrorMessage($this->Order->getErrorMessage(false));
        }
        if ($this->SignCD->Required) {
            if (!$this->SignCD->IsDetailKey && EmptyValue($this->SignCD->FormValue)) {
                $this->SignCD->addErrorMessage(str_replace("%s", $this->SignCD->caption(), $this->SignCD->RequiredErrorMessage));
            }
        }
        if ($this->Collection->Required) {
            if (!$this->Collection->IsDetailKey && EmptyValue($this->Collection->FormValue)) {
                $this->Collection->addErrorMessage(str_replace("%s", $this->Collection->caption(), $this->Collection->RequiredErrorMessage));
            }
        }
        if ($this->EditDate->Required) {
            if (!$this->EditDate->IsDetailKey && EmptyValue($this->EditDate->FormValue)) {
                $this->EditDate->addErrorMessage(str_replace("%s", $this->EditDate->caption(), $this->EditDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->EditDate->FormValue)) {
            $this->EditDate->addErrorMessage($this->EditDate->getErrorMessage(false));
        }
        if ($this->SMS->Required) {
            if (!$this->SMS->IsDetailKey && EmptyValue($this->SMS->FormValue)) {
                $this->SMS->addErrorMessage(str_replace("%s", $this->SMS->caption(), $this->SMS->RequiredErrorMessage));
            }
        }
        if ($this->Note->Required) {
            if (!$this->Note->IsDetailKey && EmptyValue($this->Note->FormValue)) {
                $this->Note->addErrorMessage(str_replace("%s", $this->Note->caption(), $this->Note->RequiredErrorMessage));
            }
        }
        if ($this->WorkList->Required) {
            if (!$this->WorkList->IsDetailKey && EmptyValue($this->WorkList->FormValue)) {
                $this->WorkList->addErrorMessage(str_replace("%s", $this->WorkList->caption(), $this->WorkList->RequiredErrorMessage));
            }
        }
        if ($this->_Page->Required) {
            if (!$this->_Page->IsDetailKey && EmptyValue($this->_Page->FormValue)) {
                $this->_Page->addErrorMessage(str_replace("%s", $this->_Page->caption(), $this->_Page->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->_Page->FormValue)) {
            $this->_Page->addErrorMessage($this->_Page->getErrorMessage(false));
        }
        if ($this->Incharge->Required) {
            if (!$this->Incharge->IsDetailKey && EmptyValue($this->Incharge->FormValue)) {
                $this->Incharge->addErrorMessage(str_replace("%s", $this->Incharge->caption(), $this->Incharge->RequiredErrorMessage));
            }
        }
        if ($this->AutoNum->Required) {
            if (!$this->AutoNum->IsDetailKey && EmptyValue($this->AutoNum->FormValue)) {
                $this->AutoNum->addErrorMessage(str_replace("%s", $this->AutoNum->caption(), $this->AutoNum->RequiredErrorMessage));
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

        // MainCD
        $this->MainCD->setDbValueDef($rsnew, $this->MainCD->CurrentValue, "", false);

        // Code
        $this->Code->setDbValueDef($rsnew, $this->Code->CurrentValue, "", false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, "", false);

        // Order
        $this->Order->setDbValueDef($rsnew, $this->Order->CurrentValue, 0, false);

        // SignCD
        $this->SignCD->setDbValueDef($rsnew, $this->SignCD->CurrentValue, "", false);

        // Collection
        $this->Collection->setDbValueDef($rsnew, $this->Collection->CurrentValue, "", false);

        // EditDate
        $this->EditDate->setDbValueDef($rsnew, UnFormatDateTime($this->EditDate->CurrentValue, 0), null, false);

        // SMS
        $this->SMS->setDbValueDef($rsnew, $this->SMS->CurrentValue, "", false);

        // Note
        $this->Note->setDbValueDef($rsnew, $this->Note->CurrentValue, "", false);

        // WorkList
        $this->WorkList->setDbValueDef($rsnew, $this->WorkList->CurrentValue, "", false);

        // Page
        $this->_Page->setDbValueDef($rsnew, $this->_Page->CurrentValue, 0, false);

        // Incharge
        $this->Incharge->setDbValueDef($rsnew, $this->Incharge->CurrentValue, "", false);

        // AutoNum
        $this->AutoNum->setDbValueDef($rsnew, $this->AutoNum->CurrentValue, "", false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("LabDeptMastList"), "", $this->TableVar, true);
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
