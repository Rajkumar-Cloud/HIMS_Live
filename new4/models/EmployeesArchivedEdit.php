<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeesArchivedEdit extends EmployeesArchived
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employees_archived';

    // Page object name
    public $PageObjName = "EmployeesArchivedEdit";

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

        // Table object (employees_archived)
        if (!isset($GLOBALS["employees_archived"]) || get_class($GLOBALS["employees_archived"]) == PROJECT_NAMESPACE . "employees_archived") {
            $GLOBALS["employees_archived"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employees_archived');
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
                $doc = new $class(Container("employees_archived"));
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
                    if ($pageName == "EmployeesArchivedView") {
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
        $this->ref_id->setVisibility();
        $this->employee_id->setVisibility();
        $this->first_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->ssn_num->setVisibility();
        $this->nic_num->setVisibility();
        $this->other_id->setVisibility();
        $this->work_email->setVisibility();
        $this->joined_date->setVisibility();
        $this->confirmation_date->setVisibility();
        $this->supervisor->setVisibility();
        $this->department->setVisibility();
        $this->termination_date->setVisibility();
        $this->notes->setVisibility();
        $this->data->setVisibility();
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
                    $this->terminate("EmployeesArchivedList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "EmployeesArchivedList") {
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

        // Check field name 'ref_id' first before field var 'x_ref_id'
        $val = $CurrentForm->hasValue("ref_id") ? $CurrentForm->getValue("ref_id") : $CurrentForm->getValue("x_ref_id");
        if (!$this->ref_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ref_id->Visible = false; // Disable update for API request
            } else {
                $this->ref_id->setFormValue($val);
            }
        }

        // Check field name 'employee_id' first before field var 'x_employee_id'
        $val = $CurrentForm->hasValue("employee_id") ? $CurrentForm->getValue("employee_id") : $CurrentForm->getValue("x_employee_id");
        if (!$this->employee_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employee_id->Visible = false; // Disable update for API request
            } else {
                $this->employee_id->setFormValue($val);
            }
        }

        // Check field name 'first_name' first before field var 'x_first_name'
        $val = $CurrentForm->hasValue("first_name") ? $CurrentForm->getValue("first_name") : $CurrentForm->getValue("x_first_name");
        if (!$this->first_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->first_name->Visible = false; // Disable update for API request
            } else {
                $this->first_name->setFormValue($val);
            }
        }

        // Check field name 'last_name' first before field var 'x_last_name'
        $val = $CurrentForm->hasValue("last_name") ? $CurrentForm->getValue("last_name") : $CurrentForm->getValue("x_last_name");
        if (!$this->last_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->last_name->Visible = false; // Disable update for API request
            } else {
                $this->last_name->setFormValue($val);
            }
        }

        // Check field name 'gender' first before field var 'x_gender'
        $val = $CurrentForm->hasValue("gender") ? $CurrentForm->getValue("gender") : $CurrentForm->getValue("x_gender");
        if (!$this->gender->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->gender->Visible = false; // Disable update for API request
            } else {
                $this->gender->setFormValue($val);
            }
        }

        // Check field name 'ssn_num' first before field var 'x_ssn_num'
        $val = $CurrentForm->hasValue("ssn_num") ? $CurrentForm->getValue("ssn_num") : $CurrentForm->getValue("x_ssn_num");
        if (!$this->ssn_num->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ssn_num->Visible = false; // Disable update for API request
            } else {
                $this->ssn_num->setFormValue($val);
            }
        }

        // Check field name 'nic_num' first before field var 'x_nic_num'
        $val = $CurrentForm->hasValue("nic_num") ? $CurrentForm->getValue("nic_num") : $CurrentForm->getValue("x_nic_num");
        if (!$this->nic_num->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nic_num->Visible = false; // Disable update for API request
            } else {
                $this->nic_num->setFormValue($val);
            }
        }

        // Check field name 'other_id' first before field var 'x_other_id'
        $val = $CurrentForm->hasValue("other_id") ? $CurrentForm->getValue("other_id") : $CurrentForm->getValue("x_other_id");
        if (!$this->other_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->other_id->Visible = false; // Disable update for API request
            } else {
                $this->other_id->setFormValue($val);
            }
        }

        // Check field name 'work_email' first before field var 'x_work_email'
        $val = $CurrentForm->hasValue("work_email") ? $CurrentForm->getValue("work_email") : $CurrentForm->getValue("x_work_email");
        if (!$this->work_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->work_email->Visible = false; // Disable update for API request
            } else {
                $this->work_email->setFormValue($val);
            }
        }

        // Check field name 'joined_date' first before field var 'x_joined_date'
        $val = $CurrentForm->hasValue("joined_date") ? $CurrentForm->getValue("joined_date") : $CurrentForm->getValue("x_joined_date");
        if (!$this->joined_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->joined_date->Visible = false; // Disable update for API request
            } else {
                $this->joined_date->setFormValue($val);
            }
            $this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
        }

        // Check field name 'confirmation_date' first before field var 'x_confirmation_date'
        $val = $CurrentForm->hasValue("confirmation_date") ? $CurrentForm->getValue("confirmation_date") : $CurrentForm->getValue("x_confirmation_date");
        if (!$this->confirmation_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->confirmation_date->Visible = false; // Disable update for API request
            } else {
                $this->confirmation_date->setFormValue($val);
            }
            $this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
        }

        // Check field name 'supervisor' first before field var 'x_supervisor'
        $val = $CurrentForm->hasValue("supervisor") ? $CurrentForm->getValue("supervisor") : $CurrentForm->getValue("x_supervisor");
        if (!$this->supervisor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->supervisor->Visible = false; // Disable update for API request
            } else {
                $this->supervisor->setFormValue($val);
            }
        }

        // Check field name 'department' first before field var 'x_department'
        $val = $CurrentForm->hasValue("department") ? $CurrentForm->getValue("department") : $CurrentForm->getValue("x_department");
        if (!$this->department->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->department->Visible = false; // Disable update for API request
            } else {
                $this->department->setFormValue($val);
            }
        }

        // Check field name 'termination_date' first before field var 'x_termination_date'
        $val = $CurrentForm->hasValue("termination_date") ? $CurrentForm->getValue("termination_date") : $CurrentForm->getValue("x_termination_date");
        if (!$this->termination_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->termination_date->Visible = false; // Disable update for API request
            } else {
                $this->termination_date->setFormValue($val);
            }
            $this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
        }

        // Check field name 'notes' first before field var 'x_notes'
        $val = $CurrentForm->hasValue("notes") ? $CurrentForm->getValue("notes") : $CurrentForm->getValue("x_notes");
        if (!$this->notes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->notes->Visible = false; // Disable update for API request
            } else {
                $this->notes->setFormValue($val);
            }
        }

        // Check field name 'data' first before field var 'x_data'
        $val = $CurrentForm->hasValue("data") ? $CurrentForm->getValue("data") : $CurrentForm->getValue("x_data");
        if (!$this->data->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->data->Visible = false; // Disable update for API request
            } else {
                $this->data->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->ref_id->CurrentValue = $this->ref_id->FormValue;
        $this->employee_id->CurrentValue = $this->employee_id->FormValue;
        $this->first_name->CurrentValue = $this->first_name->FormValue;
        $this->last_name->CurrentValue = $this->last_name->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->ssn_num->CurrentValue = $this->ssn_num->FormValue;
        $this->nic_num->CurrentValue = $this->nic_num->FormValue;
        $this->other_id->CurrentValue = $this->other_id->FormValue;
        $this->work_email->CurrentValue = $this->work_email->FormValue;
        $this->joined_date->CurrentValue = $this->joined_date->FormValue;
        $this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
        $this->confirmation_date->CurrentValue = $this->confirmation_date->FormValue;
        $this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
        $this->supervisor->CurrentValue = $this->supervisor->FormValue;
        $this->department->CurrentValue = $this->department->FormValue;
        $this->termination_date->CurrentValue = $this->termination_date->FormValue;
        $this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
        $this->notes->CurrentValue = $this->notes->FormValue;
        $this->data->CurrentValue = $this->data->FormValue;
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
        $this->ref_id->setDbValue($row['ref_id']);
        $this->employee_id->setDbValue($row['employee_id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->work_email->setDbValue($row['work_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->department->setDbValue($row['department']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->data->setDbValue($row['data']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ref_id'] = null;
        $row['employee_id'] = null;
        $row['first_name'] = null;
        $row['last_name'] = null;
        $row['gender'] = null;
        $row['ssn_num'] = null;
        $row['nic_num'] = null;
        $row['other_id'] = null;
        $row['work_email'] = null;
        $row['joined_date'] = null;
        $row['confirmation_date'] = null;
        $row['supervisor'] = null;
        $row['department'] = null;
        $row['termination_date'] = null;
        $row['notes'] = null;
        $row['data'] = null;
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

        // ref_id

        // employee_id

        // first_name

        // last_name

        // gender

        // ssn_num

        // nic_num

        // other_id

        // work_email

        // joined_date

        // confirmation_date

        // supervisor

        // department

        // termination_date

        // notes

        // data
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ref_id
            $this->ref_id->ViewValue = $this->ref_id->CurrentValue;
            $this->ref_id->ViewValue = FormatNumber($this->ref_id->ViewValue, 0, -2, -2, -2);
            $this->ref_id->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            if (strval($this->gender->CurrentValue) != "") {
                $this->gender->ViewValue = $this->gender->optionCaption($this->gender->CurrentValue);
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // ssn_num
            $this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
            $this->ssn_num->ViewCustomAttributes = "";

            // nic_num
            $this->nic_num->ViewValue = $this->nic_num->CurrentValue;
            $this->nic_num->ViewCustomAttributes = "";

            // other_id
            $this->other_id->ViewValue = $this->other_id->CurrentValue;
            $this->other_id->ViewCustomAttributes = "";

            // work_email
            $this->work_email->ViewValue = $this->work_email->CurrentValue;
            $this->work_email->ViewCustomAttributes = "";

            // joined_date
            $this->joined_date->ViewValue = $this->joined_date->CurrentValue;
            $this->joined_date->ViewValue = FormatDateTime($this->joined_date->ViewValue, 0);
            $this->joined_date->ViewCustomAttributes = "";

            // confirmation_date
            $this->confirmation_date->ViewValue = $this->confirmation_date->CurrentValue;
            $this->confirmation_date->ViewValue = FormatDateTime($this->confirmation_date->ViewValue, 0);
            $this->confirmation_date->ViewCustomAttributes = "";

            // supervisor
            $this->supervisor->ViewValue = $this->supervisor->CurrentValue;
            $this->supervisor->ViewValue = FormatNumber($this->supervisor->ViewValue, 0, -2, -2, -2);
            $this->supervisor->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
            $this->department->ViewCustomAttributes = "";

            // termination_date
            $this->termination_date->ViewValue = $this->termination_date->CurrentValue;
            $this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
            $this->termination_date->ViewCustomAttributes = "";

            // notes
            $this->notes->ViewValue = $this->notes->CurrentValue;
            $this->notes->ViewCustomAttributes = "";

            // data
            $this->data->ViewValue = $this->data->CurrentValue;
            $this->data->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ref_id
            $this->ref_id->LinkCustomAttributes = "";
            $this->ref_id->HrefValue = "";
            $this->ref_id->TooltipValue = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";
            $this->employee_id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // ssn_num
            $this->ssn_num->LinkCustomAttributes = "";
            $this->ssn_num->HrefValue = "";
            $this->ssn_num->TooltipValue = "";

            // nic_num
            $this->nic_num->LinkCustomAttributes = "";
            $this->nic_num->HrefValue = "";
            $this->nic_num->TooltipValue = "";

            // other_id
            $this->other_id->LinkCustomAttributes = "";
            $this->other_id->HrefValue = "";
            $this->other_id->TooltipValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";
            $this->work_email->TooltipValue = "";

            // joined_date
            $this->joined_date->LinkCustomAttributes = "";
            $this->joined_date->HrefValue = "";
            $this->joined_date->TooltipValue = "";

            // confirmation_date
            $this->confirmation_date->LinkCustomAttributes = "";
            $this->confirmation_date->HrefValue = "";
            $this->confirmation_date->TooltipValue = "";

            // supervisor
            $this->supervisor->LinkCustomAttributes = "";
            $this->supervisor->HrefValue = "";
            $this->supervisor->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";
            $this->termination_date->TooltipValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";
            $this->notes->TooltipValue = "";

            // data
            $this->data->LinkCustomAttributes = "";
            $this->data->HrefValue = "";
            $this->data->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ref_id
            $this->ref_id->EditAttrs["class"] = "form-control";
            $this->ref_id->EditCustomAttributes = "";
            $this->ref_id->EditValue = HtmlEncode($this->ref_id->CurrentValue);
            $this->ref_id->PlaceHolder = RemoveHtml($this->ref_id->caption());

            // employee_id
            $this->employee_id->EditAttrs["class"] = "form-control";
            $this->employee_id->EditCustomAttributes = "";
            if (!$this->employee_id->Raw) {
                $this->employee_id->CurrentValue = HtmlDecode($this->employee_id->CurrentValue);
            }
            $this->employee_id->EditValue = HtmlEncode($this->employee_id->CurrentValue);
            $this->employee_id->PlaceHolder = RemoveHtml($this->employee_id->caption());

            // first_name
            $this->first_name->EditAttrs["class"] = "form-control";
            $this->first_name->EditCustomAttributes = "";
            if (!$this->first_name->Raw) {
                $this->first_name->CurrentValue = HtmlDecode($this->first_name->CurrentValue);
            }
            $this->first_name->EditValue = HtmlEncode($this->first_name->CurrentValue);
            $this->first_name->PlaceHolder = RemoveHtml($this->first_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditCustomAttributes = "";
            $this->gender->EditValue = $this->gender->options(false);
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // ssn_num
            $this->ssn_num->EditAttrs["class"] = "form-control";
            $this->ssn_num->EditCustomAttributes = "";
            if (!$this->ssn_num->Raw) {
                $this->ssn_num->CurrentValue = HtmlDecode($this->ssn_num->CurrentValue);
            }
            $this->ssn_num->EditValue = HtmlEncode($this->ssn_num->CurrentValue);
            $this->ssn_num->PlaceHolder = RemoveHtml($this->ssn_num->caption());

            // nic_num
            $this->nic_num->EditAttrs["class"] = "form-control";
            $this->nic_num->EditCustomAttributes = "";
            if (!$this->nic_num->Raw) {
                $this->nic_num->CurrentValue = HtmlDecode($this->nic_num->CurrentValue);
            }
            $this->nic_num->EditValue = HtmlEncode($this->nic_num->CurrentValue);
            $this->nic_num->PlaceHolder = RemoveHtml($this->nic_num->caption());

            // other_id
            $this->other_id->EditAttrs["class"] = "form-control";
            $this->other_id->EditCustomAttributes = "";
            if (!$this->other_id->Raw) {
                $this->other_id->CurrentValue = HtmlDecode($this->other_id->CurrentValue);
            }
            $this->other_id->EditValue = HtmlEncode($this->other_id->CurrentValue);
            $this->other_id->PlaceHolder = RemoveHtml($this->other_id->caption());

            // work_email
            $this->work_email->EditAttrs["class"] = "form-control";
            $this->work_email->EditCustomAttributes = "";
            if (!$this->work_email->Raw) {
                $this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
            }
            $this->work_email->EditValue = HtmlEncode($this->work_email->CurrentValue);
            $this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

            // joined_date
            $this->joined_date->EditAttrs["class"] = "form-control";
            $this->joined_date->EditCustomAttributes = "";
            $this->joined_date->EditValue = HtmlEncode(FormatDateTime($this->joined_date->CurrentValue, 8));
            $this->joined_date->PlaceHolder = RemoveHtml($this->joined_date->caption());

            // confirmation_date
            $this->confirmation_date->EditAttrs["class"] = "form-control";
            $this->confirmation_date->EditCustomAttributes = "";
            $this->confirmation_date->EditValue = HtmlEncode(FormatDateTime($this->confirmation_date->CurrentValue, 8));
            $this->confirmation_date->PlaceHolder = RemoveHtml($this->confirmation_date->caption());

            // supervisor
            $this->supervisor->EditAttrs["class"] = "form-control";
            $this->supervisor->EditCustomAttributes = "";
            $this->supervisor->EditValue = HtmlEncode($this->supervisor->CurrentValue);
            $this->supervisor->PlaceHolder = RemoveHtml($this->supervisor->caption());

            // department
            $this->department->EditAttrs["class"] = "form-control";
            $this->department->EditCustomAttributes = "";
            $this->department->EditValue = HtmlEncode($this->department->CurrentValue);
            $this->department->PlaceHolder = RemoveHtml($this->department->caption());

            // termination_date
            $this->termination_date->EditAttrs["class"] = "form-control";
            $this->termination_date->EditCustomAttributes = "";
            $this->termination_date->EditValue = HtmlEncode(FormatDateTime($this->termination_date->CurrentValue, 8));
            $this->termination_date->PlaceHolder = RemoveHtml($this->termination_date->caption());

            // notes
            $this->notes->EditAttrs["class"] = "form-control";
            $this->notes->EditCustomAttributes = "";
            $this->notes->EditValue = HtmlEncode($this->notes->CurrentValue);
            $this->notes->PlaceHolder = RemoveHtml($this->notes->caption());

            // data
            $this->data->EditAttrs["class"] = "form-control";
            $this->data->EditCustomAttributes = "";
            $this->data->EditValue = HtmlEncode($this->data->CurrentValue);
            $this->data->PlaceHolder = RemoveHtml($this->data->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // ref_id
            $this->ref_id->LinkCustomAttributes = "";
            $this->ref_id->HrefValue = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // ssn_num
            $this->ssn_num->LinkCustomAttributes = "";
            $this->ssn_num->HrefValue = "";

            // nic_num
            $this->nic_num->LinkCustomAttributes = "";
            $this->nic_num->HrefValue = "";

            // other_id
            $this->other_id->LinkCustomAttributes = "";
            $this->other_id->HrefValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";

            // joined_date
            $this->joined_date->LinkCustomAttributes = "";
            $this->joined_date->HrefValue = "";

            // confirmation_date
            $this->confirmation_date->LinkCustomAttributes = "";
            $this->confirmation_date->HrefValue = "";

            // supervisor
            $this->supervisor->LinkCustomAttributes = "";
            $this->supervisor->HrefValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";

            // data
            $this->data->LinkCustomAttributes = "";
            $this->data->HrefValue = "";
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
        if ($this->ref_id->Required) {
            if (!$this->ref_id->IsDetailKey && EmptyValue($this->ref_id->FormValue)) {
                $this->ref_id->addErrorMessage(str_replace("%s", $this->ref_id->caption(), $this->ref_id->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ref_id->FormValue)) {
            $this->ref_id->addErrorMessage($this->ref_id->getErrorMessage(false));
        }
        if ($this->employee_id->Required) {
            if (!$this->employee_id->IsDetailKey && EmptyValue($this->employee_id->FormValue)) {
                $this->employee_id->addErrorMessage(str_replace("%s", $this->employee_id->caption(), $this->employee_id->RequiredErrorMessage));
            }
        }
        if ($this->first_name->Required) {
            if (!$this->first_name->IsDetailKey && EmptyValue($this->first_name->FormValue)) {
                $this->first_name->addErrorMessage(str_replace("%s", $this->first_name->caption(), $this->first_name->RequiredErrorMessage));
            }
        }
        if ($this->last_name->Required) {
            if (!$this->last_name->IsDetailKey && EmptyValue($this->last_name->FormValue)) {
                $this->last_name->addErrorMessage(str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if ($this->gender->FormValue == "") {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->ssn_num->Required) {
            if (!$this->ssn_num->IsDetailKey && EmptyValue($this->ssn_num->FormValue)) {
                $this->ssn_num->addErrorMessage(str_replace("%s", $this->ssn_num->caption(), $this->ssn_num->RequiredErrorMessage));
            }
        }
        if ($this->nic_num->Required) {
            if (!$this->nic_num->IsDetailKey && EmptyValue($this->nic_num->FormValue)) {
                $this->nic_num->addErrorMessage(str_replace("%s", $this->nic_num->caption(), $this->nic_num->RequiredErrorMessage));
            }
        }
        if ($this->other_id->Required) {
            if (!$this->other_id->IsDetailKey && EmptyValue($this->other_id->FormValue)) {
                $this->other_id->addErrorMessage(str_replace("%s", $this->other_id->caption(), $this->other_id->RequiredErrorMessage));
            }
        }
        if ($this->work_email->Required) {
            if (!$this->work_email->IsDetailKey && EmptyValue($this->work_email->FormValue)) {
                $this->work_email->addErrorMessage(str_replace("%s", $this->work_email->caption(), $this->work_email->RequiredErrorMessage));
            }
        }
        if ($this->joined_date->Required) {
            if (!$this->joined_date->IsDetailKey && EmptyValue($this->joined_date->FormValue)) {
                $this->joined_date->addErrorMessage(str_replace("%s", $this->joined_date->caption(), $this->joined_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->joined_date->FormValue)) {
            $this->joined_date->addErrorMessage($this->joined_date->getErrorMessage(false));
        }
        if ($this->confirmation_date->Required) {
            if (!$this->confirmation_date->IsDetailKey && EmptyValue($this->confirmation_date->FormValue)) {
                $this->confirmation_date->addErrorMessage(str_replace("%s", $this->confirmation_date->caption(), $this->confirmation_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->confirmation_date->FormValue)) {
            $this->confirmation_date->addErrorMessage($this->confirmation_date->getErrorMessage(false));
        }
        if ($this->supervisor->Required) {
            if (!$this->supervisor->IsDetailKey && EmptyValue($this->supervisor->FormValue)) {
                $this->supervisor->addErrorMessage(str_replace("%s", $this->supervisor->caption(), $this->supervisor->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->supervisor->FormValue)) {
            $this->supervisor->addErrorMessage($this->supervisor->getErrorMessage(false));
        }
        if ($this->department->Required) {
            if (!$this->department->IsDetailKey && EmptyValue($this->department->FormValue)) {
                $this->department->addErrorMessage(str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->department->FormValue)) {
            $this->department->addErrorMessage($this->department->getErrorMessage(false));
        }
        if ($this->termination_date->Required) {
            if (!$this->termination_date->IsDetailKey && EmptyValue($this->termination_date->FormValue)) {
                $this->termination_date->addErrorMessage(str_replace("%s", $this->termination_date->caption(), $this->termination_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->termination_date->FormValue)) {
            $this->termination_date->addErrorMessage($this->termination_date->getErrorMessage(false));
        }
        if ($this->notes->Required) {
            if (!$this->notes->IsDetailKey && EmptyValue($this->notes->FormValue)) {
                $this->notes->addErrorMessage(str_replace("%s", $this->notes->caption(), $this->notes->RequiredErrorMessage));
            }
        }
        if ($this->data->Required) {
            if (!$this->data->IsDetailKey && EmptyValue($this->data->FormValue)) {
                $this->data->addErrorMessage(str_replace("%s", $this->data->caption(), $this->data->RequiredErrorMessage));
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
        $editRow = false;
        if (!$rsold) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
            $editRow = false; // Update Failed
        } else {
            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // ref_id
            $this->ref_id->setDbValueDef($rsnew, $this->ref_id->CurrentValue, 0, $this->ref_id->ReadOnly);

            // employee_id
            $this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, null, $this->employee_id->ReadOnly);

            // first_name
            $this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", $this->first_name->ReadOnly);

            // last_name
            $this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, "", $this->last_name->ReadOnly);

            // gender
            $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, $this->gender->ReadOnly);

            // ssn_num
            $this->ssn_num->setDbValueDef($rsnew, $this->ssn_num->CurrentValue, null, $this->ssn_num->ReadOnly);

            // nic_num
            $this->nic_num->setDbValueDef($rsnew, $this->nic_num->CurrentValue, null, $this->nic_num->ReadOnly);

            // other_id
            $this->other_id->setDbValueDef($rsnew, $this->other_id->CurrentValue, null, $this->other_id->ReadOnly);

            // work_email
            $this->work_email->setDbValueDef($rsnew, $this->work_email->CurrentValue, null, $this->work_email->ReadOnly);

            // joined_date
            $this->joined_date->setDbValueDef($rsnew, UnFormatDateTime($this->joined_date->CurrentValue, 0), null, $this->joined_date->ReadOnly);

            // confirmation_date
            $this->confirmation_date->setDbValueDef($rsnew, UnFormatDateTime($this->confirmation_date->CurrentValue, 0), null, $this->confirmation_date->ReadOnly);

            // supervisor
            $this->supervisor->setDbValueDef($rsnew, $this->supervisor->CurrentValue, null, $this->supervisor->ReadOnly);

            // department
            $this->department->setDbValueDef($rsnew, $this->department->CurrentValue, null, $this->department->ReadOnly);

            // termination_date
            $this->termination_date->setDbValueDef($rsnew, UnFormatDateTime($this->termination_date->CurrentValue, 0), null, $this->termination_date->ReadOnly);

            // notes
            $this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, null, $this->notes->ReadOnly);

            // data
            $this->data->setDbValueDef($rsnew, $this->data->CurrentValue, null, $this->data->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeesArchivedList"), "", $this->TableVar, true);
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
                case "x_gender":
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
