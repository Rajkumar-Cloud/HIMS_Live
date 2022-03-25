<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeImmigrationsAdd extends EmployeeImmigrations
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee_immigrations';

    // Page object name
    public $PageObjName = "EmployeeImmigrationsAdd";

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

        // Table object (employee_immigrations)
        if (!isset($GLOBALS["employee_immigrations"]) || get_class($GLOBALS["employee_immigrations"]) == PROJECT_NAMESPACE . "employee_immigrations") {
            $GLOBALS["employee_immigrations"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee_immigrations');
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
                $doc = new $class(Container("employee_immigrations"));
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
                    if ($pageName == "EmployeeImmigrationsView") {
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
        $this->document->setVisibility();
        $this->documentname->setVisibility();
        $this->valid_until->setVisibility();
        $this->status->setVisibility();
        $this->details->setVisibility();
        $this->attachment1->setVisibility();
        $this->attachment2->setVisibility();
        $this->attachment3->setVisibility();
        $this->created->setVisibility();
        $this->updated->setVisibility();
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
                    $this->terminate("EmployeeImmigrationsList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "EmployeeImmigrationsList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeImmigrationsView") {
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
        $this->document->CurrentValue = null;
        $this->document->OldValue = $this->document->CurrentValue;
        $this->documentname->CurrentValue = null;
        $this->documentname->OldValue = $this->documentname->CurrentValue;
        $this->valid_until->CurrentValue = null;
        $this->valid_until->OldValue = $this->valid_until->CurrentValue;
        $this->status->CurrentValue = "Active";
        $this->details->CurrentValue = null;
        $this->details->OldValue = $this->details->CurrentValue;
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

        // Check field name 'document' first before field var 'x_document'
        $val = $CurrentForm->hasValue("document") ? $CurrentForm->getValue("document") : $CurrentForm->getValue("x_document");
        if (!$this->document->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->document->Visible = false; // Disable update for API request
            } else {
                $this->document->setFormValue($val);
            }
        }

        // Check field name 'documentname' first before field var 'x_documentname'
        $val = $CurrentForm->hasValue("documentname") ? $CurrentForm->getValue("documentname") : $CurrentForm->getValue("x_documentname");
        if (!$this->documentname->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->documentname->Visible = false; // Disable update for API request
            } else {
                $this->documentname->setFormValue($val);
            }
        }

        // Check field name 'valid_until' first before field var 'x_valid_until'
        $val = $CurrentForm->hasValue("valid_until") ? $CurrentForm->getValue("valid_until") : $CurrentForm->getValue("x_valid_until");
        if (!$this->valid_until->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->valid_until->Visible = false; // Disable update for API request
            } else {
                $this->valid_until->setFormValue($val);
            }
            $this->valid_until->CurrentValue = UnFormatDateTime($this->valid_until->CurrentValue, 0);
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

        // Check field name 'details' first before field var 'x_details'
        $val = $CurrentForm->hasValue("details") ? $CurrentForm->getValue("details") : $CurrentForm->getValue("x_details");
        if (!$this->details->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->details->Visible = false; // Disable update for API request
            } else {
                $this->details->setFormValue($val);
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

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->employee->CurrentValue = $this->employee->FormValue;
        $this->document->CurrentValue = $this->document->FormValue;
        $this->documentname->CurrentValue = $this->documentname->FormValue;
        $this->valid_until->CurrentValue = $this->valid_until->FormValue;
        $this->valid_until->CurrentValue = UnFormatDateTime($this->valid_until->CurrentValue, 0);
        $this->status->CurrentValue = $this->status->FormValue;
        $this->details->CurrentValue = $this->details->FormValue;
        $this->attachment1->CurrentValue = $this->attachment1->FormValue;
        $this->attachment2->CurrentValue = $this->attachment2->FormValue;
        $this->attachment3->CurrentValue = $this->attachment3->FormValue;
        $this->created->CurrentValue = $this->created->FormValue;
        $this->created->CurrentValue = UnFormatDateTime($this->created->CurrentValue, 0);
        $this->updated->CurrentValue = $this->updated->FormValue;
        $this->updated->CurrentValue = UnFormatDateTime($this->updated->CurrentValue, 0);
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
        $this->document->setDbValue($row['document']);
        $this->documentname->setDbValue($row['documentname']);
        $this->valid_until->setDbValue($row['valid_until']);
        $this->status->setDbValue($row['status']);
        $this->details->setDbValue($row['details']);
        $this->attachment1->setDbValue($row['attachment1']);
        $this->attachment2->setDbValue($row['attachment2']);
        $this->attachment3->setDbValue($row['attachment3']);
        $this->created->setDbValue($row['created']);
        $this->updated->setDbValue($row['updated']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee'] = $this->employee->CurrentValue;
        $row['document'] = $this->document->CurrentValue;
        $row['documentname'] = $this->documentname->CurrentValue;
        $row['valid_until'] = $this->valid_until->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
        $row['details'] = $this->details->CurrentValue;
        $row['attachment1'] = $this->attachment1->CurrentValue;
        $row['attachment2'] = $this->attachment2->CurrentValue;
        $row['attachment3'] = $this->attachment3->CurrentValue;
        $row['created'] = $this->created->CurrentValue;
        $row['updated'] = $this->updated->CurrentValue;
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

        // employee

        // document

        // documentname

        // valid_until

        // status

        // details

        // attachment1

        // attachment2

        // attachment3

        // created

        // updated
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee
            $this->employee->ViewValue = $this->employee->CurrentValue;
            $this->employee->ViewValue = FormatNumber($this->employee->ViewValue, 0, -2, -2, -2);
            $this->employee->ViewCustomAttributes = "";

            // document
            $this->document->ViewValue = $this->document->CurrentValue;
            $this->document->ViewValue = FormatNumber($this->document->ViewValue, 0, -2, -2, -2);
            $this->document->ViewCustomAttributes = "";

            // documentname
            $this->documentname->ViewValue = $this->documentname->CurrentValue;
            $this->documentname->ViewCustomAttributes = "";

            // valid_until
            $this->valid_until->ViewValue = $this->valid_until->CurrentValue;
            $this->valid_until->ViewValue = FormatDateTime($this->valid_until->ViewValue, 0);
            $this->valid_until->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // details
            $this->details->ViewValue = $this->details->CurrentValue;
            $this->details->ViewCustomAttributes = "";

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

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";
            $this->employee->TooltipValue = "";

            // document
            $this->document->LinkCustomAttributes = "";
            $this->document->HrefValue = "";
            $this->document->TooltipValue = "";

            // documentname
            $this->documentname->LinkCustomAttributes = "";
            $this->documentname->HrefValue = "";
            $this->documentname->TooltipValue = "";

            // valid_until
            $this->valid_until->LinkCustomAttributes = "";
            $this->valid_until->HrefValue = "";
            $this->valid_until->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";
            $this->details->TooltipValue = "";

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
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // employee
            $this->employee->EditAttrs["class"] = "form-control";
            $this->employee->EditCustomAttributes = "";
            $this->employee->EditValue = HtmlEncode($this->employee->CurrentValue);
            $this->employee->PlaceHolder = RemoveHtml($this->employee->caption());

            // document
            $this->document->EditAttrs["class"] = "form-control";
            $this->document->EditCustomAttributes = "";
            $this->document->EditValue = HtmlEncode($this->document->CurrentValue);
            $this->document->PlaceHolder = RemoveHtml($this->document->caption());

            // documentname
            $this->documentname->EditAttrs["class"] = "form-control";
            $this->documentname->EditCustomAttributes = "";
            if (!$this->documentname->Raw) {
                $this->documentname->CurrentValue = HtmlDecode($this->documentname->CurrentValue);
            }
            $this->documentname->EditValue = HtmlEncode($this->documentname->CurrentValue);
            $this->documentname->PlaceHolder = RemoveHtml($this->documentname->caption());

            // valid_until
            $this->valid_until->EditAttrs["class"] = "form-control";
            $this->valid_until->EditCustomAttributes = "";
            $this->valid_until->EditValue = HtmlEncode(FormatDateTime($this->valid_until->CurrentValue, 8));
            $this->valid_until->PlaceHolder = RemoveHtml($this->valid_until->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // details
            $this->details->EditAttrs["class"] = "form-control";
            $this->details->EditCustomAttributes = "";
            $this->details->EditValue = HtmlEncode($this->details->CurrentValue);
            $this->details->PlaceHolder = RemoveHtml($this->details->caption());

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

            // Add refer script

            // employee
            $this->employee->LinkCustomAttributes = "";
            $this->employee->HrefValue = "";

            // document
            $this->document->LinkCustomAttributes = "";
            $this->document->HrefValue = "";

            // documentname
            $this->documentname->LinkCustomAttributes = "";
            $this->documentname->HrefValue = "";

            // valid_until
            $this->valid_until->LinkCustomAttributes = "";
            $this->valid_until->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // details
            $this->details->LinkCustomAttributes = "";
            $this->details->HrefValue = "";

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
        if ($this->document->Required) {
            if (!$this->document->IsDetailKey && EmptyValue($this->document->FormValue)) {
                $this->document->addErrorMessage(str_replace("%s", $this->document->caption(), $this->document->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->document->FormValue)) {
            $this->document->addErrorMessage($this->document->getErrorMessage(false));
        }
        if ($this->documentname->Required) {
            if (!$this->documentname->IsDetailKey && EmptyValue($this->documentname->FormValue)) {
                $this->documentname->addErrorMessage(str_replace("%s", $this->documentname->caption(), $this->documentname->RequiredErrorMessage));
            }
        }
        if ($this->valid_until->Required) {
            if (!$this->valid_until->IsDetailKey && EmptyValue($this->valid_until->FormValue)) {
                $this->valid_until->addErrorMessage(str_replace("%s", $this->valid_until->caption(), $this->valid_until->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->valid_until->FormValue)) {
            $this->valid_until->addErrorMessage($this->valid_until->getErrorMessage(false));
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->details->Required) {
            if (!$this->details->IsDetailKey && EmptyValue($this->details->FormValue)) {
                $this->details->addErrorMessage(str_replace("%s", $this->details->caption(), $this->details->RequiredErrorMessage));
            }
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

        // document
        $this->document->setDbValueDef($rsnew, $this->document->CurrentValue, null, false);

        // documentname
        $this->documentname->setDbValueDef($rsnew, $this->documentname->CurrentValue, "", false);

        // valid_until
        $this->valid_until->setDbValueDef($rsnew, UnFormatDateTime($this->valid_until->CurrentValue, 0), CurrentDate(), false);

        // status
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, strval($this->status->CurrentValue) == "");

        // details
        $this->details->setDbValueDef($rsnew, $this->details->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeImmigrationsList"), "", $this->TableVar, true);
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
