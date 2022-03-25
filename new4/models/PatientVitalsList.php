<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class PatientVitalsList extends PatientVitals
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'patient_vitals';

    // Page object name
    public $PageObjName = "PatientVitalsList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fpatient_vitalslist";
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

        // Table object (patient_vitals)
        if (!isset($GLOBALS["patient_vitals"]) || get_class($GLOBALS["patient_vitals"]) == PROJECT_NAMESPACE . "patient_vitals") {
            $GLOBALS["patient_vitals"] = &$this;
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
        $this->AddUrl = "PatientVitalsAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "PatientVitalsDelete";
        $this->MultiUpdateUrl = "PatientVitalsUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'patient_vitals');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fpatient_vitalslistsrch";

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
                $doc = new $class(Container("patient_vitals"));
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
        if ($this->isAddOrEdit()) {
            $this->HospID->Visible = false;
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
        $this->id->setVisibility();
        $this->mrnno->setVisibility();
        $this->PatientName->setVisibility();
        $this->PatID->setVisibility();
        $this->MobileNumber->setVisibility();
        $this->profilePic->Visible = false;
        $this->HT->setVisibility();
        $this->WT->setVisibility();
        $this->SurfaceArea->setVisibility();
        $this->BodyMassIndex->setVisibility();
        $this->ClinicalFindings->Visible = false;
        $this->ClinicalDiagnosis->Visible = false;
        $this->AnticoagulantifAny->setVisibility();
        $this->FoodAllergies->setVisibility();
        $this->GenericAllergies->setVisibility();
        $this->GroupAllergies->setVisibility();
        $this->Temp->setVisibility();
        $this->Pulse->setVisibility();
        $this->BP->setVisibility();
        $this->PR->setVisibility();
        $this->CNS->setVisibility();
        $this->RSA->setVisibility();
        $this->CVS->setVisibility();
        $this->PA->setVisibility();
        $this->PS->setVisibility();
        $this->PV->setVisibility();
        $this->clinicaldetails->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->Age->setVisibility();
        $this->Gender->setVisibility();
        $this->PatientSearch->Visible = false;
        $this->PatientId->setVisibility();
        $this->Reception->setVisibility();
        $this->HospID->setVisibility();
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
        $this->setupLookupOptions($this->AnticoagulantifAny);
        $this->setupLookupOptions($this->GenericAllergies);
        $this->setupLookupOptions($this->GroupAllergies);
        $this->setupLookupOptions($this->clinicaldetails);
        $this->setupLookupOptions($this->status);
        $this->setupLookupOptions($this->PatientSearch);

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

        // Restore master/detail filter
        $this->DbMasterFilter = $this->getMasterFilter(); // Restore master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Restore detail filter
        AddFilter($filter, $this->DbDetailFilter);
        AddFilter($filter, $this->SearchWhere);

        // Load master record
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ip_admission") {
            $masterTbl = Container("ip_admission");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("IpAdmissionList"); // Return to master page
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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fpatient_vitalslistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->mrnno->AdvancedSearch->toJson(), ","); // Field mrnno
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->PatID->AdvancedSearch->toJson(), ","); // Field PatID
        $filterList = Concat($filterList, $this->MobileNumber->AdvancedSearch->toJson(), ","); // Field MobileNumber
        $filterList = Concat($filterList, $this->profilePic->AdvancedSearch->toJson(), ","); // Field profilePic
        $filterList = Concat($filterList, $this->HT->AdvancedSearch->toJson(), ","); // Field HT
        $filterList = Concat($filterList, $this->WT->AdvancedSearch->toJson(), ","); // Field WT
        $filterList = Concat($filterList, $this->SurfaceArea->AdvancedSearch->toJson(), ","); // Field SurfaceArea
        $filterList = Concat($filterList, $this->BodyMassIndex->AdvancedSearch->toJson(), ","); // Field BodyMassIndex
        $filterList = Concat($filterList, $this->ClinicalFindings->AdvancedSearch->toJson(), ","); // Field ClinicalFindings
        $filterList = Concat($filterList, $this->ClinicalDiagnosis->AdvancedSearch->toJson(), ","); // Field ClinicalDiagnosis
        $filterList = Concat($filterList, $this->AnticoagulantifAny->AdvancedSearch->toJson(), ","); // Field AnticoagulantifAny
        $filterList = Concat($filterList, $this->FoodAllergies->AdvancedSearch->toJson(), ","); // Field FoodAllergies
        $filterList = Concat($filterList, $this->GenericAllergies->AdvancedSearch->toJson(), ","); // Field GenericAllergies
        $filterList = Concat($filterList, $this->GroupAllergies->AdvancedSearch->toJson(), ","); // Field GroupAllergies
        $filterList = Concat($filterList, $this->Temp->AdvancedSearch->toJson(), ","); // Field Temp
        $filterList = Concat($filterList, $this->Pulse->AdvancedSearch->toJson(), ","); // Field Pulse
        $filterList = Concat($filterList, $this->BP->AdvancedSearch->toJson(), ","); // Field BP
        $filterList = Concat($filterList, $this->PR->AdvancedSearch->toJson(), ","); // Field PR
        $filterList = Concat($filterList, $this->CNS->AdvancedSearch->toJson(), ","); // Field CNS
        $filterList = Concat($filterList, $this->RSA->AdvancedSearch->toJson(), ","); // Field RSA
        $filterList = Concat($filterList, $this->CVS->AdvancedSearch->toJson(), ","); // Field CVS
        $filterList = Concat($filterList, $this->PA->AdvancedSearch->toJson(), ","); // Field PA
        $filterList = Concat($filterList, $this->PS->AdvancedSearch->toJson(), ","); // Field PS
        $filterList = Concat($filterList, $this->PV->AdvancedSearch->toJson(), ","); // Field PV
        $filterList = Concat($filterList, $this->clinicaldetails->AdvancedSearch->toJson(), ","); // Field clinicaldetails
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->Gender->AdvancedSearch->toJson(), ","); // Field Gender
        $filterList = Concat($filterList, $this->PatientSearch->AdvancedSearch->toJson(), ","); // Field PatientSearch
        $filterList = Concat($filterList, $this->PatientId->AdvancedSearch->toJson(), ","); // Field PatientId
        $filterList = Concat($filterList, $this->Reception->AdvancedSearch->toJson(), ","); // Field Reception
        $filterList = Concat($filterList, $this->HospID->AdvancedSearch->toJson(), ","); // Field HospID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fpatient_vitalslistsrch", $filters);
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

        // Field mrnno
        $this->mrnno->AdvancedSearch->SearchValue = @$filter["x_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator = @$filter["z_mrnno"];
        $this->mrnno->AdvancedSearch->SearchCondition = @$filter["v_mrnno"];
        $this->mrnno->AdvancedSearch->SearchValue2 = @$filter["y_mrnno"];
        $this->mrnno->AdvancedSearch->SearchOperator2 = @$filter["w_mrnno"];
        $this->mrnno->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field PatID
        $this->PatID->AdvancedSearch->SearchValue = @$filter["x_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator = @$filter["z_PatID"];
        $this->PatID->AdvancedSearch->SearchCondition = @$filter["v_PatID"];
        $this->PatID->AdvancedSearch->SearchValue2 = @$filter["y_PatID"];
        $this->PatID->AdvancedSearch->SearchOperator2 = @$filter["w_PatID"];
        $this->PatID->AdvancedSearch->save();

        // Field MobileNumber
        $this->MobileNumber->AdvancedSearch->SearchValue = @$filter["x_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator = @$filter["z_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchCondition = @$filter["v_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchValue2 = @$filter["y_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->SearchOperator2 = @$filter["w_MobileNumber"];
        $this->MobileNumber->AdvancedSearch->save();

        // Field profilePic
        $this->profilePic->AdvancedSearch->SearchValue = @$filter["x_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator = @$filter["z_profilePic"];
        $this->profilePic->AdvancedSearch->SearchCondition = @$filter["v_profilePic"];
        $this->profilePic->AdvancedSearch->SearchValue2 = @$filter["y_profilePic"];
        $this->profilePic->AdvancedSearch->SearchOperator2 = @$filter["w_profilePic"];
        $this->profilePic->AdvancedSearch->save();

        // Field HT
        $this->HT->AdvancedSearch->SearchValue = @$filter["x_HT"];
        $this->HT->AdvancedSearch->SearchOperator = @$filter["z_HT"];
        $this->HT->AdvancedSearch->SearchCondition = @$filter["v_HT"];
        $this->HT->AdvancedSearch->SearchValue2 = @$filter["y_HT"];
        $this->HT->AdvancedSearch->SearchOperator2 = @$filter["w_HT"];
        $this->HT->AdvancedSearch->save();

        // Field WT
        $this->WT->AdvancedSearch->SearchValue = @$filter["x_WT"];
        $this->WT->AdvancedSearch->SearchOperator = @$filter["z_WT"];
        $this->WT->AdvancedSearch->SearchCondition = @$filter["v_WT"];
        $this->WT->AdvancedSearch->SearchValue2 = @$filter["y_WT"];
        $this->WT->AdvancedSearch->SearchOperator2 = @$filter["w_WT"];
        $this->WT->AdvancedSearch->save();

        // Field SurfaceArea
        $this->SurfaceArea->AdvancedSearch->SearchValue = @$filter["x_SurfaceArea"];
        $this->SurfaceArea->AdvancedSearch->SearchOperator = @$filter["z_SurfaceArea"];
        $this->SurfaceArea->AdvancedSearch->SearchCondition = @$filter["v_SurfaceArea"];
        $this->SurfaceArea->AdvancedSearch->SearchValue2 = @$filter["y_SurfaceArea"];
        $this->SurfaceArea->AdvancedSearch->SearchOperator2 = @$filter["w_SurfaceArea"];
        $this->SurfaceArea->AdvancedSearch->save();

        // Field BodyMassIndex
        $this->BodyMassIndex->AdvancedSearch->SearchValue = @$filter["x_BodyMassIndex"];
        $this->BodyMassIndex->AdvancedSearch->SearchOperator = @$filter["z_BodyMassIndex"];
        $this->BodyMassIndex->AdvancedSearch->SearchCondition = @$filter["v_BodyMassIndex"];
        $this->BodyMassIndex->AdvancedSearch->SearchValue2 = @$filter["y_BodyMassIndex"];
        $this->BodyMassIndex->AdvancedSearch->SearchOperator2 = @$filter["w_BodyMassIndex"];
        $this->BodyMassIndex->AdvancedSearch->save();

        // Field ClinicalFindings
        $this->ClinicalFindings->AdvancedSearch->SearchValue = @$filter["x_ClinicalFindings"];
        $this->ClinicalFindings->AdvancedSearch->SearchOperator = @$filter["z_ClinicalFindings"];
        $this->ClinicalFindings->AdvancedSearch->SearchCondition = @$filter["v_ClinicalFindings"];
        $this->ClinicalFindings->AdvancedSearch->SearchValue2 = @$filter["y_ClinicalFindings"];
        $this->ClinicalFindings->AdvancedSearch->SearchOperator2 = @$filter["w_ClinicalFindings"];
        $this->ClinicalFindings->AdvancedSearch->save();

        // Field ClinicalDiagnosis
        $this->ClinicalDiagnosis->AdvancedSearch->SearchValue = @$filter["x_ClinicalDiagnosis"];
        $this->ClinicalDiagnosis->AdvancedSearch->SearchOperator = @$filter["z_ClinicalDiagnosis"];
        $this->ClinicalDiagnosis->AdvancedSearch->SearchCondition = @$filter["v_ClinicalDiagnosis"];
        $this->ClinicalDiagnosis->AdvancedSearch->SearchValue2 = @$filter["y_ClinicalDiagnosis"];
        $this->ClinicalDiagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_ClinicalDiagnosis"];
        $this->ClinicalDiagnosis->AdvancedSearch->save();

        // Field AnticoagulantifAny
        $this->AnticoagulantifAny->AdvancedSearch->SearchValue = @$filter["x_AnticoagulantifAny"];
        $this->AnticoagulantifAny->AdvancedSearch->SearchOperator = @$filter["z_AnticoagulantifAny"];
        $this->AnticoagulantifAny->AdvancedSearch->SearchCondition = @$filter["v_AnticoagulantifAny"];
        $this->AnticoagulantifAny->AdvancedSearch->SearchValue2 = @$filter["y_AnticoagulantifAny"];
        $this->AnticoagulantifAny->AdvancedSearch->SearchOperator2 = @$filter["w_AnticoagulantifAny"];
        $this->AnticoagulantifAny->AdvancedSearch->save();

        // Field FoodAllergies
        $this->FoodAllergies->AdvancedSearch->SearchValue = @$filter["x_FoodAllergies"];
        $this->FoodAllergies->AdvancedSearch->SearchOperator = @$filter["z_FoodAllergies"];
        $this->FoodAllergies->AdvancedSearch->SearchCondition = @$filter["v_FoodAllergies"];
        $this->FoodAllergies->AdvancedSearch->SearchValue2 = @$filter["y_FoodAllergies"];
        $this->FoodAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_FoodAllergies"];
        $this->FoodAllergies->AdvancedSearch->save();

        // Field GenericAllergies
        $this->GenericAllergies->AdvancedSearch->SearchValue = @$filter["x_GenericAllergies"];
        $this->GenericAllergies->AdvancedSearch->SearchOperator = @$filter["z_GenericAllergies"];
        $this->GenericAllergies->AdvancedSearch->SearchCondition = @$filter["v_GenericAllergies"];
        $this->GenericAllergies->AdvancedSearch->SearchValue2 = @$filter["y_GenericAllergies"];
        $this->GenericAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_GenericAllergies"];
        $this->GenericAllergies->AdvancedSearch->save();

        // Field GroupAllergies
        $this->GroupAllergies->AdvancedSearch->SearchValue = @$filter["x_GroupAllergies"];
        $this->GroupAllergies->AdvancedSearch->SearchOperator = @$filter["z_GroupAllergies"];
        $this->GroupAllergies->AdvancedSearch->SearchCondition = @$filter["v_GroupAllergies"];
        $this->GroupAllergies->AdvancedSearch->SearchValue2 = @$filter["y_GroupAllergies"];
        $this->GroupAllergies->AdvancedSearch->SearchOperator2 = @$filter["w_GroupAllergies"];
        $this->GroupAllergies->AdvancedSearch->save();

        // Field Temp
        $this->Temp->AdvancedSearch->SearchValue = @$filter["x_Temp"];
        $this->Temp->AdvancedSearch->SearchOperator = @$filter["z_Temp"];
        $this->Temp->AdvancedSearch->SearchCondition = @$filter["v_Temp"];
        $this->Temp->AdvancedSearch->SearchValue2 = @$filter["y_Temp"];
        $this->Temp->AdvancedSearch->SearchOperator2 = @$filter["w_Temp"];
        $this->Temp->AdvancedSearch->save();

        // Field Pulse
        $this->Pulse->AdvancedSearch->SearchValue = @$filter["x_Pulse"];
        $this->Pulse->AdvancedSearch->SearchOperator = @$filter["z_Pulse"];
        $this->Pulse->AdvancedSearch->SearchCondition = @$filter["v_Pulse"];
        $this->Pulse->AdvancedSearch->SearchValue2 = @$filter["y_Pulse"];
        $this->Pulse->AdvancedSearch->SearchOperator2 = @$filter["w_Pulse"];
        $this->Pulse->AdvancedSearch->save();

        // Field BP
        $this->BP->AdvancedSearch->SearchValue = @$filter["x_BP"];
        $this->BP->AdvancedSearch->SearchOperator = @$filter["z_BP"];
        $this->BP->AdvancedSearch->SearchCondition = @$filter["v_BP"];
        $this->BP->AdvancedSearch->SearchValue2 = @$filter["y_BP"];
        $this->BP->AdvancedSearch->SearchOperator2 = @$filter["w_BP"];
        $this->BP->AdvancedSearch->save();

        // Field PR
        $this->PR->AdvancedSearch->SearchValue = @$filter["x_PR"];
        $this->PR->AdvancedSearch->SearchOperator = @$filter["z_PR"];
        $this->PR->AdvancedSearch->SearchCondition = @$filter["v_PR"];
        $this->PR->AdvancedSearch->SearchValue2 = @$filter["y_PR"];
        $this->PR->AdvancedSearch->SearchOperator2 = @$filter["w_PR"];
        $this->PR->AdvancedSearch->save();

        // Field CNS
        $this->CNS->AdvancedSearch->SearchValue = @$filter["x_CNS"];
        $this->CNS->AdvancedSearch->SearchOperator = @$filter["z_CNS"];
        $this->CNS->AdvancedSearch->SearchCondition = @$filter["v_CNS"];
        $this->CNS->AdvancedSearch->SearchValue2 = @$filter["y_CNS"];
        $this->CNS->AdvancedSearch->SearchOperator2 = @$filter["w_CNS"];
        $this->CNS->AdvancedSearch->save();

        // Field RSA
        $this->RSA->AdvancedSearch->SearchValue = @$filter["x_RSA"];
        $this->RSA->AdvancedSearch->SearchOperator = @$filter["z_RSA"];
        $this->RSA->AdvancedSearch->SearchCondition = @$filter["v_RSA"];
        $this->RSA->AdvancedSearch->SearchValue2 = @$filter["y_RSA"];
        $this->RSA->AdvancedSearch->SearchOperator2 = @$filter["w_RSA"];
        $this->RSA->AdvancedSearch->save();

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

        // Field PS
        $this->PS->AdvancedSearch->SearchValue = @$filter["x_PS"];
        $this->PS->AdvancedSearch->SearchOperator = @$filter["z_PS"];
        $this->PS->AdvancedSearch->SearchCondition = @$filter["v_PS"];
        $this->PS->AdvancedSearch->SearchValue2 = @$filter["y_PS"];
        $this->PS->AdvancedSearch->SearchOperator2 = @$filter["w_PS"];
        $this->PS->AdvancedSearch->save();

        // Field PV
        $this->PV->AdvancedSearch->SearchValue = @$filter["x_PV"];
        $this->PV->AdvancedSearch->SearchOperator = @$filter["z_PV"];
        $this->PV->AdvancedSearch->SearchCondition = @$filter["v_PV"];
        $this->PV->AdvancedSearch->SearchValue2 = @$filter["y_PV"];
        $this->PV->AdvancedSearch->SearchOperator2 = @$filter["w_PV"];
        $this->PV->AdvancedSearch->save();

        // Field clinicaldetails
        $this->clinicaldetails->AdvancedSearch->SearchValue = @$filter["x_clinicaldetails"];
        $this->clinicaldetails->AdvancedSearch->SearchOperator = @$filter["z_clinicaldetails"];
        $this->clinicaldetails->AdvancedSearch->SearchCondition = @$filter["v_clinicaldetails"];
        $this->clinicaldetails->AdvancedSearch->SearchValue2 = @$filter["y_clinicaldetails"];
        $this->clinicaldetails->AdvancedSearch->SearchOperator2 = @$filter["w_clinicaldetails"];
        $this->clinicaldetails->AdvancedSearch->save();

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

        // Field Age
        $this->Age->AdvancedSearch->SearchValue = @$filter["x_Age"];
        $this->Age->AdvancedSearch->SearchOperator = @$filter["z_Age"];
        $this->Age->AdvancedSearch->SearchCondition = @$filter["v_Age"];
        $this->Age->AdvancedSearch->SearchValue2 = @$filter["y_Age"];
        $this->Age->AdvancedSearch->SearchOperator2 = @$filter["w_Age"];
        $this->Age->AdvancedSearch->save();

        // Field Gender
        $this->Gender->AdvancedSearch->SearchValue = @$filter["x_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator = @$filter["z_Gender"];
        $this->Gender->AdvancedSearch->SearchCondition = @$filter["v_Gender"];
        $this->Gender->AdvancedSearch->SearchValue2 = @$filter["y_Gender"];
        $this->Gender->AdvancedSearch->SearchOperator2 = @$filter["w_Gender"];
        $this->Gender->AdvancedSearch->save();

        // Field PatientSearch
        $this->PatientSearch->AdvancedSearch->SearchValue = @$filter["x_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator = @$filter["z_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchCondition = @$filter["v_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchValue2 = @$filter["y_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->SearchOperator2 = @$filter["w_PatientSearch"];
        $this->PatientSearch->AdvancedSearch->save();

        // Field PatientId
        $this->PatientId->AdvancedSearch->SearchValue = @$filter["x_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator = @$filter["z_PatientId"];
        $this->PatientId->AdvancedSearch->SearchCondition = @$filter["v_PatientId"];
        $this->PatientId->AdvancedSearch->SearchValue2 = @$filter["y_PatientId"];
        $this->PatientId->AdvancedSearch->SearchOperator2 = @$filter["w_PatientId"];
        $this->PatientId->AdvancedSearch->save();

        // Field Reception
        $this->Reception->AdvancedSearch->SearchValue = @$filter["x_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator = @$filter["z_Reception"];
        $this->Reception->AdvancedSearch->SearchCondition = @$filter["v_Reception"];
        $this->Reception->AdvancedSearch->SearchValue2 = @$filter["y_Reception"];
        $this->Reception->AdvancedSearch->SearchOperator2 = @$filter["w_Reception"];
        $this->Reception->AdvancedSearch->save();

        // Field HospID
        $this->HospID->AdvancedSearch->SearchValue = @$filter["x_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator = @$filter["z_HospID"];
        $this->HospID->AdvancedSearch->SearchCondition = @$filter["v_HospID"];
        $this->HospID->AdvancedSearch->SearchValue2 = @$filter["y_HospID"];
        $this->HospID->AdvancedSearch->SearchOperator2 = @$filter["w_HospID"];
        $this->HospID->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->mrnno, $default, false); // mrnno
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->PatID, $default, false); // PatID
        $this->buildSearchSql($where, $this->MobileNumber, $default, false); // MobileNumber
        $this->buildSearchSql($where, $this->profilePic, $default, false); // profilePic
        $this->buildSearchSql($where, $this->HT, $default, false); // HT
        $this->buildSearchSql($where, $this->WT, $default, false); // WT
        $this->buildSearchSql($where, $this->SurfaceArea, $default, false); // SurfaceArea
        $this->buildSearchSql($where, $this->BodyMassIndex, $default, false); // BodyMassIndex
        $this->buildSearchSql($where, $this->ClinicalFindings, $default, false); // ClinicalFindings
        $this->buildSearchSql($where, $this->ClinicalDiagnosis, $default, false); // ClinicalDiagnosis
        $this->buildSearchSql($where, $this->AnticoagulantifAny, $default, false); // AnticoagulantifAny
        $this->buildSearchSql($where, $this->FoodAllergies, $default, false); // FoodAllergies
        $this->buildSearchSql($where, $this->GenericAllergies, $default, true); // GenericAllergies
        $this->buildSearchSql($where, $this->GroupAllergies, $default, true); // GroupAllergies
        $this->buildSearchSql($where, $this->Temp, $default, false); // Temp
        $this->buildSearchSql($where, $this->Pulse, $default, false); // Pulse
        $this->buildSearchSql($where, $this->BP, $default, false); // BP
        $this->buildSearchSql($where, $this->PR, $default, false); // PR
        $this->buildSearchSql($where, $this->CNS, $default, false); // CNS
        $this->buildSearchSql($where, $this->RSA, $default, false); // RSA
        $this->buildSearchSql($where, $this->CVS, $default, false); // CVS
        $this->buildSearchSql($where, $this->PA, $default, false); // PA
        $this->buildSearchSql($where, $this->PS, $default, false); // PS
        $this->buildSearchSql($where, $this->PV, $default, false); // PV
        $this->buildSearchSql($where, $this->clinicaldetails, $default, true); // clinicaldetails
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->Gender, $default, false); // Gender
        $this->buildSearchSql($where, $this->PatientSearch, $default, false); // PatientSearch
        $this->buildSearchSql($where, $this->PatientId, $default, false); // PatientId
        $this->buildSearchSql($where, $this->Reception, $default, false); // Reception
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->mrnno->AdvancedSearch->save(); // mrnno
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->PatID->AdvancedSearch->save(); // PatID
            $this->MobileNumber->AdvancedSearch->save(); // MobileNumber
            $this->profilePic->AdvancedSearch->save(); // profilePic
            $this->HT->AdvancedSearch->save(); // HT
            $this->WT->AdvancedSearch->save(); // WT
            $this->SurfaceArea->AdvancedSearch->save(); // SurfaceArea
            $this->BodyMassIndex->AdvancedSearch->save(); // BodyMassIndex
            $this->ClinicalFindings->AdvancedSearch->save(); // ClinicalFindings
            $this->ClinicalDiagnosis->AdvancedSearch->save(); // ClinicalDiagnosis
            $this->AnticoagulantifAny->AdvancedSearch->save(); // AnticoagulantifAny
            $this->FoodAllergies->AdvancedSearch->save(); // FoodAllergies
            $this->GenericAllergies->AdvancedSearch->save(); // GenericAllergies
            $this->GroupAllergies->AdvancedSearch->save(); // GroupAllergies
            $this->Temp->AdvancedSearch->save(); // Temp
            $this->Pulse->AdvancedSearch->save(); // Pulse
            $this->BP->AdvancedSearch->save(); // BP
            $this->PR->AdvancedSearch->save(); // PR
            $this->CNS->AdvancedSearch->save(); // CNS
            $this->RSA->AdvancedSearch->save(); // RSA
            $this->CVS->AdvancedSearch->save(); // CVS
            $this->PA->AdvancedSearch->save(); // PA
            $this->PS->AdvancedSearch->save(); // PS
            $this->PV->AdvancedSearch->save(); // PV
            $this->clinicaldetails->AdvancedSearch->save(); // clinicaldetails
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->Age->AdvancedSearch->save(); // Age
            $this->Gender->AdvancedSearch->save(); // Gender
            $this->PatientSearch->AdvancedSearch->save(); // PatientSearch
            $this->PatientId->AdvancedSearch->save(); // PatientId
            $this->Reception->AdvancedSearch->save(); // Reception
            $this->HospID->AdvancedSearch->save(); // HospID
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
        $this->buildBasicSearchSql($where, $this->mrnno, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MobileNumber, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->profilePic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WT, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SurfaceArea, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BodyMassIndex, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ClinicalFindings, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ClinicalDiagnosis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->AnticoagulantifAny, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->FoodAllergies, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GenericAllergies, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->GroupAllergies, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Temp, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Pulse, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->BP, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PR, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CNS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RSA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CVS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PA, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PV, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->clinicaldetails, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->createdby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->modifiedby, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Age, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Gender, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientSearch, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientId, $arKeywords, $type);
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
        if ($this->mrnno->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MobileNumber->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->profilePic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WT->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SurfaceArea->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BodyMassIndex->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ClinicalFindings->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ClinicalDiagnosis->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->AnticoagulantifAny->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->FoodAllergies->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GenericAllergies->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->GroupAllergies->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Temp->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Pulse->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->BP->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PR->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CNS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RSA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CVS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PA->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PV->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->clinicaldetails->AdvancedSearch->issetSession()) {
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
        if ($this->Age->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Gender->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientSearch->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientId->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Reception->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HospID->AdvancedSearch->issetSession()) {
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
                $this->mrnno->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->PatID->AdvancedSearch->unsetSession();
                $this->MobileNumber->AdvancedSearch->unsetSession();
                $this->profilePic->AdvancedSearch->unsetSession();
                $this->HT->AdvancedSearch->unsetSession();
                $this->WT->AdvancedSearch->unsetSession();
                $this->SurfaceArea->AdvancedSearch->unsetSession();
                $this->BodyMassIndex->AdvancedSearch->unsetSession();
                $this->ClinicalFindings->AdvancedSearch->unsetSession();
                $this->ClinicalDiagnosis->AdvancedSearch->unsetSession();
                $this->AnticoagulantifAny->AdvancedSearch->unsetSession();
                $this->FoodAllergies->AdvancedSearch->unsetSession();
                $this->GenericAllergies->AdvancedSearch->unsetSession();
                $this->GroupAllergies->AdvancedSearch->unsetSession();
                $this->Temp->AdvancedSearch->unsetSession();
                $this->Pulse->AdvancedSearch->unsetSession();
                $this->BP->AdvancedSearch->unsetSession();
                $this->PR->AdvancedSearch->unsetSession();
                $this->CNS->AdvancedSearch->unsetSession();
                $this->RSA->AdvancedSearch->unsetSession();
                $this->CVS->AdvancedSearch->unsetSession();
                $this->PA->AdvancedSearch->unsetSession();
                $this->PS->AdvancedSearch->unsetSession();
                $this->PV->AdvancedSearch->unsetSession();
                $this->clinicaldetails->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->Gender->AdvancedSearch->unsetSession();
                $this->PatientSearch->AdvancedSearch->unsetSession();
                $this->PatientId->AdvancedSearch->unsetSession();
                $this->Reception->AdvancedSearch->unsetSession();
                $this->HospID->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->mrnno->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->PatID->AdvancedSearch->load();
                $this->MobileNumber->AdvancedSearch->load();
                $this->profilePic->AdvancedSearch->load();
                $this->HT->AdvancedSearch->load();
                $this->WT->AdvancedSearch->load();
                $this->SurfaceArea->AdvancedSearch->load();
                $this->BodyMassIndex->AdvancedSearch->load();
                $this->ClinicalFindings->AdvancedSearch->load();
                $this->ClinicalDiagnosis->AdvancedSearch->load();
                $this->AnticoagulantifAny->AdvancedSearch->load();
                $this->FoodAllergies->AdvancedSearch->load();
                $this->GenericAllergies->AdvancedSearch->load();
                $this->GroupAllergies->AdvancedSearch->load();
                $this->Temp->AdvancedSearch->load();
                $this->Pulse->AdvancedSearch->load();
                $this->BP->AdvancedSearch->load();
                $this->PR->AdvancedSearch->load();
                $this->CNS->AdvancedSearch->load();
                $this->RSA->AdvancedSearch->load();
                $this->CVS->AdvancedSearch->load();
                $this->PA->AdvancedSearch->load();
                $this->PS->AdvancedSearch->load();
                $this->PV->AdvancedSearch->load();
                $this->clinicaldetails->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->Gender->AdvancedSearch->load();
                $this->PatientSearch->AdvancedSearch->load();
                $this->PatientId->AdvancedSearch->load();
                $this->Reception->AdvancedSearch->load();
                $this->HospID->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->mrnno); // mrnno
            $this->updateSort($this->PatientName); // PatientName
            $this->updateSort($this->PatID); // PatID
            $this->updateSort($this->MobileNumber); // MobileNumber
            $this->updateSort($this->HT); // HT
            $this->updateSort($this->WT); // WT
            $this->updateSort($this->SurfaceArea); // SurfaceArea
            $this->updateSort($this->BodyMassIndex); // BodyMassIndex
            $this->updateSort($this->AnticoagulantifAny); // AnticoagulantifAny
            $this->updateSort($this->FoodAllergies); // FoodAllergies
            $this->updateSort($this->GenericAllergies); // GenericAllergies
            $this->updateSort($this->GroupAllergies); // GroupAllergies
            $this->updateSort($this->Temp); // Temp
            $this->updateSort($this->Pulse); // Pulse
            $this->updateSort($this->BP); // BP
            $this->updateSort($this->PR); // PR
            $this->updateSort($this->CNS); // CNS
            $this->updateSort($this->RSA); // RSA
            $this->updateSort($this->CVS); // CVS
            $this->updateSort($this->PA); // PA
            $this->updateSort($this->PS); // PS
            $this->updateSort($this->PV); // PV
            $this->updateSort($this->clinicaldetails); // clinicaldetails
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->Gender); // Gender
            $this->updateSort($this->PatientId); // PatientId
            $this->updateSort($this->Reception); // Reception
            $this->updateSort($this->HospID); // HospID
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

            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->Reception->setSessionValue("");
                        $this->PatientId->setSessionValue("");
                        $this->mrnno->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->setSessionOrderByList($orderBy);
                $this->id->setSort("");
                $this->mrnno->setSort("");
                $this->PatientName->setSort("");
                $this->PatID->setSort("");
                $this->MobileNumber->setSort("");
                $this->profilePic->setSort("");
                $this->HT->setSort("");
                $this->WT->setSort("");
                $this->SurfaceArea->setSort("");
                $this->BodyMassIndex->setSort("");
                $this->ClinicalFindings->setSort("");
                $this->ClinicalDiagnosis->setSort("");
                $this->AnticoagulantifAny->setSort("");
                $this->FoodAllergies->setSort("");
                $this->GenericAllergies->setSort("");
                $this->GroupAllergies->setSort("");
                $this->Temp->setSort("");
                $this->Pulse->setSort("");
                $this->BP->setSort("");
                $this->PR->setSort("");
                $this->CNS->setSort("");
                $this->RSA->setSort("");
                $this->CVS->setSort("");
                $this->PA->setSort("");
                $this->PS->setSort("");
                $this->PV->setSort("");
                $this->clinicaldetails->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->Age->setSort("");
                $this->Gender->setSort("");
                $this->PatientSearch->setSort("");
                $this->PatientId->setSort("");
                $this->Reception->setSort("");
                $this->HospID->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fpatient_vitalslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fpatient_vitalslistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fpatient_vitalslist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // mrnno
        if (!$this->isAddOrEdit() && $this->mrnno->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->mrnno->AdvancedSearch->SearchValue != "" || $this->mrnno->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PatID
        if (!$this->isAddOrEdit() && $this->PatID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatID->AdvancedSearch->SearchValue != "" || $this->PatID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MobileNumber
        if (!$this->isAddOrEdit() && $this->MobileNumber->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MobileNumber->AdvancedSearch->SearchValue != "" || $this->MobileNumber->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // profilePic
        if (!$this->isAddOrEdit() && $this->profilePic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->profilePic->AdvancedSearch->SearchValue != "" || $this->profilePic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HT
        if (!$this->isAddOrEdit() && $this->HT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HT->AdvancedSearch->SearchValue != "" || $this->HT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WT
        if (!$this->isAddOrEdit() && $this->WT->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WT->AdvancedSearch->SearchValue != "" || $this->WT->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SurfaceArea
        if (!$this->isAddOrEdit() && $this->SurfaceArea->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SurfaceArea->AdvancedSearch->SearchValue != "" || $this->SurfaceArea->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BodyMassIndex
        if (!$this->isAddOrEdit() && $this->BodyMassIndex->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BodyMassIndex->AdvancedSearch->SearchValue != "" || $this->BodyMassIndex->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ClinicalFindings
        if (!$this->isAddOrEdit() && $this->ClinicalFindings->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ClinicalFindings->AdvancedSearch->SearchValue != "" || $this->ClinicalFindings->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ClinicalDiagnosis
        if (!$this->isAddOrEdit() && $this->ClinicalDiagnosis->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ClinicalDiagnosis->AdvancedSearch->SearchValue != "" || $this->ClinicalDiagnosis->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // AnticoagulantifAny
        if (!$this->isAddOrEdit() && $this->AnticoagulantifAny->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->AnticoagulantifAny->AdvancedSearch->SearchValue != "" || $this->AnticoagulantifAny->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // FoodAllergies
        if (!$this->isAddOrEdit() && $this->FoodAllergies->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->FoodAllergies->AdvancedSearch->SearchValue != "" || $this->FoodAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // GenericAllergies
        if (!$this->isAddOrEdit() && $this->GenericAllergies->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GenericAllergies->AdvancedSearch->SearchValue != "" || $this->GenericAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue)) {
            $this->GenericAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue);
        }
        if (is_array($this->GenericAllergies->AdvancedSearch->SearchValue2)) {
            $this->GenericAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GenericAllergies->AdvancedSearch->SearchValue2);
        }

        // GroupAllergies
        if (!$this->isAddOrEdit() && $this->GroupAllergies->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->GroupAllergies->AdvancedSearch->SearchValue != "" || $this->GroupAllergies->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue)) {
            $this->GroupAllergies->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue);
        }
        if (is_array($this->GroupAllergies->AdvancedSearch->SearchValue2)) {
            $this->GroupAllergies->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->GroupAllergies->AdvancedSearch->SearchValue2);
        }

        // Temp
        if (!$this->isAddOrEdit() && $this->Temp->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Temp->AdvancedSearch->SearchValue != "" || $this->Temp->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Pulse
        if (!$this->isAddOrEdit() && $this->Pulse->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Pulse->AdvancedSearch->SearchValue != "" || $this->Pulse->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // BP
        if (!$this->isAddOrEdit() && $this->BP->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->BP->AdvancedSearch->SearchValue != "" || $this->BP->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PR
        if (!$this->isAddOrEdit() && $this->PR->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PR->AdvancedSearch->SearchValue != "" || $this->PR->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CNS
        if (!$this->isAddOrEdit() && $this->CNS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CNS->AdvancedSearch->SearchValue != "" || $this->CNS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RSA
        if (!$this->isAddOrEdit() && $this->RSA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RSA->AdvancedSearch->SearchValue != "" || $this->RSA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CVS
        if (!$this->isAddOrEdit() && $this->CVS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CVS->AdvancedSearch->SearchValue != "" || $this->CVS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PA
        if (!$this->isAddOrEdit() && $this->PA->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PA->AdvancedSearch->SearchValue != "" || $this->PA->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PS
        if (!$this->isAddOrEdit() && $this->PS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PS->AdvancedSearch->SearchValue != "" || $this->PS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PV
        if (!$this->isAddOrEdit() && $this->PV->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PV->AdvancedSearch->SearchValue != "" || $this->PV->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // clinicaldetails
        if (!$this->isAddOrEdit() && $this->clinicaldetails->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->clinicaldetails->AdvancedSearch->SearchValue != "" || $this->clinicaldetails->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }
        if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue)) {
            $this->clinicaldetails->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue);
        }
        if (is_array($this->clinicaldetails->AdvancedSearch->SearchValue2)) {
            $this->clinicaldetails->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->clinicaldetails->AdvancedSearch->SearchValue2);
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

        // Age
        if (!$this->isAddOrEdit() && $this->Age->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Age->AdvancedSearch->SearchValue != "" || $this->Age->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Gender
        if (!$this->isAddOrEdit() && $this->Gender->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Gender->AdvancedSearch->SearchValue != "" || $this->Gender->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientSearch
        if (!$this->isAddOrEdit() && $this->PatientSearch->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientSearch->AdvancedSearch->SearchValue != "" || $this->PatientSearch->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientId
        if (!$this->isAddOrEdit() && $this->PatientId->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientId->AdvancedSearch->SearchValue != "" || $this->PatientId->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Reception
        if (!$this->isAddOrEdit() && $this->Reception->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Reception->AdvancedSearch->SearchValue != "" || $this->Reception->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HospID
        if (!$this->isAddOrEdit() && $this->HospID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HospID->AdvancedSearch->SearchValue != "" || $this->HospID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->mrnno->setDbValue($row['mrnno']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->PatID->setDbValue($row['PatID']);
        $this->MobileNumber->setDbValue($row['MobileNumber']);
        $this->profilePic->setDbValue($row['profilePic']);
        $this->HT->setDbValue($row['HT']);
        $this->WT->setDbValue($row['WT']);
        $this->SurfaceArea->setDbValue($row['SurfaceArea']);
        $this->BodyMassIndex->setDbValue($row['BodyMassIndex']);
        $this->ClinicalFindings->setDbValue($row['ClinicalFindings']);
        $this->ClinicalDiagnosis->setDbValue($row['ClinicalDiagnosis']);
        $this->AnticoagulantifAny->setDbValue($row['AnticoagulantifAny']);
        $this->FoodAllergies->setDbValue($row['FoodAllergies']);
        $this->GenericAllergies->setDbValue($row['GenericAllergies']);
        $this->GroupAllergies->setDbValue($row['GroupAllergies']);
        if (array_key_exists('EV__GroupAllergies', $row)) {
            $this->GroupAllergies->VirtualValue = $row['EV__GroupAllergies']; // Set up virtual field value
        } else {
            $this->GroupAllergies->VirtualValue = ""; // Clear value
        }
        $this->Temp->setDbValue($row['Temp']);
        $this->Pulse->setDbValue($row['Pulse']);
        $this->BP->setDbValue($row['BP']);
        $this->PR->setDbValue($row['PR']);
        $this->CNS->setDbValue($row['CNS']);
        $this->RSA->setDbValue($row['RSA']);
        $this->CVS->setDbValue($row['CVS']);
        $this->PA->setDbValue($row['PA']);
        $this->PS->setDbValue($row['PS']);
        $this->PV->setDbValue($row['PV']);
        $this->clinicaldetails->setDbValue($row['clinicaldetails']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->Age->setDbValue($row['Age']);
        $this->Gender->setDbValue($row['Gender']);
        $this->PatientSearch->setDbValue($row['PatientSearch']);
        $this->PatientId->setDbValue($row['PatientId']);
        $this->Reception->setDbValue($row['Reception']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['mrnno'] = null;
        $row['PatientName'] = null;
        $row['PatID'] = null;
        $row['MobileNumber'] = null;
        $row['profilePic'] = null;
        $row['HT'] = null;
        $row['WT'] = null;
        $row['SurfaceArea'] = null;
        $row['BodyMassIndex'] = null;
        $row['ClinicalFindings'] = null;
        $row['ClinicalDiagnosis'] = null;
        $row['AnticoagulantifAny'] = null;
        $row['FoodAllergies'] = null;
        $row['GenericAllergies'] = null;
        $row['GroupAllergies'] = null;
        $row['Temp'] = null;
        $row['Pulse'] = null;
        $row['BP'] = null;
        $row['PR'] = null;
        $row['CNS'] = null;
        $row['RSA'] = null;
        $row['CVS'] = null;
        $row['PA'] = null;
        $row['PS'] = null;
        $row['PV'] = null;
        $row['clinicaldetails'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['Age'] = null;
        $row['Gender'] = null;
        $row['PatientSearch'] = null;
        $row['PatientId'] = null;
        $row['Reception'] = null;
        $row['HospID'] = null;
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

        // mrnno

        // PatientName

        // PatID

        // MobileNumber

        // profilePic

        // HT

        // WT

        // SurfaceArea

        // BodyMassIndex

        // ClinicalFindings

        // ClinicalDiagnosis

        // AnticoagulantifAny

        // FoodAllergies

        // GenericAllergies

        // GroupAllergies

        // Temp

        // Pulse

        // BP

        // PR

        // CNS

        // RSA

        // CVS

        // PA

        // PS

        // PV

        // clinicaldetails

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // Age

        // Gender

        // PatientSearch

        // PatientId

        // Reception

        // HospID
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // mrnno
            $this->mrnno->ViewValue = $this->mrnno->CurrentValue;
            $this->mrnno->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // PatID
            $this->PatID->ViewValue = $this->PatID->CurrentValue;
            $this->PatID->ViewCustomAttributes = "";

            // MobileNumber
            $this->MobileNumber->ViewValue = $this->MobileNumber->CurrentValue;
            $this->MobileNumber->ViewCustomAttributes = "";

            // HT
            $this->HT->ViewValue = $this->HT->CurrentValue;
            $this->HT->ViewCustomAttributes = "";

            // WT
            $this->WT->ViewValue = $this->WT->CurrentValue;
            $this->WT->ViewCustomAttributes = "";

            // SurfaceArea
            $this->SurfaceArea->ViewValue = $this->SurfaceArea->CurrentValue;
            $this->SurfaceArea->ViewCustomAttributes = "";

            // BodyMassIndex
            $this->BodyMassIndex->ViewValue = $this->BodyMassIndex->CurrentValue;
            $this->BodyMassIndex->ViewCustomAttributes = "";

            // AnticoagulantifAny
            $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
            $curVal = trim(strval($this->AnticoagulantifAny->CurrentValue));
            if ($curVal != "") {
                $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->lookupCacheOption($curVal);
                if ($this->AnticoagulantifAny->ViewValue === null) { // Lookup from database
                    $filterWrk = "`Genericname`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                    $sqlWrk = $this->AnticoagulantifAny->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->AnticoagulantifAny->Lookup->renderViewRow($rswrk[0]);
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->displayValue($arwrk);
                    } else {
                        $this->AnticoagulantifAny->ViewValue = $this->AnticoagulantifAny->CurrentValue;
                    }
                }
            } else {
                $this->AnticoagulantifAny->ViewValue = null;
            }
            $this->AnticoagulantifAny->ViewCustomAttributes = "";

            // FoodAllergies
            $this->FoodAllergies->ViewValue = $this->FoodAllergies->CurrentValue;
            $this->FoodAllergies->ViewCustomAttributes = "";

            // GenericAllergies
            $curVal = trim(strval($this->GenericAllergies->CurrentValue));
            if ($curVal != "") {
                $this->GenericAllergies->ViewValue = $this->GenericAllergies->lookupCacheOption($curVal);
                if ($this->GenericAllergies->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`Genericname`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->GenericAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->GenericAllergies->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->GenericAllergies->Lookup->renderViewRow($row);
                            $this->GenericAllergies->ViewValue->add($this->GenericAllergies->displayValue($arwrk));
                        }
                    } else {
                        $this->GenericAllergies->ViewValue = $this->GenericAllergies->CurrentValue;
                    }
                }
            } else {
                $this->GenericAllergies->ViewValue = null;
            }
            $this->GenericAllergies->ViewCustomAttributes = "";

            // GroupAllergies
            if ($this->GroupAllergies->VirtualValue != "") {
                $this->GroupAllergies->ViewValue = $this->GroupAllergies->VirtualValue;
            } else {
                $curVal = trim(strval($this->GroupAllergies->CurrentValue));
                if ($curVal != "") {
                    $this->GroupAllergies->ViewValue = $this->GroupAllergies->lookupCacheOption($curVal);
                    if ($this->GroupAllergies->ViewValue === null) { // Lookup from database
                        $arwrk = explode(",", $curVal);
                        $filterWrk = "";
                        foreach ($arwrk as $wrk) {
                            if ($filterWrk != "") {
                                $filterWrk .= " OR ";
                            }
                            $filterWrk .= "`CategoryDrug`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                        }
                        $sqlWrk = $this->GroupAllergies->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $this->GroupAllergies->ViewValue = new OptionValues();
                            foreach ($rswrk as $row) {
                                $arwrk = $this->GroupAllergies->Lookup->renderViewRow($row);
                                $this->GroupAllergies->ViewValue->add($this->GroupAllergies->displayValue($arwrk));
                            }
                        } else {
                            $this->GroupAllergies->ViewValue = $this->GroupAllergies->CurrentValue;
                        }
                    }
                } else {
                    $this->GroupAllergies->ViewValue = null;
                }
            }
            $this->GroupAllergies->ViewCustomAttributes = "";

            // Temp
            $this->Temp->ViewValue = $this->Temp->CurrentValue;
            $this->Temp->ViewCustomAttributes = "";

            // Pulse
            $this->Pulse->ViewValue = $this->Pulse->CurrentValue;
            $this->Pulse->ViewCustomAttributes = "";

            // BP
            $this->BP->ViewValue = $this->BP->CurrentValue;
            $this->BP->ViewCustomAttributes = "";

            // PR
            $this->PR->ViewValue = $this->PR->CurrentValue;
            $this->PR->ViewCustomAttributes = "";

            // CNS
            $this->CNS->ViewValue = $this->CNS->CurrentValue;
            $this->CNS->ViewCustomAttributes = "";

            // RSA
            $this->RSA->ViewValue = $this->RSA->CurrentValue;
            $this->RSA->ViewCustomAttributes = "";

            // CVS
            $this->CVS->ViewValue = $this->CVS->CurrentValue;
            $this->CVS->ViewCustomAttributes = "";

            // PA
            $this->PA->ViewValue = $this->PA->CurrentValue;
            $this->PA->ViewCustomAttributes = "";

            // PS
            $this->PS->ViewValue = $this->PS->CurrentValue;
            $this->PS->ViewCustomAttributes = "";

            // PV
            $this->PV->ViewValue = $this->PV->CurrentValue;
            $this->PV->ViewCustomAttributes = "";

            // clinicaldetails
            $curVal = trim(strval($this->clinicaldetails->CurrentValue));
            if ($curVal != "") {
                $this->clinicaldetails->ViewValue = $this->clinicaldetails->lookupCacheOption($curVal);
                if ($this->clinicaldetails->ViewValue === null) { // Lookup from database
                    $arwrk = explode(",", $curVal);
                    $filterWrk = "";
                    foreach ($arwrk as $wrk) {
                        if ($filterWrk != "") {
                            $filterWrk .= " OR ";
                        }
                        $filterWrk .= "`ClinicalDetails`" . SearchString("=", trim($wrk), DATATYPE_STRING, "");
                    }
                    $sqlWrk = $this->clinicaldetails->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $this->clinicaldetails->ViewValue = new OptionValues();
                        foreach ($rswrk as $row) {
                            $arwrk = $this->clinicaldetails->Lookup->renderViewRow($row);
                            $this->clinicaldetails->ViewValue->add($this->clinicaldetails->displayValue($arwrk));
                        }
                    } else {
                        $this->clinicaldetails->ViewValue = $this->clinicaldetails->CurrentValue;
                    }
                }
            } else {
                $this->clinicaldetails->ViewValue = null;
            }
            $this->clinicaldetails->ViewCustomAttributes = "";

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
            $this->createdby->ViewCustomAttributes = "";

            // createddatetime
            $this->createddatetime->ViewValue = $this->createddatetime->CurrentValue;
            $this->createddatetime->ViewValue = FormatDateTime($this->createddatetime->ViewValue, 0);
            $this->createddatetime->ViewCustomAttributes = "";

            // modifiedby
            $this->modifiedby->ViewValue = $this->modifiedby->CurrentValue;
            $this->modifiedby->ViewCustomAttributes = "";

            // modifieddatetime
            $this->modifieddatetime->ViewValue = $this->modifieddatetime->CurrentValue;
            $this->modifieddatetime->ViewValue = FormatDateTime($this->modifieddatetime->ViewValue, 0);
            $this->modifieddatetime->ViewCustomAttributes = "";

            // Age
            $this->Age->ViewValue = $this->Age->CurrentValue;
            $this->Age->ViewCustomAttributes = "";

            // Gender
            $this->Gender->ViewValue = $this->Gender->CurrentValue;
            $this->Gender->ViewCustomAttributes = "";

            // PatientId
            $this->PatientId->ViewValue = $this->PatientId->CurrentValue;
            $this->PatientId->ViewCustomAttributes = "";

            // Reception
            $this->Reception->ViewValue = $this->Reception->CurrentValue;
            $this->Reception->ViewValue = FormatNumber($this->Reception->ViewValue, 0, -2, -2, -2);
            $this->Reception->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
            if (!$this->isExport()) {
                $this->id->ViewValue = $this->highlightValue($this->id);
            }

            // mrnno
            $this->mrnno->LinkCustomAttributes = "";
            $this->mrnno->HrefValue = "";
            $this->mrnno->TooltipValue = "";
            if (!$this->isExport()) {
                $this->mrnno->ViewValue = $this->highlightValue($this->mrnno);
            }

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientName->ViewValue = $this->highlightValue($this->PatientName);
            }

            // PatID
            $this->PatID->LinkCustomAttributes = "";
            $this->PatID->HrefValue = "";
            $this->PatID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatID->ViewValue = $this->highlightValue($this->PatID);
            }

            // MobileNumber
            $this->MobileNumber->LinkCustomAttributes = "";
            $this->MobileNumber->HrefValue = "";
            $this->MobileNumber->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MobileNumber->ViewValue = $this->highlightValue($this->MobileNumber);
            }

            // HT
            $this->HT->LinkCustomAttributes = "";
            $this->HT->HrefValue = "";
            $this->HT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HT->ViewValue = $this->highlightValue($this->HT);
            }

            // WT
            $this->WT->LinkCustomAttributes = "";
            $this->WT->HrefValue = "";
            $this->WT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WT->ViewValue = $this->highlightValue($this->WT);
            }

            // SurfaceArea
            $this->SurfaceArea->LinkCustomAttributes = "";
            $this->SurfaceArea->HrefValue = "";
            $this->SurfaceArea->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SurfaceArea->ViewValue = $this->highlightValue($this->SurfaceArea);
            }

            // BodyMassIndex
            $this->BodyMassIndex->LinkCustomAttributes = "";
            $this->BodyMassIndex->HrefValue = "";
            $this->BodyMassIndex->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BodyMassIndex->ViewValue = $this->highlightValue($this->BodyMassIndex);
            }

            // AnticoagulantifAny
            $this->AnticoagulantifAny->LinkCustomAttributes = "";
            $this->AnticoagulantifAny->HrefValue = "";
            $this->AnticoagulantifAny->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AnticoagulantifAny->ViewValue = $this->highlightValue($this->AnticoagulantifAny);
            }

            // FoodAllergies
            $this->FoodAllergies->LinkCustomAttributes = "";
            $this->FoodAllergies->HrefValue = "";
            $this->FoodAllergies->TooltipValue = "";
            if (!$this->isExport()) {
                $this->FoodAllergies->ViewValue = $this->highlightValue($this->FoodAllergies);
            }

            // GenericAllergies
            $this->GenericAllergies->LinkCustomAttributes = "";
            $this->GenericAllergies->HrefValue = "";
            $this->GenericAllergies->TooltipValue = "";

            // GroupAllergies
            $this->GroupAllergies->LinkCustomAttributes = "";
            $this->GroupAllergies->HrefValue = "";
            $this->GroupAllergies->TooltipValue = "";
            if (!$this->isExport()) {
                $this->GroupAllergies->ViewValue = $this->highlightValue($this->GroupAllergies);
            }

            // Temp
            $this->Temp->LinkCustomAttributes = "";
            $this->Temp->HrefValue = "";
            $this->Temp->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Temp->ViewValue = $this->highlightValue($this->Temp);
            }

            // Pulse
            $this->Pulse->LinkCustomAttributes = "";
            $this->Pulse->HrefValue = "";
            $this->Pulse->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Pulse->ViewValue = $this->highlightValue($this->Pulse);
            }

            // BP
            $this->BP->LinkCustomAttributes = "";
            $this->BP->HrefValue = "";
            $this->BP->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BP->ViewValue = $this->highlightValue($this->BP);
            }

            // PR
            $this->PR->LinkCustomAttributes = "";
            $this->PR->HrefValue = "";
            $this->PR->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PR->ViewValue = $this->highlightValue($this->PR);
            }

            // CNS
            $this->CNS->LinkCustomAttributes = "";
            $this->CNS->HrefValue = "";
            $this->CNS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CNS->ViewValue = $this->highlightValue($this->CNS);
            }

            // RSA
            $this->RSA->LinkCustomAttributes = "";
            $this->RSA->HrefValue = "";
            $this->RSA->TooltipValue = "";
            if (!$this->isExport()) {
                $this->RSA->ViewValue = $this->highlightValue($this->RSA);
            }

            // CVS
            $this->CVS->LinkCustomAttributes = "";
            $this->CVS->HrefValue = "";
            $this->CVS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CVS->ViewValue = $this->highlightValue($this->CVS);
            }

            // PA
            $this->PA->LinkCustomAttributes = "";
            $this->PA->HrefValue = "";
            $this->PA->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PA->ViewValue = $this->highlightValue($this->PA);
            }

            // PS
            $this->PS->LinkCustomAttributes = "";
            $this->PS->HrefValue = "";
            $this->PS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PS->ViewValue = $this->highlightValue($this->PS);
            }

            // PV
            $this->PV->LinkCustomAttributes = "";
            $this->PV->HrefValue = "";
            $this->PV->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PV->ViewValue = $this->highlightValue($this->PV);
            }

            // clinicaldetails
            $this->clinicaldetails->LinkCustomAttributes = "";
            $this->clinicaldetails->HrefValue = "";
            $this->clinicaldetails->TooltipValue = "";

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";
            if (!$this->isExport()) {
                $this->createdby->ViewValue = $this->highlightValue($this->createdby);
            }

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";
            if (!$this->isExport()) {
                $this->modifiedby->ViewValue = $this->highlightValue($this->modifiedby);
            }

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Age->ViewValue = $this->highlightValue($this->Age);
            }

            // Gender
            $this->Gender->LinkCustomAttributes = "";
            $this->Gender->HrefValue = "";
            $this->Gender->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Gender->ViewValue = $this->highlightValue($this->Gender);
            }

            // PatientId
            $this->PatientId->LinkCustomAttributes = "";
            $this->PatientId->HrefValue = "";
            $this->PatientId->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientId->ViewValue = $this->highlightValue($this->PatientId);
            }

            // Reception
            $this->Reception->LinkCustomAttributes = "";
            $this->Reception->HrefValue = "";
            $this->Reception->TooltipValue = "";

            // HospID
            $this->HospID->LinkCustomAttributes = "";
            $this->HospID->HrefValue = "";
            $this->HospID->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // mrnno
            $this->mrnno->EditAttrs["class"] = "form-control";
            $this->mrnno->EditCustomAttributes = "";
            if (!$this->mrnno->Raw) {
                $this->mrnno->AdvancedSearch->SearchValue = HtmlDecode($this->mrnno->AdvancedSearch->SearchValue);
            }
            $this->mrnno->EditValue = HtmlEncode($this->mrnno->AdvancedSearch->SearchValue);
            $this->mrnno->PlaceHolder = RemoveHtml($this->mrnno->caption());

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if (!$this->PatientName->Raw) {
                $this->PatientName->AdvancedSearch->SearchValue = HtmlDecode($this->PatientName->AdvancedSearch->SearchValue);
            }
            $this->PatientName->EditValue = HtmlEncode($this->PatientName->AdvancedSearch->SearchValue);
            $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());

            // PatID
            $this->PatID->EditAttrs["class"] = "form-control";
            $this->PatID->EditCustomAttributes = "";
            if (!$this->PatID->Raw) {
                $this->PatID->AdvancedSearch->SearchValue = HtmlDecode($this->PatID->AdvancedSearch->SearchValue);
            }
            $this->PatID->EditValue = HtmlEncode($this->PatID->AdvancedSearch->SearchValue);
            $this->PatID->PlaceHolder = RemoveHtml($this->PatID->caption());

            // MobileNumber
            $this->MobileNumber->EditAttrs["class"] = "form-control";
            $this->MobileNumber->EditCustomAttributes = "";
            if (!$this->MobileNumber->Raw) {
                $this->MobileNumber->AdvancedSearch->SearchValue = HtmlDecode($this->MobileNumber->AdvancedSearch->SearchValue);
            }
            $this->MobileNumber->EditValue = HtmlEncode($this->MobileNumber->AdvancedSearch->SearchValue);
            $this->MobileNumber->PlaceHolder = RemoveHtml($this->MobileNumber->caption());

            // HT
            $this->HT->EditAttrs["class"] = "form-control";
            $this->HT->EditCustomAttributes = "";
            if (!$this->HT->Raw) {
                $this->HT->AdvancedSearch->SearchValue = HtmlDecode($this->HT->AdvancedSearch->SearchValue);
            }
            $this->HT->EditValue = HtmlEncode($this->HT->AdvancedSearch->SearchValue);
            $this->HT->PlaceHolder = RemoveHtml($this->HT->caption());

            // WT
            $this->WT->EditAttrs["class"] = "form-control";
            $this->WT->EditCustomAttributes = "";
            if (!$this->WT->Raw) {
                $this->WT->AdvancedSearch->SearchValue = HtmlDecode($this->WT->AdvancedSearch->SearchValue);
            }
            $this->WT->EditValue = HtmlEncode($this->WT->AdvancedSearch->SearchValue);
            $this->WT->PlaceHolder = RemoveHtml($this->WT->caption());

            // SurfaceArea
            $this->SurfaceArea->EditAttrs["class"] = "form-control";
            $this->SurfaceArea->EditCustomAttributes = "";
            if (!$this->SurfaceArea->Raw) {
                $this->SurfaceArea->AdvancedSearch->SearchValue = HtmlDecode($this->SurfaceArea->AdvancedSearch->SearchValue);
            }
            $this->SurfaceArea->EditValue = HtmlEncode($this->SurfaceArea->AdvancedSearch->SearchValue);
            $this->SurfaceArea->PlaceHolder = RemoveHtml($this->SurfaceArea->caption());

            // BodyMassIndex
            $this->BodyMassIndex->EditAttrs["class"] = "form-control";
            $this->BodyMassIndex->EditCustomAttributes = "";
            if (!$this->BodyMassIndex->Raw) {
                $this->BodyMassIndex->AdvancedSearch->SearchValue = HtmlDecode($this->BodyMassIndex->AdvancedSearch->SearchValue);
            }
            $this->BodyMassIndex->EditValue = HtmlEncode($this->BodyMassIndex->AdvancedSearch->SearchValue);
            $this->BodyMassIndex->PlaceHolder = RemoveHtml($this->BodyMassIndex->caption());

            // AnticoagulantifAny
            $this->AnticoagulantifAny->EditAttrs["class"] = "form-control";
            $this->AnticoagulantifAny->EditCustomAttributes = "";
            if (!$this->AnticoagulantifAny->Raw) {
                $this->AnticoagulantifAny->AdvancedSearch->SearchValue = HtmlDecode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
            }
            $this->AnticoagulantifAny->EditValue = HtmlEncode($this->AnticoagulantifAny->AdvancedSearch->SearchValue);
            $this->AnticoagulantifAny->PlaceHolder = RemoveHtml($this->AnticoagulantifAny->caption());

            // FoodAllergies
            $this->FoodAllergies->EditAttrs["class"] = "form-control";
            $this->FoodAllergies->EditCustomAttributes = "";
            if (!$this->FoodAllergies->Raw) {
                $this->FoodAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->FoodAllergies->AdvancedSearch->SearchValue);
            }
            $this->FoodAllergies->EditValue = HtmlEncode($this->FoodAllergies->AdvancedSearch->SearchValue);
            $this->FoodAllergies->PlaceHolder = RemoveHtml($this->FoodAllergies->caption());

            // GenericAllergies
            $this->GenericAllergies->EditAttrs["class"] = "form-control";
            $this->GenericAllergies->EditCustomAttributes = "";
            $this->GenericAllergies->PlaceHolder = RemoveHtml($this->GenericAllergies->caption());

            // GroupAllergies
            $this->GroupAllergies->EditAttrs["class"] = "form-control";
            $this->GroupAllergies->EditCustomAttributes = "";
            if (!$this->GroupAllergies->Raw) {
                $this->GroupAllergies->AdvancedSearch->SearchValue = HtmlDecode($this->GroupAllergies->AdvancedSearch->SearchValue);
            }
            $this->GroupAllergies->EditValue = HtmlEncode($this->GroupAllergies->AdvancedSearch->SearchValue);
            $this->GroupAllergies->PlaceHolder = RemoveHtml($this->GroupAllergies->caption());

            // Temp
            $this->Temp->EditAttrs["class"] = "form-control";
            $this->Temp->EditCustomAttributes = "";
            if (!$this->Temp->Raw) {
                $this->Temp->AdvancedSearch->SearchValue = HtmlDecode($this->Temp->AdvancedSearch->SearchValue);
            }
            $this->Temp->EditValue = HtmlEncode($this->Temp->AdvancedSearch->SearchValue);
            $this->Temp->PlaceHolder = RemoveHtml($this->Temp->caption());

            // Pulse
            $this->Pulse->EditAttrs["class"] = "form-control";
            $this->Pulse->EditCustomAttributes = "";
            if (!$this->Pulse->Raw) {
                $this->Pulse->AdvancedSearch->SearchValue = HtmlDecode($this->Pulse->AdvancedSearch->SearchValue);
            }
            $this->Pulse->EditValue = HtmlEncode($this->Pulse->AdvancedSearch->SearchValue);
            $this->Pulse->PlaceHolder = RemoveHtml($this->Pulse->caption());

            // BP
            $this->BP->EditAttrs["class"] = "form-control";
            $this->BP->EditCustomAttributes = "";
            if (!$this->BP->Raw) {
                $this->BP->AdvancedSearch->SearchValue = HtmlDecode($this->BP->AdvancedSearch->SearchValue);
            }
            $this->BP->EditValue = HtmlEncode($this->BP->AdvancedSearch->SearchValue);
            $this->BP->PlaceHolder = RemoveHtml($this->BP->caption());

            // PR
            $this->PR->EditAttrs["class"] = "form-control";
            $this->PR->EditCustomAttributes = "";
            if (!$this->PR->Raw) {
                $this->PR->AdvancedSearch->SearchValue = HtmlDecode($this->PR->AdvancedSearch->SearchValue);
            }
            $this->PR->EditValue = HtmlEncode($this->PR->AdvancedSearch->SearchValue);
            $this->PR->PlaceHolder = RemoveHtml($this->PR->caption());

            // CNS
            $this->CNS->EditAttrs["class"] = "form-control";
            $this->CNS->EditCustomAttributes = "";
            if (!$this->CNS->Raw) {
                $this->CNS->AdvancedSearch->SearchValue = HtmlDecode($this->CNS->AdvancedSearch->SearchValue);
            }
            $this->CNS->EditValue = HtmlEncode($this->CNS->AdvancedSearch->SearchValue);
            $this->CNS->PlaceHolder = RemoveHtml($this->CNS->caption());

            // RSA
            $this->RSA->EditAttrs["class"] = "form-control";
            $this->RSA->EditCustomAttributes = "";
            if (!$this->RSA->Raw) {
                $this->RSA->AdvancedSearch->SearchValue = HtmlDecode($this->RSA->AdvancedSearch->SearchValue);
            }
            $this->RSA->EditValue = HtmlEncode($this->RSA->AdvancedSearch->SearchValue);
            $this->RSA->PlaceHolder = RemoveHtml($this->RSA->caption());

            // CVS
            $this->CVS->EditAttrs["class"] = "form-control";
            $this->CVS->EditCustomAttributes = "";
            if (!$this->CVS->Raw) {
                $this->CVS->AdvancedSearch->SearchValue = HtmlDecode($this->CVS->AdvancedSearch->SearchValue);
            }
            $this->CVS->EditValue = HtmlEncode($this->CVS->AdvancedSearch->SearchValue);
            $this->CVS->PlaceHolder = RemoveHtml($this->CVS->caption());

            // PA
            $this->PA->EditAttrs["class"] = "form-control";
            $this->PA->EditCustomAttributes = "";
            if (!$this->PA->Raw) {
                $this->PA->AdvancedSearch->SearchValue = HtmlDecode($this->PA->AdvancedSearch->SearchValue);
            }
            $this->PA->EditValue = HtmlEncode($this->PA->AdvancedSearch->SearchValue);
            $this->PA->PlaceHolder = RemoveHtml($this->PA->caption());

            // PS
            $this->PS->EditAttrs["class"] = "form-control";
            $this->PS->EditCustomAttributes = "";
            if (!$this->PS->Raw) {
                $this->PS->AdvancedSearch->SearchValue = HtmlDecode($this->PS->AdvancedSearch->SearchValue);
            }
            $this->PS->EditValue = HtmlEncode($this->PS->AdvancedSearch->SearchValue);
            $this->PS->PlaceHolder = RemoveHtml($this->PS->caption());

            // PV
            $this->PV->EditAttrs["class"] = "form-control";
            $this->PV->EditCustomAttributes = "";
            if (!$this->PV->Raw) {
                $this->PV->AdvancedSearch->SearchValue = HtmlDecode($this->PV->AdvancedSearch->SearchValue);
            }
            $this->PV->EditValue = HtmlEncode($this->PV->AdvancedSearch->SearchValue);
            $this->PV->PlaceHolder = RemoveHtml($this->PV->caption());

            // clinicaldetails
            $this->clinicaldetails->EditCustomAttributes = "";
            $this->clinicaldetails->PlaceHolder = RemoveHtml($this->clinicaldetails->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
            if (!$this->createdby->Raw) {
                $this->createdby->AdvancedSearch->SearchValue = HtmlDecode($this->createdby->AdvancedSearch->SearchValue);
            }
            $this->createdby->EditValue = HtmlEncode($this->createdby->AdvancedSearch->SearchValue);
            $this->createdby->PlaceHolder = RemoveHtml($this->createdby->caption());

            // createddatetime
            $this->createddatetime->EditAttrs["class"] = "form-control";
            $this->createddatetime->EditCustomAttributes = "";
            $this->createddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->createddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->createddatetime->PlaceHolder = RemoveHtml($this->createddatetime->caption());

            // modifiedby
            $this->modifiedby->EditAttrs["class"] = "form-control";
            $this->modifiedby->EditCustomAttributes = "";
            if (!$this->modifiedby->Raw) {
                $this->modifiedby->AdvancedSearch->SearchValue = HtmlDecode($this->modifiedby->AdvancedSearch->SearchValue);
            }
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // Gender
            $this->Gender->EditAttrs["class"] = "form-control";
            $this->Gender->EditCustomAttributes = "";
            if (!$this->Gender->Raw) {
                $this->Gender->AdvancedSearch->SearchValue = HtmlDecode($this->Gender->AdvancedSearch->SearchValue);
            }
            $this->Gender->EditValue = HtmlEncode($this->Gender->AdvancedSearch->SearchValue);
            $this->Gender->PlaceHolder = RemoveHtml($this->Gender->caption());

            // PatientId
            $this->PatientId->EditAttrs["class"] = "form-control";
            $this->PatientId->EditCustomAttributes = "";
            $this->PatientId->EditValue = HtmlEncode($this->PatientId->AdvancedSearch->SearchValue);
            $this->PatientId->PlaceHolder = RemoveHtml($this->PatientId->caption());

            // Reception
            $this->Reception->EditAttrs["class"] = "form-control";
            $this->Reception->EditCustomAttributes = "";
            $this->Reception->EditValue = HtmlEncode($this->Reception->AdvancedSearch->SearchValue);
            $this->Reception->PlaceHolder = RemoveHtml($this->Reception->caption());

            // HospID
            $this->HospID->EditAttrs["class"] = "form-control";
            $this->HospID->EditCustomAttributes = "";
            $this->HospID->EditValue = HtmlEncode($this->HospID->AdvancedSearch->SearchValue);
            $this->HospID->PlaceHolder = RemoveHtml($this->HospID->caption());
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
        $this->mrnno->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->PatID->AdvancedSearch->load();
        $this->MobileNumber->AdvancedSearch->load();
        $this->profilePic->AdvancedSearch->load();
        $this->HT->AdvancedSearch->load();
        $this->WT->AdvancedSearch->load();
        $this->SurfaceArea->AdvancedSearch->load();
        $this->BodyMassIndex->AdvancedSearch->load();
        $this->ClinicalFindings->AdvancedSearch->load();
        $this->ClinicalDiagnosis->AdvancedSearch->load();
        $this->AnticoagulantifAny->AdvancedSearch->load();
        $this->FoodAllergies->AdvancedSearch->load();
        $this->GenericAllergies->AdvancedSearch->load();
        $this->GroupAllergies->AdvancedSearch->load();
        $this->Temp->AdvancedSearch->load();
        $this->Pulse->AdvancedSearch->load();
        $this->BP->AdvancedSearch->load();
        $this->PR->AdvancedSearch->load();
        $this->CNS->AdvancedSearch->load();
        $this->RSA->AdvancedSearch->load();
        $this->CVS->AdvancedSearch->load();
        $this->PA->AdvancedSearch->load();
        $this->PS->AdvancedSearch->load();
        $this->PV->AdvancedSearch->load();
        $this->clinicaldetails->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->Gender->AdvancedSearch->load();
        $this->PatientSearch->AdvancedSearch->load();
        $this->PatientId->AdvancedSearch->load();
        $this->Reception->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fpatient_vitalslist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_patient_vitals" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_patient_vitals\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fpatient_vitalslist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fpatient_vitalslistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"PatientVitalsSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fpatient_vitalslistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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

        // Export master record
        if (Config("EXPORT_MASTER_RECORD") && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "ip_admission") {
            $ip_admission = Container("ip_admission");
            $rsmaster = $ip_admission->loadRs($this->DbMasterFilter); // Load master record
            if ($rsmaster) {
                $exportStyle = $doc->Style;
                $doc->setStyle("v"); // Change to vertical
                if (!$this->isExport("csv") || Config("EXPORT_MASTER_RECORD_FOR_CSV")) {
                    $doc->Table = $ip_admission;
                    $ip_admission->exportDocument($doc, new Recordset($rsmaster));
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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Get("fk_id", Get("Reception"))) !== null) {
                    $masterTbl->id->setQueryStringValue($parm);
                    $this->Reception->setQueryStringValue($masterTbl->id->QueryStringValue);
                    $this->Reception->setSessionValue($this->Reception->QueryStringValue);
                    if (!is_numeric($masterTbl->id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_patient_id", Get("PatientId"))) !== null) {
                    $masterTbl->patient_id->setQueryStringValue($parm);
                    $this->PatientId->setQueryStringValue($masterTbl->patient_id->QueryStringValue);
                    $this->PatientId->setSessionValue($this->PatientId->QueryStringValue);
                    if (!is_numeric($masterTbl->patient_id->QueryStringValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Get("fk_mrnNo", Get("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setQueryStringValue($parm);
                    $this->mrnno->setQueryStringValue($masterTbl->mrnNo->QueryStringValue);
                    $this->mrnno->setSessionValue($this->mrnno->QueryStringValue);
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
            if ($masterTblVar == "ip_admission") {
                $validMaster = true;
                $masterTbl = Container("ip_admission");
                if (($parm = Post("fk_id", Post("Reception"))) !== null) {
                    $masterTbl->id->setFormValue($parm);
                    $this->Reception->setFormValue($masterTbl->id->FormValue);
                    $this->Reception->setSessionValue($this->Reception->FormValue);
                    if (!is_numeric($masterTbl->id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_patient_id", Post("PatientId"))) !== null) {
                    $masterTbl->patient_id->setFormValue($parm);
                    $this->PatientId->setFormValue($masterTbl->patient_id->FormValue);
                    $this->PatientId->setSessionValue($this->PatientId->FormValue);
                    if (!is_numeric($masterTbl->patient_id->FormValue)) {
                        $validMaster = false;
                    }
                } else {
                    $validMaster = false;
                }
                if (($parm = Post("fk_mrnNo", Post("mrnno"))) !== null) {
                    $masterTbl->mrnNo->setFormValue($parm);
                    $this->mrnno->setFormValue($masterTbl->mrnNo->FormValue);
                    $this->mrnno->setSessionValue($this->mrnno->FormValue);
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
            if ($masterTblVar != "ip_admission") {
                if ($this->Reception->CurrentValue == "") {
                    $this->Reception->setSessionValue("");
                }
                if ($this->PatientId->CurrentValue == "") {
                    $this->PatientId->setSessionValue("");
                }
                if ($this->mrnno->CurrentValue == "") {
                    $this->mrnno->setSessionValue("");
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
                case "x_AnticoagulantifAny":
                    break;
                case "x_GenericAllergies":
                    break;
                case "x_GroupAllergies":
                    break;
                case "x_clinicaldetails":
                    break;
                case "x_status":
                    break;
                case "x_PatientSearch":
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
