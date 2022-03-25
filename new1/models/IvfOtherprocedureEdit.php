<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOtherprocedureEdit extends IvfOtherprocedure
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_otherprocedure';

    // Page object name
    public $PageObjName = "IvfOtherprocedureEdit";

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

        // Table object (ivf_otherprocedure)
        if (!isset($GLOBALS["ivf_otherprocedure"]) || get_class($GLOBALS["ivf_otherprocedure"]) == PROJECT_NAMESPACE . "ivf_otherprocedure") {
            $GLOBALS["ivf_otherprocedure"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_otherprocedure');
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
                $doc = new $class(Container("ivf_otherprocedure"));
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
                    if ($pageName == "IvfOtherprocedureView") {
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Address->setVisibility();
        $this->DateofAdmission->setVisibility();
        $this->DateofProcedure->setVisibility();
        $this->DateofDischarge->setVisibility();
        $this->Consultant->setVisibility();
        $this->Surgeon->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->ProcedureDone->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MaritallHistory->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->PastHistory->setVisibility();
        $this->FamilyHistory->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->CNS->setVisibility();
        $this->_RS->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->InvestigationReport->setVisibility();
        $this->FinalDiagnosis->setVisibility();
        $this->Treatment->setVisibility();
        $this->DetailOfOperation->setVisibility();
        $this->FollowUpAdvice->setVisibility();
        $this->FollowUpMedication->setVisibility();
        $this->Plan->setVisibility();
        $this->TidNo->setVisibility();
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
                    $this->terminate("IvfOtherprocedureList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IvfOtherprocedureList") {
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

        // Check field name 'SEX' first before field var 'x_SEX'
        $val = $CurrentForm->hasValue("SEX") ? $CurrentForm->getValue("SEX") : $CurrentForm->getValue("x_SEX");
        if (!$this->SEX->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SEX->Visible = false; // Disable update for API request
            } else {
                $this->SEX->setFormValue($val);
            }
        }

        // Check field name 'Address' first before field var 'x_Address'
        $val = $CurrentForm->hasValue("Address") ? $CurrentForm->getValue("Address") : $CurrentForm->getValue("x_Address");
        if (!$this->Address->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address->Visible = false; // Disable update for API request
            } else {
                $this->Address->setFormValue($val);
            }
        }

        // Check field name 'DateofAdmission' first before field var 'x_DateofAdmission'
        $val = $CurrentForm->hasValue("DateofAdmission") ? $CurrentForm->getValue("DateofAdmission") : $CurrentForm->getValue("x_DateofAdmission");
        if (!$this->DateofAdmission->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofAdmission->Visible = false; // Disable update for API request
            } else {
                $this->DateofAdmission->setFormValue($val);
            }
            $this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 0);
        }

        // Check field name 'DateofProcedure' first before field var 'x_DateofProcedure'
        $val = $CurrentForm->hasValue("DateofProcedure") ? $CurrentForm->getValue("DateofProcedure") : $CurrentForm->getValue("x_DateofProcedure");
        if (!$this->DateofProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofProcedure->Visible = false; // Disable update for API request
            } else {
                $this->DateofProcedure->setFormValue($val);
            }
            $this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 0);
        }

        // Check field name 'DateofDischarge' first before field var 'x_DateofDischarge'
        $val = $CurrentForm->hasValue("DateofDischarge") ? $CurrentForm->getValue("DateofDischarge") : $CurrentForm->getValue("x_DateofDischarge");
        if (!$this->DateofDischarge->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DateofDischarge->Visible = false; // Disable update for API request
            } else {
                $this->DateofDischarge->setFormValue($val);
            }
            $this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 0);
        }

        // Check field name 'Consultant' first before field var 'x_Consultant'
        $val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
        if (!$this->Consultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Consultant->Visible = false; // Disable update for API request
            } else {
                $this->Consultant->setFormValue($val);
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

        // Check field name 'Anesthetist' first before field var 'x_Anesthetist'
        $val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
        if (!$this->Anesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anesthetist->setFormValue($val);
            }
        }

        // Check field name 'IdentificationMark' first before field var 'x_IdentificationMark'
        $val = $CurrentForm->hasValue("IdentificationMark") ? $CurrentForm->getValue("IdentificationMark") : $CurrentForm->getValue("x_IdentificationMark");
        if (!$this->IdentificationMark->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IdentificationMark->Visible = false; // Disable update for API request
            } else {
                $this->IdentificationMark->setFormValue($val);
            }
        }

        // Check field name 'ProcedureDone' first before field var 'x_ProcedureDone'
        $val = $CurrentForm->hasValue("ProcedureDone") ? $CurrentForm->getValue("ProcedureDone") : $CurrentForm->getValue("x_ProcedureDone");
        if (!$this->ProcedureDone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureDone->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureDone->setFormValue($val);
            }
        }

        // Check field name 'PROVISIONALDIAGNOSIS' first before field var 'x_PROVISIONALDIAGNOSIS'
        $val = $CurrentForm->hasValue("PROVISIONALDIAGNOSIS") ? $CurrentForm->getValue("PROVISIONALDIAGNOSIS") : $CurrentForm->getValue("x_PROVISIONALDIAGNOSIS");
        if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PROVISIONALDIAGNOSIS->Visible = false; // Disable update for API request
            } else {
                $this->PROVISIONALDIAGNOSIS->setFormValue($val);
            }
        }

        // Check field name 'Chiefcomplaints' first before field var 'x_Chiefcomplaints'
        $val = $CurrentForm->hasValue("Chiefcomplaints") ? $CurrentForm->getValue("Chiefcomplaints") : $CurrentForm->getValue("x_Chiefcomplaints");
        if (!$this->Chiefcomplaints->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Chiefcomplaints->Visible = false; // Disable update for API request
            } else {
                $this->Chiefcomplaints->setFormValue($val);
            }
        }

        // Check field name 'MaritallHistory' first before field var 'x_MaritallHistory'
        $val = $CurrentForm->hasValue("MaritallHistory") ? $CurrentForm->getValue("MaritallHistory") : $CurrentForm->getValue("x_MaritallHistory");
        if (!$this->MaritallHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaritallHistory->Visible = false; // Disable update for API request
            } else {
                $this->MaritallHistory->setFormValue($val);
            }
        }

        // Check field name 'MenstrualHistory' first before field var 'x_MenstrualHistory'
        $val = $CurrentForm->hasValue("MenstrualHistory") ? $CurrentForm->getValue("MenstrualHistory") : $CurrentForm->getValue("x_MenstrualHistory");
        if (!$this->MenstrualHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MenstrualHistory->Visible = false; // Disable update for API request
            } else {
                $this->MenstrualHistory->setFormValue($val);
            }
        }

        // Check field name 'SurgicalHistory' first before field var 'x_SurgicalHistory'
        $val = $CurrentForm->hasValue("SurgicalHistory") ? $CurrentForm->getValue("SurgicalHistory") : $CurrentForm->getValue("x_SurgicalHistory");
        if (!$this->SurgicalHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SurgicalHistory->Visible = false; // Disable update for API request
            } else {
                $this->SurgicalHistory->setFormValue($val);
            }
        }

        // Check field name 'PastHistory' first before field var 'x_PastHistory'
        $val = $CurrentForm->hasValue("PastHistory") ? $CurrentForm->getValue("PastHistory") : $CurrentForm->getValue("x_PastHistory");
        if (!$this->PastHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PastHistory->Visible = false; // Disable update for API request
            } else {
                $this->PastHistory->setFormValue($val);
            }
        }

        // Check field name 'FamilyHistory' first before field var 'x_FamilyHistory'
        $val = $CurrentForm->hasValue("FamilyHistory") ? $CurrentForm->getValue("FamilyHistory") : $CurrentForm->getValue("x_FamilyHistory");
        if (!$this->FamilyHistory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FamilyHistory->Visible = false; // Disable update for API request
            } else {
                $this->FamilyHistory->setFormValue($val);
            }
        }

        // Check field name 'Temp' first before field var 'x_Temp'
        $val = $CurrentForm->hasValue("Temp") ? $CurrentForm->getValue("Temp") : $CurrentForm->getValue("x_Temp");
        if (!$this->Temp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Temp->Visible = false; // Disable update for API request
            } else {
                $this->Temp->setFormValue($val);
            }
        }

        // Check field name 'Pulse' first before field var 'x_Pulse'
        $val = $CurrentForm->hasValue("Pulse") ? $CurrentForm->getValue("Pulse") : $CurrentForm->getValue("x_Pulse");
        if (!$this->Pulse->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pulse->Visible = false; // Disable update for API request
            } else {
                $this->Pulse->setFormValue($val);
            }
        }

        // Check field name 'BP' first before field var 'x_BP'
        $val = $CurrentForm->hasValue("BP") ? $CurrentForm->getValue("BP") : $CurrentForm->getValue("x_BP");
        if (!$this->BP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BP->Visible = false; // Disable update for API request
            } else {
                $this->BP->setFormValue($val);
            }
        }

        // Check field name 'CNS' first before field var 'x_CNS'
        $val = $CurrentForm->hasValue("CNS") ? $CurrentForm->getValue("CNS") : $CurrentForm->getValue("x_CNS");
        if (!$this->CNS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CNS->Visible = false; // Disable update for API request
            } else {
                $this->CNS->setFormValue($val);
            }
        }

        // Check field name 'RS' first before field var 'x__RS'
        $val = $CurrentForm->hasValue("RS") ? $CurrentForm->getValue("RS") : $CurrentForm->getValue("x__RS");
        if (!$this->_RS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_RS->Visible = false; // Disable update for API request
            } else {
                $this->_RS->setFormValue($val);
            }
        }

        // Check field name 'CVS' first before field var 'x_CVS'
        $val = $CurrentForm->hasValue("CVS") ? $CurrentForm->getValue("CVS") : $CurrentForm->getValue("x_CVS");
        if (!$this->CVS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CVS->Visible = false; // Disable update for API request
            } else {
                $this->CVS->setFormValue($val);
            }
        }

        // Check field name 'PA' first before field var 'x_PA'
        $val = $CurrentForm->hasValue("PA") ? $CurrentForm->getValue("PA") : $CurrentForm->getValue("x_PA");
        if (!$this->PA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PA->Visible = false; // Disable update for API request
            } else {
                $this->PA->setFormValue($val);
            }
        }

        // Check field name 'InvestigationReport' first before field var 'x_InvestigationReport'
        $val = $CurrentForm->hasValue("InvestigationReport") ? $CurrentForm->getValue("InvestigationReport") : $CurrentForm->getValue("x_InvestigationReport");
        if (!$this->InvestigationReport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InvestigationReport->Visible = false; // Disable update for API request
            } else {
                $this->InvestigationReport->setFormValue($val);
            }
        }

        // Check field name 'FinalDiagnosis' first before field var 'x_FinalDiagnosis'
        $val = $CurrentForm->hasValue("FinalDiagnosis") ? $CurrentForm->getValue("FinalDiagnosis") : $CurrentForm->getValue("x_FinalDiagnosis");
        if (!$this->FinalDiagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FinalDiagnosis->Visible = false; // Disable update for API request
            } else {
                $this->FinalDiagnosis->setFormValue($val);
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

        // Check field name 'DetailOfOperation' first before field var 'x_DetailOfOperation'
        $val = $CurrentForm->hasValue("DetailOfOperation") ? $CurrentForm->getValue("DetailOfOperation") : $CurrentForm->getValue("x_DetailOfOperation");
        if (!$this->DetailOfOperation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DetailOfOperation->Visible = false; // Disable update for API request
            } else {
                $this->DetailOfOperation->setFormValue($val);
            }
        }

        // Check field name 'FollowUpAdvice' first before field var 'x_FollowUpAdvice'
        $val = $CurrentForm->hasValue("FollowUpAdvice") ? $CurrentForm->getValue("FollowUpAdvice") : $CurrentForm->getValue("x_FollowUpAdvice");
        if (!$this->FollowUpAdvice->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowUpAdvice->Visible = false; // Disable update for API request
            } else {
                $this->FollowUpAdvice->setFormValue($val);
            }
        }

        // Check field name 'FollowUpMedication' first before field var 'x_FollowUpMedication'
        $val = $CurrentForm->hasValue("FollowUpMedication") ? $CurrentForm->getValue("FollowUpMedication") : $CurrentForm->getValue("x_FollowUpMedication");
        if (!$this->FollowUpMedication->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowUpMedication->Visible = false; // Disable update for API request
            } else {
                $this->FollowUpMedication->setFormValue($val);
            }
        }

        // Check field name 'Plan' first before field var 'x_Plan'
        $val = $CurrentForm->hasValue("Plan") ? $CurrentForm->getValue("Plan") : $CurrentForm->getValue("x_Plan");
        if (!$this->Plan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Plan->Visible = false; // Disable update for API request
            } else {
                $this->Plan->setFormValue($val);
            }
        }

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->SEX->CurrentValue = $this->SEX->FormValue;
        $this->Address->CurrentValue = $this->Address->FormValue;
        $this->DateofAdmission->CurrentValue = $this->DateofAdmission->FormValue;
        $this->DateofAdmission->CurrentValue = UnFormatDateTime($this->DateofAdmission->CurrentValue, 0);
        $this->DateofProcedure->CurrentValue = $this->DateofProcedure->FormValue;
        $this->DateofProcedure->CurrentValue = UnFormatDateTime($this->DateofProcedure->CurrentValue, 0);
        $this->DateofDischarge->CurrentValue = $this->DateofDischarge->FormValue;
        $this->DateofDischarge->CurrentValue = UnFormatDateTime($this->DateofDischarge->CurrentValue, 0);
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->Surgeon->CurrentValue = $this->Surgeon->FormValue;
        $this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
        $this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
        $this->ProcedureDone->CurrentValue = $this->ProcedureDone->FormValue;
        $this->PROVISIONALDIAGNOSIS->CurrentValue = $this->PROVISIONALDIAGNOSIS->FormValue;
        $this->Chiefcomplaints->CurrentValue = $this->Chiefcomplaints->FormValue;
        $this->MaritallHistory->CurrentValue = $this->MaritallHistory->FormValue;
        $this->MenstrualHistory->CurrentValue = $this->MenstrualHistory->FormValue;
        $this->SurgicalHistory->CurrentValue = $this->SurgicalHistory->FormValue;
        $this->PastHistory->CurrentValue = $this->PastHistory->FormValue;
        $this->FamilyHistory->CurrentValue = $this->FamilyHistory->FormValue;
        $this->Temp->CurrentValue = $this->Temp->FormValue;
        $this->Pulse->CurrentValue = $this->Pulse->FormValue;
        $this->BP->CurrentValue = $this->BP->FormValue;
        $this->CNS->CurrentValue = $this->CNS->FormValue;
        $this->_RS->CurrentValue = $this->_RS->FormValue;
        $this->CVS->CurrentValue = $this->CVS->FormValue;
        $this->PA->CurrentValue = $this->PA->FormValue;
        $this->InvestigationReport->CurrentValue = $this->InvestigationReport->FormValue;
        $this->FinalDiagnosis->CurrentValue = $this->FinalDiagnosis->FormValue;
        $this->Treatment->CurrentValue = $this->Treatment->FormValue;
        $this->DetailOfOperation->CurrentValue = $this->DetailOfOperation->FormValue;
        $this->FollowUpAdvice->CurrentValue = $this->FollowUpAdvice->FormValue;
        $this->FollowUpMedication->CurrentValue = $this->FollowUpMedication->FormValue;
        $this->Plan->CurrentValue = $this->Plan->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
        $this->SEX->setDbValue($row['SEX']);
        $this->Address->setDbValue($row['Address']);
        $this->DateofAdmission->setDbValue($row['DateofAdmission']);
        $this->DateofProcedure->setDbValue($row['DateofProcedure']);
        $this->DateofDischarge->setDbValue($row['DateofDischarge']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Surgeon->setDbValue($row['Surgeon']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->ProcedureDone->setDbValue($row['ProcedureDone']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MaritallHistory->setDbValue($row['MaritallHistory']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->PastHistory->setDbValue($row['PastHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->CNS->setDbValue($row['CNS']);
        $this->_RS->setDbValue($row['RS']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->InvestigationReport->setDbValue($row['InvestigationReport']);
        $this->FinalDiagnosis->setDbValue($row['FinalDiagnosis']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->DetailOfOperation->setDbValue($row['DetailOfOperation']);
        $this->FollowUpAdvice->setDbValue($row['FollowUpAdvice']);
        $this->FollowUpMedication->setDbValue($row['FollowUpMedication']);
        $this->Plan->setDbValue($row['Plan']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Address'] = null;
        $row['DateofAdmission'] = null;
        $row['DateofProcedure'] = null;
        $row['DateofDischarge'] = null;
        $row['Consultant'] = null;
        $row['Surgeon'] = null;
        $row['Anesthetist'] = null;
        $row['IdentificationMark'] = null;
        $row['ProcedureDone'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MaritallHistory'] = null;
        $row['MenstrualHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['PastHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['Temp'] = null;
        $row['Pulse'] = null;
        $row['BP'] = null;
        $row['CNS'] = null;
        $row['RS'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['InvestigationReport'] = null;
        $row['FinalDiagnosis'] = null;
        $row['Treatment'] = null;
        $row['DetailOfOperation'] = null;
        $row['FollowUpAdvice'] = null;
        $row['FollowUpMedication'] = null;
        $row['Plan'] = null;
        $row['TidNo'] = null;
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

        // SEX

        // Address

        // DateofAdmission

        // DateofProcedure

        // DateofDischarge

        // Consultant

        // Surgeon

        // Anesthetist

        // IdentificationMark

        // ProcedureDone

        // PROVISIONALDIAGNOSIS

        // Chiefcomplaints

        // MaritallHistory

        // MenstrualHistory

        // SurgicalHistory

        // PastHistory

        // FamilyHistory

        // Temp

        // Pulse

        // BP

        // CNS

        // RS

        // CVS

        // PA

        // InvestigationReport

        // FinalDiagnosis

        // Treatment

        // DetailOfOperation

        // FollowUpAdvice

        // FollowUpMedication

        // Plan

        // TidNo
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

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // DateofAdmission
            $this->DateofAdmission->ViewValue = $this->DateofAdmission->CurrentValue;
            $this->DateofAdmission->ViewValue = FormatDateTime($this->DateofAdmission->ViewValue, 0);
            $this->DateofAdmission->ViewCustomAttributes = "";

            // DateofProcedure
            $this->DateofProcedure->ViewValue = $this->DateofProcedure->CurrentValue;
            $this->DateofProcedure->ViewValue = FormatDateTime($this->DateofProcedure->ViewValue, 0);
            $this->DateofProcedure->ViewCustomAttributes = "";

            // DateofDischarge
            $this->DateofDischarge->ViewValue = $this->DateofDischarge->CurrentValue;
            $this->DateofDischarge->ViewValue = FormatDateTime($this->DateofDischarge->ViewValue, 0);
            $this->DateofDischarge->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Surgeon
            $this->Surgeon->ViewValue = $this->Surgeon->CurrentValue;
            $this->Surgeon->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // ProcedureDone
            $this->ProcedureDone->ViewValue = $this->ProcedureDone->CurrentValue;
            $this->ProcedureDone->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MaritallHistory
            $this->MaritallHistory->ViewValue = $this->MaritallHistory->CurrentValue;
            $this->MaritallHistory->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // PastHistory
            $this->PastHistory->ViewValue = $this->PastHistory->CurrentValue;
            $this->PastHistory->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RS
            $this->_RS->ViewValue = $this->_RS->CurrentValue;
            $this->_RS->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // InvestigationReport
            $this->InvestigationReport->ViewValue = $this->InvestigationReport->CurrentValue;
            $this->InvestigationReport->ViewCustomAttributes = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->ViewValue = $this->FinalDiagnosis->CurrentValue;
            $this->FinalDiagnosis->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // DetailOfOperation
            $this->DetailOfOperation->ViewValue = $this->DetailOfOperation->CurrentValue;
            $this->DetailOfOperation->ViewCustomAttributes = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->ViewValue = $this->FollowUpAdvice->CurrentValue;
            $this->FollowUpAdvice->ViewCustomAttributes = "";

            // FollowUpMedication
            $this->FollowUpMedication->ViewValue = $this->FollowUpMedication->CurrentValue;
            $this->FollowUpMedication->ViewCustomAttributes = "";

            // Plan
            $this->Plan->ViewValue = $this->Plan->CurrentValue;
            $this->Plan->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";
            $this->DateofAdmission->TooltipValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";
            $this->DateofProcedure->TooltipValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";
            $this->DateofDischarge->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";
            $this->Surgeon->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";
            $this->ProcedureDone->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";
            $this->MaritallHistory->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";
            $this->PastHistory->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";
            $this->_RS->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // InvestigationReport
            $this->InvestigationReport->LinkCustomAttributes = "";
            $this->InvestigationReport->HrefValue = "";
            $this->InvestigationReport->TooltipValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";
            $this->FinalDiagnosis->TooltipValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";

            // DetailOfOperation
            $this->DetailOfOperation->LinkCustomAttributes = "";
            $this->DetailOfOperation->HrefValue = "";
            $this->DetailOfOperation->TooltipValue = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->LinkCustomAttributes = "";
            $this->FollowUpAdvice->HrefValue = "";
            $this->FollowUpAdvice->TooltipValue = "";

            // FollowUpMedication
            $this->FollowUpMedication->LinkCustomAttributes = "";
            $this->FollowUpMedication->HrefValue = "";
            $this->FollowUpMedication->TooltipValue = "";

            // Plan
            $this->Plan->LinkCustomAttributes = "";
            $this->Plan->HrefValue = "";
            $this->Plan->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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

            // SEX
            $this->SEX->EditAttrs["class"] = "form-control";
            $this->SEX->EditCustomAttributes = "";
            if (!$this->SEX->Raw) {
                $this->SEX->CurrentValue = HtmlDecode($this->SEX->CurrentValue);
            }
            $this->SEX->EditValue = HtmlEncode($this->SEX->CurrentValue);
            $this->SEX->PlaceHolder = RemoveHtml($this->SEX->caption());

            // Address
            $this->Address->EditAttrs["class"] = "form-control";
            $this->Address->EditCustomAttributes = "";
            if (!$this->Address->Raw) {
                $this->Address->CurrentValue = HtmlDecode($this->Address->CurrentValue);
            }
            $this->Address->EditValue = HtmlEncode($this->Address->CurrentValue);
            $this->Address->PlaceHolder = RemoveHtml($this->Address->caption());

            // DateofAdmission
            $this->DateofAdmission->EditAttrs["class"] = "form-control";
            $this->DateofAdmission->EditCustomAttributes = "";
            $this->DateofAdmission->EditValue = HtmlEncode(FormatDateTime($this->DateofAdmission->CurrentValue, 8));
            $this->DateofAdmission->PlaceHolder = RemoveHtml($this->DateofAdmission->caption());

            // DateofProcedure
            $this->DateofProcedure->EditAttrs["class"] = "form-control";
            $this->DateofProcedure->EditCustomAttributes = "";
            $this->DateofProcedure->EditValue = HtmlEncode(FormatDateTime($this->DateofProcedure->CurrentValue, 8));
            $this->DateofProcedure->PlaceHolder = RemoveHtml($this->DateofProcedure->caption());

            // DateofDischarge
            $this->DateofDischarge->EditAttrs["class"] = "form-control";
            $this->DateofDischarge->EditCustomAttributes = "";
            $this->DateofDischarge->EditValue = HtmlEncode(FormatDateTime($this->DateofDischarge->CurrentValue, 8));
            $this->DateofDischarge->PlaceHolder = RemoveHtml($this->DateofDischarge->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // Surgeon
            $this->Surgeon->EditAttrs["class"] = "form-control";
            $this->Surgeon->EditCustomAttributes = "";
            if (!$this->Surgeon->Raw) {
                $this->Surgeon->CurrentValue = HtmlDecode($this->Surgeon->CurrentValue);
            }
            $this->Surgeon->EditValue = HtmlEncode($this->Surgeon->CurrentValue);
            $this->Surgeon->PlaceHolder = RemoveHtml($this->Surgeon->caption());

            // Anesthetist
            $this->Anesthetist->EditAttrs["class"] = "form-control";
            $this->Anesthetist->EditCustomAttributes = "";
            if (!$this->Anesthetist->Raw) {
                $this->Anesthetist->CurrentValue = HtmlDecode($this->Anesthetist->CurrentValue);
            }
            $this->Anesthetist->EditValue = HtmlEncode($this->Anesthetist->CurrentValue);
            $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

            // IdentificationMark
            $this->IdentificationMark->EditAttrs["class"] = "form-control";
            $this->IdentificationMark->EditCustomAttributes = "";
            if (!$this->IdentificationMark->Raw) {
                $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
            }
            $this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
            $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

            // ProcedureDone
            $this->ProcedureDone->EditAttrs["class"] = "form-control";
            $this->ProcedureDone->EditCustomAttributes = "";
            if (!$this->ProcedureDone->Raw) {
                $this->ProcedureDone->CurrentValue = HtmlDecode($this->ProcedureDone->CurrentValue);
            }
            $this->ProcedureDone->EditValue = HtmlEncode($this->ProcedureDone->CurrentValue);
            $this->ProcedureDone->PlaceHolder = RemoveHtml($this->ProcedureDone->caption());

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->EditAttrs["class"] = "form-control";
            $this->PROVISIONALDIAGNOSIS->EditCustomAttributes = "";
            if (!$this->PROVISIONALDIAGNOSIS->Raw) {
                $this->PROVISIONALDIAGNOSIS->CurrentValue = HtmlDecode($this->PROVISIONALDIAGNOSIS->CurrentValue);
            }
            $this->PROVISIONALDIAGNOSIS->EditValue = HtmlEncode($this->PROVISIONALDIAGNOSIS->CurrentValue);
            $this->PROVISIONALDIAGNOSIS->PlaceHolder = RemoveHtml($this->PROVISIONALDIAGNOSIS->caption());

            // Chiefcomplaints
            $this->Chiefcomplaints->EditAttrs["class"] = "form-control";
            $this->Chiefcomplaints->EditCustomAttributes = "";
            if (!$this->Chiefcomplaints->Raw) {
                $this->Chiefcomplaints->CurrentValue = HtmlDecode($this->Chiefcomplaints->CurrentValue);
            }
            $this->Chiefcomplaints->EditValue = HtmlEncode($this->Chiefcomplaints->CurrentValue);
            $this->Chiefcomplaints->PlaceHolder = RemoveHtml($this->Chiefcomplaints->caption());

            // MaritallHistory
            $this->MaritallHistory->EditAttrs["class"] = "form-control";
            $this->MaritallHistory->EditCustomAttributes = "";
            if (!$this->MaritallHistory->Raw) {
                $this->MaritallHistory->CurrentValue = HtmlDecode($this->MaritallHistory->CurrentValue);
            }
            $this->MaritallHistory->EditValue = HtmlEncode($this->MaritallHistory->CurrentValue);
            $this->MaritallHistory->PlaceHolder = RemoveHtml($this->MaritallHistory->caption());

            // MenstrualHistory
            $this->MenstrualHistory->EditAttrs["class"] = "form-control";
            $this->MenstrualHistory->EditCustomAttributes = "";
            if (!$this->MenstrualHistory->Raw) {
                $this->MenstrualHistory->CurrentValue = HtmlDecode($this->MenstrualHistory->CurrentValue);
            }
            $this->MenstrualHistory->EditValue = HtmlEncode($this->MenstrualHistory->CurrentValue);
            $this->MenstrualHistory->PlaceHolder = RemoveHtml($this->MenstrualHistory->caption());

            // SurgicalHistory
            $this->SurgicalHistory->EditAttrs["class"] = "form-control";
            $this->SurgicalHistory->EditCustomAttributes = "";
            if (!$this->SurgicalHistory->Raw) {
                $this->SurgicalHistory->CurrentValue = HtmlDecode($this->SurgicalHistory->CurrentValue);
            }
            $this->SurgicalHistory->EditValue = HtmlEncode($this->SurgicalHistory->CurrentValue);
            $this->SurgicalHistory->PlaceHolder = RemoveHtml($this->SurgicalHistory->caption());

            // PastHistory
            $this->PastHistory->EditAttrs["class"] = "form-control";
            $this->PastHistory->EditCustomAttributes = "";
            if (!$this->PastHistory->Raw) {
                $this->PastHistory->CurrentValue = HtmlDecode($this->PastHistory->CurrentValue);
            }
            $this->PastHistory->EditValue = HtmlEncode($this->PastHistory->CurrentValue);
            $this->PastHistory->PlaceHolder = RemoveHtml($this->PastHistory->caption());

            // FamilyHistory
            $this->FamilyHistory->EditAttrs["class"] = "form-control";
            $this->FamilyHistory->EditCustomAttributes = "";
            if (!$this->FamilyHistory->Raw) {
                $this->FamilyHistory->CurrentValue = HtmlDecode($this->FamilyHistory->CurrentValue);
            }
            $this->FamilyHistory->EditValue = HtmlEncode($this->FamilyHistory->CurrentValue);
            $this->FamilyHistory->PlaceHolder = RemoveHtml($this->FamilyHistory->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->CurrentValue = HtmlDecode($this->Temp->CurrentValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->CurrentValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->CurrentValue = HtmlDecode($this->Pulse->CurrentValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->CurrentValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->CurrentValue = HtmlDecode($this->BP->CurrentValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->CurrentValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->CurrentValue = HtmlDecode($this->CNS->CurrentValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->CurrentValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RS
            $this->_RS->EditAttrs["class"] = "form-control";
            $this->_RS->EditCustomAttributes = "";
            if (!$this->_RS->Raw) {
                $this->_RS->CurrentValue = HtmlDecode($this->_RS->CurrentValue);
            }
            $this->_RS->EditValue = HtmlEncode($this->_RS->CurrentValue);
            $this->_RS->PlaceHolder = RemoveHtml($this->_RS->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->CurrentValue = HtmlDecode($this->CVS->CurrentValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->CurrentValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->CurrentValue = HtmlDecode($this->PA->CurrentValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->CurrentValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // InvestigationReport
            $this->InvestigationReport->EditAttrs["class"] = "form-control";
            $this->InvestigationReport->EditCustomAttributes = "";
            $this->InvestigationReport->EditValue = HtmlEncode($this->InvestigationReport->CurrentValue);
            $this->InvestigationReport->PlaceHolder = RemoveHtml($this->InvestigationReport->caption());

            // FinalDiagnosis
            $this->FinalDiagnosis->EditAttrs["class"] = "form-control";
            $this->FinalDiagnosis->EditCustomAttributes = "";
            $this->FinalDiagnosis->EditValue = HtmlEncode($this->FinalDiagnosis->CurrentValue);
            $this->FinalDiagnosis->PlaceHolder = RemoveHtml($this->FinalDiagnosis->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->CurrentValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // DetailOfOperation
            $this->DetailOfOperation->EditAttrs["class"] = "form-control";
            $this->DetailOfOperation->EditCustomAttributes = "";
            $this->DetailOfOperation->EditValue = HtmlEncode($this->DetailOfOperation->CurrentValue);
            $this->DetailOfOperation->PlaceHolder = RemoveHtml($this->DetailOfOperation->caption());

            // FollowUpAdvice
            $this->FollowUpAdvice->EditAttrs["class"] = "form-control";
            $this->FollowUpAdvice->EditCustomAttributes = "";
            $this->FollowUpAdvice->EditValue = HtmlEncode($this->FollowUpAdvice->CurrentValue);
            $this->FollowUpAdvice->PlaceHolder = RemoveHtml($this->FollowUpAdvice->caption());

            // FollowUpMedication
            $this->FollowUpMedication->EditAttrs["class"] = "form-control";
            $this->FollowUpMedication->EditCustomAttributes = "";
            $this->FollowUpMedication->EditValue = HtmlEncode($this->FollowUpMedication->CurrentValue);
            $this->FollowUpMedication->PlaceHolder = RemoveHtml($this->FollowUpMedication->caption());

            // Plan
            $this->Plan->EditAttrs["class"] = "form-control";
            $this->Plan->EditCustomAttributes = "";
            $this->Plan->EditValue = HtmlEncode($this->Plan->CurrentValue);
            $this->Plan->PlaceHolder = RemoveHtml($this->Plan->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";

            // DateofAdmission
            $this->DateofAdmission->LinkCustomAttributes = "";
            $this->DateofAdmission->HrefValue = "";

            // DateofProcedure
            $this->DateofProcedure->LinkCustomAttributes = "";
            $this->DateofProcedure->HrefValue = "";

            // DateofDischarge
            $this->DateofDischarge->LinkCustomAttributes = "";
            $this->DateofDischarge->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // Surgeon
            $this->Surgeon->LinkCustomAttributes = "";
            $this->Surgeon->HrefValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";

            // ProcedureDone
            $this->ProcedureDone->LinkCustomAttributes = "";
            $this->ProcedureDone->HrefValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";

            // MaritallHistory
            $this->MaritallHistory->LinkCustomAttributes = "";
            $this->MaritallHistory->HrefValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";

            // PastHistory
            $this->PastHistory->LinkCustomAttributes = "";
            $this->PastHistory->HrefValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";

            // RS
            $this->_RS->LinkCustomAttributes = "";
            $this->_RS->HrefValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";

            // InvestigationReport
            $this->InvestigationReport->LinkCustomAttributes = "";
            $this->InvestigationReport->HrefValue = "";

            // FinalDiagnosis
            $this->FinalDiagnosis->LinkCustomAttributes = "";
            $this->FinalDiagnosis->HrefValue = "";

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";

            // DetailOfOperation
            $this->DetailOfOperation->LinkCustomAttributes = "";
            $this->DetailOfOperation->HrefValue = "";

            // FollowUpAdvice
            $this->FollowUpAdvice->LinkCustomAttributes = "";
            $this->FollowUpAdvice->HrefValue = "";

            // FollowUpMedication
            $this->FollowUpMedication->LinkCustomAttributes = "";
            $this->FollowUpMedication->HrefValue = "";

            // Plan
            $this->Plan->LinkCustomAttributes = "";
            $this->Plan->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
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
        if ($this->SEX->Required) {
            if (!$this->SEX->IsDetailKey && EmptyValue($this->SEX->FormValue)) {
                $this->SEX->addErrorMessage(str_replace("%s", $this->SEX->caption(), $this->SEX->RequiredErrorMessage));
            }
        }
        if ($this->Address->Required) {
            if (!$this->Address->IsDetailKey && EmptyValue($this->Address->FormValue)) {
                $this->Address->addErrorMessage(str_replace("%s", $this->Address->caption(), $this->Address->RequiredErrorMessage));
            }
        }
        if ($this->DateofAdmission->Required) {
            if (!$this->DateofAdmission->IsDetailKey && EmptyValue($this->DateofAdmission->FormValue)) {
                $this->DateofAdmission->addErrorMessage(str_replace("%s", $this->DateofAdmission->caption(), $this->DateofAdmission->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DateofAdmission->FormValue)) {
            $this->DateofAdmission->addErrorMessage($this->DateofAdmission->getErrorMessage(false));
        }
        if ($this->DateofProcedure->Required) {
            if (!$this->DateofProcedure->IsDetailKey && EmptyValue($this->DateofProcedure->FormValue)) {
                $this->DateofProcedure->addErrorMessage(str_replace("%s", $this->DateofProcedure->caption(), $this->DateofProcedure->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DateofProcedure->FormValue)) {
            $this->DateofProcedure->addErrorMessage($this->DateofProcedure->getErrorMessage(false));
        }
        if ($this->DateofDischarge->Required) {
            if (!$this->DateofDischarge->IsDetailKey && EmptyValue($this->DateofDischarge->FormValue)) {
                $this->DateofDischarge->addErrorMessage(str_replace("%s", $this->DateofDischarge->caption(), $this->DateofDischarge->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DateofDischarge->FormValue)) {
            $this->DateofDischarge->addErrorMessage($this->DateofDischarge->getErrorMessage(false));
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->Surgeon->Required) {
            if (!$this->Surgeon->IsDetailKey && EmptyValue($this->Surgeon->FormValue)) {
                $this->Surgeon->addErrorMessage(str_replace("%s", $this->Surgeon->caption(), $this->Surgeon->RequiredErrorMessage));
            }
        }
        if ($this->Anesthetist->Required) {
            if (!$this->Anesthetist->IsDetailKey && EmptyValue($this->Anesthetist->FormValue)) {
                $this->Anesthetist->addErrorMessage(str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
            }
        }
        if ($this->IdentificationMark->Required) {
            if (!$this->IdentificationMark->IsDetailKey && EmptyValue($this->IdentificationMark->FormValue)) {
                $this->IdentificationMark->addErrorMessage(str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureDone->Required) {
            if (!$this->ProcedureDone->IsDetailKey && EmptyValue($this->ProcedureDone->FormValue)) {
                $this->ProcedureDone->addErrorMessage(str_replace("%s", $this->ProcedureDone->caption(), $this->ProcedureDone->RequiredErrorMessage));
            }
        }
        if ($this->PROVISIONALDIAGNOSIS->Required) {
            if (!$this->PROVISIONALDIAGNOSIS->IsDetailKey && EmptyValue($this->PROVISIONALDIAGNOSIS->FormValue)) {
                $this->PROVISIONALDIAGNOSIS->addErrorMessage(str_replace("%s", $this->PROVISIONALDIAGNOSIS->caption(), $this->PROVISIONALDIAGNOSIS->RequiredErrorMessage));
            }
        }
        if ($this->Chiefcomplaints->Required) {
            if (!$this->Chiefcomplaints->IsDetailKey && EmptyValue($this->Chiefcomplaints->FormValue)) {
                $this->Chiefcomplaints->addErrorMessage(str_replace("%s", $this->Chiefcomplaints->caption(), $this->Chiefcomplaints->RequiredErrorMessage));
            }
        }
        if ($this->MaritallHistory->Required) {
            if (!$this->MaritallHistory->IsDetailKey && EmptyValue($this->MaritallHistory->FormValue)) {
                $this->MaritallHistory->addErrorMessage(str_replace("%s", $this->MaritallHistory->caption(), $this->MaritallHistory->RequiredErrorMessage));
            }
        }
        if ($this->MenstrualHistory->Required) {
            if (!$this->MenstrualHistory->IsDetailKey && EmptyValue($this->MenstrualHistory->FormValue)) {
                $this->MenstrualHistory->addErrorMessage(str_replace("%s", $this->MenstrualHistory->caption(), $this->MenstrualHistory->RequiredErrorMessage));
            }
        }
        if ($this->SurgicalHistory->Required) {
            if (!$this->SurgicalHistory->IsDetailKey && EmptyValue($this->SurgicalHistory->FormValue)) {
                $this->SurgicalHistory->addErrorMessage(str_replace("%s", $this->SurgicalHistory->caption(), $this->SurgicalHistory->RequiredErrorMessage));
            }
        }
        if ($this->PastHistory->Required) {
            if (!$this->PastHistory->IsDetailKey && EmptyValue($this->PastHistory->FormValue)) {
                $this->PastHistory->addErrorMessage(str_replace("%s", $this->PastHistory->caption(), $this->PastHistory->RequiredErrorMessage));
            }
        }
        if ($this->FamilyHistory->Required) {
            if (!$this->FamilyHistory->IsDetailKey && EmptyValue($this->FamilyHistory->FormValue)) {
                $this->FamilyHistory->addErrorMessage(str_replace("%s", $this->FamilyHistory->caption(), $this->FamilyHistory->RequiredErrorMessage));
            }
        }
        if ($this->Temp->Required) {
            if (!$this->Temp->IsDetailKey && EmptyValue($this->Temp->FormValue)) {
                $this->Temp->addErrorMessage(str_replace("%s", $this->Temp->caption(), $this->Temp->RequiredErrorMessage));
            }
        }
        if ($this->Pulse->Required) {
            if (!$this->Pulse->IsDetailKey && EmptyValue($this->Pulse->FormValue)) {
                $this->Pulse->addErrorMessage(str_replace("%s", $this->Pulse->caption(), $this->Pulse->RequiredErrorMessage));
            }
        }
        if ($this->BP->Required) {
            if (!$this->BP->IsDetailKey && EmptyValue($this->BP->FormValue)) {
                $this->BP->addErrorMessage(str_replace("%s", $this->BP->caption(), $this->BP->RequiredErrorMessage));
            }
        }
        if ($this->CNS->Required) {
            if (!$this->CNS->IsDetailKey && EmptyValue($this->CNS->FormValue)) {
                $this->CNS->addErrorMessage(str_replace("%s", $this->CNS->caption(), $this->CNS->RequiredErrorMessage));
            }
        }
        if ($this->_RS->Required) {
            if (!$this->_RS->IsDetailKey && EmptyValue($this->_RS->FormValue)) {
                $this->_RS->addErrorMessage(str_replace("%s", $this->_RS->caption(), $this->_RS->RequiredErrorMessage));
            }
        }
        if ($this->CVS->Required) {
            if (!$this->CVS->IsDetailKey && EmptyValue($this->CVS->FormValue)) {
                $this->CVS->addErrorMessage(str_replace("%s", $this->CVS->caption(), $this->CVS->RequiredErrorMessage));
            }
        }
        if ($this->PA->Required) {
            if (!$this->PA->IsDetailKey && EmptyValue($this->PA->FormValue)) {
                $this->PA->addErrorMessage(str_replace("%s", $this->PA->caption(), $this->PA->RequiredErrorMessage));
            }
        }
        if ($this->InvestigationReport->Required) {
            if (!$this->InvestigationReport->IsDetailKey && EmptyValue($this->InvestigationReport->FormValue)) {
                $this->InvestigationReport->addErrorMessage(str_replace("%s", $this->InvestigationReport->caption(), $this->InvestigationReport->RequiredErrorMessage));
            }
        }
        if ($this->FinalDiagnosis->Required) {
            if (!$this->FinalDiagnosis->IsDetailKey && EmptyValue($this->FinalDiagnosis->FormValue)) {
                $this->FinalDiagnosis->addErrorMessage(str_replace("%s", $this->FinalDiagnosis->caption(), $this->FinalDiagnosis->RequiredErrorMessage));
            }
        }
        if ($this->Treatment->Required) {
            if (!$this->Treatment->IsDetailKey && EmptyValue($this->Treatment->FormValue)) {
                $this->Treatment->addErrorMessage(str_replace("%s", $this->Treatment->caption(), $this->Treatment->RequiredErrorMessage));
            }
        }
        if ($this->DetailOfOperation->Required) {
            if (!$this->DetailOfOperation->IsDetailKey && EmptyValue($this->DetailOfOperation->FormValue)) {
                $this->DetailOfOperation->addErrorMessage(str_replace("%s", $this->DetailOfOperation->caption(), $this->DetailOfOperation->RequiredErrorMessage));
            }
        }
        if ($this->FollowUpAdvice->Required) {
            if (!$this->FollowUpAdvice->IsDetailKey && EmptyValue($this->FollowUpAdvice->FormValue)) {
                $this->FollowUpAdvice->addErrorMessage(str_replace("%s", $this->FollowUpAdvice->caption(), $this->FollowUpAdvice->RequiredErrorMessage));
            }
        }
        if ($this->FollowUpMedication->Required) {
            if (!$this->FollowUpMedication->IsDetailKey && EmptyValue($this->FollowUpMedication->FormValue)) {
                $this->FollowUpMedication->addErrorMessage(str_replace("%s", $this->FollowUpMedication->caption(), $this->FollowUpMedication->RequiredErrorMessage));
            }
        }
        if ($this->Plan->Required) {
            if (!$this->Plan->IsDetailKey && EmptyValue($this->Plan->FormValue)) {
                $this->Plan->addErrorMessage(str_replace("%s", $this->Plan->caption(), $this->Plan->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
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

            // RIDNO
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // Name
            $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, $this->Name->ReadOnly);

            // Age
            $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, $this->Age->ReadOnly);

            // SEX
            $this->SEX->setDbValueDef($rsnew, $this->SEX->CurrentValue, null, $this->SEX->ReadOnly);

            // Address
            $this->Address->setDbValueDef($rsnew, $this->Address->CurrentValue, null, $this->Address->ReadOnly);

            // DateofAdmission
            $this->DateofAdmission->setDbValueDef($rsnew, UnFormatDateTime($this->DateofAdmission->CurrentValue, 0), null, $this->DateofAdmission->ReadOnly);

            // DateofProcedure
            $this->DateofProcedure->setDbValueDef($rsnew, UnFormatDateTime($this->DateofProcedure->CurrentValue, 0), null, $this->DateofProcedure->ReadOnly);

            // DateofDischarge
            $this->DateofDischarge->setDbValueDef($rsnew, UnFormatDateTime($this->DateofDischarge->CurrentValue, 0), null, $this->DateofDischarge->ReadOnly);

            // Consultant
            $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, $this->Consultant->ReadOnly);

            // Surgeon
            $this->Surgeon->setDbValueDef($rsnew, $this->Surgeon->CurrentValue, null, $this->Surgeon->ReadOnly);

            // Anesthetist
            $this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, null, $this->Anesthetist->ReadOnly);

            // IdentificationMark
            $this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, null, $this->IdentificationMark->ReadOnly);

            // ProcedureDone
            $this->ProcedureDone->setDbValueDef($rsnew, $this->ProcedureDone->CurrentValue, null, $this->ProcedureDone->ReadOnly);

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->setDbValueDef($rsnew, $this->PROVISIONALDIAGNOSIS->CurrentValue, null, $this->PROVISIONALDIAGNOSIS->ReadOnly);

            // Chiefcomplaints
            $this->Chiefcomplaints->setDbValueDef($rsnew, $this->Chiefcomplaints->CurrentValue, null, $this->Chiefcomplaints->ReadOnly);

            // MaritallHistory
            $this->MaritallHistory->setDbValueDef($rsnew, $this->MaritallHistory->CurrentValue, null, $this->MaritallHistory->ReadOnly);

            // MenstrualHistory
            $this->MenstrualHistory->setDbValueDef($rsnew, $this->MenstrualHistory->CurrentValue, null, $this->MenstrualHistory->ReadOnly);

            // SurgicalHistory
            $this->SurgicalHistory->setDbValueDef($rsnew, $this->SurgicalHistory->CurrentValue, null, $this->SurgicalHistory->ReadOnly);

            // PastHistory
            $this->PastHistory->setDbValueDef($rsnew, $this->PastHistory->CurrentValue, null, $this->PastHistory->ReadOnly);

            // FamilyHistory
            $this->FamilyHistory->setDbValueDef($rsnew, $this->FamilyHistory->CurrentValue, null, $this->FamilyHistory->ReadOnly);

            // Temp
            $this->Temp->setDbValueDef($rsnew, $this->Temp->CurrentValue, null, $this->Temp->ReadOnly);

            // Pulse
            $this->Pulse->setDbValueDef($rsnew, $this->Pulse->CurrentValue, null, $this->Pulse->ReadOnly);

            // BP
            $this->BP->setDbValueDef($rsnew, $this->BP->CurrentValue, null, $this->BP->ReadOnly);

            // CNS
            $this->CNS->setDbValueDef($rsnew, $this->CNS->CurrentValue, null, $this->CNS->ReadOnly);

            // RS
            $this->_RS->setDbValueDef($rsnew, $this->_RS->CurrentValue, null, $this->_RS->ReadOnly);

            // CVS
            $this->CVS->setDbValueDef($rsnew, $this->CVS->CurrentValue, null, $this->CVS->ReadOnly);

            // PA
            $this->PA->setDbValueDef($rsnew, $this->PA->CurrentValue, null, $this->PA->ReadOnly);

            // InvestigationReport
            $this->InvestigationReport->setDbValueDef($rsnew, $this->InvestigationReport->CurrentValue, null, $this->InvestigationReport->ReadOnly);

            // FinalDiagnosis
            $this->FinalDiagnosis->setDbValueDef($rsnew, $this->FinalDiagnosis->CurrentValue, null, $this->FinalDiagnosis->ReadOnly);

            // Treatment
            $this->Treatment->setDbValueDef($rsnew, $this->Treatment->CurrentValue, null, $this->Treatment->ReadOnly);

            // DetailOfOperation
            $this->DetailOfOperation->setDbValueDef($rsnew, $this->DetailOfOperation->CurrentValue, null, $this->DetailOfOperation->ReadOnly);

            // FollowUpAdvice
            $this->FollowUpAdvice->setDbValueDef($rsnew, $this->FollowUpAdvice->CurrentValue, null, $this->FollowUpAdvice->ReadOnly);

            // FollowUpMedication
            $this->FollowUpMedication->setDbValueDef($rsnew, $this->FollowUpMedication->CurrentValue, null, $this->FollowUpMedication->ReadOnly);

            // Plan
            $this->Plan->setDbValueDef($rsnew, $this->Plan->CurrentValue, null, $this->Plan->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOtherprocedureList"), "", $this->TableVar, true);
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
