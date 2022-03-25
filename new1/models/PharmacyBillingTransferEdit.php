<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyBillingTransferEdit extends PharmacyBillingTransfer
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_billing_transfer';

    // Page object name
    public $PageObjName = "PharmacyBillingTransferEdit";

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

        // Table object (pharmacy_billing_transfer)
        if (!isset($GLOBALS["pharmacy_billing_transfer"]) || get_class($GLOBALS["pharmacy_billing_transfer"]) == PROJECT_NAMESPACE . "pharmacy_billing_transfer") {
            $GLOBALS["pharmacy_billing_transfer"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_billing_transfer');
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
                $doc = new $class(Container("pharmacy_billing_transfer"));
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
                    if ($pageName == "PharmacyBillingTransferView") {
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
        $this->transfer->setVisibility();
        $this->pharmacy->setVisibility();
        $this->street->setVisibility();
        $this->area->setVisibility();
        $this->town->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->phone_no->setVisibility();
        $this->Details->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->HospID->setVisibility();
        $this->RIDNO->setVisibility();
        $this->TidNo->setVisibility();
        $this->CId->setVisibility();
        $this->PatId->setVisibility();
        $this->DrID->setVisibility();
        $this->BillStatus->setVisibility();
        $this->PharID->setVisibility();
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
                    $this->terminate("PharmacyBillingTransferList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PharmacyBillingTransferList") {
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

        // Check field name 'transfer' first before field var 'x_transfer'
        $val = $CurrentForm->hasValue("transfer") ? $CurrentForm->getValue("transfer") : $CurrentForm->getValue("x_transfer");
        if (!$this->transfer->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->transfer->Visible = false; // Disable update for API request
            } else {
                $this->transfer->setFormValue($val);
            }
        }

        // Check field name 'pharmacy' first before field var 'x_pharmacy'
        $val = $CurrentForm->hasValue("pharmacy") ? $CurrentForm->getValue("pharmacy") : $CurrentForm->getValue("x_pharmacy");
        if (!$this->pharmacy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pharmacy->Visible = false; // Disable update for API request
            } else {
                $this->pharmacy->setFormValue($val);
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

        // Check field name 'area' first before field var 'x_area'
        $val = $CurrentForm->hasValue("area") ? $CurrentForm->getValue("area") : $CurrentForm->getValue("x_area");
        if (!$this->area->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->area->Visible = false; // Disable update for API request
            } else {
                $this->area->setFormValue($val);
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

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'phone_no' first before field var 'x_phone_no'
        $val = $CurrentForm->hasValue("phone_no") ? $CurrentForm->getValue("phone_no") : $CurrentForm->getValue("x_phone_no");
        if (!$this->phone_no->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->phone_no->Visible = false; // Disable update for API request
            } else {
                $this->phone_no->setFormValue($val);
            }
        }

        // Check field name 'Details' first before field var 'x_Details'
        $val = $CurrentForm->hasValue("Details") ? $CurrentForm->getValue("Details") : $CurrentForm->getValue("x_Details");
        if (!$this->Details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Details->Visible = false; // Disable update for API request
            } else {
                $this->Details->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
            }
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

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }

        // Check field name 'CId' first before field var 'x_CId'
        $val = $CurrentForm->hasValue("CId") ? $CurrentForm->getValue("CId") : $CurrentForm->getValue("x_CId");
        if (!$this->CId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CId->Visible = false; // Disable update for API request
            } else {
                $this->CId->setFormValue($val);
            }
        }

        // Check field name 'PatId' first before field var 'x_PatId'
        $val = $CurrentForm->hasValue("PatId") ? $CurrentForm->getValue("PatId") : $CurrentForm->getValue("x_PatId");
        if (!$this->PatId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatId->Visible = false; // Disable update for API request
            } else {
                $this->PatId->setFormValue($val);
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

        // Check field name 'BillStatus' first before field var 'x_BillStatus'
        $val = $CurrentForm->hasValue("BillStatus") ? $CurrentForm->getValue("BillStatus") : $CurrentForm->getValue("x_BillStatus");
        if (!$this->BillStatus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BillStatus->Visible = false; // Disable update for API request
            } else {
                $this->BillStatus->setFormValue($val);
            }
        }

        // Check field name 'PharID' first before field var 'x_PharID'
        $val = $CurrentForm->hasValue("PharID") ? $CurrentForm->getValue("PharID") : $CurrentForm->getValue("x_PharID");
        if (!$this->PharID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PharID->Visible = false; // Disable update for API request
            } else {
                $this->PharID->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->transfer->CurrentValue = $this->transfer->FormValue;
        $this->pharmacy->CurrentValue = $this->pharmacy->FormValue;
        $this->street->CurrentValue = $this->street->FormValue;
        $this->area->CurrentValue = $this->area->FormValue;
        $this->town->CurrentValue = $this->town->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->phone_no->CurrentValue = $this->phone_no->FormValue;
        $this->Details->CurrentValue = $this->Details->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->modifiedby->CurrentValue = $this->modifiedby->FormValue;
        $this->modifieddatetime->CurrentValue = $this->modifieddatetime->FormValue;
        $this->modifieddatetime->CurrentValue = UnFormatDateTime($this->modifieddatetime->CurrentValue, 0);
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->RIDNO->CurrentValue = $this->RIDNO->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->CId->CurrentValue = $this->CId->FormValue;
        $this->PatId->CurrentValue = $this->PatId->FormValue;
        $this->DrID->CurrentValue = $this->DrID->FormValue;
        $this->BillStatus->CurrentValue = $this->BillStatus->FormValue;
        $this->PharID->CurrentValue = $this->PharID->FormValue;
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
        $this->transfer->setDbValue($row['transfer']);
        $this->pharmacy->setDbValue($row['pharmacy']);
        $this->street->setDbValue($row['street']);
        $this->area->setDbValue($row['area']);
        $this->town->setDbValue($row['town']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->phone_no->setDbValue($row['phone_no']);
        $this->Details->setDbValue($row['Details']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->HospID->setDbValue($row['HospID']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->CId->setDbValue($row['CId']);
        $this->PatId->setDbValue($row['PatId']);
        $this->DrID->setDbValue($row['DrID']);
        $this->BillStatus->setDbValue($row['BillStatus']);
        $this->PharID->setDbValue($row['PharID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['transfer'] = null;
        $row['pharmacy'] = null;
        $row['street'] = null;
        $row['area'] = null;
        $row['town'] = null;
        $row['province'] = null;
        $row['postal_code'] = null;
        $row['phone_no'] = null;
        $row['Details'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['HospID'] = null;
        $row['RIDNO'] = null;
        $row['TidNo'] = null;
        $row['CId'] = null;
        $row['PatId'] = null;
        $row['DrID'] = null;
        $row['BillStatus'] = null;
        $row['PharID'] = null;
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

        // transfer

        // pharmacy

        // street

        // area

        // town

        // province

        // postal_code

        // phone_no

        // Details

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // HospID

        // RIDNO

        // TidNo

        // CId

        // PatId

        // DrID

        // BillStatus

        // PharID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // transfer
            $this->transfer->ViewValue = $this->transfer->CurrentValue;
            $this->transfer->ViewValue = FormatNumber($this->transfer->ViewValue, 0, -2, -2, -2);
            $this->transfer->ViewCustomAttributes = "";

            // pharmacy
            $this->pharmacy->ViewValue = $this->pharmacy->CurrentValue;
            $this->pharmacy->ViewCustomAttributes = "";

            // street
            $this->street->ViewValue = $this->street->CurrentValue;
            $this->street->ViewCustomAttributes = "";

            // area
            $this->area->ViewValue = $this->area->CurrentValue;
            $this->area->ViewCustomAttributes = "";

            // town
            $this->town->ViewValue = $this->town->CurrentValue;
            $this->town->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // phone_no
            $this->phone_no->ViewValue = $this->phone_no->CurrentValue;
            $this->phone_no->ViewCustomAttributes = "";

            // Details
            $this->Details->ViewValue = $this->Details->CurrentValue;
            $this->Details->ViewCustomAttributes = "";

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

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // CId
            $this->CId->ViewValue = $this->CId->CurrentValue;
            $this->CId->ViewValue = FormatNumber($this->CId->ViewValue, 0, -2, -2, -2);
            $this->CId->ViewCustomAttributes = "";

            // PatId
            $this->PatId->ViewValue = $this->PatId->CurrentValue;
            $this->PatId->ViewValue = FormatNumber($this->PatId->ViewValue, 0, -2, -2, -2);
            $this->PatId->ViewCustomAttributes = "";

            // DrID
            $this->DrID->ViewValue = $this->DrID->CurrentValue;
            $this->DrID->ViewValue = FormatNumber($this->DrID->ViewValue, 0, -2, -2, -2);
            $this->DrID->ViewCustomAttributes = "";

            // BillStatus
            $this->BillStatus->ViewValue = $this->BillStatus->CurrentValue;
            $this->BillStatus->ViewValue = FormatNumber($this->BillStatus->ViewValue, 0, -2, -2, -2);
            $this->BillStatus->ViewCustomAttributes = "";

            // PharID
            $this->PharID->ViewValue = $this->PharID->CurrentValue;
            $this->PharID->ViewValue = FormatNumber($this->PharID->ViewValue, 0, -2, -2, -2);
            $this->PharID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // transfer
            $this->transfer->LinkCustomAttributes = "";
            $this->transfer->HrefValue = "";
            $this->transfer->TooltipValue = "";

            // pharmacy
            $this->pharmacy->LinkCustomAttributes = "";
            $this->pharmacy->HrefValue = "";
            $this->pharmacy->TooltipValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";
            $this->street->TooltipValue = "";

            // area
            $this->area->LinkCustomAttributes = "";
            $this->area->HrefValue = "";
            $this->area->TooltipValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";
            $this->town->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // phone_no
            $this->phone_no->LinkCustomAttributes = "";
            $this->phone_no->HrefValue = "";
            $this->phone_no->TooltipValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";
            $this->Details->TooltipValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";
            $this->CId->TooltipValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";
            $this->PatId->TooltipValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";
            $this->DrID->TooltipValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";
            $this->BillStatus->TooltipValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // transfer
            $this->transfer->EditAttrs["class"] = "form-control";
            $this->transfer->EditCustomAttributes = "";
            $this->transfer->EditValue = HtmlEncode($this->transfer->CurrentValue);
            $this->transfer->PlaceHolder = RemoveHtml($this->transfer->caption());

            // pharmacy
            $this->pharmacy->EditAttrs["class"] = "form-control";
            $this->pharmacy->EditCustomAttributes = "";
            if (!$this->pharmacy->Raw) {
                $this->pharmacy->CurrentValue = HtmlDecode($this->pharmacy->CurrentValue);
            }
            $this->pharmacy->EditValue = HtmlEncode($this->pharmacy->CurrentValue);
            $this->pharmacy->PlaceHolder = RemoveHtml($this->pharmacy->caption());

            // street
            $this->street->EditAttrs["class"] = "form-control";
            $this->street->EditCustomAttributes = "";
            $this->street->EditValue = HtmlEncode($this->street->CurrentValue);
            $this->street->PlaceHolder = RemoveHtml($this->street->caption());

            // area
            $this->area->EditAttrs["class"] = "form-control";
            $this->area->EditCustomAttributes = "";
            $this->area->EditValue = HtmlEncode($this->area->CurrentValue);
            $this->area->PlaceHolder = RemoveHtml($this->area->caption());

            // town
            $this->town->EditAttrs["class"] = "form-control";
            $this->town->EditCustomAttributes = "";
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

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // phone_no
            $this->phone_no->EditAttrs["class"] = "form-control";
            $this->phone_no->EditCustomAttributes = "";
            if (!$this->phone_no->Raw) {
                $this->phone_no->CurrentValue = HtmlDecode($this->phone_no->CurrentValue);
            }
            $this->phone_no->EditValue = HtmlEncode($this->phone_no->CurrentValue);
            $this->phone_no->PlaceHolder = RemoveHtml($this->phone_no->caption());

            // Details
            $this->Details->EditAttrs["class"] = "form-control";
            $this->Details->EditCustomAttributes = "";
            if (!$this->Details->Raw) {
                $this->Details->CurrentValue = HtmlDecode($this->Details->CurrentValue);
            }
            $this->Details->EditValue = HtmlEncode($this->Details->CurrentValue);
            $this->Details->PlaceHolder = RemoveHtml($this->Details->caption());

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

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->CurrentValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->CurrentValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // CId
            $this->CId->EditAttrs["class"] = "form-control";
            $this->CId->EditCustomAttributes = "";
            $this->CId->EditValue = HtmlEncode($this->CId->CurrentValue);
            $this->CId->PlaceHolder = RemoveHtml($this->CId->caption());

            // PatId
            $this->PatId->EditAttrs["class"] = "form-control";
            $this->PatId->EditCustomAttributes = "";
            $this->PatId->EditValue = HtmlEncode($this->PatId->CurrentValue);
            $this->PatId->PlaceHolder = RemoveHtml($this->PatId->caption());

            // DrID
            $this->DrID->EditAttrs["class"] = "form-control";
            $this->DrID->EditCustomAttributes = "";
            $this->DrID->EditValue = HtmlEncode($this->DrID->CurrentValue);
            $this->DrID->PlaceHolder = RemoveHtml($this->DrID->caption());

            // BillStatus
            $this->BillStatus->EditAttrs["class"] = "form-control";
            $this->BillStatus->EditCustomAttributes = "";
            $this->BillStatus->EditValue = HtmlEncode($this->BillStatus->CurrentValue);
            $this->BillStatus->PlaceHolder = RemoveHtml($this->BillStatus->caption());

            // PharID
            $this->PharID->EditAttrs["class"] = "form-control";
            $this->PharID->EditCustomAttributes = "";
            $this->PharID->EditValue = HtmlEncode($this->PharID->CurrentValue);
            $this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // transfer
            $this->transfer->LinkCustomAttributes = "";
            $this->transfer->HrefValue = "";

            // pharmacy
            $this->pharmacy->LinkCustomAttributes = "";
            $this->pharmacy->HrefValue = "";

            // street
            $this->street->LinkCustomAttributes = "";
            $this->street->HrefValue = "";

            // area
            $this->area->LinkCustomAttributes = "";
            $this->area->HrefValue = "";

            // town
            $this->town->LinkCustomAttributes = "";
            $this->town->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // phone_no
            $this->phone_no->LinkCustomAttributes = "";
            $this->phone_no->HrefValue = "";

            // Details
            $this->Details->LinkCustomAttributes = "";
            $this->Details->HrefValue = "";

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

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // CId
            $this->CId->LinkCustomAttributes = "";
            $this->CId->HrefValue = "";

            // PatId
            $this->PatId->LinkCustomAttributes = "";
            $this->PatId->HrefValue = "";

            // DrID
            $this->DrID->LinkCustomAttributes = "";
            $this->DrID->HrefValue = "";

            // BillStatus
            $this->BillStatus->LinkCustomAttributes = "";
            $this->BillStatus->HrefValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
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
        if ($this->transfer->Required) {
            if (!$this->transfer->IsDetailKey && EmptyValue($this->transfer->FormValue)) {
                $this->transfer->addErrorMessage(str_replace("%s", $this->transfer->caption(), $this->transfer->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->transfer->FormValue)) {
            $this->transfer->addErrorMessage($this->transfer->getErrorMessage(false));
        }
        if ($this->pharmacy->Required) {
            if (!$this->pharmacy->IsDetailKey && EmptyValue($this->pharmacy->FormValue)) {
                $this->pharmacy->addErrorMessage(str_replace("%s", $this->pharmacy->caption(), $this->pharmacy->RequiredErrorMessage));
            }
        }
        if ($this->street->Required) {
            if (!$this->street->IsDetailKey && EmptyValue($this->street->FormValue)) {
                $this->street->addErrorMessage(str_replace("%s", $this->street->caption(), $this->street->RequiredErrorMessage));
            }
        }
        if ($this->area->Required) {
            if (!$this->area->IsDetailKey && EmptyValue($this->area->FormValue)) {
                $this->area->addErrorMessage(str_replace("%s", $this->area->caption(), $this->area->RequiredErrorMessage));
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
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->phone_no->Required) {
            if (!$this->phone_no->IsDetailKey && EmptyValue($this->phone_no->FormValue)) {
                $this->phone_no->addErrorMessage(str_replace("%s", $this->phone_no->caption(), $this->phone_no->RequiredErrorMessage));
            }
        }
        if ($this->Details->Required) {
            if (!$this->Details->IsDetailKey && EmptyValue($this->Details->FormValue)) {
                $this->Details->addErrorMessage(str_replace("%s", $this->Details->caption(), $this->Details->RequiredErrorMessage));
            }
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
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->HospID->FormValue)) {
            $this->HospID->addErrorMessage($this->HospID->getErrorMessage(false));
        }
        if ($this->RIDNO->Required) {
            if (!$this->RIDNO->IsDetailKey && EmptyValue($this->RIDNO->FormValue)) {
                $this->RIDNO->addErrorMessage(str_replace("%s", $this->RIDNO->caption(), $this->RIDNO->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNO->FormValue)) {
            $this->RIDNO->addErrorMessage($this->RIDNO->getErrorMessage(false));
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
        }
        if ($this->CId->Required) {
            if (!$this->CId->IsDetailKey && EmptyValue($this->CId->FormValue)) {
                $this->CId->addErrorMessage(str_replace("%s", $this->CId->caption(), $this->CId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CId->FormValue)) {
            $this->CId->addErrorMessage($this->CId->getErrorMessage(false));
        }
        if ($this->PatId->Required) {
            if (!$this->PatId->IsDetailKey && EmptyValue($this->PatId->FormValue)) {
                $this->PatId->addErrorMessage(str_replace("%s", $this->PatId->caption(), $this->PatId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PatId->FormValue)) {
            $this->PatId->addErrorMessage($this->PatId->getErrorMessage(false));
        }
        if ($this->DrID->Required) {
            if (!$this->DrID->IsDetailKey && EmptyValue($this->DrID->FormValue)) {
                $this->DrID->addErrorMessage(str_replace("%s", $this->DrID->caption(), $this->DrID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->DrID->FormValue)) {
            $this->DrID->addErrorMessage($this->DrID->getErrorMessage(false));
        }
        if ($this->BillStatus->Required) {
            if (!$this->BillStatus->IsDetailKey && EmptyValue($this->BillStatus->FormValue)) {
                $this->BillStatus->addErrorMessage(str_replace("%s", $this->BillStatus->caption(), $this->BillStatus->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BillStatus->FormValue)) {
            $this->BillStatus->addErrorMessage($this->BillStatus->getErrorMessage(false));
        }
        if ($this->PharID->Required) {
            if (!$this->PharID->IsDetailKey && EmptyValue($this->PharID->FormValue)) {
                $this->PharID->addErrorMessage(str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->PharID->FormValue)) {
            $this->PharID->addErrorMessage($this->PharID->getErrorMessage(false));
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

            // transfer
            $this->transfer->setDbValueDef($rsnew, $this->transfer->CurrentValue, null, $this->transfer->ReadOnly);

            // pharmacy
            $this->pharmacy->setDbValueDef($rsnew, $this->pharmacy->CurrentValue, null, $this->pharmacy->ReadOnly);

            // street
            $this->street->setDbValueDef($rsnew, $this->street->CurrentValue, null, $this->street->ReadOnly);

            // area
            $this->area->setDbValueDef($rsnew, $this->area->CurrentValue, null, $this->area->ReadOnly);

            // town
            $this->town->setDbValueDef($rsnew, $this->town->CurrentValue, null, $this->town->ReadOnly);

            // province
            $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, $this->province->ReadOnly);

            // postal_code
            $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, $this->postal_code->ReadOnly);

            // phone_no
            $this->phone_no->setDbValueDef($rsnew, $this->phone_no->CurrentValue, null, $this->phone_no->ReadOnly);

            // Details
            $this->Details->setDbValueDef($rsnew, $this->Details->CurrentValue, null, $this->Details->ReadOnly);

            // createdby
            $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null, $this->createdby->ReadOnly);

            // createddatetime
            $this->createddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->createddatetime->CurrentValue, 0), null, $this->createddatetime->ReadOnly);

            // modifiedby
            $this->modifiedby->setDbValueDef($rsnew, $this->modifiedby->CurrentValue, null, $this->modifiedby->ReadOnly);

            // modifieddatetime
            $this->modifieddatetime->setDbValueDef($rsnew, UnFormatDateTime($this->modifieddatetime->CurrentValue, 0), null, $this->modifieddatetime->ReadOnly);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);

            // RIDNO
            $this->RIDNO->setDbValueDef($rsnew, $this->RIDNO->CurrentValue, null, $this->RIDNO->ReadOnly);

            // TidNo
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // CId
            $this->CId->setDbValueDef($rsnew, $this->CId->CurrentValue, null, $this->CId->ReadOnly);

            // PatId
            $this->PatId->setDbValueDef($rsnew, $this->PatId->CurrentValue, null, $this->PatId->ReadOnly);

            // DrID
            $this->DrID->setDbValueDef($rsnew, $this->DrID->CurrentValue, null, $this->DrID->ReadOnly);

            // BillStatus
            $this->BillStatus->setDbValueDef($rsnew, $this->BillStatus->CurrentValue, null, $this->BillStatus->ReadOnly);

            // PharID
            $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null, $this->PharID->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyBillingTransferList"), "", $this->TableVar, true);
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
