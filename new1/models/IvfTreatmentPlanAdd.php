<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfTreatmentPlanAdd extends IvfTreatmentPlan
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_treatment_plan';

    // Page object name
    public $PageObjName = "IvfTreatmentPlanAdd";

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

        // Table object (ivf_treatment_plan)
        if (!isset($GLOBALS["ivf_treatment_plan"]) || get_class($GLOBALS["ivf_treatment_plan"]) == PROJECT_NAMESPACE . "ivf_treatment_plan") {
            $GLOBALS["ivf_treatment_plan"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_treatment_plan');
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
                $doc = new $class(Container("ivf_treatment_plan"));
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
                    if ($pageName == "IvfTreatmentPlanView") {
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->TreatmentStartDate->setVisibility();
        $this->TreatementStopDate->setVisibility();
        $this->TypePatient->setVisibility();
        $this->Treatment->setVisibility();
        $this->TreatmentTec->setVisibility();
        $this->TypeOfCycle->setVisibility();
        $this->SpermOrgin->setVisibility();
        $this->State->setVisibility();
        $this->Origin->setVisibility();
        $this->MACS->setVisibility();
        $this->Technique->setVisibility();
        $this->PgdPlanning->setVisibility();
        $this->IMSI->setVisibility();
        $this->SequentialCulture->setVisibility();
        $this->TimeLapse->setVisibility();
        $this->AH->setVisibility();
        $this->Weight->setVisibility();
        $this->BMI->setVisibility();
        $this->MaleIndications->setVisibility();
        $this->FemaleIndications->setVisibility();
        $this->UseOfThe->setVisibility();
        $this->Ectopic->setVisibility();
        $this->Heterotopic->setVisibility();
        $this->TransferDFE->setVisibility();
        $this->Evolutive->setVisibility();
        $this->Number->setVisibility();
        $this->SequentialCult->setVisibility();
        $this->TineLapse->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerID->setVisibility();
        $this->WifeCell->setVisibility();
        $this->HusbandCell->setVisibility();
        $this->CoupleID->setVisibility();
        $this->IVFCycleNO->setVisibility();
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
                    $this->terminate("IvfTreatmentPlanList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfTreatmentPlanList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfTreatmentPlanView") {
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
        $this->RIDNO->CurrentValue = null;
        $this->RIDNO->OldValue = $this->RIDNO->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->treatment_status->CurrentValue = "On Going";
        $this->ARTCYCLE->CurrentValue = null;
        $this->ARTCYCLE->OldValue = $this->ARTCYCLE->CurrentValue;
        $this->RESULT->CurrentValue = null;
        $this->RESULT->OldValue = $this->RESULT->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->TreatmentStartDate->CurrentValue = null;
        $this->TreatmentStartDate->OldValue = $this->TreatmentStartDate->CurrentValue;
        $this->TreatementStopDate->CurrentValue = null;
        $this->TreatementStopDate->OldValue = $this->TreatementStopDate->CurrentValue;
        $this->TypePatient->CurrentValue = null;
        $this->TypePatient->OldValue = $this->TypePatient->CurrentValue;
        $this->Treatment->CurrentValue = null;
        $this->Treatment->OldValue = $this->Treatment->CurrentValue;
        $this->TreatmentTec->CurrentValue = null;
        $this->TreatmentTec->OldValue = $this->TreatmentTec->CurrentValue;
        $this->TypeOfCycle->CurrentValue = null;
        $this->TypeOfCycle->OldValue = $this->TypeOfCycle->CurrentValue;
        $this->SpermOrgin->CurrentValue = null;
        $this->SpermOrgin->OldValue = $this->SpermOrgin->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Origin->CurrentValue = null;
        $this->Origin->OldValue = $this->Origin->CurrentValue;
        $this->MACS->CurrentValue = null;
        $this->MACS->OldValue = $this->MACS->CurrentValue;
        $this->Technique->CurrentValue = null;
        $this->Technique->OldValue = $this->Technique->CurrentValue;
        $this->PgdPlanning->CurrentValue = null;
        $this->PgdPlanning->OldValue = $this->PgdPlanning->CurrentValue;
        $this->IMSI->CurrentValue = null;
        $this->IMSI->OldValue = $this->IMSI->CurrentValue;
        $this->SequentialCulture->CurrentValue = null;
        $this->SequentialCulture->OldValue = $this->SequentialCulture->CurrentValue;
        $this->TimeLapse->CurrentValue = null;
        $this->TimeLapse->OldValue = $this->TimeLapse->CurrentValue;
        $this->AH->CurrentValue = null;
        $this->AH->OldValue = $this->AH->CurrentValue;
        $this->Weight->CurrentValue = null;
        $this->Weight->OldValue = $this->Weight->CurrentValue;
        $this->BMI->CurrentValue = null;
        $this->BMI->OldValue = $this->BMI->CurrentValue;
        $this->MaleIndications->CurrentValue = null;
        $this->MaleIndications->OldValue = $this->MaleIndications->CurrentValue;
        $this->FemaleIndications->CurrentValue = null;
        $this->FemaleIndications->OldValue = $this->FemaleIndications->CurrentValue;
        $this->UseOfThe->CurrentValue = null;
        $this->UseOfThe->OldValue = $this->UseOfThe->CurrentValue;
        $this->Ectopic->CurrentValue = null;
        $this->Ectopic->OldValue = $this->Ectopic->CurrentValue;
        $this->Heterotopic->CurrentValue = null;
        $this->Heterotopic->OldValue = $this->Heterotopic->CurrentValue;
        $this->TransferDFE->CurrentValue = null;
        $this->TransferDFE->OldValue = $this->TransferDFE->CurrentValue;
        $this->Evolutive->CurrentValue = null;
        $this->Evolutive->OldValue = $this->Evolutive->CurrentValue;
        $this->Number->CurrentValue = null;
        $this->Number->OldValue = $this->Number->CurrentValue;
        $this->SequentialCult->CurrentValue = null;
        $this->SequentialCult->OldValue = $this->SequentialCult->CurrentValue;
        $this->TineLapse->CurrentValue = null;
        $this->TineLapse->OldValue = $this->TineLapse->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PartnerID->CurrentValue = null;
        $this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
        $this->WifeCell->CurrentValue = null;
        $this->WifeCell->OldValue = $this->WifeCell->CurrentValue;
        $this->HusbandCell->CurrentValue = null;
        $this->HusbandCell->OldValue = $this->HusbandCell->CurrentValue;
        $this->CoupleID->CurrentValue = null;
        $this->CoupleID->OldValue = $this->CoupleID->CurrentValue;
        $this->IVFCycleNO->CurrentValue = null;
        $this->IVFCycleNO->OldValue = $this->IVFCycleNO->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'RIDNO' first before field var 'x_RIDNO'
        $val = $CurrentForm->hasValue("RIDNO") ? $CurrentForm->getValue("RIDNO") : $CurrentForm->getValue("x_RIDNO");
        if (!$this->RIDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNO->Visible = false; // Disable update for API request
            } else {
                $this->RIDNO->setFormValue($val);
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

        // Check field name 'Age' first before field var 'x_Age'
        $val = $CurrentForm->hasValue("Age") ? $CurrentForm->getValue("Age") : $CurrentForm->getValue("x_Age");
        if (!$this->Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Age->Visible = false; // Disable update for API request
            } else {
                $this->Age->setFormValue($val);
            }
        }

        // Check field name 'treatment_status' first before field var 'x_treatment_status'
        $val = $CurrentForm->hasValue("treatment_status") ? $CurrentForm->getValue("treatment_status") : $CurrentForm->getValue("x_treatment_status");
        if (!$this->treatment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->treatment_status->Visible = false; // Disable update for API request
            } else {
                $this->treatment_status->setFormValue($val);
            }
        }

        // Check field name 'ARTCYCLE' first before field var 'x_ARTCYCLE'
        $val = $CurrentForm->hasValue("ARTCYCLE") ? $CurrentForm->getValue("ARTCYCLE") : $CurrentForm->getValue("x_ARTCYCLE");
        if (!$this->ARTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->ARTCYCLE->setFormValue($val);
            }
        }

        // Check field name 'RESULT' first before field var 'x_RESULT'
        $val = $CurrentForm->hasValue("RESULT") ? $CurrentForm->getValue("RESULT") : $CurrentForm->getValue("x_RESULT");
        if (!$this->RESULT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RESULT->Visible = false; // Disable update for API request
            } else {
                $this->RESULT->setFormValue($val);
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

        // Check field name 'TreatmentStartDate' first before field var 'x_TreatmentStartDate'
        $val = $CurrentForm->hasValue("TreatmentStartDate") ? $CurrentForm->getValue("TreatmentStartDate") : $CurrentForm->getValue("x_TreatmentStartDate");
        if (!$this->TreatmentStartDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatmentStartDate->Visible = false; // Disable update for API request
            } else {
                $this->TreatmentStartDate->setFormValue($val);
            }
            $this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 0);
        }

        // Check field name 'TreatementStopDate' first before field var 'x_TreatementStopDate'
        $val = $CurrentForm->hasValue("TreatementStopDate") ? $CurrentForm->getValue("TreatementStopDate") : $CurrentForm->getValue("x_TreatementStopDate");
        if (!$this->TreatementStopDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatementStopDate->Visible = false; // Disable update for API request
            } else {
                $this->TreatementStopDate->setFormValue($val);
            }
            $this->TreatementStopDate->CurrentValue = UnFormatDateTime($this->TreatementStopDate->CurrentValue, 0);
        }

        // Check field name 'TypePatient' first before field var 'x_TypePatient'
        $val = $CurrentForm->hasValue("TypePatient") ? $CurrentForm->getValue("TypePatient") : $CurrentForm->getValue("x_TypePatient");
        if (!$this->TypePatient->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypePatient->Visible = false; // Disable update for API request
            } else {
                $this->TypePatient->setFormValue($val);
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

        // Check field name 'TreatmentTec' first before field var 'x_TreatmentTec'
        $val = $CurrentForm->hasValue("TreatmentTec") ? $CurrentForm->getValue("TreatmentTec") : $CurrentForm->getValue("x_TreatmentTec");
        if (!$this->TreatmentTec->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TreatmentTec->Visible = false; // Disable update for API request
            } else {
                $this->TreatmentTec->setFormValue($val);
            }
        }

        // Check field name 'TypeOfCycle' first before field var 'x_TypeOfCycle'
        $val = $CurrentForm->hasValue("TypeOfCycle") ? $CurrentForm->getValue("TypeOfCycle") : $CurrentForm->getValue("x_TypeOfCycle");
        if (!$this->TypeOfCycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TypeOfCycle->Visible = false; // Disable update for API request
            } else {
                $this->TypeOfCycle->setFormValue($val);
            }
        }

        // Check field name 'SpermOrgin' first before field var 'x_SpermOrgin'
        $val = $CurrentForm->hasValue("SpermOrgin") ? $CurrentForm->getValue("SpermOrgin") : $CurrentForm->getValue("x_SpermOrgin");
        if (!$this->SpermOrgin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SpermOrgin->Visible = false; // Disable update for API request
            } else {
                $this->SpermOrgin->setFormValue($val);
            }
        }

        // Check field name 'State' first before field var 'x_State'
        $val = $CurrentForm->hasValue("State") ? $CurrentForm->getValue("State") : $CurrentForm->getValue("x_State");
        if (!$this->State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->State->Visible = false; // Disable update for API request
            } else {
                $this->State->setFormValue($val);
            }
        }

        // Check field name 'Origin' first before field var 'x_Origin'
        $val = $CurrentForm->hasValue("Origin") ? $CurrentForm->getValue("Origin") : $CurrentForm->getValue("x_Origin");
        if (!$this->Origin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Origin->Visible = false; // Disable update for API request
            } else {
                $this->Origin->setFormValue($val);
            }
        }

        // Check field name 'MACS' first before field var 'x_MACS'
        $val = $CurrentForm->hasValue("MACS") ? $CurrentForm->getValue("MACS") : $CurrentForm->getValue("x_MACS");
        if (!$this->MACS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MACS->Visible = false; // Disable update for API request
            } else {
                $this->MACS->setFormValue($val);
            }
        }

        // Check field name 'Technique' first before field var 'x_Technique'
        $val = $CurrentForm->hasValue("Technique") ? $CurrentForm->getValue("Technique") : $CurrentForm->getValue("x_Technique");
        if (!$this->Technique->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Technique->Visible = false; // Disable update for API request
            } else {
                $this->Technique->setFormValue($val);
            }
        }

        // Check field name 'PgdPlanning' first before field var 'x_PgdPlanning'
        $val = $CurrentForm->hasValue("PgdPlanning") ? $CurrentForm->getValue("PgdPlanning") : $CurrentForm->getValue("x_PgdPlanning");
        if (!$this->PgdPlanning->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PgdPlanning->Visible = false; // Disable update for API request
            } else {
                $this->PgdPlanning->setFormValue($val);
            }
        }

        // Check field name 'IMSI' first before field var 'x_IMSI'
        $val = $CurrentForm->hasValue("IMSI") ? $CurrentForm->getValue("IMSI") : $CurrentForm->getValue("x_IMSI");
        if (!$this->IMSI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IMSI->Visible = false; // Disable update for API request
            } else {
                $this->IMSI->setFormValue($val);
            }
        }

        // Check field name 'SequentialCulture' first before field var 'x_SequentialCulture'
        $val = $CurrentForm->hasValue("SequentialCulture") ? $CurrentForm->getValue("SequentialCulture") : $CurrentForm->getValue("x_SequentialCulture");
        if (!$this->SequentialCulture->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SequentialCulture->Visible = false; // Disable update for API request
            } else {
                $this->SequentialCulture->setFormValue($val);
            }
        }

        // Check field name 'TimeLapse' first before field var 'x_TimeLapse'
        $val = $CurrentForm->hasValue("TimeLapse") ? $CurrentForm->getValue("TimeLapse") : $CurrentForm->getValue("x_TimeLapse");
        if (!$this->TimeLapse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TimeLapse->Visible = false; // Disable update for API request
            } else {
                $this->TimeLapse->setFormValue($val);
            }
        }

        // Check field name 'AH' first before field var 'x_AH'
        $val = $CurrentForm->hasValue("AH") ? $CurrentForm->getValue("AH") : $CurrentForm->getValue("x_AH");
        if (!$this->AH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AH->Visible = false; // Disable update for API request
            } else {
                $this->AH->setFormValue($val);
            }
        }

        // Check field name 'Weight' first before field var 'x_Weight'
        $val = $CurrentForm->hasValue("Weight") ? $CurrentForm->getValue("Weight") : $CurrentForm->getValue("x_Weight");
        if (!$this->Weight->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Weight->Visible = false; // Disable update for API request
            } else {
                $this->Weight->setFormValue($val);
            }
        }

        // Check field name 'BMI' first before field var 'x_BMI'
        $val = $CurrentForm->hasValue("BMI") ? $CurrentForm->getValue("BMI") : $CurrentForm->getValue("x_BMI");
        if (!$this->BMI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BMI->Visible = false; // Disable update for API request
            } else {
                $this->BMI->setFormValue($val);
            }
        }

        // Check field name 'MaleIndications' first before field var 'x_MaleIndications'
        $val = $CurrentForm->hasValue("MaleIndications") ? $CurrentForm->getValue("MaleIndications") : $CurrentForm->getValue("x_MaleIndications");
        if (!$this->MaleIndications->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaleIndications->Visible = false; // Disable update for API request
            } else {
                $this->MaleIndications->setFormValue($val);
            }
        }

        // Check field name 'FemaleIndications' first before field var 'x_FemaleIndications'
        $val = $CurrentForm->hasValue("FemaleIndications") ? $CurrentForm->getValue("FemaleIndications") : $CurrentForm->getValue("x_FemaleIndications");
        if (!$this->FemaleIndications->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FemaleIndications->Visible = false; // Disable update for API request
            } else {
                $this->FemaleIndications->setFormValue($val);
            }
        }

        // Check field name 'UseOfThe' first before field var 'x_UseOfThe'
        $val = $CurrentForm->hasValue("UseOfThe") ? $CurrentForm->getValue("UseOfThe") : $CurrentForm->getValue("x_UseOfThe");
        if (!$this->UseOfThe->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UseOfThe->Visible = false; // Disable update for API request
            } else {
                $this->UseOfThe->setFormValue($val);
            }
        }

        // Check field name 'Ectopic' first before field var 'x_Ectopic'
        $val = $CurrentForm->hasValue("Ectopic") ? $CurrentForm->getValue("Ectopic") : $CurrentForm->getValue("x_Ectopic");
        if (!$this->Ectopic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Ectopic->Visible = false; // Disable update for API request
            } else {
                $this->Ectopic->setFormValue($val);
            }
        }

        // Check field name 'Heterotopic' first before field var 'x_Heterotopic'
        $val = $CurrentForm->hasValue("Heterotopic") ? $CurrentForm->getValue("Heterotopic") : $CurrentForm->getValue("x_Heterotopic");
        if (!$this->Heterotopic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Heterotopic->Visible = false; // Disable update for API request
            } else {
                $this->Heterotopic->setFormValue($val);
            }
        }

        // Check field name 'TransferDFE' first before field var 'x_TransferDFE'
        $val = $CurrentForm->hasValue("TransferDFE") ? $CurrentForm->getValue("TransferDFE") : $CurrentForm->getValue("x_TransferDFE");
        if (!$this->TransferDFE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferDFE->Visible = false; // Disable update for API request
            } else {
                $this->TransferDFE->setFormValue($val);
            }
        }

        // Check field name 'Evolutive' first before field var 'x_Evolutive'
        $val = $CurrentForm->hasValue("Evolutive") ? $CurrentForm->getValue("Evolutive") : $CurrentForm->getValue("x_Evolutive");
        if (!$this->Evolutive->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Evolutive->Visible = false; // Disable update for API request
            } else {
                $this->Evolutive->setFormValue($val);
            }
        }

        // Check field name 'Number' first before field var 'x_Number'
        $val = $CurrentForm->hasValue("Number") ? $CurrentForm->getValue("Number") : $CurrentForm->getValue("x_Number");
        if (!$this->Number->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Number->Visible = false; // Disable update for API request
            } else {
                $this->Number->setFormValue($val);
            }
        }

        // Check field name 'SequentialCult' first before field var 'x_SequentialCult'
        $val = $CurrentForm->hasValue("SequentialCult") ? $CurrentForm->getValue("SequentialCult") : $CurrentForm->getValue("x_SequentialCult");
        if (!$this->SequentialCult->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SequentialCult->Visible = false; // Disable update for API request
            } else {
                $this->SequentialCult->setFormValue($val);
            }
        }

        // Check field name 'TineLapse' first before field var 'x_TineLapse'
        $val = $CurrentForm->hasValue("TineLapse") ? $CurrentForm->getValue("TineLapse") : $CurrentForm->getValue("x_TineLapse");
        if (!$this->TineLapse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TineLapse->Visible = false; // Disable update for API request
            } else {
                $this->TineLapse->setFormValue($val);
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }

        // Check field name 'PartnerID' first before field var 'x_PartnerID'
        $val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
        if (!$this->PartnerID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerID->Visible = false; // Disable update for API request
            } else {
                $this->PartnerID->setFormValue($val);
            }
        }

        // Check field name 'WifeCell' first before field var 'x_WifeCell'
        $val = $CurrentForm->hasValue("WifeCell") ? $CurrentForm->getValue("WifeCell") : $CurrentForm->getValue("x_WifeCell");
        if (!$this->WifeCell->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WifeCell->Visible = false; // Disable update for API request
            } else {
                $this->WifeCell->setFormValue($val);
            }
        }

        // Check field name 'HusbandCell' first before field var 'x_HusbandCell'
        $val = $CurrentForm->hasValue("HusbandCell") ? $CurrentForm->getValue("HusbandCell") : $CurrentForm->getValue("x_HusbandCell");
        if (!$this->HusbandCell->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandCell->Visible = false; // Disable update for API request
            } else {
                $this->HusbandCell->setFormValue($val);
            }
        }

        // Check field name 'CoupleID' first before field var 'x_CoupleID'
        $val = $CurrentForm->hasValue("CoupleID") ? $CurrentForm->getValue("CoupleID") : $CurrentForm->getValue("x_CoupleID");
        if (!$this->CoupleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CoupleID->Visible = false; // Disable update for API request
            } else {
                $this->CoupleID->setFormValue($val);
            }
        }

        // Check field name 'IVFCycleNO' first before field var 'x_IVFCycleNO'
        $val = $CurrentForm->hasValue("IVFCycleNO") ? $CurrentForm->getValue("IVFCycleNO") : $CurrentForm->getValue("x_IVFCycleNO");
        if (!$this->IVFCycleNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IVFCycleNO->Visible = false; // Disable update for API request
            } else {
                $this->IVFCycleNO->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->treatment_status->CurrentValue = $this->treatment_status->FormValue;
        $this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
        $this->RESULT->CurrentValue = $this->RESULT->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->TreatmentStartDate->CurrentValue = $this->TreatmentStartDate->FormValue;
        $this->TreatmentStartDate->CurrentValue = UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 0);
        $this->TreatementStopDate->CurrentValue = $this->TreatementStopDate->FormValue;
        $this->TreatementStopDate->CurrentValue = UnFormatDateTime($this->TreatementStopDate->CurrentValue, 0);
        $this->TypePatient->CurrentValue = $this->TypePatient->FormValue;
        $this->Treatment->CurrentValue = $this->Treatment->FormValue;
        $this->TreatmentTec->CurrentValue = $this->TreatmentTec->FormValue;
        $this->TypeOfCycle->CurrentValue = $this->TypeOfCycle->FormValue;
        $this->SpermOrgin->CurrentValue = $this->SpermOrgin->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Origin->CurrentValue = $this->Origin->FormValue;
        $this->MACS->CurrentValue = $this->MACS->FormValue;
        $this->Technique->CurrentValue = $this->Technique->FormValue;
        $this->PgdPlanning->CurrentValue = $this->PgdPlanning->FormValue;
        $this->IMSI->CurrentValue = $this->IMSI->FormValue;
        $this->SequentialCulture->CurrentValue = $this->SequentialCulture->FormValue;
        $this->TimeLapse->CurrentValue = $this->TimeLapse->FormValue;
        $this->AH->CurrentValue = $this->AH->FormValue;
        $this->Weight->CurrentValue = $this->Weight->FormValue;
        $this->BMI->CurrentValue = $this->BMI->FormValue;
        $this->MaleIndications->CurrentValue = $this->MaleIndications->FormValue;
        $this->FemaleIndications->CurrentValue = $this->FemaleIndications->FormValue;
        $this->UseOfThe->CurrentValue = $this->UseOfThe->FormValue;
        $this->Ectopic->CurrentValue = $this->Ectopic->FormValue;
        $this->Heterotopic->CurrentValue = $this->Heterotopic->FormValue;
        $this->TransferDFE->CurrentValue = $this->TransferDFE->FormValue;
        $this->Evolutive->CurrentValue = $this->Evolutive->FormValue;
        $this->Number->CurrentValue = $this->Number->FormValue;
        $this->SequentialCult->CurrentValue = $this->SequentialCult->FormValue;
        $this->TineLapse->CurrentValue = $this->TineLapse->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->WifeCell->CurrentValue = $this->WifeCell->FormValue;
        $this->HusbandCell->CurrentValue = $this->HusbandCell->FormValue;
        $this->CoupleID->CurrentValue = $this->CoupleID->FormValue;
        $this->IVFCycleNO->CurrentValue = $this->IVFCycleNO->FormValue;
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
        $this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
        $this->TypePatient->setDbValue($row['TypePatient']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->TreatmentTec->setDbValue($row['TreatmentTec']);
        $this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
        $this->SpermOrgin->setDbValue($row['SpermOrgin']);
        $this->State->setDbValue($row['State']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MACS->setDbValue($row['MACS']);
        $this->Technique->setDbValue($row['Technique']);
        $this->PgdPlanning->setDbValue($row['PgdPlanning']);
        $this->IMSI->setDbValue($row['IMSI']);
        $this->SequentialCulture->setDbValue($row['SequentialCulture']);
        $this->TimeLapse->setDbValue($row['TimeLapse']);
        $this->AH->setDbValue($row['AH']);
        $this->Weight->setDbValue($row['Weight']);
        $this->BMI->setDbValue($row['BMI']);
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->UseOfThe->setDbValue($row['UseOfThe']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Heterotopic->setDbValue($row['Heterotopic']);
        $this->TransferDFE->setDbValue($row['TransferDFE']);
        $this->Evolutive->setDbValue($row['Evolutive']);
        $this->Number->setDbValue($row['Number']);
        $this->SequentialCult->setDbValue($row['SequentialCult']);
        $this->TineLapse->setDbValue($row['TineLapse']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->IVFCycleNO->setDbValue($row['IVFCycleNO']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNO'] = $this->RIDNO->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['treatment_status'] = $this->treatment_status->CurrentValue;
        $row['ARTCYCLE'] = $this->ARTCYCLE->CurrentValue;
        $row['RESULT'] = $this->RESULT->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['TreatmentStartDate'] = $this->TreatmentStartDate->CurrentValue;
        $row['TreatementStopDate'] = $this->TreatementStopDate->CurrentValue;
        $row['TypePatient'] = $this->TypePatient->CurrentValue;
        $row['Treatment'] = $this->Treatment->CurrentValue;
        $row['TreatmentTec'] = $this->TreatmentTec->CurrentValue;
        $row['TypeOfCycle'] = $this->TypeOfCycle->CurrentValue;
        $row['SpermOrgin'] = $this->SpermOrgin->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Origin'] = $this->Origin->CurrentValue;
        $row['MACS'] = $this->MACS->CurrentValue;
        $row['Technique'] = $this->Technique->CurrentValue;
        $row['PgdPlanning'] = $this->PgdPlanning->CurrentValue;
        $row['IMSI'] = $this->IMSI->CurrentValue;
        $row['SequentialCulture'] = $this->SequentialCulture->CurrentValue;
        $row['TimeLapse'] = $this->TimeLapse->CurrentValue;
        $row['AH'] = $this->AH->CurrentValue;
        $row['Weight'] = $this->Weight->CurrentValue;
        $row['BMI'] = $this->BMI->CurrentValue;
        $row['MaleIndications'] = $this->MaleIndications->CurrentValue;
        $row['FemaleIndications'] = $this->FemaleIndications->CurrentValue;
        $row['UseOfThe'] = $this->UseOfThe->CurrentValue;
        $row['Ectopic'] = $this->Ectopic->CurrentValue;
        $row['Heterotopic'] = $this->Heterotopic->CurrentValue;
        $row['TransferDFE'] = $this->TransferDFE->CurrentValue;
        $row['Evolutive'] = $this->Evolutive->CurrentValue;
        $row['Number'] = $this->Number->CurrentValue;
        $row['SequentialCult'] = $this->SequentialCult->CurrentValue;
        $row['TineLapse'] = $this->TineLapse->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PartnerID'] = $this->PartnerID->CurrentValue;
        $row['WifeCell'] = $this->WifeCell->CurrentValue;
        $row['HusbandCell'] = $this->HusbandCell->CurrentValue;
        $row['CoupleID'] = $this->CoupleID->CurrentValue;
        $row['IVFCycleNO'] = $this->IVFCycleNO->CurrentValue;
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

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TreatmentStartDate

        // TreatementStopDate

        // TypePatient

        // Treatment

        // TreatmentTec

        // TypeOfCycle

        // SpermOrgin

        // State

        // Origin

        // MACS

        // Technique

        // PgdPlanning

        // IMSI

        // SequentialCulture

        // TimeLapse

        // AH

        // Weight

        // BMI

        // MaleIndications

        // FemaleIndications

        // UseOfThe

        // Ectopic

        // Heterotopic

        // TransferDFE

        // Evolutive

        // Number

        // SequentialCult

        // TineLapse

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // WifeCell

        // HusbandCell

        // CoupleID

        // IVFCycleNO
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // treatment_status
            $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
            $this->status->ViewCustomAttributes = "";

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // TreatmentStartDate
            $this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
            $this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
            $this->TreatmentStartDate->ViewCustomAttributes = "";

            // TreatementStopDate
            $this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
            $this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
            $this->TreatementStopDate->ViewCustomAttributes = "";

            // TypePatient
            $this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
            $this->TypePatient->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // TreatmentTec
            $this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
            $this->TreatmentTec->ViewCustomAttributes = "";

            // TypeOfCycle
            $this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
            $this->TypeOfCycle->ViewCustomAttributes = "";

            // SpermOrgin
            $this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
            $this->SpermOrgin->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Origin
            $this->Origin->ViewValue = $this->Origin->CurrentValue;
            $this->Origin->ViewCustomAttributes = "";

            // MACS
            $this->MACS->ViewValue = $this->MACS->CurrentValue;
            $this->MACS->ViewCustomAttributes = "";

            // Technique
            $this->Technique->ViewValue = $this->Technique->CurrentValue;
            $this->Technique->ViewCustomAttributes = "";

            // PgdPlanning
            $this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
            $this->PgdPlanning->ViewCustomAttributes = "";

            // IMSI
            $this->IMSI->ViewValue = $this->IMSI->CurrentValue;
            $this->IMSI->ViewCustomAttributes = "";

            // SequentialCulture
            $this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
            $this->SequentialCulture->ViewCustomAttributes = "";

            // TimeLapse
            $this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
            $this->TimeLapse->ViewCustomAttributes = "";

            // AH
            $this->AH->ViewValue = $this->AH->CurrentValue;
            $this->AH->ViewCustomAttributes = "";

            // Weight
            $this->Weight->ViewValue = $this->Weight->CurrentValue;
            $this->Weight->ViewCustomAttributes = "";

            // BMI
            $this->BMI->ViewValue = $this->BMI->CurrentValue;
            $this->BMI->ViewCustomAttributes = "";

            // MaleIndications
            $this->MaleIndications->ViewValue = $this->MaleIndications->CurrentValue;
            $this->MaleIndications->ViewCustomAttributes = "";

            // FemaleIndications
            $this->FemaleIndications->ViewValue = $this->FemaleIndications->CurrentValue;
            $this->FemaleIndications->ViewCustomAttributes = "";

            // UseOfThe
            $this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
            $this->UseOfThe->ViewCustomAttributes = "";

            // Ectopic
            $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
            $this->Ectopic->ViewCustomAttributes = "";

            // Heterotopic
            $this->Heterotopic->ViewValue = $this->Heterotopic->CurrentValue;
            $this->Heterotopic->ViewCustomAttributes = "";

            // TransferDFE
            $this->TransferDFE->ViewValue = $this->TransferDFE->CurrentValue;
            $this->TransferDFE->ViewCustomAttributes = "";

            // Evolutive
            $this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
            $this->Evolutive->ViewCustomAttributes = "";

            // Number
            $this->Number->ViewValue = $this->Number->CurrentValue;
            $this->Number->ViewCustomAttributes = "";

            // SequentialCult
            $this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
            $this->SequentialCult->ViewCustomAttributes = "";

            // TineLapse
            $this->TineLapse->ViewValue = $this->TineLapse->CurrentValue;
            $this->TineLapse->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // WifeCell
            $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
            $this->WifeCell->ViewCustomAttributes = "";

            // HusbandCell
            $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
            $this->HusbandCell->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // IVFCycleNO
            $this->IVFCycleNO->ViewValue = $this->IVFCycleNO->CurrentValue;
            $this->IVFCycleNO->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

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

            // TreatmentStartDate
            $this->TreatmentStartDate->LinkCustomAttributes = "";
            $this->TreatmentStartDate->HrefValue = "";
            $this->TreatmentStartDate->TooltipValue = "";

            // TreatementStopDate
            $this->TreatementStopDate->LinkCustomAttributes = "";
            $this->TreatementStopDate->HrefValue = "";
            $this->TreatementStopDate->TooltipValue = "";

            // TypePatient
            $this->TypePatient->LinkCustomAttributes = "";
            $this->TypePatient->HrefValue = "";
            $this->TypePatient->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // TreatmentTec
            $this->TreatmentTec->LinkCustomAttributes = "";
            $this->TreatmentTec->HrefValue = "";
            $this->TreatmentTec->TooltipValue = "";

            // TypeOfCycle
            $this->TypeOfCycle->LinkCustomAttributes = "";
            $this->TypeOfCycle->HrefValue = "";
            $this->TypeOfCycle->TooltipValue = "";

            // SpermOrgin
            $this->SpermOrgin->LinkCustomAttributes = "";
            $this->SpermOrgin->HrefValue = "";
            $this->SpermOrgin->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";
            $this->MACS->TooltipValue = "";

            // Technique
            $this->Technique->LinkCustomAttributes = "";
            $this->Technique->HrefValue = "";
            $this->Technique->TooltipValue = "";

            // PgdPlanning
            $this->PgdPlanning->LinkCustomAttributes = "";
            $this->PgdPlanning->HrefValue = "";
            $this->PgdPlanning->TooltipValue = "";

            // IMSI
            $this->IMSI->LinkCustomAttributes = "";
            $this->IMSI->HrefValue = "";
            $this->IMSI->TooltipValue = "";

            // SequentialCulture
            $this->SequentialCulture->LinkCustomAttributes = "";
            $this->SequentialCulture->HrefValue = "";
            $this->SequentialCulture->TooltipValue = "";

            // TimeLapse
            $this->TimeLapse->LinkCustomAttributes = "";
            $this->TimeLapse->HrefValue = "";
            $this->TimeLapse->TooltipValue = "";

            // AH
            $this->AH->LinkCustomAttributes = "";
            $this->AH->HrefValue = "";
            $this->AH->TooltipValue = "";

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";
            $this->Weight->TooltipValue = "";

            // BMI
            $this->BMI->LinkCustomAttributes = "";
            $this->BMI->HrefValue = "";
            $this->BMI->TooltipValue = "";

            // MaleIndications
            $this->MaleIndications->LinkCustomAttributes = "";
            $this->MaleIndications->HrefValue = "";
            $this->MaleIndications->TooltipValue = "";

            // FemaleIndications
            $this->FemaleIndications->LinkCustomAttributes = "";
            $this->FemaleIndications->HrefValue = "";
            $this->FemaleIndications->TooltipValue = "";

            // UseOfThe
            $this->UseOfThe->LinkCustomAttributes = "";
            $this->UseOfThe->HrefValue = "";
            $this->UseOfThe->TooltipValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";
            $this->Ectopic->TooltipValue = "";

            // Heterotopic
            $this->Heterotopic->LinkCustomAttributes = "";
            $this->Heterotopic->HrefValue = "";
            $this->Heterotopic->TooltipValue = "";

            // TransferDFE
            $this->TransferDFE->LinkCustomAttributes = "";
            $this->TransferDFE->HrefValue = "";
            $this->TransferDFE->TooltipValue = "";

            // Evolutive
            $this->Evolutive->LinkCustomAttributes = "";
            $this->Evolutive->HrefValue = "";
            $this->Evolutive->TooltipValue = "";

            // Number
            $this->Number->LinkCustomAttributes = "";
            $this->Number->HrefValue = "";
            $this->Number->TooltipValue = "";

            // SequentialCult
            $this->SequentialCult->LinkCustomAttributes = "";
            $this->SequentialCult->HrefValue = "";
            $this->SequentialCult->TooltipValue = "";

            // TineLapse
            $this->TineLapse->LinkCustomAttributes = "";
            $this->TineLapse->HrefValue = "";
            $this->TineLapse->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";
            $this->WifeCell->TooltipValue = "";

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";
            $this->HusbandCell->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";

            // IVFCycleNO
            $this->IVFCycleNO->LinkCustomAttributes = "";
            $this->IVFCycleNO->HrefValue = "";
            $this->IVFCycleNO->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            if (!$this->treatment_status->Raw) {
                $this->treatment_status->CurrentValue = HtmlDecode($this->treatment_status->CurrentValue);
            }
            $this->treatment_status->EditValue = HtmlEncode($this->treatment_status->CurrentValue);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE->EditCustomAttributes = "";
            if (!$this->ARTCYCLE->Raw) {
                $this->ARTCYCLE->CurrentValue = HtmlDecode($this->ARTCYCLE->CurrentValue);
            }
            $this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->CurrentValue);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            if (!$this->RESULT->Raw) {
                $this->RESULT->CurrentValue = HtmlDecode($this->RESULT->CurrentValue);
            }
            $this->RESULT->EditValue = HtmlEncode($this->RESULT->CurrentValue);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->CurrentValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
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
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->CurrentValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime($this->modifieddatetime->CurrentValue, 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // TreatmentStartDate
            $this->TreatmentStartDate->EditAttrs["class"] = "form-control";
            $this->TreatmentStartDate->EditCustomAttributes = "";
            $this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime($this->TreatmentStartDate->CurrentValue, 8));
            $this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

            // TreatementStopDate
            $this->TreatementStopDate->EditAttrs["class"] = "form-control";
            $this->TreatementStopDate->EditCustomAttributes = "";
            $this->TreatementStopDate->EditValue = HtmlEncode(FormatDateTime($this->TreatementStopDate->CurrentValue, 8));
            $this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

            // TypePatient
            $this->TypePatient->EditAttrs["class"] = "form-control";
            $this->TypePatient->EditCustomAttributes = "";
            if (!$this->TypePatient->Raw) {
                $this->TypePatient->CurrentValue = HtmlDecode($this->TypePatient->CurrentValue);
            }
            $this->TypePatient->EditValue = HtmlEncode($this->TypePatient->CurrentValue);
            $this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            if (!$this->Treatment->Raw) {
                $this->Treatment->CurrentValue = HtmlDecode($this->Treatment->CurrentValue);
            }
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->CurrentValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // TreatmentTec
            $this->TreatmentTec->EditAttrs["class"] = "form-control";
            $this->TreatmentTec->EditCustomAttributes = "";
            if (!$this->TreatmentTec->Raw) {
                $this->TreatmentTec->CurrentValue = HtmlDecode($this->TreatmentTec->CurrentValue);
            }
            $this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->CurrentValue);
            $this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

            // TypeOfCycle
            $this->TypeOfCycle->EditAttrs["class"] = "form-control";
            $this->TypeOfCycle->EditCustomAttributes = "";
            if (!$this->TypeOfCycle->Raw) {
                $this->TypeOfCycle->CurrentValue = HtmlDecode($this->TypeOfCycle->CurrentValue);
            }
            $this->TypeOfCycle->EditValue = HtmlEncode($this->TypeOfCycle->CurrentValue);
            $this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

            // SpermOrgin
            $this->SpermOrgin->EditAttrs["class"] = "form-control";
            $this->SpermOrgin->EditCustomAttributes = "";
            if (!$this->SpermOrgin->Raw) {
                $this->SpermOrgin->CurrentValue = HtmlDecode($this->SpermOrgin->CurrentValue);
            }
            $this->SpermOrgin->EditValue = HtmlEncode($this->SpermOrgin->CurrentValue);
            $this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Origin
            $this->Origin->EditAttrs["class"] = "form-control";
            $this->Origin->EditCustomAttributes = "";
            if (!$this->Origin->Raw) {
                $this->Origin->CurrentValue = HtmlDecode($this->Origin->CurrentValue);
            }
            $this->Origin->EditValue = HtmlEncode($this->Origin->CurrentValue);
            $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

            // MACS
            $this->MACS->EditAttrs["class"] = "form-control";
            $this->MACS->EditCustomAttributes = "";
            if (!$this->MACS->Raw) {
                $this->MACS->CurrentValue = HtmlDecode($this->MACS->CurrentValue);
            }
            $this->MACS->EditValue = HtmlEncode($this->MACS->CurrentValue);
            $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

            // Technique
            $this->Technique->EditAttrs["class"] = "form-control";
            $this->Technique->EditCustomAttributes = "";
            if (!$this->Technique->Raw) {
                $this->Technique->CurrentValue = HtmlDecode($this->Technique->CurrentValue);
            }
            $this->Technique->EditValue = HtmlEncode($this->Technique->CurrentValue);
            $this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

            // PgdPlanning
            $this->PgdPlanning->EditAttrs["class"] = "form-control";
            $this->PgdPlanning->EditCustomAttributes = "";
            if (!$this->PgdPlanning->Raw) {
                $this->PgdPlanning->CurrentValue = HtmlDecode($this->PgdPlanning->CurrentValue);
            }
            $this->PgdPlanning->EditValue = HtmlEncode($this->PgdPlanning->CurrentValue);
            $this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

            // IMSI
            $this->IMSI->EditAttrs["class"] = "form-control";
            $this->IMSI->EditCustomAttributes = "";
            if (!$this->IMSI->Raw) {
                $this->IMSI->CurrentValue = HtmlDecode($this->IMSI->CurrentValue);
            }
            $this->IMSI->EditValue = HtmlEncode($this->IMSI->CurrentValue);
            $this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

            // SequentialCulture
            $this->SequentialCulture->EditAttrs["class"] = "form-control";
            $this->SequentialCulture->EditCustomAttributes = "";
            if (!$this->SequentialCulture->Raw) {
                $this->SequentialCulture->CurrentValue = HtmlDecode($this->SequentialCulture->CurrentValue);
            }
            $this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->CurrentValue);
            $this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

            // TimeLapse
            $this->TimeLapse->EditAttrs["class"] = "form-control";
            $this->TimeLapse->EditCustomAttributes = "";
            if (!$this->TimeLapse->Raw) {
                $this->TimeLapse->CurrentValue = HtmlDecode($this->TimeLapse->CurrentValue);
            }
            $this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->CurrentValue);
            $this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

            // AH
            $this->AH->EditAttrs["class"] = "form-control";
            $this->AH->EditCustomAttributes = "";
            if (!$this->AH->Raw) {
                $this->AH->CurrentValue = HtmlDecode($this->AH->CurrentValue);
            }
            $this->AH->EditValue = HtmlEncode($this->AH->CurrentValue);
            $this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

            // Weight
            $this->Weight->EditAttrs["class"] = "form-control";
            $this->Weight->EditCustomAttributes = "";
            if (!$this->Weight->Raw) {
                $this->Weight->CurrentValue = HtmlDecode($this->Weight->CurrentValue);
            }
            $this->Weight->EditValue = HtmlEncode($this->Weight->CurrentValue);
            $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

            // BMI
            $this->BMI->EditAttrs["class"] = "form-control";
            $this->BMI->EditCustomAttributes = "";
            if (!$this->BMI->Raw) {
                $this->BMI->CurrentValue = HtmlDecode($this->BMI->CurrentValue);
            }
            $this->BMI->EditValue = HtmlEncode($this->BMI->CurrentValue);
            $this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

            // MaleIndications
            $this->MaleIndications->EditAttrs["class"] = "form-control";
            $this->MaleIndications->EditCustomAttributes = "";
            if (!$this->MaleIndications->Raw) {
                $this->MaleIndications->CurrentValue = HtmlDecode($this->MaleIndications->CurrentValue);
            }
            $this->MaleIndications->EditValue = HtmlEncode($this->MaleIndications->CurrentValue);
            $this->MaleIndications->PlaceHolder = RemoveHtml($this->MaleIndications->caption());

            // FemaleIndications
            $this->FemaleIndications->EditAttrs["class"] = "form-control";
            $this->FemaleIndications->EditCustomAttributes = "";
            if (!$this->FemaleIndications->Raw) {
                $this->FemaleIndications->CurrentValue = HtmlDecode($this->FemaleIndications->CurrentValue);
            }
            $this->FemaleIndications->EditValue = HtmlEncode($this->FemaleIndications->CurrentValue);
            $this->FemaleIndications->PlaceHolder = RemoveHtml($this->FemaleIndications->caption());

            // UseOfThe
            $this->UseOfThe->EditAttrs["class"] = "form-control";
            $this->UseOfThe->EditCustomAttributes = "";
            if (!$this->UseOfThe->Raw) {
                $this->UseOfThe->CurrentValue = HtmlDecode($this->UseOfThe->CurrentValue);
            }
            $this->UseOfThe->EditValue = HtmlEncode($this->UseOfThe->CurrentValue);
            $this->UseOfThe->PlaceHolder = RemoveHtml($this->UseOfThe->caption());

            // Ectopic
            $this->Ectopic->EditAttrs["class"] = "form-control";
            $this->Ectopic->EditCustomAttributes = "";
            if (!$this->Ectopic->Raw) {
                $this->Ectopic->CurrentValue = HtmlDecode($this->Ectopic->CurrentValue);
            }
            $this->Ectopic->EditValue = HtmlEncode($this->Ectopic->CurrentValue);
            $this->Ectopic->PlaceHolder = RemoveHtml($this->Ectopic->caption());

            // Heterotopic
            $this->Heterotopic->EditAttrs["class"] = "form-control";
            $this->Heterotopic->EditCustomAttributes = "";
            if (!$this->Heterotopic->Raw) {
                $this->Heterotopic->CurrentValue = HtmlDecode($this->Heterotopic->CurrentValue);
            }
            $this->Heterotopic->EditValue = HtmlEncode($this->Heterotopic->CurrentValue);
            $this->Heterotopic->PlaceHolder = RemoveHtml($this->Heterotopic->caption());

            // TransferDFE
            $this->TransferDFE->EditAttrs["class"] = "form-control";
            $this->TransferDFE->EditCustomAttributes = "";
            if (!$this->TransferDFE->Raw) {
                $this->TransferDFE->CurrentValue = HtmlDecode($this->TransferDFE->CurrentValue);
            }
            $this->TransferDFE->EditValue = HtmlEncode($this->TransferDFE->CurrentValue);
            $this->TransferDFE->PlaceHolder = RemoveHtml($this->TransferDFE->caption());

            // Evolutive
            $this->Evolutive->EditAttrs["class"] = "form-control";
            $this->Evolutive->EditCustomAttributes = "";
            if (!$this->Evolutive->Raw) {
                $this->Evolutive->CurrentValue = HtmlDecode($this->Evolutive->CurrentValue);
            }
            $this->Evolutive->EditValue = HtmlEncode($this->Evolutive->CurrentValue);
            $this->Evolutive->PlaceHolder = RemoveHtml($this->Evolutive->caption());

            // Number
            $this->Number->EditAttrs["class"] = "form-control";
            $this->Number->EditCustomAttributes = "";
            if (!$this->Number->Raw) {
                $this->Number->CurrentValue = HtmlDecode($this->Number->CurrentValue);
            }
            $this->Number->EditValue = HtmlEncode($this->Number->CurrentValue);
            $this->Number->PlaceHolder = RemoveHtml($this->Number->caption());

            // SequentialCult
            $this->SequentialCult->EditAttrs["class"] = "form-control";
            $this->SequentialCult->EditCustomAttributes = "";
            if (!$this->SequentialCult->Raw) {
                $this->SequentialCult->CurrentValue = HtmlDecode($this->SequentialCult->CurrentValue);
            }
            $this->SequentialCult->EditValue = HtmlEncode($this->SequentialCult->CurrentValue);
            $this->SequentialCult->PlaceHolder = RemoveHtml($this->SequentialCult->caption());

            // TineLapse
            $this->TineLapse->EditAttrs["class"] = "form-control";
            $this->TineLapse->EditCustomAttributes = "";
            if (!$this->TineLapse->Raw) {
                $this->TineLapse->CurrentValue = HtmlDecode($this->TineLapse->CurrentValue);
            }
            $this->TineLapse->EditValue = HtmlEncode($this->TineLapse->CurrentValue);
            $this->TineLapse->PlaceHolder = RemoveHtml($this->TineLapse->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // WifeCell
            $this->WifeCell->EditAttrs["class"] = "form-control";
            $this->WifeCell->EditCustomAttributes = "";
            if (!$this->WifeCell->Raw) {
                $this->WifeCell->CurrentValue = HtmlDecode($this->WifeCell->CurrentValue);
            }
            $this->WifeCell->EditValue = HtmlEncode($this->WifeCell->CurrentValue);
            $this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

            // HusbandCell
            $this->HusbandCell->EditAttrs["class"] = "form-control";
            $this->HusbandCell->EditCustomAttributes = "";
            if (!$this->HusbandCell->Raw) {
                $this->HusbandCell->CurrentValue = HtmlDecode($this->HusbandCell->CurrentValue);
            }
            $this->HusbandCell->EditValue = HtmlEncode($this->HusbandCell->CurrentValue);
            $this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->CurrentValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

            // IVFCycleNO
            $this->IVFCycleNO->EditAttrs["class"] = "form-control";
            $this->IVFCycleNO->EditCustomAttributes = "";
            if (!$this->IVFCycleNO->Raw) {
                $this->IVFCycleNO->CurrentValue = HtmlDecode($this->IVFCycleNO->CurrentValue);
            }
            $this->IVFCycleNO->EditValue = HtmlEncode($this->IVFCycleNO->CurrentValue);
            $this->IVFCycleNO->PlaceHolder = RemoveHtml($this->IVFCycleNO->caption());

            // Add refer script

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

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

            // TreatmentStartDate
            $this->TreatmentStartDate->LinkCustomAttributes = "";
            $this->TreatmentStartDate->HrefValue = "";

            // TreatementStopDate
            $this->TreatementStopDate->LinkCustomAttributes = "";
            $this->TreatementStopDate->HrefValue = "";

            // TypePatient
            $this->TypePatient->LinkCustomAttributes = "";
            $this->TypePatient->HrefValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";

            // TreatmentTec
            $this->TreatmentTec->LinkCustomAttributes = "";
            $this->TreatmentTec->HrefValue = "";

            // TypeOfCycle
            $this->TypeOfCycle->LinkCustomAttributes = "";
            $this->TypeOfCycle->HrefValue = "";

            // SpermOrgin
            $this->SpermOrgin->LinkCustomAttributes = "";
            $this->SpermOrgin->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";

            // Technique
            $this->Technique->LinkCustomAttributes = "";
            $this->Technique->HrefValue = "";

            // PgdPlanning
            $this->PgdPlanning->LinkCustomAttributes = "";
            $this->PgdPlanning->HrefValue = "";

            // IMSI
            $this->IMSI->LinkCustomAttributes = "";
            $this->IMSI->HrefValue = "";

            // SequentialCulture
            $this->SequentialCulture->LinkCustomAttributes = "";
            $this->SequentialCulture->HrefValue = "";

            // TimeLapse
            $this->TimeLapse->LinkCustomAttributes = "";
            $this->TimeLapse->HrefValue = "";

            // AH
            $this->AH->LinkCustomAttributes = "";
            $this->AH->HrefValue = "";

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";

            // BMI
            $this->BMI->LinkCustomAttributes = "";
            $this->BMI->HrefValue = "";

            // MaleIndications
            $this->MaleIndications->LinkCustomAttributes = "";
            $this->MaleIndications->HrefValue = "";

            // FemaleIndications
            $this->FemaleIndications->LinkCustomAttributes = "";
            $this->FemaleIndications->HrefValue = "";

            // UseOfThe
            $this->UseOfThe->LinkCustomAttributes = "";
            $this->UseOfThe->HrefValue = "";

            // Ectopic
            $this->Ectopic->LinkCustomAttributes = "";
            $this->Ectopic->HrefValue = "";

            // Heterotopic
            $this->Heterotopic->LinkCustomAttributes = "";
            $this->Heterotopic->HrefValue = "";

            // TransferDFE
            $this->TransferDFE->LinkCustomAttributes = "";
            $this->TransferDFE->HrefValue = "";

            // Evolutive
            $this->Evolutive->LinkCustomAttributes = "";
            $this->Evolutive->HrefValue = "";

            // Number
            $this->Number->LinkCustomAttributes = "";
            $this->Number->HrefValue = "";

            // SequentialCult
            $this->SequentialCult->LinkCustomAttributes = "";
            $this->SequentialCult->HrefValue = "";

            // TineLapse
            $this->TineLapse->LinkCustomAttributes = "";
            $this->TineLapse->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";

            // IVFCycleNO
            $this->IVFCycleNO->LinkCustomAttributes = "";
            $this->IVFCycleNO->HrefValue = "";
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
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->treatment_status->Required) {
            if (!$this->treatment_status->IsDetailKey && EmptyValue($this->treatment_status->FormValue)) {
                $this->treatment_status->addErrorMessage(str_replace("%s", $this->treatment_status->caption(), $this->treatment_status->RequiredErrorMessage));
            }
        }
        if ($this->ARTCYCLE->Required) {
            if (!$this->ARTCYCLE->IsDetailKey && EmptyValue($this->ARTCYCLE->FormValue)) {
                $this->ARTCYCLE->addErrorMessage(str_replace("%s", $this->ARTCYCLE->caption(), $this->ARTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->RESULT->Required) {
            if (!$this->RESULT->IsDetailKey && EmptyValue($this->RESULT->FormValue)) {
                $this->RESULT->addErrorMessage(str_replace("%s", $this->RESULT->caption(), $this->RESULT->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->status->FormValue)) {
            $this->status->addErrorMessage($this->status->getErrorMessage(false));
        }
        if ($this->createdby->Required) {
            if (!$this->createdby->IsDetailKey && EmptyValue($this->createdby->FormValue)) {
                $this->createdby->addErrorMessage(str_replace("%s", $this->createdby->caption(), $this->createdby->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->createdby->FormValue)) {
            $this->createdby->addErrorMessage($this->createdby->getErrorMessage(false));
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
        if (!CheckInteger($this->modifiedby->FormValue)) {
            $this->modifiedby->addErrorMessage($this->modifiedby->getErrorMessage(false));
        }
        if ($this->modifieddatetime->Required) {
            if (!$this->modifieddatetime->IsDetailKey && EmptyValue($this->modifieddatetime->FormValue)) {
                $this->modifieddatetime->addErrorMessage(str_replace("%s", $this->modifieddatetime->caption(), $this->modifieddatetime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->modifieddatetime->FormValue)) {
            $this->modifieddatetime->addErrorMessage($this->modifieddatetime->getErrorMessage(false));
        }
        if ($this->TreatmentStartDate->Required) {
            if (!$this->TreatmentStartDate->IsDetailKey && EmptyValue($this->TreatmentStartDate->FormValue)) {
                $this->TreatmentStartDate->addErrorMessage(str_replace("%s", $this->TreatmentStartDate->caption(), $this->TreatmentStartDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->TreatmentStartDate->FormValue)) {
            $this->TreatmentStartDate->addErrorMessage($this->TreatmentStartDate->getErrorMessage(false));
        }
        if ($this->TreatementStopDate->Required) {
            if (!$this->TreatementStopDate->IsDetailKey && EmptyValue($this->TreatementStopDate->FormValue)) {
                $this->TreatementStopDate->addErrorMessage(str_replace("%s", $this->TreatementStopDate->caption(), $this->TreatementStopDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->TreatementStopDate->FormValue)) {
            $this->TreatementStopDate->addErrorMessage($this->TreatementStopDate->getErrorMessage(false));
        }
        if ($this->TypePatient->Required) {
            if (!$this->TypePatient->IsDetailKey && EmptyValue($this->TypePatient->FormValue)) {
                $this->TypePatient->addErrorMessage(str_replace("%s", $this->TypePatient->caption(), $this->TypePatient->RequiredErrorMessage));
            }
        }
        if ($this->Treatment->Required) {
            if (!$this->Treatment->IsDetailKey && EmptyValue($this->Treatment->FormValue)) {
                $this->Treatment->addErrorMessage(str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
            }
        }
        if ($this->TreatmentTec->Required) {
            if (!$this->TreatmentTec->IsDetailKey && EmptyValue($this->TreatmentTec->FormValue)) {
                $this->TreatmentTec->addErrorMessage(str_replace("%s", $this->TreatmentTec->caption(), $this->TreatmentTec->RequiredErrorMessage));
            }
        }
        if ($this->TypeOfCycle->Required) {
            if (!$this->TypeOfCycle->IsDetailKey && EmptyValue($this->TypeOfCycle->FormValue)) {
                $this->TypeOfCycle->addErrorMessage(str_replace("%s", $this->TypeOfCycle->caption(), $this->TypeOfCycle->RequiredErrorMessage));
            }
        }
        if ($this->SpermOrgin->Required) {
            if (!$this->SpermOrgin->IsDetailKey && EmptyValue($this->SpermOrgin->FormValue)) {
                $this->SpermOrgin->addErrorMessage(str_replace("%s", $this->SpermOrgin->caption(), $this->SpermOrgin->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Origin->Required) {
            if (!$this->Origin->IsDetailKey && EmptyValue($this->Origin->FormValue)) {
                $this->Origin->addErrorMessage(str_replace("%s", $this->Origin->caption(), $this->Origin->RequiredErrorMessage));
            }
        }
        if ($this->MACS->Required) {
            if (!$this->MACS->IsDetailKey && EmptyValue($this->MACS->FormValue)) {
                $this->MACS->addErrorMessage(str_replace("%s", $this->MACS->caption(), $this->MACS->RequiredErrorMessage));
            }
        }
        if ($this->Technique->Required) {
            if (!$this->Technique->IsDetailKey && EmptyValue($this->Technique->FormValue)) {
                $this->Technique->addErrorMessage(str_replace("%s", $this->Technique->caption(), $this->Technique->RequiredErrorMessage));
            }
        }
        if ($this->PgdPlanning->Required) {
            if (!$this->PgdPlanning->IsDetailKey && EmptyValue($this->PgdPlanning->FormValue)) {
                $this->PgdPlanning->addErrorMessage(str_replace("%s", $this->PgdPlanning->caption(), $this->PgdPlanning->RequiredErrorMessage));
            }
        }
        if ($this->IMSI->Required) {
            if (!$this->IMSI->IsDetailKey && EmptyValue($this->IMSI->FormValue)) {
                $this->IMSI->addErrorMessage(str_replace("%s", $this->IMSI->caption(), $this->IMSI->RequiredErrorMessage));
            }
        }
        if ($this->SequentialCulture->Required) {
            if (!$this->SequentialCulture->IsDetailKey && EmptyValue($this->SequentialCulture->FormValue)) {
                $this->SequentialCulture->addErrorMessage(str_replace("%s", $this->SequentialCulture->caption(), $this->SequentialCulture->RequiredErrorMessage));
            }
        }
        if ($this->TimeLapse->Required) {
            if (!$this->TimeLapse->IsDetailKey && EmptyValue($this->TimeLapse->FormValue)) {
                $this->TimeLapse->addErrorMessage(str_replace("%s", $this->TimeLapse->caption(), $this->TimeLapse->RequiredErrorMessage));
            }
        }
        if ($this->AH->Required) {
            if (!$this->AH->IsDetailKey && EmptyValue($this->AH->FormValue)) {
                $this->AH->addErrorMessage(str_replace("%s", $this->AH->caption(), $this->AH->RequiredErrorMessage));
            }
        }
        if ($this->Weight->Required) {
            if (!$this->Weight->IsDetailKey && EmptyValue($this->Weight->FormValue)) {
                $this->Weight->addErrorMessage(str_replace("%s", $this->Weight->caption(), $this->Weight->RequiredErrorMessage));
            }
        }
        if ($this->BMI->Required) {
            if (!$this->BMI->IsDetailKey && EmptyValue($this->BMI->FormValue)) {
                $this->BMI->addErrorMessage(str_replace("%s", $this->BMI->caption(), $this->BMI->RequiredErrorMessage));
            }
        }
        if ($this->MaleIndications->Required) {
            if (!$this->MaleIndications->IsDetailKey && EmptyValue($this->MaleIndications->FormValue)) {
                $this->MaleIndications->addErrorMessage(str_replace("%s", $this->MaleIndications->caption(), $this->MaleIndications->RequiredErrorMessage));
            }
        }
        if ($this->FemaleIndications->Required) {
            if (!$this->FemaleIndications->IsDetailKey && EmptyValue($this->FemaleIndications->FormValue)) {
                $this->FemaleIndications->addErrorMessage(str_replace("%s", $this->FemaleIndications->caption(), $this->FemaleIndications->RequiredErrorMessage));
            }
        }
        if ($this->UseOfThe->Required) {
            if (!$this->UseOfThe->IsDetailKey && EmptyValue($this->UseOfThe->FormValue)) {
                $this->UseOfThe->addErrorMessage(str_replace("%s", $this->UseOfThe->caption(), $this->UseOfThe->RequiredErrorMessage));
            }
        }
        if ($this->Ectopic->Required) {
            if (!$this->Ectopic->IsDetailKey && EmptyValue($this->Ectopic->FormValue)) {
                $this->Ectopic->addErrorMessage(str_replace("%s", $this->Ectopic->caption(), $this->Ectopic->RequiredErrorMessage));
            }
        }
        if ($this->Heterotopic->Required) {
            if (!$this->Heterotopic->IsDetailKey && EmptyValue($this->Heterotopic->FormValue)) {
                $this->Heterotopic->addErrorMessage(str_replace("%s", $this->Heterotopic->caption(), $this->Heterotopic->RequiredErrorMessage));
            }
        }
        if ($this->TransferDFE->Required) {
            if (!$this->TransferDFE->IsDetailKey && EmptyValue($this->TransferDFE->FormValue)) {
                $this->TransferDFE->addErrorMessage(str_replace("%s", $this->TransferDFE->caption(), $this->TransferDFE->RequiredErrorMessage));
            }
        }
        if ($this->Evolutive->Required) {
            if (!$this->Evolutive->IsDetailKey && EmptyValue($this->Evolutive->FormValue)) {
                $this->Evolutive->addErrorMessage(str_replace("%s", $this->Evolutive->caption(), $this->Evolutive->RequiredErrorMessage));
            }
        }
        if ($this->Number->Required) {
            if (!$this->Number->IsDetailKey && EmptyValue($this->Number->FormValue)) {
                $this->Number->addErrorMessage(str_replace("%s", $this->Number->caption(), $this->Number->RequiredErrorMessage));
            }
        }
        if ($this->SequentialCult->Required) {
            if (!$this->SequentialCult->IsDetailKey && EmptyValue($this->SequentialCult->FormValue)) {
                $this->SequentialCult->addErrorMessage(str_replace("%s", $this->SequentialCult->caption(), $this->SequentialCult->RequiredErrorMessage));
            }
        }
        if ($this->TineLapse->Required) {
            if (!$this->TineLapse->IsDetailKey && EmptyValue($this->TineLapse->FormValue)) {
                $this->TineLapse->addErrorMessage(str_replace("%s", $this->TineLapse->caption(), $this->TineLapse->RequiredErrorMessage));
            }
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PartnerID->Required) {
            if (!$this->PartnerID->IsDetailKey && EmptyValue($this->PartnerID->FormValue)) {
                $this->PartnerID->addErrorMessage(str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
            }
        }
        if ($this->WifeCell->Required) {
            if (!$this->WifeCell->IsDetailKey && EmptyValue($this->WifeCell->FormValue)) {
                $this->WifeCell->addErrorMessage(str_replace("%s", $this->WifeCell->caption(), $this->WifeCell->RequiredErrorMessage));
            }
        }
        if ($this->HusbandCell->Required) {
            if (!$this->HusbandCell->IsDetailKey && EmptyValue($this->HusbandCell->FormValue)) {
                $this->HusbandCell->addErrorMessage(str_replace("%s", $this->HusbandCell->caption(), $this->HusbandCell->RequiredErrorMessage));
            }
        }
        if ($this->CoupleID->Required) {
            if (!$this->CoupleID->IsDetailKey && EmptyValue($this->CoupleID->FormValue)) {
                $this->CoupleID->addErrorMessage(str_replace("%s", $this->CoupleID->caption(), $this->CoupleID->RequiredErrorMessage));
            }
        }
        if ($this->IVFCycleNO->Required) {
            if (!$this->IVFCycleNO->IsDetailKey && EmptyValue($this->IVFCycleNO->FormValue)) {
                $this->IVFCycleNO->addErrorMessage(str_replace("%s", $this->IVFCycleNO->caption(), $this->IVFCycleNO->RequiredErrorMessage));
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

        // RIDNO
        $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // treatment_status
        $this->treatment_status->setDbValueDef($rsnew, $this->treatment_status->CurrentValue, null, strval($this->treatment_status->CurrentValue) == "");

        // ARTCYCLE
        $this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, null, false);

        // RESULT
        $this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // TreatmentStartDate
        $this->TreatmentStartDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatmentStartDate->CurrentValue, 0), null, false);

        // TreatementStopDate
        $this->TreatementStopDate->setDbValueDef($rsnew, UnFormatDateTime($this->TreatementStopDate->CurrentValue, 0), null, false);

        // TypePatient
        $this->TypePatient->setDbValueDef($rsnew, $this->TypePatient->CurrentValue, null, false);

        // Treatment
        $this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, null, false);

        // TreatmentTec
        $this->TreatmentTec->setDbValueDef($rsnew, $this->TreatmentTec->CurrentValue, null, false);

        // TypeOfCycle
        $this->TypeOfCycle->setDbValueDef($rsnew, $this->TypeOfCycle->CurrentValue, null, false);

        // SpermOrgin
        $this->SpermOrgin->setDbValueDef($rsnew, $this->SpermOrgin->CurrentValue, null, false);

        // State
        $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, false);

        // Origin
        $this->Origin->setDbValueDef($rsnew, $this->Origin->CurrentValue, null, false);

        // MACS
        $this->MACS->setDbValueDef($rsnew, $this->MACS->CurrentValue, null, false);

        // Technique
        $this->Technique->setDbValueDef($rsnew, $this->Technique->CurrentValue, null, false);

        // PgdPlanning
        $this->PgdPlanning->setDbValueDef($rsnew, $this->PgdPlanning->CurrentValue, null, false);

        // IMSI
        $this->IMSI->setDbValueDef($rsnew, $this->IMSI->CurrentValue, null, false);

        // SequentialCulture
        $this->SequentialCulture->setDbValueDef($rsnew, $this->SequentialCulture->CurrentValue, null, false);

        // TimeLapse
        $this->TimeLapse->setDbValueDef($rsnew, $this->TimeLapse->CurrentValue, null, false);

        // AH
        $this->AH->setDbValueDef($rsnew, $this->AH->CurrentValue, null, false);

        // Weight
        $this->Weight->setDbValueDef($rsnew, $this->Weight->CurrentValue, null, false);

        // BMI
        $this->BMI->setDbValueDef($rsnew, $this->BMI->CurrentValue, null, false);

        // MaleIndications
        $this->MaleIndications->setDbValueDef($rsnew, $this->MaleIndications->CurrentValue, null, false);

        // FemaleIndications
        $this->FemaleIndications->setDbValueDef($rsnew, $this->FemaleIndications->CurrentValue, null, false);

        // UseOfThe
        $this->UseOfThe->setDbValueDef($rsnew, $this->UseOfThe->CurrentValue, null, false);

        // Ectopic
        $this->Ectopic->setDbValueDef($rsnew, $this->Ectopic->CurrentValue, null, false);

        // Heterotopic
        $this->Heterotopic->setDbValueDef($rsnew, $this->Heterotopic->CurrentValue, null, false);

        // TransferDFE
        $this->TransferDFE->setDbValueDef($rsnew, $this->TransferDFE->CurrentValue, null, false);

        // Evolutive
        $this->Evolutive->setDbValueDef($rsnew, $this->Evolutive->CurrentValue, null, false);

        // Number
        $this->Number->setDbValueDef($rsnew, $this->Number->CurrentValue, null, false);

        // SequentialCult
        $this->SequentialCult->setDbValueDef($rsnew, $this->SequentialCult->CurrentValue, null, false);

        // TineLapse
        $this->TineLapse->setDbValueDef($rsnew, $this->TineLapse->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // PartnerID
        $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, false);

        // WifeCell
        $this->WifeCell->setDbValueDef($rsnew, $this->WifeCell->CurrentValue, null, false);

        // HusbandCell
        $this->HusbandCell->setDbValueDef($rsnew, $this->HusbandCell->CurrentValue, null, false);

        // CoupleID
        $this->CoupleID->setDbValueDef($rsnew, $this->CoupleID->CurrentValue, null, false);

        // IVFCycleNO
        $this->IVFCycleNO->setDbValueDef($rsnew, $this->IVFCycleNO->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfTreatmentPlanList"), "", $this->TableVar, true);
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
