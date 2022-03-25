<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyPoAdd extends PharmacyPo
{
    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_po';

    // Page object name
    public $PageObjName = "PharmacyPoAdd";

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

        // Table object (pharmacy_po)
        if (!isset($GLOBALS["pharmacy_po"]) || get_class($GLOBALS["pharmacy_po"]) == PROJECT_NAMESPACE . "pharmacy_po") {
            $GLOBALS["pharmacy_po"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_po');
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
                $doc = new $class(Container("pharmacy_po"));
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
                    if ($pageName == "PharmacyPoView") {
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
        $this->ORDNO->setVisibility();
        $this->DT->setVisibility();
        $this->YM->setVisibility();
        $this->PC->setVisibility();
        $this->Customercode->setVisibility();
        $this->Customername->setVisibility();
        $this->pharmacy_pocol->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->EEmail->setVisibility();
        $this->HospID->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->BRCODE->setVisibility();
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
                    $this->terminate("PharmacyPoList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "PharmacyPoList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "PharmacyPoView") {
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
        $this->ORDNO->CurrentValue = null;
        $this->ORDNO->OldValue = $this->ORDNO->CurrentValue;
        $this->DT->CurrentValue = null;
        $this->DT->OldValue = $this->DT->CurrentValue;
        $this->YM->CurrentValue = null;
        $this->YM->OldValue = $this->YM->CurrentValue;
        $this->PC->CurrentValue = null;
        $this->PC->OldValue = $this->PC->CurrentValue;
        $this->Customercode->CurrentValue = null;
        $this->Customercode->OldValue = $this->Customercode->CurrentValue;
        $this->Customername->CurrentValue = null;
        $this->Customername->OldValue = $this->Customername->CurrentValue;
        $this->pharmacy_pocol->CurrentValue = null;
        $this->pharmacy_pocol->OldValue = $this->pharmacy_pocol->CurrentValue;
        $this->Address1->CurrentValue = null;
        $this->Address1->OldValue = $this->Address1->CurrentValue;
        $this->Address2->CurrentValue = null;
        $this->Address2->OldValue = $this->Address2->CurrentValue;
        $this->Address3->CurrentValue = null;
        $this->Address3->OldValue = $this->Address3->CurrentValue;
        $this->State->CurrentValue = null;
        $this->State->OldValue = $this->State->CurrentValue;
        $this->Pincode->CurrentValue = null;
        $this->Pincode->OldValue = $this->Pincode->CurrentValue;
        $this->Phone->CurrentValue = null;
        $this->Phone->OldValue = $this->Phone->CurrentValue;
        $this->Fax->CurrentValue = null;
        $this->Fax->OldValue = $this->Fax->CurrentValue;
        $this->EEmail->CurrentValue = null;
        $this->EEmail->OldValue = $this->EEmail->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->BRCODE->CurrentValue = null;
        $this->BRCODE->OldValue = $this->BRCODE->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'ORDNO' first before field var 'x_ORDNO'
        $val = $CurrentForm->hasValue("ORDNO") ? $CurrentForm->getValue("ORDNO") : $CurrentForm->getValue("x_ORDNO");
        if (!$this->ORDNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ORDNO->Visible = false; // Disable update for API request
            } else {
                $this->ORDNO->setFormValue($val);
            }
        }

        // Check field name 'DT' first before field var 'x_DT'
        $val = $CurrentForm->hasValue("DT") ? $CurrentForm->getValue("DT") : $CurrentForm->getValue("x_DT");
        if (!$this->DT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DT->Visible = false; // Disable update for API request
            } else {
                $this->DT->setFormValue($val);
            }
            $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        }

        // Check field name 'YM' first before field var 'x_YM'
        $val = $CurrentForm->hasValue("YM") ? $CurrentForm->getValue("YM") : $CurrentForm->getValue("x_YM");
        if (!$this->YM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->YM->Visible = false; // Disable update for API request
            } else {
                $this->YM->setFormValue($val);
            }
        }

        // Check field name 'PC' first before field var 'x_PC'
        $val = $CurrentForm->hasValue("PC") ? $CurrentForm->getValue("PC") : $CurrentForm->getValue("x_PC");
        if (!$this->PC->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PC->Visible = false; // Disable update for API request
            } else {
                $this->PC->setFormValue($val);
            }
        }

        // Check field name 'Customercode' first before field var 'x_Customercode'
        $val = $CurrentForm->hasValue("Customercode") ? $CurrentForm->getValue("Customercode") : $CurrentForm->getValue("x_Customercode");
        if (!$this->Customercode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customercode->Visible = false; // Disable update for API request
            } else {
                $this->Customercode->setFormValue($val);
            }
        }

        // Check field name 'Customername' first before field var 'x_Customername'
        $val = $CurrentForm->hasValue("Customername") ? $CurrentForm->getValue("Customername") : $CurrentForm->getValue("x_Customername");
        if (!$this->Customername->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Customername->Visible = false; // Disable update for API request
            } else {
                $this->Customername->setFormValue($val);
            }
        }

        // Check field name 'pharmacy_pocol' first before field var 'x_pharmacy_pocol'
        $val = $CurrentForm->hasValue("pharmacy_pocol") ? $CurrentForm->getValue("pharmacy_pocol") : $CurrentForm->getValue("x_pharmacy_pocol");
        if (!$this->pharmacy_pocol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacy_pocol->Visible = false; // Disable update for API request
            } else {
                $this->pharmacy_pocol->setFormValue($val);
            }
        }

        // Check field name 'Address1' first before field var 'x_Address1'
        $val = $CurrentForm->hasValue("Address1") ? $CurrentForm->getValue("Address1") : $CurrentForm->getValue("x_Address1");
        if (!$this->Address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address1->Visible = false; // Disable update for API request
            } else {
                $this->Address1->setFormValue($val);
            }
        }

        // Check field name 'Address2' first before field var 'x_Address2'
        $val = $CurrentForm->hasValue("Address2") ? $CurrentForm->getValue("Address2") : $CurrentForm->getValue("x_Address2");
        if (!$this->Address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address2->Visible = false; // Disable update for API request
            } else {
                $this->Address2->setFormValue($val);
            }
        }

        // Check field name 'Address3' first before field var 'x_Address3'
        $val = $CurrentForm->hasValue("Address3") ? $CurrentForm->getValue("Address3") : $CurrentForm->getValue("x_Address3");
        if (!$this->Address3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Address3->Visible = false; // Disable update for API request
            } else {
                $this->Address3->setFormValue($val);
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

        // Check field name 'Pincode' first before field var 'x_Pincode'
        $val = $CurrentForm->hasValue("Pincode") ? $CurrentForm->getValue("Pincode") : $CurrentForm->getValue("x_Pincode");
        if (!$this->Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Pincode->Visible = false; // Disable update for API request
            } else {
                $this->Pincode->setFormValue($val);
            }
        }

        // Check field name 'Phone' first before field var 'x_Phone'
        $val = $CurrentForm->hasValue("Phone") ? $CurrentForm->getValue("Phone") : $CurrentForm->getValue("x_Phone");
        if (!$this->Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Phone->Visible = false; // Disable update for API request
            } else {
                $this->Phone->setFormValue($val);
            }
        }

        // Check field name 'Fax' first before field var 'x_Fax'
        $val = $CurrentForm->hasValue("Fax") ? $CurrentForm->getValue("Fax") : $CurrentForm->getValue("x_Fax");
        if (!$this->Fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fax->Visible = false; // Disable update for API request
            } else {
                $this->Fax->setFormValue($val);
            }
        }

        // Check field name 'EEmail' first before field var 'x_EEmail'
        $val = $CurrentForm->hasValue("EEmail") ? $CurrentForm->getValue("EEmail") : $CurrentForm->getValue("x_EEmail");
        if (!$this->EEmail->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EEmail->Visible = false; // Disable update for API request
            } else {
                $this->EEmail->setFormValue($val);
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

        // Check field name 'BRCODE' first before field var 'x_BRCODE'
        $val = $CurrentForm->hasValue("BRCODE") ? $CurrentForm->getValue("BRCODE") : $CurrentForm->getValue("x_BRCODE");
        if (!$this->BRCODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BRCODE->Visible = false; // Disable update for API request
            } else {
                $this->BRCODE->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->ORDNO->CurrentValue = $this->ORDNO->FormValue;
        $this->DT->CurrentValue = $this->DT->FormValue;
        $this->DT->CurrentValue = UnFormatDateTime($this->DT->CurrentValue, 0);
        $this->YM->CurrentValue = $this->YM->FormValue;
        $this->PC->CurrentValue = $this->PC->FormValue;
        $this->Customercode->CurrentValue = $this->Customercode->FormValue;
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->pharmacy_pocol->CurrentValue = $this->pharmacy_pocol->FormValue;
        $this->Address1->CurrentValue = $this->Address1->FormValue;
        $this->Address2->CurrentValue = $this->Address2->FormValue;
        $this->Address3->CurrentValue = $this->Address3->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->Fax->CurrentValue = $this->Fax->FormValue;
        $this->EEmail->CurrentValue = $this->EEmail->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->BRCODE->CurrentValue = $this->BRCODE->FormValue;
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
        $this->ORDNO->setDbValue($row['ORDNO']);
        $this->DT->setDbValue($row['DT']);
        $this->YM->setDbValue($row['YM']);
        $this->PC->setDbValue($row['PC']);
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->pharmacy_pocol->setDbValue($row['pharmacy_pocol']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->EEmail->setDbValue($row['EEmail']);
        $this->HospID->setDbValue($row['HospID']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->BRCODE->setDbValue($row['BRCODE']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['ORDNO'] = $this->ORDNO->CurrentValue;
        $row['DT'] = $this->DT->CurrentValue;
        $row['YM'] = $this->YM->CurrentValue;
        $row['PC'] = $this->PC->CurrentValue;
        $row['Customercode'] = $this->Customercode->CurrentValue;
        $row['Customername'] = $this->Customername->CurrentValue;
        $row['pharmacy_pocol'] = $this->pharmacy_pocol->CurrentValue;
        $row['Address1'] = $this->Address1->CurrentValue;
        $row['Address2'] = $this->Address2->CurrentValue;
        $row['Address3'] = $this->Address3->CurrentValue;
        $row['State'] = $this->State->CurrentValue;
        $row['Pincode'] = $this->Pincode->CurrentValue;
        $row['Phone'] = $this->Phone->CurrentValue;
        $row['Fax'] = $this->Fax->CurrentValue;
        $row['EEmail'] = $this->EEmail->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['BRCODE'] = $this->BRCODE->CurrentValue;
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

        // ORDNO

        // DT

        // YM

        // PC

        // Customercode

        // Customername

        // pharmacy_pocol

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // EEmail

        // HospID

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // BRCODE
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->ViewValue = $this->ORDNO->CurrentValue;
            $this->ORDNO->ViewCustomAttributes = "";

            // DT
            $this->DT->ViewValue = $this->DT->CurrentValue;
            $this->DT->ViewValue = FormatDateTime($this->DT->ViewValue, 0);
            $this->DT->ViewCustomAttributes = "";

            // YM
            $this->YM->ViewValue = $this->YM->CurrentValue;
            $this->YM->ViewCustomAttributes = "";

            // PC
            $this->PC->ViewValue = $this->PC->CurrentValue;
            $this->PC->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->ViewValue = $this->pharmacy_pocol->CurrentValue;
            $this->pharmacy_pocol->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // EEmail
            $this->EEmail->ViewValue = $this->EEmail->CurrentValue;
            $this->EEmail->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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

            // BRCODE
            $this->BRCODE->ViewValue = $this->BRCODE->CurrentValue;
            $this->BRCODE->ViewValue = FormatNumber($this->BRCODE->ViewValue, 0, -2, -2, -2);
            $this->BRCODE->ViewCustomAttributes = "";

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";
            $this->ORDNO->TooltipValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";
            $this->DT->TooltipValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";
            $this->YM->TooltipValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";
            $this->PC->TooltipValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";
            $this->Customercode->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";
            $this->pharmacy_pocol->TooltipValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";
            $this->Address1->TooltipValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";
            $this->Address2->TooltipValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";
            $this->Address3->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";
            $this->Phone->TooltipValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";
            $this->Fax->TooltipValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";
            $this->EEmail->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

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

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
            $this->BRCODE->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // ORDNO
            $this->ORDNO->EditAttrs["class"] = "form-control";
            $this->ORDNO->EditCustomAttributes = "";
            if (!$this->ORDNO->Raw) {
                $this->ORDNO->CurrentValue = HtmlDecode($this->ORDNO->CurrentValue);
            }
            $this->ORDNO->EditValue = HtmlEncode($this->ORDNO->CurrentValue);
            $this->ORDNO->PlaceHolder = RemoveHtml($this->ORDNO->caption());

            // DT
            $this->DT->EditAttrs["class"] = "form-control";
            $this->DT->EditCustomAttributes = "";
            $this->DT->EditValue = HtmlEncode(FormatDateTime($this->DT->CurrentValue, 8));
            $this->DT->PlaceHolder = RemoveHtml($this->DT->caption());

            // YM
            $this->YM->EditAttrs["class"] = "form-control";
            $this->YM->EditCustomAttributes = "";
            if (!$this->YM->Raw) {
                $this->YM->CurrentValue = HtmlDecode($this->YM->CurrentValue);
            }
            $this->YM->EditValue = HtmlEncode($this->YM->CurrentValue);
            $this->YM->PlaceHolder = RemoveHtml($this->YM->caption());

            // PC
            $this->PC->EditAttrs["class"] = "form-control";
            $this->PC->EditCustomAttributes = "";
            if (!$this->PC->Raw) {
                $this->PC->CurrentValue = HtmlDecode($this->PC->CurrentValue);
            }
            $this->PC->EditValue = HtmlEncode($this->PC->CurrentValue);
            $this->PC->PlaceHolder = RemoveHtml($this->PC->caption());

            // Customercode
            $this->Customercode->EditAttrs["class"] = "form-control";
            $this->Customercode->EditCustomAttributes = "";
            if (!$this->Customercode->Raw) {
                $this->Customercode->CurrentValue = HtmlDecode($this->Customercode->CurrentValue);
            }
            $this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
            $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            if (!$this->Customername->Raw) {
                $this->Customername->CurrentValue = HtmlDecode($this->Customername->CurrentValue);
            }
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // pharmacy_pocol
            $this->pharmacy_pocol->EditAttrs["class"] = "form-control";
            $this->pharmacy_pocol->EditCustomAttributes = "";
            if (!$this->pharmacy_pocol->Raw) {
                $this->pharmacy_pocol->CurrentValue = HtmlDecode($this->pharmacy_pocol->CurrentValue);
            }
            $this->pharmacy_pocol->EditValue = HtmlEncode($this->pharmacy_pocol->CurrentValue);
            $this->pharmacy_pocol->PlaceHolder = RemoveHtml($this->pharmacy_pocol->caption());

            // Address1
            $this->Address1->EditAttrs["class"] = "form-control";
            $this->Address1->EditCustomAttributes = "";
            $this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
            $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

            // Address2
            $this->Address2->EditAttrs["class"] = "form-control";
            $this->Address2->EditCustomAttributes = "";
            $this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
            $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

            // Address3
            $this->Address3->EditAttrs["class"] = "form-control";
            $this->Address3->EditCustomAttributes = "";
            $this->Address3->EditValue = HtmlEncode($this->Address3->CurrentValue);
            $this->Address3->PlaceHolder = RemoveHtml($this->Address3->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->CurrentValue = HtmlDecode($this->State->CurrentValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->CurrentValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Pincode
            $this->Pincode->EditAttrs["class"] = "form-control";
            $this->Pincode->EditCustomAttributes = "";
            if (!$this->Pincode->Raw) {
                $this->Pincode->CurrentValue = HtmlDecode($this->Pincode->CurrentValue);
            }
            $this->Pincode->EditValue = HtmlEncode($this->Pincode->CurrentValue);
            $this->Pincode->PlaceHolder = RemoveHtml($this->Pincode->caption());

            // Phone
            $this->Phone->EditAttrs["class"] = "form-control";
            $this->Phone->EditCustomAttributes = "";
            if (!$this->Phone->Raw) {
                $this->Phone->CurrentValue = HtmlDecode($this->Phone->CurrentValue);
            }
            $this->Phone->EditValue = HtmlEncode($this->Phone->CurrentValue);
            $this->Phone->PlaceHolder = RemoveHtml($this->Phone->caption());

            // Fax
            $this->Fax->EditAttrs["class"] = "form-control";
            $this->Fax->EditCustomAttributes = "";
            if (!$this->Fax->Raw) {
                $this->Fax->CurrentValue = HtmlDecode($this->Fax->CurrentValue);
            }
            $this->Fax->EditValue = HtmlEncode($this->Fax->CurrentValue);
            $this->Fax->PlaceHolder = RemoveHtml($this->Fax->caption());

            // EEmail
            $this->EEmail->EditAttrs["class"] = "form-control";
            $this->EEmail->EditCustomAttributes = "";
            if (!$this->EEmail->Raw) {
                $this->EEmail->CurrentValue = HtmlDecode($this->EEmail->CurrentValue);
            }
            $this->EEmail->EditValue = HtmlEncode($this->EEmail->CurrentValue);
            $this->EEmail->PlaceHolder = RemoveHtml($this->EEmail->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

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

            // BRCODE
            $this->BRCODE->EditAttrs["class"] = "form-control";
            $this->BRCODE->EditCustomAttributes = "";
            $this->BRCODE->EditValue = HtmlEncode($this->BRCODE->CurrentValue);
            $this->BRCODE->PlaceHolder = RemoveHtml($this->BRCODE->caption());

            // Add refer script

            // ORDNO
            $this->ORDNO->LinkCustomAttributes = "";
            $this->ORDNO->HrefValue = "";

            // DT
            $this->DT->LinkCustomAttributes = "";
            $this->DT->HrefValue = "";

            // YM
            $this->YM->LinkCustomAttributes = "";
            $this->YM->HrefValue = "";

            // PC
            $this->PC->LinkCustomAttributes = "";
            $this->PC->HrefValue = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

            // pharmacy_pocol
            $this->pharmacy_pocol->LinkCustomAttributes = "";
            $this->pharmacy_pocol->HrefValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";

            // EEmail
            $this->EEmail->LinkCustomAttributes = "";
            $this->EEmail->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

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

            // BRCODE
            $this->BRCODE->LinkCustomAttributes = "";
            $this->BRCODE->HrefValue = "";
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
        if ($this->ORDNO->Required) {
            if (!$this->ORDNO->IsDetailKey && EmptyValue($this->ORDNO->FormValue)) {
                $this->ORDNO->addErrorMessage(str_replace("%s", $this->ORDNO->caption(), $this->ORDNO->RequiredErrorMessage));
            }
        }
        if ($this->DT->Required) {
            if (!$this->DT->IsDetailKey && EmptyValue($this->DT->FormValue)) {
                $this->DT->addErrorMessage(str_replace("%s", $this->DT->caption(), $this->DT->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->DT->FormValue)) {
            $this->DT->addErrorMessage($this->DT->getErrorMessage(false));
        }
        if ($this->YM->Required) {
            if (!$this->YM->IsDetailKey && EmptyValue($this->YM->FormValue)) {
                $this->YM->addErrorMessage(str_replace("%s", $this->YM->caption(), $this->YM->RequiredErrorMessage));
            }
        }
        if ($this->PC->Required) {
            if (!$this->PC->IsDetailKey && EmptyValue($this->PC->FormValue)) {
                $this->PC->addErrorMessage(str_replace("%s", $this->PC->caption(), $this->PC->RequiredErrorMessage));
            }
        }
        if ($this->Customercode->Required) {
            if (!$this->Customercode->IsDetailKey && EmptyValue($this->Customercode->FormValue)) {
                $this->Customercode->addErrorMessage(str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
            }
        }
        if ($this->Customername->Required) {
            if (!$this->Customername->IsDetailKey && EmptyValue($this->Customername->FormValue)) {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
            }
        }
        if ($this->pharmacy_pocol->Required) {
            if (!$this->pharmacy_pocol->IsDetailKey && EmptyValue($this->pharmacy_pocol->FormValue)) {
                $this->pharmacy_pocol->addErrorMessage(str_replace("%s", $this->pharmacy_pocol->caption(), $this->pharmacy_pocol->RequiredErrorMessage));
            }
        }
        if ($this->Address1->Required) {
            if (!$this->Address1->IsDetailKey && EmptyValue($this->Address1->FormValue)) {
                $this->Address1->addErrorMessage(str_replace("%s", $this->Address1->caption(), $this->Address1->RequiredErrorMessage));
            }
        }
        if ($this->Address2->Required) {
            if (!$this->Address2->IsDetailKey && EmptyValue($this->Address2->FormValue)) {
                $this->Address2->addErrorMessage(str_replace("%s", $this->Address2->caption(), $this->Address2->RequiredErrorMessage));
            }
        }
        if ($this->Address3->Required) {
            if (!$this->Address3->IsDetailKey && EmptyValue($this->Address3->FormValue)) {
                $this->Address3->addErrorMessage(str_replace("%s", $this->Address3->caption(), $this->Address3->RequiredErrorMessage));
            }
        }
        if ($this->State->Required) {
            if (!$this->State->IsDetailKey && EmptyValue($this->State->FormValue)) {
                $this->State->addErrorMessage(str_replace("%s", $this->State->caption(), $this->State->RequiredErrorMessage));
            }
        }
        if ($this->Pincode->Required) {
            if (!$this->Pincode->IsDetailKey && EmptyValue($this->Pincode->FormValue)) {
                $this->Pincode->addErrorMessage(str_replace("%s", $this->Pincode->caption(), $this->Pincode->RequiredErrorMessage));
            }
        }
        if ($this->Phone->Required) {
            if (!$this->Phone->IsDetailKey && EmptyValue($this->Phone->FormValue)) {
                $this->Phone->addErrorMessage(str_replace("%s", $this->Phone->caption(), $this->Phone->RequiredErrorMessage));
            }
        }
        if ($this->Fax->Required) {
            if (!$this->Fax->IsDetailKey && EmptyValue($this->Fax->FormValue)) {
                $this->Fax->addErrorMessage(str_replace("%s", $this->Fax->caption(), $this->Fax->RequiredErrorMessage));
            }
        }
        if ($this->EEmail->Required) {
            if (!$this->EEmail->IsDetailKey && EmptyValue($this->EEmail->FormValue)) {
                $this->EEmail->addErrorMessage(str_replace("%s", $this->EEmail->caption(), $this->EEmail->RequiredErrorMessage));
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
        if ($this->BRCODE->Required) {
            if (!$this->BRCODE->IsDetailKey && EmptyValue($this->BRCODE->FormValue)) {
                $this->BRCODE->addErrorMessage(str_replace("%s", $this->BRCODE->caption(), $this->BRCODE->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BRCODE->FormValue)) {
            $this->BRCODE->addErrorMessage($this->BRCODE->getErrorMessage(false));
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

        // ORDNO
        $this->ORDNO->setDbValueDef($rsnew, $this->ORDNO->CurrentValue, null, false);

        // DT
        $this->DT->setDbValueDef($rsnew, UnFormatDateTime($this->DT->CurrentValue, 0), null, false);

        // YM
        $this->YM->setDbValueDef($rsnew, $this->YM->CurrentValue, null, false);

        // PC
        $this->PC->setDbValueDef($rsnew, $this->PC->CurrentValue, null, false);

        // Customercode
        $this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, null, false);

        // Customername
        $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, false);

        // pharmacy_pocol
        $this->pharmacy_pocol->setDbValueDef($rsnew, $this->pharmacy_pocol->CurrentValue, null, false);

        // Address1
        $this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, null, false);

        // Address2
        $this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, null, false);

        // Address3
        $this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, null, false);

        // State
        $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, false);

        // Pincode
        $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, false);

        // Phone
        $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, false);

        // Fax
        $this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, null, false);

        // EEmail
        $this->EEmail->setDbValueDef($rsnew, $this->EEmail->CurrentValue, null, false);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, false);

        // createdby
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, false);

        // createddatetime
        $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, false);

        // modifiedby
        $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, false);

        // modifieddatetime
        $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, false);

        // BRCODE
        $this->BRCODE->setDbValueDef($rsnew, $this->BRCODE->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyPoList"), "", $this->TableVar, true);
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
