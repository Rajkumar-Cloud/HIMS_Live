<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresFluidformulationAdd extends PresFluidformulation
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_fluidformulation';

    // Page object name
    public $PageObjName = "PresFluidformulationAdd";

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

        // Table object (pres_fluidformulation)
        if (!isset($GLOBALS["pres_fluidformulation"]) || get_class($GLOBALS["pres_fluidformulation"]) == PROJECT_NAMESPACE . "pres_fluidformulation") {
            $GLOBALS["pres_fluidformulation"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_fluidformulation');
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
                $doc = new $class(Container("pres_fluidformulation"));
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
                    if ($pageName == "PresFluidformulationView") {
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
        $this->Tradename->setVisibility();
        $this->Itemcode->setVisibility();
        $this->Genericname->setVisibility();
        $this->Volume->setVisibility();
        $this->VolumeUnit->setVisibility();
        $this->Strength->setVisibility();
        $this->StrengthUnit->setVisibility();
        $this->_Route->setVisibility();
        $this->Forms->setVisibility();
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
                    $this->terminate("PresFluidformulationList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PresFluidformulationList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PresFluidformulationView") {
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
        $this->Tradename->CurrentValue = null;
        $this->Tradename->OldValue = $this->Tradename->CurrentValue;
        $this->Itemcode->CurrentValue = null;
        $this->Itemcode->OldValue = $this->Itemcode->CurrentValue;
        $this->Genericname->CurrentValue = null;
        $this->Genericname->OldValue = $this->Genericname->CurrentValue;
        $this->Volume->CurrentValue = null;
        $this->Volume->OldValue = $this->Volume->CurrentValue;
        $this->VolumeUnit->CurrentValue = null;
        $this->VolumeUnit->OldValue = $this->VolumeUnit->CurrentValue;
        $this->Strength->CurrentValue = null;
        $this->Strength->OldValue = $this->Strength->CurrentValue;
        $this->StrengthUnit->CurrentValue = null;
        $this->StrengthUnit->OldValue = $this->StrengthUnit->CurrentValue;
        $this->_Route->CurrentValue = null;
        $this->_Route->OldValue = $this->_Route->CurrentValue;
        $this->Forms->CurrentValue = null;
        $this->Forms->OldValue = $this->Forms->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Tradename' first before field var 'x_Tradename'
        $val = $CurrentForm->hasValue("Tradename") ? $CurrentForm->getValue("Tradename") : $CurrentForm->getValue("x_Tradename");
        if (!$this->Tradename->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tradename->Visible = false; // Disable update for API request
            } else {
                $this->Tradename->setFormValue($val);
            }
        }

        // Check field name 'Itemcode' first before field var 'x_Itemcode'
        $val = $CurrentForm->hasValue("Itemcode") ? $CurrentForm->getValue("Itemcode") : $CurrentForm->getValue("x_Itemcode");
        if (!$this->Itemcode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Itemcode->Visible = false; // Disable update for API request
            } else {
                $this->Itemcode->setFormValue($val);
            }
        }

        // Check field name 'Genericname' first before field var 'x_Genericname'
        $val = $CurrentForm->hasValue("Genericname") ? $CurrentForm->getValue("Genericname") : $CurrentForm->getValue("x_Genericname");
        if (!$this->Genericname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Genericname->Visible = false; // Disable update for API request
            } else {
                $this->Genericname->setFormValue($val);
            }
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }

        // Check field name 'VolumeUnit' first before field var 'x_VolumeUnit'
        $val = $CurrentForm->hasValue("VolumeUnit") ? $CurrentForm->getValue("VolumeUnit") : $CurrentForm->getValue("x_VolumeUnit");
        if (!$this->VolumeUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VolumeUnit->Visible = false; // Disable update for API request
            } else {
                $this->VolumeUnit->setFormValue($val);
            }
        }

        // Check field name 'Strength' first before field var 'x_Strength'
        $val = $CurrentForm->hasValue("Strength") ? $CurrentForm->getValue("Strength") : $CurrentForm->getValue("x_Strength");
        if (!$this->Strength->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Strength->Visible = false; // Disable update for API request
            } else {
                $this->Strength->setFormValue($val);
            }
        }

        // Check field name 'StrengthUnit' first before field var 'x_StrengthUnit'
        $val = $CurrentForm->hasValue("StrengthUnit") ? $CurrentForm->getValue("StrengthUnit") : $CurrentForm->getValue("x_StrengthUnit");
        if (!$this->StrengthUnit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StrengthUnit->Visible = false; // Disable update for API request
            } else {
                $this->StrengthUnit->setFormValue($val);
            }
        }

        // Check field name 'Route' first before field var 'x__Route'
        $val = $CurrentForm->hasValue("Route") ? $CurrentForm->getValue("Route") : $CurrentForm->getValue("x__Route");
        if (!$this->_Route->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Route->Visible = false; // Disable update for API request
            } else {
                $this->_Route->setFormValue($val);
            }
        }

        // Check field name 'Forms' first before field var 'x_Forms'
        $val = $CurrentForm->hasValue("Forms") ? $CurrentForm->getValue("Forms") : $CurrentForm->getValue("x_Forms");
        if (!$this->Forms->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Forms->Visible = false; // Disable update for API request
            } else {
                $this->Forms->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Tradename->CurrentValue = $this->Tradename->FormValue;
        $this->Itemcode->CurrentValue = $this->Itemcode->FormValue;
        $this->Genericname->CurrentValue = $this->Genericname->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->VolumeUnit->CurrentValue = $this->VolumeUnit->FormValue;
        $this->Strength->CurrentValue = $this->Strength->FormValue;
        $this->StrengthUnit->CurrentValue = $this->StrengthUnit->FormValue;
        $this->_Route->CurrentValue = $this->_Route->FormValue;
        $this->Forms->CurrentValue = $this->Forms->FormValue;
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
        $this->Tradename->setDbValue($row['Tradename']);
        $this->Itemcode->setDbValue($row['Itemcode']);
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Volume->setDbValue($row['Volume']);
        $this->VolumeUnit->setDbValue($row['VolumeUnit']);
        $this->Strength->setDbValue($row['Strength']);
        $this->StrengthUnit->setDbValue($row['StrengthUnit']);
        $this->_Route->setDbValue($row['Route']);
        $this->Forms->setDbValue($row['Forms']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Tradename'] = $this->Tradename->CurrentValue;
        $row['Itemcode'] = $this->Itemcode->CurrentValue;
        $row['Genericname'] = $this->Genericname->CurrentValue;
        $row['Volume'] = $this->Volume->CurrentValue;
        $row['VolumeUnit'] = $this->VolumeUnit->CurrentValue;
        $row['Strength'] = $this->Strength->CurrentValue;
        $row['StrengthUnit'] = $this->StrengthUnit->CurrentValue;
        $row['Route'] = $this->_Route->CurrentValue;
        $row['Forms'] = $this->Forms->CurrentValue;
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
        if ($this->Volume->FormValue == $this->Volume->CurrentValue && is_numeric(ConvertToFloatString($this->Volume->CurrentValue))) {
            $this->Volume->CurrentValue = ConvertToFloatString($this->Volume->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Strength->FormValue == $this->Strength->CurrentValue && is_numeric(ConvertToFloatString($this->Strength->CurrentValue))) {
            $this->Strength->CurrentValue = ConvertToFloatString($this->Strength->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Tradename

        // Itemcode

        // Genericname

        // Volume

        // VolumeUnit

        // Strength

        // StrengthUnit

        // Route

        // Forms
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Tradename
            $this->Tradename->ViewValue = $this->Tradename->CurrentValue;
            $this->Tradename->ViewCustomAttributes = "";

            // Itemcode
            $this->Itemcode->ViewValue = $this->Itemcode->CurrentValue;
            $this->Itemcode->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
            $this->Genericname->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewValue = FormatNumber($this->Volume->ViewValue, 2, -2, -2, -2);
            $this->Volume->ViewCustomAttributes = "";

            // VolumeUnit
            $this->VolumeUnit->ViewValue = $this->VolumeUnit->CurrentValue;
            $this->VolumeUnit->ViewCustomAttributes = "";

            // Strength
            $this->Strength->ViewValue = $this->Strength->CurrentValue;
            $this->Strength->ViewValue = FormatNumber($this->Strength->ViewValue, 2, -2, -2, -2);
            $this->Strength->ViewCustomAttributes = "";

            // StrengthUnit
            $this->StrengthUnit->ViewValue = $this->StrengthUnit->CurrentValue;
            $this->StrengthUnit->ViewCustomAttributes = "";

            // Route
            $this->_Route->ViewValue = $this->_Route->CurrentValue;
            $this->_Route->ViewCustomAttributes = "";

            // Forms
            $this->Forms->ViewValue = $this->Forms->CurrentValue;
            $this->Forms->ViewCustomAttributes = "";

            // Tradename
            $this->Tradename->LinkCustomAttributes = "";
            $this->Tradename->HrefValue = "";
            $this->Tradename->TooltipValue = "";

            // Itemcode
            $this->Itemcode->LinkCustomAttributes = "";
            $this->Itemcode->HrefValue = "";
            $this->Itemcode->TooltipValue = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";
            $this->Genericname->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // VolumeUnit
            $this->VolumeUnit->LinkCustomAttributes = "";
            $this->VolumeUnit->HrefValue = "";
            $this->VolumeUnit->TooltipValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";
            $this->Strength->TooltipValue = "";

            // StrengthUnit
            $this->StrengthUnit->LinkCustomAttributes = "";
            $this->StrengthUnit->HrefValue = "";
            $this->StrengthUnit->TooltipValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";
            $this->_Route->TooltipValue = "";

            // Forms
            $this->Forms->LinkCustomAttributes = "";
            $this->Forms->HrefValue = "";
            $this->Forms->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Tradename
            $this->Tradename->EditAttrs["class"] = "form-control";
            $this->Tradename->EditCustomAttributes = "";
            $this->Tradename->EditValue = HtmlEncode($this->Tradename->CurrentValue);
            $this->Tradename->PlaceHolder = RemoveHtml($this->Tradename->caption());

            // Itemcode
            $this->Itemcode->EditAttrs["class"] = "form-control";
            $this->Itemcode->EditCustomAttributes = "";
            if (!$this->Itemcode->Raw) {
                $this->Itemcode->CurrentValue = HtmlDecode($this->Itemcode->CurrentValue);
            }
            $this->Itemcode->EditValue = HtmlEncode($this->Itemcode->CurrentValue);
            $this->Itemcode->PlaceHolder = RemoveHtml($this->Itemcode->caption());

            // Genericname
            $this->Genericname->EditAttrs["class"] = "form-control";
            $this->Genericname->EditCustomAttributes = "";
            if (!$this->Genericname->Raw) {
                $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
            }
            $this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
            $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());
            if (strval($this->Volume->EditValue) != "" && is_numeric($this->Volume->EditValue)) {
                $this->Volume->EditValue = FormatNumber($this->Volume->EditValue, -2, -2, -2, -2);
            }

            // VolumeUnit
            $this->VolumeUnit->EditAttrs["class"] = "form-control";
            $this->VolumeUnit->EditCustomAttributes = "";
            if (!$this->VolumeUnit->Raw) {
                $this->VolumeUnit->CurrentValue = HtmlDecode($this->VolumeUnit->CurrentValue);
            }
            $this->VolumeUnit->EditValue = HtmlEncode($this->VolumeUnit->CurrentValue);
            $this->VolumeUnit->PlaceHolder = RemoveHtml($this->VolumeUnit->caption());

            // Strength
            $this->Strength->EditAttrs["class"] = "form-control";
            $this->Strength->EditCustomAttributes = "";
            $this->Strength->EditValue = HtmlEncode($this->Strength->CurrentValue);
            $this->Strength->PlaceHolder = RemoveHtml($this->Strength->caption());
            if (strval($this->Strength->EditValue) != "" && is_numeric($this->Strength->EditValue)) {
                $this->Strength->EditValue = FormatNumber($this->Strength->EditValue, -2, -2, -2, -2);
            }

            // StrengthUnit
            $this->StrengthUnit->EditAttrs["class"] = "form-control";
            $this->StrengthUnit->EditCustomAttributes = "";
            if (!$this->StrengthUnit->Raw) {
                $this->StrengthUnit->CurrentValue = HtmlDecode($this->StrengthUnit->CurrentValue);
            }
            $this->StrengthUnit->EditValue = HtmlEncode($this->StrengthUnit->CurrentValue);
            $this->StrengthUnit->PlaceHolder = RemoveHtml($this->StrengthUnit->caption());

            // Route
            $this->_Route->EditAttrs["class"] = "form-control";
            $this->_Route->EditCustomAttributes = "";
            if (!$this->_Route->Raw) {
                $this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
            }
            $this->_Route->EditValue = HtmlEncode($this->_Route->CurrentValue);
            $this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

            // Forms
            $this->Forms->EditAttrs["class"] = "form-control";
            $this->Forms->EditCustomAttributes = "";
            if (!$this->Forms->Raw) {
                $this->Forms->CurrentValue = HtmlDecode($this->Forms->CurrentValue);
            }
            $this->Forms->EditValue = HtmlEncode($this->Forms->CurrentValue);
            $this->Forms->PlaceHolder = RemoveHtml($this->Forms->caption());

            // Add refer script

            // Tradename
            $this->Tradename->LinkCustomAttributes = "";
            $this->Tradename->HrefValue = "";

            // Itemcode
            $this->Itemcode->LinkCustomAttributes = "";
            $this->Itemcode->HrefValue = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // VolumeUnit
            $this->VolumeUnit->LinkCustomAttributes = "";
            $this->VolumeUnit->HrefValue = "";

            // Strength
            $this->Strength->LinkCustomAttributes = "";
            $this->Strength->HrefValue = "";

            // StrengthUnit
            $this->StrengthUnit->LinkCustomAttributes = "";
            $this->StrengthUnit->HrefValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";

            // Forms
            $this->Forms->LinkCustomAttributes = "";
            $this->Forms->HrefValue = "";
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
        if ($this->Tradename->Required) {
            if (!$this->Tradename->IsDetailKey && EmptyValue($this->Tradename->FormValue)) {
                $this->Tradename->addErrorMessage(str_replace("%s", $this->Tradename->caption(), $this->Tradename->RequiredErrorMessage));
            }
        }
        if ($this->Itemcode->Required) {
            if (!$this->Itemcode->IsDetailKey && EmptyValue($this->Itemcode->FormValue)) {
                $this->Itemcode->addErrorMessage(str_replace("%s", $this->Itemcode->caption(), $this->Itemcode->RequiredErrorMessage));
            }
        }
        if ($this->Genericname->Required) {
            if (!$this->Genericname->IsDetailKey && EmptyValue($this->Genericname->FormValue)) {
                $this->Genericname->addErrorMessage(str_replace("%s", $this->Genericname->caption(), $this->Genericname->RequiredErrorMessage));
            }
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Volume->FormValue)) {
            $this->Volume->addErrorMessage($this->Volume->getErrorMessage(false));
        }
        if ($this->VolumeUnit->Required) {
            if (!$this->VolumeUnit->IsDetailKey && EmptyValue($this->VolumeUnit->FormValue)) {
                $this->VolumeUnit->addErrorMessage(str_replace("%s", $this->VolumeUnit->caption(), $this->VolumeUnit->RequiredErrorMessage));
            }
        }
        if ($this->Strength->Required) {
            if (!$this->Strength->IsDetailKey && EmptyValue($this->Strength->FormValue)) {
                $this->Strength->addErrorMessage(str_replace("%s", $this->Strength->caption(), $this->Strength->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Strength->FormValue)) {
            $this->Strength->addErrorMessage($this->Strength->getErrorMessage(false));
        }
        if ($this->StrengthUnit->Required) {
            if (!$this->StrengthUnit->IsDetailKey && EmptyValue($this->StrengthUnit->FormValue)) {
                $this->StrengthUnit->addErrorMessage(str_replace("%s", $this->StrengthUnit->caption(), $this->StrengthUnit->RequiredErrorMessage));
            }
        }
        if ($this->_Route->Required) {
            if (!$this->_Route->IsDetailKey && EmptyValue($this->_Route->FormValue)) {
                $this->_Route->addErrorMessage(str_replace("%s", $this->_Route->caption(), $this->_Route->RequiredErrorMessage));
            }
        }
        if ($this->Forms->Required) {
            if (!$this->Forms->IsDetailKey && EmptyValue($this->Forms->FormValue)) {
                $this->Forms->addErrorMessage(str_replace("%s", $this->Forms->caption(), $this->Forms->RequiredErrorMessage));
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

        // Tradename
        $this->Tradename->setDbValueDef($rsnew, $this->Tradename->CurrentValue, null, false);

        // Itemcode
        $this->Itemcode->setDbValueDef($rsnew, $this->Itemcode->CurrentValue, null, false);

        // Genericname
        $this->Genericname->setDbValueDef($rsnew, $this->Genericname->CurrentValue, null, false);

        // Volume
        $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, false);

        // VolumeUnit
        $this->VolumeUnit->setDbValueDef($rsnew, $this->VolumeUnit->CurrentValue, null, false);

        // Strength
        $this->Strength->setDbValueDef($rsnew, $this->Strength->CurrentValue, null, false);

        // StrengthUnit
        $this->StrengthUnit->setDbValueDef($rsnew, $this->StrengthUnit->CurrentValue, null, false);

        // Route
        $this->_Route->setDbValueDef($rsnew, $this->_Route->CurrentValue, null, false);

        // Forms
        $this->Forms->setDbValueDef($rsnew, $this->Forms->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresFluidformulationList"), "", $this->TableVar, true);
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
