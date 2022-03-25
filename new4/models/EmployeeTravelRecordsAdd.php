<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeTravelRecordsAdd extends EmployeeTravelRecords
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_travel_records';

    // Page object name
    public $PageObjName = "EmployeeTravelRecordsAdd";

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

        // Table object (employee_travel_records)
        if (!isset($GLOBALS["employee_travel_records"]) || get_class($GLOBALS["employee_travel_records"]) == PROJECT_NAMESPACE . "employee_travel_records") {
            $GLOBALS["employee_travel_records"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_travel_records');
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
                $doc = new $class(Container("employee_travel_records"));
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
                    if ($pageName == "EmployeeTravelRecordsView") {
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
        $this->employee->setVisibility();
        $this->type->setVisibility();
        $this->purpose->setVisibility();
        $this->travel_from->setVisibility();
        $this->travel_to->setVisibility();
        $this->travel_date->setVisibility();
        $this->return_date->setVisibility();
        $this->details->setVisibility();
        $this->funding->setVisibility();
        $this->currency->setVisibility();
        $this->attachment1->setVisibility();
        $this->attachment2->setVisibility();
        $this->attachment3->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
        $this->status->setVisibility();
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
                    $this->terminate("EmployeeTravelRecordsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeTravelRecordsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeTravelRecordsView") {
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
        $this->employee->CurrentValue = null;
        $this->employee->OldValue = $this->employee->CurrentValue;
        $this->type->CurrentValue = "Local";
        $this->purpose->CurrentValue = null;
        $this->purpose->OldValue = $this->purpose->CurrentValue;
        $this->travel_from->CurrentValue = null;
        $this->travel_from->OldValue = $this->travel_from->CurrentValue;
        $this->travel_to->CurrentValue = null;
        $this->travel_to->OldValue = $this->travel_to->CurrentValue;
        $this->travel_date->CurrentValue = null;
        $this->travel_date->OldValue = $this->travel_date->CurrentValue;
        $this->return_date->CurrentValue = null;
        $this->return_date->OldValue = $this->return_date->CurrentValue;
        $this->details->CurrentValue = null;
        $this->details->OldValue = $this->details->CurrentValue;
        $this->funding->CurrentValue = null;
        $this->funding->OldValue = $this->funding->CurrentValue;
        $this->currency->CurrentValue = null;
        $this->currency->OldValue = $this->currency->CurrentValue;
        $this->attachment1->CurrentValue = null;
        $this->attachment1->OldValue = $this->attachment1->CurrentValue;
        $this->attachment2->CurrentValue = null;
        $this->attachment2->OldValue = $this->attachment2->CurrentValue;
        $this->attachment3->CurrentValue = null;
        $this->attachment3->OldValue = $this->attachment3->CurrentValue;
        $this->created->CurrentValue = null;
        $this->created->OldValue = $this->created->CurrentValue;
        $this->updated->CurrentValue = null;
        $this->updated->OldValue = $this->updated->CurrentValue;
        $this->status->CurrentValue = "Pending";
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'employee' first before field var 'x_employee'
        $val = $CurrentForm->hasValue("employee") ? $CurrentForm->getValue("employee") : $CurrentForm->getValue("x_employee");
        if (!$this->employee->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employee->Visible = false; // Disable update for API request
            } else {
                $this->employee->setFormValue($val);
            }
        }

        // Check field name 'type' first before field var 'x_type'
        $val = $CurrentForm->hasValue("type") ? $CurrentForm->getValue("type") : $CurrentForm->getValue("x_type");
        if (!$this->type->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->type->Visible = false; // Disable update for API request
            } else {
                $this->type->setFormValue($val);
            }
        }

        // Check field name 'purpose' first before field var 'x_purpose'
        $val = $CurrentForm->hasValue("purpose") ? $CurrentForm->getValue("purpose") : $CurrentForm->getValue("x_purpose");
        if (!$this->purpose->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->purpose->Visible = false; // Disable update for API request
            } else {
                $this->purpose->setFormValue($val);
            }
        }

        // Check field name 'travel_from' first before field var 'x_travel_from'
        $val = $CurrentForm->hasValue("travel_from") ? $CurrentForm->getValue("travel_from") : $CurrentForm->getValue("x_travel_from");
        if (!$this->travel_from->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->travel_from->Visible = false; // Disable update for API request
            } else {
                $this->travel_from->setFormValue($val);
            }
        }

        // Check field name 'travel_to' first before field var 'x_travel_to'
        $val = $CurrentForm->hasValue("travel_to") ? $CurrentForm->getValue("travel_to") : $CurrentForm->getValue("x_travel_to");
        if (!$this->travel_to->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->travel_to->Visible = false; // Disable update for API request
            } else {
                $this->travel_to->setFormValue($val);
            }
        }

        // Check field name 'travel_date' first before field var 'x_travel_date'
        $val = $CurrentForm->hasValue("travel_date") ? $CurrentForm->getValue("travel_date") : $CurrentForm->getValue("x_travel_date");
        if (!$this->travel_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->travel_date->Visible = false; // Disable update for API request
            } else {
                $this->travel_date->setFormValue($val);
            }
            $this->travel_date->CurrentValue = UnFormatDateTime($this->travel_date->CurrentValue, 0);
        }

        // Check field name 'return_date' first before field var 'x_return_date'
        $val = $CurrentForm->hasValue("return_date") ? $CurrentForm->getValue("return_date") : $CurrentForm->getValue("x_return_date");
        if (!$this->return_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->return_date->Visible = false; // Disable update for API request
            } else {
                $this->return_date->setFormValue($val);
            }
            $this->return_date->CurrentValue = UnFormatDateTime($this->return_date->CurrentValue, 0);
        }

        // Check field name 'details' first before field var 'x_details'
        $val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
        if (!$this->details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->details->Visible = false; // Disable update for API request
            } else {
                $this->details->setFormValue($val);
            }
        }

        // Check field name 'funding' first before field var 'x_funding'
        $val = $CurrentForm->hasValue("funding") ? $CurrentForm->getValue("funding") : $CurrentForm->getValue("x_funding");
        if (!$this->funding->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->funding->Visible = false; // Disable update for API request
            } else {
                $this->funding->setFormValue($val);
            }
        }

        // Check field name 'currency' first before field var 'x_currency'
        $val = $CurrentForm->hasValue("currency") ? $CurrentForm->getValue("currency") : $CurrentForm->getValue("x_currency");
        if (!$this->currency->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->currency->Visible = false; // Disable update for API request
            } else {
                $this->currency->setFormValue($val);
            }
        }

        // Check field name 'attachment1' first before field var 'x_attachment1'
        $val = $CurrentForm->hasValue("attachment1") ? $CurrentForm->getValue("attachment1") : $CurrentForm->getValue("x_attachment1");
        if (!$this->attachment1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment1->Visible = false; // Disable update for API request
            } else {
                $this->attachment1->setFormValue($val);
            }
        }

        // Check field name 'attachment2' first before field var 'x_attachment2'
        $val = $CurrentForm->hasValue("attachment2") ? $CurrentForm->getValue("attachment2") : $CurrentForm->getValue("x_attachment2");
        if (!$this->attachment2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment2->Visible = false; // Disable update for API request
            } else {
                $this->attachment2->setFormValue($val);
            }
        }

        // Check field name 'attachment3' first before field var 'x_attachment3'
        $val = $CurrentForm->hasValue("attachment3") ? $CurrentForm->getValue("attachment3") : $CurrentForm->getValue("x_attachment3");
        if (!$this->attachment3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment3->Visible = false; // Disable update for API request
            } else {
                $this->attachment3->setFormValue($val);
            }
        }

        // Check field name 'created' first before field var 'x_created'
        $val = $CurrentForm->hasValue("created") ? $CurrentForm->getValue("created") : $CurrentForm->getValue("x_created");
        if (!$this->created->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->created->Visible = false; // Disable update for API request
            } else {
                $this->created->setFormValue($val);
            }
            $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        }

        // Check field name 'updated' first before field var 'x_updated'
        $val = $CurrentForm->hasValue("updated") ? $CurrentForm->getValue("updated") : $CurrentForm->getValue("x_updated");
        if (!$this->updated->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->updated->Visible = false; // Disable update for API request
            } else {
                $this->updated->setFormValue($val);
            }
            $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->employee->CurrentValue = $this->employee->FormValue;
        $this->type->CurrentValue = $this->type->FormValue;
        $this->purpose->CurrentValue = $this->purpose->FormValue;
        $this->travel_from->CurrentValue = $this->travel_from->FormValue;
        $this->travel_to->CurrentValue = $this->travel_to->FormValue;
        $this->travel_date->CurrentValue = $this->travel_date->FormValue;
        $this->travel_date->CurrentValue = UnFormatDateTime($this->travel_date->CurrentValue, 0);
        $this->return_date->CurrentValue = $this->return_date->FormValue;
        $this->return_date->CurrentValue = UnFormatDateTime($this->return_date->CurrentValue, 0);
        $this->details->CurrentValue = $this->details->FormValue;
        $this->funding->CurrentValue = $this->funding->FormValue;
        $this->currency->CurrentValue = $this->currency->FormValue;
        $this->attachment1->CurrentValue = $this->attachment1->FormValue;
        $this->attachment2->CurrentValue = $this->attachment2->FormValue;
        $this->attachment3->CurrentValue = $this->attachment3->FormValue;
        $this->created->CurrentValue = $this->created->FormValue;
        $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        $this->updated->CurrentValue = $this->updated->FormValue;
        $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
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
        $this->employee->setDbValue($row['employee']);
        $this->type->setDbValue($row['type']);
        $this->purpose->setDbValue($row['purpose']);
        $this->travel_from->setDbValue($row['travel_from']);
        $this->travel_to->setDbValue($row['travel_to']);
        $this->travel_date->setDbValue($row['travel_date']);
        $this->return_date->setDbValue($row['return_date']);
        $this->details->setDbValue($row['details']);
        $this->funding->setDbValue($row['funding']);
        $this->currency->setDbValue($row['currency']);
        $this->attachment1->setDbValue($row['attachment1']);
        $this->attachment2->setDbValue($row['attachment2']);
        $this->attachment3->setDbValue($row['attachment3']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
        $this->status->setDbValue($row['status']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee'] = $this->employee->CurrentValue;
        $row['type'] = $this->type->CurrentValue;
        $row['purpose'] = $this->purpose->CurrentValue;
        $row['travel_from'] = $this->travel_from->CurrentValue;
        $row['travel_to'] = $this->travel_to->CurrentValue;
        $row['travel_date'] = $this->travel_date->CurrentValue;
        $row['return_date'] = $this->return_date->CurrentValue;
        $row['details'] = $this->details->CurrentValue;
        $row['funding'] = $this->funding->CurrentValue;
        $row['currency'] = $this->currency->CurrentValue;
        $row['attachment1'] = $this->attachment1->CurrentValue;
        $row['attachment2'] = $this->attachment2->CurrentValue;
        $row['attachment3'] = $this->attachment3->CurrentValue;
        $row['created'] = $this->created->CurrentValue;
        $row['updated'] = $this->updated->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
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
        if ($this->funding->FormValue == $this->funding->CurrentValue && is_numeric(ConvertToFloatString($this->funding->CurrentValue))) {
            $this->funding->CurrentValue = ConvertToFloatString($this->funding->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // employee

        // type

        // purpose

        // travel_from

        // travel_to

        // travel_date

        // return_date

        // details

        // funding

        // currency

        // attachment1

        // attachment2

        // attachment3

        // created

        // updated

        // status
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee
            $this->employee->ViewValue = $this->employee->CurrentValue;
            $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
            $this->employee->ViewCustomAttributes = "";

            // type
            if (strval($this->type->CurrentValue) != "") {
                $this->type->ViewValue = $this->type->optionCaption($this->type->CurrentValue);
            } else {
                $this->type->ViewValue = null;
            }
            $this->type->ViewCustomAttributes = "";

            // purpose
            $this->purpose->ViewValue = $this->purpose->CurrentValue;
            $this->purpose->ViewCustomAttributes = "";

            // travel_from
            $this->travel_from->ViewValue = $this->travel_from->CurrentValue;
            $this->travel_from->ViewCustomAttributes = "";

            // travel_to
            $this->travel_to->ViewValue = $this->travel_to->CurrentValue;
            $this->travel_to->ViewCustomAttributes = "";

            // travel_date
            $this->travel_date->ViewValue = $this->travel_date->CurrentValue;
            $this->travel_date->ViewValue = FormatDateTime($this->travel_date->ViewValue, 0);
            $this->travel_date->ViewCustomAttributes = "";

            // return_date
            $this->return_date->ViewValue = $this->return_date->CurrentValue;
            $this->return_date->ViewValue = FormatDateTime($this->return_date->ViewValue, 0);
            $this->return_date->ViewCustomAttributes = "";

            // details
            $this->details->ViewValue = $this->details->CurrentValue;
            $this->details->ViewCustomAttributes = "";

            // funding
            $this->funding->ViewValue = $this->funding->CurrentValue;
            $this->funding->ViewValue = FormatNumber($this->funding->ViewValue, 2, -2, -2, -2);
            $this->funding->ViewCustomAttributes = "";

            // currency
            $this->currency->ViewValue = $this->currency->CurrentValue;
            $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
            $this->currency->ViewCustomAttributes = "";

            // attachment1
            $this->attachment1->ViewValue = $this->attachment1->CurrentValue;
            $this->attachment1->ViewCustomAttributes = "";

            // attachment2
            $this->attachment2->ViewValue = $this->attachment2->CurrentValue;
            $this->attachment2->ViewCustomAttributes = "";

            // attachment3
            $this->attachment3->ViewValue = $this->attachment3->CurrentValue;
            $this->attachment3->ViewCustomAttributes = "";

            // created
            $this->created->ViewValue = $this->created->CurrentValue;
            $this->created->ViewValue = FormatDateTime($this->created->ViewValue, 0);
            $this->created->ViewCustomAttributes = "";

            // updated
            $this->updated->ViewValue = $this->updated->CurrentValue;
            $this->updated->ViewValue = FormatDateTime($this->updated->ViewValue, 0);
            $this->updated->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";
            $this->employee->TooltipValue = "";

            // type
            $this->type->LinkCustomAttributes = "";
            $this->type->HrefValue = "";
            $this->type->TooltipValue = "";

            // purpose
            $this->purpose->LinkCustomAttributes = "";
            $this->purpose->HrefValue = "";
            $this->purpose->TooltipValue = "";

            // travel_from
            $this->travel_from->LinkCustomAttributes = "";
            $this->travel_from->HrefValue = "";
            $this->travel_from->TooltipValue = "";

            // travel_to
            $this->travel_to->LinkCustomAttributes = "";
            $this->travel_to->HrefValue = "";
            $this->travel_to->TooltipValue = "";

            // travel_date
            $this->travel_date->LinkCustomAttributes = "";
            $this->travel_date->HrefValue = "";
            $this->travel_date->TooltipValue = "";

            // return_date
            $this->return_date->LinkCustomAttributes = "";
            $this->return_date->HrefValue = "";
            $this->return_date->TooltipValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";
            $this->details->TooltipValue = "";

            // funding
            $this->funding->LinkCustomAttributes = "";
            $this->funding->HrefValue = "";
            $this->funding->TooltipValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";
            $this->currency->TooltipValue = "";

            // attachment1
            $this->attachment1->LinkCustomAttributes = "";
            $this->attachment1->HrefValue = "";
            $this->attachment1->TooltipValue = "";

            // attachment2
            $this->attachment2->LinkCustomAttributes = "";
            $this->attachment2->HrefValue = "";
            $this->attachment2->TooltipValue = "";

            // attachment3
            $this->attachment3->LinkCustomAttributes = "";
            $this->attachment3->HrefValue = "";
            $this->attachment3->TooltipValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";
            $this->created->TooltipValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";
            $this->updated->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // employee
            $this->employee->EditAttrs["class"] = "form-control";
            $this->employee->EditCustomAttributes = "";
            $this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
            $this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

            // type
            $this->type->EditCustomAttributes = "";
            $this->type->EditValue = $this->type->options(false);
            $this->type->PlaceHolder = RemoveHtml($this->type->caption());

            // purpose
            $this->purpose->EditAttrs["class"] = "form-control";
            $this->purpose->EditCustomAttributes = "";
            if (!$this->purpose->Raw) {
                $this->purpose->CurrentValue = HtmlDecode($this->purpose->CurrentValue);
            }
            $this->purpose->EditValue = HtmlEncode($this->purpose->CurrentValue);
            $this->purpose->PlaceHolder = RemoveHtml($this->purpose->caption());

            // travel_from
            $this->travel_from->EditAttrs["class"] = "form-control";
            $this->travel_from->EditCustomAttributes = "";
            if (!$this->travel_from->Raw) {
                $this->travel_from->CurrentValue = HtmlDecode($this->travel_from->CurrentValue);
            }
            $this->travel_from->EditValue = HtmlEncode($this->travel_from->CurrentValue);
            $this->travel_from->PlaceHolder = RemoveHtml($this->travel_from->caption());

            // travel_to
            $this->travel_to->EditAttrs["class"] = "form-control";
            $this->travel_to->EditCustomAttributes = "";
            if (!$this->travel_to->Raw) {
                $this->travel_to->CurrentValue = HtmlDecode($this->travel_to->CurrentValue);
            }
            $this->travel_to->EditValue = HtmlEncode($this->travel_to->CurrentValue);
            $this->travel_to->PlaceHolder = RemoveHtml($this->travel_to->caption());

            // travel_date
            $this->travel_date->EditAttrs["class"] = "form-control";
            $this->travel_date->EditCustomAttributes = "";
            $this->travel_date->EditValue = HtmlEncode(FormatDateTime($this->travel_date->CurrentValue, 8));
            $this->travel_date->PlaceHolder = RemoveHtml($this->travel_date->caption());

            // return_date
            $this->return_date->EditAttrs["class"] = "form-control";
            $this->return_date->EditCustomAttributes = "";
            $this->return_date->EditValue = HtmlEncode(FormatDateTime($this->return_date->CurrentValue, 8));
            $this->return_date->PlaceHolder = RemoveHtml($this->return_date->caption());

            // details
            $this->details->EditAttrs["class"] = "form-control";
            $this->details->EditCustomAttributes = "";
            $this->details->EditValue = HtmlEncode($this->details->CurrentValue);
            $this->details->PlaceHolder = RemoveHtml($this->details->caption());

            // funding
            $this->funding->EditAttrs["class"] = "form-control";
            $this->funding->EditCustomAttributes = "";
            $this->funding->EditValue = HtmlEncode($this->funding->CurrentValue);
            $this->funding->PlaceHolder = RemoveHtml($this->funding->caption());
            if (strval($this->funding->EditValue) != "" && is_numeric($this->funding->EditValue)) {
                $this->funding->EditValue = FormatNumber($this->funding->EditValue, -2, -2, -2, -2);
            }

            // currency
            $this->currency->EditAttrs["class"] = "form-control";
            $this->currency->EditCustomAttributes = "";
            $this->currency->EditValue = HtmlEncode($this->currency->CurrentValue);
            $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

            // attachment1
            $this->attachment1->EditAttrs["class"] = "form-control";
            $this->attachment1->EditCustomAttributes = "";
            if (!$this->attachment1->Raw) {
                $this->attachment1->CurrentValue = HtmlDecode($this->attachment1->CurrentValue);
            }
            $this->attachment1->EditValue = HtmlEncode($this->attachment1->CurrentValue);
            $this->attachment1->PlaceHolder = RemoveHtml($this->attachment1->caption());

            // attachment2
            $this->attachment2->EditAttrs["class"] = "form-control";
            $this->attachment2->EditCustomAttributes = "";
            if (!$this->attachment2->Raw) {
                $this->attachment2->CurrentValue = HtmlDecode($this->attachment2->CurrentValue);
            }
            $this->attachment2->EditValue = HtmlEncode($this->attachment2->CurrentValue);
            $this->attachment2->PlaceHolder = RemoveHtml($this->attachment2->caption());

            // attachment3
            $this->attachment3->EditAttrs["class"] = "form-control";
            $this->attachment3->EditCustomAttributes = "";
            if (!$this->attachment3->Raw) {
                $this->attachment3->CurrentValue = HtmlDecode($this->attachment3->CurrentValue);
            }
            $this->attachment3->EditValue = HtmlEncode($this->attachment3->CurrentValue);
            $this->attachment3->PlaceHolder = RemoveHtml($this->attachment3->caption());

            // created
            $this->created->EditAttrs["class"] = "form-control";
            $this->created->EditCustomAttributes = "";
            $this->created->EditValue = HtmlEncode(FormatDateTime($this->created->CurrentValue, 8));
            $this->created->PlaceHolder = RemoveHtml($this->created->caption());

            // updated
            $this->updated->EditAttrs["class"] = "form-control";
            $this->updated->EditCustomAttributes = "";
            $this->updated->EditValue = HtmlEncode(FormatDateTime($this->updated->CurrentValue, 8));
            $this->updated->PlaceHolder = RemoveHtml($this->updated->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // Add refer script

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";

            // type
            $this->type->LinkCustomAttributes = "";
            $this->type->HrefValue = "";

            // purpose
            $this->purpose->LinkCustomAttributes = "";
            $this->purpose->HrefValue = "";

            // travel_from
            $this->travel_from->LinkCustomAttributes = "";
            $this->travel_from->HrefValue = "";

            // travel_to
            $this->travel_to->LinkCustomAttributes = "";
            $this->travel_to->HrefValue = "";

            // travel_date
            $this->travel_date->LinkCustomAttributes = "";
            $this->travel_date->HrefValue = "";

            // return_date
            $this->return_date->LinkCustomAttributes = "";
            $this->return_date->HrefValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";

            // funding
            $this->funding->LinkCustomAttributes = "";
            $this->funding->HrefValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";

            // attachment1
            $this->attachment1->LinkCustomAttributes = "";
            $this->attachment1->HrefValue = "";

            // attachment2
            $this->attachment2->LinkCustomAttributes = "";
            $this->attachment2->HrefValue = "";

            // attachment3
            $this->attachment3->LinkCustomAttributes = "";
            $this->attachment3->HrefValue = "";

            // created
            $this->created->LinkCustomAttributes = "";
            $this->created->HrefValue = "";

            // updated
            $this->updated->LinkCustomAttributes = "";
            $this->updated->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
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
        if ($this->employee->Required) {
            if (!$this->employee->IsDetailKey && EmptyValue($this->employee->FormValue)) {
                $this->employee->addErrorMessage(str_replace("%s", $this->employee->caption(), $this->employee->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->employee->FormValue)) {
            $this->employee->addErrorMessage($this->employee->getErrorMessage(false));
        }
        if ($this->type->Required) {
            if ($this->type->FormValue == "") {
                $this->type->addErrorMessage(str_replace("%s", $this->type->caption(), $this->type->RequiredErrorMessage));
            }
        }
        if ($this->purpose->Required) {
            if (!$this->purpose->IsDetailKey && EmptyValue($this->purpose->FormValue)) {
                $this->purpose->addErrorMessage(str_replace("%s", $this->purpose->caption(), $this->purpose->RequiredErrorMessage));
            }
        }
        if ($this->travel_from->Required) {
            if (!$this->travel_from->IsDetailKey && EmptyValue($this->travel_from->FormValue)) {
                $this->travel_from->addErrorMessage(str_replace("%s", $this->travel_from->caption(), $this->travel_from->RequiredErrorMessage));
            }
        }
        if ($this->travel_to->Required) {
            if (!$this->travel_to->IsDetailKey && EmptyValue($this->travel_to->FormValue)) {
                $this->travel_to->addErrorMessage(str_replace("%s", $this->travel_to->caption(), $this->travel_to->RequiredErrorMessage));
            }
        }
        if ($this->travel_date->Required) {
            if (!$this->travel_date->IsDetailKey && EmptyValue($this->travel_date->FormValue)) {
                $this->travel_date->addErrorMessage(str_replace("%s", $this->travel_date->caption(), $this->travel_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->travel_date->FormValue)) {
            $this->travel_date->addErrorMessage($this->travel_date->getErrorMessage(false));
        }
        if ($this->return_date->Required) {
            if (!$this->return_date->IsDetailKey && EmptyValue($this->return_date->FormValue)) {
                $this->return_date->addErrorMessage(str_replace("%s", $this->return_date->caption(), $this->return_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->return_date->FormValue)) {
            $this->return_date->addErrorMessage($this->return_date->getErrorMessage(false));
        }
        if ($this->details->Required) {
            if (!$this->details->IsDetailKey && EmptyValue($this->details->FormValue)) {
                $this->details->addErrorMessage(str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
            }
        }
        if ($this->funding->Required) {
            if (!$this->funding->IsDetailKey && EmptyValue($this->funding->FormValue)) {
                $this->funding->addErrorMessage(str_replace("%s", $this->funding->caption(), $this->funding->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->funding->FormValue)) {
            $this->funding->addErrorMessage($this->funding->getErrorMessage(false));
        }
        if ($this->currency->Required) {
            if (!$this->currency->IsDetailKey && EmptyValue($this->currency->FormValue)) {
                $this->currency->addErrorMessage(str_replace("%s", $this->currency->caption(), $this->currency->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->currency->FormValue)) {
            $this->currency->addErrorMessage($this->currency->getErrorMessage(false));
        }
        if ($this->attachment1->Required) {
            if (!$this->attachment1->IsDetailKey && EmptyValue($this->attachment1->FormValue)) {
                $this->attachment1->addErrorMessage(str_replace("%s", $this->attachment1->caption(), $this->attachment1->RequiredErrorMessage));
            }
        }
        if ($this->attachment2->Required) {
            if (!$this->attachment2->IsDetailKey && EmptyValue($this->attachment2->FormValue)) {
                $this->attachment2->addErrorMessage(str_replace("%s", $this->attachment2->caption(), $this->attachment2->RequiredErrorMessage));
            }
        }
        if ($this->attachment3->Required) {
            if (!$this->attachment3->IsDetailKey && EmptyValue($this->attachment3->FormValue)) {
                $this->attachment3->addErrorMessage(str_replace("%s", $this->attachment3->caption(), $this->attachment3->RequiredErrorMessage));
            }
        }
        if ($this->created->Required) {
            if (!$this->created->IsDetailKey && EmptyValue($this->created->FormValue)) {
                $this->created->addErrorMessage(str_replace("%s", $this->created->caption(), $this->created->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->created->FormValue)) {
            $this->created->addErrorMessage($this->created->getErrorMessage(false));
        }
        if ($this->updated->Required) {
            if (!$this->updated->IsDetailKey && EmptyValue($this->updated->FormValue)) {
                $this->updated->addErrorMessage(str_replace("%s", $this->updated->caption(), $this->updated->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->updated->FormValue)) {
            $this->updated->addErrorMessage($this->updated->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
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

        // employee
        $this->employee->setDbValueDef($rsnew, $this->employee->CurrentValue, 0, false);

        // type
        $this->type->setDbValueDef($rsnew, $this->type->CurrentValue, null, strval($this->type->CurrentValue) == "");

        // purpose
        $this->purpose->setDbValueDef($rsnew, $this->purpose->CurrentValue, "", false);

        // travel_from
        $this->travel_from->setDbValueDef($rsnew, $this->travel_from->CurrentValue, "", false);

        // travel_to
        $this->travel_to->setDbValueDef($rsnew, $this->travel_to->CurrentValue, "", false);

        // travel_date
        $this->travel_date->setDbValueDef($rsnew, UnFormatDateTime($this->travel_date->CurrentValue, 0), null, false);

        // return_date
        $this->return_date->setDbValueDef($rsnew, UnFormatDateTime($this->return_date->CurrentValue, 0), null, false);

        // details
        $this->details->setDbValueDef($rsnew, $this->details->CurrentValue, null, false);

        // funding
        $this->funding->setDbValueDef($rsnew, $this->funding->CurrentValue, null, false);

        // currency
        $this->currency->setDbValueDef($rsnew, $this->currency->CurrentValue, null, false);

        // attachment1
        $this->attachment1->setDbValueDef($rsnew, $this->attachment1->CurrentValue, null, false);

        // attachment2
        $this->attachment2->setDbValueDef($rsnew, $this->attachment2->CurrentValue, null, false);

        // attachment3
        $this->attachment3->setDbValueDef($rsnew, $this->attachment3->CurrentValue, null, false);

        // created
        $this->created->setDbValueDef($rsnew, UnFormatDateTime($this->created->CurrentValue, 0), null, false);

        // updated
        $this->updated->setDbValueDef($rsnew, UnFormatDateTime($this->updated->CurrentValue, 0), null, false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, strval($this->status->CurrentValue) == "");

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeTravelRecordsList"), "", $this->TableVar, true);
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
                case "x_type":
                    break;
                case "x_status":
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
