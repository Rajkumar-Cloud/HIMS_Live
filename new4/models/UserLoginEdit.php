<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class UserLoginEdit extends UserLogin
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'user_login';

    // Page object name
    public $PageObjName = "UserLoginEdit";

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
    public $FormClassName = "ew-horizontal ew-form ew-edit-form";
    public $IsModal = false;
    public $IsMobileOrModal = false;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $HashValue; // Hash Value
    public $DisplayRecords = 1;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecordCount;

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
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action") !== null) {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey(Post($this->OldKeyName), $this->isShow());
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
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
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
                    $this->terminate("UserLoginList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "UserLoginList") {
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
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
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
        $row = [];
        $row['id'] = null;
        $row['User_Name'] = null;
        $row['mail_id'] = null;
        $row['mobile_no'] = null;
        $row['password'] = null;
        $row['email_verified'] = null;
        $row['ReportTo'] = null;
        $row['UserLevel'] = null;
        $row['CreatedDateTime'] = null;
        $row['profilefield'] = null;
        $row['UserID'] = null;
        $row['GroupID'] = null;
        $row['HospID'] = null;
        $row['PharID'] = null;
        $row['StoreID'] = null;
        $row['OTP'] = null;
        $row['LoginType'] = null;
        $row['BranchId'] = null;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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
            $this->_password->EditValue = $Language->phrase("PasswordMask"); // Show as masked password
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

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
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

    // Update record based on key values
    protected function editRow()
    {
        global $Security, $Language;
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();
        if ($this->mail_id->CurrentValue != "") { // Check field with unique index
            $filterChk = "(`mail_id` = '" . AdjustSql($this->mail_id->CurrentValue, $this->Dbid) . "')";
            $filterChk .= " AND NOT (" . $filter . ")";
            $this->CurrentFilter = $filterChk;
            $sqlChk = $this->getCurrentSql();
            $rsChk = $conn->executeQuery($sqlChk);
            if (!$rsChk) {
                return false;
            }
            if ($rsChk->fetch()) {
                $idxErrMsg = str_replace("%f", $this->mail_id->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->mail_id->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                $rsChk->closeCursor();
                return false;
            }
        }
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $rsold = $conn->fetchAssoc($sql);
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // User_Name
            $this->User_Name->setDbValueDef($rsnew, $this->User_Name->CurrentValue, "", $this->User_Name->ReadOnly);

            // mail_id
            $this->mail_id->setDbValueDef($rsnew, $this->mail_id->CurrentValue, "", $this->mail_id->ReadOnly);

            // mobile_no
            $this->mobile_no->setDbValueDef($rsnew, $this->mobile_no->CurrentValue, "", $this->mobile_no->ReadOnly);

            // password
            if (!IsMaskedPassword($this->_password->CurrentValue)) {
                $this->_password->setDbValueDef($rsnew, $this->_password->CurrentValue, "", $this->_password->ReadOnly || Config("ENCRYPTED_PASSWORD") && $rsold['password'] == $this->_password->CurrentValue);
            }

            // email_verified
            $this->email_verified->setDbValueDef($rsnew, $this->email_verified->CurrentValue, null, $this->email_verified->ReadOnly);

            // ReportTo
            $this->ReportTo->CurrentValue = CurrentUserLevel();
            $this->ReportTo->setDbValueDef($rsnew, $this->ReportTo->CurrentValue, null);

            // UserLevel
            if ($Security->canAdmin()) { // System admin
                $this->_UserLevel->setDbValueDef($rsnew, $this->_UserLevel->CurrentValue, null, $this->_UserLevel->ReadOnly);
            }

            // CreatedDateTime
            $this->CreatedDateTime->CurrentValue = CurrentDateTime();
            $this->CreatedDateTime->setDbValueDef($rsnew, $this->CreatedDateTime->CurrentValue, null);

            // profilefield
            $this->profilefield->CurrentValue = CurrentUserLevel();
            $this->profilefield->setDbValueDef($rsnew, $this->profilefield->CurrentValue, null);

            // UserID
            $this->_UserID->setDbValueDef($rsnew, $this->_UserID->CurrentValue, null, $this->_UserID->ReadOnly);

            // GroupID
            $this->GroupID->CurrentValue = CurrentUserLevel();
            $this->GroupID->setDbValueDef($rsnew, $this->GroupID->CurrentValue, null);

            // HospID
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null, $this->HospID->ReadOnly);

            // PharID
            $this->PharID->setDbValueDef($rsnew, $this->PharID->CurrentValue, null, $this->PharID->ReadOnly);

            // StoreID
            $this->StoreID->setDbValueDef($rsnew, $this->StoreID->CurrentValue, null, $this->StoreID->ReadOnly);

            // OTP
            $this->OTP->setDbValueDef($rsnew, $this->OTP->CurrentValue, null, $this->OTP->ReadOnly);

            // LoginType
            $this->_LoginType->setDbValueDef($rsnew, $this->_LoginType->CurrentValue, null, $this->_LoginType->ReadOnly);

            // BranchId
            $this->BranchId->setDbValueDef($rsnew, $this->BranchId->CurrentValue, null, $this->BranchId->ReadOnly);

            // Call Row Updating event
            $updateRow = $this->rowUpdating($rsold, $rsnew);
            if ($updateRow) {
                if (count($rsnew) > 0) {
                    try {
                        $editRow = $this->update($rsnew, "", $rsold);
                    } catch (\Exception $e) {
                        $this->setFailureMessage($e->getMessage());
                    }
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("UserLoginList"), "", $this->TableVar, true);
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
