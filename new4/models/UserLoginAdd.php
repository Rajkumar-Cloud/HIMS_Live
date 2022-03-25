<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class UserLoginAdd extends UserLogin
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'user_login';

    // Page object name
    public $PageObjName = "UserLoginAdd";

    // Rendering View
    public $RenderingView = false;

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
        global $UserTable;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (user_login)
        if (!isset($GLOBALS["user_login"]) || get_class($GLOBALS["user_login"]) == PROJECT_NAMESPACE . "user_login") {
            $GLOBALS["user_login"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'user_login');
        }

        // Start timer
        $DebugTimer = Container("timer");

        // Debug message
        LoadDebugMessage();

        // Open connection
        $GLOBALS["Conn"] = $GLOBALS["Conn"] ?? $this->getConnection();

        // User table object
        $UserTable = Container("usertable");
    }

    // Get content from stream
    public function getContents($stream = null): string
    {
        global $Response;
        return is_object($Response) ? $Response->getBody() : ob_get_clean();
    }

    // Is lookup
    public function isLookup()
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest()
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup()
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
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
        global $ExportFileName, $TempImages, $DashboardReport, $Response;

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
                $doc = new $class(Container("user_login"));
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
        } else { // Check if response is JSON
            if (StartsString("application/json", $Response->getHeaderLine("Content-type")) && $Response->getBody()->getSize()) { // With JSON response
                $this->clearMessages();
                return;
            }
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
                    if ($pageName == "UserLoginView") {
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
        $lookup = $this->Fields[$fieldName]->Lookup;

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
        $this->User_Name->setVisibility();
        $this->mail_id->setVisibility();
        $this->mobile_no->setVisibility();
        $this->_password->setVisibility();
        $this->email_verified->setVisibility();
        $this->ReportTo->setVisibility();
        $this->_UserLevel->setVisibility();
        $this->CreatedDateTime->setVisibility();
        $this->profilefield->setVisibility();
        $this->_UserID->setVisibility();
        $this->GroupID->setVisibility();
        $this->HospID->setVisibility();
        $this->PharID->setVisibility();
        $this->StoreID->setVisibility();
        $this->OTP->setVisibility();
        $this->_LoginType->setVisibility();
        $this->BranchId->setVisibility();
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
        $this->setupLookupOptions($this->User_Name);
        $this->setupLookupOptions($this->_UserLevel);
        $this->setupLookupOptions($this->HospID);
        $this->setupLookupOptions($this->PharID);
        $this->setupLookupOptions($this->StoreID);

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
            $this->setKey(Post($this->OldKeyName));
            $postBack = true;
        } else {
            // Load key values from QueryString
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $this->CopyRecord = !EmptyValue($this->OldKey);
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
                    $this->terminate("UserLoginList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "UserLoginList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "UserLoginView") {
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
            $this->toClientVar(["tableCaption"], ["caption", "Visible", "Required", "IsInvalid", "Raw"]);

            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            Page_Rendering();

            // Page Render event
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
        $this->User_Name->CurrentValue = null;
        $this->User_Name->OldValue = $this->User_Name->CurrentValue;
        $this->mail_id->CurrentValue = null;
        $this->mail_id->OldValue = $this->mail_id->CurrentValue;
        $this->mobile_no->CurrentValue = null;
        $this->mobile_no->OldValue = $this->mobile_no->CurrentValue;
        $this->_password->CurrentValue = null;
        $this->_password->OldValue = $this->_password->CurrentValue;
        $this->email_verified->CurrentValue = null;
        $this->email_verified->OldValue = $this->email_verified->CurrentValue;
        $this->ReportTo->CurrentValue = null;
        $this->ReportTo->OldValue = $this->ReportTo->CurrentValue;
        $this->_UserLevel->CurrentValue = null;
        $this->_UserLevel->OldValue = $this->_UserLevel->CurrentValue;
        $this->CreatedDateTime->CurrentValue = null;
        $this->CreatedDateTime->OldValue = $this->CreatedDateTime->CurrentValue;
        $this->profilefield->CurrentValue = null;
        $this->profilefield->OldValue = $this->profilefield->CurrentValue;
        $this->_UserID->CurrentValue = null;
        $this->_UserID->OldValue = $this->_UserID->CurrentValue;
        $this->GroupID->CurrentValue = null;
        $this->GroupID->OldValue = $this->GroupID->CurrentValue;
        $this->HospID->CurrentValue = 0;
        $this->PharID->CurrentValue = 0;
        $this->StoreID->CurrentValue = 0;
        $this->OTP->CurrentValue = null;
        $this->OTP->OldValue = $this->OTP->CurrentValue;
        $this->_LoginType->CurrentValue = null;
        $this->_LoginType->OldValue = $this->_LoginType->CurrentValue;
        $this->BranchId->CurrentValue = null;
        $this->BranchId->OldValue = $this->BranchId->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'User_Name' first before field var 'x_User_Name'
        $val = $CurrentForm->hasValue("User_Name") ? $CurrentForm->getValue("User_Name") : $CurrentForm->getValue("x_User_Name");
        if (!$this->User_Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->User_Name->Visible = false; // Disable update for API request
            } else {
                $this->User_Name->setFormValue($val);
            }
        }

        // Check field name 'mail_id' first before field var 'x_mail_id'
        $val = $CurrentForm->hasValue("mail_id") ? $CurrentForm->getValue("mail_id") : $CurrentForm->getValue("x_mail_id");
        if (!$this->mail_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mail_id->Visible = false; // Disable update for API request
            } else {
                $this->mail_id->setFormValue($val);
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

        // Check field name 'password' first before field var 'x__password'
        $val = $CurrentForm->hasValue("password") ? $CurrentForm->getValue("password") : $CurrentForm->getValue("x__password");
        if (!$this->_password->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_password->Visible = false; // Disable update for API request
            } else {
                $this->_password->setFormValue($val);
            }
        }

        // Check field name 'email_verified' first before field var 'x_email_verified'
        $val = $CurrentForm->hasValue("email_verified") ? $CurrentForm->getValue("email_verified") : $CurrentForm->getValue("x_email_verified");
        if (!$this->email_verified->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->email_verified->Visible = false; // Disable update for API request
            } else {
                $this->email_verified->setFormValue($val);
            }
        }

        // Check field name 'ReportTo' first before field var 'x_ReportTo'
        $val = $CurrentForm->hasValue("ReportTo") ? $CurrentForm->getValue("ReportTo") : $CurrentForm->getValue("x_ReportTo");
        if (!$this->ReportTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReportTo->Visible = false; // Disable update for API request
            } else {
                $this->ReportTo->setFormValue($val);
            }
        }

        // Check field name 'UserLevel' first before field var 'x__UserLevel'
        $val = $CurrentForm->hasValue("UserLevel") ? $CurrentForm->getValue("UserLevel") : $CurrentForm->getValue("x__UserLevel");
        if (!$this->_UserLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_UserLevel->Visible = false; // Disable update for API request
            } else {
                $this->_UserLevel->setFormValue($val);
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

        // Check field name 'profilefield' first before field var 'x_profilefield'
        $val = $CurrentForm->hasValue("profilefield") ? $CurrentForm->getValue("profilefield") : $CurrentForm->getValue("x_profilefield");
        if (!$this->profilefield->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->profilefield->Visible = false; // Disable update for API request
            } else {
                $this->profilefield->setFormValue($val);
            }
        }

        // Check field name 'UserID' first before field var 'x__UserID'
        $val = $CurrentForm->hasValue("UserID") ? $CurrentForm->getValue("UserID") : $CurrentForm->getValue("x__UserID");
        if (!$this->_UserID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_UserID->Visible = false; // Disable update for API request
            } else {
                $this->_UserID->setFormValue($val);
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

        // Check field name 'HospID' first before field var 'x_HospID'
        $val = $CurrentForm->hasValue("HospID") ? $CurrentForm->getValue("HospID") : $CurrentForm->getValue("x_HospID");
        if (!$this->HospID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HospID->Visible = false; // Disable update for API request
            } else {
                $this->HospID->setFormValue($val);
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

        // Check field name 'StoreID' first before field var 'x_StoreID'
        $val = $CurrentForm->hasValue("StoreID") ? $CurrentForm->getValue("StoreID") : $CurrentForm->getValue("x_StoreID");
        if (!$this->StoreID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StoreID->Visible = false; // Disable update for API request
            } else {
                $this->StoreID->setFormValue($val);
            }
        }

        // Check field name 'OTP' first before field var 'x_OTP'
        $val = $CurrentForm->hasValue("OTP") ? $CurrentForm->getValue("OTP") : $CurrentForm->getValue("x_OTP");
        if (!$this->OTP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OTP->Visible = false; // Disable update for API request
            } else {
                $this->OTP->setFormValue($val);
            }
        }

        // Check field name 'LoginType' first before field var 'x__LoginType'
        $val = $CurrentForm->hasValue("LoginType") ? $CurrentForm->getValue("LoginType") : $CurrentForm->getValue("x__LoginType");
        if (!$this->_LoginType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->_LoginType->Visible = false; // Disable update for API request
            } else {
                $this->_LoginType->setFormValue($val);
            }
        }

        // Check field name 'BranchId' first before field var 'x_BranchId'
        $val = $CurrentForm->hasValue("BranchId") ? $CurrentForm->getValue("BranchId") : $CurrentForm->getValue("x_BranchId");
        if (!$this->BranchId->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->BranchId->Visible = false; // Disable update for API request
            } else {
                $this->BranchId->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->User_Name->CurrentValue = $this->User_Name->FormValue;
        $this->mail_id->CurrentValue = $this->mail_id->FormValue;
        $this->mobile_no->CurrentValue = $this->mobile_no->FormValue;
        $this->_password->CurrentValue = $this->_password->FormValue;
        $this->email_verified->CurrentValue = $this->email_verified->FormValue;
        $this->ReportTo->CurrentValue = $this->ReportTo->FormValue;
        $this->_UserLevel->CurrentValue = $this->_UserLevel->FormValue;
        $this->CreatedDateTime->CurrentValue = $this->CreatedDateTime->FormValue;
        $this->CreatedDateTime->CurrentValue = UnFormatDateTime($this->CreatedDateTime->CurrentValue, 0);
        $this->profilefield->CurrentValue = $this->profilefield->FormValue;
        $this->_UserID->CurrentValue = $this->_UserID->FormValue;
        $this->GroupID->CurrentValue = $this->GroupID->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->PharID->CurrentValue = $this->PharID->FormValue;
        $this->StoreID->CurrentValue = $this->StoreID->FormValue;
        $this->OTP->CurrentValue = $this->OTP->FormValue;
        $this->_LoginType->CurrentValue = $this->_LoginType->FormValue;
        $this->BranchId->CurrentValue = $this->BranchId->FormValue;
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
        $this->User_Name->setDbValue($row['User_Name']);
        $this->mail_id->setDbValue($row['mail_id']);
        $this->mobile_no->setDbValue($row['mobile_no']);
        $this->_password->setDbValue($row['password']);
        $this->email_verified->setDbValue($row['email_verified']);
        $this->ReportTo->setDbValue($row['ReportTo']);
        $this->_UserLevel->setDbValue($row['UserLevel']);
        $this->CreatedDateTime->setDbValue($row['CreatedDateTime']);
        $this->profilefield->setDbValue($row['profilefield']);
        $this->_UserID->setDbValue($row['UserID']);
        $this->GroupID->setDbValue($row['GroupID']);
        $this->HospID->setDbValue($row['HospID']);
        $this->PharID->setDbValue($row['PharID']);
        $this->StoreID->setDbValue($row['StoreID']);
        $this->OTP->setDbValue($row['OTP']);
        $this->_LoginType->setDbValue($row['LoginType']);
        $this->BranchId->setDbValue($row['BranchId']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['User_Name'] = $this->User_Name->CurrentValue;
        $row['mail_id'] = $this->mail_id->CurrentValue;
        $row['mobile_no'] = $this->mobile_no->CurrentValue;
        $row['password'] = $this->_password->CurrentValue;
        $row['email_verified'] = $this->email_verified->CurrentValue;
        $row['ReportTo'] = $this->ReportTo->CurrentValue;
        $row['UserLevel'] = $this->_UserLevel->CurrentValue;
        $row['CreatedDateTime'] = $this->CreatedDateTime->CurrentValue;
        $row['profilefield'] = $this->profilefield->CurrentValue;
        $row['UserID'] = $this->_UserID->CurrentValue;
        $row['GroupID'] = $this->GroupID->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
        $row['PharID'] = $this->PharID->CurrentValue;
        $row['StoreID'] = $this->StoreID->CurrentValue;
        $row['OTP'] = $this->OTP->CurrentValue;
        $row['LoginType'] = $this->_LoginType->CurrentValue;
        $row['BranchId'] = $this->BranchId->CurrentValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord()
    {
        // Load old record
        $this->OldRecordset = null;
        $validKey = $this->OldKey != "";
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

        // User_Name

        // mail_id

        // mobile_no

        // password

        // email_verified

        // ReportTo

        // UserLevel

        // CreatedDateTime

        // profilefield

        // UserID

        // GroupID

        // HospID

        // PharID

        // StoreID

        // OTP

        // LoginType

        // BranchId
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // User_Name
            $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
            $curVal = trim(strval($this->User_Name->CurrentValue));
            if ($curVal != "") {
                $this->User_Name->ViewValue = $this->User_Name->lookupCacheOption($curVal);
                if ($this->User_Name->ViewValue === null) { // Lookup from database
                    $filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->User_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->User_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->User_Name->ViewValue = $this->User_Name->displayValue($arwrk);
                    } else {
                        $this->User_Name->ViewValue = $this->User_Name->CurrentValue;
                    }
                }
            } else {
                $this->User_Name->ViewValue = null;
            }
            $this->User_Name->ViewCustomAttributes = "";

            // mail_id
            $this->mail_id->ViewValue = $this->mail_id->CurrentValue;
            $this->mail_id->ViewCustomAttributes = "";

            // mobile_no
            $this->mobile_no->ViewValue = $this->mobile_no->CurrentValue;
            $this->mobile_no->ViewCustomAttributes = "";

            // password
            $this->_password->ViewValue = $Language->phrase("PasswordMask");
            $this->_password->ViewCustomAttributes = "";

            // email_verified
            if (strval($this->email_verified->CurrentValue) != "") {
                $this->email_verified->ViewValue = $this->email_verified->optionCaption($this->email_verified->CurrentValue);
            } else {
                $this->email_verified->ViewValue = null;
            }
            $this->email_verified->ViewCustomAttributes = "";

            // ReportTo
            $this->ReportTo->ViewValue = $this->ReportTo->CurrentValue;
            $this->ReportTo->ViewValue = FormatNumber($this->ReportTo->ViewValue, 0, -2, -2, -2);
            $this->ReportTo->ViewCustomAttributes = "";

            // UserLevel
            if ($Security->canAdmin()) { // System admin
                $curVal = trim(strval($this->_UserLevel->CurrentValue));
                if ($curVal != "") {
                    $this->_UserLevel->ViewValue = $this->_UserLevel->lookupCacheOption($curVal);
                    if ($this->_UserLevel->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->_UserLevel->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->_UserLevel->Lookup->renderViewRow($rswrk[0]);
                            $this->_UserLevel->ViewValue = $this->_UserLevel->displayValue($arwrk);
                        } else {
                            $this->_UserLevel->ViewValue = $this->_UserLevel->CurrentValue;
                        }
                    }
                } else {
                    $this->_UserLevel->ViewValue = null;
                }
            } else {
                $this->_UserLevel->ViewValue = $Language->phrase("PasswordMask");
            }
            $this->_UserLevel->ViewCustomAttributes = "";

            // CreatedDateTime
            $this->CreatedDateTime->ViewValue = $this->CreatedDateTime->CurrentValue;
            $this->CreatedDateTime->ViewValue = FormatDateTime($this->CreatedDateTime->ViewValue, 0);
            $this->CreatedDateTime->ViewCustomAttributes = "";

            // profilefield
            $this->profilefield->ViewValue = $this->profilefield->CurrentValue;
            $this->profilefield->ViewCustomAttributes = "";

            // UserID
            $this->_UserID->ViewValue = $this->_UserID->CurrentValue;
            $this->_UserID->ViewValue = FormatNumber($this->_UserID->ViewValue, 0, -2, -2, -2);
            $this->_UserID->ViewCustomAttributes = "";

            // GroupID
            $this->GroupID->ViewValue = $this->GroupID->CurrentValue;
            $this->GroupID->ViewValue = FormatNumber($this->GroupID->ViewValue, 0, -2, -2, -2);
            $this->GroupID->ViewCustomAttributes = "";

            // HospID
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
                if ($this->HospID->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HospID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HospID->Lookup->renderViewRow($rswrk[0]);
                        $this->HospID->ViewValue = $this->HospID->displayValue($arwrk);
                    } else {
                        $this->HospID->ViewValue = $this->HospID->CurrentValue;
                    }
                }
            } else {
                $this->HospID->ViewValue = null;
            }
            $this->HospID->ViewCustomAttributes = "";

            // PharID
            $curVal = trim(strval($this->PharID->CurrentValue));
            if ($curVal != "") {
                $this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
                if ($this->PharID->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->PharID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->PharID->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->PharID->Lookup->renderViewRow($row);
                            $this->PharID->ViewValue->add($this->PharID->displayValue($arwrk));
                        }
                    } else {
                        $this->PharID->ViewValue = $this->PharID->CurrentValue;
                    }
                }
            } else {
                $this->PharID->ViewValue = null;
            }
            $this->PharID->ViewCustomAttributes = "";

            // StoreID
            $curVal = trim(strval($this->StoreID->CurrentValue));
            if ($curVal != "") {
                $this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
                if ($this->StoreID->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->StoreID->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->StoreID->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->StoreID->Lookup->renderViewRow($row);
                            $this->StoreID->ViewValue->add($this->StoreID->displayValue($arwrk));
                        }
                    } else {
                        $this->StoreID->ViewValue = $this->StoreID->CurrentValue;
                    }
                }
            } else {
                $this->StoreID->ViewValue = null;
            }
            $this->StoreID->ViewCustomAttributes = "";

            // OTP
            $this->OTP->ViewValue = $this->OTP->CurrentValue;
            $this->OTP->ViewCustomAttributes = "";

            // LoginType
            $this->_LoginType->ViewValue = $this->_LoginType->CurrentValue;
            $this->_LoginType->ViewValue = FormatNumber($this->_LoginType->ViewValue, 0, -2, -2, -2);
            $this->_LoginType->ViewCustomAttributes = "";

            // BranchId
            $this->BranchId->ViewValue = $this->BranchId->CurrentValue;
            $this->BranchId->ViewValue = FormatNumber($this->BranchId->ViewValue, 0, -2, -2, -2);
            $this->BranchId->ViewCustomAttributes = "";

            // User_Name
            $this->User_Name->LinkCustomAttributes = "";
            $this->User_Name->HrefValue = "";
            $this->User_Name->TooltipValue = "";

            // mail_id
            $this->mail_id->LinkCustomAttributes = "";
            $this->mail_id->HrefValue = "";
            $this->mail_id->TooltipValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";
            $this->mobile_no->TooltipValue = "";

            // password
            $this->_password->LinkCustomAttributes = "";
            $this->_password->HrefValue = "";
            $this->_password->TooltipValue = "";

            // email_verified
            $this->email_verified->LinkCustomAttributes = "";
            $this->email_verified->HrefValue = "";
            $this->email_verified->TooltipValue = "";

            // ReportTo
            $this->ReportTo->LinkCustomAttributes = "";
            $this->ReportTo->HrefValue = "";
            $this->ReportTo->TooltipValue = "";

            // UserLevel
            $this->_UserLevel->LinkCustomAttributes = "";
            $this->_UserLevel->HrefValue = "";
            $this->_UserLevel->TooltipValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";
            $this->CreatedDateTime->TooltipValue = "";

            // profilefield
            $this->profilefield->LinkCustomAttributes = "";
            $this->profilefield->HrefValue = "";
            $this->profilefield->TooltipValue = "";

            // UserID
            $this->_UserID->LinkCustomAttributes = "";
            $this->_UserID->HrefValue = "";
            $this->_UserID->TooltipValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";
            $this->GroupID->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";
            $this->PharID->TooltipValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";
            $this->StoreID->TooltipValue = "";

            // OTP
            $this->OTP->LinkCustomAttributes = "";
            $this->OTP->HrefValue = "";
            $this->OTP->TooltipValue = "";

            // LoginType
            $this->_LoginType->LinkCustomAttributes = "";
            $this->_LoginType->HrefValue = "";
            $this->_LoginType->TooltipValue = "";

            // BranchId
            $this->BranchId->LinkCustomAttributes = "";
            $this->BranchId->HrefValue = "";
            $this->BranchId->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // User_Name
            $this->User_Name->EditAttrs["class"] = "form-control";
            $this->User_Name->EditCustomAttributes = "";
            if (!$this->User_Name->Raw) {
                $this->User_Name->CurrentValue = HtmlDecode($this->User_Name->CurrentValue);
            }
            $this->User_Name->EditValue = HtmlEncode($this->User_Name->CurrentValue);
            $curVal = trim(strval($this->User_Name->CurrentValue));
            if ($curVal != "") {
                $this->User_Name->EditValue = $this->User_Name->lookupCacheOption($curVal);
                if ($this->User_Name->EditValue === null) { // Lookup from database
                    $filterWrk = "`first_name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->User_Name->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->User_Name->Lookup->renderViewRow($rswrk[0]);
                        $this->User_Name->EditValue = $this->User_Name->displayValue($arwrk);
                    } else {
                        $this->User_Name->EditValue = HtmlEncode($this->User_Name->CurrentValue);
                    }
                }
            } else {
                $this->User_Name->EditValue = null;
            }
            $this->User_Name->PlaceHolder = RemoveHtml($this->User_Name->caption());

            // mail_id
            $this->mail_id->EditAttrs["class"] = "form-control";
            $this->mail_id->EditCustomAttributes = "";
            if (!$this->mail_id->Raw) {
                $this->mail_id->CurrentValue = HtmlDecode($this->mail_id->CurrentValue);
            }
            $this->mail_id->EditValue = HtmlEncode($this->mail_id->CurrentValue);
            $this->mail_id->PlaceHolder = RemoveHtml($this->mail_id->caption());

            // mobile_no
            $this->mobile_no->EditAttrs["class"] = "form-control";
            $this->mobile_no->EditCustomAttributes = "";
            if (!$this->mobile_no->Raw) {
                $this->mobile_no->CurrentValue = HtmlDecode($this->mobile_no->CurrentValue);
            }
            $this->mobile_no->EditValue = HtmlEncode($this->mobile_no->CurrentValue);
            $this->mobile_no->PlaceHolder = RemoveHtml($this->mobile_no->caption());

            // password
            $this->_password->EditAttrs["class"] = "form-control";
            $this->_password->EditCustomAttributes = "";
            $this->_password->PlaceHolder = RemoveHtml($this->_password->caption());

            // email_verified
            $this->email_verified->EditAttrs["class"] = "form-control";
            $this->email_verified->EditCustomAttributes = "";
            $this->email_verified->EditValue = $this->email_verified->options(true);
            $this->email_verified->PlaceHolder = RemoveHtml($this->email_verified->caption());

            // ReportTo

            // UserLevel
            $this->_UserLevel->EditAttrs["class"] = "form-control";
            $this->_UserLevel->EditCustomAttributes = "";
            if (!$Security->canAdmin()) { // System admin
                $this->_UserLevel->EditValue = $Language->phrase("PasswordMask");
            } else {
                $curVal = trim(strval($this->_UserLevel->CurrentValue));
                if ($curVal != "") {
                    $this->_UserLevel->ViewValue = $this->_UserLevel->lookupCacheOption($curVal);
                } else {
                    $this->_UserLevel->ViewValue = $this->_UserLevel->Lookup !== null && is_array($this->_UserLevel->Lookup->Options) ? $curVal : null;
                }
                if ($this->_UserLevel->ViewValue !== null) { // Load from cache
                    $this->_UserLevel->EditValue = array_values($this->_UserLevel->Lookup->Options);
                } else { // Lookup from database
                    if ($curVal == "") {
                        $filterWrk = "0=1";
                    } else {
                        $filterWrk = "`id`" . SearchString("=", $this->_UserLevel->CurrentValue, DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->_UserLevel->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    $arwrk = $rswrk;
                    $this->_UserLevel->EditValue = $arwrk;
                }
                $this->_UserLevel->PlaceHolder = RemoveHtml($this->_UserLevel->caption());
            }

            // CreatedDateTime

            // profilefield

            // UserID
            $this->_UserID->EditAttrs["class"] = "form-control";
            $this->_UserID->EditCustomAttributes = "";
            $this->_UserID->EditValue = HtmlEncode($this->_UserID->CurrentValue);
            $this->_UserID->PlaceHolder = RemoveHtml($this->_UserID->caption());

            // GroupID

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $curVal = trim(strval($this->HospID->CurrentValue));
            if ($curVal != "") {
                $this->HospID->ViewValue = $this->HospID->lookupCacheOption($curVal);
            } else {
                $this->HospID->ViewValue = $this->HospID->Lookup !== null && is_array($this->HospID->Lookup->Options) ? $curVal : null;
            }
            if ($this->HospID->ViewValue !== null) { // Load from cache
                $this->HospID->EditValue = array_values($this->HospID->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->HospID->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->HospID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->HospID->EditValue = $arwrk;
            }
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());

            // PharID
            $this->PharID->EditCustomAttributes = "";
            $curVal = trim(strval($this->PharID->CurrentValue));
            if ($curVal != "") {
                $this->PharID->ViewValue = $this->PharID->lookupCacheOption($curVal);
            } else {
                $this->PharID->ViewValue = $this->PharID->Lookup !== null && is_array($this->PharID->Lookup->Options) ? $curVal : null;
            }
            if ($this->PharID->ViewValue !== null) { // Load from cache
                $this->PharID->EditValue = array_values($this->PharID->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                }
                $sqlWrk = $this->PharID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->PharID->EditValue = $arwrk;
            }
            $this->PharID->PlaceHolder = RemoveHtml($this->PharID->caption());

            // StoreID
            $this->StoreID->EditCustomAttributes = "";
            $curVal = trim(strval($this->StoreID->CurrentValue));
            if ($curVal != "") {
                $this->StoreID->ViewValue = $this->StoreID->lookupCacheOption($curVal);
            } else {
                $this->StoreID->ViewValue = $this->StoreID->Lookup !== null && is_array($this->StoreID->Lookup->Options) ? $curVal : null;
            }
            if ($this->StoreID->ViewValue !== null) { // Load from cache
                $this->StoreID->EditValue = array_values($this->StoreID->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                }
                $sqlWrk = $this->StoreID->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->StoreID->EditValue = $arwrk;
            }
            $this->StoreID->PlaceHolder = RemoveHtml($this->StoreID->caption());

            // OTP
            $this->OTP->EditAttrs["class"] = "form-control";
            $this->OTP->EditCustomAttributes = "";
            if (!$this->OTP->Raw) {
                $this->OTP->CurrentValue = HtmlDecode($this->OTP->CurrentValue);
            }
            $this->OTP->EditValue = HtmlEncode($this->OTP->CurrentValue);
            $this->OTP->PlaceHolder = RemoveHtml($this->OTP->caption());

            // LoginType
            $this->_LoginType->EditAttrs["class"] = "form-control";
            $this->_LoginType->EditCustomAttributes = "";
            $this->_LoginType->EditValue = HtmlEncode($this->_LoginType->CurrentValue);
            $this->_LoginType->PlaceHolder = RemoveHtml($this->_LoginType->caption());

            // BranchId
            $this->BranchId->EditAttrs["class"] = "form-control";
            $this->BranchId->EditCustomAttributes = "";
            $this->BranchId->EditValue = HtmlEncode($this->BranchId->CurrentValue);
            $this->BranchId->PlaceHolder = RemoveHtml($this->BranchId->caption());

            // Add refer script

            // User_Name
            $this->User_Name->LinkCustomAttributes = "";
            $this->User_Name->HrefValue = "";

            // mail_id
            $this->mail_id->LinkCustomAttributes = "";
            $this->mail_id->HrefValue = "";

            // mobile_no
            $this->mobile_no->LinkCustomAttributes = "";
            $this->mobile_no->HrefValue = "";

            // password
            $this->_password->LinkCustomAttributes = "";
            $this->_password->HrefValue = "";

            // email_verified
            $this->email_verified->LinkCustomAttributes = "";
            $this->email_verified->HrefValue = "";

            // ReportTo
            $this->ReportTo->LinkCustomAttributes = "";
            $this->ReportTo->HrefValue = "";

            // UserLevel
            $this->_UserLevel->LinkCustomAttributes = "";
            $this->_UserLevel->HrefValue = "";

            // CreatedDateTime
            $this->CreatedDateTime->LinkCustomAttributes = "";
            $this->CreatedDateTime->HrefValue = "";

            // profilefield
            $this->profilefield->LinkCustomAttributes = "";
            $this->profilefield->HrefValue = "";

            // UserID
            $this->_UserID->LinkCustomAttributes = "";
            $this->_UserID->HrefValue = "";

            // GroupID
            $this->GroupID->LinkCustomAttributes = "";
            $this->GroupID->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // PharID
            $this->PharID->LinkCustomAttributes = "";
            $this->PharID->HrefValue = "";

            // StoreID
            $this->StoreID->LinkCustomAttributes = "";
            $this->StoreID->HrefValue = "";

            // OTP
            $this->OTP->LinkCustomAttributes = "";
            $this->OTP->HrefValue = "";

            // LoginType
            $this->_LoginType->LinkCustomAttributes = "";
            $this->_LoginType->HrefValue = "";

            // BranchId
            $this->BranchId->LinkCustomAttributes = "";
            $this->BranchId->HrefValue = "";
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
        if ($this->User_Name->Required) {
            if (!$this->User_Name->IsDetailKey && EmptyValue($this->User_Name->FormValue)) {
                $this->User_Name->addErrorMessage(str_replace("%s", $this->User_Name->caption(), $this->User_Name->RequiredErrorMessage));
            }
        }
        if ($this->mail_id->Required) {
            if (!$this->mail_id->IsDetailKey && EmptyValue($this->mail_id->FormValue)) {
                $this->mail_id->addErrorMessage(str_replace("%s", $this->mail_id->caption(), $this->mail_id->RequiredErrorMessage));
            }
        }
        if (!$this->mail_id->Raw && Config("REMOVE_XSS") && CheckUsername($this->mail_id->FormValue)) {
            $this->mail_id->addErrorMessage($Language->phrase("InvalidUsernameChars"));
        }
        if ($this->mobile_no->Required) {
            if (!$this->mobile_no->IsDetailKey && EmptyValue($this->mobile_no->FormValue)) {
                $this->mobile_no->addErrorMessage(str_replace("%s", $this->mobile_no->caption(), $this->mobile_no->RequiredErrorMessage));
            }
        }
        if ($this->_password->Required) {
            if (!$this->_password->IsDetailKey && EmptyValue($this->_password->FormValue)) {
                $this->_password->addErrorMessage(str_replace("%s", $this->_password->caption(), $this->_password->RequiredErrorMessage));
            }
        }
        if (!$this->_password->Raw && Config("REMOVE_XSS") && CheckPassword($this->_password->FormValue)) {
            $this->_password->addErrorMessage($Language->phrase("InvalidPasswordChars"));
        }
        if ($this->email_verified->Required) {
            if (!$this->email_verified->IsDetailKey && EmptyValue($this->email_verified->FormValue)) {
                $this->email_verified->addErrorMessage(str_replace("%s", $this->email_verified->caption(), $this->email_verified->RequiredErrorMessage));
            }
        }
        if ($this->ReportTo->Required) {
            if (!$this->ReportTo->IsDetailKey && EmptyValue($this->ReportTo->FormValue)) {
                $this->ReportTo->addErrorMessage(str_replace("%s", $this->ReportTo->caption(), $this->ReportTo->RequiredErrorMessage));
            }
        }
        if ($this->_UserLevel->Required) {
            if (!$this->_UserLevel->IsDetailKey && EmptyValue($this->_UserLevel->FormValue)) {
                $this->_UserLevel->addErrorMessage(str_replace("%s", $this->_UserLevel->caption(), $this->_UserLevel->RequiredErrorMessage));
            }
        }
        if ($this->CreatedDateTime->Required) {
            if (!$this->CreatedDateTime->IsDetailKey && EmptyValue($this->CreatedDateTime->FormValue)) {
                $this->CreatedDateTime->addErrorMessage(str_replace("%s", $this->CreatedDateTime->caption(), $this->CreatedDateTime->RequiredErrorMessage));
            }
        }
        if ($this->profilefield->Required) {
            if (!$this->profilefield->IsDetailKey && EmptyValue($this->profilefield->FormValue)) {
                $this->profilefield->addErrorMessage(str_replace("%s", $this->profilefield->caption(), $this->profilefield->RequiredErrorMessage));
            }
        }
        if ($this->_UserID->Required) {
            if (!$this->_UserID->IsDetailKey && EmptyValue($this->_UserID->FormValue)) {
                $this->_UserID->addErrorMessage(str_replace("%s", $this->_UserID->caption(), $this->_UserID->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->_UserID->FormValue)) {
            $this->_UserID->addErrorMessage($this->_UserID->getErrorMessage(false));
        }
        if ($this->GroupID->Required) {
            if (!$this->GroupID->IsDetailKey && EmptyValue($this->GroupID->FormValue)) {
                $this->GroupID->addErrorMessage(str_replace("%s", $this->GroupID->caption(), $this->GroupID->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->PharID->Required) {
            if ($this->PharID->FormValue == "") {
                $this->PharID->addErrorMessage(str_replace("%s", $this->PharID->caption(), $this->PharID->RequiredErrorMessage));
            }
        }
        if ($this->StoreID->Required) {
            if ($this->StoreID->FormValue == "") {
                $this->StoreID->addErrorMessage(str_replace("%s", $this->StoreID->caption(), $this->StoreID->RequiredErrorMessage));
            }
        }
        if ($this->OTP->Required) {
            if (!$this->OTP->IsDetailKey && EmptyValue($this->OTP->FormValue)) {
                $this->OTP->addErrorMessage(str_replace("%s", $this->OTP->caption(), $this->OTP->RequiredErrorMessage));
            }
        }
        if ($this->_LoginType->Required) {
            if (!$this->_LoginType->IsDetailKey && EmptyValue($this->_LoginType->FormValue)) {
                $this->_LoginType->addErrorMessage(str_replace("%s", $this->_LoginType->caption(), $this->_LoginType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->_LoginType->FormValue)) {
            $this->_LoginType->addErrorMessage($this->_LoginType->getErrorMessage(false));
        }
        if ($this->BranchId->Required) {
            if (!$this->BranchId->IsDetailKey && EmptyValue($this->BranchId->FormValue)) {
                $this->BranchId->addErrorMessage(str_replace("%s", $this->BranchId->caption(), $this->BranchId->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->BranchId->FormValue)) {
            $this->BranchId->addErrorMessage($this->BranchId->getErrorMessage(false));
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
        if ($this->mail_id->CurrentValue != "") { // Check field with unique index
            $filter = "(`mail_id` = '" . AdjustSql($this->mail_id->CurrentValue, $this->Dbid) . "')";
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $idxErrMsg = str_replace("%f", $this->mail_id->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->mail_id->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                return false;
            }
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // User_Name
        $this->User_Name->setDbValueDef($rsnew, $this->User_Name->CurrentValue, "", false);

        // mail_id
        $this->mail_id->setDbValueDef($rsnew, $this->mail_id->CurrentValue, "", false);

        // mobile_no
        $this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, "", false);

        // password
        if (!IsMaskedPassword($this->_password->CurrentValue)) {
            $this->_password->setDbValueDef($rsnew, $this->_password->CurrentValue, "", false);
        }

        // email_verified
        $this->email_verified->setDbValueDef($rsnew, $this->email_verified->CurrentValue, null, false);

        // ReportTo
        $this->ReportTo->CurrentValue = CurrentUserLevel();
        $this->ReportTo->setDbValueDef($rsnew, $this->ReportTo->CurrentValue, null);

        // UserLevel
        if ($Security->canAdmin()) { // System admin
            $this->_UserLevel->setDbValueDef($rsnew, $this->_UserLevel->CurrentValue, null, false);
        }

        // CreatedDateTime
        $this->CreatedDateTime->CurrentValue = CurrentDateTime();
        $this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, null);

        // profilefield
        $this->profilefield->CurrentValue = CurrentUserLevel();
        $this->profilefield->setDbValueDef($rsnew, $this->profilefield->CurrentValue, null);

        // UserID
        $this->_UserID->setDbValueDef($rsnew, $this->_UserID->CurrentValue, null, false);

        // GroupID
        $this->GroupID->CurrentValue = CurrentUserLevel();
        $this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, null);

        // HospID
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, strval($this->HospID->CurrentValue) == "");

        // PharID
        $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null, strval($this->PharID->CurrentValue) == "");

        // StoreID
        $this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, null, strval($this->StoreID->CurrentValue) == "");

        // OTP
        $this->OTP->setDbValueDef($rsnew, $this->OTP->CurrentValue, null, false);

        // LoginType
        $this->_LoginType->setDbValueDef($rsnew, $this->_LoginType->CurrentValue, null, false);

        // BranchId
        $this->BranchId->setDbValueDef($rsnew, $this->BranchId->CurrentValue, null, false);

        // Call Row Inserting event
        $insertRow = $this->rowInserting($rsold, $rsnew);
        $addRow = false;
        if ($insertRow) {
            try {
                $addRow = $this->insert($rsnew);
            } catch (\Exception $e) {
                $this->setFailureMessage($e->getMessage());
            }
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("UserLoginList"), "", $this->TableVar, true);
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
                case "x_User_Name":
                    break;
                case "x_email_verified":
                    break;
                case "x__UserLevel":
                    break;
                case "x_HospID":
                    break;
                case "x_PharID":
                    break;
                case "x_StoreID":
                    break;
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
