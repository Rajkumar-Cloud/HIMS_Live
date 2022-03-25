<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class EmployeeAdd extends Employee
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'employee';

    // Page object name
    public $PageObjName = "EmployeeAdd";

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

        // Table object (employee)
        if (!isset($GLOBALS["employee"]) || get_class($GLOBALS["employee"]) == PROJECT_NAMESPACE . "employee") {
            $GLOBALS["employee"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'employee');
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
                $doc = new $class(Container("employee"));
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
                    if ($pageName == "EmployeeView") {
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
    public $MultiPages; // Multi pages object

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
        $this->employee_id->setVisibility();
        $this->first_name->setVisibility();
        $this->middle_name->setVisibility();
        $this->last_name->setVisibility();
        $this->gender->setVisibility();
        $this->nationality->setVisibility();
        $this->birthday->setVisibility();
        $this->marital_status->setVisibility();
        $this->ssn_num->setVisibility();
        $this->nic_num->setVisibility();
        $this->other_id->setVisibility();
        $this->driving_license->setVisibility();
        $this->driving_license_exp_date->setVisibility();
        $this->employment_status->setVisibility();
        $this->job_title->setVisibility();
        $this->pay_grade->setVisibility();
        $this->work_station_id->setVisibility();
        $this->address1->setVisibility();
        $this->address2->setVisibility();
        $this->city->setVisibility();
        $this->country->setVisibility();
        $this->province->setVisibility();
        $this->postal_code->setVisibility();
        $this->home_phone->setVisibility();
        $this->mobile_phone->setVisibility();
        $this->work_phone->setVisibility();
        $this->work_email->setVisibility();
        $this->private_email->setVisibility();
        $this->joined_date->setVisibility();
        $this->confirmation_date->setVisibility();
        $this->supervisor->setVisibility();
        $this->indirect_supervisors->setVisibility();
        $this->department->setVisibility();
        $this->custom1->setVisibility();
        $this->custom2->setVisibility();
        $this->custom3->setVisibility();
        $this->custom4->setVisibility();
        $this->custom5->setVisibility();
        $this->custom6->setVisibility();
        $this->custom7->setVisibility();
        $this->custom8->setVisibility();
        $this->custom9->setVisibility();
        $this->custom10->setVisibility();
        $this->termination_date->setVisibility();
        $this->notes->setVisibility();
        $this->ethnicity->setVisibility();
        $this->immigration_status->setVisibility();
        $this->approver1->setVisibility();
        $this->approver2->setVisibility();
        $this->approver3->setVisibility();
        $this->status->setVisibility();
        $this->HospID->setVisibility();
        $this->hideFieldsForAddEdit();

        // Do not use lookup cache
        $this->setUseLookupCache(false);

        // Set up multi page object
        $this->setupMultiPages();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up lookup cache
        $this->setupLookupOptions($this->gender);
        $this->setupLookupOptions($this->nationality);
        $this->setupLookupOptions($this->approver1);
        $this->setupLookupOptions($this->approver2);
        $this->setupLookupOptions($this->approver3);
        $this->setupLookupOptions($this->status);

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

        // Set up detail parameters
        $this->setupDetailParms();

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
                    $this->terminate("EmployeeList"); // No matching record, return to list
                    return;
                }

                // Set up detail parameters
                $this->setupDetailParms();
                break;
            case "insert": // Add new record
                $this->SendEmail = true; // Send email on add success
                if ($this->addRow($this->OldRecordset)) { // Add successful
                    if ($this->getSuccessMessage() == "" && Post("addopt") != "1") { // Skip success message for addopt (done in JavaScript)
                        $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
                    }
                    if ($this->getCurrentDetailTable() != "") { // Master/detail add
                        $returnUrl = $this->getDetailUrl();
                    } else {
                        $returnUrl = $this->getReturnUrl();
                    }
                    if (GetPageName($returnUrl) == "EmployeeList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "EmployeeView") {
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

                    // Set up detail parameters
                    $this->setupDetailParms();
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
        $this->employee_id->CurrentValue = null;
        $this->employee_id->OldValue = $this->employee_id->CurrentValue;
        $this->first_name->CurrentValue = null;
        $this->first_name->OldValue = $this->first_name->CurrentValue;
        $this->middle_name->CurrentValue = null;
        $this->middle_name->OldValue = $this->middle_name->CurrentValue;
        $this->last_name->CurrentValue = null;
        $this->last_name->OldValue = $this->last_name->CurrentValue;
        $this->gender->CurrentValue = null;
        $this->gender->OldValue = $this->gender->CurrentValue;
        $this->nationality->CurrentValue = null;
        $this->nationality->OldValue = $this->nationality->CurrentValue;
        $this->birthday->CurrentValue = null;
        $this->birthday->OldValue = $this->birthday->CurrentValue;
        $this->marital_status->CurrentValue = null;
        $this->marital_status->OldValue = $this->marital_status->CurrentValue;
        $this->ssn_num->CurrentValue = null;
        $this->ssn_num->OldValue = $this->ssn_num->CurrentValue;
        $this->nic_num->CurrentValue = null;
        $this->nic_num->OldValue = $this->nic_num->CurrentValue;
        $this->other_id->CurrentValue = null;
        $this->other_id->OldValue = $this->other_id->CurrentValue;
        $this->driving_license->CurrentValue = null;
        $this->driving_license->OldValue = $this->driving_license->CurrentValue;
        $this->driving_license_exp_date->CurrentValue = null;
        $this->driving_license_exp_date->OldValue = $this->driving_license_exp_date->CurrentValue;
        $this->employment_status->CurrentValue = null;
        $this->employment_status->OldValue = $this->employment_status->CurrentValue;
        $this->job_title->CurrentValue = null;
        $this->job_title->OldValue = $this->job_title->CurrentValue;
        $this->pay_grade->CurrentValue = null;
        $this->pay_grade->OldValue = $this->pay_grade->CurrentValue;
        $this->work_station_id->CurrentValue = null;
        $this->work_station_id->OldValue = $this->work_station_id->CurrentValue;
        $this->address1->CurrentValue = null;
        $this->address1->OldValue = $this->address1->CurrentValue;
        $this->address2->CurrentValue = null;
        $this->address2->OldValue = $this->address2->CurrentValue;
        $this->city->CurrentValue = null;
        $this->city->OldValue = $this->city->CurrentValue;
        $this->country->CurrentValue = null;
        $this->country->OldValue = $this->country->CurrentValue;
        $this->province->CurrentValue = null;
        $this->province->OldValue = $this->province->CurrentValue;
        $this->postal_code->CurrentValue = null;
        $this->postal_code->OldValue = $this->postal_code->CurrentValue;
        $this->home_phone->CurrentValue = null;
        $this->home_phone->OldValue = $this->home_phone->CurrentValue;
        $this->mobile_phone->CurrentValue = null;
        $this->mobile_phone->OldValue = $this->mobile_phone->CurrentValue;
        $this->work_phone->CurrentValue = null;
        $this->work_phone->OldValue = $this->work_phone->CurrentValue;
        $this->work_email->CurrentValue = null;
        $this->work_email->OldValue = $this->work_email->CurrentValue;
        $this->private_email->CurrentValue = null;
        $this->private_email->OldValue = $this->private_email->CurrentValue;
        $this->joined_date->CurrentValue = null;
        $this->joined_date->OldValue = $this->joined_date->CurrentValue;
        $this->confirmation_date->CurrentValue = null;
        $this->confirmation_date->OldValue = $this->confirmation_date->CurrentValue;
        $this->supervisor->CurrentValue = null;
        $this->supervisor->OldValue = $this->supervisor->CurrentValue;
        $this->indirect_supervisors->CurrentValue = null;
        $this->indirect_supervisors->OldValue = $this->indirect_supervisors->CurrentValue;
        $this->department->CurrentValue = null;
        $this->department->OldValue = $this->department->CurrentValue;
        $this->custom1->CurrentValue = null;
        $this->custom1->OldValue = $this->custom1->CurrentValue;
        $this->custom2->CurrentValue = null;
        $this->custom2->OldValue = $this->custom2->CurrentValue;
        $this->custom3->CurrentValue = null;
        $this->custom3->OldValue = $this->custom3->CurrentValue;
        $this->custom4->CurrentValue = null;
        $this->custom4->OldValue = $this->custom4->CurrentValue;
        $this->custom5->CurrentValue = null;
        $this->custom5->OldValue = $this->custom5->CurrentValue;
        $this->custom6->CurrentValue = null;
        $this->custom6->OldValue = $this->custom6->CurrentValue;
        $this->custom7->CurrentValue = null;
        $this->custom7->OldValue = $this->custom7->CurrentValue;
        $this->custom8->CurrentValue = null;
        $this->custom8->OldValue = $this->custom8->CurrentValue;
        $this->custom9->CurrentValue = null;
        $this->custom9->OldValue = $this->custom9->CurrentValue;
        $this->custom10->CurrentValue = null;
        $this->custom10->OldValue = $this->custom10->CurrentValue;
        $this->termination_date->CurrentValue = null;
        $this->termination_date->OldValue = $this->termination_date->CurrentValue;
        $this->notes->CurrentValue = null;
        $this->notes->OldValue = $this->notes->CurrentValue;
        $this->ethnicity->CurrentValue = null;
        $this->ethnicity->OldValue = $this->ethnicity->CurrentValue;
        $this->immigration_status->CurrentValue = null;
        $this->immigration_status->OldValue = $this->immigration_status->CurrentValue;
        $this->approver1->CurrentValue = null;
        $this->approver1->OldValue = $this->approver1->CurrentValue;
        $this->approver2->CurrentValue = null;
        $this->approver2->OldValue = $this->approver2->CurrentValue;
        $this->approver3->CurrentValue = null;
        $this->approver3->OldValue = $this->approver3->CurrentValue;
        $this->status->CurrentValue = null;
        $this->status->OldValue = $this->status->CurrentValue;
        $this->HospID->CurrentValue = null;
        $this->HospID->OldValue = $this->HospID->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

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

        // Check field name 'middle_name' first before field var 'x_middle_name'
        $val = $CurrentForm->hasValue("middle_name") ? $CurrentForm->getValue("middle_name") : $CurrentForm->getValue("x_middle_name");
        if (!$this->middle_name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->middle_name->Visible = false; // Disable update for API request
            } else {
                $this->middle_name->setFormValue($val);
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

        // Check field name 'nationality' first before field var 'x_nationality'
        $val = $CurrentForm->hasValue("nationality") ? $CurrentForm->getValue("nationality") : $CurrentForm->getValue("x_nationality");
        if (!$this->nationality->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nationality->Visible = false; // Disable update for API request
            } else {
                $this->nationality->setFormValue($val);
            }
        }

        // Check field name 'birthday' first before field var 'x_birthday'
        $val = $CurrentForm->hasValue("birthday") ? $CurrentForm->getValue("birthday") : $CurrentForm->getValue("x_birthday");
        if (!$this->birthday->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->birthday->Visible = false; // Disable update for API request
            } else {
                $this->birthday->setFormValue($val);
            }
            $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        }

        // Check field name 'marital_status' first before field var 'x_marital_status'
        $val = $CurrentForm->hasValue("marital_status") ? $CurrentForm->getValue("marital_status") : $CurrentForm->getValue("x_marital_status");
        if (!$this->marital_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->marital_status->Visible = false; // Disable update for API request
            } else {
                $this->marital_status->setFormValue($val);
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

        // Check field name 'driving_license' first before field var 'x_driving_license'
        $val = $CurrentForm->hasValue("driving_license") ? $CurrentForm->getValue("driving_license") : $CurrentForm->getValue("x_driving_license");
        if (!$this->driving_license->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->driving_license->Visible = false; // Disable update for API request
            } else {
                $this->driving_license->setFormValue($val);
            }
        }

        // Check field name 'driving_license_exp_date' first before field var 'x_driving_license_exp_date'
        $val = $CurrentForm->hasValue("driving_license_exp_date") ? $CurrentForm->getValue("driving_license_exp_date") : $CurrentForm->getValue("x_driving_license_exp_date");
        if (!$this->driving_license_exp_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->driving_license_exp_date->Visible = false; // Disable update for API request
            } else {
                $this->driving_license_exp_date->setFormValue($val);
            }
            $this->driving_license_exp_date->CurrentValue = UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0);
        }

        // Check field name 'employment_status' first before field var 'x_employment_status'
        $val = $CurrentForm->hasValue("employment_status") ? $CurrentForm->getValue("employment_status") : $CurrentForm->getValue("x_employment_status");
        if (!$this->employment_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employment_status->Visible = false; // Disable update for API request
            } else {
                $this->employment_status->setFormValue($val);
            }
        }

        // Check field name 'job_title' first before field var 'x_job_title'
        $val = $CurrentForm->hasValue("job_title") ? $CurrentForm->getValue("job_title") : $CurrentForm->getValue("x_job_title");
        if (!$this->job_title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->job_title->Visible = false; // Disable update for API request
            } else {
                $this->job_title->setFormValue($val);
            }
        }

        // Check field name 'pay_grade' first before field var 'x_pay_grade'
        $val = $CurrentForm->hasValue("pay_grade") ? $CurrentForm->getValue("pay_grade") : $CurrentForm->getValue("x_pay_grade");
        if (!$this->pay_grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pay_grade->Visible = false; // Disable update for API request
            } else {
                $this->pay_grade->setFormValue($val);
            }
        }

        // Check field name 'work_station_id' first before field var 'x_work_station_id'
        $val = $CurrentForm->hasValue("work_station_id") ? $CurrentForm->getValue("work_station_id") : $CurrentForm->getValue("x_work_station_id");
        if (!$this->work_station_id->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->work_station_id->Visible = false; // Disable update for API request
            } else {
                $this->work_station_id->setFormValue($val);
            }
        }

        // Check field name 'address1' first before field var 'x_address1'
        $val = $CurrentForm->hasValue("address1") ? $CurrentForm->getValue("address1") : $CurrentForm->getValue("x_address1");
        if (!$this->address1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->address1->Visible = false; // Disable update for API request
            } else {
                $this->address1->setFormValue($val);
            }
        }

        // Check field name 'address2' first before field var 'x_address2'
        $val = $CurrentForm->hasValue("address2") ? $CurrentForm->getValue("address2") : $CurrentForm->getValue("x_address2");
        if (!$this->address2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->address2->Visible = false; // Disable update for API request
            } else {
                $this->address2->setFormValue($val);
            }
        }

        // Check field name 'city' first before field var 'x_city'
        $val = $CurrentForm->hasValue("city") ? $CurrentForm->getValue("city") : $CurrentForm->getValue("x_city");
        if (!$this->city->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->city->Visible = false; // Disable update for API request
            } else {
                $this->city->setFormValue($val);
            }
        }

        // Check field name 'country' first before field var 'x_country'
        $val = $CurrentForm->hasValue("country") ? $CurrentForm->getValue("country") : $CurrentForm->getValue("x_country");
        if (!$this->country->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->country->Visible = false; // Disable update for API request
            } else {
                $this->country->setFormValue($val);
            }
        }

        // Check field name 'province' first before field var 'x_province'
        $val = $CurrentForm->hasValue("province") ? $CurrentForm->getValue("province") : $CurrentForm->getValue("x_province");
        if (!$this->province->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->province->Visible = false; // Disable update for API request
            } else {
                $this->province->setFormValue($val);
            }
        }

        // Check field name 'postal_code' first before field var 'x_postal_code'
        $val = $CurrentForm->hasValue("postal_code") ? $CurrentForm->getValue("postal_code") : $CurrentForm->getValue("x_postal_code");
        if (!$this->postal_code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postal_code->Visible = false; // Disable update for API request
            } else {
                $this->postal_code->setFormValue($val);
            }
        }

        // Check field name 'home_phone' first before field var 'x_home_phone'
        $val = $CurrentForm->hasValue("home_phone") ? $CurrentForm->getValue("home_phone") : $CurrentForm->getValue("x_home_phone");
        if (!$this->home_phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->home_phone->Visible = false; // Disable update for API request
            } else {
                $this->home_phone->setFormValue($val);
            }
        }

        // Check field name 'mobile_phone' first before field var 'x_mobile_phone'
        $val = $CurrentForm->hasValue("mobile_phone") ? $CurrentForm->getValue("mobile_phone") : $CurrentForm->getValue("x_mobile_phone");
        if (!$this->mobile_phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->mobile_phone->Visible = false; // Disable update for API request
            } else {
                $this->mobile_phone->setFormValue($val);
            }
        }

        // Check field name 'work_phone' first before field var 'x_work_phone'
        $val = $CurrentForm->hasValue("work_phone") ? $CurrentForm->getValue("work_phone") : $CurrentForm->getValue("x_work_phone");
        if (!$this->work_phone->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->work_phone->Visible = false; // Disable update for API request
            } else {
                $this->work_phone->setFormValue($val);
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

        // Check field name 'private_email' first before field var 'x_private_email'
        $val = $CurrentForm->hasValue("private_email") ? $CurrentForm->getValue("private_email") : $CurrentForm->getValue("x_private_email");
        if (!$this->private_email->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->private_email->Visible = false; // Disable update for API request
            } else {
                $this->private_email->setFormValue($val);
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

        // Check field name 'indirect_supervisors' first before field var 'x_indirect_supervisors'
        $val = $CurrentForm->hasValue("indirect_supervisors") ? $CurrentForm->getValue("indirect_supervisors") : $CurrentForm->getValue("x_indirect_supervisors");
        if (!$this->indirect_supervisors->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->indirect_supervisors->Visible = false; // Disable update for API request
            } else {
                $this->indirect_supervisors->setFormValue($val);
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

        // Check field name 'custom1' first before field var 'x_custom1'
        $val = $CurrentForm->hasValue("custom1") ? $CurrentForm->getValue("custom1") : $CurrentForm->getValue("x_custom1");
        if (!$this->custom1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom1->Visible = false; // Disable update for API request
            } else {
                $this->custom1->setFormValue($val);
            }
        }

        // Check field name 'custom2' first before field var 'x_custom2'
        $val = $CurrentForm->hasValue("custom2") ? $CurrentForm->getValue("custom2") : $CurrentForm->getValue("x_custom2");
        if (!$this->custom2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom2->Visible = false; // Disable update for API request
            } else {
                $this->custom2->setFormValue($val);
            }
        }

        // Check field name 'custom3' first before field var 'x_custom3'
        $val = $CurrentForm->hasValue("custom3") ? $CurrentForm->getValue("custom3") : $CurrentForm->getValue("x_custom3");
        if (!$this->custom3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom3->Visible = false; // Disable update for API request
            } else {
                $this->custom3->setFormValue($val);
            }
        }

        // Check field name 'custom4' first before field var 'x_custom4'
        $val = $CurrentForm->hasValue("custom4") ? $CurrentForm->getValue("custom4") : $CurrentForm->getValue("x_custom4");
        if (!$this->custom4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom4->Visible = false; // Disable update for API request
            } else {
                $this->custom4->setFormValue($val);
            }
        }

        // Check field name 'custom5' first before field var 'x_custom5'
        $val = $CurrentForm->hasValue("custom5") ? $CurrentForm->getValue("custom5") : $CurrentForm->getValue("x_custom5");
        if (!$this->custom5->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom5->Visible = false; // Disable update for API request
            } else {
                $this->custom5->setFormValue($val);
            }
        }

        // Check field name 'custom6' first before field var 'x_custom6'
        $val = $CurrentForm->hasValue("custom6") ? $CurrentForm->getValue("custom6") : $CurrentForm->getValue("x_custom6");
        if (!$this->custom6->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom6->Visible = false; // Disable update for API request
            } else {
                $this->custom6->setFormValue($val);
            }
        }

        // Check field name 'custom7' first before field var 'x_custom7'
        $val = $CurrentForm->hasValue("custom7") ? $CurrentForm->getValue("custom7") : $CurrentForm->getValue("x_custom7");
        if (!$this->custom7->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom7->Visible = false; // Disable update for API request
            } else {
                $this->custom7->setFormValue($val);
            }
        }

        // Check field name 'custom8' first before field var 'x_custom8'
        $val = $CurrentForm->hasValue("custom8") ? $CurrentForm->getValue("custom8") : $CurrentForm->getValue("x_custom8");
        if (!$this->custom8->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom8->Visible = false; // Disable update for API request
            } else {
                $this->custom8->setFormValue($val);
            }
        }

        // Check field name 'custom9' first before field var 'x_custom9'
        $val = $CurrentForm->hasValue("custom9") ? $CurrentForm->getValue("custom9") : $CurrentForm->getValue("x_custom9");
        if (!$this->custom9->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom9->Visible = false; // Disable update for API request
            } else {
                $this->custom9->setFormValue($val);
            }
        }

        // Check field name 'custom10' first before field var 'x_custom10'
        $val = $CurrentForm->hasValue("custom10") ? $CurrentForm->getValue("custom10") : $CurrentForm->getValue("x_custom10");
        if (!$this->custom10->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->custom10->Visible = false; // Disable update for API request
            } else {
                $this->custom10->setFormValue($val);
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

        // Check field name 'ethnicity' first before field var 'x_ethnicity'
        $val = $CurrentForm->hasValue("ethnicity") ? $CurrentForm->getValue("ethnicity") : $CurrentForm->getValue("x_ethnicity");
        if (!$this->ethnicity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ethnicity->Visible = false; // Disable update for API request
            } else {
                $this->ethnicity->setFormValue($val);
            }
        }

        // Check field name 'immigration_status' first before field var 'x_immigration_status'
        $val = $CurrentForm->hasValue("immigration_status") ? $CurrentForm->getValue("immigration_status") : $CurrentForm->getValue("x_immigration_status");
        if (!$this->immigration_status->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->immigration_status->Visible = false; // Disable update for API request
            } else {
                $this->immigration_status->setFormValue($val);
            }
        }

        // Check field name 'approver1' first before field var 'x_approver1'
        $val = $CurrentForm->hasValue("approver1") ? $CurrentForm->getValue("approver1") : $CurrentForm->getValue("x_approver1");
        if (!$this->approver1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->approver1->Visible = false; // Disable update for API request
            } else {
                $this->approver1->setFormValue($val);
            }
        }

        // Check field name 'approver2' first before field var 'x_approver2'
        $val = $CurrentForm->hasValue("approver2") ? $CurrentForm->getValue("approver2") : $CurrentForm->getValue("x_approver2");
        if (!$this->approver2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->approver2->Visible = false; // Disable update for API request
            } else {
                $this->approver2->setFormValue($val);
            }
        }

        // Check field name 'approver3' first before field var 'x_approver3'
        $val = $CurrentForm->hasValue("approver3") ? $CurrentForm->getValue("approver3") : $CurrentForm->getValue("x_approver3");
        if (!$this->approver3->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->approver3->Visible = false; // Disable update for API request
            } else {
                $this->approver3->setFormValue($val);
            }
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
        $this->employee_id->CurrentValue = $this->employee_id->FormValue;
        $this->first_name->CurrentValue = $this->first_name->FormValue;
        $this->middle_name->CurrentValue = $this->middle_name->FormValue;
        $this->last_name->CurrentValue = $this->last_name->FormValue;
        $this->gender->CurrentValue = $this->gender->FormValue;
        $this->nationality->CurrentValue = $this->nationality->FormValue;
        $this->birthday->CurrentValue = $this->birthday->FormValue;
        $this->birthday->CurrentValue = UnFormatDateTime($this->birthday->CurrentValue, 0);
        $this->marital_status->CurrentValue = $this->marital_status->FormValue;
        $this->ssn_num->CurrentValue = $this->ssn_num->FormValue;
        $this->nic_num->CurrentValue = $this->nic_num->FormValue;
        $this->other_id->CurrentValue = $this->other_id->FormValue;
        $this->driving_license->CurrentValue = $this->driving_license->FormValue;
        $this->driving_license_exp_date->CurrentValue = $this->driving_license_exp_date->FormValue;
        $this->driving_license_exp_date->CurrentValue = UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0);
        $this->employment_status->CurrentValue = $this->employment_status->FormValue;
        $this->job_title->CurrentValue = $this->job_title->FormValue;
        $this->pay_grade->CurrentValue = $this->pay_grade->FormValue;
        $this->work_station_id->CurrentValue = $this->work_station_id->FormValue;
        $this->address1->CurrentValue = $this->address1->FormValue;
        $this->address2->CurrentValue = $this->address2->FormValue;
        $this->city->CurrentValue = $this->city->FormValue;
        $this->country->CurrentValue = $this->country->FormValue;
        $this->province->CurrentValue = $this->province->FormValue;
        $this->postal_code->CurrentValue = $this->postal_code->FormValue;
        $this->home_phone->CurrentValue = $this->home_phone->FormValue;
        $this->mobile_phone->CurrentValue = $this->mobile_phone->FormValue;
        $this->work_phone->CurrentValue = $this->work_phone->FormValue;
        $this->work_email->CurrentValue = $this->work_email->FormValue;
        $this->private_email->CurrentValue = $this->private_email->FormValue;
        $this->joined_date->CurrentValue = $this->joined_date->FormValue;
        $this->joined_date->CurrentValue = UnFormatDateTime($this->joined_date->CurrentValue, 0);
        $this->confirmation_date->CurrentValue = $this->confirmation_date->FormValue;
        $this->confirmation_date->CurrentValue = UnFormatDateTime($this->confirmation_date->CurrentValue, 0);
        $this->supervisor->CurrentValue = $this->supervisor->FormValue;
        $this->indirect_supervisors->CurrentValue = $this->indirect_supervisors->FormValue;
        $this->department->CurrentValue = $this->department->FormValue;
        $this->custom1->CurrentValue = $this->custom1->FormValue;
        $this->custom2->CurrentValue = $this->custom2->FormValue;
        $this->custom3->CurrentValue = $this->custom3->FormValue;
        $this->custom4->CurrentValue = $this->custom4->FormValue;
        $this->custom5->CurrentValue = $this->custom5->FormValue;
        $this->custom6->CurrentValue = $this->custom6->FormValue;
        $this->custom7->CurrentValue = $this->custom7->FormValue;
        $this->custom8->CurrentValue = $this->custom8->FormValue;
        $this->custom9->CurrentValue = $this->custom9->FormValue;
        $this->custom10->CurrentValue = $this->custom10->FormValue;
        $this->termination_date->CurrentValue = $this->termination_date->FormValue;
        $this->termination_date->CurrentValue = UnFormatDateTime($this->termination_date->CurrentValue, 0);
        $this->notes->CurrentValue = $this->notes->FormValue;
        $this->ethnicity->CurrentValue = $this->ethnicity->FormValue;
        $this->immigration_status->CurrentValue = $this->immigration_status->FormValue;
        $this->approver1->CurrentValue = $this->approver1->FormValue;
        $this->approver2->CurrentValue = $this->approver2->FormValue;
        $this->approver3->CurrentValue = $this->approver3->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
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
        $this->employee_id->setDbValue($row['employee_id']);
        $this->first_name->setDbValue($row['first_name']);
        $this->middle_name->setDbValue($row['middle_name']);
        $this->last_name->setDbValue($row['last_name']);
        $this->gender->setDbValue($row['gender']);
        $this->nationality->setDbValue($row['nationality']);
        $this->birthday->setDbValue($row['birthday']);
        $this->marital_status->setDbValue($row['marital_status']);
        $this->ssn_num->setDbValue($row['ssn_num']);
        $this->nic_num->setDbValue($row['nic_num']);
        $this->other_id->setDbValue($row['other_id']);
        $this->driving_license->setDbValue($row['driving_license']);
        $this->driving_license_exp_date->setDbValue($row['driving_license_exp_date']);
        $this->employment_status->setDbValue($row['employment_status']);
        $this->job_title->setDbValue($row['job_title']);
        $this->pay_grade->setDbValue($row['pay_grade']);
        $this->work_station_id->setDbValue($row['work_station_id']);
        $this->address1->setDbValue($row['address1']);
        $this->address2->setDbValue($row['address2']);
        $this->city->setDbValue($row['city']);
        $this->country->setDbValue($row['country']);
        $this->province->setDbValue($row['province']);
        $this->postal_code->setDbValue($row['postal_code']);
        $this->home_phone->setDbValue($row['home_phone']);
        $this->mobile_phone->setDbValue($row['mobile_phone']);
        $this->work_phone->setDbValue($row['work_phone']);
        $this->work_email->setDbValue($row['work_email']);
        $this->private_email->setDbValue($row['private_email']);
        $this->joined_date->setDbValue($row['joined_date']);
        $this->confirmation_date->setDbValue($row['confirmation_date']);
        $this->supervisor->setDbValue($row['supervisor']);
        $this->indirect_supervisors->setDbValue($row['indirect_supervisors']);
        $this->department->setDbValue($row['department']);
        $this->custom1->setDbValue($row['custom1']);
        $this->custom2->setDbValue($row['custom2']);
        $this->custom3->setDbValue($row['custom3']);
        $this->custom4->setDbValue($row['custom4']);
        $this->custom5->setDbValue($row['custom5']);
        $this->custom6->setDbValue($row['custom6']);
        $this->custom7->setDbValue($row['custom7']);
        $this->custom8->setDbValue($row['custom8']);
        $this->custom9->setDbValue($row['custom9']);
        $this->custom10->setDbValue($row['custom10']);
        $this->termination_date->setDbValue($row['termination_date']);
        $this->notes->setDbValue($row['notes']);
        $this->ethnicity->setDbValue($row['ethnicity']);
        $this->immigration_status->setDbValue($row['immigration_status']);
        $this->approver1->setDbValue($row['approver1']);
        $this->approver2->setDbValue($row['approver2']);
        $this->approver3->setDbValue($row['approver3']);
        $this->status->setDbValue($row['status']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['employee_id'] = $this->employee_id->CurrentValue;
        $row['first_name'] = $this->first_name->CurrentValue;
        $row['middle_name'] = $this->middle_name->CurrentValue;
        $row['last_name'] = $this->last_name->CurrentValue;
        $row['gender'] = $this->gender->CurrentValue;
        $row['nationality'] = $this->nationality->CurrentValue;
        $row['birthday'] = $this->birthday->CurrentValue;
        $row['marital_status'] = $this->marital_status->CurrentValue;
        $row['ssn_num'] = $this->ssn_num->CurrentValue;
        $row['nic_num'] = $this->nic_num->CurrentValue;
        $row['other_id'] = $this->other_id->CurrentValue;
        $row['driving_license'] = $this->driving_license->CurrentValue;
        $row['driving_license_exp_date'] = $this->driving_license_exp_date->CurrentValue;
        $row['employment_status'] = $this->employment_status->CurrentValue;
        $row['job_title'] = $this->job_title->CurrentValue;
        $row['pay_grade'] = $this->pay_grade->CurrentValue;
        $row['work_station_id'] = $this->work_station_id->CurrentValue;
        $row['address1'] = $this->address1->CurrentValue;
        $row['address2'] = $this->address2->CurrentValue;
        $row['city'] = $this->city->CurrentValue;
        $row['country'] = $this->country->CurrentValue;
        $row['province'] = $this->province->CurrentValue;
        $row['postal_code'] = $this->postal_code->CurrentValue;
        $row['home_phone'] = $this->home_phone->CurrentValue;
        $row['mobile_phone'] = $this->mobile_phone->CurrentValue;
        $row['work_phone'] = $this->work_phone->CurrentValue;
        $row['work_email'] = $this->work_email->CurrentValue;
        $row['private_email'] = $this->private_email->CurrentValue;
        $row['joined_date'] = $this->joined_date->CurrentValue;
        $row['confirmation_date'] = $this->confirmation_date->CurrentValue;
        $row['supervisor'] = $this->supervisor->CurrentValue;
        $row['indirect_supervisors'] = $this->indirect_supervisors->CurrentValue;
        $row['department'] = $this->department->CurrentValue;
        $row['custom1'] = $this->custom1->CurrentValue;
        $row['custom2'] = $this->custom2->CurrentValue;
        $row['custom3'] = $this->custom3->CurrentValue;
        $row['custom4'] = $this->custom4->CurrentValue;
        $row['custom5'] = $this->custom5->CurrentValue;
        $row['custom6'] = $this->custom6->CurrentValue;
        $row['custom7'] = $this->custom7->CurrentValue;
        $row['custom8'] = $this->custom8->CurrentValue;
        $row['custom9'] = $this->custom9->CurrentValue;
        $row['custom10'] = $this->custom10->CurrentValue;
        $row['termination_date'] = $this->termination_date->CurrentValue;
        $row['notes'] = $this->notes->CurrentValue;
        $row['ethnicity'] = $this->ethnicity->CurrentValue;
        $row['immigration_status'] = $this->immigration_status->CurrentValue;
        $row['approver1'] = $this->approver1->CurrentValue;
        $row['approver2'] = $this->approver2->CurrentValue;
        $row['approver3'] = $this->approver3->CurrentValue;
        $row['status'] = $this->status->CurrentValue;
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

        // employee_id

        // first_name

        // middle_name

        // last_name

        // gender

        // nationality

        // birthday

        // marital_status

        // ssn_num

        // nic_num

        // other_id

        // driving_license

        // driving_license_exp_date

        // employment_status

        // job_title

        // pay_grade

        // work_station_id

        // address1

        // address2

        // city

        // country

        // province

        // postal_code

        // home_phone

        // mobile_phone

        // work_phone

        // work_email

        // private_email

        // joined_date

        // confirmation_date

        // supervisor

        // indirect_supervisors

        // department

        // custom1

        // custom2

        // custom3

        // custom4

        // custom5

        // custom6

        // custom7

        // custom8

        // custom9

        // custom10

        // termination_date

        // notes

        // ethnicity

        // immigration_status

        // approver1

        // approver2

        // approver3

        // status

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->ViewValue = $this->employee_id->CurrentValue;
            $this->employee_id->ViewCustomAttributes = "";

            // first_name
            $this->first_name->ViewValue = $this->first_name->CurrentValue;
            $this->first_name->ViewCustomAttributes = "";

            // middle_name
            $this->middle_name->ViewValue = $this->middle_name->CurrentValue;
            $this->middle_name->ViewCustomAttributes = "";

            // last_name
            $this->last_name->ViewValue = $this->last_name->CurrentValue;
            $this->last_name->ViewCustomAttributes = "";

            // gender
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
                if ($this->gender->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Name`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->gender->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->gender->Lookup->renderViewRow($rswrk[0]);
                        $this->gender->ViewValue = $this->gender->displayValue($arwrk);
                    } else {
                        $this->gender->ViewValue = $this->gender->CurrentValue;
                    }
                }
            } else {
                $this->gender->ViewValue = null;
            }
            $this->gender->ViewCustomAttributes = "";

            // nationality
            $curVal = trim(strval($this->nationality->CurrentValue));
            if ($curVal != "") {
                $this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
                if ($this->nationality->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->nationality->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->nationality->Lookup->renderViewRow($rswrk[0]);
                        $this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
                    } else {
                        $this->nationality->ViewValue = $this->nationality->CurrentValue;
                    }
                }
            } else {
                $this->nationality->ViewValue = null;
            }
            $this->nationality->ViewCustomAttributes = "";

            // birthday
            $this->birthday->ViewValue = $this->birthday->CurrentValue;
            $this->birthday->ViewValue = FormatDateTime($this->birthday->ViewValue, 0);
            $this->birthday->ViewCustomAttributes = "";

            // marital_status
            if (strval($this->marital_status->CurrentValue) != "") {
                $this->marital_status->ViewValue = $this->marital_status->optionCaption($this->marital_status->CurrentValue);
            } else {
                $this->marital_status->ViewValue = null;
            }
            $this->marital_status->ViewCustomAttributes = "";

            // ssn_num
            $this->ssn_num->ViewValue = $this->ssn_num->CurrentValue;
            $this->ssn_num->ViewCustomAttributes = "";

            // nic_num
            $this->nic_num->ViewValue = $this->nic_num->CurrentValue;
            $this->nic_num->ViewCustomAttributes = "";

            // other_id
            $this->other_id->ViewValue = $this->other_id->CurrentValue;
            $this->other_id->ViewCustomAttributes = "";

            // driving_license
            $this->driving_license->ViewValue = $this->driving_license->CurrentValue;
            $this->driving_license->ViewCustomAttributes = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->ViewValue = $this->driving_license_exp_date->CurrentValue;
            $this->driving_license_exp_date->ViewValue = FormatDateTime($this->driving_license_exp_date->ViewValue, 0);
            $this->driving_license_exp_date->ViewCustomAttributes = "";

            // employment_status
            $this->employment_status->ViewValue = $this->employment_status->CurrentValue;
            $this->employment_status->ViewValue = FormatNumber($this->employment_status->ViewValue, 0, -2, -2, -2);
            $this->employment_status->ViewCustomAttributes = "";

            // job_title
            $this->job_title->ViewValue = $this->job_title->CurrentValue;
            $this->job_title->ViewValue = FormatNumber($this->job_title->ViewValue, 0, -2, -2, -2);
            $this->job_title->ViewCustomAttributes = "";

            // pay_grade
            $this->pay_grade->ViewValue = $this->pay_grade->CurrentValue;
            $this->pay_grade->ViewValue = FormatNumber($this->pay_grade->ViewValue, 0, -2, -2, -2);
            $this->pay_grade->ViewCustomAttributes = "";

            // work_station_id
            $this->work_station_id->ViewValue = $this->work_station_id->CurrentValue;
            $this->work_station_id->ViewCustomAttributes = "";

            // address1
            $this->address1->ViewValue = $this->address1->CurrentValue;
            $this->address1->ViewCustomAttributes = "";

            // address2
            $this->address2->ViewValue = $this->address2->CurrentValue;
            $this->address2->ViewCustomAttributes = "";

            // city
            $this->city->ViewValue = $this->city->CurrentValue;
            $this->city->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewCustomAttributes = "";

            // province
            $this->province->ViewValue = $this->province->CurrentValue;
            $this->province->ViewValue = FormatNumber($this->province->ViewValue, 0, -2, -2, -2);
            $this->province->ViewCustomAttributes = "";

            // postal_code
            $this->postal_code->ViewValue = $this->postal_code->CurrentValue;
            $this->postal_code->ViewCustomAttributes = "";

            // home_phone
            $this->home_phone->ViewValue = $this->home_phone->CurrentValue;
            $this->home_phone->ViewCustomAttributes = "";

            // mobile_phone
            $this->mobile_phone->ViewValue = $this->mobile_phone->CurrentValue;
            $this->mobile_phone->ViewCustomAttributes = "";

            // work_phone
            $this->work_phone->ViewValue = $this->work_phone->CurrentValue;
            $this->work_phone->ViewCustomAttributes = "";

            // work_email
            $this->work_email->ViewValue = $this->work_email->CurrentValue;
            $this->work_email->ViewCustomAttributes = "";

            // private_email
            $this->private_email->ViewValue = $this->private_email->CurrentValue;
            $this->private_email->ViewCustomAttributes = "";

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

            // indirect_supervisors
            $this->indirect_supervisors->ViewValue = $this->indirect_supervisors->CurrentValue;
            $this->indirect_supervisors->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewValue = FormatNumber($this->department->ViewValue, 0, -2, -2, -2);
            $this->department->ViewCustomAttributes = "";

            // custom1
            $this->custom1->ViewValue = $this->custom1->CurrentValue;
            $this->custom1->ViewCustomAttributes = "";

            // custom2
            $this->custom2->ViewValue = $this->custom2->CurrentValue;
            $this->custom2->ViewCustomAttributes = "";

            // custom3
            $this->custom3->ViewValue = $this->custom3->CurrentValue;
            $this->custom3->ViewCustomAttributes = "";

            // custom4
            $this->custom4->ViewValue = $this->custom4->CurrentValue;
            $this->custom4->ViewCustomAttributes = "";

            // custom5
            $this->custom5->ViewValue = $this->custom5->CurrentValue;
            $this->custom5->ViewCustomAttributes = "";

            // custom6
            $this->custom6->ViewValue = $this->custom6->CurrentValue;
            $this->custom6->ViewCustomAttributes = "";

            // custom7
            $this->custom7->ViewValue = $this->custom7->CurrentValue;
            $this->custom7->ViewCustomAttributes = "";

            // custom8
            $this->custom8->ViewValue = $this->custom8->CurrentValue;
            $this->custom8->ViewCustomAttributes = "";

            // custom9
            $this->custom9->ViewValue = $this->custom9->CurrentValue;
            $this->custom9->ViewCustomAttributes = "";

            // custom10
            $this->custom10->ViewValue = $this->custom10->CurrentValue;
            $this->custom10->ViewCustomAttributes = "";

            // termination_date
            $this->termination_date->ViewValue = $this->termination_date->CurrentValue;
            $this->termination_date->ViewValue = FormatDateTime($this->termination_date->ViewValue, 0);
            $this->termination_date->ViewCustomAttributes = "";

            // notes
            $this->notes->ViewValue = $this->notes->CurrentValue;
            $this->notes->ViewCustomAttributes = "";

            // ethnicity
            $this->ethnicity->ViewValue = $this->ethnicity->CurrentValue;
            $this->ethnicity->ViewValue = FormatNumber($this->ethnicity->ViewValue, 0, -2, -2, -2);
            $this->ethnicity->ViewCustomAttributes = "";

            // immigration_status
            $this->immigration_status->ViewValue = $this->immigration_status->CurrentValue;
            $this->immigration_status->ViewValue = FormatNumber($this->immigration_status->ViewValue, 0, -2, -2, -2);
            $this->immigration_status->ViewCustomAttributes = "";

            // approver1
            $curVal = trim(strval($this->approver1->CurrentValue));
            if ($curVal != "") {
                $this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
                if ($this->approver1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver1->Lookup->renderViewRow($rswrk[0]);
                        $this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
                    } else {
                        $this->approver1->ViewValue = $this->approver1->CurrentValue;
                    }
                }
            } else {
                $this->approver1->ViewValue = null;
            }
            $this->approver1->ViewCustomAttributes = "";

            // approver2
            $curVal = trim(strval($this->approver2->CurrentValue));
            if ($curVal != "") {
                $this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
                if ($this->approver2->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver2->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver2->Lookup->renderViewRow($rswrk[0]);
                        $this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
                    } else {
                        $this->approver2->ViewValue = $this->approver2->CurrentValue;
                    }
                }
            } else {
                $this->approver2->ViewValue = null;
            }
            $this->approver2->ViewCustomAttributes = "";

            // approver3
            $curVal = trim(strval($this->approver3->CurrentValue));
            if ($curVal != "") {
                $this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
                if ($this->approver3->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->approver3->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->approver3->Lookup->renderViewRow($rswrk[0]);
                        $this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
                    } else {
                        $this->approver3->ViewValue = $this->approver3->CurrentValue;
                    }
                }
            } else {
                $this->approver3->ViewValue = null;
            }
            $this->approver3->ViewCustomAttributes = "";

            // status
            $curVal = trim(strval($this->status->CurrentValue));
            if ($curVal != "") {
                $this->status->ViewValue = $this->status->lookupCacheOption($curVal);
                if ($this->status->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status->Lookup->renderViewRow($rswrk[0]);
                        $this->status->ViewValue = $this->status->displayValue($arwrk);
                    } else {
                        $this->status->ViewValue = $this->status->CurrentValue;
                    }
                }
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";
            $this->employee_id->TooltipValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";
            $this->first_name->TooltipValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";
            $this->middle_name->TooltipValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";
            $this->last_name->TooltipValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";
            $this->gender->TooltipValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";
            $this->nationality->TooltipValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";
            $this->birthday->TooltipValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";
            $this->marital_status->TooltipValue = "";

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

            // driving_license
            $this->driving_license->LinkCustomAttributes = "";
            $this->driving_license->HrefValue = "";
            $this->driving_license->TooltipValue = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->LinkCustomAttributes = "";
            $this->driving_license_exp_date->HrefValue = "";
            $this->driving_license_exp_date->TooltipValue = "";

            // employment_status
            $this->employment_status->LinkCustomAttributes = "";
            $this->employment_status->HrefValue = "";
            $this->employment_status->TooltipValue = "";

            // job_title
            $this->job_title->LinkCustomAttributes = "";
            $this->job_title->HrefValue = "";
            $this->job_title->TooltipValue = "";

            // pay_grade
            $this->pay_grade->LinkCustomAttributes = "";
            $this->pay_grade->HrefValue = "";
            $this->pay_grade->TooltipValue = "";

            // work_station_id
            $this->work_station_id->LinkCustomAttributes = "";
            $this->work_station_id->HrefValue = "";
            $this->work_station_id->TooltipValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";
            $this->address1->TooltipValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";
            $this->address2->TooltipValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";
            $this->city->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";
            $this->province->TooltipValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";
            $this->postal_code->TooltipValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";
            $this->home_phone->TooltipValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";
            $this->mobile_phone->TooltipValue = "";

            // work_phone
            $this->work_phone->LinkCustomAttributes = "";
            $this->work_phone->HrefValue = "";
            $this->work_phone->TooltipValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";
            $this->work_email->TooltipValue = "";

            // private_email
            $this->private_email->LinkCustomAttributes = "";
            $this->private_email->HrefValue = "";
            $this->private_email->TooltipValue = "";

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

            // indirect_supervisors
            $this->indirect_supervisors->LinkCustomAttributes = "";
            $this->indirect_supervisors->HrefValue = "";
            $this->indirect_supervisors->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // custom1
            $this->custom1->LinkCustomAttributes = "";
            $this->custom1->HrefValue = "";
            $this->custom1->TooltipValue = "";

            // custom2
            $this->custom2->LinkCustomAttributes = "";
            $this->custom2->HrefValue = "";
            $this->custom2->TooltipValue = "";

            // custom3
            $this->custom3->LinkCustomAttributes = "";
            $this->custom3->HrefValue = "";
            $this->custom3->TooltipValue = "";

            // custom4
            $this->custom4->LinkCustomAttributes = "";
            $this->custom4->HrefValue = "";
            $this->custom4->TooltipValue = "";

            // custom5
            $this->custom5->LinkCustomAttributes = "";
            $this->custom5->HrefValue = "";
            $this->custom5->TooltipValue = "";

            // custom6
            $this->custom6->LinkCustomAttributes = "";
            $this->custom6->HrefValue = "";
            $this->custom6->TooltipValue = "";

            // custom7
            $this->custom7->LinkCustomAttributes = "";
            $this->custom7->HrefValue = "";
            $this->custom7->TooltipValue = "";

            // custom8
            $this->custom8->LinkCustomAttributes = "";
            $this->custom8->HrefValue = "";
            $this->custom8->TooltipValue = "";

            // custom9
            $this->custom9->LinkCustomAttributes = "";
            $this->custom9->HrefValue = "";
            $this->custom9->TooltipValue = "";

            // custom10
            $this->custom10->LinkCustomAttributes = "";
            $this->custom10->HrefValue = "";
            $this->custom10->TooltipValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";
            $this->termination_date->TooltipValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";
            $this->notes->TooltipValue = "";

            // ethnicity
            $this->ethnicity->LinkCustomAttributes = "";
            $this->ethnicity->HrefValue = "";
            $this->ethnicity->TooltipValue = "";

            // immigration_status
            $this->immigration_status->LinkCustomAttributes = "";
            $this->immigration_status->HrefValue = "";
            $this->immigration_status->TooltipValue = "";

            // approver1
            $this->approver1->LinkCustomAttributes = "";
            $this->approver1->HrefValue = "";
            $this->approver1->TooltipValue = "";

            // approver2
            $this->approver2->LinkCustomAttributes = "";
            $this->approver2->HrefValue = "";
            $this->approver2->TooltipValue = "";

            // approver3
            $this->approver3->LinkCustomAttributes = "";
            $this->approver3->HrefValue = "";
            $this->approver3->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
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

            // middle_name
            $this->middle_name->EditAttrs["class"] = "form-control";
            $this->middle_name->EditCustomAttributes = "";
            if (!$this->middle_name->Raw) {
                $this->middle_name->CurrentValue = HtmlDecode($this->middle_name->CurrentValue);
            }
            $this->middle_name->EditValue = HtmlEncode($this->middle_name->CurrentValue);
            $this->middle_name->PlaceHolder = RemoveHtml($this->middle_name->caption());

            // last_name
            $this->last_name->EditAttrs["class"] = "form-control";
            $this->last_name->EditCustomAttributes = "";
            if (!$this->last_name->Raw) {
                $this->last_name->CurrentValue = HtmlDecode($this->last_name->CurrentValue);
            }
            $this->last_name->EditValue = HtmlEncode($this->last_name->CurrentValue);
            $this->last_name->PlaceHolder = RemoveHtml($this->last_name->caption());

            // gender
            $this->gender->EditAttrs["class"] = "form-control";
            $this->gender->EditCustomAttributes = "";
            $curVal = trim(strval($this->gender->CurrentValue));
            if ($curVal != "") {
                $this->gender->ViewValue = $this->gender->lookupCacheOption($curVal);
            } else {
                $this->gender->ViewValue = $this->gender->Lookup !== null && is_array($this->gender->Lookup->Options) ? $curVal : null;
            }
            if ($this->gender->ViewValue !== null) { // Load from cache
                $this->gender->EditValue = array_values($this->gender->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`Name`" . SearchString("=", $this->gender->CurrentValue, DATATYPE_STRING, "");
                }
                $sqlWrk = $this->gender->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->gender->EditValue = $arwrk;
            }
            $this->gender->PlaceHolder = RemoveHtml($this->gender->caption());

            // nationality
            $this->nationality->EditCustomAttributes = "";
            $curVal = trim(strval($this->nationality->CurrentValue));
            if ($curVal != "") {
                $this->nationality->ViewValue = $this->nationality->lookupCacheOption($curVal);
            } else {
                $this->nationality->ViewValue = $this->nationality->Lookup !== null && is_array($this->nationality->Lookup->Options) ? $curVal : null;
            }
            if ($this->nationality->ViewValue !== null) { // Load from cache
                $this->nationality->EditValue = array_values($this->nationality->Lookup->Options);
                if ($this->nationality->ViewValue == "") {
                    $this->nationality->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->nationality->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->nationality->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->nationality->Lookup->renderViewRow($rswrk[0]);
                    $this->nationality->ViewValue = $this->nationality->displayValue($arwrk);
                } else {
                    $this->nationality->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->nationality->EditValue = $arwrk;
            }
            $this->nationality->PlaceHolder = RemoveHtml($this->nationality->caption());

            // birthday
            $this->birthday->EditAttrs["class"] = "form-control";
            $this->birthday->EditCustomAttributes = "";
            $this->birthday->EditValue = HtmlEncode(FormatDateTime($this->birthday->CurrentValue, 8));
            $this->birthday->PlaceHolder = RemoveHtml($this->birthday->caption());

            // marital_status
            $this->marital_status->EditCustomAttributes = "";
            $this->marital_status->EditValue = $this->marital_status->options(false);
            $this->marital_status->PlaceHolder = RemoveHtml($this->marital_status->caption());

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

            // driving_license
            $this->driving_license->EditAttrs["class"] = "form-control";
            $this->driving_license->EditCustomAttributes = "";
            if (!$this->driving_license->Raw) {
                $this->driving_license->CurrentValue = HtmlDecode($this->driving_license->CurrentValue);
            }
            $this->driving_license->EditValue = HtmlEncode($this->driving_license->CurrentValue);
            $this->driving_license->PlaceHolder = RemoveHtml($this->driving_license->caption());

            // driving_license_exp_date
            $this->driving_license_exp_date->EditAttrs["class"] = "form-control";
            $this->driving_license_exp_date->EditCustomAttributes = "";
            $this->driving_license_exp_date->EditValue = HtmlEncode(FormatDateTime($this->driving_license_exp_date->CurrentValue, 8));
            $this->driving_license_exp_date->PlaceHolder = RemoveHtml($this->driving_license_exp_date->caption());

            // employment_status
            $this->employment_status->EditAttrs["class"] = "form-control";
            $this->employment_status->EditCustomAttributes = "";
            $this->employment_status->EditValue = HtmlEncode($this->employment_status->CurrentValue);
            $this->employment_status->PlaceHolder = RemoveHtml($this->employment_status->caption());

            // job_title
            $this->job_title->EditAttrs["class"] = "form-control";
            $this->job_title->EditCustomAttributes = "";
            $this->job_title->EditValue = HtmlEncode($this->job_title->CurrentValue);
            $this->job_title->PlaceHolder = RemoveHtml($this->job_title->caption());

            // pay_grade
            $this->pay_grade->EditAttrs["class"] = "form-control";
            $this->pay_grade->EditCustomAttributes = "";
            $this->pay_grade->EditValue = HtmlEncode($this->pay_grade->CurrentValue);
            $this->pay_grade->PlaceHolder = RemoveHtml($this->pay_grade->caption());

            // work_station_id
            $this->work_station_id->EditAttrs["class"] = "form-control";
            $this->work_station_id->EditCustomAttributes = "";
            if (!$this->work_station_id->Raw) {
                $this->work_station_id->CurrentValue = HtmlDecode($this->work_station_id->CurrentValue);
            }
            $this->work_station_id->EditValue = HtmlEncode($this->work_station_id->CurrentValue);
            $this->work_station_id->PlaceHolder = RemoveHtml($this->work_station_id->caption());

            // address1
            $this->address1->EditAttrs["class"] = "form-control";
            $this->address1->EditCustomAttributes = "";
            if (!$this->address1->Raw) {
                $this->address1->CurrentValue = HtmlDecode($this->address1->CurrentValue);
            }
            $this->address1->EditValue = HtmlEncode($this->address1->CurrentValue);
            $this->address1->PlaceHolder = RemoveHtml($this->address1->caption());

            // address2
            $this->address2->EditAttrs["class"] = "form-control";
            $this->address2->EditCustomAttributes = "";
            if (!$this->address2->Raw) {
                $this->address2->CurrentValue = HtmlDecode($this->address2->CurrentValue);
            }
            $this->address2->EditValue = HtmlEncode($this->address2->CurrentValue);
            $this->address2->PlaceHolder = RemoveHtml($this->address2->caption());

            // city
            $this->city->EditAttrs["class"] = "form-control";
            $this->city->EditCustomAttributes = "";
            if (!$this->city->Raw) {
                $this->city->CurrentValue = HtmlDecode($this->city->CurrentValue);
            }
            $this->city->EditValue = HtmlEncode($this->city->CurrentValue);
            $this->city->PlaceHolder = RemoveHtml($this->city->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            if (!$this->country->Raw) {
                $this->country->CurrentValue = HtmlDecode($this->country->CurrentValue);
            }
            $this->country->EditValue = HtmlEncode($this->country->CurrentValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // province
            $this->province->EditAttrs["class"] = "form-control";
            $this->province->EditCustomAttributes = "";
            $this->province->EditValue = HtmlEncode($this->province->CurrentValue);
            $this->province->PlaceHolder = RemoveHtml($this->province->caption());

            // postal_code
            $this->postal_code->EditAttrs["class"] = "form-control";
            $this->postal_code->EditCustomAttributes = "";
            if (!$this->postal_code->Raw) {
                $this->postal_code->CurrentValue = HtmlDecode($this->postal_code->CurrentValue);
            }
            $this->postal_code->EditValue = HtmlEncode($this->postal_code->CurrentValue);
            $this->postal_code->PlaceHolder = RemoveHtml($this->postal_code->caption());

            // home_phone
            $this->home_phone->EditAttrs["class"] = "form-control";
            $this->home_phone->EditCustomAttributes = "";
            if (!$this->home_phone->Raw) {
                $this->home_phone->CurrentValue = HtmlDecode($this->home_phone->CurrentValue);
            }
            $this->home_phone->EditValue = HtmlEncode($this->home_phone->CurrentValue);
            $this->home_phone->PlaceHolder = RemoveHtml($this->home_phone->caption());

            // mobile_phone
            $this->mobile_phone->EditAttrs["class"] = "form-control";
            $this->mobile_phone->EditCustomAttributes = "";
            if (!$this->mobile_phone->Raw) {
                $this->mobile_phone->CurrentValue = HtmlDecode($this->mobile_phone->CurrentValue);
            }
            $this->mobile_phone->EditValue = HtmlEncode($this->mobile_phone->CurrentValue);
            $this->mobile_phone->PlaceHolder = RemoveHtml($this->mobile_phone->caption());

            // work_phone
            $this->work_phone->EditAttrs["class"] = "form-control";
            $this->work_phone->EditCustomAttributes = "";
            if (!$this->work_phone->Raw) {
                $this->work_phone->CurrentValue = HtmlDecode($this->work_phone->CurrentValue);
            }
            $this->work_phone->EditValue = HtmlEncode($this->work_phone->CurrentValue);
            $this->work_phone->PlaceHolder = RemoveHtml($this->work_phone->caption());

            // work_email
            $this->work_email->EditAttrs["class"] = "form-control";
            $this->work_email->EditCustomAttributes = "";
            if (!$this->work_email->Raw) {
                $this->work_email->CurrentValue = HtmlDecode($this->work_email->CurrentValue);
            }
            $this->work_email->EditValue = HtmlEncode($this->work_email->CurrentValue);
            $this->work_email->PlaceHolder = RemoveHtml($this->work_email->caption());

            // private_email
            $this->private_email->EditAttrs["class"] = "form-control";
            $this->private_email->EditCustomAttributes = "";
            if (!$this->private_email->Raw) {
                $this->private_email->CurrentValue = HtmlDecode($this->private_email->CurrentValue);
            }
            $this->private_email->EditValue = HtmlEncode($this->private_email->CurrentValue);
            $this->private_email->PlaceHolder = RemoveHtml($this->private_email->caption());

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

            // indirect_supervisors
            $this->indirect_supervisors->EditAttrs["class"] = "form-control";
            $this->indirect_supervisors->EditCustomAttributes = "";
            if (!$this->indirect_supervisors->Raw) {
                $this->indirect_supervisors->CurrentValue = HtmlDecode($this->indirect_supervisors->CurrentValue);
            }
            $this->indirect_supervisors->EditValue = HtmlEncode($this->indirect_supervisors->CurrentValue);
            $this->indirect_supervisors->PlaceHolder = RemoveHtml($this->indirect_supervisors->caption());

            // department
            $this->department->EditAttrs["class"] = "form-control";
            $this->department->EditCustomAttributes = "";
            $this->department->EditValue = HtmlEncode($this->department->CurrentValue);
            $this->department->PlaceHolder = RemoveHtml($this->department->caption());

            // custom1
            $this->custom1->EditAttrs["class"] = "form-control";
            $this->custom1->EditCustomAttributes = "";
            if (!$this->custom1->Raw) {
                $this->custom1->CurrentValue = HtmlDecode($this->custom1->CurrentValue);
            }
            $this->custom1->EditValue = HtmlEncode($this->custom1->CurrentValue);
            $this->custom1->PlaceHolder = RemoveHtml($this->custom1->caption());

            // custom2
            $this->custom2->EditAttrs["class"] = "form-control";
            $this->custom2->EditCustomAttributes = "";
            if (!$this->custom2->Raw) {
                $this->custom2->CurrentValue = HtmlDecode($this->custom2->CurrentValue);
            }
            $this->custom2->EditValue = HtmlEncode($this->custom2->CurrentValue);
            $this->custom2->PlaceHolder = RemoveHtml($this->custom2->caption());

            // custom3
            $this->custom3->EditAttrs["class"] = "form-control";
            $this->custom3->EditCustomAttributes = "";
            if (!$this->custom3->Raw) {
                $this->custom3->CurrentValue = HtmlDecode($this->custom3->CurrentValue);
            }
            $this->custom3->EditValue = HtmlEncode($this->custom3->CurrentValue);
            $this->custom3->PlaceHolder = RemoveHtml($this->custom3->caption());

            // custom4
            $this->custom4->EditAttrs["class"] = "form-control";
            $this->custom4->EditCustomAttributes = "";
            if (!$this->custom4->Raw) {
                $this->custom4->CurrentValue = HtmlDecode($this->custom4->CurrentValue);
            }
            $this->custom4->EditValue = HtmlEncode($this->custom4->CurrentValue);
            $this->custom4->PlaceHolder = RemoveHtml($this->custom4->caption());

            // custom5
            $this->custom5->EditAttrs["class"] = "form-control";
            $this->custom5->EditCustomAttributes = "";
            if (!$this->custom5->Raw) {
                $this->custom5->CurrentValue = HtmlDecode($this->custom5->CurrentValue);
            }
            $this->custom5->EditValue = HtmlEncode($this->custom5->CurrentValue);
            $this->custom5->PlaceHolder = RemoveHtml($this->custom5->caption());

            // custom6
            $this->custom6->EditAttrs["class"] = "form-control";
            $this->custom6->EditCustomAttributes = "";
            if (!$this->custom6->Raw) {
                $this->custom6->CurrentValue = HtmlDecode($this->custom6->CurrentValue);
            }
            $this->custom6->EditValue = HtmlEncode($this->custom6->CurrentValue);
            $this->custom6->PlaceHolder = RemoveHtml($this->custom6->caption());

            // custom7
            $this->custom7->EditAttrs["class"] = "form-control";
            $this->custom7->EditCustomAttributes = "";
            if (!$this->custom7->Raw) {
                $this->custom7->CurrentValue = HtmlDecode($this->custom7->CurrentValue);
            }
            $this->custom7->EditValue = HtmlEncode($this->custom7->CurrentValue);
            $this->custom7->PlaceHolder = RemoveHtml($this->custom7->caption());

            // custom8
            $this->custom8->EditAttrs["class"] = "form-control";
            $this->custom8->EditCustomAttributes = "";
            if (!$this->custom8->Raw) {
                $this->custom8->CurrentValue = HtmlDecode($this->custom8->CurrentValue);
            }
            $this->custom8->EditValue = HtmlEncode($this->custom8->CurrentValue);
            $this->custom8->PlaceHolder = RemoveHtml($this->custom8->caption());

            // custom9
            $this->custom9->EditAttrs["class"] = "form-control";
            $this->custom9->EditCustomAttributes = "";
            if (!$this->custom9->Raw) {
                $this->custom9->CurrentValue = HtmlDecode($this->custom9->CurrentValue);
            }
            $this->custom9->EditValue = HtmlEncode($this->custom9->CurrentValue);
            $this->custom9->PlaceHolder = RemoveHtml($this->custom9->caption());

            // custom10
            $this->custom10->EditAttrs["class"] = "form-control";
            $this->custom10->EditCustomAttributes = "";
            if (!$this->custom10->Raw) {
                $this->custom10->CurrentValue = HtmlDecode($this->custom10->CurrentValue);
            }
            $this->custom10->EditValue = HtmlEncode($this->custom10->CurrentValue);
            $this->custom10->PlaceHolder = RemoveHtml($this->custom10->caption());

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

            // ethnicity
            $this->ethnicity->EditAttrs["class"] = "form-control";
            $this->ethnicity->EditCustomAttributes = "";
            $this->ethnicity->EditValue = HtmlEncode($this->ethnicity->CurrentValue);
            $this->ethnicity->PlaceHolder = RemoveHtml($this->ethnicity->caption());

            // immigration_status
            $this->immigration_status->EditAttrs["class"] = "form-control";
            $this->immigration_status->EditCustomAttributes = "";
            $this->immigration_status->EditValue = HtmlEncode($this->immigration_status->CurrentValue);
            $this->immigration_status->PlaceHolder = RemoveHtml($this->immigration_status->caption());

            // approver1
            $this->approver1->EditCustomAttributes = "";
            $curVal = trim(strval($this->approver1->CurrentValue));
            if ($curVal != "") {
                $this->approver1->ViewValue = $this->approver1->lookupCacheOption($curVal);
            } else {
                $this->approver1->ViewValue = $this->approver1->Lookup !== null && is_array($this->approver1->Lookup->Options) ? $curVal : null;
            }
            if ($this->approver1->ViewValue !== null) { // Load from cache
                $this->approver1->EditValue = array_values($this->approver1->Lookup->Options);
                if ($this->approver1->ViewValue == "") {
                    $this->approver1->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->approver1->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->approver1->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver1->Lookup->renderViewRow($rswrk[0]);
                    $this->approver1->ViewValue = $this->approver1->displayValue($arwrk);
                } else {
                    $this->approver1->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->approver1->EditValue = $arwrk;
            }
            $this->approver1->PlaceHolder = RemoveHtml($this->approver1->caption());

            // approver2
            $this->approver2->EditCustomAttributes = "";
            $curVal = trim(strval($this->approver2->CurrentValue));
            if ($curVal != "") {
                $this->approver2->ViewValue = $this->approver2->lookupCacheOption($curVal);
            } else {
                $this->approver2->ViewValue = $this->approver2->Lookup !== null && is_array($this->approver2->Lookup->Options) ? $curVal : null;
            }
            if ($this->approver2->ViewValue !== null) { // Load from cache
                $this->approver2->EditValue = array_values($this->approver2->Lookup->Options);
                if ($this->approver2->ViewValue == "") {
                    $this->approver2->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->approver2->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->approver2->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver2->Lookup->renderViewRow($rswrk[0]);
                    $this->approver2->ViewValue = $this->approver2->displayValue($arwrk);
                } else {
                    $this->approver2->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->approver2->EditValue = $arwrk;
            }
            $this->approver2->PlaceHolder = RemoveHtml($this->approver2->caption());

            // approver3
            $this->approver3->EditCustomAttributes = "";
            $curVal = trim(strval($this->approver3->CurrentValue));
            if ($curVal != "") {
                $this->approver3->ViewValue = $this->approver3->lookupCacheOption($curVal);
            } else {
                $this->approver3->ViewValue = $this->approver3->Lookup !== null && is_array($this->approver3->Lookup->Options) ? $curVal : null;
            }
            if ($this->approver3->ViewValue !== null) { // Load from cache
                $this->approver3->EditValue = array_values($this->approver3->Lookup->Options);
                if ($this->approver3->ViewValue == "") {
                    $this->approver3->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->approver3->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->approver3->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->approver3->Lookup->renderViewRow($rswrk[0]);
                    $this->approver3->ViewValue = $this->approver3->displayValue($arwrk);
                } else {
                    $this->approver3->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->approver3->EditValue = $arwrk;
            }
            $this->approver3->PlaceHolder = RemoveHtml($this->approver3->caption());

            // status

            // HospID

            // Add refer script

            // employee_id
            $this->employee_id->LinkCustomAttributes = "";
            $this->employee_id->HrefValue = "";

            // first_name
            $this->first_name->LinkCustomAttributes = "";
            $this->first_name->HrefValue = "";

            // middle_name
            $this->middle_name->LinkCustomAttributes = "";
            $this->middle_name->HrefValue = "";

            // last_name
            $this->last_name->LinkCustomAttributes = "";
            $this->last_name->HrefValue = "";

            // gender
            $this->gender->LinkCustomAttributes = "";
            $this->gender->HrefValue = "";

            // nationality
            $this->nationality->LinkCustomAttributes = "";
            $this->nationality->HrefValue = "";

            // birthday
            $this->birthday->LinkCustomAttributes = "";
            $this->birthday->HrefValue = "";

            // marital_status
            $this->marital_status->LinkCustomAttributes = "";
            $this->marital_status->HrefValue = "";

            // ssn_num
            $this->ssn_num->LinkCustomAttributes = "";
            $this->ssn_num->HrefValue = "";

            // nic_num
            $this->nic_num->LinkCustomAttributes = "";
            $this->nic_num->HrefValue = "";

            // other_id
            $this->other_id->LinkCustomAttributes = "";
            $this->other_id->HrefValue = "";

            // driving_license
            $this->driving_license->LinkCustomAttributes = "";
            $this->driving_license->HrefValue = "";

            // driving_license_exp_date
            $this->driving_license_exp_date->LinkCustomAttributes = "";
            $this->driving_license_exp_date->HrefValue = "";

            // employment_status
            $this->employment_status->LinkCustomAttributes = "";
            $this->employment_status->HrefValue = "";

            // job_title
            $this->job_title->LinkCustomAttributes = "";
            $this->job_title->HrefValue = "";

            // pay_grade
            $this->pay_grade->LinkCustomAttributes = "";
            $this->pay_grade->HrefValue = "";

            // work_station_id
            $this->work_station_id->LinkCustomAttributes = "";
            $this->work_station_id->HrefValue = "";

            // address1
            $this->address1->LinkCustomAttributes = "";
            $this->address1->HrefValue = "";

            // address2
            $this->address2->LinkCustomAttributes = "";
            $this->address2->HrefValue = "";

            // city
            $this->city->LinkCustomAttributes = "";
            $this->city->HrefValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";

            // province
            $this->province->LinkCustomAttributes = "";
            $this->province->HrefValue = "";

            // postal_code
            $this->postal_code->LinkCustomAttributes = "";
            $this->postal_code->HrefValue = "";

            // home_phone
            $this->home_phone->LinkCustomAttributes = "";
            $this->home_phone->HrefValue = "";

            // mobile_phone
            $this->mobile_phone->LinkCustomAttributes = "";
            $this->mobile_phone->HrefValue = "";

            // work_phone
            $this->work_phone->LinkCustomAttributes = "";
            $this->work_phone->HrefValue = "";

            // work_email
            $this->work_email->LinkCustomAttributes = "";
            $this->work_email->HrefValue = "";

            // private_email
            $this->private_email->LinkCustomAttributes = "";
            $this->private_email->HrefValue = "";

            // joined_date
            $this->joined_date->LinkCustomAttributes = "";
            $this->joined_date->HrefValue = "";

            // confirmation_date
            $this->confirmation_date->LinkCustomAttributes = "";
            $this->confirmation_date->HrefValue = "";

            // supervisor
            $this->supervisor->LinkCustomAttributes = "";
            $this->supervisor->HrefValue = "";

            // indirect_supervisors
            $this->indirect_supervisors->LinkCustomAttributes = "";
            $this->indirect_supervisors->HrefValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";

            // custom1
            $this->custom1->LinkCustomAttributes = "";
            $this->custom1->HrefValue = "";

            // custom2
            $this->custom2->LinkCustomAttributes = "";
            $this->custom2->HrefValue = "";

            // custom3
            $this->custom3->LinkCustomAttributes = "";
            $this->custom3->HrefValue = "";

            // custom4
            $this->custom4->LinkCustomAttributes = "";
            $this->custom4->HrefValue = "";

            // custom5
            $this->custom5->LinkCustomAttributes = "";
            $this->custom5->HrefValue = "";

            // custom6
            $this->custom6->LinkCustomAttributes = "";
            $this->custom6->HrefValue = "";

            // custom7
            $this->custom7->LinkCustomAttributes = "";
            $this->custom7->HrefValue = "";

            // custom8
            $this->custom8->LinkCustomAttributes = "";
            $this->custom8->HrefValue = "";

            // custom9
            $this->custom9->LinkCustomAttributes = "";
            $this->custom9->HrefValue = "";

            // custom10
            $this->custom10->LinkCustomAttributes = "";
            $this->custom10->HrefValue = "";

            // termination_date
            $this->termination_date->LinkCustomAttributes = "";
            $this->termination_date->HrefValue = "";

            // notes
            $this->notes->LinkCustomAttributes = "";
            $this->notes->HrefValue = "";

            // ethnicity
            $this->ethnicity->LinkCustomAttributes = "";
            $this->ethnicity->HrefValue = "";

            // immigration_status
            $this->immigration_status->LinkCustomAttributes = "";
            $this->immigration_status->HrefValue = "";

            // approver1
            $this->approver1->LinkCustomAttributes = "";
            $this->approver1->HrefValue = "";

            // approver2
            $this->approver2->LinkCustomAttributes = "";
            $this->approver2->HrefValue = "";

            // approver3
            $this->approver3->LinkCustomAttributes = "";
            $this->approver3->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

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
        if ($this->middle_name->Required) {
            if (!$this->middle_name->IsDetailKey && EmptyValue($this->middle_name->FormValue)) {
                $this->middle_name->addErrorMessage(str_replace("%s", $this->middle_name->caption(), $this->middle_name->RequiredErrorMessage));
            }
        }
        if ($this->last_name->Required) {
            if (!$this->last_name->IsDetailKey && EmptyValue($this->last_name->FormValue)) {
                $this->last_name->addErrorMessage(str_replace("%s", $this->last_name->caption(), $this->last_name->RequiredErrorMessage));
            }
        }
        if ($this->gender->Required) {
            if (!$this->gender->IsDetailKey && EmptyValue($this->gender->FormValue)) {
                $this->gender->addErrorMessage(str_replace("%s", $this->gender->caption(), $this->gender->RequiredErrorMessage));
            }
        }
        if ($this->nationality->Required) {
            if (!$this->nationality->IsDetailKey && EmptyValue($this->nationality->FormValue)) {
                $this->nationality->addErrorMessage(str_replace("%s", $this->nationality->caption(), $this->nationality->RequiredErrorMessage));
            }
        }
        if ($this->birthday->Required) {
            if (!$this->birthday->IsDetailKey && EmptyValue($this->birthday->FormValue)) {
                $this->birthday->addErrorMessage(str_replace("%s", $this->birthday->caption(), $this->birthday->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->birthday->FormValue)) {
            $this->birthday->addErrorMessage($this->birthday->getErrorMessage(false));
        }
        if ($this->marital_status->Required) {
            if ($this->marital_status->FormValue == "") {
                $this->marital_status->addErrorMessage(str_replace("%s", $this->marital_status->caption(), $this->marital_status->RequiredErrorMessage));
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
        if ($this->driving_license->Required) {
            if (!$this->driving_license->IsDetailKey && EmptyValue($this->driving_license->FormValue)) {
                $this->driving_license->addErrorMessage(str_replace("%s", $this->driving_license->caption(), $this->driving_license->RequiredErrorMessage));
            }
        }
        if ($this->driving_license_exp_date->Required) {
            if (!$this->driving_license_exp_date->IsDetailKey && EmptyValue($this->driving_license_exp_date->FormValue)) {
                $this->driving_license_exp_date->addErrorMessage(str_replace("%s", $this->driving_license_exp_date->caption(), $this->driving_license_exp_date->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->driving_license_exp_date->FormValue)) {
            $this->driving_license_exp_date->addErrorMessage($this->driving_license_exp_date->getErrorMessage(false));
        }
        if ($this->employment_status->Required) {
            if (!$this->employment_status->IsDetailKey && EmptyValue($this->employment_status->FormValue)) {
                $this->employment_status->addErrorMessage(str_replace("%s", $this->employment_status->caption(), $this->employment_status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->employment_status->FormValue)) {
            $this->employment_status->addErrorMessage($this->employment_status->getErrorMessage(false));
        }
        if ($this->job_title->Required) {
            if (!$this->job_title->IsDetailKey && EmptyValue($this->job_title->FormValue)) {
                $this->job_title->addErrorMessage(str_replace("%s", $this->job_title->caption(), $this->job_title->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->job_title->FormValue)) {
            $this->job_title->addErrorMessage($this->job_title->getErrorMessage(false));
        }
        if ($this->pay_grade->Required) {
            if (!$this->pay_grade->IsDetailKey && EmptyValue($this->pay_grade->FormValue)) {
                $this->pay_grade->addErrorMessage(str_replace("%s", $this->pay_grade->caption(), $this->pay_grade->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->pay_grade->FormValue)) {
            $this->pay_grade->addErrorMessage($this->pay_grade->getErrorMessage(false));
        }
        if ($this->work_station_id->Required) {
            if (!$this->work_station_id->IsDetailKey && EmptyValue($this->work_station_id->FormValue)) {
                $this->work_station_id->addErrorMessage(str_replace("%s", $this->work_station_id->caption(), $this->work_station_id->RequiredErrorMessage));
            }
        }
        if ($this->address1->Required) {
            if (!$this->address1->IsDetailKey && EmptyValue($this->address1->FormValue)) {
                $this->address1->addErrorMessage(str_replace("%s", $this->address1->caption(), $this->address1->RequiredErrorMessage));
            }
        }
        if ($this->address2->Required) {
            if (!$this->address2->IsDetailKey && EmptyValue($this->address2->FormValue)) {
                $this->address2->addErrorMessage(str_replace("%s", $this->address2->caption(), $this->address2->RequiredErrorMessage));
            }
        }
        if ($this->city->Required) {
            if (!$this->city->IsDetailKey && EmptyValue($this->city->FormValue)) {
                $this->city->addErrorMessage(str_replace("%s", $this->city->caption(), $this->city->RequiredErrorMessage));
            }
        }
        if ($this->country->Required) {
            if (!$this->country->IsDetailKey && EmptyValue($this->country->FormValue)) {
                $this->country->addErrorMessage(str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
            }
        }
        if ($this->province->Required) {
            if (!$this->province->IsDetailKey && EmptyValue($this->province->FormValue)) {
                $this->province->addErrorMessage(str_replace("%s", $this->province->caption(), $this->province->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->province->FormValue)) {
            $this->province->addErrorMessage($this->province->getErrorMessage(false));
        }
        if ($this->postal_code->Required) {
            if (!$this->postal_code->IsDetailKey && EmptyValue($this->postal_code->FormValue)) {
                $this->postal_code->addErrorMessage(str_replace("%s", $this->postal_code->caption(), $this->postal_code->RequiredErrorMessage));
            }
        }
        if ($this->home_phone->Required) {
            if (!$this->home_phone->IsDetailKey && EmptyValue($this->home_phone->FormValue)) {
                $this->home_phone->addErrorMessage(str_replace("%s", $this->home_phone->caption(), $this->home_phone->RequiredErrorMessage));
            }
        }
        if ($this->mobile_phone->Required) {
            if (!$this->mobile_phone->IsDetailKey && EmptyValue($this->mobile_phone->FormValue)) {
                $this->mobile_phone->addErrorMessage(str_replace("%s", $this->mobile_phone->caption(), $this->mobile_phone->RequiredErrorMessage));
            }
        }
        if ($this->work_phone->Required) {
            if (!$this->work_phone->IsDetailKey && EmptyValue($this->work_phone->FormValue)) {
                $this->work_phone->addErrorMessage(str_replace("%s", $this->work_phone->caption(), $this->work_phone->RequiredErrorMessage));
            }
        }
        if ($this->work_email->Required) {
            if (!$this->work_email->IsDetailKey && EmptyValue($this->work_email->FormValue)) {
                $this->work_email->addErrorMessage(str_replace("%s", $this->work_email->caption(), $this->work_email->RequiredErrorMessage));
            }
        }
        if ($this->private_email->Required) {
            if (!$this->private_email->IsDetailKey && EmptyValue($this->private_email->FormValue)) {
                $this->private_email->addErrorMessage(str_replace("%s", $this->private_email->caption(), $this->private_email->RequiredErrorMessage));
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
        if ($this->indirect_supervisors->Required) {
            if (!$this->indirect_supervisors->IsDetailKey && EmptyValue($this->indirect_supervisors->FormValue)) {
                $this->indirect_supervisors->addErrorMessage(str_replace("%s", $this->indirect_supervisors->caption(), $this->indirect_supervisors->RequiredErrorMessage));
            }
        }
        if ($this->department->Required) {
            if (!$this->department->IsDetailKey && EmptyValue($this->department->FormValue)) {
                $this->department->addErrorMessage(str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->department->FormValue)) {
            $this->department->addErrorMessage($this->department->getErrorMessage(false));
        }
        if ($this->custom1->Required) {
            if (!$this->custom1->IsDetailKey && EmptyValue($this->custom1->FormValue)) {
                $this->custom1->addErrorMessage(str_replace("%s", $this->custom1->caption(), $this->custom1->RequiredErrorMessage));
            }
        }
        if ($this->custom2->Required) {
            if (!$this->custom2->IsDetailKey && EmptyValue($this->custom2->FormValue)) {
                $this->custom2->addErrorMessage(str_replace("%s", $this->custom2->caption(), $this->custom2->RequiredErrorMessage));
            }
        }
        if ($this->custom3->Required) {
            if (!$this->custom3->IsDetailKey && EmptyValue($this->custom3->FormValue)) {
                $this->custom3->addErrorMessage(str_replace("%s", $this->custom3->caption(), $this->custom3->RequiredErrorMessage));
            }
        }
        if ($this->custom4->Required) {
            if (!$this->custom4->IsDetailKey && EmptyValue($this->custom4->FormValue)) {
                $this->custom4->addErrorMessage(str_replace("%s", $this->custom4->caption(), $this->custom4->RequiredErrorMessage));
            }
        }
        if ($this->custom5->Required) {
            if (!$this->custom5->IsDetailKey && EmptyValue($this->custom5->FormValue)) {
                $this->custom5->addErrorMessage(str_replace("%s", $this->custom5->caption(), $this->custom5->RequiredErrorMessage));
            }
        }
        if ($this->custom6->Required) {
            if (!$this->custom6->IsDetailKey && EmptyValue($this->custom6->FormValue)) {
                $this->custom6->addErrorMessage(str_replace("%s", $this->custom6->caption(), $this->custom6->RequiredErrorMessage));
            }
        }
        if ($this->custom7->Required) {
            if (!$this->custom7->IsDetailKey && EmptyValue($this->custom7->FormValue)) {
                $this->custom7->addErrorMessage(str_replace("%s", $this->custom7->caption(), $this->custom7->RequiredErrorMessage));
            }
        }
        if ($this->custom8->Required) {
            if (!$this->custom8->IsDetailKey && EmptyValue($this->custom8->FormValue)) {
                $this->custom8->addErrorMessage(str_replace("%s", $this->custom8->caption(), $this->custom8->RequiredErrorMessage));
            }
        }
        if ($this->custom9->Required) {
            if (!$this->custom9->IsDetailKey && EmptyValue($this->custom9->FormValue)) {
                $this->custom9->addErrorMessage(str_replace("%s", $this->custom9->caption(), $this->custom9->RequiredErrorMessage));
            }
        }
        if ($this->custom10->Required) {
            if (!$this->custom10->IsDetailKey && EmptyValue($this->custom10->FormValue)) {
                $this->custom10->addErrorMessage(str_replace("%s", $this->custom10->caption(), $this->custom10->RequiredErrorMessage));
            }
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
        if ($this->ethnicity->Required) {
            if (!$this->ethnicity->IsDetailKey && EmptyValue($this->ethnicity->FormValue)) {
                $this->ethnicity->addErrorMessage(str_replace("%s", $this->ethnicity->caption(), $this->ethnicity->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->ethnicity->FormValue)) {
            $this->ethnicity->addErrorMessage($this->ethnicity->getErrorMessage(false));
        }
        if ($this->immigration_status->Required) {
            if (!$this->immigration_status->IsDetailKey && EmptyValue($this->immigration_status->FormValue)) {
                $this->immigration_status->addErrorMessage(str_replace("%s", $this->immigration_status->caption(), $this->immigration_status->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->immigration_status->FormValue)) {
            $this->immigration_status->addErrorMessage($this->immigration_status->getErrorMessage(false));
        }
        if ($this->approver1->Required) {
            if (!$this->approver1->IsDetailKey && EmptyValue($this->approver1->FormValue)) {
                $this->approver1->addErrorMessage(str_replace("%s", $this->approver1->caption(), $this->approver1->RequiredErrorMessage));
            }
        }
        if ($this->approver2->Required) {
            if (!$this->approver2->IsDetailKey && EmptyValue($this->approver2->FormValue)) {
                $this->approver2->addErrorMessage(str_replace("%s", $this->approver2->caption(), $this->approver2->RequiredErrorMessage));
            }
        }
        if ($this->approver3->Required) {
            if (!$this->approver3->IsDetailKey && EmptyValue($this->approver3->FormValue)) {
                $this->approver3->addErrorMessage(str_replace("%s", $this->approver3->caption(), $this->approver3->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if (!$this->status->IsDetailKey && EmptyValue($this->status->FormValue)) {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->HospID->Required) {
            if (!$this->HospID->IsDetailKey && EmptyValue($this->HospID->FormValue)) {
                $this->HospID->addErrorMessage(str_replace("%s", $this->HospID->caption(), $this->HospID->RequiredErrorMessage));
            }
        }

        // Validate detail grid
        $detailTblVar = explode(",", $this->getCurrentDetailTable());
        $detailPage = Container("EmployeeAddressGrid");
        if (in_array("employee_address", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("EmployeeTelephoneGrid");
        if (in_array("employee_telephone", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("EmployeeEmailGrid");
        if (in_array("employee_email", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("EmployeeHasDegreeGrid");
        if (in_array("employee_has_degree", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("EmployeeHasExperienceGrid");
        if (in_array("employee_has_experience", $detailTblVar) && $detailPage->DetailAdd) {
            $detailPage->validateGridForm();
        }
        $detailPage = Container("EmployeeDocumentGrid");
        if (in_array("employee_document", $detailTblVar) && $detailPage->DetailAdd) {
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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;
        if ($this->employee_id->CurrentValue != "") { // Check field with unique index
            $filter = "(`employee_id` = '" . AdjustSql($this->employee_id->CurrentValue, $this->Dbid) . "')";
            $rsChk = $this->loadRs($filter)->fetch();
            if ($rsChk !== false) {
                $idxErrMsg = str_replace("%f", $this->employee_id->caption(), $Language->phrase("DupIndex"));
                $idxErrMsg = str_replace("%v", $this->employee_id->CurrentValue, $idxErrMsg);
                $this->setFailureMessage($idxErrMsg);
                return false;
            }
        }
        $conn = $this->getConnection();

        // Begin transaction
        if ($this->getCurrentDetailTable() != "") {
            $conn->beginTransaction();
        }

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // employee_id
        $this->employee_id->setDbValueDef($rsnew, $this->employee_id->CurrentValue, null, false);

        // first_name
        $this->first_name->setDbValueDef($rsnew, $this->first_name->CurrentValue, "", false);

        // middle_name
        $this->middle_name->setDbValueDef($rsnew, $this->middle_name->CurrentValue, null, false);

        // last_name
        $this->last_name->setDbValueDef($rsnew, $this->last_name->CurrentValue, null, false);

        // gender
        $this->gender->setDbValueDef($rsnew, $this->gender->CurrentValue, null, false);

        // nationality
        $this->nationality->setDbValueDef($rsnew, $this->nationality->CurrentValue, null, false);

        // birthday
        $this->birthday->setDbValueDef($rsnew, UnFormatDateTime($this->birthday->CurrentValue, 0), null, false);

        // marital_status
        $this->marital_status->setDbValueDef($rsnew, $this->marital_status->CurrentValue, null, false);

        // ssn_num
        $this->ssn_num->setDbValueDef($rsnew, $this->ssn_num->CurrentValue, null, false);

        // nic_num
        $this->nic_num->setDbValueDef($rsnew, $this->nic_num->CurrentValue, null, false);

        // other_id
        $this->other_id->setDbValueDef($rsnew, $this->other_id->CurrentValue, null, false);

        // driving_license
        $this->driving_license->setDbValueDef($rsnew, $this->driving_license->CurrentValue, null, false);

        // driving_license_exp_date
        $this->driving_license_exp_date->setDbValueDef($rsnew, UnFormatDateTime($this->driving_license_exp_date->CurrentValue, 0), null, false);

        // employment_status
        $this->employment_status->setDbValueDef($rsnew, $this->employment_status->CurrentValue, null, false);

        // job_title
        $this->job_title->setDbValueDef($rsnew, $this->job_title->CurrentValue, null, false);

        // pay_grade
        $this->pay_grade->setDbValueDef($rsnew, $this->pay_grade->CurrentValue, null, false);

        // work_station_id
        $this->work_station_id->setDbValueDef($rsnew, $this->work_station_id->CurrentValue, null, false);

        // address1
        $this->address1->setDbValueDef($rsnew, $this->address1->CurrentValue, null, false);

        // address2
        $this->address2->setDbValueDef($rsnew, $this->address2->CurrentValue, null, false);

        // city
        $this->city->setDbValueDef($rsnew, $this->city->CurrentValue, null, false);

        // country
        $this->country->setDbValueDef($rsnew, $this->country->CurrentValue, null, false);

        // province
        $this->province->setDbValueDef($rsnew, $this->province->CurrentValue, null, false);

        // postal_code
        $this->postal_code->setDbValueDef($rsnew, $this->postal_code->CurrentValue, null, false);

        // home_phone
        $this->home_phone->setDbValueDef($rsnew, $this->home_phone->CurrentValue, null, false);

        // mobile_phone
        $this->mobile_phone->setDbValueDef($rsnew, $this->mobile_phone->CurrentValue, null, false);

        // work_phone
        $this->work_phone->setDbValueDef($rsnew, $this->work_phone->CurrentValue, null, false);

        // work_email
        $this->work_email->setDbValueDef($rsnew, $this->work_email->CurrentValue, null, false);

        // private_email
        $this->private_email->setDbValueDef($rsnew, $this->private_email->CurrentValue, null, false);

        // joined_date
        $this->joined_date->setDbValueDef($rsnew, UnFormatDateTime($this->joined_date->CurrentValue, 0), null, false);

        // confirmation_date
        $this->confirmation_date->setDbValueDef($rsnew, UnFormatDateTime($this->confirmation_date->CurrentValue, 0), null, false);

        // supervisor
        $this->supervisor->setDbValueDef($rsnew, $this->supervisor->CurrentValue, null, false);

        // indirect_supervisors
        $this->indirect_supervisors->setDbValueDef($rsnew, $this->indirect_supervisors->CurrentValue, null, false);

        // department
        $this->department->setDbValueDef($rsnew, $this->department->CurrentValue, null, false);

        // custom1
        $this->custom1->setDbValueDef($rsnew, $this->custom1->CurrentValue, null, false);

        // custom2
        $this->custom2->setDbValueDef($rsnew, $this->custom2->CurrentValue, null, false);

        // custom3
        $this->custom3->setDbValueDef($rsnew, $this->custom3->CurrentValue, null, false);

        // custom4
        $this->custom4->setDbValueDef($rsnew, $this->custom4->CurrentValue, null, false);

        // custom5
        $this->custom5->setDbValueDef($rsnew, $this->custom5->CurrentValue, null, false);

        // custom6
        $this->custom6->setDbValueDef($rsnew, $this->custom6->CurrentValue, null, false);

        // custom7
        $this->custom7->setDbValueDef($rsnew, $this->custom7->CurrentValue, null, false);

        // custom8
        $this->custom8->setDbValueDef($rsnew, $this->custom8->CurrentValue, null, false);

        // custom9
        $this->custom9->setDbValueDef($rsnew, $this->custom9->CurrentValue, null, false);

        // custom10
        $this->custom10->setDbValueDef($rsnew, $this->custom10->CurrentValue, null, false);

        // termination_date
        $this->termination_date->setDbValueDef($rsnew, UnFormatDateTime($this->termination_date->CurrentValue, 0), null, false);

        // notes
        $this->notes->setDbValueDef($rsnew, $this->notes->CurrentValue, null, false);

        // ethnicity
        $this->ethnicity->setDbValueDef($rsnew, $this->ethnicity->CurrentValue, null, false);

        // immigration_status
        $this->immigration_status->setDbValueDef($rsnew, $this->immigration_status->CurrentValue, null, false);

        // approver1
        $this->approver1->setDbValueDef($rsnew, $this->approver1->CurrentValue, null, false);

        // approver2
        $this->approver2->setDbValueDef($rsnew, $this->approver2->CurrentValue, null, false);

        // approver3
        $this->approver3->setDbValueDef($rsnew, $this->approver3->CurrentValue, null, false);

        // status
        $this->status->CurrentValue = ActiveStatusbit();
        $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null);

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

        // Add detail records
        if ($addRow) {
            $detailTblVar = explode(",", $this->getCurrentDetailTable());
            $detailPage = Container("EmployeeAddressGrid");
            if (in_array("employee_address", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_address"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("EmployeeTelephoneGrid");
            if (in_array("employee_telephone", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_telephone"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("EmployeeEmailGrid");
            if (in_array("employee_email", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_email"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("EmployeeHasDegreeGrid");
            if (in_array("employee_has_degree", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_has_degree"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("EmployeeHasExperienceGrid");
            if (in_array("employee_has_experience", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_has_experience"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
            $detailPage = Container("EmployeeDocumentGrid");
            if (in_array("employee_document", $detailTblVar) && $detailPage->DetailAdd) {
                $detailPage->employee_id->setSessionValue($this->id->CurrentValue); // Set master key
                $Security->loadCurrentUserLevel($this->ProjectID . "employee_document"); // Load user level of detail table
                $addRow = $detailPage->gridInsert();
                $Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
                if (!$addRow) {
                $detailPage->employee_id->setSessionValue(""); // Clear master key if insert failed
                }
            }
        }

        // Commit/Rollback transaction
        if ($this->getCurrentDetailTable() != "") {
            if ($addRow) {
                $conn->commit(); // Commit transaction
            } else {
                $conn->rollback(); // Rollback transaction
            }
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
            if (in_array("employee_address", $detailTblVar)) {
                $detailPageObj = Container("EmployeeAddressGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
                }
            }
            if (in_array("employee_telephone", $detailTblVar)) {
                $detailPageObj = Container("EmployeeTelephoneGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
                }
            }
            if (in_array("employee_email", $detailTblVar)) {
                $detailPageObj = Container("EmployeeEmailGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
                }
            }
            if (in_array("employee_has_degree", $detailTblVar)) {
                $detailPageObj = Container("EmployeeHasDegreeGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
                }
            }
            if (in_array("employee_has_experience", $detailTblVar)) {
                $detailPageObj = Container("EmployeeHasExperienceGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
                }
            }
            if (in_array("employee_document", $detailTblVar)) {
                $detailPageObj = Container("EmployeeDocumentGrid");
                if ($detailPageObj->DetailAdd) {
                    if ($this->CopyRecord) {
                        $detailPageObj->CurrentMode = "copy";
                    } else {
                        $detailPageObj->CurrentMode = "add";
                    }
                    $detailPageObj->CurrentAction = "gridadd";

                    // Save current master table to detail table
                    $detailPageObj->setCurrentMasterTable($this->TableVar);
                    $detailPageObj->setStartRecordNumber(1);
                    $detailPageObj->employee_id->IsDetailKey = true;
                    $detailPageObj->employee_id->CurrentValue = $this->id->CurrentValue;
                    $detailPageObj->employee_id->setSessionValue($detailPageObj->employee_id->CurrentValue);
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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("EmployeeList"), "", $this->TableVar, true);
        $pageId = ($this->isCopy()) ? "Copy" : "Add";
        $Breadcrumb->add("add", $pageId, $url);
    }

    // Set up multi pages
    protected function setupMultiPages()
    {
        $pages = new SubPages();
        $pages->Style = "tabs";
        $pages->add(0);
        $pages->add(1);
        $pages->add(2);
        $pages->add(3);
        $pages->add(4);
        $pages->add(5);
        $pages->add(6);
        $this->MultiPages = $pages;
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
                case "x_nationality":
                    break;
                case "x_marital_status":
                    break;
                case "x_approver1":
                    break;
                case "x_approver2":
                    break;
                case "x_approver3":
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
