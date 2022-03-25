<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IpAdmissionEdit extends IpAdmission
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ip_admission';

    // Page object name
    public $PageObjName = "IpAdmissionEdit";

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

        // Table object (ip_admission)
        if (!isset($GLOBALS["ip_admission"]) || get_class($GLOBALS["ip_admission"]) == PROJECT_NAMESPACE . "ip_admission") {
            $GLOBALS["ip_admission"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ip_admission');
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
                $doc = new $class(Container("ip_admission"));
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
                    if ($pageName == "IpAdmissionView") {
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
        $this->mrnNo->setVisibility();
        $this->patient_id->setVisibility();
        $this->patient_name->setVisibility();
        $this->profilePic->setVisibility();
        $this->gender->setVisibility();
        $this->age->setVisibility();
        $this->physician_id->setVisibility();
        $this->typeRegsisteration->setVisibility();
        $this->PaymentCategory->setVisibility();
        $this->admission_consultant_id->setVisibility();
        $this->leading_consultant_id->setVisibility();
        $this->cause->setVisibility();
        $this->admission_date->setVisibility();
        $this->release_date->setVisibility();
        $this->PaymentStatus->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->PatientID->setVisibility();
        $this->HospID->setVisibility();
        $this->ReferedByDr->setVisibility();
        $this->ReferClinicname->setVisibility();
        $this->ReferCity->setVisibility();
        $this->ReferMobileNo->setVisibility();
        $this->ReferA4TreatingConsultant->setVisibility();
        $this->PurposreReferredfor->setVisibility();
        $this->mobileno->setVisibility();
        $this->BillClosing->setVisibility();
        $this->BillClosingDate->setVisibility();
        $this->BillNumber->setVisibility();
        $this->ClosingAmount->setVisibility();
        $this->ClosingType->setVisibility();
        $this->BillAmount->setVisibility();
        $this->billclosedBy->setVisibility();
        $this->bllcloseByDate->setVisibility();
        $this->ReportHeader->setVisibility();
        $this->Procedure->setVisibility();
        $this->Consultant->setVisibility();
        $this->Anesthetist->setVisibility();
        $this->Amound->setVisibility();
        $this->Package->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->Cid->setVisibility();
        $this->PartId->setVisibility();
        $this->IDProof->setVisibility();
        $this->AdviceToOtherHospital->setVisibility();
        $this->Reason->setVisibility();
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
                    $this->terminate("IpAdmissionList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "IpAdmissionList") {
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

        // Check field name 'mrnNo' first before field var 'x_mrnNo'
        $val = $CurrentForm->hasValue("mrnNo") ? $CurrentForm->getValue("mrnNo") : $CurrentForm->getValue("x_mrnNo");
        if (!$this->mrnNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mrnNo->Visible = false; // Disable update for API request
            } else {
                $this->mrnNo->setFormValue($val);
            }
        }

        // Check field name 'patient_id' first before field var 'x_patient_id'
        $val = $CurrentForm->hasValue("patient_id") ? $CurrentForm->getValue("patient_id") : $CurrentForm->getValue("x_patient_id");
        if (!$this->patient_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_id->Visible = false; // Disable update for API request
            } else {
                $this->patient_id->setFormValue($val);
            }
        }

        // Check field name 'patient_name' first before field var 'x_patient_name'
        $val = $CurrentForm->hasValue("patient_name") ? $CurrentForm->getValue("patient_name") : $CurrentForm->getValue("x_patient_name");
        if (!$this->patient_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_name->Visible = false; // Disable update for API request
            } else {
                $this->patient_name->setFormValue($val);
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

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'age' first before field var 'x_age'
        $val = $CurrentForm->hasValue("age") ? $CurrentForm->getValue("age") : $CurrentForm->getValue("x_age");
        if (!$this->age->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->age->Visible = false; // Disable update for API request
            } else {
                $this->age->setFormValue($val);
            }
        }

        // Check field name 'physician_id' first before field var 'x_physician_id'
        $val = $CurrentForm->hasValue("physician_id") ? $CurrentForm->getValue("physician_id") : $CurrentForm->getValue("x_physician_id");
        if (!$this->physician_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->physician_id->Visible = false; // Disable update for API request
            } else {
                $this->physician_id->setFormValue($val);
            }
        }

        // Check field name 'typeRegsisteration' first before field var 'x_typeRegsisteration'
        $val = $CurrentForm->hasValue("typeRegsisteration") ? $CurrentForm->getValue("typeRegsisteration") : $CurrentForm->getValue("x_typeRegsisteration");
        if (!$this->typeRegsisteration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->typeRegsisteration->Visible = false; // Disable update for API request
            } else {
                $this->typeRegsisteration->setFormValue($val);
            }
        }

        // Check field name 'PaymentCategory' first before field var 'x_PaymentCategory'
        $val = $CurrentForm->hasValue("PaymentCategory") ? $CurrentForm->getValue("PaymentCategory") : $CurrentForm->getValue("x_PaymentCategory");
        if (!$this->PaymentCategory->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentCategory->Visible = false; // Disable update for API request
            } else {
                $this->PaymentCategory->setFormValue($val);
            }
        }

        // Check field name 'admission_consultant_id' first before field var 'x_admission_consultant_id'
        $val = $CurrentForm->hasValue("admission_consultant_id") ? $CurrentForm->getValue("admission_consultant_id") : $CurrentForm->getValue("x_admission_consultant_id");
        if (!$this->admission_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->admission_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'leading_consultant_id' first before field var 'x_leading_consultant_id'
        $val = $CurrentForm->hasValue("leading_consultant_id") ? $CurrentForm->getValue("leading_consultant_id") : $CurrentForm->getValue("x_leading_consultant_id");
        if (!$this->leading_consultant_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leading_consultant_id->Visible = false; // Disable update for API request
            } else {
                $this->leading_consultant_id->setFormValue($val);
            }
        }

        // Check field name 'cause' first before field var 'x_cause'
        $val = $CurrentForm->hasValue("cause") ? $CurrentForm->getValue("cause") : $CurrentForm->getValue("x_cause");
        if (!$this->cause->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->cause->Visible = false; // Disable update for API request
            } else {
                $this->cause->setFormValue($val);
            }
        }

        // Check field name 'admission_date' first before field var 'x_admission_date'
        $val = $CurrentForm->hasValue("admission_date") ? $CurrentForm->getValue("admission_date") : $CurrentForm->getValue("x_admission_date");
        if (!$this->admission_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->admission_date->Visible = false; // Disable update for API request
            } else {
                $this->admission_date->setFormValue($val);
            }
            $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
        }

        // Check field name 'release_date' first before field var 'x_release_date'
        $val = $CurrentForm->hasValue("release_date") ? $CurrentForm->getValue("release_date") : $CurrentForm->getValue("x_release_date");
        if (!$this->release_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->release_date->Visible = false; // Disable update for API request
            } else {
                $this->release_date->setFormValue($val);
            }
            $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
        }

        // Check field name 'PaymentStatus' first before field var 'x_PaymentStatus'
        $val = $CurrentForm->hasValue("PaymentStatus") ? $CurrentForm->getValue("PaymentStatus") : $CurrentForm->getValue("x_PaymentStatus");
        if (!$this->PaymentStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaymentStatus->Visible = false; // Disable update for API request
            } else {
                $this->PaymentStatus->setFormValue($val);
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

        // Check field name 'mobileno' first before field var 'x_mobileno'
        $val = $CurrentForm->hasValue("mobileno") ? $CurrentForm->getValue("mobileno") : $CurrentForm->getValue("x_mobileno");
        if (!$this->mobileno->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobileno->Visible = false; // Disable update for API request
            } else {
                $this->mobileno->setFormValue($val);
            }
        }

        // Check field name 'BillClosing' first before field var 'x_BillClosing'
        $val = $CurrentForm->hasValue("BillClosing") ? $CurrentForm->getValue("BillClosing") : $CurrentForm->getValue("x_BillClosing");
        if (!$this->BillClosing->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillClosing->Visible = false; // Disable update for API request
            } else {
                $this->BillClosing->setFormValue($val);
            }
        }

        // Check field name 'BillClosingDate' first before field var 'x_BillClosingDate'
        $val = $CurrentForm->hasValue("BillClosingDate") ? $CurrentForm->getValue("BillClosingDate") : $CurrentForm->getValue("x_BillClosingDate");
        if (!$this->BillClosingDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillClosingDate->Visible = false; // Disable update for API request
            } else {
                $this->BillClosingDate->setFormValue($val);
            }
            $this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
        }

        // Check field name 'BillNumber' first before field var 'x_BillNumber'
        $val = $CurrentForm->hasValue("BillNumber") ? $CurrentForm->getValue("BillNumber") : $CurrentForm->getValue("x_BillNumber");
        if (!$this->BillNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillNumber->Visible = false; // Disable update for API request
            } else {
                $this->BillNumber->setFormValue($val);
            }
        }

        // Check field name 'ClosingAmount' first before field var 'x_ClosingAmount'
        $val = $CurrentForm->hasValue("ClosingAmount") ? $CurrentForm->getValue("ClosingAmount") : $CurrentForm->getValue("x_ClosingAmount");
        if (!$this->ClosingAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClosingAmount->Visible = false; // Disable update for API request
            } else {
                $this->ClosingAmount->setFormValue($val);
            }
        }

        // Check field name 'ClosingType' first before field var 'x_ClosingType'
        $val = $CurrentForm->hasValue("ClosingType") ? $CurrentForm->getValue("ClosingType") : $CurrentForm->getValue("x_ClosingType");
        if (!$this->ClosingType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ClosingType->Visible = false; // Disable update for API request
            } else {
                $this->ClosingType->setFormValue($val);
            }
        }

        // Check field name 'BillAmount' first before field var 'x_BillAmount'
        $val = $CurrentForm->hasValue("BillAmount") ? $CurrentForm->getValue("BillAmount") : $CurrentForm->getValue("x_BillAmount");
        if (!$this->BillAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillAmount->Visible = false; // Disable update for API request
            } else {
                $this->BillAmount->setFormValue($val);
            }
        }

        // Check field name 'billclosedBy' first before field var 'x_billclosedBy'
        $val = $CurrentForm->hasValue("billclosedBy") ? $CurrentForm->getValue("billclosedBy") : $CurrentForm->getValue("x_billclosedBy");
        if (!$this->billclosedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->billclosedBy->Visible = false; // Disable update for API request
            } else {
                $this->billclosedBy->setFormValue($val);
            }
        }

        // Check field name 'bllcloseByDate' first before field var 'x_bllcloseByDate'
        $val = $CurrentForm->hasValue("bllcloseByDate") ? $CurrentForm->getValue("bllcloseByDate") : $CurrentForm->getValue("x_bllcloseByDate");
        if (!$this->bllcloseByDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->bllcloseByDate->Visible = false; // Disable update for API request
            } else {
                $this->bllcloseByDate->setFormValue($val);
            }
            $this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
        }

        // Check field name 'ReportHeader' first before field var 'x_ReportHeader'
        $val = $CurrentForm->hasValue("ReportHeader") ? $CurrentForm->getValue("ReportHeader") : $CurrentForm->getValue("x_ReportHeader");
        if (!$this->ReportHeader->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReportHeader->Visible = false; // Disable update for API request
            } else {
                $this->ReportHeader->setFormValue($val);
            }
        }

        // Check field name 'Procedure' first before field var 'x_Procedure'
        $val = $CurrentForm->hasValue("Procedure") ? $CurrentForm->getValue("Procedure") : $CurrentForm->getValue("x_Procedure");
        if (!$this->Procedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Procedure->Visible = false; // Disable update for API request
            } else {
                $this->Procedure->setFormValue($val);
            }
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

        // Check field name 'Anesthetist' first before field var 'x_Anesthetist'
        $val = $CurrentForm->hasValue("Anesthetist") ? $CurrentForm->getValue("Anesthetist") : $CurrentForm->getValue("x_Anesthetist");
        if (!$this->Anesthetist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anesthetist->Visible = false; // Disable update for API request
            } else {
                $this->Anesthetist->setFormValue($val);
            }
        }

        // Check field name 'Amound' first before field var 'x_Amound'
        $val = $CurrentForm->hasValue("Amound") ? $CurrentForm->getValue("Amound") : $CurrentForm->getValue("x_Amound");
        if (!$this->Amound->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Amound->Visible = false; // Disable update for API request
            } else {
                $this->Amound->setFormValue($val);
            }
        }

        // Check field name 'Package' first before field var 'x_Package'
        $val = $CurrentForm->hasValue("Package") ? $CurrentForm->getValue("Package") : $CurrentForm->getValue("x_Package");
        if (!$this->Package->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Package->Visible = false; // Disable update for API request
            } else {
                $this->Package->setFormValue($val);
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

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }

        // Check field name 'PartnerMobile' first before field var 'x_PartnerMobile'
        $val = $CurrentForm->hasValue("PartnerMobile") ? $CurrentForm->getValue("PartnerMobile") : $CurrentForm->getValue("x_PartnerMobile");
        if (!$this->PartnerMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerMobile->Visible = false; // Disable update for API request
            } else {
                $this->PartnerMobile->setFormValue($val);
            }
        }

        // Check field name 'Cid' first before field var 'x_Cid'
        $val = $CurrentForm->hasValue("Cid") ? $CurrentForm->getValue("Cid") : $CurrentForm->getValue("x_Cid");
        if (!$this->Cid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cid->Visible = false; // Disable update for API request
            } else {
                $this->Cid->setFormValue($val);
            }
        }

        // Check field name 'PartId' first before field var 'x_PartId'
        $val = $CurrentForm->hasValue("PartId") ? $CurrentForm->getValue("PartId") : $CurrentForm->getValue("x_PartId");
        if (!$this->PartId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartId->Visible = false; // Disable update for API request
            } else {
                $this->PartId->setFormValue($val);
            }
        }

        // Check field name 'IDProof' first before field var 'x_IDProof'
        $val = $CurrentForm->hasValue("IDProof") ? $CurrentForm->getValue("IDProof") : $CurrentForm->getValue("x_IDProof");
        if (!$this->IDProof->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IDProof->Visible = false; // Disable update for API request
            } else {
                $this->IDProof->setFormValue($val);
            }
        }

        // Check field name 'AdviceToOtherHospital' first before field var 'x_AdviceToOtherHospital'
        $val = $CurrentForm->hasValue("AdviceToOtherHospital") ? $CurrentForm->getValue("AdviceToOtherHospital") : $CurrentForm->getValue("x_AdviceToOtherHospital");
        if (!$this->AdviceToOtherHospital->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AdviceToOtherHospital->Visible = false; // Disable update for API request
            } else {
                $this->AdviceToOtherHospital->setFormValue($val);
            }
        }

        // Check field name 'Reason' first before field var 'x_Reason'
        $val = $CurrentForm->hasValue("Reason") ? $CurrentForm->getValue("Reason") : $CurrentForm->getValue("x_Reason");
        if (!$this->Reason->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reason->Visible = false; // Disable update for API request
            } else {
                $this->Reason->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->mrnNo->CurrentValue = $this->mrnNo->FormValue;
        $this->patient_id->CurrentValue = $this->patient_id->FormValue;
        $this->patient_name->CurrentValue = $this->patient_name->FormValue;
        $this->profilePic->CurrentValue = $this->profilePic->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->age->CurrentValue = $this->age->FormValue;
        $this->physician_id->CurrentValue = $this->physician_id->FormValue;
        $this->typeRegsisteration->CurrentValue = $this->typeRegsisteration->FormValue;
        $this->PaymentCategory->CurrentValue = $this->PaymentCategory->FormValue;
        $this->admission_consultant_id->CurrentValue = $this->admission_consultant_id->FormValue;
        $this->leading_consultant_id->CurrentValue = $this->leading_consultant_id->FormValue;
        $this->cause->CurrentValue = $this->cause->FormValue;
        $this->admission_date->CurrentValue = $this->admission_date->FormValue;
        $this->admission_date->CurrentValue = UnFormatDateTime($this->admission_date->CurrentValue, 0);
        $this->release_date->CurrentValue = $this->release_date->FormValue;
        $this->release_date->CurrentValue = UnFormatDateTime($this->release_date->CurrentValue, 0);
        $this->PaymentStatus->CurrentValue = $this->PaymentStatus->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->ReferedByDr->CurrentValue = $this->ReferedByDr->FormValue;
        $this->ReferClinicname->CurrentValue = $this->ReferClinicname->FormValue;
        $this->ReferCity->CurrentValue = $this->ReferCity->FormValue;
        $this->ReferMobileNo->CurrentValue = $this->ReferMobileNo->FormValue;
        $this->ReferA4TreatingConsultant->CurrentValue = $this->ReferA4TreatingConsultant->FormValue;
        $this->PurposreReferredfor->CurrentValue = $this->PurposreReferredfor->FormValue;
        $this->mobileno->CurrentValue = $this->mobileno->FormValue;
        $this->BillClosing->CurrentValue = $this->BillClosing->FormValue;
        $this->BillClosingDate->CurrentValue = $this->BillClosingDate->FormValue;
        $this->BillClosingDate->CurrentValue = UnFormatDateTime($this->BillClosingDate->CurrentValue, 0);
        $this->BillNumber->CurrentValue = $this->BillNumber->FormValue;
        $this->ClosingAmount->CurrentValue = $this->ClosingAmount->FormValue;
        $this->ClosingType->CurrentValue = $this->ClosingType->FormValue;
        $this->BillAmount->CurrentValue = $this->BillAmount->FormValue;
        $this->billclosedBy->CurrentValue = $this->billclosedBy->FormValue;
        $this->bllcloseByDate->CurrentValue = $this->bllcloseByDate->FormValue;
        $this->bllcloseByDate->CurrentValue = UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0);
        $this->ReportHeader->CurrentValue = $this->ReportHeader->FormValue;
        $this->Procedure->CurrentValue = $this->Procedure->FormValue;
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->Anesthetist->CurrentValue = $this->Anesthetist->FormValue;
        $this->Amound->CurrentValue = $this->Amound->FormValue;
        $this->Package->CurrentValue = $this->Package->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
        $this->Cid->CurrentValue = $this->Cid->FormValue;
        $this->PartId->CurrentValue = $this->PartId->FormValue;
        $this->IDProof->CurrentValue = $this->IDProof->FormValue;
        $this->AdviceToOtherHospital->CurrentValue = $this->AdviceToOtherHospital->FormValue;
        $this->Reason->CurrentValue = $this->Reason->FormValue;
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
        $this->mrnNo->setDbValue($row['mrnNo']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->patient_name->setDbValue($row['patient_name']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->gender->setDbValue($row['gender']);
        $this->age->setDbValue($row['age']);
        $this->physician_id->setDbValue($row['physician_id']);
        $this->typeRegsisteration->setDbValue($row['typeRegsisteration']);
        $this->PaymentCategory->setDbValue($row['PaymentCategory']);
        $this->admission_consultant_id->setDbValue($row['admission_consultant_id']);
        $this->leading_consultant_id->setDbValue($row['leading_consultant_id']);
        $this->cause->setDbValue($row['cause']);
        $this->admission_date->setDbValue($row['admission_date']);
        $this->release_date->setDbValue($row['release_date']);
        $this->PaymentStatus->setDbValue($row['PaymentStatus']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->ReferedByDr->setDbValue($row['ReferedByDr']);
        $this->ReferClinicname->setDbValue($row['ReferClinicname']);
        $this->ReferCity->setDbValue($row['ReferCity']);
        $this->ReferMobileNo->setDbValue($row['ReferMobileNo']);
        $this->ReferA4TreatingConsultant->setDbValue($row['ReferA4TreatingConsultant']);
        $this->PurposreReferredfor->setDbValue($row['PurposreReferredfor']);
        $this->mobileno->setDbValue($row['mobileno']);
        $this->BillClosing->setDbValue($row['BillClosing']);
        $this->BillClosingDate->setDbValue($row['BillClosingDate']);
        $this->BillNumber->setDbValue($row['BillNumber']);
        $this->ClosingAmount->setDbValue($row['ClosingAmount']);
        $this->ClosingType->setDbValue($row['ClosingType']);
        $this->BillAmount->setDbValue($row['BillAmount']);
        $this->billclosedBy->setDbValue($row['billclosedBy']);
        $this->bllcloseByDate->setDbValue($row['bllcloseByDate']);
        $this->ReportHeader->setDbValue($row['ReportHeader']);
        $this->Procedure->setDbValue($row['Procedure']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->Anesthetist->setDbValue($row['Anesthetist']);
        $this->Amound->setDbValue($row['Amound']);
        $this->Package->setDbValue($row['Package']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->Cid->setDbValue($row['Cid']);
        $this->PartId->setDbValue($row['PartId']);
        $this->IDProof->setDbValue($row['IDProof']);
        $this->AdviceToOtherHospital->setDbValue($row['AdviceToOtherHospital']);
        $this->Reason->setDbValue($row['Reason']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['mrnNo'] = null;
        $row['patient_id'] = null;
        $row['patient_name'] = null;
        $row['profilePic'] = null;
        $row['gender'] = null;
        $row['age'] = null;
        $row['physician_id'] = null;
        $row['typeRegsisteration'] = null;
        $row['PaymentCategory'] = null;
        $row['admission_consultant_id'] = null;
        $row['leading_consultant_id'] = null;
        $row['cause'] = null;
        $row['admission_date'] = null;
        $row['release_date'] = null;
        $row['PaymentStatus'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['PatientID'] = null;
        $row['HospID'] = null;
        $row['ReferedByDr'] = null;
        $row['ReferClinicname'] = null;
        $row['ReferCity'] = null;
        $row['ReferMobileNo'] = null;
        $row['ReferA4TreatingConsultant'] = null;
        $row['PurposreReferredfor'] = null;
        $row['mobileno'] = null;
        $row['BillClosing'] = null;
        $row['BillClosingDate'] = null;
        $row['BillNumber'] = null;
        $row['ClosingAmount'] = null;
        $row['ClosingType'] = null;
        $row['BillAmount'] = null;
        $row['billclosedBy'] = null;
        $row['bllcloseByDate'] = null;
        $row['ReportHeader'] = null;
        $row['Procedure'] = null;
        $row['Consultant'] = null;
        $row['Anesthetist'] = null;
        $row['Amound'] = null;
        $row['Package'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['Cid'] = null;
        $row['PartId'] = null;
        $row['IDProof'] = null;
        $row['AdviceToOtherHospital'] = null;
        $row['Reason'] = null;
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
        if ($this->Amound->FormValue == $this->Amound->CurrentValue && is_numeric(ConvertToFloatString($this->Amound->CurrentValue))) {
            $this->Amound->CurrentValue = ConvertToFloatString($this->Amound->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // mrnNo

        // patient_id

        // patient_name

        // profilePic

        // gender

        // age

        // physician_id

        // typeRegsisteration

        // PaymentCategory

        // admission_consultant_id

        // leading_consultant_id

        // cause

        // admission_date

        // release_date

        // PaymentStatus

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // PatientID

        // HospID

        // ReferedByDr

        // ReferClinicname

        // ReferCity

        // ReferMobileNo

        // ReferA4TreatingConsultant

        // PurposreReferredfor

        // mobileno

        // BillClosing

        // BillClosingDate

        // BillNumber

        // ClosingAmount

        // ClosingType

        // BillAmount

        // billclosedBy

        // bllcloseByDate

        // ReportHeader

        // Procedure

        // Consultant

        // Anesthetist

        // Amound

        // Package

        // PartnerID

        // PartnerName

        // PartnerMobile

        // Cid

        // PartId

        // IDProof

        // AdviceToOtherHospital

        // Reason
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->ViewValue = $this->mrnNo->CurrentValue;
            $this->mrnNo->ViewCustomAttributes = "";

            // patient_id
            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
            $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
            $this->patient_id->ViewCustomAttributes = "";

            // patient_name
            $this->patient_name->ViewValue = $this->patient_name->CurrentValue;
            $this->patient_name->ViewCustomAttributes = "";

            // profilePic
            $this->profilePic->ViewValue = $this->profilePic->CurrentValue;
            $this->profilePic->ViewCustomAttributes = "";

            // gender
            $this->gender->ViewValue = $this->gender->CurrentValue;
            $this->gender->ViewCustomAttributes = "";

            // age
            $this->age->ViewValue = $this->age->CurrentValue;
            $this->age->ViewCustomAttributes = "";

            // physician_id
            $this->physician_id->ViewValue = $this->physician_id->CurrentValue;
            $this->physician_id->ViewValue = FormatNumber($this->physician_id->ViewValue, 0, -2, -2, -2);
            $this->physician_id->ViewCustomAttributes = "";

            // typeRegsisteration
            $this->typeRegsisteration->ViewValue = $this->typeRegsisteration->CurrentValue;
            $this->typeRegsisteration->ViewCustomAttributes = "";

            // PaymentCategory
            $this->PaymentCategory->ViewValue = $this->PaymentCategory->CurrentValue;
            $this->PaymentCategory->ViewCustomAttributes = "";

            // admission_consultant_id
            $this->admission_consultant_id->ViewValue = $this->admission_consultant_id->CurrentValue;
            $this->admission_consultant_id->ViewValue = FormatNumber($this->admission_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->admission_consultant_id->ViewCustomAttributes = "";

            // leading_consultant_id
            $this->leading_consultant_id->ViewValue = $this->leading_consultant_id->CurrentValue;
            $this->leading_consultant_id->ViewValue = FormatNumber($this->leading_consultant_id->ViewValue, 0, -2, -2, -2);
            $this->leading_consultant_id->ViewCustomAttributes = "";

            // cause
            $this->cause->ViewValue = $this->cause->CurrentValue;
            $this->cause->ViewCustomAttributes = "";

            // admission_date
            $this->admission_date->ViewValue = $this->admission_date->CurrentValue;
            $this->admission_date->ViewValue = FormatDateTime($this->admission_date->ViewValue, 0);
            $this->admission_date->ViewCustomAttributes = "";

            // release_date
            $this->release_date->ViewValue = $this->release_date->CurrentValue;
            $this->release_date->ViewValue = FormatDateTime($this->release_date->ViewValue, 0);
            $this->release_date->ViewCustomAttributes = "";

            // PaymentStatus
            $this->PaymentStatus->ViewValue = $this->PaymentStatus->CurrentValue;
            $this->PaymentStatus->ViewValue = FormatNumber($this->PaymentStatus->ViewValue, 0, -2, -2, -2);
            $this->PaymentStatus->ViewCustomAttributes = "";

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
            $this->HospID->ViewCustomAttributes = "";

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

            // mobileno
            $this->mobileno->ViewValue = $this->mobileno->CurrentValue;
            $this->mobileno->ViewCustomAttributes = "";

            // BillClosing
            $this->BillClosing->ViewValue = $this->BillClosing->CurrentValue;
            $this->BillClosing->ViewCustomAttributes = "";

            // BillClosingDate
            $this->BillClosingDate->ViewValue = $this->BillClosingDate->CurrentValue;
            $this->BillClosingDate->ViewValue = FormatDateTime($this->BillClosingDate->ViewValue, 0);
            $this->BillClosingDate->ViewCustomAttributes = "";

            // BillNumber
            $this->BillNumber->ViewValue = $this->BillNumber->CurrentValue;
            $this->BillNumber->ViewCustomAttributes = "";

            // ClosingAmount
            $this->ClosingAmount->ViewValue = $this->ClosingAmount->CurrentValue;
            $this->ClosingAmount->ViewCustomAttributes = "";

            // ClosingType
            $this->ClosingType->ViewValue = $this->ClosingType->CurrentValue;
            $this->ClosingType->ViewCustomAttributes = "";

            // BillAmount
            $this->BillAmount->ViewValue = $this->BillAmount->CurrentValue;
            $this->BillAmount->ViewCustomAttributes = "";

            // billclosedBy
            $this->billclosedBy->ViewValue = $this->billclosedBy->CurrentValue;
            $this->billclosedBy->ViewCustomAttributes = "";

            // bllcloseByDate
            $this->bllcloseByDate->ViewValue = $this->bllcloseByDate->CurrentValue;
            $this->bllcloseByDate->ViewValue = FormatDateTime($this->bllcloseByDate->ViewValue, 0);
            $this->bllcloseByDate->ViewCustomAttributes = "";

            // ReportHeader
            $this->ReportHeader->ViewValue = $this->ReportHeader->CurrentValue;
            $this->ReportHeader->ViewCustomAttributes = "";

            // Procedure
            $this->Procedure->ViewValue = $this->Procedure->CurrentValue;
            $this->Procedure->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // Anesthetist
            $this->Anesthetist->ViewValue = $this->Anesthetist->CurrentValue;
            $this->Anesthetist->ViewCustomAttributes = "";

            // Amound
            $this->Amound->ViewValue = $this->Amound->CurrentValue;
            $this->Amound->ViewValue = FormatNumber($this->Amound->ViewValue, 2, -2, -2, -2);
            $this->Amound->ViewCustomAttributes = "";

            // Package
            $this->Package->ViewValue = $this->Package->CurrentValue;
            $this->Package->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // Cid
            $this->Cid->ViewValue = $this->Cid->CurrentValue;
            $this->Cid->ViewValue = FormatNumber($this->Cid->ViewValue, 0, -2, -2, -2);
            $this->Cid->ViewCustomAttributes = "";

            // PartId
            $this->PartId->ViewValue = $this->PartId->CurrentValue;
            $this->PartId->ViewValue = FormatNumber($this->PartId->ViewValue, 0, -2, -2, -2);
            $this->PartId->ViewCustomAttributes = "";

            // IDProof
            $this->IDProof->ViewValue = $this->IDProof->CurrentValue;
            $this->IDProof->ViewCustomAttributes = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->ViewValue = $this->AdviceToOtherHospital->CurrentValue;
            $this->AdviceToOtherHospital->ViewCustomAttributes = "";

            // Reason
            $this->Reason->ViewValue = $this->Reason->CurrentValue;
            $this->Reason->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";
            $this->mrnNo->TooltipValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";
            $this->patient_name->TooltipValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";
            $this->profilePic->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";
            $this->age->TooltipValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";
            $this->physician_id->TooltipValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";
            $this->typeRegsisteration->TooltipValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";
            $this->PaymentCategory->TooltipValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";
            $this->admission_consultant_id->TooltipValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";
            $this->leading_consultant_id->TooltipValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";
            $this->cause->TooltipValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";
            $this->admission_date->TooltipValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";
            $this->release_date->TooltipValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";
            $this->PaymentStatus->TooltipValue = "";

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

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";
            $this->mobileno->TooltipValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";
            $this->BillClosing->TooltipValue = "";

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";
            $this->BillClosingDate->TooltipValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";
            $this->BillNumber->TooltipValue = "";

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";
            $this->ClosingAmount->TooltipValue = "";

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";
            $this->ClosingType->TooltipValue = "";

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";
            $this->BillAmount->TooltipValue = "";

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";
            $this->billclosedBy->TooltipValue = "";

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";
            $this->bllcloseByDate->TooltipValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";
            $this->ReportHeader->TooltipValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";
            $this->Procedure->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";
            $this->Anesthetist->TooltipValue = "";

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";
            $this->Amound->TooltipValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";
            $this->Package->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // Cid
            $this->Cid->LinkCustomAttributes = "";
            $this->Cid->HrefValue = "";
            $this->Cid->TooltipValue = "";

            // PartId
            $this->PartId->LinkCustomAttributes = "";
            $this->PartId->HrefValue = "";
            $this->PartId->TooltipValue = "";

            // IDProof
            $this->IDProof->LinkCustomAttributes = "";
            $this->IDProof->HrefValue = "";
            $this->IDProof->TooltipValue = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->LinkCustomAttributes = "";
            $this->AdviceToOtherHospital->HrefValue = "";
            $this->AdviceToOtherHospital->TooltipValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";
            $this->Reason->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnNo
            $this->mrnNo->EditAttrs["class"] = "form-control";
            $this->mrnNo->EditCustomAttributes = "";
            if (!$this->mrnNo->Raw) {
                $this->mrnNo->CurrentValue = HtmlDecode($this->mrnNo->CurrentValue);
            }
            $this->mrnNo->EditValue = HtmlEncode($this->mrnNo->CurrentValue);
            $this->mrnNo->PlaceHolder = RemoveHtml($this->mrnNo->caption());

            // patient_id
            $this->patient_id->EditAttrs["class"] = "form-control";
            $this->patient_id->EditCustomAttributes = "";
            $this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
            $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

            // patient_name
            $this->patient_name->EditAttrs["class"] = "form-control";
            $this->patient_name->EditCustomAttributes = "";
            if (!$this->patient_name->Raw) {
                $this->patient_name->CurrentValue = HtmlDecode($this->patient_name->CurrentValue);
            }
            $this->patient_name->EditValue = HtmlEncode($this->patient_name->CurrentValue);
            $this->patient_name->PlaceHolder = RemoveHtml($this->patient_name->caption());

            // profilePic
            $this->profilePic->EditAttrs["class"] = "form-control";
            $this->profilePic->EditCustomAttributes = "";
            $this->profilePic->EditValue = HtmlEncode($this->profilePic->CurrentValue);
            $this->profilePic->PlaceHolder = RemoveHtml($this->profilePic->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            if (!$this->gender->Raw) {
                $this->gender->CurrentValue = HtmlDecode($this->gender->CurrentValue);
            }
            $this->gender->EditValue = HtmlEncode($this->gender->CurrentValue);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // age
            $this->age->EditAttrs["class"] = "form-control";
            $this->age->EditCustomAttributes = "";
            if (!$this->age->Raw) {
                $this->age->CurrentValue = HtmlDecode($this->age->CurrentValue);
            }
            $this->age->EditValue = HtmlEncode($this->age->CurrentValue);
            $this->age->PlaceHolder = RemoveHtml($this->age->caption());

            // physician_id
            $this->physician_id->EditAttrs["class"] = "form-control";
            $this->physician_id->EditCustomAttributes = "";
            $this->physician_id->EditValue = HtmlEncode($this->physician_id->CurrentValue);
            $this->physician_id->PlaceHolder = RemoveHtml($this->physician_id->caption());

            // typeRegsisteration
            $this->typeRegsisteration->EditAttrs["class"] = "form-control";
            $this->typeRegsisteration->EditCustomAttributes = "";
            if (!$this->typeRegsisteration->Raw) {
                $this->typeRegsisteration->CurrentValue = HtmlDecode($this->typeRegsisteration->CurrentValue);
            }
            $this->typeRegsisteration->EditValue = HtmlEncode($this->typeRegsisteration->CurrentValue);
            $this->typeRegsisteration->PlaceHolder = RemoveHtml($this->typeRegsisteration->caption());

            // PaymentCategory
            $this->PaymentCategory->EditAttrs["class"] = "form-control";
            $this->PaymentCategory->EditCustomAttributes = "";
            if (!$this->PaymentCategory->Raw) {
                $this->PaymentCategory->CurrentValue = HtmlDecode($this->PaymentCategory->CurrentValue);
            }
            $this->PaymentCategory->EditValue = HtmlEncode($this->PaymentCategory->CurrentValue);
            $this->PaymentCategory->PlaceHolder = RemoveHtml($this->PaymentCategory->caption());

            // admission_consultant_id
            $this->admission_consultant_id->EditAttrs["class"] = "form-control";
            $this->admission_consultant_id->EditCustomAttributes = "";
            $this->admission_consultant_id->EditValue = HtmlEncode($this->admission_consultant_id->CurrentValue);
            $this->admission_consultant_id->PlaceHolder = RemoveHtml($this->admission_consultant_id->caption());

            // leading_consultant_id
            $this->leading_consultant_id->EditAttrs["class"] = "form-control";
            $this->leading_consultant_id->EditCustomAttributes = "";
            $this->leading_consultant_id->EditValue = HtmlEncode($this->leading_consultant_id->CurrentValue);
            $this->leading_consultant_id->PlaceHolder = RemoveHtml($this->leading_consultant_id->caption());

            // cause
            $this->cause->EditAttrs["class"] = "form-control";
            $this->cause->EditCustomAttributes = "";
            $this->cause->EditValue = HtmlEncode($this->cause->CurrentValue);
            $this->cause->PlaceHolder = RemoveHtml($this->cause->caption());

            // admission_date
            $this->admission_date->EditAttrs["class"] = "form-control";
            $this->admission_date->EditCustomAttributes = "";
            $this->admission_date->EditValue = HtmlEncode(FormatDateTime($this->admission_date->CurrentValue, 8));
            $this->admission_date->PlaceHolder = RemoveHtml($this->admission_date->caption());

            // release_date
            $this->release_date->EditAttrs["class"] = "form-control";
            $this->release_date->EditCustomAttributes = "";
            $this->release_date->EditValue = HtmlEncode(FormatDateTime($this->release_date->CurrentValue, 8));
            $this->release_date->PlaceHolder = RemoveHtml($this->release_date->caption());

            // PaymentStatus
            $this->PaymentStatus->EditAttrs["class"] = "form-control";
            $this->PaymentStatus->EditCustomAttributes = "";
            $this->PaymentStatus->EditValue = HtmlEncode($this->PaymentStatus->CurrentValue);
            $this->PaymentStatus->PlaceHolder = RemoveHtml($this->PaymentStatus->caption());

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
            if (!$this->HospID->Raw) {
                $this->HospID->CurrentValue = HtmlDecode($this->HospID->CurrentValue);
            }
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

            // mobileno
            $this->mobileno->EditAttrs["class"] = "form-control";
            $this->mobileno->EditCustomAttributes = "";
            if (!$this->mobileno->Raw) {
                $this->mobileno->CurrentValue = HtmlDecode($this->mobileno->CurrentValue);
            }
            $this->mobileno->EditValue = HtmlEncode($this->mobileno->CurrentValue);
            $this->mobileno->PlaceHolder = RemoveHtml($this->mobileno->caption());

            // BillClosing
            $this->BillClosing->EditAttrs["class"] = "form-control";
            $this->BillClosing->EditCustomAttributes = "";
            if (!$this->BillClosing->Raw) {
                $this->BillClosing->CurrentValue = HtmlDecode($this->BillClosing->CurrentValue);
            }
            $this->BillClosing->EditValue = HtmlEncode($this->BillClosing->CurrentValue);
            $this->BillClosing->PlaceHolder = RemoveHtml($this->BillClosing->caption());

            // BillClosingDate
            $this->BillClosingDate->EditAttrs["class"] = "form-control";
            $this->BillClosingDate->EditCustomAttributes = "";
            $this->BillClosingDate->EditValue = HtmlEncode(FormatDateTime($this->BillClosingDate->CurrentValue, 8));
            $this->BillClosingDate->PlaceHolder = RemoveHtml($this->BillClosingDate->caption());

            // BillNumber
            $this->BillNumber->EditAttrs["class"] = "form-control";
            $this->BillNumber->EditCustomAttributes = "";
            if (!$this->BillNumber->Raw) {
                $this->BillNumber->CurrentValue = HtmlDecode($this->BillNumber->CurrentValue);
            }
            $this->BillNumber->EditValue = HtmlEncode($this->BillNumber->CurrentValue);
            $this->BillNumber->PlaceHolder = RemoveHtml($this->BillNumber->caption());

            // ClosingAmount
            $this->ClosingAmount->EditAttrs["class"] = "form-control";
            $this->ClosingAmount->EditCustomAttributes = "";
            if (!$this->ClosingAmount->Raw) {
                $this->ClosingAmount->CurrentValue = HtmlDecode($this->ClosingAmount->CurrentValue);
            }
            $this->ClosingAmount->EditValue = HtmlEncode($this->ClosingAmount->CurrentValue);
            $this->ClosingAmount->PlaceHolder = RemoveHtml($this->ClosingAmount->caption());

            // ClosingType
            $this->ClosingType->EditAttrs["class"] = "form-control";
            $this->ClosingType->EditCustomAttributes = "";
            if (!$this->ClosingType->Raw) {
                $this->ClosingType->CurrentValue = HtmlDecode($this->ClosingType->CurrentValue);
            }
            $this->ClosingType->EditValue = HtmlEncode($this->ClosingType->CurrentValue);
            $this->ClosingType->PlaceHolder = RemoveHtml($this->ClosingType->caption());

            // BillAmount
            $this->BillAmount->EditAttrs["class"] = "form-control";
            $this->BillAmount->EditCustomAttributes = "";
            if (!$this->BillAmount->Raw) {
                $this->BillAmount->CurrentValue = HtmlDecode($this->BillAmount->CurrentValue);
            }
            $this->BillAmount->EditValue = HtmlEncode($this->BillAmount->CurrentValue);
            $this->BillAmount->PlaceHolder = RemoveHtml($this->BillAmount->caption());

            // billclosedBy
            $this->billclosedBy->EditAttrs["class"] = "form-control";
            $this->billclosedBy->EditCustomAttributes = "";
            if (!$this->billclosedBy->Raw) {
                $this->billclosedBy->CurrentValue = HtmlDecode($this->billclosedBy->CurrentValue);
            }
            $this->billclosedBy->EditValue = HtmlEncode($this->billclosedBy->CurrentValue);
            $this->billclosedBy->PlaceHolder = RemoveHtml($this->billclosedBy->caption());

            // bllcloseByDate
            $this->bllcloseByDate->EditAttrs["class"] = "form-control";
            $this->bllcloseByDate->EditCustomAttributes = "";
            $this->bllcloseByDate->EditValue = HtmlEncode(FormatDateTime($this->bllcloseByDate->CurrentValue, 8));
            $this->bllcloseByDate->PlaceHolder = RemoveHtml($this->bllcloseByDate->caption());

            // ReportHeader
            $this->ReportHeader->EditAttrs["class"] = "form-control";
            $this->ReportHeader->EditCustomAttributes = "";
            if (!$this->ReportHeader->Raw) {
                $this->ReportHeader->CurrentValue = HtmlDecode($this->ReportHeader->CurrentValue);
            }
            $this->ReportHeader->EditValue = HtmlEncode($this->ReportHeader->CurrentValue);
            $this->ReportHeader->PlaceHolder = RemoveHtml($this->ReportHeader->caption());

            // Procedure
            $this->Procedure->EditAttrs["class"] = "form-control";
            $this->Procedure->EditCustomAttributes = "";
            if (!$this->Procedure->Raw) {
                $this->Procedure->CurrentValue = HtmlDecode($this->Procedure->CurrentValue);
            }
            $this->Procedure->EditValue = HtmlEncode($this->Procedure->CurrentValue);
            $this->Procedure->PlaceHolder = RemoveHtml($this->Procedure->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // Anesthetist
            $this->Anesthetist->EditAttrs["class"] = "form-control";
            $this->Anesthetist->EditCustomAttributes = "";
            if (!$this->Anesthetist->Raw) {
                $this->Anesthetist->CurrentValue = HtmlDecode($this->Anesthetist->CurrentValue);
            }
            $this->Anesthetist->EditValue = HtmlEncode($this->Anesthetist->CurrentValue);
            $this->Anesthetist->PlaceHolder = RemoveHtml($this->Anesthetist->caption());

            // Amound
            $this->Amound->EditAttrs["class"] = "form-control";
            $this->Amound->EditCustomAttributes = "";
            $this->Amound->EditValue = HtmlEncode($this->Amound->CurrentValue);
            $this->Amound->PlaceHolder = RemoveHtml($this->Amound->caption());
            if (strval($this->Amound->EditValue) != "" && is_numeric($this->Amound->EditValue)) {
                $this->Amound->EditValue = FormatNumber($this->Amound->EditValue, -2, -2, -2, -2);
            }

            // Package
            $this->Package->EditAttrs["class"] = "form-control";
            $this->Package->EditCustomAttributes = "";
            if (!$this->Package->Raw) {
                $this->Package->CurrentValue = HtmlDecode($this->Package->CurrentValue);
            }
            $this->Package->EditValue = HtmlEncode($this->Package->CurrentValue);
            $this->Package->PlaceHolder = RemoveHtml($this->Package->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // Cid
            $this->Cid->EditAttrs["class"] = "form-control";
            $this->Cid->EditCustomAttributes = "";
            $this->Cid->EditValue = HtmlEncode($this->Cid->CurrentValue);
            $this->Cid->PlaceHolder = RemoveHtml($this->Cid->caption());

            // PartId
            $this->PartId->EditAttrs["class"] = "form-control";
            $this->PartId->EditCustomAttributes = "";
            $this->PartId->EditValue = HtmlEncode($this->PartId->CurrentValue);
            $this->PartId->PlaceHolder = RemoveHtml($this->PartId->caption());

            // IDProof
            $this->IDProof->EditAttrs["class"] = "form-control";
            $this->IDProof->EditCustomAttributes = "";
            if (!$this->IDProof->Raw) {
                $this->IDProof->CurrentValue = HtmlDecode($this->IDProof->CurrentValue);
            }
            $this->IDProof->EditValue = HtmlEncode($this->IDProof->CurrentValue);
            $this->IDProof->PlaceHolder = RemoveHtml($this->IDProof->caption());

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->EditAttrs["class"] = "form-control";
            $this->AdviceToOtherHospital->EditCustomAttributes = "";
            if (!$this->AdviceToOtherHospital->Raw) {
                $this->AdviceToOtherHospital->CurrentValue = HtmlDecode($this->AdviceToOtherHospital->CurrentValue);
            }
            $this->AdviceToOtherHospital->EditValue = HtmlEncode($this->AdviceToOtherHospital->CurrentValue);
            $this->AdviceToOtherHospital->PlaceHolder = RemoveHtml($this->AdviceToOtherHospital->caption());

            // Reason
            $this->Reason->EditAttrs["class"] = "form-control";
            $this->Reason->EditCustomAttributes = "";
            $this->Reason->EditValue = HtmlEncode($this->Reason->CurrentValue);
            $this->Reason->PlaceHolder = RemoveHtml($this->Reason->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // mrnNo
            $this->mrnNo->LinkCustomAttributes = "";
            $this->mrnNo->HrefValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";

            // patient_name
            $this->patient_name->LinkCustomAttributes = "";
            $this->patient_name->HrefValue = "";

            // profilePic
            $this->profilePic->LinkCustomAttributes = "";
            $this->profilePic->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // age
            $this->age->LinkCustomAttributes = "";
            $this->age->HrefValue = "";

            // physician_id
            $this->physician_id->LinkCustomAttributes = "";
            $this->physician_id->HrefValue = "";

            // typeRegsisteration
            $this->typeRegsisteration->LinkCustomAttributes = "";
            $this->typeRegsisteration->HrefValue = "";

            // PaymentCategory
            $this->PaymentCategory->LinkCustomAttributes = "";
            $this->PaymentCategory->HrefValue = "";

            // admission_consultant_id
            $this->admission_consultant_id->LinkCustomAttributes = "";
            $this->admission_consultant_id->HrefValue = "";

            // leading_consultant_id
            $this->leading_consultant_id->LinkCustomAttributes = "";
            $this->leading_consultant_id->HrefValue = "";

            // cause
            $this->cause->LinkCustomAttributes = "";
            $this->cause->HrefValue = "";

            // admission_date
            $this->admission_date->LinkCustomAttributes = "";
            $this->admission_date->HrefValue = "";

            // release_date
            $this->release_date->LinkCustomAttributes = "";
            $this->release_date->HrefValue = "";

            // PaymentStatus
            $this->PaymentStatus->LinkCustomAttributes = "";
            $this->PaymentStatus->HrefValue = "";

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

            // mobileno
            $this->mobileno->LinkCustomAttributes = "";
            $this->mobileno->HrefValue = "";

            // BillClosing
            $this->BillClosing->LinkCustomAttributes = "";
            $this->BillClosing->HrefValue = "";

            // BillClosingDate
            $this->BillClosingDate->LinkCustomAttributes = "";
            $this->BillClosingDate->HrefValue = "";

            // BillNumber
            $this->BillNumber->LinkCustomAttributes = "";
            $this->BillNumber->HrefValue = "";

            // ClosingAmount
            $this->ClosingAmount->LinkCustomAttributes = "";
            $this->ClosingAmount->HrefValue = "";

            // ClosingType
            $this->ClosingType->LinkCustomAttributes = "";
            $this->ClosingType->HrefValue = "";

            // BillAmount
            $this->BillAmount->LinkCustomAttributes = "";
            $this->BillAmount->HrefValue = "";

            // billclosedBy
            $this->billclosedBy->LinkCustomAttributes = "";
            $this->billclosedBy->HrefValue = "";

            // bllcloseByDate
            $this->bllcloseByDate->LinkCustomAttributes = "";
            $this->bllcloseByDate->HrefValue = "";

            // ReportHeader
            $this->ReportHeader->LinkCustomAttributes = "";
            $this->ReportHeader->HrefValue = "";

            // Procedure
            $this->Procedure->LinkCustomAttributes = "";
            $this->Procedure->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // Anesthetist
            $this->Anesthetist->LinkCustomAttributes = "";
            $this->Anesthetist->HrefValue = "";

            // Amound
            $this->Amound->LinkCustomAttributes = "";
            $this->Amound->HrefValue = "";

            // Package
            $this->Package->LinkCustomAttributes = "";
            $this->Package->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";

            // Cid
            $this->Cid->LinkCustomAttributes = "";
            $this->Cid->HrefValue = "";

            // PartId
            $this->PartId->LinkCustomAttributes = "";
            $this->PartId->HrefValue = "";

            // IDProof
            $this->IDProof->LinkCustomAttributes = "";
            $this->IDProof->HrefValue = "";

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->LinkCustomAttributes = "";
            $this->AdviceToOtherHospital->HrefValue = "";

            // Reason
            $this->Reason->LinkCustomAttributes = "";
            $this->Reason->HrefValue = "";
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
        if ($this->mrnNo->Required) {
            if (!$this->mrnNo->IsDetailKey && EmptyValue($this->mrnNo->FormValue)) {
                $this->mrnNo->addErrorMessage(str_replace("%s", $this->mrnNo->caption(), $this->mrnNo->RequiredErrorMessage));
            }
        }
        if ($this->patient_id->Required) {
            if (!$this->patient_id->IsDetailKey && EmptyValue($this->patient_id->FormValue)) {
                $this->patient_id->addErrorMessage(str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient_id->FormValue)) {
            $this->patient_id->addErrorMessage($this->patient_id->getErrorMessage(false));
        }
        if ($this->patient_name->Required) {
            if (!$this->patient_name->IsDetailKey && EmptyValue($this->patient_name->FormValue)) {
                $this->patient_name->addErrorMessage(str_replace("%s", $this->patient_name->caption(), $this->patient_name->RequiredErrorMessage));
            }
        }
        if ($this->profilePic->Required) {
            if (!$this->profilePic->IsDetailKey && EmptyValue($this->profilePic->FormValue)) {
                $this->profilePic->addErrorMessage(str_replace("%s", $this->profilePic->caption(), $this->profilePic->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->age->Required) {
            if (!$this->age->IsDetailKey && EmptyValue($this->age->FormValue)) {
                $this->age->addErrorMessage(str_replace("%s", $this->age->caption(), $this->age->RequiredErrorMessage));
            }
        }
        if ($this->physician_id->Required) {
            if (!$this->physician_id->IsDetailKey && EmptyValue($this->physician_id->FormValue)) {
                $this->physician_id->addErrorMessage(str_replace("%s", $this->physician_id->caption(), $this->physician_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->physician_id->FormValue)) {
            $this->physician_id->addErrorMessage($this->physician_id->getErrorMessage(false));
        }
        if ($this->typeRegsisteration->Required) {
            if (!$this->typeRegsisteration->IsDetailKey && EmptyValue($this->typeRegsisteration->FormValue)) {
                $this->typeRegsisteration->addErrorMessage(str_replace("%s", $this->typeRegsisteration->caption(), $this->typeRegsisteration->RequiredErrorMessage));
            }
        }
        if ($this->PaymentCategory->Required) {
            if (!$this->PaymentCategory->IsDetailKey && EmptyValue($this->PaymentCategory->FormValue)) {
                $this->PaymentCategory->addErrorMessage(str_replace("%s", $this->PaymentCategory->caption(), $this->PaymentCategory->RequiredErrorMessage));
            }
        }
        if ($this->admission_consultant_id->Required) {
            if (!$this->admission_consultant_id->IsDetailKey && EmptyValue($this->admission_consultant_id->FormValue)) {
                $this->admission_consultant_id->addErrorMessage(str_replace("%s", $this->admission_consultant_id->caption(), $this->admission_consultant_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->admission_consultant_id->FormValue)) {
            $this->admission_consultant_id->addErrorMessage($this->admission_consultant_id->getErrorMessage(false));
        }
        if ($this->leading_consultant_id->Required) {
            if (!$this->leading_consultant_id->IsDetailKey && EmptyValue($this->leading_consultant_id->FormValue)) {
                $this->leading_consultant_id->addErrorMessage(str_replace("%s", $this->leading_consultant_id->caption(), $this->leading_consultant_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leading_consultant_id->FormValue)) {
            $this->leading_consultant_id->addErrorMessage($this->leading_consultant_id->getErrorMessage(false));
        }
        if ($this->cause->Required) {
            if (!$this->cause->IsDetailKey && EmptyValue($this->cause->FormValue)) {
                $this->cause->addErrorMessage(str_replace("%s", $this->cause->caption(), $this->cause->RequiredErrorMessage));
            }
        }
        if ($this->admission_date->Required) {
            if (!$this->admission_date->IsDetailKey && EmptyValue($this->admission_date->FormValue)) {
                $this->admission_date->addErrorMessage(str_replace("%s", $this->admission_date->caption(), $this->admission_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->admission_date->FormValue)) {
            $this->admission_date->addErrorMessage($this->admission_date->getErrorMessage(false));
        }
        if ($this->release_date->Required) {
            if (!$this->release_date->IsDetailKey && EmptyValue($this->release_date->FormValue)) {
                $this->release_date->addErrorMessage(str_replace("%s", $this->release_date->caption(), $this->release_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->release_date->FormValue)) {
            $this->release_date->addErrorMessage($this->release_date->getErrorMessage(false));
        }
        if ($this->PaymentStatus->Required) {
            if (!$this->PaymentStatus->IsDetailKey && EmptyValue($this->PaymentStatus->FormValue)) {
                $this->PaymentStatus->addErrorMessage(str_replace("%s", $this->PaymentStatus->caption(), $this->PaymentStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PaymentStatus->FormValue)) {
            $this->PaymentStatus->addErrorMessage($this->PaymentStatus->getErrorMessage(false));
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
        if ($this->mobileno->Required) {
            if (!$this->mobileno->IsDetailKey && EmptyValue($this->mobileno->FormValue)) {
                $this->mobileno->addErrorMessage(str_replace("%s", $this->mobileno->caption(), $this->mobileno->RequiredErrorMessage));
            }
        }
        if ($this->BillClosing->Required) {
            if (!$this->BillClosing->IsDetailKey && EmptyValue($this->BillClosing->FormValue)) {
                $this->BillClosing->addErrorMessage(str_replace("%s", $this->BillClosing->caption(), $this->BillClosing->RequiredErrorMessage));
            }
        }
        if ($this->BillClosingDate->Required) {
            if (!$this->BillClosingDate->IsDetailKey && EmptyValue($this->BillClosingDate->FormValue)) {
                $this->BillClosingDate->addErrorMessage(str_replace("%s", $this->BillClosingDate->caption(), $this->BillClosingDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->BillClosingDate->FormValue)) {
            $this->BillClosingDate->addErrorMessage($this->BillClosingDate->getErrorMessage(false));
        }
        if ($this->BillNumber->Required) {
            if (!$this->BillNumber->IsDetailKey && EmptyValue($this->BillNumber->FormValue)) {
                $this->BillNumber->addErrorMessage(str_replace("%s", $this->BillNumber->caption(), $this->BillNumber->RequiredErrorMessage));
            }
        }
        if ($this->ClosingAmount->Required) {
            if (!$this->ClosingAmount->IsDetailKey && EmptyValue($this->ClosingAmount->FormValue)) {
                $this->ClosingAmount->addErrorMessage(str_replace("%s", $this->ClosingAmount->caption(), $this->ClosingAmount->RequiredErrorMessage));
            }
        }
        if ($this->ClosingType->Required) {
            if (!$this->ClosingType->IsDetailKey && EmptyValue($this->ClosingType->FormValue)) {
                $this->ClosingType->addErrorMessage(str_replace("%s", $this->ClosingType->caption(), $this->ClosingType->RequiredErrorMessage));
            }
        }
        if ($this->BillAmount->Required) {
            if (!$this->BillAmount->IsDetailKey && EmptyValue($this->BillAmount->FormValue)) {
                $this->BillAmount->addErrorMessage(str_replace("%s", $this->BillAmount->caption(), $this->BillAmount->RequiredErrorMessage));
            }
        }
        if ($this->billclosedBy->Required) {
            if (!$this->billclosedBy->IsDetailKey && EmptyValue($this->billclosedBy->FormValue)) {
                $this->billclosedBy->addErrorMessage(str_replace("%s", $this->billclosedBy->caption(), $this->billclosedBy->RequiredErrorMessage));
            }
        }
        if ($this->bllcloseByDate->Required) {
            if (!$this->bllcloseByDate->IsDetailKey && EmptyValue($this->bllcloseByDate->FormValue)) {
                $this->bllcloseByDate->addErrorMessage(str_replace("%s", $this->bllcloseByDate->caption(), $this->bllcloseByDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->bllcloseByDate->FormValue)) {
            $this->bllcloseByDate->addErrorMessage($this->bllcloseByDate->getErrorMessage(false));
        }
        if ($this->ReportHeader->Required) {
            if (!$this->ReportHeader->IsDetailKey && EmptyValue($this->ReportHeader->FormValue)) {
                $this->ReportHeader->addErrorMessage(str_replace("%s", $this->ReportHeader->caption(), $this->ReportHeader->RequiredErrorMessage));
            }
        }
        if ($this->Procedure->Required) {
            if (!$this->Procedure->IsDetailKey && EmptyValue($this->Procedure->FormValue)) {
                $this->Procedure->addErrorMessage(str_replace("%s", $this->Procedure->caption(), $this->Procedure->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->Anesthetist->Required) {
            if (!$this->Anesthetist->IsDetailKey && EmptyValue($this->Anesthetist->FormValue)) {
                $this->Anesthetist->addErrorMessage(str_replace("%s", $this->Anesthetist->caption(), $this->Anesthetist->RequiredErrorMessage));
            }
        }
        if ($this->Amound->Required) {
            if (!$this->Amound->IsDetailKey && EmptyValue($this->Amound->FormValue)) {
                $this->Amound->addErrorMessage(str_replace("%s", $this->Amound->caption(), $this->Amound->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Amound->FormValue)) {
            $this->Amound->addErrorMessage($this->Amound->getErrorMessage(false));
        }
        if ($this->Package->Required) {
            if (!$this->Package->IsDetailKey && EmptyValue($this->Package->FormValue)) {
                $this->Package->addErrorMessage(str_replace("%s", $this->Package->caption(), $this->Package->RequiredErrorMessage));
            }
        }
        if ($this->PartnerID->Required) {
            if (!$this->PartnerID->IsDetailKey && EmptyValue($this->PartnerID->FormValue)) {
                $this->PartnerID->addErrorMessage(str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PartnerMobile->Required) {
            if (!$this->PartnerMobile->IsDetailKey && EmptyValue($this->PartnerMobile->FormValue)) {
                $this->PartnerMobile->addErrorMessage(str_replace("%s", $this->PartnerMobile->caption(), $this->PartnerMobile->RequiredErrorMessage));
            }
        }
        if ($this->Cid->Required) {
            if (!$this->Cid->IsDetailKey && EmptyValue($this->Cid->FormValue)) {
                $this->Cid->addErrorMessage(str_replace("%s", $this->Cid->caption(), $this->Cid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Cid->FormValue)) {
            $this->Cid->addErrorMessage($this->Cid->getErrorMessage(false));
        }
        if ($this->PartId->Required) {
            if (!$this->PartId->IsDetailKey && EmptyValue($this->PartId->FormValue)) {
                $this->PartId->addErrorMessage(str_replace("%s", $this->PartId->caption(), $this->PartId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PartId->FormValue)) {
            $this->PartId->addErrorMessage($this->PartId->getErrorMessage(false));
        }
        if ($this->IDProof->Required) {
            if (!$this->IDProof->IsDetailKey && EmptyValue($this->IDProof->FormValue)) {
                $this->IDProof->addErrorMessage(str_replace("%s", $this->IDProof->caption(), $this->IDProof->RequiredErrorMessage));
            }
        }
        if ($this->AdviceToOtherHospital->Required) {
            if (!$this->AdviceToOtherHospital->IsDetailKey && EmptyValue($this->AdviceToOtherHospital->FormValue)) {
                $this->AdviceToOtherHospital->addErrorMessage(str_replace("%s", $this->AdviceToOtherHospital->caption(), $this->AdviceToOtherHospital->RequiredErrorMessage));
            }
        }
        if ($this->Reason->Required) {
            if (!$this->Reason->IsDetailKey && EmptyValue($this->Reason->FormValue)) {
                $this->Reason->addErrorMessage(str_replace("%s", $this->Reason->caption(), $this->Reason->RequiredErrorMessage));
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

            // mrnNo
            $this->mrnNo->setDbValueDef($rsnew, $this->mrnNo->CurrentValue, "", $this->mrnNo->ReadOnly);

            // patient_id
            $this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, $this->patient_id->ReadOnly);

            // patient_name
            $this->patient_name->setDbValueDef($rsnew, $this->patient_name->CurrentValue, null, $this->patient_name->ReadOnly);

            // profilePic
            $this->profilePic->setDbValueDef($rsnew, $this->profilePic->CurrentValue, null, $this->profilePic->ReadOnly);

            // gender
            $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, $this->gender->ReadOnly);

            // age
            $this->age->setDbValueDef($rsnew, $this->age->CurrentValue, null, $this->age->ReadOnly);

            // physician_id
            $this->physician_id->setDbValueDef($rsnew, $this->physician_id->CurrentValue, null, $this->physician_id->ReadOnly);

            // typeRegsisteration
            $this->typeRegsisteration->setDbValueDef($rsnew, $this->typeRegsisteration->CurrentValue, null, $this->typeRegsisteration->ReadOnly);

            // PaymentCategory
            $this->PaymentCategory->setDbValueDef($rsnew, $this->PaymentCategory->CurrentValue, null, $this->PaymentCategory->ReadOnly);

            // admission_consultant_id
            $this->admission_consultant_id->setDbValueDef($rsnew, $this->admission_consultant_id->CurrentValue, null, $this->admission_consultant_id->ReadOnly);

            // leading_consultant_id
            $this->leading_consultant_id->setDbValueDef($rsnew, $this->leading_consultant_id->CurrentValue, null, $this->leading_consultant_id->ReadOnly);

            // cause
            $this->cause->setDbValueDef($rsnew, $this->cause->CurrentValue, null, $this->cause->ReadOnly);

            // admission_date
            $this->admission_date->setDbValueDef($rsnew, UnFormatDateTime($this->admission_date->CurrentValue, 0), null, $this->admission_date->ReadOnly);

            // release_date
            $this->release_date->setDbValueDef($rsnew, UnFormatDateTime($this->release_date->CurrentValue, 0), null, $this->release_date->ReadOnly);

            // PaymentStatus
            $this->PaymentStatus->setDbValueDef($rsnew, $this->PaymentStatus->CurrentValue, null, $this->PaymentStatus->ReadOnly);

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

            // ReferedByDr
            $this->ReferedByDr->setDbValueDef($rsnew, $this->ReferedByDr->CurrentValue, null, $this->ReferedByDr->ReadOnly);

            // ReferClinicname
            $this->ReferClinicname->setDbValueDef($rsnew, $this->ReferClinicname->CurrentValue, null, $this->ReferClinicname->ReadOnly);

            // ReferCity
            $this->ReferCity->setDbValueDef($rsnew, $this->ReferCity->CurrentValue, null, $this->ReferCity->ReadOnly);

            // ReferMobileNo
            $this->ReferMobileNo->setDbValueDef($rsnew, $this->ReferMobileNo->CurrentValue, null, $this->ReferMobileNo->ReadOnly);

            // ReferA4TreatingConsultant
            $this->ReferA4TreatingConsultant->setDbValueDef($rsnew, $this->ReferA4TreatingConsultant->CurrentValue, null, $this->ReferA4TreatingConsultant->ReadOnly);

            // PurposreReferredfor
            $this->PurposreReferredfor->setDbValueDef($rsnew, $this->PurposreReferredfor->CurrentValue, null, $this->PurposreReferredfor->ReadOnly);

            // mobileno
            $this->mobileno->setDbValueDef($rsnew, $this->mobileno->CurrentValue, null, $this->mobileno->ReadOnly);

            // BillClosing
            $this->BillClosing->setDbValueDef($rsnew, $this->BillClosing->CurrentValue, null, $this->BillClosing->ReadOnly);

            // BillClosingDate
            $this->BillClosingDate->setDbValueDef($rsnew, UnFormatDateTime($this->BillClosingDate->CurrentValue, 0), null, $this->BillClosingDate->ReadOnly);

            // BillNumber
            $this->BillNumber->setDbValueDef($rsnew, $this->BillNumber->CurrentValue, null, $this->BillNumber->ReadOnly);

            // ClosingAmount
            $this->ClosingAmount->setDbValueDef($rsnew, $this->ClosingAmount->CurrentValue, null, $this->ClosingAmount->ReadOnly);

            // ClosingType
            $this->ClosingType->setDbValueDef($rsnew, $this->ClosingType->CurrentValue, null, $this->ClosingType->ReadOnly);

            // BillAmount
            $this->BillAmount->setDbValueDef($rsnew, $this->BillAmount->CurrentValue, null, $this->BillAmount->ReadOnly);

            // billclosedBy
            $this->billclosedBy->setDbValueDef($rsnew, $this->billclosedBy->CurrentValue, null, $this->billclosedBy->ReadOnly);

            // bllcloseByDate
            $this->bllcloseByDate->setDbValueDef($rsnew, UnFormatDateTime($this->bllcloseByDate->CurrentValue, 0), null, $this->bllcloseByDate->ReadOnly);

            // ReportHeader
            $this->ReportHeader->setDbValueDef($rsnew, $this->ReportHeader->CurrentValue, null, $this->ReportHeader->ReadOnly);

            // Procedure
            $this->Procedure->setDbValueDef($rsnew, $this->Procedure->CurrentValue, null, $this->Procedure->ReadOnly);

            // Consultant
            $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, $this->Consultant->ReadOnly);

            // Anesthetist
            $this->Anesthetist->setDbValueDef($rsnew, $this->Anesthetist->CurrentValue, null, $this->Anesthetist->ReadOnly);

            // Amound
            $this->Amound->setDbValueDef($rsnew, $this->Amound->CurrentValue, null, $this->Amound->ReadOnly);

            // Package
            $this->Package->setDbValueDef($rsnew, $this->Package->CurrentValue, null, $this->Package->ReadOnly);

            // PartnerID
            $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, $this->PartnerID->ReadOnly);

            // PartnerName
            $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, $this->PartnerName->ReadOnly);

            // PartnerMobile
            $this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, null, $this->PartnerMobile->ReadOnly);

            // Cid
            $this->Cid->setDbValueDef($rsnew, $this->Cid->CurrentValue, null, $this->Cid->ReadOnly);

            // PartId
            $this->PartId->setDbValueDef($rsnew, $this->PartId->CurrentValue, null, $this->PartId->ReadOnly);

            // IDProof
            $this->IDProof->setDbValueDef($rsnew, $this->IDProof->CurrentValue, null, $this->IDProof->ReadOnly);

            // AdviceToOtherHospital
            $this->AdviceToOtherHospital->setDbValueDef($rsnew, $this->AdviceToOtherHospital->CurrentValue, null, $this->AdviceToOtherHospital->ReadOnly);

            // Reason
            $this->Reason->setDbValueDef($rsnew, $this->Reason->CurrentValue, null, $this->Reason->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IpAdmissionList"), "", $this->TableVar, true);
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
