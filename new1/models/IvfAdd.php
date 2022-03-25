<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfAdd extends Ivf
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf';

    // Page object name
    public $PageObjName = "IvfAdd";

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

        // Table object (ivf)
        if (!isset($GLOBALS["ivf"]) || get_class($GLOBALS["ivf"]) == PROJECT_NAMESPACE . "ivf") {
            $GLOBALS["ivf"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf');
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
                $doc = new $class(Container("ivf"));
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
                    if ($pageName == "IvfView") {
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
        $this->Male->setVisibility();
        $this->Female->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->malepropic->setVisibility();
        $this->femalepropic->setVisibility();
        $this->HusbandEducation->setVisibility();
        $this->WifeEducation->setVisibility();
        $this->HusbandWorkHours->setVisibility();
        $this->WifeWorkHours->setVisibility();
        $this->PatientLanguage->setVisibility();
        $this->ReferedBy->setVisibility();
        $this->ReferPhNo->setVisibility();
        $this->WifeCell->setVisibility();
        $this->HusbandCell->setVisibility();
        $this->WifeEmail->setVisibility();
        $this->HusbandEmail->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->CoupleID->setVisibility();
        $this->HospID->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatientID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerID->setVisibility();
        $this->DrID->setVisibility();
        $this->DrDepartment->setVisibility();
        $this->Doctor->setVisibility();
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
                    $this->terminate("IvfList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfView") {
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
        $this->Male->CurrentValue = null;
        $this->Male->OldValue = $this->Male->CurrentValue;
        $this->Female->CurrentValue = null;
        $this->Female->OldValue = $this->Female->CurrentValue;
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
        $this->malepropic->CurrentValue = null;
        $this->malepropic->OldValue = $this->malepropic->CurrentValue;
        $this->femalepropic->CurrentValue = null;
        $this->femalepropic->OldValue = $this->femalepropic->CurrentValue;
        $this->HusbandEducation->CurrentValue = null;
        $this->HusbandEducation->OldValue = $this->HusbandEducation->CurrentValue;
        $this->WifeEducation->CurrentValue = null;
        $this->WifeEducation->OldValue = $this->WifeEducation->CurrentValue;
        $this->HusbandWorkHours->CurrentValue = null;
        $this->HusbandWorkHours->OldValue = $this->HusbandWorkHours->CurrentValue;
        $this->WifeWorkHours->CurrentValue = null;
        $this->WifeWorkHours->OldValue = $this->WifeWorkHours->CurrentValue;
        $this->PatientLanguage->CurrentValue = null;
        $this->PatientLanguage->OldValue = $this->PatientLanguage->CurrentValue;
        $this->ReferedBy->CurrentValue = null;
        $this->ReferedBy->OldValue = $this->ReferedBy->CurrentValue;
        $this->ReferPhNo->CurrentValue = null;
        $this->ReferPhNo->OldValue = $this->ReferPhNo->CurrentValue;
        $this->WifeCell->CurrentValue = null;
        $this->WifeCell->OldValue = $this->WifeCell->CurrentValue;
        $this->HusbandCell->CurrentValue = null;
        $this->HusbandCell->OldValue = $this->HusbandCell->CurrentValue;
        $this->WifeEmail->CurrentValue = null;
        $this->WifeEmail->OldValue = $this->WifeEmail->CurrentValue;
        $this->HusbandEmail->CurrentValue = null;
        $this->HusbandEmail->OldValue = $this->HusbandEmail->CurrentValue;
        $this->ARTCYCLE->CurrentValue = null;
        $this->ARTCYCLE->OldValue = $this->ARTCYCLE->CurrentValue;
        $this->RESULT->CurrentValue = null;
        $this->RESULT->OldValue = $this->RESULT->CurrentValue;
        $this->CoupleID->CurrentValue = null;
        $this->CoupleID->OldValue = $this->CoupleID->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->PatientID->CurrentValue = null;
        $this->PatientID->OldValue = $this->PatientID->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PartnerID->CurrentValue = null;
        $this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
        $this->DrID->CurrentValue = null;
        $this->DrID->OldValue = $this->DrID->CurrentValue;
        $this->DrDepartment->CurrentValue = null;
        $this->DrDepartment->OldValue = $this->DrDepartment->CurrentValue;
        $this->Doctor->CurrentValue = null;
        $this->Doctor->OldValue = $this->Doctor->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Male' first before field var 'x_Male'
        $val = $CurrentForm->hasValue("Male") ? $CurrentForm->getValue("Male") : $CurrentForm->getValue("x_Male");
        if (!$this->Male->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Male->Visible = false; // Disable update for API request
            } else {
                $this->Male->setFormValue($val);
            }
        }

        // Check field name 'Female' first before field var 'x_Female'
        $val = $CurrentForm->hasValue("Female") ? $CurrentForm->getValue("Female") : $CurrentForm->getValue("x_Female");
        if (!$this->Female->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Female->Visible = false; // Disable update for API request
            } else {
                $this->Female->setFormValue($val);
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

        // Check field name 'malepropic' first before field var 'x_malepropic'
        $val = $CurrentForm->hasValue("malepropic") ? $CurrentForm->getValue("malepropic") : $CurrentForm->getValue("x_malepropic");
        if (!$this->malepropic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->malepropic->Visible = false; // Disable update for API request
            } else {
                $this->malepropic->setFormValue($val);
            }
        }

        // Check field name 'femalepropic' first before field var 'x_femalepropic'
        $val = $CurrentForm->hasValue("femalepropic") ? $CurrentForm->getValue("femalepropic") : $CurrentForm->getValue("x_femalepropic");
        if (!$this->femalepropic->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->femalepropic->Visible = false; // Disable update for API request
            } else {
                $this->femalepropic->setFormValue($val);
            }
        }

        // Check field name 'HusbandEducation' first before field var 'x_HusbandEducation'
        $val = $CurrentForm->hasValue("HusbandEducation") ? $CurrentForm->getValue("HusbandEducation") : $CurrentForm->getValue("x_HusbandEducation");
        if (!$this->HusbandEducation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandEducation->Visible = false; // Disable update for API request
            } else {
                $this->HusbandEducation->setFormValue($val);
            }
        }

        // Check field name 'WifeEducation' first before field var 'x_WifeEducation'
        $val = $CurrentForm->hasValue("WifeEducation") ? $CurrentForm->getValue("WifeEducation") : $CurrentForm->getValue("x_WifeEducation");
        if (!$this->WifeEducation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WifeEducation->Visible = false; // Disable update for API request
            } else {
                $this->WifeEducation->setFormValue($val);
            }
        }

        // Check field name 'HusbandWorkHours' first before field var 'x_HusbandWorkHours'
        $val = $CurrentForm->hasValue("HusbandWorkHours") ? $CurrentForm->getValue("HusbandWorkHours") : $CurrentForm->getValue("x_HusbandWorkHours");
        if (!$this->HusbandWorkHours->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandWorkHours->Visible = false; // Disable update for API request
            } else {
                $this->HusbandWorkHours->setFormValue($val);
            }
        }

        // Check field name 'WifeWorkHours' first before field var 'x_WifeWorkHours'
        $val = $CurrentForm->hasValue("WifeWorkHours") ? $CurrentForm->getValue("WifeWorkHours") : $CurrentForm->getValue("x_WifeWorkHours");
        if (!$this->WifeWorkHours->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WifeWorkHours->Visible = false; // Disable update for API request
            } else {
                $this->WifeWorkHours->setFormValue($val);
            }
        }

        // Check field name 'PatientLanguage' first before field var 'x_PatientLanguage'
        $val = $CurrentForm->hasValue("PatientLanguage") ? $CurrentForm->getValue("PatientLanguage") : $CurrentForm->getValue("x_PatientLanguage");
        if (!$this->PatientLanguage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientLanguage->Visible = false; // Disable update for API request
            } else {
                $this->PatientLanguage->setFormValue($val);
            }
        }

        // Check field name 'ReferedBy' first before field var 'x_ReferedBy'
        $val = $CurrentForm->hasValue("ReferedBy") ? $CurrentForm->getValue("ReferedBy") : $CurrentForm->getValue("x_ReferedBy");
        if (!$this->ReferedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferedBy->Visible = false; // Disable update for API request
            } else {
                $this->ReferedBy->setFormValue($val);
            }
        }

        // Check field name 'ReferPhNo' first before field var 'x_ReferPhNo'
        $val = $CurrentForm->hasValue("ReferPhNo") ? $CurrentForm->getValue("ReferPhNo") : $CurrentForm->getValue("x_ReferPhNo");
        if (!$this->ReferPhNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReferPhNo->Visible = false; // Disable update for API request
            } else {
                $this->ReferPhNo->setFormValue($val);
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

        // Check field name 'WifeEmail' first before field var 'x_WifeEmail'
        $val = $CurrentForm->hasValue("WifeEmail") ? $CurrentForm->getValue("WifeEmail") : $CurrentForm->getValue("x_WifeEmail");
        if (!$this->WifeEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->WifeEmail->Visible = false; // Disable update for API request
            } else {
                $this->WifeEmail->setFormValue($val);
            }
        }

        // Check field name 'HusbandEmail' first before field var 'x_HusbandEmail'
        $val = $CurrentForm->hasValue("HusbandEmail") ? $CurrentForm->getValue("HusbandEmail") : $CurrentForm->getValue("x_HusbandEmail");
        if (!$this->HusbandEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandEmail->Visible = false; // Disable update for API request
            } else {
                $this->HusbandEmail->setFormValue($val);
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

        // Check field name 'CoupleID' first before field var 'x_CoupleID'
        $val = $CurrentForm->hasValue("CoupleID") ? $CurrentForm->getValue("CoupleID") : $CurrentForm->getValue("x_CoupleID");
        if (!$this->CoupleID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CoupleID->Visible = false; // Disable update for API request
            } else {
                $this->CoupleID->setFormValue($val);
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

        // Check field name 'DrID' first before field var 'x_DrID'
        $val = $CurrentForm->hasValue("DrID") ? $CurrentForm->getValue("DrID") : $CurrentForm->getValue("x_DrID");
        if (!$this->DrID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrID->Visible = false; // Disable update for API request
            } else {
                $this->DrID->setFormValue($val);
            }
        }

        // Check field name 'DrDepartment' first before field var 'x_DrDepartment'
        $val = $CurrentForm->hasValue("DrDepartment") ? $CurrentForm->getValue("DrDepartment") : $CurrentForm->getValue("x_DrDepartment");
        if (!$this->DrDepartment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DrDepartment->Visible = false; // Disable update for API request
            } else {
                $this->DrDepartment->setFormValue($val);
            }
        }

        // Check field name 'Doctor' first before field var 'x_Doctor'
        $val = $CurrentForm->hasValue("Doctor") ? $CurrentForm->getValue("Doctor") : $CurrentForm->getValue("x_Doctor");
        if (!$this->Doctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Doctor->Visible = false; // Disable update for API request
            } else {
                $this->Doctor->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Male->CurrentValue = $this->Male->FormValue;
        $this->Female->CurrentValue = $this->Female->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->malepropic->CurrentValue = $this->malepropic->FormValue;
        $this->femalepropic->CurrentValue = $this->femalepropic->FormValue;
        $this->HusbandEducation->CurrentValue = $this->HusbandEducation->FormValue;
        $this->WifeEducation->CurrentValue = $this->WifeEducation->FormValue;
        $this->HusbandWorkHours->CurrentValue = $this->HusbandWorkHours->FormValue;
        $this->WifeWorkHours->CurrentValue = $this->WifeWorkHours->FormValue;
        $this->PatientLanguage->CurrentValue = $this->PatientLanguage->FormValue;
        $this->ReferedBy->CurrentValue = $this->ReferedBy->FormValue;
        $this->ReferPhNo->CurrentValue = $this->ReferPhNo->FormValue;
        $this->WifeCell->CurrentValue = $this->WifeCell->FormValue;
        $this->HusbandCell->CurrentValue = $this->HusbandCell->FormValue;
        $this->WifeEmail->CurrentValue = $this->WifeEmail->FormValue;
        $this->HusbandEmail->CurrentValue = $this->HusbandEmail->FormValue;
        $this->ARTCYCLE->CurrentValue = $this->ARTCYCLE->FormValue;
        $this->RESULT->CurrentValue = $this->RESULT->FormValue;
        $this->CoupleID->CurrentValue = $this->CoupleID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->PatientID->CurrentValue = $this->PatientID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->DrDepartment->CurrentValue = $this->DrDepartment->FormValue;
        $this->Doctor->CurrentValue = $this->Doctor->FormValue;
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
        $this->Male->setDbValue($row['Male']);
        $this->Female->setDbValue($row['Female']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->malepropic->setDbValue($row['malepropic']);
        $this->femalepropic->setDbValue($row['femalepropic']);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->WifeEmail->setDbValue($row['WifeEmail']);
        $this->HusbandEmail->setDbValue($row['HusbandEmail']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->DrID->setDbValue($row['DrID']);
        $this->DrDepartment->setDbValue($row['DrDepartment']);
        $this->Doctor->setDbValue($row['Doctor']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Male'] = $this->Male->CurrentValue;
        $row['Female'] = $this->Female->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['malepropic'] = $this->malepropic->CurrentValue;
        $row['femalepropic'] = $this->femalepropic->CurrentValue;
        $row['HusbandEducation'] = $this->HusbandEducation->CurrentValue;
        $row['WifeEducation'] = $this->WifeEducation->CurrentValue;
        $row['HusbandWorkHours'] = $this->HusbandWorkHours->CurrentValue;
        $row['WifeWorkHours'] = $this->WifeWorkHours->CurrentValue;
        $row['PatientLanguage'] = $this->PatientLanguage->CurrentValue;
        $row['ReferedBy'] = $this->ReferedBy->CurrentValue;
        $row['ReferPhNo'] = $this->ReferPhNo->CurrentValue;
        $row['WifeCell'] = $this->WifeCell->CurrentValue;
        $row['HusbandCell'] = $this->HusbandCell->CurrentValue;
        $row['WifeEmail'] = $this->WifeEmail->CurrentValue;
        $row['HusbandEmail'] = $this->HusbandEmail->CurrentValue;
        $row['ARTCYCLE'] = $this->ARTCYCLE->CurrentValue;
        $row['RESULT'] = $this->RESULT->CurrentValue;
        $row['CoupleID'] = $this->CoupleID->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['PatientID'] = $this->PatientID->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PartnerID'] = $this->PartnerID->CurrentValue;
        $row['DrID'] = $this->DrID->CurrentValue;
        $row['DrDepartment'] = $this->DrDepartment->CurrentValue;
        $row['Doctor'] = $this->Doctor->CurrentValue;
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

        // Male

        // Female

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // WifeCell

        // HusbandCell

        // WifeEmail

        // HusbandEmail

        // ARTCYCLE

        // RESULT

        // CoupleID

        // HospID

        // PatientName

        // PatientID

        // PartnerName

        // PartnerID

        // DrID

        // DrDepartment

        // Doctor
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Male
            $this->Male->ViewValue = $this->Male->CurrentValue;
            $this->Male->ViewValue = FormatNumber($this->Male->ViewValue, 0, -2, -2, -2);
            $this->Male->ViewCustomAttributes = "";

            // Female
            $this->Female->ViewValue = $this->Female->CurrentValue;
            $this->Female->ViewValue = FormatNumber($this->Female->ViewValue, 0, -2, -2, -2);
            $this->Female->ViewCustomAttributes = "";

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

            // malepropic
            $this->malepropic->ViewValue = $this->malepropic->CurrentValue;
            $this->malepropic->ViewCustomAttributes = "";

            // femalepropic
            $this->femalepropic->ViewValue = $this->femalepropic->CurrentValue;
            $this->femalepropic->ViewCustomAttributes = "";

            // HusbandEducation
            $this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
            $this->HusbandEducation->ViewCustomAttributes = "";

            // WifeEducation
            $this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
            $this->WifeEducation->ViewCustomAttributes = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
            $this->HusbandWorkHours->ViewCustomAttributes = "";

            // WifeWorkHours
            $this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
            $this->WifeWorkHours->ViewCustomAttributes = "";

            // PatientLanguage
            $this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
            $this->PatientLanguage->ViewCustomAttributes = "";

            // ReferedBy
            $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
            $this->ReferedBy->ViewCustomAttributes = "";

            // ReferPhNo
            $this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
            $this->ReferPhNo->ViewCustomAttributes = "";

            // WifeCell
            $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
            $this->WifeCell->ViewCustomAttributes = "";

            // HusbandCell
            $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
            $this->HusbandCell->ViewCustomAttributes = "";

            // WifeEmail
            $this->WifeEmail->ViewValue = $this->WifeEmail->CurrentValue;
            $this->WifeEmail->ViewCustomAttributes = "";

            // HusbandEmail
            $this->HusbandEmail->ViewValue = $this->HusbandEmail->CurrentValue;
            $this->HusbandEmail->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // DrDepartment
            $this->DrDepartment->ViewValue = $this->DrDepartment->CurrentValue;
            $this->DrDepartment->ViewCustomAttributes = "";

            // Doctor
            $this->Doctor->ViewValue = $this->Doctor->CurrentValue;
            $this->Doctor->ViewCustomAttributes = "";

            // Male
            $this->Male->LinkCustomAttributes = "";
            $this->Male->HrefValue = "";
            $this->Male->TooltipValue = "";

            // Female
            $this->Female->LinkCustomAttributes = "";
            $this->Female->HrefValue = "";
            $this->Female->TooltipValue = "";

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

            // malepropic
            $this->malepropic->LinkCustomAttributes = "";
            $this->malepropic->HrefValue = "";
            $this->malepropic->TooltipValue = "";

            // femalepropic
            $this->femalepropic->LinkCustomAttributes = "";
            $this->femalepropic->HrefValue = "";
            $this->femalepropic->TooltipValue = "";

            // HusbandEducation
            $this->HusbandEducation->LinkCustomAttributes = "";
            $this->HusbandEducation->HrefValue = "";
            $this->HusbandEducation->TooltipValue = "";

            // WifeEducation
            $this->WifeEducation->LinkCustomAttributes = "";
            $this->WifeEducation->HrefValue = "";
            $this->WifeEducation->TooltipValue = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->LinkCustomAttributes = "";
            $this->HusbandWorkHours->HrefValue = "";
            $this->HusbandWorkHours->TooltipValue = "";

            // WifeWorkHours
            $this->WifeWorkHours->LinkCustomAttributes = "";
            $this->WifeWorkHours->HrefValue = "";
            $this->WifeWorkHours->TooltipValue = "";

            // PatientLanguage
            $this->PatientLanguage->LinkCustomAttributes = "";
            $this->PatientLanguage->HrefValue = "";
            $this->PatientLanguage->TooltipValue = "";

            // ReferedBy
            $this->ReferedBy->LinkCustomAttributes = "";
            $this->ReferedBy->HrefValue = "";
            $this->ReferedBy->TooltipValue = "";

            // ReferPhNo
            $this->ReferPhNo->LinkCustomAttributes = "";
            $this->ReferPhNo->HrefValue = "";
            $this->ReferPhNo->TooltipValue = "";

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";
            $this->WifeCell->TooltipValue = "";

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";
            $this->HusbandCell->TooltipValue = "";

            // WifeEmail
            $this->WifeEmail->LinkCustomAttributes = "";
            $this->WifeEmail->HrefValue = "";
            $this->WifeEmail->TooltipValue = "";

            // HusbandEmail
            $this->HusbandEmail->LinkCustomAttributes = "";
            $this->HusbandEmail->HrefValue = "";
            $this->HusbandEmail->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

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

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";
            $this->DrDepartment->TooltipValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
            $this->Doctor->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Male
            $this->Male->EditAttrs["class"] = "form-control";
            $this->Male->EditCustomAttributes = "";
            $this->Male->EditValue = HtmlEncode($this->Male->CurrentValue);
            $this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

            // Female
            $this->Female->EditAttrs["class"] = "form-control";
            $this->Female->EditCustomAttributes = "";
            $this->Female->EditValue = HtmlEncode($this->Female->CurrentValue);
            $this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

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

            // malepropic
            $this->malepropic->EditAttrs["class"] = "form-control";
            $this->malepropic->EditCustomAttributes = "";
            $this->malepropic->EditValue = HtmlEncode($this->malepropic->CurrentValue);
            $this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

            // femalepropic
            $this->femalepropic->EditAttrs["class"] = "form-control";
            $this->femalepropic->EditCustomAttributes = "";
            $this->femalepropic->EditValue = HtmlEncode($this->femalepropic->CurrentValue);
            $this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

            // HusbandEducation
            $this->HusbandEducation->EditAttrs["class"] = "form-control";
            $this->HusbandEducation->EditCustomAttributes = "";
            if (!$this->HusbandEducation->Raw) {
                $this->HusbandEducation->CurrentValue = HtmlDecode($this->HusbandEducation->CurrentValue);
            }
            $this->HusbandEducation->EditValue = HtmlEncode($this->HusbandEducation->CurrentValue);
            $this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

            // WifeEducation
            $this->WifeEducation->EditAttrs["class"] = "form-control";
            $this->WifeEducation->EditCustomAttributes = "";
            if (!$this->WifeEducation->Raw) {
                $this->WifeEducation->CurrentValue = HtmlDecode($this->WifeEducation->CurrentValue);
            }
            $this->WifeEducation->EditValue = HtmlEncode($this->WifeEducation->CurrentValue);
            $this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

            // HusbandWorkHours
            $this->HusbandWorkHours->EditAttrs["class"] = "form-control";
            $this->HusbandWorkHours->EditCustomAttributes = "";
            if (!$this->HusbandWorkHours->Raw) {
                $this->HusbandWorkHours->CurrentValue = HtmlDecode($this->HusbandWorkHours->CurrentValue);
            }
            $this->HusbandWorkHours->EditValue = HtmlEncode($this->HusbandWorkHours->CurrentValue);
            $this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

            // WifeWorkHours
            $this->WifeWorkHours->EditAttrs["class"] = "form-control";
            $this->WifeWorkHours->EditCustomAttributes = "";
            if (!$this->WifeWorkHours->Raw) {
                $this->WifeWorkHours->CurrentValue = HtmlDecode($this->WifeWorkHours->CurrentValue);
            }
            $this->WifeWorkHours->EditValue = HtmlEncode($this->WifeWorkHours->CurrentValue);
            $this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

            // PatientLanguage
            $this->PatientLanguage->EditAttrs["class"] = "form-control";
            $this->PatientLanguage->EditCustomAttributes = "";
            if (!$this->PatientLanguage->Raw) {
                $this->PatientLanguage->CurrentValue = HtmlDecode($this->PatientLanguage->CurrentValue);
            }
            $this->PatientLanguage->EditValue = HtmlEncode($this->PatientLanguage->CurrentValue);
            $this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

            // ReferedBy
            $this->ReferedBy->EditAttrs["class"] = "form-control";
            $this->ReferedBy->EditCustomAttributes = "";
            if (!$this->ReferedBy->Raw) {
                $this->ReferedBy->CurrentValue = HtmlDecode($this->ReferedBy->CurrentValue);
            }
            $this->ReferedBy->EditValue = HtmlEncode($this->ReferedBy->CurrentValue);
            $this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

            // ReferPhNo
            $this->ReferPhNo->EditAttrs["class"] = "form-control";
            $this->ReferPhNo->EditCustomAttributes = "";
            if (!$this->ReferPhNo->Raw) {
                $this->ReferPhNo->CurrentValue = HtmlDecode($this->ReferPhNo->CurrentValue);
            }
            $this->ReferPhNo->EditValue = HtmlEncode($this->ReferPhNo->CurrentValue);
            $this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

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

            // WifeEmail
            $this->WifeEmail->EditAttrs["class"] = "form-control";
            $this->WifeEmail->EditCustomAttributes = "";
            if (!$this->WifeEmail->Raw) {
                $this->WifeEmail->CurrentValue = HtmlDecode($this->WifeEmail->CurrentValue);
            }
            $this->WifeEmail->EditValue = HtmlEncode($this->WifeEmail->CurrentValue);
            $this->WifeEmail->PlaceHolder = RemoveHtml($this->WifeEmail->caption());

            // HusbandEmail
            $this->HusbandEmail->EditAttrs["class"] = "form-control";
            $this->HusbandEmail->EditCustomAttributes = "";
            if (!$this->HusbandEmail->Raw) {
                $this->HusbandEmail->CurrentValue = HtmlDecode($this->HusbandEmail->CurrentValue);
            }
            $this->HusbandEmail->EditValue = HtmlEncode($this->HusbandEmail->CurrentValue);
            $this->HusbandEmail->PlaceHolder = RemoveHtml($this->HusbandEmail->caption());

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

            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->CurrentValue = HtmlDecode($this->CoupleID->CurrentValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->CurrentValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // DrDepartment
            $this->DrDepartment->EditAttrs["class"] = "form-control";
            $this->DrDepartment->EditCustomAttributes = "";
            if (!$this->DrDepartment->Raw) {
                $this->DrDepartment->CurrentValue = HtmlDecode($this->DrDepartment->CurrentValue);
            }
            $this->DrDepartment->EditValue = HtmlEncode($this->DrDepartment->CurrentValue);
            $this->DrDepartment->PlaceHolder = RemoveHtml($this->DrDepartment->caption());

            // Doctor
            $this->Doctor->EditAttrs["class"] = "form-control";
            $this->Doctor->EditCustomAttributes = "";
            if (!$this->Doctor->Raw) {
                $this->Doctor->CurrentValue = HtmlDecode($this->Doctor->CurrentValue);
            }
            $this->Doctor->EditValue = HtmlEncode($this->Doctor->CurrentValue);
            $this->Doctor->PlaceHolder = RemoveHtml($this->Doctor->caption());

            // Add refer script

            // Male
            $this->Male->LinkCustomAttributes = "";
            $this->Male->HrefValue = "";

            // Female
            $this->Female->LinkCustomAttributes = "";
            $this->Female->HrefValue = "";

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

            // malepropic
            $this->malepropic->LinkCustomAttributes = "";
            $this->malepropic->HrefValue = "";

            // femalepropic
            $this->femalepropic->LinkCustomAttributes = "";
            $this->femalepropic->HrefValue = "";

            // HusbandEducation
            $this->HusbandEducation->LinkCustomAttributes = "";
            $this->HusbandEducation->HrefValue = "";

            // WifeEducation
            $this->WifeEducation->LinkCustomAttributes = "";
            $this->WifeEducation->HrefValue = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->LinkCustomAttributes = "";
            $this->HusbandWorkHours->HrefValue = "";

            // WifeWorkHours
            $this->WifeWorkHours->LinkCustomAttributes = "";
            $this->WifeWorkHours->HrefValue = "";

            // PatientLanguage
            $this->PatientLanguage->LinkCustomAttributes = "";
            $this->PatientLanguage->HrefValue = "";

            // ReferedBy
            $this->ReferedBy->LinkCustomAttributes = "";
            $this->ReferedBy->HrefValue = "";

            // ReferPhNo
            $this->ReferPhNo->LinkCustomAttributes = "";
            $this->ReferPhNo->HrefValue = "";

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";

            // WifeEmail
            $this->WifeEmail->LinkCustomAttributes = "";
            $this->WifeEmail->HrefValue = "";

            // HusbandEmail
            $this->HusbandEmail->LinkCustomAttributes = "";
            $this->HusbandEmail->HrefValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

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

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // DrDepartment
            $this->DrDepartment->LinkCustomAttributes = "";
            $this->DrDepartment->HrefValue = "";

            // Doctor
            $this->Doctor->LinkCustomAttributes = "";
            $this->Doctor->HrefValue = "";
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
        if ($this->Male->Required) {
            if (!$this->Male->IsDetailKey && EmptyValue($this->Male->FormValue)) {
                $this->Male->addErrorMessage(str_replace("%s", $this->Male->caption(), $this->Male->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Male->FormValue)) {
            $this->Male->addErrorMessage($this->Male->getErrorMessage(false));
        }
        if ($this->Female->Required) {
            if (!$this->Female->IsDetailKey && EmptyValue($this->Female->FormValue)) {
                $this->Female->addErrorMessage(str_replace("%s", $this->Female->caption(), $this->Female->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Female->FormValue)) {
            $this->Female->addErrorMessage($this->Female->getErrorMessage(false));
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
        if ($this->malepropic->Required) {
            if (!$this->malepropic->IsDetailKey && EmptyValue($this->malepropic->FormValue)) {
                $this->malepropic->addErrorMessage(str_replace("%s", $this->malepropic->caption(), $this->malepropic->RequiredErrorMessage));
            }
        }
        if ($this->femalepropic->Required) {
            if (!$this->femalepropic->IsDetailKey && EmptyValue($this->femalepropic->FormValue)) {
                $this->femalepropic->addErrorMessage(str_replace("%s", $this->femalepropic->caption(), $this->femalepropic->RequiredErrorMessage));
            }
        }
        if ($this->HusbandEducation->Required) {
            if (!$this->HusbandEducation->IsDetailKey && EmptyValue($this->HusbandEducation->FormValue)) {
                $this->HusbandEducation->addErrorMessage(str_replace("%s", $this->HusbandEducation->caption(), $this->HusbandEducation->RequiredErrorMessage));
            }
        }
        if ($this->WifeEducation->Required) {
            if (!$this->WifeEducation->IsDetailKey && EmptyValue($this->WifeEducation->FormValue)) {
                $this->WifeEducation->addErrorMessage(str_replace("%s", $this->WifeEducation->caption(), $this->WifeEducation->RequiredErrorMessage));
            }
        }
        if ($this->HusbandWorkHours->Required) {
            if (!$this->HusbandWorkHours->IsDetailKey && EmptyValue($this->HusbandWorkHours->FormValue)) {
                $this->HusbandWorkHours->addErrorMessage(str_replace("%s", $this->HusbandWorkHours->caption(), $this->HusbandWorkHours->RequiredErrorMessage));
            }
        }
        if ($this->WifeWorkHours->Required) {
            if (!$this->WifeWorkHours->IsDetailKey && EmptyValue($this->WifeWorkHours->FormValue)) {
                $this->WifeWorkHours->addErrorMessage(str_replace("%s", $this->WifeWorkHours->caption(), $this->WifeWorkHours->RequiredErrorMessage));
            }
        }
        if ($this->PatientLanguage->Required) {
            if (!$this->PatientLanguage->IsDetailKey && EmptyValue($this->PatientLanguage->FormValue)) {
                $this->PatientLanguage->addErrorMessage(str_replace("%s", $this->PatientLanguage->caption(), $this->PatientLanguage->RequiredErrorMessage));
            }
        }
        if ($this->ReferedBy->Required) {
            if (!$this->ReferedBy->IsDetailKey && EmptyValue($this->ReferedBy->FormValue)) {
                $this->ReferedBy->addErrorMessage(str_replace("%s", $this->ReferedBy->caption(), $this->ReferedBy->RequiredErrorMessage));
            }
        }
        if ($this->ReferPhNo->Required) {
            if (!$this->ReferPhNo->IsDetailKey && EmptyValue($this->ReferPhNo->FormValue)) {
                $this->ReferPhNo->addErrorMessage(str_replace("%s", $this->ReferPhNo->caption(), $this->ReferPhNo->RequiredErrorMessage));
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
        if ($this->WifeEmail->Required) {
            if (!$this->WifeEmail->IsDetailKey && EmptyValue($this->WifeEmail->FormValue)) {
                $this->WifeEmail->addErrorMessage(str_replace("%s", $this->WifeEmail->caption(), $this->WifeEmail->RequiredErrorMessage));
            }
        }
        if ($this->HusbandEmail->Required) {
            if (!$this->HusbandEmail->IsDetailKey && EmptyValue($this->HusbandEmail->FormValue)) {
                $this->HusbandEmail->addErrorMessage(str_replace("%s", $this->HusbandEmail->caption(), $this->HusbandEmail->RequiredErrorMessage));
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
        if ($this->CoupleID->Required) {
            if (!$this->CoupleID->IsDetailKey && EmptyValue($this->CoupleID->FormValue)) {
                $this->CoupleID->addErrorMessage(str_replace("%s", $this->CoupleID->caption(), $this->CoupleID->RequiredErrorMessage));
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
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrID->FormValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
        }
        if ($this->DrDepartment->Required) {
            if (!$this->DrDepartment->IsDetailKey && EmptyValue($this->DrDepartment->FormValue)) {
                $this->DrDepartment->addErrorMessage(str_replace("%s", $this->DrDepartment->caption(), $this->DrDepartment->RequiredErrorMessage));
            }
        }
        if ($this->Doctor->Required) {
            if (!$this->Doctor->IsDetailKey && EmptyValue($this->Doctor->FormValue)) {
                $this->Doctor->addErrorMessage(str_replace("%s", $this->Doctor->caption(), $this->Doctor->RequiredErrorMessage));
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

        // Male
        $this->Male->setDbValueDef($rsnew, $this->Male->CurrentValue, 0, false);

        // Female
        $this->Female->setDbValueDef($rsnew, $this->Female->CurrentValue, 0, false);

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

        // malepropic
        $this->malepropic->setDbValueDef($rsnew, $this->malepropic->CurrentValue, null, false);

        // femalepropic
        $this->femalepropic->setDbValueDef($rsnew, $this->femalepropic->CurrentValue, null, false);

        // HusbandEducation
        $this->HusbandEducation->setDbValueDef($rsnew, $this->HusbandEducation->CurrentValue, null, false);

        // WifeEducation
        $this->WifeEducation->setDbValueDef($rsnew, $this->WifeEducation->CurrentValue, null, false);

        // HusbandWorkHours
        $this->HusbandWorkHours->setDbValueDef($rsnew, $this->HusbandWorkHours->CurrentValue, null, false);

        // WifeWorkHours
        $this->WifeWorkHours->setDbValueDef($rsnew, $this->WifeWorkHours->CurrentValue, null, false);

        // PatientLanguage
        $this->PatientLanguage->setDbValueDef($rsnew, $this->PatientLanguage->CurrentValue, null, false);

        // ReferedBy
        $this->ReferedBy->setDbValueDef($rsnew, $this->ReferedBy->CurrentValue, null, false);

        // ReferPhNo
        $this->ReferPhNo->setDbValueDef($rsnew, $this->ReferPhNo->CurrentValue, null, false);

        // WifeCell
        $this->WifeCell->setDbValueDef($rsnew, $this->WifeCell->CurrentValue, null, false);

        // HusbandCell
        $this->HusbandCell->setDbValueDef($rsnew, $this->HusbandCell->CurrentValue, null, false);

        // WifeEmail
        $this->WifeEmail->setDbValueDef($rsnew, $this->WifeEmail->CurrentValue, null, false);

        // HusbandEmail
        $this->HusbandEmail->setDbValueDef($rsnew, $this->HusbandEmail->CurrentValue, null, false);

        // ARTCYCLE
        $this->ARTCYCLE->setDbValueDef($rsnew, $this->ARTCYCLE->CurrentValue, null, false);

        // RESULT
        $this->RESULT->setDbValueDef($rsnew, $this->RESULT->CurrentValue, null, false);

        // CoupleID
        $this->CoupleID->setDbValueDef($rsnew, $this->CoupleID->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // PatientID
        $this->PatientID->setDbValueDef($rsnew, $this->PatientID->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // PartnerID
        $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, false);

        // DrID
        $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, false);

        // DrDepartment
        $this->DrDepartment->setDbValueDef($rsnew, $this->DrDepartment->CurrentValue, null, false);

        // Doctor
        $this->Doctor->setDbValueDef($rsnew, $this->Doctor->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfList"), "", $this->TableVar, true);
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
