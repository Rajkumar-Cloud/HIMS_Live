<?php

namespace PHPMaker2021\HIMS;

use Doctrine\DBAL\ParameterType;

/**
 * Page class
 */
class IvfSemenanalysisreportGrid extends IvfSemenanalysisreport
{
    use MessagesTrait;

    // Page ID
    public $PageID = "grid";

    // Project ID
    public $ProjectID = PROJECT_ID;

    // Table name
    public $TableName = 'ivf_semenanalysisreport';

    // Page object name
    public $PageObjName = "IvfSemenanalysisreportGrid";

    // Rendering View
    public $RenderingView = false;

    // Grid form hidden field names
    public $FormName = "fivf_semenanalysisreportgrid";
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
        $this->FormActionName .= "_" . $this->FormName;
        $this->OldKeyName .= "_" . $this->FormName;
        $this->FormBlankRowName .= "_" . $this->FormName;
        $this->FormKeyCountName .= "_" . $this->FormName;
        $GLOBALS["Grid"] = &$this;

        // Language object
        $Language = Container("language");

        // Parent constuctor
        parent::__construct();

        // Table object (ivf_semenanalysisreport)
        if (!isset($GLOBALS["ivf_semenanalysisreport"]) || get_class($GLOBALS["ivf_semenanalysisreport"]) == PROJECT_NAMESPACE . "ivf_semenanalysisreport") {
            $GLOBALS["ivf_semenanalysisreport"] = &$this;
        }

        // Page URL
        $pageUrl = $this->pageUrl();
        $this->AddUrl = "IvfSemenanalysisreportAdd";

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'ivf_semenanalysisreport');
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

        // Other options
        if (!$this->OtherOptions) {
            $this->OtherOptions = new ListOptionsArray();
        }
        $this->OtherOptions["addedit"] = new ListOptions("div");
        $this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
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

        // Export
        if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
            $content = $this->getContents();
            if ($ExportFileName == "") {
                $ExportFileName = $this->TableVar;
            }
            $class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
            if (class_exists($class)) {
                $doc = new $class(Container("ivf_semenanalysisreport"));
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
        unset($GLOBALS["Grid"]);
        if ($url === "") {
            return;
        }
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

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
    public $ShowOtherOptions = false;
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

        // Get grid add count
        $gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
        if (is_numeric($gridaddcnt) && $gridaddcnt > 0) {
            $this->GridAddRowCount = $gridaddcnt;
        }

        // Set up list options
        $this->setupListOptions();
        $this->id->setVisibility();
        $this->RIDNo->setVisibility();
        $this->PatientName->setVisibility();
        $this->HusbandName->setVisibility();
        $this->RequestDr->setVisibility();
        $this->CollectionDate->setVisibility();
        $this->ResultDate->setVisibility();
        $this->RequestSample->setVisibility();
        $this->CollectionType->setVisibility();
        $this->CollectionMethod->setVisibility();
        $this->Medicationused->setVisibility();
        $this->DifficultiesinCollection->setVisibility();
        $this->pH->setVisibility();
        $this->Timeofcollection->setVisibility();
        $this->Timeofexamination->setVisibility();
        $this->Volume->setVisibility();
        $this->Concentration->setVisibility();
        $this->Total->setVisibility();
        $this->ProgressiveMotility->setVisibility();
        $this->NonProgrssiveMotile->setVisibility();
        $this->Immotile->setVisibility();
        $this->TotalProgrssiveMotile->setVisibility();
        $this->Appearance->setVisibility();
        $this->Homogenosity->setVisibility();
        $this->CompleteSample->setVisibility();
        $this->Liquefactiontime->setVisibility();
        $this->Normal->setVisibility();
        $this->Abnormal->setVisibility();
        $this->Headdefects->setVisibility();
        $this->MidpieceDefects->setVisibility();
        $this->TailDefects->setVisibility();
        $this->NormalProgMotile->setVisibility();
        $this->ImmatureForms->setVisibility();
        $this->Leucocytes->setVisibility();
        $this->Agglutination->setVisibility();
        $this->Debris->setVisibility();
        $this->Diagnosis->setVisibility();
        $this->Observations->setVisibility();
        $this->Signature->setVisibility();
        $this->SemenOrgin->setVisibility();
        $this->Donor->setVisibility();
        $this->DonorBloodgroup->setVisibility();
        $this->Tank->setVisibility();
        $this->Location->setVisibility();
        $this->Volume1->setVisibility();
        $this->Concentration1->setVisibility();
        $this->Total1->setVisibility();
        $this->ProgressiveMotility1->setVisibility();
        $this->NonProgrssiveMotile1->setVisibility();
        $this->Immotile1->setVisibility();
        $this->TotalProgrssiveMotile1->setVisibility();
        $this->TidNo->setVisibility();
        $this->Color->setVisibility();
        $this->DoneBy->setVisibility();
        $this->Method->setVisibility();
        $this->Abstinence->setVisibility();
        $this->ProcessedBy->setVisibility();
        $this->InseminationTime->setVisibility();
        $this->InseminationBy->setVisibility();
        $this->Big->setVisibility();
        $this->Medium->setVisibility();
        $this->Small->setVisibility();
        $this->NoHalo->setVisibility();
        $this->Fragmented->setVisibility();
        $this->NonFragmented->setVisibility();
        $this->DFI->setVisibility();
        $this->IsueBy->setVisibility();
        $this->Volume2->setVisibility();
        $this->Concentration2->setVisibility();
        $this->Total2->setVisibility();
        $this->ProgressiveMotility2->setVisibility();
        $this->NonProgrssiveMotile2->setVisibility();
        $this->Immotile2->setVisibility();
        $this->TotalProgrssiveMotile2->setVisibility();
        $this->MACS->Visible = false;
        $this->IssuedBy->setVisibility();
        $this->IssuedTo->setVisibility();
        $this->PaID->setVisibility();
        $this->PaName->setVisibility();
        $this->PaMobile->setVisibility();
        $this->PartnerID->setVisibility();
        $this->PartnerName->setVisibility();
        $this->PartnerMobile->setVisibility();
        $this->PREG_TEST_DATE->setVisibility();
        $this->SPECIFIC_PROBLEMS->setVisibility();
        $this->IMSC_1->setVisibility();
        $this->IMSC_2->setVisibility();
        $this->LIQUIFACTION_STORAGE->setVisibility();
        $this->IUI_PREP_METHOD->setVisibility();
        $this->TIME_FROM_TRIGGER->setVisibility();
        $this->COLLECTION_TO_PREPARATION->setVisibility();
        $this->TIME_FROM_PREP_TO_INSEM->setVisibility();
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

        // Set up lookup cache
        $this->setupLookupOptions($this->Donor);

        // Search filters
        $srchAdvanced = ""; // Advanced search filter
        $srchBasic = ""; // Basic search filter
        $filter = "";

        // Get command
        $this->Command = strtolower(Get("cmd"));
        if ($this->isPageRequest()) {
            // Set up records per page
            $this->setupDisplayRecords();

            // Handle reset command
            $this->resetCmd();

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

            // Show grid delete link for grid add / grid edit
            if ($this->AllowAddDeleteRow) {
                if ($this->isGridAdd() || $this->isGridEdit()) {
                    $item = $this->ListOptions["griddelete"];
                    if ($item) {
                        $item->Visible = true;
                    }
                }
            }

            // Set up sorting order
            $this->setupSortOrder();
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
        if ($this->CurrentMode != "add" && $this->getMasterFilter() != "" && $this->getCurrentMasterTable() == "view_ivf_treatment") {
            $masterTbl = Container("view_ivf_treatment");
            $rsmaster = $masterTbl->loadRs($this->DbMasterFilter)->fetch(\PDO::FETCH_ASSOC);
            $this->MasterRecordExists = $rsmaster !== false;
            if (!$this->MasterRecordExists) {
                $this->setFailureMessage($Language->phrase("NoRecord")); // Set no record found
                $this->terminate("ViewIvfTreatmentList"); // Return to master page
                return;
            } else {
                $masterTbl->loadListRowValues($rsmaster);
                $masterTbl->RowType = ROWTYPE_MASTER; // Master row
                $masterTbl->renderListRow();
            }
        }

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

        // Set up filter
        if ($this->Command == "json") {
            $this->UseSessionForListSql = false; // Do not use session for ListSQL
            $this->CurrentFilter = $filter;
        } else {
            $this->setSessionWhere($filter);
            $this->CurrentFilter = "";
        }
        if ($this->isGridAdd()) {
            if ($this->CurrentMode == "copy") {
                $this->TotalRecords = $this->listRecordCount();
                $this->StartRecord = 1;
                $this->DisplayRecords = $this->TotalRecords;
                $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
            } else {
                $this->CurrentFilter = "0=1";
                $this->StartRecord = 1;
                $this->DisplayRecords = $this->GridAddRowCount;
            }
            $this->TotalRecords = $this->DisplayRecords;
            $this->StopRecord = $this->DisplayRecords;
        } else {
            $this->TotalRecords = $this->listRecordCount();
            $this->StartRecord = 1;
            $this->DisplayRecords = $this->TotalRecords; // Display all records
            $this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);
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
            // Get new records
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Updated event
            $this->gridUpdated($rsold, $rsnew);
            $this->clearInlineMode(); // Clear inline edit mode
        } else {
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
            $this->clearInlineMode(); // Clear grid add mode and return
            return true;
        }
        if ($gridInsert) {
            // Get new records
            $this->CurrentFilter = $wrkfilter;
            $sql = $this->getCurrentSql();
            $rsnew = $conn->fetchAll($sql);

            // Call Grid_Inserted event
            $this->gridInserted($rsnew);
            $this->clearInlineMode(); // Clear grid add mode
        } else {
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
        if ($CurrentForm->hasValue("x_PatientName") && $CurrentForm->hasValue("o_PatientName") && $this->PatientName->CurrentValue != $this->PatientName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_HusbandName") && $CurrentForm->hasValue("o_HusbandName") && $this->HusbandName->CurrentValue != $this->HusbandName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RequestDr") && $CurrentForm->hasValue("o_RequestDr") && $this->RequestDr->CurrentValue != $this->RequestDr->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CollectionDate") && $CurrentForm->hasValue("o_CollectionDate") && $this->CollectionDate->CurrentValue != $this->CollectionDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ResultDate") && $CurrentForm->hasValue("o_ResultDate") && $this->ResultDate->CurrentValue != $this->ResultDate->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_RequestSample") && $CurrentForm->hasValue("o_RequestSample") && $this->RequestSample->CurrentValue != $this->RequestSample->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CollectionType") && $CurrentForm->hasValue("o_CollectionType") && $this->CollectionType->CurrentValue != $this->CollectionType->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CollectionMethod") && $CurrentForm->hasValue("o_CollectionMethod") && $this->CollectionMethod->CurrentValue != $this->CollectionMethod->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Medicationused") && $CurrentForm->hasValue("o_Medicationused") && $this->Medicationused->CurrentValue != $this->Medicationused->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DifficultiesinCollection") && $CurrentForm->hasValue("o_DifficultiesinCollection") && $this->DifficultiesinCollection->CurrentValue != $this->DifficultiesinCollection->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_pH") && $CurrentForm->hasValue("o_pH") && $this->pH->CurrentValue != $this->pH->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Timeofcollection") && $CurrentForm->hasValue("o_Timeofcollection") && $this->Timeofcollection->CurrentValue != $this->Timeofcollection->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Timeofexamination") && $CurrentForm->hasValue("o_Timeofexamination") && $this->Timeofexamination->CurrentValue != $this->Timeofexamination->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Volume") && $CurrentForm->hasValue("o_Volume") && $this->Volume->CurrentValue != $this->Volume->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Concentration") && $CurrentForm->hasValue("o_Concentration") && $this->Concentration->CurrentValue != $this->Concentration->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Total") && $CurrentForm->hasValue("o_Total") && $this->Total->CurrentValue != $this->Total->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ProgressiveMotility") && $CurrentForm->hasValue("o_ProgressiveMotility") && $this->ProgressiveMotility->CurrentValue != $this->ProgressiveMotility->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NonProgrssiveMotile") && $CurrentForm->hasValue("o_NonProgrssiveMotile") && $this->NonProgrssiveMotile->CurrentValue != $this->NonProgrssiveMotile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Immotile") && $CurrentForm->hasValue("o_Immotile") && $this->Immotile->CurrentValue != $this->Immotile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TotalProgrssiveMotile") && $CurrentForm->hasValue("o_TotalProgrssiveMotile") && $this->TotalProgrssiveMotile->CurrentValue != $this->TotalProgrssiveMotile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Appearance") && $CurrentForm->hasValue("o_Appearance") && $this->Appearance->CurrentValue != $this->Appearance->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Homogenosity") && $CurrentForm->hasValue("o_Homogenosity") && $this->Homogenosity->CurrentValue != $this->Homogenosity->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_CompleteSample") && $CurrentForm->hasValue("o_CompleteSample") && $this->CompleteSample->CurrentValue != $this->CompleteSample->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Liquefactiontime") && $CurrentForm->hasValue("o_Liquefactiontime") && $this->Liquefactiontime->CurrentValue != $this->Liquefactiontime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Normal") && $CurrentForm->hasValue("o_Normal") && $this->Normal->CurrentValue != $this->Normal->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Abnormal") && $CurrentForm->hasValue("o_Abnormal") && $this->Abnormal->CurrentValue != $this->Abnormal->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Headdefects") && $CurrentForm->hasValue("o_Headdefects") && $this->Headdefects->CurrentValue != $this->Headdefects->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_MidpieceDefects") && $CurrentForm->hasValue("o_MidpieceDefects") && $this->MidpieceDefects->CurrentValue != $this->MidpieceDefects->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TailDefects") && $CurrentForm->hasValue("o_TailDefects") && $this->TailDefects->CurrentValue != $this->TailDefects->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NormalProgMotile") && $CurrentForm->hasValue("o_NormalProgMotile") && $this->NormalProgMotile->CurrentValue != $this->NormalProgMotile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ImmatureForms") && $CurrentForm->hasValue("o_ImmatureForms") && $this->ImmatureForms->CurrentValue != $this->ImmatureForms->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Leucocytes") && $CurrentForm->hasValue("o_Leucocytes") && $this->Leucocytes->CurrentValue != $this->Leucocytes->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Agglutination") && $CurrentForm->hasValue("o_Agglutination") && $this->Agglutination->CurrentValue != $this->Agglutination->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Debris") && $CurrentForm->hasValue("o_Debris") && $this->Debris->CurrentValue != $this->Debris->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Diagnosis") && $CurrentForm->hasValue("o_Diagnosis") && $this->Diagnosis->CurrentValue != $this->Diagnosis->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Observations") && $CurrentForm->hasValue("o_Observations") && $this->Observations->CurrentValue != $this->Observations->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Signature") && $CurrentForm->hasValue("o_Signature") && $this->Signature->CurrentValue != $this->Signature->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SemenOrgin") && $CurrentForm->hasValue("o_SemenOrgin") && $this->SemenOrgin->CurrentValue != $this->SemenOrgin->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Donor") && $CurrentForm->hasValue("o_Donor") && $this->Donor->CurrentValue != $this->Donor->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DonorBloodgroup") && $CurrentForm->hasValue("o_DonorBloodgroup") && $this->DonorBloodgroup->CurrentValue != $this->DonorBloodgroup->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Tank") && $CurrentForm->hasValue("o_Tank") && $this->Tank->CurrentValue != $this->Tank->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Location") && $CurrentForm->hasValue("o_Location") && $this->Location->CurrentValue != $this->Location->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Volume1") && $CurrentForm->hasValue("o_Volume1") && $this->Volume1->CurrentValue != $this->Volume1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Concentration1") && $CurrentForm->hasValue("o_Concentration1") && $this->Concentration1->CurrentValue != $this->Concentration1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Total1") && $CurrentForm->hasValue("o_Total1") && $this->Total1->CurrentValue != $this->Total1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ProgressiveMotility1") && $CurrentForm->hasValue("o_ProgressiveMotility1") && $this->ProgressiveMotility1->CurrentValue != $this->ProgressiveMotility1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NonProgrssiveMotile1") && $CurrentForm->hasValue("o_NonProgrssiveMotile1") && $this->NonProgrssiveMotile1->CurrentValue != $this->NonProgrssiveMotile1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Immotile1") && $CurrentForm->hasValue("o_Immotile1") && $this->Immotile1->CurrentValue != $this->Immotile1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TotalProgrssiveMotile1") && $CurrentForm->hasValue("o_TotalProgrssiveMotile1") && $this->TotalProgrssiveMotile1->CurrentValue != $this->TotalProgrssiveMotile1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TidNo") && $CurrentForm->hasValue("o_TidNo") && $this->TidNo->CurrentValue != $this->TidNo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Color") && $CurrentForm->hasValue("o_Color") && $this->Color->CurrentValue != $this->Color->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DoneBy") && $CurrentForm->hasValue("o_DoneBy") && $this->DoneBy->CurrentValue != $this->DoneBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Method") && $CurrentForm->hasValue("o_Method") && $this->Method->CurrentValue != $this->Method->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Abstinence") && $CurrentForm->hasValue("o_Abstinence") && $this->Abstinence->CurrentValue != $this->Abstinence->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ProcessedBy") && $CurrentForm->hasValue("o_ProcessedBy") && $this->ProcessedBy->CurrentValue != $this->ProcessedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_InseminationTime") && $CurrentForm->hasValue("o_InseminationTime") && $this->InseminationTime->CurrentValue != $this->InseminationTime->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_InseminationBy") && $CurrentForm->hasValue("o_InseminationBy") && $this->InseminationBy->CurrentValue != $this->InseminationBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Big") && $CurrentForm->hasValue("o_Big") && $this->Big->CurrentValue != $this->Big->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Medium") && $CurrentForm->hasValue("o_Medium") && $this->Medium->CurrentValue != $this->Medium->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Small") && $CurrentForm->hasValue("o_Small") && $this->Small->CurrentValue != $this->Small->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NoHalo") && $CurrentForm->hasValue("o_NoHalo") && $this->NoHalo->CurrentValue != $this->NoHalo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Fragmented") && $CurrentForm->hasValue("o_Fragmented") && $this->Fragmented->CurrentValue != $this->Fragmented->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NonFragmented") && $CurrentForm->hasValue("o_NonFragmented") && $this->NonFragmented->CurrentValue != $this->NonFragmented->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_DFI") && $CurrentForm->hasValue("o_DFI") && $this->DFI->CurrentValue != $this->DFI->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IsueBy") && $CurrentForm->hasValue("o_IsueBy") && $this->IsueBy->CurrentValue != $this->IsueBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Volume2") && $CurrentForm->hasValue("o_Volume2") && $this->Volume2->CurrentValue != $this->Volume2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Concentration2") && $CurrentForm->hasValue("o_Concentration2") && $this->Concentration2->CurrentValue != $this->Concentration2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Total2") && $CurrentForm->hasValue("o_Total2") && $this->Total2->CurrentValue != $this->Total2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_ProgressiveMotility2") && $CurrentForm->hasValue("o_ProgressiveMotility2") && $this->ProgressiveMotility2->CurrentValue != $this->ProgressiveMotility2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_NonProgrssiveMotile2") && $CurrentForm->hasValue("o_NonProgrssiveMotile2") && $this->NonProgrssiveMotile2->CurrentValue != $this->NonProgrssiveMotile2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_Immotile2") && $CurrentForm->hasValue("o_Immotile2") && $this->Immotile2->CurrentValue != $this->Immotile2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TotalProgrssiveMotile2") && $CurrentForm->hasValue("o_TotalProgrssiveMotile2") && $this->TotalProgrssiveMotile2->CurrentValue != $this->TotalProgrssiveMotile2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IssuedBy") && $CurrentForm->hasValue("o_IssuedBy") && $this->IssuedBy->CurrentValue != $this->IssuedBy->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IssuedTo") && $CurrentForm->hasValue("o_IssuedTo") && $this->IssuedTo->CurrentValue != $this->IssuedTo->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaID") && $CurrentForm->hasValue("o_PaID") && $this->PaID->CurrentValue != $this->PaID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaName") && $CurrentForm->hasValue("o_PaName") && $this->PaName->CurrentValue != $this->PaName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PaMobile") && $CurrentForm->hasValue("o_PaMobile") && $this->PaMobile->CurrentValue != $this->PaMobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PartnerID") && $CurrentForm->hasValue("o_PartnerID") && $this->PartnerID->CurrentValue != $this->PartnerID->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PartnerName") && $CurrentForm->hasValue("o_PartnerName") && $this->PartnerName->CurrentValue != $this->PartnerName->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PartnerMobile") && $CurrentForm->hasValue("o_PartnerMobile") && $this->PartnerMobile->CurrentValue != $this->PartnerMobile->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_PREG_TEST_DATE") && $CurrentForm->hasValue("o_PREG_TEST_DATE") && $this->PREG_TEST_DATE->CurrentValue != $this->PREG_TEST_DATE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_SPECIFIC_PROBLEMS") && $CurrentForm->hasValue("o_SPECIFIC_PROBLEMS") && $this->SPECIFIC_PROBLEMS->CurrentValue != $this->SPECIFIC_PROBLEMS->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IMSC_1") && $CurrentForm->hasValue("o_IMSC_1") && $this->IMSC_1->CurrentValue != $this->IMSC_1->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IMSC_2") && $CurrentForm->hasValue("o_IMSC_2") && $this->IMSC_2->CurrentValue != $this->IMSC_2->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_LIQUIFACTION_STORAGE") && $CurrentForm->hasValue("o_LIQUIFACTION_STORAGE") && $this->LIQUIFACTION_STORAGE->CurrentValue != $this->LIQUIFACTION_STORAGE->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_IUI_PREP_METHOD") && $CurrentForm->hasValue("o_IUI_PREP_METHOD") && $this->IUI_PREP_METHOD->CurrentValue != $this->IUI_PREP_METHOD->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TIME_FROM_TRIGGER") && $CurrentForm->hasValue("o_TIME_FROM_TRIGGER") && $this->TIME_FROM_TRIGGER->CurrentValue != $this->TIME_FROM_TRIGGER->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_COLLECTION_TO_PREPARATION") && $CurrentForm->hasValue("o_COLLECTION_TO_PREPARATION") && $this->COLLECTION_TO_PREPARATION->CurrentValue != $this->COLLECTION_TO_PREPARATION->OldValue) {
            return false;
        }
        if ($CurrentForm->hasValue("x_TIME_FROM_PREP_TO_INSEM") && $CurrentForm->hasValue("o_TIME_FROM_PREP_TO_INSEM") && $this->TIME_FROM_PREP_TO_INSEM->CurrentValue != $this->TIME_FROM_PREP_TO_INSEM->OldValue) {
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
        $this->PatientName->clearErrorMessage();
        $this->HusbandName->clearErrorMessage();
        $this->RequestDr->clearErrorMessage();
        $this->CollectionDate->clearErrorMessage();
        $this->ResultDate->clearErrorMessage();
        $this->RequestSample->clearErrorMessage();
        $this->CollectionType->clearErrorMessage();
        $this->CollectionMethod->clearErrorMessage();
        $this->Medicationused->clearErrorMessage();
        $this->DifficultiesinCollection->clearErrorMessage();
        $this->pH->clearErrorMessage();
        $this->Timeofcollection->clearErrorMessage();
        $this->Timeofexamination->clearErrorMessage();
        $this->Volume->clearErrorMessage();
        $this->Concentration->clearErrorMessage();
        $this->Total->clearErrorMessage();
        $this->ProgressiveMotility->clearErrorMessage();
        $this->NonProgrssiveMotile->clearErrorMessage();
        $this->Immotile->clearErrorMessage();
        $this->TotalProgrssiveMotile->clearErrorMessage();
        $this->Appearance->clearErrorMessage();
        $this->Homogenosity->clearErrorMessage();
        $this->CompleteSample->clearErrorMessage();
        $this->Liquefactiontime->clearErrorMessage();
        $this->Normal->clearErrorMessage();
        $this->Abnormal->clearErrorMessage();
        $this->Headdefects->clearErrorMessage();
        $this->MidpieceDefects->clearErrorMessage();
        $this->TailDefects->clearErrorMessage();
        $this->NormalProgMotile->clearErrorMessage();
        $this->ImmatureForms->clearErrorMessage();
        $this->Leucocytes->clearErrorMessage();
        $this->Agglutination->clearErrorMessage();
        $this->Debris->clearErrorMessage();
        $this->Diagnosis->clearErrorMessage();
        $this->Observations->clearErrorMessage();
        $this->Signature->clearErrorMessage();
        $this->SemenOrgin->clearErrorMessage();
        $this->Donor->clearErrorMessage();
        $this->DonorBloodgroup->clearErrorMessage();
        $this->Tank->clearErrorMessage();
        $this->Location->clearErrorMessage();
        $this->Volume1->clearErrorMessage();
        $this->Concentration1->clearErrorMessage();
        $this->Total1->clearErrorMessage();
        $this->ProgressiveMotility1->clearErrorMessage();
        $this->NonProgrssiveMotile1->clearErrorMessage();
        $this->Immotile1->clearErrorMessage();
        $this->TotalProgrssiveMotile1->clearErrorMessage();
        $this->TidNo->clearErrorMessage();
        $this->Color->clearErrorMessage();
        $this->DoneBy->clearErrorMessage();
        $this->Method->clearErrorMessage();
        $this->Abstinence->clearErrorMessage();
        $this->ProcessedBy->clearErrorMessage();
        $this->InseminationTime->clearErrorMessage();
        $this->InseminationBy->clearErrorMessage();
        $this->Big->clearErrorMessage();
        $this->Medium->clearErrorMessage();
        $this->Small->clearErrorMessage();
        $this->NoHalo->clearErrorMessage();
        $this->Fragmented->clearErrorMessage();
        $this->NonFragmented->clearErrorMessage();
        $this->DFI->clearErrorMessage();
        $this->IsueBy->clearErrorMessage();
        $this->Volume2->clearErrorMessage();
        $this->Concentration2->clearErrorMessage();
        $this->Total2->clearErrorMessage();
        $this->ProgressiveMotility2->clearErrorMessage();
        $this->NonProgrssiveMotile2->clearErrorMessage();
        $this->Immotile2->clearErrorMessage();
        $this->TotalProgrssiveMotile2->clearErrorMessage();
        $this->IssuedBy->clearErrorMessage();
        $this->IssuedTo->clearErrorMessage();
        $this->PaID->clearErrorMessage();
        $this->PaName->clearErrorMessage();
        $this->PaMobile->clearErrorMessage();
        $this->PartnerID->clearErrorMessage();
        $this->PartnerName->clearErrorMessage();
        $this->PartnerMobile->clearErrorMessage();
        $this->PREG_TEST_DATE->clearErrorMessage();
        $this->SPECIFIC_PROBLEMS->clearErrorMessage();
        $this->IMSC_1->clearErrorMessage();
        $this->IMSC_2->clearErrorMessage();
        $this->LIQUIFACTION_STORAGE->clearErrorMessage();
        $this->IUI_PREP_METHOD->clearErrorMessage();
        $this->TIME_FROM_TRIGGER->clearErrorMessage();
        $this->COLLECTION_TO_PREPARATION->clearErrorMessage();
        $this->TIME_FROM_PREP_TO_INSEM->clearErrorMessage();
    }

    // Set up sort parameters
    protected function setupSortOrder()
    {
        // Check for "order" parameter
        if (Get("order") !== null) {
            $this->CurrentOrder = Get("order");
            $this->CurrentOrderType = Get("ordertype", "");
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
            // Reset master/detail keys
            if ($this->Command == "resetall") {
                $this->setCurrentMasterTable(""); // Clear master table
                $this->DbMasterFilter = "";
                $this->DbDetailFilter = "";
                        $this->TidNo->setSessionValue("");
                        $this->RIDNo->setSessionValue("");
                        $this->PatientName->setSessionValue("");
                        $this->RIDNo->setSessionValue("");
                        $this->PatientName->setSessionValue("");
                        $this->TidNo->setSessionValue("");
            }

            // Reset (clear) sorting order
            if ($this->Command == "resetsort") {
                $orderBy = "";
                $this->setSessionOrderBy($orderBy);
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

        // Drop down button for ListOptions
        $this->ListOptions->UseDropDownButton = false;
        $this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
        $this->ListOptions->UseButtonGroup = false;
        if ($this->ListOptions->UseButtonGroup && IsMobile()) {
            $this->ListOptions->UseDropDownButton = true;
        }

        //$this->ListOptions->ButtonClass = ""; // Class for button group

        // Call ListOptions_Load event
        $this->listOptionsLoad();
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
            if ($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") {
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
        $this->renderListOptionsExt();

        // Call ListOptions_Rendered event
        $this->listOptionsRendered();
    }

    // Set up other options
    protected function setupOtherOptions()
    {
        global $Language, $Security;
        $option = $this->OtherOptions["addedit"];
        $option->UseDropDownButton = false;
        $option->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
        $option->UseButtonGroup = true;
        //$option->ButtonClass = ""; // Class for button group
        $item = &$option->add($option->GroupOptionName);
        $item->Body = "";
        $item->Visible = false;

        // Add
        if ($this->CurrentMode == "view") { // Check view mode
            $item = &$option->add("add");
            $addcaption = HtmlTitle($Language->phrase("AddLink"));
            $this->AddUrl = $this->getAddUrl();
            $item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode(GetUrl($this->AddUrl)) . "\">" . $Language->phrase("AddLink") . "</a>";
            $item->Visible = $this->AddUrl != "" && $Security->canAdd();
        }
    }

    // Render other options
    public function renderOtherOptions()
    {
        global $Language, $Security;
        $options = &$this->OtherOptions;
        if (($this->CurrentMode == "add" || $this->CurrentMode == "copy" || $this->CurrentMode == "edit") && !$this->isConfirm()) { // Check add/copy/edit mode
            if ($this->AllowAddDeleteRow) {
                $option = $options["addedit"];
                $option->UseDropDownButton = false;
                $item = &$option->add("addblankrow");
                $item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
                $item->Visible = $Security->canAdd();
                $this->ShowOtherOptions = $item->Visible;
            }
        }
        if ($this->CurrentMode == "view") { // Check view mode
            $option = $options["addedit"];
            $item = $option["add"];
            $this->ShowOtherOptions = $item && $item->Visible;
        }
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
        $this->PatientName->CurrentValue = null;
        $this->PatientName->OldValue = $this->PatientName->CurrentValue;
        $this->HusbandName->CurrentValue = null;
        $this->HusbandName->OldValue = $this->HusbandName->CurrentValue;
        $this->RequestDr->CurrentValue = null;
        $this->RequestDr->OldValue = $this->RequestDr->CurrentValue;
        $this->CollectionDate->CurrentValue = null;
        $this->CollectionDate->OldValue = $this->CollectionDate->CurrentValue;
        $this->ResultDate->CurrentValue = null;
        $this->ResultDate->OldValue = $this->ResultDate->CurrentValue;
        $this->RequestSample->CurrentValue = null;
        $this->RequestSample->OldValue = $this->RequestSample->CurrentValue;
        $this->CollectionType->CurrentValue = null;
        $this->CollectionType->OldValue = $this->CollectionType->CurrentValue;
        $this->CollectionMethod->CurrentValue = null;
        $this->CollectionMethod->OldValue = $this->CollectionMethod->CurrentValue;
        $this->Medicationused->CurrentValue = null;
        $this->Medicationused->OldValue = $this->Medicationused->CurrentValue;
        $this->DifficultiesinCollection->CurrentValue = null;
        $this->DifficultiesinCollection->OldValue = $this->DifficultiesinCollection->CurrentValue;
        $this->pH->CurrentValue = null;
        $this->pH->OldValue = $this->pH->CurrentValue;
        $this->Timeofcollection->CurrentValue = null;
        $this->Timeofcollection->OldValue = $this->Timeofcollection->CurrentValue;
        $this->Timeofexamination->CurrentValue = null;
        $this->Timeofexamination->OldValue = $this->Timeofexamination->CurrentValue;
        $this->Volume->CurrentValue = null;
        $this->Volume->OldValue = $this->Volume->CurrentValue;
        $this->Concentration->CurrentValue = null;
        $this->Concentration->OldValue = $this->Concentration->CurrentValue;
        $this->Total->CurrentValue = null;
        $this->Total->OldValue = $this->Total->CurrentValue;
        $this->ProgressiveMotility->CurrentValue = null;
        $this->ProgressiveMotility->OldValue = $this->ProgressiveMotility->CurrentValue;
        $this->NonProgrssiveMotile->CurrentValue = null;
        $this->NonProgrssiveMotile->OldValue = $this->NonProgrssiveMotile->CurrentValue;
        $this->Immotile->CurrentValue = null;
        $this->Immotile->OldValue = $this->Immotile->CurrentValue;
        $this->TotalProgrssiveMotile->CurrentValue = null;
        $this->TotalProgrssiveMotile->OldValue = $this->TotalProgrssiveMotile->CurrentValue;
        $this->Appearance->CurrentValue = null;
        $this->Appearance->OldValue = $this->Appearance->CurrentValue;
        $this->Homogenosity->CurrentValue = null;
        $this->Homogenosity->OldValue = $this->Homogenosity->CurrentValue;
        $this->CompleteSample->CurrentValue = null;
        $this->CompleteSample->OldValue = $this->CompleteSample->CurrentValue;
        $this->Liquefactiontime->CurrentValue = null;
        $this->Liquefactiontime->OldValue = $this->Liquefactiontime->CurrentValue;
        $this->Normal->CurrentValue = null;
        $this->Normal->OldValue = $this->Normal->CurrentValue;
        $this->Abnormal->CurrentValue = null;
        $this->Abnormal->OldValue = $this->Abnormal->CurrentValue;
        $this->Headdefects->CurrentValue = null;
        $this->Headdefects->OldValue = $this->Headdefects->CurrentValue;
        $this->MidpieceDefects->CurrentValue = null;
        $this->MidpieceDefects->OldValue = $this->MidpieceDefects->CurrentValue;
        $this->TailDefects->CurrentValue = null;
        $this->TailDefects->OldValue = $this->TailDefects->CurrentValue;
        $this->NormalProgMotile->CurrentValue = null;
        $this->NormalProgMotile->OldValue = $this->NormalProgMotile->CurrentValue;
        $this->ImmatureForms->CurrentValue = null;
        $this->ImmatureForms->OldValue = $this->ImmatureForms->CurrentValue;
        $this->Leucocytes->CurrentValue = null;
        $this->Leucocytes->OldValue = $this->Leucocytes->CurrentValue;
        $this->Agglutination->CurrentValue = null;
        $this->Agglutination->OldValue = $this->Agglutination->CurrentValue;
        $this->Debris->CurrentValue = null;
        $this->Debris->OldValue = $this->Debris->CurrentValue;
        $this->Diagnosis->CurrentValue = null;
        $this->Diagnosis->OldValue = $this->Diagnosis->CurrentValue;
        $this->Observations->CurrentValue = null;
        $this->Observations->OldValue = $this->Observations->CurrentValue;
        $this->Signature->CurrentValue = null;
        $this->Signature->OldValue = $this->Signature->CurrentValue;
        $this->SemenOrgin->CurrentValue = null;
        $this->SemenOrgin->OldValue = $this->SemenOrgin->CurrentValue;
        $this->Donor->CurrentValue = null;
        $this->Donor->OldValue = $this->Donor->CurrentValue;
        $this->DonorBloodgroup->CurrentValue = null;
        $this->DonorBloodgroup->OldValue = $this->DonorBloodgroup->CurrentValue;
        $this->Tank->CurrentValue = null;
        $this->Tank->OldValue = $this->Tank->CurrentValue;
        $this->Location->CurrentValue = null;
        $this->Location->OldValue = $this->Location->CurrentValue;
        $this->Volume1->CurrentValue = null;
        $this->Volume1->OldValue = $this->Volume1->CurrentValue;
        $this->Concentration1->CurrentValue = null;
        $this->Concentration1->OldValue = $this->Concentration1->CurrentValue;
        $this->Total1->CurrentValue = null;
        $this->Total1->OldValue = $this->Total1->CurrentValue;
        $this->ProgressiveMotility1->CurrentValue = null;
        $this->ProgressiveMotility1->OldValue = $this->ProgressiveMotility1->CurrentValue;
        $this->NonProgrssiveMotile1->CurrentValue = null;
        $this->NonProgrssiveMotile1->OldValue = $this->NonProgrssiveMotile1->CurrentValue;
        $this->Immotile1->CurrentValue = null;
        $this->Immotile1->OldValue = $this->Immotile1->CurrentValue;
        $this->TotalProgrssiveMotile1->CurrentValue = null;
        $this->TotalProgrssiveMotile1->OldValue = $this->TotalProgrssiveMotile1->CurrentValue;
        $this->TidNo->CurrentValue = null;
        $this->TidNo->OldValue = $this->TidNo->CurrentValue;
        $this->Color->CurrentValue = null;
        $this->Color->OldValue = $this->Color->CurrentValue;
        $this->DoneBy->CurrentValue = null;
        $this->DoneBy->OldValue = $this->DoneBy->CurrentValue;
        $this->Method->CurrentValue = null;
        $this->Method->OldValue = $this->Method->CurrentValue;
        $this->Abstinence->CurrentValue = null;
        $this->Abstinence->OldValue = $this->Abstinence->CurrentValue;
        $this->ProcessedBy->CurrentValue = null;
        $this->ProcessedBy->OldValue = $this->ProcessedBy->CurrentValue;
        $this->InseminationTime->CurrentValue = null;
        $this->InseminationTime->OldValue = $this->InseminationTime->CurrentValue;
        $this->InseminationBy->CurrentValue = null;
        $this->InseminationBy->OldValue = $this->InseminationBy->CurrentValue;
        $this->Big->CurrentValue = null;
        $this->Big->OldValue = $this->Big->CurrentValue;
        $this->Medium->CurrentValue = null;
        $this->Medium->OldValue = $this->Medium->CurrentValue;
        $this->Small->CurrentValue = null;
        $this->Small->OldValue = $this->Small->CurrentValue;
        $this->NoHalo->CurrentValue = null;
        $this->NoHalo->OldValue = $this->NoHalo->CurrentValue;
        $this->Fragmented->CurrentValue = null;
        $this->Fragmented->OldValue = $this->Fragmented->CurrentValue;
        $this->NonFragmented->CurrentValue = null;
        $this->NonFragmented->OldValue = $this->NonFragmented->CurrentValue;
        $this->DFI->CurrentValue = null;
        $this->DFI->OldValue = $this->DFI->CurrentValue;
        $this->IsueBy->CurrentValue = null;
        $this->IsueBy->OldValue = $this->IsueBy->CurrentValue;
        $this->Volume2->CurrentValue = null;
        $this->Volume2->OldValue = $this->Volume2->CurrentValue;
        $this->Concentration2->CurrentValue = null;
        $this->Concentration2->OldValue = $this->Concentration2->CurrentValue;
        $this->Total2->CurrentValue = null;
        $this->Total2->OldValue = $this->Total2->CurrentValue;
        $this->ProgressiveMotility2->CurrentValue = null;
        $this->ProgressiveMotility2->OldValue = $this->ProgressiveMotility2->CurrentValue;
        $this->NonProgrssiveMotile2->CurrentValue = null;
        $this->NonProgrssiveMotile2->OldValue = $this->NonProgrssiveMotile2->CurrentValue;
        $this->Immotile2->CurrentValue = null;
        $this->Immotile2->OldValue = $this->Immotile2->CurrentValue;
        $this->TotalProgrssiveMotile2->CurrentValue = null;
        $this->TotalProgrssiveMotile2->OldValue = $this->TotalProgrssiveMotile2->CurrentValue;
        $this->MACS->CurrentValue = null;
        $this->MACS->OldValue = $this->MACS->CurrentValue;
        $this->IssuedBy->CurrentValue = null;
        $this->IssuedBy->OldValue = $this->IssuedBy->CurrentValue;
        $this->IssuedTo->CurrentValue = null;
        $this->IssuedTo->OldValue = $this->IssuedTo->CurrentValue;
        $this->PaID->CurrentValue = null;
        $this->PaID->OldValue = $this->PaID->CurrentValue;
        $this->PaName->CurrentValue = null;
        $this->PaName->OldValue = $this->PaName->CurrentValue;
        $this->PaMobile->CurrentValue = null;
        $this->PaMobile->OldValue = $this->PaMobile->CurrentValue;
        $this->PartnerID->CurrentValue = null;
        $this->PartnerID->OldValue = $this->PartnerID->CurrentValue;
        $this->PartnerName->CurrentValue = null;
        $this->PartnerName->OldValue = $this->PartnerName->CurrentValue;
        $this->PartnerMobile->CurrentValue = null;
        $this->PartnerMobile->OldValue = $this->PartnerMobile->CurrentValue;
        $this->PREG_TEST_DATE->CurrentValue = null;
        $this->PREG_TEST_DATE->OldValue = $this->PREG_TEST_DATE->CurrentValue;
        $this->SPECIFIC_PROBLEMS->CurrentValue = null;
        $this->SPECIFIC_PROBLEMS->OldValue = $this->SPECIFIC_PROBLEMS->CurrentValue;
        $this->IMSC_1->CurrentValue = null;
        $this->IMSC_1->OldValue = $this->IMSC_1->CurrentValue;
        $this->IMSC_2->CurrentValue = null;
        $this->IMSC_2->OldValue = $this->IMSC_2->CurrentValue;
        $this->LIQUIFACTION_STORAGE->CurrentValue = null;
        $this->LIQUIFACTION_STORAGE->OldValue = $this->LIQUIFACTION_STORAGE->CurrentValue;
        $this->IUI_PREP_METHOD->CurrentValue = null;
        $this->IUI_PREP_METHOD->OldValue = $this->IUI_PREP_METHOD->CurrentValue;
        $this->TIME_FROM_TRIGGER->CurrentValue = null;
        $this->TIME_FROM_TRIGGER->OldValue = $this->TIME_FROM_TRIGGER->CurrentValue;
        $this->COLLECTION_TO_PREPARATION->CurrentValue = null;
        $this->COLLECTION_TO_PREPARATION->OldValue = $this->COLLECTION_TO_PREPARATION->CurrentValue;
        $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = null;
        $this->TIME_FROM_PREP_TO_INSEM->OldValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
    }

    // Load form values
    protected function loadFormValues()
    {
        // Load from form
        global $CurrentForm;
        $CurrentForm->FormName = $this->FormName;

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

        // Check field name 'PatientName' first before field var 'x_PatientName'
        $val = $CurrentForm->hasValue("PatientName") ? $CurrentForm->getValue("PatientName") : $CurrentForm->getValue("x_PatientName");
        if (!$this->PatientName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PatientName->Visible = false; // Disable update for API request
            } else {
                $this->PatientName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PatientName")) {
            $this->PatientName->setOldValue($CurrentForm->getValue("o_PatientName"));
        }

        // Check field name 'HusbandName' first before field var 'x_HusbandName'
        $val = $CurrentForm->hasValue("HusbandName") ? $CurrentForm->getValue("HusbandName") : $CurrentForm->getValue("x_HusbandName");
        if (!$this->HusbandName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->HusbandName->Visible = false; // Disable update for API request
            } else {
                $this->HusbandName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_HusbandName")) {
            $this->HusbandName->setOldValue($CurrentForm->getValue("o_HusbandName"));
        }

        // Check field name 'RequestDr' first before field var 'x_RequestDr'
        $val = $CurrentForm->hasValue("RequestDr") ? $CurrentForm->getValue("RequestDr") : $CurrentForm->getValue("x_RequestDr");
        if (!$this->RequestDr->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestDr->Visible = false; // Disable update for API request
            } else {
                $this->RequestDr->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RequestDr")) {
            $this->RequestDr->setOldValue($CurrentForm->getValue("o_RequestDr"));
        }

        // Check field name 'CollectionDate' first before field var 'x_CollectionDate'
        $val = $CurrentForm->hasValue("CollectionDate") ? $CurrentForm->getValue("CollectionDate") : $CurrentForm->getValue("x_CollectionDate");
        if (!$this->CollectionDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionDate->Visible = false; // Disable update for API request
            } else {
                $this->CollectionDate->setFormValue($val);
            }
            $this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_CollectionDate")) {
            $this->CollectionDate->setOldValue($CurrentForm->getValue("o_CollectionDate"));
        }

        // Check field name 'ResultDate' first before field var 'x_ResultDate'
        $val = $CurrentForm->hasValue("ResultDate") ? $CurrentForm->getValue("ResultDate") : $CurrentForm->getValue("x_ResultDate");
        if (!$this->ResultDate->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ResultDate->Visible = false; // Disable update for API request
            } else {
                $this->ResultDate->setFormValue($val);
            }
            $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_ResultDate")) {
            $this->ResultDate->setOldValue($CurrentForm->getValue("o_ResultDate"));
        }

        // Check field name 'RequestSample' first before field var 'x_RequestSample'
        $val = $CurrentForm->hasValue("RequestSample") ? $CurrentForm->getValue("RequestSample") : $CurrentForm->getValue("x_RequestSample");
        if (!$this->RequestSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->RequestSample->Visible = false; // Disable update for API request
            } else {
                $this->RequestSample->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_RequestSample")) {
            $this->RequestSample->setOldValue($CurrentForm->getValue("o_RequestSample"));
        }

        // Check field name 'CollectionType' first before field var 'x_CollectionType'
        $val = $CurrentForm->hasValue("CollectionType") ? $CurrentForm->getValue("CollectionType") : $CurrentForm->getValue("x_CollectionType");
        if (!$this->CollectionType->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionType->Visible = false; // Disable update for API request
            } else {
                $this->CollectionType->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CollectionType")) {
            $this->CollectionType->setOldValue($CurrentForm->getValue("o_CollectionType"));
        }

        // Check field name 'CollectionMethod' first before field var 'x_CollectionMethod'
        $val = $CurrentForm->hasValue("CollectionMethod") ? $CurrentForm->getValue("CollectionMethod") : $CurrentForm->getValue("x_CollectionMethod");
        if (!$this->CollectionMethod->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CollectionMethod->Visible = false; // Disable update for API request
            } else {
                $this->CollectionMethod->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CollectionMethod")) {
            $this->CollectionMethod->setOldValue($CurrentForm->getValue("o_CollectionMethod"));
        }

        // Check field name 'Medicationused' first before field var 'x_Medicationused'
        $val = $CurrentForm->hasValue("Medicationused") ? $CurrentForm->getValue("Medicationused") : $CurrentForm->getValue("x_Medicationused");
        if (!$this->Medicationused->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medicationused->Visible = false; // Disable update for API request
            } else {
                $this->Medicationused->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Medicationused")) {
            $this->Medicationused->setOldValue($CurrentForm->getValue("o_Medicationused"));
        }

        // Check field name 'DifficultiesinCollection' first before field var 'x_DifficultiesinCollection'
        $val = $CurrentForm->hasValue("DifficultiesinCollection") ? $CurrentForm->getValue("DifficultiesinCollection") : $CurrentForm->getValue("x_DifficultiesinCollection");
        if (!$this->DifficultiesinCollection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DifficultiesinCollection->Visible = false; // Disable update for API request
            } else {
                $this->DifficultiesinCollection->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DifficultiesinCollection")) {
            $this->DifficultiesinCollection->setOldValue($CurrentForm->getValue("o_DifficultiesinCollection"));
        }

        // Check field name 'pH' first before field var 'x_pH'
        $val = $CurrentForm->hasValue("pH") ? $CurrentForm->getValue("pH") : $CurrentForm->getValue("x_pH");
        if (!$this->pH->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->pH->Visible = false; // Disable update for API request
            } else {
                $this->pH->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_pH")) {
            $this->pH->setOldValue($CurrentForm->getValue("o_pH"));
        }

        // Check field name 'Timeofcollection' first before field var 'x_Timeofcollection'
        $val = $CurrentForm->hasValue("Timeofcollection") ? $CurrentForm->getValue("Timeofcollection") : $CurrentForm->getValue("x_Timeofcollection");
        if (!$this->Timeofcollection->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Timeofcollection->Visible = false; // Disable update for API request
            } else {
                $this->Timeofcollection->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Timeofcollection")) {
            $this->Timeofcollection->setOldValue($CurrentForm->getValue("o_Timeofcollection"));
        }

        // Check field name 'Timeofexamination' first before field var 'x_Timeofexamination'
        $val = $CurrentForm->hasValue("Timeofexamination") ? $CurrentForm->getValue("Timeofexamination") : $CurrentForm->getValue("x_Timeofexamination");
        if (!$this->Timeofexamination->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Timeofexamination->Visible = false; // Disable update for API request
            } else {
                $this->Timeofexamination->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Timeofexamination")) {
            $this->Timeofexamination->setOldValue($CurrentForm->getValue("o_Timeofexamination"));
        }

        // Check field name 'Volume' first before field var 'x_Volume'
        $val = $CurrentForm->hasValue("Volume") ? $CurrentForm->getValue("Volume") : $CurrentForm->getValue("x_Volume");
        if (!$this->Volume->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume->Visible = false; // Disable update for API request
            } else {
                $this->Volume->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Volume")) {
            $this->Volume->setOldValue($CurrentForm->getValue("o_Volume"));
        }

        // Check field name 'Concentration' first before field var 'x_Concentration'
        $val = $CurrentForm->hasValue("Concentration") ? $CurrentForm->getValue("Concentration") : $CurrentForm->getValue("x_Concentration");
        if (!$this->Concentration->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration->Visible = false; // Disable update for API request
            } else {
                $this->Concentration->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Concentration")) {
            $this->Concentration->setOldValue($CurrentForm->getValue("o_Concentration"));
        }

        // Check field name 'Total' first before field var 'x_Total'
        $val = $CurrentForm->hasValue("Total") ? $CurrentForm->getValue("Total") : $CurrentForm->getValue("x_Total");
        if (!$this->Total->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total->Visible = false; // Disable update for API request
            } else {
                $this->Total->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Total")) {
            $this->Total->setOldValue($CurrentForm->getValue("o_Total"));
        }

        // Check field name 'ProgressiveMotility' first before field var 'x_ProgressiveMotility'
        $val = $CurrentForm->hasValue("ProgressiveMotility") ? $CurrentForm->getValue("ProgressiveMotility") : $CurrentForm->getValue("x_ProgressiveMotility");
        if (!$this->ProgressiveMotility->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProgressiveMotility")) {
            $this->ProgressiveMotility->setOldValue($CurrentForm->getValue("o_ProgressiveMotility"));
        }

        // Check field name 'NonProgrssiveMotile' first before field var 'x_NonProgrssiveMotile'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile") ? $CurrentForm->getValue("NonProgrssiveMotile") : $CurrentForm->getValue("x_NonProgrssiveMotile");
        if (!$this->NonProgrssiveMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NonProgrssiveMotile")) {
            $this->NonProgrssiveMotile->setOldValue($CurrentForm->getValue("o_NonProgrssiveMotile"));
        }

        // Check field name 'Immotile' first before field var 'x_Immotile'
        $val = $CurrentForm->hasValue("Immotile") ? $CurrentForm->getValue("Immotile") : $CurrentForm->getValue("x_Immotile");
        if (!$this->Immotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile->Visible = false; // Disable update for API request
            } else {
                $this->Immotile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Immotile")) {
            $this->Immotile->setOldValue($CurrentForm->getValue("o_Immotile"));
        }

        // Check field name 'TotalProgrssiveMotile' first before field var 'x_TotalProgrssiveMotile'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile") ? $CurrentForm->getValue("TotalProgrssiveMotile") : $CurrentForm->getValue("x_TotalProgrssiveMotile");
        if (!$this->TotalProgrssiveMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TotalProgrssiveMotile")) {
            $this->TotalProgrssiveMotile->setOldValue($CurrentForm->getValue("o_TotalProgrssiveMotile"));
        }

        // Check field name 'Appearance' first before field var 'x_Appearance'
        $val = $CurrentForm->hasValue("Appearance") ? $CurrentForm->getValue("Appearance") : $CurrentForm->getValue("x_Appearance");
        if (!$this->Appearance->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Appearance->Visible = false; // Disable update for API request
            } else {
                $this->Appearance->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Appearance")) {
            $this->Appearance->setOldValue($CurrentForm->getValue("o_Appearance"));
        }

        // Check field name 'Homogenosity' first before field var 'x_Homogenosity'
        $val = $CurrentForm->hasValue("Homogenosity") ? $CurrentForm->getValue("Homogenosity") : $CurrentForm->getValue("x_Homogenosity");
        if (!$this->Homogenosity->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Homogenosity->Visible = false; // Disable update for API request
            } else {
                $this->Homogenosity->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Homogenosity")) {
            $this->Homogenosity->setOldValue($CurrentForm->getValue("o_Homogenosity"));
        }

        // Check field name 'CompleteSample' first before field var 'x_CompleteSample'
        $val = $CurrentForm->hasValue("CompleteSample") ? $CurrentForm->getValue("CompleteSample") : $CurrentForm->getValue("x_CompleteSample");
        if (!$this->CompleteSample->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->CompleteSample->Visible = false; // Disable update for API request
            } else {
                $this->CompleteSample->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_CompleteSample")) {
            $this->CompleteSample->setOldValue($CurrentForm->getValue("o_CompleteSample"));
        }

        // Check field name 'Liquefactiontime' first before field var 'x_Liquefactiontime'
        $val = $CurrentForm->hasValue("Liquefactiontime") ? $CurrentForm->getValue("Liquefactiontime") : $CurrentForm->getValue("x_Liquefactiontime");
        if (!$this->Liquefactiontime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Liquefactiontime->Visible = false; // Disable update for API request
            } else {
                $this->Liquefactiontime->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Liquefactiontime")) {
            $this->Liquefactiontime->setOldValue($CurrentForm->getValue("o_Liquefactiontime"));
        }

        // Check field name 'Normal' first before field var 'x_Normal'
        $val = $CurrentForm->hasValue("Normal") ? $CurrentForm->getValue("Normal") : $CurrentForm->getValue("x_Normal");
        if (!$this->Normal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Normal->Visible = false; // Disable update for API request
            } else {
                $this->Normal->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Normal")) {
            $this->Normal->setOldValue($CurrentForm->getValue("o_Normal"));
        }

        // Check field name 'Abnormal' first before field var 'x_Abnormal'
        $val = $CurrentForm->hasValue("Abnormal") ? $CurrentForm->getValue("Abnormal") : $CurrentForm->getValue("x_Abnormal");
        if (!$this->Abnormal->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abnormal->Visible = false; // Disable update for API request
            } else {
                $this->Abnormal->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Abnormal")) {
            $this->Abnormal->setOldValue($CurrentForm->getValue("o_Abnormal"));
        }

        // Check field name 'Headdefects' first before field var 'x_Headdefects'
        $val = $CurrentForm->hasValue("Headdefects") ? $CurrentForm->getValue("Headdefects") : $CurrentForm->getValue("x_Headdefects");
        if (!$this->Headdefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Headdefects->Visible = false; // Disable update for API request
            } else {
                $this->Headdefects->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Headdefects")) {
            $this->Headdefects->setOldValue($CurrentForm->getValue("o_Headdefects"));
        }

        // Check field name 'MidpieceDefects' first before field var 'x_MidpieceDefects'
        $val = $CurrentForm->hasValue("MidpieceDefects") ? $CurrentForm->getValue("MidpieceDefects") : $CurrentForm->getValue("x_MidpieceDefects");
        if (!$this->MidpieceDefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->MidpieceDefects->Visible = false; // Disable update for API request
            } else {
                $this->MidpieceDefects->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_MidpieceDefects")) {
            $this->MidpieceDefects->setOldValue($CurrentForm->getValue("o_MidpieceDefects"));
        }

        // Check field name 'TailDefects' first before field var 'x_TailDefects'
        $val = $CurrentForm->hasValue("TailDefects") ? $CurrentForm->getValue("TailDefects") : $CurrentForm->getValue("x_TailDefects");
        if (!$this->TailDefects->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TailDefects->Visible = false; // Disable update for API request
            } else {
                $this->TailDefects->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TailDefects")) {
            $this->TailDefects->setOldValue($CurrentForm->getValue("o_TailDefects"));
        }

        // Check field name 'NormalProgMotile' first before field var 'x_NormalProgMotile'
        $val = $CurrentForm->hasValue("NormalProgMotile") ? $CurrentForm->getValue("NormalProgMotile") : $CurrentForm->getValue("x_NormalProgMotile");
        if (!$this->NormalProgMotile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NormalProgMotile->Visible = false; // Disable update for API request
            } else {
                $this->NormalProgMotile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NormalProgMotile")) {
            $this->NormalProgMotile->setOldValue($CurrentForm->getValue("o_NormalProgMotile"));
        }

        // Check field name 'ImmatureForms' first before field var 'x_ImmatureForms'
        $val = $CurrentForm->hasValue("ImmatureForms") ? $CurrentForm->getValue("ImmatureForms") : $CurrentForm->getValue("x_ImmatureForms");
        if (!$this->ImmatureForms->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ImmatureForms->Visible = false; // Disable update for API request
            } else {
                $this->ImmatureForms->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ImmatureForms")) {
            $this->ImmatureForms->setOldValue($CurrentForm->getValue("o_ImmatureForms"));
        }

        // Check field name 'Leucocytes' first before field var 'x_Leucocytes'
        $val = $CurrentForm->hasValue("Leucocytes") ? $CurrentForm->getValue("Leucocytes") : $CurrentForm->getValue("x_Leucocytes");
        if (!$this->Leucocytes->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Leucocytes->Visible = false; // Disable update for API request
            } else {
                $this->Leucocytes->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Leucocytes")) {
            $this->Leucocytes->setOldValue($CurrentForm->getValue("o_Leucocytes"));
        }

        // Check field name 'Agglutination' first before field var 'x_Agglutination'
        $val = $CurrentForm->hasValue("Agglutination") ? $CurrentForm->getValue("Agglutination") : $CurrentForm->getValue("x_Agglutination");
        if (!$this->Agglutination->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Agglutination->Visible = false; // Disable update for API request
            } else {
                $this->Agglutination->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Agglutination")) {
            $this->Agglutination->setOldValue($CurrentForm->getValue("o_Agglutination"));
        }

        // Check field name 'Debris' first before field var 'x_Debris'
        $val = $CurrentForm->hasValue("Debris") ? $CurrentForm->getValue("Debris") : $CurrentForm->getValue("x_Debris");
        if (!$this->Debris->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Debris->Visible = false; // Disable update for API request
            } else {
                $this->Debris->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Debris")) {
            $this->Debris->setOldValue($CurrentForm->getValue("o_Debris"));
        }

        // Check field name 'Diagnosis' first before field var 'x_Diagnosis'
        $val = $CurrentForm->hasValue("Diagnosis") ? $CurrentForm->getValue("Diagnosis") : $CurrentForm->getValue("x_Diagnosis");
        if (!$this->Diagnosis->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Diagnosis->Visible = false; // Disable update for API request
            } else {
                $this->Diagnosis->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Diagnosis")) {
            $this->Diagnosis->setOldValue($CurrentForm->getValue("o_Diagnosis"));
        }

        // Check field name 'Observations' first before field var 'x_Observations'
        $val = $CurrentForm->hasValue("Observations") ? $CurrentForm->getValue("Observations") : $CurrentForm->getValue("x_Observations");
        if (!$this->Observations->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Observations->Visible = false; // Disable update for API request
            } else {
                $this->Observations->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Observations")) {
            $this->Observations->setOldValue($CurrentForm->getValue("o_Observations"));
        }

        // Check field name 'Signature' first before field var 'x_Signature'
        $val = $CurrentForm->hasValue("Signature") ? $CurrentForm->getValue("Signature") : $CurrentForm->getValue("x_Signature");
        if (!$this->Signature->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Signature->Visible = false; // Disable update for API request
            } else {
                $this->Signature->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Signature")) {
            $this->Signature->setOldValue($CurrentForm->getValue("o_Signature"));
        }

        // Check field name 'SemenOrgin' first before field var 'x_SemenOrgin'
        $val = $CurrentForm->hasValue("SemenOrgin") ? $CurrentForm->getValue("SemenOrgin") : $CurrentForm->getValue("x_SemenOrgin");
        if (!$this->SemenOrgin->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SemenOrgin->Visible = false; // Disable update for API request
            } else {
                $this->SemenOrgin->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SemenOrgin")) {
            $this->SemenOrgin->setOldValue($CurrentForm->getValue("o_SemenOrgin"));
        }

        // Check field name 'Donor' first before field var 'x_Donor'
        $val = $CurrentForm->hasValue("Donor") ? $CurrentForm->getValue("Donor") : $CurrentForm->getValue("x_Donor");
        if (!$this->Donor->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Donor->Visible = false; // Disable update for API request
            } else {
                $this->Donor->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Donor")) {
            $this->Donor->setOldValue($CurrentForm->getValue("o_Donor"));
        }

        // Check field name 'DonorBloodgroup' first before field var 'x_DonorBloodgroup'
        $val = $CurrentForm->hasValue("DonorBloodgroup") ? $CurrentForm->getValue("DonorBloodgroup") : $CurrentForm->getValue("x_DonorBloodgroup");
        if (!$this->DonorBloodgroup->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DonorBloodgroup->Visible = false; // Disable update for API request
            } else {
                $this->DonorBloodgroup->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DonorBloodgroup")) {
            $this->DonorBloodgroup->setOldValue($CurrentForm->getValue("o_DonorBloodgroup"));
        }

        // Check field name 'Tank' first before field var 'x_Tank'
        $val = $CurrentForm->hasValue("Tank") ? $CurrentForm->getValue("Tank") : $CurrentForm->getValue("x_Tank");
        if (!$this->Tank->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Tank->Visible = false; // Disable update for API request
            } else {
                $this->Tank->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Tank")) {
            $this->Tank->setOldValue($CurrentForm->getValue("o_Tank"));
        }

        // Check field name 'Location' first before field var 'x_Location'
        $val = $CurrentForm->hasValue("Location") ? $CurrentForm->getValue("Location") : $CurrentForm->getValue("x_Location");
        if (!$this->Location->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Location->Visible = false; // Disable update for API request
            } else {
                $this->Location->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Location")) {
            $this->Location->setOldValue($CurrentForm->getValue("o_Location"));
        }

        // Check field name 'Volume1' first before field var 'x_Volume1'
        $val = $CurrentForm->hasValue("Volume1") ? $CurrentForm->getValue("Volume1") : $CurrentForm->getValue("x_Volume1");
        if (!$this->Volume1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume1->Visible = false; // Disable update for API request
            } else {
                $this->Volume1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Volume1")) {
            $this->Volume1->setOldValue($CurrentForm->getValue("o_Volume1"));
        }

        // Check field name 'Concentration1' first before field var 'x_Concentration1'
        $val = $CurrentForm->hasValue("Concentration1") ? $CurrentForm->getValue("Concentration1") : $CurrentForm->getValue("x_Concentration1");
        if (!$this->Concentration1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration1->Visible = false; // Disable update for API request
            } else {
                $this->Concentration1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Concentration1")) {
            $this->Concentration1->setOldValue($CurrentForm->getValue("o_Concentration1"));
        }

        // Check field name 'Total1' first before field var 'x_Total1'
        $val = $CurrentForm->hasValue("Total1") ? $CurrentForm->getValue("Total1") : $CurrentForm->getValue("x_Total1");
        if (!$this->Total1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total1->Visible = false; // Disable update for API request
            } else {
                $this->Total1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Total1")) {
            $this->Total1->setOldValue($CurrentForm->getValue("o_Total1"));
        }

        // Check field name 'ProgressiveMotility1' first before field var 'x_ProgressiveMotility1'
        $val = $CurrentForm->hasValue("ProgressiveMotility1") ? $CurrentForm->getValue("ProgressiveMotility1") : $CurrentForm->getValue("x_ProgressiveMotility1");
        if (!$this->ProgressiveMotility1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility1->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProgressiveMotility1")) {
            $this->ProgressiveMotility1->setOldValue($CurrentForm->getValue("o_ProgressiveMotility1"));
        }

        // Check field name 'NonProgrssiveMotile1' first before field var 'x_NonProgrssiveMotile1'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile1") ? $CurrentForm->getValue("NonProgrssiveMotile1") : $CurrentForm->getValue("x_NonProgrssiveMotile1");
        if (!$this->NonProgrssiveMotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile1->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NonProgrssiveMotile1")) {
            $this->NonProgrssiveMotile1->setOldValue($CurrentForm->getValue("o_NonProgrssiveMotile1"));
        }

        // Check field name 'Immotile1' first before field var 'x_Immotile1'
        $val = $CurrentForm->hasValue("Immotile1") ? $CurrentForm->getValue("Immotile1") : $CurrentForm->getValue("x_Immotile1");
        if (!$this->Immotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile1->Visible = false; // Disable update for API request
            } else {
                $this->Immotile1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Immotile1")) {
            $this->Immotile1->setOldValue($CurrentForm->getValue("o_Immotile1"));
        }

        // Check field name 'TotalProgrssiveMotile1' first before field var 'x_TotalProgrssiveMotile1'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile1") ? $CurrentForm->getValue("TotalProgrssiveMotile1") : $CurrentForm->getValue("x_TotalProgrssiveMotile1");
        if (!$this->TotalProgrssiveMotile1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile1->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TotalProgrssiveMotile1")) {
            $this->TotalProgrssiveMotile1->setOldValue($CurrentForm->getValue("o_TotalProgrssiveMotile1"));
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

        // Check field name 'Color' first before field var 'x_Color'
        $val = $CurrentForm->hasValue("Color") ? $CurrentForm->getValue("Color") : $CurrentForm->getValue("x_Color");
        if (!$this->Color->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Color->Visible = false; // Disable update for API request
            } else {
                $this->Color->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Color")) {
            $this->Color->setOldValue($CurrentForm->getValue("o_Color"));
        }

        // Check field name 'DoneBy' first before field var 'x_DoneBy'
        $val = $CurrentForm->hasValue("DoneBy") ? $CurrentForm->getValue("DoneBy") : $CurrentForm->getValue("x_DoneBy");
        if (!$this->DoneBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DoneBy->Visible = false; // Disable update for API request
            } else {
                $this->DoneBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DoneBy")) {
            $this->DoneBy->setOldValue($CurrentForm->getValue("o_DoneBy"));
        }

        // Check field name 'Method' first before field var 'x_Method'
        $val = $CurrentForm->hasValue("Method") ? $CurrentForm->getValue("Method") : $CurrentForm->getValue("x_Method");
        if (!$this->Method->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Method->Visible = false; // Disable update for API request
            } else {
                $this->Method->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Method")) {
            $this->Method->setOldValue($CurrentForm->getValue("o_Method"));
        }

        // Check field name 'Abstinence' first before field var 'x_Abstinence'
        $val = $CurrentForm->hasValue("Abstinence") ? $CurrentForm->getValue("Abstinence") : $CurrentForm->getValue("x_Abstinence");
        if (!$this->Abstinence->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Abstinence->Visible = false; // Disable update for API request
            } else {
                $this->Abstinence->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Abstinence")) {
            $this->Abstinence->setOldValue($CurrentForm->getValue("o_Abstinence"));
        }

        // Check field name 'ProcessedBy' first before field var 'x_ProcessedBy'
        $val = $CurrentForm->hasValue("ProcessedBy") ? $CurrentForm->getValue("ProcessedBy") : $CurrentForm->getValue("x_ProcessedBy");
        if (!$this->ProcessedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProcessedBy->Visible = false; // Disable update for API request
            } else {
                $this->ProcessedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProcessedBy")) {
            $this->ProcessedBy->setOldValue($CurrentForm->getValue("o_ProcessedBy"));
        }

        // Check field name 'InseminationTime' first before field var 'x_InseminationTime'
        $val = $CurrentForm->hasValue("InseminationTime") ? $CurrentForm->getValue("InseminationTime") : $CurrentForm->getValue("x_InseminationTime");
        if (!$this->InseminationTime->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminationTime->Visible = false; // Disable update for API request
            } else {
                $this->InseminationTime->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_InseminationTime")) {
            $this->InseminationTime->setOldValue($CurrentForm->getValue("o_InseminationTime"));
        }

        // Check field name 'InseminationBy' first before field var 'x_InseminationBy'
        $val = $CurrentForm->hasValue("InseminationBy") ? $CurrentForm->getValue("InseminationBy") : $CurrentForm->getValue("x_InseminationBy");
        if (!$this->InseminationBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->InseminationBy->Visible = false; // Disable update for API request
            } else {
                $this->InseminationBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_InseminationBy")) {
            $this->InseminationBy->setOldValue($CurrentForm->getValue("o_InseminationBy"));
        }

        // Check field name 'Big' first before field var 'x_Big'
        $val = $CurrentForm->hasValue("Big") ? $CurrentForm->getValue("Big") : $CurrentForm->getValue("x_Big");
        if (!$this->Big->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Big->Visible = false; // Disable update for API request
            } else {
                $this->Big->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Big")) {
            $this->Big->setOldValue($CurrentForm->getValue("o_Big"));
        }

        // Check field name 'Medium' first before field var 'x_Medium'
        $val = $CurrentForm->hasValue("Medium") ? $CurrentForm->getValue("Medium") : $CurrentForm->getValue("x_Medium");
        if (!$this->Medium->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Medium->Visible = false; // Disable update for API request
            } else {
                $this->Medium->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Medium")) {
            $this->Medium->setOldValue($CurrentForm->getValue("o_Medium"));
        }

        // Check field name 'Small' first before field var 'x_Small'
        $val = $CurrentForm->hasValue("Small") ? $CurrentForm->getValue("Small") : $CurrentForm->getValue("x_Small");
        if (!$this->Small->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Small->Visible = false; // Disable update for API request
            } else {
                $this->Small->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Small")) {
            $this->Small->setOldValue($CurrentForm->getValue("o_Small"));
        }

        // Check field name 'NoHalo' first before field var 'x_NoHalo'
        $val = $CurrentForm->hasValue("NoHalo") ? $CurrentForm->getValue("NoHalo") : $CurrentForm->getValue("x_NoHalo");
        if (!$this->NoHalo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NoHalo->Visible = false; // Disable update for API request
            } else {
                $this->NoHalo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NoHalo")) {
            $this->NoHalo->setOldValue($CurrentForm->getValue("o_NoHalo"));
        }

        // Check field name 'Fragmented' first before field var 'x_Fragmented'
        $val = $CurrentForm->hasValue("Fragmented") ? $CurrentForm->getValue("Fragmented") : $CurrentForm->getValue("x_Fragmented");
        if (!$this->Fragmented->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Fragmented->Visible = false; // Disable update for API request
            } else {
                $this->Fragmented->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Fragmented")) {
            $this->Fragmented->setOldValue($CurrentForm->getValue("o_Fragmented"));
        }

        // Check field name 'NonFragmented' first before field var 'x_NonFragmented'
        $val = $CurrentForm->hasValue("NonFragmented") ? $CurrentForm->getValue("NonFragmented") : $CurrentForm->getValue("x_NonFragmented");
        if (!$this->NonFragmented->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonFragmented->Visible = false; // Disable update for API request
            } else {
                $this->NonFragmented->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NonFragmented")) {
            $this->NonFragmented->setOldValue($CurrentForm->getValue("o_NonFragmented"));
        }

        // Check field name 'DFI' first before field var 'x_DFI'
        $val = $CurrentForm->hasValue("DFI") ? $CurrentForm->getValue("DFI") : $CurrentForm->getValue("x_DFI");
        if (!$this->DFI->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->DFI->Visible = false; // Disable update for API request
            } else {
                $this->DFI->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_DFI")) {
            $this->DFI->setOldValue($CurrentForm->getValue("o_DFI"));
        }

        // Check field name 'IsueBy' first before field var 'x_IsueBy'
        $val = $CurrentForm->hasValue("IsueBy") ? $CurrentForm->getValue("IsueBy") : $CurrentForm->getValue("x_IsueBy");
        if (!$this->IsueBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IsueBy->Visible = false; // Disable update for API request
            } else {
                $this->IsueBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IsueBy")) {
            $this->IsueBy->setOldValue($CurrentForm->getValue("o_IsueBy"));
        }

        // Check field name 'Volume2' first before field var 'x_Volume2'
        $val = $CurrentForm->hasValue("Volume2") ? $CurrentForm->getValue("Volume2") : $CurrentForm->getValue("x_Volume2");
        if (!$this->Volume2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Volume2->Visible = false; // Disable update for API request
            } else {
                $this->Volume2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Volume2")) {
            $this->Volume2->setOldValue($CurrentForm->getValue("o_Volume2"));
        }

        // Check field name 'Concentration2' first before field var 'x_Concentration2'
        $val = $CurrentForm->hasValue("Concentration2") ? $CurrentForm->getValue("Concentration2") : $CurrentForm->getValue("x_Concentration2");
        if (!$this->Concentration2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Concentration2->Visible = false; // Disable update for API request
            } else {
                $this->Concentration2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Concentration2")) {
            $this->Concentration2->setOldValue($CurrentForm->getValue("o_Concentration2"));
        }

        // Check field name 'Total2' first before field var 'x_Total2'
        $val = $CurrentForm->hasValue("Total2") ? $CurrentForm->getValue("Total2") : $CurrentForm->getValue("x_Total2");
        if (!$this->Total2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Total2->Visible = false; // Disable update for API request
            } else {
                $this->Total2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Total2")) {
            $this->Total2->setOldValue($CurrentForm->getValue("o_Total2"));
        }

        // Check field name 'ProgressiveMotility2' first before field var 'x_ProgressiveMotility2'
        $val = $CurrentForm->hasValue("ProgressiveMotility2") ? $CurrentForm->getValue("ProgressiveMotility2") : $CurrentForm->getValue("x_ProgressiveMotility2");
        if (!$this->ProgressiveMotility2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->ProgressiveMotility2->Visible = false; // Disable update for API request
            } else {
                $this->ProgressiveMotility2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_ProgressiveMotility2")) {
            $this->ProgressiveMotility2->setOldValue($CurrentForm->getValue("o_ProgressiveMotility2"));
        }

        // Check field name 'NonProgrssiveMotile2' first before field var 'x_NonProgrssiveMotile2'
        $val = $CurrentForm->hasValue("NonProgrssiveMotile2") ? $CurrentForm->getValue("NonProgrssiveMotile2") : $CurrentForm->getValue("x_NonProgrssiveMotile2");
        if (!$this->NonProgrssiveMotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->NonProgrssiveMotile2->Visible = false; // Disable update for API request
            } else {
                $this->NonProgrssiveMotile2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_NonProgrssiveMotile2")) {
            $this->NonProgrssiveMotile2->setOldValue($CurrentForm->getValue("o_NonProgrssiveMotile2"));
        }

        // Check field name 'Immotile2' first before field var 'x_Immotile2'
        $val = $CurrentForm->hasValue("Immotile2") ? $CurrentForm->getValue("Immotile2") : $CurrentForm->getValue("x_Immotile2");
        if (!$this->Immotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->Immotile2->Visible = false; // Disable update for API request
            } else {
                $this->Immotile2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_Immotile2")) {
            $this->Immotile2->setOldValue($CurrentForm->getValue("o_Immotile2"));
        }

        // Check field name 'TotalProgrssiveMotile2' first before field var 'x_TotalProgrssiveMotile2'
        $val = $CurrentForm->hasValue("TotalProgrssiveMotile2") ? $CurrentForm->getValue("TotalProgrssiveMotile2") : $CurrentForm->getValue("x_TotalProgrssiveMotile2");
        if (!$this->TotalProgrssiveMotile2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TotalProgrssiveMotile2->Visible = false; // Disable update for API request
            } else {
                $this->TotalProgrssiveMotile2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TotalProgrssiveMotile2")) {
            $this->TotalProgrssiveMotile2->setOldValue($CurrentForm->getValue("o_TotalProgrssiveMotile2"));
        }

        // Check field name 'IssuedBy' first before field var 'x_IssuedBy'
        $val = $CurrentForm->hasValue("IssuedBy") ? $CurrentForm->getValue("IssuedBy") : $CurrentForm->getValue("x_IssuedBy");
        if (!$this->IssuedBy->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IssuedBy->Visible = false; // Disable update for API request
            } else {
                $this->IssuedBy->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IssuedBy")) {
            $this->IssuedBy->setOldValue($CurrentForm->getValue("o_IssuedBy"));
        }

        // Check field name 'IssuedTo' first before field var 'x_IssuedTo'
        $val = $CurrentForm->hasValue("IssuedTo") ? $CurrentForm->getValue("IssuedTo") : $CurrentForm->getValue("x_IssuedTo");
        if (!$this->IssuedTo->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IssuedTo->Visible = false; // Disable update for API request
            } else {
                $this->IssuedTo->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IssuedTo")) {
            $this->IssuedTo->setOldValue($CurrentForm->getValue("o_IssuedTo"));
        }

        // Check field name 'PaID' first before field var 'x_PaID'
        $val = $CurrentForm->hasValue("PaID") ? $CurrentForm->getValue("PaID") : $CurrentForm->getValue("x_PaID");
        if (!$this->PaID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaID->Visible = false; // Disable update for API request
            } else {
                $this->PaID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaID")) {
            $this->PaID->setOldValue($CurrentForm->getValue("o_PaID"));
        }

        // Check field name 'PaName' first before field var 'x_PaName'
        $val = $CurrentForm->hasValue("PaName") ? $CurrentForm->getValue("PaName") : $CurrentForm->getValue("x_PaName");
        if (!$this->PaName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaName->Visible = false; // Disable update for API request
            } else {
                $this->PaName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaName")) {
            $this->PaName->setOldValue($CurrentForm->getValue("o_PaName"));
        }

        // Check field name 'PaMobile' first before field var 'x_PaMobile'
        $val = $CurrentForm->hasValue("PaMobile") ? $CurrentForm->getValue("PaMobile") : $CurrentForm->getValue("x_PaMobile");
        if (!$this->PaMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PaMobile->Visible = false; // Disable update for API request
            } else {
                $this->PaMobile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PaMobile")) {
            $this->PaMobile->setOldValue($CurrentForm->getValue("o_PaMobile"));
        }

        // Check field name 'PartnerID' first before field var 'x_PartnerID'
        $val = $CurrentForm->hasValue("PartnerID") ? $CurrentForm->getValue("PartnerID") : $CurrentForm->getValue("x_PartnerID");
        if (!$this->PartnerID->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerID->Visible = false; // Disable update for API request
            } else {
                $this->PartnerID->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PartnerID")) {
            $this->PartnerID->setOldValue($CurrentForm->getValue("o_PartnerID"));
        }

        // Check field name 'PartnerName' first before field var 'x_PartnerName'
        $val = $CurrentForm->hasValue("PartnerName") ? $CurrentForm->getValue("PartnerName") : $CurrentForm->getValue("x_PartnerName");
        if (!$this->PartnerName->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerName->Visible = false; // Disable update for API request
            } else {
                $this->PartnerName->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PartnerName")) {
            $this->PartnerName->setOldValue($CurrentForm->getValue("o_PartnerName"));
        }

        // Check field name 'PartnerMobile' first before field var 'x_PartnerMobile'
        $val = $CurrentForm->hasValue("PartnerMobile") ? $CurrentForm->getValue("PartnerMobile") : $CurrentForm->getValue("x_PartnerMobile");
        if (!$this->PartnerMobile->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PartnerMobile->Visible = false; // Disable update for API request
            } else {
                $this->PartnerMobile->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_PartnerMobile")) {
            $this->PartnerMobile->setOldValue($CurrentForm->getValue("o_PartnerMobile"));
        }

        // Check field name 'PREG_TEST_DATE' first before field var 'x_PREG_TEST_DATE'
        $val = $CurrentForm->hasValue("PREG_TEST_DATE") ? $CurrentForm->getValue("PREG_TEST_DATE") : $CurrentForm->getValue("x_PREG_TEST_DATE");
        if (!$this->PREG_TEST_DATE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->PREG_TEST_DATE->Visible = false; // Disable update for API request
            } else {
                $this->PREG_TEST_DATE->setFormValue($val);
            }
            $this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
        }
        if ($CurrentForm->hasValue("o_PREG_TEST_DATE")) {
            $this->PREG_TEST_DATE->setOldValue($CurrentForm->getValue("o_PREG_TEST_DATE"));
        }

        // Check field name 'SPECIFIC_PROBLEMS' first before field var 'x_SPECIFIC_PROBLEMS'
        $val = $CurrentForm->hasValue("SPECIFIC_PROBLEMS") ? $CurrentForm->getValue("SPECIFIC_PROBLEMS") : $CurrentForm->getValue("x_SPECIFIC_PROBLEMS");
        if (!$this->SPECIFIC_PROBLEMS->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->SPECIFIC_PROBLEMS->Visible = false; // Disable update for API request
            } else {
                $this->SPECIFIC_PROBLEMS->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_SPECIFIC_PROBLEMS")) {
            $this->SPECIFIC_PROBLEMS->setOldValue($CurrentForm->getValue("o_SPECIFIC_PROBLEMS"));
        }

        // Check field name 'IMSC_1' first before field var 'x_IMSC_1'
        $val = $CurrentForm->hasValue("IMSC_1") ? $CurrentForm->getValue("IMSC_1") : $CurrentForm->getValue("x_IMSC_1");
        if (!$this->IMSC_1->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IMSC_1->Visible = false; // Disable update for API request
            } else {
                $this->IMSC_1->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IMSC_1")) {
            $this->IMSC_1->setOldValue($CurrentForm->getValue("o_IMSC_1"));
        }

        // Check field name 'IMSC_2' first before field var 'x_IMSC_2'
        $val = $CurrentForm->hasValue("IMSC_2") ? $CurrentForm->getValue("IMSC_2") : $CurrentForm->getValue("x_IMSC_2");
        if (!$this->IMSC_2->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IMSC_2->Visible = false; // Disable update for API request
            } else {
                $this->IMSC_2->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IMSC_2")) {
            $this->IMSC_2->setOldValue($CurrentForm->getValue("o_IMSC_2"));
        }

        // Check field name 'LIQUIFACTION_STORAGE' first before field var 'x_LIQUIFACTION_STORAGE'
        $val = $CurrentForm->hasValue("LIQUIFACTION_STORAGE") ? $CurrentForm->getValue("LIQUIFACTION_STORAGE") : $CurrentForm->getValue("x_LIQUIFACTION_STORAGE");
        if (!$this->LIQUIFACTION_STORAGE->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->LIQUIFACTION_STORAGE->Visible = false; // Disable update for API request
            } else {
                $this->LIQUIFACTION_STORAGE->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_LIQUIFACTION_STORAGE")) {
            $this->LIQUIFACTION_STORAGE->setOldValue($CurrentForm->getValue("o_LIQUIFACTION_STORAGE"));
        }

        // Check field name 'IUI_PREP_METHOD' first before field var 'x_IUI_PREP_METHOD'
        $val = $CurrentForm->hasValue("IUI_PREP_METHOD") ? $CurrentForm->getValue("IUI_PREP_METHOD") : $CurrentForm->getValue("x_IUI_PREP_METHOD");
        if (!$this->IUI_PREP_METHOD->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->IUI_PREP_METHOD->Visible = false; // Disable update for API request
            } else {
                $this->IUI_PREP_METHOD->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_IUI_PREP_METHOD")) {
            $this->IUI_PREP_METHOD->setOldValue($CurrentForm->getValue("o_IUI_PREP_METHOD"));
        }

        // Check field name 'TIME_FROM_TRIGGER' first before field var 'x_TIME_FROM_TRIGGER'
        $val = $CurrentForm->hasValue("TIME_FROM_TRIGGER") ? $CurrentForm->getValue("TIME_FROM_TRIGGER") : $CurrentForm->getValue("x_TIME_FROM_TRIGGER");
        if (!$this->TIME_FROM_TRIGGER->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TIME_FROM_TRIGGER->Visible = false; // Disable update for API request
            } else {
                $this->TIME_FROM_TRIGGER->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TIME_FROM_TRIGGER")) {
            $this->TIME_FROM_TRIGGER->setOldValue($CurrentForm->getValue("o_TIME_FROM_TRIGGER"));
        }

        // Check field name 'COLLECTION_TO_PREPARATION' first before field var 'x_COLLECTION_TO_PREPARATION'
        $val = $CurrentForm->hasValue("COLLECTION_TO_PREPARATION") ? $CurrentForm->getValue("COLLECTION_TO_PREPARATION") : $CurrentForm->getValue("x_COLLECTION_TO_PREPARATION");
        if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->COLLECTION_TO_PREPARATION->Visible = false; // Disable update for API request
            } else {
                $this->COLLECTION_TO_PREPARATION->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_COLLECTION_TO_PREPARATION")) {
            $this->COLLECTION_TO_PREPARATION->setOldValue($CurrentForm->getValue("o_COLLECTION_TO_PREPARATION"));
        }

        // Check field name 'TIME_FROM_PREP_TO_INSEM' first before field var 'x_TIME_FROM_PREP_TO_INSEM'
        $val = $CurrentForm->hasValue("TIME_FROM_PREP_TO_INSEM") ? $CurrentForm->getValue("TIME_FROM_PREP_TO_INSEM") : $CurrentForm->getValue("x_TIME_FROM_PREP_TO_INSEM");
        if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->TIME_FROM_PREP_TO_INSEM->Visible = false; // Disable update for API request
            } else {
                $this->TIME_FROM_PREP_TO_INSEM->setFormValue($val);
            }
        }
        if ($CurrentForm->hasValue("o_TIME_FROM_PREP_TO_INSEM")) {
            $this->TIME_FROM_PREP_TO_INSEM->setOldValue($CurrentForm->getValue("o_TIME_FROM_PREP_TO_INSEM"));
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
        $this->PatientName->CurrentValue = $this->PatientName->FormValue;
        $this->HusbandName->CurrentValue = $this->HusbandName->FormValue;
        $this->RequestDr->CurrentValue = $this->RequestDr->FormValue;
        $this->CollectionDate->CurrentValue = $this->CollectionDate->FormValue;
        $this->CollectionDate->CurrentValue = UnFormatDateTime($this->CollectionDate->CurrentValue, 0);
        $this->ResultDate->CurrentValue = $this->ResultDate->FormValue;
        $this->ResultDate->CurrentValue = UnFormatDateTime($this->ResultDate->CurrentValue, 0);
        $this->RequestSample->CurrentValue = $this->RequestSample->FormValue;
        $this->CollectionType->CurrentValue = $this->CollectionType->FormValue;
        $this->CollectionMethod->CurrentValue = $this->CollectionMethod->FormValue;
        $this->Medicationused->CurrentValue = $this->Medicationused->FormValue;
        $this->DifficultiesinCollection->CurrentValue = $this->DifficultiesinCollection->FormValue;
        $this->pH->CurrentValue = $this->pH->FormValue;
        $this->Timeofcollection->CurrentValue = $this->Timeofcollection->FormValue;
        $this->Timeofexamination->CurrentValue = $this->Timeofexamination->FormValue;
        $this->Volume->CurrentValue = $this->Volume->FormValue;
        $this->Concentration->CurrentValue = $this->Concentration->FormValue;
        $this->Total->CurrentValue = $this->Total->FormValue;
        $this->ProgressiveMotility->CurrentValue = $this->ProgressiveMotility->FormValue;
        $this->NonProgrssiveMotile->CurrentValue = $this->NonProgrssiveMotile->FormValue;
        $this->Immotile->CurrentValue = $this->Immotile->FormValue;
        $this->TotalProgrssiveMotile->CurrentValue = $this->TotalProgrssiveMotile->FormValue;
        $this->Appearance->CurrentValue = $this->Appearance->FormValue;
        $this->Homogenosity->CurrentValue = $this->Homogenosity->FormValue;
        $this->CompleteSample->CurrentValue = $this->CompleteSample->FormValue;
        $this->Liquefactiontime->CurrentValue = $this->Liquefactiontime->FormValue;
        $this->Normal->CurrentValue = $this->Normal->FormValue;
        $this->Abnormal->CurrentValue = $this->Abnormal->FormValue;
        $this->Headdefects->CurrentValue = $this->Headdefects->FormValue;
        $this->MidpieceDefects->CurrentValue = $this->MidpieceDefects->FormValue;
        $this->TailDefects->CurrentValue = $this->TailDefects->FormValue;
        $this->NormalProgMotile->CurrentValue = $this->NormalProgMotile->FormValue;
        $this->ImmatureForms->CurrentValue = $this->ImmatureForms->FormValue;
        $this->Leucocytes->CurrentValue = $this->Leucocytes->FormValue;
        $this->Agglutination->CurrentValue = $this->Agglutination->FormValue;
        $this->Debris->CurrentValue = $this->Debris->FormValue;
        $this->Diagnosis->CurrentValue = $this->Diagnosis->FormValue;
        $this->Observations->CurrentValue = $this->Observations->FormValue;
        $this->Signature->CurrentValue = $this->Signature->FormValue;
        $this->SemenOrgin->CurrentValue = $this->SemenOrgin->FormValue;
        $this->Donor->CurrentValue = $this->Donor->FormValue;
        $this->DonorBloodgroup->CurrentValue = $this->DonorBloodgroup->FormValue;
        $this->Tank->CurrentValue = $this->Tank->FormValue;
        $this->Location->CurrentValue = $this->Location->FormValue;
        $this->Volume1->CurrentValue = $this->Volume1->FormValue;
        $this->Concentration1->CurrentValue = $this->Concentration1->FormValue;
        $this->Total1->CurrentValue = $this->Total1->FormValue;
        $this->ProgressiveMotility1->CurrentValue = $this->ProgressiveMotility1->FormValue;
        $this->NonProgrssiveMotile1->CurrentValue = $this->NonProgrssiveMotile1->FormValue;
        $this->Immotile1->CurrentValue = $this->Immotile1->FormValue;
        $this->TotalProgrssiveMotile1->CurrentValue = $this->TotalProgrssiveMotile1->FormValue;
        $this->TidNo->CurrentValue = $this->TidNo->FormValue;
        $this->Color->CurrentValue = $this->Color->FormValue;
        $this->DoneBy->CurrentValue = $this->DoneBy->FormValue;
        $this->Method->CurrentValue = $this->Method->FormValue;
        $this->Abstinence->CurrentValue = $this->Abstinence->FormValue;
        $this->ProcessedBy->CurrentValue = $this->ProcessedBy->FormValue;
        $this->InseminationTime->CurrentValue = $this->InseminationTime->FormValue;
        $this->InseminationBy->CurrentValue = $this->InseminationBy->FormValue;
        $this->Big->CurrentValue = $this->Big->FormValue;
        $this->Medium->CurrentValue = $this->Medium->FormValue;
        $this->Small->CurrentValue = $this->Small->FormValue;
        $this->NoHalo->CurrentValue = $this->NoHalo->FormValue;
        $this->Fragmented->CurrentValue = $this->Fragmented->FormValue;
        $this->NonFragmented->CurrentValue = $this->NonFragmented->FormValue;
        $this->DFI->CurrentValue = $this->DFI->FormValue;
        $this->IsueBy->CurrentValue = $this->IsueBy->FormValue;
        $this->Volume2->CurrentValue = $this->Volume2->FormValue;
        $this->Concentration2->CurrentValue = $this->Concentration2->FormValue;
        $this->Total2->CurrentValue = $this->Total2->FormValue;
        $this->ProgressiveMotility2->CurrentValue = $this->ProgressiveMotility2->FormValue;
        $this->NonProgrssiveMotile2->CurrentValue = $this->NonProgrssiveMotile2->FormValue;
        $this->Immotile2->CurrentValue = $this->Immotile2->FormValue;
        $this->TotalProgrssiveMotile2->CurrentValue = $this->TotalProgrssiveMotile2->FormValue;
        $this->IssuedBy->CurrentValue = $this->IssuedBy->FormValue;
        $this->IssuedTo->CurrentValue = $this->IssuedTo->FormValue;
        $this->PaID->CurrentValue = $this->PaID->FormValue;
        $this->PaName->CurrentValue = $this->PaName->FormValue;
        $this->PaMobile->CurrentValue = $this->PaMobile->FormValue;
        $this->PartnerID->CurrentValue = $this->PartnerID->FormValue;
        $this->PartnerName->CurrentValue = $this->PartnerName->FormValue;
        $this->PartnerMobile->CurrentValue = $this->PartnerMobile->FormValue;
        $this->PREG_TEST_DATE->CurrentValue = $this->PREG_TEST_DATE->FormValue;
        $this->PREG_TEST_DATE->CurrentValue = UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0);
        $this->SPECIFIC_PROBLEMS->CurrentValue = $this->SPECIFIC_PROBLEMS->FormValue;
        $this->IMSC_1->CurrentValue = $this->IMSC_1->FormValue;
        $this->IMSC_2->CurrentValue = $this->IMSC_2->FormValue;
        $this->LIQUIFACTION_STORAGE->CurrentValue = $this->LIQUIFACTION_STORAGE->FormValue;
        $this->IUI_PREP_METHOD->CurrentValue = $this->IUI_PREP_METHOD->FormValue;
        $this->TIME_FROM_TRIGGER->CurrentValue = $this->TIME_FROM_TRIGGER->FormValue;
        $this->COLLECTION_TO_PREPARATION->CurrentValue = $this->COLLECTION_TO_PREPARATION->FormValue;
        $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = $this->TIME_FROM_PREP_TO_INSEM->FormValue;
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
        $this->pH->setDbValue($row['pH']);
        $this->Timeofcollection->setDbValue($row['Timeofcollection']);
        $this->Timeofexamination->setDbValue($row['Timeofexamination']);
        $this->Volume->setDbValue($row['Volume']);
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
        $this->MACS->setDbValue($row['MACS']);
        $this->IssuedBy->setDbValue($row['IssuedBy']);
        $this->IssuedTo->setDbValue($row['IssuedTo']);
        $this->PaID->setDbValue($row['PaID']);
        $this->PaName->setDbValue($row['PaName']);
        $this->PaMobile->setDbValue($row['PaMobile']);
        $this->PartnerID->setDbValue($row['PartnerID']);
        $this->PartnerName->setDbValue($row['PartnerName']);
        $this->PartnerMobile->setDbValue($row['PartnerMobile']);
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
        $this->loadDefaultValues();
        $row = [];
        $row['id'] = $this->id->CurrentValue;
        $row['RIDNo'] = $this->RIDNo->CurrentValue;
        $row['PatientName'] = $this->PatientName->CurrentValue;
        $row['HusbandName'] = $this->HusbandName->CurrentValue;
        $row['RequestDr'] = $this->RequestDr->CurrentValue;
        $row['CollectionDate'] = $this->CollectionDate->CurrentValue;
        $row['ResultDate'] = $this->ResultDate->CurrentValue;
        $row['RequestSample'] = $this->RequestSample->CurrentValue;
        $row['CollectionType'] = $this->CollectionType->CurrentValue;
        $row['CollectionMethod'] = $this->CollectionMethod->CurrentValue;
        $row['Medicationused'] = $this->Medicationused->CurrentValue;
        $row['DifficultiesinCollection'] = $this->DifficultiesinCollection->CurrentValue;
        $row['pH'] = $this->pH->CurrentValue;
        $row['Timeofcollection'] = $this->Timeofcollection->CurrentValue;
        $row['Timeofexamination'] = $this->Timeofexamination->CurrentValue;
        $row['Volume'] = $this->Volume->CurrentValue;
        $row['Concentration'] = $this->Concentration->CurrentValue;
        $row['Total'] = $this->Total->CurrentValue;
        $row['ProgressiveMotility'] = $this->ProgressiveMotility->CurrentValue;
        $row['NonProgrssiveMotile'] = $this->NonProgrssiveMotile->CurrentValue;
        $row['Immotile'] = $this->Immotile->CurrentValue;
        $row['TotalProgrssiveMotile'] = $this->TotalProgrssiveMotile->CurrentValue;
        $row['Appearance'] = $this->Appearance->CurrentValue;
        $row['Homogenosity'] = $this->Homogenosity->CurrentValue;
        $row['CompleteSample'] = $this->CompleteSample->CurrentValue;
        $row['Liquefactiontime'] = $this->Liquefactiontime->CurrentValue;
        $row['Normal'] = $this->Normal->CurrentValue;
        $row['Abnormal'] = $this->Abnormal->CurrentValue;
        $row['Headdefects'] = $this->Headdefects->CurrentValue;
        $row['MidpieceDefects'] = $this->MidpieceDefects->CurrentValue;
        $row['TailDefects'] = $this->TailDefects->CurrentValue;
        $row['NormalProgMotile'] = $this->NormalProgMotile->CurrentValue;
        $row['ImmatureForms'] = $this->ImmatureForms->CurrentValue;
        $row['Leucocytes'] = $this->Leucocytes->CurrentValue;
        $row['Agglutination'] = $this->Agglutination->CurrentValue;
        $row['Debris'] = $this->Debris->CurrentValue;
        $row['Diagnosis'] = $this->Diagnosis->CurrentValue;
        $row['Observations'] = $this->Observations->CurrentValue;
        $row['Signature'] = $this->Signature->CurrentValue;
        $row['SemenOrgin'] = $this->SemenOrgin->CurrentValue;
        $row['Donor'] = $this->Donor->CurrentValue;
        $row['DonorBloodgroup'] = $this->DonorBloodgroup->CurrentValue;
        $row['Tank'] = $this->Tank->CurrentValue;
        $row['Location'] = $this->Location->CurrentValue;
        $row['Volume1'] = $this->Volume1->CurrentValue;
        $row['Concentration1'] = $this->Concentration1->CurrentValue;
        $row['Total1'] = $this->Total1->CurrentValue;
        $row['ProgressiveMotility1'] = $this->ProgressiveMotility1->CurrentValue;
        $row['NonProgrssiveMotile1'] = $this->NonProgrssiveMotile1->CurrentValue;
        $row['Immotile1'] = $this->Immotile1->CurrentValue;
        $row['TotalProgrssiveMotile1'] = $this->TotalProgrssiveMotile1->CurrentValue;
        $row['TidNo'] = $this->TidNo->CurrentValue;
        $row['Color'] = $this->Color->CurrentValue;
        $row['DoneBy'] = $this->DoneBy->CurrentValue;
        $row['Method'] = $this->Method->CurrentValue;
        $row['Abstinence'] = $this->Abstinence->CurrentValue;
        $row['ProcessedBy'] = $this->ProcessedBy->CurrentValue;
        $row['InseminationTime'] = $this->InseminationTime->CurrentValue;
        $row['InseminationBy'] = $this->InseminationBy->CurrentValue;
        $row['Big'] = $this->Big->CurrentValue;
        $row['Medium'] = $this->Medium->CurrentValue;
        $row['Small'] = $this->Small->CurrentValue;
        $row['NoHalo'] = $this->NoHalo->CurrentValue;
        $row['Fragmented'] = $this->Fragmented->CurrentValue;
        $row['NonFragmented'] = $this->NonFragmented->CurrentValue;
        $row['DFI'] = $this->DFI->CurrentValue;
        $row['IsueBy'] = $this->IsueBy->CurrentValue;
        $row['Volume2'] = $this->Volume2->CurrentValue;
        $row['Concentration2'] = $this->Concentration2->CurrentValue;
        $row['Total2'] = $this->Total2->CurrentValue;
        $row['ProgressiveMotility2'] = $this->ProgressiveMotility2->CurrentValue;
        $row['NonProgrssiveMotile2'] = $this->NonProgrssiveMotile2->CurrentValue;
        $row['Immotile2'] = $this->Immotile2->CurrentValue;
        $row['TotalProgrssiveMotile2'] = $this->TotalProgrssiveMotile2->CurrentValue;
        $row['MACS'] = $this->MACS->CurrentValue;
        $row['IssuedBy'] = $this->IssuedBy->CurrentValue;
        $row['IssuedTo'] = $this->IssuedTo->CurrentValue;
        $row['PaID'] = $this->PaID->CurrentValue;
        $row['PaName'] = $this->PaName->CurrentValue;
        $row['PaMobile'] = $this->PaMobile->CurrentValue;
        $row['PartnerID'] = $this->PartnerID->CurrentValue;
        $row['PartnerName'] = $this->PartnerName->CurrentValue;
        $row['PartnerMobile'] = $this->PartnerMobile->CurrentValue;
        $row['PREG_TEST_DATE'] = $this->PREG_TEST_DATE->CurrentValue;
        $row['SPECIFIC_PROBLEMS'] = $this->SPECIFIC_PROBLEMS->CurrentValue;
        $row['IMSC_1'] = $this->IMSC_1->CurrentValue;
        $row['IMSC_2'] = $this->IMSC_2->CurrentValue;
        $row['LIQUIFACTION_STORAGE'] = $this->LIQUIFACTION_STORAGE->CurrentValue;
        $row['IUI_PREP_METHOD'] = $this->IUI_PREP_METHOD->CurrentValue;
        $row['TIME_FROM_TRIGGER'] = $this->TIME_FROM_TRIGGER->CurrentValue;
        $row['COLLECTION_TO_PREPARATION'] = $this->COLLECTION_TO_PREPARATION->CurrentValue;
        $row['TIME_FROM_PREP_TO_INSEM'] = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
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
        $this->CopyUrl = $this->getCopyUrl();
        $this->DeleteUrl = $this->getDeleteUrl();

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id

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

        // pH

        // Timeofcollection

        // Timeofexamination

        // Volume

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

        // MACS

        // IssuedBy

        // IssuedTo

        // PaID

        // PaName

        // PaMobile

        // PartnerID

        // PartnerName

        // PartnerMobile

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

            // RIDNo
            $this->RIDNo->ViewValue = $this->RIDNo->CurrentValue;
            $this->RIDNo->ViewValue = FormatNumber($this->RIDNo->ViewValue, 0, -2, -2, -2);
            $this->RIDNo->ViewCustomAttributes = "";

            // PatientName
            $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
            $this->PatientName->ViewCustomAttributes = "";

            // HusbandName
            $this->HusbandName->ViewValue = $this->HusbandName->CurrentValue;
            $this->HusbandName->ViewCustomAttributes = "";

            // RequestDr
            $this->RequestDr->ViewValue = $this->RequestDr->CurrentValue;
            $this->RequestDr->ViewCustomAttributes = "";

            // CollectionDate
            $this->CollectionDate->ViewValue = $this->CollectionDate->CurrentValue;
            $this->CollectionDate->ViewValue = FormatDateTime($this->CollectionDate->ViewValue, 0);
            $this->CollectionDate->ViewCustomAttributes = "";

            // ResultDate
            $this->ResultDate->ViewValue = $this->ResultDate->CurrentValue;
            $this->ResultDate->ViewValue = FormatDateTime($this->ResultDate->ViewValue, 0);
            $this->ResultDate->ViewCustomAttributes = "";

            // RequestSample
            if (strval($this->RequestSample->CurrentValue) != "") {
                $this->RequestSample->ViewValue = $this->RequestSample->optionCaption($this->RequestSample->CurrentValue);
            } else {
                $this->RequestSample->ViewValue = null;
            }
            $this->RequestSample->ViewCustomAttributes = "";

            // CollectionType
            if (strval($this->CollectionType->CurrentValue) != "") {
                $this->CollectionType->ViewValue = $this->CollectionType->optionCaption($this->CollectionType->CurrentValue);
            } else {
                $this->CollectionType->ViewValue = null;
            }
            $this->CollectionType->ViewCustomAttributes = "";

            // CollectionMethod
            if (strval($this->CollectionMethod->CurrentValue) != "") {
                $this->CollectionMethod->ViewValue = $this->CollectionMethod->optionCaption($this->CollectionMethod->CurrentValue);
            } else {
                $this->CollectionMethod->ViewValue = null;
            }
            $this->CollectionMethod->ViewCustomAttributes = "";

            // Medicationused
            if (strval($this->Medicationused->CurrentValue) != "") {
                $this->Medicationused->ViewValue = $this->Medicationused->optionCaption($this->Medicationused->CurrentValue);
            } else {
                $this->Medicationused->ViewValue = null;
            }
            $this->Medicationused->ViewCustomAttributes = "";

            // DifficultiesinCollection
            if (strval($this->DifficultiesinCollection->CurrentValue) != "") {
                $this->DifficultiesinCollection->ViewValue = $this->DifficultiesinCollection->optionCaption($this->DifficultiesinCollection->CurrentValue);
            } else {
                $this->DifficultiesinCollection->ViewValue = null;
            }
            $this->DifficultiesinCollection->ViewCustomAttributes = "";

            // pH
            $this->pH->ViewValue = $this->pH->CurrentValue;
            $this->pH->ViewCustomAttributes = "";

            // Timeofcollection
            $this->Timeofcollection->ViewValue = $this->Timeofcollection->CurrentValue;
            $this->Timeofcollection->ViewCustomAttributes = "";

            // Timeofexamination
            $this->Timeofexamination->ViewValue = $this->Timeofexamination->CurrentValue;
            $this->Timeofexamination->ViewCustomAttributes = "";

            // Volume
            $this->Volume->ViewValue = $this->Volume->CurrentValue;
            $this->Volume->ViewCustomAttributes = "";

            // Concentration
            $this->Concentration->ViewValue = $this->Concentration->CurrentValue;
            $this->Concentration->ViewCustomAttributes = "";

            // Total
            $this->Total->ViewValue = $this->Total->CurrentValue;
            $this->Total->ViewCustomAttributes = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->ViewValue = $this->ProgressiveMotility->CurrentValue;
            $this->ProgressiveMotility->ViewCustomAttributes = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->ViewValue = $this->NonProgrssiveMotile->CurrentValue;
            $this->NonProgrssiveMotile->ViewCustomAttributes = "";

            // Immotile
            $this->Immotile->ViewValue = $this->Immotile->CurrentValue;
            $this->Immotile->ViewCustomAttributes = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->ViewValue = $this->TotalProgrssiveMotile->CurrentValue;
            $this->TotalProgrssiveMotile->ViewCustomAttributes = "";

            // Appearance
            $this->Appearance->ViewValue = $this->Appearance->CurrentValue;
            $this->Appearance->ViewCustomAttributes = "";

            // Homogenosity
            if (strval($this->Homogenosity->CurrentValue) != "") {
                $this->Homogenosity->ViewValue = $this->Homogenosity->optionCaption($this->Homogenosity->CurrentValue);
            } else {
                $this->Homogenosity->ViewValue = null;
            }
            $this->Homogenosity->ViewCustomAttributes = "";

            // CompleteSample
            if (strval($this->CompleteSample->CurrentValue) != "") {
                $this->CompleteSample->ViewValue = $this->CompleteSample->optionCaption($this->CompleteSample->CurrentValue);
            } else {
                $this->CompleteSample->ViewValue = null;
            }
            $this->CompleteSample->ViewCustomAttributes = "";

            // Liquefactiontime
            $this->Liquefactiontime->ViewValue = $this->Liquefactiontime->CurrentValue;
            $this->Liquefactiontime->ViewCustomAttributes = "";

            // Normal
            $this->Normal->ViewValue = $this->Normal->CurrentValue;
            $this->Normal->ViewCustomAttributes = "";

            // Abnormal
            $this->Abnormal->ViewValue = $this->Abnormal->CurrentValue;
            $this->Abnormal->ViewCustomAttributes = "";

            // Headdefects
            $this->Headdefects->ViewValue = $this->Headdefects->CurrentValue;
            $this->Headdefects->ViewCustomAttributes = "";

            // MidpieceDefects
            $this->MidpieceDefects->ViewValue = $this->MidpieceDefects->CurrentValue;
            $this->MidpieceDefects->ViewCustomAttributes = "";

            // TailDefects
            $this->TailDefects->ViewValue = $this->TailDefects->CurrentValue;
            $this->TailDefects->ViewCustomAttributes = "";

            // NormalProgMotile
            $this->NormalProgMotile->ViewValue = $this->NormalProgMotile->CurrentValue;
            $this->NormalProgMotile->ViewCustomAttributes = "";

            // ImmatureForms
            $this->ImmatureForms->ViewValue = $this->ImmatureForms->CurrentValue;
            $this->ImmatureForms->ViewCustomAttributes = "";

            // Leucocytes
            $this->Leucocytes->ViewValue = $this->Leucocytes->CurrentValue;
            $this->Leucocytes->ViewCustomAttributes = "";

            // Agglutination
            $this->Agglutination->ViewValue = $this->Agglutination->CurrentValue;
            $this->Agglutination->ViewCustomAttributes = "";

            // Debris
            $this->Debris->ViewValue = $this->Debris->CurrentValue;
            $this->Debris->ViewCustomAttributes = "";

            // Diagnosis
            $this->Diagnosis->ViewValue = $this->Diagnosis->CurrentValue;
            $this->Diagnosis->ViewCustomAttributes = "";

            // Observations
            $this->Observations->ViewValue = $this->Observations->CurrentValue;
            $this->Observations->ViewCustomAttributes = "";

            // Signature
            $this->Signature->ViewValue = $this->Signature->CurrentValue;
            $this->Signature->ViewCustomAttributes = "";

            // SemenOrgin
            if (strval($this->SemenOrgin->CurrentValue) != "") {
                $this->SemenOrgin->ViewValue = $this->SemenOrgin->optionCaption($this->SemenOrgin->CurrentValue);
            } else {
                $this->SemenOrgin->ViewValue = null;
            }
            $this->SemenOrgin->ViewCustomAttributes = "";

            // Donor
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
                if ($this->Donor->ViewValue === null) { // Lookup from database
                    $filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
                    $sqlWrk = $this->Donor->Lookup->getSql(false, $filterWrk, '', $this, true, true);
                    $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                    $ari = count($rswrk);
                    if ($ari > 0) { // Lookup values found
                        $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                        $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                    } else {
                        $this->Donor->ViewValue = $this->Donor->CurrentValue;
                    }
                }
            } else {
                $this->Donor->ViewValue = null;
            }
            $this->Donor->ViewCustomAttributes = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->ViewValue = $this->DonorBloodgroup->CurrentValue;
            $this->DonorBloodgroup->ViewCustomAttributes = "";

            // Tank
            $this->Tank->ViewValue = $this->Tank->CurrentValue;
            $this->Tank->ViewCustomAttributes = "";

            // Location
            $this->Location->ViewValue = $this->Location->CurrentValue;
            $this->Location->ViewCustomAttributes = "";

            // Volume1
            $this->Volume1->ViewValue = $this->Volume1->CurrentValue;
            $this->Volume1->ViewCustomAttributes = "";

            // Concentration1
            $this->Concentration1->ViewValue = $this->Concentration1->CurrentValue;
            $this->Concentration1->ViewCustomAttributes = "";

            // Total1
            $this->Total1->ViewValue = $this->Total1->CurrentValue;
            $this->Total1->ViewCustomAttributes = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->ViewValue = $this->ProgressiveMotility1->CurrentValue;
            $this->ProgressiveMotility1->ViewCustomAttributes = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->ViewValue = $this->NonProgrssiveMotile1->CurrentValue;
            $this->NonProgrssiveMotile1->ViewCustomAttributes = "";

            // Immotile1
            $this->Immotile1->ViewValue = $this->Immotile1->CurrentValue;
            $this->Immotile1->ViewCustomAttributes = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->ViewValue = $this->TotalProgrssiveMotile1->CurrentValue;
            $this->TotalProgrssiveMotile1->ViewCustomAttributes = "";

            // TidNo
            $this->TidNo->ViewValue = $this->TidNo->CurrentValue;
            $this->TidNo->ViewValue = FormatNumber($this->TidNo->ViewValue, 0, -2, -2, -2);
            $this->TidNo->ViewCustomAttributes = "";

            // Color
            $this->Color->ViewValue = $this->Color->CurrentValue;
            $this->Color->ViewCustomAttributes = "";

            // DoneBy
            $this->DoneBy->ViewValue = $this->DoneBy->CurrentValue;
            $this->DoneBy->ViewCustomAttributes = "";

            // Method
            $this->Method->ViewValue = $this->Method->CurrentValue;
            $this->Method->ViewCustomAttributes = "";

            // Abstinence
            $this->Abstinence->ViewValue = $this->Abstinence->CurrentValue;
            $this->Abstinence->ViewCustomAttributes = "";

            // ProcessedBy
            $this->ProcessedBy->ViewValue = $this->ProcessedBy->CurrentValue;
            $this->ProcessedBy->ViewCustomAttributes = "";

            // InseminationTime
            $this->InseminationTime->ViewValue = $this->InseminationTime->CurrentValue;
            $this->InseminationTime->ViewCustomAttributes = "";

            // InseminationBy
            $this->InseminationBy->ViewValue = $this->InseminationBy->CurrentValue;
            $this->InseminationBy->ViewCustomAttributes = "";

            // Big
            $this->Big->ViewValue = $this->Big->CurrentValue;
            $this->Big->ViewCustomAttributes = "";

            // Medium
            $this->Medium->ViewValue = $this->Medium->CurrentValue;
            $this->Medium->ViewCustomAttributes = "";

            // Small
            $this->Small->ViewValue = $this->Small->CurrentValue;
            $this->Small->ViewCustomAttributes = "";

            // NoHalo
            $this->NoHalo->ViewValue = $this->NoHalo->CurrentValue;
            $this->NoHalo->ViewCustomAttributes = "";

            // Fragmented
            $this->Fragmented->ViewValue = $this->Fragmented->CurrentValue;
            $this->Fragmented->ViewCustomAttributes = "";

            // NonFragmented
            $this->NonFragmented->ViewValue = $this->NonFragmented->CurrentValue;
            $this->NonFragmented->ViewCustomAttributes = "";

            // DFI
            $this->DFI->ViewValue = $this->DFI->CurrentValue;
            $this->DFI->ViewCustomAttributes = "";

            // IsueBy
            $this->IsueBy->ViewValue = $this->IsueBy->CurrentValue;
            $this->IsueBy->ViewCustomAttributes = "";

            // Volume2
            $this->Volume2->ViewValue = $this->Volume2->CurrentValue;
            $this->Volume2->ViewCustomAttributes = "";

            // Concentration2
            $this->Concentration2->ViewValue = $this->Concentration2->CurrentValue;
            $this->Concentration2->ViewCustomAttributes = "";

            // Total2
            $this->Total2->ViewValue = $this->Total2->CurrentValue;
            $this->Total2->ViewCustomAttributes = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->ViewValue = $this->ProgressiveMotility2->CurrentValue;
            $this->ProgressiveMotility2->ViewCustomAttributes = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->ViewValue = $this->NonProgrssiveMotile2->CurrentValue;
            $this->NonProgrssiveMotile2->ViewCustomAttributes = "";

            // Immotile2
            $this->Immotile2->ViewValue = $this->Immotile2->CurrentValue;
            $this->Immotile2->ViewCustomAttributes = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->ViewValue = $this->TotalProgrssiveMotile2->CurrentValue;
            $this->TotalProgrssiveMotile2->ViewCustomAttributes = "";

            // IssuedBy
            $this->IssuedBy->ViewValue = $this->IssuedBy->CurrentValue;
            $this->IssuedBy->ViewCustomAttributes = "";

            // IssuedTo
            $this->IssuedTo->ViewValue = $this->IssuedTo->CurrentValue;
            $this->IssuedTo->ViewCustomAttributes = "";

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

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->ViewValue = $this->PREG_TEST_DATE->CurrentValue;
            $this->PREG_TEST_DATE->ViewValue = FormatDateTime($this->PREG_TEST_DATE->ViewValue, 0);
            $this->PREG_TEST_DATE->ViewCustomAttributes = "";

            // SPECIFIC_PROBLEMS
            if (strval($this->SPECIFIC_PROBLEMS->CurrentValue) != "") {
                $this->SPECIFIC_PROBLEMS->ViewValue = $this->SPECIFIC_PROBLEMS->optionCaption($this->SPECIFIC_PROBLEMS->CurrentValue);
            } else {
                $this->SPECIFIC_PROBLEMS->ViewValue = null;
            }
            $this->SPECIFIC_PROBLEMS->ViewCustomAttributes = "";

            // IMSC_1
            $this->IMSC_1->ViewValue = $this->IMSC_1->CurrentValue;
            $this->IMSC_1->ViewCustomAttributes = "";

            // IMSC_2
            $this->IMSC_2->ViewValue = $this->IMSC_2->CurrentValue;
            $this->IMSC_2->ViewCustomAttributes = "";

            // LIQUIFACTION_STORAGE
            if (strval($this->LIQUIFACTION_STORAGE->CurrentValue) != "") {
                $this->LIQUIFACTION_STORAGE->ViewValue = $this->LIQUIFACTION_STORAGE->optionCaption($this->LIQUIFACTION_STORAGE->CurrentValue);
            } else {
                $this->LIQUIFACTION_STORAGE->ViewValue = null;
            }
            $this->LIQUIFACTION_STORAGE->ViewCustomAttributes = "";

            // IUI_PREP_METHOD
            if (strval($this->IUI_PREP_METHOD->CurrentValue) != "") {
                $this->IUI_PREP_METHOD->ViewValue = $this->IUI_PREP_METHOD->optionCaption($this->IUI_PREP_METHOD->CurrentValue);
            } else {
                $this->IUI_PREP_METHOD->ViewValue = null;
            }
            $this->IUI_PREP_METHOD->ViewCustomAttributes = "";

            // TIME_FROM_TRIGGER
            if (strval($this->TIME_FROM_TRIGGER->CurrentValue) != "") {
                $this->TIME_FROM_TRIGGER->ViewValue = $this->TIME_FROM_TRIGGER->optionCaption($this->TIME_FROM_TRIGGER->CurrentValue);
            } else {
                $this->TIME_FROM_TRIGGER->ViewValue = null;
            }
            $this->TIME_FROM_TRIGGER->ViewCustomAttributes = "";

            // COLLECTION_TO_PREPARATION
            if (strval($this->COLLECTION_TO_PREPARATION->CurrentValue) != "") {
                $this->COLLECTION_TO_PREPARATION->ViewValue = $this->COLLECTION_TO_PREPARATION->optionCaption($this->COLLECTION_TO_PREPARATION->CurrentValue);
            } else {
                $this->COLLECTION_TO_PREPARATION->ViewValue = null;
            }
            $this->COLLECTION_TO_PREPARATION->ViewCustomAttributes = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->ViewValue = $this->TIME_FROM_PREP_TO_INSEM->CurrentValue;
            $this->TIME_FROM_PREP_TO_INSEM->ViewCustomAttributes = "";

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";
            $this->id->TooltipValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";
            $this->RIDNo->TooltipValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";
            $this->PatientName->TooltipValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";
            $this->HusbandName->TooltipValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";
            $this->RequestDr->TooltipValue = "";

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

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";
            $this->CollectionType->TooltipValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";
            $this->CollectionMethod->TooltipValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";
            $this->Medicationused->TooltipValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";
            $this->DifficultiesinCollection->TooltipValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";
            $this->pH->TooltipValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";
            $this->Timeofcollection->TooltipValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";
            $this->Timeofexamination->TooltipValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";
            $this->Volume->TooltipValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";
            $this->Concentration->TooltipValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";
            $this->Total->TooltipValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";
            $this->ProgressiveMotility->TooltipValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";
            $this->NonProgrssiveMotile->TooltipValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";
            $this->Immotile->TooltipValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";
            $this->TotalProgrssiveMotile->TooltipValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";
            $this->Appearance->TooltipValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";
            $this->Homogenosity->TooltipValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";
            $this->CompleteSample->TooltipValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";
            $this->Liquefactiontime->TooltipValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";
            $this->Normal->TooltipValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";
            $this->Abnormal->TooltipValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";
            $this->Headdefects->TooltipValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";
            $this->MidpieceDefects->TooltipValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";
            $this->TailDefects->TooltipValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";
            $this->NormalProgMotile->TooltipValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";
            $this->ImmatureForms->TooltipValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";
            $this->Leucocytes->TooltipValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";
            $this->Agglutination->TooltipValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";
            $this->Debris->TooltipValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";
            $this->Diagnosis->TooltipValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";
            $this->Observations->TooltipValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";
            $this->Signature->TooltipValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";
            $this->SemenOrgin->TooltipValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";
            $this->Donor->TooltipValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";
            $this->DonorBloodgroup->TooltipValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";
            $this->Tank->TooltipValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";
            $this->Location->TooltipValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";
            $this->Volume1->TooltipValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";
            $this->Concentration1->TooltipValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";
            $this->Total1->TooltipValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";
            $this->ProgressiveMotility1->TooltipValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";
            $this->NonProgrssiveMotile1->TooltipValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";
            $this->Immotile1->TooltipValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";
            $this->TotalProgrssiveMotile1->TooltipValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";
            $this->TidNo->TooltipValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";
            $this->Color->TooltipValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";
            $this->DoneBy->TooltipValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";
            $this->Method->TooltipValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";
            $this->Abstinence->TooltipValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";
            $this->ProcessedBy->TooltipValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";
            $this->InseminationTime->TooltipValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";
            $this->InseminationBy->TooltipValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";
            $this->Big->TooltipValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";
            $this->Medium->TooltipValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";
            $this->Small->TooltipValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";
            $this->NoHalo->TooltipValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";
            $this->Fragmented->TooltipValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";
            $this->NonFragmented->TooltipValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";
            $this->DFI->TooltipValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";
            $this->IsueBy->TooltipValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";
            $this->Volume2->TooltipValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";
            $this->Concentration2->TooltipValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";
            $this->Total2->TooltipValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";
            $this->ProgressiveMotility2->TooltipValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";
            $this->NonProgrssiveMotile2->TooltipValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";
            $this->Immotile2->TooltipValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";
            $this->TotalProgrssiveMotile2->TooltipValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";
            $this->IssuedBy->TooltipValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";
            $this->IssuedTo->TooltipValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";
            $this->PaID->TooltipValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";
            $this->PaName->TooltipValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";
            $this->PaMobile->TooltipValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";
            $this->PartnerID->TooltipValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";
            $this->PartnerName->TooltipValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";
            $this->PartnerMobile->TooltipValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";
            $this->PREG_TEST_DATE->TooltipValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";
            $this->SPECIFIC_PROBLEMS->TooltipValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";
            $this->IMSC_1->TooltipValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";
            $this->IMSC_2->TooltipValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";
            $this->LIQUIFACTION_STORAGE->TooltipValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";
            $this->IUI_PREP_METHOD->TooltipValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";
            $this->TIME_FROM_TRIGGER->TooltipValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";
            $this->COLLECTION_TO_PREPARATION->TooltipValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
            $this->TIME_FROM_PREP_TO_INSEM->TooltipValue = "";
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

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if ($this->PatientName->getSessionValue() != "") {
                $this->PatientName->CurrentValue = GetForeignKeyValue($this->PatientName->getSessionValue());
                $this->PatientName->OldValue = $this->PatientName->CurrentValue;
                $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                $this->PatientName->ViewCustomAttributes = "";
            } else {
                if (!$this->PatientName->Raw) {
                    $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
                }
                $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
                $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());
            }

            // HusbandName
            $this->HusbandName->EditAttrs["class"] = "form-control";
            $this->HusbandName->EditCustomAttributes = "";
            if (!$this->HusbandName->Raw) {
                $this->HusbandName->CurrentValue = HtmlDecode($this->HusbandName->CurrentValue);
            }
            $this->HusbandName->EditValue = HtmlEncode($this->HusbandName->CurrentValue);
            $this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

            // RequestDr
            $this->RequestDr->EditAttrs["class"] = "form-control";
            $this->RequestDr->EditCustomAttributes = "";
            if (!$this->RequestDr->Raw) {
                $this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
            }
            $this->RequestDr->EditValue = HtmlEncode($this->RequestDr->CurrentValue);
            $this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

            // CollectionDate
            $this->CollectionDate->EditAttrs["class"] = "form-control";
            $this->CollectionDate->EditCustomAttributes = "";
            $this->CollectionDate->EditValue = HtmlEncode(FormatDateTime($this->CollectionDate->CurrentValue, 8));
            $this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // RequestSample
            $this->RequestSample->EditAttrs["class"] = "form-control";
            $this->RequestSample->EditCustomAttributes = "";
            $this->RequestSample->EditValue = $this->RequestSample->options(true);
            $this->RequestSample->PlaceHolder = RemoveHtml($this->RequestSample->caption());

            // CollectionType
            $this->CollectionType->EditAttrs["class"] = "form-control";
            $this->CollectionType->EditCustomAttributes = "";
            $this->CollectionType->EditValue = $this->CollectionType->options(true);
            $this->CollectionType->PlaceHolder = RemoveHtml($this->CollectionType->caption());

            // CollectionMethod
            $this->CollectionMethod->EditAttrs["class"] = "form-control";
            $this->CollectionMethod->EditCustomAttributes = "";
            $this->CollectionMethod->EditValue = $this->CollectionMethod->options(true);
            $this->CollectionMethod->PlaceHolder = RemoveHtml($this->CollectionMethod->caption());

            // Medicationused
            $this->Medicationused->EditAttrs["class"] = "form-control";
            $this->Medicationused->EditCustomAttributes = "";
            $this->Medicationused->EditValue = $this->Medicationused->options(true);
            $this->Medicationused->PlaceHolder = RemoveHtml($this->Medicationused->caption());

            // DifficultiesinCollection
            $this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
            $this->DifficultiesinCollection->EditCustomAttributes = "";
            $this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(true);
            $this->DifficultiesinCollection->PlaceHolder = RemoveHtml($this->DifficultiesinCollection->caption());

            // pH
            $this->pH->EditAttrs["class"] = "form-control";
            $this->pH->EditCustomAttributes = "";
            if (!$this->pH->Raw) {
                $this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
            }
            $this->pH->EditValue = HtmlEncode($this->pH->CurrentValue);
            $this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

            // Timeofcollection
            $this->Timeofcollection->EditAttrs["class"] = "form-control";
            $this->Timeofcollection->EditCustomAttributes = "";
            if (!$this->Timeofcollection->Raw) {
                $this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
            }
            $this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->CurrentValue);
            $this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

            // Timeofexamination
            $this->Timeofexamination->EditAttrs["class"] = "form-control";
            $this->Timeofexamination->EditCustomAttributes = "";
            if (!$this->Timeofexamination->Raw) {
                $this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
            }
            $this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->CurrentValue);
            $this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            if (!$this->Volume->Raw) {
                $this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
            }
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

            // Concentration
            $this->Concentration->EditAttrs["class"] = "form-control";
            $this->Concentration->EditCustomAttributes = "";
            if (!$this->Concentration->Raw) {
                $this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
            }
            $this->Concentration->EditValue = HtmlEncode($this->Concentration->CurrentValue);
            $this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

            // Total
            $this->Total->EditAttrs["class"] = "form-control";
            $this->Total->EditCustomAttributes = "";
            if (!$this->Total->Raw) {
                $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
            }
            $this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
            $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

            // ProgressiveMotility
            $this->ProgressiveMotility->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility->Raw) {
                $this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
            }
            $this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->CurrentValue);
            $this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile->Raw) {
                $this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
            }
            $this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->CurrentValue);
            $this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

            // Immotile
            $this->Immotile->EditAttrs["class"] = "form-control";
            $this->Immotile->EditCustomAttributes = "";
            if (!$this->Immotile->Raw) {
                $this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
            }
            $this->Immotile->EditValue = HtmlEncode($this->Immotile->CurrentValue);
            $this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile->Raw) {
                $this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
            }
            $this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->CurrentValue);
            $this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

            // Appearance
            $this->Appearance->EditAttrs["class"] = "form-control";
            $this->Appearance->EditCustomAttributes = "";
            if (!$this->Appearance->Raw) {
                $this->Appearance->CurrentValue = HtmlDecode($this->Appearance->CurrentValue);
            }
            $this->Appearance->EditValue = HtmlEncode($this->Appearance->CurrentValue);
            $this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

            // Homogenosity
            $this->Homogenosity->EditAttrs["class"] = "form-control";
            $this->Homogenosity->EditCustomAttributes = "";
            $this->Homogenosity->EditValue = $this->Homogenosity->options(true);
            $this->Homogenosity->PlaceHolder = RemoveHtml($this->Homogenosity->caption());

            // CompleteSample
            $this->CompleteSample->EditAttrs["class"] = "form-control";
            $this->CompleteSample->EditCustomAttributes = "";
            $this->CompleteSample->EditValue = $this->CompleteSample->options(true);
            $this->CompleteSample->PlaceHolder = RemoveHtml($this->CompleteSample->caption());

            // Liquefactiontime
            $this->Liquefactiontime->EditAttrs["class"] = "form-control";
            $this->Liquefactiontime->EditCustomAttributes = "";
            if (!$this->Liquefactiontime->Raw) {
                $this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
            }
            $this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->CurrentValue);
            $this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

            // Normal
            $this->Normal->EditAttrs["class"] = "form-control";
            $this->Normal->EditCustomAttributes = "";
            if (!$this->Normal->Raw) {
                $this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
            }
            $this->Normal->EditValue = HtmlEncode($this->Normal->CurrentValue);
            $this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // Headdefects
            $this->Headdefects->EditAttrs["class"] = "form-control";
            $this->Headdefects->EditCustomAttributes = "";
            if (!$this->Headdefects->Raw) {
                $this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
            }
            $this->Headdefects->EditValue = HtmlEncode($this->Headdefects->CurrentValue);
            $this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

            // MidpieceDefects
            $this->MidpieceDefects->EditAttrs["class"] = "form-control";
            $this->MidpieceDefects->EditCustomAttributes = "";
            if (!$this->MidpieceDefects->Raw) {
                $this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
            }
            $this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->CurrentValue);
            $this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

            // TailDefects
            $this->TailDefects->EditAttrs["class"] = "form-control";
            $this->TailDefects->EditCustomAttributes = "";
            if (!$this->TailDefects->Raw) {
                $this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
            }
            $this->TailDefects->EditValue = HtmlEncode($this->TailDefects->CurrentValue);
            $this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

            // NormalProgMotile
            $this->NormalProgMotile->EditAttrs["class"] = "form-control";
            $this->NormalProgMotile->EditCustomAttributes = "";
            if (!$this->NormalProgMotile->Raw) {
                $this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
            }
            $this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->CurrentValue);
            $this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

            // ImmatureForms
            $this->ImmatureForms->EditAttrs["class"] = "form-control";
            $this->ImmatureForms->EditCustomAttributes = "";
            if (!$this->ImmatureForms->Raw) {
                $this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
            }
            $this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->CurrentValue);
            $this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

            // Leucocytes
            $this->Leucocytes->EditAttrs["class"] = "form-control";
            $this->Leucocytes->EditCustomAttributes = "";
            if (!$this->Leucocytes->Raw) {
                $this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
            }
            $this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->CurrentValue);
            $this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

            // Agglutination
            $this->Agglutination->EditAttrs["class"] = "form-control";
            $this->Agglutination->EditCustomAttributes = "";
            if (!$this->Agglutination->Raw) {
                $this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
            }
            $this->Agglutination->EditValue = HtmlEncode($this->Agglutination->CurrentValue);
            $this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

            // Debris
            $this->Debris->EditAttrs["class"] = "form-control";
            $this->Debris->EditCustomAttributes = "";
            if (!$this->Debris->Raw) {
                $this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
            }
            $this->Debris->EditValue = HtmlEncode($this->Debris->CurrentValue);
            $this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

            // Diagnosis
            $this->Diagnosis->EditAttrs["class"] = "form-control";
            $this->Diagnosis->EditCustomAttributes = "";
            $this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->CurrentValue);
            $this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

            // Observations
            $this->Observations->EditAttrs["class"] = "form-control";
            $this->Observations->EditCustomAttributes = "";
            $this->Observations->EditValue = HtmlEncode($this->Observations->CurrentValue);
            $this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

            // Signature
            $this->Signature->EditAttrs["class"] = "form-control";
            $this->Signature->EditCustomAttributes = "";
            if (!$this->Signature->Raw) {
                $this->Signature->CurrentValue = HtmlDecode($this->Signature->CurrentValue);
            }
            $this->Signature->EditValue = HtmlEncode($this->Signature->CurrentValue);
            $this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

            // SemenOrgin
            $this->SemenOrgin->EditAttrs["class"] = "form-control";
            $this->SemenOrgin->EditCustomAttributes = "";
            $this->SemenOrgin->EditValue = $this->SemenOrgin->options(true);
            $this->SemenOrgin->PlaceHolder = RemoveHtml($this->SemenOrgin->caption());

            // Donor
            $this->Donor->EditCustomAttributes = "";
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
            } else {
                $this->Donor->ViewValue = $this->Donor->Lookup !== null && is_array($this->Donor->Lookup->Options) ? $curVal : null;
            }
            if ($this->Donor->ViewValue !== null) { // Load from cache
                $this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
                if ($this->Donor->ViewValue == "") {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Donor->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Donor->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                    $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                } else {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Donor->EditValue = $arwrk;
            }
            $this->Donor->PlaceHolder = RemoveHtml($this->Donor->caption());

            // DonorBloodgroup
            $this->DonorBloodgroup->EditAttrs["class"] = "form-control";
            $this->DonorBloodgroup->EditCustomAttributes = "";
            if (!$this->DonorBloodgroup->Raw) {
                $this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
            }
            $this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->CurrentValue);
            $this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Location
            $this->Location->EditAttrs["class"] = "form-control";
            $this->Location->EditCustomAttributes = "";
            if (!$this->Location->Raw) {
                $this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
            }
            $this->Location->EditValue = HtmlEncode($this->Location->CurrentValue);
            $this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

            // Volume1
            $this->Volume1->EditAttrs["class"] = "form-control";
            $this->Volume1->EditCustomAttributes = "";
            if (!$this->Volume1->Raw) {
                $this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
            }
            $this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
            $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

            // Concentration1
            $this->Concentration1->EditAttrs["class"] = "form-control";
            $this->Concentration1->EditCustomAttributes = "";
            if (!$this->Concentration1->Raw) {
                $this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
            }
            $this->Concentration1->EditValue = HtmlEncode($this->Concentration1->CurrentValue);
            $this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

            // Total1
            $this->Total1->EditAttrs["class"] = "form-control";
            $this->Total1->EditCustomAttributes = "";
            if (!$this->Total1->Raw) {
                $this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
            }
            $this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
            $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

            // ProgressiveMotility1
            $this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility1->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility1->Raw) {
                $this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
            }
            $this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->CurrentValue);
            $this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile1->Raw) {
                $this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
            }
            $this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->CurrentValue);
            $this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

            // Immotile1
            $this->Immotile1->EditAttrs["class"] = "form-control";
            $this->Immotile1->EditCustomAttributes = "";
            if (!$this->Immotile1->Raw) {
                $this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
            }
            $this->Immotile1->EditValue = HtmlEncode($this->Immotile1->CurrentValue);
            $this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile1->Raw) {
                $this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
            }
            $this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->CurrentValue);
            $this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

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

            // Color
            $this->Color->EditAttrs["class"] = "form-control";
            $this->Color->EditCustomAttributes = "";
            if (!$this->Color->Raw) {
                $this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
            }
            $this->Color->EditValue = HtmlEncode($this->Color->CurrentValue);
            $this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

            // DoneBy
            $this->DoneBy->EditAttrs["class"] = "form-control";
            $this->DoneBy->EditCustomAttributes = "";
            if (!$this->DoneBy->Raw) {
                $this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
            }
            $this->DoneBy->EditValue = HtmlEncode($this->DoneBy->CurrentValue);
            $this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Abstinence
            $this->Abstinence->EditAttrs["class"] = "form-control";
            $this->Abstinence->EditCustomAttributes = "";
            if (!$this->Abstinence->Raw) {
                $this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
            }
            $this->Abstinence->EditValue = HtmlEncode($this->Abstinence->CurrentValue);
            $this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

            // ProcessedBy
            $this->ProcessedBy->EditAttrs["class"] = "form-control";
            $this->ProcessedBy->EditCustomAttributes = "";
            if (!$this->ProcessedBy->Raw) {
                $this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
            }
            $this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->CurrentValue);
            $this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

            // InseminationTime
            $this->InseminationTime->EditAttrs["class"] = "form-control";
            $this->InseminationTime->EditCustomAttributes = "";
            if (!$this->InseminationTime->Raw) {
                $this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
            }
            $this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->CurrentValue);
            $this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

            // InseminationBy
            $this->InseminationBy->EditAttrs["class"] = "form-control";
            $this->InseminationBy->EditCustomAttributes = "";
            if (!$this->InseminationBy->Raw) {
                $this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
            }
            $this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->CurrentValue);
            $this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

            // Big
            $this->Big->EditAttrs["class"] = "form-control";
            $this->Big->EditCustomAttributes = "";
            if (!$this->Big->Raw) {
                $this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
            }
            $this->Big->EditValue = HtmlEncode($this->Big->CurrentValue);
            $this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

            // Medium
            $this->Medium->EditAttrs["class"] = "form-control";
            $this->Medium->EditCustomAttributes = "";
            if (!$this->Medium->Raw) {
                $this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
            }
            $this->Medium->EditValue = HtmlEncode($this->Medium->CurrentValue);
            $this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

            // Small
            $this->Small->EditAttrs["class"] = "form-control";
            $this->Small->EditCustomAttributes = "";
            if (!$this->Small->Raw) {
                $this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
            }
            $this->Small->EditValue = HtmlEncode($this->Small->CurrentValue);
            $this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

            // NoHalo
            $this->NoHalo->EditAttrs["class"] = "form-control";
            $this->NoHalo->EditCustomAttributes = "";
            if (!$this->NoHalo->Raw) {
                $this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
            }
            $this->NoHalo->EditValue = HtmlEncode($this->NoHalo->CurrentValue);
            $this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

            // Fragmented
            $this->Fragmented->EditAttrs["class"] = "form-control";
            $this->Fragmented->EditCustomAttributes = "";
            if (!$this->Fragmented->Raw) {
                $this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
            }
            $this->Fragmented->EditValue = HtmlEncode($this->Fragmented->CurrentValue);
            $this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

            // NonFragmented
            $this->NonFragmented->EditAttrs["class"] = "form-control";
            $this->NonFragmented->EditCustomAttributes = "";
            if (!$this->NonFragmented->Raw) {
                $this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
            }
            $this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->CurrentValue);
            $this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

            // DFI
            $this->DFI->EditAttrs["class"] = "form-control";
            $this->DFI->EditCustomAttributes = "";
            if (!$this->DFI->Raw) {
                $this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
            }
            $this->DFI->EditValue = HtmlEncode($this->DFI->CurrentValue);
            $this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

            // IsueBy
            $this->IsueBy->EditAttrs["class"] = "form-control";
            $this->IsueBy->EditCustomAttributes = "";
            if (!$this->IsueBy->Raw) {
                $this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
            }
            $this->IsueBy->EditValue = HtmlEncode($this->IsueBy->CurrentValue);
            $this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

            // Volume2
            $this->Volume2->EditAttrs["class"] = "form-control";
            $this->Volume2->EditCustomAttributes = "";
            if (!$this->Volume2->Raw) {
                $this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
            }
            $this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
            $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

            // Concentration2
            $this->Concentration2->EditAttrs["class"] = "form-control";
            $this->Concentration2->EditCustomAttributes = "";
            if (!$this->Concentration2->Raw) {
                $this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
            }
            $this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
            $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

            // Total2
            $this->Total2->EditAttrs["class"] = "form-control";
            $this->Total2->EditCustomAttributes = "";
            if (!$this->Total2->Raw) {
                $this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
            }
            $this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
            $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

            // ProgressiveMotility2
            $this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility2->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility2->Raw) {
                $this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
            }
            $this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->CurrentValue);
            $this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile2->Raw) {
                $this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
            }
            $this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->CurrentValue);
            $this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

            // Immotile2
            $this->Immotile2->EditAttrs["class"] = "form-control";
            $this->Immotile2->EditCustomAttributes = "";
            if (!$this->Immotile2->Raw) {
                $this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
            }
            $this->Immotile2->EditValue = HtmlEncode($this->Immotile2->CurrentValue);
            $this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile2->Raw) {
                $this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
            }
            $this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->CurrentValue);
            $this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

            // IssuedBy
            $this->IssuedBy->EditAttrs["class"] = "form-control";
            $this->IssuedBy->EditCustomAttributes = "";
            if (!$this->IssuedBy->Raw) {
                $this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
            }
            $this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->CurrentValue);
            $this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

            // IssuedTo
            $this->IssuedTo->EditAttrs["class"] = "form-control";
            $this->IssuedTo->EditCustomAttributes = "";
            if (!$this->IssuedTo->Raw) {
                $this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
            }
            $this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->CurrentValue);
            $this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

            // PaID
            $this->PaID->EditAttrs["class"] = "form-control";
            $this->PaID->EditCustomAttributes = "";
            if (!$this->PaID->Raw) {
                $this->PaID->CurrentValue = HtmlDecode($this->PaID->CurrentValue);
            }
            $this->PaID->EditValue = HtmlEncode($this->PaID->CurrentValue);
            $this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

            // PaName
            $this->PaName->EditAttrs["class"] = "form-control";
            $this->PaName->EditCustomAttributes = "";
            if (!$this->PaName->Raw) {
                $this->PaName->CurrentValue = HtmlDecode($this->PaName->CurrentValue);
            }
            $this->PaName->EditValue = HtmlEncode($this->PaName->CurrentValue);
            $this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

            // PaMobile
            $this->PaMobile->EditAttrs["class"] = "form-control";
            $this->PaMobile->EditCustomAttributes = "";
            if (!$this->PaMobile->Raw) {
                $this->PaMobile->CurrentValue = HtmlDecode($this->PaMobile->CurrentValue);
            }
            $this->PaMobile->EditValue = HtmlEncode($this->PaMobile->CurrentValue);
            $this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(true);
            $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

            // IMSC_1
            $this->IMSC_1->EditAttrs["class"] = "form-control";
            $this->IMSC_1->EditCustomAttributes = "";
            if (!$this->IMSC_1->Raw) {
                $this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
            }
            $this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->CurrentValue);
            $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

            // IMSC_2
            $this->IMSC_2->EditAttrs["class"] = "form-control";
            $this->IMSC_2->EditCustomAttributes = "";
            if (!$this->IMSC_2->Raw) {
                $this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
            }
            $this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->CurrentValue);
            $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
            $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(true);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            $this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(true);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(true);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(true);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
                $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            }
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

            // Add refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
        } elseif ($this->RowType == ROWTYPE_EDIT) {
            // id
            $this->id->EditAttrs["class"] = "form-control";
            $this->id->EditCustomAttributes = "";
            $this->id->EditValue = $this->id->CurrentValue;
            $this->id->ViewCustomAttributes = "";

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

            // PatientName
            $this->PatientName->EditAttrs["class"] = "form-control";
            $this->PatientName->EditCustomAttributes = "";
            if ($this->PatientName->getSessionValue() != "") {
                $this->PatientName->CurrentValue = GetForeignKeyValue($this->PatientName->getSessionValue());
                $this->PatientName->OldValue = $this->PatientName->CurrentValue;
                $this->PatientName->ViewValue = $this->PatientName->CurrentValue;
                $this->PatientName->ViewCustomAttributes = "";
            } else {
                if (!$this->PatientName->Raw) {
                    $this->PatientName->CurrentValue = HtmlDecode($this->PatientName->CurrentValue);
                }
                $this->PatientName->EditValue = HtmlEncode($this->PatientName->CurrentValue);
                $this->PatientName->PlaceHolder = RemoveHtml($this->PatientName->caption());
            }

            // HusbandName
            $this->HusbandName->EditAttrs["class"] = "form-control";
            $this->HusbandName->EditCustomAttributes = "";
            if (!$this->HusbandName->Raw) {
                $this->HusbandName->CurrentValue = HtmlDecode($this->HusbandName->CurrentValue);
            }
            $this->HusbandName->EditValue = HtmlEncode($this->HusbandName->CurrentValue);
            $this->HusbandName->PlaceHolder = RemoveHtml($this->HusbandName->caption());

            // RequestDr
            $this->RequestDr->EditAttrs["class"] = "form-control";
            $this->RequestDr->EditCustomAttributes = "";
            if (!$this->RequestDr->Raw) {
                $this->RequestDr->CurrentValue = HtmlDecode($this->RequestDr->CurrentValue);
            }
            $this->RequestDr->EditValue = HtmlEncode($this->RequestDr->CurrentValue);
            $this->RequestDr->PlaceHolder = RemoveHtml($this->RequestDr->caption());

            // CollectionDate
            $this->CollectionDate->EditAttrs["class"] = "form-control";
            $this->CollectionDate->EditCustomAttributes = "";
            $this->CollectionDate->EditValue = HtmlEncode(FormatDateTime($this->CollectionDate->CurrentValue, 8));
            $this->CollectionDate->PlaceHolder = RemoveHtml($this->CollectionDate->caption());

            // ResultDate
            $this->ResultDate->EditAttrs["class"] = "form-control";
            $this->ResultDate->EditCustomAttributes = "";
            $this->ResultDate->EditValue = HtmlEncode(FormatDateTime($this->ResultDate->CurrentValue, 8));
            $this->ResultDate->PlaceHolder = RemoveHtml($this->ResultDate->caption());

            // RequestSample
            $this->RequestSample->EditAttrs["class"] = "form-control";
            $this->RequestSample->EditCustomAttributes = "";
            $this->RequestSample->EditValue = $this->RequestSample->options(true);
            $this->RequestSample->PlaceHolder = RemoveHtml($this->RequestSample->caption());

            // CollectionType
            $this->CollectionType->EditAttrs["class"] = "form-control";
            $this->CollectionType->EditCustomAttributes = "";
            $this->CollectionType->EditValue = $this->CollectionType->options(true);
            $this->CollectionType->PlaceHolder = RemoveHtml($this->CollectionType->caption());

            // CollectionMethod
            $this->CollectionMethod->EditAttrs["class"] = "form-control";
            $this->CollectionMethod->EditCustomAttributes = "";
            $this->CollectionMethod->EditValue = $this->CollectionMethod->options(true);
            $this->CollectionMethod->PlaceHolder = RemoveHtml($this->CollectionMethod->caption());

            // Medicationused
            $this->Medicationused->EditAttrs["class"] = "form-control";
            $this->Medicationused->EditCustomAttributes = "";
            $this->Medicationused->EditValue = $this->Medicationused->options(true);
            $this->Medicationused->PlaceHolder = RemoveHtml($this->Medicationused->caption());

            // DifficultiesinCollection
            $this->DifficultiesinCollection->EditAttrs["class"] = "form-control";
            $this->DifficultiesinCollection->EditCustomAttributes = "";
            $this->DifficultiesinCollection->EditValue = $this->DifficultiesinCollection->options(true);
            $this->DifficultiesinCollection->PlaceHolder = RemoveHtml($this->DifficultiesinCollection->caption());

            // pH
            $this->pH->EditAttrs["class"] = "form-control";
            $this->pH->EditCustomAttributes = "";
            if (!$this->pH->Raw) {
                $this->pH->CurrentValue = HtmlDecode($this->pH->CurrentValue);
            }
            $this->pH->EditValue = HtmlEncode($this->pH->CurrentValue);
            $this->pH->PlaceHolder = RemoveHtml($this->pH->caption());

            // Timeofcollection
            $this->Timeofcollection->EditAttrs["class"] = "form-control";
            $this->Timeofcollection->EditCustomAttributes = "";
            if (!$this->Timeofcollection->Raw) {
                $this->Timeofcollection->CurrentValue = HtmlDecode($this->Timeofcollection->CurrentValue);
            }
            $this->Timeofcollection->EditValue = HtmlEncode($this->Timeofcollection->CurrentValue);
            $this->Timeofcollection->PlaceHolder = RemoveHtml($this->Timeofcollection->caption());

            // Timeofexamination
            $this->Timeofexamination->EditAttrs["class"] = "form-control";
            $this->Timeofexamination->EditCustomAttributes = "";
            if (!$this->Timeofexamination->Raw) {
                $this->Timeofexamination->CurrentValue = HtmlDecode($this->Timeofexamination->CurrentValue);
            }
            $this->Timeofexamination->EditValue = HtmlEncode($this->Timeofexamination->CurrentValue);
            $this->Timeofexamination->PlaceHolder = RemoveHtml($this->Timeofexamination->caption());

            // Volume
            $this->Volume->EditAttrs["class"] = "form-control";
            $this->Volume->EditCustomAttributes = "";
            if (!$this->Volume->Raw) {
                $this->Volume->CurrentValue = HtmlDecode($this->Volume->CurrentValue);
            }
            $this->Volume->EditValue = HtmlEncode($this->Volume->CurrentValue);
            $this->Volume->PlaceHolder = RemoveHtml($this->Volume->caption());

            // Concentration
            $this->Concentration->EditAttrs["class"] = "form-control";
            $this->Concentration->EditCustomAttributes = "";
            if (!$this->Concentration->Raw) {
                $this->Concentration->CurrentValue = HtmlDecode($this->Concentration->CurrentValue);
            }
            $this->Concentration->EditValue = HtmlEncode($this->Concentration->CurrentValue);
            $this->Concentration->PlaceHolder = RemoveHtml($this->Concentration->caption());

            // Total
            $this->Total->EditAttrs["class"] = "form-control";
            $this->Total->EditCustomAttributes = "";
            if (!$this->Total->Raw) {
                $this->Total->CurrentValue = HtmlDecode($this->Total->CurrentValue);
            }
            $this->Total->EditValue = HtmlEncode($this->Total->CurrentValue);
            $this->Total->PlaceHolder = RemoveHtml($this->Total->caption());

            // ProgressiveMotility
            $this->ProgressiveMotility->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility->Raw) {
                $this->ProgressiveMotility->CurrentValue = HtmlDecode($this->ProgressiveMotility->CurrentValue);
            }
            $this->ProgressiveMotility->EditValue = HtmlEncode($this->ProgressiveMotility->CurrentValue);
            $this->ProgressiveMotility->PlaceHolder = RemoveHtml($this->ProgressiveMotility->caption());

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile->Raw) {
                $this->NonProgrssiveMotile->CurrentValue = HtmlDecode($this->NonProgrssiveMotile->CurrentValue);
            }
            $this->NonProgrssiveMotile->EditValue = HtmlEncode($this->NonProgrssiveMotile->CurrentValue);
            $this->NonProgrssiveMotile->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile->caption());

            // Immotile
            $this->Immotile->EditAttrs["class"] = "form-control";
            $this->Immotile->EditCustomAttributes = "";
            if (!$this->Immotile->Raw) {
                $this->Immotile->CurrentValue = HtmlDecode($this->Immotile->CurrentValue);
            }
            $this->Immotile->EditValue = HtmlEncode($this->Immotile->CurrentValue);
            $this->Immotile->PlaceHolder = RemoveHtml($this->Immotile->caption());

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile->Raw) {
                $this->TotalProgrssiveMotile->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile->CurrentValue);
            }
            $this->TotalProgrssiveMotile->EditValue = HtmlEncode($this->TotalProgrssiveMotile->CurrentValue);
            $this->TotalProgrssiveMotile->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile->caption());

            // Appearance
            $this->Appearance->EditAttrs["class"] = "form-control";
            $this->Appearance->EditCustomAttributes = "";
            if (!$this->Appearance->Raw) {
                $this->Appearance->CurrentValue = HtmlDecode($this->Appearance->CurrentValue);
            }
            $this->Appearance->EditValue = HtmlEncode($this->Appearance->CurrentValue);
            $this->Appearance->PlaceHolder = RemoveHtml($this->Appearance->caption());

            // Homogenosity
            $this->Homogenosity->EditAttrs["class"] = "form-control";
            $this->Homogenosity->EditCustomAttributes = "";
            $this->Homogenosity->EditValue = $this->Homogenosity->options(true);
            $this->Homogenosity->PlaceHolder = RemoveHtml($this->Homogenosity->caption());

            // CompleteSample
            $this->CompleteSample->EditAttrs["class"] = "form-control";
            $this->CompleteSample->EditCustomAttributes = "";
            $this->CompleteSample->EditValue = $this->CompleteSample->options(true);
            $this->CompleteSample->PlaceHolder = RemoveHtml($this->CompleteSample->caption());

            // Liquefactiontime
            $this->Liquefactiontime->EditAttrs["class"] = "form-control";
            $this->Liquefactiontime->EditCustomAttributes = "";
            if (!$this->Liquefactiontime->Raw) {
                $this->Liquefactiontime->CurrentValue = HtmlDecode($this->Liquefactiontime->CurrentValue);
            }
            $this->Liquefactiontime->EditValue = HtmlEncode($this->Liquefactiontime->CurrentValue);
            $this->Liquefactiontime->PlaceHolder = RemoveHtml($this->Liquefactiontime->caption());

            // Normal
            $this->Normal->EditAttrs["class"] = "form-control";
            $this->Normal->EditCustomAttributes = "";
            if (!$this->Normal->Raw) {
                $this->Normal->CurrentValue = HtmlDecode($this->Normal->CurrentValue);
            }
            $this->Normal->EditValue = HtmlEncode($this->Normal->CurrentValue);
            $this->Normal->PlaceHolder = RemoveHtml($this->Normal->caption());

            // Abnormal
            $this->Abnormal->EditAttrs["class"] = "form-control";
            $this->Abnormal->EditCustomAttributes = "";
            if (!$this->Abnormal->Raw) {
                $this->Abnormal->CurrentValue = HtmlDecode($this->Abnormal->CurrentValue);
            }
            $this->Abnormal->EditValue = HtmlEncode($this->Abnormal->CurrentValue);
            $this->Abnormal->PlaceHolder = RemoveHtml($this->Abnormal->caption());

            // Headdefects
            $this->Headdefects->EditAttrs["class"] = "form-control";
            $this->Headdefects->EditCustomAttributes = "";
            if (!$this->Headdefects->Raw) {
                $this->Headdefects->CurrentValue = HtmlDecode($this->Headdefects->CurrentValue);
            }
            $this->Headdefects->EditValue = HtmlEncode($this->Headdefects->CurrentValue);
            $this->Headdefects->PlaceHolder = RemoveHtml($this->Headdefects->caption());

            // MidpieceDefects
            $this->MidpieceDefects->EditAttrs["class"] = "form-control";
            $this->MidpieceDefects->EditCustomAttributes = "";
            if (!$this->MidpieceDefects->Raw) {
                $this->MidpieceDefects->CurrentValue = HtmlDecode($this->MidpieceDefects->CurrentValue);
            }
            $this->MidpieceDefects->EditValue = HtmlEncode($this->MidpieceDefects->CurrentValue);
            $this->MidpieceDefects->PlaceHolder = RemoveHtml($this->MidpieceDefects->caption());

            // TailDefects
            $this->TailDefects->EditAttrs["class"] = "form-control";
            $this->TailDefects->EditCustomAttributes = "";
            if (!$this->TailDefects->Raw) {
                $this->TailDefects->CurrentValue = HtmlDecode($this->TailDefects->CurrentValue);
            }
            $this->TailDefects->EditValue = HtmlEncode($this->TailDefects->CurrentValue);
            $this->TailDefects->PlaceHolder = RemoveHtml($this->TailDefects->caption());

            // NormalProgMotile
            $this->NormalProgMotile->EditAttrs["class"] = "form-control";
            $this->NormalProgMotile->EditCustomAttributes = "";
            if (!$this->NormalProgMotile->Raw) {
                $this->NormalProgMotile->CurrentValue = HtmlDecode($this->NormalProgMotile->CurrentValue);
            }
            $this->NormalProgMotile->EditValue = HtmlEncode($this->NormalProgMotile->CurrentValue);
            $this->NormalProgMotile->PlaceHolder = RemoveHtml($this->NormalProgMotile->caption());

            // ImmatureForms
            $this->ImmatureForms->EditAttrs["class"] = "form-control";
            $this->ImmatureForms->EditCustomAttributes = "";
            if (!$this->ImmatureForms->Raw) {
                $this->ImmatureForms->CurrentValue = HtmlDecode($this->ImmatureForms->CurrentValue);
            }
            $this->ImmatureForms->EditValue = HtmlEncode($this->ImmatureForms->CurrentValue);
            $this->ImmatureForms->PlaceHolder = RemoveHtml($this->ImmatureForms->caption());

            // Leucocytes
            $this->Leucocytes->EditAttrs["class"] = "form-control";
            $this->Leucocytes->EditCustomAttributes = "";
            if (!$this->Leucocytes->Raw) {
                $this->Leucocytes->CurrentValue = HtmlDecode($this->Leucocytes->CurrentValue);
            }
            $this->Leucocytes->EditValue = HtmlEncode($this->Leucocytes->CurrentValue);
            $this->Leucocytes->PlaceHolder = RemoveHtml($this->Leucocytes->caption());

            // Agglutination
            $this->Agglutination->EditAttrs["class"] = "form-control";
            $this->Agglutination->EditCustomAttributes = "";
            if (!$this->Agglutination->Raw) {
                $this->Agglutination->CurrentValue = HtmlDecode($this->Agglutination->CurrentValue);
            }
            $this->Agglutination->EditValue = HtmlEncode($this->Agglutination->CurrentValue);
            $this->Agglutination->PlaceHolder = RemoveHtml($this->Agglutination->caption());

            // Debris
            $this->Debris->EditAttrs["class"] = "form-control";
            $this->Debris->EditCustomAttributes = "";
            if (!$this->Debris->Raw) {
                $this->Debris->CurrentValue = HtmlDecode($this->Debris->CurrentValue);
            }
            $this->Debris->EditValue = HtmlEncode($this->Debris->CurrentValue);
            $this->Debris->PlaceHolder = RemoveHtml($this->Debris->caption());

            // Diagnosis
            $this->Diagnosis->EditAttrs["class"] = "form-control";
            $this->Diagnosis->EditCustomAttributes = "";
            $this->Diagnosis->EditValue = HtmlEncode($this->Diagnosis->CurrentValue);
            $this->Diagnosis->PlaceHolder = RemoveHtml($this->Diagnosis->caption());

            // Observations
            $this->Observations->EditAttrs["class"] = "form-control";
            $this->Observations->EditCustomAttributes = "";
            $this->Observations->EditValue = HtmlEncode($this->Observations->CurrentValue);
            $this->Observations->PlaceHolder = RemoveHtml($this->Observations->caption());

            // Signature
            $this->Signature->EditAttrs["class"] = "form-control";
            $this->Signature->EditCustomAttributes = "";
            if (!$this->Signature->Raw) {
                $this->Signature->CurrentValue = HtmlDecode($this->Signature->CurrentValue);
            }
            $this->Signature->EditValue = HtmlEncode($this->Signature->CurrentValue);
            $this->Signature->PlaceHolder = RemoveHtml($this->Signature->caption());

            // SemenOrgin
            $this->SemenOrgin->EditAttrs["class"] = "form-control";
            $this->SemenOrgin->EditCustomAttributes = "";
            $this->SemenOrgin->EditValue = $this->SemenOrgin->options(true);
            $this->SemenOrgin->PlaceHolder = RemoveHtml($this->SemenOrgin->caption());

            // Donor
            $this->Donor->EditCustomAttributes = "";
            $curVal = trim(strval($this->Donor->CurrentValue));
            if ($curVal != "") {
                $this->Donor->ViewValue = $this->Donor->lookupCacheOption($curVal);
            } else {
                $this->Donor->ViewValue = $this->Donor->Lookup !== null && is_array($this->Donor->Lookup->Options) ? $curVal : null;
            }
            if ($this->Donor->ViewValue !== null) { // Load from cache
                $this->Donor->EditValue = array_values($this->Donor->Lookup->Options);
                if ($this->Donor->ViewValue == "") {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
            } else { // Lookup from database
                if ($curVal == "") {
                    $filterWrk = "0=1";
                } else {
                    $filterWrk = "`id`" . SearchString("=", $this->Donor->CurrentValue, DATATYPE_NUMBER, "");
                }
                $sqlWrk = $this->Donor->Lookup->getSql(true, $filterWrk, '', $this, false, true);
                $rswrk = Conn()->executeQuery($sqlWrk)->fetchAll(\PDO::FETCH_BOTH);
                $ari = count($rswrk);
                if ($ari > 0) { // Lookup values found
                    $arwrk = $this->Donor->Lookup->renderViewRow($rswrk[0]);
                    $this->Donor->ViewValue = $this->Donor->displayValue($arwrk);
                } else {
                    $this->Donor->ViewValue = $Language->phrase("PleaseSelect");
                }
                $arwrk = $rswrk;
                $this->Donor->EditValue = $arwrk;
            }
            $this->Donor->PlaceHolder = RemoveHtml($this->Donor->caption());

            // DonorBloodgroup
            $this->DonorBloodgroup->EditAttrs["class"] = "form-control";
            $this->DonorBloodgroup->EditCustomAttributes = "";
            if (!$this->DonorBloodgroup->Raw) {
                $this->DonorBloodgroup->CurrentValue = HtmlDecode($this->DonorBloodgroup->CurrentValue);
            }
            $this->DonorBloodgroup->EditValue = HtmlEncode($this->DonorBloodgroup->CurrentValue);
            $this->DonorBloodgroup->PlaceHolder = RemoveHtml($this->DonorBloodgroup->caption());

            // Tank
            $this->Tank->EditAttrs["class"] = "form-control";
            $this->Tank->EditCustomAttributes = "";
            if (!$this->Tank->Raw) {
                $this->Tank->CurrentValue = HtmlDecode($this->Tank->CurrentValue);
            }
            $this->Tank->EditValue = HtmlEncode($this->Tank->CurrentValue);
            $this->Tank->PlaceHolder = RemoveHtml($this->Tank->caption());

            // Location
            $this->Location->EditAttrs["class"] = "form-control";
            $this->Location->EditCustomAttributes = "";
            if (!$this->Location->Raw) {
                $this->Location->CurrentValue = HtmlDecode($this->Location->CurrentValue);
            }
            $this->Location->EditValue = HtmlEncode($this->Location->CurrentValue);
            $this->Location->PlaceHolder = RemoveHtml($this->Location->caption());

            // Volume1
            $this->Volume1->EditAttrs["class"] = "form-control";
            $this->Volume1->EditCustomAttributes = "";
            if (!$this->Volume1->Raw) {
                $this->Volume1->CurrentValue = HtmlDecode($this->Volume1->CurrentValue);
            }
            $this->Volume1->EditValue = HtmlEncode($this->Volume1->CurrentValue);
            $this->Volume1->PlaceHolder = RemoveHtml($this->Volume1->caption());

            // Concentration1
            $this->Concentration1->EditAttrs["class"] = "form-control";
            $this->Concentration1->EditCustomAttributes = "";
            if (!$this->Concentration1->Raw) {
                $this->Concentration1->CurrentValue = HtmlDecode($this->Concentration1->CurrentValue);
            }
            $this->Concentration1->EditValue = HtmlEncode($this->Concentration1->CurrentValue);
            $this->Concentration1->PlaceHolder = RemoveHtml($this->Concentration1->caption());

            // Total1
            $this->Total1->EditAttrs["class"] = "form-control";
            $this->Total1->EditCustomAttributes = "";
            if (!$this->Total1->Raw) {
                $this->Total1->CurrentValue = HtmlDecode($this->Total1->CurrentValue);
            }
            $this->Total1->EditValue = HtmlEncode($this->Total1->CurrentValue);
            $this->Total1->PlaceHolder = RemoveHtml($this->Total1->caption());

            // ProgressiveMotility1
            $this->ProgressiveMotility1->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility1->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility1->Raw) {
                $this->ProgressiveMotility1->CurrentValue = HtmlDecode($this->ProgressiveMotility1->CurrentValue);
            }
            $this->ProgressiveMotility1->EditValue = HtmlEncode($this->ProgressiveMotility1->CurrentValue);
            $this->ProgressiveMotility1->PlaceHolder = RemoveHtml($this->ProgressiveMotility1->caption());

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile1->Raw) {
                $this->NonProgrssiveMotile1->CurrentValue = HtmlDecode($this->NonProgrssiveMotile1->CurrentValue);
            }
            $this->NonProgrssiveMotile1->EditValue = HtmlEncode($this->NonProgrssiveMotile1->CurrentValue);
            $this->NonProgrssiveMotile1->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile1->caption());

            // Immotile1
            $this->Immotile1->EditAttrs["class"] = "form-control";
            $this->Immotile1->EditCustomAttributes = "";
            if (!$this->Immotile1->Raw) {
                $this->Immotile1->CurrentValue = HtmlDecode($this->Immotile1->CurrentValue);
            }
            $this->Immotile1->EditValue = HtmlEncode($this->Immotile1->CurrentValue);
            $this->Immotile1->PlaceHolder = RemoveHtml($this->Immotile1->caption());

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile1->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile1->Raw) {
                $this->TotalProgrssiveMotile1->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile1->CurrentValue);
            }
            $this->TotalProgrssiveMotile1->EditValue = HtmlEncode($this->TotalProgrssiveMotile1->CurrentValue);
            $this->TotalProgrssiveMotile1->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile1->caption());

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

            // Color
            $this->Color->EditAttrs["class"] = "form-control";
            $this->Color->EditCustomAttributes = "";
            if (!$this->Color->Raw) {
                $this->Color->CurrentValue = HtmlDecode($this->Color->CurrentValue);
            }
            $this->Color->EditValue = HtmlEncode($this->Color->CurrentValue);
            $this->Color->PlaceHolder = RemoveHtml($this->Color->caption());

            // DoneBy
            $this->DoneBy->EditAttrs["class"] = "form-control";
            $this->DoneBy->EditCustomAttributes = "";
            if (!$this->DoneBy->Raw) {
                $this->DoneBy->CurrentValue = HtmlDecode($this->DoneBy->CurrentValue);
            }
            $this->DoneBy->EditValue = HtmlEncode($this->DoneBy->CurrentValue);
            $this->DoneBy->PlaceHolder = RemoveHtml($this->DoneBy->caption());

            // Method
            $this->Method->EditAttrs["class"] = "form-control";
            $this->Method->EditCustomAttributes = "";
            if (!$this->Method->Raw) {
                $this->Method->CurrentValue = HtmlDecode($this->Method->CurrentValue);
            }
            $this->Method->EditValue = HtmlEncode($this->Method->CurrentValue);
            $this->Method->PlaceHolder = RemoveHtml($this->Method->caption());

            // Abstinence
            $this->Abstinence->EditAttrs["class"] = "form-control";
            $this->Abstinence->EditCustomAttributes = "";
            if (!$this->Abstinence->Raw) {
                $this->Abstinence->CurrentValue = HtmlDecode($this->Abstinence->CurrentValue);
            }
            $this->Abstinence->EditValue = HtmlEncode($this->Abstinence->CurrentValue);
            $this->Abstinence->PlaceHolder = RemoveHtml($this->Abstinence->caption());

            // ProcessedBy
            $this->ProcessedBy->EditAttrs["class"] = "form-control";
            $this->ProcessedBy->EditCustomAttributes = "";
            if (!$this->ProcessedBy->Raw) {
                $this->ProcessedBy->CurrentValue = HtmlDecode($this->ProcessedBy->CurrentValue);
            }
            $this->ProcessedBy->EditValue = HtmlEncode($this->ProcessedBy->CurrentValue);
            $this->ProcessedBy->PlaceHolder = RemoveHtml($this->ProcessedBy->caption());

            // InseminationTime
            $this->InseminationTime->EditAttrs["class"] = "form-control";
            $this->InseminationTime->EditCustomAttributes = "";
            if (!$this->InseminationTime->Raw) {
                $this->InseminationTime->CurrentValue = HtmlDecode($this->InseminationTime->CurrentValue);
            }
            $this->InseminationTime->EditValue = HtmlEncode($this->InseminationTime->CurrentValue);
            $this->InseminationTime->PlaceHolder = RemoveHtml($this->InseminationTime->caption());

            // InseminationBy
            $this->InseminationBy->EditAttrs["class"] = "form-control";
            $this->InseminationBy->EditCustomAttributes = "";
            if (!$this->InseminationBy->Raw) {
                $this->InseminationBy->CurrentValue = HtmlDecode($this->InseminationBy->CurrentValue);
            }
            $this->InseminationBy->EditValue = HtmlEncode($this->InseminationBy->CurrentValue);
            $this->InseminationBy->PlaceHolder = RemoveHtml($this->InseminationBy->caption());

            // Big
            $this->Big->EditAttrs["class"] = "form-control";
            $this->Big->EditCustomAttributes = "";
            if (!$this->Big->Raw) {
                $this->Big->CurrentValue = HtmlDecode($this->Big->CurrentValue);
            }
            $this->Big->EditValue = HtmlEncode($this->Big->CurrentValue);
            $this->Big->PlaceHolder = RemoveHtml($this->Big->caption());

            // Medium
            $this->Medium->EditAttrs["class"] = "form-control";
            $this->Medium->EditCustomAttributes = "";
            if (!$this->Medium->Raw) {
                $this->Medium->CurrentValue = HtmlDecode($this->Medium->CurrentValue);
            }
            $this->Medium->EditValue = HtmlEncode($this->Medium->CurrentValue);
            $this->Medium->PlaceHolder = RemoveHtml($this->Medium->caption());

            // Small
            $this->Small->EditAttrs["class"] = "form-control";
            $this->Small->EditCustomAttributes = "";
            if (!$this->Small->Raw) {
                $this->Small->CurrentValue = HtmlDecode($this->Small->CurrentValue);
            }
            $this->Small->EditValue = HtmlEncode($this->Small->CurrentValue);
            $this->Small->PlaceHolder = RemoveHtml($this->Small->caption());

            // NoHalo
            $this->NoHalo->EditAttrs["class"] = "form-control";
            $this->NoHalo->EditCustomAttributes = "";
            if (!$this->NoHalo->Raw) {
                $this->NoHalo->CurrentValue = HtmlDecode($this->NoHalo->CurrentValue);
            }
            $this->NoHalo->EditValue = HtmlEncode($this->NoHalo->CurrentValue);
            $this->NoHalo->PlaceHolder = RemoveHtml($this->NoHalo->caption());

            // Fragmented
            $this->Fragmented->EditAttrs["class"] = "form-control";
            $this->Fragmented->EditCustomAttributes = "";
            if (!$this->Fragmented->Raw) {
                $this->Fragmented->CurrentValue = HtmlDecode($this->Fragmented->CurrentValue);
            }
            $this->Fragmented->EditValue = HtmlEncode($this->Fragmented->CurrentValue);
            $this->Fragmented->PlaceHolder = RemoveHtml($this->Fragmented->caption());

            // NonFragmented
            $this->NonFragmented->EditAttrs["class"] = "form-control";
            $this->NonFragmented->EditCustomAttributes = "";
            if (!$this->NonFragmented->Raw) {
                $this->NonFragmented->CurrentValue = HtmlDecode($this->NonFragmented->CurrentValue);
            }
            $this->NonFragmented->EditValue = HtmlEncode($this->NonFragmented->CurrentValue);
            $this->NonFragmented->PlaceHolder = RemoveHtml($this->NonFragmented->caption());

            // DFI
            $this->DFI->EditAttrs["class"] = "form-control";
            $this->DFI->EditCustomAttributes = "";
            if (!$this->DFI->Raw) {
                $this->DFI->CurrentValue = HtmlDecode($this->DFI->CurrentValue);
            }
            $this->DFI->EditValue = HtmlEncode($this->DFI->CurrentValue);
            $this->DFI->PlaceHolder = RemoveHtml($this->DFI->caption());

            // IsueBy
            $this->IsueBy->EditAttrs["class"] = "form-control";
            $this->IsueBy->EditCustomAttributes = "";
            if (!$this->IsueBy->Raw) {
                $this->IsueBy->CurrentValue = HtmlDecode($this->IsueBy->CurrentValue);
            }
            $this->IsueBy->EditValue = HtmlEncode($this->IsueBy->CurrentValue);
            $this->IsueBy->PlaceHolder = RemoveHtml($this->IsueBy->caption());

            // Volume2
            $this->Volume2->EditAttrs["class"] = "form-control";
            $this->Volume2->EditCustomAttributes = "";
            if (!$this->Volume2->Raw) {
                $this->Volume2->CurrentValue = HtmlDecode($this->Volume2->CurrentValue);
            }
            $this->Volume2->EditValue = HtmlEncode($this->Volume2->CurrentValue);
            $this->Volume2->PlaceHolder = RemoveHtml($this->Volume2->caption());

            // Concentration2
            $this->Concentration2->EditAttrs["class"] = "form-control";
            $this->Concentration2->EditCustomAttributes = "";
            if (!$this->Concentration2->Raw) {
                $this->Concentration2->CurrentValue = HtmlDecode($this->Concentration2->CurrentValue);
            }
            $this->Concentration2->EditValue = HtmlEncode($this->Concentration2->CurrentValue);
            $this->Concentration2->PlaceHolder = RemoveHtml($this->Concentration2->caption());

            // Total2
            $this->Total2->EditAttrs["class"] = "form-control";
            $this->Total2->EditCustomAttributes = "";
            if (!$this->Total2->Raw) {
                $this->Total2->CurrentValue = HtmlDecode($this->Total2->CurrentValue);
            }
            $this->Total2->EditValue = HtmlEncode($this->Total2->CurrentValue);
            $this->Total2->PlaceHolder = RemoveHtml($this->Total2->caption());

            // ProgressiveMotility2
            $this->ProgressiveMotility2->EditAttrs["class"] = "form-control";
            $this->ProgressiveMotility2->EditCustomAttributes = "";
            if (!$this->ProgressiveMotility2->Raw) {
                $this->ProgressiveMotility2->CurrentValue = HtmlDecode($this->ProgressiveMotility2->CurrentValue);
            }
            $this->ProgressiveMotility2->EditValue = HtmlEncode($this->ProgressiveMotility2->CurrentValue);
            $this->ProgressiveMotility2->PlaceHolder = RemoveHtml($this->ProgressiveMotility2->caption());

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->NonProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->NonProgrssiveMotile2->Raw) {
                $this->NonProgrssiveMotile2->CurrentValue = HtmlDecode($this->NonProgrssiveMotile2->CurrentValue);
            }
            $this->NonProgrssiveMotile2->EditValue = HtmlEncode($this->NonProgrssiveMotile2->CurrentValue);
            $this->NonProgrssiveMotile2->PlaceHolder = RemoveHtml($this->NonProgrssiveMotile2->caption());

            // Immotile2
            $this->Immotile2->EditAttrs["class"] = "form-control";
            $this->Immotile2->EditCustomAttributes = "";
            if (!$this->Immotile2->Raw) {
                $this->Immotile2->CurrentValue = HtmlDecode($this->Immotile2->CurrentValue);
            }
            $this->Immotile2->EditValue = HtmlEncode($this->Immotile2->CurrentValue);
            $this->Immotile2->PlaceHolder = RemoveHtml($this->Immotile2->caption());

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->EditAttrs["class"] = "form-control";
            $this->TotalProgrssiveMotile2->EditCustomAttributes = "";
            if (!$this->TotalProgrssiveMotile2->Raw) {
                $this->TotalProgrssiveMotile2->CurrentValue = HtmlDecode($this->TotalProgrssiveMotile2->CurrentValue);
            }
            $this->TotalProgrssiveMotile2->EditValue = HtmlEncode($this->TotalProgrssiveMotile2->CurrentValue);
            $this->TotalProgrssiveMotile2->PlaceHolder = RemoveHtml($this->TotalProgrssiveMotile2->caption());

            // IssuedBy
            $this->IssuedBy->EditAttrs["class"] = "form-control";
            $this->IssuedBy->EditCustomAttributes = "";
            if (!$this->IssuedBy->Raw) {
                $this->IssuedBy->CurrentValue = HtmlDecode($this->IssuedBy->CurrentValue);
            }
            $this->IssuedBy->EditValue = HtmlEncode($this->IssuedBy->CurrentValue);
            $this->IssuedBy->PlaceHolder = RemoveHtml($this->IssuedBy->caption());

            // IssuedTo
            $this->IssuedTo->EditAttrs["class"] = "form-control";
            $this->IssuedTo->EditCustomAttributes = "";
            if (!$this->IssuedTo->Raw) {
                $this->IssuedTo->CurrentValue = HtmlDecode($this->IssuedTo->CurrentValue);
            }
            $this->IssuedTo->EditValue = HtmlEncode($this->IssuedTo->CurrentValue);
            $this->IssuedTo->PlaceHolder = RemoveHtml($this->IssuedTo->caption());

            // PaID
            $this->PaID->EditAttrs["class"] = "form-control";
            $this->PaID->EditCustomAttributes = "";
            if (!$this->PaID->Raw) {
                $this->PaID->CurrentValue = HtmlDecode($this->PaID->CurrentValue);
            }
            $this->PaID->EditValue = HtmlEncode($this->PaID->CurrentValue);
            $this->PaID->PlaceHolder = RemoveHtml($this->PaID->caption());

            // PaName
            $this->PaName->EditAttrs["class"] = "form-control";
            $this->PaName->EditCustomAttributes = "";
            if (!$this->PaName->Raw) {
                $this->PaName->CurrentValue = HtmlDecode($this->PaName->CurrentValue);
            }
            $this->PaName->EditValue = HtmlEncode($this->PaName->CurrentValue);
            $this->PaName->PlaceHolder = RemoveHtml($this->PaName->caption());

            // PaMobile
            $this->PaMobile->EditAttrs["class"] = "form-control";
            $this->PaMobile->EditCustomAttributes = "";
            if (!$this->PaMobile->Raw) {
                $this->PaMobile->CurrentValue = HtmlDecode($this->PaMobile->CurrentValue);
            }
            $this->PaMobile->EditValue = HtmlEncode($this->PaMobile->CurrentValue);
            $this->PaMobile->PlaceHolder = RemoveHtml($this->PaMobile->caption());

            // PartnerID
            $this->PartnerID->EditAttrs["class"] = "form-control";
            $this->PartnerID->EditCustomAttributes = "";
            if (!$this->PartnerID->Raw) {
                $this->PartnerID->CurrentValue = HtmlDecode($this->PartnerID->CurrentValue);
            }
            $this->PartnerID->EditValue = HtmlEncode($this->PartnerID->CurrentValue);
            $this->PartnerID->PlaceHolder = RemoveHtml($this->PartnerID->caption());

            // PartnerName
            $this->PartnerName->EditAttrs["class"] = "form-control";
            $this->PartnerName->EditCustomAttributes = "";
            if (!$this->PartnerName->Raw) {
                $this->PartnerName->CurrentValue = HtmlDecode($this->PartnerName->CurrentValue);
            }
            $this->PartnerName->EditValue = HtmlEncode($this->PartnerName->CurrentValue);
            $this->PartnerName->PlaceHolder = RemoveHtml($this->PartnerName->caption());

            // PartnerMobile
            $this->PartnerMobile->EditAttrs["class"] = "form-control";
            $this->PartnerMobile->EditCustomAttributes = "";
            if (!$this->PartnerMobile->Raw) {
                $this->PartnerMobile->CurrentValue = HtmlDecode($this->PartnerMobile->CurrentValue);
            }
            $this->PartnerMobile->EditValue = HtmlEncode($this->PartnerMobile->CurrentValue);
            $this->PartnerMobile->PlaceHolder = RemoveHtml($this->PartnerMobile->caption());

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->EditAttrs["class"] = "form-control";
            $this->PREG_TEST_DATE->EditCustomAttributes = "";
            $this->PREG_TEST_DATE->EditValue = HtmlEncode(FormatDateTime($this->PREG_TEST_DATE->CurrentValue, 8));
            $this->PREG_TEST_DATE->PlaceHolder = RemoveHtml($this->PREG_TEST_DATE->caption());

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->EditAttrs["class"] = "form-control";
            $this->SPECIFIC_PROBLEMS->EditCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->EditValue = $this->SPECIFIC_PROBLEMS->options(true);
            $this->SPECIFIC_PROBLEMS->PlaceHolder = RemoveHtml($this->SPECIFIC_PROBLEMS->caption());

            // IMSC_1
            $this->IMSC_1->EditAttrs["class"] = "form-control";
            $this->IMSC_1->EditCustomAttributes = "";
            if (!$this->IMSC_1->Raw) {
                $this->IMSC_1->CurrentValue = HtmlDecode($this->IMSC_1->CurrentValue);
            }
            $this->IMSC_1->EditValue = HtmlEncode($this->IMSC_1->CurrentValue);
            $this->IMSC_1->PlaceHolder = RemoveHtml($this->IMSC_1->caption());

            // IMSC_2
            $this->IMSC_2->EditAttrs["class"] = "form-control";
            $this->IMSC_2->EditCustomAttributes = "";
            if (!$this->IMSC_2->Raw) {
                $this->IMSC_2->CurrentValue = HtmlDecode($this->IMSC_2->CurrentValue);
            }
            $this->IMSC_2->EditValue = HtmlEncode($this->IMSC_2->CurrentValue);
            $this->IMSC_2->PlaceHolder = RemoveHtml($this->IMSC_2->caption());

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->EditAttrs["class"] = "form-control";
            $this->LIQUIFACTION_STORAGE->EditCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->EditValue = $this->LIQUIFACTION_STORAGE->options(true);
            $this->LIQUIFACTION_STORAGE->PlaceHolder = RemoveHtml($this->LIQUIFACTION_STORAGE->caption());

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->EditAttrs["class"] = "form-control";
            $this->IUI_PREP_METHOD->EditCustomAttributes = "";
            $this->IUI_PREP_METHOD->EditValue = $this->IUI_PREP_METHOD->options(true);
            $this->IUI_PREP_METHOD->PlaceHolder = RemoveHtml($this->IUI_PREP_METHOD->caption());

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_TRIGGER->EditCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->EditValue = $this->TIME_FROM_TRIGGER->options(true);
            $this->TIME_FROM_TRIGGER->PlaceHolder = RemoveHtml($this->TIME_FROM_TRIGGER->caption());

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->EditAttrs["class"] = "form-control";
            $this->COLLECTION_TO_PREPARATION->EditCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->EditValue = $this->COLLECTION_TO_PREPARATION->options(true);
            $this->COLLECTION_TO_PREPARATION->PlaceHolder = RemoveHtml($this->COLLECTION_TO_PREPARATION->caption());

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->EditAttrs["class"] = "form-control";
            $this->TIME_FROM_PREP_TO_INSEM->EditCustomAttributes = "";
            if (!$this->TIME_FROM_PREP_TO_INSEM->Raw) {
                $this->TIME_FROM_PREP_TO_INSEM->CurrentValue = HtmlDecode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            }
            $this->TIME_FROM_PREP_TO_INSEM->EditValue = HtmlEncode($this->TIME_FROM_PREP_TO_INSEM->CurrentValue);
            $this->TIME_FROM_PREP_TO_INSEM->PlaceHolder = RemoveHtml($this->TIME_FROM_PREP_TO_INSEM->caption());

            // Edit refer script

            // id
            $this->id->LinkCustomAttributes = "";
            $this->id->HrefValue = "";

            // RIDNo
            $this->RIDNo->LinkCustomAttributes = "";
            $this->RIDNo->HrefValue = "";

            // PatientName
            $this->PatientName->LinkCustomAttributes = "";
            $this->PatientName->HrefValue = "";

            // HusbandName
            $this->HusbandName->LinkCustomAttributes = "";
            $this->HusbandName->HrefValue = "";

            // RequestDr
            $this->RequestDr->LinkCustomAttributes = "";
            $this->RequestDr->HrefValue = "";

            // CollectionDate
            $this->CollectionDate->LinkCustomAttributes = "";
            $this->CollectionDate->HrefValue = "";

            // ResultDate
            $this->ResultDate->LinkCustomAttributes = "";
            $this->ResultDate->HrefValue = "";

            // RequestSample
            $this->RequestSample->LinkCustomAttributes = "";
            $this->RequestSample->HrefValue = "";

            // CollectionType
            $this->CollectionType->LinkCustomAttributes = "";
            $this->CollectionType->HrefValue = "";

            // CollectionMethod
            $this->CollectionMethod->LinkCustomAttributes = "";
            $this->CollectionMethod->HrefValue = "";

            // Medicationused
            $this->Medicationused->LinkCustomAttributes = "";
            $this->Medicationused->HrefValue = "";

            // DifficultiesinCollection
            $this->DifficultiesinCollection->LinkCustomAttributes = "";
            $this->DifficultiesinCollection->HrefValue = "";

            // pH
            $this->pH->LinkCustomAttributes = "";
            $this->pH->HrefValue = "";

            // Timeofcollection
            $this->Timeofcollection->LinkCustomAttributes = "";
            $this->Timeofcollection->HrefValue = "";

            // Timeofexamination
            $this->Timeofexamination->LinkCustomAttributes = "";
            $this->Timeofexamination->HrefValue = "";

            // Volume
            $this->Volume->LinkCustomAttributes = "";
            $this->Volume->HrefValue = "";

            // Concentration
            $this->Concentration->LinkCustomAttributes = "";
            $this->Concentration->HrefValue = "";

            // Total
            $this->Total->LinkCustomAttributes = "";
            $this->Total->HrefValue = "";

            // ProgressiveMotility
            $this->ProgressiveMotility->LinkCustomAttributes = "";
            $this->ProgressiveMotility->HrefValue = "";

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile->HrefValue = "";

            // Immotile
            $this->Immotile->LinkCustomAttributes = "";
            $this->Immotile->HrefValue = "";

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile->HrefValue = "";

            // Appearance
            $this->Appearance->LinkCustomAttributes = "";
            $this->Appearance->HrefValue = "";

            // Homogenosity
            $this->Homogenosity->LinkCustomAttributes = "";
            $this->Homogenosity->HrefValue = "";

            // CompleteSample
            $this->CompleteSample->LinkCustomAttributes = "";
            $this->CompleteSample->HrefValue = "";

            // Liquefactiontime
            $this->Liquefactiontime->LinkCustomAttributes = "";
            $this->Liquefactiontime->HrefValue = "";

            // Normal
            $this->Normal->LinkCustomAttributes = "";
            $this->Normal->HrefValue = "";

            // Abnormal
            $this->Abnormal->LinkCustomAttributes = "";
            $this->Abnormal->HrefValue = "";

            // Headdefects
            $this->Headdefects->LinkCustomAttributes = "";
            $this->Headdefects->HrefValue = "";

            // MidpieceDefects
            $this->MidpieceDefects->LinkCustomAttributes = "";
            $this->MidpieceDefects->HrefValue = "";

            // TailDefects
            $this->TailDefects->LinkCustomAttributes = "";
            $this->TailDefects->HrefValue = "";

            // NormalProgMotile
            $this->NormalProgMotile->LinkCustomAttributes = "";
            $this->NormalProgMotile->HrefValue = "";

            // ImmatureForms
            $this->ImmatureForms->LinkCustomAttributes = "";
            $this->ImmatureForms->HrefValue = "";

            // Leucocytes
            $this->Leucocytes->LinkCustomAttributes = "";
            $this->Leucocytes->HrefValue = "";

            // Agglutination
            $this->Agglutination->LinkCustomAttributes = "";
            $this->Agglutination->HrefValue = "";

            // Debris
            $this->Debris->LinkCustomAttributes = "";
            $this->Debris->HrefValue = "";

            // Diagnosis
            $this->Diagnosis->LinkCustomAttributes = "";
            $this->Diagnosis->HrefValue = "";

            // Observations
            $this->Observations->LinkCustomAttributes = "";
            $this->Observations->HrefValue = "";

            // Signature
            $this->Signature->LinkCustomAttributes = "";
            $this->Signature->HrefValue = "";

            // SemenOrgin
            $this->SemenOrgin->LinkCustomAttributes = "";
            $this->SemenOrgin->HrefValue = "";

            // Donor
            $this->Donor->LinkCustomAttributes = "";
            $this->Donor->HrefValue = "";

            // DonorBloodgroup
            $this->DonorBloodgroup->LinkCustomAttributes = "";
            $this->DonorBloodgroup->HrefValue = "";

            // Tank
            $this->Tank->LinkCustomAttributes = "";
            $this->Tank->HrefValue = "";

            // Location
            $this->Location->LinkCustomAttributes = "";
            $this->Location->HrefValue = "";

            // Volume1
            $this->Volume1->LinkCustomAttributes = "";
            $this->Volume1->HrefValue = "";

            // Concentration1
            $this->Concentration1->LinkCustomAttributes = "";
            $this->Concentration1->HrefValue = "";

            // Total1
            $this->Total1->LinkCustomAttributes = "";
            $this->Total1->HrefValue = "";

            // ProgressiveMotility1
            $this->ProgressiveMotility1->LinkCustomAttributes = "";
            $this->ProgressiveMotility1->HrefValue = "";

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile1->HrefValue = "";

            // Immotile1
            $this->Immotile1->LinkCustomAttributes = "";
            $this->Immotile1->HrefValue = "";

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile1->HrefValue = "";

            // TidNo
            $this->TidNo->LinkCustomAttributes = "";
            $this->TidNo->HrefValue = "";

            // Color
            $this->Color->LinkCustomAttributes = "";
            $this->Color->HrefValue = "";

            // DoneBy
            $this->DoneBy->LinkCustomAttributes = "";
            $this->DoneBy->HrefValue = "";

            // Method
            $this->Method->LinkCustomAttributes = "";
            $this->Method->HrefValue = "";

            // Abstinence
            $this->Abstinence->LinkCustomAttributes = "";
            $this->Abstinence->HrefValue = "";

            // ProcessedBy
            $this->ProcessedBy->LinkCustomAttributes = "";
            $this->ProcessedBy->HrefValue = "";

            // InseminationTime
            $this->InseminationTime->LinkCustomAttributes = "";
            $this->InseminationTime->HrefValue = "";

            // InseminationBy
            $this->InseminationBy->LinkCustomAttributes = "";
            $this->InseminationBy->HrefValue = "";

            // Big
            $this->Big->LinkCustomAttributes = "";
            $this->Big->HrefValue = "";

            // Medium
            $this->Medium->LinkCustomAttributes = "";
            $this->Medium->HrefValue = "";

            // Small
            $this->Small->LinkCustomAttributes = "";
            $this->Small->HrefValue = "";

            // NoHalo
            $this->NoHalo->LinkCustomAttributes = "";
            $this->NoHalo->HrefValue = "";

            // Fragmented
            $this->Fragmented->LinkCustomAttributes = "";
            $this->Fragmented->HrefValue = "";

            // NonFragmented
            $this->NonFragmented->LinkCustomAttributes = "";
            $this->NonFragmented->HrefValue = "";

            // DFI
            $this->DFI->LinkCustomAttributes = "";
            $this->DFI->HrefValue = "";

            // IsueBy
            $this->IsueBy->LinkCustomAttributes = "";
            $this->IsueBy->HrefValue = "";

            // Volume2
            $this->Volume2->LinkCustomAttributes = "";
            $this->Volume2->HrefValue = "";

            // Concentration2
            $this->Concentration2->LinkCustomAttributes = "";
            $this->Concentration2->HrefValue = "";

            // Total2
            $this->Total2->LinkCustomAttributes = "";
            $this->Total2->HrefValue = "";

            // ProgressiveMotility2
            $this->ProgressiveMotility2->LinkCustomAttributes = "";
            $this->ProgressiveMotility2->HrefValue = "";

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->LinkCustomAttributes = "";
            $this->NonProgrssiveMotile2->HrefValue = "";

            // Immotile2
            $this->Immotile2->LinkCustomAttributes = "";
            $this->Immotile2->HrefValue = "";

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->LinkCustomAttributes = "";
            $this->TotalProgrssiveMotile2->HrefValue = "";

            // IssuedBy
            $this->IssuedBy->LinkCustomAttributes = "";
            $this->IssuedBy->HrefValue = "";

            // IssuedTo
            $this->IssuedTo->LinkCustomAttributes = "";
            $this->IssuedTo->HrefValue = "";

            // PaID
            $this->PaID->LinkCustomAttributes = "";
            $this->PaID->HrefValue = "";

            // PaName
            $this->PaName->LinkCustomAttributes = "";
            $this->PaName->HrefValue = "";

            // PaMobile
            $this->PaMobile->LinkCustomAttributes = "";
            $this->PaMobile->HrefValue = "";

            // PartnerID
            $this->PartnerID->LinkCustomAttributes = "";
            $this->PartnerID->HrefValue = "";

            // PartnerName
            $this->PartnerName->LinkCustomAttributes = "";
            $this->PartnerName->HrefValue = "";

            // PartnerMobile
            $this->PartnerMobile->LinkCustomAttributes = "";
            $this->PartnerMobile->HrefValue = "";

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->LinkCustomAttributes = "";
            $this->PREG_TEST_DATE->HrefValue = "";

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->LinkCustomAttributes = "";
            $this->SPECIFIC_PROBLEMS->HrefValue = "";

            // IMSC_1
            $this->IMSC_1->LinkCustomAttributes = "";
            $this->IMSC_1->HrefValue = "";

            // IMSC_2
            $this->IMSC_2->LinkCustomAttributes = "";
            $this->IMSC_2->HrefValue = "";

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->LinkCustomAttributes = "";
            $this->LIQUIFACTION_STORAGE->HrefValue = "";

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->LinkCustomAttributes = "";
            $this->IUI_PREP_METHOD->HrefValue = "";

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->LinkCustomAttributes = "";
            $this->TIME_FROM_TRIGGER->HrefValue = "";

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->LinkCustomAttributes = "";
            $this->COLLECTION_TO_PREPARATION->HrefValue = "";

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->LinkCustomAttributes = "";
            $this->TIME_FROM_PREP_TO_INSEM->HrefValue = "";
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
        if (!CheckInteger($this->RIDNo->FormValue)) {
            $this->RIDNo->addErrorMessage($this->RIDNo->getErrorMessage(false));
        }
        if ($this->PatientName->Required) {
            if (!$this->PatientName->IsDetailKey && EmptyValue($this->PatientName->FormValue)) {
                $this->PatientName->addErrorMessage(str_replace("%s", $this->PatientName->caption(), $this->PatientName->RequiredErrorMessage));
            }
        }
        if ($this->HusbandName->Required) {
            if (!$this->HusbandName->IsDetailKey && EmptyValue($this->HusbandName->FormValue)) {
                $this->HusbandName->addErrorMessage(str_replace("%s", $this->HusbandName->caption(), $this->HusbandName->RequiredErrorMessage));
            }
        }
        if ($this->RequestDr->Required) {
            if (!$this->RequestDr->IsDetailKey && EmptyValue($this->RequestDr->FormValue)) {
                $this->RequestDr->addErrorMessage(str_replace("%s", $this->RequestDr->caption(), $this->RequestDr->RequiredErrorMessage));
            }
        }
        if ($this->CollectionDate->Required) {
            if (!$this->CollectionDate->IsDetailKey && EmptyValue($this->CollectionDate->FormValue)) {
                $this->CollectionDate->addErrorMessage(str_replace("%s", $this->CollectionDate->caption(), $this->CollectionDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->CollectionDate->FormValue)) {
            $this->CollectionDate->addErrorMessage($this->CollectionDate->getErrorMessage(false));
        }
        if ($this->ResultDate->Required) {
            if (!$this->ResultDate->IsDetailKey && EmptyValue($this->ResultDate->FormValue)) {
                $this->ResultDate->addErrorMessage(str_replace("%s", $this->ResultDate->caption(), $this->ResultDate->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->ResultDate->FormValue)) {
            $this->ResultDate->addErrorMessage($this->ResultDate->getErrorMessage(false));
        }
        if ($this->RequestSample->Required) {
            if (!$this->RequestSample->IsDetailKey && EmptyValue($this->RequestSample->FormValue)) {
                $this->RequestSample->addErrorMessage(str_replace("%s", $this->RequestSample->caption(), $this->RequestSample->RequiredErrorMessage));
            }
        }
        if ($this->CollectionType->Required) {
            if (!$this->CollectionType->IsDetailKey && EmptyValue($this->CollectionType->FormValue)) {
                $this->CollectionType->addErrorMessage(str_replace("%s", $this->CollectionType->caption(), $this->CollectionType->RequiredErrorMessage));
            }
        }
        if ($this->CollectionMethod->Required) {
            if (!$this->CollectionMethod->IsDetailKey && EmptyValue($this->CollectionMethod->FormValue)) {
                $this->CollectionMethod->addErrorMessage(str_replace("%s", $this->CollectionMethod->caption(), $this->CollectionMethod->RequiredErrorMessage));
            }
        }
        if ($this->Medicationused->Required) {
            if (!$this->Medicationused->IsDetailKey && EmptyValue($this->Medicationused->FormValue)) {
                $this->Medicationused->addErrorMessage(str_replace("%s", $this->Medicationused->caption(), $this->Medicationused->RequiredErrorMessage));
            }
        }
        if ($this->DifficultiesinCollection->Required) {
            if (!$this->DifficultiesinCollection->IsDetailKey && EmptyValue($this->DifficultiesinCollection->FormValue)) {
                $this->DifficultiesinCollection->addErrorMessage(str_replace("%s", $this->DifficultiesinCollection->caption(), $this->DifficultiesinCollection->RequiredErrorMessage));
            }
        }
        if ($this->pH->Required) {
            if (!$this->pH->IsDetailKey && EmptyValue($this->pH->FormValue)) {
                $this->pH->addErrorMessage(str_replace("%s", $this->pH->caption(), $this->pH->RequiredErrorMessage));
            }
        }
        if ($this->Timeofcollection->Required) {
            if (!$this->Timeofcollection->IsDetailKey && EmptyValue($this->Timeofcollection->FormValue)) {
                $this->Timeofcollection->addErrorMessage(str_replace("%s", $this->Timeofcollection->caption(), $this->Timeofcollection->RequiredErrorMessage));
            }
        }
        if ($this->Timeofexamination->Required) {
            if (!$this->Timeofexamination->IsDetailKey && EmptyValue($this->Timeofexamination->FormValue)) {
                $this->Timeofexamination->addErrorMessage(str_replace("%s", $this->Timeofexamination->caption(), $this->Timeofexamination->RequiredErrorMessage));
            }
        }
        if ($this->Volume->Required) {
            if (!$this->Volume->IsDetailKey && EmptyValue($this->Volume->FormValue)) {
                $this->Volume->addErrorMessage(str_replace("%s", $this->Volume->caption(), $this->Volume->RequiredErrorMessage));
            }
        }
        if ($this->Concentration->Required) {
            if (!$this->Concentration->IsDetailKey && EmptyValue($this->Concentration->FormValue)) {
                $this->Concentration->addErrorMessage(str_replace("%s", $this->Concentration->caption(), $this->Concentration->RequiredErrorMessage));
            }
        }
        if ($this->Total->Required) {
            if (!$this->Total->IsDetailKey && EmptyValue($this->Total->FormValue)) {
                $this->Total->addErrorMessage(str_replace("%s", $this->Total->caption(), $this->Total->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility->Required) {
            if (!$this->ProgressiveMotility->IsDetailKey && EmptyValue($this->ProgressiveMotility->FormValue)) {
                $this->ProgressiveMotility->addErrorMessage(str_replace("%s", $this->ProgressiveMotility->caption(), $this->ProgressiveMotility->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile->Required) {
            if (!$this->NonProgrssiveMotile->IsDetailKey && EmptyValue($this->NonProgrssiveMotile->FormValue)) {
                $this->NonProgrssiveMotile->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile->caption(), $this->NonProgrssiveMotile->RequiredErrorMessage));
            }
        }
        if ($this->Immotile->Required) {
            if (!$this->Immotile->IsDetailKey && EmptyValue($this->Immotile->FormValue)) {
                $this->Immotile->addErrorMessage(str_replace("%s", $this->Immotile->caption(), $this->Immotile->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile->Required) {
            if (!$this->TotalProgrssiveMotile->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile->FormValue)) {
                $this->TotalProgrssiveMotile->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile->caption(), $this->TotalProgrssiveMotile->RequiredErrorMessage));
            }
        }
        if ($this->Appearance->Required) {
            if (!$this->Appearance->IsDetailKey && EmptyValue($this->Appearance->FormValue)) {
                $this->Appearance->addErrorMessage(str_replace("%s", $this->Appearance->caption(), $this->Appearance->RequiredErrorMessage));
            }
        }
        if ($this->Homogenosity->Required) {
            if (!$this->Homogenosity->IsDetailKey && EmptyValue($this->Homogenosity->FormValue)) {
                $this->Homogenosity->addErrorMessage(str_replace("%s", $this->Homogenosity->caption(), $this->Homogenosity->RequiredErrorMessage));
            }
        }
        if ($this->CompleteSample->Required) {
            if (!$this->CompleteSample->IsDetailKey && EmptyValue($this->CompleteSample->FormValue)) {
                $this->CompleteSample->addErrorMessage(str_replace("%s", $this->CompleteSample->caption(), $this->CompleteSample->RequiredErrorMessage));
            }
        }
        if ($this->Liquefactiontime->Required) {
            if (!$this->Liquefactiontime->IsDetailKey && EmptyValue($this->Liquefactiontime->FormValue)) {
                $this->Liquefactiontime->addErrorMessage(str_replace("%s", $this->Liquefactiontime->caption(), $this->Liquefactiontime->RequiredErrorMessage));
            }
        }
        if ($this->Normal->Required) {
            if (!$this->Normal->IsDetailKey && EmptyValue($this->Normal->FormValue)) {
                $this->Normal->addErrorMessage(str_replace("%s", $this->Normal->caption(), $this->Normal->RequiredErrorMessage));
            }
        }
        if ($this->Abnormal->Required) {
            if (!$this->Abnormal->IsDetailKey && EmptyValue($this->Abnormal->FormValue)) {
                $this->Abnormal->addErrorMessage(str_replace("%s", $this->Abnormal->caption(), $this->Abnormal->RequiredErrorMessage));
            }
        }
        if ($this->Headdefects->Required) {
            if (!$this->Headdefects->IsDetailKey && EmptyValue($this->Headdefects->FormValue)) {
                $this->Headdefects->addErrorMessage(str_replace("%s", $this->Headdefects->caption(), $this->Headdefects->RequiredErrorMessage));
            }
        }
        if ($this->MidpieceDefects->Required) {
            if (!$this->MidpieceDefects->IsDetailKey && EmptyValue($this->MidpieceDefects->FormValue)) {
                $this->MidpieceDefects->addErrorMessage(str_replace("%s", $this->MidpieceDefects->caption(), $this->MidpieceDefects->RequiredErrorMessage));
            }
        }
        if ($this->TailDefects->Required) {
            if (!$this->TailDefects->IsDetailKey && EmptyValue($this->TailDefects->FormValue)) {
                $this->TailDefects->addErrorMessage(str_replace("%s", $this->TailDefects->caption(), $this->TailDefects->RequiredErrorMessage));
            }
        }
        if ($this->NormalProgMotile->Required) {
            if (!$this->NormalProgMotile->IsDetailKey && EmptyValue($this->NormalProgMotile->FormValue)) {
                $this->NormalProgMotile->addErrorMessage(str_replace("%s", $this->NormalProgMotile->caption(), $this->NormalProgMotile->RequiredErrorMessage));
            }
        }
        if ($this->ImmatureForms->Required) {
            if (!$this->ImmatureForms->IsDetailKey && EmptyValue($this->ImmatureForms->FormValue)) {
                $this->ImmatureForms->addErrorMessage(str_replace("%s", $this->ImmatureForms->caption(), $this->ImmatureForms->RequiredErrorMessage));
            }
        }
        if ($this->Leucocytes->Required) {
            if (!$this->Leucocytes->IsDetailKey && EmptyValue($this->Leucocytes->FormValue)) {
                $this->Leucocytes->addErrorMessage(str_replace("%s", $this->Leucocytes->caption(), $this->Leucocytes->RequiredErrorMessage));
            }
        }
        if ($this->Agglutination->Required) {
            if (!$this->Agglutination->IsDetailKey && EmptyValue($this->Agglutination->FormValue)) {
                $this->Agglutination->addErrorMessage(str_replace("%s", $this->Agglutination->caption(), $this->Agglutination->RequiredErrorMessage));
            }
        }
        if ($this->Debris->Required) {
            if (!$this->Debris->IsDetailKey && EmptyValue($this->Debris->FormValue)) {
                $this->Debris->addErrorMessage(str_replace("%s", $this->Debris->caption(), $this->Debris->RequiredErrorMessage));
            }
        }
        if ($this->Diagnosis->Required) {
            if (!$this->Diagnosis->IsDetailKey && EmptyValue($this->Diagnosis->FormValue)) {
                $this->Diagnosis->addErrorMessage(str_replace("%s", $this->Diagnosis->caption(), $this->Diagnosis->RequiredErrorMessage));
            }
        }
        if ($this->Observations->Required) {
            if (!$this->Observations->IsDetailKey && EmptyValue($this->Observations->FormValue)) {
                $this->Observations->addErrorMessage(str_replace("%s", $this->Observations->caption(), $this->Observations->RequiredErrorMessage));
            }
        }
        if ($this->Signature->Required) {
            if (!$this->Signature->IsDetailKey && EmptyValue($this->Signature->FormValue)) {
                $this->Signature->addErrorMessage(str_replace("%s", $this->Signature->caption(), $this->Signature->RequiredErrorMessage));
            }
        }
        if ($this->SemenOrgin->Required) {
            if (!$this->SemenOrgin->IsDetailKey && EmptyValue($this->SemenOrgin->FormValue)) {
                $this->SemenOrgin->addErrorMessage(str_replace("%s", $this->SemenOrgin->caption(), $this->SemenOrgin->RequiredErrorMessage));
            }
        }
        if ($this->Donor->Required) {
            if (!$this->Donor->IsDetailKey && EmptyValue($this->Donor->FormValue)) {
                $this->Donor->addErrorMessage(str_replace("%s", $this->Donor->caption(), $this->Donor->RequiredErrorMessage));
            }
        }
        if ($this->DonorBloodgroup->Required) {
            if (!$this->DonorBloodgroup->IsDetailKey && EmptyValue($this->DonorBloodgroup->FormValue)) {
                $this->DonorBloodgroup->addErrorMessage(str_replace("%s", $this->DonorBloodgroup->caption(), $this->DonorBloodgroup->RequiredErrorMessage));
            }
        }
        if ($this->Tank->Required) {
            if (!$this->Tank->IsDetailKey && EmptyValue($this->Tank->FormValue)) {
                $this->Tank->addErrorMessage(str_replace("%s", $this->Tank->caption(), $this->Tank->RequiredErrorMessage));
            }
        }
        if ($this->Location->Required) {
            if (!$this->Location->IsDetailKey && EmptyValue($this->Location->FormValue)) {
                $this->Location->addErrorMessage(str_replace("%s", $this->Location->caption(), $this->Location->RequiredErrorMessage));
            }
        }
        if ($this->Volume1->Required) {
            if (!$this->Volume1->IsDetailKey && EmptyValue($this->Volume1->FormValue)) {
                $this->Volume1->addErrorMessage(str_replace("%s", $this->Volume1->caption(), $this->Volume1->RequiredErrorMessage));
            }
        }
        if ($this->Concentration1->Required) {
            if (!$this->Concentration1->IsDetailKey && EmptyValue($this->Concentration1->FormValue)) {
                $this->Concentration1->addErrorMessage(str_replace("%s", $this->Concentration1->caption(), $this->Concentration1->RequiredErrorMessage));
            }
        }
        if ($this->Total1->Required) {
            if (!$this->Total1->IsDetailKey && EmptyValue($this->Total1->FormValue)) {
                $this->Total1->addErrorMessage(str_replace("%s", $this->Total1->caption(), $this->Total1->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility1->Required) {
            if (!$this->ProgressiveMotility1->IsDetailKey && EmptyValue($this->ProgressiveMotility1->FormValue)) {
                $this->ProgressiveMotility1->addErrorMessage(str_replace("%s", $this->ProgressiveMotility1->caption(), $this->ProgressiveMotility1->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile1->Required) {
            if (!$this->NonProgrssiveMotile1->IsDetailKey && EmptyValue($this->NonProgrssiveMotile1->FormValue)) {
                $this->NonProgrssiveMotile1->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile1->caption(), $this->NonProgrssiveMotile1->RequiredErrorMessage));
            }
        }
        if ($this->Immotile1->Required) {
            if (!$this->Immotile1->IsDetailKey && EmptyValue($this->Immotile1->FormValue)) {
                $this->Immotile1->addErrorMessage(str_replace("%s", $this->Immotile1->caption(), $this->Immotile1->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile1->Required) {
            if (!$this->TotalProgrssiveMotile1->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile1->FormValue)) {
                $this->TotalProgrssiveMotile1->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile1->caption(), $this->TotalProgrssiveMotile1->RequiredErrorMessage));
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
        if ($this->Color->Required) {
            if (!$this->Color->IsDetailKey && EmptyValue($this->Color->FormValue)) {
                $this->Color->addErrorMessage(str_replace("%s", $this->Color->caption(), $this->Color->RequiredErrorMessage));
            }
        }
        if ($this->DoneBy->Required) {
            if (!$this->DoneBy->IsDetailKey && EmptyValue($this->DoneBy->FormValue)) {
                $this->DoneBy->addErrorMessage(str_replace("%s", $this->DoneBy->caption(), $this->DoneBy->RequiredErrorMessage));
            }
        }
        if ($this->Method->Required) {
            if (!$this->Method->IsDetailKey && EmptyValue($this->Method->FormValue)) {
                $this->Method->addErrorMessage(str_replace("%s", $this->Method->caption(), $this->Method->RequiredErrorMessage));
            }
        }
        if ($this->Abstinence->Required) {
            if (!$this->Abstinence->IsDetailKey && EmptyValue($this->Abstinence->FormValue)) {
                $this->Abstinence->addErrorMessage(str_replace("%s", $this->Abstinence->caption(), $this->Abstinence->RequiredErrorMessage));
            }
        }
        if ($this->ProcessedBy->Required) {
            if (!$this->ProcessedBy->IsDetailKey && EmptyValue($this->ProcessedBy->FormValue)) {
                $this->ProcessedBy->addErrorMessage(str_replace("%s", $this->ProcessedBy->caption(), $this->ProcessedBy->RequiredErrorMessage));
            }
        }
        if ($this->InseminationTime->Required) {
            if (!$this->InseminationTime->IsDetailKey && EmptyValue($this->InseminationTime->FormValue)) {
                $this->InseminationTime->addErrorMessage(str_replace("%s", $this->InseminationTime->caption(), $this->InseminationTime->RequiredErrorMessage));
            }
        }
        if ($this->InseminationBy->Required) {
            if (!$this->InseminationBy->IsDetailKey && EmptyValue($this->InseminationBy->FormValue)) {
                $this->InseminationBy->addErrorMessage(str_replace("%s", $this->InseminationBy->caption(), $this->InseminationBy->RequiredErrorMessage));
            }
        }
        if ($this->Big->Required) {
            if (!$this->Big->IsDetailKey && EmptyValue($this->Big->FormValue)) {
                $this->Big->addErrorMessage(str_replace("%s", $this->Big->caption(), $this->Big->RequiredErrorMessage));
            }
        }
        if ($this->Medium->Required) {
            if (!$this->Medium->IsDetailKey && EmptyValue($this->Medium->FormValue)) {
                $this->Medium->addErrorMessage(str_replace("%s", $this->Medium->caption(), $this->Medium->RequiredErrorMessage));
            }
        }
        if ($this->Small->Required) {
            if (!$this->Small->IsDetailKey && EmptyValue($this->Small->FormValue)) {
                $this->Small->addErrorMessage(str_replace("%s", $this->Small->caption(), $this->Small->RequiredErrorMessage));
            }
        }
        if ($this->NoHalo->Required) {
            if (!$this->NoHalo->IsDetailKey && EmptyValue($this->NoHalo->FormValue)) {
                $this->NoHalo->addErrorMessage(str_replace("%s", $this->NoHalo->caption(), $this->NoHalo->RequiredErrorMessage));
            }
        }
        if ($this->Fragmented->Required) {
            if (!$this->Fragmented->IsDetailKey && EmptyValue($this->Fragmented->FormValue)) {
                $this->Fragmented->addErrorMessage(str_replace("%s", $this->Fragmented->caption(), $this->Fragmented->RequiredErrorMessage));
            }
        }
        if ($this->NonFragmented->Required) {
            if (!$this->NonFragmented->IsDetailKey && EmptyValue($this->NonFragmented->FormValue)) {
                $this->NonFragmented->addErrorMessage(str_replace("%s", $this->NonFragmented->caption(), $this->NonFragmented->RequiredErrorMessage));
            }
        }
        if ($this->DFI->Required) {
            if (!$this->DFI->IsDetailKey && EmptyValue($this->DFI->FormValue)) {
                $this->DFI->addErrorMessage(str_replace("%s", $this->DFI->caption(), $this->DFI->RequiredErrorMessage));
            }
        }
        if ($this->IsueBy->Required) {
            if (!$this->IsueBy->IsDetailKey && EmptyValue($this->IsueBy->FormValue)) {
                $this->IsueBy->addErrorMessage(str_replace("%s", $this->IsueBy->caption(), $this->IsueBy->RequiredErrorMessage));
            }
        }
        if ($this->Volume2->Required) {
            if (!$this->Volume2->IsDetailKey && EmptyValue($this->Volume2->FormValue)) {
                $this->Volume2->addErrorMessage(str_replace("%s", $this->Volume2->caption(), $this->Volume2->RequiredErrorMessage));
            }
        }
        if ($this->Concentration2->Required) {
            if (!$this->Concentration2->IsDetailKey && EmptyValue($this->Concentration2->FormValue)) {
                $this->Concentration2->addErrorMessage(str_replace("%s", $this->Concentration2->caption(), $this->Concentration2->RequiredErrorMessage));
            }
        }
        if ($this->Total2->Required) {
            if (!$this->Total2->IsDetailKey && EmptyValue($this->Total2->FormValue)) {
                $this->Total2->addErrorMessage(str_replace("%s", $this->Total2->caption(), $this->Total2->RequiredErrorMessage));
            }
        }
        if ($this->ProgressiveMotility2->Required) {
            if (!$this->ProgressiveMotility2->IsDetailKey && EmptyValue($this->ProgressiveMotility2->FormValue)) {
                $this->ProgressiveMotility2->addErrorMessage(str_replace("%s", $this->ProgressiveMotility2->caption(), $this->ProgressiveMotility2->RequiredErrorMessage));
            }
        }
        if ($this->NonProgrssiveMotile2->Required) {
            if (!$this->NonProgrssiveMotile2->IsDetailKey && EmptyValue($this->NonProgrssiveMotile2->FormValue)) {
                $this->NonProgrssiveMotile2->addErrorMessage(str_replace("%s", $this->NonProgrssiveMotile2->caption(), $this->NonProgrssiveMotile2->RequiredErrorMessage));
            }
        }
        if ($this->Immotile2->Required) {
            if (!$this->Immotile2->IsDetailKey && EmptyValue($this->Immotile2->FormValue)) {
                $this->Immotile2->addErrorMessage(str_replace("%s", $this->Immotile2->caption(), $this->Immotile2->RequiredErrorMessage));
            }
        }
        if ($this->TotalProgrssiveMotile2->Required) {
            if (!$this->TotalProgrssiveMotile2->IsDetailKey && EmptyValue($this->TotalProgrssiveMotile2->FormValue)) {
                $this->TotalProgrssiveMotile2->addErrorMessage(str_replace("%s", $this->TotalProgrssiveMotile2->caption(), $this->TotalProgrssiveMotile2->RequiredErrorMessage));
            }
        }
        if ($this->IssuedBy->Required) {
            if (!$this->IssuedBy->IsDetailKey && EmptyValue($this->IssuedBy->FormValue)) {
                $this->IssuedBy->addErrorMessage(str_replace("%s", $this->IssuedBy->caption(), $this->IssuedBy->RequiredErrorMessage));
            }
        }
        if ($this->IssuedTo->Required) {
            if (!$this->IssuedTo->IsDetailKey && EmptyValue($this->IssuedTo->FormValue)) {
                $this->IssuedTo->addErrorMessage(str_replace("%s", $this->IssuedTo->caption(), $this->IssuedTo->RequiredErrorMessage));
            }
        }
        if ($this->PaID->Required) {
            if (!$this->PaID->IsDetailKey && EmptyValue($this->PaID->FormValue)) {
                $this->PaID->addErrorMessage(str_replace("%s", $this->PaID->caption(), $this->PaID->RequiredErrorMessage));
            }
        }
        if ($this->PaName->Required) {
            if (!$this->PaName->IsDetailKey && EmptyValue($this->PaName->FormValue)) {
                $this->PaName->addErrorMessage(str_replace("%s", $this->PaName->caption(), $this->PaName->RequiredErrorMessage));
            }
        }
        if ($this->PaMobile->Required) {
            if (!$this->PaMobile->IsDetailKey && EmptyValue($this->PaMobile->FormValue)) {
                $this->PaMobile->addErrorMessage(str_replace("%s", $this->PaMobile->caption(), $this->PaMobile->RequiredErrorMessage));
            }
        }
        if ($this->PartnerID->Required) {
            if (!$this->PartnerID->IsDetailKey && EmptyValue($this->PartnerID->FormValue)) {
                $this->PartnerID->addErrorMessage(str_replace("%s", $this->PartnerID->caption(), $this->PartnerID->RequiredErrorMessage));
            }
        }
        if ($this->PartnerName->Required) {
            if (!$this->PartnerName->IsDetailKey && EmptyValue($this->PartnerName->FormValue)) {
                $this->PartnerName->addErrorMessage(str_replace("%s", $this->PartnerName->caption(), $this->PartnerName->RequiredErrorMessage));
            }
        }
        if ($this->PartnerMobile->Required) {
            if (!$this->PartnerMobile->IsDetailKey && EmptyValue($this->PartnerMobile->FormValue)) {
                $this->PartnerMobile->addErrorMessage(str_replace("%s", $this->PartnerMobile->caption(), $this->PartnerMobile->RequiredErrorMessage));
            }
        }
        if ($this->PREG_TEST_DATE->Required) {
            if (!$this->PREG_TEST_DATE->IsDetailKey && EmptyValue($this->PREG_TEST_DATE->FormValue)) {
                $this->PREG_TEST_DATE->addErrorMessage(str_replace("%s", $this->PREG_TEST_DATE->caption(), $this->PREG_TEST_DATE->RequiredErrorMessage));
            }
        }
        if (!CheckDate($this->PREG_TEST_DATE->FormValue)) {
            $this->PREG_TEST_DATE->addErrorMessage($this->PREG_TEST_DATE->getErrorMessage(false));
        }
        if ($this->SPECIFIC_PROBLEMS->Required) {
            if (!$this->SPECIFIC_PROBLEMS->IsDetailKey && EmptyValue($this->SPECIFIC_PROBLEMS->FormValue)) {
                $this->SPECIFIC_PROBLEMS->addErrorMessage(str_replace("%s", $this->SPECIFIC_PROBLEMS->caption(), $this->SPECIFIC_PROBLEMS->RequiredErrorMessage));
            }
        }
        if ($this->IMSC_1->Required) {
            if (!$this->IMSC_1->IsDetailKey && EmptyValue($this->IMSC_1->FormValue)) {
                $this->IMSC_1->addErrorMessage(str_replace("%s", $this->IMSC_1->caption(), $this->IMSC_1->RequiredErrorMessage));
            }
        }
        if ($this->IMSC_2->Required) {
            if (!$this->IMSC_2->IsDetailKey && EmptyValue($this->IMSC_2->FormValue)) {
                $this->IMSC_2->addErrorMessage(str_replace("%s", $this->IMSC_2->caption(), $this->IMSC_2->RequiredErrorMessage));
            }
        }
        if ($this->LIQUIFACTION_STORAGE->Required) {
            if (!$this->LIQUIFACTION_STORAGE->IsDetailKey && EmptyValue($this->LIQUIFACTION_STORAGE->FormValue)) {
                $this->LIQUIFACTION_STORAGE->addErrorMessage(str_replace("%s", $this->LIQUIFACTION_STORAGE->caption(), $this->LIQUIFACTION_STORAGE->RequiredErrorMessage));
            }
        }
        if ($this->IUI_PREP_METHOD->Required) {
            if (!$this->IUI_PREP_METHOD->IsDetailKey && EmptyValue($this->IUI_PREP_METHOD->FormValue)) {
                $this->IUI_PREP_METHOD->addErrorMessage(str_replace("%s", $this->IUI_PREP_METHOD->caption(), $this->IUI_PREP_METHOD->RequiredErrorMessage));
            }
        }
        if ($this->TIME_FROM_TRIGGER->Required) {
            if (!$this->TIME_FROM_TRIGGER->IsDetailKey && EmptyValue($this->TIME_FROM_TRIGGER->FormValue)) {
                $this->TIME_FROM_TRIGGER->addErrorMessage(str_replace("%s", $this->TIME_FROM_TRIGGER->caption(), $this->TIME_FROM_TRIGGER->RequiredErrorMessage));
            }
        }
        if ($this->COLLECTION_TO_PREPARATION->Required) {
            if (!$this->COLLECTION_TO_PREPARATION->IsDetailKey && EmptyValue($this->COLLECTION_TO_PREPARATION->FormValue)) {
                $this->COLLECTION_TO_PREPARATION->addErrorMessage(str_replace("%s", $this->COLLECTION_TO_PREPARATION->caption(), $this->COLLECTION_TO_PREPARATION->RequiredErrorMessage));
            }
        }
        if ($this->TIME_FROM_PREP_TO_INSEM->Required) {
            if (!$this->TIME_FROM_PREP_TO_INSEM->IsDetailKey && EmptyValue($this->TIME_FROM_PREP_TO_INSEM->FormValue)) {
                $this->TIME_FROM_PREP_TO_INSEM->addErrorMessage(str_replace("%s", $this->TIME_FROM_PREP_TO_INSEM->caption(), $this->TIME_FROM_PREP_TO_INSEM->RequiredErrorMessage));
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

            // RIDNo
            if ($this->RIDNo->getSessionValue() != "") {
                $this->RIDNo->ReadOnly = true;
            }
            $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, $this->RIDNo->ReadOnly);

            // PatientName
            if ($this->PatientName->getSessionValue() != "") {
                $this->PatientName->ReadOnly = true;
            }
            $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, $this->PatientName->ReadOnly);

            // HusbandName
            $this->HusbandName->setDbValueDef($rsnew, $this->HusbandName->CurrentValue, null, $this->HusbandName->ReadOnly);

            // RequestDr
            $this->RequestDr->setDbValueDef($rsnew, $this->RequestDr->CurrentValue, null, $this->RequestDr->ReadOnly);

            // CollectionDate
            $this->CollectionDate->setDbValueDef($rsnew, UnFormatDateTime($this->CollectionDate->CurrentValue, 0), null, $this->CollectionDate->ReadOnly);

            // ResultDate
            $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, $this->ResultDate->ReadOnly);

            // RequestSample
            $this->RequestSample->setDbValueDef($rsnew, $this->RequestSample->CurrentValue, null, $this->RequestSample->ReadOnly);

            // CollectionType
            $this->CollectionType->setDbValueDef($rsnew, $this->CollectionType->CurrentValue, null, $this->CollectionType->ReadOnly);

            // CollectionMethod
            $this->CollectionMethod->setDbValueDef($rsnew, $this->CollectionMethod->CurrentValue, null, $this->CollectionMethod->ReadOnly);

            // Medicationused
            $this->Medicationused->setDbValueDef($rsnew, $this->Medicationused->CurrentValue, null, $this->Medicationused->ReadOnly);

            // DifficultiesinCollection
            $this->DifficultiesinCollection->setDbValueDef($rsnew, $this->DifficultiesinCollection->CurrentValue, null, $this->DifficultiesinCollection->ReadOnly);

            // pH
            $this->pH->setDbValueDef($rsnew, $this->pH->CurrentValue, null, $this->pH->ReadOnly);

            // Timeofcollection
            $this->Timeofcollection->setDbValueDef($rsnew, $this->Timeofcollection->CurrentValue, null, $this->Timeofcollection->ReadOnly);

            // Timeofexamination
            $this->Timeofexamination->setDbValueDef($rsnew, $this->Timeofexamination->CurrentValue, null, $this->Timeofexamination->ReadOnly);

            // Volume
            $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, $this->Volume->ReadOnly);

            // Concentration
            $this->Concentration->setDbValueDef($rsnew, $this->Concentration->CurrentValue, null, $this->Concentration->ReadOnly);

            // Total
            $this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, null, $this->Total->ReadOnly);

            // ProgressiveMotility
            $this->ProgressiveMotility->setDbValueDef($rsnew, $this->ProgressiveMotility->CurrentValue, null, $this->ProgressiveMotility->ReadOnly);

            // NonProgrssiveMotile
            $this->NonProgrssiveMotile->setDbValueDef($rsnew, $this->NonProgrssiveMotile->CurrentValue, null, $this->NonProgrssiveMotile->ReadOnly);

            // Immotile
            $this->Immotile->setDbValueDef($rsnew, $this->Immotile->CurrentValue, null, $this->Immotile->ReadOnly);

            // TotalProgrssiveMotile
            $this->TotalProgrssiveMotile->setDbValueDef($rsnew, $this->TotalProgrssiveMotile->CurrentValue, null, $this->TotalProgrssiveMotile->ReadOnly);

            // Appearance
            $this->Appearance->setDbValueDef($rsnew, $this->Appearance->CurrentValue, null, $this->Appearance->ReadOnly);

            // Homogenosity
            $this->Homogenosity->setDbValueDef($rsnew, $this->Homogenosity->CurrentValue, null, $this->Homogenosity->ReadOnly);

            // CompleteSample
            $this->CompleteSample->setDbValueDef($rsnew, $this->CompleteSample->CurrentValue, null, $this->CompleteSample->ReadOnly);

            // Liquefactiontime
            $this->Liquefactiontime->setDbValueDef($rsnew, $this->Liquefactiontime->CurrentValue, null, $this->Liquefactiontime->ReadOnly);

            // Normal
            $this->Normal->setDbValueDef($rsnew, $this->Normal->CurrentValue, null, $this->Normal->ReadOnly);

            // Abnormal
            $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, $this->Abnormal->ReadOnly);

            // Headdefects
            $this->Headdefects->setDbValueDef($rsnew, $this->Headdefects->CurrentValue, null, $this->Headdefects->ReadOnly);

            // MidpieceDefects
            $this->MidpieceDefects->setDbValueDef($rsnew, $this->MidpieceDefects->CurrentValue, null, $this->MidpieceDefects->ReadOnly);

            // TailDefects
            $this->TailDefects->setDbValueDef($rsnew, $this->TailDefects->CurrentValue, null, $this->TailDefects->ReadOnly);

            // NormalProgMotile
            $this->NormalProgMotile->setDbValueDef($rsnew, $this->NormalProgMotile->CurrentValue, null, $this->NormalProgMotile->ReadOnly);

            // ImmatureForms
            $this->ImmatureForms->setDbValueDef($rsnew, $this->ImmatureForms->CurrentValue, null, $this->ImmatureForms->ReadOnly);

            // Leucocytes
            $this->Leucocytes->setDbValueDef($rsnew, $this->Leucocytes->CurrentValue, null, $this->Leucocytes->ReadOnly);

            // Agglutination
            $this->Agglutination->setDbValueDef($rsnew, $this->Agglutination->CurrentValue, null, $this->Agglutination->ReadOnly);

            // Debris
            $this->Debris->setDbValueDef($rsnew, $this->Debris->CurrentValue, null, $this->Debris->ReadOnly);

            // Diagnosis
            $this->Diagnosis->setDbValueDef($rsnew, $this->Diagnosis->CurrentValue, null, $this->Diagnosis->ReadOnly);

            // Observations
            $this->Observations->setDbValueDef($rsnew, $this->Observations->CurrentValue, null, $this->Observations->ReadOnly);

            // Signature
            $this->Signature->setDbValueDef($rsnew, $this->Signature->CurrentValue, null, $this->Signature->ReadOnly);

            // SemenOrgin
            $this->SemenOrgin->setDbValueDef($rsnew, $this->SemenOrgin->CurrentValue, null, $this->SemenOrgin->ReadOnly);

            // Donor
            $this->Donor->setDbValueDef($rsnew, $this->Donor->CurrentValue, null, $this->Donor->ReadOnly);

            // DonorBloodgroup
            $this->DonorBloodgroup->setDbValueDef($rsnew, $this->DonorBloodgroup->CurrentValue, null, $this->DonorBloodgroup->ReadOnly);

            // Tank
            $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, $this->Tank->ReadOnly);

            // Location
            $this->Location->setDbValueDef($rsnew, $this->Location->CurrentValue, null, $this->Location->ReadOnly);

            // Volume1
            $this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, null, $this->Volume1->ReadOnly);

            // Concentration1
            $this->Concentration1->setDbValueDef($rsnew, $this->Concentration1->CurrentValue, null, $this->Concentration1->ReadOnly);

            // Total1
            $this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, null, $this->Total1->ReadOnly);

            // ProgressiveMotility1
            $this->ProgressiveMotility1->setDbValueDef($rsnew, $this->ProgressiveMotility1->CurrentValue, null, $this->ProgressiveMotility1->ReadOnly);

            // NonProgrssiveMotile1
            $this->NonProgrssiveMotile1->setDbValueDef($rsnew, $this->NonProgrssiveMotile1->CurrentValue, null, $this->NonProgrssiveMotile1->ReadOnly);

            // Immotile1
            $this->Immotile1->setDbValueDef($rsnew, $this->Immotile1->CurrentValue, null, $this->Immotile1->ReadOnly);

            // TotalProgrssiveMotile1
            $this->TotalProgrssiveMotile1->setDbValueDef($rsnew, $this->TotalProgrssiveMotile1->CurrentValue, null, $this->TotalProgrssiveMotile1->ReadOnly);

            // TidNo
            if ($this->TidNo->getSessionValue() != "") {
                $this->TidNo->ReadOnly = true;
            }
            $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, $this->TidNo->ReadOnly);

            // Color
            $this->Color->setDbValueDef($rsnew, $this->Color->CurrentValue, null, $this->Color->ReadOnly);

            // DoneBy
            $this->DoneBy->setDbValueDef($rsnew, $this->DoneBy->CurrentValue, null, $this->DoneBy->ReadOnly);

            // Method
            $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, $this->Method->ReadOnly);

            // Abstinence
            $this->Abstinence->setDbValueDef($rsnew, $this->Abstinence->CurrentValue, null, $this->Abstinence->ReadOnly);

            // ProcessedBy
            $this->ProcessedBy->setDbValueDef($rsnew, $this->ProcessedBy->CurrentValue, null, $this->ProcessedBy->ReadOnly);

            // InseminationTime
            $this->InseminationTime->setDbValueDef($rsnew, $this->InseminationTime->CurrentValue, null, $this->InseminationTime->ReadOnly);

            // InseminationBy
            $this->InseminationBy->setDbValueDef($rsnew, $this->InseminationBy->CurrentValue, null, $this->InseminationBy->ReadOnly);

            // Big
            $this->Big->setDbValueDef($rsnew, $this->Big->CurrentValue, null, $this->Big->ReadOnly);

            // Medium
            $this->Medium->setDbValueDef($rsnew, $this->Medium->CurrentValue, null, $this->Medium->ReadOnly);

            // Small
            $this->Small->setDbValueDef($rsnew, $this->Small->CurrentValue, null, $this->Small->ReadOnly);

            // NoHalo
            $this->NoHalo->setDbValueDef($rsnew, $this->NoHalo->CurrentValue, null, $this->NoHalo->ReadOnly);

            // Fragmented
            $this->Fragmented->setDbValueDef($rsnew, $this->Fragmented->CurrentValue, null, $this->Fragmented->ReadOnly);

            // NonFragmented
            $this->NonFragmented->setDbValueDef($rsnew, $this->NonFragmented->CurrentValue, null, $this->NonFragmented->ReadOnly);

            // DFI
            $this->DFI->setDbValueDef($rsnew, $this->DFI->CurrentValue, null, $this->DFI->ReadOnly);

            // IsueBy
            $this->IsueBy->setDbValueDef($rsnew, $this->IsueBy->CurrentValue, null, $this->IsueBy->ReadOnly);

            // Volume2
            $this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, null, $this->Volume2->ReadOnly);

            // Concentration2
            $this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, null, $this->Concentration2->ReadOnly);

            // Total2
            $this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, null, $this->Total2->ReadOnly);

            // ProgressiveMotility2
            $this->ProgressiveMotility2->setDbValueDef($rsnew, $this->ProgressiveMotility2->CurrentValue, null, $this->ProgressiveMotility2->ReadOnly);

            // NonProgrssiveMotile2
            $this->NonProgrssiveMotile2->setDbValueDef($rsnew, $this->NonProgrssiveMotile2->CurrentValue, null, $this->NonProgrssiveMotile2->ReadOnly);

            // Immotile2
            $this->Immotile2->setDbValueDef($rsnew, $this->Immotile2->CurrentValue, null, $this->Immotile2->ReadOnly);

            // TotalProgrssiveMotile2
            $this->TotalProgrssiveMotile2->setDbValueDef($rsnew, $this->TotalProgrssiveMotile2->CurrentValue, null, $this->TotalProgrssiveMotile2->ReadOnly);

            // IssuedBy
            $this->IssuedBy->setDbValueDef($rsnew, $this->IssuedBy->CurrentValue, null, $this->IssuedBy->ReadOnly);

            // IssuedTo
            $this->IssuedTo->setDbValueDef($rsnew, $this->IssuedTo->CurrentValue, null, $this->IssuedTo->ReadOnly);

            // PaID
            $this->PaID->setDbValueDef($rsnew, $this->PaID->CurrentValue, null, $this->PaID->ReadOnly);

            // PaName
            $this->PaName->setDbValueDef($rsnew, $this->PaName->CurrentValue, null, $this->PaName->ReadOnly);

            // PaMobile
            $this->PaMobile->setDbValueDef($rsnew, $this->PaMobile->CurrentValue, null, $this->PaMobile->ReadOnly);

            // PartnerID
            $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, $this->PartnerID->ReadOnly);

            // PartnerName
            $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, $this->PartnerName->ReadOnly);

            // PartnerMobile
            $this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, null, $this->PartnerMobile->ReadOnly);

            // PREG_TEST_DATE
            $this->PREG_TEST_DATE->setDbValueDef($rsnew, UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0), null, $this->PREG_TEST_DATE->ReadOnly);

            // SPECIFIC_PROBLEMS
            $this->SPECIFIC_PROBLEMS->setDbValueDef($rsnew, $this->SPECIFIC_PROBLEMS->CurrentValue, null, $this->SPECIFIC_PROBLEMS->ReadOnly);

            // IMSC_1
            $this->IMSC_1->setDbValueDef($rsnew, $this->IMSC_1->CurrentValue, null, $this->IMSC_1->ReadOnly);

            // IMSC_2
            $this->IMSC_2->setDbValueDef($rsnew, $this->IMSC_2->CurrentValue, null, $this->IMSC_2->ReadOnly);

            // LIQUIFACTION_STORAGE
            $this->LIQUIFACTION_STORAGE->setDbValueDef($rsnew, $this->LIQUIFACTION_STORAGE->CurrentValue, null, $this->LIQUIFACTION_STORAGE->ReadOnly);

            // IUI_PREP_METHOD
            $this->IUI_PREP_METHOD->setDbValueDef($rsnew, $this->IUI_PREP_METHOD->CurrentValue, null, $this->IUI_PREP_METHOD->ReadOnly);

            // TIME_FROM_TRIGGER
            $this->TIME_FROM_TRIGGER->setDbValueDef($rsnew, $this->TIME_FROM_TRIGGER->CurrentValue, null, $this->TIME_FROM_TRIGGER->ReadOnly);

            // COLLECTION_TO_PREPARATION
            $this->COLLECTION_TO_PREPARATION->setDbValueDef($rsnew, $this->COLLECTION_TO_PREPARATION->CurrentValue, null, $this->COLLECTION_TO_PREPARATION->ReadOnly);

            // TIME_FROM_PREP_TO_INSEM
            $this->TIME_FROM_PREP_TO_INSEM->setDbValueDef($rsnew, $this->TIME_FROM_PREP_TO_INSEM->CurrentValue, null, $this->TIME_FROM_PREP_TO_INSEM->ReadOnly);

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

    // Add record
    protected function addRow($rsold = null)
    {
        global $Language, $Security;

        // Set up foreign key field value from Session
        if ($this->getCurrentMasterTable() == "view_ivf_treatment") {
            $this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
            $this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
            $this->PatientName->CurrentValue = $this->PatientName->getSessionValue();
        }
        if ($this->getCurrentMasterTable() == "ivf_treatment_plan") {
            $this->RIDNo->CurrentValue = $this->RIDNo->getSessionValue();
            $this->PatientName->CurrentValue = $this->PatientName->getSessionValue();
            $this->TidNo->CurrentValue = $this->TidNo->getSessionValue();
        }
        $conn = $this->getConnection();

        // Load db values from rsold
        $this->loadDbValues($rsold);
        if ($rsold) {
        }
        $rsnew = [];

        // RIDNo
        $this->RIDNo->setDbValueDef($rsnew, $this->RIDNo->CurrentValue, null, false);

        // PatientName
        $this->PatientName->setDbValueDef($rsnew, $this->PatientName->CurrentValue, null, false);

        // HusbandName
        $this->HusbandName->setDbValueDef($rsnew, $this->HusbandName->CurrentValue, null, false);

        // RequestDr
        $this->RequestDr->setDbValueDef($rsnew, $this->RequestDr->CurrentValue, null, false);

        // CollectionDate
        $this->CollectionDate->setDbValueDef($rsnew, UnFormatDateTime($this->CollectionDate->CurrentValue, 0), null, false);

        // ResultDate
        $this->ResultDate->setDbValueDef($rsnew, UnFormatDateTime($this->ResultDate->CurrentValue, 0), null, false);

        // RequestSample
        $this->RequestSample->setDbValueDef($rsnew, $this->RequestSample->CurrentValue, null, false);

        // CollectionType
        $this->CollectionType->setDbValueDef($rsnew, $this->CollectionType->CurrentValue, null, false);

        // CollectionMethod
        $this->CollectionMethod->setDbValueDef($rsnew, $this->CollectionMethod->CurrentValue, null, false);

        // Medicationused
        $this->Medicationused->setDbValueDef($rsnew, $this->Medicationused->CurrentValue, null, false);

        // DifficultiesinCollection
        $this->DifficultiesinCollection->setDbValueDef($rsnew, $this->DifficultiesinCollection->CurrentValue, null, false);

        // pH
        $this->pH->setDbValueDef($rsnew, $this->pH->CurrentValue, null, false);

        // Timeofcollection
        $this->Timeofcollection->setDbValueDef($rsnew, $this->Timeofcollection->CurrentValue, null, false);

        // Timeofexamination
        $this->Timeofexamination->setDbValueDef($rsnew, $this->Timeofexamination->CurrentValue, null, false);

        // Volume
        $this->Volume->setDbValueDef($rsnew, $this->Volume->CurrentValue, null, false);

        // Concentration
        $this->Concentration->setDbValueDef($rsnew, $this->Concentration->CurrentValue, null, false);

        // Total
        $this->Total->setDbValueDef($rsnew, $this->Total->CurrentValue, null, false);

        // ProgressiveMotility
        $this->ProgressiveMotility->setDbValueDef($rsnew, $this->ProgressiveMotility->CurrentValue, null, false);

        // NonProgrssiveMotile
        $this->NonProgrssiveMotile->setDbValueDef($rsnew, $this->NonProgrssiveMotile->CurrentValue, null, false);

        // Immotile
        $this->Immotile->setDbValueDef($rsnew, $this->Immotile->CurrentValue, null, false);

        // TotalProgrssiveMotile
        $this->TotalProgrssiveMotile->setDbValueDef($rsnew, $this->TotalProgrssiveMotile->CurrentValue, null, false);

        // Appearance
        $this->Appearance->setDbValueDef($rsnew, $this->Appearance->CurrentValue, null, false);

        // Homogenosity
        $this->Homogenosity->setDbValueDef($rsnew, $this->Homogenosity->CurrentValue, null, false);

        // CompleteSample
        $this->CompleteSample->setDbValueDef($rsnew, $this->CompleteSample->CurrentValue, null, false);

        // Liquefactiontime
        $this->Liquefactiontime->setDbValueDef($rsnew, $this->Liquefactiontime->CurrentValue, null, false);

        // Normal
        $this->Normal->setDbValueDef($rsnew, $this->Normal->CurrentValue, null, false);

        // Abnormal
        $this->Abnormal->setDbValueDef($rsnew, $this->Abnormal->CurrentValue, null, false);

        // Headdefects
        $this->Headdefects->setDbValueDef($rsnew, $this->Headdefects->CurrentValue, null, false);

        // MidpieceDefects
        $this->MidpieceDefects->setDbValueDef($rsnew, $this->MidpieceDefects->CurrentValue, null, false);

        // TailDefects
        $this->TailDefects->setDbValueDef($rsnew, $this->TailDefects->CurrentValue, null, false);

        // NormalProgMotile
        $this->NormalProgMotile->setDbValueDef($rsnew, $this->NormalProgMotile->CurrentValue, null, false);

        // ImmatureForms
        $this->ImmatureForms->setDbValueDef($rsnew, $this->ImmatureForms->CurrentValue, null, false);

        // Leucocytes
        $this->Leucocytes->setDbValueDef($rsnew, $this->Leucocytes->CurrentValue, null, false);

        // Agglutination
        $this->Agglutination->setDbValueDef($rsnew, $this->Agglutination->CurrentValue, null, false);

        // Debris
        $this->Debris->setDbValueDef($rsnew, $this->Debris->CurrentValue, null, false);

        // Diagnosis
        $this->Diagnosis->setDbValueDef($rsnew, $this->Diagnosis->CurrentValue, null, false);

        // Observations
        $this->Observations->setDbValueDef($rsnew, $this->Observations->CurrentValue, null, false);

        // Signature
        $this->Signature->setDbValueDef($rsnew, $this->Signature->CurrentValue, null, false);

        // SemenOrgin
        $this->SemenOrgin->setDbValueDef($rsnew, $this->SemenOrgin->CurrentValue, null, false);

        // Donor
        $this->Donor->setDbValueDef($rsnew, $this->Donor->CurrentValue, null, false);

        // DonorBloodgroup
        $this->DonorBloodgroup->setDbValueDef($rsnew, $this->DonorBloodgroup->CurrentValue, null, false);

        // Tank
        $this->Tank->setDbValueDef($rsnew, $this->Tank->CurrentValue, null, false);

        // Location
        $this->Location->setDbValueDef($rsnew, $this->Location->CurrentValue, null, false);

        // Volume1
        $this->Volume1->setDbValueDef($rsnew, $this->Volume1->CurrentValue, null, false);

        // Concentration1
        $this->Concentration1->setDbValueDef($rsnew, $this->Concentration1->CurrentValue, null, false);

        // Total1
        $this->Total1->setDbValueDef($rsnew, $this->Total1->CurrentValue, null, false);

        // ProgressiveMotility1
        $this->ProgressiveMotility1->setDbValueDef($rsnew, $this->ProgressiveMotility1->CurrentValue, null, false);

        // NonProgrssiveMotile1
        $this->NonProgrssiveMotile1->setDbValueDef($rsnew, $this->NonProgrssiveMotile1->CurrentValue, null, false);

        // Immotile1
        $this->Immotile1->setDbValueDef($rsnew, $this->Immotile1->CurrentValue, null, false);

        // TotalProgrssiveMotile1
        $this->TotalProgrssiveMotile1->setDbValueDef($rsnew, $this->TotalProgrssiveMotile1->CurrentValue, null, false);

        // TidNo
        $this->TidNo->setDbValueDef($rsnew, $this->TidNo->CurrentValue, null, false);

        // Color
        $this->Color->setDbValueDef($rsnew, $this->Color->CurrentValue, null, false);

        // DoneBy
        $this->DoneBy->setDbValueDef($rsnew, $this->DoneBy->CurrentValue, null, false);

        // Method
        $this->Method->setDbValueDef($rsnew, $this->Method->CurrentValue, null, false);

        // Abstinence
        $this->Abstinence->setDbValueDef($rsnew, $this->Abstinence->CurrentValue, null, false);

        // ProcessedBy
        $this->ProcessedBy->setDbValueDef($rsnew, $this->ProcessedBy->CurrentValue, null, false);

        // InseminationTime
        $this->InseminationTime->setDbValueDef($rsnew, $this->InseminationTime->CurrentValue, null, false);

        // InseminationBy
        $this->InseminationBy->setDbValueDef($rsnew, $this->InseminationBy->CurrentValue, null, false);

        // Big
        $this->Big->setDbValueDef($rsnew, $this->Big->CurrentValue, null, false);

        // Medium
        $this->Medium->setDbValueDef($rsnew, $this->Medium->CurrentValue, null, false);

        // Small
        $this->Small->setDbValueDef($rsnew, $this->Small->CurrentValue, null, false);

        // NoHalo
        $this->NoHalo->setDbValueDef($rsnew, $this->NoHalo->CurrentValue, null, false);

        // Fragmented
        $this->Fragmented->setDbValueDef($rsnew, $this->Fragmented->CurrentValue, null, false);

        // NonFragmented
        $this->NonFragmented->setDbValueDef($rsnew, $this->NonFragmented->CurrentValue, null, false);

        // DFI
        $this->DFI->setDbValueDef($rsnew, $this->DFI->CurrentValue, null, false);

        // IsueBy
        $this->IsueBy->setDbValueDef($rsnew, $this->IsueBy->CurrentValue, null, false);

        // Volume2
        $this->Volume2->setDbValueDef($rsnew, $this->Volume2->CurrentValue, null, false);

        // Concentration2
        $this->Concentration2->setDbValueDef($rsnew, $this->Concentration2->CurrentValue, null, false);

        // Total2
        $this->Total2->setDbValueDef($rsnew, $this->Total2->CurrentValue, null, false);

        // ProgressiveMotility2
        $this->ProgressiveMotility2->setDbValueDef($rsnew, $this->ProgressiveMotility2->CurrentValue, null, false);

        // NonProgrssiveMotile2
        $this->NonProgrssiveMotile2->setDbValueDef($rsnew, $this->NonProgrssiveMotile2->CurrentValue, null, false);

        // Immotile2
        $this->Immotile2->setDbValueDef($rsnew, $this->Immotile2->CurrentValue, null, false);

        // TotalProgrssiveMotile2
        $this->TotalProgrssiveMotile2->setDbValueDef($rsnew, $this->TotalProgrssiveMotile2->CurrentValue, null, false);

        // IssuedBy
        $this->IssuedBy->setDbValueDef($rsnew, $this->IssuedBy->CurrentValue, null, false);

        // IssuedTo
        $this->IssuedTo->setDbValueDef($rsnew, $this->IssuedTo->CurrentValue, null, false);

        // PaID
        $this->PaID->setDbValueDef($rsnew, $this->PaID->CurrentValue, null, false);

        // PaName
        $this->PaName->setDbValueDef($rsnew, $this->PaName->CurrentValue, null, false);

        // PaMobile
        $this->PaMobile->setDbValueDef($rsnew, $this->PaMobile->CurrentValue, null, false);

        // PartnerID
        $this->PartnerID->setDbValueDef($rsnew, $this->PartnerID->CurrentValue, null, false);

        // PartnerName
        $this->PartnerName->setDbValueDef($rsnew, $this->PartnerName->CurrentValue, null, false);

        // PartnerMobile
        $this->PartnerMobile->setDbValueDef($rsnew, $this->PartnerMobile->CurrentValue, null, false);

        // PREG_TEST_DATE
        $this->PREG_TEST_DATE->setDbValueDef($rsnew, UnFormatDateTime($this->PREG_TEST_DATE->CurrentValue, 0), null, false);

        // SPECIFIC_PROBLEMS
        $this->SPECIFIC_PROBLEMS->setDbValueDef($rsnew, $this->SPECIFIC_PROBLEMS->CurrentValue, null, false);

        // IMSC_1
        $this->IMSC_1->setDbValueDef($rsnew, $this->IMSC_1->CurrentValue, null, false);

        // IMSC_2
        $this->IMSC_2->setDbValueDef($rsnew, $this->IMSC_2->CurrentValue, null, false);

        // LIQUIFACTION_STORAGE
        $this->LIQUIFACTION_STORAGE->setDbValueDef($rsnew, $this->LIQUIFACTION_STORAGE->CurrentValue, null, false);

        // IUI_PREP_METHOD
        $this->IUI_PREP_METHOD->setDbValueDef($rsnew, $this->IUI_PREP_METHOD->CurrentValue, null, false);

        // TIME_FROM_TRIGGER
        $this->TIME_FROM_TRIGGER->setDbValueDef($rsnew, $this->TIME_FROM_TRIGGER->CurrentValue, null, false);

        // COLLECTION_TO_PREPARATION
        $this->COLLECTION_TO_PREPARATION->setDbValueDef($rsnew, $this->COLLECTION_TO_PREPARATION->CurrentValue, null, false);

        // TIME_FROM_PREP_TO_INSEM
        $this->TIME_FROM_PREP_TO_INSEM->setDbValueDef($rsnew, $this->TIME_FROM_PREP_TO_INSEM->CurrentValue, null, false);

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
        // Hide foreign keys
        $masterTblVar = $this->getCurrentMasterTable();
        if ($masterTblVar == "view_ivf_treatment") {
            $masterTbl = Container("view_ivf_treatment");
            $this->TidNo->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->RIDNo->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->PatientName->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
        }
        if ($masterTblVar == "ivf_treatment_plan") {
            $masterTbl = Container("ivf_treatment_plan");
            $this->RIDNo->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->PatientName->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
            $this->TidNo->Visible = false;
            if ($masterTbl->EventCancelled) {
                $this->EventCancelled = true;
            }
        }
        $this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
        $this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
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
}
