<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientOtSurgeryRegisterEdit extends PatientOtSurgeryRegister
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_ot_surgery_register';

    // Page object name
    public $PageObjName = "PatientOtSurgeryRegisterEdit";

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

        // Table object (patient_ot_surgery_register)
        if (!isset($GLOBALS["patient_ot_surgery_register"]) || get_class($GLOBALS["patient_ot_surgery_register"]) == PROJECT_NAMESPACE . "patient_ot_surgery_register") {
            $GLOBALS["patient_ot_surgery_register"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_ot_surgery_register');
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
                $doc = new $class(Container("patient_ot_surgery_register"));
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
                    if ($pageName == "PatientOtSurgeryRegisterView") {
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
        $this->Reception->setVisibility();
        $this->PId->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->profilePic->setVisibility();
        $this->diagnosis->setVisibility();
        $this->proposedSurgery->setVisibility();
        $this->surgeryProcedure->setVisibility();
        $this->typeOfAnaesthesia->setVisibility();
        $this->RecievedTime->setVisibility();
        $this->AnaesthesiaStarted->setVisibility();
        $this->AnaesthesiaEnded->setVisibility();
        $this->surgeryStarted->setVisibility();
        $this->surgeryEnded->setVisibility();
        $this->RecoveryTime->setVisibility();
        $this->ShiftedTime->setVisibility();
        $this->Duration->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anaesthetist->setVisibility();
        $this->AsstSurgeon1->setVisibility();
        $this->AsstSurgeon2->setVisibility();
        $this->paediatric->setVisibility();
        $this->ScrubNurse1->setVisibility();
        $this->ScrubNurse2->setVisibility();
        $this->FloorNurse->setVisibility();
        $this->Technician->setVisibility();
        $this->HouseKeeping->setVisibility();
        $this->countsCheckedMops->setVisibility();
        $this->gauze->setVisibility();
        $this->needles->setVisibility();
        $this->bloodloss->setVisibility();
        $this->bloodtransfusion->setVisibility();
        $this->implantsUsed->setVisibility();
        $this->MaterialsForHPE->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->PatID->setVisibility();
        $this->MobileNumber->setVisibility();
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
                    $this->terminate("PatientOtSurgeryRegisterList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PatientOtSurgeryRegisterList") {
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

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
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

        // Check field name 'mrnno' first before field var 'x_mrnno'
        $val = $CurrentForm->hasValue("mrnno") ? $CurrentForm->getValue("mrnno") : $CurrentForm->getValue("x_mrnno");
        if (!$this->mrnno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnno->Visible = false; // Disable update for API request
            } else {
                $this->mrnno->setFormValue($val);
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

        // Check field name 'Gender' first before field var 'x_Gender'
        $val = $CurrentForm->hasValue("Gender") ? $CurrentForm->getValue("Gender") : $CurrentForm->getValue("x_Gender");
        if (!$this->Gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Gender->Visible = false; // Disable update for API request
            } else {
                $this->Gender->setFormValue($val);
            }
        }

        // Check field name 'profilePic' first before field var 'x_profilePic'
        $val = $CurrentForm->hasValue("profilePic") ? $CurrentForm->getValue("profilePic") : $CurrentForm->getValue("x_profilePic");
        if (!$this->profilePic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilePic->Visible = false; // Disable update for API request
            } else {
                $this->profilePic->setFormValue($val);
            }
        }

        // Check field name 'diagnosis' first before field var 'x_diagnosis'
        $val = $CurrentForm->hasValue("diagnosis") ? $CurrentForm->getValue("diagnosis") : $CurrentForm->getValue("x_diagnosis");
        if (!$this->diagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->diagnosis->Visible = false; // Disable update for API request
            } else {
                $this->diagnosis->setFormValue($val);
            }
        }

        // Check field name 'proposedSurgery' first before field var 'x_proposedSurgery'
        $val = $CurrentForm->hasValue("proposedSurgery") ? $CurrentForm->getValue("proposedSurgery") : $CurrentForm->getValue("x_proposedSurgery");
        if (!$this->proposedSurgery->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->proposedSurgery->Visible = false; // Disable update for API request
            } else {
                $this->proposedSurgery->setFormValue($val);
            }
        }

        // Check field name 'surgeryProcedure' first before field var 'x_surgeryProcedure'
        $val = $CurrentForm->hasValue("surgeryProcedure") ? $CurrentForm->getValue("surgeryProcedure") : $CurrentForm->getValue("x_surgeryProcedure");
        if (!$this->surgeryProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryProcedure->Visible = false; // Disable update for API request
            } else {
                $this->surgeryProcedure->setFormValue($val);
            }
        }

        // Check field name 'typeOfAnaesthesia' first before field var 'x_typeOfAnaesthesia'
        $val = $CurrentForm->hasValue("typeOfAnaesthesia") ? $CurrentForm->getValue("typeOfAnaesthesia") : $CurrentForm->getValue("x_typeOfAnaesthesia");
        if (!$this->typeOfAnaesthesia->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->typeOfAnaesthesia->Visible = false; // Disable update for API request
            } else {
                $this->typeOfAnaesthesia->setFormValue($val);
            }
        }

        // Check field name 'RecievedTime' first before field var 'x_RecievedTime'
        $val = $CurrentForm->hasValue("RecievedTime") ? $CurrentForm->getValue("RecievedTime") : $CurrentForm->getValue("x_RecievedTime");
        if (!$this->RecievedTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecievedTime->Visible = false; // Disable update for API request
            } else {
                $this->RecievedTime->setFormValue($val);
            }
            $this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 0);
        }

        // Check field name 'AnaesthesiaStarted' first before field var 'x_AnaesthesiaStarted'
        $val = $CurrentForm->hasValue("AnaesthesiaStarted") ? $CurrentForm->getValue("AnaesthesiaStarted") : $CurrentForm->getValue("x_AnaesthesiaStarted");
        if (!$this->AnaesthesiaStarted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnaesthesiaStarted->Visible = false; // Disable update for API request
            } else {
                $this->AnaesthesiaStarted->setFormValue($val);
            }
            $this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 0);
        }

        // Check field name 'AnaesthesiaEnded' first before field var 'x_AnaesthesiaEnded'
        $val = $CurrentForm->hasValue("AnaesthesiaEnded") ? $CurrentForm->getValue("AnaesthesiaEnded") : $CurrentForm->getValue("x_AnaesthesiaEnded");
        if (!$this->AnaesthesiaEnded->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AnaesthesiaEnded->Visible = false; // Disable update for API request
            } else {
                $this->AnaesthesiaEnded->setFormValue($val);
            }
            $this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 0);
        }

        // Check field name 'surgeryStarted' first before field var 'x_surgeryStarted'
        $val = $CurrentForm->hasValue("surgeryStarted") ? $CurrentForm->getValue("surgeryStarted") : $CurrentForm->getValue("x_surgeryStarted");
        if (!$this->surgeryStarted->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryStarted->Visible = false; // Disable update for API request
            } else {
                $this->surgeryStarted->setFormValue($val);
            }
            $this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 0);
        }

        // Check field name 'surgeryEnded' first before field var 'x_surgeryEnded'
        $val = $CurrentForm->hasValue("surgeryEnded") ? $CurrentForm->getValue("surgeryEnded") : $CurrentForm->getValue("x_surgeryEnded");
        if (!$this->surgeryEnded->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->surgeryEnded->Visible = false; // Disable update for API request
            } else {
                $this->surgeryEnded->setFormValue($val);
            }
            $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 0);
        }

        // Check field name 'RecoveryTime' first before field var 'x_RecoveryTime'
        $val = $CurrentForm->hasValue("RecoveryTime") ? $CurrentForm->getValue("RecoveryTime") : $CurrentForm->getValue("x_RecoveryTime");
        if (!$this->RecoveryTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RecoveryTime->Visible = false; // Disable update for API request
            } else {
                $this->RecoveryTime->setFormValue($val);
            }
            $this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 0);
        }

        // Check field name 'ShiftedTime' first before field var 'x_ShiftedTime'
        $val = $CurrentForm->hasValue("ShiftedTime") ? $CurrentForm->getValue("ShiftedTime") : $CurrentForm->getValue("x_ShiftedTime");
        if (!$this->ShiftedTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ShiftedTime->Visible = false; // Disable update for API request
            } else {
                $this->ShiftedTime->setFormValue($val);
            }
            $this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 0);
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

        // Check field name 'Surgeon' first before field var 'x_Surgeon'
        $val = $CurrentForm->hasValue("Surgeon") ? $CurrentForm->getValue("Surgeon") : $CurrentForm->getValue("x_Surgeon");
        if (!$this->Surgeon->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Surgeon->Visible = false; // Disable update for API request
            } else {
                $this->Surgeon->setFormValue($val);
            }
        }

        // Check field name 'Anaesthetist' first before field var 'x_Anaesthetist'
        $val = $CurrentForm->hasValue("Anaesthetist") ? $CurrentForm->getValue("Anaesthetist") : $CurrentForm->getValue("x_Anaesthetist");
        if (!$this->Anaesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anaesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anaesthetist->setFormValue($val);
            }
        }

        // Check field name 'AsstSurgeon1' first before field var 'x_AsstSurgeon1'
        $val = $CurrentForm->hasValue("AsstSurgeon1") ? $CurrentForm->getValue("AsstSurgeon1") : $CurrentForm->getValue("x_AsstSurgeon1");
        if (!$this->AsstSurgeon1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AsstSurgeon1->Visible = false; // Disable update for API request
            } else {
                $this->AsstSurgeon1->setFormValue($val);
            }
        }

        // Check field name 'AsstSurgeon2' first before field var 'x_AsstSurgeon2'
        $val = $CurrentForm->hasValue("AsstSurgeon2") ? $CurrentForm->getValue("AsstSurgeon2") : $CurrentForm->getValue("x_AsstSurgeon2");
        if (!$this->AsstSurgeon2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AsstSurgeon2->Visible = false; // Disable update for API request
            } else {
                $this->AsstSurgeon2->setFormValue($val);
            }
        }

        // Check field name 'paediatric' first before field var 'x_paediatric'
        $val = $CurrentForm->hasValue("paediatric") ? $CurrentForm->getValue("paediatric") : $CurrentForm->getValue("x_paediatric");
        if (!$this->paediatric->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->paediatric->Visible = false; // Disable update for API request
            } else {
                $this->paediatric->setFormValue($val);
            }
        }

        // Check field name 'ScrubNurse1' first before field var 'x_ScrubNurse1'
        $val = $CurrentForm->hasValue("ScrubNurse1") ? $CurrentForm->getValue("ScrubNurse1") : $CurrentForm->getValue("x_ScrubNurse1");
        if (!$this->ScrubNurse1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScrubNurse1->Visible = false; // Disable update for API request
            } else {
                $this->ScrubNurse1->setFormValue($val);
            }
        }

        // Check field name 'ScrubNurse2' first before field var 'x_ScrubNurse2'
        $val = $CurrentForm->hasValue("ScrubNurse2") ? $CurrentForm->getValue("ScrubNurse2") : $CurrentForm->getValue("x_ScrubNurse2");
        if (!$this->ScrubNurse2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ScrubNurse2->Visible = false; // Disable update for API request
            } else {
                $this->ScrubNurse2->setFormValue($val);
            }
        }

        // Check field name 'FloorNurse' first before field var 'x_FloorNurse'
        $val = $CurrentForm->hasValue("FloorNurse") ? $CurrentForm->getValue("FloorNurse") : $CurrentForm->getValue("x_FloorNurse");
        if (!$this->FloorNurse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FloorNurse->Visible = false; // Disable update for API request
            } else {
                $this->FloorNurse->setFormValue($val);
            }
        }

        // Check field name 'Technician' first before field var 'x_Technician'
        $val = $CurrentForm->hasValue("Technician") ? $CurrentForm->getValue("Technician") : $CurrentForm->getValue("x_Technician");
        if (!$this->Technician->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Technician->Visible = false; // Disable update for API request
            } else {
                $this->Technician->setFormValue($val);
            }
        }

        // Check field name 'HouseKeeping' first before field var 'x_HouseKeeping'
        $val = $CurrentForm->hasValue("HouseKeeping") ? $CurrentForm->getValue("HouseKeeping") : $CurrentForm->getValue("x_HouseKeeping");
        if (!$this->HouseKeeping->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HouseKeeping->Visible = false; // Disable update for API request
            } else {
                $this->HouseKeeping->setFormValue($val);
            }
        }

        // Check field name 'countsCheckedMops' first before field var 'x_countsCheckedMops'
        $val = $CurrentForm->hasValue("countsCheckedMops") ? $CurrentForm->getValue("countsCheckedMops") : $CurrentForm->getValue("x_countsCheckedMops");
        if (!$this->countsCheckedMops->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->countsCheckedMops->Visible = false; // Disable update for API request
            } else {
                $this->countsCheckedMops->setFormValue($val);
            }
        }

        // Check field name 'gauze' first before field var 'x_gauze'
        $val = $CurrentForm->hasValue("gauze") ? $CurrentForm->getValue("gauze") : $CurrentForm->getValue("x_gauze");
        if (!$this->gauze->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gauze->Visible = false; // Disable update for API request
            } else {
                $this->gauze->setFormValue($val);
            }
        }

        // Check field name 'needles' first before field var 'x_needles'
        $val = $CurrentForm->hasValue("needles") ? $CurrentForm->getValue("needles") : $CurrentForm->getValue("x_needles");
        if (!$this->needles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->needles->Visible = false; // Disable update for API request
            } else {
                $this->needles->setFormValue($val);
            }
        }

        // Check field name 'bloodloss' first before field var 'x_bloodloss'
        $val = $CurrentForm->hasValue("bloodloss") ? $CurrentForm->getValue("bloodloss") : $CurrentForm->getValue("x_bloodloss");
        if (!$this->bloodloss->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bloodloss->Visible = false; // Disable update for API request
            } else {
                $this->bloodloss->setFormValue($val);
            }
        }

        // Check field name 'bloodtransfusion' first before field var 'x_bloodtransfusion'
        $val = $CurrentForm->hasValue("bloodtransfusion") ? $CurrentForm->getValue("bloodtransfusion") : $CurrentForm->getValue("x_bloodtransfusion");
        if (!$this->bloodtransfusion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bloodtransfusion->Visible = false; // Disable update for API request
            } else {
                $this->bloodtransfusion->setFormValue($val);
            }
        }

        // Check field name 'implantsUsed' first before field var 'x_implantsUsed'
        $val = $CurrentForm->hasValue("implantsUsed") ? $CurrentForm->getValue("implantsUsed") : $CurrentForm->getValue("x_implantsUsed");
        if (!$this->implantsUsed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->implantsUsed->Visible = false; // Disable update for API request
            } else {
                $this->implantsUsed->setFormValue($val);
            }
        }

        // Check field name 'MaterialsForHPE' first before field var 'x_MaterialsForHPE'
        $val = $CurrentForm->hasValue("MaterialsForHPE") ? $CurrentForm->getValue("MaterialsForHPE") : $CurrentForm->getValue("x_MaterialsForHPE");
        if (!$this->MaterialsForHPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaterialsForHPE->Visible = false; // Disable update for API request
            } else {
                $this->MaterialsForHPE->setFormValue($val);
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

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
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

        // Check field name 'PatID' first before field var 'x_PatID'
        $val = $CurrentForm->hasValue("PatID") ? $CurrentForm->getValue("PatID") : $CurrentForm->getValue("x_PatID");
        if (!$this->PatID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatID->Visible = false; // Disable update for API request
            } else {
                $this->PatID->setFormValue($val);
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->PId->CurrentValue = $this->PId->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->Gender->CurrentValue = $this->Gender->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->diagnosis->CurrentValue = $this->diagnosis->FormValue;
        $this->proposedSurgery->CurrentValue = $this->proposedSurgery->FormValue;
        $this->surgeryProcedure->CurrentValue = $this->surgeryProcedure->FormValue;
        $this->typeOfAnaesthesia->CurrentValue = $this->typeOfAnaesthesia->FormValue;
        $this->RecievedTime->CurrentValue = $this->RecievedTime->FormValue;
        $this->RecievedTime->CurrentValue = UnFormatDateTime($this->RecievedTime->CurrentValue, 0);
        $this->AnaesthesiaStarted->CurrentValue = $this->AnaesthesiaStarted->FormValue;
        $this->AnaesthesiaStarted->CurrentValue = UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 0);
        $this->AnaesthesiaEnded->CurrentValue = $this->AnaesthesiaEnded->FormValue;
        $this->AnaesthesiaEnded->CurrentValue = UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 0);
        $this->surgeryStarted->CurrentValue = $this->surgeryStarted->FormValue;
        $this->surgeryStarted->CurrentValue = UnFormatDateTime($this->surgeryStarted->CurrentValue, 0);
        $this->surgeryEnded->CurrentValue = $this->surgeryEnded->FormValue;
        $this->surgeryEnded->CurrentValue = UnFormatDateTime($this->surgeryEnded->CurrentValue, 0);
        $this->RecoveryTime->CurrentValue = $this->RecoveryTime->FormValue;
        $this->RecoveryTime->CurrentValue = UnFormatDateTime($this->RecoveryTime->CurrentValue, 0);
        $this->ShiftedTime->CurrentValue = $this->ShiftedTime->FormValue;
        $this->ShiftedTime->CurrentValue = UnFormatDateTime($this->ShiftedTime->CurrentValue, 0);
        $this->Duration->CurrentValue = $this->Duration->FormValue;
        $this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
        $this->Anaesthetist->CurrentValue = $this->Anaesthetist->FormValue;
        $this->AsstSurgeon1->CurrentValue = $this->AsstSurgeon1->FormValue;
        $this->AsstSurgeon2->CurrentValue = $this->AsstSurgeon2->FormValue;
        $this->paediatric->CurrentValue = $this->paediatric->FormValue;
        $this->ScrubNurse1->CurrentValue = $this->ScrubNurse1->FormValue;
        $this->ScrubNurse2->CurrentValue = $this->ScrubNurse2->FormValue;
        $this->FloorNurse->CurrentValue = $this->FloorNurse->FormValue;
        $this->Technician->CurrentValue = $this->Technician->FormValue;
        $this->HouseKeeping->CurrentValue = $this->HouseKeeping->FormValue;
        $this->countsCheckedMops->CurrentValue = $this->countsCheckedMops->FormValue;
        $this->gauze->CurrentValue = $this->gauze->FormValue;
        $this->needles->CurrentValue = $this->needles->FormValue;
        $this->bloodloss->CurrentValue = $this->bloodloss->FormValue;
        $this->bloodtransfusion->CurrentValue = $this->bloodtransfusion->FormValue;
        $this->implantsUsed->CurrentValue = $this->implantsUsed->FormValue;
        $this->MaterialsForHPE->CurrentValue = $this->MaterialsForHPE->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->PatID->CurrentValue = $this->PatID->FormValue;
        $this->MobileNumber->CurrentValue = $this->MobileNumber->FormValue;
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
        $this->Reception->setDbValue($row['Reception']);
        $this->PId->setDbValue($row['PId']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->diagnosis->setDbValue($row['diagnosis']);
        $this->proposedSurgery->setDbValue($row['proposedSurgery']);
        $this->surgeryProcedure->setDbValue($row['surgeryProcedure']);
        $this->typeOfAnaesthesia->setDbValue($row['typeOfAnaesthesia']);
        $this->RecievedTime->setDbValue($row['RecievedTime']);
        $this->AnaesthesiaStarted->setDbValue($row['AnaesthesiaStarted']);
        $this->AnaesthesiaEnded->setDbValue($row['AnaesthesiaEnded']);
        $this->surgeryStarted->setDbValue($row['surgeryStarted']);
        $this->surgeryEnded->setDbValue($row['surgeryEnded']);
        $this->RecoveryTime->setDbValue($row['RecoveryTime']);
        $this->ShiftedTime->setDbValue($row['ShiftedTime']);
        $this->Duration->setDbValue($row['Duration']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anaesthetist->setDbValue($row['Anaesthetist']);
        $this->AsstSurgeon1->setDbValue($row['AsstSurgeon1']);
        $this->AsstSurgeon2->setDbValue($row['AsstSurgeon2']);
        $this->paediatric->setDbValue($row['paediatric']);
        $this->ScrubNurse1->setDbValue($row['ScrubNurse1']);
        $this->ScrubNurse2->setDbValue($row['ScrubNurse2']);
        $this->FloorNurse->setDbValue($row['FloorNurse']);
        $this->Technician->setDbValue($row['Technician']);
        $this->HouseKeeping->setDbValue($row['HouseKeeping']);
        $this->countsCheckedMops->setDbValue($row['countsCheckedMops']);
        $this->gauze->setDbValue($row['gauze']);
        $this->needles->setDbValue($row['needles']);
        $this->bloodloss->setDbValue($row['bloodloss']);
        $this->bloodtransfusion->setDbValue($row['bloodtransfusion']);
        $this->implantsUsed->setDbValue($row['implantsUsed']);
        $this->MaterialsForHPE->setDbValue($row['MaterialsForHPE']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['Reception'] = null;
        $row['PId'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['profilePic'] = null;
        $row['diagnosis'] = null;
        $row['proposedSurgery'] = null;
        $row['surgeryProcedure'] = null;
        $row['typeOfAnaesthesia'] = null;
        $row['RecievedTime'] = null;
        $row['AnaesthesiaStarted'] = null;
        $row['AnaesthesiaEnded'] = null;
        $row['surgeryStarted'] = null;
        $row['surgeryEnded'] = null;
        $row['RecoveryTime'] = null;
        $row['ShiftedTime'] = null;
        $row['Duration'] = null;
        $row['Surgeon'] = null;
        $row['Anaesthetist'] = null;
        $row['AsstSurgeon1'] = null;
        $row['AsstSurgeon2'] = null;
        $row['paediatric'] = null;
        $row['ScrubNurse1'] = null;
        $row['ScrubNurse2'] = null;
        $row['FloorNurse'] = null;
        $row['Technician'] = null;
        $row['HouseKeeping'] = null;
        $row['countsCheckedMops'] = null;
        $row['gauze'] = null;
        $row['needles'] = null;
        $row['bloodloss'] = null;
        $row['bloodtransfusion'] = null;
        $row['implantsUsed'] = null;
        $row['MaterialsForHPE'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['PatID'] = null;
        $row['MobileNumber'] = null;
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

        // Reception

        // PId

        // mrnno

        // PatientName

        // Age

        // Gender

        // profilePic

        // diagnosis

        // proposedSurgery

        // surgeryProcedure

        // typeOfAnaesthesia

        // RecievedTime

        // AnaesthesiaStarted

        // AnaesthesiaEnded

        // surgeryStarted

        // surgeryEnded

        // RecoveryTime

        // ShiftedTime

        // Duration

        // Surgeon

        // Anaesthetist

        // AsstSurgeon1

        // AsstSurgeon2

        // paediatric

        // ScrubNurse1

        // ScrubNurse2

        // FloorNurse

        // Technician

        // HouseKeeping

        // countsCheckedMops

        // gauze

        // needles

        // bloodloss

        // bloodtransfusion

        // implantsUsed

        // MaterialsForHPE

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // PatID

        // MobileNumber
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // PId
            $this->PId->ViewValue = $this->PId->CurrentValue;
            $this->PId->ViewValue = FormatNumber($this->PId->ViewValue, 0, -2, -2, -2);
            $this->PId->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // diagnosis
            $this->diagnosis->ViewValue = $this->diagnosis->CurrentValue;
            $this->diagnosis->ViewCustomAttributes = "";

            // proposedSurgery
            $this->proposedSurgery->ViewValue = $this->proposedSurgery->CurrentValue;
            $this->proposedSurgery->ViewCustomAttributes = "";

            // surgeryProcedure
            $this->surgeryProcedure->ViewValue = $this->surgeryProcedure->CurrentValue;
            $this->surgeryProcedure->ViewCustomAttributes = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->ViewValue = $this->typeOfAnaesthesia->CurrentValue;
            $this->typeOfAnaesthesia->ViewCustomAttributes = "";

            // RecievedTime
            $this->RecievedTime->ViewValue = $this->RecievedTime->CurrentValue;
            $this->RecievedTime->ViewValue = FormatDateTime($this->RecievedTime->ViewValue, 0);
            $this->RecievedTime->ViewCustomAttributes = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->ViewValue = $this->AnaesthesiaStarted->CurrentValue;
            $this->AnaesthesiaStarted->ViewValue = FormatDateTime($this->AnaesthesiaStarted->ViewValue, 0);
            $this->AnaesthesiaStarted->ViewCustomAttributes = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->ViewValue = $this->AnaesthesiaEnded->CurrentValue;
            $this->AnaesthesiaEnded->ViewValue = FormatDateTime($this->AnaesthesiaEnded->ViewValue, 0);
            $this->AnaesthesiaEnded->ViewCustomAttributes = "";

            // surgeryStarted
            $this->surgeryStarted->ViewValue = $this->surgeryStarted->CurrentValue;
            $this->surgeryStarted->ViewValue = FormatDateTime($this->surgeryStarted->ViewValue, 0);
            $this->surgeryStarted->ViewCustomAttributes = "";

            // surgeryEnded
            $this->surgeryEnded->ViewValue = $this->surgeryEnded->CurrentValue;
            $this->surgeryEnded->ViewValue = FormatDateTime($this->surgeryEnded->ViewValue, 0);
            $this->surgeryEnded->ViewCustomAttributes = "";

            // RecoveryTime
            $this->RecoveryTime->ViewValue = $this->RecoveryTime->CurrentValue;
            $this->RecoveryTime->ViewValue = FormatDateTime($this->RecoveryTime->ViewValue, 0);
            $this->RecoveryTime->ViewCustomAttributes = "";

            // ShiftedTime
            $this->ShiftedTime->ViewValue = $this->ShiftedTime->CurrentValue;
            $this->ShiftedTime->ViewValue = FormatDateTime($this->ShiftedTime->ViewValue, 0);
            $this->ShiftedTime->ViewCustomAttributes = "";

            // Duration
            $this->Duration->ViewValue = $this->Duration->CurrentValue;
            $this->Duration->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $this->Surgeon->ViewCustomAttributes = "";

            // Anaesthetist
            $this->Anaesthetist->ViewValue = $this->Anaesthetist->CurrentValue;
            $this->Anaesthetist->ViewCustomAttributes = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->ViewValue = $this->AsstSurgeon1->CurrentValue;
            $this->AsstSurgeon1->ViewCustomAttributes = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->ViewValue = $this->AsstSurgeon2->CurrentValue;
            $this->AsstSurgeon2->ViewCustomAttributes = "";

            // paediatric
            $this->paediatric->ViewValue = $this->paediatric->CurrentValue;
            $this->paediatric->ViewCustomAttributes = "";

            // ScrubNurse1
            $this->ScrubNurse1->ViewValue = $this->ScrubNurse1->CurrentValue;
            $this->ScrubNurse1->ViewCustomAttributes = "";

            // ScrubNurse2
            $this->ScrubNurse2->ViewValue = $this->ScrubNurse2->CurrentValue;
            $this->ScrubNurse2->ViewCustomAttributes = "";

            // FloorNurse
            $this->FloorNurse->ViewValue = $this->FloorNurse->CurrentValue;
            $this->FloorNurse->ViewCustomAttributes = "";

            // Technician
            $this->Technician->ViewValue = $this->Technician->CurrentValue;
            $this->Technician->ViewCustomAttributes = "";

            // HouseKeeping
            $this->HouseKeeping->ViewValue = $this->HouseKeeping->CurrentValue;
            $this->HouseKeeping->ViewCustomAttributes = "";

            // countsCheckedMops
            $this->countsCheckedMops->ViewValue = $this->countsCheckedMops->CurrentValue;
            $this->countsCheckedMops->ViewCustomAttributes = "";

            // gauze
            $this->gauze->ViewValue = $this->gauze->CurrentValue;
            $this->gauze->ViewCustomAttributes = "";

            // needles
            $this->needles->ViewValue = $this->needles->CurrentValue;
            $this->needles->ViewCustomAttributes = "";

            // bloodloss
            $this->bloodloss->ViewValue = $this->bloodloss->CurrentValue;
            $this->bloodloss->ViewCustomAttributes = "";

            // bloodtransfusion
            $this->bloodtransfusion->ViewValue = $this->bloodtransfusion->CurrentValue;
            $this->bloodtransfusion->ViewCustomAttributes = "";

            // implantsUsed
            $this->implantsUsed->ViewValue = $this->implantsUsed->CurrentValue;
            $this->implantsUsed->ViewCustomAttributes = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->ViewValue = $this->MaterialsForHPE->CurrentValue;
            $this->MaterialsForHPE->ViewCustomAttributes = "";

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

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";
            $this->PId->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // diagnosis
            $this->diagnosis->LinkCustomAttributes = "";
            $this->diagnosis->HrefValue = "";
            $this->diagnosis->TooltipValue = "";

            // proposedSurgery
            $this->proposedSurgery->LinkCustomAttributes = "";
            $this->proposedSurgery->HrefValue = "";
            $this->proposedSurgery->TooltipValue = "";

            // surgeryProcedure
            $this->surgeryProcedure->LinkCustomAttributes = "";
            $this->surgeryProcedure->HrefValue = "";
            $this->surgeryProcedure->TooltipValue = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->LinkCustomAttributes = "";
            $this->typeOfAnaesthesia->HrefValue = "";
            $this->typeOfAnaesthesia->TooltipValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";
            $this->RecievedTime->TooltipValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";
            $this->AnaesthesiaStarted->TooltipValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";
            $this->AnaesthesiaEnded->TooltipValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";
            $this->surgeryStarted->TooltipValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";
            $this->surgeryEnded->TooltipValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";
            $this->RecoveryTime->TooltipValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";
            $this->ShiftedTime->TooltipValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";
            $this->Duration->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";
            $this->Anaesthetist->TooltipValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";
            $this->AsstSurgeon1->TooltipValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";
            $this->AsstSurgeon2->TooltipValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";
            $this->paediatric->TooltipValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";
            $this->ScrubNurse1->TooltipValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";
            $this->ScrubNurse2->TooltipValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";
            $this->FloorNurse->TooltipValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";
            $this->Technician->TooltipValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";
            $this->HouseKeeping->TooltipValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";
            $this->countsCheckedMops->TooltipValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";
            $this->gauze->TooltipValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";
            $this->needles->TooltipValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";
            $this->bloodloss->TooltipValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";
            $this->bloodtransfusion->TooltipValue = "";

            // implantsUsed
            $this->implantsUsed->LinkCustomAttributes = "";
            $this->implantsUsed->HrefValue = "";
            $this->implantsUsed->TooltipValue = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->LinkCustomAttributes = "";
            $this->MaterialsForHPE->HrefValue = "";
            $this->MaterialsForHPE->TooltipValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // PId
            $this->PId->EditAttrs["class"] = "form-control";
            $this->PId->EditCustomAttributes = "";
            $this->PId->EditValue = HtmlEncode($this->PId->CurrentValue);
            $this->PId->PlaceHolder = RemoveHtml($this->PId->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->CurrentValue = HtmlDecode($this->mrnno->CurrentValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->CurrentValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

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

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->CurrentValue = HtmlDecode($this->Gender->CurrentValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->CurrentValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // diagnosis
            $this->diagnosis->EditAttrs["class"] = "form-control";
            $this->diagnosis->EditCustomAttributes = "";
            $this->diagnosis->EditValue = HtmlEncode($this->diagnosis->CurrentValue);
            $this->diagnosis->PlaceHolder = RemoveHtml($this->diagnosis->caption());

            // proposedSurgery
            $this->proposedSurgery->EditAttrs["class"] = "form-control";
            $this->proposedSurgery->EditCustomAttributes = "";
            $this->proposedSurgery->EditValue = HtmlEncode($this->proposedSurgery->CurrentValue);
            $this->proposedSurgery->PlaceHolder = RemoveHtml($this->proposedSurgery->caption());

            // surgeryProcedure
            $this->surgeryProcedure->EditAttrs["class"] = "form-control";
            $this->surgeryProcedure->EditCustomAttributes = "";
            $this->surgeryProcedure->EditValue = HtmlEncode($this->surgeryProcedure->CurrentValue);
            $this->surgeryProcedure->PlaceHolder = RemoveHtml($this->surgeryProcedure->caption());

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->EditAttrs["class"] = "form-control";
            $this->typeOfAnaesthesia->EditCustomAttributes = "";
            $this->typeOfAnaesthesia->EditValue = HtmlEncode($this->typeOfAnaesthesia->CurrentValue);
            $this->typeOfAnaesthesia->PlaceHolder = RemoveHtml($this->typeOfAnaesthesia->caption());

            // RecievedTime
            $this->RecievedTime->EditAttrs["class"] = "form-control";
            $this->RecievedTime->EditCustomAttributes = "";
            $this->RecievedTime->EditValue = HtmlEncode(FormatDateTime($this->RecievedTime->CurrentValue, 8));
            $this->RecievedTime->PlaceHolder = RemoveHtml($this->RecievedTime->caption());

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaStarted->EditCustomAttributes = "";
            $this->AnaesthesiaStarted->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaStarted->CurrentValue, 8));
            $this->AnaesthesiaStarted->PlaceHolder = RemoveHtml($this->AnaesthesiaStarted->caption());

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->EditAttrs["class"] = "form-control";
            $this->AnaesthesiaEnded->EditCustomAttributes = "";
            $this->AnaesthesiaEnded->EditValue = HtmlEncode(FormatDateTime($this->AnaesthesiaEnded->CurrentValue, 8));
            $this->AnaesthesiaEnded->PlaceHolder = RemoveHtml($this->AnaesthesiaEnded->caption());

            // surgeryStarted
            $this->surgeryStarted->EditAttrs["class"] = "form-control";
            $this->surgeryStarted->EditCustomAttributes = "";
            $this->surgeryStarted->EditValue = HtmlEncode(FormatDateTime($this->surgeryStarted->CurrentValue, 8));
            $this->surgeryStarted->PlaceHolder = RemoveHtml($this->surgeryStarted->caption());

            // surgeryEnded
            $this->surgeryEnded->EditAttrs["class"] = "form-control";
            $this->surgeryEnded->EditCustomAttributes = "";
            $this->surgeryEnded->EditValue = HtmlEncode(FormatDateTime($this->surgeryEnded->CurrentValue, 8));
            $this->surgeryEnded->PlaceHolder = RemoveHtml($this->surgeryEnded->caption());

            // RecoveryTime
            $this->RecoveryTime->EditAttrs["class"] = "form-control";
            $this->RecoveryTime->EditCustomAttributes = "";
            $this->RecoveryTime->EditValue = HtmlEncode(FormatDateTime($this->RecoveryTime->CurrentValue, 8));
            $this->RecoveryTime->PlaceHolder = RemoveHtml($this->RecoveryTime->caption());

            // ShiftedTime
            $this->ShiftedTime->EditAttrs["class"] = "form-control";
            $this->ShiftedTime->EditCustomAttributes = "";
            $this->ShiftedTime->EditValue = HtmlEncode(FormatDateTime($this->ShiftedTime->CurrentValue, 8));
            $this->ShiftedTime->PlaceHolder = RemoveHtml($this->ShiftedTime->caption());

            // Duration
            $this->Duration->EditAttrs["class"] = "form-control";
            $this->Duration->EditCustomAttributes = "";
            if (!$this->Duration->Raw) {
                $this->Duration->CurrentValue = HtmlDecode($this->Duration->CurrentValue);
            }
            $this->Duration->EditValue = HtmlEncode($this->Duration->CurrentValue);
            $this->Duration->PlaceHolder = RemoveHtml($this->Duration->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            if (!$this->Surgeon->Raw) {
                $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
            }
            $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // Anaesthetist
            $this->Anaesthetist->EditAttrs["class"] = "form-control";
            $this->Anaesthetist->EditCustomAttributes = "";
            if (!$this->Anaesthetist->Raw) {
                $this->Anaesthetist->CurrentValue = HtmlDecode($this->Anaesthetist->CurrentValue);
            }
            $this->Anaesthetist->EditValue = HtmlEncode($this->Anaesthetist->CurrentValue);
            $this->Anaesthetist->PlaceHolder = RemoveHtml($this->Anaesthetist->caption());

            // AsstSurgeon1
            $this->AsstSurgeon1->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon1->EditCustomAttributes = "";
            if (!$this->AsstSurgeon1->Raw) {
                $this->AsstSurgeon1->CurrentValue = HtmlDecode($this->AsstSurgeon1->CurrentValue);
            }
            $this->AsstSurgeon1->EditValue = HtmlEncode($this->AsstSurgeon1->CurrentValue);
            $this->AsstSurgeon1->PlaceHolder = RemoveHtml($this->AsstSurgeon1->caption());

            // AsstSurgeon2
            $this->AsstSurgeon2->EditAttrs["class"] = "form-control";
            $this->AsstSurgeon2->EditCustomAttributes = "";
            if (!$this->AsstSurgeon2->Raw) {
                $this->AsstSurgeon2->CurrentValue = HtmlDecode($this->AsstSurgeon2->CurrentValue);
            }
            $this->AsstSurgeon2->EditValue = HtmlEncode($this->AsstSurgeon2->CurrentValue);
            $this->AsstSurgeon2->PlaceHolder = RemoveHtml($this->AsstSurgeon2->caption());

            // paediatric
            $this->paediatric->EditAttrs["class"] = "form-control";
            $this->paediatric->EditCustomAttributes = "";
            if (!$this->paediatric->Raw) {
                $this->paediatric->CurrentValue = HtmlDecode($this->paediatric->CurrentValue);
            }
            $this->paediatric->EditValue = HtmlEncode($this->paediatric->CurrentValue);
            $this->paediatric->PlaceHolder = RemoveHtml($this->paediatric->caption());

            // ScrubNurse1
            $this->ScrubNurse1->EditAttrs["class"] = "form-control";
            $this->ScrubNurse1->EditCustomAttributes = "";
            if (!$this->ScrubNurse1->Raw) {
                $this->ScrubNurse1->CurrentValue = HtmlDecode($this->ScrubNurse1->CurrentValue);
            }
            $this->ScrubNurse1->EditValue = HtmlEncode($this->ScrubNurse1->CurrentValue);
            $this->ScrubNurse1->PlaceHolder = RemoveHtml($this->ScrubNurse1->caption());

            // ScrubNurse2
            $this->ScrubNurse2->EditAttrs["class"] = "form-control";
            $this->ScrubNurse2->EditCustomAttributes = "";
            if (!$this->ScrubNurse2->Raw) {
                $this->ScrubNurse2->CurrentValue = HtmlDecode($this->ScrubNurse2->CurrentValue);
            }
            $this->ScrubNurse2->EditValue = HtmlEncode($this->ScrubNurse2->CurrentValue);
            $this->ScrubNurse2->PlaceHolder = RemoveHtml($this->ScrubNurse2->caption());

            // FloorNurse
            $this->FloorNurse->EditAttrs["class"] = "form-control";
            $this->FloorNurse->EditCustomAttributes = "";
            if (!$this->FloorNurse->Raw) {
                $this->FloorNurse->CurrentValue = HtmlDecode($this->FloorNurse->CurrentValue);
            }
            $this->FloorNurse->EditValue = HtmlEncode($this->FloorNurse->CurrentValue);
            $this->FloorNurse->PlaceHolder = RemoveHtml($this->FloorNurse->caption());

            // Technician
            $this->Technician->EditAttrs["class"] = "form-control";
            $this->Technician->EditCustomAttributes = "";
            if (!$this->Technician->Raw) {
                $this->Technician->CurrentValue = HtmlDecode($this->Technician->CurrentValue);
            }
            $this->Technician->EditValue = HtmlEncode($this->Technician->CurrentValue);
            $this->Technician->PlaceHolder = RemoveHtml($this->Technician->caption());

            // HouseKeeping
            $this->HouseKeeping->EditAttrs["class"] = "form-control";
            $this->HouseKeeping->EditCustomAttributes = "";
            if (!$this->HouseKeeping->Raw) {
                $this->HouseKeeping->CurrentValue = HtmlDecode($this->HouseKeeping->CurrentValue);
            }
            $this->HouseKeeping->EditValue = HtmlEncode($this->HouseKeeping->CurrentValue);
            $this->HouseKeeping->PlaceHolder = RemoveHtml($this->HouseKeeping->caption());

            // countsCheckedMops
            $this->countsCheckedMops->EditAttrs["class"] = "form-control";
            $this->countsCheckedMops->EditCustomAttributes = "";
            if (!$this->countsCheckedMops->Raw) {
                $this->countsCheckedMops->CurrentValue = HtmlDecode($this->countsCheckedMops->CurrentValue);
            }
            $this->countsCheckedMops->EditValue = HtmlEncode($this->countsCheckedMops->CurrentValue);
            $this->countsCheckedMops->PlaceHolder = RemoveHtml($this->countsCheckedMops->caption());

            // gauze
            $this->gauze->EditAttrs["class"] = "form-control";
            $this->gauze->EditCustomAttributes = "";
            if (!$this->gauze->Raw) {
                $this->gauze->CurrentValue = HtmlDecode($this->gauze->CurrentValue);
            }
            $this->gauze->EditValue = HtmlEncode($this->gauze->CurrentValue);
            $this->gauze->PlaceHolder = RemoveHtml($this->gauze->caption());

            // needles
            $this->needles->EditAttrs["class"] = "form-control";
            $this->needles->EditCustomAttributes = "";
            if (!$this->needles->Raw) {
                $this->needles->CurrentValue = HtmlDecode($this->needles->CurrentValue);
            }
            $this->needles->EditValue = HtmlEncode($this->needles->CurrentValue);
            $this->needles->PlaceHolder = RemoveHtml($this->needles->caption());

            // bloodloss
            $this->bloodloss->EditAttrs["class"] = "form-control";
            $this->bloodloss->EditCustomAttributes = "";
            if (!$this->bloodloss->Raw) {
                $this->bloodloss->CurrentValue = HtmlDecode($this->bloodloss->CurrentValue);
            }
            $this->bloodloss->EditValue = HtmlEncode($this->bloodloss->CurrentValue);
            $this->bloodloss->PlaceHolder = RemoveHtml($this->bloodloss->caption());

            // bloodtransfusion
            $this->bloodtransfusion->EditAttrs["class"] = "form-control";
            $this->bloodtransfusion->EditCustomAttributes = "";
            if (!$this->bloodtransfusion->Raw) {
                $this->bloodtransfusion->CurrentValue = HtmlDecode($this->bloodtransfusion->CurrentValue);
            }
            $this->bloodtransfusion->EditValue = HtmlEncode($this->bloodtransfusion->CurrentValue);
            $this->bloodtransfusion->PlaceHolder = RemoveHtml($this->bloodtransfusion->caption());

            // implantsUsed
            $this->implantsUsed->EditAttrs["class"] = "form-control";
            $this->implantsUsed->EditCustomAttributes = "";
            $this->implantsUsed->EditValue = HtmlEncode($this->implantsUsed->CurrentValue);
            $this->implantsUsed->PlaceHolder = RemoveHtml($this->implantsUsed->caption());

            // MaterialsForHPE
            $this->MaterialsForHPE->EditAttrs["class"] = "form-control";
            $this->MaterialsForHPE->EditCustomAttributes = "";
            $this->MaterialsForHPE->EditValue = HtmlEncode($this->MaterialsForHPE->CurrentValue);
            $this->MaterialsForHPE->PlaceHolder = RemoveHtml($this->MaterialsForHPE->caption());

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

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->CurrentValue = HtmlDecode($this->PatID->CurrentValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->CurrentValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->CurrentValue = HtmlDecode($this->MobileNumber->CurrentValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->CurrentValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // PId
            $this->PId->LinkCustomAttributes = "";
            $this->PId->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // diagnosis
            $this->diagnosis->LinkCustomAttributes = "";
            $this->diagnosis->HrefValue = "";

            // proposedSurgery
            $this->proposedSurgery->LinkCustomAttributes = "";
            $this->proposedSurgery->HrefValue = "";

            // surgeryProcedure
            $this->surgeryProcedure->LinkCustomAttributes = "";
            $this->surgeryProcedure->HrefValue = "";

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->LinkCustomAttributes = "";
            $this->typeOfAnaesthesia->HrefValue = "";

            // RecievedTime
            $this->RecievedTime->LinkCustomAttributes = "";
            $this->RecievedTime->HrefValue = "";

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->LinkCustomAttributes = "";
            $this->AnaesthesiaStarted->HrefValue = "";

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->LinkCustomAttributes = "";
            $this->AnaesthesiaEnded->HrefValue = "";

            // surgeryStarted
            $this->surgeryStarted->LinkCustomAttributes = "";
            $this->surgeryStarted->HrefValue = "";

            // surgeryEnded
            $this->surgeryEnded->LinkCustomAttributes = "";
            $this->surgeryEnded->HrefValue = "";

            // RecoveryTime
            $this->RecoveryTime->LinkCustomAttributes = "";
            $this->RecoveryTime->HrefValue = "";

            // ShiftedTime
            $this->ShiftedTime->LinkCustomAttributes = "";
            $this->ShiftedTime->HrefValue = "";

            // Duration
            $this->Duration->LinkCustomAttributes = "";
            $this->Duration->HrefValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";

            // Anaesthetist
            $this->Anaesthetist->LinkCustomAttributes = "";
            $this->Anaesthetist->HrefValue = "";

            // AsstSurgeon1
            $this->AsstSurgeon1->LinkCustomAttributes = "";
            $this->AsstSurgeon1->HrefValue = "";

            // AsstSurgeon2
            $this->AsstSurgeon2->LinkCustomAttributes = "";
            $this->AsstSurgeon2->HrefValue = "";

            // paediatric
            $this->paediatric->LinkCustomAttributes = "";
            $this->paediatric->HrefValue = "";

            // ScrubNurse1
            $this->ScrubNurse1->LinkCustomAttributes = "";
            $this->ScrubNurse1->HrefValue = "";

            // ScrubNurse2
            $this->ScrubNurse2->LinkCustomAttributes = "";
            $this->ScrubNurse2->HrefValue = "";

            // FloorNurse
            $this->FloorNurse->LinkCustomAttributes = "";
            $this->FloorNurse->HrefValue = "";

            // Technician
            $this->Technician->LinkCustomAttributes = "";
            $this->Technician->HrefValue = "";

            // HouseKeeping
            $this->HouseKeeping->LinkCustomAttributes = "";
            $this->HouseKeeping->HrefValue = "";

            // countsCheckedMops
            $this->countsCheckedMops->LinkCustomAttributes = "";
            $this->countsCheckedMops->HrefValue = "";

            // gauze
            $this->gauze->LinkCustomAttributes = "";
            $this->gauze->HrefValue = "";

            // needles
            $this->needles->LinkCustomAttributes = "";
            $this->needles->HrefValue = "";

            // bloodloss
            $this->bloodloss->LinkCustomAttributes = "";
            $this->bloodloss->HrefValue = "";

            // bloodtransfusion
            $this->bloodtransfusion->LinkCustomAttributes = "";
            $this->bloodtransfusion->HrefValue = "";

            // implantsUsed
            $this->implantsUsed->LinkCustomAttributes = "";
            $this->implantsUsed->HrefValue = "";

            // MaterialsForHPE
            $this->MaterialsForHPE->LinkCustomAttributes = "";
            $this->MaterialsForHPE->HrefValue = "";

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

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Reception->FormValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if ($this->PId->Required) {
            if (!$this->PId->IsDetailKey && EmptyValue($this->PId->FormValue)) {
                $this->PId->addErrorMessage(str_replace("%s", $this->PId->caption(), $this->PId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PId->FormValue)) {
            $this->PId->addErrorMessage($this->PId->getErrorMessage(false));
        }
        if ($this->mrnno->Required) {
            if (!$this->mrnno->IsDetailKey && EmptyValue($this->mrnno->FormValue)) {
                $this->mrnno->addErrorMessage(str_replace("%s", $this->mrnno->caption(), $this->mrnno->RequiredErrorMessage));
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
        if ($this->Gender->Required) {
            if (!$this->Gender->IsDetailKey && EmptyValue($this->Gender->FormValue)) {
                $this->Gender->addErrorMessage(str_replace("%s", $this->Gender->caption(), $this->Gender->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->diagnosis->Required) {
            if (!$this->diagnosis->IsDetailKey && EmptyValue($this->diagnosis->FormValue)) {
                $this->diagnosis->addErrorMessage(str_replace("%s", $this->diagnosis->caption(), $this->diagnosis->RequiredErrorMessage));
            }
        }
        if ($this->proposedSurgery->Required) {
            if (!$this->proposedSurgery->IsDetailKey && EmptyValue($this->proposedSurgery->FormValue)) {
                $this->proposedSurgery->addErrorMessage(str_replace("%s", $this->proposedSurgery->caption(), $this->proposedSurgery->RequiredErrorMessage));
            }
        }
        if ($this->surgeryProcedure->Required) {
            if (!$this->surgeryProcedure->IsDetailKey && EmptyValue($this->surgeryProcedure->FormValue)) {
                $this->surgeryProcedure->addErrorMessage(str_replace("%s", $this->surgeryProcedure->caption(), $this->surgeryProcedure->RequiredErrorMessage));
            }
        }
        if ($this->typeOfAnaesthesia->Required) {
            if (!$this->typeOfAnaesthesia->IsDetailKey && EmptyValue($this->typeOfAnaesthesia->FormValue)) {
                $this->typeOfAnaesthesia->addErrorMessage(str_replace("%s", $this->typeOfAnaesthesia->caption(), $this->typeOfAnaesthesia->RequiredErrorMessage));
            }
        }
        if ($this->RecievedTime->Required) {
            if (!$this->RecievedTime->IsDetailKey && EmptyValue($this->RecievedTime->FormValue)) {
                $this->RecievedTime->addErrorMessage(str_replace("%s", $this->RecievedTime->caption(), $this->RecievedTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->RecievedTime->FormValue)) {
            $this->RecievedTime->addErrorMessage($this->RecievedTime->getErrorMessage(false));
        }
        if ($this->AnaesthesiaStarted->Required) {
            if (!$this->AnaesthesiaStarted->IsDetailKey && EmptyValue($this->AnaesthesiaStarted->FormValue)) {
                $this->AnaesthesiaStarted->addErrorMessage(str_replace("%s", $this->AnaesthesiaStarted->caption(), $this->AnaesthesiaStarted->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AnaesthesiaStarted->FormValue)) {
            $this->AnaesthesiaStarted->addErrorMessage($this->AnaesthesiaStarted->getErrorMessage(false));
        }
        if ($this->AnaesthesiaEnded->Required) {
            if (!$this->AnaesthesiaEnded->IsDetailKey && EmptyValue($this->AnaesthesiaEnded->FormValue)) {
                $this->AnaesthesiaEnded->addErrorMessage(str_replace("%s", $this->AnaesthesiaEnded->caption(), $this->AnaesthesiaEnded->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->AnaesthesiaEnded->FormValue)) {
            $this->AnaesthesiaEnded->addErrorMessage($this->AnaesthesiaEnded->getErrorMessage(false));
        }
        if ($this->surgeryStarted->Required) {
            if (!$this->surgeryStarted->IsDetailKey && EmptyValue($this->surgeryStarted->FormValue)) {
                $this->surgeryStarted->addErrorMessage(str_replace("%s", $this->surgeryStarted->caption(), $this->surgeryStarted->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->surgeryStarted->FormValue)) {
            $this->surgeryStarted->addErrorMessage($this->surgeryStarted->getErrorMessage(false));
        }
        if ($this->surgeryEnded->Required) {
            if (!$this->surgeryEnded->IsDetailKey && EmptyValue($this->surgeryEnded->FormValue)) {
                $this->surgeryEnded->addErrorMessage(str_replace("%s", $this->surgeryEnded->caption(), $this->surgeryEnded->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->surgeryEnded->FormValue)) {
            $this->surgeryEnded->addErrorMessage($this->surgeryEnded->getErrorMessage(false));
        }
        if ($this->RecoveryTime->Required) {
            if (!$this->RecoveryTime->IsDetailKey && EmptyValue($this->RecoveryTime->FormValue)) {
                $this->RecoveryTime->addErrorMessage(str_replace("%s", $this->RecoveryTime->caption(), $this->RecoveryTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->RecoveryTime->FormValue)) {
            $this->RecoveryTime->addErrorMessage($this->RecoveryTime->getErrorMessage(false));
        }
        if ($this->ShiftedTime->Required) {
            if (!$this->ShiftedTime->IsDetailKey && EmptyValue($this->ShiftedTime->FormValue)) {
                $this->ShiftedTime->addErrorMessage(str_replace("%s", $this->ShiftedTime->caption(), $this->ShiftedTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ShiftedTime->FormValue)) {
            $this->ShiftedTime->addErrorMessage($this->ShiftedTime->getErrorMessage(false));
        }
        if ($this->Duration->Required) {
            if (!$this->Duration->IsDetailKey && EmptyValue($this->Duration->FormValue)) {
                $this->Duration->addErrorMessage(str_replace("%s", $this->Duration->caption(), $this->Duration->RequiredErrorMessage));
            }
        }
        if ($this->Surgeon->Required) {
            if (!$this->Surgeon->IsDetailKey && EmptyValue($this->Surgeon->FormValue)) {
                $this->Surgeon->addErrorMessage(str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
            }
        }
        if ($this->Anaesthetist->Required) {
            if (!$this->Anaesthetist->IsDetailKey && EmptyValue($this->Anaesthetist->FormValue)) {
                $this->Anaesthetist->addErrorMessage(str_replace("%s", $this->Anaesthetist->caption(), $this->Anaesthetist->RequiredErrorMessage));
            }
        }
        if ($this->AsstSurgeon1->Required) {
            if (!$this->AsstSurgeon1->IsDetailKey && EmptyValue($this->AsstSurgeon1->FormValue)) {
                $this->AsstSurgeon1->addErrorMessage(str_replace("%s", $this->AsstSurgeon1->caption(), $this->AsstSurgeon1->RequiredErrorMessage));
            }
        }
        if ($this->AsstSurgeon2->Required) {
            if (!$this->AsstSurgeon2->IsDetailKey && EmptyValue($this->AsstSurgeon2->FormValue)) {
                $this->AsstSurgeon2->addErrorMessage(str_replace("%s", $this->AsstSurgeon2->caption(), $this->AsstSurgeon2->RequiredErrorMessage));
            }
        }
        if ($this->paediatric->Required) {
            if (!$this->paediatric->IsDetailKey && EmptyValue($this->paediatric->FormValue)) {
                $this->paediatric->addErrorMessage(str_replace("%s", $this->paediatric->caption(), $this->paediatric->RequiredErrorMessage));
            }
        }
        if ($this->ScrubNurse1->Required) {
            if (!$this->ScrubNurse1->IsDetailKey && EmptyValue($this->ScrubNurse1->FormValue)) {
                $this->ScrubNurse1->addErrorMessage(str_replace("%s", $this->ScrubNurse1->caption(), $this->ScrubNurse1->RequiredErrorMessage));
            }
        }
        if ($this->ScrubNurse2->Required) {
            if (!$this->ScrubNurse2->IsDetailKey && EmptyValue($this->ScrubNurse2->FormValue)) {
                $this->ScrubNurse2->addErrorMessage(str_replace("%s", $this->ScrubNurse2->caption(), $this->ScrubNurse2->RequiredErrorMessage));
            }
        }
        if ($this->FloorNurse->Required) {
            if (!$this->FloorNurse->IsDetailKey && EmptyValue($this->FloorNurse->FormValue)) {
                $this->FloorNurse->addErrorMessage(str_replace("%s", $this->FloorNurse->caption(), $this->FloorNurse->RequiredErrorMessage));
            }
        }
        if ($this->Technician->Required) {
            if (!$this->Technician->IsDetailKey && EmptyValue($this->Technician->FormValue)) {
                $this->Technician->addErrorMessage(str_replace("%s", $this->Technician->caption(), $this->Technician->RequiredErrorMessage));
            }
        }
        if ($this->HouseKeeping->Required) {
            if (!$this->HouseKeeping->IsDetailKey && EmptyValue($this->HouseKeeping->FormValue)) {
                $this->HouseKeeping->addErrorMessage(str_replace("%s", $this->HouseKeeping->caption(), $this->HouseKeeping->RequiredErrorMessage));
            }
        }
        if ($this->countsCheckedMops->Required) {
            if (!$this->countsCheckedMops->IsDetailKey && EmptyValue($this->countsCheckedMops->FormValue)) {
                $this->countsCheckedMops->addErrorMessage(str_replace("%s", $this->countsCheckedMops->caption(), $this->countsCheckedMops->RequiredErrorMessage));
            }
        }
        if ($this->gauze->Required) {
            if (!$this->gauze->IsDetailKey && EmptyValue($this->gauze->FormValue)) {
                $this->gauze->addErrorMessage(str_replace("%s", $this->gauze->caption(), $this->gauze->RequiredErrorMessage));
            }
        }
        if ($this->needles->Required) {
            if (!$this->needles->IsDetailKey && EmptyValue($this->needles->FormValue)) {
                $this->needles->addErrorMessage(str_replace("%s", $this->needles->caption(), $this->needles->RequiredErrorMessage));
            }
        }
        if ($this->bloodloss->Required) {
            if (!$this->bloodloss->IsDetailKey && EmptyValue($this->bloodloss->FormValue)) {
                $this->bloodloss->addErrorMessage(str_replace("%s", $this->bloodloss->caption(), $this->bloodloss->RequiredErrorMessage));
            }
        }
        if ($this->bloodtransfusion->Required) {
            if (!$this->bloodtransfusion->IsDetailKey && EmptyValue($this->bloodtransfusion->FormValue)) {
                $this->bloodtransfusion->addErrorMessage(str_replace("%s", $this->bloodtransfusion->caption(), $this->bloodtransfusion->RequiredErrorMessage));
            }
        }
        if ($this->implantsUsed->Required) {
            if (!$this->implantsUsed->IsDetailKey && EmptyValue($this->implantsUsed->FormValue)) {
                $this->implantsUsed->addErrorMessage(str_replace("%s", $this->implantsUsed->caption(), $this->implantsUsed->RequiredErrorMessage));
            }
        }
        if ($this->MaterialsForHPE->Required) {
            if (!$this->MaterialsForHPE->IsDetailKey && EmptyValue($this->MaterialsForHPE->FormValue)) {
                $this->MaterialsForHPE->addErrorMessage(str_replace("%s", $this->MaterialsForHPE->caption(), $this->MaterialsForHPE->RequiredErrorMessage));
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
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
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
        if ($this->PatID->Required) {
            if (!$this->PatID->IsDetailKey && EmptyValue($this->PatID->FormValue)) {
                $this->PatID->addErrorMessage(str_replace("%s", $this->PatID->caption(), $this->PatID->RequiredErrorMessage));
            }
        }
        if ($this->MobileNumber->Required) {
            if (!$this->MobileNumber->IsDetailKey && EmptyValue($this->MobileNumber->FormValue)) {
                $this->MobileNumber->addErrorMessage(str_replace("%s", $this->MobileNumber->caption(), $this->MobileNumber->RequiredErrorMessage));
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

            // Reception
            $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, null, $this->Reception->ReadOnly);

            // PId
            $this->PId->setDbValueDef($rsnew, $this->PId->CurrentValue, null, $this->PId->ReadOnly);

            // mrnno
            $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, $this->mrnno->ReadOnly);

            // PatientName
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // Gender
            $this->Gender->setDbValueDef($rsnew, $this->Gender->CurrentValue, null, $this->Gender->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // diagnosis
            $this->diagnosis->setDbValueDef($rsnew, $this->diagnosis->CurrentValue, null, $this->diagnosis->ReadOnly);

            // proposedSurgery
            $this->proposedSurgery->setDbValueDef($rsnew, $this->proposedSurgery->CurrentValue, null, $this->proposedSurgery->ReadOnly);

            // surgeryProcedure
            $this->surgeryProcedure->setDbValueDef($rsnew, $this->surgeryProcedure->CurrentValue, null, $this->surgeryProcedure->ReadOnly);

            // typeOfAnaesthesia
            $this->typeOfAnaesthesia->setDbValueDef($rsnew, $this->typeOfAnaesthesia->CurrentValue, null, $this->typeOfAnaesthesia->ReadOnly);

            // RecievedTime
            $this->RecievedTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecievedTime->CurrentValue, 0), null, $this->RecievedTime->ReadOnly);

            // AnaesthesiaStarted
            $this->AnaesthesiaStarted->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaStarted->CurrentValue, 0), null, $this->AnaesthesiaStarted->ReadOnly);

            // AnaesthesiaEnded
            $this->AnaesthesiaEnded->setDbValueDef($rsnew, UnFormatDateTime($this->AnaesthesiaEnded->CurrentValue, 0), null, $this->AnaesthesiaEnded->ReadOnly);

            // surgeryStarted
            $this->surgeryStarted->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryStarted->CurrentValue, 0), null, $this->surgeryStarted->ReadOnly);

            // surgeryEnded
            $this->surgeryEnded->setDbValueDef($rsnew, UnFormatDateTime($this->surgeryEnded->CurrentValue, 0), null, $this->surgeryEnded->ReadOnly);

            // RecoveryTime
            $this->RecoveryTime->setDbValueDef($rsnew, UnFormatDateTime($this->RecoveryTime->CurrentValue, 0), null, $this->RecoveryTime->ReadOnly);

            // ShiftedTime
            $this->ShiftedTime->setDbValueDef($rsnew, UnFormatDateTime($this->ShiftedTime->CurrentValue, 0), null, $this->ShiftedTime->ReadOnly);

            // Duration
            $this->Duration->setDbValueDef($rsnew, $this->Duration->CurrentValue, null, $this->Duration->ReadOnly);

            // Surgeon
            $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, $this->Surgeon->ReadOnly);

            // Anaesthetist
            $this->Anaesthetist->setDbValueDef($rsnew, $this->Anaesthetist->CurrentValue, null, $this->Anaesthetist->ReadOnly);

            // AsstSurgeon1
            $this->AsstSurgeon1->setDbValueDef($rsnew, $this->AsstSurgeon1->CurrentValue, null, $this->AsstSurgeon1->ReadOnly);

            // AsstSurgeon2
            $this->AsstSurgeon2->setDbValueDef($rsnew, $this->AsstSurgeon2->CurrentValue, null, $this->AsstSurgeon2->ReadOnly);

            // paediatric
            $this->paediatric->setDbValueDef($rsnew, $this->paediatric->CurrentValue, null, $this->paediatric->ReadOnly);

            // ScrubNurse1
            $this->ScrubNurse1->setDbValueDef($rsnew, $this->ScrubNurse1->CurrentValue, null, $this->ScrubNurse1->ReadOnly);

            // ScrubNurse2
            $this->ScrubNurse2->setDbValueDef($rsnew, $this->ScrubNurse2->CurrentValue, null, $this->ScrubNurse2->ReadOnly);

            // FloorNurse
            $this->FloorNurse->setDbValueDef($rsnew, $this->FloorNurse->CurrentValue, null, $this->FloorNurse->ReadOnly);

            // Technician
            $this->Technician->setDbValueDef($rsnew, $this->Technician->CurrentValue, null, $this->Technician->ReadOnly);

            // HouseKeeping
            $this->HouseKeeping->setDbValueDef($rsnew, $this->HouseKeeping->CurrentValue, null, $this->HouseKeeping->ReadOnly);

            // countsCheckedMops
            $this->countsCheckedMops->setDbValueDef($rsnew, $this->countsCheckedMops->CurrentValue, null, $this->countsCheckedMops->ReadOnly);

            // gauze
            $this->gauze->setDbValueDef($rsnew, $this->gauze->CurrentValue, null, $this->gauze->ReadOnly);

            // needles
            $this->needles->setDbValueDef($rsnew, $this->needles->CurrentValue, null, $this->needles->ReadOnly);

            // bloodloss
            $this->bloodloss->setDbValueDef($rsnew, $this->bloodloss->CurrentValue, null, $this->bloodloss->ReadOnly);

            // bloodtransfusion
            $this->bloodtransfusion->setDbValueDef($rsnew, $this->bloodtransfusion->CurrentValue, null, $this->bloodtransfusion->ReadOnly);

            // implantsUsed
            $this->implantsUsed->setDbValueDef($rsnew, $this->implantsUsed->CurrentValue, null, $this->implantsUsed->ReadOnly);

            // MaterialsForHPE
            $this->MaterialsForHPE->setDbValueDef($rsnew, $this->MaterialsForHPE->CurrentValue, null, $this->MaterialsForHPE->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // PatientID
            $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, $this->PatientID->ReadOnly);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);

            // PatID
            $this->PatID->setDbValueDef($rsnew, $this->PatID->CurrentValue, null, $this->PatID->ReadOnly);

            // MobileNumber
            $this->MobileNumber->setDbValueDef($rsnew, $this->MobileNumber->CurrentValue, null, $this->MobileNumber->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientOtSurgeryRegisterList"), "", $this->TableVar, true);
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
