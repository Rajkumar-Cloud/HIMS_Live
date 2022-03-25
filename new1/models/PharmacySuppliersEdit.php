<?php

namespace PHPMaker2021\project3;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PharmacySuppliersEdit extends PharmacySuppliers
{
    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'pharmacy_suppliers';

    // Page object name
    public $PageObjName = "PharmacySuppliersEdit";

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

        // Table object (pharmacy_suppliers)
        if (!isset($GLOBALS["pharmacy_suppliers"]) || get_class($GLOBALS["pharmacy_suppliers"]) == PROJECT_NAMESPACE . "pharmacy_suppliers") {
            $GLOBALS["pharmacy_suppliers"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'pharmacy_suppliers');
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
                $doc = new $class(Container("pharmacy_suppliers"));
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
                    if ($pageName == "PharmacySuppliersView") {
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
        $this->Suppliercode->setVisibility();
        $this->Suppliername->setVisibility();
        $this->Abbreviation->setVisibility();
        $this->Creationdate->setVisibility();
        $this->Address1->setVisibility();
        $this->Address2->setVisibility();
        $this->Address3->setVisibility();
        $this->Citycode->setVisibility();
        $this->State->setVisibility();
        $this->Pincode->setVisibility();
        $this->Tngstnumber->setVisibility();
        $this->Phone->setVisibility();
        $this->Fax->setVisibility();
        $this->_Email->setVisibility();
        $this->Paymentmode->setVisibility();
        $this->Contactperson1->setVisibility();
        $this->CP1Address1->setVisibility();
        $this->CP1Address2->setVisibility();
        $this->CP1Address3->setVisibility();
        $this->CP1Citycode->setVisibility();
        $this->CP1State->setVisibility();
        $this->CP1Pincode->setVisibility();
        $this->CP1Designation->setVisibility();
        $this->CP1Phone->setVisibility();
        $this->CP1MobileNo->setVisibility();
        $this->CP1Fax->setVisibility();
        $this->CP1Email->setVisibility();
        $this->Contactperson2->setVisibility();
        $this->CP2Address1->setVisibility();
        $this->CP2Address2->setVisibility();
        $this->CP2Address3->setVisibility();
        $this->CP2Citycode->setVisibility();
        $this->CP2State->setVisibility();
        $this->CP2Pincode->setVisibility();
        $this->CP2Designation->setVisibility();
        $this->CP2Phone->setVisibility();
        $this->CP2MobileNo->setVisibility();
        $this->CP2Fax->setVisibility();
        $this->CP2Email->setVisibility();
        $this->Type->setVisibility();
        $this->Creditterms->setVisibility();
        $this->Remarks->setVisibility();
        $this->Tinnumber->setVisibility();
        $this->Universalsuppliercode->setVisibility();
        $this->Mobilenumber->setVisibility();
        $this->PANNumber->setVisibility();
        $this->SalesRepMobileNo->setVisibility();
        $this->GSTNumber->setVisibility();
        $this->TANNumber->setVisibility();
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
                    $this->terminate("PharmacySuppliersList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "PharmacySuppliersList") {
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

        // Check field name 'Suppliercode' first before field var 'x_Suppliercode'
        $val = $CurrentForm->hasValue("Suppliercode") ? $CurrentForm->getValue("Suppliercode") : $CurrentForm->getValue("x_Suppliercode");
        if (!$this->Suppliercode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Suppliercode->Visible = false; // Disable update for API request
            } else {
                $this->Suppliercode->setFormValue($val);
            }
        }

        // Check field name 'Suppliername' first before field var 'x_Suppliername'
        $val = $CurrentForm->hasValue("Suppliername") ? $CurrentForm->getValue("Suppliername") : $CurrentForm->getValue("x_Suppliername");
        if (!$this->Suppliername->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Suppliername->Visible = false; // Disable update for API request
            } else {
                $this->Suppliername->setFormValue($val);
            }
        }

        // Check field name 'Abbreviation' first before field var 'x_Abbreviation'
        $val = $CurrentForm->hasValue("Abbreviation") ? $CurrentForm->getValue("Abbreviation") : $CurrentForm->getValue("x_Abbreviation");
        if (!$this->Abbreviation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abbreviation->Visible = false; // Disable update for API request
            } else {
                $this->Abbreviation->setFormValue($val);
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

        // Check field name 'Citycode' first before field var 'x_Citycode'
        $val = $CurrentForm->hasValue("Citycode") ? $CurrentForm->getValue("Citycode") : $CurrentForm->getValue("x_Citycode");
        if (!$this->Citycode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Citycode->Visible = false; // Disable update for API request
            } else {
                $this->Citycode->setFormValue($val);
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

        // Check field name 'Tngstnumber' first before field var 'x_Tngstnumber'
        $val = $CurrentForm->hasValue("Tngstnumber") ? $CurrentForm->getValue("Tngstnumber") : $CurrentForm->getValue("x_Tngstnumber");
        if (!$this->Tngstnumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tngstnumber->Visible = false; // Disable update for API request
            } else {
                $this->Tngstnumber->setFormValue($val);
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

        // Check field name 'Paymentmode' first before field var 'x_Paymentmode'
        $val = $CurrentForm->hasValue("Paymentmode") ? $CurrentForm->getValue("Paymentmode") : $CurrentForm->getValue("x_Paymentmode");
        if (!$this->Paymentmode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Paymentmode->Visible = false; // Disable update for API request
            } else {
                $this->Paymentmode->setFormValue($val);
            }
        }

        // Check field name 'Contactperson1' first before field var 'x_Contactperson1'
        $val = $CurrentForm->hasValue("Contactperson1") ? $CurrentForm->getValue("Contactperson1") : $CurrentForm->getValue("x_Contactperson1");
        if (!$this->Contactperson1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Contactperson1->Visible = false; // Disable update for API request
            } else {
                $this->Contactperson1->setFormValue($val);
            }
        }

        // Check field name 'CP1Address1' first before field var 'x_CP1Address1'
        $val = $CurrentForm->hasValue("CP1Address1") ? $CurrentForm->getValue("CP1Address1") : $CurrentForm->getValue("x_CP1Address1");
        if (!$this->CP1Address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Address1->Visible = false; // Disable update for API request
            } else {
                $this->CP1Address1->setFormValue($val);
            }
        }

        // Check field name 'CP1Address2' first before field var 'x_CP1Address2'
        $val = $CurrentForm->hasValue("CP1Address2") ? $CurrentForm->getValue("CP1Address2") : $CurrentForm->getValue("x_CP1Address2");
        if (!$this->CP1Address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Address2->Visible = false; // Disable update for API request
            } else {
                $this->CP1Address2->setFormValue($val);
            }
        }

        // Check field name 'CP1Address3' first before field var 'x_CP1Address3'
        $val = $CurrentForm->hasValue("CP1Address3") ? $CurrentForm->getValue("CP1Address3") : $CurrentForm->getValue("x_CP1Address3");
        if (!$this->CP1Address3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Address3->Visible = false; // Disable update for API request
            } else {
                $this->CP1Address3->setFormValue($val);
            }
        }

        // Check field name 'CP1Citycode' first before field var 'x_CP1Citycode'
        $val = $CurrentForm->hasValue("CP1Citycode") ? $CurrentForm->getValue("CP1Citycode") : $CurrentForm->getValue("x_CP1Citycode");
        if (!$this->CP1Citycode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Citycode->Visible = false; // Disable update for API request
            } else {
                $this->CP1Citycode->setFormValue($val);
            }
        }

        // Check field name 'CP1State' first before field var 'x_CP1State'
        $val = $CurrentForm->hasValue("CP1State") ? $CurrentForm->getValue("CP1State") : $CurrentForm->getValue("x_CP1State");
        if (!$this->CP1State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1State->Visible = false; // Disable update for API request
            } else {
                $this->CP1State->setFormValue($val);
            }
        }

        // Check field name 'CP1Pincode' first before field var 'x_CP1Pincode'
        $val = $CurrentForm->hasValue("CP1Pincode") ? $CurrentForm->getValue("CP1Pincode") : $CurrentForm->getValue("x_CP1Pincode");
        if (!$this->CP1Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Pincode->Visible = false; // Disable update for API request
            } else {
                $this->CP1Pincode->setFormValue($val);
            }
        }

        // Check field name 'CP1Designation' first before field var 'x_CP1Designation'
        $val = $CurrentForm->hasValue("CP1Designation") ? $CurrentForm->getValue("CP1Designation") : $CurrentForm->getValue("x_CP1Designation");
        if (!$this->CP1Designation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Designation->Visible = false; // Disable update for API request
            } else {
                $this->CP1Designation->setFormValue($val);
            }
        }

        // Check field name 'CP1Phone' first before field var 'x_CP1Phone'
        $val = $CurrentForm->hasValue("CP1Phone") ? $CurrentForm->getValue("CP1Phone") : $CurrentForm->getValue("x_CP1Phone");
        if (!$this->CP1Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Phone->Visible = false; // Disable update for API request
            } else {
                $this->CP1Phone->setFormValue($val);
            }
        }

        // Check field name 'CP1MobileNo' first before field var 'x_CP1MobileNo'
        $val = $CurrentForm->hasValue("CP1MobileNo") ? $CurrentForm->getValue("CP1MobileNo") : $CurrentForm->getValue("x_CP1MobileNo");
        if (!$this->CP1MobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1MobileNo->Visible = false; // Disable update for API request
            } else {
                $this->CP1MobileNo->setFormValue($val);
            }
        }

        // Check field name 'CP1Fax' first before field var 'x_CP1Fax'
        $val = $CurrentForm->hasValue("CP1Fax") ? $CurrentForm->getValue("CP1Fax") : $CurrentForm->getValue("x_CP1Fax");
        if (!$this->CP1Fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Fax->Visible = false; // Disable update for API request
            } else {
                $this->CP1Fax->setFormValue($val);
            }
        }

        // Check field name 'CP1Email' first before field var 'x_CP1Email'
        $val = $CurrentForm->hasValue("CP1Email") ? $CurrentForm->getValue("CP1Email") : $CurrentForm->getValue("x_CP1Email");
        if (!$this->CP1Email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP1Email->Visible = false; // Disable update for API request
            } else {
                $this->CP1Email->setFormValue($val);
            }
        }

        // Check field name 'Contactperson2' first before field var 'x_Contactperson2'
        $val = $CurrentForm->hasValue("Contactperson2") ? $CurrentForm->getValue("Contactperson2") : $CurrentForm->getValue("x_Contactperson2");
        if (!$this->Contactperson2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Contactperson2->Visible = false; // Disable update for API request
            } else {
                $this->Contactperson2->setFormValue($val);
            }
        }

        // Check field name 'CP2Address1' first before field var 'x_CP2Address1'
        $val = $CurrentForm->hasValue("CP2Address1") ? $CurrentForm->getValue("CP2Address1") : $CurrentForm->getValue("x_CP2Address1");
        if (!$this->CP2Address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Address1->Visible = false; // Disable update for API request
            } else {
                $this->CP2Address1->setFormValue($val);
            }
        }

        // Check field name 'CP2Address2' first before field var 'x_CP2Address2'
        $val = $CurrentForm->hasValue("CP2Address2") ? $CurrentForm->getValue("CP2Address2") : $CurrentForm->getValue("x_CP2Address2");
        if (!$this->CP2Address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Address2->Visible = false; // Disable update for API request
            } else {
                $this->CP2Address2->setFormValue($val);
            }
        }

        // Check field name 'CP2Address3' first before field var 'x_CP2Address3'
        $val = $CurrentForm->hasValue("CP2Address3") ? $CurrentForm->getValue("CP2Address3") : $CurrentForm->getValue("x_CP2Address3");
        if (!$this->CP2Address3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Address3->Visible = false; // Disable update for API request
            } else {
                $this->CP2Address3->setFormValue($val);
            }
        }

        // Check field name 'CP2Citycode' first before field var 'x_CP2Citycode'
        $val = $CurrentForm->hasValue("CP2Citycode") ? $CurrentForm->getValue("CP2Citycode") : $CurrentForm->getValue("x_CP2Citycode");
        if (!$this->CP2Citycode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Citycode->Visible = false; // Disable update for API request
            } else {
                $this->CP2Citycode->setFormValue($val);
            }
        }

        // Check field name 'CP2State' first before field var 'x_CP2State'
        $val = $CurrentForm->hasValue("CP2State") ? $CurrentForm->getValue("CP2State") : $CurrentForm->getValue("x_CP2State");
        if (!$this->CP2State->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2State->Visible = false; // Disable update for API request
            } else {
                $this->CP2State->setFormValue($val);
            }
        }

        // Check field name 'CP2Pincode' first before field var 'x_CP2Pincode'
        $val = $CurrentForm->hasValue("CP2Pincode") ? $CurrentForm->getValue("CP2Pincode") : $CurrentForm->getValue("x_CP2Pincode");
        if (!$this->CP2Pincode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Pincode->Visible = false; // Disable update for API request
            } else {
                $this->CP2Pincode->setFormValue($val);
            }
        }

        // Check field name 'CP2Designation' first before field var 'x_CP2Designation'
        $val = $CurrentForm->hasValue("CP2Designation") ? $CurrentForm->getValue("CP2Designation") : $CurrentForm->getValue("x_CP2Designation");
        if (!$this->CP2Designation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Designation->Visible = false; // Disable update for API request
            } else {
                $this->CP2Designation->setFormValue($val);
            }
        }

        // Check field name 'CP2Phone' first before field var 'x_CP2Phone'
        $val = $CurrentForm->hasValue("CP2Phone") ? $CurrentForm->getValue("CP2Phone") : $CurrentForm->getValue("x_CP2Phone");
        if (!$this->CP2Phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Phone->Visible = false; // Disable update for API request
            } else {
                $this->CP2Phone->setFormValue($val);
            }
        }

        // Check field name 'CP2MobileNo' first before field var 'x_CP2MobileNo'
        $val = $CurrentForm->hasValue("CP2MobileNo") ? $CurrentForm->getValue("CP2MobileNo") : $CurrentForm->getValue("x_CP2MobileNo");
        if (!$this->CP2MobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2MobileNo->Visible = false; // Disable update for API request
            } else {
                $this->CP2MobileNo->setFormValue($val);
            }
        }

        // Check field name 'CP2Fax' first before field var 'x_CP2Fax'
        $val = $CurrentForm->hasValue("CP2Fax") ? $CurrentForm->getValue("CP2Fax") : $CurrentForm->getValue("x_CP2Fax");
        if (!$this->CP2Fax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Fax->Visible = false; // Disable update for API request
            } else {
                $this->CP2Fax->setFormValue($val);
            }
        }

        // Check field name 'CP2Email' first before field var 'x_CP2Email'
        $val = $CurrentForm->hasValue("CP2Email") ? $CurrentForm->getValue("CP2Email") : $CurrentForm->getValue("x_CP2Email");
        if (!$this->CP2Email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CP2Email->Visible = false; // Disable update for API request
            } else {
                $this->CP2Email->setFormValue($val);
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

        // Check field name 'Creditterms' first before field var 'x_Creditterms'
        $val = $CurrentForm->hasValue("Creditterms") ? $CurrentForm->getValue("Creditterms") : $CurrentForm->getValue("x_Creditterms");
        if (!$this->Creditterms->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Creditterms->Visible = false; // Disable update for API request
            } else {
                $this->Creditterms->setFormValue($val);
            }
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'Tinnumber' first before field var 'x_Tinnumber'
        $val = $CurrentForm->hasValue("Tinnumber") ? $CurrentForm->getValue("Tinnumber") : $CurrentForm->getValue("x_Tinnumber");
        if (!$this->Tinnumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tinnumber->Visible = false; // Disable update for API request
            } else {
                $this->Tinnumber->setFormValue($val);
            }
        }

        // Check field name 'Universalsuppliercode' first before field var 'x_Universalsuppliercode'
        $val = $CurrentForm->hasValue("Universalsuppliercode") ? $CurrentForm->getValue("Universalsuppliercode") : $CurrentForm->getValue("x_Universalsuppliercode");
        if (!$this->Universalsuppliercode->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Universalsuppliercode->Visible = false; // Disable update for API request
            } else {
                $this->Universalsuppliercode->setFormValue($val);
            }
        }

        // Check field name 'Mobilenumber' first before field var 'x_Mobilenumber'
        $val = $CurrentForm->hasValue("Mobilenumber") ? $CurrentForm->getValue("Mobilenumber") : $CurrentForm->getValue("x_Mobilenumber");
        if (!$this->Mobilenumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Mobilenumber->Visible = false; // Disable update for API request
            } else {
                $this->Mobilenumber->setFormValue($val);
            }
        }

        // Check field name 'PANNumber' first before field var 'x_PANNumber'
        $val = $CurrentForm->hasValue("PANNumber") ? $CurrentForm->getValue("PANNumber") : $CurrentForm->getValue("x_PANNumber");
        if (!$this->PANNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PANNumber->Visible = false; // Disable update for API request
            } else {
                $this->PANNumber->setFormValue($val);
            }
        }

        // Check field name 'SalesRepMobileNo' first before field var 'x_SalesRepMobileNo'
        $val = $CurrentForm->hasValue("SalesRepMobileNo") ? $CurrentForm->getValue("SalesRepMobileNo") : $CurrentForm->getValue("x_SalesRepMobileNo");
        if (!$this->SalesRepMobileNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SalesRepMobileNo->Visible = false; // Disable update for API request
            } else {
                $this->SalesRepMobileNo->setFormValue($val);
            }
        }

        // Check field name 'GSTNumber' first before field var 'x_GSTNumber'
        $val = $CurrentForm->hasValue("GSTNumber") ? $CurrentForm->getValue("GSTNumber") : $CurrentForm->getValue("x_GSTNumber");
        if (!$this->GSTNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GSTNumber->Visible = false; // Disable update for API request
            } else {
                $this->GSTNumber->setFormValue($val);
            }
        }

        // Check field name 'TANNumber' first before field var 'x_TANNumber'
        $val = $CurrentForm->hasValue("TANNumber") ? $CurrentForm->getValue("TANNumber") : $CurrentForm->getValue("x_TANNumber");
        if (!$this->TANNumber->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TANNumber->Visible = false; // Disable update for API request
            } else {
                $this->TANNumber->setFormValue($val);
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
        $this->Suppliercode->CurrentValue = $this->Suppliercode->FormValue;
        $this->Suppliername->CurrentValue = $this->Suppliername->FormValue;
        $this->Abbreviation->CurrentValue = $this->Abbreviation->FormValue;
        $this->Creationdate->CurrentValue = $this->Creationdate->FormValue;
        $this->Creationdate->CurrentValue = UnFormatDateTime($this->Creationdate->CurrentValue, 0);
        $this->Address1->CurrentValue = $this->Address1->FormValue;
        $this->Address2->CurrentValue = $this->Address2->FormValue;
        $this->Address3->CurrentValue = $this->Address3->FormValue;
        $this->Citycode->CurrentValue = $this->Citycode->FormValue;
        $this->State->CurrentValue = $this->State->FormValue;
        $this->Pincode->CurrentValue = $this->Pincode->FormValue;
        $this->Tngstnumber->CurrentValue = $this->Tngstnumber->FormValue;
        $this->Phone->CurrentValue = $this->Phone->FormValue;
        $this->Fax->CurrentValue = $this->Fax->FormValue;
        $this->_Email->CurrentValue = $this->_Email->FormValue;
        $this->Paymentmode->CurrentValue = $this->Paymentmode->FormValue;
        $this->Contactperson1->CurrentValue = $this->Contactperson1->FormValue;
        $this->CP1Address1->CurrentValue = $this->CP1Address1->FormValue;
        $this->CP1Address2->CurrentValue = $this->CP1Address2->FormValue;
        $this->CP1Address3->CurrentValue = $this->CP1Address3->FormValue;
        $this->CP1Citycode->CurrentValue = $this->CP1Citycode->FormValue;
        $this->CP1State->CurrentValue = $this->CP1State->FormValue;
        $this->CP1Pincode->CurrentValue = $this->CP1Pincode->FormValue;
        $this->CP1Designation->CurrentValue = $this->CP1Designation->FormValue;
        $this->CP1Phone->CurrentValue = $this->CP1Phone->FormValue;
        $this->CP1MobileNo->CurrentValue = $this->CP1MobileNo->FormValue;
        $this->CP1Fax->CurrentValue = $this->CP1Fax->FormValue;
        $this->CP1Email->CurrentValue = $this->CP1Email->FormValue;
        $this->Contactperson2->CurrentValue = $this->Contactperson2->FormValue;
        $this->CP2Address1->CurrentValue = $this->CP2Address1->FormValue;
        $this->CP2Address2->CurrentValue = $this->CP2Address2->FormValue;
        $this->CP2Address3->CurrentValue = $this->CP2Address3->FormValue;
        $this->CP2Citycode->CurrentValue = $this->CP2Citycode->FormValue;
        $this->CP2State->CurrentValue = $this->CP2State->FormValue;
        $this->CP2Pincode->CurrentValue = $this->CP2Pincode->FormValue;
        $this->CP2Designation->CurrentValue = $this->CP2Designation->FormValue;
        $this->CP2Phone->CurrentValue = $this->CP2Phone->FormValue;
        $this->CP2MobileNo->CurrentValue = $this->CP2MobileNo->FormValue;
        $this->CP2Fax->CurrentValue = $this->CP2Fax->FormValue;
        $this->CP2Email->CurrentValue = $this->CP2Email->FormValue;
        $this->Type->CurrentValue = $this->Type->FormValue;
        $this->Creditterms->CurrentValue = $this->Creditterms->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->Tinnumber->CurrentValue = $this->Tinnumber->FormValue;
        $this->Universalsuppliercode->CurrentValue = $this->Universalsuppliercode->FormValue;
        $this->Mobilenumber->CurrentValue = $this->Mobilenumber->FormValue;
        $this->PANNumber->CurrentValue = $this->PANNumber->FormValue;
        $this->SalesRepMobileNo->CurrentValue = $this->SalesRepMobileNo->FormValue;
        $this->GSTNumber->CurrentValue = $this->GSTNumber->FormValue;
        $this->TANNumber->CurrentValue = $this->TANNumber->FormValue;
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
        $this->Suppliercode->setDbValue($row['Suppliercode']);
        $this->Suppliername->setDbValue($row['Suppliername']);
        $this->Abbreviation->setDbValue($row['Abbreviation']);
        $this->Creationdate->setDbValue($row['Creationdate']);
        $this->Address1->setDbValue($row['Address1']);
        $this->Address2->setDbValue($row['Address2']);
        $this->Address3->setDbValue($row['Address3']);
        $this->Citycode->setDbValue($row['Citycode']);
        $this->State->setDbValue($row['State']);
        $this->Pincode->setDbValue($row['Pincode']);
        $this->Tngstnumber->setDbValue($row['Tngstnumber']);
        $this->Phone->setDbValue($row['Phone']);
        $this->Fax->setDbValue($row['Fax']);
        $this->_Email->setDbValue($row['Email']);
        $this->Paymentmode->setDbValue($row['Paymentmode']);
        $this->Contactperson1->setDbValue($row['Contactperson1']);
        $this->CP1Address1->setDbValue($row['CP1Address1']);
        $this->CP1Address2->setDbValue($row['CP1Address2']);
        $this->CP1Address3->setDbValue($row['CP1Address3']);
        $this->CP1Citycode->setDbValue($row['CP1Citycode']);
        $this->CP1State->setDbValue($row['CP1State']);
        $this->CP1Pincode->setDbValue($row['CP1Pincode']);
        $this->CP1Designation->setDbValue($row['CP1Designation']);
        $this->CP1Phone->setDbValue($row['CP1Phone']);
        $this->CP1MobileNo->setDbValue($row['CP1MobileNo']);
        $this->CP1Fax->setDbValue($row['CP1Fax']);
        $this->CP1Email->setDbValue($row['CP1Email']);
        $this->Contactperson2->setDbValue($row['Contactperson2']);
        $this->CP2Address1->setDbValue($row['CP2Address1']);
        $this->CP2Address2->setDbValue($row['CP2Address2']);
        $this->CP2Address3->setDbValue($row['CP2Address3']);
        $this->CP2Citycode->setDbValue($row['CP2Citycode']);
        $this->CP2State->setDbValue($row['CP2State']);
        $this->CP2Pincode->setDbValue($row['CP2Pincode']);
        $this->CP2Designation->setDbValue($row['CP2Designation']);
        $this->CP2Phone->setDbValue($row['CP2Phone']);
        $this->CP2MobileNo->setDbValue($row['CP2MobileNo']);
        $this->CP2Fax->setDbValue($row['CP2Fax']);
        $this->CP2Email->setDbValue($row['CP2Email']);
        $this->Type->setDbValue($row['Type']);
        $this->Creditterms->setDbValue($row['Creditterms']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->Tinnumber->setDbValue($row['Tinnumber']);
        $this->Universalsuppliercode->setDbValue($row['Universalsuppliercode']);
        $this->Mobilenumber->setDbValue($row['Mobilenumber']);
        $this->PANNumber->setDbValue($row['PANNumber']);
        $this->SalesRepMobileNo->setDbValue($row['SalesRepMobileNo']);
        $this->GSTNumber->setDbValue($row['GSTNumber']);
        $this->TANNumber->setDbValue($row['TANNumber']);
        $this->id->setDbValue($row['id']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['Suppliercode'] = null;
        $row['Suppliername'] = null;
        $row['Abbreviation'] = null;
        $row['Creationdate'] = null;
        $row['Address1'] = null;
        $row['Address2'] = null;
        $row['Address3'] = null;
        $row['Citycode'] = null;
        $row['State'] = null;
        $row['Pincode'] = null;
        $row['Tngstnumber'] = null;
        $row['Phone'] = null;
        $row['Fax'] = null;
        $row['Email'] = null;
        $row['Paymentmode'] = null;
        $row['Contactperson1'] = null;
        $row['CP1Address1'] = null;
        $row['CP1Address2'] = null;
        $row['CP1Address3'] = null;
        $row['CP1Citycode'] = null;
        $row['CP1State'] = null;
        $row['CP1Pincode'] = null;
        $row['CP1Designation'] = null;
        $row['CP1Phone'] = null;
        $row['CP1MobileNo'] = null;
        $row['CP1Fax'] = null;
        $row['CP1Email'] = null;
        $row['Contactperson2'] = null;
        $row['CP2Address1'] = null;
        $row['CP2Address2'] = null;
        $row['CP2Address3'] = null;
        $row['CP2Citycode'] = null;
        $row['CP2State'] = null;
        $row['CP2Pincode'] = null;
        $row['CP2Designation'] = null;
        $row['CP2Phone'] = null;
        $row['CP2MobileNo'] = null;
        $row['CP2Fax'] = null;
        $row['CP2Email'] = null;
        $row['Type'] = null;
        $row['Creditterms'] = null;
        $row['Remarks'] = null;
        $row['Tinnumber'] = null;
        $row['Universalsuppliercode'] = null;
        $row['Mobilenumber'] = null;
        $row['PANNumber'] = null;
        $row['SalesRepMobileNo'] = null;
        $row['GSTNumber'] = null;
        $row['TANNumber'] = null;
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

        // Suppliercode

        // Suppliername

        // Abbreviation

        // Creationdate

        // Address1

        // Address2

        // Address3

        // Citycode

        // State

        // Pincode

        // Tngstnumber

        // Phone

        // Fax

        // Email

        // Paymentmode

        // Contactperson1

        // CP1Address1

        // CP1Address2

        // CP1Address3

        // CP1Citycode

        // CP1State

        // CP1Pincode

        // CP1Designation

        // CP1Phone

        // CP1MobileNo

        // CP1Fax

        // CP1Email

        // Contactperson2

        // CP2Address1

        // CP2Address2

        // CP2Address3

        // CP2Citycode

        // CP2State

        // CP2Pincode

        // CP2Designation

        // CP2Phone

        // CP2MobileNo

        // CP2Fax

        // CP2Email

        // Type

        // Creditterms

        // Remarks

        // Tinnumber

        // Universalsuppliercode

        // Mobilenumber

        // PANNumber

        // SalesRepMobileNo

        // GSTNumber

        // TANNumber

        // id
        if ($this->RowType == ROWTYPE_VIEW) {
            // Suppliercode
            $this->Suppliercode->ViewValue = $this->Suppliercode->CurrentValue;
            $this->Suppliercode->ViewCustomAttributes = "";

            // Suppliername
            $this->Suppliername->ViewValue = $this->Suppliername->CurrentValue;
            $this->Suppliername->ViewCustomAttributes = "";

            // Abbreviation
            $this->Abbreviation->ViewValue = $this->Abbreviation->CurrentValue;
            $this->Abbreviation->ViewCustomAttributes = "";

            // Creationdate
            $this->Creationdate->ViewValue = $this->Creationdate->CurrentValue;
            $this->Creationdate->ViewValue = FormatDateTime($this->Creationdate->ViewValue, 0);
            $this->Creationdate->ViewCustomAttributes = "";

            // Address1
            $this->Address1->ViewValue = $this->Address1->CurrentValue;
            $this->Address1->ViewCustomAttributes = "";

            // Address2
            $this->Address2->ViewValue = $this->Address2->CurrentValue;
            $this->Address2->ViewCustomAttributes = "";

            // Address3
            $this->Address3->ViewValue = $this->Address3->CurrentValue;
            $this->Address3->ViewCustomAttributes = "";

            // Citycode
            $this->Citycode->ViewValue = $this->Citycode->CurrentValue;
            $this->Citycode->ViewValue = FormatNumber($this->Citycode->ViewValue, 0, -2, -2, -2);
            $this->Citycode->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Pincode
            $this->Pincode->ViewValue = $this->Pincode->CurrentValue;
            $this->Pincode->ViewCustomAttributes = "";

            // Tngstnumber
            $this->Tngstnumber->ViewValue = $this->Tngstnumber->CurrentValue;
            $this->Tngstnumber->ViewCustomAttributes = "";

            // Phone
            $this->Phone->ViewValue = $this->Phone->CurrentValue;
            $this->Phone->ViewCustomAttributes = "";

            // Fax
            $this->Fax->ViewValue = $this->Fax->CurrentValue;
            $this->Fax->ViewCustomAttributes = "";

            // Email
            $this->_Email->ViewValue = $this->_Email->CurrentValue;
            $this->_Email->ViewCustomAttributes = "";

            // Paymentmode
            $this->Paymentmode->ViewValue = $this->Paymentmode->CurrentValue;
            $this->Paymentmode->ViewCustomAttributes = "";

            // Contactperson1
            $this->Contactperson1->ViewValue = $this->Contactperson1->CurrentValue;
            $this->Contactperson1->ViewCustomAttributes = "";

            // CP1Address1
            $this->CP1Address1->ViewValue = $this->CP1Address1->CurrentValue;
            $this->CP1Address1->ViewCustomAttributes = "";

            // CP1Address2
            $this->CP1Address2->ViewValue = $this->CP1Address2->CurrentValue;
            $this->CP1Address2->ViewCustomAttributes = "";

            // CP1Address3
            $this->CP1Address3->ViewValue = $this->CP1Address3->CurrentValue;
            $this->CP1Address3->ViewCustomAttributes = "";

            // CP1Citycode
            $this->CP1Citycode->ViewValue = $this->CP1Citycode->CurrentValue;
            $this->CP1Citycode->ViewValue = FormatNumber($this->CP1Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP1Citycode->ViewCustomAttributes = "";

            // CP1State
            $this->CP1State->ViewValue = $this->CP1State->CurrentValue;
            $this->CP1State->ViewCustomAttributes = "";

            // CP1Pincode
            $this->CP1Pincode->ViewValue = $this->CP1Pincode->CurrentValue;
            $this->CP1Pincode->ViewCustomAttributes = "";

            // CP1Designation
            $this->CP1Designation->ViewValue = $this->CP1Designation->CurrentValue;
            $this->CP1Designation->ViewCustomAttributes = "";

            // CP1Phone
            $this->CP1Phone->ViewValue = $this->CP1Phone->CurrentValue;
            $this->CP1Phone->ViewCustomAttributes = "";

            // CP1MobileNo
            $this->CP1MobileNo->ViewValue = $this->CP1MobileNo->CurrentValue;
            $this->CP1MobileNo->ViewCustomAttributes = "";

            // CP1Fax
            $this->CP1Fax->ViewValue = $this->CP1Fax->CurrentValue;
            $this->CP1Fax->ViewCustomAttributes = "";

            // CP1Email
            $this->CP1Email->ViewValue = $this->CP1Email->CurrentValue;
            $this->CP1Email->ViewCustomAttributes = "";

            // Contactperson2
            $this->Contactperson2->ViewValue = $this->Contactperson2->CurrentValue;
            $this->Contactperson2->ViewCustomAttributes = "";

            // CP2Address1
            $this->CP2Address1->ViewValue = $this->CP2Address1->CurrentValue;
            $this->CP2Address1->ViewCustomAttributes = "";

            // CP2Address2
            $this->CP2Address2->ViewValue = $this->CP2Address2->CurrentValue;
            $this->CP2Address2->ViewCustomAttributes = "";

            // CP2Address3
            $this->CP2Address3->ViewValue = $this->CP2Address3->CurrentValue;
            $this->CP2Address3->ViewCustomAttributes = "";

            // CP2Citycode
            $this->CP2Citycode->ViewValue = $this->CP2Citycode->CurrentValue;
            $this->CP2Citycode->ViewValue = FormatNumber($this->CP2Citycode->ViewValue, 0, -2, -2, -2);
            $this->CP2Citycode->ViewCustomAttributes = "";

            // CP2State
            $this->CP2State->ViewValue = $this->CP2State->CurrentValue;
            $this->CP2State->ViewCustomAttributes = "";

            // CP2Pincode
            $this->CP2Pincode->ViewValue = $this->CP2Pincode->CurrentValue;
            $this->CP2Pincode->ViewCustomAttributes = "";

            // CP2Designation
            $this->CP2Designation->ViewValue = $this->CP2Designation->CurrentValue;
            $this->CP2Designation->ViewCustomAttributes = "";

            // CP2Phone
            $this->CP2Phone->ViewValue = $this->CP2Phone->CurrentValue;
            $this->CP2Phone->ViewCustomAttributes = "";

            // CP2MobileNo
            $this->CP2MobileNo->ViewValue = $this->CP2MobileNo->CurrentValue;
            $this->CP2MobileNo->ViewCustomAttributes = "";

            // CP2Fax
            $this->CP2Fax->ViewValue = $this->CP2Fax->CurrentValue;
            $this->CP2Fax->ViewCustomAttributes = "";

            // CP2Email
            $this->CP2Email->ViewValue = $this->CP2Email->CurrentValue;
            $this->CP2Email->ViewCustomAttributes = "";

            // Type
            $this->Type->ViewValue = $this->Type->CurrentValue;
            $this->Type->ViewCustomAttributes = "";

            // Creditterms
            $this->Creditterms->ViewValue = $this->Creditterms->CurrentValue;
            $this->Creditterms->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // Tinnumber
            $this->Tinnumber->ViewValue = $this->Tinnumber->CurrentValue;
            $this->Tinnumber->ViewCustomAttributes = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->ViewValue = $this->Universalsuppliercode->CurrentValue;
            $this->Universalsuppliercode->ViewCustomAttributes = "";

            // Mobilenumber
            $this->Mobilenumber->ViewValue = $this->Mobilenumber->CurrentValue;
            $this->Mobilenumber->ViewCustomAttributes = "";

            // PANNumber
            $this->PANNumber->ViewValue = $this->PANNumber->CurrentValue;
            $this->PANNumber->ViewCustomAttributes = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->ViewValue = $this->SalesRepMobileNo->CurrentValue;
            $this->SalesRepMobileNo->ViewCustomAttributes = "";

            // GSTNumber
            $this->GSTNumber->ViewValue = $this->GSTNumber->CurrentValue;
            $this->GSTNumber->ViewCustomAttributes = "";

            // TANNumber
            $this->TANNumber->ViewValue = $this->TANNumber->CurrentValue;
            $this->TANNumber->ViewCustomAttributes = "";

            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Suppliercode
            $this->Suppliercode->LinkCustomAttributes = "";
            $this->Suppliercode->HrefValue = "";
            $this->Suppliercode->TooltipValue = "";

            // Suppliername
            $this->Suppliername->LinkCustomAttributes = "";
            $this->Suppliername->HrefValue = "";
            $this->Suppliername->TooltipValue = "";

            // Abbreviation
            $this->Abbreviation->LinkCustomAttributes = "";
            $this->Abbreviation->HrefValue = "";
            $this->Abbreviation->TooltipValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";
            $this->Creationdate->TooltipValue = "";

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

            // Citycode
            $this->Citycode->LinkCustomAttributes = "";
            $this->Citycode->HrefValue = "";
            $this->Citycode->TooltipValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";
            $this->Pincode->TooltipValue = "";

            // Tngstnumber
            $this->Tngstnumber->LinkCustomAttributes = "";
            $this->Tngstnumber->HrefValue = "";
            $this->Tngstnumber->TooltipValue = "";

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

            // Paymentmode
            $this->Paymentmode->LinkCustomAttributes = "";
            $this->Paymentmode->HrefValue = "";
            $this->Paymentmode->TooltipValue = "";

            // Contactperson1
            $this->Contactperson1->LinkCustomAttributes = "";
            $this->Contactperson1->HrefValue = "";
            $this->Contactperson1->TooltipValue = "";

            // CP1Address1
            $this->CP1Address1->LinkCustomAttributes = "";
            $this->CP1Address1->HrefValue = "";
            $this->CP1Address1->TooltipValue = "";

            // CP1Address2
            $this->CP1Address2->LinkCustomAttributes = "";
            $this->CP1Address2->HrefValue = "";
            $this->CP1Address2->TooltipValue = "";

            // CP1Address3
            $this->CP1Address3->LinkCustomAttributes = "";
            $this->CP1Address3->HrefValue = "";
            $this->CP1Address3->TooltipValue = "";

            // CP1Citycode
            $this->CP1Citycode->LinkCustomAttributes = "";
            $this->CP1Citycode->HrefValue = "";
            $this->CP1Citycode->TooltipValue = "";

            // CP1State
            $this->CP1State->LinkCustomAttributes = "";
            $this->CP1State->HrefValue = "";
            $this->CP1State->TooltipValue = "";

            // CP1Pincode
            $this->CP1Pincode->LinkCustomAttributes = "";
            $this->CP1Pincode->HrefValue = "";
            $this->CP1Pincode->TooltipValue = "";

            // CP1Designation
            $this->CP1Designation->LinkCustomAttributes = "";
            $this->CP1Designation->HrefValue = "";
            $this->CP1Designation->TooltipValue = "";

            // CP1Phone
            $this->CP1Phone->LinkCustomAttributes = "";
            $this->CP1Phone->HrefValue = "";
            $this->CP1Phone->TooltipValue = "";

            // CP1MobileNo
            $this->CP1MobileNo->LinkCustomAttributes = "";
            $this->CP1MobileNo->HrefValue = "";
            $this->CP1MobileNo->TooltipValue = "";

            // CP1Fax
            $this->CP1Fax->LinkCustomAttributes = "";
            $this->CP1Fax->HrefValue = "";
            $this->CP1Fax->TooltipValue = "";

            // CP1Email
            $this->CP1Email->LinkCustomAttributes = "";
            $this->CP1Email->HrefValue = "";
            $this->CP1Email->TooltipValue = "";

            // Contactperson2
            $this->Contactperson2->LinkCustomAttributes = "";
            $this->Contactperson2->HrefValue = "";
            $this->Contactperson2->TooltipValue = "";

            // CP2Address1
            $this->CP2Address1->LinkCustomAttributes = "";
            $this->CP2Address1->HrefValue = "";
            $this->CP2Address1->TooltipValue = "";

            // CP2Address2
            $this->CP2Address2->LinkCustomAttributes = "";
            $this->CP2Address2->HrefValue = "";
            $this->CP2Address2->TooltipValue = "";

            // CP2Address3
            $this->CP2Address3->LinkCustomAttributes = "";
            $this->CP2Address3->HrefValue = "";
            $this->CP2Address3->TooltipValue = "";

            // CP2Citycode
            $this->CP2Citycode->LinkCustomAttributes = "";
            $this->CP2Citycode->HrefValue = "";
            $this->CP2Citycode->TooltipValue = "";

            // CP2State
            $this->CP2State->LinkCustomAttributes = "";
            $this->CP2State->HrefValue = "";
            $this->CP2State->TooltipValue = "";

            // CP2Pincode
            $this->CP2Pincode->LinkCustomAttributes = "";
            $this->CP2Pincode->HrefValue = "";
            $this->CP2Pincode->TooltipValue = "";

            // CP2Designation
            $this->CP2Designation->LinkCustomAttributes = "";
            $this->CP2Designation->HrefValue = "";
            $this->CP2Designation->TooltipValue = "";

            // CP2Phone
            $this->CP2Phone->LinkCustomAttributes = "";
            $this->CP2Phone->HrefValue = "";
            $this->CP2Phone->TooltipValue = "";

            // CP2MobileNo
            $this->CP2MobileNo->LinkCustomAttributes = "";
            $this->CP2MobileNo->HrefValue = "";
            $this->CP2MobileNo->TooltipValue = "";

            // CP2Fax
            $this->CP2Fax->LinkCustomAttributes = "";
            $this->CP2Fax->HrefValue = "";
            $this->CP2Fax->TooltipValue = "";

            // CP2Email
            $this->CP2Email->LinkCustomAttributes = "";
            $this->CP2Email->HrefValue = "";
            $this->CP2Email->TooltipValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";
            $this->Type->TooltipValue = "";

            // Creditterms
            $this->Creditterms->LinkCustomAttributes = "";
            $this->Creditterms->HrefValue = "";
            $this->Creditterms->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // Tinnumber
            $this->Tinnumber->LinkCustomAttributes = "";
            $this->Tinnumber->HrefValue = "";
            $this->Tinnumber->TooltipValue = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->LinkCustomAttributes = "";
            $this->Universalsuppliercode->HrefValue = "";
            $this->Universalsuppliercode->TooltipValue = "";

            // Mobilenumber
            $this->Mobilenumber->LinkCustomAttributes = "";
            $this->Mobilenumber->HrefValue = "";
            $this->Mobilenumber->TooltipValue = "";

            // PANNumber
            $this->PANNumber->LinkCustomAttributes = "";
            $this->PANNumber->HrefValue = "";
            $this->PANNumber->TooltipValue = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->LinkCustomAttributes = "";
            $this->SalesRepMobileNo->HrefValue = "";
            $this->SalesRepMobileNo->TooltipValue = "";

            // GSTNumber
            $this->GSTNumber->LinkCustomAttributes = "";
            $this->GSTNumber->HrefValue = "";
            $this->GSTNumber->TooltipValue = "";

            // TANNumber
            $this->TANNumber->LinkCustomAttributes = "";
            $this->TANNumber->HrefValue = "";
            $this->TANNumber->TooltipValue = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // Suppliercode
            $this->Suppliercode->EditAttrs["class"] = "form-control";
            $this->Suppliercode->EditCustomAttributes = "";
            if (!$this->Suppliercode->Raw) {
                $this->Suppliercode->CurrentValue = HtmlDecode($this->Suppliercode->CurrentValue);
            }
            $this->Suppliercode->EditValue = HtmlEncode($this->Suppliercode->CurrentValue);
            $this->Suppliercode->PlaceHolder = RemoveHtml($this->Suppliercode->caption());

            // Suppliername
            $this->Suppliername->EditAttrs["class"] = "form-control";
            $this->Suppliername->EditCustomAttributes = "";
            if (!$this->Suppliername->Raw) {
                $this->Suppliername->CurrentValue = HtmlDecode($this->Suppliername->CurrentValue);
            }
            $this->Suppliername->EditValue = HtmlEncode($this->Suppliername->CurrentValue);
            $this->Suppliername->PlaceHolder = RemoveHtml($this->Suppliername->caption());

            // Abbreviation
            $this->Abbreviation->EditAttrs["class"] = "form-control";
            $this->Abbreviation->EditCustomAttributes = "";
            if (!$this->Abbreviation->Raw) {
                $this->Abbreviation->CurrentValue = HtmlDecode($this->Abbreviation->CurrentValue);
            }
            $this->Abbreviation->EditValue = HtmlEncode($this->Abbreviation->CurrentValue);
            $this->Abbreviation->PlaceHolder = RemoveHtml($this->Abbreviation->caption());

            // Creationdate
            $this->Creationdate->EditAttrs["class"] = "form-control";
            $this->Creationdate->EditCustomAttributes = "";
            $this->Creationdate->EditValue = HtmlEncode(FormatDateTime($this->Creationdate->CurrentValue, 8));
            $this->Creationdate->PlaceHolder = RemoveHtml($this->Creationdate->caption());

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

            // Citycode
            $this->Citycode->EditAttrs["class"] = "form-control";
            $this->Citycode->EditCustomAttributes = "";
            $this->Citycode->EditValue = HtmlEncode($this->Citycode->CurrentValue);
            $this->Citycode->PlaceHolder = RemoveHtml($this->Citycode->caption());

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

            // Tngstnumber
            $this->Tngstnumber->EditAttrs["class"] = "form-control";
            $this->Tngstnumber->EditCustomAttributes = "";
            if (!$this->Tngstnumber->Raw) {
                $this->Tngstnumber->CurrentValue = HtmlDecode($this->Tngstnumber->CurrentValue);
            }
            $this->Tngstnumber->EditValue = HtmlEncode($this->Tngstnumber->CurrentValue);
            $this->Tngstnumber->PlaceHolder = RemoveHtml($this->Tngstnumber->caption());

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

            // Paymentmode
            $this->Paymentmode->EditAttrs["class"] = "form-control";
            $this->Paymentmode->EditCustomAttributes = "";
            if (!$this->Paymentmode->Raw) {
                $this->Paymentmode->CurrentValue = HtmlDecode($this->Paymentmode->CurrentValue);
            }
            $this->Paymentmode->EditValue = HtmlEncode($this->Paymentmode->CurrentValue);
            $this->Paymentmode->PlaceHolder = RemoveHtml($this->Paymentmode->caption());

            // Contactperson1
            $this->Contactperson1->EditAttrs["class"] = "form-control";
            $this->Contactperson1->EditCustomAttributes = "";
            if (!$this->Contactperson1->Raw) {
                $this->Contactperson1->CurrentValue = HtmlDecode($this->Contactperson1->CurrentValue);
            }
            $this->Contactperson1->EditValue = HtmlEncode($this->Contactperson1->CurrentValue);
            $this->Contactperson1->PlaceHolder = RemoveHtml($this->Contactperson1->caption());

            // CP1Address1
            $this->CP1Address1->EditAttrs["class"] = "form-control";
            $this->CP1Address1->EditCustomAttributes = "";
            if (!$this->CP1Address1->Raw) {
                $this->CP1Address1->CurrentValue = HtmlDecode($this->CP1Address1->CurrentValue);
            }
            $this->CP1Address1->EditValue = HtmlEncode($this->CP1Address1->CurrentValue);
            $this->CP1Address1->PlaceHolder = RemoveHtml($this->CP1Address1->caption());

            // CP1Address2
            $this->CP1Address2->EditAttrs["class"] = "form-control";
            $this->CP1Address2->EditCustomAttributes = "";
            if (!$this->CP1Address2->Raw) {
                $this->CP1Address2->CurrentValue = HtmlDecode($this->CP1Address2->CurrentValue);
            }
            $this->CP1Address2->EditValue = HtmlEncode($this->CP1Address2->CurrentValue);
            $this->CP1Address2->PlaceHolder = RemoveHtml($this->CP1Address2->caption());

            // CP1Address3
            $this->CP1Address3->EditAttrs["class"] = "form-control";
            $this->CP1Address3->EditCustomAttributes = "";
            if (!$this->CP1Address3->Raw) {
                $this->CP1Address3->CurrentValue = HtmlDecode($this->CP1Address3->CurrentValue);
            }
            $this->CP1Address3->EditValue = HtmlEncode($this->CP1Address3->CurrentValue);
            $this->CP1Address3->PlaceHolder = RemoveHtml($this->CP1Address3->caption());

            // CP1Citycode
            $this->CP1Citycode->EditAttrs["class"] = "form-control";
            $this->CP1Citycode->EditCustomAttributes = "";
            $this->CP1Citycode->EditValue = HtmlEncode($this->CP1Citycode->CurrentValue);
            $this->CP1Citycode->PlaceHolder = RemoveHtml($this->CP1Citycode->caption());

            // CP1State
            $this->CP1State->EditAttrs["class"] = "form-control";
            $this->CP1State->EditCustomAttributes = "";
            if (!$this->CP1State->Raw) {
                $this->CP1State->CurrentValue = HtmlDecode($this->CP1State->CurrentValue);
            }
            $this->CP1State->EditValue = HtmlEncode($this->CP1State->CurrentValue);
            $this->CP1State->PlaceHolder = RemoveHtml($this->CP1State->caption());

            // CP1Pincode
            $this->CP1Pincode->EditAttrs["class"] = "form-control";
            $this->CP1Pincode->EditCustomAttributes = "";
            if (!$this->CP1Pincode->Raw) {
                $this->CP1Pincode->CurrentValue = HtmlDecode($this->CP1Pincode->CurrentValue);
            }
            $this->CP1Pincode->EditValue = HtmlEncode($this->CP1Pincode->CurrentValue);
            $this->CP1Pincode->PlaceHolder = RemoveHtml($this->CP1Pincode->caption());

            // CP1Designation
            $this->CP1Designation->EditAttrs["class"] = "form-control";
            $this->CP1Designation->EditCustomAttributes = "";
            if (!$this->CP1Designation->Raw) {
                $this->CP1Designation->CurrentValue = HtmlDecode($this->CP1Designation->CurrentValue);
            }
            $this->CP1Designation->EditValue = HtmlEncode($this->CP1Designation->CurrentValue);
            $this->CP1Designation->PlaceHolder = RemoveHtml($this->CP1Designation->caption());

            // CP1Phone
            $this->CP1Phone->EditAttrs["class"] = "form-control";
            $this->CP1Phone->EditCustomAttributes = "";
            if (!$this->CP1Phone->Raw) {
                $this->CP1Phone->CurrentValue = HtmlDecode($this->CP1Phone->CurrentValue);
            }
            $this->CP1Phone->EditValue = HtmlEncode($this->CP1Phone->CurrentValue);
            $this->CP1Phone->PlaceHolder = RemoveHtml($this->CP1Phone->caption());

            // CP1MobileNo
            $this->CP1MobileNo->EditAttrs["class"] = "form-control";
            $this->CP1MobileNo->EditCustomAttributes = "";
            if (!$this->CP1MobileNo->Raw) {
                $this->CP1MobileNo->CurrentValue = HtmlDecode($this->CP1MobileNo->CurrentValue);
            }
            $this->CP1MobileNo->EditValue = HtmlEncode($this->CP1MobileNo->CurrentValue);
            $this->CP1MobileNo->PlaceHolder = RemoveHtml($this->CP1MobileNo->caption());

            // CP1Fax
            $this->CP1Fax->EditAttrs["class"] = "form-control";
            $this->CP1Fax->EditCustomAttributes = "";
            if (!$this->CP1Fax->Raw) {
                $this->CP1Fax->CurrentValue = HtmlDecode($this->CP1Fax->CurrentValue);
            }
            $this->CP1Fax->EditValue = HtmlEncode($this->CP1Fax->CurrentValue);
            $this->CP1Fax->PlaceHolder = RemoveHtml($this->CP1Fax->caption());

            // CP1Email
            $this->CP1Email->EditAttrs["class"] = "form-control";
            $this->CP1Email->EditCustomAttributes = "";
            if (!$this->CP1Email->Raw) {
                $this->CP1Email->CurrentValue = HtmlDecode($this->CP1Email->CurrentValue);
            }
            $this->CP1Email->EditValue = HtmlEncode($this->CP1Email->CurrentValue);
            $this->CP1Email->PlaceHolder = RemoveHtml($this->CP1Email->caption());

            // Contactperson2
            $this->Contactperson2->EditAttrs["class"] = "form-control";
            $this->Contactperson2->EditCustomAttributes = "";
            if (!$this->Contactperson2->Raw) {
                $this->Contactperson2->CurrentValue = HtmlDecode($this->Contactperson2->CurrentValue);
            }
            $this->Contactperson2->EditValue = HtmlEncode($this->Contactperson2->CurrentValue);
            $this->Contactperson2->PlaceHolder = RemoveHtml($this->Contactperson2->caption());

            // CP2Address1
            $this->CP2Address1->EditAttrs["class"] = "form-control";
            $this->CP2Address1->EditCustomAttributes = "";
            if (!$this->CP2Address1->Raw) {
                $this->CP2Address1->CurrentValue = HtmlDecode($this->CP2Address1->CurrentValue);
            }
            $this->CP2Address1->EditValue = HtmlEncode($this->CP2Address1->CurrentValue);
            $this->CP2Address1->PlaceHolder = RemoveHtml($this->CP2Address1->caption());

            // CP2Address2
            $this->CP2Address2->EditAttrs["class"] = "form-control";
            $this->CP2Address2->EditCustomAttributes = "";
            if (!$this->CP2Address2->Raw) {
                $this->CP2Address2->CurrentValue = HtmlDecode($this->CP2Address2->CurrentValue);
            }
            $this->CP2Address2->EditValue = HtmlEncode($this->CP2Address2->CurrentValue);
            $this->CP2Address2->PlaceHolder = RemoveHtml($this->CP2Address2->caption());

            // CP2Address3
            $this->CP2Address3->EditAttrs["class"] = "form-control";
            $this->CP2Address3->EditCustomAttributes = "";
            if (!$this->CP2Address3->Raw) {
                $this->CP2Address3->CurrentValue = HtmlDecode($this->CP2Address3->CurrentValue);
            }
            $this->CP2Address3->EditValue = HtmlEncode($this->CP2Address3->CurrentValue);
            $this->CP2Address3->PlaceHolder = RemoveHtml($this->CP2Address3->caption());

            // CP2Citycode
            $this->CP2Citycode->EditAttrs["class"] = "form-control";
            $this->CP2Citycode->EditCustomAttributes = "";
            $this->CP2Citycode->EditValue = HtmlEncode($this->CP2Citycode->CurrentValue);
            $this->CP2Citycode->PlaceHolder = RemoveHtml($this->CP2Citycode->caption());

            // CP2State
            $this->CP2State->EditAttrs["class"] = "form-control";
            $this->CP2State->EditCustomAttributes = "";
            if (!$this->CP2State->Raw) {
                $this->CP2State->CurrentValue = HtmlDecode($this->CP2State->CurrentValue);
            }
            $this->CP2State->EditValue = HtmlEncode($this->CP2State->CurrentValue);
            $this->CP2State->PlaceHolder = RemoveHtml($this->CP2State->caption());

            // CP2Pincode
            $this->CP2Pincode->EditAttrs["class"] = "form-control";
            $this->CP2Pincode->EditCustomAttributes = "";
            if (!$this->CP2Pincode->Raw) {
                $this->CP2Pincode->CurrentValue = HtmlDecode($this->CP2Pincode->CurrentValue);
            }
            $this->CP2Pincode->EditValue = HtmlEncode($this->CP2Pincode->CurrentValue);
            $this->CP2Pincode->PlaceHolder = RemoveHtml($this->CP2Pincode->caption());

            // CP2Designation
            $this->CP2Designation->EditAttrs["class"] = "form-control";
            $this->CP2Designation->EditCustomAttributes = "";
            if (!$this->CP2Designation->Raw) {
                $this->CP2Designation->CurrentValue = HtmlDecode($this->CP2Designation->CurrentValue);
            }
            $this->CP2Designation->EditValue = HtmlEncode($this->CP2Designation->CurrentValue);
            $this->CP2Designation->PlaceHolder = RemoveHtml($this->CP2Designation->caption());

            // CP2Phone
            $this->CP2Phone->EditAttrs["class"] = "form-control";
            $this->CP2Phone->EditCustomAttributes = "";
            if (!$this->CP2Phone->Raw) {
                $this->CP2Phone->CurrentValue = HtmlDecode($this->CP2Phone->CurrentValue);
            }
            $this->CP2Phone->EditValue = HtmlEncode($this->CP2Phone->CurrentValue);
            $this->CP2Phone->PlaceHolder = RemoveHtml($this->CP2Phone->caption());

            // CP2MobileNo
            $this->CP2MobileNo->EditAttrs["class"] = "form-control";
            $this->CP2MobileNo->EditCustomAttributes = "";
            if (!$this->CP2MobileNo->Raw) {
                $this->CP2MobileNo->CurrentValue = HtmlDecode($this->CP2MobileNo->CurrentValue);
            }
            $this->CP2MobileNo->EditValue = HtmlEncode($this->CP2MobileNo->CurrentValue);
            $this->CP2MobileNo->PlaceHolder = RemoveHtml($this->CP2MobileNo->caption());

            // CP2Fax
            $this->CP2Fax->EditAttrs["class"] = "form-control";
            $this->CP2Fax->EditCustomAttributes = "";
            if (!$this->CP2Fax->Raw) {
                $this->CP2Fax->CurrentValue = HtmlDecode($this->CP2Fax->CurrentValue);
            }
            $this->CP2Fax->EditValue = HtmlEncode($this->CP2Fax->CurrentValue);
            $this->CP2Fax->PlaceHolder = RemoveHtml($this->CP2Fax->caption());

            // CP2Email
            $this->CP2Email->EditAttrs["class"] = "form-control";
            $this->CP2Email->EditCustomAttributes = "";
            if (!$this->CP2Email->Raw) {
                $this->CP2Email->CurrentValue = HtmlDecode($this->CP2Email->CurrentValue);
            }
            $this->CP2Email->EditValue = HtmlEncode($this->CP2Email->CurrentValue);
            $this->CP2Email->PlaceHolder = RemoveHtml($this->CP2Email->caption());

            // Type
            $this->Type->EditAttrs["class"] = "form-control";
            $this->Type->EditCustomAttributes = "";
            if (!$this->Type->Raw) {
                $this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
            }
            $this->Type->EditValue = HtmlEncode($this->Type->CurrentValue);
            $this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

            // Creditterms
            $this->Creditterms->EditAttrs["class"] = "form-control";
            $this->Creditterms->EditCustomAttributes = "";
            if (!$this->Creditterms->Raw) {
                $this->Creditterms->CurrentValue = HtmlDecode($this->Creditterms->CurrentValue);
            }
            $this->Creditterms->EditValue = HtmlEncode($this->Creditterms->CurrentValue);
            $this->Creditterms->PlaceHolder = RemoveHtml($this->Creditterms->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // Tinnumber
            $this->Tinnumber->EditAttrs["class"] = "form-control";
            $this->Tinnumber->EditCustomAttributes = "";
            if (!$this->Tinnumber->Raw) {
                $this->Tinnumber->CurrentValue = HtmlDecode($this->Tinnumber->CurrentValue);
            }
            $this->Tinnumber->EditValue = HtmlEncode($this->Tinnumber->CurrentValue);
            $this->Tinnumber->PlaceHolder = RemoveHtml($this->Tinnumber->caption());

            // Universalsuppliercode
            $this->Universalsuppliercode->EditAttrs["class"] = "form-control";
            $this->Universalsuppliercode->EditCustomAttributes = "";
            if (!$this->Universalsuppliercode->Raw) {
                $this->Universalsuppliercode->CurrentValue = HtmlDecode($this->Universalsuppliercode->CurrentValue);
            }
            $this->Universalsuppliercode->EditValue = HtmlEncode($this->Universalsuppliercode->CurrentValue);
            $this->Universalsuppliercode->PlaceHolder = RemoveHtml($this->Universalsuppliercode->caption());

            // Mobilenumber
            $this->Mobilenumber->EditAttrs["class"] = "form-control";
            $this->Mobilenumber->EditCustomAttributes = "";
            if (!$this->Mobilenumber->Raw) {
                $this->Mobilenumber->CurrentValue = HtmlDecode($this->Mobilenumber->CurrentValue);
            }
            $this->Mobilenumber->EditValue = HtmlEncode($this->Mobilenumber->CurrentValue);
            $this->Mobilenumber->PlaceHolder = RemoveHtml($this->Mobilenumber->caption());

            // PANNumber
            $this->PANNumber->EditAttrs["class"] = "form-control";
            $this->PANNumber->EditCustomAttributes = "";
            if (!$this->PANNumber->Raw) {
                $this->PANNumber->CurrentValue = HtmlDecode($this->PANNumber->CurrentValue);
            }
            $this->PANNumber->EditValue = HtmlEncode($this->PANNumber->CurrentValue);
            $this->PANNumber->PlaceHolder = RemoveHtml($this->PANNumber->caption());

            // SalesRepMobileNo
            $this->SalesRepMobileNo->EditAttrs["class"] = "form-control";
            $this->SalesRepMobileNo->EditCustomAttributes = "";
            if (!$this->SalesRepMobileNo->Raw) {
                $this->SalesRepMobileNo->CurrentValue = HtmlDecode($this->SalesRepMobileNo->CurrentValue);
            }
            $this->SalesRepMobileNo->EditValue = HtmlEncode($this->SalesRepMobileNo->CurrentValue);
            $this->SalesRepMobileNo->PlaceHolder = RemoveHtml($this->SalesRepMobileNo->caption());

            // GSTNumber
            $this->GSTNumber->EditAttrs["class"] = "form-control";
            $this->GSTNumber->EditCustomAttributes = "";
            if (!$this->GSTNumber->Raw) {
                $this->GSTNumber->CurrentValue = HtmlDecode($this->GSTNumber->CurrentValue);
            }
            $this->GSTNumber->EditValue = HtmlEncode($this->GSTNumber->CurrentValue);
            $this->GSTNumber->PlaceHolder = RemoveHtml($this->GSTNumber->caption());

            // TANNumber
            $this->TANNumber->EditAttrs["class"] = "form-control";
            $this->TANNumber->EditCustomAttributes = "";
            if (!$this->TANNumber->Raw) {
                $this->TANNumber->CurrentValue = HtmlDecode($this->TANNumber->CurrentValue);
            }
            $this->TANNumber->EditValue = HtmlEncode($this->TANNumber->CurrentValue);
            $this->TANNumber->PlaceHolder = RemoveHtml($this->TANNumber->caption());

            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // Edit refer script

            // Suppliercode
            $this->Suppliercode->LinkCustomAttributes = "";
            $this->Suppliercode->HrefValue = "";

            // Suppliername
            $this->Suppliername->LinkCustomAttributes = "";
            $this->Suppliername->HrefValue = "";

            // Abbreviation
            $this->Abbreviation->LinkCustomAttributes = "";
            $this->Abbreviation->HrefValue = "";

            // Creationdate
            $this->Creationdate->LinkCustomAttributes = "";
            $this->Creationdate->HrefValue = "";

            // Address1
            $this->Address1->LinkCustomAttributes = "";
            $this->Address1->HrefValue = "";

            // Address2
            $this->Address2->LinkCustomAttributes = "";
            $this->Address2->HrefValue = "";

            // Address3
            $this->Address3->LinkCustomAttributes = "";
            $this->Address3->HrefValue = "";

            // Citycode
            $this->Citycode->LinkCustomAttributes = "";
            $this->Citycode->HrefValue = "";

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";

            // Pincode
            $this->Pincode->LinkCustomAttributes = "";
            $this->Pincode->HrefValue = "";

            // Tngstnumber
            $this->Tngstnumber->LinkCustomAttributes = "";
            $this->Tngstnumber->HrefValue = "";

            // Phone
            $this->Phone->LinkCustomAttributes = "";
            $this->Phone->HrefValue = "";

            // Fax
            $this->Fax->LinkCustomAttributes = "";
            $this->Fax->HrefValue = "";

            // Email
            $this->_Email->LinkCustomAttributes = "";
            $this->_Email->HrefValue = "";

            // Paymentmode
            $this->Paymentmode->LinkCustomAttributes = "";
            $this->Paymentmode->HrefValue = "";

            // Contactperson1
            $this->Contactperson1->LinkCustomAttributes = "";
            $this->Contactperson1->HrefValue = "";

            // CP1Address1
            $this->CP1Address1->LinkCustomAttributes = "";
            $this->CP1Address1->HrefValue = "";

            // CP1Address2
            $this->CP1Address2->LinkCustomAttributes = "";
            $this->CP1Address2->HrefValue = "";

            // CP1Address3
            $this->CP1Address3->LinkCustomAttributes = "";
            $this->CP1Address3->HrefValue = "";

            // CP1Citycode
            $this->CP1Citycode->LinkCustomAttributes = "";
            $this->CP1Citycode->HrefValue = "";

            // CP1State
            $this->CP1State->LinkCustomAttributes = "";
            $this->CP1State->HrefValue = "";

            // CP1Pincode
            $this->CP1Pincode->LinkCustomAttributes = "";
            $this->CP1Pincode->HrefValue = "";

            // CP1Designation
            $this->CP1Designation->LinkCustomAttributes = "";
            $this->CP1Designation->HrefValue = "";

            // CP1Phone
            $this->CP1Phone->LinkCustomAttributes = "";
            $this->CP1Phone->HrefValue = "";

            // CP1MobileNo
            $this->CP1MobileNo->LinkCustomAttributes = "";
            $this->CP1MobileNo->HrefValue = "";

            // CP1Fax
            $this->CP1Fax->LinkCustomAttributes = "";
            $this->CP1Fax->HrefValue = "";

            // CP1Email
            $this->CP1Email->LinkCustomAttributes = "";
            $this->CP1Email->HrefValue = "";

            // Contactperson2
            $this->Contactperson2->LinkCustomAttributes = "";
            $this->Contactperson2->HrefValue = "";

            // CP2Address1
            $this->CP2Address1->LinkCustomAttributes = "";
            $this->CP2Address1->HrefValue = "";

            // CP2Address2
            $this->CP2Address2->LinkCustomAttributes = "";
            $this->CP2Address2->HrefValue = "";

            // CP2Address3
            $this->CP2Address3->LinkCustomAttributes = "";
            $this->CP2Address3->HrefValue = "";

            // CP2Citycode
            $this->CP2Citycode->LinkCustomAttributes = "";
            $this->CP2Citycode->HrefValue = "";

            // CP2State
            $this->CP2State->LinkCustomAttributes = "";
            $this->CP2State->HrefValue = "";

            // CP2Pincode
            $this->CP2Pincode->LinkCustomAttributes = "";
            $this->CP2Pincode->HrefValue = "";

            // CP2Designation
            $this->CP2Designation->LinkCustomAttributes = "";
            $this->CP2Designation->HrefValue = "";

            // CP2Phone
            $this->CP2Phone->LinkCustomAttributes = "";
            $this->CP2Phone->HrefValue = "";

            // CP2MobileNo
            $this->CP2MobileNo->LinkCustomAttributes = "";
            $this->CP2MobileNo->HrefValue = "";

            // CP2Fax
            $this->CP2Fax->LinkCustomAttributes = "";
            $this->CP2Fax->HrefValue = "";

            // CP2Email
            $this->CP2Email->LinkCustomAttributes = "";
            $this->CP2Email->HrefValue = "";

            // Type
            $this->Type->LinkCustomAttributes = "";
            $this->Type->HrefValue = "";

            // Creditterms
            $this->Creditterms->LinkCustomAttributes = "";
            $this->Creditterms->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // Tinnumber
            $this->Tinnumber->LinkCustomAttributes = "";
            $this->Tinnumber->HrefValue = "";

            // Universalsuppliercode
            $this->Universalsuppliercode->LinkCustomAttributes = "";
            $this->Universalsuppliercode->HrefValue = "";

            // Mobilenumber
            $this->Mobilenumber->LinkCustomAttributes = "";
            $this->Mobilenumber->HrefValue = "";

            // PANNumber
            $this->PANNumber->LinkCustomAttributes = "";
            $this->PANNumber->HrefValue = "";

            // SalesRepMobileNo
            $this->SalesRepMobileNo->LinkCustomAttributes = "";
            $this->SalesRepMobileNo->HrefValue = "";

            // GSTNumber
            $this->GSTNumber->LinkCustomAttributes = "";
            $this->GSTNumber->HrefValue = "";

            // TANNumber
            $this->TANNumber->LinkCustomAttributes = "";
            $this->TANNumber->HrefValue = "";

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
        if ($this->Suppliercode->Required) {
            if (!$this->Suppliercode->IsDetailKey && EmptyValue($this->Suppliercode->FormValue)) {
                $this->Suppliercode->addErrorMessage(str_replace("%s", $this->Suppliercode->caption(), $this->Suppliercode->RequiredErrorMessage));
            }
        }
        if ($this->Suppliername->Required) {
            if (!$this->Suppliername->IsDetailKey && EmptyValue($this->Suppliername->FormValue)) {
                $this->Suppliername->addErrorMessage(str_replace("%s", $this->Suppliername->caption(), $this->Suppliername->RequiredErrorMessage));
            }
        }
        if ($this->Abbreviation->Required) {
            if (!$this->Abbreviation->IsDetailKey && EmptyValue($this->Abbreviation->FormValue)) {
                $this->Abbreviation->addErrorMessage(str_replace("%s", $this->Abbreviation->caption(), $this->Abbreviation->RequiredErrorMessage));
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
        if ($this->Citycode->Required) {
            if (!$this->Citycode->IsDetailKey && EmptyValue($this->Citycode->FormValue)) {
                $this->Citycode->addErrorMessage(str_replace("%s", $this->Citycode->caption(), $this->Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->Citycode->FormValue)) {
            $this->Citycode->addErrorMessage($this->Citycode->getErrorMessage(false));
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
        if ($this->Tngstnumber->Required) {
            if (!$this->Tngstnumber->IsDetailKey && EmptyValue($this->Tngstnumber->FormValue)) {
                $this->Tngstnumber->addErrorMessage(str_replace("%s", $this->Tngstnumber->caption(), $this->Tngstnumber->RequiredErrorMessage));
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
        if ($this->Paymentmode->Required) {
            if (!$this->Paymentmode->IsDetailKey && EmptyValue($this->Paymentmode->FormValue)) {
                $this->Paymentmode->addErrorMessage(str_replace("%s", $this->Paymentmode->caption(), $this->Paymentmode->RequiredErrorMessage));
            }
        }
        if ($this->Contactperson1->Required) {
            if (!$this->Contactperson1->IsDetailKey && EmptyValue($this->Contactperson1->FormValue)) {
                $this->Contactperson1->addErrorMessage(str_replace("%s", $this->Contactperson1->caption(), $this->Contactperson1->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address1->Required) {
            if (!$this->CP1Address1->IsDetailKey && EmptyValue($this->CP1Address1->FormValue)) {
                $this->CP1Address1->addErrorMessage(str_replace("%s", $this->CP1Address1->caption(), $this->CP1Address1->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address2->Required) {
            if (!$this->CP1Address2->IsDetailKey && EmptyValue($this->CP1Address2->FormValue)) {
                $this->CP1Address2->addErrorMessage(str_replace("%s", $this->CP1Address2->caption(), $this->CP1Address2->RequiredErrorMessage));
            }
        }
        if ($this->CP1Address3->Required) {
            if (!$this->CP1Address3->IsDetailKey && EmptyValue($this->CP1Address3->FormValue)) {
                $this->CP1Address3->addErrorMessage(str_replace("%s", $this->CP1Address3->caption(), $this->CP1Address3->RequiredErrorMessage));
            }
        }
        if ($this->CP1Citycode->Required) {
            if (!$this->CP1Citycode->IsDetailKey && EmptyValue($this->CP1Citycode->FormValue)) {
                $this->CP1Citycode->addErrorMessage(str_replace("%s", $this->CP1Citycode->caption(), $this->CP1Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CP1Citycode->FormValue)) {
            $this->CP1Citycode->addErrorMessage($this->CP1Citycode->getErrorMessage(false));
        }
        if ($this->CP1State->Required) {
            if (!$this->CP1State->IsDetailKey && EmptyValue($this->CP1State->FormValue)) {
                $this->CP1State->addErrorMessage(str_replace("%s", $this->CP1State->caption(), $this->CP1State->RequiredErrorMessage));
            }
        }
        if ($this->CP1Pincode->Required) {
            if (!$this->CP1Pincode->IsDetailKey && EmptyValue($this->CP1Pincode->FormValue)) {
                $this->CP1Pincode->addErrorMessage(str_replace("%s", $this->CP1Pincode->caption(), $this->CP1Pincode->RequiredErrorMessage));
            }
        }
        if ($this->CP1Designation->Required) {
            if (!$this->CP1Designation->IsDetailKey && EmptyValue($this->CP1Designation->FormValue)) {
                $this->CP1Designation->addErrorMessage(str_replace("%s", $this->CP1Designation->caption(), $this->CP1Designation->RequiredErrorMessage));
            }
        }
        if ($this->CP1Phone->Required) {
            if (!$this->CP1Phone->IsDetailKey && EmptyValue($this->CP1Phone->FormValue)) {
                $this->CP1Phone->addErrorMessage(str_replace("%s", $this->CP1Phone->caption(), $this->CP1Phone->RequiredErrorMessage));
            }
        }
        if ($this->CP1MobileNo->Required) {
            if (!$this->CP1MobileNo->IsDetailKey && EmptyValue($this->CP1MobileNo->FormValue)) {
                $this->CP1MobileNo->addErrorMessage(str_replace("%s", $this->CP1MobileNo->caption(), $this->CP1MobileNo->RequiredErrorMessage));
            }
        }
        if ($this->CP1Fax->Required) {
            if (!$this->CP1Fax->IsDetailKey && EmptyValue($this->CP1Fax->FormValue)) {
                $this->CP1Fax->addErrorMessage(str_replace("%s", $this->CP1Fax->caption(), $this->CP1Fax->RequiredErrorMessage));
            }
        }
        if ($this->CP1Email->Required) {
            if (!$this->CP1Email->IsDetailKey && EmptyValue($this->CP1Email->FormValue)) {
                $this->CP1Email->addErrorMessage(str_replace("%s", $this->CP1Email->caption(), $this->CP1Email->RequiredErrorMessage));
            }
        }
        if ($this->Contactperson2->Required) {
            if (!$this->Contactperson2->IsDetailKey && EmptyValue($this->Contactperson2->FormValue)) {
                $this->Contactperson2->addErrorMessage(str_replace("%s", $this->Contactperson2->caption(), $this->Contactperson2->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address1->Required) {
            if (!$this->CP2Address1->IsDetailKey && EmptyValue($this->CP2Address1->FormValue)) {
                $this->CP2Address1->addErrorMessage(str_replace("%s", $this->CP2Address1->caption(), $this->CP2Address1->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address2->Required) {
            if (!$this->CP2Address2->IsDetailKey && EmptyValue($this->CP2Address2->FormValue)) {
                $this->CP2Address2->addErrorMessage(str_replace("%s", $this->CP2Address2->caption(), $this->CP2Address2->RequiredErrorMessage));
            }
        }
        if ($this->CP2Address3->Required) {
            if (!$this->CP2Address3->IsDetailKey && EmptyValue($this->CP2Address3->FormValue)) {
                $this->CP2Address3->addErrorMessage(str_replace("%s", $this->CP2Address3->caption(), $this->CP2Address3->RequiredErrorMessage));
            }
        }
        if ($this->CP2Citycode->Required) {
            if (!$this->CP2Citycode->IsDetailKey && EmptyValue($this->CP2Citycode->FormValue)) {
                $this->CP2Citycode->addErrorMessage(str_replace("%s", $this->CP2Citycode->caption(), $this->CP2Citycode->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->CP2Citycode->FormValue)) {
            $this->CP2Citycode->addErrorMessage($this->CP2Citycode->getErrorMessage(false));
        }
        if ($this->CP2State->Required) {
            if (!$this->CP2State->IsDetailKey && EmptyValue($this->CP2State->FormValue)) {
                $this->CP2State->addErrorMessage(str_replace("%s", $this->CP2State->caption(), $this->CP2State->RequiredErrorMessage));
            }
        }
        if ($this->CP2Pincode->Required) {
            if (!$this->CP2Pincode->IsDetailKey && EmptyValue($this->CP2Pincode->FormValue)) {
                $this->CP2Pincode->addErrorMessage(str_replace("%s", $this->CP2Pincode->caption(), $this->CP2Pincode->RequiredErrorMessage));
            }
        }
        if ($this->CP2Designation->Required) {
            if (!$this->CP2Designation->IsDetailKey && EmptyValue($this->CP2Designation->FormValue)) {
                $this->CP2Designation->addErrorMessage(str_replace("%s", $this->CP2Designation->caption(), $this->CP2Designation->RequiredErrorMessage));
            }
        }
        if ($this->CP2Phone->Required) {
            if (!$this->CP2Phone->IsDetailKey && EmptyValue($this->CP2Phone->FormValue)) {
                $this->CP2Phone->addErrorMessage(str_replace("%s", $this->CP2Phone->caption(), $this->CP2Phone->RequiredErrorMessage));
            }
        }
        if ($this->CP2MobileNo->Required) {
            if (!$this->CP2MobileNo->IsDetailKey && EmptyValue($this->CP2MobileNo->FormValue)) {
                $this->CP2MobileNo->addErrorMessage(str_replace("%s", $this->CP2MobileNo->caption(), $this->CP2MobileNo->RequiredErrorMessage));
            }
        }
        if ($this->CP2Fax->Required) {
            if (!$this->CP2Fax->IsDetailKey && EmptyValue($this->CP2Fax->FormValue)) {
                $this->CP2Fax->addErrorMessage(str_replace("%s", $this->CP2Fax->caption(), $this->CP2Fax->RequiredErrorMessage));
            }
        }
        if ($this->CP2Email->Required) {
            if (!$this->CP2Email->IsDetailKey && EmptyValue($this->CP2Email->FormValue)) {
                $this->CP2Email->addErrorMessage(str_replace("%s", $this->CP2Email->caption(), $this->CP2Email->RequiredErrorMessage));
            }
        }
        if ($this->Type->Required) {
            if (!$this->Type->IsDetailKey && EmptyValue($this->Type->FormValue)) {
                $this->Type->addErrorMessage(str_replace("%s", $this->Type->caption(), $this->Type->RequiredErrorMessage));
            }
        }
        if ($this->Creditterms->Required) {
            if (!$this->Creditterms->IsDetailKey && EmptyValue($this->Creditterms->FormValue)) {
                $this->Creditterms->addErrorMessage(str_replace("%s", $this->Creditterms->caption(), $this->Creditterms->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->Tinnumber->Required) {
            if (!$this->Tinnumber->IsDetailKey && EmptyValue($this->Tinnumber->FormValue)) {
                $this->Tinnumber->addErrorMessage(str_replace("%s", $this->Tinnumber->caption(), $this->Tinnumber->RequiredErrorMessage));
            }
        }
        if ($this->Universalsuppliercode->Required) {
            if (!$this->Universalsuppliercode->IsDetailKey && EmptyValue($this->Universalsuppliercode->FormValue)) {
                $this->Universalsuppliercode->addErrorMessage(str_replace("%s", $this->Universalsuppliercode->caption(), $this->Universalsuppliercode->RequiredErrorMessage));
            }
        }
        if ($this->Mobilenumber->Required) {
            if (!$this->Mobilenumber->IsDetailKey && EmptyValue($this->Mobilenumber->FormValue)) {
                $this->Mobilenumber->addErrorMessage(str_replace("%s", $this->Mobilenumber->caption(), $this->Mobilenumber->RequiredErrorMessage));
            }
        }
        if ($this->PANNumber->Required) {
            if (!$this->PANNumber->IsDetailKey && EmptyValue($this->PANNumber->FormValue)) {
                $this->PANNumber->addErrorMessage(str_replace("%s", $this->PANNumber->caption(), $this->PANNumber->RequiredErrorMessage));
            }
        }
        if ($this->SalesRepMobileNo->Required) {
            if (!$this->SalesRepMobileNo->IsDetailKey && EmptyValue($this->SalesRepMobileNo->FormValue)) {
                $this->SalesRepMobileNo->addErrorMessage(str_replace("%s", $this->SalesRepMobileNo->caption(), $this->SalesRepMobileNo->RequiredErrorMessage));
            }
        }
        if ($this->GSTNumber->Required) {
            if (!$this->GSTNumber->IsDetailKey && EmptyValue($this->GSTNumber->FormValue)) {
                $this->GSTNumber->addErrorMessage(str_replace("%s", $this->GSTNumber->caption(), $this->GSTNumber->RequiredErrorMessage));
            }
        }
        if ($this->TANNumber->Required) {
            if (!$this->TANNumber->IsDetailKey && EmptyValue($this->TANNumber->FormValue)) {
                $this->TANNumber->addErrorMessage(str_replace("%s", $this->TANNumber->caption(), $this->TANNumber->RequiredErrorMessage));
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

            // Suppliercode
            $this->Suppliercode->setDbValueDef($rsnew, $this->Suppliercode->CurrentValue, "", $this->Suppliercode->ReadOnly);

            // Suppliername
            $this->Suppliername->setDbValueDef($rsnew, $this->Suppliername->CurrentValue, "", $this->Suppliername->ReadOnly);

            // Abbreviation
            $this->Abbreviation->setDbValueDef($rsnew, $this->Abbreviation->CurrentValue, null, $this->Abbreviation->ReadOnly);

            // Creationdate
            $this->Creationdate->setDbValueDef($rsnew, UnFormatDateTime($this->Creationdate->CurrentValue, 0), null, $this->Creationdate->ReadOnly);

            // Address1
            $this->Address1->setDbValueDef($rsnew, $this->Address1->CurrentValue, null, $this->Address1->ReadOnly);

            // Address2
            $this->Address2->setDbValueDef($rsnew, $this->Address2->CurrentValue, null, $this->Address2->ReadOnly);

            // Address3
            $this->Address3->setDbValueDef($rsnew, $this->Address3->CurrentValue, null, $this->Address3->ReadOnly);

            // Citycode
            $this->Citycode->setDbValueDef($rsnew, $this->Citycode->CurrentValue, null, $this->Citycode->ReadOnly);

            // State
            $this->State->setDbValueDef($rsnew, $this->State->CurrentValue, null, $this->State->ReadOnly);

            // Pincode
            $this->Pincode->setDbValueDef($rsnew, $this->Pincode->CurrentValue, null, $this->Pincode->ReadOnly);

            // Tngstnumber
            $this->Tngstnumber->setDbValueDef($rsnew, $this->Tngstnumber->CurrentValue, null, $this->Tngstnumber->ReadOnly);

            // Phone
            $this->Phone->setDbValueDef($rsnew, $this->Phone->CurrentValue, null, $this->Phone->ReadOnly);

            // Fax
            $this->Fax->setDbValueDef($rsnew, $this->Fax->CurrentValue, null, $this->Fax->ReadOnly);

            // Email
            $this->_Email->setDbValueDef($rsnew, $this->_Email->CurrentValue, null, $this->_Email->ReadOnly);

            // Paymentmode
            $this->Paymentmode->setDbValueDef($rsnew, $this->Paymentmode->CurrentValue, null, $this->Paymentmode->ReadOnly);

            // Contactperson1
            $this->Contactperson1->setDbValueDef($rsnew, $this->Contactperson1->CurrentValue, null, $this->Contactperson1->ReadOnly);

            // CP1Address1
            $this->CP1Address1->setDbValueDef($rsnew, $this->CP1Address1->CurrentValue, null, $this->CP1Address1->ReadOnly);

            // CP1Address2
            $this->CP1Address2->setDbValueDef($rsnew, $this->CP1Address2->CurrentValue, null, $this->CP1Address2->ReadOnly);

            // CP1Address3
            $this->CP1Address3->setDbValueDef($rsnew, $this->CP1Address3->CurrentValue, null, $this->CP1Address3->ReadOnly);

            // CP1Citycode
            $this->CP1Citycode->setDbValueDef($rsnew, $this->CP1Citycode->CurrentValue, null, $this->CP1Citycode->ReadOnly);

            // CP1State
            $this->CP1State->setDbValueDef($rsnew, $this->CP1State->CurrentValue, null, $this->CP1State->ReadOnly);

            // CP1Pincode
            $this->CP1Pincode->setDbValueDef($rsnew, $this->CP1Pincode->CurrentValue, null, $this->CP1Pincode->ReadOnly);

            // CP1Designation
            $this->CP1Designation->setDbValueDef($rsnew, $this->CP1Designation->CurrentValue, null, $this->CP1Designation->ReadOnly);

            // CP1Phone
            $this->CP1Phone->setDbValueDef($rsnew, $this->CP1Phone->CurrentValue, null, $this->CP1Phone->ReadOnly);

            // CP1MobileNo
            $this->CP1MobileNo->setDbValueDef($rsnew, $this->CP1MobileNo->CurrentValue, null, $this->CP1MobileNo->ReadOnly);

            // CP1Fax
            $this->CP1Fax->setDbValueDef($rsnew, $this->CP1Fax->CurrentValue, null, $this->CP1Fax->ReadOnly);

            // CP1Email
            $this->CP1Email->setDbValueDef($rsnew, $this->CP1Email->CurrentValue, null, $this->CP1Email->ReadOnly);

            // Contactperson2
            $this->Contactperson2->setDbValueDef($rsnew, $this->Contactperson2->CurrentValue, null, $this->Contactperson2->ReadOnly);

            // CP2Address1
            $this->CP2Address1->setDbValueDef($rsnew, $this->CP2Address1->CurrentValue, null, $this->CP2Address1->ReadOnly);

            // CP2Address2
            $this->CP2Address2->setDbValueDef($rsnew, $this->CP2Address2->CurrentValue, null, $this->CP2Address2->ReadOnly);

            // CP2Address3
            $this->CP2Address3->setDbValueDef($rsnew, $this->CP2Address3->CurrentValue, null, $this->CP2Address3->ReadOnly);

            // CP2Citycode
            $this->CP2Citycode->setDbValueDef($rsnew, $this->CP2Citycode->CurrentValue, null, $this->CP2Citycode->ReadOnly);

            // CP2State
            $this->CP2State->setDbValueDef($rsnew, $this->CP2State->CurrentValue, null, $this->CP2State->ReadOnly);

            // CP2Pincode
            $this->CP2Pincode->setDbValueDef($rsnew, $this->CP2Pincode->CurrentValue, null, $this->CP2Pincode->ReadOnly);

            // CP2Designation
            $this->CP2Designation->setDbValueDef($rsnew, $this->CP2Designation->CurrentValue, null, $this->CP2Designation->ReadOnly);

            // CP2Phone
            $this->CP2Phone->setDbValueDef($rsnew, $this->CP2Phone->CurrentValue, null, $this->CP2Phone->ReadOnly);

            // CP2MobileNo
            $this->CP2MobileNo->setDbValueDef($rsnew, $this->CP2MobileNo->CurrentValue, null, $this->CP2MobileNo->ReadOnly);

            // CP2Fax
            $this->CP2Fax->setDbValueDef($rsnew, $this->CP2Fax->CurrentValue, null, $this->CP2Fax->ReadOnly);

            // CP2Email
            $this->CP2Email->setDbValueDef($rsnew, $this->CP2Email->CurrentValue, null, $this->CP2Email->ReadOnly);

            // Type
            $this->Type->setDbValueDef($rsnew, $this->Type->CurrentValue, null, $this->Type->ReadOnly);

            // Creditterms
            $this->Creditterms->setDbValueDef($rsnew, $this->Creditterms->CurrentValue, null, $this->Creditterms->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // Tinnumber
            $this->Tinnumber->setDbValueDef($rsnew, $this->Tinnumber->CurrentValue, null, $this->Tinnumber->ReadOnly);

            // Universalsuppliercode
            $this->Universalsuppliercode->setDbValueDef($rsnew, $this->Universalsuppliercode->CurrentValue, null, $this->Universalsuppliercode->ReadOnly);

            // Mobilenumber
            $this->Mobilenumber->setDbValueDef($rsnew, $this->Mobilenumber->CurrentValue, null, $this->Mobilenumber->ReadOnly);

            // PANNumber
            $this->PANNumber->setDbValueDef($rsnew, $this->PANNumber->CurrentValue, null, $this->PANNumber->ReadOnly);

            // SalesRepMobileNo
            $this->SalesRepMobileNo->setDbValueDef($rsnew, $this->SalesRepMobileNo->CurrentValue, null, $this->SalesRepMobileNo->ReadOnly);

            // GSTNumber
            $this->GSTNumber->setDbValueDef($rsnew, $this->GSTNumber->CurrentValue, null, $this->GSTNumber->ReadOnly);

            // TANNumber
            $this->TANNumber->setDbValueDef($rsnew, $this->TANNumber->CurrentValue, null, $this->TANNumber->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("PharmacySuppliersList"), "", $this->TableVar, true);
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
