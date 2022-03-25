<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ReceiptsAdd extends Receipts
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'receipts';

    // Page object name
    public $PageObjName = "ReceiptsAdd";

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

        // Table object (receipts)
        if (!isset($GLOBALS["receipts"]) || get_class($GLOBALS["receipts"]) == PROJECT_NAMESPACE . "receipts") {
            $GLOBALS["receipts"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'receipts');
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
                $doc = new $class(Container("receipts"));
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
                    if ($pageName == "ReceiptsView") {
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
        $this->Reception->setVisibility();
        $this->Aid->setVisibility();
        $this->Vid->setVisibility();
        $this->patient_id->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->amount->setVisibility();
        $this->Discount->setVisibility();
        $this->SubTotal->setVisibility();
        $this->patient_type->setVisibility();
        $this->invoiceId->setVisibility();
        $this->invoiceAmount->setVisibility();
        $this->invoiceStatus->setVisibility();
        $this->modeOfPayment->setVisibility();
        $this->charged_date->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->ChequeCardNo->setVisibility();
        $this->CreditBankName->setVisibility();
        $this->CreditCardHolder->setVisibility();
        $this->CreditCardType->setVisibility();
        $this->CreditCardMachine->setVisibility();
        $this->CreditCardBatchNo->setVisibility();
        $this->CreditCardTax->setVisibility();
        $this->CreditDeductionAmount->setVisibility();
        $this->RealizationAmount->setVisibility();
        $this->RealizationStatus->setVisibility();
        $this->RealizationRemarks->setVisibility();
        $this->RealizationBatchNo->setVisibility();
        $this->RealizationDate->setVisibility();
        $this->BankAccHolderMobileNumber->setVisibility();
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
                    $this->terminate("ReceiptsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "ReceiptsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "ReceiptsView") {
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
        $this->Reception->CurrentValue = null;
        $this->Reception->OldValue = $this->Reception->CurrentValue;
        $this->Aid->CurrentValue = null;
        $this->Aid->OldValue = $this->Aid->CurrentValue;
        $this->Vid->CurrentValue = null;
        $this->Vid->OldValue = $this->Vid->CurrentValue;
        $this->patient_id->CurrentValue = null;
        $this->patient_id->OldValue = $this->patient_id->CurrentValue;
        $this->mrnno->CurrentValue = null;
        $this->mrnno->OldValue = $this->mrnno->CurrentValue;
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->amount->CurrentValue = null;
        $this->amount->OldValue = $this->amount->CurrentValue;
        $this->Discount->CurrentValue = null;
        $this->Discount->OldValue = $this->Discount->CurrentValue;
        $this->SubTotal->CurrentValue = null;
        $this->SubTotal->OldValue = $this->SubTotal->CurrentValue;
        $this->patient_type->CurrentValue = null;
        $this->patient_type->OldValue = $this->patient_type->CurrentValue;
        $this->invoiceId->CurrentValue = null;
        $this->invoiceId->OldValue = $this->invoiceId->CurrentValue;
        $this->invoiceAmount->CurrentValue = null;
        $this->invoiceAmount->OldValue = $this->invoiceAmount->CurrentValue;
        $this->invoiceStatus->CurrentValue = null;
        $this->invoiceStatus->OldValue = $this->invoiceStatus->CurrentValue;
        $this->modeOfPayment->CurrentValue = null;
        $this->modeOfPayment->OldValue = $this->modeOfPayment->CurrentValue;
        $this->charged_date->CurrentValue = null;
        $this->charged_date->OldValue = $this->charged_date->CurrentValue;
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
        $this->ChequeCardNo->CurrentValue = null;
        $this->ChequeCardNo->OldValue = $this->ChequeCardNo->CurrentValue;
        $this->CreditBankName->CurrentValue = null;
        $this->CreditBankName->OldValue = $this->CreditBankName->CurrentValue;
        $this->CreditCardHolder->CurrentValue = null;
        $this->CreditCardHolder->OldValue = $this->CreditCardHolder->CurrentValue;
        $this->CreditCardType->CurrentValue = null;
        $this->CreditCardType->OldValue = $this->CreditCardType->CurrentValue;
        $this->CreditCardMachine->CurrentValue = null;
        $this->CreditCardMachine->OldValue = $this->CreditCardMachine->CurrentValue;
        $this->CreditCardBatchNo->CurrentValue = null;
        $this->CreditCardBatchNo->OldValue = $this->CreditCardBatchNo->CurrentValue;
        $this->CreditCardTax->CurrentValue = null;
        $this->CreditCardTax->OldValue = $this->CreditCardTax->CurrentValue;
        $this->CreditDeductionAmount->CurrentValue = null;
        $this->CreditDeductionAmount->OldValue = $this->CreditDeductionAmount->CurrentValue;
        $this->RealizationAmount->CurrentValue = null;
        $this->RealizationAmount->OldValue = $this->RealizationAmount->CurrentValue;
        $this->RealizationStatus->CurrentValue = null;
        $this->RealizationStatus->OldValue = $this->RealizationStatus->CurrentValue;
        $this->RealizationRemarks->CurrentValue = null;
        $this->RealizationRemarks->OldValue = $this->RealizationRemarks->CurrentValue;
        $this->RealizationBatchNo->CurrentValue = null;
        $this->RealizationBatchNo->OldValue = $this->RealizationBatchNo->CurrentValue;
        $this->RealizationDate->CurrentValue = null;
        $this->RealizationDate->OldValue = $this->RealizationDate->CurrentValue;
        $this->BankAccHolderMobileNumber->CurrentValue = null;
        $this->BankAccHolderMobileNumber->OldValue = $this->BankAccHolderMobileNumber->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'Reception' first before field var 'x_Reception'
        $val = $CurrentForm->hasValue("Reception") ? $CurrentForm->getValue("Reception") : $CurrentForm->getValue("x_Reception");
        if (!$this->Reception->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Reception->Visible = false; // Disable update for API request
            } else {
                $this->Reception->setFormValue($val);
            }
        }

        // Check field name 'Aid' first before field var 'x_Aid'
        $val = $CurrentForm->hasValue("Aid") ? $CurrentForm->getValue("Aid") : $CurrentForm->getValue("x_Aid");
        if (!$this->Aid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Aid->Visible = false; // Disable update for API request
            } else {
                $this->Aid->setFormValue($val);
            }
        }

        // Check field name 'Vid' first before field var 'x_Vid'
        $val = $CurrentForm->hasValue("Vid") ? $CurrentForm->getValue("Vid") : $CurrentForm->getValue("x_Vid");
        if (!$this->Vid->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Vid->Visible = false; // Disable update for API request
            } else {
                $this->Vid->setFormValue($val);
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

        // Check field name 'amount' first before field var 'x_amount'
        $val = $CurrentForm->hasValue("amount") ? $CurrentForm->getValue("amount") : $CurrentForm->getValue("x_amount");
        if (!$this->amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->amount->Visible = false; // Disable update for API request
            } else {
                $this->amount->setFormValue($val);
            }
        }

        // Check field name 'Discount' first before field var 'x_Discount'
        $val = $CurrentForm->hasValue("Discount") ? $CurrentForm->getValue("Discount") : $CurrentForm->getValue("x_Discount");
        if (!$this->Discount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Discount->Visible = false; // Disable update for API request
            } else {
                $this->Discount->setFormValue($val);
            }
        }

        // Check field name 'SubTotal' first before field var 'x_SubTotal'
        $val = $CurrentForm->hasValue("SubTotal") ? $CurrentForm->getValue("SubTotal") : $CurrentForm->getValue("x_SubTotal");
        if (!$this->SubTotal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SubTotal->Visible = false; // Disable update for API request
            } else {
                $this->SubTotal->setFormValue($val);
            }
        }

        // Check field name 'patient_type' first before field var 'x_patient_type'
        $val = $CurrentForm->hasValue("patient_type") ? $CurrentForm->getValue("patient_type") : $CurrentForm->getValue("x_patient_type");
        if (!$this->patient_type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->patient_type->Visible = false; // Disable update for API request
            } else {
                $this->patient_type->setFormValue($val);
            }
        }

        // Check field name 'invoiceId' first before field var 'x_invoiceId'
        $val = $CurrentForm->hasValue("invoiceId") ? $CurrentForm->getValue("invoiceId") : $CurrentForm->getValue("x_invoiceId");
        if (!$this->invoiceId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceId->Visible = false; // Disable update for API request
            } else {
                $this->invoiceId->setFormValue($val);
            }
        }

        // Check field name 'invoiceAmount' first before field var 'x_invoiceAmount'
        $val = $CurrentForm->hasValue("invoiceAmount") ? $CurrentForm->getValue("invoiceAmount") : $CurrentForm->getValue("x_invoiceAmount");
        if (!$this->invoiceAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceAmount->Visible = false; // Disable update for API request
            } else {
                $this->invoiceAmount->setFormValue($val);
            }
        }

        // Check field name 'invoiceStatus' first before field var 'x_invoiceStatus'
        $val = $CurrentForm->hasValue("invoiceStatus") ? $CurrentForm->getValue("invoiceStatus") : $CurrentForm->getValue("x_invoiceStatus");
        if (!$this->invoiceStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->invoiceStatus->Visible = false; // Disable update for API request
            } else {
                $this->invoiceStatus->setFormValue($val);
            }
        }

        // Check field name 'modeOfPayment' first before field var 'x_modeOfPayment'
        $val = $CurrentForm->hasValue("modeOfPayment") ? $CurrentForm->getValue("modeOfPayment") : $CurrentForm->getValue("x_modeOfPayment");
        if (!$this->modeOfPayment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->modeOfPayment->Visible = false; // Disable update for API request
            } else {
                $this->modeOfPayment->setFormValue($val);
            }
        }

        // Check field name 'charged_date' first before field var 'x_charged_date'
        $val = $CurrentForm->hasValue("charged_date") ? $CurrentForm->getValue("charged_date") : $CurrentForm->getValue("x_charged_date");
        if (!$this->charged_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->charged_date->Visible = false; // Disable update for API request
            } else {
                $this->charged_date->setFormValue($val);
            }
            $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
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

        // Check field name 'ChequeCardNo' first before field var 'x_ChequeCardNo'
        $val = $CurrentForm->hasValue("ChequeCardNo") ? $CurrentForm->getValue("ChequeCardNo") : $CurrentForm->getValue("x_ChequeCardNo");
        if (!$this->ChequeCardNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ChequeCardNo->Visible = false; // Disable update for API request
            } else {
                $this->ChequeCardNo->setFormValue($val);
            }
        }

        // Check field name 'CreditBankName' first before field var 'x_CreditBankName'
        $val = $CurrentForm->hasValue("CreditBankName") ? $CurrentForm->getValue("CreditBankName") : $CurrentForm->getValue("x_CreditBankName");
        if (!$this->CreditBankName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditBankName->Visible = false; // Disable update for API request
            } else {
                $this->CreditBankName->setFormValue($val);
            }
        }

        // Check field name 'CreditCardHolder' first before field var 'x_CreditCardHolder'
        $val = $CurrentForm->hasValue("CreditCardHolder") ? $CurrentForm->getValue("CreditCardHolder") : $CurrentForm->getValue("x_CreditCardHolder");
        if (!$this->CreditCardHolder->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditCardHolder->Visible = false; // Disable update for API request
            } else {
                $this->CreditCardHolder->setFormValue($val);
            }
        }

        // Check field name 'CreditCardType' first before field var 'x_CreditCardType'
        $val = $CurrentForm->hasValue("CreditCardType") ? $CurrentForm->getValue("CreditCardType") : $CurrentForm->getValue("x_CreditCardType");
        if (!$this->CreditCardType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditCardType->Visible = false; // Disable update for API request
            } else {
                $this->CreditCardType->setFormValue($val);
            }
        }

        // Check field name 'CreditCardMachine' first before field var 'x_CreditCardMachine'
        $val = $CurrentForm->hasValue("CreditCardMachine") ? $CurrentForm->getValue("CreditCardMachine") : $CurrentForm->getValue("x_CreditCardMachine");
        if (!$this->CreditCardMachine->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditCardMachine->Visible = false; // Disable update for API request
            } else {
                $this->CreditCardMachine->setFormValue($val);
            }
        }

        // Check field name 'CreditCardBatchNo' first before field var 'x_CreditCardBatchNo'
        $val = $CurrentForm->hasValue("CreditCardBatchNo") ? $CurrentForm->getValue("CreditCardBatchNo") : $CurrentForm->getValue("x_CreditCardBatchNo");
        if (!$this->CreditCardBatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditCardBatchNo->Visible = false; // Disable update for API request
            } else {
                $this->CreditCardBatchNo->setFormValue($val);
            }
        }

        // Check field name 'CreditCardTax' first before field var 'x_CreditCardTax'
        $val = $CurrentForm->hasValue("CreditCardTax") ? $CurrentForm->getValue("CreditCardTax") : $CurrentForm->getValue("x_CreditCardTax");
        if (!$this->CreditCardTax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditCardTax->Visible = false; // Disable update for API request
            } else {
                $this->CreditCardTax->setFormValue($val);
            }
        }

        // Check field name 'CreditDeductionAmount' first before field var 'x_CreditDeductionAmount'
        $val = $CurrentForm->hasValue("CreditDeductionAmount") ? $CurrentForm->getValue("CreditDeductionAmount") : $CurrentForm->getValue("x_CreditDeductionAmount");
        if (!$this->CreditDeductionAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CreditDeductionAmount->Visible = false; // Disable update for API request
            } else {
                $this->CreditDeductionAmount->setFormValue($val);
            }
        }

        // Check field name 'RealizationAmount' first before field var 'x_RealizationAmount'
        $val = $CurrentForm->hasValue("RealizationAmount") ? $CurrentForm->getValue("RealizationAmount") : $CurrentForm->getValue("x_RealizationAmount");
        if (!$this->RealizationAmount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationAmount->Visible = false; // Disable update for API request
            } else {
                $this->RealizationAmount->setFormValue($val);
            }
        }

        // Check field name 'RealizationStatus' first before field var 'x_RealizationStatus'
        $val = $CurrentForm->hasValue("RealizationStatus") ? $CurrentForm->getValue("RealizationStatus") : $CurrentForm->getValue("x_RealizationStatus");
        if (!$this->RealizationStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationStatus->Visible = false; // Disable update for API request
            } else {
                $this->RealizationStatus->setFormValue($val);
            }
        }

        // Check field name 'RealizationRemarks' first before field var 'x_RealizationRemarks'
        $val = $CurrentForm->hasValue("RealizationRemarks") ? $CurrentForm->getValue("RealizationRemarks") : $CurrentForm->getValue("x_RealizationRemarks");
        if (!$this->RealizationRemarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationRemarks->Visible = false; // Disable update for API request
            } else {
                $this->RealizationRemarks->setFormValue($val);
            }
        }

        // Check field name 'RealizationBatchNo' first before field var 'x_RealizationBatchNo'
        $val = $CurrentForm->hasValue("RealizationBatchNo") ? $CurrentForm->getValue("RealizationBatchNo") : $CurrentForm->getValue("x_RealizationBatchNo");
        if (!$this->RealizationBatchNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationBatchNo->Visible = false; // Disable update for API request
            } else {
                $this->RealizationBatchNo->setFormValue($val);
            }
        }

        // Check field name 'RealizationDate' first before field var 'x_RealizationDate'
        $val = $CurrentForm->hasValue("RealizationDate") ? $CurrentForm->getValue("RealizationDate") : $CurrentForm->getValue("x_RealizationDate");
        if (!$this->RealizationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RealizationDate->Visible = false; // Disable update for API request
            } else {
                $this->RealizationDate->setFormValue($val);
            }
        }

        // Check field name 'BankAccHolderMobileNumber' first before field var 'x_BankAccHolderMobileNumber'
        $val = $CurrentForm->hasValue("BankAccHolderMobileNumber") ? $CurrentForm->getValue("BankAccHolderMobileNumber") : $CurrentForm->getValue("x_BankAccHolderMobileNumber");
        if (!$this->BankAccHolderMobileNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BankAccHolderMobileNumber->Visible = false; // Disable update for API request
            } else {
                $this->BankAccHolderMobileNumber->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Reception->CurrentValue = $this->Reception->FormValue;
        $this->Aid->CurrentValue = $this->Aid->FormValue;
        $this->Vid->CurrentValue = $this->Vid->FormValue;
        $this->patient_id->CurrentValue = $this->patient_id->FormValue;
        $this->mrnno->CurrentValue = $this->mrnno->FormValue;
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->amount->CurrentValue = $this->amount->FormValue;
        $this->Discount->CurrentValue = $this->Discount->FormValue;
        $this->SubTotal->CurrentValue = $this->SubTotal->FormValue;
        $this->patient_type->CurrentValue = $this->patient_type->FormValue;
        $this->invoiceId->CurrentValue = $this->invoiceId->FormValue;
        $this->invoiceAmount->CurrentValue = $this->invoiceAmount->FormValue;
        $this->invoiceStatus->CurrentValue = $this->invoiceStatus->FormValue;
        $this->modeOfPayment->CurrentValue = $this->modeOfPayment->FormValue;
        $this->charged_date->CurrentValue = $this->charged_date->FormValue;
        $this->charged_date->CurrentValue = UnFormatDateTime($this->charged_date->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->ChequeCardNo->CurrentValue = $this->ChequeCardNo->FormValue;
        $this->CreditBankName->CurrentValue = $this->CreditBankName->FormValue;
        $this->CreditCardHolder->CurrentValue = $this->CreditCardHolder->FormValue;
        $this->CreditCardType->CurrentValue = $this->CreditCardType->FormValue;
        $this->CreditCardMachine->CurrentValue = $this->CreditCardMachine->FormValue;
        $this->CreditCardBatchNo->CurrentValue = $this->CreditCardBatchNo->FormValue;
        $this->CreditCardTax->CurrentValue = $this->CreditCardTax->FormValue;
        $this->CreditDeductionAmount->CurrentValue = $this->CreditDeductionAmount->FormValue;
        $this->RealizationAmount->CurrentValue = $this->RealizationAmount->FormValue;
        $this->RealizationStatus->CurrentValue = $this->RealizationStatus->FormValue;
        $this->RealizationRemarks->CurrentValue = $this->RealizationRemarks->FormValue;
        $this->RealizationBatchNo->CurrentValue = $this->RealizationBatchNo->FormValue;
        $this->RealizationDate->CurrentValue = $this->RealizationDate->FormValue;
        $this->BankAccHolderMobileNumber->CurrentValue = $this->BankAccHolderMobileNumber->FormValue;
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
        $this->Aid->setDbValue($row['Aid']);
        $this->Vid->setDbValue($row['Vid']);
        $this->patient_id->setDbValue($row['patient_id']);
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->amount->setDbValue($row['amount']);
        $this->Discount->setDbValue($row['Discount']);
        $this->SubTotal->setDbValue($row['SubTotal']);
        $this->patient_type->setDbValue($row['patient_type']);
        $this->invoiceId->setDbValue($row['invoiceId']);
        $this->invoiceAmount->setDbValue($row['invoiceAmount']);
        $this->invoiceStatus->setDbValue($row['invoiceStatus']);
        $this->modeOfPayment->setDbValue($row['modeOfPayment']);
        $this->charged_date->setDbValue($row['charged_date']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->ChequeCardNo->setDbValue($row['ChequeCardNo']);
        $this->CreditBankName->setDbValue($row['CreditBankName']);
        $this->CreditCardHolder->setDbValue($row['CreditCardHolder']);
        $this->CreditCardType->setDbValue($row['CreditCardType']);
        $this->CreditCardMachine->setDbValue($row['CreditCardMachine']);
        $this->CreditCardBatchNo->setDbValue($row['CreditCardBatchNo']);
        $this->CreditCardTax->setDbValue($row['CreditCardTax']);
        $this->CreditDeductionAmount->setDbValue($row['CreditDeductionAmount']);
        $this->RealizationAmount->setDbValue($row['RealizationAmount']);
        $this->RealizationStatus->setDbValue($row['RealizationStatus']);
        $this->RealizationRemarks->setDbValue($row['RealizationRemarks']);
        $this->RealizationBatchNo->setDbValue($row['RealizationBatchNo']);
        $this->RealizationDate->setDbValue($row['RealizationDate']);
        $this->BankAccHolderMobileNumber->setDbValue($row['BankAccHolderMobileNumber']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['Reception'] = $this->Reception->CurrentValue;
        $row['Aid'] = $this->Aid->CurrentValue;
        $row['Vid'] = $this->Vid->CurrentValue;
        $row['patient_id'] = $this->patient_id->CurrentValue;
        $row['mrnno'] = $this->mrnno->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['amount'] = $this->amount->CurrentValue;
        $row['Discount'] = $this->Discount->CurrentValue;
        $row['SubTotal'] = $this->SubTotal->CurrentValue;
        $row['patient_type'] = $this->patient_type->CurrentValue;
        $row['invoiceId'] = $this->invoiceId->CurrentValue;
        $row['invoiceAmount'] = $this->invoiceAmount->CurrentValue;
        $row['invoiceStatus'] = $this->invoiceStatus->CurrentValue;
        $row['modeOfPayment'] = $this->modeOfPayment->CurrentValue;
        $row['charged_date'] = $this->charged_date->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['ChequeCardNo'] = $this->ChequeCardNo->CurrentValue;
        $row['CreditBankName'] = $this->CreditBankName->CurrentValue;
        $row['CreditCardHolder'] = $this->CreditCardHolder->CurrentValue;
        $row['CreditCardType'] = $this->CreditCardType->CurrentValue;
        $row['CreditCardMachine'] = $this->CreditCardMachine->CurrentValue;
        $row['CreditCardBatchNo'] = $this->CreditCardBatchNo->CurrentValue;
        $row['CreditCardTax'] = $this->CreditCardTax->CurrentValue;
        $row['CreditDeductionAmount'] = $this->CreditDeductionAmount->CurrentValue;
        $row['RealizationAmount'] = $this->RealizationAmount->CurrentValue;
        $row['RealizationStatus'] = $this->RealizationStatus->CurrentValue;
        $row['RealizationRemarks'] = $this->RealizationRemarks->CurrentValue;
        $row['RealizationBatchNo'] = $this->RealizationBatchNo->CurrentValue;
        $row['RealizationDate'] = $this->RealizationDate->CurrentValue;
        $row['BankAccHolderMobileNumber'] = $this->BankAccHolderMobileNumber->CurrentValue;
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
        if ($this->amount->FormValue == $this->amount->CurrentValue && is_numeric(ConvertToFloatString($this->amount->CurrentValue))) {
            $this->amount->CurrentValue = ConvertToFloatString($this->amount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->Discount->FormValue == $this->Discount->CurrentValue && is_numeric(ConvertToFloatString($this->Discount->CurrentValue))) {
            $this->Discount->CurrentValue = ConvertToFloatString($this->Discount->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->SubTotal->FormValue == $this->SubTotal->CurrentValue && is_numeric(ConvertToFloatString($this->SubTotal->CurrentValue))) {
            $this->SubTotal->CurrentValue = ConvertToFloatString($this->SubTotal->CurrentValue);
        }

        // Convert decimal values if posted back
        if ($this->invoiceAmount->FormValue == $this->invoiceAmount->CurrentValue && is_numeric(ConvertToFloatString($this->invoiceAmount->CurrentValue))) {
            $this->invoiceAmount->CurrentValue = ConvertToFloatString($this->invoiceAmount->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // Reception

        // Aid

        // Vid

        // patient_id

        // mrnno

        // PatientName

        // amount

        // Discount

        // SubTotal

        // patient_type

        // invoiceId

        // invoiceAmount

        // invoiceStatus

        // modeOfPayment

        // charged_date

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // ChequeCardNo

        // CreditBankName

        // CreditCardHolder

        // CreditCardType

        // CreditCardMachine

        // CreditCardBatchNo

        // CreditCardTax

        // CreditDeductionAmount

        // RealizationAmount

        // RealizationStatus

        // RealizationRemarks

        // RealizationBatchNo

        // RealizationDate

        // BankAccHolderMobileNumber
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // Aid
            $this->Aid->ViewValue = $this->Aid->CurrentValue;
            $this->Aid->ViewValue = FormatNumber($this->Aid->ViewValue, 0, -2, -2, -2);
            $this->Aid->ViewCustomAttributes = "";

            // Vid
            $this->Vid->ViewValue = $this->Vid->CurrentValue;
            $this->Vid->ViewValue = FormatNumber($this->Vid->ViewValue, 0, -2, -2, -2);
            $this->Vid->ViewCustomAttributes = "";

            // patient_id
            $this->patient_id->ViewValue = $this->patient_id->CurrentValue;
            $this->patient_id->ViewValue = FormatNumber($this->patient_id->ViewValue, 0, -2, -2, -2);
            $this->patient_id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // amount
            $this->amount->ViewValue = $this->amount->CurrentValue;
            $this->amount->ViewValue = FormatNumber($this->amount->ViewValue, 2, -2, -2, -2);
            $this->amount->ViewCustomAttributes = "";

            // Discount
            $this->Discount->ViewValue = $this->Discount->CurrentValue;
            $this->Discount->ViewValue = FormatNumber($this->Discount->ViewValue, 2, -2, -2, -2);
            $this->Discount->ViewCustomAttributes = "";

            // SubTotal
            $this->SubTotal->ViewValue = $this->SubTotal->CurrentValue;
            $this->SubTotal->ViewValue = FormatNumber($this->SubTotal->ViewValue, 2, -2, -2, -2);
            $this->SubTotal->ViewCustomAttributes = "";

            // patient_type
            $this->patient_type->ViewValue = $this->patient_type->CurrentValue;
            $this->patient_type->ViewValue = FormatNumber($this->patient_type->ViewValue, 0, -2, -2, -2);
            $this->patient_type->ViewCustomAttributes = "";

            // invoiceId
            $this->invoiceId->ViewValue = $this->invoiceId->CurrentValue;
            $this->invoiceId->ViewValue = FormatNumber($this->invoiceId->ViewValue, 0, -2, -2, -2);
            $this->invoiceId->ViewCustomAttributes = "";

            // invoiceAmount
            $this->invoiceAmount->ViewValue = $this->invoiceAmount->CurrentValue;
            $this->invoiceAmount->ViewValue = FormatNumber($this->invoiceAmount->ViewValue, 2, -2, -2, -2);
            $this->invoiceAmount->ViewCustomAttributes = "";

            // invoiceStatus
            $this->invoiceStatus->ViewValue = $this->invoiceStatus->CurrentValue;
            $this->invoiceStatus->ViewCustomAttributes = "";

            // modeOfPayment
            $this->modeOfPayment->ViewValue = $this->modeOfPayment->CurrentValue;
            $this->modeOfPayment->ViewCustomAttributes = "";

            // charged_date
            $this->charged_date->ViewValue = $this->charged_date->CurrentValue;
            $this->charged_date->ViewValue = FormatDateTime($this->charged_date->ViewValue, 0);
            $this->charged_date->ViewCustomAttributes = "";

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

            // ChequeCardNo
            $this->ChequeCardNo->ViewValue = $this->ChequeCardNo->CurrentValue;
            $this->ChequeCardNo->ViewCustomAttributes = "";

            // CreditBankName
            $this->CreditBankName->ViewValue = $this->CreditBankName->CurrentValue;
            $this->CreditBankName->ViewCustomAttributes = "";

            // CreditCardHolder
            $this->CreditCardHolder->ViewValue = $this->CreditCardHolder->CurrentValue;
            $this->CreditCardHolder->ViewCustomAttributes = "";

            // CreditCardType
            $this->CreditCardType->ViewValue = $this->CreditCardType->CurrentValue;
            $this->CreditCardType->ViewCustomAttributes = "";

            // CreditCardMachine
            $this->CreditCardMachine->ViewValue = $this->CreditCardMachine->CurrentValue;
            $this->CreditCardMachine->ViewCustomAttributes = "";

            // CreditCardBatchNo
            $this->CreditCardBatchNo->ViewValue = $this->CreditCardBatchNo->CurrentValue;
            $this->CreditCardBatchNo->ViewCustomAttributes = "";

            // CreditCardTax
            $this->CreditCardTax->ViewValue = $this->CreditCardTax->CurrentValue;
            $this->CreditCardTax->ViewCustomAttributes = "";

            // CreditDeductionAmount
            $this->CreditDeductionAmount->ViewValue = $this->CreditDeductionAmount->CurrentValue;
            $this->CreditDeductionAmount->ViewCustomAttributes = "";

            // RealizationAmount
            $this->RealizationAmount->ViewValue = $this->RealizationAmount->CurrentValue;
            $this->RealizationAmount->ViewCustomAttributes = "";

            // RealizationStatus
            $this->RealizationStatus->ViewValue = $this->RealizationStatus->CurrentValue;
            $this->RealizationStatus->ViewCustomAttributes = "";

            // RealizationRemarks
            $this->RealizationRemarks->ViewValue = $this->RealizationRemarks->CurrentValue;
            $this->RealizationRemarks->ViewCustomAttributes = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->ViewValue = $this->RealizationBatchNo->CurrentValue;
            $this->RealizationBatchNo->ViewCustomAttributes = "";

            // RealizationDate
            $this->RealizationDate->ViewValue = $this->RealizationDate->CurrentValue;
            $this->RealizationDate->ViewCustomAttributes = "";

            // BankAccHolderMobileNumber
            $this->BankAccHolderMobileNumber->ViewValue = $this->BankAccHolderMobileNumber->CurrentValue;
            $this->BankAccHolderMobileNumber->ViewCustomAttributes = "";

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";
            $this->Aid->TooltipValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";
            $this->Vid->TooltipValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";
            $this->patient_id->TooltipValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";
            $this->amount->TooltipValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";
            $this->Discount->TooltipValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";
            $this->SubTotal->TooltipValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";
            $this->patient_type->TooltipValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";
            $this->invoiceId->TooltipValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";
            $this->invoiceAmount->TooltipValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";
            $this->invoiceStatus->TooltipValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";
            $this->modeOfPayment->TooltipValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";
            $this->charged_date->TooltipValue = "";

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

            // ChequeCardNo
            $this->ChequeCardNo->LinkCustomAttributes = "";
            $this->ChequeCardNo->HrefValue = "";
            $this->ChequeCardNo->TooltipValue = "";

            // CreditBankName
            $this->CreditBankName->LinkCustomAttributes = "";
            $this->CreditBankName->HrefValue = "";
            $this->CreditBankName->TooltipValue = "";

            // CreditCardHolder
            $this->CreditCardHolder->LinkCustomAttributes = "";
            $this->CreditCardHolder->HrefValue = "";
            $this->CreditCardHolder->TooltipValue = "";

            // CreditCardType
            $this->CreditCardType->LinkCustomAttributes = "";
            $this->CreditCardType->HrefValue = "";
            $this->CreditCardType->TooltipValue = "";

            // CreditCardMachine
            $this->CreditCardMachine->LinkCustomAttributes = "";
            $this->CreditCardMachine->HrefValue = "";
            $this->CreditCardMachine->TooltipValue = "";

            // CreditCardBatchNo
            $this->CreditCardBatchNo->LinkCustomAttributes = "";
            $this->CreditCardBatchNo->HrefValue = "";
            $this->CreditCardBatchNo->TooltipValue = "";

            // CreditCardTax
            $this->CreditCardTax->LinkCustomAttributes = "";
            $this->CreditCardTax->HrefValue = "";
            $this->CreditCardTax->TooltipValue = "";

            // CreditDeductionAmount
            $this->CreditDeductionAmount->LinkCustomAttributes = "";
            $this->CreditDeductionAmount->HrefValue = "";
            $this->CreditDeductionAmount->TooltipValue = "";

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";
            $this->RealizationAmount->TooltipValue = "";

            // RealizationStatus
            $this->RealizationStatus->LinkCustomAttributes = "";
            $this->RealizationStatus->HrefValue = "";
            $this->RealizationStatus->TooltipValue = "";

            // RealizationRemarks
            $this->RealizationRemarks->LinkCustomAttributes = "";
            $this->RealizationRemarks->HrefValue = "";
            $this->RealizationRemarks->TooltipValue = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->LinkCustomAttributes = "";
            $this->RealizationBatchNo->HrefValue = "";
            $this->RealizationBatchNo->TooltipValue = "";

            // RealizationDate
            $this->RealizationDate->LinkCustomAttributes = "";
            $this->RealizationDate->HrefValue = "";
            $this->RealizationDate->TooltipValue = "";

            // BankAccHolderMobileNumber
            $this->BankAccHolderMobileNumber->LinkCustomAttributes = "";
            $this->BankAccHolderMobileNumber->HrefValue = "";
            $this->BankAccHolderMobileNumber->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->CurrentValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // Aid
            $this->Aid->EditAttrs["class"] = "form-control";
            $this->Aid->EditCustomAttributes = "";
            $this->Aid->EditValue = HtmlEncode($this->Aid->CurrentValue);
            $this->Aid->PlaceHolder = RemoveHtml($this->Aid->caption());

            // Vid
            $this->Vid->EditAttrs["class"] = "form-control";
            $this->Vid->EditCustomAttributes = "";
            $this->Vid->EditValue = HtmlEncode($this->Vid->CurrentValue);
            $this->Vid->PlaceHolder = RemoveHtml($this->Vid->caption());

            // patient_id
            $this->patient_id->EditAttrs["class"] = "form-control";
            $this->patient_id->EditCustomAttributes = "";
            $this->patient_id->EditValue = HtmlEncode($this->patient_id->CurrentValue);
            $this->patient_id->PlaceHolder = RemoveHtml($this->patient_id->caption());

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

            // amount
            $this->amount->EditAttrs["class"] = "form-control";
            $this->amount->EditCustomAttributes = "";
            $this->amount->EditValue = HtmlEncode($this->amount->CurrentValue);
            $this->amount->PlaceHolder = RemoveHtml($this->amount->caption());
            if (strval($this->amount->EditValue) != "" && is_numeric($this->amount->EditValue)) {
                $this->amount->EditValue = FormatNumber($this->amount->EditValue, -2, -2, -2, -2);
            }

            // Discount
            $this->Discount->EditAttrs["class"] = "form-control";
            $this->Discount->EditCustomAttributes = "";
            $this->Discount->EditValue = HtmlEncode($this->Discount->CurrentValue);
            $this->Discount->PlaceHolder = RemoveHtml($this->Discount->caption());
            if (strval($this->Discount->EditValue) != "" && is_numeric($this->Discount->EditValue)) {
                $this->Discount->EditValue = FormatNumber($this->Discount->EditValue, -2, -2, -2, -2);
            }

            // SubTotal
            $this->SubTotal->EditAttrs["class"] = "form-control";
            $this->SubTotal->EditCustomAttributes = "";
            $this->SubTotal->EditValue = HtmlEncode($this->SubTotal->CurrentValue);
            $this->SubTotal->PlaceHolder = RemoveHtml($this->SubTotal->caption());
            if (strval($this->SubTotal->EditValue) != "" && is_numeric($this->SubTotal->EditValue)) {
                $this->SubTotal->EditValue = FormatNumber($this->SubTotal->EditValue, -2, -2, -2, -2);
            }

            // patient_type
            $this->patient_type->EditAttrs["class"] = "form-control";
            $this->patient_type->EditCustomAttributes = "";
            $this->patient_type->EditValue = HtmlEncode($this->patient_type->CurrentValue);
            $this->patient_type->PlaceHolder = RemoveHtml($this->patient_type->caption());

            // invoiceId
            $this->invoiceId->EditAttrs["class"] = "form-control";
            $this->invoiceId->EditCustomAttributes = "";
            $this->invoiceId->EditValue = HtmlEncode($this->invoiceId->CurrentValue);
            $this->invoiceId->PlaceHolder = RemoveHtml($this->invoiceId->caption());

            // invoiceAmount
            $this->invoiceAmount->EditAttrs["class"] = "form-control";
            $this->invoiceAmount->EditCustomAttributes = "";
            $this->invoiceAmount->EditValue = HtmlEncode($this->invoiceAmount->CurrentValue);
            $this->invoiceAmount->PlaceHolder = RemoveHtml($this->invoiceAmount->caption());
            if (strval($this->invoiceAmount->EditValue) != "" && is_numeric($this->invoiceAmount->EditValue)) {
                $this->invoiceAmount->EditValue = FormatNumber($this->invoiceAmount->EditValue, -2, -2, -2, -2);
            }

            // invoiceStatus
            $this->invoiceStatus->EditAttrs["class"] = "form-control";
            $this->invoiceStatus->EditCustomAttributes = "";
            if (!$this->invoiceStatus->Raw) {
                $this->invoiceStatus->CurrentValue = HtmlDecode($this->invoiceStatus->CurrentValue);
            }
            $this->invoiceStatus->EditValue = HtmlEncode($this->invoiceStatus->CurrentValue);
            $this->invoiceStatus->PlaceHolder = RemoveHtml($this->invoiceStatus->caption());

            // modeOfPayment
            $this->modeOfPayment->EditAttrs["class"] = "form-control";
            $this->modeOfPayment->EditCustomAttributes = "";
            if (!$this->modeOfPayment->Raw) {
                $this->modeOfPayment->CurrentValue = HtmlDecode($this->modeOfPayment->CurrentValue);
            }
            $this->modeOfPayment->EditValue = HtmlEncode($this->modeOfPayment->CurrentValue);
            $this->modeOfPayment->PlaceHolder = RemoveHtml($this->modeOfPayment->caption());

            // charged_date
            $this->charged_date->EditAttrs["class"] = "form-control";
            $this->charged_date->EditCustomAttributes = "";
            $this->charged_date->EditValue = HtmlEncode(FormatDateTime($this->charged_date->CurrentValue, 8));
            $this->charged_date->PlaceHolder = RemoveHtml($this->charged_date->caption());

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

            // ChequeCardNo
            $this->ChequeCardNo->EditAttrs["class"] = "form-control";
            $this->ChequeCardNo->EditCustomAttributes = "";
            if (!$this->ChequeCardNo->Raw) {
                $this->ChequeCardNo->CurrentValue = HtmlDecode($this->ChequeCardNo->CurrentValue);
            }
            $this->ChequeCardNo->EditValue = HtmlEncode($this->ChequeCardNo->CurrentValue);
            $this->ChequeCardNo->PlaceHolder = RemoveHtml($this->ChequeCardNo->caption());

            // CreditBankName
            $this->CreditBankName->EditAttrs["class"] = "form-control";
            $this->CreditBankName->EditCustomAttributes = "";
            if (!$this->CreditBankName->Raw) {
                $this->CreditBankName->CurrentValue = HtmlDecode($this->CreditBankName->CurrentValue);
            }
            $this->CreditBankName->EditValue = HtmlEncode($this->CreditBankName->CurrentValue);
            $this->CreditBankName->PlaceHolder = RemoveHtml($this->CreditBankName->caption());

            // CreditCardHolder
            $this->CreditCardHolder->EditAttrs["class"] = "form-control";
            $this->CreditCardHolder->EditCustomAttributes = "";
            if (!$this->CreditCardHolder->Raw) {
                $this->CreditCardHolder->CurrentValue = HtmlDecode($this->CreditCardHolder->CurrentValue);
            }
            $this->CreditCardHolder->EditValue = HtmlEncode($this->CreditCardHolder->CurrentValue);
            $this->CreditCardHolder->PlaceHolder = RemoveHtml($this->CreditCardHolder->caption());

            // CreditCardType
            $this->CreditCardType->EditAttrs["class"] = "form-control";
            $this->CreditCardType->EditCustomAttributes = "";
            if (!$this->CreditCardType->Raw) {
                $this->CreditCardType->CurrentValue = HtmlDecode($this->CreditCardType->CurrentValue);
            }
            $this->CreditCardType->EditValue = HtmlEncode($this->CreditCardType->CurrentValue);
            $this->CreditCardType->PlaceHolder = RemoveHtml($this->CreditCardType->caption());

            // CreditCardMachine
            $this->CreditCardMachine->EditAttrs["class"] = "form-control";
            $this->CreditCardMachine->EditCustomAttributes = "";
            if (!$this->CreditCardMachine->Raw) {
                $this->CreditCardMachine->CurrentValue = HtmlDecode($this->CreditCardMachine->CurrentValue);
            }
            $this->CreditCardMachine->EditValue = HtmlEncode($this->CreditCardMachine->CurrentValue);
            $this->CreditCardMachine->PlaceHolder = RemoveHtml($this->CreditCardMachine->caption());

            // CreditCardBatchNo
            $this->CreditCardBatchNo->EditAttrs["class"] = "form-control";
            $this->CreditCardBatchNo->EditCustomAttributes = "";
            if (!$this->CreditCardBatchNo->Raw) {
                $this->CreditCardBatchNo->CurrentValue = HtmlDecode($this->CreditCardBatchNo->CurrentValue);
            }
            $this->CreditCardBatchNo->EditValue = HtmlEncode($this->CreditCardBatchNo->CurrentValue);
            $this->CreditCardBatchNo->PlaceHolder = RemoveHtml($this->CreditCardBatchNo->caption());

            // CreditCardTax
            $this->CreditCardTax->EditAttrs["class"] = "form-control";
            $this->CreditCardTax->EditCustomAttributes = "";
            if (!$this->CreditCardTax->Raw) {
                $this->CreditCardTax->CurrentValue = HtmlDecode($this->CreditCardTax->CurrentValue);
            }
            $this->CreditCardTax->EditValue = HtmlEncode($this->CreditCardTax->CurrentValue);
            $this->CreditCardTax->PlaceHolder = RemoveHtml($this->CreditCardTax->caption());

            // CreditDeductionAmount
            $this->CreditDeductionAmount->EditAttrs["class"] = "form-control";
            $this->CreditDeductionAmount->EditCustomAttributes = "";
            if (!$this->CreditDeductionAmount->Raw) {
                $this->CreditDeductionAmount->CurrentValue = HtmlDecode($this->CreditDeductionAmount->CurrentValue);
            }
            $this->CreditDeductionAmount->EditValue = HtmlEncode($this->CreditDeductionAmount->CurrentValue);
            $this->CreditDeductionAmount->PlaceHolder = RemoveHtml($this->CreditDeductionAmount->caption());

            // RealizationAmount
            $this->RealizationAmount->EditAttrs["class"] = "form-control";
            $this->RealizationAmount->EditCustomAttributes = "";
            if (!$this->RealizationAmount->Raw) {
                $this->RealizationAmount->CurrentValue = HtmlDecode($this->RealizationAmount->CurrentValue);
            }
            $this->RealizationAmount->EditValue = HtmlEncode($this->RealizationAmount->CurrentValue);
            $this->RealizationAmount->PlaceHolder = RemoveHtml($this->RealizationAmount->caption());

            // RealizationStatus
            $this->RealizationStatus->EditAttrs["class"] = "form-control";
            $this->RealizationStatus->EditCustomAttributes = "";
            if (!$this->RealizationStatus->Raw) {
                $this->RealizationStatus->CurrentValue = HtmlDecode($this->RealizationStatus->CurrentValue);
            }
            $this->RealizationStatus->EditValue = HtmlEncode($this->RealizationStatus->CurrentValue);
            $this->RealizationStatus->PlaceHolder = RemoveHtml($this->RealizationStatus->caption());

            // RealizationRemarks
            $this->RealizationRemarks->EditAttrs["class"] = "form-control";
            $this->RealizationRemarks->EditCustomAttributes = "";
            if (!$this->RealizationRemarks->Raw) {
                $this->RealizationRemarks->CurrentValue = HtmlDecode($this->RealizationRemarks->CurrentValue);
            }
            $this->RealizationRemarks->EditValue = HtmlEncode($this->RealizationRemarks->CurrentValue);
            $this->RealizationRemarks->PlaceHolder = RemoveHtml($this->RealizationRemarks->caption());

            // RealizationBatchNo
            $this->RealizationBatchNo->EditAttrs["class"] = "form-control";
            $this->RealizationBatchNo->EditCustomAttributes = "";
            if (!$this->RealizationBatchNo->Raw) {
                $this->RealizationBatchNo->CurrentValue = HtmlDecode($this->RealizationBatchNo->CurrentValue);
            }
            $this->RealizationBatchNo->EditValue = HtmlEncode($this->RealizationBatchNo->CurrentValue);
            $this->RealizationBatchNo->PlaceHolder = RemoveHtml($this->RealizationBatchNo->caption());

            // RealizationDate
            $this->RealizationDate->EditAttrs["class"] = "form-control";
            $this->RealizationDate->EditCustomAttributes = "";
            if (!$this->RealizationDate->Raw) {
                $this->RealizationDate->CurrentValue = HtmlDecode($this->RealizationDate->CurrentValue);
            }
            $this->RealizationDate->EditValue = HtmlEncode($this->RealizationDate->CurrentValue);
            $this->RealizationDate->PlaceHolder = RemoveHtml($this->RealizationDate->caption());

            // BankAccHolderMobileNumber
            $this->BankAccHolderMobileNumber->EditAttrs["class"] = "form-control";
            $this->BankAccHolderMobileNumber->EditCustomAttributes = "";
            if (!$this->BankAccHolderMobileNumber->Raw) {
                $this->BankAccHolderMobileNumber->CurrentValue = HtmlDecode($this->BankAccHolderMobileNumber->CurrentValue);
            }
            $this->BankAccHolderMobileNumber->EditValue = HtmlEncode($this->BankAccHolderMobileNumber->CurrentValue);
            $this->BankAccHolderMobileNumber->PlaceHolder = RemoveHtml($this->BankAccHolderMobileNumber->caption());

            // Add refer script

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";

            // Aid
            $this->Aid->LinkCustomAttributes = "";
            $this->Aid->HrefValue = "";

            // Vid
            $this->Vid->LinkCustomAttributes = "";
            $this->Vid->HrefValue = "";

            // patient_id
            $this->patient_id->LinkCustomAttributes = "";
            $this->patient_id->HrefValue = "";

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // amount
            $this->amount->LinkCustomAttributes = "";
            $this->amount->HrefValue = "";

            // Discount
            $this->Discount->LinkCustomAttributes = "";
            $this->Discount->HrefValue = "";

            // SubTotal
            $this->SubTotal->LinkCustomAttributes = "";
            $this->SubTotal->HrefValue = "";

            // patient_type
            $this->patient_type->LinkCustomAttributes = "";
            $this->patient_type->HrefValue = "";

            // invoiceId
            $this->invoiceId->LinkCustomAttributes = "";
            $this->invoiceId->HrefValue = "";

            // invoiceAmount
            $this->invoiceAmount->LinkCustomAttributes = "";
            $this->invoiceAmount->HrefValue = "";

            // invoiceStatus
            $this->invoiceStatus->LinkCustomAttributes = "";
            $this->invoiceStatus->HrefValue = "";

            // modeOfPayment
            $this->modeOfPayment->LinkCustomAttributes = "";
            $this->modeOfPayment->HrefValue = "";

            // charged_date
            $this->charged_date->LinkCustomAttributes = "";
            $this->charged_date->HrefValue = "";

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

            // ChequeCardNo
            $this->ChequeCardNo->LinkCustomAttributes = "";
            $this->ChequeCardNo->HrefValue = "";

            // CreditBankName
            $this->CreditBankName->LinkCustomAttributes = "";
            $this->CreditBankName->HrefValue = "";

            // CreditCardHolder
            $this->CreditCardHolder->LinkCustomAttributes = "";
            $this->CreditCardHolder->HrefValue = "";

            // CreditCardType
            $this->CreditCardType->LinkCustomAttributes = "";
            $this->CreditCardType->HrefValue = "";

            // CreditCardMachine
            $this->CreditCardMachine->LinkCustomAttributes = "";
            $this->CreditCardMachine->HrefValue = "";

            // CreditCardBatchNo
            $this->CreditCardBatchNo->LinkCustomAttributes = "";
            $this->CreditCardBatchNo->HrefValue = "";

            // CreditCardTax
            $this->CreditCardTax->LinkCustomAttributes = "";
            $this->CreditCardTax->HrefValue = "";

            // CreditDeductionAmount
            $this->CreditDeductionAmount->LinkCustomAttributes = "";
            $this->CreditDeductionAmount->HrefValue = "";

            // RealizationAmount
            $this->RealizationAmount->LinkCustomAttributes = "";
            $this->RealizationAmount->HrefValue = "";

            // RealizationStatus
            $this->RealizationStatus->LinkCustomAttributes = "";
            $this->RealizationStatus->HrefValue = "";

            // RealizationRemarks
            $this->RealizationRemarks->LinkCustomAttributes = "";
            $this->RealizationRemarks->HrefValue = "";

            // RealizationBatchNo
            $this->RealizationBatchNo->LinkCustomAttributes = "";
            $this->RealizationBatchNo->HrefValue = "";

            // RealizationDate
            $this->RealizationDate->LinkCustomAttributes = "";
            $this->RealizationDate->HrefValue = "";

            // BankAccHolderMobileNumber
            $this->BankAccHolderMobileNumber->LinkCustomAttributes = "";
            $this->BankAccHolderMobileNumber->HrefValue = "";
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
        if ($this->Reception->Required) {
            if (!$this->Reception->IsDetailKey && EmptyValue($this->Reception->FormValue)) {
                $this->Reception->addErrorMessage(str_replace("%s", $this->Reception->caption(), $this->Reception->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Reception->FormValue)) {
            $this->Reception->addErrorMessage($this->Reception->getErrorMessage(false));
        }
        if ($this->Aid->Required) {
            if (!$this->Aid->IsDetailKey && EmptyValue($this->Aid->FormValue)) {
                $this->Aid->addErrorMessage(str_replace("%s", $this->Aid->caption(), $this->Aid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Aid->FormValue)) {
            $this->Aid->addErrorMessage($this->Aid->getErrorMessage(false));
        }
        if ($this->Vid->Required) {
            if (!$this->Vid->IsDetailKey && EmptyValue($this->Vid->FormValue)) {
                $this->Vid->addErrorMessage(str_replace("%s", $this->Vid->caption(), $this->Vid->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Vid->FormValue)) {
            $this->Vid->addErrorMessage($this->Vid->getErrorMessage(false));
        }
        if ($this->patient_id->Required) {
            if (!$this->patient_id->IsDetailKey && EmptyValue($this->patient_id->FormValue)) {
                $this->patient_id->addErrorMessage(str_replace("%s", $this->patient_id->caption(), $this->patient_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient_id->FormValue)) {
            $this->patient_id->addErrorMessage($this->patient_id->getErrorMessage(false));
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
        if ($this->amount->Required) {
            if (!$this->amount->IsDetailKey && EmptyValue($this->amount->FormValue)) {
                $this->amount->addErrorMessage(str_replace("%s", $this->amount->caption(), $this->amount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->amount->FormValue)) {
            $this->amount->addErrorMessage($this->amount->getErrorMessage(false));
        }
        if ($this->Discount->Required) {
            if (!$this->Discount->IsDetailKey && EmptyValue($this->Discount->FormValue)) {
                $this->Discount->addErrorMessage(str_replace("%s", $this->Discount->caption(), $this->Discount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Discount->FormValue)) {
            $this->Discount->addErrorMessage($this->Discount->getErrorMessage(false));
        }
        if ($this->SubTotal->Required) {
            if (!$this->SubTotal->IsDetailKey && EmptyValue($this->SubTotal->FormValue)) {
                $this->SubTotal->addErrorMessage(str_replace("%s", $this->SubTotal->caption(), $this->SubTotal->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->SubTotal->FormValue)) {
            $this->SubTotal->addErrorMessage($this->SubTotal->getErrorMessage(false));
        }
        if ($this->patient_type->Required) {
            if (!$this->patient_type->IsDetailKey && EmptyValue($this->patient_type->FormValue)) {
                $this->patient_type->addErrorMessage(str_replace("%s", $this->patient_type->caption(), $this->patient_type->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->patient_type->FormValue)) {
            $this->patient_type->addErrorMessage($this->patient_type->getErrorMessage(false));
        }
        if ($this->invoiceId->Required) {
            if (!$this->invoiceId->IsDetailKey && EmptyValue($this->invoiceId->FormValue)) {
                $this->invoiceId->addErrorMessage(str_replace("%s", $this->invoiceId->caption(), $this->invoiceId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->invoiceId->FormValue)) {
            $this->invoiceId->addErrorMessage($this->invoiceId->getErrorMessage(false));
        }
        if ($this->invoiceAmount->Required) {
            if (!$this->invoiceAmount->IsDetailKey && EmptyValue($this->invoiceAmount->FormValue)) {
                $this->invoiceAmount->addErrorMessage(str_replace("%s", $this->invoiceAmount->caption(), $this->invoiceAmount->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->invoiceAmount->FormValue)) {
            $this->invoiceAmount->addErrorMessage($this->invoiceAmount->getErrorMessage(false));
        }
        if ($this->invoiceStatus->Required) {
            if (!$this->invoiceStatus->IsDetailKey && EmptyValue($this->invoiceStatus->FormValue)) {
                $this->invoiceStatus->addErrorMessage(str_replace("%s", $this->invoiceStatus->caption(), $this->invoiceStatus->RequiredErrorMessage));
            }
        }
        if ($this->modeOfPayment->Required) {
            if (!$this->modeOfPayment->IsDetailKey && EmptyValue($this->modeOfPayment->FormValue)) {
                $this->modeOfPayment->addErrorMessage(str_replace("%s", $this->modeOfPayment->caption(), $this->modeOfPayment->RequiredErrorMessage));
            }
        }
        if ($this->charged_date->Required) {
            if (!$this->charged_date->IsDetailKey && EmptyValue($this->charged_date->FormValue)) {
                $this->charged_date->addErrorMessage(str_replace("%s", $this->charged_date->caption(), $this->charged_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->charged_date->FormValue)) {
            $this->charged_date->addErrorMessage($this->charged_date->getErrorMessage(false));
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
        if ($this->ChequeCardNo->Required) {
            if (!$this->ChequeCardNo->IsDetailKey && EmptyValue($this->ChequeCardNo->FormValue)) {
                $this->ChequeCardNo->addErrorMessage(str_replace("%s", $this->ChequeCardNo->caption(), $this->ChequeCardNo->RequiredErrorMessage));
            }
        }
        if ($this->CreditBankName->Required) {
            if (!$this->CreditBankName->IsDetailKey && EmptyValue($this->CreditBankName->FormValue)) {
                $this->CreditBankName->addErrorMessage(str_replace("%s", $this->CreditBankName->caption(), $this->CreditBankName->RequiredErrorMessage));
            }
        }
        if ($this->CreditCardHolder->Required) {
            if (!$this->CreditCardHolder->IsDetailKey && EmptyValue($this->CreditCardHolder->FormValue)) {
                $this->CreditCardHolder->addErrorMessage(str_replace("%s", $this->CreditCardHolder->caption(), $this->CreditCardHolder->RequiredErrorMessage));
            }
        }
        if ($this->CreditCardType->Required) {
            if (!$this->CreditCardType->IsDetailKey && EmptyValue($this->CreditCardType->FormValue)) {
                $this->CreditCardType->addErrorMessage(str_replace("%s", $this->CreditCardType->caption(), $this->CreditCardType->RequiredErrorMessage));
            }
        }
        if ($this->CreditCardMachine->Required) {
            if (!$this->CreditCardMachine->IsDetailKey && EmptyValue($this->CreditCardMachine->FormValue)) {
                $this->CreditCardMachine->addErrorMessage(str_replace("%s", $this->CreditCardMachine->caption(), $this->CreditCardMachine->RequiredErrorMessage));
            }
        }
        if ($this->CreditCardBatchNo->Required) {
            if (!$this->CreditCardBatchNo->IsDetailKey && EmptyValue($this->CreditCardBatchNo->FormValue)) {
                $this->CreditCardBatchNo->addErrorMessage(str_replace("%s", $this->CreditCardBatchNo->caption(), $this->CreditCardBatchNo->RequiredErrorMessage));
            }
        }
        if ($this->CreditCardTax->Required) {
            if (!$this->CreditCardTax->IsDetailKey && EmptyValue($this->CreditCardTax->FormValue)) {
                $this->CreditCardTax->addErrorMessage(str_replace("%s", $this->CreditCardTax->caption(), $this->CreditCardTax->RequiredErrorMessage));
            }
        }
        if ($this->CreditDeductionAmount->Required) {
            if (!$this->CreditDeductionAmount->IsDetailKey && EmptyValue($this->CreditDeductionAmount->FormValue)) {
                $this->CreditDeductionAmount->addErrorMessage(str_replace("%s", $this->CreditDeductionAmount->caption(), $this->CreditDeductionAmount->RequiredErrorMessage));
            }
        }
        if ($this->RealizationAmount->Required) {
            if (!$this->RealizationAmount->IsDetailKey && EmptyValue($this->RealizationAmount->FormValue)) {
                $this->RealizationAmount->addErrorMessage(str_replace("%s", $this->RealizationAmount->caption(), $this->RealizationAmount->RequiredErrorMessage));
            }
        }
        if ($this->RealizationStatus->Required) {
            if (!$this->RealizationStatus->IsDetailKey && EmptyValue($this->RealizationStatus->FormValue)) {
                $this->RealizationStatus->addErrorMessage(str_replace("%s", $this->RealizationStatus->caption(), $this->RealizationStatus->RequiredErrorMessage));
            }
        }
        if ($this->RealizationRemarks->Required) {
            if (!$this->RealizationRemarks->IsDetailKey && EmptyValue($this->RealizationRemarks->FormValue)) {
                $this->RealizationRemarks->addErrorMessage(str_replace("%s", $this->RealizationRemarks->caption(), $this->RealizationRemarks->RequiredErrorMessage));
            }
        }
        if ($this->RealizationBatchNo->Required) {
            if (!$this->RealizationBatchNo->IsDetailKey && EmptyValue($this->RealizationBatchNo->FormValue)) {
                $this->RealizationBatchNo->addErrorMessage(str_replace("%s", $this->RealizationBatchNo->caption(), $this->RealizationBatchNo->RequiredErrorMessage));
            }
        }
        if ($this->RealizationDate->Required) {
            if (!$this->RealizationDate->IsDetailKey && EmptyValue($this->RealizationDate->FormValue)) {
                $this->RealizationDate->addErrorMessage(str_replace("%s", $this->RealizationDate->caption(), $this->RealizationDate->RequiredErrorMessage));
            }
        }
        if ($this->BankAccHolderMobileNumber->Required) {
            if (!$this->BankAccHolderMobileNumber->IsDetailKey && EmptyValue($this->BankAccHolderMobileNumber->FormValue)) {
                $this->BankAccHolderMobileNumber->addErrorMessage(str_replace("%s", $this->BankAccHolderMobileNumber->caption(), $this->BankAccHolderMobileNumber->RequiredErrorMessage));
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

        // Reception
        $this->Reception->setDbValueDef($rsnew, $this->Reception->CurrentValue, 0, false);

        // Aid
        $this->Aid->setDbValueDef($rsnew, $this->Aid->CurrentValue, null, false);

        // Vid
        $this->Vid->setDbValueDef($rsnew, $this->Vid->CurrentValue, null, false);

        // patient_id
        $this->patient_id->setDbValueDef($rsnew, $this->patient_id->CurrentValue, 0, false);

        // mrnno
        $this->mrnno->setDbValueDef($rsnew, $this->mrnno->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // amount
        $this->amount->setDbValueDef($rsnew, $this->amount->CurrentValue, 0, false);

        // Discount
        $this->Discount->setDbValueDef($rsnew, $this->Discount->CurrentValue, null, false);

        // SubTotal
        $this->SubTotal->setDbValueDef($rsnew, $this->SubTotal->CurrentValue, null, false);

        // patient_type
        $this->patient_type->setDbValueDef($rsnew, $this->patient_type->CurrentValue, 0, false);

        // invoiceId
        $this->invoiceId->setDbValueDef($rsnew, $this->invoiceId->CurrentValue, null, false);

        // invoiceAmount
        $this->invoiceAmount->setDbValueDef($rsnew, $this->invoiceAmount->CurrentValue, null, false);

        // invoiceStatus
        $this->invoiceStatus->setDbValueDef($rsnew, $this->invoiceStatus->CurrentValue, null, false);

        // modeOfPayment
        $this->modeOfPayment->setDbValueDef($rsnew, $this->modeOfPayment->CurrentValue, null, false);

        // charged_date
        $this->charged_date->setDbValueDef($rsnew, UnFormatDateTime($this->charged_date->CurrentValue, 0), CurrentDate(), false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, 0, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // ChequeCardNo
        $this->ChequeCardNo->setDbValueDef($rsnew, $this->ChequeCardNo->CurrentValue, null, false);

        // CreditBankName
        $this->CreditBankName->setDbValueDef($rsnew, $this->CreditBankName->CurrentValue, null, false);

        // CreditCardHolder
        $this->CreditCardHolder->setDbValueDef($rsnew, $this->CreditCardHolder->CurrentValue, null, false);

        // CreditCardType
        $this->CreditCardType->setDbValueDef($rsnew, $this->CreditCardType->CurrentValue, null, false);

        // CreditCardMachine
        $this->CreditCardMachine->setDbValueDef($rsnew, $this->CreditCardMachine->CurrentValue, null, false);

        // CreditCardBatchNo
        $this->CreditCardBatchNo->setDbValueDef($rsnew, $this->CreditCardBatchNo->CurrentValue, null, false);

        // CreditCardTax
        $this->CreditCardTax->setDbValueDef($rsnew, $this->CreditCardTax->CurrentValue, null, false);

        // CreditDeductionAmount
        $this->CreditDeductionAmount->setDbValueDef($rsnew, $this->CreditDeductionAmount->CurrentValue, null, false);

        // RealizationAmount
        $this->RealizationAmount->setDbValueDef($rsnew, $this->RealizationAmount->CurrentValue, null, false);

        // RealizationStatus
        $this->RealizationStatus->setDbValueDef($rsnew, $this->RealizationStatus->CurrentValue, null, false);

        // RealizationRemarks
        $this->RealizationRemarks->setDbValueDef($rsnew, $this->RealizationRemarks->CurrentValue, null, false);

        // RealizationBatchNo
        $this->RealizationBatchNo->setDbValueDef($rsnew, $this->RealizationBatchNo->CurrentValue, null, false);

        // RealizationDate
        $this->RealizationDate->setDbValueDef($rsnew, $this->RealizationDate->CurrentValue, null, false);

        // BankAccHolderMobileNumber
        $this->BankAccHolderMobileNumber->setDbValueDef($rsnew, $this->BankAccHolderMobileNumber->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("ReceiptsList"), "", $this->TableVar, true);
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
