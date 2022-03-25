<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class MonitorTreatmentPlanEdit extends MonitorTreatmentPlan
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'monitor_treatment_plan';

    // Page object name
    public $PageObjName = "MonitorTreatmentPlanEdit";

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

        // Table object (monitor_treatment_plan)
        if (!isset($GLOBALS["monitor_treatment_plan"]) || get_class($GLOBALS["monitor_treatment_plan"]) == PROJECT_NAMESPACE . "monitor_treatment_plan") {
            $GLOBALS["monitor_treatment_plan"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'monitor_treatment_plan');
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
                $doc = new $class(Container("monitor_treatment_plan"));
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
                    if ($pageName == "MonitorTreatmentPlanView") {
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
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;

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
        $this->id->setVisibility();
        $this->PatId->setVisibility();
        $this->PatientId->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->MobileNo->setVisibility();
        $this->ConsultantName->setVisibility();
        $this->RefDrName->setVisibility();
        $this->RefDrMobileNo->setVisibility();
        $this->NewVisitDate->setVisibility();
        $this->NewVisitYesNo->setVisibility();
        $this->Treatment->setVisibility();
        $this->IUIDoneDate1->setVisibility();
        $this->IUIDoneYesNo1->setVisibility();
        $this->UPTTestDate1->setVisibility();
        $this->UPTTestYesNo1->setVisibility();
        $this->IUIDoneDate2->setVisibility();
        $this->IUIDoneYesNo2->setVisibility();
        $this->UPTTestDate2->setVisibility();
        $this->UPTTestYesNo2->setVisibility();
        $this->IUIDoneDate3->setVisibility();
        $this->IUIDoneYesNo3->setVisibility();
        $this->UPTTestDate3->setVisibility();
        $this->UPTTestYesNo3->setVisibility();
        $this->IUIDoneDate4->setVisibility();
        $this->IUIDoneYesNo4->setVisibility();
        $this->UPTTestDate4->setVisibility();
        $this->UPTTestYesNo4->setVisibility();
        $this->IVFStimulationDate->setVisibility();
        $this->IVFStimulationYesNo->setVisibility();
        $this->OPUDate->setVisibility();
        $this->OPUYesNo->setVisibility();
        $this->ETDate->setVisibility();
        $this->ETYesNo->setVisibility();
        $this->BetaHCGDate->setVisibility();
        $this->BetaHCGYesNo->setVisibility();
        $this->FETDate->setVisibility();
        $this->FETYesNo->setVisibility();
        $this->FBetaHCGDate->setVisibility();
        $this->FBetaHCGYesNo->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->HospID->setVisibility();
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
        $this->FormClassName = "ew-form ew-edit-form ew-horizontal";
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id") ?? Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->id->setOldValue($this->id->QueryStringValue);
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->id->setOldValue($this->id->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Load key from Form
                if ($CurrentForm->hasValue("x_id")) {
                    $this->id->setFormValue($CurrentForm->getValue("x_id"));
                }
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id") ?? Route("id")) !== null) {
                    $this->id->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id->CurrentValue = null;
                }
            }

            // Load recordset
            if ($this->isShow()) {
                // Load current record
                $loaded = $this->loadRow();
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                if (!$loaded) { // Load record based on key
                    if ($this->getFailureMessage() == "") {
                        $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
                    }
                    $this->terminate("MonitorTreatmentPlanList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "MonitorTreatmentPlanList") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                $this->SendEmail = true; // Send email on update success
                if ($this->editRow()) { // Update record based on key
                    if ($this->getSuccessMessage() == "") {
                        $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
                    }
                    if (IsApi()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = ROWTYPE_EDIT; // Render as Edit
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

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }

        // Check field name 'PatId' first before field var 'x_PatId'
        $val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
        if (!$this->PatId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatId->Visible = false; // Disable update for API request
            } else {
                $this->PatId->setFormValue($val);
            }
        }

        // Check field name 'PatientId' first before field var 'x_PatientId'
        $val = $CurrentForm->hasValue("PatientId") ? $CurrentForm->getValue("PatientId") : $CurrentForm->getValue("x_PatientId");
        if (!$this->PatientId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientId->Visible = false; // Disable update for API request
            } else {
                $this->PatientId->setFormValue($val);
            }
        }

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }

        // Check field name 'MobileNo' first before field var 'x_MobileNo'
        $val = $CurrentForm->hasValue("MobileNo") ? $CurrentForm->getValue("MobileNo") : $CurrentForm->getValue("x_MobileNo");
        if (!$this->MobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MobileNo->Visible = false; // Disable update for API request
            } else {
                $this->MobileNo->setFormValue($val);
            }
        }

        // Check field name 'ConsultantName' first before field var 'x_ConsultantName'
        $val = $CurrentForm->hasValue("ConsultantName") ? $CurrentForm->getValue("ConsultantName") : $CurrentForm->getValue("x_ConsultantName");
        if (!$this->ConsultantName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ConsultantName->Visible = false; // Disable update for API request
            } else {
                $this->ConsultantName->setFormValue($val);
            }
        }

        // Check field name 'RefDrName' first before field var 'x_RefDrName'
        $val = $CurrentForm->hasValue("RefDrName") ? $CurrentForm->getValue("RefDrName") : $CurrentForm->getValue("x_RefDrName");
        if (!$this->RefDrName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefDrName->Visible = false; // Disable update for API request
            } else {
                $this->RefDrName->setFormValue($val);
            }
        }

        // Check field name 'RefDrMobileNo' first before field var 'x_RefDrMobileNo'
        $val = $CurrentForm->hasValue("RefDrMobileNo") ? $CurrentForm->getValue("RefDrMobileNo") : $CurrentForm->getValue("x_RefDrMobileNo");
        if (!$this->RefDrMobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RefDrMobileNo->Visible = false; // Disable update for API request
            } else {
                $this->RefDrMobileNo->setFormValue($val);
            }
        }

        // Check field name 'NewVisitDate' first before field var 'x_NewVisitDate'
        $val = $CurrentForm->hasValue("NewVisitDate") ? $CurrentForm->getValue("NewVisitDate") : $CurrentForm->getValue("x_NewVisitDate");
        if (!$this->NewVisitDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NewVisitDate->Visible = false; // Disable update for API request
            } else {
                $this->NewVisitDate->setFormValue($val);
            }
            $this->NewVisitDate->CurrentValue = UnFormatDateTime($this->NewVisitDate->CurrentValue, 0);
        }

        // Check field name 'NewVisitYesNo' first before field var 'x_NewVisitYesNo'
        $val = $CurrentForm->hasValue("NewVisitYesNo") ? $CurrentForm->getValue("NewVisitYesNo") : $CurrentForm->getValue("x_NewVisitYesNo");
        if (!$this->NewVisitYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NewVisitYesNo->Visible = false; // Disable update for API request
            } else {
                $this->NewVisitYesNo->setFormValue($val);
            }
        }

        // Check field name 'Treatment' first before field var 'x_Treatment'
        $val = $CurrentForm->hasValue("Treatment") ? $CurrentForm->getValue("Treatment") : $CurrentForm->getValue("x_Treatment");
        if (!$this->Treatment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Treatment->Visible = false; // Disable update for API request
            } else {
                $this->Treatment->setFormValue($val);
            }
        }

        // Check field name 'IUIDoneDate1' first before field var 'x_IUIDoneDate1'
        $val = $CurrentForm->hasValue("IUIDoneDate1") ? $CurrentForm->getValue("IUIDoneDate1") : $CurrentForm->getValue("x_IUIDoneDate1");
        if (!$this->IUIDoneDate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneDate1->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneDate1->setFormValue($val);
            }
            $this->IUIDoneDate1->CurrentValue = UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 0);
        }

        // Check field name 'IUIDoneYesNo1' first before field var 'x_IUIDoneYesNo1'
        $val = $CurrentForm->hasValue("IUIDoneYesNo1") ? $CurrentForm->getValue("IUIDoneYesNo1") : $CurrentForm->getValue("x_IUIDoneYesNo1");
        if (!$this->IUIDoneYesNo1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneYesNo1->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneYesNo1->setFormValue($val);
            }
        }

        // Check field name 'UPTTestDate1' first before field var 'x_UPTTestDate1'
        $val = $CurrentForm->hasValue("UPTTestDate1") ? $CurrentForm->getValue("UPTTestDate1") : $CurrentForm->getValue("x_UPTTestDate1");
        if (!$this->UPTTestDate1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestDate1->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestDate1->setFormValue($val);
            }
            $this->UPTTestDate1->CurrentValue = UnFormatDateTime($this->UPTTestDate1->CurrentValue, 0);
        }

        // Check field name 'UPTTestYesNo1' first before field var 'x_UPTTestYesNo1'
        $val = $CurrentForm->hasValue("UPTTestYesNo1") ? $CurrentForm->getValue("UPTTestYesNo1") : $CurrentForm->getValue("x_UPTTestYesNo1");
        if (!$this->UPTTestYesNo1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestYesNo1->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestYesNo1->setFormValue($val);
            }
        }

        // Check field name 'IUIDoneDate2' first before field var 'x_IUIDoneDate2'
        $val = $CurrentForm->hasValue("IUIDoneDate2") ? $CurrentForm->getValue("IUIDoneDate2") : $CurrentForm->getValue("x_IUIDoneDate2");
        if (!$this->IUIDoneDate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneDate2->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneDate2->setFormValue($val);
            }
            $this->IUIDoneDate2->CurrentValue = UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 0);
        }

        // Check field name 'IUIDoneYesNo2' first before field var 'x_IUIDoneYesNo2'
        $val = $CurrentForm->hasValue("IUIDoneYesNo2") ? $CurrentForm->getValue("IUIDoneYesNo2") : $CurrentForm->getValue("x_IUIDoneYesNo2");
        if (!$this->IUIDoneYesNo2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneYesNo2->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneYesNo2->setFormValue($val);
            }
        }

        // Check field name 'UPTTestDate2' first before field var 'x_UPTTestDate2'
        $val = $CurrentForm->hasValue("UPTTestDate2") ? $CurrentForm->getValue("UPTTestDate2") : $CurrentForm->getValue("x_UPTTestDate2");
        if (!$this->UPTTestDate2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestDate2->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestDate2->setFormValue($val);
            }
            $this->UPTTestDate2->CurrentValue = UnFormatDateTime($this->UPTTestDate2->CurrentValue, 0);
        }

        // Check field name 'UPTTestYesNo2' first before field var 'x_UPTTestYesNo2'
        $val = $CurrentForm->hasValue("UPTTestYesNo2") ? $CurrentForm->getValue("UPTTestYesNo2") : $CurrentForm->getValue("x_UPTTestYesNo2");
        if (!$this->UPTTestYesNo2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestYesNo2->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestYesNo2->setFormValue($val);
            }
        }

        // Check field name 'IUIDoneDate3' first before field var 'x_IUIDoneDate3'
        $val = $CurrentForm->hasValue("IUIDoneDate3") ? $CurrentForm->getValue("IUIDoneDate3") : $CurrentForm->getValue("x_IUIDoneDate3");
        if (!$this->IUIDoneDate3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneDate3->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneDate3->setFormValue($val);
            }
            $this->IUIDoneDate3->CurrentValue = UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 0);
        }

        // Check field name 'IUIDoneYesNo3' first before field var 'x_IUIDoneYesNo3'
        $val = $CurrentForm->hasValue("IUIDoneYesNo3") ? $CurrentForm->getValue("IUIDoneYesNo3") : $CurrentForm->getValue("x_IUIDoneYesNo3");
        if (!$this->IUIDoneYesNo3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneYesNo3->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneYesNo3->setFormValue($val);
            }
        }

        // Check field name 'UPTTestDate3' first before field var 'x_UPTTestDate3'
        $val = $CurrentForm->hasValue("UPTTestDate3") ? $CurrentForm->getValue("UPTTestDate3") : $CurrentForm->getValue("x_UPTTestDate3");
        if (!$this->UPTTestDate3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestDate3->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestDate3->setFormValue($val);
            }
            $this->UPTTestDate3->CurrentValue = UnFormatDateTime($this->UPTTestDate3->CurrentValue, 0);
        }

        // Check field name 'UPTTestYesNo3' first before field var 'x_UPTTestYesNo3'
        $val = $CurrentForm->hasValue("UPTTestYesNo3") ? $CurrentForm->getValue("UPTTestYesNo3") : $CurrentForm->getValue("x_UPTTestYesNo3");
        if (!$this->UPTTestYesNo3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestYesNo3->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestYesNo3->setFormValue($val);
            }
        }

        // Check field name 'IUIDoneDate4' first before field var 'x_IUIDoneDate4'
        $val = $CurrentForm->hasValue("IUIDoneDate4") ? $CurrentForm->getValue("IUIDoneDate4") : $CurrentForm->getValue("x_IUIDoneDate4");
        if (!$this->IUIDoneDate4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneDate4->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneDate4->setFormValue($val);
            }
            $this->IUIDoneDate4->CurrentValue = UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 0);
        }

        // Check field name 'IUIDoneYesNo4' first before field var 'x_IUIDoneYesNo4'
        $val = $CurrentForm->hasValue("IUIDoneYesNo4") ? $CurrentForm->getValue("IUIDoneYesNo4") : $CurrentForm->getValue("x_IUIDoneYesNo4");
        if (!$this->IUIDoneYesNo4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUIDoneYesNo4->Visible = false; // Disable update for API request
            } else {
                $this->IUIDoneYesNo4->setFormValue($val);
            }
        }

        // Check field name 'UPTTestDate4' first before field var 'x_UPTTestDate4'
        $val = $CurrentForm->hasValue("UPTTestDate4") ? $CurrentForm->getValue("UPTTestDate4") : $CurrentForm->getValue("x_UPTTestDate4");
        if (!$this->UPTTestDate4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestDate4->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestDate4->setFormValue($val);
            }
            $this->UPTTestDate4->CurrentValue = UnFormatDateTime($this->UPTTestDate4->CurrentValue, 0);
        }

        // Check field name 'UPTTestYesNo4' first before field var 'x_UPTTestYesNo4'
        $val = $CurrentForm->hasValue("UPTTestYesNo4") ? $CurrentForm->getValue("UPTTestYesNo4") : $CurrentForm->getValue("x_UPTTestYesNo4");
        if (!$this->UPTTestYesNo4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UPTTestYesNo4->Visible = false; // Disable update for API request
            } else {
                $this->UPTTestYesNo4->setFormValue($val);
            }
        }

        // Check field name 'IVFStimulationDate' first before field var 'x_IVFStimulationDate'
        $val = $CurrentForm->hasValue("IVFStimulationDate") ? $CurrentForm->getValue("IVFStimulationDate") : $CurrentForm->getValue("x_IVFStimulationDate");
        if (!$this->IVFStimulationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IVFStimulationDate->Visible = false; // Disable update for API request
            } else {
                $this->IVFStimulationDate->setFormValue($val);
            }
            $this->IVFStimulationDate->CurrentValue = UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 0);
        }

        // Check field name 'IVFStimulationYesNo' first before field var 'x_IVFStimulationYesNo'
        $val = $CurrentForm->hasValue("IVFStimulationYesNo") ? $CurrentForm->getValue("IVFStimulationYesNo") : $CurrentForm->getValue("x_IVFStimulationYesNo");
        if (!$this->IVFStimulationYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IVFStimulationYesNo->Visible = false; // Disable update for API request
            } else {
                $this->IVFStimulationYesNo->setFormValue($val);
            }
        }

        // Check field name 'OPUDate' first before field var 'x_OPUDate'
        $val = $CurrentForm->hasValue("OPUDate") ? $CurrentForm->getValue("OPUDate") : $CurrentForm->getValue("x_OPUDate");
        if (!$this->OPUDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPUDate->Visible = false; // Disable update for API request
            } else {
                $this->OPUDate->setFormValue($val);
            }
            $this->OPUDate->CurrentValue = UnFormatDateTime($this->OPUDate->CurrentValue, 0);
        }

        // Check field name 'OPUYesNo' first before field var 'x_OPUYesNo'
        $val = $CurrentForm->hasValue("OPUYesNo") ? $CurrentForm->getValue("OPUYesNo") : $CurrentForm->getValue("x_OPUYesNo");
        if (!$this->OPUYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPUYesNo->Visible = false; // Disable update for API request
            } else {
                $this->OPUYesNo->setFormValue($val);
            }
        }

        // Check field name 'ETDate' first before field var 'x_ETDate'
        $val = $CurrentForm->hasValue("ETDate") ? $CurrentForm->getValue("ETDate") : $CurrentForm->getValue("x_ETDate");
        if (!$this->ETDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETDate->Visible = false; // Disable update for API request
            } else {
                $this->ETDate->setFormValue($val);
            }
            $this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
        }

        // Check field name 'ETYesNo' first before field var 'x_ETYesNo'
        $val = $CurrentForm->hasValue("ETYesNo") ? $CurrentForm->getValue("ETYesNo") : $CurrentForm->getValue("x_ETYesNo");
        if (!$this->ETYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETYesNo->Visible = false; // Disable update for API request
            } else {
                $this->ETYesNo->setFormValue($val);
            }
        }

        // Check field name 'BetaHCGDate' first before field var 'x_BetaHCGDate'
        $val = $CurrentForm->hasValue("BetaHCGDate") ? $CurrentForm->getValue("BetaHCGDate") : $CurrentForm->getValue("x_BetaHCGDate");
        if (!$this->BetaHCGDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BetaHCGDate->Visible = false; // Disable update for API request
            } else {
                $this->BetaHCGDate->setFormValue($val);
            }
            $this->BetaHCGDate->CurrentValue = UnFormatDateTime($this->BetaHCGDate->CurrentValue, 0);
        }

        // Check field name 'BetaHCGYesNo' first before field var 'x_BetaHCGYesNo'
        $val = $CurrentForm->hasValue("BetaHCGYesNo") ? $CurrentForm->getValue("BetaHCGYesNo") : $CurrentForm->getValue("x_BetaHCGYesNo");
        if (!$this->BetaHCGYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BetaHCGYesNo->Visible = false; // Disable update for API request
            } else {
                $this->BetaHCGYesNo->setFormValue($val);
            }
        }

        // Check field name 'FETDate' first before field var 'x_FETDate'
        $val = $CurrentForm->hasValue("FETDate") ? $CurrentForm->getValue("FETDate") : $CurrentForm->getValue("x_FETDate");
        if (!$this->FETDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FETDate->Visible = false; // Disable update for API request
            } else {
                $this->FETDate->setFormValue($val);
            }
            $this->FETDate->CurrentValue = UnFormatDateTime($this->FETDate->CurrentValue, 0);
        }

        // Check field name 'FETYesNo' first before field var 'x_FETYesNo'
        $val = $CurrentForm->hasValue("FETYesNo") ? $CurrentForm->getValue("FETYesNo") : $CurrentForm->getValue("x_FETYesNo");
        if (!$this->FETYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FETYesNo->Visible = false; // Disable update for API request
            } else {
                $this->FETYesNo->setFormValue($val);
            }
        }

        // Check field name 'FBetaHCGDate' first before field var 'x_FBetaHCGDate'
        $val = $CurrentForm->hasValue("FBetaHCGDate") ? $CurrentForm->getValue("FBetaHCGDate") : $CurrentForm->getValue("x_FBetaHCGDate");
        if (!$this->FBetaHCGDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FBetaHCGDate->Visible = false; // Disable update for API request
            } else {
                $this->FBetaHCGDate->setFormValue($val);
            }
            $this->FBetaHCGDate->CurrentValue = UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 0);
        }

        // Check field name 'FBetaHCGYesNo' first before field var 'x_FBetaHCGYesNo'
        $val = $CurrentForm->hasValue("FBetaHCGYesNo") ? $CurrentForm->getValue("FBetaHCGYesNo") : $CurrentForm->getValue("x_FBetaHCGYesNo");
        if (!$this->FBetaHCGYesNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FBetaHCGYesNo->Visible = false; // Disable update for API request
            } else {
                $this->FBetaHCGYesNo->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->PatId->CurrentValue = $this->PatId->FormValue;
        $this->PatientId->CurrentValue = $this->PatientId->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->MobileNo->CurrentValue = $this->MobileNo->FormValue;
        $this->ConsultantName->CurrentValue = $this->ConsultantName->FormValue;
        $this->RefDrName->CurrentValue = $this->RefDrName->FormValue;
        $this->RefDrMobileNo->CurrentValue = $this->RefDrMobileNo->FormValue;
        $this->NewVisitDate->CurrentValue = $this->NewVisitDate->FormValue;
        $this->NewVisitDate->CurrentValue = UnFormatDateTime($this->NewVisitDate->CurrentValue, 0);
        $this->NewVisitYesNo->CurrentValue = $this->NewVisitYesNo->FormValue;
        $this->Treatment->CurrentValue = $this->Treatment->FormValue;
        $this->IUIDoneDate1->CurrentValue = $this->IUIDoneDate1->FormValue;
        $this->IUIDoneDate1->CurrentValue = UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 0);
        $this->IUIDoneYesNo1->CurrentValue = $this->IUIDoneYesNo1->FormValue;
        $this->UPTTestDate1->CurrentValue = $this->UPTTestDate1->FormValue;
        $this->UPTTestDate1->CurrentValue = UnFormatDateTime($this->UPTTestDate1->CurrentValue, 0);
        $this->UPTTestYesNo1->CurrentValue = $this->UPTTestYesNo1->FormValue;
        $this->IUIDoneDate2->CurrentValue = $this->IUIDoneDate2->FormValue;
        $this->IUIDoneDate2->CurrentValue = UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 0);
        $this->IUIDoneYesNo2->CurrentValue = $this->IUIDoneYesNo2->FormValue;
        $this->UPTTestDate2->CurrentValue = $this->UPTTestDate2->FormValue;
        $this->UPTTestDate2->CurrentValue = UnFormatDateTime($this->UPTTestDate2->CurrentValue, 0);
        $this->UPTTestYesNo2->CurrentValue = $this->UPTTestYesNo2->FormValue;
        $this->IUIDoneDate3->CurrentValue = $this->IUIDoneDate3->FormValue;
        $this->IUIDoneDate3->CurrentValue = UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 0);
        $this->IUIDoneYesNo3->CurrentValue = $this->IUIDoneYesNo3->FormValue;
        $this->UPTTestDate3->CurrentValue = $this->UPTTestDate3->FormValue;
        $this->UPTTestDate3->CurrentValue = UnFormatDateTime($this->UPTTestDate3->CurrentValue, 0);
        $this->UPTTestYesNo3->CurrentValue = $this->UPTTestYesNo3->FormValue;
        $this->IUIDoneDate4->CurrentValue = $this->IUIDoneDate4->FormValue;
        $this->IUIDoneDate4->CurrentValue = UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 0);
        $this->IUIDoneYesNo4->CurrentValue = $this->IUIDoneYesNo4->FormValue;
        $this->UPTTestDate4->CurrentValue = $this->UPTTestDate4->FormValue;
        $this->UPTTestDate4->CurrentValue = UnFormatDateTime($this->UPTTestDate4->CurrentValue, 0);
        $this->UPTTestYesNo4->CurrentValue = $this->UPTTestYesNo4->FormValue;
        $this->IVFStimulationDate->CurrentValue = $this->IVFStimulationDate->FormValue;
        $this->IVFStimulationDate->CurrentValue = UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 0);
        $this->IVFStimulationYesNo->CurrentValue = $this->IVFStimulationYesNo->FormValue;
        $this->OPUDate->CurrentValue = $this->OPUDate->FormValue;
        $this->OPUDate->CurrentValue = UnFormatDateTime($this->OPUDate->CurrentValue, 0);
        $this->OPUYesNo->CurrentValue = $this->OPUYesNo->FormValue;
        $this->ETDate->CurrentValue = $this->ETDate->FormValue;
        $this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
        $this->ETYesNo->CurrentValue = $this->ETYesNo->FormValue;
        $this->BetaHCGDate->CurrentValue = $this->BetaHCGDate->FormValue;
        $this->BetaHCGDate->CurrentValue = UnFormatDateTime($this->BetaHCGDate->CurrentValue, 0);
        $this->BetaHCGYesNo->CurrentValue = $this->BetaHCGYesNo->FormValue;
        $this->FETDate->CurrentValue = $this->FETDate->FormValue;
        $this->FETDate->CurrentValue = UnFormatDateTime($this->FETDate->CurrentValue, 0);
        $this->FETYesNo->CurrentValue = $this->FETYesNo->FormValue;
        $this->FBetaHCGDate->CurrentValue = $this->FBetaHCGDate->FormValue;
        $this->FBetaHCGDate->CurrentValue = UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 0);
        $this->FBetaHCGYesNo->CurrentValue = $this->FBetaHCGYesNo->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->HospID->CurrentValue = $this->HospID->FormValue;
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
        $this->PatId->setDbValue($row['PatId']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->MobileNo->setDbValue($row['MobileNo']);
        $this->ConsultantName->setDbValue($row['ConsultantName']);
        $this->RefDrName->setDbValue($row['RefDrName']);
        $this->RefDrMobileNo->setDbValue($row['RefDrMobileNo']);
        $this->NewVisitDate->setDbValue($row['NewVisitDate']);
        $this->NewVisitYesNo->setDbValue($row['NewVisitYesNo']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->IUIDoneDate1->setDbValue($row['IUIDoneDate1']);
        $this->IUIDoneYesNo1->setDbValue($row['IUIDoneYesNo1']);
        $this->UPTTestDate1->setDbValue($row['UPTTestDate1']);
        $this->UPTTestYesNo1->setDbValue($row['UPTTestYesNo1']);
        $this->IUIDoneDate2->setDbValue($row['IUIDoneDate2']);
        $this->IUIDoneYesNo2->setDbValue($row['IUIDoneYesNo2']);
        $this->UPTTestDate2->setDbValue($row['UPTTestDate2']);
        $this->UPTTestYesNo2->setDbValue($row['UPTTestYesNo2']);
        $this->IUIDoneDate3->setDbValue($row['IUIDoneDate3']);
        $this->IUIDoneYesNo3->setDbValue($row['IUIDoneYesNo3']);
        $this->UPTTestDate3->setDbValue($row['UPTTestDate3']);
        $this->UPTTestYesNo3->setDbValue($row['UPTTestYesNo3']);
        $this->IUIDoneDate4->setDbValue($row['IUIDoneDate4']);
        $this->IUIDoneYesNo4->setDbValue($row['IUIDoneYesNo4']);
        $this->UPTTestDate4->setDbValue($row['UPTTestDate4']);
        $this->UPTTestYesNo4->setDbValue($row['UPTTestYesNo4']);
        $this->IVFStimulationDate->setDbValue($row['IVFStimulationDate']);
        $this->IVFStimulationYesNo->setDbValue($row['IVFStimulationYesNo']);
        $this->OPUDate->setDbValue($row['OPUDate']);
        $this->OPUYesNo->setDbValue($row['OPUYesNo']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->ETYesNo->setDbValue($row['ETYesNo']);
        $this->BetaHCGDate->setDbValue($row['BetaHCGDate']);
        $this->BetaHCGYesNo->setDbValue($row['BetaHCGYesNo']);
        $this->FETDate->setDbValue($row['FETDate']);
        $this->FETYesNo->setDbValue($row['FETYesNo']);
        $this->FBetaHCGDate->setDbValue($row['FBetaHCGDate']);
        $this->FBetaHCGYesNo->setDbValue($row['FBetaHCGYesNo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PatId'] = null;
        $row['PatientId'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['MobileNo'] = null;
        $row['ConsultantName'] = null;
        $row['RefDrName'] = null;
        $row['RefDrMobileNo'] = null;
        $row['NewVisitDate'] = null;
        $row['NewVisitYesNo'] = null;
        $row['Treatment'] = null;
        $row['IUIDoneDate1'] = null;
        $row['IUIDoneYesNo1'] = null;
        $row['UPTTestDate1'] = null;
        $row['UPTTestYesNo1'] = null;
        $row['IUIDoneDate2'] = null;
        $row['IUIDoneYesNo2'] = null;
        $row['UPTTestDate2'] = null;
        $row['UPTTestYesNo2'] = null;
        $row['IUIDoneDate3'] = null;
        $row['IUIDoneYesNo3'] = null;
        $row['UPTTestDate3'] = null;
        $row['UPTTestYesNo3'] = null;
        $row['IUIDoneDate4'] = null;
        $row['IUIDoneYesNo4'] = null;
        $row['UPTTestDate4'] = null;
        $row['UPTTestYesNo4'] = null;
        $row['IVFStimulationDate'] = null;
        $row['IVFStimulationYesNo'] = null;
        $row['OPUDate'] = null;
        $row['OPUYesNo'] = null;
        $row['ETDate'] = null;
        $row['ETYesNo'] = null;
        $row['BetaHCGDate'] = null;
        $row['BetaHCGYesNo'] = null;
        $row['FETDate'] = null;
        $row['FETYesNo'] = null;
        $row['FBetaHCGDate'] = null;
        $row['FBetaHCGYesNo'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['HospID'] = null;
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

        // PatId

        // PatientId

        // PatientName

        // Age

        // MobileNo

        // ConsultantName

        // RefDrName

        // RefDrMobileNo

        // NewVisitDate

        // NewVisitYesNo

        // Treatment

        // IUIDoneDate1

        // IUIDoneYesNo1

        // UPTTestDate1

        // UPTTestYesNo1

        // IUIDoneDate2

        // IUIDoneYesNo2

        // UPTTestDate2

        // UPTTestYesNo2

        // IUIDoneDate3

        // IUIDoneYesNo3

        // UPTTestDate3

        // UPTTestYesNo3

        // IUIDoneDate4

        // IUIDoneYesNo4

        // UPTTestDate4

        // UPTTestYesNo4

        // IVFStimulationDate

        // IVFStimulationYesNo

        // OPUDate

        // OPUYesNo

        // ETDate

        // ETYesNo

        // BetaHCGDate

        // BetaHCGYesNo

        // FETDate

        // FETYesNo

        // FBetaHCGDate

        // FBetaHCGYesNo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $this->PatId->ViewValue = $this->PatId->CurrentValue;
            $this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
            $this->PatId->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // MobileNo
            $this->MobileNo->ViewValue = $this->MobileNo->CurrentValue;
            $this->MobileNo->ViewCustomAttributes = "";

            // ConsultantName
            $this->ConsultantName->ViewValue = $this->ConsultantName->CurrentValue;
            $this->ConsultantName->ViewCustomAttributes = "";

            // RefDrName
            $this->RefDrName->ViewValue = $this->RefDrName->CurrentValue;
            $this->RefDrName->ViewCustomAttributes = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->ViewValue = $this->RefDrMobileNo->CurrentValue;
            $this->RefDrMobileNo->ViewCustomAttributes = "";

            // NewVisitDate
            $this->NewVisitDate->ViewValue = $this->NewVisitDate->CurrentValue;
            $this->NewVisitDate->ViewValue = FormatDateTime($this->NewVisitDate->ViewValue, 0);
            $this->NewVisitDate->ViewCustomAttributes = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->ViewValue = $this->NewVisitYesNo->CurrentValue;
            $this->NewVisitYesNo->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->ViewValue = $this->IUIDoneDate1->CurrentValue;
            $this->IUIDoneDate1->ViewValue = FormatDateTime($this->IUIDoneDate1->ViewValue, 0);
            $this->IUIDoneDate1->ViewCustomAttributes = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->ViewValue = $this->IUIDoneYesNo1->CurrentValue;
            $this->IUIDoneYesNo1->ViewCustomAttributes = "";

            // UPTTestDate1
            $this->UPTTestDate1->ViewValue = $this->UPTTestDate1->CurrentValue;
            $this->UPTTestDate1->ViewValue = FormatDateTime($this->UPTTestDate1->ViewValue, 0);
            $this->UPTTestDate1->ViewCustomAttributes = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->ViewValue = $this->UPTTestYesNo1->CurrentValue;
            $this->UPTTestYesNo1->ViewCustomAttributes = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->ViewValue = $this->IUIDoneDate2->CurrentValue;
            $this->IUIDoneDate2->ViewValue = FormatDateTime($this->IUIDoneDate2->ViewValue, 0);
            $this->IUIDoneDate2->ViewCustomAttributes = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->ViewValue = $this->IUIDoneYesNo2->CurrentValue;
            $this->IUIDoneYesNo2->ViewCustomAttributes = "";

            // UPTTestDate2
            $this->UPTTestDate2->ViewValue = $this->UPTTestDate2->CurrentValue;
            $this->UPTTestDate2->ViewValue = FormatDateTime($this->UPTTestDate2->ViewValue, 0);
            $this->UPTTestDate2->ViewCustomAttributes = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->ViewValue = $this->UPTTestYesNo2->CurrentValue;
            $this->UPTTestYesNo2->ViewCustomAttributes = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->ViewValue = $this->IUIDoneDate3->CurrentValue;
            $this->IUIDoneDate3->ViewValue = FormatDateTime($this->IUIDoneDate3->ViewValue, 0);
            $this->IUIDoneDate3->ViewCustomAttributes = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->ViewValue = $this->IUIDoneYesNo3->CurrentValue;
            $this->IUIDoneYesNo3->ViewCustomAttributes = "";

            // UPTTestDate3
            $this->UPTTestDate3->ViewValue = $this->UPTTestDate3->CurrentValue;
            $this->UPTTestDate3->ViewValue = FormatDateTime($this->UPTTestDate3->ViewValue, 0);
            $this->UPTTestDate3->ViewCustomAttributes = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->ViewValue = $this->UPTTestYesNo3->CurrentValue;
            $this->UPTTestYesNo3->ViewCustomAttributes = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->ViewValue = $this->IUIDoneDate4->CurrentValue;
            $this->IUIDoneDate4->ViewValue = FormatDateTime($this->IUIDoneDate4->ViewValue, 0);
            $this->IUIDoneDate4->ViewCustomAttributes = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->ViewValue = $this->IUIDoneYesNo4->CurrentValue;
            $this->IUIDoneYesNo4->ViewCustomAttributes = "";

            // UPTTestDate4
            $this->UPTTestDate4->ViewValue = $this->UPTTestDate4->CurrentValue;
            $this->UPTTestDate4->ViewValue = FormatDateTime($this->UPTTestDate4->ViewValue, 0);
            $this->UPTTestDate4->ViewCustomAttributes = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->ViewValue = $this->UPTTestYesNo4->CurrentValue;
            $this->UPTTestYesNo4->ViewCustomAttributes = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->ViewValue = $this->IVFStimulationDate->CurrentValue;
            $this->IVFStimulationDate->ViewValue = FormatDateTime($this->IVFStimulationDate->ViewValue, 0);
            $this->IVFStimulationDate->ViewCustomAttributes = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->ViewValue = $this->IVFStimulationYesNo->CurrentValue;
            $this->IVFStimulationYesNo->ViewCustomAttributes = "";

            // OPUDate
            $this->OPUDate->ViewValue = $this->OPUDate->CurrentValue;
            $this->OPUDate->ViewValue = FormatDateTime($this->OPUDate->ViewValue, 0);
            $this->OPUDate->ViewCustomAttributes = "";

            // OPUYesNo
            $this->OPUYesNo->ViewValue = $this->OPUYesNo->CurrentValue;
            $this->OPUYesNo->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
            $this->ETDate->ViewCustomAttributes = "";

            // ETYesNo
            $this->ETYesNo->ViewValue = $this->ETYesNo->CurrentValue;
            $this->ETYesNo->ViewCustomAttributes = "";

            // BetaHCGDate
            $this->BetaHCGDate->ViewValue = $this->BetaHCGDate->CurrentValue;
            $this->BetaHCGDate->ViewValue = FormatDateTime($this->BetaHCGDate->ViewValue, 0);
            $this->BetaHCGDate->ViewCustomAttributes = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->ViewValue = $this->BetaHCGYesNo->CurrentValue;
            $this->BetaHCGYesNo->ViewCustomAttributes = "";

            // FETDate
            $this->FETDate->ViewValue = $this->FETDate->CurrentValue;
            $this->FETDate->ViewValue = FormatDateTime($this->FETDate->ViewValue, 0);
            $this->FETDate->ViewCustomAttributes = "";

            // FETYesNo
            $this->FETYesNo->ViewValue = $this->FETYesNo->CurrentValue;
            $this->FETYesNo->ViewCustomAttributes = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->ViewValue = $this->FBetaHCGDate->CurrentValue;
            $this->FBetaHCGDate->ViewValue = FormatDateTime($this->FBetaHCGDate->ViewValue, 0);
            $this->FBetaHCGDate->ViewCustomAttributes = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->ViewValue = $this->FBetaHCGYesNo->CurrentValue;
            $this->FBetaHCGYesNo->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->TooltipValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // MobileNo
            $this->MobileNo->LinkCustomAttributes = "";
            $this->MobileNo->HrefValue = "";
            $this->MobileNo->TooltipValue = "";

            // ConsultantName
            $this->ConsultantName->LinkCustomAttributes = "";
            $this->ConsultantName->HrefValue = "";
            $this->ConsultantName->TooltipValue = "";

            // RefDrName
            $this->RefDrName->LinkCustomAttributes = "";
            $this->RefDrName->HrefValue = "";
            $this->RefDrName->TooltipValue = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->LinkCustomAttributes = "";
            $this->RefDrMobileNo->HrefValue = "";
            $this->RefDrMobileNo->TooltipValue = "";

            // NewVisitDate
            $this->NewVisitDate->LinkCustomAttributes = "";
            $this->NewVisitDate->HrefValue = "";
            $this->NewVisitDate->TooltipValue = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->LinkCustomAttributes = "";
            $this->NewVisitYesNo->HrefValue = "";
            $this->NewVisitYesNo->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->LinkCustomAttributes = "";
            $this->IUIDoneDate1->HrefValue = "";
            $this->IUIDoneDate1->TooltipValue = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->LinkCustomAttributes = "";
            $this->IUIDoneYesNo1->HrefValue = "";
            $this->IUIDoneYesNo1->TooltipValue = "";

            // UPTTestDate1
            $this->UPTTestDate1->LinkCustomAttributes = "";
            $this->UPTTestDate1->HrefValue = "";
            $this->UPTTestDate1->TooltipValue = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->LinkCustomAttributes = "";
            $this->UPTTestYesNo1->HrefValue = "";
            $this->UPTTestYesNo1->TooltipValue = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->LinkCustomAttributes = "";
            $this->IUIDoneDate2->HrefValue = "";
            $this->IUIDoneDate2->TooltipValue = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->LinkCustomAttributes = "";
            $this->IUIDoneYesNo2->HrefValue = "";
            $this->IUIDoneYesNo2->TooltipValue = "";

            // UPTTestDate2
            $this->UPTTestDate2->LinkCustomAttributes = "";
            $this->UPTTestDate2->HrefValue = "";
            $this->UPTTestDate2->TooltipValue = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->LinkCustomAttributes = "";
            $this->UPTTestYesNo2->HrefValue = "";
            $this->UPTTestYesNo2->TooltipValue = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->LinkCustomAttributes = "";
            $this->IUIDoneDate3->HrefValue = "";
            $this->IUIDoneDate3->TooltipValue = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->LinkCustomAttributes = "";
            $this->IUIDoneYesNo3->HrefValue = "";
            $this->IUIDoneYesNo3->TooltipValue = "";

            // UPTTestDate3
            $this->UPTTestDate3->LinkCustomAttributes = "";
            $this->UPTTestDate3->HrefValue = "";
            $this->UPTTestDate3->TooltipValue = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->LinkCustomAttributes = "";
            $this->UPTTestYesNo3->HrefValue = "";
            $this->UPTTestYesNo3->TooltipValue = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->LinkCustomAttributes = "";
            $this->IUIDoneDate4->HrefValue = "";
            $this->IUIDoneDate4->TooltipValue = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->LinkCustomAttributes = "";
            $this->IUIDoneYesNo4->HrefValue = "";
            $this->IUIDoneYesNo4->TooltipValue = "";

            // UPTTestDate4
            $this->UPTTestDate4->LinkCustomAttributes = "";
            $this->UPTTestDate4->HrefValue = "";
            $this->UPTTestDate4->TooltipValue = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->LinkCustomAttributes = "";
            $this->UPTTestYesNo4->HrefValue = "";
            $this->UPTTestYesNo4->TooltipValue = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->LinkCustomAttributes = "";
            $this->IVFStimulationDate->HrefValue = "";
            $this->IVFStimulationDate->TooltipValue = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->LinkCustomAttributes = "";
            $this->IVFStimulationYesNo->HrefValue = "";
            $this->IVFStimulationYesNo->TooltipValue = "";

            // OPUDate
            $this->OPUDate->LinkCustomAttributes = "";
            $this->OPUDate->HrefValue = "";
            $this->OPUDate->TooltipValue = "";

            // OPUYesNo
            $this->OPUYesNo->LinkCustomAttributes = "";
            $this->OPUYesNo->HrefValue = "";
            $this->OPUYesNo->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // ETYesNo
            $this->ETYesNo->LinkCustomAttributes = "";
            $this->ETYesNo->HrefValue = "";
            $this->ETYesNo->TooltipValue = "";

            // BetaHCGDate
            $this->BetaHCGDate->LinkCustomAttributes = "";
            $this->BetaHCGDate->HrefValue = "";
            $this->BetaHCGDate->TooltipValue = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->LinkCustomAttributes = "";
            $this->BetaHCGYesNo->HrefValue = "";
            $this->BetaHCGYesNo->TooltipValue = "";

            // FETDate
            $this->FETDate->LinkCustomAttributes = "";
            $this->FETDate->HrefValue = "";
            $this->FETDate->TooltipValue = "";

            // FETYesNo
            $this->FETYesNo->LinkCustomAttributes = "";
            $this->FETYesNo->HrefValue = "";
            $this->FETYesNo->TooltipValue = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->LinkCustomAttributes = "";
            $this->FBetaHCGDate->HrefValue = "";
            $this->FBetaHCGDate->TooltipValue = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->LinkCustomAttributes = "";
            $this->FBetaHCGYesNo->HrefValue = "";
            $this->FBetaHCGYesNo->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatId
            $this->PatId->EditAttrs["class"] = "form-control";
            $this->PatId->EditCustomAttributes = "";
            $this->PatId->EditValue = HtmlEncode($this->PatId->CurrentValue);
            $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            if (!$this->PatientId->Raw) {
                $this->PatientId->CurrentValue = HtmlDecode($this->PatientId->CurrentValue);
            }
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->CurrentValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // MobileNo
            $this->MobileNo->EditAttrs["class"] = "form-control";
            $this->MobileNo->EditCustomAttributes = "";
            if (!$this->MobileNo->Raw) {
                $this->MobileNo->CurrentValue = HtmlDecode($this->MobileNo->CurrentValue);
            }
            $this->MobileNo->EditValue = HtmlEncode($this->MobileNo->CurrentValue);
            $this->MobileNo->PlaceHolder = RemoveHtml($this->MobileNo->caption());

            // ConsultantName
            $this->ConsultantName->EditAttrs["class"] = "form-control";
            $this->ConsultantName->EditCustomAttributes = "";
            if (!$this->ConsultantName->Raw) {
                $this->ConsultantName->CurrentValue = HtmlDecode($this->ConsultantName->CurrentValue);
            }
            $this->ConsultantName->EditValue = HtmlEncode($this->ConsultantName->CurrentValue);
            $this->ConsultantName->PlaceHolder = RemoveHtml($this->ConsultantName->caption());

            // RefDrName
            $this->RefDrName->EditAttrs["class"] = "form-control";
            $this->RefDrName->EditCustomAttributes = "";
            if (!$this->RefDrName->Raw) {
                $this->RefDrName->CurrentValue = HtmlDecode($this->RefDrName->CurrentValue);
            }
            $this->RefDrName->EditValue = HtmlEncode($this->RefDrName->CurrentValue);
            $this->RefDrName->PlaceHolder = RemoveHtml($this->RefDrName->caption());

            // RefDrMobileNo
            $this->RefDrMobileNo->EditAttrs["class"] = "form-control";
            $this->RefDrMobileNo->EditCustomAttributes = "";
            if (!$this->RefDrMobileNo->Raw) {
                $this->RefDrMobileNo->CurrentValue = HtmlDecode($this->RefDrMobileNo->CurrentValue);
            }
            $this->RefDrMobileNo->EditValue = HtmlEncode($this->RefDrMobileNo->CurrentValue);
            $this->RefDrMobileNo->PlaceHolder = RemoveHtml($this->RefDrMobileNo->caption());

            // NewVisitDate
            $this->NewVisitDate->EditAttrs["class"] = "form-control";
            $this->NewVisitDate->EditCustomAttributes = "";
            $this->NewVisitDate->EditValue = HtmlEncode(FormatDateTime($this->NewVisitDate->CurrentValue, 8));
            $this->NewVisitDate->PlaceHolder = RemoveHtml($this->NewVisitDate->caption());

            // NewVisitYesNo
            $this->NewVisitYesNo->EditAttrs["class"] = "form-control";
            $this->NewVisitYesNo->EditCustomAttributes = "";
            if (!$this->NewVisitYesNo->Raw) {
                $this->NewVisitYesNo->CurrentValue = HtmlDecode($this->NewVisitYesNo->CurrentValue);
            }
            $this->NewVisitYesNo->EditValue = HtmlEncode($this->NewVisitYesNo->CurrentValue);
            $this->NewVisitYesNo->PlaceHolder = RemoveHtml($this->NewVisitYesNo->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            if (!$this->Treatment->Raw) {
                $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
            }
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->CurrentValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // IUIDoneDate1
            $this->IUIDoneDate1->EditAttrs["class"] = "form-control";
            $this->IUIDoneDate1->EditCustomAttributes = "";
            $this->IUIDoneDate1->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate1->CurrentValue, 8));
            $this->IUIDoneDate1->PlaceHolder = RemoveHtml($this->IUIDoneDate1->caption());

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->EditAttrs["class"] = "form-control";
            $this->IUIDoneYesNo1->EditCustomAttributes = "";
            if (!$this->IUIDoneYesNo1->Raw) {
                $this->IUIDoneYesNo1->CurrentValue = HtmlDecode($this->IUIDoneYesNo1->CurrentValue);
            }
            $this->IUIDoneYesNo1->EditValue = HtmlEncode($this->IUIDoneYesNo1->CurrentValue);
            $this->IUIDoneYesNo1->PlaceHolder = RemoveHtml($this->IUIDoneYesNo1->caption());

            // UPTTestDate1
            $this->UPTTestDate1->EditAttrs["class"] = "form-control";
            $this->UPTTestDate1->EditCustomAttributes = "";
            $this->UPTTestDate1->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate1->CurrentValue, 8));
            $this->UPTTestDate1->PlaceHolder = RemoveHtml($this->UPTTestDate1->caption());

            // UPTTestYesNo1
            $this->UPTTestYesNo1->EditAttrs["class"] = "form-control";
            $this->UPTTestYesNo1->EditCustomAttributes = "";
            if (!$this->UPTTestYesNo1->Raw) {
                $this->UPTTestYesNo1->CurrentValue = HtmlDecode($this->UPTTestYesNo1->CurrentValue);
            }
            $this->UPTTestYesNo1->EditValue = HtmlEncode($this->UPTTestYesNo1->CurrentValue);
            $this->UPTTestYesNo1->PlaceHolder = RemoveHtml($this->UPTTestYesNo1->caption());

            // IUIDoneDate2
            $this->IUIDoneDate2->EditAttrs["class"] = "form-control";
            $this->IUIDoneDate2->EditCustomAttributes = "";
            $this->IUIDoneDate2->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate2->CurrentValue, 8));
            $this->IUIDoneDate2->PlaceHolder = RemoveHtml($this->IUIDoneDate2->caption());

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->EditAttrs["class"] = "form-control";
            $this->IUIDoneYesNo2->EditCustomAttributes = "";
            if (!$this->IUIDoneYesNo2->Raw) {
                $this->IUIDoneYesNo2->CurrentValue = HtmlDecode($this->IUIDoneYesNo2->CurrentValue);
            }
            $this->IUIDoneYesNo2->EditValue = HtmlEncode($this->IUIDoneYesNo2->CurrentValue);
            $this->IUIDoneYesNo2->PlaceHolder = RemoveHtml($this->IUIDoneYesNo2->caption());

            // UPTTestDate2
            $this->UPTTestDate2->EditAttrs["class"] = "form-control";
            $this->UPTTestDate2->EditCustomAttributes = "";
            $this->UPTTestDate2->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate2->CurrentValue, 8));
            $this->UPTTestDate2->PlaceHolder = RemoveHtml($this->UPTTestDate2->caption());

            // UPTTestYesNo2
            $this->UPTTestYesNo2->EditAttrs["class"] = "form-control";
            $this->UPTTestYesNo2->EditCustomAttributes = "";
            if (!$this->UPTTestYesNo2->Raw) {
                $this->UPTTestYesNo2->CurrentValue = HtmlDecode($this->UPTTestYesNo2->CurrentValue);
            }
            $this->UPTTestYesNo2->EditValue = HtmlEncode($this->UPTTestYesNo2->CurrentValue);
            $this->UPTTestYesNo2->PlaceHolder = RemoveHtml($this->UPTTestYesNo2->caption());

            // IUIDoneDate3
            $this->IUIDoneDate3->EditAttrs["class"] = "form-control";
            $this->IUIDoneDate3->EditCustomAttributes = "";
            $this->IUIDoneDate3->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate3->CurrentValue, 8));
            $this->IUIDoneDate3->PlaceHolder = RemoveHtml($this->IUIDoneDate3->caption());

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->EditAttrs["class"] = "form-control";
            $this->IUIDoneYesNo3->EditCustomAttributes = "";
            if (!$this->IUIDoneYesNo3->Raw) {
                $this->IUIDoneYesNo3->CurrentValue = HtmlDecode($this->IUIDoneYesNo3->CurrentValue);
            }
            $this->IUIDoneYesNo3->EditValue = HtmlEncode($this->IUIDoneYesNo3->CurrentValue);
            $this->IUIDoneYesNo3->PlaceHolder = RemoveHtml($this->IUIDoneYesNo3->caption());

            // UPTTestDate3
            $this->UPTTestDate3->EditAttrs["class"] = "form-control";
            $this->UPTTestDate3->EditCustomAttributes = "";
            $this->UPTTestDate3->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate3->CurrentValue, 8));
            $this->UPTTestDate3->PlaceHolder = RemoveHtml($this->UPTTestDate3->caption());

            // UPTTestYesNo3
            $this->UPTTestYesNo3->EditAttrs["class"] = "form-control";
            $this->UPTTestYesNo3->EditCustomAttributes = "";
            if (!$this->UPTTestYesNo3->Raw) {
                $this->UPTTestYesNo3->CurrentValue = HtmlDecode($this->UPTTestYesNo3->CurrentValue);
            }
            $this->UPTTestYesNo3->EditValue = HtmlEncode($this->UPTTestYesNo3->CurrentValue);
            $this->UPTTestYesNo3->PlaceHolder = RemoveHtml($this->UPTTestYesNo3->caption());

            // IUIDoneDate4
            $this->IUIDoneDate4->EditAttrs["class"] = "form-control";
            $this->IUIDoneDate4->EditCustomAttributes = "";
            $this->IUIDoneDate4->EditValue = HtmlEncode(FormatDateTime($this->IUIDoneDate4->CurrentValue, 8));
            $this->IUIDoneDate4->PlaceHolder = RemoveHtml($this->IUIDoneDate4->caption());

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->EditAttrs["class"] = "form-control";
            $this->IUIDoneYesNo4->EditCustomAttributes = "";
            if (!$this->IUIDoneYesNo4->Raw) {
                $this->IUIDoneYesNo4->CurrentValue = HtmlDecode($this->IUIDoneYesNo4->CurrentValue);
            }
            $this->IUIDoneYesNo4->EditValue = HtmlEncode($this->IUIDoneYesNo4->CurrentValue);
            $this->IUIDoneYesNo4->PlaceHolder = RemoveHtml($this->IUIDoneYesNo4->caption());

            // UPTTestDate4
            $this->UPTTestDate4->EditAttrs["class"] = "form-control";
            $this->UPTTestDate4->EditCustomAttributes = "";
            $this->UPTTestDate4->EditValue = HtmlEncode(FormatDateTime($this->UPTTestDate4->CurrentValue, 8));
            $this->UPTTestDate4->PlaceHolder = RemoveHtml($this->UPTTestDate4->caption());

            // UPTTestYesNo4
            $this->UPTTestYesNo4->EditAttrs["class"] = "form-control";
            $this->UPTTestYesNo4->EditCustomAttributes = "";
            if (!$this->UPTTestYesNo4->Raw) {
                $this->UPTTestYesNo4->CurrentValue = HtmlDecode($this->UPTTestYesNo4->CurrentValue);
            }
            $this->UPTTestYesNo4->EditValue = HtmlEncode($this->UPTTestYesNo4->CurrentValue);
            $this->UPTTestYesNo4->PlaceHolder = RemoveHtml($this->UPTTestYesNo4->caption());

            // IVFStimulationDate
            $this->IVFStimulationDate->EditAttrs["class"] = "form-control";
            $this->IVFStimulationDate->EditCustomAttributes = "";
            $this->IVFStimulationDate->EditValue = HtmlEncode(FormatDateTime($this->IVFStimulationDate->CurrentValue, 8));
            $this->IVFStimulationDate->PlaceHolder = RemoveHtml($this->IVFStimulationDate->caption());

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->EditAttrs["class"] = "form-control";
            $this->IVFStimulationYesNo->EditCustomAttributes = "";
            if (!$this->IVFStimulationYesNo->Raw) {
                $this->IVFStimulationYesNo->CurrentValue = HtmlDecode($this->IVFStimulationYesNo->CurrentValue);
            }
            $this->IVFStimulationYesNo->EditValue = HtmlEncode($this->IVFStimulationYesNo->CurrentValue);
            $this->IVFStimulationYesNo->PlaceHolder = RemoveHtml($this->IVFStimulationYesNo->caption());

            // OPUDate
            $this->OPUDate->EditAttrs["class"] = "form-control";
            $this->OPUDate->EditCustomAttributes = "";
            $this->OPUDate->EditValue = HtmlEncode(FormatDateTime($this->OPUDate->CurrentValue, 8));
            $this->OPUDate->PlaceHolder = RemoveHtml($this->OPUDate->caption());

            // OPUYesNo
            $this->OPUYesNo->EditAttrs["class"] = "form-control";
            $this->OPUYesNo->EditCustomAttributes = "";
            if (!$this->OPUYesNo->Raw) {
                $this->OPUYesNo->CurrentValue = HtmlDecode($this->OPUYesNo->CurrentValue);
            }
            $this->OPUYesNo->EditValue = HtmlEncode($this->OPUYesNo->CurrentValue);
            $this->OPUYesNo->PlaceHolder = RemoveHtml($this->OPUYesNo->caption());

            // ETDate
            $this->ETDate->EditAttrs["class"] = "form-control";
            $this->ETDate->EditCustomAttributes = "";
            $this->ETDate->EditValue = HtmlEncode(FormatDateTime($this->ETDate->CurrentValue, 8));
            $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

            // ETYesNo
            $this->ETYesNo->EditAttrs["class"] = "form-control";
            $this->ETYesNo->EditCustomAttributes = "";
            if (!$this->ETYesNo->Raw) {
                $this->ETYesNo->CurrentValue = HtmlDecode($this->ETYesNo->CurrentValue);
            }
            $this->ETYesNo->EditValue = HtmlEncode($this->ETYesNo->CurrentValue);
            $this->ETYesNo->PlaceHolder = RemoveHtml($this->ETYesNo->caption());

            // BetaHCGDate
            $this->BetaHCGDate->EditAttrs["class"] = "form-control";
            $this->BetaHCGDate->EditCustomAttributes = "";
            $this->BetaHCGDate->EditValue = HtmlEncode(FormatDateTime($this->BetaHCGDate->CurrentValue, 8));
            $this->BetaHCGDate->PlaceHolder = RemoveHtml($this->BetaHCGDate->caption());

            // BetaHCGYesNo
            $this->BetaHCGYesNo->EditAttrs["class"] = "form-control";
            $this->BetaHCGYesNo->EditCustomAttributes = "";
            if (!$this->BetaHCGYesNo->Raw) {
                $this->BetaHCGYesNo->CurrentValue = HtmlDecode($this->BetaHCGYesNo->CurrentValue);
            }
            $this->BetaHCGYesNo->EditValue = HtmlEncode($this->BetaHCGYesNo->CurrentValue);
            $this->BetaHCGYesNo->PlaceHolder = RemoveHtml($this->BetaHCGYesNo->caption());

            // FETDate
            $this->FETDate->EditAttrs["class"] = "form-control";
            $this->FETDate->EditCustomAttributes = "";
            $this->FETDate->EditValue = HtmlEncode(FormatDateTime($this->FETDate->CurrentValue, 8));
            $this->FETDate->PlaceHolder = RemoveHtml($this->FETDate->caption());

            // FETYesNo
            $this->FETYesNo->EditAttrs["class"] = "form-control";
            $this->FETYesNo->EditCustomAttributes = "";
            if (!$this->FETYesNo->Raw) {
                $this->FETYesNo->CurrentValue = HtmlDecode($this->FETYesNo->CurrentValue);
            }
            $this->FETYesNo->EditValue = HtmlEncode($this->FETYesNo->CurrentValue);
            $this->FETYesNo->PlaceHolder = RemoveHtml($this->FETYesNo->caption());

            // FBetaHCGDate
            $this->FBetaHCGDate->EditAttrs["class"] = "form-control";
            $this->FBetaHCGDate->EditCustomAttributes = "";
            $this->FBetaHCGDate->EditValue = HtmlEncode(FormatDateTime($this->FBetaHCGDate->CurrentValue, 8));
            $this->FBetaHCGDate->PlaceHolder = RemoveHtml($this->FBetaHCGDate->caption());

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->EditAttrs["class"] = "form-control";
            $this->FBetaHCGYesNo->EditCustomAttributes = "";
            if (!$this->FBetaHCGYesNo->Raw) {
                $this->FBetaHCGYesNo->CurrentValue = HtmlDecode($this->FBetaHCGYesNo->CurrentValue);
            }
            $this->FBetaHCGYesNo->EditValue = HtmlEncode($this->FBetaHCGYesNo->CurrentValue);
            $this->FBetaHCGYesNo->PlaceHolder = RemoveHtml($this->FBetaHCGYesNo->caption());

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

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // MobileNo
            $this->MobileNo->LinkCustomAttributes = "";
            $this->MobileNo->HrefValue = "";

            // ConsultantName
            $this->ConsultantName->LinkCustomAttributes = "";
            $this->ConsultantName->HrefValue = "";

            // RefDrName
            $this->RefDrName->LinkCustomAttributes = "";
            $this->RefDrName->HrefValue = "";

            // RefDrMobileNo
            $this->RefDrMobileNo->LinkCustomAttributes = "";
            $this->RefDrMobileNo->HrefValue = "";

            // NewVisitDate
            $this->NewVisitDate->LinkCustomAttributes = "";
            $this->NewVisitDate->HrefValue = "";

            // NewVisitYesNo
            $this->NewVisitYesNo->LinkCustomAttributes = "";
            $this->NewVisitYesNo->HrefValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";

            // IUIDoneDate1
            $this->IUIDoneDate1->LinkCustomAttributes = "";
            $this->IUIDoneDate1->HrefValue = "";

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->LinkCustomAttributes = "";
            $this->IUIDoneYesNo1->HrefValue = "";

            // UPTTestDate1
            $this->UPTTestDate1->LinkCustomAttributes = "";
            $this->UPTTestDate1->HrefValue = "";

            // UPTTestYesNo1
            $this->UPTTestYesNo1->LinkCustomAttributes = "";
            $this->UPTTestYesNo1->HrefValue = "";

            // IUIDoneDate2
            $this->IUIDoneDate2->LinkCustomAttributes = "";
            $this->IUIDoneDate2->HrefValue = "";

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->LinkCustomAttributes = "";
            $this->IUIDoneYesNo2->HrefValue = "";

            // UPTTestDate2
            $this->UPTTestDate2->LinkCustomAttributes = "";
            $this->UPTTestDate2->HrefValue = "";

            // UPTTestYesNo2
            $this->UPTTestYesNo2->LinkCustomAttributes = "";
            $this->UPTTestYesNo2->HrefValue = "";

            // IUIDoneDate3
            $this->IUIDoneDate3->LinkCustomAttributes = "";
            $this->IUIDoneDate3->HrefValue = "";

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->LinkCustomAttributes = "";
            $this->IUIDoneYesNo3->HrefValue = "";

            // UPTTestDate3
            $this->UPTTestDate3->LinkCustomAttributes = "";
            $this->UPTTestDate3->HrefValue = "";

            // UPTTestYesNo3
            $this->UPTTestYesNo3->LinkCustomAttributes = "";
            $this->UPTTestYesNo3->HrefValue = "";

            // IUIDoneDate4
            $this->IUIDoneDate4->LinkCustomAttributes = "";
            $this->IUIDoneDate4->HrefValue = "";

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->LinkCustomAttributes = "";
            $this->IUIDoneYesNo4->HrefValue = "";

            // UPTTestDate4
            $this->UPTTestDate4->LinkCustomAttributes = "";
            $this->UPTTestDate4->HrefValue = "";

            // UPTTestYesNo4
            $this->UPTTestYesNo4->LinkCustomAttributes = "";
            $this->UPTTestYesNo4->HrefValue = "";

            // IVFStimulationDate
            $this->IVFStimulationDate->LinkCustomAttributes = "";
            $this->IVFStimulationDate->HrefValue = "";

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->LinkCustomAttributes = "";
            $this->IVFStimulationYesNo->HrefValue = "";

            // OPUDate
            $this->OPUDate->LinkCustomAttributes = "";
            $this->OPUDate->HrefValue = "";

            // OPUYesNo
            $this->OPUYesNo->LinkCustomAttributes = "";
            $this->OPUYesNo->HrefValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";

            // ETYesNo
            $this->ETYesNo->LinkCustomAttributes = "";
            $this->ETYesNo->HrefValue = "";

            // BetaHCGDate
            $this->BetaHCGDate->LinkCustomAttributes = "";
            $this->BetaHCGDate->HrefValue = "";

            // BetaHCGYesNo
            $this->BetaHCGYesNo->LinkCustomAttributes = "";
            $this->BetaHCGYesNo->HrefValue = "";

            // FETDate
            $this->FETDate->LinkCustomAttributes = "";
            $this->FETDate->HrefValue = "";

            // FETYesNo
            $this->FETYesNo->LinkCustomAttributes = "";
            $this->FETYesNo->HrefValue = "";

            // FBetaHCGDate
            $this->FBetaHCGDate->LinkCustomAttributes = "";
            $this->FBetaHCGDate->HrefValue = "";

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->LinkCustomAttributes = "";
            $this->FBetaHCGYesNo->HrefValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->PatId->Required) {
            if (!$this->PatId->IsDetailKey && EmptyValue($this->PatId->FormValue)) {
                $this->PatId->addErrorMessage(str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatId->FormValue)) {
            $this->PatId->addErrorMessage($this->PatId->getErrorMessage(false));
        }
        if ($this->PatientId->Required) {
            if (!$this->PatientId->IsDetailKey && EmptyValue($this->PatientId->FormValue)) {
                $this->PatientId->addErrorMessage(str_replace("%s", $this->PatientId->caption(), $this->PatientId->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->MobileNo->Required) {
            if (!$this->MobileNo->IsDetailKey && EmptyValue($this->MobileNo->FormValue)) {
                $this->MobileNo->addErrorMessage(str_replace("%s", $this->MobileNo->caption(), $this->MobileNo->RequiredErrorMessage));
            }
        }
        if ($this->ConsultantName->Required) {
            if (!$this->ConsultantName->IsDetailKey && EmptyValue($this->ConsultantName->FormValue)) {
                $this->ConsultantName->addErrorMessage(str_replace("%s", $this->ConsultantName->caption(), $this->ConsultantName->RequiredErrorMessage));
            }
        }
        if ($this->RefDrName->Required) {
            if (!$this->RefDrName->IsDetailKey && EmptyValue($this->RefDrName->FormValue)) {
                $this->RefDrName->addErrorMessage(str_replace("%s", $this->RefDrName->caption(), $this->RefDrName->RequiredErrorMessage));
            }
        }
        if ($this->RefDrMobileNo->Required) {
            if (!$this->RefDrMobileNo->IsDetailKey && EmptyValue($this->RefDrMobileNo->FormValue)) {
                $this->RefDrMobileNo->addErrorMessage(str_replace("%s", $this->RefDrMobileNo->caption(), $this->RefDrMobileNo->RequiredErrorMessage));
            }
        }
        if ($this->NewVisitDate->Required) {
            if (!$this->NewVisitDate->IsDetailKey && EmptyValue($this->NewVisitDate->FormValue)) {
                $this->NewVisitDate->addErrorMessage(str_replace("%s", $this->NewVisitDate->caption(), $this->NewVisitDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->NewVisitDate->FormValue)) {
            $this->NewVisitDate->addErrorMessage($this->NewVisitDate->getErrorMessage(false));
        }
        if ($this->NewVisitYesNo->Required) {
            if (!$this->NewVisitYesNo->IsDetailKey && EmptyValue($this->NewVisitYesNo->FormValue)) {
                $this->NewVisitYesNo->addErrorMessage(str_replace("%s", $this->NewVisitYesNo->caption(), $this->NewVisitYesNo->RequiredErrorMessage));
            }
        }
        if ($this->Treatment->Required) {
            if (!$this->Treatment->IsDetailKey && EmptyValue($this->Treatment->FormValue)) {
                $this->Treatment->addErrorMessage(str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
            }
        }
        if ($this->IUIDoneDate1->Required) {
            if (!$this->IUIDoneDate1->IsDetailKey && EmptyValue($this->IUIDoneDate1->FormValue)) {
                $this->IUIDoneDate1->addErrorMessage(str_replace("%s", $this->IUIDoneDate1->caption(), $this->IUIDoneDate1->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->IUIDoneDate1->FormValue)) {
            $this->IUIDoneDate1->addErrorMessage($this->IUIDoneDate1->getErrorMessage(false));
        }
        if ($this->IUIDoneYesNo1->Required) {
            if (!$this->IUIDoneYesNo1->IsDetailKey && EmptyValue($this->IUIDoneYesNo1->FormValue)) {
                $this->IUIDoneYesNo1->addErrorMessage(str_replace("%s", $this->IUIDoneYesNo1->caption(), $this->IUIDoneYesNo1->RequiredErrorMessage));
            }
        }
        if ($this->UPTTestDate1->Required) {
            if (!$this->UPTTestDate1->IsDetailKey && EmptyValue($this->UPTTestDate1->FormValue)) {
                $this->UPTTestDate1->addErrorMessage(str_replace("%s", $this->UPTTestDate1->caption(), $this->UPTTestDate1->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->UPTTestDate1->FormValue)) {
            $this->UPTTestDate1->addErrorMessage($this->UPTTestDate1->getErrorMessage(false));
        }
        if ($this->UPTTestYesNo1->Required) {
            if (!$this->UPTTestYesNo1->IsDetailKey && EmptyValue($this->UPTTestYesNo1->FormValue)) {
                $this->UPTTestYesNo1->addErrorMessage(str_replace("%s", $this->UPTTestYesNo1->caption(), $this->UPTTestYesNo1->RequiredErrorMessage));
            }
        }
        if ($this->IUIDoneDate2->Required) {
            if (!$this->IUIDoneDate2->IsDetailKey && EmptyValue($this->IUIDoneDate2->FormValue)) {
                $this->IUIDoneDate2->addErrorMessage(str_replace("%s", $this->IUIDoneDate2->caption(), $this->IUIDoneDate2->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->IUIDoneDate2->FormValue)) {
            $this->IUIDoneDate2->addErrorMessage($this->IUIDoneDate2->getErrorMessage(false));
        }
        if ($this->IUIDoneYesNo2->Required) {
            if (!$this->IUIDoneYesNo2->IsDetailKey && EmptyValue($this->IUIDoneYesNo2->FormValue)) {
                $this->IUIDoneYesNo2->addErrorMessage(str_replace("%s", $this->IUIDoneYesNo2->caption(), $this->IUIDoneYesNo2->RequiredErrorMessage));
            }
        }
        if ($this->UPTTestDate2->Required) {
            if (!$this->UPTTestDate2->IsDetailKey && EmptyValue($this->UPTTestDate2->FormValue)) {
                $this->UPTTestDate2->addErrorMessage(str_replace("%s", $this->UPTTestDate2->caption(), $this->UPTTestDate2->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->UPTTestDate2->FormValue)) {
            $this->UPTTestDate2->addErrorMessage($this->UPTTestDate2->getErrorMessage(false));
        }
        if ($this->UPTTestYesNo2->Required) {
            if (!$this->UPTTestYesNo2->IsDetailKey && EmptyValue($this->UPTTestYesNo2->FormValue)) {
                $this->UPTTestYesNo2->addErrorMessage(str_replace("%s", $this->UPTTestYesNo2->caption(), $this->UPTTestYesNo2->RequiredErrorMessage));
            }
        }
        if ($this->IUIDoneDate3->Required) {
            if (!$this->IUIDoneDate3->IsDetailKey && EmptyValue($this->IUIDoneDate3->FormValue)) {
                $this->IUIDoneDate3->addErrorMessage(str_replace("%s", $this->IUIDoneDate3->caption(), $this->IUIDoneDate3->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->IUIDoneDate3->FormValue)) {
            $this->IUIDoneDate3->addErrorMessage($this->IUIDoneDate3->getErrorMessage(false));
        }
        if ($this->IUIDoneYesNo3->Required) {
            if (!$this->IUIDoneYesNo3->IsDetailKey && EmptyValue($this->IUIDoneYesNo3->FormValue)) {
                $this->IUIDoneYesNo3->addErrorMessage(str_replace("%s", $this->IUIDoneYesNo3->caption(), $this->IUIDoneYesNo3->RequiredErrorMessage));
            }
        }
        if ($this->UPTTestDate3->Required) {
            if (!$this->UPTTestDate3->IsDetailKey && EmptyValue($this->UPTTestDate3->FormValue)) {
                $this->UPTTestDate3->addErrorMessage(str_replace("%s", $this->UPTTestDate3->caption(), $this->UPTTestDate3->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->UPTTestDate3->FormValue)) {
            $this->UPTTestDate3->addErrorMessage($this->UPTTestDate3->getErrorMessage(false));
        }
        if ($this->UPTTestYesNo3->Required) {
            if (!$this->UPTTestYesNo3->IsDetailKey && EmptyValue($this->UPTTestYesNo3->FormValue)) {
                $this->UPTTestYesNo3->addErrorMessage(str_replace("%s", $this->UPTTestYesNo3->caption(), $this->UPTTestYesNo3->RequiredErrorMessage));
            }
        }
        if ($this->IUIDoneDate4->Required) {
            if (!$this->IUIDoneDate4->IsDetailKey && EmptyValue($this->IUIDoneDate4->FormValue)) {
                $this->IUIDoneDate4->addErrorMessage(str_replace("%s", $this->IUIDoneDate4->caption(), $this->IUIDoneDate4->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->IUIDoneDate4->FormValue)) {
            $this->IUIDoneDate4->addErrorMessage($this->IUIDoneDate4->getErrorMessage(false));
        }
        if ($this->IUIDoneYesNo4->Required) {
            if (!$this->IUIDoneYesNo4->IsDetailKey && EmptyValue($this->IUIDoneYesNo4->FormValue)) {
                $this->IUIDoneYesNo4->addErrorMessage(str_replace("%s", $this->IUIDoneYesNo4->caption(), $this->IUIDoneYesNo4->RequiredErrorMessage));
            }
        }
        if ($this->UPTTestDate4->Required) {
            if (!$this->UPTTestDate4->IsDetailKey && EmptyValue($this->UPTTestDate4->FormValue)) {
                $this->UPTTestDate4->addErrorMessage(str_replace("%s", $this->UPTTestDate4->caption(), $this->UPTTestDate4->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->UPTTestDate4->FormValue)) {
            $this->UPTTestDate4->addErrorMessage($this->UPTTestDate4->getErrorMessage(false));
        }
        if ($this->UPTTestYesNo4->Required) {
            if (!$this->UPTTestYesNo4->IsDetailKey && EmptyValue($this->UPTTestYesNo4->FormValue)) {
                $this->UPTTestYesNo4->addErrorMessage(str_replace("%s", $this->UPTTestYesNo4->caption(), $this->UPTTestYesNo4->RequiredErrorMessage));
            }
        }
        if ($this->IVFStimulationDate->Required) {
            if (!$this->IVFStimulationDate->IsDetailKey && EmptyValue($this->IVFStimulationDate->FormValue)) {
                $this->IVFStimulationDate->addErrorMessage(str_replace("%s", $this->IVFStimulationDate->caption(), $this->IVFStimulationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->IVFStimulationDate->FormValue)) {
            $this->IVFStimulationDate->addErrorMessage($this->IVFStimulationDate->getErrorMessage(false));
        }
        if ($this->IVFStimulationYesNo->Required) {
            if (!$this->IVFStimulationYesNo->IsDetailKey && EmptyValue($this->IVFStimulationYesNo->FormValue)) {
                $this->IVFStimulationYesNo->addErrorMessage(str_replace("%s", $this->IVFStimulationYesNo->caption(), $this->IVFStimulationYesNo->RequiredErrorMessage));
            }
        }
        if ($this->OPUDate->Required) {
            if (!$this->OPUDate->IsDetailKey && EmptyValue($this->OPUDate->FormValue)) {
                $this->OPUDate->addErrorMessage(str_replace("%s", $this->OPUDate->caption(), $this->OPUDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OPUDate->FormValue)) {
            $this->OPUDate->addErrorMessage($this->OPUDate->getErrorMessage(false));
        }
        if ($this->OPUYesNo->Required) {
            if (!$this->OPUYesNo->IsDetailKey && EmptyValue($this->OPUYesNo->FormValue)) {
                $this->OPUYesNo->addErrorMessage(str_replace("%s", $this->OPUYesNo->caption(), $this->OPUYesNo->RequiredErrorMessage));
            }
        }
        if ($this->ETDate->Required) {
            if (!$this->ETDate->IsDetailKey && EmptyValue($this->ETDate->FormValue)) {
                $this->ETDate->addErrorMessage(str_replace("%s", $this->ETDate->caption(), $this->ETDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ETDate->FormValue)) {
            $this->ETDate->addErrorMessage($this->ETDate->getErrorMessage(false));
        }
        if ($this->ETYesNo->Required) {
            if (!$this->ETYesNo->IsDetailKey && EmptyValue($this->ETYesNo->FormValue)) {
                $this->ETYesNo->addErrorMessage(str_replace("%s", $this->ETYesNo->caption(), $this->ETYesNo->RequiredErrorMessage));
            }
        }
        if ($this->BetaHCGDate->Required) {
            if (!$this->BetaHCGDate->IsDetailKey && EmptyValue($this->BetaHCGDate->FormValue)) {
                $this->BetaHCGDate->addErrorMessage(str_replace("%s", $this->BetaHCGDate->caption(), $this->BetaHCGDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BetaHCGDate->FormValue)) {
            $this->BetaHCGDate->addErrorMessage($this->BetaHCGDate->getErrorMessage(false));
        }
        if ($this->BetaHCGYesNo->Required) {
            if (!$this->BetaHCGYesNo->IsDetailKey && EmptyValue($this->BetaHCGYesNo->FormValue)) {
                $this->BetaHCGYesNo->addErrorMessage(str_replace("%s", $this->BetaHCGYesNo->caption(), $this->BetaHCGYesNo->RequiredErrorMessage));
            }
        }
        if ($this->FETDate->Required) {
            if (!$this->FETDate->IsDetailKey && EmptyValue($this->FETDate->FormValue)) {
                $this->FETDate->addErrorMessage(str_replace("%s", $this->FETDate->caption(), $this->FETDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->FETDate->FormValue)) {
            $this->FETDate->addErrorMessage($this->FETDate->getErrorMessage(false));
        }
        if ($this->FETYesNo->Required) {
            if (!$this->FETYesNo->IsDetailKey && EmptyValue($this->FETYesNo->FormValue)) {
                $this->FETYesNo->addErrorMessage(str_replace("%s", $this->FETYesNo->caption(), $this->FETYesNo->RequiredErrorMessage));
            }
        }
        if ($this->FBetaHCGDate->Required) {
            if (!$this->FBetaHCGDate->IsDetailKey && EmptyValue($this->FBetaHCGDate->FormValue)) {
                $this->FBetaHCGDate->addErrorMessage(str_replace("%s", $this->FBetaHCGDate->caption(), $this->FBetaHCGDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->FBetaHCGDate->FormValue)) {
            $this->FBetaHCGDate->addErrorMessage($this->FBetaHCGDate->getErrorMessage(false));
        }
        if ($this->FBetaHCGYesNo->Required) {
            if (!$this->FBetaHCGYesNo->IsDetailKey && EmptyValue($this->FBetaHCGYesNo->FormValue)) {
                $this->FBetaHCGYesNo->addErrorMessage(str_replace("%s", $this->FBetaHCGYesNo->caption(), $this->FBetaHCGYesNo->RequiredErrorMessage));
            }
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
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // PatId
            $this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, null, $this->PatId->ReadOnly);

            // PatientId
            $this->PatientId->setDbValueDef($rsnew, $this->PatientId->CurrentValue, null, $this->PatientId->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // MobileNo
            $this->MobileNo->setDbValueDef($rsnew, $this->MobileNo->CurrentValue, null, $this->MobileNo->ReadOnly);

            // ConsultantName
            $this->ConsultantName->setDbValueDef($rsnew, $this->ConsultantName->CurrentValue, null, $this->ConsultantName->ReadOnly);

            // RefDrName
            $this->RefDrName->setDbValueDef($rsnew, $this->RefDrName->CurrentValue, null, $this->RefDrName->ReadOnly);

            // RefDrMobileNo
            $this->RefDrMobileNo->setDbValueDef($rsnew, $this->RefDrMobileNo->CurrentValue, null, $this->RefDrMobileNo->ReadOnly);

            // NewVisitDate
            $this->NewVisitDate->setDbValueDef($rsnew, UnFormatDateTime($this->NewVisitDate->CurrentValue, 0), null, $this->NewVisitDate->ReadOnly);

            // NewVisitYesNo
            $this->NewVisitYesNo->setDbValueDef($rsnew, $this->NewVisitYesNo->CurrentValue, null, $this->NewVisitYesNo->ReadOnly);

            // Treatment
            $this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, null, $this->Treatment->ReadOnly);

            // IUIDoneDate1
            $this->IUIDoneDate1->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate1->CurrentValue, 0), null, $this->IUIDoneDate1->ReadOnly);

            // IUIDoneYesNo1
            $this->IUIDoneYesNo1->setDbValueDef($rsnew, $this->IUIDoneYesNo1->CurrentValue, null, $this->IUIDoneYesNo1->ReadOnly);

            // UPTTestDate1
            $this->UPTTestDate1->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate1->CurrentValue, 0), null, $this->UPTTestDate1->ReadOnly);

            // UPTTestYesNo1
            $this->UPTTestYesNo1->setDbValueDef($rsnew, $this->UPTTestYesNo1->CurrentValue, null, $this->UPTTestYesNo1->ReadOnly);

            // IUIDoneDate2
            $this->IUIDoneDate2->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate2->CurrentValue, 0), null, $this->IUIDoneDate2->ReadOnly);

            // IUIDoneYesNo2
            $this->IUIDoneYesNo2->setDbValueDef($rsnew, $this->IUIDoneYesNo2->CurrentValue, null, $this->IUIDoneYesNo2->ReadOnly);

            // UPTTestDate2
            $this->UPTTestDate2->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate2->CurrentValue, 0), null, $this->UPTTestDate2->ReadOnly);

            // UPTTestYesNo2
            $this->UPTTestYesNo2->setDbValueDef($rsnew, $this->UPTTestYesNo2->CurrentValue, null, $this->UPTTestYesNo2->ReadOnly);

            // IUIDoneDate3
            $this->IUIDoneDate3->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate3->CurrentValue, 0), null, $this->IUIDoneDate3->ReadOnly);

            // IUIDoneYesNo3
            $this->IUIDoneYesNo3->setDbValueDef($rsnew, $this->IUIDoneYesNo3->CurrentValue, null, $this->IUIDoneYesNo3->ReadOnly);

            // UPTTestDate3
            $this->UPTTestDate3->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate3->CurrentValue, 0), null, $this->UPTTestDate3->ReadOnly);

            // UPTTestYesNo3
            $this->UPTTestYesNo3->setDbValueDef($rsnew, $this->UPTTestYesNo3->CurrentValue, null, $this->UPTTestYesNo3->ReadOnly);

            // IUIDoneDate4
            $this->IUIDoneDate4->setDbValueDef($rsnew, UnFormatDateTime($this->IUIDoneDate4->CurrentValue, 0), null, $this->IUIDoneDate4->ReadOnly);

            // IUIDoneYesNo4
            $this->IUIDoneYesNo4->setDbValueDef($rsnew, $this->IUIDoneYesNo4->CurrentValue, null, $this->IUIDoneYesNo4->ReadOnly);

            // UPTTestDate4
            $this->UPTTestDate4->setDbValueDef($rsnew, UnFormatDateTime($this->UPTTestDate4->CurrentValue, 0), null, $this->UPTTestDate4->ReadOnly);

            // UPTTestYesNo4
            $this->UPTTestYesNo4->setDbValueDef($rsnew, $this->UPTTestYesNo4->CurrentValue, null, $this->UPTTestYesNo4->ReadOnly);

            // IVFStimulationDate
            $this->IVFStimulationDate->setDbValueDef($rsnew, UnFormatDateTime($this->IVFStimulationDate->CurrentValue, 0), null, $this->IVFStimulationDate->ReadOnly);

            // IVFStimulationYesNo
            $this->IVFStimulationYesNo->setDbValueDef($rsnew, $this->IVFStimulationYesNo->CurrentValue, null, $this->IVFStimulationYesNo->ReadOnly);

            // OPUDate
            $this->OPUDate->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDate->CurrentValue, 0), null, $this->OPUDate->ReadOnly);

            // OPUYesNo
            $this->OPUYesNo->setDbValueDef($rsnew, $this->OPUYesNo->CurrentValue, null, $this->OPUYesNo->ReadOnly);

            // ETDate
            $this->ETDate->setDbValueDef($rsnew, UnFormatDateTime($this->ETDate->CurrentValue, 0), null, $this->ETDate->ReadOnly);

            // ETYesNo
            $this->ETYesNo->setDbValueDef($rsnew, $this->ETYesNo->CurrentValue, null, $this->ETYesNo->ReadOnly);

            // BetaHCGDate
            $this->BetaHCGDate->setDbValueDef($rsnew, UnFormatDateTime($this->BetaHCGDate->CurrentValue, 0), null, $this->BetaHCGDate->ReadOnly);

            // BetaHCGYesNo
            $this->BetaHCGYesNo->setDbValueDef($rsnew, $this->BetaHCGYesNo->CurrentValue, null, $this->BetaHCGYesNo->ReadOnly);

            // FETDate
            $this->FETDate->setDbValueDef($rsnew, UnFormatDateTime($this->FETDate->CurrentValue, 0), null, $this->FETDate->ReadOnly);

            // FETYesNo
            $this->FETYesNo->setDbValueDef($rsnew, $this->FETYesNo->CurrentValue, null, $this->FETYesNo->ReadOnly);

            // FBetaHCGDate
            $this->FBetaHCGDate->setDbValueDef($rsnew, UnFormatDateTime($this->FBetaHCGDate->CurrentValue, 0), null, $this->FBetaHCGDate->ReadOnly);

            // FBetaHCGYesNo
            $this->FBetaHCGYesNo->setDbValueDef($rsnew, $this->FBetaHCGYesNo->CurrentValue, null, $this->FBetaHCGYesNo->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    $editRow = $this->update($rsnew, "", $rsold);
                } else {
                    $editRow = true; // No field to update
                }
                if ($editRow) {
                }
            } else {
                if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                    // Use the message, do nothing
                } elseif ($this->CancelMessage != "") {
                    $this->setFailureMessage($this->CancelMessage);
                    $this->CancelMessage = "";
                } else {
                    $this->setFailureMessage($Language->phrase("UpdateCancelled"));
                }
                $editRow = false;
            }
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($rsold, $rsnew);
        }

        // Clean upload path if any
        if ($editRow) {
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("MonitorTreatmentPlanList"), "", $this->TableVar, true);
        $pageId = "edit";
        $Breadcrumb->add("edit", $pageId, $url);
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
}
