<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class RecruitmentJobEdit extends RecruitmentJob
{
    use MessagesTrait;

    // Page ID
    public $PageID = "edit";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'recruitment_job';

    // Page object name
    public $PageObjName = "RecruitmentJobEdit";

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

        // Table object (recruitment_job)
        if (!isset($GLOBALS["recruitment_job"]) || get_class($GLOBALS["recruitment_job"]) == PROJECT_NAMESPACE . "recruitment_job") {
            $GLOBALS["recruitment_job"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'recruitment_job');
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
                $doc = new $class(Container("recruitment_job"));
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
                    if ($pageName == "RecruitmentJobView") {
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
        $this->title->setVisibility();
        $this->shortDescription->setVisibility();
        $this->description->setVisibility();
        $this->requirements->setVisibility();
        $this->benefits->setVisibility();
        $this->country->setVisibility();
        $this->company->setVisibility();
        $this->department->setVisibility();
        $this->code->setVisibility();
        $this->employementType->setVisibility();
        $this->industry->setVisibility();
        $this->experienceLevel->setVisibility();
        $this->jobFunction->setVisibility();
        $this->educationLevel->setVisibility();
        $this->currency->setVisibility();
        $this->showSalary->setVisibility();
        $this->salaryMin->setVisibility();
        $this->salaryMax->setVisibility();
        $this->keywords->setVisibility();
        $this->status->setVisibility();
        $this->closingDate->setVisibility();
        $this->attachment->setVisibility();
        $this->display->setVisibility();
        $this->postedBy->setVisibility();
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
                    $this->terminate("RecruitmentJobList"); // No matching record, return to list
                    return;
                }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "RecruitmentJobList") {
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

        // Check field name 'title' first before field var 'x_title'
        $val = $CurrentForm->hasValue("title") ? $CurrentForm->getValue("title") : $CurrentForm->getValue("x_title");
        if (!$this->title->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->title->Visible = false; // Disable update for API request
            } else {
                $this->title->setFormValue($val);
            }
        }

        // Check field name 'shortDescription' first before field var 'x_shortDescription'
        $val = $CurrentForm->hasValue("shortDescription") ? $CurrentForm->getValue("shortDescription") : $CurrentForm->getValue("x_shortDescription");
        if (!$this->shortDescription->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->shortDescription->Visible = false; // Disable update for API request
            } else {
                $this->shortDescription->setFormValue($val);
            }
        }

        // Check field name 'description' first before field var 'x_description'
        $val = $CurrentForm->hasValue("description") ? $CurrentForm->getValue("description") : $CurrentForm->getValue("x_description");
        if (!$this->description->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->description->Visible = false; // Disable update for API request
            } else {
                $this->description->setFormValue($val);
            }
        }

        // Check field name 'requirements' first before field var 'x_requirements'
        $val = $CurrentForm->hasValue("requirements") ? $CurrentForm->getValue("requirements") : $CurrentForm->getValue("x_requirements");
        if (!$this->requirements->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->requirements->Visible = false; // Disable update for API request
            } else {
                $this->requirements->setFormValue($val);
            }
        }

        // Check field name 'benefits' first before field var 'x_benefits'
        $val = $CurrentForm->hasValue("benefits") ? $CurrentForm->getValue("benefits") : $CurrentForm->getValue("x_benefits");
        if (!$this->benefits->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->benefits->Visible = false; // Disable update for API request
            } else {
                $this->benefits->setFormValue($val);
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

        // Check field name 'company' first before field var 'x_company'
        $val = $CurrentForm->hasValue("company") ? $CurrentForm->getValue("company") : $CurrentForm->getValue("x_company");
        if (!$this->company->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->company->Visible = false; // Disable update for API request
            } else {
                $this->company->setFormValue($val);
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

        // Check field name 'code' first before field var 'x_code'
        $val = $CurrentForm->hasValue("code") ? $CurrentForm->getValue("code") : $CurrentForm->getValue("x_code");
        if (!$this->code->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->code->Visible = false; // Disable update for API request
            } else {
                $this->code->setFormValue($val);
            }
        }

        // Check field name 'employementType' first before field var 'x_employementType'
        $val = $CurrentForm->hasValue("employementType") ? $CurrentForm->getValue("employementType") : $CurrentForm->getValue("x_employementType");
        if (!$this->employementType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->employementType->Visible = false; // Disable update for API request
            } else {
                $this->employementType->setFormValue($val);
            }
        }

        // Check field name 'industry' first before field var 'x_industry'
        $val = $CurrentForm->hasValue("industry") ? $CurrentForm->getValue("industry") : $CurrentForm->getValue("x_industry");
        if (!$this->industry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->industry->Visible = false; // Disable update for API request
            } else {
                $this->industry->setFormValue($val);
            }
        }

        // Check field name 'experienceLevel' first before field var 'x_experienceLevel'
        $val = $CurrentForm->hasValue("experienceLevel") ? $CurrentForm->getValue("experienceLevel") : $CurrentForm->getValue("x_experienceLevel");
        if (!$this->experienceLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->experienceLevel->Visible = false; // Disable update for API request
            } else {
                $this->experienceLevel->setFormValue($val);
            }
        }

        // Check field name 'jobFunction' first before field var 'x_jobFunction'
        $val = $CurrentForm->hasValue("jobFunction") ? $CurrentForm->getValue("jobFunction") : $CurrentForm->getValue("x_jobFunction");
        if (!$this->jobFunction->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->jobFunction->Visible = false; // Disable update for API request
            } else {
                $this->jobFunction->setFormValue($val);
            }
        }

        // Check field name 'educationLevel' first before field var 'x_educationLevel'
        $val = $CurrentForm->hasValue("educationLevel") ? $CurrentForm->getValue("educationLevel") : $CurrentForm->getValue("x_educationLevel");
        if (!$this->educationLevel->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->educationLevel->Visible = false; // Disable update for API request
            } else {
                $this->educationLevel->setFormValue($val);
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

        // Check field name 'showSalary' first before field var 'x_showSalary'
        $val = $CurrentForm->hasValue("showSalary") ? $CurrentForm->getValue("showSalary") : $CurrentForm->getValue("x_showSalary");
        if (!$this->showSalary->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->showSalary->Visible = false; // Disable update for API request
            } else {
                $this->showSalary->setFormValue($val);
            }
        }

        // Check field name 'salaryMin' first before field var 'x_salaryMin'
        $val = $CurrentForm->hasValue("salaryMin") ? $CurrentForm->getValue("salaryMin") : $CurrentForm->getValue("x_salaryMin");
        if (!$this->salaryMin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->salaryMin->Visible = false; // Disable update for API request
            } else {
                $this->salaryMin->setFormValue($val);
            }
        }

        // Check field name 'salaryMax' first before field var 'x_salaryMax'
        $val = $CurrentForm->hasValue("salaryMax") ? $CurrentForm->getValue("salaryMax") : $CurrentForm->getValue("x_salaryMax");
        if (!$this->salaryMax->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->salaryMax->Visible = false; // Disable update for API request
            } else {
                $this->salaryMax->setFormValue($val);
            }
        }

        // Check field name 'keywords' first before field var 'x_keywords'
        $val = $CurrentForm->hasValue("keywords") ? $CurrentForm->getValue("keywords") : $CurrentForm->getValue("x_keywords");
        if (!$this->keywords->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->keywords->Visible = false; // Disable update for API request
            } else {
                $this->keywords->setFormValue($val);
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

        // Check field name 'closingDate' first before field var 'x_closingDate'
        $val = $CurrentForm->hasValue("closingDate") ? $CurrentForm->getValue("closingDate") : $CurrentForm->getValue("x_closingDate");
        if (!$this->closingDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->closingDate->Visible = false; // Disable update for API request
            } else {
                $this->closingDate->setFormValue($val);
            }
            $this->closingDate->CurrentValue = UnFormatDateTime($this->closingDate->CurrentValue, 0);
        }

        // Check field name 'attachment' first before field var 'x_attachment'
        $val = $CurrentForm->hasValue("attachment") ? $CurrentForm->getValue("attachment") : $CurrentForm->getValue("x_attachment");
        if (!$this->attachment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->attachment->Visible = false; // Disable update for API request
            } else {
                $this->attachment->setFormValue($val);
            }
        }

        // Check field name 'display' first before field var 'x_display'
        $val = $CurrentForm->hasValue("display") ? $CurrentForm->getValue("display") : $CurrentForm->getValue("x_display");
        if (!$this->display->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->display->Visible = false; // Disable update for API request
            } else {
                $this->display->setFormValue($val);
            }
        }

        // Check field name 'postedBy' first before field var 'x_postedBy'
        $val = $CurrentForm->hasValue("postedBy") ? $CurrentForm->getValue("postedBy") : $CurrentForm->getValue("x_postedBy");
        if (!$this->postedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->postedBy->Visible = false; // Disable update for API request
            } else {
                $this->postedBy->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->id->CurrentValue = $this->id->FormValue;
        $this->title->CurrentValue = $this->title->FormValue;
        $this->shortDescription->CurrentValue = $this->shortDescription->FormValue;
        $this->description->CurrentValue = $this->description->FormValue;
        $this->requirements->CurrentValue = $this->requirements->FormValue;
        $this->benefits->CurrentValue = $this->benefits->FormValue;
        $this->country->CurrentValue = $this->country->FormValue;
        $this->company->CurrentValue = $this->company->FormValue;
        $this->department->CurrentValue = $this->department->FormValue;
        $this->code->CurrentValue = $this->code->FormValue;
        $this->employementType->CurrentValue = $this->employementType->FormValue;
        $this->industry->CurrentValue = $this->industry->FormValue;
        $this->experienceLevel->CurrentValue = $this->experienceLevel->FormValue;
        $this->jobFunction->CurrentValue = $this->jobFunction->FormValue;
        $this->educationLevel->CurrentValue = $this->educationLevel->FormValue;
        $this->currency->CurrentValue = $this->currency->FormValue;
        $this->showSalary->CurrentValue = $this->showSalary->FormValue;
        $this->salaryMin->CurrentValue = $this->salaryMin->FormValue;
        $this->salaryMax->CurrentValue = $this->salaryMax->FormValue;
        $this->keywords->CurrentValue = $this->keywords->FormValue;
        $this->status->CurrentValue = $this->status->FormValue;
        $this->closingDate->CurrentValue = $this->closingDate->FormValue;
        $this->closingDate->CurrentValue = UnFormatDateTime($this->closingDate->CurrentValue, 0);
        $this->attachment->CurrentValue = $this->attachment->FormValue;
        $this->display->CurrentValue = $this->display->FormValue;
        $this->postedBy->CurrentValue = $this->postedBy->FormValue;
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
        $this->title->setDbValue($row['title']);
        $this->shortDescription->setDbValue($row['shortDescription']);
        $this->description->setDbValue($row['description']);
        $this->requirements->setDbValue($row['requirements']);
        $this->benefits->setDbValue($row['benefits']);
        $this->country->setDbValue($row['country']);
        $this->company->setDbValue($row['company']);
        $this->department->setDbValue($row['department']);
        $this->code->setDbValue($row['code']);
        $this->employementType->setDbValue($row['employementType']);
        $this->industry->setDbValue($row['industry']);
        $this->experienceLevel->setDbValue($row['experienceLevel']);
        $this->jobFunction->setDbValue($row['jobFunction']);
        $this->educationLevel->setDbValue($row['educationLevel']);
        $this->currency->setDbValue($row['currency']);
        $this->showSalary->setDbValue($row['showSalary']);
        $this->salaryMin->setDbValue($row['salaryMin']);
        $this->salaryMax->setDbValue($row['salaryMax']);
        $this->keywords->setDbValue($row['keywords']);
        $this->status->setDbValue($row['status']);
        $this->closingDate->setDbValue($row['closingDate']);
        $this->attachment->setDbValue($row['attachment']);
        $this->display->setDbValue($row['display']);
        $this->postedBy->setDbValue($row['postedBy']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['title'] = null;
        $row['shortDescription'] = null;
        $row['description'] = null;
        $row['requirements'] = null;
        $row['benefits'] = null;
        $row['country'] = null;
        $row['company'] = null;
        $row['department'] = null;
        $row['code'] = null;
        $row['employementType'] = null;
        $row['industry'] = null;
        $row['experienceLevel'] = null;
        $row['jobFunction'] = null;
        $row['educationLevel'] = null;
        $row['currency'] = null;
        $row['showSalary'] = null;
        $row['salaryMin'] = null;
        $row['salaryMax'] = null;
        $row['keywords'] = null;
        $row['status'] = null;
        $row['closingDate'] = null;
        $row['attachment'] = null;
        $row['display'] = null;
        $row['postedBy'] = null;
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

        // title

        // shortDescription

        // description

        // requirements

        // benefits

        // country

        // company

        // department

        // code

        // employementType

        // industry

        // experienceLevel

        // jobFunction

        // educationLevel

        // currency

        // showSalary

        // salaryMin

        // salaryMax

        // keywords

        // status

        // closingDate

        // attachment

        // display

        // postedBy
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // title
            $this->title->ViewValue = $this->title->CurrentValue;
            $this->title->ViewCustomAttributes = "";

            // shortDescription
            $this->shortDescription->ViewValue = $this->shortDescription->CurrentValue;
            $this->shortDescription->ViewCustomAttributes = "";

            // description
            $this->description->ViewValue = $this->description->CurrentValue;
            $this->description->ViewCustomAttributes = "";

            // requirements
            $this->requirements->ViewValue = $this->requirements->CurrentValue;
            $this->requirements->ViewCustomAttributes = "";

            // benefits
            $this->benefits->ViewValue = $this->benefits->CurrentValue;
            $this->benefits->ViewCustomAttributes = "";

            // country
            $this->country->ViewValue = $this->country->CurrentValue;
            $this->country->ViewValue = FormatNumber($this->country->ViewValue, 0, -2, -2, -2);
            $this->country->ViewCustomAttributes = "";

            // company
            $this->company->ViewValue = $this->company->CurrentValue;
            $this->company->ViewValue = FormatNumber($this->company->ViewValue, 0, -2, -2, -2);
            $this->company->ViewCustomAttributes = "";

            // department
            $this->department->ViewValue = $this->department->CurrentValue;
            $this->department->ViewCustomAttributes = "";

            // code
            $this->code->ViewValue = $this->code->CurrentValue;
            $this->code->ViewCustomAttributes = "";

            // employementType
            $this->employementType->ViewValue = $this->employementType->CurrentValue;
            $this->employementType->ViewValue = FormatNumber($this->employementType->ViewValue, 0, -2, -2, -2);
            $this->employementType->ViewCustomAttributes = "";

            // industry
            $this->industry->ViewValue = $this->industry->CurrentValue;
            $this->industry->ViewValue = FormatNumber($this->industry->ViewValue, 0, -2, -2, -2);
            $this->industry->ViewCustomAttributes = "";

            // experienceLevel
            $this->experienceLevel->ViewValue = $this->experienceLevel->CurrentValue;
            $this->experienceLevel->ViewValue = FormatNumber($this->experienceLevel->ViewValue, 0, -2, -2, -2);
            $this->experienceLevel->ViewCustomAttributes = "";

            // jobFunction
            $this->jobFunction->ViewValue = $this->jobFunction->CurrentValue;
            $this->jobFunction->ViewValue = FormatNumber($this->jobFunction->ViewValue, 0, -2, -2, -2);
            $this->jobFunction->ViewCustomAttributes = "";

            // educationLevel
            $this->educationLevel->ViewValue = $this->educationLevel->CurrentValue;
            $this->educationLevel->ViewValue = FormatNumber($this->educationLevel->ViewValue, 0, -2, -2, -2);
            $this->educationLevel->ViewCustomAttributes = "";

            // currency
            $this->currency->ViewValue = $this->currency->CurrentValue;
            $this->currency->ViewValue = FormatNumber($this->currency->ViewValue, 0, -2, -2, -2);
            $this->currency->ViewCustomAttributes = "";

            // showSalary
            if (strval($this->showSalary->CurrentValue) != "") {
                $this->showSalary->ViewValue = $this->showSalary->optionCaption($this->showSalary->CurrentValue);
            } else {
                $this->showSalary->ViewValue = null;
            }
            $this->showSalary->ViewCustomAttributes = "";

            // salaryMin
            $this->salaryMin->ViewValue = $this->salaryMin->CurrentValue;
            $this->salaryMin->ViewValue = FormatNumber($this->salaryMin->ViewValue, 0, -2, -2, -2);
            $this->salaryMin->ViewCustomAttributes = "";

            // salaryMax
            $this->salaryMax->ViewValue = $this->salaryMax->CurrentValue;
            $this->salaryMax->ViewValue = FormatNumber($this->salaryMax->ViewValue, 0, -2, -2, -2);
            $this->salaryMax->ViewCustomAttributes = "";

            // keywords
            $this->keywords->ViewValue = $this->keywords->CurrentValue;
            $this->keywords->ViewCustomAttributes = "";

            // status
            if (strval($this->status->CurrentValue) != "") {
                $this->status->ViewValue = $this->status->optionCaption($this->status->CurrentValue);
            } else {
                $this->status->ViewValue = null;
            }
            $this->status->ViewCustomAttributes = "";

            // closingDate
            $this->closingDate->ViewValue = $this->closingDate->CurrentValue;
            $this->closingDate->ViewValue = FormatDateTime($this->closingDate->ViewValue, 0);
            $this->closingDate->ViewCustomAttributes = "";

            // attachment
            $this->attachment->ViewValue = $this->attachment->CurrentValue;
            $this->attachment->ViewCustomAttributes = "";

            // display
            $this->display->ViewValue = $this->display->CurrentValue;
            $this->display->ViewCustomAttributes = "";

            // postedBy
            $this->postedBy->ViewValue = $this->postedBy->CurrentValue;
            $this->postedBy->ViewValue = FormatNumber($this->postedBy->ViewValue, 0, -2, -2, -2);
            $this->postedBy->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";
            $this->title->TooltipValue = "";

            // shortDescription
            $this->shortDescription->LinkCustomAttributes = "";
            $this->shortDescription->HrefValue = "";
            $this->shortDescription->TooltipValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";
            $this->description->TooltipValue = "";

            // requirements
            $this->requirements->LinkCustomAttributes = "";
            $this->requirements->HrefValue = "";
            $this->requirements->TooltipValue = "";

            // benefits
            $this->benefits->LinkCustomAttributes = "";
            $this->benefits->HrefValue = "";
            $this->benefits->TooltipValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";
            $this->country->TooltipValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";
            $this->company->TooltipValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";
            $this->department->TooltipValue = "";

            // code
            $this->code->LinkCustomAttributes = "";
            $this->code->HrefValue = "";
            $this->code->TooltipValue = "";

            // employementType
            $this->employementType->LinkCustomAttributes = "";
            $this->employementType->HrefValue = "";
            $this->employementType->TooltipValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";
            $this->industry->TooltipValue = "";

            // experienceLevel
            $this->experienceLevel->LinkCustomAttributes = "";
            $this->experienceLevel->HrefValue = "";
            $this->experienceLevel->TooltipValue = "";

            // jobFunction
            $this->jobFunction->LinkCustomAttributes = "";
            $this->jobFunction->HrefValue = "";
            $this->jobFunction->TooltipValue = "";

            // educationLevel
            $this->educationLevel->LinkCustomAttributes = "";
            $this->educationLevel->HrefValue = "";
            $this->educationLevel->TooltipValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";
            $this->currency->TooltipValue = "";

            // showSalary
            $this->showSalary->LinkCustomAttributes = "";
            $this->showSalary->HrefValue = "";
            $this->showSalary->TooltipValue = "";

            // salaryMin
            $this->salaryMin->LinkCustomAttributes = "";
            $this->salaryMin->HrefValue = "";
            $this->salaryMin->TooltipValue = "";

            // salaryMax
            $this->salaryMax->LinkCustomAttributes = "";
            $this->salaryMax->HrefValue = "";
            $this->salaryMax->TooltipValue = "";

            // keywords
            $this->keywords->LinkCustomAttributes = "";
            $this->keywords->HrefValue = "";
            $this->keywords->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // closingDate
            $this->closingDate->LinkCustomAttributes = "";
            $this->closingDate->HrefValue = "";
            $this->closingDate->TooltipValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";
            $this->attachment->TooltipValue = "";

            // display
            $this->display->LinkCustomAttributes = "";
            $this->display->HrefValue = "";
            $this->display->TooltipValue = "";

            // postedBy
            $this->postedBy->LinkCustomAttributes = "";
            $this->postedBy->HrefValue = "";
            $this->postedBy->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // title
            $this->title->EditAttrs["class"] = "form-control";
            $this->title->EditCustomAttributes = "";
            if (!$this->title->Raw) {
                $this->title->CurrentValue = HtmlDecode($this->title->CurrentValue);
            }
            $this->title->EditValue = HtmlEncode($this->title->CurrentValue);
            $this->title->PlaceHolder = RemoveHtml($this->title->caption());

            // shortDescription
            $this->shortDescription->EditAttrs["class"] = "form-control";
            $this->shortDescription->EditCustomAttributes = "";
            $this->shortDescription->EditValue = HtmlEncode($this->shortDescription->CurrentValue);
            $this->shortDescription->PlaceHolder = RemoveHtml($this->shortDescription->caption());

            // description
            $this->description->EditAttrs["class"] = "form-control";
            $this->description->EditCustomAttributes = "";
            $this->description->EditValue = HtmlEncode($this->description->CurrentValue);
            $this->description->PlaceHolder = RemoveHtml($this->description->caption());

            // requirements
            $this->requirements->EditAttrs["class"] = "form-control";
            $this->requirements->EditCustomAttributes = "";
            $this->requirements->EditValue = HtmlEncode($this->requirements->CurrentValue);
            $this->requirements->PlaceHolder = RemoveHtml($this->requirements->caption());

            // benefits
            $this->benefits->EditAttrs["class"] = "form-control";
            $this->benefits->EditCustomAttributes = "";
            $this->benefits->EditValue = HtmlEncode($this->benefits->CurrentValue);
            $this->benefits->PlaceHolder = RemoveHtml($this->benefits->caption());

            // country
            $this->country->EditAttrs["class"] = "form-control";
            $this->country->EditCustomAttributes = "";
            $this->country->EditValue = HtmlEncode($this->country->CurrentValue);
            $this->country->PlaceHolder = RemoveHtml($this->country->caption());

            // company
            $this->company->EditAttrs["class"] = "form-control";
            $this->company->EditCustomAttributes = "";
            $this->company->EditValue = HtmlEncode($this->company->CurrentValue);
            $this->company->PlaceHolder = RemoveHtml($this->company->caption());

            // department
            $this->department->EditAttrs["class"] = "form-control";
            $this->department->EditCustomAttributes = "";
            if (!$this->department->Raw) {
                $this->department->CurrentValue = HtmlDecode($this->department->CurrentValue);
            }
            $this->department->EditValue = HtmlEncode($this->department->CurrentValue);
            $this->department->PlaceHolder = RemoveHtml($this->department->caption());

            // code
            $this->code->EditAttrs["class"] = "form-control";
            $this->code->EditCustomAttributes = "";
            if (!$this->code->Raw) {
                $this->code->CurrentValue = HtmlDecode($this->code->CurrentValue);
            }
            $this->code->EditValue = HtmlEncode($this->code->CurrentValue);
            $this->code->PlaceHolder = RemoveHtml($this->code->caption());

            // employementType
            $this->employementType->EditAttrs["class"] = "form-control";
            $this->employementType->EditCustomAttributes = "";
            $this->employementType->EditValue = HtmlEncode($this->employementType->CurrentValue);
            $this->employementType->PlaceHolder = RemoveHtml($this->employementType->caption());

            // industry
            $this->industry->EditAttrs["class"] = "form-control";
            $this->industry->EditCustomAttributes = "";
            $this->industry->EditValue = HtmlEncode($this->industry->CurrentValue);
            $this->industry->PlaceHolder = RemoveHtml($this->industry->caption());

            // experienceLevel
            $this->experienceLevel->EditAttrs["class"] = "form-control";
            $this->experienceLevel->EditCustomAttributes = "";
            $this->experienceLevel->EditValue = HtmlEncode($this->experienceLevel->CurrentValue);
            $this->experienceLevel->PlaceHolder = RemoveHtml($this->experienceLevel->caption());

            // jobFunction
            $this->jobFunction->EditAttrs["class"] = "form-control";
            $this->jobFunction->EditCustomAttributes = "";
            $this->jobFunction->EditValue = HtmlEncode($this->jobFunction->CurrentValue);
            $this->jobFunction->PlaceHolder = RemoveHtml($this->jobFunction->caption());

            // educationLevel
            $this->educationLevel->EditAttrs["class"] = "form-control";
            $this->educationLevel->EditCustomAttributes = "";
            $this->educationLevel->EditValue = HtmlEncode($this->educationLevel->CurrentValue);
            $this->educationLevel->PlaceHolder = RemoveHtml($this->educationLevel->caption());

            // currency
            $this->currency->EditAttrs["class"] = "form-control";
            $this->currency->EditCustomAttributes = "";
            $this->currency->EditValue = HtmlEncode($this->currency->CurrentValue);
            $this->currency->PlaceHolder = RemoveHtml($this->currency->caption());

            // showSalary
            $this->showSalary->EditCustomAttributes = "";
            $this->showSalary->EditValue = $this->showSalary->options(false);
            $this->showSalary->PlaceHolder = RemoveHtml($this->showSalary->caption());

            // salaryMin
            $this->salaryMin->EditAttrs["class"] = "form-control";
            $this->salaryMin->EditCustomAttributes = "";
            $this->salaryMin->EditValue = HtmlEncode($this->salaryMin->CurrentValue);
            $this->salaryMin->PlaceHolder = RemoveHtml($this->salaryMin->caption());

            // salaryMax
            $this->salaryMax->EditAttrs["class"] = "form-control";
            $this->salaryMax->EditCustomAttributes = "";
            $this->salaryMax->EditValue = HtmlEncode($this->salaryMax->CurrentValue);
            $this->salaryMax->PlaceHolder = RemoveHtml($this->salaryMax->caption());

            // keywords
            $this->keywords->EditAttrs["class"] = "form-control";
            $this->keywords->EditCustomAttributes = "";
            $this->keywords->EditValue = HtmlEncode($this->keywords->CurrentValue);
            $this->keywords->PlaceHolder = RemoveHtml($this->keywords->caption());

            // status
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = $this->status->options(false);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // closingDate
            $this->closingDate->EditAttrs["class"] = "form-control";
            $this->closingDate->EditCustomAttributes = "";
            $this->closingDate->EditValue = HtmlEncode(FormatDateTime($this->closingDate->CurrentValue, 8));
            $this->closingDate->PlaceHolder = RemoveHtml($this->closingDate->caption());

            // attachment
            $this->attachment->EditAttrs["class"] = "form-control";
            $this->attachment->EditCustomAttributes = "";
            if (!$this->attachment->Raw) {
                $this->attachment->CurrentValue = HtmlDecode($this->attachment->CurrentValue);
            }
            $this->attachment->EditValue = HtmlEncode($this->attachment->CurrentValue);
            $this->attachment->PlaceHolder = RemoveHtml($this->attachment->caption());

            // display
            $this->display->EditAttrs["class"] = "form-control";
            $this->display->EditCustomAttributes = "";
            if (!$this->display->Raw) {
                $this->display->CurrentValue = HtmlDecode($this->display->CurrentValue);
            }
            $this->display->EditValue = HtmlEncode($this->display->CurrentValue);
            $this->display->PlaceHolder = RemoveHtml($this->display->caption());

            // postedBy
            $this->postedBy->EditAttrs["class"] = "form-control";
            $this->postedBy->EditCustomAttributes = "";
            $this->postedBy->EditValue = HtmlEncode($this->postedBy->CurrentValue);
            $this->postedBy->PlaceHolder = RemoveHtml($this->postedBy->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // title
            $this->title->LinkCustomAttributes = "";
            $this->title->HrefValue = "";

            // shortDescription
            $this->shortDescription->LinkCustomAttributes = "";
            $this->shortDescription->HrefValue = "";

            // description
            $this->description->LinkCustomAttributes = "";
            $this->description->HrefValue = "";

            // requirements
            $this->requirements->LinkCustomAttributes = "";
            $this->requirements->HrefValue = "";

            // benefits
            $this->benefits->LinkCustomAttributes = "";
            $this->benefits->HrefValue = "";

            // country
            $this->country->LinkCustomAttributes = "";
            $this->country->HrefValue = "";

            // company
            $this->company->LinkCustomAttributes = "";
            $this->company->HrefValue = "";

            // department
            $this->department->LinkCustomAttributes = "";
            $this->department->HrefValue = "";

            // code
            $this->code->LinkCustomAttributes = "";
            $this->code->HrefValue = "";

            // employementType
            $this->employementType->LinkCustomAttributes = "";
            $this->employementType->HrefValue = "";

            // industry
            $this->industry->LinkCustomAttributes = "";
            $this->industry->HrefValue = "";

            // experienceLevel
            $this->experienceLevel->LinkCustomAttributes = "";
            $this->experienceLevel->HrefValue = "";

            // jobFunction
            $this->jobFunction->LinkCustomAttributes = "";
            $this->jobFunction->HrefValue = "";

            // educationLevel
            $this->educationLevel->LinkCustomAttributes = "";
            $this->educationLevel->HrefValue = "";

            // currency
            $this->currency->LinkCustomAttributes = "";
            $this->currency->HrefValue = "";

            // showSalary
            $this->showSalary->LinkCustomAttributes = "";
            $this->showSalary->HrefValue = "";

            // salaryMin
            $this->salaryMin->LinkCustomAttributes = "";
            $this->salaryMin->HrefValue = "";

            // salaryMax
            $this->salaryMax->LinkCustomAttributes = "";
            $this->salaryMax->HrefValue = "";

            // keywords
            $this->keywords->LinkCustomAttributes = "";
            $this->keywords->HrefValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";

            // closingDate
            $this->closingDate->LinkCustomAttributes = "";
            $this->closingDate->HrefValue = "";

            // attachment
            $this->attachment->LinkCustomAttributes = "";
            $this->attachment->HrefValue = "";

            // display
            $this->display->LinkCustomAttributes = "";
            $this->display->HrefValue = "";

            // postedBy
            $this->postedBy->LinkCustomAttributes = "";
            $this->postedBy->HrefValue = "";
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
        if ($this->title->Required) {
            if (!$this->title->IsDetailKey && EmptyValue($this->title->FormValue)) {
                $this->title->addErrorMessage(str_replace("%s", $this->title->caption(), $this->title->RequiredErrorMessage));
            }
        }
        if ($this->shortDescription->Required) {
            if (!$this->shortDescription->IsDetailKey && EmptyValue($this->shortDescription->FormValue)) {
                $this->shortDescription->addErrorMessage(str_replace("%s", $this->shortDescription->caption(), $this->shortDescription->RequiredErrorMessage));
            }
        }
        if ($this->description->Required) {
            if (!$this->description->IsDetailKey && EmptyValue($this->description->FormValue)) {
                $this->description->addErrorMessage(str_replace("%s", $this->description->caption(), $this->description->RequiredErrorMessage));
            }
        }
        if ($this->requirements->Required) {
            if (!$this->requirements->IsDetailKey && EmptyValue($this->requirements->FormValue)) {
                $this->requirements->addErrorMessage(str_replace("%s", $this->requirements->caption(), $this->requirements->RequiredErrorMessage));
            }
        }
        if ($this->benefits->Required) {
            if (!$this->benefits->IsDetailKey && EmptyValue($this->benefits->FormValue)) {
                $this->benefits->addErrorMessage(str_replace("%s", $this->benefits->caption(), $this->benefits->RequiredErrorMessage));
            }
        }
        if ($this->country->Required) {
            if (!$this->country->IsDetailKey && EmptyValue($this->country->FormValue)) {
                $this->country->addErrorMessage(str_replace("%s", $this->country->caption(), $this->country->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->country->FormValue)) {
            $this->country->addErrorMessage($this->country->getErrorMessage(false));
        }
        if ($this->company->Required) {
            if (!$this->company->IsDetailKey && EmptyValue($this->company->FormValue)) {
                $this->company->addErrorMessage(str_replace("%s", $this->company->caption(), $this->company->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->company->FormValue)) {
            $this->company->addErrorMessage($this->company->getErrorMessage(false));
        }
        if ($this->department->Required) {
            if (!$this->department->IsDetailKey && EmptyValue($this->department->FormValue)) {
                $this->department->addErrorMessage(str_replace("%s", $this->department->caption(), $this->department->RequiredErrorMessage));
            }
        }
        if ($this->code->Required) {
            if (!$this->code->IsDetailKey && EmptyValue($this->code->FormValue)) {
                $this->code->addErrorMessage(str_replace("%s", $this->code->caption(), $this->code->RequiredErrorMessage));
            }
        }
        if ($this->employementType->Required) {
            if (!$this->employementType->IsDetailKey && EmptyValue($this->employementType->FormValue)) {
                $this->employementType->addErrorMessage(str_replace("%s", $this->employementType->caption(), $this->employementType->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->employementType->FormValue)) {
            $this->employementType->addErrorMessage($this->employementType->getErrorMessage(false));
        }
        if ($this->industry->Required) {
            if (!$this->industry->IsDetailKey && EmptyValue($this->industry->FormValue)) {
                $this->industry->addErrorMessage(str_replace("%s", $this->industry->caption(), $this->industry->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->industry->FormValue)) {
            $this->industry->addErrorMessage($this->industry->getErrorMessage(false));
        }
        if ($this->experienceLevel->Required) {
            if (!$this->experienceLevel->IsDetailKey && EmptyValue($this->experienceLevel->FormValue)) {
                $this->experienceLevel->addErrorMessage(str_replace("%s", $this->experienceLevel->caption(), $this->experienceLevel->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->experienceLevel->FormValue)) {
            $this->experienceLevel->addErrorMessage($this->experienceLevel->getErrorMessage(false));
        }
        if ($this->jobFunction->Required) {
            if (!$this->jobFunction->IsDetailKey && EmptyValue($this->jobFunction->FormValue)) {
                $this->jobFunction->addErrorMessage(str_replace("%s", $this->jobFunction->caption(), $this->jobFunction->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->jobFunction->FormValue)) {
            $this->jobFunction->addErrorMessage($this->jobFunction->getErrorMessage(false));
        }
        if ($this->educationLevel->Required) {
            if (!$this->educationLevel->IsDetailKey && EmptyValue($this->educationLevel->FormValue)) {
                $this->educationLevel->addErrorMessage(str_replace("%s", $this->educationLevel->caption(), $this->educationLevel->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->educationLevel->FormValue)) {
            $this->educationLevel->addErrorMessage($this->educationLevel->getErrorMessage(false));
        }
        if ($this->currency->Required) {
            if (!$this->currency->IsDetailKey && EmptyValue($this->currency->FormValue)) {
                $this->currency->addErrorMessage(str_replace("%s", $this->currency->caption(), $this->currency->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->currency->FormValue)) {
            $this->currency->addErrorMessage($this->currency->getErrorMessage(false));
        }
        if ($this->showSalary->Required) {
            if ($this->showSalary->FormValue == "") {
                $this->showSalary->addErrorMessage(str_replace("%s", $this->showSalary->caption(), $this->showSalary->RequiredErrorMessage));
            }
        }
        if ($this->salaryMin->Required) {
            if (!$this->salaryMin->IsDetailKey && EmptyValue($this->salaryMin->FormValue)) {
                $this->salaryMin->addErrorMessage(str_replace("%s", $this->salaryMin->caption(), $this->salaryMin->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->salaryMin->FormValue)) {
            $this->salaryMin->addErrorMessage($this->salaryMin->getErrorMessage(false));
        }
        if ($this->salaryMax->Required) {
            if (!$this->salaryMax->IsDetailKey && EmptyValue($this->salaryMax->FormValue)) {
                $this->salaryMax->addErrorMessage(str_replace("%s", $this->salaryMax->caption(), $this->salaryMax->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->salaryMax->FormValue)) {
            $this->salaryMax->addErrorMessage($this->salaryMax->getErrorMessage(false));
        }
        if ($this->keywords->Required) {
            if (!$this->keywords->IsDetailKey && EmptyValue($this->keywords->FormValue)) {
                $this->keywords->addErrorMessage(str_replace("%s", $this->keywords->caption(), $this->keywords->RequiredErrorMessage));
            }
        }
        if ($this->status->Required) {
            if ($this->status->FormValue == "") {
                $this->status->addErrorMessage(str_replace("%s", $this->status->caption(), $this->status->RequiredErrorMessage));
            }
        }
        if ($this->closingDate->Required) {
            if (!$this->closingDate->IsDetailKey && EmptyValue($this->closingDate->FormValue)) {
                $this->closingDate->addErrorMessage(str_replace("%s", $this->closingDate->caption(), $this->closingDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->closingDate->FormValue)) {
            $this->closingDate->addErrorMessage($this->closingDate->getErrorMessage(false));
        }
        if ($this->attachment->Required) {
            if (!$this->attachment->IsDetailKey && EmptyValue($this->attachment->FormValue)) {
                $this->attachment->addErrorMessage(str_replace("%s", $this->attachment->caption(), $this->attachment->RequiredErrorMessage));
            }
        }
        if ($this->display->Required) {
            if (!$this->display->IsDetailKey && EmptyValue($this->display->FormValue)) {
                $this->display->addErrorMessage(str_replace("%s", $this->display->caption(), $this->display->RequiredErrorMessage));
            }
        }
        if ($this->postedBy->Required) {
            if (!$this->postedBy->IsDetailKey && EmptyValue($this->postedBy->FormValue)) {
                $this->postedBy->addErrorMessage(str_replace("%s", $this->postedBy->caption(), $this->postedBy->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->postedBy->FormValue)) {
            $this->postedBy->addErrorMessage($this->postedBy->getErrorMessage(false));
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

            // title
            $this->title->setDbValueDef($rsnew, $this->title->CurrentValue, "", $this->title->ReadOnly);

            // shortDescription
            $this->shortDescription->setDbValueDef($rsnew, $this->shortDescription->CurrentValue, null, $this->shortDescription->ReadOnly);

            // description
            $this->description->setDbValueDef($rsnew, $this->description->CurrentValue, null, $this->description->ReadOnly);

            // requirements
            $this->requirements->setDbValueDef($rsnew, $this->requirements->CurrentValue, null, $this->requirements->ReadOnly);

            // benefits
            $this->benefits->setDbValueDef($rsnew, $this->benefits->CurrentValue, null, $this->benefits->ReadOnly);

            // country
            $this->country->setDbValueDef($rsnew, $this->country->CurrentValue, null, $this->country->ReadOnly);

            // company
            $this->company->setDbValueDef($rsnew, $this->company->CurrentValue, null, $this->company->ReadOnly);

            // department
            $this->department->setDbValueDef($rsnew, $this->department->CurrentValue, null, $this->department->ReadOnly);

            // code
            $this->code->setDbValueDef($rsnew, $this->code->CurrentValue, null, $this->code->ReadOnly);

            // employementType
            $this->employementType->setDbValueDef($rsnew, $this->employementType->CurrentValue, null, $this->employementType->ReadOnly);

            // industry
            $this->industry->setDbValueDef($rsnew, $this->industry->CurrentValue, null, $this->industry->ReadOnly);

            // experienceLevel
            $this->experienceLevel->setDbValueDef($rsnew, $this->experienceLevel->CurrentValue, null, $this->experienceLevel->ReadOnly);

            // jobFunction
            $this->jobFunction->setDbValueDef($rsnew, $this->jobFunction->CurrentValue, null, $this->jobFunction->ReadOnly);

            // educationLevel
            $this->educationLevel->setDbValueDef($rsnew, $this->educationLevel->CurrentValue, null, $this->educationLevel->ReadOnly);

            // currency
            $this->currency->setDbValueDef($rsnew, $this->currency->CurrentValue, null, $this->currency->ReadOnly);

            // showSalary
            $this->showSalary->setDbValueDef($rsnew, $this->showSalary->CurrentValue, null, $this->showSalary->ReadOnly);

            // salaryMin
            $this->salaryMin->setDbValueDef($rsnew, $this->salaryMin->CurrentValue, null, $this->salaryMin->ReadOnly);

            // salaryMax
            $this->salaryMax->setDbValueDef($rsnew, $this->salaryMax->CurrentValue, null, $this->salaryMax->ReadOnly);

            // keywords
            $this->keywords->setDbValueDef($rsnew, $this->keywords->CurrentValue, null, $this->keywords->ReadOnly);

            // status
            $this->status->setDbValueDef($rsnew, $this->status->CurrentValue, null, $this->status->ReadOnly);

            // closingDate
            $this->closingDate->setDbValueDef($rsnew, UnFormatDateTime($this->closingDate->CurrentValue, 0), null, $this->closingDate->ReadOnly);

            // attachment
            $this->attachment->setDbValueDef($rsnew, $this->attachment->CurrentValue, null, $this->attachment->ReadOnly);

            // display
            $this->display->setDbValueDef($rsnew, $this->display->CurrentValue, "", $this->display->ReadOnly);

            // postedBy
            $this->postedBy->setDbValueDef($rsnew, $this->postedBy->CurrentValue, null, $this->postedBy->ReadOnly);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("RecruitmentJobList"), "", $this->TableVar, true);
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
                case "x_showSalary":
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
