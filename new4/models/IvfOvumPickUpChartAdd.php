<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfOvumPickUpChartAdd extends IvfOvumPickUpChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_ovum_pick_up_chart';

    // Page object name
    public $PageObjName = "IvfOvumPickUpChartAdd";

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ivf_ovum_pick_up_chart)
        if (!isset($GLOBALS["ivf_ovum_pick_up_chart"]) || get_class($GLOBALS["ivf_ovum_pick_up_chart"]) == PROJECT_NAMESPACE . "ivf_ovum_pick_up_chart") {
            $GLOBALS["ivf_ovum_pick_up_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_ovum_pick_up_chart');
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
        if (Post("customexport") === null) {
             // Page Unload event
            if (method_exists($this, "pageUnload")) {
                $this->pageUnload();
            }

            // Global Page Unloaded event (in userfn*.php)
            Page_Unloaded();
        }

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            if (is_array(Session(SESSION_TEMP_IMAGES))) { // Restore temp images
                $TempImages = Session(SESSION_TEMP_IMAGES);
            }
            if (Post("data") !== null) {
                $content = Post("data");
            }
            $ExportFileName = Post("filename", "");
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("ivf_ovum_pick_up_chart"));
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
        if ($this->CustomExport) { // Save temp images array for custom export
            if (is_array($TempImages)) {
                $_SESSION[SESSION_TEMP_IMAGES] = $TempImages;
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
                    if ($pageName == "IvfOvumPickUpChartView") {
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
        $this->RIDNo->setVisibility();
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->Consultant->setVisibility();
        $this->TotalDoseOfStimulation->setVisibility();
        $this->Protocol->setVisibility();
        $this->NumberOfDaysOfStimulation->setVisibility();
        $this->TriggerDateTime->setVisibility();
        $this->OPUDateTime->setVisibility();
        $this->HoursAfterTrigger->setVisibility();
        $this->SerumE2->setVisibility();
        $this->SerumP4->setVisibility();
        $this->FORT->setVisibility();
        $this->ExperctedOocytes->setVisibility();
        $this->NoOfOocytesRetrieved->setVisibility();
        $this->OocytesRetreivalRate->setVisibility();
        $this->Anesthesia->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->UCL->setVisibility();
        $this->Angle->setVisibility();
        $this->EMS->setVisibility();
        $this->Cannulation->setVisibility();
        $this->ProcedureT->setVisibility();
        $this->NoOfOocytesRetrievedd->setVisibility();
        $this->CourseInHospital->setVisibility();
        $this->DischargeAdvise->setVisibility();
        $this->FollowUpAdvise->setVisibility();
        $this->PlanT->setVisibility();
        $this->ReviewDate->setVisibility();
        $this->ReviewDoctor->setVisibility();
        $this->TemplateProcedure->setVisibility();
        $this->TemplateCourseInHospital->setVisibility();
        $this->TemplateDischargeAdvise->setVisibility();
        $this->TemplateFollowUpAdvise->setVisibility();
        $this->TidNo->setVisibility();
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
        $this->setupLookupOptions($this->TemplateProcedure);
        $this->setupLookupOptions($this->TemplateCourseInHospital);
        $this->setupLookupOptions($this->TemplateDischargeAdvise);
        $this->setupLookupOptions($this->TemplateFollowUpAdvise);

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
                    $this->terminate("IvfOvumPickUpChartList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfOvumPickUpChartList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfOvumPickUpChartView") {
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
        $this->RIDNo->CurrentValue = null;
        $this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
        $this->Name->CurrentValue = null;
        $this->Name->OldValue = $this->Name->CurrentValue;
        $this->ARTCycle->CurrentValue = null;
        $this->ARTCycle->OldValue = $this->ARTCycle->CurrentValue;
        $this->Consultant->CurrentValue = null;
        $this->Consultant->OldValue = $this->Consultant->CurrentValue;
        $this->TotalDoseOfStimulation->CurrentValue = null;
        $this->TotalDoseOfStimulation->OldValue = $this->TotalDoseOfStimulation->CurrentValue;
        $this->Protocol->CurrentValue = null;
        $this->Protocol->OldValue = $this->Protocol->CurrentValue;
        $this->NumberOfDaysOfStimulation->CurrentValue = null;
        $this->NumberOfDaysOfStimulation->OldValue = $this->NumberOfDaysOfStimulation->CurrentValue;
        $this->TriggerDateTime->CurrentValue = null;
        $this->TriggerDateTime->OldValue = $this->TriggerDateTime->CurrentValue;
        $this->OPUDateTime->CurrentValue = null;
        $this->OPUDateTime->OldValue = $this->OPUDateTime->CurrentValue;
        $this->HoursAfterTrigger->CurrentValue = null;
        $this->HoursAfterTrigger->OldValue = $this->HoursAfterTrigger->CurrentValue;
        $this->SerumE2->CurrentValue = null;
        $this->SerumE2->OldValue = $this->SerumE2->CurrentValue;
        $this->SerumP4->CurrentValue = null;
        $this->SerumP4->OldValue = $this->SerumP4->CurrentValue;
        $this->FORT->CurrentValue = null;
        $this->FORT->OldValue = $this->FORT->CurrentValue;
        $this->ExperctedOocytes->CurrentValue = null;
        $this->ExperctedOocytes->OldValue = $this->ExperctedOocytes->CurrentValue;
        $this->NoOfOocytesRetrieved->CurrentValue = null;
        $this->NoOfOocytesRetrieved->OldValue = $this->NoOfOocytesRetrieved->CurrentValue;
        $this->OocytesRetreivalRate->CurrentValue = null;
        $this->OocytesRetreivalRate->OldValue = $this->OocytesRetreivalRate->CurrentValue;
        $this->Anesthesia->CurrentValue = null;
        $this->Anesthesia->OldValue = $this->Anesthesia->CurrentValue;
        $this->TrialCannulation->CurrentValue = null;
        $this->TrialCannulation->OldValue = $this->TrialCannulation->CurrentValue;
        $this->UCL->CurrentValue = null;
        $this->UCL->OldValue = $this->UCL->CurrentValue;
        $this->Angle->CurrentValue = null;
        $this->Angle->OldValue = $this->Angle->CurrentValue;
        $this->EMS->CurrentValue = null;
        $this->EMS->OldValue = $this->EMS->CurrentValue;
        $this->Cannulation->CurrentValue = null;
        $this->Cannulation->OldValue = $this->Cannulation->CurrentValue;
        $this->ProcedureT->CurrentValue = null;
        $this->ProcedureT->OldValue = $this->ProcedureT->CurrentValue;
        $this->NoOfOocytesRetrievedd->CurrentValue = null;
        $this->NoOfOocytesRetrievedd->OldValue = $this->NoOfOocytesRetrievedd->CurrentValue;
        $this->CourseInHospital->CurrentValue = null;
        $this->CourseInHospital->OldValue = $this->CourseInHospital->CurrentValue;
        $this->DischargeAdvise->CurrentValue = null;
        $this->DischargeAdvise->OldValue = $this->DischargeAdvise->CurrentValue;
        $this->FollowUpAdvise->CurrentValue = null;
        $this->FollowUpAdvise->OldValue = $this->FollowUpAdvise->CurrentValue;
        $this->PlanT->CurrentValue = null;
        $this->PlanT->OldValue = $this->PlanT->CurrentValue;
        $this->ReviewDate->CurrentValue = null;
        $this->ReviewDate->OldValue = $this->ReviewDate->CurrentValue;
        $this->ReviewDoctor->CurrentValue = null;
        $this->ReviewDoctor->OldValue = $this->ReviewDoctor->CurrentValue;
        $this->TemplateProcedure->CurrentValue = null;
        $this->TemplateProcedure->OldValue = $this->TemplateProcedure->CurrentValue;
        $this->TemplateCourseInHospital->CurrentValue = null;
        $this->TemplateCourseInHospital->OldValue = $this->TemplateCourseInHospital->CurrentValue;
        $this->TemplateDischargeAdvise->CurrentValue = null;
        $this->TemplateDischargeAdvise->OldValue = $this->TemplateDischargeAdvise->CurrentValue;
        $this->TemplateFollowUpAdvise->CurrentValue = null;
        $this->TemplateFollowUpAdvise->OldValue = $this->TemplateFollowUpAdvise->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
            }
        }

        // Check field name 'Name' first before field var 'x_Name'
        $val = $CurrentForm->hasValue("Name") ? $CurrentForm->getValue("Name") : $CurrentForm->getValue("x_Name");
        if (!$this->Name->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Name->Visible = false; // Disable update for API request
            } else {
                $this->Name->setFormValue($val);
            }
        }

        // Check field name 'ARTCycle' first before field var 'x_ARTCycle'
        $val = $CurrentForm->hasValue("ARTCycle") ? $CurrentForm->getValue("ARTCycle") : $CurrentForm->getValue("x_ARTCycle");
        if (!$this->ARTCycle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ARTCycle->Visible = false; // Disable update for API request
            } else {
                $this->ARTCycle->setFormValue($val);
            }
        }

        // Check field name 'Consultant' first before field var 'x_Consultant'
        $val = $CurrentForm->hasValue("Consultant") ? $CurrentForm->getValue("Consultant") : $CurrentForm->getValue("x_Consultant");
        if (!$this->Consultant->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Consultant->Visible = false; // Disable update for API request
            } else {
                $this->Consultant->setFormValue($val);
            }
        }

        // Check field name 'TotalDoseOfStimulation' first before field var 'x_TotalDoseOfStimulation'
        $val = $CurrentForm->hasValue("TotalDoseOfStimulation") ? $CurrentForm->getValue("TotalDoseOfStimulation") : $CurrentForm->getValue("x_TotalDoseOfStimulation");
        if (!$this->TotalDoseOfStimulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalDoseOfStimulation->Visible = false; // Disable update for API request
            } else {
                $this->TotalDoseOfStimulation->setFormValue($val);
            }
        }

        // Check field name 'Protocol' first before field var 'x_Protocol'
        $val = $CurrentForm->hasValue("Protocol") ? $CurrentForm->getValue("Protocol") : $CurrentForm->getValue("x_Protocol");
        if (!$this->Protocol->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Protocol->Visible = false; // Disable update for API request
            } else {
                $this->Protocol->setFormValue($val);
            }
        }

        // Check field name 'NumberOfDaysOfStimulation' first before field var 'x_NumberOfDaysOfStimulation'
        $val = $CurrentForm->hasValue("NumberOfDaysOfStimulation") ? $CurrentForm->getValue("NumberOfDaysOfStimulation") : $CurrentForm->getValue("x_NumberOfDaysOfStimulation");
        if (!$this->NumberOfDaysOfStimulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NumberOfDaysOfStimulation->Visible = false; // Disable update for API request
            } else {
                $this->NumberOfDaysOfStimulation->setFormValue($val);
            }
        }

        // Check field name 'TriggerDateTime' first before field var 'x_TriggerDateTime'
        $val = $CurrentForm->hasValue("TriggerDateTime") ? $CurrentForm->getValue("TriggerDateTime") : $CurrentForm->getValue("x_TriggerDateTime");
        if (!$this->TriggerDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TriggerDateTime->Visible = false; // Disable update for API request
            } else {
                $this->TriggerDateTime->setFormValue($val);
            }
            $this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
        }

        // Check field name 'OPUDateTime' first before field var 'x_OPUDateTime'
        $val = $CurrentForm->hasValue("OPUDateTime") ? $CurrentForm->getValue("OPUDateTime") : $CurrentForm->getValue("x_OPUDateTime");
        if (!$this->OPUDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OPUDateTime->Visible = false; // Disable update for API request
            } else {
                $this->OPUDateTime->setFormValue($val);
            }
            $this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
        }

        // Check field name 'HoursAfterTrigger' first before field var 'x_HoursAfterTrigger'
        $val = $CurrentForm->hasValue("HoursAfterTrigger") ? $CurrentForm->getValue("HoursAfterTrigger") : $CurrentForm->getValue("x_HoursAfterTrigger");
        if (!$this->HoursAfterTrigger->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HoursAfterTrigger->Visible = false; // Disable update for API request
            } else {
                $this->HoursAfterTrigger->setFormValue($val);
            }
        }

        // Check field name 'SerumE2' first before field var 'x_SerumE2'
        $val = $CurrentForm->hasValue("SerumE2") ? $CurrentForm->getValue("SerumE2") : $CurrentForm->getValue("x_SerumE2");
        if (!$this->SerumE2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SerumE2->Visible = false; // Disable update for API request
            } else {
                $this->SerumE2->setFormValue($val);
            }
        }

        // Check field name 'SerumP4' first before field var 'x_SerumP4'
        $val = $CurrentForm->hasValue("SerumP4") ? $CurrentForm->getValue("SerumP4") : $CurrentForm->getValue("x_SerumP4");
        if (!$this->SerumP4->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SerumP4->Visible = false; // Disable update for API request
            } else {
                $this->SerumP4->setFormValue($val);
            }
        }

        // Check field name 'FORT' first before field var 'x_FORT'
        $val = $CurrentForm->hasValue("FORT") ? $CurrentForm->getValue("FORT") : $CurrentForm->getValue("x_FORT");
        if (!$this->FORT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FORT->Visible = false; // Disable update for API request
            } else {
                $this->FORT->setFormValue($val);
            }
        }

        // Check field name 'ExperctedOocytes' first before field var 'x_ExperctedOocytes'
        $val = $CurrentForm->hasValue("ExperctedOocytes") ? $CurrentForm->getValue("ExperctedOocytes") : $CurrentForm->getValue("x_ExperctedOocytes");
        if (!$this->ExperctedOocytes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ExperctedOocytes->Visible = false; // Disable update for API request
            } else {
                $this->ExperctedOocytes->setFormValue($val);
            }
        }

        // Check field name 'NoOfOocytesRetrieved' first before field var 'x_NoOfOocytesRetrieved'
        $val = $CurrentForm->hasValue("NoOfOocytesRetrieved") ? $CurrentForm->getValue("NoOfOocytesRetrieved") : $CurrentForm->getValue("x_NoOfOocytesRetrieved");
        if (!$this->NoOfOocytesRetrieved->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfOocytesRetrieved->Visible = false; // Disable update for API request
            } else {
                $this->NoOfOocytesRetrieved->setFormValue($val);
            }
        }

        // Check field name 'OocytesRetreivalRate' first before field var 'x_OocytesRetreivalRate'
        $val = $CurrentForm->hasValue("OocytesRetreivalRate") ? $CurrentForm->getValue("OocytesRetreivalRate") : $CurrentForm->getValue("x_OocytesRetreivalRate");
        if (!$this->OocytesRetreivalRate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocytesRetreivalRate->Visible = false; // Disable update for API request
            } else {
                $this->OocytesRetreivalRate->setFormValue($val);
            }
        }

        // Check field name 'Anesthesia' first before field var 'x_Anesthesia'
        $val = $CurrentForm->hasValue("Anesthesia") ? $CurrentForm->getValue("Anesthesia") : $CurrentForm->getValue("x_Anesthesia");
        if (!$this->Anesthesia->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Anesthesia->Visible = false; // Disable update for API request
            } else {
                $this->Anesthesia->setFormValue($val);
            }
        }

        // Check field name 'TrialCannulation' first before field var 'x_TrialCannulation'
        $val = $CurrentForm->hasValue("TrialCannulation") ? $CurrentForm->getValue("TrialCannulation") : $CurrentForm->getValue("x_TrialCannulation");
        if (!$this->TrialCannulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TrialCannulation->Visible = false; // Disable update for API request
            } else {
                $this->TrialCannulation->setFormValue($val);
            }
        }

        // Check field name 'UCL' first before field var 'x_UCL'
        $val = $CurrentForm->hasValue("UCL") ? $CurrentForm->getValue("UCL") : $CurrentForm->getValue("x_UCL");
        if (!$this->UCL->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UCL->Visible = false; // Disable update for API request
            } else {
                $this->UCL->setFormValue($val);
            }
        }

        // Check field name 'Angle' first before field var 'x_Angle'
        $val = $CurrentForm->hasValue("Angle") ? $CurrentForm->getValue("Angle") : $CurrentForm->getValue("x_Angle");
        if (!$this->Angle->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Angle->Visible = false; // Disable update for API request
            } else {
                $this->Angle->setFormValue($val);
            }
        }

        // Check field name 'EMS' first before field var 'x_EMS'
        $val = $CurrentForm->hasValue("EMS") ? $CurrentForm->getValue("EMS") : $CurrentForm->getValue("x_EMS");
        if (!$this->EMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EMS->Visible = false; // Disable update for API request
            } else {
                $this->EMS->setFormValue($val);
            }
        }

        // Check field name 'Cannulation' first before field var 'x_Cannulation'
        $val = $CurrentForm->hasValue("Cannulation") ? $CurrentForm->getValue("Cannulation") : $CurrentForm->getValue("x_Cannulation");
        if (!$this->Cannulation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Cannulation->Visible = false; // Disable update for API request
            } else {
                $this->Cannulation->setFormValue($val);
            }
        }

        // Check field name 'ProcedureT' first before field var 'x_ProcedureT'
        $val = $CurrentForm->hasValue("ProcedureT") ? $CurrentForm->getValue("ProcedureT") : $CurrentForm->getValue("x_ProcedureT");
        if (!$this->ProcedureT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureT->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureT->setFormValue($val);
            }
        }

        // Check field name 'NoOfOocytesRetrievedd' first before field var 'x_NoOfOocytesRetrievedd'
        $val = $CurrentForm->hasValue("NoOfOocytesRetrievedd") ? $CurrentForm->getValue("NoOfOocytesRetrievedd") : $CurrentForm->getValue("x_NoOfOocytesRetrievedd");
        if (!$this->NoOfOocytesRetrievedd->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoOfOocytesRetrievedd->Visible = false; // Disable update for API request
            } else {
                $this->NoOfOocytesRetrievedd->setFormValue($val);
            }
        }

        // Check field name 'CourseInHospital' first before field var 'x_CourseInHospital'
        $val = $CurrentForm->hasValue("CourseInHospital") ? $CurrentForm->getValue("CourseInHospital") : $CurrentForm->getValue("x_CourseInHospital");
        if (!$this->CourseInHospital->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CourseInHospital->Visible = false; // Disable update for API request
            } else {
                $this->CourseInHospital->setFormValue($val);
            }
        }

        // Check field name 'DischargeAdvise' first before field var 'x_DischargeAdvise'
        $val = $CurrentForm->hasValue("DischargeAdvise") ? $CurrentForm->getValue("DischargeAdvise") : $CurrentForm->getValue("x_DischargeAdvise");
        if (!$this->DischargeAdvise->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DischargeAdvise->Visible = false; // Disable update for API request
            } else {
                $this->DischargeAdvise->setFormValue($val);
            }
        }

        // Check field name 'FollowUpAdvise' first before field var 'x_FollowUpAdvise'
        $val = $CurrentForm->hasValue("FollowUpAdvise") ? $CurrentForm->getValue("FollowUpAdvise") : $CurrentForm->getValue("x_FollowUpAdvise");
        if (!$this->FollowUpAdvise->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->FollowUpAdvise->Visible = false; // Disable update for API request
            } else {
                $this->FollowUpAdvise->setFormValue($val);
            }
        }

        // Check field name 'PlanT' first before field var 'x_PlanT'
        $val = $CurrentForm->hasValue("PlanT") ? $CurrentForm->getValue("PlanT") : $CurrentForm->getValue("x_PlanT");
        if (!$this->PlanT->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PlanT->Visible = false; // Disable update for API request
            } else {
                $this->PlanT->setFormValue($val);
            }
        }

        // Check field name 'ReviewDate' first before field var 'x_ReviewDate'
        $val = $CurrentForm->hasValue("ReviewDate") ? $CurrentForm->getValue("ReviewDate") : $CurrentForm->getValue("x_ReviewDate");
        if (!$this->ReviewDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReviewDate->Visible = false; // Disable update for API request
            } else {
                $this->ReviewDate->setFormValue($val);
            }
            $this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
        }

        // Check field name 'ReviewDoctor' first before field var 'x_ReviewDoctor'
        $val = $CurrentForm->hasValue("ReviewDoctor") ? $CurrentForm->getValue("ReviewDoctor") : $CurrentForm->getValue("x_ReviewDoctor");
        if (!$this->ReviewDoctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ReviewDoctor->Visible = false; // Disable update for API request
            } else {
                $this->ReviewDoctor->setFormValue($val);
            }
        }

        // Check field name 'TemplateProcedure' first before field var 'x_TemplateProcedure'
        $val = $CurrentForm->hasValue("TemplateProcedure") ? $CurrentForm->getValue("TemplateProcedure") : $CurrentForm->getValue("x_TemplateProcedure");
        if (!$this->TemplateProcedure->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateProcedure->Visible = false; // Disable update for API request
            } else {
                $this->TemplateProcedure->setFormValue($val);
            }
        }

        // Check field name 'TemplateCourseInHospital' first before field var 'x_TemplateCourseInHospital'
        $val = $CurrentForm->hasValue("TemplateCourseInHospital") ? $CurrentForm->getValue("TemplateCourseInHospital") : $CurrentForm->getValue("x_TemplateCourseInHospital");
        if (!$this->TemplateCourseInHospital->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateCourseInHospital->Visible = false; // Disable update for API request
            } else {
                $this->TemplateCourseInHospital->setFormValue($val);
            }
        }

        // Check field name 'TemplateDischargeAdvise' first before field var 'x_TemplateDischargeAdvise'
        $val = $CurrentForm->hasValue("TemplateDischargeAdvise") ? $CurrentForm->getValue("TemplateDischargeAdvise") : $CurrentForm->getValue("x_TemplateDischargeAdvise");
        if (!$this->TemplateDischargeAdvise->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateDischargeAdvise->Visible = false; // Disable update for API request
            } else {
                $this->TemplateDischargeAdvise->setFormValue($val);
            }
        }

        // Check field name 'TemplateFollowUpAdvise' first before field var 'x_TemplateFollowUpAdvise'
        $val = $CurrentForm->hasValue("TemplateFollowUpAdvise") ? $CurrentForm->getValue("TemplateFollowUpAdvise") : $CurrentForm->getValue("x_TemplateFollowUpAdvise");
        if (!$this->TemplateFollowUpAdvise->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateFollowUpAdvise->Visible = false; // Disable update for API request
            } else {
                $this->TemplateFollowUpAdvise->setFormValue($val);
            }
        }

        // Check field name 'TidNo' first before field var 'x_TidNo'
        $val = $CurrentForm->hasValue("TidNo") ? $CurrentForm->getValue("TidNo") : $CurrentForm->getValue("x_TidNo");
        if (!$this->TidNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TidNo->Visible = false; // Disable update for API request
            } else {
                $this->TidNo->setFormValue($val);
            }
        }

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        $this->RIDNo->CurrentValue = $this->RIDNo->FormValue;
        $this->Name->CurrentValue = $this->Name->FormValue;
        $this->ARTCycle->CurrentValue = $this->ARTCycle->FormValue;
        $this->Consultant->CurrentValue = $this->Consultant->FormValue;
        $this->TotalDoseOfStimulation->CurrentValue = $this->TotalDoseOfStimulation->FormValue;
        $this->Protocol->CurrentValue = $this->Protocol->FormValue;
        $this->NumberOfDaysOfStimulation->CurrentValue = $this->NumberOfDaysOfStimulation->FormValue;
        $this->TriggerDateTime->CurrentValue = $this->TriggerDateTime->FormValue;
        $this->TriggerDateTime->CurrentValue = UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0);
        $this->OPUDateTime->CurrentValue = $this->OPUDateTime->FormValue;
        $this->OPUDateTime->CurrentValue = UnFormatDateTime($this->OPUDateTime->CurrentValue, 0);
        $this->HoursAfterTrigger->CurrentValue = $this->HoursAfterTrigger->FormValue;
        $this->SerumE2->CurrentValue = $this->SerumE2->FormValue;
        $this->SerumP4->CurrentValue = $this->SerumP4->FormValue;
        $this->FORT->CurrentValue = $this->FORT->FormValue;
        $this->ExperctedOocytes->CurrentValue = $this->ExperctedOocytes->FormValue;
        $this->NoOfOocytesRetrieved->CurrentValue = $this->NoOfOocytesRetrieved->FormValue;
        $this->OocytesRetreivalRate->CurrentValue = $this->OocytesRetreivalRate->FormValue;
        $this->Anesthesia->CurrentValue = $this->Anesthesia->FormValue;
        $this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
        $this->UCL->CurrentValue = $this->UCL->FormValue;
        $this->Angle->CurrentValue = $this->Angle->FormValue;
        $this->EMS->CurrentValue = $this->EMS->FormValue;
        $this->Cannulation->CurrentValue = $this->Cannulation->FormValue;
        $this->ProcedureT->CurrentValue = $this->ProcedureT->FormValue;
        $this->NoOfOocytesRetrievedd->CurrentValue = $this->NoOfOocytesRetrievedd->FormValue;
        $this->CourseInHospital->CurrentValue = $this->CourseInHospital->FormValue;
        $this->DischargeAdvise->CurrentValue = $this->DischargeAdvise->FormValue;
        $this->FollowUpAdvise->CurrentValue = $this->FollowUpAdvise->FormValue;
        $this->PlanT->CurrentValue = $this->PlanT->FormValue;
        $this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
        $this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
        $this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
        $this->TemplateProcedure->CurrentValue = $this->TemplateProcedure->FormValue;
        $this->TemplateCourseInHospital->CurrentValue = $this->TemplateCourseInHospital->FormValue;
        $this->TemplateDischargeAdvise->CurrentValue = $this->TemplateDischargeAdvise->FormValue;
        $this->TemplateFollowUpAdvise->CurrentValue = $this->TemplateFollowUpAdvise->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
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
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Name->setDbValue($row['Name']);
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Consultant->setDbValue($row['Consultant']);
        $this->TotalDoseOfStimulation->setDbValue($row['TotalDoseOfStimulation']);
        $this->Protocol->setDbValue($row['Protocol']);
        $this->NumberOfDaysOfStimulation->setDbValue($row['NumberOfDaysOfStimulation']);
        $this->TriggerDateTime->setDbValue($row['TriggerDateTime']);
        $this->OPUDateTime->setDbValue($row['OPUDateTime']);
        $this->HoursAfterTrigger->setDbValue($row['HoursAfterTrigger']);
        $this->SerumE2->setDbValue($row['SerumE2']);
        $this->SerumP4->setDbValue($row['SerumP4']);
        $this->FORT->setDbValue($row['FORT']);
        $this->ExperctedOocytes->setDbValue($row['ExperctedOocytes']);
        $this->NoOfOocytesRetrieved->setDbValue($row['NoOfOocytesRetrieved']);
        $this->OocytesRetreivalRate->setDbValue($row['OocytesRetreivalRate']);
        $this->Anesthesia->setDbValue($row['Anesthesia']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->UCL->setDbValue($row['UCL']);
        $this->Angle->setDbValue($row['Angle']);
        $this->EMS->setDbValue($row['EMS']);
        $this->Cannulation->setDbValue($row['Cannulation']);
        $this->ProcedureT->setDbValue($row['ProcedureT']);
        $this->NoOfOocytesRetrievedd->setDbValue($row['NoOfOocytesRetrievedd']);
        $this->CourseInHospital->setDbValue($row['CourseInHospital']);
        $this->DischargeAdvise->setDbValue($row['DischargeAdvise']);
        $this->FollowUpAdvise->setDbValue($row['FollowUpAdvise']);
        $this->PlanT->setDbValue($row['PlanT']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TemplateProcedure->setDbValue($row['TemplateProcedure']);
        $this->TemplateCourseInHospital->setDbValue($row['TemplateCourseInHospital']);
        $this->TemplateDischargeAdvise->setDbValue($row['TemplateDischargeAdvise']);
        $this->TemplateFollowUpAdvise->setDbValue($row['TemplateFollowUpAdvise']);
        $this->TidNo->setDbValue($row['TidNo']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNo'] = $this->RIDNo->CurrentValue;
        $row['Name'] = $this->Name->CurrentValue;
        $row['ARTCycle'] = $this->ARTCycle->CurrentValue;
        $row['Consultant'] = $this->Consultant->CurrentValue;
        $row['TotalDoseOfStimulation'] = $this->TotalDoseOfStimulation->CurrentValue;
        $row['Protocol'] = $this->Protocol->CurrentValue;
        $row['NumberOfDaysOfStimulation'] = $this->NumberOfDaysOfStimulation->CurrentValue;
        $row['TriggerDateTime'] = $this->TriggerDateTime->CurrentValue;
        $row['OPUDateTime'] = $this->OPUDateTime->CurrentValue;
        $row['HoursAfterTrigger'] = $this->HoursAfterTrigger->CurrentValue;
        $row['SerumE2'] = $this->SerumE2->CurrentValue;
        $row['SerumP4'] = $this->SerumP4->CurrentValue;
        $row['FORT'] = $this->FORT->CurrentValue;
        $row['ExperctedOocytes'] = $this->ExperctedOocytes->CurrentValue;
        $row['NoOfOocytesRetrieved'] = $this->NoOfOocytesRetrieved->CurrentValue;
        $row['OocytesRetreivalRate'] = $this->OocytesRetreivalRate->CurrentValue;
        $row['Anesthesia'] = $this->Anesthesia->CurrentValue;
        $row['TrialCannulation'] = $this->TrialCannulation->CurrentValue;
        $row['UCL'] = $this->UCL->CurrentValue;
        $row['Angle'] = $this->Angle->CurrentValue;
        $row['EMS'] = $this->EMS->CurrentValue;
        $row['Cannulation'] = $this->Cannulation->CurrentValue;
        $row['ProcedureT'] = $this->ProcedureT->CurrentValue;
        $row['NoOfOocytesRetrievedd'] = $this->NoOfOocytesRetrievedd->CurrentValue;
        $row['CourseInHospital'] = $this->CourseInHospital->CurrentValue;
        $row['DischargeAdvise'] = $this->DischargeAdvise->CurrentValue;
        $row['FollowUpAdvise'] = $this->FollowUpAdvise->CurrentValue;
        $row['PlanT'] = $this->PlanT->CurrentValue;
        $row['ReviewDate'] = $this->ReviewDate->CurrentValue;
        $row['ReviewDoctor'] = $this->ReviewDoctor->CurrentValue;
        $row['TemplateProcedure'] = $this->TemplateProcedure->CurrentValue;
        $row['TemplateCourseInHospital'] = $this->TemplateCourseInHospital->CurrentValue;
        $row['TemplateDischargeAdvise'] = $this->TemplateDischargeAdvise->CurrentValue;
        $row['TemplateFollowUpAdvise'] = $this->TemplateFollowUpAdvise->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
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

        // RIDNo

        // Name

        // ARTCycle

        // Consultant

        // TotalDoseOfStimulation

        // Protocol

        // NumberOfDaysOfStimulation

        // TriggerDateTime

        // OPUDateTime

        // HoursAfterTrigger

        // SerumE2

        // SerumP4

        // FORT

        // ExperctedOocytes

        // NoOfOocytesRetrieved

        // OocytesRetreivalRate

        // Anesthesia

        // TrialCannulation

        // UCL

        // Angle

        // EMS

        // Cannulation

        // ProcedureT

        // NoOfOocytesRetrievedd

        // CourseInHospital

        // DischargeAdvise

        // FollowUpAdvise

        // PlanT

        // ReviewDate

        // ReviewDoctor

        // TemplateProcedure

        // TemplateCourseInHospital

        // TemplateDischargeAdvise

        // TemplateFollowUpAdvise

        // TidNo
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->ViewValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->ViewValue = $this->TotalDoseOfStimulation->CurrentValue;
            $this->TotalDoseOfStimulation->ViewCustomAttributes = "";

            // Protocol
            if (strval($this->Protocol->CurrentValue) != "") {
                $this->Protocol->ViewValue = $this->Protocol->optionCaption($this->Protocol->CurrentValue);
            } else {
                $this->Protocol->ViewValue = null;
            }
            $this->Protocol->ViewCustomAttributes = "";

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->ViewValue = $this->NumberOfDaysOfStimulation->CurrentValue;
            $this->NumberOfDaysOfStimulation->ViewCustomAttributes = "";

            // TriggerDateTime
            $this->TriggerDateTime->ViewValue = $this->TriggerDateTime->CurrentValue;
            $this->TriggerDateTime->ViewValue = FormatDateTime($this->TriggerDateTime->ViewValue, 0);
            $this->TriggerDateTime->ViewCustomAttributes = "";

            // OPUDateTime
            $this->OPUDateTime->ViewValue = $this->OPUDateTime->CurrentValue;
            $this->OPUDateTime->ViewValue = FormatDateTime($this->OPUDateTime->ViewValue, 0);
            $this->OPUDateTime->ViewCustomAttributes = "";

            // HoursAfterTrigger
            $this->HoursAfterTrigger->ViewValue = $this->HoursAfterTrigger->CurrentValue;
            $this->HoursAfterTrigger->ViewCustomAttributes = "";

            // SerumE2
            $this->SerumE2->ViewValue = $this->SerumE2->CurrentValue;
            $this->SerumE2->ViewCustomAttributes = "";

            // SerumP4
            $this->SerumP4->ViewValue = $this->SerumP4->CurrentValue;
            $this->SerumP4->ViewCustomAttributes = "";

            // FORT
            $this->FORT->ViewValue = $this->FORT->CurrentValue;
            $this->FORT->ViewCustomAttributes = "";

            // ExperctedOocytes
            $this->ExperctedOocytes->ViewValue = $this->ExperctedOocytes->CurrentValue;
            $this->ExperctedOocytes->ViewCustomAttributes = "";

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->ViewValue = $this->NoOfOocytesRetrieved->CurrentValue;
            $this->NoOfOocytesRetrieved->ViewCustomAttributes = "";

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->ViewValue = $this->OocytesRetreivalRate->CurrentValue;
            $this->OocytesRetreivalRate->ViewCustomAttributes = "";

            // Anesthesia
            $this->Anesthesia->ViewValue = $this->Anesthesia->CurrentValue;
            $this->Anesthesia->ViewCustomAttributes = "";

            // TrialCannulation
            $this->TrialCannulation->ViewValue = $this->TrialCannulation->CurrentValue;
            $this->TrialCannulation->ViewCustomAttributes = "";

            // UCL
            $this->UCL->ViewValue = $this->UCL->CurrentValue;
            $this->UCL->ViewCustomAttributes = "";

            // Angle
            $this->Angle->ViewValue = $this->Angle->CurrentValue;
            $this->Angle->ViewCustomAttributes = "";

            // EMS
            $this->EMS->ViewValue = $this->EMS->CurrentValue;
            $this->EMS->ViewCustomAttributes = "";

            // Cannulation
            if (strval($this->Cannulation->CurrentValue) != "") {
                $this->Cannulation->ViewValue = $this->Cannulation->optionCaption($this->Cannulation->CurrentValue);
            } else {
                $this->Cannulation->ViewValue = null;
            }
            $this->Cannulation->ViewCustomAttributes = "";

            // ProcedureT
            $this->ProcedureT->ViewValue = $this->ProcedureT->CurrentValue;
            $this->ProcedureT->ViewCustomAttributes = "";

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->ViewValue = $this->NoOfOocytesRetrievedd->CurrentValue;
            $this->NoOfOocytesRetrievedd->ViewCustomAttributes = "";

            // CourseInHospital
            $this->CourseInHospital->ViewValue = $this->CourseInHospital->CurrentValue;
            $this->CourseInHospital->ViewCustomAttributes = "";

            // DischargeAdvise
            $this->DischargeAdvise->ViewValue = $this->DischargeAdvise->CurrentValue;
            $this->DischargeAdvise->ViewCustomAttributes = "";

            // FollowUpAdvise
            $this->FollowUpAdvise->ViewValue = $this->FollowUpAdvise->CurrentValue;
            $this->FollowUpAdvise->ViewCustomAttributes = "";

            // PlanT
            if (strval($this->PlanT->CurrentValue) != "") {
                $this->PlanT->ViewValue = $this->PlanT->optionCaption($this->PlanT->CurrentValue);
            } else {
                $this->PlanT->ViewValue = null;
            }
            $this->PlanT->ViewCustomAttributes = "";

            // ReviewDate
            $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
            $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
            $this->ReviewDate->ViewCustomAttributes = "";

            // ReviewDoctor
            $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
            $this->ReviewDoctor->ViewCustomAttributes = "";

            // TemplateProcedure
            $curVal = trim(strval($this->TemplateProcedure->CurrentValue));
            if ($curVal != "") {
                $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
                if ($this->TemplateProcedure->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Procedure'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateProcedure->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateProcedure->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->displayValue($arwrk);
                    } else {
                        $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->CurrentValue;
                    }
                }
            } else {
                $this->TemplateProcedure->ViewValue = null;
            }
            $this->TemplateProcedure->ViewCustomAttributes = "";

            // TemplateCourseInHospital
            $curVal = trim(strval($this->TemplateCourseInHospital->CurrentValue));
            if ($curVal != "") {
                $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
                if ($this->TemplateCourseInHospital->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateCourseInHospital->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->displayValue($arwrk);
                    } else {
                        $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->CurrentValue;
                    }
                }
            } else {
                $this->TemplateCourseInHospital->ViewValue = null;
            }
            $this->TemplateCourseInHospital->ViewCustomAttributes = "";

            // TemplateDischargeAdvise
            $curVal = trim(strval($this->TemplateDischargeAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
                if ($this->TemplateDischargeAdvise->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Discharge Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateDischargeAdvise->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->displayValue($arwrk);
                    } else {
                        $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->CurrentValue;
                    }
                }
            } else {
                $this->TemplateDischargeAdvise->ViewValue = null;
            }
            $this->TemplateDischargeAdvise->ViewCustomAttributes = "";

            // TemplateFollowUpAdvise
            $curVal = trim(strval($this->TemplateFollowUpAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
                if ($this->TemplateFollowUpAdvise->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ovum Follow Up Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateFollowUpAdvise->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->displayValue($arwrk);
                    } else {
                        $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->CurrentValue;
                    }
                }
            } else {
                $this->TemplateFollowUpAdvise->ViewValue = null;
            }
            $this->TemplateFollowUpAdvise->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";
            $this->Consultant->TooltipValue = "";

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->LinkCustomAttributes = "";
            $this->TotalDoseOfStimulation->HrefValue = "";
            $this->TotalDoseOfStimulation->TooltipValue = "";

            // Protocol
            $this->Protocol->LinkCustomAttributes = "";
            $this->Protocol->HrefValue = "";
            $this->Protocol->TooltipValue = "";

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
            $this->NumberOfDaysOfStimulation->HrefValue = "";
            $this->NumberOfDaysOfStimulation->TooltipValue = "";

            // TriggerDateTime
            $this->TriggerDateTime->LinkCustomAttributes = "";
            $this->TriggerDateTime->HrefValue = "";
            $this->TriggerDateTime->TooltipValue = "";

            // OPUDateTime
            $this->OPUDateTime->LinkCustomAttributes = "";
            $this->OPUDateTime->HrefValue = "";
            $this->OPUDateTime->TooltipValue = "";

            // HoursAfterTrigger
            $this->HoursAfterTrigger->LinkCustomAttributes = "";
            $this->HoursAfterTrigger->HrefValue = "";
            $this->HoursAfterTrigger->TooltipValue = "";

            // SerumE2
            $this->SerumE2->LinkCustomAttributes = "";
            $this->SerumE2->HrefValue = "";
            $this->SerumE2->TooltipValue = "";

            // SerumP4
            $this->SerumP4->LinkCustomAttributes = "";
            $this->SerumP4->HrefValue = "";
            $this->SerumP4->TooltipValue = "";

            // FORT
            $this->FORT->LinkCustomAttributes = "";
            $this->FORT->HrefValue = "";
            $this->FORT->TooltipValue = "";

            // ExperctedOocytes
            $this->ExperctedOocytes->LinkCustomAttributes = "";
            $this->ExperctedOocytes->HrefValue = "";
            $this->ExperctedOocytes->TooltipValue = "";

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrieved->HrefValue = "";
            $this->NoOfOocytesRetrieved->TooltipValue = "";

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->LinkCustomAttributes = "";
            $this->OocytesRetreivalRate->HrefValue = "";
            $this->OocytesRetreivalRate->TooltipValue = "";

            // Anesthesia
            $this->Anesthesia->LinkCustomAttributes = "";
            $this->Anesthesia->HrefValue = "";
            $this->Anesthesia->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // UCL
            $this->UCL->LinkCustomAttributes = "";
            $this->UCL->HrefValue = "";
            $this->UCL->TooltipValue = "";

            // Angle
            $this->Angle->LinkCustomAttributes = "";
            $this->Angle->HrefValue = "";
            $this->Angle->TooltipValue = "";

            // EMS
            $this->EMS->LinkCustomAttributes = "";
            $this->EMS->HrefValue = "";
            $this->EMS->TooltipValue = "";

            // Cannulation
            $this->Cannulation->LinkCustomAttributes = "";
            $this->Cannulation->HrefValue = "";
            $this->Cannulation->TooltipValue = "";

            // ProcedureT
            $this->ProcedureT->LinkCustomAttributes = "";
            $this->ProcedureT->HrefValue = "";
            $this->ProcedureT->TooltipValue = "";

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrievedd->HrefValue = "";
            $this->NoOfOocytesRetrievedd->TooltipValue = "";

            // CourseInHospital
            $this->CourseInHospital->LinkCustomAttributes = "";
            $this->CourseInHospital->HrefValue = "";
            $this->CourseInHospital->TooltipValue = "";

            // DischargeAdvise
            $this->DischargeAdvise->LinkCustomAttributes = "";
            $this->DischargeAdvise->HrefValue = "";
            $this->DischargeAdvise->TooltipValue = "";

            // FollowUpAdvise
            $this->FollowUpAdvise->LinkCustomAttributes = "";
            $this->FollowUpAdvise->HrefValue = "";
            $this->FollowUpAdvise->TooltipValue = "";

            // PlanT
            $this->PlanT->LinkCustomAttributes = "";
            $this->PlanT->HrefValue = "";
            $this->PlanT->TooltipValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";
            $this->ReviewDate->TooltipValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";
            $this->ReviewDoctor->TooltipValue = "";

            // TemplateProcedure
            $this->TemplateProcedure->LinkCustomAttributes = "";
            $this->TemplateProcedure->HrefValue = "";
            $this->TemplateProcedure->TooltipValue = "";

            // TemplateCourseInHospital
            $this->TemplateCourseInHospital->LinkCustomAttributes = "";
            $this->TemplateCourseInHospital->HrefValue = "";
            $this->TemplateCourseInHospital->TooltipValue = "";

            // TemplateDischargeAdvise
            $this->TemplateDischargeAdvise->LinkCustomAttributes = "";
            $this->TemplateDischargeAdvise->HrefValue = "";
            $this->TemplateDischargeAdvise->TooltipValue = "";

            // TemplateFollowUpAdvise
            $this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
            $this->TemplateFollowUpAdvise->HrefValue = "";
            $this->TemplateFollowUpAdvise->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
            $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            if (!$this->ARTCycle->Raw) {
                $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
            }
            $this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->EditAttrs["class"] = "form-control";
            $this->TotalDoseOfStimulation->EditCustomAttributes = "";
            if (!$this->TotalDoseOfStimulation->Raw) {
                $this->TotalDoseOfStimulation->CurrentValue = HtmlDecode($this->TotalDoseOfStimulation->CurrentValue);
            }
            $this->TotalDoseOfStimulation->EditValue = HtmlEncode($this->TotalDoseOfStimulation->CurrentValue);
            $this->TotalDoseOfStimulation->PlaceHolder = RemoveHtml($this->TotalDoseOfStimulation->caption());

            // Protocol
            $this->Protocol->EditAttrs["class"] = "form-control";
            $this->Protocol->EditCustomAttributes = "";
            $this->Protocol->EditValue = $this->Protocol->options(true);
            $this->Protocol->PlaceHolder = RemoveHtml($this->Protocol->caption());

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->EditAttrs["class"] = "form-control";
            $this->NumberOfDaysOfStimulation->EditCustomAttributes = "";
            if (!$this->NumberOfDaysOfStimulation->Raw) {
                $this->NumberOfDaysOfStimulation->CurrentValue = HtmlDecode($this->NumberOfDaysOfStimulation->CurrentValue);
            }
            $this->NumberOfDaysOfStimulation->EditValue = HtmlEncode($this->NumberOfDaysOfStimulation->CurrentValue);
            $this->NumberOfDaysOfStimulation->PlaceHolder = RemoveHtml($this->NumberOfDaysOfStimulation->caption());

            // TriggerDateTime
            $this->TriggerDateTime->EditAttrs["class"] = "form-control";
            $this->TriggerDateTime->EditCustomAttributes = "";
            $this->TriggerDateTime->EditValue = HtmlEncode(FormatDateTime($this->TriggerDateTime->CurrentValue, 8));
            $this->TriggerDateTime->PlaceHolder = RemoveHtml($this->TriggerDateTime->caption());

            // OPUDateTime
            $this->OPUDateTime->EditAttrs["class"] = "form-control";
            $this->OPUDateTime->EditCustomAttributes = "";
            $this->OPUDateTime->EditValue = HtmlEncode(FormatDateTime($this->OPUDateTime->CurrentValue, 8));
            $this->OPUDateTime->PlaceHolder = RemoveHtml($this->OPUDateTime->caption());

            // HoursAfterTrigger
            $this->HoursAfterTrigger->EditAttrs["class"] = "form-control";
            $this->HoursAfterTrigger->EditCustomAttributes = "";
            if (!$this->HoursAfterTrigger->Raw) {
                $this->HoursAfterTrigger->CurrentValue = HtmlDecode($this->HoursAfterTrigger->CurrentValue);
            }
            $this->HoursAfterTrigger->EditValue = HtmlEncode($this->HoursAfterTrigger->CurrentValue);
            $this->HoursAfterTrigger->PlaceHolder = RemoveHtml($this->HoursAfterTrigger->caption());

            // SerumE2
            $this->SerumE2->EditAttrs["class"] = "form-control";
            $this->SerumE2->EditCustomAttributes = "";
            if (!$this->SerumE2->Raw) {
                $this->SerumE2->CurrentValue = HtmlDecode($this->SerumE2->CurrentValue);
            }
            $this->SerumE2->EditValue = HtmlEncode($this->SerumE2->CurrentValue);
            $this->SerumE2->PlaceHolder = RemoveHtml($this->SerumE2->caption());

            // SerumP4
            $this->SerumP4->EditAttrs["class"] = "form-control";
            $this->SerumP4->EditCustomAttributes = "";
            if (!$this->SerumP4->Raw) {
                $this->SerumP4->CurrentValue = HtmlDecode($this->SerumP4->CurrentValue);
            }
            $this->SerumP4->EditValue = HtmlEncode($this->SerumP4->CurrentValue);
            $this->SerumP4->PlaceHolder = RemoveHtml($this->SerumP4->caption());

            // FORT
            $this->FORT->EditAttrs["class"] = "form-control";
            $this->FORT->EditCustomAttributes = "";
            if (!$this->FORT->Raw) {
                $this->FORT->CurrentValue = HtmlDecode($this->FORT->CurrentValue);
            }
            $this->FORT->EditValue = HtmlEncode($this->FORT->CurrentValue);
            $this->FORT->PlaceHolder = RemoveHtml($this->FORT->caption());

            // ExperctedOocytes
            $this->ExperctedOocytes->EditAttrs["class"] = "form-control";
            $this->ExperctedOocytes->EditCustomAttributes = "";
            if (!$this->ExperctedOocytes->Raw) {
                $this->ExperctedOocytes->CurrentValue = HtmlDecode($this->ExperctedOocytes->CurrentValue);
            }
            $this->ExperctedOocytes->EditValue = HtmlEncode($this->ExperctedOocytes->CurrentValue);
            $this->ExperctedOocytes->PlaceHolder = RemoveHtml($this->ExperctedOocytes->caption());

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->EditAttrs["class"] = "form-control";
            $this->NoOfOocytesRetrieved->EditCustomAttributes = "";
            if (!$this->NoOfOocytesRetrieved->Raw) {
                $this->NoOfOocytesRetrieved->CurrentValue = HtmlDecode($this->NoOfOocytesRetrieved->CurrentValue);
            }
            $this->NoOfOocytesRetrieved->EditValue = HtmlEncode($this->NoOfOocytesRetrieved->CurrentValue);
            $this->NoOfOocytesRetrieved->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrieved->caption());

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->EditAttrs["class"] = "form-control";
            $this->OocytesRetreivalRate->EditCustomAttributes = "";
            if (!$this->OocytesRetreivalRate->Raw) {
                $this->OocytesRetreivalRate->CurrentValue = HtmlDecode($this->OocytesRetreivalRate->CurrentValue);
            }
            $this->OocytesRetreivalRate->EditValue = HtmlEncode($this->OocytesRetreivalRate->CurrentValue);
            $this->OocytesRetreivalRate->PlaceHolder = RemoveHtml($this->OocytesRetreivalRate->caption());

            // Anesthesia
            $this->Anesthesia->EditAttrs["class"] = "form-control";
            $this->Anesthesia->EditCustomAttributes = "";
            if (!$this->Anesthesia->Raw) {
                $this->Anesthesia->CurrentValue = HtmlDecode($this->Anesthesia->CurrentValue);
            }
            $this->Anesthesia->EditValue = HtmlEncode($this->Anesthesia->CurrentValue);
            $this->Anesthesia->PlaceHolder = RemoveHtml($this->Anesthesia->caption());

            // TrialCannulation
            $this->TrialCannulation->EditAttrs["class"] = "form-control";
            $this->TrialCannulation->EditCustomAttributes = "";
            if (!$this->TrialCannulation->Raw) {
                $this->TrialCannulation->CurrentValue = HtmlDecode($this->TrialCannulation->CurrentValue);
            }
            $this->TrialCannulation->EditValue = HtmlEncode($this->TrialCannulation->CurrentValue);
            $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

            // UCL
            $this->UCL->EditAttrs["class"] = "form-control";
            $this->UCL->EditCustomAttributes = "";
            if (!$this->UCL->Raw) {
                $this->UCL->CurrentValue = HtmlDecode($this->UCL->CurrentValue);
            }
            $this->UCL->EditValue = HtmlEncode($this->UCL->CurrentValue);
            $this->UCL->PlaceHolder = RemoveHtml($this->UCL->caption());

            // Angle
            $this->Angle->EditAttrs["class"] = "form-control";
            $this->Angle->EditCustomAttributes = "";
            if (!$this->Angle->Raw) {
                $this->Angle->CurrentValue = HtmlDecode($this->Angle->CurrentValue);
            }
            $this->Angle->EditValue = HtmlEncode($this->Angle->CurrentValue);
            $this->Angle->PlaceHolder = RemoveHtml($this->Angle->caption());

            // EMS
            $this->EMS->EditAttrs["class"] = "form-control";
            $this->EMS->EditCustomAttributes = "";
            if (!$this->EMS->Raw) {
                $this->EMS->CurrentValue = HtmlDecode($this->EMS->CurrentValue);
            }
            $this->EMS->EditValue = HtmlEncode($this->EMS->CurrentValue);
            $this->EMS->PlaceHolder = RemoveHtml($this->EMS->caption());

            // Cannulation
            $this->Cannulation->EditAttrs["class"] = "form-control";
            $this->Cannulation->EditCustomAttributes = "";
            $this->Cannulation->EditValue = $this->Cannulation->options(true);
            $this->Cannulation->PlaceHolder = RemoveHtml($this->Cannulation->caption());

            // ProcedureT
            $this->ProcedureT->EditAttrs["class"] = "form-control";
            $this->ProcedureT->EditCustomAttributes = "";
            $this->ProcedureT->EditValue = HtmlEncode($this->ProcedureT->CurrentValue);
            $this->ProcedureT->PlaceHolder = RemoveHtml($this->ProcedureT->caption());

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->EditAttrs["class"] = "form-control";
            $this->NoOfOocytesRetrievedd->EditCustomAttributes = "";
            if (!$this->NoOfOocytesRetrievedd->Raw) {
                $this->NoOfOocytesRetrievedd->CurrentValue = HtmlDecode($this->NoOfOocytesRetrievedd->CurrentValue);
            }
            $this->NoOfOocytesRetrievedd->EditValue = HtmlEncode($this->NoOfOocytesRetrievedd->CurrentValue);
            $this->NoOfOocytesRetrievedd->PlaceHolder = RemoveHtml($this->NoOfOocytesRetrievedd->caption());

            // CourseInHospital
            $this->CourseInHospital->EditAttrs["class"] = "form-control";
            $this->CourseInHospital->EditCustomAttributes = "";
            $this->CourseInHospital->EditValue = HtmlEncode($this->CourseInHospital->CurrentValue);
            $this->CourseInHospital->PlaceHolder = RemoveHtml($this->CourseInHospital->caption());

            // DischargeAdvise
            $this->DischargeAdvise->EditAttrs["class"] = "form-control";
            $this->DischargeAdvise->EditCustomAttributes = "";
            $this->DischargeAdvise->EditValue = HtmlEncode($this->DischargeAdvise->CurrentValue);
            $this->DischargeAdvise->PlaceHolder = RemoveHtml($this->DischargeAdvise->caption());

            // FollowUpAdvise
            $this->FollowUpAdvise->EditAttrs["class"] = "form-control";
            $this->FollowUpAdvise->EditCustomAttributes = "";
            $this->FollowUpAdvise->EditValue = HtmlEncode($this->FollowUpAdvise->CurrentValue);
            $this->FollowUpAdvise->PlaceHolder = RemoveHtml($this->FollowUpAdvise->caption());

            // PlanT
            $this->PlanT->EditAttrs["class"] = "form-control";
            $this->PlanT->EditCustomAttributes = "";
            $this->PlanT->EditValue = $this->PlanT->options(true);
            $this->PlanT->PlaceHolder = RemoveHtml($this->PlanT->caption());

            // ReviewDate
            $this->ReviewDate->EditAttrs["class"] = "form-control";
            $this->ReviewDate->EditCustomAttributes = "";
            $this->ReviewDate->EditValue = HtmlEncode(FormatDateTime($this->ReviewDate->CurrentValue, 8));
            $this->ReviewDate->PlaceHolder = RemoveHtml($this->ReviewDate->caption());

            // ReviewDoctor
            $this->ReviewDoctor->EditAttrs["class"] = "form-control";
            $this->ReviewDoctor->EditCustomAttributes = "";
            if (!$this->ReviewDoctor->Raw) {
                $this->ReviewDoctor->CurrentValue = HtmlDecode($this->ReviewDoctor->CurrentValue);
            }
            $this->ReviewDoctor->EditValue = HtmlEncode($this->ReviewDoctor->CurrentValue);
            $this->ReviewDoctor->PlaceHolder = RemoveHtml($this->ReviewDoctor->caption());

            // TemplateProcedure
            $this->TemplateProcedure->EditAttrs["class"] = "form-control";
            $this->TemplateProcedure->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateProcedure->CurrentValue));
            if ($curVal != "") {
                $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->lookupCacheOption($curVal);
            } else {
                $this->TemplateProcedure->ViewValue = $this->TemplateProcedure->Lookup !== null && is_array($this->TemplateProcedure->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateProcedure->ViewValue !== null) { // Load from cache
                $this->TemplateProcedure->EditValue = array_values($this->TemplateProcedure->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateProcedure->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ovum Procedure'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateProcedure->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateProcedure->EditValue = $arwrk;
            }
            $this->TemplateProcedure->PlaceHolder = RemoveHtml($this->TemplateProcedure->caption());

            // TemplateCourseInHospital
            $this->TemplateCourseInHospital->EditAttrs["class"] = "form-control";
            $this->TemplateCourseInHospital->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateCourseInHospital->CurrentValue));
            if ($curVal != "") {
                $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->lookupCacheOption($curVal);
            } else {
                $this->TemplateCourseInHospital->ViewValue = $this->TemplateCourseInHospital->Lookup !== null && is_array($this->TemplateCourseInHospital->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateCourseInHospital->ViewValue !== null) { // Load from cache
                $this->TemplateCourseInHospital->EditValue = array_values($this->TemplateCourseInHospital->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateCourseInHospital->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ovum Course In Hospital'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateCourseInHospital->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateCourseInHospital->EditValue = $arwrk;
            }
            $this->TemplateCourseInHospital->PlaceHolder = RemoveHtml($this->TemplateCourseInHospital->caption());

            // TemplateDischargeAdvise
            $this->TemplateDischargeAdvise->EditAttrs["class"] = "form-control";
            $this->TemplateDischargeAdvise->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateDischargeAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->lookupCacheOption($curVal);
            } else {
                $this->TemplateDischargeAdvise->ViewValue = $this->TemplateDischargeAdvise->Lookup !== null && is_array($this->TemplateDischargeAdvise->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateDischargeAdvise->ViewValue !== null) { // Load from cache
                $this->TemplateDischargeAdvise->EditValue = array_values($this->TemplateDischargeAdvise->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateDischargeAdvise->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ovum Discharge Advise'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateDischargeAdvise->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateDischargeAdvise->EditValue = $arwrk;
            }
            $this->TemplateDischargeAdvise->PlaceHolder = RemoveHtml($this->TemplateDischargeAdvise->caption());

            // TemplateFollowUpAdvise
            $this->TemplateFollowUpAdvise->EditAttrs["class"] = "form-control";
            $this->TemplateFollowUpAdvise->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateFollowUpAdvise->CurrentValue));
            if ($curVal != "") {
                $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->lookupCacheOption($curVal);
            } else {
                $this->TemplateFollowUpAdvise->ViewValue = $this->TemplateFollowUpAdvise->Lookup !== null && is_array($this->TemplateFollowUpAdvise->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateFollowUpAdvise->ViewValue !== null) { // Load from cache
                $this->TemplateFollowUpAdvise->EditValue = array_values($this->TemplateFollowUpAdvise->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateFollowUpAdvise->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ovum Follow Up Advise'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateFollowUpAdvise->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateFollowUpAdvise->EditValue = $arwrk;
            }
            $this->TemplateFollowUpAdvise->PlaceHolder = RemoveHtml($this->TemplateFollowUpAdvise->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // Add refer script

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";

            // Consultant
            $this->Consultant->LinkCustomAttributes = "";
            $this->Consultant->HrefValue = "";

            // TotalDoseOfStimulation
            $this->TotalDoseOfStimulation->LinkCustomAttributes = "";
            $this->TotalDoseOfStimulation->HrefValue = "";

            // Protocol
            $this->Protocol->LinkCustomAttributes = "";
            $this->Protocol->HrefValue = "";

            // NumberOfDaysOfStimulation
            $this->NumberOfDaysOfStimulation->LinkCustomAttributes = "";
            $this->NumberOfDaysOfStimulation->HrefValue = "";

            // TriggerDateTime
            $this->TriggerDateTime->LinkCustomAttributes = "";
            $this->TriggerDateTime->HrefValue = "";

            // OPUDateTime
            $this->OPUDateTime->LinkCustomAttributes = "";
            $this->OPUDateTime->HrefValue = "";

            // HoursAfterTrigger
            $this->HoursAfterTrigger->LinkCustomAttributes = "";
            $this->HoursAfterTrigger->HrefValue = "";

            // SerumE2
            $this->SerumE2->LinkCustomAttributes = "";
            $this->SerumE2->HrefValue = "";

            // SerumP4
            $this->SerumP4->LinkCustomAttributes = "";
            $this->SerumP4->HrefValue = "";

            // FORT
            $this->FORT->LinkCustomAttributes = "";
            $this->FORT->HrefValue = "";

            // ExperctedOocytes
            $this->ExperctedOocytes->LinkCustomAttributes = "";
            $this->ExperctedOocytes->HrefValue = "";

            // NoOfOocytesRetrieved
            $this->NoOfOocytesRetrieved->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrieved->HrefValue = "";

            // OocytesRetreivalRate
            $this->OocytesRetreivalRate->LinkCustomAttributes = "";
            $this->OocytesRetreivalRate->HrefValue = "";

            // Anesthesia
            $this->Anesthesia->LinkCustomAttributes = "";
            $this->Anesthesia->HrefValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";

            // UCL
            $this->UCL->LinkCustomAttributes = "";
            $this->UCL->HrefValue = "";

            // Angle
            $this->Angle->LinkCustomAttributes = "";
            $this->Angle->HrefValue = "";

            // EMS
            $this->EMS->LinkCustomAttributes = "";
            $this->EMS->HrefValue = "";

            // Cannulation
            $this->Cannulation->LinkCustomAttributes = "";
            $this->Cannulation->HrefValue = "";

            // ProcedureT
            $this->ProcedureT->LinkCustomAttributes = "";
            $this->ProcedureT->HrefValue = "";

            // NoOfOocytesRetrievedd
            $this->NoOfOocytesRetrievedd->LinkCustomAttributes = "";
            $this->NoOfOocytesRetrievedd->HrefValue = "";

            // CourseInHospital
            $this->CourseInHospital->LinkCustomAttributes = "";
            $this->CourseInHospital->HrefValue = "";

            // DischargeAdvise
            $this->DischargeAdvise->LinkCustomAttributes = "";
            $this->DischargeAdvise->HrefValue = "";

            // FollowUpAdvise
            $this->FollowUpAdvise->LinkCustomAttributes = "";
            $this->FollowUpAdvise->HrefValue = "";

            // PlanT
            $this->PlanT->LinkCustomAttributes = "";
            $this->PlanT->HrefValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";

            // TemplateProcedure
            $this->TemplateProcedure->LinkCustomAttributes = "";
            $this->TemplateProcedure->HrefValue = "";

            // TemplateCourseInHospital
            $this->TemplateCourseInHospital->LinkCustomAttributes = "";
            $this->TemplateCourseInHospital->HrefValue = "";

            // TemplateDischargeAdvise
            $this->TemplateDischargeAdvise->LinkCustomAttributes = "";
            $this->TemplateDischargeAdvise->HrefValue = "";

            // TemplateFollowUpAdvise
            $this->TemplateFollowUpAdvise->LinkCustomAttributes = "";
            $this->TemplateFollowUpAdvise->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
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
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->Name->Required) {
            if (!$this->Name->IsDetailKey && EmptyValue($this->Name->FormValue)) {
                $this->Name->addErrorMessage(str_replace("%s", $this->Name->caption(), $this->Name->RequiredErrorMessage));
            }
        }
        if ($this->ARTCycle->Required) {
            if (!$this->ARTCycle->IsDetailKey && EmptyValue($this->ARTCycle->FormValue)) {
                $this->ARTCycle->addErrorMessage(str_replace("%s", $this->ARTCycle->caption(), $this->ARTCycle->RequiredErrorMessage));
            }
        }
        if ($this->Consultant->Required) {
            if (!$this->Consultant->IsDetailKey && EmptyValue($this->Consultant->FormValue)) {
                $this->Consultant->addErrorMessage(str_replace("%s", $this->Consultant->caption(), $this->Consultant->RequiredErrorMessage));
            }
        }
        if ($this->TotalDoseOfStimulation->Required) {
            if (!$this->TotalDoseOfStimulation->IsDetailKey && EmptyValue($this->TotalDoseOfStimulation->FormValue)) {
                $this->TotalDoseOfStimulation->addErrorMessage(str_replace("%s", $this->TotalDoseOfStimulation->caption(), $this->TotalDoseOfStimulation->RequiredErrorMessage));
            }
        }
        if ($this->Protocol->Required) {
            if (!$this->Protocol->IsDetailKey && EmptyValue($this->Protocol->FormValue)) {
                $this->Protocol->addErrorMessage(str_replace("%s", $this->Protocol->caption(), $this->Protocol->RequiredErrorMessage));
            }
        }
        if ($this->NumberOfDaysOfStimulation->Required) {
            if (!$this->NumberOfDaysOfStimulation->IsDetailKey && EmptyValue($this->NumberOfDaysOfStimulation->FormValue)) {
                $this->NumberOfDaysOfStimulation->addErrorMessage(str_replace("%s", $this->NumberOfDaysOfStimulation->caption(), $this->NumberOfDaysOfStimulation->RequiredErrorMessage));
            }
        }
        if ($this->TriggerDateTime->Required) {
            if (!$this->TriggerDateTime->IsDetailKey && EmptyValue($this->TriggerDateTime->FormValue)) {
                $this->TriggerDateTime->addErrorMessage(str_replace("%s", $this->TriggerDateTime->caption(), $this->TriggerDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->TriggerDateTime->FormValue)) {
            $this->TriggerDateTime->addErrorMessage($this->TriggerDateTime->getErrorMessage(false));
        }
        if ($this->OPUDateTime->Required) {
            if (!$this->OPUDateTime->IsDetailKey && EmptyValue($this->OPUDateTime->FormValue)) {
                $this->OPUDateTime->addErrorMessage(str_replace("%s", $this->OPUDateTime->caption(), $this->OPUDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->OPUDateTime->FormValue)) {
            $this->OPUDateTime->addErrorMessage($this->OPUDateTime->getErrorMessage(false));
        }
        if ($this->HoursAfterTrigger->Required) {
            if (!$this->HoursAfterTrigger->IsDetailKey && EmptyValue($this->HoursAfterTrigger->FormValue)) {
                $this->HoursAfterTrigger->addErrorMessage(str_replace("%s", $this->HoursAfterTrigger->caption(), $this->HoursAfterTrigger->RequiredErrorMessage));
            }
        }
        if ($this->SerumE2->Required) {
            if (!$this->SerumE2->IsDetailKey && EmptyValue($this->SerumE2->FormValue)) {
                $this->SerumE2->addErrorMessage(str_replace("%s", $this->SerumE2->caption(), $this->SerumE2->RequiredErrorMessage));
            }
        }
        if ($this->SerumP4->Required) {
            if (!$this->SerumP4->IsDetailKey && EmptyValue($this->SerumP4->FormValue)) {
                $this->SerumP4->addErrorMessage(str_replace("%s", $this->SerumP4->caption(), $this->SerumP4->RequiredErrorMessage));
            }
        }
        if ($this->FORT->Required) {
            if (!$this->FORT->IsDetailKey && EmptyValue($this->FORT->FormValue)) {
                $this->FORT->addErrorMessage(str_replace("%s", $this->FORT->caption(), $this->FORT->RequiredErrorMessage));
            }
        }
        if ($this->ExperctedOocytes->Required) {
            if (!$this->ExperctedOocytes->IsDetailKey && EmptyValue($this->ExperctedOocytes->FormValue)) {
                $this->ExperctedOocytes->addErrorMessage(str_replace("%s", $this->ExperctedOocytes->caption(), $this->ExperctedOocytes->RequiredErrorMessage));
            }
        }
        if ($this->NoOfOocytesRetrieved->Required) {
            if (!$this->NoOfOocytesRetrieved->IsDetailKey && EmptyValue($this->NoOfOocytesRetrieved->FormValue)) {
                $this->NoOfOocytesRetrieved->addErrorMessage(str_replace("%s", $this->NoOfOocytesRetrieved->caption(), $this->NoOfOocytesRetrieved->RequiredErrorMessage));
            }
        }
        if ($this->OocytesRetreivalRate->Required) {
            if (!$this->OocytesRetreivalRate->IsDetailKey && EmptyValue($this->OocytesRetreivalRate->FormValue)) {
                $this->OocytesRetreivalRate->addErrorMessage(str_replace("%s", $this->OocytesRetreivalRate->caption(), $this->OocytesRetreivalRate->RequiredErrorMessage));
            }
        }
        if ($this->Anesthesia->Required) {
            if (!$this->Anesthesia->IsDetailKey && EmptyValue($this->Anesthesia->FormValue)) {
                $this->Anesthesia->addErrorMessage(str_replace("%s", $this->Anesthesia->caption(), $this->Anesthesia->RequiredErrorMessage));
            }
        }
        if ($this->TrialCannulation->Required) {
            if (!$this->TrialCannulation->IsDetailKey && EmptyValue($this->TrialCannulation->FormValue)) {
                $this->TrialCannulation->addErrorMessage(str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
            }
        }
        if ($this->UCL->Required) {
            if (!$this->UCL->IsDetailKey && EmptyValue($this->UCL->FormValue)) {
                $this->UCL->addErrorMessage(str_replace("%s", $this->UCL->caption(), $this->UCL->RequiredErrorMessage));
            }
        }
        if ($this->Angle->Required) {
            if (!$this->Angle->IsDetailKey && EmptyValue($this->Angle->FormValue)) {
                $this->Angle->addErrorMessage(str_replace("%s", $this->Angle->caption(), $this->Angle->RequiredErrorMessage));
            }
        }
        if ($this->EMS->Required) {
            if (!$this->EMS->IsDetailKey && EmptyValue($this->EMS->FormValue)) {
                $this->EMS->addErrorMessage(str_replace("%s", $this->EMS->caption(), $this->EMS->RequiredErrorMessage));
            }
        }
        if ($this->Cannulation->Required) {
            if (!$this->Cannulation->IsDetailKey && EmptyValue($this->Cannulation->FormValue)) {
                $this->Cannulation->addErrorMessage(str_replace("%s", $this->Cannulation->caption(), $this->Cannulation->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureT->Required) {
            if (!$this->ProcedureT->IsDetailKey && EmptyValue($this->ProcedureT->FormValue)) {
                $this->ProcedureT->addErrorMessage(str_replace("%s", $this->ProcedureT->caption(), $this->ProcedureT->RequiredErrorMessage));
            }
        }
        if ($this->NoOfOocytesRetrievedd->Required) {
            if (!$this->NoOfOocytesRetrievedd->IsDetailKey && EmptyValue($this->NoOfOocytesRetrievedd->FormValue)) {
                $this->NoOfOocytesRetrievedd->addErrorMessage(str_replace("%s", $this->NoOfOocytesRetrievedd->caption(), $this->NoOfOocytesRetrievedd->RequiredErrorMessage));
            }
        }
        if ($this->CourseInHospital->Required) {
            if (!$this->CourseInHospital->IsDetailKey && EmptyValue($this->CourseInHospital->FormValue)) {
                $this->CourseInHospital->addErrorMessage(str_replace("%s", $this->CourseInHospital->caption(), $this->CourseInHospital->RequiredErrorMessage));
            }
        }
        if ($this->DischargeAdvise->Required) {
            if (!$this->DischargeAdvise->IsDetailKey && EmptyValue($this->DischargeAdvise->FormValue)) {
                $this->DischargeAdvise->addErrorMessage(str_replace("%s", $this->DischargeAdvise->caption(), $this->DischargeAdvise->RequiredErrorMessage));
            }
        }
        if ($this->FollowUpAdvise->Required) {
            if (!$this->FollowUpAdvise->IsDetailKey && EmptyValue($this->FollowUpAdvise->FormValue)) {
                $this->FollowUpAdvise->addErrorMessage(str_replace("%s", $this->FollowUpAdvise->caption(), $this->FollowUpAdvise->RequiredErrorMessage));
            }
        }
        if ($this->PlanT->Required) {
            if (!$this->PlanT->IsDetailKey && EmptyValue($this->PlanT->FormValue)) {
                $this->PlanT->addErrorMessage(str_replace("%s", $this->PlanT->caption(), $this->PlanT->RequiredErrorMessage));
            }
        }
        if ($this->ReviewDate->Required) {
            if (!$this->ReviewDate->IsDetailKey && EmptyValue($this->ReviewDate->FormValue)) {
                $this->ReviewDate->addErrorMessage(str_replace("%s", $this->ReviewDate->caption(), $this->ReviewDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ReviewDate->FormValue)) {
            $this->ReviewDate->addErrorMessage($this->ReviewDate->getErrorMessage(false));
        }
        if ($this->ReviewDoctor->Required) {
            if (!$this->ReviewDoctor->IsDetailKey && EmptyValue($this->ReviewDoctor->FormValue)) {
                $this->ReviewDoctor->addErrorMessage(str_replace("%s", $this->ReviewDoctor->caption(), $this->ReviewDoctor->RequiredErrorMessage));
            }
        }
        if ($this->TemplateProcedure->Required) {
            if (!$this->TemplateProcedure->IsDetailKey && EmptyValue($this->TemplateProcedure->FormValue)) {
                $this->TemplateProcedure->addErrorMessage(str_replace("%s", $this->TemplateProcedure->caption(), $this->TemplateProcedure->RequiredErrorMessage));
            }
        }
        if ($this->TemplateCourseInHospital->Required) {
            if (!$this->TemplateCourseInHospital->IsDetailKey && EmptyValue($this->TemplateCourseInHospital->FormValue)) {
                $this->TemplateCourseInHospital->addErrorMessage(str_replace("%s", $this->TemplateCourseInHospital->caption(), $this->TemplateCourseInHospital->RequiredErrorMessage));
            }
        }
        if ($this->TemplateDischargeAdvise->Required) {
            if (!$this->TemplateDischargeAdvise->IsDetailKey && EmptyValue($this->TemplateDischargeAdvise->FormValue)) {
                $this->TemplateDischargeAdvise->addErrorMessage(str_replace("%s", $this->TemplateDischargeAdvise->caption(), $this->TemplateDischargeAdvise->RequiredErrorMessage));
            }
        }
        if ($this->TemplateFollowUpAdvise->Required) {
            if (!$this->TemplateFollowUpAdvise->IsDetailKey && EmptyValue($this->TemplateFollowUpAdvise->FormValue)) {
                $this->TemplateFollowUpAdvise->addErrorMessage(str_replace("%s", $this->TemplateFollowUpAdvise->caption(), $this->TemplateFollowUpAdvise->RequiredErrorMessage));
            }
        }
        if ($this->TidNo->Required) {
            if (!$this->TidNo->IsDetailKey && EmptyValue($this->TidNo->FormValue)) {
                $this->TidNo->addErrorMessage(str_replace("%s", $this->TidNo->caption(), $this->TidNo->RequiredErrorMessage));
            }
        }
        if (!CheckInteger($this->TidNo->FormValue)) {
            $this->TidNo->addErrorMessage($this->TidNo->getErrorMessage(false));
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

        // RIDNo
        $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // ARTCycle
        $this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, null, false);

        // Consultant
        $this->Consultant->setDbValueDef($rsnew, $this->Consultant->CurrentValue, null, false);

        // TotalDoseOfStimulation
        $this->TotalDoseOfStimulation->setDbValueDef($rsnew, $this->TotalDoseOfStimulation->CurrentValue, null, false);

        // Protocol
        $this->Protocol->setDbValueDef($rsnew, $this->Protocol->CurrentValue, null, false);

        // NumberOfDaysOfStimulation
        $this->NumberOfDaysOfStimulation->setDbValueDef($rsnew, $this->NumberOfDaysOfStimulation->CurrentValue, null, false);

        // TriggerDateTime
        $this->TriggerDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->TriggerDateTime->CurrentValue, 0), null, false);

        // OPUDateTime
        $this->OPUDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->OPUDateTime->CurrentValue, 0), null, false);

        // HoursAfterTrigger
        $this->HoursAfterTrigger->setDbValueDef($rsnew, $this->HoursAfterTrigger->CurrentValue, null, false);

        // SerumE2
        $this->SerumE2->setDbValueDef($rsnew, $this->SerumE2->CurrentValue, null, false);

        // SerumP4
        $this->SerumP4->setDbValueDef($rsnew, $this->SerumP4->CurrentValue, null, false);

        // FORT
        $this->FORT->setDbValueDef($rsnew, $this->FORT->CurrentValue, null, false);

        // ExperctedOocytes
        $this->ExperctedOocytes->setDbValueDef($rsnew, $this->ExperctedOocytes->CurrentValue, null, false);

        // NoOfOocytesRetrieved
        $this->NoOfOocytesRetrieved->setDbValueDef($rsnew, $this->NoOfOocytesRetrieved->CurrentValue, null, false);

        // OocytesRetreivalRate
        $this->OocytesRetreivalRate->setDbValueDef($rsnew, $this->OocytesRetreivalRate->CurrentValue, null, false);

        // Anesthesia
        $this->Anesthesia->setDbValueDef($rsnew, $this->Anesthesia->CurrentValue, null, false);

        // TrialCannulation
        $this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, null, false);

        // UCL
        $this->UCL->setDbValueDef($rsnew, $this->UCL->CurrentValue, null, false);

        // Angle
        $this->Angle->setDbValueDef($rsnew, $this->Angle->CurrentValue, null, false);

        // EMS
        $this->EMS->setDbValueDef($rsnew, $this->EMS->CurrentValue, null, false);

        // Cannulation
        $this->Cannulation->setDbValueDef($rsnew, $this->Cannulation->CurrentValue, null, false);

        // ProcedureT
        $this->ProcedureT->setDbValueDef($rsnew, $this->ProcedureT->CurrentValue, null, false);

        // NoOfOocytesRetrievedd
        $this->NoOfOocytesRetrievedd->setDbValueDef($rsnew, $this->NoOfOocytesRetrievedd->CurrentValue, null, false);

        // CourseInHospital
        $this->CourseInHospital->setDbValueDef($rsnew, $this->CourseInHospital->CurrentValue, null, false);

        // DischargeAdvise
        $this->DischargeAdvise->setDbValueDef($rsnew, $this->DischargeAdvise->CurrentValue, null, false);

        // FollowUpAdvise
        $this->FollowUpAdvise->setDbValueDef($rsnew, $this->FollowUpAdvise->CurrentValue, null, false);

        // PlanT
        $this->PlanT->setDbValueDef($rsnew, $this->PlanT->CurrentValue, null, false);

        // ReviewDate
        $this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), null, false);

        // ReviewDoctor
        $this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, null, false);

        // TemplateProcedure
        $this->TemplateProcedure->setDbValueDef($rsnew, $this->TemplateProcedure->CurrentValue, "", false);

        // TemplateCourseInHospital
        $this->TemplateCourseInHospital->setDbValueDef($rsnew, $this->TemplateCourseInHospital->CurrentValue, "", false);

        // TemplateDischargeAdvise
        $this->TemplateDischargeAdvise->setDbValueDef($rsnew, $this->TemplateDischargeAdvise->CurrentValue, "", false);

        // TemplateFollowUpAdvise
        $this->TemplateFollowUpAdvise->setDbValueDef($rsnew, $this->TemplateFollowUpAdvise->CurrentValue, "", false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfOvumPickUpChartList"), "", $this->TableVar, true);
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
                case "x_Protocol":
                    break;
                case "x_Cannulation":
                    break;
                case "x_PlanT":
                    break;
                case "x_TemplateProcedure":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Procedure'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateCourseInHospital":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Course In Hospital'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateDischargeAdvise":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Discharge Advise'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateFollowUpAdvise":
                    $lookupFilter = function () {
                        return "`TemplateType`='ovum Follow Up Advise'";
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
