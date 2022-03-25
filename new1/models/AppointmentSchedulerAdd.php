<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class AppointmentSchedulerAdd extends AppointmentScheduler
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'appointment_scheduler';

    // Page object name
    public $PageObjName = "AppointmentSchedulerAdd";

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

        // Table object (appointment_scheduler)
        if (!isset($GLOBALS["appointment_scheduler"]) || get_class($GLOBALS["appointment_scheduler"]) == PROJECT_NAMESPACE . "appointment_scheduler") {
            $GLOBALS["appointment_scheduler"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'appointment_scheduler');
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
                $doc = new $class(Container("appointment_scheduler"));
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
                    if ($pageName == "AppointmentSchedulerView") {
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
        $this->start_date->setVisibility();
        $this->end_date->setVisibility();
        $this->patientID->setVisibility();
        $this->patientName->setVisibility();
        $this->DoctorID->setVisibility();
        $this->DoctorName->setVisibility();
        $this->DoctorCode->setVisibility();
        $this->Department->setVisibility();
        $this->AppointmentStatus->setVisibility();
        $this->status->setVisibility();
        $this->scheduler_id->setVisibility();
        $this->text->setVisibility();
        $this->appointment_status->setVisibility();
        $this->PId->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->SchEmail->setVisibility();
        $this->appointment_type->setVisibility();
        $this->Notified->setVisibility();
        $this->Purpose->setVisibility();
        $this->Notes->setVisibility();
        $this->PatientType->setVisibility();
        $this->Referal->setVisibility();
        $this->paymentType->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->createdBy->setVisibility();
        $this->createdDateTime->setVisibility();
        $this->PatientTypee->setVisibility();
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
                    $this->terminate("AppointmentSchedulerList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "AppointmentSchedulerList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "AppointmentSchedulerView") {
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
        $this->start_date->CurrentValue = null;
        $this->start_date->OldValue = $this->start_date->CurrentValue;
        $this->end_date->CurrentValue = null;
        $this->end_date->OldValue = $this->end_date->CurrentValue;
        $this->patientID->CurrentValue = null;
        $this->patientID->OldValue = $this->patientID->CurrentValue;
        $this->patientName->CurrentValue = null;
        $this->patientName->OldValue = $this->patientName->CurrentValue;
        $this->DoctorID->CurrentValue = null;
        $this->DoctorID->OldValue = $this->DoctorID->CurrentValue;
        $this->DoctorName->CurrentValue = null;
        $this->DoctorName->OldValue = $this->DoctorName->CurrentValue;
        $this->DoctorCode->CurrentValue = null;
        $this->DoctorCode->OldValue = $this->DoctorCode->CurrentValue;
        $this->Department->CurrentValue = null;
        $this->Department->OldValue = $this->Department->CurrentValue;
        $this->AppointmentStatus->CurrentValue = null;
        $this->AppointmentStatus->OldValue = $this->AppointmentStatus->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->scheduler_id->CurrentValue = null;
        $this->scheduler_id->OldValue = $this->scheduler_id->CurrentValue;
        $this->text->CurrentValue = null;
        $this->text->OldValue = $this->text->CurrentValue;
        $this->appointment_status->CurrentValue = null;
        $this->appointment_status->OldValue = $this->appointment_status->CurrentValue;
        $this->PId->CurrentValue = null;
        $this->PId->OldValue = $this->PId->CurrentValue;
        $this->MobileNumber->CurrentValue = null;
        $this->MobileNumber->OldValue = $this->MobileNumber->CurrentValue;
        $this->SchEmail->CurrentValue = null;
        $this->SchEmail->OldValue = $this->SchEmail->CurrentValue;
        $this->appointment_type->CurrentValue = null;
        $this->appointment_type->OldValue = $this->appointment_type->CurrentValue;
        $this->Notified->CurrentValue = null;
        $this->Notified->OldValue = $this->Notified->CurrentValue;
        $this->Purpose->CurrentValue = null;
        $this->Purpose->OldValue = $this->Purpose->CurrentValue;
        $this->Notes->CurrentValue = null;
        $this->Notes->OldValue = $this->Notes->CurrentValue;
        $this->PatientType->CurrentValue = null;
        $this->PatientType->OldValue = $this->PatientType->CurrentValue;
        $this->Referal->CurrentValue = null;
        $this->Referal->OldValue = $this->Referal->CurrentValue;
        $this->paymentType->CurrentValue = null;
        $this->paymentType->OldValue = $this->paymentType->CurrentValue;
        $this->WhereDidYouHear->CurrentValue = null;
        $this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdBy->CurrentValue = null;
        $this->createdBy->OldValue = $this->createdBy->CurrentValue;
        $this->createdDateTime->CurrentValue = null;
        $this->createdDateTime->OldValue = $this->createdDateTime->CurrentValue;
        $this->PatientTypee->CurrentValue = null;
        $this->PatientTypee->OldValue = $this->PatientTypee->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'start_date' first before field var 'x_start_date'
        $val = $CurrentForm->hasValue("start_date") ? $CurrentForm->getValue("start_date") : $CurrentForm->getValue("x_start_date");
        if (!$this->start_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_date->Visible = false; // Disable update for API request
            } else {
                $this->start_date->setFormValue($val);
            }
            $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
        }

        // Check field name 'end_date' first before field var 'x_end_date'
        $val = $CurrentForm->hasValue("end_date") ? $CurrentForm->getValue("end_date") : $CurrentForm->getValue("x_end_date");
        if (!$this->end_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_date->Visible = false; // Disable update for API request
            } else {
                $this->end_date->setFormValue($val);
            }
            $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
        }

        // Check field name 'patientID' first before field var 'x_patientID'
        $val = $CurrentForm->hasValue("patientID") ? $CurrentForm->getValue("patientID") : $CurrentForm->getValue("x_patientID");
        if (!$this->patientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientID->Visible = false; // Disable update for API request
            } else {
                $this->patientID->setFormValue($val);
            }
        }

        // Check field name 'patientName' first before field var 'x_patientName'
        $val = $CurrentForm->hasValue("patientName") ? $CurrentForm->getValue("patientName") : $CurrentForm->getValue("x_patientName");
        if (!$this->patientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patientName->Visible = false; // Disable update for API request
            } else {
                $this->patientName->setFormValue($val);
            }
        }

        // Check field name 'DoctorID' first before field var 'x_DoctorID'
        $val = $CurrentForm->hasValue("DoctorID") ? $CurrentForm->getValue("DoctorID") : $CurrentForm->getValue("x_DoctorID");
        if (!$this->DoctorID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorID->Visible = false; // Disable update for API request
            } else {
                $this->DoctorID->setFormValue($val);
            }
        }

        // Check field name 'DoctorName' first before field var 'x_DoctorName'
        $val = $CurrentForm->hasValue("DoctorName") ? $CurrentForm->getValue("DoctorName") : $CurrentForm->getValue("x_DoctorName");
        if (!$this->DoctorName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorName->Visible = false; // Disable update for API request
            } else {
                $this->DoctorName->setFormValue($val);
            }
        }

        // Check field name 'DoctorCode' first before field var 'x_DoctorCode'
        $val = $CurrentForm->hasValue("DoctorCode") ? $CurrentForm->getValue("DoctorCode") : $CurrentForm->getValue("x_DoctorCode");
        if (!$this->DoctorCode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoctorCode->Visible = false; // Disable update for API request
            } else {
                $this->DoctorCode->setFormValue($val);
            }
        }

        // Check field name 'Department' first before field var 'x_Department'
        $val = $CurrentForm->hasValue("Department") ? $CurrentForm->getValue("Department") : $CurrentForm->getValue("x_Department");
        if (!$this->Department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Department->Visible = false; // Disable update for API request
            } else {
                $this->Department->setFormValue($val);
            }
        }

        // Check field name 'AppointmentStatus' first before field var 'x_AppointmentStatus'
        $val = $CurrentForm->hasValue("AppointmentStatus") ? $CurrentForm->getValue("AppointmentStatus") : $CurrentForm->getValue("x_AppointmentStatus");
        if (!$this->AppointmentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AppointmentStatus->Visible = false; // Disable update for API request
            } else {
                $this->AppointmentStatus->setFormValue($val);
            }
        }

        // Check field name 'status' first before field var 'x_status'
        $val = $CurrentForm->hasValue("status") ? $CurrentForm->getValue("status") : $CurrentForm->getValue("x_status");
        if (!$this->status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->status->Visible = false; // Disable update for API request
            } else {
                $this->status->setFormValue($val);
            }
        }

        // Check field name 'scheduler_id' first before field var 'x_scheduler_id'
        $val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
        if (!$this->scheduler_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scheduler_id->Visible = false; // Disable update for API request
            } else {
                $this->scheduler_id->setFormValue($val);
            }
        }

        // Check field name 'text' first before field var 'x_text'
        $val = $CurrentForm->hasValue("text") ? $CurrentForm->getValue("text") : $CurrentForm->getValue("x_text");
        if (!$this->text->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->text->Visible = false; // Disable update for API request
            } else {
                $this->text->setFormValue($val);
            }
        }

        // Check field name 'appointment_status' first before field var 'x_appointment_status'
        $val = $CurrentForm->hasValue("appointment_status") ? $CurrentForm->getValue("appointment_status") : $CurrentForm->getValue("x_appointment_status");
        if (!$this->appointment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_status->Visible = false; // Disable update for API request
            } else {
                $this->appointment_status->setFormValue($val);
            }
        }

        // Check field name 'PId' first before field var 'x_PId'
        $val = $CurrentForm->hasValue("PId") ? $CurrentForm->getValue("PId") : $CurrentForm->getValue("x_PId");
        if (!$this->PId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PId->Visible = false; // Disable update for API request
            } else {
                $this->PId->setFormValue($val);
            }
        }

        // Check field name 'MobileNumber' first before field var 'x_MobileNumber'
        $val = $CurrentForm->hasValue("MobileNumber") ? $CurrentForm->getValue("MobileNumber") : $CurrentForm->getValue("x_MobileNumber");
        if (!$this->MobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->MobileNumber->setFormValue($val);
            }
        }

        // Check field name 'SchEmail' first before field var 'x_SchEmail'
        $val = $CurrentForm->hasValue("SchEmail") ? $CurrentForm->getValue("SchEmail") : $CurrentForm->getValue("x_SchEmail");
        if (!$this->SchEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SchEmail->Visible = false; // Disable update for API request
            } else {
                $this->SchEmail->setFormValue($val);
            }
        }

        // Check field name 'appointment_type' first before field var 'x_appointment_type'
        $val = $CurrentForm->hasValue("appointment_type") ? $CurrentForm->getValue("appointment_type") : $CurrentForm->getValue("x_appointment_type");
        if (!$this->appointment_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->appointment_type->Visible = false; // Disable update for API request
            } else {
                $this->appointment_type->setFormValue($val);
            }
        }

        // Check field name 'Notified' first before field var 'x_Notified'
        $val = $CurrentForm->hasValue("Notified") ? $CurrentForm->getValue("Notified") : $CurrentForm->getValue("x_Notified");
        if (!$this->Notified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notified->Visible = false; // Disable update for API request
            } else {
                $this->Notified->setFormValue($val);
            }
        }

        // Check field name 'Purpose' first before field var 'x_Purpose'
        $val = $CurrentForm->hasValue("Purpose") ? $CurrentForm->getValue("Purpose") : $CurrentForm->getValue("x_Purpose");
        if (!$this->Purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Purpose->Visible = false; // Disable update for API request
            } else {
                $this->Purpose->setFormValue($val);
            }
        }

        // Check field name 'Notes' first before field var 'x_Notes'
        $val = $CurrentForm->hasValue("Notes") ? $CurrentForm->getValue("Notes") : $CurrentForm->getValue("x_Notes");
        if (!$this->Notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Notes->Visible = false; // Disable update for API request
            } else {
                $this->Notes->setFormValue($val);
            }
        }

        // Check field name 'PatientType' first before field var 'x_PatientType'
        $val = $CurrentForm->hasValue("PatientType") ? $CurrentForm->getValue("PatientType") : $CurrentForm->getValue("x_PatientType");
        if (!$this->PatientType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientType->Visible = false; // Disable update for API request
            } else {
                $this->PatientType->setFormValue($val);
            }
        }

        // Check field name 'Referal' first before field var 'x_Referal'
        $val = $CurrentForm->hasValue("Referal") ? $CurrentForm->getValue("Referal") : $CurrentForm->getValue("x_Referal");
        if (!$this->Referal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Referal->Visible = false; // Disable update for API request
            } else {
                $this->Referal->setFormValue($val);
            }
        }

        // Check field name 'paymentType' first before field var 'x_paymentType'
        $val = $CurrentForm->hasValue("paymentType") ? $CurrentForm->getValue("paymentType") : $CurrentForm->getValue("x_paymentType");
        if (!$this->paymentType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->paymentType->Visible = false; // Disable update for API request
            } else {
                $this->paymentType->setFormValue($val);
            }
        }

        // Check field name 'WhereDidYouHear' first before field var 'x_WhereDidYouHear'
        $val = $CurrentForm->hasValue("WhereDidYouHear") ? $CurrentForm->getValue("WhereDidYouHear") : $CurrentForm->getValue("x_WhereDidYouHear");
        if (!$this->WhereDidYouHear->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhereDidYouHear->Visible = false; // Disable update for API request
            } else {
                $this->WhereDidYouHear->setFormValue($val);
            }
        }

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }

        // Check field name 'createdBy' first before field var 'x_createdBy'
        $val = $CurrentForm->hasValue("createdBy") ? $CurrentForm->getValue("createdBy") : $CurrentForm->getValue("x_createdBy");
        if (!$this->createdBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdBy->Visible = false; // Disable update for API request
            } else {
                $this->createdBy->setFormValue($val);
            }
        }

        // Check field name 'createdDateTime' first before field var 'x_createdDateTime'
        $val = $CurrentForm->hasValue("createdDateTime") ? $CurrentForm->getValue("createdDateTime") : $CurrentForm->getValue("x_createdDateTime");
        if (!$this->createdDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->createdDateTime->Visible = false; // Disable update for API request
            } else {
                $this->createdDateTime->setFormValue($val);
            }
            $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        }

        // Check field name 'PatientTypee' first before field var 'x_PatientTypee'
        $val = $CurrentForm->hasValue("PatientTypee") ? $CurrentForm->getValue("PatientTypee") : $CurrentForm->getValue("x_PatientTypee");
        if (!$this->PatientTypee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientTypee->Visible = false; // Disable update for API request
            } else {
                $this->PatientTypee->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->start_date->CurrentValue = $this->start_date->FormValue;
        $this->start_date->CurrentValue = UnFormatDateTime($this->start_date->CurrentValue, 0);
        $this->end_date->CurrentValue = $this->end_date->FormValue;
        $this->end_date->CurrentValue = UnFormatDateTime($this->end_date->CurrentValue, 0);
        $this->patientID->CurrentValue = $this->patientID->FormValue;
        $this->patientName->CurrentValue = $this->patientName->FormValue;
        $this->DoctorID->CurrentValue = $this->DoctorID->FormValue;
        $this->DoctorName->CurrentValue = $this->DoctorName->FormValue;
        $this->DoctorCode->CurrentValue = $this->DoctorCode->FormValue;
        $this->Department->CurrentValue = $this->Department->FormValue;
        $this->AppointmentStatus->CurrentValue = $this->AppointmentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
        $this->text->CurrentValue = $this->text->FormValue;
        $this->appointment_status->CurrentValue = $this->appointment_status->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
        $this->SchEmail->CurrentValue = $this->SchEmail->FormValue;
        $this->appointment_type->CurrentValue = $this->appointment_type->FormValue;
        $this->Notified->CurrentValue = $this->Notified->FormValue;
        $this->Purpose->CurrentValue = $this->Purpose->FormValue;
        $this->Notes->CurrentValue = $this->Notes->FormValue;
        $this->PatientType->CurrentValue = $this->PatientType->FormValue;
        $this->Referal->CurrentValue = $this->Referal->FormValue;
        $this->paymentType->CurrentValue = $this->paymentType->FormValue;
        $this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->createdBy->CurrentValue = $this->createdBy->FormValue;
        $this->createdDateTime->CurrentValue = $this->createdDateTime->FormValue;
        $this->createdDateTime->CurrentValue = UnFormatDateTime($this->createdDateTime->CurrentValue, 0);
        $this->PatientTypee->CurrentValue = $this->PatientTypee->FormValue;
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
        $this->start_date->setDbValue($row['start_date']);
        $this->end_date->setDbValue($row['end_date']);
        $this->patientID->setDbValue($row['patientID']);
        $this->patientName->setDbValue($row['patientName']);
        $this->DoctorID->setDbValue($row['DoctorID']);
        $this->DoctorName->setDbValue($row['DoctorName']);
        $this->DoctorCode->setDbValue($row['DoctorCode']);
        $this->Department->setDbValue($row['Department']);
        $this->AppointmentStatus->setDbValue($row['AppointmentStatus']);
        $this->status->setDbValue($row['status']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->text->setDbValue($row['text']);
        $this->appointment_status->setDbValue($row['appointment_status']);
        $this->PId->setDbValue($row['PId']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->SchEmail->setDbValue($row['SchEmail']);
        $this->appointment_type->setDbValue($row['appointment_type']);
        $this->Notified->setDbValue($row['Notified']);
        $this->Purpose->setDbValue($row['Purpose']);
        $this->Notes->setDbValue($row['Notes']);
        $this->PatientType->setDbValue($row['PatientType']);
        $this->Referal->setDbValue($row['Referal']);
        $this->paymentType->setDbValue($row['paymentType']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdBy->setDbValue($row['createdBy']);
        $this->createdDateTime->setDbValue($row['createdDateTime']);
        $this->PatientTypee->setDbValue($row['PatientTypee']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['start_date'] = $this->start_date->CurrentValue;
        $row['end_date'] = $this->end_date->CurrentValue;
        $row['patientID'] = $this->patientID->CurrentValue;
        $row['patientName'] = $this->patientName->CurrentValue;
        $row['DoctorID'] = $this->DoctorID->CurrentValue;
        $row['DoctorName'] = $this->DoctorName->CurrentValue;
        $row['DoctorCode'] = $this->DoctorCode->CurrentValue;
        $row['Department'] = $this->Department->CurrentValue;
        $row['AppointmentStatus'] = $this->AppointmentStatus->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['scheduler_id'] = $this->scheduler_id->CurrentValue;
        $row['text'] = $this->text->CurrentValue;
        $row['appointment_status'] = $this->appointment_status->CurrentValue;
        $row['PId'] = $this->PId->CurrentValue;
        $row['MobileNumber'] = $this->MobileNumber->CurrentValue;
        $row['SchEmail'] = $this->SchEmail->CurrentValue;
        $row['appointment_type'] = $this->appointment_type->CurrentValue;
        $row['Notified'] = $this->Notified->CurrentValue;
        $row['Purpose'] = $this->Purpose->CurrentValue;
        $row['Notes'] = $this->Notes->CurrentValue;
        $row['PatientType'] = $this->PatientType->CurrentValue;
        $row['Referal'] = $this->Referal->CurrentValue;
        $row['paymentType'] = $this->paymentType->CurrentValue;
        $row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdBy'] = $this->createdBy->CurrentValue;
        $row['createdDateTime'] = $this->createdDateTime->CurrentValue;
        $row['PatientTypee'] = $this->PatientTypee->CurrentValue;
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

        // start_date

        // end_date

        // patientID

        // patientName

        // DoctorID

        // DoctorName

        // DoctorCode

        // Department

        // AppointmentStatus

        // status

        // scheduler_id

        // text

        // appointment_status

        // PId

        // MobileNumber

        // SchEmail

        // appointment_type

        // Notified

        // Purpose

        // Notes

        // PatientType

        // Referal

        // paymentType

        // WhereDidYouHear

        // HospID

        // createdBy

        // createdDateTime

        // PatientTypee
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // start_date
            $this->start_date->ViewValue = $this->start_date->CurrentValue;
            $this->start_date->ViewValue = FormatDateTime($this->start_date->ViewValue, 0);
            $this->start_date->ViewCustomAttributes = "";

            // end_date
            $this->end_date->ViewValue = $this->end_date->CurrentValue;
            $this->end_date->ViewValue = FormatDateTime($this->end_date->ViewValue, 0);
            $this->end_date->ViewCustomAttributes = "";

            // patientID
            $this->patientID->ViewValue = $this->patientID->CurrentValue;
            $this->patientID->ViewCustomAttributes = "";

            // patientName
            $this->patientName->ViewValue = $this->patientName->CurrentValue;
            $this->patientName->ViewCustomAttributes = "";

            // DoctorID
            $this->DoctorID->ViewValue = $this->DoctorID->CurrentValue;
            $this->DoctorID->ViewValue = FormatNumber($this->DoctorID->ViewValue, 0, -2, -2, -2);
            $this->DoctorID->ViewCustomAttributes = "";

            // DoctorName
            $this->DoctorName->ViewValue = $this->DoctorName->CurrentValue;
            $this->DoctorName->ViewCustomAttributes = "";

            // DoctorCode
            $this->DoctorCode->ViewValue = $this->DoctorCode->CurrentValue;
            $this->DoctorCode->ViewCustomAttributes = "";

            // Department
            $this->Department->ViewValue = $this->Department->CurrentValue;
            $this->Department->ViewCustomAttributes = "";

            // AppointmentStatus
            $this->AppointmentStatus->ViewValue = $this->AppointmentStatus->CurrentValue;
            $this->AppointmentStatus->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewCustomAttributes = "";

            // scheduler_id
            $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // text
            $this->text->ViewValue = $this->text->CurrentValue;
            $this->text->ViewCustomAttributes = "";

            // appointment_status
            $this->appointment_status->ViewValue = $this->appointment_status->CurrentValue;
            $this->appointment_status->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // SchEmail
            $this->SchEmail->ViewValue = $this->SchEmail->CurrentValue;
            $this->SchEmail->ViewCustomAttributes = "";

            // appointment_type
            $this->appointment_type->ViewValue = $this->appointment_type->CurrentValue;
            $this->appointment_type->ViewCustomAttributes = "";

            // Notified
            $this->Notified->ViewValue = $this->Notified->CurrentValue;
            $this->Notified->ViewCustomAttributes = "";

            // Purpose
            $this->Purpose->ViewValue = $this->Purpose->CurrentValue;
            $this->Purpose->ViewCustomAttributes = "";

            // Notes
            $this->Notes->ViewValue = $this->Notes->CurrentValue;
            $this->Notes->ViewCustomAttributes = "";

            // PatientType
            $this->PatientType->ViewValue = $this->PatientType->CurrentValue;
            $this->PatientType->ViewCustomAttributes = "";

            // Referal
            $this->Referal->ViewValue = $this->Referal->CurrentValue;
            $this->Referal->ViewCustomAttributes = "";

            // paymentType
            $this->paymentType->ViewValue = $this->paymentType->CurrentValue;
            $this->paymentType->ViewCustomAttributes = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // createdBy
            $this->createdBy->ViewValue = $this->createdBy->CurrentValue;
            $this->createdBy->ViewCustomAttributes = "";

            // createdDateTime
            $this->createdDateTime->ViewValue = $this->createdDateTime->CurrentValue;
            $this->createdDateTime->ViewValue = FormatDateTime($this->createdDateTime->ViewValue, 0);
            $this->createdDateTime->ViewCustomAttributes = "";

            // PatientTypee
            $this->PatientTypee->ViewValue = $this->PatientTypee->CurrentValue;
            $this->PatientTypee->ViewCustomAttributes = "";

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";
            $this->start_date->TooltipValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";
            $this->end_date->TooltipValue = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";
            $this->patientID->TooltipValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";
            $this->patientName->TooltipValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";
            $this->DoctorID->TooltipValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";
            $this->DoctorName->TooltipValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";
            $this->DoctorCode->TooltipValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";
            $this->Department->TooltipValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";
            $this->AppointmentStatus->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";
            $this->text->TooltipValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";
            $this->appointment_status->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";
            $this->SchEmail->TooltipValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";
            $this->appointment_type->TooltipValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";
            $this->Notified->TooltipValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";
            $this->Purpose->TooltipValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";
            $this->Notes->TooltipValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";
            $this->PatientType->TooltipValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";
            $this->Referal->TooltipValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";
            $this->paymentType->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";
            $this->createdBy->TooltipValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";
            $this->createdDateTime->TooltipValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
            $this->PatientTypee->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // start_date
            $this->start_date->EditAttrs["class"] = "form-control";
            $this->start_date->EditCustomAttributes = "";
            $this->start_date->EditValue = HtmlEncode(FormatDateTime($this->start_date->CurrentValue, 8));
            $this->start_date->PlaceHolder = RemoveHtml($this->start_date->caption());

            // end_date
            $this->end_date->EditAttrs["class"] = "form-control";
            $this->end_date->EditCustomAttributes = "";
            $this->end_date->EditValue = HtmlEncode(FormatDateTime($this->end_date->CurrentValue, 8));
            $this->end_date->PlaceHolder = RemoveHtml($this->end_date->caption());

            // patientID
            $this->patientID->EditAttrs["class"] = "form-control";
            $this->patientID->EditCustomAttributes = "";
            if (!$this->patientID->Raw) {
                $this->patientID->CurrentValue = HtmlDecode($this->patientID->CurrentValue);
            }
            $this->patientID->EditValue = HtmlEncode($this->patientID->CurrentValue);
            $this->patientID->PlaceHolder = RemoveHtml($this->patientID->caption());

            // patientName
            $this->patientName->EditAttrs["class"] = "form-control";
            $this->patientName->EditCustomAttributes = "";
            if (!$this->patientName->Raw) {
                $this->patientName->CurrentValue = HtmlDecode($this->patientName->CurrentValue);
            }
            $this->patientName->EditValue = HtmlEncode($this->patientName->CurrentValue);
            $this->patientName->PlaceHolder = RemoveHtml($this->patientName->caption());

            // DoctorID
            $this->DoctorID->EditAttrs["class"] = "form-control";
            $this->DoctorID->EditCustomAttributes = "";
            $this->DoctorID->EditValue = HtmlEncode($this->DoctorID->CurrentValue);
            $this->DoctorID->PlaceHolder = RemoveHtml($this->DoctorID->caption());

            // DoctorName
            $this->DoctorName->EditAttrs["class"] = "form-control";
            $this->DoctorName->EditCustomAttributes = "";
            if (!$this->DoctorName->Raw) {
                $this->DoctorName->CurrentValue = HtmlDecode($this->DoctorName->CurrentValue);
            }
            $this->DoctorName->EditValue = HtmlEncode($this->DoctorName->CurrentValue);
            $this->DoctorName->PlaceHolder = RemoveHtml($this->DoctorName->caption());

            // DoctorCode
            $this->DoctorCode->EditAttrs["class"] = "form-control";
            $this->DoctorCode->EditCustomAttributes = "";
            if (!$this->DoctorCode->Raw) {
                $this->DoctorCode->CurrentValue = HtmlDecode($this->DoctorCode->CurrentValue);
            }
            $this->DoctorCode->EditValue = HtmlEncode($this->DoctorCode->CurrentValue);
            $this->DoctorCode->PlaceHolder = RemoveHtml($this->DoctorCode->caption());

            // Department
            $this->Department->EditAttrs["class"] = "form-control";
            $this->Department->EditCustomAttributes = "";
            if (!$this->Department->Raw) {
                $this->Department->CurrentValue = HtmlDecode($this->Department->CurrentValue);
            }
            $this->Department->EditValue = HtmlEncode($this->Department->CurrentValue);
            $this->Department->PlaceHolder = RemoveHtml($this->Department->caption());

            // AppointmentStatus
            $this->AppointmentStatus->EditAttrs["class"] = "form-control";
            $this->AppointmentStatus->EditCustomAttributes = "";
            if (!$this->AppointmentStatus->Raw) {
                $this->AppointmentStatus->CurrentValue = HtmlDecode($this->AppointmentStatus->CurrentValue);
            }
            $this->AppointmentStatus->EditValue = HtmlEncode($this->AppointmentStatus->CurrentValue);
            $this->AppointmentStatus->PlaceHolder = RemoveHtml($this->AppointmentStatus->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            if (!$this->status->Raw) {
                $this->status->CurrentValue = HtmlDecode($this->status->CurrentValue);
            }
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            if (!$this->scheduler_id->Raw) {
                $this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
            }
            $this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
            $this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

            // text
            $this->text->EditAttrs["class"] = "form-control";
            $this->text->EditCustomAttributes = "";
            if (!$this->text->Raw) {
                $this->text->CurrentValue = HtmlDecode($this->text->CurrentValue);
            }
            $this->text->EditValue = HtmlEncode($this->text->CurrentValue);
            $this->text->PlaceHolder = RemoveHtml($this->text->caption());

            // appointment_status
            $this->appointment_status->EditAttrs["class"] = "form-control";
            $this->appointment_status->EditCustomAttributes = "";
            if (!$this->appointment_status->Raw) {
                $this->appointment_status->CurrentValue = HtmlDecode($this->appointment_status->CurrentValue);
            }
            $this->appointment_status->EditValue = HtmlEncode($this->appointment_status->CurrentValue);
            $this->appointment_status->PlaceHolder = RemoveHtml($this->appointment_status->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // SchEmail
            $this->SchEmail->EditAttrs["class"] = "form-control";
            $this->SchEmail->EditCustomAttributes = "";
            if (!$this->SchEmail->Raw) {
                $this->SchEmail->CurrentValue = HtmlDecode($this->SchEmail->CurrentValue);
            }
            $this->SchEmail->EditValue = HtmlEncode($this->SchEmail->CurrentValue);
            $this->SchEmail->PlaceHolder = RemoveHtml($this->SchEmail->caption());

            // appointment_type
            $this->appointment_type->EditAttrs["class"] = "form-control";
            $this->appointment_type->EditCustomAttributes = "";
            if (!$this->appointment_type->Raw) {
                $this->appointment_type->CurrentValue = HtmlDecode($this->appointment_type->CurrentValue);
            }
            $this->appointment_type->EditValue = HtmlEncode($this->appointment_type->CurrentValue);
            $this->appointment_type->PlaceHolder = RemoveHtml($this->appointment_type->caption());

            // Notified
            $this->Notified->EditAttrs["class"] = "form-control";
            $this->Notified->EditCustomAttributes = "";
            if (!$this->Notified->Raw) {
                $this->Notified->CurrentValue = HtmlDecode($this->Notified->CurrentValue);
            }
            $this->Notified->EditValue = HtmlEncode($this->Notified->CurrentValue);
            $this->Notified->PlaceHolder = RemoveHtml($this->Notified->caption());

            // Purpose
            $this->Purpose->EditAttrs["class"] = "form-control";
            $this->Purpose->EditCustomAttributes = "";
            if (!$this->Purpose->Raw) {
                $this->Purpose->CurrentValue = HtmlDecode($this->Purpose->CurrentValue);
            }
            $this->Purpose->EditValue = HtmlEncode($this->Purpose->CurrentValue);
            $this->Purpose->PlaceHolder = RemoveHtml($this->Purpose->caption());

            // Notes
            $this->Notes->EditAttrs["class"] = "form-control";
            $this->Notes->EditCustomAttributes = "";
            if (!$this->Notes->Raw) {
                $this->Notes->CurrentValue = HtmlDecode($this->Notes->CurrentValue);
            }
            $this->Notes->EditValue = HtmlEncode($this->Notes->CurrentValue);
            $this->Notes->PlaceHolder = RemoveHtml($this->Notes->caption());

            // PatientType
            $this->PatientType->EditAttrs["class"] = "form-control";
            $this->PatientType->EditCustomAttributes = "";
            if (!$this->PatientType->Raw) {
                $this->PatientType->CurrentValue = HtmlDecode($this->PatientType->CurrentValue);
            }
            $this->PatientType->EditValue = HtmlEncode($this->PatientType->CurrentValue);
            $this->PatientType->PlaceHolder = RemoveHtml($this->PatientType->caption());

            // Referal
            $this->Referal->EditAttrs["class"] = "form-control";
            $this->Referal->EditCustomAttributes = "";
            if (!$this->Referal->Raw) {
                $this->Referal->CurrentValue = HtmlDecode($this->Referal->CurrentValue);
            }
            $this->Referal->EditValue = HtmlEncode($this->Referal->CurrentValue);
            $this->Referal->PlaceHolder = RemoveHtml($this->Referal->caption());

            // paymentType
            $this->paymentType->EditAttrs["class"] = "form-control";
            $this->paymentType->EditCustomAttributes = "";
            if (!$this->paymentType->Raw) {
                $this->paymentType->CurrentValue = HtmlDecode($this->paymentType->CurrentValue);
            }
            $this->paymentType->EditValue = HtmlEncode($this->paymentType->CurrentValue);
            $this->paymentType->PlaceHolder = RemoveHtml($this->paymentType->caption());

            // WhereDidYouHear
            $this->WhereDidYouHear->EditAttrs["class"] = "form-control";
            $this->WhereDidYouHear->EditCustomAttributes = "";
            if (!$this->WhereDidYouHear->Raw) {
                $this->WhereDidYouHear->CurrentValue = HtmlDecode($this->WhereDidYouHear->CurrentValue);
            }
            $this->WhereDidYouHear->EditValue = HtmlEncode($this->WhereDidYouHear->CurrentValue);
            $this->WhereDidYouHear->PlaceHolder = RemoveHtml($this->WhereDidYouHear->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // createdBy
            $this->createdBy->EditAttrs["class"] = "form-control";
            $this->createdBy->EditCustomAttributes = "";
            if (!$this->createdBy->Raw) {
                $this->createdBy->CurrentValue = HtmlDecode($this->createdBy->CurrentValue);
            }
            $this->createdBy->EditValue = HtmlEncode($this->createdBy->CurrentValue);
            $this->createdBy->PlaceHolder = RemoveHtml($this->createdBy->caption());

            // createdDateTime
            $this->createdDateTime->EditAttrs["class"] = "form-control";
            $this->createdDateTime->EditCustomAttributes = "";
            $this->createdDateTime->EditValue = HtmlEncode(FormatDateTime($this->createdDateTime->CurrentValue, 8));
            $this->createdDateTime->PlaceHolder = RemoveHtml($this->createdDateTime->caption());

            // PatientTypee
            $this->PatientTypee->EditAttrs["class"] = "form-control";
            $this->PatientTypee->EditCustomAttributes = "";
            if (!$this->PatientTypee->Raw) {
                $this->PatientTypee->CurrentValue = HtmlDecode($this->PatientTypee->CurrentValue);
            }
            $this->PatientTypee->EditValue = HtmlEncode($this->PatientTypee->CurrentValue);
            $this->PatientTypee->PlaceHolder = RemoveHtml($this->PatientTypee->caption());

            // Add refer script

            // start_date
            $this->start_date->LinkCustomAttributes = "";
            $this->start_date->HrefValue = "";

            // end_date
            $this->end_date->LinkCustomAttributes = "";
            $this->end_date->HrefValue = "";

            // patientID
            $this->patientID->LinkCustomAttributes = "";
            $this->patientID->HrefValue = "";

            // patientName
            $this->patientName->LinkCustomAttributes = "";
            $this->patientName->HrefValue = "";

            // DoctorID
            $this->DoctorID->LinkCustomAttributes = "";
            $this->DoctorID->HrefValue = "";

            // DoctorName
            $this->DoctorName->LinkCustomAttributes = "";
            $this->DoctorName->HrefValue = "";

            // DoctorCode
            $this->DoctorCode->LinkCustomAttributes = "";
            $this->DoctorCode->HrefValue = "";

            // Department
            $this->Department->LinkCustomAttributes = "";
            $this->Department->HrefValue = "";

            // AppointmentStatus
            $this->AppointmentStatus->LinkCustomAttributes = "";
            $this->AppointmentStatus->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";

            // text
            $this->text->LinkCustomAttributes = "";
            $this->text->HrefValue = "";

            // appointment_status
            $this->appointment_status->LinkCustomAttributes = "";
            $this->appointment_status->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";

            // SchEmail
            $this->SchEmail->LinkCustomAttributes = "";
            $this->SchEmail->HrefValue = "";

            // appointment_type
            $this->appointment_type->LinkCustomAttributes = "";
            $this->appointment_type->HrefValue = "";

            // Notified
            $this->Notified->LinkCustomAttributes = "";
            $this->Notified->HrefValue = "";

            // Purpose
            $this->Purpose->LinkCustomAttributes = "";
            $this->Purpose->HrefValue = "";

            // Notes
            $this->Notes->LinkCustomAttributes = "";
            $this->Notes->HrefValue = "";

            // PatientType
            $this->PatientType->LinkCustomAttributes = "";
            $this->PatientType->HrefValue = "";

            // Referal
            $this->Referal->LinkCustomAttributes = "";
            $this->Referal->HrefValue = "";

            // paymentType
            $this->paymentType->LinkCustomAttributes = "";
            $this->paymentType->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // createdBy
            $this->createdBy->LinkCustomAttributes = "";
            $this->createdBy->HrefValue = "";

            // createdDateTime
            $this->createdDateTime->LinkCustomAttributes = "";
            $this->createdDateTime->HrefValue = "";

            // PatientTypee
            $this->PatientTypee->LinkCustomAttributes = "";
            $this->PatientTypee->HrefValue = "";
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
        if ($this->start_date->Required) {
            if (!$this->start_date->IsDetailKey && EmptyValue($this->start_date->FormValue)) {
                $this->start_date->addErrorMessage(str_replace("%s", $this->start_date->caption(), $this->start_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->start_date->FormValue)) {
            $this->start_date->addErrorMessage($this->start_date->getErrorMessage(false));
        }
        if ($this->end_date->Required) {
            if (!$this->end_date->IsDetailKey && EmptyValue($this->end_date->FormValue)) {
                $this->end_date->addErrorMessage(str_replace("%s", $this->end_date->caption(), $this->end_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->end_date->FormValue)) {
            $this->end_date->addErrorMessage($this->end_date->getErrorMessage(false));
        }
        if ($this->patientID->Required) {
            if (!$this->patientID->IsDetailKey && EmptyValue($this->patientID->FormValue)) {
                $this->patientID->addErrorMessage(str_replace("%s", $this->patientID->caption(), $this->patientID->RequiredErrorMessage));
            }
        }
        if ($this->patientName->Required) {
            if (!$this->patientName->IsDetailKey && EmptyValue($this->patientName->FormValue)) {
                $this->patientName->addErrorMessage(str_replace("%s", $this->patientName->caption(), $this->patientName->RequiredErrorMessage));
            }
        }
        if ($this->DoctorID->Required) {
            if (!$this->DoctorID->IsDetailKey && EmptyValue($this->DoctorID->FormValue)) {
                $this->DoctorID->addErrorMessage(str_replace("%s", $this->DoctorID->caption(), $this->DoctorID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DoctorID->FormValue)) {
            $this->DoctorID->addErrorMessage($this->DoctorID->getErrorMessage(false));
        }
        if ($this->DoctorName->Required) {
            if (!$this->DoctorName->IsDetailKey && EmptyValue($this->DoctorName->FormValue)) {
                $this->DoctorName->addErrorMessage(str_replace("%s", $this->DoctorName->caption(), $this->DoctorName->RequiredErrorMessage));
            }
        }
        if ($this->DoctorCode->Required) {
            if (!$this->DoctorCode->IsDetailKey && EmptyValue($this->DoctorCode->FormValue)) {
                $this->DoctorCode->addErrorMessage(str_replace("%s", $this->DoctorCode->caption(), $this->DoctorCode->RequiredErrorMessage));
            }
        }
        if ($this->Department->Required) {
            if (!$this->Department->IsDetailKey && EmptyValue($this->Department->FormValue)) {
                $this->Department->addErrorMessage(str_replace("%s", $this->Department->caption(), $this->Department->RequiredErrorMessage));
            }
        }
        if ($this->AppointmentStatus->Required) {
            if (!$this->AppointmentStatus->IsDetailKey && EmptyValue($this->AppointmentStatus->FormValue)) {
                $this->AppointmentStatus->addErrorMessage(str_replace("%s", $this->AppointmentStatus->caption(), $this->AppointmentStatus->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->scheduler_id->Required) {
            if (!$this->scheduler_id->IsDetailKey && EmptyValue($this->scheduler_id->FormValue)) {
                $this->scheduler_id->addErrorMessage(str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
            }
        }
        if ($this->text->Required) {
            if (!$this->text->IsDetailKey && EmptyValue($this->text->FormValue)) {
                $this->text->addErrorMessage(str_replace("%s", $this->text->caption(), $this->text->RequiredErrorMessage));
            }
        }
        if ($this->appointment_status->Required) {
            if (!$this->appointment_status->IsDetailKey && EmptyValue($this->appointment_status->FormValue)) {
                $this->appointment_status->addErrorMessage(str_replace("%s", $this->appointment_status->caption(), $this->appointment_status->RequiredErrorMessage));
            }
        }
        if ($this->PId->Required) {
            if (!$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PId->FormValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
            }
        }
        if ($this->SchEmail->Required) {
            if (!$this->SchEmail->IsDetailKey && EmptyValue($this->SchEmail->FormValue)) {
                $this->SchEmail->addErrorMessage(str_replace("%s", $this->SchEmail->caption(), $this->SchEmail->RequiredErrorMessage));
            }
        }
        if ($this->appointment_type->Required) {
            if (!$this->appointment_type->IsDetailKey && EmptyValue($this->appointment_type->FormValue)) {
                $this->appointment_type->addErrorMessage(str_replace("%s", $this->appointment_type->caption(), $this->appointment_type->RequiredErrorMessage));
            }
        }
        if ($this->Notified->Required) {
            if (!$this->Notified->IsDetailKey && EmptyValue($this->Notified->FormValue)) {
                $this->Notified->addErrorMessage(str_replace("%s", $this->Notified->caption(), $this->Notified->RequiredErrorMessage));
            }
        }
        if ($this->Purpose->Required) {
            if (!$this->Purpose->IsDetailKey && EmptyValue($this->Purpose->FormValue)) {
                $this->Purpose->addErrorMessage(str_replace("%s", $this->Purpose->caption(), $this->Purpose->RequiredErrorMessage));
            }
        }
        if ($this->Notes->Required) {
            if (!$this->Notes->IsDetailKey && EmptyValue($this->Notes->FormValue)) {
                $this->Notes->addErrorMessage(str_replace("%s", $this->Notes->caption(), $this->Notes->RequiredErrorMessage));
            }
        }
        if ($this->PatientType->Required) {
            if (!$this->PatientType->IsDetailKey && EmptyValue($this->PatientType->FormValue)) {
                $this->PatientType->addErrorMessage(str_replace("%s", $this->PatientType->caption(), $this->PatientType->RequiredErrorMessage));
            }
        }
        if ($this->Referal->Required) {
            if (!$this->Referal->IsDetailKey && EmptyValue($this->Referal->FormValue)) {
                $this->Referal->addErrorMessage(str_replace("%s", $this->Referal->caption(), $this->Referal->RequiredErrorMessage));
            }
        }
        if ($this->paymentType->Required) {
            if (!$this->paymentType->IsDetailKey && EmptyValue($this->paymentType->FormValue)) {
                $this->paymentType->addErrorMessage(str_replace("%s", $this->paymentType->caption(), $this->paymentType->RequiredErrorMessage));
            }
        }
        if ($this->WhereDidYouHear->Required) {
            if (!$this->WhereDidYouHear->IsDetailKey && EmptyValue($this->WhereDidYouHear->FormValue)) {
                $this->WhereDidYouHear->addErrorMessage(str_replace("%s", $this->WhereDidYouHear->caption(), $this->WhereDidYouHear->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if ($this->createdBy->Required) {
            if (!$this->createdBy->IsDetailKey && EmptyValue($this->createdBy->FormValue)) {
                $this->createdBy->addErrorMessage(str_replace("%s", $this->createdBy->caption(), $this->createdBy->RequiredErrorMessage));
            }
        }
        if ($this->createdDateTime->Required) {
            if (!$this->createdDateTime->IsDetailKey && EmptyValue($this->createdDateTime->FormValue)) {
                $this->createdDateTime->addErrorMessage(str_replace("%s", $this->createdDateTime->caption(), $this->createdDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->createdDateTime->FormValue)) {
            $this->createdDateTime->addErrorMessage($this->createdDateTime->getErrorMessage(false));
        }
        if ($this->PatientTypee->Required) {
            if (!$this->PatientTypee->IsDetailKey && EmptyValue($this->PatientTypee->FormValue)) {
                $this->PatientTypee->addErrorMessage(str_replace("%s", $this->PatientTypee->caption(), $this->PatientTypee->RequiredErrorMessage));
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

        // start_date
        $this->start_date->setDbValueDef($rsnew, UnFormatDateTime($this->start_date->CurrentValue, 0), null, false);

        // end_date
        $this->end_date->setDbValueDef($rsnew, UnFormatDateTime($this->end_date->CurrentValue, 0), null, false);

        // patientID
        $this->patientID->setDbValueDef($rsnew, $this->patientID->CurrentValue, null, false);

        // patientName
        $this->patientName->setDbValueDef($rsnew, $this->patientName->CurrentValue, null, false);

        // DoctorID
        $this->DoctorID->setDbValueDef($rsnew, $this->DoctorID->CurrentValue, null, false);

        // DoctorName
        $this->DoctorName->setDbValueDef($rsnew, $this->DoctorName->CurrentValue, null, false);

        // DoctorCode
        $this->DoctorCode->setDbValueDef($rsnew, $this->DoctorCode->CurrentValue, null, false);

        // Department
        $this->Department->setDbValueDef($rsnew, $this->Department->CurrentValue, null, false);

        // AppointmentStatus
        $this->AppointmentStatus->setDbValueDef($rsnew, $this->AppointmentStatus->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // scheduler_id
        $this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, null, false);

        // text
        $this->text->setDbValueDef($rsnew, $this->text->CurrentValue, null, false);

        // appointment_status
        $this->appointment_status->setDbValueDef($rsnew, $this->appointment_status->CurrentValue, null, false);

        // PId
        $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, false);

        // MobileNumber
        $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, false);

        // SchEmail
        $this->SchEmail->setDbValueDef($rsnew, $this->SchEmail->CurrentValue, null, false);

        // appointment_type
        $this->appointment_type->setDbValueDef($rsnew, $this->appointment_type->CurrentValue, null, false);

        // Notified
        $this->Notified->setDbValueDef($rsnew, $this->Notified->CurrentValue, null, false);

        // Purpose
        $this->Purpose->setDbValueDef($rsnew, $this->Purpose->CurrentValue, null, false);

        // Notes
        $this->Notes->setDbValueDef($rsnew, $this->Notes->CurrentValue, null, false);

        // PatientType
        $this->PatientType->setDbValueDef($rsnew, $this->PatientType->CurrentValue, null, false);

        // Referal
        $this->Referal->setDbValueDef($rsnew, $this->Referal->CurrentValue, null, false);

        // paymentType
        $this->paymentType->setDbValueDef($rsnew, $this->paymentType->CurrentValue, null, false);

        // WhereDidYouHear
        $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // createdBy
        $this->createdBy->setDbValueDef($rsnew, $this->createdBy->CurrentValue, null, false);

        // createdDateTime
        $this->createdDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->createdDateTime->CurrentValue, 0), null, false);

        // PatientTypee
        $this->PatientTypee->setDbValueDef($rsnew, $this->PatientTypee->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("AppointmentSchedulerList"), "", $this->TableVar, true);
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
