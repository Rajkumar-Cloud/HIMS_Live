<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class DoctorsEdit extends Doctors
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'doctors';

    // Page object name
    public $PageObjName = "DoctorsEdit";

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

        // Table object (doctors)
        if (!isset($GLOBALS["doctors"]) || get_class($GLOBALS["doctors"]) == PROJECT_NAMESPACE . "doctors") {
            $GLOBALS["doctors"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'doctors');
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
                $doc = new $class(Container("doctors"));
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
                    if ($pageName == "DoctorsView") {
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
        $this->CODE->setVisibility();
        $this->NAME->setVisibility();
        $this->DEPARTMENT->setVisibility();
        $this->start_time->setVisibility();
        $this->end_time->setVisibility();
        $this->start_time1->setVisibility();
        $this->end_time1->setVisibility();
        $this->start_time2->setVisibility();
        $this->end_time2->setVisibility();
        $this->slot_time->setVisibility();
        $this->Fees->setVisibility();
        $this->ProfilePic->setVisibility();
        $this->slot_days->setVisibility();
        $this->Status->setVisibility();
        $this->scheduler_id->setVisibility();
        $this->HospID->setVisibility();
        $this->Designation->setVisibility();
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
        $this->setupLookupOptions($this->slot_days);
        $this->setupLookupOptions($this->Status);

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

            // Set up detail parameters
            $this->setupDetailParms();
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
                    $this->terminate("DoctorsList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "update": // Update
                if ($this->getCurrentDetailTable() != "") { // Master/detail edit
                    $returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
                } else {
                    $returnUrl = $this->getReturnUrl();
                }
                if (GetPageName($returnUrl) == "DoctorsList") {
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

                    // Set up detail parameters
                    $this->setupDetailParms();
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
        $this->ProfilePic->Upload->Index = $CurrentForm->Index;
        $this->ProfilePic->Upload->uploadFile();
        $this->ProfilePic->CurrentValue = $this->ProfilePic->Upload->FileName;
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

        // Check field name 'CODE' first before field var 'x_CODE'
        $val = $CurrentForm->hasValue("CODE") ? $CurrentForm->getValue("CODE") : $CurrentForm->getValue("x_CODE");
        if (!$this->CODE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CODE->Visible = false; // Disable update for API request
            } else {
                $this->CODE->setFormValue($val);
            }
        }

        // Check field name 'NAME' first before field var 'x_NAME'
        $val = $CurrentForm->hasValue("NAME") ? $CurrentForm->getValue("NAME") : $CurrentForm->getValue("x_NAME");
        if (!$this->NAME->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NAME->Visible = false; // Disable update for API request
            } else {
                $this->NAME->setFormValue($val);
            }
        }

        // Check field name 'DEPARTMENT' first before field var 'x_DEPARTMENT'
        $val = $CurrentForm->hasValue("DEPARTMENT") ? $CurrentForm->getValue("DEPARTMENT") : $CurrentForm->getValue("x_DEPARTMENT");
        if (!$this->DEPARTMENT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DEPARTMENT->Visible = false; // Disable update for API request
            } else {
                $this->DEPARTMENT->setFormValue($val);
            }
        }

        // Check field name 'start_time' first before field var 'x_start_time'
        $val = $CurrentForm->hasValue("start_time") ? $CurrentForm->getValue("start_time") : $CurrentForm->getValue("x_start_time");
        if (!$this->start_time->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_time->Visible = false; // Disable update for API request
            } else {
                $this->start_time->setFormValue($val);
            }
        }

        // Check field name 'end_time' first before field var 'x_end_time'
        $val = $CurrentForm->hasValue("end_time") ? $CurrentForm->getValue("end_time") : $CurrentForm->getValue("x_end_time");
        if (!$this->end_time->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_time->Visible = false; // Disable update for API request
            } else {
                $this->end_time->setFormValue($val);
            }
        }

        // Check field name 'start_time1' first before field var 'x_start_time1'
        $val = $CurrentForm->hasValue("start_time1") ? $CurrentForm->getValue("start_time1") : $CurrentForm->getValue("x_start_time1");
        if (!$this->start_time1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_time1->Visible = false; // Disable update for API request
            } else {
                $this->start_time1->setFormValue($val);
            }
        }

        // Check field name 'end_time1' first before field var 'x_end_time1'
        $val = $CurrentForm->hasValue("end_time1") ? $CurrentForm->getValue("end_time1") : $CurrentForm->getValue("x_end_time1");
        if (!$this->end_time1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_time1->Visible = false; // Disable update for API request
            } else {
                $this->end_time1->setFormValue($val);
            }
        }

        // Check field name 'start_time2' first before field var 'x_start_time2'
        $val = $CurrentForm->hasValue("start_time2") ? $CurrentForm->getValue("start_time2") : $CurrentForm->getValue("x_start_time2");
        if (!$this->start_time2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->start_time2->Visible = false; // Disable update for API request
            } else {
                $this->start_time2->setFormValue($val);
            }
        }

        // Check field name 'end_time2' first before field var 'x_end_time2'
        $val = $CurrentForm->hasValue("end_time2") ? $CurrentForm->getValue("end_time2") : $CurrentForm->getValue("x_end_time2");
        if (!$this->end_time2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->end_time2->Visible = false; // Disable update for API request
            } else {
                $this->end_time2->setFormValue($val);
            }
        }

        // Check field name 'slot_time' first before field var 'x_slot_time'
        $val = $CurrentForm->hasValue("slot_time") ? $CurrentForm->getValue("slot_time") : $CurrentForm->getValue("x_slot_time");
        if (!$this->slot_time->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->slot_time->Visible = false; // Disable update for API request
            } else {
                $this->slot_time->setFormValue($val);
            }
        }

        // Check field name 'Fees' first before field var 'x_Fees'
        $val = $CurrentForm->hasValue("Fees") ? $CurrentForm->getValue("Fees") : $CurrentForm->getValue("x_Fees");
        if (!$this->Fees->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fees->Visible = false; // Disable update for API request
            } else {
                $this->Fees->setFormValue($val);
            }
        }

        // Check field name 'slot_days' first before field var 'x_slot_days'
        $val = $CurrentForm->hasValue("slot_days") ? $CurrentForm->getValue("slot_days") : $CurrentForm->getValue("x_slot_days");
        if (!$this->slot_days->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->slot_days->Visible = false; // Disable update for API request
            } else {
                $this->slot_days->setFormValue($val);
            }
        }

        // Check field name 'Status' first before field var 'x_Status'
        $val = $CurrentForm->hasValue("Status") ? $CurrentForm->getValue("Status") : $CurrentForm->getValue("x_Status");
        if (!$this->Status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Status->Visible = false; // Disable update for API request
            } else {
                $this->Status->setFormValue($val);
            }
        }

        // Check field name 'scheduler_id' first before field var 'x_scheduler_id'
        $val = $CurrentForm->hasValue("scheduler_id") ? $CurrentForm->getValue("scheduler_id") : $CurrentForm->getValue("x_scheduler_id");
        if (!$this->scheduler_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->scheduler_id->Visible = false; // Disable update for API request
            } else {
                $this->scheduler_id->setFormValue($val);
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

        // Check field name 'Designation' first before field var 'x_Designation'
        $val = $CurrentForm->hasValue("Designation") ? $CurrentForm->getValue("Designation") : $CurrentForm->getValue("x_Designation");
        if (!$this->Designation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Designation->Visible = false; // Disable update for API request
            } else {
                $this->Designation->setFormValue($val);
            }
        }
        $this->getUploadFiles(); // Get upload files
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->CODE->CurrentValue = $this->CODE->FormValue;
        $this->NAME->CurrentValue = $this->NAME->FormValue;
        $this->DEPARTMENT->CurrentValue = $this->DEPARTMENT->FormValue;
        $this->start_time->CurrentValue = $this->start_time->FormValue;
        $this->end_time->CurrentValue = $this->end_time->FormValue;
        $this->start_time1->CurrentValue = $this->start_time1->FormValue;
        $this->end_time1->CurrentValue = $this->end_time1->FormValue;
        $this->start_time2->CurrentValue = $this->start_time2->FormValue;
        $this->end_time2->CurrentValue = $this->end_time2->FormValue;
        $this->slot_time->CurrentValue = $this->slot_time->FormValue;
        $this->Fees->CurrentValue = $this->Fees->FormValue;
        $this->slot_days->CurrentValue = $this->slot_days->FormValue;
        $this->Status->CurrentValue = $this->Status->FormValue;
        $this->scheduler_id->CurrentValue = $this->scheduler_id->FormValue;
        $this->HospID->CurrentValue = $this->HospID->FormValue;
        $this->Designation->CurrentValue = $this->Designation->FormValue;
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
        $this->CODE->setDbValue($row['CODE']);
        $this->NAME->setDbValue($row['NAME']);
        $this->DEPARTMENT->setDbValue($row['DEPARTMENT']);
        $this->start_time->setDbValue($row['start_time']);
        $this->end_time->setDbValue($row['end_time']);
        $this->start_time1->setDbValue($row['start_time1']);
        $this->end_time1->setDbValue($row['end_time1']);
        $this->start_time2->setDbValue($row['start_time2']);
        $this->end_time2->setDbValue($row['end_time2']);
        $this->slot_time->setDbValue($row['slot_time']);
        $this->Fees->setDbValue($row['Fees']);
        $this->ProfilePic->Upload->DbValue = $row['ProfilePic'];
        $this->ProfilePic->setDbValue($this->ProfilePic->Upload->DbValue);
        $this->slot_days->setDbValue($row['slot_days']);
        $this->Status->setDbValue($row['Status']);
        $this->scheduler_id->setDbValue($row['scheduler_id']);
        $this->HospID->setDbValue($row['HospID']);
        $this->Designation->setDbValue($row['Designation']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['CODE'] = null;
        $row['NAME'] = null;
        $row['DEPARTMENT'] = null;
        $row['start_time'] = null;
        $row['end_time'] = null;
        $row['start_time1'] = null;
        $row['end_time1'] = null;
        $row['start_time2'] = null;
        $row['end_time2'] = null;
        $row['slot_time'] = null;
        $row['Fees'] = null;
        $row['ProfilePic'] = null;
        $row['slot_days'] = null;
        $row['Status'] = null;
        $row['scheduler_id'] = null;
        $row['HospID'] = null;
        $row['Designation'] = null;
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
        if ($this->Fees->FormValue == $this->Fees->CurrentValue && is_numeric(ConvertToFloatString($this->Fees->CurrentValue))) {
            $this->Fees->CurrentValue = ConvertToFloatString($this->Fees->CurrentValue);
        }

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

        // CODE

        // NAME

        // DEPARTMENT

        // start_time

        // end_time

        // start_time1

        // end_time1

        // start_time2

        // end_time2

        // slot_time

        // Fees

        // ProfilePic

        // slot_days

        // Status

        // scheduler_id

        // HospID

        // Designation
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->ViewValue = $this->CODE->CurrentValue;
            $this->CODE->ViewCustomAttributes = "";

            // NAME
            $this->NAME->ViewValue = $this->NAME->CurrentValue;
            $this->NAME->ViewCustomAttributes = "";

            // DEPARTMENT
            $this->DEPARTMENT->ViewValue = $this->DEPARTMENT->CurrentValue;
            $this->DEPARTMENT->ViewCustomAttributes = "";

            // start_time
            $this->start_time->ViewValue = $this->start_time->CurrentValue;
            $this->start_time->ViewCustomAttributes = "";

            // end_time
            $this->end_time->ViewValue = $this->end_time->CurrentValue;
            $this->end_time->ViewCustomAttributes = "";

            // start_time1
            $this->start_time1->ViewValue = $this->start_time1->CurrentValue;
            $this->start_time1->ViewCustomAttributes = "";

            // end_time1
            $this->end_time1->ViewValue = $this->end_time1->CurrentValue;
            $this->end_time1->ViewCustomAttributes = "";

            // start_time2
            $this->start_time2->ViewValue = $this->start_time2->CurrentValue;
            $this->start_time2->ViewCustomAttributes = "";

            // end_time2
            $this->end_time2->ViewValue = $this->end_time2->CurrentValue;
            $this->end_time2->ViewCustomAttributes = "";

            // slot_time
            $this->slot_time->ViewValue = $this->slot_time->CurrentValue;
            $this->slot_time->ViewCustomAttributes = "";

            // Fees
            $this->Fees->ViewValue = $this->Fees->CurrentValue;
            $this->Fees->ViewValue = FormatNumber($this->Fees->ViewValue, 2, -2, -2, -2);
            $this->Fees->ViewCustomAttributes = "";

            // ProfilePic
            if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
                $this->ProfilePic->ImageWidth = 80;
                $this->ProfilePic->ImageHeight = 80;
                $this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
                $this->ProfilePic->ViewValue = $this->ProfilePic->Upload->DbValue;
            } else {
                $this->ProfilePic->ViewValue = "";
            }
            $this->ProfilePic->ViewCustomAttributes = "";

            // slot_days
            $curVal = trim(strval($this->slot_days->CurrentValue));
            if ($curVal != "") {
                $this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
                if ($this->slot_days->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`id`" . SearchString("=", trim($wrk), DATATYPE_NUMBER, "");
                    }
                    $sqlWrk = $this->slot_days->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->slot_days->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->slot_days->Lookup->renderViewRow($row);
                            $this->slot_days->ViewValue->add($this->slot_days->displayValue($arwrk));
                        }
                    } else {
                        $this->slot_days->ViewValue = $this->slot_days->CurrentValue;
                    }
                }
            } else {
                $this->slot_days->ViewValue = null;
            }
            $this->slot_days->ViewCustomAttributes = "";

            // Status
            $curVal = trim(strval($this->Status->CurrentValue));
            if ($curVal != "") {
                $this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
                if ($this->Status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Status->Lookup->renderViewRow($rswrk[0]);
                        $this->Status->ViewValue = $this->Status->displayValue($arwrk);
                    } else {
                        $this->Status->ViewValue = $this->Status->CurrentValue;
                    }
                }
            } else {
                $this->Status->ViewValue = null;
            }
            $this->Status->ViewCustomAttributes = "";

            // scheduler_id
            $this->scheduler_id->ViewValue = $this->scheduler_id->CurrentValue;
            $this->scheduler_id->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // Designation
            $this->Designation->ViewValue = $this->Designation->CurrentValue;
            $this->Designation->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";
            $this->CODE->TooltipValue = "";

            // NAME
            $this->NAME->LinkCustomAttributes = "";
            $this->NAME->HrefValue = "";
            $this->NAME->TooltipValue = "";

            // DEPARTMENT
            $this->DEPARTMENT->LinkCustomAttributes = "";
            $this->DEPARTMENT->HrefValue = "";
            $this->DEPARTMENT->TooltipValue = "";

            // start_time
            $this->start_time->LinkCustomAttributes = "";
            $this->start_time->HrefValue = "";
            $this->start_time->TooltipValue = "";

            // end_time
            $this->end_time->LinkCustomAttributes = "";
            $this->end_time->HrefValue = "";
            $this->end_time->TooltipValue = "";

            // start_time1
            $this->start_time1->LinkCustomAttributes = "";
            $this->start_time1->HrefValue = "";
            $this->start_time1->TooltipValue = "";

            // end_time1
            $this->end_time1->LinkCustomAttributes = "";
            $this->end_time1->HrefValue = "";
            $this->end_time1->TooltipValue = "";

            // start_time2
            $this->start_time2->LinkCustomAttributes = "";
            $this->start_time2->HrefValue = "";
            $this->start_time2->TooltipValue = "";

            // end_time2
            $this->end_time2->LinkCustomAttributes = "";
            $this->end_time2->HrefValue = "";
            $this->end_time2->TooltipValue = "";

            // slot_time
            $this->slot_time->LinkCustomAttributes = "";
            $this->slot_time->HrefValue = "";
            $this->slot_time->TooltipValue = "";

            // Fees
            $this->Fees->LinkCustomAttributes = "";
            $this->Fees->HrefValue = "";
            $this->Fees->TooltipValue = "";

            // ProfilePic
            $this->ProfilePic->LinkCustomAttributes = "";
            if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
                $this->ProfilePic->HrefValue = GetFileUploadUrl($this->ProfilePic, $this->ProfilePic->htmlDecode($this->ProfilePic->Upload->DbValue)); // Add prefix/suffix
                $this->ProfilePic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->ProfilePic->HrefValue = FullUrl($this->ProfilePic->HrefValue, "href");
                }
            } else {
                $this->ProfilePic->HrefValue = "";
            }
            $this->ProfilePic->ExportHrefValue = $this->ProfilePic->UploadPath . $this->ProfilePic->Upload->DbValue;
            $this->ProfilePic->TooltipValue = "";
            if ($this->ProfilePic->UseColorbox) {
                if (EmptyValue($this->ProfilePic->TooltipValue)) {
                    $this->ProfilePic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->ProfilePic->LinkAttrs["data-rel"] = "doctors_x_ProfilePic";
                $this->ProfilePic->LinkAttrs->appendClass("ew-lightbox");
            }

            // slot_days
            $this->slot_days->LinkCustomAttributes = "";
            $this->slot_days->HrefValue = "";
            $this->slot_days->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";
            $this->scheduler_id->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";

            // Designation
            $this->Designation->LinkCustomAttributes = "";
            $this->Designation->HrefValue = "";
            $this->Designation->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // CODE
            $this->CODE->EditAttrs["class"] = "form-control";
            $this->CODE->EditCustomAttributes = "";
            if (!$this->CODE->Raw) {
                $this->CODE->CurrentValue = HtmlDecode($this->CODE->CurrentValue);
            }
            $this->CODE->EditValue = HtmlEncode($this->CODE->CurrentValue);
            $this->CODE->PlaceHolder = RemoveHtml($this->CODE->caption());

            // NAME
            $this->NAME->EditAttrs["class"] = "form-control";
            $this->NAME->EditCustomAttributes = "";
            if (!$this->NAME->Raw) {
                $this->NAME->CurrentValue = HtmlDecode($this->NAME->CurrentValue);
            }
            $this->NAME->EditValue = HtmlEncode($this->NAME->CurrentValue);
            $this->NAME->PlaceHolder = RemoveHtml($this->NAME->caption());

            // DEPARTMENT
            $this->DEPARTMENT->EditAttrs["class"] = "form-control";
            $this->DEPARTMENT->EditCustomAttributes = "";
            if (!$this->DEPARTMENT->Raw) {
                $this->DEPARTMENT->CurrentValue = HtmlDecode($this->DEPARTMENT->CurrentValue);
            }
            $this->DEPARTMENT->EditValue = HtmlEncode($this->DEPARTMENT->CurrentValue);
            $this->DEPARTMENT->PlaceHolder = RemoveHtml($this->DEPARTMENT->caption());

            // start_time
            $this->start_time->EditAttrs["class"] = "form-control";
            $this->start_time->EditCustomAttributes = "";
            if (!$this->start_time->Raw) {
                $this->start_time->CurrentValue = HtmlDecode($this->start_time->CurrentValue);
            }
            $this->start_time->EditValue = HtmlEncode($this->start_time->CurrentValue);
            $this->start_time->PlaceHolder = RemoveHtml($this->start_time->caption());

            // end_time
            $this->end_time->EditAttrs["class"] = "form-control";
            $this->end_time->EditCustomAttributes = "";
            if (!$this->end_time->Raw) {
                $this->end_time->CurrentValue = HtmlDecode($this->end_time->CurrentValue);
            }
            $this->end_time->EditValue = HtmlEncode($this->end_time->CurrentValue);
            $this->end_time->PlaceHolder = RemoveHtml($this->end_time->caption());

            // start_time1
            $this->start_time1->EditAttrs["class"] = "form-control";
            $this->start_time1->EditCustomAttributes = "";
            if (!$this->start_time1->Raw) {
                $this->start_time1->CurrentValue = HtmlDecode($this->start_time1->CurrentValue);
            }
            $this->start_time1->EditValue = HtmlEncode($this->start_time1->CurrentValue);
            $this->start_time1->PlaceHolder = RemoveHtml($this->start_time1->caption());

            // end_time1
            $this->end_time1->EditAttrs["class"] = "form-control";
            $this->end_time1->EditCustomAttributes = "";
            if (!$this->end_time1->Raw) {
                $this->end_time1->CurrentValue = HtmlDecode($this->end_time1->CurrentValue);
            }
            $this->end_time1->EditValue = HtmlEncode($this->end_time1->CurrentValue);
            $this->end_time1->PlaceHolder = RemoveHtml($this->end_time1->caption());

            // start_time2
            $this->start_time2->EditAttrs["class"] = "form-control";
            $this->start_time2->EditCustomAttributes = "";
            if (!$this->start_time2->Raw) {
                $this->start_time2->CurrentValue = HtmlDecode($this->start_time2->CurrentValue);
            }
            $this->start_time2->EditValue = HtmlEncode($this->start_time2->CurrentValue);
            $this->start_time2->PlaceHolder = RemoveHtml($this->start_time2->caption());

            // end_time2
            $this->end_time2->EditAttrs["class"] = "form-control";
            $this->end_time2->EditCustomAttributes = "";
            if (!$this->end_time2->Raw) {
                $this->end_time2->CurrentValue = HtmlDecode($this->end_time2->CurrentValue);
            }
            $this->end_time2->EditValue = HtmlEncode($this->end_time2->CurrentValue);
            $this->end_time2->PlaceHolder = RemoveHtml($this->end_time2->caption());

            // slot_time
            $this->slot_time->EditAttrs["class"] = "form-control";
            $this->slot_time->EditCustomAttributes = "";
            if (!$this->slot_time->Raw) {
                $this->slot_time->CurrentValue = HtmlDecode($this->slot_time->CurrentValue);
            }
            $this->slot_time->EditValue = HtmlEncode($this->slot_time->CurrentValue);
            $this->slot_time->PlaceHolder = RemoveHtml($this->slot_time->caption());

            // Fees
            $this->Fees->EditAttrs["class"] = "form-control";
            $this->Fees->EditCustomAttributes = "";
            $this->Fees->EditValue = HtmlEncode($this->Fees->CurrentValue);
            $this->Fees->PlaceHolder = RemoveHtml($this->Fees->caption());
            if (strval($this->Fees->EditValue) != "" && is_numeric($this->Fees->EditValue)) {
                $this->Fees->EditValue = FormatNumber($this->Fees->EditValue, -2, -2, -2, -2);
            }

            // ProfilePic
            $this->ProfilePic->EditAttrs["class"] = "form-control";
            $this->ProfilePic->EditCustomAttributes = "";
            if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
                $this->ProfilePic->ImageWidth = 80;
                $this->ProfilePic->ImageHeight = 80;
                $this->ProfilePic->ImageAlt = $this->ProfilePic->alt();
                $this->ProfilePic->EditValue = $this->ProfilePic->Upload->DbValue;
            } else {
                $this->ProfilePic->EditValue = "";
            }
            if (!EmptyValue($this->ProfilePic->CurrentValue)) {
                $this->ProfilePic->Upload->FileName = $this->ProfilePic->CurrentValue;
            }
            if ($this->isShow()) {
                RenderUploadField($this->ProfilePic);
            }

            // slot_days
            $this->slot_days->EditCustomAttributes = "";
            $curVal = trim(strval($this->slot_days->CurrentValue));
            if ($curVal != "") {
                $this->slot_days->ViewValue = $this->slot_days->lookupCacheOption($curVal);
            } else {
                $this->slot_days->ViewValue = $this->slot_days->Lookup !== null && is_array($this->slot_days->Lookup->Options) ? $curVal : null;
            }
            if ($this->slot_days->ViewValue !== null) { // Load from cache
                $this->slot_days->EditValue = array_values($this->slot_days->Lookup->Options);
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
                $sqlWrk = $this->slot_days->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->slot_days->EditValue = $arwrk;
            }
            $this->slot_days->PlaceHolder = RemoveHtml($this->slot_days->caption());

            // Status
            $this->Status->EditAttrs["class"] = "form-control";
            $this->Status->EditCustomAttributes = "";
            $curVal = trim(strval($this->Status->CurrentValue));
            if ($curVal != "") {
                $this->Status->ViewValue = $this->Status->lookupCacheOption($curVal);
            } else {
                $this->Status->ViewValue = $this->Status->Lookup !== null && is_array($this->Status->Lookup->Options) ? $curVal : null;
            }
            if ($this->Status->ViewValue !== null) { // Load from cache
                $this->Status->EditValue = array_values($this->Status->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Status->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Status->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->Status->EditValue = $arwrk;
            }
            $this->Status->PlaceHolder = RemoveHtml($this->Status->caption());

            // scheduler_id
            $this->scheduler_id->EditAttrs["class"] = "form-control";
            $this->scheduler_id->EditCustomAttributes = "";
            if (!$this->scheduler_id->Raw) {
                $this->scheduler_id->CurrentValue = HtmlDecode($this->scheduler_id->CurrentValue);
            }
            $this->scheduler_id->EditValue = HtmlEncode($this->scheduler_id->CurrentValue);
            $this->scheduler_id->PlaceHolder = RemoveHtml($this->scheduler_id->caption());

            // HospID

            // Designation
            $this->Designation->EditAttrs["class"] = "form-control";
            $this->Designation->EditCustomAttributes = "";
            if (!$this->Designation->Raw) {
                $this->Designation->CurrentValue = HtmlDecode($this->Designation->CurrentValue);
            }
            $this->Designation->EditValue = HtmlEncode($this->Designation->CurrentValue);
            $this->Designation->PlaceHolder = RemoveHtml($this->Designation->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // CODE
            $this->CODE->LinkCustomAttributes = "";
            $this->CODE->HrefValue = "";

            // NAME
            $this->NAME->LinkCustomAttributes = "";
            $this->NAME->HrefValue = "";

            // DEPARTMENT
            $this->DEPARTMENT->LinkCustomAttributes = "";
            $this->DEPARTMENT->HrefValue = "";

            // start_time
            $this->start_time->LinkCustomAttributes = "";
            $this->start_time->HrefValue = "";

            // end_time
            $this->end_time->LinkCustomAttributes = "";
            $this->end_time->HrefValue = "";

            // start_time1
            $this->start_time1->LinkCustomAttributes = "";
            $this->start_time1->HrefValue = "";

            // end_time1
            $this->end_time1->LinkCustomAttributes = "";
            $this->end_time1->HrefValue = "";

            // start_time2
            $this->start_time2->LinkCustomAttributes = "";
            $this->start_time2->HrefValue = "";

            // end_time2
            $this->end_time2->LinkCustomAttributes = "";
            $this->end_time2->HrefValue = "";

            // slot_time
            $this->slot_time->LinkCustomAttributes = "";
            $this->slot_time->HrefValue = "";

            // Fees
            $this->Fees->LinkCustomAttributes = "";
            $this->Fees->HrefValue = "";

            // ProfilePic
            $this->ProfilePic->LinkCustomAttributes = "";
            if (!EmptyValue($this->ProfilePic->Upload->DbValue)) {
                $this->ProfilePic->HrefValue = GetFileUploadUrl($this->ProfilePic, $this->ProfilePic->htmlDecode($this->ProfilePic->Upload->DbValue)); // Add prefix/suffix
                $this->ProfilePic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->ProfilePic->HrefValue = FullUrl($this->ProfilePic->HrefValue, "href");
                }
            } else {
                $this->ProfilePic->HrefValue = "";
            }
            $this->ProfilePic->ExportHrefValue = $this->ProfilePic->UploadPath . $this->ProfilePic->Upload->DbValue;

            // slot_days
            $this->slot_days->LinkCustomAttributes = "";
            $this->slot_days->HrefValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";

            // scheduler_id
            $this->scheduler_id->LinkCustomAttributes = "";
            $this->scheduler_id->HrefValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";

            // Designation
            $this->Designation->LinkCustomAttributes = "";
            $this->Designation->HrefValue = "";
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
        if ($this->CODE->Required) {
            if (!$this->CODE->IsDetailKey && EmptyValue($this->CODE->FormValue)) {
                $this->CODE->addErrorMessage(str_replace("%s", $this->CODE->caption(), $this->CODE->RequiredErrorMessage));
            }
        }
        if ($this->NAME->Required) {
            if (!$this->NAME->IsDetailKey && EmptyValue($this->NAME->FormValue)) {
                $this->NAME->addErrorMessage(str_replace("%s", $this->NAME->caption(), $this->NAME->RequiredErrorMessage));
            }
        }
        if ($this->DEPARTMENT->Required) {
            if (!$this->DEPARTMENT->IsDetailKey && EmptyValue($this->DEPARTMENT->FormValue)) {
                $this->DEPARTMENT->addErrorMessage(str_replace("%s", $this->DEPARTMENT->caption(), $this->DEPARTMENT->RequiredErrorMessage));
            }
        }
        if ($this->start_time->Required) {
            if (!$this->start_time->IsDetailKey && EmptyValue($this->start_time->FormValue)) {
                $this->start_time->addErrorMessage(str_replace("%s", $this->start_time->caption(), $this->start_time->RequiredErrorMessage));
            }
        }
        if ($this->end_time->Required) {
            if (!$this->end_time->IsDetailKey && EmptyValue($this->end_time->FormValue)) {
                $this->end_time->addErrorMessage(str_replace("%s", $this->end_time->caption(), $this->end_time->RequiredErrorMessage));
            }
        }
        if ($this->start_time1->Required) {
            if (!$this->start_time1->IsDetailKey && EmptyValue($this->start_time1->FormValue)) {
                $this->start_time1->addErrorMessage(str_replace("%s", $this->start_time1->caption(), $this->start_time1->RequiredErrorMessage));
            }
        }
        if ($this->end_time1->Required) {
            if (!$this->end_time1->IsDetailKey && EmptyValue($this->end_time1->FormValue)) {
                $this->end_time1->addErrorMessage(str_replace("%s", $this->end_time1->caption(), $this->end_time1->RequiredErrorMessage));
            }
        }
        if ($this->start_time2->Required) {
            if (!$this->start_time2->IsDetailKey && EmptyValue($this->start_time2->FormValue)) {
                $this->start_time2->addErrorMessage(str_replace("%s", $this->start_time2->caption(), $this->start_time2->RequiredErrorMessage));
            }
        }
        if ($this->end_time2->Required) {
            if (!$this->end_time2->IsDetailKey && EmptyValue($this->end_time2->FormValue)) {
                $this->end_time2->addErrorMessage(str_replace("%s", $this->end_time2->caption(), $this->end_time2->RequiredErrorMessage));
            }
        }
        if ($this->slot_time->Required) {
            if (!$this->slot_time->IsDetailKey && EmptyValue($this->slot_time->FormValue)) {
                $this->slot_time->addErrorMessage(str_replace("%s", $this->slot_time->caption(), $this->slot_time->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->slot_time->FormValue)) {
            $this->slot_time->addErrorMessage($this->slot_time->getErrorMessage(false));
        }
        if ($this->Fees->Required) {
            if (!$this->Fees->IsDetailKey && EmptyValue($this->Fees->FormValue)) {
                $this->Fees->addErrorMessage(str_replace("%s", $this->Fees->caption(), $this->Fees->RequiredErrorMessage));
            }
        }
        if (!CheckNumber($this->Fees->FormValue)) {
            $this->Fees->addErrorMessage($this->Fees->getErrorMessage(false));
        }
        if ($this->ProfilePic->Required) {
            if ($this->ProfilePic->Upload->FileName == "" && !$this->ProfilePic->Upload->KeepFile) {
                $this->ProfilePic->addErrorMessage(str_replace("%s", $this->ProfilePic->caption(), $this->ProfilePic->RequiredErrorMessage));
            }
        }
        if ($this->slot_days->Required) {
            if ($this->slot_days->FormValue == "") {
                $this->slot_days->addErrorMessage(str_replace("%s", $this->slot_days->caption(), $this->slot_days->RequiredErrorMessage));
            }
        }
        if ($this->Status->Required) {
            if (!$this->Status->IsDetailKey && EmptyValue($this->Status->FormValue)) {
                $this->Status->addErrorMessage(str_replace("%s", $this->Status->caption(), $this->Status->RequiredErrorMessage));
            }
        }
        if ($this->scheduler_id->Required) {
            if (!$this->scheduler_id->IsDetailKey && EmptyValue($this->scheduler_id->FormValue)) {
                $this->scheduler_id->addErrorMessage(str_replace("%s", $this->scheduler_id->caption(), $this->scheduler_id->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }
        if ($this->Designation->Required) {
            if (!$this->Designation->IsDetailKey && EmptyValue($this->Designation->FormValue)) {
                $this->Designation->addErrorMessage(str_replace("%s", $this->Designation->caption(), $this->Designation->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("AppointmentSchedulerGrid");
        if (in_array("appointment_scheduler", $detailTblVar) && $detailPage->DetailEdit) {
            $detailPage->validateGridForm();
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
            // Begin transaction
            if ($this->getCurrentDetailTable() != "") {
                $conn->beginTransaction();
            }

            // Save old values
            $this->loadDbValues($rsold);
            $rsnew = [];

            // CODE
            $this->CODE->setDbValueDef($rsnew, $this->CODE->CurrentValue, null, $this->CODE->ReadOnly);

            // NAME
            $this->NAME->setDbValueDef($rsnew, $this->NAME->CurrentValue, null, $this->NAME->ReadOnly);

            // DEPARTMENT
            $this->DEPARTMENT->setDbValueDef($rsnew, $this->DEPARTMENT->CurrentValue, null, $this->DEPARTMENT->ReadOnly);

            // start_time
            $this->start_time->setDbValueDef($rsnew, $this->start_time->CurrentValue, null, $this->start_time->ReadOnly);

            // end_time
            $this->end_time->setDbValueDef($rsnew, $this->end_time->CurrentValue, null, $this->end_time->ReadOnly);

            // start_time1
            $this->start_time1->setDbValueDef($rsnew, $this->start_time1->CurrentValue, null, $this->start_time1->ReadOnly);

            // end_time1
            $this->end_time1->setDbValueDef($rsnew, $this->end_time1->CurrentValue, null, $this->end_time1->ReadOnly);

            // start_time2
            $this->start_time2->setDbValueDef($rsnew, $this->start_time2->CurrentValue, null, $this->start_time2->ReadOnly);

            // end_time2
            $this->end_time2->setDbValueDef($rsnew, $this->end_time2->CurrentValue, null, $this->end_time2->ReadOnly);

            // slot_time
            $this->slot_time->setDbValueDef($rsnew, $this->slot_time->CurrentValue, null, $this->slot_time->ReadOnly);

            // Fees
            $this->Fees->setDbValueDef($rsnew, $this->Fees->CurrentValue, null, $this->Fees->ReadOnly);

            // ProfilePic
            if ($this->ProfilePic->Visible && !$this->ProfilePic->ReadOnly && !$this->ProfilePic->Upload->KeepFile) {
                $this->ProfilePic->Upload->DbValue = $rsold['ProfilePic']; // Get original value
                if ($this->ProfilePic->Upload->FileName == "") {
                    $rsnew['ProfilePic'] = null;
                } else {
                    $rsnew['ProfilePic'] = $this->ProfilePic->Upload->FileName;
                }
            }

            // slot_days
            $this->slot_days->setDbValueDef($rsnew, $this->slot_days->CurrentValue, null, $this->slot_days->ReadOnly);

            // Status
            $this->Status->setDbValueDef($rsnew, $this->Status->CurrentValue, null, $this->Status->ReadOnly);

            // scheduler_id
            $this->scheduler_id->setDbValueDef($rsnew, $this->scheduler_id->CurrentValue, null, $this->scheduler_id->ReadOnly);

            // HospID
            $this->HospID->CurrentValue = HospitalID();
            $this->HospID->setDbValueDef($rsnew, $this->HospID->CurrentValue, null);

            // Designation
            $this->Designation->setDbValueDef($rsnew, $this->Designation->CurrentValue, null, $this->Designation->ReadOnly);
            if ($this->ProfilePic->Visible && !$this->ProfilePic->Upload->KeepFile) {
                $oldFiles = EmptyValue($this->ProfilePic->Upload->DbValue) ? [] : [$this->ProfilePic->htmlDecode($this->ProfilePic->Upload->DbValue)];
                if (!EmptyValue($this->ProfilePic->Upload->FileName)) {
                    $newFiles = [$this->ProfilePic->Upload->FileName];
                    $NewFileCount = count($newFiles);
                    for ($i = 0; $i < $NewFileCount; $i++) {
                        if ($newFiles[$i] != "") {
                            $file = $newFiles[$i];
                            $tempPath = UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index);
                            if (file_exists($tempPath . $file)) {
                                if (Config("DELETE_UPLOADED_FILES")) {
                                    $oldFileFound = false;
                                    $oldFileCount = count($oldFiles);
                                    for ($j = 0; $j < $oldFileCount; $j++) {
                                        $oldFile = $oldFiles[$j];
                                        if ($oldFile == $file) { // Old file found, no need to delete anymore
                                            array_splice($oldFiles, $j, 1);
                                            $oldFileFound = true;
                                            break;
                                        }
                                    }
                                    if ($oldFileFound) { // No need to check if file exists further
                                        continue;
                                    }
                                }
                                $file1 = UniqueFilename($this->ProfilePic->physicalUploadPath(), $file); // Get new file name
                                if ($file1 != $file) { // Rename temp file
                                    while (file_exists($tempPath . $file1) || file_exists($this->ProfilePic->physicalUploadPath() . $file1)) { // Make sure no file name clash
                                        $file1 = UniqueFilename([$this->ProfilePic->physicalUploadPath(), $tempPath], $file1, true); // Use indexed name
                                    }
                                    rename($tempPath . $file, $tempPath . $file1);
                                    $newFiles[$i] = $file1;
                                }
                            }
                        }
                    }
                    $this->ProfilePic->Upload->DbValue = empty($oldFiles) ? "" : implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $oldFiles);
                    $this->ProfilePic->Upload->FileName = implode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $newFiles);
                    $this->ProfilePic->setDbValueDef($rsnew, $this->ProfilePic->Upload->FileName, null, $this->ProfilePic->ReadOnly);
                }
            }

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
                    if ($this->ProfilePic->Visible && !$this->ProfilePic->Upload->KeepFile) {
                        $oldFiles = EmptyValue($this->ProfilePic->Upload->DbValue) ? [] : [$this->ProfilePic->htmlDecode($this->ProfilePic->Upload->DbValue)];
                        if (!EmptyValue($this->ProfilePic->Upload->FileName)) {
                            $newFiles = [$this->ProfilePic->Upload->FileName];
                            $newFiles2 = [$this->ProfilePic->htmlDecode($rsnew['ProfilePic'])];
                            $newFileCount = count($newFiles);
                            for ($i = 0; $i < $newFileCount; $i++) {
                                if ($newFiles[$i] != "") {
                                    $file = UploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index) . $newFiles[$i];
                                    if (file_exists($file)) {
                                        if (@$newFiles2[$i] != "") { // Use correct file name
                                            $newFiles[$i] = $newFiles2[$i];
                                        }
                                        if (!$this->ProfilePic->Upload->SaveToFile($newFiles[$i], true, $i)) { // Just replace
                                            $this->setFailureMessage($Language->phrase("UploadErrMsg7"));
                                            return false;
                                        }
                                    }
                                }
                            }
                        } else {
                            $newFiles = [];
                        }
                        if (Config("DELETE_UPLOADED_FILES")) {
                            foreach ($oldFiles as $oldFile) {
                                if ($oldFile != "" && !in_array($oldFile, $newFiles)) {
                                    @unlink($this->ProfilePic->oldPhysicalUploadPath() . $oldFile);
                                }
                            }
                        }
                    }
                }

                // Update detail records
                $detailTblVar = explode(",", $this->getCurrentDetailTable());
                if ($editRow) {
                    $detailPage = Container("AppointmentSchedulerGrid");
                    if (in_array("appointment_scheduler", $detailTblVar) && $detailPage->DetailEdit) {
                        $Security->loadCurrentUserLevel($this->ProjectID . "appointment_scheduler"); // Load user level of detail table
                        $editRow = $detailPage->gridUpdate();
                        $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                    }
                }

                // Commit/Rollback transaction
                if ($this->getCurrentDetailTable() != "") {
                    if ($editRow) {
                        $conn->commit(); // Commit transaction
                    } else {
                        $conn->rollback(); // Rollback transaction
                    }
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
            // ProfilePic
            CleanUploadTempPath($this->ProfilePic, $this->ProfilePic->Upload->Index);
        }

        // Write JSON for API request
        if (IsApi() && $editRow) {
            $row = $this->getRecordsFromRecordset([$rsnew], true);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $editRow;
    }

    // Set up detail parms based on QueryString
    protected function setupDetailParms()
    {
        // Get the keys for master table
        $detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
        if ($detailTblVar !== null) {
            $this->setCurrentDetailTable($detailTblVar);
        } else {
            $detailTblVar = $this->getCurrentDetailTable();
        }
        if ($detailTblVar != "") {
            $detailTblVar = explode(",", $detailTblVar);
            if (in_array("appointment_scheduler", $detailTblVar)) {
                $detailPageObj = Container("AppointmentSchedulerGrid");
                if ($detailPageObj->DetailEdit) {
                    $detailPageObj->CurrentMode = "edit";
                    $detailPageObj->CurrentAction = "gridedit";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->DoctorID->IsDetailKey = true;
                    $detailPageObj->DoctorID->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->DoctorID->setSessionValue($detailPageObj->DoctorID->CurrentValue);
                }
            }
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("DoctorsList"), "", $this->TableVar, true);
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
                case "x_slot_days":
                    break;
                case "x_Status":
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
