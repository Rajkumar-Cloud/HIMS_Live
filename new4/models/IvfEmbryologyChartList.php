<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfEmbryologyChartList extends IvfEmbryologyChart
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_embryology_chart';

    // Page object name
    public $PageObjName = "IvfEmbryologyChartList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fivf_embryology_chartlist";
    public $FormActionName = "k_action";
    public $FormBlankRowName = "k_blankrow";
    public $FormKeyCountName = "key_count";

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

        // Initialize URLs
        $this->ExportPrintUrl = $pageUrl . "export=print";
        $this->ExportExcelUrl = $pageUrl . "export=excel";
        $this->ExportWordUrl = $pageUrl . "export=word";
        $this->ExportPdfUrl = $pageUrl . "export=pdf";
        $this->ExportHtmlUrl = $pageUrl . "export=html";
        $this->ExportXmlUrl = $pageUrl . "export=xml";
        $this->ExportCsvUrl = $pageUrl . "export=csv";
        $this->AddUrl = "IvfEmbryologyChartAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfEmbryologyChartDelete";
        $this->MultiUpdateUrl = "IvfEmbryologyChartUpdate";

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

        // List options
        $this->ListOptions = new ListOptions();
        $this->ListOptions->TableVar = $this->TableVar;

        // Export options
        $this->ExportOptions = new ListOptions("div");
        $this->ExportOptions->TagClassName = "ew-export-option";

        // Import options
        $this->ImportOptions = new ListOptions("div");
        $this->ImportOptions->TagClassName = "ew-import-option";

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
        $this->OtherOptions["detail"] = new ListOptions("div");
        $this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
        $this->OtherOptions["action"] = new ListOptions("div");
        $this->OtherOptions["action"]->TagClassName = "ew-action-option";

        // Filter options
        $this->FilterOptions = new ListOptions("div");
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_embryology_chartlistsrch";

        // List actions
        $this->ListActions = new ListActions();
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
            SaveDebugMessage();
            Redirect(GetUrl($url));
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
                        if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0) {
                            $val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
                        }
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

    // Class variables
    public $ListOptions; // List options
    public $ExportOptions; // Export options
    public $SearchOptions; // Search options
    public $OtherOptions; // Other options
    public $FilterOptions; // Filter options
    public $ImportOptions; // Import options
    public $ListActions; // List actions
    public $SelectedCount = 0;
    public $SelectedIndex = 0;
    public $DisplayRecords = 2000;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "20,40,60,100,500,1000,2000,-1"; // Page sizes (comma separated)
    public $DefaultSearchWhere = ""; // Default search WHERE clause
    public $SearchWhere = ""; // Search WHERE clause
    public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
    public $SearchRowCount = 0; // For extended search
    public $SearchColumnCount = 0; // For extended search
    public $SearchFieldsPerRow = 1; // For extended search
    public $RecordCount = 0; // Record count
    public $EditRowCount;
    public $StartRowCount = 1;
    public $RowCount = 0;
    public $Attrs = []; // Row attributes and cell attributes
    public $RowIndex = 0; // Row index
    public $KeyCount = 0; // Key count
    public $RowAction = ""; // Row action
    public $MultiColumnClass = "col-sm";
    public $MultiColumnEditClass = "w-100";
    public $DbMasterFilter = ""; // Master filter
    public $DbDetailFilter = ""; // Detail filter
    public $MasterRecordExists;
    public $MultiSelectKey;
    public $Command;
    public $RestoreSearch = false;
    public $HashValue; // Hash value
    public $DetailPages;
    public $OldRecordset;

    /**
     * Page run
     *
     * @return void
     */
    public function run()
    {
        global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm;

        // Create form object
        $CurrentForm = new HttpForm();

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

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();

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

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Set up master detail parameters
        $this->setupMasterParms();

        // Setup other options
        $this->setupOtherOptions();

        // Set up custom action (compatible with old version)
        foreach ($this->CustomActions as $name => $action) {
            $this->ListActions->add($name, $action);
        }

        // Show checkbox column if multiple action
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
                $this->ListOptions["checkbox"]->Visible = true;
                break;
            }
        }

        // Set up lookup cache

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Process list action first
            if ($this->processListAction()) { // Ajax request
                $this->terminate();
                return;
            }

            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

            // Set up Breadcrumb
            if (!$this->isExport()) {
                $this->setupBreadcrumb();
            }

            // Check QueryString parameters
            if (Get("action") !== null) {
                $this->CurrentAction = Get("action");

                // Clear inline mode
                if ($this->isCancel()) {
                    $this->clearInlineMode();
                }

                // Switch to grid edit mode
                if ($this->isGridEdit()) {
                    $this->gridEditMode();
                }

                // Switch to inline edit mode
                if ($this->isEdit()) {
                    $this->inlineEditMode();
                }

                // Switch to inline add mode
                if ($this->isAdd() || $this->isCopy()) {
                    $this->inlineAddMode();
                }

                // Switch to grid add mode
                if ($this->isGridAdd()) {
                    $this->gridAddMode();
                }
            } else {
                if (Post("action") !== null) {
                    $this->CurrentAction = Post("action"); // Get action

                    // Grid Update
                    if (($this->isGridUpdate() || $this->isGridOverwrite()) && Session(SESSION_INLINE_MODE) == "gridedit") {
                        if ($this->validateGridForm()) {
                            $gridUpdate = $this->gridUpdate();
                        } else {
                            $gridUpdate = false;
                        }
                        if ($gridUpdate) {
                            $this->gridEditMode();
                        } else {
                            $this->EventCancelled = true;
                            $this->gridEditMode(); // Stay in Grid edit mode
                        }
                    }

                    // Inline Update
                    if (($this->isUpdate() || $this->isOverwrite()) && Session(SESSION_INLINE_MODE) == "edit") {
                        $this->setKey(Post($this->OldKeyName));
                        $this->inlineUpdate();
                    }

                    // Insert Inline
                    if ($this->isInsert() && Session(SESSION_INLINE_MODE) == "add") {
                        $this->setKey(Post($this->OldKeyName));
                        $this->inlineInsert();
                    }

                    // Grid Insert
                    if ($this->isGridInsert() && Session(SESSION_INLINE_MODE) == "gridadd") {
                        if ($this->validateGridForm()) {
                            $gridInsert = $this->gridInsert();
                        } else {
                            $gridInsert = false;
                        }
                        if ($gridInsert) {
                        } else {
                            $this->EventCancelled = true;
                            $this->gridAddMode(); // Stay in Grid add mode
                        }
                    }
                } elseif (Session(SESSION_INLINE_MODE) == "gridedit") { // Previously in grid edit mode
                    if (Get(Config("TABLE_START_REC")) !== null || Get(Config("TABLE_PAGE_NO")) !== null) { // Stay in grid edit mode if paging
                        $this->gridEditMode();
                    } else { // Reset grid edit
                        $this->clearInlineMode();
                    }
                }
            }

            // Hide list options
            if ($this->isExport()) {
                $this->ListOptions->hideAllOptions(["sequence"]);
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            } elseif ($this->isGridAdd() || $this->isGridEdit()) {
                $this->ListOptions->hideAllOptions();
                $this->ListOptions->UseDropDownButton = false; // Disable drop down button
                $this->ListOptions->UseButtonGroup = false; // Disable button group
            }

            // Hide options
            if ($this->isExport() || $this->CurrentAction) {
                $this->ExportOptions->hideAllOptions();
                $this->FilterOptions->hideAllOptions();
                $this->ImportOptions->hideAllOptions();
            }

            // Hide other options
            if ($this->isExport()) {
                $this->OtherOptions->hideAllOptions();
            }

            // Show grid delete link for grid add / grid edit
            if ($this->AllowAddDeleteRow) {
                if ($this->isGridAdd() || $this->isGridEdit()) {
                    $item = $this->ListOptions["griddelete"];
                    if ($item) {
                        $item->Visible = true;
                    }
                }
            }

            // Get default search criteria
            AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }

            // Restore search parms from Session if not searching / reset / export
            if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms()) {
                $this->restoreSearchParms();
            }

            // Call Recordset SearchValidated event
            $this->recordsetSearchValidated();

            // Set up sorting order
            $this->setupSortOrder();

            // Get basic search criteria
            if (!$this->hasInvalidFields()) {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Restore display records
        if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
            $this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
        } else {
            $this->DisplayRecords = 2000; // Load default
            $this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
        }

        // Load Sorting Order
        if ($this->Command != "json") {
            $this->loadSortOrder();
        }

        // Load search default if no existing search criteria
        if (!$this->checkSearchParms()) {
            // Load basic search from default
            $this->BasicSearch->loadDefault();
            if ($this->BasicSearch->Keyword != "") {
                $srchBasic = $this->basicSearchWhere();
            }
        }

        // Build search criteria
        AddFilter($this->SearchWhere, $srchAdvanced);
        AddFilter($this->SearchWhere, $srchBasic);

        // Call Recordset_Searching event
        $this->recordsetSearching($this->SearchWhere);

        // Save search criteria
        if ($this->Command == "search" && !$this->RestoreSearch) {
            $this->setSearchWhere($this->SearchWhere); // Save to Session
            $this->StartRecord = 1; // Reset start record counter
            $this->setStartRecordNumber($this->StartRecord);
        } elseif ($this->Command != "json") {
            $this->SearchWhere = $this->getSearchWhere();
        }

        // Build filter
        $filter = "";
        if (!$Security->canList()) {
            $filter = "(0=1)"; // Filter all records
        }

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
            $masterTbl = Container("ivf_treatment_plan");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("IvfTreatmentPlanList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_oocytedenudation") {
            $masterTbl = Container("ivf_oocytedenudation");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("IvfOocytedenudationList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }

        // Export data only
        if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
            $this->exportData();
            $this->terminate();
            return;
        }
        if ($this->isGridAdd()) {
            $this->CurrentFilter = "0=1";
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->GridAddRowCount;
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) { // Display all records
                $this->DisplayRecords = $this->TotalRecords;
            }
            if (!($this->isExport() && $this->ExportAll)) { // Set up start record position
                $this->setupStartRecord();
            }
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

            // Set no record found message
            if (!$this->CurrentAction && $this->TotalRecords == 0) {
                if (!$Security->canList()) {
                    $this->setWarningMessage(DeniedMessage());
                }
                if ($this->SearchWhere == "0=101") {
                    $this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
                } else {
                    $this->setWarningMessage($Language->phrase("NoRecord"));
                }
            }
        }

        // Search options
        $this->setupSearchOptions();

        // Set up search panel class
        if ($this->SearchWhere != "") {
            AppendClass($this->SearchPanelClass, "show");
        }

        // Normal return
        if (IsApi()) {
            $rows = $this->getRecordsFromRecordset($this->Recordset);
            $this->Recordset->close();
            WriteJson(["success" => true, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
            $this->terminate(true);
            return;
        }

        // Set up pager
        $this->Pager = new NumericPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);

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

    // Set up number of records displayed per page
    protected function setupDisplayRecords()
    {
        $wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
        if ($wrk != "") {
            if (is_numeric($wrk)) {
                $this->DisplayRecords = (int)$wrk;
            } else {
                if (SameText($wrk, "all")) { // Display all records
                    $this->DisplayRecords = -1;
                } else {
                    $this->DisplayRecords = 2000; // Non-numeric, load default
                }
            }
            $this->setRecordsPerPage($this->DisplayRecords); // Save to Session
            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Exit inline mode
    protected function clearInlineMode()
    {
        $this->LastAction = $this->CurrentAction; // Save last action
        $this->CurrentAction = ""; // Clear action
        $_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
    }

    // Switch to Grid Add mode
    protected function gridAddMode()
    {
        $this->CurrentAction = "gridadd";
        $_SESSION[SESSION_INLINE_MODE] = "gridadd";
        $this->hideFieldsForAddEdit();
    }

    // Switch to Grid Edit mode
    protected function gridEditMode()
    {
        $this->CurrentAction = "gridedit";
        $_SESSION[SESSION_INLINE_MODE] = "gridedit";
        $this->hideFieldsForAddEdit();
    }

    // Switch to Inline Edit mode
    protected function inlineEditMode()
    {
        global $Security, $Language;
        if (!$Security->canEdit()) {
            return false; // Edit not allowed
        }
        $inlineEdit = true;
        if (($keyValue = Get("id") ?? Route("id")) !== null) {
            $this->id->setQueryStringValue($keyValue);
        } else {
            $inlineEdit = false;
        }
        if ($inlineEdit) {
            if ($this->loadRow()) {
                $this->OldKey = $this->getKey(true); // Get from CurrentValue
                $this->setKey($this->OldKey); // Set to OldValue
                $_SESSION[SESSION_INLINE_MODE] = "edit"; // Enable inline edit
            }
        }
        return true;
    }

    // Perform update to Inline Edit record
    protected function inlineUpdate()
    {
        global $Language, $CurrentForm;
        $CurrentForm->Index = 1;
        $this->loadFormValues(); // Get form values

        // Validate form
        $inlineUpdate = true;
        if (!$this->validateForm()) {
            $inlineUpdate = false; // Form error, reset action
        } else {
            $inlineUpdate = false;
            $this->SendEmail = true; // Send email on update success
            $inlineUpdate = $this->editRow(); // Update record
        }
        if ($inlineUpdate) { // Update success
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
            }
            $this->EventCancelled = true; // Cancel event
            $this->CurrentAction = "edit"; // Stay in edit mode
        }
    }

    // Check Inline Edit key
    public function checkInlineEditKey()
    {
        if (!SameString($this->id->OldValue, $this->id->CurrentValue)) {
            return false;
        }
        return true;
    }

    // Switch to Inline Add mode
    protected function inlineAddMode()
    {
        global $Security, $Language;
        if (!$Security->canAdd()) {
            return false; // Add not allowed
        }
        if ($this->isCopy()) {
            if (($keyValue = Get("id") ?? Route("id")) !== null) {
                $this->id->setQueryStringValue($keyValue);
            } else {
                $this->CurrentAction = "add";
            }
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
        } else {
            $this->OldKey = ""; // Clear old record key
        }
        $this->setKey($this->OldKey); // Set to OldValue
        $_SESSION[SESSION_INLINE_MODE] = "add"; // Enable inline add
        return true;
    }

    // Perform update to Inline Add/Copy record
    protected function inlineInsert()
    {
        global $Language, $CurrentForm;
        $this->loadOldRecord(); // Load old record
        $CurrentForm->Index = 0;
        $this->loadFormValues(); // Get form values

        // Validate form
        if (!$this->validateForm()) {
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
            return;
        }
        $this->SendEmail = true; // Send email on add success
        if ($this->addRow($this->OldRecordset)) { // Add record
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up add success message
            }
            $this->clearInlineMode(); // Clear inline add mode
        } else { // Add failed
            $this->EventCancelled = true; // Set event cancelled
            $this->CurrentAction = "add"; // Stay in add mode
        }
    }

    // Perform update to grid
    public function gridUpdate()
    {
        global $Language, $CurrentForm;
        $gridUpdate = true;

        // Get old recordset
        $this->CurrentFilter = $this->buildKeyFilter();
        if ($this->CurrentFilter == "") {
            $this->CurrentFilter = "0=1";
        }
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        if ($rs = $conn->executeQuery($sql)) {
            $rsold = $rs->fetchAll();
            $rs->closeCursor();
        }

        // Call Grid Updating event
        if (!$this->gridUpdating($rsold)) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();
        $key = "";

        // Update row index and get row key
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Update all rows based on key
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            $CurrentForm->Index = $rowindex;
            $this->setKey($CurrentForm->getValue($this->OldKeyName));
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));

            // Load all values and keys
            if ($rowaction != "insertdelete") { // Skip insert then deleted rows
                $this->loadFormValues(); // Get form values
                if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
                    $gridUpdate = $this->OldKey != ""; // Key must not be empty
                } else {
                    $gridUpdate = true;
                }

                // Skip empty row
                if ($rowaction == "insert" && $this->emptyRow()) {
                // Validate form and insert/update/delete record
                } elseif ($gridUpdate) {
                    if ($rowaction == "delete") {
                        $this->CurrentFilter = $this->getRecordFilter();
                        $gridUpdate = $this->deleteRows(); // Delete this row
                    //} elseif (!$this->validateForm()) { // Already done in validateGridForm
                    //    $gridUpdate = false; // Form error, reset action
                    } else {
                        if ($rowaction == "insert") {
                            $gridUpdate = $this->addRow(); // Insert this row
                        } else {
                            if ($this->OldKey != "") {
                                $this->SendEmail = false; // Do not send email on update success
                                $gridUpdate = $this->editRow(); // Update this row
                            }
                        } // End update
                    }
                }
                if ($gridUpdate) {
                    if ($key != "") {
                        $key .= ", ";
                    }
                    $key .= $this->OldKey;
                } else {
                    break;
                }
            }
        }
        if ($gridUpdate) {
            $conn->commit(); // Commit transaction

            // Get new records
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Updated event
            $this->gridUpdated($rsold, $rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
            }
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
            }
        }
        return $gridUpdate;
    }

    // Build filter for all keys
    protected function buildKeyFilter()
    {
        global $CurrentForm;
        $wrkFilter = "";

        // Update row index and get row key
        $rowindex = 1;
        $CurrentForm->Index = $rowindex;
        $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        while ($thisKey != "") {
            $this->setKey($thisKey);
            if ($this->OldKey != "") {
                $filter = $this->getRecordFilter();
                if ($wrkFilter != "") {
                    $wrkFilter .= " OR ";
                }
                $wrkFilter .= $filter;
            } else {
                $wrkFilter = "0=1";
                break;
            }

            // Update row index and get row key
            $rowindex++; // Next row
            $CurrentForm->Index = $rowindex;
            $thisKey = strval($CurrentForm->getValue($this->OldKeyName));
        }
        return $wrkFilter;
    }

    // Perform Grid Add
    public function gridInsert()
    {
        global $Language, $CurrentForm;
        $rowindex = 1;
        $gridInsert = false;
        $conn = $this->getConnection();

        // Call Grid Inserting event
        if (!$this->gridInserting()) {
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
            }
            return false;
        }

        // Begin transaction
        $conn->beginTransaction();

        // Init key filter
        $wrkfilter = "";
        $addcnt = 0;
        $key = "";

        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Insert all rows
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "" && $rowaction != "insert") {
                continue; // Skip
            }
            if ($rowaction == "insert") {
                $this->OldKey = strval($CurrentForm->getValue($this->OldKeyName));
                $this->loadOldRecord(); // Load old record
            }
            $this->loadFormValues(); // Get form values
            if (!$this->emptyRow()) {
                $addcnt++;
                $this->SendEmail = false; // Do not send email on insert success

                // Validate form // Already done in validateGridForm
                //if (!$this->validateForm()) {
                //    $gridInsert = false; // Form error, reset action
                //} else {
                    $gridInsert = $this->addRow($this->OldRecordset); // Insert this row
                //}
                if ($gridInsert) {
                    if ($key != "") {
                        $key .= Config("COMPOSITE_KEY_SEPARATOR");
                    }
                    $key .= $this->id->CurrentValue;

                    // Add filter for this record
                    $filter = $this->getRecordFilter();
                    if ($wrkfilter != "") {
                        $wrkfilter .= " OR ";
                    }
                    $wrkfilter .= $filter;
                } else {
                    break;
                }
            }
        }
        if ($addcnt == 0) { // No record inserted
            $this->setFailureMessage($Language->phrase("NoAddRecord"));
            $gridInsert = false;
        }
        if ($gridInsert) {
            $conn->commit(); // Commit transaction

            // Get new records
            $this->CurrentFilter = $wrkfilter;
            $sql = $this->getCurrentSql();
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Inserted event
            $this->gridInserted($rsnew);
            if ($this->getSuccessMessage() == "") {
                $this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
            }
            $this->clearInlineMode(); // Clear grid add mode
        } else {
            $conn->rollback(); // Rollback transaction
            if ($this->getFailureMessage() == "") {
                $this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
            }
        }
        return $gridInsert;
    }

    // Check if empty row
    public function emptyRow()
    {
        global $CurrentForm;
        if ($CurrentForm->hasValue("x_RIDNo") && $CurrentForm->hasValue("o_RIDNo") && $this->RIDNo->CurrentValue != $this->RIDNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Name") && $CurrentForm->hasValue("o_Name") && $this->Name->CurrentValue != $this->Name->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ARTCycle") && $CurrentForm->hasValue("o_ARTCycle") && $this->ARTCycle->CurrentValue != $this->ARTCycle->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SpermOrigin") && $CurrentForm->hasValue("o_SpermOrigin") && $this->SpermOrigin->CurrentValue != $this->SpermOrigin->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_InseminatinTechnique") && $CurrentForm->hasValue("o_InseminatinTechnique") && $this->InseminatinTechnique->CurrentValue != $this->InseminatinTechnique->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IndicationForART") && $CurrentForm->hasValue("o_IndicationForART") && $this->IndicationForART->CurrentValue != $this->IndicationForART->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0sino") && $CurrentForm->hasValue("o_Day0sino") && $this->Day0sino->CurrentValue != $this->Day0sino->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0OocyteStage") && $CurrentForm->hasValue("o_Day0OocyteStage") && $this->Day0OocyteStage->CurrentValue != $this->Day0OocyteStage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0PolarBodyPosition") && $CurrentForm->hasValue("o_Day0PolarBodyPosition") && $this->Day0PolarBodyPosition->CurrentValue != $this->Day0PolarBodyPosition->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0Breakage") && $CurrentForm->hasValue("o_Day0Breakage") && $this->Day0Breakage->CurrentValue != $this->Day0Breakage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0Attempts") && $CurrentForm->hasValue("o_Day0Attempts") && $this->Day0Attempts->CurrentValue != $this->Day0Attempts->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0SPZMorpho") && $CurrentForm->hasValue("o_Day0SPZMorpho") && $this->Day0SPZMorpho->CurrentValue != $this->Day0SPZMorpho->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0SPZLocation") && $CurrentForm->hasValue("o_Day0SPZLocation") && $this->Day0SPZLocation->CurrentValue != $this->Day0SPZLocation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day0SpOrgin") && $CurrentForm->hasValue("o_Day0SpOrgin") && $this->Day0SpOrgin->CurrentValue != $this->Day0SpOrgin->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5Cryoptop") && $CurrentForm->hasValue("o_Day5Cryoptop") && $this->Day5Cryoptop->CurrentValue != $this->Day5Cryoptop->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1Sperm") && $CurrentForm->hasValue("o_Day1Sperm") && $this->Day1Sperm->CurrentValue != $this->Day1Sperm->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1PN") && $CurrentForm->hasValue("o_Day1PN") && $this->Day1PN->CurrentValue != $this->Day1PN->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1PB") && $CurrentForm->hasValue("o_Day1PB") && $this->Day1PB->CurrentValue != $this->Day1PB->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1Pronucleus") && $CurrentForm->hasValue("o_Day1Pronucleus") && $this->Day1Pronucleus->CurrentValue != $this->Day1Pronucleus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1Nucleolus") && $CurrentForm->hasValue("o_Day1Nucleolus") && $this->Day1Nucleolus->CurrentValue != $this->Day1Nucleolus->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1Halo") && $CurrentForm->hasValue("o_Day1Halo") && $this->Day1Halo->CurrentValue != $this->Day1Halo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2SiNo") && $CurrentForm->hasValue("o_Day2SiNo") && $this->Day2SiNo->CurrentValue != $this->Day2SiNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2CellNo") && $CurrentForm->hasValue("o_Day2CellNo") && $this->Day2CellNo->CurrentValue != $this->Day2CellNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2Frag") && $CurrentForm->hasValue("o_Day2Frag") && $this->Day2Frag->CurrentValue != $this->Day2Frag->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2Symmetry") && $CurrentForm->hasValue("o_Day2Symmetry") && $this->Day2Symmetry->CurrentValue != $this->Day2Symmetry->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2Cryoptop") && $CurrentForm->hasValue("o_Day2Cryoptop") && $this->Day2Cryoptop->CurrentValue != $this->Day2Cryoptop->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2Grade") && $CurrentForm->hasValue("o_Day2Grade") && $this->Day2Grade->CurrentValue != $this->Day2Grade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day2End") && $CurrentForm->hasValue("o_Day2End") && $this->Day2End->CurrentValue != $this->Day2End->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Sino") && $CurrentForm->hasValue("o_Day3Sino") && $this->Day3Sino->CurrentValue != $this->Day3Sino->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3CellNo") && $CurrentForm->hasValue("o_Day3CellNo") && $this->Day3CellNo->CurrentValue != $this->Day3CellNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Frag") && $CurrentForm->hasValue("o_Day3Frag") && $this->Day3Frag->CurrentValue != $this->Day3Frag->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Symmetry") && $CurrentForm->hasValue("o_Day3Symmetry") && $this->Day3Symmetry->CurrentValue != $this->Day3Symmetry->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3ZP") && $CurrentForm->hasValue("o_Day3ZP") && $this->Day3ZP->CurrentValue != $this->Day3ZP->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Vacoules") && $CurrentForm->hasValue("o_Day3Vacoules") && $this->Day3Vacoules->CurrentValue != $this->Day3Vacoules->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Grade") && $CurrentForm->hasValue("o_Day3Grade") && $this->Day3Grade->CurrentValue != $this->Day3Grade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3Cryoptop") && $CurrentForm->hasValue("o_Day3Cryoptop") && $this->Day3Cryoptop->CurrentValue != $this->Day3Cryoptop->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day3End") && $CurrentForm->hasValue("o_Day3End") && $this->Day3End->CurrentValue != $this->Day3End->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4SiNo") && $CurrentForm->hasValue("o_Day4SiNo") && $this->Day4SiNo->CurrentValue != $this->Day4SiNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4CellNo") && $CurrentForm->hasValue("o_Day4CellNo") && $this->Day4CellNo->CurrentValue != $this->Day4CellNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4Frag") && $CurrentForm->hasValue("o_Day4Frag") && $this->Day4Frag->CurrentValue != $this->Day4Frag->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4Symmetry") && $CurrentForm->hasValue("o_Day4Symmetry") && $this->Day4Symmetry->CurrentValue != $this->Day4Symmetry->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4Grade") && $CurrentForm->hasValue("o_Day4Grade") && $this->Day4Grade->CurrentValue != $this->Day4Grade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4Cryoptop") && $CurrentForm->hasValue("o_Day4Cryoptop") && $this->Day4Cryoptop->CurrentValue != $this->Day4Cryoptop->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day4End") && $CurrentForm->hasValue("o_Day4End") && $this->Day4End->CurrentValue != $this->Day4End->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5CellNo") && $CurrentForm->hasValue("o_Day5CellNo") && $this->Day5CellNo->CurrentValue != $this->Day5CellNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5ICM") && $CurrentForm->hasValue("o_Day5ICM") && $this->Day5ICM->CurrentValue != $this->Day5ICM->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5TE") && $CurrentForm->hasValue("o_Day5TE") && $this->Day5TE->CurrentValue != $this->Day5TE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5Observation") && $CurrentForm->hasValue("o_Day5Observation") && $this->Day5Observation->CurrentValue != $this->Day5Observation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5Collapsed") && $CurrentForm->hasValue("o_Day5Collapsed") && $this->Day5Collapsed->CurrentValue != $this->Day5Collapsed->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5Vacoulles") && $CurrentForm->hasValue("o_Day5Vacoulles") && $this->Day5Vacoulles->CurrentValue != $this->Day5Vacoulles->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day5Grade") && $CurrentForm->hasValue("o_Day5Grade") && $this->Day5Grade->CurrentValue != $this->Day5Grade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6CellNo") && $CurrentForm->hasValue("o_Day6CellNo") && $this->Day6CellNo->CurrentValue != $this->Day6CellNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6ICM") && $CurrentForm->hasValue("o_Day6ICM") && $this->Day6ICM->CurrentValue != $this->Day6ICM->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6TE") && $CurrentForm->hasValue("o_Day6TE") && $this->Day6TE->CurrentValue != $this->Day6TE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6Observation") && $CurrentForm->hasValue("o_Day6Observation") && $this->Day6Observation->CurrentValue != $this->Day6Observation->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6Collapsed") && $CurrentForm->hasValue("o_Day6Collapsed") && $this->Day6Collapsed->CurrentValue != $this->Day6Collapsed->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6Vacoulles") && $CurrentForm->hasValue("o_Day6Vacoulles") && $this->Day6Vacoulles->CurrentValue != $this->Day6Vacoulles->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6Grade") && $CurrentForm->hasValue("o_Day6Grade") && $this->Day6Grade->CurrentValue != $this->Day6Grade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day6Cryoptop") && $CurrentForm->hasValue("o_Day6Cryoptop") && $this->Day6Cryoptop->CurrentValue != $this->Day6Cryoptop->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EndSiNo") && $CurrentForm->hasValue("o_EndSiNo") && $this->EndSiNo->CurrentValue != $this->EndSiNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EndingDay") && $CurrentForm->hasValue("o_EndingDay") && $this->EndingDay->CurrentValue != $this->EndingDay->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EndingCellStage") && $CurrentForm->hasValue("o_EndingCellStage") && $this->EndingCellStage->CurrentValue != $this->EndingCellStage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EndingGrade") && $CurrentForm->hasValue("o_EndingGrade") && $this->EndingGrade->CurrentValue != $this->EndingGrade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_EndingState") && $CurrentForm->hasValue("o_EndingState") && $this->EndingState->CurrentValue != $this->EndingState->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DidNO") && $CurrentForm->hasValue("o_DidNO") && $this->DidNO->CurrentValue != $this->DidNO->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ICSiIVFDateTime") && $CurrentForm->hasValue("o_ICSiIVFDateTime") && $this->ICSiIVFDateTime->CurrentValue != $this->ICSiIVFDateTime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PrimaryEmbrologist") && $CurrentForm->hasValue("o_PrimaryEmbrologist") && $this->PrimaryEmbrologist->CurrentValue != $this->PrimaryEmbrologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SecondaryEmbrologist") && $CurrentForm->hasValue("o_SecondaryEmbrologist") && $this->SecondaryEmbrologist->CurrentValue != $this->SecondaryEmbrologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Incubator") && $CurrentForm->hasValue("o_Incubator") && $this->Incubator->CurrentValue != $this->Incubator->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_location") && $CurrentForm->hasValue("o_location") && $this->location->CurrentValue != $this->location->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_OocyteNo") && $CurrentForm->hasValue("o_OocyteNo") && $this->OocyteNo->CurrentValue != $this->OocyteNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Stage") && $CurrentForm->hasValue("o_Stage") && $this->Stage->CurrentValue != $this->Stage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Remarks") && $CurrentForm->hasValue("o_Remarks") && $this->Remarks->CurrentValue != $this->Remarks->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitrificationDate") && $CurrentForm->hasValue("o_vitrificationDate") && $this->vitrificationDate->CurrentValue != $this->vitrificationDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriPrimaryEmbryologist") && $CurrentForm->hasValue("o_vitriPrimaryEmbryologist") && $this->vitriPrimaryEmbryologist->CurrentValue != $this->vitriPrimaryEmbryologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriSecondaryEmbryologist") && $CurrentForm->hasValue("o_vitriSecondaryEmbryologist") && $this->vitriSecondaryEmbryologist->CurrentValue != $this->vitriSecondaryEmbryologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriEmbryoNo") && $CurrentForm->hasValue("o_vitriEmbryoNo") && $this->vitriEmbryoNo->CurrentValue != $this->vitriEmbryoNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawReFrozen") && $CurrentForm->hasValue("o_thawReFrozen") && $this->thawReFrozen->CurrentValue != $this->thawReFrozen->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriFertilisationDate") && $CurrentForm->hasValue("o_vitriFertilisationDate") && $this->vitriFertilisationDate->CurrentValue != $this->vitriFertilisationDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriDay") && $CurrentForm->hasValue("o_vitriDay") && $this->vitriDay->CurrentValue != $this->vitriDay->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriStage") && $CurrentForm->hasValue("o_vitriStage") && $this->vitriStage->CurrentValue != $this->vitriStage->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriGrade") && $CurrentForm->hasValue("o_vitriGrade") && $this->vitriGrade->CurrentValue != $this->vitriGrade->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriIncubator") && $CurrentForm->hasValue("o_vitriIncubator") && $this->vitriIncubator->CurrentValue != $this->vitriIncubator->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriTank") && $CurrentForm->hasValue("o_vitriTank") && $this->vitriTank->CurrentValue != $this->vitriTank->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriCanister") && $CurrentForm->hasValue("o_vitriCanister") && $this->vitriCanister->CurrentValue != $this->vitriCanister->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriGobiet") && $CurrentForm->hasValue("o_vitriGobiet") && $this->vitriGobiet->CurrentValue != $this->vitriGobiet->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriViscotube") && $CurrentForm->hasValue("o_vitriViscotube") && $this->vitriViscotube->CurrentValue != $this->vitriViscotube->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriCryolockNo") && $CurrentForm->hasValue("o_vitriCryolockNo") && $this->vitriCryolockNo->CurrentValue != $this->vitriCryolockNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_vitriCryolockColour") && $CurrentForm->hasValue("o_vitriCryolockColour") && $this->vitriCryolockColour->CurrentValue != $this->vitriCryolockColour->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawDate") && $CurrentForm->hasValue("o_thawDate") && $this->thawDate->CurrentValue != $this->thawDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawPrimaryEmbryologist") && $CurrentForm->hasValue("o_thawPrimaryEmbryologist") && $this->thawPrimaryEmbryologist->CurrentValue != $this->thawPrimaryEmbryologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawSecondaryEmbryologist") && $CurrentForm->hasValue("o_thawSecondaryEmbryologist") && $this->thawSecondaryEmbryologist->CurrentValue != $this->thawSecondaryEmbryologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawET") && $CurrentForm->hasValue("o_thawET") && $this->thawET->CurrentValue != $this->thawET->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawAbserve") && $CurrentForm->hasValue("o_thawAbserve") && $this->thawAbserve->CurrentValue != $this->thawAbserve->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_thawDiscard") && $CurrentForm->hasValue("o_thawDiscard") && $this->thawDiscard->CurrentValue != $this->thawDiscard->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETCatheter") && $CurrentForm->hasValue("o_ETCatheter") && $this->ETCatheter->CurrentValue != $this->ETCatheter->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETDifficulty") && $CurrentForm->hasValue("o_ETDifficulty") && $this->ETDifficulty->CurrentValue != $this->ETDifficulty->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETEasy") && $CurrentForm->hasValue("o_ETEasy") && $this->ETEasy->CurrentValue != $this->ETEasy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETComments") && $CurrentForm->hasValue("o_ETComments") && $this->ETComments->CurrentValue != $this->ETComments->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETDoctor") && $CurrentForm->hasValue("o_ETDoctor") && $this->ETDoctor->CurrentValue != $this->ETDoctor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETEmbryologist") && $CurrentForm->hasValue("o_ETEmbryologist") && $this->ETEmbryologist->CurrentValue != $this->ETEmbryologist->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ETDate") && $CurrentForm->hasValue("o_ETDate") && $this->ETDate->CurrentValue != $this->ETDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Day1End") && $CurrentForm->hasValue("o_Day1End") && $this->Day1End->CurrentValue != $this->Day1End->OldValue) {
            return false;
        }
        return true;
    }

    // Validate grid form
    public function validateGridForm()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }

        // Validate all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } elseif (!$this->validateForm()) {
                    return false;
                }
            }
        }
        return true;
    }

    // Get all form values of the grid
    public function getGridFormValues()
    {
        global $CurrentForm;
        // Get row count
        $CurrentForm->Index = -1;
        $rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
        if ($rowcnt == "" || !is_numeric($rowcnt)) {
            $rowcnt = 0;
        }
        $rows = [];

        // Loop through all records
        for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
            // Load current row values
            $CurrentForm->Index = $rowindex;
            $rowaction = strval($CurrentForm->getValue($this->FormActionName));
            if ($rowaction != "delete" && $rowaction != "insertdelete") {
                $this->loadFormValues(); // Get form values
                if ($rowaction == "insert" && $this->emptyRow()) {
                    // Ignore
                } else {
                    $rows[] = $this->getFieldValues("FormValue"); // Return row as array
                }
            }
        }
        return $rows; // Return as array of array
    }

    // Restore form values for current row
    public function restoreCurrentRowFormValues($idx)
    {
        global $CurrentForm;

        // Get row based on current index
        $CurrentForm->Index = $idx;
        $rowaction = strval($CurrentForm->getValue($this->FormActionName));
        $this->loadFormValues(); // Load form values
        // Set up invalid status correctly
        $this->resetFormError();
        if ($rowaction == "insert" && $this->emptyRow()) {
            // Ignore
        } else {
            $this->validateForm();
        }
    }

    // Reset form status
    public function resetFormError()
    {
        $this->id->clearErrorMessage();
        $this->RIDNo->clearErrorMessage();
        $this->Name->clearErrorMessage();
        $this->ARTCycle->clearErrorMessage();
        $this->SpermOrigin->clearErrorMessage();
        $this->InseminatinTechnique->clearErrorMessage();
        $this->IndicationForART->clearErrorMessage();
        $this->Day0sino->clearErrorMessage();
        $this->Day0OocyteStage->clearErrorMessage();
        $this->Day0PolarBodyPosition->clearErrorMessage();
        $this->Day0Breakage->clearErrorMessage();
        $this->Day0Attempts->clearErrorMessage();
        $this->Day0SPZMorpho->clearErrorMessage();
        $this->Day0SPZLocation->clearErrorMessage();
        $this->Day0SpOrgin->clearErrorMessage();
        $this->Day5Cryoptop->clearErrorMessage();
        $this->Day1Sperm->clearErrorMessage();
        $this->Day1PN->clearErrorMessage();
        $this->Day1PB->clearErrorMessage();
        $this->Day1Pronucleus->clearErrorMessage();
        $this->Day1Nucleolus->clearErrorMessage();
        $this->Day1Halo->clearErrorMessage();
        $this->Day2SiNo->clearErrorMessage();
        $this->Day2CellNo->clearErrorMessage();
        $this->Day2Frag->clearErrorMessage();
        $this->Day2Symmetry->clearErrorMessage();
        $this->Day2Cryoptop->clearErrorMessage();
        $this->Day2Grade->clearErrorMessage();
        $this->Day2End->clearErrorMessage();
        $this->Day3Sino->clearErrorMessage();
        $this->Day3CellNo->clearErrorMessage();
        $this->Day3Frag->clearErrorMessage();
        $this->Day3Symmetry->clearErrorMessage();
        $this->Day3ZP->clearErrorMessage();
        $this->Day3Vacoules->clearErrorMessage();
        $this->Day3Grade->clearErrorMessage();
        $this->Day3Cryoptop->clearErrorMessage();
        $this->Day3End->clearErrorMessage();
        $this->Day4SiNo->clearErrorMessage();
        $this->Day4CellNo->clearErrorMessage();
        $this->Day4Frag->clearErrorMessage();
        $this->Day4Symmetry->clearErrorMessage();
        $this->Day4Grade->clearErrorMessage();
        $this->Day4Cryoptop->clearErrorMessage();
        $this->Day4End->clearErrorMessage();
        $this->Day5CellNo->clearErrorMessage();
        $this->Day5ICM->clearErrorMessage();
        $this->Day5TE->clearErrorMessage();
        $this->Day5Observation->clearErrorMessage();
        $this->Day5Collapsed->clearErrorMessage();
        $this->Day5Vacoulles->clearErrorMessage();
        $this->Day5Grade->clearErrorMessage();
        $this->Day6CellNo->clearErrorMessage();
        $this->Day6ICM->clearErrorMessage();
        $this->Day6TE->clearErrorMessage();
        $this->Day6Observation->clearErrorMessage();
        $this->Day6Collapsed->clearErrorMessage();
        $this->Day6Vacoulles->clearErrorMessage();
        $this->Day6Grade->clearErrorMessage();
        $this->Day6Cryoptop->clearErrorMessage();
        $this->EndSiNo->clearErrorMessage();
        $this->EndingDay->clearErrorMessage();
        $this->EndingCellStage->clearErrorMessage();
        $this->EndingGrade->clearErrorMessage();
        $this->EndingState->clearErrorMessage();
        $this->TidNo->clearErrorMessage();
        $this->DidNO->clearErrorMessage();
        $this->ICSiIVFDateTime->clearErrorMessage();
        $this->PrimaryEmbrologist->clearErrorMessage();
        $this->SecondaryEmbrologist->clearErrorMessage();
        $this->Incubator->clearErrorMessage();
        $this->location->clearErrorMessage();
        $this->OocyteNo->clearErrorMessage();
        $this->Stage->clearErrorMessage();
        $this->Remarks->clearErrorMessage();
        $this->vitrificationDate->clearErrorMessage();
        $this->vitriPrimaryEmbryologist->clearErrorMessage();
        $this->vitriSecondaryEmbryologist->clearErrorMessage();
        $this->vitriEmbryoNo->clearErrorMessage();
        $this->thawReFrozen->clearErrorMessage();
        $this->vitriFertilisationDate->clearErrorMessage();
        $this->vitriDay->clearErrorMessage();
        $this->vitriStage->clearErrorMessage();
        $this->vitriGrade->clearErrorMessage();
        $this->vitriIncubator->clearErrorMessage();
        $this->vitriTank->clearErrorMessage();
        $this->vitriCanister->clearErrorMessage();
        $this->vitriGobiet->clearErrorMessage();
        $this->vitriViscotube->clearErrorMessage();
        $this->vitriCryolockNo->clearErrorMessage();
        $this->vitriCryolockColour->clearErrorMessage();
        $this->thawDate->clearErrorMessage();
        $this->thawPrimaryEmbryologist->clearErrorMessage();
        $this->thawSecondaryEmbryologist->clearErrorMessage();
        $this->thawET->clearErrorMessage();
        $this->thawAbserve->clearErrorMessage();
        $this->thawDiscard->clearErrorMessage();
        $this->ETCatheter->clearErrorMessage();
        $this->ETDifficulty->clearErrorMessage();
        $this->ETEasy->clearErrorMessage();
        $this->ETComments->clearErrorMessage();
        $this->ETDoctor->clearErrorMessage();
        $this->ETEmbryologist->clearErrorMessage();
        $this->ETDate->clearErrorMessage();
        $this->Day1End->clearErrorMessage();
    }

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";

        // Load server side filters
        if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile)) {
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_embryology_chartlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->ARTCycle->AdvancedSearch->toJson(), ","); // Field ARTCycle
        $filterList = Concat($filterList, $this->SpermOrigin->AdvancedSearch->toJson(), ","); // Field SpermOrigin
        $filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
        $filterList = Concat($filterList, $this->IndicationForART->AdvancedSearch->toJson(), ","); // Field IndicationForART
        $filterList = Concat($filterList, $this->Day0sino->AdvancedSearch->toJson(), ","); // Field Day0sino
        $filterList = Concat($filterList, $this->Day0OocyteStage->AdvancedSearch->toJson(), ","); // Field Day0OocyteStage
        $filterList = Concat($filterList, $this->Day0PolarBodyPosition->AdvancedSearch->toJson(), ","); // Field Day0PolarBodyPosition
        $filterList = Concat($filterList, $this->Day0Breakage->AdvancedSearch->toJson(), ","); // Field Day0Breakage
        $filterList = Concat($filterList, $this->Day0Attempts->AdvancedSearch->toJson(), ","); // Field Day0Attempts
        $filterList = Concat($filterList, $this->Day0SPZMorpho->AdvancedSearch->toJson(), ","); // Field Day0SPZMorpho
        $filterList = Concat($filterList, $this->Day0SPZLocation->AdvancedSearch->toJson(), ","); // Field Day0SPZLocation
        $filterList = Concat($filterList, $this->Day0SpOrgin->AdvancedSearch->toJson(), ","); // Field Day0SpOrgin
        $filterList = Concat($filterList, $this->Day5Cryoptop->AdvancedSearch->toJson(), ","); // Field Day5Cryoptop
        $filterList = Concat($filterList, $this->Day1Sperm->AdvancedSearch->toJson(), ","); // Field Day1Sperm
        $filterList = Concat($filterList, $this->Day1PN->AdvancedSearch->toJson(), ","); // Field Day1PN
        $filterList = Concat($filterList, $this->Day1PB->AdvancedSearch->toJson(), ","); // Field Day1PB
        $filterList = Concat($filterList, $this->Day1Pronucleus->AdvancedSearch->toJson(), ","); // Field Day1Pronucleus
        $filterList = Concat($filterList, $this->Day1Nucleolus->AdvancedSearch->toJson(), ","); // Field Day1Nucleolus
        $filterList = Concat($filterList, $this->Day1Halo->AdvancedSearch->toJson(), ","); // Field Day1Halo
        $filterList = Concat($filterList, $this->Day2SiNo->AdvancedSearch->toJson(), ","); // Field Day2SiNo
        $filterList = Concat($filterList, $this->Day2CellNo->AdvancedSearch->toJson(), ","); // Field Day2CellNo
        $filterList = Concat($filterList, $this->Day2Frag->AdvancedSearch->toJson(), ","); // Field Day2Frag
        $filterList = Concat($filterList, $this->Day2Symmetry->AdvancedSearch->toJson(), ","); // Field Day2Symmetry
        $filterList = Concat($filterList, $this->Day2Cryoptop->AdvancedSearch->toJson(), ","); // Field Day2Cryoptop
        $filterList = Concat($filterList, $this->Day2Grade->AdvancedSearch->toJson(), ","); // Field Day2Grade
        $filterList = Concat($filterList, $this->Day2End->AdvancedSearch->toJson(), ","); // Field Day2End
        $filterList = Concat($filterList, $this->Day3Sino->AdvancedSearch->toJson(), ","); // Field Day3Sino
        $filterList = Concat($filterList, $this->Day3CellNo->AdvancedSearch->toJson(), ","); // Field Day3CellNo
        $filterList = Concat($filterList, $this->Day3Frag->AdvancedSearch->toJson(), ","); // Field Day3Frag
        $filterList = Concat($filterList, $this->Day3Symmetry->AdvancedSearch->toJson(), ","); // Field Day3Symmetry
        $filterList = Concat($filterList, $this->Day3ZP->AdvancedSearch->toJson(), ","); // Field Day3ZP
        $filterList = Concat($filterList, $this->Day3Vacoules->AdvancedSearch->toJson(), ","); // Field Day3Vacoules
        $filterList = Concat($filterList, $this->Day3Grade->AdvancedSearch->toJson(), ","); // Field Day3Grade
        $filterList = Concat($filterList, $this->Day3Cryoptop->AdvancedSearch->toJson(), ","); // Field Day3Cryoptop
        $filterList = Concat($filterList, $this->Day3End->AdvancedSearch->toJson(), ","); // Field Day3End
        $filterList = Concat($filterList, $this->Day4SiNo->AdvancedSearch->toJson(), ","); // Field Day4SiNo
        $filterList = Concat($filterList, $this->Day4CellNo->AdvancedSearch->toJson(), ","); // Field Day4CellNo
        $filterList = Concat($filterList, $this->Day4Frag->AdvancedSearch->toJson(), ","); // Field Day4Frag
        $filterList = Concat($filterList, $this->Day4Symmetry->AdvancedSearch->toJson(), ","); // Field Day4Symmetry
        $filterList = Concat($filterList, $this->Day4Grade->AdvancedSearch->toJson(), ","); // Field Day4Grade
        $filterList = Concat($filterList, $this->Day4Cryoptop->AdvancedSearch->toJson(), ","); // Field Day4Cryoptop
        $filterList = Concat($filterList, $this->Day4End->AdvancedSearch->toJson(), ","); // Field Day4End
        $filterList = Concat($filterList, $this->Day5CellNo->AdvancedSearch->toJson(), ","); // Field Day5CellNo
        $filterList = Concat($filterList, $this->Day5ICM->AdvancedSearch->toJson(), ","); // Field Day5ICM
        $filterList = Concat($filterList, $this->Day5TE->AdvancedSearch->toJson(), ","); // Field Day5TE
        $filterList = Concat($filterList, $this->Day5Observation->AdvancedSearch->toJson(), ","); // Field Day5Observation
        $filterList = Concat($filterList, $this->Day5Collapsed->AdvancedSearch->toJson(), ","); // Field Day5Collapsed
        $filterList = Concat($filterList, $this->Day5Vacoulles->AdvancedSearch->toJson(), ","); // Field Day5Vacoulles
        $filterList = Concat($filterList, $this->Day5Grade->AdvancedSearch->toJson(), ","); // Field Day5Grade
        $filterList = Concat($filterList, $this->Day6CellNo->AdvancedSearch->toJson(), ","); // Field Day6CellNo
        $filterList = Concat($filterList, $this->Day6ICM->AdvancedSearch->toJson(), ","); // Field Day6ICM
        $filterList = Concat($filterList, $this->Day6TE->AdvancedSearch->toJson(), ","); // Field Day6TE
        $filterList = Concat($filterList, $this->Day6Observation->AdvancedSearch->toJson(), ","); // Field Day6Observation
        $filterList = Concat($filterList, $this->Day6Collapsed->AdvancedSearch->toJson(), ","); // Field Day6Collapsed
        $filterList = Concat($filterList, $this->Day6Vacoulles->AdvancedSearch->toJson(), ","); // Field Day6Vacoulles
        $filterList = Concat($filterList, $this->Day6Grade->AdvancedSearch->toJson(), ","); // Field Day6Grade
        $filterList = Concat($filterList, $this->Day6Cryoptop->AdvancedSearch->toJson(), ","); // Field Day6Cryoptop
        $filterList = Concat($filterList, $this->EndSiNo->AdvancedSearch->toJson(), ","); // Field EndSiNo
        $filterList = Concat($filterList, $this->EndingDay->AdvancedSearch->toJson(), ","); // Field EndingDay
        $filterList = Concat($filterList, $this->EndingCellStage->AdvancedSearch->toJson(), ","); // Field EndingCellStage
        $filterList = Concat($filterList, $this->EndingGrade->AdvancedSearch->toJson(), ","); // Field EndingGrade
        $filterList = Concat($filterList, $this->EndingState->AdvancedSearch->toJson(), ","); // Field EndingState
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->DidNO->AdvancedSearch->toJson(), ","); // Field DidNO
        $filterList = Concat($filterList, $this->ICSiIVFDateTime->AdvancedSearch->toJson(), ","); // Field ICSiIVFDateTime
        $filterList = Concat($filterList, $this->PrimaryEmbrologist->AdvancedSearch->toJson(), ","); // Field PrimaryEmbrologist
        $filterList = Concat($filterList, $this->SecondaryEmbrologist->AdvancedSearch->toJson(), ","); // Field SecondaryEmbrologist
        $filterList = Concat($filterList, $this->Incubator->AdvancedSearch->toJson(), ","); // Field Incubator
        $filterList = Concat($filterList, $this->location->AdvancedSearch->toJson(), ","); // Field location
        $filterList = Concat($filterList, $this->OocyteNo->AdvancedSearch->toJson(), ","); // Field OocyteNo
        $filterList = Concat($filterList, $this->Stage->AdvancedSearch->toJson(), ","); // Field Stage
        $filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
        $filterList = Concat($filterList, $this->vitrificationDate->AdvancedSearch->toJson(), ","); // Field vitrificationDate
        $filterList = Concat($filterList, $this->vitriPrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field vitriPrimaryEmbryologist
        $filterList = Concat($filterList, $this->vitriSecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field vitriSecondaryEmbryologist
        $filterList = Concat($filterList, $this->vitriEmbryoNo->AdvancedSearch->toJson(), ","); // Field vitriEmbryoNo
        $filterList = Concat($filterList, $this->thawReFrozen->AdvancedSearch->toJson(), ","); // Field thawReFrozen
        $filterList = Concat($filterList, $this->vitriFertilisationDate->AdvancedSearch->toJson(), ","); // Field vitriFertilisationDate
        $filterList = Concat($filterList, $this->vitriDay->AdvancedSearch->toJson(), ","); // Field vitriDay
        $filterList = Concat($filterList, $this->vitriStage->AdvancedSearch->toJson(), ","); // Field vitriStage
        $filterList = Concat($filterList, $this->vitriGrade->AdvancedSearch->toJson(), ","); // Field vitriGrade
        $filterList = Concat($filterList, $this->vitriIncubator->AdvancedSearch->toJson(), ","); // Field vitriIncubator
        $filterList = Concat($filterList, $this->vitriTank->AdvancedSearch->toJson(), ","); // Field vitriTank
        $filterList = Concat($filterList, $this->vitriCanister->AdvancedSearch->toJson(), ","); // Field vitriCanister
        $filterList = Concat($filterList, $this->vitriGobiet->AdvancedSearch->toJson(), ","); // Field vitriGobiet
        $filterList = Concat($filterList, $this->vitriViscotube->AdvancedSearch->toJson(), ","); // Field vitriViscotube
        $filterList = Concat($filterList, $this->vitriCryolockNo->AdvancedSearch->toJson(), ","); // Field vitriCryolockNo
        $filterList = Concat($filterList, $this->vitriCryolockColour->AdvancedSearch->toJson(), ","); // Field vitriCryolockColour
        $filterList = Concat($filterList, $this->thawDate->AdvancedSearch->toJson(), ","); // Field thawDate
        $filterList = Concat($filterList, $this->thawPrimaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawPrimaryEmbryologist
        $filterList = Concat($filterList, $this->thawSecondaryEmbryologist->AdvancedSearch->toJson(), ","); // Field thawSecondaryEmbryologist
        $filterList = Concat($filterList, $this->thawET->AdvancedSearch->toJson(), ","); // Field thawET
        $filterList = Concat($filterList, $this->thawAbserve->AdvancedSearch->toJson(), ","); // Field thawAbserve
        $filterList = Concat($filterList, $this->thawDiscard->AdvancedSearch->toJson(), ","); // Field thawDiscard
        $filterList = Concat($filterList, $this->ETCatheter->AdvancedSearch->toJson(), ","); // Field ETCatheter
        $filterList = Concat($filterList, $this->ETDifficulty->AdvancedSearch->toJson(), ","); // Field ETDifficulty
        $filterList = Concat($filterList, $this->ETEasy->AdvancedSearch->toJson(), ","); // Field ETEasy
        $filterList = Concat($filterList, $this->ETComments->AdvancedSearch->toJson(), ","); // Field ETComments
        $filterList = Concat($filterList, $this->ETDoctor->AdvancedSearch->toJson(), ","); // Field ETDoctor
        $filterList = Concat($filterList, $this->ETEmbryologist->AdvancedSearch->toJson(), ","); // Field ETEmbryologist
        $filterList = Concat($filterList, $this->ETDate->AdvancedSearch->toJson(), ","); // Field ETDate
        $filterList = Concat($filterList, $this->Day1End->AdvancedSearch->toJson(), ","); // Field Day1End
        if ($this->BasicSearch->Keyword != "") {
            $wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
            $filterList = Concat($filterList, $wrk, ",");
        }

        // Return filter list in JSON
        if ($filterList != "") {
            $filterList = "\"data\":{" . $filterList . "}";
        }
        if ($savedFilterList != "") {
            $filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
        }
        return ($filterList != "") ? "{" . $filterList . "}" : "null";
    }

    // Process filter list
    protected function processFilterList()
    {
        global $UserProfile;
        if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
            $filters = Post("filters");
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_embryology_chartlistsrch", $filters);
            WriteJson([["success" => true]]); // Success
            return true;
        } elseif (Post("cmd") == "resetfilter") {
            $this->restoreFilterList();
        }
        return false;
    }

    // Restore list of filters
    protected function restoreFilterList()
    {
        // Return if not reset filter
        if (Post("cmd") !== "resetfilter") {
            return false;
        }
        $filter = json_decode(Post("filter"), true);
        $this->Command = "search";

        // Field id
        $this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
        $this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
        $this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
        $this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
        $this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
        $this->id->AdvancedSearch->save();

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field ARTCycle
        $this->ARTCycle->AdvancedSearch->SearchValue = @$filter["x_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator = @$filter["z_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchCondition = @$filter["v_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchValue2 = @$filter["y_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->save();

        // Field SpermOrigin
        $this->SpermOrigin->AdvancedSearch->SearchValue = @$filter["x_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchOperator = @$filter["z_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchCondition = @$filter["v_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchValue2 = @$filter["y_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->SearchOperator2 = @$filter["w_SpermOrigin"];
        $this->SpermOrigin->AdvancedSearch->save();

        // Field InseminatinTechnique
        $this->InseminatinTechnique->AdvancedSearch->SearchValue = @$filter["x_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator = @$filter["z_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchCondition = @$filter["v_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchValue2 = @$filter["y_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator2 = @$filter["w_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->save();

        // Field IndicationForART
        $this->IndicationForART->AdvancedSearch->SearchValue = @$filter["x_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchOperator = @$filter["z_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchCondition = @$filter["v_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchValue2 = @$filter["y_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->SearchOperator2 = @$filter["w_IndicationForART"];
        $this->IndicationForART->AdvancedSearch->save();

        // Field Day0sino
        $this->Day0sino->AdvancedSearch->SearchValue = @$filter["x_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchOperator = @$filter["z_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchCondition = @$filter["v_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchValue2 = @$filter["y_Day0sino"];
        $this->Day0sino->AdvancedSearch->SearchOperator2 = @$filter["w_Day0sino"];
        $this->Day0sino->AdvancedSearch->save();

        // Field Day0OocyteStage
        $this->Day0OocyteStage->AdvancedSearch->SearchValue = @$filter["x_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchOperator = @$filter["z_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchCondition = @$filter["v_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchValue2 = @$filter["y_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->SearchOperator2 = @$filter["w_Day0OocyteStage"];
        $this->Day0OocyteStage->AdvancedSearch->save();

        // Field Day0PolarBodyPosition
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchValue = @$filter["x_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchOperator = @$filter["z_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchCondition = @$filter["v_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchValue2 = @$filter["y_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->SearchOperator2 = @$filter["w_Day0PolarBodyPosition"];
        $this->Day0PolarBodyPosition->AdvancedSearch->save();

        // Field Day0Breakage
        $this->Day0Breakage->AdvancedSearch->SearchValue = @$filter["x_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchOperator = @$filter["z_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchCondition = @$filter["v_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchValue2 = @$filter["y_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->SearchOperator2 = @$filter["w_Day0Breakage"];
        $this->Day0Breakage->AdvancedSearch->save();

        // Field Day0Attempts
        $this->Day0Attempts->AdvancedSearch->SearchValue = @$filter["x_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchOperator = @$filter["z_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchCondition = @$filter["v_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchValue2 = @$filter["y_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->SearchOperator2 = @$filter["w_Day0Attempts"];
        $this->Day0Attempts->AdvancedSearch->save();

        // Field Day0SPZMorpho
        $this->Day0SPZMorpho->AdvancedSearch->SearchValue = @$filter["x_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchOperator = @$filter["z_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchCondition = @$filter["v_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchValue2 = @$filter["y_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SPZMorpho"];
        $this->Day0SPZMorpho->AdvancedSearch->save();

        // Field Day0SPZLocation
        $this->Day0SPZLocation->AdvancedSearch->SearchValue = @$filter["x_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchOperator = @$filter["z_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchCondition = @$filter["v_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchValue2 = @$filter["y_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SPZLocation"];
        $this->Day0SPZLocation->AdvancedSearch->save();

        // Field Day0SpOrgin
        $this->Day0SpOrgin->AdvancedSearch->SearchValue = @$filter["x_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchOperator = @$filter["z_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchCondition = @$filter["v_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchValue2 = @$filter["y_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_Day0SpOrgin"];
        $this->Day0SpOrgin->AdvancedSearch->save();

        // Field Day5Cryoptop
        $this->Day5Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Cryoptop"];
        $this->Day5Cryoptop->AdvancedSearch->save();

        // Field Day1Sperm
        $this->Day1Sperm->AdvancedSearch->SearchValue = @$filter["x_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchOperator = @$filter["z_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchCondition = @$filter["v_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchValue2 = @$filter["y_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Sperm"];
        $this->Day1Sperm->AdvancedSearch->save();

        // Field Day1PN
        $this->Day1PN->AdvancedSearch->SearchValue = @$filter["x_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchOperator = @$filter["z_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchCondition = @$filter["v_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchValue2 = @$filter["y_Day1PN"];
        $this->Day1PN->AdvancedSearch->SearchOperator2 = @$filter["w_Day1PN"];
        $this->Day1PN->AdvancedSearch->save();

        // Field Day1PB
        $this->Day1PB->AdvancedSearch->SearchValue = @$filter["x_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchOperator = @$filter["z_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchCondition = @$filter["v_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchValue2 = @$filter["y_Day1PB"];
        $this->Day1PB->AdvancedSearch->SearchOperator2 = @$filter["w_Day1PB"];
        $this->Day1PB->AdvancedSearch->save();

        // Field Day1Pronucleus
        $this->Day1Pronucleus->AdvancedSearch->SearchValue = @$filter["x_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchOperator = @$filter["z_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchCondition = @$filter["v_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchValue2 = @$filter["y_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Pronucleus"];
        $this->Day1Pronucleus->AdvancedSearch->save();

        // Field Day1Nucleolus
        $this->Day1Nucleolus->AdvancedSearch->SearchValue = @$filter["x_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchOperator = @$filter["z_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchCondition = @$filter["v_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchValue2 = @$filter["y_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Nucleolus"];
        $this->Day1Nucleolus->AdvancedSearch->save();

        // Field Day1Halo
        $this->Day1Halo->AdvancedSearch->SearchValue = @$filter["x_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchOperator = @$filter["z_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchCondition = @$filter["v_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchValue2 = @$filter["y_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->SearchOperator2 = @$filter["w_Day1Halo"];
        $this->Day1Halo->AdvancedSearch->save();

        // Field Day2SiNo
        $this->Day2SiNo->AdvancedSearch->SearchValue = @$filter["x_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchOperator = @$filter["z_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchCondition = @$filter["v_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchValue2 = @$filter["y_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day2SiNo"];
        $this->Day2SiNo->AdvancedSearch->save();

        // Field Day2CellNo
        $this->Day2CellNo->AdvancedSearch->SearchValue = @$filter["x_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day2CellNo"];
        $this->Day2CellNo->AdvancedSearch->save();

        // Field Day2Frag
        $this->Day2Frag->AdvancedSearch->SearchValue = @$filter["x_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchOperator = @$filter["z_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchCondition = @$filter["v_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Frag"];
        $this->Day2Frag->AdvancedSearch->save();

        // Field Day2Symmetry
        $this->Day2Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Symmetry"];
        $this->Day2Symmetry->AdvancedSearch->save();

        // Field Day2Cryoptop
        $this->Day2Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Cryoptop"];
        $this->Day2Cryoptop->AdvancedSearch->save();

        // Field Day2Grade
        $this->Day2Grade->AdvancedSearch->SearchValue = @$filter["x_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchOperator = @$filter["z_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchCondition = @$filter["v_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day2Grade"];
        $this->Day2Grade->AdvancedSearch->save();

        // Field Day2End
        $this->Day2End->AdvancedSearch->SearchValue = @$filter["x_Day2End"];
        $this->Day2End->AdvancedSearch->SearchOperator = @$filter["z_Day2End"];
        $this->Day2End->AdvancedSearch->SearchCondition = @$filter["v_Day2End"];
        $this->Day2End->AdvancedSearch->SearchValue2 = @$filter["y_Day2End"];
        $this->Day2End->AdvancedSearch->SearchOperator2 = @$filter["w_Day2End"];
        $this->Day2End->AdvancedSearch->save();

        // Field Day3Sino
        $this->Day3Sino->AdvancedSearch->SearchValue = @$filter["x_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchOperator = @$filter["z_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchCondition = @$filter["v_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchValue2 = @$filter["y_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Sino"];
        $this->Day3Sino->AdvancedSearch->save();

        // Field Day3CellNo
        $this->Day3CellNo->AdvancedSearch->SearchValue = @$filter["x_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day3CellNo"];
        $this->Day3CellNo->AdvancedSearch->save();

        // Field Day3Frag
        $this->Day3Frag->AdvancedSearch->SearchValue = @$filter["x_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchOperator = @$filter["z_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchCondition = @$filter["v_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Frag"];
        $this->Day3Frag->AdvancedSearch->save();

        // Field Day3Symmetry
        $this->Day3Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Symmetry"];
        $this->Day3Symmetry->AdvancedSearch->save();

        // Field Day3ZP
        $this->Day3ZP->AdvancedSearch->SearchValue = @$filter["x_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchOperator = @$filter["z_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchCondition = @$filter["v_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchValue2 = @$filter["y_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->SearchOperator2 = @$filter["w_Day3ZP"];
        $this->Day3ZP->AdvancedSearch->save();

        // Field Day3Vacoules
        $this->Day3Vacoules->AdvancedSearch->SearchValue = @$filter["x_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchOperator = @$filter["z_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchCondition = @$filter["v_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchValue2 = @$filter["y_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Vacoules"];
        $this->Day3Vacoules->AdvancedSearch->save();

        // Field Day3Grade
        $this->Day3Grade->AdvancedSearch->SearchValue = @$filter["x_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchOperator = @$filter["z_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchCondition = @$filter["v_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Grade"];
        $this->Day3Grade->AdvancedSearch->save();

        // Field Day3Cryoptop
        $this->Day3Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day3Cryoptop"];
        $this->Day3Cryoptop->AdvancedSearch->save();

        // Field Day3End
        $this->Day3End->AdvancedSearch->SearchValue = @$filter["x_Day3End"];
        $this->Day3End->AdvancedSearch->SearchOperator = @$filter["z_Day3End"];
        $this->Day3End->AdvancedSearch->SearchCondition = @$filter["v_Day3End"];
        $this->Day3End->AdvancedSearch->SearchValue2 = @$filter["y_Day3End"];
        $this->Day3End->AdvancedSearch->SearchOperator2 = @$filter["w_Day3End"];
        $this->Day3End->AdvancedSearch->save();

        // Field Day4SiNo
        $this->Day4SiNo->AdvancedSearch->SearchValue = @$filter["x_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchOperator = @$filter["z_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchCondition = @$filter["v_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchValue2 = @$filter["y_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day4SiNo"];
        $this->Day4SiNo->AdvancedSearch->save();

        // Field Day4CellNo
        $this->Day4CellNo->AdvancedSearch->SearchValue = @$filter["x_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day4CellNo"];
        $this->Day4CellNo->AdvancedSearch->save();

        // Field Day4Frag
        $this->Day4Frag->AdvancedSearch->SearchValue = @$filter["x_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchOperator = @$filter["z_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchCondition = @$filter["v_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchValue2 = @$filter["y_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Frag"];
        $this->Day4Frag->AdvancedSearch->save();

        // Field Day4Symmetry
        $this->Day4Symmetry->AdvancedSearch->SearchValue = @$filter["x_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchOperator = @$filter["z_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchCondition = @$filter["v_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchValue2 = @$filter["y_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Symmetry"];
        $this->Day4Symmetry->AdvancedSearch->save();

        // Field Day4Grade
        $this->Day4Grade->AdvancedSearch->SearchValue = @$filter["x_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchOperator = @$filter["z_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchCondition = @$filter["v_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Grade"];
        $this->Day4Grade->AdvancedSearch->save();

        // Field Day4Cryoptop
        $this->Day4Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day4Cryoptop"];
        $this->Day4Cryoptop->AdvancedSearch->save();

        // Field Day4End
        $this->Day4End->AdvancedSearch->SearchValue = @$filter["x_Day4End"];
        $this->Day4End->AdvancedSearch->SearchOperator = @$filter["z_Day4End"];
        $this->Day4End->AdvancedSearch->SearchCondition = @$filter["v_Day4End"];
        $this->Day4End->AdvancedSearch->SearchValue2 = @$filter["y_Day4End"];
        $this->Day4End->AdvancedSearch->SearchOperator2 = @$filter["w_Day4End"];
        $this->Day4End->AdvancedSearch->save();

        // Field Day5CellNo
        $this->Day5CellNo->AdvancedSearch->SearchValue = @$filter["x_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day5CellNo"];
        $this->Day5CellNo->AdvancedSearch->save();

        // Field Day5ICM
        $this->Day5ICM->AdvancedSearch->SearchValue = @$filter["x_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchOperator = @$filter["z_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchCondition = @$filter["v_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchValue2 = @$filter["y_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->SearchOperator2 = @$filter["w_Day5ICM"];
        $this->Day5ICM->AdvancedSearch->save();

        // Field Day5TE
        $this->Day5TE->AdvancedSearch->SearchValue = @$filter["x_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchOperator = @$filter["z_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchCondition = @$filter["v_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchValue2 = @$filter["y_Day5TE"];
        $this->Day5TE->AdvancedSearch->SearchOperator2 = @$filter["w_Day5TE"];
        $this->Day5TE->AdvancedSearch->save();

        // Field Day5Observation
        $this->Day5Observation->AdvancedSearch->SearchValue = @$filter["x_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchOperator = @$filter["z_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchCondition = @$filter["v_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchValue2 = @$filter["y_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Observation"];
        $this->Day5Observation->AdvancedSearch->save();

        // Field Day5Collapsed
        $this->Day5Collapsed->AdvancedSearch->SearchValue = @$filter["x_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchOperator = @$filter["z_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchCondition = @$filter["v_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchValue2 = @$filter["y_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Collapsed"];
        $this->Day5Collapsed->AdvancedSearch->save();

        // Field Day5Vacoulles
        $this->Day5Vacoulles->AdvancedSearch->SearchValue = @$filter["x_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchOperator = @$filter["z_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchCondition = @$filter["v_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchValue2 = @$filter["y_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Vacoulles"];
        $this->Day5Vacoulles->AdvancedSearch->save();

        // Field Day5Grade
        $this->Day5Grade->AdvancedSearch->SearchValue = @$filter["x_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchOperator = @$filter["z_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchCondition = @$filter["v_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day5Grade"];
        $this->Day5Grade->AdvancedSearch->save();

        // Field Day6CellNo
        $this->Day6CellNo->AdvancedSearch->SearchValue = @$filter["x_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchOperator = @$filter["z_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchCondition = @$filter["v_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchValue2 = @$filter["y_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->SearchOperator2 = @$filter["w_Day6CellNo"];
        $this->Day6CellNo->AdvancedSearch->save();

        // Field Day6ICM
        $this->Day6ICM->AdvancedSearch->SearchValue = @$filter["x_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchOperator = @$filter["z_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchCondition = @$filter["v_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchValue2 = @$filter["y_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->SearchOperator2 = @$filter["w_Day6ICM"];
        $this->Day6ICM->AdvancedSearch->save();

        // Field Day6TE
        $this->Day6TE->AdvancedSearch->SearchValue = @$filter["x_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchOperator = @$filter["z_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchCondition = @$filter["v_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchValue2 = @$filter["y_Day6TE"];
        $this->Day6TE->AdvancedSearch->SearchOperator2 = @$filter["w_Day6TE"];
        $this->Day6TE->AdvancedSearch->save();

        // Field Day6Observation
        $this->Day6Observation->AdvancedSearch->SearchValue = @$filter["x_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchOperator = @$filter["z_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchCondition = @$filter["v_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchValue2 = @$filter["y_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Observation"];
        $this->Day6Observation->AdvancedSearch->save();

        // Field Day6Collapsed
        $this->Day6Collapsed->AdvancedSearch->SearchValue = @$filter["x_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchOperator = @$filter["z_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchCondition = @$filter["v_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchValue2 = @$filter["y_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Collapsed"];
        $this->Day6Collapsed->AdvancedSearch->save();

        // Field Day6Vacoulles
        $this->Day6Vacoulles->AdvancedSearch->SearchValue = @$filter["x_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchOperator = @$filter["z_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchCondition = @$filter["v_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchValue2 = @$filter["y_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Vacoulles"];
        $this->Day6Vacoulles->AdvancedSearch->save();

        // Field Day6Grade
        $this->Day6Grade->AdvancedSearch->SearchValue = @$filter["x_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchOperator = @$filter["z_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchCondition = @$filter["v_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchValue2 = @$filter["y_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Grade"];
        $this->Day6Grade->AdvancedSearch->save();

        // Field Day6Cryoptop
        $this->Day6Cryoptop->AdvancedSearch->SearchValue = @$filter["x_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchOperator = @$filter["z_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchCondition = @$filter["v_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchValue2 = @$filter["y_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->SearchOperator2 = @$filter["w_Day6Cryoptop"];
        $this->Day6Cryoptop->AdvancedSearch->save();

        // Field EndSiNo
        $this->EndSiNo->AdvancedSearch->SearchValue = @$filter["x_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchOperator = @$filter["z_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchCondition = @$filter["v_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchValue2 = @$filter["y_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->SearchOperator2 = @$filter["w_EndSiNo"];
        $this->EndSiNo->AdvancedSearch->save();

        // Field EndingDay
        $this->EndingDay->AdvancedSearch->SearchValue = @$filter["x_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchOperator = @$filter["z_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchCondition = @$filter["v_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchValue2 = @$filter["y_EndingDay"];
        $this->EndingDay->AdvancedSearch->SearchOperator2 = @$filter["w_EndingDay"];
        $this->EndingDay->AdvancedSearch->save();

        // Field EndingCellStage
        $this->EndingCellStage->AdvancedSearch->SearchValue = @$filter["x_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchOperator = @$filter["z_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchCondition = @$filter["v_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchValue2 = @$filter["y_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->SearchOperator2 = @$filter["w_EndingCellStage"];
        $this->EndingCellStage->AdvancedSearch->save();

        // Field EndingGrade
        $this->EndingGrade->AdvancedSearch->SearchValue = @$filter["x_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchOperator = @$filter["z_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchCondition = @$filter["v_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchValue2 = @$filter["y_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->SearchOperator2 = @$filter["w_EndingGrade"];
        $this->EndingGrade->AdvancedSearch->save();

        // Field EndingState
        $this->EndingState->AdvancedSearch->SearchValue = @$filter["x_EndingState"];
        $this->EndingState->AdvancedSearch->SearchOperator = @$filter["z_EndingState"];
        $this->EndingState->AdvancedSearch->SearchCondition = @$filter["v_EndingState"];
        $this->EndingState->AdvancedSearch->SearchValue2 = @$filter["y_EndingState"];
        $this->EndingState->AdvancedSearch->SearchOperator2 = @$filter["w_EndingState"];
        $this->EndingState->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field DidNO
        $this->DidNO->AdvancedSearch->SearchValue = @$filter["x_DidNO"];
        $this->DidNO->AdvancedSearch->SearchOperator = @$filter["z_DidNO"];
        $this->DidNO->AdvancedSearch->SearchCondition = @$filter["v_DidNO"];
        $this->DidNO->AdvancedSearch->SearchValue2 = @$filter["y_DidNO"];
        $this->DidNO->AdvancedSearch->SearchOperator2 = @$filter["w_DidNO"];
        $this->DidNO->AdvancedSearch->save();

        // Field ICSiIVFDateTime
        $this->ICSiIVFDateTime->AdvancedSearch->SearchValue = @$filter["x_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchOperator = @$filter["z_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchCondition = @$filter["v_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchValue2 = @$filter["y_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->SearchOperator2 = @$filter["w_ICSiIVFDateTime"];
        $this->ICSiIVFDateTime->AdvancedSearch->save();

        // Field PrimaryEmbrologist
        $this->PrimaryEmbrologist->AdvancedSearch->SearchValue = @$filter["x_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchOperator = @$filter["z_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchCondition = @$filter["v_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchValue2 = @$filter["y_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->SearchOperator2 = @$filter["w_PrimaryEmbrologist"];
        $this->PrimaryEmbrologist->AdvancedSearch->save();

        // Field SecondaryEmbrologist
        $this->SecondaryEmbrologist->AdvancedSearch->SearchValue = @$filter["x_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchOperator = @$filter["z_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchCondition = @$filter["v_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchValue2 = @$filter["y_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->SearchOperator2 = @$filter["w_SecondaryEmbrologist"];
        $this->SecondaryEmbrologist->AdvancedSearch->save();

        // Field Incubator
        $this->Incubator->AdvancedSearch->SearchValue = @$filter["x_Incubator"];
        $this->Incubator->AdvancedSearch->SearchOperator = @$filter["z_Incubator"];
        $this->Incubator->AdvancedSearch->SearchCondition = @$filter["v_Incubator"];
        $this->Incubator->AdvancedSearch->SearchValue2 = @$filter["y_Incubator"];
        $this->Incubator->AdvancedSearch->SearchOperator2 = @$filter["w_Incubator"];
        $this->Incubator->AdvancedSearch->save();

        // Field location
        $this->location->AdvancedSearch->SearchValue = @$filter["x_location"];
        $this->location->AdvancedSearch->SearchOperator = @$filter["z_location"];
        $this->location->AdvancedSearch->SearchCondition = @$filter["v_location"];
        $this->location->AdvancedSearch->SearchValue2 = @$filter["y_location"];
        $this->location->AdvancedSearch->SearchOperator2 = @$filter["w_location"];
        $this->location->AdvancedSearch->save();

        // Field OocyteNo
        $this->OocyteNo->AdvancedSearch->SearchValue = @$filter["x_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchOperator = @$filter["z_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchCondition = @$filter["v_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchValue2 = @$filter["y_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->SearchOperator2 = @$filter["w_OocyteNo"];
        $this->OocyteNo->AdvancedSearch->save();

        // Field Stage
        $this->Stage->AdvancedSearch->SearchValue = @$filter["x_Stage"];
        $this->Stage->AdvancedSearch->SearchOperator = @$filter["z_Stage"];
        $this->Stage->AdvancedSearch->SearchCondition = @$filter["v_Stage"];
        $this->Stage->AdvancedSearch->SearchValue2 = @$filter["y_Stage"];
        $this->Stage->AdvancedSearch->SearchOperator2 = @$filter["w_Stage"];
        $this->Stage->AdvancedSearch->save();

        // Field Remarks
        $this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
        $this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
        $this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
        $this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
        $this->Remarks->AdvancedSearch->save();

        // Field vitrificationDate
        $this->vitrificationDate->AdvancedSearch->SearchValue = @$filter["x_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchOperator = @$filter["z_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchCondition = @$filter["v_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchValue2 = @$filter["y_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->SearchOperator2 = @$filter["w_vitrificationDate"];
        $this->vitrificationDate->AdvancedSearch->save();

        // Field vitriPrimaryEmbryologist
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_vitriPrimaryEmbryologist"];
        $this->vitriPrimaryEmbryologist->AdvancedSearch->save();

        // Field vitriSecondaryEmbryologist
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_vitriSecondaryEmbryologist"];
        $this->vitriSecondaryEmbryologist->AdvancedSearch->save();

        // Field vitriEmbryoNo
        $this->vitriEmbryoNo->AdvancedSearch->SearchValue = @$filter["x_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchOperator = @$filter["z_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchCondition = @$filter["v_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchValue2 = @$filter["y_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->SearchOperator2 = @$filter["w_vitriEmbryoNo"];
        $this->vitriEmbryoNo->AdvancedSearch->save();

        // Field thawReFrozen
        $this->thawReFrozen->AdvancedSearch->SearchValue = @$filter["x_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchOperator = @$filter["z_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchCondition = @$filter["v_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchValue2 = @$filter["y_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->SearchOperator2 = @$filter["w_thawReFrozen"];
        $this->thawReFrozen->AdvancedSearch->save();

        // Field vitriFertilisationDate
        $this->vitriFertilisationDate->AdvancedSearch->SearchValue = @$filter["x_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchOperator = @$filter["z_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchCondition = @$filter["v_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchValue2 = @$filter["y_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->SearchOperator2 = @$filter["w_vitriFertilisationDate"];
        $this->vitriFertilisationDate->AdvancedSearch->save();

        // Field vitriDay
        $this->vitriDay->AdvancedSearch->SearchValue = @$filter["x_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchOperator = @$filter["z_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchCondition = @$filter["v_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchValue2 = @$filter["y_vitriDay"];
        $this->vitriDay->AdvancedSearch->SearchOperator2 = @$filter["w_vitriDay"];
        $this->vitriDay->AdvancedSearch->save();

        // Field vitriStage
        $this->vitriStage->AdvancedSearch->SearchValue = @$filter["x_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchOperator = @$filter["z_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchCondition = @$filter["v_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchValue2 = @$filter["y_vitriStage"];
        $this->vitriStage->AdvancedSearch->SearchOperator2 = @$filter["w_vitriStage"];
        $this->vitriStage->AdvancedSearch->save();

        // Field vitriGrade
        $this->vitriGrade->AdvancedSearch->SearchValue = @$filter["x_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchOperator = @$filter["z_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchCondition = @$filter["v_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchValue2 = @$filter["y_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->SearchOperator2 = @$filter["w_vitriGrade"];
        $this->vitriGrade->AdvancedSearch->save();

        // Field vitriIncubator
        $this->vitriIncubator->AdvancedSearch->SearchValue = @$filter["x_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchOperator = @$filter["z_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchCondition = @$filter["v_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchValue2 = @$filter["y_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->SearchOperator2 = @$filter["w_vitriIncubator"];
        $this->vitriIncubator->AdvancedSearch->save();

        // Field vitriTank
        $this->vitriTank->AdvancedSearch->SearchValue = @$filter["x_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchOperator = @$filter["z_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchCondition = @$filter["v_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchValue2 = @$filter["y_vitriTank"];
        $this->vitriTank->AdvancedSearch->SearchOperator2 = @$filter["w_vitriTank"];
        $this->vitriTank->AdvancedSearch->save();

        // Field vitriCanister
        $this->vitriCanister->AdvancedSearch->SearchValue = @$filter["x_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchOperator = @$filter["z_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchCondition = @$filter["v_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchValue2 = @$filter["y_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCanister"];
        $this->vitriCanister->AdvancedSearch->save();

        // Field vitriGobiet
        $this->vitriGobiet->AdvancedSearch->SearchValue = @$filter["x_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchOperator = @$filter["z_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchCondition = @$filter["v_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchValue2 = @$filter["y_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->SearchOperator2 = @$filter["w_vitriGobiet"];
        $this->vitriGobiet->AdvancedSearch->save();

        // Field vitriViscotube
        $this->vitriViscotube->AdvancedSearch->SearchValue = @$filter["x_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchOperator = @$filter["z_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchCondition = @$filter["v_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchValue2 = @$filter["y_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->SearchOperator2 = @$filter["w_vitriViscotube"];
        $this->vitriViscotube->AdvancedSearch->save();

        // Field vitriCryolockNo
        $this->vitriCryolockNo->AdvancedSearch->SearchValue = @$filter["x_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchOperator = @$filter["z_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchCondition = @$filter["v_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchValue2 = @$filter["y_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCryolockNo"];
        $this->vitriCryolockNo->AdvancedSearch->save();

        // Field vitriCryolockColour
        $this->vitriCryolockColour->AdvancedSearch->SearchValue = @$filter["x_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchOperator = @$filter["z_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchCondition = @$filter["v_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchValue2 = @$filter["y_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->SearchOperator2 = @$filter["w_vitriCryolockColour"];
        $this->vitriCryolockColour->AdvancedSearch->save();

        // Field thawDate
        $this->thawDate->AdvancedSearch->SearchValue = @$filter["x_thawDate"];
        $this->thawDate->AdvancedSearch->SearchOperator = @$filter["z_thawDate"];
        $this->thawDate->AdvancedSearch->SearchCondition = @$filter["v_thawDate"];
        $this->thawDate->AdvancedSearch->SearchValue2 = @$filter["y_thawDate"];
        $this->thawDate->AdvancedSearch->SearchOperator2 = @$filter["w_thawDate"];
        $this->thawDate->AdvancedSearch->save();

        // Field thawPrimaryEmbryologist
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawPrimaryEmbryologist"];
        $this->thawPrimaryEmbryologist->AdvancedSearch->save();

        // Field thawSecondaryEmbryologist
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue = @$filter["x_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_thawSecondaryEmbryologist"];
        $this->thawSecondaryEmbryologist->AdvancedSearch->save();

        // Field thawET
        $this->thawET->AdvancedSearch->SearchValue = @$filter["x_thawET"];
        $this->thawET->AdvancedSearch->SearchOperator = @$filter["z_thawET"];
        $this->thawET->AdvancedSearch->SearchCondition = @$filter["v_thawET"];
        $this->thawET->AdvancedSearch->SearchValue2 = @$filter["y_thawET"];
        $this->thawET->AdvancedSearch->SearchOperator2 = @$filter["w_thawET"];
        $this->thawET->AdvancedSearch->save();

        // Field thawAbserve
        $this->thawAbserve->AdvancedSearch->SearchValue = @$filter["x_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchOperator = @$filter["z_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchCondition = @$filter["v_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchValue2 = @$filter["y_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->SearchOperator2 = @$filter["w_thawAbserve"];
        $this->thawAbserve->AdvancedSearch->save();

        // Field thawDiscard
        $this->thawDiscard->AdvancedSearch->SearchValue = @$filter["x_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchOperator = @$filter["z_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchCondition = @$filter["v_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchValue2 = @$filter["y_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->SearchOperator2 = @$filter["w_thawDiscard"];
        $this->thawDiscard->AdvancedSearch->save();

        // Field ETCatheter
        $this->ETCatheter->AdvancedSearch->SearchValue = @$filter["x_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchOperator = @$filter["z_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchCondition = @$filter["v_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchValue2 = @$filter["y_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->SearchOperator2 = @$filter["w_ETCatheter"];
        $this->ETCatheter->AdvancedSearch->save();

        // Field ETDifficulty
        $this->ETDifficulty->AdvancedSearch->SearchValue = @$filter["x_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchOperator = @$filter["z_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchCondition = @$filter["v_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchValue2 = @$filter["y_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->SearchOperator2 = @$filter["w_ETDifficulty"];
        $this->ETDifficulty->AdvancedSearch->save();

        // Field ETEasy
        $this->ETEasy->AdvancedSearch->SearchValue = @$filter["x_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchOperator = @$filter["z_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchCondition = @$filter["v_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchValue2 = @$filter["y_ETEasy"];
        $this->ETEasy->AdvancedSearch->SearchOperator2 = @$filter["w_ETEasy"];
        $this->ETEasy->AdvancedSearch->save();

        // Field ETComments
        $this->ETComments->AdvancedSearch->SearchValue = @$filter["x_ETComments"];
        $this->ETComments->AdvancedSearch->SearchOperator = @$filter["z_ETComments"];
        $this->ETComments->AdvancedSearch->SearchCondition = @$filter["v_ETComments"];
        $this->ETComments->AdvancedSearch->SearchValue2 = @$filter["y_ETComments"];
        $this->ETComments->AdvancedSearch->SearchOperator2 = @$filter["w_ETComments"];
        $this->ETComments->AdvancedSearch->save();

        // Field ETDoctor
        $this->ETDoctor->AdvancedSearch->SearchValue = @$filter["x_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchOperator = @$filter["z_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchCondition = @$filter["v_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchValue2 = @$filter["y_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->SearchOperator2 = @$filter["w_ETDoctor"];
        $this->ETDoctor->AdvancedSearch->save();

        // Field ETEmbryologist
        $this->ETEmbryologist->AdvancedSearch->SearchValue = @$filter["x_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchOperator = @$filter["z_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchCondition = @$filter["v_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchValue2 = @$filter["y_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->SearchOperator2 = @$filter["w_ETEmbryologist"];
        $this->ETEmbryologist->AdvancedSearch->save();

        // Field ETDate
        $this->ETDate->AdvancedSearch->SearchValue = @$filter["x_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator = @$filter["z_ETDate"];
        $this->ETDate->AdvancedSearch->SearchCondition = @$filter["v_ETDate"];
        $this->ETDate->AdvancedSearch->SearchValue2 = @$filter["y_ETDate"];
        $this->ETDate->AdvancedSearch->SearchOperator2 = @$filter["w_ETDate"];
        $this->ETDate->AdvancedSearch->save();

        // Field Day1End
        $this->Day1End->AdvancedSearch->SearchValue = @$filter["x_Day1End"];
        $this->Day1End->AdvancedSearch->SearchOperator = @$filter["z_Day1End"];
        $this->Day1End->AdvancedSearch->SearchCondition = @$filter["v_Day1End"];
        $this->Day1End->AdvancedSearch->SearchValue2 = @$filter["y_Day1End"];
        $this->Day1End->AdvancedSearch->SearchOperator2 = @$filter["w_Day1End"];
        $this->Day1End->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermOrigin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IndicationForART, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0sino, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0OocyteStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0PolarBodyPosition, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0Breakage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0Attempts, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SPZMorpho, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SPZLocation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day0SpOrgin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Sperm, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1PN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1PB, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Pronucleus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Nucleolus, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1Halo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2SiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Sino, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3ZP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Vacoules, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4SiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Frag, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Symmetry, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4End, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5ICM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5TE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Observation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Collapsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Vacoulles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6CellNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6ICM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6TE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Observation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Collapsed, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Vacoulles, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Grade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day6Cryoptop, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndSiNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingDay, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingCellStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingGrade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EndingState, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DidNO, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PrimaryEmbrologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SecondaryEmbrologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Incubator, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->location, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->OocyteNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Stage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriPrimaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriSecondaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriEmbryoNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawReFrozen, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriDay, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriGrade, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriIncubator, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriTank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCanister, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriGobiet, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriViscotube, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCryolockNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->vitriCryolockColour, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawPrimaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawSecondaryEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawAbserve, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->thawDiscard, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETCatheter, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETDifficulty, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETEasy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETComments, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETDoctor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ETEmbryologist, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1End, $arKeywords, $type);
        return $where;
    }

    // Build basic search SQL
    protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
    {
        $defCond = ($type == "OR") ? "OR" : "AND";
        $arSql = []; // Array for SQL parts
        $arCond = []; // Array for search conditions
        $cnt = count($arKeywords);
        $j = 0; // Number of SQL parts
        for ($i = 0; $i < $cnt; $i++) {
            $keyword = $arKeywords[$i];
            $keyword = trim($keyword);
            if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
                $keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
                $ar = explode("\\", $keyword);
            } else {
                $ar = [$keyword];
            }
            foreach ($ar as $keyword) {
                if ($keyword != "") {
                    $wrk = "";
                    if ($keyword == "OR" && $type == "") {
                        if ($j > 0) {
                            $arCond[$j - 1] = "OR";
                        }
                    } elseif ($keyword == Config("NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NULL";
                    } elseif ($keyword == Config("NOT_NULL_VALUE")) {
                        $wrk = $fld->Expression . " IS NOT NULL";
                    } elseif ($fld->IsVirtual && $fld->Visible) {
                        $wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    } elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
                        $wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
                    }
                    if ($wrk != "") {
                        $arSql[$j] = $wrk;
                        $arCond[$j] = $defCond;
                        $j += 1;
                    }
                }
            }
        }
        $cnt = count($arSql);
        $quoted = false;
        $sql = "";
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt - 1; $i++) {
                if ($arCond[$i] == "OR") {
                    if (!$quoted) {
                        $sql .= "(";
                    }
                    $quoted = true;
                }
                $sql .= $arSql[$i];
                if ($quoted && $arCond[$i] != "OR") {
                    $sql .= ")";
                    $quoted = false;
                }
                $sql .= " " . $arCond[$i] . " ";
            }
            $sql .= $arSql[$cnt - 1];
            if ($quoted) {
                $sql .= ")";
            }
        }
        if ($sql != "") {
            if ($where != "") {
                $where .= " OR ";
            }
            $where .= "(" . $sql . ")";
        }
    }

    // Return basic search WHERE clause based on search keyword and type
    protected function basicSearchWhere($default = false)
    {
        global $Security;
        $searchStr = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
        $searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

        // Get search SQL
        if ($searchKeyword != "") {
            $ar = $this->BasicSearch->keywordList($default);
            // Search keyword in any fields
            if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
                foreach ($ar as $keyword) {
                    if ($keyword != "") {
                        if ($searchStr != "") {
                            $searchStr .= " " . $searchType . " ";
                        }
                        $searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
                    }
                }
            } else {
                $searchStr = $this->basicSearchSql($ar, $searchType);
            }
            if (!$default && in_array($this->Command, ["", "reset", "resetall"])) {
                $this->Command = "search";
            }
        }
        if (!$default && $this->Command == "search") {
            $this->BasicSearch->setKeyword($searchKeyword);
            $this->BasicSearch->setType($searchType);
        }
        return $searchStr;
    }

    // Check if search parm exists
    protected function checkSearchParms()
    {
        // Check basic search
        if ($this->BasicSearch->issetSession()) {
            return true;
        }
        return false;
    }

    // Clear all search parameters
    protected function resetSearchParms()
    {
        // Clear search WHERE clause
        $this->SearchWhere = "";
        $this->setSearchWhere($this->SearchWhere);

        // Clear basic search parameters
        $this->resetBasicSearchParms();
    }

    // Load advanced search default values
    protected function loadAdvancedSearchDefault()
    {
        return false;
    }

    // Clear all basic search parameters
    protected function resetBasicSearchParms()
    {
        $this->BasicSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->RIDNo); // RIDNo
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->ARTCycle); // ARTCycle
            $this->updateSort($this->SpermOrigin); // SpermOrigin
            $this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
            $this->updateSort($this->IndicationForART); // IndicationForART
            $this->updateSort($this->Day0sino); // Day0sino
            $this->updateSort($this->Day0OocyteStage); // Day0OocyteStage
            $this->updateSort($this->Day0PolarBodyPosition); // Day0PolarBodyPosition
            $this->updateSort($this->Day0Breakage); // Day0Breakage
            $this->updateSort($this->Day0Attempts); // Day0Attempts
            $this->updateSort($this->Day0SPZMorpho); // Day0SPZMorpho
            $this->updateSort($this->Day0SPZLocation); // Day0SPZLocation
            $this->updateSort($this->Day0SpOrgin); // Day0SpOrgin
            $this->updateSort($this->Day5Cryoptop); // Day5Cryoptop
            $this->updateSort($this->Day1Sperm); // Day1Sperm
            $this->updateSort($this->Day1PN); // Day1PN
            $this->updateSort($this->Day1PB); // Day1PB
            $this->updateSort($this->Day1Pronucleus); // Day1Pronucleus
            $this->updateSort($this->Day1Nucleolus); // Day1Nucleolus
            $this->updateSort($this->Day1Halo); // Day1Halo
            $this->updateSort($this->Day2SiNo); // Day2SiNo
            $this->updateSort($this->Day2CellNo); // Day2CellNo
            $this->updateSort($this->Day2Frag); // Day2Frag
            $this->updateSort($this->Day2Symmetry); // Day2Symmetry
            $this->updateSort($this->Day2Cryoptop); // Day2Cryoptop
            $this->updateSort($this->Day2Grade); // Day2Grade
            $this->updateSort($this->Day2End); // Day2End
            $this->updateSort($this->Day3Sino); // Day3Sino
            $this->updateSort($this->Day3CellNo); // Day3CellNo
            $this->updateSort($this->Day3Frag); // Day3Frag
            $this->updateSort($this->Day3Symmetry); // Day3Symmetry
            $this->updateSort($this->Day3ZP); // Day3ZP
            $this->updateSort($this->Day3Vacoules); // Day3Vacoules
            $this->updateSort($this->Day3Grade); // Day3Grade
            $this->updateSort($this->Day3Cryoptop); // Day3Cryoptop
            $this->updateSort($this->Day3End); // Day3End
            $this->updateSort($this->Day4SiNo); // Day4SiNo
            $this->updateSort($this->Day4CellNo); // Day4CellNo
            $this->updateSort($this->Day4Frag); // Day4Frag
            $this->updateSort($this->Day4Symmetry); // Day4Symmetry
            $this->updateSort($this->Day4Grade); // Day4Grade
            $this->updateSort($this->Day4Cryoptop); // Day4Cryoptop
            $this->updateSort($this->Day4End); // Day4End
            $this->updateSort($this->Day5CellNo); // Day5CellNo
            $this->updateSort($this->Day5ICM); // Day5ICM
            $this->updateSort($this->Day5TE); // Day5TE
            $this->updateSort($this->Day5Observation); // Day5Observation
            $this->updateSort($this->Day5Collapsed); // Day5Collapsed
            $this->updateSort($this->Day5Vacoulles); // Day5Vacoulles
            $this->updateSort($this->Day5Grade); // Day5Grade
            $this->updateSort($this->Day6CellNo); // Day6CellNo
            $this->updateSort($this->Day6ICM); // Day6ICM
            $this->updateSort($this->Day6TE); // Day6TE
            $this->updateSort($this->Day6Observation); // Day6Observation
            $this->updateSort($this->Day6Collapsed); // Day6Collapsed
            $this->updateSort($this->Day6Vacoulles); // Day6Vacoulles
            $this->updateSort($this->Day6Grade); // Day6Grade
            $this->updateSort($this->Day6Cryoptop); // Day6Cryoptop
            $this->updateSort($this->EndSiNo); // EndSiNo
            $this->updateSort($this->EndingDay); // EndingDay
            $this->updateSort($this->EndingCellStage); // EndingCellStage
            $this->updateSort($this->EndingGrade); // EndingGrade
            $this->updateSort($this->EndingState); // EndingState
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->DidNO); // DidNO
            $this->updateSort($this->ICSiIVFDateTime); // ICSiIVFDateTime
            $this->updateSort($this->PrimaryEmbrologist); // PrimaryEmbrologist
            $this->updateSort($this->SecondaryEmbrologist); // SecondaryEmbrologist
            $this->updateSort($this->Incubator); // Incubator
            $this->updateSort($this->location); // location
            $this->updateSort($this->OocyteNo); // OocyteNo
            $this->updateSort($this->Stage); // Stage
            $this->updateSort($this->Remarks); // Remarks
            $this->updateSort($this->vitrificationDate); // vitrificationDate
            $this->updateSort($this->vitriPrimaryEmbryologist); // vitriPrimaryEmbryologist
            $this->updateSort($this->vitriSecondaryEmbryologist); // vitriSecondaryEmbryologist
            $this->updateSort($this->vitriEmbryoNo); // vitriEmbryoNo
            $this->updateSort($this->thawReFrozen); // thawReFrozen
            $this->updateSort($this->vitriFertilisationDate); // vitriFertilisationDate
            $this->updateSort($this->vitriDay); // vitriDay
            $this->updateSort($this->vitriStage); // vitriStage
            $this->updateSort($this->vitriGrade); // vitriGrade
            $this->updateSort($this->vitriIncubator); // vitriIncubator
            $this->updateSort($this->vitriTank); // vitriTank
            $this->updateSort($this->vitriCanister); // vitriCanister
            $this->updateSort($this->vitriGobiet); // vitriGobiet
            $this->updateSort($this->vitriViscotube); // vitriViscotube
            $this->updateSort($this->vitriCryolockNo); // vitriCryolockNo
            $this->updateSort($this->vitriCryolockColour); // vitriCryolockColour
            $this->updateSort($this->thawDate); // thawDate
            $this->updateSort($this->thawPrimaryEmbryologist); // thawPrimaryEmbryologist
            $this->updateSort($this->thawSecondaryEmbryologist); // thawSecondaryEmbryologist
            $this->updateSort($this->thawET); // thawET
            $this->updateSort($this->thawAbserve); // thawAbserve
            $this->updateSort($this->thawDiscard); // thawDiscard
            $this->updateSort($this->ETCatheter); // ETCatheter
            $this->updateSort($this->ETDifficulty); // ETDifficulty
            $this->updateSort($this->ETEasy); // ETEasy
            $this->updateSort($this->ETComments); // ETComments
            $this->updateSort($this->ETDoctor); // ETDoctor
            $this->updateSort($this->ETEmbryologist); // ETEmbryologist
            $this->updateSort($this->ETDate); // ETDate
            $this->updateSort($this->Day1End); // Day1End
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($useDefaultSort) {
                    $orderBy = $this->getSqlOrderBy();
                    $this->setSessionOrderBy($orderBy);
                } else {
                    $this->setSessionOrderBy("");
                }
            }
        }
    }

    // Reset command
    // - cmd=reset (Reset search parameters)
    // - cmd=resetall (Reset search and master/detail parameters)
    // - cmd=resetsort (Reset sort parameters)
    protected function resetCmd()
    {
        // Check if reset command
        if (StartsString("reset", $this->Command)) {
            // Reset search criteria
            if ($this->Command == "reset" || $this->Command == "resetall") {
                $this->resetSearchParms();
            }

            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->RIDNo->setSessionValue("");
                        $this->Name->setSessionValue("");
                        $this->TidNo->setSessionValue("");
                        $this->DidNO->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->RIDNo->setSort("");
                $this->Name->setSort("");
                $this->ARTCycle->setSort("");
                $this->SpermOrigin->setSort("");
                $this->InseminatinTechnique->setSort("");
                $this->IndicationForART->setSort("");
                $this->Day0sino->setSort("");
                $this->Day0OocyteStage->setSort("");
                $this->Day0PolarBodyPosition->setSort("");
                $this->Day0Breakage->setSort("");
                $this->Day0Attempts->setSort("");
                $this->Day0SPZMorpho->setSort("");
                $this->Day0SPZLocation->setSort("");
                $this->Day0SpOrgin->setSort("");
                $this->Day5Cryoptop->setSort("");
                $this->Day1Sperm->setSort("");
                $this->Day1PN->setSort("");
                $this->Day1PB->setSort("");
                $this->Day1Pronucleus->setSort("");
                $this->Day1Nucleolus->setSort("");
                $this->Day1Halo->setSort("");
                $this->Day2SiNo->setSort("");
                $this->Day2CellNo->setSort("");
                $this->Day2Frag->setSort("");
                $this->Day2Symmetry->setSort("");
                $this->Day2Cryoptop->setSort("");
                $this->Day2Grade->setSort("");
                $this->Day2End->setSort("");
                $this->Day3Sino->setSort("");
                $this->Day3CellNo->setSort("");
                $this->Day3Frag->setSort("");
                $this->Day3Symmetry->setSort("");
                $this->Day3ZP->setSort("");
                $this->Day3Vacoules->setSort("");
                $this->Day3Grade->setSort("");
                $this->Day3Cryoptop->setSort("");
                $this->Day3End->setSort("");
                $this->Day4SiNo->setSort("");
                $this->Day4CellNo->setSort("");
                $this->Day4Frag->setSort("");
                $this->Day4Symmetry->setSort("");
                $this->Day4Grade->setSort("");
                $this->Day4Cryoptop->setSort("");
                $this->Day4End->setSort("");
                $this->Day5CellNo->setSort("");
                $this->Day5ICM->setSort("");
                $this->Day5TE->setSort("");
                $this->Day5Observation->setSort("");
                $this->Day5Collapsed->setSort("");
                $this->Day5Vacoulles->setSort("");
                $this->Day5Grade->setSort("");
                $this->Day6CellNo->setSort("");
                $this->Day6ICM->setSort("");
                $this->Day6TE->setSort("");
                $this->Day6Observation->setSort("");
                $this->Day6Collapsed->setSort("");
                $this->Day6Vacoulles->setSort("");
                $this->Day6Grade->setSort("");
                $this->Day6Cryoptop->setSort("");
                $this->EndSiNo->setSort("");
                $this->EndingDay->setSort("");
                $this->EndingCellStage->setSort("");
                $this->EndingGrade->setSort("");
                $this->EndingState->setSort("");
                $this->TidNo->setSort("");
                $this->DidNO->setSort("");
                $this->ICSiIVFDateTime->setSort("");
                $this->PrimaryEmbrologist->setSort("");
                $this->SecondaryEmbrologist->setSort("");
                $this->Incubator->setSort("");
                $this->location->setSort("");
                $this->OocyteNo->setSort("");
                $this->Stage->setSort("");
                $this->Remarks->setSort("");
                $this->vitrificationDate->setSort("");
                $this->vitriPrimaryEmbryologist->setSort("");
                $this->vitriSecondaryEmbryologist->setSort("");
                $this->vitriEmbryoNo->setSort("");
                $this->thawReFrozen->setSort("");
                $this->vitriFertilisationDate->setSort("");
                $this->vitriDay->setSort("");
                $this->vitriStage->setSort("");
                $this->vitriGrade->setSort("");
                $this->vitriIncubator->setSort("");
                $this->vitriTank->setSort("");
                $this->vitriCanister->setSort("");
                $this->vitriGobiet->setSort("");
                $this->vitriViscotube->setSort("");
                $this->vitriCryolockNo->setSort("");
                $this->vitriCryolockColour->setSort("");
                $this->thawDate->setSort("");
                $this->thawPrimaryEmbryologist->setSort("");
                $this->thawSecondaryEmbryologist->setSort("");
                $this->thawET->setSort("");
                $this->thawAbserve->setSort("");
                $this->thawDiscard->setSort("");
                $this->ETCatheter->setSort("");
                $this->ETDifficulty->setSort("");
                $this->ETEasy->setSort("");
                $this->ETComments->setSort("");
                $this->ETDoctor->setSort("");
                $this->ETEmbryologist->setSort("");
                $this->ETDate->setSort("");
                $this->Day1End->setSort("");
            }

            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Set up list options
    protected function setupListOptions()
    {
        global $Security, $Language;

        // "griddelete"
        if ($this->AllowAddDeleteRow) {
            $item = &$this->ListOptions->add("griddelete");
            $item->CssClass = "text-nowrap";
            $item->OnLeft = true;
            $item->Visible = false; // Default hidden
        }

        // Add group option item
        $item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
        $item->Body = "";
        $item->OnLeft = true;
        $item->Visible = false;

        // "view"
        $item = &$this->ListOptions->add("view");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canView();
        $item->OnLeft = true;

        // "edit"
        $item = &$this->ListOptions->add("edit");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canEdit();
        $item->OnLeft = true;

        // "copy"
        $item = &$this->ListOptions->add("copy");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canAdd();
        $item->OnLeft = true;

        // "delete"
        $item = &$this->ListOptions->add("delete");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->canDelete();
        $item->OnLeft = true;

        // List actions
        $item = &$this->ListOptions->add("listactions");
        $item->CssClass = "text-nowrap";
        $item->OnLeft = true;
        $item->Visible = false;
        $item->ShowInButtonGroup = false;
        $item->ShowInDropDown = false;

        // "checkbox"
        $item = &$this->ListOptions->add("checkbox");
        $item->Visible = false;
        $item->OnLeft = true;
        $item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
        $item->moveTo(0);
        $item->ShowInDropDown = false;
        $item->ShowInButtonGroup = false;

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = true;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
        $this->setupListOptionsExt();
        $item = $this->ListOptions[$this->ListOptions->GroupOptionName];
        $item->Visible = $this->ListOptions->groupOptionVisible();
    }

    // Render list options
    public function renderListOptions()
    {
        global $Security, $Language, $CurrentForm;
        $this->ListOptions->loadDefault();

        // Call ListOptions_Rendering event
        $this->listOptionsRendering();

        // Set up row action and key
        if ($CurrentForm && is_numeric($this->RowIndex) && $this->RowType != "view") {
            $CurrentForm->Index = $this->RowIndex;
            $actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
            $oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->OldKeyName);
            $blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
            if ($this->RowAction != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
            }
            $oldKey = $this->getKey(false); // Get from OldValue
            if ($oldKeyName != "" && $oldKey != "") {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $oldKeyName . "\" id=\"" . $oldKeyName . "\" value=\"" . HtmlEncode($oldKey) . "\">";
            }
            if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow()) {
                $this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
            }
        }

        // "delete"
        if ($this->AllowAddDeleteRow) {
            if ($this->isGridAdd() || $this->isGridEdit()) {
                $options = &$this->ListOptions;
                $options->UseButtonGroup = true; // Use button group for grid delete button
                $opt = $options["griddelete"];
                if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
                    $opt->Body = "&nbsp;";
                } else {
                    $opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
                }
            }
        }
        $pageUrl = $this->pageUrl();

        // "copy"
        $opt = $this->ListOptions["copy"];
        if ($this->isInlineAddRow() || $this->isInlineCopyRow()) { // Inline Add/Copy
            $this->ListOptions->CustomItem = "copy"; // Show copy column only
            $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
            $opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
            "<a class=\"ew-grid-link ew-inline-insert\" title=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("InsertLink") . "</a>&nbsp;" .
            "<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
            "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"insert\"></div>";
            return;
        }

        // "edit"
        $opt = $this->ListOptions["edit"];
        if ($this->isInlineEditRow()) { // Inline-Edit
            $this->ListOptions->CustomItem = "edit"; // Show edit column only
            $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $opt->Body = "<div" . (($opt->OnLeft) ? " class=\"text-right\"" : "") . ">" .
                "<a class=\"ew-grid-link ew-inline-update\" title=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("UpdateLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . UrlAddHash($this->pageName(), "r" . $this->RowCount . "_" . $this->TableVar) . "'); return false;\">" . $Language->phrase("UpdateLink") . "</a>&nbsp;" .
                "<a class=\"ew-grid-link ew-inline-cancel\" title=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("CancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("CancelLink") . "</a>" .
                "<input type=\"hidden\" name=\"action\" id=\"action\" value=\"update\"></div>";
            $opt->Body .= "<input type=\"hidden\" name=\"k" . $this->RowIndex . "_key\" id=\"k" . $this->RowIndex . "_key\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\">";
            return;
        }
        if ($this->CurrentMode == "view") {
            // "view"
            $opt = $this->ListOptions["view"];
            $viewcaption = HtmlTitle($Language->phrase("ViewLink"));
            if ($Security->canView()) {
                $opt->Body = "<a class=\"ew-row-link ew-view\" title=\"" . $viewcaption . "\" data-caption=\"" . $viewcaption . "\" href=\"" . HtmlEncode(GetUrl($this->ViewUrl)) . "\">" . $Language->phrase("ViewLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "edit"
            $opt = $this->ListOptions["edit"];
            $editcaption = HtmlTitle($Language->phrase("EditLink"));
            if ($Security->canEdit()) {
                $opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("EditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->EditUrl)) . "\">" . $Language->phrase("EditLink") . "</a>";
                $opt->Body .= "<a class=\"ew-row-link ew-inline-edit\" title=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineEditLink")) . "\" href=\"" . HtmlEncode(UrlAddHash(GetUrl($this->InlineEditUrl), "r" . $this->RowCount . "_" . $this->TableVar)) . "\">" . $Language->phrase("InlineEditLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if ($Security->canAdd()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
                $opt->Body .= "<a class=\"ew-row-link ew-inline-copy\" title=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineCopyLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineCopyUrl)) . "\">" . $Language->phrase("InlineCopyLink") . "</a>";
            } else {
                $opt->Body = "";
            }

            // "delete"
            $opt = $this->ListOptions["delete"];
            if ($Security->canDelete()) {
            $opt->Body = "<a class=\"ew-row-link ew-delete\"" . "" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->DeleteUrl)) . "\">" . $Language->phrase("DeleteLink") . "</a>";
            } else {
                $opt->Body = "";
            }
        } // End View mode

        // Set up list action buttons
        $opt = $this->ListOptions["listactions"];
        if ($opt && !$this->isExport() && !$this->CurrentAction) {
            $body = "";
            $links = [];
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
                    $action = $listaction->Action;
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
                    $links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a></li>";
                    if (count($links) == 1) { // Single button
                        $body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(true) . "}," . $listaction->toJson(true) . "));\">" . $icon . $listaction->Caption . "</a>";
                    }
                }
            }
            if (count($links) > 1) { // More than one buttons, use dropdown
                $body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
                $content = "";
                foreach ($links as $link) {
                    $content .= "<li>" . $link . "</li>";
                }
                $body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">" . $content . "</ul>";
                $body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
            }
            if (count($links) > 0) {
                $opt->Body = $body;
                $opt->Visible = true;
            }
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        $option = $options["addedit"];

        // Add
        $item = &$option->add("add");
        $addcaption = HtmlTitle($Language->phrase("AddLink"));
        $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
        $item->Visible = $this->AddUrl != "" && $Security->canAdd();

        // Inline Add
        $item = &$option->add("inlineadd");
        $item->Body = "<a class=\"ew-add-edit ew-inline-add\" title=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("InlineAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->InlineAddUrl)) . "\">" . $Language->phrase("InlineAddLink") . "</a>";
        $item->Visible = $this->InlineAddUrl != "" && $Security->canAdd();
        $item = &$option->add("gridadd");
        $item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridAddUrl)) . "\">" . $Language->phrase("GridAddLink") . "</a>";
        $item->Visible = $this->GridAddUrl != "" && $Security->canAdd();

        // Add grid edit
        $option = $options["addedit"];
        $item = &$option->add("gridedit");
        $item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode(GetUrl($this->GridEditUrl)) . "\">" . $Language->phrase("GridEditLink") . "</a>";
        $item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
        $option = $options["action"];

        // Set up options default
        foreach ($options as $option) {
            $option->UseDropDownButton = true;
            $option->UseButtonGroup = true;
            //$option->ButtonClass = ""; // Class for button group
            $item = &$option->add($option->GroupOptionName);
            $item->Body = "";
            $item->Visible = false;
        }
        $options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
        $options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

        // Filter button
        $item = &$this->FilterOptions->add("savecurrentfilter");
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_embryology_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_embryology_chartlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
        $item->Visible = true;
        $this->FilterOptions->UseDropDownButton = true;
        $this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
        $this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

        // Add group option item
        $item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
            $option = $options["action"];
            // Set up list action buttons
            foreach ($this->ListActions->Items as $listaction) {
                if ($listaction->Select == ACTION_MULTIPLE) {
                    $item = &$option->add("custom_" . $listaction->Action);
                    $caption = $listaction->Caption;
                    $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                    $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_embryology_chartlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
                    $item->Visible = $listaction->Allow;
                }
            }

            // Hide grid edit and other options
            if ($this->TotalRecords <= 0) {
                $option = $options["addedit"];
                $item = $option["gridedit"];
                if ($item) {
                    $item->Visible = false;
                }
                $option = $options["action"];
                $option->hideAllOptions();
            }
        } else { // Grid add/edit mode
            // Hide all options first
            foreach ($options as $option) {
                $option->hideAllOptions();
            }
            $pageUrl = $this->pageUrl();

            // Grid-Add
            if ($this->isGridAdd()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                // Add grid insert
                $item = &$option->add("gridinsert");
                $item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridInsertLink") . "</a>";
                // Add grid cancel
                $item = &$option->add("gridcancel");
                $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }

            // Grid-Edit
            if ($this->isGridEdit()) {
                if ($this->AllowAddDeleteRow) {
                    // Add add blank row
                    $option = $options["addedit"];
                    $option->UseDropDownButton = false;
                    $item = &$option->add("addblankrow");
                    $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                    $item->Visible = $Security->canAdd();
                }
                $option = $options["action"];
                $option->UseDropDownButton = false;
                    $item = &$option->add("gridsave");
                    $item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"ew.forms.get(this).submit(event, '" . $this->pageName() . "'); return false;\">" . $Language->phrase("GridSaveLink") . "</a>";
                    $item = &$option->add("gridcancel");
                    $cancelurl = $this->addMasterUrl($pageUrl . "action=cancel");
                    $item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
            }
        }
    }

    // Process list action
    protected function processListAction()
    {
        global $Language, $Security;
        $userlist = "";
        $user = "";
        $filter = $this->getFilterFromRecordKeys();
        $userAction = Post("useraction", "");
        if ($filter != "" && $userAction != "") {
            // Check permission first
            $actionCaption = $userAction;
            if (array_key_exists($userAction, $this->ListActions->Items)) {
                $actionCaption = $this->ListActions[$userAction]->Caption;
                if (!$this->ListActions[$userAction]->Allow) {
                    $errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
                    if (Post("ajax") == $userAction) { // Ajax
                        echo "<p class=\"text-danger\">" . $errmsg . "</p>";
                        return true;
                    } else {
                        $this->setFailureMessage($errmsg);
                        return false;
                    }
                }
            }
            $this->CurrentFilter = $filter;
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $rs = LoadRecordset($sql, $conn, \PDO::FETCH_ASSOC);
            $this->CurrentAction = $userAction;

            // Call row action event
            if ($rs) {
                $conn->beginTransaction();
                $this->SelectedCount = $rs->recordCount();
                $this->SelectedIndex = 0;
                while (!$rs->EOF) {
                    $this->SelectedIndex++;
                    $row = $rs->fields;
                    $processed = $this->rowCustomAction($userAction, $row);
                    if (!$processed) {
                        break;
                    }
                    $rs->moveNext();
                }
                if ($processed) {
                    $conn->commit(); // Commit the changes
                    if ($this->getSuccessMessage() == "" && !ob_get_length()) { // No output
                        $this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
                    }
                } else {
                    $conn->rollback(); // Rollback changes

                    // Set up error message
                    if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                        // Use the message, do nothing
                    } elseif ($this->CancelMessage != "") {
                        $this->setFailureMessage($this->CancelMessage);
                        $this->CancelMessage = "";
                    } else {
                        $this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
                    }
                }
            }
            if ($rs) {
                $rs->close();
            }
            $this->CurrentAction = ""; // Clear action
            if (Post("ajax") == $userAction) { // Ajax
                if ($this->getSuccessMessage() != "") {
                    echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
                    $this->clearSuccessMessage(); // Clear message
                }
                if ($this->getFailureMessage() != "") {
                    echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
                    $this->clearFailureMessage(); // Clear message
                }
                return true;
            }
        }
        return false; // Not ajax request
    }

    // Set up list options (extended codes)
    protected function setupListOptionsExt()
    {
        // Hide detail items for dropdown if necessary
        $this->ListOptions->hideDetailItemsForDropDown();
    }

    // Render list options (extended codes)
    protected function renderListOptionsExt()
    {
        global $Security, $Language;
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

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;

        // Check field name 'id' first before field var 'x_id'
        $val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
        if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd()) {
            $this->id->setFormValue($val);
        }

        // Check field name 'RIDNo' first before field var 'x_RIDNo'
        $val = $CurrentForm->hasValue("RIDNo") ? $CurrentForm->getValue("RIDNo") : $CurrentForm->getValue("x_RIDNo");
        if (!$this->RIDNo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RIDNo->Visible = false; // Disable update for API request
            } else {
                $this->RIDNo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RIDNo")) {
            $this->RIDNo->setOldValue($CurrentForm->getValue("o_RIDNo"));
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
        if ($CurrentForm->hasValue("o_Name")) {
            $this->Name->setOldValue($CurrentForm->getValue("o_Name"));
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
        if ($CurrentForm->hasValue("o_ARTCycle")) {
            $this->ARTCycle->setOldValue($CurrentForm->getValue("o_ARTCycle"));
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
        if ($CurrentForm->hasValue("o_SpermOrigin")) {
            $this->SpermOrigin->setOldValue($CurrentForm->getValue("o_SpermOrigin"));
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
        if ($CurrentForm->hasValue("o_InseminatinTechnique")) {
            $this->InseminatinTechnique->setOldValue($CurrentForm->getValue("o_InseminatinTechnique"));
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
        if ($CurrentForm->hasValue("o_IndicationForART")) {
            $this->IndicationForART->setOldValue($CurrentForm->getValue("o_IndicationForART"));
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
        if ($CurrentForm->hasValue("o_Day0sino")) {
            $this->Day0sino->setOldValue($CurrentForm->getValue("o_Day0sino"));
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
        if ($CurrentForm->hasValue("o_Day0OocyteStage")) {
            $this->Day0OocyteStage->setOldValue($CurrentForm->getValue("o_Day0OocyteStage"));
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
        if ($CurrentForm->hasValue("o_Day0PolarBodyPosition")) {
            $this->Day0PolarBodyPosition->setOldValue($CurrentForm->getValue("o_Day0PolarBodyPosition"));
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
        if ($CurrentForm->hasValue("o_Day0Breakage")) {
            $this->Day0Breakage->setOldValue($CurrentForm->getValue("o_Day0Breakage"));
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
        if ($CurrentForm->hasValue("o_Day0Attempts")) {
            $this->Day0Attempts->setOldValue($CurrentForm->getValue("o_Day0Attempts"));
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
        if ($CurrentForm->hasValue("o_Day0SPZMorpho")) {
            $this->Day0SPZMorpho->setOldValue($CurrentForm->getValue("o_Day0SPZMorpho"));
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
        if ($CurrentForm->hasValue("o_Day0SPZLocation")) {
            $this->Day0SPZLocation->setOldValue($CurrentForm->getValue("o_Day0SPZLocation"));
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
        if ($CurrentForm->hasValue("o_Day0SpOrgin")) {
            $this->Day0SpOrgin->setOldValue($CurrentForm->getValue("o_Day0SpOrgin"));
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
        if ($CurrentForm->hasValue("o_Day5Cryoptop")) {
            $this->Day5Cryoptop->setOldValue($CurrentForm->getValue("o_Day5Cryoptop"));
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
        if ($CurrentForm->hasValue("o_Day1Sperm")) {
            $this->Day1Sperm->setOldValue($CurrentForm->getValue("o_Day1Sperm"));
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
        if ($CurrentForm->hasValue("o_Day1PN")) {
            $this->Day1PN->setOldValue($CurrentForm->getValue("o_Day1PN"));
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
        if ($CurrentForm->hasValue("o_Day1PB")) {
            $this->Day1PB->setOldValue($CurrentForm->getValue("o_Day1PB"));
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
        if ($CurrentForm->hasValue("o_Day1Pronucleus")) {
            $this->Day1Pronucleus->setOldValue($CurrentForm->getValue("o_Day1Pronucleus"));
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
        if ($CurrentForm->hasValue("o_Day1Nucleolus")) {
            $this->Day1Nucleolus->setOldValue($CurrentForm->getValue("o_Day1Nucleolus"));
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
        if ($CurrentForm->hasValue("o_Day1Halo")) {
            $this->Day1Halo->setOldValue($CurrentForm->getValue("o_Day1Halo"));
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
        if ($CurrentForm->hasValue("o_Day2SiNo")) {
            $this->Day2SiNo->setOldValue($CurrentForm->getValue("o_Day2SiNo"));
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
        if ($CurrentForm->hasValue("o_Day2CellNo")) {
            $this->Day2CellNo->setOldValue($CurrentForm->getValue("o_Day2CellNo"));
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
        if ($CurrentForm->hasValue("o_Day2Frag")) {
            $this->Day2Frag->setOldValue($CurrentForm->getValue("o_Day2Frag"));
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
        if ($CurrentForm->hasValue("o_Day2Symmetry")) {
            $this->Day2Symmetry->setOldValue($CurrentForm->getValue("o_Day2Symmetry"));
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
        if ($CurrentForm->hasValue("o_Day2Cryoptop")) {
            $this->Day2Cryoptop->setOldValue($CurrentForm->getValue("o_Day2Cryoptop"));
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
        if ($CurrentForm->hasValue("o_Day2Grade")) {
            $this->Day2Grade->setOldValue($CurrentForm->getValue("o_Day2Grade"));
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
        if ($CurrentForm->hasValue("o_Day2End")) {
            $this->Day2End->setOldValue($CurrentForm->getValue("o_Day2End"));
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
        if ($CurrentForm->hasValue("o_Day3Sino")) {
            $this->Day3Sino->setOldValue($CurrentForm->getValue("o_Day3Sino"));
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
        if ($CurrentForm->hasValue("o_Day3CellNo")) {
            $this->Day3CellNo->setOldValue($CurrentForm->getValue("o_Day3CellNo"));
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
        if ($CurrentForm->hasValue("o_Day3Frag")) {
            $this->Day3Frag->setOldValue($CurrentForm->getValue("o_Day3Frag"));
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
        if ($CurrentForm->hasValue("o_Day3Symmetry")) {
            $this->Day3Symmetry->setOldValue($CurrentForm->getValue("o_Day3Symmetry"));
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
        if ($CurrentForm->hasValue("o_Day3ZP")) {
            $this->Day3ZP->setOldValue($CurrentForm->getValue("o_Day3ZP"));
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
        if ($CurrentForm->hasValue("o_Day3Vacoules")) {
            $this->Day3Vacoules->setOldValue($CurrentForm->getValue("o_Day3Vacoules"));
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
        if ($CurrentForm->hasValue("o_Day3Grade")) {
            $this->Day3Grade->setOldValue($CurrentForm->getValue("o_Day3Grade"));
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
        if ($CurrentForm->hasValue("o_Day3Cryoptop")) {
            $this->Day3Cryoptop->setOldValue($CurrentForm->getValue("o_Day3Cryoptop"));
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
        if ($CurrentForm->hasValue("o_Day3End")) {
            $this->Day3End->setOldValue($CurrentForm->getValue("o_Day3End"));
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
        if ($CurrentForm->hasValue("o_Day4SiNo")) {
            $this->Day4SiNo->setOldValue($CurrentForm->getValue("o_Day4SiNo"));
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
        if ($CurrentForm->hasValue("o_Day4CellNo")) {
            $this->Day4CellNo->setOldValue($CurrentForm->getValue("o_Day4CellNo"));
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
        if ($CurrentForm->hasValue("o_Day4Frag")) {
            $this->Day4Frag->setOldValue($CurrentForm->getValue("o_Day4Frag"));
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
        if ($CurrentForm->hasValue("o_Day4Symmetry")) {
            $this->Day4Symmetry->setOldValue($CurrentForm->getValue("o_Day4Symmetry"));
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
        if ($CurrentForm->hasValue("o_Day4Grade")) {
            $this->Day4Grade->setOldValue($CurrentForm->getValue("o_Day4Grade"));
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
        if ($CurrentForm->hasValue("o_Day4Cryoptop")) {
            $this->Day4Cryoptop->setOldValue($CurrentForm->getValue("o_Day4Cryoptop"));
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
        if ($CurrentForm->hasValue("o_Day4End")) {
            $this->Day4End->setOldValue($CurrentForm->getValue("o_Day4End"));
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
        if ($CurrentForm->hasValue("o_Day5CellNo")) {
            $this->Day5CellNo->setOldValue($CurrentForm->getValue("o_Day5CellNo"));
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
        if ($CurrentForm->hasValue("o_Day5ICM")) {
            $this->Day5ICM->setOldValue($CurrentForm->getValue("o_Day5ICM"));
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
        if ($CurrentForm->hasValue("o_Day5TE")) {
            $this->Day5TE->setOldValue($CurrentForm->getValue("o_Day5TE"));
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
        if ($CurrentForm->hasValue("o_Day5Observation")) {
            $this->Day5Observation->setOldValue($CurrentForm->getValue("o_Day5Observation"));
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
        if ($CurrentForm->hasValue("o_Day5Collapsed")) {
            $this->Day5Collapsed->setOldValue($CurrentForm->getValue("o_Day5Collapsed"));
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
        if ($CurrentForm->hasValue("o_Day5Vacoulles")) {
            $this->Day5Vacoulles->setOldValue($CurrentForm->getValue("o_Day5Vacoulles"));
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
        if ($CurrentForm->hasValue("o_Day5Grade")) {
            $this->Day5Grade->setOldValue($CurrentForm->getValue("o_Day5Grade"));
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
        if ($CurrentForm->hasValue("o_Day6CellNo")) {
            $this->Day6CellNo->setOldValue($CurrentForm->getValue("o_Day6CellNo"));
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
        if ($CurrentForm->hasValue("o_Day6ICM")) {
            $this->Day6ICM->setOldValue($CurrentForm->getValue("o_Day6ICM"));
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
        if ($CurrentForm->hasValue("o_Day6TE")) {
            $this->Day6TE->setOldValue($CurrentForm->getValue("o_Day6TE"));
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
        if ($CurrentForm->hasValue("o_Day6Observation")) {
            $this->Day6Observation->setOldValue($CurrentForm->getValue("o_Day6Observation"));
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
        if ($CurrentForm->hasValue("o_Day6Collapsed")) {
            $this->Day6Collapsed->setOldValue($CurrentForm->getValue("o_Day6Collapsed"));
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
        if ($CurrentForm->hasValue("o_Day6Vacoulles")) {
            $this->Day6Vacoulles->setOldValue($CurrentForm->getValue("o_Day6Vacoulles"));
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
        if ($CurrentForm->hasValue("o_Day6Grade")) {
            $this->Day6Grade->setOldValue($CurrentForm->getValue("o_Day6Grade"));
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
        if ($CurrentForm->hasValue("o_Day6Cryoptop")) {
            $this->Day6Cryoptop->setOldValue($CurrentForm->getValue("o_Day6Cryoptop"));
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
        if ($CurrentForm->hasValue("o_EndSiNo")) {
            $this->EndSiNo->setOldValue($CurrentForm->getValue("o_EndSiNo"));
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
        if ($CurrentForm->hasValue("o_EndingDay")) {
            $this->EndingDay->setOldValue($CurrentForm->getValue("o_EndingDay"));
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
        if ($CurrentForm->hasValue("o_EndingCellStage")) {
            $this->EndingCellStage->setOldValue($CurrentForm->getValue("o_EndingCellStage"));
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
        if ($CurrentForm->hasValue("o_EndingGrade")) {
            $this->EndingGrade->setOldValue($CurrentForm->getValue("o_EndingGrade"));
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
        if ($CurrentForm->hasValue("o_EndingState")) {
            $this->EndingState->setOldValue($CurrentForm->getValue("o_EndingState"));
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
        if ($CurrentForm->hasValue("o_TidNo")) {
            $this->TidNo->setOldValue($CurrentForm->getValue("o_TidNo"));
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
        if ($CurrentForm->hasValue("o_DidNO")) {
            $this->DidNO->setOldValue($CurrentForm->getValue("o_DidNO"));
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
        if ($CurrentForm->hasValue("o_ICSiIVFDateTime")) {
            $this->ICSiIVFDateTime->setOldValue($CurrentForm->getValue("o_ICSiIVFDateTime"));
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
        if ($CurrentForm->hasValue("o_PrimaryEmbrologist")) {
            $this->PrimaryEmbrologist->setOldValue($CurrentForm->getValue("o_PrimaryEmbrologist"));
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
        if ($CurrentForm->hasValue("o_SecondaryEmbrologist")) {
            $this->SecondaryEmbrologist->setOldValue($CurrentForm->getValue("o_SecondaryEmbrologist"));
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
        if ($CurrentForm->hasValue("o_Incubator")) {
            $this->Incubator->setOldValue($CurrentForm->getValue("o_Incubator"));
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
        if ($CurrentForm->hasValue("o_location")) {
            $this->location->setOldValue($CurrentForm->getValue("o_location"));
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
        if ($CurrentForm->hasValue("o_OocyteNo")) {
            $this->OocyteNo->setOldValue($CurrentForm->getValue("o_OocyteNo"));
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
        if ($CurrentForm->hasValue("o_Stage")) {
            $this->Stage->setOldValue($CurrentForm->getValue("o_Stage"));
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
        if ($CurrentForm->hasValue("o_Remarks")) {
            $this->Remarks->setOldValue($CurrentForm->getValue("o_Remarks"));
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
        if ($CurrentForm->hasValue("o_vitrificationDate")) {
            $this->vitrificationDate->setOldValue($CurrentForm->getValue("o_vitrificationDate"));
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
        if ($CurrentForm->hasValue("o_vitriPrimaryEmbryologist")) {
            $this->vitriPrimaryEmbryologist->setOldValue($CurrentForm->getValue("o_vitriPrimaryEmbryologist"));
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
        if ($CurrentForm->hasValue("o_vitriSecondaryEmbryologist")) {
            $this->vitriSecondaryEmbryologist->setOldValue($CurrentForm->getValue("o_vitriSecondaryEmbryologist"));
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
        if ($CurrentForm->hasValue("o_vitriEmbryoNo")) {
            $this->vitriEmbryoNo->setOldValue($CurrentForm->getValue("o_vitriEmbryoNo"));
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
        if ($CurrentForm->hasValue("o_thawReFrozen")) {
            $this->thawReFrozen->setOldValue($CurrentForm->getValue("o_thawReFrozen"));
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
        if ($CurrentForm->hasValue("o_vitriFertilisationDate")) {
            $this->vitriFertilisationDate->setOldValue($CurrentForm->getValue("o_vitriFertilisationDate"));
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
        if ($CurrentForm->hasValue("o_vitriDay")) {
            $this->vitriDay->setOldValue($CurrentForm->getValue("o_vitriDay"));
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
        if ($CurrentForm->hasValue("o_vitriStage")) {
            $this->vitriStage->setOldValue($CurrentForm->getValue("o_vitriStage"));
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
        if ($CurrentForm->hasValue("o_vitriGrade")) {
            $this->vitriGrade->setOldValue($CurrentForm->getValue("o_vitriGrade"));
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
        if ($CurrentForm->hasValue("o_vitriIncubator")) {
            $this->vitriIncubator->setOldValue($CurrentForm->getValue("o_vitriIncubator"));
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
        if ($CurrentForm->hasValue("o_vitriTank")) {
            $this->vitriTank->setOldValue($CurrentForm->getValue("o_vitriTank"));
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
        if ($CurrentForm->hasValue("o_vitriCanister")) {
            $this->vitriCanister->setOldValue($CurrentForm->getValue("o_vitriCanister"));
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
        if ($CurrentForm->hasValue("o_vitriGobiet")) {
            $this->vitriGobiet->setOldValue($CurrentForm->getValue("o_vitriGobiet"));
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
        if ($CurrentForm->hasValue("o_vitriViscotube")) {
            $this->vitriViscotube->setOldValue($CurrentForm->getValue("o_vitriViscotube"));
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
        if ($CurrentForm->hasValue("o_vitriCryolockNo")) {
            $this->vitriCryolockNo->setOldValue($CurrentForm->getValue("o_vitriCryolockNo"));
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
        if ($CurrentForm->hasValue("o_vitriCryolockColour")) {
            $this->vitriCryolockColour->setOldValue($CurrentForm->getValue("o_vitriCryolockColour"));
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
        if ($CurrentForm->hasValue("o_thawDate")) {
            $this->thawDate->setOldValue($CurrentForm->getValue("o_thawDate"));
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
        if ($CurrentForm->hasValue("o_thawPrimaryEmbryologist")) {
            $this->thawPrimaryEmbryologist->setOldValue($CurrentForm->getValue("o_thawPrimaryEmbryologist"));
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
        if ($CurrentForm->hasValue("o_thawSecondaryEmbryologist")) {
            $this->thawSecondaryEmbryologist->setOldValue($CurrentForm->getValue("o_thawSecondaryEmbryologist"));
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
        if ($CurrentForm->hasValue("o_thawET")) {
            $this->thawET->setOldValue($CurrentForm->getValue("o_thawET"));
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
        if ($CurrentForm->hasValue("o_thawAbserve")) {
            $this->thawAbserve->setOldValue($CurrentForm->getValue("o_thawAbserve"));
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
        if ($CurrentForm->hasValue("o_thawDiscard")) {
            $this->thawDiscard->setOldValue($CurrentForm->getValue("o_thawDiscard"));
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
        if ($CurrentForm->hasValue("o_ETCatheter")) {
            $this->ETCatheter->setOldValue($CurrentForm->getValue("o_ETCatheter"));
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
        if ($CurrentForm->hasValue("o_ETDifficulty")) {
            $this->ETDifficulty->setOldValue($CurrentForm->getValue("o_ETDifficulty"));
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
        if ($CurrentForm->hasValue("o_ETEasy")) {
            $this->ETEasy->setOldValue($CurrentForm->getValue("o_ETEasy"));
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
        if ($CurrentForm->hasValue("o_ETComments")) {
            $this->ETComments->setOldValue($CurrentForm->getValue("o_ETComments"));
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
        if ($CurrentForm->hasValue("o_ETDoctor")) {
            $this->ETDoctor->setOldValue($CurrentForm->getValue("o_ETDoctor"));
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
        if ($CurrentForm->hasValue("o_ETEmbryologist")) {
            $this->ETEmbryologist->setOldValue($CurrentForm->getValue("o_ETEmbryologist"));
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
        if ($CurrentForm->hasValue("o_ETDate")) {
            $this->ETDate->setOldValue($CurrentForm->getValue("o_ETDate"));
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
        if ($CurrentForm->hasValue("o_Day1End")) {
            $this->Day1End->setOldValue($CurrentForm->getValue("o_Day1End"));
        }
    }

    // Restore form values
    public function restoreFormValues()
    {
        global $CurrentForm;
        if (!$this->isGridAdd() && !$this->isAdd()) {
            $this->id->CurrentValue = $this->id->FormValue;
        }
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
            if (!$this->EventCancelled) {
                $this->HashValue = $this->getRowHash($row); // Get hash value for record
            }
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
        $this->ViewUrl = $this->getViewUrl();
        $this->EditUrl = $this->getEditUrl();
        $this->InlineEditUrl = $this->getInlineEditUrl();
        $this->CopyUrl = $this->getCopyUrl();
        $this->InlineCopyUrl = $this->getInlineCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

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
        } elseif ($this->RowType == ROWTYPE_ADD) {
            // id

            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            if ($this->RIDNo->getSessionValue() != "") {
                $this->RIDNo->CurrentValue = GetForeignKeyValue($this->RIDNo->getSessionValue());
                $this->RIDNo->OldValue = $this->RIDNo->CurrentValue;
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
                $this->Name->OldValue = $this->Name->CurrentValue;
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
                $this->TidNo->OldValue = $this->TidNo->CurrentValue;
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
                $this->DidNO->OldValue = $this->DidNO->CurrentValue;
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

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

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
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->EditAttrs["class"] = "form-control";
            $this->RIDNo->EditCustomAttributes = "";
            $this->RIDNo->EditValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->EditValue = FormatNumber($this->RIDNo->EditValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            $this->Name->EditValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // ARTCycle
            $this->ARTCycle->EditAttrs["class"] = "form-control";
            $this->ARTCycle->EditCustomAttributes = "";
            $this->ARTCycle->EditValue = $this->ARTCycle->CurrentValue;
            $this->ARTCycle->ViewCustomAttributes = "";

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
            $this->TidNo->EditValue = $this->TidNo->CurrentValue;
            $this->TidNo->EditValue = FormatNumber($this->TidNo->EditValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // DidNO
            $this->DidNO->EditAttrs["class"] = "form-control";
            $this->DidNO->EditCustomAttributes = "";
            $this->DidNO->EditValue = $this->DidNO->CurrentValue;
            $this->DidNO->ViewCustomAttributes = "";

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

            // Edit refer script

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
            $this->TidNo->TooltipValue = "";

            // DidNO
            $this->DidNO->LinkCustomAttributes = "";
            $this->DidNO->HrefValue = "";
            $this->DidNO->TooltipValue = "";

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
        if ($this->id->Required) {
            if (!$this->id->IsDetailKey && EmptyValue($this->id->FormValue)) {
                $this->id->addErrorMessage(str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
            }
        }
        if ($this->RIDNo->Required) {
            if (!$this->RIDNo->IsDetailKey && EmptyValue($this->RIDNo->FormValue)) {
                $this->RIDNo->addErrorMessage(str_replace("%s", $this->RIDNo->caption(), $this->RIDNo->RequiredErrorMessage));
            }
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

    // Delete records based on current filter
    protected function deleteRows()
    {
        global $Language, $Security;
        if (!$Security->canDelete()) {
            $this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
            return false;
        }
        $deleteRows = true;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $rows = $conn->fetchAll($sql);
        if (count($rows) == 0) {
            $this->setFailureMessage($Language->phrase("NoRecord")); // No record found
            return false;
        }

        // Clone old rows
        $rsold = $rows;

        // Call row deleting event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $deleteRows = $this->rowDeleting($row);
                if (!$deleteRows) {
                    break;
                }
            }
        }
        if ($deleteRows) {
            $key = "";
            foreach ($rsold as $row) {
                $thisKey = "";
                if ($thisKey != "") {
                    $thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
                }
                $thisKey .= $row['id'];
                if (Config("DELETE_UPLOADED_FILES")) { // Delete old files
                    $this->deleteUploadedFiles($row);
                }
                $deleteRows = $this->delete($row); // Delete
                if ($deleteRows === false) {
                    break;
                }
                if ($key != "") {
                    $key .= ", ";
                }
                $key .= $thisKey;
            }
        }
        if (!$deleteRows) {
            // Set up error message
            if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($Language->phrase("DeleteCancelled"));
            }
        }

        // Call Row Deleted event
        if ($deleteRows) {
            foreach ($rsold as $row) {
                $this->rowDeleted($row);
            }
        }

        // Write JSON for API request
        if (IsApi() && $deleteRows) {
            $row = $this->getRecordsFromRecordset($rsold);
            WriteJson(["success" => true, $this->TableVar => $row]);
        }
        return $deleteRows;
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

            // SpermOrigin
            $this->SpermOrigin->setDbValueDef($rsnew, $this->SpermOrigin->CurrentValue, null, $this->SpermOrigin->ReadOnly);

            // InseminatinTechnique
            $this->InseminatinTechnique->setDbValueDef($rsnew, $this->InseminatinTechnique->CurrentValue, null, $this->InseminatinTechnique->ReadOnly);

            // IndicationForART
            $this->IndicationForART->setDbValueDef($rsnew, $this->IndicationForART->CurrentValue, null, $this->IndicationForART->ReadOnly);

            // Day0sino
            $this->Day0sino->setDbValueDef($rsnew, $this->Day0sino->CurrentValue, null, $this->Day0sino->ReadOnly);

            // Day0OocyteStage
            $this->Day0OocyteStage->setDbValueDef($rsnew, $this->Day0OocyteStage->CurrentValue, null, $this->Day0OocyteStage->ReadOnly);

            // Day0PolarBodyPosition
            $this->Day0PolarBodyPosition->setDbValueDef($rsnew, $this->Day0PolarBodyPosition->CurrentValue, null, $this->Day0PolarBodyPosition->ReadOnly);

            // Day0Breakage
            $this->Day0Breakage->setDbValueDef($rsnew, $this->Day0Breakage->CurrentValue, null, $this->Day0Breakage->ReadOnly);

            // Day0Attempts
            $this->Day0Attempts->setDbValueDef($rsnew, $this->Day0Attempts->CurrentValue, null, $this->Day0Attempts->ReadOnly);

            // Day0SPZMorpho
            $this->Day0SPZMorpho->setDbValueDef($rsnew, $this->Day0SPZMorpho->CurrentValue, null, $this->Day0SPZMorpho->ReadOnly);

            // Day0SPZLocation
            $this->Day0SPZLocation->setDbValueDef($rsnew, $this->Day0SPZLocation->CurrentValue, null, $this->Day0SPZLocation->ReadOnly);

            // Day0SpOrgin
            $this->Day0SpOrgin->setDbValueDef($rsnew, $this->Day0SpOrgin->CurrentValue, null, $this->Day0SpOrgin->ReadOnly);

            // Day5Cryoptop
            $this->Day5Cryoptop->setDbValueDef($rsnew, $this->Day5Cryoptop->CurrentValue, null, $this->Day5Cryoptop->ReadOnly);

            // Day1Sperm
            $this->Day1Sperm->setDbValueDef($rsnew, $this->Day1Sperm->CurrentValue, null, $this->Day1Sperm->ReadOnly);

            // Day1PN
            $this->Day1PN->setDbValueDef($rsnew, $this->Day1PN->CurrentValue, null, $this->Day1PN->ReadOnly);

            // Day1PB
            $this->Day1PB->setDbValueDef($rsnew, $this->Day1PB->CurrentValue, null, $this->Day1PB->ReadOnly);

            // Day1Pronucleus
            $this->Day1Pronucleus->setDbValueDef($rsnew, $this->Day1Pronucleus->CurrentValue, null, $this->Day1Pronucleus->ReadOnly);

            // Day1Nucleolus
            $this->Day1Nucleolus->setDbValueDef($rsnew, $this->Day1Nucleolus->CurrentValue, null, $this->Day1Nucleolus->ReadOnly);

            // Day1Halo
            $this->Day1Halo->setDbValueDef($rsnew, $this->Day1Halo->CurrentValue, null, $this->Day1Halo->ReadOnly);

            // Day2SiNo
            $this->Day2SiNo->setDbValueDef($rsnew, $this->Day2SiNo->CurrentValue, null, $this->Day2SiNo->ReadOnly);

            // Day2CellNo
            $this->Day2CellNo->setDbValueDef($rsnew, $this->Day2CellNo->CurrentValue, null, $this->Day2CellNo->ReadOnly);

            // Day2Frag
            $this->Day2Frag->setDbValueDef($rsnew, $this->Day2Frag->CurrentValue, null, $this->Day2Frag->ReadOnly);

            // Day2Symmetry
            $this->Day2Symmetry->setDbValueDef($rsnew, $this->Day2Symmetry->CurrentValue, null, $this->Day2Symmetry->ReadOnly);

            // Day2Cryoptop
            $this->Day2Cryoptop->setDbValueDef($rsnew, $this->Day2Cryoptop->CurrentValue, null, $this->Day2Cryoptop->ReadOnly);

            // Day2Grade
            $this->Day2Grade->setDbValueDef($rsnew, $this->Day2Grade->CurrentValue, null, $this->Day2Grade->ReadOnly);

            // Day2End
            $this->Day2End->setDbValueDef($rsnew, $this->Day2End->CurrentValue, null, $this->Day2End->ReadOnly);

            // Day3Sino
            $this->Day3Sino->setDbValueDef($rsnew, $this->Day3Sino->CurrentValue, null, $this->Day3Sino->ReadOnly);

            // Day3CellNo
            $this->Day3CellNo->setDbValueDef($rsnew, $this->Day3CellNo->CurrentValue, null, $this->Day3CellNo->ReadOnly);

            // Day3Frag
            $this->Day3Frag->setDbValueDef($rsnew, $this->Day3Frag->CurrentValue, null, $this->Day3Frag->ReadOnly);

            // Day3Symmetry
            $this->Day3Symmetry->setDbValueDef($rsnew, $this->Day3Symmetry->CurrentValue, null, $this->Day3Symmetry->ReadOnly);

            // Day3ZP
            $this->Day3ZP->setDbValueDef($rsnew, $this->Day3ZP->CurrentValue, null, $this->Day3ZP->ReadOnly);

            // Day3Vacoules
            $this->Day3Vacoules->setDbValueDef($rsnew, $this->Day3Vacoules->CurrentValue, null, $this->Day3Vacoules->ReadOnly);

            // Day3Grade
            $this->Day3Grade->setDbValueDef($rsnew, $this->Day3Grade->CurrentValue, null, $this->Day3Grade->ReadOnly);

            // Day3Cryoptop
            $this->Day3Cryoptop->setDbValueDef($rsnew, $this->Day3Cryoptop->CurrentValue, null, $this->Day3Cryoptop->ReadOnly);

            // Day3End
            $this->Day3End->setDbValueDef($rsnew, $this->Day3End->CurrentValue, null, $this->Day3End->ReadOnly);

            // Day4SiNo
            $this->Day4SiNo->setDbValueDef($rsnew, $this->Day4SiNo->CurrentValue, null, $this->Day4SiNo->ReadOnly);

            // Day4CellNo
            $this->Day4CellNo->setDbValueDef($rsnew, $this->Day4CellNo->CurrentValue, null, $this->Day4CellNo->ReadOnly);

            // Day4Frag
            $this->Day4Frag->setDbValueDef($rsnew, $this->Day4Frag->CurrentValue, null, $this->Day4Frag->ReadOnly);

            // Day4Symmetry
            $this->Day4Symmetry->setDbValueDef($rsnew, $this->Day4Symmetry->CurrentValue, null, $this->Day4Symmetry->ReadOnly);

            // Day4Grade
            $this->Day4Grade->setDbValueDef($rsnew, $this->Day4Grade->CurrentValue, null, $this->Day4Grade->ReadOnly);

            // Day4Cryoptop
            $this->Day4Cryoptop->setDbValueDef($rsnew, $this->Day4Cryoptop->CurrentValue, null, $this->Day4Cryoptop->ReadOnly);

            // Day4End
            $this->Day4End->setDbValueDef($rsnew, $this->Day4End->CurrentValue, null, $this->Day4End->ReadOnly);

            // Day5CellNo
            $this->Day5CellNo->setDbValueDef($rsnew, $this->Day5CellNo->CurrentValue, null, $this->Day5CellNo->ReadOnly);

            // Day5ICM
            $this->Day5ICM->setDbValueDef($rsnew, $this->Day5ICM->CurrentValue, null, $this->Day5ICM->ReadOnly);

            // Day5TE
            $this->Day5TE->setDbValueDef($rsnew, $this->Day5TE->CurrentValue, null, $this->Day5TE->ReadOnly);

            // Day5Observation
            $this->Day5Observation->setDbValueDef($rsnew, $this->Day5Observation->CurrentValue, null, $this->Day5Observation->ReadOnly);

            // Day5Collapsed
            $this->Day5Collapsed->setDbValueDef($rsnew, $this->Day5Collapsed->CurrentValue, null, $this->Day5Collapsed->ReadOnly);

            // Day5Vacoulles
            $this->Day5Vacoulles->setDbValueDef($rsnew, $this->Day5Vacoulles->CurrentValue, null, $this->Day5Vacoulles->ReadOnly);

            // Day5Grade
            $this->Day5Grade->setDbValueDef($rsnew, $this->Day5Grade->CurrentValue, null, $this->Day5Grade->ReadOnly);

            // Day6CellNo
            $this->Day6CellNo->setDbValueDef($rsnew, $this->Day6CellNo->CurrentValue, null, $this->Day6CellNo->ReadOnly);

            // Day6ICM
            $this->Day6ICM->setDbValueDef($rsnew, $this->Day6ICM->CurrentValue, null, $this->Day6ICM->ReadOnly);

            // Day6TE
            $this->Day6TE->setDbValueDef($rsnew, $this->Day6TE->CurrentValue, null, $this->Day6TE->ReadOnly);

            // Day6Observation
            $this->Day6Observation->setDbValueDef($rsnew, $this->Day6Observation->CurrentValue, null, $this->Day6Observation->ReadOnly);

            // Day6Collapsed
            $this->Day6Collapsed->setDbValueDef($rsnew, $this->Day6Collapsed->CurrentValue, null, $this->Day6Collapsed->ReadOnly);

            // Day6Vacoulles
            $this->Day6Vacoulles->setDbValueDef($rsnew, $this->Day6Vacoulles->CurrentValue, null, $this->Day6Vacoulles->ReadOnly);

            // Day6Grade
            $this->Day6Grade->setDbValueDef($rsnew, $this->Day6Grade->CurrentValue, null, $this->Day6Grade->ReadOnly);

            // Day6Cryoptop
            $this->Day6Cryoptop->setDbValueDef($rsnew, $this->Day6Cryoptop->CurrentValue, null, $this->Day6Cryoptop->ReadOnly);

            // EndSiNo
            $this->EndSiNo->setDbValueDef($rsnew, $this->EndSiNo->CurrentValue, null, $this->EndSiNo->ReadOnly);

            // EndingDay
            $this->EndingDay->setDbValueDef($rsnew, $this->EndingDay->CurrentValue, null, $this->EndingDay->ReadOnly);

            // EndingCellStage
            $this->EndingCellStage->setDbValueDef($rsnew, $this->EndingCellStage->CurrentValue, null, $this->EndingCellStage->ReadOnly);

            // EndingGrade
            $this->EndingGrade->setDbValueDef($rsnew, $this->EndingGrade->CurrentValue, null, $this->EndingGrade->ReadOnly);

            // EndingState
            $this->EndingState->setDbValueDef($rsnew, $this->EndingState->CurrentValue, null, $this->EndingState->ReadOnly);

            // ICSiIVFDateTime
            $this->ICSiIVFDateTime->setDbValueDef($rsnew, UnFormatDateTime($this->ICSiIVFDateTime->CurrentValue, 0), null, $this->ICSiIVFDateTime->ReadOnly);

            // PrimaryEmbrologist
            $this->PrimaryEmbrologist->setDbValueDef($rsnew, $this->PrimaryEmbrologist->CurrentValue, null, $this->PrimaryEmbrologist->ReadOnly);

            // SecondaryEmbrologist
            $this->SecondaryEmbrologist->setDbValueDef($rsnew, $this->SecondaryEmbrologist->CurrentValue, null, $this->SecondaryEmbrologist->ReadOnly);

            // Incubator
            $this->Incubator->setDbValueDef($rsnew, $this->Incubator->CurrentValue, null, $this->Incubator->ReadOnly);

            // location
            $this->location->setDbValueDef($rsnew, $this->location->CurrentValue, null, $this->location->ReadOnly);

            // OocyteNo
            $this->OocyteNo->setDbValueDef($rsnew, $this->OocyteNo->CurrentValue, null, $this->OocyteNo->ReadOnly);

            // Stage
            $this->Stage->setDbValueDef($rsnew, $this->Stage->CurrentValue, null, $this->Stage->ReadOnly);

            // Remarks
            $this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, null, $this->Remarks->ReadOnly);

            // vitrificationDate
            $this->vitrificationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitrificationDate->CurrentValue, 0), null, $this->vitrificationDate->ReadOnly);

            // vitriPrimaryEmbryologist
            $this->vitriPrimaryEmbryologist->setDbValueDef($rsnew, $this->vitriPrimaryEmbryologist->CurrentValue, null, $this->vitriPrimaryEmbryologist->ReadOnly);

            // vitriSecondaryEmbryologist
            $this->vitriSecondaryEmbryologist->setDbValueDef($rsnew, $this->vitriSecondaryEmbryologist->CurrentValue, null, $this->vitriSecondaryEmbryologist->ReadOnly);

            // vitriEmbryoNo
            $this->vitriEmbryoNo->setDbValueDef($rsnew, $this->vitriEmbryoNo->CurrentValue, null, $this->vitriEmbryoNo->ReadOnly);

            // thawReFrozen
            $this->thawReFrozen->setDbValueDef($rsnew, $this->thawReFrozen->CurrentValue, null, $this->thawReFrozen->ReadOnly);

            // vitriFertilisationDate
            $this->vitriFertilisationDate->setDbValueDef($rsnew, UnFormatDateTime($this->vitriFertilisationDate->CurrentValue, 0), null, $this->vitriFertilisationDate->ReadOnly);

            // vitriDay
            $this->vitriDay->setDbValueDef($rsnew, $this->vitriDay->CurrentValue, null, $this->vitriDay->ReadOnly);

            // vitriStage
            $this->vitriStage->setDbValueDef($rsnew, $this->vitriStage->CurrentValue, null, $this->vitriStage->ReadOnly);

            // vitriGrade
            $this->vitriGrade->setDbValueDef($rsnew, $this->vitriGrade->CurrentValue, null, $this->vitriGrade->ReadOnly);

            // vitriIncubator
            $this->vitriIncubator->setDbValueDef($rsnew, $this->vitriIncubator->CurrentValue, null, $this->vitriIncubator->ReadOnly);

            // vitriTank
            $this->vitriTank->setDbValueDef($rsnew, $this->vitriTank->CurrentValue, null, $this->vitriTank->ReadOnly);

            // vitriCanister
            $this->vitriCanister->setDbValueDef($rsnew, $this->vitriCanister->CurrentValue, null, $this->vitriCanister->ReadOnly);

            // vitriGobiet
            $this->vitriGobiet->setDbValueDef($rsnew, $this->vitriGobiet->CurrentValue, null, $this->vitriGobiet->ReadOnly);

            // vitriViscotube
            $this->vitriViscotube->setDbValueDef($rsnew, $this->vitriViscotube->CurrentValue, null, $this->vitriViscotube->ReadOnly);

            // vitriCryolockNo
            $this->vitriCryolockNo->setDbValueDef($rsnew, $this->vitriCryolockNo->CurrentValue, null, $this->vitriCryolockNo->ReadOnly);

            // vitriCryolockColour
            $this->vitriCryolockColour->setDbValueDef($rsnew, $this->vitriCryolockColour->CurrentValue, null, $this->vitriCryolockColour->ReadOnly);

            // thawDate
            $this->thawDate->setDbValueDef($rsnew, UnFormatDateTime($this->thawDate->CurrentValue, 0), null, $this->thawDate->ReadOnly);

            // thawPrimaryEmbryologist
            $this->thawPrimaryEmbryologist->setDbValueDef($rsnew, $this->thawPrimaryEmbryologist->CurrentValue, null, $this->thawPrimaryEmbryologist->ReadOnly);

            // thawSecondaryEmbryologist
            $this->thawSecondaryEmbryologist->setDbValueDef($rsnew, $this->thawSecondaryEmbryologist->CurrentValue, null, $this->thawSecondaryEmbryologist->ReadOnly);

            // thawET
            $this->thawET->setDbValueDef($rsnew, $this->thawET->CurrentValue, null, $this->thawET->ReadOnly);

            // thawAbserve
            $this->thawAbserve->setDbValueDef($rsnew, $this->thawAbserve->CurrentValue, null, $this->thawAbserve->ReadOnly);

            // thawDiscard
            $this->thawDiscard->setDbValueDef($rsnew, $this->thawDiscard->CurrentValue, null, $this->thawDiscard->ReadOnly);

            // ETCatheter
            $this->ETCatheter->setDbValueDef($rsnew, $this->ETCatheter->CurrentValue, null, $this->ETCatheter->ReadOnly);

            // ETDifficulty
            $this->ETDifficulty->setDbValueDef($rsnew, $this->ETDifficulty->CurrentValue, null, $this->ETDifficulty->ReadOnly);

            // ETEasy
            $this->ETEasy->setDbValueDef($rsnew, $this->ETEasy->CurrentValue, null, $this->ETEasy->ReadOnly);

            // ETComments
            $this->ETComments->setDbValueDef($rsnew, $this->ETComments->CurrentValue, null, $this->ETComments->ReadOnly);

            // ETDoctor
            $this->ETDoctor->setDbValueDef($rsnew, $this->ETDoctor->CurrentValue, null, $this->ETDoctor->ReadOnly);

            // ETEmbryologist
            $this->ETEmbryologist->setDbValueDef($rsnew, $this->ETEmbryologist->CurrentValue, null, $this->ETEmbryologist->ReadOnly);

            // ETDate
            $this->ETDate->setDbValueDef($rsnew, UnFormatDateTime($this->ETDate->CurrentValue, 0), null, $this->ETDate->ReadOnly);

            // Day1End
            $this->Day1End->setDbValueDef($rsnew, $this->Day1End->CurrentValue, null, $this->Day1End->ReadOnly);

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

    // Load row hash
    protected function loadRowHash()
    {
        $filter = $this->getRecordFilter();

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $row = $conn->fetchAssoc($sql);
        $this->HashValue = $row ? $this->getRowHash($row) : ""; // Get hash value for record
    }

    // Get Row Hash
    public function getRowHash(&$rs)
    {
        if (!$rs) {
            return "";
        }
        $row = ($rs instanceof Recordset) ? $rs->fields : $rs;
        $hash = "";
        $hash .= GetFieldHash($row['SpermOrigin']); // SpermOrigin
        $hash .= GetFieldHash($row['InseminatinTechnique']); // InseminatinTechnique
        $hash .= GetFieldHash($row['IndicationForART']); // IndicationForART
        $hash .= GetFieldHash($row['Day0sino']); // Day0sino
        $hash .= GetFieldHash($row['Day0OocyteStage']); // Day0OocyteStage
        $hash .= GetFieldHash($row['Day0PolarBodyPosition']); // Day0PolarBodyPosition
        $hash .= GetFieldHash($row['Day0Breakage']); // Day0Breakage
        $hash .= GetFieldHash($row['Day0Attempts']); // Day0Attempts
        $hash .= GetFieldHash($row['Day0SPZMorpho']); // Day0SPZMorpho
        $hash .= GetFieldHash($row['Day0SPZLocation']); // Day0SPZLocation
        $hash .= GetFieldHash($row['Day0SpOrgin']); // Day0SpOrgin
        $hash .= GetFieldHash($row['Day5Cryoptop']); // Day5Cryoptop
        $hash .= GetFieldHash($row['Day1Sperm']); // Day1Sperm
        $hash .= GetFieldHash($row['Day1PN']); // Day1PN
        $hash .= GetFieldHash($row['Day1PB']); // Day1PB
        $hash .= GetFieldHash($row['Day1Pronucleus']); // Day1Pronucleus
        $hash .= GetFieldHash($row['Day1Nucleolus']); // Day1Nucleolus
        $hash .= GetFieldHash($row['Day1Halo']); // Day1Halo
        $hash .= GetFieldHash($row['Day2SiNo']); // Day2SiNo
        $hash .= GetFieldHash($row['Day2CellNo']); // Day2CellNo
        $hash .= GetFieldHash($row['Day2Frag']); // Day2Frag
        $hash .= GetFieldHash($row['Day2Symmetry']); // Day2Symmetry
        $hash .= GetFieldHash($row['Day2Cryoptop']); // Day2Cryoptop
        $hash .= GetFieldHash($row['Day2Grade']); // Day2Grade
        $hash .= GetFieldHash($row['Day2End']); // Day2End
        $hash .= GetFieldHash($row['Day3Sino']); // Day3Sino
        $hash .= GetFieldHash($row['Day3CellNo']); // Day3CellNo
        $hash .= GetFieldHash($row['Day3Frag']); // Day3Frag
        $hash .= GetFieldHash($row['Day3Symmetry']); // Day3Symmetry
        $hash .= GetFieldHash($row['Day3ZP']); // Day3ZP
        $hash .= GetFieldHash($row['Day3Vacoules']); // Day3Vacoules
        $hash .= GetFieldHash($row['Day3Grade']); // Day3Grade
        $hash .= GetFieldHash($row['Day3Cryoptop']); // Day3Cryoptop
        $hash .= GetFieldHash($row['Day3End']); // Day3End
        $hash .= GetFieldHash($row['Day4SiNo']); // Day4SiNo
        $hash .= GetFieldHash($row['Day4CellNo']); // Day4CellNo
        $hash .= GetFieldHash($row['Day4Frag']); // Day4Frag
        $hash .= GetFieldHash($row['Day4Symmetry']); // Day4Symmetry
        $hash .= GetFieldHash($row['Day4Grade']); // Day4Grade
        $hash .= GetFieldHash($row['Day4Cryoptop']); // Day4Cryoptop
        $hash .= GetFieldHash($row['Day4End']); // Day4End
        $hash .= GetFieldHash($row['Day5CellNo']); // Day5CellNo
        $hash .= GetFieldHash($row['Day5ICM']); // Day5ICM
        $hash .= GetFieldHash($row['Day5TE']); // Day5TE
        $hash .= GetFieldHash($row['Day5Observation']); // Day5Observation
        $hash .= GetFieldHash($row['Day5Collapsed']); // Day5Collapsed
        $hash .= GetFieldHash($row['Day5Vacoulles']); // Day5Vacoulles
        $hash .= GetFieldHash($row['Day5Grade']); // Day5Grade
        $hash .= GetFieldHash($row['Day6CellNo']); // Day6CellNo
        $hash .= GetFieldHash($row['Day6ICM']); // Day6ICM
        $hash .= GetFieldHash($row['Day6TE']); // Day6TE
        $hash .= GetFieldHash($row['Day6Observation']); // Day6Observation
        $hash .= GetFieldHash($row['Day6Collapsed']); // Day6Collapsed
        $hash .= GetFieldHash($row['Day6Vacoulles']); // Day6Vacoulles
        $hash .= GetFieldHash($row['Day6Grade']); // Day6Grade
        $hash .= GetFieldHash($row['Day6Cryoptop']); // Day6Cryoptop
        $hash .= GetFieldHash($row['EndSiNo']); // EndSiNo
        $hash .= GetFieldHash($row['EndingDay']); // EndingDay
        $hash .= GetFieldHash($row['EndingCellStage']); // EndingCellStage
        $hash .= GetFieldHash($row['EndingGrade']); // EndingGrade
        $hash .= GetFieldHash($row['EndingState']); // EndingState
        $hash .= GetFieldHash($row['ICSiIVFDateTime']); // ICSiIVFDateTime
        $hash .= GetFieldHash($row['PrimaryEmbrologist']); // PrimaryEmbrologist
        $hash .= GetFieldHash($row['SecondaryEmbrologist']); // SecondaryEmbrologist
        $hash .= GetFieldHash($row['Incubator']); // Incubator
        $hash .= GetFieldHash($row['location']); // location
        $hash .= GetFieldHash($row['OocyteNo']); // OocyteNo
        $hash .= GetFieldHash($row['Stage']); // Stage
        $hash .= GetFieldHash($row['Remarks']); // Remarks
        $hash .= GetFieldHash($row['vitrificationDate']); // vitrificationDate
        $hash .= GetFieldHash($row['vitriPrimaryEmbryologist']); // vitriPrimaryEmbryologist
        $hash .= GetFieldHash($row['vitriSecondaryEmbryologist']); // vitriSecondaryEmbryologist
        $hash .= GetFieldHash($row['vitriEmbryoNo']); // vitriEmbryoNo
        $hash .= GetFieldHash($row['thawReFrozen']); // thawReFrozen
        $hash .= GetFieldHash($row['vitriFertilisationDate']); // vitriFertilisationDate
        $hash .= GetFieldHash($row['vitriDay']); // vitriDay
        $hash .= GetFieldHash($row['vitriStage']); // vitriStage
        $hash .= GetFieldHash($row['vitriGrade']); // vitriGrade
        $hash .= GetFieldHash($row['vitriIncubator']); // vitriIncubator
        $hash .= GetFieldHash($row['vitriTank']); // vitriTank
        $hash .= GetFieldHash($row['vitriCanister']); // vitriCanister
        $hash .= GetFieldHash($row['vitriGobiet']); // vitriGobiet
        $hash .= GetFieldHash($row['vitriViscotube']); // vitriViscotube
        $hash .= GetFieldHash($row['vitriCryolockNo']); // vitriCryolockNo
        $hash .= GetFieldHash($row['vitriCryolockColour']); // vitriCryolockColour
        $hash .= GetFieldHash($row['thawDate']); // thawDate
        $hash .= GetFieldHash($row['thawPrimaryEmbryologist']); // thawPrimaryEmbryologist
        $hash .= GetFieldHash($row['thawSecondaryEmbryologist']); // thawSecondaryEmbryologist
        $hash .= GetFieldHash($row['thawET']); // thawET
        $hash .= GetFieldHash($row['thawAbserve']); // thawAbserve
        $hash .= GetFieldHash($row['thawDiscard']); // thawDiscard
        $hash .= GetFieldHash($row['ETCatheter']); // ETCatheter
        $hash .= GetFieldHash($row['ETDifficulty']); // ETDifficulty
        $hash .= GetFieldHash($row['ETEasy']); // ETEasy
        $hash .= GetFieldHash($row['ETComments']); // ETComments
        $hash .= GetFieldHash($row['ETDoctor']); // ETDoctor
        $hash .= GetFieldHash($row['ETEmbryologist']); // ETEmbryologist
        $hash .= GetFieldHash($row['ETDate']); // ETDate
        $hash .= GetFieldHash($row['Day1End']); // Day1End
        return md5($hash);
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

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_embryology_chartlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_embryology_chart" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_embryology_chart\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_embryology_chartlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = false;

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
    }

    // Set up search options
    protected function setupSearchOptions()
    {
        global $Language, $Security;
        $pageUrl = $this->pageUrl();
        $this->SearchOptions = new ListOptions("div");
        $this->SearchOptions->TagClassName = "ew-search-option";

        // Search button
        $item = &$this->SearchOptions->add("searchtoggle");
        $searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_embryology_chartlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Button group for search
        $this->SearchOptions->UseDropDownButton = false;
        $this->SearchOptions->UseButtonGroup = true;
        $this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

        // Add group option item
        $item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Hide search options
        if ($this->isExport() || $this->CurrentAction) {
            $this->SearchOptions->hideAllOptions();
        }
        if (!$Security->canSearch()) {
            $this->SearchOptions->hideAllOptions();
            $this->FilterOptions->hideAllOptions();
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
        $this->TotalRecords = $this->listRecordCount();
        $this->StartRecord = 1;

        // Export all
        if ($this->ExportAll) {
            if (Config("EXPORT_ALL_TIME_LIMIT") >= 0) {
                @set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
            }
            $this->DisplayRecords = $this->TotalRecords;
            $this->StopRecord = $this->TotalRecords;
        } else { // Export one page only
            $this->setupStartRecord(); // Set up start record position
            // Set the last record to display
            if ($this->DisplayRecords <= 0) {
                $this->StopRecord = $this->TotalRecords;
            } else {
                $this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
            }
        }
        $rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
        $this->ExportDoc = GetExportDocument($this, "h");
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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_treatment_plan") {
            $ivf_treatment_plan = Container("ivf_treatment_plan");
            $rsmaster = $ivf_treatment_plan->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $ivf_treatment_plan;
                    $ivf_treatment_plan->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ivf_oocytedenudation") {
            $ivf_oocytedenudation = Container("ivf_oocytedenudation");
            $rsmaster = $ivf_oocytedenudation->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $ivf_oocytedenudation;
                    $ivf_oocytedenudation->exportDocument($doc, new Recordset($rsmaster));
                    $doc->exportEmptyRow();
                    $doc->Table = &$this;
                }
                $doc->setStyle($exportStyle); // Restore
                $rsmaster->closeCursor();
            }
        }
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        $doc->Text .= $header;
        $this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
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

            // Update URL
            $this->AddUrl = $this->addMasterUrl($this->AddUrl);
            $this->InlineAddUrl = $this->addMasterUrl($this->InlineAddUrl);
            $this->GridAddUrl = $this->addMasterUrl($this->GridAddUrl);
            $this->GridEditUrl = $this->addMasterUrl($this->GridEditUrl);

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
        $url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
        $Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, true);
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
    public function pageLoad() {
    	//echo "Page Load";
    		//$this->GridAddRowCount = 40;
    if($_GET["page"] == '')
    {
    $this->id->Visible = FALSE;
    $this->RIDNo->Visible = FALSE;
    $this->Name->Visible = FALSE;
    $this->ARTCycle->Visible = FALSE;
    $this->SpermOrigin->Visible = FALSE;
    $this->InseminatinTechnique->Visible = FALSE;
    $this->IndicationForART->Visible = FALSE;
     $this->Day6Cryoptop->Visible = FALSE;
    $this->TidNo->Visible = FALSE;
    $this->DidNO->Visible = FALSE;
    $this->ICSiIVFDateTime->Visible = FALSE;
    $this->PrimaryEmbrologist->Visible = FALSE;
    $this->SecondaryEmbrologist->Visible = FALSE;
    $this->Incubator->Visible = FALSE;
    $this->location->Visible = FALSE;
    $this->Day0sino->Visible = FALSE;
    $this->Day0OocyteStage->Visible = FALSE;
    $this->Day0PolarBodyPosition->Visible = FALSE;
    $this->Day0Breakage->Visible = FALSE;
    $this->Day0Attempts->Visible = FALSE;
    $this->Day0SPZMorpho->Visible = FALSE;
    $this->Day0SPZLocation->Visible = FALSE;
    $this->Day0SpOrgin->Visible = FALSE;
    $this->Day5Cryoptop->Visible = FALSE;
    		$this->Day1PN->Visible = FALSE;
    		$this->Day1PB->Visible = FALSE;
    		$this->Day1Pronucleus->Visible = FALSE;
    		$this->Day1Nucleolus->Visible = FALSE;
    		$this->Day1Halo->Visible = FALSE;
    		$this->Day1Sperm->Visible = FALSE;
    $this->Day1End->Visible = FALSE;
    			$this->Day2SiNo->Visible = FALSE;
    		$this->Day2CellNo->Visible = FALSE;
    		$this->Day2Frag->Visible = FALSE;
    		$this->Day2Symmetry->Visible = FALSE;
    		$this->Day2Cryoptop->Visible = FALSE;
    		$this->Day2Grade->Visible = FALSE;
    		$this->Day2End->Visible = FALSE;
    		$this->Day3Sino->Visible = FALSE;		
    		$this->Day3CellNo->Visible = FALSE;
    		$this->Day3Frag->Visible = FALSE;
    		$this->Day3Symmetry->Visible = FALSE;
    		$this->Day3Grade->Visible = FALSE;
    		$this->Day3Vacoules->Visible = FALSE;
    		$this->Day3ZP->Visible = FALSE;		
    		$this->Day3Cryoptop->Visible = FALSE;
    		$this->Day3End->Visible = FALSE;
    		$this->Day4SiNo->Visible = FALSE;
    		$this->Day4CellNo->Visible = FALSE;
    		$this->Day4Frag->Visible = FALSE;
    		$this->Day4Symmetry->Visible = FALSE;
    		$this->Day4Grade->Visible = FALSE;
    		$this->Day4Cryoptop->Visible = FALSE;
    		$this->Day5CellNo->Visible = FALSE;
    		$this->Day5ICM->Visible = FALSE;
    		$this->Day5TE->Visible = FALSE;
    		$this->Day5Observation->Visible = FALSE;
    		$this->Day5Collapsed->Visible = FALSE;
    		$this->Day5Vacoulles->Visible = FALSE;
    		$this->Day5Grade->Visible = FALSE;
    		$this->Day6CellNo->Visible = FALSE;
    		$this->Day6ICM->Visible = FALSE;
    		$this->Day6TE->Visible = FALSE;
    		$this->Day6Observation->Visible = FALSE;
    		$this->Day6Collapsed->Visible = FALSE;		
    		$this->Day6Vacoulles->Visible = FALSE;
    		$this->Day6Grade->Visible = FALSE;
    		$this->EndingDay->Visible = FALSE;
    		$this->EndingCellStage->Visible = FALSE;
    		$this->EndingGrade->Visible = FALSE;
    		$this->EndingState->Visible = FALSE;

    		//===================================
    		$this->vitrificationDate->Visible = FALSE;
    		$this->vitriPrimaryEmbryologist->Visible = FALSE;
    		$this->vitriSecondaryEmbryologist->Visible = FALSE;
    		$this->vitriEmbryoNo->Visible = FALSE;
    		$this->vitriFertilisationDate->Visible = FALSE;
    		$this->vitriDay->Visible = FALSE;
    		$this->vitriGrade->Visible = FALSE;
    		$this->vitriIncubator->Visible = FALSE;
    		$this->vitriTank->Visible = FALSE;
    		$this->vitriCanister->Visible = FALSE;
    		$this->vitriGobiet->Visible = FALSE;
    $this->vitriViscotube->Visible = FALSE;
    		$this->vitriCryolockNo->Visible = FALSE;
    		$this->vitriCryolockColour->Visible = FALSE;
    		$this->vitriStage->Visible = FALSE;
    		$this->thawDate->Visible = FALSE;
    		$this->thawPrimaryEmbryologist->Visible = FALSE;
    		$this->thawSecondaryEmbryologist->Visible = FALSE;
    		$this->thawET->Visible = FALSE;
    		$this->thawReFrozen->Visible = FALSE;
    		$this->thawAbserve->Visible = FALSE;
    		$this->thawDiscard->Visible = FALSE;
    		$this->ETCatheter->Visible = FALSE;
    		$this->ETDifficulty->Visible = FALSE;
    		$this->ETEasy->Visible = FALSE;
    		$this->ETComments->Visible = FALSE;
    		$this->ETDoctor->Visible = FALSE;
    		$this->ETEmbryologist->Visible = FALSE;
    	$this->ETDate->Visible = FALSE;
    		$this->EndSiNo->Visible = FALSE;
    		$this->Day4End->Visible = FALSE;

    		//=====================================
    }else{
    $this->id->Visible = FALSE;
    $this->RIDNo->Visible = FALSE;
    $this->Name->Visible = FALSE;
    $this->ARTCycle->Visible = FALSE;
    $this->SpermOrigin->Visible = FALSE;
    $this->InseminatinTechnique->Visible = FALSE;
    $this->IndicationForART->Visible = FALSE;
     $this->Day6Cryoptop->Visible = FALSE;
    $this->TidNo->Visible = FALSE;
    $this->DidNO->Visible = FALSE;
    $this->ICSiIVFDateTime->Visible = FALSE;
    $this->PrimaryEmbrologist->Visible = FALSE;
    $this->SecondaryEmbrologist->Visible = FALSE;
    $this->Incubator->Visible = FALSE;
    $this->location->Visible = FALSE;
    $this->Day0sino->Visible = FALSE;
    $this->Day0OocyteStage->Visible = FALSE;
    $this->Day0PolarBodyPosition->Visible = FALSE;
    $this->Day0Breakage->Visible = FALSE;
    $this->Day0Attempts->Visible = FALSE;
    $this->Day0SPZMorpho->Visible = FALSE;
    $this->Day0SPZLocation->Visible = FALSE;
    $this->Day0SpOrgin->Visible = FALSE;
    $this->Day5Cryoptop->Visible = FALSE;
    		$this->Day1PN->Visible = FALSE;
    		$this->Day1PB->Visible = FALSE;
    		$this->Day1Pronucleus->Visible = FALSE;
    		$this->Day1Nucleolus->Visible = FALSE;
    		$this->Day1Halo->Visible = FALSE;
    		$this->Day1Sperm->Visible = FALSE;
    		$this->Day1End->Visible = FALSE;				
    		$this->Day2SiNo->Visible = FALSE;
    		$this->Day2CellNo->Visible = FALSE;
    		$this->Day2Frag->Visible = FALSE;
    		$this->Day2Symmetry->Visible = FALSE;
    		$this->Day2Cryoptop->Visible = FALSE;
    		$this->Day2Grade->Visible = FALSE;
    $this->Day2End->Visible = FALSE;
    		$this->Day3Sino->Visible = FALSE;		
    		$this->Day3CellNo->Visible = FALSE;
    		$this->Day3Frag->Visible = FALSE;
    		$this->Day3Symmetry->Visible = FALSE;
    		$this->Day3Grade->Visible = FALSE;
    		$this->Day3Vacoules->Visible = FALSE;
    		$this->Day3ZP->Visible = FALSE;		
    		$this->Day3Cryoptop->Visible = FALSE;
    		$this->Day3End->Visible = FALSE;
    		$this->Day4SiNo->Visible = FALSE;
    		$this->Day4CellNo->Visible = FALSE;
    		$this->Day4Frag->Visible = FALSE;
    		$this->Day4Symmetry->Visible = FALSE;
    		$this->Day4Grade->Visible = FALSE;
    		$this->Day4Cryoptop->Visible = FALSE;
    		$this->Day5CellNo->Visible = FALSE;
    		$this->Day5ICM->Visible = FALSE;
    		$this->Day5TE->Visible = FALSE;
    		$this->Day5Observation->Visible = FALSE;
    		$this->Day5Collapsed->Visible = FALSE;
    		$this->Day5Vacoulles->Visible = FALSE;
    		$this->Day5Grade->Visible = FALSE;
    		$this->Day6CellNo->Visible = FALSE;
    		$this->Day6ICM->Visible = FALSE;
    		$this->Day6TE->Visible = FALSE;
    		$this->Day6Observation->Visible = FALSE;
    		$this->Day6Collapsed->Visible = FALSE;		
    		$this->Day6Vacoulles->Visible = FALSE;
    		$this->Day6Grade->Visible = FALSE;
    		$this->EndingDay->Visible = FALSE;
    		$this->EndingCellStage->Visible = FALSE;
    		$this->EndingGrade->Visible = FALSE;
    		$this->EndingState->Visible = FALSE;

    		//===================================
    		$this->vitrificationDate->Visible = FALSE;
    		$this->vitriPrimaryEmbryologist->Visible = FALSE;
    		$this->vitriSecondaryEmbryologist->Visible = FALSE;
    		$this->vitriEmbryoNo->Visible = FALSE;
    		$this->vitriFertilisationDate->Visible = FALSE;
    		$this->vitriDay->Visible = FALSE;
    		$this->vitriGrade->Visible = FALSE;
    		$this->vitriIncubator->Visible = FALSE;
    		$this->vitriTank->Visible = FALSE;
    		$this->vitriCanister->Visible = FALSE;
    		$this->vitriGobiet->Visible = FALSE;
    $this->vitriViscotube->Visible = FALSE;
    		$this->vitriCryolockNo->Visible = FALSE;
    		$this->vitriCryolockColour->Visible = FALSE;
    		$this->vitriStage->Visible = FALSE;
    		$this->thawDate->Visible = FALSE;
    		$this->thawPrimaryEmbryologist->Visible = FALSE;
    		$this->thawSecondaryEmbryologist->Visible = FALSE;
    		$this->thawET->Visible = FALSE;
    		$this->thawReFrozen->Visible = FALSE;
    		$this->thawAbserve->Visible = FALSE;
    		$this->thawDiscard->Visible = FALSE;
    		$this->ETCatheter->Visible = FALSE;
    		$this->ETDifficulty->Visible = FALSE;
    		$this->ETEasy->Visible = FALSE;
    		$this->ETComments->Visible = FALSE;
    		$this->ETDoctor->Visible = FALSE;
    		$this->ETEmbryologist->Visible = FALSE;
    	$this->ETDate->Visible = FALSE;
    				$this->EndSiNo->Visible = FALSE;
    		$this->Day4End->Visible = FALSE;

    		//=====================================
    }
    			if($_GET["page"] == 'page0')
    			{
    				$this->Day0sino->Visible = TRUE;
    				$this->Day0OocyteStage->Visible = TRUE;
    				$this->Day0PolarBodyPosition->Visible = TRUE;
    				$this->Day0Breakage->Visible = TRUE;
    				$this->Day0Attempts->Visible = TRUE;
    				$this->Day0SPZMorpho->Visible = TRUE;
    				$this->Day0SPZLocation->Visible = TRUE;
    				$this->Day0SpOrgin->Visible = TRUE;
    				$this->Day5Cryoptop->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page1')
    			{
    				$this->Day1PN->Visible = TRUE;
    				$this->Day1PB->Visible = TRUE;
    				$this->Day1Pronucleus->Visible = TRUE;
    				$this->Day1Nucleolus->Visible = TRUE;
    				$this->Day1Halo->Visible = TRUE;
    				$this->Day1Sperm->Visible = TRUE;
    $this->Day1End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page2')
    			{
    			$this->Day2SiNo->Visible = TRUE;
    				$this->Day2CellNo->Visible = TRUE;
    				$this->Day2Frag->Visible = TRUE;
    				$this->Day2Symmetry->Visible = TRUE;
    				$this->Day2Cryoptop->Visible = TRUE;
    				$this->Day2Grade->Visible = TRUE;
    $this->Day2End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page3')
    			{
    				$this->Day3Sino->Visible = TRUE;
    				$this->Day3CellNo->Visible = TRUE;
    				$this->Day3Frag->Visible = TRUE;
    				$this->Day3Symmetry->Visible = TRUE;
    				$this->Day3Grade->Visible = TRUE;
    				$this->Day3Vacoules->Visible = TRUE;
    				$this->Day3ZP->Visible = TRUE;
    				$this->Day3Cryoptop->Visible = TRUE;
    				$this->Day3End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page4')
    			{
    				$this->Day4SiNo->Visible = TRUE;
    				$this->Day4CellNo->Visible = TRUE;
    				$this->Day4Frag->Visible = TRUE;
    				$this->Day4Symmetry->Visible = TRUE;
    				$this->Day4Grade->Visible = TRUE;
    				$this->Day4Cryoptop->Visible = TRUE;
    				$this->Day4End->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page5')
    			{
    				$this->Day5CellNo->Visible = TRUE;
    				$this->Day5ICM->Visible = TRUE;
    				$this->Day5TE->Visible = TRUE;
    				$this->Day5Observation->Visible = TRUE;
    				$this->Day5Collapsed->Visible = TRUE;
    				$this->Day5Vacoulles->Visible = TRUE;
    				$this->Day5Grade->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'page6')
    			{
    				$this->Day6CellNo->Visible = TRUE;
    				$this->Day6ICM->Visible = TRUE;
    				$this->Day6TE->Visible = TRUE;
    				$this->Day6Observation->Visible = TRUE;
    				$this->Day6Collapsed->Visible = TRUE;
    				$this->Day6Vacoulles->Visible = TRUE;
    				$this->Day6Grade->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'pageEnd')
    			{
    					$this->EndSiNo->Visible = TRUE;
    				$this->EndingDay->Visible = TRUE;
    				$this->EndingCellStage->Visible = TRUE;
    				$this->EndingGrade->Visible = TRUE;
    				$this->EndingState->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    			if($_GET["page"] == 'pageAll')
    			{
    				$this->Day0sino->Visible = TRUE;
    				$this->Day0OocyteStage->Visible = TRUE;
    				$this->Day0PolarBodyPosition->Visible = TRUE;
    				$this->Day0Breakage->Visible = TRUE;
    				$this->Day0Attempts->Visible = TRUE;
    				$this->Day0SPZMorpho->Visible = TRUE;
    				$this->Day0SPZLocation->Visible = TRUE;
    				$this->Day0SpOrgin->Visible = TRUE;
    				$this->Day5Cryoptop->Visible = TRUE;
    				$this->Day1PN->Visible = TRUE;
    				$this->Day1PB->Visible = TRUE;
    				$this->Day1Pronucleus->Visible = TRUE;
    				$this->Day1Nucleolus->Visible = TRUE;
    				$this->Day1Halo->Visible = TRUE;
    				$this->Day1Sperm->Visible = TRUE;
    				$this->Day1End->Visible = TRUE;
    				$this->Day2SiNo->Visible = TRUE;
    				$this->Day2CellNo->Visible = TRUE;
    				$this->Day2Frag->Visible = TRUE;
    				$this->Day2Symmetry->Visible = TRUE;
    				$this->Day2Cryoptop->Visible = TRUE;
    				$this->Day2Grade->Visible = TRUE;
    				$this->Day2End->Visible = TRUE;
    				$this->Day3Sino->Visible = TRUE;
    				$this->Day3CellNo->Visible = TRUE;
    				$this->Day3Frag->Visible = TRUE;
    				$this->Day3Symmetry->Visible = TRUE;
    				$this->Day3Grade->Visible = TRUE;
    				$this->Day3Vacoules->Visible = TRUE;
    				$this->Day3ZP->Visible = TRUE;
    				$this->Day3Cryoptop->Visible = TRUE;
    				$this->Day3End->Visible = TRUE;
    				$this->Day4SiNo->Visible = TRUE;
    				$this->Day4CellNo->Visible = TRUE;
    				$this->Day4Frag->Visible = TRUE;
    				$this->Day4Symmetry->Visible = TRUE;
    				$this->Day4Grade->Visible = TRUE;
    				$this->Day4Cryoptop->Visible = TRUE;
    				$this->Day4End->Visible = TRUE;
    $this->Day5CellNo->Visible = TRUE;
    				$this->Day5ICM->Visible = TRUE;
    				$this->Day5TE->Visible = TRUE;
    				$this->Day5Observation->Visible = TRUE;
    				$this->Day5Collapsed->Visible = TRUE;
    				$this->Day5Vacoulles->Visible = TRUE;
    				$this->Day5Grade->Visible = TRUE;
    				$this->Day6CellNo->Visible = TRUE;
    				$this->Day6ICM->Visible = TRUE;
    				$this->Day6TE->Visible = TRUE;
    				$this->Day6Observation->Visible = TRUE;
    				$this->Day6Collapsed->Visible = TRUE;
    				$this->Day6Vacoulles->Visible = TRUE;
    				$this->Day6Grade->Visible = TRUE;
    									$this->EndSiNo->Visible = TRUE;
    				$this->EndingDay->Visible = TRUE;
    				$this->EndingCellStage->Visible = TRUE;
    				$this->EndingGrade->Visible = TRUE;
    				$this->EndingState->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    			}
    		if($_GET["page"] == 'Vitrification')
    		{
    			$this->vitrificationDate->Visible = FALSE;
    			$this->vitriPrimaryEmbryologist->Visible = FALSE;
    			$this->vitriSecondaryEmbryologist->Visible = FALSE;
    			$this->vitriFertilisationDate->Visible = FALSE;
    			$this->vitriEmbryoNo->Visible = TRUE;
    			$this->vitriDay->Visible = TRUE;
    			$this->vitriGrade->Visible = TRUE;
    			$this->vitriIncubator->Visible = TRUE;
    			$this->vitriTank->Visible = TRUE;
    			$this->vitriCanister->Visible = TRUE;
    			$this->vitriGobiet->Visible = TRUE;
    $this->vitriViscotube->Visible = TRUE;
    			$this->vitriCryolockNo->Visible = TRUE;
    			$this->vitriCryolockColour->Visible = TRUE;
    			$this->vitriStage->Visible = TRUE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    		if($_GET["page"] == 'Thawing')
    		{
    					$this->vitriEmbryoNo->Visible = TRUE;
    			$this->vitriDay->Visible = TRUE;
    			$this->vitriGrade->Visible = TRUE;
    			$this->vitriIncubator->Visible = TRUE;
    			$this->vitriTank->Visible = TRUE;
    			$this->vitriCanister->Visible = TRUE;
    			$this->vitriGobiet->Visible = TRUE;
    			$this->vitriCryolockNo->Visible = TRUE;
    			$this->vitriCryolockColour->Visible = TRUE;
    			$this->vitriStage->Visible = TRUE;
    			$this->thawDate->Visible = FALSE;
    			$this->thawPrimaryEmbryologist->Visible = FALSE;
    			$this->thawSecondaryEmbryologist->Visible = FALSE;
    			$this->thawET->Visible = TRUE;
    			$this->thawReFrozen->Visible = TRUE;
    			$this->thawAbserve->Visible = FALSE;
    			$this->thawDiscard->Visible = FALSE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    		if($_GET["page"] == 'EmbryoTransfer')
    		{
    		//	$this->thawDiscard->Visible = TRUE;
    					$this->EndSiNo->Visible = TRUE;
    				$this->EndingDay->Visible = TRUE;
    				$this->EndingCellStage->Visible = TRUE;
    				$this->EndingGrade->Visible = TRUE;
    			$this->ETCatheter->Visible = TRUE;
    			$this->ETDifficulty->Visible = TRUE;
    			$this->ETEasy->Visible = TRUE;
    			$this->ETComments->Visible = FALSE;
    			$this->ETDoctor->Visible = FALSE;
    			$this->ETEmbryologist->Visible = FALSE;
    			$this->ETDate->Visible = FALSE;
    				$this->Remarks->Visible = FALSE;
    				$this->OocyteNo->Visible = FALSE;
    				$this->Stage->Visible = FALSE;
    		}
    }

    // Page Unload event
    public function pageUnload()
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(&$url) {
    	// Example:
    	//$url = "your URL";

    //	$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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

    // ListOptions Load event
    public function listOptionsLoad()
    {
        // Example:
        //$opt = &$this->ListOptions->Add("new");
        //$opt->Header = "xxx";
        //$opt->OnLeft = true; // Link on left
        //$opt->MoveTo(0); // Move to first column
    }

    // ListOptions Rendering event
    public function listOptionsRendering()
    {
        //Container("DetailTableGrid")->DetailAdd = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailEdit = (...condition...); // Set to true or false conditionally
        //Container("DetailTableGrid")->DetailView = (...condition...); // Set to true or false conditionally
    }

    // ListOptions Rendered event
    public function listOptionsRendered()
    {
        // Example:
        //$this->ListOptions["new"]->Body = "xxx";
    }

    // Row Custom Action event
    public function rowCustomAction($action, $row)
    {
        // Return false to abort
        return true;
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

    // Page Importing event
    public function pageImporting($reader, &$options)
    {
        //var_dump($reader); // Import data reader
        //var_dump($options); // Show all options for importing
        //return false; // Return false to skip import
        return true;
    }

    // Row Import event
    public function rowImport(&$row, $cnt)
    {
        //Log($cnt); // Import record count
        //var_dump($row); // Import row
        //return false; // Return false to skip import
        return true;
    }

    // Page Imported event
    public function pageImported($reader, $results)
    {
        //var_dump($reader); // Import data reader
        //var_dump($results); // Import results
    }
}
