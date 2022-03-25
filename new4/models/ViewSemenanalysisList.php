<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class ViewSemenanalysisList extends ViewSemenanalysis
{
    use MessagesTrait;

    // Page ID
    public $PageID = "list";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'view_semenanalysis';

    // Page object name
    public $PageObjName = "ViewSemenanalysisList";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fview_semenanalysislist";
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

        // Table object (view_semenanalysis)
        if (!isset($GLOBALS["view_semenanalysis"]) || get_class($GLOBALS["view_semenanalysis"]) == PROJECT_NAMESPACE . "view_semenanalysis") {
            $GLOBALS["view_semenanalysis"] = &$this;
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
        $this->AddUrl = "ViewSemenanalysisAdd";
        $this->InlineAddUrl = $pageUrl . "action=add";
        $this->GridAddUrl = $pageUrl . "action=gridadd";
        $this->GridEditUrl = $pageUrl . "action=gridedit";
        $this->MultiDeleteUrl = "ViewSemenanalysisDelete";
        $this->MultiUpdateUrl = "ViewSemenanalysisUpdate";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'view_semenanalysis');
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
        $this->FilterOptions->TagClassName = "ew-filter-option fview_semenanalysislistsrch";

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
                $doc = new $class(Container("view_semenanalysis"));
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
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->RIDNo->Visible = false;
        $this->PatientName->Visible = false;
        $this->HusbandName->Visible = false;
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->Visible = false;
        $this->CollectionMethod->Visible = false;
        $this->Medicationused->Visible = false;
        $this->DifficultiesinCollection->Visible = false;
        $this->Volume->Visible = false;
        $this->pH->Visible = false;
        $this->Timeofcollection->Visible = false;
        $this->Timeofexamination->Visible = false;
        $this->Concentration->Visible = false;
        $this->Total->Visible = false;
        $this->ProgressiveMotility->Visible = false;
        $this->NonProgrssiveMotile->Visible = false;
        $this->Immotile->Visible = false;
        $this->TotalProgrssiveMotile->Visible = false;
        $this->Appearance->Visible = false;
        $this->Homogenosity->Visible = false;
        $this->CompleteSample->Visible = false;
        $this->Liquefactiontime->Visible = false;
        $this->Normal->Visible = false;
        $this->Abnormal->Visible = false;
        $this->Headdefects->Visible = false;
        $this->MidpieceDefects->Visible = false;
        $this->TailDefects->Visible = false;
        $this->NormalProgMotile->Visible = false;
        $this->ImmatureForms->Visible = false;
        $this->Leucocytes->Visible = false;
        $this->Agglutination->Visible = false;
        $this->Debris->Visible = false;
        $this->Diagnosis->Visible = false;
        $this->Observations->Visible = false;
        $this->Signature->Visible = false;
        $this->SemenOrgin->Visible = false;
        $this->Donor->Visible = false;
        $this->DonorBloodgroup->Visible = false;
        $this->Tank->Visible = false;
        $this->Location->Visible = false;
        $this->Volume1->Visible = false;
        $this->Concentration1->Visible = false;
        $this->Total1->Visible = false;
        $this->ProgressiveMotility1->Visible = false;
        $this->NonProgrssiveMotile1->Visible = false;
        $this->Immotile1->Visible = false;
        $this->TotalProgrssiveMotile1->Visible = false;
        $this->TidNo->setVisibility();
        $this->Color->Visible = false;
        $this->DoneBy->Visible = false;
        $this->Method->Visible = false;
        $this->Abstinence->Visible = false;
        $this->ProcessedBy->Visible = false;
        $this->InseminationTime->Visible = false;
        $this->InseminationBy->Visible = false;
        $this->Big->Visible = false;
        $this->Medium->Visible = false;
        $this->Small->Visible = false;
        $this->NoHalo->Visible = false;
        $this->Fragmented->Visible = false;
        $this->NonFragmented->Visible = false;
        $this->DFI->Visible = false;
        $this->IsueBy->Visible = false;
        $this->Volume2->Visible = false;
        $this->Concentration2->Visible = false;
        $this->Total2->Visible = false;
        $this->ProgressiveMotility2->Visible = false;
        $this->NonProgrssiveMotile2->Visible = false;
        $this->Immotile2->Visible = false;
        $this->TotalProgrssiveMotile2->Visible = false;
        $this->IssuedBy->Visible = false;
        $this->IssuedTo->Visible = false;
        $this->MACS->Visible = false;
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->Visible = false;
        $this->IMSC_1->Visible = false;
        $this->IMSC_2->Visible = false;
        $this->LIQUIFACTION_STORAGE->Visible = false;
        $this->IUI_PREP_METHOD->Visible = false;
        $this->TIME_FROM_TRIGGER->Visible = false;
        $this->COLLECTION_TO_PREPARATION->Visible = false;
        $this->TIME_FROM_PREP_TO_INSEM->Visible = false;
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
        $this->setupLookupOptions($this->RIDNo);
        $this->setupLookupOptions($this->PatientName);
        $this->setupLookupOptions($this->HusbandName);
        $this->setupLookupOptions($this->Medicationused);
        $this->setupLookupOptions($this->Donor);

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
            $savedFilterList = $UserProfile->getSearchFilters(CurrentUserName(), "fview_semenanalysislistsrch");
        }
        $filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
        $filterList = Concat($filterList, $this->PaID->AdvancedSearch->toJson(), ","); // Field PaID
        $filterList = Concat($filterList, $this->PaName->AdvancedSearch->toJson(), ","); // Field PaName
        $filterList = Concat($filterList, $this->PaMobile->AdvancedSearch->toJson(), ","); // Field PaMobile
        $filterList = Concat($filterList, $this->PartnerID->AdvancedSearch->toJson(), ","); // Field PartnerID
        $filterList = Concat($filterList, $this->PartnerName->AdvancedSearch->toJson(), ","); // Field PartnerName
        $filterList = Concat($filterList, $this->PartnerMobile->AdvancedSearch->toJson(), ","); // Field PartnerMobile
        $filterList = Concat($filterList, $this->RIDNo->AdvancedSearch->toJson(), ","); // Field RIDNo
        $filterList = Concat($filterList, $this->PatientName->AdvancedSearch->toJson(), ","); // Field PatientName
        $filterList = Concat($filterList, $this->HusbandName->AdvancedSearch->toJson(), ","); // Field HusbandName
        $filterList = Concat($filterList, $this->RequestDr->AdvancedSearch->toJson(), ","); // Field RequestDr
        $filterList = Concat($filterList, $this->CollectionDate->AdvancedSearch->toJson(), ","); // Field CollectionDate
        $filterList = Concat($filterList, $this->ResultDate->AdvancedSearch->toJson(), ","); // Field ResultDate
        $filterList = Concat($filterList, $this->RequestSample->AdvancedSearch->toJson(), ","); // Field RequestSample
        $filterList = Concat($filterList, $this->CollectionType->AdvancedSearch->toJson(), ","); // Field CollectionType
        $filterList = Concat($filterList, $this->CollectionMethod->AdvancedSearch->toJson(), ","); // Field CollectionMethod
        $filterList = Concat($filterList, $this->Medicationused->AdvancedSearch->toJson(), ","); // Field Medicationused
        $filterList = Concat($filterList, $this->DifficultiesinCollection->AdvancedSearch->toJson(), ","); // Field DifficultiesinCollection
        $filterList = Concat($filterList, $this->Volume->AdvancedSearch->toJson(), ","); // Field Volume
        $filterList = Concat($filterList, $this->pH->AdvancedSearch->toJson(), ","); // Field pH
        $filterList = Concat($filterList, $this->Timeofcollection->AdvancedSearch->toJson(), ","); // Field Timeofcollection
        $filterList = Concat($filterList, $this->Timeofexamination->AdvancedSearch->toJson(), ","); // Field Timeofexamination
        $filterList = Concat($filterList, $this->Concentration->AdvancedSearch->toJson(), ","); // Field Concentration
        $filterList = Concat($filterList, $this->Total->AdvancedSearch->toJson(), ","); // Field Total
        $filterList = Concat($filterList, $this->ProgressiveMotility->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility
        $filterList = Concat($filterList, $this->NonProgrssiveMotile->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile
        $filterList = Concat($filterList, $this->Immotile->AdvancedSearch->toJson(), ","); // Field Immotile
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile
        $filterList = Concat($filterList, $this->Appearance->AdvancedSearch->toJson(), ","); // Field Appearance
        $filterList = Concat($filterList, $this->Homogenosity->AdvancedSearch->toJson(), ","); // Field Homogenosity
        $filterList = Concat($filterList, $this->CompleteSample->AdvancedSearch->toJson(), ","); // Field CompleteSample
        $filterList = Concat($filterList, $this->Liquefactiontime->AdvancedSearch->toJson(), ","); // Field Liquefactiontime
        $filterList = Concat($filterList, $this->Normal->AdvancedSearch->toJson(), ","); // Field Normal
        $filterList = Concat($filterList, $this->Abnormal->AdvancedSearch->toJson(), ","); // Field Abnormal
        $filterList = Concat($filterList, $this->Headdefects->AdvancedSearch->toJson(), ","); // Field Headdefects
        $filterList = Concat($filterList, $this->MidpieceDefects->AdvancedSearch->toJson(), ","); // Field MidpieceDefects
        $filterList = Concat($filterList, $this->TailDefects->AdvancedSearch->toJson(), ","); // Field TailDefects
        $filterList = Concat($filterList, $this->NormalProgMotile->AdvancedSearch->toJson(), ","); // Field NormalProgMotile
        $filterList = Concat($filterList, $this->ImmatureForms->AdvancedSearch->toJson(), ","); // Field ImmatureForms
        $filterList = Concat($filterList, $this->Leucocytes->AdvancedSearch->toJson(), ","); // Field Leucocytes
        $filterList = Concat($filterList, $this->Agglutination->AdvancedSearch->toJson(), ","); // Field Agglutination
        $filterList = Concat($filterList, $this->Debris->AdvancedSearch->toJson(), ","); // Field Debris
        $filterList = Concat($filterList, $this->Diagnosis->AdvancedSearch->toJson(), ","); // Field Diagnosis
        $filterList = Concat($filterList, $this->Observations->AdvancedSearch->toJson(), ","); // Field Observations
        $filterList = Concat($filterList, $this->Signature->AdvancedSearch->toJson(), ","); // Field Signature
        $filterList = Concat($filterList, $this->SemenOrgin->AdvancedSearch->toJson(), ","); // Field SemenOrgin
        $filterList = Concat($filterList, $this->Donor->AdvancedSearch->toJson(), ","); // Field Donor
        $filterList = Concat($filterList, $this->DonorBloodgroup->AdvancedSearch->toJson(), ","); // Field DonorBloodgroup
        $filterList = Concat($filterList, $this->Tank->AdvancedSearch->toJson(), ","); // Field Tank
        $filterList = Concat($filterList, $this->Location->AdvancedSearch->toJson(), ","); // Field Location
        $filterList = Concat($filterList, $this->Volume1->AdvancedSearch->toJson(), ","); // Field Volume1
        $filterList = Concat($filterList, $this->Concentration1->AdvancedSearch->toJson(), ","); // Field Concentration1
        $filterList = Concat($filterList, $this->Total1->AdvancedSearch->toJson(), ","); // Field Total1
        $filterList = Concat($filterList, $this->ProgressiveMotility1->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility1
        $filterList = Concat($filterList, $this->NonProgrssiveMotile1->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile1
        $filterList = Concat($filterList, $this->Immotile1->AdvancedSearch->toJson(), ","); // Field Immotile1
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile1->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile1
        $filterList = Concat($filterList, $this->TidNo->AdvancedSearch->toJson(), ","); // Field TidNo
        $filterList = Concat($filterList, $this->Color->AdvancedSearch->toJson(), ","); // Field Color
        $filterList = Concat($filterList, $this->DoneBy->AdvancedSearch->toJson(), ","); // Field DoneBy
        $filterList = Concat($filterList, $this->Method->AdvancedSearch->toJson(), ","); // Field Method
        $filterList = Concat($filterList, $this->Abstinence->AdvancedSearch->toJson(), ","); // Field Abstinence
        $filterList = Concat($filterList, $this->ProcessedBy->AdvancedSearch->toJson(), ","); // Field ProcessedBy
        $filterList = Concat($filterList, $this->InseminationTime->AdvancedSearch->toJson(), ","); // Field InseminationTime
        $filterList = Concat($filterList, $this->InseminationBy->AdvancedSearch->toJson(), ","); // Field InseminationBy
        $filterList = Concat($filterList, $this->Big->AdvancedSearch->toJson(), ","); // Field Big
        $filterList = Concat($filterList, $this->Medium->AdvancedSearch->toJson(), ","); // Field Medium
        $filterList = Concat($filterList, $this->Small->AdvancedSearch->toJson(), ","); // Field Small
        $filterList = Concat($filterList, $this->NoHalo->AdvancedSearch->toJson(), ","); // Field NoHalo
        $filterList = Concat($filterList, $this->Fragmented->AdvancedSearch->toJson(), ","); // Field Fragmented
        $filterList = Concat($filterList, $this->NonFragmented->AdvancedSearch->toJson(), ","); // Field NonFragmented
        $filterList = Concat($filterList, $this->DFI->AdvancedSearch->toJson(), ","); // Field DFI
        $filterList = Concat($filterList, $this->IsueBy->AdvancedSearch->toJson(), ","); // Field IsueBy
        $filterList = Concat($filterList, $this->Volume2->AdvancedSearch->toJson(), ","); // Field Volume2
        $filterList = Concat($filterList, $this->Concentration2->AdvancedSearch->toJson(), ","); // Field Concentration2
        $filterList = Concat($filterList, $this->Total2->AdvancedSearch->toJson(), ","); // Field Total2
        $filterList = Concat($filterList, $this->ProgressiveMotility2->AdvancedSearch->toJson(), ","); // Field ProgressiveMotility2
        $filterList = Concat($filterList, $this->NonProgrssiveMotile2->AdvancedSearch->toJson(), ","); // Field NonProgrssiveMotile2
        $filterList = Concat($filterList, $this->Immotile2->AdvancedSearch->toJson(), ","); // Field Immotile2
        $filterList = Concat($filterList, $this->TotalProgrssiveMotile2->AdvancedSearch->toJson(), ","); // Field TotalProgrssiveMotile2
        $filterList = Concat($filterList, $this->IssuedBy->AdvancedSearch->toJson(), ","); // Field IssuedBy
        $filterList = Concat($filterList, $this->IssuedTo->AdvancedSearch->toJson(), ","); // Field IssuedTo
        $filterList = Concat($filterList, $this->MACS->AdvancedSearch->toJson(), ","); // Field MACS
        $filterList = Concat($filterList, $this->PREG_TEST_DATE->AdvancedSearch->toJson(), ","); // Field PREG_TEST_DATE
        $filterList = Concat($filterList, $this->SPECIFIC_PROBLEMS->AdvancedSearch->toJson(), ","); // Field SPECIFIC_PROBLEMS
        $filterList = Concat($filterList, $this->IMSC_1->AdvancedSearch->toJson(), ","); // Field IMSC_1
        $filterList = Concat($filterList, $this->IMSC_2->AdvancedSearch->toJson(), ","); // Field IMSC_2
        $filterList = Concat($filterList, $this->LIQUIFACTION_STORAGE->AdvancedSearch->toJson(), ","); // Field LIQUIFACTION_STORAGE
        $filterList = Concat($filterList, $this->IUI_PREP_METHOD->AdvancedSearch->toJson(), ","); // Field IUI_PREP_METHOD
        $filterList = Concat($filterList, $this->TIME_FROM_TRIGGER->AdvancedSearch->toJson(), ","); // Field TIME_FROM_TRIGGER
        $filterList = Concat($filterList, $this->COLLECTION_TO_PREPARATION->AdvancedSearch->toJson(), ","); // Field COLLECTION_TO_PREPARATION
        $filterList = Concat($filterList, $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->toJson(), ","); // Field TIME_FROM_PREP_TO_INSEM
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
            $UserProfile->setSearchFilters(CurrentUserName(), "fview_semenanalysislistsrch", $filters);
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

        // Field PaID
        $this->PaID->AdvancedSearch->SearchValue = @$filter["x_PaID"];
        $this->PaID->AdvancedSearch->SearchOperator = @$filter["z_PaID"];
        $this->PaID->AdvancedSearch->SearchCondition = @$filter["v_PaID"];
        $this->PaID->AdvancedSearch->SearchValue2 = @$filter["y_PaID"];
        $this->PaID->AdvancedSearch->SearchOperator2 = @$filter["w_PaID"];
        $this->PaID->AdvancedSearch->save();

        // Field PaName
        $this->PaName->AdvancedSearch->SearchValue = @$filter["x_PaName"];
        $this->PaName->AdvancedSearch->SearchOperator = @$filter["z_PaName"];
        $this->PaName->AdvancedSearch->SearchCondition = @$filter["v_PaName"];
        $this->PaName->AdvancedSearch->SearchValue2 = @$filter["y_PaName"];
        $this->PaName->AdvancedSearch->SearchOperator2 = @$filter["w_PaName"];
        $this->PaName->AdvancedSearch->save();

        // Field PaMobile
        $this->PaMobile->AdvancedSearch->SearchValue = @$filter["x_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchOperator = @$filter["z_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchCondition = @$filter["v_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchValue2 = @$filter["y_PaMobile"];
        $this->PaMobile->AdvancedSearch->SearchOperator2 = @$filter["w_PaMobile"];
        $this->PaMobile->AdvancedSearch->save();

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

        // Field PartnerMobile
        $this->PartnerMobile->AdvancedSearch->SearchValue = @$filter["x_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator = @$filter["z_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchCondition = @$filter["v_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchValue2 = @$filter["y_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->SearchOperator2 = @$filter["w_PartnerMobile"];
        $this->PartnerMobile->AdvancedSearch->save();

        // Field RIDNo
        $this->RIDNo->AdvancedSearch->SearchValue = @$filter["x_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator = @$filter["z_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchCondition = @$filter["v_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchValue2 = @$filter["y_RIDNo"];
        $this->RIDNo->AdvancedSearch->SearchOperator2 = @$filter["w_RIDNo"];
        $this->RIDNo->AdvancedSearch->save();

        // Field PatientName
        $this->PatientName->AdvancedSearch->SearchValue = @$filter["x_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator = @$filter["z_PatientName"];
        $this->PatientName->AdvancedSearch->SearchCondition = @$filter["v_PatientName"];
        $this->PatientName->AdvancedSearch->SearchValue2 = @$filter["y_PatientName"];
        $this->PatientName->AdvancedSearch->SearchOperator2 = @$filter["w_PatientName"];
        $this->PatientName->AdvancedSearch->save();

        // Field HusbandName
        $this->HusbandName->AdvancedSearch->SearchValue = @$filter["x_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchOperator = @$filter["z_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchCondition = @$filter["v_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchValue2 = @$filter["y_HusbandName"];
        $this->HusbandName->AdvancedSearch->SearchOperator2 = @$filter["w_HusbandName"];
        $this->HusbandName->AdvancedSearch->save();

        // Field RequestDr
        $this->RequestDr->AdvancedSearch->SearchValue = @$filter["x_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchOperator = @$filter["z_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchCondition = @$filter["v_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchValue2 = @$filter["y_RequestDr"];
        $this->RequestDr->AdvancedSearch->SearchOperator2 = @$filter["w_RequestDr"];
        $this->RequestDr->AdvancedSearch->save();

        // Field CollectionDate
        $this->CollectionDate->AdvancedSearch->SearchValue = @$filter["x_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchOperator = @$filter["z_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchCondition = @$filter["v_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchValue2 = @$filter["y_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionDate"];
        $this->CollectionDate->AdvancedSearch->save();

        // Field ResultDate
        $this->ResultDate->AdvancedSearch->SearchValue = @$filter["x_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator = @$filter["z_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchCondition = @$filter["v_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchValue2 = @$filter["y_ResultDate"];
        $this->ResultDate->AdvancedSearch->SearchOperator2 = @$filter["w_ResultDate"];
        $this->ResultDate->AdvancedSearch->save();

        // Field RequestSample
        $this->RequestSample->AdvancedSearch->SearchValue = @$filter["x_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchOperator = @$filter["z_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchCondition = @$filter["v_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchValue2 = @$filter["y_RequestSample"];
        $this->RequestSample->AdvancedSearch->SearchOperator2 = @$filter["w_RequestSample"];
        $this->RequestSample->AdvancedSearch->save();

        // Field CollectionType
        $this->CollectionType->AdvancedSearch->SearchValue = @$filter["x_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchOperator = @$filter["z_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchCondition = @$filter["v_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchValue2 = @$filter["y_CollectionType"];
        $this->CollectionType->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionType"];
        $this->CollectionType->AdvancedSearch->save();

        // Field CollectionMethod
        $this->CollectionMethod->AdvancedSearch->SearchValue = @$filter["x_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchOperator = @$filter["z_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchCondition = @$filter["v_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchValue2 = @$filter["y_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->SearchOperator2 = @$filter["w_CollectionMethod"];
        $this->CollectionMethod->AdvancedSearch->save();

        // Field Medicationused
        $this->Medicationused->AdvancedSearch->SearchValue = @$filter["x_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchOperator = @$filter["z_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchCondition = @$filter["v_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchValue2 = @$filter["y_Medicationused"];
        $this->Medicationused->AdvancedSearch->SearchOperator2 = @$filter["w_Medicationused"];
        $this->Medicationused->AdvancedSearch->save();

        // Field DifficultiesinCollection
        $this->DifficultiesinCollection->AdvancedSearch->SearchValue = @$filter["x_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchOperator = @$filter["z_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchCondition = @$filter["v_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchValue2 = @$filter["y_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->SearchOperator2 = @$filter["w_DifficultiesinCollection"];
        $this->DifficultiesinCollection->AdvancedSearch->save();

        // Field Volume
        $this->Volume->AdvancedSearch->SearchValue = @$filter["x_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator = @$filter["z_Volume"];
        $this->Volume->AdvancedSearch->SearchCondition = @$filter["v_Volume"];
        $this->Volume->AdvancedSearch->SearchValue2 = @$filter["y_Volume"];
        $this->Volume->AdvancedSearch->SearchOperator2 = @$filter["w_Volume"];
        $this->Volume->AdvancedSearch->save();

        // Field pH
        $this->pH->AdvancedSearch->SearchValue = @$filter["x_pH"];
        $this->pH->AdvancedSearch->SearchOperator = @$filter["z_pH"];
        $this->pH->AdvancedSearch->SearchCondition = @$filter["v_pH"];
        $this->pH->AdvancedSearch->SearchValue2 = @$filter["y_pH"];
        $this->pH->AdvancedSearch->SearchOperator2 = @$filter["w_pH"];
        $this->pH->AdvancedSearch->save();

        // Field Timeofcollection
        $this->Timeofcollection->AdvancedSearch->SearchValue = @$filter["x_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchOperator = @$filter["z_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchCondition = @$filter["v_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchValue2 = @$filter["y_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->SearchOperator2 = @$filter["w_Timeofcollection"];
        $this->Timeofcollection->AdvancedSearch->save();

        // Field Timeofexamination
        $this->Timeofexamination->AdvancedSearch->SearchValue = @$filter["x_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchOperator = @$filter["z_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchCondition = @$filter["v_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchValue2 = @$filter["y_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->SearchOperator2 = @$filter["w_Timeofexamination"];
        $this->Timeofexamination->AdvancedSearch->save();

        // Field Concentration
        $this->Concentration->AdvancedSearch->SearchValue = @$filter["x_Concentration"];
        $this->Concentration->AdvancedSearch->SearchOperator = @$filter["z_Concentration"];
        $this->Concentration->AdvancedSearch->SearchCondition = @$filter["v_Concentration"];
        $this->Concentration->AdvancedSearch->SearchValue2 = @$filter["y_Concentration"];
        $this->Concentration->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration"];
        $this->Concentration->AdvancedSearch->save();

        // Field Total
        $this->Total->AdvancedSearch->SearchValue = @$filter["x_Total"];
        $this->Total->AdvancedSearch->SearchOperator = @$filter["z_Total"];
        $this->Total->AdvancedSearch->SearchCondition = @$filter["v_Total"];
        $this->Total->AdvancedSearch->SearchValue2 = @$filter["y_Total"];
        $this->Total->AdvancedSearch->SearchOperator2 = @$filter["w_Total"];
        $this->Total->AdvancedSearch->save();

        // Field ProgressiveMotility
        $this->ProgressiveMotility->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility"];
        $this->ProgressiveMotility->AdvancedSearch->save();

        // Field NonProgrssiveMotile
        $this->NonProgrssiveMotile->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile"];
        $this->NonProgrssiveMotile->AdvancedSearch->save();

        // Field Immotile
        $this->Immotile->AdvancedSearch->SearchValue = @$filter["x_Immotile"];
        $this->Immotile->AdvancedSearch->SearchOperator = @$filter["z_Immotile"];
        $this->Immotile->AdvancedSearch->SearchCondition = @$filter["v_Immotile"];
        $this->Immotile->AdvancedSearch->SearchValue2 = @$filter["y_Immotile"];
        $this->Immotile->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile"];
        $this->Immotile->AdvancedSearch->save();

        // Field TotalProgrssiveMotile
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile"];
        $this->TotalProgrssiveMotile->AdvancedSearch->save();

        // Field Appearance
        $this->Appearance->AdvancedSearch->SearchValue = @$filter["x_Appearance"];
        $this->Appearance->AdvancedSearch->SearchOperator = @$filter["z_Appearance"];
        $this->Appearance->AdvancedSearch->SearchCondition = @$filter["v_Appearance"];
        $this->Appearance->AdvancedSearch->SearchValue2 = @$filter["y_Appearance"];
        $this->Appearance->AdvancedSearch->SearchOperator2 = @$filter["w_Appearance"];
        $this->Appearance->AdvancedSearch->save();

        // Field Homogenosity
        $this->Homogenosity->AdvancedSearch->SearchValue = @$filter["x_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchOperator = @$filter["z_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchCondition = @$filter["v_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchValue2 = @$filter["y_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->SearchOperator2 = @$filter["w_Homogenosity"];
        $this->Homogenosity->AdvancedSearch->save();

        // Field CompleteSample
        $this->CompleteSample->AdvancedSearch->SearchValue = @$filter["x_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchOperator = @$filter["z_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchCondition = @$filter["v_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchValue2 = @$filter["y_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->SearchOperator2 = @$filter["w_CompleteSample"];
        $this->CompleteSample->AdvancedSearch->save();

        // Field Liquefactiontime
        $this->Liquefactiontime->AdvancedSearch->SearchValue = @$filter["x_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchOperator = @$filter["z_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchCondition = @$filter["v_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchValue2 = @$filter["y_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->SearchOperator2 = @$filter["w_Liquefactiontime"];
        $this->Liquefactiontime->AdvancedSearch->save();

        // Field Normal
        $this->Normal->AdvancedSearch->SearchValue = @$filter["x_Normal"];
        $this->Normal->AdvancedSearch->SearchOperator = @$filter["z_Normal"];
        $this->Normal->AdvancedSearch->SearchCondition = @$filter["v_Normal"];
        $this->Normal->AdvancedSearch->SearchValue2 = @$filter["y_Normal"];
        $this->Normal->AdvancedSearch->SearchOperator2 = @$filter["w_Normal"];
        $this->Normal->AdvancedSearch->save();

        // Field Abnormal
        $this->Abnormal->AdvancedSearch->SearchValue = @$filter["x_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator = @$filter["z_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchCondition = @$filter["v_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchValue2 = @$filter["y_Abnormal"];
        $this->Abnormal->AdvancedSearch->SearchOperator2 = @$filter["w_Abnormal"];
        $this->Abnormal->AdvancedSearch->save();

        // Field Headdefects
        $this->Headdefects->AdvancedSearch->SearchValue = @$filter["x_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchOperator = @$filter["z_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchCondition = @$filter["v_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchValue2 = @$filter["y_Headdefects"];
        $this->Headdefects->AdvancedSearch->SearchOperator2 = @$filter["w_Headdefects"];
        $this->Headdefects->AdvancedSearch->save();

        // Field MidpieceDefects
        $this->MidpieceDefects->AdvancedSearch->SearchValue = @$filter["x_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchOperator = @$filter["z_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchCondition = @$filter["v_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchValue2 = @$filter["y_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->SearchOperator2 = @$filter["w_MidpieceDefects"];
        $this->MidpieceDefects->AdvancedSearch->save();

        // Field TailDefects
        $this->TailDefects->AdvancedSearch->SearchValue = @$filter["x_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchOperator = @$filter["z_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchCondition = @$filter["v_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchValue2 = @$filter["y_TailDefects"];
        $this->TailDefects->AdvancedSearch->SearchOperator2 = @$filter["w_TailDefects"];
        $this->TailDefects->AdvancedSearch->save();

        // Field NormalProgMotile
        $this->NormalProgMotile->AdvancedSearch->SearchValue = @$filter["x_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchOperator = @$filter["z_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchCondition = @$filter["v_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchValue2 = @$filter["y_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->SearchOperator2 = @$filter["w_NormalProgMotile"];
        $this->NormalProgMotile->AdvancedSearch->save();

        // Field ImmatureForms
        $this->ImmatureForms->AdvancedSearch->SearchValue = @$filter["x_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchOperator = @$filter["z_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchCondition = @$filter["v_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchValue2 = @$filter["y_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->SearchOperator2 = @$filter["w_ImmatureForms"];
        $this->ImmatureForms->AdvancedSearch->save();

        // Field Leucocytes
        $this->Leucocytes->AdvancedSearch->SearchValue = @$filter["x_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchOperator = @$filter["z_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchCondition = @$filter["v_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchValue2 = @$filter["y_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->SearchOperator2 = @$filter["w_Leucocytes"];
        $this->Leucocytes->AdvancedSearch->save();

        // Field Agglutination
        $this->Agglutination->AdvancedSearch->SearchValue = @$filter["x_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchOperator = @$filter["z_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchCondition = @$filter["v_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchValue2 = @$filter["y_Agglutination"];
        $this->Agglutination->AdvancedSearch->SearchOperator2 = @$filter["w_Agglutination"];
        $this->Agglutination->AdvancedSearch->save();

        // Field Debris
        $this->Debris->AdvancedSearch->SearchValue = @$filter["x_Debris"];
        $this->Debris->AdvancedSearch->SearchOperator = @$filter["z_Debris"];
        $this->Debris->AdvancedSearch->SearchCondition = @$filter["v_Debris"];
        $this->Debris->AdvancedSearch->SearchValue2 = @$filter["y_Debris"];
        $this->Debris->AdvancedSearch->SearchOperator2 = @$filter["w_Debris"];
        $this->Debris->AdvancedSearch->save();

        // Field Diagnosis
        $this->Diagnosis->AdvancedSearch->SearchValue = @$filter["x_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchOperator = @$filter["z_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchCondition = @$filter["v_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchValue2 = @$filter["y_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->SearchOperator2 = @$filter["w_Diagnosis"];
        $this->Diagnosis->AdvancedSearch->save();

        // Field Observations
        $this->Observations->AdvancedSearch->SearchValue = @$filter["x_Observations"];
        $this->Observations->AdvancedSearch->SearchOperator = @$filter["z_Observations"];
        $this->Observations->AdvancedSearch->SearchCondition = @$filter["v_Observations"];
        $this->Observations->AdvancedSearch->SearchValue2 = @$filter["y_Observations"];
        $this->Observations->AdvancedSearch->SearchOperator2 = @$filter["w_Observations"];
        $this->Observations->AdvancedSearch->save();

        // Field Signature
        $this->Signature->AdvancedSearch->SearchValue = @$filter["x_Signature"];
        $this->Signature->AdvancedSearch->SearchOperator = @$filter["z_Signature"];
        $this->Signature->AdvancedSearch->SearchCondition = @$filter["v_Signature"];
        $this->Signature->AdvancedSearch->SearchValue2 = @$filter["y_Signature"];
        $this->Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Signature"];
        $this->Signature->AdvancedSearch->save();

        // Field SemenOrgin
        $this->SemenOrgin->AdvancedSearch->SearchValue = @$filter["x_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchOperator = @$filter["z_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchCondition = @$filter["v_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchValue2 = @$filter["y_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->SearchOperator2 = @$filter["w_SemenOrgin"];
        $this->SemenOrgin->AdvancedSearch->save();

        // Field Donor
        $this->Donor->AdvancedSearch->SearchValue = @$filter["x_Donor"];
        $this->Donor->AdvancedSearch->SearchOperator = @$filter["z_Donor"];
        $this->Donor->AdvancedSearch->SearchCondition = @$filter["v_Donor"];
        $this->Donor->AdvancedSearch->SearchValue2 = @$filter["y_Donor"];
        $this->Donor->AdvancedSearch->SearchOperator2 = @$filter["w_Donor"];
        $this->Donor->AdvancedSearch->save();

        // Field DonorBloodgroup
        $this->DonorBloodgroup->AdvancedSearch->SearchValue = @$filter["x_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchOperator = @$filter["z_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchCondition = @$filter["v_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchValue2 = @$filter["y_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->SearchOperator2 = @$filter["w_DonorBloodgroup"];
        $this->DonorBloodgroup->AdvancedSearch->save();

        // Field Tank
        $this->Tank->AdvancedSearch->SearchValue = @$filter["x_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator = @$filter["z_Tank"];
        $this->Tank->AdvancedSearch->SearchCondition = @$filter["v_Tank"];
        $this->Tank->AdvancedSearch->SearchValue2 = @$filter["y_Tank"];
        $this->Tank->AdvancedSearch->SearchOperator2 = @$filter["w_Tank"];
        $this->Tank->AdvancedSearch->save();

        // Field Location
        $this->Location->AdvancedSearch->SearchValue = @$filter["x_Location"];
        $this->Location->AdvancedSearch->SearchOperator = @$filter["z_Location"];
        $this->Location->AdvancedSearch->SearchCondition = @$filter["v_Location"];
        $this->Location->AdvancedSearch->SearchValue2 = @$filter["y_Location"];
        $this->Location->AdvancedSearch->SearchOperator2 = @$filter["w_Location"];
        $this->Location->AdvancedSearch->save();

        // Field Volume1
        $this->Volume1->AdvancedSearch->SearchValue = @$filter["x_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator = @$filter["z_Volume1"];
        $this->Volume1->AdvancedSearch->SearchCondition = @$filter["v_Volume1"];
        $this->Volume1->AdvancedSearch->SearchValue2 = @$filter["y_Volume1"];
        $this->Volume1->AdvancedSearch->SearchOperator2 = @$filter["w_Volume1"];
        $this->Volume1->AdvancedSearch->save();

        // Field Concentration1
        $this->Concentration1->AdvancedSearch->SearchValue = @$filter["x_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchOperator = @$filter["z_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchCondition = @$filter["v_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchValue2 = @$filter["y_Concentration1"];
        $this->Concentration1->AdvancedSearch->SearchOperator2 = @$filter["w_Concentration1"];
        $this->Concentration1->AdvancedSearch->save();

        // Field Total1
        $this->Total1->AdvancedSearch->SearchValue = @$filter["x_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator = @$filter["z_Total1"];
        $this->Total1->AdvancedSearch->SearchCondition = @$filter["v_Total1"];
        $this->Total1->AdvancedSearch->SearchValue2 = @$filter["y_Total1"];
        $this->Total1->AdvancedSearch->SearchOperator2 = @$filter["w_Total1"];
        $this->Total1->AdvancedSearch->save();

        // Field ProgressiveMotility1
        $this->ProgressiveMotility1->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility1"];
        $this->ProgressiveMotility1->AdvancedSearch->save();

        // Field NonProgrssiveMotile1
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile1"];
        $this->NonProgrssiveMotile1->AdvancedSearch->save();

        // Field Immotile1
        $this->Immotile1->AdvancedSearch->SearchValue = @$filter["x_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchOperator = @$filter["z_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchCondition = @$filter["v_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchValue2 = @$filter["y_Immotile1"];
        $this->Immotile1->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile1"];
        $this->Immotile1->AdvancedSearch->save();

        // Field TotalProgrssiveMotile1
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile1"];
        $this->TotalProgrssiveMotile1->AdvancedSearch->save();

        // Field TidNo
        $this->TidNo->AdvancedSearch->SearchValue = @$filter["x_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator = @$filter["z_TidNo"];
        $this->TidNo->AdvancedSearch->SearchCondition = @$filter["v_TidNo"];
        $this->TidNo->AdvancedSearch->SearchValue2 = @$filter["y_TidNo"];
        $this->TidNo->AdvancedSearch->SearchOperator2 = @$filter["w_TidNo"];
        $this->TidNo->AdvancedSearch->save();

        // Field Color
        $this->Color->AdvancedSearch->SearchValue = @$filter["x_Color"];
        $this->Color->AdvancedSearch->SearchOperator = @$filter["z_Color"];
        $this->Color->AdvancedSearch->SearchCondition = @$filter["v_Color"];
        $this->Color->AdvancedSearch->SearchValue2 = @$filter["y_Color"];
        $this->Color->AdvancedSearch->SearchOperator2 = @$filter["w_Color"];
        $this->Color->AdvancedSearch->save();

        // Field DoneBy
        $this->DoneBy->AdvancedSearch->SearchValue = @$filter["x_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchOperator = @$filter["z_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchCondition = @$filter["v_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchValue2 = @$filter["y_DoneBy"];
        $this->DoneBy->AdvancedSearch->SearchOperator2 = @$filter["w_DoneBy"];
        $this->DoneBy->AdvancedSearch->save();

        // Field Method
        $this->Method->AdvancedSearch->SearchValue = @$filter["x_Method"];
        $this->Method->AdvancedSearch->SearchOperator = @$filter["z_Method"];
        $this->Method->AdvancedSearch->SearchCondition = @$filter["v_Method"];
        $this->Method->AdvancedSearch->SearchValue2 = @$filter["y_Method"];
        $this->Method->AdvancedSearch->SearchOperator2 = @$filter["w_Method"];
        $this->Method->AdvancedSearch->save();

        // Field Abstinence
        $this->Abstinence->AdvancedSearch->SearchValue = @$filter["x_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchOperator = @$filter["z_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchCondition = @$filter["v_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchValue2 = @$filter["y_Abstinence"];
        $this->Abstinence->AdvancedSearch->SearchOperator2 = @$filter["w_Abstinence"];
        $this->Abstinence->AdvancedSearch->save();

        // Field ProcessedBy
        $this->ProcessedBy->AdvancedSearch->SearchValue = @$filter["x_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchOperator = @$filter["z_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchCondition = @$filter["v_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchValue2 = @$filter["y_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->SearchOperator2 = @$filter["w_ProcessedBy"];
        $this->ProcessedBy->AdvancedSearch->save();

        // Field InseminationTime
        $this->InseminationTime->AdvancedSearch->SearchValue = @$filter["x_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchOperator = @$filter["z_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchCondition = @$filter["v_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchValue2 = @$filter["y_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->SearchOperator2 = @$filter["w_InseminationTime"];
        $this->InseminationTime->AdvancedSearch->save();

        // Field InseminationBy
        $this->InseminationBy->AdvancedSearch->SearchValue = @$filter["x_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchOperator = @$filter["z_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchCondition = @$filter["v_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchValue2 = @$filter["y_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->SearchOperator2 = @$filter["w_InseminationBy"];
        $this->InseminationBy->AdvancedSearch->save();

        // Field Big
        $this->Big->AdvancedSearch->SearchValue = @$filter["x_Big"];
        $this->Big->AdvancedSearch->SearchOperator = @$filter["z_Big"];
        $this->Big->AdvancedSearch->SearchCondition = @$filter["v_Big"];
        $this->Big->AdvancedSearch->SearchValue2 = @$filter["y_Big"];
        $this->Big->AdvancedSearch->SearchOperator2 = @$filter["w_Big"];
        $this->Big->AdvancedSearch->save();

        // Field Medium
        $this->Medium->AdvancedSearch->SearchValue = @$filter["x_Medium"];
        $this->Medium->AdvancedSearch->SearchOperator = @$filter["z_Medium"];
        $this->Medium->AdvancedSearch->SearchCondition = @$filter["v_Medium"];
        $this->Medium->AdvancedSearch->SearchValue2 = @$filter["y_Medium"];
        $this->Medium->AdvancedSearch->SearchOperator2 = @$filter["w_Medium"];
        $this->Medium->AdvancedSearch->save();

        // Field Small
        $this->Small->AdvancedSearch->SearchValue = @$filter["x_Small"];
        $this->Small->AdvancedSearch->SearchOperator = @$filter["z_Small"];
        $this->Small->AdvancedSearch->SearchCondition = @$filter["v_Small"];
        $this->Small->AdvancedSearch->SearchValue2 = @$filter["y_Small"];
        $this->Small->AdvancedSearch->SearchOperator2 = @$filter["w_Small"];
        $this->Small->AdvancedSearch->save();

        // Field NoHalo
        $this->NoHalo->AdvancedSearch->SearchValue = @$filter["x_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchOperator = @$filter["z_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchCondition = @$filter["v_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchValue2 = @$filter["y_NoHalo"];
        $this->NoHalo->AdvancedSearch->SearchOperator2 = @$filter["w_NoHalo"];
        $this->NoHalo->AdvancedSearch->save();

        // Field Fragmented
        $this->Fragmented->AdvancedSearch->SearchValue = @$filter["x_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchOperator = @$filter["z_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchCondition = @$filter["v_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchValue2 = @$filter["y_Fragmented"];
        $this->Fragmented->AdvancedSearch->SearchOperator2 = @$filter["w_Fragmented"];
        $this->Fragmented->AdvancedSearch->save();

        // Field NonFragmented
        $this->NonFragmented->AdvancedSearch->SearchValue = @$filter["x_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchOperator = @$filter["z_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchCondition = @$filter["v_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchValue2 = @$filter["y_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->SearchOperator2 = @$filter["w_NonFragmented"];
        $this->NonFragmented->AdvancedSearch->save();

        // Field DFI
        $this->DFI->AdvancedSearch->SearchValue = @$filter["x_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator = @$filter["z_DFI"];
        $this->DFI->AdvancedSearch->SearchCondition = @$filter["v_DFI"];
        $this->DFI->AdvancedSearch->SearchValue2 = @$filter["y_DFI"];
        $this->DFI->AdvancedSearch->SearchOperator2 = @$filter["w_DFI"];
        $this->DFI->AdvancedSearch->save();

        // Field IsueBy
        $this->IsueBy->AdvancedSearch->SearchValue = @$filter["x_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchOperator = @$filter["z_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchCondition = @$filter["v_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchValue2 = @$filter["y_IsueBy"];
        $this->IsueBy->AdvancedSearch->SearchOperator2 = @$filter["w_IsueBy"];
        $this->IsueBy->AdvancedSearch->save();

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

        // Field Total2
        $this->Total2->AdvancedSearch->SearchValue = @$filter["x_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator = @$filter["z_Total2"];
        $this->Total2->AdvancedSearch->SearchCondition = @$filter["v_Total2"];
        $this->Total2->AdvancedSearch->SearchValue2 = @$filter["y_Total2"];
        $this->Total2->AdvancedSearch->SearchOperator2 = @$filter["w_Total2"];
        $this->Total2->AdvancedSearch->save();

        // Field ProgressiveMotility2
        $this->ProgressiveMotility2->AdvancedSearch->SearchValue = @$filter["x_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchOperator = @$filter["z_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchCondition = @$filter["v_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchValue2 = @$filter["y_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->SearchOperator2 = @$filter["w_ProgressiveMotility2"];
        $this->ProgressiveMotility2->AdvancedSearch->save();

        // Field NonProgrssiveMotile2
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue = @$filter["x_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchOperator = @$filter["z_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchCondition = @$filter["v_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue2 = @$filter["y_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->SearchOperator2 = @$filter["w_NonProgrssiveMotile2"];
        $this->NonProgrssiveMotile2->AdvancedSearch->save();

        // Field Immotile2
        $this->Immotile2->AdvancedSearch->SearchValue = @$filter["x_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchOperator = @$filter["z_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchCondition = @$filter["v_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchValue2 = @$filter["y_Immotile2"];
        $this->Immotile2->AdvancedSearch->SearchOperator2 = @$filter["w_Immotile2"];
        $this->Immotile2->AdvancedSearch->save();

        // Field TotalProgrssiveMotile2
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue = @$filter["x_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchOperator = @$filter["z_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchCondition = @$filter["v_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue2 = @$filter["y_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->SearchOperator2 = @$filter["w_TotalProgrssiveMotile2"];
        $this->TotalProgrssiveMotile2->AdvancedSearch->save();

        // Field IssuedBy
        $this->IssuedBy->AdvancedSearch->SearchValue = @$filter["x_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchOperator = @$filter["z_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchCondition = @$filter["v_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchValue2 = @$filter["y_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->SearchOperator2 = @$filter["w_IssuedBy"];
        $this->IssuedBy->AdvancedSearch->save();

        // Field IssuedTo
        $this->IssuedTo->AdvancedSearch->SearchValue = @$filter["x_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchOperator = @$filter["z_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchCondition = @$filter["v_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchValue2 = @$filter["y_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->SearchOperator2 = @$filter["w_IssuedTo"];
        $this->IssuedTo->AdvancedSearch->save();

        // Field MACS
        $this->MACS->AdvancedSearch->SearchValue = @$filter["x_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator = @$filter["z_MACS"];
        $this->MACS->AdvancedSearch->SearchCondition = @$filter["v_MACS"];
        $this->MACS->AdvancedSearch->SearchValue2 = @$filter["y_MACS"];
        $this->MACS->AdvancedSearch->SearchOperator2 = @$filter["w_MACS"];
        $this->MACS->AdvancedSearch->save();

        // Field PREG_TEST_DATE
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue = @$filter["x_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator = @$filter["z_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchCondition = @$filter["v_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 = @$filter["y_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->SearchOperator2 = @$filter["w_PREG_TEST_DATE"];
        $this->PREG_TEST_DATE->AdvancedSearch->save();

        // Field SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue = @$filter["x_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator = @$filter["z_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchCondition = @$filter["v_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 = @$filter["y_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchOperator2 = @$filter["w_SPECIFIC_PROBLEMS"];
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->save();

        // Field IMSC_1
        $this->IMSC_1->AdvancedSearch->SearchValue = @$filter["x_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator = @$filter["z_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchCondition = @$filter["v_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_1"];
        $this->IMSC_1->AdvancedSearch->save();

        // Field IMSC_2
        $this->IMSC_2->AdvancedSearch->SearchValue = @$filter["x_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator = @$filter["z_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchCondition = @$filter["v_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchValue2 = @$filter["y_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->SearchOperator2 = @$filter["w_IMSC_2"];
        $this->IMSC_2->AdvancedSearch->save();

        // Field LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue = @$filter["x_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator = @$filter["z_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchCondition = @$filter["v_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 = @$filter["y_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchOperator2 = @$filter["w_LIQUIFACTION_STORAGE"];
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->save();

        // Field IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue = @$filter["x_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator = @$filter["z_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchCondition = @$filter["v_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 = @$filter["y_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->SearchOperator2 = @$filter["w_IUI_PREP_METHOD"];
        $this->IUI_PREP_METHOD->AdvancedSearch->save();

        // Field TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_TRIGGER"];
        $this->TIME_FROM_TRIGGER->AdvancedSearch->save();

        // Field COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue = @$filter["x_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator = @$filter["z_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchCondition = @$filter["v_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 = @$filter["y_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchOperator2 = @$filter["w_COLLECTION_TO_PREPARATION"];
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save();

        // Field TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue = @$filter["x_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator = @$filter["z_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchCondition = @$filter["v_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 = @$filter["y_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchOperator2 = @$filter["w_TIME_FROM_PREP_TO_INSEM"];
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save();
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
        $this->buildSearchSql($where, $this->PaID, $default, false); // PaID
        $this->buildSearchSql($where, $this->PaName, $default, false); // PaName
        $this->buildSearchSql($where, $this->PaMobile, $default, false); // PaMobile
        $this->buildSearchSql($where, $this->PartnerID, $default, false); // PartnerID
        $this->buildSearchSql($where, $this->PartnerName, $default, false); // PartnerName
        $this->buildSearchSql($where, $this->PartnerMobile, $default, false); // PartnerMobile
        $this->buildSearchSql($where, $this->RIDNo, $default, false); // RIDNo
        $this->buildSearchSql($where, $this->PatientName, $default, false); // PatientName
        $this->buildSearchSql($where, $this->HusbandName, $default, false); // HusbandName
        $this->buildSearchSql($where, $this->RequestDr, $default, false); // RequestDr
        $this->buildSearchSql($where, $this->CollectionDate, $default, false); // CollectionDate
        $this->buildSearchSql($where, $this->ResultDate, $default, false); // ResultDate
        $this->buildSearchSql($where, $this->RequestSample, $default, false); // RequestSample
        $this->buildSearchSql($where, $this->CollectionType, $default, false); // CollectionType
        $this->buildSearchSql($where, $this->CollectionMethod, $default, false); // CollectionMethod
        $this->buildSearchSql($where, $this->Medicationused, $default, false); // Medicationused
        $this->buildSearchSql($where, $this->DifficultiesinCollection, $default, false); // DifficultiesinCollection
        $this->buildSearchSql($where, $this->Volume, $default, false); // Volume
        $this->buildSearchSql($where, $this->pH, $default, false); // pH
        $this->buildSearchSql($where, $this->Timeofcollection, $default, false); // Timeofcollection
        $this->buildSearchSql($where, $this->Timeofexamination, $default, false); // Timeofexamination
        $this->buildSearchSql($where, $this->Concentration, $default, false); // Concentration
        $this->buildSearchSql($where, $this->Total, $default, false); // Total
        $this->buildSearchSql($where, $this->ProgressiveMotility, $default, false); // ProgressiveMotility
        $this->buildSearchSql($where, $this->NonProgrssiveMotile, $default, false); // NonProgrssiveMotile
        $this->buildSearchSql($where, $this->Immotile, $default, false); // Immotile
        $this->buildSearchSql($where, $this->TotalProgrssiveMotile, $default, false); // TotalProgrssiveMotile
        $this->buildSearchSql($where, $this->Appearance, $default, false); // Appearance
        $this->buildSearchSql($where, $this->Homogenosity, $default, false); // Homogenosity
        $this->buildSearchSql($where, $this->CompleteSample, $default, false); // CompleteSample
        $this->buildSearchSql($where, $this->Liquefactiontime, $default, false); // Liquefactiontime
        $this->buildSearchSql($where, $this->Normal, $default, false); // Normal
        $this->buildSearchSql($where, $this->Abnormal, $default, false); // Abnormal
        $this->buildSearchSql($where, $this->Headdefects, $default, false); // Headdefects
        $this->buildSearchSql($where, $this->MidpieceDefects, $default, false); // MidpieceDefects
        $this->buildSearchSql($where, $this->TailDefects, $default, false); // TailDefects
        $this->buildSearchSql($where, $this->NormalProgMotile, $default, false); // NormalProgMotile
        $this->buildSearchSql($where, $this->ImmatureForms, $default, false); // ImmatureForms
        $this->buildSearchSql($where, $this->Leucocytes, $default, false); // Leucocytes
        $this->buildSearchSql($where, $this->Agglutination, $default, false); // Agglutination
        $this->buildSearchSql($where, $this->Debris, $default, false); // Debris
        $this->buildSearchSql($where, $this->Diagnosis, $default, false); // Diagnosis
        $this->buildSearchSql($where, $this->Observations, $default, false); // Observations
        $this->buildSearchSql($where, $this->Signature, $default, false); // Signature
        $this->buildSearchSql($where, $this->SemenOrgin, $default, false); // SemenOrgin
        $this->buildSearchSql($where, $this->Donor, $default, false); // Donor
        $this->buildSearchSql($where, $this->DonorBloodgroup, $default, false); // DonorBloodgroup
        $this->buildSearchSql($where, $this->Tank, $default, false); // Tank
        $this->buildSearchSql($where, $this->Location, $default, false); // Location
        $this->buildSearchSql($where, $this->Volume1, $default, false); // Volume1
        $this->buildSearchSql($where, $this->Concentration1, $default, false); // Concentration1
        $this->buildSearchSql($where, $this->Total1, $default, false); // Total1
        $this->buildSearchSql($where, $this->ProgressiveMotility1, $default, false); // ProgressiveMotility1
        $this->buildSearchSql($where, $this->NonProgrssiveMotile1, $default, false); // NonProgrssiveMotile1
        $this->buildSearchSql($where, $this->Immotile1, $default, false); // Immotile1
        $this->buildSearchSql($where, $this->TotalProgrssiveMotile1, $default, false); // TotalProgrssiveMotile1
        $this->buildSearchSql($where, $this->TidNo, $default, false); // TidNo
        $this->buildSearchSql($where, $this->Color, $default, false); // Color
        $this->buildSearchSql($where, $this->DoneBy, $default, false); // DoneBy
        $this->buildSearchSql($where, $this->Method, $default, false); // Method
        $this->buildSearchSql($where, $this->Abstinence, $default, false); // Abstinence
        $this->buildSearchSql($where, $this->ProcessedBy, $default, false); // ProcessedBy
        $this->buildSearchSql($where, $this->InseminationTime, $default, false); // InseminationTime
        $this->buildSearchSql($where, $this->InseminationBy, $default, false); // InseminationBy
        $this->buildSearchSql($where, $this->Big, $default, false); // Big
        $this->buildSearchSql($where, $this->Medium, $default, false); // Medium
        $this->buildSearchSql($where, $this->Small, $default, false); // Small
        $this->buildSearchSql($where, $this->NoHalo, $default, false); // NoHalo
        $this->buildSearchSql($where, $this->Fragmented, $default, false); // Fragmented
        $this->buildSearchSql($where, $this->NonFragmented, $default, false); // NonFragmented
        $this->buildSearchSql($where, $this->DFI, $default, false); // DFI
        $this->buildSearchSql($where, $this->IsueBy, $default, false); // IsueBy
        $this->buildSearchSql($where, $this->Volume2, $default, false); // Volume2
        $this->buildSearchSql($where, $this->Concentration2, $default, false); // Concentration2
        $this->buildSearchSql($where, $this->Total2, $default, false); // Total2
        $this->buildSearchSql($where, $this->ProgressiveMotility2, $default, false); // ProgressiveMotility2
        $this->buildSearchSql($where, $this->NonProgrssiveMotile2, $default, false); // NonProgrssiveMotile2
        $this->buildSearchSql($where, $this->Immotile2, $default, false); // Immotile2
        $this->buildSearchSql($where, $this->TotalProgrssiveMotile2, $default, false); // TotalProgrssiveMotile2
        $this->buildSearchSql($where, $this->IssuedBy, $default, false); // IssuedBy
        $this->buildSearchSql($where, $this->IssuedTo, $default, false); // IssuedTo
        $this->buildSearchSql($where, $this->MACS, $default, true); // MACS
        $this->buildSearchSql($where, $this->PREG_TEST_DATE, $default, false); // PREG_TEST_DATE
        $this->buildSearchSql($where, $this->SPECIFIC_PROBLEMS, $default, false); // SPECIFIC_PROBLEMS
        $this->buildSearchSql($where, $this->IMSC_1, $default, false); // IMSC_1
        $this->buildSearchSql($where, $this->IMSC_2, $default, false); // IMSC_2
        $this->buildSearchSql($where, $this->LIQUIFACTION_STORAGE, $default, false); // LIQUIFACTION_STORAGE
        $this->buildSearchSql($where, $this->IUI_PREP_METHOD, $default, false); // IUI_PREP_METHOD
        $this->buildSearchSql($where, $this->TIME_FROM_TRIGGER, $default, false); // TIME_FROM_TRIGGER
        $this->buildSearchSql($where, $this->COLLECTION_TO_PREPARATION, $default, false); // COLLECTION_TO_PREPARATION
        $this->buildSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $default, false); // TIME_FROM_PREP_TO_INSEM

        // Set up search parm
        if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
            $this->Command = "search";
        }
        if (!$default && $this->Command == "search") {
            $this->id->AdvancedSearch->save(); // id
            $this->PaID->AdvancedSearch->save(); // PaID
            $this->PaName->AdvancedSearch->save(); // PaName
            $this->PaMobile->AdvancedSearch->save(); // PaMobile
            $this->PartnerID->AdvancedSearch->save(); // PartnerID
            $this->PartnerName->AdvancedSearch->save(); // PartnerName
            $this->PartnerMobile->AdvancedSearch->save(); // PartnerMobile
            $this->RIDNo->AdvancedSearch->save(); // RIDNo
            $this->PatientName->AdvancedSearch->save(); // PatientName
            $this->HusbandName->AdvancedSearch->save(); // HusbandName
            $this->RequestDr->AdvancedSearch->save(); // RequestDr
            $this->CollectionDate->AdvancedSearch->save(); // CollectionDate
            $this->ResultDate->AdvancedSearch->save(); // ResultDate
            $this->RequestSample->AdvancedSearch->save(); // RequestSample
            $this->CollectionType->AdvancedSearch->save(); // CollectionType
            $this->CollectionMethod->AdvancedSearch->save(); // CollectionMethod
            $this->Medicationused->AdvancedSearch->save(); // Medicationused
            $this->DifficultiesinCollection->AdvancedSearch->save(); // DifficultiesinCollection
            $this->Volume->AdvancedSearch->save(); // Volume
            $this->pH->AdvancedSearch->save(); // pH
            $this->Timeofcollection->AdvancedSearch->save(); // Timeofcollection
            $this->Timeofexamination->AdvancedSearch->save(); // Timeofexamination
            $this->Concentration->AdvancedSearch->save(); // Concentration
            $this->Total->AdvancedSearch->save(); // Total
            $this->ProgressiveMotility->AdvancedSearch->save(); // ProgressiveMotility
            $this->NonProgrssiveMotile->AdvancedSearch->save(); // NonProgrssiveMotile
            $this->Immotile->AdvancedSearch->save(); // Immotile
            $this->TotalProgrssiveMotile->AdvancedSearch->save(); // TotalProgrssiveMotile
            $this->Appearance->AdvancedSearch->save(); // Appearance
            $this->Homogenosity->AdvancedSearch->save(); // Homogenosity
            $this->CompleteSample->AdvancedSearch->save(); // CompleteSample
            $this->Liquefactiontime->AdvancedSearch->save(); // Liquefactiontime
            $this->Normal->AdvancedSearch->save(); // Normal
            $this->Abnormal->AdvancedSearch->save(); // Abnormal
            $this->Headdefects->AdvancedSearch->save(); // Headdefects
            $this->MidpieceDefects->AdvancedSearch->save(); // MidpieceDefects
            $this->TailDefects->AdvancedSearch->save(); // TailDefects
            $this->NormalProgMotile->AdvancedSearch->save(); // NormalProgMotile
            $this->ImmatureForms->AdvancedSearch->save(); // ImmatureForms
            $this->Leucocytes->AdvancedSearch->save(); // Leucocytes
            $this->Agglutination->AdvancedSearch->save(); // Agglutination
            $this->Debris->AdvancedSearch->save(); // Debris
            $this->Diagnosis->AdvancedSearch->save(); // Diagnosis
            $this->Observations->AdvancedSearch->save(); // Observations
            $this->Signature->AdvancedSearch->save(); // Signature
            $this->SemenOrgin->AdvancedSearch->save(); // SemenOrgin
            $this->Donor->AdvancedSearch->save(); // Donor
            $this->DonorBloodgroup->AdvancedSearch->save(); // DonorBloodgroup
            $this->Tank->AdvancedSearch->save(); // Tank
            $this->Location->AdvancedSearch->save(); // Location
            $this->Volume1->AdvancedSearch->save(); // Volume1
            $this->Concentration1->AdvancedSearch->save(); // Concentration1
            $this->Total1->AdvancedSearch->save(); // Total1
            $this->ProgressiveMotility1->AdvancedSearch->save(); // ProgressiveMotility1
            $this->NonProgrssiveMotile1->AdvancedSearch->save(); // NonProgrssiveMotile1
            $this->Immotile1->AdvancedSearch->save(); // Immotile1
            $this->TotalProgrssiveMotile1->AdvancedSearch->save(); // TotalProgrssiveMotile1
            $this->TidNo->AdvancedSearch->save(); // TidNo
            $this->Color->AdvancedSearch->save(); // Color
            $this->DoneBy->AdvancedSearch->save(); // DoneBy
            $this->Method->AdvancedSearch->save(); // Method
            $this->Abstinence->AdvancedSearch->save(); // Abstinence
            $this->ProcessedBy->AdvancedSearch->save(); // ProcessedBy
            $this->InseminationTime->AdvancedSearch->save(); // InseminationTime
            $this->InseminationBy->AdvancedSearch->save(); // InseminationBy
            $this->Big->AdvancedSearch->save(); // Big
            $this->Medium->AdvancedSearch->save(); // Medium
            $this->Small->AdvancedSearch->save(); // Small
            $this->NoHalo->AdvancedSearch->save(); // NoHalo
            $this->Fragmented->AdvancedSearch->save(); // Fragmented
            $this->NonFragmented->AdvancedSearch->save(); // NonFragmented
            $this->DFI->AdvancedSearch->save(); // DFI
            $this->IsueBy->AdvancedSearch->save(); // IsueBy
            $this->Volume2->AdvancedSearch->save(); // Volume2
            $this->Concentration2->AdvancedSearch->save(); // Concentration2
            $this->Total2->AdvancedSearch->save(); // Total2
            $this->ProgressiveMotility2->AdvancedSearch->save(); // ProgressiveMotility2
            $this->NonProgrssiveMotile2->AdvancedSearch->save(); // NonProgrssiveMotile2
            $this->Immotile2->AdvancedSearch->save(); // Immotile2
            $this->TotalProgrssiveMotile2->AdvancedSearch->save(); // TotalProgrssiveMotile2
            $this->IssuedBy->AdvancedSearch->save(); // IssuedBy
            $this->IssuedTo->AdvancedSearch->save(); // IssuedTo
            $this->MACS->AdvancedSearch->save(); // MACS
            $this->PREG_TEST_DATE->AdvancedSearch->save(); // PREG_TEST_DATE
            $this->SPECIFIC_PROBLEMS->AdvancedSearch->save(); // SPECIFIC_PROBLEMS
            $this->IMSC_1->AdvancedSearch->save(); // IMSC_1
            $this->IMSC_2->AdvancedSearch->save(); // IMSC_2
            $this->LIQUIFACTION_STORAGE->AdvancedSearch->save(); // LIQUIFACTION_STORAGE
            $this->IUI_PREP_METHOD->AdvancedSearch->save(); // IUI_PREP_METHOD
            $this->TIME_FROM_TRIGGER->AdvancedSearch->save(); // TIME_FROM_TRIGGER
            $this->COLLECTION_TO_PREPARATION->AdvancedSearch->save(); // COLLECTION_TO_PREPARATION
            $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->save(); // TIME_FROM_PREP_TO_INSEM
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
        $this->buildBasicSearchSql($where, $this->PaID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PaMobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerID, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PartnerMobile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->PatientName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->HusbandName, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RequestDr, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->RequestSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollectionType, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CollectionMethod, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medicationused, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DifficultiesinCollection, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->pH, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Timeofcollection, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Timeofexamination, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Appearance, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Homogenosity, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->CompleteSample, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Liquefactiontime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Normal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abnormal, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Headdefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MidpieceDefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TailDefects, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NormalProgMotile, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ImmatureForms, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Leucocytes, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Agglutination, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Debris, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Diagnosis, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Observations, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Signature, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SemenOrgin, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DonorBloodgroup, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Tank, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Location, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Color, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DoneBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Method, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Abstinence, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProcessedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminationTime, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->InseminationBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Big, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Medium, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Small, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NoHalo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Fragmented, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonFragmented, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->DFI, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IsueBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Volume2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Concentration2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Total2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->ProgressiveMotility2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->NonProgrssiveMotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->Immotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TotalProgrssiveMotile2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IssuedBy, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IssuedTo, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->MACS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->SPECIFIC_PROBLEMS, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_1, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IMSC_2, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->LIQUIFACTION_STORAGE, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->IUI_PREP_METHOD, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_TRIGGER, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->COLLECTION_TO_PREPARATION, $arKeywords, $type);
        $this->buildBasicSearchSql($where, $this->TIME_FROM_PREP_TO_INSEM, $arKeywords, $type);
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
        if ($this->PaID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PaName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PaMobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerID->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PartnerMobile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RIDNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PatientName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->HusbandName->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RequestDr->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CollectionDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ResultDate->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->RequestSample->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CollectionType->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CollectionMethod->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Medicationused->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DifficultiesinCollection->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Volume->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->pH->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Timeofcollection->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Timeofexamination->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Concentration->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Total->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProgressiveMotility->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NonProgrssiveMotile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Immotile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TotalProgrssiveMotile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Appearance->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Homogenosity->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->CompleteSample->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Liquefactiontime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Normal->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Abnormal->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Headdefects->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MidpieceDefects->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TailDefects->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NormalProgMotile->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ImmatureForms->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Leucocytes->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Agglutination->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Debris->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Diagnosis->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Observations->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Signature->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SemenOrgin->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Donor->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DonorBloodgroup->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Tank->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Location->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Volume1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Concentration1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Total1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProgressiveMotility1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NonProgrssiveMotile1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Immotile1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TotalProgrssiveMotile1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TidNo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Color->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DoneBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Method->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Abstinence->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProcessedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->InseminationTime->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->InseminationBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Big->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Medium->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Small->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NoHalo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Fragmented->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NonFragmented->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->DFI->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IsueBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Volume2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Concentration2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Total2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->ProgressiveMotility2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->NonProgrssiveMotile2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->Immotile2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TotalProgrssiveMotile2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IssuedBy->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IssuedTo->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->MACS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->PREG_TEST_DATE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->SPECIFIC_PROBLEMS->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMSC_1->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IMSC_2->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->LIQUIFACTION_STORAGE->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->IUI_PREP_METHOD->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIME_FROM_TRIGGER->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->COLLECTION_TO_PREPARATION->AdvancedSearch->issetSession()) {
            return true;
        }
        if ($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->issetSession()) {
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
                $this->PaID->AdvancedSearch->unsetSession();
                $this->PaName->AdvancedSearch->unsetSession();
                $this->PaMobile->AdvancedSearch->unsetSession();
                $this->PartnerID->AdvancedSearch->unsetSession();
                $this->PartnerName->AdvancedSearch->unsetSession();
                $this->PartnerMobile->AdvancedSearch->unsetSession();
                $this->RIDNo->AdvancedSearch->unsetSession();
                $this->PatientName->AdvancedSearch->unsetSession();
                $this->HusbandName->AdvancedSearch->unsetSession();
                $this->RequestDr->AdvancedSearch->unsetSession();
                $this->CollectionDate->AdvancedSearch->unsetSession();
                $this->ResultDate->AdvancedSearch->unsetSession();
                $this->RequestSample->AdvancedSearch->unsetSession();
                $this->CollectionType->AdvancedSearch->unsetSession();
                $this->CollectionMethod->AdvancedSearch->unsetSession();
                $this->Medicationused->AdvancedSearch->unsetSession();
                $this->DifficultiesinCollection->AdvancedSearch->unsetSession();
                $this->Volume->AdvancedSearch->unsetSession();
                $this->pH->AdvancedSearch->unsetSession();
                $this->Timeofcollection->AdvancedSearch->unsetSession();
                $this->Timeofexamination->AdvancedSearch->unsetSession();
                $this->Concentration->AdvancedSearch->unsetSession();
                $this->Total->AdvancedSearch->unsetSession();
                $this->ProgressiveMotility->AdvancedSearch->unsetSession();
                $this->NonProgrssiveMotile->AdvancedSearch->unsetSession();
                $this->Immotile->AdvancedSearch->unsetSession();
                $this->TotalProgrssiveMotile->AdvancedSearch->unsetSession();
                $this->Appearance->AdvancedSearch->unsetSession();
                $this->Homogenosity->AdvancedSearch->unsetSession();
                $this->CompleteSample->AdvancedSearch->unsetSession();
                $this->Liquefactiontime->AdvancedSearch->unsetSession();
                $this->Normal->AdvancedSearch->unsetSession();
                $this->Abnormal->AdvancedSearch->unsetSession();
                $this->Headdefects->AdvancedSearch->unsetSession();
                $this->MidpieceDefects->AdvancedSearch->unsetSession();
                $this->TailDefects->AdvancedSearch->unsetSession();
                $this->NormalProgMotile->AdvancedSearch->unsetSession();
                $this->ImmatureForms->AdvancedSearch->unsetSession();
                $this->Leucocytes->AdvancedSearch->unsetSession();
                $this->Agglutination->AdvancedSearch->unsetSession();
                $this->Debris->AdvancedSearch->unsetSession();
                $this->Diagnosis->AdvancedSearch->unsetSession();
                $this->Observations->AdvancedSearch->unsetSession();
                $this->Signature->AdvancedSearch->unsetSession();
                $this->SemenOrgin->AdvancedSearch->unsetSession();
                $this->Donor->AdvancedSearch->unsetSession();
                $this->DonorBloodgroup->AdvancedSearch->unsetSession();
                $this->Tank->AdvancedSearch->unsetSession();
                $this->Location->AdvancedSearch->unsetSession();
                $this->Volume1->AdvancedSearch->unsetSession();
                $this->Concentration1->AdvancedSearch->unsetSession();
                $this->Total1->AdvancedSearch->unsetSession();
                $this->ProgressiveMotility1->AdvancedSearch->unsetSession();
                $this->NonProgrssiveMotile1->AdvancedSearch->unsetSession();
                $this->Immotile1->AdvancedSearch->unsetSession();
                $this->TotalProgrssiveMotile1->AdvancedSearch->unsetSession();
                $this->TidNo->AdvancedSearch->unsetSession();
                $this->Color->AdvancedSearch->unsetSession();
                $this->DoneBy->AdvancedSearch->unsetSession();
                $this->Method->AdvancedSearch->unsetSession();
                $this->Abstinence->AdvancedSearch->unsetSession();
                $this->ProcessedBy->AdvancedSearch->unsetSession();
                $this->InseminationTime->AdvancedSearch->unsetSession();
                $this->InseminationBy->AdvancedSearch->unsetSession();
                $this->Big->AdvancedSearch->unsetSession();
                $this->Medium->AdvancedSearch->unsetSession();
                $this->Small->AdvancedSearch->unsetSession();
                $this->NoHalo->AdvancedSearch->unsetSession();
                $this->Fragmented->AdvancedSearch->unsetSession();
                $this->NonFragmented->AdvancedSearch->unsetSession();
                $this->DFI->AdvancedSearch->unsetSession();
                $this->IsueBy->AdvancedSearch->unsetSession();
                $this->Volume2->AdvancedSearch->unsetSession();
                $this->Concentration2->AdvancedSearch->unsetSession();
                $this->Total2->AdvancedSearch->unsetSession();
                $this->ProgressiveMotility2->AdvancedSearch->unsetSession();
                $this->NonProgrssiveMotile2->AdvancedSearch->unsetSession();
                $this->Immotile2->AdvancedSearch->unsetSession();
                $this->TotalProgrssiveMotile2->AdvancedSearch->unsetSession();
                $this->IssuedBy->AdvancedSearch->unsetSession();
                $this->IssuedTo->AdvancedSearch->unsetSession();
                $this->MACS->AdvancedSearch->unsetSession();
                $this->PREG_TEST_DATE->AdvancedSearch->unsetSession();
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->unsetSession();
                $this->IMSC_1->AdvancedSearch->unsetSession();
                $this->IMSC_2->AdvancedSearch->unsetSession();
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->unsetSession();
                $this->IUI_PREP_METHOD->AdvancedSearch->unsetSession();
                $this->TIME_FROM_TRIGGER->AdvancedSearch->unsetSession();
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->unsetSession();
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->unsetSession();
    }

    // Restore all search parameters
    protected function restoreSearchParms()
    {
        $this->RestoreSearch = true;

        // Restore basic search values
        $this->BasicSearch->load();

        // Restore advanced search values
                $this->id->AdvancedSearch->load();
                $this->PaID->AdvancedSearch->load();
                $this->PaName->AdvancedSearch->load();
                $this->PaMobile->AdvancedSearch->load();
                $this->PartnerID->AdvancedSearch->load();
                $this->PartnerName->AdvancedSearch->load();
                $this->PartnerMobile->AdvancedSearch->load();
                $this->RIDNo->AdvancedSearch->load();
                $this->PatientName->AdvancedSearch->load();
                $this->HusbandName->AdvancedSearch->load();
                $this->RequestDr->AdvancedSearch->load();
                $this->CollectionDate->AdvancedSearch->load();
                $this->ResultDate->AdvancedSearch->load();
                $this->RequestSample->AdvancedSearch->load();
                $this->CollectionType->AdvancedSearch->load();
                $this->CollectionMethod->AdvancedSearch->load();
                $this->Medicationused->AdvancedSearch->load();
                $this->DifficultiesinCollection->AdvancedSearch->load();
                $this->Volume->AdvancedSearch->load();
                $this->pH->AdvancedSearch->load();
                $this->Timeofcollection->AdvancedSearch->load();
                $this->Timeofexamination->AdvancedSearch->load();
                $this->Concentration->AdvancedSearch->load();
                $this->Total->AdvancedSearch->load();
                $this->ProgressiveMotility->AdvancedSearch->load();
                $this->NonProgrssiveMotile->AdvancedSearch->load();
                $this->Immotile->AdvancedSearch->load();
                $this->TotalProgrssiveMotile->AdvancedSearch->load();
                $this->Appearance->AdvancedSearch->load();
                $this->Homogenosity->AdvancedSearch->load();
                $this->CompleteSample->AdvancedSearch->load();
                $this->Liquefactiontime->AdvancedSearch->load();
                $this->Normal->AdvancedSearch->load();
                $this->Abnormal->AdvancedSearch->load();
                $this->Headdefects->AdvancedSearch->load();
                $this->MidpieceDefects->AdvancedSearch->load();
                $this->TailDefects->AdvancedSearch->load();
                $this->NormalProgMotile->AdvancedSearch->load();
                $this->ImmatureForms->AdvancedSearch->load();
                $this->Leucocytes->AdvancedSearch->load();
                $this->Agglutination->AdvancedSearch->load();
                $this->Debris->AdvancedSearch->load();
                $this->Diagnosis->AdvancedSearch->load();
                $this->Observations->AdvancedSearch->load();
                $this->Signature->AdvancedSearch->load();
                $this->SemenOrgin->AdvancedSearch->load();
                $this->Donor->AdvancedSearch->load();
                $this->DonorBloodgroup->AdvancedSearch->load();
                $this->Tank->AdvancedSearch->load();
                $this->Location->AdvancedSearch->load();
                $this->Volume1->AdvancedSearch->load();
                $this->Concentration1->AdvancedSearch->load();
                $this->Total1->AdvancedSearch->load();
                $this->ProgressiveMotility1->AdvancedSearch->load();
                $this->NonProgrssiveMotile1->AdvancedSearch->load();
                $this->Immotile1->AdvancedSearch->load();
                $this->TotalProgrssiveMotile1->AdvancedSearch->load();
                $this->TidNo->AdvancedSearch->load();
                $this->Color->AdvancedSearch->load();
                $this->DoneBy->AdvancedSearch->load();
                $this->Method->AdvancedSearch->load();
                $this->Abstinence->AdvancedSearch->load();
                $this->ProcessedBy->AdvancedSearch->load();
                $this->InseminationTime->AdvancedSearch->load();
                $this->InseminationBy->AdvancedSearch->load();
                $this->Big->AdvancedSearch->load();
                $this->Medium->AdvancedSearch->load();
                $this->Small->AdvancedSearch->load();
                $this->NoHalo->AdvancedSearch->load();
                $this->Fragmented->AdvancedSearch->load();
                $this->NonFragmented->AdvancedSearch->load();
                $this->DFI->AdvancedSearch->load();
                $this->IsueBy->AdvancedSearch->load();
                $this->Volume2->AdvancedSearch->load();
                $this->Concentration2->AdvancedSearch->load();
                $this->Total2->AdvancedSearch->load();
                $this->ProgressiveMotility2->AdvancedSearch->load();
                $this->NonProgrssiveMotile2->AdvancedSearch->load();
                $this->Immotile2->AdvancedSearch->load();
                $this->TotalProgrssiveMotile2->AdvancedSearch->load();
                $this->IssuedBy->AdvancedSearch->load();
                $this->IssuedTo->AdvancedSearch->load();
                $this->MACS->AdvancedSearch->load();
                $this->PREG_TEST_DATE->AdvancedSearch->load();
                $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
                $this->IMSC_1->AdvancedSearch->load();
                $this->IMSC_2->AdvancedSearch->load();
                $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
                $this->IUI_PREP_METHOD->AdvancedSearch->load();
                $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
                $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
                $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
            $this->updateSort($this->id); // id
            $this->updateSort($this->PaID); // PaID
            $this->updateSort($this->PaName); // PaName
            $this->updateSort($this->PaMobile); // PaMobile
            $this->updateSort($this->PartnerID); // PartnerID
            $this->updateSort($this->PartnerName); // PartnerName
            $this->updateSort($this->PartnerMobile); // PartnerMobile
            $this->updateSort($this->RequestDr); // RequestDr
            $this->updateSort($this->CollectionDate); // CollectionDate
            $this->updateSort($this->ResultDate); // ResultDate
            $this->updateSort($this->RequestSample); // RequestSample
            $this->updateSort($this->TidNo); // TidNo
            $this->updateSort($this->PREG_TEST_DATE); // PREG_TEST_DATE
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
                $this->PaID->setSort("");
                $this->PaName->setSort("");
                $this->PaMobile->setSort("");
                $this->PartnerID->setSort("");
                $this->PartnerName->setSort("");
                $this->PartnerMobile->setSort("");
                $this->RIDNo->setSort("");
                $this->PatientName->setSort("");
                $this->HusbandName->setSort("");
                $this->RequestDr->setSort("");
                $this->CollectionDate->setSort("");
                $this->ResultDate->setSort("");
                $this->RequestSample->setSort("");
                $this->CollectionType->setSort("");
                $this->CollectionMethod->setSort("");
                $this->Medicationused->setSort("");
                $this->DifficultiesinCollection->setSort("");
                $this->Volume->setSort("");
                $this->pH->setSort("");
                $this->Timeofcollection->setSort("");
                $this->Timeofexamination->setSort("");
                $this->Concentration->setSort("");
                $this->Total->setSort("");
                $this->ProgressiveMotility->setSort("");
                $this->NonProgrssiveMotile->setSort("");
                $this->Immotile->setSort("");
                $this->TotalProgrssiveMotile->setSort("");
                $this->Appearance->setSort("");
                $this->Homogenosity->setSort("");
                $this->CompleteSample->setSort("");
                $this->Liquefactiontime->setSort("");
                $this->Normal->setSort("");
                $this->Abnormal->setSort("");
                $this->Headdefects->setSort("");
                $this->MidpieceDefects->setSort("");
                $this->TailDefects->setSort("");
                $this->NormalProgMotile->setSort("");
                $this->ImmatureForms->setSort("");
                $this->Leucocytes->setSort("");
                $this->Agglutination->setSort("");
                $this->Debris->setSort("");
                $this->Diagnosis->setSort("");
                $this->Observations->setSort("");
                $this->Signature->setSort("");
                $this->SemenOrgin->setSort("");
                $this->Donor->setSort("");
                $this->DonorBloodgroup->setSort("");
                $this->Tank->setSort("");
                $this->Location->setSort("");
                $this->Volume1->setSort("");
                $this->Concentration1->setSort("");
                $this->Total1->setSort("");
                $this->ProgressiveMotility1->setSort("");
                $this->NonProgrssiveMotile1->setSort("");
                $this->Immotile1->setSort("");
                $this->TotalProgrssiveMotile1->setSort("");
                $this->TidNo->setSort("");
                $this->Color->setSort("");
                $this->DoneBy->setSort("");
                $this->Method->setSort("");
                $this->Abstinence->setSort("");
                $this->ProcessedBy->setSort("");
                $this->InseminationTime->setSort("");
                $this->InseminationBy->setSort("");
                $this->Big->setSort("");
                $this->Medium->setSort("");
                $this->Small->setSort("");
                $this->NoHalo->setSort("");
                $this->Fragmented->setSort("");
                $this->NonFragmented->setSort("");
                $this->DFI->setSort("");
                $this->IsueBy->setSort("");
                $this->Volume2->setSort("");
                $this->Concentration2->setSort("");
                $this->Total2->setSort("");
                $this->ProgressiveMotility2->setSort("");
                $this->NonProgrssiveMotile2->setSort("");
                $this->Immotile2->setSort("");
                $this->TotalProgrssiveMotile2->setSort("");
                $this->IssuedBy->setSort("");
                $this->IssuedTo->setSort("");
                $this->MACS->setSort("");
                $this->PREG_TEST_DATE->setSort("");
                $this->SPECIFIC_PROBLEMS->setSort("");
                $this->IMSC_1->setSort("");
                $this->IMSC_2->setSort("");
                $this->LIQUIFACTION_STORAGE->setSort("");
                $this->IUI_PREP_METHOD->setSort("");
                $this->TIME_FROM_TRIGGER->setSort("");
                $this->COLLECTION_TO_PREPARATION->setSort("");
                $this->TIME_FROM_PREP_TO_INSEM->setSort("");
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
        $item->Body = "<a class=\"ew-save-filter\" data-form=\"fview_semenanalysislistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
        $item->Visible = true;
        $item = &$this->FilterOptions->add("deletefilter");
        $item->Body = "<a class=\"ew-delete-filter\" data-form=\"fview_semenanalysislistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
                $item->Body = '<a class="ew-action ew-list-action" title="' . HtmlEncode($caption) . '" data-caption="' . HtmlEncode($caption) . '" href="#" onclick="return ew.submitAction(event,jQuery.extend({f:document.fview_semenanalysislist},' . $listaction->toJson(true) . '));">' . $icon . '</a>';
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

        // PaID
        if (!$this->isAddOrEdit() && $this->PaID->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaID->AdvancedSearch->SearchValue != "" || $this->PaID->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PaName
        if (!$this->isAddOrEdit() && $this->PaName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaName->AdvancedSearch->SearchValue != "" || $this->PaName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // PaMobile
        if (!$this->isAddOrEdit() && $this->PaMobile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PaMobile->AdvancedSearch->SearchValue != "" || $this->PaMobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // PartnerMobile
        if (!$this->isAddOrEdit() && $this->PartnerMobile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PartnerMobile->AdvancedSearch->SearchValue != "" || $this->PartnerMobile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RIDNo
        if (!$this->isAddOrEdit() && $this->RIDNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RIDNo->AdvancedSearch->SearchValue != "" || $this->RIDNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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

        // HusbandName
        if (!$this->isAddOrEdit() && $this->HusbandName->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->HusbandName->AdvancedSearch->SearchValue != "" || $this->HusbandName->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RequestDr
        if (!$this->isAddOrEdit() && $this->RequestDr->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RequestDr->AdvancedSearch->SearchValue != "" || $this->RequestDr->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CollectionDate
        if (!$this->isAddOrEdit() && $this->CollectionDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CollectionDate->AdvancedSearch->SearchValue != "" || $this->CollectionDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ResultDate
        if (!$this->isAddOrEdit() && $this->ResultDate->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ResultDate->AdvancedSearch->SearchValue != "" || $this->ResultDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // RequestSample
        if (!$this->isAddOrEdit() && $this->RequestSample->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->RequestSample->AdvancedSearch->SearchValue != "" || $this->RequestSample->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CollectionType
        if (!$this->isAddOrEdit() && $this->CollectionType->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CollectionType->AdvancedSearch->SearchValue != "" || $this->CollectionType->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CollectionMethod
        if (!$this->isAddOrEdit() && $this->CollectionMethod->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CollectionMethod->AdvancedSearch->SearchValue != "" || $this->CollectionMethod->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Medicationused
        if (!$this->isAddOrEdit() && $this->Medicationused->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Medicationused->AdvancedSearch->SearchValue != "" || $this->Medicationused->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DifficultiesinCollection
        if (!$this->isAddOrEdit() && $this->DifficultiesinCollection->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DifficultiesinCollection->AdvancedSearch->SearchValue != "" || $this->DifficultiesinCollection->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Volume
        if (!$this->isAddOrEdit() && $this->Volume->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Volume->AdvancedSearch->SearchValue != "" || $this->Volume->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // pH
        if (!$this->isAddOrEdit() && $this->pH->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->pH->AdvancedSearch->SearchValue != "" || $this->pH->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Timeofcollection
        if (!$this->isAddOrEdit() && $this->Timeofcollection->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Timeofcollection->AdvancedSearch->SearchValue != "" || $this->Timeofcollection->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Timeofexamination
        if (!$this->isAddOrEdit() && $this->Timeofexamination->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Timeofexamination->AdvancedSearch->SearchValue != "" || $this->Timeofexamination->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Concentration
        if (!$this->isAddOrEdit() && $this->Concentration->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Concentration->AdvancedSearch->SearchValue != "" || $this->Concentration->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Total
        if (!$this->isAddOrEdit() && $this->Total->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Total->AdvancedSearch->SearchValue != "" || $this->Total->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProgressiveMotility
        if (!$this->isAddOrEdit() && $this->ProgressiveMotility->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProgressiveMotility->AdvancedSearch->SearchValue != "" || $this->ProgressiveMotility->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NonProgrssiveMotile
        if (!$this->isAddOrEdit() && $this->NonProgrssiveMotile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NonProgrssiveMotile->AdvancedSearch->SearchValue != "" || $this->NonProgrssiveMotile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Immotile
        if (!$this->isAddOrEdit() && $this->Immotile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Immotile->AdvancedSearch->SearchValue != "" || $this->Immotile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TotalProgrssiveMotile
        if (!$this->isAddOrEdit() && $this->TotalProgrssiveMotile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TotalProgrssiveMotile->AdvancedSearch->SearchValue != "" || $this->TotalProgrssiveMotile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Appearance
        if (!$this->isAddOrEdit() && $this->Appearance->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Appearance->AdvancedSearch->SearchValue != "" || $this->Appearance->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Homogenosity
        if (!$this->isAddOrEdit() && $this->Homogenosity->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Homogenosity->AdvancedSearch->SearchValue != "" || $this->Homogenosity->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // CompleteSample
        if (!$this->isAddOrEdit() && $this->CompleteSample->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->CompleteSample->AdvancedSearch->SearchValue != "" || $this->CompleteSample->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Liquefactiontime
        if (!$this->isAddOrEdit() && $this->Liquefactiontime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Liquefactiontime->AdvancedSearch->SearchValue != "" || $this->Liquefactiontime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Normal
        if (!$this->isAddOrEdit() && $this->Normal->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Normal->AdvancedSearch->SearchValue != "" || $this->Normal->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Abnormal
        if (!$this->isAddOrEdit() && $this->Abnormal->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Abnormal->AdvancedSearch->SearchValue != "" || $this->Abnormal->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Headdefects
        if (!$this->isAddOrEdit() && $this->Headdefects->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Headdefects->AdvancedSearch->SearchValue != "" || $this->Headdefects->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // MidpieceDefects
        if (!$this->isAddOrEdit() && $this->MidpieceDefects->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->MidpieceDefects->AdvancedSearch->SearchValue != "" || $this->MidpieceDefects->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TailDefects
        if (!$this->isAddOrEdit() && $this->TailDefects->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TailDefects->AdvancedSearch->SearchValue != "" || $this->TailDefects->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NormalProgMotile
        if (!$this->isAddOrEdit() && $this->NormalProgMotile->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NormalProgMotile->AdvancedSearch->SearchValue != "" || $this->NormalProgMotile->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ImmatureForms
        if (!$this->isAddOrEdit() && $this->ImmatureForms->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ImmatureForms->AdvancedSearch->SearchValue != "" || $this->ImmatureForms->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Leucocytes
        if (!$this->isAddOrEdit() && $this->Leucocytes->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Leucocytes->AdvancedSearch->SearchValue != "" || $this->Leucocytes->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Agglutination
        if (!$this->isAddOrEdit() && $this->Agglutination->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Agglutination->AdvancedSearch->SearchValue != "" || $this->Agglutination->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Debris
        if (!$this->isAddOrEdit() && $this->Debris->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Debris->AdvancedSearch->SearchValue != "" || $this->Debris->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Diagnosis
        if (!$this->isAddOrEdit() && $this->Diagnosis->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Diagnosis->AdvancedSearch->SearchValue != "" || $this->Diagnosis->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Observations
        if (!$this->isAddOrEdit() && $this->Observations->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Observations->AdvancedSearch->SearchValue != "" || $this->Observations->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Signature
        if (!$this->isAddOrEdit() && $this->Signature->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Signature->AdvancedSearch->SearchValue != "" || $this->Signature->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SemenOrgin
        if (!$this->isAddOrEdit() && $this->SemenOrgin->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SemenOrgin->AdvancedSearch->SearchValue != "" || $this->SemenOrgin->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Donor
        if (!$this->isAddOrEdit() && $this->Donor->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Donor->AdvancedSearch->SearchValue != "" || $this->Donor->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DonorBloodgroup
        if (!$this->isAddOrEdit() && $this->DonorBloodgroup->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DonorBloodgroup->AdvancedSearch->SearchValue != "" || $this->DonorBloodgroup->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Tank
        if (!$this->isAddOrEdit() && $this->Tank->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Tank->AdvancedSearch->SearchValue != "" || $this->Tank->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Location
        if (!$this->isAddOrEdit() && $this->Location->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Location->AdvancedSearch->SearchValue != "" || $this->Location->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Volume1
        if (!$this->isAddOrEdit() && $this->Volume1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Volume1->AdvancedSearch->SearchValue != "" || $this->Volume1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Concentration1
        if (!$this->isAddOrEdit() && $this->Concentration1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Concentration1->AdvancedSearch->SearchValue != "" || $this->Concentration1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Total1
        if (!$this->isAddOrEdit() && $this->Total1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Total1->AdvancedSearch->SearchValue != "" || $this->Total1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProgressiveMotility1
        if (!$this->isAddOrEdit() && $this->ProgressiveMotility1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProgressiveMotility1->AdvancedSearch->SearchValue != "" || $this->ProgressiveMotility1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NonProgrssiveMotile1
        if (!$this->isAddOrEdit() && $this->NonProgrssiveMotile1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NonProgrssiveMotile1->AdvancedSearch->SearchValue != "" || $this->NonProgrssiveMotile1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Immotile1
        if (!$this->isAddOrEdit() && $this->Immotile1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Immotile1->AdvancedSearch->SearchValue != "" || $this->Immotile1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TotalProgrssiveMotile1
        if (!$this->isAddOrEdit() && $this->TotalProgrssiveMotile1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue != "" || $this->TotalProgrssiveMotile1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TidNo
        if (!$this->isAddOrEdit() && $this->TidNo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TidNo->AdvancedSearch->SearchValue != "" || $this->TidNo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Color
        if (!$this->isAddOrEdit() && $this->Color->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Color->AdvancedSearch->SearchValue != "" || $this->Color->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DoneBy
        if (!$this->isAddOrEdit() && $this->DoneBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DoneBy->AdvancedSearch->SearchValue != "" || $this->DoneBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Method
        if (!$this->isAddOrEdit() && $this->Method->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Method->AdvancedSearch->SearchValue != "" || $this->Method->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Abstinence
        if (!$this->isAddOrEdit() && $this->Abstinence->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Abstinence->AdvancedSearch->SearchValue != "" || $this->Abstinence->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProcessedBy
        if (!$this->isAddOrEdit() && $this->ProcessedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProcessedBy->AdvancedSearch->SearchValue != "" || $this->ProcessedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // InseminationTime
        if (!$this->isAddOrEdit() && $this->InseminationTime->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->InseminationTime->AdvancedSearch->SearchValue != "" || $this->InseminationTime->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // InseminationBy
        if (!$this->isAddOrEdit() && $this->InseminationBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->InseminationBy->AdvancedSearch->SearchValue != "" || $this->InseminationBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Big
        if (!$this->isAddOrEdit() && $this->Big->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Big->AdvancedSearch->SearchValue != "" || $this->Big->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Medium
        if (!$this->isAddOrEdit() && $this->Medium->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Medium->AdvancedSearch->SearchValue != "" || $this->Medium->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Small
        if (!$this->isAddOrEdit() && $this->Small->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Small->AdvancedSearch->SearchValue != "" || $this->Small->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NoHalo
        if (!$this->isAddOrEdit() && $this->NoHalo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NoHalo->AdvancedSearch->SearchValue != "" || $this->NoHalo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Fragmented
        if (!$this->isAddOrEdit() && $this->Fragmented->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Fragmented->AdvancedSearch->SearchValue != "" || $this->Fragmented->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NonFragmented
        if (!$this->isAddOrEdit() && $this->NonFragmented->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NonFragmented->AdvancedSearch->SearchValue != "" || $this->NonFragmented->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // DFI
        if (!$this->isAddOrEdit() && $this->DFI->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->DFI->AdvancedSearch->SearchValue != "" || $this->DFI->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IsueBy
        if (!$this->isAddOrEdit() && $this->IsueBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IsueBy->AdvancedSearch->SearchValue != "" || $this->IsueBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Volume2
        if (!$this->isAddOrEdit() && $this->Volume2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Volume2->AdvancedSearch->SearchValue != "" || $this->Volume2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Concentration2
        if (!$this->isAddOrEdit() && $this->Concentration2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Concentration2->AdvancedSearch->SearchValue != "" || $this->Concentration2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Total2
        if (!$this->isAddOrEdit() && $this->Total2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Total2->AdvancedSearch->SearchValue != "" || $this->Total2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // ProgressiveMotility2
        if (!$this->isAddOrEdit() && $this->ProgressiveMotility2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->ProgressiveMotility2->AdvancedSearch->SearchValue != "" || $this->ProgressiveMotility2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // NonProgrssiveMotile2
        if (!$this->isAddOrEdit() && $this->NonProgrssiveMotile2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->NonProgrssiveMotile2->AdvancedSearch->SearchValue != "" || $this->NonProgrssiveMotile2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // Immotile2
        if (!$this->isAddOrEdit() && $this->Immotile2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->Immotile2->AdvancedSearch->SearchValue != "" || $this->Immotile2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TotalProgrssiveMotile2
        if (!$this->isAddOrEdit() && $this->TotalProgrssiveMotile2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue != "" || $this->TotalProgrssiveMotile2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IssuedBy
        if (!$this->isAddOrEdit() && $this->IssuedBy->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IssuedBy->AdvancedSearch->SearchValue != "" || $this->IssuedBy->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IssuedTo
        if (!$this->isAddOrEdit() && $this->IssuedTo->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IssuedTo->AdvancedSearch->SearchValue != "" || $this->IssuedTo->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        if (is_array($this->MACS->AdvancedSearch->SearchValue)) {
            $this->MACS->AdvancedSearch->SearchValue = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue);
        }
        if (is_array($this->MACS->AdvancedSearch->SearchValue2)) {
            $this->MACS->AdvancedSearch->SearchValue2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $this->MACS->AdvancedSearch->SearchValue2);
        }

        // PREG_TEST_DATE
        if (!$this->isAddOrEdit() && $this->PREG_TEST_DATE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->PREG_TEST_DATE->AdvancedSearch->SearchValue != "" || $this->PREG_TEST_DATE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // SPECIFIC_PROBLEMS
        if (!$this->isAddOrEdit() && $this->SPECIFIC_PROBLEMS->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue != "" || $this->SPECIFIC_PROBLEMS->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMSC_1
        if (!$this->isAddOrEdit() && $this->IMSC_1->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMSC_1->AdvancedSearch->SearchValue != "" || $this->IMSC_1->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IMSC_2
        if (!$this->isAddOrEdit() && $this->IMSC_2->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IMSC_2->AdvancedSearch->SearchValue != "" || $this->IMSC_2->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // LIQUIFACTION_STORAGE
        if (!$this->isAddOrEdit() && $this->LIQUIFACTION_STORAGE->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue != "" || $this->LIQUIFACTION_STORAGE->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // IUI_PREP_METHOD
        if (!$this->isAddOrEdit() && $this->IUI_PREP_METHOD->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->IUI_PREP_METHOD->AdvancedSearch->SearchValue != "" || $this->IUI_PREP_METHOD->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME_FROM_TRIGGER
        if (!$this->isAddOrEdit() && $this->TIME_FROM_TRIGGER->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue != "" || $this->TIME_FROM_TRIGGER->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // COLLECTION_TO_PREPARATION
        if (!$this->isAddOrEdit() && $this->COLLECTION_TO_PREPARATION->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue != "" || $this->COLLECTION_TO_PREPARATION->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
                $this->Command = "search";
            }
        }

        // TIME_FROM_PREP_TO_INSEM
        if (!$this->isAddOrEdit() && $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->get()) {
            $hasValue = true;
            if (($this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue != "" || $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->SearchValue2 != "") && $this->Command == "") {
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
        $this->PaID->setDbValue($row['PaID']);
        $this->PaName->setDbValue($row['PaName']);
        $this->PaMobile->setDbValue($row['PaMobile']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
        $this->RIDNo->setDbValue($row['RIDNo']);
        $this->PatientName->setDbValue($row['PatientName']);
        $this->HusbandName->setDbValue($row['HusbandName']);
        $this->RequestDr->setDbValue($row['RequestDr']);
        $this->CollectionDate->setDbValue($row['CollectionDate']);
        $this->ResultDate->setDbValue($row['ResultDate']);
        $this->RequestSample->setDbValue($row['RequestSample']);
        $this->CollectionType->setDbValue($row['CollectionType']);
        $this->CollectionMethod->setDbValue($row['CollectionMethod']);
        $this->Medicationused->setDbValue($row['Medicationused']);
        $this->DifficultiesinCollection->setDbValue($row['DifficultiesinCollection']);
        $this->Volume->setDbValue($row['Volume']);
        $this->pH->setDbValue($row['pH']);
        $this->Timeofcollection->setDbValue($row['Timeofcollection']);
        $this->Timeofexamination->setDbValue($row['Timeofexamination']);
        $this->Concentration->setDbValue($row['Concentration']);
        $this->Total->setDbValue($row['Total']);
        $this->ProgressiveMotility->setDbValue($row['ProgressiveMotility']);
        $this->NonProgrssiveMotile->setDbValue($row['NonProgrssiveMotile']);
        $this->Immotile->setDbValue($row['Immotile']);
        $this->TotalProgrssiveMotile->setDbValue($row['TotalProgrssiveMotile']);
        $this->Appearance->setDbValue($row['Appearance']);
        $this->Homogenosity->setDbValue($row['Homogenosity']);
        $this->CompleteSample->setDbValue($row['CompleteSample']);
        $this->Liquefactiontime->setDbValue($row['Liquefactiontime']);
        $this->Normal->setDbValue($row['Normal']);
        $this->Abnormal->setDbValue($row['Abnormal']);
        $this->Headdefects->setDbValue($row['Headdefects']);
        $this->MidpieceDefects->setDbValue($row['MidpieceDefects']);
        $this->TailDefects->setDbValue($row['TailDefects']);
        $this->NormalProgMotile->setDbValue($row['NormalProgMotile']);
        $this->ImmatureForms->setDbValue($row['ImmatureForms']);
        $this->Leucocytes->setDbValue($row['Leucocytes']);
        $this->Agglutination->setDbValue($row['Agglutination']);
        $this->Debris->setDbValue($row['Debris']);
        $this->Diagnosis->setDbValue($row['Diagnosis']);
        $this->Observations->setDbValue($row['Observations']);
        $this->Signature->setDbValue($row['Signature']);
        $this->SemenOrgin->setDbValue($row['SemenOrgin']);
        $this->Donor->setDbValue($row['Donor']);
        $this->DonorBloodgroup->setDbValue($row['DonorBloodgroup']);
        $this->Tank->setDbValue($row['Tank']);
        $this->Location->setDbValue($row['Location']);
        $this->Volume1->setDbValue($row['Volume1']);
        $this->Concentration1->setDbValue($row['Concentration1']);
        $this->Total1->setDbValue($row['Total1']);
        $this->ProgressiveMotility1->setDbValue($row['ProgressiveMotility1']);
        $this->NonProgrssiveMotile1->setDbValue($row['NonProgrssiveMotile1']);
        $this->Immotile1->setDbValue($row['Immotile1']);
        $this->TotalProgrssiveMotile1->setDbValue($row['TotalProgrssiveMotile1']);
        $this->TidNo->setDbValue($row['TidNo']);
        $this->Color->setDbValue($row['Color']);
        $this->DoneBy->setDbValue($row['DoneBy']);
        $this->Method->setDbValue($row['Method']);
        $this->Abstinence->setDbValue($row['Abstinence']);
        $this->ProcessedBy->setDbValue($row['ProcessedBy']);
        $this->InseminationTime->setDbValue($row['InseminationTime']);
        $this->InseminationBy->setDbValue($row['InseminationBy']);
        $this->Big->setDbValue($row['Big']);
        $this->Medium->setDbValue($row['Medium']);
        $this->Small->setDbValue($row['Small']);
        $this->NoHalo->setDbValue($row['NoHalo']);
        $this->Fragmented->setDbValue($row['Fragmented']);
        $this->NonFragmented->setDbValue($row['NonFragmented']);
        $this->DFI->setDbValue($row['DFI']);
        $this->IsueBy->setDbValue($row['IsueBy']);
        $this->Volume2->setDbValue($row['Volume2']);
        $this->Concentration2->setDbValue($row['Concentration2']);
        $this->Total2->setDbValue($row['Total2']);
        $this->ProgressiveMotility2->setDbValue($row['ProgressiveMotility2']);
        $this->NonProgrssiveMotile2->setDbValue($row['NonProgrssiveMotile2']);
        $this->Immotile2->setDbValue($row['Immotile2']);
        $this->TotalProgrssiveMotile2->setDbValue($row['TotalProgrssiveMotile2']);
        $this->IssuedBy->setDbValue($row['IssuedBy']);
        $this->IssuedTo->setDbValue($row['IssuedTo']);
        $this->MACS->setDbValue($row['MACS']);
        $this->PREG_TEST_DATE->setDbValue($row['PREG_TEST_DATE']);
        $this->SPECIFIC_PROBLEMS->setDbValue($row['SPECIFIC_PROBLEMS']);
        $this->IMSC_1->setDbValue($row['IMSC_1']);
        $this->IMSC_2->setDbValue($row['IMSC_2']);
        $this->LIQUIFACTION_STORAGE->setDbValue($row['LIQUIFACTION_STORAGE']);
        $this->IUI_PREP_METHOD->setDbValue($row['IUI_PREP_METHOD']);
        $this->TIME_FROM_TRIGGER->setDbValue($row['TIME_FROM_TRIGGER']);
        $this->COLLECTION_TO_PREPARATION->setDbValue($row['COLLECTION_TO_PREPARATION']);
        $this->TIME_FROM_PREP_TO_INSEM->setDbValue($row['TIME_FROM_PREP_TO_INSEM']);
    }

    // Return a row with default values
    protected function newRow()
    {
        $row = [];
        $row['id'] = null;
        $row['PaID'] = null;
        $row['PaName'] = null;
        $row['PaMobile'] = null;
        $row['PartnerID'] = null;
        $row['PartnerName'] = null;
        $row['PartnerMobile'] = null;
        $row['RIDNo'] = null;
        $row['PatientName'] = null;
        $row['HusbandName'] = null;
        $row['RequestDr'] = null;
        $row['CollectionDate'] = null;
        $row['ResultDate'] = null;
        $row['RequestSample'] = null;
        $row['CollectionType'] = null;
        $row['CollectionMethod'] = null;
        $row['Medicationused'] = null;
        $row['DifficultiesinCollection'] = null;
        $row['Volume'] = null;
        $row['pH'] = null;
        $row['Timeofcollection'] = null;
        $row['Timeofexamination'] = null;
        $row['Concentration'] = null;
        $row['Total'] = null;
        $row['ProgressiveMotility'] = null;
        $row['NonProgrssiveMotile'] = null;
        $row['Immotile'] = null;
        $row['TotalProgrssiveMotile'] = null;
        $row['Appearance'] = null;
        $row['Homogenosity'] = null;
        $row['CompleteSample'] = null;
        $row['Liquefactiontime'] = null;
        $row['Normal'] = null;
        $row['Abnormal'] = null;
        $row['Headdefects'] = null;
        $row['MidpieceDefects'] = null;
        $row['TailDefects'] = null;
        $row['NormalProgMotile'] = null;
        $row['ImmatureForms'] = null;
        $row['Leucocytes'] = null;
        $row['Agglutination'] = null;
        $row['Debris'] = null;
        $row['Diagnosis'] = null;
        $row['Observations'] = null;
        $row['Signature'] = null;
        $row['SemenOrgin'] = null;
        $row['Donor'] = null;
        $row['DonorBloodgroup'] = null;
        $row['Tank'] = null;
        $row['Location'] = null;
        $row['Volume1'] = null;
        $row['Concentration1'] = null;
        $row['Total1'] = null;
        $row['ProgressiveMotility1'] = null;
        $row['NonProgrssiveMotile1'] = null;
        $row['Immotile1'] = null;
        $row['TotalProgrssiveMotile1'] = null;
        $row['TidNo'] = null;
        $row['Color'] = null;
        $row['DoneBy'] = null;
        $row['Method'] = null;
        $row['Abstinence'] = null;
        $row['ProcessedBy'] = null;
        $row['InseminationTime'] = null;
        $row['InseminationBy'] = null;
        $row['Big'] = null;
        $row['Medium'] = null;
        $row['Small'] = null;
        $row['NoHalo'] = null;
        $row['Fragmented'] = null;
        $row['NonFragmented'] = null;
        $row['DFI'] = null;
        $row['IsueBy'] = null;
        $row['Volume2'] = null;
        $row['Concentration2'] = null;
        $row['Total2'] = null;
        $row['ProgressiveMotility2'] = null;
        $row['NonProgrssiveMotile2'] = null;
        $row['Immotile2'] = null;
        $row['TotalProgrssiveMotile2'] = null;
        $row['IssuedBy'] = null;
        $row['IssuedTo'] = null;
        $row['MACS'] = null;
        $row['PREG_TEST_DATE'] = null;
        $row['SPECIFIC_PROBLEMS'] = null;
        $row['IMSC_1'] = null;
        $row['IMSC_2'] = null;
        $row['LIQUIFACTION_STORAGE'] = null;
        $row['IUI_PREP_METHOD'] = null;
        $row['TIME_FROM_TRIGGER'] = null;
        $row['COLLECTION_TO_PREPARATION'] = null;
        $row['TIME_FROM_PREP_TO_INSEM'] = null;
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

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

        // RIDNo

        // PatientName

        // HusbandName

        // RequestDr

        // CollectionDate

        // ResultDate

        // RequestSample

        // CollectionType

        // CollectionMethod

        // Medicationused

        // DifficultiesinCollection

        // Volume

        // pH

        // Timeofcollection

        // Timeofexamination

        // Concentration

        // Total

        // ProgressiveMotility

        // NonProgrssiveMotile

        // Immotile

        // TotalProgrssiveMotile

        // Appearance

        // Homogenosity

        // CompleteSample

        // Liquefactiontime

        // Normal

        // Abnormal

        // Headdefects

        // MidpieceDefects

        // TailDefects

        // NormalProgMotile

        // ImmatureForms

        // Leucocytes

        // Agglutination

        // Debris

        // Diagnosis

        // Observations

        // Signature

        // SemenOrgin

        // Donor

        // DonorBloodgroup

        // Tank

        // Location

        // Volume1

        // Concentration1

        // Total1

        // ProgressiveMotility1

        // NonProgrssiveMotile1

        // Immotile1

        // TotalProgrssiveMotile1

        // TidNo

        // Color

        // DoneBy

        // Method

        // Abstinence

        // ProcessedBy

        // InseminationTime

        // InseminationBy

        // Big

        // Medium

        // Small

        // NoHalo

        // Fragmented

        // NonFragmented

        // DFI

        // IsueBy

        // Volume2

        // Concentration2

        // Total2

        // ProgressiveMotility2

        // NonProgrssiveMotile2

        // Immotile2

        // TotalProgrssiveMotile2

        // IssuedBy

        // IssuedTo

        // MACS

        // PREG_TEST_DATE

        // SPECIFIC_PROBLEMS

        // IMSC_1

        // IMSC_2

        // LIQUIFACTION_STORAGE

        // IUI_PREP_METHOD

        // TIME_FROM_TRIGGER

        // COLLECTION_TO_PREPARATION

        // TIME_FROM_PREP_TO_INSEM
        if ($this->RowType == ROWTYPE_VIEW) {
            // id
            $this->id->ViewValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

            // PaID
            $this->PaID->ViewValue = $this->PaID->CurrentValue;
            $this->PaID->ViewCustomAttributes = "";

            // PaName
            $this->PaName->ViewValue = $this->PaName->CurrentValue;
            $this->PaName->ViewCustomAttributes = "";

            // PaMobile
            $this->PaMobile->ViewValue = $this->PaMobile->CurrentValue;
            $this->PaMobile->ViewCustomAttributes = "";

            // PartnerID
            $this->PartnerID->ViewValue = $this->PartnerID->CurrentValue;
            $this->PartnerID->ViewCustomAttributes = "";

            // PartnerName
            $this->PartnerName->ViewValue = $this->PartnerName->CurrentValue;
            $this->PartnerName->ViewCustomAttributes = "";

            // PartnerMobile
            $this->PartnerMobile->ViewValue = $this->PartnerMobile->CurrentValue;
            $this->PartnerMobile->ViewCustomAttributes = "";

            // RIDNo
            $curVal = trim(strval($this->RIDNo->CurrentValue));
            if ($curVal != "") {
                $this->RIDNo->ViewValue = $this->RIDNo->lookupCacheOption($curVal);
                if ($this->RIDNo->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->RIDNo->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->RIDNo->Lookup->renderViewRow($rswrk[0]);
                        $this->RIDNo->ViewValue = $this->RIDNo->displayValue($arwrk);
                    } else {
                        $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
                    }
                }
            } else {
                $this->RIDNo->ViewValue = null;
            }
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $curVal = trim(strval($this->PatientName->CurrentValue));
            if ($curVal != "") {
                $this->PatientName->ViewValue = $this->PatientName->lookupCacheOption($curVal);
                if ($this->PatientName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->PatientName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->PatientName->Lookup->renderViewRow($rswrk[0]);
                        $this->PatientName->ViewValue = $this->PatientName->displayValue($arwrk);
                    } else {
                        $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                    }
                }
            } else {
                $this->PatientName->ViewValue = null;
            }
            $this->PatientName->ViewCustomAttributes = "";

            // HusbandName
            $curVal = trim(strval($this->HusbandName->CurrentValue));
            if ($curVal != "") {
                $this->HusbandName->ViewValue = $this->HusbandName->lookupCacheOption($curVal);
                if ($this->HusbandName->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->HusbandName->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->HusbandName->Lookup->renderViewRow($rswrk[0]);
                        $this->HusbandName->ViewValue = $this->HusbandName->displayValue($arwrk);
                    } else {
                        $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
                    }
                }
            } else {
                $this->HusbandName->ViewValue = null;
            }
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 7);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 7);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            if (strval($this->RequestSample->CurrentValue) != "") {
                $this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
            } else {
                $this->RequestSample->ViewValue = null;
            }
            $this->RequestSample->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 7);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";
            if (!$this->isExport()) {
                $this->id->ViewValue = $this->highlightValue($this->id);
            }

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PaID->ViewValue = $this->highlightValue($this->PaID);
            }

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PaName->ViewValue = $this->highlightValue($this->PaName);
            }

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PaMobile->ViewValue = $this->highlightValue($this->PaMobile);
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

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";
            if (!$this->isExport()) {
                $this->PartnerMobile->ViewValue = $this->highlightValue($this->PartnerMobile);
            }

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";
            if (!$this->isExport()) {
                $this->RequestDr->ViewValue = $this->highlightValue($this->RequestDr);
            }

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";
            $this->CollectionDate->TooltipValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";
            $this->ResultDate->TooltipValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";
            $this->RequestSample->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";
        } elseif ($this->RowType == ROWTYPE_SEARCH) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = HtmlEncode($this->id->AdvancedSearch->SearchValue);
            $this->id->PlaceHolder = RemoveHtml($this->id->caption());

            // PaID
            $this->PaID->EditAttrs["class"] = "form-control";
            $this->PaID->EditCustomAttributes = "";
            if (!$this->PaID->Raw) {
                $this->PaID->AdvancedSearch->SearchValue = HtmlDecode($this->PaID->AdvancedSearch->SearchValue);
            }
            $this->PaID->EditValue = HtmlEncode($this->PaID->AdvancedSearch->SearchValue);
            $this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

            // PaName
            $this->PaName->EditAttrs["class"] = "form-control";
            $this->PaName->EditCustomAttributes = "";
            if (!$this->PaName->Raw) {
                $this->PaName->AdvancedSearch->SearchValue = HtmlDecode($this->PaName->AdvancedSearch->SearchValue);
            }
            $this->PaName->EditValue = HtmlEncode($this->PaName->AdvancedSearch->SearchValue);
            $this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

            // PaMobile
            $this->PaMobile->EditAttrs["class"] = "form-control";
            $this->PaMobile->EditCustomAttributes = "";
            if (!$this->PaMobile->Raw) {
                $this->PaMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PaMobile->AdvancedSearch->SearchValue);
            }
            $this->PaMobile->EditValue = HtmlEncode($this->PaMobile->AdvancedSearch->SearchValue);
            $this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

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

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->AdvancedSearch->SearchValue = HtmlDecode($this->PartnerMobile->AdvancedSearch->SearchValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->AdvancedSearch->SearchValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // RequestDr
            $this->RequestDr->EditAttrs["class"] = "form-control";
            $this->RequestDr->EditCustomAttributes = "";
            if (!$this->RequestDr->Raw) {
                $this->RequestDr->AdvancedSearch->SearchValue = HtmlDecode($this->RequestDr->AdvancedSearch->SearchValue);
            }
            $this->RequestDr->EditValue = HtmlEncode($this->RequestDr->AdvancedSearch->SearchValue);
            $this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

            // CollectionDate
            $this->CollectionDate->EditAttrs["class"] = "form-control";
            $this->CollectionDate->EditCustomAttributes = "";
            $this->CollectionDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->CollectionDate->AdvancedSearch->SearchValue, 7), 7));
            $this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->ResultDate->AdvancedSearch->SearchValue, 7), 7));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // RequestSample
            $this->RequestSample->EditAttrs["class"] = "form-control";
            $this->RequestSample->EditCustomAttributes = "";
            $this->RequestSample->EditValue = $this->RequestSample->options(true);
            $this->RequestSample->PlaceHolder = RemoveHtml($this->RequestSample->caption());

            // TidNo
            $this->TidNo->EditAttrs["class"] = "form-control";
            $this->TidNo->EditCustomAttributes = "";
            $this->TidNo->EditValue = HtmlEncode($this->TidNo->AdvancedSearch->SearchValue);
            $this->TidNo->PlaceHolder = RemoveHtml($this->TidNo->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue2 = HtmlEncode(FormatDateTime(UnFormatDateTime($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2, 7), 7));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());
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
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if (!CheckEuroDate($this->PREG_TEST_DATE->AdvancedSearch->SearchValue2)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
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
        $this->PaID->AdvancedSearch->load();
        $this->PaName->AdvancedSearch->load();
        $this->PaMobile->AdvancedSearch->load();
        $this->PartnerID->AdvancedSearch->load();
        $this->PartnerName->AdvancedSearch->load();
        $this->PartnerMobile->AdvancedSearch->load();
        $this->RIDNo->AdvancedSearch->load();
        $this->PatientName->AdvancedSearch->load();
        $this->HusbandName->AdvancedSearch->load();
        $this->RequestDr->AdvancedSearch->load();
        $this->CollectionDate->AdvancedSearch->load();
        $this->ResultDate->AdvancedSearch->load();
        $this->RequestSample->AdvancedSearch->load();
        $this->CollectionType->AdvancedSearch->load();
        $this->CollectionMethod->AdvancedSearch->load();
        $this->Medicationused->AdvancedSearch->load();
        $this->DifficultiesinCollection->AdvancedSearch->load();
        $this->Volume->AdvancedSearch->load();
        $this->pH->AdvancedSearch->load();
        $this->Timeofcollection->AdvancedSearch->load();
        $this->Timeofexamination->AdvancedSearch->load();
        $this->Concentration->AdvancedSearch->load();
        $this->Total->AdvancedSearch->load();
        $this->ProgressiveMotility->AdvancedSearch->load();
        $this->NonProgrssiveMotile->AdvancedSearch->load();
        $this->Immotile->AdvancedSearch->load();
        $this->TotalProgrssiveMotile->AdvancedSearch->load();
        $this->Appearance->AdvancedSearch->load();
        $this->Homogenosity->AdvancedSearch->load();
        $this->CompleteSample->AdvancedSearch->load();
        $this->Liquefactiontime->AdvancedSearch->load();
        $this->Normal->AdvancedSearch->load();
        $this->Abnormal->AdvancedSearch->load();
        $this->Headdefects->AdvancedSearch->load();
        $this->MidpieceDefects->AdvancedSearch->load();
        $this->TailDefects->AdvancedSearch->load();
        $this->NormalProgMotile->AdvancedSearch->load();
        $this->ImmatureForms->AdvancedSearch->load();
        $this->Leucocytes->AdvancedSearch->load();
        $this->Agglutination->AdvancedSearch->load();
        $this->Debris->AdvancedSearch->load();
        $this->Diagnosis->AdvancedSearch->load();
        $this->Observations->AdvancedSearch->load();
        $this->Signature->AdvancedSearch->load();
        $this->SemenOrgin->AdvancedSearch->load();
        $this->Donor->AdvancedSearch->load();
        $this->DonorBloodgroup->AdvancedSearch->load();
        $this->Tank->AdvancedSearch->load();
        $this->Location->AdvancedSearch->load();
        $this->Volume1->AdvancedSearch->load();
        $this->Concentration1->AdvancedSearch->load();
        $this->Total1->AdvancedSearch->load();
        $this->ProgressiveMotility1->AdvancedSearch->load();
        $this->NonProgrssiveMotile1->AdvancedSearch->load();
        $this->Immotile1->AdvancedSearch->load();
        $this->TotalProgrssiveMotile1->AdvancedSearch->load();
        $this->TidNo->AdvancedSearch->load();
        $this->Color->AdvancedSearch->load();
        $this->DoneBy->AdvancedSearch->load();
        $this->Method->AdvancedSearch->load();
        $this->Abstinence->AdvancedSearch->load();
        $this->ProcessedBy->AdvancedSearch->load();
        $this->InseminationTime->AdvancedSearch->load();
        $this->InseminationBy->AdvancedSearch->load();
        $this->Big->AdvancedSearch->load();
        $this->Medium->AdvancedSearch->load();
        $this->Small->AdvancedSearch->load();
        $this->NoHalo->AdvancedSearch->load();
        $this->Fragmented->AdvancedSearch->load();
        $this->NonFragmented->AdvancedSearch->load();
        $this->DFI->AdvancedSearch->load();
        $this->IsueBy->AdvancedSearch->load();
        $this->Volume2->AdvancedSearch->load();
        $this->Concentration2->AdvancedSearch->load();
        $this->Total2->AdvancedSearch->load();
        $this->ProgressiveMotility2->AdvancedSearch->load();
        $this->NonProgrssiveMotile2->AdvancedSearch->load();
        $this->Immotile2->AdvancedSearch->load();
        $this->TotalProgrssiveMotile2->AdvancedSearch->load();
        $this->IssuedBy->AdvancedSearch->load();
        $this->IssuedTo->AdvancedSearch->load();
        $this->MACS->AdvancedSearch->load();
        $this->PREG_TEST_DATE->AdvancedSearch->load();
        $this->SPECIFIC_PROBLEMS->AdvancedSearch->load();
        $this->IMSC_1->AdvancedSearch->load();
        $this->IMSC_2->AdvancedSearch->load();
        $this->LIQUIFACTION_STORAGE->AdvancedSearch->load();
        $this->IUI_PREP_METHOD->AdvancedSearch->load();
        $this->TIME_FROM_TRIGGER->AdvancedSearch->load();
        $this->COLLECTION_TO_PREPARATION->AdvancedSearch->load();
        $this->TIME_FROM_PREP_TO_INSEM->AdvancedSearch->load();
    }

    // Get export HTML tag
    protected function getExportTag($type, $custom = false)
    {
        global $Language;
        $pageUrl = $this->pageUrl();
        if (SameText($type, "excel")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fview_semenanalysislist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
            }
        } elseif (SameText($type, "word")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fview_semenanalysislist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
            } else {
                return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
            }
        } elseif (SameText($type, "pdf")) {
            if ($custom) {
                return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fview_semenanalysislist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
            return '<button id="emf_view_semenanalysis" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_view_semenanalysis\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fview_semenanalysislist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
        $item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fview_semenanalysislistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
        $item->Visible = true;

        // Show all button
        $item = &$this->SearchOptions->add("showall");
        $item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $pageUrl . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
        $item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

        // Advanced search button
        $item = &$this->SearchOptions->add("advancedsearch");
        if (IsMobile()) {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"ViewSemenanalysisSearch\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        } else {
            $item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"view_semenanalysis\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'ViewSemenanalysisSearch'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
        }
        $item->Visible = true;

        // Search highlight button
        $item = &$this->SearchOptions->add("searchhighlight");
        $item->Body = "<a class=\"btn btn-default ew-highlight active\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("Highlight") . "\" data-caption=\"" . $Language->phrase("Highlight") . "\" data-toggle=\"button\" data-form=\"fview_semenanalysislistsrch\" data-name=\"" . $this->highlightName() . "\">" . $Language->phrase("HighlightBtn") . "</a>";
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
                case "x_RIDNo":
                    break;
                case "x_PatientName":
                    break;
                case "x_HusbandName":
                    break;
                case "x_RequestSample":
                    break;
                case "x_CollectionType":
                    break;
                case "x_CollectionMethod":
                    break;
                case "x_Medicationused":
                    break;
                case "x_DifficultiesinCollection":
                    break;
                case "x_Homogenosity":
                    break;
                case "x_CompleteSample":
                    break;
                case "x_SemenOrgin":
                    break;
                case "x_Donor":
                    break;
                case "x_MACS":
                    break;
                case "x_SPECIFIC_PROBLEMS":
                    break;
                case "x_LIQUIFACTION_STORAGE":
                    break;
                case "x_IUI_PREP_METHOD":
                    break;
                case "x_TIME_FROM_TRIGGER":
                    break;
                case "x_COLLECTION_TO_PREPARATION":
                    break;
                case "x_TIME_FROM_PREP_TO_INSEM":
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
