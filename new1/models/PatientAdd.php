<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientAdd extends Patient
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient';

    // Page object name
    public $PageObjName = "PatientAdd";

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

        // Table object (patient)
        if (!isset($GLOBALS["patient"]) || get_class($GLOBALS["patient"]) == PROJECT_NAMESPACE . "patient") {
            $GLOBALS["patient"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient');
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
                $doc = new $class(Container("patient"));
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
                    if ($pageName == "PatientView") {
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
            $key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
            $key .= @$ar['PatientID'];
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
        $this->PatientID->setVisibility();
        $this->title->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->dob->setVisibility();
        $this->Age->setVisibility();
        $this->blood_group->setVisibility();
        $this->mobile_no->setVisibility();
        $this->description->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->Religion->setVisibility();
        $this->Nationality->setVisibility();
        $this->profilePic->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->spouse_title->setVisibility();
        $this->spouse_first_name->setVisibility();
        $this->spouse_middle_name->setVisibility();
        $this->spouse_last_name->setVisibility();
        $this->spouse_gender->setVisibility();
        $this->spouse_dob->setVisibility();
        $this->spouse_Age->setVisibility();
        $this->spouse_blood_group->setVisibility();
        $this->spouse_mobile_no->setVisibility();
        $this->Maritalstatus->setVisibility();
        $this->Business->setVisibility();
        $this->Patient_Language->setVisibility();
        $this->Passport->setVisibility();
        $this->VisaNo->setVisibility();
        $this->ValidityOfVisa->setVisibility();
        $this->WhereDidYouHear->setVisibility();
        $this->HospID->setVisibility();
        $this->street->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->country->setVisibility();
        $this->postal_code->setVisibility();
        $this->PEmail->setVisibility();
        $this->PEmergencyContact->setVisibility();
        $this->occupation->setVisibility();
        $this->spouse_occupation->setVisibility();
        $this->WhatsApp->setVisibility();
        $this->CouppleID->setVisibility();
        $this->MaleID->setVisibility();
        $this->FemaleID->setVisibility();
        $this->GroupID->setVisibility();
        $this->Relationship->setVisibility();
        $this->FacebookID->setVisibility();
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
            if (($keyValue = Get("PatientID") ?? Route("PatientID")) !== null) {
                $this->PatientID->setQueryStringValue($keyValue);
                $this->setKey("PatientID", $this->PatientID->CurrentValue); // Set up key
            } else {
                $this->setKey("PatientID", ""); // Clear key
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
                    $this->terminate("PatientList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PatientList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PatientView") {
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
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->title->CurrentValue = null;
        $this->title->OldValue = $this->title->CurrentValue;
        $this->first_name->CurrentValue = null;
        $this->first_name->OldValue = $this->first_name->CurrentValue;
        $this->middle_name->CurrentValue = null;
        $this->middle_name->OldValue = $this->middle_name->CurrentValue;
        $this->last_name->CurrentValue = null;
        $this->last_name->OldValue = $this->last_name->CurrentValue;
        $this->gender->CurrentValue = null;
        $this->gender->OldValue = $this->gender->CurrentValue;
        $this->dob->CurrentValue = null;
        $this->dob->OldValue = $this->dob->CurrentValue;
        $this->Age->CurrentValue = null;
        $this->Age->OldValue = $this->Age->CurrentValue;
        $this->blood_group->CurrentValue = null;
        $this->blood_group->OldValue = $this->blood_group->CurrentValue;
        $this->mobile_no->CurrentValue = null;
        $this->mobile_no->OldValue = $this->mobile_no->CurrentValue;
        $this->description->CurrentValue = null;
        $this->description->OldValue = $this->description->CurrentValue;
        $this->IdentificationMark->CurrentValue = null;
        $this->IdentificationMark->OldValue = $this->IdentificationMark->CurrentValue;
        $this->Religion->CurrentValue = null;
        $this->Religion->OldValue = $this->Religion->CurrentValue;
        $this->Nationality->CurrentValue = null;
        $this->Nationality->OldValue = $this->Nationality->CurrentValue;
        $this->profilePic->CurrentValue = null;
        $this->profilePic->OldValue = $this->profilePic->CurrentValue;
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
        $this->ReferedByDr->CurrentValue = null;
        $this->ReferedByDr->OldValue = $this->ReferedByDr->CurrentValue;
        $this->ReferClinicname->CurrentValue = null;
        $this->ReferClinicname->OldValue = $this->ReferClinicname->CurrentValue;
        $this->ReferCity->CurrentValue = null;
        $this->ReferCity->OldValue = $this->ReferCity->CurrentValue;
        $this->ReferMobileNo->CurrentValue = null;
        $this->ReferMobileNo->OldValue = $this->ReferMobileNo->CurrentValue;
        $this->ReferA4TreatingConsultant->CurrentValue = null;
        $this->ReferA4TreatingConsultant->OldValue = $this->ReferA4TreatingConsultant->CurrentValue;
        $this->PurposreReferredfor->CurrentValue = null;
        $this->PurposreReferredfor->OldValue = $this->PurposreReferredfor->CurrentValue;
        $this->spouse_title->CurrentValue = null;
        $this->spouse_title->OldValue = $this->spouse_title->CurrentValue;
        $this->spouse_first_name->CurrentValue = null;
        $this->spouse_first_name->OldValue = $this->spouse_first_name->CurrentValue;
        $this->spouse_middle_name->CurrentValue = null;
        $this->spouse_middle_name->OldValue = $this->spouse_middle_name->CurrentValue;
        $this->spouse_last_name->CurrentValue = null;
        $this->spouse_last_name->OldValue = $this->spouse_last_name->CurrentValue;
        $this->spouse_gender->CurrentValue = null;
        $this->spouse_gender->OldValue = $this->spouse_gender->CurrentValue;
        $this->spouse_dob->CurrentValue = null;
        $this->spouse_dob->OldValue = $this->spouse_dob->CurrentValue;
        $this->spouse_Age->CurrentValue = null;
        $this->spouse_Age->OldValue = $this->spouse_Age->CurrentValue;
        $this->spouse_blood_group->CurrentValue = null;
        $this->spouse_blood_group->OldValue = $this->spouse_blood_group->CurrentValue;
        $this->spouse_mobile_no->CurrentValue = null;
        $this->spouse_mobile_no->OldValue = $this->spouse_mobile_no->CurrentValue;
        $this->Maritalstatus->CurrentValue = null;
        $this->Maritalstatus->OldValue = $this->Maritalstatus->CurrentValue;
        $this->Business->CurrentValue = null;
        $this->Business->OldValue = $this->Business->CurrentValue;
        $this->Patient_Language->CurrentValue = null;
        $this->Patient_Language->OldValue = $this->Patient_Language->CurrentValue;
        $this->Passport->CurrentValue = null;
        $this->Passport->OldValue = $this->Passport->CurrentValue;
        $this->VisaNo->CurrentValue = null;
        $this->VisaNo->OldValue = $this->VisaNo->CurrentValue;
        $this->ValidityOfVisa->CurrentValue = null;
        $this->ValidityOfVisa->OldValue = $this->ValidityOfVisa->CurrentValue;
        $this->WhereDidYouHear->CurrentValue = null;
        $this->WhereDidYouHear->OldValue = $this->WhereDidYouHear->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->street->CurrentValue = null;
        $this->street->OldValue = $this->street->CurrentValue;
        $this->town->CurrentValue = null;
        $this->town->OldValue = $this->town->CurrentValue;
        $this->province->CurrentValue = null;
        $this->province->OldValue = $this->province->CurrentValue;
        $this->country->CurrentValue = null;
        $this->country->OldValue = $this->country->CurrentValue;
        $this->postal_code->CurrentValue = null;
        $this->postal_code->OldValue = $this->postal_code->CurrentValue;
        $this->PEmail->CurrentValue = null;
        $this->PEmail->OldValue = $this->PEmail->CurrentValue;
        $this->PEmergencyContact->CurrentValue = null;
        $this->PEmergencyContact->OldValue = $this->PEmergencyContact->CurrentValue;
        $this->occupation->CurrentValue = null;
        $this->occupation->OldValue = $this->occupation->CurrentValue;
        $this->spouse_occupation->CurrentValue = null;
        $this->spouse_occupation->OldValue = $this->spouse_occupation->CurrentValue;
        $this->WhatsApp->CurrentValue = null;
        $this->WhatsApp->OldValue = $this->WhatsApp->CurrentValue;
        $this->CouppleID->CurrentValue = null;
        $this->CouppleID->OldValue = $this->CouppleID->CurrentValue;
        $this->MaleID->CurrentValue = null;
        $this->MaleID->OldValue = $this->MaleID->CurrentValue;
        $this->FemaleID->CurrentValue = null;
        $this->FemaleID->OldValue = $this->FemaleID->CurrentValue;
        $this->GroupID->CurrentValue = null;
        $this->GroupID->OldValue = $this->GroupID->CurrentValue;
        $this->Relationship->CurrentValue = null;
        $this->Relationship->OldValue = $this->Relationship->CurrentValue;
        $this->FacebookID->CurrentValue = null;
        $this->FacebookID->OldValue = $this->FacebookID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'PatientID' first before field var 'x_PatientID'
        $val = $CurrentForm->hasValue("PatientID") ? $CurrentForm->getValue("PatientID") : $CurrentForm->getValue("x_PatientID");
        if (!$this->PatientID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientID->Visible = false; // Disable update for API request
            } else {
                $this->PatientID->setFormValue($val);
            }
        }

        // Check field name 'title' first before field var 'x_title'
        $val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
        if (!$this->title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->title->Visible = false; // Disable update for API request
            } else {
                $this->title->setFormValue($val);
            }
        }

        // Check field name 'first_name' first before field var 'x_first_name'
        $val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
        if (!$this->first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->first_name->Visible = false; // Disable update for API request
            } else {
                $this->first_name->setFormValue($val);
            }
        }

        // Check field name 'middle_name' first before field var 'x_middle_name'
        $val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
        if (!$this->middle_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->middle_name->Visible = false; // Disable update for API request
            } else {
                $this->middle_name->setFormValue($val);
            }
        }

        // Check field name 'last_name' first before field var 'x_last_name'
        $val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
        if (!$this->last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->last_name->Visible = false; // Disable update for API request
            } else {
                $this->last_name->setFormValue($val);
            }
        }

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'dob' first before field var 'x_dob'
        $val = $CurrentForm->hasValue("dob") ? $CurrentForm->getValue("dob") : $CurrentForm->getValue("x_dob");
        if (!$this->dob->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->dob->Visible = false; // Disable update for API request
            } else {
                $this->dob->setFormValue($val);
            }
            $this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 0);
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

        // Check field name 'blood_group' first before field var 'x_blood_group'
        $val = $CurrentForm->hasValue("blood_group") ? $CurrentForm->getValue("blood_group") : $CurrentForm->getValue("x_blood_group");
        if (!$this->blood_group->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->blood_group->Visible = false; // Disable update for API request
            } else {
                $this->blood_group->setFormValue($val);
            }
        }

        // Check field name 'mobile_no' first before field var 'x_mobile_no'
        $val = $CurrentForm->hasValue("mobile_no") ? $CurrentForm->getValue("mobile_no") : $CurrentForm->getValue("x_mobile_no");
        if (!$this->mobile_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile_no->Visible = false; // Disable update for API request
            } else {
                $this->mobile_no->setFormValue($val);
            }
        }

        // Check field name 'description' first before field var 'x_description'
        $val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
        if (!$this->description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->description->Visible = false; // Disable update for API request
            } else {
                $this->description->setFormValue($val);
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

        // Check field name 'Religion' first before field var 'x_Religion'
        $val = $CurrentForm->hasValue("Religion") ? $CurrentForm->getValue("Religion") : $CurrentForm->getValue("x_Religion");
        if (!$this->Religion->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Religion->Visible = false; // Disable update for API request
            } else {
                $this->Religion->setFormValue($val);
            }
        }

        // Check field name 'Nationality' first before field var 'x_Nationality'
        $val = $CurrentForm->hasValue("Nationality") ? $CurrentForm->getValue("Nationality") : $CurrentForm->getValue("x_Nationality");
        if (!$this->Nationality->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Nationality->Visible = false; // Disable update for API request
            } else {
                $this->Nationality->setFormValue($val);
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

        // Check field name 'ReferedByDr' first before field var 'x_ReferedByDr'
        $val = $CurrentForm->hasValue("ReferedByDr") ? $CurrentForm->getValue("ReferedByDr") : $CurrentForm->getValue("x_ReferedByDr");
        if (!$this->ReferedByDr->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferedByDr->Visible = false; // Disable update for API request
            } else {
                $this->ReferedByDr->setFormValue($val);
            }
        }

        // Check field name 'ReferClinicname' first before field var 'x_ReferClinicname'
        $val = $CurrentForm->hasValue("ReferClinicname") ? $CurrentForm->getValue("ReferClinicname") : $CurrentForm->getValue("x_ReferClinicname");
        if (!$this->ReferClinicname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferClinicname->Visible = false; // Disable update for API request
            } else {
                $this->ReferClinicname->setFormValue($val);
            }
        }

        // Check field name 'ReferCity' first before field var 'x_ReferCity'
        $val = $CurrentForm->hasValue("ReferCity") ? $CurrentForm->getValue("ReferCity") : $CurrentForm->getValue("x_ReferCity");
        if (!$this->ReferCity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferCity->Visible = false; // Disable update for API request
            } else {
                $this->ReferCity->setFormValue($val);
            }
        }

        // Check field name 'ReferMobileNo' first before field var 'x_ReferMobileNo'
        $val = $CurrentForm->hasValue("ReferMobileNo") ? $CurrentForm->getValue("ReferMobileNo") : $CurrentForm->getValue("x_ReferMobileNo");
        if (!$this->ReferMobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferMobileNo->Visible = false; // Disable update for API request
            } else {
                $this->ReferMobileNo->setFormValue($val);
            }
        }

        // Check field name 'ReferA4TreatingConsultant' first before field var 'x_ReferA4TreatingConsultant'
        $val = $CurrentForm->hasValue("ReferA4TreatingConsultant") ? $CurrentForm->getValue("ReferA4TreatingConsultant") : $CurrentForm->getValue("x_ReferA4TreatingConsultant");
        if (!$this->ReferA4TreatingConsultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferA4TreatingConsultant->Visible = false; // Disable update for API request
            } else {
                $this->ReferA4TreatingConsultant->setFormValue($val);
            }
        }

        // Check field name 'PurposreReferredfor' first before field var 'x_PurposreReferredfor'
        $val = $CurrentForm->hasValue("PurposreReferredfor") ? $CurrentForm->getValue("PurposreReferredfor") : $CurrentForm->getValue("x_PurposreReferredfor");
        if (!$this->PurposreReferredfor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PurposreReferredfor->Visible = false; // Disable update for API request
            } else {
                $this->PurposreReferredfor->setFormValue($val);
            }
        }

        // Check field name 'spouse_title' first before field var 'x_spouse_title'
        $val = $CurrentForm->hasValue("spouse_title") ? $CurrentForm->getValue("spouse_title") : $CurrentForm->getValue("x_spouse_title");
        if (!$this->spouse_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_title->Visible = false; // Disable update for API request
            } else {
                $this->spouse_title->setFormValue($val);
            }
        }

        // Check field name 'spouse_first_name' first before field var 'x_spouse_first_name'
        $val = $CurrentForm->hasValue("spouse_first_name") ? $CurrentForm->getValue("spouse_first_name") : $CurrentForm->getValue("x_spouse_first_name");
        if (!$this->spouse_first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_first_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_first_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_middle_name' first before field var 'x_spouse_middle_name'
        $val = $CurrentForm->hasValue("spouse_middle_name") ? $CurrentForm->getValue("spouse_middle_name") : $CurrentForm->getValue("x_spouse_middle_name");
        if (!$this->spouse_middle_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_middle_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_middle_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_last_name' first before field var 'x_spouse_last_name'
        $val = $CurrentForm->hasValue("spouse_last_name") ? $CurrentForm->getValue("spouse_last_name") : $CurrentForm->getValue("x_spouse_last_name");
        if (!$this->spouse_last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_last_name->Visible = false; // Disable update for API request
            } else {
                $this->spouse_last_name->setFormValue($val);
            }
        }

        // Check field name 'spouse_gender' first before field var 'x_spouse_gender'
        $val = $CurrentForm->hasValue("spouse_gender") ? $CurrentForm->getValue("spouse_gender") : $CurrentForm->getValue("x_spouse_gender");
        if (!$this->spouse_gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_gender->Visible = false; // Disable update for API request
            } else {
                $this->spouse_gender->setFormValue($val);
            }
        }

        // Check field name 'spouse_dob' first before field var 'x_spouse_dob'
        $val = $CurrentForm->hasValue("spouse_dob") ? $CurrentForm->getValue("spouse_dob") : $CurrentForm->getValue("x_spouse_dob");
        if (!$this->spouse_dob->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_dob->Visible = false; // Disable update for API request
            } else {
                $this->spouse_dob->setFormValue($val);
            }
            $this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 0);
        }

        // Check field name 'spouse_Age' first before field var 'x_spouse_Age'
        $val = $CurrentForm->hasValue("spouse_Age") ? $CurrentForm->getValue("spouse_Age") : $CurrentForm->getValue("x_spouse_Age");
        if (!$this->spouse_Age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_Age->Visible = false; // Disable update for API request
            } else {
                $this->spouse_Age->setFormValue($val);
            }
        }

        // Check field name 'spouse_blood_group' first before field var 'x_spouse_blood_group'
        $val = $CurrentForm->hasValue("spouse_blood_group") ? $CurrentForm->getValue("spouse_blood_group") : $CurrentForm->getValue("x_spouse_blood_group");
        if (!$this->spouse_blood_group->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_blood_group->Visible = false; // Disable update for API request
            } else {
                $this->spouse_blood_group->setFormValue($val);
            }
        }

        // Check field name 'spouse_mobile_no' first before field var 'x_spouse_mobile_no'
        $val = $CurrentForm->hasValue("spouse_mobile_no") ? $CurrentForm->getValue("spouse_mobile_no") : $CurrentForm->getValue("x_spouse_mobile_no");
        if (!$this->spouse_mobile_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_mobile_no->Visible = false; // Disable update for API request
            } else {
                $this->spouse_mobile_no->setFormValue($val);
            }
        }

        // Check field name 'Maritalstatus' first before field var 'x_Maritalstatus'
        $val = $CurrentForm->hasValue("Maritalstatus") ? $CurrentForm->getValue("Maritalstatus") : $CurrentForm->getValue("x_Maritalstatus");
        if (!$this->Maritalstatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Maritalstatus->Visible = false; // Disable update for API request
            } else {
                $this->Maritalstatus->setFormValue($val);
            }
        }

        // Check field name 'Business' first before field var 'x_Business'
        $val = $CurrentForm->hasValue("Business") ? $CurrentForm->getValue("Business") : $CurrentForm->getValue("x_Business");
        if (!$this->Business->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Business->Visible = false; // Disable update for API request
            } else {
                $this->Business->setFormValue($val);
            }
        }

        // Check field name 'Patient_Language' first before field var 'x_Patient_Language'
        $val = $CurrentForm->hasValue("Patient_Language") ? $CurrentForm->getValue("Patient_Language") : $CurrentForm->getValue("x_Patient_Language");
        if (!$this->Patient_Language->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Patient_Language->Visible = false; // Disable update for API request
            } else {
                $this->Patient_Language->setFormValue($val);
            }
        }

        // Check field name 'Passport' first before field var 'x_Passport'
        $val = $CurrentForm->hasValue("Passport") ? $CurrentForm->getValue("Passport") : $CurrentForm->getValue("x_Passport");
        if (!$this->Passport->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Passport->Visible = false; // Disable update for API request
            } else {
                $this->Passport->setFormValue($val);
            }
        }

        // Check field name 'VisaNo' first before field var 'x_VisaNo'
        $val = $CurrentForm->hasValue("VisaNo") ? $CurrentForm->getValue("VisaNo") : $CurrentForm->getValue("x_VisaNo");
        if (!$this->VisaNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VisaNo->Visible = false; // Disable update for API request
            } else {
                $this->VisaNo->setFormValue($val);
            }
        }

        // Check field name 'ValidityOfVisa' first before field var 'x_ValidityOfVisa'
        $val = $CurrentForm->hasValue("ValidityOfVisa") ? $CurrentForm->getValue("ValidityOfVisa") : $CurrentForm->getValue("x_ValidityOfVisa");
        if (!$this->ValidityOfVisa->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ValidityOfVisa->Visible = false; // Disable update for API request
            } else {
                $this->ValidityOfVisa->setFormValue($val);
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

        // Check field name 'street' first before field var 'x_street'
        $val = $CurrentForm->hasValue("street") ? $CurrentForm->getValue("street") : $CurrentForm->getValue("x_street");
        if (!$this->street->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->street->Visible = false; // Disable update for API request
            } else {
                $this->street->setFormValue($val);
            }
        }

        // Check field name 'town' first before field var 'x_town'
        $val = $CurrentForm->hasValue("town") ? $CurrentForm->getValue("town") : $CurrentForm->getValue("x_town");
        if (!$this->town->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->town->Visible = false; // Disable update for API request
            } else {
                $this->town->setFormValue($val);
            }
        }

        // Check field name 'province' first before field var 'x_province'
        $val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
        if (!$this->province->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->province->Visible = false; // Disable update for API request
            } else {
                $this->province->setFormValue($val);
            }
        }

        // Check field name 'country' first before field var 'x_country'
        $val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
        if (!$this->country->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->country->Visible = false; // Disable update for API request
            } else {
                $this->country->setFormValue($val);
            }
        }

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'PEmail' first before field var 'x_PEmail'
        $val = $CurrentForm->hasValue("PEmail") ? $CurrentForm->getValue("PEmail") : $CurrentForm->getValue("x_PEmail");
        if (!$this->PEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PEmail->Visible = false; // Disable update for API request
            } else {
                $this->PEmail->setFormValue($val);
            }
        }

        // Check field name 'PEmergencyContact' first before field var 'x_PEmergencyContact'
        $val = $CurrentForm->hasValue("PEmergencyContact") ? $CurrentForm->getValue("PEmergencyContact") : $CurrentForm->getValue("x_PEmergencyContact");
        if (!$this->PEmergencyContact->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PEmergencyContact->Visible = false; // Disable update for API request
            } else {
                $this->PEmergencyContact->setFormValue($val);
            }
        }

        // Check field name 'occupation' first before field var 'x_occupation'
        $val = $CurrentForm->hasValue("occupation") ? $CurrentForm->getValue("occupation") : $CurrentForm->getValue("x_occupation");
        if (!$this->occupation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->occupation->Visible = false; // Disable update for API request
            } else {
                $this->occupation->setFormValue($val);
            }
        }

        // Check field name 'spouse_occupation' first before field var 'x_spouse_occupation'
        $val = $CurrentForm->hasValue("spouse_occupation") ? $CurrentForm->getValue("spouse_occupation") : $CurrentForm->getValue("x_spouse_occupation");
        if (!$this->spouse_occupation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->spouse_occupation->Visible = false; // Disable update for API request
            } else {
                $this->spouse_occupation->setFormValue($val);
            }
        }

        // Check field name 'WhatsApp' first before field var 'x_WhatsApp'
        $val = $CurrentForm->hasValue("WhatsApp") ? $CurrentForm->getValue("WhatsApp") : $CurrentForm->getValue("x_WhatsApp");
        if (!$this->WhatsApp->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WhatsApp->Visible = false; // Disable update for API request
            } else {
                $this->WhatsApp->setFormValue($val);
            }
        }

        // Check field name 'CouppleID' first before field var 'x_CouppleID'
        $val = $CurrentForm->hasValue("CouppleID") ? $CurrentForm->getValue("CouppleID") : $CurrentForm->getValue("x_CouppleID");
        if (!$this->CouppleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CouppleID->Visible = false; // Disable update for API request
            } else {
                $this->CouppleID->setFormValue($val);
            }
        }

        // Check field name 'MaleID' first before field var 'x_MaleID'
        $val = $CurrentForm->hasValue("MaleID") ? $CurrentForm->getValue("MaleID") : $CurrentForm->getValue("x_MaleID");
        if (!$this->MaleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MaleID->Visible = false; // Disable update for API request
            } else {
                $this->MaleID->setFormValue($val);
            }
        }

        // Check field name 'FemaleID' first before field var 'x_FemaleID'
        $val = $CurrentForm->hasValue("FemaleID") ? $CurrentForm->getValue("FemaleID") : $CurrentForm->getValue("x_FemaleID");
        if (!$this->FemaleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FemaleID->Visible = false; // Disable update for API request
            } else {
                $this->FemaleID->setFormValue($val);
            }
        }

        // Check field name 'GroupID' first before field var 'x_GroupID'
        $val = $CurrentForm->hasValue("GroupID") ? $CurrentForm->getValue("GroupID") : $CurrentForm->getValue("x_GroupID");
        if (!$this->GroupID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GroupID->Visible = false; // Disable update for API request
            } else {
                $this->GroupID->setFormValue($val);
            }
        }

        // Check field name 'Relationship' first before field var 'x_Relationship'
        $val = $CurrentForm->hasValue("Relationship") ? $CurrentForm->getValue("Relationship") : $CurrentForm->getValue("x_Relationship");
        if (!$this->Relationship->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Relationship->Visible = false; // Disable update for API request
            } else {
                $this->Relationship->setFormValue($val);
            }
        }

        // Check field name 'FacebookID' first before field var 'x_FacebookID'
        $val = $CurrentForm->hasValue("FacebookID") ? $CurrentForm->getValue("FacebookID") : $CurrentForm->getValue("x_FacebookID");
        if (!$this->FacebookID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FacebookID->Visible = false; // Disable update for API request
            } else {
                $this->FacebookID->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->title->CurrentValue = $this->title->FormValue;
        $this->first_name->CurrentValue = $this->first_name->FormValue;
        $this->middle_name->CurrentValue = $this->middle_name->FormValue;
        $this->last_name->CurrentValue = $this->last_name->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->dob->CurrentValue = $this->dob->FormValue;
        $this->dob->CurrentValue = UnFormatDateTime($this->dob->CurrentValue, 0);
        $this->Age->CurrentValue = $this->Age->FormValue;
        $this->blood_group->CurrentValue = $this->blood_group->FormValue;
        $this->mobile_no->CurrentValue = $this->mobile_no->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->IdentificationMark->CurrentValue = $this->IdentificationMark->FormValue;
        $this->Religion->CurrentValue = $this->Religion->FormValue;
        $this->Nationality->CurrentValue = $this->Nationality->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
        $this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
        $this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
        $this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
        $this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
        $this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
        $this->spouse_title->CurrentValue = $this->spouse_title->FormValue;
        $this->spouse_first_name->CurrentValue = $this->spouse_first_name->FormValue;
        $this->spouse_middle_name->CurrentValue = $this->spouse_middle_name->FormValue;
        $this->spouse_last_name->CurrentValue = $this->spouse_last_name->FormValue;
        $this->spouse_gender->CurrentValue = $this->spouse_gender->FormValue;
        $this->spouse_dob->CurrentValue = $this->spouse_dob->FormValue;
        $this->spouse_dob->CurrentValue = UnFormatDateTime($this->spouse_dob->CurrentValue, 0);
        $this->spouse_Age->CurrentValue = $this->spouse_Age->FormValue;
        $this->spouse_blood_group->CurrentValue = $this->spouse_blood_group->FormValue;
        $this->spouse_mobile_no->CurrentValue = $this->spouse_mobile_no->FormValue;
        $this->Maritalstatus->CurrentValue = $this->Maritalstatus->FormValue;
        $this->Business->CurrentValue = $this->Business->FormValue;
        $this->Patient_Language->CurrentValue = $this->Patient_Language->FormValue;
        $this->Passport->CurrentValue = $this->Passport->FormValue;
        $this->VisaNo->CurrentValue = $this->VisaNo->FormValue;
        $this->ValidityOfVisa->CurrentValue = $this->ValidityOfVisa->FormValue;
        $this->WhereDidYouHear->CurrentValue = $this->WhereDidYouHear->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->street->CurrentValue = $this->street->FormValue;
        $this->town->CurrentValue = $this->town->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->country->CurrentValue = $this->country->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->PEmail->CurrentValue = $this->PEmail->FormValue;
        $this->PEmergencyContact->CurrentValue = $this->PEmergencyContact->FormValue;
        $this->occupation->CurrentValue = $this->occupation->FormValue;
        $this->spouse_occupation->CurrentValue = $this->spouse_occupation->FormValue;
        $this->WhatsApp->CurrentValue = $this->WhatsApp->FormValue;
        $this->CouppleID->CurrentValue = $this->CouppleID->FormValue;
        $this->MaleID->CurrentValue = $this->MaleID->FormValue;
        $this->FemaleID->CurrentValue = $this->FemaleID->FormValue;
        $this->GroupID->CurrentValue = $this->GroupID->FormValue;
        $this->Relationship->CurrentValue = $this->Relationship->FormValue;
        $this->FacebookID->CurrentValue = $this->FacebookID->FormValue;
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
        $this->PatientID->setDbValue($row['PatientID']);
        $this->title->setDbValue($row['title']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->dob->setDbValue($row['dob']);
        $this->Age->setDbValue($row['Age']);
        $this->blood_group->setDbValue($row['blood_group']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->description->setDbValue($row['description']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Nationality->setDbValue($row['Nationality']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->spouse_title->setDbValue($row['spouse_title']);
        $this->spouse_first_name->setDbValue($row['spouse_first_name']);
        $this->spouse_middle_name->setDbValue($row['spouse_middle_name']);
        $this->spouse_last_name->setDbValue($row['spouse_last_name']);
        $this->spouse_gender->setDbValue($row['spouse_gender']);
        $this->spouse_dob->setDbValue($row['spouse_dob']);
        $this->spouse_Age->setDbValue($row['spouse_Age']);
        $this->spouse_blood_group->setDbValue($row['spouse_blood_group']);
        $this->spouse_mobile_no->setDbValue($row['spouse_mobile_no']);
        $this->Maritalstatus->setDbValue($row['Maritalstatus']);
        $this->Business->setDbValue($row['Business']);
        $this->Patient_Language->setDbValue($row['Patient_Language']);
        $this->Passport->setDbValue($row['Passport']);
        $this->VisaNo->setDbValue($row['VisaNo']);
        $this->ValidityOfVisa->setDbValue($row['ValidityOfVisa']);
        $this->WhereDidYouHear->setDbValue($row['WhereDidYouHear']);
        $this->HospID->setDbValue($row['HospID']);
        $this->street->setDbValue($row['street']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->country->setDbValue($row['country']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->PEmail->setDbValue($row['PEmail']);
        $this->PEmergencyContact->setDbValue($row['PEmergencyContact']);
        $this->occupation->setDbValue($row['occupation']);
        $this->spouse_occupation->setDbValue($row['spouse_occupation']);
        $this->WhatsApp->setDbValue($row['WhatsApp']);
        $this->CouppleID->setDbValue($row['CouppleID']);
        $this->MaleID->setDbValue($row['MaleID']);
        $this->FemaleID->setDbValue($row['FemaleID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->Relationship->setDbValue($row['Relationship']);
        $this->FacebookID->setDbValue($row['FacebookID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['title'] = $this->title->CurrentValue;
        $row['first_name'] = $this->first_name->CurrentValue;
        $row['middle_name'] = $this->middle_name->CurrentValue;
        $row['last_name'] = $this->last_name->CurrentValue;
        $row['gender'] = $this->gender->CurrentValue;
        $row['dob'] = $this->dob->CurrentValue;
        $row['Age'] = $this->Age->CurrentValue;
        $row['blood_group'] = $this->blood_group->CurrentValue;
        $row['mobile_no'] = $this->mobile_no->CurrentValue;
        $row['description'] = $this->description->CurrentValue;
        $row['IdentificationMark'] = $this->IdentificationMark->CurrentValue;
        $row['Religion'] = $this->Religion->CurrentValue;
        $row['Nationality'] = $this->Nationality->CurrentValue;
        $row['profilePic'] = $this->profilePic->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['ReferedByDr'] = $this->ReferedByDr->CurrentValue;
        $row['ReferClinicname'] = $this->ReferClinicname->CurrentValue;
        $row['ReferCity'] = $this->ReferCity->CurrentValue;
        $row['ReferMobileNo'] = $this->ReferMobileNo->CurrentValue;
        $row['ReferA4TreatingConsultant'] = $this->ReferA4TreatingConsultant->CurrentValue;
        $row['PurposreReferredfor'] = $this->PurposreReferredfor->CurrentValue;
        $row['spouse_title'] = $this->spouse_title->CurrentValue;
        $row['spouse_first_name'] = $this->spouse_first_name->CurrentValue;
        $row['spouse_middle_name'] = $this->spouse_middle_name->CurrentValue;
        $row['spouse_last_name'] = $this->spouse_last_name->CurrentValue;
        $row['spouse_gender'] = $this->spouse_gender->CurrentValue;
        $row['spouse_dob'] = $this->spouse_dob->CurrentValue;
        $row['spouse_Age'] = $this->spouse_Age->CurrentValue;
        $row['spouse_blood_group'] = $this->spouse_blood_group->CurrentValue;
        $row['spouse_mobile_no'] = $this->spouse_mobile_no->CurrentValue;
        $row['Maritalstatus'] = $this->Maritalstatus->CurrentValue;
        $row['Business'] = $this->Business->CurrentValue;
        $row['Patient_Language'] = $this->Patient_Language->CurrentValue;
        $row['Passport'] = $this->Passport->CurrentValue;
        $row['VisaNo'] = $this->VisaNo->CurrentValue;
        $row['ValidityOfVisa'] = $this->ValidityOfVisa->CurrentValue;
        $row['WhereDidYouHear'] = $this->WhereDidYouHear->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['street'] = $this->street->CurrentValue;
        $row['town'] = $this->town->CurrentValue;
        $row['province'] = $this->province->CurrentValue;
        $row['country'] = $this->country->CurrentValue;
        $row['postal_code'] = $this->postal_code->CurrentValue;
        $row['PEmail'] = $this->PEmail->CurrentValue;
        $row['PEmergencyContact'] = $this->PEmergencyContact->CurrentValue;
        $row['occupation'] = $this->occupation->CurrentValue;
        $row['spouse_occupation'] = $this->spouse_occupation->CurrentValue;
        $row['WhatsApp'] = $this->WhatsApp->CurrentValue;
        $row['CouppleID'] = $this->CouppleID->CurrentValue;
        $row['MaleID'] = $this->MaleID->CurrentValue;
        $row['FemaleID'] = $this->FemaleID->CurrentValue;
        $row['GroupID'] = $this->GroupID->CurrentValue;
        $row['Relationship'] = $this->Relationship->CurrentValue;
        $row['FacebookID'] = $this->FacebookID->CurrentValue;
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
        if (strval($this->getKey("PatientID")) != "") {
            $this->PatientID->OldValue = $this->getKey("PatientID"); // PatientID
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

        // PatientID

        // title

        // first_name

        // middle_name

        // last_name

        // gender

        // dob

        // Age

        // blood_group

        // mobile_no

        // description

        // IdentificationMark

        // Religion

        // Nationality

        // profilePic

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // spouse_title

        // spouse_first_name

        // spouse_middle_name

        // spouse_last_name

        // spouse_gender

        // spouse_dob

        // spouse_Age

        // spouse_blood_group

        // spouse_mobile_no

        // Maritalstatus

        // Business

        // Patient_Language

        // Passport

        // VisaNo

        // ValidityOfVisa

        // WhereDidYouHear

        // HospID

        // street

        // town

        // province

        // country

        // postal_code

        // PEmail

        // PEmergencyContact

        // occupation

        // spouse_occupation

        // WhatsApp

        // CouppleID

        // MaleID

        // FemaleID

        // GroupID

        // Relationship

        // FacebookID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // title
            $this->title->ViewValue = $this->title->CurrentValue;
            $this->title->ViewValue = FormatNumber($this->title->ViewValue, 0, -2, -2, -2);
            $this->title->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // dob
            $this->dob->ViewValue = $this->dob->CurrentValue;
            $this->dob->ViewValue = FormatDateTime($this->dob->ViewValue, 0);
            $this->dob->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // blood_group
            $this->blood_group->ViewValue = $this->blood_group->CurrentValue;
            $this->blood_group->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Nationality
            $this->Nationality->ViewValue = $this->Nationality->CurrentValue;
            $this->Nationality->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

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

            // ReferedByDr
            $this->ReferedByDr->ViewValue = $this->ReferedByDr->CurrentValue;
            $this->ReferedByDr->ViewCustomAttributes = "";

            // ReferClinicname
            $this->ReferClinicname->ViewValue = $this->ReferClinicname->CurrentValue;
            $this->ReferClinicname->ViewCustomAttributes = "";

            // ReferCity
            $this->ReferCity->ViewValue = $this->ReferCity->CurrentValue;
            $this->ReferCity->ViewCustomAttributes = "";

            // ReferMobileNo
            $this->ReferMobileNo->ViewValue = $this->ReferMobileNo->CurrentValue;
            $this->ReferMobileNo->ViewCustomAttributes = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->ViewValue = $this->ReferA4TreatingConsultant->CurrentValue;
            $this->ReferA4TreatingConsultant->ViewCustomAttributes = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->ViewValue = $this->PurposreReferredfor->CurrentValue;
            $this->PurposreReferredfor->ViewCustomAttributes = "";

            // spouse_title
            $this->spouse_title->ViewValue = $this->spouse_title->CurrentValue;
            $this->spouse_title->ViewCustomAttributes = "";

            // spouse_first_name
            $this->spouse_first_name->ViewValue = $this->spouse_first_name->CurrentValue;
            $this->spouse_first_name->ViewCustomAttributes = "";

            // spouse_middle_name
            $this->spouse_middle_name->ViewValue = $this->spouse_middle_name->CurrentValue;
            $this->spouse_middle_name->ViewCustomAttributes = "";

            // spouse_last_name
            $this->spouse_last_name->ViewValue = $this->spouse_last_name->CurrentValue;
            $this->spouse_last_name->ViewCustomAttributes = "";

            // spouse_gender
            $this->spouse_gender->ViewValue = $this->spouse_gender->CurrentValue;
            $this->spouse_gender->ViewCustomAttributes = "";

            // spouse_dob
            $this->spouse_dob->ViewValue = $this->spouse_dob->CurrentValue;
            $this->spouse_dob->ViewValue = FormatDateTime($this->spouse_dob->ViewValue, 0);
            $this->spouse_dob->ViewCustomAttributes = "";

            // spouse_Age
            $this->spouse_Age->ViewValue = $this->spouse_Age->CurrentValue;
            $this->spouse_Age->ViewCustomAttributes = "";

            // spouse_blood_group
            $this->spouse_blood_group->ViewValue = $this->spouse_blood_group->CurrentValue;
            $this->spouse_blood_group->ViewCustomAttributes = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->ViewValue = $this->spouse_mobile_no->CurrentValue;
            $this->spouse_mobile_no->ViewCustomAttributes = "";

            // Maritalstatus
            $this->Maritalstatus->ViewValue = $this->Maritalstatus->CurrentValue;
            $this->Maritalstatus->ViewCustomAttributes = "";

            // Business
            $this->Business->ViewValue = $this->Business->CurrentValue;
            $this->Business->ViewCustomAttributes = "";

            // Patient_Language
            $this->Patient_Language->ViewValue = $this->Patient_Language->CurrentValue;
            $this->Patient_Language->ViewCustomAttributes = "";

            // Passport
            $this->Passport->ViewValue = $this->Passport->CurrentValue;
            $this->Passport->ViewCustomAttributes = "";

            // VisaNo
            $this->VisaNo->ViewValue = $this->VisaNo->CurrentValue;
            $this->VisaNo->ViewCustomAttributes = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->ViewValue = $this->ValidityOfVisa->CurrentValue;
            $this->ValidityOfVisa->ViewCustomAttributes = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->ViewValue = $this->WhereDidYouHear->CurrentValue;
            $this->WhereDidYouHear->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // PEmail
            $this->PEmail->ViewValue = $this->PEmail->CurrentValue;
            $this->PEmail->ViewCustomAttributes = "";

            // PEmergencyContact
            $this->PEmergencyContact->ViewValue = $this->PEmergencyContact->CurrentValue;
            $this->PEmergencyContact->ViewCustomAttributes = "";

            // occupation
            $this->occupation->ViewValue = $this->occupation->CurrentValue;
            $this->occupation->ViewCustomAttributes = "";

            // spouse_occupation
            $this->spouse_occupation->ViewValue = $this->spouse_occupation->CurrentValue;
            $this->spouse_occupation->ViewCustomAttributes = "";

            // WhatsApp
            $this->WhatsApp->ViewValue = $this->WhatsApp->CurrentValue;
            $this->WhatsApp->ViewCustomAttributes = "";

            // CouppleID
            $this->CouppleID->ViewValue = $this->CouppleID->CurrentValue;
            $this->CouppleID->ViewValue = FormatNumber($this->CouppleID->ViewValue, 0, -2, -2, -2);
            $this->CouppleID->ViewCustomAttributes = "";

            // MaleID
            $this->MaleID->ViewValue = $this->MaleID->CurrentValue;
            $this->MaleID->ViewValue = FormatNumber($this->MaleID->ViewValue, 0, -2, -2, -2);
            $this->MaleID->ViewCustomAttributes = "";

            // FemaleID
            $this->FemaleID->ViewValue = $this->FemaleID->CurrentValue;
            $this->FemaleID->ViewValue = FormatNumber($this->FemaleID->ViewValue, 0, -2, -2, -2);
            $this->FemaleID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // Relationship
            $this->Relationship->ViewValue = $this->Relationship->CurrentValue;
            $this->Relationship->ViewCustomAttributes = "";

            // FacebookID
            $this->FacebookID->ViewValue = $this->FacebookID->CurrentValue;
            $this->FacebookID->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";
            $this->dob->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";
            $this->blood_group->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";
            $this->Nationality->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

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

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";
            $this->ReferedByDr->TooltipValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";
            $this->ReferClinicname->TooltipValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";
            $this->ReferCity->TooltipValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";
            $this->ReferMobileNo->TooltipValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";
            $this->ReferA4TreatingConsultant->TooltipValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";
            $this->PurposreReferredfor->TooltipValue = "";

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";
            $this->spouse_title->TooltipValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";
            $this->spouse_first_name->TooltipValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";
            $this->spouse_middle_name->TooltipValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";
            $this->spouse_last_name->TooltipValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";
            $this->spouse_gender->TooltipValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";
            $this->spouse_dob->TooltipValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";
            $this->spouse_Age->TooltipValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";
            $this->spouse_blood_group->TooltipValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";
            $this->spouse_mobile_no->TooltipValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";
            $this->Maritalstatus->TooltipValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";
            $this->Business->TooltipValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";
            $this->Patient_Language->TooltipValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";
            $this->Passport->TooltipValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";
            $this->VisaNo->TooltipValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";
            $this->ValidityOfVisa->TooltipValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";
            $this->WhereDidYouHear->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";
            $this->PEmail->TooltipValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";
            $this->PEmergencyContact->TooltipValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";
            $this->occupation->TooltipValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";
            $this->spouse_occupation->TooltipValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";
            $this->WhatsApp->TooltipValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";
            $this->CouppleID->TooltipValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";
            $this->MaleID->TooltipValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";
            $this->FemaleID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";
            $this->Relationship->TooltipValue = "";

            // FacebookID
            $this->FacebookID->LinkCustomAttributes = "";
            $this->FacebookID->HrefValue = "";
            $this->FacebookID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->CurrentValue = HtmlDecode($this->PatientID->CurrentValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->CurrentValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // title
            $this->title->EditAttrs["class"] = "form-control";
            $this->title->EditCustomAttributes = "";
            $this->title->EditValue = HtmlEncode($this->title->CurrentValue);
            $this->title->PlaceHolder = RemoveHtml($this->title->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // middle_name
            $this->middle_name->EditAttrs["class"] = "form-control";
            $this->middle_name->EditCustomAttributes = "";
            if (!$this->middle_name->Raw) {
                $this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
            }
            $this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
            $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // dob
            $this->dob->EditAttrs["class"] = "form-control";
            $this->dob->EditCustomAttributes = "";
            $this->dob->EditValue = HtmlEncode(FormatDateTime($this->dob->CurrentValue, 8));
            $this->dob->PlaceHolder = RemoveHtml($this->dob->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->CurrentValue = HtmlDecode($this->Age->CurrentValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->CurrentValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // blood_group
            $this->blood_group->EditAttrs["class"] = "form-control";
            $this->blood_group->EditCustomAttributes = "";
            if (!$this->blood_group->Raw) {
                $this->blood_group->CurrentValue = HtmlDecode($this->blood_group->CurrentValue);
            }
            $this->blood_group->EditValue = HtmlEncode($this->blood_group->CurrentValue);
            $this->blood_group->PlaceHolder = RemoveHtml($this->blood_group->caption());

            // mobile_no
            $this->mobile_no->EditAttrs["class"] = "form-control";
            $this->mobile_no->EditCustomAttributes = "";
            if (!$this->mobile_no->Raw) {
                $this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
            }
            $this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
            $this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // IdentificationMark
            $this->IdentificationMark->EditAttrs["class"] = "form-control";
            $this->IdentificationMark->EditCustomAttributes = "";
            if (!$this->IdentificationMark->Raw) {
                $this->IdentificationMark->CurrentValue = HtmlDecode($this->IdentificationMark->CurrentValue);
            }
            $this->IdentificationMark->EditValue = HtmlEncode($this->IdentificationMark->CurrentValue);
            $this->IdentificationMark->PlaceHolder = RemoveHtml($this->IdentificationMark->caption());

            // Religion
            $this->Religion->EditAttrs["class"] = "form-control";
            $this->Religion->EditCustomAttributes = "";
            if (!$this->Religion->Raw) {
                $this->Religion->CurrentValue = HtmlDecode($this->Religion->CurrentValue);
            }
            $this->Religion->EditValue = HtmlEncode($this->Religion->CurrentValue);
            $this->Religion->PlaceHolder = RemoveHtml($this->Religion->caption());

            // Nationality
            $this->Nationality->EditAttrs["class"] = "form-control";
            $this->Nationality->EditCustomAttributes = "";
            if (!$this->Nationality->Raw) {
                $this->Nationality->CurrentValue = HtmlDecode($this->Nationality->CurrentValue);
            }
            $this->Nationality->EditValue = HtmlEncode($this->Nationality->CurrentValue);
            $this->Nationality->PlaceHolder = RemoveHtml($this->Nationality->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            if (!$this->profilePic->Raw) {
                $this->profilePic->CurrentValue = HtmlDecode($this->profilePic->CurrentValue);
            }
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

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

            // ReferedByDr
            $this->ReferedByDr->EditAttrs["class"] = "form-control";
            $this->ReferedByDr->EditCustomAttributes = "";
            if (!$this->ReferedByDr->Raw) {
                $this->ReferedByDr->CurrentValue = HtmlDecode($this->ReferedByDr->CurrentValue);
            }
            $this->ReferedByDr->EditValue = HtmlEncode($this->ReferedByDr->CurrentValue);
            $this->ReferedByDr->PlaceHolder = RemoveHtml($this->ReferedByDr->caption());

            // ReferClinicname
            $this->ReferClinicname->EditAttrs["class"] = "form-control";
            $this->ReferClinicname->EditCustomAttributes = "";
            if (!$this->ReferClinicname->Raw) {
                $this->ReferClinicname->CurrentValue = HtmlDecode($this->ReferClinicname->CurrentValue);
            }
            $this->ReferClinicname->EditValue = HtmlEncode($this->ReferClinicname->CurrentValue);
            $this->ReferClinicname->PlaceHolder = RemoveHtml($this->ReferClinicname->caption());

            // ReferCity
            $this->ReferCity->EditAttrs["class"] = "form-control";
            $this->ReferCity->EditCustomAttributes = "";
            if (!$this->ReferCity->Raw) {
                $this->ReferCity->CurrentValue = HtmlDecode($this->ReferCity->CurrentValue);
            }
            $this->ReferCity->EditValue = HtmlEncode($this->ReferCity->CurrentValue);
            $this->ReferCity->PlaceHolder = RemoveHtml($this->ReferCity->caption());

            // ReferMobileNo
            $this->ReferMobileNo->EditAttrs["class"] = "form-control";
            $this->ReferMobileNo->EditCustomAttributes = "";
            if (!$this->ReferMobileNo->Raw) {
                $this->ReferMobileNo->CurrentValue = HtmlDecode($this->ReferMobileNo->CurrentValue);
            }
            $this->ReferMobileNo->EditValue = HtmlEncode($this->ReferMobileNo->CurrentValue);
            $this->ReferMobileNo->PlaceHolder = RemoveHtml($this->ReferMobileNo->caption());

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->EditAttrs["class"] = "form-control";
            $this->ReferA4TreatingConsultant->EditCustomAttributes = "";
            if (!$this->ReferA4TreatingConsultant->Raw) {
                $this->ReferA4TreatingConsultant->CurrentValue = HtmlDecode($this->ReferA4TreatingConsultant->CurrentValue);
            }
            $this->ReferA4TreatingConsultant->EditValue = HtmlEncode($this->ReferA4TreatingConsultant->CurrentValue);
            $this->ReferA4TreatingConsultant->PlaceHolder = RemoveHtml($this->ReferA4TreatingConsultant->caption());

            // PurposreReferredfor
            $this->PurposreReferredfor->EditAttrs["class"] = "form-control";
            $this->PurposreReferredfor->EditCustomAttributes = "";
            if (!$this->PurposreReferredfor->Raw) {
                $this->PurposreReferredfor->CurrentValue = HtmlDecode($this->PurposreReferredfor->CurrentValue);
            }
            $this->PurposreReferredfor->EditValue = HtmlEncode($this->PurposreReferredfor->CurrentValue);
            $this->PurposreReferredfor->PlaceHolder = RemoveHtml($this->PurposreReferredfor->caption());

            // spouse_title
            $this->spouse_title->EditAttrs["class"] = "form-control";
            $this->spouse_title->EditCustomAttributes = "";
            if (!$this->spouse_title->Raw) {
                $this->spouse_title->CurrentValue = HtmlDecode($this->spouse_title->CurrentValue);
            }
            $this->spouse_title->EditValue = HtmlEncode($this->spouse_title->CurrentValue);
            $this->spouse_title->PlaceHolder = RemoveHtml($this->spouse_title->caption());

            // spouse_first_name
            $this->spouse_first_name->EditAttrs["class"] = "form-control";
            $this->spouse_first_name->EditCustomAttributes = "";
            if (!$this->spouse_first_name->Raw) {
                $this->spouse_first_name->CurrentValue = HtmlDecode($this->spouse_first_name->CurrentValue);
            }
            $this->spouse_first_name->EditValue = HtmlEncode($this->spouse_first_name->CurrentValue);
            $this->spouse_first_name->PlaceHolder = RemoveHtml($this->spouse_first_name->caption());

            // spouse_middle_name
            $this->spouse_middle_name->EditAttrs["class"] = "form-control";
            $this->spouse_middle_name->EditCustomAttributes = "";
            if (!$this->spouse_middle_name->Raw) {
                $this->spouse_middle_name->CurrentValue = HtmlDecode($this->spouse_middle_name->CurrentValue);
            }
            $this->spouse_middle_name->EditValue = HtmlEncode($this->spouse_middle_name->CurrentValue);
            $this->spouse_middle_name->PlaceHolder = RemoveHtml($this->spouse_middle_name->caption());

            // spouse_last_name
            $this->spouse_last_name->EditAttrs["class"] = "form-control";
            $this->spouse_last_name->EditCustomAttributes = "";
            if (!$this->spouse_last_name->Raw) {
                $this->spouse_last_name->CurrentValue = HtmlDecode($this->spouse_last_name->CurrentValue);
            }
            $this->spouse_last_name->EditValue = HtmlEncode($this->spouse_last_name->CurrentValue);
            $this->spouse_last_name->PlaceHolder = RemoveHtml($this->spouse_last_name->caption());

            // spouse_gender
            $this->spouse_gender->EditAttrs["class"] = "form-control";
            $this->spouse_gender->EditCustomAttributes = "";
            if (!$this->spouse_gender->Raw) {
                $this->spouse_gender->CurrentValue = HtmlDecode($this->spouse_gender->CurrentValue);
            }
            $this->spouse_gender->EditValue = HtmlEncode($this->spouse_gender->CurrentValue);
            $this->spouse_gender->PlaceHolder = RemoveHtml($this->spouse_gender->caption());

            // spouse_dob
            $this->spouse_dob->EditAttrs["class"] = "form-control";
            $this->spouse_dob->EditCustomAttributes = "";
            $this->spouse_dob->EditValue = HtmlEncode(FormatDateTime($this->spouse_dob->CurrentValue, 8));
            $this->spouse_dob->PlaceHolder = RemoveHtml($this->spouse_dob->caption());

            // spouse_Age
            $this->spouse_Age->EditAttrs["class"] = "form-control";
            $this->spouse_Age->EditCustomAttributes = "";
            if (!$this->spouse_Age->Raw) {
                $this->spouse_Age->CurrentValue = HtmlDecode($this->spouse_Age->CurrentValue);
            }
            $this->spouse_Age->EditValue = HtmlEncode($this->spouse_Age->CurrentValue);
            $this->spouse_Age->PlaceHolder = RemoveHtml($this->spouse_Age->caption());

            // spouse_blood_group
            $this->spouse_blood_group->EditAttrs["class"] = "form-control";
            $this->spouse_blood_group->EditCustomAttributes = "";
            if (!$this->spouse_blood_group->Raw) {
                $this->spouse_blood_group->CurrentValue = HtmlDecode($this->spouse_blood_group->CurrentValue);
            }
            $this->spouse_blood_group->EditValue = HtmlEncode($this->spouse_blood_group->CurrentValue);
            $this->spouse_blood_group->PlaceHolder = RemoveHtml($this->spouse_blood_group->caption());

            // spouse_mobile_no
            $this->spouse_mobile_no->EditAttrs["class"] = "form-control";
            $this->spouse_mobile_no->EditCustomAttributes = "";
            if (!$this->spouse_mobile_no->Raw) {
                $this->spouse_mobile_no->CurrentValue = HtmlDecode($this->spouse_mobile_no->CurrentValue);
            }
            $this->spouse_mobile_no->EditValue = HtmlEncode($this->spouse_mobile_no->CurrentValue);
            $this->spouse_mobile_no->PlaceHolder = RemoveHtml($this->spouse_mobile_no->caption());

            // Maritalstatus
            $this->Maritalstatus->EditAttrs["class"] = "form-control";
            $this->Maritalstatus->EditCustomAttributes = "";
            if (!$this->Maritalstatus->Raw) {
                $this->Maritalstatus->CurrentValue = HtmlDecode($this->Maritalstatus->CurrentValue);
            }
            $this->Maritalstatus->EditValue = HtmlEncode($this->Maritalstatus->CurrentValue);
            $this->Maritalstatus->PlaceHolder = RemoveHtml($this->Maritalstatus->caption());

            // Business
            $this->Business->EditAttrs["class"] = "form-control";
            $this->Business->EditCustomAttributes = "";
            if (!$this->Business->Raw) {
                $this->Business->CurrentValue = HtmlDecode($this->Business->CurrentValue);
            }
            $this->Business->EditValue = HtmlEncode($this->Business->CurrentValue);
            $this->Business->PlaceHolder = RemoveHtml($this->Business->caption());

            // Patient_Language
            $this->Patient_Language->EditAttrs["class"] = "form-control";
            $this->Patient_Language->EditCustomAttributes = "";
            if (!$this->Patient_Language->Raw) {
                $this->Patient_Language->CurrentValue = HtmlDecode($this->Patient_Language->CurrentValue);
            }
            $this->Patient_Language->EditValue = HtmlEncode($this->Patient_Language->CurrentValue);
            $this->Patient_Language->PlaceHolder = RemoveHtml($this->Patient_Language->caption());

            // Passport
            $this->Passport->EditAttrs["class"] = "form-control";
            $this->Passport->EditCustomAttributes = "";
            if (!$this->Passport->Raw) {
                $this->Passport->CurrentValue = HtmlDecode($this->Passport->CurrentValue);
            }
            $this->Passport->EditValue = HtmlEncode($this->Passport->CurrentValue);
            $this->Passport->PlaceHolder = RemoveHtml($this->Passport->caption());

            // VisaNo
            $this->VisaNo->EditAttrs["class"] = "form-control";
            $this->VisaNo->EditCustomAttributes = "";
            if (!$this->VisaNo->Raw) {
                $this->VisaNo->CurrentValue = HtmlDecode($this->VisaNo->CurrentValue);
            }
            $this->VisaNo->EditValue = HtmlEncode($this->VisaNo->CurrentValue);
            $this->VisaNo->PlaceHolder = RemoveHtml($this->VisaNo->caption());

            // ValidityOfVisa
            $this->ValidityOfVisa->EditAttrs["class"] = "form-control";
            $this->ValidityOfVisa->EditCustomAttributes = "";
            if (!$this->ValidityOfVisa->Raw) {
                $this->ValidityOfVisa->CurrentValue = HtmlDecode($this->ValidityOfVisa->CurrentValue);
            }
            $this->ValidityOfVisa->EditValue = HtmlEncode($this->ValidityOfVisa->CurrentValue);
            $this->ValidityOfVisa->PlaceHolder = RemoveHtml($this->ValidityOfVisa->caption());

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
            if (!$this->HospID->Raw) {
                $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
            }
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // street
            $this->street->EditAttrs["class"] = "form-control";
            $this->street->EditCustomAttributes = "";
            if (!$this->street->Raw) {
                $this->street->CurrentValue = HtmlDecode($this->street->CurrentValue);
            }
            $this->street->EditValue = HtmlEncode($this->street->CurrentValue);
            $this->street->PlaceHolder = RemoveHtml($this->street->caption());

            // town
            $this->town->EditAttrs["class"] = "form-control";
            $this->town->EditCustomAttributes = "";
            if (!$this->town->Raw) {
                $this->town->CurrentValue = HtmlDecode($this->town->CurrentValue);
            }
            $this->town->EditValue = HtmlEncode($this->town->CurrentValue);
            $this->town->PlaceHolder = RemoveHtml($this->town->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            if (!$this->province->Raw) {
                $this->province->CurrentValue = HtmlDecode($this->province->CurrentValue);
            }
            $this->province->EditValue = HtmlEncode($this->province->CurrentValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->CurrentValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // PEmail
            $this->PEmail->EditAttrs["class"] = "form-control";
            $this->PEmail->EditCustomAttributes = "";
            if (!$this->PEmail->Raw) {
                $this->PEmail->CurrentValue = HtmlDecode($this->PEmail->CurrentValue);
            }
            $this->PEmail->EditValue = HtmlEncode($this->PEmail->CurrentValue);
            $this->PEmail->PlaceHolder = RemoveHtml($this->PEmail->caption());

            // PEmergencyContact
            $this->PEmergencyContact->EditAttrs["class"] = "form-control";
            $this->PEmergencyContact->EditCustomAttributes = "";
            if (!$this->PEmergencyContact->Raw) {
                $this->PEmergencyContact->CurrentValue = HtmlDecode($this->PEmergencyContact->CurrentValue);
            }
            $this->PEmergencyContact->EditValue = HtmlEncode($this->PEmergencyContact->CurrentValue);
            $this->PEmergencyContact->PlaceHolder = RemoveHtml($this->PEmergencyContact->caption());

            // occupation
            $this->occupation->EditAttrs["class"] = "form-control";
            $this->occupation->EditCustomAttributes = "";
            if (!$this->occupation->Raw) {
                $this->occupation->CurrentValue = HtmlDecode($this->occupation->CurrentValue);
            }
            $this->occupation->EditValue = HtmlEncode($this->occupation->CurrentValue);
            $this->occupation->PlaceHolder = RemoveHtml($this->occupation->caption());

            // spouse_occupation
            $this->spouse_occupation->EditAttrs["class"] = "form-control";
            $this->spouse_occupation->EditCustomAttributes = "";
            if (!$this->spouse_occupation->Raw) {
                $this->spouse_occupation->CurrentValue = HtmlDecode($this->spouse_occupation->CurrentValue);
            }
            $this->spouse_occupation->EditValue = HtmlEncode($this->spouse_occupation->CurrentValue);
            $this->spouse_occupation->PlaceHolder = RemoveHtml($this->spouse_occupation->caption());

            // WhatsApp
            $this->WhatsApp->EditAttrs["class"] = "form-control";
            $this->WhatsApp->EditCustomAttributes = "";
            if (!$this->WhatsApp->Raw) {
                $this->WhatsApp->CurrentValue = HtmlDecode($this->WhatsApp->CurrentValue);
            }
            $this->WhatsApp->EditValue = HtmlEncode($this->WhatsApp->CurrentValue);
            $this->WhatsApp->PlaceHolder = RemoveHtml($this->WhatsApp->caption());

            // CouppleID
            $this->CouppleID->EditAttrs["class"] = "form-control";
            $this->CouppleID->EditCustomAttributes = "";
            $this->CouppleID->EditValue = HtmlEncode($this->CouppleID->CurrentValue);
            $this->CouppleID->PlaceHolder = RemoveHtml($this->CouppleID->caption());

            // MaleID
            $this->MaleID->EditAttrs["class"] = "form-control";
            $this->MaleID->EditCustomAttributes = "";
            $this->MaleID->EditValue = HtmlEncode($this->MaleID->CurrentValue);
            $this->MaleID->PlaceHolder = RemoveHtml($this->MaleID->caption());

            // FemaleID
            $this->FemaleID->EditAttrs["class"] = "form-control";
            $this->FemaleID->EditCustomAttributes = "";
            $this->FemaleID->EditValue = HtmlEncode($this->FemaleID->CurrentValue);
            $this->FemaleID->PlaceHolder = RemoveHtml($this->FemaleID->caption());

            // GroupID
            $this->GroupID->EditAttrs["class"] = "form-control";
            $this->GroupID->EditCustomAttributes = "";
            $this->GroupID->EditValue = HtmlEncode($this->GroupID->CurrentValue);
            $this->GroupID->PlaceHolder = RemoveHtml($this->GroupID->caption());

            // Relationship
            $this->Relationship->EditAttrs["class"] = "form-control";
            $this->Relationship->EditCustomAttributes = "";
            if (!$this->Relationship->Raw) {
                $this->Relationship->CurrentValue = HtmlDecode($this->Relationship->CurrentValue);
            }
            $this->Relationship->EditValue = HtmlEncode($this->Relationship->CurrentValue);
            $this->Relationship->PlaceHolder = RemoveHtml($this->Relationship->caption());

            // FacebookID
            $this->FacebookID->EditAttrs["class"] = "form-control";
            $this->FacebookID->EditCustomAttributes = "";
            if (!$this->FacebookID->Raw) {
                $this->FacebookID->CurrentValue = HtmlDecode($this->FacebookID->CurrentValue);
            }
            $this->FacebookID->EditValue = HtmlEncode($this->FacebookID->CurrentValue);
            $this->FacebookID->PlaceHolder = RemoveHtml($this->FacebookID->caption());

            // Add refer script

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // dob
            $this->dob->LinkCustomAttributes = "";
            $this->dob->HrefValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";

            // blood_group
            $this->blood_group->LinkCustomAttributes = "";
            $this->blood_group->HrefValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";

            // Nationality
            $this->Nationality->LinkCustomAttributes = "";
            $this->Nationality->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

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

            // ReferedByDr
            $this->ReferedByDr->LinkCustomAttributes = "";
            $this->ReferedByDr->HrefValue = "";

            // ReferClinicname
            $this->ReferClinicname->LinkCustomAttributes = "";
            $this->ReferClinicname->HrefValue = "";

            // ReferCity
            $this->ReferCity->LinkCustomAttributes = "";
            $this->ReferCity->HrefValue = "";

            // ReferMobileNo
            $this->ReferMobileNo->LinkCustomAttributes = "";
            $this->ReferMobileNo->HrefValue = "";

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->LinkCustomAttributes = "";
            $this->ReferA4TreatingConsultant->HrefValue = "";

            // PurposreReferredfor
            $this->PurposreReferredfor->LinkCustomAttributes = "";
            $this->PurposreReferredfor->HrefValue = "";

            // spouse_title
            $this->spouse_title->LinkCustomAttributes = "";
            $this->spouse_title->HrefValue = "";

            // spouse_first_name
            $this->spouse_first_name->LinkCustomAttributes = "";
            $this->spouse_first_name->HrefValue = "";

            // spouse_middle_name
            $this->spouse_middle_name->LinkCustomAttributes = "";
            $this->spouse_middle_name->HrefValue = "";

            // spouse_last_name
            $this->spouse_last_name->LinkCustomAttributes = "";
            $this->spouse_last_name->HrefValue = "";

            // spouse_gender
            $this->spouse_gender->LinkCustomAttributes = "";
            $this->spouse_gender->HrefValue = "";

            // spouse_dob
            $this->spouse_dob->LinkCustomAttributes = "";
            $this->spouse_dob->HrefValue = "";

            // spouse_Age
            $this->spouse_Age->LinkCustomAttributes = "";
            $this->spouse_Age->HrefValue = "";

            // spouse_blood_group
            $this->spouse_blood_group->LinkCustomAttributes = "";
            $this->spouse_blood_group->HrefValue = "";

            // spouse_mobile_no
            $this->spouse_mobile_no->LinkCustomAttributes = "";
            $this->spouse_mobile_no->HrefValue = "";

            // Maritalstatus
            $this->Maritalstatus->LinkCustomAttributes = "";
            $this->Maritalstatus->HrefValue = "";

            // Business
            $this->Business->LinkCustomAttributes = "";
            $this->Business->HrefValue = "";

            // Patient_Language
            $this->Patient_Language->LinkCustomAttributes = "";
            $this->Patient_Language->HrefValue = "";

            // Passport
            $this->Passport->LinkCustomAttributes = "";
            $this->Passport->HrefValue = "";

            // VisaNo
            $this->VisaNo->LinkCustomAttributes = "";
            $this->VisaNo->HrefValue = "";

            // ValidityOfVisa
            $this->ValidityOfVisa->LinkCustomAttributes = "";
            $this->ValidityOfVisa->HrefValue = "";

            // WhereDidYouHear
            $this->WhereDidYouHear->LinkCustomAttributes = "";
            $this->WhereDidYouHear->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // PEmail
            $this->PEmail->LinkCustomAttributes = "";
            $this->PEmail->HrefValue = "";

            // PEmergencyContact
            $this->PEmergencyContact->LinkCustomAttributes = "";
            $this->PEmergencyContact->HrefValue = "";

            // occupation
            $this->occupation->LinkCustomAttributes = "";
            $this->occupation->HrefValue = "";

            // spouse_occupation
            $this->spouse_occupation->LinkCustomAttributes = "";
            $this->spouse_occupation->HrefValue = "";

            // WhatsApp
            $this->WhatsApp->LinkCustomAttributes = "";
            $this->WhatsApp->HrefValue = "";

            // CouppleID
            $this->CouppleID->LinkCustomAttributes = "";
            $this->CouppleID->HrefValue = "";

            // MaleID
            $this->MaleID->LinkCustomAttributes = "";
            $this->MaleID->HrefValue = "";

            // FemaleID
            $this->FemaleID->LinkCustomAttributes = "";
            $this->FemaleID->HrefValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";

            // Relationship
            $this->Relationship->LinkCustomAttributes = "";
            $this->Relationship->HrefValue = "";

            // FacebookID
            $this->FacebookID->LinkCustomAttributes = "";
            $this->FacebookID->HrefValue = "";
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
        if ($this->PatientID->Required) {
            if (!$this->PatientID->IsDetailKey && EmptyValue($this->PatientID->FormValue)) {
                $this->PatientID->addErrorMessage(str_replace("%s", $this->PatientID->caption(), $this->PatientID->RequiredErrorMessage));
            }
        }
        if ($this->title->Required) {
            if (!$this->title->IsDetailKey && EmptyValue($this->title->FormValue)) {
                $this->title->addErrorMessage(str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->title->FormValue)) {
            $this->title->addErrorMessage($this->title->getErrorMessage(false));
        }
        if ($this->first_name->Required) {
            if (!$this->first_name->IsDetailKey && EmptyValue($this->first_name->FormValue)) {
                $this->first_name->addErrorMessage(str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
            }
        }
        if ($this->middle_name->Required) {
            if (!$this->middle_name->IsDetailKey && EmptyValue($this->middle_name->FormValue)) {
                $this->middle_name->addErrorMessage(str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
            }
        }
        if ($this->last_name->Required) {
            if (!$this->last_name->IsDetailKey && EmptyValue($this->last_name->FormValue)) {
                $this->last_name->addErrorMessage(str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->dob->Required) {
            if (!$this->dob->IsDetailKey && EmptyValue($this->dob->FormValue)) {
                $this->dob->addErrorMessage(str_replace("%s", $this->dob->caption(), $this->dob->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->dob->FormValue)) {
            $this->dob->addErrorMessage($this->dob->getErrorMessage(false));
        }
        if ($this->Age->Required) {
            if (!$this->Age->IsDetailKey && EmptyValue($this->Age->FormValue)) {
                $this->Age->addErrorMessage(str_replace("%s", $this->Age->caption(), $this->Age->RequiredErrorMessage));
            }
        }
        if ($this->blood_group->Required) {
            if (!$this->blood_group->IsDetailKey && EmptyValue($this->blood_group->FormValue)) {
                $this->blood_group->addErrorMessage(str_replace("%s", $this->blood_group->caption(), $this->blood_group->RequiredErrorMessage));
            }
        }
        if ($this->mobile_no->Required) {
            if (!$this->mobile_no->IsDetailKey && EmptyValue($this->mobile_no->FormValue)) {
                $this->mobile_no->addErrorMessage(str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
            }
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->IdentificationMark->Required) {
            if (!$this->IdentificationMark->IsDetailKey && EmptyValue($this->IdentificationMark->FormValue)) {
                $this->IdentificationMark->addErrorMessage(str_replace("%s", $this->IdentificationMark->caption(), $this->IdentificationMark->RequiredErrorMessage));
            }
        }
        if ($this->Religion->Required) {
            if (!$this->Religion->IsDetailKey && EmptyValue($this->Religion->FormValue)) {
                $this->Religion->addErrorMessage(str_replace("%s", $this->Religion->caption(), $this->Religion->RequiredErrorMessage));
            }
        }
        if ($this->Nationality->Required) {
            if (!$this->Nationality->IsDetailKey && EmptyValue($this->Nationality->FormValue)) {
                $this->Nationality->addErrorMessage(str_replace("%s", $this->Nationality->caption(), $this->Nationality->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
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
        if ($this->ReferedByDr->Required) {
            if (!$this->ReferedByDr->IsDetailKey && EmptyValue($this->ReferedByDr->FormValue)) {
                $this->ReferedByDr->addErrorMessage(str_replace("%s", $this->ReferedByDr->caption(), $this->ReferedByDr->RequiredErrorMessage));
            }
        }
        if ($this->ReferClinicname->Required) {
            if (!$this->ReferClinicname->IsDetailKey && EmptyValue($this->ReferClinicname->FormValue)) {
                $this->ReferClinicname->addErrorMessage(str_replace("%s", $this->ReferClinicname->caption(), $this->ReferClinicname->RequiredErrorMessage));
            }
        }
        if ($this->ReferCity->Required) {
            if (!$this->ReferCity->IsDetailKey && EmptyValue($this->ReferCity->FormValue)) {
                $this->ReferCity->addErrorMessage(str_replace("%s", $this->ReferCity->caption(), $this->ReferCity->RequiredErrorMessage));
            }
        }
        if ($this->ReferMobileNo->Required) {
            if (!$this->ReferMobileNo->IsDetailKey && EmptyValue($this->ReferMobileNo->FormValue)) {
                $this->ReferMobileNo->addErrorMessage(str_replace("%s", $this->ReferMobileNo->caption(), $this->ReferMobileNo->RequiredErrorMessage));
            }
        }
        if ($this->ReferA4TreatingConsultant->Required) {
            if (!$this->ReferA4TreatingConsultant->IsDetailKey && EmptyValue($this->ReferA4TreatingConsultant->FormValue)) {
                $this->ReferA4TreatingConsultant->addErrorMessage(str_replace("%s", $this->ReferA4TreatingConsultant->caption(), $this->ReferA4TreatingConsultant->RequiredErrorMessage));
            }
        }
        if ($this->PurposreReferredfor->Required) {
            if (!$this->PurposreReferredfor->IsDetailKey && EmptyValue($this->PurposreReferredfor->FormValue)) {
                $this->PurposreReferredfor->addErrorMessage(str_replace("%s", $this->PurposreReferredfor->caption(), $this->PurposreReferredfor->RequiredErrorMessage));
            }
        }
        if ($this->spouse_title->Required) {
            if (!$this->spouse_title->IsDetailKey && EmptyValue($this->spouse_title->FormValue)) {
                $this->spouse_title->addErrorMessage(str_replace("%s", $this->spouse_title->caption(), $this->spouse_title->RequiredErrorMessage));
            }
        }
        if ($this->spouse_first_name->Required) {
            if (!$this->spouse_first_name->IsDetailKey && EmptyValue($this->spouse_first_name->FormValue)) {
                $this->spouse_first_name->addErrorMessage(str_replace("%s", $this->spouse_first_name->caption(), $this->spouse_first_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_middle_name->Required) {
            if (!$this->spouse_middle_name->IsDetailKey && EmptyValue($this->spouse_middle_name->FormValue)) {
                $this->spouse_middle_name->addErrorMessage(str_replace("%s", $this->spouse_middle_name->caption(), $this->spouse_middle_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_last_name->Required) {
            if (!$this->spouse_last_name->IsDetailKey && EmptyValue($this->spouse_last_name->FormValue)) {
                $this->spouse_last_name->addErrorMessage(str_replace("%s", $this->spouse_last_name->caption(), $this->spouse_last_name->RequiredErrorMessage));
            }
        }
        if ($this->spouse_gender->Required) {
            if (!$this->spouse_gender->IsDetailKey && EmptyValue($this->spouse_gender->FormValue)) {
                $this->spouse_gender->addErrorMessage(str_replace("%s", $this->spouse_gender->caption(), $this->spouse_gender->RequiredErrorMessage));
            }
        }
        if ($this->spouse_dob->Required) {
            if (!$this->spouse_dob->IsDetailKey && EmptyValue($this->spouse_dob->FormValue)) {
                $this->spouse_dob->addErrorMessage(str_replace("%s", $this->spouse_dob->caption(), $this->spouse_dob->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->spouse_dob->FormValue)) {
            $this->spouse_dob->addErrorMessage($this->spouse_dob->getErrorMessage(false));
        }
        if ($this->spouse_Age->Required) {
            if (!$this->spouse_Age->IsDetailKey && EmptyValue($this->spouse_Age->FormValue)) {
                $this->spouse_Age->addErrorMessage(str_replace("%s", $this->spouse_Age->caption(), $this->spouse_Age->RequiredErrorMessage));
            }
        }
        if ($this->spouse_blood_group->Required) {
            if (!$this->spouse_blood_group->IsDetailKey && EmptyValue($this->spouse_blood_group->FormValue)) {
                $this->spouse_blood_group->addErrorMessage(str_replace("%s", $this->spouse_blood_group->caption(), $this->spouse_blood_group->RequiredErrorMessage));
            }
        }
        if ($this->spouse_mobile_no->Required) {
            if (!$this->spouse_mobile_no->IsDetailKey && EmptyValue($this->spouse_mobile_no->FormValue)) {
                $this->spouse_mobile_no->addErrorMessage(str_replace("%s", $this->spouse_mobile_no->caption(), $this->spouse_mobile_no->RequiredErrorMessage));
            }
        }
        if ($this->Maritalstatus->Required) {
            if (!$this->Maritalstatus->IsDetailKey && EmptyValue($this->Maritalstatus->FormValue)) {
                $this->Maritalstatus->addErrorMessage(str_replace("%s", $this->Maritalstatus->caption(), $this->Maritalstatus->RequiredErrorMessage));
            }
        }
        if ($this->Business->Required) {
            if (!$this->Business->IsDetailKey && EmptyValue($this->Business->FormValue)) {
                $this->Business->addErrorMessage(str_replace("%s", $this->Business->caption(), $this->Business->RequiredErrorMessage));
            }
        }
        if ($this->Patient_Language->Required) {
            if (!$this->Patient_Language->IsDetailKey && EmptyValue($this->Patient_Language->FormValue)) {
                $this->Patient_Language->addErrorMessage(str_replace("%s", $this->Patient_Language->caption(), $this->Patient_Language->RequiredErrorMessage));
            }
        }
        if ($this->Passport->Required) {
            if (!$this->Passport->IsDetailKey && EmptyValue($this->Passport->FormValue)) {
                $this->Passport->addErrorMessage(str_replace("%s", $this->Passport->caption(), $this->Passport->RequiredErrorMessage));
            }
        }
        if ($this->VisaNo->Required) {
            if (!$this->VisaNo->IsDetailKey && EmptyValue($this->VisaNo->FormValue)) {
                $this->VisaNo->addErrorMessage(str_replace("%s", $this->VisaNo->caption(), $this->VisaNo->RequiredErrorMessage));
            }
        }
        if ($this->ValidityOfVisa->Required) {
            if (!$this->ValidityOfVisa->IsDetailKey && EmptyValue($this->ValidityOfVisa->FormValue)) {
                $this->ValidityOfVisa->addErrorMessage(str_replace("%s", $this->ValidityOfVisa->caption(), $this->ValidityOfVisa->RequiredErrorMessage));
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
        if ($this->street->Required) {
            if (!$this->street->IsDetailKey && EmptyValue($this->street->FormValue)) {
                $this->street->addErrorMessage(str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
            }
        }
        if ($this->town->Required) {
            if (!$this->town->IsDetailKey && EmptyValue($this->town->FormValue)) {
                $this->town->addErrorMessage(str_replace("%s", $this->town->caption(), $this->town->RequiredErrorMessage));
            }
        }
        if ($this->province->Required) {
            if (!$this->province->IsDetailKey && EmptyValue($this->province->FormValue)) {
                $this->province->addErrorMessage(str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
            }
        }
        if ($this->country->Required) {
            if (!$this->country->IsDetailKey && EmptyValue($this->country->FormValue)) {
                $this->country->addErrorMessage(str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
            }
        }
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->PEmail->Required) {
            if (!$this->PEmail->IsDetailKey && EmptyValue($this->PEmail->FormValue)) {
                $this->PEmail->addErrorMessage(str_replace("%s", $this->PEmail->caption(), $this->PEmail->RequiredErrorMessage));
            }
        }
        if ($this->PEmergencyContact->Required) {
            if (!$this->PEmergencyContact->IsDetailKey && EmptyValue($this->PEmergencyContact->FormValue)) {
                $this->PEmergencyContact->addErrorMessage(str_replace("%s", $this->PEmergencyContact->caption(), $this->PEmergencyContact->RequiredErrorMessage));
            }
        }
        if ($this->occupation->Required) {
            if (!$this->occupation->IsDetailKey && EmptyValue($this->occupation->FormValue)) {
                $this->occupation->addErrorMessage(str_replace("%s", $this->occupation->caption(), $this->occupation->RequiredErrorMessage));
            }
        }
        if ($this->spouse_occupation->Required) {
            if (!$this->spouse_occupation->IsDetailKey && EmptyValue($this->spouse_occupation->FormValue)) {
                $this->spouse_occupation->addErrorMessage(str_replace("%s", $this->spouse_occupation->caption(), $this->spouse_occupation->RequiredErrorMessage));
            }
        }
        if ($this->WhatsApp->Required) {
            if (!$this->WhatsApp->IsDetailKey && EmptyValue($this->WhatsApp->FormValue)) {
                $this->WhatsApp->addErrorMessage(str_replace("%s", $this->WhatsApp->caption(), $this->WhatsApp->RequiredErrorMessage));
            }
        }
        if ($this->CouppleID->Required) {
            if (!$this->CouppleID->IsDetailKey && EmptyValue($this->CouppleID->FormValue)) {
                $this->CouppleID->addErrorMessage(str_replace("%s", $this->CouppleID->caption(), $this->CouppleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CouppleID->FormValue)) {
            $this->CouppleID->addErrorMessage($this->CouppleID->getErrorMessage(false));
        }
        if ($this->MaleID->Required) {
            if (!$this->MaleID->IsDetailKey && EmptyValue($this->MaleID->FormValue)) {
                $this->MaleID->addErrorMessage(str_replace("%s", $this->MaleID->caption(), $this->MaleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->MaleID->FormValue)) {
            $this->MaleID->addErrorMessage($this->MaleID->getErrorMessage(false));
        }
        if ($this->FemaleID->Required) {
            if (!$this->FemaleID->IsDetailKey && EmptyValue($this->FemaleID->FormValue)) {
                $this->FemaleID->addErrorMessage(str_replace("%s", $this->FemaleID->caption(), $this->FemaleID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->FemaleID->FormValue)) {
            $this->FemaleID->addErrorMessage($this->FemaleID->getErrorMessage(false));
        }
        if ($this->GroupID->Required) {
            if (!$this->GroupID->IsDetailKey && EmptyValue($this->GroupID->FormValue)) {
                $this->GroupID->addErrorMessage(str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->GroupID->FormValue)) {
            $this->GroupID->addErrorMessage($this->GroupID->getErrorMessage(false));
        }
        if ($this->Relationship->Required) {
            if (!$this->Relationship->IsDetailKey && EmptyValue($this->Relationship->FormValue)) {
                $this->Relationship->addErrorMessage(str_replace("%s", $this->Relationship->caption(), $this->Relationship->RequiredErrorMessage));
            }
        }
        if ($this->FacebookID->Required) {
            if (!$this->FacebookID->IsDetailKey && EmptyValue($this->FacebookID->FormValue)) {
                $this->FacebookID->addErrorMessage(str_replace("%s", $this->FacebookID->caption(), $this->FacebookID->RequiredErrorMessage));
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

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, "", false);

        // title
        $this->title->setDbValueDef($rsnew, $this->title->CurrentValue, null, false);

        // first_name
        $this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, null, false);

        // middle_name
        $this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, null, false);

        // last_name
        $this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, null, false);

        // gender
        $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, false);

        // dob
        $this->dob->setDbValueDef($rsnew, UnFormatDateTime($this->dob->CurrentValue, 0), null, false);

        // Age
        $this->Age->setDbValueDef($rsnew, $this->Age->CurrentValue, null, false);

        // blood_group
        $this->blood_group->setDbValueDef($rsnew, $this->blood_group->CurrentValue, null, false);

        // mobile_no
        $this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, null, false);

        // description
        $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, false);

        // IdentificationMark
        $this->IdentificationMark->setDbValueDef($rsnew, $this->IdentificationMark->CurrentValue, null, false);

        // Religion
        $this->Religion->setDbValueDef($rsnew, $this->Religion->CurrentValue, null, false);

        // Nationality
        $this->Nationality->setDbValueDef($rsnew, $this->Nationality->CurrentValue, null, false);

        // profilePic
        $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, false);

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

        // ReferedByDr
        $this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, null, false);

        // ReferClinicname
        $this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, null, false);

        // ReferCity
        $this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, null, false);

        // ReferMobileNo
        $this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, null, false);

        // ReferA4TreatingConsultant
        $this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, null, false);

        // PurposreReferredfor
        $this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, null, false);

        // spouse_title
        $this->spouse_title->setDbValueDef($rsnew, $this->spouse_title->CurrentValue, null, false);

        // spouse_first_name
        $this->spouse_first_name->setDbValueDef($rsnew, $this->spouse_first_name->CurrentValue, null, false);

        // spouse_middle_name
        $this->spouse_middle_name->setDbValueDef($rsnew, $this->spouse_middle_name->CurrentValue, null, false);

        // spouse_last_name
        $this->spouse_last_name->setDbValueDef($rsnew, $this->spouse_last_name->CurrentValue, null, false);

        // spouse_gender
        $this->spouse_gender->setDbValueDef($rsnew, $this->spouse_gender->CurrentValue, null, false);

        // spouse_dob
        $this->spouse_dob->setDbValueDef($rsnew, UnFormatDateTime($this->spouse_dob->CurrentValue, 0), null, false);

        // spouse_Age
        $this->spouse_Age->setDbValueDef($rsnew, $this->spouse_Age->CurrentValue, null, false);

        // spouse_blood_group
        $this->spouse_blood_group->setDbValueDef($rsnew, $this->spouse_blood_group->CurrentValue, null, false);

        // spouse_mobile_no
        $this->spouse_mobile_no->setDbValueDef($rsnew, $this->spouse_mobile_no->CurrentValue, null, false);

        // Maritalstatus
        $this->Maritalstatus->setDbValueDef($rsnew, $this->Maritalstatus->CurrentValue, null, false);

        // Business
        $this->Business->setDbValueDef($rsnew, $this->Business->CurrentValue, null, false);

        // Patient_Language
        $this->Patient_Language->setDbValueDef($rsnew, $this->Patient_Language->CurrentValue, null, false);

        // Passport
        $this->Passport->setDbValueDef($rsnew, $this->Passport->CurrentValue, null, false);

        // VisaNo
        $this->VisaNo->setDbValueDef($rsnew, $this->VisaNo->CurrentValue, null, false);

        // ValidityOfVisa
        $this->ValidityOfVisa->setDbValueDef($rsnew, $this->ValidityOfVisa->CurrentValue, null, false);

        // WhereDidYouHear
        $this->WhereDidYouHear->setDbValueDef($rsnew, $this->WhereDidYouHear->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // street
        $this->street->setDbValueDef($rsnew, $this->street->CurrentValue, null, false);

        // town
        $this->town->setDbValueDef($rsnew, $this->town->CurrentValue, null, false);

        // province
        $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, false);

        // country
        $this->country->setDbValueDef($rsnew, $this->country->CurrentValue, null, false);

        // postal_code
        $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, false);

        // PEmail
        $this->PEmail->setDbValueDef($rsnew, $this->PEmail->CurrentValue, null, false);

        // PEmergencyContact
        $this->PEmergencyContact->setDbValueDef($rsnew, $this->PEmergencyContact->CurrentValue, null, false);

        // occupation
        $this->occupation->setDbValueDef($rsnew, $this->occupation->CurrentValue, null, false);

        // spouse_occupation
        $this->spouse_occupation->setDbValueDef($rsnew, $this->spouse_occupation->CurrentValue, null, false);

        // WhatsApp
        $this->WhatsApp->setDbValueDef($rsnew, $this->WhatsApp->CurrentValue, null, false);

        // CouppleID
        $this->CouppleID->setDbValueDef($rsnew, $this->CouppleID->CurrentValue, null, false);

        // MaleID
        $this->MaleID->setDbValueDef($rsnew, $this->MaleID->CurrentValue, null, false);

        // FemaleID
        $this->FemaleID->setDbValueDef($rsnew, $this->FemaleID->CurrentValue, null, false);

        // GroupID
        $this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, null, false);

        // Relationship
        $this->Relationship->setDbValueDef($rsnew, $this->Relationship->CurrentValue, null, false);

        // FacebookID
        $this->FacebookID->setDbValueDef($rsnew, $this->FacebookID->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);

        // Check if key value entered
        if ($insertRow && $this->ValidateKey && strval($rsnew['PatientID']) == "") {
            $this->setFailureMessage($Language->phrase("InvalidKeyValue"));
            $insertRow = false;
        }
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PatientList"), "", $this->TableVar, true);
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
