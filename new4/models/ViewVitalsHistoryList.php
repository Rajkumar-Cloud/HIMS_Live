<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewVitalsHistoryList extends ViewVitalsHistory
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_vitals_history';

    // Page object name
    public $PageObjName = "ViewVitalsHistoryList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_vitals_historylist";
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

        // Table object (view_vitals_history)
        if (!isset($GLOBALS["view_vitals_history"]) || get_class($GLOBALS["view_vitals_history"]) == PROJECT_NAMESPACE . "view_vitals_history") {
            $GLOBALS["view_vitals_history"] = &$this;
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
        $this->AddUrl = "ViewVitalsHistoryAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewVitalsHistoryDelete";
        $this->MultiUpdateUrl = "ViewVitalsHistoryUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_vitals_history');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_vitals_historylistsrch";

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
                $doc = new $class(Container("view_vitals_history"));
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
        $this->RIDNO->setVisibility();
        $this->Name->setVisibility();
        $this->Age->setVisibility();
        $this->SEX->setVisibility();
        $this->Religion->setVisibility();
        $this->Address->setVisibility();
        $this->IdentificationMark->setVisibility();
        $this->DoublewitnessName1->setVisibility();
        $this->DoublewitnessName2->setVisibility();
        $this->Chiefcomplaints->setVisibility();
        $this->MenstrualHistory->setVisibility();
        $this->ObstetricHistory->setVisibility();
        $this->MedicalHistory->setVisibility();
        $this->SurgicalHistory->setVisibility();
        $this->Generalexaminationpallor->setVisibility();
        $this->PR->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PROVISIONALDIAGNOSIS->setVisibility();
        $this->Investigations->setVisibility();
        $this->Fheight->setVisibility();
        $this->Fweight->setVisibility();
        $this->FBMI->setVisibility();
        $this->FBloodgroup->setVisibility();
        $this->Mheight->setVisibility();
        $this->Mweight->setVisibility();
        $this->MBMI->setVisibility();
        $this->MBloodgroup->setVisibility();
        $this->FBuild->setVisibility();
        $this->MBuild->setVisibility();
        $this->FSkinColor->setVisibility();
        $this->MSkinColor->setVisibility();
        $this->FEyesColor->setVisibility();
        $this->MEyesColor->setVisibility();
        $this->FHairColor->setVisibility();
        $this->MhairColor->setVisibility();
        $this->FhairTexture->setVisibility();
        $this->MHairTexture->setVisibility();
        $this->Fothers->setVisibility();
        $this->Mothers->setVisibility();
        $this->PGE->setVisibility();
        $this->PPR->setVisibility();
        $this->PBP->setVisibility();
        $this->Breast->setVisibility();
        $this->PPA->setVisibility();
        $this->PPSV->setVisibility();
        $this->PPAPSMEAR->setVisibility();
        $this->PTHYROID->setVisibility();
        $this->MTHYROID->setVisibility();
        $this->SecSexCharacters->setVisibility();
        $this->PenisUM->setVisibility();
        $this->VAS->setVisibility();
        $this->EPIDIDYMIS->setVisibility();
        $this->Varicocele->setVisibility();
        $this->FertilityTreatmentHistory->Visible = false;
        $this->SurgeryHistory->Visible = false;
        $this->FamilyHistory->setVisibility();
        $this->PInvestigations->Visible = false;
        $this->Addictions->setVisibility();
        $this->Medications->Visible = false;
        $this->Medical->setVisibility();
        $this->Surgical->setVisibility();
        $this->CoitalHistory->setVisibility();
        $this->SemenAnalysis->Visible = false;
        $this->MInsvestications->Visible = false;
        $this->PImpression->Visible = false;
        $this->MIMpression->Visible = false;
        $this->PPlanOfManagement->Visible = false;
        $this->MPlanOfManagement->Visible = false;
        $this->PReadMore->Visible = false;
        $this->MReadMore->Visible = false;
        $this->MariedFor->setVisibility();
        $this->CMNCM->setVisibility();
        $this->TidNo->setVisibility();
        $this->pFamilyHistory->setVisibility();
        $this->pTemplateMedications->Visible = false;
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
        $this->setupLookupOptions($this->FBloodgroup);
        $this->setupLookupOptions($this->MBloodgroup);
        $this->setupLookupOptions($this->FamilyHistory);
        $this->setupLookupOptions($this->Surgical);
        $this->setupLookupOptions($this->CoitalHistory);
        $this->setupLookupOptions($this->pFamilyHistory);

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_vitals_historylistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->SEX->AdvancedSearch->toJson(), ","); // Field SEX
        $filterList = Concat($filterList, $this->Religion->AdvancedSearch->toJson(), ","); // Field Religion
        $filterList = Concat($filterList, $this->Address->AdvancedSearch->toJson(), ","); // Field Address
        $filterList = Concat($filterList, $this->IdentificationMark->AdvancedSearch->toJson(), ","); // Field IdentificationMark
        $filterList = Concat($filterList, $this->DoublewitnessName1->AdvancedSearch->toJson(), ","); // Field DoublewitnessName1
        $filterList = Concat($filterList, $this->DoublewitnessName2->AdvancedSearch->toJson(), ","); // Field DoublewitnessName2
        $filterList = Concat($filterList, $this->Chiefcomplaints->AdvancedSearch->toJson(), ","); // Field Chiefcomplaints
        $filterList = Concat($filterList, $this->MenstrualHistory->AdvancedSearch->toJson(), ","); // Field MenstrualHistory
        $filterList = Concat($filterList, $this->ObstetricHistory->AdvancedSearch->toJson(), ","); // Field ObstetricHistory
        $filterList = Concat($filterList, $this->MedicalHistory->AdvancedSearch->toJson(), ","); // Field MedicalHistory
        $filterList = Concat($filterList, $this->SurgicalHistory->AdvancedSearch->toJson(), ","); // Field SurgicalHistory
        $filterList = Concat($filterList, $this->Generalexaminationpallor->AdvancedSearch->toJson(), ","); // Field Generalexaminationpallor
        $filterList = Concat($filterList, $this->PR->AdvancedSearch->toJson(), ","); // Field PR
        $filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
        $filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
        $filterList = Concat($filterList, $this->PROVISIONALDIAGNOSIS->AdvancedSearch->toJson(), ","); // Field PROVISIONALDIAGNOSIS
        $filterList = Concat($filterList, $this->Investigations->AdvancedSearch->toJson(), ","); // Field Investigations
        $filterList = Concat($filterList, $this->Fheight->AdvancedSearch->toJson(), ","); // Field Fheight
        $filterList = Concat($filterList, $this->Fweight->AdvancedSearch->toJson(), ","); // Field Fweight
        $filterList = Concat($filterList, $this->FBMI->AdvancedSearch->toJson(), ","); // Field FBMI
        $filterList = Concat($filterList, $this->FBloodgroup->AdvancedSearch->toJson(), ","); // Field FBloodgroup
        $filterList = Concat($filterList, $this->Mheight->AdvancedSearch->toJson(), ","); // Field Mheight
        $filterList = Concat($filterList, $this->Mweight->AdvancedSearch->toJson(), ","); // Field Mweight
        $filterList = Concat($filterList, $this->MBMI->AdvancedSearch->toJson(), ","); // Field MBMI
        $filterList = Concat($filterList, $this->MBloodgroup->AdvancedSearch->toJson(), ","); // Field MBloodgroup
        $filterList = Concat($filterList, $this->FBuild->AdvancedSearch->toJson(), ","); // Field FBuild
        $filterList = Concat($filterList, $this->MBuild->AdvancedSearch->toJson(), ","); // Field MBuild
        $filterList = Concat($filterList, $this->FSkinColor->AdvancedSearch->toJson(), ","); // Field FSkinColor
        $filterList = Concat($filterList, $this->MSkinColor->AdvancedSearch->toJson(), ","); // Field MSkinColor
        $filterList = Concat($filterList, $this->FEyesColor->AdvancedSearch->toJson(), ","); // Field FEyesColor
        $filterList = Concat($filterList, $this->MEyesColor->AdvancedSearch->toJson(), ","); // Field MEyesColor
        $filterList = Concat($filterList, $this->FHairColor->AdvancedSearch->toJson(), ","); // Field FHairColor
        $filterList = Concat($filterList, $this->MhairColor->AdvancedSearch->toJson(), ","); // Field MhairColor
        $filterList = Concat($filterList, $this->FhairTexture->AdvancedSearch->toJson(), ","); // Field FhairTexture
        $filterList = Concat($filterList, $this->MHairTexture->AdvancedSearch->toJson(), ","); // Field MHairTexture
        $filterList = Concat($filterList, $this->Fothers->AdvancedSearch->toJson(), ","); // Field Fothers
        $filterList = Concat($filterList, $this->Mothers->AdvancedSearch->toJson(), ","); // Field Mothers
        $filterList = Concat($filterList, $this->PGE->AdvancedSearch->toJson(), ","); // Field PGE
        $filterList = Concat($filterList, $this->PPR->AdvancedSearch->toJson(), ","); // Field PPR
        $filterList = Concat($filterList, $this->PBP->AdvancedSearch->toJson(), ","); // Field PBP
        $filterList = Concat($filterList, $this->Breast->AdvancedSearch->toJson(), ","); // Field Breast
        $filterList = Concat($filterList, $this->PPA->AdvancedSearch->toJson(), ","); // Field PPA
        $filterList = Concat($filterList, $this->PPSV->AdvancedSearch->toJson(), ","); // Field PPSV
        $filterList = Concat($filterList, $this->PPAPSMEAR->AdvancedSearch->toJson(), ","); // Field PPAPSMEAR
        $filterList = Concat($filterList, $this->PTHYROID->AdvancedSearch->toJson(), ","); // Field PTHYROID
        $filterList = Concat($filterList, $this->MTHYROID->AdvancedSearch->toJson(), ","); // Field MTHYROID
        $filterList = Concat($filterList, $this->SecSexCharacters->AdvancedSearch->toJson(), ","); // Field SecSexCharacters
        $filterList = Concat($filterList, $this->PenisUM->AdvancedSearch->toJson(), ","); // Field PenisUM
        $filterList = Concat($filterList, $this->VAS->AdvancedSearch->toJson(), ","); // Field VAS
        $filterList = Concat($filterList, $this->EPIDIDYMIS->AdvancedSearch->toJson(), ","); // Field EPIDIDYMIS
        $filterList = Concat($filterList, $this->Varicocele->AdvancedSearch->toJson(), ","); // Field Varicocele
        $filterList = Concat($filterList, $this->FertilityTreatmentHistory->AdvancedSearch->toJson(), ","); // Field FertilityTreatmentHistory
        $filterList = Concat($filterList, $this->SurgeryHistory->AdvancedSearch->toJson(), ","); // Field SurgeryHistory
        $filterList = Concat($filterList, $this->FamilyHistory->AdvancedSearch->toJson(), ","); // Field FamilyHistory
        $filterList = Concat($filterList, $this->PInvestigations->AdvancedSearch->toJson(), ","); // Field PInvestigations
        $filterList = Concat($filterList, $this->Addictions->AdvancedSearch->toJson(), ","); // Field Addictions
        $filterList = Concat($filterList, $this->Medications->AdvancedSearch->toJson(), ","); // Field Medications
        $filterList = Concat($filterList, $this->Medical->AdvancedSearch->toJson(), ","); // Field Medical
        $filterList = Concat($filterList, $this->Surgical->AdvancedSearch->toJson(), ","); // Field Surgical
        $filterList = Concat($filterList, $this->CoitalHistory->AdvancedSearch->toJson(), ","); // Field CoitalHistory
        $filterList = Concat($filterList, $this->SemenAnalysis->AdvancedSearch->toJson(), ","); // Field SemenAnalysis
        $filterList = Concat($filterList, $this->MInsvestications->AdvancedSearch->toJson(), ","); // Field MInsvestications
        $filterList = Concat($filterList, $this->PImpression->AdvancedSearch->toJson(), ","); // Field PImpression
        $filterList = Concat($filterList, $this->MIMpression->AdvancedSearch->toJson(), ","); // Field MIMpression
        $filterList = Concat($filterList, $this->PPlanOfManagement->AdvancedSearch->toJson(), ","); // Field PPlanOfManagement
        $filterList = Concat($filterList, $this->MPlanOfManagement->AdvancedSearch->toJson(), ","); // Field MPlanOfManagement
        $filterList = Concat($filterList, $this->PReadMore->AdvancedSearch->toJson(), ","); // Field PReadMore
        $filterList = Concat($filterList, $this->MReadMore->AdvancedSearch->toJson(), ","); // Field MReadMore
        $filterList = Concat($filterList, $this->MariedFor->AdvancedSearch->toJson(), ","); // Field MariedFor
        $filterList = Concat($filterList, $this->CMNCM->AdvancedSearch->toJson(), ","); // Field CMNCM
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->pFamilyHistory->AdvancedSearch->toJson(), ","); // Field pFamilyHistory
        $filterList = Concat($filterList, $this->pTemplateMedications->AdvancedSearch->toJson(), ","); // Field pTemplateMedications
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_vitals_historylistsrch", $filters);
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

        // Field RIDNO
        $this->RIDNO->AdvancedSearch->SearchValue = @$filter["x_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator = @$filter["z_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchCondition = @$filter["v_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchValue2 = @$filter["y_RIDNO"];
        $this->RIDNO->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNO"];
        $this->RIDNO->AdvancedSearch->save();

        // Field Name
        $this->Name->AdvancedSearch->SearchValue = @$filter["x_Name"];
        $this->Name->AdvancedSearch->SearchOperator = @$filter["z_Name"];
        $this->Name->AdvancedSearch->SearchCondition = @$filter["v_Name"];
        $this->Name->AdvancedSearch->SearchValue2 = @$filter["y_Name"];
        $this->Name->AdvancedSearch->SearchOperator2 = @$filter["w_Name"];
        $this->Name->AdvancedSearch->save();

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field SEX
        $this->SEX->AdvancedSearch->SearchValue = @$filter["x_SEX"];
        $this->SEX->AdvancedSearch->SearchOperator = @$filter["z_SEX"];
        $this->SEX->AdvancedSearch->SearchCondition = @$filter["v_SEX"];
        $this->SEX->AdvancedSearch->SearchValue2 = @$filter["y_SEX"];
        $this->SEX->AdvancedSearch->SearchOperator2 = @$filter["w_SEX"];
        $this->SEX->AdvancedSearch->save();

        // Field Religion
        $this->Religion->AdvancedSearch->SearchValue = @$filter["x_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator = @$filter["z_Religion"];
        $this->Religion->AdvancedSearch->SearchCondition = @$filter["v_Religion"];
        $this->Religion->AdvancedSearch->SearchValue2 = @$filter["y_Religion"];
        $this->Religion->AdvancedSearch->SearchOperator2 = @$filter["w_Religion"];
        $this->Religion->AdvancedSearch->save();

        // Field Address
        $this->Address->AdvancedSearch->SearchValue = @$filter["x_Address"];
        $this->Address->AdvancedSearch->SearchOperator = @$filter["z_Address"];
        $this->Address->AdvancedSearch->SearchCondition = @$filter["v_Address"];
        $this->Address->AdvancedSearch->SearchValue2 = @$filter["y_Address"];
        $this->Address->AdvancedSearch->SearchOperator2 = @$filter["w_Address"];
        $this->Address->AdvancedSearch->save();

        // Field IdentificationMark
        $this->IdentificationMark->AdvancedSearch->SearchValue = @$filter["x_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator = @$filter["z_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchCondition = @$filter["v_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchValue2 = @$filter["y_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->SearchOperator2 = @$filter["w_IdentificationMark"];
        $this->IdentificationMark->AdvancedSearch->save();

        // Field DoublewitnessName1
        $this->DoublewitnessName1->AdvancedSearch->SearchValue = @$filter["x_DoublewitnessName1"];
        $this->DoublewitnessName1->AdvancedSearch->SearchOperator = @$filter["z_DoublewitnessName1"];
        $this->DoublewitnessName1->AdvancedSearch->SearchCondition = @$filter["v_DoublewitnessName1"];
        $this->DoublewitnessName1->AdvancedSearch->SearchValue2 = @$filter["y_DoublewitnessName1"];
        $this->DoublewitnessName1->AdvancedSearch->SearchOperator2 = @$filter["w_DoublewitnessName1"];
        $this->DoublewitnessName1->AdvancedSearch->save();

        // Field DoublewitnessName2
        $this->DoublewitnessName2->AdvancedSearch->SearchValue = @$filter["x_DoublewitnessName2"];
        $this->DoublewitnessName2->AdvancedSearch->SearchOperator = @$filter["z_DoublewitnessName2"];
        $this->DoublewitnessName2->AdvancedSearch->SearchCondition = @$filter["v_DoublewitnessName2"];
        $this->DoublewitnessName2->AdvancedSearch->SearchValue2 = @$filter["y_DoublewitnessName2"];
        $this->DoublewitnessName2->AdvancedSearch->SearchOperator2 = @$filter["w_DoublewitnessName2"];
        $this->DoublewitnessName2->AdvancedSearch->save();

        // Field Chiefcomplaints
        $this->Chiefcomplaints->AdvancedSearch->SearchValue = @$filter["x_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchOperator = @$filter["z_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchCondition = @$filter["v_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchValue2 = @$filter["y_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->SearchOperator2 = @$filter["w_Chiefcomplaints"];
        $this->Chiefcomplaints->AdvancedSearch->save();

        // Field MenstrualHistory
        $this->MenstrualHistory->AdvancedSearch->SearchValue = @$filter["x_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchOperator = @$filter["z_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchCondition = @$filter["v_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchValue2 = @$filter["y_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MenstrualHistory"];
        $this->MenstrualHistory->AdvancedSearch->save();

        // Field ObstetricHistory
        $this->ObstetricHistory->AdvancedSearch->SearchValue = @$filter["x_ObstetricHistory"];
        $this->ObstetricHistory->AdvancedSearch->SearchOperator = @$filter["z_ObstetricHistory"];
        $this->ObstetricHistory->AdvancedSearch->SearchCondition = @$filter["v_ObstetricHistory"];
        $this->ObstetricHistory->AdvancedSearch->SearchValue2 = @$filter["y_ObstetricHistory"];
        $this->ObstetricHistory->AdvancedSearch->SearchOperator2 = @$filter["w_ObstetricHistory"];
        $this->ObstetricHistory->AdvancedSearch->save();

        // Field MedicalHistory
        $this->MedicalHistory->AdvancedSearch->SearchValue = @$filter["x_MedicalHistory"];
        $this->MedicalHistory->AdvancedSearch->SearchOperator = @$filter["z_MedicalHistory"];
        $this->MedicalHistory->AdvancedSearch->SearchCondition = @$filter["v_MedicalHistory"];
        $this->MedicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_MedicalHistory"];
        $this->MedicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_MedicalHistory"];
        $this->MedicalHistory->AdvancedSearch->save();

        // Field SurgicalHistory
        $this->SurgicalHistory->AdvancedSearch->SearchValue = @$filter["x_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgicalHistory"];
        $this->SurgicalHistory->AdvancedSearch->save();

        // Field Generalexaminationpallor
        $this->Generalexaminationpallor->AdvancedSearch->SearchValue = @$filter["x_Generalexaminationpallor"];
        $this->Generalexaminationpallor->AdvancedSearch->SearchOperator = @$filter["z_Generalexaminationpallor"];
        $this->Generalexaminationpallor->AdvancedSearch->SearchCondition = @$filter["v_Generalexaminationpallor"];
        $this->Generalexaminationpallor->AdvancedSearch->SearchValue2 = @$filter["y_Generalexaminationpallor"];
        $this->Generalexaminationpallor->AdvancedSearch->SearchOperator2 = @$filter["w_Generalexaminationpallor"];
        $this->Generalexaminationpallor->AdvancedSearch->save();

        // Field PR
        $this->PR->AdvancedSearch->SearchValue = @$filter["x_PR"];
        $this->PR->AdvancedSearch->SearchOperator = @$filter["z_PR"];
        $this->PR->AdvancedSearch->SearchCondition = @$filter["v_PR"];
        $this->PR->AdvancedSearch->SearchValue2 = @$filter["y_PR"];
        $this->PR->AdvancedSearch->SearchOperator2 = @$filter["w_PR"];
        $this->PR->AdvancedSearch->save();

        // Field CVS
        $this->CVS->AdvancedSearch->SearchValue = @$filter["x_CVS"];
        $this->CVS->AdvancedSearch->SearchOperator = @$filter["z_CVS"];
        $this->CVS->AdvancedSearch->SearchCondition = @$filter["v_CVS"];
        $this->CVS->AdvancedSearch->SearchValue2 = @$filter["y_CVS"];
        $this->CVS->AdvancedSearch->SearchOperator2 = @$filter["w_CVS"];
        $this->CVS->AdvancedSearch->save();

        // Field PA
        $this->PA->AdvancedSearch->SearchValue = @$filter["x_PA"];
        $this->PA->AdvancedSearch->SearchOperator = @$filter["z_PA"];
        $this->PA->AdvancedSearch->SearchCondition = @$filter["v_PA"];
        $this->PA->AdvancedSearch->SearchValue2 = @$filter["y_PA"];
        $this->PA->AdvancedSearch->SearchOperator2 = @$filter["w_PA"];
        $this->PA->AdvancedSearch->save();

        // Field PROVISIONALDIAGNOSIS
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue = @$filter["x_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator = @$filter["z_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchCondition = @$filter["v_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchValue2 = @$filter["y_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->SearchOperator2 = @$filter["w_PROVISIONALDIAGNOSIS"];
        $this->PROVISIONALDIAGNOSIS->AdvancedSearch->save();

        // Field Investigations
        $this->Investigations->AdvancedSearch->SearchValue = @$filter["x_Investigations"];
        $this->Investigations->AdvancedSearch->SearchOperator = @$filter["z_Investigations"];
        $this->Investigations->AdvancedSearch->SearchCondition = @$filter["v_Investigations"];
        $this->Investigations->AdvancedSearch->SearchValue2 = @$filter["y_Investigations"];
        $this->Investigations->AdvancedSearch->SearchOperator2 = @$filter["w_Investigations"];
        $this->Investigations->AdvancedSearch->save();

        // Field Fheight
        $this->Fheight->AdvancedSearch->SearchValue = @$filter["x_Fheight"];
        $this->Fheight->AdvancedSearch->SearchOperator = @$filter["z_Fheight"];
        $this->Fheight->AdvancedSearch->SearchCondition = @$filter["v_Fheight"];
        $this->Fheight->AdvancedSearch->SearchValue2 = @$filter["y_Fheight"];
        $this->Fheight->AdvancedSearch->SearchOperator2 = @$filter["w_Fheight"];
        $this->Fheight->AdvancedSearch->save();

        // Field Fweight
        $this->Fweight->AdvancedSearch->SearchValue = @$filter["x_Fweight"];
        $this->Fweight->AdvancedSearch->SearchOperator = @$filter["z_Fweight"];
        $this->Fweight->AdvancedSearch->SearchCondition = @$filter["v_Fweight"];
        $this->Fweight->AdvancedSearch->SearchValue2 = @$filter["y_Fweight"];
        $this->Fweight->AdvancedSearch->SearchOperator2 = @$filter["w_Fweight"];
        $this->Fweight->AdvancedSearch->save();

        // Field FBMI
        $this->FBMI->AdvancedSearch->SearchValue = @$filter["x_FBMI"];
        $this->FBMI->AdvancedSearch->SearchOperator = @$filter["z_FBMI"];
        $this->FBMI->AdvancedSearch->SearchCondition = @$filter["v_FBMI"];
        $this->FBMI->AdvancedSearch->SearchValue2 = @$filter["y_FBMI"];
        $this->FBMI->AdvancedSearch->SearchOperator2 = @$filter["w_FBMI"];
        $this->FBMI->AdvancedSearch->save();

        // Field FBloodgroup
        $this->FBloodgroup->AdvancedSearch->SearchValue = @$filter["x_FBloodgroup"];
        $this->FBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_FBloodgroup"];
        $this->FBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_FBloodgroup"];
        $this->FBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_FBloodgroup"];
        $this->FBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_FBloodgroup"];
        $this->FBloodgroup->AdvancedSearch->save();

        // Field Mheight
        $this->Mheight->AdvancedSearch->SearchValue = @$filter["x_Mheight"];
        $this->Mheight->AdvancedSearch->SearchOperator = @$filter["z_Mheight"];
        $this->Mheight->AdvancedSearch->SearchCondition = @$filter["v_Mheight"];
        $this->Mheight->AdvancedSearch->SearchValue2 = @$filter["y_Mheight"];
        $this->Mheight->AdvancedSearch->SearchOperator2 = @$filter["w_Mheight"];
        $this->Mheight->AdvancedSearch->save();

        // Field Mweight
        $this->Mweight->AdvancedSearch->SearchValue = @$filter["x_Mweight"];
        $this->Mweight->AdvancedSearch->SearchOperator = @$filter["z_Mweight"];
        $this->Mweight->AdvancedSearch->SearchCondition = @$filter["v_Mweight"];
        $this->Mweight->AdvancedSearch->SearchValue2 = @$filter["y_Mweight"];
        $this->Mweight->AdvancedSearch->SearchOperator2 = @$filter["w_Mweight"];
        $this->Mweight->AdvancedSearch->save();

        // Field MBMI
        $this->MBMI->AdvancedSearch->SearchValue = @$filter["x_MBMI"];
        $this->MBMI->AdvancedSearch->SearchOperator = @$filter["z_MBMI"];
        $this->MBMI->AdvancedSearch->SearchCondition = @$filter["v_MBMI"];
        $this->MBMI->AdvancedSearch->SearchValue2 = @$filter["y_MBMI"];
        $this->MBMI->AdvancedSearch->SearchOperator2 = @$filter["w_MBMI"];
        $this->MBMI->AdvancedSearch->save();

        // Field MBloodgroup
        $this->MBloodgroup->AdvancedSearch->SearchValue = @$filter["x_MBloodgroup"];
        $this->MBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_MBloodgroup"];
        $this->MBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_MBloodgroup"];
        $this->MBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_MBloodgroup"];
        $this->MBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_MBloodgroup"];
        $this->MBloodgroup->AdvancedSearch->save();

        // Field FBuild
        $this->FBuild->AdvancedSearch->SearchValue = @$filter["x_FBuild"];
        $this->FBuild->AdvancedSearch->SearchOperator = @$filter["z_FBuild"];
        $this->FBuild->AdvancedSearch->SearchCondition = @$filter["v_FBuild"];
        $this->FBuild->AdvancedSearch->SearchValue2 = @$filter["y_FBuild"];
        $this->FBuild->AdvancedSearch->SearchOperator2 = @$filter["w_FBuild"];
        $this->FBuild->AdvancedSearch->save();

        // Field MBuild
        $this->MBuild->AdvancedSearch->SearchValue = @$filter["x_MBuild"];
        $this->MBuild->AdvancedSearch->SearchOperator = @$filter["z_MBuild"];
        $this->MBuild->AdvancedSearch->SearchCondition = @$filter["v_MBuild"];
        $this->MBuild->AdvancedSearch->SearchValue2 = @$filter["y_MBuild"];
        $this->MBuild->AdvancedSearch->SearchOperator2 = @$filter["w_MBuild"];
        $this->MBuild->AdvancedSearch->save();

        // Field FSkinColor
        $this->FSkinColor->AdvancedSearch->SearchValue = @$filter["x_FSkinColor"];
        $this->FSkinColor->AdvancedSearch->SearchOperator = @$filter["z_FSkinColor"];
        $this->FSkinColor->AdvancedSearch->SearchCondition = @$filter["v_FSkinColor"];
        $this->FSkinColor->AdvancedSearch->SearchValue2 = @$filter["y_FSkinColor"];
        $this->FSkinColor->AdvancedSearch->SearchOperator2 = @$filter["w_FSkinColor"];
        $this->FSkinColor->AdvancedSearch->save();

        // Field MSkinColor
        $this->MSkinColor->AdvancedSearch->SearchValue = @$filter["x_MSkinColor"];
        $this->MSkinColor->AdvancedSearch->SearchOperator = @$filter["z_MSkinColor"];
        $this->MSkinColor->AdvancedSearch->SearchCondition = @$filter["v_MSkinColor"];
        $this->MSkinColor->AdvancedSearch->SearchValue2 = @$filter["y_MSkinColor"];
        $this->MSkinColor->AdvancedSearch->SearchOperator2 = @$filter["w_MSkinColor"];
        $this->MSkinColor->AdvancedSearch->save();

        // Field FEyesColor
        $this->FEyesColor->AdvancedSearch->SearchValue = @$filter["x_FEyesColor"];
        $this->FEyesColor->AdvancedSearch->SearchOperator = @$filter["z_FEyesColor"];
        $this->FEyesColor->AdvancedSearch->SearchCondition = @$filter["v_FEyesColor"];
        $this->FEyesColor->AdvancedSearch->SearchValue2 = @$filter["y_FEyesColor"];
        $this->FEyesColor->AdvancedSearch->SearchOperator2 = @$filter["w_FEyesColor"];
        $this->FEyesColor->AdvancedSearch->save();

        // Field MEyesColor
        $this->MEyesColor->AdvancedSearch->SearchValue = @$filter["x_MEyesColor"];
        $this->MEyesColor->AdvancedSearch->SearchOperator = @$filter["z_MEyesColor"];
        $this->MEyesColor->AdvancedSearch->SearchCondition = @$filter["v_MEyesColor"];
        $this->MEyesColor->AdvancedSearch->SearchValue2 = @$filter["y_MEyesColor"];
        $this->MEyesColor->AdvancedSearch->SearchOperator2 = @$filter["w_MEyesColor"];
        $this->MEyesColor->AdvancedSearch->save();

        // Field FHairColor
        $this->FHairColor->AdvancedSearch->SearchValue = @$filter["x_FHairColor"];
        $this->FHairColor->AdvancedSearch->SearchOperator = @$filter["z_FHairColor"];
        $this->FHairColor->AdvancedSearch->SearchCondition = @$filter["v_FHairColor"];
        $this->FHairColor->AdvancedSearch->SearchValue2 = @$filter["y_FHairColor"];
        $this->FHairColor->AdvancedSearch->SearchOperator2 = @$filter["w_FHairColor"];
        $this->FHairColor->AdvancedSearch->save();

        // Field MhairColor
        $this->MhairColor->AdvancedSearch->SearchValue = @$filter["x_MhairColor"];
        $this->MhairColor->AdvancedSearch->SearchOperator = @$filter["z_MhairColor"];
        $this->MhairColor->AdvancedSearch->SearchCondition = @$filter["v_MhairColor"];
        $this->MhairColor->AdvancedSearch->SearchValue2 = @$filter["y_MhairColor"];
        $this->MhairColor->AdvancedSearch->SearchOperator2 = @$filter["w_MhairColor"];
        $this->MhairColor->AdvancedSearch->save();

        // Field FhairTexture
        $this->FhairTexture->AdvancedSearch->SearchValue = @$filter["x_FhairTexture"];
        $this->FhairTexture->AdvancedSearch->SearchOperator = @$filter["z_FhairTexture"];
        $this->FhairTexture->AdvancedSearch->SearchCondition = @$filter["v_FhairTexture"];
        $this->FhairTexture->AdvancedSearch->SearchValue2 = @$filter["y_FhairTexture"];
        $this->FhairTexture->AdvancedSearch->SearchOperator2 = @$filter["w_FhairTexture"];
        $this->FhairTexture->AdvancedSearch->save();

        // Field MHairTexture
        $this->MHairTexture->AdvancedSearch->SearchValue = @$filter["x_MHairTexture"];
        $this->MHairTexture->AdvancedSearch->SearchOperator = @$filter["z_MHairTexture"];
        $this->MHairTexture->AdvancedSearch->SearchCondition = @$filter["v_MHairTexture"];
        $this->MHairTexture->AdvancedSearch->SearchValue2 = @$filter["y_MHairTexture"];
        $this->MHairTexture->AdvancedSearch->SearchOperator2 = @$filter["w_MHairTexture"];
        $this->MHairTexture->AdvancedSearch->save();

        // Field Fothers
        $this->Fothers->AdvancedSearch->SearchValue = @$filter["x_Fothers"];
        $this->Fothers->AdvancedSearch->SearchOperator = @$filter["z_Fothers"];
        $this->Fothers->AdvancedSearch->SearchCondition = @$filter["v_Fothers"];
        $this->Fothers->AdvancedSearch->SearchValue2 = @$filter["y_Fothers"];
        $this->Fothers->AdvancedSearch->SearchOperator2 = @$filter["w_Fothers"];
        $this->Fothers->AdvancedSearch->save();

        // Field Mothers
        $this->Mothers->AdvancedSearch->SearchValue = @$filter["x_Mothers"];
        $this->Mothers->AdvancedSearch->SearchOperator = @$filter["z_Mothers"];
        $this->Mothers->AdvancedSearch->SearchCondition = @$filter["v_Mothers"];
        $this->Mothers->AdvancedSearch->SearchValue2 = @$filter["y_Mothers"];
        $this->Mothers->AdvancedSearch->SearchOperator2 = @$filter["w_Mothers"];
        $this->Mothers->AdvancedSearch->save();

        // Field PGE
        $this->PGE->AdvancedSearch->SearchValue = @$filter["x_PGE"];
        $this->PGE->AdvancedSearch->SearchOperator = @$filter["z_PGE"];
        $this->PGE->AdvancedSearch->SearchCondition = @$filter["v_PGE"];
        $this->PGE->AdvancedSearch->SearchValue2 = @$filter["y_PGE"];
        $this->PGE->AdvancedSearch->SearchOperator2 = @$filter["w_PGE"];
        $this->PGE->AdvancedSearch->save();

        // Field PPR
        $this->PPR->AdvancedSearch->SearchValue = @$filter["x_PPR"];
        $this->PPR->AdvancedSearch->SearchOperator = @$filter["z_PPR"];
        $this->PPR->AdvancedSearch->SearchCondition = @$filter["v_PPR"];
        $this->PPR->AdvancedSearch->SearchValue2 = @$filter["y_PPR"];
        $this->PPR->AdvancedSearch->SearchOperator2 = @$filter["w_PPR"];
        $this->PPR->AdvancedSearch->save();

        // Field PBP
        $this->PBP->AdvancedSearch->SearchValue = @$filter["x_PBP"];
        $this->PBP->AdvancedSearch->SearchOperator = @$filter["z_PBP"];
        $this->PBP->AdvancedSearch->SearchCondition = @$filter["v_PBP"];
        $this->PBP->AdvancedSearch->SearchValue2 = @$filter["y_PBP"];
        $this->PBP->AdvancedSearch->SearchOperator2 = @$filter["w_PBP"];
        $this->PBP->AdvancedSearch->save();

        // Field Breast
        $this->Breast->AdvancedSearch->SearchValue = @$filter["x_Breast"];
        $this->Breast->AdvancedSearch->SearchOperator = @$filter["z_Breast"];
        $this->Breast->AdvancedSearch->SearchCondition = @$filter["v_Breast"];
        $this->Breast->AdvancedSearch->SearchValue2 = @$filter["y_Breast"];
        $this->Breast->AdvancedSearch->SearchOperator2 = @$filter["w_Breast"];
        $this->Breast->AdvancedSearch->save();

        // Field PPA
        $this->PPA->AdvancedSearch->SearchValue = @$filter["x_PPA"];
        $this->PPA->AdvancedSearch->SearchOperator = @$filter["z_PPA"];
        $this->PPA->AdvancedSearch->SearchCondition = @$filter["v_PPA"];
        $this->PPA->AdvancedSearch->SearchValue2 = @$filter["y_PPA"];
        $this->PPA->AdvancedSearch->SearchOperator2 = @$filter["w_PPA"];
        $this->PPA->AdvancedSearch->save();

        // Field PPSV
        $this->PPSV->AdvancedSearch->SearchValue = @$filter["x_PPSV"];
        $this->PPSV->AdvancedSearch->SearchOperator = @$filter["z_PPSV"];
        $this->PPSV->AdvancedSearch->SearchCondition = @$filter["v_PPSV"];
        $this->PPSV->AdvancedSearch->SearchValue2 = @$filter["y_PPSV"];
        $this->PPSV->AdvancedSearch->SearchOperator2 = @$filter["w_PPSV"];
        $this->PPSV->AdvancedSearch->save();

        // Field PPAPSMEAR
        $this->PPAPSMEAR->AdvancedSearch->SearchValue = @$filter["x_PPAPSMEAR"];
        $this->PPAPSMEAR->AdvancedSearch->SearchOperator = @$filter["z_PPAPSMEAR"];
        $this->PPAPSMEAR->AdvancedSearch->SearchCondition = @$filter["v_PPAPSMEAR"];
        $this->PPAPSMEAR->AdvancedSearch->SearchValue2 = @$filter["y_PPAPSMEAR"];
        $this->PPAPSMEAR->AdvancedSearch->SearchOperator2 = @$filter["w_PPAPSMEAR"];
        $this->PPAPSMEAR->AdvancedSearch->save();

        // Field PTHYROID
        $this->PTHYROID->AdvancedSearch->SearchValue = @$filter["x_PTHYROID"];
        $this->PTHYROID->AdvancedSearch->SearchOperator = @$filter["z_PTHYROID"];
        $this->PTHYROID->AdvancedSearch->SearchCondition = @$filter["v_PTHYROID"];
        $this->PTHYROID->AdvancedSearch->SearchValue2 = @$filter["y_PTHYROID"];
        $this->PTHYROID->AdvancedSearch->SearchOperator2 = @$filter["w_PTHYROID"];
        $this->PTHYROID->AdvancedSearch->save();

        // Field MTHYROID
        $this->MTHYROID->AdvancedSearch->SearchValue = @$filter["x_MTHYROID"];
        $this->MTHYROID->AdvancedSearch->SearchOperator = @$filter["z_MTHYROID"];
        $this->MTHYROID->AdvancedSearch->SearchCondition = @$filter["v_MTHYROID"];
        $this->MTHYROID->AdvancedSearch->SearchValue2 = @$filter["y_MTHYROID"];
        $this->MTHYROID->AdvancedSearch->SearchOperator2 = @$filter["w_MTHYROID"];
        $this->MTHYROID->AdvancedSearch->save();

        // Field SecSexCharacters
        $this->SecSexCharacters->AdvancedSearch->SearchValue = @$filter["x_SecSexCharacters"];
        $this->SecSexCharacters->AdvancedSearch->SearchOperator = @$filter["z_SecSexCharacters"];
        $this->SecSexCharacters->AdvancedSearch->SearchCondition = @$filter["v_SecSexCharacters"];
        $this->SecSexCharacters->AdvancedSearch->SearchValue2 = @$filter["y_SecSexCharacters"];
        $this->SecSexCharacters->AdvancedSearch->SearchOperator2 = @$filter["w_SecSexCharacters"];
        $this->SecSexCharacters->AdvancedSearch->save();

        // Field PenisUM
        $this->PenisUM->AdvancedSearch->SearchValue = @$filter["x_PenisUM"];
        $this->PenisUM->AdvancedSearch->SearchOperator = @$filter["z_PenisUM"];
        $this->PenisUM->AdvancedSearch->SearchCondition = @$filter["v_PenisUM"];
        $this->PenisUM->AdvancedSearch->SearchValue2 = @$filter["y_PenisUM"];
        $this->PenisUM->AdvancedSearch->SearchOperator2 = @$filter["w_PenisUM"];
        $this->PenisUM->AdvancedSearch->save();

        // Field VAS
        $this->VAS->AdvancedSearch->SearchValue = @$filter["x_VAS"];
        $this->VAS->AdvancedSearch->SearchOperator = @$filter["z_VAS"];
        $this->VAS->AdvancedSearch->SearchCondition = @$filter["v_VAS"];
        $this->VAS->AdvancedSearch->SearchValue2 = @$filter["y_VAS"];
        $this->VAS->AdvancedSearch->SearchOperator2 = @$filter["w_VAS"];
        $this->VAS->AdvancedSearch->save();

        // Field EPIDIDYMIS
        $this->EPIDIDYMIS->AdvancedSearch->SearchValue = @$filter["x_EPIDIDYMIS"];
        $this->EPIDIDYMIS->AdvancedSearch->SearchOperator = @$filter["z_EPIDIDYMIS"];
        $this->EPIDIDYMIS->AdvancedSearch->SearchCondition = @$filter["v_EPIDIDYMIS"];
        $this->EPIDIDYMIS->AdvancedSearch->SearchValue2 = @$filter["y_EPIDIDYMIS"];
        $this->EPIDIDYMIS->AdvancedSearch->SearchOperator2 = @$filter["w_EPIDIDYMIS"];
        $this->EPIDIDYMIS->AdvancedSearch->save();

        // Field Varicocele
        $this->Varicocele->AdvancedSearch->SearchValue = @$filter["x_Varicocele"];
        $this->Varicocele->AdvancedSearch->SearchOperator = @$filter["z_Varicocele"];
        $this->Varicocele->AdvancedSearch->SearchCondition = @$filter["v_Varicocele"];
        $this->Varicocele->AdvancedSearch->SearchValue2 = @$filter["y_Varicocele"];
        $this->Varicocele->AdvancedSearch->SearchOperator2 = @$filter["w_Varicocele"];
        $this->Varicocele->AdvancedSearch->save();

        // Field FertilityTreatmentHistory
        $this->FertilityTreatmentHistory->AdvancedSearch->SearchValue = @$filter["x_FertilityTreatmentHistory"];
        $this->FertilityTreatmentHistory->AdvancedSearch->SearchOperator = @$filter["z_FertilityTreatmentHistory"];
        $this->FertilityTreatmentHistory->AdvancedSearch->SearchCondition = @$filter["v_FertilityTreatmentHistory"];
        $this->FertilityTreatmentHistory->AdvancedSearch->SearchValue2 = @$filter["y_FertilityTreatmentHistory"];
        $this->FertilityTreatmentHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FertilityTreatmentHistory"];
        $this->FertilityTreatmentHistory->AdvancedSearch->save();

        // Field SurgeryHistory
        $this->SurgeryHistory->AdvancedSearch->SearchValue = @$filter["x_SurgeryHistory"];
        $this->SurgeryHistory->AdvancedSearch->SearchOperator = @$filter["z_SurgeryHistory"];
        $this->SurgeryHistory->AdvancedSearch->SearchCondition = @$filter["v_SurgeryHistory"];
        $this->SurgeryHistory->AdvancedSearch->SearchValue2 = @$filter["y_SurgeryHistory"];
        $this->SurgeryHistory->AdvancedSearch->SearchOperator2 = @$filter["w_SurgeryHistory"];
        $this->SurgeryHistory->AdvancedSearch->save();

        // Field FamilyHistory
        $this->FamilyHistory->AdvancedSearch->SearchValue = @$filter["x_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_FamilyHistory"];
        $this->FamilyHistory->AdvancedSearch->save();

        // Field PInvestigations
        $this->PInvestigations->AdvancedSearch->SearchValue = @$filter["x_PInvestigations"];
        $this->PInvestigations->AdvancedSearch->SearchOperator = @$filter["z_PInvestigations"];
        $this->PInvestigations->AdvancedSearch->SearchCondition = @$filter["v_PInvestigations"];
        $this->PInvestigations->AdvancedSearch->SearchValue2 = @$filter["y_PInvestigations"];
        $this->PInvestigations->AdvancedSearch->SearchOperator2 = @$filter["w_PInvestigations"];
        $this->PInvestigations->AdvancedSearch->save();

        // Field Addictions
        $this->Addictions->AdvancedSearch->SearchValue = @$filter["x_Addictions"];
        $this->Addictions->AdvancedSearch->SearchOperator = @$filter["z_Addictions"];
        $this->Addictions->AdvancedSearch->SearchCondition = @$filter["v_Addictions"];
        $this->Addictions->AdvancedSearch->SearchValue2 = @$filter["y_Addictions"];
        $this->Addictions->AdvancedSearch->SearchOperator2 = @$filter["w_Addictions"];
        $this->Addictions->AdvancedSearch->save();

        // Field Medications
        $this->Medications->AdvancedSearch->SearchValue = @$filter["x_Medications"];
        $this->Medications->AdvancedSearch->SearchOperator = @$filter["z_Medications"];
        $this->Medications->AdvancedSearch->SearchCondition = @$filter["v_Medications"];
        $this->Medications->AdvancedSearch->SearchValue2 = @$filter["y_Medications"];
        $this->Medications->AdvancedSearch->SearchOperator2 = @$filter["w_Medications"];
        $this->Medications->AdvancedSearch->save();

        // Field Medical
        $this->Medical->AdvancedSearch->SearchValue = @$filter["x_Medical"];
        $this->Medical->AdvancedSearch->SearchOperator = @$filter["z_Medical"];
        $this->Medical->AdvancedSearch->SearchCondition = @$filter["v_Medical"];
        $this->Medical->AdvancedSearch->SearchValue2 = @$filter["y_Medical"];
        $this->Medical->AdvancedSearch->SearchOperator2 = @$filter["w_Medical"];
        $this->Medical->AdvancedSearch->save();

        // Field Surgical
        $this->Surgical->AdvancedSearch->SearchValue = @$filter["x_Surgical"];
        $this->Surgical->AdvancedSearch->SearchOperator = @$filter["z_Surgical"];
        $this->Surgical->AdvancedSearch->SearchCondition = @$filter["v_Surgical"];
        $this->Surgical->AdvancedSearch->SearchValue2 = @$filter["y_Surgical"];
        $this->Surgical->AdvancedSearch->SearchOperator2 = @$filter["w_Surgical"];
        $this->Surgical->AdvancedSearch->save();

        // Field CoitalHistory
        $this->CoitalHistory->AdvancedSearch->SearchValue = @$filter["x_CoitalHistory"];
        $this->CoitalHistory->AdvancedSearch->SearchOperator = @$filter["z_CoitalHistory"];
        $this->CoitalHistory->AdvancedSearch->SearchCondition = @$filter["v_CoitalHistory"];
        $this->CoitalHistory->AdvancedSearch->SearchValue2 = @$filter["y_CoitalHistory"];
        $this->CoitalHistory->AdvancedSearch->SearchOperator2 = @$filter["w_CoitalHistory"];
        $this->CoitalHistory->AdvancedSearch->save();

        // Field SemenAnalysis
        $this->SemenAnalysis->AdvancedSearch->SearchValue = @$filter["x_SemenAnalysis"];
        $this->SemenAnalysis->AdvancedSearch->SearchOperator = @$filter["z_SemenAnalysis"];
        $this->SemenAnalysis->AdvancedSearch->SearchCondition = @$filter["v_SemenAnalysis"];
        $this->SemenAnalysis->AdvancedSearch->SearchValue2 = @$filter["y_SemenAnalysis"];
        $this->SemenAnalysis->AdvancedSearch->SearchOperator2 = @$filter["w_SemenAnalysis"];
        $this->SemenAnalysis->AdvancedSearch->save();

        // Field MInsvestications
        $this->MInsvestications->AdvancedSearch->SearchValue = @$filter["x_MInsvestications"];
        $this->MInsvestications->AdvancedSearch->SearchOperator = @$filter["z_MInsvestications"];
        $this->MInsvestications->AdvancedSearch->SearchCondition = @$filter["v_MInsvestications"];
        $this->MInsvestications->AdvancedSearch->SearchValue2 = @$filter["y_MInsvestications"];
        $this->MInsvestications->AdvancedSearch->SearchOperator2 = @$filter["w_MInsvestications"];
        $this->MInsvestications->AdvancedSearch->save();

        // Field PImpression
        $this->PImpression->AdvancedSearch->SearchValue = @$filter["x_PImpression"];
        $this->PImpression->AdvancedSearch->SearchOperator = @$filter["z_PImpression"];
        $this->PImpression->AdvancedSearch->SearchCondition = @$filter["v_PImpression"];
        $this->PImpression->AdvancedSearch->SearchValue2 = @$filter["y_PImpression"];
        $this->PImpression->AdvancedSearch->SearchOperator2 = @$filter["w_PImpression"];
        $this->PImpression->AdvancedSearch->save();

        // Field MIMpression
        $this->MIMpression->AdvancedSearch->SearchValue = @$filter["x_MIMpression"];
        $this->MIMpression->AdvancedSearch->SearchOperator = @$filter["z_MIMpression"];
        $this->MIMpression->AdvancedSearch->SearchCondition = @$filter["v_MIMpression"];
        $this->MIMpression->AdvancedSearch->SearchValue2 = @$filter["y_MIMpression"];
        $this->MIMpression->AdvancedSearch->SearchOperator2 = @$filter["w_MIMpression"];
        $this->MIMpression->AdvancedSearch->save();

        // Field PPlanOfManagement
        $this->PPlanOfManagement->AdvancedSearch->SearchValue = @$filter["x_PPlanOfManagement"];
        $this->PPlanOfManagement->AdvancedSearch->SearchOperator = @$filter["z_PPlanOfManagement"];
        $this->PPlanOfManagement->AdvancedSearch->SearchCondition = @$filter["v_PPlanOfManagement"];
        $this->PPlanOfManagement->AdvancedSearch->SearchValue2 = @$filter["y_PPlanOfManagement"];
        $this->PPlanOfManagement->AdvancedSearch->SearchOperator2 = @$filter["w_PPlanOfManagement"];
        $this->PPlanOfManagement->AdvancedSearch->save();

        // Field MPlanOfManagement
        $this->MPlanOfManagement->AdvancedSearch->SearchValue = @$filter["x_MPlanOfManagement"];
        $this->MPlanOfManagement->AdvancedSearch->SearchOperator = @$filter["z_MPlanOfManagement"];
        $this->MPlanOfManagement->AdvancedSearch->SearchCondition = @$filter["v_MPlanOfManagement"];
        $this->MPlanOfManagement->AdvancedSearch->SearchValue2 = @$filter["y_MPlanOfManagement"];
        $this->MPlanOfManagement->AdvancedSearch->SearchOperator2 = @$filter["w_MPlanOfManagement"];
        $this->MPlanOfManagement->AdvancedSearch->save();

        // Field PReadMore
        $this->PReadMore->AdvancedSearch->SearchValue = @$filter["x_PReadMore"];
        $this->PReadMore->AdvancedSearch->SearchOperator = @$filter["z_PReadMore"];
        $this->PReadMore->AdvancedSearch->SearchCondition = @$filter["v_PReadMore"];
        $this->PReadMore->AdvancedSearch->SearchValue2 = @$filter["y_PReadMore"];
        $this->PReadMore->AdvancedSearch->SearchOperator2 = @$filter["w_PReadMore"];
        $this->PReadMore->AdvancedSearch->save();

        // Field MReadMore
        $this->MReadMore->AdvancedSearch->SearchValue = @$filter["x_MReadMore"];
        $this->MReadMore->AdvancedSearch->SearchOperator = @$filter["z_MReadMore"];
        $this->MReadMore->AdvancedSearch->SearchCondition = @$filter["v_MReadMore"];
        $this->MReadMore->AdvancedSearch->SearchValue2 = @$filter["y_MReadMore"];
        $this->MReadMore->AdvancedSearch->SearchOperator2 = @$filter["w_MReadMore"];
        $this->MReadMore->AdvancedSearch->save();

        // Field MariedFor
        $this->MariedFor->AdvancedSearch->SearchValue = @$filter["x_MariedFor"];
        $this->MariedFor->AdvancedSearch->SearchOperator = @$filter["z_MariedFor"];
        $this->MariedFor->AdvancedSearch->SearchCondition = @$filter["v_MariedFor"];
        $this->MariedFor->AdvancedSearch->SearchValue2 = @$filter["y_MariedFor"];
        $this->MariedFor->AdvancedSearch->SearchOperator2 = @$filter["w_MariedFor"];
        $this->MariedFor->AdvancedSearch->save();

        // Field CMNCM
        $this->CMNCM->AdvancedSearch->SearchValue = @$filter["x_CMNCM"];
        $this->CMNCM->AdvancedSearch->SearchOperator = @$filter["z_CMNCM"];
        $this->CMNCM->AdvancedSearch->SearchCondition = @$filter["v_CMNCM"];
        $this->CMNCM->AdvancedSearch->SearchValue2 = @$filter["y_CMNCM"];
        $this->CMNCM->AdvancedSearch->SearchOperator2 = @$filter["w_CMNCM"];
        $this->CMNCM->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field pFamilyHistory
        $this->pFamilyHistory->AdvancedSearch->SearchValue = @$filter["x_pFamilyHistory"];
        $this->pFamilyHistory->AdvancedSearch->SearchOperator = @$filter["z_pFamilyHistory"];
        $this->pFamilyHistory->AdvancedSearch->SearchCondition = @$filter["v_pFamilyHistory"];
        $this->pFamilyHistory->AdvancedSearch->SearchValue2 = @$filter["y_pFamilyHistory"];
        $this->pFamilyHistory->AdvancedSearch->SearchOperator2 = @$filter["w_pFamilyHistory"];
        $this->pFamilyHistory->AdvancedSearch->save();

        // Field pTemplateMedications
        $this->pTemplateMedications->AdvancedSearch->SearchValue = @$filter["x_pTemplateMedications"];
        $this->pTemplateMedications->AdvancedSearch->SearchOperator = @$filter["z_pTemplateMedications"];
        $this->pTemplateMedications->AdvancedSearch->SearchCondition = @$filter["v_pTemplateMedications"];
        $this->pTemplateMedications->AdvancedSearch->SearchValue2 = @$filter["y_pTemplateMedications"];
        $this->pTemplateMedications->AdvancedSearch->SearchOperator2 = @$filter["w_pTemplateMedications"];
        $this->pTemplateMedications->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SEX, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Religion, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Address, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IdentificationMark, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DoublewitnessName1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DoublewitnessName2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Chiefcomplaints, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MenstrualHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ObstetricHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MedicalHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SurgicalHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Generalexaminationpallor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PROVISIONALDIAGNOSIS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Investigations, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fheight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fweight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FBMI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FBloodgroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mheight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mweight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MBMI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MBloodgroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FBuild, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MBuild, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FSkinColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MSkinColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FEyesColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MEyesColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FHairColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MhairColor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FhairTexture, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MHairTexture, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fothers, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Mothers, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PPR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PBP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Breast, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PPA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PPSV, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PPAPSMEAR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PTHYROID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MTHYROID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SecSexCharacters, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PenisUM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->VAS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->EPIDIDYMIS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Varicocele, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FertilityTreatmentHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SurgeryHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FamilyHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PInvestigations, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Addictions, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medical, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Surgical, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoitalHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SemenAnalysis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MInsvestications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PImpression, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MIMpression, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PPlanOfManagement, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MPlanOfManagement, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PReadMore, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MReadMore, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MariedFor, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CMNCM, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pFamilyHistory, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pTemplateMedications, $arKeywords, $type);
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
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->SEX); // SEX
            $this->updateSort($this->Religion); // Religion
            $this->updateSort($this->Address); // Address
            $this->updateSort($this->IdentificationMark); // IdentificationMark
            $this->updateSort($this->DoublewitnessName1); // DoublewitnessName1
            $this->updateSort($this->DoublewitnessName2); // DoublewitnessName2
            $this->updateSort($this->Chiefcomplaints); // Chiefcomplaints
            $this->updateSort($this->MenstrualHistory); // MenstrualHistory
            $this->updateSort($this->ObstetricHistory); // ObstetricHistory
            $this->updateSort($this->MedicalHistory); // MedicalHistory
            $this->updateSort($this->SurgicalHistory); // SurgicalHistory
            $this->updateSort($this->Generalexaminationpallor); // Generalexaminationpallor
            $this->updateSort($this->PR); // PR
            $this->updateSort($this->CVS); // CVS
            $this->updateSort($this->PA); // PA
            $this->updateSort($this->PROVISIONALDIAGNOSIS); // PROVISIONALDIAGNOSIS
            $this->updateSort($this->Investigations); // Investigations
            $this->updateSort($this->Fheight); // Fheight
            $this->updateSort($this->Fweight); // Fweight
            $this->updateSort($this->FBMI); // FBMI
            $this->updateSort($this->FBloodgroup); // FBloodgroup
            $this->updateSort($this->Mheight); // Mheight
            $this->updateSort($this->Mweight); // Mweight
            $this->updateSort($this->MBMI); // MBMI
            $this->updateSort($this->MBloodgroup); // MBloodgroup
            $this->updateSort($this->FBuild); // FBuild
            $this->updateSort($this->MBuild); // MBuild
            $this->updateSort($this->FSkinColor); // FSkinColor
            $this->updateSort($this->MSkinColor); // MSkinColor
            $this->updateSort($this->FEyesColor); // FEyesColor
            $this->updateSort($this->MEyesColor); // MEyesColor
            $this->updateSort($this->FHairColor); // FHairColor
            $this->updateSort($this->MhairColor); // MhairColor
            $this->updateSort($this->FhairTexture); // FhairTexture
            $this->updateSort($this->MHairTexture); // MHairTexture
            $this->updateSort($this->Fothers); // Fothers
            $this->updateSort($this->Mothers); // Mothers
            $this->updateSort($this->PGE); // PGE
            $this->updateSort($this->PPR); // PPR
            $this->updateSort($this->PBP); // PBP
            $this->updateSort($this->Breast); // Breast
            $this->updateSort($this->PPA); // PPA
            $this->updateSort($this->PPSV); // PPSV
            $this->updateSort($this->PPAPSMEAR); // PPAPSMEAR
            $this->updateSort($this->PTHYROID); // PTHYROID
            $this->updateSort($this->MTHYROID); // MTHYROID
            $this->updateSort($this->SecSexCharacters); // SecSexCharacters
            $this->updateSort($this->PenisUM); // PenisUM
            $this->updateSort($this->VAS); // VAS
            $this->updateSort($this->EPIDIDYMIS); // EPIDIDYMIS
            $this->updateSort($this->Varicocele); // Varicocele
            $this->updateSort($this->FamilyHistory); // FamilyHistory
            $this->updateSort($this->Addictions); // Addictions
            $this->updateSort($this->Medical); // Medical
            $this->updateSort($this->Surgical); // Surgical
            $this->updateSort($this->CoitalHistory); // CoitalHistory
            $this->updateSort($this->MariedFor); // MariedFor
            $this->updateSort($this->CMNCM); // CMNCM
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->pFamilyHistory); // pFamilyHistory
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
                $this->RIDNO->setSort("");
                $this->Name->setSort("");
                $this->Age->setSort("");
                $this->SEX->setSort("");
                $this->Religion->setSort("");
                $this->Address->setSort("");
                $this->IdentificationMark->setSort("");
                $this->DoublewitnessName1->setSort("");
                $this->DoublewitnessName2->setSort("");
                $this->Chiefcomplaints->setSort("");
                $this->MenstrualHistory->setSort("");
                $this->ObstetricHistory->setSort("");
                $this->MedicalHistory->setSort("");
                $this->SurgicalHistory->setSort("");
                $this->Generalexaminationpallor->setSort("");
                $this->PR->setSort("");
                $this->CVS->setSort("");
                $this->PA->setSort("");
                $this->PROVISIONALDIAGNOSIS->setSort("");
                $this->Investigations->setSort("");
                $this->Fheight->setSort("");
                $this->Fweight->setSort("");
                $this->FBMI->setSort("");
                $this->FBloodgroup->setSort("");
                $this->Mheight->setSort("");
                $this->Mweight->setSort("");
                $this->MBMI->setSort("");
                $this->MBloodgroup->setSort("");
                $this->FBuild->setSort("");
                $this->MBuild->setSort("");
                $this->FSkinColor->setSort("");
                $this->MSkinColor->setSort("");
                $this->FEyesColor->setSort("");
                $this->MEyesColor->setSort("");
                $this->FHairColor->setSort("");
                $this->MhairColor->setSort("");
                $this->FhairTexture->setSort("");
                $this->MHairTexture->setSort("");
                $this->Fothers->setSort("");
                $this->Mothers->setSort("");
                $this->PGE->setSort("");
                $this->PPR->setSort("");
                $this->PBP->setSort("");
                $this->Breast->setSort("");
                $this->PPA->setSort("");
                $this->PPSV->setSort("");
                $this->PPAPSMEAR->setSort("");
                $this->PTHYROID->setSort("");
                $this->MTHYROID->setSort("");
                $this->SecSexCharacters->setSort("");
                $this->PenisUM->setSort("");
                $this->VAS->setSort("");
                $this->EPIDIDYMIS->setSort("");
                $this->Varicocele->setSort("");
                $this->FertilityTreatmentHistory->setSort("");
                $this->SurgeryHistory->setSort("");
                $this->FamilyHistory->setSort("");
                $this->PInvestigations->setSort("");
                $this->Addictions->setSort("");
                $this->Medications->setSort("");
                $this->Medical->setSort("");
                $this->Surgical->setSort("");
                $this->CoitalHistory->setSort("");
                $this->SemenAnalysis->setSort("");
                $this->MInsvestications->setSort("");
                $this->PImpression->setSort("");
                $this->MIMpression->setSort("");
                $this->PPlanOfManagement->setSort("");
                $this->MPlanOfManagement->setSort("");
                $this->PReadMore->setSort("");
                $this->MReadMore->setSort("");
                $this->MariedFor->setSort("");
                $this->CMNCM->setSort("");
                $this->TidNo->setSort("");
                $this->pFamilyHistory->setSort("");
                $this->pTemplateMedications->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_vitals_historylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_vitals_historylistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_vitals_historylist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->SEX->setDbValue($row['SEX']);
        $this->Religion->setDbValue($row['Religion']);
        $this->Address->setDbValue($row['Address']);
        $this->IdentificationMark->setDbValue($row['IdentificationMark']);
        $this->DoublewitnessName1->setDbValue($row['DoublewitnessName1']);
        $this->DoublewitnessName2->setDbValue($row['DoublewitnessName2']);
        $this->Chiefcomplaints->setDbValue($row['Chiefcomplaints']);
        $this->MenstrualHistory->setDbValue($row['MenstrualHistory']);
        $this->ObstetricHistory->setDbValue($row['ObstetricHistory']);
        $this->MedicalHistory->setDbValue($row['MedicalHistory']);
        $this->SurgicalHistory->setDbValue($row['SurgicalHistory']);
        $this->Generalexaminationpallor->setDbValue($row['Generalexaminationpallor']);
        $this->PR->setDbValue($row['PR']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PROVISIONALDIAGNOSIS->setDbValue($row['PROVISIONALDIAGNOSIS']);
        $this->Investigations->setDbValue($row['Investigations']);
        $this->Fheight->setDbValue($row['Fheight']);
        $this->Fweight->setDbValue($row['Fweight']);
        $this->FBMI->setDbValue($row['FBMI']);
        $this->FBloodgroup->setDbValue($row['FBloodgroup']);
        $this->Mheight->setDbValue($row['Mheight']);
        $this->Mweight->setDbValue($row['Mweight']);
        $this->MBMI->setDbValue($row['MBMI']);
        $this->MBloodgroup->setDbValue($row['MBloodgroup']);
        $this->FBuild->setDbValue($row['FBuild']);
        $this->MBuild->setDbValue($row['MBuild']);
        $this->FSkinColor->setDbValue($row['FSkinColor']);
        $this->MSkinColor->setDbValue($row['MSkinColor']);
        $this->FEyesColor->setDbValue($row['FEyesColor']);
        $this->MEyesColor->setDbValue($row['MEyesColor']);
        $this->FHairColor->setDbValue($row['FHairColor']);
        $this->MhairColor->setDbValue($row['MhairColor']);
        $this->FhairTexture->setDbValue($row['FhairTexture']);
        $this->MHairTexture->setDbValue($row['MHairTexture']);
        $this->Fothers->setDbValue($row['Fothers']);
        $this->Mothers->setDbValue($row['Mothers']);
        $this->PGE->setDbValue($row['PGE']);
        $this->PPR->setDbValue($row['PPR']);
        $this->PBP->setDbValue($row['PBP']);
        $this->Breast->setDbValue($row['Breast']);
        $this->PPA->setDbValue($row['PPA']);
        $this->PPSV->setDbValue($row['PPSV']);
        $this->PPAPSMEAR->setDbValue($row['PPAPSMEAR']);
        $this->PTHYROID->setDbValue($row['PTHYROID']);
        $this->MTHYROID->setDbValue($row['MTHYROID']);
        $this->SecSexCharacters->setDbValue($row['SecSexCharacters']);
        $this->PenisUM->setDbValue($row['PenisUM']);
        $this->VAS->setDbValue($row['VAS']);
        $this->EPIDIDYMIS->setDbValue($row['EPIDIDYMIS']);
        $this->Varicocele->setDbValue($row['Varicocele']);
        $this->FertilityTreatmentHistory->setDbValue($row['FertilityTreatmentHistory']);
        $this->SurgeryHistory->setDbValue($row['SurgeryHistory']);
        $this->FamilyHistory->setDbValue($row['FamilyHistory']);
        $this->PInvestigations->setDbValue($row['PInvestigations']);
        $this->Addictions->setDbValue($row['Addictions']);
        $this->Medications->setDbValue($row['Medications']);
        $this->Medical->setDbValue($row['Medical']);
        $this->Surgical->setDbValue($row['Surgical']);
        $this->CoitalHistory->setDbValue($row['CoitalHistory']);
        $this->SemenAnalysis->setDbValue($row['SemenAnalysis']);
        $this->MInsvestications->setDbValue($row['MInsvestications']);
        $this->PImpression->setDbValue($row['PImpression']);
        $this->MIMpression->setDbValue($row['MIMpression']);
        $this->PPlanOfManagement->setDbValue($row['PPlanOfManagement']);
        $this->MPlanOfManagement->setDbValue($row['MPlanOfManagement']);
        $this->PReadMore->setDbValue($row['PReadMore']);
        $this->MReadMore->setDbValue($row['MReadMore']);
        $this->MariedFor->setDbValue($row['MariedFor']);
        $this->CMNCM->setDbValue($row['CMNCM']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->pFamilyHistory->setDbValue($row['pFamilyHistory']);
        $this->pTemplateMedications->setDbValue($row['pTemplateMedications']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['SEX'] = null;
        $row['Religion'] = null;
        $row['Address'] = null;
        $row['IdentificationMark'] = null;
        $row['DoublewitnessName1'] = null;
        $row['DoublewitnessName2'] = null;
        $row['Chiefcomplaints'] = null;
        $row['MenstrualHistory'] = null;
        $row['ObstetricHistory'] = null;
        $row['MedicalHistory'] = null;
        $row['SurgicalHistory'] = null;
        $row['Generalexaminationpallor'] = null;
        $row['PR'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['PROVISIONALDIAGNOSIS'] = null;
        $row['Investigations'] = null;
        $row['Fheight'] = null;
        $row['Fweight'] = null;
        $row['FBMI'] = null;
        $row['FBloodgroup'] = null;
        $row['Mheight'] = null;
        $row['Mweight'] = null;
        $row['MBMI'] = null;
        $row['MBloodgroup'] = null;
        $row['FBuild'] = null;
        $row['MBuild'] = null;
        $row['FSkinColor'] = null;
        $row['MSkinColor'] = null;
        $row['FEyesColor'] = null;
        $row['MEyesColor'] = null;
        $row['FHairColor'] = null;
        $row['MhairColor'] = null;
        $row['FhairTexture'] = null;
        $row['MHairTexture'] = null;
        $row['Fothers'] = null;
        $row['Mothers'] = null;
        $row['PGE'] = null;
        $row['PPR'] = null;
        $row['PBP'] = null;
        $row['Breast'] = null;
        $row['PPA'] = null;
        $row['PPSV'] = null;
        $row['PPAPSMEAR'] = null;
        $row['PTHYROID'] = null;
        $row['MTHYROID'] = null;
        $row['SecSexCharacters'] = null;
        $row['PenisUM'] = null;
        $row['VAS'] = null;
        $row['EPIDIDYMIS'] = null;
        $row['Varicocele'] = null;
        $row['FertilityTreatmentHistory'] = null;
        $row['SurgeryHistory'] = null;
        $row['FamilyHistory'] = null;
        $row['PInvestigations'] = null;
        $row['Addictions'] = null;
        $row['Medications'] = null;
        $row['Medical'] = null;
        $row['Surgical'] = null;
        $row['CoitalHistory'] = null;
        $row['SemenAnalysis'] = null;
        $row['MInsvestications'] = null;
        $row['PImpression'] = null;
        $row['MIMpression'] = null;
        $row['PPlanOfManagement'] = null;
        $row['MPlanOfManagement'] = null;
        $row['PReadMore'] = null;
        $row['MReadMore'] = null;
        $row['MariedFor'] = null;
        $row['CMNCM'] = null;
        $row['TidNo'] = null;
        $row['pFamilyHistory'] = null;
        $row['pTemplateMedications'] = null;
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

        // RIDNO

        // Name

        // Age

        // SEX

        // Religion

        // Address

        // IdentificationMark

        // DoublewitnessName1

        // DoublewitnessName2

        // Chiefcomplaints

        // MenstrualHistory

        // ObstetricHistory

        // MedicalHistory

        // SurgicalHistory

        // Generalexaminationpallor

        // PR

        // CVS

        // PA

        // PROVISIONALDIAGNOSIS

        // Investigations

        // Fheight

        // Fweight

        // FBMI

        // FBloodgroup

        // Mheight

        // Mweight

        // MBMI

        // MBloodgroup

        // FBuild

        // MBuild

        // FSkinColor

        // MSkinColor

        // FEyesColor

        // MEyesColor

        // FHairColor

        // MhairColor

        // FhairTexture

        // MHairTexture

        // Fothers

        // Mothers

        // PGE

        // PPR

        // PBP

        // Breast

        // PPA

        // PPSV

        // PPAPSMEAR

        // PTHYROID

        // MTHYROID

        // SecSexCharacters

        // PenisUM

        // VAS

        // EPIDIDYMIS

        // Varicocele

        // FertilityTreatmentHistory

        // SurgeryHistory

        // FamilyHistory

        // PInvestigations

        // Addictions

        // Medications

        // Medical

        // Surgical

        // CoitalHistory

        // SemenAnalysis

        // MInsvestications

        // PImpression

        // MIMpression

        // PPlanOfManagement

        // MPlanOfManagement

        // PReadMore

        // MReadMore

        // MariedFor

        // CMNCM

        // TidNo

        // pFamilyHistory

        // pTemplateMedications
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // RIDNO
            $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
            $this->RIDNO->ViewValue = FormatNumber($this->RIDNO->ViewValue, 0, -2, -2, -2);
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // SEX
            $this->SEX->ViewValue = $this->SEX->CurrentValue;
            $this->SEX->ViewCustomAttributes = "";

            // Religion
            $this->Religion->ViewValue = $this->Religion->CurrentValue;
            $this->Religion->ViewCustomAttributes = "";

            // Address
            $this->Address->ViewValue = $this->Address->CurrentValue;
            $this->Address->ViewCustomAttributes = "";

            // IdentificationMark
            $this->IdentificationMark->ViewValue = $this->IdentificationMark->CurrentValue;
            $this->IdentificationMark->ViewCustomAttributes = "";

            // DoublewitnessName1
            $this->DoublewitnessName1->ViewValue = $this->DoublewitnessName1->CurrentValue;
            $this->DoublewitnessName1->ViewCustomAttributes = "";

            // DoublewitnessName2
            $this->DoublewitnessName2->ViewValue = $this->DoublewitnessName2->CurrentValue;
            $this->DoublewitnessName2->ViewCustomAttributes = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->ViewValue = $this->Chiefcomplaints->CurrentValue;
            $this->Chiefcomplaints->ViewCustomAttributes = "";

            // MenstrualHistory
            $this->MenstrualHistory->ViewValue = $this->MenstrualHistory->CurrentValue;
            $this->MenstrualHistory->ViewCustomAttributes = "";

            // ObstetricHistory
            $this->ObstetricHistory->ViewValue = $this->ObstetricHistory->CurrentValue;
            $this->ObstetricHistory->ViewCustomAttributes = "";

            // MedicalHistory
            if (strval($this->MedicalHistory->CurrentValue) != "") {
                $this->MedicalHistory->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->MedicalHistory->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->MedicalHistory->ViewValue->add($this->MedicalHistory->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->MedicalHistory->ViewValue = null;
            }
            $this->MedicalHistory->ViewCustomAttributes = "";

            // SurgicalHistory
            $this->SurgicalHistory->ViewValue = $this->SurgicalHistory->CurrentValue;
            $this->SurgicalHistory->ViewCustomAttributes = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->ViewValue = $this->Generalexaminationpallor->CurrentValue;
            $this->Generalexaminationpallor->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->ViewValue = $this->PROVISIONALDIAGNOSIS->CurrentValue;
            $this->PROVISIONALDIAGNOSIS->ViewCustomAttributes = "";

            // Investigations
            $this->Investigations->ViewValue = $this->Investigations->CurrentValue;
            $this->Investigations->ViewCustomAttributes = "";

            // Fheight
            $this->Fheight->ViewValue = $this->Fheight->CurrentValue;
            $this->Fheight->ViewCustomAttributes = "";

            // Fweight
            $this->Fweight->ViewValue = $this->Fweight->CurrentValue;
            $this->Fweight->ViewCustomAttributes = "";

            // FBMI
            $this->FBMI->ViewValue = $this->FBMI->CurrentValue;
            $this->FBMI->ViewCustomAttributes = "";

            // FBloodgroup
            $curVal = trim(strval($this->FBloodgroup->CurrentValue));
            if ($curVal != "") {
                $this->FBloodgroup->ViewValue = $this->FBloodgroup->lookupCacheOption($curVal);
                if ($this->FBloodgroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->FBloodgroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->FBloodgroup->Lookup->renderViewRow($rswrk[0]);
                        $this->FBloodgroup->ViewValue = $this->FBloodgroup->displayValue($arwrk);
                    } else {
                        $this->FBloodgroup->ViewValue = $this->FBloodgroup->CurrentValue;
                    }
                }
            } else {
                $this->FBloodgroup->ViewValue = null;
            }
            $this->FBloodgroup->ViewCustomAttributes = "";

            // Mheight
            $this->Mheight->ViewValue = $this->Mheight->CurrentValue;
            $this->Mheight->ViewCustomAttributes = "";

            // Mweight
            $this->Mweight->ViewValue = $this->Mweight->CurrentValue;
            $this->Mweight->ViewCustomAttributes = "";

            // MBMI
            $this->MBMI->ViewValue = $this->MBMI->CurrentValue;
            $this->MBMI->ViewCustomAttributes = "";

            // MBloodgroup
            $curVal = trim(strval($this->MBloodgroup->CurrentValue));
            if ($curVal != "") {
                $this->MBloodgroup->ViewValue = $this->MBloodgroup->lookupCacheOption($curVal);
                if ($this->MBloodgroup->ViewValue === null) { // Lookup from database
                    $filterWrk = "`BloodGroup`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->MBloodgroup->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->MBloodgroup->Lookup->renderViewRow($rswrk[0]);
                        $this->MBloodgroup->ViewValue = $this->MBloodgroup->displayValue($arwrk);
                    } else {
                        $this->MBloodgroup->ViewValue = $this->MBloodgroup->CurrentValue;
                    }
                }
            } else {
                $this->MBloodgroup->ViewValue = null;
            }
            $this->MBloodgroup->ViewCustomAttributes = "";

            // FBuild
            if (strval($this->FBuild->CurrentValue) != "") {
                $this->FBuild->ViewValue = $this->FBuild->optionCaption($this->FBuild->CurrentValue);
            } else {
                $this->FBuild->ViewValue = null;
            }
            $this->FBuild->ViewCustomAttributes = "";

            // MBuild
            if (strval($this->MBuild->CurrentValue) != "") {
                $this->MBuild->ViewValue = $this->MBuild->optionCaption($this->MBuild->CurrentValue);
            } else {
                $this->MBuild->ViewValue = null;
            }
            $this->MBuild->ViewCustomAttributes = "";

            // FSkinColor
            if (strval($this->FSkinColor->CurrentValue) != "") {
                $this->FSkinColor->ViewValue = $this->FSkinColor->optionCaption($this->FSkinColor->CurrentValue);
            } else {
                $this->FSkinColor->ViewValue = null;
            }
            $this->FSkinColor->ViewCustomAttributes = "";

            // MSkinColor
            if (strval($this->MSkinColor->CurrentValue) != "") {
                $this->MSkinColor->ViewValue = $this->MSkinColor->optionCaption($this->MSkinColor->CurrentValue);
            } else {
                $this->MSkinColor->ViewValue = null;
            }
            $this->MSkinColor->ViewCustomAttributes = "";

            // FEyesColor
            if (strval($this->FEyesColor->CurrentValue) != "") {
                $this->FEyesColor->ViewValue = $this->FEyesColor->optionCaption($this->FEyesColor->CurrentValue);
            } else {
                $this->FEyesColor->ViewValue = null;
            }
            $this->FEyesColor->ViewCustomAttributes = "";

            // MEyesColor
            if (strval($this->MEyesColor->CurrentValue) != "") {
                $this->MEyesColor->ViewValue = $this->MEyesColor->optionCaption($this->MEyesColor->CurrentValue);
            } else {
                $this->MEyesColor->ViewValue = null;
            }
            $this->MEyesColor->ViewCustomAttributes = "";

            // FHairColor
            if (strval($this->FHairColor->CurrentValue) != "") {
                $this->FHairColor->ViewValue = $this->FHairColor->optionCaption($this->FHairColor->CurrentValue);
            } else {
                $this->FHairColor->ViewValue = null;
            }
            $this->FHairColor->ViewCustomAttributes = "";

            // MhairColor
            if (strval($this->MhairColor->CurrentValue) != "") {
                $this->MhairColor->ViewValue = $this->MhairColor->optionCaption($this->MhairColor->CurrentValue);
            } else {
                $this->MhairColor->ViewValue = null;
            }
            $this->MhairColor->ViewCustomAttributes = "";

            // FhairTexture
            if (strval($this->FhairTexture->CurrentValue) != "") {
                $this->FhairTexture->ViewValue = $this->FhairTexture->optionCaption($this->FhairTexture->CurrentValue);
            } else {
                $this->FhairTexture->ViewValue = null;
            }
            $this->FhairTexture->ViewCustomAttributes = "";

            // MHairTexture
            if (strval($this->MHairTexture->CurrentValue) != "") {
                $this->MHairTexture->ViewValue = $this->MHairTexture->optionCaption($this->MHairTexture->CurrentValue);
            } else {
                $this->MHairTexture->ViewValue = null;
            }
            $this->MHairTexture->ViewCustomAttributes = "";

            // Fothers
            $this->Fothers->ViewValue = $this->Fothers->CurrentValue;
            $this->Fothers->ViewCustomAttributes = "";

            // Mothers
            $this->Mothers->ViewValue = $this->Mothers->CurrentValue;
            $this->Mothers->ViewCustomAttributes = "";

            // PGE
            $this->PGE->ViewValue = $this->PGE->CurrentValue;
            $this->PGE->ViewCustomAttributes = "";

            // PPR
            $this->PPR->ViewValue = $this->PPR->CurrentValue;
            $this->PPR->ViewCustomAttributes = "";

            // PBP
            $this->PBP->ViewValue = $this->PBP->CurrentValue;
            $this->PBP->ViewCustomAttributes = "";

            // Breast
            $this->Breast->ViewValue = $this->Breast->CurrentValue;
            $this->Breast->ViewCustomAttributes = "";

            // PPA
            $this->PPA->ViewValue = $this->PPA->CurrentValue;
            $this->PPA->ViewCustomAttributes = "";

            // PPSV
            $this->PPSV->ViewValue = $this->PPSV->CurrentValue;
            $this->PPSV->ViewCustomAttributes = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->ViewValue = $this->PPAPSMEAR->CurrentValue;
            $this->PPAPSMEAR->ViewCustomAttributes = "";

            // PTHYROID
            $this->PTHYROID->ViewValue = $this->PTHYROID->CurrentValue;
            $this->PTHYROID->ViewCustomAttributes = "";

            // MTHYROID
            $this->MTHYROID->ViewValue = $this->MTHYROID->CurrentValue;
            $this->MTHYROID->ViewCustomAttributes = "";

            // SecSexCharacters
            $this->SecSexCharacters->ViewValue = $this->SecSexCharacters->CurrentValue;
            $this->SecSexCharacters->ViewCustomAttributes = "";

            // PenisUM
            $this->PenisUM->ViewValue = $this->PenisUM->CurrentValue;
            $this->PenisUM->ViewCustomAttributes = "";

            // VAS
            $this->VAS->ViewValue = $this->VAS->CurrentValue;
            $this->VAS->ViewCustomAttributes = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->ViewValue = $this->EPIDIDYMIS->CurrentValue;
            $this->EPIDIDYMIS->ViewCustomAttributes = "";

            // Varicocele
            $this->Varicocele->ViewValue = $this->Varicocele->CurrentValue;
            $this->Varicocele->ViewCustomAttributes = "";

            // FamilyHistory
            $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
            $curVal = trim(strval($this->FamilyHistory->CurrentValue));
            if ($curVal != "") {
                $this->FamilyHistory->ViewValue = $this->FamilyHistory->lookupCacheOption($curVal);
                if ($this->FamilyHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->FamilyHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->FamilyHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->FamilyHistory->ViewValue = $this->FamilyHistory->displayValue($arwrk);
                    } else {
                        $this->FamilyHistory->ViewValue = $this->FamilyHistory->CurrentValue;
                    }
                }
            } else {
                $this->FamilyHistory->ViewValue = null;
            }
            $this->FamilyHistory->ViewCustomAttributes = "";

            // Addictions
            if (strval($this->Addictions->CurrentValue) != "") {
                $this->Addictions->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->Addictions->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->Addictions->ViewValue->add($this->Addictions->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->Addictions->ViewValue = null;
            }
            $this->Addictions->ViewCustomAttributes = "";

            // Medical
            if (strval($this->Medical->CurrentValue) != "") {
                $this->Medical->ViewValue = $this->Medical->optionCaption($this->Medical->CurrentValue);
            } else {
                $this->Medical->ViewValue = null;
            }
            $this->Medical->ViewCustomAttributes = "";

            // Surgical
            $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
            $curVal = trim(strval($this->Surgical->CurrentValue));
            if ($curVal != "") {
                $this->Surgical->ViewValue = $this->Surgical->lookupCacheOption($curVal);
                if ($this->Surgical->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='SurgicalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->Surgical->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Surgical->Lookup->renderViewRow($rswrk[0]);
                        $this->Surgical->ViewValue = $this->Surgical->displayValue($arwrk);
                    } else {
                        $this->Surgical->ViewValue = $this->Surgical->CurrentValue;
                    }
                }
            } else {
                $this->Surgical->ViewValue = null;
            }
            $this->Surgical->ViewCustomAttributes = "";

            // CoitalHistory
            $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
            $curVal = trim(strval($this->CoitalHistory->CurrentValue));
            if ($curVal != "") {
                $this->CoitalHistory->ViewValue = $this->CoitalHistory->lookupCacheOption($curVal);
                if ($this->CoitalHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='CoitalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->CoitalHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->CoitalHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->CoitalHistory->ViewValue = $this->CoitalHistory->displayValue($arwrk);
                    } else {
                        $this->CoitalHistory->ViewValue = $this->CoitalHistory->CurrentValue;
                    }
                }
            } else {
                $this->CoitalHistory->ViewValue = null;
            }
            $this->CoitalHistory->ViewCustomAttributes = "";

            // MariedFor
            $this->MariedFor->ViewValue = $this->MariedFor->CurrentValue;
            $this->MariedFor->ViewCustomAttributes = "";

            // CMNCM
            $this->CMNCM->ViewValue = $this->CMNCM->CurrentValue;
            $this->CMNCM->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // pFamilyHistory
            $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
            $curVal = trim(strval($this->pFamilyHistory->CurrentValue));
            if ($curVal != "") {
                $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->lookupCacheOption($curVal);
                if ($this->pFamilyHistory->ViewValue === null) { // Lookup from database
                    $filterWrk = "`History`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $lookupFilter = function() {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    $sqlWrk = $this->pFamilyHistory->Lookup->getSql(false, $filterWrk, $lookupFilter, $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->pFamilyHistory->Lookup->renderViewRow($rswrk[0]);
                        $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->displayValue($arwrk);
                    } else {
                        $this->pFamilyHistory->ViewValue = $this->pFamilyHistory->CurrentValue;
                    }
                }
            } else {
                $this->pFamilyHistory->ViewValue = null;
            }
            $this->pFamilyHistory->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // Name
            $this->Name->LinkCustomAttributes = "";
            $this->Name->HrefValue = "";
            $this->Name->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";

            // SEX
            $this->SEX->LinkCustomAttributes = "";
            $this->SEX->HrefValue = "";
            $this->SEX->TooltipValue = "";

            // Religion
            $this->Religion->LinkCustomAttributes = "";
            $this->Religion->HrefValue = "";
            $this->Religion->TooltipValue = "";

            // Address
            $this->Address->LinkCustomAttributes = "";
            $this->Address->HrefValue = "";
            $this->Address->TooltipValue = "";

            // IdentificationMark
            $this->IdentificationMark->LinkCustomAttributes = "";
            $this->IdentificationMark->HrefValue = "";
            $this->IdentificationMark->TooltipValue = "";

            // DoublewitnessName1
            $this->DoublewitnessName1->LinkCustomAttributes = "";
            $this->DoublewitnessName1->HrefValue = "";
            $this->DoublewitnessName1->TooltipValue = "";

            // DoublewitnessName2
            $this->DoublewitnessName2->LinkCustomAttributes = "";
            $this->DoublewitnessName2->HrefValue = "";
            $this->DoublewitnessName2->TooltipValue = "";

            // Chiefcomplaints
            $this->Chiefcomplaints->LinkCustomAttributes = "";
            $this->Chiefcomplaints->HrefValue = "";
            $this->Chiefcomplaints->TooltipValue = "";

            // MenstrualHistory
            $this->MenstrualHistory->LinkCustomAttributes = "";
            $this->MenstrualHistory->HrefValue = "";
            $this->MenstrualHistory->TooltipValue = "";

            // ObstetricHistory
            $this->ObstetricHistory->LinkCustomAttributes = "";
            $this->ObstetricHistory->HrefValue = "";
            $this->ObstetricHistory->TooltipValue = "";

            // MedicalHistory
            $this->MedicalHistory->LinkCustomAttributes = "";
            $this->MedicalHistory->HrefValue = "";
            $this->MedicalHistory->TooltipValue = "";

            // SurgicalHistory
            $this->SurgicalHistory->LinkCustomAttributes = "";
            $this->SurgicalHistory->HrefValue = "";
            $this->SurgicalHistory->TooltipValue = "";

            // Generalexaminationpallor
            $this->Generalexaminationpallor->LinkCustomAttributes = "";
            $this->Generalexaminationpallor->HrefValue = "";
            $this->Generalexaminationpallor->TooltipValue = "";

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";

            // PROVISIONALDIAGNOSIS
            $this->PROVISIONALDIAGNOSIS->LinkCustomAttributes = "";
            $this->PROVISIONALDIAGNOSIS->HrefValue = "";
            $this->PROVISIONALDIAGNOSIS->TooltipValue = "";

            // Investigations
            $this->Investigations->LinkCustomAttributes = "";
            $this->Investigations->HrefValue = "";
            $this->Investigations->TooltipValue = "";

            // Fheight
            $this->Fheight->LinkCustomAttributes = "";
            $this->Fheight->HrefValue = "";
            $this->Fheight->TooltipValue = "";

            // Fweight
            $this->Fweight->LinkCustomAttributes = "";
            $this->Fweight->HrefValue = "";
            $this->Fweight->TooltipValue = "";

            // FBMI
            $this->FBMI->LinkCustomAttributes = "";
            $this->FBMI->HrefValue = "";
            $this->FBMI->TooltipValue = "";

            // FBloodgroup
            $this->FBloodgroup->LinkCustomAttributes = "";
            $this->FBloodgroup->HrefValue = "";
            $this->FBloodgroup->TooltipValue = "";

            // Mheight
            $this->Mheight->LinkCustomAttributes = "";
            $this->Mheight->HrefValue = "";
            $this->Mheight->TooltipValue = "";

            // Mweight
            $this->Mweight->LinkCustomAttributes = "";
            $this->Mweight->HrefValue = "";
            $this->Mweight->TooltipValue = "";

            // MBMI
            $this->MBMI->LinkCustomAttributes = "";
            $this->MBMI->HrefValue = "";
            $this->MBMI->TooltipValue = "";

            // MBloodgroup
            $this->MBloodgroup->LinkCustomAttributes = "";
            $this->MBloodgroup->HrefValue = "";
            $this->MBloodgroup->TooltipValue = "";

            // FBuild
            $this->FBuild->LinkCustomAttributes = "";
            $this->FBuild->HrefValue = "";
            $this->FBuild->TooltipValue = "";

            // MBuild
            $this->MBuild->LinkCustomAttributes = "";
            $this->MBuild->HrefValue = "";
            $this->MBuild->TooltipValue = "";

            // FSkinColor
            $this->FSkinColor->LinkCustomAttributes = "";
            $this->FSkinColor->HrefValue = "";
            $this->FSkinColor->TooltipValue = "";

            // MSkinColor
            $this->MSkinColor->LinkCustomAttributes = "";
            $this->MSkinColor->HrefValue = "";
            $this->MSkinColor->TooltipValue = "";

            // FEyesColor
            $this->FEyesColor->LinkCustomAttributes = "";
            $this->FEyesColor->HrefValue = "";
            $this->FEyesColor->TooltipValue = "";

            // MEyesColor
            $this->MEyesColor->LinkCustomAttributes = "";
            $this->MEyesColor->HrefValue = "";
            $this->MEyesColor->TooltipValue = "";

            // FHairColor
            $this->FHairColor->LinkCustomAttributes = "";
            $this->FHairColor->HrefValue = "";
            $this->FHairColor->TooltipValue = "";

            // MhairColor
            $this->MhairColor->LinkCustomAttributes = "";
            $this->MhairColor->HrefValue = "";
            $this->MhairColor->TooltipValue = "";

            // FhairTexture
            $this->FhairTexture->LinkCustomAttributes = "";
            $this->FhairTexture->HrefValue = "";
            $this->FhairTexture->TooltipValue = "";

            // MHairTexture
            $this->MHairTexture->LinkCustomAttributes = "";
            $this->MHairTexture->HrefValue = "";
            $this->MHairTexture->TooltipValue = "";

            // Fothers
            $this->Fothers->LinkCustomAttributes = "";
            $this->Fothers->HrefValue = "";
            $this->Fothers->TooltipValue = "";

            // Mothers
            $this->Mothers->LinkCustomAttributes = "";
            $this->Mothers->HrefValue = "";
            $this->Mothers->TooltipValue = "";

            // PGE
            $this->PGE->LinkCustomAttributes = "";
            $this->PGE->HrefValue = "";
            $this->PGE->TooltipValue = "";

            // PPR
            $this->PPR->LinkCustomAttributes = "";
            $this->PPR->HrefValue = "";
            $this->PPR->TooltipValue = "";

            // PBP
            $this->PBP->LinkCustomAttributes = "";
            $this->PBP->HrefValue = "";
            $this->PBP->TooltipValue = "";

            // Breast
            $this->Breast->LinkCustomAttributes = "";
            $this->Breast->HrefValue = "";
            $this->Breast->TooltipValue = "";

            // PPA
            $this->PPA->LinkCustomAttributes = "";
            $this->PPA->HrefValue = "";
            $this->PPA->TooltipValue = "";

            // PPSV
            $this->PPSV->LinkCustomAttributes = "";
            $this->PPSV->HrefValue = "";
            $this->PPSV->TooltipValue = "";

            // PPAPSMEAR
            $this->PPAPSMEAR->LinkCustomAttributes = "";
            $this->PPAPSMEAR->HrefValue = "";
            $this->PPAPSMEAR->TooltipValue = "";

            // PTHYROID
            $this->PTHYROID->LinkCustomAttributes = "";
            $this->PTHYROID->HrefValue = "";
            $this->PTHYROID->TooltipValue = "";

            // MTHYROID
            $this->MTHYROID->LinkCustomAttributes = "";
            $this->MTHYROID->HrefValue = "";
            $this->MTHYROID->TooltipValue = "";

            // SecSexCharacters
            $this->SecSexCharacters->LinkCustomAttributes = "";
            $this->SecSexCharacters->HrefValue = "";
            $this->SecSexCharacters->TooltipValue = "";

            // PenisUM
            $this->PenisUM->LinkCustomAttributes = "";
            $this->PenisUM->HrefValue = "";
            $this->PenisUM->TooltipValue = "";

            // VAS
            $this->VAS->LinkCustomAttributes = "";
            $this->VAS->HrefValue = "";
            $this->VAS->TooltipValue = "";

            // EPIDIDYMIS
            $this->EPIDIDYMIS->LinkCustomAttributes = "";
            $this->EPIDIDYMIS->HrefValue = "";
            $this->EPIDIDYMIS->TooltipValue = "";

            // Varicocele
            $this->Varicocele->LinkCustomAttributes = "";
            $this->Varicocele->HrefValue = "";
            $this->Varicocele->TooltipValue = "";

            // FamilyHistory
            $this->FamilyHistory->LinkCustomAttributes = "";
            $this->FamilyHistory->HrefValue = "";
            $this->FamilyHistory->TooltipValue = "";

            // Addictions
            $this->Addictions->LinkCustomAttributes = "";
            $this->Addictions->HrefValue = "";
            $this->Addictions->TooltipValue = "";

            // Medical
            $this->Medical->LinkCustomAttributes = "";
            $this->Medical->HrefValue = "";
            $this->Medical->TooltipValue = "";

            // Surgical
            $this->Surgical->LinkCustomAttributes = "";
            $this->Surgical->HrefValue = "";
            $this->Surgical->TooltipValue = "";

            // CoitalHistory
            $this->CoitalHistory->LinkCustomAttributes = "";
            $this->CoitalHistory->HrefValue = "";
            $this->CoitalHistory->TooltipValue = "";

            // MariedFor
            $this->MariedFor->LinkCustomAttributes = "";
            $this->MariedFor->HrefValue = "";
            $this->MariedFor->TooltipValue = "";

            // CMNCM
            $this->CMNCM->LinkCustomAttributes = "";
            $this->CMNCM->HrefValue = "";
            $this->CMNCM->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // pFamilyHistory
            $this->pFamilyHistory->LinkCustomAttributes = "";
            $this->pFamilyHistory->HrefValue = "";
            $this->pFamilyHistory->TooltipValue = "";
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
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_vitals_historylist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_vitals_historylist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_vitals_historylist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_vitals_history" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_vitals_history\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_vitals_historylist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_vitals_historylistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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
                case "x_MedicalHistory":
                    break;
                case "x_FBloodgroup":
                    break;
                case "x_MBloodgroup":
                    break;
                case "x_FBuild":
                    break;
                case "x_MBuild":
                    break;
                case "x_FSkinColor":
                    break;
                case "x_MSkinColor":
                    break;
                case "x_FEyesColor":
                    break;
                case "x_MEyesColor":
                    break;
                case "x_FHairColor":
                    break;
                case "x_MhairColor":
                    break;
                case "x_FhairTexture":
                    break;
                case "x_MHairTexture":
                    break;
                case "x_FamilyHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='FamilyHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_Addictions":
                    break;
                case "x_Medical":
                    break;
                case "x_Surgical":
                    $lookupFilter = function () {
                        return "`HistoryType`='SurgicalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_CoitalHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='CoitalHistory'";
                    };
                    $lookupFilter = $lookupFilter->bindTo($this);
                    break;
                case "x_pFamilyHistory":
                    $lookupFilter = function () {
                        return "`HistoryType`='FamilyHistory'";
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
