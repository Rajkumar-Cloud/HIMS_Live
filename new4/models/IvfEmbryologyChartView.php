<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEmbryologyChartView extends IvfEmbryologyChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "view";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_embryology_chart';

    // Page object name
    public $PageObjName = "IvfEmbryologyChartView";

    // Rendering View
    public $RenderingView = false;

    // Page URLs
    public $AddUrl;
    public $EditUrl;
    public $CopyUrl;
    public $DeleteUrl;
    public $ViewUrl;
    public $ListUrl;

    // Export URLs
    public $ExportPrintUrl;
    public $ExportHtmlUrl;
    public $ExportExcelUrl;
    public $ExportWordUrl;
    public $ExportXmlUrl;
    public $ExportCsvUrl;
    public $ExportPdfUrl;

    // Custom export
    public $ExportExcelCustom = false;
    public $ExportWordCustom = false;
    public $ExportPdfCustom = false;
    public $ExportEmailCustom = false;

    // Update URLs
    public $InlineAddUrl;
    public $InlineCopyUrl;
    public $InlineEditUrl;
    public $GridAddUrl;
    public $GridEditUrl;
    public $MultiDeleteUrl;
    public $MultiUpdateUrl;

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
        if (($keyValue = Get("id") ?? Route("id")) !== null) {
            $this->RecKey["id"] = $keyValue;
        }
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";

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

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
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
    public $ExportOptions; // Export options
    public $OtherOptions; // Other options
    public $DisplayRecords = 1;
    public $DbMasterFilter;
    public $DbDetailFilter;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $RecKey = [];
    public $IsModal = false;

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

        // Get export parameters
        $custom = "";
        if (Param("export") !== null) {
            $this->Export = Param("export");
            $custom = Param("custom", "");
        } elseif (IsPost()) {
            if (Post("exporttype") !== null) {
                $this->Export = Post("exporttype");
            }
            $custom = Post("custom", "");
        } elseif (Get("cmd") == "json") {
            $this->Export = Get("cmd");
        } else {
            $this->setExportReturnUrl(CurrentUrl());
        }
        $ExportFileName = $this->TableVar; // Get export file, used in header
        if (Get("id") !== null) {
            if ($ExportFileName != "") {
                $ExportFileName .= "_";
            }
            $ExportFileName .= Get("id");
        }

        // Get custom export parameters
        if ($this->isExport() && $custom != "") {
            $this->CustomExport = $this->Export;
            $this->Export = "print";
        }
        $CustomExportType = $this->CustomExport;
        $ExportType = $this->Export; // Get export parameter, used in header

        // Update Export URLs
        if (Config("USE_PHPEXCEL")) {
            $this->ExportExcelCustom = false;
        }
        if (Config("USE_PHPWORD")) {
            $this->ExportWordCustom = false;
        }
        if ($this->ExportExcelCustom) {
            $this->ExportExcelUrl .= "&amp;custom=1";
        }
        if ($this->ExportWordCustom) {
            $this->ExportWordUrl .= "&amp;custom=1";
        }
        if ($this->ExportPdfCustom) {
            $this->ExportPdfUrl .= "&amp;custom=1";
        }
        $this->CurrentAction = Param("action"); // Set up current action

        // Setup export options
        $this->setupExportOptions();
        $this->id->setVisibility();
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

        // Load current record
        $loadCurrentRecord = false;
        $returnUrl = "";
        $matchRecord = false;

        // Set up master/detail parameters
        $this->setupMasterParms();
        if ($this->isPageRequest()) { // Validate request
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } elseif (Post("id") !== null) {
                $this->id->setFormValue(Post("id"));
                $this->RecKey["id"] = $this->id->FormValue;
            } elseif (IsApi() && ($keyValue = Key(0) ?? Route(2)) !== null) {
                $this->id->setQueryStringValue($keyValue);
                $this->RecKey["id"] = $this->id->QueryStringValue;
            } else {
                $returnUrl = "IvfEmbryologyChartList"; // Return to list
            }

            // Get action
            $this->CurrentAction = "show"; // Display
            switch ($this->CurrentAction) {
                case "show": // Get a record to display

                    // Load record based on key
                    if (IsApi()) {
                        $filter = $this->getRecordFilter();
                        $this->CurrentFilter = $filter;
                        $sql = $this->getCurrentSql();
                        $conn = $this->getConnection();
                        $this->Recordset = LoadRecordset($sql, $conn);
                        $res = $this->Recordset && !$this->Recordset->EOF;
                    } else {
                        $res = $this->loadRow();
                    }
                    if (!$res) { // Load record based on key
                        if ($this->getSuccessMessage() == "" && $this->getFailureMessage() == "") {
                            $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
                        }
                        $returnUrl = "IvfEmbryologyChartList"; // No matching record, return to list
                    }
                    break;
            }

            // Export data only
            if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
                $this->exportData();
                $this->terminate();
                return;
            }
        } else {
            $returnUrl = "IvfEmbryologyChartList"; // Not page request, return to list
        }
        if ($returnUrl != "") {
            $this->terminate($returnUrl);
            return;
        }

        // Set up Breadcrumb
        if (!$this->isExport()) {
            $this->setupBreadcrumb();
        }

        // Render row
        $this->RowType = ROWTYPE_VIEW;
        $this->resetAttributes();
        $this->renderRow();

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset, true); // Get current record only
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows]);
            $this->terminate(true);
            return;
        }

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

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["action"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("ViewPageAddLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->AddUrl)) . "'});\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("ViewPageAddLink") . "</a>";
        }
        $item->Visible = ($this->AddUrl != "" && $Security->canAdd());

        // Edit
        $item = &$option->add("edit");
        $editcaption = HtmlTitle($Language->phrase("ViewPageEditLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,url:'" . HtmlEncode(GetUrl($this->EditUrl)) . "'});\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("ViewPageEditLink") . "</a>";
        }
        $item->Visible = ($this->EditUrl != "" && $Security->canEdit());

        // Copy
        $item = &$option->add("copy");
        $copycaption = HtmlTitle($Language->phrase("ViewPageCopyLink"));
        if ($this->IsModal) {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode(GetUrl($this->CopyUrl)) . "'});\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("ViewPageCopyLink") . "</a>";
        }
        $item->Visible = ($this->CopyUrl != "" && $Security->canAdd());

        // Delete
        $item = &$option->add("delete");
        if ($this->IsModal) { // Handle as inline delete
            $item->Body = "<a onclick=\"return ew.confirmDelete(this);\" class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(UrlAddQuery(GetUrl($this->DeleteUrl), "action=1")) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        } else {
            $item->Body = "<a class=\"ew-action ew-delete\" title=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("ViewPageDeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("ViewPageDeleteLink") . "</a>";
        }
        $item->Visible = ($this->DeleteUrl != "" && $Security->canDelete());

        // Set up action default
        $option = $options["action"];
        $option->DropDownButtonPhrase = $Language->phrase("ButtonActions");
        $option->UseDropDownButton = false;
        $option->UseButtonGroup = true;
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Load recordset
    public function loadRecordset($offset = -1, $rowcnt = -1)
    {
        // Load List page SQL (QueryBuilder)
        $sql = $this->getListSql();

        // Load recordset
        if ($offset > -1) {
            $sql->setFirstResult($offset);
        }
        if ($rowcnt > 0) {
            $sql->setMaxResults($rowcnt);
        }
        $stmt = $sql->execute();
        $rs = new Recordset($stmt, $sql);

        // Call Recordset Selected event
        $this->recordsetSelected($rs);
        return $rs;
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
        $row = [];
        $row['id'] = null;
        $row['RIDNo'] = null;
        $row['Name'] = null;
        $row['ARTCycle'] = null;
        $row['SpermOrigin'] = null;
        $row['InseminatinTechnique'] = null;
        $row['IndicationForART'] = null;
        $row['Day0sino'] = null;
        $row['Day0OocyteStage'] = null;
        $row['Day0PolarBodyPosition'] = null;
        $row['Day0Breakage'] = null;
        $row['Day0Attempts'] = null;
        $row['Day0SPZMorpho'] = null;
        $row['Day0SPZLocation'] = null;
        $row['Day0SpOrgin'] = null;
        $row['Day5Cryoptop'] = null;
        $row['Day1Sperm'] = null;
        $row['Day1PN'] = null;
        $row['Day1PB'] = null;
        $row['Day1Pronucleus'] = null;
        $row['Day1Nucleolus'] = null;
        $row['Day1Halo'] = null;
        $row['Day2SiNo'] = null;
        $row['Day2CellNo'] = null;
        $row['Day2Frag'] = null;
        $row['Day2Symmetry'] = null;
        $row['Day2Cryoptop'] = null;
        $row['Day2Grade'] = null;
        $row['Day2End'] = null;
        $row['Day3Sino'] = null;
        $row['Day3CellNo'] = null;
        $row['Day3Frag'] = null;
        $row['Day3Symmetry'] = null;
        $row['Day3ZP'] = null;
        $row['Day3Vacoules'] = null;
        $row['Day3Grade'] = null;
        $row['Day3Cryoptop'] = null;
        $row['Day3End'] = null;
        $row['Day4SiNo'] = null;
        $row['Day4CellNo'] = null;
        $row['Day4Frag'] = null;
        $row['Day4Symmetry'] = null;
        $row['Day4Grade'] = null;
        $row['Day4Cryoptop'] = null;
        $row['Day4End'] = null;
        $row['Day5CellNo'] = null;
        $row['Day5ICM'] = null;
        $row['Day5TE'] = null;
        $row['Day5Observation'] = null;
        $row['Day5Collapsed'] = null;
        $row['Day5Vacoulles'] = null;
        $row['Day5Grade'] = null;
        $row['Day6CellNo'] = null;
        $row['Day6ICM'] = null;
        $row['Day6TE'] = null;
        $row['Day6Observation'] = null;
        $row['Day6Collapsed'] = null;
        $row['Day6Vacoulles'] = null;
        $row['Day6Grade'] = null;
        $row['Day6Cryoptop'] = null;
        $row['EndSiNo'] = null;
        $row['EndingDay'] = null;
        $row['EndingCellStage'] = null;
        $row['EndingGrade'] = null;
        $row['EndingState'] = null;
        $row['TidNo'] = null;
        $row['DidNO'] = null;
        $row['ICSiIVFDateTime'] = null;
        $row['PrimaryEmbrologist'] = null;
        $row['SecondaryEmbrologist'] = null;
        $row['Incubator'] = null;
        $row['location'] = null;
        $row['OocyteNo'] = null;
        $row['Stage'] = null;
        $row['Remarks'] = null;
        $row['vitrificationDate'] = null;
        $row['vitriPrimaryEmbryologist'] = null;
        $row['vitriSecondaryEmbryologist'] = null;
        $row['vitriEmbryoNo'] = null;
        $row['thawReFrozen'] = null;
        $row['vitriFertilisationDate'] = null;
        $row['vitriDay'] = null;
        $row['vitriStage'] = null;
        $row['vitriGrade'] = null;
        $row['vitriIncubator'] = null;
        $row['vitriTank'] = null;
        $row['vitriCanister'] = null;
        $row['vitriGobiet'] = null;
        $row['vitriViscotube'] = null;
        $row['vitriCryolockNo'] = null;
        $row['vitriCryolockColour'] = null;
        $row['thawDate'] = null;
        $row['thawPrimaryEmbryologist'] = null;
        $row['thawSecondaryEmbryologist'] = null;
        $row['thawET'] = null;
        $row['thawAbserve'] = null;
        $row['thawDiscard'] = null;
        $row['ETCatheter'] = null;
        $row['ETDifficulty'] = null;
        $row['ETEasy'] = null;
        $row['ETComments'] = null;
        $row['ETDoctor'] = null;
        $row['ETEmbryologist'] = null;
        $row['ETDate'] = null;
        $row['Day1End'] = null;
        return $row;
    }

    // Render row values based on field settings
    public function renderRow()
    {
        global $Security, $Language, $CurrentLanguage;

        // Initialize URLs
        $this->AddUrl = $this->getAddUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();
        $this->ListUrl = $this->getListUrl();
        $this->setupOtherOptions();

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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

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
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartview, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartview, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartview, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
            }
        } elseif (SameText($type, "html")) {
            return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
        } elseif (SameText($type, "xml")) {
            return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
        } elseif (SameText($type, "csv")) {
            return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
        } elseif (SameText($type, "email")) {
            $url = $custom ? ",url:'" . $pageUrl . "export=email&amp;custom=1'" : "";
            return '<button id="emf_ivf_embryology_chart" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_embryology_chart\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_embryology_chartview, key:' . ArrayToJsonAttribute($this->RecKey) . ', sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
        } elseif (SameText($type, "print")) {
            return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
        }
    }

    // Set up export options
    protected function setupExportOptions()
    {
        global $Language;

        // Printer friendly
        $item = &$this->ExportOptions->add("print");
        $item->Body = $this->getExportTag("print");
        $item->Visible = true;

        // Export to Excel
        $item = &$this->ExportOptions->add("excel");
        $item->Body = $this->getExportTag("excel");
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word");
        $item->Visible = true;

        // Export to Html
        $item = &$this->ExportOptions->add("html");
        $item->Body = $this->getExportTag("html");
        $item->Visible = true;

        // Export to Xml
        $item = &$this->ExportOptions->add("xml");
        $item->Body = $this->getExportTag("xml");
        $item->Visible = true;

        // Export to Csv
        $item = &$this->ExportOptions->add("csv");
        $item->Body = $this->getExportTag("csv");
        $item->Visible = true;

        // Export to Pdf
        $item = &$this->ExportOptions->add("pdf");
        $item->Body = $this->getExportTag("pdf");
        $item->Visible = true;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email");
        $item->Visible = true;

        // Drop down button for export
        $this->ExportOptions->UseButtonGroup = true;
        $this->ExportOptions->UseDropDownButton = true;
        if ($this->ExportOptions->UseButtonGroup && IsMobile()) {
            $this->ExportOptions->UseDropDownButton = true;
        }
        $this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

        // Add group option item
        $item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide options for export
        if ($this->isExport()) {
            $this->ExportOptions->hideAllOptions();
        }
    }

    /**
    * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
    *
    * @param bool $return Return the data rather than output it
    * @return mixed
    */
    public function exportData($return = false)
    {
        global $Language;
        $utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");

        // Load recordset
        if (!$this->Recordset) {
            $this->Recordset = $this->loadRecordset();
        }
        $rs = &$this->Recordset;
        if ($rs) {
            $this->TotalRecords = $rs->recordCount();
        }
        $this->StartRecord = 1;
        $this->setupStartRecord(); // Set up start record position

        // Set the last record to display
        if ($this->DisplayRecords <= 0) {
            $this->StopRecord = $this->TotalRecords;
        } else {
            $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
        }
        $this->ExportDoc = GetExportDocument($this, "v");
        $doc = &$this->ExportDoc;
        if (!$doc) {
            $this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
        }
        if (!$rs || !$doc) {
            RemoveHeader("Content-Type"); // Remove header
            RemoveHeader("Content-Disposition");
            $this->showMessage();
            return;
        }
        $this->StartRecord = 1;
        $this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;

        // Call Page Exporting server event
        $this->ExportDoc->ExportCustom = !$this->pageExporting();
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "view");
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        $doc->Text .= $footer;

        // Close recordset
        $rs->close();

        // Call Page Exported server event
        $this->pageExported();

        // Export header and footer
        $doc->exportHeaderAndFooter();

        // Clean output buffer (without destroying output buffer)
        $buffer = ob_get_contents(); // Save the output buffer
        if (!Config("DEBUG") && $buffer) {
            ob_clean();
        }

        // Write debug message if enabled
        if (Config("DEBUG") && !$this->isExport("pdf")) {
            echo GetDebugMessage();
        }

        // Output data
        if ($this->isExport("email")) {
            if ($return) {
                return $doc->Text; // Return email content
            } else {
                echo $this->exportEmail($doc->Text); // Send email
            }
        } else {
            $doc->export();
            if ($return) {
                RemoveHeader("Content-Type"); // Remove header
                RemoveHeader("Content-Disposition");
                $content = ob_get_contents();
                if ($content) {
                    ob_clean();
                }
                if ($buffer) {
                    echo $buffer; // Resume the output buffer
                }
                return $content;
            }
        }
    }

    // Export email
    protected function exportEmail($emailContent)
    {
        global $TempImages, $Language;
        $sender = Post("sender", "");
        $recipient = Post("recipient", "");
        $cc = Post("cc", "");
        $bcc = Post("bcc", "");

        // Subject
        $subject = Post("subject", "");
        $emailSubject = $subject;

        // Message
        $content = Post("message", "");
        $emailMessage = $content;

        // Check sender
        if ($sender == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Sender"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmail($sender)) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperSenderEmail") . "</p>";
        }

        // Check recipient
        if ($recipient == "") {
            return "<p class=\"text-danger\">" . str_replace("%s", $Language->phrase("Recipient"), $Language->phrase("EnterRequiredField")) . "</p>";
        }
        if (!CheckEmailList($recipient, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperRecipientEmail") . "</p>";
        }

        // Check cc
        if (!CheckEmailList($cc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperCcEmail") . "</p>";
        }

        // Check bcc
        if (!CheckEmailList($bcc, Config("MAX_EMAIL_RECIPIENT"))) {
            return "<p class=\"text-danger\">" . $Language->phrase("EnterProperBccEmail") . "</p>";
        }

        // Check email sent count
        $_SESSION[Config("EXPORT_EMAIL_COUNTER")] = Session(Config("EXPORT_EMAIL_COUNTER")) ?? 0;
        if ((int)Session(Config("EXPORT_EMAIL_COUNTER")) > Config("MAX_EMAIL_SENT_COUNT")) {
            return "<p class=\"text-danger\">" . $Language->phrase("ExceedMaxEmailExport") . "</p>";
        }

        // Send email
        $email = new Email();
        $email->Sender = $sender; // Sender
        $email->Recipient = $recipient; // Recipient
        $email->Cc = $cc; // Cc
        $email->Bcc = $bcc; // Bcc
        $email->Subject = $emailSubject; // Subject
        $email->Format = "html";
        if ($emailMessage != "") {
            $emailMessage = RemoveXss($emailMessage) . "<br><br>";
        }
        foreach ($TempImages as $tmpImage) {
            $email->addEmbeddedImage($tmpImage);
        }
        $email->Content = $emailMessage . CleanEmailContent($emailContent); // Content
        $eventArgs = [];
        if ($this->Recordset) {
            $eventArgs["rs"] = &$this->Recordset;
        }
        $emailSent = false;
        if ($this->emailSending($email, $eventArgs)) {
            $emailSent = $email->send();
        }

        // Check email sent status
        if ($emailSent) {
            // Update email sent count
            $_SESSION[Config("EXPORT_EMAIL_COUNTER")]++;

            // Sent email success
            return "<p class=\"text-success\">" . $Language->phrase("SendEmailSuccess") . "</p>"; // Set up success message
        } else {
            // Sent email failure
            return "<p class=\"text-danger\">" . $email->SendErrDescription . "</p>";
        }
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
            $this->setSessionWhere($this->getDetailFilter());

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
        $pageId = "view";
        $Breadcrumb->add("view", $pageId, $url);
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

    // Page Exporting event
    // $this->ExportDoc = export document object
    public function pageExporting()
    {
        //$this->ExportDoc->Text = "my header"; // Export header
        //return false; // Return false to skip default export and use Row_Export event
        return true; // Return true to use default export and skip Row_Export event
    }

    // Row Export event
    // $this->ExportDoc = export document object
    public function rowExport($rs)
    {
        //$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
    }

    // Page Exported event
    // $this->ExportDoc = export document object
    public function pageExported()
    {
        //$this->ExportDoc->Text .= "my footer"; // Export footer
        //Log($this->ExportDoc->Text);
    }
}
