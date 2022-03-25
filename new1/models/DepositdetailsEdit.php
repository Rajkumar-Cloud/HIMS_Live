<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class DepositdetailsEdit extends Depositdetails
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'depositdetails';

    // Page object name
    public $PageObjName = "DepositdetailsEdit";

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

        // Table object (depositdetails)
        if (!isset($GLOBALS["depositdetails"]) || get_class($GLOBALS["depositdetails"]) == PROJECT_NAMESPACE . "depositdetails") {
            $GLOBALS["depositdetails"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'depositdetails');
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
                $doc = new $class(Container("depositdetails"));
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
                    if ($pageName == "DepositdetailsView") {
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
        $this->DepositDate->setVisibility();
        $this->DepositToBankSelect->setVisibility();
        $this->DepositToBank->setVisibility();
        $this->TransferToSelect->setVisibility();
        $this->TransferTo->setVisibility();
        $this->OpeningBalance->setVisibility();
        $this->A2000Count->setVisibility();
        $this->A2000Amount->setVisibility();
        $this->A1000Count->setVisibility();
        $this->A1000Amount->setVisibility();
        $this->A500Count->setVisibility();
        $this->A500Amount->setVisibility();
        $this->A200Count->setVisibility();
        $this->A200Amount->setVisibility();
        $this->A100Count->setVisibility();
        $this->A100Amount->setVisibility();
        $this->A50Count->setVisibility();
        $this->A50Amount->setVisibility();
        $this->A20Count->setVisibility();
        $this->A20Amount->setVisibility();
        $this->A10Count->setVisibility();
        $this->A10Amount->setVisibility();
        $this->Other->setVisibility();
        $this->TotalCash->setVisibility();
        $this->Cheque->setVisibility();
        $this->Card->setVisibility();
        $this->NEFTRTGS->setVisibility();
        $this->TotalTransferDepositAmount->setVisibility();
        $this->CreatedBy->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->ModifiedBy->setVisibility();
        $this->ModifiedDateTime->setVisibility();
        $this->CreatedUserName->setVisibility();
        $this->ModifiedUserName->setVisibility();
        $this->BalanceAmount->setVisibility();
        $this->CashCollected->setVisibility();
        $this->RTGS->setVisibility();
        $this->PAYTM->setVisibility();
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
                    $this->terminate("DepositdetailsList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "DepositdetailsList") {
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

        // Check field name 'DepositDate' first before field var 'x_DepositDate'
        $val = $CurrentForm->hasValue("DepositDate") ? $CurrentForm->getValue("DepositDate") : $CurrentForm->getValue("x_DepositDate");
        if (!$this->DepositDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DepositDate->Visible = false; // Disable update for API request
            } else {
                $this->DepositDate->setFormValue($val);
            }
            $this->DepositDate->CurrentValue = UnFormatDateTime($this->DepositDate->CurrentValue, 0);
        }

        // Check field name 'DepositToBankSelect' first before field var 'x_DepositToBankSelect'
        $val = $CurrentForm->hasValue("DepositToBankSelect") ? $CurrentForm->getValue("DepositToBankSelect") : $CurrentForm->getValue("x_DepositToBankSelect");
        if (!$this->DepositToBankSelect->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DepositToBankSelect->Visible = false; // Disable update for API request
            } else {
                $this->DepositToBankSelect->setFormValue($val);
            }
        }

        // Check field name 'DepositToBank' first before field var 'x_DepositToBank'
        $val = $CurrentForm->hasValue("DepositToBank") ? $CurrentForm->getValue("DepositToBank") : $CurrentForm->getValue("x_DepositToBank");
        if (!$this->DepositToBank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DepositToBank->Visible = false; // Disable update for API request
            } else {
                $this->DepositToBank->setFormValue($val);
            }
        }

        // Check field name 'TransferToSelect' first before field var 'x_TransferToSelect'
        $val = $CurrentForm->hasValue("TransferToSelect") ? $CurrentForm->getValue("TransferToSelect") : $CurrentForm->getValue("x_TransferToSelect");
        if (!$this->TransferToSelect->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferToSelect->Visible = false; // Disable update for API request
            } else {
                $this->TransferToSelect->setFormValue($val);
            }
        }

        // Check field name 'TransferTo' first before field var 'x_TransferTo'
        $val = $CurrentForm->hasValue("TransferTo") ? $CurrentForm->getValue("TransferTo") : $CurrentForm->getValue("x_TransferTo");
        if (!$this->TransferTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TransferTo->Visible = false; // Disable update for API request
            } else {
                $this->TransferTo->setFormValue($val);
            }
        }

        // Check field name 'OpeningBalance' first before field var 'x_OpeningBalance'
        $val = $CurrentForm->hasValue("OpeningBalance") ? $CurrentForm->getValue("OpeningBalance") : $CurrentForm->getValue("x_OpeningBalance");
        if (!$this->OpeningBalance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OpeningBalance->Visible = false; // Disable update for API request
            } else {
                $this->OpeningBalance->setFormValue($val);
            }
        }

        // Check field name 'A2000Count' first before field var 'x_A2000Count'
        $val = $CurrentForm->hasValue("A2000Count") ? $CurrentForm->getValue("A2000Count") : $CurrentForm->getValue("x_A2000Count");
        if (!$this->A2000Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A2000Count->Visible = false; // Disable update for API request
            } else {
                $this->A2000Count->setFormValue($val);
            }
        }

        // Check field name 'A2000Amount' first before field var 'x_A2000Amount'
        $val = $CurrentForm->hasValue("A2000Amount") ? $CurrentForm->getValue("A2000Amount") : $CurrentForm->getValue("x_A2000Amount");
        if (!$this->A2000Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A2000Amount->Visible = false; // Disable update for API request
            } else {
                $this->A2000Amount->setFormValue($val);
            }
        }

        // Check field name 'A1000Count' first before field var 'x_A1000Count'
        $val = $CurrentForm->hasValue("A1000Count") ? $CurrentForm->getValue("A1000Count") : $CurrentForm->getValue("x_A1000Count");
        if (!$this->A1000Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A1000Count->Visible = false; // Disable update for API request
            } else {
                $this->A1000Count->setFormValue($val);
            }
        }

        // Check field name 'A1000Amount' first before field var 'x_A1000Amount'
        $val = $CurrentForm->hasValue("A1000Amount") ? $CurrentForm->getValue("A1000Amount") : $CurrentForm->getValue("x_A1000Amount");
        if (!$this->A1000Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A1000Amount->Visible = false; // Disable update for API request
            } else {
                $this->A1000Amount->setFormValue($val);
            }
        }

        // Check field name 'A500Count' first before field var 'x_A500Count'
        $val = $CurrentForm->hasValue("A500Count") ? $CurrentForm->getValue("A500Count") : $CurrentForm->getValue("x_A500Count");
        if (!$this->A500Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A500Count->Visible = false; // Disable update for API request
            } else {
                $this->A500Count->setFormValue($val);
            }
        }

        // Check field name 'A500Amount' first before field var 'x_A500Amount'
        $val = $CurrentForm->hasValue("A500Amount") ? $CurrentForm->getValue("A500Amount") : $CurrentForm->getValue("x_A500Amount");
        if (!$this->A500Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A500Amount->Visible = false; // Disable update for API request
            } else {
                $this->A500Amount->setFormValue($val);
            }
        }

        // Check field name 'A200Count' first before field var 'x_A200Count'
        $val = $CurrentForm->hasValue("A200Count") ? $CurrentForm->getValue("A200Count") : $CurrentForm->getValue("x_A200Count");
        if (!$this->A200Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A200Count->Visible = false; // Disable update for API request
            } else {
                $this->A200Count->setFormValue($val);
            }
        }

        // Check field name 'A200Amount' first before field var 'x_A200Amount'
        $val = $CurrentForm->hasValue("A200Amount") ? $CurrentForm->getValue("A200Amount") : $CurrentForm->getValue("x_A200Amount");
        if (!$this->A200Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A200Amount->Visible = false; // Disable update for API request
            } else {
                $this->A200Amount->setFormValue($val);
            }
        }

        // Check field name 'A100Count' first before field var 'x_A100Count'
        $val = $CurrentForm->hasValue("A100Count") ? $CurrentForm->getValue("A100Count") : $CurrentForm->getValue("x_A100Count");
        if (!$this->A100Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A100Count->Visible = false; // Disable update for API request
            } else {
                $this->A100Count->setFormValue($val);
            }
        }

        // Check field name 'A100Amount' first before field var 'x_A100Amount'
        $val = $CurrentForm->hasValue("A100Amount") ? $CurrentForm->getValue("A100Amount") : $CurrentForm->getValue("x_A100Amount");
        if (!$this->A100Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A100Amount->Visible = false; // Disable update for API request
            } else {
                $this->A100Amount->setFormValue($val);
            }
        }

        // Check field name 'A50Count' first before field var 'x_A50Count'
        $val = $CurrentForm->hasValue("A50Count") ? $CurrentForm->getValue("A50Count") : $CurrentForm->getValue("x_A50Count");
        if (!$this->A50Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A50Count->Visible = false; // Disable update for API request
            } else {
                $this->A50Count->setFormValue($val);
            }
        }

        // Check field name 'A50Amount' first before field var 'x_A50Amount'
        $val = $CurrentForm->hasValue("A50Amount") ? $CurrentForm->getValue("A50Amount") : $CurrentForm->getValue("x_A50Amount");
        if (!$this->A50Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A50Amount->Visible = false; // Disable update for API request
            } else {
                $this->A50Amount->setFormValue($val);
            }
        }

        // Check field name 'A20Count' first before field var 'x_A20Count'
        $val = $CurrentForm->hasValue("A20Count") ? $CurrentForm->getValue("A20Count") : $CurrentForm->getValue("x_A20Count");
        if (!$this->A20Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A20Count->Visible = false; // Disable update for API request
            } else {
                $this->A20Count->setFormValue($val);
            }
        }

        // Check field name 'A20Amount' first before field var 'x_A20Amount'
        $val = $CurrentForm->hasValue("A20Amount") ? $CurrentForm->getValue("A20Amount") : $CurrentForm->getValue("x_A20Amount");
        if (!$this->A20Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A20Amount->Visible = false; // Disable update for API request
            } else {
                $this->A20Amount->setFormValue($val);
            }
        }

        // Check field name 'A10Count' first before field var 'x_A10Count'
        $val = $CurrentForm->hasValue("A10Count") ? $CurrentForm->getValue("A10Count") : $CurrentForm->getValue("x_A10Count");
        if (!$this->A10Count->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A10Count->Visible = false; // Disable update for API request
            } else {
                $this->A10Count->setFormValue($val);
            }
        }

        // Check field name 'A10Amount' first before field var 'x_A10Amount'
        $val = $CurrentForm->hasValue("A10Amount") ? $CurrentForm->getValue("A10Amount") : $CurrentForm->getValue("x_A10Amount");
        if (!$this->A10Amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->A10Amount->Visible = false; // Disable update for API request
            } else {
                $this->A10Amount->setFormValue($val);
            }
        }

        // Check field name 'Other' first before field var 'x_Other'
        $val = $CurrentForm->hasValue("Other") ? $CurrentForm->getValue("Other") : $CurrentForm->getValue("x_Other");
        if (!$this->Other->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Other->Visible = false; // Disable update for API request
            } else {
                $this->Other->setFormValue($val);
            }
        }

        // Check field name 'TotalCash' first before field var 'x_TotalCash'
        $val = $CurrentForm->hasValue("TotalCash") ? $CurrentForm->getValue("TotalCash") : $CurrentForm->getValue("x_TotalCash");
        if (!$this->TotalCash->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalCash->Visible = false; // Disable update for API request
            } else {
                $this->TotalCash->setFormValue($val);
            }
        }

        // Check field name 'Cheque' first before field var 'x_Cheque'
        $val = $CurrentForm->hasValue("Cheque") ? $CurrentForm->getValue("Cheque") : $CurrentForm->getValue("x_Cheque");
        if (!$this->Cheque->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cheque->Visible = false; // Disable update for API request
            } else {
                $this->Cheque->setFormValue($val);
            }
        }

        // Check field name 'Card' first before field var 'x_Card'
        $val = $CurrentForm->hasValue("Card") ? $CurrentForm->getValue("Card") : $CurrentForm->getValue("x_Card");
        if (!$this->Card->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Card->Visible = false; // Disable update for API request
            } else {
                $this->Card->setFormValue($val);
            }
        }

        // Check field name 'NEFTRTGS' first before field var 'x_NEFTRTGS'
        $val = $CurrentForm->hasValue("NEFTRTGS") ? $CurrentForm->getValue("NEFTRTGS") : $CurrentForm->getValue("x_NEFTRTGS");
        if (!$this->NEFTRTGS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NEFTRTGS->Visible = false; // Disable update for API request
            } else {
                $this->NEFTRTGS->setFormValue($val);
            }
        }

        // Check field name 'TotalTransferDepositAmount' first before field var 'x_TotalTransferDepositAmount'
        $val = $CurrentForm->hasValue("TotalTransferDepositAmount") ? $CurrentForm->getValue("TotalTransferDepositAmount") : $CurrentForm->getValue("x_TotalTransferDepositAmount");
        if (!$this->TotalTransferDepositAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalTransferDepositAmount->Visible = false; // Disable update for API request
            } else {
                $this->TotalTransferDepositAmount->setFormValue($val);
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

        // Check field name 'CreatedDateTime' first before field var 'x_CreatedDateTime'
        $val = $CurrentForm->hasValue("CreatedDateTime") ? $CurrentForm->getValue("CreatedDateTime") : $CurrentForm->getValue("x_CreatedDateTime");
        if (!$this->CreatedDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedDateTime->Visible = false; // Disable update for API request
            } else {
                $this->CreatedDateTime->setFormValue($val);
            }
            $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
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
            $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        }

        // Check field name 'CreatedUserName' first before field var 'x_CreatedUserName'
        $val = $CurrentForm->hasValue("CreatedUserName") ? $CurrentForm->getValue("CreatedUserName") : $CurrentForm->getValue("x_CreatedUserName");
        if (!$this->CreatedUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreatedUserName->Visible = false; // Disable update for API request
            } else {
                $this->CreatedUserName->setFormValue($val);
            }
        }

        // Check field name 'ModifiedUserName' first before field var 'x_ModifiedUserName'
        $val = $CurrentForm->hasValue("ModifiedUserName") ? $CurrentForm->getValue("ModifiedUserName") : $CurrentForm->getValue("x_ModifiedUserName");
        if (!$this->ModifiedUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ModifiedUserName->Visible = false; // Disable update for API request
            } else {
                $this->ModifiedUserName->setFormValue($val);
            }
        }

        // Check field name 'BalanceAmount' first before field var 'x_BalanceAmount'
        $val = $CurrentForm->hasValue("BalanceAmount") ? $CurrentForm->getValue("BalanceAmount") : $CurrentForm->getValue("x_BalanceAmount");
        if (!$this->BalanceAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BalanceAmount->Visible = false; // Disable update for API request
            } else {
                $this->BalanceAmount->setFormValue($val);
            }
        }

        // Check field name 'CashCollected' first before field var 'x_CashCollected'
        $val = $CurrentForm->hasValue("CashCollected") ? $CurrentForm->getValue("CashCollected") : $CurrentForm->getValue("x_CashCollected");
        if (!$this->CashCollected->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CashCollected->Visible = false; // Disable update for API request
            } else {
                $this->CashCollected->setFormValue($val);
            }
        }

        // Check field name 'RTGS' first before field var 'x_RTGS'
        $val = $CurrentForm->hasValue("RTGS") ? $CurrentForm->getValue("RTGS") : $CurrentForm->getValue("x_RTGS");
        if (!$this->RTGS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RTGS->Visible = false; // Disable update for API request
            } else {
                $this->RTGS->setFormValue($val);
            }
        }

        // Check field name 'PAYTM' first before field var 'x_PAYTM'
        $val = $CurrentForm->hasValue("PAYTM") ? $CurrentForm->getValue("PAYTM") : $CurrentForm->getValue("x_PAYTM");
        if (!$this->PAYTM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PAYTM->Visible = false; // Disable update for API request
            } else {
                $this->PAYTM->setFormValue($val);
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->DepositDate->CurrentValue = $this->DepositDate->FormValue;
        $this->DepositDate->CurrentValue = UnFormatDateTime($this->DepositDate->CurrentValue, 0);
        $this->DepositToBankSelect->CurrentValue = $this->DepositToBankSelect->FormValue;
        $this->DepositToBank->CurrentValue = $this->DepositToBank->FormValue;
        $this->TransferToSelect->CurrentValue = $this->TransferToSelect->FormValue;
        $this->TransferTo->CurrentValue = $this->TransferTo->FormValue;
        $this->OpeningBalance->CurrentValue = $this->OpeningBalance->FormValue;
        $this->A2000Count->CurrentValue = $this->A2000Count->FormValue;
        $this->A2000Amount->CurrentValue = $this->A2000Amount->FormValue;
        $this->A1000Count->CurrentValue = $this->A1000Count->FormValue;
        $this->A1000Amount->CurrentValue = $this->A1000Amount->FormValue;
        $this->A500Count->CurrentValue = $this->A500Count->FormValue;
        $this->A500Amount->CurrentValue = $this->A500Amount->FormValue;
        $this->A200Count->CurrentValue = $this->A200Count->FormValue;
        $this->A200Amount->CurrentValue = $this->A200Amount->FormValue;
        $this->A100Count->CurrentValue = $this->A100Count->FormValue;
        $this->A100Amount->CurrentValue = $this->A100Amount->FormValue;
        $this->A50Count->CurrentValue = $this->A50Count->FormValue;
        $this->A50Amount->CurrentValue = $this->A50Amount->FormValue;
        $this->A20Count->CurrentValue = $this->A20Count->FormValue;
        $this->A20Amount->CurrentValue = $this->A20Amount->FormValue;
        $this->A10Count->CurrentValue = $this->A10Count->FormValue;
        $this->A10Amount->CurrentValue = $this->A10Amount->FormValue;
        $this->Other->CurrentValue = $this->Other->FormValue;
        $this->TotalCash->CurrentValue = $this->TotalCash->FormValue;
        $this->Cheque->CurrentValue = $this->Cheque->FormValue;
        $this->Card->CurrentValue = $this->Card->FormValue;
        $this->NEFTRTGS->CurrentValue = $this->NEFTRTGS->FormValue;
        $this->TotalTransferDepositAmount->CurrentValue = $this->TotalTransferDepositAmount->FormValue;
        $this->CreatedBy->CurrentValue = $this->CreatedBy->FormValue;
        $this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
        $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        $this->ModifiedBy->CurrentValue = $this->ModifiedBy->FormValue;
        $this->ModifiedDateTime->CurrentValue = $this->ModifiedDateTime->FormValue;
        $this->ModifiedDateTime->CurrentValue = UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0);
        $this->CreatedUserName->CurrentValue = $this->CreatedUserName->FormValue;
        $this->ModifiedUserName->CurrentValue = $this->ModifiedUserName->FormValue;
        $this->BalanceAmount->CurrentValue = $this->BalanceAmount->FormValue;
        $this->CashCollected->CurrentValue = $this->CashCollected->FormValue;
        $this->RTGS->CurrentValue = $this->RTGS->FormValue;
        $this->PAYTM->CurrentValue = $this->PAYTM->FormValue;
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
        $this->DepositDate->setDbValue($row['DepositDate']);
        $this->DepositToBankSelect->setDbValue($row['DepositToBankSelect']);
        $this->DepositToBank->setDbValue($row['DepositToBank']);
        $this->TransferToSelect->setDbValue($row['TransferToSelect']);
        $this->TransferTo->setDbValue($row['TransferTo']);
        $this->OpeningBalance->setDbValue($row['OpeningBalance']);
        $this->A2000Count->setDbValue($row['A2000Count']);
        $this->A2000Amount->setDbValue($row['A2000Amount']);
        $this->A1000Count->setDbValue($row['A1000Count']);
        $this->A1000Amount->setDbValue($row['A1000Amount']);
        $this->A500Count->setDbValue($row['A500Count']);
        $this->A500Amount->setDbValue($row['A500Amount']);
        $this->A200Count->setDbValue($row['A200Count']);
        $this->A200Amount->setDbValue($row['A200Amount']);
        $this->A100Count->setDbValue($row['A100Count']);
        $this->A100Amount->setDbValue($row['A100Amount']);
        $this->A50Count->setDbValue($row['A50Count']);
        $this->A50Amount->setDbValue($row['A50Amount']);
        $this->A20Count->setDbValue($row['A20Count']);
        $this->A20Amount->setDbValue($row['A20Amount']);
        $this->A10Count->setDbValue($row['A10Count']);
        $this->A10Amount->setDbValue($row['A10Amount']);
        $this->Other->setDbValue($row['Other']);
        $this->TotalCash->setDbValue($row['TotalCash']);
        $this->Cheque->setDbValue($row['Cheque']);
        $this->Card->setDbValue($row['Card']);
        $this->NEFTRTGS->setDbValue($row['NEFTRTGS']);
        $this->TotalTransferDepositAmount->setDbValue($row['TotalTransferDepositAmount']);
        $this->CreatedBy->setDbValue($row['CreatedBy']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->ModifiedBy->setDbValue($row['ModifiedBy']);
        $this->ModifiedDateTime->setDbValue($row['ModifiedDateTime']);
        $this->CreatedUserName->setDbValue($row['CreatedUserName']);
        $this->ModifiedUserName->setDbValue($row['ModifiedUserName']);
        $this->BalanceAmount->setDbValue($row['BalanceAmount']);
        $this->CashCollected->setDbValue($row['CashCollected']);
        $this->RTGS->setDbValue($row['RTGS']);
        $this->PAYTM->setDbValue($row['PAYTM']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['DepositDate'] = null;
        $row['DepositToBankSelect'] = null;
        $row['DepositToBank'] = null;
        $row['TransferToSelect'] = null;
        $row['TransferTo'] = null;
        $row['OpeningBalance'] = null;
        $row['A2000Count'] = null;
        $row['A2000Amount'] = null;
        $row['A1000Count'] = null;
        $row['A1000Amount'] = null;
        $row['A500Count'] = null;
        $row['A500Amount'] = null;
        $row['A200Count'] = null;
        $row['A200Amount'] = null;
        $row['A100Count'] = null;
        $row['A100Amount'] = null;
        $row['A50Count'] = null;
        $row['A50Amount'] = null;
        $row['A20Count'] = null;
        $row['A20Amount'] = null;
        $row['A10Count'] = null;
        $row['A10Amount'] = null;
        $row['Other'] = null;
        $row['TotalCash'] = null;
        $row['Cheque'] = null;
        $row['Card'] = null;
        $row['NEFTRTGS'] = null;
        $row['TotalTransferDepositAmount'] = null;
        $row['CreatedBy'] = null;
        $row['CreatedDateTime'] = null;
        $row['ModifiedBy'] = null;
        $row['ModifiedDateTime'] = null;
        $row['CreatedUserName'] = null;
        $row['ModifiedUserName'] = null;
        $row['BalanceAmount'] = null;
        $row['CashCollected'] = null;
        $row['RTGS'] = null;
        $row['PAYTM'] = null;
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

        // Convert decimal values if posted back
        if ($this->OpeningBalance->FormValue == $this->OpeningBalance->CurrentValue && is_numeric(ConvertToFloatString($this->OpeningBalance->CurrentValue))) {
            $this->OpeningBalance->CurrentValue = ConvertToFloatString($this->OpeningBalance->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A2000Amount->FormValue == $this->A2000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A2000Amount->CurrentValue))) {
            $this->A2000Amount->CurrentValue = ConvertToFloatString($this->A2000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A1000Amount->FormValue == $this->A1000Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A1000Amount->CurrentValue))) {
            $this->A1000Amount->CurrentValue = ConvertToFloatString($this->A1000Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A500Amount->FormValue == $this->A500Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A500Amount->CurrentValue))) {
            $this->A500Amount->CurrentValue = ConvertToFloatString($this->A500Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A200Amount->FormValue == $this->A200Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A200Amount->CurrentValue))) {
            $this->A200Amount->CurrentValue = ConvertToFloatString($this->A200Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A100Amount->FormValue == $this->A100Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A100Amount->CurrentValue))) {
            $this->A100Amount->CurrentValue = ConvertToFloatString($this->A100Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A50Amount->FormValue == $this->A50Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A50Amount->CurrentValue))) {
            $this->A50Amount->CurrentValue = ConvertToFloatString($this->A50Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A20Amount->FormValue == $this->A20Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A20Amount->CurrentValue))) {
            $this->A20Amount->CurrentValue = ConvertToFloatString($this->A20Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->A10Amount->FormValue == $this->A10Amount->CurrentValue && is_numeric(ConvertToFloatString($this->A10Amount->CurrentValue))) {
            $this->A10Amount->CurrentValue = ConvertToFloatString($this->A10Amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Other->FormValue == $this->Other->CurrentValue && is_numeric(ConvertToFloatString($this->Other->CurrentValue))) {
            $this->Other->CurrentValue = ConvertToFloatString($this->Other->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalCash->FormValue == $this->TotalCash->CurrentValue && is_numeric(ConvertToFloatString($this->TotalCash->CurrentValue))) {
            $this->TotalCash->CurrentValue = ConvertToFloatString($this->TotalCash->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Cheque->FormValue == $this->Cheque->CurrentValue && is_numeric(ConvertToFloatString($this->Cheque->CurrentValue))) {
            $this->Cheque->CurrentValue = ConvertToFloatString($this->Cheque->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Card->FormValue == $this->Card->CurrentValue && is_numeric(ConvertToFloatString($this->Card->CurrentValue))) {
            $this->Card->CurrentValue = ConvertToFloatString($this->Card->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->NEFTRTGS->FormValue == $this->NEFTRTGS->CurrentValue && is_numeric(ConvertToFloatString($this->NEFTRTGS->CurrentValue))) {
            $this->NEFTRTGS->CurrentValue = ConvertToFloatString($this->NEFTRTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->TotalTransferDepositAmount->FormValue == $this->TotalTransferDepositAmount->CurrentValue && is_numeric(ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue))) {
            $this->TotalTransferDepositAmount->CurrentValue = ConvertToFloatString($this->TotalTransferDepositAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->BalanceAmount->FormValue == $this->BalanceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->BalanceAmount->CurrentValue))) {
            $this->BalanceAmount->CurrentValue = ConvertToFloatString($this->BalanceAmount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->CashCollected->FormValue == $this->CashCollected->CurrentValue && is_numeric(ConvertToFloatString($this->CashCollected->CurrentValue))) {
            $this->CashCollected->CurrentValue = ConvertToFloatString($this->CashCollected->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->RTGS->FormValue == $this->RTGS->CurrentValue && is_numeric(ConvertToFloatString($this->RTGS->CurrentValue))) {
            $this->RTGS->CurrentValue = ConvertToFloatString($this->RTGS->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->PAYTM->FormValue == $this->PAYTM->CurrentValue && is_numeric(ConvertToFloatString($this->PAYTM->CurrentValue))) {
            $this->PAYTM->CurrentValue = ConvertToFloatString($this->PAYTM->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // DepositDate

        // DepositToBankSelect

        // DepositToBank

        // TransferToSelect

        // TransferTo

        // OpeningBalance

        // A2000Count

        // A2000Amount

        // A1000Count

        // A1000Amount

        // A500Count

        // A500Amount

        // A200Count

        // A200Amount

        // A100Count

        // A100Amount

        // A50Count

        // A50Amount

        // A20Count

        // A20Amount

        // A10Count

        // A10Amount

        // Other

        // TotalCash

        // Cheque

        // Card

        // NEFTRTGS

        // TotalTransferDepositAmount

        // CreatedBy

        // CreatedDateTime

        // ModifiedBy

        // ModifiedDateTime

        // CreatedUserName

        // ModifiedUserName

        // BalanceAmount

        // CashCollected

        // RTGS

        // PAYTM

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // DepositDate
            $this->DepositDate->ViewValue = $this->DepositDate->CurrentValue;
            $this->DepositDate->ViewValue = FormatDateTime($this->DepositDate->ViewValue, 0);
            $this->DepositDate->ViewCustomAttributes = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->ViewValue = $this->DepositToBankSelect->CurrentValue;
            $this->DepositToBankSelect->ViewCustomAttributes = "";

            // DepositToBank
            $this->DepositToBank->ViewValue = $this->DepositToBank->CurrentValue;
            $this->DepositToBank->ViewCustomAttributes = "";

            // TransferToSelect
            $this->TransferToSelect->ViewValue = $this->TransferToSelect->CurrentValue;
            $this->TransferToSelect->ViewCustomAttributes = "";

            // TransferTo
            $this->TransferTo->ViewValue = $this->TransferTo->CurrentValue;
            $this->TransferTo->ViewCustomAttributes = "";

            // OpeningBalance
            $this->OpeningBalance->ViewValue = $this->OpeningBalance->CurrentValue;
            $this->OpeningBalance->ViewValue = FormatNumber($this->OpeningBalance->ViewValue, 2, -2, -2, -2);
            $this->OpeningBalance->ViewCustomAttributes = "";

            // A2000Count
            $this->A2000Count->ViewValue = $this->A2000Count->CurrentValue;
            $this->A2000Count->ViewValue = FormatNumber($this->A2000Count->ViewValue, 0, -2, -2, -2);
            $this->A2000Count->ViewCustomAttributes = "";

            // A2000Amount
            $this->A2000Amount->ViewValue = $this->A2000Amount->CurrentValue;
            $this->A2000Amount->ViewValue = FormatNumber($this->A2000Amount->ViewValue, 2, -2, -2, -2);
            $this->A2000Amount->ViewCustomAttributes = "";

            // A1000Count
            $this->A1000Count->ViewValue = $this->A1000Count->CurrentValue;
            $this->A1000Count->ViewValue = FormatNumber($this->A1000Count->ViewValue, 0, -2, -2, -2);
            $this->A1000Count->ViewCustomAttributes = "";

            // A1000Amount
            $this->A1000Amount->ViewValue = $this->A1000Amount->CurrentValue;
            $this->A1000Amount->ViewValue = FormatNumber($this->A1000Amount->ViewValue, 2, -2, -2, -2);
            $this->A1000Amount->ViewCustomAttributes = "";

            // A500Count
            $this->A500Count->ViewValue = $this->A500Count->CurrentValue;
            $this->A500Count->ViewValue = FormatNumber($this->A500Count->ViewValue, 0, -2, -2, -2);
            $this->A500Count->ViewCustomAttributes = "";

            // A500Amount
            $this->A500Amount->ViewValue = $this->A500Amount->CurrentValue;
            $this->A500Amount->ViewValue = FormatNumber($this->A500Amount->ViewValue, 2, -2, -2, -2);
            $this->A500Amount->ViewCustomAttributes = "";

            // A200Count
            $this->A200Count->ViewValue = $this->A200Count->CurrentValue;
            $this->A200Count->ViewValue = FormatNumber($this->A200Count->ViewValue, 0, -2, -2, -2);
            $this->A200Count->ViewCustomAttributes = "";

            // A200Amount
            $this->A200Amount->ViewValue = $this->A200Amount->CurrentValue;
            $this->A200Amount->ViewValue = FormatNumber($this->A200Amount->ViewValue, 2, -2, -2, -2);
            $this->A200Amount->ViewCustomAttributes = "";

            // A100Count
            $this->A100Count->ViewValue = $this->A100Count->CurrentValue;
            $this->A100Count->ViewValue = FormatNumber($this->A100Count->ViewValue, 0, -2, -2, -2);
            $this->A100Count->ViewCustomAttributes = "";

            // A100Amount
            $this->A100Amount->ViewValue = $this->A100Amount->CurrentValue;
            $this->A100Amount->ViewValue = FormatNumber($this->A100Amount->ViewValue, 2, -2, -2, -2);
            $this->A100Amount->ViewCustomAttributes = "";

            // A50Count
            $this->A50Count->ViewValue = $this->A50Count->CurrentValue;
            $this->A50Count->ViewValue = FormatNumber($this->A50Count->ViewValue, 0, -2, -2, -2);
            $this->A50Count->ViewCustomAttributes = "";

            // A50Amount
            $this->A50Amount->ViewValue = $this->A50Amount->CurrentValue;
            $this->A50Amount->ViewValue = FormatNumber($this->A50Amount->ViewValue, 2, -2, -2, -2);
            $this->A50Amount->ViewCustomAttributes = "";

            // A20Count
            $this->A20Count->ViewValue = $this->A20Count->CurrentValue;
            $this->A20Count->ViewValue = FormatNumber($this->A20Count->ViewValue, 0, -2, -2, -2);
            $this->A20Count->ViewCustomAttributes = "";

            // A20Amount
            $this->A20Amount->ViewValue = $this->A20Amount->CurrentValue;
            $this->A20Amount->ViewValue = FormatNumber($this->A20Amount->ViewValue, 2, -2, -2, -2);
            $this->A20Amount->ViewCustomAttributes = "";

            // A10Count
            $this->A10Count->ViewValue = $this->A10Count->CurrentValue;
            $this->A10Count->ViewValue = FormatNumber($this->A10Count->ViewValue, 0, -2, -2, -2);
            $this->A10Count->ViewCustomAttributes = "";

            // A10Amount
            $this->A10Amount->ViewValue = $this->A10Amount->CurrentValue;
            $this->A10Amount->ViewValue = FormatNumber($this->A10Amount->ViewValue, 2, -2, -2, -2);
            $this->A10Amount->ViewCustomAttributes = "";

            // Other
            $this->Other->ViewValue = $this->Other->CurrentValue;
            $this->Other->ViewValue = FormatNumber($this->Other->ViewValue, 2, -2, -2, -2);
            $this->Other->ViewCustomAttributes = "";

            // TotalCash
            $this->TotalCash->ViewValue = $this->TotalCash->CurrentValue;
            $this->TotalCash->ViewValue = FormatNumber($this->TotalCash->ViewValue, 2, -2, -2, -2);
            $this->TotalCash->ViewCustomAttributes = "";

            // Cheque
            $this->Cheque->ViewValue = $this->Cheque->CurrentValue;
            $this->Cheque->ViewValue = FormatNumber($this->Cheque->ViewValue, 2, -2, -2, -2);
            $this->Cheque->ViewCustomAttributes = "";

            // Card
            $this->Card->ViewValue = $this->Card->CurrentValue;
            $this->Card->ViewValue = FormatNumber($this->Card->ViewValue, 2, -2, -2, -2);
            $this->Card->ViewCustomAttributes = "";

            // NEFTRTGS
            $this->NEFTRTGS->ViewValue = $this->NEFTRTGS->CurrentValue;
            $this->NEFTRTGS->ViewValue = FormatNumber($this->NEFTRTGS->ViewValue, 2, -2, -2, -2);
            $this->NEFTRTGS->ViewCustomAttributes = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->ViewValue = $this->TotalTransferDepositAmount->CurrentValue;
            $this->TotalTransferDepositAmount->ViewValue = FormatNumber($this->TotalTransferDepositAmount->ViewValue, 2, -2, -2, -2);
            $this->TotalTransferDepositAmount->ViewCustomAttributes = "";

            // CreatedBy
            $this->CreatedBy->ViewValue = $this->CreatedBy->CurrentValue;
            $this->CreatedBy->ViewValue = FormatNumber($this->CreatedBy->ViewValue, 0, -2, -2, -2);
            $this->CreatedBy->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // ModifiedBy
            $this->ModifiedBy->ViewValue = $this->ModifiedBy->CurrentValue;
            $this->ModifiedBy->ViewValue = FormatNumber($this->ModifiedBy->ViewValue, 0, -2, -2, -2);
            $this->ModifiedBy->ViewCustomAttributes = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->ViewValue = $this->ModifiedDateTime->CurrentValue;
            $this->ModifiedDateTime->ViewValue = FormatDateTime($this->ModifiedDateTime->ViewValue, 0);
            $this->ModifiedDateTime->ViewCustomAttributes = "";

            // CreatedUserName
            $this->CreatedUserName->ViewValue = $this->CreatedUserName->CurrentValue;
            $this->CreatedUserName->ViewCustomAttributes = "";

            // ModifiedUserName
            $this->ModifiedUserName->ViewValue = $this->ModifiedUserName->CurrentValue;
            $this->ModifiedUserName->ViewCustomAttributes = "";

            // BalanceAmount
            $this->BalanceAmount->ViewValue = $this->BalanceAmount->CurrentValue;
            $this->BalanceAmount->ViewValue = FormatNumber($this->BalanceAmount->ViewValue, 2, -2, -2, -2);
            $this->BalanceAmount->ViewCustomAttributes = "";

            // CashCollected
            $this->CashCollected->ViewValue = $this->CashCollected->CurrentValue;
            $this->CashCollected->ViewValue = FormatNumber($this->CashCollected->ViewValue, 2, -2, -2, -2);
            $this->CashCollected->ViewCustomAttributes = "";

            // RTGS
            $this->RTGS->ViewValue = $this->RTGS->CurrentValue;
            $this->RTGS->ViewValue = FormatNumber($this->RTGS->ViewValue, 2, -2, -2, -2);
            $this->RTGS->ViewCustomAttributes = "";

            // PAYTM
            $this->PAYTM->ViewValue = $this->PAYTM->CurrentValue;
            $this->PAYTM->ViewValue = FormatNumber($this->PAYTM->ViewValue, 2, -2, -2, -2);
            $this->PAYTM->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // DepositDate
            $this->DepositDate->LinkCustomAttributes = "";
            $this->DepositDate->HrefValue = "";
            $this->DepositDate->TooltipValue = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->LinkCustomAttributes = "";
            $this->DepositToBankSelect->HrefValue = "";
            $this->DepositToBankSelect->TooltipValue = "";

            // DepositToBank
            $this->DepositToBank->LinkCustomAttributes = "";
            $this->DepositToBank->HrefValue = "";
            $this->DepositToBank->TooltipValue = "";

            // TransferToSelect
            $this->TransferToSelect->LinkCustomAttributes = "";
            $this->TransferToSelect->HrefValue = "";
            $this->TransferToSelect->TooltipValue = "";

            // TransferTo
            $this->TransferTo->LinkCustomAttributes = "";
            $this->TransferTo->HrefValue = "";
            $this->TransferTo->TooltipValue = "";

            // OpeningBalance
            $this->OpeningBalance->LinkCustomAttributes = "";
            $this->OpeningBalance->HrefValue = "";
            $this->OpeningBalance->TooltipValue = "";

            // A2000Count
            $this->A2000Count->LinkCustomAttributes = "";
            $this->A2000Count->HrefValue = "";
            $this->A2000Count->TooltipValue = "";

            // A2000Amount
            $this->A2000Amount->LinkCustomAttributes = "";
            $this->A2000Amount->HrefValue = "";
            $this->A2000Amount->TooltipValue = "";

            // A1000Count
            $this->A1000Count->LinkCustomAttributes = "";
            $this->A1000Count->HrefValue = "";
            $this->A1000Count->TooltipValue = "";

            // A1000Amount
            $this->A1000Amount->LinkCustomAttributes = "";
            $this->A1000Amount->HrefValue = "";
            $this->A1000Amount->TooltipValue = "";

            // A500Count
            $this->A500Count->LinkCustomAttributes = "";
            $this->A500Count->HrefValue = "";
            $this->A500Count->TooltipValue = "";

            // A500Amount
            $this->A500Amount->LinkCustomAttributes = "";
            $this->A500Amount->HrefValue = "";
            $this->A500Amount->TooltipValue = "";

            // A200Count
            $this->A200Count->LinkCustomAttributes = "";
            $this->A200Count->HrefValue = "";
            $this->A200Count->TooltipValue = "";

            // A200Amount
            $this->A200Amount->LinkCustomAttributes = "";
            $this->A200Amount->HrefValue = "";
            $this->A200Amount->TooltipValue = "";

            // A100Count
            $this->A100Count->LinkCustomAttributes = "";
            $this->A100Count->HrefValue = "";
            $this->A100Count->TooltipValue = "";

            // A100Amount
            $this->A100Amount->LinkCustomAttributes = "";
            $this->A100Amount->HrefValue = "";
            $this->A100Amount->TooltipValue = "";

            // A50Count
            $this->A50Count->LinkCustomAttributes = "";
            $this->A50Count->HrefValue = "";
            $this->A50Count->TooltipValue = "";

            // A50Amount
            $this->A50Amount->LinkCustomAttributes = "";
            $this->A50Amount->HrefValue = "";
            $this->A50Amount->TooltipValue = "";

            // A20Count
            $this->A20Count->LinkCustomAttributes = "";
            $this->A20Count->HrefValue = "";
            $this->A20Count->TooltipValue = "";

            // A20Amount
            $this->A20Amount->LinkCustomAttributes = "";
            $this->A20Amount->HrefValue = "";
            $this->A20Amount->TooltipValue = "";

            // A10Count
            $this->A10Count->LinkCustomAttributes = "";
            $this->A10Count->HrefValue = "";
            $this->A10Count->TooltipValue = "";

            // A10Amount
            $this->A10Amount->LinkCustomAttributes = "";
            $this->A10Amount->HrefValue = "";
            $this->A10Amount->TooltipValue = "";

            // Other
            $this->Other->LinkCustomAttributes = "";
            $this->Other->HrefValue = "";
            $this->Other->TooltipValue = "";

            // TotalCash
            $this->TotalCash->LinkCustomAttributes = "";
            $this->TotalCash->HrefValue = "";
            $this->TotalCash->TooltipValue = "";

            // Cheque
            $this->Cheque->LinkCustomAttributes = "";
            $this->Cheque->HrefValue = "";
            $this->Cheque->TooltipValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";
            $this->Card->TooltipValue = "";

            // NEFTRTGS
            $this->NEFTRTGS->LinkCustomAttributes = "";
            $this->NEFTRTGS->HrefValue = "";
            $this->NEFTRTGS->TooltipValue = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
            $this->TotalTransferDepositAmount->HrefValue = "";
            $this->TotalTransferDepositAmount->TooltipValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";
            $this->CreatedBy->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";
            $this->ModifiedBy->TooltipValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";
            $this->ModifiedDateTime->TooltipValue = "";

            // CreatedUserName
            $this->CreatedUserName->LinkCustomAttributes = "";
            $this->CreatedUserName->HrefValue = "";
            $this->CreatedUserName->TooltipValue = "";

            // ModifiedUserName
            $this->ModifiedUserName->LinkCustomAttributes = "";
            $this->ModifiedUserName->HrefValue = "";
            $this->ModifiedUserName->TooltipValue = "";

            // BalanceAmount
            $this->BalanceAmount->LinkCustomAttributes = "";
            $this->BalanceAmount->HrefValue = "";
            $this->BalanceAmount->TooltipValue = "";

            // CashCollected
            $this->CashCollected->LinkCustomAttributes = "";
            $this->CashCollected->HrefValue = "";
            $this->CashCollected->TooltipValue = "";

            // RTGS
            $this->RTGS->LinkCustomAttributes = "";
            $this->RTGS->HrefValue = "";
            $this->RTGS->TooltipValue = "";

            // PAYTM
            $this->PAYTM->LinkCustomAttributes = "";
            $this->PAYTM->HrefValue = "";
            $this->PAYTM->TooltipValue = "";

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

            // DepositDate
            $this->DepositDate->EditAttrs["class"] = "form-control";
            $this->DepositDate->EditCustomAttributes = "";
            $this->DepositDate->EditValue = HtmlEncode(FormatDateTime($this->DepositDate->CurrentValue, 8));
            $this->DepositDate->PlaceHolder = RemoveHtml($this->DepositDate->caption());

            // DepositToBankSelect
            $this->DepositToBankSelect->EditAttrs["class"] = "form-control";
            $this->DepositToBankSelect->EditCustomAttributes = "";
            if (!$this->DepositToBankSelect->Raw) {
                $this->DepositToBankSelect->CurrentValue = HtmlDecode($this->DepositToBankSelect->CurrentValue);
            }
            $this->DepositToBankSelect->EditValue = HtmlEncode($this->DepositToBankSelect->CurrentValue);
            $this->DepositToBankSelect->PlaceHolder = RemoveHtml($this->DepositToBankSelect->caption());

            // DepositToBank
            $this->DepositToBank->EditAttrs["class"] = "form-control";
            $this->DepositToBank->EditCustomAttributes = "";
            if (!$this->DepositToBank->Raw) {
                $this->DepositToBank->CurrentValue = HtmlDecode($this->DepositToBank->CurrentValue);
            }
            $this->DepositToBank->EditValue = HtmlEncode($this->DepositToBank->CurrentValue);
            $this->DepositToBank->PlaceHolder = RemoveHtml($this->DepositToBank->caption());

            // TransferToSelect
            $this->TransferToSelect->EditAttrs["class"] = "form-control";
            $this->TransferToSelect->EditCustomAttributes = "";
            if (!$this->TransferToSelect->Raw) {
                $this->TransferToSelect->CurrentValue = HtmlDecode($this->TransferToSelect->CurrentValue);
            }
            $this->TransferToSelect->EditValue = HtmlEncode($this->TransferToSelect->CurrentValue);
            $this->TransferToSelect->PlaceHolder = RemoveHtml($this->TransferToSelect->caption());

            // TransferTo
            $this->TransferTo->EditAttrs["class"] = "form-control";
            $this->TransferTo->EditCustomAttributes = "";
            if (!$this->TransferTo->Raw) {
                $this->TransferTo->CurrentValue = HtmlDecode($this->TransferTo->CurrentValue);
            }
            $this->TransferTo->EditValue = HtmlEncode($this->TransferTo->CurrentValue);
            $this->TransferTo->PlaceHolder = RemoveHtml($this->TransferTo->caption());

            // OpeningBalance
            $this->OpeningBalance->EditAttrs["class"] = "form-control";
            $this->OpeningBalance->EditCustomAttributes = "";
            $this->OpeningBalance->EditValue = HtmlEncode($this->OpeningBalance->CurrentValue);
            $this->OpeningBalance->PlaceHolder = RemoveHtml($this->OpeningBalance->caption());
            if (strval($this->OpeningBalance->EditValue) != "" && is_numeric($this->OpeningBalance->EditValue)) {
                $this->OpeningBalance->EditValue = FormatNumber($this->OpeningBalance->EditValue, -2, -2, -2, -2);
            }

            // A2000Count
            $this->A2000Count->EditAttrs["class"] = "form-control";
            $this->A2000Count->EditCustomAttributes = "";
            $this->A2000Count->EditValue = HtmlEncode($this->A2000Count->CurrentValue);
            $this->A2000Count->PlaceHolder = RemoveHtml($this->A2000Count->caption());

            // A2000Amount
            $this->A2000Amount->EditAttrs["class"] = "form-control";
            $this->A2000Amount->EditCustomAttributes = "";
            $this->A2000Amount->EditValue = HtmlEncode($this->A2000Amount->CurrentValue);
            $this->A2000Amount->PlaceHolder = RemoveHtml($this->A2000Amount->caption());
            if (strval($this->A2000Amount->EditValue) != "" && is_numeric($this->A2000Amount->EditValue)) {
                $this->A2000Amount->EditValue = FormatNumber($this->A2000Amount->EditValue, -2, -2, -2, -2);
            }

            // A1000Count
            $this->A1000Count->EditAttrs["class"] = "form-control";
            $this->A1000Count->EditCustomAttributes = "";
            $this->A1000Count->EditValue = HtmlEncode($this->A1000Count->CurrentValue);
            $this->A1000Count->PlaceHolder = RemoveHtml($this->A1000Count->caption());

            // A1000Amount
            $this->A1000Amount->EditAttrs["class"] = "form-control";
            $this->A1000Amount->EditCustomAttributes = "";
            $this->A1000Amount->EditValue = HtmlEncode($this->A1000Amount->CurrentValue);
            $this->A1000Amount->PlaceHolder = RemoveHtml($this->A1000Amount->caption());
            if (strval($this->A1000Amount->EditValue) != "" && is_numeric($this->A1000Amount->EditValue)) {
                $this->A1000Amount->EditValue = FormatNumber($this->A1000Amount->EditValue, -2, -2, -2, -2);
            }

            // A500Count
            $this->A500Count->EditAttrs["class"] = "form-control";
            $this->A500Count->EditCustomAttributes = "";
            $this->A500Count->EditValue = HtmlEncode($this->A500Count->CurrentValue);
            $this->A500Count->PlaceHolder = RemoveHtml($this->A500Count->caption());

            // A500Amount
            $this->A500Amount->EditAttrs["class"] = "form-control";
            $this->A500Amount->EditCustomAttributes = "";
            $this->A500Amount->EditValue = HtmlEncode($this->A500Amount->CurrentValue);
            $this->A500Amount->PlaceHolder = RemoveHtml($this->A500Amount->caption());
            if (strval($this->A500Amount->EditValue) != "" && is_numeric($this->A500Amount->EditValue)) {
                $this->A500Amount->EditValue = FormatNumber($this->A500Amount->EditValue, -2, -2, -2, -2);
            }

            // A200Count
            $this->A200Count->EditAttrs["class"] = "form-control";
            $this->A200Count->EditCustomAttributes = "";
            $this->A200Count->EditValue = HtmlEncode($this->A200Count->CurrentValue);
            $this->A200Count->PlaceHolder = RemoveHtml($this->A200Count->caption());

            // A200Amount
            $this->A200Amount->EditAttrs["class"] = "form-control";
            $this->A200Amount->EditCustomAttributes = "";
            $this->A200Amount->EditValue = HtmlEncode($this->A200Amount->CurrentValue);
            $this->A200Amount->PlaceHolder = RemoveHtml($this->A200Amount->caption());
            if (strval($this->A200Amount->EditValue) != "" && is_numeric($this->A200Amount->EditValue)) {
                $this->A200Amount->EditValue = FormatNumber($this->A200Amount->EditValue, -2, -2, -2, -2);
            }

            // A100Count
            $this->A100Count->EditAttrs["class"] = "form-control";
            $this->A100Count->EditCustomAttributes = "";
            $this->A100Count->EditValue = HtmlEncode($this->A100Count->CurrentValue);
            $this->A100Count->PlaceHolder = RemoveHtml($this->A100Count->caption());

            // A100Amount
            $this->A100Amount->EditAttrs["class"] = "form-control";
            $this->A100Amount->EditCustomAttributes = "";
            $this->A100Amount->EditValue = HtmlEncode($this->A100Amount->CurrentValue);
            $this->A100Amount->PlaceHolder = RemoveHtml($this->A100Amount->caption());
            if (strval($this->A100Amount->EditValue) != "" && is_numeric($this->A100Amount->EditValue)) {
                $this->A100Amount->EditValue = FormatNumber($this->A100Amount->EditValue, -2, -2, -2, -2);
            }

            // A50Count
            $this->A50Count->EditAttrs["class"] = "form-control";
            $this->A50Count->EditCustomAttributes = "";
            $this->A50Count->EditValue = HtmlEncode($this->A50Count->CurrentValue);
            $this->A50Count->PlaceHolder = RemoveHtml($this->A50Count->caption());

            // A50Amount
            $this->A50Amount->EditAttrs["class"] = "form-control";
            $this->A50Amount->EditCustomAttributes = "";
            $this->A50Amount->EditValue = HtmlEncode($this->A50Amount->CurrentValue);
            $this->A50Amount->PlaceHolder = RemoveHtml($this->A50Amount->caption());
            if (strval($this->A50Amount->EditValue) != "" && is_numeric($this->A50Amount->EditValue)) {
                $this->A50Amount->EditValue = FormatNumber($this->A50Amount->EditValue, -2, -2, -2, -2);
            }

            // A20Count
            $this->A20Count->EditAttrs["class"] = "form-control";
            $this->A20Count->EditCustomAttributes = "";
            $this->A20Count->EditValue = HtmlEncode($this->A20Count->CurrentValue);
            $this->A20Count->PlaceHolder = RemoveHtml($this->A20Count->caption());

            // A20Amount
            $this->A20Amount->EditAttrs["class"] = "form-control";
            $this->A20Amount->EditCustomAttributes = "";
            $this->A20Amount->EditValue = HtmlEncode($this->A20Amount->CurrentValue);
            $this->A20Amount->PlaceHolder = RemoveHtml($this->A20Amount->caption());
            if (strval($this->A20Amount->EditValue) != "" && is_numeric($this->A20Amount->EditValue)) {
                $this->A20Amount->EditValue = FormatNumber($this->A20Amount->EditValue, -2, -2, -2, -2);
            }

            // A10Count
            $this->A10Count->EditAttrs["class"] = "form-control";
            $this->A10Count->EditCustomAttributes = "";
            $this->A10Count->EditValue = HtmlEncode($this->A10Count->CurrentValue);
            $this->A10Count->PlaceHolder = RemoveHtml($this->A10Count->caption());

            // A10Amount
            $this->A10Amount->EditAttrs["class"] = "form-control";
            $this->A10Amount->EditCustomAttributes = "";
            $this->A10Amount->EditValue = HtmlEncode($this->A10Amount->CurrentValue);
            $this->A10Amount->PlaceHolder = RemoveHtml($this->A10Amount->caption());
            if (strval($this->A10Amount->EditValue) != "" && is_numeric($this->A10Amount->EditValue)) {
                $this->A10Amount->EditValue = FormatNumber($this->A10Amount->EditValue, -2, -2, -2, -2);
            }

            // Other
            $this->Other->EditAttrs["class"] = "form-control";
            $this->Other->EditCustomAttributes = "";
            $this->Other->EditValue = HtmlEncode($this->Other->CurrentValue);
            $this->Other->PlaceHolder = RemoveHtml($this->Other->caption());
            if (strval($this->Other->EditValue) != "" && is_numeric($this->Other->EditValue)) {
                $this->Other->EditValue = FormatNumber($this->Other->EditValue, -2, -2, -2, -2);
            }

            // TotalCash
            $this->TotalCash->EditAttrs["class"] = "form-control";
            $this->TotalCash->EditCustomAttributes = "";
            $this->TotalCash->EditValue = HtmlEncode($this->TotalCash->CurrentValue);
            $this->TotalCash->PlaceHolder = RemoveHtml($this->TotalCash->caption());
            if (strval($this->TotalCash->EditValue) != "" && is_numeric($this->TotalCash->EditValue)) {
                $this->TotalCash->EditValue = FormatNumber($this->TotalCash->EditValue, -2, -2, -2, -2);
            }

            // Cheque
            $this->Cheque->EditAttrs["class"] = "form-control";
            $this->Cheque->EditCustomAttributes = "";
            $this->Cheque->EditValue = HtmlEncode($this->Cheque->CurrentValue);
            $this->Cheque->PlaceHolder = RemoveHtml($this->Cheque->caption());
            if (strval($this->Cheque->EditValue) != "" && is_numeric($this->Cheque->EditValue)) {
                $this->Cheque->EditValue = FormatNumber($this->Cheque->EditValue, -2, -2, -2, -2);
            }

            // Card
            $this->Card->EditAttrs["class"] = "form-control";
            $this->Card->EditCustomAttributes = "";
            $this->Card->EditValue = HtmlEncode($this->Card->CurrentValue);
            $this->Card->PlaceHolder = RemoveHtml($this->Card->caption());
            if (strval($this->Card->EditValue) != "" && is_numeric($this->Card->EditValue)) {
                $this->Card->EditValue = FormatNumber($this->Card->EditValue, -2, -2, -2, -2);
            }

            // NEFTRTGS
            $this->NEFTRTGS->EditAttrs["class"] = "form-control";
            $this->NEFTRTGS->EditCustomAttributes = "";
            $this->NEFTRTGS->EditValue = HtmlEncode($this->NEFTRTGS->CurrentValue);
            $this->NEFTRTGS->PlaceHolder = RemoveHtml($this->NEFTRTGS->caption());
            if (strval($this->NEFTRTGS->EditValue) != "" && is_numeric($this->NEFTRTGS->EditValue)) {
                $this->NEFTRTGS->EditValue = FormatNumber($this->NEFTRTGS->EditValue, -2, -2, -2, -2);
            }

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->EditAttrs["class"] = "form-control";
            $this->TotalTransferDepositAmount->EditCustomAttributes = "";
            $this->TotalTransferDepositAmount->EditValue = HtmlEncode($this->TotalTransferDepositAmount->CurrentValue);
            $this->TotalTransferDepositAmount->PlaceHolder = RemoveHtml($this->TotalTransferDepositAmount->caption());
            if (strval($this->TotalTransferDepositAmount->EditValue) != "" && is_numeric($this->TotalTransferDepositAmount->EditValue)) {
                $this->TotalTransferDepositAmount->EditValue = FormatNumber($this->TotalTransferDepositAmount->EditValue, -2, -2, -2, -2);
            }

            // CreatedBy
            $this->CreatedBy->EditAttrs["class"] = "form-control";
            $this->CreatedBy->EditCustomAttributes = "";
            $this->CreatedBy->EditValue = HtmlEncode($this->CreatedBy->CurrentValue);
            $this->CreatedBy->PlaceHolder = RemoveHtml($this->CreatedBy->caption());

            // CreatedDateTime
            $this->CreatedDateTime->EditAttrs["class"] = "form-control";
            $this->CreatedDateTime->EditCustomAttributes = "";
            $this->CreatedDateTime->EditValue = HtmlEncode(FormatDateTime($this->CreatedDateTime->CurrentValue, 8));
            $this->CreatedDateTime->PlaceHolder = RemoveHtml($this->CreatedDateTime->caption());

            // ModifiedBy
            $this->ModifiedBy->EditAttrs["class"] = "form-control";
            $this->ModifiedBy->EditCustomAttributes = "";
            $this->ModifiedBy->EditValue = HtmlEncode($this->ModifiedBy->CurrentValue);
            $this->ModifiedBy->PlaceHolder = RemoveHtml($this->ModifiedBy->caption());

            // ModifiedDateTime
            $this->ModifiedDateTime->EditAttrs["class"] = "form-control";
            $this->ModifiedDateTime->EditCustomAttributes = "";
            $this->ModifiedDateTime->EditValue = HtmlEncode(FormatDateTime($this->ModifiedDateTime->CurrentValue, 8));
            $this->ModifiedDateTime->PlaceHolder = RemoveHtml($this->ModifiedDateTime->caption());

            // CreatedUserName
            $this->CreatedUserName->EditAttrs["class"] = "form-control";
            $this->CreatedUserName->EditCustomAttributes = "";
            if (!$this->CreatedUserName->Raw) {
                $this->CreatedUserName->CurrentValue = HtmlDecode($this->CreatedUserName->CurrentValue);
            }
            $this->CreatedUserName->EditValue = HtmlEncode($this->CreatedUserName->CurrentValue);
            $this->CreatedUserName->PlaceHolder = RemoveHtml($this->CreatedUserName->caption());

            // ModifiedUserName
            $this->ModifiedUserName->EditAttrs["class"] = "form-control";
            $this->ModifiedUserName->EditCustomAttributes = "";
            if (!$this->ModifiedUserName->Raw) {
                $this->ModifiedUserName->CurrentValue = HtmlDecode($this->ModifiedUserName->CurrentValue);
            }
            $this->ModifiedUserName->EditValue = HtmlEncode($this->ModifiedUserName->CurrentValue);
            $this->ModifiedUserName->PlaceHolder = RemoveHtml($this->ModifiedUserName->caption());

            // BalanceAmount
            $this->BalanceAmount->EditAttrs["class"] = "form-control";
            $this->BalanceAmount->EditCustomAttributes = "";
            $this->BalanceAmount->EditValue = HtmlEncode($this->BalanceAmount->CurrentValue);
            $this->BalanceAmount->PlaceHolder = RemoveHtml($this->BalanceAmount->caption());
            if (strval($this->BalanceAmount->EditValue) != "" && is_numeric($this->BalanceAmount->EditValue)) {
                $this->BalanceAmount->EditValue = FormatNumber($this->BalanceAmount->EditValue, -2, -2, -2, -2);
            }

            // CashCollected
            $this->CashCollected->EditAttrs["class"] = "form-control";
            $this->CashCollected->EditCustomAttributes = "";
            $this->CashCollected->EditValue = HtmlEncode($this->CashCollected->CurrentValue);
            $this->CashCollected->PlaceHolder = RemoveHtml($this->CashCollected->caption());
            if (strval($this->CashCollected->EditValue) != "" && is_numeric($this->CashCollected->EditValue)) {
                $this->CashCollected->EditValue = FormatNumber($this->CashCollected->EditValue, -2, -2, -2, -2);
            }

            // RTGS
            $this->RTGS->EditAttrs["class"] = "form-control";
            $this->RTGS->EditCustomAttributes = "";
            $this->RTGS->EditValue = HtmlEncode($this->RTGS->CurrentValue);
            $this->RTGS->PlaceHolder = RemoveHtml($this->RTGS->caption());
            if (strval($this->RTGS->EditValue) != "" && is_numeric($this->RTGS->EditValue)) {
                $this->RTGS->EditValue = FormatNumber($this->RTGS->EditValue, -2, -2, -2, -2);
            }

            // PAYTM
            $this->PAYTM->EditAttrs["class"] = "form-control";
            $this->PAYTM->EditCustomAttributes = "";
            $this->PAYTM->EditValue = HtmlEncode($this->PAYTM->CurrentValue);
            $this->PAYTM->PlaceHolder = RemoveHtml($this->PAYTM->caption());
            if (strval($this->PAYTM->EditValue) != "" && is_numeric($this->PAYTM->EditValue)) {
                $this->PAYTM->EditValue = FormatNumber($this->PAYTM->EditValue, -2, -2, -2, -2);
            }

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // DepositDate
            $this->DepositDate->LinkCustomAttributes = "";
            $this->DepositDate->HrefValue = "";

            // DepositToBankSelect
            $this->DepositToBankSelect->LinkCustomAttributes = "";
            $this->DepositToBankSelect->HrefValue = "";

            // DepositToBank
            $this->DepositToBank->LinkCustomAttributes = "";
            $this->DepositToBank->HrefValue = "";

            // TransferToSelect
            $this->TransferToSelect->LinkCustomAttributes = "";
            $this->TransferToSelect->HrefValue = "";

            // TransferTo
            $this->TransferTo->LinkCustomAttributes = "";
            $this->TransferTo->HrefValue = "";

            // OpeningBalance
            $this->OpeningBalance->LinkCustomAttributes = "";
            $this->OpeningBalance->HrefValue = "";

            // A2000Count
            $this->A2000Count->LinkCustomAttributes = "";
            $this->A2000Count->HrefValue = "";

            // A2000Amount
            $this->A2000Amount->LinkCustomAttributes = "";
            $this->A2000Amount->HrefValue = "";

            // A1000Count
            $this->A1000Count->LinkCustomAttributes = "";
            $this->A1000Count->HrefValue = "";

            // A1000Amount
            $this->A1000Amount->LinkCustomAttributes = "";
            $this->A1000Amount->HrefValue = "";

            // A500Count
            $this->A500Count->LinkCustomAttributes = "";
            $this->A500Count->HrefValue = "";

            // A500Amount
            $this->A500Amount->LinkCustomAttributes = "";
            $this->A500Amount->HrefValue = "";

            // A200Count
            $this->A200Count->LinkCustomAttributes = "";
            $this->A200Count->HrefValue = "";

            // A200Amount
            $this->A200Amount->LinkCustomAttributes = "";
            $this->A200Amount->HrefValue = "";

            // A100Count
            $this->A100Count->LinkCustomAttributes = "";
            $this->A100Count->HrefValue = "";

            // A100Amount
            $this->A100Amount->LinkCustomAttributes = "";
            $this->A100Amount->HrefValue = "";

            // A50Count
            $this->A50Count->LinkCustomAttributes = "";
            $this->A50Count->HrefValue = "";

            // A50Amount
            $this->A50Amount->LinkCustomAttributes = "";
            $this->A50Amount->HrefValue = "";

            // A20Count
            $this->A20Count->LinkCustomAttributes = "";
            $this->A20Count->HrefValue = "";

            // A20Amount
            $this->A20Amount->LinkCustomAttributes = "";
            $this->A20Amount->HrefValue = "";

            // A10Count
            $this->A10Count->LinkCustomAttributes = "";
            $this->A10Count->HrefValue = "";

            // A10Amount
            $this->A10Amount->LinkCustomAttributes = "";
            $this->A10Amount->HrefValue = "";

            // Other
            $this->Other->LinkCustomAttributes = "";
            $this->Other->HrefValue = "";

            // TotalCash
            $this->TotalCash->LinkCustomAttributes = "";
            $this->TotalCash->HrefValue = "";

            // Cheque
            $this->Cheque->LinkCustomAttributes = "";
            $this->Cheque->HrefValue = "";

            // Card
            $this->Card->LinkCustomAttributes = "";
            $this->Card->HrefValue = "";

            // NEFTRTGS
            $this->NEFTRTGS->LinkCustomAttributes = "";
            $this->NEFTRTGS->HrefValue = "";

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->LinkCustomAttributes = "";
            $this->TotalTransferDepositAmount->HrefValue = "";

            // CreatedBy
            $this->CreatedBy->LinkCustomAttributes = "";
            $this->CreatedBy->HrefValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";

            // ModifiedBy
            $this->ModifiedBy->LinkCustomAttributes = "";
            $this->ModifiedBy->HrefValue = "";

            // ModifiedDateTime
            $this->ModifiedDateTime->LinkCustomAttributes = "";
            $this->ModifiedDateTime->HrefValue = "";

            // CreatedUserName
            $this->CreatedUserName->LinkCustomAttributes = "";
            $this->CreatedUserName->HrefValue = "";

            // ModifiedUserName
            $this->ModifiedUserName->LinkCustomAttributes = "";
            $this->ModifiedUserName->HrefValue = "";

            // BalanceAmount
            $this->BalanceAmount->LinkCustomAttributes = "";
            $this->BalanceAmount->HrefValue = "";

            // CashCollected
            $this->CashCollected->LinkCustomAttributes = "";
            $this->CashCollected->HrefValue = "";

            // RTGS
            $this->RTGS->LinkCustomAttributes = "";
            $this->RTGS->HrefValue = "";

            // PAYTM
            $this->PAYTM->LinkCustomAttributes = "";
            $this->PAYTM->HrefValue = "";

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
        if ($this->DepositDate->Required) {
            if (!$this->DepositDate->IsDetailKey && EmptyValue($this->DepositDate->FormValue)) {
                $this->DepositDate->addErrorMessage(str_replace("%s", $this->DepositDate->caption(), $this->DepositDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DepositDate->FormValue)) {
            $this->DepositDate->addErrorMessage($this->DepositDate->getErrorMessage(false));
        }
        if ($this->DepositToBankSelect->Required) {
            if (!$this->DepositToBankSelect->IsDetailKey && EmptyValue($this->DepositToBankSelect->FormValue)) {
                $this->DepositToBankSelect->addErrorMessage(str_replace("%s", $this->DepositToBankSelect->caption(), $this->DepositToBankSelect->RequiredErrorMessage));
            }
        }
        if ($this->DepositToBank->Required) {
            if (!$this->DepositToBank->IsDetailKey && EmptyValue($this->DepositToBank->FormValue)) {
                $this->DepositToBank->addErrorMessage(str_replace("%s", $this->DepositToBank->caption(), $this->DepositToBank->RequiredErrorMessage));
            }
        }
        if ($this->TransferToSelect->Required) {
            if (!$this->TransferToSelect->IsDetailKey && EmptyValue($this->TransferToSelect->FormValue)) {
                $this->TransferToSelect->addErrorMessage(str_replace("%s", $this->TransferToSelect->caption(), $this->TransferToSelect->RequiredErrorMessage));
            }
        }
        if ($this->TransferTo->Required) {
            if (!$this->TransferTo->IsDetailKey && EmptyValue($this->TransferTo->FormValue)) {
                $this->TransferTo->addErrorMessage(str_replace("%s", $this->TransferTo->caption(), $this->TransferTo->RequiredErrorMessage));
            }
        }
        if ($this->OpeningBalance->Required) {
            if (!$this->OpeningBalance->IsDetailKey && EmptyValue($this->OpeningBalance->FormValue)) {
                $this->OpeningBalance->addErrorMessage(str_replace("%s", $this->OpeningBalance->caption(), $this->OpeningBalance->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->OpeningBalance->FormValue)) {
            $this->OpeningBalance->addErrorMessage($this->OpeningBalance->getErrorMessage(false));
        }
        if ($this->A2000Count->Required) {
            if (!$this->A2000Count->IsDetailKey && EmptyValue($this->A2000Count->FormValue)) {
                $this->A2000Count->addErrorMessage(str_replace("%s", $this->A2000Count->caption(), $this->A2000Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A2000Count->FormValue)) {
            $this->A2000Count->addErrorMessage($this->A2000Count->getErrorMessage(false));
        }
        if ($this->A2000Amount->Required) {
            if (!$this->A2000Amount->IsDetailKey && EmptyValue($this->A2000Amount->FormValue)) {
                $this->A2000Amount->addErrorMessage(str_replace("%s", $this->A2000Amount->caption(), $this->A2000Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A2000Amount->FormValue)) {
            $this->A2000Amount->addErrorMessage($this->A2000Amount->getErrorMessage(false));
        }
        if ($this->A1000Count->Required) {
            if (!$this->A1000Count->IsDetailKey && EmptyValue($this->A1000Count->FormValue)) {
                $this->A1000Count->addErrorMessage(str_replace("%s", $this->A1000Count->caption(), $this->A1000Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A1000Count->FormValue)) {
            $this->A1000Count->addErrorMessage($this->A1000Count->getErrorMessage(false));
        }
        if ($this->A1000Amount->Required) {
            if (!$this->A1000Amount->IsDetailKey && EmptyValue($this->A1000Amount->FormValue)) {
                $this->A1000Amount->addErrorMessage(str_replace("%s", $this->A1000Amount->caption(), $this->A1000Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A1000Amount->FormValue)) {
            $this->A1000Amount->addErrorMessage($this->A1000Amount->getErrorMessage(false));
        }
        if ($this->A500Count->Required) {
            if (!$this->A500Count->IsDetailKey && EmptyValue($this->A500Count->FormValue)) {
                $this->A500Count->addErrorMessage(str_replace("%s", $this->A500Count->caption(), $this->A500Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A500Count->FormValue)) {
            $this->A500Count->addErrorMessage($this->A500Count->getErrorMessage(false));
        }
        if ($this->A500Amount->Required) {
            if (!$this->A500Amount->IsDetailKey && EmptyValue($this->A500Amount->FormValue)) {
                $this->A500Amount->addErrorMessage(str_replace("%s", $this->A500Amount->caption(), $this->A500Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A500Amount->FormValue)) {
            $this->A500Amount->addErrorMessage($this->A500Amount->getErrorMessage(false));
        }
        if ($this->A200Count->Required) {
            if (!$this->A200Count->IsDetailKey && EmptyValue($this->A200Count->FormValue)) {
                $this->A200Count->addErrorMessage(str_replace("%s", $this->A200Count->caption(), $this->A200Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A200Count->FormValue)) {
            $this->A200Count->addErrorMessage($this->A200Count->getErrorMessage(false));
        }
        if ($this->A200Amount->Required) {
            if (!$this->A200Amount->IsDetailKey && EmptyValue($this->A200Amount->FormValue)) {
                $this->A200Amount->addErrorMessage(str_replace("%s", $this->A200Amount->caption(), $this->A200Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A200Amount->FormValue)) {
            $this->A200Amount->addErrorMessage($this->A200Amount->getErrorMessage(false));
        }
        if ($this->A100Count->Required) {
            if (!$this->A100Count->IsDetailKey && EmptyValue($this->A100Count->FormValue)) {
                $this->A100Count->addErrorMessage(str_replace("%s", $this->A100Count->caption(), $this->A100Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A100Count->FormValue)) {
            $this->A100Count->addErrorMessage($this->A100Count->getErrorMessage(false));
        }
        if ($this->A100Amount->Required) {
            if (!$this->A100Amount->IsDetailKey && EmptyValue($this->A100Amount->FormValue)) {
                $this->A100Amount->addErrorMessage(str_replace("%s", $this->A100Amount->caption(), $this->A100Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A100Amount->FormValue)) {
            $this->A100Amount->addErrorMessage($this->A100Amount->getErrorMessage(false));
        }
        if ($this->A50Count->Required) {
            if (!$this->A50Count->IsDetailKey && EmptyValue($this->A50Count->FormValue)) {
                $this->A50Count->addErrorMessage(str_replace("%s", $this->A50Count->caption(), $this->A50Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A50Count->FormValue)) {
            $this->A50Count->addErrorMessage($this->A50Count->getErrorMessage(false));
        }
        if ($this->A50Amount->Required) {
            if (!$this->A50Amount->IsDetailKey && EmptyValue($this->A50Amount->FormValue)) {
                $this->A50Amount->addErrorMessage(str_replace("%s", $this->A50Amount->caption(), $this->A50Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A50Amount->FormValue)) {
            $this->A50Amount->addErrorMessage($this->A50Amount->getErrorMessage(false));
        }
        if ($this->A20Count->Required) {
            if (!$this->A20Count->IsDetailKey && EmptyValue($this->A20Count->FormValue)) {
                $this->A20Count->addErrorMessage(str_replace("%s", $this->A20Count->caption(), $this->A20Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A20Count->FormValue)) {
            $this->A20Count->addErrorMessage($this->A20Count->getErrorMessage(false));
        }
        if ($this->A20Amount->Required) {
            if (!$this->A20Amount->IsDetailKey && EmptyValue($this->A20Amount->FormValue)) {
                $this->A20Amount->addErrorMessage(str_replace("%s", $this->A20Amount->caption(), $this->A20Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A20Amount->FormValue)) {
            $this->A20Amount->addErrorMessage($this->A20Amount->getErrorMessage(false));
        }
        if ($this->A10Count->Required) {
            if (!$this->A10Count->IsDetailKey && EmptyValue($this->A10Count->FormValue)) {
                $this->A10Count->addErrorMessage(str_replace("%s", $this->A10Count->caption(), $this->A10Count->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->A10Count->FormValue)) {
            $this->A10Count->addErrorMessage($this->A10Count->getErrorMessage(false));
        }
        if ($this->A10Amount->Required) {
            if (!$this->A10Amount->IsDetailKey && EmptyValue($this->A10Amount->FormValue)) {
                $this->A10Amount->addErrorMessage(str_replace("%s", $this->A10Amount->caption(), $this->A10Amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->A10Amount->FormValue)) {
            $this->A10Amount->addErrorMessage($this->A10Amount->getErrorMessage(false));
        }
        if ($this->Other->Required) {
            if (!$this->Other->IsDetailKey && EmptyValue($this->Other->FormValue)) {
                $this->Other->addErrorMessage(str_replace("%s", $this->Other->caption(), $this->Other->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Other->FormValue)) {
            $this->Other->addErrorMessage($this->Other->getErrorMessage(false));
        }
        if ($this->TotalCash->Required) {
            if (!$this->TotalCash->IsDetailKey && EmptyValue($this->TotalCash->FormValue)) {
                $this->TotalCash->addErrorMessage(str_replace("%s", $this->TotalCash->caption(), $this->TotalCash->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TotalCash->FormValue)) {
            $this->TotalCash->addErrorMessage($this->TotalCash->getErrorMessage(false));
        }
        if ($this->Cheque->Required) {
            if (!$this->Cheque->IsDetailKey && EmptyValue($this->Cheque->FormValue)) {
                $this->Cheque->addErrorMessage(str_replace("%s", $this->Cheque->caption(), $this->Cheque->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Cheque->FormValue)) {
            $this->Cheque->addErrorMessage($this->Cheque->getErrorMessage(false));
        }
        if ($this->Card->Required) {
            if (!$this->Card->IsDetailKey && EmptyValue($this->Card->FormValue)) {
                $this->Card->addErrorMessage(str_replace("%s", $this->Card->caption(), $this->Card->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Card->FormValue)) {
            $this->Card->addErrorMessage($this->Card->getErrorMessage(false));
        }
        if ($this->NEFTRTGS->Required) {
            if (!$this->NEFTRTGS->IsDetailKey && EmptyValue($this->NEFTRTGS->FormValue)) {
                $this->NEFTRTGS->addErrorMessage(str_replace("%s", $this->NEFTRTGS->caption(), $this->NEFTRTGS->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->NEFTRTGS->FormValue)) {
            $this->NEFTRTGS->addErrorMessage($this->NEFTRTGS->getErrorMessage(false));
        }
        if ($this->TotalTransferDepositAmount->Required) {
            if (!$this->TotalTransferDepositAmount->IsDetailKey && EmptyValue($this->TotalTransferDepositAmount->FormValue)) {
                $this->TotalTransferDepositAmount->addErrorMessage(str_replace("%s", $this->TotalTransferDepositAmount->caption(), $this->TotalTransferDepositAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->TotalTransferDepositAmount->FormValue)) {
            $this->TotalTransferDepositAmount->addErrorMessage($this->TotalTransferDepositAmount->getErrorMessage(false));
        }
        if ($this->CreatedBy->Required) {
            if (!$this->CreatedBy->IsDetailKey && EmptyValue($this->CreatedBy->FormValue)) {
                $this->CreatedBy->addErrorMessage(str_replace("%s", $this->CreatedBy->caption(), $this->CreatedBy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CreatedBy->FormValue)) {
            $this->CreatedBy->addErrorMessage($this->CreatedBy->getErrorMessage(false));
        }
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CreatedDateTime->FormValue)) {
            $this->CreatedDateTime->addErrorMessage($this->CreatedDateTime->getErrorMessage(false));
        }
        if ($this->ModifiedBy->Required) {
            if (!$this->ModifiedBy->IsDetailKey && EmptyValue($this->ModifiedBy->FormValue)) {
                $this->ModifiedBy->addErrorMessage(str_replace("%s", $this->ModifiedBy->caption(), $this->ModifiedBy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ModifiedBy->FormValue)) {
            $this->ModifiedBy->addErrorMessage($this->ModifiedBy->getErrorMessage(false));
        }
        if ($this->ModifiedDateTime->Required) {
            if (!$this->ModifiedDateTime->IsDetailKey && EmptyValue($this->ModifiedDateTime->FormValue)) {
                $this->ModifiedDateTime->addErrorMessage(str_replace("%s", $this->ModifiedDateTime->caption(), $this->ModifiedDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ModifiedDateTime->FormValue)) {
            $this->ModifiedDateTime->addErrorMessage($this->ModifiedDateTime->getErrorMessage(false));
        }
        if ($this->CreatedUserName->Required) {
            if (!$this->CreatedUserName->IsDetailKey && EmptyValue($this->CreatedUserName->FormValue)) {
                $this->CreatedUserName->addErrorMessage(str_replace("%s", $this->CreatedUserName->caption(), $this->CreatedUserName->RequiredErrorMessage));
            }
        }
        if ($this->ModifiedUserName->Required) {
            if (!$this->ModifiedUserName->IsDetailKey && EmptyValue($this->ModifiedUserName->FormValue)) {
                $this->ModifiedUserName->addErrorMessage(str_replace("%s", $this->ModifiedUserName->caption(), $this->ModifiedUserName->RequiredErrorMessage));
            }
        }
        if ($this->BalanceAmount->Required) {
            if (!$this->BalanceAmount->IsDetailKey && EmptyValue($this->BalanceAmount->FormValue)) {
                $this->BalanceAmount->addErrorMessage(str_replace("%s", $this->BalanceAmount->caption(), $this->BalanceAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->BalanceAmount->FormValue)) {
            $this->BalanceAmount->addErrorMessage($this->BalanceAmount->getErrorMessage(false));
        }
        if ($this->CashCollected->Required) {
            if (!$this->CashCollected->IsDetailKey && EmptyValue($this->CashCollected->FormValue)) {
                $this->CashCollected->addErrorMessage(str_replace("%s", $this->CashCollected->caption(), $this->CashCollected->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->CashCollected->FormValue)) {
            $this->CashCollected->addErrorMessage($this->CashCollected->getErrorMessage(false));
        }
        if ($this->RTGS->Required) {
            if (!$this->RTGS->IsDetailKey && EmptyValue($this->RTGS->FormValue)) {
                $this->RTGS->addErrorMessage(str_replace("%s", $this->RTGS->caption(), $this->RTGS->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->RTGS->FormValue)) {
            $this->RTGS->addErrorMessage($this->RTGS->getErrorMessage(false));
        }
        if ($this->PAYTM->Required) {
            if (!$this->PAYTM->IsDetailKey && EmptyValue($this->PAYTM->FormValue)) {
                $this->PAYTM->addErrorMessage(str_replace("%s", $this->PAYTM->caption(), $this->PAYTM->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->PAYTM->FormValue)) {
            $this->PAYTM->addErrorMessage($this->PAYTM->getErrorMessage(false));
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

            // DepositDate
            $this->DepositDate->setDbValueDef($rsnew, UnFormatDateTime($this->DepositDate->CurrentValue, 0), null, $this->DepositDate->ReadOnly);

            // DepositToBankSelect
            $this->DepositToBankSelect->setDbValueDef($rsnew, $this->DepositToBankSelect->CurrentValue, null, $this->DepositToBankSelect->ReadOnly);

            // DepositToBank
            $this->DepositToBank->setDbValueDef($rsnew, $this->DepositToBank->CurrentValue, null, $this->DepositToBank->ReadOnly);

            // TransferToSelect
            $this->TransferToSelect->setDbValueDef($rsnew, $this->TransferToSelect->CurrentValue, null, $this->TransferToSelect->ReadOnly);

            // TransferTo
            $this->TransferTo->setDbValueDef($rsnew, $this->TransferTo->CurrentValue, null, $this->TransferTo->ReadOnly);

            // OpeningBalance
            $this->OpeningBalance->setDbValueDef($rsnew, $this->OpeningBalance->CurrentValue, null, $this->OpeningBalance->ReadOnly);

            // A2000Count
            $this->A2000Count->setDbValueDef($rsnew, $this->A2000Count->CurrentValue, null, $this->A2000Count->ReadOnly);

            // A2000Amount
            $this->A2000Amount->setDbValueDef($rsnew, $this->A2000Amount->CurrentValue, null, $this->A2000Amount->ReadOnly);

            // A1000Count
            $this->A1000Count->setDbValueDef($rsnew, $this->A1000Count->CurrentValue, null, $this->A1000Count->ReadOnly);

            // A1000Amount
            $this->A1000Amount->setDbValueDef($rsnew, $this->A1000Amount->CurrentValue, null, $this->A1000Amount->ReadOnly);

            // A500Count
            $this->A500Count->setDbValueDef($rsnew, $this->A500Count->CurrentValue, null, $this->A500Count->ReadOnly);

            // A500Amount
            $this->A500Amount->setDbValueDef($rsnew, $this->A500Amount->CurrentValue, null, $this->A500Amount->ReadOnly);

            // A200Count
            $this->A200Count->setDbValueDef($rsnew, $this->A200Count->CurrentValue, null, $this->A200Count->ReadOnly);

            // A200Amount
            $this->A200Amount->setDbValueDef($rsnew, $this->A200Amount->CurrentValue, null, $this->A200Amount->ReadOnly);

            // A100Count
            $this->A100Count->setDbValueDef($rsnew, $this->A100Count->CurrentValue, null, $this->A100Count->ReadOnly);

            // A100Amount
            $this->A100Amount->setDbValueDef($rsnew, $this->A100Amount->CurrentValue, null, $this->A100Amount->ReadOnly);

            // A50Count
            $this->A50Count->setDbValueDef($rsnew, $this->A50Count->CurrentValue, null, $this->A50Count->ReadOnly);

            // A50Amount
            $this->A50Amount->setDbValueDef($rsnew, $this->A50Amount->CurrentValue, null, $this->A50Amount->ReadOnly);

            // A20Count
            $this->A20Count->setDbValueDef($rsnew, $this->A20Count->CurrentValue, null, $this->A20Count->ReadOnly);

            // A20Amount
            $this->A20Amount->setDbValueDef($rsnew, $this->A20Amount->CurrentValue, null, $this->A20Amount->ReadOnly);

            // A10Count
            $this->A10Count->setDbValueDef($rsnew, $this->A10Count->CurrentValue, null, $this->A10Count->ReadOnly);

            // A10Amount
            $this->A10Amount->setDbValueDef($rsnew, $this->A10Amount->CurrentValue, null, $this->A10Amount->ReadOnly);

            // Other
            $this->Other->setDbValueDef($rsnew, $this->Other->CurrentValue, null, $this->Other->ReadOnly);

            // TotalCash
            $this->TotalCash->setDbValueDef($rsnew, $this->TotalCash->CurrentValue, null, $this->TotalCash->ReadOnly);

            // Cheque
            $this->Cheque->setDbValueDef($rsnew, $this->Cheque->CurrentValue, null, $this->Cheque->ReadOnly);

            // Card
            $this->Card->setDbValueDef($rsnew, $this->Card->CurrentValue, null, $this->Card->ReadOnly);

            // NEFTRTGS
            $this->NEFTRTGS->setDbValueDef($rsnew, $this->NEFTRTGS->CurrentValue, null, $this->NEFTRTGS->ReadOnly);

            // TotalTransferDepositAmount
            $this->TotalTransferDepositAmount->setDbValueDef($rsnew, $this->TotalTransferDepositAmount->CurrentValue, null, $this->TotalTransferDepositAmount->ReadOnly);

            // CreatedBy
            $this->CreatedBy->setDbValueDef($rsnew, $this->CreatedBy->CurrentValue, null, $this->CreatedBy->ReadOnly);

            // CreatedDateTime
            $this->CreatedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0), null, $this->CreatedDateTime->ReadOnly);

            // ModifiedBy
            $this->ModifiedBy->setDbValueDef($rsnew, $this->ModifiedBy->CurrentValue, null, $this->ModifiedBy->ReadOnly);

            // ModifiedDateTime
            $this->ModifiedDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ModifiedDateTime->CurrentValue, 0), null, $this->ModifiedDateTime->ReadOnly);

            // CreatedUserName
            $this->CreatedUserName->setDbValueDef($rsnew, $this->CreatedUserName->CurrentValue, null, $this->CreatedUserName->ReadOnly);

            // ModifiedUserName
            $this->ModifiedUserName->setDbValueDef($rsnew, $this->ModifiedUserName->CurrentValue, null, $this->ModifiedUserName->ReadOnly);

            // BalanceAmount
            $this->BalanceAmount->setDbValueDef($rsnew, $this->BalanceAmount->CurrentValue, null, $this->BalanceAmount->ReadOnly);

            // CashCollected
            $this->CashCollected->setDbValueDef($rsnew, $this->CashCollected->CurrentValue, null, $this->CashCollected->ReadOnly);

            // RTGS
            $this->RTGS->setDbValueDef($rsnew, $this->RTGS->CurrentValue, null, $this->RTGS->ReadOnly);

            // PAYTM
            $this->PAYTM->setDbValueDef($rsnew, $this->PAYTM->CurrentValue, null, $this->PAYTM->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DepositdetailsList"), "", $this->TableVar, true);
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