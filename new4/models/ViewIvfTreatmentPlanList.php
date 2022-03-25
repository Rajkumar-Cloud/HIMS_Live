<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIvfTreatmentPlanList extends ViewIvfTreatmentPlan
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_ivf_treatment_plan';

    // Page object name
    public $PageObjName = "ViewIvfTreatmentPlanList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_ivf_treatment_planlist";
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

        // Table object (view_ivf_treatment_plan)
        if (!isset($GLOBALS["view_ivf_treatment_plan"]) || get_class($GLOBALS["view_ivf_treatment_plan"]) == PROJECT_NAMESPACE . "view_ivf_treatment_plan") {
            $GLOBALS["view_ivf_treatment_plan"] = &$this;
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
        $this->AddUrl = "ViewIvfTreatmentPlanAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewIvfTreatmentPlanDelete";
        $this->MultiUpdateUrl = "ViewIvfTreatmentPlanUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ivf_treatment_plan');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_ivf_treatment_planlistsrch";

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
                $doc = new $class(Container("view_ivf_treatment_plan"));
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
        if ($this->isAddOrEdit()) {
            $this->createdby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->createddatetime->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->modifiedby->Visible = false;
        }
        if ($this->isAddOrEdit()) {
            $this->modifieddatetime->Visible = false;
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
    public $SearchFieldsPerRow = 2; // For extended search
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
        $this->id->Visible = false;
        $this->CoupleID->setVisibility();
        $this->PatientID->setVisibility();
        $this->PatientName->setVisibility();
        $this->WifeCell->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->HusbandCell->setVisibility();
        $this->RIDNO->setVisibility();
        $this->Name->Visible = false;
        $this->Age->Visible = false;
        $this->TreatmentStartDate->setVisibility();
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->Visible = false;
        $this->createdby->Visible = false;
        $this->createddatetime->Visible = false;
        $this->modifiedby->Visible = false;
        $this->modifieddatetime->Visible = false;
        $this->TreatementStopDate->Visible = false;
        $this->TypePatient->Visible = false;
        $this->Treatment->Visible = false;
        $this->TreatmentTec->Visible = false;
        $this->TypeOfCycle->Visible = false;
        $this->SpermOrgin->Visible = false;
        $this->State->Visible = false;
        $this->Origin->Visible = false;
        $this->MACS->Visible = false;
        $this->Technique->Visible = false;
        $this->PgdPlanning->Visible = false;
        $this->IMSI->Visible = false;
        $this->SequentialCulture->Visible = false;
        $this->TimeLapse->Visible = false;
        $this->AH->Visible = false;
        $this->Weight->Visible = false;
        $this->BMI->Visible = false;
        $this->MaleIndications->Visible = false;
        $this->FemaleIndications->Visible = false;
        $this->UseOfThe->Visible = false;
        $this->Ectopic->Visible = false;
        $this->Heterotopic->Visible = false;
        $this->TransferDFE->Visible = false;
        $this->Evolutive->Visible = false;
        $this->Number->Visible = false;
        $this->SequentialCult->Visible = false;
        $this->TineLapse->Visible = false;
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
        $this->setupLookupOptions($this->RIDNO);
        $this->setupLookupOptions($this->status);

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
            AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(true));

            // Get basic search values
            $this->loadBasicSearchValues();

            // Get and validate search values for advanced search
            $this->loadSearchValues(); // Get search values

            // Process filter list
            if ($this->processFilterList()) {
                $this->terminate();
                return;
            }
            if (!$this->validateSearch()) {
                // Nothing to do
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

            // Get search criteria for advanced search
            if (!$this->hasInvalidFields()) {
                $srchAdvanced = $this->advancedSearchWhere();
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

            // Load advanced search from default
            if ($this->loadAdvancedSearchDefault()) {
                $srchAdvanced = $this->advancedSearchWhere();
            }
        }

        // Restore search settings from Session
        if (!$this->hasInvalidFields()) {
            $this->loadAdvancedSearch();
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_ivf_treatment_planlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
        $filterList = Concat($filterList, $this->PatientID->AdvancedSearch->toJson(), ","); // Field PatientID
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->WifeCell->AdvancedSearch->toJson(), ","); // Field WifeCell
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->HusbandCell->AdvancedSearch->toJson(), ","); // Field HusbandCell
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->TreatmentStartDate->AdvancedSearch->toJson(), ","); // Field TreatmentStartDate
        $filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
        $filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
        $filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->TreatementStopDate->AdvancedSearch->toJson(), ","); // Field TreatementStopDate
        $filterList = Concat($filterList, $this->TypePatient->AdvancedSearch->toJson(), ","); // Field TypePatient
        $filterList = Concat($filterList, $this->Treatment->AdvancedSearch->toJson(), ","); // Field Treatment
        $filterList = Concat($filterList, $this->TreatmentTec->AdvancedSearch->toJson(), ","); // Field TreatmentTec
        $filterList = Concat($filterList, $this->TypeOfCycle->AdvancedSearch->toJson(), ","); // Field TypeOfCycle
        $filterList = Concat($filterList, $this->SpermOrgin->AdvancedSearch->toJson(), ","); // Field SpermOrgin
        $filterList = Concat($filterList, $this->State->AdvancedSearch->toJson(), ","); // Field State
        $filterList = Concat($filterList, $this->Origin->AdvancedSearch->toJson(), ","); // Field Origin
        $filterList = Concat($filterList, $this->MACS->AdvancedSearch->toJson(), ","); // Field MACS
        $filterList = Concat($filterList, $this->Technique->AdvancedSearch->toJson(), ","); // Field Technique
        $filterList = Concat($filterList, $this->PgdPlanning->AdvancedSearch->toJson(), ","); // Field PgdPlanning
        $filterList = Concat($filterList, $this->IMSI->AdvancedSearch->toJson(), ","); // Field IMSI
        $filterList = Concat($filterList, $this->SequentialCulture->AdvancedSearch->toJson(), ","); // Field SequentialCulture
        $filterList = Concat($filterList, $this->TimeLapse->AdvancedSearch->toJson(), ","); // Field TimeLapse
        $filterList = Concat($filterList, $this->AH->AdvancedSearch->toJson(), ","); // Field AH
        $filterList = Concat($filterList, $this->Weight->AdvancedSearch->toJson(), ","); // Field Weight
        $filterList = Concat($filterList, $this->BMI->AdvancedSearch->toJson(), ","); // Field BMI
        $filterList = Concat($filterList, $this->MaleIndications->AdvancedSearch->toJson(), ","); // Field MaleIndications
        $filterList = Concat($filterList, $this->FemaleIndications->AdvancedSearch->toJson(), ","); // Field FemaleIndications
        $filterList = Concat($filterList, $this->UseOfThe->AdvancedSearch->toJson(), ","); // Field UseOfThe
        $filterList = Concat($filterList, $this->Ectopic->AdvancedSearch->toJson(), ","); // Field Ectopic
        $filterList = Concat($filterList, $this->Heterotopic->AdvancedSearch->toJson(), ","); // Field Heterotopic
        $filterList = Concat($filterList, $this->TransferDFE->AdvancedSearch->toJson(), ","); // Field TransferDFE
        $filterList = Concat($filterList, $this->Evolutive->AdvancedSearch->toJson(), ","); // Field Evolutive
        $filterList = Concat($filterList, $this->Number->AdvancedSearch->toJson(), ","); // Field Number
        $filterList = Concat($filterList, $this->SequentialCult->AdvancedSearch->toJson(), ","); // Field SequentialCult
        $filterList = Concat($filterList, $this->TineLapse->AdvancedSearch->toJson(), ","); // Field TineLapse
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_ivf_treatment_planlistsrch", $filters);
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

        // Field CoupleID
        $this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
        $this->CoupleID->AdvancedSearch->save();

        // Field PatientID
        $this->PatientID->AdvancedSearch->SearchValue = @$filter["x_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator = @$filter["z_PatientID"];
        $this->PatientID->AdvancedSearch->SearchCondition = @$filter["v_PatientID"];
        $this->PatientID->AdvancedSearch->SearchValue2 = @$filter["y_PatientID"];
        $this->PatientID->AdvancedSearch->SearchOperator2 = @$filter["w_PatientID"];
        $this->PatientID->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field WifeCell
        $this->WifeCell->AdvancedSearch->SearchValue = @$filter["x_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchOperator = @$filter["z_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchCondition = @$filter["v_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchValue2 = @$filter["y_WifeCell"];
        $this->WifeCell->AdvancedSearch->SearchOperator2 = @$filter["w_WifeCell"];
        $this->WifeCell->AdvancedSearch->save();

        // Field PartnerID
        $this->PartnerID->AdvancedSearch->SearchValue = @$filter["x_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator = @$filter["z_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchCondition = @$filter["v_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchValue2 = @$filter["y_PartnerID"];
        $this->PartnerID->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerID"];
        $this->PartnerID->AdvancedSearch->save();

        // Field PartnerName
        $this->PartnerName->AdvancedSearch->SearchValue = @$filter["x_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator = @$filter["z_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchCondition = @$filter["v_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchValue2 = @$filter["y_PartnerName"];
        $this->PartnerName->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerName"];
        $this->PartnerName->AdvancedSearch->save();

        // Field HusbandCell
        $this->HusbandCell->AdvancedSearch->SearchValue = @$filter["x_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchOperator = @$filter["z_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchCondition = @$filter["v_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchValue2 = @$filter["y_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandCell"];
        $this->HusbandCell->AdvancedSearch->save();

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

        // Field TreatmentStartDate
        $this->TreatmentStartDate->AdvancedSearch->SearchValue = @$filter["x_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchOperator = @$filter["z_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchCondition = @$filter["v_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->save();

        // Field treatment_status
        $this->treatment_status->AdvancedSearch->SearchValue = @$filter["x_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchOperator = @$filter["z_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchCondition = @$filter["v_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchValue2 = @$filter["y_treatment_status"];
        $this->treatment_status->AdvancedSearch->SearchOperator2 = @$filter["w_treatment_status"];
        $this->treatment_status->AdvancedSearch->save();

        // Field ARTCYCLE
        $this->ARTCYCLE->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE"];
        $this->ARTCYCLE->AdvancedSearch->save();

        // Field RESULT
        $this->RESULT->AdvancedSearch->SearchValue = @$filter["x_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator = @$filter["z_RESULT"];
        $this->RESULT->AdvancedSearch->SearchCondition = @$filter["v_RESULT"];
        $this->RESULT->AdvancedSearch->SearchValue2 = @$filter["y_RESULT"];
        $this->RESULT->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT"];
        $this->RESULT->AdvancedSearch->save();

        // Field status
        $this->status->AdvancedSearch->SearchValue = @$filter["x_status"];
        $this->status->AdvancedSearch->SearchOperator = @$filter["z_status"];
        $this->status->AdvancedSearch->SearchCondition = @$filter["v_status"];
        $this->status->AdvancedSearch->SearchValue2 = @$filter["y_status"];
        $this->status->AdvancedSearch->SearchOperator2 = @$filter["w_status"];
        $this->status->AdvancedSearch->save();

        // Field createdby
        $this->createdby->AdvancedSearch->SearchValue = @$filter["x_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator = @$filter["z_createdby"];
        $this->createdby->AdvancedSearch->SearchCondition = @$filter["v_createdby"];
        $this->createdby->AdvancedSearch->SearchValue2 = @$filter["y_createdby"];
        $this->createdby->AdvancedSearch->SearchOperator2 = @$filter["w_createdby"];
        $this->createdby->AdvancedSearch->save();

        // Field createddatetime
        $this->createddatetime->AdvancedSearch->SearchValue = @$filter["x_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator = @$filter["z_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchCondition = @$filter["v_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchValue2 = @$filter["y_createddatetime"];
        $this->createddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_createddatetime"];
        $this->createddatetime->AdvancedSearch->save();

        // Field modifiedby
        $this->modifiedby->AdvancedSearch->SearchValue = @$filter["x_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator = @$filter["z_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchCondition = @$filter["v_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchValue2 = @$filter["y_modifiedby"];
        $this->modifiedby->AdvancedSearch->SearchOperator2 = @$filter["w_modifiedby"];
        $this->modifiedby->AdvancedSearch->save();

        // Field modifieddatetime
        $this->modifieddatetime->AdvancedSearch->SearchValue = @$filter["x_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator = @$filter["z_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchCondition = @$filter["v_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchValue2 = @$filter["y_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->SearchOperator2 = @$filter["w_modifieddatetime"];
        $this->modifieddatetime->AdvancedSearch->save();

        // Field TreatementStopDate
        $this->TreatementStopDate->AdvancedSearch->SearchValue = @$filter["x_TreatementStopDate"];
        $this->TreatementStopDate->AdvancedSearch->SearchOperator = @$filter["z_TreatementStopDate"];
        $this->TreatementStopDate->AdvancedSearch->SearchCondition = @$filter["v_TreatementStopDate"];
        $this->TreatementStopDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatementStopDate"];
        $this->TreatementStopDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatementStopDate"];
        $this->TreatementStopDate->AdvancedSearch->save();

        // Field TypePatient
        $this->TypePatient->AdvancedSearch->SearchValue = @$filter["x_TypePatient"];
        $this->TypePatient->AdvancedSearch->SearchOperator = @$filter["z_TypePatient"];
        $this->TypePatient->AdvancedSearch->SearchCondition = @$filter["v_TypePatient"];
        $this->TypePatient->AdvancedSearch->SearchValue2 = @$filter["y_TypePatient"];
        $this->TypePatient->AdvancedSearch->SearchOperator2 = @$filter["w_TypePatient"];
        $this->TypePatient->AdvancedSearch->save();

        // Field Treatment
        $this->Treatment->AdvancedSearch->SearchValue = @$filter["x_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator = @$filter["z_Treatment"];
        $this->Treatment->AdvancedSearch->SearchCondition = @$filter["v_Treatment"];
        $this->Treatment->AdvancedSearch->SearchValue2 = @$filter["y_Treatment"];
        $this->Treatment->AdvancedSearch->SearchOperator2 = @$filter["w_Treatment"];
        $this->Treatment->AdvancedSearch->save();

        // Field TreatmentTec
        $this->TreatmentTec->AdvancedSearch->SearchValue = @$filter["x_TreatmentTec"];
        $this->TreatmentTec->AdvancedSearch->SearchOperator = @$filter["z_TreatmentTec"];
        $this->TreatmentTec->AdvancedSearch->SearchCondition = @$filter["v_TreatmentTec"];
        $this->TreatmentTec->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentTec"];
        $this->TreatmentTec->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentTec"];
        $this->TreatmentTec->AdvancedSearch->save();

        // Field TypeOfCycle
        $this->TypeOfCycle->AdvancedSearch->SearchValue = @$filter["x_TypeOfCycle"];
        $this->TypeOfCycle->AdvancedSearch->SearchOperator = @$filter["z_TypeOfCycle"];
        $this->TypeOfCycle->AdvancedSearch->SearchCondition = @$filter["v_TypeOfCycle"];
        $this->TypeOfCycle->AdvancedSearch->SearchValue2 = @$filter["y_TypeOfCycle"];
        $this->TypeOfCycle->AdvancedSearch->SearchOperator2 = @$filter["w_TypeOfCycle"];
        $this->TypeOfCycle->AdvancedSearch->save();

        // Field SpermOrgin
        $this->SpermOrgin->AdvancedSearch->SearchValue = @$filter["x_SpermOrgin"];
        $this->SpermOrgin->AdvancedSearch->SearchOperator = @$filter["z_SpermOrgin"];
        $this->SpermOrgin->AdvancedSearch->SearchCondition = @$filter["v_SpermOrgin"];
        $this->SpermOrgin->AdvancedSearch->SearchValue2 = @$filter["y_SpermOrgin"];
        $this->SpermOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_SpermOrgin"];
        $this->SpermOrgin->AdvancedSearch->save();

        // Field State
        $this->State->AdvancedSearch->SearchValue = @$filter["x_State"];
        $this->State->AdvancedSearch->SearchOperator = @$filter["z_State"];
        $this->State->AdvancedSearch->SearchCondition = @$filter["v_State"];
        $this->State->AdvancedSearch->SearchValue2 = @$filter["y_State"];
        $this->State->AdvancedSearch->SearchOperator2 = @$filter["w_State"];
        $this->State->AdvancedSearch->save();

        // Field Origin
        $this->Origin->AdvancedSearch->SearchValue = @$filter["x_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator = @$filter["z_Origin"];
        $this->Origin->AdvancedSearch->SearchCondition = @$filter["v_Origin"];
        $this->Origin->AdvancedSearch->SearchValue2 = @$filter["y_Origin"];
        $this->Origin->AdvancedSearch->SearchOperator2 = @$filter["w_Origin"];
        $this->Origin->AdvancedSearch->save();

        // Field MACS
        $this->MACS->AdvancedSearch->SearchValue = @$filter["x_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator = @$filter["z_MACS"];
        $this->MACS->AdvancedSearch->SearchCondition = @$filter["v_MACS"];
        $this->MACS->AdvancedSearch->SearchValue2 = @$filter["y_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator2 = @$filter["w_MACS"];
        $this->MACS->AdvancedSearch->save();

        // Field Technique
        $this->Technique->AdvancedSearch->SearchValue = @$filter["x_Technique"];
        $this->Technique->AdvancedSearch->SearchOperator = @$filter["z_Technique"];
        $this->Technique->AdvancedSearch->SearchCondition = @$filter["v_Technique"];
        $this->Technique->AdvancedSearch->SearchValue2 = @$filter["y_Technique"];
        $this->Technique->AdvancedSearch->SearchOperator2 = @$filter["w_Technique"];
        $this->Technique->AdvancedSearch->save();

        // Field PgdPlanning
        $this->PgdPlanning->AdvancedSearch->SearchValue = @$filter["x_PgdPlanning"];
        $this->PgdPlanning->AdvancedSearch->SearchOperator = @$filter["z_PgdPlanning"];
        $this->PgdPlanning->AdvancedSearch->SearchCondition = @$filter["v_PgdPlanning"];
        $this->PgdPlanning->AdvancedSearch->SearchValue2 = @$filter["y_PgdPlanning"];
        $this->PgdPlanning->AdvancedSearch->SearchOperator2 = @$filter["w_PgdPlanning"];
        $this->PgdPlanning->AdvancedSearch->save();

        // Field IMSI
        $this->IMSI->AdvancedSearch->SearchValue = @$filter["x_IMSI"];
        $this->IMSI->AdvancedSearch->SearchOperator = @$filter["z_IMSI"];
        $this->IMSI->AdvancedSearch->SearchCondition = @$filter["v_IMSI"];
        $this->IMSI->AdvancedSearch->SearchValue2 = @$filter["y_IMSI"];
        $this->IMSI->AdvancedSearch->SearchOperator2 = @$filter["w_IMSI"];
        $this->IMSI->AdvancedSearch->save();

        // Field SequentialCulture
        $this->SequentialCulture->AdvancedSearch->SearchValue = @$filter["x_SequentialCulture"];
        $this->SequentialCulture->AdvancedSearch->SearchOperator = @$filter["z_SequentialCulture"];
        $this->SequentialCulture->AdvancedSearch->SearchCondition = @$filter["v_SequentialCulture"];
        $this->SequentialCulture->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCulture"];
        $this->SequentialCulture->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCulture"];
        $this->SequentialCulture->AdvancedSearch->save();

        // Field TimeLapse
        $this->TimeLapse->AdvancedSearch->SearchValue = @$filter["x_TimeLapse"];
        $this->TimeLapse->AdvancedSearch->SearchOperator = @$filter["z_TimeLapse"];
        $this->TimeLapse->AdvancedSearch->SearchCondition = @$filter["v_TimeLapse"];
        $this->TimeLapse->AdvancedSearch->SearchValue2 = @$filter["y_TimeLapse"];
        $this->TimeLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TimeLapse"];
        $this->TimeLapse->AdvancedSearch->save();

        // Field AH
        $this->AH->AdvancedSearch->SearchValue = @$filter["x_AH"];
        $this->AH->AdvancedSearch->SearchOperator = @$filter["z_AH"];
        $this->AH->AdvancedSearch->SearchCondition = @$filter["v_AH"];
        $this->AH->AdvancedSearch->SearchValue2 = @$filter["y_AH"];
        $this->AH->AdvancedSearch->SearchOperator2 = @$filter["w_AH"];
        $this->AH->AdvancedSearch->save();

        // Field Weight
        $this->Weight->AdvancedSearch->SearchValue = @$filter["x_Weight"];
        $this->Weight->AdvancedSearch->SearchOperator = @$filter["z_Weight"];
        $this->Weight->AdvancedSearch->SearchCondition = @$filter["v_Weight"];
        $this->Weight->AdvancedSearch->SearchValue2 = @$filter["y_Weight"];
        $this->Weight->AdvancedSearch->SearchOperator2 = @$filter["w_Weight"];
        $this->Weight->AdvancedSearch->save();

        // Field BMI
        $this->BMI->AdvancedSearch->SearchValue = @$filter["x_BMI"];
        $this->BMI->AdvancedSearch->SearchOperator = @$filter["z_BMI"];
        $this->BMI->AdvancedSearch->SearchCondition = @$filter["v_BMI"];
        $this->BMI->AdvancedSearch->SearchValue2 = @$filter["y_BMI"];
        $this->BMI->AdvancedSearch->SearchOperator2 = @$filter["w_BMI"];
        $this->BMI->AdvancedSearch->save();

        // Field MaleIndications
        $this->MaleIndications->AdvancedSearch->SearchValue = @$filter["x_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchOperator = @$filter["z_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchCondition = @$filter["v_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_MaleIndications"];
        $this->MaleIndications->AdvancedSearch->save();

        // Field FemaleIndications
        $this->FemaleIndications->AdvancedSearch->SearchValue = @$filter["x_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchOperator = @$filter["z_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchCondition = @$filter["v_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchValue2 = @$filter["y_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->SearchOperator2 = @$filter["w_FemaleIndications"];
        $this->FemaleIndications->AdvancedSearch->save();

        // Field UseOfThe
        $this->UseOfThe->AdvancedSearch->SearchValue = @$filter["x_UseOfThe"];
        $this->UseOfThe->AdvancedSearch->SearchOperator = @$filter["z_UseOfThe"];
        $this->UseOfThe->AdvancedSearch->SearchCondition = @$filter["v_UseOfThe"];
        $this->UseOfThe->AdvancedSearch->SearchValue2 = @$filter["y_UseOfThe"];
        $this->UseOfThe->AdvancedSearch->SearchOperator2 = @$filter["w_UseOfThe"];
        $this->UseOfThe->AdvancedSearch->save();

        // Field Ectopic
        $this->Ectopic->AdvancedSearch->SearchValue = @$filter["x_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator = @$filter["z_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchCondition = @$filter["v_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchValue2 = @$filter["y_Ectopic"];
        $this->Ectopic->AdvancedSearch->SearchOperator2 = @$filter["w_Ectopic"];
        $this->Ectopic->AdvancedSearch->save();

        // Field Heterotopic
        $this->Heterotopic->AdvancedSearch->SearchValue = @$filter["x_Heterotopic"];
        $this->Heterotopic->AdvancedSearch->SearchOperator = @$filter["z_Heterotopic"];
        $this->Heterotopic->AdvancedSearch->SearchCondition = @$filter["v_Heterotopic"];
        $this->Heterotopic->AdvancedSearch->SearchValue2 = @$filter["y_Heterotopic"];
        $this->Heterotopic->AdvancedSearch->SearchOperator2 = @$filter["w_Heterotopic"];
        $this->Heterotopic->AdvancedSearch->save();

        // Field TransferDFE
        $this->TransferDFE->AdvancedSearch->SearchValue = @$filter["x_TransferDFE"];
        $this->TransferDFE->AdvancedSearch->SearchOperator = @$filter["z_TransferDFE"];
        $this->TransferDFE->AdvancedSearch->SearchCondition = @$filter["v_TransferDFE"];
        $this->TransferDFE->AdvancedSearch->SearchValue2 = @$filter["y_TransferDFE"];
        $this->TransferDFE->AdvancedSearch->SearchOperator2 = @$filter["w_TransferDFE"];
        $this->TransferDFE->AdvancedSearch->save();

        // Field Evolutive
        $this->Evolutive->AdvancedSearch->SearchValue = @$filter["x_Evolutive"];
        $this->Evolutive->AdvancedSearch->SearchOperator = @$filter["z_Evolutive"];
        $this->Evolutive->AdvancedSearch->SearchCondition = @$filter["v_Evolutive"];
        $this->Evolutive->AdvancedSearch->SearchValue2 = @$filter["y_Evolutive"];
        $this->Evolutive->AdvancedSearch->SearchOperator2 = @$filter["w_Evolutive"];
        $this->Evolutive->AdvancedSearch->save();

        // Field Number
        $this->Number->AdvancedSearch->SearchValue = @$filter["x_Number"];
        $this->Number->AdvancedSearch->SearchOperator = @$filter["z_Number"];
        $this->Number->AdvancedSearch->SearchCondition = @$filter["v_Number"];
        $this->Number->AdvancedSearch->SearchValue2 = @$filter["y_Number"];
        $this->Number->AdvancedSearch->SearchOperator2 = @$filter["w_Number"];
        $this->Number->AdvancedSearch->save();

        // Field SequentialCult
        $this->SequentialCult->AdvancedSearch->SearchValue = @$filter["x_SequentialCult"];
        $this->SequentialCult->AdvancedSearch->SearchOperator = @$filter["z_SequentialCult"];
        $this->SequentialCult->AdvancedSearch->SearchCondition = @$filter["v_SequentialCult"];
        $this->SequentialCult->AdvancedSearch->SearchValue2 = @$filter["y_SequentialCult"];
        $this->SequentialCult->AdvancedSearch->SearchOperator2 = @$filter["w_SequentialCult"];
        $this->SequentialCult->AdvancedSearch->save();

        // Field TineLapse
        $this->TineLapse->AdvancedSearch->SearchValue = @$filter["x_TineLapse"];
        $this->TineLapse->AdvancedSearch->SearchOperator = @$filter["z_TineLapse"];
        $this->TineLapse->AdvancedSearch->SearchCondition = @$filter["v_TineLapse"];
        $this->TineLapse->AdvancedSearch->SearchValue2 = @$filter["y_TineLapse"];
        $this->TineLapse->AdvancedSearch->SearchOperator2 = @$filter["w_TineLapse"];
        $this->TineLapse->AdvancedSearch->save();
        $this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
        $this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
    }

    // Advanced search WHERE clause based on QueryString
    protected function advancedSearchWhere($default = false)
    {
        global $Security;
        $where = "";
        if (!$Security->canSearch()) {
            return "";
        }
        $this->buildSearchSql($where, $this->id, $default, false); // id
        $this->buildSearchSql($where, $this->CoupleID, $default, false); // CoupleID
        $this->buildSearchSql($where, $this->PatientID, $default, false); // PatientID
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->WifeCell, $default, false); // WifeCell
        $this->buildSearchSql($where, $this->PartnerID, $default, false); // PartnerID
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->HusbandCell, $default, false); // HusbandCell
        $this->buildSearchSql($where, $this->RIDNO, $default, false); // RIDNO
        $this->buildSearchSql($where, $this->Name, $default, false); // Name
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->TreatmentStartDate, $default, false); // TreatmentStartDate
        $this->buildSearchSql($where, $this->treatment_status, $default, false); // treatment_status
        $this->buildSearchSql($where, $this->ARTCYCLE, $default, false); // ARTCYCLE
        $this->buildSearchSql($where, $this->RESULT, $default, false); // RESULT
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->TreatementStopDate, $default, false); // TreatementStopDate
        $this->buildSearchSql($where, $this->TypePatient, $default, false); // TypePatient
        $this->buildSearchSql($where, $this->Treatment, $default, false); // Treatment
        $this->buildSearchSql($where, $this->TreatmentTec, $default, false); // TreatmentTec
        $this->buildSearchSql($where, $this->TypeOfCycle, $default, false); // TypeOfCycle
        $this->buildSearchSql($where, $this->SpermOrgin, $default, false); // SpermOrgin
        $this->buildSearchSql($where, $this->State, $default, false); // State
        $this->buildSearchSql($where, $this->Origin, $default, false); // Origin
        $this->buildSearchSql($where, $this->MACS, $default, false); // MACS
        $this->buildSearchSql($where, $this->Technique, $default, false); // Technique
        $this->buildSearchSql($where, $this->PgdPlanning, $default, false); // PgdPlanning
        $this->buildSearchSql($where, $this->IMSI, $default, false); // IMSI
        $this->buildSearchSql($where, $this->SequentialCulture, $default, false); // SequentialCulture
        $this->buildSearchSql($where, $this->TimeLapse, $default, false); // TimeLapse
        $this->buildSearchSql($where, $this->AH, $default, false); // AH
        $this->buildSearchSql($where, $this->Weight, $default, false); // Weight
        $this->buildSearchSql($where, $this->BMI, $default, false); // BMI
        $this->buildSearchSql($where, $this->MaleIndications, $default, false); // MaleIndications
        $this->buildSearchSql($where, $this->FemaleIndications, $default, false); // FemaleIndications
        $this->buildSearchSql($where, $this->UseOfThe, $default, false); // UseOfThe
        $this->buildSearchSql($where, $this->Ectopic, $default, false); // Ectopic
        $this->buildSearchSql($where, $this->Heterotopic, $default, false); // Heterotopic
        $this->buildSearchSql($where, $this->TransferDFE, $default, true); // TransferDFE
        $this->buildSearchSql($where, $this->Evolutive, $default, false); // Evolutive
        $this->buildSearchSql($where, $this->Number, $default, false); // Number
        $this->buildSearchSql($where, $this->SequentialCult, $default, false); // SequentialCult
        $this->buildSearchSql($where, $this->TineLapse, $default, false); // TineLapse

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->CoupleID->AdvancedSearch->save(); // CoupleID
            $this->PatientID->AdvancedSearch->save(); // PatientID
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->WifeCell->AdvancedSearch->save(); // WifeCell
            $this->PartnerID->AdvancedSearch->save(); // PartnerID
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->HusbandCell->AdvancedSearch->save(); // HusbandCell
            $this->RIDNO->AdvancedSearch->save(); // RIDNO
            $this->Name->AdvancedSearch->save(); // Name
            $this->Age->AdvancedSearch->save(); // Age
            $this->TreatmentStartDate->AdvancedSearch->save(); // TreatmentStartDate
            $this->treatment_status->AdvancedSearch->save(); // treatment_status
            $this->ARTCYCLE->AdvancedSearch->save(); // ARTCYCLE
            $this->RESULT->AdvancedSearch->save(); // RESULT
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->TreatementStopDate->AdvancedSearch->save(); // TreatementStopDate
            $this->TypePatient->AdvancedSearch->save(); // TypePatient
            $this->Treatment->AdvancedSearch->save(); // Treatment
            $this->TreatmentTec->AdvancedSearch->save(); // TreatmentTec
            $this->TypeOfCycle->AdvancedSearch->save(); // TypeOfCycle
            $this->SpermOrgin->AdvancedSearch->save(); // SpermOrgin
            $this->State->AdvancedSearch->save(); // State
            $this->Origin->AdvancedSearch->save(); // Origin
            $this->MACS->AdvancedSearch->save(); // MACS
            $this->Technique->AdvancedSearch->save(); // Technique
            $this->PgdPlanning->AdvancedSearch->save(); // PgdPlanning
            $this->IMSI->AdvancedSearch->save(); // IMSI
            $this->SequentialCulture->AdvancedSearch->save(); // SequentialCulture
            $this->TimeLapse->AdvancedSearch->save(); // TimeLapse
            $this->AH->AdvancedSearch->save(); // AH
            $this->Weight->AdvancedSearch->save(); // Weight
            $this->BMI->AdvancedSearch->save(); // BMI
            $this->MaleIndications->AdvancedSearch->save(); // MaleIndications
            $this->FemaleIndications->AdvancedSearch->save(); // FemaleIndications
            $this->UseOfThe->AdvancedSearch->save(); // UseOfThe
            $this->Ectopic->AdvancedSearch->save(); // Ectopic
            $this->Heterotopic->AdvancedSearch->save(); // Heterotopic
            $this->TransferDFE->AdvancedSearch->save(); // TransferDFE
            $this->Evolutive->AdvancedSearch->save(); // Evolutive
            $this->Number->AdvancedSearch->save(); // Number
            $this->SequentialCult->AdvancedSearch->save(); // SequentialCult
            $this->TineLapse->AdvancedSearch->save(); // TineLapse
        }
        return $where;
    }

    // Build search SQL
    protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
    {
        $fldParm = $fld->Param;
        $fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
        $fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
        $fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
        $fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
        $fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
        $wrk = "";
        if (is_array($fldVal)) {
            $fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
        }
        if (is_array($fldVal2)) {
            $fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
        }
        $fldOpr = strtoupper(trim($fldOpr));
        if ($fldOpr == "") {
            $fldOpr = "=";
        }
        $fldOpr2 = strtoupper(trim($fldOpr2));
        if ($fldOpr2 == "") {
            $fldOpr2 = "=";
        }
        if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr)) {
            $multiValue = false;
        }
        if ($multiValue) {
            $wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
            $wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
            $wrk = $wrk1; // Build final SQL
            if ($wrk2 != "") {
                $wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
            }
        } else {
            $fldVal = $this->convertSearchValue($fld, $fldVal);
            $fldVal2 = $this->convertSearchValue($fld, $fldVal2);
            $wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
        }
        AddFilter($where, $wrk);
    }

    // Convert search value
    protected function convertSearchValue(&$fld, $fldVal)
    {
        if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE")) {
            return $fldVal;
        }
        $value = $fldVal;
        if ($fld->isBoolean()) {
            if ($fldVal != "") {
                $value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
            }
        } elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
            if ($fldVal != "") {
                $value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
            }
        }
        return $value;
    }

    // Return basic search SQL
    protected function basicSearchSql($arKeywords, $type)
    {
        $where = "";
        $this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeCell, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandCell, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Name, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->treatment_status, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCYCLE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypePatient, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Treatment, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TreatmentTec, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TypeOfCycle, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SpermOrgin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->State, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Origin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MACS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Technique, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PgdPlanning, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SequentialCulture, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TimeLapse, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Weight, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BMI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MaleIndications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FemaleIndications, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->UseOfThe, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Ectopic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Heterotopic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TransferDFE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Evolutive, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Number, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SequentialCult, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TineLapse, $arKeywords, $type);
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
        if ($this->id->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CoupleID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeCell->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandCell->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RIDNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TreatmentStartDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->treatment_status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ARTCYCLE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RESULT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->status->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createdby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->createddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifiedby->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->modifieddatetime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TreatementStopDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypePatient->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Treatment->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TreatmentTec->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TypeOfCycle->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SpermOrgin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->State->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Origin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MACS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Technique->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PgdPlanning->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMSI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SequentialCulture->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TimeLapse->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Weight->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BMI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MaleIndications->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FemaleIndications->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->UseOfThe->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Ectopic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Heterotopic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TransferDFE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Evolutive->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Number->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SequentialCult->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TineLapse->AdvancedSearch->issetSession()) {
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

        // Clear advanced search parameters
        $this->resetAdvancedSearchParms();
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

    // Clear all advanced search parameters
    protected function resetAdvancedSearchParms()
    {
                $this->id->AdvancedSearch->unsetSession();
                $this->CoupleID->AdvancedSearch->unsetSession();
                $this->PatientID->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->WifeCell->AdvancedSearch->unsetSession();
                $this->PartnerID->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->HusbandCell->AdvancedSearch->unsetSession();
                $this->RIDNO->AdvancedSearch->unsetSession();
                $this->Name->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->TreatmentStartDate->AdvancedSearch->unsetSession();
                $this->treatment_status->AdvancedSearch->unsetSession();
                $this->ARTCYCLE->AdvancedSearch->unsetSession();
                $this->RESULT->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->TreatementStopDate->AdvancedSearch->unsetSession();
                $this->TypePatient->AdvancedSearch->unsetSession();
                $this->Treatment->AdvancedSearch->unsetSession();
                $this->TreatmentTec->AdvancedSearch->unsetSession();
                $this->TypeOfCycle->AdvancedSearch->unsetSession();
                $this->SpermOrgin->AdvancedSearch->unsetSession();
                $this->State->AdvancedSearch->unsetSession();
                $this->Origin->AdvancedSearch->unsetSession();
                $this->MACS->AdvancedSearch->unsetSession();
                $this->Technique->AdvancedSearch->unsetSession();
                $this->PgdPlanning->AdvancedSearch->unsetSession();
                $this->IMSI->AdvancedSearch->unsetSession();
                $this->SequentialCulture->AdvancedSearch->unsetSession();
                $this->TimeLapse->AdvancedSearch->unsetSession();
                $this->AH->AdvancedSearch->unsetSession();
                $this->Weight->AdvancedSearch->unsetSession();
                $this->BMI->AdvancedSearch->unsetSession();
                $this->MaleIndications->AdvancedSearch->unsetSession();
                $this->FemaleIndications->AdvancedSearch->unsetSession();
                $this->UseOfThe->AdvancedSearch->unsetSession();
                $this->Ectopic->AdvancedSearch->unsetSession();
                $this->Heterotopic->AdvancedSearch->unsetSession();
                $this->TransferDFE->AdvancedSearch->unsetSession();
                $this->Evolutive->AdvancedSearch->unsetSession();
                $this->Number->AdvancedSearch->unsetSession();
                $this->SequentialCult->AdvancedSearch->unsetSession();
                $this->TineLapse->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->CoupleID->AdvancedSearch->load();
                $this->PatientID->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->WifeCell->AdvancedSearch->load();
                $this->PartnerID->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->HusbandCell->AdvancedSearch->load();
                $this->RIDNO->AdvancedSearch->load();
                $this->Name->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->TreatmentStartDate->AdvancedSearch->load();
                $this->treatment_status->AdvancedSearch->load();
                $this->ARTCYCLE->AdvancedSearch->load();
                $this->RESULT->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->TreatementStopDate->AdvancedSearch->load();
                $this->TypePatient->AdvancedSearch->load();
                $this->Treatment->AdvancedSearch->load();
                $this->TreatmentTec->AdvancedSearch->load();
                $this->TypeOfCycle->AdvancedSearch->load();
                $this->SpermOrgin->AdvancedSearch->load();
                $this->State->AdvancedSearch->load();
                $this->Origin->AdvancedSearch->load();
                $this->MACS->AdvancedSearch->load();
                $this->Technique->AdvancedSearch->load();
                $this->PgdPlanning->AdvancedSearch->load();
                $this->IMSI->AdvancedSearch->load();
                $this->SequentialCulture->AdvancedSearch->load();
                $this->TimeLapse->AdvancedSearch->load();
                $this->AH->AdvancedSearch->load();
                $this->Weight->AdvancedSearch->load();
                $this->BMI->AdvancedSearch->load();
                $this->MaleIndications->AdvancedSearch->load();
                $this->FemaleIndications->AdvancedSearch->load();
                $this->UseOfThe->AdvancedSearch->load();
                $this->Ectopic->AdvancedSearch->load();
                $this->Heterotopic->AdvancedSearch->load();
                $this->TransferDFE->AdvancedSearch->load();
                $this->Evolutive->AdvancedSearch->load();
                $this->Number->AdvancedSearch->load();
                $this->SequentialCult->AdvancedSearch->load();
                $this->TineLapse->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->CoupleID); // CoupleID
            $this->updateSort($this->PatientID); // PatientID
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->WifeCell); // WifeCell
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->HusbandCell); // HusbandCell
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->TreatmentStartDate); // TreatmentStartDate
            $this->updateSort($this->treatment_status); // treatment_status
            $this->updateSort($this->ARTCYCLE); // ARTCYCLE
            $this->updateSort($this->RESULT); // RESULT
            $this->setStartRecordNumber(1); // Reset start position
        }
    }

    // Load sort order parameters
    protected function loadSortOrder()
    {
        $orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
        if ($orderBy == "") {
            $this->DefaultSort = "`id` DESC";
            if ($this->getSqlOrderBy() != "") {
                $useDefaultSort = true;
                if ($this->id->getSort() != "") {
                    $useDefaultSort = false;
                }
                if ($useDefaultSort) {
                    $this->id->setSort("DESC");
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
                $this->CoupleID->setSort("");
                $this->PatientID->setSort("");
                $this->PatientName->setSort("");
                $this->WifeCell->setSort("");
                $this->PartnerID->setSort("");
                $this->PartnerName->setSort("");
                $this->HusbandCell->setSort("");
                $this->RIDNO->setSort("");
                $this->Name->setSort("");
                $this->Age->setSort("");
                $this->TreatmentStartDate->setSort("");
                $this->treatment_status->setSort("");
                $this->ARTCYCLE->setSort("");
                $this->RESULT->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->TreatementStopDate->setSort("");
                $this->TypePatient->setSort("");
                $this->Treatment->setSort("");
                $this->TreatmentTec->setSort("");
                $this->TypeOfCycle->setSort("");
                $this->SpermOrgin->setSort("");
                $this->State->setSort("");
                $this->Origin->setSort("");
                $this->MACS->setSort("");
                $this->Technique->setSort("");
                $this->PgdPlanning->setSort("");
                $this->IMSI->setSort("");
                $this->SequentialCulture->setSort("");
                $this->TimeLapse->setSort("");
                $this->AH->setSort("");
                $this->Weight->setSort("");
                $this->BMI->setSort("");
                $this->MaleIndications->setSort("");
                $this->FemaleIndications->setSort("");
                $this->UseOfThe->setSort("");
                $this->Ectopic->setSort("");
                $this->Heterotopic->setSort("");
                $this->TransferDFE->setSort("");
                $this->Evolutive->setSort("");
                $this->Number->setSort("");
                $this->SequentialCult->setSort("");
                $this->TineLapse->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_ivf_treatment_planlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_ivf_treatment_planlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_ivf_treatment_planlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

    // Load search values for validation
    protected function loadSearchValues()
    {
        // Load search values
        $hasValue = false;

        // id
        if (!$this->isAddOrEdit() && $this->id->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id->AdvancedSearch->SearchValue != "" || $this->id->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CoupleID
        if (!$this->isAddOrEdit() && $this->CoupleID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CoupleID->AdvancedSearch->SearchValue != "" || $this->CoupleID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientID
        if (!$this->isAddOrEdit() && $this->PatientID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientID->AdvancedSearch->SearchValue != "" || $this->PatientID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientName
        if (!$this->isAddOrEdit() && $this->PatientName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientName->AdvancedSearch->SearchValue != "" || $this->PatientName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeCell
        if (!$this->isAddOrEdit() && $this->WifeCell->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeCell->AdvancedSearch->SearchValue != "" || $this->WifeCell->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerID
        if (!$this->isAddOrEdit() && $this->PartnerID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerID->AdvancedSearch->SearchValue != "" || $this->PartnerID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PartnerName
        if (!$this->isAddOrEdit() && $this->PartnerName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerName->AdvancedSearch->SearchValue != "" || $this->PartnerName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandCell
        if (!$this->isAddOrEdit() && $this->HusbandCell->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandCell->AdvancedSearch->SearchValue != "" || $this->HusbandCell->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RIDNO
        if (!$this->isAddOrEdit() && $this->RIDNO->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RIDNO->AdvancedSearch->SearchValue != "" || $this->RIDNO->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Name
        if (!$this->isAddOrEdit() && $this->Name->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Name->AdvancedSearch->SearchValue != "" || $this->Name->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Age
        if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TreatmentStartDate
        if (!$this->isAddOrEdit() && $this->TreatmentStartDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TreatmentStartDate->AdvancedSearch->SearchValue != "" || $this->TreatmentStartDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // treatment_status
        if (!$this->isAddOrEdit() && $this->treatment_status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->treatment_status->AdvancedSearch->SearchValue != "" || $this->treatment_status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ARTCYCLE
        if (!$this->isAddOrEdit() && $this->ARTCYCLE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ARTCYCLE->AdvancedSearch->SearchValue != "" || $this->ARTCYCLE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RESULT
        if (!$this->isAddOrEdit() && $this->RESULT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RESULT->AdvancedSearch->SearchValue != "" || $this->RESULT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // status
        if (!$this->isAddOrEdit() && $this->status->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->status->AdvancedSearch->SearchValue != "" || $this->status->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createdby
        if (!$this->isAddOrEdit() && $this->createdby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createdby->AdvancedSearch->SearchValue != "" || $this->createdby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // createddatetime
        if (!$this->isAddOrEdit() && $this->createddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->createddatetime->AdvancedSearch->SearchValue != "" || $this->createddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifiedby
        if (!$this->isAddOrEdit() && $this->modifiedby->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifiedby->AdvancedSearch->SearchValue != "" || $this->modifiedby->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // modifieddatetime
        if (!$this->isAddOrEdit() && $this->modifieddatetime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->modifieddatetime->AdvancedSearch->SearchValue != "" || $this->modifieddatetime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TreatementStopDate
        if (!$this->isAddOrEdit() && $this->TreatementStopDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TreatementStopDate->AdvancedSearch->SearchValue != "" || $this->TreatementStopDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TypePatient
        if (!$this->isAddOrEdit() && $this->TypePatient->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypePatient->AdvancedSearch->SearchValue != "" || $this->TypePatient->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Treatment
        if (!$this->isAddOrEdit() && $this->Treatment->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Treatment->AdvancedSearch->SearchValue != "" || $this->Treatment->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TreatmentTec
        if (!$this->isAddOrEdit() && $this->TreatmentTec->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TreatmentTec->AdvancedSearch->SearchValue != "" || $this->TreatmentTec->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TypeOfCycle
        if (!$this->isAddOrEdit() && $this->TypeOfCycle->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TypeOfCycle->AdvancedSearch->SearchValue != "" || $this->TypeOfCycle->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SpermOrgin
        if (!$this->isAddOrEdit() && $this->SpermOrgin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SpermOrgin->AdvancedSearch->SearchValue != "" || $this->SpermOrgin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // State
        if (!$this->isAddOrEdit() && $this->State->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->State->AdvancedSearch->SearchValue != "" || $this->State->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Origin
        if (!$this->isAddOrEdit() && $this->Origin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Origin->AdvancedSearch->SearchValue != "" || $this->Origin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MACS
        if (!$this->isAddOrEdit() && $this->MACS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MACS->AdvancedSearch->SearchValue != "" || $this->MACS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Technique
        if (!$this->isAddOrEdit() && $this->Technique->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Technique->AdvancedSearch->SearchValue != "" || $this->Technique->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PgdPlanning
        if (!$this->isAddOrEdit() && $this->PgdPlanning->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PgdPlanning->AdvancedSearch->SearchValue != "" || $this->PgdPlanning->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMSI
        if (!$this->isAddOrEdit() && $this->IMSI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMSI->AdvancedSearch->SearchValue != "" || $this->IMSI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SequentialCulture
        if (!$this->isAddOrEdit() && $this->SequentialCulture->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SequentialCulture->AdvancedSearch->SearchValue != "" || $this->SequentialCulture->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TimeLapse
        if (!$this->isAddOrEdit() && $this->TimeLapse->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TimeLapse->AdvancedSearch->SearchValue != "" || $this->TimeLapse->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AH
        if (!$this->isAddOrEdit() && $this->AH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AH->AdvancedSearch->SearchValue != "" || $this->AH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Weight
        if (!$this->isAddOrEdit() && $this->Weight->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Weight->AdvancedSearch->SearchValue != "" || $this->Weight->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BMI
        if (!$this->isAddOrEdit() && $this->BMI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BMI->AdvancedSearch->SearchValue != "" || $this->BMI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MaleIndications
        if (!$this->isAddOrEdit() && $this->MaleIndications->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MaleIndications->AdvancedSearch->SearchValue != "" || $this->MaleIndications->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FemaleIndications
        if (!$this->isAddOrEdit() && $this->FemaleIndications->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FemaleIndications->AdvancedSearch->SearchValue != "" || $this->FemaleIndications->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // UseOfThe
        if (!$this->isAddOrEdit() && $this->UseOfThe->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->UseOfThe->AdvancedSearch->SearchValue != "" || $this->UseOfThe->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Ectopic
        if (!$this->isAddOrEdit() && $this->Ectopic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Ectopic->AdvancedSearch->SearchValue != "" || $this->Ectopic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Heterotopic
        if (!$this->isAddOrEdit() && $this->Heterotopic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Heterotopic->AdvancedSearch->SearchValue != "" || $this->Heterotopic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TransferDFE
        if (!$this->isAddOrEdit() && $this->TransferDFE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TransferDFE->AdvancedSearch->SearchValue != "" || $this->TransferDFE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->TransferDFE->AdvancedSearch->SearchValue)) {
            $this->TransferDFE->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->TransferDFE->AdvancedSearch->SearchValue);
        }
        if (is_array($this->TransferDFE->AdvancedSearch->SearchValue2)) {
            $this->TransferDFE->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->TransferDFE->AdvancedSearch->SearchValue2);
        }

        // Evolutive
        if (!$this->isAddOrEdit() && $this->Evolutive->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Evolutive->AdvancedSearch->SearchValue != "" || $this->Evolutive->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Number
        if (!$this->isAddOrEdit() && $this->Number->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Number->AdvancedSearch->SearchValue != "" || $this->Number->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SequentialCult
        if (!$this->isAddOrEdit() && $this->SequentialCult->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SequentialCult->AdvancedSearch->SearchValue != "" || $this->SequentialCult->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TineLapse
        if (!$this->isAddOrEdit() && $this->TineLapse->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TineLapse->AdvancedSearch->SearchValue != "" || $this->TineLapse->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        return $hasValue;
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
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->PatientID->setDbValue($row['PatientID']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->WifeCell->setDbValue($row['WifeCell']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->HusbandCell->setDbValue($row['HusbandCell']);
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TreatementStopDate->setDbValue($row['TreatementStopDate']);
        $this->TypePatient->setDbValue($row['TypePatient']);
        $this->Treatment->setDbValue($row['Treatment']);
        $this->TreatmentTec->setDbValue($row['TreatmentTec']);
        $this->TypeOfCycle->setDbValue($row['TypeOfCycle']);
        $this->SpermOrgin->setDbValue($row['SpermOrgin']);
        $this->State->setDbValue($row['State']);
        $this->Origin->setDbValue($row['Origin']);
        $this->MACS->setDbValue($row['MACS']);
        $this->Technique->setDbValue($row['Technique']);
        $this->PgdPlanning->setDbValue($row['PgdPlanning']);
        $this->IMSI->setDbValue($row['IMSI']);
        $this->SequentialCulture->setDbValue($row['SequentialCulture']);
        $this->TimeLapse->setDbValue($row['TimeLapse']);
        $this->AH->setDbValue($row['AH']);
        $this->Weight->setDbValue($row['Weight']);
        $this->BMI->setDbValue($row['BMI']);
        $this->MaleIndications->setDbValue($row['MaleIndications']);
        $this->FemaleIndications->setDbValue($row['FemaleIndications']);
        $this->UseOfThe->setDbValue($row['UseOfThe']);
        $this->Ectopic->setDbValue($row['Ectopic']);
        $this->Heterotopic->setDbValue($row['Heterotopic']);
        $this->TransferDFE->setDbValue($row['TransferDFE']);
        $this->Evolutive->setDbValue($row['Evolutive']);
        $this->Number->setDbValue($row['Number']);
        $this->SequentialCult->setDbValue($row['SequentialCult']);
        $this->TineLapse->setDbValue($row['TineLapse']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['CoupleID'] = null;
        $row['PatientID'] = null;
        $row['PatientName'] = null;
        $row['WifeCell'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['HusbandCell'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['TreatmentStartDate'] = null;
        $row['treatment_status'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['TreatementStopDate'] = null;
        $row['TypePatient'] = null;
        $row['Treatment'] = null;
        $row['TreatmentTec'] = null;
        $row['TypeOfCycle'] = null;
        $row['SpermOrgin'] = null;
        $row['State'] = null;
        $row['Origin'] = null;
        $row['MACS'] = null;
        $row['Technique'] = null;
        $row['PgdPlanning'] = null;
        $row['IMSI'] = null;
        $row['SequentialCulture'] = null;
        $row['TimeLapse'] = null;
        $row['AH'] = null;
        $row['Weight'] = null;
        $row['BMI'] = null;
        $row['MaleIndications'] = null;
        $row['FemaleIndications'] = null;
        $row['UseOfThe'] = null;
        $row['Ectopic'] = null;
        $row['Heterotopic'] = null;
        $row['TransferDFE'] = null;
        $row['Evolutive'] = null;
        $row['Number'] = null;
        $row['SequentialCult'] = null;
        $row['TineLapse'] = null;
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

        // CoupleID

        // PatientID

        // PatientName

        // WifeCell

        // PartnerID

        // PartnerName

        // HusbandCell

        // RIDNO

        // Name

        // Age

        // TreatmentStartDate

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TreatementStopDate

        // TypePatient

        // Treatment

        // TreatmentTec

        // TypeOfCycle

        // SpermOrgin

        // State

        // Origin

        // MACS

        // Technique

        // PgdPlanning

        // IMSI

        // SequentialCulture

        // TimeLapse

        // AH

        // Weight

        // BMI

        // MaleIndications

        // FemaleIndications

        // UseOfThe

        // Ectopic

        // Heterotopic

        // TransferDFE

        // Evolutive

        // Number

        // SequentialCult

        // TineLapse
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // PatientID
            $this->PatientID->ViewValue = $this->PatientID->CurrentValue;
            $this->PatientID->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // WifeCell
            $this->WifeCell->ViewValue = $this->WifeCell->CurrentValue;
            $this->WifeCell->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // HusbandCell
            $this->HusbandCell->ViewValue = $this->HusbandCell->CurrentValue;
            $this->HusbandCell->ViewCustomAttributes = "";

            // RIDNO
            $curVal = trim(strval($this->RIDNO->CurrentValue));
            if ($curVal != "") {
                $this->RIDNO->ViewValue = $this->RIDNO->lookupCacheOption($curVal);
                if ($this->RIDNO->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNO->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNO->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNO->ViewValue = $this->RIDNO->displayValue($arwrk);
                    } else {
                        $this->RIDNO->ViewValue = $this->RIDNO->CurrentValue;
                    }
                }
            } else {
                $this->RIDNO->ViewValue = null;
            }
            $this->RIDNO->ViewCustomAttributes = "";

            // Name
            $this->Name->ViewValue = $this->Name->CurrentValue;
            $this->Name->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // TreatmentStartDate
            $this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
            $this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
            $this->TreatmentStartDate->ViewCustomAttributes = "";

            // treatment_status
            if (strval($this->treatment_status->CurrentValue) != "") {
                $this->treatment_status->ViewValue = $this->treatment_status->optionCaption($this->treatment_status->CurrentValue);
            } else {
                $this->treatment_status->ViewValue = null;
            }
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            if (strval($this->ARTCYCLE->CurrentValue) != "") {
                $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->optionCaption($this->ARTCYCLE->CurrentValue);
            } else {
                $this->ARTCYCLE->ViewValue = null;
            }
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            if (strval($this->RESULT->CurrentValue) != "") {
                $this->RESULT->ViewValue = $this->RESULT->optionCaption($this->RESULT->CurrentValue);
            } else {
                $this->RESULT->ViewValue = null;
            }
            $this->RESULT->ViewCustomAttributes = "";

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

            // createdby
            $this->createdby->ViewValue = $this->createdby->CurrentValue;
            $this->createdby->ViewValue = FormatNumber($this->createdby->ViewValue, 0, -2, -2, -2);
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewValue = FormatNumber($this->modifiedby->ViewValue, 0, -2, -2, -2);
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // TreatementStopDate
            $this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
            $this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
            $this->TreatementStopDate->ViewCustomAttributes = "";

            // TypePatient
            $this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
            $this->TypePatient->ViewCustomAttributes = "";

            // Treatment
            if (strval($this->Treatment->CurrentValue) != "") {
                $this->Treatment->ViewValue = $this->Treatment->optionCaption($this->Treatment->CurrentValue);
            } else {
                $this->Treatment->ViewValue = null;
            }
            $this->Treatment->ViewCustomAttributes = "";

            // TreatmentTec
            $this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
            $this->TreatmentTec->ViewCustomAttributes = "";

            // TypeOfCycle
            if (strval($this->TypeOfCycle->CurrentValue) != "") {
                $this->TypeOfCycle->ViewValue = $this->TypeOfCycle->optionCaption($this->TypeOfCycle->CurrentValue);
            } else {
                $this->TypeOfCycle->ViewValue = null;
            }
            $this->TypeOfCycle->ViewCustomAttributes = "";

            // SpermOrgin
            if (strval($this->SpermOrgin->CurrentValue) != "") {
                $this->SpermOrgin->ViewValue = $this->SpermOrgin->optionCaption($this->SpermOrgin->CurrentValue);
            } else {
                $this->SpermOrgin->ViewValue = null;
            }
            $this->SpermOrgin->ViewCustomAttributes = "";

            // State
            if (strval($this->State->CurrentValue) != "") {
                $this->State->ViewValue = $this->State->optionCaption($this->State->CurrentValue);
            } else {
                $this->State->ViewValue = null;
            }
            $this->State->ViewCustomAttributes = "";

            // Origin
            $this->Origin->ViewValue = $this->Origin->CurrentValue;
            $this->Origin->ViewCustomAttributes = "";

            // MACS
            if (strval($this->MACS->CurrentValue) != "") {
                $this->MACS->ViewValue = $this->MACS->optionCaption($this->MACS->CurrentValue);
            } else {
                $this->MACS->ViewValue = null;
            }
            $this->MACS->ViewCustomAttributes = "";

            // Technique
            $this->Technique->ViewValue = $this->Technique->CurrentValue;
            $this->Technique->ViewCustomAttributes = "";

            // PgdPlanning
            if (strval($this->PgdPlanning->CurrentValue) != "") {
                $this->PgdPlanning->ViewValue = $this->PgdPlanning->optionCaption($this->PgdPlanning->CurrentValue);
            } else {
                $this->PgdPlanning->ViewValue = null;
            }
            $this->PgdPlanning->ViewCustomAttributes = "";

            // IMSI
            $this->IMSI->ViewValue = $this->IMSI->CurrentValue;
            $this->IMSI->ViewCustomAttributes = "";

            // SequentialCulture
            $this->SequentialCulture->ViewValue = $this->SequentialCulture->CurrentValue;
            $this->SequentialCulture->ViewCustomAttributes = "";

            // TimeLapse
            $this->TimeLapse->ViewValue = $this->TimeLapse->CurrentValue;
            $this->TimeLapse->ViewCustomAttributes = "";

            // AH
            $this->AH->ViewValue = $this->AH->CurrentValue;
            $this->AH->ViewCustomAttributes = "";

            // Weight
            $this->Weight->ViewValue = $this->Weight->CurrentValue;
            $this->Weight->ViewCustomAttributes = "";

            // BMI
            $this->BMI->ViewValue = $this->BMI->CurrentValue;
            $this->BMI->ViewCustomAttributes = "";

            // MaleIndications
            if (strval($this->MaleIndications->CurrentValue) != "") {
                $this->MaleIndications->ViewValue = $this->MaleIndications->optionCaption($this->MaleIndications->CurrentValue);
            } else {
                $this->MaleIndications->ViewValue = null;
            }
            $this->MaleIndications->ViewCustomAttributes = "";

            // FemaleIndications
            if (strval($this->FemaleIndications->CurrentValue) != "") {
                $this->FemaleIndications->ViewValue = $this->FemaleIndications->optionCaption($this->FemaleIndications->CurrentValue);
            } else {
                $this->FemaleIndications->ViewValue = null;
            }
            $this->FemaleIndications->ViewCustomAttributes = "";

            // UseOfThe
            $this->UseOfThe->ViewValue = $this->UseOfThe->CurrentValue;
            $this->UseOfThe->ViewCustomAttributes = "";

            // Ectopic
            $this->Ectopic->ViewValue = $this->Ectopic->CurrentValue;
            $this->Ectopic->ViewCustomAttributes = "";

            // Heterotopic
            if (strval($this->Heterotopic->CurrentValue) != "") {
                $this->Heterotopic->ViewValue = $this->Heterotopic->optionCaption($this->Heterotopic->CurrentValue);
            } else {
                $this->Heterotopic->ViewValue = null;
            }
            $this->Heterotopic->ViewCustomAttributes = "";

            // TransferDFE
            if (strval($this->TransferDFE->CurrentValue) != "") {
                $this->TransferDFE->ViewValue = new OptionValues();
                $arwrk = explode(",", strval($this->TransferDFE->CurrentValue));
                $cnt = count($arwrk);
                for ($ari = 0; $ari < $cnt; $ari++)
                    $this->TransferDFE->ViewValue->add($this->TransferDFE->optionCaption(trim($arwrk[$ari])));
            } else {
                $this->TransferDFE->ViewValue = null;
            }
            $this->TransferDFE->ViewCustomAttributes = "";

            // Evolutive
            $this->Evolutive->ViewValue = $this->Evolutive->CurrentValue;
            $this->Evolutive->ViewCustomAttributes = "";

            // Number
            $this->Number->ViewValue = $this->Number->CurrentValue;
            $this->Number->ViewCustomAttributes = "";

            // SequentialCult
            $this->SequentialCult->ViewValue = $this->SequentialCult->CurrentValue;
            $this->SequentialCult->ViewCustomAttributes = "";

            // TineLapse
            if (strval($this->TineLapse->CurrentValue) != "") {
                $this->TineLapse->ViewValue = $this->TineLapse->optionCaption($this->TineLapse->CurrentValue);
            } else {
                $this->TineLapse->ViewValue = null;
            }
            $this->TineLapse->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);
            }

            // PatientID
            $this->PatientID->LinkCustomAttributes = "";
            $this->PatientID->HrefValue = "";
            $this->PatientID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientID->ViewValue = $this->highlightValue($this->PatientID);
            }

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientName->ViewValue = $this->highlightValue($this->PatientName);
            }

            // WifeCell
            $this->WifeCell->LinkCustomAttributes = "";
            $this->WifeCell->HrefValue = "";
            $this->WifeCell->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeCell->ViewValue = $this->highlightValue($this->WifeCell);
            }

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerID->ViewValue = $this->highlightValue($this->PartnerID);
            }

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerName->ViewValue = $this->highlightValue($this->PartnerName);
            }

            // HusbandCell
            $this->HusbandCell->LinkCustomAttributes = "";
            $this->HusbandCell->HrefValue = "";
            $this->HusbandCell->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandCell->ViewValue = $this->highlightValue($this->HusbandCell);
            }

            // RIDNO
            $this->RIDNO->LinkCustomAttributes = "";
            $this->RIDNO->HrefValue = "";
            $this->RIDNO->TooltipValue = "";

            // TreatmentStartDate
            $this->TreatmentStartDate->LinkCustomAttributes = "";
            $this->TreatmentStartDate->HrefValue = "";
            $this->TreatmentStartDate->TooltipValue = "";

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

            // PatientID
            $this->PatientID->EditAttrs["class"] = "form-control";
            $this->PatientID->EditCustomAttributes = "";
            if (!$this->PatientID->Raw) {
                $this->PatientID->AdvancedSearch->SearchValue = HtmlDecode($this->PatientID->AdvancedSearch->SearchValue);
            }
            $this->PatientID->EditValue = HtmlEncode($this->PatientID->AdvancedSearch->SearchValue);
            $this->PatientID->PlaceHolder = RemoveHtml($this->PatientID->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // WifeCell
            $this->WifeCell->EditAttrs["class"] = "form-control";
            $this->WifeCell->EditCustomAttributes = "";
            if (!$this->WifeCell->Raw) {
                $this->WifeCell->AdvancedSearch->SearchValue = HtmlDecode($this->WifeCell->AdvancedSearch->SearchValue);
            }
            $this->WifeCell->EditValue = HtmlEncode($this->WifeCell->AdvancedSearch->SearchValue);
            $this->WifeCell->PlaceHolder = RemoveHtml($this->WifeCell->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerID->AdvancedSearch->SearchValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->AdvancedSearch->SearchValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerName->AdvancedSearch->SearchValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->AdvancedSearch->SearchValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // HusbandCell
            $this->HusbandCell->EditAttrs["class"] = "form-control";
            $this->HusbandCell->EditCustomAttributes = "";
            if (!$this->HusbandCell->Raw) {
                $this->HusbandCell->AdvancedSearch->SearchValue = HtmlDecode($this->HusbandCell->AdvancedSearch->SearchValue);
            }
            $this->HusbandCell->EditValue = HtmlEncode($this->HusbandCell->AdvancedSearch->SearchValue);
            $this->HusbandCell->PlaceHolder = RemoveHtml($this->HusbandCell->caption());

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // TreatmentStartDate
            $this->TreatmentStartDate->EditAttrs["class"] = "form-control";
            $this->TreatmentStartDate->EditCustomAttributes = "";
            $this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TreatmentStartDate->AdvancedSearch->SearchValue, 0), 8));
            $this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            $this->treatment_status->EditValue = $this->treatment_status->options(true);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditCustomAttributes = "";
            $this->ARTCYCLE->EditValue = $this->ARTCYCLE->options(false);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            $this->RESULT->EditValue = $this->RESULT->options(true);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());
        }
        if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != ROWTYPE_AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate search
    protected function validateSearch()
    {
        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }

        // Return validate result
        $validateSearch = !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateSearch = $validateSearch && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateSearch;
    }

    // Load advanced search
    public function loadAdvancedSearch()
    {
        $this->id->AdvancedSearch->load();
        $this->CoupleID->AdvancedSearch->load();
        $this->PatientID->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->WifeCell->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->HusbandCell->AdvancedSearch->load();
        $this->RIDNO->AdvancedSearch->load();
        $this->Name->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->TreatmentStartDate->AdvancedSearch->load();
        $this->treatment_status->AdvancedSearch->load();
        $this->ARTCYCLE->AdvancedSearch->load();
        $this->RESULT->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->TreatementStopDate->AdvancedSearch->load();
        $this->TypePatient->AdvancedSearch->load();
        $this->Treatment->AdvancedSearch->load();
        $this->TreatmentTec->AdvancedSearch->load();
        $this->TypeOfCycle->AdvancedSearch->load();
        $this->SpermOrgin->AdvancedSearch->load();
        $this->State->AdvancedSearch->load();
        $this->Origin->AdvancedSearch->load();
        $this->MACS->AdvancedSearch->load();
        $this->Technique->AdvancedSearch->load();
        $this->PgdPlanning->AdvancedSearch->load();
        $this->IMSI->AdvancedSearch->load();
        $this->SequentialCulture->AdvancedSearch->load();
        $this->TimeLapse->AdvancedSearch->load();
        $this->AH->AdvancedSearch->load();
        $this->Weight->AdvancedSearch->load();
        $this->BMI->AdvancedSearch->load();
        $this->MaleIndications->AdvancedSearch->load();
        $this->FemaleIndications->AdvancedSearch->load();
        $this->UseOfThe->AdvancedSearch->load();
        $this->Ectopic->AdvancedSearch->load();
        $this->Heterotopic->AdvancedSearch->load();
        $this->TransferDFE->AdvancedSearch->load();
        $this->Evolutive->AdvancedSearch->load();
        $this->Number->AdvancedSearch->load();
        $this->SequentialCult->AdvancedSearch->load();
        $this->TineLapse->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatment_planlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatment_planlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatment_planlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_ivf_treatment_plan" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_ivf_treatment_plan\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_ivf_treatment_planlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatment_planlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatment_planlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != "" && $this->TotalRecords > 0);

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
                case "x_RIDNO":
                    break;
                case "x_treatment_status":
                    break;
                case "x_ARTCYCLE":
                    break;
                case "x_RESULT":
                    break;
                case "x_status":
                    break;
                case "x_Treatment":
                    break;
                case "x_TypeOfCycle":
                    break;
                case "x_SpermOrgin":
                    break;
                case "x_State":
                    break;
                case "x_MACS":
                    break;
                case "x_PgdPlanning":
                    break;
                case "x_MaleIndications":
                    break;
                case "x_FemaleIndications":
                    break;
                case "x_Heterotopic":
                    break;
                case "x_TransferDFE":
                    break;
                case "x_TineLapse":
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
