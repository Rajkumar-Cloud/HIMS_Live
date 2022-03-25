<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEtChartAdd extends IvfEtChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_et_chart';

    // Page object name
    public $PageObjName = "IvfEtChartAdd";

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

        // Table object (ivf_et_chart)
        if (!isset($GLOBALS["ivf_et_chart"]) || get_class($GLOBALS["ivf_et_chart"]) == PROJECT_NAMESPACE . "ivf_et_chart") {
            $GLOBALS["ivf_et_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_et_chart');
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
                $doc = new $class(Container("ivf_et_chart"));
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
                    if ($pageName == "IvfEtChartView") {
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
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->PreTreatment->setVisibility();
        $this->Hysteroscopy->setVisibility();
        $this->EndometrialScratching->setVisibility();
        $this->TrialCannulation->setVisibility();
        $this->CYCLETYPE->setVisibility();
        $this->HRTCYCLE->setVisibility();
        $this->OralEstrogenDosage->setVisibility();
        $this->VaginalEstrogen->setVisibility();
        $this->GCSF->setVisibility();
        $this->ActivatedPRP->setVisibility();
        $this->ERA->setVisibility();
        $this->UCLcm->setVisibility();
        $this->DATEOFSTART->setVisibility();
        $this->DATEOFEMBRYOTRANSFER->setVisibility();
        $this->DAYOFEMBRYOTRANSFER->setVisibility();
        $this->NOOFEMBRYOSTHAWED->setVisibility();
        $this->NOOFEMBRYOSTRANSFERRED->setVisibility();
        $this->DAYOFEMBRYOS->setVisibility();
        $this->CRYOPRESERVEDEMBRYOS->setVisibility();
        $this->Code1->setVisibility();
        $this->Code2->setVisibility();
        $this->CellStage1->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade1->setVisibility();
        $this->Grade2->setVisibility();
        $this->ProcedureRecord->setVisibility();
        $this->Medicationsadvised->setVisibility();
        $this->PostProcedureInstructions->setVisibility();
        $this->PregnancyTestingWithSerumBetaHcG->setVisibility();
        $this->ReviewDate->setVisibility();
        $this->ReviewDoctor->setVisibility();
        $this->TemplateProcedureRecord->setVisibility();
        $this->TemplateMedicationsadvised->setVisibility();
        $this->TemplatePostProcedureInstructions->setVisibility();
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
        $this->setupLookupOptions($this->TemplateProcedureRecord);
        $this->setupLookupOptions($this->TemplateMedicationsadvised);
        $this->setupLookupOptions($this->TemplatePostProcedureInstructions);

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
                    $this->terminate("IvfEtChartList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfEtChartList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfEtChartView") {
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
        $this->InseminatinTechnique->CurrentValue = null;
        $this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
        $this->IndicationForART->CurrentValue = null;
        $this->IndicationForART->OldValue = $this->IndicationForART->CurrentValue;
        $this->PreTreatment->CurrentValue = null;
        $this->PreTreatment->OldValue = $this->PreTreatment->CurrentValue;
        $this->Hysteroscopy->CurrentValue = null;
        $this->Hysteroscopy->OldValue = $this->Hysteroscopy->CurrentValue;
        $this->EndometrialScratching->CurrentValue = null;
        $this->EndometrialScratching->OldValue = $this->EndometrialScratching->CurrentValue;
        $this->TrialCannulation->CurrentValue = null;
        $this->TrialCannulation->OldValue = $this->TrialCannulation->CurrentValue;
        $this->CYCLETYPE->CurrentValue = null;
        $this->CYCLETYPE->OldValue = $this->CYCLETYPE->CurrentValue;
        $this->HRTCYCLE->CurrentValue = null;
        $this->HRTCYCLE->OldValue = $this->HRTCYCLE->CurrentValue;
        $this->OralEstrogenDosage->CurrentValue = null;
        $this->OralEstrogenDosage->OldValue = $this->OralEstrogenDosage->CurrentValue;
        $this->VaginalEstrogen->CurrentValue = null;
        $this->VaginalEstrogen->OldValue = $this->VaginalEstrogen->CurrentValue;
        $this->GCSF->CurrentValue = null;
        $this->GCSF->OldValue = $this->GCSF->CurrentValue;
        $this->ActivatedPRP->CurrentValue = null;
        $this->ActivatedPRP->OldValue = $this->ActivatedPRP->CurrentValue;
        $this->ERA->CurrentValue = null;
        $this->ERA->OldValue = $this->ERA->CurrentValue;
        $this->UCLcm->CurrentValue = null;
        $this->UCLcm->OldValue = $this->UCLcm->CurrentValue;
        $this->DATEOFSTART->CurrentValue = null;
        $this->DATEOFSTART->OldValue = $this->DATEOFSTART->CurrentValue;
        $this->DATEOFEMBRYOTRANSFER->CurrentValue = null;
        $this->DATEOFEMBRYOTRANSFER->OldValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
        $this->DAYOFEMBRYOTRANSFER->CurrentValue = null;
        $this->DAYOFEMBRYOTRANSFER->OldValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $this->NOOFEMBRYOSTHAWED->CurrentValue = null;
        $this->NOOFEMBRYOSTHAWED->OldValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = null;
        $this->NOOFEMBRYOSTRANSFERRED->OldValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $this->DAYOFEMBRYOS->CurrentValue = null;
        $this->DAYOFEMBRYOS->OldValue = $this->DAYOFEMBRYOS->CurrentValue;
        $this->CRYOPRESERVEDEMBRYOS->CurrentValue = null;
        $this->CRYOPRESERVEDEMBRYOS->OldValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $this->Code1->CurrentValue = null;
        $this->Code1->OldValue = $this->Code1->CurrentValue;
        $this->Code2->CurrentValue = null;
        $this->Code2->OldValue = $this->Code2->CurrentValue;
        $this->CellStage1->CurrentValue = null;
        $this->CellStage1->OldValue = $this->CellStage1->CurrentValue;
        $this->CellStage2->CurrentValue = null;
        $this->CellStage2->OldValue = $this->CellStage2->CurrentValue;
        $this->Grade1->CurrentValue = null;
        $this->Grade1->OldValue = $this->Grade1->CurrentValue;
        $this->Grade2->CurrentValue = null;
        $this->Grade2->OldValue = $this->Grade2->CurrentValue;
        $this->ProcedureRecord->CurrentValue = null;
        $this->ProcedureRecord->OldValue = $this->ProcedureRecord->CurrentValue;
        $this->Medicationsadvised->CurrentValue = null;
        $this->Medicationsadvised->OldValue = $this->Medicationsadvised->CurrentValue;
        $this->PostProcedureInstructions->CurrentValue = null;
        $this->PostProcedureInstructions->OldValue = $this->PostProcedureInstructions->CurrentValue;
        $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = null;
        $this->PregnancyTestingWithSerumBetaHcG->OldValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
        $this->ReviewDate->CurrentValue = null;
        $this->ReviewDate->OldValue = $this->ReviewDate->CurrentValue;
        $this->ReviewDoctor->CurrentValue = null;
        $this->ReviewDoctor->OldValue = $this->ReviewDoctor->CurrentValue;
        $this->TemplateProcedureRecord->CurrentValue = null;
        $this->TemplateProcedureRecord->OldValue = $this->TemplateProcedureRecord->CurrentValue;
        $this->TemplateMedicationsadvised->CurrentValue = null;
        $this->TemplateMedicationsadvised->OldValue = $this->TemplateMedicationsadvised->CurrentValue;
        $this->TemplatePostProcedureInstructions->CurrentValue = null;
        $this->TemplatePostProcedureInstructions->OldValue = $this->TemplatePostProcedureInstructions->CurrentValue;
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

        // Check field name 'InseminatinTechnique' first before field var 'x_InseminatinTechnique'
        $val = $CurrentForm->hasValue("InseminatinTechnique") ? $CurrentForm->getValue("InseminatinTechnique") : $CurrentForm->getValue("x_InseminatinTechnique");
        if (!$this->InseminatinTechnique->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminatinTechnique->Visible = false; // Disable update for API request
            } else {
                $this->InseminatinTechnique->setFormValue($val);
            }
        }

        // Check field name 'IndicationForART' first before field var 'x_IndicationForART'
        $val = $CurrentForm->hasValue("IndicationForART") ? $CurrentForm->getValue("IndicationForART") : $CurrentForm->getValue("x_IndicationForART");
        if (!$this->IndicationForART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IndicationForART->Visible = false; // Disable update for API request
            } else {
                $this->IndicationForART->setFormValue($val);
            }
        }

        // Check field name 'PreTreatment' first before field var 'x_PreTreatment'
        $val = $CurrentForm->hasValue("PreTreatment") ? $CurrentForm->getValue("PreTreatment") : $CurrentForm->getValue("x_PreTreatment");
        if (!$this->PreTreatment->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PreTreatment->Visible = false; // Disable update for API request
            } else {
                $this->PreTreatment->setFormValue($val);
            }
        }

        // Check field name 'Hysteroscopy' first before field var 'x_Hysteroscopy'
        $val = $CurrentForm->hasValue("Hysteroscopy") ? $CurrentForm->getValue("Hysteroscopy") : $CurrentForm->getValue("x_Hysteroscopy");
        if (!$this->Hysteroscopy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Hysteroscopy->Visible = false; // Disable update for API request
            } else {
                $this->Hysteroscopy->setFormValue($val);
            }
        }

        // Check field name 'EndometrialScratching' first before field var 'x_EndometrialScratching'
        $val = $CurrentForm->hasValue("EndometrialScratching") ? $CurrentForm->getValue("EndometrialScratching") : $CurrentForm->getValue("x_EndometrialScratching");
        if (!$this->EndometrialScratching->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndometrialScratching->Visible = false; // Disable update for API request
            } else {
                $this->EndometrialScratching->setFormValue($val);
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

        // Check field name 'CYCLETYPE' first before field var 'x_CYCLETYPE'
        $val = $CurrentForm->hasValue("CYCLETYPE") ? $CurrentForm->getValue("CYCLETYPE") : $CurrentForm->getValue("x_CYCLETYPE");
        if (!$this->CYCLETYPE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CYCLETYPE->Visible = false; // Disable update for API request
            } else {
                $this->CYCLETYPE->setFormValue($val);
            }
        }

        // Check field name 'HRTCYCLE' first before field var 'x_HRTCYCLE'
        $val = $CurrentForm->hasValue("HRTCYCLE") ? $CurrentForm->getValue("HRTCYCLE") : $CurrentForm->getValue("x_HRTCYCLE");
        if (!$this->HRTCYCLE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HRTCYCLE->Visible = false; // Disable update for API request
            } else {
                $this->HRTCYCLE->setFormValue($val);
            }
        }

        // Check field name 'OralEstrogenDosage' first before field var 'x_OralEstrogenDosage'
        $val = $CurrentForm->hasValue("OralEstrogenDosage") ? $CurrentForm->getValue("OralEstrogenDosage") : $CurrentForm->getValue("x_OralEstrogenDosage");
        if (!$this->OralEstrogenDosage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OralEstrogenDosage->Visible = false; // Disable update for API request
            } else {
                $this->OralEstrogenDosage->setFormValue($val);
            }
        }

        // Check field name 'VaginalEstrogen' first before field var 'x_VaginalEstrogen'
        $val = $CurrentForm->hasValue("VaginalEstrogen") ? $CurrentForm->getValue("VaginalEstrogen") : $CurrentForm->getValue("x_VaginalEstrogen");
        if (!$this->VaginalEstrogen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->VaginalEstrogen->Visible = false; // Disable update for API request
            } else {
                $this->VaginalEstrogen->setFormValue($val);
            }
        }

        // Check field name 'GCSF' first before field var 'x_GCSF'
        $val = $CurrentForm->hasValue("GCSF") ? $CurrentForm->getValue("GCSF") : $CurrentForm->getValue("x_GCSF");
        if (!$this->GCSF->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->GCSF->Visible = false; // Disable update for API request
            } else {
                $this->GCSF->setFormValue($val);
            }
        }

        // Check field name 'ActivatedPRP' first before field var 'x_ActivatedPRP'
        $val = $CurrentForm->hasValue("ActivatedPRP") ? $CurrentForm->getValue("ActivatedPRP") : $CurrentForm->getValue("x_ActivatedPRP");
        if (!$this->ActivatedPRP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ActivatedPRP->Visible = false; // Disable update for API request
            } else {
                $this->ActivatedPRP->setFormValue($val);
            }
        }

        // Check field name 'ERA' first before field var 'x_ERA'
        $val = $CurrentForm->hasValue("ERA") ? $CurrentForm->getValue("ERA") : $CurrentForm->getValue("x_ERA");
        if (!$this->ERA->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ERA->Visible = false; // Disable update for API request
            } else {
                $this->ERA->setFormValue($val);
            }
        }

        // Check field name 'UCLcm' first before field var 'x_UCLcm'
        $val = $CurrentForm->hasValue("UCLcm") ? $CurrentForm->getValue("UCLcm") : $CurrentForm->getValue("x_UCLcm");
        if (!$this->UCLcm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->UCLcm->Visible = false; // Disable update for API request
            } else {
                $this->UCLcm->setFormValue($val);
            }
        }

        // Check field name 'DATEOFSTART' first before field var 'x_DATEOFSTART'
        $val = $CurrentForm->hasValue("DATEOFSTART") ? $CurrentForm->getValue("DATEOFSTART") : $CurrentForm->getValue("x_DATEOFSTART");
        if (!$this->DATEOFSTART->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATEOFSTART->Visible = false; // Disable update for API request
            } else {
                $this->DATEOFSTART->setFormValue($val);
            }
            $this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11);
        }

        // Check field name 'DATEOFEMBRYOTRANSFER' first before field var 'x_DATEOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DATEOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DATEOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DATEOFEMBRYOTRANSFER");
        if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DATEOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DATEOFEMBRYOTRANSFER->setFormValue($val);
            }
            $this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11);
        }

        // Check field name 'DAYOFEMBRYOTRANSFER' first before field var 'x_DAYOFEMBRYOTRANSFER'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOTRANSFER") ? $CurrentForm->getValue("DAYOFEMBRYOTRANSFER") : $CurrentForm->getValue("x_DAYOFEMBRYOTRANSFER");
        if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOTRANSFER->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOTRANSFER->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTHAWED' first before field var 'x_NOOFEMBRYOSTHAWED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTHAWED") ? $CurrentForm->getValue("NOOFEMBRYOSTHAWED") : $CurrentForm->getValue("x_NOOFEMBRYOSTHAWED");
        if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTHAWED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTHAWED->setFormValue($val);
            }
        }

        // Check field name 'NOOFEMBRYOSTRANSFERRED' first before field var 'x_NOOFEMBRYOSTRANSFERRED'
        $val = $CurrentForm->hasValue("NOOFEMBRYOSTRANSFERRED") ? $CurrentForm->getValue("NOOFEMBRYOSTRANSFERRED") : $CurrentForm->getValue("x_NOOFEMBRYOSTRANSFERRED");
        if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NOOFEMBRYOSTRANSFERRED->Visible = false; // Disable update for API request
            } else {
                $this->NOOFEMBRYOSTRANSFERRED->setFormValue($val);
            }
        }

        // Check field name 'DAYOFEMBRYOS' first before field var 'x_DAYOFEMBRYOS'
        $val = $CurrentForm->hasValue("DAYOFEMBRYOS") ? $CurrentForm->getValue("DAYOFEMBRYOS") : $CurrentForm->getValue("x_DAYOFEMBRYOS");
        if (!$this->DAYOFEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DAYOFEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->DAYOFEMBRYOS->setFormValue($val);
            }
        }

        // Check field name 'CRYOPRESERVEDEMBRYOS' first before field var 'x_CRYOPRESERVEDEMBRYOS'
        $val = $CurrentForm->hasValue("CRYOPRESERVEDEMBRYOS") ? $CurrentForm->getValue("CRYOPRESERVEDEMBRYOS") : $CurrentForm->getValue("x_CRYOPRESERVEDEMBRYOS");
        if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CRYOPRESERVEDEMBRYOS->Visible = false; // Disable update for API request
            } else {
                $this->CRYOPRESERVEDEMBRYOS->setFormValue($val);
            }
        }

        // Check field name 'Code1' first before field var 'x_Code1'
        $val = $CurrentForm->hasValue("Code1") ? $CurrentForm->getValue("Code1") : $CurrentForm->getValue("x_Code1");
        if (!$this->Code1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code1->Visible = false; // Disable update for API request
            } else {
                $this->Code1->setFormValue($val);
            }
        }

        // Check field name 'Code2' first before field var 'x_Code2'
        $val = $CurrentForm->hasValue("Code2") ? $CurrentForm->getValue("Code2") : $CurrentForm->getValue("x_Code2");
        if (!$this->Code2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Code2->Visible = false; // Disable update for API request
            } else {
                $this->Code2->setFormValue($val);
            }
        }

        // Check field name 'CellStage1' first before field var 'x_CellStage1'
        $val = $CurrentForm->hasValue("CellStage1") ? $CurrentForm->getValue("CellStage1") : $CurrentForm->getValue("x_CellStage1");
        if (!$this->CellStage1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage1->Visible = false; // Disable update for API request
            } else {
                $this->CellStage1->setFormValue($val);
            }
        }

        // Check field name 'CellStage2' first before field var 'x_CellStage2'
        $val = $CurrentForm->hasValue("CellStage2") ? $CurrentForm->getValue("CellStage2") : $CurrentForm->getValue("x_CellStage2");
        if (!$this->CellStage2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CellStage2->Visible = false; // Disable update for API request
            } else {
                $this->CellStage2->setFormValue($val);
            }
        }

        // Check field name 'Grade1' first before field var 'x_Grade1'
        $val = $CurrentForm->hasValue("Grade1") ? $CurrentForm->getValue("Grade1") : $CurrentForm->getValue("x_Grade1");
        if (!$this->Grade1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade1->Visible = false; // Disable update for API request
            } else {
                $this->Grade1->setFormValue($val);
            }
        }

        // Check field name 'Grade2' first before field var 'x_Grade2'
        $val = $CurrentForm->hasValue("Grade2") ? $CurrentForm->getValue("Grade2") : $CurrentForm->getValue("x_Grade2");
        if (!$this->Grade2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Grade2->Visible = false; // Disable update for API request
            } else {
                $this->Grade2->setFormValue($val);
            }
        }

        // Check field name 'ProcedureRecord' first before field var 'x_ProcedureRecord'
        $val = $CurrentForm->hasValue("ProcedureRecord") ? $CurrentForm->getValue("ProcedureRecord") : $CurrentForm->getValue("x_ProcedureRecord");
        if (!$this->ProcedureRecord->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcedureRecord->Visible = false; // Disable update for API request
            } else {
                $this->ProcedureRecord->setFormValue($val);
            }
        }

        // Check field name 'Medicationsadvised' first before field var 'x_Medicationsadvised'
        $val = $CurrentForm->hasValue("Medicationsadvised") ? $CurrentForm->getValue("Medicationsadvised") : $CurrentForm->getValue("x_Medicationsadvised");
        if (!$this->Medicationsadvised->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicationsadvised->Visible = false; // Disable update for API request
            } else {
                $this->Medicationsadvised->setFormValue($val);
            }
        }

        // Check field name 'PostProcedureInstructions' first before field var 'x_PostProcedureInstructions'
        $val = $CurrentForm->hasValue("PostProcedureInstructions") ? $CurrentForm->getValue("PostProcedureInstructions") : $CurrentForm->getValue("x_PostProcedureInstructions");
        if (!$this->PostProcedureInstructions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PostProcedureInstructions->Visible = false; // Disable update for API request
            } else {
                $this->PostProcedureInstructions->setFormValue($val);
            }
        }

        // Check field name 'PregnancyTestingWithSerumBetaHcG' first before field var 'x_PregnancyTestingWithSerumBetaHcG'
        $val = $CurrentForm->hasValue("PregnancyTestingWithSerumBetaHcG") ? $CurrentForm->getValue("PregnancyTestingWithSerumBetaHcG") : $CurrentForm->getValue("x_PregnancyTestingWithSerumBetaHcG");
        if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PregnancyTestingWithSerumBetaHcG->Visible = false; // Disable update for API request
            } else {
                $this->PregnancyTestingWithSerumBetaHcG->setFormValue($val);
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

        // Check field name 'TemplateProcedureRecord' first before field var 'x_TemplateProcedureRecord'
        $val = $CurrentForm->hasValue("TemplateProcedureRecord") ? $CurrentForm->getValue("TemplateProcedureRecord") : $CurrentForm->getValue("x_TemplateProcedureRecord");
        if (!$this->TemplateProcedureRecord->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateProcedureRecord->Visible = false; // Disable update for API request
            } else {
                $this->TemplateProcedureRecord->setFormValue($val);
            }
        }

        // Check field name 'TemplateMedicationsadvised' first before field var 'x_TemplateMedicationsadvised'
        $val = $CurrentForm->hasValue("TemplateMedicationsadvised") ? $CurrentForm->getValue("TemplateMedicationsadvised") : $CurrentForm->getValue("x_TemplateMedicationsadvised");
        if (!$this->TemplateMedicationsadvised->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplateMedicationsadvised->Visible = false; // Disable update for API request
            } else {
                $this->TemplateMedicationsadvised->setFormValue($val);
            }
        }

        // Check field name 'TemplatePostProcedureInstructions' first before field var 'x_TemplatePostProcedureInstructions'
        $val = $CurrentForm->hasValue("TemplatePostProcedureInstructions") ? $CurrentForm->getValue("TemplatePostProcedureInstructions") : $CurrentForm->getValue("x_TemplatePostProcedureInstructions");
        if (!$this->TemplatePostProcedureInstructions->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TemplatePostProcedureInstructions->Visible = false; // Disable update for API request
            } else {
                $this->TemplatePostProcedureInstructions->setFormValue($val);
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
        $this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
        $this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
        $this->PreTreatment->CurrentValue = $this->PreTreatment->FormValue;
        $this->Hysteroscopy->CurrentValue = $this->Hysteroscopy->FormValue;
        $this->EndometrialScratching->CurrentValue = $this->EndometrialScratching->FormValue;
        $this->TrialCannulation->CurrentValue = $this->TrialCannulation->FormValue;
        $this->CYCLETYPE->CurrentValue = $this->CYCLETYPE->FormValue;
        $this->HRTCYCLE->CurrentValue = $this->HRTCYCLE->FormValue;
        $this->OralEstrogenDosage->CurrentValue = $this->OralEstrogenDosage->FormValue;
        $this->VaginalEstrogen->CurrentValue = $this->VaginalEstrogen->FormValue;
        $this->GCSF->CurrentValue = $this->GCSF->FormValue;
        $this->ActivatedPRP->CurrentValue = $this->ActivatedPRP->FormValue;
        $this->ERA->CurrentValue = $this->ERA->FormValue;
        $this->UCLcm->CurrentValue = $this->UCLcm->FormValue;
        $this->DATEOFSTART->CurrentValue = $this->DATEOFSTART->FormValue;
        $this->DATEOFSTART->CurrentValue = UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11);
        $this->DATEOFEMBRYOTRANSFER->CurrentValue = $this->DATEOFEMBRYOTRANSFER->FormValue;
        $this->DATEOFEMBRYOTRANSFER->CurrentValue = UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11);
        $this->DAYOFEMBRYOTRANSFER->CurrentValue = $this->DAYOFEMBRYOTRANSFER->FormValue;
        $this->NOOFEMBRYOSTHAWED->CurrentValue = $this->NOOFEMBRYOSTHAWED->FormValue;
        $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = $this->NOOFEMBRYOSTRANSFERRED->FormValue;
        $this->DAYOFEMBRYOS->CurrentValue = $this->DAYOFEMBRYOS->FormValue;
        $this->CRYOPRESERVEDEMBRYOS->CurrentValue = $this->CRYOPRESERVEDEMBRYOS->FormValue;
        $this->Code1->CurrentValue = $this->Code1->FormValue;
        $this->Code2->CurrentValue = $this->Code2->FormValue;
        $this->CellStage1->CurrentValue = $this->CellStage1->FormValue;
        $this->CellStage2->CurrentValue = $this->CellStage2->FormValue;
        $this->Grade1->CurrentValue = $this->Grade1->FormValue;
        $this->Grade2->CurrentValue = $this->Grade2->FormValue;
        $this->ProcedureRecord->CurrentValue = $this->ProcedureRecord->FormValue;
        $this->Medicationsadvised->CurrentValue = $this->Medicationsadvised->FormValue;
        $this->PostProcedureInstructions->CurrentValue = $this->PostProcedureInstructions->FormValue;
        $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = $this->PregnancyTestingWithSerumBetaHcG->FormValue;
        $this->ReviewDate->CurrentValue = $this->ReviewDate->FormValue;
        $this->ReviewDate->CurrentValue = UnFormatDateTime($this->ReviewDate->CurrentValue, 0);
        $this->ReviewDoctor->CurrentValue = $this->ReviewDoctor->FormValue;
        $this->TemplateProcedureRecord->CurrentValue = $this->TemplateProcedureRecord->FormValue;
        $this->TemplateMedicationsadvised->CurrentValue = $this->TemplateMedicationsadvised->FormValue;
        $this->TemplatePostProcedureInstructions->CurrentValue = $this->TemplatePostProcedureInstructions->FormValue;
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
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->PreTreatment->setDbValue($row['PreTreatment']);
        $this->Hysteroscopy->setDbValue($row['Hysteroscopy']);
        $this->EndometrialScratching->setDbValue($row['EndometrialScratching']);
        $this->TrialCannulation->setDbValue($row['TrialCannulation']);
        $this->CYCLETYPE->setDbValue($row['CYCLETYPE']);
        $this->HRTCYCLE->setDbValue($row['HRTCYCLE']);
        $this->OralEstrogenDosage->setDbValue($row['OralEstrogenDosage']);
        $this->VaginalEstrogen->setDbValue($row['VaginalEstrogen']);
        $this->GCSF->setDbValue($row['GCSF']);
        $this->ActivatedPRP->setDbValue($row['ActivatedPRP']);
        $this->ERA->setDbValue($row['ERA']);
        $this->UCLcm->setDbValue($row['UCLcm']);
        $this->DATEOFSTART->setDbValue($row['DATEOFSTART']);
        $this->DATEOFEMBRYOTRANSFER->setDbValue($row['DATEOFEMBRYOTRANSFER']);
        $this->DAYOFEMBRYOTRANSFER->setDbValue($row['DAYOFEMBRYOTRANSFER']);
        $this->NOOFEMBRYOSTHAWED->setDbValue($row['NOOFEMBRYOSTHAWED']);
        $this->NOOFEMBRYOSTRANSFERRED->setDbValue($row['NOOFEMBRYOSTRANSFERRED']);
        $this->DAYOFEMBRYOS->setDbValue($row['DAYOFEMBRYOS']);
        $this->CRYOPRESERVEDEMBRYOS->setDbValue($row['CRYOPRESERVEDEMBRYOS']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->ProcedureRecord->setDbValue($row['ProcedureRecord']);
        $this->Medicationsadvised->setDbValue($row['Medicationsadvised']);
        $this->PostProcedureInstructions->setDbValue($row['PostProcedureInstructions']);
        $this->PregnancyTestingWithSerumBetaHcG->setDbValue($row['PregnancyTestingWithSerumBetaHcG']);
        $this->ReviewDate->setDbValue($row['ReviewDate']);
        $this->ReviewDoctor->setDbValue($row['ReviewDoctor']);
        $this->TemplateProcedureRecord->setDbValue($row['TemplateProcedureRecord']);
        $this->TemplateMedicationsadvised->setDbValue($row['TemplateMedicationsadvised']);
        $this->TemplatePostProcedureInstructions->setDbValue($row['TemplatePostProcedureInstructions']);
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
        $row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
        $row['IndicationForART'] = $this->IndicationForART->CurrentValue;
        $row['PreTreatment'] = $this->PreTreatment->CurrentValue;
        $row['Hysteroscopy'] = $this->Hysteroscopy->CurrentValue;
        $row['EndometrialScratching'] = $this->EndometrialScratching->CurrentValue;
        $row['TrialCannulation'] = $this->TrialCannulation->CurrentValue;
        $row['CYCLETYPE'] = $this->CYCLETYPE->CurrentValue;
        $row['HRTCYCLE'] = $this->HRTCYCLE->CurrentValue;
        $row['OralEstrogenDosage'] = $this->OralEstrogenDosage->CurrentValue;
        $row['VaginalEstrogen'] = $this->VaginalEstrogen->CurrentValue;
        $row['GCSF'] = $this->GCSF->CurrentValue;
        $row['ActivatedPRP'] = $this->ActivatedPRP->CurrentValue;
        $row['ERA'] = $this->ERA->CurrentValue;
        $row['UCLcm'] = $this->UCLcm->CurrentValue;
        $row['DATEOFSTART'] = $this->DATEOFSTART->CurrentValue;
        $row['DATEOFEMBRYOTRANSFER'] = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
        $row['DAYOFEMBRYOTRANSFER'] = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
        $row['NOOFEMBRYOSTHAWED'] = $this->NOOFEMBRYOSTHAWED->CurrentValue;
        $row['NOOFEMBRYOSTRANSFERRED'] = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
        $row['DAYOFEMBRYOS'] = $this->DAYOFEMBRYOS->CurrentValue;
        $row['CRYOPRESERVEDEMBRYOS'] = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
        $row['Code1'] = $this->Code1->CurrentValue;
        $row['Code2'] = $this->Code2->CurrentValue;
        $row['CellStage1'] = $this->CellStage1->CurrentValue;
        $row['CellStage2'] = $this->CellStage2->CurrentValue;
        $row['Grade1'] = $this->Grade1->CurrentValue;
        $row['Grade2'] = $this->Grade2->CurrentValue;
        $row['ProcedureRecord'] = $this->ProcedureRecord->CurrentValue;
        $row['Medicationsadvised'] = $this->Medicationsadvised->CurrentValue;
        $row['PostProcedureInstructions'] = $this->PostProcedureInstructions->CurrentValue;
        $row['PregnancyTestingWithSerumBetaHcG'] = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
        $row['ReviewDate'] = $this->ReviewDate->CurrentValue;
        $row['ReviewDoctor'] = $this->ReviewDoctor->CurrentValue;
        $row['TemplateProcedureRecord'] = $this->TemplateProcedureRecord->CurrentValue;
        $row['TemplateMedicationsadvised'] = $this->TemplateMedicationsadvised->CurrentValue;
        $row['TemplatePostProcedureInstructions'] = $this->TemplatePostProcedureInstructions->CurrentValue;
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

        // InseminatinTechnique

        // IndicationForART

        // PreTreatment

        // Hysteroscopy

        // EndometrialScratching

        // TrialCannulation

        // CYCLETYPE

        // HRTCYCLE

        // OralEstrogenDosage

        // VaginalEstrogen

        // GCSF

        // ActivatedPRP

        // ERA

        // UCLcm

        // DATEOFSTART

        // DATEOFEMBRYOTRANSFER

        // DAYOFEMBRYOTRANSFER

        // NOOFEMBRYOSTHAWED

        // NOOFEMBRYOSTRANSFERRED

        // DAYOFEMBRYOS

        // CRYOPRESERVEDEMBRYOS

        // Code1

        // Code2

        // CellStage1

        // CellStage2

        // Grade1

        // Grade2

        // ProcedureRecord

        // Medicationsadvised

        // PostProcedureInstructions

        // PregnancyTestingWithSerumBetaHcG

        // ReviewDate

        // ReviewDoctor

        // TemplateProcedureRecord

        // TemplateMedicationsadvised

        // TemplatePostProcedureInstructions

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
            if (strval($this->ARTCycle->CurrentValue) != "") {
                $this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
            } else {
                $this->ARTCycle->ViewValue = null;
            }
            $this->ARTCycle->ViewCustomAttributes = "";

            // Consultant
            $this->Consultant->ViewValue = $this->Consultant->CurrentValue;
            $this->Consultant->ViewCustomAttributes = "";

            // InseminatinTechnique
            if (strval($this->InseminatinTechnique->CurrentValue) != "") {
                $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
            } else {
                $this->InseminatinTechnique->ViewValue = null;
            }
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // PreTreatment
            if (strval($this->PreTreatment->CurrentValue) != "") {
                $this->PreTreatment->ViewValue = $this->PreTreatment->optionCaption($this->PreTreatment->CurrentValue);
            } else {
                $this->PreTreatment->ViewValue = null;
            }
            $this->PreTreatment->ViewCustomAttributes = "";

            // Hysteroscopy
            if (strval($this->Hysteroscopy->CurrentValue) != "") {
                $this->Hysteroscopy->ViewValue = $this->Hysteroscopy->optionCaption($this->Hysteroscopy->CurrentValue);
            } else {
                $this->Hysteroscopy->ViewValue = null;
            }
            $this->Hysteroscopy->ViewCustomAttributes = "";

            // EndometrialScratching
            if (strval($this->EndometrialScratching->CurrentValue) != "") {
                $this->EndometrialScratching->ViewValue = $this->EndometrialScratching->optionCaption($this->EndometrialScratching->CurrentValue);
            } else {
                $this->EndometrialScratching->ViewValue = null;
            }
            $this->EndometrialScratching->ViewCustomAttributes = "";

            // TrialCannulation
            if (strval($this->TrialCannulation->CurrentValue) != "") {
                $this->TrialCannulation->ViewValue = $this->TrialCannulation->optionCaption($this->TrialCannulation->CurrentValue);
            } else {
                $this->TrialCannulation->ViewValue = null;
            }
            $this->TrialCannulation->ViewCustomAttributes = "";

            // CYCLETYPE
            if (strval($this->CYCLETYPE->CurrentValue) != "") {
                $this->CYCLETYPE->ViewValue = $this->CYCLETYPE->optionCaption($this->CYCLETYPE->CurrentValue);
            } else {
                $this->CYCLETYPE->ViewValue = null;
            }
            $this->CYCLETYPE->ViewCustomAttributes = "";

            // HRTCYCLE
            $this->HRTCYCLE->ViewValue = $this->HRTCYCLE->CurrentValue;
            $this->HRTCYCLE->ViewCustomAttributes = "";

            // OralEstrogenDosage
            if (strval($this->OralEstrogenDosage->CurrentValue) != "") {
                $this->OralEstrogenDosage->ViewValue = $this->OralEstrogenDosage->optionCaption($this->OralEstrogenDosage->CurrentValue);
            } else {
                $this->OralEstrogenDosage->ViewValue = null;
            }
            $this->OralEstrogenDosage->ViewCustomAttributes = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->ViewValue = $this->VaginalEstrogen->CurrentValue;
            $this->VaginalEstrogen->ViewCustomAttributes = "";

            // GCSF
            if (strval($this->GCSF->CurrentValue) != "") {
                $this->GCSF->ViewValue = $this->GCSF->optionCaption($this->GCSF->CurrentValue);
            } else {
                $this->GCSF->ViewValue = null;
            }
            $this->GCSF->ViewCustomAttributes = "";

            // ActivatedPRP
            if (strval($this->ActivatedPRP->CurrentValue) != "") {
                $this->ActivatedPRP->ViewValue = $this->ActivatedPRP->optionCaption($this->ActivatedPRP->CurrentValue);
            } else {
                $this->ActivatedPRP->ViewValue = null;
            }
            $this->ActivatedPRP->ViewCustomAttributes = "";

            // ERA
            if (strval($this->ERA->CurrentValue) != "") {
                $this->ERA->ViewValue = $this->ERA->optionCaption($this->ERA->CurrentValue);
            } else {
                $this->ERA->ViewValue = null;
            }
            $this->ERA->ViewCustomAttributes = "";

            // UCLcm
            $this->UCLcm->ViewValue = $this->UCLcm->CurrentValue;
            $this->UCLcm->ViewCustomAttributes = "";

            // DATEOFSTART
            $this->DATEOFSTART->ViewValue = $this->DATEOFSTART->CurrentValue;
            $this->DATEOFSTART->ViewValue = FormatDateTime($this->DATEOFSTART->ViewValue, 11);
            $this->DATEOFSTART->ViewCustomAttributes = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->ViewValue = $this->DATEOFEMBRYOTRANSFER->CurrentValue;
            $this->DATEOFEMBRYOTRANSFER->ViewValue = FormatDateTime($this->DATEOFEMBRYOTRANSFER->ViewValue, 11);
            $this->DATEOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->ViewValue = $this->DAYOFEMBRYOTRANSFER->CurrentValue;
            $this->DAYOFEMBRYOTRANSFER->ViewCustomAttributes = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->ViewValue = $this->NOOFEMBRYOSTHAWED->CurrentValue;
            $this->NOOFEMBRYOSTHAWED->ViewCustomAttributes = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->ViewValue = $this->NOOFEMBRYOSTRANSFERRED->CurrentValue;
            $this->NOOFEMBRYOSTRANSFERRED->ViewCustomAttributes = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->ViewValue = $this->DAYOFEMBRYOS->CurrentValue;
            $this->DAYOFEMBRYOS->ViewCustomAttributes = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->ViewValue = $this->CRYOPRESERVEDEMBRYOS->CurrentValue;
            $this->CRYOPRESERVEDEMBRYOS->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // CellStage1
            $this->CellStage1->ViewValue = $this->CellStage1->CurrentValue;
            $this->CellStage1->ViewCustomAttributes = "";

            // CellStage2
            $this->CellStage2->ViewValue = $this->CellStage2->CurrentValue;
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade1
            $this->Grade1->ViewValue = $this->Grade1->CurrentValue;
            $this->Grade1->ViewCustomAttributes = "";

            // Grade2
            $this->Grade2->ViewValue = $this->Grade2->CurrentValue;
            $this->Grade2->ViewCustomAttributes = "";

            // ProcedureRecord
            $this->ProcedureRecord->ViewValue = $this->ProcedureRecord->CurrentValue;
            $this->ProcedureRecord->ViewCustomAttributes = "";

            // Medicationsadvised
            $this->Medicationsadvised->ViewValue = $this->Medicationsadvised->CurrentValue;
            $this->Medicationsadvised->ViewCustomAttributes = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->ViewValue = $this->PostProcedureInstructions->CurrentValue;
            $this->PostProcedureInstructions->ViewCustomAttributes = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->ViewValue = $this->PregnancyTestingWithSerumBetaHcG->CurrentValue;
            $this->PregnancyTestingWithSerumBetaHcG->ViewCustomAttributes = "";

            // ReviewDate
            $this->ReviewDate->ViewValue = $this->ReviewDate->CurrentValue;
            $this->ReviewDate->ViewValue = FormatDateTime($this->ReviewDate->ViewValue, 0);
            $this->ReviewDate->ViewCustomAttributes = "";

            // ReviewDoctor
            $this->ReviewDoctor->ViewValue = $this->ReviewDoctor->CurrentValue;
            $this->ReviewDoctor->ViewCustomAttributes = "";

            // TemplateProcedureRecord
            $curVal = trim(strval($this->TemplateProcedureRecord->CurrentValue));
            if ($curVal != "") {
                $this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->lookupCacheOption($curVal);
                if ($this->TemplateProcedureRecord->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ET Template Procedure Record'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateProcedureRecord->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateProcedureRecord->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->displayValue($arwrk);
                    } else {
                        $this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->CurrentValue;
                    }
                }
            } else {
                $this->TemplateProcedureRecord->ViewValue = null;
            }
            $this->TemplateProcedureRecord->ViewCustomAttributes = "";

            // TemplateMedicationsadvised
            $curVal = trim(strval($this->TemplateMedicationsadvised->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->lookupCacheOption($curVal);
                if ($this->TemplateMedicationsadvised->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ET Template Medications Advised'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplateMedicationsadvised->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplateMedicationsadvised->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->displayValue($arwrk);
                    } else {
                        $this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->CurrentValue;
                    }
                }
            } else {
                $this->TemplateMedicationsadvised->ViewValue = null;
            }
            $this->TemplateMedicationsadvised->ViewCustomAttributes = "";

            // TemplatePostProcedureInstructions
            $curVal = trim(strval($this->TemplatePostProcedureInstructions->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->lookupCacheOption($curVal);
                if ($this->TemplatePostProcedureInstructions->ViewValue === null) { // Lookup from database
                    $filterWrk = "`TemplateName`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`TemplateType`='ET Template Post Procedure Instructions'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->TemplatePostProcedureInstructions->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->TemplatePostProcedureInstructions->Lookup->renderViewRow($rswrk[0]);
                        $this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->displayValue($arwrk);
                    } else {
                        $this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->CurrentValue;
                    }
                }
            } else {
                $this->TemplatePostProcedureInstructions->ViewValue = null;
            }
            $this->TemplatePostProcedureInstructions->ViewCustomAttributes = "";

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

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // PreTreatment
            $this->PreTreatment->LinkCustomAttributes = "";
            $this->PreTreatment->HrefValue = "";
            $this->PreTreatment->TooltipValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";
            $this->Hysteroscopy->TooltipValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";
            $this->EndometrialScratching->TooltipValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";
            $this->TrialCannulation->TooltipValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";
            $this->CYCLETYPE->TooltipValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";
            $this->HRTCYCLE->TooltipValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";
            $this->OralEstrogenDosage->TooltipValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";
            $this->VaginalEstrogen->TooltipValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";
            $this->GCSF->TooltipValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";
            $this->ActivatedPRP->TooltipValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";
            $this->ERA->TooltipValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";
            $this->UCLcm->TooltipValue = "";

            // DATEOFSTART
            $this->DATEOFSTART->LinkCustomAttributes = "";
            $this->DATEOFSTART->HrefValue = "";
            $this->DATEOFSTART->TooltipValue = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->HrefValue = "";
            $this->DATEOFEMBRYOTRANSFER->TooltipValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";
            $this->DAYOFEMBRYOTRANSFER->TooltipValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";
            $this->NOOFEMBRYOSTHAWED->TooltipValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";
            $this->NOOFEMBRYOSTRANSFERRED->TooltipValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";
            $this->DAYOFEMBRYOS->TooltipValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";
            $this->CRYOPRESERVEDEMBRYOS->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // ProcedureRecord
            $this->ProcedureRecord->LinkCustomAttributes = "";
            $this->ProcedureRecord->HrefValue = "";
            $this->ProcedureRecord->TooltipValue = "";

            // Medicationsadvised
            $this->Medicationsadvised->LinkCustomAttributes = "";
            $this->Medicationsadvised->HrefValue = "";
            $this->Medicationsadvised->TooltipValue = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->LinkCustomAttributes = "";
            $this->PostProcedureInstructions->HrefValue = "";
            $this->PostProcedureInstructions->TooltipValue = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
            $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";
            $this->PregnancyTestingWithSerumBetaHcG->TooltipValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";
            $this->ReviewDate->TooltipValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";
            $this->ReviewDoctor->TooltipValue = "";

            // TemplateProcedureRecord
            $this->TemplateProcedureRecord->LinkCustomAttributes = "";
            $this->TemplateProcedureRecord->HrefValue = "";
            $this->TemplateProcedureRecord->TooltipValue = "";

            // TemplateMedicationsadvised
            $this->TemplateMedicationsadvised->LinkCustomAttributes = "";
            $this->TemplateMedicationsadvised->HrefValue = "";
            $this->TemplateMedicationsadvised->TooltipValue = "";

            // TemplatePostProcedureInstructions
            $this->TemplatePostProcedureInstructions->LinkCustomAttributes = "";
            $this->TemplatePostProcedureInstructions->HrefValue = "";
            $this->TemplatePostProcedureInstructions->TooltipValue = "";

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
            $this->ARTCycle->EditValue = $this->ARTCycle->options(true);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // Consultant
            $this->Consultant->EditAttrs["class"] = "form-control";
            $this->Consultant->EditCustomAttributes = "";
            if (!$this->Consultant->Raw) {
                $this->Consultant->CurrentValue = HtmlDecode($this->Consultant->CurrentValue);
            }
            $this->Consultant->EditValue = HtmlEncode($this->Consultant->CurrentValue);
            $this->Consultant->PlaceHolder = RemoveHtml($this->Consultant->caption());

            // InseminatinTechnique
            $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
            $this->InseminatinTechnique->EditCustomAttributes = "";
            $this->InseminatinTechnique->EditValue = $this->InseminatinTechnique->options(true);
            $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

            // IndicationForART
            $this->IndicationForART->EditAttrs["class"] = "form-control";
            $this->IndicationForART->EditCustomAttributes = "";
            if (!$this->IndicationForART->Raw) {
                $this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
            }
            $this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
            $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

            // PreTreatment
            $this->PreTreatment->EditAttrs["class"] = "form-control";
            $this->PreTreatment->EditCustomAttributes = "";
            $this->PreTreatment->EditValue = $this->PreTreatment->options(true);
            $this->PreTreatment->PlaceHolder = RemoveHtml($this->PreTreatment->caption());

            // Hysteroscopy
            $this->Hysteroscopy->EditAttrs["class"] = "form-control";
            $this->Hysteroscopy->EditCustomAttributes = "";
            $this->Hysteroscopy->EditValue = $this->Hysteroscopy->options(true);
            $this->Hysteroscopy->PlaceHolder = RemoveHtml($this->Hysteroscopy->caption());

            // EndometrialScratching
            $this->EndometrialScratching->EditAttrs["class"] = "form-control";
            $this->EndometrialScratching->EditCustomAttributes = "";
            $this->EndometrialScratching->EditValue = $this->EndometrialScratching->options(true);
            $this->EndometrialScratching->PlaceHolder = RemoveHtml($this->EndometrialScratching->caption());

            // TrialCannulation
            $this->TrialCannulation->EditAttrs["class"] = "form-control";
            $this->TrialCannulation->EditCustomAttributes = "";
            $this->TrialCannulation->EditValue = $this->TrialCannulation->options(true);
            $this->TrialCannulation->PlaceHolder = RemoveHtml($this->TrialCannulation->caption());

            // CYCLETYPE
            $this->CYCLETYPE->EditAttrs["class"] = "form-control";
            $this->CYCLETYPE->EditCustomAttributes = "";
            $this->CYCLETYPE->EditValue = $this->CYCLETYPE->options(true);
            $this->CYCLETYPE->PlaceHolder = RemoveHtml($this->CYCLETYPE->caption());

            // HRTCYCLE
            $this->HRTCYCLE->EditAttrs["class"] = "form-control";
            $this->HRTCYCLE->EditCustomAttributes = "";
            if (!$this->HRTCYCLE->Raw) {
                $this->HRTCYCLE->CurrentValue = HtmlDecode($this->HRTCYCLE->CurrentValue);
            }
            $this->HRTCYCLE->EditValue = HtmlEncode($this->HRTCYCLE->CurrentValue);
            $this->HRTCYCLE->PlaceHolder = RemoveHtml($this->HRTCYCLE->caption());

            // OralEstrogenDosage
            $this->OralEstrogenDosage->EditAttrs["class"] = "form-control";
            $this->OralEstrogenDosage->EditCustomAttributes = "";
            $this->OralEstrogenDosage->EditValue = $this->OralEstrogenDosage->options(true);
            $this->OralEstrogenDosage->PlaceHolder = RemoveHtml($this->OralEstrogenDosage->caption());

            // VaginalEstrogen
            $this->VaginalEstrogen->EditAttrs["class"] = "form-control";
            $this->VaginalEstrogen->EditCustomAttributes = "";
            if (!$this->VaginalEstrogen->Raw) {
                $this->VaginalEstrogen->CurrentValue = HtmlDecode($this->VaginalEstrogen->CurrentValue);
            }
            $this->VaginalEstrogen->EditValue = HtmlEncode($this->VaginalEstrogen->CurrentValue);
            $this->VaginalEstrogen->PlaceHolder = RemoveHtml($this->VaginalEstrogen->caption());

            // GCSF
            $this->GCSF->EditAttrs["class"] = "form-control";
            $this->GCSF->EditCustomAttributes = "";
            $this->GCSF->EditValue = $this->GCSF->options(true);
            $this->GCSF->PlaceHolder = RemoveHtml($this->GCSF->caption());

            // ActivatedPRP
            $this->ActivatedPRP->EditAttrs["class"] = "form-control";
            $this->ActivatedPRP->EditCustomAttributes = "";
            $this->ActivatedPRP->EditValue = $this->ActivatedPRP->options(true);
            $this->ActivatedPRP->PlaceHolder = RemoveHtml($this->ActivatedPRP->caption());

            // ERA
            $this->ERA->EditAttrs["class"] = "form-control";
            $this->ERA->EditCustomAttributes = "";
            $this->ERA->EditValue = $this->ERA->options(true);
            $this->ERA->PlaceHolder = RemoveHtml($this->ERA->caption());

            // UCLcm
            $this->UCLcm->EditAttrs["class"] = "form-control";
            $this->UCLcm->EditCustomAttributes = "";
            if (!$this->UCLcm->Raw) {
                $this->UCLcm->CurrentValue = HtmlDecode($this->UCLcm->CurrentValue);
            }
            $this->UCLcm->EditValue = HtmlEncode($this->UCLcm->CurrentValue);
            $this->UCLcm->PlaceHolder = RemoveHtml($this->UCLcm->caption());

            // DATEOFSTART
            $this->DATEOFSTART->EditAttrs["class"] = "form-control";
            $this->DATEOFSTART->EditCustomAttributes = "";
            $this->DATEOFSTART->EditValue = HtmlEncode(FormatDateTime($this->DATEOFSTART->CurrentValue, 11));
            $this->DATEOFSTART->PlaceHolder = RemoveHtml($this->DATEOFSTART->caption());

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DATEOFEMBRYOTRANSFER->EditCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->EditValue = HtmlEncode(FormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11));
            $this->DATEOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DATEOFEMBRYOTRANSFER->caption());

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOTRANSFER->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOTRANSFER->Raw) {
                $this->DAYOFEMBRYOTRANSFER->CurrentValue = HtmlDecode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            }
            $this->DAYOFEMBRYOTRANSFER->EditValue = HtmlEncode($this->DAYOFEMBRYOTRANSFER->CurrentValue);
            $this->DAYOFEMBRYOTRANSFER->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOTRANSFER->caption());

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTHAWED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTHAWED->Raw) {
                $this->NOOFEMBRYOSTHAWED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            }
            $this->NOOFEMBRYOSTHAWED->EditValue = HtmlEncode($this->NOOFEMBRYOSTHAWED->CurrentValue);
            $this->NOOFEMBRYOSTHAWED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTHAWED->caption());

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->EditAttrs["class"] = "form-control";
            $this->NOOFEMBRYOSTRANSFERRED->EditCustomAttributes = "";
            if (!$this->NOOFEMBRYOSTRANSFERRED->Raw) {
                $this->NOOFEMBRYOSTRANSFERRED->CurrentValue = HtmlDecode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            }
            $this->NOOFEMBRYOSTRANSFERRED->EditValue = HtmlEncode($this->NOOFEMBRYOSTRANSFERRED->CurrentValue);
            $this->NOOFEMBRYOSTRANSFERRED->PlaceHolder = RemoveHtml($this->NOOFEMBRYOSTRANSFERRED->caption());

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->EditAttrs["class"] = "form-control";
            $this->DAYOFEMBRYOS->EditCustomAttributes = "";
            if (!$this->DAYOFEMBRYOS->Raw) {
                $this->DAYOFEMBRYOS->CurrentValue = HtmlDecode($this->DAYOFEMBRYOS->CurrentValue);
            }
            $this->DAYOFEMBRYOS->EditValue = HtmlEncode($this->DAYOFEMBRYOS->CurrentValue);
            $this->DAYOFEMBRYOS->PlaceHolder = RemoveHtml($this->DAYOFEMBRYOS->caption());

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->EditAttrs["class"] = "form-control";
            $this->CRYOPRESERVEDEMBRYOS->EditCustomAttributes = "";
            if (!$this->CRYOPRESERVEDEMBRYOS->Raw) {
                $this->CRYOPRESERVEDEMBRYOS->CurrentValue = HtmlDecode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            }
            $this->CRYOPRESERVEDEMBRYOS->EditValue = HtmlEncode($this->CRYOPRESERVEDEMBRYOS->CurrentValue);
            $this->CRYOPRESERVEDEMBRYOS->PlaceHolder = RemoveHtml($this->CRYOPRESERVEDEMBRYOS->caption());

            // Code1
            $this->Code1->EditAttrs["class"] = "form-control";
            $this->Code1->EditCustomAttributes = "";
            if (!$this->Code1->Raw) {
                $this->Code1->CurrentValue = HtmlDecode($this->Code1->CurrentValue);
            }
            $this->Code1->EditValue = HtmlEncode($this->Code1->CurrentValue);
            $this->Code1->PlaceHolder = RemoveHtml($this->Code1->caption());

            // Code2
            $this->Code2->EditAttrs["class"] = "form-control";
            $this->Code2->EditCustomAttributes = "";
            if (!$this->Code2->Raw) {
                $this->Code2->CurrentValue = HtmlDecode($this->Code2->CurrentValue);
            }
            $this->Code2->EditValue = HtmlEncode($this->Code2->CurrentValue);
            $this->Code2->PlaceHolder = RemoveHtml($this->Code2->caption());

            // CellStage1
            $this->CellStage1->EditAttrs["class"] = "form-control";
            $this->CellStage1->EditCustomAttributes = "";
            if (!$this->CellStage1->Raw) {
                $this->CellStage1->CurrentValue = HtmlDecode($this->CellStage1->CurrentValue);
            }
            $this->CellStage1->EditValue = HtmlEncode($this->CellStage1->CurrentValue);
            $this->CellStage1->PlaceHolder = RemoveHtml($this->CellStage1->caption());

            // CellStage2
            $this->CellStage2->EditAttrs["class"] = "form-control";
            $this->CellStage2->EditCustomAttributes = "";
            if (!$this->CellStage2->Raw) {
                $this->CellStage2->CurrentValue = HtmlDecode($this->CellStage2->CurrentValue);
            }
            $this->CellStage2->EditValue = HtmlEncode($this->CellStage2->CurrentValue);
            $this->CellStage2->PlaceHolder = RemoveHtml($this->CellStage2->caption());

            // Grade1
            $this->Grade1->EditAttrs["class"] = "form-control";
            $this->Grade1->EditCustomAttributes = "";
            if (!$this->Grade1->Raw) {
                $this->Grade1->CurrentValue = HtmlDecode($this->Grade1->CurrentValue);
            }
            $this->Grade1->EditValue = HtmlEncode($this->Grade1->CurrentValue);
            $this->Grade1->PlaceHolder = RemoveHtml($this->Grade1->caption());

            // Grade2
            $this->Grade2->EditAttrs["class"] = "form-control";
            $this->Grade2->EditCustomAttributes = "";
            if (!$this->Grade2->Raw) {
                $this->Grade2->CurrentValue = HtmlDecode($this->Grade2->CurrentValue);
            }
            $this->Grade2->EditValue = HtmlEncode($this->Grade2->CurrentValue);
            $this->Grade2->PlaceHolder = RemoveHtml($this->Grade2->caption());

            // ProcedureRecord
            $this->ProcedureRecord->EditAttrs["class"] = "form-control";
            $this->ProcedureRecord->EditCustomAttributes = "";
            $this->ProcedureRecord->EditValue = HtmlEncode($this->ProcedureRecord->CurrentValue);
            $this->ProcedureRecord->PlaceHolder = RemoveHtml($this->ProcedureRecord->caption());

            // Medicationsadvised
            $this->Medicationsadvised->EditAttrs["class"] = "form-control";
            $this->Medicationsadvised->EditCustomAttributes = "";
            $this->Medicationsadvised->EditValue = HtmlEncode($this->Medicationsadvised->CurrentValue);
            $this->Medicationsadvised->PlaceHolder = RemoveHtml($this->Medicationsadvised->caption());

            // PostProcedureInstructions
            $this->PostProcedureInstructions->EditAttrs["class"] = "form-control";
            $this->PostProcedureInstructions->EditCustomAttributes = "";
            $this->PostProcedureInstructions->EditValue = HtmlEncode($this->PostProcedureInstructions->CurrentValue);
            $this->PostProcedureInstructions->PlaceHolder = RemoveHtml($this->PostProcedureInstructions->caption());

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->EditAttrs["class"] = "form-control";
            $this->PregnancyTestingWithSerumBetaHcG->EditCustomAttributes = "";
            if (!$this->PregnancyTestingWithSerumBetaHcG->Raw) {
                $this->PregnancyTestingWithSerumBetaHcG->CurrentValue = HtmlDecode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
            }
            $this->PregnancyTestingWithSerumBetaHcG->EditValue = HtmlEncode($this->PregnancyTestingWithSerumBetaHcG->CurrentValue);
            $this->PregnancyTestingWithSerumBetaHcG->PlaceHolder = RemoveHtml($this->PregnancyTestingWithSerumBetaHcG->caption());

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

            // TemplateProcedureRecord
            $this->TemplateProcedureRecord->EditAttrs["class"] = "form-control";
            $this->TemplateProcedureRecord->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateProcedureRecord->CurrentValue));
            if ($curVal != "") {
                $this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->lookupCacheOption($curVal);
            } else {
                $this->TemplateProcedureRecord->ViewValue = $this->TemplateProcedureRecord->Lookup !== null && is_array($this->TemplateProcedureRecord->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateProcedureRecord->ViewValue !== null) { // Load from cache
                $this->TemplateProcedureRecord->EditValue = array_values($this->TemplateProcedureRecord->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateProcedureRecord->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ET Template Procedure Record'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateProcedureRecord->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateProcedureRecord->EditValue = $arwrk;
            }
            $this->TemplateProcedureRecord->PlaceHolder = RemoveHtml($this->TemplateProcedureRecord->caption());

            // TemplateMedicationsadvised
            $this->TemplateMedicationsadvised->EditAttrs["class"] = "form-control";
            $this->TemplateMedicationsadvised->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplateMedicationsadvised->CurrentValue));
            if ($curVal != "") {
                $this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->lookupCacheOption($curVal);
            } else {
                $this->TemplateMedicationsadvised->ViewValue = $this->TemplateMedicationsadvised->Lookup !== null && is_array($this->TemplateMedicationsadvised->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplateMedicationsadvised->ViewValue !== null) { // Load from cache
                $this->TemplateMedicationsadvised->EditValue = array_values($this->TemplateMedicationsadvised->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplateMedicationsadvised->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ET Template Medications Advised'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplateMedicationsadvised->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplateMedicationsadvised->EditValue = $arwrk;
            }
            $this->TemplateMedicationsadvised->PlaceHolder = RemoveHtml($this->TemplateMedicationsadvised->caption());

            // TemplatePostProcedureInstructions
            $this->TemplatePostProcedureInstructions->EditAttrs["class"] = "form-control";
            $this->TemplatePostProcedureInstructions->EditCustomAttributes = "";
            $curVal = trim(strval($this->TemplatePostProcedureInstructions->CurrentValue));
            if ($curVal != "") {
                $this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->lookupCacheOption($curVal);
            } else {
                $this->TemplatePostProcedureInstructions->ViewValue = $this->TemplatePostProcedureInstructions->Lookup !== null && is_array($this->TemplatePostProcedureInstructions->Lookup->Options) ? $curVal : null;
            }
            if ($this->TemplatePostProcedureInstructions->ViewValue !== null) { // Load from cache
                $this->TemplatePostProcedureInstructions->EditValue = array_values($this->TemplatePostProcedureInstructions->Lookup->Options);
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`TemplateName`" . SearchString("=", $this->TemplatePostProcedureInstructions->CurrentValue, DATATYPE_STRING, "");
                }
                $lookupFilter = function() {
                    return "`TemplateType`='ET Template Post Procedure Instructions'";
                };
                $lookupFilter = $lookupFilter->bindTo($this);
                $sqlWrk = $this->TemplatePostProcedureInstructions->Lookup->getSql(true, $filterWrk, $lookupFilter, $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                $arwrk = $rswrk;
                $this->TemplatePostProcedureInstructions->EditValue = $arwrk;
            }
            $this->TemplatePostProcedureInstructions->PlaceHolder = RemoveHtml($this->TemplatePostProcedureInstructions->caption());

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

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";

            // PreTreatment
            $this->PreTreatment->LinkCustomAttributes = "";
            $this->PreTreatment->HrefValue = "";

            // Hysteroscopy
            $this->Hysteroscopy->LinkCustomAttributes = "";
            $this->Hysteroscopy->HrefValue = "";

            // EndometrialScratching
            $this->EndometrialScratching->LinkCustomAttributes = "";
            $this->EndometrialScratching->HrefValue = "";

            // TrialCannulation
            $this->TrialCannulation->LinkCustomAttributes = "";
            $this->TrialCannulation->HrefValue = "";

            // CYCLETYPE
            $this->CYCLETYPE->LinkCustomAttributes = "";
            $this->CYCLETYPE->HrefValue = "";

            // HRTCYCLE
            $this->HRTCYCLE->LinkCustomAttributes = "";
            $this->HRTCYCLE->HrefValue = "";

            // OralEstrogenDosage
            $this->OralEstrogenDosage->LinkCustomAttributes = "";
            $this->OralEstrogenDosage->HrefValue = "";

            // VaginalEstrogen
            $this->VaginalEstrogen->LinkCustomAttributes = "";
            $this->VaginalEstrogen->HrefValue = "";

            // GCSF
            $this->GCSF->LinkCustomAttributes = "";
            $this->GCSF->HrefValue = "";

            // ActivatedPRP
            $this->ActivatedPRP->LinkCustomAttributes = "";
            $this->ActivatedPRP->HrefValue = "";

            // ERA
            $this->ERA->LinkCustomAttributes = "";
            $this->ERA->HrefValue = "";

            // UCLcm
            $this->UCLcm->LinkCustomAttributes = "";
            $this->UCLcm->HrefValue = "";

            // DATEOFSTART
            $this->DATEOFSTART->LinkCustomAttributes = "";
            $this->DATEOFSTART->HrefValue = "";

            // DATEOFEMBRYOTRANSFER
            $this->DATEOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DATEOFEMBRYOTRANSFER->HrefValue = "";

            // DAYOFEMBRYOTRANSFER
            $this->DAYOFEMBRYOTRANSFER->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOTRANSFER->HrefValue = "";

            // NOOFEMBRYOSTHAWED
            $this->NOOFEMBRYOSTHAWED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTHAWED->HrefValue = "";

            // NOOFEMBRYOSTRANSFERRED
            $this->NOOFEMBRYOSTRANSFERRED->LinkCustomAttributes = "";
            $this->NOOFEMBRYOSTRANSFERRED->HrefValue = "";

            // DAYOFEMBRYOS
            $this->DAYOFEMBRYOS->LinkCustomAttributes = "";
            $this->DAYOFEMBRYOS->HrefValue = "";

            // CRYOPRESERVEDEMBRYOS
            $this->CRYOPRESERVEDEMBRYOS->LinkCustomAttributes = "";
            $this->CRYOPRESERVEDEMBRYOS->HrefValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";

            // ProcedureRecord
            $this->ProcedureRecord->LinkCustomAttributes = "";
            $this->ProcedureRecord->HrefValue = "";

            // Medicationsadvised
            $this->Medicationsadvised->LinkCustomAttributes = "";
            $this->Medicationsadvised->HrefValue = "";

            // PostProcedureInstructions
            $this->PostProcedureInstructions->LinkCustomAttributes = "";
            $this->PostProcedureInstructions->HrefValue = "";

            // PregnancyTestingWithSerumBetaHcG
            $this->PregnancyTestingWithSerumBetaHcG->LinkCustomAttributes = "";
            $this->PregnancyTestingWithSerumBetaHcG->HrefValue = "";

            // ReviewDate
            $this->ReviewDate->LinkCustomAttributes = "";
            $this->ReviewDate->HrefValue = "";

            // ReviewDoctor
            $this->ReviewDoctor->LinkCustomAttributes = "";
            $this->ReviewDoctor->HrefValue = "";

            // TemplateProcedureRecord
            $this->TemplateProcedureRecord->LinkCustomAttributes = "";
            $this->TemplateProcedureRecord->HrefValue = "";

            // TemplateMedicationsadvised
            $this->TemplateMedicationsadvised->LinkCustomAttributes = "";
            $this->TemplateMedicationsadvised->HrefValue = "";

            // TemplatePostProcedureInstructions
            $this->TemplatePostProcedureInstructions->LinkCustomAttributes = "";
            $this->TemplatePostProcedureInstructions->HrefValue = "";

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
        if ($this->InseminatinTechnique->Required) {
            if (!$this->InseminatinTechnique->IsDetailKey && EmptyValue($this->InseminatinTechnique->FormValue)) {
                $this->InseminatinTechnique->addErrorMessage(str_replace("%s", $this->InseminatinTechnique->caption(), $this->InseminatinTechnique->RequiredErrorMessage));
            }
        }
        if ($this->IndicationForART->Required) {
            if (!$this->IndicationForART->IsDetailKey && EmptyValue($this->IndicationForART->FormValue)) {
                $this->IndicationForART->addErrorMessage(str_replace("%s", $this->IndicationForART->caption(), $this->IndicationForART->RequiredErrorMessage));
            }
        }
        if ($this->PreTreatment->Required) {
            if (!$this->PreTreatment->IsDetailKey && EmptyValue($this->PreTreatment->FormValue)) {
                $this->PreTreatment->addErrorMessage(str_replace("%s", $this->PreTreatment->caption(), $this->PreTreatment->RequiredErrorMessage));
            }
        }
        if ($this->Hysteroscopy->Required) {
            if (!$this->Hysteroscopy->IsDetailKey && EmptyValue($this->Hysteroscopy->FormValue)) {
                $this->Hysteroscopy->addErrorMessage(str_replace("%s", $this->Hysteroscopy->caption(), $this->Hysteroscopy->RequiredErrorMessage));
            }
        }
        if ($this->EndometrialScratching->Required) {
            if (!$this->EndometrialScratching->IsDetailKey && EmptyValue($this->EndometrialScratching->FormValue)) {
                $this->EndometrialScratching->addErrorMessage(str_replace("%s", $this->EndometrialScratching->caption(), $this->EndometrialScratching->RequiredErrorMessage));
            }
        }
        if ($this->TrialCannulation->Required) {
            if (!$this->TrialCannulation->IsDetailKey && EmptyValue($this->TrialCannulation->FormValue)) {
                $this->TrialCannulation->addErrorMessage(str_replace("%s", $this->TrialCannulation->caption(), $this->TrialCannulation->RequiredErrorMessage));
            }
        }
        if ($this->CYCLETYPE->Required) {
            if (!$this->CYCLETYPE->IsDetailKey && EmptyValue($this->CYCLETYPE->FormValue)) {
                $this->CYCLETYPE->addErrorMessage(str_replace("%s", $this->CYCLETYPE->caption(), $this->CYCLETYPE->RequiredErrorMessage));
            }
        }
        if ($this->HRTCYCLE->Required) {
            if (!$this->HRTCYCLE->IsDetailKey && EmptyValue($this->HRTCYCLE->FormValue)) {
                $this->HRTCYCLE->addErrorMessage(str_replace("%s", $this->HRTCYCLE->caption(), $this->HRTCYCLE->RequiredErrorMessage));
            }
        }
        if ($this->OralEstrogenDosage->Required) {
            if (!$this->OralEstrogenDosage->IsDetailKey && EmptyValue($this->OralEstrogenDosage->FormValue)) {
                $this->OralEstrogenDosage->addErrorMessage(str_replace("%s", $this->OralEstrogenDosage->caption(), $this->OralEstrogenDosage->RequiredErrorMessage));
            }
        }
        if ($this->VaginalEstrogen->Required) {
            if (!$this->VaginalEstrogen->IsDetailKey && EmptyValue($this->VaginalEstrogen->FormValue)) {
                $this->VaginalEstrogen->addErrorMessage(str_replace("%s", $this->VaginalEstrogen->caption(), $this->VaginalEstrogen->RequiredErrorMessage));
            }
        }
        if ($this->GCSF->Required) {
            if (!$this->GCSF->IsDetailKey && EmptyValue($this->GCSF->FormValue)) {
                $this->GCSF->addErrorMessage(str_replace("%s", $this->GCSF->caption(), $this->GCSF->RequiredErrorMessage));
            }
        }
        if ($this->ActivatedPRP->Required) {
            if (!$this->ActivatedPRP->IsDetailKey && EmptyValue($this->ActivatedPRP->FormValue)) {
                $this->ActivatedPRP->addErrorMessage(str_replace("%s", $this->ActivatedPRP->caption(), $this->ActivatedPRP->RequiredErrorMessage));
            }
        }
        if ($this->ERA->Required) {
            if (!$this->ERA->IsDetailKey && EmptyValue($this->ERA->FormValue)) {
                $this->ERA->addErrorMessage(str_replace("%s", $this->ERA->caption(), $this->ERA->RequiredErrorMessage));
            }
        }
        if ($this->UCLcm->Required) {
            if (!$this->UCLcm->IsDetailKey && EmptyValue($this->UCLcm->FormValue)) {
                $this->UCLcm->addErrorMessage(str_replace("%s", $this->UCLcm->caption(), $this->UCLcm->RequiredErrorMessage));
            }
        }
        if ($this->DATEOFSTART->Required) {
            if (!$this->DATEOFSTART->IsDetailKey && EmptyValue($this->DATEOFSTART->FormValue)) {
                $this->DATEOFSTART->addErrorMessage(str_replace("%s", $this->DATEOFSTART->caption(), $this->DATEOFSTART->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DATEOFSTART->FormValue)) {
            $this->DATEOFSTART->addErrorMessage($this->DATEOFSTART->getErrorMessage(false));
        }
        if ($this->DATEOFEMBRYOTRANSFER->Required) {
            if (!$this->DATEOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DATEOFEMBRYOTRANSFER->FormValue)) {
                $this->DATEOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DATEOFEMBRYOTRANSFER->caption(), $this->DATEOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if (!CheckEuroDate($this->DATEOFEMBRYOTRANSFER->FormValue)) {
            $this->DATEOFEMBRYOTRANSFER->addErrorMessage($this->DATEOFEMBRYOTRANSFER->getErrorMessage(false));
        }
        if ($this->DAYOFEMBRYOTRANSFER->Required) {
            if (!$this->DAYOFEMBRYOTRANSFER->IsDetailKey && EmptyValue($this->DAYOFEMBRYOTRANSFER->FormValue)) {
                $this->DAYOFEMBRYOTRANSFER->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOTRANSFER->caption(), $this->DAYOFEMBRYOTRANSFER->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTHAWED->Required) {
            if (!$this->NOOFEMBRYOSTHAWED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTHAWED->FormValue)) {
                $this->NOOFEMBRYOSTHAWED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTHAWED->caption(), $this->NOOFEMBRYOSTHAWED->RequiredErrorMessage));
            }
        }
        if ($this->NOOFEMBRYOSTRANSFERRED->Required) {
            if (!$this->NOOFEMBRYOSTRANSFERRED->IsDetailKey && EmptyValue($this->NOOFEMBRYOSTRANSFERRED->FormValue)) {
                $this->NOOFEMBRYOSTRANSFERRED->addErrorMessage(str_replace("%s", $this->NOOFEMBRYOSTRANSFERRED->caption(), $this->NOOFEMBRYOSTRANSFERRED->RequiredErrorMessage));
            }
        }
        if ($this->DAYOFEMBRYOS->Required) {
            if (!$this->DAYOFEMBRYOS->IsDetailKey && EmptyValue($this->DAYOFEMBRYOS->FormValue)) {
                $this->DAYOFEMBRYOS->addErrorMessage(str_replace("%s", $this->DAYOFEMBRYOS->caption(), $this->DAYOFEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->CRYOPRESERVEDEMBRYOS->Required) {
            if (!$this->CRYOPRESERVEDEMBRYOS->IsDetailKey && EmptyValue($this->CRYOPRESERVEDEMBRYOS->FormValue)) {
                $this->CRYOPRESERVEDEMBRYOS->addErrorMessage(str_replace("%s", $this->CRYOPRESERVEDEMBRYOS->caption(), $this->CRYOPRESERVEDEMBRYOS->RequiredErrorMessage));
            }
        }
        if ($this->Code1->Required) {
            if (!$this->Code1->IsDetailKey && EmptyValue($this->Code1->FormValue)) {
                $this->Code1->addErrorMessage(str_replace("%s", $this->Code1->caption(), $this->Code1->RequiredErrorMessage));
            }
        }
        if ($this->Code2->Required) {
            if (!$this->Code2->IsDetailKey && EmptyValue($this->Code2->FormValue)) {
                $this->Code2->addErrorMessage(str_replace("%s", $this->Code2->caption(), $this->Code2->RequiredErrorMessage));
            }
        }
        if ($this->CellStage1->Required) {
            if (!$this->CellStage1->IsDetailKey && EmptyValue($this->CellStage1->FormValue)) {
                $this->CellStage1->addErrorMessage(str_replace("%s", $this->CellStage1->caption(), $this->CellStage1->RequiredErrorMessage));
            }
        }
        if ($this->CellStage2->Required) {
            if (!$this->CellStage2->IsDetailKey && EmptyValue($this->CellStage2->FormValue)) {
                $this->CellStage2->addErrorMessage(str_replace("%s", $this->CellStage2->caption(), $this->CellStage2->RequiredErrorMessage));
            }
        }
        if ($this->Grade1->Required) {
            if (!$this->Grade1->IsDetailKey && EmptyValue($this->Grade1->FormValue)) {
                $this->Grade1->addErrorMessage(str_replace("%s", $this->Grade1->caption(), $this->Grade1->RequiredErrorMessage));
            }
        }
        if ($this->Grade2->Required) {
            if (!$this->Grade2->IsDetailKey && EmptyValue($this->Grade2->FormValue)) {
                $this->Grade2->addErrorMessage(str_replace("%s", $this->Grade2->caption(), $this->Grade2->RequiredErrorMessage));
            }
        }
        if ($this->ProcedureRecord->Required) {
            if (!$this->ProcedureRecord->IsDetailKey && EmptyValue($this->ProcedureRecord->FormValue)) {
                $this->ProcedureRecord->addErrorMessage(str_replace("%s", $this->ProcedureRecord->caption(), $this->ProcedureRecord->RequiredErrorMessage));
            }
        }
        if ($this->Medicationsadvised->Required) {
            if (!$this->Medicationsadvised->IsDetailKey && EmptyValue($this->Medicationsadvised->FormValue)) {
                $this->Medicationsadvised->addErrorMessage(str_replace("%s", $this->Medicationsadvised->caption(), $this->Medicationsadvised->RequiredErrorMessage));
            }
        }
        if ($this->PostProcedureInstructions->Required) {
            if (!$this->PostProcedureInstructions->IsDetailKey && EmptyValue($this->PostProcedureInstructions->FormValue)) {
                $this->PostProcedureInstructions->addErrorMessage(str_replace("%s", $this->PostProcedureInstructions->caption(), $this->PostProcedureInstructions->RequiredErrorMessage));
            }
        }
        if ($this->PregnancyTestingWithSerumBetaHcG->Required) {
            if (!$this->PregnancyTestingWithSerumBetaHcG->IsDetailKey && EmptyValue($this->PregnancyTestingWithSerumBetaHcG->FormValue)) {
                $this->PregnancyTestingWithSerumBetaHcG->addErrorMessage(str_replace("%s", $this->PregnancyTestingWithSerumBetaHcG->caption(), $this->PregnancyTestingWithSerumBetaHcG->RequiredErrorMessage));
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
        if ($this->TemplateProcedureRecord->Required) {
            if (!$this->TemplateProcedureRecord->IsDetailKey && EmptyValue($this->TemplateProcedureRecord->FormValue)) {
                $this->TemplateProcedureRecord->addErrorMessage(str_replace("%s", $this->TemplateProcedureRecord->caption(), $this->TemplateProcedureRecord->RequiredErrorMessage));
            }
        }
        if ($this->TemplateMedicationsadvised->Required) {
            if (!$this->TemplateMedicationsadvised->IsDetailKey && EmptyValue($this->TemplateMedicationsadvised->FormValue)) {
                $this->TemplateMedicationsadvised->addErrorMessage(str_replace("%s", $this->TemplateMedicationsadvised->caption(), $this->TemplateMedicationsadvised->RequiredErrorMessage));
            }
        }
        if ($this->TemplatePostProcedureInstructions->Required) {
            if (!$this->TemplatePostProcedureInstructions->IsDetailKey && EmptyValue($this->TemplatePostProcedureInstructions->FormValue)) {
                $this->TemplatePostProcedureInstructions->addErrorMessage(str_replace("%s", $this->TemplatePostProcedureInstructions->caption(), $this->TemplatePostProcedureInstructions->RequiredErrorMessage));
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

        // InseminatinTechnique
        $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, false);

        // IndicationForART
        $this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, null, false);

        // PreTreatment
        $this->PreTreatment->setDbValueDef($rsnew, $this->PreTreatment->CurrentValue, null, false);

        // Hysteroscopy
        $this->Hysteroscopy->setDbValueDef($rsnew, $this->Hysteroscopy->CurrentValue, null, false);

        // EndometrialScratching
        $this->EndometrialScratching->setDbValueDef($rsnew, $this->EndometrialScratching->CurrentValue, null, false);

        // TrialCannulation
        $this->TrialCannulation->setDbValueDef($rsnew, $this->TrialCannulation->CurrentValue, null, false);

        // CYCLETYPE
        $this->CYCLETYPE->setDbValueDef($rsnew, $this->CYCLETYPE->CurrentValue, null, false);

        // HRTCYCLE
        $this->HRTCYCLE->setDbValueDef($rsnew, $this->HRTCYCLE->CurrentValue, null, false);

        // OralEstrogenDosage
        $this->OralEstrogenDosage->setDbValueDef($rsnew, $this->OralEstrogenDosage->CurrentValue, null, false);

        // VaginalEstrogen
        $this->VaginalEstrogen->setDbValueDef($rsnew, $this->VaginalEstrogen->CurrentValue, null, false);

        // GCSF
        $this->GCSF->setDbValueDef($rsnew, $this->GCSF->CurrentValue, null, false);

        // ActivatedPRP
        $this->ActivatedPRP->setDbValueDef($rsnew, $this->ActivatedPRP->CurrentValue, null, false);

        // ERA
        $this->ERA->setDbValueDef($rsnew, $this->ERA->CurrentValue, null, false);

        // UCLcm
        $this->UCLcm->setDbValueDef($rsnew, $this->UCLcm->CurrentValue, null, false);

        // DATEOFSTART
        $this->DATEOFSTART->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFSTART->CurrentValue, 11), null, false);

        // DATEOFEMBRYOTRANSFER
        $this->DATEOFEMBRYOTRANSFER->setDbValueDef($rsnew, UnFormatDateTime($this->DATEOFEMBRYOTRANSFER->CurrentValue, 11), null, false);

        // DAYOFEMBRYOTRANSFER
        $this->DAYOFEMBRYOTRANSFER->setDbValueDef($rsnew, $this->DAYOFEMBRYOTRANSFER->CurrentValue, null, false);

        // NOOFEMBRYOSTHAWED
        $this->NOOFEMBRYOSTHAWED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTHAWED->CurrentValue, null, false);

        // NOOFEMBRYOSTRANSFERRED
        $this->NOOFEMBRYOSTRANSFERRED->setDbValueDef($rsnew, $this->NOOFEMBRYOSTRANSFERRED->CurrentValue, null, false);

        // DAYOFEMBRYOS
        $this->DAYOFEMBRYOS->setDbValueDef($rsnew, $this->DAYOFEMBRYOS->CurrentValue, null, false);

        // CRYOPRESERVEDEMBRYOS
        $this->CRYOPRESERVEDEMBRYOS->setDbValueDef($rsnew, $this->CRYOPRESERVEDEMBRYOS->CurrentValue, null, false);

        // Code1
        $this->Code1->setDbValueDef($rsnew, $this->Code1->CurrentValue, null, false);

        // Code2
        $this->Code2->setDbValueDef($rsnew, $this->Code2->CurrentValue, null, false);

        // CellStage1
        $this->CellStage1->setDbValueDef($rsnew, $this->CellStage1->CurrentValue, null, false);

        // CellStage2
        $this->CellStage2->setDbValueDef($rsnew, $this->CellStage2->CurrentValue, null, false);

        // Grade1
        $this->Grade1->setDbValueDef($rsnew, $this->Grade1->CurrentValue, null, false);

        // Grade2
        $this->Grade2->setDbValueDef($rsnew, $this->Grade2->CurrentValue, null, false);

        // ProcedureRecord
        $this->ProcedureRecord->setDbValueDef($rsnew, $this->ProcedureRecord->CurrentValue, null, false);

        // Medicationsadvised
        $this->Medicationsadvised->setDbValueDef($rsnew, $this->Medicationsadvised->CurrentValue, null, false);

        // PostProcedureInstructions
        $this->PostProcedureInstructions->setDbValueDef($rsnew, $this->PostProcedureInstructions->CurrentValue, null, false);

        // PregnancyTestingWithSerumBetaHcG
        $this->PregnancyTestingWithSerumBetaHcG->setDbValueDef($rsnew, $this->PregnancyTestingWithSerumBetaHcG->CurrentValue, null, false);

        // ReviewDate
        $this->ReviewDate->setDbValueDef($rsnew, UnFormatDateTime($this->ReviewDate->CurrentValue, 0), null, false);

        // ReviewDoctor
        $this->ReviewDoctor->setDbValueDef($rsnew, $this->ReviewDoctor->CurrentValue, null, false);

        // TemplateProcedureRecord
        $this->TemplateProcedureRecord->setDbValueDef($rsnew, $this->TemplateProcedureRecord->CurrentValue, "", false);

        // TemplateMedicationsadvised
        $this->TemplateMedicationsadvised->setDbValueDef($rsnew, $this->TemplateMedicationsadvised->CurrentValue, "", false);

        // TemplatePostProcedureInstructions
        $this->TemplatePostProcedureInstructions->setDbValueDef($rsnew, $this->TemplatePostProcedureInstructions->CurrentValue, "", false);

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
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfEtChartList"), "", $this->TableVar, true);
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
                case "x_ARTCycle":
                    break;
                case "x_InseminatinTechnique":
                    break;
                case "x_PreTreatment":
                    break;
                case "x_Hysteroscopy":
                    break;
                case "x_EndometrialScratching":
                    break;
                case "x_TrialCannulation":
                    break;
                case "x_CYCLETYPE":
                    break;
                case "x_OralEstrogenDosage":
                    break;
                case "x_GCSF":
                    break;
                case "x_ActivatedPRP":
                    break;
                case "x_ERA":
                    break;
                case "x_TemplateProcedureRecord":
                    $lookupFilter = function () {
                        return "`TemplateType`='ET Template Procedure Record'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplateMedicationsadvised":
                    $lookupFilter = function () {
                        return "`TemplateType`='ET Template Medications Advised'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_TemplatePostProcedureInstructions":
                    $lookupFilter = function () {
                        return "`TemplateType`='ET Template Post Procedure Instructions'";
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
