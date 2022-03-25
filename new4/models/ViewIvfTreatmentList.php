<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewIvfTreatmentList extends ViewIvfTreatment
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_ivf_treatment';

    // Page object name
    public $PageObjName = "ViewIvfTreatmentList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_ivf_treatmentlist";
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
    public $ExportExcelCustom = true;
    public $ExportWordCustom = true;
    public $ExportPdfCustom = true;
    public $ExportEmailCustom = true;

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

        // Custom template
        $this->UseCustomTemplate = true;

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (view_ivf_treatment)
        if (!isset($GLOBALS["view_ivf_treatment"]) || get_class($GLOBALS["view_ivf_treatment"]) == PROJECT_NAMESPACE . "view_ivf_treatment") {
            $GLOBALS["view_ivf_treatment"] = &$this;
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
        $this->AddUrl = "ViewIvfTreatmentAdd?" . Config("TABLE_SHOW_DETAIL") . "=";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewIvfTreatmentDelete";
        $this->MultiUpdateUrl = "ViewIvfTreatmentUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_ivf_treatment');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_ivf_treatmentlistsrch";

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
                $doc = new $class(Container("view_ivf_treatment"));
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
            $key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
            $key .= @$ar['id1'];
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

        // Custom export (post back from ew.applyTemplate), export and terminate page
        if (Post("customexport") !== null) {
            $this->CustomExport = Post("customexport");
            $this->Export = $this->CustomExport;
            $this->terminate();
            return;
        }

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
        $this->treatment_status->setVisibility();
        $this->ARTCYCLE->setVisibility();
        $this->RESULT->setVisibility();
        $this->status->setVisibility();
        $this->createdby->setVisibility();
        $this->createddatetime->setVisibility();
        $this->modifiedby->setVisibility();
        $this->modifieddatetime->setVisibility();
        $this->TreatmentStartDate->setVisibility();
        $this->TreatementStopDate->setVisibility();
        $this->TypePatient->setVisibility();
        $this->Treatment->setVisibility();
        $this->TreatmentTec->setVisibility();
        $this->TypeOfCycle->setVisibility();
        $this->SpermOrgin->setVisibility();
        $this->State->setVisibility();
        $this->Origin->setVisibility();
        $this->MACS->setVisibility();
        $this->Technique->setVisibility();
        $this->PgdPlanning->setVisibility();
        $this->IMSI->setVisibility();
        $this->SequentialCulture->setVisibility();
        $this->TimeLapse->setVisibility();
        $this->AH->setVisibility();
        $this->Weight->setVisibility();
        $this->BMI->setVisibility();
        $this->status1->Visible = false;
        $this->id1->Visible = false;
        $this->Male->setVisibility();
        $this->Female->setVisibility();
        $this->malepropic->setVisibility();
        $this->femalepropic->setVisibility();
        $this->HusbandEducation->setVisibility();
        $this->WifeEducation->setVisibility();
        $this->HusbandWorkHours->setVisibility();
        $this->WifeWorkHours->setVisibility();
        $this->PatientLanguage->setVisibility();
        $this->ReferedBy->setVisibility();
        $this->ReferPhNo->setVisibility();
        $this->ARTCYCLE1->setVisibility();
        $this->RESULT1->setVisibility();
        $this->CoupleID->setVisibility();
        $this->HospID->setVisibility();
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
        $this->setupLookupOptions($this->status1);
        $this->setupLookupOptions($this->Male);
        $this->setupLookupOptions($this->Female);
        $this->setupLookupOptions($this->ReferedBy);
        $this->AllowAddDeleteRow = false; // Do not allow add/delete row

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_ivf_treatmentlistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->RIDNO->AdvancedSearch->toJson(), ","); // Field RIDNO
        $filterList = Concat($filterList, $this->Name->AdvancedSearch->toJson(), ","); // Field Name
        $filterList = Concat($filterList, $this->Age->AdvancedSearch->toJson(), ","); // Field Age
        $filterList = Concat($filterList, $this->treatment_status->AdvancedSearch->toJson(), ","); // Field treatment_status
        $filterList = Concat($filterList, $this->ARTCYCLE->AdvancedSearch->toJson(), ","); // Field ARTCYCLE
        $filterList = Concat($filterList, $this->RESULT->AdvancedSearch->toJson(), ","); // Field RESULT
        $filterList = Concat($filterList, $this->status->AdvancedSearch->toJson(), ","); // Field status
        $filterList = Concat($filterList, $this->createdby->AdvancedSearch->toJson(), ","); // Field createdby
        $filterList = Concat($filterList, $this->createddatetime->AdvancedSearch->toJson(), ","); // Field createddatetime
        $filterList = Concat($filterList, $this->modifiedby->AdvancedSearch->toJson(), ","); // Field modifiedby
        $filterList = Concat($filterList, $this->modifieddatetime->AdvancedSearch->toJson(), ","); // Field modifieddatetime
        $filterList = Concat($filterList, $this->TreatmentStartDate->AdvancedSearch->toJson(), ","); // Field TreatmentStartDate
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
        $filterList = Concat($filterList, $this->status1->AdvancedSearch->toJson(), ","); // Field status1
        $filterList = Concat($filterList, $this->id1->AdvancedSearch->toJson(), ","); // Field id1
        $filterList = Concat($filterList, $this->Male->AdvancedSearch->toJson(), ","); // Field Male
        $filterList = Concat($filterList, $this->Female->AdvancedSearch->toJson(), ","); // Field Female
        $filterList = Concat($filterList, $this->malepropic->AdvancedSearch->toJson(), ","); // Field malepropic
        $filterList = Concat($filterList, $this->femalepropic->AdvancedSearch->toJson(), ","); // Field femalepropic
        $filterList = Concat($filterList, $this->HusbandEducation->AdvancedSearch->toJson(), ","); // Field HusbandEducation
        $filterList = Concat($filterList, $this->WifeEducation->AdvancedSearch->toJson(), ","); // Field WifeEducation
        $filterList = Concat($filterList, $this->HusbandWorkHours->AdvancedSearch->toJson(), ","); // Field HusbandWorkHours
        $filterList = Concat($filterList, $this->WifeWorkHours->AdvancedSearch->toJson(), ","); // Field WifeWorkHours
        $filterList = Concat($filterList, $this->PatientLanguage->AdvancedSearch->toJson(), ","); // Field PatientLanguage
        $filterList = Concat($filterList, $this->ReferedBy->AdvancedSearch->toJson(), ","); // Field ReferedBy
        $filterList = Concat($filterList, $this->ReferPhNo->AdvancedSearch->toJson(), ","); // Field ReferPhNo
        $filterList = Concat($filterList, $this->ARTCYCLE1->AdvancedSearch->toJson(), ","); // Field ARTCYCLE1
        $filterList = Concat($filterList, $this->RESULT1->AdvancedSearch->toJson(), ","); // Field RESULT1
        $filterList = Concat($filterList, $this->CoupleID->AdvancedSearch->toJson(), ","); // Field CoupleID
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_ivf_treatmentlistsrch", $filters);
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

        // Field TreatmentStartDate
        $this->TreatmentStartDate->AdvancedSearch->SearchValue = @$filter["x_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchOperator = @$filter["z_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchCondition = @$filter["v_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchValue2 = @$filter["y_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->SearchOperator2 = @$filter["w_TreatmentStartDate"];
        $this->TreatmentStartDate->AdvancedSearch->save();

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

        // Field status1
        $this->status1->AdvancedSearch->SearchValue = @$filter["x_status1"];
        $this->status1->AdvancedSearch->SearchOperator = @$filter["z_status1"];
        $this->status1->AdvancedSearch->SearchCondition = @$filter["v_status1"];
        $this->status1->AdvancedSearch->SearchValue2 = @$filter["y_status1"];
        $this->status1->AdvancedSearch->SearchOperator2 = @$filter["w_status1"];
        $this->status1->AdvancedSearch->save();

        // Field id1
        $this->id1->AdvancedSearch->SearchValue = @$filter["x_id1"];
        $this->id1->AdvancedSearch->SearchOperator = @$filter["z_id1"];
        $this->id1->AdvancedSearch->SearchCondition = @$filter["v_id1"];
        $this->id1->AdvancedSearch->SearchValue2 = @$filter["y_id1"];
        $this->id1->AdvancedSearch->SearchOperator2 = @$filter["w_id1"];
        $this->id1->AdvancedSearch->save();

        // Field Male
        $this->Male->AdvancedSearch->SearchValue = @$filter["x_Male"];
        $this->Male->AdvancedSearch->SearchOperator = @$filter["z_Male"];
        $this->Male->AdvancedSearch->SearchCondition = @$filter["v_Male"];
        $this->Male->AdvancedSearch->SearchValue2 = @$filter["y_Male"];
        $this->Male->AdvancedSearch->SearchOperator2 = @$filter["w_Male"];
        $this->Male->AdvancedSearch->save();

        // Field Female
        $this->Female->AdvancedSearch->SearchValue = @$filter["x_Female"];
        $this->Female->AdvancedSearch->SearchOperator = @$filter["z_Female"];
        $this->Female->AdvancedSearch->SearchCondition = @$filter["v_Female"];
        $this->Female->AdvancedSearch->SearchValue2 = @$filter["y_Female"];
        $this->Female->AdvancedSearch->SearchOperator2 = @$filter["w_Female"];
        $this->Female->AdvancedSearch->save();

        // Field malepropic
        $this->malepropic->AdvancedSearch->SearchValue = @$filter["x_malepropic"];
        $this->malepropic->AdvancedSearch->SearchOperator = @$filter["z_malepropic"];
        $this->malepropic->AdvancedSearch->SearchCondition = @$filter["v_malepropic"];
        $this->malepropic->AdvancedSearch->SearchValue2 = @$filter["y_malepropic"];
        $this->malepropic->AdvancedSearch->SearchOperator2 = @$filter["w_malepropic"];
        $this->malepropic->AdvancedSearch->save();

        // Field femalepropic
        $this->femalepropic->AdvancedSearch->SearchValue = @$filter["x_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchOperator = @$filter["z_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchCondition = @$filter["v_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchValue2 = @$filter["y_femalepropic"];
        $this->femalepropic->AdvancedSearch->SearchOperator2 = @$filter["w_femalepropic"];
        $this->femalepropic->AdvancedSearch->save();

        // Field HusbandEducation
        $this->HusbandEducation->AdvancedSearch->SearchValue = @$filter["x_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchOperator = @$filter["z_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchCondition = @$filter["v_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchValue2 = @$filter["y_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandEducation"];
        $this->HusbandEducation->AdvancedSearch->save();

        // Field WifeEducation
        $this->WifeEducation->AdvancedSearch->SearchValue = @$filter["x_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchOperator = @$filter["z_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchCondition = @$filter["v_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchValue2 = @$filter["y_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->SearchOperator2 = @$filter["w_WifeEducation"];
        $this->WifeEducation->AdvancedSearch->save();

        // Field HusbandWorkHours
        $this->HusbandWorkHours->AdvancedSearch->SearchValue = @$filter["x_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchOperator = @$filter["z_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchCondition = @$filter["v_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandWorkHours"];
        $this->HusbandWorkHours->AdvancedSearch->save();

        // Field WifeWorkHours
        $this->WifeWorkHours->AdvancedSearch->SearchValue = @$filter["x_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchOperator = @$filter["z_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchCondition = @$filter["v_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchValue2 = @$filter["y_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->SearchOperator2 = @$filter["w_WifeWorkHours"];
        $this->WifeWorkHours->AdvancedSearch->save();

        // Field PatientLanguage
        $this->PatientLanguage->AdvancedSearch->SearchValue = @$filter["x_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchOperator = @$filter["z_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchCondition = @$filter["v_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchValue2 = @$filter["y_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->SearchOperator2 = @$filter["w_PatientLanguage"];
        $this->PatientLanguage->AdvancedSearch->save();

        // Field ReferedBy
        $this->ReferedBy->AdvancedSearch->SearchValue = @$filter["x_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchOperator = @$filter["z_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchCondition = @$filter["v_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchValue2 = @$filter["y_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ReferedBy"];
        $this->ReferedBy->AdvancedSearch->save();

        // Field ReferPhNo
        $this->ReferPhNo->AdvancedSearch->SearchValue = @$filter["x_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchOperator = @$filter["z_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchCondition = @$filter["v_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchValue2 = @$filter["y_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->SearchOperator2 = @$filter["w_ReferPhNo"];
        $this->ReferPhNo->AdvancedSearch->save();

        // Field ARTCYCLE1
        $this->ARTCYCLE1->AdvancedSearch->SearchValue = @$filter["x_ARTCYCLE1"];
        $this->ARTCYCLE1->AdvancedSearch->SearchOperator = @$filter["z_ARTCYCLE1"];
        $this->ARTCYCLE1->AdvancedSearch->SearchCondition = @$filter["v_ARTCYCLE1"];
        $this->ARTCYCLE1->AdvancedSearch->SearchValue2 = @$filter["y_ARTCYCLE1"];
        $this->ARTCYCLE1->AdvancedSearch->SearchOperator2 = @$filter["w_ARTCYCLE1"];
        $this->ARTCYCLE1->AdvancedSearch->save();

        // Field RESULT1
        $this->RESULT1->AdvancedSearch->SearchValue = @$filter["x_RESULT1"];
        $this->RESULT1->AdvancedSearch->SearchOperator = @$filter["z_RESULT1"];
        $this->RESULT1->AdvancedSearch->SearchCondition = @$filter["v_RESULT1"];
        $this->RESULT1->AdvancedSearch->SearchValue2 = @$filter["y_RESULT1"];
        $this->RESULT1->AdvancedSearch->SearchOperator2 = @$filter["w_RESULT1"];
        $this->RESULT1->AdvancedSearch->save();

        // Field CoupleID
        $this->CoupleID->AdvancedSearch->SearchValue = @$filter["x_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator = @$filter["z_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchCondition = @$filter["v_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchValue2 = @$filter["y_CoupleID"];
        $this->CoupleID->AdvancedSearch->SearchOperator2 = @$filter["w_CoupleID"];
        $this->CoupleID->AdvancedSearch->save();

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
        $this->buildSearchSql($where, $this->RIDNO, $default, false); // RIDNO
        $this->buildSearchSql($where, $this->Name, $default, false); // Name
        $this->buildSearchSql($where, $this->Age, $default, false); // Age
        $this->buildSearchSql($where, $this->treatment_status, $default, false); // treatment_status
        $this->buildSearchSql($where, $this->ARTCYCLE, $default, false); // ARTCYCLE
        $this->buildSearchSql($where, $this->RESULT, $default, false); // RESULT
        $this->buildSearchSql($where, $this->status, $default, false); // status
        $this->buildSearchSql($where, $this->createdby, $default, false); // createdby
        $this->buildSearchSql($where, $this->createddatetime, $default, false); // createddatetime
        $this->buildSearchSql($where, $this->modifiedby, $default, false); // modifiedby
        $this->buildSearchSql($where, $this->modifieddatetime, $default, false); // modifieddatetime
        $this->buildSearchSql($where, $this->TreatmentStartDate, $default, false); // TreatmentStartDate
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
        $this->buildSearchSql($where, $this->status1, $default, false); // status1
        $this->buildSearchSql($where, $this->id1, $default, false); // id1
        $this->buildSearchSql($where, $this->Male, $default, false); // Male
        $this->buildSearchSql($where, $this->Female, $default, false); // Female
        $this->buildSearchSql($where, $this->malepropic, $default, false); // malepropic
        $this->buildSearchSql($where, $this->femalepropic, $default, false); // femalepropic
        $this->buildSearchSql($where, $this->HusbandEducation, $default, false); // HusbandEducation
        $this->buildSearchSql($where, $this->WifeEducation, $default, false); // WifeEducation
        $this->buildSearchSql($where, $this->HusbandWorkHours, $default, false); // HusbandWorkHours
        $this->buildSearchSql($where, $this->WifeWorkHours, $default, false); // WifeWorkHours
        $this->buildSearchSql($where, $this->PatientLanguage, $default, false); // PatientLanguage
        $this->buildSearchSql($where, $this->ReferedBy, $default, false); // ReferedBy
        $this->buildSearchSql($where, $this->ReferPhNo, $default, false); // ReferPhNo
        $this->buildSearchSql($where, $this->ARTCYCLE1, $default, false); // ARTCYCLE1
        $this->buildSearchSql($where, $this->RESULT1, $default, false); // RESULT1
        $this->buildSearchSql($where, $this->CoupleID, $default, false); // CoupleID
        $this->buildSearchSql($where, $this->HospID, $default, false); // HospID

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->RIDNO->AdvancedSearch->save(); // RIDNO
            $this->Name->AdvancedSearch->save(); // Name
            $this->Age->AdvancedSearch->save(); // Age
            $this->treatment_status->AdvancedSearch->save(); // treatment_status
            $this->ARTCYCLE->AdvancedSearch->save(); // ARTCYCLE
            $this->RESULT->AdvancedSearch->save(); // RESULT
            $this->status->AdvancedSearch->save(); // status
            $this->createdby->AdvancedSearch->save(); // createdby
            $this->createddatetime->AdvancedSearch->save(); // createddatetime
            $this->modifiedby->AdvancedSearch->save(); // modifiedby
            $this->modifieddatetime->AdvancedSearch->save(); // modifieddatetime
            $this->TreatmentStartDate->AdvancedSearch->save(); // TreatmentStartDate
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
            $this->status1->AdvancedSearch->save(); // status1
            $this->id1->AdvancedSearch->save(); // id1
            $this->Male->AdvancedSearch->save(); // Male
            $this->Female->AdvancedSearch->save(); // Female
            $this->malepropic->AdvancedSearch->save(); // malepropic
            $this->femalepropic->AdvancedSearch->save(); // femalepropic
            $this->HusbandEducation->AdvancedSearch->save(); // HusbandEducation
            $this->WifeEducation->AdvancedSearch->save(); // WifeEducation
            $this->HusbandWorkHours->AdvancedSearch->save(); // HusbandWorkHours
            $this->WifeWorkHours->AdvancedSearch->save(); // WifeWorkHours
            $this->PatientLanguage->AdvancedSearch->save(); // PatientLanguage
            $this->ReferedBy->AdvancedSearch->save(); // ReferedBy
            $this->ReferPhNo->AdvancedSearch->save(); // ReferPhNo
            $this->ARTCYCLE1->AdvancedSearch->save(); // ARTCYCLE1
            $this->RESULT1->AdvancedSearch->save(); // RESULT1
            $this->CoupleID->AdvancedSearch->save(); // CoupleID
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
        $this->buildBasicSearchSql($where, $this->malepropic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->femalepropic, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandEducation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeEducation, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandWorkHours, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->WifeWorkHours, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientLanguage, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ReferPhNo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ARTCYCLE1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RESULT1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CoupleID, $arKeywords, $type);
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
        if ($this->RIDNO->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Name->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Age->AdvancedSearch->issetSession()) {
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
        if ($this->TreatmentStartDate->AdvancedSearch->issetSession()) {
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
        if ($this->status1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->id1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Male->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Female->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->malepropic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->femalepropic->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandEducation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeEducation->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandWorkHours->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->WifeWorkHours->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientLanguage->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ReferPhNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ARTCYCLE1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RESULT1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CoupleID->AdvancedSearch->issetSession()) {
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
                $this->RIDNO->AdvancedSearch->unsetSession();
                $this->Name->AdvancedSearch->unsetSession();
                $this->Age->AdvancedSearch->unsetSession();
                $this->treatment_status->AdvancedSearch->unsetSession();
                $this->ARTCYCLE->AdvancedSearch->unsetSession();
                $this->RESULT->AdvancedSearch->unsetSession();
                $this->status->AdvancedSearch->unsetSession();
                $this->createdby->AdvancedSearch->unsetSession();
                $this->createddatetime->AdvancedSearch->unsetSession();
                $this->modifiedby->AdvancedSearch->unsetSession();
                $this->modifieddatetime->AdvancedSearch->unsetSession();
                $this->TreatmentStartDate->AdvancedSearch->unsetSession();
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
                $this->status1->AdvancedSearch->unsetSession();
                $this->id1->AdvancedSearch->unsetSession();
                $this->Male->AdvancedSearch->unsetSession();
                $this->Female->AdvancedSearch->unsetSession();
                $this->malepropic->AdvancedSearch->unsetSession();
                $this->femalepropic->AdvancedSearch->unsetSession();
                $this->HusbandEducation->AdvancedSearch->unsetSession();
                $this->WifeEducation->AdvancedSearch->unsetSession();
                $this->HusbandWorkHours->AdvancedSearch->unsetSession();
                $this->WifeWorkHours->AdvancedSearch->unsetSession();
                $this->PatientLanguage->AdvancedSearch->unsetSession();
                $this->ReferedBy->AdvancedSearch->unsetSession();
                $this->ReferPhNo->AdvancedSearch->unsetSession();
                $this->ARTCYCLE1->AdvancedSearch->unsetSession();
                $this->RESULT1->AdvancedSearch->unsetSession();
                $this->CoupleID->AdvancedSearch->unsetSession();
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
                $this->RIDNO->AdvancedSearch->load();
                $this->Name->AdvancedSearch->load();
                $this->Age->AdvancedSearch->load();
                $this->treatment_status->AdvancedSearch->load();
                $this->ARTCYCLE->AdvancedSearch->load();
                $this->RESULT->AdvancedSearch->load();
                $this->status->AdvancedSearch->load();
                $this->createdby->AdvancedSearch->load();
                $this->createddatetime->AdvancedSearch->load();
                $this->modifiedby->AdvancedSearch->load();
                $this->modifieddatetime->AdvancedSearch->load();
                $this->TreatmentStartDate->AdvancedSearch->load();
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
                $this->status1->AdvancedSearch->load();
                $this->id1->AdvancedSearch->load();
                $this->Male->AdvancedSearch->load();
                $this->Female->AdvancedSearch->load();
                $this->malepropic->AdvancedSearch->load();
                $this->femalepropic->AdvancedSearch->load();
                $this->HusbandEducation->AdvancedSearch->load();
                $this->WifeEducation->AdvancedSearch->load();
                $this->HusbandWorkHours->AdvancedSearch->load();
                $this->WifeWorkHours->AdvancedSearch->load();
                $this->PatientLanguage->AdvancedSearch->load();
                $this->ReferedBy->AdvancedSearch->load();
                $this->ReferPhNo->AdvancedSearch->load();
                $this->ARTCYCLE1->AdvancedSearch->load();
                $this->RESULT1->AdvancedSearch->load();
                $this->CoupleID->AdvancedSearch->load();
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
            $this->updateSort($this->RIDNO); // RIDNO
            $this->updateSort($this->Name); // Name
            $this->updateSort($this->Age); // Age
            $this->updateSort($this->treatment_status); // treatment_status
            $this->updateSort($this->ARTCYCLE); // ARTCYCLE
            $this->updateSort($this->RESULT); // RESULT
            $this->updateSort($this->status); // status
            $this->updateSort($this->createdby); // createdby
            $this->updateSort($this->createddatetime); // createddatetime
            $this->updateSort($this->modifiedby); // modifiedby
            $this->updateSort($this->modifieddatetime); // modifieddatetime
            $this->updateSort($this->TreatmentStartDate); // TreatmentStartDate
            $this->updateSort($this->TreatementStopDate); // TreatementStopDate
            $this->updateSort($this->TypePatient); // TypePatient
            $this->updateSort($this->Treatment); // Treatment
            $this->updateSort($this->TreatmentTec); // TreatmentTec
            $this->updateSort($this->TypeOfCycle); // TypeOfCycle
            $this->updateSort($this->SpermOrgin); // SpermOrgin
            $this->updateSort($this->State); // State
            $this->updateSort($this->Origin); // Origin
            $this->updateSort($this->MACS); // MACS
            $this->updateSort($this->Technique); // Technique
            $this->updateSort($this->PgdPlanning); // PgdPlanning
            $this->updateSort($this->IMSI); // IMSI
            $this->updateSort($this->SequentialCulture); // SequentialCulture
            $this->updateSort($this->TimeLapse); // TimeLapse
            $this->updateSort($this->AH); // AH
            $this->updateSort($this->Weight); // Weight
            $this->updateSort($this->BMI); // BMI
            $this->updateSort($this->Male); // Male
            $this->updateSort($this->Female); // Female
            $this->updateSort($this->malepropic); // malepropic
            $this->updateSort($this->femalepropic); // femalepropic
            $this->updateSort($this->HusbandEducation); // HusbandEducation
            $this->updateSort($this->WifeEducation); // WifeEducation
            $this->updateSort($this->HusbandWorkHours); // HusbandWorkHours
            $this->updateSort($this->WifeWorkHours); // WifeWorkHours
            $this->updateSort($this->PatientLanguage); // PatientLanguage
            $this->updateSort($this->ReferedBy); // ReferedBy
            $this->updateSort($this->ReferPhNo); // ReferPhNo
            $this->updateSort($this->ARTCYCLE1); // ARTCYCLE1
            $this->updateSort($this->RESULT1); // RESULT1
            $this->updateSort($this->CoupleID); // CoupleID
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

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
                $this->setSessionOrderByList($orderBy);
                $this->id->setSort("");
                $this->RIDNO->setSort("");
                $this->Name->setSort("");
                $this->Age->setSort("");
                $this->treatment_status->setSort("");
                $this->ARTCYCLE->setSort("");
                $this->RESULT->setSort("");
                $this->status->setSort("");
                $this->createdby->setSort("");
                $this->createddatetime->setSort("");
                $this->modifiedby->setSort("");
                $this->modifieddatetime->setSort("");
                $this->TreatmentStartDate->setSort("");
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
                $this->status1->setSort("");
                $this->id1->setSort("");
                $this->Male->setSort("");
                $this->Female->setSort("");
                $this->malepropic->setSort("");
                $this->femalepropic->setSort("");
                $this->HusbandEducation->setSort("");
                $this->WifeEducation->setSort("");
                $this->HusbandWorkHours->setSort("");
                $this->WifeWorkHours->setSort("");
                $this->PatientLanguage->setSort("");
                $this->ReferedBy->setSort("");
                $this->ReferPhNo->setSort("");
                $this->ARTCYCLE1->setSort("");
                $this->RESULT1->setSort("");
                $this->CoupleID->setSort("");
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

        // "detail_ivf_semenanalysisreport"
        $item = &$this->ListOptions->add("detail_ivf_semenanalysisreport");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // "detail_ivf_oocytedenudation"
        $item = &$this->ListOptions->add("detail_ivf_oocytedenudation");
        $item->CssClass = "text-nowrap";
        $item->Visible = $Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation') && !$this->ShowMultipleDetails;
        $item->OnLeft = true;
        $item->ShowInButtonGroup = false;

        // Multiple details
        if ($this->ShowMultipleDetails) {
            $item = &$this->ListOptions->add("details");
            $item->CssClass = "text-nowrap";
            $item->Visible = $this->ShowMultipleDetails;
            $item->OnLeft = true;
            $item->ShowInButtonGroup = false;
        }

        // Set up detail pages
        $pages = new SubPages();
        $pages->add("ivf_semenanalysisreport");
        $pages->add("ivf_oocytedenudation");
        $this->DetailPages = $pages;

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
        $detailViewTblVar = "";
        $detailCopyTblVar = "";
        $detailEditTblVar = "";

        // "detail_ivf_semenanalysisreport"
        $opt = $this->ListOptions["detail_ivf_semenanalysisreport"];
        if ($Security->allowList(CurrentProjectID() . 'ivf_semenanalysisreport')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("IvfSemenanalysisreportList?" . Config("TABLE_SHOW_MASTER") . "=view_ivf_treatment&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNO->CurrentValue) . "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("IvfSemenanalysisreportGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_ivf_treatment')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_semenanalysisreport");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "ivf_semenanalysisreport";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }

        // "detail_ivf_oocytedenudation"
        $opt = $this->ListOptions["detail_ivf_oocytedenudation"];
        if ($Security->allowList(CurrentProjectID() . 'ivf_oocytedenudation')) {
            $body = $Language->phrase("DetailLink") . $Language->TablePhrase("ivf_oocytedenudation", "TblCaption");
            $body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("IvfOocytedenudationList?" . Config("TABLE_SHOW_MASTER") . "=view_ivf_treatment&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNO->CurrentValue) . "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue) . "") . "\">" . $body . "</a>";
            $links = "";
            $detailPage = Container("IvfOocytedenudationGrid");
            if ($detailPage->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_ivf_treatment')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_oocytedenudation");
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
                if ($detailViewTblVar != "") {
                    $detailViewTblVar .= ",";
                }
                $detailViewTblVar .= "ivf_oocytedenudation";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
                $body .= "<ul class=\"dropdown-menu\">" . $links . "</ul>";
            }
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
            $opt->Body = $body;
            if ($this->ShowMultipleDetails) {
                $opt->Visible = false;
            }
        }
        if ($this->ShowMultipleDetails) {
            $body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
            $links = "";
            if ($detailViewTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
            }
            if ($detailEditTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
            }
            if ($detailCopyTblVar != "") {
                $links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
            }
            if ($links != "") {
                $body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
                $body .= "<ul class=\"dropdown-menu ew-menu\">" . $links . "</ul>";
            }
            $body .= "</div>";
            // Multiple details
            $opt = $this->ListOptions["details"];
            $opt->Body = $body;
        }

        // "checkbox"
        $opt = $this->ListOptions["checkbox"];
        $opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->id1->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_ivf_treatmentlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_ivf_treatmentlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_ivf_treatmentlist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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
        $links = "";
        $btngrps = "";
        $sqlwrk = "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`PatientName`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";

        // Column "detail_ivf_semenanalysisreport"
        if ($this->DetailPages && $this->DetailPages["ivf_semenanalysisreport"] && $this->DetailPages["ivf_semenanalysisreport"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_ivf_semenanalysisreport"];
            $url = "IvfSemenanalysisreportPreview?t=view_ivf_treatment&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'view_ivf_treatment')) {
                $label = $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_semenanalysisreport\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("IvfSemenanalysisreportList?" . Config("TABLE_SHOW_MASTER") . "=view_ivf_treatment&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNO->CurrentValue) . "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_semenanalysisreport", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("IvfSemenanalysisreportGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_ivf_treatment')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_semenanalysisreport");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }
        $sqlwrk = "`TidNo`=" . AdjustSql($this->id->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`RIDNo`=" . AdjustSql($this->RIDNO->CurrentValue, $this->Dbid) . "";
        $sqlwrk = $sqlwrk . " AND " . "`Name`='" . AdjustSql($this->Name->CurrentValue, $this->Dbid) . "'";

        // Column "detail_ivf_oocytedenudation"
        if ($this->DetailPages && $this->DetailPages["ivf_oocytedenudation"] && $this->DetailPages["ivf_oocytedenudation"]->Visible) {
            $link = "";
            $option = $this->ListOptions["detail_ivf_oocytedenudation"];
            $url = "IvfOocytedenudationPreview?t=view_ivf_treatment&f=" . Encrypt($sqlwrk);
            $btngrp = "<div data-table=\"ivf_oocytedenudation\" data-url=\"" . $url . "\" class=\"btn-group btn-group-sm\">";
            if ($Security->allowList(CurrentProjectID() . 'view_ivf_treatment')) {
                $label = $Language->TablePhrase("ivf_oocytedenudation", "TblCaption");
                $link = "<li class=\"nav-item\"><a href=\"#\" class=\"nav-link\" data-toggle=\"tab\" data-table=\"ivf_oocytedenudation\" data-url=\"" . $url . "\">" . $label . "</a></li>";
                $links .= $link;
                $detaillnk = JsEncodeAttribute("IvfOocytedenudationList?" . Config("TABLE_SHOW_MASTER") . "=view_ivf_treatment&" . GetForeignKeyUrl("fk_id", $this->id->CurrentValue) . "&" . GetForeignKeyUrl("fk_RIDNO", $this->RIDNO->CurrentValue) . "&" . GetForeignKeyUrl("fk_Name", $this->Name->CurrentValue) . "");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . $Language->TablePhrase("ivf_oocytedenudation", "TblCaption") . "\" onclick=\"window.location='" . $detaillnk . "';return false;\">" . $Language->phrase("MasterDetailListLink") . "</button>";
            }
            $detailPageObj = Container("IvfOocytedenudationGrid");
            if ($detailPageObj->DetailView && $Security->canView() && $Security->allowView(CurrentProjectID() . 'view_ivf_treatment')) {
                $caption = $Language->phrase("MasterDetailViewLink");
                $url = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=ivf_oocytedenudation");
                $btngrp .= "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlTitle($caption) . "\" onclick=\"window.location='" . HtmlEncode($url) . "';return false;\">" . $caption . "</button>";
            }
            $btngrp .= "</div>";
            if ($link != "") {
                $btngrps .= $btngrp;
                $option->Body .= "<div class=\"d-none ew-preview\">" . $link . $btngrp . "</div>";
            }
        }

        // Hide detail items if necessary
        $this->ListOptions->hideDetailItemsForDropDown();

        // Column "preview"
        $option = $this->ListOptions["preview"];
        if (!$option) { // Add preview column
            $option = &$this->ListOptions->add("preview");
            $option->OnLeft = true;
            if ($option->OnLeft) {
                $option->moveTo($this->ListOptions->itemPos("checkbox") + 1);
            } else {
                $option->moveTo($this->ListOptions->itemPos("checkbox"));
            }
            $option->Visible = !($this->isExport() || $this->isGridAdd() || $this->isGridEdit());
            $option->ShowInDropDown = false;
            $option->ShowInButtonGroup = false;
        }
        if ($option) {
            $option->Body = "<i class=\"ew-preview-row-btn ew-icon icon-expand\"></i>";
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }

        // Column "details" (Multiple details)
        $option = $this->ListOptions["details"];
        if ($option) {
            $option->Body .= "<div class=\"d-none ew-preview\">" . $links . $btngrps . "</div>";
            if ($option->Visible) {
                $option->Visible = $links != "";
            }
        }
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

        // TreatmentStartDate
        if (!$this->isAddOrEdit() && $this->TreatmentStartDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TreatmentStartDate->AdvancedSearch->SearchValue != "" || $this->TreatmentStartDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // status1
        if (!$this->isAddOrEdit() && $this->status1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->status1->AdvancedSearch->SearchValue != "" || $this->status1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // id1
        if (!$this->isAddOrEdit() && $this->id1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->id1->AdvancedSearch->SearchValue != "" || $this->id1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Male
        if (!$this->isAddOrEdit() && $this->Male->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Male->AdvancedSearch->SearchValue != "" || $this->Male->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Female
        if (!$this->isAddOrEdit() && $this->Female->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Female->AdvancedSearch->SearchValue != "" || $this->Female->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // malepropic
        if (!$this->isAddOrEdit() && $this->malepropic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->malepropic->AdvancedSearch->SearchValue != "" || $this->malepropic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // femalepropic
        if (!$this->isAddOrEdit() && $this->femalepropic->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->femalepropic->AdvancedSearch->SearchValue != "" || $this->femalepropic->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandEducation
        if (!$this->isAddOrEdit() && $this->HusbandEducation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandEducation->AdvancedSearch->SearchValue != "" || $this->HusbandEducation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeEducation
        if (!$this->isAddOrEdit() && $this->WifeEducation->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeEducation->AdvancedSearch->SearchValue != "" || $this->WifeEducation->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // HusbandWorkHours
        if (!$this->isAddOrEdit() && $this->HusbandWorkHours->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandWorkHours->AdvancedSearch->SearchValue != "" || $this->HusbandWorkHours->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // WifeWorkHours
        if (!$this->isAddOrEdit() && $this->WifeWorkHours->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->WifeWorkHours->AdvancedSearch->SearchValue != "" || $this->WifeWorkHours->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PatientLanguage
        if (!$this->isAddOrEdit() && $this->PatientLanguage->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PatientLanguage->AdvancedSearch->SearchValue != "" || $this->PatientLanguage->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferedBy
        if (!$this->isAddOrEdit() && $this->ReferedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferedBy->AdvancedSearch->SearchValue != "" || $this->ReferedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ReferPhNo
        if (!$this->isAddOrEdit() && $this->ReferPhNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ReferPhNo->AdvancedSearch->SearchValue != "" || $this->ReferPhNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ARTCYCLE1
        if (!$this->isAddOrEdit() && $this->ARTCYCLE1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ARTCYCLE1->AdvancedSearch->SearchValue != "" || $this->ARTCYCLE1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RESULT1
        if (!$this->isAddOrEdit() && $this->RESULT1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RESULT1->AdvancedSearch->SearchValue != "" || $this->RESULT1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->RIDNO->setDbValue($row['RIDNO']);
        $this->Name->setDbValue($row['Name']);
        $this->Age->setDbValue($row['Age']);
        $this->treatment_status->setDbValue($row['treatment_status']);
        $this->ARTCYCLE->setDbValue($row['ARTCYCLE']);
        $this->RESULT->setDbValue($row['RESULT']);
        $this->status->setDbValue($row['status']);
        $this->createdby->setDbValue($row['createdby']);
        $this->createddatetime->setDbValue($row['createddatetime']);
        $this->modifiedby->setDbValue($row['modifiedby']);
        $this->modifieddatetime->setDbValue($row['modifieddatetime']);
        $this->TreatmentStartDate->setDbValue($row['TreatmentStartDate']);
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
        $this->status1->setDbValue($row['status1']);
        $this->id1->setDbValue($row['id1']);
        $this->Male->setDbValue($row['Male']);
        if (array_key_exists('EV__Male', $row)) {
            $this->Male->VirtualValue = $row['EV__Male']; // Set up virtual field value
        } else {
            $this->Male->VirtualValue = ""; // Clear value
        }
        $this->Female->setDbValue($row['Female']);
        if (array_key_exists('EV__Female', $row)) {
            $this->Female->VirtualValue = $row['EV__Female']; // Set up virtual field value
        } else {
            $this->Female->VirtualValue = ""; // Clear value
        }
        $this->malepropic->Upload->DbValue = $row['malepropic'];
        $this->malepropic->setDbValue($this->malepropic->Upload->DbValue);
        $this->femalepropic->Upload->DbValue = $row['femalepropic'];
        $this->femalepropic->setDbValue($this->femalepropic->Upload->DbValue);
        $this->HusbandEducation->setDbValue($row['HusbandEducation']);
        $this->WifeEducation->setDbValue($row['WifeEducation']);
        $this->HusbandWorkHours->setDbValue($row['HusbandWorkHours']);
        $this->WifeWorkHours->setDbValue($row['WifeWorkHours']);
        $this->PatientLanguage->setDbValue($row['PatientLanguage']);
        $this->ReferedBy->setDbValue($row['ReferedBy']);
        if (array_key_exists('EV__ReferedBy', $row)) {
            $this->ReferedBy->VirtualValue = $row['EV__ReferedBy']; // Set up virtual field value
        } else {
            $this->ReferedBy->VirtualValue = ""; // Clear value
        }
        $this->ReferPhNo->setDbValue($row['ReferPhNo']);
        $this->ARTCYCLE1->setDbValue($row['ARTCYCLE1']);
        $this->RESULT1->setDbValue($row['RESULT1']);
        $this->CoupleID->setDbValue($row['CoupleID']);
        $this->HospID->setDbValue($row['HospID']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['RIDNO'] = null;
        $row['Name'] = null;
        $row['Age'] = null;
        $row['treatment_status'] = null;
        $row['ARTCYCLE'] = null;
        $row['RESULT'] = null;
        $row['status'] = null;
        $row['createdby'] = null;
        $row['createddatetime'] = null;
        $row['modifiedby'] = null;
        $row['modifieddatetime'] = null;
        $row['TreatmentStartDate'] = null;
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
        $row['status1'] = null;
        $row['id1'] = null;
        $row['Male'] = null;
        $row['Female'] = null;
        $row['malepropic'] = null;
        $row['femalepropic'] = null;
        $row['HusbandEducation'] = null;
        $row['WifeEducation'] = null;
        $row['HusbandWorkHours'] = null;
        $row['WifeWorkHours'] = null;
        $row['PatientLanguage'] = null;
        $row['ReferedBy'] = null;
        $row['ReferPhNo'] = null;
        $row['ARTCYCLE1'] = null;
        $row['RESULT1'] = null;
        $row['CoupleID'] = null;
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

        // RIDNO

        // Name

        // Age

        // treatment_status

        // ARTCYCLE

        // RESULT

        // status

        // createdby

        // createddatetime

        // modifiedby

        // modifieddatetime

        // TreatmentStartDate

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

        // status1

        // id1

        // Male

        // Female

        // malepropic

        // femalepropic

        // HusbandEducation

        // WifeEducation

        // HusbandWorkHours

        // WifeWorkHours

        // PatientLanguage

        // ReferedBy

        // ReferPhNo

        // ARTCYCLE1

        // RESULT1

        // CoupleID

        // HospID
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

            // treatment_status
            $this->treatment_status->ViewValue = $this->treatment_status->CurrentValue;
            $this->treatment_status->ViewCustomAttributes = "";

            // ARTCYCLE
            $this->ARTCYCLE->ViewValue = $this->ARTCYCLE->CurrentValue;
            $this->ARTCYCLE->ViewCustomAttributes = "";

            // RESULT
            $this->RESULT->ViewValue = $this->RESULT->CurrentValue;
            $this->RESULT->ViewCustomAttributes = "";

            // status
            $this->status->ViewValue = $this->status->CurrentValue;
            $this->status->ViewValue = FormatNumber($this->status->ViewValue, 0, -2, -2, -2);
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

            // TreatmentStartDate
            $this->TreatmentStartDate->ViewValue = $this->TreatmentStartDate->CurrentValue;
            $this->TreatmentStartDate->ViewValue = FormatDateTime($this->TreatmentStartDate->ViewValue, 0);
            $this->TreatmentStartDate->ViewCustomAttributes = "";

            // TreatementStopDate
            $this->TreatementStopDate->ViewValue = $this->TreatementStopDate->CurrentValue;
            $this->TreatementStopDate->ViewValue = FormatDateTime($this->TreatementStopDate->ViewValue, 0);
            $this->TreatementStopDate->ViewCustomAttributes = "";

            // TypePatient
            $this->TypePatient->ViewValue = $this->TypePatient->CurrentValue;
            $this->TypePatient->ViewCustomAttributes = "";

            // Treatment
            $this->Treatment->ViewValue = $this->Treatment->CurrentValue;
            $this->Treatment->ViewCustomAttributes = "";

            // TreatmentTec
            $this->TreatmentTec->ViewValue = $this->TreatmentTec->CurrentValue;
            $this->TreatmentTec->ViewCustomAttributes = "";

            // TypeOfCycle
            $this->TypeOfCycle->ViewValue = $this->TypeOfCycle->CurrentValue;
            $this->TypeOfCycle->ViewCustomAttributes = "";

            // SpermOrgin
            $this->SpermOrgin->ViewValue = $this->SpermOrgin->CurrentValue;
            $this->SpermOrgin->ViewCustomAttributes = "";

            // State
            $this->State->ViewValue = $this->State->CurrentValue;
            $this->State->ViewCustomAttributes = "";

            // Origin
            $this->Origin->ViewValue = $this->Origin->CurrentValue;
            $this->Origin->ViewCustomAttributes = "";

            // MACS
            $this->MACS->ViewValue = $this->MACS->CurrentValue;
            $this->MACS->ViewCustomAttributes = "";

            // Technique
            $this->Technique->ViewValue = $this->Technique->CurrentValue;
            $this->Technique->ViewCustomAttributes = "";

            // PgdPlanning
            $this->PgdPlanning->ViewValue = $this->PgdPlanning->CurrentValue;
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

            // status1
            $curVal = trim(strval($this->status1->CurrentValue));
            if ($curVal != "") {
                $this->status1->ViewValue = $this->status1->lookupCacheOption($curVal);
                if ($this->status1->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->status1->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->status1->Lookup->renderViewRow($rswrk[0]);
                        $this->status1->ViewValue = $this->status1->displayValue($arwrk);
                    } else {
                        $this->status1->ViewValue = $this->status1->CurrentValue;
                    }
                }
            } else {
                $this->status1->ViewValue = null;
            }
            $this->status1->ViewCustomAttributes = "";

            // id1
            $this->id1->ViewValue = $this->id1->CurrentValue;
            $this->id1->ViewCustomAttributes = "";

            // Male
            if ($this->Male->VirtualValue != "") {
                $this->Male->ViewValue = $this->Male->VirtualValue;
            } else {
                $curVal = trim(strval($this->Male->CurrentValue));
                if ($curVal != "") {
                    $this->Male->ViewValue = $this->Male->lookupCacheOption($curVal);
                    if ($this->Male->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Male->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Male->Lookup->renderViewRow($rswrk[0]);
                            $this->Male->ViewValue = $this->Male->displayValue($arwrk);
                        } else {
                            $this->Male->ViewValue = $this->Male->CurrentValue;
                        }
                    }
                } else {
                    $this->Male->ViewValue = null;
                }
            }
            $this->Male->ViewCustomAttributes = "";

            // Female
            if ($this->Female->VirtualValue != "") {
                $this->Female->ViewValue = $this->Female->VirtualValue;
            } else {
                $curVal = trim(strval($this->Female->CurrentValue));
                if ($curVal != "") {
                    $this->Female->ViewValue = $this->Female->lookupCacheOption($curVal);
                    if ($this->Female->ViewValue === null) { // Lookup from database
                        $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                        $sqlWrk = $this->Female->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->Female->Lookup->renderViewRow($rswrk[0]);
                            $this->Female->ViewValue = $this->Female->displayValue($arwrk);
                        } else {
                            $this->Female->ViewValue = $this->Female->CurrentValue;
                        }
                    }
                } else {
                    $this->Female->ViewValue = null;
                }
            }
            $this->Female->ViewCustomAttributes = "";

            // malepropic
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->ImageWidth = 80;
                $this->malepropic->ImageHeight = 80;
                $this->malepropic->ImageAlt = $this->malepropic->alt();
                $this->malepropic->ViewValue = $this->malepropic->Upload->DbValue;
            } else {
                $this->malepropic->ViewValue = "";
            }
            $this->malepropic->ViewCustomAttributes = "";

            // femalepropic
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->ImageWidth = 80;
                $this->femalepropic->ImageHeight = 80;
                $this->femalepropic->ImageAlt = $this->femalepropic->alt();
                $this->femalepropic->ViewValue = $this->femalepropic->Upload->DbValue;
            } else {
                $this->femalepropic->ViewValue = "";
            }
            $this->femalepropic->ViewCustomAttributes = "";

            // HusbandEducation
            $this->HusbandEducation->ViewValue = $this->HusbandEducation->CurrentValue;
            $this->HusbandEducation->ViewCustomAttributes = "";

            // WifeEducation
            $this->WifeEducation->ViewValue = $this->WifeEducation->CurrentValue;
            $this->WifeEducation->ViewCustomAttributes = "";

            // HusbandWorkHours
            $this->HusbandWorkHours->ViewValue = $this->HusbandWorkHours->CurrentValue;
            $this->HusbandWorkHours->ViewCustomAttributes = "";

            // WifeWorkHours
            $this->WifeWorkHours->ViewValue = $this->WifeWorkHours->CurrentValue;
            $this->WifeWorkHours->ViewCustomAttributes = "";

            // PatientLanguage
            $this->PatientLanguage->ViewValue = $this->PatientLanguage->CurrentValue;
            $this->PatientLanguage->ViewCustomAttributes = "";

            // ReferedBy
            if ($this->ReferedBy->VirtualValue != "") {
                $this->ReferedBy->ViewValue = $this->ReferedBy->VirtualValue;
            } else {
                $curVal = trim(strval($this->ReferedBy->CurrentValue));
                if ($curVal != "") {
                    $this->ReferedBy->ViewValue = $this->ReferedBy->lookupCacheOption($curVal);
                    if ($this->ReferedBy->ViewValue === null) { // Lookup from database
                        $filterWrk = "`reference`" . SearchString("=", $curVal, DATATYPE_STRING, "");
                        $sqlWrk = $this->ReferedBy->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                        $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                        $ari = count($rswrk);
                        if ($ari > 0) { // Lookup values found
                            $arwrk = $this->ReferedBy->Lookup->renderViewRow($rswrk[0]);
                            $this->ReferedBy->ViewValue = $this->ReferedBy->displayValue($arwrk);
                        } else {
                            $this->ReferedBy->ViewValue = $this->ReferedBy->CurrentValue;
                        }
                    }
                } else {
                    $this->ReferedBy->ViewValue = null;
                }
            }
            $this->ReferedBy->ViewCustomAttributes = "";

            // ReferPhNo
            $this->ReferPhNo->ViewValue = $this->ReferPhNo->CurrentValue;
            $this->ReferPhNo->ViewCustomAttributes = "";

            // ARTCYCLE1
            if (strval($this->ARTCYCLE1->CurrentValue) != "") {
                $this->ARTCYCLE1->ViewValue = $this->ARTCYCLE1->optionCaption($this->ARTCYCLE1->CurrentValue);
            } else {
                $this->ARTCYCLE1->ViewValue = null;
            }
            $this->ARTCYCLE1->ViewCustomAttributes = "";

            // RESULT1
            if (strval($this->RESULT1->CurrentValue) != "") {
                $this->RESULT1->ViewValue = $this->RESULT1->optionCaption($this->RESULT1->CurrentValue);
            } else {
                $this->RESULT1->ViewValue = null;
            }
            $this->RESULT1->ViewCustomAttributes = "";

            // CoupleID
            $this->CoupleID->ViewValue = $this->CoupleID->CurrentValue;
            $this->CoupleID->ViewCustomAttributes = "";

            // HospID
            $this->HospID->ViewValue = $this->HospID->CurrentValue;
            $this->HospID->ViewValue = FormatNumber($this->HospID->ViewValue, 0, -2, -2, -2);
            $this->HospID->ViewCustomAttributes = "";

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
            if (!$this->isExport()) {
                $this->Name->ViewValue = $this->highlightValue($this->Name);
            }

            // Age
            $this->Age->LinkCustomAttributes = "";
            $this->Age->HrefValue = "";
            $this->Age->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Age->ViewValue = $this->highlightValue($this->Age);
            }

            // treatment_status
            $this->treatment_status->LinkCustomAttributes = "";
            $this->treatment_status->HrefValue = "";
            $this->treatment_status->TooltipValue = "";
            if (!$this->isExport()) {
                $this->treatment_status->ViewValue = $this->highlightValue($this->treatment_status);
            }

            // ARTCYCLE
            $this->ARTCYCLE->LinkCustomAttributes = "";
            $this->ARTCYCLE->HrefValue = "";
            $this->ARTCYCLE->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ARTCYCLE->ViewValue = $this->highlightValue($this->ARTCYCLE);
            }

            // RESULT
            $this->RESULT->LinkCustomAttributes = "";
            $this->RESULT->HrefValue = "";
            $this->RESULT->TooltipValue = "";
            if (!$this->isExport()) {
                $this->RESULT->ViewValue = $this->highlightValue($this->RESULT);
            }

            // status
            $this->status->LinkCustomAttributes = "";
            $this->status->HrefValue = "";
            $this->status->TooltipValue = "";

            // createdby
            $this->createdby->LinkCustomAttributes = "";
            $this->createdby->HrefValue = "";
            $this->createdby->TooltipValue = "";

            // createddatetime
            $this->createddatetime->LinkCustomAttributes = "";
            $this->createddatetime->HrefValue = "";
            $this->createddatetime->TooltipValue = "";

            // modifiedby
            $this->modifiedby->LinkCustomAttributes = "";
            $this->modifiedby->HrefValue = "";
            $this->modifiedby->TooltipValue = "";

            // modifieddatetime
            $this->modifieddatetime->LinkCustomAttributes = "";
            $this->modifieddatetime->HrefValue = "";
            $this->modifieddatetime->TooltipValue = "";

            // TreatmentStartDate
            $this->TreatmentStartDate->LinkCustomAttributes = "";
            $this->TreatmentStartDate->HrefValue = "";
            $this->TreatmentStartDate->TooltipValue = "";

            // TreatementStopDate
            $this->TreatementStopDate->LinkCustomAttributes = "";
            $this->TreatementStopDate->HrefValue = "";
            $this->TreatementStopDate->TooltipValue = "";

            // TypePatient
            $this->TypePatient->LinkCustomAttributes = "";
            $this->TypePatient->HrefValue = "";
            $this->TypePatient->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TypePatient->ViewValue = $this->highlightValue($this->TypePatient);
            }

            // Treatment
            $this->Treatment->LinkCustomAttributes = "";
            $this->Treatment->HrefValue = "";
            $this->Treatment->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Treatment->ViewValue = $this->highlightValue($this->Treatment);
            }

            // TreatmentTec
            $this->TreatmentTec->LinkCustomAttributes = "";
            $this->TreatmentTec->HrefValue = "";
            $this->TreatmentTec->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TreatmentTec->ViewValue = $this->highlightValue($this->TreatmentTec);
            }

            // TypeOfCycle
            $this->TypeOfCycle->LinkCustomAttributes = "";
            $this->TypeOfCycle->HrefValue = "";
            $this->TypeOfCycle->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TypeOfCycle->ViewValue = $this->highlightValue($this->TypeOfCycle);
            }

            // SpermOrgin
            $this->SpermOrgin->LinkCustomAttributes = "";
            $this->SpermOrgin->HrefValue = "";
            $this->SpermOrgin->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SpermOrgin->ViewValue = $this->highlightValue($this->SpermOrgin);
            }

            // State
            $this->State->LinkCustomAttributes = "";
            $this->State->HrefValue = "";
            $this->State->TooltipValue = "";
            if (!$this->isExport()) {
                $this->State->ViewValue = $this->highlightValue($this->State);
            }

            // Origin
            $this->Origin->LinkCustomAttributes = "";
            $this->Origin->HrefValue = "";
            $this->Origin->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Origin->ViewValue = $this->highlightValue($this->Origin);
            }

            // MACS
            $this->MACS->LinkCustomAttributes = "";
            $this->MACS->HrefValue = "";
            $this->MACS->TooltipValue = "";
            if (!$this->isExport()) {
                $this->MACS->ViewValue = $this->highlightValue($this->MACS);
            }

            // Technique
            $this->Technique->LinkCustomAttributes = "";
            $this->Technique->HrefValue = "";
            $this->Technique->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Technique->ViewValue = $this->highlightValue($this->Technique);
            }

            // PgdPlanning
            $this->PgdPlanning->LinkCustomAttributes = "";
            $this->PgdPlanning->HrefValue = "";
            $this->PgdPlanning->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PgdPlanning->ViewValue = $this->highlightValue($this->PgdPlanning);
            }

            // IMSI
            $this->IMSI->LinkCustomAttributes = "";
            $this->IMSI->HrefValue = "";
            $this->IMSI->TooltipValue = "";
            if (!$this->isExport()) {
                $this->IMSI->ViewValue = $this->highlightValue($this->IMSI);
            }

            // SequentialCulture
            $this->SequentialCulture->LinkCustomAttributes = "";
            $this->SequentialCulture->HrefValue = "";
            $this->SequentialCulture->TooltipValue = "";
            if (!$this->isExport()) {
                $this->SequentialCulture->ViewValue = $this->highlightValue($this->SequentialCulture);
            }

            // TimeLapse
            $this->TimeLapse->LinkCustomAttributes = "";
            $this->TimeLapse->HrefValue = "";
            $this->TimeLapse->TooltipValue = "";
            if (!$this->isExport()) {
                $this->TimeLapse->ViewValue = $this->highlightValue($this->TimeLapse);
            }

            // AH
            $this->AH->LinkCustomAttributes = "";
            $this->AH->HrefValue = "";
            $this->AH->TooltipValue = "";
            if (!$this->isExport()) {
                $this->AH->ViewValue = $this->highlightValue($this->AH);
            }

            // Weight
            $this->Weight->LinkCustomAttributes = "";
            $this->Weight->HrefValue = "";
            $this->Weight->TooltipValue = "";
            if (!$this->isExport()) {
                $this->Weight->ViewValue = $this->highlightValue($this->Weight);
            }

            // BMI
            $this->BMI->LinkCustomAttributes = "";
            $this->BMI->HrefValue = "";
            $this->BMI->TooltipValue = "";
            if (!$this->isExport()) {
                $this->BMI->ViewValue = $this->highlightValue($this->BMI);
            }

            // Male
            $this->Male->LinkCustomAttributes = "";
            $this->Male->HrefValue = "";
            $this->Male->TooltipValue = "";

            // Female
            $this->Female->LinkCustomAttributes = "";
            $this->Female->HrefValue = "";
            $this->Female->TooltipValue = "";

            // malepropic
            $this->malepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->malepropic->Upload->DbValue)) {
                $this->malepropic->HrefValue = GetFileUploadUrl($this->malepropic, $this->malepropic->htmlDecode($this->malepropic->Upload->DbValue)); // Add prefix/suffix
                $this->malepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->malepropic->HrefValue = FullUrl($this->malepropic->HrefValue, "href");
                }
            } else {
                $this->malepropic->HrefValue = "";
            }
            $this->malepropic->ExportHrefValue = $this->malepropic->UploadPath . $this->malepropic->Upload->DbValue;
            $this->malepropic->TooltipValue = "";
            if ($this->malepropic->UseColorbox) {
                if (EmptyValue($this->malepropic->TooltipValue)) {
                    $this->malepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->malepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x" . $this->RowCount . "_malepropic";
                $this->malepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // femalepropic
            $this->femalepropic->LinkCustomAttributes = "";
            if (!EmptyValue($this->femalepropic->Upload->DbValue)) {
                $this->femalepropic->HrefValue = GetFileUploadUrl($this->femalepropic, $this->femalepropic->htmlDecode($this->femalepropic->Upload->DbValue)); // Add prefix/suffix
                $this->femalepropic->LinkAttrs["target"] = ""; // Add target
                if ($this->isExport()) {
                    $this->femalepropic->HrefValue = FullUrl($this->femalepropic->HrefValue, "href");
                }
            } else {
                $this->femalepropic->HrefValue = "";
            }
            $this->femalepropic->ExportHrefValue = $this->femalepropic->UploadPath . $this->femalepropic->Upload->DbValue;
            $this->femalepropic->TooltipValue = "";
            if ($this->femalepropic->UseColorbox) {
                if (EmptyValue($this->femalepropic->TooltipValue)) {
                    $this->femalepropic->LinkAttrs["title"] = $Language->phrase("ViewImageGallery");
                }
                $this->femalepropic->LinkAttrs["data-rel"] = "view_ivf_treatment_x" . $this->RowCount . "_femalepropic";
                $this->femalepropic->LinkAttrs->appendClass("ew-lightbox");
            }

            // HusbandEducation
            $this->HusbandEducation->LinkCustomAttributes = "";
            $this->HusbandEducation->HrefValue = "";
            $this->HusbandEducation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandEducation->ViewValue = $this->highlightValue($this->HusbandEducation);
            }

            // WifeEducation
            $this->WifeEducation->LinkCustomAttributes = "";
            $this->WifeEducation->HrefValue = "";
            $this->WifeEducation->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeEducation->ViewValue = $this->highlightValue($this->WifeEducation);
            }

            // HusbandWorkHours
            $this->HusbandWorkHours->LinkCustomAttributes = "";
            $this->HusbandWorkHours->HrefValue = "";
            $this->HusbandWorkHours->TooltipValue = "";
            if (!$this->isExport()) {
                $this->HusbandWorkHours->ViewValue = $this->highlightValue($this->HusbandWorkHours);
            }

            // WifeWorkHours
            $this->WifeWorkHours->LinkCustomAttributes = "";
            $this->WifeWorkHours->HrefValue = "";
            $this->WifeWorkHours->TooltipValue = "";
            if (!$this->isExport()) {
                $this->WifeWorkHours->ViewValue = $this->highlightValue($this->WifeWorkHours);
            }

            // PatientLanguage
            $this->PatientLanguage->LinkCustomAttributes = "";
            $this->PatientLanguage->HrefValue = "";
            $this->PatientLanguage->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PatientLanguage->ViewValue = $this->highlightValue($this->PatientLanguage);
            }

            // ReferedBy
            $this->ReferedBy->LinkCustomAttributes = "";
            $this->ReferedBy->HrefValue = "";
            $this->ReferedBy->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferedBy->ViewValue = $this->highlightValue($this->ReferedBy);
            }

            // ReferPhNo
            $this->ReferPhNo->LinkCustomAttributes = "";
            $this->ReferPhNo->HrefValue = "";
            $this->ReferPhNo->TooltipValue = "";
            if (!$this->isExport()) {
                $this->ReferPhNo->ViewValue = $this->highlightValue($this->ReferPhNo);
            }

            // ARTCYCLE1
            $this->ARTCYCLE1->LinkCustomAttributes = "";
            $this->ARTCYCLE1->HrefValue = "";
            $this->ARTCYCLE1->TooltipValue = "";

            // RESULT1
            $this->RESULT1->LinkCustomAttributes = "";
            $this->RESULT1->HrefValue = "";
            $this->RESULT1->TooltipValue = "";

            // CoupleID
            $this->CoupleID->LinkCustomAttributes = "";
            $this->CoupleID->HrefValue = "";
            $this->CoupleID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->CoupleID->ViewValue = $this->highlightValue($this->CoupleID);
            }

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

            // RIDNO
            $this->RIDNO->EditAttrs["class"] = "form-control";
            $this->RIDNO->EditCustomAttributes = "";
            $this->RIDNO->EditValue = HtmlEncode($this->RIDNO->AdvancedSearch->SearchValue);
            $this->RIDNO->PlaceHolder = RemoveHtml($this->RIDNO->caption());

            // Name
            $this->Name->EditAttrs["class"] = "form-control";
            $this->Name->EditCustomAttributes = "";
            if (!$this->Name->Raw) {
                $this->Name->AdvancedSearch->SearchValue = HtmlDecode($this->Name->AdvancedSearch->SearchValue);
            }
            $this->Name->EditValue = HtmlEncode($this->Name->AdvancedSearch->SearchValue);
            $this->Name->PlaceHolder = RemoveHtml($this->Name->caption());

            // Age
            $this->Age->EditAttrs["class"] = "form-control";
            $this->Age->EditCustomAttributes = "";
            if (!$this->Age->Raw) {
                $this->Age->AdvancedSearch->SearchValue = HtmlDecode($this->Age->AdvancedSearch->SearchValue);
            }
            $this->Age->EditValue = HtmlEncode($this->Age->AdvancedSearch->SearchValue);
            $this->Age->PlaceHolder = RemoveHtml($this->Age->caption());

            // treatment_status
            $this->treatment_status->EditAttrs["class"] = "form-control";
            $this->treatment_status->EditCustomAttributes = "";
            if (!$this->treatment_status->Raw) {
                $this->treatment_status->AdvancedSearch->SearchValue = HtmlDecode($this->treatment_status->AdvancedSearch->SearchValue);
            }
            $this->treatment_status->EditValue = HtmlEncode($this->treatment_status->AdvancedSearch->SearchValue);
            $this->treatment_status->PlaceHolder = RemoveHtml($this->treatment_status->caption());

            // ARTCYCLE
            $this->ARTCYCLE->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE->EditCustomAttributes = "";
            if (!$this->ARTCYCLE->Raw) {
                $this->ARTCYCLE->AdvancedSearch->SearchValue = HtmlDecode($this->ARTCYCLE->AdvancedSearch->SearchValue);
            }
            $this->ARTCYCLE->EditValue = HtmlEncode($this->ARTCYCLE->AdvancedSearch->SearchValue);
            $this->ARTCYCLE->PlaceHolder = RemoveHtml($this->ARTCYCLE->caption());

            // RESULT
            $this->RESULT->EditAttrs["class"] = "form-control";
            $this->RESULT->EditCustomAttributes = "";
            if (!$this->RESULT->Raw) {
                $this->RESULT->AdvancedSearch->SearchValue = HtmlDecode($this->RESULT->AdvancedSearch->SearchValue);
            }
            $this->RESULT->EditValue = HtmlEncode($this->RESULT->AdvancedSearch->SearchValue);
            $this->RESULT->PlaceHolder = RemoveHtml($this->RESULT->caption());

            // status
            $this->status->EditAttrs["class"] = "form-control";
            $this->status->EditCustomAttributes = "";
            $this->status->EditValue = HtmlEncode($this->status->AdvancedSearch->SearchValue);
            $this->status->PlaceHolder = RemoveHtml($this->status->caption());

            // createdby
            $this->createdby->EditAttrs["class"] = "form-control";
            $this->createdby->EditCustomAttributes = "";
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
            $this->modifiedby->EditValue = HtmlEncode($this->modifiedby->AdvancedSearch->SearchValue);
            $this->modifiedby->PlaceHolder = RemoveHtml($this->modifiedby->caption());

            // modifieddatetime
            $this->modifieddatetime->EditAttrs["class"] = "form-control";
            $this->modifieddatetime->EditCustomAttributes = "";
            $this->modifieddatetime->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->modifieddatetime->AdvancedSearch->SearchValue, 0), 8));
            $this->modifieddatetime->PlaceHolder = RemoveHtml($this->modifieddatetime->caption());

            // TreatmentStartDate
            $this->TreatmentStartDate->EditAttrs["class"] = "form-control";
            $this->TreatmentStartDate->EditCustomAttributes = "";
            $this->TreatmentStartDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TreatmentStartDate->AdvancedSearch->SearchValue, 0), 8));
            $this->TreatmentStartDate->PlaceHolder = RemoveHtml($this->TreatmentStartDate->caption());

            // TreatementStopDate
            $this->TreatementStopDate->EditAttrs["class"] = "form-control";
            $this->TreatementStopDate->EditCustomAttributes = "";
            $this->TreatementStopDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TreatementStopDate->AdvancedSearch->SearchValue, 0), 8));
            $this->TreatementStopDate->PlaceHolder = RemoveHtml($this->TreatementStopDate->caption());

            // TypePatient
            $this->TypePatient->EditAttrs["class"] = "form-control";
            $this->TypePatient->EditCustomAttributes = "";
            if (!$this->TypePatient->Raw) {
                $this->TypePatient->AdvancedSearch->SearchValue = HtmlDecode($this->TypePatient->AdvancedSearch->SearchValue);
            }
            $this->TypePatient->EditValue = HtmlEncode($this->TypePatient->AdvancedSearch->SearchValue);
            $this->TypePatient->PlaceHolder = RemoveHtml($this->TypePatient->caption());

            // Treatment
            $this->Treatment->EditAttrs["class"] = "form-control";
            $this->Treatment->EditCustomAttributes = "";
            if (!$this->Treatment->Raw) {
                $this->Treatment->AdvancedSearch->SearchValue = HtmlDecode($this->Treatment->AdvancedSearch->SearchValue);
            }
            $this->Treatment->EditValue = HtmlEncode($this->Treatment->AdvancedSearch->SearchValue);
            $this->Treatment->PlaceHolder = RemoveHtml($this->Treatment->caption());

            // TreatmentTec
            $this->TreatmentTec->EditAttrs["class"] = "form-control";
            $this->TreatmentTec->EditCustomAttributes = "";
            if (!$this->TreatmentTec->Raw) {
                $this->TreatmentTec->AdvancedSearch->SearchValue = HtmlDecode($this->TreatmentTec->AdvancedSearch->SearchValue);
            }
            $this->TreatmentTec->EditValue = HtmlEncode($this->TreatmentTec->AdvancedSearch->SearchValue);
            $this->TreatmentTec->PlaceHolder = RemoveHtml($this->TreatmentTec->caption());

            // TypeOfCycle
            $this->TypeOfCycle->EditAttrs["class"] = "form-control";
            $this->TypeOfCycle->EditCustomAttributes = "";
            if (!$this->TypeOfCycle->Raw) {
                $this->TypeOfCycle->AdvancedSearch->SearchValue = HtmlDecode($this->TypeOfCycle->AdvancedSearch->SearchValue);
            }
            $this->TypeOfCycle->EditValue = HtmlEncode($this->TypeOfCycle->AdvancedSearch->SearchValue);
            $this->TypeOfCycle->PlaceHolder = RemoveHtml($this->TypeOfCycle->caption());

            // SpermOrgin
            $this->SpermOrgin->EditAttrs["class"] = "form-control";
            $this->SpermOrgin->EditCustomAttributes = "";
            if (!$this->SpermOrgin->Raw) {
                $this->SpermOrgin->AdvancedSearch->SearchValue = HtmlDecode($this->SpermOrgin->AdvancedSearch->SearchValue);
            }
            $this->SpermOrgin->EditValue = HtmlEncode($this->SpermOrgin->AdvancedSearch->SearchValue);
            $this->SpermOrgin->PlaceHolder = RemoveHtml($this->SpermOrgin->caption());

            // State
            $this->State->EditAttrs["class"] = "form-control";
            $this->State->EditCustomAttributes = "";
            if (!$this->State->Raw) {
                $this->State->AdvancedSearch->SearchValue = HtmlDecode($this->State->AdvancedSearch->SearchValue);
            }
            $this->State->EditValue = HtmlEncode($this->State->AdvancedSearch->SearchValue);
            $this->State->PlaceHolder = RemoveHtml($this->State->caption());

            // Origin
            $this->Origin->EditAttrs["class"] = "form-control";
            $this->Origin->EditCustomAttributes = "";
            if (!$this->Origin->Raw) {
                $this->Origin->AdvancedSearch->SearchValue = HtmlDecode($this->Origin->AdvancedSearch->SearchValue);
            }
            $this->Origin->EditValue = HtmlEncode($this->Origin->AdvancedSearch->SearchValue);
            $this->Origin->PlaceHolder = RemoveHtml($this->Origin->caption());

            // MACS
            $this->MACS->EditAttrs["class"] = "form-control";
            $this->MACS->EditCustomAttributes = "";
            if (!$this->MACS->Raw) {
                $this->MACS->AdvancedSearch->SearchValue = HtmlDecode($this->MACS->AdvancedSearch->SearchValue);
            }
            $this->MACS->EditValue = HtmlEncode($this->MACS->AdvancedSearch->SearchValue);
            $this->MACS->PlaceHolder = RemoveHtml($this->MACS->caption());

            // Technique
            $this->Technique->EditAttrs["class"] = "form-control";
            $this->Technique->EditCustomAttributes = "";
            if (!$this->Technique->Raw) {
                $this->Technique->AdvancedSearch->SearchValue = HtmlDecode($this->Technique->AdvancedSearch->SearchValue);
            }
            $this->Technique->EditValue = HtmlEncode($this->Technique->AdvancedSearch->SearchValue);
            $this->Technique->PlaceHolder = RemoveHtml($this->Technique->caption());

            // PgdPlanning
            $this->PgdPlanning->EditAttrs["class"] = "form-control";
            $this->PgdPlanning->EditCustomAttributes = "";
            if (!$this->PgdPlanning->Raw) {
                $this->PgdPlanning->AdvancedSearch->SearchValue = HtmlDecode($this->PgdPlanning->AdvancedSearch->SearchValue);
            }
            $this->PgdPlanning->EditValue = HtmlEncode($this->PgdPlanning->AdvancedSearch->SearchValue);
            $this->PgdPlanning->PlaceHolder = RemoveHtml($this->PgdPlanning->caption());

            // IMSI
            $this->IMSI->EditAttrs["class"] = "form-control";
            $this->IMSI->EditCustomAttributes = "";
            if (!$this->IMSI->Raw) {
                $this->IMSI->AdvancedSearch->SearchValue = HtmlDecode($this->IMSI->AdvancedSearch->SearchValue);
            }
            $this->IMSI->EditValue = HtmlEncode($this->IMSI->AdvancedSearch->SearchValue);
            $this->IMSI->PlaceHolder = RemoveHtml($this->IMSI->caption());

            // SequentialCulture
            $this->SequentialCulture->EditAttrs["class"] = "form-control";
            $this->SequentialCulture->EditCustomAttributes = "";
            if (!$this->SequentialCulture->Raw) {
                $this->SequentialCulture->AdvancedSearch->SearchValue = HtmlDecode($this->SequentialCulture->AdvancedSearch->SearchValue);
            }
            $this->SequentialCulture->EditValue = HtmlEncode($this->SequentialCulture->AdvancedSearch->SearchValue);
            $this->SequentialCulture->PlaceHolder = RemoveHtml($this->SequentialCulture->caption());

            // TimeLapse
            $this->TimeLapse->EditAttrs["class"] = "form-control";
            $this->TimeLapse->EditCustomAttributes = "";
            if (!$this->TimeLapse->Raw) {
                $this->TimeLapse->AdvancedSearch->SearchValue = HtmlDecode($this->TimeLapse->AdvancedSearch->SearchValue);
            }
            $this->TimeLapse->EditValue = HtmlEncode($this->TimeLapse->AdvancedSearch->SearchValue);
            $this->TimeLapse->PlaceHolder = RemoveHtml($this->TimeLapse->caption());

            // AH
            $this->AH->EditAttrs["class"] = "form-control";
            $this->AH->EditCustomAttributes = "";
            if (!$this->AH->Raw) {
                $this->AH->AdvancedSearch->SearchValue = HtmlDecode($this->AH->AdvancedSearch->SearchValue);
            }
            $this->AH->EditValue = HtmlEncode($this->AH->AdvancedSearch->SearchValue);
            $this->AH->PlaceHolder = RemoveHtml($this->AH->caption());

            // Weight
            $this->Weight->EditAttrs["class"] = "form-control";
            $this->Weight->EditCustomAttributes = "";
            if (!$this->Weight->Raw) {
                $this->Weight->AdvancedSearch->SearchValue = HtmlDecode($this->Weight->AdvancedSearch->SearchValue);
            }
            $this->Weight->EditValue = HtmlEncode($this->Weight->AdvancedSearch->SearchValue);
            $this->Weight->PlaceHolder = RemoveHtml($this->Weight->caption());

            // BMI
            $this->BMI->EditAttrs["class"] = "form-control";
            $this->BMI->EditCustomAttributes = "";
            if (!$this->BMI->Raw) {
                $this->BMI->AdvancedSearch->SearchValue = HtmlDecode($this->BMI->AdvancedSearch->SearchValue);
            }
            $this->BMI->EditValue = HtmlEncode($this->BMI->AdvancedSearch->SearchValue);
            $this->BMI->PlaceHolder = RemoveHtml($this->BMI->caption());

            // Male
            $this->Male->EditAttrs["class"] = "form-control";
            $this->Male->EditCustomAttributes = "";
            $this->Male->EditValue = HtmlEncode($this->Male->AdvancedSearch->SearchValue);
            $this->Male->PlaceHolder = RemoveHtml($this->Male->caption());

            // Female
            $this->Female->EditAttrs["class"] = "form-control";
            $this->Female->EditCustomAttributes = "";
            $this->Female->EditValue = HtmlEncode($this->Female->AdvancedSearch->SearchValue);
            $this->Female->PlaceHolder = RemoveHtml($this->Female->caption());

            // malepropic
            $this->malepropic->EditAttrs["class"] = "form-control";
            $this->malepropic->EditCustomAttributes = "";
            if (!$this->malepropic->Raw) {
                $this->malepropic->AdvancedSearch->SearchValue = HtmlDecode($this->malepropic->AdvancedSearch->SearchValue);
            }
            $this->malepropic->EditValue = HtmlEncode($this->malepropic->AdvancedSearch->SearchValue);
            $this->malepropic->PlaceHolder = RemoveHtml($this->malepropic->caption());

            // femalepropic
            $this->femalepropic->EditAttrs["class"] = "form-control";
            $this->femalepropic->EditCustomAttributes = "";
            if (!$this->femalepropic->Raw) {
                $this->femalepropic->AdvancedSearch->SearchValue = HtmlDecode($this->femalepropic->AdvancedSearch->SearchValue);
            }
            $this->femalepropic->EditValue = HtmlEncode($this->femalepropic->AdvancedSearch->SearchValue);
            $this->femalepropic->PlaceHolder = RemoveHtml($this->femalepropic->caption());

            // HusbandEducation
            $this->HusbandEducation->EditAttrs["class"] = "form-control";
            $this->HusbandEducation->EditCustomAttributes = "";
            if (!$this->HusbandEducation->Raw) {
                $this->HusbandEducation->AdvancedSearch->SearchValue = HtmlDecode($this->HusbandEducation->AdvancedSearch->SearchValue);
            }
            $this->HusbandEducation->EditValue = HtmlEncode($this->HusbandEducation->AdvancedSearch->SearchValue);
            $this->HusbandEducation->PlaceHolder = RemoveHtml($this->HusbandEducation->caption());

            // WifeEducation
            $this->WifeEducation->EditAttrs["class"] = "form-control";
            $this->WifeEducation->EditCustomAttributes = "";
            if (!$this->WifeEducation->Raw) {
                $this->WifeEducation->AdvancedSearch->SearchValue = HtmlDecode($this->WifeEducation->AdvancedSearch->SearchValue);
            }
            $this->WifeEducation->EditValue = HtmlEncode($this->WifeEducation->AdvancedSearch->SearchValue);
            $this->WifeEducation->PlaceHolder = RemoveHtml($this->WifeEducation->caption());

            // HusbandWorkHours
            $this->HusbandWorkHours->EditAttrs["class"] = "form-control";
            $this->HusbandWorkHours->EditCustomAttributes = "";
            if (!$this->HusbandWorkHours->Raw) {
                $this->HusbandWorkHours->AdvancedSearch->SearchValue = HtmlDecode($this->HusbandWorkHours->AdvancedSearch->SearchValue);
            }
            $this->HusbandWorkHours->EditValue = HtmlEncode($this->HusbandWorkHours->AdvancedSearch->SearchValue);
            $this->HusbandWorkHours->PlaceHolder = RemoveHtml($this->HusbandWorkHours->caption());

            // WifeWorkHours
            $this->WifeWorkHours->EditAttrs["class"] = "form-control";
            $this->WifeWorkHours->EditCustomAttributes = "";
            if (!$this->WifeWorkHours->Raw) {
                $this->WifeWorkHours->AdvancedSearch->SearchValue = HtmlDecode($this->WifeWorkHours->AdvancedSearch->SearchValue);
            }
            $this->WifeWorkHours->EditValue = HtmlEncode($this->WifeWorkHours->AdvancedSearch->SearchValue);
            $this->WifeWorkHours->PlaceHolder = RemoveHtml($this->WifeWorkHours->caption());

            // PatientLanguage
            $this->PatientLanguage->EditAttrs["class"] = "form-control";
            $this->PatientLanguage->EditCustomAttributes = "";
            if (!$this->PatientLanguage->Raw) {
                $this->PatientLanguage->AdvancedSearch->SearchValue = HtmlDecode($this->PatientLanguage->AdvancedSearch->SearchValue);
            }
            $this->PatientLanguage->EditValue = HtmlEncode($this->PatientLanguage->AdvancedSearch->SearchValue);
            $this->PatientLanguage->PlaceHolder = RemoveHtml($this->PatientLanguage->caption());

            // ReferedBy
            $this->ReferedBy->EditAttrs["class"] = "form-control";
            $this->ReferedBy->EditCustomAttributes = "";
            if (!$this->ReferedBy->Raw) {
                $this->ReferedBy->AdvancedSearch->SearchValue = HtmlDecode($this->ReferedBy->AdvancedSearch->SearchValue);
            }
            $this->ReferedBy->EditValue = HtmlEncode($this->ReferedBy->AdvancedSearch->SearchValue);
            $this->ReferedBy->PlaceHolder = RemoveHtml($this->ReferedBy->caption());

            // ReferPhNo
            $this->ReferPhNo->EditAttrs["class"] = "form-control";
            $this->ReferPhNo->EditCustomAttributes = "";
            if (!$this->ReferPhNo->Raw) {
                $this->ReferPhNo->AdvancedSearch->SearchValue = HtmlDecode($this->ReferPhNo->AdvancedSearch->SearchValue);
            }
            $this->ReferPhNo->EditValue = HtmlEncode($this->ReferPhNo->AdvancedSearch->SearchValue);
            $this->ReferPhNo->PlaceHolder = RemoveHtml($this->ReferPhNo->caption());

            // ARTCYCLE1
            $this->ARTCYCLE1->EditAttrs["class"] = "form-control";
            $this->ARTCYCLE1->EditCustomAttributes = "";
            $this->ARTCYCLE1->EditValue = $this->ARTCYCLE1->options(true);
            $this->ARTCYCLE1->PlaceHolder = RemoveHtml($this->ARTCYCLE1->caption());

            // RESULT1
            $this->RESULT1->EditAttrs["class"] = "form-control";
            $this->RESULT1->EditCustomAttributes = "";
            $this->RESULT1->EditValue = $this->RESULT1->options(true);
            $this->RESULT1->PlaceHolder = RemoveHtml($this->RESULT1->caption());

            // CoupleID
            $this->CoupleID->EditAttrs["class"] = "form-control";
            $this->CoupleID->EditCustomAttributes = "";
            if (!$this->CoupleID->Raw) {
                $this->CoupleID->AdvancedSearch->SearchValue = HtmlDecode($this->CoupleID->AdvancedSearch->SearchValue);
            }
            $this->CoupleID->EditValue = HtmlEncode($this->CoupleID->AdvancedSearch->SearchValue);
            $this->CoupleID->PlaceHolder = RemoveHtml($this->CoupleID->caption());

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

        // Save data for Custom Template
        if ($this->RowType == ROWTYPE_VIEW || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_ADD) {
            $this->Rows[] = $this->customTemplateFieldValues();
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
        $this->RIDNO->AdvancedSearch->load();
        $this->Name->AdvancedSearch->load();
        $this->Age->AdvancedSearch->load();
        $this->treatment_status->AdvancedSearch->load();
        $this->ARTCYCLE->AdvancedSearch->load();
        $this->RESULT->AdvancedSearch->load();
        $this->status->AdvancedSearch->load();
        $this->createdby->AdvancedSearch->load();
        $this->createddatetime->AdvancedSearch->load();
        $this->modifiedby->AdvancedSearch->load();
        $this->modifieddatetime->AdvancedSearch->load();
        $this->TreatmentStartDate->AdvancedSearch->load();
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
        $this->status1->AdvancedSearch->load();
        $this->id1->AdvancedSearch->load();
        $this->Male->AdvancedSearch->load();
        $this->Female->AdvancedSearch->load();
        $this->malepropic->AdvancedSearch->load();
        $this->femalepropic->AdvancedSearch->load();
        $this->HusbandEducation->AdvancedSearch->load();
        $this->WifeEducation->AdvancedSearch->load();
        $this->HusbandWorkHours->AdvancedSearch->load();
        $this->WifeWorkHours->AdvancedSearch->load();
        $this->PatientLanguage->AdvancedSearch->load();
        $this->ReferedBy->AdvancedSearch->load();
        $this->ReferPhNo->AdvancedSearch->load();
        $this->ARTCYCLE1->AdvancedSearch->load();
        $this->RESULT1->AdvancedSearch->load();
        $this->CoupleID->AdvancedSearch->load();
        $this->HospID->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatmentlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatmentlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_ivf_treatmentlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_ivf_treatment" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_ivf_treatment\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_ivf_treatmentlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = $this->getExportTag("excel", $this->ExportExcelCustom);
        $item->Visible = true;

        // Export to Word
        $item = &$this->ExportOptions->add("word");
        $item->Body = $this->getExportTag("word", $this->ExportWordCustom);
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
        $item->Body = $this->getExportTag("pdf", $this->ExportPdfCustom);
        $item->Visible = false;

        // Export to Email
        $item = &$this->ExportOptions->add("email");
        $item->Body = $this->getExportTag("email", $this->ExportEmailCustom);
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatmentlistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_ivf_treatmentlistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_status1":
                    break;
                case "x_Male":
                    break;
                case "x_Female":
                    break;
                case "x_ReferedBy":
                    break;
                case "x_ARTCYCLE1":
                    break;
                case "x_RESULT1":
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
