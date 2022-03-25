<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PresIndicationstableAdd extends PresIndicationstable
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pres_indicationstable';

    // Page object name
    public $PageObjName = "PresIndicationstableAdd";

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

        // Table object (pres_indicationstable)
        if (!isset($GLOBALS["pres_indicationstable"]) || get_class($GLOBALS["pres_indicationstable"]) == PROJECT_NAMESPACE . "pres_indicationstable") {
            $GLOBALS["pres_indicationstable"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pres_indicationstable');
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
                $doc = new $class(Container("pres_indicationstable"));
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
                    if ($pageName == "PresIndicationstableView") {
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
            $key .= @$ar['Sno'];
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
            $this->Sno->Visible = false;
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
        $this->Sno->Visible = false;
        $this->Genericname->setVisibility();
        $this->Indications->setVisibility();
        $this->Category->setVisibility();
        $this->Min_Age->setVisibility();
        $this->Min_Days->setVisibility();
        $this->Max_Age->setVisibility();
        $this->Max_Days->setVisibility();
        $this->_Route->setVisibility();
        $this->Form->setVisibility();
        $this->Min_Dose_Val->setVisibility();
        $this->Min_Dose_Unit->setVisibility();
        $this->Max_Dose_Val->setVisibility();
        $this->Max_Dose_Unit->setVisibility();
        $this->Frequency->setVisibility();
        $this->Duration->setVisibility();
        $this->DWMY->setVisibility();
        $this->Contraindications->setVisibility();
        $this->RecStatus->setVisibility();
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
            if (($keyValue = Get("Sno") ?? Route("Sno")) !== null) {
                $this->Sno->setQueryStringValue($keyValue);
                $this->setKey("Sno", $this->Sno->CurrentValue); // Set up key
            } else {
                $this->setKey("Sno", ""); // Clear key
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
                    $this->terminate("PresIndicationstableList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PresIndicationstableList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PresIndicationstableView") {
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
        $this->Sno->CurrentValue = null;
        $this->Sno->OldValue = $this->Sno->CurrentValue;
        $this->Genericname->CurrentValue = null;
        $this->Genericname->OldValue = $this->Genericname->CurrentValue;
        $this->Indications->CurrentValue = null;
        $this->Indications->OldValue = $this->Indications->CurrentValue;
        $this->Category->CurrentValue = null;
        $this->Category->OldValue = $this->Category->CurrentValue;
        $this->Min_Age->CurrentValue = null;
        $this->Min_Age->OldValue = $this->Min_Age->CurrentValue;
        $this->Min_Days->CurrentValue = null;
        $this->Min_Days->OldValue = $this->Min_Days->CurrentValue;
        $this->Max_Age->CurrentValue = null;
        $this->Max_Age->OldValue = $this->Max_Age->CurrentValue;
        $this->Max_Days->CurrentValue = null;
        $this->Max_Days->OldValue = $this->Max_Days->CurrentValue;
        $this->_Route->CurrentValue = null;
        $this->_Route->OldValue = $this->_Route->CurrentValue;
        $this->Form->CurrentValue = null;
        $this->Form->OldValue = $this->Form->CurrentValue;
        $this->Min_Dose_Val->CurrentValue = null;
        $this->Min_Dose_Val->OldValue = $this->Min_Dose_Val->CurrentValue;
        $this->Min_Dose_Unit->CurrentValue = null;
        $this->Min_Dose_Unit->OldValue = $this->Min_Dose_Unit->CurrentValue;
        $this->Max_Dose_Val->CurrentValue = null;
        $this->Max_Dose_Val->OldValue = $this->Max_Dose_Val->CurrentValue;
        $this->Max_Dose_Unit->CurrentValue = null;
        $this->Max_Dose_Unit->OldValue = $this->Max_Dose_Unit->CurrentValue;
        $this->Frequency->CurrentValue = null;
        $this->Frequency->OldValue = $this->Frequency->CurrentValue;
        $this->Duration->CurrentValue = null;
        $this->Duration->OldValue = $this->Duration->CurrentValue;
        $this->DWMY->CurrentValue = null;
        $this->DWMY->OldValue = $this->DWMY->CurrentValue;
        $this->Contraindications->CurrentValue = null;
        $this->Contraindications->OldValue = $this->Contraindications->CurrentValue;
        $this->RecStatus->CurrentValue = null;
        $this->RecStatus->OldValue = $this->RecStatus->CurrentValue;
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

        // Check field name 'Indications' first before field var 'x_Indications'
        $val = $CurrentForm->hasValue("Indications") ? $CurrentForm->getValue("Indications") : $CurrentForm->getValue("x_Indications");
        if (!$this->Indications->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Indications->Visible = false; // Disable update for API request
            } else {
                $this->Indications->setFormValue($val);
            }
        }

        // Check field name 'Category' first before field var 'x_Category'
        $val = $CurrentForm->hasValue("Category") ? $CurrentForm->getValue("Category") : $CurrentForm->getValue("x_Category");
        if (!$this->Category->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Category->Visible = false; // Disable update for API request
            } else {
                $this->Category->setFormValue($val);
            }
        }

        // Check field name 'Min_Age' first before field var 'x_Min_Age'
        $val = $CurrentForm->hasValue("Min_Age") ? $CurrentForm->getValue("Min_Age") : $CurrentForm->getValue("x_Min_Age");
        if (!$this->Min_Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Min_Age->Visible = false; // Disable update for API request
            } else {
                $this->Min_Age->setFormValue($val);
            }
        }

        // Check field name 'Min_Days' first before field var 'x_Min_Days'
        $val = $CurrentForm->hasValue("Min_Days") ? $CurrentForm->getValue("Min_Days") : $CurrentForm->getValue("x_Min_Days");
        if (!$this->Min_Days->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Min_Days->Visible = false; // Disable update for API request
            } else {
                $this->Min_Days->setFormValue($val);
            }
        }

        // Check field name 'Max_Age' first before field var 'x_Max_Age'
        $val = $CurrentForm->hasValue("Max_Age") ? $CurrentForm->getValue("Max_Age") : $CurrentForm->getValue("x_Max_Age");
        if (!$this->Max_Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Max_Age->Visible = false; // Disable update for API request
            } else {
                $this->Max_Age->setFormValue($val);
            }
        }

        // Check field name 'Max_Days' first before field var 'x_Max_Days'
        $val = $CurrentForm->hasValue("Max_Days") ? $CurrentForm->getValue("Max_Days") : $CurrentForm->getValue("x_Max_Days");
        if (!$this->Max_Days->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Max_Days->Visible = false; // Disable update for API request
            } else {
                $this->Max_Days->setFormValue($val);
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

        // Check field name 'Form' first before field var 'x_Form'
        $val = $CurrentForm->hasValue("Form") ? $CurrentForm->getValue("Form") : $CurrentForm->getValue("x_Form");
        if (!$this->Form->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Form->Visible = false; // Disable update for API request
            } else {
                $this->Form->setFormValue($val);
            }
        }

        // Check field name 'Min_Dose_Val' first before field var 'x_Min_Dose_Val'
        $val = $CurrentForm->hasValue("Min_Dose_Val") ? $CurrentForm->getValue("Min_Dose_Val") : $CurrentForm->getValue("x_Min_Dose_Val");
        if (!$this->Min_Dose_Val->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Min_Dose_Val->Visible = false; // Disable update for API request
            } else {
                $this->Min_Dose_Val->setFormValue($val);
            }
        }

        // Check field name 'Min_Dose_Unit' first before field var 'x_Min_Dose_Unit'
        $val = $CurrentForm->hasValue("Min_Dose_Unit") ? $CurrentForm->getValue("Min_Dose_Unit") : $CurrentForm->getValue("x_Min_Dose_Unit");
        if (!$this->Min_Dose_Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Min_Dose_Unit->Visible = false; // Disable update for API request
            } else {
                $this->Min_Dose_Unit->setFormValue($val);
            }
        }

        // Check field name 'Max_Dose_Val' first before field var 'x_Max_Dose_Val'
        $val = $CurrentForm->hasValue("Max_Dose_Val") ? $CurrentForm->getValue("Max_Dose_Val") : $CurrentForm->getValue("x_Max_Dose_Val");
        if (!$this->Max_Dose_Val->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Max_Dose_Val->Visible = false; // Disable update for API request
            } else {
                $this->Max_Dose_Val->setFormValue($val);
            }
        }

        // Check field name 'Max_Dose_Unit' first before field var 'x_Max_Dose_Unit'
        $val = $CurrentForm->hasValue("Max_Dose_Unit") ? $CurrentForm->getValue("Max_Dose_Unit") : $CurrentForm->getValue("x_Max_Dose_Unit");
        if (!$this->Max_Dose_Unit->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Max_Dose_Unit->Visible = false; // Disable update for API request
            } else {
                $this->Max_Dose_Unit->setFormValue($val);
            }
        }

        // Check field name 'Frequency' first before field var 'x_Frequency'
        $val = $CurrentForm->hasValue("Frequency") ? $CurrentForm->getValue("Frequency") : $CurrentForm->getValue("x_Frequency");
        if (!$this->Frequency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Frequency->Visible = false; // Disable update for API request
            } else {
                $this->Frequency->setFormValue($val);
            }
        }

        // Check field name 'Duration' first before field var 'x_Duration'
        $val = $CurrentForm->hasValue("Duration") ? $CurrentForm->getValue("Duration") : $CurrentForm->getValue("x_Duration");
        if (!$this->Duration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Duration->Visible = false; // Disable update for API request
            } else {
                $this->Duration->setFormValue($val);
            }
        }

        // Check field name 'DWMY' first before field var 'x_DWMY'
        $val = $CurrentForm->hasValue("DWMY") ? $CurrentForm->getValue("DWMY") : $CurrentForm->getValue("x_DWMY");
        if (!$this->DWMY->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DWMY->Visible = false; // Disable update for API request
            } else {
                $this->DWMY->setFormValue($val);
            }
        }

        // Check field name 'Contraindications' first before field var 'x_Contraindications'
        $val = $CurrentForm->hasValue("Contraindications") ? $CurrentForm->getValue("Contraindications") : $CurrentForm->getValue("x_Contraindications");
        if (!$this->Contraindications->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Contraindications->Visible = false; // Disable update for API request
            } else {
                $this->Contraindications->setFormValue($val);
            }
        }

        // Check field name 'RecStatus' first before field var 'x_RecStatus'
        $val = $CurrentForm->hasValue("RecStatus") ? $CurrentForm->getValue("RecStatus") : $CurrentForm->getValue("x_RecStatus");
        if (!$this->RecStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecStatus->Visible = false; // Disable update for API request
            } else {
                $this->RecStatus->setFormValue($val);
            }
        }

        // Check field name 'Sno' first before field var 'x_Sno'
        $val = $CurrentForm->hasValue("Sno") ? $CurrentForm->getValue("Sno") : $CurrentForm->getValue("x_Sno");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Genericname->CurrentValue = $this->Genericname->FormValue;
        $this->Indications->CurrentValue = $this->Indications->FormValue;
        $this->Category->CurrentValue = $this->Category->FormValue;
        $this->Min_Age->CurrentValue = $this->Min_Age->FormValue;
        $this->Min_Days->CurrentValue = $this->Min_Days->FormValue;
        $this->Max_Age->CurrentValue = $this->Max_Age->FormValue;
        $this->Max_Days->CurrentValue = $this->Max_Days->FormValue;
        $this->_Route->CurrentValue = $this->_Route->FormValue;
        $this->Form->CurrentValue = $this->Form->FormValue;
        $this->Min_Dose_Val->CurrentValue = $this->Min_Dose_Val->FormValue;
        $this->Min_Dose_Unit->CurrentValue = $this->Min_Dose_Unit->FormValue;
        $this->Max_Dose_Val->CurrentValue = $this->Max_Dose_Val->FormValue;
        $this->Max_Dose_Unit->CurrentValue = $this->Max_Dose_Unit->FormValue;
        $this->Frequency->CurrentValue = $this->Frequency->FormValue;
        $this->Duration->CurrentValue = $this->Duration->FormValue;
        $this->DWMY->CurrentValue = $this->DWMY->FormValue;
        $this->Contraindications->CurrentValue = $this->Contraindications->FormValue;
        $this->RecStatus->CurrentValue = $this->RecStatus->FormValue;
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
        $this->Sno->setDbValue($row['Sno']);
        $this->Genericname->setDbValue($row['Genericname']);
        $this->Indications->setDbValue($row['Indications']);
        $this->Category->setDbValue($row['Category']);
        $this->Min_Age->setDbValue($row['Min_Age']);
        $this->Min_Days->setDbValue($row['Min_Days']);
        $this->Max_Age->setDbValue($row['Max_Age']);
        $this->Max_Days->setDbValue($row['Max_Days']);
        $this->_Route->setDbValue($row['Route']);
        $this->Form->setDbValue($row['Form']);
        $this->Min_Dose_Val->setDbValue($row['Min_Dose_Val']);
        $this->Min_Dose_Unit->setDbValue($row['Min_Dose_Unit']);
        $this->Max_Dose_Val->setDbValue($row['Max_Dose_Val']);
        $this->Max_Dose_Unit->setDbValue($row['Max_Dose_Unit']);
        $this->Frequency->setDbValue($row['Frequency']);
        $this->Duration->setDbValue($row['Duration']);
        $this->DWMY->setDbValue($row['DWMY']);
        $this->Contraindications->setDbValue($row['Contraindications']);
        $this->RecStatus->setDbValue($row['RecStatus']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['Sno'] = $this->Sno->CurrentValue;
        $row['Genericname'] = $this->Genericname->CurrentValue;
        $row['Indications'] = $this->Indications->CurrentValue;
        $row['Category'] = $this->Category->CurrentValue;
        $row['Min_Age'] = $this->Min_Age->CurrentValue;
        $row['Min_Days'] = $this->Min_Days->CurrentValue;
        $row['Max_Age'] = $this->Max_Age->CurrentValue;
        $row['Max_Days'] = $this->Max_Days->CurrentValue;
        $row['Route'] = $this->_Route->CurrentValue;
        $row['Form'] = $this->Form->CurrentValue;
        $row['Min_Dose_Val'] = $this->Min_Dose_Val->CurrentValue;
        $row['Min_Dose_Unit'] = $this->Min_Dose_Unit->CurrentValue;
        $row['Max_Dose_Val'] = $this->Max_Dose_Val->CurrentValue;
        $row['Max_Dose_Unit'] = $this->Max_Dose_Unit->CurrentValue;
        $row['Frequency'] = $this->Frequency->CurrentValue;
        $row['Duration'] = $this->Duration->CurrentValue;
        $row['DWMY'] = $this->DWMY->CurrentValue;
        $row['Contraindications'] = $this->Contraindications->CurrentValue;
        $row['RecStatus'] = $this->RecStatus->CurrentValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load key values from Session
        $validKey = true;
        if (strval($this->getKey("Sno")) != "") {
            $this->Sno->OldValue = $this->getKey("Sno"); // Sno
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
        if ($this->Min_Dose_Val->FormValue == $this->Min_Dose_Val->CurrentValue && is_numeric(ConvertToFloatString($this->Min_Dose_Val->CurrentValue))) {
            $this->Min_Dose_Val->CurrentValue = ConvertToFloatString($this->Min_Dose_Val->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Max_Dose_Val->FormValue == $this->Max_Dose_Val->CurrentValue && is_numeric(ConvertToFloatString($this->Max_Dose_Val->CurrentValue))) {
            $this->Max_Dose_Val->CurrentValue = ConvertToFloatString($this->Max_Dose_Val->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // Sno

        // Genericname

        // Indications

        // Category

        // Min_Age

        // Min_Days

        // Max_Age

        // Max_Days

        // Route

        // Form

        // Min_Dose_Val

        // Min_Dose_Unit

        // Max_Dose_Val

        // Max_Dose_Unit

        // Frequency

        // Duration

        // DWMY

        // Contraindications

        // RecStatus
        if ($this->RowType == ROWTYPE_VIEW) {
            // Sno
            $this->Sno->ViewValue = $this->Sno->CurrentValue;
            $this->Sno->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->ViewValue = $this->Genericname->CurrentValue;
            $this->Genericname->ViewCustomAttributes = "";

            // Indications
            $this->Indications->ViewValue = $this->Indications->CurrentValue;
            $this->Indications->ViewCustomAttributes = "";

            // Category
            $this->Category->ViewValue = $this->Category->CurrentValue;
            $this->Category->ViewCustomAttributes = "";

            // Min_Age
            $this->Min_Age->ViewValue = $this->Min_Age->CurrentValue;
            $this->Min_Age->ViewValue = FormatNumber($this->Min_Age->ViewValue, 0, -2, -2, -2);
            $this->Min_Age->ViewCustomAttributes = "";

            // Min_Days
            $this->Min_Days->ViewValue = $this->Min_Days->CurrentValue;
            $this->Min_Days->ViewCustomAttributes = "";

            // Max_Age
            $this->Max_Age->ViewValue = $this->Max_Age->CurrentValue;
            $this->Max_Age->ViewValue = FormatNumber($this->Max_Age->ViewValue, 0, -2, -2, -2);
            $this->Max_Age->ViewCustomAttributes = "";

            // Max_Days
            $this->Max_Days->ViewValue = $this->Max_Days->CurrentValue;
            $this->Max_Days->ViewCustomAttributes = "";

            // Route
            $this->_Route->ViewValue = $this->_Route->CurrentValue;
            $this->_Route->ViewCustomAttributes = "";

            // Form
            $this->Form->ViewValue = $this->Form->CurrentValue;
            $this->Form->ViewCustomAttributes = "";

            // Min_Dose_Val
            $this->Min_Dose_Val->ViewValue = $this->Min_Dose_Val->CurrentValue;
            $this->Min_Dose_Val->ViewValue = FormatNumber($this->Min_Dose_Val->ViewValue, 2, -2, -2, -2);
            $this->Min_Dose_Val->ViewCustomAttributes = "";

            // Min_Dose_Unit
            $this->Min_Dose_Unit->ViewValue = $this->Min_Dose_Unit->CurrentValue;
            $this->Min_Dose_Unit->ViewCustomAttributes = "";

            // Max_Dose_Val
            $this->Max_Dose_Val->ViewValue = $this->Max_Dose_Val->CurrentValue;
            $this->Max_Dose_Val->ViewValue = FormatNumber($this->Max_Dose_Val->ViewValue, 2, -2, -2, -2);
            $this->Max_Dose_Val->ViewCustomAttributes = "";

            // Max_Dose_Unit
            $this->Max_Dose_Unit->ViewValue = $this->Max_Dose_Unit->CurrentValue;
            $this->Max_Dose_Unit->ViewCustomAttributes = "";

            // Frequency
            $this->Frequency->ViewValue = $this->Frequency->CurrentValue;
            $this->Frequency->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewValue = FormatNumber($this->Duration->ViewValue, 0, -2, -2, -2);
            $this->Duration->ViewCustomAttributes = "";

            // DWMY
            $this->DWMY->ViewValue = $this->DWMY->CurrentValue;
            $this->DWMY->ViewCustomAttributes = "";

            // Contraindications
            $this->Contraindications->ViewValue = $this->Contraindications->CurrentValue;
            $this->Contraindications->ViewCustomAttributes = "";

            // RecStatus
            $this->RecStatus->ViewValue = $this->RecStatus->CurrentValue;
            $this->RecStatus->ViewCustomAttributes = "";

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";
            $this->Genericname->TooltipValue = "";

            // Indications
            $this->Indications->LinkCustomAttributes = "";
            $this->Indications->HrefValue = "";
            $this->Indications->TooltipValue = "";

            // Category
            $this->Category->LinkCustomAttributes = "";
            $this->Category->HrefValue = "";
            $this->Category->TooltipValue = "";

            // Min_Age
            $this->Min_Age->LinkCustomAttributes = "";
            $this->Min_Age->HrefValue = "";
            $this->Min_Age->TooltipValue = "";

            // Min_Days
            $this->Min_Days->LinkCustomAttributes = "";
            $this->Min_Days->HrefValue = "";
            $this->Min_Days->TooltipValue = "";

            // Max_Age
            $this->Max_Age->LinkCustomAttributes = "";
            $this->Max_Age->HrefValue = "";
            $this->Max_Age->TooltipValue = "";

            // Max_Days
            $this->Max_Days->LinkCustomAttributes = "";
            $this->Max_Days->HrefValue = "";
            $this->Max_Days->TooltipValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";
            $this->_Route->TooltipValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";
            $this->Form->TooltipValue = "";

            // Min_Dose_Val
            $this->Min_Dose_Val->LinkCustomAttributes = "";
            $this->Min_Dose_Val->HrefValue = "";
            $this->Min_Dose_Val->TooltipValue = "";

            // Min_Dose_Unit
            $this->Min_Dose_Unit->LinkCustomAttributes = "";
            $this->Min_Dose_Unit->HrefValue = "";
            $this->Min_Dose_Unit->TooltipValue = "";

            // Max_Dose_Val
            $this->Max_Dose_Val->LinkCustomAttributes = "";
            $this->Max_Dose_Val->HrefValue = "";
            $this->Max_Dose_Val->TooltipValue = "";

            // Max_Dose_Unit
            $this->Max_Dose_Unit->LinkCustomAttributes = "";
            $this->Max_Dose_Unit->HrefValue = "";
            $this->Max_Dose_Unit->TooltipValue = "";

            // Frequency
            $this->Frequency->LinkCustomAttributes = "";
            $this->Frequency->HrefValue = "";
            $this->Frequency->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // DWMY
            $this->DWMY->LinkCustomAttributes = "";
            $this->DWMY->HrefValue = "";
            $this->DWMY->TooltipValue = "";

            // Contraindications
            $this->Contraindications->LinkCustomAttributes = "";
            $this->Contraindications->HrefValue = "";
            $this->Contraindications->TooltipValue = "";

            // RecStatus
            $this->RecStatus->LinkCustomAttributes = "";
            $this->RecStatus->HrefValue = "";
            $this->RecStatus->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Genericname
            $this->Genericname->EditAttrs["class"] = "form-control";
            $this->Genericname->EditCustomAttributes = "";
            if (!$this->Genericname->Raw) {
                $this->Genericname->CurrentValue = HtmlDecode($this->Genericname->CurrentValue);
            }
            $this->Genericname->EditValue = HtmlEncode($this->Genericname->CurrentValue);
            $this->Genericname->PlaceHolder = RemoveHtml($this->Genericname->caption());

            // Indications
            $this->Indications->EditAttrs["class"] = "form-control";
            $this->Indications->EditCustomAttributes = "";
            $this->Indications->EditValue = HtmlEncode($this->Indications->CurrentValue);
            $this->Indications->PlaceHolder = RemoveHtml($this->Indications->caption());

            // Category
            $this->Category->EditAttrs["class"] = "form-control";
            $this->Category->EditCustomAttributes = "";
            if (!$this->Category->Raw) {
                $this->Category->CurrentValue = HtmlDecode($this->Category->CurrentValue);
            }
            $this->Category->EditValue = HtmlEncode($this->Category->CurrentValue);
            $this->Category->PlaceHolder = RemoveHtml($this->Category->caption());

            // Min_Age
            $this->Min_Age->EditAttrs["class"] = "form-control";
            $this->Min_Age->EditCustomAttributes = "";
            $this->Min_Age->EditValue = HtmlEncode($this->Min_Age->CurrentValue);
            $this->Min_Age->PlaceHolder = RemoveHtml($this->Min_Age->caption());

            // Min_Days
            $this->Min_Days->EditAttrs["class"] = "form-control";
            $this->Min_Days->EditCustomAttributes = "";
            if (!$this->Min_Days->Raw) {
                $this->Min_Days->CurrentValue = HtmlDecode($this->Min_Days->CurrentValue);
            }
            $this->Min_Days->EditValue = HtmlEncode($this->Min_Days->CurrentValue);
            $this->Min_Days->PlaceHolder = RemoveHtml($this->Min_Days->caption());

            // Max_Age
            $this->Max_Age->EditAttrs["class"] = "form-control";
            $this->Max_Age->EditCustomAttributes = "";
            $this->Max_Age->EditValue = HtmlEncode($this->Max_Age->CurrentValue);
            $this->Max_Age->PlaceHolder = RemoveHtml($this->Max_Age->caption());

            // Max_Days
            $this->Max_Days->EditAttrs["class"] = "form-control";
            $this->Max_Days->EditCustomAttributes = "";
            if (!$this->Max_Days->Raw) {
                $this->Max_Days->CurrentValue = HtmlDecode($this->Max_Days->CurrentValue);
            }
            $this->Max_Days->EditValue = HtmlEncode($this->Max_Days->CurrentValue);
            $this->Max_Days->PlaceHolder = RemoveHtml($this->Max_Days->caption());

            // Route
            $this->_Route->EditAttrs["class"] = "form-control";
            $this->_Route->EditCustomAttributes = "";
            if (!$this->_Route->Raw) {
                $this->_Route->CurrentValue = HtmlDecode($this->_Route->CurrentValue);
            }
            $this->_Route->EditValue = HtmlEncode($this->_Route->CurrentValue);
            $this->_Route->PlaceHolder = RemoveHtml($this->_Route->caption());

            // Form
            $this->Form->EditAttrs["class"] = "form-control";
            $this->Form->EditCustomAttributes = "";
            if (!$this->Form->Raw) {
                $this->Form->CurrentValue = HtmlDecode($this->Form->CurrentValue);
            }
            $this->Form->EditValue = HtmlEncode($this->Form->CurrentValue);
            $this->Form->PlaceHolder = RemoveHtml($this->Form->caption());

            // Min_Dose_Val
            $this->Min_Dose_Val->EditAttrs["class"] = "form-control";
            $this->Min_Dose_Val->EditCustomAttributes = "";
            $this->Min_Dose_Val->EditValue = HtmlEncode($this->Min_Dose_Val->CurrentValue);
            $this->Min_Dose_Val->PlaceHolder = RemoveHtml($this->Min_Dose_Val->caption());
            if (strval($this->Min_Dose_Val->EditValue) != "" && is_numeric($this->Min_Dose_Val->EditValue)) {
                $this->Min_Dose_Val->EditValue = FormatNumber($this->Min_Dose_Val->EditValue, -2, -2, -2, -2);
            }

            // Min_Dose_Unit
            $this->Min_Dose_Unit->EditAttrs["class"] = "form-control";
            $this->Min_Dose_Unit->EditCustomAttributes = "";
            if (!$this->Min_Dose_Unit->Raw) {
                $this->Min_Dose_Unit->CurrentValue = HtmlDecode($this->Min_Dose_Unit->CurrentValue);
            }
            $this->Min_Dose_Unit->EditValue = HtmlEncode($this->Min_Dose_Unit->CurrentValue);
            $this->Min_Dose_Unit->PlaceHolder = RemoveHtml($this->Min_Dose_Unit->caption());

            // Max_Dose_Val
            $this->Max_Dose_Val->EditAttrs["class"] = "form-control";
            $this->Max_Dose_Val->EditCustomAttributes = "";
            $this->Max_Dose_Val->EditValue = HtmlEncode($this->Max_Dose_Val->CurrentValue);
            $this->Max_Dose_Val->PlaceHolder = RemoveHtml($this->Max_Dose_Val->caption());
            if (strval($this->Max_Dose_Val->EditValue) != "" && is_numeric($this->Max_Dose_Val->EditValue)) {
                $this->Max_Dose_Val->EditValue = FormatNumber($this->Max_Dose_Val->EditValue, -2, -2, -2, -2);
            }

            // Max_Dose_Unit
            $this->Max_Dose_Unit->EditAttrs["class"] = "form-control";
            $this->Max_Dose_Unit->EditCustomAttributes = "";
            if (!$this->Max_Dose_Unit->Raw) {
                $this->Max_Dose_Unit->CurrentValue = HtmlDecode($this->Max_Dose_Unit->CurrentValue);
            }
            $this->Max_Dose_Unit->EditValue = HtmlEncode($this->Max_Dose_Unit->CurrentValue);
            $this->Max_Dose_Unit->PlaceHolder = RemoveHtml($this->Max_Dose_Unit->caption());

            // Frequency
            $this->Frequency->EditAttrs["class"] = "form-control";
            $this->Frequency->EditCustomAttributes = "";
            if (!$this->Frequency->Raw) {
                $this->Frequency->CurrentValue = HtmlDecode($this->Frequency->CurrentValue);
            }
            $this->Frequency->EditValue = HtmlEncode($this->Frequency->CurrentValue);
            $this->Frequency->PlaceHolder = RemoveHtml($this->Frequency->caption());

            // Duration
            $this->Duration->EditAttrs["class"] = "form-control";
            $this->Duration->EditCustomAttributes = "";
            $this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
            $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

            // DWMY
            $this->DWMY->EditAttrs["class"] = "form-control";
            $this->DWMY->EditCustomAttributes = "";
            if (!$this->DWMY->Raw) {
                $this->DWMY->CurrentValue = HtmlDecode($this->DWMY->CurrentValue);
            }
            $this->DWMY->EditValue = HtmlEncode($this->DWMY->CurrentValue);
            $this->DWMY->PlaceHolder = RemoveHtml($this->DWMY->caption());

            // Contraindications
            $this->Contraindications->EditAttrs["class"] = "form-control";
            $this->Contraindications->EditCustomAttributes = "";
            $this->Contraindications->EditValue = HtmlEncode($this->Contraindications->CurrentValue);
            $this->Contraindications->PlaceHolder = RemoveHtml($this->Contraindications->caption());

            // RecStatus
            $this->RecStatus->EditAttrs["class"] = "form-control";
            $this->RecStatus->EditCustomAttributes = "";
            if (!$this->RecStatus->Raw) {
                $this->RecStatus->CurrentValue = HtmlDecode($this->RecStatus->CurrentValue);
            }
            $this->RecStatus->EditValue = HtmlEncode($this->RecStatus->CurrentValue);
            $this->RecStatus->PlaceHolder = RemoveHtml($this->RecStatus->caption());

            // Add refer script

            // Genericname
            $this->Genericname->LinkCustomAttributes = "";
            $this->Genericname->HrefValue = "";

            // Indications
            $this->Indications->LinkCustomAttributes = "";
            $this->Indications->HrefValue = "";

            // Category
            $this->Category->LinkCustomAttributes = "";
            $this->Category->HrefValue = "";

            // Min_Age
            $this->Min_Age->LinkCustomAttributes = "";
            $this->Min_Age->HrefValue = "";

            // Min_Days
            $this->Min_Days->LinkCustomAttributes = "";
            $this->Min_Days->HrefValue = "";

            // Max_Age
            $this->Max_Age->LinkCustomAttributes = "";
            $this->Max_Age->HrefValue = "";

            // Max_Days
            $this->Max_Days->LinkCustomAttributes = "";
            $this->Max_Days->HrefValue = "";

            // Route
            $this->_Route->LinkCustomAttributes = "";
            $this->_Route->HrefValue = "";

            // Form
            $this->Form->LinkCustomAttributes = "";
            $this->Form->HrefValue = "";

            // Min_Dose_Val
            $this->Min_Dose_Val->LinkCustomAttributes = "";
            $this->Min_Dose_Val->HrefValue = "";

            // Min_Dose_Unit
            $this->Min_Dose_Unit->LinkCustomAttributes = "";
            $this->Min_Dose_Unit->HrefValue = "";

            // Max_Dose_Val
            $this->Max_Dose_Val->LinkCustomAttributes = "";
            $this->Max_Dose_Val->HrefValue = "";

            // Max_Dose_Unit
            $this->Max_Dose_Unit->LinkCustomAttributes = "";
            $this->Max_Dose_Unit->HrefValue = "";

            // Frequency
            $this->Frequency->LinkCustomAttributes = "";
            $this->Frequency->HrefValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";

            // DWMY
            $this->DWMY->LinkCustomAttributes = "";
            $this->DWMY->HrefValue = "";

            // Contraindications
            $this->Contraindications->LinkCustomAttributes = "";
            $this->Contraindications->HrefValue = "";

            // RecStatus
            $this->RecStatus->LinkCustomAttributes = "";
            $this->RecStatus->HrefValue = "";
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
        if ($this->Indications->Required) {
            if (!$this->Indications->IsDetailKey && EmptyValue($this->Indications->FormValue)) {
                $this->Indications->addErrorMessage(str_replace("%s", $this->Indications->caption(), $this->Indications->RequiredErrorMessage));
            }
        }
        if ($this->Category->Required) {
            if (!$this->Category->IsDetailKey && EmptyValue($this->Category->FormValue)) {
                $this->Category->addErrorMessage(str_replace("%s", $this->Category->caption(), $this->Category->RequiredErrorMessage));
            }
        }
        if ($this->Min_Age->Required) {
            if (!$this->Min_Age->IsDetailKey && EmptyValue($this->Min_Age->FormValue)) {
                $this->Min_Age->addErrorMessage(str_replace("%s", $this->Min_Age->caption(), $this->Min_Age->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Min_Age->FormValue)) {
            $this->Min_Age->addErrorMessage($this->Min_Age->getErrorMessage(false));
        }
        if ($this->Min_Days->Required) {
            if (!$this->Min_Days->IsDetailKey && EmptyValue($this->Min_Days->FormValue)) {
                $this->Min_Days->addErrorMessage(str_replace("%s", $this->Min_Days->caption(), $this->Min_Days->RequiredErrorMessage));
            }
        }
        if ($this->Max_Age->Required) {
            if (!$this->Max_Age->IsDetailKey && EmptyValue($this->Max_Age->FormValue)) {
                $this->Max_Age->addErrorMessage(str_replace("%s", $this->Max_Age->caption(), $this->Max_Age->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Max_Age->FormValue)) {
            $this->Max_Age->addErrorMessage($this->Max_Age->getErrorMessage(false));
        }
        if ($this->Max_Days->Required) {
            if (!$this->Max_Days->IsDetailKey && EmptyValue($this->Max_Days->FormValue)) {
                $this->Max_Days->addErrorMessage(str_replace("%s", $this->Max_Days->caption(), $this->Max_Days->RequiredErrorMessage));
            }
        }
        if ($this->_Route->Required) {
            if (!$this->_Route->IsDetailKey && EmptyValue($this->_Route->FormValue)) {
                $this->_Route->addErrorMessage(str_replace("%s", $this->_Route->caption(), $this->_Route->RequiredErrorMessage));
            }
        }
        if ($this->Form->Required) {
            if (!$this->Form->IsDetailKey && EmptyValue($this->Form->FormValue)) {
                $this->Form->addErrorMessage(str_replace("%s", $this->Form->caption(), $this->Form->RequiredErrorMessage));
            }
        }
        if ($this->Min_Dose_Val->Required) {
            if (!$this->Min_Dose_Val->IsDetailKey && EmptyValue($this->Min_Dose_Val->FormValue)) {
                $this->Min_Dose_Val->addErrorMessage(str_replace("%s", $this->Min_Dose_Val->caption(), $this->Min_Dose_Val->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Min_Dose_Val->FormValue)) {
            $this->Min_Dose_Val->addErrorMessage($this->Min_Dose_Val->getErrorMessage(false));
        }
        if ($this->Min_Dose_Unit->Required) {
            if (!$this->Min_Dose_Unit->IsDetailKey && EmptyValue($this->Min_Dose_Unit->FormValue)) {
                $this->Min_Dose_Unit->addErrorMessage(str_replace("%s", $this->Min_Dose_Unit->caption(), $this->Min_Dose_Unit->RequiredErrorMessage));
            }
        }
        if ($this->Max_Dose_Val->Required) {
            if (!$this->Max_Dose_Val->IsDetailKey && EmptyValue($this->Max_Dose_Val->FormValue)) {
                $this->Max_Dose_Val->addErrorMessage(str_replace("%s", $this->Max_Dose_Val->caption(), $this->Max_Dose_Val->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Max_Dose_Val->FormValue)) {
            $this->Max_Dose_Val->addErrorMessage($this->Max_Dose_Val->getErrorMessage(false));
        }
        if ($this->Max_Dose_Unit->Required) {
            if (!$this->Max_Dose_Unit->IsDetailKey && EmptyValue($this->Max_Dose_Unit->FormValue)) {
                $this->Max_Dose_Unit->addErrorMessage(str_replace("%s", $this->Max_Dose_Unit->caption(), $this->Max_Dose_Unit->RequiredErrorMessage));
            }
        }
        if ($this->Frequency->Required) {
            if (!$this->Frequency->IsDetailKey && EmptyValue($this->Frequency->FormValue)) {
                $this->Frequency->addErrorMessage(str_replace("%s", $this->Frequency->caption(), $this->Frequency->RequiredErrorMessage));
            }
        }
        if ($this->Duration->Required) {
            if (!$this->Duration->IsDetailKey && EmptyValue($this->Duration->FormValue)) {
                $this->Duration->addErrorMessage(str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Duration->FormValue)) {
            $this->Duration->addErrorMessage($this->Duration->getErrorMessage(false));
        }
        if ($this->DWMY->Required) {
            if (!$this->DWMY->IsDetailKey && EmptyValue($this->DWMY->FormValue)) {
                $this->DWMY->addErrorMessage(str_replace("%s", $this->DWMY->caption(), $this->DWMY->RequiredErrorMessage));
            }
        }
        if ($this->Contraindications->Required) {
            if (!$this->Contraindications->IsDetailKey && EmptyValue($this->Contraindications->FormValue)) {
                $this->Contraindications->addErrorMessage(str_replace("%s", $this->Contraindications->caption(), $this->Contraindications->RequiredErrorMessage));
            }
        }
        if ($this->RecStatus->Required) {
            if (!$this->RecStatus->IsDetailKey && EmptyValue($this->RecStatus->FormValue)) {
                $this->RecStatus->addErrorMessage(str_replace("%s", $this->RecStatus->caption(), $this->RecStatus->RequiredErrorMessage));
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

        // Indications
        $this->Indications->setDbValueDef($rsnew, $this->Indications->CurrentValue, null, false);

        // Category
        $this->Category->setDbValueDef($rsnew, $this->Category->CurrentValue, null, false);

        // Min_Age
        $this->Min_Age->setDbValueDef($rsnew, $this->Min_Age->CurrentValue, null, false);

        // Min_Days
        $this->Min_Days->setDbValueDef($rsnew, $this->Min_Days->CurrentValue, null, false);

        // Max_Age
        $this->Max_Age->setDbValueDef($rsnew, $this->Max_Age->CurrentValue, null, false);

        // Max_Days
        $this->Max_Days->setDbValueDef($rsnew, $this->Max_Days->CurrentValue, null, false);

        // Route
        $this->_Route->setDbValueDef($rsnew, $this->_Route->CurrentValue, null, false);

        // Form
        $this->Form->setDbValueDef($rsnew, $this->Form->CurrentValue, null, false);

        // Min_Dose_Val
        $this->Min_Dose_Val->setDbValueDef($rsnew, $this->Min_Dose_Val->CurrentValue, null, false);

        // Min_Dose_Unit
        $this->Min_Dose_Unit->setDbValueDef($rsnew, $this->Min_Dose_Unit->CurrentValue, null, false);

        // Max_Dose_Val
        $this->Max_Dose_Val->setDbValueDef($rsnew, $this->Max_Dose_Val->CurrentValue, null, false);

        // Max_Dose_Unit
        $this->Max_Dose_Unit->setDbValueDef($rsnew, $this->Max_Dose_Unit->CurrentValue, null, false);

        // Frequency
        $this->Frequency->setDbValueDef($rsnew, $this->Frequency->CurrentValue, null, false);

        // Duration
        $this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, null, false);

        // DWMY
        $this->DWMY->setDbValueDef($rsnew, $this->DWMY->CurrentValue, null, false);

        // Contraindications
        $this->Contraindications->setDbValueDef($rsnew, $this->Contraindications->CurrentValue, null, false);

        // RecStatus
        $this->RecStatus->setDbValueDef($rsnew, $this->RecStatus->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PresIndicationstableList"), "", $this->TableVar, true);
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
