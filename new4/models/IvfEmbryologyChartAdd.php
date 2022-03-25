<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEmbryologyChartAdd extends IvfEmbryologyChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "add";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_embryology_chart';

    // Page object name
    public $PageObjName = "IvfEmbryologyChartAdd";

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

        // Table object (ivf_embryology_chart)
        if (!isset($GLOBALS["ivf_embryology_chart"]) || get_class($GLOBALS["ivf_embryology_chart"]) == PROJECT_NAMESPACE . "ivf_embryology_chart") {
            $GLOBALS["ivf_embryology_chart"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_embryology_chart');
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
                $doc = new $class(Container("ivf_embryology_chart"));
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
                    if ($pageName == "IvfEmbryologyChartView") {
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
        $this->RIDNo->setVisibility();
        $this->Name->setVisibility();
        $this->ARTCycle->setVisibility();
        $this->SpermOrigin->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->IndicationForART->setVisibility();
        $this->Day0sino->setVisibility();
        $this->Day0OocyteStage->setVisibility();
        $this->Day0PolarBodyPosition->setVisibility();
        $this->Day0Breakage->setVisibility();
        $this->Day0Attempts->setVisibility();
        $this->Day0SPZMorpho->setVisibility();
        $this->Day0SPZLocation->setVisibility();
        $this->Day0SpOrgin->setVisibility();
        $this->Day5Cryoptop->setVisibility();
        $this->Day1Sperm->setVisibility();
        $this->Day1PN->setVisibility();
        $this->Day1PB->setVisibility();
        $this->Day1Pronucleus->setVisibility();
        $this->Day1Nucleolus->setVisibility();
        $this->Day1Halo->setVisibility();
        $this->Day2SiNo->setVisibility();
        $this->Day2CellNo->setVisibility();
        $this->Day2Frag->setVisibility();
        $this->Day2Symmetry->setVisibility();
        $this->Day2Cryoptop->setVisibility();
        $this->Day2Grade->setVisibility();
        $this->Day2End->setVisibility();
        $this->Day3Sino->setVisibility();
        $this->Day3CellNo->setVisibility();
        $this->Day3Frag->setVisibility();
        $this->Day3Symmetry->setVisibility();
        $this->Day3ZP->setVisibility();
        $this->Day3Vacoules->setVisibility();
        $this->Day3Grade->setVisibility();
        $this->Day3Cryoptop->setVisibility();
        $this->Day3End->setVisibility();
        $this->Day4SiNo->setVisibility();
        $this->Day4CellNo->setVisibility();
        $this->Day4Frag->setVisibility();
        $this->Day4Symmetry->setVisibility();
        $this->Day4Grade->setVisibility();
        $this->Day4Cryoptop->setVisibility();
        $this->Day4End->setVisibility();
        $this->Day5CellNo->setVisibility();
        $this->Day5ICM->setVisibility();
        $this->Day5TE->setVisibility();
        $this->Day5Observation->setVisibility();
        $this->Day5Collapsed->setVisibility();
        $this->Day5Vacoulles->setVisibility();
        $this->Day5Grade->setVisibility();
        $this->Day6CellNo->setVisibility();
        $this->Day6ICM->setVisibility();
        $this->Day6TE->setVisibility();
        $this->Day6Observation->setVisibility();
        $this->Day6Collapsed->setVisibility();
        $this->Day6Vacoulles->setVisibility();
        $this->Day6Grade->setVisibility();
        $this->Day6Cryoptop->setVisibility();
        $this->EndSiNo->setVisibility();
        $this->EndingDay->setVisibility();
        $this->EndingCellStage->setVisibility();
        $this->EndingGrade->setVisibility();
        $this->EndingState->setVisibility();
        $this->TidNo->setVisibility();
        $this->DidNO->setVisibility();
        $this->ICSiIVFDateTime->setVisibility();
        $this->PrimaryEmbrologist->setVisibility();
        $this->SecondaryEmbrologist->setVisibility();
        $this->Incubator->setVisibility();
        $this->location->setVisibility();
        $this->OocyteNo->setVisibility();
        $this->Stage->setVisibility();
        $this->Remarks->setVisibility();
        $this->vitrificationDate->setVisibility();
        $this->vitriPrimaryEmbryologist->setVisibility();
        $this->vitriSecondaryEmbryologist->setVisibility();
        $this->vitriEmbryoNo->setVisibility();
        $this->thawReFrozen->setVisibility();
        $this->vitriFertilisationDate->setVisibility();
        $this->vitriDay->setVisibility();
        $this->vitriStage->setVisibility();
        $this->vitriGrade->setVisibility();
        $this->vitriIncubator->setVisibility();
        $this->vitriTank->setVisibility();
        $this->vitriCanister->setVisibility();
        $this->vitriGobiet->setVisibility();
        $this->vitriViscotube->setVisibility();
        $this->vitriCryolockNo->setVisibility();
        $this->vitriCryolockColour->setVisibility();
        $this->thawDate->setVisibility();
        $this->thawPrimaryEmbryologist->setVisibility();
        $this->thawSecondaryEmbryologist->setVisibility();
        $this->thawET->setVisibility();
        $this->thawAbserve->setVisibility();
        $this->thawDiscard->setVisibility();
        $this->ETCatheter->setVisibility();
        $this->ETDifficulty->setVisibility();
        $this->ETEasy->setVisibility();
        $this->ETComments->setVisibility();
        $this->ETDoctor->setVisibility();
        $this->ETEmbryologist->setVisibility();
        $this->ETDate->setVisibility();
        $this->Day1End->setVisibility();
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

        // Set up master/detail parameters
        // NOTE: must be after loadOldRecord to prevent master key values overwritten
        $this->setupMasterParms();

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
                    $this->terminate("IvfEmbryologyChartList"); // No matching record, return to list
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
                    if (GetPageName($returnUrl) == "IvfEmbryologyChartList") {
                        $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                    } elseif (GetPageName($returnUrl) == "IvfEmbryologyChartView") {
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
        $this->SpermOrigin->CurrentValue = null;
        $this->SpermOrigin->OldValue = $this->SpermOrigin->CurrentValue;
        $this->InseminatinTechnique->CurrentValue = null;
        $this->InseminatinTechnique->OldValue = $this->InseminatinTechnique->CurrentValue;
        $this->IndicationForART->CurrentValue = null;
        $this->IndicationForART->OldValue = $this->IndicationForART->CurrentValue;
        $this->Day0sino->CurrentValue = null;
        $this->Day0sino->OldValue = $this->Day0sino->CurrentValue;
        $this->Day0OocyteStage->CurrentValue = null;
        $this->Day0OocyteStage->OldValue = $this->Day0OocyteStage->CurrentValue;
        $this->Day0PolarBodyPosition->CurrentValue = null;
        $this->Day0PolarBodyPosition->OldValue = $this->Day0PolarBodyPosition->CurrentValue;
        $this->Day0Breakage->CurrentValue = null;
        $this->Day0Breakage->OldValue = $this->Day0Breakage->CurrentValue;
        $this->Day0Attempts->CurrentValue = null;
        $this->Day0Attempts->OldValue = $this->Day0Attempts->CurrentValue;
        $this->Day0SPZMorpho->CurrentValue = null;
        $this->Day0SPZMorpho->OldValue = $this->Day0SPZMorpho->CurrentValue;
        $this->Day0SPZLocation->CurrentValue = null;
        $this->Day0SPZLocation->OldValue = $this->Day0SPZLocation->CurrentValue;
        $this->Day0SpOrgin->CurrentValue = null;
        $this->Day0SpOrgin->OldValue = $this->Day0SpOrgin->CurrentValue;
        $this->Day5Cryoptop->CurrentValue = null;
        $this->Day5Cryoptop->OldValue = $this->Day5Cryoptop->CurrentValue;
        $this->Day1Sperm->CurrentValue = null;
        $this->Day1Sperm->OldValue = $this->Day1Sperm->CurrentValue;
        $this->Day1PN->CurrentValue = null;
        $this->Day1PN->OldValue = $this->Day1PN->CurrentValue;
        $this->Day1PB->CurrentValue = null;
        $this->Day1PB->OldValue = $this->Day1PB->CurrentValue;
        $this->Day1Pronucleus->CurrentValue = null;
        $this->Day1Pronucleus->OldValue = $this->Day1Pronucleus->CurrentValue;
        $this->Day1Nucleolus->CurrentValue = null;
        $this->Day1Nucleolus->OldValue = $this->Day1Nucleolus->CurrentValue;
        $this->Day1Halo->CurrentValue = null;
        $this->Day1Halo->OldValue = $this->Day1Halo->CurrentValue;
        $this->Day2SiNo->CurrentValue = null;
        $this->Day2SiNo->OldValue = $this->Day2SiNo->CurrentValue;
        $this->Day2CellNo->CurrentValue = null;
        $this->Day2CellNo->OldValue = $this->Day2CellNo->CurrentValue;
        $this->Day2Frag->CurrentValue = null;
        $this->Day2Frag->OldValue = $this->Day2Frag->CurrentValue;
        $this->Day2Symmetry->CurrentValue = null;
        $this->Day2Symmetry->OldValue = $this->Day2Symmetry->CurrentValue;
        $this->Day2Cryoptop->CurrentValue = null;
        $this->Day2Cryoptop->OldValue = $this->Day2Cryoptop->CurrentValue;
        $this->Day2Grade->CurrentValue = null;
        $this->Day2Grade->OldValue = $this->Day2Grade->CurrentValue;
        $this->Day2End->CurrentValue = null;
        $this->Day2End->OldValue = $this->Day2End->CurrentValue;
        $this->Day3Sino->CurrentValue = null;
        $this->Day3Sino->OldValue = $this->Day3Sino->CurrentValue;
        $this->Day3CellNo->CurrentValue = null;
        $this->Day3CellNo->OldValue = $this->Day3CellNo->CurrentValue;
        $this->Day3Frag->CurrentValue = null;
        $this->Day3Frag->OldValue = $this->Day3Frag->CurrentValue;
        $this->Day3Symmetry->CurrentValue = null;
        $this->Day3Symmetry->OldValue = $this->Day3Symmetry->CurrentValue;
        $this->Day3ZP->CurrentValue = null;
        $this->Day3ZP->OldValue = $this->Day3ZP->CurrentValue;
        $this->Day3Vacoules->CurrentValue = null;
        $this->Day3Vacoules->OldValue = $this->Day3Vacoules->CurrentValue;
        $this->Day3Grade->CurrentValue = null;
        $this->Day3Grade->OldValue = $this->Day3Grade->CurrentValue;
        $this->Day3Cryoptop->CurrentValue = null;
        $this->Day3Cryoptop->OldValue = $this->Day3Cryoptop->CurrentValue;
        $this->Day3End->CurrentValue = null;
        $this->Day3End->OldValue = $this->Day3End->CurrentValue;
        $this->Day4SiNo->CurrentValue = null;
        $this->Day4SiNo->OldValue = $this->Day4SiNo->CurrentValue;
        $this->Day4CellNo->CurrentValue = null;
        $this->Day4CellNo->OldValue = $this->Day4CellNo->CurrentValue;
        $this->Day4Frag->CurrentValue = null;
        $this->Day4Frag->OldValue = $this->Day4Frag->CurrentValue;
        $this->Day4Symmetry->CurrentValue = null;
        $this->Day4Symmetry->OldValue = $this->Day4Symmetry->CurrentValue;
        $this->Day4Grade->CurrentValue = null;
        $this->Day4Grade->OldValue = $this->Day4Grade->CurrentValue;
        $this->Day4Cryoptop->CurrentValue = null;
        $this->Day4Cryoptop->OldValue = $this->Day4Cryoptop->CurrentValue;
        $this->Day4End->CurrentValue = null;
        $this->Day4End->OldValue = $this->Day4End->CurrentValue;
        $this->Day5CellNo->CurrentValue = null;
        $this->Day5CellNo->OldValue = $this->Day5CellNo->CurrentValue;
        $this->Day5ICM->CurrentValue = null;
        $this->Day5ICM->OldValue = $this->Day5ICM->CurrentValue;
        $this->Day5TE->CurrentValue = null;
        $this->Day5TE->OldValue = $this->Day5TE->CurrentValue;
        $this->Day5Observation->CurrentValue = null;
        $this->Day5Observation->OldValue = $this->Day5Observation->CurrentValue;
        $this->Day5Collapsed->CurrentValue = null;
        $this->Day5Collapsed->OldValue = $this->Day5Collapsed->CurrentValue;
        $this->Day5Vacoulles->CurrentValue = null;
        $this->Day5Vacoulles->OldValue = $this->Day5Vacoulles->CurrentValue;
        $this->Day5Grade->CurrentValue = null;
        $this->Day5Grade->OldValue = $this->Day5Grade->CurrentValue;
        $this->Day6CellNo->CurrentValue = null;
        $this->Day6CellNo->OldValue = $this->Day6CellNo->CurrentValue;
        $this->Day6ICM->CurrentValue = null;
        $this->Day6ICM->OldValue = $this->Day6ICM->CurrentValue;
        $this->Day6TE->CurrentValue = null;
        $this->Day6TE->OldValue = $this->Day6TE->CurrentValue;
        $this->Day6Observation->CurrentValue = null;
        $this->Day6Observation->OldValue = $this->Day6Observation->CurrentValue;
        $this->Day6Collapsed->CurrentValue = null;
        $this->Day6Collapsed->OldValue = $this->Day6Collapsed->CurrentValue;
        $this->Day6Vacoulles->CurrentValue = null;
        $this->Day6Vacoulles->OldValue = $this->Day6Vacoulles->CurrentValue;
        $this->Day6Grade->CurrentValue = null;
        $this->Day6Grade->OldValue = $this->Day6Grade->CurrentValue;
        $this->Day6Cryoptop->CurrentValue = null;
        $this->Day6Cryoptop->OldValue = $this->Day6Cryoptop->CurrentValue;
        $this->EndSiNo->CurrentValue = null;
        $this->EndSiNo->OldValue = $this->EndSiNo->CurrentValue;
        $this->EndingDay->CurrentValue = null;
        $this->EndingDay->OldValue = $this->EndingDay->CurrentValue;
        $this->EndingCellStage->CurrentValue = null;
        $this->EndingCellStage->OldValue = $this->EndingCellStage->CurrentValue;
        $this->EndingGrade->CurrentValue = null;
        $this->EndingGrade->OldValue = $this->EndingGrade->CurrentValue;
        $this->EndingState->CurrentValue = null;
        $this->EndingState->OldValue = $this->EndingState->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->DidNO->CurrentValue = null;
        $this->DidNO->OldValue = $this->DidNO->CurrentValue;
        $this->ICSiIVFDateTime->CurrentValue = null;
        $this->ICSiIVFDateTime->OldValue = $this->ICSiIVFDateTime->CurrentValue;
        $this->PrimaryEmbrologist->CurrentValue = null;
        $this->PrimaryEmbrologist->OldValue = $this->PrimaryEmbrologist->CurrentValue;
        $this->SecondaryEmbrologist->CurrentValue = null;
        $this->SecondaryEmbrologist->OldValue = $this->SecondaryEmbrologist->CurrentValue;
        $this->Incubator->CurrentValue = null;
        $this->Incubator->OldValue = $this->Incubator->CurrentValue;
        $this->location->CurrentValue = null;
        $this->location->OldValue = $this->location->CurrentValue;
        $this->OocyteNo->CurrentValue = null;
        $this->OocyteNo->OldValue = $this->OocyteNo->CurrentValue;
        $this->Stage->CurrentValue = null;
        $this->Stage->OldValue = $this->Stage->CurrentValue;
        $this->Remarks->CurrentValue = null;
        $this->Remarks->OldValue = $this->Remarks->CurrentValue;
        $this->vitrificationDate->CurrentValue = null;
        $this->vitrificationDate->OldValue = $this->vitrificationDate->CurrentValue;
        $this->vitriPrimaryEmbryologist->CurrentValue = null;
        $this->vitriPrimaryEmbryologist->OldValue = $this->vitriPrimaryEmbryologist->CurrentValue;
        $this->vitriSecondaryEmbryologist->CurrentValue = null;
        $this->vitriSecondaryEmbryologist->OldValue = $this->vitriSecondaryEmbryologist->CurrentValue;
        $this->vitriEmbryoNo->CurrentValue = null;
        $this->vitriEmbryoNo->OldValue = $this->vitriEmbryoNo->CurrentValue;
        $this->thawReFrozen->CurrentValue = null;
        $this->thawReFrozen->OldValue = $this->thawReFrozen->CurrentValue;
        $this->vitriFertilisationDate->CurrentValue = null;
        $this->vitriFertilisationDate->OldValue = $this->vitriFertilisationDate->CurrentValue;
        $this->vitriDay->CurrentValue = null;
        $this->vitriDay->OldValue = $this->vitriDay->CurrentValue;
        $this->vitriStage->CurrentValue = null;
        $this->vitriStage->OldValue = $this->vitriStage->CurrentValue;
        $this->vitriGrade->CurrentValue = null;
        $this->vitriGrade->OldValue = $this->vitriGrade->CurrentValue;
        $this->vitriIncubator->CurrentValue = null;
        $this->vitriIncubator->OldValue = $this->vitriIncubator->CurrentValue;
        $this->vitriTank->CurrentValue = null;
        $this->vitriTank->OldValue = $this->vitriTank->CurrentValue;
        $this->vitriCanister->CurrentValue = null;
        $this->vitriCanister->OldValue = $this->vitriCanister->CurrentValue;
        $this->vitriGobiet->CurrentValue = null;
        $this->vitriGobiet->OldValue = $this->vitriGobiet->CurrentValue;
        $this->vitriViscotube->CurrentValue = null;
        $this->vitriViscotube->OldValue = $this->vitriViscotube->CurrentValue;
        $this->vitriCryolockNo->CurrentValue = null;
        $this->vitriCryolockNo->OldValue = $this->vitriCryolockNo->CurrentValue;
        $this->vitriCryolockColour->CurrentValue = null;
        $this->vitriCryolockColour->OldValue = $this->vitriCryolockColour->CurrentValue;
        $this->thawDate->CurrentValue = null;
        $this->thawDate->OldValue = $this->thawDate->CurrentValue;
        $this->thawPrimaryEmbryologist->CurrentValue = null;
        $this->thawPrimaryEmbryologist->OldValue = $this->thawPrimaryEmbryologist->CurrentValue;
        $this->thawSecondaryEmbryologist->CurrentValue = null;
        $this->thawSecondaryEmbryologist->OldValue = $this->thawSecondaryEmbryologist->CurrentValue;
        $this->thawET->CurrentValue = null;
        $this->thawET->OldValue = $this->thawET->CurrentValue;
        $this->thawAbserve->CurrentValue = null;
        $this->thawAbserve->OldValue = $this->thawAbserve->CurrentValue;
        $this->thawDiscard->CurrentValue = null;
        $this->thawDiscard->OldValue = $this->thawDiscard->CurrentValue;
        $this->ETCatheter->CurrentValue = null;
        $this->ETCatheter->OldValue = $this->ETCatheter->CurrentValue;
        $this->ETDifficulty->CurrentValue = null;
        $this->ETDifficulty->OldValue = $this->ETDifficulty->CurrentValue;
        $this->ETEasy->CurrentValue = null;
        $this->ETEasy->OldValue = $this->ETEasy->CurrentValue;
        $this->ETComments->CurrentValue = null;
        $this->ETComments->OldValue = $this->ETComments->CurrentValue;
        $this->ETDoctor->CurrentValue = null;
        $this->ETDoctor->OldValue = $this->ETDoctor->CurrentValue;
        $this->ETEmbryologist->CurrentValue = null;
        $this->ETEmbryologist->OldValue = $this->ETEmbryologist->CurrentValue;
        $this->ETDate->CurrentValue = null;
        $this->ETDate->OldValue = $this->ETDate->CurrentValue;
        $this->Day1End->CurrentValue = null;
        $this->Day1End->OldValue = $this->Day1End->CurrentValue;
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

        // Check field name 'SpermOrigin' first before field var 'x_SpermOrigin'
        $val = $CurrentForm->hasValue("SpermOrigin") ? $CurrentForm->getValue("SpermOrigin") : $CurrentForm->getValue("x_SpermOrigin");
        if (!$this->SpermOrigin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SpermOrigin->Visible = false; // Disable update for API request
            } else {
                $this->SpermOrigin->setFormValue($val);
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

        // Check field name 'Day0sino' first before field var 'x_Day0sino'
        $val = $CurrentForm->hasValue("Day0sino") ? $CurrentForm->getValue("Day0sino") : $CurrentForm->getValue("x_Day0sino");
        if (!$this->Day0sino->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0sino->Visible = false; // Disable update for API request
            } else {
                $this->Day0sino->setFormValue($val);
            }
        }

        // Check field name 'Day0OocyteStage' first before field var 'x_Day0OocyteStage'
        $val = $CurrentForm->hasValue("Day0OocyteStage") ? $CurrentForm->getValue("Day0OocyteStage") : $CurrentForm->getValue("x_Day0OocyteStage");
        if (!$this->Day0OocyteStage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0OocyteStage->Visible = false; // Disable update for API request
            } else {
                $this->Day0OocyteStage->setFormValue($val);
            }
        }

        // Check field name 'Day0PolarBodyPosition' first before field var 'x_Day0PolarBodyPosition'
        $val = $CurrentForm->hasValue("Day0PolarBodyPosition") ? $CurrentForm->getValue("Day0PolarBodyPosition") : $CurrentForm->getValue("x_Day0PolarBodyPosition");
        if (!$this->Day0PolarBodyPosition->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0PolarBodyPosition->Visible = false; // Disable update for API request
            } else {
                $this->Day0PolarBodyPosition->setFormValue($val);
            }
        }

        // Check field name 'Day0Breakage' first before field var 'x_Day0Breakage'
        $val = $CurrentForm->hasValue("Day0Breakage") ? $CurrentForm->getValue("Day0Breakage") : $CurrentForm->getValue("x_Day0Breakage");
        if (!$this->Day0Breakage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0Breakage->Visible = false; // Disable update for API request
            } else {
                $this->Day0Breakage->setFormValue($val);
            }
        }

        // Check field name 'Day0Attempts' first before field var 'x_Day0Attempts'
        $val = $CurrentForm->hasValue("Day0Attempts") ? $CurrentForm->getValue("Day0Attempts") : $CurrentForm->getValue("x_Day0Attempts");
        if (!$this->Day0Attempts->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0Attempts->Visible = false; // Disable update for API request
            } else {
                $this->Day0Attempts->setFormValue($val);
            }
        }

        // Check field name 'Day0SPZMorpho' first before field var 'x_Day0SPZMorpho'
        $val = $CurrentForm->hasValue("Day0SPZMorpho") ? $CurrentForm->getValue("Day0SPZMorpho") : $CurrentForm->getValue("x_Day0SPZMorpho");
        if (!$this->Day0SPZMorpho->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0SPZMorpho->Visible = false; // Disable update for API request
            } else {
                $this->Day0SPZMorpho->setFormValue($val);
            }
        }

        // Check field name 'Day0SPZLocation' first before field var 'x_Day0SPZLocation'
        $val = $CurrentForm->hasValue("Day0SPZLocation") ? $CurrentForm->getValue("Day0SPZLocation") : $CurrentForm->getValue("x_Day0SPZLocation");
        if (!$this->Day0SPZLocation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0SPZLocation->Visible = false; // Disable update for API request
            } else {
                $this->Day0SPZLocation->setFormValue($val);
            }
        }

        // Check field name 'Day0SpOrgin' first before field var 'x_Day0SpOrgin'
        $val = $CurrentForm->hasValue("Day0SpOrgin") ? $CurrentForm->getValue("Day0SpOrgin") : $CurrentForm->getValue("x_Day0SpOrgin");
        if (!$this->Day0SpOrgin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day0SpOrgin->Visible = false; // Disable update for API request
            } else {
                $this->Day0SpOrgin->setFormValue($val);
            }
        }

        // Check field name 'Day5Cryoptop' first before field var 'x_Day5Cryoptop'
        $val = $CurrentForm->hasValue("Day5Cryoptop") ? $CurrentForm->getValue("Day5Cryoptop") : $CurrentForm->getValue("x_Day5Cryoptop");
        if (!$this->Day5Cryoptop->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5Cryoptop->Visible = false; // Disable update for API request
            } else {
                $this->Day5Cryoptop->setFormValue($val);
            }
        }

        // Check field name 'Day1Sperm' first before field var 'x_Day1Sperm'
        $val = $CurrentForm->hasValue("Day1Sperm") ? $CurrentForm->getValue("Day1Sperm") : $CurrentForm->getValue("x_Day1Sperm");
        if (!$this->Day1Sperm->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1Sperm->Visible = false; // Disable update for API request
            } else {
                $this->Day1Sperm->setFormValue($val);
            }
        }

        // Check field name 'Day1PN' first before field var 'x_Day1PN'
        $val = $CurrentForm->hasValue("Day1PN") ? $CurrentForm->getValue("Day1PN") : $CurrentForm->getValue("x_Day1PN");
        if (!$this->Day1PN->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1PN->Visible = false; // Disable update for API request
            } else {
                $this->Day1PN->setFormValue($val);
            }
        }

        // Check field name 'Day1PB' first before field var 'x_Day1PB'
        $val = $CurrentForm->hasValue("Day1PB") ? $CurrentForm->getValue("Day1PB") : $CurrentForm->getValue("x_Day1PB");
        if (!$this->Day1PB->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1PB->Visible = false; // Disable update for API request
            } else {
                $this->Day1PB->setFormValue($val);
            }
        }

        // Check field name 'Day1Pronucleus' first before field var 'x_Day1Pronucleus'
        $val = $CurrentForm->hasValue("Day1Pronucleus") ? $CurrentForm->getValue("Day1Pronucleus") : $CurrentForm->getValue("x_Day1Pronucleus");
        if (!$this->Day1Pronucleus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1Pronucleus->Visible = false; // Disable update for API request
            } else {
                $this->Day1Pronucleus->setFormValue($val);
            }
        }

        // Check field name 'Day1Nucleolus' first before field var 'x_Day1Nucleolus'
        $val = $CurrentForm->hasValue("Day1Nucleolus") ? $CurrentForm->getValue("Day1Nucleolus") : $CurrentForm->getValue("x_Day1Nucleolus");
        if (!$this->Day1Nucleolus->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1Nucleolus->Visible = false; // Disable update for API request
            } else {
                $this->Day1Nucleolus->setFormValue($val);
            }
        }

        // Check field name 'Day1Halo' first before field var 'x_Day1Halo'
        $val = $CurrentForm->hasValue("Day1Halo") ? $CurrentForm->getValue("Day1Halo") : $CurrentForm->getValue("x_Day1Halo");
        if (!$this->Day1Halo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1Halo->Visible = false; // Disable update for API request
            } else {
                $this->Day1Halo->setFormValue($val);
            }
        }

        // Check field name 'Day2SiNo' first before field var 'x_Day2SiNo'
        $val = $CurrentForm->hasValue("Day2SiNo") ? $CurrentForm->getValue("Day2SiNo") : $CurrentForm->getValue("x_Day2SiNo");
        if (!$this->Day2SiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2SiNo->Visible = false; // Disable update for API request
            } else {
                $this->Day2SiNo->setFormValue($val);
            }
        }

        // Check field name 'Day2CellNo' first before field var 'x_Day2CellNo'
        $val = $CurrentForm->hasValue("Day2CellNo") ? $CurrentForm->getValue("Day2CellNo") : $CurrentForm->getValue("x_Day2CellNo");
        if (!$this->Day2CellNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2CellNo->Visible = false; // Disable update for API request
            } else {
                $this->Day2CellNo->setFormValue($val);
            }
        }

        // Check field name 'Day2Frag' first before field var 'x_Day2Frag'
        $val = $CurrentForm->hasValue("Day2Frag") ? $CurrentForm->getValue("Day2Frag") : $CurrentForm->getValue("x_Day2Frag");
        if (!$this->Day2Frag->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2Frag->Visible = false; // Disable update for API request
            } else {
                $this->Day2Frag->setFormValue($val);
            }
        }

        // Check field name 'Day2Symmetry' first before field var 'x_Day2Symmetry'
        $val = $CurrentForm->hasValue("Day2Symmetry") ? $CurrentForm->getValue("Day2Symmetry") : $CurrentForm->getValue("x_Day2Symmetry");
        if (!$this->Day2Symmetry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2Symmetry->Visible = false; // Disable update for API request
            } else {
                $this->Day2Symmetry->setFormValue($val);
            }
        }

        // Check field name 'Day2Cryoptop' first before field var 'x_Day2Cryoptop'
        $val = $CurrentForm->hasValue("Day2Cryoptop") ? $CurrentForm->getValue("Day2Cryoptop") : $CurrentForm->getValue("x_Day2Cryoptop");
        if (!$this->Day2Cryoptop->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2Cryoptop->Visible = false; // Disable update for API request
            } else {
                $this->Day2Cryoptop->setFormValue($val);
            }
        }

        // Check field name 'Day2Grade' first before field var 'x_Day2Grade'
        $val = $CurrentForm->hasValue("Day2Grade") ? $CurrentForm->getValue("Day2Grade") : $CurrentForm->getValue("x_Day2Grade");
        if (!$this->Day2Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2Grade->Visible = false; // Disable update for API request
            } else {
                $this->Day2Grade->setFormValue($val);
            }
        }

        // Check field name 'Day2End' first before field var 'x_Day2End'
        $val = $CurrentForm->hasValue("Day2End") ? $CurrentForm->getValue("Day2End") : $CurrentForm->getValue("x_Day2End");
        if (!$this->Day2End->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day2End->Visible = false; // Disable update for API request
            } else {
                $this->Day2End->setFormValue($val);
            }
        }

        // Check field name 'Day3Sino' first before field var 'x_Day3Sino'
        $val = $CurrentForm->hasValue("Day3Sino") ? $CurrentForm->getValue("Day3Sino") : $CurrentForm->getValue("x_Day3Sino");
        if (!$this->Day3Sino->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Sino->Visible = false; // Disable update for API request
            } else {
                $this->Day3Sino->setFormValue($val);
            }
        }

        // Check field name 'Day3CellNo' first before field var 'x_Day3CellNo'
        $val = $CurrentForm->hasValue("Day3CellNo") ? $CurrentForm->getValue("Day3CellNo") : $CurrentForm->getValue("x_Day3CellNo");
        if (!$this->Day3CellNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3CellNo->Visible = false; // Disable update for API request
            } else {
                $this->Day3CellNo->setFormValue($val);
            }
        }

        // Check field name 'Day3Frag' first before field var 'x_Day3Frag'
        $val = $CurrentForm->hasValue("Day3Frag") ? $CurrentForm->getValue("Day3Frag") : $CurrentForm->getValue("x_Day3Frag");
        if (!$this->Day3Frag->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Frag->Visible = false; // Disable update for API request
            } else {
                $this->Day3Frag->setFormValue($val);
            }
        }

        // Check field name 'Day3Symmetry' first before field var 'x_Day3Symmetry'
        $val = $CurrentForm->hasValue("Day3Symmetry") ? $CurrentForm->getValue("Day3Symmetry") : $CurrentForm->getValue("x_Day3Symmetry");
        if (!$this->Day3Symmetry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Symmetry->Visible = false; // Disable update for API request
            } else {
                $this->Day3Symmetry->setFormValue($val);
            }
        }

        // Check field name 'Day3ZP' first before field var 'x_Day3ZP'
        $val = $CurrentForm->hasValue("Day3ZP") ? $CurrentForm->getValue("Day3ZP") : $CurrentForm->getValue("x_Day3ZP");
        if (!$this->Day3ZP->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3ZP->Visible = false; // Disable update for API request
            } else {
                $this->Day3ZP->setFormValue($val);
            }
        }

        // Check field name 'Day3Vacoules' first before field var 'x_Day3Vacoules'
        $val = $CurrentForm->hasValue("Day3Vacoules") ? $CurrentForm->getValue("Day3Vacoules") : $CurrentForm->getValue("x_Day3Vacoules");
        if (!$this->Day3Vacoules->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Vacoules->Visible = false; // Disable update for API request
            } else {
                $this->Day3Vacoules->setFormValue($val);
            }
        }

        // Check field name 'Day3Grade' first before field var 'x_Day3Grade'
        $val = $CurrentForm->hasValue("Day3Grade") ? $CurrentForm->getValue("Day3Grade") : $CurrentForm->getValue("x_Day3Grade");
        if (!$this->Day3Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Grade->Visible = false; // Disable update for API request
            } else {
                $this->Day3Grade->setFormValue($val);
            }
        }

        // Check field name 'Day3Cryoptop' first before field var 'x_Day3Cryoptop'
        $val = $CurrentForm->hasValue("Day3Cryoptop") ? $CurrentForm->getValue("Day3Cryoptop") : $CurrentForm->getValue("x_Day3Cryoptop");
        if (!$this->Day3Cryoptop->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3Cryoptop->Visible = false; // Disable update for API request
            } else {
                $this->Day3Cryoptop->setFormValue($val);
            }
        }

        // Check field name 'Day3End' first before field var 'x_Day3End'
        $val = $CurrentForm->hasValue("Day3End") ? $CurrentForm->getValue("Day3End") : $CurrentForm->getValue("x_Day3End");
        if (!$this->Day3End->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day3End->Visible = false; // Disable update for API request
            } else {
                $this->Day3End->setFormValue($val);
            }
        }

        // Check field name 'Day4SiNo' first before field var 'x_Day4SiNo'
        $val = $CurrentForm->hasValue("Day4SiNo") ? $CurrentForm->getValue("Day4SiNo") : $CurrentForm->getValue("x_Day4SiNo");
        if (!$this->Day4SiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4SiNo->Visible = false; // Disable update for API request
            } else {
                $this->Day4SiNo->setFormValue($val);
            }
        }

        // Check field name 'Day4CellNo' first before field var 'x_Day4CellNo'
        $val = $CurrentForm->hasValue("Day4CellNo") ? $CurrentForm->getValue("Day4CellNo") : $CurrentForm->getValue("x_Day4CellNo");
        if (!$this->Day4CellNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4CellNo->Visible = false; // Disable update for API request
            } else {
                $this->Day4CellNo->setFormValue($val);
            }
        }

        // Check field name 'Day4Frag' first before field var 'x_Day4Frag'
        $val = $CurrentForm->hasValue("Day4Frag") ? $CurrentForm->getValue("Day4Frag") : $CurrentForm->getValue("x_Day4Frag");
        if (!$this->Day4Frag->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4Frag->Visible = false; // Disable update for API request
            } else {
                $this->Day4Frag->setFormValue($val);
            }
        }

        // Check field name 'Day4Symmetry' first before field var 'x_Day4Symmetry'
        $val = $CurrentForm->hasValue("Day4Symmetry") ? $CurrentForm->getValue("Day4Symmetry") : $CurrentForm->getValue("x_Day4Symmetry");
        if (!$this->Day4Symmetry->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4Symmetry->Visible = false; // Disable update for API request
            } else {
                $this->Day4Symmetry->setFormValue($val);
            }
        }

        // Check field name 'Day4Grade' first before field var 'x_Day4Grade'
        $val = $CurrentForm->hasValue("Day4Grade") ? $CurrentForm->getValue("Day4Grade") : $CurrentForm->getValue("x_Day4Grade");
        if (!$this->Day4Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4Grade->Visible = false; // Disable update for API request
            } else {
                $this->Day4Grade->setFormValue($val);
            }
        }

        // Check field name 'Day4Cryoptop' first before field var 'x_Day4Cryoptop'
        $val = $CurrentForm->hasValue("Day4Cryoptop") ? $CurrentForm->getValue("Day4Cryoptop") : $CurrentForm->getValue("x_Day4Cryoptop");
        if (!$this->Day4Cryoptop->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4Cryoptop->Visible = false; // Disable update for API request
            } else {
                $this->Day4Cryoptop->setFormValue($val);
            }
        }

        // Check field name 'Day4End' first before field var 'x_Day4End'
        $val = $CurrentForm->hasValue("Day4End") ? $CurrentForm->getValue("Day4End") : $CurrentForm->getValue("x_Day4End");
        if (!$this->Day4End->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day4End->Visible = false; // Disable update for API request
            } else {
                $this->Day4End->setFormValue($val);
            }
        }

        // Check field name 'Day5CellNo' first before field var 'x_Day5CellNo'
        $val = $CurrentForm->hasValue("Day5CellNo") ? $CurrentForm->getValue("Day5CellNo") : $CurrentForm->getValue("x_Day5CellNo");
        if (!$this->Day5CellNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5CellNo->Visible = false; // Disable update for API request
            } else {
                $this->Day5CellNo->setFormValue($val);
            }
        }

        // Check field name 'Day5ICM' first before field var 'x_Day5ICM'
        $val = $CurrentForm->hasValue("Day5ICM") ? $CurrentForm->getValue("Day5ICM") : $CurrentForm->getValue("x_Day5ICM");
        if (!$this->Day5ICM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5ICM->Visible = false; // Disable update for API request
            } else {
                $this->Day5ICM->setFormValue($val);
            }
        }

        // Check field name 'Day5TE' first before field var 'x_Day5TE'
        $val = $CurrentForm->hasValue("Day5TE") ? $CurrentForm->getValue("Day5TE") : $CurrentForm->getValue("x_Day5TE");
        if (!$this->Day5TE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5TE->Visible = false; // Disable update for API request
            } else {
                $this->Day5TE->setFormValue($val);
            }
        }

        // Check field name 'Day5Observation' first before field var 'x_Day5Observation'
        $val = $CurrentForm->hasValue("Day5Observation") ? $CurrentForm->getValue("Day5Observation") : $CurrentForm->getValue("x_Day5Observation");
        if (!$this->Day5Observation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5Observation->Visible = false; // Disable update for API request
            } else {
                $this->Day5Observation->setFormValue($val);
            }
        }

        // Check field name 'Day5Collapsed' first before field var 'x_Day5Collapsed'
        $val = $CurrentForm->hasValue("Day5Collapsed") ? $CurrentForm->getValue("Day5Collapsed") : $CurrentForm->getValue("x_Day5Collapsed");
        if (!$this->Day5Collapsed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5Collapsed->Visible = false; // Disable update for API request
            } else {
                $this->Day5Collapsed->setFormValue($val);
            }
        }

        // Check field name 'Day5Vacoulles' first before field var 'x_Day5Vacoulles'
        $val = $CurrentForm->hasValue("Day5Vacoulles") ? $CurrentForm->getValue("Day5Vacoulles") : $CurrentForm->getValue("x_Day5Vacoulles");
        if (!$this->Day5Vacoulles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5Vacoulles->Visible = false; // Disable update for API request
            } else {
                $this->Day5Vacoulles->setFormValue($val);
            }
        }

        // Check field name 'Day5Grade' first before field var 'x_Day5Grade'
        $val = $CurrentForm->hasValue("Day5Grade") ? $CurrentForm->getValue("Day5Grade") : $CurrentForm->getValue("x_Day5Grade");
        if (!$this->Day5Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day5Grade->Visible = false; // Disable update for API request
            } else {
                $this->Day5Grade->setFormValue($val);
            }
        }

        // Check field name 'Day6CellNo' first before field var 'x_Day6CellNo'
        $val = $CurrentForm->hasValue("Day6CellNo") ? $CurrentForm->getValue("Day6CellNo") : $CurrentForm->getValue("x_Day6CellNo");
        if (!$this->Day6CellNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6CellNo->Visible = false; // Disable update for API request
            } else {
                $this->Day6CellNo->setFormValue($val);
            }
        }

        // Check field name 'Day6ICM' first before field var 'x_Day6ICM'
        $val = $CurrentForm->hasValue("Day6ICM") ? $CurrentForm->getValue("Day6ICM") : $CurrentForm->getValue("x_Day6ICM");
        if (!$this->Day6ICM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6ICM->Visible = false; // Disable update for API request
            } else {
                $this->Day6ICM->setFormValue($val);
            }
        }

        // Check field name 'Day6TE' first before field var 'x_Day6TE'
        $val = $CurrentForm->hasValue("Day6TE") ? $CurrentForm->getValue("Day6TE") : $CurrentForm->getValue("x_Day6TE");
        if (!$this->Day6TE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6TE->Visible = false; // Disable update for API request
            } else {
                $this->Day6TE->setFormValue($val);
            }
        }

        // Check field name 'Day6Observation' first before field var 'x_Day6Observation'
        $val = $CurrentForm->hasValue("Day6Observation") ? $CurrentForm->getValue("Day6Observation") : $CurrentForm->getValue("x_Day6Observation");
        if (!$this->Day6Observation->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6Observation->Visible = false; // Disable update for API request
            } else {
                $this->Day6Observation->setFormValue($val);
            }
        }

        // Check field name 'Day6Collapsed' first before field var 'x_Day6Collapsed'
        $val = $CurrentForm->hasValue("Day6Collapsed") ? $CurrentForm->getValue("Day6Collapsed") : $CurrentForm->getValue("x_Day6Collapsed");
        if (!$this->Day6Collapsed->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6Collapsed->Visible = false; // Disable update for API request
            } else {
                $this->Day6Collapsed->setFormValue($val);
            }
        }

        // Check field name 'Day6Vacoulles' first before field var 'x_Day6Vacoulles'
        $val = $CurrentForm->hasValue("Day6Vacoulles") ? $CurrentForm->getValue("Day6Vacoulles") : $CurrentForm->getValue("x_Day6Vacoulles");
        if (!$this->Day6Vacoulles->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6Vacoulles->Visible = false; // Disable update for API request
            } else {
                $this->Day6Vacoulles->setFormValue($val);
            }
        }

        // Check field name 'Day6Grade' first before field var 'x_Day6Grade'
        $val = $CurrentForm->hasValue("Day6Grade") ? $CurrentForm->getValue("Day6Grade") : $CurrentForm->getValue("x_Day6Grade");
        if (!$this->Day6Grade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6Grade->Visible = false; // Disable update for API request
            } else {
                $this->Day6Grade->setFormValue($val);
            }
        }

        // Check field name 'Day6Cryoptop' first before field var 'x_Day6Cryoptop'
        $val = $CurrentForm->hasValue("Day6Cryoptop") ? $CurrentForm->getValue("Day6Cryoptop") : $CurrentForm->getValue("x_Day6Cryoptop");
        if (!$this->Day6Cryoptop->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day6Cryoptop->Visible = false; // Disable update for API request
            } else {
                $this->Day6Cryoptop->setFormValue($val);
            }
        }

        // Check field name 'EndSiNo' first before field var 'x_EndSiNo'
        $val = $CurrentForm->hasValue("EndSiNo") ? $CurrentForm->getValue("EndSiNo") : $CurrentForm->getValue("x_EndSiNo");
        if (!$this->EndSiNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndSiNo->Visible = false; // Disable update for API request
            } else {
                $this->EndSiNo->setFormValue($val);
            }
        }

        // Check field name 'EndingDay' first before field var 'x_EndingDay'
        $val = $CurrentForm->hasValue("EndingDay") ? $CurrentForm->getValue("EndingDay") : $CurrentForm->getValue("x_EndingDay");
        if (!$this->EndingDay->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndingDay->Visible = false; // Disable update for API request
            } else {
                $this->EndingDay->setFormValue($val);
            }
        }

        // Check field name 'EndingCellStage' first before field var 'x_EndingCellStage'
        $val = $CurrentForm->hasValue("EndingCellStage") ? $CurrentForm->getValue("EndingCellStage") : $CurrentForm->getValue("x_EndingCellStage");
        if (!$this->EndingCellStage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndingCellStage->Visible = false; // Disable update for API request
            } else {
                $this->EndingCellStage->setFormValue($val);
            }
        }

        // Check field name 'EndingGrade' first before field var 'x_EndingGrade'
        $val = $CurrentForm->hasValue("EndingGrade") ? $CurrentForm->getValue("EndingGrade") : $CurrentForm->getValue("x_EndingGrade");
        if (!$this->EndingGrade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndingGrade->Visible = false; // Disable update for API request
            } else {
                $this->EndingGrade->setFormValue($val);
            }
        }

        // Check field name 'EndingState' first before field var 'x_EndingState'
        $val = $CurrentForm->hasValue("EndingState") ? $CurrentForm->getValue("EndingState") : $CurrentForm->getValue("x_EndingState");
        if (!$this->EndingState->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->EndingState->Visible = false; // Disable update for API request
            } else {
                $this->EndingState->setFormValue($val);
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

        // Check field name 'DidNO' first before field var 'x_DidNO'
        $val = $CurrentForm->hasValue("DidNO") ? $CurrentForm->getValue("DidNO") : $CurrentForm->getValue("x_DidNO");
        if (!$this->DidNO->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DidNO->Visible = false; // Disable update for API request
            } else {
                $this->DidNO->setFormValue($val);
            }
        }

        // Check field name 'ICSiIVFDateTime' first before field var 'x_ICSiIVFDateTime'
        $val = $CurrentForm->hasValue("ICSiIVFDateTime") ? $CurrentForm->getValue("ICSiIVFDateTime") : $CurrentForm->getValue("x_ICSiIVFDateTime");
        if (!$this->ICSiIVFDateTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ICSiIVFDateTime->Visible = false; // Disable update for API request
            } else {
                $this->ICSiIVFDateTime->setFormValue($val);
            }
            $this->ICSiIVFDateTime->CurrentValue = UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0);
        }

        // Check field name 'PrimaryEmbrologist' first before field var 'x_PrimaryEmbrologist'
        $val = $CurrentForm->hasValue("PrimaryEmbrologist") ? $CurrentForm->getValue("PrimaryEmbrologist") : $CurrentForm->getValue("x_PrimaryEmbrologist");
        if (!$this->PrimaryEmbrologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PrimaryEmbrologist->Visible = false; // Disable update for API request
            } else {
                $this->PrimaryEmbrologist->setFormValue($val);
            }
        }

        // Check field name 'SecondaryEmbrologist' first before field var 'x_SecondaryEmbrologist'
        $val = $CurrentForm->hasValue("SecondaryEmbrologist") ? $CurrentForm->getValue("SecondaryEmbrologist") : $CurrentForm->getValue("x_SecondaryEmbrologist");
        if (!$this->SecondaryEmbrologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SecondaryEmbrologist->Visible = false; // Disable update for API request
            } else {
                $this->SecondaryEmbrologist->setFormValue($val);
            }
        }

        // Check field name 'Incubator' first before field var 'x_Incubator'
        $val = $CurrentForm->hasValue("Incubator") ? $CurrentForm->getValue("Incubator") : $CurrentForm->getValue("x_Incubator");
        if (!$this->Incubator->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Incubator->Visible = false; // Disable update for API request
            } else {
                $this->Incubator->setFormValue($val);
            }
        }

        // Check field name 'location' first before field var 'x_location'
        $val = $CurrentForm->hasValue("location") ? $CurrentForm->getValue("location") : $CurrentForm->getValue("x_location");
        if (!$this->location->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->location->Visible = false; // Disable update for API request
            } else {
                $this->location->setFormValue($val);
            }
        }

        // Check field name 'OocyteNo' first before field var 'x_OocyteNo'
        $val = $CurrentForm->hasValue("OocyteNo") ? $CurrentForm->getValue("OocyteNo") : $CurrentForm->getValue("x_OocyteNo");
        if (!$this->OocyteNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->OocyteNo->Visible = false; // Disable update for API request
            } else {
                $this->OocyteNo->setFormValue($val);
            }
        }

        // Check field name 'Stage' first before field var 'x_Stage'
        $val = $CurrentForm->hasValue("Stage") ? $CurrentForm->getValue("Stage") : $CurrentForm->getValue("x_Stage");
        if (!$this->Stage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Stage->Visible = false; // Disable update for API request
            } else {
                $this->Stage->setFormValue($val);
            }
        }

        // Check field name 'Remarks' first before field var 'x_Remarks'
        $val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
        if (!$this->Remarks->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Remarks->Visible = false; // Disable update for API request
            } else {
                $this->Remarks->setFormValue($val);
            }
        }

        // Check field name 'vitrificationDate' first before field var 'x_vitrificationDate'
        $val = $CurrentForm->hasValue("vitrificationDate") ? $CurrentForm->getValue("vitrificationDate") : $CurrentForm->getValue("x_vitrificationDate");
        if (!$this->vitrificationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitrificationDate->Visible = false; // Disable update for API request
            } else {
                $this->vitrificationDate->setFormValue($val);
            }
            $this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
        }

        // Check field name 'vitriPrimaryEmbryologist' first before field var 'x_vitriPrimaryEmbryologist'
        $val = $CurrentForm->hasValue("vitriPrimaryEmbryologist") ? $CurrentForm->getValue("vitriPrimaryEmbryologist") : $CurrentForm->getValue("x_vitriPrimaryEmbryologist");
        if (!$this->vitriPrimaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriPrimaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->vitriPrimaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'vitriSecondaryEmbryologist' first before field var 'x_vitriSecondaryEmbryologist'
        $val = $CurrentForm->hasValue("vitriSecondaryEmbryologist") ? $CurrentForm->getValue("vitriSecondaryEmbryologist") : $CurrentForm->getValue("x_vitriSecondaryEmbryologist");
        if (!$this->vitriSecondaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriSecondaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->vitriSecondaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'vitriEmbryoNo' first before field var 'x_vitriEmbryoNo'
        $val = $CurrentForm->hasValue("vitriEmbryoNo") ? $CurrentForm->getValue("vitriEmbryoNo") : $CurrentForm->getValue("x_vitriEmbryoNo");
        if (!$this->vitriEmbryoNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriEmbryoNo->Visible = false; // Disable update for API request
            } else {
                $this->vitriEmbryoNo->setFormValue($val);
            }
        }

        // Check field name 'thawReFrozen' first before field var 'x_thawReFrozen'
        $val = $CurrentForm->hasValue("thawReFrozen") ? $CurrentForm->getValue("thawReFrozen") : $CurrentForm->getValue("x_thawReFrozen");
        if (!$this->thawReFrozen->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawReFrozen->Visible = false; // Disable update for API request
            } else {
                $this->thawReFrozen->setFormValue($val);
            }
        }

        // Check field name 'vitriFertilisationDate' first before field var 'x_vitriFertilisationDate'
        $val = $CurrentForm->hasValue("vitriFertilisationDate") ? $CurrentForm->getValue("vitriFertilisationDate") : $CurrentForm->getValue("x_vitriFertilisationDate");
        if (!$this->vitriFertilisationDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriFertilisationDate->Visible = false; // Disable update for API request
            } else {
                $this->vitriFertilisationDate->setFormValue($val);
            }
            $this->vitriFertilisationDate->CurrentValue = UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0);
        }

        // Check field name 'vitriDay' first before field var 'x_vitriDay'
        $val = $CurrentForm->hasValue("vitriDay") ? $CurrentForm->getValue("vitriDay") : $CurrentForm->getValue("x_vitriDay");
        if (!$this->vitriDay->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriDay->Visible = false; // Disable update for API request
            } else {
                $this->vitriDay->setFormValue($val);
            }
        }

        // Check field name 'vitriStage' first before field var 'x_vitriStage'
        $val = $CurrentForm->hasValue("vitriStage") ? $CurrentForm->getValue("vitriStage") : $CurrentForm->getValue("x_vitriStage");
        if (!$this->vitriStage->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriStage->Visible = false; // Disable update for API request
            } else {
                $this->vitriStage->setFormValue($val);
            }
        }

        // Check field name 'vitriGrade' first before field var 'x_vitriGrade'
        $val = $CurrentForm->hasValue("vitriGrade") ? $CurrentForm->getValue("vitriGrade") : $CurrentForm->getValue("x_vitriGrade");
        if (!$this->vitriGrade->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriGrade->Visible = false; // Disable update for API request
            } else {
                $this->vitriGrade->setFormValue($val);
            }
        }

        // Check field name 'vitriIncubator' first before field var 'x_vitriIncubator'
        $val = $CurrentForm->hasValue("vitriIncubator") ? $CurrentForm->getValue("vitriIncubator") : $CurrentForm->getValue("x_vitriIncubator");
        if (!$this->vitriIncubator->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriIncubator->Visible = false; // Disable update for API request
            } else {
                $this->vitriIncubator->setFormValue($val);
            }
        }

        // Check field name 'vitriTank' first before field var 'x_vitriTank'
        $val = $CurrentForm->hasValue("vitriTank") ? $CurrentForm->getValue("vitriTank") : $CurrentForm->getValue("x_vitriTank");
        if (!$this->vitriTank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriTank->Visible = false; // Disable update for API request
            } else {
                $this->vitriTank->setFormValue($val);
            }
        }

        // Check field name 'vitriCanister' first before field var 'x_vitriCanister'
        $val = $CurrentForm->hasValue("vitriCanister") ? $CurrentForm->getValue("vitriCanister") : $CurrentForm->getValue("x_vitriCanister");
        if (!$this->vitriCanister->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriCanister->Visible = false; // Disable update for API request
            } else {
                $this->vitriCanister->setFormValue($val);
            }
        }

        // Check field name 'vitriGobiet' first before field var 'x_vitriGobiet'
        $val = $CurrentForm->hasValue("vitriGobiet") ? $CurrentForm->getValue("vitriGobiet") : $CurrentForm->getValue("x_vitriGobiet");
        if (!$this->vitriGobiet->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriGobiet->Visible = false; // Disable update for API request
            } else {
                $this->vitriGobiet->setFormValue($val);
            }
        }

        // Check field name 'vitriViscotube' first before field var 'x_vitriViscotube'
        $val = $CurrentForm->hasValue("vitriViscotube") ? $CurrentForm->getValue("vitriViscotube") : $CurrentForm->getValue("x_vitriViscotube");
        if (!$this->vitriViscotube->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriViscotube->Visible = false; // Disable update for API request
            } else {
                $this->vitriViscotube->setFormValue($val);
            }
        }

        // Check field name 'vitriCryolockNo' first before field var 'x_vitriCryolockNo'
        $val = $CurrentForm->hasValue("vitriCryolockNo") ? $CurrentForm->getValue("vitriCryolockNo") : $CurrentForm->getValue("x_vitriCryolockNo");
        if (!$this->vitriCryolockNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriCryolockNo->Visible = false; // Disable update for API request
            } else {
                $this->vitriCryolockNo->setFormValue($val);
            }
        }

        // Check field name 'vitriCryolockColour' first before field var 'x_vitriCryolockColour'
        $val = $CurrentForm->hasValue("vitriCryolockColour") ? $CurrentForm->getValue("vitriCryolockColour") : $CurrentForm->getValue("x_vitriCryolockColour");
        if (!$this->vitriCryolockColour->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->vitriCryolockColour->Visible = false; // Disable update for API request
            } else {
                $this->vitriCryolockColour->setFormValue($val);
            }
        }

        // Check field name 'thawDate' first before field var 'x_thawDate'
        $val = $CurrentForm->hasValue("thawDate") ? $CurrentForm->getValue("thawDate") : $CurrentForm->getValue("x_thawDate");
        if (!$this->thawDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawDate->Visible = false; // Disable update for API request
            } else {
                $this->thawDate->setFormValue($val);
            }
            $this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
        }

        // Check field name 'thawPrimaryEmbryologist' first before field var 'x_thawPrimaryEmbryologist'
        $val = $CurrentForm->hasValue("thawPrimaryEmbryologist") ? $CurrentForm->getValue("thawPrimaryEmbryologist") : $CurrentForm->getValue("x_thawPrimaryEmbryologist");
        if (!$this->thawPrimaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawPrimaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->thawPrimaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'thawSecondaryEmbryologist' first before field var 'x_thawSecondaryEmbryologist'
        $val = $CurrentForm->hasValue("thawSecondaryEmbryologist") ? $CurrentForm->getValue("thawSecondaryEmbryologist") : $CurrentForm->getValue("x_thawSecondaryEmbryologist");
        if (!$this->thawSecondaryEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawSecondaryEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->thawSecondaryEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'thawET' first before field var 'x_thawET'
        $val = $CurrentForm->hasValue("thawET") ? $CurrentForm->getValue("thawET") : $CurrentForm->getValue("x_thawET");
        if (!$this->thawET->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawET->Visible = false; // Disable update for API request
            } else {
                $this->thawET->setFormValue($val);
            }
        }

        // Check field name 'thawAbserve' first before field var 'x_thawAbserve'
        $val = $CurrentForm->hasValue("thawAbserve") ? $CurrentForm->getValue("thawAbserve") : $CurrentForm->getValue("x_thawAbserve");
        if (!$this->thawAbserve->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawAbserve->Visible = false; // Disable update for API request
            } else {
                $this->thawAbserve->setFormValue($val);
            }
        }

        // Check field name 'thawDiscard' first before field var 'x_thawDiscard'
        $val = $CurrentForm->hasValue("thawDiscard") ? $CurrentForm->getValue("thawDiscard") : $CurrentForm->getValue("x_thawDiscard");
        if (!$this->thawDiscard->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->thawDiscard->Visible = false; // Disable update for API request
            } else {
                $this->thawDiscard->setFormValue($val);
            }
        }

        // Check field name 'ETCatheter' first before field var 'x_ETCatheter'
        $val = $CurrentForm->hasValue("ETCatheter") ? $CurrentForm->getValue("ETCatheter") : $CurrentForm->getValue("x_ETCatheter");
        if (!$this->ETCatheter->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETCatheter->Visible = false; // Disable update for API request
            } else {
                $this->ETCatheter->setFormValue($val);
            }
        }

        // Check field name 'ETDifficulty' first before field var 'x_ETDifficulty'
        $val = $CurrentForm->hasValue("ETDifficulty") ? $CurrentForm->getValue("ETDifficulty") : $CurrentForm->getValue("x_ETDifficulty");
        if (!$this->ETDifficulty->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETDifficulty->Visible = false; // Disable update for API request
            } else {
                $this->ETDifficulty->setFormValue($val);
            }
        }

        // Check field name 'ETEasy' first before field var 'x_ETEasy'
        $val = $CurrentForm->hasValue("ETEasy") ? $CurrentForm->getValue("ETEasy") : $CurrentForm->getValue("x_ETEasy");
        if (!$this->ETEasy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETEasy->Visible = false; // Disable update for API request
            } else {
                $this->ETEasy->setFormValue($val);
            }
        }

        // Check field name 'ETComments' first before field var 'x_ETComments'
        $val = $CurrentForm->hasValue("ETComments") ? $CurrentForm->getValue("ETComments") : $CurrentForm->getValue("x_ETComments");
        if (!$this->ETComments->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETComments->Visible = false; // Disable update for API request
            } else {
                $this->ETComments->setFormValue($val);
            }
        }

        // Check field name 'ETDoctor' first before field var 'x_ETDoctor'
        $val = $CurrentForm->hasValue("ETDoctor") ? $CurrentForm->getValue("ETDoctor") : $CurrentForm->getValue("x_ETDoctor");
        if (!$this->ETDoctor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETDoctor->Visible = false; // Disable update for API request
            } else {
                $this->ETDoctor->setFormValue($val);
            }
        }

        // Check field name 'ETEmbryologist' first before field var 'x_ETEmbryologist'
        $val = $CurrentForm->hasValue("ETEmbryologist") ? $CurrentForm->getValue("ETEmbryologist") : $CurrentForm->getValue("x_ETEmbryologist");
        if (!$this->ETEmbryologist->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETEmbryologist->Visible = false; // Disable update for API request
            } else {
                $this->ETEmbryologist->setFormValue($val);
            }
        }

        // Check field name 'ETDate' first before field var 'x_ETDate'
        $val = $CurrentForm->hasValue("ETDate") ? $CurrentForm->getValue("ETDate") : $CurrentForm->getValue("x_ETDate");
        if (!$this->ETDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ETDate->Visible = false; // Disable update for API request
            } else {
                $this->ETDate->setFormValue($val);
            }
            $this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
        }

        // Check field name 'Day1End' first before field var 'x_Day1End'
        $val = $CurrentForm->hasValue("Day1End") ? $CurrentForm->getValue("Day1End") : $CurrentForm->getValue("x_Day1End");
        if (!$this->Day1End->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Day1End->Visible = false; // Disable update for API request
            } else {
                $this->Day1End->setFormValue($val);
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
        $this->SpermOrigin->CurrentValue = $this->SpermOrigin->FormValue;
        $this->InseminatinTechnique->CurrentValue = $this->InseminatinTechnique->FormValue;
        $this->IndicationForART->CurrentValue = $this->IndicationForART->FormValue;
        $this->Day0sino->CurrentValue = $this->Day0sino->FormValue;
        $this->Day0OocyteStage->CurrentValue = $this->Day0OocyteStage->FormValue;
        $this->Day0PolarBodyPosition->CurrentValue = $this->Day0PolarBodyPosition->FormValue;
        $this->Day0Breakage->CurrentValue = $this->Day0Breakage->FormValue;
        $this->Day0Attempts->CurrentValue = $this->Day0Attempts->FormValue;
        $this->Day0SPZMorpho->CurrentValue = $this->Day0SPZMorpho->FormValue;
        $this->Day0SPZLocation->CurrentValue = $this->Day0SPZLocation->FormValue;
        $this->Day0SpOrgin->CurrentValue = $this->Day0SpOrgin->FormValue;
        $this->Day5Cryoptop->CurrentValue = $this->Day5Cryoptop->FormValue;
        $this->Day1Sperm->CurrentValue = $this->Day1Sperm->FormValue;
        $this->Day1PN->CurrentValue = $this->Day1PN->FormValue;
        $this->Day1PB->CurrentValue = $this->Day1PB->FormValue;
        $this->Day1Pronucleus->CurrentValue = $this->Day1Pronucleus->FormValue;
        $this->Day1Nucleolus->CurrentValue = $this->Day1Nucleolus->FormValue;
        $this->Day1Halo->CurrentValue = $this->Day1Halo->FormValue;
        $this->Day2SiNo->CurrentValue = $this->Day2SiNo->FormValue;
        $this->Day2CellNo->CurrentValue = $this->Day2CellNo->FormValue;
        $this->Day2Frag->CurrentValue = $this->Day2Frag->FormValue;
        $this->Day2Symmetry->CurrentValue = $this->Day2Symmetry->FormValue;
        $this->Day2Cryoptop->CurrentValue = $this->Day2Cryoptop->FormValue;
        $this->Day2Grade->CurrentValue = $this->Day2Grade->FormValue;
        $this->Day2End->CurrentValue = $this->Day2End->FormValue;
        $this->Day3Sino->CurrentValue = $this->Day3Sino->FormValue;
        $this->Day3CellNo->CurrentValue = $this->Day3CellNo->FormValue;
        $this->Day3Frag->CurrentValue = $this->Day3Frag->FormValue;
        $this->Day3Symmetry->CurrentValue = $this->Day3Symmetry->FormValue;
        $this->Day3ZP->CurrentValue = $this->Day3ZP->FormValue;
        $this->Day3Vacoules->CurrentValue = $this->Day3Vacoules->FormValue;
        $this->Day3Grade->CurrentValue = $this->Day3Grade->FormValue;
        $this->Day3Cryoptop->CurrentValue = $this->Day3Cryoptop->FormValue;
        $this->Day3End->CurrentValue = $this->Day3End->FormValue;
        $this->Day4SiNo->CurrentValue = $this->Day4SiNo->FormValue;
        $this->Day4CellNo->CurrentValue = $this->Day4CellNo->FormValue;
        $this->Day4Frag->CurrentValue = $this->Day4Frag->FormValue;
        $this->Day4Symmetry->CurrentValue = $this->Day4Symmetry->FormValue;
        $this->Day4Grade->CurrentValue = $this->Day4Grade->FormValue;
        $this->Day4Cryoptop->CurrentValue = $this->Day4Cryoptop->FormValue;
        $this->Day4End->CurrentValue = $this->Day4End->FormValue;
        $this->Day5CellNo->CurrentValue = $this->Day5CellNo->FormValue;
        $this->Day5ICM->CurrentValue = $this->Day5ICM->FormValue;
        $this->Day5TE->CurrentValue = $this->Day5TE->FormValue;
        $this->Day5Observation->CurrentValue = $this->Day5Observation->FormValue;
        $this->Day5Collapsed->CurrentValue = $this->Day5Collapsed->FormValue;
        $this->Day5Vacoulles->CurrentValue = $this->Day5Vacoulles->FormValue;
        $this->Day5Grade->CurrentValue = $this->Day5Grade->FormValue;
        $this->Day6CellNo->CurrentValue = $this->Day6CellNo->FormValue;
        $this->Day6ICM->CurrentValue = $this->Day6ICM->FormValue;
        $this->Day6TE->CurrentValue = $this->Day6TE->FormValue;
        $this->Day6Observation->CurrentValue = $this->Day6Observation->FormValue;
        $this->Day6Collapsed->CurrentValue = $this->Day6Collapsed->FormValue;
        $this->Day6Vacoulles->CurrentValue = $this->Day6Vacoulles->FormValue;
        $this->Day6Grade->CurrentValue = $this->Day6Grade->FormValue;
        $this->Day6Cryoptop->CurrentValue = $this->Day6Cryoptop->FormValue;
        $this->EndSiNo->CurrentValue = $this->EndSiNo->FormValue;
        $this->EndingDay->CurrentValue = $this->EndingDay->FormValue;
        $this->EndingCellStage->CurrentValue = $this->EndingCellStage->FormValue;
        $this->EndingGrade->CurrentValue = $this->EndingGrade->FormValue;
        $this->EndingState->CurrentValue = $this->EndingState->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->DidNO->CurrentValue = $this->DidNO->FormValue;
        $this->ICSiIVFDateTime->CurrentValue = $this->ICSiIVFDateTime->FormValue;
        $this->ICSiIVFDateTime->CurrentValue = UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0);
        $this->PrimaryEmbrologist->CurrentValue = $this->PrimaryEmbrologist->FormValue;
        $this->SecondaryEmbrologist->CurrentValue = $this->SecondaryEmbrologist->FormValue;
        $this->Incubator->CurrentValue = $this->Incubator->FormValue;
        $this->location->CurrentValue = $this->location->FormValue;
        $this->OocyteNo->CurrentValue = $this->OocyteNo->FormValue;
        $this->Stage->CurrentValue = $this->Stage->FormValue;
        $this->Remarks->CurrentValue = $this->Remarks->FormValue;
        $this->vitrificationDate->CurrentValue = $this->vitrificationDate->FormValue;
        $this->vitrificationDate->CurrentValue = UnFormatDateTime($this->vitrificationDate->CurrentValue, 0);
        $this->vitriPrimaryEmbryologist->CurrentValue = $this->vitriPrimaryEmbryologist->FormValue;
        $this->vitriSecondaryEmbryologist->CurrentValue = $this->vitriSecondaryEmbryologist->FormValue;
        $this->vitriEmbryoNo->CurrentValue = $this->vitriEmbryoNo->FormValue;
        $this->thawReFrozen->CurrentValue = $this->thawReFrozen->FormValue;
        $this->vitriFertilisationDate->CurrentValue = $this->vitriFertilisationDate->FormValue;
        $this->vitriFertilisationDate->CurrentValue = UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0);
        $this->vitriDay->CurrentValue = $this->vitriDay->FormValue;
        $this->vitriStage->CurrentValue = $this->vitriStage->FormValue;
        $this->vitriGrade->CurrentValue = $this->vitriGrade->FormValue;
        $this->vitriIncubator->CurrentValue = $this->vitriIncubator->FormValue;
        $this->vitriTank->CurrentValue = $this->vitriTank->FormValue;
        $this->vitriCanister->CurrentValue = $this->vitriCanister->FormValue;
        $this->vitriGobiet->CurrentValue = $this->vitriGobiet->FormValue;
        $this->vitriViscotube->CurrentValue = $this->vitriViscotube->FormValue;
        $this->vitriCryolockNo->CurrentValue = $this->vitriCryolockNo->FormValue;
        $this->vitriCryolockColour->CurrentValue = $this->vitriCryolockColour->FormValue;
        $this->thawDate->CurrentValue = $this->thawDate->FormValue;
        $this->thawDate->CurrentValue = UnFormatDateTime($this->thawDate->CurrentValue, 0);
        $this->thawPrimaryEmbryologist->CurrentValue = $this->thawPrimaryEmbryologist->FormValue;
        $this->thawSecondaryEmbryologist->CurrentValue = $this->thawSecondaryEmbryologist->FormValue;
        $this->thawET->CurrentValue = $this->thawET->FormValue;
        $this->thawAbserve->CurrentValue = $this->thawAbserve->FormValue;
        $this->thawDiscard->CurrentValue = $this->thawDiscard->FormValue;
        $this->ETCatheter->CurrentValue = $this->ETCatheter->FormValue;
        $this->ETDifficulty->CurrentValue = $this->ETDifficulty->FormValue;
        $this->ETEasy->CurrentValue = $this->ETEasy->FormValue;
        $this->ETComments->CurrentValue = $this->ETComments->FormValue;
        $this->ETDoctor->CurrentValue = $this->ETDoctor->FormValue;
        $this->ETEmbryologist->CurrentValue = $this->ETEmbryologist->FormValue;
        $this->ETDate->CurrentValue = $this->ETDate->FormValue;
        $this->ETDate->CurrentValue = UnFormatDateTime($this->ETDate->CurrentValue, 0);
        $this->Day1End->CurrentValue = $this->Day1End->FormValue;
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
        $this->SpermOrigin->setDbValue($row['SpermOrigin']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->IndicationForART->setDbValue($row['IndicationForART']);
        $this->Day0sino->setDbValue($row['Day0sino']);
        $this->Day0OocyteStage->setDbValue($row['Day0OocyteStage']);
        $this->Day0PolarBodyPosition->setDbValue($row['Day0PolarBodyPosition']);
        $this->Day0Breakage->setDbValue($row['Day0Breakage']);
        $this->Day0Attempts->setDbValue($row['Day0Attempts']);
        $this->Day0SPZMorpho->setDbValue($row['Day0SPZMorpho']);
        $this->Day0SPZLocation->setDbValue($row['Day0SPZLocation']);
        $this->Day0SpOrgin->setDbValue($row['Day0SpOrgin']);
        $this->Day5Cryoptop->setDbValue($row['Day5Cryoptop']);
        $this->Day1Sperm->setDbValue($row['Day1Sperm']);
        $this->Day1PN->setDbValue($row['Day1PN']);
        $this->Day1PB->setDbValue($row['Day1PB']);
        $this->Day1Pronucleus->setDbValue($row['Day1Pronucleus']);
        $this->Day1Nucleolus->setDbValue($row['Day1Nucleolus']);
        $this->Day1Halo->setDbValue($row['Day1Halo']);
        $this->Day2SiNo->setDbValue($row['Day2SiNo']);
        $this->Day2CellNo->setDbValue($row['Day2CellNo']);
        $this->Day2Frag->setDbValue($row['Day2Frag']);
        $this->Day2Symmetry->setDbValue($row['Day2Symmetry']);
        $this->Day2Cryoptop->setDbValue($row['Day2Cryoptop']);
        $this->Day2Grade->setDbValue($row['Day2Grade']);
        $this->Day2End->setDbValue($row['Day2End']);
        $this->Day3Sino->setDbValue($row['Day3Sino']);
        $this->Day3CellNo->setDbValue($row['Day3CellNo']);
        $this->Day3Frag->setDbValue($row['Day3Frag']);
        $this->Day3Symmetry->setDbValue($row['Day3Symmetry']);
        $this->Day3ZP->setDbValue($row['Day3ZP']);
        $this->Day3Vacoules->setDbValue($row['Day3Vacoules']);
        $this->Day3Grade->setDbValue($row['Day3Grade']);
        $this->Day3Cryoptop->setDbValue($row['Day3Cryoptop']);
        $this->Day3End->setDbValue($row['Day3End']);
        $this->Day4SiNo->setDbValue($row['Day4SiNo']);
        $this->Day4CellNo->setDbValue($row['Day4CellNo']);
        $this->Day4Frag->setDbValue($row['Day4Frag']);
        $this->Day4Symmetry->setDbValue($row['Day4Symmetry']);
        $this->Day4Grade->setDbValue($row['Day4Grade']);
        $this->Day4Cryoptop->setDbValue($row['Day4Cryoptop']);
        $this->Day4End->setDbValue($row['Day4End']);
        $this->Day5CellNo->setDbValue($row['Day5CellNo']);
        $this->Day5ICM->setDbValue($row['Day5ICM']);
        $this->Day5TE->setDbValue($row['Day5TE']);
        $this->Day5Observation->setDbValue($row['Day5Observation']);
        $this->Day5Collapsed->setDbValue($row['Day5Collapsed']);
        $this->Day5Vacoulles->setDbValue($row['Day5Vacoulles']);
        $this->Day5Grade->setDbValue($row['Day5Grade']);
        $this->Day6CellNo->setDbValue($row['Day6CellNo']);
        $this->Day6ICM->setDbValue($row['Day6ICM']);
        $this->Day6TE->setDbValue($row['Day6TE']);
        $this->Day6Observation->setDbValue($row['Day6Observation']);
        $this->Day6Collapsed->setDbValue($row['Day6Collapsed']);
        $this->Day6Vacoulles->setDbValue($row['Day6Vacoulles']);
        $this->Day6Grade->setDbValue($row['Day6Grade']);
        $this->Day6Cryoptop->setDbValue($row['Day6Cryoptop']);
        $this->EndSiNo->setDbValue($row['EndSiNo']);
        $this->EndingDay->setDbValue($row['EndingDay']);
        $this->EndingCellStage->setDbValue($row['EndingCellStage']);
        $this->EndingGrade->setDbValue($row['EndingGrade']);
        $this->EndingState->setDbValue($row['EndingState']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->DidNO->setDbValue($row['DidNO']);
        $this->ICSiIVFDateTime->setDbValue($row['ICSiIVFDateTime']);
        $this->PrimaryEmbrologist->setDbValue($row['PrimaryEmbrologist']);
        $this->SecondaryEmbrologist->setDbValue($row['SecondaryEmbrologist']);
        $this->Incubator->setDbValue($row['Incubator']);
        $this->location->setDbValue($row['location']);
        $this->OocyteNo->setDbValue($row['OocyteNo']);
        $this->Stage->setDbValue($row['Stage']);
        $this->Remarks->setDbValue($row['Remarks']);
        $this->vitrificationDate->setDbValue($row['vitrificationDate']);
        $this->vitriPrimaryEmbryologist->setDbValue($row['vitriPrimaryEmbryologist']);
        $this->vitriSecondaryEmbryologist->setDbValue($row['vitriSecondaryEmbryologist']);
        $this->vitriEmbryoNo->setDbValue($row['vitriEmbryoNo']);
        $this->thawReFrozen->setDbValue($row['thawReFrozen']);
        $this->vitriFertilisationDate->setDbValue($row['vitriFertilisationDate']);
        $this->vitriDay->setDbValue($row['vitriDay']);
        $this->vitriStage->setDbValue($row['vitriStage']);
        $this->vitriGrade->setDbValue($row['vitriGrade']);
        $this->vitriIncubator->setDbValue($row['vitriIncubator']);
        $this->vitriTank->setDbValue($row['vitriTank']);
        $this->vitriCanister->setDbValue($row['vitriCanister']);
        $this->vitriGobiet->setDbValue($row['vitriGobiet']);
        $this->vitriViscotube->setDbValue($row['vitriViscotube']);
        $this->vitriCryolockNo->setDbValue($row['vitriCryolockNo']);
        $this->vitriCryolockColour->setDbValue($row['vitriCryolockColour']);
        $this->thawDate->setDbValue($row['thawDate']);
        $this->thawPrimaryEmbryologist->setDbValue($row['thawPrimaryEmbryologist']);
        $this->thawSecondaryEmbryologist->setDbValue($row['thawSecondaryEmbryologist']);
        $this->thawET->setDbValue($row['thawET']);
        $this->thawAbserve->setDbValue($row['thawAbserve']);
        $this->thawDiscard->setDbValue($row['thawDiscard']);
        $this->ETCatheter->setDbValue($row['ETCatheter']);
        $this->ETDifficulty->setDbValue($row['ETDifficulty']);
        $this->ETEasy->setDbValue($row['ETEasy']);
        $this->ETComments->setDbValue($row['ETComments']);
        $this->ETDoctor->setDbValue($row['ETDoctor']);
        $this->ETEmbryologist->setDbValue($row['ETEmbryologist']);
        $this->ETDate->setDbValue($row['ETDate']);
        $this->Day1End->setDbValue($row['Day1End']);
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
        $row['SpermOrigin'] = $this->SpermOrigin->CurrentValue;
        $row['InseminatinTechnique'] = $this->InseminatinTechnique->CurrentValue;
        $row['IndicationForART'] = $this->IndicationForART->CurrentValue;
        $row['Day0sino'] = $this->Day0sino->CurrentValue;
        $row['Day0OocyteStage'] = $this->Day0OocyteStage->CurrentValue;
        $row['Day0PolarBodyPosition'] = $this->Day0PolarBodyPosition->CurrentValue;
        $row['Day0Breakage'] = $this->Day0Breakage->CurrentValue;
        $row['Day0Attempts'] = $this->Day0Attempts->CurrentValue;
        $row['Day0SPZMorpho'] = $this->Day0SPZMorpho->CurrentValue;
        $row['Day0SPZLocation'] = $this->Day0SPZLocation->CurrentValue;
        $row['Day0SpOrgin'] = $this->Day0SpOrgin->CurrentValue;
        $row['Day5Cryoptop'] = $this->Day5Cryoptop->CurrentValue;
        $row['Day1Sperm'] = $this->Day1Sperm->CurrentValue;
        $row['Day1PN'] = $this->Day1PN->CurrentValue;
        $row['Day1PB'] = $this->Day1PB->CurrentValue;
        $row['Day1Pronucleus'] = $this->Day1Pronucleus->CurrentValue;
        $row['Day1Nucleolus'] = $this->Day1Nucleolus->CurrentValue;
        $row['Day1Halo'] = $this->Day1Halo->CurrentValue;
        $row['Day2SiNo'] = $this->Day2SiNo->CurrentValue;
        $row['Day2CellNo'] = $this->Day2CellNo->CurrentValue;
        $row['Day2Frag'] = $this->Day2Frag->CurrentValue;
        $row['Day2Symmetry'] = $this->Day2Symmetry->CurrentValue;
        $row['Day2Cryoptop'] = $this->Day2Cryoptop->CurrentValue;
        $row['Day2Grade'] = $this->Day2Grade->CurrentValue;
        $row['Day2End'] = $this->Day2End->CurrentValue;
        $row['Day3Sino'] = $this->Day3Sino->CurrentValue;
        $row['Day3CellNo'] = $this->Day3CellNo->CurrentValue;
        $row['Day3Frag'] = $this->Day3Frag->CurrentValue;
        $row['Day3Symmetry'] = $this->Day3Symmetry->CurrentValue;
        $row['Day3ZP'] = $this->Day3ZP->CurrentValue;
        $row['Day3Vacoules'] = $this->Day3Vacoules->CurrentValue;
        $row['Day3Grade'] = $this->Day3Grade->CurrentValue;
        $row['Day3Cryoptop'] = $this->Day3Cryoptop->CurrentValue;
        $row['Day3End'] = $this->Day3End->CurrentValue;
        $row['Day4SiNo'] = $this->Day4SiNo->CurrentValue;
        $row['Day4CellNo'] = $this->Day4CellNo->CurrentValue;
        $row['Day4Frag'] = $this->Day4Frag->CurrentValue;
        $row['Day4Symmetry'] = $this->Day4Symmetry->CurrentValue;
        $row['Day4Grade'] = $this->Day4Grade->CurrentValue;
        $row['Day4Cryoptop'] = $this->Day4Cryoptop->CurrentValue;
        $row['Day4End'] = $this->Day4End->CurrentValue;
        $row['Day5CellNo'] = $this->Day5CellNo->CurrentValue;
        $row['Day5ICM'] = $this->Day5ICM->CurrentValue;
        $row['Day5TE'] = $this->Day5TE->CurrentValue;
        $row['Day5Observation'] = $this->Day5Observation->CurrentValue;
        $row['Day5Collapsed'] = $this->Day5Collapsed->CurrentValue;
        $row['Day5Vacoulles'] = $this->Day5Vacoulles->CurrentValue;
        $row['Day5Grade'] = $this->Day5Grade->CurrentValue;
        $row['Day6CellNo'] = $this->Day6CellNo->CurrentValue;
        $row['Day6ICM'] = $this->Day6ICM->CurrentValue;
        $row['Day6TE'] = $this->Day6TE->CurrentValue;
        $row['Day6Observation'] = $this->Day6Observation->CurrentValue;
        $row['Day6Collapsed'] = $this->Day6Collapsed->CurrentValue;
        $row['Day6Vacoulles'] = $this->Day6Vacoulles->CurrentValue;
        $row['Day6Grade'] = $this->Day6Grade->CurrentValue;
        $row['Day6Cryoptop'] = $this->Day6Cryoptop->CurrentValue;
        $row['EndSiNo'] = $this->EndSiNo->CurrentValue;
        $row['EndingDay'] = $this->EndingDay->CurrentValue;
        $row['EndingCellStage'] = $this->EndingCellStage->CurrentValue;
        $row['EndingGrade'] = $this->EndingGrade->CurrentValue;
        $row['EndingState'] = $this->EndingState->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['DidNO'] = $this->DidNO->CurrentValue;
        $row['ICSiIVFDateTime'] = $this->ICSiIVFDateTime->CurrentValue;
        $row['PrimaryEmbrologist'] = $this->PrimaryEmbrologist->CurrentValue;
        $row['SecondaryEmbrologist'] = $this->SecondaryEmbrologist->CurrentValue;
        $row['Incubator'] = $this->Incubator->CurrentValue;
        $row['location'] = $this->location->CurrentValue;
        $row['OocyteNo'] = $this->OocyteNo->CurrentValue;
        $row['Stage'] = $this->Stage->CurrentValue;
        $row['Remarks'] = $this->Remarks->CurrentValue;
        $row['vitrificationDate'] = $this->vitrificationDate->CurrentValue;
        $row['vitriPrimaryEmbryologist'] = $this->vitriPrimaryEmbryologist->CurrentValue;
        $row['vitriSecondaryEmbryologist'] = $this->vitriSecondaryEmbryologist->CurrentValue;
        $row['vitriEmbryoNo'] = $this->vitriEmbryoNo->CurrentValue;
        $row['thawReFrozen'] = $this->thawReFrozen->CurrentValue;
        $row['vitriFertilisationDate'] = $this->vitriFertilisationDate->CurrentValue;
        $row['vitriDay'] = $this->vitriDay->CurrentValue;
        $row['vitriStage'] = $this->vitriStage->CurrentValue;
        $row['vitriGrade'] = $this->vitriGrade->CurrentValue;
        $row['vitriIncubator'] = $this->vitriIncubator->CurrentValue;
        $row['vitriTank'] = $this->vitriTank->CurrentValue;
        $row['vitriCanister'] = $this->vitriCanister->CurrentValue;
        $row['vitriGobiet'] = $this->vitriGobiet->CurrentValue;
        $row['vitriViscotube'] = $this->vitriViscotube->CurrentValue;
        $row['vitriCryolockNo'] = $this->vitriCryolockNo->CurrentValue;
        $row['vitriCryolockColour'] = $this->vitriCryolockColour->CurrentValue;
        $row['thawDate'] = $this->thawDate->CurrentValue;
        $row['thawPrimaryEmbryologist'] = $this->thawPrimaryEmbryologist->CurrentValue;
        $row['thawSecondaryEmbryologist'] = $this->thawSecondaryEmbryologist->CurrentValue;
        $row['thawET'] = $this->thawET->CurrentValue;
        $row['thawAbserve'] = $this->thawAbserve->CurrentValue;
        $row['thawDiscard'] = $this->thawDiscard->CurrentValue;
        $row['ETCatheter'] = $this->ETCatheter->CurrentValue;
        $row['ETDifficulty'] = $this->ETDifficulty->CurrentValue;
        $row['ETEasy'] = $this->ETEasy->CurrentValue;
        $row['ETComments'] = $this->ETComments->CurrentValue;
        $row['ETDoctor'] = $this->ETDoctor->CurrentValue;
        $row['ETEmbryologist'] = $this->ETEmbryologist->CurrentValue;
        $row['ETDate'] = $this->ETDate->CurrentValue;
        $row['Day1End'] = $this->Day1End->CurrentValue;
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

        // SpermOrigin

        // InseminatinTechnique

        // IndicationForART

        // Day0sino

        // Day0OocyteStage

        // Day0PolarBodyPosition

        // Day0Breakage

        // Day0Attempts

        // Day0SPZMorpho

        // Day0SPZLocation

        // Day0SpOrgin

        // Day5Cryoptop

        // Day1Sperm

        // Day1PN

        // Day1PB

        // Day1Pronucleus

        // Day1Nucleolus

        // Day1Halo

        // Day2SiNo

        // Day2CellNo

        // Day2Frag

        // Day2Symmetry

        // Day2Cryoptop

        // Day2Grade

        // Day2End

        // Day3Sino

        // Day3CellNo

        // Day3Frag

        // Day3Symmetry

        // Day3ZP

        // Day3Vacoules

        // Day3Grade

        // Day3Cryoptop

        // Day3End

        // Day4SiNo

        // Day4CellNo

        // Day4Frag

        // Day4Symmetry

        // Day4Grade

        // Day4Cryoptop

        // Day4End

        // Day5CellNo

        // Day5ICM

        // Day5TE

        // Day5Observation

        // Day5Collapsed

        // Day5Vacoulles

        // Day5Grade

        // Day6CellNo

        // Day6ICM

        // Day6TE

        // Day6Observation

        // Day6Collapsed

        // Day6Vacoulles

        // Day6Grade

        // Day6Cryoptop

        // EndSiNo

        // EndingDay

        // EndingCellStage

        // EndingGrade

        // EndingState

        // TidNo

        // DidNO

        // ICSiIVFDateTime

        // PrimaryEmbrologist

        // SecondaryEmbrologist

        // Incubator

        // location

        // OocyteNo

        // Stage

        // Remarks

        // vitrificationDate

        // vitriPrimaryEmbryologist

        // vitriSecondaryEmbryologist

        // vitriEmbryoNo

        // thawReFrozen

        // vitriFertilisationDate

        // vitriDay

        // vitriStage

        // vitriGrade

        // vitriIncubator

        // vitriTank

        // vitriCanister

        // vitriGobiet

        // vitriViscotube

        // vitriCryolockNo

        // vitriCryolockColour

        // thawDate

        // thawPrimaryEmbryologist

        // thawSecondaryEmbryologist

        // thawET

        // thawAbserve

        // thawDiscard

        // ETCatheter

        // ETDifficulty

        // ETEasy

        // ETComments

        // ETDoctor

        // ETEmbryologist

        // ETDate

        // Day1End
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

            // SpermOrigin
            $this->SpermOrigin->ViewValue = $this->SpermOrigin->CurrentValue;
            $this->SpermOrigin->ViewCustomAttributes = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->CurrentValue;
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // IndicationForART
            $this->IndicationForART->ViewValue = $this->IndicationForART->CurrentValue;
            $this->IndicationForART->ViewCustomAttributes = "";

            // Day0sino
            $this->Day0sino->ViewValue = $this->Day0sino->CurrentValue;
            $this->Day0sino->ViewCustomAttributes = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->ViewValue = $this->Day0OocyteStage->CurrentValue;
            $this->Day0OocyteStage->ViewCustomAttributes = "";

            // Day0PolarBodyPosition
            if (strval($this->Day0PolarBodyPosition->CurrentValue) != "") {
                $this->Day0PolarBodyPosition->ViewValue = $this->Day0PolarBodyPosition->optionCaption($this->Day0PolarBodyPosition->CurrentValue);
            } else {
                $this->Day0PolarBodyPosition->ViewValue = null;
            }
            $this->Day0PolarBodyPosition->ViewCustomAttributes = "";

            // Day0Breakage
            if (strval($this->Day0Breakage->CurrentValue) != "") {
                $this->Day0Breakage->ViewValue = $this->Day0Breakage->optionCaption($this->Day0Breakage->CurrentValue);
            } else {
                $this->Day0Breakage->ViewValue = null;
            }
            $this->Day0Breakage->ViewCustomAttributes = "";

            // Day0Attempts
            if (strval($this->Day0Attempts->CurrentValue) != "") {
                $this->Day0Attempts->ViewValue = $this->Day0Attempts->optionCaption($this->Day0Attempts->CurrentValue);
            } else {
                $this->Day0Attempts->ViewValue = null;
            }
            $this->Day0Attempts->ViewCustomAttributes = "";

            // Day0SPZMorpho
            if (strval($this->Day0SPZMorpho->CurrentValue) != "") {
                $this->Day0SPZMorpho->ViewValue = $this->Day0SPZMorpho->optionCaption($this->Day0SPZMorpho->CurrentValue);
            } else {
                $this->Day0SPZMorpho->ViewValue = null;
            }
            $this->Day0SPZMorpho->ViewCustomAttributes = "";

            // Day0SPZLocation
            if (strval($this->Day0SPZLocation->CurrentValue) != "") {
                $this->Day0SPZLocation->ViewValue = $this->Day0SPZLocation->optionCaption($this->Day0SPZLocation->CurrentValue);
            } else {
                $this->Day0SPZLocation->ViewValue = null;
            }
            $this->Day0SPZLocation->ViewCustomAttributes = "";

            // Day0SpOrgin
            if (strval($this->Day0SpOrgin->CurrentValue) != "") {
                $this->Day0SpOrgin->ViewValue = $this->Day0SpOrgin->optionCaption($this->Day0SpOrgin->CurrentValue);
            } else {
                $this->Day0SpOrgin->ViewValue = null;
            }
            $this->Day0SpOrgin->ViewCustomAttributes = "";

            // Day5Cryoptop
            if (strval($this->Day5Cryoptop->CurrentValue) != "") {
                $this->Day5Cryoptop->ViewValue = $this->Day5Cryoptop->optionCaption($this->Day5Cryoptop->CurrentValue);
            } else {
                $this->Day5Cryoptop->ViewValue = null;
            }
            $this->Day5Cryoptop->ViewCustomAttributes = "";

            // Day1Sperm
            $this->Day1Sperm->ViewValue = $this->Day1Sperm->CurrentValue;
            $this->Day1Sperm->ViewCustomAttributes = "";

            // Day1PN
            if (strval($this->Day1PN->CurrentValue) != "") {
                $this->Day1PN->ViewValue = $this->Day1PN->optionCaption($this->Day1PN->CurrentValue);
            } else {
                $this->Day1PN->ViewValue = null;
            }
            $this->Day1PN->ViewCustomAttributes = "";

            // Day1PB
            if (strval($this->Day1PB->CurrentValue) != "") {
                $this->Day1PB->ViewValue = $this->Day1PB->optionCaption($this->Day1PB->CurrentValue);
            } else {
                $this->Day1PB->ViewValue = null;
            }
            $this->Day1PB->ViewCustomAttributes = "";

            // Day1Pronucleus
            if (strval($this->Day1Pronucleus->CurrentValue) != "") {
                $this->Day1Pronucleus->ViewValue = $this->Day1Pronucleus->optionCaption($this->Day1Pronucleus->CurrentValue);
            } else {
                $this->Day1Pronucleus->ViewValue = null;
            }
            $this->Day1Pronucleus->ViewCustomAttributes = "";

            // Day1Nucleolus
            if (strval($this->Day1Nucleolus->CurrentValue) != "") {
                $this->Day1Nucleolus->ViewValue = $this->Day1Nucleolus->optionCaption($this->Day1Nucleolus->CurrentValue);
            } else {
                $this->Day1Nucleolus->ViewValue = null;
            }
            $this->Day1Nucleolus->ViewCustomAttributes = "";

            // Day1Halo
            if (strval($this->Day1Halo->CurrentValue) != "") {
                $this->Day1Halo->ViewValue = $this->Day1Halo->optionCaption($this->Day1Halo->CurrentValue);
            } else {
                $this->Day1Halo->ViewValue = null;
            }
            $this->Day1Halo->ViewCustomAttributes = "";

            // Day2SiNo
            $this->Day2SiNo->ViewValue = $this->Day2SiNo->CurrentValue;
            $this->Day2SiNo->ViewCustomAttributes = "";

            // Day2CellNo
            $this->Day2CellNo->ViewValue = $this->Day2CellNo->CurrentValue;
            $this->Day2CellNo->ViewCustomAttributes = "";

            // Day2Frag
            $this->Day2Frag->ViewValue = $this->Day2Frag->CurrentValue;
            $this->Day2Frag->ViewCustomAttributes = "";

            // Day2Symmetry
            $this->Day2Symmetry->ViewValue = $this->Day2Symmetry->CurrentValue;
            $this->Day2Symmetry->ViewCustomAttributes = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->ViewValue = $this->Day2Cryoptop->CurrentValue;
            $this->Day2Cryoptop->ViewCustomAttributes = "";

            // Day2Grade
            $this->Day2Grade->ViewValue = $this->Day2Grade->CurrentValue;
            $this->Day2Grade->ViewCustomAttributes = "";

            // Day2End
            if (strval($this->Day2End->CurrentValue) != "") {
                $this->Day2End->ViewValue = $this->Day2End->optionCaption($this->Day2End->CurrentValue);
            } else {
                $this->Day2End->ViewValue = null;
            }
            $this->Day2End->ViewCustomAttributes = "";

            // Day3Sino
            $this->Day3Sino->ViewValue = $this->Day3Sino->CurrentValue;
            $this->Day3Sino->ViewCustomAttributes = "";

            // Day3CellNo
            $this->Day3CellNo->ViewValue = $this->Day3CellNo->CurrentValue;
            $this->Day3CellNo->ViewCustomAttributes = "";

            // Day3Frag
            if (strval($this->Day3Frag->CurrentValue) != "") {
                $this->Day3Frag->ViewValue = $this->Day3Frag->optionCaption($this->Day3Frag->CurrentValue);
            } else {
                $this->Day3Frag->ViewValue = null;
            }
            $this->Day3Frag->ViewCustomAttributes = "";

            // Day3Symmetry
            if (strval($this->Day3Symmetry->CurrentValue) != "") {
                $this->Day3Symmetry->ViewValue = $this->Day3Symmetry->optionCaption($this->Day3Symmetry->CurrentValue);
            } else {
                $this->Day3Symmetry->ViewValue = null;
            }
            $this->Day3Symmetry->ViewCustomAttributes = "";

            // Day3ZP
            if (strval($this->Day3ZP->CurrentValue) != "") {
                $this->Day3ZP->ViewValue = $this->Day3ZP->optionCaption($this->Day3ZP->CurrentValue);
            } else {
                $this->Day3ZP->ViewValue = null;
            }
            $this->Day3ZP->ViewCustomAttributes = "";

            // Day3Vacoules
            if (strval($this->Day3Vacoules->CurrentValue) != "") {
                $this->Day3Vacoules->ViewValue = $this->Day3Vacoules->optionCaption($this->Day3Vacoules->CurrentValue);
            } else {
                $this->Day3Vacoules->ViewValue = null;
            }
            $this->Day3Vacoules->ViewCustomAttributes = "";

            // Day3Grade
            if (strval($this->Day3Grade->CurrentValue) != "") {
                $this->Day3Grade->ViewValue = $this->Day3Grade->optionCaption($this->Day3Grade->CurrentValue);
            } else {
                $this->Day3Grade->ViewValue = null;
            }
            $this->Day3Grade->ViewCustomAttributes = "";

            // Day3Cryoptop
            if (strval($this->Day3Cryoptop->CurrentValue) != "") {
                $this->Day3Cryoptop->ViewValue = $this->Day3Cryoptop->optionCaption($this->Day3Cryoptop->CurrentValue);
            } else {
                $this->Day3Cryoptop->ViewValue = null;
            }
            $this->Day3Cryoptop->ViewCustomAttributes = "";

            // Day3End
            if (strval($this->Day3End->CurrentValue) != "") {
                $this->Day3End->ViewValue = $this->Day3End->optionCaption($this->Day3End->CurrentValue);
            } else {
                $this->Day3End->ViewValue = null;
            }
            $this->Day3End->ViewCustomAttributes = "";

            // Day4SiNo
            $this->Day4SiNo->ViewValue = $this->Day4SiNo->CurrentValue;
            $this->Day4SiNo->ViewCustomAttributes = "";

            // Day4CellNo
            $this->Day4CellNo->ViewValue = $this->Day4CellNo->CurrentValue;
            $this->Day4CellNo->ViewCustomAttributes = "";

            // Day4Frag
            $this->Day4Frag->ViewValue = $this->Day4Frag->CurrentValue;
            $this->Day4Frag->ViewCustomAttributes = "";

            // Day4Symmetry
            $this->Day4Symmetry->ViewValue = $this->Day4Symmetry->CurrentValue;
            $this->Day4Symmetry->ViewCustomAttributes = "";

            // Day4Grade
            $this->Day4Grade->ViewValue = $this->Day4Grade->CurrentValue;
            $this->Day4Grade->ViewCustomAttributes = "";

            // Day4Cryoptop
            if (strval($this->Day4Cryoptop->CurrentValue) != "") {
                $this->Day4Cryoptop->ViewValue = $this->Day4Cryoptop->optionCaption($this->Day4Cryoptop->CurrentValue);
            } else {
                $this->Day4Cryoptop->ViewValue = null;
            }
            $this->Day4Cryoptop->ViewCustomAttributes = "";

            // Day4End
            if (strval($this->Day4End->CurrentValue) != "") {
                $this->Day4End->ViewValue = $this->Day4End->optionCaption($this->Day4End->CurrentValue);
            } else {
                $this->Day4End->ViewValue = null;
            }
            $this->Day4End->ViewCustomAttributes = "";

            // Day5CellNo
            $this->Day5CellNo->ViewValue = $this->Day5CellNo->CurrentValue;
            $this->Day5CellNo->ViewCustomAttributes = "";

            // Day5ICM
            if (strval($this->Day5ICM->CurrentValue) != "") {
                $this->Day5ICM->ViewValue = $this->Day5ICM->optionCaption($this->Day5ICM->CurrentValue);
            } else {
                $this->Day5ICM->ViewValue = null;
            }
            $this->Day5ICM->ViewCustomAttributes = "";

            // Day5TE
            if (strval($this->Day5TE->CurrentValue) != "") {
                $this->Day5TE->ViewValue = $this->Day5TE->optionCaption($this->Day5TE->CurrentValue);
            } else {
                $this->Day5TE->ViewValue = null;
            }
            $this->Day5TE->ViewCustomAttributes = "";

            // Day5Observation
            if (strval($this->Day5Observation->CurrentValue) != "") {
                $this->Day5Observation->ViewValue = $this->Day5Observation->optionCaption($this->Day5Observation->CurrentValue);
            } else {
                $this->Day5Observation->ViewValue = null;
            }
            $this->Day5Observation->ViewCustomAttributes = "";

            // Day5Collapsed
            if (strval($this->Day5Collapsed->CurrentValue) != "") {
                $this->Day5Collapsed->ViewValue = $this->Day5Collapsed->optionCaption($this->Day5Collapsed->CurrentValue);
            } else {
                $this->Day5Collapsed->ViewValue = null;
            }
            $this->Day5Collapsed->ViewCustomAttributes = "";

            // Day5Vacoulles
            if (strval($this->Day5Vacoulles->CurrentValue) != "") {
                $this->Day5Vacoulles->ViewValue = $this->Day5Vacoulles->optionCaption($this->Day5Vacoulles->CurrentValue);
            } else {
                $this->Day5Vacoulles->ViewValue = null;
            }
            $this->Day5Vacoulles->ViewCustomAttributes = "";

            // Day5Grade
            if (strval($this->Day5Grade->CurrentValue) != "") {
                $this->Day5Grade->ViewValue = $this->Day5Grade->optionCaption($this->Day5Grade->CurrentValue);
            } else {
                $this->Day5Grade->ViewValue = null;
            }
            $this->Day5Grade->ViewCustomAttributes = "";

            // Day6CellNo
            $this->Day6CellNo->ViewValue = $this->Day6CellNo->CurrentValue;
            $this->Day6CellNo->ViewCustomAttributes = "";

            // Day6ICM
            if (strval($this->Day6ICM->CurrentValue) != "") {
                $this->Day6ICM->ViewValue = $this->Day6ICM->optionCaption($this->Day6ICM->CurrentValue);
            } else {
                $this->Day6ICM->ViewValue = null;
            }
            $this->Day6ICM->ViewCustomAttributes = "";

            // Day6TE
            if (strval($this->Day6TE->CurrentValue) != "") {
                $this->Day6TE->ViewValue = $this->Day6TE->optionCaption($this->Day6TE->CurrentValue);
            } else {
                $this->Day6TE->ViewValue = null;
            }
            $this->Day6TE->ViewCustomAttributes = "";

            // Day6Observation
            if (strval($this->Day6Observation->CurrentValue) != "") {
                $this->Day6Observation->ViewValue = $this->Day6Observation->optionCaption($this->Day6Observation->CurrentValue);
            } else {
                $this->Day6Observation->ViewValue = null;
            }
            $this->Day6Observation->ViewCustomAttributes = "";

            // Day6Collapsed
            if (strval($this->Day6Collapsed->CurrentValue) != "") {
                $this->Day6Collapsed->ViewValue = $this->Day6Collapsed->optionCaption($this->Day6Collapsed->CurrentValue);
            } else {
                $this->Day6Collapsed->ViewValue = null;
            }
            $this->Day6Collapsed->ViewCustomAttributes = "";

            // Day6Vacoulles
            if (strval($this->Day6Vacoulles->CurrentValue) != "") {
                $this->Day6Vacoulles->ViewValue = $this->Day6Vacoulles->optionCaption($this->Day6Vacoulles->CurrentValue);
            } else {
                $this->Day6Vacoulles->ViewValue = null;
            }
            $this->Day6Vacoulles->ViewCustomAttributes = "";

            // Day6Grade
            if (strval($this->Day6Grade->CurrentValue) != "") {
                $this->Day6Grade->ViewValue = $this->Day6Grade->optionCaption($this->Day6Grade->CurrentValue);
            } else {
                $this->Day6Grade->ViewValue = null;
            }
            $this->Day6Grade->ViewCustomAttributes = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->ViewValue = $this->Day6Cryoptop->CurrentValue;
            $this->Day6Cryoptop->ViewCustomAttributes = "";

            // EndSiNo
            $this->EndSiNo->ViewValue = $this->EndSiNo->CurrentValue;
            $this->EndSiNo->ViewCustomAttributes = "";

            // EndingDay
            if (strval($this->EndingDay->CurrentValue) != "") {
                $this->EndingDay->ViewValue = $this->EndingDay->optionCaption($this->EndingDay->CurrentValue);
            } else {
                $this->EndingDay->ViewValue = null;
            }
            $this->EndingDay->ViewCustomAttributes = "";

            // EndingCellStage
            $this->EndingCellStage->ViewValue = $this->EndingCellStage->CurrentValue;
            $this->EndingCellStage->ViewCustomAttributes = "";

            // EndingGrade
            if (strval($this->EndingGrade->CurrentValue) != "") {
                $this->EndingGrade->ViewValue = $this->EndingGrade->optionCaption($this->EndingGrade->CurrentValue);
            } else {
                $this->EndingGrade->ViewValue = null;
            }
            $this->EndingGrade->ViewCustomAttributes = "";

            // EndingState
            if (strval($this->EndingState->CurrentValue) != "") {
                $this->EndingState->ViewValue = $this->EndingState->optionCaption($this->EndingState->CurrentValue);
            } else {
                $this->EndingState->ViewValue = null;
            }
            $this->EndingState->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // DidNO
            $this->DidNO->ViewValue = $this->DidNO->CurrentValue;
            $this->DidNO->ViewCustomAttributes = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->ViewValue = $this->ICSiIVFDateTime->CurrentValue;
            $this->ICSiIVFDateTime->ViewValue = FormatDateTime($this->ICSiIVFDateTime->ViewValue, 0);
            $this->ICSiIVFDateTime->ViewCustomAttributes = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->ViewValue = $this->PrimaryEmbrologist->CurrentValue;
            $this->PrimaryEmbrologist->ViewCustomAttributes = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->ViewValue = $this->SecondaryEmbrologist->CurrentValue;
            $this->SecondaryEmbrologist->ViewCustomAttributes = "";

            // Incubator
            $this->Incubator->ViewValue = $this->Incubator->CurrentValue;
            $this->Incubator->ViewCustomAttributes = "";

            // location
            $this->location->ViewValue = $this->location->CurrentValue;
            $this->location->ViewCustomAttributes = "";

            // OocyteNo
            $this->OocyteNo->ViewValue = $this->OocyteNo->CurrentValue;
            $this->OocyteNo->ViewCustomAttributes = "";

            // Stage
            if (strval($this->Stage->CurrentValue) != "") {
                $this->Stage->ViewValue = $this->Stage->optionCaption($this->Stage->CurrentValue);
            } else {
                $this->Stage->ViewValue = null;
            }
            $this->Stage->ViewCustomAttributes = "";

            // Remarks
            $this->Remarks->ViewValue = $this->Remarks->CurrentValue;
            $this->Remarks->ViewCustomAttributes = "";

            // vitrificationDate
            $this->vitrificationDate->ViewValue = $this->vitrificationDate->CurrentValue;
            $this->vitrificationDate->ViewValue = FormatDateTime($this->vitrificationDate->ViewValue, 0);
            $this->vitrificationDate->ViewCustomAttributes = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->ViewValue = $this->vitriPrimaryEmbryologist->CurrentValue;
            $this->vitriPrimaryEmbryologist->ViewCustomAttributes = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->ViewValue = $this->vitriSecondaryEmbryologist->CurrentValue;
            $this->vitriSecondaryEmbryologist->ViewCustomAttributes = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->ViewValue = $this->vitriEmbryoNo->CurrentValue;
            $this->vitriEmbryoNo->ViewCustomAttributes = "";

            // thawReFrozen
            if (strval($this->thawReFrozen->CurrentValue) != "") {
                $this->thawReFrozen->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->thawReFrozen->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->thawReFrozen->ViewValue->add($this->thawReFrozen->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->thawReFrozen->ViewValue = null;
            }
            $this->thawReFrozen->ViewCustomAttributes = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->ViewValue = $this->vitriFertilisationDate->CurrentValue;
            $this->vitriFertilisationDate->ViewValue = FormatDateTime($this->vitriFertilisationDate->ViewValue, 0);
            $this->vitriFertilisationDate->ViewCustomAttributes = "";

            // vitriDay
            if (strval($this->vitriDay->CurrentValue) != "") {
                $this->vitriDay->ViewValue = $this->vitriDay->optionCaption($this->vitriDay->CurrentValue);
            } else {
                $this->vitriDay->ViewValue = null;
            }
            $this->vitriDay->ViewCustomAttributes = "";

            // vitriStage
            $this->vitriStage->ViewValue = $this->vitriStage->CurrentValue;
            $this->vitriStage->ViewCustomAttributes = "";

            // vitriGrade
            if (strval($this->vitriGrade->CurrentValue) != "") {
                $this->vitriGrade->ViewValue = $this->vitriGrade->optionCaption($this->vitriGrade->CurrentValue);
            } else {
                $this->vitriGrade->ViewValue = null;
            }
            $this->vitriGrade->ViewCustomAttributes = "";

            // vitriIncubator
            $this->vitriIncubator->ViewValue = $this->vitriIncubator->CurrentValue;
            $this->vitriIncubator->ViewCustomAttributes = "";

            // vitriTank
            $this->vitriTank->ViewValue = $this->vitriTank->CurrentValue;
            $this->vitriTank->ViewCustomAttributes = "";

            // vitriCanister
            $this->vitriCanister->ViewValue = $this->vitriCanister->CurrentValue;
            $this->vitriCanister->ViewCustomAttributes = "";

            // vitriGobiet
            $this->vitriGobiet->ViewValue = $this->vitriGobiet->CurrentValue;
            $this->vitriGobiet->ViewCustomAttributes = "";

            // vitriViscotube
            $this->vitriViscotube->ViewValue = $this->vitriViscotube->CurrentValue;
            $this->vitriViscotube->ViewCustomAttributes = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->ViewValue = $this->vitriCryolockNo->CurrentValue;
            $this->vitriCryolockNo->ViewCustomAttributes = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->ViewValue = $this->vitriCryolockColour->CurrentValue;
            $this->vitriCryolockColour->ViewCustomAttributes = "";

            // thawDate
            $this->thawDate->ViewValue = $this->thawDate->CurrentValue;
            $this->thawDate->ViewValue = FormatDateTime($this->thawDate->ViewValue, 0);
            $this->thawDate->ViewCustomAttributes = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->ViewValue = $this->thawPrimaryEmbryologist->CurrentValue;
            $this->thawPrimaryEmbryologist->ViewCustomAttributes = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->ViewValue = $this->thawSecondaryEmbryologist->CurrentValue;
            $this->thawSecondaryEmbryologist->ViewCustomAttributes = "";

            // thawET
            if (strval($this->thawET->CurrentValue) != "") {
                $this->thawET->ViewValue = $this->thawET->optionCaption($this->thawET->CurrentValue);
            } else {
                $this->thawET->ViewValue = null;
            }
            $this->thawET->ViewCustomAttributes = "";

            // thawAbserve
            $this->thawAbserve->ViewValue = $this->thawAbserve->CurrentValue;
            $this->thawAbserve->ViewCustomAttributes = "";

            // thawDiscard
            $this->thawDiscard->ViewValue = $this->thawDiscard->CurrentValue;
            $this->thawDiscard->ViewCustomAttributes = "";

            // ETCatheter
            $this->ETCatheter->ViewValue = $this->ETCatheter->CurrentValue;
            $this->ETCatheter->ViewCustomAttributes = "";

            // ETDifficulty
            if (strval($this->ETDifficulty->CurrentValue) != "") {
                $this->ETDifficulty->ViewValue = $this->ETDifficulty->optionCaption($this->ETDifficulty->CurrentValue);
            } else {
                $this->ETDifficulty->ViewValue = null;
            }
            $this->ETDifficulty->ViewCustomAttributes = "";

            // ETEasy
            if (strval($this->ETEasy->CurrentValue) != "") {
                $this->ETEasy->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->ETEasy->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->ETEasy->ViewValue->add($this->ETEasy->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->ETEasy->ViewValue = null;
            }
            $this->ETEasy->ViewCustomAttributes = "";

            // ETComments
            $this->ETComments->ViewValue = $this->ETComments->CurrentValue;
            $this->ETComments->ViewCustomAttributes = "";

            // ETDoctor
            $this->ETDoctor->ViewValue = $this->ETDoctor->CurrentValue;
            $this->ETDoctor->ViewCustomAttributes = "";

            // ETEmbryologist
            $this->ETEmbryologist->ViewValue = $this->ETEmbryologist->CurrentValue;
            $this->ETEmbryologist->ViewCustomAttributes = "";

            // ETDate
            $this->ETDate->ViewValue = $this->ETDate->CurrentValue;
            $this->ETDate->ViewValue = FormatDateTime($this->ETDate->ViewValue, 0);
            $this->ETDate->ViewCustomAttributes = "";

            // Day1End
            if (strval($this->Day1End->CurrentValue) != "") {
                $this->Day1End->ViewValue = $this->Day1End->optionCaption($this->Day1End->CurrentValue);
            } else {
                $this->Day1End->ViewValue = null;
            }
            $this->Day1End->ViewCustomAttributes = "";

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

            // SpermOrigin
            $this->SpermOrigin->LinkCustomAttributes = "";
            $this->SpermOrigin->HrefValue = "";
            $this->SpermOrigin->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";
            $this->IndicationForART->TooltipValue = "";

            // Day0sino
            $this->Day0sino->LinkCustomAttributes = "";
            $this->Day0sino->HrefValue = "";
            $this->Day0sino->TooltipValue = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->LinkCustomAttributes = "";
            $this->Day0OocyteStage->HrefValue = "";
            $this->Day0OocyteStage->TooltipValue = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->LinkCustomAttributes = "";
            $this->Day0PolarBodyPosition->HrefValue = "";
            $this->Day0PolarBodyPosition->TooltipValue = "";

            // Day0Breakage
            $this->Day0Breakage->LinkCustomAttributes = "";
            $this->Day0Breakage->HrefValue = "";
            $this->Day0Breakage->TooltipValue = "";

            // Day0Attempts
            $this->Day0Attempts->LinkCustomAttributes = "";
            $this->Day0Attempts->HrefValue = "";
            $this->Day0Attempts->TooltipValue = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->LinkCustomAttributes = "";
            $this->Day0SPZMorpho->HrefValue = "";
            $this->Day0SPZMorpho->TooltipValue = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->LinkCustomAttributes = "";
            $this->Day0SPZLocation->HrefValue = "";
            $this->Day0SPZLocation->TooltipValue = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->LinkCustomAttributes = "";
            $this->Day0SpOrgin->HrefValue = "";
            $this->Day0SpOrgin->TooltipValue = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->LinkCustomAttributes = "";
            $this->Day5Cryoptop->HrefValue = "";
            $this->Day5Cryoptop->TooltipValue = "";

            // Day1Sperm
            $this->Day1Sperm->LinkCustomAttributes = "";
            $this->Day1Sperm->HrefValue = "";
            $this->Day1Sperm->TooltipValue = "";

            // Day1PN
            $this->Day1PN->LinkCustomAttributes = "";
            $this->Day1PN->HrefValue = "";
            $this->Day1PN->TooltipValue = "";

            // Day1PB
            $this->Day1PB->LinkCustomAttributes = "";
            $this->Day1PB->HrefValue = "";
            $this->Day1PB->TooltipValue = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->LinkCustomAttributes = "";
            $this->Day1Pronucleus->HrefValue = "";
            $this->Day1Pronucleus->TooltipValue = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->LinkCustomAttributes = "";
            $this->Day1Nucleolus->HrefValue = "";
            $this->Day1Nucleolus->TooltipValue = "";

            // Day1Halo
            $this->Day1Halo->LinkCustomAttributes = "";
            $this->Day1Halo->HrefValue = "";
            $this->Day1Halo->TooltipValue = "";

            // Day2SiNo
            $this->Day2SiNo->LinkCustomAttributes = "";
            $this->Day2SiNo->HrefValue = "";
            $this->Day2SiNo->TooltipValue = "";

            // Day2CellNo
            $this->Day2CellNo->LinkCustomAttributes = "";
            $this->Day2CellNo->HrefValue = "";
            $this->Day2CellNo->TooltipValue = "";

            // Day2Frag
            $this->Day2Frag->LinkCustomAttributes = "";
            $this->Day2Frag->HrefValue = "";
            $this->Day2Frag->TooltipValue = "";

            // Day2Symmetry
            $this->Day2Symmetry->LinkCustomAttributes = "";
            $this->Day2Symmetry->HrefValue = "";
            $this->Day2Symmetry->TooltipValue = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->LinkCustomAttributes = "";
            $this->Day2Cryoptop->HrefValue = "";
            $this->Day2Cryoptop->TooltipValue = "";

            // Day2Grade
            $this->Day2Grade->LinkCustomAttributes = "";
            $this->Day2Grade->HrefValue = "";
            $this->Day2Grade->TooltipValue = "";

            // Day2End
            $this->Day2End->LinkCustomAttributes = "";
            $this->Day2End->HrefValue = "";
            $this->Day2End->TooltipValue = "";

            // Day3Sino
            $this->Day3Sino->LinkCustomAttributes = "";
            $this->Day3Sino->HrefValue = "";
            $this->Day3Sino->TooltipValue = "";

            // Day3CellNo
            $this->Day3CellNo->LinkCustomAttributes = "";
            $this->Day3CellNo->HrefValue = "";
            $this->Day3CellNo->TooltipValue = "";

            // Day3Frag
            $this->Day3Frag->LinkCustomAttributes = "";
            $this->Day3Frag->HrefValue = "";
            $this->Day3Frag->TooltipValue = "";

            // Day3Symmetry
            $this->Day3Symmetry->LinkCustomAttributes = "";
            $this->Day3Symmetry->HrefValue = "";
            $this->Day3Symmetry->TooltipValue = "";

            // Day3ZP
            $this->Day3ZP->LinkCustomAttributes = "";
            $this->Day3ZP->HrefValue = "";
            $this->Day3ZP->TooltipValue = "";

            // Day3Vacoules
            $this->Day3Vacoules->LinkCustomAttributes = "";
            $this->Day3Vacoules->HrefValue = "";
            $this->Day3Vacoules->TooltipValue = "";

            // Day3Grade
            $this->Day3Grade->LinkCustomAttributes = "";
            $this->Day3Grade->HrefValue = "";
            $this->Day3Grade->TooltipValue = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->LinkCustomAttributes = "";
            $this->Day3Cryoptop->HrefValue = "";
            $this->Day3Cryoptop->TooltipValue = "";

            // Day3End
            $this->Day3End->LinkCustomAttributes = "";
            $this->Day3End->HrefValue = "";
            $this->Day3End->TooltipValue = "";

            // Day4SiNo
            $this->Day4SiNo->LinkCustomAttributes = "";
            $this->Day4SiNo->HrefValue = "";
            $this->Day4SiNo->TooltipValue = "";

            // Day4CellNo
            $this->Day4CellNo->LinkCustomAttributes = "";
            $this->Day4CellNo->HrefValue = "";
            $this->Day4CellNo->TooltipValue = "";

            // Day4Frag
            $this->Day4Frag->LinkCustomAttributes = "";
            $this->Day4Frag->HrefValue = "";
            $this->Day4Frag->TooltipValue = "";

            // Day4Symmetry
            $this->Day4Symmetry->LinkCustomAttributes = "";
            $this->Day4Symmetry->HrefValue = "";
            $this->Day4Symmetry->TooltipValue = "";

            // Day4Grade
            $this->Day4Grade->LinkCustomAttributes = "";
            $this->Day4Grade->HrefValue = "";
            $this->Day4Grade->TooltipValue = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->LinkCustomAttributes = "";
            $this->Day4Cryoptop->HrefValue = "";
            $this->Day4Cryoptop->TooltipValue = "";

            // Day4End
            $this->Day4End->LinkCustomAttributes = "";
            $this->Day4End->HrefValue = "";
            $this->Day4End->TooltipValue = "";

            // Day5CellNo
            $this->Day5CellNo->LinkCustomAttributes = "";
            $this->Day5CellNo->HrefValue = "";
            $this->Day5CellNo->TooltipValue = "";

            // Day5ICM
            $this->Day5ICM->LinkCustomAttributes = "";
            $this->Day5ICM->HrefValue = "";
            $this->Day5ICM->TooltipValue = "";

            // Day5TE
            $this->Day5TE->LinkCustomAttributes = "";
            $this->Day5TE->HrefValue = "";
            $this->Day5TE->TooltipValue = "";

            // Day5Observation
            $this->Day5Observation->LinkCustomAttributes = "";
            $this->Day5Observation->HrefValue = "";
            $this->Day5Observation->TooltipValue = "";

            // Day5Collapsed
            $this->Day5Collapsed->LinkCustomAttributes = "";
            $this->Day5Collapsed->HrefValue = "";
            $this->Day5Collapsed->TooltipValue = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->LinkCustomAttributes = "";
            $this->Day5Vacoulles->HrefValue = "";
            $this->Day5Vacoulles->TooltipValue = "";

            // Day5Grade
            $this->Day5Grade->LinkCustomAttributes = "";
            $this->Day5Grade->HrefValue = "";
            $this->Day5Grade->TooltipValue = "";

            // Day6CellNo
            $this->Day6CellNo->LinkCustomAttributes = "";
            $this->Day6CellNo->HrefValue = "";
            $this->Day6CellNo->TooltipValue = "";

            // Day6ICM
            $this->Day6ICM->LinkCustomAttributes = "";
            $this->Day6ICM->HrefValue = "";
            $this->Day6ICM->TooltipValue = "";

            // Day6TE
            $this->Day6TE->LinkCustomAttributes = "";
            $this->Day6TE->HrefValue = "";
            $this->Day6TE->TooltipValue = "";

            // Day6Observation
            $this->Day6Observation->LinkCustomAttributes = "";
            $this->Day6Observation->HrefValue = "";
            $this->Day6Observation->TooltipValue = "";

            // Day6Collapsed
            $this->Day6Collapsed->LinkCustomAttributes = "";
            $this->Day6Collapsed->HrefValue = "";
            $this->Day6Collapsed->TooltipValue = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->LinkCustomAttributes = "";
            $this->Day6Vacoulles->HrefValue = "";
            $this->Day6Vacoulles->TooltipValue = "";

            // Day6Grade
            $this->Day6Grade->LinkCustomAttributes = "";
            $this->Day6Grade->HrefValue = "";
            $this->Day6Grade->TooltipValue = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->LinkCustomAttributes = "";
            $this->Day6Cryoptop->HrefValue = "";
            $this->Day6Cryoptop->TooltipValue = "";

            // EndSiNo
            $this->EndSiNo->LinkCustomAttributes = "";
            $this->EndSiNo->HrefValue = "";
            $this->EndSiNo->TooltipValue = "";

            // EndingDay
            $this->EndingDay->LinkCustomAttributes = "";
            $this->EndingDay->HrefValue = "";
            $this->EndingDay->TooltipValue = "";

            // EndingCellStage
            $this->EndingCellStage->LinkCustomAttributes = "";
            $this->EndingCellStage->HrefValue = "";
            $this->EndingCellStage->TooltipValue = "";

            // EndingGrade
            $this->EndingGrade->LinkCustomAttributes = "";
            $this->EndingGrade->HrefValue = "";
            $this->EndingGrade->TooltipValue = "";

            // EndingState
            $this->EndingState->LinkCustomAttributes = "";
            $this->EndingState->HrefValue = "";
            $this->EndingState->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // DidNO
            $this->DidNO->LinkCustomAttributes = "";
            $this->DidNO->HrefValue = "";
            $this->DidNO->TooltipValue = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->LinkCustomAttributes = "";
            $this->ICSiIVFDateTime->HrefValue = "";
            $this->ICSiIVFDateTime->TooltipValue = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->LinkCustomAttributes = "";
            $this->PrimaryEmbrologist->HrefValue = "";
            $this->PrimaryEmbrologist->TooltipValue = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->LinkCustomAttributes = "";
            $this->SecondaryEmbrologist->HrefValue = "";
            $this->SecondaryEmbrologist->TooltipValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";
            $this->Incubator->TooltipValue = "";

            // location
            $this->location->LinkCustomAttributes = "";
            $this->location->HrefValue = "";
            $this->location->TooltipValue = "";

            // OocyteNo
            $this->OocyteNo->LinkCustomAttributes = "";
            $this->OocyteNo->HrefValue = "";
            $this->OocyteNo->TooltipValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";
            $this->Stage->TooltipValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";
            $this->Remarks->TooltipValue = "";

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";
            $this->vitrificationDate->TooltipValue = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriPrimaryEmbryologist->HrefValue = "";
            $this->vitriPrimaryEmbryologist->TooltipValue = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriSecondaryEmbryologist->HrefValue = "";
            $this->vitriSecondaryEmbryologist->TooltipValue = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->LinkCustomAttributes = "";
            $this->vitriEmbryoNo->HrefValue = "";
            $this->vitriEmbryoNo->TooltipValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";
            $this->thawReFrozen->TooltipValue = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->LinkCustomAttributes = "";
            $this->vitriFertilisationDate->HrefValue = "";
            $this->vitriFertilisationDate->TooltipValue = "";

            // vitriDay
            $this->vitriDay->LinkCustomAttributes = "";
            $this->vitriDay->HrefValue = "";
            $this->vitriDay->TooltipValue = "";

            // vitriStage
            $this->vitriStage->LinkCustomAttributes = "";
            $this->vitriStage->HrefValue = "";
            $this->vitriStage->TooltipValue = "";

            // vitriGrade
            $this->vitriGrade->LinkCustomAttributes = "";
            $this->vitriGrade->HrefValue = "";
            $this->vitriGrade->TooltipValue = "";

            // vitriIncubator
            $this->vitriIncubator->LinkCustomAttributes = "";
            $this->vitriIncubator->HrefValue = "";
            $this->vitriIncubator->TooltipValue = "";

            // vitriTank
            $this->vitriTank->LinkCustomAttributes = "";
            $this->vitriTank->HrefValue = "";
            $this->vitriTank->TooltipValue = "";

            // vitriCanister
            $this->vitriCanister->LinkCustomAttributes = "";
            $this->vitriCanister->HrefValue = "";
            $this->vitriCanister->TooltipValue = "";

            // vitriGobiet
            $this->vitriGobiet->LinkCustomAttributes = "";
            $this->vitriGobiet->HrefValue = "";
            $this->vitriGobiet->TooltipValue = "";

            // vitriViscotube
            $this->vitriViscotube->LinkCustomAttributes = "";
            $this->vitriViscotube->HrefValue = "";
            $this->vitriViscotube->TooltipValue = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->LinkCustomAttributes = "";
            $this->vitriCryolockNo->HrefValue = "";
            $this->vitriCryolockNo->TooltipValue = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->LinkCustomAttributes = "";
            $this->vitriCryolockColour->HrefValue = "";
            $this->vitriCryolockColour->TooltipValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";
            $this->thawDate->TooltipValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";
            $this->thawPrimaryEmbryologist->TooltipValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";
            $this->thawSecondaryEmbryologist->TooltipValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";
            $this->thawET->TooltipValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";
            $this->thawAbserve->TooltipValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";
            $this->thawDiscard->TooltipValue = "";

            // ETCatheter
            $this->ETCatheter->LinkCustomAttributes = "";
            $this->ETCatheter->HrefValue = "";
            $this->ETCatheter->TooltipValue = "";

            // ETDifficulty
            $this->ETDifficulty->LinkCustomAttributes = "";
            $this->ETDifficulty->HrefValue = "";
            $this->ETDifficulty->TooltipValue = "";

            // ETEasy
            $this->ETEasy->LinkCustomAttributes = "";
            $this->ETEasy->HrefValue = "";
            $this->ETEasy->TooltipValue = "";

            // ETComments
            $this->ETComments->LinkCustomAttributes = "";
            $this->ETComments->HrefValue = "";
            $this->ETComments->TooltipValue = "";

            // ETDoctor
            $this->ETDoctor->LinkCustomAttributes = "";
            $this->ETDoctor->HrefValue = "";
            $this->ETDoctor->TooltipValue = "";

            // ETEmbryologist
            $this->ETEmbryologist->LinkCustomAttributes = "";
            $this->ETEmbryologist->HrefValue = "";
            $this->ETEmbryologist->TooltipValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";
            $this->ETDate->TooltipValue = "";

            // Day1End
            $this->Day1End->LinkCustomAttributes = "";
            $this->Day1End->HrefValue = "";
            $this->Day1End->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            if ($this->RIDNo->getSessionValue() != "") {
                $this->RIDNo->CurrentValue = GetForeignKeyValue($this->RIDNo->getSessionValue());
                $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
                $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
                $this->RIDNo->ViewCustomAttributes = "";
            } else {
                $this->RIDNo->EditValue = HtmlEncode($this->RIDNo->CurrentValue);
                $this->RIDNo->PlaceHolder = RemoveHtml($this->RIDNo->caption());
            }

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if ($this->Name->getSessionValue() != "") {
                $this->Name->CurrentValue = GetForeignKeyValue($this->Name->getSessionValue());
                $this->Name->ViewValue = $this->Name->CurrentValue;
                $this->Name->ViewCustomAttributes = "";
            } else {
                if (!$this->Name->Raw) {
                    $this->Name->CurrentValue = HtmlDecode($this->Name->CurrentValue);
                }
                $this->Name->EditValue = HtmlEncode($this->Name->CurrentValue);
                $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());
            }

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            if (!$this->ARTCycle->Raw) {
                $this->ARTCycle->CurrentValue = HtmlDecode($this->ARTCycle->CurrentValue);
            }
            $this->ARTCycle->EditValue = HtmlEncode($this->ARTCycle->CurrentValue);
            $this->ARTCycle->PlaceHolder = RemoveHtml($this->ARTCycle->caption());

            // SpermOrigin
            $this->SpermOrigin->EditAttrs["class"] = "form-control";
            $this->SpermOrigin->EditCustomAttributes = "";
            if (!$this->SpermOrigin->Raw) {
                $this->SpermOrigin->CurrentValue = HtmlDecode($this->SpermOrigin->CurrentValue);
            }
            $this->SpermOrigin->EditValue = HtmlEncode($this->SpermOrigin->CurrentValue);
            $this->SpermOrigin->PlaceHolder = RemoveHtml($this->SpermOrigin->caption());

            // InseminatinTechnique
            $this->InseminatinTechnique->EditAttrs["class"] = "form-control";
            $this->InseminatinTechnique->EditCustomAttributes = "";
            if (!$this->InseminatinTechnique->Raw) {
                $this->InseminatinTechnique->CurrentValue = HtmlDecode($this->InseminatinTechnique->CurrentValue);
            }
            $this->InseminatinTechnique->EditValue = HtmlEncode($this->InseminatinTechnique->CurrentValue);
            $this->InseminatinTechnique->PlaceHolder = RemoveHtml($this->InseminatinTechnique->caption());

            // IndicationForART
            $this->IndicationForART->EditAttrs["class"] = "form-control";
            $this->IndicationForART->EditCustomAttributes = "";
            if (!$this->IndicationForART->Raw) {
                $this->IndicationForART->CurrentValue = HtmlDecode($this->IndicationForART->CurrentValue);
            }
            $this->IndicationForART->EditValue = HtmlEncode($this->IndicationForART->CurrentValue);
            $this->IndicationForART->PlaceHolder = RemoveHtml($this->IndicationForART->caption());

            // Day0sino
            $this->Day0sino->EditAttrs["class"] = "form-control";
            $this->Day0sino->EditCustomAttributes = "";
            if (!$this->Day0sino->Raw) {
                $this->Day0sino->CurrentValue = HtmlDecode($this->Day0sino->CurrentValue);
            }
            $this->Day0sino->EditValue = HtmlEncode($this->Day0sino->CurrentValue);
            $this->Day0sino->PlaceHolder = RemoveHtml($this->Day0sino->caption());

            // Day0OocyteStage
            $this->Day0OocyteStage->EditAttrs["class"] = "form-control";
            $this->Day0OocyteStage->EditCustomAttributes = "";
            if (!$this->Day0OocyteStage->Raw) {
                $this->Day0OocyteStage->CurrentValue = HtmlDecode($this->Day0OocyteStage->CurrentValue);
            }
            $this->Day0OocyteStage->EditValue = HtmlEncode($this->Day0OocyteStage->CurrentValue);
            $this->Day0OocyteStage->PlaceHolder = RemoveHtml($this->Day0OocyteStage->caption());

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->EditAttrs["class"] = "form-control";
            $this->Day0PolarBodyPosition->EditCustomAttributes = "";
            $this->Day0PolarBodyPosition->EditValue = $this->Day0PolarBodyPosition->options(true);
            $this->Day0PolarBodyPosition->PlaceHolder = RemoveHtml($this->Day0PolarBodyPosition->caption());

            // Day0Breakage
            $this->Day0Breakage->EditAttrs["class"] = "form-control";
            $this->Day0Breakage->EditCustomAttributes = "";
            $this->Day0Breakage->EditValue = $this->Day0Breakage->options(true);
            $this->Day0Breakage->PlaceHolder = RemoveHtml($this->Day0Breakage->caption());

            // Day0Attempts
            $this->Day0Attempts->EditAttrs["class"] = "form-control";
            $this->Day0Attempts->EditCustomAttributes = "";
            $this->Day0Attempts->EditValue = $this->Day0Attempts->options(true);
            $this->Day0Attempts->PlaceHolder = RemoveHtml($this->Day0Attempts->caption());

            // Day0SPZMorpho
            $this->Day0SPZMorpho->EditAttrs["class"] = "form-control";
            $this->Day0SPZMorpho->EditCustomAttributes = "";
            $this->Day0SPZMorpho->EditValue = $this->Day0SPZMorpho->options(true);
            $this->Day0SPZMorpho->PlaceHolder = RemoveHtml($this->Day0SPZMorpho->caption());

            // Day0SPZLocation
            $this->Day0SPZLocation->EditAttrs["class"] = "form-control";
            $this->Day0SPZLocation->EditCustomAttributes = "";
            $this->Day0SPZLocation->EditValue = $this->Day0SPZLocation->options(true);
            $this->Day0SPZLocation->PlaceHolder = RemoveHtml($this->Day0SPZLocation->caption());

            // Day0SpOrgin
            $this->Day0SpOrgin->EditAttrs["class"] = "form-control";
            $this->Day0SpOrgin->EditCustomAttributes = "";
            $this->Day0SpOrgin->EditValue = $this->Day0SpOrgin->options(true);
            $this->Day0SpOrgin->PlaceHolder = RemoveHtml($this->Day0SpOrgin->caption());

            // Day5Cryoptop
            $this->Day5Cryoptop->EditAttrs["class"] = "form-control";
            $this->Day5Cryoptop->EditCustomAttributes = "";
            $this->Day5Cryoptop->EditValue = $this->Day5Cryoptop->options(true);
            $this->Day5Cryoptop->PlaceHolder = RemoveHtml($this->Day5Cryoptop->caption());

            // Day1Sperm
            $this->Day1Sperm->EditAttrs["class"] = "form-control";
            $this->Day1Sperm->EditCustomAttributes = "";
            if (!$this->Day1Sperm->Raw) {
                $this->Day1Sperm->CurrentValue = HtmlDecode($this->Day1Sperm->CurrentValue);
            }
            $this->Day1Sperm->EditValue = HtmlEncode($this->Day1Sperm->CurrentValue);
            $this->Day1Sperm->PlaceHolder = RemoveHtml($this->Day1Sperm->caption());

            // Day1PN
            $this->Day1PN->EditAttrs["class"] = "form-control";
            $this->Day1PN->EditCustomAttributes = "";
            $this->Day1PN->EditValue = $this->Day1PN->options(true);
            $this->Day1PN->PlaceHolder = RemoveHtml($this->Day1PN->caption());

            // Day1PB
            $this->Day1PB->EditAttrs["class"] = "form-control";
            $this->Day1PB->EditCustomAttributes = "";
            $this->Day1PB->EditValue = $this->Day1PB->options(true);
            $this->Day1PB->PlaceHolder = RemoveHtml($this->Day1PB->caption());

            // Day1Pronucleus
            $this->Day1Pronucleus->EditAttrs["class"] = "form-control";
            $this->Day1Pronucleus->EditCustomAttributes = "";
            $this->Day1Pronucleus->EditValue = $this->Day1Pronucleus->options(true);
            $this->Day1Pronucleus->PlaceHolder = RemoveHtml($this->Day1Pronucleus->caption());

            // Day1Nucleolus
            $this->Day1Nucleolus->EditAttrs["class"] = "form-control";
            $this->Day1Nucleolus->EditCustomAttributes = "";
            $this->Day1Nucleolus->EditValue = $this->Day1Nucleolus->options(true);
            $this->Day1Nucleolus->PlaceHolder = RemoveHtml($this->Day1Nucleolus->caption());

            // Day1Halo
            $this->Day1Halo->EditAttrs["class"] = "form-control";
            $this->Day1Halo->EditCustomAttributes = "";
            $this->Day1Halo->EditValue = $this->Day1Halo->options(true);
            $this->Day1Halo->PlaceHolder = RemoveHtml($this->Day1Halo->caption());

            // Day2SiNo
            $this->Day2SiNo->EditAttrs["class"] = "form-control";
            $this->Day2SiNo->EditCustomAttributes = "";
            if (!$this->Day2SiNo->Raw) {
                $this->Day2SiNo->CurrentValue = HtmlDecode($this->Day2SiNo->CurrentValue);
            }
            $this->Day2SiNo->EditValue = HtmlEncode($this->Day2SiNo->CurrentValue);
            $this->Day2SiNo->PlaceHolder = RemoveHtml($this->Day2SiNo->caption());

            // Day2CellNo
            $this->Day2CellNo->EditAttrs["class"] = "form-control";
            $this->Day2CellNo->EditCustomAttributes = "";
            if (!$this->Day2CellNo->Raw) {
                $this->Day2CellNo->CurrentValue = HtmlDecode($this->Day2CellNo->CurrentValue);
            }
            $this->Day2CellNo->EditValue = HtmlEncode($this->Day2CellNo->CurrentValue);
            $this->Day2CellNo->PlaceHolder = RemoveHtml($this->Day2CellNo->caption());

            // Day2Frag
            $this->Day2Frag->EditAttrs["class"] = "form-control";
            $this->Day2Frag->EditCustomAttributes = "";
            if (!$this->Day2Frag->Raw) {
                $this->Day2Frag->CurrentValue = HtmlDecode($this->Day2Frag->CurrentValue);
            }
            $this->Day2Frag->EditValue = HtmlEncode($this->Day2Frag->CurrentValue);
            $this->Day2Frag->PlaceHolder = RemoveHtml($this->Day2Frag->caption());

            // Day2Symmetry
            $this->Day2Symmetry->EditAttrs["class"] = "form-control";
            $this->Day2Symmetry->EditCustomAttributes = "";
            if (!$this->Day2Symmetry->Raw) {
                $this->Day2Symmetry->CurrentValue = HtmlDecode($this->Day2Symmetry->CurrentValue);
            }
            $this->Day2Symmetry->EditValue = HtmlEncode($this->Day2Symmetry->CurrentValue);
            $this->Day2Symmetry->PlaceHolder = RemoveHtml($this->Day2Symmetry->caption());

            // Day2Cryoptop
            $this->Day2Cryoptop->EditAttrs["class"] = "form-control";
            $this->Day2Cryoptop->EditCustomAttributes = "";
            if (!$this->Day2Cryoptop->Raw) {
                $this->Day2Cryoptop->CurrentValue = HtmlDecode($this->Day2Cryoptop->CurrentValue);
            }
            $this->Day2Cryoptop->EditValue = HtmlEncode($this->Day2Cryoptop->CurrentValue);
            $this->Day2Cryoptop->PlaceHolder = RemoveHtml($this->Day2Cryoptop->caption());

            // Day2Grade
            $this->Day2Grade->EditAttrs["class"] = "form-control";
            $this->Day2Grade->EditCustomAttributes = "";
            if (!$this->Day2Grade->Raw) {
                $this->Day2Grade->CurrentValue = HtmlDecode($this->Day2Grade->CurrentValue);
            }
            $this->Day2Grade->EditValue = HtmlEncode($this->Day2Grade->CurrentValue);
            $this->Day2Grade->PlaceHolder = RemoveHtml($this->Day2Grade->caption());

            // Day2End
            $this->Day2End->EditAttrs["class"] = "form-control";
            $this->Day2End->EditCustomAttributes = "";
            $this->Day2End->EditValue = $this->Day2End->options(true);
            $this->Day2End->PlaceHolder = RemoveHtml($this->Day2End->caption());

            // Day3Sino
            $this->Day3Sino->EditAttrs["class"] = "form-control";
            $this->Day3Sino->EditCustomAttributes = "";
            if (!$this->Day3Sino->Raw) {
                $this->Day3Sino->CurrentValue = HtmlDecode($this->Day3Sino->CurrentValue);
            }
            $this->Day3Sino->EditValue = HtmlEncode($this->Day3Sino->CurrentValue);
            $this->Day3Sino->PlaceHolder = RemoveHtml($this->Day3Sino->caption());

            // Day3CellNo
            $this->Day3CellNo->EditAttrs["class"] = "form-control";
            $this->Day3CellNo->EditCustomAttributes = "";
            if (!$this->Day3CellNo->Raw) {
                $this->Day3CellNo->CurrentValue = HtmlDecode($this->Day3CellNo->CurrentValue);
            }
            $this->Day3CellNo->EditValue = HtmlEncode($this->Day3CellNo->CurrentValue);
            $this->Day3CellNo->PlaceHolder = RemoveHtml($this->Day3CellNo->caption());

            // Day3Frag
            $this->Day3Frag->EditAttrs["class"] = "form-control";
            $this->Day3Frag->EditCustomAttributes = "";
            $this->Day3Frag->EditValue = $this->Day3Frag->options(true);
            $this->Day3Frag->PlaceHolder = RemoveHtml($this->Day3Frag->caption());

            // Day3Symmetry
            $this->Day3Symmetry->EditAttrs["class"] = "form-control";
            $this->Day3Symmetry->EditCustomAttributes = "";
            $this->Day3Symmetry->EditValue = $this->Day3Symmetry->options(true);
            $this->Day3Symmetry->PlaceHolder = RemoveHtml($this->Day3Symmetry->caption());

            // Day3ZP
            $this->Day3ZP->EditAttrs["class"] = "form-control";
            $this->Day3ZP->EditCustomAttributes = "";
            $this->Day3ZP->EditValue = $this->Day3ZP->options(true);
            $this->Day3ZP->PlaceHolder = RemoveHtml($this->Day3ZP->caption());

            // Day3Vacoules
            $this->Day3Vacoules->EditAttrs["class"] = "form-control";
            $this->Day3Vacoules->EditCustomAttributes = "";
            $this->Day3Vacoules->EditValue = $this->Day3Vacoules->options(true);
            $this->Day3Vacoules->PlaceHolder = RemoveHtml($this->Day3Vacoules->caption());

            // Day3Grade
            $this->Day3Grade->EditAttrs["class"] = "form-control";
            $this->Day3Grade->EditCustomAttributes = "";
            $this->Day3Grade->EditValue = $this->Day3Grade->options(true);
            $this->Day3Grade->PlaceHolder = RemoveHtml($this->Day3Grade->caption());

            // Day3Cryoptop
            $this->Day3Cryoptop->EditAttrs["class"] = "form-control";
            $this->Day3Cryoptop->EditCustomAttributes = "";
            $this->Day3Cryoptop->EditValue = $this->Day3Cryoptop->options(true);
            $this->Day3Cryoptop->PlaceHolder = RemoveHtml($this->Day3Cryoptop->caption());

            // Day3End
            $this->Day3End->EditAttrs["class"] = "form-control";
            $this->Day3End->EditCustomAttributes = "";
            $this->Day3End->EditValue = $this->Day3End->options(true);
            $this->Day3End->PlaceHolder = RemoveHtml($this->Day3End->caption());

            // Day4SiNo
            $this->Day4SiNo->EditAttrs["class"] = "form-control";
            $this->Day4SiNo->EditCustomAttributes = "";
            if (!$this->Day4SiNo->Raw) {
                $this->Day4SiNo->CurrentValue = HtmlDecode($this->Day4SiNo->CurrentValue);
            }
            $this->Day4SiNo->EditValue = HtmlEncode($this->Day4SiNo->CurrentValue);
            $this->Day4SiNo->PlaceHolder = RemoveHtml($this->Day4SiNo->caption());

            // Day4CellNo
            $this->Day4CellNo->EditAttrs["class"] = "form-control";
            $this->Day4CellNo->EditCustomAttributes = "";
            if (!$this->Day4CellNo->Raw) {
                $this->Day4CellNo->CurrentValue = HtmlDecode($this->Day4CellNo->CurrentValue);
            }
            $this->Day4CellNo->EditValue = HtmlEncode($this->Day4CellNo->CurrentValue);
            $this->Day4CellNo->PlaceHolder = RemoveHtml($this->Day4CellNo->caption());

            // Day4Frag
            $this->Day4Frag->EditAttrs["class"] = "form-control";
            $this->Day4Frag->EditCustomAttributes = "";
            if (!$this->Day4Frag->Raw) {
                $this->Day4Frag->CurrentValue = HtmlDecode($this->Day4Frag->CurrentValue);
            }
            $this->Day4Frag->EditValue = HtmlEncode($this->Day4Frag->CurrentValue);
            $this->Day4Frag->PlaceHolder = RemoveHtml($this->Day4Frag->caption());

            // Day4Symmetry
            $this->Day4Symmetry->EditAttrs["class"] = "form-control";
            $this->Day4Symmetry->EditCustomAttributes = "";
            if (!$this->Day4Symmetry->Raw) {
                $this->Day4Symmetry->CurrentValue = HtmlDecode($this->Day4Symmetry->CurrentValue);
            }
            $this->Day4Symmetry->EditValue = HtmlEncode($this->Day4Symmetry->CurrentValue);
            $this->Day4Symmetry->PlaceHolder = RemoveHtml($this->Day4Symmetry->caption());

            // Day4Grade
            $this->Day4Grade->EditAttrs["class"] = "form-control";
            $this->Day4Grade->EditCustomAttributes = "";
            if (!$this->Day4Grade->Raw) {
                $this->Day4Grade->CurrentValue = HtmlDecode($this->Day4Grade->CurrentValue);
            }
            $this->Day4Grade->EditValue = HtmlEncode($this->Day4Grade->CurrentValue);
            $this->Day4Grade->PlaceHolder = RemoveHtml($this->Day4Grade->caption());

            // Day4Cryoptop
            $this->Day4Cryoptop->EditAttrs["class"] = "form-control";
            $this->Day4Cryoptop->EditCustomAttributes = "";
            $this->Day4Cryoptop->EditValue = $this->Day4Cryoptop->options(true);
            $this->Day4Cryoptop->PlaceHolder = RemoveHtml($this->Day4Cryoptop->caption());

            // Day4End
            $this->Day4End->EditAttrs["class"] = "form-control";
            $this->Day4End->EditCustomAttributes = "";
            $this->Day4End->EditValue = $this->Day4End->options(true);
            $this->Day4End->PlaceHolder = RemoveHtml($this->Day4End->caption());

            // Day5CellNo
            $this->Day5CellNo->EditAttrs["class"] = "form-control";
            $this->Day5CellNo->EditCustomAttributes = "";
            if (!$this->Day5CellNo->Raw) {
                $this->Day5CellNo->CurrentValue = HtmlDecode($this->Day5CellNo->CurrentValue);
            }
            $this->Day5CellNo->EditValue = HtmlEncode($this->Day5CellNo->CurrentValue);
            $this->Day5CellNo->PlaceHolder = RemoveHtml($this->Day5CellNo->caption());

            // Day5ICM
            $this->Day5ICM->EditAttrs["class"] = "form-control";
            $this->Day5ICM->EditCustomAttributes = "";
            $this->Day5ICM->EditValue = $this->Day5ICM->options(true);
            $this->Day5ICM->PlaceHolder = RemoveHtml($this->Day5ICM->caption());

            // Day5TE
            $this->Day5TE->EditAttrs["class"] = "form-control";
            $this->Day5TE->EditCustomAttributes = "";
            $this->Day5TE->EditValue = $this->Day5TE->options(true);
            $this->Day5TE->PlaceHolder = RemoveHtml($this->Day5TE->caption());

            // Day5Observation
            $this->Day5Observation->EditAttrs["class"] = "form-control";
            $this->Day5Observation->EditCustomAttributes = "";
            $this->Day5Observation->EditValue = $this->Day5Observation->options(true);
            $this->Day5Observation->PlaceHolder = RemoveHtml($this->Day5Observation->caption());

            // Day5Collapsed
            $this->Day5Collapsed->EditAttrs["class"] = "form-control";
            $this->Day5Collapsed->EditCustomAttributes = "";
            $this->Day5Collapsed->EditValue = $this->Day5Collapsed->options(true);
            $this->Day5Collapsed->PlaceHolder = RemoveHtml($this->Day5Collapsed->caption());

            // Day5Vacoulles
            $this->Day5Vacoulles->EditAttrs["class"] = "form-control";
            $this->Day5Vacoulles->EditCustomAttributes = "";
            $this->Day5Vacoulles->EditValue = $this->Day5Vacoulles->options(true);
            $this->Day5Vacoulles->PlaceHolder = RemoveHtml($this->Day5Vacoulles->caption());

            // Day5Grade
            $this->Day5Grade->EditAttrs["class"] = "form-control";
            $this->Day5Grade->EditCustomAttributes = "";
            $this->Day5Grade->EditValue = $this->Day5Grade->options(true);
            $this->Day5Grade->PlaceHolder = RemoveHtml($this->Day5Grade->caption());

            // Day6CellNo
            $this->Day6CellNo->EditAttrs["class"] = "form-control";
            $this->Day6CellNo->EditCustomAttributes = "";
            if (!$this->Day6CellNo->Raw) {
                $this->Day6CellNo->CurrentValue = HtmlDecode($this->Day6CellNo->CurrentValue);
            }
            $this->Day6CellNo->EditValue = HtmlEncode($this->Day6CellNo->CurrentValue);
            $this->Day6CellNo->PlaceHolder = RemoveHtml($this->Day6CellNo->caption());

            // Day6ICM
            $this->Day6ICM->EditAttrs["class"] = "form-control";
            $this->Day6ICM->EditCustomAttributes = "";
            $this->Day6ICM->EditValue = $this->Day6ICM->options(true);
            $this->Day6ICM->PlaceHolder = RemoveHtml($this->Day6ICM->caption());

            // Day6TE
            $this->Day6TE->EditAttrs["class"] = "form-control";
            $this->Day6TE->EditCustomAttributes = "";
            $this->Day6TE->EditValue = $this->Day6TE->options(true);
            $this->Day6TE->PlaceHolder = RemoveHtml($this->Day6TE->caption());

            // Day6Observation
            $this->Day6Observation->EditAttrs["class"] = "form-control";
            $this->Day6Observation->EditCustomAttributes = "";
            $this->Day6Observation->EditValue = $this->Day6Observation->options(true);
            $this->Day6Observation->PlaceHolder = RemoveHtml($this->Day6Observation->caption());

            // Day6Collapsed
            $this->Day6Collapsed->EditAttrs["class"] = "form-control";
            $this->Day6Collapsed->EditCustomAttributes = "";
            $this->Day6Collapsed->EditValue = $this->Day6Collapsed->options(true);
            $this->Day6Collapsed->PlaceHolder = RemoveHtml($this->Day6Collapsed->caption());

            // Day6Vacoulles
            $this->Day6Vacoulles->EditAttrs["class"] = "form-control";
            $this->Day6Vacoulles->EditCustomAttributes = "";
            $this->Day6Vacoulles->EditValue = $this->Day6Vacoulles->options(true);
            $this->Day6Vacoulles->PlaceHolder = RemoveHtml($this->Day6Vacoulles->caption());

            // Day6Grade
            $this->Day6Grade->EditAttrs["class"] = "form-control";
            $this->Day6Grade->EditCustomAttributes = "";
            $this->Day6Grade->EditValue = $this->Day6Grade->options(true);
            $this->Day6Grade->PlaceHolder = RemoveHtml($this->Day6Grade->caption());

            // Day6Cryoptop
            $this->Day6Cryoptop->EditAttrs["class"] = "form-control";
            $this->Day6Cryoptop->EditCustomAttributes = "";
            if (!$this->Day6Cryoptop->Raw) {
                $this->Day6Cryoptop->CurrentValue = HtmlDecode($this->Day6Cryoptop->CurrentValue);
            }
            $this->Day6Cryoptop->EditValue = HtmlEncode($this->Day6Cryoptop->CurrentValue);
            $this->Day6Cryoptop->PlaceHolder = RemoveHtml($this->Day6Cryoptop->caption());

            // EndSiNo
            $this->EndSiNo->EditAttrs["class"] = "form-control";
            $this->EndSiNo->EditCustomAttributes = "";
            if (!$this->EndSiNo->Raw) {
                $this->EndSiNo->CurrentValue = HtmlDecode($this->EndSiNo->CurrentValue);
            }
            $this->EndSiNo->EditValue = HtmlEncode($this->EndSiNo->CurrentValue);
            $this->EndSiNo->PlaceHolder = RemoveHtml($this->EndSiNo->caption());

            // EndingDay
            $this->EndingDay->EditAttrs["class"] = "form-control";
            $this->EndingDay->EditCustomAttributes = "";
            $this->EndingDay->EditValue = $this->EndingDay->options(true);
            $this->EndingDay->PlaceHolder = RemoveHtml($this->EndingDay->caption());

            // EndingCellStage
            $this->EndingCellStage->EditAttrs["class"] = "form-control";
            $this->EndingCellStage->EditCustomAttributes = "";
            if (!$this->EndingCellStage->Raw) {
                $this->EndingCellStage->CurrentValue = HtmlDecode($this->EndingCellStage->CurrentValue);
            }
            $this->EndingCellStage->EditValue = HtmlEncode($this->EndingCellStage->CurrentValue);
            $this->EndingCellStage->PlaceHolder = RemoveHtml($this->EndingCellStage->caption());

            // EndingGrade
            $this->EndingGrade->EditAttrs["class"] = "form-control";
            $this->EndingGrade->EditCustomAttributes = "";
            $this->EndingGrade->EditValue = $this->EndingGrade->options(true);
            $this->EndingGrade->PlaceHolder = RemoveHtml($this->EndingGrade->caption());

            // EndingState
            $this->EndingState->EditAttrs["class"] = "form-control";
            $this->EndingState->EditCustomAttributes = "";
            $this->EndingState->EditValue = $this->EndingState->options(true);
            $this->EndingState->PlaceHolder = RemoveHtml($this->EndingState->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->CurrentValue = GetForeignKeyValue($this->TidNo->getSessionValue());
                $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
                $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
                $this->TidNo->ViewCustomAttributes = "";
            } else {
                $this->TidNo->EditValue = HtmlEncode($this->TidNo->CurrentValue);
                $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());
            }

            // DidNO
            $this->DidNO->EditAttrs["class"] = "form-control";
            $this->DidNO->EditCustomAttributes = "";
            if ($this->DidNO->getSessionValue() != "") {
                $this->DidNO->CurrentValue = GetForeignKeyValue($this->DidNO->getSessionValue());
                $this->DidNO->ViewValue = $this->DidNO->CurrentValue;
                $this->DidNO->ViewCustomAttributes = "";
            } else {
                if (!$this->DidNO->Raw) {
                    $this->DidNO->CurrentValue = HtmlDecode($this->DidNO->CurrentValue);
                }
                $this->DidNO->EditValue = HtmlEncode($this->DidNO->CurrentValue);
                $this->DidNO->PlaceHolder = RemoveHtml($this->DidNO->caption());
            }

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->EditAttrs["class"] = "form-control";
            $this->ICSiIVFDateTime->EditCustomAttributes = "";
            $this->ICSiIVFDateTime->EditValue = HtmlEncode(FormatDateTime($this->ICSiIVFDateTime->CurrentValue, 8));
            $this->ICSiIVFDateTime->PlaceHolder = RemoveHtml($this->ICSiIVFDateTime->caption());

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->EditAttrs["class"] = "form-control";
            $this->PrimaryEmbrologist->EditCustomAttributes = "";
            if (!$this->PrimaryEmbrologist->Raw) {
                $this->PrimaryEmbrologist->CurrentValue = HtmlDecode($this->PrimaryEmbrologist->CurrentValue);
            }
            $this->PrimaryEmbrologist->EditValue = HtmlEncode($this->PrimaryEmbrologist->CurrentValue);
            $this->PrimaryEmbrologist->PlaceHolder = RemoveHtml($this->PrimaryEmbrologist->caption());

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->EditAttrs["class"] = "form-control";
            $this->SecondaryEmbrologist->EditCustomAttributes = "";
            if (!$this->SecondaryEmbrologist->Raw) {
                $this->SecondaryEmbrologist->CurrentValue = HtmlDecode($this->SecondaryEmbrologist->CurrentValue);
            }
            $this->SecondaryEmbrologist->EditValue = HtmlEncode($this->SecondaryEmbrologist->CurrentValue);
            $this->SecondaryEmbrologist->PlaceHolder = RemoveHtml($this->SecondaryEmbrologist->caption());

            // Incubator
            $this->Incubator->EditAttrs["class"] = "form-control";
            $this->Incubator->EditCustomAttributes = "";
            if (!$this->Incubator->Raw) {
                $this->Incubator->CurrentValue = HtmlDecode($this->Incubator->CurrentValue);
            }
            $this->Incubator->EditValue = HtmlEncode($this->Incubator->CurrentValue);
            $this->Incubator->PlaceHolder = RemoveHtml($this->Incubator->caption());

            // location
            $this->location->EditAttrs["class"] = "form-control";
            $this->location->EditCustomAttributes = "";
            if (!$this->location->Raw) {
                $this->location->CurrentValue = HtmlDecode($this->location->CurrentValue);
            }
            $this->location->EditValue = HtmlEncode($this->location->CurrentValue);
            $this->location->PlaceHolder = RemoveHtml($this->location->caption());

            // OocyteNo
            $this->OocyteNo->EditAttrs["class"] = "form-control";
            $this->OocyteNo->EditCustomAttributes = "";
            if (!$this->OocyteNo->Raw) {
                $this->OocyteNo->CurrentValue = HtmlDecode($this->OocyteNo->CurrentValue);
            }
            $this->OocyteNo->EditValue = HtmlEncode($this->OocyteNo->CurrentValue);
            $this->OocyteNo->PlaceHolder = RemoveHtml($this->OocyteNo->caption());

            // Stage
            $this->Stage->EditAttrs["class"] = "form-control";
            $this->Stage->EditCustomAttributes = "";
            $this->Stage->EditValue = $this->Stage->options(true);
            $this->Stage->PlaceHolder = RemoveHtml($this->Stage->caption());

            // Remarks
            $this->Remarks->EditAttrs["class"] = "form-control";
            $this->Remarks->EditCustomAttributes = "";
            if (!$this->Remarks->Raw) {
                $this->Remarks->CurrentValue = HtmlDecode($this->Remarks->CurrentValue);
            }
            $this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
            $this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

            // vitrificationDate
            $this->vitrificationDate->EditAttrs["class"] = "form-control";
            $this->vitrificationDate->EditCustomAttributes = "";
            $this->vitrificationDate->EditValue = HtmlEncode(FormatDateTime($this->vitrificationDate->CurrentValue, 8));
            $this->vitrificationDate->PlaceHolder = RemoveHtml($this->vitrificationDate->caption());

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->vitriPrimaryEmbryologist->EditCustomAttributes = "";
            if (!$this->vitriPrimaryEmbryologist->Raw) {
                $this->vitriPrimaryEmbryologist->CurrentValue = HtmlDecode($this->vitriPrimaryEmbryologist->CurrentValue);
            }
            $this->vitriPrimaryEmbryologist->EditValue = HtmlEncode($this->vitriPrimaryEmbryologist->CurrentValue);
            $this->vitriPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriPrimaryEmbryologist->caption());

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->vitriSecondaryEmbryologist->EditCustomAttributes = "";
            if (!$this->vitriSecondaryEmbryologist->Raw) {
                $this->vitriSecondaryEmbryologist->CurrentValue = HtmlDecode($this->vitriSecondaryEmbryologist->CurrentValue);
            }
            $this->vitriSecondaryEmbryologist->EditValue = HtmlEncode($this->vitriSecondaryEmbryologist->CurrentValue);
            $this->vitriSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->vitriSecondaryEmbryologist->caption());

            // vitriEmbryoNo
            $this->vitriEmbryoNo->EditAttrs["class"] = "form-control";
            $this->vitriEmbryoNo->EditCustomAttributes = "";
            if (!$this->vitriEmbryoNo->Raw) {
                $this->vitriEmbryoNo->CurrentValue = HtmlDecode($this->vitriEmbryoNo->CurrentValue);
            }
            $this->vitriEmbryoNo->EditValue = HtmlEncode($this->vitriEmbryoNo->CurrentValue);
            $this->vitriEmbryoNo->PlaceHolder = RemoveHtml($this->vitriEmbryoNo->caption());

            // thawReFrozen
            $this->thawReFrozen->EditCustomAttributes = "";
            $this->thawReFrozen->EditValue = $this->thawReFrozen->options(false);
            $this->thawReFrozen->PlaceHolder = RemoveHtml($this->thawReFrozen->caption());

            // vitriFertilisationDate
            $this->vitriFertilisationDate->EditAttrs["class"] = "form-control";
            $this->vitriFertilisationDate->EditCustomAttributes = "";
            $this->vitriFertilisationDate->EditValue = HtmlEncode(FormatDateTime($this->vitriFertilisationDate->CurrentValue, 8));
            $this->vitriFertilisationDate->PlaceHolder = RemoveHtml($this->vitriFertilisationDate->caption());

            // vitriDay
            $this->vitriDay->EditAttrs["class"] = "form-control";
            $this->vitriDay->EditCustomAttributes = "";
            $this->vitriDay->EditValue = $this->vitriDay->options(true);
            $this->vitriDay->PlaceHolder = RemoveHtml($this->vitriDay->caption());

            // vitriStage
            $this->vitriStage->EditAttrs["class"] = "form-control";
            $this->vitriStage->EditCustomAttributes = "";
            if (!$this->vitriStage->Raw) {
                $this->vitriStage->CurrentValue = HtmlDecode($this->vitriStage->CurrentValue);
            }
            $this->vitriStage->EditValue = HtmlEncode($this->vitriStage->CurrentValue);
            $this->vitriStage->PlaceHolder = RemoveHtml($this->vitriStage->caption());

            // vitriGrade
            $this->vitriGrade->EditAttrs["class"] = "form-control";
            $this->vitriGrade->EditCustomAttributes = "";
            $this->vitriGrade->EditValue = $this->vitriGrade->options(true);
            $this->vitriGrade->PlaceHolder = RemoveHtml($this->vitriGrade->caption());

            // vitriIncubator
            $this->vitriIncubator->EditAttrs["class"] = "form-control";
            $this->vitriIncubator->EditCustomAttributes = "";
            if (!$this->vitriIncubator->Raw) {
                $this->vitriIncubator->CurrentValue = HtmlDecode($this->vitriIncubator->CurrentValue);
            }
            $this->vitriIncubator->EditValue = HtmlEncode($this->vitriIncubator->CurrentValue);
            $this->vitriIncubator->PlaceHolder = RemoveHtml($this->vitriIncubator->caption());

            // vitriTank
            $this->vitriTank->EditAttrs["class"] = "form-control";
            $this->vitriTank->EditCustomAttributes = "";
            if (!$this->vitriTank->Raw) {
                $this->vitriTank->CurrentValue = HtmlDecode($this->vitriTank->CurrentValue);
            }
            $this->vitriTank->EditValue = HtmlEncode($this->vitriTank->CurrentValue);
            $this->vitriTank->PlaceHolder = RemoveHtml($this->vitriTank->caption());

            // vitriCanister
            $this->vitriCanister->EditAttrs["class"] = "form-control";
            $this->vitriCanister->EditCustomAttributes = "";
            if (!$this->vitriCanister->Raw) {
                $this->vitriCanister->CurrentValue = HtmlDecode($this->vitriCanister->CurrentValue);
            }
            $this->vitriCanister->EditValue = HtmlEncode($this->vitriCanister->CurrentValue);
            $this->vitriCanister->PlaceHolder = RemoveHtml($this->vitriCanister->caption());

            // vitriGobiet
            $this->vitriGobiet->EditAttrs["class"] = "form-control";
            $this->vitriGobiet->EditCustomAttributes = "";
            if (!$this->vitriGobiet->Raw) {
                $this->vitriGobiet->CurrentValue = HtmlDecode($this->vitriGobiet->CurrentValue);
            }
            $this->vitriGobiet->EditValue = HtmlEncode($this->vitriGobiet->CurrentValue);
            $this->vitriGobiet->PlaceHolder = RemoveHtml($this->vitriGobiet->caption());

            // vitriViscotube
            $this->vitriViscotube->EditAttrs["class"] = "form-control";
            $this->vitriViscotube->EditCustomAttributes = "";
            if (!$this->vitriViscotube->Raw) {
                $this->vitriViscotube->CurrentValue = HtmlDecode($this->vitriViscotube->CurrentValue);
            }
            $this->vitriViscotube->EditValue = HtmlEncode($this->vitriViscotube->CurrentValue);
            $this->vitriViscotube->PlaceHolder = RemoveHtml($this->vitriViscotube->caption());

            // vitriCryolockNo
            $this->vitriCryolockNo->EditAttrs["class"] = "form-control";
            $this->vitriCryolockNo->EditCustomAttributes = "";
            if (!$this->vitriCryolockNo->Raw) {
                $this->vitriCryolockNo->CurrentValue = HtmlDecode($this->vitriCryolockNo->CurrentValue);
            }
            $this->vitriCryolockNo->EditValue = HtmlEncode($this->vitriCryolockNo->CurrentValue);
            $this->vitriCryolockNo->PlaceHolder = RemoveHtml($this->vitriCryolockNo->caption());

            // vitriCryolockColour
            $this->vitriCryolockColour->EditAttrs["class"] = "form-control";
            $this->vitriCryolockColour->EditCustomAttributes = "";
            if (!$this->vitriCryolockColour->Raw) {
                $this->vitriCryolockColour->CurrentValue = HtmlDecode($this->vitriCryolockColour->CurrentValue);
            }
            $this->vitriCryolockColour->EditValue = HtmlEncode($this->vitriCryolockColour->CurrentValue);
            $this->vitriCryolockColour->PlaceHolder = RemoveHtml($this->vitriCryolockColour->caption());

            // thawDate
            $this->thawDate->EditAttrs["class"] = "form-control";
            $this->thawDate->EditCustomAttributes = "";
            $this->thawDate->EditValue = HtmlEncode(FormatDateTime($this->thawDate->CurrentValue, 8));
            $this->thawDate->PlaceHolder = RemoveHtml($this->thawDate->caption());

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->thawPrimaryEmbryologist->EditCustomAttributes = "";
            if (!$this->thawPrimaryEmbryologist->Raw) {
                $this->thawPrimaryEmbryologist->CurrentValue = HtmlDecode($this->thawPrimaryEmbryologist->CurrentValue);
            }
            $this->thawPrimaryEmbryologist->EditValue = HtmlEncode($this->thawPrimaryEmbryologist->CurrentValue);
            $this->thawPrimaryEmbryologist->PlaceHolder = RemoveHtml($this->thawPrimaryEmbryologist->caption());

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->EditAttrs["class"] = "form-control";
            $this->thawSecondaryEmbryologist->EditCustomAttributes = "";
            if (!$this->thawSecondaryEmbryologist->Raw) {
                $this->thawSecondaryEmbryologist->CurrentValue = HtmlDecode($this->thawSecondaryEmbryologist->CurrentValue);
            }
            $this->thawSecondaryEmbryologist->EditValue = HtmlEncode($this->thawSecondaryEmbryologist->CurrentValue);
            $this->thawSecondaryEmbryologist->PlaceHolder = RemoveHtml($this->thawSecondaryEmbryologist->caption());

            // thawET
            $this->thawET->EditAttrs["class"] = "form-control";
            $this->thawET->EditCustomAttributes = "";
            $this->thawET->EditValue = $this->thawET->options(true);
            $this->thawET->PlaceHolder = RemoveHtml($this->thawET->caption());

            // thawAbserve
            $this->thawAbserve->EditAttrs["class"] = "form-control";
            $this->thawAbserve->EditCustomAttributes = "";
            if (!$this->thawAbserve->Raw) {
                $this->thawAbserve->CurrentValue = HtmlDecode($this->thawAbserve->CurrentValue);
            }
            $this->thawAbserve->EditValue = HtmlEncode($this->thawAbserve->CurrentValue);
            $this->thawAbserve->PlaceHolder = RemoveHtml($this->thawAbserve->caption());

            // thawDiscard
            $this->thawDiscard->EditAttrs["class"] = "form-control";
            $this->thawDiscard->EditCustomAttributes = "";
            if (!$this->thawDiscard->Raw) {
                $this->thawDiscard->CurrentValue = HtmlDecode($this->thawDiscard->CurrentValue);
            }
            $this->thawDiscard->EditValue = HtmlEncode($this->thawDiscard->CurrentValue);
            $this->thawDiscard->PlaceHolder = RemoveHtml($this->thawDiscard->caption());

            // ETCatheter
            $this->ETCatheter->EditAttrs["class"] = "form-control";
            $this->ETCatheter->EditCustomAttributes = "";
            if (!$this->ETCatheter->Raw) {
                $this->ETCatheter->CurrentValue = HtmlDecode($this->ETCatheter->CurrentValue);
            }
            $this->ETCatheter->EditValue = HtmlEncode($this->ETCatheter->CurrentValue);
            $this->ETCatheter->PlaceHolder = RemoveHtml($this->ETCatheter->caption());

            // ETDifficulty
            $this->ETDifficulty->EditAttrs["class"] = "form-control";
            $this->ETDifficulty->EditCustomAttributes = "";
            $this->ETDifficulty->EditValue = $this->ETDifficulty->options(true);
            $this->ETDifficulty->PlaceHolder = RemoveHtml($this->ETDifficulty->caption());

            // ETEasy
            $this->ETEasy->EditCustomAttributes = "";
            $this->ETEasy->EditValue = $this->ETEasy->options(false);
            $this->ETEasy->PlaceHolder = RemoveHtml($this->ETEasy->caption());

            // ETComments
            $this->ETComments->EditAttrs["class"] = "form-control";
            $this->ETComments->EditCustomAttributes = "";
            if (!$this->ETComments->Raw) {
                $this->ETComments->CurrentValue = HtmlDecode($this->ETComments->CurrentValue);
            }
            $this->ETComments->EditValue = HtmlEncode($this->ETComments->CurrentValue);
            $this->ETComments->PlaceHolder = RemoveHtml($this->ETComments->caption());

            // ETDoctor
            $this->ETDoctor->EditAttrs["class"] = "form-control";
            $this->ETDoctor->EditCustomAttributes = "";
            if (!$this->ETDoctor->Raw) {
                $this->ETDoctor->CurrentValue = HtmlDecode($this->ETDoctor->CurrentValue);
            }
            $this->ETDoctor->EditValue = HtmlEncode($this->ETDoctor->CurrentValue);
            $this->ETDoctor->PlaceHolder = RemoveHtml($this->ETDoctor->caption());

            // ETEmbryologist
            $this->ETEmbryologist->EditAttrs["class"] = "form-control";
            $this->ETEmbryologist->EditCustomAttributes = "";
            if (!$this->ETEmbryologist->Raw) {
                $this->ETEmbryologist->CurrentValue = HtmlDecode($this->ETEmbryologist->CurrentValue);
            }
            $this->ETEmbryologist->EditValue = HtmlEncode($this->ETEmbryologist->CurrentValue);
            $this->ETEmbryologist->PlaceHolder = RemoveHtml($this->ETEmbryologist->caption());

            // ETDate
            $this->ETDate->EditAttrs["class"] = "form-control";
            $this->ETDate->EditCustomAttributes = "";
            $this->ETDate->EditValue = HtmlEncode(FormatDateTime($this->ETDate->CurrentValue, 8));
            $this->ETDate->PlaceHolder = RemoveHtml($this->ETDate->caption());

            // Day1End
            $this->Day1End->EditAttrs["class"] = "form-control";
            $this->Day1End->EditCustomAttributes = "";
            $this->Day1End->EditValue = $this->Day1End->options(true);
            $this->Day1End->PlaceHolder = RemoveHtml($this->Day1End->caption());

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

            // SpermOrigin
            $this->SpermOrigin->LinkCustomAttributes = "";
            $this->SpermOrigin->HrefValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";

            // IndicationForART
            $this->IndicationForART->LinkCustomAttributes = "";
            $this->IndicationForART->HrefValue = "";

            // Day0sino
            $this->Day0sino->LinkCustomAttributes = "";
            $this->Day0sino->HrefValue = "";

            // Day0OocyteStage
            $this->Day0OocyteStage->LinkCustomAttributes = "";
            $this->Day0OocyteStage->HrefValue = "";

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->LinkCustomAttributes = "";
            $this->Day0PolarBodyPosition->HrefValue = "";

            // Day0Breakage
            $this->Day0Breakage->LinkCustomAttributes = "";
            $this->Day0Breakage->HrefValue = "";

            // Day0Attempts
            $this->Day0Attempts->LinkCustomAttributes = "";
            $this->Day0Attempts->HrefValue = "";

            // Day0SPZMorpho
            $this->Day0SPZMorpho->LinkCustomAttributes = "";
            $this->Day0SPZMorpho->HrefValue = "";

            // Day0SPZLocation
            $this->Day0SPZLocation->LinkCustomAttributes = "";
            $this->Day0SPZLocation->HrefValue = "";

            // Day0SpOrgin
            $this->Day0SpOrgin->LinkCustomAttributes = "";
            $this->Day0SpOrgin->HrefValue = "";

            // Day5Cryoptop
            $this->Day5Cryoptop->LinkCustomAttributes = "";
            $this->Day5Cryoptop->HrefValue = "";

            // Day1Sperm
            $this->Day1Sperm->LinkCustomAttributes = "";
            $this->Day1Sperm->HrefValue = "";

            // Day1PN
            $this->Day1PN->LinkCustomAttributes = "";
            $this->Day1PN->HrefValue = "";

            // Day1PB
            $this->Day1PB->LinkCustomAttributes = "";
            $this->Day1PB->HrefValue = "";

            // Day1Pronucleus
            $this->Day1Pronucleus->LinkCustomAttributes = "";
            $this->Day1Pronucleus->HrefValue = "";

            // Day1Nucleolus
            $this->Day1Nucleolus->LinkCustomAttributes = "";
            $this->Day1Nucleolus->HrefValue = "";

            // Day1Halo
            $this->Day1Halo->LinkCustomAttributes = "";
            $this->Day1Halo->HrefValue = "";

            // Day2SiNo
            $this->Day2SiNo->LinkCustomAttributes = "";
            $this->Day2SiNo->HrefValue = "";

            // Day2CellNo
            $this->Day2CellNo->LinkCustomAttributes = "";
            $this->Day2CellNo->HrefValue = "";

            // Day2Frag
            $this->Day2Frag->LinkCustomAttributes = "";
            $this->Day2Frag->HrefValue = "";

            // Day2Symmetry
            $this->Day2Symmetry->LinkCustomAttributes = "";
            $this->Day2Symmetry->HrefValue = "";

            // Day2Cryoptop
            $this->Day2Cryoptop->LinkCustomAttributes = "";
            $this->Day2Cryoptop->HrefValue = "";

            // Day2Grade
            $this->Day2Grade->LinkCustomAttributes = "";
            $this->Day2Grade->HrefValue = "";

            // Day2End
            $this->Day2End->LinkCustomAttributes = "";
            $this->Day2End->HrefValue = "";

            // Day3Sino
            $this->Day3Sino->LinkCustomAttributes = "";
            $this->Day3Sino->HrefValue = "";

            // Day3CellNo
            $this->Day3CellNo->LinkCustomAttributes = "";
            $this->Day3CellNo->HrefValue = "";

            // Day3Frag
            $this->Day3Frag->LinkCustomAttributes = "";
            $this->Day3Frag->HrefValue = "";

            // Day3Symmetry
            $this->Day3Symmetry->LinkCustomAttributes = "";
            $this->Day3Symmetry->HrefValue = "";

            // Day3ZP
            $this->Day3ZP->LinkCustomAttributes = "";
            $this->Day3ZP->HrefValue = "";

            // Day3Vacoules
            $this->Day3Vacoules->LinkCustomAttributes = "";
            $this->Day3Vacoules->HrefValue = "";

            // Day3Grade
            $this->Day3Grade->LinkCustomAttributes = "";
            $this->Day3Grade->HrefValue = "";

            // Day3Cryoptop
            $this->Day3Cryoptop->LinkCustomAttributes = "";
            $this->Day3Cryoptop->HrefValue = "";

            // Day3End
            $this->Day3End->LinkCustomAttributes = "";
            $this->Day3End->HrefValue = "";

            // Day4SiNo
            $this->Day4SiNo->LinkCustomAttributes = "";
            $this->Day4SiNo->HrefValue = "";

            // Day4CellNo
            $this->Day4CellNo->LinkCustomAttributes = "";
            $this->Day4CellNo->HrefValue = "";

            // Day4Frag
            $this->Day4Frag->LinkCustomAttributes = "";
            $this->Day4Frag->HrefValue = "";

            // Day4Symmetry
            $this->Day4Symmetry->LinkCustomAttributes = "";
            $this->Day4Symmetry->HrefValue = "";

            // Day4Grade
            $this->Day4Grade->LinkCustomAttributes = "";
            $this->Day4Grade->HrefValue = "";

            // Day4Cryoptop
            $this->Day4Cryoptop->LinkCustomAttributes = "";
            $this->Day4Cryoptop->HrefValue = "";

            // Day4End
            $this->Day4End->LinkCustomAttributes = "";
            $this->Day4End->HrefValue = "";

            // Day5CellNo
            $this->Day5CellNo->LinkCustomAttributes = "";
            $this->Day5CellNo->HrefValue = "";

            // Day5ICM
            $this->Day5ICM->LinkCustomAttributes = "";
            $this->Day5ICM->HrefValue = "";

            // Day5TE
            $this->Day5TE->LinkCustomAttributes = "";
            $this->Day5TE->HrefValue = "";

            // Day5Observation
            $this->Day5Observation->LinkCustomAttributes = "";
            $this->Day5Observation->HrefValue = "";

            // Day5Collapsed
            $this->Day5Collapsed->LinkCustomAttributes = "";
            $this->Day5Collapsed->HrefValue = "";

            // Day5Vacoulles
            $this->Day5Vacoulles->LinkCustomAttributes = "";
            $this->Day5Vacoulles->HrefValue = "";

            // Day5Grade
            $this->Day5Grade->LinkCustomAttributes = "";
            $this->Day5Grade->HrefValue = "";

            // Day6CellNo
            $this->Day6CellNo->LinkCustomAttributes = "";
            $this->Day6CellNo->HrefValue = "";

            // Day6ICM
            $this->Day6ICM->LinkCustomAttributes = "";
            $this->Day6ICM->HrefValue = "";

            // Day6TE
            $this->Day6TE->LinkCustomAttributes = "";
            $this->Day6TE->HrefValue = "";

            // Day6Observation
            $this->Day6Observation->LinkCustomAttributes = "";
            $this->Day6Observation->HrefValue = "";

            // Day6Collapsed
            $this->Day6Collapsed->LinkCustomAttributes = "";
            $this->Day6Collapsed->HrefValue = "";

            // Day6Vacoulles
            $this->Day6Vacoulles->LinkCustomAttributes = "";
            $this->Day6Vacoulles->HrefValue = "";

            // Day6Grade
            $this->Day6Grade->LinkCustomAttributes = "";
            $this->Day6Grade->HrefValue = "";

            // Day6Cryoptop
            $this->Day6Cryoptop->LinkCustomAttributes = "";
            $this->Day6Cryoptop->HrefValue = "";

            // EndSiNo
            $this->EndSiNo->LinkCustomAttributes = "";
            $this->EndSiNo->HrefValue = "";

            // EndingDay
            $this->EndingDay->LinkCustomAttributes = "";
            $this->EndingDay->HrefValue = "";

            // EndingCellStage
            $this->EndingCellStage->LinkCustomAttributes = "";
            $this->EndingCellStage->HrefValue = "";

            // EndingGrade
            $this->EndingGrade->LinkCustomAttributes = "";
            $this->EndingGrade->HrefValue = "";

            // EndingState
            $this->EndingState->LinkCustomAttributes = "";
            $this->EndingState->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // DidNO
            $this->DidNO->LinkCustomAttributes = "";
            $this->DidNO->HrefValue = "";

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->LinkCustomAttributes = "";
            $this->ICSiIVFDateTime->HrefValue = "";

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->LinkCustomAttributes = "";
            $this->PrimaryEmbrologist->HrefValue = "";

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->LinkCustomAttributes = "";
            $this->SecondaryEmbrologist->HrefValue = "";

            // Incubator
            $this->Incubator->LinkCustomAttributes = "";
            $this->Incubator->HrefValue = "";

            // location
            $this->location->LinkCustomAttributes = "";
            $this->location->HrefValue = "";

            // OocyteNo
            $this->OocyteNo->LinkCustomAttributes = "";
            $this->OocyteNo->HrefValue = "";

            // Stage
            $this->Stage->LinkCustomAttributes = "";
            $this->Stage->HrefValue = "";

            // Remarks
            $this->Remarks->LinkCustomAttributes = "";
            $this->Remarks->HrefValue = "";

            // vitrificationDate
            $this->vitrificationDate->LinkCustomAttributes = "";
            $this->vitrificationDate->HrefValue = "";

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriPrimaryEmbryologist->HrefValue = "";

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->vitriSecondaryEmbryologist->HrefValue = "";

            // vitriEmbryoNo
            $this->vitriEmbryoNo->LinkCustomAttributes = "";
            $this->vitriEmbryoNo->HrefValue = "";

            // thawReFrozen
            $this->thawReFrozen->LinkCustomAttributes = "";
            $this->thawReFrozen->HrefValue = "";

            // vitriFertilisationDate
            $this->vitriFertilisationDate->LinkCustomAttributes = "";
            $this->vitriFertilisationDate->HrefValue = "";

            // vitriDay
            $this->vitriDay->LinkCustomAttributes = "";
            $this->vitriDay->HrefValue = "";

            // vitriStage
            $this->vitriStage->LinkCustomAttributes = "";
            $this->vitriStage->HrefValue = "";

            // vitriGrade
            $this->vitriGrade->LinkCustomAttributes = "";
            $this->vitriGrade->HrefValue = "";

            // vitriIncubator
            $this->vitriIncubator->LinkCustomAttributes = "";
            $this->vitriIncubator->HrefValue = "";

            // vitriTank
            $this->vitriTank->LinkCustomAttributes = "";
            $this->vitriTank->HrefValue = "";

            // vitriCanister
            $this->vitriCanister->LinkCustomAttributes = "";
            $this->vitriCanister->HrefValue = "";

            // vitriGobiet
            $this->vitriGobiet->LinkCustomAttributes = "";
            $this->vitriGobiet->HrefValue = "";

            // vitriViscotube
            $this->vitriViscotube->LinkCustomAttributes = "";
            $this->vitriViscotube->HrefValue = "";

            // vitriCryolockNo
            $this->vitriCryolockNo->LinkCustomAttributes = "";
            $this->vitriCryolockNo->HrefValue = "";

            // vitriCryolockColour
            $this->vitriCryolockColour->LinkCustomAttributes = "";
            $this->vitriCryolockColour->HrefValue = "";

            // thawDate
            $this->thawDate->LinkCustomAttributes = "";
            $this->thawDate->HrefValue = "";

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->LinkCustomAttributes = "";
            $this->thawPrimaryEmbryologist->HrefValue = "";

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->LinkCustomAttributes = "";
            $this->thawSecondaryEmbryologist->HrefValue = "";

            // thawET
            $this->thawET->LinkCustomAttributes = "";
            $this->thawET->HrefValue = "";

            // thawAbserve
            $this->thawAbserve->LinkCustomAttributes = "";
            $this->thawAbserve->HrefValue = "";

            // thawDiscard
            $this->thawDiscard->LinkCustomAttributes = "";
            $this->thawDiscard->HrefValue = "";

            // ETCatheter
            $this->ETCatheter->LinkCustomAttributes = "";
            $this->ETCatheter->HrefValue = "";

            // ETDifficulty
            $this->ETDifficulty->LinkCustomAttributes = "";
            $this->ETDifficulty->HrefValue = "";

            // ETEasy
            $this->ETEasy->LinkCustomAttributes = "";
            $this->ETEasy->HrefValue = "";

            // ETComments
            $this->ETComments->LinkCustomAttributes = "";
            $this->ETComments->HrefValue = "";

            // ETDoctor
            $this->ETDoctor->LinkCustomAttributes = "";
            $this->ETDoctor->HrefValue = "";

            // ETEmbryologist
            $this->ETEmbryologist->LinkCustomAttributes = "";
            $this->ETEmbryologist->HrefValue = "";

            // ETDate
            $this->ETDate->LinkCustomAttributes = "";
            $this->ETDate->HrefValue = "";

            // Day1End
            $this->Day1End->LinkCustomAttributes = "";
            $this->Day1End->HrefValue = "";
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
        if ($this->SpermOrigin->Required) {
            if (!$this->SpermOrigin->IsDetailKey && EmptyValue($this->SpermOrigin->FormValue)) {
                $this->SpermOrigin->addErrorMessage(str_replace("%s", $this->SpermOrigin->caption(), $this->SpermOrigin->RequiredErrorMessage));
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
        if ($this->Day0sino->Required) {
            if (!$this->Day0sino->IsDetailKey && EmptyValue($this->Day0sino->FormValue)) {
                $this->Day0sino->addErrorMessage(str_replace("%s", $this->Day0sino->caption(), $this->Day0sino->RequiredErrorMessage));
            }
        }
        if ($this->Day0OocyteStage->Required) {
            if (!$this->Day0OocyteStage->IsDetailKey && EmptyValue($this->Day0OocyteStage->FormValue)) {
                $this->Day0OocyteStage->addErrorMessage(str_replace("%s", $this->Day0OocyteStage->caption(), $this->Day0OocyteStage->RequiredErrorMessage));
            }
        }
        if ($this->Day0PolarBodyPosition->Required) {
            if (!$this->Day0PolarBodyPosition->IsDetailKey && EmptyValue($this->Day0PolarBodyPosition->FormValue)) {
                $this->Day0PolarBodyPosition->addErrorMessage(str_replace("%s", $this->Day0PolarBodyPosition->caption(), $this->Day0PolarBodyPosition->RequiredErrorMessage));
            }
        }
        if ($this->Day0Breakage->Required) {
            if (!$this->Day0Breakage->IsDetailKey && EmptyValue($this->Day0Breakage->FormValue)) {
                $this->Day0Breakage->addErrorMessage(str_replace("%s", $this->Day0Breakage->caption(), $this->Day0Breakage->RequiredErrorMessage));
            }
        }
        if ($this->Day0Attempts->Required) {
            if (!$this->Day0Attempts->IsDetailKey && EmptyValue($this->Day0Attempts->FormValue)) {
                $this->Day0Attempts->addErrorMessage(str_replace("%s", $this->Day0Attempts->caption(), $this->Day0Attempts->RequiredErrorMessage));
            }
        }
        if ($this->Day0SPZMorpho->Required) {
            if (!$this->Day0SPZMorpho->IsDetailKey && EmptyValue($this->Day0SPZMorpho->FormValue)) {
                $this->Day0SPZMorpho->addErrorMessage(str_replace("%s", $this->Day0SPZMorpho->caption(), $this->Day0SPZMorpho->RequiredErrorMessage));
            }
        }
        if ($this->Day0SPZLocation->Required) {
            if (!$this->Day0SPZLocation->IsDetailKey && EmptyValue($this->Day0SPZLocation->FormValue)) {
                $this->Day0SPZLocation->addErrorMessage(str_replace("%s", $this->Day0SPZLocation->caption(), $this->Day0SPZLocation->RequiredErrorMessage));
            }
        }
        if ($this->Day0SpOrgin->Required) {
            if (!$this->Day0SpOrgin->IsDetailKey && EmptyValue($this->Day0SpOrgin->FormValue)) {
                $this->Day0SpOrgin->addErrorMessage(str_replace("%s", $this->Day0SpOrgin->caption(), $this->Day0SpOrgin->RequiredErrorMessage));
            }
        }
        if ($this->Day5Cryoptop->Required) {
            if (!$this->Day5Cryoptop->IsDetailKey && EmptyValue($this->Day5Cryoptop->FormValue)) {
                $this->Day5Cryoptop->addErrorMessage(str_replace("%s", $this->Day5Cryoptop->caption(), $this->Day5Cryoptop->RequiredErrorMessage));
            }
        }
        if ($this->Day1Sperm->Required) {
            if (!$this->Day1Sperm->IsDetailKey && EmptyValue($this->Day1Sperm->FormValue)) {
                $this->Day1Sperm->addErrorMessage(str_replace("%s", $this->Day1Sperm->caption(), $this->Day1Sperm->RequiredErrorMessage));
            }
        }
        if ($this->Day1PN->Required) {
            if (!$this->Day1PN->IsDetailKey && EmptyValue($this->Day1PN->FormValue)) {
                $this->Day1PN->addErrorMessage(str_replace("%s", $this->Day1PN->caption(), $this->Day1PN->RequiredErrorMessage));
            }
        }
        if ($this->Day1PB->Required) {
            if (!$this->Day1PB->IsDetailKey && EmptyValue($this->Day1PB->FormValue)) {
                $this->Day1PB->addErrorMessage(str_replace("%s", $this->Day1PB->caption(), $this->Day1PB->RequiredErrorMessage));
            }
        }
        if ($this->Day1Pronucleus->Required) {
            if (!$this->Day1Pronucleus->IsDetailKey && EmptyValue($this->Day1Pronucleus->FormValue)) {
                $this->Day1Pronucleus->addErrorMessage(str_replace("%s", $this->Day1Pronucleus->caption(), $this->Day1Pronucleus->RequiredErrorMessage));
            }
        }
        if ($this->Day1Nucleolus->Required) {
            if (!$this->Day1Nucleolus->IsDetailKey && EmptyValue($this->Day1Nucleolus->FormValue)) {
                $this->Day1Nucleolus->addErrorMessage(str_replace("%s", $this->Day1Nucleolus->caption(), $this->Day1Nucleolus->RequiredErrorMessage));
            }
        }
        if ($this->Day1Halo->Required) {
            if (!$this->Day1Halo->IsDetailKey && EmptyValue($this->Day1Halo->FormValue)) {
                $this->Day1Halo->addErrorMessage(str_replace("%s", $this->Day1Halo->caption(), $this->Day1Halo->RequiredErrorMessage));
            }
        }
        if ($this->Day2SiNo->Required) {
            if (!$this->Day2SiNo->IsDetailKey && EmptyValue($this->Day2SiNo->FormValue)) {
                $this->Day2SiNo->addErrorMessage(str_replace("%s", $this->Day2SiNo->caption(), $this->Day2SiNo->RequiredErrorMessage));
            }
        }
        if ($this->Day2CellNo->Required) {
            if (!$this->Day2CellNo->IsDetailKey && EmptyValue($this->Day2CellNo->FormValue)) {
                $this->Day2CellNo->addErrorMessage(str_replace("%s", $this->Day2CellNo->caption(), $this->Day2CellNo->RequiredErrorMessage));
            }
        }
        if ($this->Day2Frag->Required) {
            if (!$this->Day2Frag->IsDetailKey && EmptyValue($this->Day2Frag->FormValue)) {
                $this->Day2Frag->addErrorMessage(str_replace("%s", $this->Day2Frag->caption(), $this->Day2Frag->RequiredErrorMessage));
            }
        }
        if ($this->Day2Symmetry->Required) {
            if (!$this->Day2Symmetry->IsDetailKey && EmptyValue($this->Day2Symmetry->FormValue)) {
                $this->Day2Symmetry->addErrorMessage(str_replace("%s", $this->Day2Symmetry->caption(), $this->Day2Symmetry->RequiredErrorMessage));
            }
        }
        if ($this->Day2Cryoptop->Required) {
            if (!$this->Day2Cryoptop->IsDetailKey && EmptyValue($this->Day2Cryoptop->FormValue)) {
                $this->Day2Cryoptop->addErrorMessage(str_replace("%s", $this->Day2Cryoptop->caption(), $this->Day2Cryoptop->RequiredErrorMessage));
            }
        }
        if ($this->Day2Grade->Required) {
            if (!$this->Day2Grade->IsDetailKey && EmptyValue($this->Day2Grade->FormValue)) {
                $this->Day2Grade->addErrorMessage(str_replace("%s", $this->Day2Grade->caption(), $this->Day2Grade->RequiredErrorMessage));
            }
        }
        if ($this->Day2End->Required) {
            if (!$this->Day2End->IsDetailKey && EmptyValue($this->Day2End->FormValue)) {
                $this->Day2End->addErrorMessage(str_replace("%s", $this->Day2End->caption(), $this->Day2End->RequiredErrorMessage));
            }
        }
        if ($this->Day3Sino->Required) {
            if (!$this->Day3Sino->IsDetailKey && EmptyValue($this->Day3Sino->FormValue)) {
                $this->Day3Sino->addErrorMessage(str_replace("%s", $this->Day3Sino->caption(), $this->Day3Sino->RequiredErrorMessage));
            }
        }
        if ($this->Day3CellNo->Required) {
            if (!$this->Day3CellNo->IsDetailKey && EmptyValue($this->Day3CellNo->FormValue)) {
                $this->Day3CellNo->addErrorMessage(str_replace("%s", $this->Day3CellNo->caption(), $this->Day3CellNo->RequiredErrorMessage));
            }
        }
        if ($this->Day3Frag->Required) {
            if (!$this->Day3Frag->IsDetailKey && EmptyValue($this->Day3Frag->FormValue)) {
                $this->Day3Frag->addErrorMessage(str_replace("%s", $this->Day3Frag->caption(), $this->Day3Frag->RequiredErrorMessage));
            }
        }
        if ($this->Day3Symmetry->Required) {
            if (!$this->Day3Symmetry->IsDetailKey && EmptyValue($this->Day3Symmetry->FormValue)) {
                $this->Day3Symmetry->addErrorMessage(str_replace("%s", $this->Day3Symmetry->caption(), $this->Day3Symmetry->RequiredErrorMessage));
            }
        }
        if ($this->Day3ZP->Required) {
            if (!$this->Day3ZP->IsDetailKey && EmptyValue($this->Day3ZP->FormValue)) {
                $this->Day3ZP->addErrorMessage(str_replace("%s", $this->Day3ZP->caption(), $this->Day3ZP->RequiredErrorMessage));
            }
        }
        if ($this->Day3Vacoules->Required) {
            if (!$this->Day3Vacoules->IsDetailKey && EmptyValue($this->Day3Vacoules->FormValue)) {
                $this->Day3Vacoules->addErrorMessage(str_replace("%s", $this->Day3Vacoules->caption(), $this->Day3Vacoules->RequiredErrorMessage));
            }
        }
        if ($this->Day3Grade->Required) {
            if (!$this->Day3Grade->IsDetailKey && EmptyValue($this->Day3Grade->FormValue)) {
                $this->Day3Grade->addErrorMessage(str_replace("%s", $this->Day3Grade->caption(), $this->Day3Grade->RequiredErrorMessage));
            }
        }
        if ($this->Day3Cryoptop->Required) {
            if (!$this->Day3Cryoptop->IsDetailKey && EmptyValue($this->Day3Cryoptop->FormValue)) {
                $this->Day3Cryoptop->addErrorMessage(str_replace("%s", $this->Day3Cryoptop->caption(), $this->Day3Cryoptop->RequiredErrorMessage));
            }
        }
        if ($this->Day3End->Required) {
            if (!$this->Day3End->IsDetailKey && EmptyValue($this->Day3End->FormValue)) {
                $this->Day3End->addErrorMessage(str_replace("%s", $this->Day3End->caption(), $this->Day3End->RequiredErrorMessage));
            }
        }
        if ($this->Day4SiNo->Required) {
            if (!$this->Day4SiNo->IsDetailKey && EmptyValue($this->Day4SiNo->FormValue)) {
                $this->Day4SiNo->addErrorMessage(str_replace("%s", $this->Day4SiNo->caption(), $this->Day4SiNo->RequiredErrorMessage));
            }
        }
        if ($this->Day4CellNo->Required) {
            if (!$this->Day4CellNo->IsDetailKey && EmptyValue($this->Day4CellNo->FormValue)) {
                $this->Day4CellNo->addErrorMessage(str_replace("%s", $this->Day4CellNo->caption(), $this->Day4CellNo->RequiredErrorMessage));
            }
        }
        if ($this->Day4Frag->Required) {
            if (!$this->Day4Frag->IsDetailKey && EmptyValue($this->Day4Frag->FormValue)) {
                $this->Day4Frag->addErrorMessage(str_replace("%s", $this->Day4Frag->caption(), $this->Day4Frag->RequiredErrorMessage));
            }
        }
        if ($this->Day4Symmetry->Required) {
            if (!$this->Day4Symmetry->IsDetailKey && EmptyValue($this->Day4Symmetry->FormValue)) {
                $this->Day4Symmetry->addErrorMessage(str_replace("%s", $this->Day4Symmetry->caption(), $this->Day4Symmetry->RequiredErrorMessage));
            }
        }
        if ($this->Day4Grade->Required) {
            if (!$this->Day4Grade->IsDetailKey && EmptyValue($this->Day4Grade->FormValue)) {
                $this->Day4Grade->addErrorMessage(str_replace("%s", $this->Day4Grade->caption(), $this->Day4Grade->RequiredErrorMessage));
            }
        }
        if ($this->Day4Cryoptop->Required) {
            if (!$this->Day4Cryoptop->IsDetailKey && EmptyValue($this->Day4Cryoptop->FormValue)) {
                $this->Day4Cryoptop->addErrorMessage(str_replace("%s", $this->Day4Cryoptop->caption(), $this->Day4Cryoptop->RequiredErrorMessage));
            }
        }
        if ($this->Day4End->Required) {
            if (!$this->Day4End->IsDetailKey && EmptyValue($this->Day4End->FormValue)) {
                $this->Day4End->addErrorMessage(str_replace("%s", $this->Day4End->caption(), $this->Day4End->RequiredErrorMessage));
            }
        }
        if ($this->Day5CellNo->Required) {
            if (!$this->Day5CellNo->IsDetailKey && EmptyValue($this->Day5CellNo->FormValue)) {
                $this->Day5CellNo->addErrorMessage(str_replace("%s", $this->Day5CellNo->caption(), $this->Day5CellNo->RequiredErrorMessage));
            }
        }
        if ($this->Day5ICM->Required) {
            if (!$this->Day5ICM->IsDetailKey && EmptyValue($this->Day5ICM->FormValue)) {
                $this->Day5ICM->addErrorMessage(str_replace("%s", $this->Day5ICM->caption(), $this->Day5ICM->RequiredErrorMessage));
            }
        }
        if ($this->Day5TE->Required) {
            if (!$this->Day5TE->IsDetailKey && EmptyValue($this->Day5TE->FormValue)) {
                $this->Day5TE->addErrorMessage(str_replace("%s", $this->Day5TE->caption(), $this->Day5TE->RequiredErrorMessage));
            }
        }
        if ($this->Day5Observation->Required) {
            if (!$this->Day5Observation->IsDetailKey && EmptyValue($this->Day5Observation->FormValue)) {
                $this->Day5Observation->addErrorMessage(str_replace("%s", $this->Day5Observation->caption(), $this->Day5Observation->RequiredErrorMessage));
            }
        }
        if ($this->Day5Collapsed->Required) {
            if (!$this->Day5Collapsed->IsDetailKey && EmptyValue($this->Day5Collapsed->FormValue)) {
                $this->Day5Collapsed->addErrorMessage(str_replace("%s", $this->Day5Collapsed->caption(), $this->Day5Collapsed->RequiredErrorMessage));
            }
        }
        if ($this->Day5Vacoulles->Required) {
            if (!$this->Day5Vacoulles->IsDetailKey && EmptyValue($this->Day5Vacoulles->FormValue)) {
                $this->Day5Vacoulles->addErrorMessage(str_replace("%s", $this->Day5Vacoulles->caption(), $this->Day5Vacoulles->RequiredErrorMessage));
            }
        }
        if ($this->Day5Grade->Required) {
            if (!$this->Day5Grade->IsDetailKey && EmptyValue($this->Day5Grade->FormValue)) {
                $this->Day5Grade->addErrorMessage(str_replace("%s", $this->Day5Grade->caption(), $this->Day5Grade->RequiredErrorMessage));
            }
        }
        if ($this->Day6CellNo->Required) {
            if (!$this->Day6CellNo->IsDetailKey && EmptyValue($this->Day6CellNo->FormValue)) {
                $this->Day6CellNo->addErrorMessage(str_replace("%s", $this->Day6CellNo->caption(), $this->Day6CellNo->RequiredErrorMessage));
            }
        }
        if ($this->Day6ICM->Required) {
            if (!$this->Day6ICM->IsDetailKey && EmptyValue($this->Day6ICM->FormValue)) {
                $this->Day6ICM->addErrorMessage(str_replace("%s", $this->Day6ICM->caption(), $this->Day6ICM->RequiredErrorMessage));
            }
        }
        if ($this->Day6TE->Required) {
            if (!$this->Day6TE->IsDetailKey && EmptyValue($this->Day6TE->FormValue)) {
                $this->Day6TE->addErrorMessage(str_replace("%s", $this->Day6TE->caption(), $this->Day6TE->RequiredErrorMessage));
            }
        }
        if ($this->Day6Observation->Required) {
            if (!$this->Day6Observation->IsDetailKey && EmptyValue($this->Day6Observation->FormValue)) {
                $this->Day6Observation->addErrorMessage(str_replace("%s", $this->Day6Observation->caption(), $this->Day6Observation->RequiredErrorMessage));
            }
        }
        if ($this->Day6Collapsed->Required) {
            if (!$this->Day6Collapsed->IsDetailKey && EmptyValue($this->Day6Collapsed->FormValue)) {
                $this->Day6Collapsed->addErrorMessage(str_replace("%s", $this->Day6Collapsed->caption(), $this->Day6Collapsed->RequiredErrorMessage));
            }
        }
        if ($this->Day6Vacoulles->Required) {
            if (!$this->Day6Vacoulles->IsDetailKey && EmptyValue($this->Day6Vacoulles->FormValue)) {
                $this->Day6Vacoulles->addErrorMessage(str_replace("%s", $this->Day6Vacoulles->caption(), $this->Day6Vacoulles->RequiredErrorMessage));
            }
        }
        if ($this->Day6Grade->Required) {
            if (!$this->Day6Grade->IsDetailKey && EmptyValue($this->Day6Grade->FormValue)) {
                $this->Day6Grade->addErrorMessage(str_replace("%s", $this->Day6Grade->caption(), $this->Day6Grade->RequiredErrorMessage));
            }
        }
        if ($this->Day6Cryoptop->Required) {
            if (!$this->Day6Cryoptop->IsDetailKey && EmptyValue($this->Day6Cryoptop->FormValue)) {
                $this->Day6Cryoptop->addErrorMessage(str_replace("%s", $this->Day6Cryoptop->caption(), $this->Day6Cryoptop->RequiredErrorMessage));
            }
        }
        if ($this->EndSiNo->Required) {
            if (!$this->EndSiNo->IsDetailKey && EmptyValue($this->EndSiNo->FormValue)) {
                $this->EndSiNo->addErrorMessage(str_replace("%s", $this->EndSiNo->caption(), $this->EndSiNo->RequiredErrorMessage));
            }
        }
        if ($this->EndingDay->Required) {
            if (!$this->EndingDay->IsDetailKey && EmptyValue($this->EndingDay->FormValue)) {
                $this->EndingDay->addErrorMessage(str_replace("%s", $this->EndingDay->caption(), $this->EndingDay->RequiredErrorMessage));
            }
        }
        if ($this->EndingCellStage->Required) {
            if (!$this->EndingCellStage->IsDetailKey && EmptyValue($this->EndingCellStage->FormValue)) {
                $this->EndingCellStage->addErrorMessage(str_replace("%s", $this->EndingCellStage->caption(), $this->EndingCellStage->RequiredErrorMessage));
            }
        }
        if ($this->EndingGrade->Required) {
            if (!$this->EndingGrade->IsDetailKey && EmptyValue($this->EndingGrade->FormValue)) {
                $this->EndingGrade->addErrorMessage(str_replace("%s", $this->EndingGrade->caption(), $this->EndingGrade->RequiredErrorMessage));
            }
        }
        if ($this->EndingState->Required) {
            if (!$this->EndingState->IsDetailKey && EmptyValue($this->EndingState->FormValue)) {
                $this->EndingState->addErrorMessage(str_replace("%s", $this->EndingState->caption(), $this->EndingState->RequiredErrorMessage));
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
        if ($this->DidNO->Required) {
            if (!$this->DidNO->IsDetailKey && EmptyValue($this->DidNO->FormValue)) {
                $this->DidNO->addErrorMessage(str_replace("%s", $this->DidNO->caption(), $this->DidNO->RequiredErrorMessage));
            }
        }
        if ($this->ICSiIVFDateTime->Required) {
            if (!$this->ICSiIVFDateTime->IsDetailKey && EmptyValue($this->ICSiIVFDateTime->FormValue)) {
                $this->ICSiIVFDateTime->addErrorMessage(str_replace("%s", $this->ICSiIVFDateTime->caption(), $this->ICSiIVFDateTime->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ICSiIVFDateTime->FormValue)) {
            $this->ICSiIVFDateTime->addErrorMessage($this->ICSiIVFDateTime->getErrorMessage(false));
        }
        if ($this->PrimaryEmbrologist->Required) {
            if (!$this->PrimaryEmbrologist->IsDetailKey && EmptyValue($this->PrimaryEmbrologist->FormValue)) {
                $this->PrimaryEmbrologist->addErrorMessage(str_replace("%s", $this->PrimaryEmbrologist->caption(), $this->PrimaryEmbrologist->RequiredErrorMessage));
            }
        }
        if ($this->SecondaryEmbrologist->Required) {
            if (!$this->SecondaryEmbrologist->IsDetailKey && EmptyValue($this->SecondaryEmbrologist->FormValue)) {
                $this->SecondaryEmbrologist->addErrorMessage(str_replace("%s", $this->SecondaryEmbrologist->caption(), $this->SecondaryEmbrologist->RequiredErrorMessage));
            }
        }
        if ($this->Incubator->Required) {
            if (!$this->Incubator->IsDetailKey && EmptyValue($this->Incubator->FormValue)) {
                $this->Incubator->addErrorMessage(str_replace("%s", $this->Incubator->caption(), $this->Incubator->RequiredErrorMessage));
            }
        }
        if ($this->location->Required) {
            if (!$this->location->IsDetailKey && EmptyValue($this->location->FormValue)) {
                $this->location->addErrorMessage(str_replace("%s", $this->location->caption(), $this->location->RequiredErrorMessage));
            }
        }
        if ($this->OocyteNo->Required) {
            if (!$this->OocyteNo->IsDetailKey && EmptyValue($this->OocyteNo->FormValue)) {
                $this->OocyteNo->addErrorMessage(str_replace("%s", $this->OocyteNo->caption(), $this->OocyteNo->RequiredErrorMessage));
            }
        }
        if ($this->Stage->Required) {
            if (!$this->Stage->IsDetailKey && EmptyValue($this->Stage->FormValue)) {
                $this->Stage->addErrorMessage(str_replace("%s", $this->Stage->caption(), $this->Stage->RequiredErrorMessage));
            }
        }
        if ($this->Remarks->Required) {
            if (!$this->Remarks->IsDetailKey && EmptyValue($this->Remarks->FormValue)) {
                $this->Remarks->addErrorMessage(str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
            }
        }
        if ($this->vitrificationDate->Required) {
            if (!$this->vitrificationDate->IsDetailKey && EmptyValue($this->vitrificationDate->FormValue)) {
                $this->vitrificationDate->addErrorMessage(str_replace("%s", $this->vitrificationDate->caption(), $this->vitrificationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->vitrificationDate->FormValue)) {
            $this->vitrificationDate->addErrorMessage($this->vitrificationDate->getErrorMessage(false));
        }
        if ($this->vitriPrimaryEmbryologist->Required) {
            if (!$this->vitriPrimaryEmbryologist->IsDetailKey && EmptyValue($this->vitriPrimaryEmbryologist->FormValue)) {
                $this->vitriPrimaryEmbryologist->addErrorMessage(str_replace("%s", $this->vitriPrimaryEmbryologist->caption(), $this->vitriPrimaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->vitriSecondaryEmbryologist->Required) {
            if (!$this->vitriSecondaryEmbryologist->IsDetailKey && EmptyValue($this->vitriSecondaryEmbryologist->FormValue)) {
                $this->vitriSecondaryEmbryologist->addErrorMessage(str_replace("%s", $this->vitriSecondaryEmbryologist->caption(), $this->vitriSecondaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->vitriEmbryoNo->Required) {
            if (!$this->vitriEmbryoNo->IsDetailKey && EmptyValue($this->vitriEmbryoNo->FormValue)) {
                $this->vitriEmbryoNo->addErrorMessage(str_replace("%s", $this->vitriEmbryoNo->caption(), $this->vitriEmbryoNo->RequiredErrorMessage));
            }
        }
        if ($this->thawReFrozen->Required) {
            if ($this->thawReFrozen->FormValue == "") {
                $this->thawReFrozen->addErrorMessage(str_replace("%s", $this->thawReFrozen->caption(), $this->thawReFrozen->RequiredErrorMessage));
            }
        }
        if ($this->vitriFertilisationDate->Required) {
            if (!$this->vitriFertilisationDate->IsDetailKey && EmptyValue($this->vitriFertilisationDate->FormValue)) {
                $this->vitriFertilisationDate->addErrorMessage(str_replace("%s", $this->vitriFertilisationDate->caption(), $this->vitriFertilisationDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->vitriFertilisationDate->FormValue)) {
            $this->vitriFertilisationDate->addErrorMessage($this->vitriFertilisationDate->getErrorMessage(false));
        }
        if ($this->vitriDay->Required) {
            if (!$this->vitriDay->IsDetailKey && EmptyValue($this->vitriDay->FormValue)) {
                $this->vitriDay->addErrorMessage(str_replace("%s", $this->vitriDay->caption(), $this->vitriDay->RequiredErrorMessage));
            }
        }
        if ($this->vitriStage->Required) {
            if (!$this->vitriStage->IsDetailKey && EmptyValue($this->vitriStage->FormValue)) {
                $this->vitriStage->addErrorMessage(str_replace("%s", $this->vitriStage->caption(), $this->vitriStage->RequiredErrorMessage));
            }
        }
        if ($this->vitriGrade->Required) {
            if (!$this->vitriGrade->IsDetailKey && EmptyValue($this->vitriGrade->FormValue)) {
                $this->vitriGrade->addErrorMessage(str_replace("%s", $this->vitriGrade->caption(), $this->vitriGrade->RequiredErrorMessage));
            }
        }
        if ($this->vitriIncubator->Required) {
            if (!$this->vitriIncubator->IsDetailKey && EmptyValue($this->vitriIncubator->FormValue)) {
                $this->vitriIncubator->addErrorMessage(str_replace("%s", $this->vitriIncubator->caption(), $this->vitriIncubator->RequiredErrorMessage));
            }
        }
        if ($this->vitriTank->Required) {
            if (!$this->vitriTank->IsDetailKey && EmptyValue($this->vitriTank->FormValue)) {
                $this->vitriTank->addErrorMessage(str_replace("%s", $this->vitriTank->caption(), $this->vitriTank->RequiredErrorMessage));
            }
        }
        if ($this->vitriCanister->Required) {
            if (!$this->vitriCanister->IsDetailKey && EmptyValue($this->vitriCanister->FormValue)) {
                $this->vitriCanister->addErrorMessage(str_replace("%s", $this->vitriCanister->caption(), $this->vitriCanister->RequiredErrorMessage));
            }
        }
        if ($this->vitriGobiet->Required) {
            if (!$this->vitriGobiet->IsDetailKey && EmptyValue($this->vitriGobiet->FormValue)) {
                $this->vitriGobiet->addErrorMessage(str_replace("%s", $this->vitriGobiet->caption(), $this->vitriGobiet->RequiredErrorMessage));
            }
        }
        if ($this->vitriViscotube->Required) {
            if (!$this->vitriViscotube->IsDetailKey && EmptyValue($this->vitriViscotube->FormValue)) {
                $this->vitriViscotube->addErrorMessage(str_replace("%s", $this->vitriViscotube->caption(), $this->vitriViscotube->RequiredErrorMessage));
            }
        }
        if ($this->vitriCryolockNo->Required) {
            if (!$this->vitriCryolockNo->IsDetailKey && EmptyValue($this->vitriCryolockNo->FormValue)) {
                $this->vitriCryolockNo->addErrorMessage(str_replace("%s", $this->vitriCryolockNo->caption(), $this->vitriCryolockNo->RequiredErrorMessage));
            }
        }
        if ($this->vitriCryolockColour->Required) {
            if (!$this->vitriCryolockColour->IsDetailKey && EmptyValue($this->vitriCryolockColour->FormValue)) {
                $this->vitriCryolockColour->addErrorMessage(str_replace("%s", $this->vitriCryolockColour->caption(), $this->vitriCryolockColour->RequiredErrorMessage));
            }
        }
        if ($this->thawDate->Required) {
            if (!$this->thawDate->IsDetailKey && EmptyValue($this->thawDate->FormValue)) {
                $this->thawDate->addErrorMessage(str_replace("%s", $this->thawDate->caption(), $this->thawDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->thawDate->FormValue)) {
            $this->thawDate->addErrorMessage($this->thawDate->getErrorMessage(false));
        }
        if ($this->thawPrimaryEmbryologist->Required) {
            if (!$this->thawPrimaryEmbryologist->IsDetailKey && EmptyValue($this->thawPrimaryEmbryologist->FormValue)) {
                $this->thawPrimaryEmbryologist->addErrorMessage(str_replace("%s", $this->thawPrimaryEmbryologist->caption(), $this->thawPrimaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->thawSecondaryEmbryologist->Required) {
            if (!$this->thawSecondaryEmbryologist->IsDetailKey && EmptyValue($this->thawSecondaryEmbryologist->FormValue)) {
                $this->thawSecondaryEmbryologist->addErrorMessage(str_replace("%s", $this->thawSecondaryEmbryologist->caption(), $this->thawSecondaryEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->thawET->Required) {
            if (!$this->thawET->IsDetailKey && EmptyValue($this->thawET->FormValue)) {
                $this->thawET->addErrorMessage(str_replace("%s", $this->thawET->caption(), $this->thawET->RequiredErrorMessage));
            }
        }
        if ($this->thawAbserve->Required) {
            if (!$this->thawAbserve->IsDetailKey && EmptyValue($this->thawAbserve->FormValue)) {
                $this->thawAbserve->addErrorMessage(str_replace("%s", $this->thawAbserve->caption(), $this->thawAbserve->RequiredErrorMessage));
            }
        }
        if ($this->thawDiscard->Required) {
            if (!$this->thawDiscard->IsDetailKey && EmptyValue($this->thawDiscard->FormValue)) {
                $this->thawDiscard->addErrorMessage(str_replace("%s", $this->thawDiscard->caption(), $this->thawDiscard->RequiredErrorMessage));
            }
        }
        if ($this->ETCatheter->Required) {
            if (!$this->ETCatheter->IsDetailKey && EmptyValue($this->ETCatheter->FormValue)) {
                $this->ETCatheter->addErrorMessage(str_replace("%s", $this->ETCatheter->caption(), $this->ETCatheter->RequiredErrorMessage));
            }
        }
        if ($this->ETDifficulty->Required) {
            if (!$this->ETDifficulty->IsDetailKey && EmptyValue($this->ETDifficulty->FormValue)) {
                $this->ETDifficulty->addErrorMessage(str_replace("%s", $this->ETDifficulty->caption(), $this->ETDifficulty->RequiredErrorMessage));
            }
        }
        if ($this->ETEasy->Required) {
            if ($this->ETEasy->FormValue == "") {
                $this->ETEasy->addErrorMessage(str_replace("%s", $this->ETEasy->caption(), $this->ETEasy->RequiredErrorMessage));
            }
        }
        if ($this->ETComments->Required) {
            if (!$this->ETComments->IsDetailKey && EmptyValue($this->ETComments->FormValue)) {
                $this->ETComments->addErrorMessage(str_replace("%s", $this->ETComments->caption(), $this->ETComments->RequiredErrorMessage));
            }
        }
        if ($this->ETDoctor->Required) {
            if (!$this->ETDoctor->IsDetailKey && EmptyValue($this->ETDoctor->FormValue)) {
                $this->ETDoctor->addErrorMessage(str_replace("%s", $this->ETDoctor->caption(), $this->ETDoctor->RequiredErrorMessage));
            }
        }
        if ($this->ETEmbryologist->Required) {
            if (!$this->ETEmbryologist->IsDetailKey && EmptyValue($this->ETEmbryologist->FormValue)) {
                $this->ETEmbryologist->addErrorMessage(str_replace("%s", $this->ETEmbryologist->caption(), $this->ETEmbryologist->RequiredErrorMessage));
            }
        }
        if ($this->ETDate->Required) {
            if (!$this->ETDate->IsDetailKey && EmptyValue($this->ETDate->FormValue)) {
                $this->ETDate->addErrorMessage(str_replace("%s", $this->ETDate->caption(), $this->ETDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ETDate->FormValue)) {
            $this->ETDate->addErrorMessage($this->ETDate->getErrorMessage(false));
        }
        if ($this->Day1End->Required) {
            if (!$this->Day1End->IsDetailKey && EmptyValue($this->Day1End->FormValue)) {
                $this->Day1End->addErrorMessage(str_replace("%s", $this->Day1End->caption(), $this->Day1End->RequiredErrorMessage));
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

        // RIDNo
        $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, 0, false);

        // Name
        $this->Name->setDbValueDef($rsnew, $this->Name->CurrentValue, null, false);

        // ARTCycle
        $this->ARTCycle->setDbValueDef($rsnew, $this->ARTCycle->CurrentValue, null, false);

        // SpermOrigin
        $this->SpermOrigin->setDbValueDef($rsnew, $this->SpermOrigin->CurrentValue, null, false);

        // InseminatinTechnique
        $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, false);

        // IndicationForART
        $this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, null, false);

        // Day0sino
        $this->Day0sino->setDbValueDef($rsnew, $this->Day0sino->CurrentValue, null, false);

        // Day0OocyteStage
        $this->Day0OocyteStage->setDbValueDef($rsnew, $this->Day0OocyteStage->CurrentValue, null, false);

        // Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->setDbValueDef($rsnew, $this->Day0PolarBodyPosition->CurrentValue, null, false);

        // Day0Breakage
        $this->Day0Breakage->setDbValueDef($rsnew, $this->Day0Breakage->CurrentValue, null, false);

        // Day0Attempts
        $this->Day0Attempts->setDbValueDef($rsnew, $this->Day0Attempts->CurrentValue, null, false);

        // Day0SPZMorpho
        $this->Day0SPZMorpho->setDbValueDef($rsnew, $this->Day0SPZMorpho->CurrentValue, null, false);

        // Day0SPZLocation
        $this->Day0SPZLocation->setDbValueDef($rsnew, $this->Day0SPZLocation->CurrentValue, null, false);

        // Day0SpOrgin
        $this->Day0SpOrgin->setDbValueDef($rsnew, $this->Day0SpOrgin->CurrentValue, null, false);

        // Day5Cryoptop
        $this->Day5Cryoptop->setDbValueDef($rsnew, $this->Day5Cryoptop->CurrentValue, null, false);

        // Day1Sperm
        $this->Day1Sperm->setDbValueDef($rsnew, $this->Day1Sperm->CurrentValue, null, false);

        // Day1PN
        $this->Day1PN->setDbValueDef($rsnew, $this->Day1PN->CurrentValue, null, false);

        // Day1PB
        $this->Day1PB->setDbValueDef($rsnew, $this->Day1PB->CurrentValue, null, false);

        // Day1Pronucleus
        $this->Day1Pronucleus->setDbValueDef($rsnew, $this->Day1Pronucleus->CurrentValue, null, false);

        // Day1Nucleolus
        $this->Day1Nucleolus->setDbValueDef($rsnew, $this->Day1Nucleolus->CurrentValue, null, false);

        // Day1Halo
        $this->Day1Halo->setDbValueDef($rsnew, $this->Day1Halo->CurrentValue, null, false);

        // Day2SiNo
        $this->Day2SiNo->setDbValueDef($rsnew, $this->Day2SiNo->CurrentValue, null, false);

        // Day2CellNo
        $this->Day2CellNo->setDbValueDef($rsnew, $this->Day2CellNo->CurrentValue, null, false);

        // Day2Frag
        $this->Day2Frag->setDbValueDef($rsnew, $this->Day2Frag->CurrentValue, null, false);

        // Day2Symmetry
        $this->Day2Symmetry->setDbValueDef($rsnew, $this->Day2Symmetry->CurrentValue, null, false);

        // Day2Cryoptop
        $this->Day2Cryoptop->setDbValueDef($rsnew, $this->Day2Cryoptop->CurrentValue, null, false);

        // Day2Grade
        $this->Day2Grade->setDbValueDef($rsnew, $this->Day2Grade->CurrentValue, null, false);

        // Day2End
        $this->Day2End->setDbValueDef($rsnew, $this->Day2End->CurrentValue, null, false);

        // Day3Sino
        $this->Day3Sino->setDbValueDef($rsnew, $this->Day3Sino->CurrentValue, null, false);

        // Day3CellNo
        $this->Day3CellNo->setDbValueDef($rsnew, $this->Day3CellNo->CurrentValue, null, false);

        // Day3Frag
        $this->Day3Frag->setDbValueDef($rsnew, $this->Day3Frag->CurrentValue, null, false);

        // Day3Symmetry
        $this->Day3Symmetry->setDbValueDef($rsnew, $this->Day3Symmetry->CurrentValue, null, false);

        // Day3ZP
        $this->Day3ZP->setDbValueDef($rsnew, $this->Day3ZP->CurrentValue, null, false);

        // Day3Vacoules
        $this->Day3Vacoules->setDbValueDef($rsnew, $this->Day3Vacoules->CurrentValue, null, false);

        // Day3Grade
        $this->Day3Grade->setDbValueDef($rsnew, $this->Day3Grade->CurrentValue, null, false);

        // Day3Cryoptop
        $this->Day3Cryoptop->setDbValueDef($rsnew, $this->Day3Cryoptop->CurrentValue, null, false);

        // Day3End
        $this->Day3End->setDbValueDef($rsnew, $this->Day3End->CurrentValue, null, false);

        // Day4SiNo
        $this->Day4SiNo->setDbValueDef($rsnew, $this->Day4SiNo->CurrentValue, null, false);

        // Day4CellNo
        $this->Day4CellNo->setDbValueDef($rsnew, $this->Day4CellNo->CurrentValue, null, false);

        // Day4Frag
        $this->Day4Frag->setDbValueDef($rsnew, $this->Day4Frag->CurrentValue, null, false);

        // Day4Symmetry
        $this->Day4Symmetry->setDbValueDef($rsnew, $this->Day4Symmetry->CurrentValue, null, false);

        // Day4Grade
        $this->Day4Grade->setDbValueDef($rsnew, $this->Day4Grade->CurrentValue, null, false);

        // Day4Cryoptop
        $this->Day4Cryoptop->setDbValueDef($rsnew, $this->Day4Cryoptop->CurrentValue, null, false);

        // Day4End
        $this->Day4End->setDbValueDef($rsnew, $this->Day4End->CurrentValue, null, false);

        // Day5CellNo
        $this->Day5CellNo->setDbValueDef($rsnew, $this->Day5CellNo->CurrentValue, null, false);

        // Day5ICM
        $this->Day5ICM->setDbValueDef($rsnew, $this->Day5ICM->CurrentValue, null, false);

        // Day5TE
        $this->Day5TE->setDbValueDef($rsnew, $this->Day5TE->CurrentValue, null, false);

        // Day5Observation
        $this->Day5Observation->setDbValueDef($rsnew, $this->Day5Observation->CurrentValue, null, false);

        // Day5Collapsed
        $this->Day5Collapsed->setDbValueDef($rsnew, $this->Day5Collapsed->CurrentValue, null, false);

        // Day5Vacoulles
        $this->Day5Vacoulles->setDbValueDef($rsnew, $this->Day5Vacoulles->CurrentValue, null, false);

        // Day5Grade
        $this->Day5Grade->setDbValueDef($rsnew, $this->Day5Grade->CurrentValue, null, false);

        // Day6CellNo
        $this->Day6CellNo->setDbValueDef($rsnew, $this->Day6CellNo->CurrentValue, null, false);

        // Day6ICM
        $this->Day6ICM->setDbValueDef($rsnew, $this->Day6ICM->CurrentValue, null, false);

        // Day6TE
        $this->Day6TE->setDbValueDef($rsnew, $this->Day6TE->CurrentValue, null, false);

        // Day6Observation
        $this->Day6Observation->setDbValueDef($rsnew, $this->Day6Observation->CurrentValue, null, false);

        // Day6Collapsed
        $this->Day6Collapsed->setDbValueDef($rsnew, $this->Day6Collapsed->CurrentValue, null, false);

        // Day6Vacoulles
        $this->Day6Vacoulles->setDbValueDef($rsnew, $this->Day6Vacoulles->CurrentValue, null, false);

        // Day6Grade
        $this->Day6Grade->setDbValueDef($rsnew, $this->Day6Grade->CurrentValue, null, false);

        // Day6Cryoptop
        $this->Day6Cryoptop->setDbValueDef($rsnew, $this->Day6Cryoptop->CurrentValue, null, false);

        // EndSiNo
        $this->EndSiNo->setDbValueDef($rsnew, $this->EndSiNo->CurrentValue, null, false);

        // EndingDay
        $this->EndingDay->setDbValueDef($rsnew, $this->EndingDay->CurrentValue, null, false);

        // EndingCellStage
        $this->EndingCellStage->setDbValueDef($rsnew, $this->EndingCellStage->CurrentValue, null, false);

        // EndingGrade
        $this->EndingGrade->setDbValueDef($rsnew, $this->EndingGrade->CurrentValue, null, false);

        // EndingState
        $this->EndingState->setDbValueDef($rsnew, $this->EndingState->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // DidNO
        $this->DidNO->setDbValueDef($rsnew, $this->DidNO->CurrentValue, null, false);

        // ICSiIVFDateTime
        $this->ICSiIVFDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0), null, false);

        // PrimaryEmbrologist
        $this->PrimaryEmbrologist->setDbValueDef($rsnew, $this->PrimaryEmbrologist->CurrentValue, null, false);

        // SecondaryEmbrologist
        $this->SecondaryEmbrologist->setDbValueDef($rsnew, $this->SecondaryEmbrologist->CurrentValue, null, false);

        // Incubator
        $this->Incubator->setDbValueDef($rsnew, $this->Incubator->CurrentValue, null, false);

        // location
        $this->location->setDbValueDef($rsnew, $this->location->CurrentValue, null, false);

        // OocyteNo
        $this->OocyteNo->setDbValueDef($rsnew, $this->OocyteNo->CurrentValue, null, false);

        // Stage
        $this->Stage->setDbValueDef($rsnew, $this->Stage->CurrentValue, null, false);

        // Remarks
        $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, false);

        // vitrificationDate
        $this->vitrificationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitrificationDate->CurrentValue, 0), null, false);

        // vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->setDbValueDef($rsnew, $this->vitriPrimaryEmbryologist->CurrentValue, null, false);

        // vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->setDbValueDef($rsnew, $this->vitriSecondaryEmbryologist->CurrentValue, null, false);

        // vitriEmbryoNo
        $this->vitriEmbryoNo->setDbValueDef($rsnew, $this->vitriEmbryoNo->CurrentValue, null, false);

        // thawReFrozen
        $this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, null, false);

        // vitriFertilisationDate
        $this->vitriFertilisationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0), null, false);

        // vitriDay
        $this->vitriDay->setDbValueDef($rsnew, $this->vitriDay->CurrentValue, null, false);

        // vitriStage
        $this->vitriStage->setDbValueDef($rsnew, $this->vitriStage->CurrentValue, null, false);

        // vitriGrade
        $this->vitriGrade->setDbValueDef($rsnew, $this->vitriGrade->CurrentValue, null, false);

        // vitriIncubator
        $this->vitriIncubator->setDbValueDef($rsnew, $this->vitriIncubator->CurrentValue, null, false);

        // vitriTank
        $this->vitriTank->setDbValueDef($rsnew, $this->vitriTank->CurrentValue, null, false);

        // vitriCanister
        $this->vitriCanister->setDbValueDef($rsnew, $this->vitriCanister->CurrentValue, null, false);

        // vitriGobiet
        $this->vitriGobiet->setDbValueDef($rsnew, $this->vitriGobiet->CurrentValue, null, false);

        // vitriViscotube
        $this->vitriViscotube->setDbValueDef($rsnew, $this->vitriViscotube->CurrentValue, null, false);

        // vitriCryolockNo
        $this->vitriCryolockNo->setDbValueDef($rsnew, $this->vitriCryolockNo->CurrentValue, null, false);

        // vitriCryolockColour
        $this->vitriCryolockColour->setDbValueDef($rsnew, $this->vitriCryolockColour->CurrentValue, null, false);

        // thawDate
        $this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), null, false);

        // thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, null, false);

        // thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, null, false);

        // thawET
        $this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, null, false);

        // thawAbserve
        $this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, null, false);

        // thawDiscard
        $this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, null, false);

        // ETCatheter
        $this->ETCatheter->setDbValueDef($rsnew, $this->ETCatheter->CurrentValue, null, false);

        // ETDifficulty
        $this->ETDifficulty->setDbValueDef($rsnew, $this->ETDifficulty->CurrentValue, null, false);

        // ETEasy
        $this->ETEasy->setDbValueDef($rsnew, $this->ETEasy->CurrentValue, null, false);

        // ETComments
        $this->ETComments->setDbValueDef($rsnew, $this->ETComments->CurrentValue, null, false);

        // ETDoctor
        $this->ETDoctor->setDbValueDef($rsnew, $this->ETDoctor->CurrentValue, null, false);

        // ETEmbryologist
        $this->ETEmbryologist->setDbValueDef($rsnew, $this->ETEmbryologist->CurrentValue, null, false);

        // ETDate
        $this->ETDate->setDbValueDef($rsnew, UnFormatDateTime($this->ETDate->CurrentValue, 0), null, false);

        // Day1End
        $this->Day1End->setDbValueDef($rsnew, $this->Day1End->CurrentValue, null, false);

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

    // Set up master/detail based on QueryString
    protected function setupMasterParms()
    {
        $validMaster = false;
        // Get the keys for master table
        if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                $validMaster = true;
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Get("fk_RIDNO", Get("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setQueryStringValue($parm);
                    $this->RIDNo->setQueryStringValue($masterTbl->RIDNO->QueryStringValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->QueryStringValue);
                    if (!is_numeric($masterTbl->RIDNO->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_Name", Get("Name"))) !== null) {
                    $masterTbl->Name->setQueryStringValue($parm);
                    $this->Name->setQueryStringValue($masterTbl->Name->QueryStringValue);
                    $this->Name->setSessionValue($this->Name->QueryStringValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_id", Get("TidNo"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->TidNo->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->TidNo->setSessionValue($this->TidNo->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ivf_oocytedenudation") {
                $validMaster = true;
                $masterTbl = Container("ivf_oocytedenudation");
                if (($parm = Get("fk_id", Get("DidNO"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->DidNO->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->DidNO->setSessionValue($this->DidNO->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        } elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== null) {
            $masterTblVar = $master;
            if ($masterTblVar == "") {
                    $validMaster = true;
                    $this->DbMasterFilter = "";
                    $this->DbDetailFilter = "";
            }
            if ($masterTblVar == "ivf_treatment_plan") {
                $validMaster = true;
                $masterTbl = Container("ivf_treatment_plan");
                if (($parm = Post("fk_RIDNO", Post("RIDNo"))) !== null) {
                    $masterTbl->RIDNO->setFormValue($parm);
                    $this->RIDNo->setFormValue($masterTbl->RIDNO->FormValue);
                    $this->RIDNo->setSessionValue($this->RIDNo->FormValue);
                    if (!is_numeric($masterTbl->RIDNO->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_Name", Post("Name"))) !== null) {
                    $masterTbl->Name->setFormValue($parm);
                    $this->Name->setFormValue($masterTbl->Name->FormValue);
                    $this->Name->setSessionValue($this->Name->FormValue);
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_id", Post("TidNo"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->TidNo->setFormValue($masterTbl->id->FormValue);
                    $this->TidNo->setSessionValue($this->TidNo->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
            if ($masterTblVar == "ivf_oocytedenudation") {
                $validMaster = true;
                $masterTbl = Container("ivf_oocytedenudation");
                if (($parm = Post("fk_id", Post("DidNO"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->DidNO->setFormValue($masterTbl->id->FormValue);
                    $this->DidNO->setSessionValue($this->DidNO->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
            }
        }
        if ($validMaster) {
            // Save current master table
            $this->setCurrentMasterTable($masterTblVar);

            // Reset start record counter (new master key)
            if (!$this->isAddOrEdit()) {
                $this->StartRecord = 1;
                $this->setStartRecordNumber($this->StartRecord);
            }

            // Clear previous master key from Session
            if ($masterTblVar != "ivf_treatment_plan") {
                if ($this->RIDNo->CurrentValue == "") {
                    $this->RIDNo->setSessionValue("");
                }
                if ($this->Name->CurrentValue == "") {
                    $this->Name->setSessionValue("");
                }
                if ($this->TidNo->CurrentValue == "") {
                    $this->TidNo->setSessionValue("");
                }
            }
            if ($masterTblVar != "ivf_oocytedenudation") {
                if ($this->DidNO->CurrentValue == "") {
                    $this->DidNO->setSessionValue("");
                }
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb()
    {
        global $Breadcrumb, $Language;
        $Breadcrumb = new Breadcrumb("index");
        $url = CurrentUrl();
        $Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("IvfEmbryologyChartList"), "", $this->TableVar, true);
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
                case "x_Day0PolarBodyPosition":
                    break;
                case "x_Day0Breakage":
                    break;
                case "x_Day0Attempts":
                    break;
                case "x_Day0SPZMorpho":
                    break;
                case "x_Day0SPZLocation":
                    break;
                case "x_Day0SpOrgin":
                    break;
                case "x_Day5Cryoptop":
                    break;
                case "x_Day1PN":
                    break;
                case "x_Day1PB":
                    break;
                case "x_Day1Pronucleus":
                    break;
                case "x_Day1Nucleolus":
                    break;
                case "x_Day1Halo":
                    break;
                case "x_Day2End":
                    break;
                case "x_Day3Frag":
                    break;
                case "x_Day3Symmetry":
                    break;
                case "x_Day3ZP":
                    break;
                case "x_Day3Vacoules":
                    break;
                case "x_Day3Grade":
                    break;
                case "x_Day3Cryoptop":
                    break;
                case "x_Day3End":
                    break;
                case "x_Day4Cryoptop":
                    break;
                case "x_Day4End":
                    break;
                case "x_Day5ICM":
                    break;
                case "x_Day5TE":
                    break;
                case "x_Day5Observation":
                    break;
                case "x_Day5Collapsed":
                    break;
                case "x_Day5Vacoulles":
                    break;
                case "x_Day5Grade":
                    break;
                case "x_Day6ICM":
                    break;
                case "x_Day6TE":
                    break;
                case "x_Day6Observation":
                    break;
                case "x_Day6Collapsed":
                    break;
                case "x_Day6Vacoulles":
                    break;
                case "x_Day6Grade":
                    break;
                case "x_EndingDay":
                    break;
                case "x_EndingGrade":
                    break;
                case "x_EndingState":
                    break;
                case "x_Stage":
                    break;
                case "x_thawReFrozen":
                    break;
                case "x_vitriDay":
                    break;
                case "x_vitriGrade":
                    break;
                case "x_thawET":
                    break;
                case "x_ETDifficulty":
                    break;
                case "x_ETEasy":
                    break;
                case "x_Day1End":
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
