<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class HrLeavetypesAdd extends HrLeavetypes
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'hr_leavetypes';

    // Page object name
    public $PageObjName = "HrLeavetypesAdd";

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

        // Table object (hr_leavetypes)
        if (!isset($GLOBALS["hr_leavetypes"]) || get_class($GLOBALS["hr_leavetypes"]) == PROJECT_NAMESPACE . "hr_leavetypes") {
            $GLOBALS["hr_leavetypes"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'hr_leavetypes');
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
                $doc = new $class(Container("hr_leavetypes"));
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
                    if ($pageName == "HrLeavetypesView") {
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
        $this->name->setVisibility();
        $this->supervisor_leave_assign->setVisibility();
        $this->employee_can_apply->setVisibility();
        $this->apply_beyond_current->setVisibility();
        $this->leave_accrue->setVisibility();
        $this->carried_forward->setVisibility();
        $this->default_per_year->setVisibility();
        $this->carried_forward_percentage->setVisibility();
        $this->carried_forward_leave_availability->setVisibility();
        $this->propotionate_on_joined_date->setVisibility();
        $this->send_notification_emails->setVisibility();
        $this->leave_group->setVisibility();
        $this->leave_color->setVisibility();
        $this->max_carried_forward_amount->setVisibility();
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
                    $this->terminate("HrLeavetypesList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "HrLeavetypesList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "HrLeavetypesView") {
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
        $this->name->CurrentValue = null;
        $this->name->OldValue = $this->name->CurrentValue;
        $this->supervisor_leave_assign->CurrentValue = "Yes";
        $this->employee_can_apply->CurrentValue = "Yes";
        $this->apply_beyond_current->CurrentValue = "Yes";
        $this->leave_accrue->CurrentValue = "No";
        $this->carried_forward->CurrentValue = "No";
        $this->default_per_year->CurrentValue = null;
        $this->default_per_year->OldValue = $this->default_per_year->CurrentValue;
        $this->carried_forward_percentage->CurrentValue = 0;
        $this->carried_forward_leave_availability->CurrentValue = 365;
        $this->propotionate_on_joined_date->CurrentValue = "No";
        $this->send_notification_emails->CurrentValue = "Yes";
        $this->leave_group->CurrentValue = null;
        $this->leave_group->OldValue = $this->leave_group->CurrentValue;
        $this->leave_color->CurrentValue = null;
        $this->leave_color->OldValue = $this->leave_color->CurrentValue;
        $this->max_carried_forward_amount->CurrentValue = 0;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'name' first before field var 'x_name'
        $val = $CurrentForm->hasValue("name") ? $CurrentForm->getValue("name") : $CurrentForm->getValue("x_name");
        if (!$this->name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->name->Visible = false; // Disable update for API request
            } else {
                $this->name->setFormValue($val);
            }
        }

        // Check field name 'supervisor_leave_assign' first before field var 'x_supervisor_leave_assign'
        $val = $CurrentForm->hasValue("supervisor_leave_assign") ? $CurrentForm->getValue("supervisor_leave_assign") : $CurrentForm->getValue("x_supervisor_leave_assign");
        if (!$this->supervisor_leave_assign->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->supervisor_leave_assign->Visible = false; // Disable update for API request
            } else {
                $this->supervisor_leave_assign->setFormValue($val);
            }
        }

        // Check field name 'employee_can_apply' first before field var 'x_employee_can_apply'
        $val = $CurrentForm->hasValue("employee_can_apply") ? $CurrentForm->getValue("employee_can_apply") : $CurrentForm->getValue("x_employee_can_apply");
        if (!$this->employee_can_apply->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employee_can_apply->Visible = false; // Disable update for API request
            } else {
                $this->employee_can_apply->setFormValue($val);
            }
        }

        // Check field name 'apply_beyond_current' first before field var 'x_apply_beyond_current'
        $val = $CurrentForm->hasValue("apply_beyond_current") ? $CurrentForm->getValue("apply_beyond_current") : $CurrentForm->getValue("x_apply_beyond_current");
        if (!$this->apply_beyond_current->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->apply_beyond_current->Visible = false; // Disable update for API request
            } else {
                $this->apply_beyond_current->setFormValue($val);
            }
        }

        // Check field name 'leave_accrue' first before field var 'x_leave_accrue'
        $val = $CurrentForm->hasValue("leave_accrue") ? $CurrentForm->getValue("leave_accrue") : $CurrentForm->getValue("x_leave_accrue");
        if (!$this->leave_accrue->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leave_accrue->Visible = false; // Disable update for API request
            } else {
                $this->leave_accrue->setFormValue($val);
            }
        }

        // Check field name 'carried_forward' first before field var 'x_carried_forward'
        $val = $CurrentForm->hasValue("carried_forward") ? $CurrentForm->getValue("carried_forward") : $CurrentForm->getValue("x_carried_forward");
        if (!$this->carried_forward->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->carried_forward->Visible = false; // Disable update for API request
            } else {
                $this->carried_forward->setFormValue($val);
            }
        }

        // Check field name 'default_per_year' first before field var 'x_default_per_year'
        $val = $CurrentForm->hasValue("default_per_year") ? $CurrentForm->getValue("default_per_year") : $CurrentForm->getValue("x_default_per_year");
        if (!$this->default_per_year->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->default_per_year->Visible = false; // Disable update for API request
            } else {
                $this->default_per_year->setFormValue($val);
            }
        }

        // Check field name 'carried_forward_percentage' first before field var 'x_carried_forward_percentage'
        $val = $CurrentForm->hasValue("carried_forward_percentage") ? $CurrentForm->getValue("carried_forward_percentage") : $CurrentForm->getValue("x_carried_forward_percentage");
        if (!$this->carried_forward_percentage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->carried_forward_percentage->Visible = false; // Disable update for API request
            } else {
                $this->carried_forward_percentage->setFormValue($val);
            }
        }

        // Check field name 'carried_forward_leave_availability' first before field var 'x_carried_forward_leave_availability'
        $val = $CurrentForm->hasValue("carried_forward_leave_availability") ? $CurrentForm->getValue("carried_forward_leave_availability") : $CurrentForm->getValue("x_carried_forward_leave_availability");
        if (!$this->carried_forward_leave_availability->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->carried_forward_leave_availability->Visible = false; // Disable update for API request
            } else {
                $this->carried_forward_leave_availability->setFormValue($val);
            }
        }

        // Check field name 'propotionate_on_joined_date' first before field var 'x_propotionate_on_joined_date'
        $val = $CurrentForm->hasValue("propotionate_on_joined_date") ? $CurrentForm->getValue("propotionate_on_joined_date") : $CurrentForm->getValue("x_propotionate_on_joined_date");
        if (!$this->propotionate_on_joined_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->propotionate_on_joined_date->Visible = false; // Disable update for API request
            } else {
                $this->propotionate_on_joined_date->setFormValue($val);
            }
        }

        // Check field name 'send_notification_emails' first before field var 'x_send_notification_emails'
        $val = $CurrentForm->hasValue("send_notification_emails") ? $CurrentForm->getValue("send_notification_emails") : $CurrentForm->getValue("x_send_notification_emails");
        if (!$this->send_notification_emails->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->send_notification_emails->Visible = false; // Disable update for API request
            } else {
                $this->send_notification_emails->setFormValue($val);
            }
        }

        // Check field name 'leave_group' first before field var 'x_leave_group'
        $val = $CurrentForm->hasValue("leave_group") ? $CurrentForm->getValue("leave_group") : $CurrentForm->getValue("x_leave_group");
        if (!$this->leave_group->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leave_group->Visible = false; // Disable update for API request
            } else {
                $this->leave_group->setFormValue($val);
            }
        }

        // Check field name 'leave_color' first before field var 'x_leave_color'
        $val = $CurrentForm->hasValue("leave_color") ? $CurrentForm->getValue("leave_color") : $CurrentForm->getValue("x_leave_color");
        if (!$this->leave_color->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->leave_color->Visible = false; // Disable update for API request
            } else {
                $this->leave_color->setFormValue($val);
            }
        }

        // Check field name 'max_carried_forward_amount' first before field var 'x_max_carried_forward_amount'
        $val = $CurrentForm->hasValue("max_carried_forward_amount") ? $CurrentForm->getValue("max_carried_forward_amount") : $CurrentForm->getValue("x_max_carried_forward_amount");
        if (!$this->max_carried_forward_amount->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->max_carried_forward_amount->Visible = false; // Disable update for API request
            } else {
                $this->max_carried_forward_amount->setFormValue($val);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->name->CurrentValue = $this->name->FormValue;
        $this->supervisor_leave_assign->CurrentValue = $this->supervisor_leave_assign->FormValue;
        $this->employee_can_apply->CurrentValue = $this->employee_can_apply->FormValue;
        $this->apply_beyond_current->CurrentValue = $this->apply_beyond_current->FormValue;
        $this->leave_accrue->CurrentValue = $this->leave_accrue->FormValue;
        $this->carried_forward->CurrentValue = $this->carried_forward->FormValue;
        $this->default_per_year->CurrentValue = $this->default_per_year->FormValue;
        $this->carried_forward_percentage->CurrentValue = $this->carried_forward_percentage->FormValue;
        $this->carried_forward_leave_availability->CurrentValue = $this->carried_forward_leave_availability->FormValue;
        $this->propotionate_on_joined_date->CurrentValue = $this->propotionate_on_joined_date->FormValue;
        $this->send_notification_emails->CurrentValue = $this->send_notification_emails->FormValue;
        $this->leave_group->CurrentValue = $this->leave_group->FormValue;
        $this->leave_color->CurrentValue = $this->leave_color->FormValue;
        $this->max_carried_forward_amount->CurrentValue = $this->max_carried_forward_amount->FormValue;
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
        $this->name->setDbValue($row['name']);
        $this->supervisor_leave_assign->setDbValue($row['supervisor_leave_assign']);
        $this->employee_can_apply->setDbValue($row['employee_can_apply']);
        $this->apply_beyond_current->setDbValue($row['apply_beyond_current']);
        $this->leave_accrue->setDbValue($row['leave_accrue']);
        $this->carried_forward->setDbValue($row['carried_forward']);
        $this->default_per_year->setDbValue($row['default_per_year']);
        $this->carried_forward_percentage->setDbValue($row['carried_forward_percentage']);
        $this->carried_forward_leave_availability->setDbValue($row['carried_forward_leave_availability']);
        $this->propotionate_on_joined_date->setDbValue($row['propotionate_on_joined_date']);
        $this->send_notification_emails->setDbValue($row['send_notification_emails']);
        $this->leave_group->setDbValue($row['leave_group']);
        $this->leave_color->setDbValue($row['leave_color']);
        $this->max_carried_forward_amount->setDbValue($row['max_carried_forward_amount']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['name'] = $this->name->CurrentValue;
        $row['supervisor_leave_assign'] = $this->supervisor_leave_assign->CurrentValue;
        $row['employee_can_apply'] = $this->employee_can_apply->CurrentValue;
        $row['apply_beyond_current'] = $this->apply_beyond_current->CurrentValue;
        $row['leave_accrue'] = $this->leave_accrue->CurrentValue;
        $row['carried_forward'] = $this->carried_forward->CurrentValue;
        $row['default_per_year'] = $this->default_per_year->CurrentValue;
        $row['carried_forward_percentage'] = $this->carried_forward_percentage->CurrentValue;
        $row['carried_forward_leave_availability'] = $this->carried_forward_leave_availability->CurrentValue;
        $row['propotionate_on_joined_date'] = $this->propotionate_on_joined_date->CurrentValue;
        $row['send_notification_emails'] = $this->send_notification_emails->CurrentValue;
        $row['leave_group'] = $this->leave_group->CurrentValue;
        $row['leave_color'] = $this->leave_color->CurrentValue;
        $row['max_carried_forward_amount'] = $this->max_carried_forward_amount->CurrentValue;
        $row['HospID'] = $this->HospID->CurrentValue;
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

        // Convert decimal values if posted back
        if ($this->default_per_year->FormValue == $this->default_per_year->CurrentValue && is_numeric(ConvertToFloatString($this->default_per_year->CurrentValue))) {
            $this->default_per_year->CurrentValue = ConvertToFloatString($this->default_per_year->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // name

        // supervisor_leave_assign

        // employee_can_apply

        // apply_beyond_current

        // leave_accrue

        // carried_forward

        // default_per_year

        // carried_forward_percentage

        // carried_forward_leave_availability

        // propotionate_on_joined_date

        // send_notification_emails

        // leave_group

        // leave_color

        // max_carried_forward_amount

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // name
            $this->name->ViewValue = $this->name->CurrentValue;
            $this->name->ViewCustomAttributes = "";

            // supervisor_leave_assign
            if (strval($this->supervisor_leave_assign->CurrentValue) != "") {
                $this->supervisor_leave_assign->ViewValue = $this->supervisor_leave_assign->optionCaption($this->supervisor_leave_assign->CurrentValue);
            } else {
                $this->supervisor_leave_assign->ViewValue = null;
            }
            $this->supervisor_leave_assign->ViewCustomAttributes = "";

            // employee_can_apply
            if (strval($this->employee_can_apply->CurrentValue) != "") {
                $this->employee_can_apply->ViewValue = $this->employee_can_apply->optionCaption($this->employee_can_apply->CurrentValue);
            } else {
                $this->employee_can_apply->ViewValue = null;
            }
            $this->employee_can_apply->ViewCustomAttributes = "";

            // apply_beyond_current
            if (strval($this->apply_beyond_current->CurrentValue) != "") {
                $this->apply_beyond_current->ViewValue = $this->apply_beyond_current->optionCaption($this->apply_beyond_current->CurrentValue);
            } else {
                $this->apply_beyond_current->ViewValue = null;
            }
            $this->apply_beyond_current->ViewCustomAttributes = "";

            // leave_accrue
            if (strval($this->leave_accrue->CurrentValue) != "") {
                $this->leave_accrue->ViewValue = $this->leave_accrue->optionCaption($this->leave_accrue->CurrentValue);
            } else {
                $this->leave_accrue->ViewValue = null;
            }
            $this->leave_accrue->ViewCustomAttributes = "";

            // carried_forward
            if (strval($this->carried_forward->CurrentValue) != "") {
                $this->carried_forward->ViewValue = $this->carried_forward->optionCaption($this->carried_forward->CurrentValue);
            } else {
                $this->carried_forward->ViewValue = null;
            }
            $this->carried_forward->ViewCustomAttributes = "";

            // default_per_year
            $this->default_per_year->ViewValue = $this->default_per_year->CurrentValue;
            $this->default_per_year->ViewValue = FormatNumber($this->default_per_year->ViewValue, 2, -2, -2, -2);
            $this->default_per_year->ViewCustomAttributes = "";

            // carried_forward_percentage
            $this->carried_forward_percentage->ViewValue = $this->carried_forward_percentage->CurrentValue;
            $this->carried_forward_percentage->ViewValue = FormatNumber($this->carried_forward_percentage->ViewValue, 0, -2, -2, -2);
            $this->carried_forward_percentage->ViewCustomAttributes = "";

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->ViewValue = $this->carried_forward_leave_availability->CurrentValue;
            $this->carried_forward_leave_availability->ViewValue = FormatNumber($this->carried_forward_leave_availability->ViewValue, 0, -2, -2, -2);
            $this->carried_forward_leave_availability->ViewCustomAttributes = "";

            // propotionate_on_joined_date
            if (strval($this->propotionate_on_joined_date->CurrentValue) != "") {
                $this->propotionate_on_joined_date->ViewValue = $this->propotionate_on_joined_date->optionCaption($this->propotionate_on_joined_date->CurrentValue);
            } else {
                $this->propotionate_on_joined_date->ViewValue = null;
            }
            $this->propotionate_on_joined_date->ViewCustomAttributes = "";

            // send_notification_emails
            if (strval($this->send_notification_emails->CurrentValue) != "") {
                $this->send_notification_emails->ViewValue = $this->send_notification_emails->optionCaption($this->send_notification_emails->CurrentValue);
            } else {
                $this->send_notification_emails->ViewValue = null;
            }
            $this->send_notification_emails->ViewCustomAttributes = "";

            // leave_group
            $this->leave_group->ViewValue = $this->leave_group->CurrentValue;
            $this->leave_group->ViewValue = FormatNumber($this->leave_group->ViewValue, 0, -2, -2, -2);
            $this->leave_group->ViewCustomAttributes = "";

            // leave_color
            $this->leave_color->ViewValue = $this->leave_color->CurrentValue;
            $this->leave_color->ViewCustomAttributes = "";

            // max_carried_forward_amount
            $this->max_carried_forward_amount->ViewValue = $this->max_carried_forward_amount->CurrentValue;
            $this->max_carried_forward_amount->ViewValue = FormatNumber($this->max_carried_forward_amount->ViewValue, 0, -2, -2, -2);
            $this->max_carried_forward_amount->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // name
            $this->name->LinkCustomAttributes = "";
            $this->name->HrefValue = "";
            $this->name->TooltipValue = "";

            // supervisor_leave_assign
            $this->supervisor_leave_assign->LinkCustomAttributes = "";
            $this->supervisor_leave_assign->HrefValue = "";
            $this->supervisor_leave_assign->TooltipValue = "";

            // employee_can_apply
            $this->employee_can_apply->LinkCustomAttributes = "";
            $this->employee_can_apply->HrefValue = "";
            $this->employee_can_apply->TooltipValue = "";

            // apply_beyond_current
            $this->apply_beyond_current->LinkCustomAttributes = "";
            $this->apply_beyond_current->HrefValue = "";
            $this->apply_beyond_current->TooltipValue = "";

            // leave_accrue
            $this->leave_accrue->LinkCustomAttributes = "";
            $this->leave_accrue->HrefValue = "";
            $this->leave_accrue->TooltipValue = "";

            // carried_forward
            $this->carried_forward->LinkCustomAttributes = "";
            $this->carried_forward->HrefValue = "";
            $this->carried_forward->TooltipValue = "";

            // default_per_year
            $this->default_per_year->LinkCustomAttributes = "";
            $this->default_per_year->HrefValue = "";
            $this->default_per_year->TooltipValue = "";

            // carried_forward_percentage
            $this->carried_forward_percentage->LinkCustomAttributes = "";
            $this->carried_forward_percentage->HrefValue = "";
            $this->carried_forward_percentage->TooltipValue = "";

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->LinkCustomAttributes = "";
            $this->carried_forward_leave_availability->HrefValue = "";
            $this->carried_forward_leave_availability->TooltipValue = "";

            // propotionate_on_joined_date
            $this->propotionate_on_joined_date->LinkCustomAttributes = "";
            $this->propotionate_on_joined_date->HrefValue = "";
            $this->propotionate_on_joined_date->TooltipValue = "";

            // send_notification_emails
            $this->send_notification_emails->LinkCustomAttributes = "";
            $this->send_notification_emails->HrefValue = "";
            $this->send_notification_emails->TooltipValue = "";

            // leave_group
            $this->leave_group->LinkCustomAttributes = "";
            $this->leave_group->HrefValue = "";
            $this->leave_group->TooltipValue = "";

            // leave_color
            $this->leave_color->LinkCustomAttributes = "";
            $this->leave_color->HrefValue = "";
            $this->leave_color->TooltipValue = "";

            // max_carried_forward_amount
            $this->max_carried_forward_amount->LinkCustomAttributes = "";
            $this->max_carried_forward_amount->HrefValue = "";
            $this->max_carried_forward_amount->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // name
            $this->name->EditAttrs["class"] = "form-control";
            $this->name->EditCustomAttributes = "";
            if (!$this->name->Raw) {
                $this->name->CurrentValue = HtmlDecode($this->name->CurrentValue);
            }
            $this->name->EditValue = HtmlEncode($this->name->CurrentValue);
            $this->name->PlaceHolder = RemoveHtml($this->name->caption());

            // supervisor_leave_assign
            $this->supervisor_leave_assign->EditCustomAttributes = "";
            $this->supervisor_leave_assign->EditValue = $this->supervisor_leave_assign->options(false);
            $this->supervisor_leave_assign->PlaceHolder = RemoveHtml($this->supervisor_leave_assign->caption());

            // employee_can_apply
            $this->employee_can_apply->EditCustomAttributes = "";
            $this->employee_can_apply->EditValue = $this->employee_can_apply->options(false);
            $this->employee_can_apply->PlaceHolder = RemoveHtml($this->employee_can_apply->caption());

            // apply_beyond_current
            $this->apply_beyond_current->EditCustomAttributes = "";
            $this->apply_beyond_current->EditValue = $this->apply_beyond_current->options(false);
            $this->apply_beyond_current->PlaceHolder = RemoveHtml($this->apply_beyond_current->caption());

            // leave_accrue
            $this->leave_accrue->EditCustomAttributes = "";
            $this->leave_accrue->EditValue = $this->leave_accrue->options(false);
            $this->leave_accrue->PlaceHolder = RemoveHtml($this->leave_accrue->caption());

            // carried_forward
            $this->carried_forward->EditCustomAttributes = "";
            $this->carried_forward->EditValue = $this->carried_forward->options(false);
            $this->carried_forward->PlaceHolder = RemoveHtml($this->carried_forward->caption());

            // default_per_year
            $this->default_per_year->EditAttrs["class"] = "form-control";
            $this->default_per_year->EditCustomAttributes = "";
            $this->default_per_year->EditValue = HtmlEncode($this->default_per_year->CurrentValue);
            $this->default_per_year->PlaceHolder = RemoveHtml($this->default_per_year->caption());
            if (strval($this->default_per_year->EditValue) != "" && is_numeric($this->default_per_year->EditValue)) {
                $this->default_per_year->EditValue = FormatNumber($this->default_per_year->EditValue, -2, -2, -2, -2);
            }

            // carried_forward_percentage
            $this->carried_forward_percentage->EditAttrs["class"] = "form-control";
            $this->carried_forward_percentage->EditCustomAttributes = "";
            $this->carried_forward_percentage->EditValue = HtmlEncode($this->carried_forward_percentage->CurrentValue);
            $this->carried_forward_percentage->PlaceHolder = RemoveHtml($this->carried_forward_percentage->caption());

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->EditAttrs["class"] = "form-control";
            $this->carried_forward_leave_availability->EditCustomAttributes = "";
            $this->carried_forward_leave_availability->EditValue = HtmlEncode($this->carried_forward_leave_availability->CurrentValue);
            $this->carried_forward_leave_availability->PlaceHolder = RemoveHtml($this->carried_forward_leave_availability->caption());

            // propotionate_on_joined_date
            $this->propotionate_on_joined_date->EditCustomAttributes = "";
            $this->propotionate_on_joined_date->EditValue = $this->propotionate_on_joined_date->options(false);
            $this->propotionate_on_joined_date->PlaceHolder = RemoveHtml($this->propotionate_on_joined_date->caption());

            // send_notification_emails
            $this->send_notification_emails->EditCustomAttributes = "";
            $this->send_notification_emails->EditValue = $this->send_notification_emails->options(false);
            $this->send_notification_emails->PlaceHolder = RemoveHtml($this->send_notification_emails->caption());

            // leave_group
            $this->leave_group->EditAttrs["class"] = "form-control";
            $this->leave_group->EditCustomAttributes = "";
            $this->leave_group->EditValue = HtmlEncode($this->leave_group->CurrentValue);
            $this->leave_group->PlaceHolder = RemoveHtml($this->leave_group->caption());

            // leave_color
            $this->leave_color->EditAttrs["class"] = "form-control";
            $this->leave_color->EditCustomAttributes = "";
            if (!$this->leave_color->Raw) {
                $this->leave_color->CurrentValue = HtmlDecode($this->leave_color->CurrentValue);
            }
            $this->leave_color->EditValue = HtmlEncode($this->leave_color->CurrentValue);
            $this->leave_color->PlaceHolder = RemoveHtml($this->leave_color->caption());

            // max_carried_forward_amount
            $this->max_carried_forward_amount->EditAttrs["class"] = "form-control";
            $this->max_carried_forward_amount->EditCustomAttributes = "";
            $this->max_carried_forward_amount->EditValue = HtmlEncode($this->max_carried_forward_amount->CurrentValue);
            $this->max_carried_forward_amount->PlaceHolder = RemoveHtml($this->max_carried_forward_amount->caption());

            // HospID

            // Add refer script

            // name
            $this->name->LinkCustomAttributes = "";
            $this->name->HrefValue = "";

            // supervisor_leave_assign
            $this->supervisor_leave_assign->LinkCustomAttributes = "";
            $this->supervisor_leave_assign->HrefValue = "";

            // employee_can_apply
            $this->employee_can_apply->LinkCustomAttributes = "";
            $this->employee_can_apply->HrefValue = "";

            // apply_beyond_current
            $this->apply_beyond_current->LinkCustomAttributes = "";
            $this->apply_beyond_current->HrefValue = "";

            // leave_accrue
            $this->leave_accrue->LinkCustomAttributes = "";
            $this->leave_accrue->HrefValue = "";

            // carried_forward
            $this->carried_forward->LinkCustomAttributes = "";
            $this->carried_forward->HrefValue = "";

            // default_per_year
            $this->default_per_year->LinkCustomAttributes = "";
            $this->default_per_year->HrefValue = "";

            // carried_forward_percentage
            $this->carried_forward_percentage->LinkCustomAttributes = "";
            $this->carried_forward_percentage->HrefValue = "";

            // carried_forward_leave_availability
            $this->carried_forward_leave_availability->LinkCustomAttributes = "";
            $this->carried_forward_leave_availability->HrefValue = "";

            // propotionate_on_joined_date
            $this->propotionate_on_joined_date->LinkCustomAttributes = "";
            $this->propotionate_on_joined_date->HrefValue = "";

            // send_notification_emails
            $this->send_notification_emails->LinkCustomAttributes = "";
            $this->send_notification_emails->HrefValue = "";

            // leave_group
            $this->leave_group->LinkCustomAttributes = "";
            $this->leave_group->HrefValue = "";

            // leave_color
            $this->leave_color->LinkCustomAttributes = "";
            $this->leave_color->HrefValue = "";

            // max_carried_forward_amount
            $this->max_carried_forward_amount->LinkCustomAttributes = "";
            $this->max_carried_forward_amount->HrefValue = "";

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
        if ($this->name->Required) {
            if (!$this->name->IsDetailKey && EmptyValue($this->name->FormValue)) {
                $this->name->addErrorMessage(str_replace("%s", $this->name->caption(), $this->name->RequiredErrorMessage));
            }
        }
        if ($this->supervisor_leave_assign->Required) {
            if ($this->supervisor_leave_assign->FormValue == "") {
                $this->supervisor_leave_assign->addErrorMessage(str_replace("%s", $this->supervisor_leave_assign->caption(), $this->supervisor_leave_assign->RequiredErrorMessage));
            }
        }
        if ($this->employee_can_apply->Required) {
            if ($this->employee_can_apply->FormValue == "") {
                $this->employee_can_apply->addErrorMessage(str_replace("%s", $this->employee_can_apply->caption(), $this->employee_can_apply->RequiredErrorMessage));
            }
        }
        if ($this->apply_beyond_current->Required) {
            if ($this->apply_beyond_current->FormValue == "") {
                $this->apply_beyond_current->addErrorMessage(str_replace("%s", $this->apply_beyond_current->caption(), $this->apply_beyond_current->RequiredErrorMessage));
            }
        }
        if ($this->leave_accrue->Required) {
            if ($this->leave_accrue->FormValue == "") {
                $this->leave_accrue->addErrorMessage(str_replace("%s", $this->leave_accrue->caption(), $this->leave_accrue->RequiredErrorMessage));
            }
        }
        if ($this->carried_forward->Required) {
            if ($this->carried_forward->FormValue == "") {
                $this->carried_forward->addErrorMessage(str_replace("%s", $this->carried_forward->caption(), $this->carried_forward->RequiredErrorMessage));
            }
        }
        if ($this->default_per_year->Required) {
            if (!$this->default_per_year->IsDetailKey && EmptyValue($this->default_per_year->FormValue)) {
                $this->default_per_year->addErrorMessage(str_replace("%s", $this->default_per_year->caption(), $this->default_per_year->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->default_per_year->FormValue)) {
            $this->default_per_year->addErrorMessage($this->default_per_year->getErrorMessage(false));
        }
        if ($this->carried_forward_percentage->Required) {
            if (!$this->carried_forward_percentage->IsDetailKey && EmptyValue($this->carried_forward_percentage->FormValue)) {
                $this->carried_forward_percentage->addErrorMessage(str_replace("%s", $this->carried_forward_percentage->caption(), $this->carried_forward_percentage->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->carried_forward_percentage->FormValue)) {
            $this->carried_forward_percentage->addErrorMessage($this->carried_forward_percentage->getErrorMessage(false));
        }
        if ($this->carried_forward_leave_availability->Required) {
            if (!$this->carried_forward_leave_availability->IsDetailKey && EmptyValue($this->carried_forward_leave_availability->FormValue)) {
                $this->carried_forward_leave_availability->addErrorMessage(str_replace("%s", $this->carried_forward_leave_availability->caption(), $this->carried_forward_leave_availability->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->carried_forward_leave_availability->FormValue)) {
            $this->carried_forward_leave_availability->addErrorMessage($this->carried_forward_leave_availability->getErrorMessage(false));
        }
        if ($this->propotionate_on_joined_date->Required) {
            if ($this->propotionate_on_joined_date->FormValue == "") {
                $this->propotionate_on_joined_date->addErrorMessage(str_replace("%s", $this->propotionate_on_joined_date->caption(), $this->propotionate_on_joined_date->RequiredErrorMessage));
            }
        }
        if ($this->send_notification_emails->Required) {
            if ($this->send_notification_emails->FormValue == "") {
                $this->send_notification_emails->addErrorMessage(str_replace("%s", $this->send_notification_emails->caption(), $this->send_notification_emails->RequiredErrorMessage));
            }
        }
        if ($this->leave_group->Required) {
            if (!$this->leave_group->IsDetailKey && EmptyValue($this->leave_group->FormValue)) {
                $this->leave_group->addErrorMessage(str_replace("%s", $this->leave_group->caption(), $this->leave_group->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->leave_group->FormValue)) {
            $this->leave_group->addErrorMessage($this->leave_group->getErrorMessage(false));
        }
        if ($this->leave_color->Required) {
            if (!$this->leave_color->IsDetailKey && EmptyValue($this->leave_color->FormValue)) {
                $this->leave_color->addErrorMessage(str_replace("%s", $this->leave_color->caption(), $this->leave_color->RequiredErrorMessage));
            }
        }
        if ($this->max_carried_forward_amount->Required) {
            if (!$this->max_carried_forward_amount->IsDetailKey && EmptyValue($this->max_carried_forward_amount->FormValue)) {
                $this->max_carried_forward_amount->addErrorMessage(str_replace("%s", $this->max_carried_forward_amount->caption(), $this->max_carried_forward_amount->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->max_carried_forward_amount->FormValue)) {
            $this->max_carried_forward_amount->addErrorMessage($this->max_carried_forward_amount->getErrorMessage(false));
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
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
        if ($this->name->CurrentValue != "") { // Check field with unique index
            $filter = "(`name` = '" . AdjustSql($this->name->CurrentValue, $this->Dbid) . "')";
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $idxErrMsg = str_replace("%f", $this->name->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->name->CurrentValue, $idxErrMsg);
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

        // name
        $this->name->setDbValueDef($rsnew, $this->name->CurrentValue, "", false);

        // supervisor_leave_assign
        $this->supervisor_leave_assign->setDbValueDef($rsnew, $this->supervisor_leave_assign->CurrentValue, null, strval($this->supervisor_leave_assign->CurrentValue) == "");

        // employee_can_apply
        $this->employee_can_apply->setDbValueDef($rsnew, $this->employee_can_apply->CurrentValue, null, strval($this->employee_can_apply->CurrentValue) == "");

        // apply_beyond_current
        $this->apply_beyond_current->setDbValueDef($rsnew, $this->apply_beyond_current->CurrentValue, null, strval($this->apply_beyond_current->CurrentValue) == "");

        // leave_accrue
        $this->leave_accrue->setDbValueDef($rsnew, $this->leave_accrue->CurrentValue, null, strval($this->leave_accrue->CurrentValue) == "");

        // carried_forward
        $this->carried_forward->setDbValueDef($rsnew, $this->carried_forward->CurrentValue, null, strval($this->carried_forward->CurrentValue) == "");

        // default_per_year
        $this->default_per_year->setDbValueDef($rsnew, $this->default_per_year->CurrentValue, 0, false);

        // carried_forward_percentage
        $this->carried_forward_percentage->setDbValueDef($rsnew, $this->carried_forward_percentage->CurrentValue, null, strval($this->carried_forward_percentage->CurrentValue) == "");

        // carried_forward_leave_availability
        $this->carried_forward_leave_availability->setDbValueDef($rsnew, $this->carried_forward_leave_availability->CurrentValue, null, strval($this->carried_forward_leave_availability->CurrentValue) == "");

        // propotionate_on_joined_date
        $this->propotionate_on_joined_date->setDbValueDef($rsnew, $this->propotionate_on_joined_date->CurrentValue, null, strval($this->propotionate_on_joined_date->CurrentValue) == "");

        // send_notification_emails
        $this->send_notification_emails->setDbValueDef($rsnew, $this->send_notification_emails->CurrentValue, null, strval($this->send_notification_emails->CurrentValue) == "");

        // leave_group
        $this->leave_group->setDbValueDef($rsnew, $this->leave_group->CurrentValue, null, false);

        // leave_color
        $this->leave_color->setDbValueDef($rsnew, $this->leave_color->CurrentValue, null, false);

        // max_carried_forward_amount
        $this->max_carried_forward_amount->setDbValueDef($rsnew, $this->max_carried_forward_amount->CurrentValue, null, strval($this->max_carried_forward_amount->CurrentValue) == "");

        // HospID
        $this->HospID->CurrentValue = HospitalID();
        $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("HrLeavetypesList"), "", $this->TableVar, true);
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
                case "x_supervisor_leave_assign":
                    break;
                case "x_employee_can_apply":
                    break;
                case "x_apply_beyond_current":
                    break;
                case "x_leave_accrue":
                    break;
                case "x_carried_forward":
                    break;
                case "x_propotionate_on_joined_date":
                    break;
                case "x_send_notification_emails":
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
