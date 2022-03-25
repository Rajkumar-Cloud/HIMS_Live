<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacyCustomersEdit extends PharmacyCustomers
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_customers';

    // Page object name
    public $PageObjName = "PharmacyCustomersEdit";

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

        // Table object (pharmacy_customers)
        if (!isset($GLOBALS["pharmacy_customers"]) || get_class($GLOBALS["pharmacy_customers"]) == PROJECT_NAMESPACE . "pharmacy_customers") {
            $GLOBALS["pharmacy_customers"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_customers');
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
                $doc = new $class(Container("pharmacy_customers"));
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
                    if ($pageName == "PharmacyCustomersView") {
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
        $this->Customercode->setVisibility();
        $this->Customername->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->_Email->setVisibility();
        $this->Ratetype->setVisibility();
        $this->Creationdate->setVisibility();
        $this->ContactPerson->setVisibility();
        $this->CPPhone->setVisibility();
        $this->id->setVisibility();
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
                    $this->terminate("PharmacyCustomersList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PharmacyCustomersList") {
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

        // Check field name 'Email' first before field var 'x__Email'
        $val = $CurrentForm->hasValue("Email") ? $CurrentForm->getValue("Email") : $CurrentForm->getValue("x__Email");
        if (!$this->_Email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_Email->Visible = false; // Disable update for API request
            } else {
                $this->_Email->setFormValue($val);
            }
        }

        // Check field name 'Ratetype' first before field var 'x_Ratetype'
        $val = $CurrentForm->hasValue("Ratetype") ? $CurrentForm->getValue("Ratetype") : $CurrentForm->getValue("x_Ratetype");
        if (!$this->Ratetype->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Ratetype->Visible = false; // Disable update for API request
            } else {
                $this->Ratetype->setFormValue($val);
            }
        }

        // Check field name 'Creationdate' first before field var 'x_Creationdate'
        $val = $CurrentForm->hasValue("Creationdate") ? $CurrentForm->getValue("Creationdate") : $CurrentForm->getValue("x_Creationdate");
        if (!$this->Creationdate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Creationdate->Visible = false; // Disable update for API request
            } else {
                $this->Creationdate->setFormValue($val);
            }
            $this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
        }

        // Check field name 'ContactPerson' first before field var 'x_ContactPerson'
        $val = $CurrentForm->hasValue("ContactPerson") ? $CurrentForm->getValue("ContactPerson") : $CurrentForm->getValue("x_ContactPerson");
        if (!$this->ContactPerson->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ContactPerson->Visible = false; // Disable update for API request
            } else {
                $this->ContactPerson->setFormValue($val);
            }
        }

        // Check field name 'CPPhone' first before field var 'x_CPPhone'
        $val = $CurrentForm->hasValue("CPPhone") ? $CurrentForm->getValue("CPPhone") : $CurrentForm->getValue("x_CPPhone");
        if (!$this->CPPhone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CPPhone->Visible = false; // Disable update for API request
            } else {
                $this->CPPhone->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey) {
            $this->id->setFormValue($val);
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->Customercode->CurrentValue = $this->Customercode->FormValue;
        $this->Customername->CurrentValue = $this->Customername->FormValue;
        $this->Address1->CurrentValue = $this->Address1->FormValue;
        $this->Address2->CurrentValue = $this->Address2->FormValue;
        $this->Address3->CurrentValue = $this->Address3->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->Fax->CurrentValue = $this->Fax->FormValue;
        $this->_Email->CurrentValue = $this->_Email->FormValue;
        $this->Ratetype->CurrentValue = $this->Ratetype->FormValue;
        $this->Creationdate->CurrentValue = $this->Creationdate->FormValue;
        $this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
        $this->ContactPerson->CurrentValue = $this->ContactPerson->FormValue;
        $this->CPPhone->CurrentValue = $this->CPPhone->FormValue;
        $this->id->CurrentValue = $this->id->FormValue;
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
        $this->Customercode->setDbValue($row['Customercode']);
        $this->Customername->setDbValue($row['Customername']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Ratetype->setDbValue($row['Ratetype']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->ContactPerson->setDbValue($row['ContactPerson']);
        $this->CPPhone->setDbValue($row['CPPhone']);
        $this->id->setDbValue($row['id']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Customercode'] = null;
        $row['Customername'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['Email'] = null;
        $row['Ratetype'] = null;
        $row['Creationdate'] = null;
        $row['ContactPerson'] = null;
        $row['CPPhone'] = null;
        $row['id'] = null;
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

        // Customercode

        // Customername

        // Address1

        // Address2

        // Address3

        // State

        // Pincode

        // Phone

        // Fax

        // Email

        // Ratetype

        // Creationdate

        // ContactPerson

        // CPPhone

        // id
        if ($this->RowType == ROWTYPE_VIEW) {
            // Customercode
            $this->Customercode->ViewValue = $this->Customercode->CurrentValue;
            $this->Customercode->ViewValue = FormatNumber($this->Customercode->ViewValue, 0, -2, -2, -2);
            $this->Customercode->ViewCustomAttributes = "";

            // Customername
            $this->Customername->ViewValue = $this->Customername->CurrentValue;
            $this->Customername->ViewCustomAttributes = "";

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

            // Email
            $this->_Email->ViewValue = $this->_Email->CurrentValue;
            $this->_Email->ViewCustomAttributes = "";

            // Ratetype
            $this->Ratetype->ViewValue = $this->Ratetype->CurrentValue;
            $this->Ratetype->ViewCustomAttributes = "";

            // Creationdate
            $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
            $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
            $this->Creationdate->ViewCustomAttributes = "";

            // ContactPerson
            $this->ContactPerson->ViewValue = $this->ContactPerson->CurrentValue;
            $this->ContactPerson->ViewCustomAttributes = "";

            // CPPhone
            $this->CPPhone->ViewValue = $this->CPPhone->CurrentValue;
            $this->CPPhone->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";
            $this->Customercode->TooltipValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";
            $this->Customername->TooltipValue = "";

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

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";
            $this->_Email->TooltipValue = "";

            // Ratetype
            $this->Ratetype->LinkCustomAttributes = "";
            $this->Ratetype->HrefValue = "";
            $this->Ratetype->TooltipValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";
            $this->Creationdate->TooltipValue = "";

            // ContactPerson
            $this->ContactPerson->LinkCustomAttributes = "";
            $this->ContactPerson->HrefValue = "";
            $this->ContactPerson->TooltipValue = "";

            // CPPhone
            $this->CPPhone->LinkCustomAttributes = "";
            $this->CPPhone->HrefValue = "";
            $this->CPPhone->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // Customercode
            $this->Customercode->EditAttrs["class"] = "form-control";
            $this->Customercode->EditCustomAttributes = "";
            $this->Customercode->EditValue = HtmlEncode($this->Customercode->CurrentValue);
            $this->Customercode->PlaceHolder = RemoveHtml($this->Customercode->caption());

            // Customername
            $this->Customername->EditAttrs["class"] = "form-control";
            $this->Customername->EditCustomAttributes = "";
            $this->Customername->EditValue = HtmlEncode($this->Customername->CurrentValue);
            $this->Customername->PlaceHolder = RemoveHtml($this->Customername->caption());

            // Address1
            $this->Address1->EditAttrs["class"] = "form-control";
            $this->Address1->EditCustomAttributes = "";
            if (!$this->Address1->Raw) {
                $this->Address1->CurrentValue = HtmlDecode($this->Address1->CurrentValue);
            }
            $this->Address1->EditValue = HtmlEncode($this->Address1->CurrentValue);
            $this->Address1->PlaceHolder = RemoveHtml($this->Address1->caption());

            // Address2
            $this->Address2->EditAttrs["class"] = "form-control";
            $this->Address2->EditCustomAttributes = "";
            if (!$this->Address2->Raw) {
                $this->Address2->CurrentValue = HtmlDecode($this->Address2->CurrentValue);
            }
            $this->Address2->EditValue = HtmlEncode($this->Address2->CurrentValue);
            $this->Address2->PlaceHolder = RemoveHtml($this->Address2->caption());

            // Address3
            $this->Address3->EditAttrs["class"] = "form-control";
            $this->Address3->EditCustomAttributes = "";
            if (!$this->Address3->Raw) {
                $this->Address3->CurrentValue = HtmlDecode($this->Address3->CurrentValue);
            }
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

            // Email
            $this->_Email->EditAttrs["class"] = "form-control";
            $this->_Email->EditCustomAttributes = "";
            if (!$this->_Email->Raw) {
                $this->_Email->CurrentValue = HtmlDecode($this->_Email->CurrentValue);
            }
            $this->_Email->EditValue = HtmlEncode($this->_Email->CurrentValue);
            $this->_Email->PlaceHolder = RemoveHtml($this->_Email->caption());

            // Ratetype
            $this->Ratetype->EditAttrs["class"] = "form-control";
            $this->Ratetype->EditCustomAttributes = "";
            if (!$this->Ratetype->Raw) {
                $this->Ratetype->CurrentValue = HtmlDecode($this->Ratetype->CurrentValue);
            }
            $this->Ratetype->EditValue = HtmlEncode($this->Ratetype->CurrentValue);
            $this->Ratetype->PlaceHolder = RemoveHtml($this->Ratetype->caption());

            // Creationdate
            $this->Creationdate->EditAttrs["class"] = "form-control";
            $this->Creationdate->EditCustomAttributes = "";
            $this->Creationdate->EditValue = HtmlEncode(FormatDateTime($this->Creationdate->CurrentValue, 8));
            $this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

            // ContactPerson
            $this->ContactPerson->EditAttrs["class"] = "form-control";
            $this->ContactPerson->EditCustomAttributes = "";
            if (!$this->ContactPerson->Raw) {
                $this->ContactPerson->CurrentValue = HtmlDecode($this->ContactPerson->CurrentValue);
            }
            $this->ContactPerson->EditValue = HtmlEncode($this->ContactPerson->CurrentValue);
            $this->ContactPerson->PlaceHolder = RemoveHtml($this->ContactPerson->caption());

            // CPPhone
            $this->CPPhone->EditAttrs["class"] = "form-control";
            $this->CPPhone->EditCustomAttributes = "";
            if (!$this->CPPhone->Raw) {
                $this->CPPhone->CurrentValue = HtmlDecode($this->CPPhone->CurrentValue);
            }
            $this->CPPhone->EditValue = HtmlEncode($this->CPPhone->CurrentValue);
            $this->CPPhone->PlaceHolder = RemoveHtml($this->CPPhone->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Edit refer script

            // Customercode
            $this->Customercode->LinkCustomAttributes = "";
            $this->Customercode->HrefValue = "";

            // Customername
            $this->Customername->LinkCustomAttributes = "";
            $this->Customername->HrefValue = "";

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

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";

            // Ratetype
            $this->Ratetype->LinkCustomAttributes = "";
            $this->Ratetype->HrefValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";

            // ContactPerson
            $this->ContactPerson->LinkCustomAttributes = "";
            $this->ContactPerson->HrefValue = "";

            // CPPhone
            $this->CPPhone->LinkCustomAttributes = "";
            $this->CPPhone->HrefValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
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
        if ($this->Customercode->Required) {
            if (!$this->Customercode->IsDetailKey && EmptyValue($this->Customercode->FormValue)) {
                $this->Customercode->addErrorMessage(str_replace("%s", $this->Customercode->caption(), $this->Customercode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Customercode->FormValue)) {
            $this->Customercode->addErrorMessage($this->Customercode->getErrorMessage(false));
        }
        if ($this->Customername->Required) {
            if (!$this->Customername->IsDetailKey && EmptyValue($this->Customername->FormValue)) {
                $this->Customername->addErrorMessage(str_replace("%s", $this->Customername->caption(), $this->Customername->RequiredErrorMessage));
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
        if ($this->_Email->Required) {
            if (!$this->_Email->IsDetailKey && EmptyValue($this->_Email->FormValue)) {
                $this->_Email->addErrorMessage(str_replace("%s", $this->_Email->caption(), $this->_Email->RequiredErrorMessage));
            }
        }
        if ($this->Ratetype->Required) {
            if (!$this->Ratetype->IsDetailKey && EmptyValue($this->Ratetype->FormValue)) {
                $this->Ratetype->addErrorMessage(str_replace("%s", $this->Ratetype->caption(), $this->Ratetype->RequiredErrorMessage));
            }
        }
        if ($this->Creationdate->Required) {
            if (!$this->Creationdate->IsDetailKey && EmptyValue($this->Creationdate->FormValue)) {
                $this->Creationdate->addErrorMessage(str_replace("%s", $this->Creationdate->caption(), $this->Creationdate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->Creationdate->FormValue)) {
            $this->Creationdate->addErrorMessage($this->Creationdate->getErrorMessage(false));
        }
        if ($this->ContactPerson->Required) {
            if (!$this->ContactPerson->IsDetailKey && EmptyValue($this->ContactPerson->FormValue)) {
                $this->ContactPerson->addErrorMessage(str_replace("%s", $this->ContactPerson->caption(), $this->ContactPerson->RequiredErrorMessage));
            }
        }
        if ($this->CPPhone->Required) {
            if (!$this->CPPhone->IsDetailKey && EmptyValue($this->CPPhone->FormValue)) {
                $this->CPPhone->addErrorMessage(str_replace("%s", $this->CPPhone->caption(), $this->CPPhone->RequiredErrorMessage));
            }
        }
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
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

            // Customercode
            $this->Customercode->setDbValueDef($rsnew, $this->Customercode->CurrentValue, 0, $this->Customercode->ReadOnly);

            // Customername
            $this->Customername->setDbValueDef($rsnew, $this->Customername->CurrentValue, null, $this->Customername->ReadOnly);

            // Address1
            $this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, null, $this->Address1->ReadOnly);

            // Address2
            $this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, null, $this->Address2->ReadOnly);

            // Address3
            $this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, null, $this->Address3->ReadOnly);

            // State
            $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, $this->State->ReadOnly);

            // Pincode
            $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, $this->Pincode->ReadOnly);

            // Phone
            $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, $this->Phone->ReadOnly);

            // Fax
            $this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, null, $this->Fax->ReadOnly);

            // Email
            $this->_Email->setDbValueDef($rsnew, $this->_Email->CurrentValue, null, $this->_Email->ReadOnly);

            // Ratetype
            $this->Ratetype->setDbValueDef($rsnew, $this->Ratetype->CurrentValue, null, $this->Ratetype->ReadOnly);

            // Creationdate
            $this->Creationdate->setDbValueDef($rsnew, UnFormatDateTime($this->Creationdate->CurrentValue, 0), null, $this->Creationdate->ReadOnly);

            // ContactPerson
            $this->ContactPerson->setDbValueDef($rsnew, $this->ContactPerson->CurrentValue, null, $this->ContactPerson->ReadOnly);

            // CPPhone
            $this->CPPhone->setDbValueDef($rsnew, $this->CPPhone->CurrentValue, null, $this->CPPhone->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacyCustomersList"), "", $this->TableVar, true);
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
