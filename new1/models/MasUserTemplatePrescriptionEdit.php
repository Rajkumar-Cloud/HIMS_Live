<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class MasUserTemplatePrescriptionEdit extends MasUserTemplatePrescription
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'mas_user_template_prescription';

    // Page object name
    public $PageObjName = "MasUserTemplatePrescriptionEdit";

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

        // Table object (mas_user_template_prescription)
        if (!isset($GLOBALS["mas_user_template_prescription"]) || get_class($GLOBALS["mas_user_template_prescription"]) == PROJECT_NAMESPACE . "mas_user_template_prescription") {
            $GLOBALS["mas_user_template_prescription"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'mas_user_template_prescription');
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
                $doc = new $class(Container("mas_user_template_prescription"));
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
                    if ($pageName == "MasUserTemplatePrescriptionView") {
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
        $this->TemplateName->setVisibility();
        $this->Medicine->setVisibility();
        $this->M->setVisibility();
        $this->A->setVisibility();
        $this->N->setVisibility();
        $this->NoOfDays->setVisibility();
        $this->PreRoute->setVisibility();
        $this->TimeOfTaking->setVisibility();
        $this->Type->setVisibility();
        $this->Status->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreateDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
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
                    $this->terminate("MasUserTemplatePrescriptionList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "MasUserTemplatePrescriptionList") {
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

        // Check field name 'TemplateName' first before field var 'x_TemplateName'
        $val = $CurrentForm->hasValue("TemplateName") ? $CurrentForm->getValue("TemplateName") : $CurrentForm->getValue("x_TemplateName");
        if (!$this->TemplateName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateName->Visible = false; // Disable update for API request
            } else {
                $this->TemplateName->setFormValue($val);
            }
        }

        // Check field name 'Medicine' first before field var 'x_Medicine'
        $val = $CurrentForm->hasValue("Medicine") ? $CurrentForm->getValue("Medicine") : $CurrentForm->getValue("x_Medicine");
        if (!$this->Medicine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicine->Visible = false; // Disable update for API request
            } else {
                $this->Medicine->setFormValue($val);
            }
        }

        // Check field name 'M' first before field var 'x_M'
        $val = $CurrentForm->hasValue("M") ? $CurrentForm->getValue("M") : $CurrentForm->getValue("x_M");
        if (!$this->M->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->M->Visible = false; // Disable update for API request
            } else {
                $this->M->setFormValue($val);
            }
        }

        // Check field name 'A' first before field var 'x_A'
        $val = $CurrentForm->hasValue("A") ? $CurrentForm->getValue("A") : $CurrentForm->getValue("x_A");
        if (!$this->A->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A->Visible = false; // Disable update for API request
            } else {
                $this->A->setFormValue($val);
            }
        }

        // Check field name 'N' first before field var 'x_N'
        $val = $CurrentForm->hasValue("N") ? $CurrentForm->getValue("N") : $CurrentForm->getValue("x_N");
        if (!$this->N->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->N->Visible = false; // Disable update for API request
            } else {
                $this->N->setFormValue($val);
            }
        }

        // Check field name 'NoOfDays' first before field var 'x_NoOfDays'
        $val = $CurrentForm->hasValue("NoOfDays") ? $CurrentForm->getValue("NoOfDays") : $CurrentForm->getValue("x_NoOfDays");
        if (!$this->NoOfDays->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfDays->Visible = false; // Disable update for API request
            } else {
                $this->NoOfDays->setFormValue($val);
            }
        }

        // Check field name 'PreRoute' first before field var 'x_PreRoute'
        $val = $CurrentForm->hasValue("PreRoute") ? $CurrentForm->getValue("PreRoute") : $CurrentForm->getValue("x_PreRoute");
        if (!$this->PreRoute->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreRoute->Visible = false; // Disable update for API request
            } else {
                $this->PreRoute->setFormValue($val);
            }
        }

        // Check field name 'TimeOfTaking' first before field var 'x_TimeOfTaking'
        $val = $CurrentForm->hasValue("TimeOfTaking") ? $CurrentForm->getValue("TimeOfTaking") : $CurrentForm->getValue("x_TimeOfTaking");
        if (!$this->TimeOfTaking->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TimeOfTaking->Visible = false; // Disable update for API request
            } else {
                $this->TimeOfTaking->setFormValue($val);
            }
        }

        // Check field name 'Type' first before field var 'x_Type'
        $val = $CurrentForm->hasValue("Type") ? $CurrentForm->getValue("Type") : $CurrentForm->getValue("x_Type");
        if (!$this->Type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Type->Visible = false; // Disable update for API request
            } else {
                $this->Type->setFormValue($val);
            }
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
        }

        // Check field name 'CreatedBy' first before field var 'x_CreatedBy'
        $val = $CurrentForm->hasValue("CreatedBy") ? $CurrentForm->getValue("CreatedBy") : $CurrentForm->getValue("x_CreatedBy");
        if (!$this->CreatedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedBy->Visible = false; // Disable update for API request
            } else {
                $this->CreatedBy->setFormValue($val);
            }
        }

        // Check field name 'CreateDateTime' first before field var 'x_CreateDateTime'
        $val = $CurrentForm->hasValue("CreateDateTime") ? $CurrentForm->getValue("CreateDateTime") : $CurrentForm->getValue("x_CreateDateTime");
        if (!$this->CreateDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreateDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CreateDateTime->setFormValue($val);
            }
        }

        // Check field name 'ModifiedBy' first before field var 'x_ModifiedBy'
        $val = $CurrentForm->hasValue("ModifiedBy") ? $CurrentForm->getValue("ModifiedBy") : $CurrentForm->getValue("x_ModifiedBy");
        if (!$this->ModifiedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedBy->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedBy->setFormValue($val);
            }
        }

        // Check field name 'ModifiedDateTime' first before field var 'x_ModifiedDateTime'
        $val = $CurrentForm->hasValue("ModifiedDateTime") ? $CurrentForm->getValue("ModifiedDateTime") : $CurrentForm->getValue("x_ModifiedDateTime");
        if (!$this->ModifiedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedDateTime->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->TemplateName->CurrentValue = $this->TemplateName->FormValue;
        $this->Medicine->CurrentValue = $this->Medicine->FormValue;
        $this->M->CurrentValue = $this->M->FormValue;
        $this->A->CurrentValue = $this->A->FormValue;
        $this->N->CurrentValue = $this->N->FormValue;
        $this->NoOfDays->CurrentValue = $this->NoOfDays->FormValue;
        $this->PreRoute->CurrentValue = $this->PreRoute->FormValue;
        $this->TimeOfTaking->CurrentValue = $this->TimeOfTaking->FormValue;
        $this->Type->CurrentValue = $this->Type->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->CreateDateTime->CurrentValue = $this->CreateDateTime->FormValue;
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
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
        $this->TemplateName->setDbValue($row['TemplateName']);
        $this->Medicine->setDbValue($row['Medicine']);
        $this->M->setDbValue($row['M']);
        $this->A->setDbValue($row['A']);
        $this->N->setDbValue($row['N']);
        $this->NoOfDays->setDbValue($row['NoOfDays']);
        $this->PreRoute->setDbValue($row['PreRoute']);
        $this->TimeOfTaking->setDbValue($row['TimeOfTaking']);
        $this->Type->setDbValue($row['Type']);
        $this->Status->setDbValue($row['Status']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreateDateTime->setDbValue($row['CreateDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['TemplateName'] = null;
        $row['Medicine'] = null;
        $row['M'] = null;
        $row['A'] = null;
        $row['N'] = null;
        $row['NoOfDays'] = null;
        $row['PreRoute'] = null;
        $row['TimeOfTaking'] = null;
        $row['Type'] = null;
        $row['Status'] = null;
        $row['CreatedBy'] = null;
        $row['CreateDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
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

        // TemplateName

        // Medicine

        // M

        // A

        // N

        // NoOfDays

        // PreRoute

        // TimeOfTaking

        // Type

        // Status

        // CreatedBy

        // CreateDateTime

        // ModifiedBy

        // ModifiedDateTime
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // TemplateName
            $this->TemplateName->ViewValue = $this->TemplateName->CurrentValue;
            $this->TemplateName->ViewCustomAttributes = "";

            // Medicine
            $this->Medicine->ViewValue = $this->Medicine->CurrentValue;
            $this->Medicine->ViewCustomAttributes = "";

            // M
            $this->M->ViewValue = $this->M->CurrentValue;
            $this->M->ViewCustomAttributes = "";

            // A
            $this->A->ViewValue = $this->A->CurrentValue;
            $this->A->ViewCustomAttributes = "";

            // N
            $this->N->ViewValue = $this->N->CurrentValue;
            $this->N->ViewCustomAttributes = "";

            // NoOfDays
            $this->NoOfDays->ViewValue = $this->NoOfDays->CurrentValue;
            $this->NoOfDays->ViewCustomAttributes = "";

            // PreRoute
            $this->PreRoute->ViewValue = $this->PreRoute->CurrentValue;
            $this->PreRoute->ViewCustomAttributes = "";

            // TimeOfTaking
            $this->TimeOfTaking->ViewValue = $this->TimeOfTaking->CurrentValue;
            $this->TimeOfTaking->ViewCustomAttributes = "";

            // Type
            $this->Type->ViewValue = $this->Type->CurrentValue;
            $this->Type->ViewCustomAttributes = "";

            // Status
            $this->Status->ViewValue = $this->Status->CurrentValue;
            $this->Status->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreateDateTime
            $this->CreateDateTime->ViewValue = $this->CreateDateTime->CurrentValue;
            $this->CreateDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // TemplateName
            $this->TemplateName->LinkCustomAttributes = "";
            $this->TemplateName->HrefValue = "";
            $this->TemplateName->TooltipValue = "";

            // Medicine
            $this->Medicine->LinkCustomAttributes = "";
            $this->Medicine->HrefValue = "";
            $this->Medicine->TooltipValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";
            $this->M->TooltipValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";
            $this->A->TooltipValue = "";

            // N
            $this->N->LinkCustomAttributes = "";
            $this->N->HrefValue = "";
            $this->N->TooltipValue = "";

            // NoOfDays
            $this->NoOfDays->LinkCustomAttributes = "";
            $this->NoOfDays->HrefValue = "";
            $this->NoOfDays->TooltipValue = "";

            // PreRoute
            $this->PreRoute->LinkCustomAttributes = "";
            $this->PreRoute->HrefValue = "";
            $this->PreRoute->TooltipValue = "";

            // TimeOfTaking
            $this->TimeOfTaking->LinkCustomAttributes = "";
            $this->TimeOfTaking->HrefValue = "";
            $this->TimeOfTaking->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreateDateTime
            $this->CreateDateTime->LinkCustomAttributes = "";
            $this->CreateDateTime->HrefValue = "";
            $this->CreateDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // TemplateName
            $this->TemplateName->EditAttrs["class"] = "form-control";
            $this->TemplateName->EditCustomAttributes = "";
            if (!$this->TemplateName->Raw) {
                $this->TemplateName->CurrentValue = HtmlDecode($this->TemplateName->CurrentValue);
            }
            $this->TemplateName->EditValue = HtmlEncode($this->TemplateName->CurrentValue);
            $this->TemplateName->PlaceHolder = RemoveHtml($this->TemplateName->caption());

            // Medicine
            $this->Medicine->EditAttrs["class"] = "form-control";
            $this->Medicine->EditCustomAttributes = "";
            if (!$this->Medicine->Raw) {
                $this->Medicine->CurrentValue = HtmlDecode($this->Medicine->CurrentValue);
            }
            $this->Medicine->EditValue = HtmlEncode($this->Medicine->CurrentValue);
            $this->Medicine->PlaceHolder = RemoveHtml($this->Medicine->caption());

            // M
            $this->M->EditAttrs["class"] = "form-control";
            $this->M->EditCustomAttributes = "";
            if (!$this->M->Raw) {
                $this->M->CurrentValue = HtmlDecode($this->M->CurrentValue);
            }
            $this->M->EditValue = HtmlEncode($this->M->CurrentValue);
            $this->M->PlaceHolder = RemoveHtml($this->M->caption());

            // A
            $this->A->EditAttrs["class"] = "form-control";
            $this->A->EditCustomAttributes = "";
            if (!$this->A->Raw) {
                $this->A->CurrentValue = HtmlDecode($this->A->CurrentValue);
            }
            $this->A->EditValue = HtmlEncode($this->A->CurrentValue);
            $this->A->PlaceHolder = RemoveHtml($this->A->caption());

            // N
            $this->N->EditAttrs["class"] = "form-control";
            $this->N->EditCustomAttributes = "";
            if (!$this->N->Raw) {
                $this->N->CurrentValue = HtmlDecode($this->N->CurrentValue);
            }
            $this->N->EditValue = HtmlEncode($this->N->CurrentValue);
            $this->N->PlaceHolder = RemoveHtml($this->N->caption());

            // NoOfDays
            $this->NoOfDays->EditAttrs["class"] = "form-control";
            $this->NoOfDays->EditCustomAttributes = "";
            if (!$this->NoOfDays->Raw) {
                $this->NoOfDays->CurrentValue = HtmlDecode($this->NoOfDays->CurrentValue);
            }
            $this->NoOfDays->EditValue = HtmlEncode($this->NoOfDays->CurrentValue);
            $this->NoOfDays->PlaceHolder = RemoveHtml($this->NoOfDays->caption());

            // PreRoute
            $this->PreRoute->EditAttrs["class"] = "form-control";
            $this->PreRoute->EditCustomAttributes = "";
            if (!$this->PreRoute->Raw) {
                $this->PreRoute->CurrentValue = HtmlDecode($this->PreRoute->CurrentValue);
            }
            $this->PreRoute->EditValue = HtmlEncode($this->PreRoute->CurrentValue);
            $this->PreRoute->PlaceHolder = RemoveHtml($this->PreRoute->caption());

            // TimeOfTaking
            $this->TimeOfTaking->EditAttrs["class"] = "form-control";
            $this->TimeOfTaking->EditCustomAttributes = "";
            if (!$this->TimeOfTaking->Raw) {
                $this->TimeOfTaking->CurrentValue = HtmlDecode($this->TimeOfTaking->CurrentValue);
            }
            $this->TimeOfTaking->EditValue = HtmlEncode($this->TimeOfTaking->CurrentValue);
            $this->TimeOfTaking->PlaceHolder = RemoveHtml($this->TimeOfTaking->caption());

            // Type
            $this->Type->EditAttrs["class"] = "form-control";
            $this->Type->EditCustomAttributes = "";
            if (!$this->Type->Raw) {
                $this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
            }
            $this->Type->EditValue = HtmlEncode($this->Type->CurrentValue);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            if (!$this->Status->Raw) {
                $this->Status->CurrentValue = HtmlDecode($this->Status->CurrentValue);
            }
            $this->Status->EditValue = HtmlEncode($this->Status->CurrentValue);
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            if (!$this->CreatedBy->Raw) {
                $this->CreatedBy->CurrentValue = HtmlDecode($this->CreatedBy->CurrentValue);
            }
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreateDateTime
            $this->CreateDateTime->EditAttrs["class"] = "form-control";
            $this->CreateDateTime->EditCustomAttributes = "";
            if (!$this->CreateDateTime->Raw) {
                $this->CreateDateTime->CurrentValue = HtmlDecode($this->CreateDateTime->CurrentValue);
            }
            $this->CreateDateTime->EditValue = HtmlEncode($this->CreateDateTime->CurrentValue);
            $this->CreateDateTime->PlaceHolder = RemoveHtml($this->CreateDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            if (!$this->ModifiedBy->Raw) {
                $this->ModifiedBy->CurrentValue = HtmlDecode($this->ModifiedBy->CurrentValue);
            }
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            if (!$this->ModifiedDateTime->Raw) {
                $this->ModifiedDateTime->CurrentValue = HtmlDecode($this->ModifiedDateTime->CurrentValue);
            }
            $this->ModifiedDateTime->EditValue = HtmlEncode($this->ModifiedDateTime->CurrentValue);
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // TemplateName
            $this->TemplateName->LinkCustomAttributes = "";
            $this->TemplateName->HrefValue = "";

            // Medicine
            $this->Medicine->LinkCustomAttributes = "";
            $this->Medicine->HrefValue = "";

            // M
            $this->M->LinkCustomAttributes = "";
            $this->M->HrefValue = "";

            // A
            $this->A->LinkCustomAttributes = "";
            $this->A->HrefValue = "";

            // N
            $this->N->LinkCustomAttributes = "";
            $this->N->HrefValue = "";

            // NoOfDays
            $this->NoOfDays->LinkCustomAttributes = "";
            $this->NoOfDays->HrefValue = "";

            // PreRoute
            $this->PreRoute->LinkCustomAttributes = "";
            $this->PreRoute->HrefValue = "";

            // TimeOfTaking
            $this->TimeOfTaking->LinkCustomAttributes = "";
            $this->TimeOfTaking->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreateDateTime
            $this->CreateDateTime->LinkCustomAttributes = "";
            $this->CreateDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
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
        if ($this->TemplateName->Required) {
            if (!$this->TemplateName->IsDetailKey && EmptyValue($this->TemplateName->FormValue)) {
                $this->TemplateName->addErrorMessage(str_replace("%s", $this->TemplateName->caption(), $this->TemplateName->RequiredErrorMessage));
            }
        }
        if ($this->Medicine->Required) {
            if (!$this->Medicine->IsDetailKey && EmptyValue($this->Medicine->FormValue)) {
                $this->Medicine->addErrorMessage(str_replace("%s", $this->Medicine->caption(), $this->Medicine->RequiredErrorMessage));
            }
        }
        if ($this->M->Required) {
            if (!$this->M->IsDetailKey && EmptyValue($this->M->FormValue)) {
                $this->M->addErrorMessage(str_replace("%s", $this->M->caption(), $this->M->RequiredErrorMessage));
            }
        }
        if ($this->A->Required) {
            if (!$this->A->IsDetailKey && EmptyValue($this->A->FormValue)) {
                $this->A->addErrorMessage(str_replace("%s", $this->A->caption(), $this->A->RequiredErrorMessage));
            }
        }
        if ($this->N->Required) {
            if (!$this->N->IsDetailKey && EmptyValue($this->N->FormValue)) {
                $this->N->addErrorMessage(str_replace("%s", $this->N->caption(), $this->N->RequiredErrorMessage));
            }
        }
        if ($this->NoOfDays->Required) {
            if (!$this->NoOfDays->IsDetailKey && EmptyValue($this->NoOfDays->FormValue)) {
                $this->NoOfDays->addErrorMessage(str_replace("%s", $this->NoOfDays->caption(), $this->NoOfDays->RequiredErrorMessage));
            }
        }
        if ($this->PreRoute->Required) {
            if (!$this->PreRoute->IsDetailKey && EmptyValue($this->PreRoute->FormValue)) {
                $this->PreRoute->addErrorMessage(str_replace("%s", $this->PreRoute->caption(), $this->PreRoute->RequiredErrorMessage));
            }
        }
        if ($this->TimeOfTaking->Required) {
            if (!$this->TimeOfTaking->IsDetailKey && EmptyValue($this->TimeOfTaking->FormValue)) {
                $this->TimeOfTaking->addErrorMessage(str_replace("%s", $this->TimeOfTaking->caption(), $this->TimeOfTaking->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if (!$this->Type->IsDetailKey && EmptyValue($this->Type->FormValue)) {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if ($this->CreateDateTime->Required) {
            if (!$this->CreateDateTime->IsDetailKey && EmptyValue($this->CreateDateTime->FormValue)) {
                $this->CreateDateTime->addErrorMessage(str_replace("%s", $this->CreateDateTime->caption(), $this->CreateDateTime->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
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

            // TemplateName
            $this->TemplateName->setDbValueDef($rsnew, $this->TemplateName->CurrentValue, "", $this->TemplateName->ReadOnly);

            // Medicine
            $this->Medicine->setDbValueDef($rsnew, $this->Medicine->CurrentValue, "", $this->Medicine->ReadOnly);

            // M
            $this->M->setDbValueDef($rsnew, $this->M->CurrentValue, "", $this->M->ReadOnly);

            // A
            $this->A->setDbValueDef($rsnew, $this->A->CurrentValue, "", $this->A->ReadOnly);

            // N
            $this->N->setDbValueDef($rsnew, $this->N->CurrentValue, "", $this->N->ReadOnly);

            // NoOfDays
            $this->NoOfDays->setDbValueDef($rsnew, $this->NoOfDays->CurrentValue, "", $this->NoOfDays->ReadOnly);

            // PreRoute
            $this->PreRoute->setDbValueDef($rsnew, $this->PreRoute->CurrentValue, "", $this->PreRoute->ReadOnly);

            // TimeOfTaking
            $this->TimeOfTaking->setDbValueDef($rsnew, $this->TimeOfTaking->CurrentValue, "", $this->TimeOfTaking->ReadOnly);

            // Type
            $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, "", $this->Type->ReadOnly);

            // Status
            $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, "", $this->Status->ReadOnly);

            // CreatedBy
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, $this->CreatedBy->ReadOnly);

            // CreateDateTime
            $this->CreateDateTime->setDbValueDef($rsnew, $this->CreateDateTime->CurrentValue, null, $this->CreateDateTime->ReadOnly);

            // ModifiedBy
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, $this->ModifiedBy->ReadOnly);

            // ModifiedDateTime
            $this->ModifiedDateTime->setDbValueDef($rsnew, $this->ModifiedDateTime->CurrentValue, null, $this->ModifiedDateTime->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("MasUserTemplatePrescriptionList"), "", $this->TableVar, true);
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
