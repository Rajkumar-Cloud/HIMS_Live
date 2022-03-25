<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfArtSummaryList extends IvfArtSummary
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_art_summary';

    // Page object name
    public $PageObjName = "IvfArtSummaryList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fivf_art_summarylist";
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

        // Table object (ivf_art_summary)
        if (!isset($GLOBALS["ivf_art_summary"]) || get_class($GLOBALS["ivf_art_summary"]) == PROJECT_NAMESPACE . "ivf_art_summary") {
            $GLOBALS["ivf_art_summary"] = &$this;
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
        $this->AddUrl = "IvfArtSummaryAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "IvfArtSummaryDelete";
        $this->MultiUpdateUrl = "IvfArtSummaryUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_art_summary');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fivf_art_summarylistsrch";

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
                $doc = new $class(Container("ivf_art_summary"));
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
    public $DisplayRecords = 20;
    public $StartRecord;
    public $StopRecord;
    public $TotalRecords = 0;
    public $RecordRange = 10;
    public $PageSizes = "20,40,60,100,500,1000,-1"; // Page sizes (comma separated)
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
        $this->ARTCycle->setVisibility();
        $this->Spermorigin->setVisibility();
        $this->IndicationforART->setVisibility();
        $this->DateofICSI->setVisibility();
        $this->Origin->setVisibility();
        $this->Status->setVisibility();
        $this->Method->setVisibility();
        $this->pre_Concentration->setVisibility();
        $this->pre_Motility->setVisibility();
        $this->pre_Morphology->setVisibility();
        $this->post_Concentration->setVisibility();
        $this->post_Motility->setVisibility();
        $this->post_Morphology->setVisibility();
        $this->NumberofEmbryostransferred->setVisibility();
        $this->Embryosunderobservation->setVisibility();
        $this->EmbryoDevelopmentSummary->setVisibility();
        $this->EmbryologistSignature->setVisibility();
        $this->IVFRegistrationID->setVisibility();
        $this->InseminatinTechnique->setVisibility();
        $this->ICSIDetails->setVisibility();
        $this->DateofET->setVisibility();
        $this->Reasonfornotranfer->setVisibility();
        $this->EmbryosCryopreserved->setVisibility();
        $this->LegendCellStage->setVisibility();
        $this->ConsultantsSignature->setVisibility();
        $this->Name->setVisibility();
        $this->M2->setVisibility();
        $this->Mi2->setVisibility();
        $this->ICSI->setVisibility();
        $this->IVF->setVisibility();
        $this->M1->setVisibility();
        $this->GV->setVisibility();
        $this->_Others->setVisibility();
        $this->Normal2PN->setVisibility();
        $this->Abnormalfertilisation1N->setVisibility();
        $this->Abnormalfertilisation3N->setVisibility();
        $this->NotFertilized->setVisibility();
        $this->Degenerated->setVisibility();
        $this->SpermDate->setVisibility();
        $this->Code1->setVisibility();
        $this->Day1->setVisibility();
        $this->CellStage1->setVisibility();
        $this->Grade1->setVisibility();
        $this->State1->setVisibility();
        $this->Code2->setVisibility();
        $this->Day2->setVisibility();
        $this->CellStage2->setVisibility();
        $this->Grade2->setVisibility();
        $this->State2->setVisibility();
        $this->Code3->setVisibility();
        $this->Day3->setVisibility();
        $this->CellStage3->setVisibility();
        $this->Grade3->setVisibility();
        $this->State3->setVisibility();
        $this->Code4->setVisibility();
        $this->Day4->setVisibility();
        $this->CellStage4->setVisibility();
        $this->Grade4->setVisibility();
        $this->State4->setVisibility();
        $this->Code5->setVisibility();
        $this->Day5->setVisibility();
        $this->CellStage5->setVisibility();
        $this->Grade5->setVisibility();
        $this->State5->setVisibility();
        $this->TidNo->setVisibility();
        $this->RIDNo->setVisibility();
        $this->Volume->setVisibility();
        $this->Volume1->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total->setVisibility();
        $this->Total1->setVisibility();
        $this->Total2->setVisibility();
        $this->Progressive->setVisibility();
        $this->Progressive1->setVisibility();
        $this->Progressive2->setVisibility();
        $this->NotProgressive->setVisibility();
        $this->NotProgressive1->setVisibility();
        $this->NotProgressive2->setVisibility();
        $this->Motility2->setVisibility();
        $this->Morphology2->setVisibility();
        $this->hideFieldsForAddEdit();

        // Global Page Loading event (in userfn*.php)
        Page_Loading();

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

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
        $this->setupLookupOptions($this->ConsultantsSignature);

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
            $this->DisplayRecords = 20; // Load default
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
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

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
                    $this->DisplayRecords = 20; // Non-numeric, load default
                }
            }
            $this->setRecordsPerPage($this->DisplayRecords); // Save to Session
            // Reset start position
            $this->StartRecord = 1;
            $this->setStartRecordNumber($this->StartRecord);
        }
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

    // Get list of filters
    public function getFilterList()
    {
        global $UserProfile;

        // Initialize
        $filterList = "";
        $savedFilterList = "";

        // Load server side filters
        if (Config("SEARCH_FILTER_OPTION") == "Server" && isset($UserProfile)) {
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fivf_art_summarylistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->ARTCycle->AdvancedSearch->toJson(), ","); // Field ARTCycle
        $filterList = Concat($filterList, $this->Spermorigin->AdvancedSearch->toJson(), ","); // Field Spermorigin
        $filterList = Concat($filterList, $this->IndicationforART->AdvancedSearch->toJson(), ","); // Field IndicationforART
        $filterList = Concat($filterList, $this->DateofICSI->AdvancedSearch->toJson(), ","); // Field DateofICSI
        $filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
        $filterList = Concat($filterList, $this->Status->AdvancedSearch->toJson(), ","); // Field Status
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->pre_Concentration->AdvancedSearch->toJson(), ","); // Field pre_Concentration
        $filterList = Concat($filterList, $this->pre_Motility->AdvancedSearch->toJson(), ","); // Field pre_Motility
        $filterList = Concat($filterList, $this->pre_Morphology->AdvancedSearch->toJson(), ","); // Field pre_Morphology
        $filterList = Concat($filterList, $this->post_Concentration->AdvancedSearch->toJson(), ","); // Field post_Concentration
        $filterList = Concat($filterList, $this->post_Motility->AdvancedSearch->toJson(), ","); // Field post_Motility
        $filterList = Concat($filterList, $this->post_Morphology->AdvancedSearch->toJson(), ","); // Field post_Morphology
        $filterList = Concat($filterList, $this->NumberofEmbryostransferred->AdvancedSearch->toJson(), ","); // Field NumberofEmbryostransferred
        $filterList = Concat($filterList, $this->Embryosunderobservation->AdvancedSearch->toJson(), ","); // Field Embryosunderobservation
        $filterList = Concat($filterList, $this->EmbryoDevelopmentSummary->AdvancedSearch->toJson(), ","); // Field EmbryoDevelopmentSummary
        $filterList = Concat($filterList, $this->EmbryologistSignature->AdvancedSearch->toJson(), ","); // Field EmbryologistSignature
        $filterList = Concat($filterList, $this->IVFRegistrationID->AdvancedSearch->toJson(), ","); // Field IVFRegistrationID
        $filterList = Concat($filterList, $this->InseminatinTechnique->AdvancedSearch->toJson(), ","); // Field InseminatinTechnique
        $filterList = Concat($filterList, $this->ICSIDetails->AdvancedSearch->toJson(), ","); // Field ICSIDetails
        $filterList = Concat($filterList, $this->DateofET->AdvancedSearch->toJson(), ","); // Field DateofET
        $filterList = Concat($filterList, $this->Reasonfornotranfer->AdvancedSearch->toJson(), ","); // Field Reasonfornotranfer
        $filterList = Concat($filterList, $this->EmbryosCryopreserved->AdvancedSearch->toJson(), ","); // Field EmbryosCryopreserved
        $filterList = Concat($filterList, $this->LegendCellStage->AdvancedSearch->toJson(), ","); // Field LegendCellStage
        $filterList = Concat($filterList, $this->ConsultantsSignature->AdvancedSearch->toJson(), ","); // Field ConsultantsSignature
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->M2->AdvancedSearch->toJson(), ","); // Field M2
        $filterList = Concat($filterList, $this->Mi2->AdvancedSearch->toJson(), ","); // Field Mi2
        $filterList = Concat($filterList, $this->ICSI->AdvancedSearch->toJson(), ","); // Field ICSI
        $filterList = Concat($filterList, $this->IVF->AdvancedSearch->toJson(), ","); // Field IVF
        $filterList = Concat($filterList, $this->M1->AdvancedSearch->toJson(), ","); // Field M1
        $filterList = Concat($filterList, $this->GV->AdvancedSearch->toJson(), ","); // Field GV
        $filterList = Concat($filterList, $this->_Others->AdvancedSearch->toJson(), ","); // Field Others
        $filterList = Concat($filterList, $this->Normal2PN->AdvancedSearch->toJson(), ","); // Field Normal2PN
        $filterList = Concat($filterList, $this->Abnormalfertilisation1N->AdvancedSearch->toJson(), ","); // Field Abnormalfertilisation1N
        $filterList = Concat($filterList, $this->Abnormalfertilisation3N->AdvancedSearch->toJson(), ","); // Field Abnormalfertilisation3N
        $filterList = Concat($filterList, $this->NotFertilized->AdvancedSearch->toJson(), ","); // Field NotFertilized
        $filterList = Concat($filterList, $this->Degenerated->AdvancedSearch->toJson(), ","); // Field Degenerated
        $filterList = Concat($filterList, $this->SpermDate->AdvancedSearch->toJson(), ","); // Field SpermDate
        $filterList = Concat($filterList, $this->Code1->AdvancedSearch->toJson(), ","); // Field Code1
        $filterList = Concat($filterList, $this->Day1->AdvancedSearch->toJson(), ","); // Field Day1
        $filterList = Concat($filterList, $this->CellStage1->AdvancedSearch->toJson(), ","); // Field CellStage1
        $filterList = Concat($filterList, $this->Grade1->AdvancedSearch->toJson(), ","); // Field Grade1
        $filterList = Concat($filterList, $this->State1->AdvancedSearch->toJson(), ","); // Field State1
        $filterList = Concat($filterList, $this->Code2->AdvancedSearch->toJson(), ","); // Field Code2
        $filterList = Concat($filterList, $this->Day2->AdvancedSearch->toJson(), ","); // Field Day2
        $filterList = Concat($filterList, $this->CellStage2->AdvancedSearch->toJson(), ","); // Field CellStage2
        $filterList = Concat($filterList, $this->Grade2->AdvancedSearch->toJson(), ","); // Field Grade2
        $filterList = Concat($filterList, $this->State2->AdvancedSearch->toJson(), ","); // Field State2
        $filterList = Concat($filterList, $this->Code3->AdvancedSearch->toJson(), ","); // Field Code3
        $filterList = Concat($filterList, $this->Day3->AdvancedSearch->toJson(), ","); // Field Day3
        $filterList = Concat($filterList, $this->CellStage3->AdvancedSearch->toJson(), ","); // Field CellStage3
        $filterList = Concat($filterList, $this->Grade3->AdvancedSearch->toJson(), ","); // Field Grade3
        $filterList = Concat($filterList, $this->State3->AdvancedSearch->toJson(), ","); // Field State3
        $filterList = Concat($filterList, $this->Code4->AdvancedSearch->toJson(), ","); // Field Code4
        $filterList = Concat($filterList, $this->Day4->AdvancedSearch->toJson(), ","); // Field Day4
        $filterList = Concat($filterList, $this->CellStage4->AdvancedSearch->toJson(), ","); // Field CellStage4
        $filterList = Concat($filterList, $this->Grade4->AdvancedSearch->toJson(), ","); // Field Grade4
        $filterList = Concat($filterList, $this->State4->AdvancedSearch->toJson(), ","); // Field State4
        $filterList = Concat($filterList, $this->Code5->AdvancedSearch->toJson(), ","); // Field Code5
        $filterList = Concat($filterList, $this->Day5->AdvancedSearch->toJson(), ","); // Field Day5
        $filterList = Concat($filterList, $this->CellStage5->AdvancedSearch->toJson(), ","); // Field CellStage5
        $filterList = Concat($filterList, $this->Grade5->AdvancedSearch->toJson(), ","); // Field Grade5
        $filterList = Concat($filterList, $this->State5->AdvancedSearch->toJson(), ","); // Field State5
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->Volume->AdvancedSearch->toJson(), ","); // Field Volume
        $filterList = Concat($filterList, $this->Volume1->AdvancedSearch->toJson(), ","); // Field Volume1
        $filterList = Concat($filterList, $this->Volume2->AdvancedSearch->toJson(), ","); // Field Volume2
        $filterList = Concat($filterList, $this->Concentration2->AdvancedSearch->toJson(), ","); // Field Concentration2
        $filterList = Concat($filterList, $this->Total->AdvancedSearch->toJson(), ","); // Field Total
        $filterList = Concat($filterList, $this->Total1->AdvancedSearch->toJson(), ","); // Field Total1
        $filterList = Concat($filterList, $this->Total2->AdvancedSearch->toJson(), ","); // Field Total2
        $filterList = Concat($filterList, $this->Progressive->AdvancedSearch->toJson(), ","); // Field Progressive
        $filterList = Concat($filterList, $this->Progressive1->AdvancedSearch->toJson(), ","); // Field Progressive1
        $filterList = Concat($filterList, $this->Progressive2->AdvancedSearch->toJson(), ","); // Field Progressive2
        $filterList = Concat($filterList, $this->NotProgressive->AdvancedSearch->toJson(), ","); // Field NotProgressive
        $filterList = Concat($filterList, $this->NotProgressive1->AdvancedSearch->toJson(), ","); // Field NotProgressive1
        $filterList = Concat($filterList, $this->NotProgressive2->AdvancedSearch->toJson(), ","); // Field NotProgressive2
        $filterList = Concat($filterList, $this->Motility2->AdvancedSearch->toJson(), ","); // Field Motility2
        $filterList = Concat($filterList, $this->Morphology2->AdvancedSearch->toJson(), ","); // Field Morphology2
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fivf_art_summarylistsrch", $filters);
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

        // Field ARTCycle
        $this->ARTCycle->AdvancedSearch->SearchValue = @$filter["x_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator = @$filter["z_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchCondition = @$filter["v_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchValue2 = @$filter["y_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCycle"];
        $this->ARTCycle->AdvancedSearch->save();

        // Field Spermorigin
        $this->Spermorigin->AdvancedSearch->SearchValue = @$filter["x_Spermorigin"];
        $this->Spermorigin->AdvancedSearch->SearchOperator = @$filter["z_Spermorigin"];
        $this->Spermorigin->AdvancedSearch->SearchCondition = @$filter["v_Spermorigin"];
        $this->Spermorigin->AdvancedSearch->SearchValue2 = @$filter["y_Spermorigin"];
        $this->Spermorigin->AdvancedSearch->SearchOperator2 = @$filter["w_Spermorigin"];
        $this->Spermorigin->AdvancedSearch->save();

        // Field IndicationforART
        $this->IndicationforART->AdvancedSearch->SearchValue = @$filter["x_IndicationforART"];
        $this->IndicationforART->AdvancedSearch->SearchOperator = @$filter["z_IndicationforART"];
        $this->IndicationforART->AdvancedSearch->SearchCondition = @$filter["v_IndicationforART"];
        $this->IndicationforART->AdvancedSearch->SearchValue2 = @$filter["y_IndicationforART"];
        $this->IndicationforART->AdvancedSearch->SearchOperator2 = @$filter["w_IndicationforART"];
        $this->IndicationforART->AdvancedSearch->save();

        // Field DateofICSI
        $this->DateofICSI->AdvancedSearch->SearchValue = @$filter["x_DateofICSI"];
        $this->DateofICSI->AdvancedSearch->SearchOperator = @$filter["z_DateofICSI"];
        $this->DateofICSI->AdvancedSearch->SearchCondition = @$filter["v_DateofICSI"];
        $this->DateofICSI->AdvancedSearch->SearchValue2 = @$filter["y_DateofICSI"];
        $this->DateofICSI->AdvancedSearch->SearchOperator2 = @$filter["w_DateofICSI"];
        $this->DateofICSI->AdvancedSearch->save();

        // Field Origin
        $this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
        $this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
        $this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
        $this->Origin->AdvancedSearch->save();

        // Field Status
        $this->Status->AdvancedSearch->SearchValue = @$filter["x_Status"];
        $this->Status->AdvancedSearch->SearchOperator = @$filter["z_Status"];
        $this->Status->AdvancedSearch->SearchCondition = @$filter["v_Status"];
        $this->Status->AdvancedSearch->SearchValue2 = @$filter["y_Status"];
        $this->Status->AdvancedSearch->SearchOperator2 = @$filter["w_Status"];
        $this->Status->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field pre_Concentration
        $this->pre_Concentration->AdvancedSearch->SearchValue = @$filter["x_pre_Concentration"];
        $this->pre_Concentration->AdvancedSearch->SearchOperator = @$filter["z_pre_Concentration"];
        $this->pre_Concentration->AdvancedSearch->SearchCondition = @$filter["v_pre_Concentration"];
        $this->pre_Concentration->AdvancedSearch->SearchValue2 = @$filter["y_pre_Concentration"];
        $this->pre_Concentration->AdvancedSearch->SearchOperator2 = @$filter["w_pre_Concentration"];
        $this->pre_Concentration->AdvancedSearch->save();

        // Field pre_Motility
        $this->pre_Motility->AdvancedSearch->SearchValue = @$filter["x_pre_Motility"];
        $this->pre_Motility->AdvancedSearch->SearchOperator = @$filter["z_pre_Motility"];
        $this->pre_Motility->AdvancedSearch->SearchCondition = @$filter["v_pre_Motility"];
        $this->pre_Motility->AdvancedSearch->SearchValue2 = @$filter["y_pre_Motility"];
        $this->pre_Motility->AdvancedSearch->SearchOperator2 = @$filter["w_pre_Motility"];
        $this->pre_Motility->AdvancedSearch->save();

        // Field pre_Morphology
        $this->pre_Morphology->AdvancedSearch->SearchValue = @$filter["x_pre_Morphology"];
        $this->pre_Morphology->AdvancedSearch->SearchOperator = @$filter["z_pre_Morphology"];
        $this->pre_Morphology->AdvancedSearch->SearchCondition = @$filter["v_pre_Morphology"];
        $this->pre_Morphology->AdvancedSearch->SearchValue2 = @$filter["y_pre_Morphology"];
        $this->pre_Morphology->AdvancedSearch->SearchOperator2 = @$filter["w_pre_Morphology"];
        $this->pre_Morphology->AdvancedSearch->save();

        // Field post_Concentration
        $this->post_Concentration->AdvancedSearch->SearchValue = @$filter["x_post_Concentration"];
        $this->post_Concentration->AdvancedSearch->SearchOperator = @$filter["z_post_Concentration"];
        $this->post_Concentration->AdvancedSearch->SearchCondition = @$filter["v_post_Concentration"];
        $this->post_Concentration->AdvancedSearch->SearchValue2 = @$filter["y_post_Concentration"];
        $this->post_Concentration->AdvancedSearch->SearchOperator2 = @$filter["w_post_Concentration"];
        $this->post_Concentration->AdvancedSearch->save();

        // Field post_Motility
        $this->post_Motility->AdvancedSearch->SearchValue = @$filter["x_post_Motility"];
        $this->post_Motility->AdvancedSearch->SearchOperator = @$filter["z_post_Motility"];
        $this->post_Motility->AdvancedSearch->SearchCondition = @$filter["v_post_Motility"];
        $this->post_Motility->AdvancedSearch->SearchValue2 = @$filter["y_post_Motility"];
        $this->post_Motility->AdvancedSearch->SearchOperator2 = @$filter["w_post_Motility"];
        $this->post_Motility->AdvancedSearch->save();

        // Field post_Morphology
        $this->post_Morphology->AdvancedSearch->SearchValue = @$filter["x_post_Morphology"];
        $this->post_Morphology->AdvancedSearch->SearchOperator = @$filter["z_post_Morphology"];
        $this->post_Morphology->AdvancedSearch->SearchCondition = @$filter["v_post_Morphology"];
        $this->post_Morphology->AdvancedSearch->SearchValue2 = @$filter["y_post_Morphology"];
        $this->post_Morphology->AdvancedSearch->SearchOperator2 = @$filter["w_post_Morphology"];
        $this->post_Morphology->AdvancedSearch->save();

        // Field NumberofEmbryostransferred
        $this->NumberofEmbryostransferred->AdvancedSearch->SearchValue = @$filter["x_NumberofEmbryostransferred"];
        $this->NumberofEmbryostransferred->AdvancedSearch->SearchOperator = @$filter["z_NumberofEmbryostransferred"];
        $this->NumberofEmbryostransferred->AdvancedSearch->SearchCondition = @$filter["v_NumberofEmbryostransferred"];
        $this->NumberofEmbryostransferred->AdvancedSearch->SearchValue2 = @$filter["y_NumberofEmbryostransferred"];
        $this->NumberofEmbryostransferred->AdvancedSearch->SearchOperator2 = @$filter["w_NumberofEmbryostransferred"];
        $this->NumberofEmbryostransferred->AdvancedSearch->save();

        // Field Embryosunderobservation
        $this->Embryosunderobservation->AdvancedSearch->SearchValue = @$filter["x_Embryosunderobservation"];
        $this->Embryosunderobservation->AdvancedSearch->SearchOperator = @$filter["z_Embryosunderobservation"];
        $this->Embryosunderobservation->AdvancedSearch->SearchCondition = @$filter["v_Embryosunderobservation"];
        $this->Embryosunderobservation->AdvancedSearch->SearchValue2 = @$filter["y_Embryosunderobservation"];
        $this->Embryosunderobservation->AdvancedSearch->SearchOperator2 = @$filter["w_Embryosunderobservation"];
        $this->Embryosunderobservation->AdvancedSearch->save();

        // Field EmbryoDevelopmentSummary
        $this->EmbryoDevelopmentSummary->AdvancedSearch->SearchValue = @$filter["x_EmbryoDevelopmentSummary"];
        $this->EmbryoDevelopmentSummary->AdvancedSearch->SearchOperator = @$filter["z_EmbryoDevelopmentSummary"];
        $this->EmbryoDevelopmentSummary->AdvancedSearch->SearchCondition = @$filter["v_EmbryoDevelopmentSummary"];
        $this->EmbryoDevelopmentSummary->AdvancedSearch->SearchValue2 = @$filter["y_EmbryoDevelopmentSummary"];
        $this->EmbryoDevelopmentSummary->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryoDevelopmentSummary"];
        $this->EmbryoDevelopmentSummary->AdvancedSearch->save();

        // Field EmbryologistSignature
        $this->EmbryologistSignature->AdvancedSearch->SearchValue = @$filter["x_EmbryologistSignature"];
        $this->EmbryologistSignature->AdvancedSearch->SearchOperator = @$filter["z_EmbryologistSignature"];
        $this->EmbryologistSignature->AdvancedSearch->SearchCondition = @$filter["v_EmbryologistSignature"];
        $this->EmbryologistSignature->AdvancedSearch->SearchValue2 = @$filter["y_EmbryologistSignature"];
        $this->EmbryologistSignature->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryologistSignature"];
        $this->EmbryologistSignature->AdvancedSearch->save();

        // Field IVFRegistrationID
        $this->IVFRegistrationID->AdvancedSearch->SearchValue = @$filter["x_IVFRegistrationID"];
        $this->IVFRegistrationID->AdvancedSearch->SearchOperator = @$filter["z_IVFRegistrationID"];
        $this->IVFRegistrationID->AdvancedSearch->SearchCondition = @$filter["v_IVFRegistrationID"];
        $this->IVFRegistrationID->AdvancedSearch->SearchValue2 = @$filter["y_IVFRegistrationID"];
        $this->IVFRegistrationID->AdvancedSearch->SearchOperator2 = @$filter["w_IVFRegistrationID"];
        $this->IVFRegistrationID->AdvancedSearch->save();

        // Field InseminatinTechnique
        $this->InseminatinTechnique->AdvancedSearch->SearchValue = @$filter["x_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator = @$filter["z_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchCondition = @$filter["v_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchValue2 = @$filter["y_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->SearchOperator2 = @$filter["w_InseminatinTechnique"];
        $this->InseminatinTechnique->AdvancedSearch->save();

        // Field ICSIDetails
        $this->ICSIDetails->AdvancedSearch->SearchValue = @$filter["x_ICSIDetails"];
        $this->ICSIDetails->AdvancedSearch->SearchOperator = @$filter["z_ICSIDetails"];
        $this->ICSIDetails->AdvancedSearch->SearchCondition = @$filter["v_ICSIDetails"];
        $this->ICSIDetails->AdvancedSearch->SearchValue2 = @$filter["y_ICSIDetails"];
        $this->ICSIDetails->AdvancedSearch->SearchOperator2 = @$filter["w_ICSIDetails"];
        $this->ICSIDetails->AdvancedSearch->save();

        // Field DateofET
        $this->DateofET->AdvancedSearch->SearchValue = @$filter["x_DateofET"];
        $this->DateofET->AdvancedSearch->SearchOperator = @$filter["z_DateofET"];
        $this->DateofET->AdvancedSearch->SearchCondition = @$filter["v_DateofET"];
        $this->DateofET->AdvancedSearch->SearchValue2 = @$filter["y_DateofET"];
        $this->DateofET->AdvancedSearch->SearchOperator2 = @$filter["w_DateofET"];
        $this->DateofET->AdvancedSearch->save();

        // Field Reasonfornotranfer
        $this->Reasonfornotranfer->AdvancedSearch->SearchValue = @$filter["x_Reasonfornotranfer"];
        $this->Reasonfornotranfer->AdvancedSearch->SearchOperator = @$filter["z_Reasonfornotranfer"];
        $this->Reasonfornotranfer->AdvancedSearch->SearchCondition = @$filter["v_Reasonfornotranfer"];
        $this->Reasonfornotranfer->AdvancedSearch->SearchValue2 = @$filter["y_Reasonfornotranfer"];
        $this->Reasonfornotranfer->AdvancedSearch->SearchOperator2 = @$filter["w_Reasonfornotranfer"];
        $this->Reasonfornotranfer->AdvancedSearch->save();

        // Field EmbryosCryopreserved
        $this->EmbryosCryopreserved->AdvancedSearch->SearchValue = @$filter["x_EmbryosCryopreserved"];
        $this->EmbryosCryopreserved->AdvancedSearch->SearchOperator = @$filter["z_EmbryosCryopreserved"];
        $this->EmbryosCryopreserved->AdvancedSearch->SearchCondition = @$filter["v_EmbryosCryopreserved"];
        $this->EmbryosCryopreserved->AdvancedSearch->SearchValue2 = @$filter["y_EmbryosCryopreserved"];
        $this->EmbryosCryopreserved->AdvancedSearch->SearchOperator2 = @$filter["w_EmbryosCryopreserved"];
        $this->EmbryosCryopreserved->AdvancedSearch->save();

        // Field LegendCellStage
        $this->LegendCellStage->AdvancedSearch->SearchValue = @$filter["x_LegendCellStage"];
        $this->LegendCellStage->AdvancedSearch->SearchOperator = @$filter["z_LegendCellStage"];
        $this->LegendCellStage->AdvancedSearch->SearchCondition = @$filter["v_LegendCellStage"];
        $this->LegendCellStage->AdvancedSearch->SearchValue2 = @$filter["y_LegendCellStage"];
        $this->LegendCellStage->AdvancedSearch->SearchOperator2 = @$filter["w_LegendCellStage"];
        $this->LegendCellStage->AdvancedSearch->save();

        // Field ConsultantsSignature
        $this->ConsultantsSignature->AdvancedSearch->SearchValue = @$filter["x_ConsultantsSignature"];
        $this->ConsultantsSignature->AdvancedSearch->SearchOperator = @$filter["z_ConsultantsSignature"];
        $this->ConsultantsSignature->AdvancedSearch->SearchCondition = @$filter["v_ConsultantsSignature"];
        $this->ConsultantsSignature->AdvancedSearch->SearchValue2 = @$filter["y_ConsultantsSignature"];
        $this->ConsultantsSignature->AdvancedSearch->SearchOperator2 = @$filter["w_ConsultantsSignature"];
        $this->ConsultantsSignature->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field M2
        $this->M2->AdvancedSearch->SearchValue = @$filter["x_M2"];
        $this->M2->AdvancedSearch->SearchOperator = @$filter["z_M2"];
        $this->M2->AdvancedSearch->SearchCondition = @$filter["v_M2"];
        $this->M2->AdvancedSearch->SearchValue2 = @$filter["y_M2"];
        $this->M2->AdvancedSearch->SearchOperator2 = @$filter["w_M2"];
        $this->M2->AdvancedSearch->save();

        // Field Mi2
        $this->Mi2->AdvancedSearch->SearchValue = @$filter["x_Mi2"];
        $this->Mi2->AdvancedSearch->SearchOperator = @$filter["z_Mi2"];
        $this->Mi2->AdvancedSearch->SearchCondition = @$filter["v_Mi2"];
        $this->Mi2->AdvancedSearch->SearchValue2 = @$filter["y_Mi2"];
        $this->Mi2->AdvancedSearch->SearchOperator2 = @$filter["w_Mi2"];
        $this->Mi2->AdvancedSearch->save();

        // Field ICSI
        $this->ICSI->AdvancedSearch->SearchValue = @$filter["x_ICSI"];
        $this->ICSI->AdvancedSearch->SearchOperator = @$filter["z_ICSI"];
        $this->ICSI->AdvancedSearch->SearchCondition = @$filter["v_ICSI"];
        $this->ICSI->AdvancedSearch->SearchValue2 = @$filter["y_ICSI"];
        $this->ICSI->AdvancedSearch->SearchOperator2 = @$filter["w_ICSI"];
        $this->ICSI->AdvancedSearch->save();

        // Field IVF
        $this->IVF->AdvancedSearch->SearchValue = @$filter["x_IVF"];
        $this->IVF->AdvancedSearch->SearchOperator = @$filter["z_IVF"];
        $this->IVF->AdvancedSearch->SearchCondition = @$filter["v_IVF"];
        $this->IVF->AdvancedSearch->SearchValue2 = @$filter["y_IVF"];
        $this->IVF->AdvancedSearch->SearchOperator2 = @$filter["w_IVF"];
        $this->IVF->AdvancedSearch->save();

        // Field M1
        $this->M1->AdvancedSearch->SearchValue = @$filter["x_M1"];
        $this->M1->AdvancedSearch->SearchOperator = @$filter["z_M1"];
        $this->M1->AdvancedSearch->SearchCondition = @$filter["v_M1"];
        $this->M1->AdvancedSearch->SearchValue2 = @$filter["y_M1"];
        $this->M1->AdvancedSearch->SearchOperator2 = @$filter["w_M1"];
        $this->M1->AdvancedSearch->save();

        // Field GV
        $this->GV->AdvancedSearch->SearchValue = @$filter["x_GV"];
        $this->GV->AdvancedSearch->SearchOperator = @$filter["z_GV"];
        $this->GV->AdvancedSearch->SearchCondition = @$filter["v_GV"];
        $this->GV->AdvancedSearch->SearchValue2 = @$filter["y_GV"];
        $this->GV->AdvancedSearch->SearchOperator2 = @$filter["w_GV"];
        $this->GV->AdvancedSearch->save();

        // Field Others
        $this->_Others->AdvancedSearch->SearchValue = @$filter["x__Others"];
        $this->_Others->AdvancedSearch->SearchOperator = @$filter["z__Others"];
        $this->_Others->AdvancedSearch->SearchCondition = @$filter["v__Others"];
        $this->_Others->AdvancedSearch->SearchValue2 = @$filter["y__Others"];
        $this->_Others->AdvancedSearch->SearchOperator2 = @$filter["w__Others"];
        $this->_Others->AdvancedSearch->save();

        // Field Normal2PN
        $this->Normal2PN->AdvancedSearch->SearchValue = @$filter["x_Normal2PN"];
        $this->Normal2PN->AdvancedSearch->SearchOperator = @$filter["z_Normal2PN"];
        $this->Normal2PN->AdvancedSearch->SearchCondition = @$filter["v_Normal2PN"];
        $this->Normal2PN->AdvancedSearch->SearchValue2 = @$filter["y_Normal2PN"];
        $this->Normal2PN->AdvancedSearch->SearchOperator2 = @$filter["w_Normal2PN"];
        $this->Normal2PN->AdvancedSearch->save();

        // Field Abnormalfertilisation1N
        $this->Abnormalfertilisation1N->AdvancedSearch->SearchValue = @$filter["x_Abnormalfertilisation1N"];
        $this->Abnormalfertilisation1N->AdvancedSearch->SearchOperator = @$filter["z_Abnormalfertilisation1N"];
        $this->Abnormalfertilisation1N->AdvancedSearch->SearchCondition = @$filter["v_Abnormalfertilisation1N"];
        $this->Abnormalfertilisation1N->AdvancedSearch->SearchValue2 = @$filter["y_Abnormalfertilisation1N"];
        $this->Abnormalfertilisation1N->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormalfertilisation1N"];
        $this->Abnormalfertilisation1N->AdvancedSearch->save();

        // Field Abnormalfertilisation3N
        $this->Abnormalfertilisation3N->AdvancedSearch->SearchValue = @$filter["x_Abnormalfertilisation3N"];
        $this->Abnormalfertilisation3N->AdvancedSearch->SearchOperator = @$filter["z_Abnormalfertilisation3N"];
        $this->Abnormalfertilisation3N->AdvancedSearch->SearchCondition = @$filter["v_Abnormalfertilisation3N"];
        $this->Abnormalfertilisation3N->AdvancedSearch->SearchValue2 = @$filter["y_Abnormalfertilisation3N"];
        $this->Abnormalfertilisation3N->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormalfertilisation3N"];
        $this->Abnormalfertilisation3N->AdvancedSearch->save();

        // Field NotFertilized
        $this->NotFertilized->AdvancedSearch->SearchValue = @$filter["x_NotFertilized"];
        $this->NotFertilized->AdvancedSearch->SearchOperator = @$filter["z_NotFertilized"];
        $this->NotFertilized->AdvancedSearch->SearchCondition = @$filter["v_NotFertilized"];
        $this->NotFertilized->AdvancedSearch->SearchValue2 = @$filter["y_NotFertilized"];
        $this->NotFertilized->AdvancedSearch->SearchOperator2 = @$filter["w_NotFertilized"];
        $this->NotFertilized->AdvancedSearch->save();

        // Field Degenerated
        $this->Degenerated->AdvancedSearch->SearchValue = @$filter["x_Degenerated"];
        $this->Degenerated->AdvancedSearch->SearchOperator = @$filter["z_Degenerated"];
        $this->Degenerated->AdvancedSearch->SearchCondition = @$filter["v_Degenerated"];
        $this->Degenerated->AdvancedSearch->SearchValue2 = @$filter["y_Degenerated"];
        $this->Degenerated->AdvancedSearch->SearchOperator2 = @$filter["w_Degenerated"];
        $this->Degenerated->AdvancedSearch->save();

        // Field SpermDate
        $this->SpermDate->AdvancedSearch->SearchValue = @$filter["x_SpermDate"];
        $this->SpermDate->AdvancedSearch->SearchOperator = @$filter["z_SpermDate"];
        $this->SpermDate->AdvancedSearch->SearchCondition = @$filter["v_SpermDate"];
        $this->SpermDate->AdvancedSearch->SearchValue2 = @$filter["y_SpermDate"];
        $this->SpermDate->AdvancedSearch->SearchOperator2 = @$filter["w_SpermDate"];
        $this->SpermDate->AdvancedSearch->save();

        // Field Code1
        $this->Code1->AdvancedSearch->SearchValue = @$filter["x_Code1"];
        $this->Code1->AdvancedSearch->SearchOperator = @$filter["z_Code1"];
        $this->Code1->AdvancedSearch->SearchCondition = @$filter["v_Code1"];
        $this->Code1->AdvancedSearch->SearchValue2 = @$filter["y_Code1"];
        $this->Code1->AdvancedSearch->SearchOperator2 = @$filter["w_Code1"];
        $this->Code1->AdvancedSearch->save();

        // Field Day1
        $this->Day1->AdvancedSearch->SearchValue = @$filter["x_Day1"];
        $this->Day1->AdvancedSearch->SearchOperator = @$filter["z_Day1"];
        $this->Day1->AdvancedSearch->SearchCondition = @$filter["v_Day1"];
        $this->Day1->AdvancedSearch->SearchValue2 = @$filter["y_Day1"];
        $this->Day1->AdvancedSearch->SearchOperator2 = @$filter["w_Day1"];
        $this->Day1->AdvancedSearch->save();

        // Field CellStage1
        $this->CellStage1->AdvancedSearch->SearchValue = @$filter["x_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchOperator = @$filter["z_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchCondition = @$filter["v_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchValue2 = @$filter["y_CellStage1"];
        $this->CellStage1->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage1"];
        $this->CellStage1->AdvancedSearch->save();

        // Field Grade1
        $this->Grade1->AdvancedSearch->SearchValue = @$filter["x_Grade1"];
        $this->Grade1->AdvancedSearch->SearchOperator = @$filter["z_Grade1"];
        $this->Grade1->AdvancedSearch->SearchCondition = @$filter["v_Grade1"];
        $this->Grade1->AdvancedSearch->SearchValue2 = @$filter["y_Grade1"];
        $this->Grade1->AdvancedSearch->SearchOperator2 = @$filter["w_Grade1"];
        $this->Grade1->AdvancedSearch->save();

        // Field State1
        $this->State1->AdvancedSearch->SearchValue = @$filter["x_State1"];
        $this->State1->AdvancedSearch->SearchOperator = @$filter["z_State1"];
        $this->State1->AdvancedSearch->SearchCondition = @$filter["v_State1"];
        $this->State1->AdvancedSearch->SearchValue2 = @$filter["y_State1"];
        $this->State1->AdvancedSearch->SearchOperator2 = @$filter["w_State1"];
        $this->State1->AdvancedSearch->save();

        // Field Code2
        $this->Code2->AdvancedSearch->SearchValue = @$filter["x_Code2"];
        $this->Code2->AdvancedSearch->SearchOperator = @$filter["z_Code2"];
        $this->Code2->AdvancedSearch->SearchCondition = @$filter["v_Code2"];
        $this->Code2->AdvancedSearch->SearchValue2 = @$filter["y_Code2"];
        $this->Code2->AdvancedSearch->SearchOperator2 = @$filter["w_Code2"];
        $this->Code2->AdvancedSearch->save();

        // Field Day2
        $this->Day2->AdvancedSearch->SearchValue = @$filter["x_Day2"];
        $this->Day2->AdvancedSearch->SearchOperator = @$filter["z_Day2"];
        $this->Day2->AdvancedSearch->SearchCondition = @$filter["v_Day2"];
        $this->Day2->AdvancedSearch->SearchValue2 = @$filter["y_Day2"];
        $this->Day2->AdvancedSearch->SearchOperator2 = @$filter["w_Day2"];
        $this->Day2->AdvancedSearch->save();

        // Field CellStage2
        $this->CellStage2->AdvancedSearch->SearchValue = @$filter["x_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchOperator = @$filter["z_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchCondition = @$filter["v_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchValue2 = @$filter["y_CellStage2"];
        $this->CellStage2->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage2"];
        $this->CellStage2->AdvancedSearch->save();

        // Field Grade2
        $this->Grade2->AdvancedSearch->SearchValue = @$filter["x_Grade2"];
        $this->Grade2->AdvancedSearch->SearchOperator = @$filter["z_Grade2"];
        $this->Grade2->AdvancedSearch->SearchCondition = @$filter["v_Grade2"];
        $this->Grade2->AdvancedSearch->SearchValue2 = @$filter["y_Grade2"];
        $this->Grade2->AdvancedSearch->SearchOperator2 = @$filter["w_Grade2"];
        $this->Grade2->AdvancedSearch->save();

        // Field State2
        $this->State2->AdvancedSearch->SearchValue = @$filter["x_State2"];
        $this->State2->AdvancedSearch->SearchOperator = @$filter["z_State2"];
        $this->State2->AdvancedSearch->SearchCondition = @$filter["v_State2"];
        $this->State2->AdvancedSearch->SearchValue2 = @$filter["y_State2"];
        $this->State2->AdvancedSearch->SearchOperator2 = @$filter["w_State2"];
        $this->State2->AdvancedSearch->save();

        // Field Code3
        $this->Code3->AdvancedSearch->SearchValue = @$filter["x_Code3"];
        $this->Code3->AdvancedSearch->SearchOperator = @$filter["z_Code3"];
        $this->Code3->AdvancedSearch->SearchCondition = @$filter["v_Code3"];
        $this->Code3->AdvancedSearch->SearchValue2 = @$filter["y_Code3"];
        $this->Code3->AdvancedSearch->SearchOperator2 = @$filter["w_Code3"];
        $this->Code3->AdvancedSearch->save();

        // Field Day3
        $this->Day3->AdvancedSearch->SearchValue = @$filter["x_Day3"];
        $this->Day3->AdvancedSearch->SearchOperator = @$filter["z_Day3"];
        $this->Day3->AdvancedSearch->SearchCondition = @$filter["v_Day3"];
        $this->Day3->AdvancedSearch->SearchValue2 = @$filter["y_Day3"];
        $this->Day3->AdvancedSearch->SearchOperator2 = @$filter["w_Day3"];
        $this->Day3->AdvancedSearch->save();

        // Field CellStage3
        $this->CellStage3->AdvancedSearch->SearchValue = @$filter["x_CellStage3"];
        $this->CellStage3->AdvancedSearch->SearchOperator = @$filter["z_CellStage3"];
        $this->CellStage3->AdvancedSearch->SearchCondition = @$filter["v_CellStage3"];
        $this->CellStage3->AdvancedSearch->SearchValue2 = @$filter["y_CellStage3"];
        $this->CellStage3->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage3"];
        $this->CellStage3->AdvancedSearch->save();

        // Field Grade3
        $this->Grade3->AdvancedSearch->SearchValue = @$filter["x_Grade3"];
        $this->Grade3->AdvancedSearch->SearchOperator = @$filter["z_Grade3"];
        $this->Grade3->AdvancedSearch->SearchCondition = @$filter["v_Grade3"];
        $this->Grade3->AdvancedSearch->SearchValue2 = @$filter["y_Grade3"];
        $this->Grade3->AdvancedSearch->SearchOperator2 = @$filter["w_Grade3"];
        $this->Grade3->AdvancedSearch->save();

        // Field State3
        $this->State3->AdvancedSearch->SearchValue = @$filter["x_State3"];
        $this->State3->AdvancedSearch->SearchOperator = @$filter["z_State3"];
        $this->State3->AdvancedSearch->SearchCondition = @$filter["v_State3"];
        $this->State3->AdvancedSearch->SearchValue2 = @$filter["y_State3"];
        $this->State3->AdvancedSearch->SearchOperator2 = @$filter["w_State3"];
        $this->State3->AdvancedSearch->save();

        // Field Code4
        $this->Code4->AdvancedSearch->SearchValue = @$filter["x_Code4"];
        $this->Code4->AdvancedSearch->SearchOperator = @$filter["z_Code4"];
        $this->Code4->AdvancedSearch->SearchCondition = @$filter["v_Code4"];
        $this->Code4->AdvancedSearch->SearchValue2 = @$filter["y_Code4"];
        $this->Code4->AdvancedSearch->SearchOperator2 = @$filter["w_Code4"];
        $this->Code4->AdvancedSearch->save();

        // Field Day4
        $this->Day4->AdvancedSearch->SearchValue = @$filter["x_Day4"];
        $this->Day4->AdvancedSearch->SearchOperator = @$filter["z_Day4"];
        $this->Day4->AdvancedSearch->SearchCondition = @$filter["v_Day4"];
        $this->Day4->AdvancedSearch->SearchValue2 = @$filter["y_Day4"];
        $this->Day4->AdvancedSearch->SearchOperator2 = @$filter["w_Day4"];
        $this->Day4->AdvancedSearch->save();

        // Field CellStage4
        $this->CellStage4->AdvancedSearch->SearchValue = @$filter["x_CellStage4"];
        $this->CellStage4->AdvancedSearch->SearchOperator = @$filter["z_CellStage4"];
        $this->CellStage4->AdvancedSearch->SearchCondition = @$filter["v_CellStage4"];
        $this->CellStage4->AdvancedSearch->SearchValue2 = @$filter["y_CellStage4"];
        $this->CellStage4->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage4"];
        $this->CellStage4->AdvancedSearch->save();

        // Field Grade4
        $this->Grade4->AdvancedSearch->SearchValue = @$filter["x_Grade4"];
        $this->Grade4->AdvancedSearch->SearchOperator = @$filter["z_Grade4"];
        $this->Grade4->AdvancedSearch->SearchCondition = @$filter["v_Grade4"];
        $this->Grade4->AdvancedSearch->SearchValue2 = @$filter["y_Grade4"];
        $this->Grade4->AdvancedSearch->SearchOperator2 = @$filter["w_Grade4"];
        $this->Grade4->AdvancedSearch->save();

        // Field State4
        $this->State4->AdvancedSearch->SearchValue = @$filter["x_State4"];
        $this->State4->AdvancedSearch->SearchOperator = @$filter["z_State4"];
        $this->State4->AdvancedSearch->SearchCondition = @$filter["v_State4"];
        $this->State4->AdvancedSearch->SearchValue2 = @$filter["y_State4"];
        $this->State4->AdvancedSearch->SearchOperator2 = @$filter["w_State4"];
        $this->State4->AdvancedSearch->save();

        // Field Code5
        $this->Code5->AdvancedSearch->SearchValue = @$filter["x_Code5"];
        $this->Code5->AdvancedSearch->SearchOperator = @$filter["z_Code5"];
        $this->Code5->AdvancedSearch->SearchCondition = @$filter["v_Code5"];
        $this->Code5->AdvancedSearch->SearchValue2 = @$filter["y_Code5"];
        $this->Code5->AdvancedSearch->SearchOperator2 = @$filter["w_Code5"];
        $this->Code5->AdvancedSearch->save();

        // Field Day5
        $this->Day5->AdvancedSearch->SearchValue = @$filter["x_Day5"];
        $this->Day5->AdvancedSearch->SearchOperator = @$filter["z_Day5"];
        $this->Day5->AdvancedSearch->SearchCondition = @$filter["v_Day5"];
        $this->Day5->AdvancedSearch->SearchValue2 = @$filter["y_Day5"];
        $this->Day5->AdvancedSearch->SearchOperator2 = @$filter["w_Day5"];
        $this->Day5->AdvancedSearch->save();

        // Field CellStage5
        $this->CellStage5->AdvancedSearch->SearchValue = @$filter["x_CellStage5"];
        $this->CellStage5->AdvancedSearch->SearchOperator = @$filter["z_CellStage5"];
        $this->CellStage5->AdvancedSearch->SearchCondition = @$filter["v_CellStage5"];
        $this->CellStage5->AdvancedSearch->SearchValue2 = @$filter["y_CellStage5"];
        $this->CellStage5->AdvancedSearch->SearchOperator2 = @$filter["w_CellStage5"];
        $this->CellStage5->AdvancedSearch->save();

        // Field Grade5
        $this->Grade5->AdvancedSearch->SearchValue = @$filter["x_Grade5"];
        $this->Grade5->AdvancedSearch->SearchOperator = @$filter["z_Grade5"];
        $this->Grade5->AdvancedSearch->SearchCondition = @$filter["v_Grade5"];
        $this->Grade5->AdvancedSearch->SearchValue2 = @$filter["y_Grade5"];
        $this->Grade5->AdvancedSearch->SearchOperator2 = @$filter["w_Grade5"];
        $this->Grade5->AdvancedSearch->save();

        // Field State5
        $this->State5->AdvancedSearch->SearchValue = @$filter["x_State5"];
        $this->State5->AdvancedSearch->SearchOperator = @$filter["z_State5"];
        $this->State5->AdvancedSearch->SearchCondition = @$filter["v_State5"];
        $this->State5->AdvancedSearch->SearchValue2 = @$filter["y_State5"];
        $this->State5->AdvancedSearch->SearchOperator2 = @$filter["w_State5"];
        $this->State5->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field Volume
        $this->Volume->AdvancedSearch->SearchValue = @$filter["x_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator = @$filter["z_Volume"];
        $this->Volume->AdvancedSearch->SearchCondition = @$filter["v_Volume"];
        $this->Volume->AdvancedSearch->SearchValue2 = @$filter["y_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator2 = @$filter["w_Volume"];
        $this->Volume->AdvancedSearch->save();

        // Field Volume1
        $this->Volume1->AdvancedSearch->SearchValue = @$filter["x_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator = @$filter["z_Volume1"];
        $this->Volume1->AdvancedSearch->SearchCondition = @$filter["v_Volume1"];
        $this->Volume1->AdvancedSearch->SearchValue2 = @$filter["y_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator2 = @$filter["w_Volume1"];
        $this->Volume1->AdvancedSearch->save();

        // Field Volume2
        $this->Volume2->AdvancedSearch->SearchValue = @$filter["x_Volume2"];
        $this->Volume2->AdvancedSearch->SearchOperator = @$filter["z_Volume2"];
        $this->Volume2->AdvancedSearch->SearchCondition = @$filter["v_Volume2"];
        $this->Volume2->AdvancedSearch->SearchValue2 = @$filter["y_Volume2"];
        $this->Volume2->AdvancedSearch->SearchOperator2 = @$filter["w_Volume2"];
        $this->Volume2->AdvancedSearch->save();

        // Field Concentration2
        $this->Concentration2->AdvancedSearch->SearchValue = @$filter["x_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchOperator = @$filter["z_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchCondition = @$filter["v_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchValue2 = @$filter["y_Concentration2"];
        $this->Concentration2->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration2"];
        $this->Concentration2->AdvancedSearch->save();

        // Field Total
        $this->Total->AdvancedSearch->SearchValue = @$filter["x_Total"];
        $this->Total->AdvancedSearch->SearchOperator = @$filter["z_Total"];
        $this->Total->AdvancedSearch->SearchCondition = @$filter["v_Total"];
        $this->Total->AdvancedSearch->SearchValue2 = @$filter["y_Total"];
        $this->Total->AdvancedSearch->SearchOperator2 = @$filter["w_Total"];
        $this->Total->AdvancedSearch->save();

        // Field Total1
        $this->Total1->AdvancedSearch->SearchValue = @$filter["x_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator = @$filter["z_Total1"];
        $this->Total1->AdvancedSearch->SearchCondition = @$filter["v_Total1"];
        $this->Total1->AdvancedSearch->SearchValue2 = @$filter["y_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator2 = @$filter["w_Total1"];
        $this->Total1->AdvancedSearch->save();

        // Field Total2
        $this->Total2->AdvancedSearch->SearchValue = @$filter["x_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator = @$filter["z_Total2"];
        $this->Total2->AdvancedSearch->SearchCondition = @$filter["v_Total2"];
        $this->Total2->AdvancedSearch->SearchValue2 = @$filter["y_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator2 = @$filter["w_Total2"];
        $this->Total2->AdvancedSearch->save();

        // Field Progressive
        $this->Progressive->AdvancedSearch->SearchValue = @$filter["x_Progressive"];
        $this->Progressive->AdvancedSearch->SearchOperator = @$filter["z_Progressive"];
        $this->Progressive->AdvancedSearch->SearchCondition = @$filter["v_Progressive"];
        $this->Progressive->AdvancedSearch->SearchValue2 = @$filter["y_Progressive"];
        $this->Progressive->AdvancedSearch->SearchOperator2 = @$filter["w_Progressive"];
        $this->Progressive->AdvancedSearch->save();

        // Field Progressive1
        $this->Progressive1->AdvancedSearch->SearchValue = @$filter["x_Progressive1"];
        $this->Progressive1->AdvancedSearch->SearchOperator = @$filter["z_Progressive1"];
        $this->Progressive1->AdvancedSearch->SearchCondition = @$filter["v_Progressive1"];
        $this->Progressive1->AdvancedSearch->SearchValue2 = @$filter["y_Progressive1"];
        $this->Progressive1->AdvancedSearch->SearchOperator2 = @$filter["w_Progressive1"];
        $this->Progressive1->AdvancedSearch->save();

        // Field Progressive2
        $this->Progressive2->AdvancedSearch->SearchValue = @$filter["x_Progressive2"];
        $this->Progressive2->AdvancedSearch->SearchOperator = @$filter["z_Progressive2"];
        $this->Progressive2->AdvancedSearch->SearchCondition = @$filter["v_Progressive2"];
        $this->Progressive2->AdvancedSearch->SearchValue2 = @$filter["y_Progressive2"];
        $this->Progressive2->AdvancedSearch->SearchOperator2 = @$filter["w_Progressive2"];
        $this->Progressive2->AdvancedSearch->save();

        // Field NotProgressive
        $this->NotProgressive->AdvancedSearch->SearchValue = @$filter["x_NotProgressive"];
        $this->NotProgressive->AdvancedSearch->SearchOperator = @$filter["z_NotProgressive"];
        $this->NotProgressive->AdvancedSearch->SearchCondition = @$filter["v_NotProgressive"];
        $this->NotProgressive->AdvancedSearch->SearchValue2 = @$filter["y_NotProgressive"];
        $this->NotProgressive->AdvancedSearch->SearchOperator2 = @$filter["w_NotProgressive"];
        $this->NotProgressive->AdvancedSearch->save();

        // Field NotProgressive1
        $this->NotProgressive1->AdvancedSearch->SearchValue = @$filter["x_NotProgressive1"];
        $this->NotProgressive1->AdvancedSearch->SearchOperator = @$filter["z_NotProgressive1"];
        $this->NotProgressive1->AdvancedSearch->SearchCondition = @$filter["v_NotProgressive1"];
        $this->NotProgressive1->AdvancedSearch->SearchValue2 = @$filter["y_NotProgressive1"];
        $this->NotProgressive1->AdvancedSearch->SearchOperator2 = @$filter["w_NotProgressive1"];
        $this->NotProgressive1->AdvancedSearch->save();

        // Field NotProgressive2
        $this->NotProgressive2->AdvancedSearch->SearchValue = @$filter["x_NotProgressive2"];
        $this->NotProgressive2->AdvancedSearch->SearchOperator = @$filter["z_NotProgressive2"];
        $this->NotProgressive2->AdvancedSearch->SearchCondition = @$filter["v_NotProgressive2"];
        $this->NotProgressive2->AdvancedSearch->SearchValue2 = @$filter["y_NotProgressive2"];
        $this->NotProgressive2->AdvancedSearch->SearchOperator2 = @$filter["w_NotProgressive2"];
        $this->NotProgressive2->AdvancedSearch->save();

        // Field Motility2
        $this->Motility2->AdvancedSearch->SearchValue = @$filter["x_Motility2"];
        $this->Motility2->AdvancedSearch->SearchOperator = @$filter["z_Motility2"];
        $this->Motility2->AdvancedSearch->SearchCondition = @$filter["v_Motility2"];
        $this->Motility2->AdvancedSearch->SearchValue2 = @$filter["y_Motility2"];
        $this->Motility2->AdvancedSearch->SearchOperator2 = @$filter["w_Motility2"];
        $this->Motility2->AdvancedSearch->save();

        // Field Morphology2
        $this->Morphology2->AdvancedSearch->SearchValue = @$filter["x_Morphology2"];
        $this->Morphology2->AdvancedSearch->SearchOperator = @$filter["z_Morphology2"];
        $this->Morphology2->AdvancedSearch->SearchCondition = @$filter["v_Morphology2"];
        $this->Morphology2->AdvancedSearch->SearchValue2 = @$filter["y_Morphology2"];
        $this->Morphology2->AdvancedSearch->SearchOperator2 = @$filter["w_Morphology2"];
        $this->Morphology2->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->ARTCycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Spermorigin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IndicationforART, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Status, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pre_Concentration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pre_Motility, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pre_Morphology, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->post_Concentration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->post_Motility, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->post_Morphology, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NumberofEmbryostransferred, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Embryosunderobservation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EmbryoDevelopmentSummary, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EmbryologistSignature, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminatinTechnique, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ICSIDetails, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DateofET, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Reasonfornotranfer, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EmbryosCryopreserved, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LegendCellStage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ConsultantsSignature, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->M2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mi2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ICSI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IVF, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->M1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GV, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->_Others, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Normal2PN, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormalfertilisation1N, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormalfertilisation3N, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NotFertilized, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Degenerated, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State3, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State4, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Code5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Day5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CellStage5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Grade5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State5, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Progressive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Progressive1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Progressive2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NotProgressive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NotProgressive1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NotProgressive2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Motility2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Morphology2, $arKeywords, $type);
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
            $this->updateSort($this->ARTCycle); // ARTCycle
            $this->updateSort($this->Spermorigin); // Spermorigin
            $this->updateSort($this->IndicationforART); // IndicationforART
            $this->updateSort($this->DateofICSI); // DateofICSI
            $this->updateSort($this->Origin); // Origin
            $this->updateSort($this->Status); // Status
            $this->updateSort($this->Method); // Method
            $this->updateSort($this->pre_Concentration); // pre_Concentration
            $this->updateSort($this->pre_Motility); // pre_Motility
            $this->updateSort($this->pre_Morphology); // pre_Morphology
            $this->updateSort($this->post_Concentration); // post_Concentration
            $this->updateSort($this->post_Motility); // post_Motility
            $this->updateSort($this->post_Morphology); // post_Morphology
            $this->updateSort($this->NumberofEmbryostransferred); // NumberofEmbryostransferred
            $this->updateSort($this->Embryosunderobservation); // Embryosunderobservation
            $this->updateSort($this->EmbryoDevelopmentSummary); // EmbryoDevelopmentSummary
            $this->updateSort($this->EmbryologistSignature); // EmbryologistSignature
            $this->updateSort($this->IVFRegistrationID); // IVFRegistrationID
            $this->updateSort($this->InseminatinTechnique); // InseminatinTechnique
            $this->updateSort($this->ICSIDetails); // ICSIDetails
            $this->updateSort($this->DateofET); // DateofET
            $this->updateSort($this->Reasonfornotranfer); // Reasonfornotranfer
            $this->updateSort($this->EmbryosCryopreserved); // EmbryosCryopreserved
            $this->updateSort($this->LegendCellStage); // LegendCellStage
            $this->updateSort($this->ConsultantsSignature); // ConsultantsSignature
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->M2); // M2
            $this->updateSort($this->Mi2); // Mi2
            $this->updateSort($this->ICSI); // ICSI
            $this->updateSort($this->IVF); // IVF
            $this->updateSort($this->M1); // M1
            $this->updateSort($this->GV); // GV
            $this->updateSort($this->_Others); // Others
            $this->updateSort($this->Normal2PN); // Normal2PN
            $this->updateSort($this->Abnormalfertilisation1N); // Abnormalfertilisation1N
            $this->updateSort($this->Abnormalfertilisation3N); // Abnormalfertilisation3N
            $this->updateSort($this->NotFertilized); // NotFertilized
            $this->updateSort($this->Degenerated); // Degenerated
            $this->updateSort($this->SpermDate); // SpermDate
            $this->updateSort($this->Code1); // Code1
            $this->updateSort($this->Day1); // Day1
            $this->updateSort($this->CellStage1); // CellStage1
            $this->updateSort($this->Grade1); // Grade1
            $this->updateSort($this->State1); // State1
            $this->updateSort($this->Code2); // Code2
            $this->updateSort($this->Day2); // Day2
            $this->updateSort($this->CellStage2); // CellStage2
            $this->updateSort($this->Grade2); // Grade2
            $this->updateSort($this->State2); // State2
            $this->updateSort($this->Code3); // Code3
            $this->updateSort($this->Day3); // Day3
            $this->updateSort($this->CellStage3); // CellStage3
            $this->updateSort($this->Grade3); // Grade3
            $this->updateSort($this->State3); // State3
            $this->updateSort($this->Code4); // Code4
            $this->updateSort($this->Day4); // Day4
            $this->updateSort($this->CellStage4); // CellStage4
            $this->updateSort($this->Grade4); // Grade4
            $this->updateSort($this->State4); // State4
            $this->updateSort($this->Code5); // Code5
            $this->updateSort($this->Day5); // Day5
            $this->updateSort($this->CellStage5); // CellStage5
            $this->updateSort($this->Grade5); // Grade5
            $this->updateSort($this->State5); // State5
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->RIDNo); // RIDNo
            $this->updateSort($this->Volume); // Volume
            $this->updateSort($this->Volume1); // Volume1
            $this->updateSort($this->Volume2); // Volume2
            $this->updateSort($this->Concentration2); // Concentration2
            $this->updateSort($this->Total); // Total
            $this->updateSort($this->Total1); // Total1
            $this->updateSort($this->Total2); // Total2
            $this->updateSort($this->Progressive); // Progressive
            $this->updateSort($this->Progressive1); // Progressive1
            $this->updateSort($this->Progressive2); // Progressive2
            $this->updateSort($this->NotProgressive); // NotProgressive
            $this->updateSort($this->NotProgressive1); // NotProgressive1
            $this->updateSort($this->NotProgressive2); // NotProgressive2
            $this->updateSort($this->Motility2); // Motility2
            $this->updateSort($this->Morphology2); // Morphology2
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

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->id->setSort("");
                $this->ARTCycle->setSort("");
                $this->Spermorigin->setSort("");
                $this->IndicationforART->setSort("");
                $this->DateofICSI->setSort("");
                $this->Origin->setSort("");
                $this->Status->setSort("");
                $this->Method->setSort("");
                $this->pre_Concentration->setSort("");
                $this->pre_Motility->setSort("");
                $this->pre_Morphology->setSort("");
                $this->post_Concentration->setSort("");
                $this->post_Motility->setSort("");
                $this->post_Morphology->setSort("");
                $this->NumberofEmbryostransferred->setSort("");
                $this->Embryosunderobservation->setSort("");
                $this->EmbryoDevelopmentSummary->setSort("");
                $this->EmbryologistSignature->setSort("");
                $this->IVFRegistrationID->setSort("");
                $this->InseminatinTechnique->setSort("");
                $this->ICSIDetails->setSort("");
                $this->DateofET->setSort("");
                $this->Reasonfornotranfer->setSort("");
                $this->EmbryosCryopreserved->setSort("");
                $this->LegendCellStage->setSort("");
                $this->ConsultantsSignature->setSort("");
                $this->Name->setSort("");
                $this->M2->setSort("");
                $this->Mi2->setSort("");
                $this->ICSI->setSort("");
                $this->IVF->setSort("");
                $this->M1->setSort("");
                $this->GV->setSort("");
                $this->_Others->setSort("");
                $this->Normal2PN->setSort("");
                $this->Abnormalfertilisation1N->setSort("");
                $this->Abnormalfertilisation3N->setSort("");
                $this->NotFertilized->setSort("");
                $this->Degenerated->setSort("");
                $this->SpermDate->setSort("");
                $this->Code1->setSort("");
                $this->Day1->setSort("");
                $this->CellStage1->setSort("");
                $this->Grade1->setSort("");
                $this->State1->setSort("");
                $this->Code2->setSort("");
                $this->Day2->setSort("");
                $this->CellStage2->setSort("");
                $this->Grade2->setSort("");
                $this->State2->setSort("");
                $this->Code3->setSort("");
                $this->Day3->setSort("");
                $this->CellStage3->setSort("");
                $this->Grade3->setSort("");
                $this->State3->setSort("");
                $this->Code4->setSort("");
                $this->Day4->setSort("");
                $this->CellStage4->setSort("");
                $this->Grade4->setSort("");
                $this->State4->setSort("");
                $this->Code5->setSort("");
                $this->Day5->setSort("");
                $this->CellStage5->setSort("");
                $this->Grade5->setSort("");
                $this->State5->setSort("");
                $this->TidNo->setSort("");
                $this->RIDNo->setSort("");
                $this->Volume->setSort("");
                $this->Volume1->setSort("");
                $this->Volume2->setSort("");
                $this->Concentration2->setSort("");
                $this->Total->setSort("");
                $this->Total1->setSort("");
                $this->Total2->setSort("");
                $this->Progressive->setSort("");
                $this->Progressive1->setSort("");
                $this->Progressive2->setSort("");
                $this->NotProgressive->setSort("");
                $this->NotProgressive1->setSort("");
                $this->NotProgressive2->setSort("");
                $this->Motility2->setSort("");
                $this->Morphology2->setSort("");
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
        $pageUrl = $this->pageUrl();
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
            } else {
                $opt->Body = "";
            }

            // "copy"
            $opt = $this->ListOptions["copy"];
            $copycaption = HtmlTitle($Language->phrase("CopyLink"));
            if ($Security->canAdd()) {
                $opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode(GetUrl($this->CopyUrl)) . "\">" . $Language->phrase("CopyLink") . "</a>";
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fivf_art_summarylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fivf_art_summarylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
        $option = $options["action"];
        // Set up list action buttons
        foreach ($this->ListActions->Items as $listaction) {
            if ($listaction->Select == ACTION_MULTIPLE) {
                $item = &$option->add("custom_" . $listaction->Action);
                $caption = $listaction->Caption;
                $icon = ($listaction->Icon != "") ? '<i class="' . HtmlEncode($listaction->Icon) . '" data-caption="' . HtmlEncode($caption) . '"></i>' . $caption : $caption;
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fivf_art_summarylist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

    // Load basic search values
    protected function loadBasicSearchValues()
    {
        $this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), false);
        if ($this->BasicSearch->Keyword != "" && $this->Command == "") {
            $this->Command = "search";
        }
        $this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), false);
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
        $this->ARTCycle->setDbValue($row['ARTCycle']);
        $this->Spermorigin->setDbValue($row['Spermorigin']);
        $this->IndicationforART->setDbValue($row['IndicationforART']);
        $this->DateofICSI->setDbValue($row['DateofICSI']);
        $this->Origin->setDbValue($row['Origin']);
        $this->Status->setDbValue($row['Status']);
        $this->Method->setDbValue($row['Method']);
        $this->pre_Concentration->setDbValue($row['pre_Concentration']);
        $this->pre_Motility->setDbValue($row['pre_Motility']);
        $this->pre_Morphology->setDbValue($row['pre_Morphology']);
        $this->post_Concentration->setDbValue($row['post_Concentration']);
        $this->post_Motility->setDbValue($row['post_Motility']);
        $this->post_Morphology->setDbValue($row['post_Morphology']);
        $this->NumberofEmbryostransferred->setDbValue($row['NumberofEmbryostransferred']);
        $this->Embryosunderobservation->setDbValue($row['Embryosunderobservation']);
        $this->EmbryoDevelopmentSummary->setDbValue($row['EmbryoDevelopmentSummary']);
        $this->EmbryologistSignature->setDbValue($row['EmbryologistSignature']);
        $this->IVFRegistrationID->setDbValue($row['IVFRegistrationID']);
        $this->InseminatinTechnique->setDbValue($row['InseminatinTechnique']);
        $this->ICSIDetails->setDbValue($row['ICSIDetails']);
        $this->DateofET->setDbValue($row['DateofET']);
        $this->Reasonfornotranfer->setDbValue($row['Reasonfornotranfer']);
        $this->EmbryosCryopreserved->setDbValue($row['EmbryosCryopreserved']);
        $this->LegendCellStage->setDbValue($row['LegendCellStage']);
        $this->ConsultantsSignature->setDbValue($row['ConsultantsSignature']);
        $this->Name->setDbValue($row['Name']);
        $this->M2->setDbValue($row['M2']);
        $this->Mi2->setDbValue($row['Mi2']);
        $this->ICSI->setDbValue($row['ICSI']);
        $this->IVF->setDbValue($row['IVF']);
        $this->M1->setDbValue($row['M1']);
        $this->GV->setDbValue($row['GV']);
        $this->_Others->setDbValue($row['Others']);
        $this->Normal2PN->setDbValue($row['Normal2PN']);
        $this->Abnormalfertilisation1N->setDbValue($row['Abnormalfertilisation1N']);
        $this->Abnormalfertilisation3N->setDbValue($row['Abnormalfertilisation3N']);
        $this->NotFertilized->setDbValue($row['NotFertilized']);
        $this->Degenerated->setDbValue($row['Degenerated']);
        $this->SpermDate->setDbValue($row['SpermDate']);
        $this->Code1->setDbValue($row['Code1']);
        $this->Day1->setDbValue($row['Day1']);
        $this->CellStage1->setDbValue($row['CellStage1']);
        $this->Grade1->setDbValue($row['Grade1']);
        $this->State1->setDbValue($row['State1']);
        $this->Code2->setDbValue($row['Code2']);
        $this->Day2->setDbValue($row['Day2']);
        $this->CellStage2->setDbValue($row['CellStage2']);
        $this->Grade2->setDbValue($row['Grade2']);
        $this->State2->setDbValue($row['State2']);
        $this->Code3->setDbValue($row['Code3']);
        $this->Day3->setDbValue($row['Day3']);
        $this->CellStage3->setDbValue($row['CellStage3']);
        $this->Grade3->setDbValue($row['Grade3']);
        $this->State3->setDbValue($row['State3']);
        $this->Code4->setDbValue($row['Code4']);
        $this->Day4->setDbValue($row['Day4']);
        $this->CellStage4->setDbValue($row['CellStage4']);
        $this->Grade4->setDbValue($row['Grade4']);
        $this->State4->setDbValue($row['State4']);
        $this->Code5->setDbValue($row['Code5']);
        $this->Day5->setDbValue($row['Day5']);
        $this->CellStage5->setDbValue($row['CellStage5']);
        $this->Grade5->setDbValue($row['Grade5']);
        $this->State5->setDbValue($row['State5']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->Volume->setDbValue($row['Volume']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total->setDbValue($row['Total']);
        $this->Total1->setDbValue($row['Total1']);
        $this->Total2->setDbValue($row['Total2']);
        $this->Progressive->setDbValue($row['Progressive']);
        $this->Progressive1->setDbValue($row['Progressive1']);
        $this->Progressive2->setDbValue($row['Progressive2']);
        $this->NotProgressive->setDbValue($row['NotProgressive']);
        $this->NotProgressive1->setDbValue($row['NotProgressive1']);
        $this->NotProgressive2->setDbValue($row['NotProgressive2']);
        $this->Motility2->setDbValue($row['Motility2']);
        $this->Morphology2->setDbValue($row['Morphology2']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['ARTCycle'] = null;
        $row['Spermorigin'] = null;
        $row['IndicationforART'] = null;
        $row['DateofICSI'] = null;
        $row['Origin'] = null;
        $row['Status'] = null;
        $row['Method'] = null;
        $row['pre_Concentration'] = null;
        $row['pre_Motility'] = null;
        $row['pre_Morphology'] = null;
        $row['post_Concentration'] = null;
        $row['post_Motility'] = null;
        $row['post_Morphology'] = null;
        $row['NumberofEmbryostransferred'] = null;
        $row['Embryosunderobservation'] = null;
        $row['EmbryoDevelopmentSummary'] = null;
        $row['EmbryologistSignature'] = null;
        $row['IVFRegistrationID'] = null;
        $row['InseminatinTechnique'] = null;
        $row['ICSIDetails'] = null;
        $row['DateofET'] = null;
        $row['Reasonfornotranfer'] = null;
        $row['EmbryosCryopreserved'] = null;
        $row['LegendCellStage'] = null;
        $row['ConsultantsSignature'] = null;
        $row['Name'] = null;
        $row['M2'] = null;
        $row['Mi2'] = null;
        $row['ICSI'] = null;
        $row['IVF'] = null;
        $row['M1'] = null;
        $row['GV'] = null;
        $row['Others'] = null;
        $row['Normal2PN'] = null;
        $row['Abnormalfertilisation1N'] = null;
        $row['Abnormalfertilisation3N'] = null;
        $row['NotFertilized'] = null;
        $row['Degenerated'] = null;
        $row['SpermDate'] = null;
        $row['Code1'] = null;
        $row['Day1'] = null;
        $row['CellStage1'] = null;
        $row['Grade1'] = null;
        $row['State1'] = null;
        $row['Code2'] = null;
        $row['Day2'] = null;
        $row['CellStage2'] = null;
        $row['Grade2'] = null;
        $row['State2'] = null;
        $row['Code3'] = null;
        $row['Day3'] = null;
        $row['CellStage3'] = null;
        $row['Grade3'] = null;
        $row['State3'] = null;
        $row['Code4'] = null;
        $row['Day4'] = null;
        $row['CellStage4'] = null;
        $row['Grade4'] = null;
        $row['State4'] = null;
        $row['Code5'] = null;
        $row['Day5'] = null;
        $row['CellStage5'] = null;
        $row['Grade5'] = null;
        $row['State5'] = null;
        $row['TidNo'] = null;
        $row['RIDNo'] = null;
        $row['Volume'] = null;
        $row['Volume1'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total'] = null;
        $row['Total1'] = null;
        $row['Total2'] = null;
        $row['Progressive'] = null;
        $row['Progressive1'] = null;
        $row['Progressive2'] = null;
        $row['NotProgressive'] = null;
        $row['NotProgressive1'] = null;
        $row['NotProgressive2'] = null;
        $row['Motility2'] = null;
        $row['Morphology2'] = null;
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

        // ARTCycle

        // Spermorigin

        // IndicationforART

        // DateofICSI

        // Origin

        // Status

        // Method

        // pre_Concentration

        // pre_Motility

        // pre_Morphology

        // post_Concentration

        // post_Motility

        // post_Morphology

        // NumberofEmbryostransferred

        // Embryosunderobservation

        // EmbryoDevelopmentSummary

        // EmbryologistSignature

        // IVFRegistrationID

        // InseminatinTechnique

        // ICSIDetails

        // DateofET

        // Reasonfornotranfer

        // EmbryosCryopreserved

        // LegendCellStage

        // ConsultantsSignature

        // Name

        // M2

        // Mi2

        // ICSI

        // IVF

        // M1

        // GV

        // Others

        // Normal2PN

        // Abnormalfertilisation1N

        // Abnormalfertilisation3N

        // NotFertilized

        // Degenerated

        // SpermDate

        // Code1

        // Day1

        // CellStage1

        // Grade1

        // State1

        // Code2

        // Day2

        // CellStage2

        // Grade2

        // State2

        // Code3

        // Day3

        // CellStage3

        // Grade3

        // State3

        // Code4

        // Day4

        // CellStage4

        // Grade4

        // State4

        // Code5

        // Day5

        // CellStage5

        // Grade5

        // State5

        // TidNo

        // RIDNo

        // Volume

        // Volume1

        // Volume2

        // Concentration2

        // Total

        // Total1

        // Total2

        // Progressive

        // Progressive1

        // Progressive2

        // NotProgressive

        // NotProgressive1

        // NotProgressive2

        // Motility2

        // Morphology2
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // ARTCycle
            if (strval($this->ARTCycle->CurrentValue) != "") {
                $this->ARTCycle->ViewValue = $this->ARTCycle->optionCaption($this->ARTCycle->CurrentValue);
            } else {
                $this->ARTCycle->ViewValue = null;
            }
            $this->ARTCycle->ViewCustomAttributes = "";

            // Spermorigin
            if (strval($this->Spermorigin->CurrentValue) != "") {
                $this->Spermorigin->ViewValue = $this->Spermorigin->optionCaption($this->Spermorigin->CurrentValue);
            } else {
                $this->Spermorigin->ViewValue = null;
            }
            $this->Spermorigin->ViewCustomAttributes = "";

            // IndicationforART
            $this->IndicationforART->ViewValue = $this->IndicationforART->CurrentValue;
            $this->IndicationforART->ViewCustomAttributes = "";

            // DateofICSI
            $this->DateofICSI->ViewValue = $this->DateofICSI->CurrentValue;
            $this->DateofICSI->ViewValue = FormatDateTime($this->DateofICSI->ViewValue, 7);
            $this->DateofICSI->ViewCustomAttributes = "";

            // Origin
            if (strval($this->Origin->CurrentValue) != "") {
                $this->Origin->ViewValue = $this->Origin->optionCaption($this->Origin->CurrentValue);
            } else {
                $this->Origin->ViewValue = null;
            }
            $this->Origin->ViewCustomAttributes = "";

            // Status
            if (strval($this->Status->CurrentValue) != "") {
                $this->Status->ViewValue = $this->Status->optionCaption($this->Status->CurrentValue);
            } else {
                $this->Status->ViewValue = null;
            }
            $this->Status->ViewCustomAttributes = "";

            // Method
            if (strval($this->Method->CurrentValue) != "") {
                $this->Method->ViewValue = $this->Method->optionCaption($this->Method->CurrentValue);
            } else {
                $this->Method->ViewValue = null;
            }
            $this->Method->ViewCustomAttributes = "";

            // pre_Concentration
            $this->pre_Concentration->ViewValue = $this->pre_Concentration->CurrentValue;
            $this->pre_Concentration->ViewCustomAttributes = "";

            // pre_Motility
            $this->pre_Motility->ViewValue = $this->pre_Motility->CurrentValue;
            $this->pre_Motility->ViewCustomAttributes = "";

            // pre_Morphology
            $this->pre_Morphology->ViewValue = $this->pre_Morphology->CurrentValue;
            $this->pre_Morphology->ViewCustomAttributes = "";

            // post_Concentration
            $this->post_Concentration->ViewValue = $this->post_Concentration->CurrentValue;
            $this->post_Concentration->ViewCustomAttributes = "";

            // post_Motility
            $this->post_Motility->ViewValue = $this->post_Motility->CurrentValue;
            $this->post_Motility->ViewCustomAttributes = "";

            // post_Morphology
            $this->post_Morphology->ViewValue = $this->post_Morphology->CurrentValue;
            $this->post_Morphology->ViewCustomAttributes = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->ViewValue = $this->NumberofEmbryostransferred->CurrentValue;
            $this->NumberofEmbryostransferred->ViewCustomAttributes = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->ViewValue = $this->Embryosunderobservation->CurrentValue;
            $this->Embryosunderobservation->ViewCustomAttributes = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->ViewValue = $this->EmbryoDevelopmentSummary->CurrentValue;
            $this->EmbryoDevelopmentSummary->ViewCustomAttributes = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->ViewValue = $this->EmbryologistSignature->CurrentValue;
            $this->EmbryologistSignature->ViewCustomAttributes = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->ViewValue = $this->IVFRegistrationID->CurrentValue;
            $this->IVFRegistrationID->ViewValue = FormatNumber($this->IVFRegistrationID->ViewValue, 0, -2, -2, -2);
            $this->IVFRegistrationID->ViewCustomAttributes = "";

            // InseminatinTechnique
            if (strval($this->InseminatinTechnique->CurrentValue) != "") {
                $this->InseminatinTechnique->ViewValue = $this->InseminatinTechnique->optionCaption($this->InseminatinTechnique->CurrentValue);
            } else {
                $this->InseminatinTechnique->ViewValue = null;
            }
            $this->InseminatinTechnique->ViewCustomAttributes = "";

            // ICSIDetails
            $this->ICSIDetails->ViewValue = $this->ICSIDetails->CurrentValue;
            $this->ICSIDetails->ViewCustomAttributes = "";

            // DateofET
            if (strval($this->DateofET->CurrentValue) != "") {
                $this->DateofET->ViewValue = $this->DateofET->optionCaption($this->DateofET->CurrentValue);
            } else {
                $this->DateofET->ViewValue = null;
            }
            $this->DateofET->ViewCustomAttributes = "";

            // Reasonfornotranfer
            if (strval($this->Reasonfornotranfer->CurrentValue) != "") {
                $this->Reasonfornotranfer->ViewValue = $this->Reasonfornotranfer->optionCaption($this->Reasonfornotranfer->CurrentValue);
            } else {
                $this->Reasonfornotranfer->ViewValue = null;
            }
            $this->Reasonfornotranfer->ViewCustomAttributes = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->ViewValue = $this->EmbryosCryopreserved->CurrentValue;
            $this->EmbryosCryopreserved->ViewCustomAttributes = "";

            // LegendCellStage
            $this->LegendCellStage->ViewValue = $this->LegendCellStage->CurrentValue;
            $this->LegendCellStage->ViewCustomAttributes = "";

            // ConsultantsSignature
            $curVal = trim(strval($this->ConsultantsSignature->CurrentValue));
            if ($curVal != "") {
                $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->lookupCacheOption($curVal);
                if ($this->ConsultantsSignature->ViewValue === null) { // Lookup from database
                    $filterWrk = "`NAME`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->ConsultantsSignature->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->ConsultantsSignature->Lookup->renderViewRow($rswrk[0]);
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->displayValue($arwrk);
                    } else {
                        $this->ConsultantsSignature->ViewValue = $this->ConsultantsSignature->CurrentValue;
                    }
                }
            } else {
                $this->ConsultantsSignature->ViewValue = null;
            }
            $this->ConsultantsSignature->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // M2
            $this->M2->ViewValue = $this->M2->CurrentValue;
            $this->M2->ViewCustomAttributes = "";

            // Mi2
            $this->Mi2->ViewValue = $this->Mi2->CurrentValue;
            $this->Mi2->ViewCustomAttributes = "";

            // ICSI
            $this->ICSI->ViewValue = $this->ICSI->CurrentValue;
            $this->ICSI->ViewCustomAttributes = "";

            // IVF
            $this->IVF->ViewValue = $this->IVF->CurrentValue;
            $this->IVF->ViewCustomAttributes = "";

            // M1
            $this->M1->ViewValue = $this->M1->CurrentValue;
            $this->M1->ViewCustomAttributes = "";

            // GV
            $this->GV->ViewValue = $this->GV->CurrentValue;
            $this->GV->ViewCustomAttributes = "";

            // Others
            $this->_Others->ViewValue = $this->_Others->CurrentValue;
            $this->_Others->ViewCustomAttributes = "";

            // Normal2PN
            $this->Normal2PN->ViewValue = $this->Normal2PN->CurrentValue;
            $this->Normal2PN->ViewCustomAttributes = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->ViewValue = $this->Abnormalfertilisation1N->CurrentValue;
            $this->Abnormalfertilisation1N->ViewCustomAttributes = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->ViewValue = $this->Abnormalfertilisation3N->CurrentValue;
            $this->Abnormalfertilisation3N->ViewCustomAttributes = "";

            // NotFertilized
            $this->NotFertilized->ViewValue = $this->NotFertilized->CurrentValue;
            $this->NotFertilized->ViewCustomAttributes = "";

            // Degenerated
            $this->Degenerated->ViewValue = $this->Degenerated->CurrentValue;
            $this->Degenerated->ViewCustomAttributes = "";

            // SpermDate
            $this->SpermDate->ViewValue = $this->SpermDate->CurrentValue;
            $this->SpermDate->ViewValue = FormatDateTime($this->SpermDate->ViewValue, 0);
            $this->SpermDate->ViewCustomAttributes = "";

            // Code1
            $this->Code1->ViewValue = $this->Code1->CurrentValue;
            $this->Code1->ViewCustomAttributes = "";

            // Day1
            if (strval($this->Day1->CurrentValue) != "") {
                $this->Day1->ViewValue = $this->Day1->optionCaption($this->Day1->CurrentValue);
            } else {
                $this->Day1->ViewValue = null;
            }
            $this->Day1->ViewCustomAttributes = "";

            // CellStage1
            if (strval($this->CellStage1->CurrentValue) != "") {
                $this->CellStage1->ViewValue = $this->CellStage1->optionCaption($this->CellStage1->CurrentValue);
            } else {
                $this->CellStage1->ViewValue = null;
            }
            $this->CellStage1->ViewCustomAttributes = "";

            // Grade1
            if (strval($this->Grade1->CurrentValue) != "") {
                $this->Grade1->ViewValue = $this->Grade1->optionCaption($this->Grade1->CurrentValue);
            } else {
                $this->Grade1->ViewValue = null;
            }
            $this->Grade1->ViewCustomAttributes = "";

            // State1
            if (strval($this->State1->CurrentValue) != "") {
                $this->State1->ViewValue = $this->State1->optionCaption($this->State1->CurrentValue);
            } else {
                $this->State1->ViewValue = null;
            }
            $this->State1->ViewCustomAttributes = "";

            // Code2
            $this->Code2->ViewValue = $this->Code2->CurrentValue;
            $this->Code2->ViewCustomAttributes = "";

            // Day2
            if (strval($this->Day2->CurrentValue) != "") {
                $this->Day2->ViewValue = $this->Day2->optionCaption($this->Day2->CurrentValue);
            } else {
                $this->Day2->ViewValue = null;
            }
            $this->Day2->ViewCustomAttributes = "";

            // CellStage2
            if (strval($this->CellStage2->CurrentValue) != "") {
                $this->CellStage2->ViewValue = $this->CellStage2->optionCaption($this->CellStage2->CurrentValue);
            } else {
                $this->CellStage2->ViewValue = null;
            }
            $this->CellStage2->ViewCustomAttributes = "";

            // Grade2
            if (strval($this->Grade2->CurrentValue) != "") {
                $this->Grade2->ViewValue = $this->Grade2->optionCaption($this->Grade2->CurrentValue);
            } else {
                $this->Grade2->ViewValue = null;
            }
            $this->Grade2->ViewCustomAttributes = "";

            // State2
            if (strval($this->State2->CurrentValue) != "") {
                $this->State2->ViewValue = $this->State2->optionCaption($this->State2->CurrentValue);
            } else {
                $this->State2->ViewValue = null;
            }
            $this->State2->ViewCustomAttributes = "";

            // Code3
            $this->Code3->ViewValue = $this->Code3->CurrentValue;
            $this->Code3->ViewCustomAttributes = "";

            // Day3
            if (strval($this->Day3->CurrentValue) != "") {
                $this->Day3->ViewValue = $this->Day3->optionCaption($this->Day3->CurrentValue);
            } else {
                $this->Day3->ViewValue = null;
            }
            $this->Day3->ViewCustomAttributes = "";

            // CellStage3
            if (strval($this->CellStage3->CurrentValue) != "") {
                $this->CellStage3->ViewValue = $this->CellStage3->optionCaption($this->CellStage3->CurrentValue);
            } else {
                $this->CellStage3->ViewValue = null;
            }
            $this->CellStage3->ViewCustomAttributes = "";

            // Grade3
            if (strval($this->Grade3->CurrentValue) != "") {
                $this->Grade3->ViewValue = $this->Grade3->optionCaption($this->Grade3->CurrentValue);
            } else {
                $this->Grade3->ViewValue = null;
            }
            $this->Grade3->ViewCustomAttributes = "";

            // State3
            if (strval($this->State3->CurrentValue) != "") {
                $this->State3->ViewValue = $this->State3->optionCaption($this->State3->CurrentValue);
            } else {
                $this->State3->ViewValue = null;
            }
            $this->State3->ViewCustomAttributes = "";

            // Code4
            $this->Code4->ViewValue = $this->Code4->CurrentValue;
            $this->Code4->ViewCustomAttributes = "";

            // Day4
            if (strval($this->Day4->CurrentValue) != "") {
                $this->Day4->ViewValue = $this->Day4->optionCaption($this->Day4->CurrentValue);
            } else {
                $this->Day4->ViewValue = null;
            }
            $this->Day4->ViewCustomAttributes = "";

            // CellStage4
            if (strval($this->CellStage4->CurrentValue) != "") {
                $this->CellStage4->ViewValue = $this->CellStage4->optionCaption($this->CellStage4->CurrentValue);
            } else {
                $this->CellStage4->ViewValue = null;
            }
            $this->CellStage4->ViewCustomAttributes = "";

            // Grade4
            if (strval($this->Grade4->CurrentValue) != "") {
                $this->Grade4->ViewValue = $this->Grade4->optionCaption($this->Grade4->CurrentValue);
            } else {
                $this->Grade4->ViewValue = null;
            }
            $this->Grade4->ViewCustomAttributes = "";

            // State4
            if (strval($this->State4->CurrentValue) != "") {
                $this->State4->ViewValue = $this->State4->optionCaption($this->State4->CurrentValue);
            } else {
                $this->State4->ViewValue = null;
            }
            $this->State4->ViewCustomAttributes = "";

            // Code5
            $this->Code5->ViewValue = $this->Code5->CurrentValue;
            $this->Code5->ViewCustomAttributes = "";

            // Day5
            if (strval($this->Day5->CurrentValue) != "") {
                $this->Day5->ViewValue = $this->Day5->optionCaption($this->Day5->CurrentValue);
            } else {
                $this->Day5->ViewValue = null;
            }
            $this->Day5->ViewCustomAttributes = "";

            // CellStage5
            if (strval($this->CellStage5->CurrentValue) != "") {
                $this->CellStage5->ViewValue = $this->CellStage5->optionCaption($this->CellStage5->CurrentValue);
            } else {
                $this->CellStage5->ViewValue = null;
            }
            $this->CellStage5->ViewCustomAttributes = "";

            // Grade5
            if (strval($this->Grade5->CurrentValue) != "") {
                $this->Grade5->ViewValue = $this->Grade5->optionCaption($this->Grade5->CurrentValue);
            } else {
                $this->Grade5->ViewValue = null;
            }
            $this->Grade5->ViewCustomAttributes = "";

            // State5
            if (strval($this->State5->CurrentValue) != "") {
                $this->State5->ViewValue = $this->State5->optionCaption($this->State5->CurrentValue);
            } else {
                $this->State5->ViewValue = null;
            }
            $this->State5->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // Progressive
            $this->Progressive->ViewValue = $this->Progressive->CurrentValue;
            $this->Progressive->ViewCustomAttributes = "";

            // Progressive1
            $this->Progressive1->ViewValue = $this->Progressive1->CurrentValue;
            $this->Progressive1->ViewCustomAttributes = "";

            // Progressive2
            $this->Progressive2->ViewValue = $this->Progressive2->CurrentValue;
            $this->Progressive2->ViewCustomAttributes = "";

            // NotProgressive
            $this->NotProgressive->ViewValue = $this->NotProgressive->CurrentValue;
            $this->NotProgressive->ViewCustomAttributes = "";

            // NotProgressive1
            $this->NotProgressive1->ViewValue = $this->NotProgressive1->CurrentValue;
            $this->NotProgressive1->ViewCustomAttributes = "";

            // NotProgressive2
            $this->NotProgressive2->ViewValue = $this->NotProgressive2->CurrentValue;
            $this->NotProgressive2->ViewCustomAttributes = "";

            // Motility2
            $this->Motility2->ViewValue = $this->Motility2->CurrentValue;
            $this->Motility2->ViewCustomAttributes = "";

            // Morphology2
            $this->Morphology2->ViewValue = $this->Morphology2->CurrentValue;
            $this->Morphology2->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // ARTCycle
            $this->ARTCycle->LinkCustomAttributes = "";
            $this->ARTCycle->HrefValue = "";
            $this->ARTCycle->TooltipValue = "";

            // Spermorigin
            $this->Spermorigin->LinkCustomAttributes = "";
            $this->Spermorigin->HrefValue = "";
            $this->Spermorigin->TooltipValue = "";

            // IndicationforART
            $this->IndicationforART->LinkCustomAttributes = "";
            $this->IndicationforART->HrefValue = "";
            $this->IndicationforART->TooltipValue = "";

            // DateofICSI
            $this->DateofICSI->LinkCustomAttributes = "";
            $this->DateofICSI->HrefValue = "";
            $this->DateofICSI->TooltipValue = "";

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";

            // Status
            $this->Status->LinkCustomAttributes = "";
            $this->Status->HrefValue = "";
            $this->Status->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // pre_Concentration
            $this->pre_Concentration->LinkCustomAttributes = "";
            $this->pre_Concentration->HrefValue = "";
            $this->pre_Concentration->TooltipValue = "";

            // pre_Motility
            $this->pre_Motility->LinkCustomAttributes = "";
            $this->pre_Motility->HrefValue = "";
            $this->pre_Motility->TooltipValue = "";

            // pre_Morphology
            $this->pre_Morphology->LinkCustomAttributes = "";
            $this->pre_Morphology->HrefValue = "";
            $this->pre_Morphology->TooltipValue = "";

            // post_Concentration
            $this->post_Concentration->LinkCustomAttributes = "";
            $this->post_Concentration->HrefValue = "";
            $this->post_Concentration->TooltipValue = "";

            // post_Motility
            $this->post_Motility->LinkCustomAttributes = "";
            $this->post_Motility->HrefValue = "";
            $this->post_Motility->TooltipValue = "";

            // post_Morphology
            $this->post_Morphology->LinkCustomAttributes = "";
            $this->post_Morphology->HrefValue = "";
            $this->post_Morphology->TooltipValue = "";

            // NumberofEmbryostransferred
            $this->NumberofEmbryostransferred->LinkCustomAttributes = "";
            $this->NumberofEmbryostransferred->HrefValue = "";
            $this->NumberofEmbryostransferred->TooltipValue = "";

            // Embryosunderobservation
            $this->Embryosunderobservation->LinkCustomAttributes = "";
            $this->Embryosunderobservation->HrefValue = "";
            $this->Embryosunderobservation->TooltipValue = "";

            // EmbryoDevelopmentSummary
            $this->EmbryoDevelopmentSummary->LinkCustomAttributes = "";
            $this->EmbryoDevelopmentSummary->HrefValue = "";
            $this->EmbryoDevelopmentSummary->TooltipValue = "";

            // EmbryologistSignature
            $this->EmbryologistSignature->LinkCustomAttributes = "";
            $this->EmbryologistSignature->HrefValue = "";
            $this->EmbryologistSignature->TooltipValue = "";

            // IVFRegistrationID
            $this->IVFRegistrationID->LinkCustomAttributes = "";
            $this->IVFRegistrationID->HrefValue = "";
            $this->IVFRegistrationID->TooltipValue = "";

            // InseminatinTechnique
            $this->InseminatinTechnique->LinkCustomAttributes = "";
            $this->InseminatinTechnique->HrefValue = "";
            $this->InseminatinTechnique->TooltipValue = "";

            // ICSIDetails
            $this->ICSIDetails->LinkCustomAttributes = "";
            $this->ICSIDetails->HrefValue = "";
            $this->ICSIDetails->TooltipValue = "";

            // DateofET
            $this->DateofET->LinkCustomAttributes = "";
            $this->DateofET->HrefValue = "";
            $this->DateofET->TooltipValue = "";

            // Reasonfornotranfer
            $this->Reasonfornotranfer->LinkCustomAttributes = "";
            $this->Reasonfornotranfer->HrefValue = "";
            $this->Reasonfornotranfer->TooltipValue = "";

            // EmbryosCryopreserved
            $this->EmbryosCryopreserved->LinkCustomAttributes = "";
            $this->EmbryosCryopreserved->HrefValue = "";
            $this->EmbryosCryopreserved->TooltipValue = "";

            // LegendCellStage
            $this->LegendCellStage->LinkCustomAttributes = "";
            $this->LegendCellStage->HrefValue = "";
            $this->LegendCellStage->TooltipValue = "";

            // ConsultantsSignature
            $this->ConsultantsSignature->LinkCustomAttributes = "";
            $this->ConsultantsSignature->HrefValue = "";
            $this->ConsultantsSignature->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // M2
            $this->M2->LinkCustomAttributes = "";
            $this->M2->HrefValue = "";
            $this->M2->TooltipValue = "";

            // Mi2
            $this->Mi2->LinkCustomAttributes = "";
            $this->Mi2->HrefValue = "";
            $this->Mi2->TooltipValue = "";

            // ICSI
            $this->ICSI->LinkCustomAttributes = "";
            $this->ICSI->HrefValue = "";
            $this->ICSI->TooltipValue = "";

            // IVF
            $this->IVF->LinkCustomAttributes = "";
            $this->IVF->HrefValue = "";
            $this->IVF->TooltipValue = "";

            // M1
            $this->M1->LinkCustomAttributes = "";
            $this->M1->HrefValue = "";
            $this->M1->TooltipValue = "";

            // GV
            $this->GV->LinkCustomAttributes = "";
            $this->GV->HrefValue = "";
            $this->GV->TooltipValue = "";

            // Others
            $this->_Others->LinkCustomAttributes = "";
            $this->_Others->HrefValue = "";
            $this->_Others->TooltipValue = "";

            // Normal2PN
            $this->Normal2PN->LinkCustomAttributes = "";
            $this->Normal2PN->HrefValue = "";
            $this->Normal2PN->TooltipValue = "";

            // Abnormalfertilisation1N
            $this->Abnormalfertilisation1N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation1N->HrefValue = "";
            $this->Abnormalfertilisation1N->TooltipValue = "";

            // Abnormalfertilisation3N
            $this->Abnormalfertilisation3N->LinkCustomAttributes = "";
            $this->Abnormalfertilisation3N->HrefValue = "";
            $this->Abnormalfertilisation3N->TooltipValue = "";

            // NotFertilized
            $this->NotFertilized->LinkCustomAttributes = "";
            $this->NotFertilized->HrefValue = "";
            $this->NotFertilized->TooltipValue = "";

            // Degenerated
            $this->Degenerated->LinkCustomAttributes = "";
            $this->Degenerated->HrefValue = "";
            $this->Degenerated->TooltipValue = "";

            // SpermDate
            $this->SpermDate->LinkCustomAttributes = "";
            $this->SpermDate->HrefValue = "";
            $this->SpermDate->TooltipValue = "";

            // Code1
            $this->Code1->LinkCustomAttributes = "";
            $this->Code1->HrefValue = "";
            $this->Code1->TooltipValue = "";

            // Day1
            $this->Day1->LinkCustomAttributes = "";
            $this->Day1->HrefValue = "";
            $this->Day1->TooltipValue = "";

            // CellStage1
            $this->CellStage1->LinkCustomAttributes = "";
            $this->CellStage1->HrefValue = "";
            $this->CellStage1->TooltipValue = "";

            // Grade1
            $this->Grade1->LinkCustomAttributes = "";
            $this->Grade1->HrefValue = "";
            $this->Grade1->TooltipValue = "";

            // State1
            $this->State1->LinkCustomAttributes = "";
            $this->State1->HrefValue = "";
            $this->State1->TooltipValue = "";

            // Code2
            $this->Code2->LinkCustomAttributes = "";
            $this->Code2->HrefValue = "";
            $this->Code2->TooltipValue = "";

            // Day2
            $this->Day2->LinkCustomAttributes = "";
            $this->Day2->HrefValue = "";
            $this->Day2->TooltipValue = "";

            // CellStage2
            $this->CellStage2->LinkCustomAttributes = "";
            $this->CellStage2->HrefValue = "";
            $this->CellStage2->TooltipValue = "";

            // Grade2
            $this->Grade2->LinkCustomAttributes = "";
            $this->Grade2->HrefValue = "";
            $this->Grade2->TooltipValue = "";

            // State2
            $this->State2->LinkCustomAttributes = "";
            $this->State2->HrefValue = "";
            $this->State2->TooltipValue = "";

            // Code3
            $this->Code3->LinkCustomAttributes = "";
            $this->Code3->HrefValue = "";
            $this->Code3->TooltipValue = "";

            // Day3
            $this->Day3->LinkCustomAttributes = "";
            $this->Day3->HrefValue = "";
            $this->Day3->TooltipValue = "";

            // CellStage3
            $this->CellStage3->LinkCustomAttributes = "";
            $this->CellStage3->HrefValue = "";
            $this->CellStage3->TooltipValue = "";

            // Grade3
            $this->Grade3->LinkCustomAttributes = "";
            $this->Grade3->HrefValue = "";
            $this->Grade3->TooltipValue = "";

            // State3
            $this->State3->LinkCustomAttributes = "";
            $this->State3->HrefValue = "";
            $this->State3->TooltipValue = "";

            // Code4
            $this->Code4->LinkCustomAttributes = "";
            $this->Code4->HrefValue = "";
            $this->Code4->TooltipValue = "";

            // Day4
            $this->Day4->LinkCustomAttributes = "";
            $this->Day4->HrefValue = "";
            $this->Day4->TooltipValue = "";

            // CellStage4
            $this->CellStage4->LinkCustomAttributes = "";
            $this->CellStage4->HrefValue = "";
            $this->CellStage4->TooltipValue = "";

            // Grade4
            $this->Grade4->LinkCustomAttributes = "";
            $this->Grade4->HrefValue = "";
            $this->Grade4->TooltipValue = "";

            // State4
            $this->State4->LinkCustomAttributes = "";
            $this->State4->HrefValue = "";
            $this->State4->TooltipValue = "";

            // Code5
            $this->Code5->LinkCustomAttributes = "";
            $this->Code5->HrefValue = "";
            $this->Code5->TooltipValue = "";

            // Day5
            $this->Day5->LinkCustomAttributes = "";
            $this->Day5->HrefValue = "";
            $this->Day5->TooltipValue = "";

            // CellStage5
            $this->CellStage5->LinkCustomAttributes = "";
            $this->CellStage5->HrefValue = "";
            $this->CellStage5->TooltipValue = "";

            // Grade5
            $this->Grade5->LinkCustomAttributes = "";
            $this->Grade5->HrefValue = "";
            $this->Grade5->TooltipValue = "";

            // State5
            $this->State5->LinkCustomAttributes = "";
            $this->State5->HrefValue = "";
            $this->State5->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // Progressive
            $this->Progressive->LinkCustomAttributes = "";
            $this->Progressive->HrefValue = "";
            $this->Progressive->TooltipValue = "";

            // Progressive1
            $this->Progressive1->LinkCustomAttributes = "";
            $this->Progressive1->HrefValue = "";
            $this->Progressive1->TooltipValue = "";

            // Progressive2
            $this->Progressive2->LinkCustomAttributes = "";
            $this->Progressive2->HrefValue = "";
            $this->Progressive2->TooltipValue = "";

            // NotProgressive
            $this->NotProgressive->LinkCustomAttributes = "";
            $this->NotProgressive->HrefValue = "";
            $this->NotProgressive->TooltipValue = "";

            // NotProgressive1
            $this->NotProgressive1->LinkCustomAttributes = "";
            $this->NotProgressive1->HrefValue = "";
            $this->NotProgressive1->TooltipValue = "";

            // NotProgressive2
            $this->NotProgressive2->LinkCustomAttributes = "";
            $this->NotProgressive2->HrefValue = "";
            $this->NotProgressive2->TooltipValue = "";

            // Motility2
            $this->Motility2->LinkCustomAttributes = "";
            $this->Motility2->HrefValue = "";
            $this->Motility2->TooltipValue = "";

            // Morphology2
            $this->Morphology2->LinkCustomAttributes = "";
            $this->Morphology2->HrefValue = "";
            $this->Morphology2->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fivf_art_summarylist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fivf_art_summarylist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fivf_art_summarylist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_ivf_art_summary" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_ivf_art_summary\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fivf_art_summarylist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Visible = false;

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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fivf_art_summarylistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
            // Export-to-email disabled
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
                case "x_ARTCycle":
                    break;
                case "x_Spermorigin":
                    break;
                case "x_Origin":
                    break;
                case "x_Status":
                    break;
                case "x_Method":
                    break;
                case "x_InseminatinTechnique":
                    break;
                case "x_DateofET":
                    break;
                case "x_Reasonfornotranfer":
                    break;
                case "x_ConsultantsSignature":
                    break;
                case "x_Day1":
                    break;
                case "x_CellStage1":
                    break;
                case "x_Grade1":
                    break;
                case "x_State1":
                    break;
                case "x_Day2":
                    break;
                case "x_CellStage2":
                    break;
                case "x_Grade2":
                    break;
                case "x_State2":
                    break;
                case "x_Day3":
                    break;
                case "x_CellStage3":
                    break;
                case "x_Grade3":
                    break;
                case "x_State3":
                    break;
                case "x_Day4":
                    break;
                case "x_CellStage4":
                    break;
                case "x_Grade4":
                    break;
                case "x_State4":
                    break;
                case "x_Day5":
                    break;
                case "x_CellStage5":
                    break;
                case "x_Grade5":
                    break;
                case "x_State5":
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
