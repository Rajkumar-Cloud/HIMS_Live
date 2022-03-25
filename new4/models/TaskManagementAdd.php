<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class TaskManagementAdd extends TaskManagement
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'task_management';

    // Page object name
    public $PageObjName = "TaskManagementAdd";

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

        // Table object (task_management)
        if (!isset($GLOBALS["task_management"]) || get_class($GLOBALS["task_management"]) == PROJECT_NAMESPACE . "task_management") {
            $GLOBALS["task_management"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'task_management');
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
                $doc = new $class(Container("task_management"));
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
                    if ($pageName == "TaskManagementView") {
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
        $this->TaskName->setVisibility();
        $this->AssignTo->setVisibility();
        $this->Description->setVisibility();
        $this->StartDate->setVisibility();
        $this->EndDate->setVisibility();
        $this->StatusOfTask->setVisibility();
        $this->ForwardTo->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->GetUserName->setVisibility();
        $this->GetModifiedName->Visible = false;
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
        $this->setupLookupOptions($this->AssignTo);
        $this->setupLookupOptions($this->ForwardTo);

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
                    $this->terminate("TaskManagementList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "TaskManagementList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "TaskManagementView") {
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
        $this->TaskName->CurrentValue = null;
        $this->TaskName->OldValue = $this->TaskName->CurrentValue;
        $this->AssignTo->CurrentValue = null;
        $this->AssignTo->OldValue = $this->AssignTo->CurrentValue;
        $this->Description->CurrentValue = null;
        $this->Description->OldValue = $this->Description->CurrentValue;
        $this->StartDate->CurrentValue = null;
        $this->StartDate->OldValue = $this->StartDate->CurrentValue;
        $this->EndDate->CurrentValue = null;
        $this->EndDate->OldValue = $this->EndDate->CurrentValue;
        $this->StatusOfTask->CurrentValue = null;
        $this->StatusOfTask->OldValue = $this->StatusOfTask->CurrentValue;
        $this->ForwardTo->CurrentValue = null;
        $this->ForwardTo->OldValue = $this->ForwardTo->CurrentValue;
        $this->createdby->CurrentValue = null;
        $this->createdby->OldValue = $this->createdby->CurrentValue;
        $this->createddatetime->CurrentValue = null;
        $this->createddatetime->OldValue = $this->createddatetime->CurrentValue;
        $this->modifiedby->CurrentValue = null;
        $this->modifiedby->OldValue = $this->modifiedby->CurrentValue;
        $this->modifieddatetime->CurrentValue = null;
        $this->modifieddatetime->OldValue = $this->modifieddatetime->CurrentValue;
        $this->GetUserName->CurrentValue = null;
        $this->GetUserName->OldValue = $this->GetUserName->CurrentValue;
        $this->GetModifiedName->CurrentValue = null;
        $this->GetModifiedName->OldValue = $this->GetModifiedName->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'TaskName' first before field var 'x_TaskName'
        $val = $CurrentForm->hasValue("TaskName") ? $CurrentForm->getValue("TaskName") : $CurrentForm->getValue("x_TaskName");
        if (!$this->TaskName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TaskName->Visible = false; // Disable update for API request
            } else {
                $this->TaskName->setFormValue($val);
            }
        }

        // Check field name 'AssignTo' first before field var 'x_AssignTo'
        $val = $CurrentForm->hasValue("AssignTo") ? $CurrentForm->getValue("AssignTo") : $CurrentForm->getValue("x_AssignTo");
        if (!$this->AssignTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->AssignTo->Visible = false; // Disable update for API request
            } else {
                $this->AssignTo->setFormValue($val);
            }
        }

        // Check field name 'Description' first before field var 'x_Description'
        $val = $CurrentForm->hasValue("Description") ? $CurrentForm->getValue("Description") : $CurrentForm->getValue("x_Description");
        if (!$this->Description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Description->Visible = false; // Disable update for API request
            } else {
                $this->Description->setFormValue($val);
            }
        }

        // Check field name 'StartDate' first before field var 'x_StartDate'
        $val = $CurrentForm->hasValue("StartDate") ? $CurrentForm->getValue("StartDate") : $CurrentForm->getValue("x_StartDate");
        if (!$this->StartDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StartDate->Visible = false; // Disable update for API request
            } else {
                $this->StartDate->setFormValue($val);
            }
            $this->StartDate->CurrentValue = UnFormatDateTime($this->StartDate->CurrentValue, 7);
        }

        // Check field name 'EndDate' first before field var 'x_EndDate'
        $val = $CurrentForm->hasValue("EndDate") ? $CurrentForm->getValue("EndDate") : $CurrentForm->getValue("x_EndDate");
        if (!$this->EndDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndDate->Visible = false; // Disable update for API request
            } else {
                $this->EndDate->setFormValue($val);
            }
            $this->EndDate->CurrentValue = UnFormatDateTime($this->EndDate->CurrentValue, 7);
        }

        // Check field name 'StatusOfTask' first before field var 'x_StatusOfTask'
        $val = $CurrentForm->hasValue("StatusOfTask") ? $CurrentForm->getValue("StatusOfTask") : $CurrentForm->getValue("x_StatusOfTask");
        if (!$this->StatusOfTask->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->StatusOfTask->Visible = false; // Disable update for API request
            } else {
                $this->StatusOfTask->setFormValue($val);
            }
        }

        // Check field name 'ForwardTo' first before field var 'x_ForwardTo'
        $val = $CurrentForm->hasValue("ForwardTo") ? $CurrentForm->getValue("ForwardTo") : $CurrentForm->getValue("x_ForwardTo");
        if (!$this->ForwardTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ForwardTo->Visible = false; // Disable update for API request
            } else {
                $this->ForwardTo->setFormValue($val);
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

        // Check field name 'GetUserName' first before field var 'x_GetUserName'
        $val = $CurrentForm->hasValue("GetUserName") ? $CurrentForm->getValue("GetUserName") : $CurrentForm->getValue("x_GetUserName");
        if (!$this->GetUserName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GetUserName->Visible = false; // Disable update for API request
            } else {
                $this->GetUserName->setFormValue($val);
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
        $this->TaskName->CurrentValue = $this->TaskName->FormValue;
        $this->AssignTo->CurrentValue = $this->AssignTo->FormValue;
        $this->Description->CurrentValue = $this->Description->FormValue;
        $this->StartDate->CurrentValue = $this->StartDate->FormValue;
        $this->StartDate->CurrentValue = UnFormatDateTime($this->StartDate->CurrentValue, 7);
        $this->EndDate->CurrentValue = $this->EndDate->FormValue;
        $this->EndDate->CurrentValue = UnFormatDateTime($this->EndDate->CurrentValue, 7);
        $this->StatusOfTask->CurrentValue = $this->StatusOfTask->FormValue;
        $this->ForwardTo->CurrentValue = $this->ForwardTo->FormValue;
        $this->createdby->CurrentValue = $this->createdby->FormValue;
        $this->createddatetime->CurrentValue = $this->createddatetime->FormValue;
        $this->createddatetime->CurrentValue = UnFormatDateTime($this->createddatetime->CurrentValue, 0);
        $this->GetUserName->CurrentValue = $this->GetUserName->FormValue;
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
        $this->TaskName->setDbValue($row['TaskName']);
        $this->AssignTo->setDbValue($row['AssignTo']);
        $this->Description->setDbValue($row['Description']);
        $this->StartDate->setDbValue($row['StartDate']);
        $this->EndDate->setDbValue($row['EndDate']);
        $this->StatusOfTask->setDbValue($row['StatusOfTask']);
        $this->ForwardTo->setDbValue($row['ForwardTo']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->GetUserName->setDbValue($row['GetUserName']);
        $this->GetModifiedName->setDbValue($row['GetModifiedName']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['TaskName'] = $this->TaskName->CurrentValue;
        $row['AssignTo'] = $this->AssignTo->CurrentValue;
        $row['Description'] = $this->Description->CurrentValue;
        $row['StartDate'] = $this->StartDate->CurrentValue;
        $row['EndDate'] = $this->EndDate->CurrentValue;
        $row['StatusOfTask'] = $this->StatusOfTask->CurrentValue;
        $row['ForwardTo'] = $this->ForwardTo->CurrentValue;
        $row['createdby'] = $this->createdby->CurrentValue;
        $row['createddatetime'] = $this->createddatetime->CurrentValue;
        $row['modifiedby'] = $this->modifiedby->CurrentValue;
        $row['modifieddatetime'] = $this->modifieddatetime->CurrentValue;
        $row['GetUserName'] = $this->GetUserName->CurrentValue;
        $row['GetModifiedName'] = $this->GetModifiedName->CurrentValue;
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

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // TaskName

        // AssignTo

        // Description

        // StartDate

        // EndDate

        // StatusOfTask

        // ForwardTo

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // GetUserName

        // GetModifiedName

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // TaskName
            $this->TaskName->ViewValue = $this->TaskName->CurrentValue;
            $this->TaskName->ViewCustomAttributes = "";

            // AssignTo
            $curVal = trim(strval($this->AssignTo->CurrentValue));
            if ($curVal != "") {
                $this->AssignTo->ViewValue = $this->AssignTo->lookupCacheOption($curVal);
                if ($this->AssignTo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID` = '".HospitalID()."' ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->AssignTo->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AssignTo->Lookup->renderViewRow($rswrk[0]);
                        $this->AssignTo->ViewValue = $this->AssignTo->displayValue($arwrk);
                    } else {
                        $this->AssignTo->ViewValue = $this->AssignTo->CurrentValue;
                    }
                }
            } else {
                $this->AssignTo->ViewValue = null;
            }
            $this->AssignTo->ViewCustomAttributes = "";

            // Description
            $this->Description->ViewValue = $this->Description->CurrentValue;
            $this->Description->ViewCustomAttributes = "";

            // StartDate
            $this->StartDate->ViewValue = $this->StartDate->CurrentValue;
            $this->StartDate->ViewValue = FormatDateTime($this->StartDate->ViewValue, 7);
            $this->StartDate->ViewCustomAttributes = "";

            // EndDate
            $this->EndDate->ViewValue = $this->EndDate->CurrentValue;
            $this->EndDate->ViewValue = FormatDateTime($this->EndDate->ViewValue, 7);
            $this->EndDate->ViewCustomAttributes = "";

            // StatusOfTask
            if (strval($this->StatusOfTask->CurrentValue) != "") {
                $this->StatusOfTask->ViewValue = $this->StatusOfTask->optionCaption($this->StatusOfTask->CurrentValue);
            } else {
                $this->StatusOfTask->ViewValue = null;
            }
            $this->StatusOfTask->ViewCustomAttributes = "";

            // ForwardTo
            $curVal = trim(strval($this->ForwardTo->CurrentValue));
            if ($curVal != "") {
                $this->ForwardTo->ViewValue = $this->ForwardTo->lookupCacheOption($curVal);
                if ($this->ForwardTo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`User_Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HospID` = '".HospitalID()."' ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->ForwardTo->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ForwardTo->Lookup->renderViewRow($rswrk[0]);
                        $this->ForwardTo->ViewValue = $this->ForwardTo->displayValue($arwrk);
                    } else {
                        $this->ForwardTo->ViewValue = $this->ForwardTo->CurrentValue;
                    }
                }
            } else {
                $this->ForwardTo->ViewValue = null;
            }
            $this->ForwardTo->ViewCustomAttributes = "";

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

            // GetUserName
            $this->GetUserName->ViewValue = $this->GetUserName->CurrentValue;
            $this->GetUserName->ViewCustomAttributes = "";

            // GetModifiedName
            $this->GetModifiedName->ViewValue = $this->GetModifiedName->CurrentValue;
            $this->GetModifiedName->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // TaskName
            $this->TaskName->LinkCustomAttributes = "";
            $this->TaskName->HrefValue = "";
            $this->TaskName->TooltipValue = "";

            // AssignTo
            $this->AssignTo->LinkCustomAttributes = "";
            $this->AssignTo->HrefValue = "";
            $this->AssignTo->TooltipValue = "";

            // Description
            $this->Description->LinkCustomAttributes = "";
            $this->Description->HrefValue = "";
            $this->Description->TooltipValue = "";

            // StartDate
            $this->StartDate->LinkCustomAttributes = "";
            $this->StartDate->HrefValue = "";
            $this->StartDate->TooltipValue = "";

            // EndDate
            $this->EndDate->LinkCustomAttributes = "";
            $this->EndDate->HrefValue = "";
            $this->EndDate->TooltipValue = "";

            // StatusOfTask
            $this->StatusOfTask->LinkCustomAttributes = "";
            $this->StatusOfTask->HrefValue = "";
            $this->StatusOfTask->TooltipValue = "";

            // ForwardTo
            $this->ForwardTo->LinkCustomAttributes = "";
            $this->ForwardTo->HrefValue = "";
            $this->ForwardTo->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";
            $this->GetUserName->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // TaskName
            $this->TaskName->EditAttrs["class"] = "form-control";
            $this->TaskName->EditCustomAttributes = "";
            if (!$this->TaskName->Raw) {
                $this->TaskName->CurrentValue = HtmlDecode($this->TaskName->CurrentValue);
            }
            $this->TaskName->EditValue = HtmlEncode($this->TaskName->CurrentValue);
            $this->TaskName->PlaceHolder = RemoveHtml($this->TaskName->caption());

            // AssignTo
            $this->AssignTo->EditAttrs["class"] = "form-control";
            $this->AssignTo->EditCustomAttributes = "";
            $curVal = trim(strval($this->AssignTo->CurrentValue));
            if ($curVal != "") {
                $this->AssignTo->ViewValue = $this->AssignTo->lookupCacheOption($curVal);
            } else {
                $this->AssignTo->ViewValue = $this->AssignTo->Lookup !== null && is_array($this->AssignTo->Lookup->Options) ? $curVal : null;
            }
            if ($this->AssignTo->ViewValue !== null) { // Load from cache
                $this->AssignTo->EditValue = array_values($this->AssignTo->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`User_Name`" . SearchString("=", $this->AssignTo->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`HospID` = '".HospitalID()."' ";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->AssignTo->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->AssignTo->EditValue = $arwrk;
            }
            $this->AssignTo->PlaceHolder = RemoveHtml($this->AssignTo->caption());

            // Description
            $this->Description->EditAttrs["class"] = "form-control";
            $this->Description->EditCustomAttributes = "";
            $this->Description->EditValue = HtmlEncode($this->Description->CurrentValue);
            $this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

            // StartDate
            $this->StartDate->EditAttrs["class"] = "form-control";
            $this->StartDate->EditCustomAttributes = "";
            $this->StartDate->EditValue = HtmlEncode(FormatDateTime($this->StartDate->CurrentValue, 7));
            $this->StartDate->PlaceHolder = RemoveHtml($this->StartDate->caption());

            // EndDate
            $this->EndDate->EditAttrs["class"] = "form-control";
            $this->EndDate->EditCustomAttributes = "";
            $this->EndDate->EditValue = HtmlEncode(FormatDateTime($this->EndDate->CurrentValue, 7));
            $this->EndDate->PlaceHolder = RemoveHtml($this->EndDate->caption());

            // StatusOfTask
            $this->StatusOfTask->EditAttrs["class"] = "form-control";
            $this->StatusOfTask->EditCustomAttributes = "";
            $this->StatusOfTask->EditValue = $this->StatusOfTask->options(true);
            $this->StatusOfTask->PlaceHolder = RemoveHtml($this->StatusOfTask->caption());

            // ForwardTo
            $this->ForwardTo->EditAttrs["class"] = "form-control";
            $this->ForwardTo->EditCustomAttributes = "";
            $curVal = trim(strval($this->ForwardTo->CurrentValue));
            if ($curVal != "") {
                $this->ForwardTo->ViewValue = $this->ForwardTo->lookupCacheOption($curVal);
            } else {
                $this->ForwardTo->ViewValue = $this->ForwardTo->Lookup !== null && is_array($this->ForwardTo->Lookup->Options) ? $curVal : null;
            }
            if ($this->ForwardTo->ViewValue !== null) { // Load from cache
                $this->ForwardTo->EditValue = array_values($this->ForwardTo->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`User_Name`" . SearchString("=", $this->ForwardTo->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`HospID` = '".HospitalID()."' ";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->ForwardTo->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->ForwardTo->EditValue = $arwrk;
            }
            $this->ForwardTo->PlaceHolder = RemoveHtml($this->ForwardTo->caption());

            // createdby

            // createddatetime

            // GetUserName

            // HospID

            // Add refer script

            // TaskName
            $this->TaskName->LinkCustomAttributes = "";
            $this->TaskName->HrefValue = "";

            // AssignTo
            $this->AssignTo->LinkCustomAttributes = "";
            $this->AssignTo->HrefValue = "";

            // Description
            $this->Description->LinkCustomAttributes = "";
            $this->Description->HrefValue = "";

            // StartDate
            $this->StartDate->LinkCustomAttributes = "";
            $this->StartDate->HrefValue = "";

            // EndDate
            $this->EndDate->LinkCustomAttributes = "";
            $this->EndDate->HrefValue = "";

            // StatusOfTask
            $this->StatusOfTask->LinkCustomAttributes = "";
            $this->StatusOfTask->HrefValue = "";

            // ForwardTo
            $this->ForwardTo->LinkCustomAttributes = "";
            $this->ForwardTo->HrefValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";

            // GetUserName
            $this->GetUserName->LinkCustomAttributes = "";
            $this->GetUserName->HrefValue = "";

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
        if ($this->TaskName->Required) {
            if (!$this->TaskName->IsDetailKey && EmptyValue($this->TaskName->FormValue)) {
                $this->TaskName->addErrorMessage(str_replace("%s", $this->TaskName->caption(), $this->TaskName->RequiredErrorMessage));
            }
        }
        if ($this->AssignTo->Required) {
            if (!$this->AssignTo->IsDetailKey && EmptyValue($this->AssignTo->FormValue)) {
                $this->AssignTo->addErrorMessage(str_replace("%s", $this->AssignTo->caption(), $this->AssignTo->RequiredErrorMessage));
            }
        }
        if ($this->Description->Required) {
            if (!$this->Description->IsDetailKey && EmptyValue($this->Description->FormValue)) {
                $this->Description->addErrorMessage(str_replace("%s", $this->Description->caption(), $this->Description->RequiredErrorMessage));
            }
        }
        if ($this->StartDate->Required) {
            if (!$this->StartDate->IsDetailKey && EmptyValue($this->StartDate->FormValue)) {
                $this->StartDate->addErrorMessage(str_replace("%s", $this->StartDate->caption(), $this->StartDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->StartDate->FormValue)) {
            $this->StartDate->addErrorMessage($this->StartDate->getErrorMessage(false));
        }
        if ($this->EndDate->Required) {
            if (!$this->EndDate->IsDetailKey && EmptyValue($this->EndDate->FormValue)) {
                $this->EndDate->addErrorMessage(str_replace("%s", $this->EndDate->caption(), $this->EndDate->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->EndDate->FormValue)) {
            $this->EndDate->addErrorMessage($this->EndDate->getErrorMessage(false));
        }
        if ($this->StatusOfTask->Required) {
            if (!$this->StatusOfTask->IsDetailKey && EmptyValue($this->StatusOfTask->FormValue)) {
                $this->StatusOfTask->addErrorMessage(str_replace("%s", $this->StatusOfTask->caption(), $this->StatusOfTask->RequiredErrorMessage));
            }
        }
        if ($this->ForwardTo->Required) {
            if (!$this->ForwardTo->IsDetailKey && EmptyValue($this->ForwardTo->FormValue)) {
                $this->ForwardTo->addErrorMessage(str_replace("%s", $this->ForwardTo->caption(), $this->ForwardTo->RequiredErrorMessage));
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
        if ($this->GetUserName->Required) {
            if (!$this->GetUserName->IsDetailKey && EmptyValue($this->GetUserName->FormValue)) {
                $this->GetUserName->addErrorMessage(str_replace("%s", $this->GetUserName->caption(), $this->GetUserName->RequiredErrorMessage));
            }
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
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // TaskName
        $this->TaskName->setDbValueDef($rsnew, $this->TaskName->CurrentValue, null, false);

        // AssignTo
        $this->AssignTo->setDbValueDef($rsnew, $this->AssignTo->CurrentValue, null, false);

        // Description
        $this->Description->setDbValueDef($rsnew, $this->Description->CurrentValue, null, false);

        // StartDate
        $this->StartDate->setDbValueDef($rsnew, UnFormatDateTime($this->StartDate->CurrentValue, 7), null, false);

        // EndDate
        $this->EndDate->setDbValueDef($rsnew, UnFormatDateTime($this->EndDate->CurrentValue, 7), null, false);

        // StatusOfTask
        $this->StatusOfTask->setDbValueDef($rsnew, $this->StatusOfTask->CurrentValue, null, false);

        // ForwardTo
        $this->ForwardTo->setDbValueDef($rsnew, $this->ForwardTo->CurrentValue, null, false);

        // createdby
        $this->createdby->CurrentValue = CurrentUserName();
        $this->createdby->setDbValueDef($rsnew, $this->createdby->CurrentValue, null);

        // createddatetime
        $this->createddatetime->CurrentValue = CurrentDateTime();
        $this->createddatetime->setDbValueDef($rsnew, $this->createddatetime->CurrentValue, null);

        // GetUserName
        $this->GetUserName->CurrentValue = GetUserName();
        $this->GetUserName->setDbValueDef($rsnew, $this->GetUserName->CurrentValue, null);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("TaskManagementList"), "", $this->TableVar, true);
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
                case "x_AssignTo":
                    $lookupFilter = function () {
                        return "`HospID` = '".HospitalID()."' ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_StatusOfTask":
                    break;
                case "x_ForwardTo":
                    $lookupFilter = function () {
                        return "`HospID` = '".HospitalID()."' ";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
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
